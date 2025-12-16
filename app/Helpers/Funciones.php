<?php

namespace App\Helpers;

use App\Http\Controllers\SendMailController;
use Illuminate\Support\Facades\DB;
use App\Models\LogUsersDevices;
use App\Models\Profesional;
use App\Models\Paciente;
use App\Models\Asistente;
use App\Models\AdminInstServ;

class Funciones{
    function __construct()
    {

    }

    public function userData($id_usuario)
    {
        /*
        * profesionales
        id,nombre,apellido_uno,apellido_dos,sexo,rut,email,telefono_uno,telefono_dos,

        * pacientes
        id,nombres,apellido_uno,apellido_dos,telefono_uno,telefono_dos,profesion,sexo,email,fecha_nac

        * asistentes
        id,nombres,apellido_uno,apellido_dos,telefono_uno,telefono_dos,sexo,email,fecha_nac

        *admin_inst_serv
        id,rut,nombres,apellido_uno,apellido_dos,telefono_uno,telefono_dos,sexo,email,fecha_nac
        */

         /* DATOS USUARIO - LOGEADO */
         $usuario = array(
            'nombre' => '',
            'apellido_uno' => '',
            'apellido_dos' => '',
            'sexo' => '',
            'rut' => '',
            'email' => '',
            'telefono_uno' => '',
            'telefono_dos' => '',
            'profesion' => '',
            'fecha_nac' => '',
         );

         $profesional_ = Profesional::with('Especialidad')->where('id_usuario',$id_usuario)->first();
         if($profesional_)
         {
            $usuario['nombre'] = $profesional_->nombre;
            $usuario['apellido_uno'] = $profesional_->apellido_uno;
            $usuario['apellido_dos'] = $profesional_->apellido_dos;
            $usuario['sexo'] = $profesional_->sexo;
            $usuario['rut'] = $profesional_->rut;
            $usuario['email'] = $profesional_->email;
            $usuario['telefono_uno'] = $profesional_->telefono_uno;
            $usuario['telefono_dos'] = $profesional_->telefono_dos;
            $usuario['profesion'] = $profesional_->Especialidad->nombre;
            //$usuario['fecha_nac'] = $profesional_->fecha_nac;
         }
         $paciente_ = Paciente::where('id_usuario',$id_usuario)->first();
         if($paciente_)
         {
            $usuario['nombre'] = $paciente_->nombres;
            $usuario['apellido_uno'] = $paciente_->apellido_uno;
            $usuario['apellido_dos'] = $paciente_->apellido_dos;
            $usuario['sexo'] = $paciente_->sexo;
            $usuario['rut'] = $paciente_->rut;
            $usuario['email'] = $paciente_->email;
            $usuario['telefono_uno'] = $paciente_->telefono_uno;
            $usuario['telefono_dos'] = $paciente_->telefono_dos;
            $usuario['profesion'] = $paciente_->profesion;
            $usuario['fecha_nac'] = $paciente_->fecha_nac;
         }
         $asistente_ = Asistente::where('id_usuario',$id_usuario)->first();
         if($asistente_)
         {
            $usuario['nombre'] = $asistente_->nombres;
            $usuario['apellido_uno'] = $asistente_->apellido_uno;
            $usuario['apellido_dos'] = $asistente_->apellido_dos;
            $usuario['sexo'] = $asistente_->sexo;
            //$usuario['rut'] = $asistente_->rut;
            $usuario['email'] = $asistente_->email;
            $usuario['telefono_uno'] = $asistente_->telefono_uno;
            $usuario['telefono_dos'] = $asistente_->telefono_dos;
            //$usuario['profesion'] = $asistente_->profesion;
            $usuario['fecha_nac'] = $asistente_->fecha_nac;
         }
         $adminInstServ_ = AdminInstServ::where('id_admin',$id_usuario)->first();
         if($adminInstServ_)
         {
            $usuario['nombre'] = $adminInstServ_->nombres;
            $usuario['apellido_uno'] = $adminInstServ_->apellido_uno;
            $usuario['apellido_dos'] = $adminInstServ_->apellido_dos;
            $usuario['sexo'] = $adminInstServ_->sexo;
            $usuario['rut'] = $adminInstServ_->rut;
            $usuario['email'] = $adminInstServ_->email;
            $usuario['telefono_uno'] = $adminInstServ_->telefono_uno;
            $usuario['telefono_dos'] = $adminInstServ_->telefono_dos;
            //$usuario['profesion'] = $adminInstServ_->profesion;
            $usuario['fecha_nac'] = $adminInstServ_->fecha_nac;
         }

     /* FIN DATOS USUARIO - LOGEADO */

        return $usuario;
    }

    public function disablePermApp($token){
        $datos = array();
        $registro = LogUsersDevices::where('token',trim($token))->first();
        if($registro)
        {
            $registro->estado = 3;
            $registro->save();
            $datos['estado'] = 1;
            $datos['msj'] = 'registro encontrado';

        }else{
            $datos['estado'] = 0;
            $datos['msj'] = 'registros no encontrados';
        }

                   return $datos;
    }

    static public function checkStatePermApp($token)
    {
        $datos = array();
        $registro = LogUsersDevices::where('token',trim($token))->first();
        if($registro)
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'registro encontrado';
            $datos['registro'] = $registro;
            /* Fecha Exp */
            $fechaInicial = $registro->fecha_ingreso;
            $fechaFinal = $registro->fecha_termino;
            $fechaExp = $registro->fecha_exp;
            $segundos = strtotime($fechaExp) - strtotime($fechaInicial);
            $datos['tiempo'] = $segundos;
        }
        else
        {
            $datos['estado'] = 0;
            $datos['registro']['estado'] = 0;
            $datos['msj'] = 'registros no encontrados';
        }

        return $datos;

    }

    public function validTokenPermApp($token)
    {
        if($token)
        {
            $state = Funciones::checkStatePermApp($token);
            if($state['registro']['estado'] != 1)
            {
                abort(401);
            }else{
                return $state['registro'];
            }
        }else{
            abort(401);
        }
    }

	static public function generatePermApp($id_user_create,$id_user_recept,$evento,$nombre,$apellido_p,$apellido_m,$lugar,$profesional,$tipo = 'confirmacion'){
        $datos = array();
        /** calculo de periodo de vigencia para aprobacion */
        $fecha = date('Y-m-d');
        $hora =  date('H:i:s');
        $fecha_actual  = date('Y-m-d H:i:s', strtotime($fecha.' '.$hora));
        $fecha_vencimiento  = date ( 'Y-m-d H:i:s' ,strtotime ( '+'.(int)env('TIEMPO_ESPERA_CONFIRMACION').' hours' , strtotime ($fecha_actual) ) );
        $fecha_expira = date ('Y-m-d H:i:s' ,strtotime ( '+'.((int)env('TIEMPO_ESPERA_CONFIRMACION')+(int)env('TIEMPO_EXP_PERMISO')).' hours' , strtotime ($fecha_actual) ) );

        $id = LogUsersDevices::latest()->first();
        if(is_object($id)==false)
        $id=0;
        else
        $id = LogUsersDevices::latest()->first()->id;

        $msj = array(
            'id' => ($id+1),
            'nombre' => mb_strtoupper($nombre.' '.$apellido_p.' '.$apellido_m),
            'evento' => $evento,
            'fecha' => $fecha,
            'hora' => $hora,
            'lugar_atencion' => $lugar,
            'profesional' => $profesional,
            'tipo' => $tipo
        );

        $log_users_devices = new LogUsersDevices();
        $log_users_devices->id_user_create = $id_user_create;
        $log_users_devices->id_user_recept = $id_user_recept;
        $log_users_devices->msg = json_encode($msj);

		if($id_user_recept==6 || $id_user_recept==38)
        {
            $log_users_devices->estado = 1;
        }
        else
        {
            if($tipo_id != 12)
            {
                if( ($tipo_id == 13  || $tipo_id == 8) && ($id_user_recept==83 || $id_user_recept==3 || $id_user_recept==6 || $id_user_recept==38 ))
                {
                    $log_users_devices->estado = 1;
                }
                else if( ($tipo_id == 2 ) && ($id_user_recept==83 || $id_user_recept==3 || $id_user_recept==6 || $id_user_recept==38 ))
                {
                    $log_users_devices->estado = 1;
                }
                else
                {
                    if($id_user_create == $id_user_recept)
                        $log_users_devices->estado = 1;
                    else
                        $log_users_devices->estado = 0;
                }
            }
            else
            {
                $log_users_devices->estado = 0;
            }
        }

        $log_users_devices->fecha_ingreso = $fecha_actual;
        $log_users_devices->fecha_termino = $fecha_vencimiento;
        $log_users_devices->tipo = $tipo_id; // check sdi // ESTRUCTURA DE TEXTO
        $token_temp = md5(uniqid());
        $log_users_devices->token = $token_temp;
        $log_users_devices->fecha_exp = $fecha_expira;

        if($log_users_devices->save())
        {
            $datos['app']['estado'] = 1;
            $datos['app']['msj'] = $msj;
            $datos['app']['fecha_inicio'] = $fecha_actual;
            $datos['app']['fecha_termino'] = $fecha_vencimiento;
            $datos['app']['fecha_exp'] = $fecha_expira;
            $datos['app']['tiempo'] = env('TIEMPO_ESPERA');
            $datos['app']['last_id'] = $log_users_devices->id;
            $datos['app']['token'] = $log_users_devices->token;

            Funciones::envioCorreoNotificacion($tipo_id, $id_user_create, $id_user_recept, $token_temp);
        }
        else
        {
            $datos['app']['estado'] = 0;
            $datos['app']['msj'] = 'Solicitud de aprobacion con falla';
        }

        return $datos;
    }

    public function envioCorreoNotificacion($tipo_id, $id_user_create, $id_user_recept, $token_temp)
    {
        $tipo_con_correo = array('999999','11', '12');
        if( array_search($tipo_id, $tipo_con_correo) )
        {
            $datos_create = '';
            $datos_recept = '';
            $datos_create = Funciones::userData($id_user_create);
            $datos_recept = Funciones::userData($id_user_recept);

            $blade_correo = 'correo_log_autorizacion';
            $asunto_correo = '';
            $body_correo = array();
            switch ($tipo_id) {
                case '11':
                    $asunto_correo = 'MED-SDI - Solicitud de permiso de Inicio de Licencia por Profesional';
                    $body_correo = array(
                        'titulo' => 'Solicitud Permiso para Licencia',
                        'cuerpo' => 'El profesional '.$datos_create['nombre'].' '.$datos_create['apellido_uno'].' '.$datos_create['apellido_dos'].' esta solicitando permiso para Iniciar Licencia.<br>
                                    <table border="0" width="100%" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td height="20" colspan="2"><hr/></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;">
                                                <a target="_blank" href="'.route('paciente.licencia.evalueacion.aceptar', array('token='.$token_temp, 'proceso=aceptar')).'" style="color: #ffffff; text-decoration: none; font-size: 18px; ">
                                                    <div style="background-color: rgb(51,102,204); background: -moz-linear-gradient(81deg, rgba(51,102,204,1) 0%, rgba(28,190,190,1) 100%); background: -webkit-linear-gradient(81deg, rgba(51,102,204,1) 0%, rgba(28,190,190,1) 100%); background: linear-gradient(81deg, rgba(51,102,204,1) 0%, rgba(28,190,190,1) 100%); padding: 15px 18px; -webkit-border-radius: 30px; font-family: Helvetica, Arial, sans-serif;" align="center" bgcolor="#289CDC">
                                                       ACEPTAR LICENCIA
                                                    </div>
                                                </a>
                                            </td>
                                            <td style="text-align: center;">
                                                <a target="_blank" href="'.route('paciente.licencia.evalueacion.rechazar', array('token='.$token_temp, 'proceso=rechazar')).'" style="color: #ffffff; text-decoration: none; font-size: 18px; ">
                                                    <div style="background: rgb(204,65,51); background: -moz-linear-gradient(81deg, rgba(204,65,51,1) 0%, rgba(190,28,28,1) 100%); background: -webkit-linear-gradient(81deg, rgba(204,65,51,1) 0%, rgba(190,28,28,1) 100%); background: linear-gradient(81deg, rgba(204,65,51,1) 0%, rgba(190,28,28,1) 100%); padding: 15px 18px; -webkit-border-radius: 30px; font-family: Helvetica, Arial, sans-serif;" align="center" bgcolor="#289CDC">
                                                        RECHAZAR LICENCIA
                                                    </div>
                                                </a>
                                            </td>
                                        </tr>
                                    </table>'
                    );
                    break;
                case '12':
                    $asunto_correo = 'MED-SDI - Permiso para Inicio de Licencia';
                    $body_correo = array(
                        'titulo' => 'Solicitud Permiso para Licencia',
                        'cuerpo' => 'Profesional usted esta Iniciando una Licencia<br>
                                    <table border="0" width="100%" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td height="20" colspan="2"><hr/></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;">
                                                <a target="_blank" href="'.route('profesional.licencia.evalueacion.aceptar', array('token='.$token_temp, 'proceso=aceptar')).'" style="color: #ffffff; text-decoration: none; font-size: 18px; ">
                                                    <div style="background-color: rgb(51,102,204); background: -moz-linear-gradient(81deg, rgba(51,102,204,1) 0%, rgba(28,190,190,1) 100%); background: -webkit-linear-gradient(81deg, rgba(51,102,204,1) 0%, rgba(28,190,190,1) 100%); background: linear-gradient(81deg, rgba(51,102,204,1) 0%, rgba(28,190,190,1) 100%); padding: 15px 18px; -webkit-border-radius: 30px; font-family: Helvetica, Arial, sans-serif;" align="center" bgcolor="#289CDC">
                                                    ACEPTAR LICENCIA
                                                    </div>
                                                </a>
                                            </td>
                                            <td style="text-align: center;">
                                                <a target="_blank" href="'.route('profesional.licencia.evalueacion.rechazar', array('token='.$token_temp, 'proceso=rechazar')).'" style="color: #ffffff; text-decoration: none; font-size: 18px; ">
                                                    <div style="background: rgb(204,65,51); background: -moz-linear-gradient(81deg, rgba(204,65,51,1) 0%, rgba(190,28,28,1) 100%); background: -webkit-linear-gradient(81deg, rgba(204,65,51,1) 0%, rgba(190,28,28,1) 100%); background: linear-gradient(81deg, rgba(204,65,51,1) 0%, rgba(190,28,28,1) 100%); padding: 15px 18px; -webkit-border-radius: 30px; font-family: Helvetica, Arial, sans-serif;" align="center" bgcolor="#289CDC">
                                                        RECHAZAR LICENCIA
                                                    </div>
                                                </a>
                                            </td>
                                        </tr>
                                    </table>'
                    );
                    break;

                default:
                    $blade_correo = '';
                    $asunto_correo = '';
                    $body_correo = array();
                    break;
            }

            if(!empty($blade_correo) && !empty($asunto_correo))
            {
                if( !empty($datos_create['email']) && !empty($datos_recept['email']) )
                {

                    $blade = $blade_correo;
                    $to = array(
                            array('email' => $datos_recept['email'], 'name' =>  $datos_recept['nombre'] . ' ' . $datos_recept['apellido_uno'] . ' ' . $datos_recept['apellido_dos']),
                        );
                    $cc = array();
                    $bcc = array();
                    $asunto = $asunto_correo;
                    $body = $body_correo;
                    $archivo = '';
                    $id_institucion = '';

                    $result_mail =  SendMailController::envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, $id_institucion);

                    if($result_mail['estado'])
                    {
                        $datos['mail']['institucion']['estado'] = 1;
                        $datos['mail']['institucion']['msj'] = 'Notificacion de bienvenida enviado';
                    }
                    else
                    {
                        $datos['mail']['institucion']['estado'] = 0;
                        $datos['mail']['institucion']['msj'] = 'Falle en envio de Notificacion de bienvenida';
                    }
                }
            }
        }
    }

}
