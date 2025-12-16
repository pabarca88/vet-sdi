<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class LugarAtencion extends Model
{
    use HasFactory;
    protected $table = 'lugares_atencion';

    public function Direccion()
    {
        return $this->hasOne(Direccion::class, 'id', 'id_direccion');
    }

    public function Profesionales()
    {
        return $this->belongsToMany(Profesional::class, 'profesionales_lugares_atencion', 'id_lugar_atencion', 'id_profesional');
    }

    public function Asistente()
    {
        return $this->belongsToMany(Asistente::class, 'asistentes_lugar_atencion', 'id_lugar_atencion', 'id_asistente')->whereNotNull('id_profesional');
    }

    /** consulta por institucion */
    public function AsistenteIntitucion()
    {
        return $this->belongsToMany(Asistente::class, 'asistentes_lugar_atencion', 'id_lugar_atencion', 'id_asistente')->whereNotNull('id_institucion');
    }

    public function AdministrativoInstitucion()
    {
        return $this->belongsToMany(AdminInstServ::class, 'administrativos_lugar_atencion', 'id_lugar_atencion', 'id_admin')->whereNotNull('id_institucion');
    }

    public function mantencionInstitucion()
    {
        return $this->belongsToMany(AdminMantenInst::class, 'mantencion_lugares_atencion', 'id_lugar_atencion', 'id_admin')->whereNotNull('id_institucion');
    }

    // public function ProfesionalesInstitucion()
    // {
    //     return $this->belongsToMany(Profesional::class, 'profesionales_lugares_atencion', 'id_lugar_atencion', 'id_profesional')->whereNotNull('id_institucion');;
    // }
}

