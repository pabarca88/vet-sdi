<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\RegistroConfirmacionHoraAgenda;
use Illuminate\Http\Request;

class RegistroConfirmacionHoraAgendaController extends Controller
{
    public function getRegistros(Request $request)
    {
        $datos = array();
        $filtro = array();

        if(!empty($request->nombre))
        {
            $filtro[] = array('nombre',$request->nombre);
        }
        if(!empty($request->estado))
        {
            $filtro[] = array('estado',$request->estado);
        }

        $registro = RegistroConfirmacionHoraAgenda::where($filtro)->get();


        if($registro->count() > 0)
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'registros encontrados';
            $datos['registros'] = $registro;
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'registros NO encontrados';
        }

        return $datos;
    }
}
