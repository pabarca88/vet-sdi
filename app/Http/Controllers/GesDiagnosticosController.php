<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\GesDiagnostico;
use Illuminate\Http\Request;

class GesDiagnosticosController extends Controller
{
    public function get_ges(Request $request)
    {
        $search = $request->search;

        if ($search == '') {
            $registros = GesDiagnostico::orderby('nombre', 'asc')->select('id', 'nombre')->limit(15)->get();
        } else {
            $registros = GesDiagnostico::orderby('nombre', 'asc')->select('id', 'nombre')->where('nombre', 'like', '%' . $search . '%')->limit(15)->get();
        }

        $response = array();
        foreach ($registros as $registro) {
            $response[] = array("value" => $registro->id, "label" => $registro->nombre);
        }

        return response()->json($response);
    }
}
