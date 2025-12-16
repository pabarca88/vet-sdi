<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluacionPeriodoncia extends Model
{
    use HasFactory;

    protected $table = 'evaluaciones_periodoncia';

    protected $fillable = [
        'pieza',
        'antecedentes_molestias',
        'evaluacion_clinica',
        'estudio_rx',
        'diagnostico',
        'lesion_sistemica',
        'dg_period',
        'observaciones',
        'id_ficha_atencion',
        'id_paciente',
        'id_lugar_atencion',
        'id_profesional'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Relaciones
    public function fichaAtencion()
    {
        return $this->belongsTo(FichaAtencion::class, 'id_ficha_atencion');
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'id_paciente');
    }

    public function profesional()
    {
        return $this->belongsTo(Profesional::class, 'id_profesional');
    }

    public function lugarAtencion()
    {
        return $this->belongsTo(LugarAtencion::class, 'id_lugar_atencion');
    }
}
