<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FichaOtorrinoRinof extends Model
{
    use HasFactory;
    protected $table = 'ficha_otorrino_rinof';

    public function FichaAtencion()
    {
        return $this->hasOne(FichaAtencion::class, 'id', 'id_fichas_atenciones');
    }

    public function FichaOtorrino()
    {
        return $this->hasOne(FichaOtorrino::class, 'id', 'id_ficha_otorrino');
    }

    public function Paciente()
    {
        return $this->hasOne(Paciente::class, 'id', 'id_paciente');
    }

    public function Profesional()
    {
        return $this->hasOne(Profesional::class, 'id', 'solicitado_id_profesional');
    }

}
