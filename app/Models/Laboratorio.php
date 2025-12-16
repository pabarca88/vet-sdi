<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratorio extends Model
{
    use HasFactory;
    protected $table = 'laboratorios';

    public function Direccion()
    {
        return $this->hasOne(Direccion::class, 'id', 'id_direccion');
    }

    public function Usuario()
    {
        return $this->hasOne(User::class, 'id', 'id_usuario');
    }
}
