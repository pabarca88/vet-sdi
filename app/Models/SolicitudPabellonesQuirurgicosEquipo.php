<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudPabellonesQuirurgicosEquipo extends Model
{
    use HasFactory;
    protected $table = 'solicitudes_pabellones_quirurgicos_equipo';

    public function SolicitudPabellonQuirurgico()
    {
        return $this->hasOne(SolicitudPabellonQuirurgico::class, 'id', 'id_solicitudes_pabellones_quirurgicos');
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
