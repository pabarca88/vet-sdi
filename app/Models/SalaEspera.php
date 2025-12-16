<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaEspera extends Model
{
    use HasFactory;

    protected $table = 'sala_espera';
    // protected $fillable = [
    //     'id_institucion',
    //     'id_lugar_atencion',
    //     'alias',
    //     'token',
    //     'piso',
    //     'nombre',
    //     'descripcion',
    //     'estado'
    // ];

    public function boxes()
    {
        return $this->hasMany(SalaEsperaBox::class, 'id_sala_espera');
    }

    public function televisores()
    {
        return $this->hasMany(Televisor::class, 'id_sala_espera');
    }

    public function lugarAtencion()
    {
        return $this->hasOne(LugarAtencion::class, 'id', 'id_lugar_atencion');
    }

    public function institucion()
    {
        return $this->hasOne(Instituciones::class, 'id', 'id_institucion');
    }
}
