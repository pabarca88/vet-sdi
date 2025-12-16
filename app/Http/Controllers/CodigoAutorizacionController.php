<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CodigosAutorizaciones;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CodigoAutorizacionController extends Controller
{
    /**
     * Undocumented function
     *
     * @param Request $request
     *       codigo
     *       id_tipo_autorizacion
     *       id_control
     *       id_tipo_medio
     *       medio
     *       fecha_solicitud
     *       hora_solicitud
     *       fecha_autorizacion
     *       hora_autorizacion
     *       info_equipo_autorizacion
     *       nombre_autoriza
     *       apellido_autoriza
     *       rut_autoriza
     *       id_parentezco_autoriza
     * @return json
     */
    public function crear(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        // if(empty($request->codigo))
        // {
        //     $valido = 0;
        //     $error['codigo'] = 'campo requerido codigo\n';
        // }
        if(empty($request->id_tipo_autorizacion))
        {
            $valido = 0;
            $error['id_tipo_autorizacion'] = 'campo requerido id_tipo_autorizacion\n';
        }
        if(empty($request->id_profesional))
        {
            $valido = 0;
            $error['id_profesional'] = 'campo requerido id_profesional\n';
        }
        if(empty($request->id_control))
        {
            $valido = 0;
            $error['id_control'] = 'campo requerido id_control\n';
        }
        if(empty($request->id_tipo_medio))
        {
            $valido = 0;
            $error['id_tipo_medio'] = 'campo requerido id_tipo_medio\n';
        }
        if(empty($request->medio))
        {
            $valido = 0;
            $error['medio'] = 'campo requerido medio\n';
        }
        // if(empty($request->fecha_solicitud))
        // {
        //     $valido = 0;
        //     $error['fecha_solicitud'] = 'campo requerido fecha_solicitud\n';
        // }
        // if(empty($request->hora_solicitud))
        // {
        //     $valido = 0;
        //     $error['hora_solicitud'] = 'campo requerido hora_solicitud\n';
        // }
        // if(empty($request->fecha_autorizacion))
        // {
        //     $valido = 0;
        //     $error['fecha_autorizacion'] = 'campo requerido fecha_autorizacion\n';
        // }
        // if(empty($request->hora_autorizacion))
        // {
        //     $valido = 0;
        //     $error['hora_autorizacion'] = 'campo requerido hora_autorizacion\n';
        // }
        // if(empty($request->info_equipo_autorizacion))
        // {
        //     $valido = 0;
        //     $error['info_equipo_autorizacion'] = 'campo requerido info_equipo_autorizacion\n';
        // }
        if(empty($request->nombre_autoriza))
        {
            $valido = 0;
            $error['nombre_autoriza'] = 'campo requerido nombre_autoriza\n';
        }
        if(empty($request->apellido_autoriza))
        {
            $valido = 0;
            $error['apellido_autoriza'] = 'campo requerido apellido_autoriza\n';
        }
        if(empty($request->rut_autoriza))
        {
            $valido = 0;
            $error['rut_autoriza'] = 'campo requerido rut_autoriza\n';
        }
        if(empty($request->id_parentezco_autoriza))
        {
            $valido = 0;
            $error['id_parentezco_autoriza'] = 'campo requerido id_parentezco_autoriza\n';
        }
        if(empty($request->telefono_autoriza))
        {
            $valido = 0;
            $error['telefono_autoriza'] = 'campo requerido telefono_autoriza\n';
        }
        if(empty($request->email_autoriza))
        {
            $valido = 0;
            $error['email_autoriza'] = 'campo requerido email_autoriza\n';
        }
        // if(empty($request->estado))
        // {
        //     $valido = 0;
        //     $error['estado'] = 'campo requerido estado\n';
        // }

        if($valido == 1)
        {
            $cod_auto = new CodigosAutorizaciones();

            $cod_auto->codigo = random_int(1000, 9999);
            $cod_auto->id_tipo_autorizacion = $request->id_tipo_autorizacion;
            $cod_auto->id_profesional = $request->id_profesional;
            $cod_auto->id_control = $request->id_control;
            $cod_auto->id_tipo_medio = $request->id_tipo_medio;
            $cod_auto->medio = $request->medio;
            $cod_auto->fecha_solicitud = date('Y-m-d');
            $cod_auto->hora_solicitud = date('H:i:s');
            // $cod_auto->fecha_autorizacion = $request->fecha_autorizacion;
            // $cod_auto->hora_autorizacion = $request->hora_autorizacion;
            // $cod_auto->info_equipo_autorizacion = $request->info_equipo_autorizacion;
            $cod_auto->nombre_autoriza = $request->nombre_autoriza;
            $cod_auto->apellido_autoriza = $request->apellido_autoriza;
            $cod_auto->rut_autoriza = $request->rut_autoriza;
            $cod_auto->id_parentezco_autoriza = $request->id_parentezco_autoriza;
            $cod_auto->telefono_autoriza = $request->telefono_autoriza;
            $cod_auto->email_autoriza = $request->email_autoriza;
            $cod_auto->estado = 1;

            if($cod_auto->save())
            {
                $filtro_up = array();
                $filtro_up[] = array('id_profesional',$request->id_profesional);
                $filtro_up[] = array('id_control',$request->id_control);
                $filtro_up[] = array('id_tipo_medio',$request->id_tipo_medio);
                $filtro_up[] = array('estado',1);
                $filtro_up[] = array('id','!=',$cod_auto->id);
                $registro_update = CodigosAutorizaciones::where($filtro_up)->delete();

                $datos['estado'] = 1;
                $datos['msj'] = 'registro creado';
                $datos['request'] = $request->all();
                $datos['delete'] = $registro_update;
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

    public function validarCodigo(Request $request)
    {
        $datos = array();
        $filtros = array();
        $error = array();
        $valido = 1;

        // if(empty($request->id_profesional))
        // {
        //     $valido = 0;
        //     $error['id_profesional'] = 'campo requerido id_profesional\n';
        // }
        if(empty($request->id_control))
        {
            $valido = 0;
            $error['id_control'] = 'campo requerido id_control\n';
        }
        if(empty($request->codigo))
        {
            $valido = 0;
            $error['codigo'] = 'campo requerido codigo\n';
        }

        if($valido == 1)
        {
            $filtros[] = array('id_profesional', Auth::user()->id);
            $filtros[] = array('id_control', $request->id_control);
            $filtros[] = array('codigo', $request->codigo);
            $filtros[] = array('fecha_solicitud', date('Y-m-d'));
            $filtros[] = array('estado', 1);

            // /** validando tiempo de ejecucion de codigo de autorizacion */
            // $mifecha = new DateTime(date('H:i:s'));
            // $mifecha->modify('+20 minute');
            // $filtros[] = array('estado', 1);
            // $registro = CodigosAutorizaciones::where($filtros)->whereTime('hora_solicitud','<=',$mifecha->format('H:i:s'))->first();
            $registro = CodigosAutorizaciones::where($filtros)->first();
            if($registro)
            {
                $hora_solicitud = $registro->hora_solicitud;
                /** validando tiempo de ejecucion de codigo de autorizacion */
                // $hora_vencimiento = new DateTime($hora_solicitud);
                // $hora_vencimiento->modify('+20 minute');
                $hora_vencimiento = new DateTime();
                // var_dump($hora_vencimiento);

                $fecha1 = new DateTime($hora_solicitud);//fecha inicial
                $fecha2 = $hora_vencimiento;//fecha de cierre

                $intervalo = $fecha1->diff($fecha2);
                $diferencia_minutos = (int) $intervalo->format('%i');
                if($diferencia_minutos <= (int)env('TIEMPO_MAXIMO_CODIGO_AUTORIZACION'))
                {
                    $filtros[] = array('estado', 1);
                    $registro->estado = 2; // usado
                    $registro->fecha_autorizacion = date('Y-m-d');
                    $registro->hora_autorizacion = date('H:i:s');
                    if($registro->save())
                    {
                        $datos['usado']['estado'] = 1;
                        $datos['usado']['msj'] = 'actualizado a usado';
                    }
                    $datos['estado'] = 1;
                    $datos['msj'] = 'autorizado';
                }
                else
                {
                    $registro->estado = 3; // vencida
                    if($registro->save())
                    {
                        $datos['vencido']['estado'] = 1;
                        $datos['vencido']['msj'] = 'actualizado a vencida';
                    }
                    $datos['estado'] = 0;
                    $datos['msj'] = 'codigo vencido';
                    $datos['hora_solicitud'] = $hora_solicitud;
                    $datos['hora_vencimiento'] = $hora_vencimiento;
                    $datos['diferencia_minutos'] = $diferencia_minutos;
                    $datos['tiempo'] =(int)env('TIEMPO_MAXIMO_CODIGO_AUTORIZACION');
                }

            }
            else
            {
                $datos['estado'] = 2;
                $datos['msj'] = 'no autorizado';
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

