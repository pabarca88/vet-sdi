# Migración y Modelo: mis_productos

## 📋 Descripción
Tabla para registrar los productos comprados/asignados a pacientes, incluyendo información del profesional, lugar de atención y observaciones.

## 🗄️ Estructura de la Tabla

| Campo              | Tipo                | Descripción                           |
|--------------------|---------------------|---------------------------------------|
| id                 | BIGINT UNSIGNED     | Clave primaria                        |
| id_producto        | BIGINT UNSIGNED     | ID del producto                       |
| id_paciente        | BIGINT UNSIGNED     | ID del paciente                       |
| fecha_compra       | DATE                | Fecha de compra/asignación            |
| id_profesional     | BIGINT UNSIGNED     | ID del profesional que asigna         |
| id_lugar_atencion  | BIGINT UNSIGNED     | ID del lugar de atención              |
| observaciones      | TEXT                | Observaciones (nullable)              |
| estado             | TINYINT             | 1=Activo, 0=Inactivo (default: 1)    |
| created_at         | TIMESTAMP           | Fecha de creación                     |
| updated_at         | TIMESTAMP           | Fecha de actualización                |
| deleted_at         | TIMESTAMP           | Fecha de eliminación (soft delete)    |

## 🚀 Ejecutar la Migración

```bash
# Ejecutar la migración
php artisan migrate

# Rollback si es necesario
php artisan migrate:rollback --step=1
```

## 📝 Ejemplos de Uso en el Controlador

### 1. Crear un Nuevo Registro
```php
use App\Models\MisProducto;

public function guardarProductoPaciente(Request $req)
{
    $misProducto = new MisProducto();
    $misProducto->id_producto = $req->id_producto;
    $misProducto->id_paciente = $req->id_paciente;
    $misProducto->fecha_compra = now(); // o $req->fecha_compra
    $misProducto->id_profesional = $req->id_profesional;
    $misProducto->id_lugar_atencion = $req->id_lugar_atencion;
    $misProducto->observaciones = $req->observaciones;
    $misProducto->estado = 1;
    $misProducto->save();

    return ['mensaje' => 'OK', 'producto' => $misProducto];
}
```

### 2. Crear con Mass Assignment
```php
$misProducto = MisProducto::create([
    'id_producto' => $req->id_producto,
    'id_paciente' => $req->id_paciente,
    'fecha_compra' => now(),
    'id_profesional' => $req->id_profesional,
    'id_lugar_atencion' => $req->id_lugar_atencion,
    'observaciones' => $req->observaciones,
    'estado' => 1,
]);
```

### 3. Obtener Productos de un Paciente
```php
// Productos activos de un paciente
$productos = MisProducto::porPaciente($id_paciente)
    ->activos()
    ->with(['producto', 'profesional', 'lugarAtencion'])
    ->orderBy('fecha_compra', 'desc')
    ->get();

// Productos con información relacionada
$productos = MisProducto::where('id_paciente', $id_paciente)
    ->with([
        'producto' => function($query) {
            $query->select('id', 'nombre', 'precio');
        },
        'profesional' => function($query) {
            $query->select('id', 'nombre', 'apellido');
        }
    ])
    ->get();
```

### 4. Productos por Profesional
```php
// Productos asignados por un profesional en el mes actual
$productos = MisProducto::porProfesional($id_profesional)
    ->porMes(date('m'), date('Y'))
    ->activos()
    ->count();
```

### 5. Productos en un Rango de Fechas
```php
$productos = MisProducto::porRangoFechas('2025-01-01', '2025-01-31')
    ->where('id_lugar_atencion', $id_lugar)
    ->with('producto')
    ->get();
```

### 6. Actualizar Estado
```php
// Desactivar un producto
$misProducto = MisProducto::find($id);
$misProducto->estado = 0;
$misProducto->save();

// O usando update
MisProducto::where('id', $id)->update(['estado' => 0]);
```

### 7. Soft Delete
```php
// Eliminar (soft delete)
$misProducto = MisProducto::find($id);
$misProducto->delete();

// Restaurar
$misProducto->restore();

// Eliminar permanentemente
$misProducto->forceDelete();

// Obtener incluyendo eliminados
$todos = MisProducto::withTrashed()->get();

// Solo eliminados
$eliminados = MisProducto::onlyTrashed()->get();
```

## 🔍 Ejemplos en Blade

### Mostrar Productos del Paciente
```blade
@foreach($productos as $producto)
    <div class="card">
        <div class="card-body">
            <h5>{{ $producto->producto->nombre }}</h5>
            <p>Fecha: {{ $producto->fecha_compra->format('d/m/Y') }}</p>
            <p>Profesional: {{ $producto->profesional->nombre }} {{ $producto->profesional->apellido }}</p>
            <p>Estado: 
                <span class="badge badge-{{ $producto->estado == 1 ? 'success' : 'danger' }}">
                    {{ $producto->estado_texto }}
                </span>
            </p>
            @if($producto->observaciones)
                <p><strong>Observaciones:</strong> {{ $producto->observaciones }}</p>
            @endif
        </div>
    </div>
@endforeach
```

## 📊 Consultas Útiles SQL

### Verificar la tabla
```sql
DESCRIBE mis_productos;
```

### Productos activos de un paciente
```sql
SELECT mp.*, p.nombre as producto_nombre, pr.nombre as profesional_nombre
FROM mis_productos mp
INNER JOIN productos p ON mp.id_producto = p.id
INNER JOIN profesionales pr ON mp.id_profesional = pr.id
WHERE mp.id_paciente = 123 AND mp.estado = 1
ORDER BY mp.fecha_compra DESC;
```

### Productos por mes
```sql
SELECT 
    MONTH(fecha_compra) as mes,
    COUNT(*) as total,
    SUM(CASE WHEN estado = 1 THEN 1 ELSE 0 END) as activos
FROM mis_productos
WHERE YEAR(fecha_compra) = 2025
GROUP BY MONTH(fecha_compra);
```

## 🔧 Agregar Campos Adicionales (Futuro)

Si necesitas agregar más campos, crea una nueva migración:

```bash
php artisan make:migration add_campos_to_mis_productos_table
```

```php
public function up()
{
    Schema::table('mis_productos', function (Blueprint $table) {
        $table->decimal('precio_compra', 10, 2)->nullable()->after('id_producto');
        $table->integer('cantidad')->default(1)->after('precio_compra');
        $table->string('lote', 50)->nullable()->after('cantidad');
        $table->date('fecha_vencimiento')->nullable()->after('lote');
    });
}
```

## ✅ Checklist de Implementación

- [x] Crear migración
- [x] Crear modelo
- [x] Definir relaciones
- [x] Definir scopes
- [x] Configurar fillable
- [x] Configurar casts
- [ ] Ejecutar migración
- [ ] Crear controlador (si es necesario)
- [ ] Crear rutas
- [ ] Crear vistas
- [ ] Probar funcionalidad

## 🎯 Siguiente Paso

Ejecuta la migración:
```bash
php artisan migrate
```

Verifica que se creó correctamente:
```bash
php artisan tinker
>>> \App\Models\MisProducto::count();
```
