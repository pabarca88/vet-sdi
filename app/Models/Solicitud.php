<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;
    protected $table = 'solicitud';

    public function Detalle()
    {
        return $this->hasMany(SolicitudDetalle::class, 'id_solicitud', 'id');
    }
    public function Tipo()
    {
        return $this->hasMany(SolicitudTipo::class, 'id', 'solicitud_tipo');
    }
}
