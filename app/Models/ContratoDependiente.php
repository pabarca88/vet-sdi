<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContratoDependiente extends Model
{

    use HasFactory;
    protected $table = 'contrato_dependiente';

    public function Historico()
    {
        return $this->hasMany(ContratoHistorico::class,'id', 'id_contrato');
    }

    // public function scopeTipoDebeCuenta2($query)
    // {
    //     return $query->leftJoin('tipo_debe_cuenta',function($join){
    //         $join->on('detalle_documento.id_tipo_debe','=','tipo_debe_cuenta.id_tipo_debe');
    //         $join->on('detalle_documento.id_edificio','=','tipo_debe_cuenta.id_edificio');
    //     })->addSelect('tipo_debe_cuenta.alias','tipo_debe_cuenta.cuenta','tipo_debe_cuenta.contra_cuenta');
    // }

    public function Persona()
    {
        $tipo_empleado = $this->tipo_empleado;
        // var_dump($tipo_empleado);
        $registro = '';
        if(strstr(strtoupper($tipo_empleado), 'ASISTENTE') !== FALSE)
        {
            $registro = $this->hasOne(Asistente::class,'id', 'id_empleado');
        }
        else if(strpos(strtoupper($tipo_empleado), 'ADMINISTRADOR') >= 0)
        {
            $registro = $this->hasOne(AdminInstServ::class,'id', 'id_empleado');
        }
        // else if(strpos(strtoupper($tipo_empleado), 'CONTADOR') >= 0)
        // {

        // }
        else if(strpos(strtoupper($tipo_empleado), 'PROFESIONAL') >= 0)
        {
            $registro = $this->hasOne(Profesional::class,'id', 'id_empleado');
        }

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

    public function scopeFiltroFechaContratoActivo($query, $ano, $mes, $id_lugar_atencion)
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

            $query->where(function($query) use ($ano, $mes, $id_lugar_atencion){
                $query->where(function($query) use ($ano, $mes){
                    // $query->whereYear('fecha_inicio', '>=', intval($ano))->whereMonth('fecha_inicio', '<=', intval($mes));
                    $query->whereMonth('fecha_inicio', '<=', intval($mes));
                })
                ->whereOr(function($query) use ($ano, $mes){
                    $query->whereYear('fecha_inicio', '<=', intval($ano))->whereMonth('fecha_inicio', '<=', intval($mes));
                })
                ->where('id_lugar_atencion', $id_lugar_atencion); // Añadimos el filtro de id_lugar_atencion aquí
            });
        }
    }
}
