<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TraspasoProducto extends Model
{
    protected $table = 'traspasos_productos';

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

    protected $casts = [
        'fecha' => 'datetime',
        'cantidad' => 'integer',
    ];

    // Relaciones
    public function institucion()
    {
        return $this->belongsTo(Institucion::class, 'id_institucion');
    }
    public function lugarAtencion()
    {
        return $this->belongsTo(LugarAtencion::class, 'id_lugar_atencion');
    }
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }
    public function responsable(){
        return $this->belongsTo(Profesional::class, 'id_responsable');
    }
}
