<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SalaEsperaBox extends Model
{
    use HasFactory;

    protected $table = 'sala_espera_box';
    // protected $fillable = [
    //     'id_sala_espera',
    //     'id_box',
    //     'estado'
    // ];

    public function salaEspera()
    {
        return $this->belongsTo(SalaEspera::class, 'id_sala_espera');
    }

    public function boxesCm()
    {
        return $this->HasOne(BoxesCm::class, 'id','id_box');
    }
}
