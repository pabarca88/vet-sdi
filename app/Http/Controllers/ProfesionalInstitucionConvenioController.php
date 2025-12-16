<?php

namespace App\Http\Controllers;

use App\Models\Invitacion;
use App\Models\ProfesionalInstitucionConvenio;
use Illuminate\Http\Request;

class ProfesionalInstitucionConvenioController extends Controller
{
    /** API */
    public function registrar_r(Request $request)
    {
        return static::registrar($request->id_invitacion, $request->id_profesional, $request->id_institucion, $request->id_lugar_atencion, $request->id_tipo_convenio_institucion, $request->fijo, $request->atencion, $request->confirmacion_agenda, $request->ggcc, $request->box, $request->fecha_confirmacion, $request->fecha_rechazo, $request->observacion);
    }

    static public function registrar($id_invitacion, $id_profesional, $id_institucion, $id_lugar_atencion, $id_tipo_convenio_institucion, $fijo, $atencion, $confirmacion_agenda, $ggcc, $box, $fecha_confirmacion, $fecha_rechazo, $observacion)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        // if(empty($id_profesional))
        // {
        //     $error['id_profesional'] = 'campo requerido';
        //     $valido = 0;
        // }
        if(empty($id_institucion))
        {
            $error['id_institucion'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($id_lugar_atencion))
        {
            $error['id_lugar_atencion'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($id_tipo_convenio_institucion))
        {
            $error['id_tipo_convenio_institucion'] = 'campo requerido';
            $valido = 0;
        }
        else
        {
            /** fijo */
            if($id_tipo_convenio_institucion == 1)
            {
                if(empty($fijo))
                {
                    $error['fijo'] = 'campo requerido';
                    $valido = 0;
                }
            }
            /** variable */
            else if($id_tipo_convenio_institucion == 2)
            {
                if(empty($atencion))
                {
                    $error['atencion'] = 'campo requerido';
                    $valido = 0;
                }
                if(empty($confirmacion_agenda))
                {
                    $error['confirmacion_agenda'] = 'campo requerido';
                    $valido = 0;
                }
                if(empty($ggcc))
                {
                    $error['ggcc'] = 'campo requerido';
                    $valido = 0;
                }
                if(empty($box))
                {
                    $error['box'] = 'campo requerido';
                    $valido = 0;
                }
            }
        }

        // if(empty($observacion))
        // {
        //     $error['observacion'] = 'campo requerido';
        //     $valido = 0;
        // }

        if($valido)
        {
            $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
            $token_temp = substr(str_shuffle($permitted_chars), 0, 50);

            $registro = new ProfesionalInstitucionConvenio();
            $registro->token = $token_temp;
            $registro->id_invitacion = $id_invitacion;

            if(!empty($id_profesional))
                $registro->id_profesional = $id_profesional;

            $registro->id_institucion = $id_institucion;
            $registro->id_lugar_atencion = $id_lugar_atencion;
            $registro->id_tipo_convenio_institucion = $id_tipo_convenio_institucion;
            if($id_tipo_convenio_institucion == 1)
            {
                $registro->fijo = $fijo;
            }
            else if($id_tipo_convenio_institucion == 2)
            {
                $registro->atencion = $atencion;
                $registro->confirmacion_agenda = $confirmacion_agenda;
                $registro->ggcc = $ggcc;
                $registro->box = $box;
            }
            // $registro->fecha_confirmacion = $fecha_confirmacion;
            // $registro->fecha_rechazo = $fecha_rechazo;
            $registro->estado = 1;
            $registro->observacion = $observacion;

            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registro exitoso';
                $datos['last_id'] = $registro->id;
                $datos['request'] = array(
                    'id_profesional' => $id_profesional,
                    'id_institucion' => $id_institucion,
                    'id_lugar_atencion' => $id_lugar_atencion,
                    'id_tipo_convenio_institucion' => $id_tipo_convenio_institucion,
                    'fijo' => $fijo,
                    'atencion' => $atencion,
                    'confirmacion_agenda' => $confirmacion_agenda,
                    'ggcc' => $ggcc,
                    'box' => $box,
                    'observacion' => $observacion,
                );
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Falla en el registro';
                $datos['request'] = array(
                    'id_profesional' => $id_profesional,
                    'id_institucion' => $id_institucion,
                    'id_lugar_atencion' => $id_lugar_atencion,
                    'id_tipo_convenio_institucion' => $id_tipo_convenio_institucion,
                    'fijo' => $fijo,
                    'atencion' => $atencion,
                    'confirmacion_agenda' => $confirmacion_agenda,
                    'ggcc' => $ggcc,
                    'box' => $box,
                    'observacion' => $observacion,
                );
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


    public function modificar_r(Request $request)
    {
        return static::modificar($request->id, $request->id_invitacion, $request->id_profesional, $request->id_institucion, $request->id_lugar_atencion, $request->id_tipo_convenio_institucion, $request->fijo, $request->atencion, $request->confirmacion_agenda, $request->ggcc, $request->box, $request->fecha_confirmacion, $request->fecha_rechazo, $request->estado, $request->observacion);
    }

    static public function modificar($id, $id_invitacion, $id_profesional, $id_institucion, $id_lugar_atencion, $id_tipo_convenio_institucion, $fijo, $atencion, $confirmacion_agenda, $ggcc, $box, $fecha_confirmacion, $fecha_rechazo, $estado, $observacion)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($id))
        {
            $error['id'] = 'campo requerido';
        }

        if($valido)
        {
            $registro = ProfesionalInstitucionConvenio::find($id);
            if($registro)
            {
                if(!empty($id_invitacion))
                    $registro->id_invitacion = $id_invitacion;
                if(!empty($id_profesional))
                    $registro->id_profesional = $id_profesional;
                if(!empty($id_institucion))
                    $registro->id_institucion = $id_institucion;
                if(!empty($id_lugar_atencion))
                    $registro->id_lugar_atencion = $id_lugar_atencion;
                if(!empty($id_tipo_convenio_institucion))
                    $registro->id_tipo_convenio_institucion = $id_tipo_convenio_institucion;
                if(!empty($fijo))
                    $registro->fijo = $fijo;
                if(!empty($atencion))
                    $registro->atencion = $atencion;
                if(!empty($confirmacion_agenda))
                    $registro->confirmacion_agenda = $confirmacion_agenda;
                if(!empty($ggcc))
                    $registro->ggcc = $ggcc;
                if(!empty($box))
                    $registro->box = $box;
                if(!empty($fecha_confirmacion))
                    $registro->fecha_confirmacion = $fecha_confirmacion;
                if(!empty($fecha_rechazo))
                    $registro->fecha_rechazo = $fecha_rechazo;
                if(!empty($estado))
                    $registro->estado = $estado;
                if(!empty($observacion))
                    $registro->observacion = $observacion;

                if($registro->save())
                {
                    $datos['estado'] = 1;
                    $datos['msj'] = 'exito';
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'error al modificar';
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'registro no encontrado';
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

    static public function envioNotificacionConvenio($tipo,$id_invitacion)
    {
        $datos = array();

        $invitacion = Invitacion::with('LugarAtencion')->where('id', $id_invitacion)->first();
        $convenio_result = ProfesionalInstitucionConvenio::with('Institucion')
                                                        ->with('LugarAtencion')
                                                        ->with('TipoConvenioInstitucion')
                                                        ->where('id_invitacion', $id_invitacion)->first();

        switch ($tipo) {
            case '1':/** correo  */
                    $retornoNotificacion = 1;//llamdo al envio de correos
                    if($retornoNotificacion == 1)
                    {

                        /** envio de correo de confirmacion  */
                        $blade = 'invitacion_profesional_convenio';
                        $to = array(
                                array('email' => $invitacion->email,'name' => $invitacion->nombre.' '.$invitacion->apellido_uno.' '.$invitacion->apellido_dos),
                            );
                        $cc = array();
                        $bcc = array();
                        $asunto = 'MED-SDI - Invitacion Convenio';
                        $body = array(
                            'nombre'=>$invitacion->nombre.' '.$invitacion->apellido_uno.' '.$invitacion->apellido_dos,
                            'lugar_atencion' => $invitacion->LugarAtencion->nombre,
                            'id_invitacion' => $invitacion->id,
                            'invitacion_token' => $invitacion->token,
                            'tipo_invitacion' => $invitacion->tipo_invitacion,
                            'convenio' => $convenio_result,
                        );
                        $archivo = '';/** pendiente */
                        $id_institucion = '';

                        $result_mail =  SendMailController::envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, $id_institucion);

                        if($result_mail['estado'])
                        {
                            $datos['mail']['estado'] = 1;
                            $datos['mail']['msj'] = 'Notificacion de bienvenida enviado';

                            $invitacion->informado = $invitacion->informado+1;
                            $invitacion->fecha_informado = date('Y-m-d H:i:s');
                            if($invitacion->save())
                            {
                                $datos['estado'] = 1;
                                $datos['msj'] = 'notificación enviada';
                            }
                            else
                            {
                                $datos['estado'] = 0;
                                $datos['msj'] = 'notificación NO enviada';
                            }
                        }
                        else
                        {
                            $datos['mail']['estado'] = 0;
                            $datos['mail']['msj'] = 'Falle en envio de Notificacion de bienvenida';
                        }
                    }
                break;
            case '2': /** mensaje */
                    $retornoNotificacion = 1;//llamso a envio de mensajes
                    if($retornoNotificacion == 1)
                    {
                        $invitacion->informado = $invitacion->informado+1;
                        $invitacion->fecha_informado = date('Y-m-d H:i:s');
                        if($invitacion->save())
                        {
                            $datos['estado'] = 1;
                            $datos['msj'] = 'notificación enviada';
                        }
                        else
                        {
                            $datos['estado'] = 0;
                            $datos['msj'] = 'notificación NO enviada';
                        }
                    }
                break;
        }

        return (object)$datos;
    }

    /** WEB */
    public function profesionalConfirmaRechazoConvenio(Request $request)
    {
        $datos = array();
        $error = array();
        $mensaje = array();

        if(empty($request->token))
        {
            $error['token'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->proceso))
        {
            $error['proceso'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $registro = ProfesionalInstitucionConvenio::where('token', $request->token)->first();
            if($registro)
            {
                $temp_f_confirmacion = '';
                $temp_f_rechazo = '';
                if($request->proceso == 1)
                    $temp_f_confirmacion = date('Y-m-d H:i:s');
                else
                    $temp_f_rechazo = date('Y-m-d H:i:s');

                $datos['convenio_actualizar'] = static::modificar($registro->id, '', '', '', '', '', '', '', '', '', '', $temp_f_confirmacion, $temp_f_rechazo, $request->proceso,'');

                if($datos['convenio_actualizar']->estado == 1)
                {
                    $datos['estado'] = 1;
                    $datos['msj'] = 'Convenio procesado por el Profesional';
                    $mensaje[] = 'Convenio procesado por el Profesional';


                    if($request->proceso == 2)
                        $mensaje[] = 'Convenio Confrimado';
                    else if($request->proceso == 3)
                        $mensaje[] = 'Convenio Rechazado';
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'registro no encontrado';
                $mensaje[] = 'registro no encontrado';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campo requerido';
            $datos['error'] = $error;
            $mensaje[] = 'campo requerido';
        }
        return view('')->with(['mensaje' => $mensaje]);
    }

}
