<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresupuestoMascota extends Model
{
    use HasFactory;

    protected $table = 'presupuestos_mascota';

    protected $casts = [
        'datos_atencion' => 'array',
        'fecha' => 'date',
        'fecha_control' => 'date',
    ];
}
