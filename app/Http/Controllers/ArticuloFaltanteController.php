<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ArticuloFaltante;

class ArticuloFaltanteController extends Controller
{
    public function registrarArticulo(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 0;

        if(empty($request->nombre)){
	        $error['nombre'] = 'nombre requerido';
	        $valido = 1;
        }
        if(empty($request->droga)){
	        $error['droga'] = 'droga requerido';
	        $valido = 1;
        }
        if(empty($request->id_profesional)){
	        $error['id_profesional'] = 'id_profesional requerido';
	        $valido = 1;
        }
        // if(empty($request->fecha_solicitud)){
	    //     $error['fecha_solicitud'] = 'fecha_solicitud requerido';
	    //     $valido = 1;
        // }
        // if(empty($request->fecha_cierre)){
	    //     $error['fecha_cierre'] = 'fecha_cierre requerido';
	    //     $valido = 1;
        // }

        if($valido == 0)
        {
            $articuloFaltante = new ArticuloFaltante();

            $articuloFaltante->nombre = $request->nombre;
            $articuloFaltante->droga = $request->droga;
            $articuloFaltante->id_profesional = $request->id_profesional;
            $articuloFaltante->fecha_solicitud = date('Y-m-d');
            //$articuloFaltante->fecha_cierre = 'NULL';
            $articuloFaltante->estado = 1;

            if($articuloFaltante->save())
            {
                $datos['estado'] = 1;
                $datos['mjs'] = 'Registro Creado';
                $datos['request'] = $request->all();
            }
            else
            {
                $datos['estado'] = 0;
                $datos['mjs'] = 'Problema al Registrar';
                $datos['request'] = $request->all();
            }

        }
        else
        {
            $datos['estado'] = 0;
            $datos['mjs'] = 'Error';
            $datos['error'] = $error;
            $datos['request'] = $request->all();
        }
        return $datos;
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * id -> id de ArticuloFaltante
     * estado -> 0 = nuevo; 1 = en proceso; 2 = procesado
     * @return json
     */
    public function estado(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 0;

        if(empty($request->id)){
	        $error['id'] = 'id requerido';
	        $valido = 1;
        }
        if(empty($request->estado)){
	        $error['estado'] = 'estado requerido';
	        $valido = 1;
        }

        if($valido == 0)
        {
            $articuloFaltante = ArticuloFaltante::find($request->id);

            if($articuloFaltante->count())
            {
                $articuloFaltante->estado = $request->estado;
                if($request->estado == 2)
                    $articuloFaltante->fecha_cierre = date('Y-m-d');

                if($articuloFaltante->save())
                {
                    $datos['estado'] = 1;
                    $datos['mjs'] = 'Registro Creado';
                    $datos['request'] = $request->all();
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['mjs'] = 'Problema al Registrar';
                    $datos['request'] = $request->all();
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['mjs'] = 'ID no encontrado';
                $datos['request'] = $request->all();
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['mjs'] = 'Error';
            $datos['error'] = $error;
            $datos['request'] = $request->all();
        }

        return $datos;
    }

    public function getArticuloFaltante(Request $request)
    {

        $datos = array();

        $filtro = array();
        if(!empty($request->estado))
            $filtro[] = array('estado',$request->estado);

        $registro = ArticuloFaltante::where($filtro)->get();
        if($registro->count())
        {
            $datos['estado'] = 1;
            $datos['registro'] = $registro;
            $datos['request'] = $request->all();
        }
        else
        {
            $datos['estado'] = 0;
            $datos['mjs'] = 'Sin Registros';
            $datos['request'] = $request->all();
        }

        return $datos;
    }
}
