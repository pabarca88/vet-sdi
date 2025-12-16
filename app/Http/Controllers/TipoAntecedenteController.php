<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoAntecendete;


class TipoAntecedenteController extends Controller
{
    public function verRegistros(Request $request)
    {
        $datos = array();
        $cant_x_pagina = 10;
        $filtros = array();

        if(!empty($request->id))
            $filtros[] = array('id',$request->id);
        if(!empty($request->nombre))
            $filtros[] = array('nombre',$request->nombre);
        if(!empty($request->html))
            $filtros[] = array('html',$request->html);       
        if($request->estado!='')
            $filtros[] = array('estado',$request->estado);
        

        /* CANTIDAD REGISTROS X PAG */
        $cant_reg = TipoAntecendete::where($filtros)->count();

        if($cant_reg >0){

            $registros = TipoAntecendete::where($filtros)->get();

            $datos['estado'] = 1;
            $datos['cantidad_registros'] = $cant_reg;
            $datos['request'] = $request->all();           
            $datos['registros'] = $registros;

        }else{
            $datos['estado'] = 0;
            $datos['msg'] = 'Sin registros';
            $datos['request'] = $request->all();
        }

        return response($datos)->header('Content-Type', 'application/json');
    }

    public function verRegistro(Request $request){

        $datos = array();
        $filtros = array();
        $error = array();
        $campos_requeridos = 0;


        /* VALIDACION CAMPOS */
        if(empty($request->id)||(int)$request->id==0)
        {
            $error['id'] = 'campo requerido';
            $campos_requeridos = 1;
        }


        /* CAMPOS FILTRO */
        if(!empty($request->id))
            $filtros[] = array('id',$request->id);
        if(!empty($request->nombre))
            $filtros[] = array('nombre',$request->nombre);
        if(!empty($request->html))
            $filtros[] = array('html',$request->html);       
        if($request->estado!='')
            $filtros[] = array('estado',$request->estado);

        if($campos_requeridos==0)
        {

            $cant_reg = TipoAntecendete::count();

            if($cant_reg >0){

                // Generamos la consulta
                $registros = TipoAntecendete::where($filtros)->find($request->id);

                if($registros->count())
                {
                    $datos['estado'] = 1;
                    $datos['registros'] = $registros;
                    $datos['request'] = $request->all();

                }else{
                    $datos['estado'] = 0;
                    $datos['msg'] = 'Registro no encontrado';
                    $datos['request'] = $request->all();
                }

            }else{
                $datos['estado'] = 0;
                $datos['msg'] = 'Sin registros';
                $datos['request'] = $request->all();
            }
        }else{
            $datos['estado'] = 0;
            $datos['msg'] = 'Campos Requeridos';
            $datos['request'] = $request->all();
            $datos['error'] = $error;
        }

        return response($datos)->header('Content-Type', 'application/json');

    }

    public function registrar(Request $request)
    {
        $datos = array();
        $error = array();
        $campos_requeridos = 0;

        $registro = new TipoAntecendete();


        /* VALIDACION CAMPOS */
        if($request->nombre=='')
        {
            $error['nombre'] = 'campo requerido';
            $campos_requeridos = 1;
        }
        if($request->html=='')
        {
            $error['html'] = 'campo requerido';
            $campos_requeridos = 1;
        }        

        if($request->estado=='')
        {
            $error['estado'] = 'campo requerido';
            $campos_requeridos = 1;
        }
        
     


        /* FIN - VALIDACION CAMPOS */

        if($campos_requeridos==0)
        {
            $registro->nombre = $request->nombre;
            $registro->html = $request->html;          
            $registro->estado = $request->estado;

            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msg'] = 'Registros Creado';
                $datos['request_data'] = $request->all();
            }else{
                $datos['estado'] = 0;
                $datos['msg'] = 'Problemas al registrar';
                $datos['request_data'] = $request->all();
            }
        }else{
            $datos['estado'] = 0;
            $datos['msg'] = 'Campos requeridos';
            $datos['error'] = $error;
            $datos['request_data'] = $request->all();
        }

        return response($datos)->header('Content-Type', 'application/json');
    }

    public function modificar(Request $request)
    {
        $datos = array();
        $error = array();
        $campos_requeridos = 0;

        /* VALIDAR DATOS */
        if((int)$request->id==0){
            $error['id'] = 'Campo requerido';
            $campos_requeridos = 1;
        }

        if($request->nombre=='')
        {
            $error['nombre'] = 'campo requerido';
            $campos_requeridos = 1;
        }
        if($request->html=='')
        {
            $error['html'] = 'campo requerido';
            $campos_requeridos = 1;
        }
     
        

        if($campos_requeridos==0)
        {

            $registro = TipoAntecendete::find($request->id);

            if(count($registro))
            {

                if(!empty($request->nombre))
                    $registro->nombre = $request->nombre;
                if(!empty($request->html))
                    $registro->html = $request->html;            

                if($registro->save())
                {
                    $datos['estado'] = 1;
                    $datos['msg'] = 'Registro Modificado';
                    $datos['request_data'] = $request->all();
                }else{
                    $datos['estado'] = 0;
                    $datos['msg'] = 'Problemas al Modificar';
                    $datos['request_data'] = $request->all();
                }
            }else{
                $datos['estado'] = 0;
                $datos['msg'] = 'Registro no existente, vuelva a intentarlo.';
                $datos['request_data'] = $request->all();
            }
        }else{
            $datos['estado'] = 0;
            $datos['msg'] = 'Registro no existente, vuelva a intentarlo.';
            $datos['error'] = $error;
            $datos['request_data'] = $request->all();
        }

        return response($datos)->header('Content-Type', 'application/json');
    }

    public function estado(Request $request)
    {
        $datos = array();
        $error = array();
        $campos_requeridos = 0;

        /* VALIDAR DATOS */
        if(empty($request->id)||(int)$request->id==0){
            $error['id'] = 'Campo requerido';
            $campos_requeridos = 1;
        }
        if($request->estado==null){
            $error['estado'] = 'Campo requerido';
            $campos_requeridos = 1;
        }

        if($campos_requeridos==0)
        {

            $registro = TipoAntecendete::find($request->id);

            if($registro->count()>0)
            {
                if($registro->estado == 0)
                {
                    $registro->estado = $request->estado;
                    if($registro->save())
                    {
                        $datos['estado'] = 1;
                        $datos['msg'] = 'Registro Actualizado';
                        $datos['request'] = $request->all();
                    }else{
                        $datos['estado'] = 0;
                        $datos['msg'] = 'Problemas al actualizar el registro';
                        $datos['request'] = $request->all();
                    }
                }else{
                    $datos['estado'] = 2;
                    $datos['estado_registro'] = $registro->estado;
                    $datos['msg'] = 'Registro ya actualizado';
                    $datos['request'] = $request->all();
                }

            }else{
                $datos['estado'] = 0;
                $datos['msg'] = 'Registro no existe';
                $datos['request'] = $request->all();
            }
        }else{
            $datos['estado'] = 0;
            $datos['msg'] = 'Campos Requeridos';
            $datos['error'] = $error;
            $datos['request'] = $request->all();
        }

        return response($datos)->header('Content-Type', 'application/json');
    }
}
