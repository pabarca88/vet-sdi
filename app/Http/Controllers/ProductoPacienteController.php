<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MisProducto;
use App\Models\Paciente;
use App\Mail\NotificacionDevolucionProducto;
use App\Models\Profesional;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

// Mail
use Illuminate\Support\Facades\Mail;

class ProductoPacienteController extends Controller
{
    /**
     * Listar productos de un paciente
     */
    public function listar(Request $request)
    {
        try {
            $id_paciente = $request->id_paciente;

            if (!$id_paciente) {
                return response()->json([
                    'estado' => 0,
                    'mensaje' => 'ID de paciente requerido'
                ], 400);
            }

            // Cargar relaciones anidadas: producto.marca, producto.tipoProducto
            $productos = MisProducto::with([
                                        'producto.marca',
                                        'producto.tipoProducto',
                                        'producto.bodega',
                                        'profesional',
                                        'lugarAtencion'
                                    ])
                                    ->porPaciente($id_paciente)
                                    ->activos()
                                    ->orderBy('fecha_compra', 'desc')
                                    ->get();

            return response()->json([
                'estado' => 1,
                'mensaje' => 'Productos obtenidos exitosamente',
                'productos' => $productos
            ]);

        } catch (\Exception $e) {
            Log::error('Error al listar productos del paciente', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'estado' => 0,
                'mensaje' => 'Error al obtener productos: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Guardar producto asignado a un paciente
     *
     * @param int $id_producto ID del producto
     * @param int $id_paciente ID del paciente
     * @param int $cantidad Cantidad de productos
     * @param float $precio_unitario Precio unitario
     * @param float $descuento Descuento aplicado
     * @param string|null $observaciones Observaciones adicionales
     * @param int $id_usuario ID del usuario que registra
     * @return array
     */
    public function guardar(
        $id_producto,
        $id_paciente,
        $cantidad = 1,
        $precio_unitario = 0,
        $descuento = 0,
        $observaciones = null,
        $tiene_garantia = 0,
        $tipo_garantia = null,
        $valor_garantia = null,
        $id_usuario = null,
        $fecha_devolucion = null,
        $id_lugar_atencion = null,
        $estado = 'activo'
    ) {
        try {
            DB::beginTransaction();

            // Obtener el profesional desde el usuario
            $id_usuario = $id_usuario ?? Auth::id();
            $profesional = Profesional::where('id_usuario', $id_usuario)->first();

            if (!$profesional) {
                Log::warning('Profesional no encontrado para usuario', ['id_usuario' => $id_usuario]);

                // Si no se encuentra profesional, intentar usar el ID directamente
                // Esto es para casos donde se llama desde otros contextos
                $profesional_id = $id_usuario;
                $lugar_atencion_id = null;
            } else {
                $profesional_id = $profesional->id;

                // Obtener el lugar de atención activo del profesional
                $lugar_atencion = $profesional->lugaresAtencion()
                                              ->wherePivot('estado', 1)
                                              ->first();

                $lugar_atencion_id = $lugar_atencion ? $lugar_atencion->id : null;
            }

            // Construir observaciones con información de la compra
            $observaciones_completas = [];
            

            if ($cantidad > 1) {
                $observaciones_completas[] = "Cantidad: {$cantidad}";
            }

            if ($precio_unitario > 0) {
                $precio_total = ($precio_unitario * $cantidad) - $descuento;
                $observaciones_completas[] = "Precio unitario: $" . number_format($precio_unitario, 0, ',', '.');

                if ($descuento > 0) {
                    $observaciones_completas[] = "Descuento: $" . number_format($descuento, 0, ',', '.');
                }

                $observaciones_completas[] = "Total: $" . number_format($precio_total, 0, ',', '.');
            }

            if ($observaciones) {
                $observaciones_completas[] = $observaciones;
            }
            
            if($id_lugar_atencion){
                $lugar_atencion_id = $id_lugar_atencion;
            }

            // Crear el registro
            $misProducto = new MisProducto();
            $misProducto->id_producto = $id_producto;
            $misProducto->id_paciente = $id_paciente;
            $misProducto->fecha_compra = now();
            $misProducto->fecha_devolucion = $fecha_devolucion;
            $misProducto->id_profesional = $profesional_id;
            $misProducto->id_lugar_atencion = $lugar_atencion_id;
            $misProducto->stock = $cantidad;
            $misProducto->observaciones = implode(' | ', $observaciones_completas);
            $misProducto->tiene_garantia = $tiene_garantia;
            $misProducto->tipo_garantia = $tipo_garantia;
            $misProducto->valor_garantia = $valor_garantia;
            if($estado === 'prestado'){
                $misProducto->estado = 2; // Prestado
            } else {
                $misProducto->estado = 1; // Activo
            }
            $misProducto->save();

            DB::commit();

            Log::info('Producto asignado a paciente exitosamente', [
                'id_registro' => $misProducto->id,
                'id_producto' => $id_producto,
                'id_paciente' => $id_paciente,
                'cantidad' => $cantidad,
                'profesional' => $profesional_id
            ]);

            return [
                'estado' => 1,
                'mensaje' => 'Producto asignado al paciente exitosamente',
                'registro' => $misProducto
            ];

        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Error al guardar producto del paciente', [
                'id_producto' => $id_producto,
                'id_paciente' => $id_paciente,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return [
                'estado' => 0,
                'mensaje' => 'Error al asignar producto: ' . $e->getMessage()
            ];
        }
    }

    /**
     * Evaluar/Calificar un producto del paciente (satisfacción)
     */
    public function evaluar(Request $request)
    {
        try {
            
            $validated = $request->validate([
                'id_producto' => 'required|exists:productos,id',
                'satisfaccion' => 'required|integer|min:1|max:5'
            ], [
                'satisfaccion.min' => 'La calificación mínima es 1 estrella',
                'satisfaccion.max' => 'La calificación máxima es 5 estrellas',
                'satisfaccion.required' => 'Debes seleccionar una calificación',
            ]);

            $misProducto = MisProducto::where('id_producto', $request->id_producto)
                                      ->where('id_paciente', $request->id_paciente)
                                      ->firstOrFail();
         
            
            // Opcional: Verificar que el paciente sea quien califica
            // if ($misProducto->id_paciente != $request->id_paciente_actual) {
            //     return response()->json([
            //         'estado' => 0,
            //         'mensaje' => 'No autorizado para calificar este producto'
            //     ], 403);
            // }

            $misProducto->satisfaccion = $request->satisfaccion;
            $misProducto->observaciones = $request->observaciones ?? $misProducto->observaciones;
            $misProducto->save();

            Log::info('Producto evaluado por paciente', [
                'id_mis_producto' => $misProducto->id,
                'id_producto' => $misProducto->id_producto,
                'id_paciente' => $misProducto->id_paciente,
                'satisfaccion' => $request->satisfaccion
            ]);

            return response()->json([
                'estado' => 1,
                'mensaje' => '¡Gracias por tu evaluación!',
                'satisfaccion' => $misProducto->satisfaccion,
                'satisfaccion_texto' => $misProducto->satisfaccion_texto,
                'satisfaccion_estrellas' => $misProducto->satisfaccion_estrellas
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Error de validación',
                'errores' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Error al evaluar producto', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'estado' => 0,
                'mensaje' => 'Error al guardar evaluación: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Actualizar estado de un producto del paciente
     */
    public function actualizarEstado(Request $request)
    {
        try {
            $validated = $request->validate([
                'id' => 'required|integer|exists:mis_productos,id',
                'estado' => 'required|integer|in:0,1'
            ]);

            $misProducto = MisProducto::findOrFail($request->id);
            $misProducto->estado = $request->estado;
            $misProducto->save();

            return response()->json([
                'estado' => 1,
                'mensaje' => 'Estado actualizado exitosamente',
                'registro' => $misProducto
            ]);

        } catch (\Exception $e) {
            Log::error('Error al actualizar estado del producto', [
                'error' => $e->getMessage()
            ]);

            return response()->json([
                'estado' => 0,
                'mensaje' => 'Error al actualizar estado: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Eliminar (soft delete) un producto del paciente
     */
    public function eliminar(Request $request)
    {
        try {
            $validated = $request->validate([
                'id' => 'required|integer|exists:mis_productos,id'
            ]);

            $misProducto = MisProducto::findOrFail($request->id);
            $misProducto->delete(); // Soft delete

            return response()->json([
                'estado' => 1,
                'mensaje' => 'Producto eliminado exitosamente'
            ]);

        } catch (\Exception $e) {
            Log::error('Error al eliminar producto del paciente', [
                'error' => $e->getMessage()
            ]);

            return response()->json([
                'estado' => 0,
                'mensaje' => 'Error al eliminar producto: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Obtener historial de productos de un paciente
     */
    public function historial(Request $request)
    {
        try {
            $id_paciente = $request->id_paciente;

            if (!$id_paciente) {
                return response()->json([
                    'estado' => 0,
                    'mensaje' => 'ID de paciente requerido'
                ], 400);
            }

            // Incluir productos eliminados en el historial con relaciones anidadas
            $productos = MisProducto::withTrashed()
                                    ->with([
                                        'producto.marca',
                                        'producto.tipoProducto',
                                        'producto.bodega',
                                        'profesional',
                                        'lugarAtencion'
                                    ])
                                    ->porPaciente($id_paciente)
                                    ->orderBy('fecha_compra', 'desc')
                                    ->get();

            return response()->json([
                'estado' => 1,
                'mensaje' => 'Historial obtenido exitosamente',
                'productos' => $productos
            ]);

        } catch (\Exception $e) {
            Log::error('Error al obtener historial de productos', [
                'error' => $e->getMessage()
            ]);

            return response()->json([
                'estado' => 0,
                'mensaje' => 'Error al obtener historial: ' . $e->getMessage()
            ], 500);
        }
    }

    public function dameProducto($id){
        $producto = MisProducto::with([
            'producto.marca',
            'producto.tipoProducto',
            'producto.bodega',
            'profesional',
            'lugarAtencion'
        ])->find($id);
        return response()->json([
            'estado' => 1,
            'mensaje' => 'Producto obtenido exitosamente',
            'producto' => $producto
        ]);
    }

    /**
     * Obtener estadísticas de satisfacción
     */
    public function estadisticasSatisfaccion(Request $request)
    {
        try {
            $query = MisProducto::whereNotNull('satisfaccion');

            // Filtrar por paciente si se proporciona
            if ($request->has('id_paciente')) {
                $query->porPaciente($request->id_paciente);
            }

            // Filtrar por profesional si se proporciona
            if ($request->has('id_profesional')) {
                $query->porProfesional($request->id_profesional);
            }

            // Filtrar por rango de fechas si se proporciona
            if ($request->has('fecha_inicio') && $request->has('fecha_fin')) {
                $query->porRangoFechas($request->fecha_inicio, $request->fecha_fin);
            }

            $total = $query->count();
            $promedio = $query->avg('satisfaccion');

            $distribucion = [
                5 => MisProducto::conSatisfaccion(5)->count(),
                4 => MisProducto::conSatisfaccion(4)->count(),
                3 => MisProducto::conSatisfaccion(3)->count(),
                2 => MisProducto::conSatisfaccion(2)->count(),
                1 => MisProducto::conSatisfaccion(1)->count(),
            ];

            $porcentajes = [];
            foreach ($distribucion as $nivel => $cantidad) {
                $porcentajes[$nivel] = $total > 0 ? round(($cantidad / $total) * 100, 2) : 0;
            }

            return response()->json([
                'estado' => 1,
                'total_calificaciones' => $total,
                'promedio' => round($promedio, 2),
                'distribucion' => $distribucion,
                'porcentajes' => $porcentajes,
                'sin_calificar' => MisProducto::whereNull('satisfaccion')->count()
            ]);

        } catch (\Exception $e) {
            Log::error('Error al obtener estadísticas de satisfacción', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'estado' => 0,
                'mensaje' => 'Error al obtener estadísticas: ' . $e->getMessage()
            ], 500);
        }
    }

    public function devolver(Request $request){

        $validated = $request->validate([
            'id_mis_producto' => 'required|integer|exists:mis_productos,id'
        ]);

        $misProducto = MisProducto::findOrFail($request->id_mis_producto);
   
        $cantidad = $misProducto->stock;
        $producto = Producto::find($misProducto->id_producto);
        $producto->stock_actual += $cantidad;
        $producto->save();
       

        // envio de mail al paciente notificando la devolucion
        $paciente = Paciente::find($misProducto->id_paciente);
   
        if($paciente && $paciente->email){
            Mail::to($paciente->email)->send(new NotificacionDevolucionProducto($paciente, $misProducto));
        }

         $misProducto->delete();

        return response()->json([
            'estado' => 1,
            'mensaje' => 'Producto devuelto exitosamente',
            'registro' => $misProducto
        ]);
    }
}
