<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recomendacion extends Model
{
    use HasFactory;
    protected $table = 'recomendacion';

    public function scopeTipoControl($query, $lista)
    {
        if(!empty($lista))
        {
            $lista_temp = '';
            if(strpos($lista, ',') > 0)
            {
                $lista_temp = explode(',', $lista);
            }
            else
            {
                $lista_temp = array($lista);
            }
            $query->whereIn('control', $lista_temp)->get();
        }
    }

    public function scopeAnio($query, $anio)
    {
        if (!empty($anio)) {
            $query->whereYear('created_at','=',intval($anio));
        }
    }

    public function scopeMes($query, $mes)
    {
        if (!empty($mes)) {
            $query->whereMonth('created_at','=',intval($mes));
        }
    }

}
