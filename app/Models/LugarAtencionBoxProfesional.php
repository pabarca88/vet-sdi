<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LugarAtencionBoxProfesional extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'lugar_atencion_box_profesional';

    public function institucion()
    {
        return $this->hasOne(Instituciones::class, 'id', 'id_institucion');
    }

    public function lugarAtencion()
    {
        return $this->hasOne(LugarAtencion::class, 'id', 'id_lugar_atencion');
    }

    public function box()
    {
        return $this->hasOne(BoxCm::class, 'id', 'id_box');
    }

    public function profesional()
    {
        return $this->hasOne(Profesional::class, 'id', 'id_profesional');
    }
}
