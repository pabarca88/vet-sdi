<?php

namespace App\Http\Controllers;

use App\Models\DocumentoFcPaciente;
use App\Models\Paciente;
use App\Models\Profesional;
use Illuminate\Http\Request;

class DocumentoFcPacienteController extends Controller
{
    public function registrar_enviar(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_tipo_documento))
        {
            $error['id_tipo_documento'] = 'campo requerido';
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
        if(empty($request->id_ficha_atencion))
        {
            $error['id_ficha_atencion'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_lugar_atencion))
        {
            $error['id_lugar_atencion'] = 'campo requerido';
            $valido = 0;
        }

        // if(empty($request->observacion))
        // {
        //     $error['observacion'] = 'campo requerido';
        //     $valido = 0;
        // }

        /** creado (pdf) */
        if($request->id_tipo_documento == 1)
        {
            if(empty($request->documento))
            {
                $error['documento'] = 'campo requerido';
                $valido = 0;
            }
            // if(empty($request->url))
            // {
            //     $error['url'] = 'campo requerido';
            //     $valido = 0;
            // }
        }

        /** documento creado */
        else
        // if($request->id_tipo_documento == 2)
        {
            if(empty($request->cuerpo))
            {
                $error['cuerpo'] = 'campo requerido';
                $valido = 0;
            }
        }
        // if(empty($request->fecha_envio))
        // {
        //     $error['fecha_envio'] = 'campo requerido';
        //     $valido = 0;
        // }
        // if(empty($request->estado_envio))
        // {
        //     $error['estado_envio'] = 'campo requerido';
        //     $valido = 0;
        // }
        // if(empty($request->estado))
        // {
        //     $error['estado'] = 'campo requerido';
        //     $valido = 0;
        // }
        // if(empty($request->otro))
        // {
        //     $error['otro'] = 'campo requerido';
        //     $valido = 0;
        // }

        if($valido)
        {
            $registro = new DocumentoFcPaciente();
            $registro->id_tipo_documento = $request->id_tipo_documento;
            $registro->id_paciente = $request->id_paciente;
            $registro->id_profesional = $request->id_profesional;
            $registro->id_ficha_atencion = $request->id_ficha_atencion;
            $registro->id_lugar_atencion = $request->id_lugar_atencion;
            $registro->documento = $request->documento;
            $registro->url = $request->url;
            $registro->observacion = $request->observacion;
            $registro->cuerpo = $request->cuerpo;
            $registro->fecha_envio = date('Y-m-d H:i:s');
            $registro->estado_envio = 0;
            $registro->estado = 1;
            $registro->otro = $request->otro;

            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registro exitoso';

                $envio_correo  = static::enviarDocumento($registro->id);
                if($envio_correo['estado'] == 1)
                {
                    $registro->fecha_envio = date('Y-m-d H:i:s');
                    $registro->estado_envio = 1;
                }
                else
                {
                    $registro->fecha_envio = date('Y-m-d H:i:s');
                    $registro->estado_envio = 0;
                }

                if($registro->save())
                {
                    $datos['update_correo']['estado'] = 1;
                    $datos['update_correo']['msj'] = 'correo enviado';
                }
                else
                {
                    $datos['update_correo']['estado'] = 0;
                    $datos['update_correo']['msj'] = 'correo no enviado';
                }

            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'falla de registro';
            }
        }
        else
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'campos requeridos';
            $datos['error'] = $error;
        }

        return $datos;
    }

    static public function enviarDocumento_r(Request $request)
    {
        return static::enviarDocumento($request->id_documento_fc_paciente);
    }

    static public function enviarDocumento($id_documento_fc_paciente)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($id_documento_fc_paciente))
        {
            $error['id_documento_fc_paciente'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $registro = DocumentoFcPaciente::find($id_documento_fc_paciente);
            if($registro)
            {
                $paciente = Paciente::find($registro->id_paciente);
                if($paciente)
                {
                    $nombre_pc = $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos;
                    $correo_pc = $paciente->email;

                    $profesional = Profesional::find($registro->id_profesional);
                    $nombre_pf = $profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos;

                    /** envio correo */
                    $blade = 'indicaciones_medicas_documento';
                    $to = array(
                            array('email' => $correo_pc,'name' =>  $nombre_pc),
                        );
                    $cc = array();
                    $bcc = array();
                    $asunto = 'MED-SDI - Indicaciones de su Medico';
                    $body = array(
                        'NOMBRE_PACIENTE' => mb_strtoupper($nombre_pc),
                        'NOMBRE_PROFESIONAL' => mb_strtoupper($nombre_pf)
                    );
                    $archivo = public_path($registro->url);/** ruta relativa */
                    $id_institucion = '';

                    $result_mail =  SendMailController::envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, $id_institucion);
                    if($result_mail['estado'] == 1)
                    {
                        $datos['estado'] = 1;
                        $datos['msj'] = 'correo enviado';
                    }
                    else
                    {
                        $datos['estado'] = 0;
                        $datos['msj'] = 'falle en envio de correo';
                    }
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'registro paciente no encontrado';
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
            $datos['msj'] = 'campos requeridos';
            $datos['error'] = $error;
        }

        return $datos;
    }
}
