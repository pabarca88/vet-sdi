<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarritoCompra;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * MÉTODOS PARA AGREGAR AL LABORATORIO CONTROLLER
 *
 * Copia estos métodos dentro de tu clase LaboratorioController
 */

/**
 * Agregar producto al carrito
 */
public function agregarAlCarrito(Request $request)
{
    try {
        $validatedData = $request->validate([
            'id_producto' => 'required|integer|exists:productos,id',
            'cantidad' => 'integer|min:1',
            'id_paciente' => 'nullable|integer|exists:pacientes,id',
            'id_ficha' => 'nullable|integer',
            'precio_unitario' => 'nullable|numeric|min:0',
            'descuento' => 'nullable|numeric|min:0',
            'observaciones' => 'nullable|string|max:500',
        ]);

        // Obtener producto
        $producto = Producto::with(['tipoProducto', 'marca', 'bodega'])
                            ->findOrFail($request->id_producto);

        // Verificar stock
        if ($producto->stock_actual < ($request->cantidad ?? 1)) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Stock insuficiente. Disponible: ' . $producto->stock_actual
            ], 400);
        }

        // Obtener datos del usuario/profesional
        $id_usuario = Auth::id();
        $profesional = \App\Models\Profesional::where('id_usuario', $id_usuario)->first();
        $session_id = session()->getId();

        // Verificar si el producto ya está en el carrito
        $itemExistente = CarritoCompra::activos()
                                      ->where('id_producto', $producto->id)
                                      ->where(function($q) use ($id_usuario, $session_id) {
                                          $q->where('id_usuario', $id_usuario)
                                            ->orWhere('session_id', $session_id);
                                      })
                                      ->first();

        if ($itemExistente) {
            // Actualizar cantidad
            $nuevaCantidad = $itemExistente->cantidad + ($request->cantidad ?? 1);

            if ($producto->stock_actual < $nuevaCantidad) {
                return response()->json([
                    'estado' => 0,
                    'mensaje' => 'Stock insuficiente para la cantidad solicitada. Disponible: ' . $producto->stock_actual
                ], 400);
            }

            $itemExistente->actualizarCantidad($nuevaCantidad);

            return response()->json([
                'estado' => 1,
                'mensaje' => 'Cantidad actualizada en el carrito',
                'item' => $itemExistente,
                'total_carrito' => CarritoCompra::obtenerTotal($id_usuario, $session_id),
                'cantidad_items' => CarritoCompra::contarItems($id_usuario, $session_id)
            ]);
        }

        // Crear nuevo item en el carrito
        $carritoItem = new CarritoCompra();
        $carritoItem->id_usuario = $id_usuario;
        $carritoItem->id_profesional = $profesional ? $profesional->id : null;
        $carritoItem->id_paciente = $request->id_paciente;
        $carritoItem->id_ficha = $request->id_ficha;
        $carritoItem->id_producto = $producto->id;

        // Cache de datos del producto
        $carritoItem->codigo_producto = $producto->codigo_interno;
        $carritoItem->nombre_producto = $producto->nombre;
        $carritoItem->marca_producto = $producto->marca ? $producto->marca->nombre : null;
        $carritoItem->tipo_producto = $producto->tipoProducto ? $producto->tipoProducto->nombre : null;
        $carritoItem->image_path = $producto->image_path;

        // Cantidades y precios
        $carritoItem->cantidad = $request->cantidad ?? 1;
        $carritoItem->precio_unitario = $request->precio_unitario ?? 0;
        $carritoItem->descuento = $request->descuento ?? 0;
        $carritoItem->stock_disponible = $producto->stock_actual;

        // Información adicional
        $carritoItem->observaciones = $request->observaciones;
        $carritoItem->session_id = $session_id;
        $carritoItem->id_bodega = $producto->id_bodega;

        // Establecer expiración (opcional - 24 horas)
        $carritoItem->expira_en = now()->addHours(24);

        // Calcular subtotal
        $carritoItem->calcularSubtotal();

        $carritoItem->save();

        return response()->json([
            'estado' => 1,
            'mensaje' => 'Producto agregado al carrito exitosamente',
            'item' => $carritoItem,
            'total_carrito' => CarritoCompra::obtenerTotal($id_usuario, $session_id),
            'cantidad_items' => CarritoCompra::contarItems($id_usuario, $session_id)
        ]);

    } catch (\Illuminate\Validation\ValidationException $e) {
        return response()->json([
            'estado' => 0,
            'mensaje' => 'Error de validación',
            'errores' => $e->errors()
        ], 422);
    } catch (\Exception $e) {
        \Log::error('Error al agregar producto al carrito', [
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ]);

        return response()->json([
            'estado' => 0,
            'mensaje' => 'Error al agregar al carrito: ' . $e->getMessage()
        ], 500);
    }
}

/**
 * Obtener items del carrito
 */
public function obtenerCarrito(Request $request)
{
    try {
        $id_usuario = Auth::id();
        $session_id = session()->getId();

        $items = CarritoCompra::with(['producto', 'paciente'])
                              ->activos()
                              ->noExpirados()
                              ->where(function($q) use ($id_usuario, $session_id) {
                                  $q->where('id_usuario', $id_usuario)
                                    ->orWhere('session_id', $session_id);
                              })
                              ->orderBy('created_at', 'desc')
                              ->get();

        $total = CarritoCompra::obtenerTotal($id_usuario, $session_id);
        $cantidadTotal = CarritoCompra::contarItems($id_usuario, $session_id);

        return response()->json([
            'estado' => 1,
            'items' => $items,
            'total' => $total,
            'cantidad_items' => $cantidadTotal,
            'mensaje' => 'Carrito obtenido exitosamente'
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'estado' => 0,
            'mensaje' => 'Error al obtener carrito: ' . $e->getMessage()
        ], 500);
    }
}

/**
 * Actualizar cantidad de un item
 */
public function actualizarCantidadCarrito(Request $request)
{
    try {
        $validated = $request->validate([
            'id_item' => 'required|integer|exists:carrito_compras,id',
            'cantidad' => 'required|integer|min:1'
        ]);

        $item = CarritoCompra::findOrFail($request->id_item);

        // Verificar que el item pertenece al usuario
        $id_usuario = Auth::id();
        if ($item->id_usuario != $id_usuario) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'No autorizado'
            ], 403);
        }

        // Verificar stock
        if ($item->producto && $item->producto->stock_actual < $request->cantidad) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Stock insuficiente. Disponible: ' . $item->producto->stock_actual
            ], 400);
        }

        $item->actualizarCantidad($request->cantidad);

        return response()->json([
            'estado' => 1,
            'mensaje' => 'Cantidad actualizada',
            'item' => $item,
            'total_carrito' => CarritoCompra::obtenerTotal($id_usuario)
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'estado' => 0,
            'mensaje' => 'Error al actualizar cantidad: ' . $e->getMessage()
        ], 500);
    }
}

/**
 * Eliminar item del carrito
 */
public function eliminarDelCarrito(Request $request)
{
    try {
        $validated = $request->validate([
            'id_item' => 'required|integer|exists:carrito_compras,id'
        ]);

        $item = CarritoCompra::findOrFail($request->id_item);

        // Verificar que el item pertenece al usuario
        $id_usuario = Auth::id();
        if ($item->id_usuario != $id_usuario) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'No autorizado'
            ], 403);
        }

        $item->delete(); // Soft delete

        $session_id = session()->getId();

        return response()->json([
            'estado' => 1,
            'mensaje' => 'Producto eliminado del carrito',
            'total_carrito' => CarritoCompra::obtenerTotal($id_usuario, $session_id),
            'cantidad_items' => CarritoCompra::contarItems($id_usuario, $session_id)
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'estado' => 0,
            'mensaje' => 'Error al eliminar del carrito: ' . $e->getMessage()
        ], 500);
    }
}

/**
 * Vaciar carrito completo
 */
public function vaciarCarrito(Request $request)
{
    try {
        $id_usuario = Auth::id();
        $session_id = session()->getId();

        CarritoCompra::vaciarCarrito($id_usuario, $session_id);

        return response()->json([
            'estado' => 1,
            'mensaje' => 'Carrito vaciado exitosamente'
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'estado' => 0,
            'mensaje' => 'Error al vaciar carrito: ' . $e->getMessage()
        ], 500);
    }
}

/**
 * Procesar venta (finalizar carrito)
 */
public function procesarVentaCarrito(Request $request)
{
    try {
        $validated = $request->validate([
            'id_paciente' => 'required|integer|exists:pacientes,id',
            'id_ficha' => 'nullable|integer',
            'metodo_pago' => 'required|string',
            'observaciones' => 'nullable|string'
        ]);

        $id_usuario = Auth::id();
        $session_id = session()->getId();

        DB::beginTransaction();

        // Obtener items del carrito
        $items = CarritoCompra::activos()
                              ->noExpirados()
                              ->where(function($q) use ($id_usuario, $session_id) {
                                  $q->where('id_usuario', $id_usuario)
                                    ->orWhere('session_id', $session_id);
                              })
                              ->get();

        if ($items->isEmpty()) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'El carrito está vacío'
            ], 400);
        }

        // Verificar stock de todos los productos
        foreach ($items as $item) {
            if (!$item->tieneStockDisponible()) {
                DB::rollBack();
                return response()->json([
                    'estado' => 0,
                    'mensaje' => 'Stock insuficiente para: ' . $item->nombre_producto
                ], 400);
            }
        }

        // TODO: Aquí debes implementar la lógica de crear la venta
        // Por ejemplo, crear un registro en tabla 'ventas' y 'detalle_ventas'
        // Descontar stock, etc.

        // Marcar items como procesados
        foreach ($items as $item) {
            $item->marcarProcesado();

            // Descontar stock
            $producto = $item->producto;
            if ($producto) {
                $producto->stock_actual -= $item->cantidad;
                $producto->save();
            }
        }

        DB::commit();

        return response()->json([
            'estado' => 1,
            'mensaje' => 'Venta procesada exitosamente',
            'items_procesados' => $items->count(),
            'total' => $items->sum('subtotal')
        ]);

    } catch (\Exception $e) {
        DB::rollBack();

        \Log::error('Error al procesar venta del carrito', [
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ]);

        return response()->json([
            'estado' => 0,
            'mensaje' => 'Error al procesar venta: ' . $e->getMessage()
        ], 500);
    }
}
