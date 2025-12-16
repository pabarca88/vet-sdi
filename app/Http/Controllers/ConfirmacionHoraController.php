<?php

namespace App\Http\Controllers;

use App\Models\HoraMedica;
use App\Models\LogUsersDevices;
use App\Models\NotificacionConfirmacion;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class ConfirmacionHoraController extends Controller
{
    /**
     * envio de primera notificacion de solicitud de confirmación de hora al paciente
     *
     * @return array
     */
    public function EnviarPrimeraSolicitudConfirmarHora()
    {
        $datos = array();

        $datos['metodo'] = 'EnviarPrimeraSolicitudConfirmarHora';

        // $dia_actual_busqueda =  date ( 'Y-m-d H:i:s' ,strtotime ( '+1 day' , strtotime (date('Y-m-d')) ) );
        $dia_actual_busqueda =  date ( 'Y-m-d H:i:s' ,strtotime ( '+1 day' , strtotime (date('Y-m-d')) ) );

        $anio = date('Y', strtotime($dia_actual_busqueda));
        $mes = date('m', strtotime($dia_actual_busqueda));
        $dia = date('d', strtotime($dia_actual_busqueda));


        $datos['fecha_busqueda'] = $dia_actual_busqueda;

        $notificaciones_enviadas_array = NotificacionConfirmacion::where('tipo_notificacion', 1)
                                                                ->where('tipo_notificacion', 1)
                                                                ->pluck('id_evento')
                                                                ->toArray();

        $horasMedicas = HoraMedica::whereYear('fecha_consulta', $anio)
                                ->whereMonth('fecha_consulta', $mes)
                                ->whereDay('fecha_consulta', $dia)
                                ->whereNull('fecha_confirmacion')
                                ->IdNotIn($notificaciones_enviadas_array)
                                ->get();

        $datos['horas'] = $horasMedicas;

        foreach ($horasMedicas as $key_hora => $value_hora)
        {

            $medio_notificacion_array = array();
            $medio_notificacion_array[0] = array();

            $paciente = $value_hora->Paciente()->first();
            $profesional = $value_hora->Profesional()->first();
            $lugar_atencion = $value_hora->LugarAtencion()->first();

            /** REGISTRO DE NOTIFICACION */
            $tipo_notificacion = '1';
            $id_evento = $value_hora->id;
            $fecha_evento = $value_hora->fecha_consulta;
            $hora_evento = $value_hora->hora_inicio;
            $fecha_primera_notificacion = date('Y-m-d H:i:s');
            $cantidad_notificacion = '';
            $medio_notificacion = '';
            $fecha_notificacion = '';
            $medio_confirmacion = '';
            $fecha_confirmacion = '';
            $estado_confirmacion = '';
            $otros = '';
            $otros_1 = '';
            $notificaiconResult = NotificacionConfirmacionController::registrar($tipo_notificacion,$id_evento,$fecha_evento,$hora_evento,$fecha_primera_notificacion,$cantidad_notificacion,$medio_notificacion,$fecha_notificacion,$medio_confirmacion,$fecha_confirmacion,$estado_confirmacion,$otros,$otros_1);
            $datos['registros'][$value_hora->id]['notificaiconResult'] = $notificaiconResult;

            if($notificaiconResult['estado'])
            {
                $id_notificacion_confimacion = $notificaiconResult['last_id'];

                /** envio correo */
                /** envio de correo de confirmacion INSTITUCION */
                $blade = 'confirmar_hora';
                $to = array(
                        array('email' => $paciente->email,'name' =>  $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos),
                    );
                $cc = array();
                $bcc = array();
                $asunto = 'MED-SDI - Confirmacion de Hora Medica';
                $body = array(
                    'nombre_paciente'=> mb_strtoupper($paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos),
                    'fecha'=> $value_hora->fecha_consulta,
                    'hora'=> $value_hora->hora_inicio,
                    'profesional_nombre'=> mb_strtoupper($profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos),
                    'profesional_especialidad'=> mb_strtoupper($profesional->Especialidad()->first()->nombre),
                    'profesional_tipo_especialidad'=> mb_strtoupper($profesional->TipoEspecialidad()->first()->nombre),
                    'profesional_sub_tipo_especialidad'=> mb_strtoupper($profesional->SubTipoEspecialidad()->first()->nombre),
                    // 'institucion'=> $nombre_institucion,
                    'lugar_atencion'=> mb_strtoupper($lugar_atencion->nombre),
                    'direccion'=> mb_strtoupper($lugar_atencion->Direccion()->first()->direccion.' '.$lugar_atencion->Direccion()->first()->numero_dir.', '.$lugar_atencion->Direccion()->first()->Ciudad()->first()->nombre),
                    'url_aprobacion' => route('solicitud.comfirmacion.hora.confirmacion').'?t='.encrypt($id_notificacion_confimacion),
                    'url_rechazo' => route('solicitud.comfirmacion.hora.cancelacion').'?t='.encrypt($id_notificacion_confimacion),
                );
                $archivo = '';/** pendiente */
                $id_institucion = '';

                $result_mail =  SendMailController::envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, $id_institucion);

                if($result_mail['estado'])
                {
                    $datos['registros'][$value_hora->id]['mail']['estado'] = 1;
                    $datos['registros'][$value_hora->id]['mail']['msj'] = 'Notificacion de bienvenida enviado';
                    array_push($medio_notificacion_array[0], array('tipo'=>'email','estado'=>1,'fecha'=>date('Y-m-d H:m:s')));
                }
                else
                {
                    $datos['registros'][$value_hora->id]['mail']['estado'] = 0;
                    $datos['registros'][$value_hora->id]['mail']['msj'] = 'Falle en envio de Notificacion de bienvenida';
                    array_push($medio_notificacion_array[0], array('tipo'=>'email','estado'=>0,'fecha'=>date('Y-m-d H:m:s')));
                }

                if(isset($paciente->id_usuario))
                {
                    /** notificacion app */
                    /** SOLICITAR AUTORIZACION POR APP */
                    //Ud tiene una Hora {evento} por Confirmar, para el dia {fecha} a las {hora}
                    $msj = array(
                        'id' => $value_hora->id,
                        'nombre' => mb_strtoupper($paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos),
                        'evento' => 'HORA MEDICA',
                        'fecha' => $value_hora->fecha_consulta,
                        'hora' => $value_hora->hora_inicio,
                        'lugar_atencion' => $lugar_atencion->nombre,
                        'profesional' => $profesional->apellido_uno,
                        'tipo' => 'confirmacion',
                    );

                    /** calculo de periodo de vigencia para aprobacion */
                    $fecha_actual  = date('Y-m-d H:i:s', strtotime($value_hora->fecha_consulta.' '.$value_hora->hora_inicio));
                    $fecha_vencimiento  = date ( 'Y-m-d H:i:s' ,strtotime ( '-'.env('TIEMPO_ESPERA_CONFIRMACION').' hours' , strtotime ($fecha_actual) ) );

                    $log_users_devices = new LogUsersDevices();
                    $log_users_devices->id_user_create = 2; // asistente virtual
                    $log_users_devices->id_user_recept = $paciente->id_usuario;
                    $log_users_devices->msg = json_encode($msj);
                    $log_users_devices->estado = 0;
                    $log_users_devices->fecha_ingreso = $fecha_actual;
                    $log_users_devices->fecha_termino = $fecha_vencimiento;
                    $log_users_devices->tipo = 3; // confirmacion hora

                    if($log_users_devices->save())
                    {
                        $datos['registros'][$value_hora->id]['app']['estado'] = 1;
                        $datos['registros'][$value_hora->id]['app']['msj'] = 'Solicitud de confirmacion enviada';
                        $datos['registros'][$value_hora->id]['app']['fecha_inicio'] = $fecha_actual;
                        $datos['registros'][$value_hora->id]['app']['fecha_termino'] = $fecha_vencimiento;
                        $datos['registros'][$value_hora->id]['app']['tiempo'] = env('TIEMPO_ESPERA');
                        $datos['registros'][$value_hora->id]['app']['last_id'] = $log_users_devices->id;

                        $notificacion_confirmacion_edit = NotificacionConfirmacion::find($id_notificacion_confimacion);
                        $notificacion_confirmacion_edit->id_log_users_devices = $log_users_devices->id;

                        if($notificacion_confirmacion_edit->save())
                        {
                            $datos['registros'][$value_hora->id]['update_notificacion_confirmacion']['estado'] = 1;
                            $datos['registros'][$value_hora->id]['update_notificacion_confirmacion']['msj'] = 'Registro de id_log_users_devices en notificacion_confirmacion';
                            array_push($medio_notificacion_array[0], array('tipo'=>'app','estado'=>1,'fecha'=>date('Y-m-d H:m:s')));
                        }
                        else
                        {
                            $datos['registros'][$value_hora->id]['update_notificacion_confirmacion_edit']['estado'] = 1;
                            $datos['registros'][$value_hora->id]['update_notificacion_confirmacion_edit']['msj'] = 'Falla registro de id_log_users_devices en notificacion_confirmacion_edit';
                            array_push($medio_notificacion_array[0], array('tipo'=>'app','estado'=>1,'fecha'=>date('Y-m-d H:m:s')));
                        }
                    }
                    else
                    {
                        $datos['registros'][$value_hora->id]['app']['estado'] = 0;
                        $datos['registros'][$value_hora->id]['app']['msj'] = 'Solicitud de aprobacion con falla';
                    }
                }
                else
                {
                    $datos['registros'][$value_hora->id]['app']['estado'] = 0;
                    $datos['registros'][$value_hora->id]['app']['msj'] = 'Paciente no posee usuario';
                }

                $datos['estado'] = 1;
                $datos['msj'] = 'notificacion registrada';

                $notificacion_confirmacion_edit = NotificacionConfirmacion::find($id_notificacion_confimacion);
                $notificacion_confirmacion_edit->cantidad_notificacion = 1;
                $notificacion_confirmacion_edit->medio_notificacion = json_encode($medio_notificacion_array);
                $notificacion_confirmacion_edit->fecha_notificacion = date('Y-m-d H:m:s');

                if($notificacion_confirmacion_edit->save())
                {
                    $datos['registros'][$value_hora->id]['update_notificacion_confirmacion_2']['estado'] = 1;
                    $datos['registros'][$value_hora->id]['update_notificacion_confirmacion_2']['msj'] = 'Actualizacion de datos de notificaciones';
                }
                else
                {
                    $datos['registros'][$value_hora->id]['update_notificacion_confirmacion_2']['estado'] = 1;
                    $datos['registros'][$value_hora->id]['update_notificacion_confirmacion_2']['msj'] = 'Falla en la Actualizacion de datos de notificaciones';
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'error al registrar notificacion';
            }
        }
        Log::channel('notificacion_confirmacion_hora')->info(json_encode($datos));
        return $datos;
    }

    /**
     * envio de segunda notificacion
     *
     * @return void
     */
    public function EnviarSegundaSolicitudConfirmarHora()
    {
        $datos = array();
        $filtros = array();
        $filtros[] = array('cantidad_notificacion', 1);

        $datos['metodo'] = 'EnviarSegundaSolicitudConfirmarHora';

        $notificacion_confirmacion = NotificacionConfirmacion::where($filtros)
                                                            // ->whereNotIn('estado_confirmacion',['1','2'])
                                                            ->whereNull('estado_confirmacion')
                                                            ->get();

        $datos['notificacion_confirmacion'] = $notificacion_confirmacion;

        foreach ($notificacion_confirmacion as $key_NC => $value_NC)
        {

            $evento = null;
            /** reserva de hora medica */
            if($value_NC->tipo_notificacion == 1)
                $evento = HoraMedica::find($value_NC->id_evento);

            if($evento)
            {

                $paciente = $evento->Paciente()->first();
                $profesional = $evento->Profesional()->first();
                $lugar_atencion = $evento->LugarAtencion()->first();

                $medio_comunicado_array = json_decode($value_NC->medio_notificacion);
                $medio_comunicado_array[1] = array();

                $fecha_evento = $value_NC->fecha_evento;
                $hora_evento = $value_NC->hora_evento;

                $date_actual = date('Y-m-d H:i:s');
                $date_time_evento = date('Y-m-d H:i:s', strtotime($fecha_evento.' '.$hora_evento));

                $dateTimeObject1 = date_create($date_actual);
                $dateTimeObject2 = date_create($date_time_evento);

                $difference = date_diff($dateTimeObject1, $dateTimeObject2);
                $minutes = $difference->days * 24 * 60;
                $minutes += $difference->h * 60;
                $minutes += $difference->i;
                // echo $minutes.' minutes';

                $minutos_validacion = env('TIEMPO_ENVIO_SEGUNDA_NOTIFICACION') * 60;

                if($minutes <= $minutos_validacion)
                {
                    /** envio correo */
                    /** envio de correo de confirmacion INSTITUCION */
                    $blade = 'confirmar_hora';
                    $to = array(
                            array('email' => $paciente->email,'name' =>  $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos),
                        );
                    $cc = array();
                    $bcc = array();
                    $asunto = 'MED-SDI - Confirmacion de Hora Medica';
                    $body = array(
                        'nombre_paciente'=> mb_strtoupper($paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos),
                        'fecha'=> $value_NC->fecha_evento,
                        'hora'=> $value_NC->hora_evento,
                        'profesional_nombre'=> mb_strtoupper($profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos),
                        'profesional_especialidad'=> mb_strtoupper($profesional->Especialidad()->first()->nombre),
                        'profesional_tipo_especialidad'=> mb_strtoupper($profesional->TipoEspecialidad()->first()->nombre),
                        'profesional_sub_tipo_especialidad'=> mb_strtoupper($profesional->SubTipoEspecialidad()->first()->nombre),
                        // 'institucion'=> $nombre_institucion,
                        'lugar_atencion'=> mb_strtoupper($lugar_atencion->nombre),
                        'direccion'=> mb_strtoupper($lugar_atencion->Direccion()->first()->direccion.' '.$lugar_atencion->Direccion()->first()->numero_dir.', '.$lugar_atencion->Direccion()->first()->Ciudad()->first()->nombre),
                        'url_aprobacion' => route('solicitud.comfirmacion.hora.confirmacion').'?t='.encrypt($value_NC->id),
                        'url_rechazo' => route('solicitud.comfirmacion.hora.cancelacion').'?t='.encrypt($value_NC->id),
                    );
                    $archivo = '';/** pendiente */
                    $id_institucion = '';

                    $result_mail =  SendMailController::envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, $id_institucion);

                    if($result_mail['estado'])
                    {
                        $datos['registros'][$value_NC->id]['mail']['estado'] = 1;
                        $datos['registros'][$value_NC->id]['mail']['msj'] = 'Notificacion de confirmacion enviado';
                        array_push($medio_comunicado_array[1], array('tipo'=>'email','estado'=>1,'fecha'=>date('Y-m-d H:m:s')));
                    }
                    else
                    {
                        $datos['registros'][$value_NC->id]['mail']['estado'] = 0;
                        $datos['registros'][$value_NC->id]['mail']['msj'] = 'Falle en envio de Notificacion de confirmacion';
                        array_push($medio_comunicado_array[1], array('tipo'=>'email','estado'=>0,'fecha'=>date('Y-m-d H:m:s')));
                    }

                    $notificacion_actual = NotificacionConfirmacion::find($value_NC->id);
                    $notificacion_actual->cantidad_notificacion = 2;
                    $notificacion_actual->medio_notificacion = json_encode($medio_comunicado_array);
                    $notificacion_actual->fecha_notificacion = date('Y-m-d H:i:s');

                    if($notificacion_actual->save())
                    {
                        $datos['registros'][$value_NC->id]['estado'] = 1;
                        $datos['registros'][$value_NC->id]['msj'] = 'notificacion actualizada';
                    }
                    else
                    {
                        $datos['registros'][$value_NC->id]['estado'] = 0;
                        $datos['registros'][$value_NC->id]['msj'] = 'falla en notificacion actualizada';
                    }
                }
                else
                {
                    $datos['registros'][$value_NC->id]['estado'] = 3;
                    $datos['registros'][$value_NC->id]['msj'] = 'no requiere notificacion todavia, quedan '.($minutes-360).'  minutos para el envio';
                }

            }
            else
            {
                $datos['registro'][$value_NC->id]['estado'] = 0;
                $datos['registro'][$value_NC->id]['msj'] = 'no se encontro evento';
            }
        }

        $datos['estado'] = 1;
        $datos['msj'] = 'notificacion enviada';
        $datos['minutos_validacion'] = $minutos_validacion;

        Log::channel('notificacion_confirmacion_hora')->info(json_encode($datos));

        return $datos;
    }


    public function Confirmacion(Request $request)
    {
        $datos = array();
        $mensaje = '';
        $valido = 1;

        $datos['metodo'] = 'Confirmacion';

        if(empty($request->t))
        {
            $valido = 0;
            $mensaje = 'Se ha presentado un problema cargando informacion de Reserva.<br>Intente de nuevo.';
        }

        if($valido)
        {
            $id_notificacion = decrypt($request->t);
            $notificacion = NotificacionConfirmacion::find($id_notificacion);
            $datos['notificacion'] = $notificacion;

            if(empty($notificacion->estado_confirmacion))
            {
                $evento = null;
                if($notificacion->tipo_notificacion == 1)
                    $evento = HoraMedica::find($notificacion->id_evento);


                if($evento)
                {
                    $datos['evento'] = $evento;

                    /** cambiar estado de hora */
                    $evento->id_estado = 2;
                    if($evento->save())
                    {
                        /** estado evento actualizado */
                        // echo 'estado evento actualizado';
                        $datos['evento']['update'] = 'Evento Actualzado';
                    }
                    else
                    {
                        $datos['evento']['update'] = 'falla al actualizar Evento';
                    }

                    /** cambiar estado notificacion */
                    $notificacion->medio_confirmacion = $request->medio_confirmacion;
                    $notificacion->fecha_confirmacion = date('Y-m-d H:m:s');
                    $notificacion->estado_confirmacion = 2; //CONFIRMADA
                    if($notificacion->save())
                    {
                        /** notificacion actualizada */
                        // echo 'notificacion actualizada';
                        $datos['notificacion']['update'] = 'notificacion Actualzada';
                    }
                    else
                    {
                        $datos['notificacion']['update'] = 'falla al actualizar notificacion';
                    }

                    /** cambiar estado de log */
                    $id_log_users_devices = $notificacion->id_log_users_devices;
                    if(!empty($id_log_users_devices))
                    {
                        $log_users_devices = LogUsersDevices::find($id_log_users_devices);
                        $log_users_devices->estado = 1;
                        if($log_users_devices->save())
                        {
                            /** log_users_devices */
                            // echo 'log users devices actualizado';
                            $datos['log_users_devices']['update'] = 'log_users_devices Actualzada';
                        }
                        else
                        {
                            $datos['log_users_devices']['update'] = 'falla al actualizar log_users_devices';
                        }
                    }
                    else
                    {
                        $datos['log_users_devices']['update'] = 'no posee log_users_devices';
                    }

                    /** enviar correo de confirmada */
                    $paciente = $evento->Paciente()->first();
                    $profesional = $evento->Profesional()->first();
                    $lugar_atencion = $evento->LugarAtencion()->first();

                    $blade = 'hora_confirmada_paciente';
                    $to = array(
                            array('email' => $paciente->email,'name' =>  $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos),
                        );
                    $cc = array();
                    $bcc = array();
                    $asunto = 'MED-SDI - Reserva de Hora Confirmada';
                    $body = array(
                        'nombre_paciente'=> mb_strtoupper($paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos),
                        'fecha'=> $notificacion->fecha_evento,
                        'hora'=> $notificacion->hora_evento,
                        'profesional_nombre'=> mb_strtoupper($profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos),
                        'profesional_especialidad'=> mb_strtoupper($profesional->Especialidad()->first()->nombre),
                        'profesional_tipo_especialidad'=> mb_strtoupper($profesional->TipoEspecialidad()->first()->nombre),
                        'profesional_sub_tipo_especialidad'=> mb_strtoupper($profesional->SubTipoEspecialidad()->first()->nombre),
                        // 'institucion'=> $nombre_institucion,
                        'lugar_atencion'=> mb_strtoupper($lugar_atencion->nombre),
                        'direccion'=> mb_strtoupper($lugar_atencion->Direccion()->first()->direccion.' '.$lugar_atencion->Direccion()->first()->numero_dir.', '.$lugar_atencion->Direccion()->first()->Ciudad()->first()->nombre),

                    );
                    $archivo = '';/** pendiente */
                    $id_institucion = '';

                    $result_mail =  SendMailController::envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, $id_institucion);

                    if($result_mail['estado'])
                    {
                        $datos['mail'] = 'Notificacion de confirmacion exitosa enviado';
                    }
                    else
                    {
                        $datos['mail'] = 'Falle en envio de Notificacion de confirmacion exitosa';
                    }

                    $mensaje = 'Reserva Confirmada con Exito.';
                }
                else
                {
                    $mensaje = 'Se ha presentado un problema cargando el información de reserva.<br>Intente de nuevo.';
                }
            }
            else
            {
                $evento = null;
                if($notificacion->tipo_notificacion == 1)
                    $evento = HoraMedica::find($notificacion->id_evento);

                $paciente = $evento->Paciente()->first();

                if($notificacion->estado_confirmacion == 2)// confirmada
                    $mensaje = 'Su reserva ya se encuentra Confirmada, no es necesario confirmar de nuevo.';
                else if($notificacion->estado_confirmacion == 3) // cancelada
                    $mensaje = 'Su reserva se encuentra Cancelada y no la puede confirmar.';
            }


            Log::channel('notificacion_confirmacion_hora')->info(json_encode($datos));

            return view('app.confirmacion.confirmacion')->with([
                'mensaje' => $mensaje,
                'evento'=> $evento,
                'paciente' => mb_strtoupper($paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos)
            ]);
        }
        else
        {
            Log::channel('notificacion_confirmacion_hora')->info(json_encode($datos));

            return view('app.confirmacion.confirmacion')->with([
                'mensaje' => $mensaje,
            ]);
        }
    }


    public function Cancelacion(Request $request)
    {
        $datos = array();
        $mensaje = '';
        $valido = 1;

        $datos['metodo'] = 'Cancelacion';

        if(empty($request->t))
        {
            $valido = 0;
            $mensaje = 'Se ha presentado un problema cargando informacion de la reserva.<br>Intente de nuevo.';
        }

        if($valido)
        {
            $id_notificacion = decrypt($request->t);
            $notificacion = NotificacionConfirmacion::find($id_notificacion);
            $datos['notificacion'] = $notificacion;


            if(empty($notificacion->estado_confirmacion))
            {
                $evento = null;
                if($notificacion->tipo_notificacion == 1)
                    $evento = HoraMedica::find($notificacion->id_evento);


                if($evento)
                {
                    $datos['evento'] = $evento;

                    /** cambiar estado de hora */
                    $evento->id_estado = 3; // rechazada
                    if($evento->save())
                    {
                        /** estado evento actualizado */
                        // echo 'estado evento actualizado';
                        $datos['evento']['update'] = 'Evento Actualzado';
                    }
                    else
                    {
                        $datos['evento']['update'] = 'falla al actualizar Evento';
                    }

                    /** cambiar estado notificacion */
                    $notificacion->medio_confirmacion = $request->medio_confirmacion;
                    $notificacion->fecha_confirmacion = date('Y-m-d H:m:s');
                    $notificacion->estado_confirmacion = 3; // RECHAZADA
                    if($notificacion->save())
                    {
                        /** notificacion actualizada */
                        // echo 'notificacion actualizada';
                        $datos['notificacion']['update'] = 'notificacion Actualzada';
                    }
                    else
                    {
                        $datos['notificacion']['update'] = 'falla al actualizar notificacion';
                    }

                    /** cambiar estado de log */
                    $id_log_users_devices = $notificacion->id_log_users_devices;
                    if(!empty($id_log_users_devices))
                    {
                        $log_users_devices = LogUsersDevices::find($id_log_users_devices);
                        $log_users_devices->estado = 3; //RECHAZADA
                        if($log_users_devices->save())
                        {
                            /** log_users_devices */
                            // echo 'log users devices actualizado';
                            $datos['log_users_devices']['update'] = 'log_users_devices Actualzada';
                        }
                        else
                        {
                            $datos['log_users_devices']['update'] = 'falla al actualizar log_users_devices';
                        }
                    }
                    else
                    {
                        $datos['log_users_devices']['update'] = 'no posee log_users_devices';
                    }

                    /** enviar correo de confirmada */
                    $paciente = $evento->Paciente()->first();
                    $profesional = $evento->Profesional()->first();
                    $lugar_atencion = $evento->LugarAtencion()->first();

                    $blade = 'hora_cancelada_paciente';
                    $to = array(
                            array('email' => $paciente->email,'name' =>  $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos),
                        );
                    $cc = array();
                    $bcc = array();
                    $asunto = 'MED-SDI - Reserva de Hora Cancelada';
                    $body = array(
                        'nombre_paciente'=> mb_strtoupper($paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos),
                        'fecha'=> $notificacion->fecha_evento,
                        'hora'=> $notificacion->hora_evento,
                        'profesional_nombre'=> mb_strtoupper($profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos),
                        'profesional_especialidad'=> mb_strtoupper($profesional->Especialidad()->first()->nombre),
                        'profesional_tipo_especialidad'=> mb_strtoupper($profesional->TipoEspecialidad()->first()->nombre),
                        'profesional_sub_tipo_especialidad'=> mb_strtoupper($profesional->SubTipoEspecialidad()->first()->nombre),
                        // 'institucion'=> $nombre_institucion,
                        'lugar_atencion'=> mb_strtoupper($lugar_atencion->nombre),
                        'direccion'=> mb_strtoupper($lugar_atencion->Direccion()->first()->direccion.' '.$lugar_atencion->Direccion()->first()->numero_dir.', '.$lugar_atencion->Direccion()->first()->Ciudad()->first()->nombre),

                    );
                    $archivo = '';/** pendiente */
                    $id_institucion = '';

                    $result_mail =  SendMailController::envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, $id_institucion);

                    if($result_mail['estado'])
                    {
                        $datos['mail'] = 'Notificacion de cancelacion enviado';
                    }
                    else
                    {
                        $datos['mail'] = 'Falle en envio de Notificacion de cancelada';
                    }

                    $mensaje = 'Reserva Cancelada con Exito.';
                }
                else
                {
                    $mensaje = 'Se ha presentado un problema cargando informacion de la reserva.<br>Intente de nuevo.';
                }
            }
            else
            {
                $evento = null;
                if($notificacion->tipo_notificacion == 1)
                    $evento = HoraMedica::find($notificacion->id_evento);

                $paciente = $evento->Paciente()->first();

                if($notificacion->estado_confirmacion == 2)// confirmada
                    $mensaje = 'Su reserva ya se encuentra Confirmada, para Cancelar debe contactarse vía Telefonica.';
                else if($notificacion->estado_confirmacion == 3) // cancelada
                    $mensaje = 'Su reserva se encuentra Cancelada y no la puede confirmar.';
            }


            Log::channel('notificacion_confirmacion_hora')->info(json_encode($datos));


            return view('app.confirmacion.confirmacion')->with([
                'mensaje' => $mensaje,
                'evento'=> $evento,
                'paciente' => mb_strtoupper($paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos)
            ]);
        }
        else
        {
            Log::channel('notificacion_confirmacion_hora')->info(json_encode($datos));

            return view('app.confirmacion.confirmacion')->with([
                'mensaje' => $mensaje,
            ]);
        }
    }

    public function ValidarLogUsersDevicesConfirmacion()
    {
        $datos = array();

        $notificacion = NotificacionConfirmacion::whereNull('fecha_confirmacion')
                                                ->whereNull('id_log_users_devices')
                                                ->get();

        if($notificacion)
        {
            $log_users_devices = LogUsersDevices::find($notificacion->id_log_users_devices);
            $estado_log = $log_users_devices->estado;

            switch ($estado_log) {
                case '0'://. ESPERA
                    # code...
                    break;
                case '1'://. VALIDO
                    # code...
                    break;
                case '2'://. VENCIDO
                    # code...
                    break;
                case '3'://. RECHAZADO
                    # code...
                    break;

                default:
                    # code...
                    break;
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Sin registros a procesar';
        }

        return $datos;
    }
}
