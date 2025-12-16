<?php

namespace App\Http\Controllers;

use App\Models\Asistente;
use App\Models\CierreDiario;
use App\Models\LogUsersDevices;
use App\Models\RendicionCaja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CierreDiarioController extends Controller
{
    public function cierreDiarioIntitucion(Request $request)
    {
        // id
        // rendiciones
        // id_asistente_jefe*
        // fecha_rendicion*
        // total_rendiciones
        // total_documentos
        // total_bono
        // total_efectivo
        // total_otros
        // id_asistente_receptor*
        // fecha_recepcion
        // id_log_users_devices
        // codigo_autorizacion
        // observacion
        // otro
        // estado
        $datos = array();

        $error = array();
        $valido = 1;

        if(empty($request->rendiciones))
        {
            $error['rendiciones'] = 'Campo requerido';
            $valido = 0;
        }
        if(empty($request->id_asistente_receptor))
        {
            $error['id_asistente_receptor'] = 'Campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $asistenteRendicion = Asistente::where('id_usuario', Auth::user()->id)->first();
            $fecha_rendicion = date('Y-m-d H:i:s');
            $asistenteReceptor = Asistente::where('id', $request->id_asistente_receptor)->first();
            $rendiciones = $request->rendiciones;

            $total_rendiciones = 0;
            $total_documentos = 0;
            $total_bonos = 0;
            $total_efectivo = 0;
            $total_otros = 0;
            $detalle_rendicion = RendicionCaja::whereIn('id',explode('|', $rendiciones))->get();
            if($detalle_rendicion)
            {
                $datos['update_rendicion'] = array();
                foreach ($detalle_rendicion as $key_rendicion => $value_rendicion)
                {
                    $rendicion = RendicionCaja::find($value_rendicion->id);
                    $rendicion->rendicion = 1;// rendicion de cierre

                    if($rendicion->save())
                    {
                        $datos['update_rendicion'][$value_rendicion->id]['estado'] = 1;
                        $datos['update_rendicion'][$value_rendicion->id]['maj'] = 'registro actualizado';
                    }
                    else
                    {
                        $datos['update_rendicion'][$value_rendicion->id]['estado'] = 0;
                        $datos['update_rendicion'][$value_rendicion->id]['maj'] = 'registro NO actualizado';
                    }

                    $total_rendiciones++;
                    $total_documentos += $value_rendicion->total_documentos;
                    $total_bonos += $value_rendicion->total_bono;
                    $total_efectivo += $value_rendicion->total_efectivo;
                    $total_otros += $value_rendicion->total_otros;

                }

                $cierreDiario = new CierreDiario();

                $cierreDiario->rendiciones = $rendiciones;
                $cierreDiario->id_asistente_jefe = $asistenteRendicion->id;//*
                $cierreDiario->fecha_rendicion = $fecha_rendicion;//*
                $cierreDiario->total_rendiciones = $total_rendiciones;
                $cierreDiario->total_documentos = $total_documentos;
                $cierreDiario->total_bono = $total_bonos;
                $cierreDiario->total_efectivo = $total_efectivo;
                $cierreDiario->total_otros = $total_otros;
                $cierreDiario->id_asistente_receptor = $asistenteReceptor->id;//*
                $cierreDiario->fecha_recepcion = NULL;
                $cierreDiario->id_log_users_devices = '';
                $cierreDiario->codigo_autorizacion = '';
                $cierreDiario->observacion = '';
                $cierreDiario->otro = '';
                $cierreDiario->estado = 0;

                if($cierreDiario->save())
                {
                    $datos['estado'] = 1;
                    $datos['msj'] = 'Registro de Cierre diario';
                    $datos['last_id'] = $cierreDiario->id;

                    $registro = CierreDiario::where('id', $cierreDiario->id)
                    ->with(['Asistente' => function($query){
                        $query->select('id','nombres','apellido_uno','apellido_dos');
                    }])
                    ->with(['AsistenteReceptor' => function($query){
                        $query->select('id','nombres','apellido_uno','apellido_dos');
                    }])
                    ->first();

                    $datos['registro'] = $registro;

                    /** SOLICITAR AUTORIZACION POR APP */
                    $msj = array(
                        'id' => $cierreDiario->id,
                        'nombre' => $asistenteRendicion->nombres.' '.$asistenteRendicion->apellido_uno.' '.$asistenteRendicion->apellido_dos,
                        'fecha' => $fecha_rendicion,
                        'tipo' => 'rendicion',
                        // 'mensaje' => 'Recibe conforme Rendición de Caja N°{id_rendicion} de la Asistente {nombre_asistente} de fecha {fecha_rendicion}'
                    );

                    /** calculo de periodo de vigencia para aprobacion */
                    $fecha_actual  = date('Y-m-d H:i:s');
                    $fecha_vencimiento  = date ( 'Y-m-d H:i:s' ,strtotime ( '+'.env('TIEMPO_ESPERA').' minute' , strtotime ($fecha_actual) ) );

                    $log_users_devices = new LogUsersDevices();
                    $log_users_devices->id_user_create = $asistenteRendicion->id_usuario;
                    $log_users_devices->id_user_recept = $asistenteReceptor->id_usuario;
                    $log_users_devices->msg = json_encode($msj);
                    $log_users_devices->estado = 0;
                    $log_users_devices->fecha_ingreso = $fecha_actual;
                    $log_users_devices->fecha_termino = $fecha_vencimiento;
                    $log_users_devices->tipo = 1; // rendicion

                    if($log_users_devices->save())
                    {
                        $datos['autorizacion']['estado'] = 1;
                        $datos['autorizacion']['msj'] = 'Solicitud de aprobacion enviada';
                        $datos['autorizacion']['fecha_inicio'] = $fecha_actual;
                        $datos['autorizacion']['fecha_termino'] = $fecha_vencimiento;
                        $datos['autorizacion']['tiempo'] = env('TIEMPO_ESPERA');
                        $datos['autorizacion']['last_id'] = $log_users_devices->id;

                        $cierreDiario->id_log_users_devices = $log_users_devices->id;
                        $cierreDiario->estado = 1;
                        if($cierreDiario->save())
                        {
                            $datos['update_log_users_devices']['estado'] = 1;
                            $datos['update_log_users_devices']['msj'] = 'Registro de id_log_users_devices';
                        }
                        else
                        {
                            $datos['update_log_users_devices']['estado'] = 1;
                            $datos['update_log_users_devices']['msj'] = 'Falla registro de id_log_users_devices';
                        }
                    }
                    else
                    {
                        $datos['autorizacion']['estado'] = 0;
                        $datos['autorizacion']['msj'] = 'Solicitud de aprobacion con falla';
                    }
                }
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Campos requeridos';
            $datos['error'] = $error;
        }
        return $datos;
    }

    public function cierreDiarioInstitucionValidarAutorizacion(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_cierre))
        {
            $error['id_cierre'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $CierreDiario = CierreDiario::find($request->id_cierre);
            if($CierreDiario)
            {
                $log_users_devices = LogUsersDevices::select('id', 'estado')->find($CierreDiario->id_log_users_devices);
                if($log_users_devices)
                {
                    $datos['estado'] = 1;
                    $datos['registro'] = $log_users_devices;

                    if($log_users_devices->estado == 0)//ESPERA
                    {
                        $CierreDiario->estado = 1;
                        if($CierreDiario->save())
                        {
                            $datos['update_cierre']['estado'] = 1;
                            $datos['update_cierre']['msj'] = 'Cierres de Cajas Actualizada en Espaera';
                        }
                        else
                        {
                            $datos['update_cierre']['estado'] = 0;
                            $datos['update_cierre']['msj'] = 'Falla Actualizando Cierres de Cajas en Espaera';
                        }
                    }
                    if($log_users_devices->estado == 1)//VALIDO
                    {
                        $CierreDiario->estado = 2;
                        if($CierreDiario->save())
                        {
                            $datos['update_cierre']['estado'] = 1;
                            $datos['update_cierre']['msj'] = 'Cierres de Cajas Actualizada en Espaera';
                        }
                        else
                        {
                            $datos['update_cierre']['estado'] = 0;
                            $datos['update_cierre']['msj'] = 'Falla Actualizando Cierres de Cajas en Espaera';
                        }
                    }
                    if($log_users_devices->estado == 2)//VENCIDO
                    {
                        $requestDesistir = new Request(array(
                            'id_cierre' => $CierreDiario->id,
                        ));
                        $result_desistida = static::cierreCajaDiariaInstitucionDesistir($requestDesistir);
                        $datos['result_vencida'] = $result_desistida;
                    }
                    if($log_users_devices->estado == 3)//RECHAZADO
                    {
                        $requestDesistir = new Request(array(
                            'id_cierre' => $CierreDiario->id,
                        ));
                        $result_desistida = static::cierreCajaDiariaInstitucionDesistir($requestDesistir);
                        $datos['result_rechazada'] = $result_desistida;
                    }

                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'Autorizacion no encontrada';
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Rendicion no encontrada';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['error'] = $error;
        }

        return $datos;
    }

    static public function cierreCajaDiariaInstitucionDesistir(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_cierre))
        {
            $error['id_cierre'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $registro = CierreDiario::find($request->id_cierre);
            $lista_rendiciones = $registro->rendiciones;
            $array_rendiciones = explode('|',$lista_rendiciones);

            /** liberar rendicion */
            foreach ( $array_rendiciones as $key_rendicion => $value_rendicion)
            {
                $rendicion = RendicionCaja::find($value_rendicion);
                $rendicion->rendicion = 0;// no rendidos

                if($rendicion->save())
                {
                    $datos['update_rendicion'][$rendicion->id]['estado'] = 1;
                    $datos['update_rendicion'][$rendicion->id]['maj'] = 'registro actualizado';
                }
                else
                {
                    $datos['update_rendicion'][$rendicion->id]['estado'] = 0;
                    $datos['update_rendicion'][$rendicion->id]['maj'] = 'registro NO actualizado';
                }
            }

            /** elimino(cambio estado) rendicion */
            $registro->estado = 4;// DESISTIDA
            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'Solicitud de cierre del dia desistido';

                $id_log_users_devices_actual = $registro->id_log_users_devices;

                $log_users_devices_registro = LogUsersDevices::find($id_log_users_devices_actual);
                $log_users_devices_registro->estado = 2;
                if($log_users_devices_registro->save())
                {
                    $datos['log_users_devices_update']['estado'] = 1;
                    $datos['log_users_devices_update']['msj'] = 'actualizado';
                }
                else
                {
                    $datos['log_users_devices_update']['estado'] = 0;
                    $datos['log_users_devices_update']['msj'] = 'problema al actualizado';
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Falla al desistir cierre del dia';
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

    public function cierreCajaDiariaInstitucionExtenderValidacion(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_cierre))
        {
            $error['id_cierre'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $cierreDiario = CierreDiario::find($request->id_cierre);
            $asistenteRendicion = Asistente::where('id', $cierreDiario->id_asistente_jefe)->first();
            $fecha_rendicion = date('Y-m-d H:i:s');
            $asistenteReceptor = Asistente::where('id', $cierreDiario->id_asistente_receptor)->first();

            /** id LogUsersDevices actual */
            $id_log_users_devices_actual = $cierreDiario->id_log_users_devices;

            $lista_rendiciones = $cierreDiario->rendiciones;
            $array_rendiciones = explode('|',$lista_rendiciones);

            /** SOLICITAR AUTORIZACION POR APP */
            $msj = array(
                'id_rendicion' => $cierreDiario->id,
                'nombre_asistente' => $asistenteRendicion->nombres.' '.$asistenteRendicion->apellido_uno.' '.$asistenteRendicion->apellido_dos,
                'fecha_rendicion' => $fecha_rendicion,
                'tipo' => 'rendicion',
                // 'mensaje' => 'Recibe conforme Rendición de Caja N°{id_rendicion} de la Asistente {nombre_asistente} de fecha {fecha_rendicion}'
            );

            /** calculo de periodo de vigencia para aprobacion */
            $fecha_actual  = date('Y-m-d H:i:s');
            $datos['TIEMPO_ESPERA'] = env('TIEMPO_ESPERA');
            $fecha_vencimiento  = date ( 'Y-m-d H:i:s' ,strtotime ( '+'.env('TIEMPO_ESPERA').' minute' , strtotime ($fecha_actual) ) );

            $log_users_devices = new LogUsersDevices();
            $log_users_devices->id_user_create = $asistenteRendicion->id_usuario;
            $log_users_devices->id_user_recept = $asistenteReceptor->id_usuario;
            $log_users_devices->msg = json_encode($msj);
            $log_users_devices->estado = 0;
            $log_users_devices->fecha_ingreso = $fecha_actual;
            $log_users_devices->fecha_termino = $fecha_vencimiento;
            $log_users_devices->tipo = 1; // rendicion

            if($log_users_devices->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'renovacion de autorizacion realizada';

                $datos['autorizacion']['estado'] = 1;
                $datos['autorizacion']['msj'] = 'Solicitud de aprobacion enviada';
                $datos['autorizacion']['fecha_inicio'] = $fecha_actual;
                $datos['autorizacion']['fecha_termino'] = $fecha_vencimiento;
                $datos['autorizacion']['tiempo'] = env('TIEMPO_ESPERA');
                $datos['autorizacion']['last_id'] = $log_users_devices->id;

                $cierreDiario->id_log_users_devices = $log_users_devices->id;
                $cierreDiario->estado = 1;
                if($cierreDiario->save())
                {
                    $datos['update_log_users_devices']['estado'] = 1;
                    $datos['update_log_users_devices']['msj'] = 'Registro de id_log_users_devices';

                    $log_users_devices_registro = LogUsersDevices::find($id_log_users_devices_actual);
                    $log_users_devices_registro->estado = 2;
                    if($log_users_devices_registro->save())
                    {
                        $datos['log_users_devices_update']['estado'] = 1;
                        $datos['log_users_devices_update']['msj'] = 'actualizado';
                    }
                    else
                    {
                        $datos['log_users_devices_update']['estado'] = 0;
                        $datos['log_users_devices_update']['msj'] = 'problema al actualizado';
                    }
                }
                else
                {
                    $datos['update_log_users_devices']['estado'] = 1;
                    $datos['update_log_users_devices']['msj'] = 'Falla registro de id_log_users_devices';
                }
            }
            else
            {
                $datos['autorizacion']['estado'] = 0;
                $datos['autorizacion']['msj'] = 'Falla al renovar autorizacion';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['error'] = $error;
        }

        return $datos;
    }
}
