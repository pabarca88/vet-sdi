<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AntecedentesPaciente;

class Alergia extends Model
{
    use HasFactory;
    protected $table = 'alergias';

    public function Antecedentes()
    {
        return $this->belongsToMany(AntecedentesPaciente::class, 'antecedente_alergias', 'id_alergia', 'id_antecedentes');
    }
}
