<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamenEspecialidad extends Model
{
    use HasFactory;
    protected $table = 'examen_especialidad';

    //examen_especialidad_img
    public function ExamenEspecialidadImg()
    {
        return $this->hasMany(ExamenEspecialidadImg::class,'id_examen', 'id');
    }

    //hora medica
    public function HoraMedica()
    {
        return $this->hasOne(HoraMedica::class,'id_ficha_atencion', 'id_ficha_atencion');
    }

    //template
    public function ExamenEspecialidadTemplate()
    {
        return $this->hasOne(ExamenEspecialidadTemplate::class,'id', 'id_template');
    }

    //examen_especialidad_tipo
    public function ExamenEspecialidadTipo()
    {
        return $this->hasOne(ExamenEspecialidadTipo::class,'id', 'id_examen_tipo');
    }

    //id_sub_tipo_especialidad
    public function SubTipoEspecialidad()
    {
        return $this->hasOne(SubTipoEspecialidad::class,'id', 'id_sub_tipo_especialidad');
    }

    //profesional
    public function Profesional()
    {
        return $this->hasOne(Profesional::class,'id', 'id_profesional');
    }

    public function ScopeFiltroEstadoHora($query, $estado)
    {
        if(!empty($estado))
        {
            $registroHoraMedica = HoraMedica::where('id_estado', $estado)->pluck('id_ficha_atencion')->toArray();
            $query->whereIn('id_ficha_atencion', $registroHoraMedica);
        }
    }
}
