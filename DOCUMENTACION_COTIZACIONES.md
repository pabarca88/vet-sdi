# Sistema de Cotización de Audífonos y Accesorios
## Documentación de Implementación Backend

---

## 📋 Tabla de Contenidos
1. [Descripción General](#descripción-general)
2. [Estructura de Base de Datos](#estructura-de-base-de-datos)
3. [Rutas API](#rutas-api)
4. [Controladores](#controladores)
5. [Modelos](#modelos)
6. [Validaciones](#validaciones)
7. [Generación de PDF](#generación-de-pdf)
8. [Envío de Emails](#envío-de-emails)
9. [Instalación](#instalación)

---

## 🎯 Descripción General

Sistema completo para gestionar cotizaciones de productos de audífonos, repuestos y accesorios para servicios de otorrinolaringología y fonoaudiología.

### Funcionalidades Principales:
- ✅ Búsqueda de productos por tipo, código, marca o modelo
- ✅ Carrito de cotización con cantidades y descuentos
- ✅ Cálculo automático de totales con IVA
- ✅ Generación de PDF profesional
- ✅ Envío por email
- ✅ Historial de cotizaciones por paciente
- ✅ Estados de cotización (borrador, generada, enviada, aceptada, rechazada, anulada)

---

## 🗄️ Estructura de Base de Datos

### Migración: `create_cotizaciones_table.php`

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotizacionesTable extends Migration
{
    public function up()
    {
        Schema::create('cotizaciones', function (Blueprint $table) {
            $table->id();
            $table->string('numero')->unique(); // COT-2024-0001
            $table->unsignedBigInteger('paciente_id');
            $table->unsignedBigInteger('profesional_id');
            $table->date('fecha');
            $table->date('valida_hasta');
            $table->integer('validez_dias')->default(15);
            
            // Datos del cliente
            $table->string('cliente_rut', 15);
            $table->string('cliente_nombre', 255);
            $table->string('cliente_telefono', 20)->nullable();
            $table->string('cliente_email', 100)->nullable();
            
            // Detalles de la cotización
            $table->decimal('subtotal', 12, 2)->default(0);
            $table->decimal('descuento_total', 12, 2)->default(0);
            $table->decimal('iva', 12, 2)->default(0);
            $table->decimal('total', 12, 2)->default(0);
            
            $table->string('forma_pago', 50)->nullable();
            $table->text('observaciones')->nullable();
            
            // Estados: borrador, generada, enviada, aceptada, rechazada, anulada
            $table->enum('estado', ['borrador', 'generada', 'enviada', 'aceptada', 'rechazada', 'anulada'])
                  ->default('borrador');
            
            $table->string('pdf_path')->nullable();
            $table->timestamp('fecha_envio_email')->nullable();
            $table->timestamp('fecha_aceptacion')->nullable();
            $table->timestamp('fecha_anulacion')->nullable();
            $table->text('motivo_anulacion')->nullable();
            
            $table->timestamps();
            $table->softDeletes();
            
            // Índices
            $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('cascade');
            $table->foreign('profesional_id')->references('id')->on('profesionals')->onDelete('cascade');
            $table->index('numero');
            $table->index('fecha');
            $table->index('estado');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cotizaciones');
    }
}
```

### Migración: `create_cotizacion_detalles_table.php`

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotizacionDetallesTable extends Migration
{
    public function up()
    {
        Schema::create('cotizacion_detalles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cotizacion_id');
            $table->unsignedBigInteger('producto_id');
            
            // Datos del producto al momento de cotizar
            $table->string('producto_codigo', 50);
            $table->string('producto_nombre', 255);
            $table->text('producto_descripcion')->nullable();
            
            $table->integer('cantidad');
            $table->decimal('precio_unitario', 12, 2);
            $table->decimal('descuento_porcentaje', 5, 2)->default(0);
            $table->decimal('descuento_monto', 12, 2)->default(0);
            $table->decimal('subtotal', 12, 2);
            
            $table->timestamps();
            
            // Índices
            $table->foreign('cotizacion_id')->references('id')->on('cotizaciones')->onDelete('cascade');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cotizacion_detalles');
    }
}
```

---

## 🛣️ Rutas API

### Archivo: `routes/api.php`

```php
// Rutas para Cotizaciones
Route::prefix('cotizaciones')->middleware(['auth:sanctum'])->group(function () {
    
    // Búsqueda de productos
    Route::get('/productos/buscar', 'CotizacionController@buscarProductos');
    
    // Gestión de cotizaciones
    Route::post('/guardar-borrador', 'CotizacionController@guardarBorrador');
    Route::post('/vista-previa', 'CotizacionController@vistaPrevia');
    Route::post('/generar', 'CotizacionController@generar');
    Route::post('/enviar-email', 'CotizacionController@enviarEmail');
    
    // Historial
    Route::get('/historial/{paciente_id}', 'CotizacionController@historial');
    Route::get('/{id}/detalle', 'CotizacionController@detalle');
    Route::get('/{id}/pdf', 'CotizacionController@descargarPDF');
    
    // Cambios de estado
    Route::put('/{id}/anular', 'CotizacionController@anular');
    Route::put('/{id}/aceptar', 'CotizacionController@aceptar');
    Route::put('/{id}/rechazar', 'CotizacionController@rechazar');
});

// Rutas para Productos
Route::prefix('productos')->middleware(['auth:sanctum'])->group(function () {
    Route::get('/buscar-cotizacion', 'ProductoController@buscarParaCotizacion');
});
```

---

## 🎮 Controladores

### Archivo: `app/Http/Controllers/CotizacionController.php`

```php
<?php

namespace App\Http\Controllers;

use App\Models\Cotizacion;
use App\Models\CotizacionDetalle;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class CotizacionController extends Controller
{
    /**
     * Buscar productos para cotización
     */
    public function buscarProductos(Request $request)
    {
        $query = Producto::query();
        
        // Filtro por tipo de producto
        if ($request->filled('tipo')) {
            $query->where('tipo_producto_id', $request->tipo);
        }
        
        // Búsqueda general
        if ($request->filled('busqueda')) {
            $busqueda = $request->busqueda;
            $query->where(function($q) use ($busqueda) {
                $q->where('codigo', 'like', "%{$busqueda}%")
                  ->orWhere('nombre', 'like', "%{$busqueda}%")
                  ->orWhere('marca', 'like', "%{$busqueda}%")
                  ->orWhere('modelo', 'like', "%{$busqueda}%");
            });
        }
        
        $productos = $query->where('estado', 'activo')
                          ->with('tipo')
                          ->limit(20)
                          ->get();
        
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
            $cotizacionTemp = $this->prepararDatosCotizacion($request);
            
            $pdf = Pdf::loadView('pdf.cotizacion', compact('cotizacionTemp'));
            
            $filename = 'cotizacion_preview_' . time() . '.pdf';
            $path = 'temp/' . $filename;
            
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
            
            // Generar PDF
            $pdfPath = $this->generarPDF($cotizacion);
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
        $cotizacion = Cotizacion::with('detalles.producto', 'paciente', 'profesional')
                                ->findOrFail($id);
        
        return view('cotizaciones.detalle', compact('cotizacion'));
    }
    
    /**
     * Descargar PDF de cotización
     */
    public function descargarPDF($id)
    {
        $cotizacion = Cotizacion::findOrFail($id);
        
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
        $profesional = auth()->user()->profesional;
        
        // Calcular totales
        $subtotal = 0;
        $descuentoTotal = 0;
        
        foreach ($request->productos as $item) {
            $producto = Producto::findOrFail($item['id']);
            $cantidad = $item['cantidad'];
            $descuento = $item['descuento'] ?? 0;
            
            $subtotalProducto = $producto->precio * $cantidad;
            $descuentoProducto = $subtotalProducto * ($descuento / 100);
            
            $subtotal += $subtotalProducto;
            $descuentoTotal += $descuentoProducto;
        }
        
        $subtotalConDescuento = $subtotal - $descuentoTotal;
        $iva = $subtotalConDescuento * 0.19;
        $total = $subtotalConDescuento + $iva;
        
        // Crear cotización
        $cotizacion = Cotizacion::create([
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
            $producto = Producto::findOrFail($item['id']);
            $cantidad = $item['cantidad'];
            $descuento = $item['descuento'] ?? 0;
            
            $precioUnitario = $producto->precio;
            $subtotalProducto = $precioUnitario * $cantidad;
            $descuentoMonto = $subtotalProducto * ($descuento / 100);
            $subtotalFinal = $subtotalProducto - $descuentoMonto;
            
            CotizacionDetalle::create([
                'cotizacion_id' => $cotizacion->id,
                'producto_id' => $producto->id,
                'producto_codigo' => $producto->codigo,
                'producto_nombre' => $producto->nombre,
                'producto_descripcion' => $producto->descripcion,
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
    private function generarPDF($cotizacion)
    {
        $pdf = Pdf::loadView('pdf.cotizacion', compact('cotizacion'));
        
        $filename = $cotizacion->numero . '.pdf';
        $path = 'cotizaciones/' . date('Y') . '/' . date('m') . '/' . $filename;
        
        Storage::put($path, $pdf->output());
        
        return $path;
    }
    
    /**
     * Preparar datos para cotización temporal
     */
    private function prepararDatosCotizacion($request)
    {
        // Similar a crearCotizacion pero retorna objeto temporal sin guardar
        return (object) [
            'fecha' => $request->fecha ?? now(),
            'cliente_nombre' => $request->nombre,
            'cliente_rut' => $request->rut,
            // ... otros campos
        ];
    }
}
```

---

## 📦 Modelos

### Archivo: `app/Models/Cotizacion.php`

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cotizacion extends Model
{
    use SoftDeletes;
    
    protected $table = 'cotizaciones';
    
    protected $fillable = [
        'numero', 'paciente_id', 'profesional_id', 'fecha', 'valida_hasta', 'validez_dias',
        'cliente_rut', 'cliente_nombre', 'cliente_telefono', 'cliente_email',
        'subtotal', 'descuento_total', 'iva', 'total',
        'forma_pago', 'observaciones', 'estado',
        'pdf_path', 'fecha_envio_email', 'fecha_aceptacion', 'fecha_anulacion', 'motivo_anulacion'
    ];
    
    protected $casts = [
        'fecha' => 'date',
        'valida_hasta' => 'date',
        'fecha_envio_email' => 'datetime',
        'fecha_aceptacion' => 'datetime',
        'fecha_anulacion' => 'datetime',
        'subtotal' => 'decimal:2',
        'descuento_total' => 'decimal:2',
        'iva' => 'decimal:2',
        'total' => 'decimal:2',
    ];
    
    // Relaciones
    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
    
    public function profesional()
    {
        return $this->belongsTo(Profesional::class);
    }
    
    public function detalles()
    {
        return $this->hasMany(CotizacionDetalle::class);
    }
}
```

### Archivo: `app/Models/CotizacionDetalle.php`

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CotizacionDetalle extends Model
{
    protected $table = 'cotizacion_detalles';
    
    protected $fillable = [
        'cotizacion_id', 'producto_id',
        'producto_codigo', 'producto_nombre', 'producto_descripcion',
        'cantidad', 'precio_unitario', 'descuento_porcentaje', 'descuento_monto', 'subtotal'
    ];
    
    protected $casts = [
        'precio_unitario' => 'decimal:2',
        'descuento_porcentaje' => 'decimal:2',
        'descuento_monto' => 'decimal:2',
        'subtotal' => 'decimal:2',
    ];
    
    // Relaciones
    public function cotizacion()
    {
        return $this->belongsTo(Cotizacion::class);
    }
    
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
```

---

## ✅ Validaciones

### Archivo: `app/Http/Requests/CotizacionRequest.php`

```php
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CotizacionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'paciente_id' => 'required|exists:pacientes,id',
            'fecha' => 'required|date',
            'validez_dias' => 'required|integer|min:1|max:365',
            'cliente_email' => 'nullable|email',
            'cliente_telefono' => 'nullable|string|max:20',
            'forma_pago' => 'nullable|string|max:50',
            'observaciones' => 'nullable|string|max:1000',
            'productos' => 'required|array|min:1',
            'productos.*.id' => 'required|exists:productos,id',
            'productos.*.cantidad' => 'required|integer|min:1',
            'productos.*.descuento' => 'nullable|numeric|min:0|max:100',
        ];
    }
    
    public function messages()
    {
        return [
            'paciente_id.required' => 'El paciente es obligatorio',
            'productos.required' => 'Debe agregar al menos un producto',
            'productos.min' => 'Debe agregar al menos un producto',
            'productos.*.cantidad.min' => 'La cantidad mínima es 1',
            'productos.*.descuento.max' => 'El descuento máximo es 100%',
        ];
    }
}
```

---

## 📄 Generación de PDF

### Vista: `resources/views/pdf/cotizacion.blade.php`

```blade
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Cotización {{ $cotizacion->numero }}</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        .header { text-align: center; margin-bottom: 30px; }
        .company-info { margin-bottom: 20px; }
        .client-info { background: #f5f5f5; padding: 15px; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #4a90e2; color: white; }
        .text-right { text-align: right; }
        .totals { width: 40%; margin-left: auto; }
        .footer { margin-top: 40px; font-size: 10px; text-align: center; }
    </style>
</head>
<body>
    <!-- Encabezado -->
    <div class="header">
        <h1>COTIZACIÓN</h1>
        <h2>{{ $cotizacion->numero }}</h2>
    </div>
    
    <!-- Información de la empresa -->
    <div class="company-info">
        <strong>MediChile Sistema</strong><br>
        Dirección de la empresa<br>
        Teléfono: +56 9 1234 5678<br>
        Email: contacto@medichile.cl
    </div>
    
    <!-- Información del cliente -->
    <div class="client-info">
        <strong>DATOS DEL CLIENTE</strong><br>
        Nombre: {{ $cotizacion->cliente_nombre }}<br>
        RUT: {{ $cotizacion->cliente_rut }}<br>
        @if($cotizacion->cliente_telefono)
            Teléfono: {{ $cotizacion->cliente_telefono }}<br>
        @endif
        @if($cotizacion->cliente_email)
            Email: {{ $cotizacion->cliente_email }}<br>
        @endif
        <br>
        <strong>Fecha:</strong> {{ $cotizacion->fecha->format('d-m-Y') }}<br>
        <strong>Válida hasta:</strong> {{ $cotizacion->valida_hasta->format('d-m-Y') }}
    </div>
    
    <!-- Tabla de productos -->
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Código</th>
                <th>Producto</th>
                <th>Cant.</th>
                <th class="text-right">Precio Unit.</th>
                <th class="text-right">Desc. %</th>
                <th class="text-right">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cotizacion->detalles as $index => $detalle)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $detalle->producto_codigo }}</td>
                <td>{{ $detalle->producto_nombre }}</td>
                <td>{{ $detalle->cantidad }}</td>
                <td class="text-right">${{ number_format($detalle->precio_unitario, 0, ',', '.') }}</td>
                <td class="text-right">{{ $detalle->descuento_porcentaje }}%</td>
                <td class="text-right">${{ number_format($detalle->subtotal, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <!-- Totales -->
    <table class="totals">
        <tr>
            <td><strong>Subtotal:</strong></td>
            <td class="text-right">${{ number_format($cotizacion->subtotal, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td><strong>Descuento Total:</strong></td>
            <td class="text-right">-${{ number_format($cotizacion->descuento_total, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td><strong>IVA (19%):</strong></td>
            <td class="text-right">${{ number_format($cotizacion->iva, 0, ',', '.') }}</td>
        </tr>
        <tr style="background: #f0f0f0;">
            <td><strong>TOTAL:</strong></td>
            <td class="text-right"><strong>${{ number_format($cotizacion->total, 0, ',', '.') }}</strong></td>
        </tr>
    </table>
    
    <!-- Observaciones -->
    @if($cotizacion->observaciones)
    <div style="margin-top: 20px;">
        <strong>Observaciones:</strong><br>
        {{ $cotizacion->observaciones }}
    </div>
    @endif
    
    <!-- Pie de página -->
    <div class="footer">
        <p>Esta cotización es válida hasta el {{ $cotizacion->valida_hasta->format('d-m-Y') }}</p>
        <p>Documento generado electrónicamente - MediChile Sistema</p>
    </div>
</body>
</html>
```

---

## 📧 Envío de Emails

### Vista: `resources/views/emails/cotizacion.blade.php`

```blade
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
    <h2>Cotización N° {{ $cotizacion->numero }}</h2>
    
    <p>Estimado/a {{ $cotizacion->cliente_nombre }},</p>
    
    <p>Adjunto encontrará la cotización solicitada con el detalle de los productos.</p>
    
    <p><strong>Resumen:</strong></p>
    <ul>
        <li>Número de cotización: {{ $cotizacion->numero }}</li>
        <li>Fecha: {{ $cotizacion->fecha->format('d-m-Y') }}</li>
        <li>Válida hasta: {{ $cotizacion->valida_hasta->format('d-m-Y') }}</li>
        <li>Total: ${{ number_format($cotizacion->total, 0, ',', '.') }}</li>
    </ul>
    
    <p>Quedamos atentos a sus consultas.</p>
    
    <p>Saludos cordiales,<br>
    <strong>MediChile Sistema</strong></p>
</body>
</html>
```

---

## 🚀 Instalación

### 1. Ejecutar migraciones

```bash
php artisan migrate
```

### 2. Instalar dependencias

```bash
composer require barryvdh/laravel-dompdf
```

### 3. Publicar configuración

```bash
php artisan vendor:publish --provider="Barryvdh\DomPDF\ServiceProvider"
```

### 4. Configurar .env

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=tu_email@gmail.com
MAIL_PASSWORD=tu_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=tu_email@gmail.com
MAIL_FROM_NAME="${APP_NAME}"
```

### 5. Incluir archivos JS y CSS en la vista

```blade
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/cotizacion_audifonos.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/cotizacion_audifonos.js') }}"></script>
@endpush
```

---

## 📝 Notas Importantes

1. **Permisos**: Asegúrate de que el directorio `storage/app/cotizaciones` tenga permisos de escritura
2. **Backup**: Implementa backups automáticos de las cotizaciones generadas
3. **Seguridad**: Los PDFs deben ser accesibles solo con autenticación
4. **Performance**: Considera usar colas para el envío de emails masivos
5. **Testing**: Implementa tests unitarios para los cálculos de totales

---

## 🐛 Troubleshooting

### Error: "Class 'PDF' not found"
```bash
composer dump-autoload
php artisan config:clear
```

### Error al generar PDF
```bash
php artisan storage:link
chmod -R 775 storage/
```

### Email no se envía
Verifica la configuración SMTP en `.env` y que el puerto no esté bloqueado por el firewall.

---

## 📞 Soporte

Para consultas o problemas, contactar al equipo de desarrollo.

---

**Versión:** 1.0.0  
**Última actualización:** Octubre 2025
