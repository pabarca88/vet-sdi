<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EnfermedadCronica;
use App\Models\AntecedentesPaciente;
use App\Models\Producto;

class AntecedenteEnferCronica extends Model
{
    use HasFactory;
    protected $table = 'antecedente_enfermedades_cronicas';

    public function Producto()
    {
        return $this->hasOne(Producto::class,'id');
    }

    public function Antecedente()
    {
        return $this->hasOne(AntecedentesPaciente::class,'id');
    }

    public function EnfermedadCronica()
    {
        return $this->hasOne(EnfermedadCronica::class,'id');
    }
}
