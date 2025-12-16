<?php

namespace App\Http\Controllers;

use App\Models\OtroAcompananteAtencion;
use Illuminate\Http\Request;

class OtroAcompananteAtencionController extends Controller
{
    public function registrar(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_paciente))
        {
            $error['PACIENTE'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_profesional))
        {
            $error['PROFESIONAL'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_ficha_atencion) && empty($request->id_ficha_otros_prof) && empty($request->id_ficha_gineco_obstetrica))
        {
            $error['FICHA'] = 'campo requerido';
            $valido = 0;
        }
        // if(empty($request->id_ficha_otros_prof))
        // {
        //     $error['id_ficha_otros_prof'] = 'campo requerido';
        //     $valido = 0;
        // }
        // if(empty($request->id_ficha_gineco_obstetrica))
        // {
        //     $error['id_ficha_gineco_obstetrica'] = 'campo requerido';
        //     $valido = 0;
        // }
        if(empty($request->nombre))
        {
            $error['NOMBRE'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->apellido_uno))
        {
            $error['APELLIDO PATERNO'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->apellido_dos))
        {
            $error['APELLIDO MATERO'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->rut))
        {
            $error['RUT'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->telefono) && empty($request->email))
        {
            $error['TELEFONO O EMAIL'] = 'campo requerido';
            $valido = 0;
        }
        // if(empty($request->email))
        // {
        //     $error['email'] = 'campo requerido';
        //     $valido = 0;
        // }

        if($valido)
        {
            $registro = new OtroAcompananteAtencion();
            $registro->id_paciente = $request->id_paciente;
            $registro->id_profesional = $request->id_profesional;
            $registro->id_ficha_atencion = $request->id_ficha_atencion;
            $registro->id_ficha_otros_prof = $request->id_ficha_otros_prof;
            $registro->id_ficha_gineco_obstetrica = $request->id_ficha_gineco_obstetrica;
            $registro->nombre = $request->nombre;
            $registro->apellido_uno = $request->apellido_uno;
            $registro->apellido_dos = $request->apellido_dos;
            $registro->rut = $request->rut;
            $registro->telefono = $request->telefono;
            $registro->email = $request->email;

            if ($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'exito';
                $datos['last_id']= $registro->id;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'falla en el registro';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campos requeridos';
            $datos['error'] =  $error;
        }

        return $datos;
    }
}
