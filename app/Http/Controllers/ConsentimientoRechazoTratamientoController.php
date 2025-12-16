<?php

namespace App\Http\Controllers;

use App\Models\ConRechazoTratamiento;
use App\Models\FichaAtencion;
use App\Models\LogUsersDevices;
use App\Models\LugarAtencion;
use App\Models\Paciente;
use App\Models\PacientesDependientes;
use App\Models\Profesional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConsentimientoRechazoTratamientoController extends Controller
{
    public function registro_aprobacion(Request $request)
    {
        $datos = array();

        $datos['registro'] = static::registro($request);
        if($datos['registro']['estado'] == 1)
        {

            $id_rechazo_trtt = $datos['registro']['last_id'];

            $datos['autorizacion'] = static::solicitudArpobacionPaciente($id_rechazo_trtt,$request->id_paciente, $request->id_profesional, 'Rechazo de Tramiento');

            if($datos['autorizacion']->estado == 1)
            {
                $rechazoTratamiento = ConRechazoTratamiento::find($id_rechazo_trtt);
                if($rechazoTratamiento)
                {
                    $rechazoTratamiento->id_log_users_devices = $datos['autorizacion']->registro['id'];
                    $rechazoTratamiento->confirmacion = 0;
                    if($rechazoTratamiento->save())
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
            $datos['msj'] = 'Rechazo de tratamiento.';
            $datos['last_id'] = $datos['registro']['last_id'];
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Problema al registrar Solicitud de Rechazo de tratamiento.';
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
        if(empty($request->diagnostico))
        {
            $error['diagnostico'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->tratamiento))
        {
            $error['tratamiento'] = 'campo requerido';
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
            $registro = new ConRechazoTratamiento();

            $registro->id_sol = random_int(1, 99999999);
            $registro->id_fc = $request->id_ficha_atencion;
            $registro->id_paciente = $request->id_paciente;
            $registro->id_profesional = $request->id_profesional;
            $registro->num_sol = 1;
            $registro->fecha_sol = date('Y-m-d H:i:s');
            $registro->diagnostico = $request->diagnostico;
            $registro->tratamiento = $request->tratamiento;
            if(empty($request->observaciones))
                $registro->observaciones_rech = 'MRDO';
            else
                $registro->observaciones_rech = $request->observaciones;
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

    static public function solicitudArpobacionPaciente($id_rechazo_trtt, $id_paciente, $id_profesional, $nombre_consentimiento)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($id_rechazo_trtt))
        {
            $error['id_rechazo_trtt'] = 'campo requerido';
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
                        'id_rechazo_trtt' => $id_rechazo_trtt,
                        'nombre_consentimiento' => $nombre_consentimiento,
                        'nombre_paciente' => $paciente->nombres.' '.$paciente->nombres.' '.$paciente->apellido_dos,
                        'nombre_profesional' => $profesional->nombre.' '.$profesional->apellido_uno,
                        'tipo' => 'rechazo de tratamiento',
                        // 'mensaje' => 'Tiene un Consentimiento Informado {nombre_consentimiento} solicitado por el Dr.() {nombre_profesional} por aprobar'
                    );

                    $log_users_devices = new LogUsersDevices();
                    $log_users_devices->id_user_create = Auth::user()->id; // asistente virtual
                    $log_users_devices->id_user_recept = $id_usuario_envio_noti;
                    $log_users_devices->msg = json_encode($msj);
                    $log_users_devices->tipo = 7; // rechazo de tratamiento
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

        if(empty($request->id_rechazo_trtt))
        {
            $error['id_rechazo_trtt'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->estado))
        {
            $error['estado'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $registro = ConRechazoTratamiento::find($request->id_rechazo_trtt);
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
        $rechazoTrtt = ConRechazoTratamiento::find($request->id_rechazo_trtt);
        if($rechazoTrtt->count()>0)
        {
            $ficha_atencion = FichaAtencion::find($request->id_ficha_atencion);
            $lugar_atencion = LugarAtencion::find($ficha_atencion->id_lugar_atencion);
            $profesional = Profesional::find($rechazoTrtt->id_profesional);
            $paciente = Paciente::find($rechazoTrtt->id_paciente);

            $token_firma = encrypt( $profesional->rut.'_'.$profesional->email.'_'.$lugar_atencion->id );


            $token_receta = '';
            $temp_token = CertificadoController::certificadoDocumento($request->id_rechazo_trtt, $profesional->id, $paciente->id, 1);
            if($temp_token['estado'] == 1)
            {
                $token_receta = $temp_token['certificado'];
                $url_documento = CertificadoController::generarUrlDocumento($token_receta);
                $qr_documento = GeneradorQrController::generar($url_documento);
            }
            else
            {
                $temp_token = CertificadoController::certificadoDocumento($request->id_rechazo_trtt, rand(111,999), $paciente->id, 1);
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


            $consentimiento = array(
                'nombre' => 'Rechazo de tratamiento',
                'diagnostico' => $rechazoTrtt->diagnostico,
                'tratamiento' => $rechazoTrtt->tratamiento,
                'observaciones_rech' => $rechazoTrtt->observaciones_rech,
                'fecha_sol' => $rechazoTrtt->fecha_sol,
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

            $nombre_archivo = mb_strtolower('rechazo_de_tratamiento');
            $bad = array(" ", "ñ", "á", "é", "í", "ó","ú" );
            $god   = array("_", "n", "a", "e", "i", "o","u" );
            $nombre_archivo = str_replace($god, $bad, $nombre_archivo);

            return  PdfController::generarPDF('Rechazo voluntario de tratamiento médico, procedimientos y/o cirugia', compact('array_ficha_atencion', 'array_lugar_atencion', 'array_profesional', 'array_paciente', 'consentimiento'), $nombre_archivo, 'pdf_consentimiento_rechazo_trtt');
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'No se encontraron Rechazo de Tratamiento';
        }
    }
}
