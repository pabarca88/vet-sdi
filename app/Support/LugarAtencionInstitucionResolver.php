<?php

namespace App\Support;

use App\Models\Instituciones;
use App\Models\Sucursal;

class LugarAtencionInstitucionResolver
{
    public static function resolve(?int $idLugarAtencion): ?int
    {
        if (empty($idLugarAtencion)) {
            return null;
        }

        $institucion = Instituciones::where('id_lugar_atencion', $idLugarAtencion)->first();
        if ($institucion) {
            return (int) $institucion->id;
        }

        $sucursal = Sucursal::where('id_lugar_atencion', $idLugarAtencion)->first();
        if ($sucursal) {
            return (int) $sucursal->id_institucion;
        }

        return null;
    }
}
