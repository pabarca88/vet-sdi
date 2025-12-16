<?php

namespace App\Http\Controllers;

use App\Models\ContratoDependiente;
use App\Models\ContratoDependienteProfesional;
use Illuminate\Http\Request;

class ContratoDependienteController extends Controller
{
    public function verRegistro(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id))
        {
            $error['id'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            if($request->tipo_empleado == "PROFESIONAL"){
                $registro = ContratoDependienteProfesional::find($request->id);
            }else{
                $registro = ContratoDependiente::find($request->id);
            }

                if($registro)
                {
                    $datos['estado'] = 1;
                    $datos['msj'] = 'registro';
                    $datos['registro'] = $registro;
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'contrato no encontrado';
                }


        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campos requeridos';
            $datos['error'] = $error;
        }

        return $datos;
    }
}
