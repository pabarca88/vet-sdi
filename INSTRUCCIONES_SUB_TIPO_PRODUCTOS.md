# INSTRUCCIONES PARA EJECUTAR LA MIGRACIÓN Y SEEDER

## 1. Ejecutar la migración

Abre PowerShell en el directorio del proyecto y ejecuta:

```powershell
cd c:\laragon\www\medichile_sistema
php artisan migrate
```

Esto creará la tabla `sub_tipo_productos` con los siguientes campos:
- `id` (PK)
- `id_tipo_producto` (FK)
- `nombre`
- `descripcion`
- `codigo`
- `activo`
- `orden`
- `created_at`
- `updated_at`
- `deleted_at` (soft deletes)

## 2. Ejecutar el seeder

```powershell
php artisan db:seed --class=SubTipoProductosSeeder
```

Esto insertará 3 registros:

| ID | id_tipo_producto | nombre    | descripción                           | código | activo | orden |
|----|------------------|-----------|---------------------------------------|--------|--------|-------|
| 1  | 9                | Audífonos | Audífonos para corrección auditiva    | AUD    | 1      | 1     |
| 2  | 9                | Repuestos | Repuestos y accesorios para audífonos | REP    | 1      | 2     |
| 3  | 9                | Pilas     | Pilas y baterías para audífonos       | PIL    | 1      | 3     |

## 3. Verificar los datos

```powershell
php artisan tinker
```

Luego ejecuta:

```php
\App\Models\SubTipoProducto::all();
\App\Models\SubTipoProducto::subtiposAudifonos();
```

## 4. Uso en el código

### Obtener todos los subtipos activos de audífonos:

```php
use App\Models\SubTipoProducto;

$subtipos = SubTipoProducto::subtiposAudifonos();
```

### Obtener subtipos por tipo de producto:

```php
$subtipos = SubTipoProducto::activos()
    ->porTipoProducto(9)
    ->ordenados()
    ->get();
```

### En el controlador (ejemplo):

```php
public function getSubTipos($idTipoProducto)
{
    $subtipos = SubTipoProducto::activos()
        ->porTipoProducto($idTipoProducto)
        ->ordenados()
        ->get();

    return response()->json([
        'estado' => 1,
        'subtipos' => $subtipos
    ]);
}
```

### En una vista Blade:

```blade
<select id="id_sub_tipo_producto" name="id_sub_tipo_producto" class="form-control">
    <option value="">Seleccione un subtipo</option>
    @foreach($subtipos as $subtipo)
        <option value="{{ $subtipo->id }}">{{ $subtipo->nombre }}</option>
    @endforeach
</select>
```

## 5. Actualizar tabla productos (si es necesario)

Si necesitas agregar el campo `id_sub_tipo_producto` a la tabla `productos`:

```powershell
php artisan make:migration add_id_sub_tipo_producto_to_productos_table
```

Y agregar en la migración:

```php
public function up()
{
    Schema::table('productos', function (Blueprint $table) {
        $table->unsignedBigInteger('id_sub_tipo_producto')->nullable()->after('id_tipo_producto');
        $table->index('id_sub_tipo_producto');
    });
}

public function down()
{
    Schema::table('productos', function (Blueprint $table) {
        $table->dropColumn('id_sub_tipo_producto');
    });
}
```

## 6. Queries SQL útiles

```sql
-- Ver todos los subtipos
SELECT * FROM sub_tipo_productos;

-- Ver subtipos de audífonos (tipo_producto = 9)
SELECT * FROM sub_tipo_productos WHERE id_tipo_producto = 9 AND activo = 1 ORDER BY orden;

-- Contar productos por subtipo
SELECT
    st.nombre as subtipo,
    COUNT(p.id) as total_productos
FROM sub_tipo_productos st
LEFT JOIN productos p ON st.id = p.id_sub_tipo_producto
WHERE st.id_tipo_producto = 9
GROUP BY st.id, st.nombre
ORDER BY st.orden;
```

## 7. Rollback (si es necesario)

Para revertir la migración:

```powershell
php artisan migrate:rollback --step=1
```

## Notas importantes:

- ✅ La tabla usa **soft deletes** (eliminación lógica)
- ✅ Todos los subtipos tienen `id_tipo_producto = 9` (Audífonos)
- ✅ El campo `activo` permite deshabilitar subtipos sin eliminarlos
- ✅ El campo `orden` permite ordenar los subtipos en listas desplegables
- ✅ El modelo incluye scopes útiles para consultas comunes
