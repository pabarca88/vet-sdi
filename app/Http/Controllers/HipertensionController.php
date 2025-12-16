<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Hipertension;
use Illuminate\Http\Request;

class HipertensionController extends Controller
{
    public function getHipertension(Request $request)
    {
        $datos= array();
        $filtro = array();

        if(!empty($request->id_paciente)) {
            $filtro[] = array('id_paciente',$request->id_paciente);
        }
        if(!empty($request->id_profesional)) {
            $filtro[] = array('id_profesional',$request->id_profesional);
        }
        if(!empty($request->id_ficha_atencion)) {
            $filtro[] = array('id_ficha_atencion',$request->id_ficha_atencion);
        }
        if(!empty($request->id_lugar_atencion)) {
            $filtro[] = array('id_lugar_atencion',$request->id_lugar_atencion);
        }

        $registros = Hipertension::where($filtro)->orderBy('id', 'ASC')->get();
        if(count($registros))
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'registros encontrados';
            $datos['registros'] = $registros;
        }
        else{
            $datos['estado'] = 1;
            $datos['msj'] = 'sin registros encontrados';
            $datos['registros'] = array();
        }
		return $datos;
    }
}
