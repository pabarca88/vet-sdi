<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamenesDentalPeriodoncia extends Model
{
    use HasFactory;

    protected $table = 'examenes_dental_periodoncia';

    protected $fillable = [
        'numero_pieza',
        'sangrado',
        'supuracion',
        'higiene',
        'alt_mg',
        'p_sondaje',
        'mov_dent',
        'furca',
        'tipo_sonda',
        'obs_perio_pza',
        'biopsia',
        'zona_motivo',
        'observaciones_biopsia',
        'id_ficha_atencion',
        'id_paciente',
        'id_lugar_atencion',
        'id_profesional'
    ];
}
