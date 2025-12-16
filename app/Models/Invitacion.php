<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitacion extends Model
{
    use HasFactory;
    protected $table = 'invitacion';


    public function TipoUsuario()
    {
        return $this->hasOne(Role::class, 'id', 'id_tipo_usuario');
    }

    public function UserSolicitud()
    {
        return $this->hasOne(User::class, 'id', 'id_user_solicitud');
    }

    public function UserInvitado()
    {
        return $this->hasOne(User::class, 'id', 'id_user_invitado');
    }

    public function LugarAtencion()
    {
        return $this->hasOne(LugarAtencion::class, 'id', 'id_lugar_atencion');
    }

    public function convenio()
    {
        return $this->hasOne(ProfesionalInstitucionConvenio::class, 'id_invitacion', 'id');
    }
}
