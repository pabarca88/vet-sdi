<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TipoAntecedenteAcademico;
use Illuminate\Http\Request;

class TipoAntecedenteAcademicoController extends Controller
{
    public function getTipoAntecedenteAcademico(Request $request)
    {
        $datos = array();
        $filtros = array();

        if(!empty($request->id))
            $filtros[] = array('id', $request->id);
        if(!empty($request->nombre))
            $filtros[] = array('nombre', 'like', $request->nombre.'%');
        if(!empty($request->descripcion))
            $filtros[] = array('descripcion', 'like', $request->descripcion.'%');

        $registros = TipoAntecedenteAcademico::where($filtros)->get();

        if($registros)
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'registros';
            $datos['registros'] = $registros;
            $datos['request'] = $request->all();
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'sin registros';
            $datos['request'] = $request->all();
        }
        return $datos;
    }
}
