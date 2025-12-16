<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductoSolicitado extends Model
{
    protected $table = 'productos_solicitados';

    protected $fillable = [
        'nombre_producto',
        'tipo_producto',
        'cantidad',
        'observaciones',
        'id_responsable',
        'fecha',
    ];

    // Si no quieres timestamps automáticos, descomenta la siguiente línea:
    // public $timestamps = false;
}
