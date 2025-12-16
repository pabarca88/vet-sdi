<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminMantenInst extends Model
{
    use HasFactory;
    protected $table = 'admin_mantencion_institucion';

    public function Premium()
    {
        return $this->hasOne(Premium::class, 'id', 'id_premium');
    }

    public function Direccion()
    {
        return $this->hasOne(Direccion::class, 'id', 'id_direccion');
    }

    public function Usuario()
    {
        return $this->hasOne(User::class, 'id', 'id_admin');
    }

    public function TipoAdministrador()
    {
        return $this->hasOne(TipoAdministrador::class, 'id', 'id_tipo_administrador');
    }
}
