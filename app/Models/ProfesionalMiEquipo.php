<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfesionalMiEquipo extends Model
{
    use HasFactory;
    protected $table = 'profesional_mi_equipo';

    public function Profesional()
    {
        return $this->hasOne(Profesional::class, 'id', 'id_profesional');
    }

    public function ProfesionalMiEquipoProfesionales()
    {
        return $this->hasOne(ProfesionalMiEquipoProfesionales::class, 'id_profesional_mi_equipo', 'id');
    }
}
