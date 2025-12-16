<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GesRegistrosImg extends Model
{
    use HasFactory;
    protected $table = 'ges_registros_img';

    public function GesRegistros()
    {
        return $this->hasOne(GesRegistros::class, 'id', 'id_registro_ges');
    }

    public function Paciente()
    {
        return $this->hasOne(Paciente::class, 'id', 'id_paciente');
    }

    public function Profesional()
    {
        return $this->hasOne(Profesional::class, 'id', 'id_profesional');
    }

    public function FichaAtencion()
    {
        return $this->hasOne(FichaAtencion::class, 'id', 'id_ficha_atencion');
    }

    public function LugarAtencion()
    {
        return $this->hasOne(LugarAtencion::class, 'id', 'id_lugar_atencion');
    }

}
