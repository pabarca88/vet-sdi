<?php

namespace App\Http\Controllers;

use App\Helpers\Funciones;
use App\Models\ConConsentimientos;
use App\Models\ConConsentimientosPcte;
use App\Models\FichaAtencion;
use App\Models\LogUsersDevices;
use App\Models\LugarAtencion;
use App\Models\Paciente;
use App\Models\PacientesDependientes;
use App\Models\Profesional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConsentimientosController extends Controller
{
    public function ver_consentimiento_autocomplete(Request $request)
    {
        $datos = array();
        $filtro = array();
        $response = array();

        if(!empty($request->search))
        {
            $filtro[] = array('nombre', 'like', '%'.$request->search.'%');
        }

        $filtro[] = array('estado', 1);

        $registros = ConConsentimientos::where($filtro)->get();

        foreach ($registros as $registro) {
            $response[] = array("value" => $registro->id, "label" => $registro->nombre);
        }

        return response()->json($response);
    }

    public function cargar_consentimiento(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id))
        {
            $error['id'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $registro = ConConsentimientos::find($request->id);
            if($registro)
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'Registro';
                $datos['registro'] = $registro;
                $datos['profesional'] = Profesional::find($registro->id_profesional);
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Registro no encontrado';
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

    public function registrar(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_consentimiento))
        {
            $error['id_consentimiento'] = 'campo requerido';
            $valido = 0;
        }
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
        if(empty($request->diagnostico_cons))
        {
            $error['diagnostico_cons'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->cirugia_cons))
        {
            $error['cirugia_cons'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->consentimiento))
        {
            $error['consentimiento'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {

            $registro = new ConConsentimientosPcte();

            $registro->id_consent = $request->id_consentimiento;
            $registro->id_fc = $request->id_ficha_atencion;
            $registro->id_paciente = $request->id_paciente;
            $registro->id_profesional = $request->id_profesional;
            $registro->diagnostico_cons = $request->diagnostico_cons;
            $registro->cirugia_cons = $request->cirugia_cons;
            $registro->num_consentimiento = $request->num_consentimiento;
            $registro->fecha_cons = date('Y-m-d');
            $registro->observaciones_con = $request->observaciones_con;
            $registro->revocacion = 0;
            // $registro->fecha_revocacion = $request->
            // $registro->observaciones_rev = $request->
            $registro->otro = $request->otro;
            // $registro->id_log_users_devices = $request->
            // $registro->confirmacion = $request->

            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'Regisrto exitoso.';
                $datos['last_id'] = $registro->id;

                $retorno_autorizacion = static::solicitar_autorizacion_cons($registro->id, $request->id_paciente, $request->id_profesional, $request->consentimiento);
                $datos['solicitud_autorizacion'] = $retorno_autorizacion;

                if($retorno_autorizacion->estado == 1)
                {
                    $registro->id_log_users_devices = $retorno_autorizacion->registro['id'];
                    $registro->confirmacion = 0;
                    if($registro->save())
                    {
                        $datos['update_consPcte']['estado'] = 1;
                        $datos['update_consPcte']['msj'] = 'autorizacion cargada';
                    }
                    else
                    {
                        $datos['update_consPcte']['estado'] = 0;
                        $datos['update_consPcte']['msj'] = 'problemas al cargar autorizacion en consentimiento';
                    }
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Problema en el registro';
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

    static public function solicitar_autorizacion_cons($id_consentimiento, $id_paciente, $id_profesional, $nombre_consentimiento)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($id_consentimiento))
        {
            $error['id_consentimiento'] = 'campo requerido';
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
                        'id_consentimiento_pcte' => $id_consentimiento,
                        'nombre_consentimiento' => $nombre_consentimiento,
                        'nombre_paciente' => $paciente->nombres.' '.$paciente->nombres.' '.$paciente->apellido_dos,
                        'nombre_profesional' => $profesional->nombre.' '.$profesional->apellido_uno,
                        'tipo' => 'consentimiento',
                        // 'mensaje' => 'Tiene un Consentimiento Informado {nombre_consentimiento} solicitado por el Dr.() {nombre_profesional} por aprobar'
                    );

                    $log_users_devices = new LogUsersDevices();
                    $log_users_devices->id_user_create = Auth::user()->id; // asistente virtual
                    $log_users_devices->id_user_recept = $id_usuario_envio_noti;
                    $log_users_devices->msg = json_encode($msj);
                    $log_users_devices->tipo = 4; // Consentimiento
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

        if(empty($request->id_consentimiento))
        {
            $error['id_consentimiento'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->estado))
        {
            $error['estado'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $registro = ConConsentimientosPcte::find($request->id_consentimiento);
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

    public function estado_revocacion(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_consentimiento))
        {
            $error['id_consentimiento'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->estado))
        {
            $error['estado'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $registro = ConConsentimientosPcte::find($request->id_consentimiento);
            if($registro)
            {
                $registro->revocacion = $request->estado;
                $registro->fecha_revocacion = date('Y-m-d H:i:s');
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

    public function consentimiento_paciente(Request $request)
    {
        $datos = array();
        $error = array();
        $filtros = array();
        $valido = 1;

        // if(empty($request->id_paciente))
        // {
        //     $error['id_paciente'] = 'campo requerido';
        //     $valido = 0;
        // }
        if(empty($request->id_lugar_atencion))
        {
            $error['id_lugar_atencion'] = 'campo requerido';
            $valido = 0;
        }
        // if(empty($request->id_profesional))
        // {
        //     $error['id_profesional'] = 'campo requerido';
        //     $valido = 0;
        // }
        // if(empty($request->id_consentimiento))
        // {
        //     $error['id_consentimiento'] = 'campo requerido';
        //     $valido = 0;
        // }
        // if(empty($request->id_ficha_atencion))
        // {
        //     $error['id_ficha_atencion'] = 'campo requerido';
        //     $valido = 0;
        // }

        if($valido)
        {

            if(!empty($request->id_paciente))
            {
                $filtros[] = array('id_paciente', $request->id_paciente);
            }
            // if(!empty($request->id_lugar_atencion))
            // {
            //     $filtros[] = array('id_lugar_atencion', $request->id_lugar_atencion);
            // }
            if(!empty($request->id_profesional))
            {
                $filtros[] = array('id_profesional', $request->id_profesional);
            }
            if(!empty($request->id_consentimiento))
            {
                $filtros[] = array('id_consent', $request->id_consentimiento);
            }
            if(!empty($request->id_ficha_atencion))
            {
                $filtros[] = array('id_fc', $request->id_ficha_atencion);
            }
            if($request->confirmacion != '')
            {
                $filtros[] = array('confirmacion', $request->confirmacion);
            }
            if($request->revocacion != '')
            {
                $filtros[] = array('revocacion', $request->revocacion);
            }

            $profesional = Profesional::find($request->id_profesional);

            $registros = ConConsentimientosPcte::with(['Paciente' => function ($query){
                                                        $query->select('id', 'rut', 'nombres', 'apellido_uno', 'apellido_dos', 'telefono_uno', 'sexo', 'email', 'fecha_nac');
                                                }])
                                                ->with(['Profesional' => function ($query){
                                                        $query->select('id', 'nombre', 'apellido_uno', 'apellido_dos', 'rut', 'email');
                                                }])
                                                ->with(['Consentimiento' => function ($query){
                                                        $query->select('id', 'nombre');
                                                }])
                                                ->with(['LogUsersDevices' => function ($query){
                                                        $query->select( 'id', 'token', 'estado', 'updated_at' );
                                                }])
                                                ->with(['LogUsersDevicesRevocacion' => function ($query){
                                                        $query->select( 'id', 'token', 'estado', 'updated_at' );
                                                }])
                                                ->lugarAtencion($request->id_lugar_atencion)
                                                ->where($filtros)->get();

            if($registros)
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registro actualizado';
                $datos['cantidad'] = $registros->count();
                $datos['registros'] = $registros;
                $datos['profesional'] = $profesional;
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
        $consentimientoPcte = ConConsentimientosPcte::find($request->id_consentimiento);
        if($consentimientoPcte->count()>0)
        {
            $ficha_atencion = FichaAtencion::find($request->id_ficha_atencion);
            $lugar_atencion = LugarAtencion::find($ficha_atencion->id_lugar_atencion);
            $profesional = Profesional::find($consentimientoPcte->id_profesional);
            $paciente = Paciente::find($consentimientoPcte->id_paciente);

            $token_firma = encrypt( $profesional->rut.'_'.$profesional->email.'_'.$lugar_atencion->id );


            $token_receta = '';
            $temp_token = CertificadoController::certificadoDocumento($request->id_consentimiento, $profesional->id, $paciente->id, 1);
            if($temp_token['estado'] == 1)
            {
                $token_receta = $temp_token['certificado'];
                $url_documento = CertificadoController::generarUrlDocumento($token_receta);
                $qr_documento = GeneradorQrController::generar($url_documento);
            }
            else
            {
                $temp_token = CertificadoController::certificadoDocumento($request->id_consentimiento, rand(111,999), $paciente->id, 1);
                $token_receta = $temp_token['certificado'];
                $url_documento = CertificadoController::generarUrlDocumento($token_receta);
                $qr_documento = GeneradorQrController::generar($url_documento);
            }

            $temp_token = CertificadoController::certificadoProfesional($profesional->id,1,1,1);
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


            $consentimiento = ConConsentimientos::find($consentimientoPcte->id_consent);
            $texto_consentimiento = '';

            $texto_consentimiento = $consentimiento->texto;
            $texto_consentimiento = str_replace('{diagnostico}','<span style="font-size: 15px;font-weight: bold;">'.$consentimientoPcte->diagnostico_cons.'</span>', $texto_consentimiento);
            $texto_consentimiento = str_replace('{cirugia}','<span style="font-size: 15px;font-weight: bold;">'.$consentimientoPcte->cirugia_cons.'</span>', $texto_consentimiento);
            $texto_consentimiento = str_replace('{nombre_dependiente}','<span style="font-size: 15px;font-weight: bold;">'.$paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos.'</span>', $texto_consentimiento);



            $array_ficha_atencion = array(
                'id' => $ficha_atencion->id,
                'created_at' => $ficha_atencion->created_at->format('d/m/Y'),
                'token' => $token_receta,
                'url' => $url_documento,
                'qr' => $qr_documento,
            );
             $array_lugar_atencion = array(
                'id' => $lugar_atencion->id,
                'nombre' => $lugar_atencion->nombre,
                'direccion' => $lugar_atencion->Direccion()->first()->direccion.' '.$lugar_atencion->Direccion()->first()->numero_dir.', '.$lugar_atencion->Direccion()->first()->Ciudad()->first()->nombre,
                'region' => $lugar_atencion->Direccion()->first()->Ciudad()->first()->Region()->first()->nombre
            );
            $array_profesional = array(
                'id' => $profesional->id,
                'nombre' => $profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos,
                'rut' => $profesional->rut,
                'especialidad' => $profesional->SubTipoEspecialidad()->first()->nombre,
                'id_especialidad' => $profesional->id_especialidad,
                'num_colegio' => $profesional->num_colegio,
                'direccion' => $profesional->Direccion()->first()->direccion.' '.$profesional->Direccion()->first()->numero_dir.', '.$profesional->Direccion()->first()->Ciudad()->first()->nombre,
                'region' => $profesional->Direccion()->first()->Ciudad()->first()->Region()->first()->nombre,
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

            $nombre_archivo = mb_strtolower('consentimiento_'.$consentimiento->nombre);
            $bad = array(" ", "ñ", "á", "é", "í", "ó","ú" );
            $god   = array("_", "n", "a", "e", "i", "o","u" );
            $nombre_archivo = str_replace($god, $bad, $nombre_archivo);

            return  PdfController::generarPDF('Consentimiento Informado', compact('array_ficha_atencion', 'array_lugar_atencion', 'array_profesional', 'array_paciente', 'texto_consentimiento'), $nombre_archivo, 'pdf_consentimiento');
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'No se encontraron medicamentos';
        }
    }

     public function enviar_consentimineto(Request $request)
    {
       try {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_consentimiento))
        {
            $error['id_consentimiento'] = 'campo requerido';
            $valido = 0;
        }
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

        if($valido)
        {
            $registro = ConConsentimientosPcte::find($request->id_consentimiento);

            $consentimiento = ConConsentimientos::find($registro->id_consent);

            $texto_consentimiento = $consentimiento->texto;
            $texto_consentimiento = str_replace('{diagnostico}','<span style="font-size: 15px;font-weight: bold;">'.$registro->diagnostico_cons.'</span>', $texto_consentimiento);
            $texto_consentimiento = str_replace('{cirugia}','<span style="font-size: 15px;font-weight: bold;">'.$registro->cirugia_cons.'</span>', $texto_consentimiento);
            $texto_consentimiento = str_replace('{nombre_dependiente}','<span style="font-size: 15px;font-weight: bold;">'.$registro->Paciente->nombres.' '.$registro->Paciente->apellido_uno.' '.$registro->Paciente->apellido_dos.'</span>', $texto_consentimiento);

            if($registro)
            {
                // verificar si ya se envio
                if($registro->confirmacion == 0)
                {
                    $datos['estado'] = 1;
                    $datos['msj'] = 'Consentimiento ya enviado.';
                    // notificar por email al paciente
                    $paciente = Paciente::find($registro->id_paciente);
                    $profesional = Profesional::find($registro->id_profesional);
                    $ficha_atencion = FichaAtencion::find($registro->id_fc);
                    $lugar_atencion = LugarAtencion::find($ficha_atencion->id_lugar_atencion);
                    $blade = 'consentimiento_enviado';
                    $to = array(
                            array('email' => $paciente->email,'name' =>  $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos),
                        );
                    $cc = array();
                    $bcc = array();
                    $asunto = 'MED-SDI - Consentimiento Enviado';
                    $body = array(
                        'nombre_paciente'=> $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos,
                        'fecha'=> $registro->created_at->format('d/m/Y'),
                        'hora'=> $registro->created_at->format('H:i'),
                        'profesional_nombre'=> $profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos,
                        'profesional_especialidad'=> $profesional->Especialidad()->first()->nombre,
                        'profesional_tipo_especialidad'=> $profesional->TipoEspecialidad()->first()->nombre,
                        'profesional_sub_tipo_especialidad' => optional($profesional->SubTipoEspecialidad()->first())->nombre ?? null, // Si no existe, no se muestra
                        // 'institucion'=> $nombre_institucion,
                        'lugar_atencion'=> $lugar_atencion->nombre,
                        'direccion'=> $lugar_atencion->Direccion()->first()->direccion.' '.$lugar_atencion->Direccion()->first()->numero_dir.', '.$lugar_atencion->Direccion()->first()->Ciudad()->first()->nombre,
                        'consentimiento_nombre'=> $registro->Consentimiento->nombre,
                        'consentimiento_diagnostico'=> $registro->diagnostico_cons,
                        'texto_consentimiento' => $texto_consentimiento,
                        'id_consentimiento' => $registro->id,
                        'id_ficha_atencion' => $registro->id_fc,
                        'id_paciente' => $registro->id_paciente,
                        'id_profesional' => $registro->id_profesional,
                        'token' => $request->token
                    );
                    $archivo = '';/** pendiente */
                    $id_institucion = '';

                    $result_mail =  SendMailController::envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, $id_institucion);
                    return $result_mail;
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
                else
                {
                    // enviar consentimiento
                    $retorno_autorizacion = static::solicitar_autorizacion_cons($registro->id, $request->id_paciente, $request->id_profesional, $registro->Consentimiento->nombre);
                    if($retorno_autorizacion->estado == 1)
                    {
                        // actualizar consentimiento
                        $registro->id_log_users_devices = $retorno_autorizacion->registro['id'];
                        $registro->confirmacion = 0; // pendiente de autorizacion
                        if($registro->save())
                        {
                            $datos['estado'] = 1;
                            $datos['msj'] = 'Consentimiento enviado exitosamente.';
                            $datos['last_id'] = $registro->id;
                            $datos['solicitud_autorizacion'] = $retorno_autorizacion;
                        }
                        else
                        {
                            $datos['estado'] = 0;
                            $datos['msj'] = 'Problema al actualizar consentimiento.';
                        }
                    }
                    else
                    {
                        // error al solicitar autorizacion
                        $datos['estado'] = 0;
                        $datos['msj'] = 'Problema al solicitar autorizacion.';
                        $datos['error'] = $retorno_autorizacion->msj;
                    }
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Consentimiento no encontrado.';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Campo requerido';
            $datos['error'] = $error;
        }
        return $datos;
       } catch (\Exception $e) {
        //throw $th;
        return response()->json([
            'estado' => 0,
            'msj' => 'Error al enviar consentimiento: '.$e->getMessage(),
            'error' => $e->getMessage()
        ]);
       }

    }

      public function form_consentimiento(Request $request)
    {
        $paciente = Paciente::find($request->id_paciente);
        return view('app.mail.consentimiento_confirmar', [
            'id_consentimiento' => $request->id_consentimiento,
            'id_ficha_atencion' => $request->id_ficha_atencion,
            'id_paciente' => $request->id_paciente,
            'paciente' => $paciente,
            'profesional' => Profesional::find($request->id_profesional),
            'id_profesional' => $request->id_profesional,
            'token' => $request->token,
        ]);
    }

    public function confirmar_consentimiento(Request $request){
        $consentimientoPcte = ConConsentimientosPcte::find($request->id_consentimiento);
        if($consentimientoPcte)
        {
            $consentimientoPcte->confirmacion = 1;
            $log_users_devices = LogUsersDevices::where('token', $request->token)->first();
            if($log_users_devices){
                $log_users_devices->estado = 1; // confirmado
                $log_users_devices->save();
            }
            if($consentimientoPcte->save())
            {
                return redirect()->route('consentimiento.exito');
            }
        }
        return redirect()->route('consentimiento.error');
    }

    public function exito_consentimiento()
    {
        return view('app.mail.consentimiento_exito');
    }

    public function error_consentimiento()
    {
        return view('app.mail.consentimiento_error');
    }

    public function solicitar_autorizacion_revocacion(Request $request)
    {

        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_consentimiento_pcte))
        {
            $error['id_consentimiento_pcte'] = 'campo requerido';
            $valido = 0;
        }
        // if(empty($request->observaciones_rev))
        // {
        //     $error['observaciones_rev'] = 'campo requerido';
        //     $valido = 0;
        // }

        if($valido)
        {

            $consenrimientoPcte = ConConsentimientosPcte::with('Consentimiento')->find($request->id_consentimiento_pcte);

            if($consenrimientoPcte)
            {

                $id_paciente = $consenrimientoPcte->id_paciente;
                $id_profesional = $consenrimientoPcte->id_profesional;

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

                    $consenrimientoPcte->revocacion = 0;
                    if(!empty($request->observaciones_rev))
                        $consenrimientoPcte->observaciones_rev = $request->observaciones_rev;
                    else
                        $consenrimientoPcte->observaciones_rev = 'MRDO';

                    $profesional = Profesional::find($id_profesional);

                    if($paciente)
                    {
                        /** calculo de periodo de vigencia para aprobacion */
                        $fecha_actual  = date('Y-m-d H:i:s');
                        $fecha_vencimiento  = date ( 'Y-m-d H:i:s' ,strtotime ( '+'.env('TIEMPO_ESPERA_APROBACIO_CONSENTIMIENTO').' minutes' , strtotime ($fecha_actual) ) );
                        $fecha_expira = $fecha_vencimiento;

                        $msj = array(
                            'id_consentimiento_pcte' => $consenrimientoPcte->id,
                            'nombre_consentimiento' => $consenrimientoPcte->Consentimiento->nombre,
                            'nombre_paciente' => $paciente->nombres.' '.$paciente->nombres.' '.$paciente->apellido_dos,
                            'nombre_profesional' => $profesional->nombre.' '.$profesional->apellido_uno,
                            'tipo' => 'consentimiento',
                            // 'mensaje' => 'Tiene un Consentimiento Informado {nombre_consentimiento} solicitado por el Dr.() {nombre_profesional} por aprobar'
                        );

                        $log_users_devices = new LogUsersDevices();
                        $log_users_devices->id_user_create = Auth::user()->id; // asistente virtual
                        $log_users_devices->id_user_recept = $id_usuario_envio_noti;
                        $log_users_devices->msg = json_encode($msj);
                        $log_users_devices->tipo = 5; // revocacion de Consentimiento
                        $log_users_devices->token = md5(uniqid());
                        $log_users_devices->estado = 0;
                        $log_users_devices->fecha_ingreso = $fecha_actual;
                        $log_users_devices->fecha_termino = $fecha_vencimiento;
                        $log_users_devices->fecha_exp = $fecha_expira;

                        if($log_users_devices->save())
                        {
                            $datos['estado'] = 1;
                            $datos['msj'] = 'Solicitud Exitosa';
                            $datos['last_id'] = $consenrimientoPcte->id;
                            $datos['registro'] = array(
                                'id' => $log_users_devices->id,
                                'token' => $log_users_devices->token,
                                'fecha_ingreso' => $log_users_devices->fecha_ingreso,
                                'fecha_termino' => $log_users_devices->fecha_termino,
                                'fecha_exp' => $log_users_devices->fecha_exp,
                            );

                            $consenrimientoPcte->id_log_user_devices_revocacion = $log_users_devices->id;

                            if($consenrimientoPcte->save())
                            {
                                $datos['update_consentimiento_pcte']['estado'] = 1;
                                $datos['update_consentimiento_pcte']['msj'] = 'Consentimiento actualizado';
                            }
                            else
                            {
                                $datos['update_consentimiento_pcte']['estado'] = 0;
                                $datos['update_consentimiento_pcte']['msj'] = 'Consentimiento no actualizado';
                            }

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
                $datos['msj'] = 'Consentimiento no encotnrado.';
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

    public function pdf_revocacion(Request $request)
    {
        $datos = array();
        $consentimientoPcte = ConConsentimientosPcte::with('Consentimiento')->find($request->id_consentimiento);
        if($consentimientoPcte->count()>0)
        {
            $ficha_atencion = FichaAtencion::find($request->id_ficha_atencion);
            $lugar_atencion = LugarAtencion::find($ficha_atencion->id_lugar_atencion);
            $profesional = Profesional::find($consentimientoPcte->id_profesional);
            $paciente = Paciente::find($consentimientoPcte->id_paciente);

            $token_firma = encrypt( $profesional->rut.'_'.$profesional->email.'_'.$lugar_atencion->id );


            $token_receta = '';
            $temp_token = CertificadoController::certificadoDocumento($request->id_consentimiento, $profesional->id, $paciente->id, 1);
            if($temp_token['estado'] == 1)
            {
                $token_receta = $temp_token['certificado'];
                $url_documento = CertificadoController::generarUrlDocumento($token_receta);
                $qr_documento = GeneradorQrController::generar($url_documento);
            }
            else
            {
                $temp_token = CertificadoController::certificadoDocumento($request->id_consentimiento, rand(111,999), $paciente->id, 1);
                $token_receta = $temp_token['certificado'];
                $url_documento = CertificadoController::generarUrlDocumento($token_receta);
                $qr_documento = GeneradorQrController::generar($url_documento);
            }

            $temp_token = CertificadoController::certificadoProfesional($profesional->id,1,1,$request->id_ficha_atencion);
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
                'nombre' => $consentimientoPcte->consentimiento->nombre,
                'diagnostico' => $consentimientoPcte->diagnostico_cons,
                'procedimiento' => $consentimientoPcte->cirugia_cons,
                'fecha_revocacion' => $consentimientoPcte->fecha_revocacion,
                'fecha_cons' => $consentimientoPcte->fecha_cons,
                'observacion_rev' => $consentimientoPcte->observaciones_rev,
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

            $nombre_archivo = mb_strtolower('revocacion_consentimiento_'.$consentimientoPcte->consentimiento->nombre);
            $bad = array(" ", "ñ", "á", "é", "í", "ó","ú" );
            $god   = array("_", "n", "a", "e", "i", "o","u" );
            $nombre_archivo = str_replace($god, $bad, $nombre_archivo);

            return  PdfController::generarPDF('Revocacion de Consentimiento Informado', compact('array_ficha_atencion', 'array_lugar_atencion', 'array_profesional', 'array_paciente', 'consentimiento'), $nombre_archivo, 'pdf_consentimiento_revocacion');
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'No se encontraron Consentimiento Informado';
        }
    }
}
