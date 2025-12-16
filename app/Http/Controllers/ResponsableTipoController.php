<?php

namespace App\Http\Controllers;

use App\Models\ResponsableTipo;
use Illuminate\Http\Request;

class ResponsableTipoController extends Controller
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
        // if(empty($request->alias))
        // {
        //     $error['alias'] = 'campo requerido';
        //     $valido = 0;
        // }
        if(empty($request->descripcion))
        {
            $error['descripcion'] = 'campo requerido';
            $valido = 0;
        }
        // if(empty($request->estado))
        // {
        //     $error['estado'] = 'campo requerido';
        //     $valido = 0;
        // }

        if($valido)
        {
            $registro = new ResponsableTipo();
            $registro->nombre = $request->nombre;
            $registro->alias = $request->alias;
            $registro->descripcion = $request->descripcion;
            $registro->estado = $request->estado;

            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'resgistro exitoso';
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'resgistro con falla';
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

    public function ver_registros(Request $request)
    {
        $datos = array();
        $filtros = array();

        if(!empty($request->id))
        {
            $filtros[] = array('id',$request->id);
        }
        if(!empty($request->nombre))
        {
            $filtros[] = array('nombre',$request->nombre);
        }
        if(!empty($request->alias))
        {
            $filtros[] = array('alias',$request->alias);
        }
        if(!empty($request->estado))
        {
            $filtros[] = array('estado',$request->estado);
        }


        $registros = ResponsableTipo::where($filtros)->get();

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

    public function ver_registro(Request $request)
    {
        $datos = array();
        $error = array();

        if(!empty($request->id))
        {
            $registros = ResponsableTipo::find($request->id);

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
            $datos['msj'] = 'ID Campo requerido';
        }

        return $datos;
    }
}
