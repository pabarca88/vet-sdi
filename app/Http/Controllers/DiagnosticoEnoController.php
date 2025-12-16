<?php

namespace App\Http\Controllers;

use App\Models\DiagnosticoEno;
use Illuminate\Http\Request;

class DiagnosticoEnoController extends Controller
{
    public function verRegistros()
    {
        $datos = array();

        $registros = DiagnosticoEno::where('estado', 1)->get();

        if($registros)
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'registros';
            $datos['registros'] = $registros;
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'sin registros';
        }

        return $datos;
    }

    public function verRegistrosAuto(Request $request)
    {
        $search = $request->search;
        if ($search == '')
        {
            $diagnosticos = DiagnosticoEno::where('estado', 1)->orderby('nombre', 'asc')->select('id', 'nombre')->limit(15)->get();
        }
        else
        {
            $diagnosticos = DiagnosticoEno::where('estado', 1)->orderby('nombre', 'asc')->select('id', 'nombre')->where('nombre', 'like', $search . '%')->limit(15)->get();
        }

        $response = array();
        foreach ($diagnosticos as $diagnostico)
        {
            $response[] = array("value" => $diagnostico->id, "label" => $diagnostico->nombre);
        }
        return response()->json($response);
    }
}
