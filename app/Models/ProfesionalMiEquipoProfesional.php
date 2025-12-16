<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfesionalMiEquipoProfesional extends Model
{
    use HasFactory;
    protected $table = 'profesional_mi_equipo_profesionales';

    public function ProfesionalMiEquipo()
    {
        return $this->hasOne(ProfesionalMiEquipo::class, 'id', 'id_profesional_mi_equipo');
    }

    public function TipoEspecialidad()
    {
        return $this->hasOne(TipoEspecialidad::class, 'id', 'id_tipo_especialidad');
    }

    public function SubTipoEspecialidad()
    {
        return $this->hasOne(SubTipoEspecialidad::class, 'id', 'id_sub_tipo_especialidad');
    }

    public function Profesional()
    {
        return $this->hasOne(Profesional::class, 'id', 'id_profesional');
    }

}
