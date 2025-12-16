<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;
    protected $table = 'articulos';

    protected $fillable = [
        'nombre', 'tipo_cont'
    ];
	
    public function RecetaControl(){
        return $this->hasOne(RecetaControl::class,'cod_control','tipo_cont');
    }
}