<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Televisor extends Model
{
    use HasFactory;

    protected $table = 'televisor';
    // protected $fillable = [
    //     'id_institucion',
    //     'id_lugar_atencion',
    //     'id_sala_espera',
    //     'alias',
    //     'token',
    //     'nombre',
    //     'descripcion',
    //     'estado'
    // ];

    public function salaEspera()
    {
        return $this->belongsTo(SalaEspera::class, 'id_sala_espera');
    }
}
