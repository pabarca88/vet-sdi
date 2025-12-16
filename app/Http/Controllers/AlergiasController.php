<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Alergia;
use Illuminate\Http\Request;

class AlergiasController extends Controller
{
    public function getAlergias(Request $request)
    {
        $datos = array();
        $filtro = array();

        if(!empty($request->id))
        {
            $filtro[] = array('id',$request->id);
        }
        if(!empty($request->nombre_alergia))
        {
            $filtro[] = array('nombre_alergia',$request->nombre_alergia);
        }
        if(!empty($request->descripcion_alergia))
        {
            $filtro[] = array('descripcion_alergia',$request->descripcion_alergia);
        }
        if(!empty($request->es_medicamento))
        {
            $filtro[] = array('es_medicamento',$request->es_medicamento);
        }
        if(!empty($request->search))
        {
            $filtro[] = array('nombre_alergia','like', $request->search.'%');
        }

        $registros = Alergia::where($filtro)->get();
        if($registros->count() > 0)
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'registros encontrados';
            $datos['registros'] = $registros;
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'registros no encontrados';
        }

        return $datos;
    }

    public function getAlergiasAutocomplete(Request $request)
    {
        $datos = array();
        $filtro = array();

        if(!empty($request->id))
        {
            $filtro[] = array('id',$request->id);
        }
        if(!empty($request->nombre_alergia))
        {
            $filtro[] = array('nombre_alergia',$request->nombre_alergia);
        }
        if(!empty($request->descripcion_alergia))
        {
            $filtro[] = array('descripcion_alergia',$request->descripcion_alergia);
        }
        if(!empty($request->es_medicamento))
        {
            $filtro[] = array('es_medicamento',$request->es_medicamento);
        }
        if(!empty($request->search))
        {
            $filtro[] = array('nombre_alergia','like', $request->search.'%');
        }

        $registros = Alergia::where($filtro)->get();
        if($registros->count() > 0)
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'registros encontrados';
            $datos['registros'] = $registros;
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'registros no encontrados';
        }

        $response = array();
        foreach ($registros as $registro) {
            $response[] = array("value" => $registro->id, "label" => $registro->nombre_alergia);
        }

        return response()->json($response);
    }
}
