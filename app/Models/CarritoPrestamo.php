<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarritoPrestamo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'carrito_prestamo';

    protected $fillable = [
        'id_usuario',
        'id_profesional',
        'id_paciente',
        'id_ficha',
        'id_producto',
        'codigo_producto',
        'nombre_producto',
        'marca_producto',
        'tipo_producto',
        'cantidad',
        'precio_unitario',
        'descuento',
        'subtotal',
        'stock_disponible',
        'observaciones',
        'image_path',
        'estado',
        'session_id',
        'id_lugar_atencion',
        'id_bodega',
        'fecha_prestamo',
        'fecha_devolucion_esperada',
        'fecha_devolucion_real',
        'estado_prestamo',
        'observaciones_devolucion',
        'expira_en',
    ];

    protected $casts = [
        'precio_unitario' => 'decimal:2',
        'descuento' => 'decimal:2',
        'subtotal' => 'decimal:2',
        'fecha_prestamo' => 'datetime',
        'fecha_devolucion_esperada' => 'datetime',
        'fecha_devolucion_real' => 'datetime',
        'expira_en' => 'datetime',
    ];

    // Relaciones
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function profesional()
    {
        return $this->belongsTo(Profesional::class, 'id_profesional');
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'id_paciente');
    }

    public function ficha()
    {
        return $this->belongsTo(FichaAtencion::class, 'id_ficha');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }

    public function lugarAtencion()
    {
        return $this->belongsTo(LugarAtencion::class, 'id_lugar_atencion');
    }

    public function bodega()
    {
        return $this->belongsTo(Bodega::class, 'id_bodega');
    }

    // Scopes útiles
    public function scopeActivos($query)
    {
        return $query->where('estado', 'activo');
    }

    public function scopePrestados($query)
    {
        return $query->where('estado_prestamo', 'prestado');
    }

    public function scopeDevueltos($query)
    {
        return $query->where('estado_prestamo', 'devuelto');
    }

    public function scopeVencidos($query)
    {
        return $query->where('estado_prestamo', 'vencido');
    }

    // Métodos auxiliares
    public function estaVencido()
    {
        return $this->fecha_devolucion_esperada && now()->isAfter($this->fecha_devolucion_esperada) && $this->estado_prestamo === 'prestado';
    }

    public function marcarComoDevuelto($observaciones = null)
    {
        $this->update([
            'estado_prestamo' => 'devuelto',
            'fecha_devolucion_real' => now(),
            'observaciones_devolucion' => $observaciones,
        ]);
    }

    public function marcarComoPerdido($observaciones = null)
    {
        $this->update([
            'estado_prestamo' => 'perdido',
            'observaciones_devolucion' => $observaciones,
        ]);
    }

    public function marcarComoDanado($observaciones = null)
    {
        $this->update([
            'estado_prestamo' => 'danado',
            'observaciones_devolucion' => $observaciones,
        ]);
    }
}
