<?php
namespace App\Http\Controllers;

use App\Models\Cotizacion;
use App\Models\CotizacionDetalle;
use App\Models\Instituciones;
use App\Models\Profesional;
use App\Models\Producto;
use App\Models\Sucursal;
use App\Models\LugarAtencion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;

class CotizacionController extends Controller
{
    /**
     * Buscar productos para cotización
     */
    public function buscarProductos(Request $request)
    {
        
        $query = Producto::query();

        // Filtro por tipo de producto (usando scope si existe)
        if ($request->filled('tipo')) {
            $query->tipoProducto($request->tipo);
        }

        // Búsqueda general (usando el scope buscar del modelo)
        if ($request->filled('busqueda')) {
            $busqueda = $request->busqueda;
            $query->where(function($q) use ($busqueda) {
                $q->where('codigo_interno', 'LIKE', "%{$busqueda}%")
                  ->orWhere('nombre', 'LIKE', "%{$busqueda}%")
                  ->orWhere('numero_serie', 'LIKE', "%{$busqueda}%")
                  ->orWhere('descripcion', 'LIKE', "%{$busqueda}%")
                  ->orWhereHas('marca', function($query) use ($busqueda) {
                      $query->where('nombre', 'LIKE', "%{$busqueda}%");
                  });
            });
        }

        // Filtrar por stock disponible (opcional)
        if ($request->filled('solo_con_stock')) {
            $query->where('stock_actual', '>', 0);
        }

        // Obtener productos con sus relaciones
        $productos = $query->with(['tipoProducto', 'marca', 'bodega'])
                          ->limit(20)
                          ->get()
                          ->map(function($producto) {
                              return [
                                  'id' => $producto->id,
                                  'codigo_interno' => $producto->codigo_interno,
                                  'numero_serie' => $producto->numero_serie,
                                  'nombre' => $producto->nombre,
                                  'descripcion' => $producto->descripcion,
                                  'stock_actual' => $producto->stock_actual,
                                  'stock_minimo' => $producto->stock_minimo,
                                  'stock_maximo' => $producto->stock_maximo,
                                  'image_path' => $producto->image_path,
                                  'tipo' => $producto->tipoProducto ? $producto->tipoProducto->nombre : null,
                                  'tipo_id' => $producto->id_tipo_producto,
                                  'marca' => $producto->marca ? $producto->marca->nombre : null,
                                  'marca_id' => $producto->id_marca,
                                  'bodega' => $producto->bodega ? $producto->bodega->nombre : null,
                                  'bodega_id' => $producto->id_bodega,
                                  // Precio con fallback
                                  'precio' => $producto->precio_unitario ?? $producto->precio_venta ?? 0,
                                  'precio_unitario' => $producto->precio_unitario ?? 0,
                                  'precio_venta' => $producto->precio_venta ?? 0,
                              ];
                          });

        return response()->json([
            'success' => true,
            'data' => $productos
        ]);
    }

    /**
     * Guardar borrador de cotización
     */
    public function guardarBorrador(Request $request)
    {

        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'productos' => 'required|array|min:1',
            'productos.*.id' => 'required|exists:productos,id',
            'productos.*.cantidad' => 'required|integer|min:1',
        ]);

        try {
            DB::beginTransaction();

            // Crear o actualizar cotización
            $cotizacion = $this->crearCotizacion($request, 'borrador');
            /*return response()->json([
                'success' => true,
                'message' => 'Borrador guardado exitosamente',
                'data' => $cotizacion
            ]);*/
            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Borrador guardado exitosamente',
                'data' => $cotizacion
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error al guardar borrador: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Generar vista previa PDF
     */
    public function vistaPrevia(Request $request)
    {
        try {

            $cotizacion = $this->prepararDatosCotizacion($request);

            $detalles = $request->productos ?? [];

            // Extraer foto_perfil del objeto cotizacion para pasarla separadamente
            $foto_perfil = $cotizacion->foto_perfil ?? null;

            $pdf = Pdf::loadView('PDF.cotizacion', compact('cotizacion', 'foto_perfil'));

            $filename = 'cotizacion_preview_' . time() . '.pdf';
            $path = 'public/temp/' . $filename;

            Storage::put($path, $pdf->output());

            return response()->json([
                'success' => true,
                'url' => Storage::url($path)
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al generar vista previa: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Generar cotización definitiva
     */
    public function generar(Request $request)
    {

        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'productos' => 'required|array|min:1',
        ]);

        try {
            DB::beginTransaction();

            // Crear cotización
            $cotizacion = $this->crearCotizacion($request, 'generada');

            // Generar número de cotizacion
            $cotizacion->numero = $this->generarNumeroCotizacion();

            // Obtener foto de perfil de la institución
            $foto_perfil = null;
            $sucursal = Sucursal::where('id_lugar_atencion', $request->id_lugar_atencion)->first();
            if($sucursal){
                $institucion = Instituciones::find($sucursal->id_institucion);
                $foto_perfil = $institucion->foto_perfil ?? null;
            }

            // Cargar relaciones necesarias para el PDF
            $cotizacion->load([
                'detalles.producto',
                'paciente',
                'profesional',
                'lugarAtencion.direccion'
            ]);

            // Generar PDF pasando la foto_perfil
            $pdfPath = $this->generarPDF($cotizacion, $foto_perfil);
            $cotizacion->pdf_path = $pdfPath;
            $cotizacion->save();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Cotización generada exitosamente',
                'numero' => $cotizacion->numero,
                'pdf_url' => Storage::url($pdfPath),
                'data' => $cotizacion
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error al generar cotización: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Enviar cotización por email
     */
    public function enviarEmail(Request $request)
    {
        $request->validate([
            'email_destino' => 'required|email',
            'paciente_id' => 'required|exists:pacientes,id',
            'productos' => 'required|array|min:1',
        ]);

        try {
            DB::beginTransaction();

            // Crear o recuperar cotización
            $cotizacion = $this->crearCotizacion($request, 'enviada');

            if (!$cotizacion->numero) {
                $cotizacion->numero = $this->generarNumeroCotizacion();
            }

            // Generar PDF si no existe
            if (!$cotizacion->pdf_path) {
                $pdfPath = $this->generarPDF($cotizacion);
                $cotizacion->pdf_path = $pdfPath;
            }

            $cotizacion->estado = 'enviada';
            $cotizacion->fecha_envio_email = now();
            $cotizacion->save();

            // Enviar email
            Mail::send('emails.cotizacion', ['cotizacion' => $cotizacion], function($message) use ($request, $cotizacion) {
                $message->to($request->email_destino)
                        ->subject('Cotización N° ' . $cotizacion->numero)
                        ->attach(storage_path('app/' . $cotizacion->pdf_path));
            });

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Cotización enviada por email exitosamente'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error al enviar email: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Obtener historial de cotizaciones de un paciente
     */
    public function historial($paciente_id)
    {
        $cotizaciones = Cotizacion::where('paciente_id', $paciente_id)
                                  ->with('detalles')
                                  ->orderBy('fecha', 'desc')
                                  ->get()
                                  ->map(function($cotizacion) {
                                      return [
                                          'id' => $cotizacion->id,
                                          'numero' => $cotizacion->numero,
                                          'fecha' => $cotizacion->fecha,
                                          'valida_hasta' => $cotizacion->valida_hasta,
                                          'cantidad_productos' => $cotizacion->detalles->count(),
                                          'total' => $cotizacion->total,
                                          'estado' => $cotizacion->estado
                                      ];
                                  });

        return response()->json([
            'success' => true,
            'data' => $cotizaciones
        ]);
    }

    /**
     * Ver detalle de cotización
     */
    public function detalle($id)
    {
        $cotizacion = Cotizacion::with([
                            'detalles.producto',
                            'paciente',
                            'profesional',
                            'lugarAtencion.direccion'
                        ])
                        ->findOrFail($id);

        return view('app.laboratorio.cotizaciones.detalle', compact('cotizacion'));
    }

    /**
     * Descargar PDF de cotización
     */
    public function descargarPDF($id)
    {
        $cotizacion = Cotizacion::with([
                            'detalles.producto',
                            'paciente',
                            'profesional',
                            'lugarAtencion.direccion'
                        ])
                        ->findOrFail($id);


        if ($cotizacion->pdf_path && Storage::exists($cotizacion->pdf_path)) {
            return Storage::download($cotizacion->pdf_path, $cotizacion->numero . '.pdf');
        }

        // Si no existe, generar nuevo PDF
        $pdfPath = $this->generarPDF($cotizacion);
        $cotizacion->pdf_path = $pdfPath;
        $cotizacion->save();

        return Storage::download($pdfPath, $cotizacion->numero . '.pdf');
    }

    /**
     * Enviar cotización existente por email
     */
    public function enviarCotizacionExistente(Request $request, $id)
    {
        $request->validate([
            'email_destino' => 'required|email',
        ]);

        try {
            $cotizacion = Cotizacion::with([
                'detalles.producto',
                'paciente',
                'profesional',
                'lugarAtencion.direccion'
            ])->findOrFail($id);

            // Generar PDF si no existe
            if (!$cotizacion->pdf_path || !Storage::exists($cotizacion->pdf_path)) {
                $pdfPath = $this->generarPDF($cotizacion);
                $cotizacion->pdf_path = $pdfPath;
                $cotizacion->save();
            }

            // Enviar email
            Mail::send('emails.cotizacion', ['cotizacion' => $cotizacion], function($message) use ($request, $cotizacion) {
                $message->to($request->email_destino)
                        ->subject('Cotización N° ' . $cotizacion->numero)
                        ->attach(storage_path('app/' . $cotizacion->pdf_path));
            });

            // Actualizar estado y fecha de envío
            $cotizacion->estado = 'enviada';
            $cotizacion->fecha_envio_email = now();
            $cotizacion->save();

            return response()->json([
                'success' => true,
                'message' => 'Cotización enviada por email exitosamente'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al enviar email: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Anular cotización
     */
    public function anular(Request $request, $id)
    {
        $request->validate([
            'motivo' => 'nullable|string|max:500'
        ]);

        $cotizacion = Cotizacion::findOrFail($id);

        $cotizacion->estado = 'anulada';
        $cotizacion->fecha_anulacion = now();
        $cotizacion->motivo_anulacion = $request->motivo;
        $cotizacion->save();

        return response()->json([
            'success' => true,
            'message' => 'Cotización anulada exitosamente'
        ]);
    }

    /**
     * Aceptar cotización
     */
    public function aceptar($id)
    {
        $cotizacion = Cotizacion::findOrFail($id);

        $cotizacion->estado = 'aceptada';
        $cotizacion->fecha_aceptacion = now();
        $cotizacion->save();

        return response()->json([
            'success' => true,
            'message' => 'Cotización aceptada'
        ]);
    }

    /**
     * Rechazar cotización
     */
    public function rechazar(Request $request, $id)
    {
        $cotizacion = Cotizacion::findOrFail($id);

        $cotizacion->estado = 'rechazada';
        $cotizacion->save();

        return response()->json([
            'success' => true,
            'message' => 'Cotización rechazada'
        ]);
    }

    // ==================== MÉTODOS PRIVADOS ====================

    /**
     * Crear cotización con detalles
     */
    private function crearCotizacion($request, $estado)
    {

        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

        // Calcular totales
        $subtotal = 0;
        $descuentoTotal = 0;

        foreach ($request->productos as $item) {
            // Verificar si es un procedimiento o producto
            $esProcedimiento = isset($item['es_procedimiento']) && $item['es_procedimiento'] === true;
            
            if ($esProcedimiento) {
                // Buscar en ProcedimientosCentro
                $procedimiento = \App\Models\ProcedimientosCentro::findOrFail($item['id']);
                $precioBase = $procedimiento->valor ?? 0;
            } else {
                // Buscar en Producto
                $producto = Producto::findOrFail($item['id']);
                $precioBase = $producto->precio_unitario ?? $producto->precio_venta ?? 0;
            }

            $cantidad = $item['cantidad'];
            $descuento = $item['descuento'] ?? 0;

            // Usar precio modificado del frontend si existe
            $precioProducto = isset($item['precio']) ? (float)$item['precio'] : $precioBase;
            $subtotalProducto = $precioProducto * $cantidad;
            $descuentoProducto = $subtotalProducto * ($descuento / 100);

            $subtotal += $subtotalProducto;
            $descuentoTotal += $descuentoProducto;
        }

        $subtotalConDescuento = $subtotal - $descuentoTotal;
        $iva = $subtotalConDescuento * 0.19;
        $total = $subtotalConDescuento + $iva;

        // Crear cotización
        $cotizacion = Cotizacion::create([
            'numero' => $this->generarNumeroCotizacion(), // Se asigna al generar
            'id_lugar_atencion' => $request->id_lugar_atencion,
            'paciente_id' => $request->paciente_id,
            'profesional_id' => $profesional->id,
            'fecha' => $request->fecha ?? now(),
            'validez_dias' => $request->validez_dias ?? 15,
            'valida_hasta' => Carbon::parse($request->fecha ?? now())->addDays($request->validez_dias ?? 15),
            'cliente_rut' => $request->rut,
            'cliente_nombre' => $request->nombre,
            'cliente_telefono' => $request->telefono,
            'cliente_email' => $request->email,
            'subtotal' => $subtotal,
            'descuento_total' => $descuentoTotal,
            'iva' => $iva,
            'total' => $total,
            'forma_pago' => $request->forma_pago,
            'observaciones' => $request->observaciones,
            'estado' => $estado
        ]);

        // Crear detalles
        foreach ($request->productos as $item) {
            // Verificar si es un procedimiento o producto
            $esProcedimiento = isset($item['es_procedimiento']) && $item['es_procedimiento'] === true;
            
            if ($esProcedimiento) {
                // Buscar en ProcedimientosCentro
                $procedimiento = \App\Models\ProcedimientosCentro::findOrFail($item['id']);
                $nombre = $procedimiento->nombre;
                $codigo = $procedimiento->codigo ?? 'PROC-' . $procedimiento->id;
                $descripcion = $procedimiento->descripcion ?? '';
                $precioBase = $procedimiento->valor ?? 0;
            } else {
                // Buscar en Producto
                $producto = Producto::findOrFail($item['id']);
                $nombre = $producto->nombre;
                $codigo = $producto->codigo_interno;
                $descripcion = $producto->descripcion;
                $precioBase = $producto->precio_unitario ?? $producto->precio_venta ?? 0;
            }

            $cantidad = $item['cantidad'];
            $descuento = $item['descuento'] ?? 0;

            // Usar precio modificado del frontend si existe
            $precioUnitario = isset($item['precio']) ? (float)$item['precio'] : $precioBase;
            $subtotalProducto = $precioUnitario * $cantidad;
            $descuentoMonto = $subtotalProducto * ($descuento / 100);
            $subtotalFinal = $subtotalProducto - $descuentoMonto;

            CotizacionDetalle::create([
                'cotizacion_id' => $cotizacion->id,
                'producto_id' => $item['id'],
                'producto_codigo' => $codigo,
                'producto_nombre' => $nombre,
                'producto_descripcion' => $descripcion,
                'cantidad' => $cantidad,
                'precio_unitario' => $precioUnitario,
                'descuento_porcentaje' => $descuento,
                'descuento_monto' => $descuentoMonto,
                'subtotal' => $subtotalFinal
            ]);
        }

        return $cotizacion->load('detalles');
    }

    /**
     * Generar número de cotización
     */
    private function generarNumeroCotizacion()
    {
        $año = date('Y');
        $ultimaCotizacion = Cotizacion::where('numero', 'like', "COT-{$año}-%")
                                      ->orderBy('numero', 'desc')
                                      ->first();

        $numero = 1;
        if ($ultimaCotizacion) {
            $partes = explode('-', $ultimaCotizacion->numero);
            $numero = intval($partes[2]) + 1;
        }

        return sprintf("COT-%d-%04d", $año, $numero);
    }

    /**
     * Generar PDF de cotización
     */
    private function generarPDF($cotizacion, $foto_perfil = null)
    {
        // Recargar la cotización con todas las relaciones necesarias
        $cotizacion = $cotizacion->load([
            'detalles.producto',
            'paciente',
            'profesional',
            'lugarAtencion.direccion'
        ]);

        // Si no se pasó foto_perfil como parámetro, obtenerla de la institución
        if ($foto_perfil === null) {
            $sucursal = Sucursal::where('id_lugar_atencion', $cotizacion->id_lugar_atencion)->first();
            if($sucursal){
                $institucion = Instituciones::find($sucursal->id_institucion);
                $foto_perfil = $institucion->foto_perfil ?? null;
            }
        }

        $pdf = Pdf::loadView('PDF.cotizacion', compact('cotizacion', 'foto_perfil'));

        $filename = $cotizacion->numero . '.pdf';
        $path = 'public/cotizaciones/' . date('Y') . '/' . date('m') . '/' . $filename;

        Storage::put($path, $pdf->output());

        return $path;
    }

    /**
     * Preparar datos para cotización temporal
     */
    private function prepararDatosCotizacion($request)
    {
        // Procesar productos con precios modificados
        $detalles = [];
        $subtotal = 0;
        $descuentoTotal = 0;

        $sucursal = Sucursal::where('id_lugar_atencion', $request->id_lugar_atencion)->first();
        if($sucursal){
            $institucion = Instituciones::find($sucursal->id_institucion);
        }

        foreach ($request->productos as $item) {
            // Verificar si es un procedimiento o producto
            $esProcedimiento = isset($item['es_procedimiento']) && $item['es_procedimiento'] === true;
            
            if ($esProcedimiento) {
                // Buscar en ProcedimientosCentro
                $procedimiento = \App\Models\ProcedimientosCentro::findOrFail($item['id']);
                $nombre = $procedimiento->nombre;
                $codigo = $procedimiento->codigo ?? $procedimiento->id;
                $precioBase = $procedimiento->valor ?? 0;
            } else {
                // Buscar en Producto
                $producto = Producto::findOrFail($item['id']);
                $nombre = $producto->nombre;
                $codigo = $producto->codigo_interno;
                $precioBase = $producto->precio_unitario ?? $producto->precio_venta ?? 0;
            }

            $cantidad = $item['cantidad'];
            $descuento = $item['descuento'] ?? 0;

            // Usar precio modificado del frontend si existe
            $precioUnitario = isset($item['precio']) ? (float)$item['precio'] : $precioBase;

            $subtotalProducto = $precioUnitario * $cantidad;
            $descuentoMonto = $subtotalProducto * ($descuento / 100);
            $subtotalFinal = $subtotalProducto - $descuentoMonto;

            $subtotal += $subtotalProducto;
            $descuentoTotal += $descuentoMonto;

            $detalles[] = (object) [
                'producto_id' => $item['id'],
                'producto_codigo' => $codigo,
                'producto_nombre' => $nombre,
                'cantidad' => $cantidad,
                'precio_unitario' => $precioUnitario,
                'descuento_porcentaje' => $descuento,
                'subtotal' => $subtotalProducto,
                'descuento_monto' => $descuentoMonto,
                'subtotal_final' => $subtotalFinal,
                'es_procedimiento' => $esProcedimiento
            ];
        }

        $subtotalConDescuento = $subtotal - $descuentoTotal;
        $iva = $subtotalConDescuento * 0.19;
        $total = $subtotalConDescuento + $iva;

        return (object) [
            'numero' => 'PREVIEW-' . time(),
            'fecha' => $request->fecha ?? now()->format('Y-m-d'),
            'foto_perfil' => isset($institucion) ? $institucion->foto_perfil : null,
            'valida_hasta' => now()->addDays($request->validez_dias ?? 15)->format('Y-m-d'),
            'cliente_nombre' => $request->nombre,
            'cliente_rut' => $request->rut,
            'cliente_telefono' => $request->telefono,
            'cliente_email' => $request->email,
            'forma_pago' => $request->forma_pago,
            'observaciones' => $request->observaciones,
            'subtotal' => $subtotal,
            'descuento_total' => $descuentoTotal,
            'subtotal_con_descuento' => $subtotalConDescuento,
            'iva' => $iva,
            'total' => $total,
            'detalles' => collect($detalles),
            'lugar_atencion' => LugarAtencion::find($request->id_lugar_atencion),
            'estado' => 'vista_previa'
        ];
    }
}
