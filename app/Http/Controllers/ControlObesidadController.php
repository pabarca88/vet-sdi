<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ControlObesidad;
use Illuminate\Http\Request;

class ControlObesidadController extends Controller
{
    public function getControlObesidad(Request $request)
    {
        $datos= array();
        $filtro = array();


        if(!empty($request->id)) {
            $filtro[] = array('id',$request->id);
        }
       if(!empty($request->peso)) {
            $filtro[] = array('peso',$request->peso);
        }
       if(!empty($request->variacion)) {
            $filtro[] = array('variacion',$request->variacion);
        }
       if(!empty($request->ideal)) {
            $filtro[] = array('ideal',$request->ideal);
        }
       if(!empty($request->id_paciente)) {
            $filtro[] = array('id_paciente',$request->id_paciente);
        }
       if(!empty($request->id_profesional)) {
            $filtro[] = array('id_profesional',$request->id_profesional);
        }
       if(!empty($request->id_ficha_atencion)) {
            $filtro[] = array('id_ficha_atencion',$request->id_ficha_atencion);
        }


        $registros = ControlObesidad::where($filtro)->get();
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
