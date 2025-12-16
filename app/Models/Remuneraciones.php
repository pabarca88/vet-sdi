<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Remuneraciones extends Model
{
    use HasFactory;
    protected $table = 'remuneraciones';


    public function ContratoDependiente()
    {
        return $this->hasOne(ContratoDependiente::class, 'id', 'id_contrato_dependiente');
    }

    public function ContratoDependienteProfesional()
    {
        return $this->hasOne(ContratoDependienteProfesional::class, 'id', 'id_contrato_dependiente');
    }

}
