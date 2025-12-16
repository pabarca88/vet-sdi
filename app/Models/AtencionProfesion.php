<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AtencionProfesion extends Model
{
    use HasFactory;

    protected $table = 'atencion_profesion';

    protected $fillable = [
        'id_ficha_atencion',
        'id_profesional',
        'id_lugar_atencion',
        'id_paciente',
        'fecha',
        'estado',
        'observaciones',
        'datos_nutri',
    ];

    protected $casts = [
        'datos_nutri' => 'array',
        'fecha' => 'date',
    ];

    // Relaciones opcionales
    public function fichaAtencion()
    {
        return $this->belongsTo(FichaAtencion::class, 'id_ficha_atencion');
    }

    public function profesional()
    {
        return $this->belongsTo(Profesional::class, 'id_profesional');
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'id_paciente');
    }

    public function lugarAtencion()
    {
        return $this->belongsTo(LugarAtencion::class, 'id_lugar_atencion');
    }

    public function planTratamiento()
    {
        return $this->belongsTo(PlanTratamiento::class, 'id_plan_tratamiento');
    }

}

