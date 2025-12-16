<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProcedimientosImplantesRehab extends Model
{
    protected $table = 'procedimientos_implantes_rehab';

    protected $fillable = [
        'id_paciente',
        'id_profesional',
        'id_ficha_atencion',
        'id_especialidad',
        'numero_pieza',
        'id_procedimiento',
        'fecha',
        'id_tipo_procedimiento',
        'tipo_procedimiento',
        'id_tipo_anestesia',
        'anestesia',
        'numero_tubos',
        'id_tecnica_anestesia',
        'tecnica_anestesia',
        'id_anestesico',
        'anestesico',
        'id_incidentes',
        'incidentes',
        'id_material_rest',
        'material_rest',
        'id_tipo_anclaje',
        'tipo_anclaje',
        'estado'
    ];
}
