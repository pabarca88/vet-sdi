<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FichaPediatriaTraumatologia extends Model
{
    use HasFactory;
    protected $table = 'ficha_pediatria_traumatologia';

    public function FichaAtencion()
    {
        return $this->hasOne(FichaAtencion::class, 'id', 'id_ficha_atencion');
    }

    public function FichaPediatriaTraumatologiaOrtopedia()
    {
        return $this->hasOne(FichaPediatriaTraumatologiaOrtopedia::class, 'id', 'id_ficha_traumatologia_ortopedia');
    }

    public function LugarAtencion()
    {
        return $this->hasOne(LugarAtencion::class, 'id', 'id_lugar_atencion');
    }

    public function Responsable()
    {
        return $this->hasOne(Paciente::class, 'id', 'id_responsable');
    }

    public function Paciente()
    {
        return $this->hasOne(Paciente::class, 'id', 'id_paciente');
    }

    public function Profesional()
    {
        return $this->hasOne(Profesional::class, 'id', 'id_profesional');
    }
}
