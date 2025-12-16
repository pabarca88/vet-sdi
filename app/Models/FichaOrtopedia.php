<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FichaOrtopedia extends Model
{
    use HasFactory;
    protected $table = 'ficha_ortopedia';


    public function LugarAtencion()
    {
        return $this->hasOne(LugarAtencion::class, 'id', 'id_lugar_atencion');
    }

    public function FichaAtencion()
    {
        return $this->hasOne(FichaAtencion::class, 'id', 'id_ficha_atencion');
    }

    public function Paciente()
    {
        return $this->hasOne(Paciente::class, 'id', 'id_paciente');
    }

    public function Responsable()
    {
        return $this->hasOne(Paciente::class, 'id', 'id_responsable');
    }

    public function Profesional()
    {
        return $this->hasOne(Profesional::class, 'id', 'id_profesional');
    }
}
