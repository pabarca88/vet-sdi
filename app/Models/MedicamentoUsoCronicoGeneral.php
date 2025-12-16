<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicamentoUsoCronicoGeneral extends Model
{
    use HasFactory;
    protected $table = 'medicamentousocronicogeneral';

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



}
