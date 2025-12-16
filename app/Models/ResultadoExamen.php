<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultadoExamen extends Model
{
    use HasFactory;
    protected $table = 'resultado_examen';

    public function ResultadoExamenArchivo()
    {
        return $this->hasMany(ResultadoExamenArchivo::class, 'id_resultado_examen', 'id')->where('estado', 1);
    }

    public function scopeRangoFecha($query, $rango_dias)
    {
        $date = Carbon::now();
        $Finicio = $date->format('Y-m-d');
        $Ftermino = $date->format('Y-m-d');


        if(!empty($rango_dias))
        {
            $Ftermino = $date->subDay(intval($rango_dias));
        }
        else
        {
            $Ftermino = $date->subDay(intval(7));
        }

        $query->whereBetween('fecha_registro', [$Ftermino, $Finicio]);
    }



}
