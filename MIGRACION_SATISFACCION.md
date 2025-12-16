# Migración: Agregar campo satisfaccion a mis_productos

## 📋 Descripción
Migración para agregar el campo `satisfaccion` a la tabla `mis_productos` para registrar la satisfacción del paciente con el producto adquirido.

## 🗄️ Cambios en la Base de Datos

### Campo agregado:
- **nombre**: `satisfaccion`
- **tipo**: `TINYINT`
- **nullable**: `SI`
- **posición**: Después de `observaciones`
- **comentario**: "Nivel de satisfacción del paciente (1-5 estrellas)"
- **valores**: 1-5 (1=Muy insatisfecho, 5=Muy satisfecho)
- **índice**: `idx_satisfaccion` (para análisis y reportes)

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
ALTER TABLE `mis_productos` 
ADD COLUMN `satisfaccion` TINYINT NULL 
COMMENT 'Nivel de satisfacción del paciente (1-5 estrellas)' 
AFTER `observaciones`;

ALTER TABLE `mis_productos` 
ADD INDEX `idx_satisfaccion` (`satisfaccion`);

-- DOWN
ALTER TABLE `mis_productos` 
DROP INDEX `idx_satisfaccion`;

ALTER TABLE `mis_productos` 
DROP COLUMN `satisfaccion`;
```

## 💡 Uso en el Código

### 1. Guardar satisfacción al asignar producto:
```php
$misProducto = new MisProducto();
$misProducto->id_producto = $id_producto;
$misProducto->id_paciente = $id_paciente;
$misProducto->fecha_compra = now();
$misProducto->satisfaccion = 5; // 5 estrellas
$misProducto->save();
```

### 2. Actualizar satisfacción después:
```php
$producto = MisProducto::find($id);
$producto->satisfaccion = 4; // 4 estrellas
$producto->save();
```

### 3. Usar Scopes para filtrar:
```php
// Productos con satisfacción alta (4-5 estrellas)
$productosAlta = MisProducto::satisfaccionAlta()->get();

// Productos con satisfacción baja (1-2 estrellas)
$productosBaja = MisProducto::satisfaccionBaja()->get();

// Productos con satisfacción específica
$productos5Estrellas = MisProducto::conSatisfaccion(5)->get();

// Productos sin calificar
$sinCalificar = MisProducto::whereNull('satisfaccion')->get();
```

### 4. Usar Accessors:
```php
$producto = MisProducto::find(1);

// Texto descriptivo
echo $producto->satisfaccion_texto; 
// Output: "Muy satisfecho"

// Estrellas visuales
echo $producto->satisfaccion_estrellas;
// Output: "★★★★★" o "★★★☆☆"
```

## 🎯 Casos de Uso

### Registro de Satisfacción en Venta:
```php
// En LaboratorioController::procesarVentaCarrito()
foreach ($items as $item) {
    $resultado = $producto_paciente_controller->guardar(
        $item->id_producto, 
        $validated['id_paciente'], 
        $item->cantidad, 
        $item->precio_unitario, 
        $item->descuento, 
        $item->observaciones, 
        $id_usuario
    );
}

// Después de la entrega, el paciente califica
$misProducto = MisProducto::find($id);
$misProducto->satisfaccion = $request->calificacion; // 1-5
$misProducto->save();
```

### Endpoint para Calificar Producto:
```php
// En ProductoPacienteController
public function calificar(Request $request)
{
    $validated = $request->validate([
        'id' => 'required|integer|exists:mis_productos,id',
        'satisfaccion' => 'required|integer|min:1|max:5'
    ]);

    $misProducto = MisProducto::findOrFail($request->id);
    $misProducto->satisfaccion = $request->satisfaccion;
    $misProducto->save();

    return response()->json([
        'estado' => 1,
        'mensaje' => '¡Gracias por tu calificación!',
        'satisfaccion_texto' => $misProducto->satisfaccion_texto,
        'satisfaccion_estrellas' => $misProducto->satisfaccion_estrellas
    ]);
}
```

### Reportes de Satisfacción:
```php
// Promedio de satisfacción por producto
$promedios = DB::table('mis_productos')
    ->select('id_producto', DB::raw('AVG(satisfaccion) as promedio'))
    ->whereNotNull('satisfaccion')
    ->groupBy('id_producto')
    ->get();

// Productos con mejor calificación
$mejoresProductos = MisProducto::with('producto')
    ->select('id_producto', DB::raw('AVG(satisfaccion) as promedio'))
    ->whereNotNull('satisfaccion')
    ->groupBy('id_producto')
    ->having('promedio', '>=', 4)
    ->get();

// Productos que necesitan atención (baja satisfacción)
$productosAtencion = MisProducto::with('producto')
    ->satisfaccionBaja()
    ->get();
```

## 📊 Vista Blade - Mostrar Satisfacción

```blade
{{-- Mostrar calificación en lista de productos --}}
@foreach($productos as $producto)
    <div class="producto-item">
        <h5>{{ $producto->producto->nombre }}</h5>
        <div class="satisfaccion">
            @if($producto->satisfaccion)
                <span class="estrellas">{{ $producto->satisfaccion_estrellas }}</span>
                <small>({{ $producto->satisfaccion_texto }})</small>
            @else
                <span class="badge badge-secondary">Sin calificar</span>
            @endif
        </div>
    </div>
@endforeach

{{-- Formulario para calificar --}}
<form id="form-calificar" data-id="{{ $producto->id }}">
    <div class="rating">
        <label>¿Cómo calificarías este producto?</label>
        <div class="stars">
            @for($i = 1; $i <= 5; $i++)
                <i class="fa fa-star star" data-rating="{{ $i }}" 
                   style="cursor: pointer; color: {{ $producto->satisfaccion >= $i ? '#FFD700' : '#ccc' }}">
                </i>
            @endfor
        </div>
    </div>
</form>

<script>
// JavaScript para calificación con estrellas
$('.star').click(function() {
    let rating = $(this).data('rating');
    let id = $('#form-calificar').data('id');
    
    $.ajax({
        url: '/laboratorio/producto-paciente/calificar',
        method: 'POST',
        data: {
            id: id,
            satisfaccion: rating,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            if (response.estado === 1) {
                Swal.fire('¡Gracias!', response.mensaje, 'success');
                
                // Actualizar estrellas
                $('.star').each(function(index) {
                    if (index < rating) {
                        $(this).css('color', '#FFD700');
                    } else {
                        $(this).css('color', '#ccc');
                    }
                });
            }
        }
    });
});
</script>
```

## 📈 Dashboard de Satisfacción

```php
// En un Controller de Reportes
public function dashboardSatisfaccion()
{
    $stats = [
        'total_calificaciones' => MisProducto::whereNotNull('satisfaccion')->count(),
        'promedio_general' => MisProducto::whereNotNull('satisfaccion')->avg('satisfaccion'),
        'satisfaccion_5' => MisProducto::conSatisfaccion(5)->count(),
        'satisfaccion_4' => MisProducto::conSatisfaccion(4)->count(),
        'satisfaccion_3' => MisProducto::conSatisfaccion(3)->count(),
        'satisfaccion_2' => MisProducto::conSatisfaccion(2)->count(),
        'satisfaccion_1' => MisProducto::conSatisfaccion(1)->count(),
        'sin_calificar' => MisProducto::whereNull('satisfaccion')->count(),
    ];

    // Productos más/menos valorados
    $mejoresProductos = DB::table('mis_productos')
        ->join('productos', 'productos.id', '=', 'mis_productos.id_producto')
        ->select('productos.nombre', DB::raw('AVG(mis_productos.satisfaccion) as promedio'))
        ->whereNotNull('mis_productos.satisfaccion')
        ->groupBy('productos.id', 'productos.nombre')
        ->orderBy('promedio', 'desc')
        ->limit(10)
        ->get();

    return view('reportes.satisfaccion', compact('stats', 'mejoresProductos'));
}
```

## 🔍 Validación en Formularios

```php
// Validación para calificación
$request->validate([
    'satisfaccion' => 'nullable|integer|min:1|max:5'
]);

// Mensajes personalizados
$messages = [
    'satisfaccion.min' => 'La calificación mínima es 1 estrella',
    'satisfaccion.max' => 'La calificación máxima es 5 estrellas',
    'satisfaccion.integer' => 'La calificación debe ser un número entero',
];
```

## 📊 Consultas SQL Útiles

```sql
-- Promedio de satisfacción por producto
SELECT 
    p.nombre,
    AVG(mp.satisfaccion) as promedio,
    COUNT(*) as total_calificaciones
FROM mis_productos mp
JOIN productos p ON p.id = mp.id_producto
WHERE mp.satisfaccion IS NOT NULL
GROUP BY p.id, p.nombre
ORDER BY promedio DESC;

-- Distribución de calificaciones
SELECT 
    satisfaccion,
    COUNT(*) as cantidad,
    ROUND(COUNT(*) * 100.0 / (SELECT COUNT(*) FROM mis_productos WHERE satisfaccion IS NOT NULL), 2) as porcentaje
FROM mis_productos
WHERE satisfaccion IS NOT NULL
GROUP BY satisfaccion
ORDER BY satisfaccion DESC;

-- Productos sin calificar (más de 30 días)
SELECT 
    mp.*,
    p.nombre as producto_nombre,
    pac.nombres as paciente_nombre,
    DATEDIFF(NOW(), mp.fecha_compra) as dias_sin_calificar
FROM mis_productos mp
JOIN productos p ON p.id = mp.id_producto
JOIN pacientes pac ON pac.id = mp.id_paciente
WHERE mp.satisfaccion IS NULL
  AND mp.fecha_compra < DATE_SUB(NOW(), INTERVAL 30 DAY)
ORDER BY mp.fecha_compra ASC;
```

## ✅ Checklist

- [x] Crear migración
- [x] Agregar campo `satisfaccion` después de `observaciones`
- [x] Agregar índice para reportes
- [x] Actualizar `$fillable` en modelo MisProducto
- [x] Agregar cast para satisfaccion
- [x] Crear scopes útiles (satisfaccionAlta, satisfaccionBaja, etc.)
- [x] Crear accessors (satisfaccion_texto, satisfaccion_estrellas)
- [ ] Ejecutar migración: `php artisan migrate`
- [ ] Agregar ruta para calificación en web.php
- [ ] Crear método calificar() en ProductoPacienteController
- [ ] Crear interfaz de calificación en Blade
- [ ] Crear dashboard de satisfacción
- [ ] Configurar notificaciones para calificaciones bajas

## 🎯 Próximos Pasos Sugeridos

1. **Interfaz de Calificación**: Crear sistema de estrellas interactivo
2. **Email Follow-up**: Enviar email pidiendo calificación después de X días
3. **Dashboard**: Crear vista de satisfacción con gráficos
4. **Alertas**: Notificar cuando hay calificaciones bajas
5. **Incentivos**: Ofrecer beneficios por calificar productos
6. **Análisis**: Correlacionar satisfacción con otros indicadores
7. **Comentarios**: Agregar campo para comentarios además de estrellas

## 📌 Valores de Satisfacción

| Valor | Significado | Emoji | Color |
|-------|-------------|-------|-------|
| 5 | Muy satisfecho | ★★★★★ | Verde |
| 4 | Satisfecho | ★★★★☆ | Verde claro |
| 3 | Neutral | ★★★☆☆ | Amarillo |
| 2 | Insatisfecho | ★★☆☆☆ | Naranja |
| 1 | Muy insatisfecho | ★☆☆☆☆ | Rojo |
| NULL | Sin calificar | ☆☆☆☆☆ | Gris |

## 🔐 Consideraciones de Seguridad

- Validar que solo el paciente pueda calificar sus propios productos
- Limitar a una calificación por producto (o permitir re-calificación)
- Registrar IP y timestamp de calificaciones
- Prevenir spam de calificaciones
