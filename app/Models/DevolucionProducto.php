<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DevolucionProducto extends Model
{
    use HasFactory;

    protected $table = 'devoluciones_productos';

    protected $fillable = [
        'id_institucion',
        'id_lugar_atencion',
        'id_producto',
        'id_bodega_origen',
        'id_bodega_destino',
        'fecha',
        'id_responsable',
        'cantidad',
        'observaciones',
    ];

    // Relaciones
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }
    public function bodegaOrigen()
    {
        return $this->belongsTo(Bodega::class, 'id_bodega_origen');
    }
    public function bodegaDestino()
    {
        return $this->belongsTo(Bodega::class, 'id_bodega_destino');
    }
    public function responsable()
    {
        return $this->belongsTo(User::class, 'id_responsable');
    }
    public function institucion()
    {
        return $this->belongsTo(Instituciones::class, 'id_institucion');
    }
    public function lugarAtencion()
    {
        return $this->belongsTo(LugarAtencion::class, 'id_lugar_atencion');
    }
}
