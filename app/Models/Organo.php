<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AntecedentesPaciente;

class Organo extends Model
{
    use HasFactory;
    protected $table = 'organos';

    public function Organos()
    {
        return $this->belongsToMany(AntecedentesPaciente::class, 'organos_antecedentes', 'id_organo', 'id_antecedentes');
    }
}
