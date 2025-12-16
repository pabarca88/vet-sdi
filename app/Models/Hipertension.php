<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hipertension extends Model
{
    use HasFactory;
    protected $table = 'hipertensiones';

    public function Paciente()
    {
        return $this->hasOne(Paciente::class, 'id', 'id_paciente');
    }
}