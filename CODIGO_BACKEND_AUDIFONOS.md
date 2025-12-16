s# Código Backend para Búsqueda de Audífonos

## 1. Rutas (web.php)

Agrega estas rutas en tu archivo `routes/web.php`:

```php
// Rutas para búsqueda y gestión de audífonos
Route::get('/laboratorio/profesional/buscar-productos-audifonos', [App\Http\Controllers\LaboratorioController::class, 'buscarProductosAudifonos'])->name('laboratorio.profesional.buscar_productos_audifonos');
Route::get('/laboratorio/profesional/detalle-producto-audifono/{id}', [App\Http\Controllers\LaboratorioController::class, 'detalleProductoAudifono'])->name('laboratorio.profesional.detalle_producto_audifono');
```

## 2. Controlador (LaboratorioController.php)

Agrega estos métodos en tu controlador `app/Http/Controllers/LaboratorioController.php`:

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto; // Ajusta según tu modelo
use DB;

class LaboratorioController extends Controller
{
    /**
     * Buscar productos (audífonos, repuestos, pilas)
     */
    public function buscarProductosAudifonos(Request $request)
    {
        try {
            $termino = $request->input('termino', '');
            $tipo_producto = $request->input('tipo_producto', '');
            
            // Query base
            $query = DB::table('productos as p')
                ->leftJoin('tipo_producto as tp', 'p.id_tipo_producto', '=', 'tp.id')
                ->leftJoin('marcas as m', 'p.id_marca', '=', 'm.id')
                ->select(
                    'p.id',
                    'p.codigo_interno',
                    'p.nombre',
                    'p.stock_minimo',
                    'p.stock_maximo',
                    'p.stock_actual',
                    'p.imagen',
                    'p.descripcion',
                    'p.image_path',
                    'p.observaciones',
                    'tp.nombre as tipo_producto',
                    'm.nombre as marca'
                );
            
            // Filtrar por tipo de producto si se especifica
            if (!empty($tipo_producto)) {
                $query->where('p.id_tipo_producto', $tipo_producto);
            } else {
                // Si no se especifica, buscar solo en audífonos, repuestos y pilas
                $query->whereIn('p.id_tipo_producto', [9, 10, 11]); // Ajusta según tus IDs
            }
            
            // Buscar por término si se proporciona
            if (!empty($termino)) {
                $query->where(function($q) use ($termino) {
                    $q->where('p.codigo_interno', 'LIKE', "%{$termino}%")
                      ->orWhere('p.nombre', 'LIKE', "%{$termino}%")
                      ->orWhere('m.nombre', 'LIKE', "%{$termino}%")
                      ->orWhere('p.descripcion', 'LIKE', "%{$termino}%");
                });
            }
            
            // Ordenar por nombre
            $query->orderBy('p.nombre', 'asc');
            
            // Limitar resultados
            $productos = $query->limit(50)->get();
            
            return response()->json([
                'estado' => 1,
                'mensaje' => 'Búsqueda exitosa',
                'productos' => $productos,
                'total' => $productos->count()
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Error al buscar productos: ' . $e->getMessage(),
                'productos' => []
            ], 500);
        }
    }
    
    /**
     * Obtener detalle completo de un producto
     */
    public function detalleProductoAudifono($id)
    {
        try {
            $producto = DB::table('productos as p')
                ->leftJoin('tipo_producto as tp', 'p.id_tipo_producto', '=', 'tp.id')
                ->leftJoin('marcas as m', 'p.id_marca', '=', 'm.id')
                ->leftJoin('bodegas as b', 'p.id_bodega', '=', 'b.id')
                ->leftJoin('unidad_medida as um', 'p.id_unidad_medida', '=', 'um.id')
                ->select(
                    'p.*',
                    'tp.nombre as tipo_producto',
                    'm.nombre as marca',
                    'b.nombre as bodega',
                    'um.nombre as unidad_medida'
                )
                ->where('p.id', $id)
                ->first();
            
            if (!$producto) {
                return response()->json([
                    'estado' => 0,
                    'mensaje' => 'Producto no encontrado',
                    'producto' => null
                ], 404);
            }
            
            return response()->json([
                'estado' => 1,
                'mensaje' => 'Producto encontrado',
                'producto' => $producto
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Error al obtener detalle: ' . $e->getMessage(),
                'producto' => null
            ], 500);
        }
    }
}
```

## 3. Modelo Producto (opcional - si usas Eloquent)

Si prefieres usar Eloquent en lugar de Query Builder:

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    
    protected $fillable = [
        'codigo_interno',
        'nombre',
        'stock_minimo',
        'stock_maximo',
        'stock_actual',
        'imagen',
        'descripcion',
        'id_tipo_producto',
        'id_unidad_medida',
        'id_marca',
        'id_bodega',
        'observaciones',
        'almacenamiento',
        'id_tipo_almacenamiento',
        'temperatura',
        'id_temperatura',
        'image_path',
        'otros',
    ];
    
    // Relaciones
    public function tipoProducto()
    {
        return $this->belongsTo(TipoProducto::class, 'id_tipo_producto');
    }
    
    public function marca()
    {
        return $this->belongsTo(Marca::class, 'id_marca');
    }
    
    public function bodega()
    {
        return $this->belongsTo(Bodega::class, 'id_bodega');
    }
    
    public function unidadMedida()
    {
        return $this->belongsTo(UnidadMedida::class, 'id_unidad_medida');
    }
    
    // Scope para buscar
    public function scopeBuscar($query, $termino)
    {
        return $query->where(function($q) use ($termino) {
            $q->where('codigo_interno', 'LIKE', "%{$termino}%")
              ->orWhere('nombre', 'LIKE', "%{$termino}%")
              ->orWhere('descripcion', 'LIKE', "%{$termino}%");
        });
    }
    
    // Scope para tipo de producto
    public function scopeTipoProducto($query, $tipo)
    {
        return $query->where('id_tipo_producto', $tipo);
    }
}
```

## 4. Versión alternativa del controlador usando Eloquent:

```php
public function buscarProductosAudifonos(Request $request)
{
    try {
        $termino = $request->input('termino', '');
        $tipo_producto = $request->input('tipo_producto', '');
        
        $query = Producto::with(['tipoProducto', 'marca', 'bodega']);
        
        // Filtrar por tipo
        if (!empty($tipo_producto)) {
            $query->tipoProducto($tipo_producto);
        } else {
            $query->whereIn('id_tipo_producto', [9, 10, 11]);
        }
        
        // Buscar por término
        if (!empty($termino)) {
            $query->buscar($termino);
        }
        
        $productos = $query->orderBy('nombre', 'asc')
                          ->limit(50)
                          ->get()
                          ->map(function($producto) {
                              return [
                                  'id' => $producto->id,
                                  'codigo_interno' => $producto->codigo_interno,
                                  'nombre' => $producto->nombre,
                                  'stock_minimo' => $producto->stock_minimo,
                                  'stock_maximo' => $producto->stock_maximo,
                                  'stock_actual' => $producto->stock_actual,
                                  'imagen' => $producto->imagen,
                                  'descripcion' => $producto->descripcion,
                                  'image_path' => $producto->image_path,
                                  'observaciones' => $producto->observaciones,
                                  'tipo_producto' => $producto->tipoProducto->nombre ?? 'N/A',
                                  'marca' => $producto->marca->nombre ?? 'N/A',
                              ];
                          });
        
        return response()->json([
            'estado' => 1,
            'mensaje' => 'Búsqueda exitosa',
            'productos' => $productos,
            'total' => $productos->count()
        ]);
        
    } catch (\Exception $e) {
        return response()->json([
            'estado' => 0,
            'mensaje' => 'Error: ' . $e->getMessage(),
            'productos' => []
        ], 500);
    }
}
```

## 5. Ajustes según tu base de datos

**IMPORTANTE:** Ajusta estos valores según tu estructura de base de datos:

- **Tabla productos:** Verifica el nombre exacto de tu tabla
- **IDs de tipos de producto:** 
  - `9` = Audífonos (ajusta según tu BD)
  - `10` = Repuestos (ajusta según tu BD)
  - `11` = Pilas (ajusta según tu BD)
- **Nombres de columnas:** Verifica que coincidan con tu esquema
- **Relaciones:** Ajusta los nombres de las tablas relacionadas

## 6. Testing

Puedes probar la API directamente:

```bash
# Buscar todos los audífonos
curl "http://localhost/laboratorio/profesional/buscar-productos-audifonos?tipo_producto=9"

# Buscar por término
curl "http://localhost/laboratorio/profesional/buscar-productos-audifonos?termino=audifono&tipo_producto=9"

# Ver detalle
curl "http://localhost/laboratorio/profesional/detalle-producto-audifono/8"
```

## 7. Seguridad adicional (opcional)

Agrega middleware de autenticación si es necesario:

```php
Route::middleware(['auth'])->group(function () {
    Route::get('/laboratorio/profesional/buscar-productos-audifonos', [LaboratorioController::class, 'buscarProductosAudifonos'])->name('laboratorio.profesional.buscar_productos_audifonos');
    Route::get('/laboratorio/profesional/detalle-producto-audifono/{id}', [LaboratorioController::class, 'detalleProductoAudifono'])->name('laboratorio.profesional.detalle_producto_audifono');
});
```
