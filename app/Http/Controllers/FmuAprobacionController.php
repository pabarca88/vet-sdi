<?php

namespace App\Http\Controllers;

use App\Helpers\Funciones;
use App\Models\LogUsersDevices;
use App\Models\LugarAtencion;
use App\Models\Paciente;
use App\Models\Profesional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FmuAprobacionController extends Controller
{
    public function fmuEvaluacion(Request $request)
    {
        $datos = array();
        $error = array();
        $mensaje = '';
        $mensaje_final = '';
        $valido = 1;

        if($valido)
        {
            $return_check = Funciones::checkStatePermApp($request->token);
            if($return_check['estado'] == 1)
            {
                /** token encontrado */
                $registro = $return_check['registro'];

                if($registro->estado == 1)
                {
                    $mensaje_final = 'Autorización ya Confirmada.';
                }
                else if($registro->estado == 2)
                {
                    $mensaje_final = 'Autorización ya Rechazada.';
                }
                else if($registro->estado == 3)
                {
                    $mensaje_final = 'Autorización ya Cancelada o Vencida.';
                }
                else
                {
                    $log_user = LogUsersDevices::find($registro->id);
                    if($log_user)
                    {
                        if($request->proceso == 'aceptar')
                        {
                            $log_user->estado = 1;
                            $mensaje = 'Autorización Aceptada';
                        }
                        else if($request->proceso == 'rechazar')
                        {
                            $log_user->estado = 2;
                            $mensaje = 'Autorización Rechazada';
                        }
                        else
                        {
                            $log_user->estado = 3;
                            $mensaje = 'Autorización Cancelada';
                        }

                        if($log_user->save())
                        {
                            $mensaje_final = $mensaje;
                        }
                    }
                    else
                    {
                        $mensaje_final = 'Autorización no encontrada.';
                    }
                }

            }
            else
            {
                // token no encontrado
                $mensaje_final = 'Autorización no encontrada.';
            }
        }
        else
        {
            $mensaje_final = 'Autorización no encontrada.<br/>Token no valido';
        }

        return view('general.fmu.procesar')->with(array('mensaje' => $mensaje_final ));

    }

    public function solicitarAutorizacion(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_lugar_atencion))
        {
            $error['id_lugar_atencion'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_paciente))
        {
            $error['id_lugar_atencion'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
            $paciente = Paciente::find($request->id_paciente);
            $lugar_atencion = LugarAtencion::find($request->id_lugar_atencion);

            if($profesional)
            {
                $id_user_create = Auth::user()->id;
                $id_user_recept = $paciente->id_usuario;
                $evento = 'FMU';
                $nombre = $paciente->nombres;
                $apellido_p = $paciente->apellido_uno;
                $apellido_m = $paciente->apellido_dos;
                $lugar = $lugar_atencion->nombre;
                $profesional_log = $profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos;
                $tipo = 'FMU';
                $tipo_id = '2';

                // $log_users_devices = new LogUsersDevices();
                $funcion = new Funciones();
                $log_users_devices = (object) $funcion->generatePermApp($id_user_create,$id_user_recept,$evento,$nombre,$apellido_p,$apellido_m,$lugar,$profesional_log,$tipo,$tipo_id);

                $datos['log_users_devices'] = $log_users_devices->app;

                if($log_users_devices->app['estado'] == 1)
                {
                    $datos['estado'] = 1;
                    $datos['msj'] = 'Solicitud enviada';
                    session(['fmu_token' => $log_users_devices->app['token']]);
                    session(['fmu_log_id' => $log_users_devices->app['last_id']]);
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'Falla en solicitud';
                    session(['fmu_token' => '']);
                    session(['fmu_log_id' => '']);
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Profesional no encontrado.';
                session(['fmu_token' => '']);
                session(['fmu_log_id' => '']);
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campos requeridos.';
            $datos['error'] = $error;
            session(['fmu_token' => '']);
            session(['fmu_log_id' => '']);
        }

        return $datos;
    }

    public function validarAutorizacion(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->token))
        {
            $error['token'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $funcion = new Funciones();
            $result = (object)$funcion->checkStatePermApp($request->token);

            if($result->estado == 1)
            {
                $estado = $result->registro->estado;
                if($estado == 0) // espera
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'En espera.';
                    $datos['fmu_estado'] = 0;
                    $datos['fmu_token'] = session('fmu_token');
                    session(['fmu_estado' => 0]);
                }
                else if($estado == 1) // confirmado
                {
                    $datos['estado'] = 1;
                    $datos['msj'] = 'Confirmado.';
                    $datos['fmu_estado'] = 1;
                    $datos['fmu_token'] = session('fmu_token');
                    session(['fmu_estado' => 1]);
                }
                else if($estado == 2) // rechazada
                {
                    $datos['estado'] = 2;
                    $datos['msj'] = 'Rechazado.';
                    $datos['fmu_estado'] = 2;
                    $datos['fmu_token'] = session('fmu_token');
                    session(['fmu_estado' => 2]);
                }
                else if($estado == 3) // cancelada
                {
                    $datos['estado'] = 3;
                    $datos['msj'] = 'Cancelada.';
                    $datos['fmu_estado'] = 3;
                    $datos['fmu_token'] = session('fmu_token');
                    session(['fmu_estado' => 3]);
                }
                else if($estado == 4) // aprobada expirada
                {
                    $datos['estado'] = 4;
                    $datos['msj'] = 'Aprobada expirada.';
                    $datos['fmu_estado'] = 4;
                    $datos['fmu_token'] = session('fmu_token');
                    session(['fmu_estado' => 4]);
                }
                else // nada
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'En espera.';
                    $datos['fmu_estado'] = 0;
                    $datos['fmu_token'] = session('fmu_token');
                    session(['fmu_estado' => 0]);
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Solicitud no encontrada.';
                session(['fmu_estado' => 0]);
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campos requeridos.';
            $datos['error'] = $error;
            session(['fmu_estado' => 0]);
        }

        return $datos;
    }

    public function cancelarAutorizacion()
    {
        // var_dump(session()->all());

        $datos = array();
        $error = array();
        $valido = 1;
        $token = session('fmu_token');
        if(empty($token))
        {
            $error['token'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $funcion = new Funciones();
            $result = (object)$funcion->disablePermApp($token);

            if($result->estado)
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'Autorizacion Cancelada';
                session(['fmu_token' => '']);
                session(['fmu_log_id' => '']);
                session(['fmu_estado' => 3]);
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Falla cancelando Autorización';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campos requeridos.';
            $datos['error'] = $error;
        }

        return $datos;
    }


    public function solicitarAutorizacionConfidencial(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;


        if(empty($request->id_paciente))
        {
            $error['id_paciente'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {

            $paciente = Paciente::find($request->id_paciente);

            if($paciente->id_usuario == Auth::user()->id)
            {
                $id_user_create = Auth::user()->id;
                $id_user_recept = $paciente->id_usuario;
                $evento = 'CONFIDENCIAL';
                $nombre = $paciente->nombres;
                $apellido_p = $paciente->apellido_uno;
                $apellido_m = $paciente->apellido_dos;
                $lugar = '';
                // $profesional_log = $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos;
                $profesional_log = '';
                $tipo = 'CONFIDENCIAL';
                $tipo_id = '17';

                // $log_users_devices = new LogUsersDevices();
                $funcion = new Funciones();
                $log_users_devices = (object) $funcion->generatePermApp($id_user_create,$id_user_recept,$evento,$nombre,$apellido_p,$apellido_m,$lugar,$profesional_log,$tipo,$tipo_id);

                $datos['log_users_devices'] = $log_users_devices->app;

                if($log_users_devices->app['estado'] == 1)
                {
                    $datos['estado'] = 1;
                    $datos['msj'] = 'Solicitud enviada';
                    session(['fmu_token' => $log_users_devices->app['token']]);
                    session(['fmu_log_id' => $log_users_devices->app['last_id']]);
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'Falla en solicitud';
                    session(['fmu_autorizacion_token' => '']);
                    session(['fmu_autorizacion_log_id' => '']);
                }
            }
            else
            {

                $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
                $lugar_atencion = LugarAtencion::find($request->id_lugar_atencion);

                if($profesional)
                {
                    $id_user_create = Auth::user()->id;
                    $id_user_recept = $paciente->id_usuario;
                    $evento = 'CONFIDENCIAL';
                    $nombre = $paciente->nombres;
                    $apellido_p = $paciente->apellido_uno;
                    $apellido_m = $paciente->apellido_dos;
                    if($lugar_atencion) $lugar = $lugar_atencion->nombre;
                    else                $lugar = '';
                    $profesional_log = $profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos;
                    $tipo = 'CONFIDENCIAL';
                    $tipo_id = '17';

                    // $log_users_devices = new LogUsersDevices();
                    $funcion = new Funciones();
                    $log_users_devices = (object) $funcion->generatePermApp($id_user_create,$id_user_recept,$evento,$nombre,$apellido_p,$apellido_m,$lugar,$profesional_log,$tipo,$tipo_id);

                    $datos['log_users_devices'] = $log_users_devices->app;

                    if($log_users_devices->app['estado'] == 1)
                    {
                        $datos['estado'] = 1;
                        $datos['msj'] = 'Solicitud enviada';
                        session(['fmu_autorizacion_token' => $log_users_devices->app['token']]);
                        session(['fmu_autorizacion_log_id' => $log_users_devices->app['last_id']]);
                    }
                    else
                    {
                        $datos['estado'] = 0;
                        $datos['msj'] = 'Falla en solicitud';
                        session(['fmu_autorizacion_token' => '']);
                        session(['fmu_autorizacion_log_id' => '']);
                    }
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'Profesional no encontrado.';
                    session(['fmu_autorizacion_token' => '']);
                    session(['fmu_autorizacion_log_id' => '']);
                }
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campos requeridos.';
            $datos['error'] = $error;
            session(['fmu_autorizacion_token' => '']);
            session(['fmu_autorizacion_log_id' => '']);
        }

        return $datos;
    }

    public function validarAutorizacionConfidencial(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->token))
        {
            $error['token'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $funcion = new Funciones();
            $result = (object)$funcion->checkStatePermApp($request->token);

            if($result->estado == 1)
            {
                $estado = $result->registro->estado;
                if($estado == 0) // espera
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'En espera.';
                    $datos['fmu_autorizacion_estado'] = 0;
                    $datos['fmu_autorizacion_token'] = session('fmu_autorizacion_token');
                    session(['fmu_autorizacion_estado' => 0]);
                }
                else if($estado == 1) // confirmado
                {
                    $datos['estado'] = 1;
                    $datos['msj'] = 'Confirmado.';
                    $datos['fmu_autorizacion_estado'] = 1;
                    $datos['fmu_autorizacion_token'] = session('fmu_autorizacion_token');
                    session(['fmu_autorizacion_estado' => 1]);
                }
                else if($estado == 2) // rechazada
                {
                    $datos['estado'] = 2;
                    $datos['msj'] = 'Rechazado.';
                    $datos['fmu_autorizacion_estado'] = 2;
                    $datos['fmu_autorizacion_token'] = session('fmu_autorizacion_token');
                    session(['fmu_autorizacion_estado' => 2]);
                }
                else if($estado == 3) // cancelada
                {
                    $datos['estado'] = 3;
                    $datos['msj'] = 'Cancelada.';
                    $datos['fmu_autorizacion_estado'] = 3;
                    $datos['fmu_autorizacion_token'] = session('fmu_autorizacion_token');
                    session(['fmu_autorizacion_estado' => 3]);
                }
                else if($estado == 4) // aprobada expirada
                {
                    $datos['estado'] = 4;
                    $datos['msj'] = 'Aprobada expirada.';
                    $datos['fmu_autorizacion_estado'] = 4;
                    $datos['fmu_autorizacion_token'] = session('fmu_autorizacion_token');
                    session(['fmu_autorizacion_estado' => 4]);
                }
                else // nada
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'En espera.';
                    $datos['fmu_autorizacion_estado'] = 0;
                    $datos['fmu_autorizacion_token'] = session('fmu_autorizacion_token');
                    session(['fmu_autorizacion_estado' => 0]);
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Solicitud no encontrada.';
                session(['fmu_autorizacion_estado' => 0]);
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campos requeridos.';
            $datos['error'] = $error;
            session(['fmu_autorizacion_estado' => 0]);
        }

        return $datos;
    }
}
