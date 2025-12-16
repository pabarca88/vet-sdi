<?php

namespace App\Http\Controllers;

use App\Models\TipoConvenioInstitucion;
use Illuminate\Http\Request;

class TipoConvenioInstitucionController extends Controller
{
    public function registrar(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->nombre))
        {
            $error['nombre'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $registro =  new TipoConvenioInstitucion();
            $registro->nombre = $request->nombre;
            $registro->descripcion = $request->descripcion;
            $registro->observacion = $request->observacion;
            $registro->estado = 1;

            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registro exitoso';
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Error en registro';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campo requerido';
            $datos['error'] = $error;
        }

        return $datos;
    }

    public function editar(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id))
        {
            $error['id'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $registro =  TipoConvenioInstitucion::find($request->id);
            if($registro)
            {
                if(!empty($request->nombre))
                    $registro->nombre = $request->nombre;
                if(!empty($request->descripcion))
                    $registro->descripcion = $request->descripcion;
                if(!empty($request->observacion))
                    $registro->observacion = $request->observacion;
                if(!empty($request->estado))
                    $registro->estado = $request->estado;

                if($registro->save())
                {
                    $datos['estado'] = 1;
                    $datos['msj'] = 'registro exitoso';
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'Error en registro';
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Registro no encontrado';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campo requerido';
            $datos['error'] = $error;
        }

        return $datos;
    }

    public function verRegitros(Request $request)
    {
        $datos = array();
        $filtro = array();

        if(!empty($request->nombre))
            $filtro[] = array('nombre', 'like', $request->nombre.'%');

        if(!empty($request->descripcion))
            $filtro[] = array('descripcion', 'like', $request->descripcion.'%');

        if(!empty($request->estado))
            $filtro[] = array('estado', $request->estado);

        $registro = TipoConvenioInstitucion::where($filtro)->get();
        if($registro)
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'registros';
            $datos['registros'] = $registro;
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'sin registros';
        }

        return $datos;
    }

    public function verRegitro(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id))
        {
            $error['id'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $registro = TipoConvenioInstitucion::find($request->id);
            if($registro)
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registro';
                $datos['registro'] = $registro;
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
            $datos['msj'] = 'campo requerido';
            $datos['error'] = $error;
        }

        return $datos;
    }
}
