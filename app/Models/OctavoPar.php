<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OctavoPar extends Model
{
    use HasFactory;
    protected $table = 'octavo_par';

     //hora medica
    public function HoraMedica()
    {
        return $this->hasOne(HoraMedica::class,'id_otros_profesionales', 'id_otros_profesionales');
    }
}
