<?php

namespace App\Http\Controllers;

use App\Models\CnsTipoTemplate;
use App\Models\FichaPediatriaCns;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FichaPediatriaCnsController extends Controller
{
    public function estructurajson_r(Request $request)
    {
        return static::estructuraJson($request->id_template, $request->all());
    }

    static public function estructuraJson($id_template, $parametros)
    {
        Log::info('estructuraJson');
        Log::info('id_template: '.$id_template);
        Log::info(json_encode($parametros));

        $datos = array();
        $error = array();
        $campo_requerido = 1;

        if(empty($id_template))
        {
            $error['id_template'] = 'campo requerido';
            $campo_requerido = 0;
        }

        if(empty($parametros))
        {
            $error['parametros'] = 'campo requerido';
            $campo_requerido = 0;
        }

        if($campo_requerido)
        {
            $template = CnsTipoTemplate::find($id_template);
            if($template)
            {
                $estructura = explode('|',$template->estructura);
                $alias = $template->alias;
                $info = array();
                foreach ($estructura as $key => $value)
                {
                    if($value == 'estado')
                        $info[$value] = '1';
                    else
                        $info[$value] = '';
                }

                foreach ($parametros as $key_param => $value_param)
                {

                    $temp = $key_param;

                    if(key_exists($temp,$info))
                        $info[$temp] = $value_param;
                }

                $datos['estado'] = 1;
                $datos['msj'] = 'json';
                $datos['json'] = json_encode($info);
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Template no encontrado';
            }

        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Campo requerido';
            $datos['error'] = $error;
        }
        return $datos;
    }

    public function registrar(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_cns_tipo))
        {
            $error['id_cns_tipo'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->id_cns_template))
        {
            $error['id_cns_template'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->id_ficha_atencion))
        {
            $error['id_ficha_atencion'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->id_lugar_atencion))
        {
            $error['id_lugar_atencion'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->id_responsable))
        {
            $error['id_responsable'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->id_paciente))
        {
            $error['id_paciente'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->id_profesional))
        {
            $error['id_profesional'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->nombre))
        {
            $error['nombre'] = 'campo requerido';
            $valido = 0;
        }


        if($valido)
        {

            /** validar si ya exite */
            $filtro_valid = array();
            $filtro_valid[] = array('id_cns_tipo',$request->id_cns_tipo);
            $filtro_valid[] = array('id_cns_template',$request->id_cns_template);
            $filtro_valid[] = array('id_paciente',$request->id_paciente);
            $filtro_valid[] = array('estado', 1);
            $validar_existencia = FichaPediatriaCns::where($filtro_valid)->get()->first();

            if(!$validar_existencia)
            {
                Log::info(json_encode($request->cuerpo));

                $info = static::estructuraJson($request->id_cns_template,  json_decode($request->cuerpo));
                if($info['estado'] == 1)
                {
                    $registro = new FichaPediatriaCns();
                    $registro->id_cns_tipo = $request->id_cns_tipo;
                    $registro->id_cns_template = $request->id_cns_template;
                    $registro->id_ficha_atencion = $request->id_ficha_atencion;
                    $registro->id_lugar_atencion = $request->id_lugar_atencion;
                    $registro->id_responsable = $request->id_responsable;
                    $registro->id_paciente = $request->id_paciente;
                    $registro->id_profesional = $request->id_profesional;
                    $registro->nombre = $request->nombre;
                    $registro->cuerpo = $info['json'];
                    $registro->estado = 1;

                    if($registro->save())
                    {
                        $datos['estado'] = 1;
                        $datos['msj'] = 'registro exitoso';
                    }
                    else
                    {
                        $datos['estado'] = 0;
                        $datos['msj'] = 'falla registro';
                    }
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'Falla en estrutura de datos';
                }
            }
            else
            {
                $info = static::estructuraJson($request->id_cns_template,  json_decode($request->cuerpo));
                if($info['estado'] == 1)
                {
                    $validar_existencia->id_ficha_atencion = $request->id_ficha_atencion;
                    $validar_existencia->id_lugar_atencion = $request->id_lugar_atencion;
                    $validar_existencia->id_responsable = $request->id_responsable;
                    $validar_existencia->id_profesional = $request->id_profesional;
                    $validar_existencia->cuerpo = $info['json'];
                    $validar_existencia->estado = 1;

                    if($validar_existencia->save())
                    {
                        $datos['estado'] = 1;
                        $datos['msj'] = 'actualizacion exitosa';
                    }
                    else
                    {
                        $datos['estado'] = 0;
                        $datos['msj'] = 'falla actualizacion';
                    }
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'Falla en estrutura de datos';
                }

            }

        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Campo requerido';
            $datos['error'] = $error;
        }


        return $datos;
    }
}
