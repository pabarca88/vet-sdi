<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Invitacion;
use Illuminate\Http\Request;

class InvitacionController extends Controller
{
    // public $id_tipo_usuario;
    // public $tipo_invitacion;
    // public $id_lugar_atencion;
    // public $rut;
    // public $nombre;
    // public $apellido_uno;
    // public $apellido_dos;
    // public $telefono;
    // public $email;
    // public $informado;
    // public $procesado;
    // public $fecha_informado;
    // public $fecha_procesado;
    // public $fecha_aprobacion;
    // public $fecha_rechazo;
    // public $id_user_solicitud;
    // public $id_user_invitado;
    // public $estado;

    /**
     * Undocumented function
     *
     * @param [type] $id_tipo_usuario
     * @param [type] $tipo_invitacion
     * @param [type] $id_lugar_atencion
     * @param [type] $rut
     * @param [type] $nombre
     * @param [type] $apellido_uno
     * @param [type] $apellido_dos
     * @param [type] $telefono
     * @param [type] $email
     * @param [type] $informado
     * @param [type] $procesado
     * @param [type] $fecha_informado
     * @param [type] $fecha_procesado
     * @param [type] $fecha_aprobacion
     * @param [type] $fecha_rechazo
     * @param [type] $id_user_solicitud
     * @param [type] $id_user_invitado
     * @return array
     */
    public function store($id_tipo_usuario, $tipo_invitacion, $id_lugar_atencion, $rut, $nombre, $apellido_uno, $apellido_dos, $telefono, $email, $id_especialidad, $id_tipo_especialidad, $id_sub_tipo_especialidad, $informado, $procesado, $fecha_informado, $fecha_procesado, $fecha_aprobacion, $fecha_rechazo, $id_user_solicitud, $id_user_invitado)
    {
        $datos = array();

        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        $token_temp = substr(str_shuffle($permitted_chars), 0, 50);

        $registro = new Invitacion();
        $registro->token = $token_temp;
        $registro->id_tipo_usuario = $id_tipo_usuario;
        $registro->tipo_invitacion = $tipo_invitacion;
        $registro->id_lugar_atencion = $id_lugar_atencion;
        $registro->rut = $rut;
        $registro->nombre = $nombre;
        $registro->apellido_uno = $apellido_uno;
        $registro->apellido_dos = $apellido_dos;
        $registro->telefono = $telefono;
        $registro->email = $email;
        if(!empty($id_especialidad))
            $registro->id_especialidad = $id_especialidad;
        if(!empty($id_tipo_especialidad))
            $registro->id_tipo_especialidad = $id_tipo_especialidad;
        if(!empty($id_sub_tipo_especialidad))
            $registro->id_sub_tipo_especialidad = $id_sub_tipo_especialidad;
        if(!empty($informado))
            $registro->informado = $informado;
        if($procesado != '')
            $registro->procesado = $procesado;
        if(!empty($fecha_informado))
            $registro->fecha_informado = $fecha_informado;
        if(!empty($fecha_procesado))
            $registro->fecha_procesado = $fecha_procesado;
        if(!empty($fecha_aprobacion))
            $registro->fecha_aprobacion = $fecha_aprobacion;
        if(!empty($fecha_rechazo))
            $registro->fecha_rechazo = $fecha_rechazo;
        $registro->id_user_solicitud = $id_user_solicitud;
        if(!empty($id_user_invitado))
            $registro->id_user_invitado = $id_user_invitado;

        if($registro->save())
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'registro exitoso';
            $datos['last_id'] = $registro->id;
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'registro fallido';
        }
        return $datos;
    }

    static public function registroInvtacionProfesional($id_lugar_atencion,$rut,$nombre,$apellido_uno,$apellido_dos,$telefono,$email, $id_especialidad, $id_tipo_especialidad, $id_sub_tipo_especialidad, $id_user_solicitud,$id_user_invitado,$envio_notificacion = 1)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($id_lugar_atencion)){
            $valido = 0;
            $error['id_lugar_atencion'] == 'campo requerido';
        }
        // if(empty($rut)){
        //     $valido = 0;
        //     $error['rut'] == 'campo requerido';
        // }
        if(empty($nombre)){
            $valido = 0;
            $error['nombre'] == 'campo requerido';
        }
        if(empty($apellido_uno)){
            $valido = 0;
            $error['apellido_uno'] == 'campo requerido';
        }
        if(empty($apellido_dos)){
            $valido = 0;
            $error['apellido_dos'] == 'campo requerido';
        }
        // if(empty($telefono)){
        //     $valido = 0;
        //     $error['telefono'] == 'campo requerido';
        // }
        if(empty($email)){
            $valido = 0;
            $error['email'] == 'campo requerido';
        }
        if($id_user_solicitud == ''){
            $valido = 0;
            $error['id_user_solicitud'] == 'campo requerido';
        }
        // if($id_user_invitado == ''){
        //     $valido = 0;
        //     $error['id_user_invitado'] == 'campo requerido';
        // }

        if($valido == 1)
        {
            /** VALIDAR INVITACION */
            $filtro = array();
            $filtro[] = array('email', $email );
            $filtro[] = array('id_lugar_atencion', $id_lugar_atencion);
            $filtro[] = array('estado', 1);
            $registro_invitacion = Invitacion::where($filtro)->orderBy('id','DESC')->first();
            if($registro_invitacion)
            {

                if($envio_notificacion == 1)
                    $datos['notificacion'] = static::envioNotificacion(1, $registro_invitacion->id);

                $datos['last_id'] = $registro_invitacion->id;
            }
            else
            {
                $role = 3; // uso del rol de profesional
                $resultado = static::store($role, 'A PROFESIONAL', $id_lugar_atencion, $rut, $nombre, $apellido_uno, $apellido_dos, $telefono, $email, $id_especialidad, $id_tipo_especialidad, $id_sub_tipo_especialidad, 0, 0, date('Y-m-d H:i:s'), '', '', '', $id_user_solicitud, $id_user_invitado);
                $datos = $resultado;

                if($envio_notificacion == 1)
                    $datos['notificacion'] = static::envioNotificacion(1, $resultado['last_id']);

                $datos['last_id'] = $resultado['last_id'];
            }
            $datos['estado'] = 1;
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campo requerido';
            $datos['error'] = $error;
        }
        return (object)$datos;
    }

    static public function envioNotificacion($tipo,$id_invitacion)
    {
        $datos = array();

        $invitacion = Invitacion::with('LugarAtencion')->where('id', $id_invitacion)->first();

        switch ($tipo) {
            case '1':/** correo  */
                    $retornoNotificacion = 1;//llamdo al envio de correos
                    if($retornoNotificacion == 1)
                    {

                        /** envio de correo de confirmacion  */
                        $blade = 'invitacion_profesional';
                        $to = array(
                                array('email' => $invitacion->email,'name' => $invitacion->nombre.' '.$invitacion->apellido_uno.' '.$invitacion->apellido_dos),
                            );
                        $cc = array();
                        $bcc = array();
                        $asunto = 'MED-SDI - Invitacion';
                        $body = array(
                            'nombre'=>$invitacion->nombre.' '.$invitacion->apellido_uno.' '.$invitacion->apellido_dos,
                            'lugar_atencion' => $invitacion->LugarAtencion->nombre,
                            'id_invitacion' => $invitacion->id,
                            'tipo_invitacion' => $invitacion->tipo_invitacion,
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

        return $datos;
    }

    public function cambioContrasenaPerfilResponsable(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if($valido)
        {
            $filtro = array();
            if(!empty($request->rut))
                $filtro[] = array('rut', $request->rut);
            if(!empty($request->nombre))
                $filtro[] = array('nombre', $request->nombre);
            if(!empty($request->apellido_uno))
                $filtro[] = array('apellido_uno', $request->apellido_uno);
            if(!empty($request->apellido_dos))
                $filtro[] = array('apellido_dos', $request->apellido_dos);

            $registro = Invitacion::with('convenio')->where($filtro)->first();
            if($registro)
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registros';
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
