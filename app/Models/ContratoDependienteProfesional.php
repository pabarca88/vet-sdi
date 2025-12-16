<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContratoDependienteProfesional extends Model
{
    use HasFactory;
    protected $table = 'contrato_dependiente_profesional';

    public function Persona()
    {

        $registro = $this->hasOne(Profesional::class,'id', 'id_profesional');

        return $registro;
    }

    public function Institucion()
    {
        return $this->hasOne(Instituciones::class, 'id', 'id_institucion');
    }

    public function LugarAtencion()
    {
        return $this->hasOne(LugarAtencion::class, 'id', 'id_lugar_atencion');
    }

    public function scopeFiltroFechaContratoActivo($query, $ano, $mes)
    {
        if(!empty($ano) && !empty($mes))
        {
            // (
            //     (YEAR(fecha_inicio) >= '2023' and MONTH(fecha_inicio) <= 6 )
            //     or
            //     (YEAR(fecha_inicio) <= '2023' and MONTH(fecha_inicio) <= 6)
            // )

            // $query->where(function($query) use ($ano, $mes){
            //     $query->where(function($query) use ($ano, $mes){
            //         $query->whereYear('fecha_inicio', '>=', intval($ano))->whereMonth('fecha_inicio', '<=', intval($mes));
            //     })
            //     ->whereOr(function($query) use ($ano, $mes){
            //         $query->whereYear('fecha_inicio', '<=', intval($ano))->whereMonth('fecha_inicio', '<=', intval($mes));
            //     });
            // });

            // $query->where(function($query) use ($ano, $mes){
            //     $query->whereYear('fecha_inicio', '>=', intval($ano))->whereMonth('fecha_inicio', '<=', intval($mes));
            // })
            // ->whereOr(function($query) use ($ano, $mes){
            //     $query->whereYear('fecha_inicio', '<=', intval($ano))->whereMonth('fecha_inicio', '<=', intval($mes));
            // });

            $query->where(function($query) use ($ano, $mes){
                $query->where(function($query) use ($ano, $mes){
                    // $query->whereYear('fecha_inicio', '>=', intval($ano))->whereMonth('fecha_inicio', '<=', intval($mes));
                    $query->whereMonth('fecha_inicio', '<=', intval($mes));
                })
                ->whereOr(function($query) use ($ano, $mes){
                    $query->whereYear('fecha_inicio', '<=', intval($ano))->whereMonth('fecha_inicio', '<=', intval($mes));
                });
            });
        }
    }
}
