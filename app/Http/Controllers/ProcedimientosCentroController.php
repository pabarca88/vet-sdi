<?php

namespace App\Http\Controllers;

use App\Models\ProcedimientosCentro;
use Illuminate\Http\Request;

class ProcedimientosCentroController extends Controller
{
    public function registrar_r(Request $request)
    {
        return static::registrar( $request->id_lugar_atencion, $request->nombre, $request->descripcion, $request->minutos_bloque, $request->cantidad_bloques, $request->otros, $request->valor, $request->tipo_ficha_atencion );
    }
    static public function registrar( $id_lugar_atencion, $nombre, $descripcion, $minutos_bloque, $cantidad_bloques, $otros, $valor, $tipo_ficha_atencion )
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($id_lugar_atencion))
        {
            $error['id_lugar_atencion'] = 'campo requrido';
            $valido = 0;
        }
        if(empty($nombre))
        {
            $error['nombre'] = 'campo requrido';
            $valido = 0;
        }
        // if(empty($descripcion))
        // {
        //     $error['descripcion'] = 'campo requrido';
        //     $valido = 0;
        // }
        if(empty($minutos_bloque))
        {
            $error['minutos_bloque'] = 'campo requrido';
            $valido = 0;
        }
        if(empty($cantidad_bloques))
        {
            $error['cantidad_bloques'] = 'campo requrido';
            $valido = 0;
        }
        // if(empty($otros))
        // {
        //     $error['otros'] = 'campo requrido';
        //     $valido = 0;
        // }
        // if(empty($estado))
        // {
        //     $error['estado'] = 'campo requrido';
        //     $valido = 0;
        // }

        if($valido)
        {
            $registro = new ProcedimientosCentro();
            $registro->id_lugar_atencion = $id_lugar_atencion;
            $registro->nombre = $nombre;
            $registro->descripcion = $descripcion;
            $registro->tipo_ficha_atencion = empty($tipo_ficha_atencion)?1:$tipo_ficha_atencion;
            $registro->minutos_bloque = $minutos_bloque;
            $registro->cantidad_bloques = $cantidad_bloques;
            $registro->valor = $valor;
            $registro->otros = $otros;
            $registro->estado = 1;

            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'resgistro exitoso';
                $datos['registros'] = ProcedimientosCentro::where('id_lugar_atencion', $id_lugar_atencion)->where('estado', 1)->get();
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

        return (object)$datos;
    }

    public function modificar_r( Request $request)
    {
        return static::modificar($request->id, $request->id_lugar_atencion, $request->nombre, $request->descripcion, $request->minutos_bloque, $request->cantidad_bloques, $request->valor, $request->otros, $request->estado, $request->tipo_ficha_atencion );
    }
    static public function modificar($id, $id_lugar_atencion, $nombre, $descripcion, $minutos_bloque, $cantidad_bloques, $valor, $otros, $estado, $tipo_ficha_atencion )
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($id))
        {
            $error['ID'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $registro = ProcedimientosCentro::find($id);
            if(!empty($id_lugar_atencion))
                $registro->id_lugar_atencion = $id_lugar_atencion;
            if(!empty($nombre))
                $registro->nombre = $nombre;
            if(!empty($descripcion))
                $registro->descripcion = $descripcion;
            if(!empty($tipo_ficha_atencion))
                $registro->tipo_ficha_atencion = $tipo_ficha_atencion;
            if(!empty($minutos_bloque))
                $registro->minutos_bloque = $minutos_bloque;
            if(!empty($cantidad_bloques))
                $registro->cantidad_bloques = $cantidad_bloques;
            if(!empty($valor))
                $registro->valor = $valor;
            if(!empty($otros))
                $registro->otros = $otros;
            if( intval($estado) == 1 || intval($estado) == 0 )
                $registro->estado = $estado;

            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'resgistro exitoso';
                $datos['registro'] = $registro;
                $datos['registros'] = ProcedimientosCentro::where('id_lugar_atencion', $id_lugar_atencion)->where('estado', 1)->get();
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

        return (object)$datos;
    }

    public function verRegistro_r(Request $request)
    {
        return static::verRegistro($request->id);
    }
    static public function verRegistro($id)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(!empty($id))
        {
            $error['ID'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $registro = ProcedimientosCentro::find($id);
            if($registro)
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registro';
                $datos['registro'] = $registro;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'sin registro';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campo requerido';
            $datos['error'] = $error;
        }

        return (object)$datos;
    }

    public function verRegistros_r(Request $request)
    {
        return static::verRegistros($request->id, $request->id_lugar_atencion, $request->nombre, $request->descripcion, $request->minutos_bloque, $request->cantidad_bloques, $request->valor, $request->otros, $request->estado, $request->tipo_ficha_atencion);

    }
    static public function verRegistros($id, $id_lugar_atencion, $nombre, $descripcion, $minutos_bloque, $cantidad_bloques, $valor, $otros, $estado, $tipo_ficha_atencion)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if($valido)
        {
            $filtro = array();
            if(!empty($id))
                $filtro[] = array('id', $id);
            if(!empty($id_lugar_atencion))
                $filtro[] = array('id_lugar_atencion', $id_lugar_atencion);
            if(!empty($nombre))
                $filtro[] = array('nombre', $nombre);
            if(!empty($descripcion))
                $filtro[] = array('descripcion', $descripcion);
            if(!empty($tipo_ficha_atencion))
                $filtro[] = array('tipo_ficha_atencion', $tipo_ficha_atencion);
            if(!empty($minutos_bloque))
                $filtro[] = array('minutos_bloque', $minutos_bloque);
            if(!empty($cantidad_bloques))
                $filtro[] = array('cantidad_bloques', $cantidad_bloques);
            if(!empty($valor))
                $filtro[] = array('valor', $valor);
            if(!empty($otros))
                $filtro[] = array('otros', $otros);
            if(!empty($estado))
                $filtro[] = array('estado', $estado);

            $registro = ProcedimientosCentro::where($filtro)->get();
            if($registro)
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registro';
                $datos['registro'] = $registro;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'sin registro';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campo requerido';
            $datos['error'] = $error;
        }

        return (object)$datos;
    }

}
