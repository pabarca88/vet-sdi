<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsistenteLugarAtencion extends Model
{
    use HasFactory;
    protected $table = 'asistentes_lugar_atencion';

    public function Asistentes()
    {
        return $this->hasOne(Asistente::class, 'id', 'id_asistente');
    }
    public function Direccion()
    {
        return $this->hasOne(Direccion::class, 'id', 'id_direccion');
    }
	public function LugarAtencion()
    {
        return $this->hasOne(LugarAtencion::class, 'id', 'id_lugar_atencion');
    }
}