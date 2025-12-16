<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TipoEspecialidad;
use App\Models\Profesional;

class Especialidad extends Model
{
    use HasFactory;
    protected $table = 'especialidades';

    public function TipoEspecialidad()
    {
        return $this->hasOne(TipoEspecialidad::class,'id_tipo_especialidad');
    }

    public function Profesionales()
    {
        return $this->hasMany(Profesional::class, 'id_especialidad', 'id');
    }
}
