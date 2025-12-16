<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamenEspecialidadTipo extends Model
{
    use HasFactory;
    protected $table = 'examen_especialidad_tipo';

    public function ExamenEspecialidadTemplate()
    {
        return $this->hasOne(ExamenEspecialidadTemplate::class,'id', 'id_template');
    }
}
