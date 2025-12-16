<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\AntecedentesPaciente;

class AntecedentesCirugias extends Model
{
    use HasFactory;
    protected $table = 'antecedentes_cirugias';

    public function AntecentePaciente()
    {
        return $this->hasOne(AntecedentesPaciente::class,'id_antecedentes');
    }
}
