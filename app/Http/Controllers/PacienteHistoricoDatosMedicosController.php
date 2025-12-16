<?php

namespace App\Http\Controllers;

use App\Models\PacienteHistoricoDatosMedicos;
use Illuminate\Http\Request;

class PacienteHistoricoDatosMedicosController extends Controller
{

    public function registrar_r(Request $request)
    {
        return static::registrar($request->id_paciente, $request->id_profesional, $request->datos);
    }

    static public function registrar($id_paciente, $id_profesional, $datos)
    {
        $data = array();
        $error = array();
        $valido = 1;

        if($valido)
        {
            $registro = new PacienteHistoricoDatosMedicos();

            $registro->id_paciente = $id_paciente;
            $registro->id_profesional = $id_profesional;
            $registro->datos = $datos;

            if($registro->save())
            {
                $data['estado'] = 1;
                $data['msj'] = 'exito';
            }
            else
            {
                $data['estado'] = 0;
                $data['msj'] = 'Fallas';
            }
        }
        else
        {
            $data['estado'] = 0;
            $data['msj'] = 'campos requeridos';
            $data['error'] = $error;
        }

        return $data;
    }

    public function verRegistrosPaciente(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_paciente))
        {
            $error['PACIENTE'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $registros = PacienteHistoricoDatosMedicos::where('id_paciente', $request->id_paciente)->orderBy('created_at', 'DESC')->get();

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
