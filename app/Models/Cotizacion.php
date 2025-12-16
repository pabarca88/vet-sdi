<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
