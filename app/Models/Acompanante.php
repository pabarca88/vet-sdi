<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acompanante extends Model
{
    use HasFactory;
    protected $table = 'acompanante';

    // public function Dependiente()
    // {
    //     return $this->belongsToMany(Dependiente::class, 'acompanante_dependiente', 'id_acompanante', 'id_dependiente');
    // }

}
