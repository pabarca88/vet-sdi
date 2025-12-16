<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesional extends Model
{
    use HasFactory;
    protected $table = 'profesionales';
    protected $fillable = [
        'id_usuario',
        'nombre',
        'apellido',
        'telefono',
        'email',
        'id_tipo_especialidad',
        'id_sub_tipo_especialidad',
        'id_especialidad',
        'id_direccion',
        'foto_perfil'
    ];

    public function LugaresAtencion()
    {
        return $this->belongsToMany(LugarAtencion::class, 'profesionales_lugares_atencion', 'id_profesional', 'id_lugar_atencion')
            ->withPivot('estado')
            ->wherePivot('estado', 1);
    }

    public function Licencias()
    {
        return $this->belongsToMany(Licencia::class, 'licencias_ppf', 'id_profesional', 'id_licencia');
    }

    public function Recetas()
    {
        return $this->belongsTo(DetalleReceta::class, 'id', 'id_profesional');
    }

    public function Examenes()
    {
        return $this->belongsTo(ExamenPPF::class, 'id', 'id_profesional');
    }

    public function TipoEspecialidad()
    {
        return $this->hasOne(TipoEspecialidad::class, 'id', 'id_tipo_especialidad');
    }

    public function SubTipoEspecialidad()
    {
        return $this->hasOne(SubTipoEspecialidad::class, 'id', 'id_sub_tipo_especialidad');
    }

    public function Especialidad()
    {
        return $this->hasOne(Especialidad::class, 'id', 'id_especialidad');
    }

    public function Asistentes()
    {
        return $this->belongsToMany(Asistente::class, 'profesionales_asistentes', 'id_profesional', 'id_asistente');
    }

    public function Direccion()
    {
        return $this->hasOne(Direccion::class, 'id', 'id_direccion');
    }

    public function FichaAtencion()
    {
        return $this->belongsTo(FichaAtencion::class, 'id', 'id_profesional');
    }

    public function FichaAtencionRecetas()
    {
        return $this->belongsTo(FichaAtencion::class, 'id', 'id_profesional');
    }

    public function AntecedenteAcademico()
    {
        return $this->hasMany(ProfesionalAntecedenteAcademico::class, 'id_profesional', 'id');
    }
}
