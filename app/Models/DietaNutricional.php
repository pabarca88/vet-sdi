<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DietaNutricional extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_paciente',
        'id_profesional',
        'dieta_para',
        'desayuno',
        'merienda',
        'almuerzo',
        'media_tarde',
        'cena',
        'alimentos_prohibidos',
        'sustitucion',
        'recomendaciones',
    ];

    public function paciente()
    {
        return $this->belongsTo('App\Models\Paciente', 'id_paciente');
    }
    public function profesional()
    {
        return $this->belongsTo('App\Models\Profesional', 'id_profesional');
    }
}
