<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcompananteDependiente extends Model
{
    use HasFactory;
    protected $table = 'acompanante_dependiente';

    // id_tipo
    // public function tipo()
    // {
    //     return $this->hasOne();
    // }
	// id_dependiente
    public function dependiente()
    {
        return $this->hasOne(Dependiente::class, 'id', 'id_dependiente');
    }
	// id_acompanante
    public function acompanante()
    {
        return $this->hasOne(Acompanante::class, 'id', 'id_acompanante');
    }

}
