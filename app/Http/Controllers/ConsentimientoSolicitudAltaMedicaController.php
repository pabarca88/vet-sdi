<?php

namespace App\Http\Controllers;

use App\Models\ConSolAltaMedica;
use App\Models\FichaAtencion;
use App\Models\LogUsersDevices;
use App\Models\LugarAtencion;
use App\Models\Paciente;
use App\Models\PacientesDependientes;
use App\Models\Profesional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConsentimientoSolicitudAltaMedicaController extends Controller
{

    public function registro_aprobacion(Request $request)
    {
        $datos = array();

        $datos['registro'] = static::registro($request);
        if($datos['registro']['estado'] == 1)
        {

            $id_sol_alta_med = $datos['registro']['last_id'];

            $datos['autorizacion'] = static::solicitudArpobacionPaciente($id_sol_alta_med,$request->id_paciente, $request->id_profesional, 'Solicitud Alta Voluntaria');

            if($datos['autorizacion']->estado == 1)
            {
                $solAltaMedica = ConSolAltaMedica::find($id_sol_alta_med);
                if($solAltaMedica)
                {
                    $solAltaMedica->id_log_users_devices = $datos['autorizacion']->registro['id'];
                    $solAltaMedica->confirmacion = 0;
                    if($solAltaMedica->save())
                    {
                        $datos['update_sol_alta']['estado'] = 1;
                        $datos['update_sol_alta']['msj'] = 'actualizado';
                    }
                    else
                    {
                        $datos['update_sol_alta']['estado'] = 0;
                        $datos['update_sol_alta']['msj'] = 'problema al actualizar';
                    }
                }
            }

            $datos['estado'] = 1;
            $datos['msj'] = 'Solicitud de Alta Voluntaria registrada.';
            $datos['last_id'] = $datos['registro']['last_id'];
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Problema al registrar Solicitud de Alta Voluntaria.';
        }

        return $datos;
    }

    static public function registro(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_ficha_atencion))
        {
            $error['id_ficha_atencion'] = 'campo requerido';
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
        // if(empty($request->fecha_hospit))
        // {
        //     $error['fecha_hospit'] = 'campo requerido';
        //     $valido = 0;
        // }
        if(empty($request->diagnostico))
        {
            $error['diagnostico'] = 'campo requerido';
            $valido = 0;
        }
        // if(empty($request->observacion))
        // {
        //     $error['observacion'] = 'campo requerido';
        //     $valido = 0;
        // }
        // if(empty($request->otro))
        // {
        //     $error['otro'] = 'campo requerido';
        //     $valido = 0;
        // }

        if($valido)
        {
            $registro = new ConSolAltaMedica();

            $registro->id_sol = random_int(1, 99999999);
            $registro->id_fc = $request->id_ficha_atencion;
            $registro->id_paciente = $request->id_paciente;
            $registro->id_profesional = $request->id_profesional;
            $registro->num_sol = 1;
            $registro->fecha_sol = date('Y-m-d H:i:s');
            $registro->fecha_hospit = $request->fecha_hospit;
            $registro->diagnostico = $request->diagnostico;
            if(empty($request->observaciones))
                $registro->observaciones_sol_alta = 'MRDO';
            else
                $registro->observaciones_sol_alta = $request->observaciones;
            $registro->otro = $request->otro;
            $registro->id_log_users_devices = '0';
            $registro->confirmacion = '0';

            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'Registro exitoso.';
                $datos['last_id'] = $registro->id;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Problema la momento de registrar.';
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

    static public function solicitudArpobacionPaciente($id_sol_alta, $id_paciente, $id_profesional, $nombre_consentimiento)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($id_sol_alta))
        {
            $error['id_sol_alta'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($id_paciente))
        {
            $error['id_paciente'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($id_profesional))
        {
            $error['id_profesional'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($nombre_consentimiento))
        {
            $error['nombre_consentimiento'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $paciente = Paciente::find($id_paciente);
            $id_usuario_envio_noti = $paciente->id_usuario;

            $datos['id_usuario_envio_noti_1'] = $id_usuario_envio_noti;

            // validar paciente con usuario
            if(empty($id_usuario_envio_noti))
            {
                $registro_dependiente = PacientesDependientes::where('id_paciente', $paciente->id)->first();
                if($registro_dependiente)
                {
                    $paciente_responsable = Paciente::find($registro_dependiente->id_responsable);
                    if($paciente_responsable)
                    {
                        $id_usuario_envio_noti = $paciente_responsable->id_usuario;
                        $datos['id_usuario_envio_noti_2'] = $id_usuario_envio_noti;
                    }
                    else
                    {
                        // paciente responable no encontrado
                        $id_usuario_envio_noti = '';
                        $datos['id_usuario_envio_noti_3'] = $id_usuario_envio_noti;
                    }
                }
                else
                {
                    // no tienen responsable
                    $id_usuario_envio_noti = '';
                    $datos['id_usuario_envio_noti_4'] = $id_usuario_envio_noti;
                }
            }
            $datos['id_usuario_envio_noti_5'] = $id_usuario_envio_noti;

            if(!empty($id_usuario_envio_noti))
            {
                $profesional = Profesional::find($id_profesional);

                if($paciente)
                {
                    /** calculo de periodo de vigencia para aprobacion */
                    $fecha_actual  = date('Y-m-d H:i:s');
                    $fecha_vencimiento  = date ( 'Y-m-d H:i:s' ,strtotime ( '+'.env('TIEMPO_ESPERA_APROBACIO_CONSENTIMIENTO').' minutes' , strtotime ($fecha_actual) ) );
                    $fecha_expira = $fecha_vencimiento;

                    $msj = array(
                        'id_sol_alta' => $id_sol_alta,
                        'nombre_consentimiento' => $nombre_consentimiento,
                        'nombre_paciente' => $paciente->nombres.' '.$paciente->nombres.' '.$paciente->apellido_dos,
                        'nombre_profesional' => $profesional->nombre.' '.$profesional->apellido_uno,
                        'tipo' => 'solicitud alta voluntaria',
                        // 'mensaje' => 'Tiene un Consentimiento Informado {nombre_consentimiento} solicitado por el Dr.() {nombre_profesional} por aprobar'
                    );

                    $log_users_devices = new LogUsersDevices();
                    $log_users_devices->id_user_create = Auth::user()->id; // asistente virtual
                    $log_users_devices->id_user_recept = $id_usuario_envio_noti;
                    $log_users_devices->msg = json_encode($msj);
                    $log_users_devices->tipo = 6; // solicitud alta voluntaria
                    $log_users_devices->token = md5(uniqid());
                    $log_users_devices->estado = 0;
                    $log_users_devices->fecha_ingreso = $fecha_actual;
                    $log_users_devices->fecha_termino = $fecha_vencimiento;
                    $log_users_devices->fecha_exp = $fecha_expira;

                    if($log_users_devices->save())
                    {
                        $datos['estado'] = 1;
                        $datos['msj'] = 'Solicitud Exitosa';
                        $datos['registro'] = array(
                            'id' => $log_users_devices->id,
                            'token' => $log_users_devices->token,
                            'fecha_ingreso' => $log_users_devices->fecha_ingreso,
                            'fecha_termino' => $log_users_devices->fecha_termino,
                            'fecha_exp' => $log_users_devices->fecha_exp,
                        );
                    }
                    else
                    {
                        $datos['estado'] = 0;
                        $datos['msj'] = 'Problema al registrar solicitud';
                    }
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'Paciente no encontrado';
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'No se tiene Usuario a enviar la Solicitud de Autorizacion.';
            }

        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Campo requerido';
            $datos['error'] = $error;
        }
        return (object)$datos;
    }

    public function estado_autorizacion(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_sol_alta))
        {
            $error['id_sol_alta'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->estado))
        {
            $error['estado'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $registro = ConSolAltaMedica::find($request->id_sol_alta);
            if($registro)
            {
                $registro->confirmacion = $request->estado;
                if($registro->save())
                {
                    $datos['estado'] = 1;
                    $datos['msj'] = 'registro actualizado';
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'falla en registro';
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
            $datos['msj'] = 'Campo requerido';
            $datos['error'] = $error;
        }

        return $datos;
    }

    public function pdf_consentimineto(Request $request)
    {
        $datos = array();
        $conSolAltaMedica = ConSolAltaMedica::find($request->id_sol_alta);
        if($conSolAltaMedica->count()>0)
        {
            $ficha_atencion = FichaAtencion::find($request->id_ficha_atencion);
            $lugar_atencion = LugarAtencion::find($ficha_atencion->id_lugar_atencion);
            $profesional = Profesional::find($conSolAltaMedica->id_profesional);
            $paciente = Paciente::find($conSolAltaMedica->id_paciente);

            $token_firma = encrypt( $profesional->rut.'_'.$profesional->email.'_'.$lugar_atencion->id );


            $token_receta = '';
            $temp_token = CertificadoController::certificadoDocumento($request->id_sol_alta, $profesional->id, $paciente->id, 1);
            if($temp_token['estado'] == 1)
            {
                $token_receta = $temp_token['certificado'];
                $url_documento = CertificadoController::generarUrlDocumento($token_receta);
                $qr_documento = GeneradorQrController::generar($url_documento);
            }
            else
            {
                $temp_token = CertificadoController::certificadoDocumento($request->id_sol_alta, rand(111,999), $paciente->id, 1);
                $token_receta = $temp_token['certificado'];
                $url_documento = CertificadoController::generarUrlDocumento($token_receta);
                $qr_documento = GeneradorQrController::generar($url_documento);
            }

            $temp_token = CertificadoController::certificadoProfesional($profesional->id);
            if($temp_token['estado'] == 1)
            {
                $token_profesional = $temp_token['certificado'];
                $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
                $qr_profesional = GeneradorQrController::generar($url_documento);
            }
            else
            {
                $temp_token = CertificadoController::certificadoProfesional(rand(1114,999));
                $token_profesional = $temp_token['certificado'];
                $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
                $qr_profesional = GeneradorQrController::generar($url_documento);
            }


            $consentimiento_sol_alta = array(
                'nombre' => 'Solicitud de Alta Voluntaria',
                'diagnostico' => $conSolAltaMedica->diagnostico,
                'observaciones_sol_alta' => $conSolAltaMedica->observaciones_sol_alta,
                'fecha_sol' => $conSolAltaMedica->fecha_sol,
            );


            $array_ficha_atencion = array(
                'id' => $ficha_atencion->id,
                'created_at' => $ficha_atencion->created_at->format('d/m/Y'),
                'token' => $token_receta,
                'url' => $url_documento,
                'qr' => $qr_documento,
            );
            $array_lugar_atencion = array(
                'id' => $lugar_atencion->id,
                'nombre' => $lugar_atencion->nombre
            );

            $array_profesional = array(
                'id' => $profesional->id,
                'nombre' => $profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos,
                'rut' => $profesional->rut,
                'especialidad' => $profesional->SubTipoEspecialidad()->first()->nombre,
                'token' =>  $token_profesional,
                'url' =>  $url_profesional,
                'qr' =>  $qr_profesional,
            );
            $array_paciente = array(
                'id' => $paciente->id,
                'nombre' => $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos,
                'fecha_nac' => $paciente->fecha_nac,
                'rut' => $paciente->rut,
                'sexo' => $paciente->sexo,
                'direccion' => $paciente->Direccion()->first()->direccion.' '.$paciente->Direccion()->first()->numero_dir.', '.$paciente->Direccion()->first()->Ciudad()->first()->nombre
            );

            $nombre_archivo = mb_strtolower('solicitud_alta_voluntaria');
            $bad = array(" ", "ñ", "á", "é", "í", "ó","ú" );
            $god   = array("_", "n", "a", "e", "i", "o","u" );
            $nombre_archivo = str_replace($god, $bad, $nombre_archivo);

            return  PdfController::generarPDF('Solicitud de Alta Voluntaria', compact('array_ficha_atencion', 'array_lugar_atencion', 'array_profesional', 'array_paciente', 'consentimiento_sol_alta'), $nombre_archivo, 'pdf_consentimiento_sol_alta');
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'No se encontraron Solicitud de Alta Voluntaria';
        }
    }

}
