<?php

namespace App\Http\Controllers;

use App\Helpers\Funciones;
use App\Models\Licencia;
use App\Models\LogUsersDevices;
use App\Models\LugarAtencion;
use App\Models\Paciente;
use App\Models\Profesional;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LicenciaAprobacionController extends Controller
{
    public function licenciaEvaluacion(Request $request)
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
                            $mensaje = 'Usted ha Confirmado el Inicio de la Licencia';
                        }
                        else if($request->proceso == 'rechazar')
                        {
                            $log_user->estado = 2;
                            $mensaje = 'Usted ha Rechazado el Inicio de la Licencia';
                        }
                        else
                        {
                            $log_user->estado = 3;
                            $mensaje = 'Se ha Cancelado el Inicio de la Licencia';
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

        return view('general.licencia.procesar')->with(array('mensaje' => $mensaje_final ));

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

        if($valido)
        {
            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
            $lugar_atencion = LugarAtencion::find($request->id_lugar_atencion);

            if($profesional)
            {
                $id_user_create = Auth::user()->id;
                $id_user_recept = Auth::user()->id;
                $evento = 'Licencia';
                $nombre = $profesional->nombre;
                $apellido_p = $profesional->apellido_uno;
                $apellido_m = $profesional->apellido_dos;
                $lugar = $lugar_atencion->nombre;
                $profesional_log = $profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos;
                $tipo = 'Licencia';
                $tipo_id = '12';

                // $log_users_devices = new LogUsersDevices();
                $funcion = new Funciones();
                $log_users_devices = (object) $funcion->generatePermApp($id_user_create,$id_user_recept,$evento,$nombre,$apellido_p,$apellido_m,$lugar,$profesional_log,$tipo,$tipo_id);

                $datos['log_users_devices'] = $log_users_devices->app;

                if($log_users_devices->app['estado'] == 1)
                {
                    $datos['estado'] = 1;
                    $datos['msj'] = 'Solicitud enviada';
                    session(['lic_token' => $log_users_devices->app['token']]);
                    session(['lic_log_id' => $log_users_devices->app['last_id']]);
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'Falla en solicitud';
                    session(['lic_token' => '']);
                    session(['lic_log_id' => '']);
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Profesional no encontrado.';
                session(['lic_token' => '']);
                session(['lic_log_id' => '']);
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campos requeridos.';
            $datos['error'] = $error;
            session(['lic_token' => '']);
            session(['lic_log_id' => '']);
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
                    $datos['lic_estado'] = 0;
                    $datos['lic_token'] = session('lic_token');
                    session(['lic_estado' => 0]);
                }
                else if($estado == 1) // confirmado
                {
                    $datos['estado'] = 1;
                    $datos['msj'] = 'Confirmado.';
                    $datos['lic_estado'] = 1;
                    $datos['lic_token'] = session('lic_token');
                    session(['lic_estado' => 1]);
                }
                else if($estado == 2) // rechazada
                {
                    $datos['estado'] = 2;
                    $datos['msj'] = 'Rechazado.';
                    $datos['lic_estado'] = 2;
                    $datos['lic_token'] = session('lic_token');
                    session(['lic_estado' => 2]);
                }
                else if($estado == 3) // cancelada
                {
                    $datos['estado'] = 3;
                    $datos['msj'] = 'Cancelada.';
                    $datos['lic_estado'] = 3;
                    $datos['lic_token'] = session('lic_token');
                    session(['lic_estado' => 3]);
                }
                else if($estado == 4) // aprobada expirada
                {
                    $datos['estado'] = 4;
                    $datos['msj'] = 'Aprobada expirada.';
                    $datos['lic_estado'] = 4;
                    $datos['lic_token'] = session('lic_token');
                    session(['lic_estado' => 4]);
                }
                else // nada
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'En espera.';
                    $datos['lic_estado'] = 0;
                    $datos['lic_token'] = session('lic_token');
                    session(['lic_estado' => 0]);
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Solicitud no encontrada.';
                session(['lic_estado' => 0]);
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campos requeridos.';
            $datos['error'] = $error;
            session(['lic_estado' => 0]);
        }

        return $datos;
    }

    public function cancelarAutorizacion()
    {
        // var_dump(session()->all());

        $datos = array();
        $error = array();
        $valido = 1;
        $token = session('lic_token');
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
                session(['lic_token' => '']);
                session(['lic_log_id' => '']);
                session(['lic_estado' => 3]);
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

    public function pdfLicenciaPaciente(Request $request)
    {


        $filtros = array();
        $filtros[] = array('id', $request->id_licencia);
        $licencia = Licencia::where($filtros)->first();

        $paciente = Paciente::where('id', $licencia->id_paciente)->first();
        $profesional = Profesional::where('id', $licencia->id_profesional)->first();
        $lugar_atencion = LugarAtencion::find($licencia->id_lugar_atencion);

        $array_paciente = array(
            'id' => $paciente->id,
            'nombre' => $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos,
            'fecha_nac' => $paciente->fecha_nac,
            'rut' => $paciente->rut,
            'sexo' => $paciente->sexo,
            'direccion' => $paciente->Direccion()->first()->direccion.' '.$paciente->Direccion()->first()->numero_dir.', '.$paciente->Direccion()->first()->Ciudad()->first()->nombre
        );

        $array_profesional = array(
            'id' => $profesional->id,
            'nombre' => $profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos,
            'rut' => $profesional->rut,
            'especialidad' => ($profesional->SubTipoEspecialidad()->first()?$profesional->SubTipoEspecialidad()->first()->nombre:$profesional->TipoEspecialidad()->first()->nombre),
        );

        $array_lugar_atencion = array(
            'id' => $lugar_atencion->id,
            'nombre' => $lugar_atencion->nombre
        );

        $array_licencia = array(
            // 'id' => $licencia->id,
            // 'id_hora_medica' => $licencia->id_hora_medica,
            // 'id_ficha_atencion' => $licencia->id_ficha_atencion,
            // 'id_paciente' => $licencia->id_paciente,
            // 'id_profesional' => $licencia->id_profesional,
            // 'id_lugar_atencion' => $licencia->id_lugar_atencion,
            'enfermedad_comun' => $licencia->enfermedad_comun,
            'laboral' => $licencia->laboral,
            'paciente_prevision' => $licencia->paciente_prevision,
            'paciente_prevision_text' => $licencia->paciente_prevision_text,
            'rut_paciente' => $licencia->rut_paciente,
            'empleador_id' => $licencia->empleador_id,
            'empleador_nombre' => $licencia->empleador_nombre,
            'empleador_rut' => $licencia->empleador_rut,
            'empleador_direccion' => $licencia->empleador_direccion,
            'empleador_email' => $licencia->empleador_email,
            'num_dias_reposo' => $licencia->num_dias_reposo,
            'fecha_inicio' => $licencia->fecha_inicio,
            'fecha_termino' => $licencia->fecha_termino,
            'tipo_reposo' => $licencia->tipo_reposo,
            'lugar_reposo' => $licencia->lugar_reposo,
            'tipo_licencia' => $licencia->tipo_licencia,
            'recuperabilidad_laboral' => $licencia->recuperabilidad_laboral,
            'tramite_invalidez' => $licencia->tramite_invalidez,
            'descripcion_hipotesis' => $licencia->descripcion_hipotesis,
            'descripcion_cie' => $licencia->descripcion_cie,
            // 'id_descripcion_cie' => $licencia->id_descripcion_cie,
            'otros_ant_desc' => $licencia->otros_ant_desc,
            'examen_apoyo' => $licencia->examen_apoyo,
        );


        $rut = $paciente->rut;
        $rut = str_replace('.', '', $rut);
        $rut = str_replace('-', '', $rut);
        $nombre_archivo = strtolower('licencia_'.$licencia->id.'_'.$rut.'_');

        return  PdfController::generarPDF('', compact( 'array_paciente', 'array_profesional', 'array_lugar_atencion', 'array_licencia'), $nombre_archivo, 'pdf_licencia');
    }

    public function solicitarPacienteAutorizacion(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_lugar_atencion))
        {
            $error['id_lugar_atencion'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
            $paciente = Paciente::where('id', $request->id_paciente)->first();
            $lugar_atencion = LugarAtencion::find($request->id_lugar_atencion);

            if(!empty($profesional) && !empty($paciente))
            {
                if(!empty($paciente->id_usuario))
                {
                    $id_user_create = Auth::user()->id;
                    $id_user_recept = $paciente->id_usuario;
                    $evento = 'Licencia';
                    $nombre = $paciente->nombres;
                    $apellido_p = $paciente->apellido_uno;
                    $apellido_m = $paciente->apellido_dos;
                    $lugar = $lugar_atencion->nombre;
                    $profesional_log = $profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos;
                    $tipo = 'Licencia';
                    $tipo_id = '12';

                    // $log_users_devices = new LogUsersDevices();
                    $funcion = new Funciones();
                    $log_users_devices = (object) $funcion->generatePermApp($id_user_create,$id_user_recept,$evento,$nombre,$apellido_p,$apellido_m,$lugar,$profesional_log,$tipo,$tipo_id);

                    $datos['log_users_devices'] = $log_users_devices->app;

                    if($log_users_devices->app['estado'] == 1)
                    {
                        $datos['estado'] = 1;
                        $datos['msj'] = 'Solicitud enviada';
                        session(['lic_pac_token' => $log_users_devices->app['token']]);
                        session(['lic_pac_log_id' => $log_users_devices->app['last_id']]);
                    }
                    else
                    {

                        $datos['estado'] = 0;
                        $datos['msj'] = 'Falla en solicitud';
                        session(['lic_pac_token' => '']);
                        session(['lic_pac_log_id' => '']);
                    }
                }
                else
                {
                    $pass_temp = random_int('1111','9999');
                    $user = new User();
                    $user->email = $paciente->email;
                    $user->password = Hash::make($pass_temp);
                    $user->name = $paciente->nombres.' '.$paciente->apellido_uno;
                    if ($user->save())
                    {
                        $datos['user']['estado'] = 1;
                        $datos['user']['msj'] = 'usuario creado';

                        $user->assignRole('Paciente');
                        $paciente->id_usuario = $user->id;

                        if($paciente->save())
                        {
                            $datos['paciente']['estado'] = 1;
                            $datos['paciente']['msj'] = 'paciente actualizado';

                            /** envio de correo notificacion de usuario nuevo al paciente */
                            $blade = 'bienvenida_paciente_usuario';
                            $to = array(
                                    array('email' => $paciente->email,'name' => $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos),
                                );
                            $cc = array();
                            $bcc = array();
                            $asunto = 'MED-SDI - Bienvenido!';
                            $body = array(
                                        'nombre'=>$paciente->nombres . ' ' .$paciente->apellido_uno . ' ' .$paciente->apellido_dos,
                                        'user' => $paciente->email,
                                        'pass' => $pass_temp
                                        );
                            $archivo = '';/** pendiente */
                            $id_institucion = '';

                            $result_mail =  SendMailController::envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, $id_institucion);

                            if($result_mail['estado'])
                            {
                                $datos['user']['mail']['estado'] = 1;
                                $datos['user']['mail']['msj'] = 'Notificacion de bienvenida enviado';
                            }
                            else
                            {
                                $datos['user']['mail']['estado'] = 0;
                                $datos['user']['mail']['msj'] = 'Falle en envio de Notificacion de bienvenida';
                            }
                            /** FIN envio de correo notificacion de usuario nuevo al paciente */

                            $id_user_create = Auth::user()->id;
                            $id_user_recept = $paciente->id_usuario;
                            $evento = 'Licencia';
                            $nombre = $paciente->nombres;
                            $apellido_p = $paciente->apellido_uno;
                            $apellido_m = $paciente->apellido_dos;
                            $lugar = $lugar_atencion->nombre;
                            $profesional_log = $profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos;
                            $tipo = 'Licencia';
                            $tipo_id = '11';

                            // $log_users_devices = new LogUsersDevices();
                            $funcion = new Funciones();
                            $log_users_devices = (object) $funcion->generatePermApp($id_user_create,$id_user_recept,$evento,$nombre,$apellido_p,$apellido_m,$lugar,$profesional_log,$tipo,$tipo_id);

                            $datos['log_users_devices'] = $log_users_devices->app;

                            if($log_users_devices->app['estado'] == 1)
                            {
                                $datos['estado'] = 1;
                                $datos['msj'] = 'Solicitud enviada';
                                session(['lic_pac_token' => $log_users_devices->app['token']]);
                                session(['lic_pac_log_id' => $log_users_devices->app['last_id']]);
                            }
                            else
                            {

                                $datos['estado'] = 0;
                                $datos['msj'] = 'Falla en solicitud';
                                session(['lic_pac_token' => '']);
                                session(['lic_pac_log_id' => '']);
                            }
                        }
                        else
                        {
                            $datos['paciente']['estado'] = 0;
                            $datos['paciente']['msj'] = 'paciente no actualizado';
                            $datos['estado'] = 0;
                            $datos['msj'] = 'Problema al asignar el nuevo usuario al paciente.';
                            session(['lic_pac_token' => '']);
                            session(['lic_pac_log_id' => '']);
                        }
                    }
                    else
                    {
                        $datos['user']['estado'] = 0;
                        $datos['user']['msj'] = 'usuario no creado';
                        $datos['estado'] = 0;
                        $datos['msj'] = 'Problema para generar un nuevo usuario para el paciente.';
                        session(['lic_pac_token' => '']);
                        session(['lic_pac_log_id' => '']);
                    }
                }

            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Profesional no encontrado.';
                session(['lic_pac_token' => '']);
                session(['lic_pac_log_id' => '']);
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campos requeridos.';
            $datos['error'] = $error;
            session(['lic_pac_token' => '']);
            session(['lic_pac_log_id' => '']);
        }

        return $datos;
    }

    public function validarPacienteAutorizacion(Request $request)
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
                    $datos['lic_pac_estado'] = 0;
                    $datos['lic_pac_token'] = session('lic_pac_token');
                    session(['lic_pac_estado' => 0]);
                }
                else if($estado == 1) // confirmado
                {
                    $datos['estado'] = 1;
                    $datos['msj'] = 'Confirmado.';
                    $datos['lic_pac_estado'] = 1;
                    $datos['lic_pac_token'] = session('lic_pac_token');
                    session(['lic_pac_estado' => 1]);
                }
                else if($estado == 2) // rechazada
                {
                    $datos['estado'] = 2;
                    $datos['msj'] = 'Rechazado.';
                    $datos['lic_pac_estado'] = 2;
                    $datos['lic_pac_token'] = session('lic_pac_token');
                    session(['lic_pac_estado' => 2]);
                }
                else if($estado == 3) // cancelada
                {
                    $datos['estado'] = 3;
                    $datos['msj'] = 'Cancelada.';
                    $datos['lic_pac_estado'] = 3;
                    $datos['lic_pac_token'] = session('lic_pac_token');
                    session(['lic_pac_estado' => 3]);
                }
                else if($estado == 4) // aprobada expirada
                {
                    $datos['estado'] = 4;
                    $datos['msj'] = 'Aprobada expirada.';
                    $datos['lic_pac_estado'] = 4;
                    $datos['lic_pac_token'] = session('lic_pac_token');
                    session(['lic_pac_estado' => 4]);
                }
                else // nada
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'En espera.';
                    $datos['lic_pac_estado'] = 0;
                    $datos['lic_pac_token'] = session('lic_pac_token');
                    session(['lic_pac_estado' => 0]);
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Solicitud no encontrada.';
                session(['lic_pac_estado' => 0]);
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campos requeridos.';
            $datos['error'] = $error;
            session(['lic_pac_estado' => 0]);
        }

        return $datos;
    }

    public function cancelarPacienteAutorizacion()
    {
        // var_dump(session()->all());

        $datos = array();
        $error = array();
        $valido = 1;
        $token = session('lic_pac_token');
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
                session(['lic_pac_token' => '']);
                session(['lic_pac_log_id' => '']);
                session(['lic_pac_estado' => 3]);
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


}
