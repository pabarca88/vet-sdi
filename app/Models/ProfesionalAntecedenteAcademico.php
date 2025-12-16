<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfesionalAntecedenteAcademico extends Model
{
    use HasFactory;
    protected $table = 'profesional_antecedente_academico';

    public function TipoAntecedenteAcademico()
    {
        return $this->hasOne(TipoAntecedenteAcademico::class,  'id', 'id_tipo_antecedente_academico');
    }

}
