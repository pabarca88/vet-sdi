# Migración: Agregar campo numero_serie a productos

## 📋 Descripción
Migración para agregar el campo `numero_serie` a la tabla `productos`, ubicándolo después del campo `codigo_interno`.

## 🗄️ Cambios en la Base de Datos

### Campo agregado:
- **nombre**: `numero_serie`
- **tipo**: `VARCHAR(100)`
- **nullable**: `SI`
- **posición**: Después de `codigo_interno`
- **comentario**: "Número de serie del producto (para audífonos, equipos, etc.)"
- **índice**: `idx_numero_serie` (para búsquedas rápidas)

## 🚀 Ejecutar la Migración

```bash
# Ejecutar la migración
php artisan migrate

# Si necesitas revertir
php artisan migrate:rollback --step=1
```

## 📝 SQL Generado (Equivalente)

```sql
-- UP
ALTER TABLE `productos` 
ADD COLUMN `numero_serie` VARCHAR(100) NULL 
COMMENT 'Número de serie del producto (para audífonos, equipos, etc.)' 
AFTER `codigo_interno`;

ALTER TABLE `productos` 
ADD INDEX `idx_numero_serie` (`numero_serie`);

-- DOWN
ALTER TABLE `productos` 
DROP INDEX `idx_numero_serie`;

ALTER TABLE `productos` 
DROP COLUMN `numero_serie`;
```

## 💡 Uso en el Código

### 1. Crear producto con número de serie:
```php
$producto = new Producto();
$producto->codigo_interno = 'AUD-001';
$producto->numero_serie = 'SN-2025-ABC123';
$producto->nombre = 'Audífono Digital';
$producto->save();
```

### 2. Buscar por número de serie:
```php
// Búsqueda exacta
$producto = Producto::where('numero_serie', 'SN-2025-ABC123')->first();

// Búsqueda parcial
$productos = Producto::where('numero_serie', 'like', '%ABC%')->get();
```

### 3. Validación en formularios:
```php
$request->validate([
    'codigo_interno' => 'required|string|max:50',
    'numero_serie' => 'nullable|string|max:100|unique:productos,numero_serie',
    'nombre' => 'required|string|max:255',
]);
```

### 4. Mass Assignment:
```php
$producto = Producto::create([
    'codigo_interno' => 'AUD-001',
    'numero_serie' => 'SN-2025-ABC123',
    'nombre' => 'Audífono Digital Premium',
    'id_tipo_producto' => 9,
    'id_marca' => 3,
    // ... otros campos
]);
```

## 🎯 Casos de Uso

### Audífonos:
```php
// Registrar audífono con número de serie
$audifono = Producto::create([
    'codigo_interno' => 'AUD-PHONAK-001',
    'numero_serie' => 'PHK-2025-L-00123',
    'nombre' => 'Audífono Phonak Paradise P90-R',
    'id_tipo_producto' => 9, // Audífono
    'id_marca' => 3, // Phonak
    'stock_actual' => 1
]);

// Buscar audífono por serie para garantía
$audifono = Producto::where('numero_serie', 'PHK-2025-L-00123')->first();
```

### Equipos Médicos:
```php
$equipo = Producto::create([
    'codigo_interno' => 'EQUIP-AUDIO-001',
    'numero_serie' => 'GRASON-STADLER-2025-0456',
    'nombre' => 'Audiómetro Grason-Stadler GSI 61',
    'id_tipo_producto' => 15,
]);
```

## 🔍 Scopes Útiles (Opcional)

Puedes agregar estos scopes al modelo `Producto.php`:

```php
/**
 * Scope para buscar por número de serie
 */
public function scopePorNumeroSerie($query, $numero_serie)
{
    return $query->where('numero_serie', $numero_serie);
}

/**
 * Scope para productos con número de serie
 */
public function scopeConNumeroSerie($query)
{
    return $query->whereNotNull('numero_serie');
}

/**
 * Scope para productos sin número de serie
 */
public function scopeSinNumeroSerie($query)
{
    return $query->whereNull('numero_serie');
}
```

Uso:
```php
// Buscar por número de serie
$producto = Producto::porNumeroSerie('SN-2025-ABC123')->first();

// Listar todos los productos con número de serie
$productos_serie = Producto::conNumeroSerie()->get();

// Productos sin número de serie asignado
$productos_sin_serie = Producto::sinNumeroSerie()->get();
```

## 📊 Verificación Post-Migración

```sql
-- Verificar que el campo existe
DESCRIBE productos;

-- Verificar que el índice existe
SHOW INDEXES FROM productos WHERE Key_name = 'idx_numero_serie';

-- Verificar posición del campo
SELECT 
    ORDINAL_POSITION, 
    COLUMN_NAME, 
    COLUMN_TYPE, 
    IS_NULLABLE, 
    COLUMN_COMMENT
FROM 
    INFORMATION_SCHEMA.COLUMNS
WHERE 
    TABLE_SCHEMA = 'nombre_base_datos' 
    AND TABLE_NAME = 'productos'
    AND COLUMN_NAME IN ('codigo_interno', 'numero_serie', 'nombre')
ORDER BY 
    ORDINAL_POSITION;
```

## ✅ Checklist

- [x] Crear migración
- [x] Agregar campo `numero_serie` después de `codigo_interno`
- [x] Agregar índice para búsquedas
- [x] Actualizar `$fillable` en modelo Producto
- [ ] Ejecutar migración: `php artisan migrate`
- [ ] Verificar estructura de tabla
- [ ] Actualizar formularios de productos (si es necesario)
- [ ] Actualizar validaciones (si es necesario)
- [ ] Documentar uso en el equipo

## 🎯 Próximos Pasos Sugeridos

1. **Actualizar formularios**: Agregar campo número de serie en vistas de creación/edición
2. **Validación única**: Considerar si el número de serie debe ser único
3. **Auditoría**: Registrar cambios en número de serie
4. **Reportes**: Incluir número de serie en reportes de inventario
5. **Garantías**: Usar número de serie para tracking de garantías
6. **Mantenimiento**: Registrar mantenimientos por número de serie

## 📌 Notas Importantes

- ✅ El campo es **nullable** para no afectar productos existentes
- ✅ El campo tiene **índice** para búsquedas rápidas
- ✅ Longitud de 100 caracteres permite números de serie largos
- ✅ Compatible con rollback (reversible)
- ✅ No afecta funcionalidad existente
