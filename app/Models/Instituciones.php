<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instituciones extends Model
{
    use HasFactory;
    protected $table = 'instituciones';
    protected $fillable = [
        'nombre',
        'razon_social',
        'rut',
        'id_tipo_institucion',
        'id_lugar_atencion',
        'direccion',
        'telefono',
        'email',
        'id_responsable',
        'id_responsable_subdireccion',
        'id_responsable_farmacia',
        'id_direccion',
        'foto_perfil'
    ];


    public function Direccion()
    {
        return $this->hasOne(Direccion::class, 'id', 'id_direccion');
    }

    public function Usuario()
    {
        return $this->hasOne(User::class, 'id', 'id_usuario');
    }

    public function UsuarioAdministrador()
    {
        return $this->hasOne(AdminInstServ::class, 'id', 'id_responsable');
    }

    public function UsuarioComercial()
    {
        return $this->hasOne(AdminInstServ::class, 'id', 'id_responsable_subdireccion');
    }

    public function UsuarioFarmacia(){
        return $this->hasOne(AdminInstServ::class, 'id', 'id_responsable_farmacia');
    }

    public function TipoInstitucion()
    {
        return $this->hasOne(TipoInstitucion::class, 'id', 'id_tipo_institucion');
    }
    public function LugarAtencion()
    {
        return $this->hasOne(LugarAtencion::class, 'id', 'id_lugar_atencion');
    }
}
