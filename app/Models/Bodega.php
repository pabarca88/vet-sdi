<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bodega extends Model
{
    use HasFactory;
    protected $table = 'bodega';

    protected $fillable = [
        'id_institucion',
		'id_lugar_atencion',
        'nombre',
        'descripcion',
        'direccion',
        'telefono',
        'email',
        'id_responsable'
    ];

    public function Institucion()
    {
        return $this->hasOne(Instituciones::class, 'id', 'id_institucion');
    }

    // public function LugarAtencion()
    // {
    //     return $this->hasOne(LugarAtencion::class, 'id', 'id_lugar_atencion');
    // }

    // public function Responsable()
    // {
    //     return $this->hasOne(AdminInstServ::class, 'id', 'id_responsable');
    // }
}
