<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    use HasFactory;
    protected $table = 'sucursal';

    public function Direccion()
    {
        return $this->hasOne(Direccion::class, 'id', 'id_direccion');
    }

    public function Horario()
    {
        return $this->hasOne(SucursalHorario::class, 'id', 'id_sucursal');
    }


}
