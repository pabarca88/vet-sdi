<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FichaPediatriaVacuna extends Model
{
    use HasFactory;
    protected $table = 'ficha_pediatria_vacuna';


    public function LugarAtencion()
    {
        return $this->hasOne(LugarAtencion::class, 'id', 'id_lugar_atencion');
    }

    public function FichaAtencion()
    {
        return $this->hasOne(FichaAtencion::class, 'id', 'id_ficha_atencion');
    }

    public function FichaAtencionPediatrica()
    {
        return $this->hasOne(FichaAtencionPediatrica::class, 'id', 'id_ficha_pediatria');
    }

    public function TipoVacuna()
    {
        return $this->hasOne(TipoVacuna::class, 'id', 'id_tipo_vacuna');
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
