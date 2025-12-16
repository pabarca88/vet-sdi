<?php

namespace App\Http\Controllers;

use App\Models\Diabete;
use Illuminate\Http\Request;

class DiabetesController extends Controller
{
    public function getDiabetes(Request $request)
    {
        $datos= array();
        $filtro = array();
        $valido = 1;
        if(empty($request->id_paciente))
        {
            $error['PACIENTE'] = 'Campo requerido';
            $valido = 0;
        }

        if($valido)
        {
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

            $registros = Diabete::where($filtro)->orderBy('id', 'ASC')->get();
            if(count($registros))
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registros encontrados';
                $datos['registros'] = $registros;
            }
            else
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'sin registros encontrados';
                $datos['registros'] = array();
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
