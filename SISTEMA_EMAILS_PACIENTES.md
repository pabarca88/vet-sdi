# Sistema de Manejo de Emails para Pacientes

## Resumen
Este documento explica cómo funciona el sistema de emails para pacientes, permitiendo emails duplicados como datos de contacto mientras mantiene la integridad de las cuentas de usuario.

---

## Estructura de Datos

### Tabla `pacientes`
- **Campo `email`**: Dato de contacto (puede repetirse)
- **Propósito**: Recibir notificaciones, comunicaciones del centro médico
- **Permite duplicados**: ✅ SÍ

### Tabla `users`
- **Campo `email`**: Credencial de acceso al sistema (debe ser único)
- **Propósito**: Login y autenticación
- **Permite duplicados**: ❌ NO (constraint UNIQUE)

---

## Funcionamiento del Sistema

### 1. Email Temporal para Pacientes sin Email Real

**Cuando un paciente NO tiene email:**
- Se genera automáticamente: `sintemporal@med-sdi.cl`
- Este email se guarda en `pacientes.email`
- Múltiples pacientes pueden tener este mismo email temporal

**Para login (tabla `users`):**
- Se usa el **RUT sin formato** como email
- Ejemplo: RUT `12.345.678-9` → email en users: `123456789`
- Cada paciente tiene un RUT único, no hay conflictos

**Implementación:**
```php
// En PacienteController.php
public static function generarEmailPacienteTemporal($nombres, $apellido_uno, $apellido_dos)
{
    return 'sintemporal@med-sdi.cl';
}
```

---

### 2. Emails Compartidos entre Pacientes

**Escenario común:**
- Abuelito no tiene email → usa email de su hija: `maria@gmail.com`
- Abuelita tampoco tiene email → usa el mismo: `maria@gmail.com`
- La hija está registrada con: `maria@gmail.com`

**Cómo lo maneja el sistema:**

#### Tabla `pacientes` (todos se guardan):
| ID | Nombre | Email | id_usuario |
|----|--------|-------|------------|
| 1 | María (hija) | maria@gmail.com | 101 |
| 2 | Juan (abuelito) | maria@gmail.com | NULL |
| 3 | Rosa (abuelita) | maria@gmail.com | NULL |

#### Tabla `users` (solo emails únicos):
| ID | Email | Password | Role |
|----|-------|----------|------|
| 101 | maria@gmail.com | hash123 | Paciente |

**Explicación:**
1. **María** se registra primero → Crea User con `maria@gmail.com`
2. **Juan** se registra → Email ya existe en users → NO se crea User (sin acceso al sistema)
3. **Rosa** se registra → Email ya existe en users → NO se crea User (sin acceso al sistema)

**Nota importante:** El sistema solo usa el RUT como email en `users` cuando el paciente **NO tiene email** (usa `sintemporal@med-sdi.cl`). Si el paciente proporciona un email real, aunque sea de otra persona, el sistema intenta usar ese email para crear el User, y si ya existe, simplemente no crea la cuenta de acceso.

---

### 3. Lógica de Validación

#### Código en `agendar_hora_nuevo_paciente()`:

```php
// PASO 1: Siempre permitir crear el paciente (email es solo dato de contacto)
if(true) {
    $paciente->email = $request->reserva_hora_email; // o sintemporal@med-sdi.cl
    $paciente->save(); // ✅ Siempre se guarda
    
    // PASO 2: Intentar crear User solo si tiene ≥18 años
    if( (\Carbon\Carbon::parse($fechaConvertida)->age) >= 18) {
        
        // Determinar qué email usar en tabla users
        if($paciente->email === 'sintemporal@med-sdi.cl') {
            // Usar RUT sin formato
            $user->email = str_replace(['.', '-', ' '], '', $paciente->rut);
        } else {
            // Usar el email real
            $user->email = $paciente->email;
        }
        
        try {
            $user->save(); // ✅ Crea User si el email está disponible
        } catch (\Exception $e) {
            // ❌ Email ya existe en users → No se crea User
            // Paciente ya está guardado, solo sin acceso al sistema
        }
    }
}
```

---

## Casos de Uso

### Caso 1: Paciente con Email Propio
**Datos:**
- Nombre: Juan Pérez
- Email: juan@gmail.com
- Edad: 35 años

**Resultado:**
- ✅ Registro en `pacientes` con email `juan@gmail.com`
- ✅ Registro en `users` con email `juan@gmail.com`
- ✅ Login: `juan@gmail.com` + password

---

### Caso 2: Paciente sin Email (con RUT)
**Datos:**
- Nombre: Pedro González
- Email: (vacío)
- Edad: 45 años
- RUT: 12.345.678-9

**Resultado:**
- ✅ Registro en `pacientes` con email `sintemporal@med-sdi.cl`
- ✅ Registro en `users` con email `123456789` (RUT sin formato)
- ✅ Login: `123456789` + password

---

### Caso 3: Múltiples Pacientes sin Email
**Datos:**
- Paciente 1: María (RUT: 11.111.111-1)
- Paciente 2: José (RUT: 22.222.222-2)
- Ambos sin email

**Resultado:**
| Paciente | Email en `pacientes` | Email en `users` | Login |
|----------|---------------------|------------------|-------|
| María | sintemporal@med-sdi.cl | 111111111 | 111111111 |
| José | sintemporal@med-sdi.cl | 222222222 | 222222222 |

---

### Caso 4: Familia Compartiendo Email
**Datos:**
- Hija: Ana (email: ana@gmail.com) - Se registra primero
- Madre: Carmen (usa email: ana@gmail.com)
- Padre: Carlos (usa email: ana@gmail.com)

**Resultado:**
| Persona | Email en `pacientes` | User Creado | Login |
|---------|---------------------|-------------|-------|
| Ana | ana@gmail.com | ✅ Sí | ana@gmail.com |
| Carmen | ana@gmail.com | ❌ No (email ocupado) | Sin acceso |
| Carlos | ana@gmail.com | ❌ No (email ocupado) | Sin acceso |

**Beneficios:**
- ✅ Todos pueden atenderse
- ✅ Todos reciben notificaciones al mismo email
- ✅ Solo una cuenta de acceso (evita confusión)

---

### Caso 5: Familia Usando Email Nuevo (No Registrado)
**Datos:**
- Abuelito: Juan (email: contacto@familia.com) - Se registra primero
- Abuelita: Rosa (email: contacto@familia.com) - Se registra después
- El email `contacto@familia.com` NO existe en el sistema

**Resultado:**
| Persona | Email en `pacientes` | User Creado | Login |
|---------|---------------------|-------------|-------|
| Juan | contacto@familia.com | ✅ Sí | contacto@familia.com |
| Rosa | contacto@familia.com | ❌ No (email ocupado) | Sin acceso |

**Explicación:**
1. **Juan** se registra primero:
   - ✅ Se guarda en `pacientes` con email `contacto@familia.com`
   - ✅ El email NO existe en `users` → Se crea User exitosamente
   - ✅ Juan obtiene acceso al sistema

2. **Rosa** se registra después:
   - ✅ Se guarda en `pacientes` con email `contacto@familia.com`
   - ❌ El email YA existe en `users` (lo tiene Juan) → NO se crea User
   - ❌ Rosa NO obtiene acceso al sistema

**Beneficios:**
- ✅ Ambos pueden atenderse en el centro médico
- ✅ Ambos reciben notificaciones al email `contacto@familia.com`
- ✅ El primero que se registra obtiene la cuenta de acceso
- ✅ No hay confusión de múltiples cuentas con el mismo email

---

## Ventajas del Sistema

### 1. Flexibilidad
- Permite que múltiples pacientes usen el mismo email de contacto
- No rechaza registros por emails duplicados
- Ideal para familias o personas sin email propio

### 2. Seguridad
- Mantiene la restricción UNIQUE en `users.email`
- Previene duplicación de cuentas de acceso
- Cada login es único (email o RUT)

### 3. Usabilidad
- Pacientes sin email pueden registrarse
- Login con RUT para quienes no tienen email
- No requiere emails inventados o falsos

### 4. Compatibilidad
- No requiere cambios en la estructura de la base de datos
- Usa las tablas existentes
- Sin migraciones necesarias

---

## Archivos Modificados

### 1. `app/Http/Controllers/PacienteController.php`
**Función:** `generarEmailPacienteTemporal()`
```php
public static function generarEmailPacienteTemporal($nombres, $apellido_uno, $apellido_dos)
{
    return 'sintemporal@med-sdi.cl';
}
```

### 2. `app/Http/Controllers/EscritorioAsistente.php`
**Función:** `agendar_hora_nuevo_paciente()`

**Cambios principales:**
- Eliminada validación que rechazaba emails duplicados en pacientes (línea ~788)
- Agregado try-catch para capturar error de email duplicado en users (línea ~970)
- Detección de email temporal usando `=== 'sintemporal@med-sdi.cl'` (línea ~956 y ~1152)

---

## Despliegue

### Pasos para subir a producción:

1. **Subir archivos modificados:**
   - `app/Http/Controllers/PacienteController.php`
   - `app/Http/Controllers/EscritorioAsistente.php`

2. **Limpiar cachés:**
   ```bash
   php artisan config:clear
   php artisan cache:clear
   php artisan view:clear
   ```

3. **Probar escenarios:**
   - ✅ Paciente sin email (debe crear con sintemporal@med-sdi.cl)
   - ✅ Dos pacientes sin email (ambos con sintemporal@med-sdi.cl)
   - ✅ Paciente usando email de otro paciente registrado

---

## Preguntas Frecuentes

### ¿Qué pasa si 100 pacientes no tienen email?
✅ Todos se guardan con `sintemporal@med-sdi.cl` en `pacientes`
✅ Cada uno tiene su RUT único en `users` para login
✅ No hay conflictos

### ¿Pueden dos pacientes hacer login con el mismo email?
❌ No. Solo el primero obtiene cuenta con ese email.
El segundo se registra como paciente pero sin acceso al sistema.

### ¿Un paciente sin User puede atenderse?
✅ Sí. El registro en `pacientes` es suficiente para agendar horas y atenderse.
Solo no podrá acceder al portal web.

### ¿Cómo cambia un paciente de email temporal a uno real?
Actualizar `pacientes.email` con el nuevo email.
Si quiere acceso al sistema, crear manualmente un User con ese email.

### ¿Los menores de 18 años tienen User?
❌ No. Por política del sistema, solo mayores de 18 años pueden tener cuenta de acceso.

---

## Contacto Técnico
Para dudas o problemas con esta implementación, referirse a este documento y revisar los archivos mencionados en la sección "Archivos Modificados".
