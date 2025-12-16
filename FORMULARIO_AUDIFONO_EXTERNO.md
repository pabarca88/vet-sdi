# 📋 Formulario de Audífono Externo - Documentación

## 🎯 Descripción General

Sistema frontend completo para registrar audífonos de laboratorios externos (otros proveedores) con captura de datos de procedencia, características de ambos audífonos (izquierdo y derecho), y información del control.

---

## 📍 Ubicación en la Vista

**Archivo**: `resources/views/app/laboratorio/atencion_prof_laboratorio_especialidades.blade.php`

**Sección**: Tab "Control de audífonos post venta" → Sub-tab "Control y calibración de audífonos"

**Líneas**: ~1165-1310 (HTML del formulario)

---

## 🔄 Flujo de Usuario

```
1. Usuario entra al tab "Control de audífonos post venta"
   ↓
2. Selecciona "Otro proveedor" en el dropdown "Control de Audifono"
   ↓
3. Se oculta lista de audífonos propios
   ↓
4. Se muestra formulario de audífono externo (animación fadeIn)
   ↓
5. Usuario completa el formulario
   ↓
6. Hace clic en "Guardar Audífono Externo"
   ↓
7. Validación del formulario
   ↓
8. Confirmación con SweetAlert
   ↓
9. Guardado (actualmente simulado, backend pendiente)
   ↓
10. Limpieza del formulario y mensaje de éxito
```

---

## 📋 Estructura del Formulario

### **Sección 1: Información de Procedencia**

| Campo | Tipo | Obligatorio | Descripción |
|-------|------|-------------|-------------|
| `procedencia_laboratorio` | text | ✅ Sí | Nombre del laboratorio o proveedor externo |
| `fecha_adquisicion` | date | ✅ Sí | Fecha en que el paciente adquirió el audífono |

### **Sección 2: Audífono Izquierdo**

| Campo | Tipo | Obligatorio | Descripción |
|-------|------|-------------|-------------|
| `n_serie_izquierdo` | text | ❌ No | Número de serie del audífono izquierdo |
| `marca_izquierdo` | text | ✅ Sí | Marca del audífono (Phonak, Widex, etc.) |
| `modelo_izquierdo` | text | ✅ Sí | Modelo específico del audífono |
| `tipo_izquierdo` | select | ❌ No | Tipo de audífono (BTE, ITE, ITC, CIC, RIC) |

### **Sección 3: Audífono Derecho**

| Campo | Tipo | Obligatorio | Descripción |
|-------|------|-------------|-------------|
| `n_serie_derecho` | text | ❌ No | Número de serie del audífono derecho |
| `marca_derecho` | text | ✅ Sí | Marca del audífono |
| `modelo_derecho` | text | ✅ Sí | Modelo específico del audífono |
| `tipo_derecho` | select | ❌ No | Tipo de audífono |

### **Sección 4: Información Adicional**

| Campo | Tipo | Obligatorio | Descripción |
|-------|------|-------------|-------------|
| `estado_audifono` | select | ❌ No | Estado físico del audífono (Excelente, Bueno, Regular, Malo, Requiere reparación) |
| `motivo_control` | select | ❌ No | Razón del control (Rutinario, Calibración, Reparación, Ajuste, Limpieza, etc.) |
| `observaciones` | textarea | ❌ No | Observaciones del control |

### **Datos Adicionales Capturados**

Se incluyen automáticamente los datos del control actual:
- `fecha_control` - Del campo `#fecha_ex`
- `examinador` - Del campo `#profesional`
- `examen_cae` - Del campo `#ex_fis_control_audif`
- `id_paciente` - Del input hidden `#id_paciente_externo`

---

## 🎨 Elementos Visuales

### **Card Header**
- **Color**: Azul info (`bg-info`)
- **Gradiente**: `linear-gradient(135deg, #17a2b8 0%, #138496 100%)`
- **Icono**: `feather icon-package`
- **Título**: "Registro de Audífono Externo"

### **Secciones con Iconos**
- 📦 **Procedencia**: `feather icon-info`
- 🎧 **Audífonos**: `feather icon-headphones`
- 📝 **Información Adicional**: `feather icon-file-text`

### **Alertas**
- **Info Box**: Fondo azul claro con borde, indica campos obligatorios
- **Color**: `#d1ecf1` (fondo), `#bee5eb` (borde)

### **Botones**
- **Cancelar**: `btn-secondary` con icono `feather icon-x`
- **Guardar**: `btn-primary` con icono `feather icon-save`

---

## 🔧 Funciones JavaScript

### **1. evaluar_tipo_control()**
```javascript
// Ubicación: Línea ~3596
// Propósito: Muestra u oculta el formulario según el tipo seleccionado
```
- Lee el valor del dropdown `#tipo_control_audifono`
- Si es "Otro proveedor":
  - Muestra `#div_otro_proveedor` (remove class `d-none`)
  - Oculta `#lista_audifonos_control` (add class `d-none`)
- Si es "Propio" u otro:
  - Oculta `#div_otro_proveedor`
  - Muestra `#lista_audifonos_control`

### **2. validar_formulario_audifono_externo()**
```javascript
// Ubicación: Línea ~3614
// Propósito: Validar campos obligatorios antes de guardar
// Retorna: boolean (true si válido, false si hay errores)
```

**Validaciones realizadas**:
1. ✅ Laboratorio/Proveedor no vacío
2. ✅ Fecha de adquisición no vacía
3. ✅ Marca audífono izquierdo no vacía
4. ✅ Modelo audífono izquierdo no vacío
5. ✅ Marca audífono derecho no vacía
6. ✅ Modelo audífono derecho no vacío

**Si hay errores**:
- Muestra SweetAlert con lista de errores en formato `<ul><li>`
- Retorna `false`

### **3. obtener_datos_audifono_externo()**
```javascript
// Ubicación: Línea ~3659
// Propósito: Recopilar todos los datos del formulario
// Retorna: Object con todos los campos
```

**Estructura del objeto retornado**:
```javascript
{
    // Datos del paciente
    id_paciente: number,
    
    // Procedencia
    procedencia_laboratorio: string,
    fecha_adquisicion: date,
    
    // Audífono izquierdo
    n_serie_izquierdo: string,
    marca_izquierdo: string,
    modelo_izquierdo: string,
    tipo_izquierdo: string,
    
    // Audífono derecho
    n_serie_derecho: string,
    marca_derecho: string,
    modelo_derecho: string,
    tipo_derecho: string,
    
    // Información adicional
    estado_audifono: string,
    motivo_control: string,
    observaciones: string,
    
    // Datos del control
    fecha_control: date,
    examinador: string,
    examen_cae: string,
    
    // Token CSRF
    _token: string
}
```

### **4. guardar_audifono_externo()**
```javascript
// Ubicación: Línea ~3697
// Propósito: Guardar el audífono externo (actualmente simulado)
```

**Flujo de ejecución**:
1. Llama a `validar_formulario_audifono_externo()`
2. Si válido, obtiene datos con `obtener_datos_audifono_externo()`
3. Muestra SweetAlert de confirmación
4. Si usuario confirma:
   - **ACTUAL**: Simula guardado con `setTimeout` (500ms)
   - **FUTURO**: Ejecutará AJAX POST al backend
5. Muestra mensaje de éxito
6. Limpia el formulario

**Código AJAX comentado (para backend)**:
```javascript
let url = "{{ route('laboratorio.audifono.externo.guardar') }}";
$.ajax({
    url: url,
    type: "POST",
    data: datos,
})
.done(function(response) {
    if(response.estado === 1){
        // Éxito
        swal({ icon: 'success', title: 'Audífono registrado' });
        limpiar_formulario_audifono_externo();
        mis_audifonos(); // Recargar lista
    } else {
        swal('Error', response.mensaje, 'error');
    }
})
.fail(function(jqXHR) {
    swal({ icon: 'error', title: 'Error' });
});
```

### **5. limpiar_formulario_audifono_externo()**
```javascript
// Ubicación: Línea ~3769
// Propósito: Resetear todos los campos del formulario
```

**Acciones**:
- Reset del formulario completo: `$('#form_audifono_externo')[0].reset()`
- Limpieza manual de todos los campos (por si reset no funciona)
- Restablece valor por defecto de `estado_audifono` a "Bueno"
- Registra en consola: "Formulario limpiado"

### **6. cancelar_audifono_externo()**
```javascript
// Ubicación: Línea ~3801
// Propósito: Cancelar el registro con confirmación
```

**Flujo**:
1. Muestra SweetAlert de advertencia
2. Opciones:
   - **"No, continuar editando"**: Cierra el diálogo, mantiene datos
   - **"Sí, cancelar"**: 
     - Limpia el formulario
     - Resetea dropdown a "Seleccione"
     - Oculta formulario (llama a `evaluar_tipo_control()`)
     - Muestra mensaje "Registro cancelado"

---

## 🎯 Ejemplo de Uso

### **Paso 1: Seleccionar "Otro proveedor"**
```javascript
$('#tipo_control_audifono').val('Otro proveedor');
evaluar_tipo_control();
```

### **Paso 2: Llenar formulario**
```javascript
$('#procedencia_laboratorio').val('Widex Chile');
$('#fecha_adquisicion_ext').val('2025-01-10');

// Audífono izquierdo
$('#n_serie_izq_ext').val('WX123456');
$('#marca_izq_ext').val('Widex');
$('#modelo_izq_ext').val('Moment 440');
$('#tipo_izq_ext').val('RIC');

// Audífono derecho
$('#n_serie_der_ext').val('WX123457');
$('#marca_der_ext').val('Widex');
$('#modelo_der_ext').val('Moment 440');
$('#tipo_der_ext').val('RIC');

// Adicional
$('#estado_audifono_ext').val('Excelente');
$('#motivo_control_ext').val('Control rutinario');
$('#observaciones_control_ext').val('Audífonos en perfecto estado, sin problemas reportados.');
```

### **Paso 3: Guardar**
```javascript
guardar_audifono_externo();
```

**Resultado esperado**:
1. Validación exitosa
2. Confirmación con datos
3. Guardado (simulado)
4. Mensaje: "Audífono registrado correctamente"
5. Formulario limpio

---

## 🔌 Integración Backend (Pendiente)

### **Ruta Requerida**
```php
// En routes/web.php
Route::post('/laboratorio/audifono/externo/guardar', [AudifonoExternoController::class, 'guardar'])
    ->name('laboratorio.audifono.externo.guardar')
    ->middleware(['role:Profesional|Admin|Asistente']);
```

### **Controlador Requerido**
```php
// app/Http/Controllers/AudifonoExternoController.php
public function guardar(Request $request)
{
    $request->validate([
        'procedencia_laboratorio' => 'required|string|max:255',
        'fecha_adquisicion' => 'required|date',
        'marca_izquierdo' => 'required|string|max:100',
        'modelo_izquierdo' => 'required|string|max:100',
        'marca_derecho' => 'required|string|max:100',
        'modelo_derecho' => 'required|string|max:100',
    ]);

    try {
        // Guardar en base de datos
        $audifono = AudifonoExterno::create([
            'id_paciente' => $request->id_paciente,
            'procedencia_laboratorio' => $request->procedencia_laboratorio,
            'fecha_adquisicion' => $request->fecha_adquisicion,
            // ... demás campos
        ]);

        return response()->json([
            'estado' => 1,
            'mensaje' => 'Audífono externo registrado correctamente',
            'audifono' => $audifono
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'estado' => 0,
            'mensaje' => 'Error al guardar: ' . $e->getMessage()
        ], 500);
    }
}
```

### **Modelo Requerido**
```php
// app/Models/AudifonoExterno.php
class AudifonoExterno extends Model
{
    protected $table = 'audifonos_externos';
    
    protected $fillable = [
        'id_paciente',
        'procedencia_laboratorio',
        'fecha_adquisicion',
        'n_serie_izquierdo',
        'marca_izquierdo',
        'modelo_izquierdo',
        'tipo_izquierdo',
        'n_serie_derecho',
        'marca_derecho',
        'modelo_derecho',
        'tipo_derecho',
        'estado_audifono',
        'motivo_control',
        'observaciones',
        'fecha_control',
        'examinador',
        'examen_cae',
    ];

    protected $casts = [
        'fecha_adquisicion' => 'date',
        'fecha_control' => 'date',
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'id_paciente');
    }
}
```

### **Migración Requerida**
```php
// database/migrations/2025_01_14_XXXXXX_create_audifonos_externos_table.php
public function up()
{
    Schema::create('audifonos_externos', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('id_paciente');
        $table->string('procedencia_laboratorio');
        $table->date('fecha_adquisicion');
        
        // Audífono izquierdo
        $table->string('n_serie_izquierdo')->nullable();
        $table->string('marca_izquierdo');
        $table->string('modelo_izquierdo');
        $table->string('tipo_izquierdo')->nullable();
        
        // Audífono derecho
        $table->string('n_serie_derecho')->nullable();
        $table->string('marca_derecho');
        $table->string('modelo_derecho');
        $table->string('tipo_derecho')->nullable();
        
        // Información adicional
        $table->string('estado_audifono')->nullable();
        $table->string('motivo_control')->nullable();
        $table->text('observaciones')->nullable();
        
        // Datos del control
        $table->date('fecha_control')->nullable();
        $table->string('examinador')->nullable();
        $table->text('examen_cae')->nullable();
        
        $table->timestamps();
        $table->softDeletes();
        
        // Índices
        $table->index('id_paciente');
        $table->index('procedencia_laboratorio');
        $table->index('fecha_adquisicion');
        
        // Foreign key
        // $table->foreign('id_paciente')->references('id')->on('pacientes')->onDelete('cascade');
    });
}
```

---

## 📊 Datos Esperados en el Backend

### **Request esperado**
```json
{
    "id_paciente": 123,
    "procedencia_laboratorio": "Widex Chile",
    "fecha_adquisicion": "2025-01-10",
    "n_serie_izquierdo": "WX123456",
    "marca_izquierdo": "Widex",
    "modelo_izquierdo": "Moment 440",
    "tipo_izquierdo": "RIC",
    "n_serie_derecho": "WX123457",
    "marca_derecho": "Widex",
    "modelo_derecho": "Moment 440",
    "tipo_derecho": "RIC",
    "estado_audifono": "Excelente",
    "motivo_control": "Control rutinario",
    "observaciones": "Audífonos en perfecto estado",
    "fecha_control": "2025-01-14",
    "examinador": "Dr. Juan Pérez",
    "examen_cae": "CAE sin obstrucciones",
    "_token": "csrf_token_here"
}
```

### **Response esperado (éxito)**
```json
{
    "estado": 1,
    "mensaje": "Audífono externo registrado correctamente",
    "audifono": {
        "id": 45,
        "id_paciente": 123,
        "procedencia_laboratorio": "Widex Chile",
        // ... todos los campos
        "created_at": "2025-01-14T10:30:00.000000Z"
    }
}
```

### **Response esperado (error)**
```json
{
    "estado": 0,
    "mensaje": "Error al guardar: descripción del error"
}
```

---

## 🧪 Testing

### **Pruebas Manuales**

1. **Validación de campos obligatorios**:
   ```javascript
   // Dejar vacío procedencia_laboratorio
   guardar_audifono_externo();
   // Debe mostrar error
   ```

2. **Guardado exitoso**:
   ```javascript
   // Llenar todos los campos obligatorios
   guardar_audifono_externo();
   // Debe confirmar y mostrar éxito
   ```

3. **Cancelación**:
   ```javascript
   // Llenar formulario
   cancelar_audifono_externo();
   // Confirmar cancelación
   // Formulario debe quedar limpio
   ```

4. **Toggle de formulario**:
   ```javascript
   // Seleccionar "Otro proveedor"
   evaluar_tipo_control();
   // Formulario debe aparecer

   // Seleccionar "Propio"
   evaluar_tipo_control();
   // Formulario debe ocultarse
   ```

---

## 🐛 Troubleshooting

### **Problema 1: Formulario no aparece**
**Síntoma**: Al seleccionar "Otro proveedor", no se muestra el formulario

**Soluciones**:
```javascript
// 1. Verificar ID del dropdown
console.log($('#tipo_control_audifono').length); // Debe ser 1

// 2. Verificar valor seleccionado
console.log($('#tipo_control_audifono').val()); // Debe ser "Otro proveedor"

// 3. Verificar ID del div
console.log($('#div_otro_proveedor').length); // Debe ser 1

// 4. Forzar mostrar
$('#div_otro_proveedor').removeClass('d-none');
```

### **Problema 2: Validación no funciona**
**Síntoma**: El formulario se envía sin validar campos

**Soluciones**:
```javascript
// 1. Verificar función existe
console.log(typeof validar_formulario_audifono_externo); // Debe ser 'function'

// 2. Probar validación manualmente
let valido = validar_formulario_audifono_externo();
console.log('Validación:', valido);

// 3. Verificar valores de campos
console.log('Laboratorio:', $('#procedencia_laboratorio').val());
console.log('Fecha:', $('#fecha_adquisicion_ext').val());
```

### **Problema 3: Botones no responden**
**Síntoma**: Los botones no ejecutan las funciones

**Soluciones**:
```javascript
// 1. Verificar onclick en HTML
// Buscar: onclick="guardar_audifono_externo()"

// 2. Asignar manualmente
$('#btn-guardar-audifono-ext').off('click').on('click', function(){
    guardar_audifono_externo();
});

// 3. Verificar errores en consola
// F12 → Console → Buscar errores en rojo
```

### **Problema 4: Animación no se ve**
**Síntoma**: El formulario aparece sin animación fadeIn

**Soluciones**:
```css
/* Verificar que el CSS de animación esté cargado */
#div_otro_proveedor {
    animation: fadeIn 0.5s ease-in-out !important;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-20px); }
    to { opacity: 1; transform: translateY(0); }
}
```

---

## 🎨 Personalización

### **Cambiar colores del formulario**
```css
/* En @section('page-style') */

/* Color principal (azul → verde) */
.card.border-info {
    border-color: #28a745 !important; /* Verde */
}

.card-header.bg-info {
    background: linear-gradient(135deg, #28a745 0%, #218838 100%);
}

#div_otro_proveedor .form-control:focus {
    border-color: #28a745;
    box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
}
```

### **Agregar nuevos campos**
```html
<!-- En el formulario HTML -->
<div class="form-group col-sm-12 col-md-6">
    <label class="floating-label-activo-sm">Nuevo Campo</label>
    <input type="text" class="form-control form-control-sm" 
           id="nuevo_campo" name="nuevo_campo">
</div>
```

```javascript
// En obtener_datos_audifono_externo()
nuevo_campo: $('#nuevo_campo').val().trim(),
```

### **Modificar opciones de tipo de audífono**
```html
<select class="form-control form-control-sm" id="tipo_izq_ext">
    <option value="">Seleccione</option>
    <option value="BTE">Retroauricular (BTE)</option>
    <!-- Agregar nuevas opciones aquí -->
    <option value="NUEVO">Nueva Opción</option>
</select>
```

---

## 📚 Referencias

- **Bootstrap 4.6**: https://getbootstrap.com/docs/4.6/
- **jQuery**: https://api.jquery.com/
- **SweetAlert**: https://sweetalert.js.org/
- **Feather Icons**: https://feathericons.com/

---

## ✅ Checklist de Implementación

### **Frontend (Completado)**
- [x] Formulario HTML con todos los campos
- [x] Estilos CSS con animaciones
- [x] Función `evaluar_tipo_control()`
- [x] Función `validar_formulario_audifono_externo()`
- [x] Función `obtener_datos_audifono_externo()`
- [x] Función `guardar_audifono_externo()`
- [x] Función `limpiar_formulario_audifono_externo()`
- [x] Función `cancelar_audifono_externo()`
- [x] Integración con SweetAlert
- [x] Mensajes de error informativos
- [x] Simulación de guardado

### **Backend (Pendiente)**
- [ ] Crear migración `audifonos_externos`
- [ ] Crear modelo `AudifonoExterno`
- [ ] Crear controlador `AudifonoExternoController`
- [ ] Agregar ruta en `web.php`
- [ ] Descomentar código AJAX en frontend
- [ ] Implementar validación en backend
- [ ] Agregar relación en modelo `Paciente`
- [ ] Crear función `mis_audifonos()` para listar
- [ ] Tests unitarios
- [ ] Tests de integración

---

## 📞 Soporte

Para dudas o problemas:
1. Revisar la consola del navegador (F12)
2. Verificar que todos los IDs coincidan
3. Comprobar que jQuery y SweetAlert estén cargados
4. Revisar la sección de Troubleshooting

---

**Última actualización**: 14 de octubre de 2025  
**Versión**: 1.0.0  
**Estado**: Frontend completo, Backend pendiente
