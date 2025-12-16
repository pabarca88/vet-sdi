<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ControlNutricion extends Model
{
    use HasFactory;
    protected $table = 'control_nutricion';
    protected $fillable = [
        'id_ficha_atencion',
        'id_profesional',
        'id_lugar_atencion',
        'id_paciente',
        'fecha',
        'estado',
        'observaciones',
        'datos_control',
    ];

    protected $casts = [
        'datos_control' => 'array',
        'fecha' => 'date',
    ];
}
