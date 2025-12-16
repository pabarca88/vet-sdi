<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UrgenciaReceta extends Model
{
    use HasFactory;
    protected $table = 'urgencia_receta';

    //receta_control
    public function TipoControl()
    {
        return $this->hasOne(RecetaControl::class,'cod_control','tipo_cont');
    }

    // articulo
    public function Articulo()
    {
        return $this->hasOne(Articulo::class,'id','id_articulo');
    }

    // presentacion
    // posologia
    // via_administracion
}
