<?php

namespace App\Http\Controllers;

use App\Helpers\Funciones;
use App\Models\Bono;
use App\Models\FichaAtencion;
use App\Models\HoraMedica;
use App\Models\LugarAtencion;
use App\Models\Orden;
use App\Models\OrdenDetalle;
use App\Models\Paciente;
use App\Models\Prevision;
use App\Models\Profesional;
use App\Models\TipoBono;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class VentaBonoController extends Controller
{

    public function __construct() {
    }

    public function solicitarAutorizacionPaciente(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if($valido)
        {
            $paciente = Paciente::find($request->id_paciente);
            if(!empty($paciente->id_usuario))
            {
                $profesional = Profesional::find($request->id_profesional);
                $lugar_atencion = LugarAtencion::find($request->id_lugar_atencion);

                $funciones = new Funciones();
                $id_user_create = Auth::user()->id;
                $id_user_recept = $paciente->id_usuario;
                $evento = 'Permiso venta Bono';
                $nombre = $paciente->nombres;
                $apellido_p = $paciente->apellido_uno;
                $apellido_m = $paciente->apellido_dos;
                $lugar = $lugar_atencion->nombre;
                $profesional = $profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos;
                $tipo = 'Check SDI';
                $tipo_id = '13';

                $result_solicitud = $funciones->generatePermApp($id_user_create,$id_user_recept,$evento,$nombre,$apellido_p,$apellido_m,$lugar,$profesional,$tipo,$tipo_id);

                if($result_solicitud['app']['estado'] == 1)
                {
                    $datos['estado'] = 1;
                    $datos['msj'] = 'Solicitud enviada';
                    $datos['registro'] = $result_solicitud['app'];
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'Solicitud no enviada';
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'El paciente no posee usuario para notificar';
                $datos['error'] = 'El paciente no posee usuario para notificar';
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

        // $datos['token__'] = $request->token;

        if($valido)
        {
            $funciones = new Funciones();
            $registro = $funciones->checkStatePermApp($request->token);
            if($registro['estado'] == 1)
            {
                if($registro['registro']['estado'] == 0)
                {
                    $datos['estado'] = 1;
                    $datos['estado_log'] = 0;
                    $datos['msj'] = 'espera';
                    // $datos['registro'] = $registro;
                }
                else if($registro['registro']['estado'] == 1)
                {
                    $datos['estado'] = 1;
                    $datos['estado_log'] = 1;
                    $datos['msj'] = 'aprobado';
                    // $datos['registro'] = $registro;
                }
                else if($registro['registro']['estado'] == 2)
                {
                    $datos['estado'] = 1;
                    $datos['estado_log'] = 2;
                    $datos['msj'] = 'rechazado';
                    // $datos['registro'] = $registro;
                }
                else if($registro['registro']['estado'] == 3)
                {
                    $datos['estado'] = 1;
                    $datos['estado_log'] = 3;
                    $datos['msj'] = 'cancelado';
                    // $datos['registro'] = $registro;
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['estado_log'] = 0;
                    $datos['msj'] = 'no valido';
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'no valido';
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

    function conectarIsapreFonasa(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->rut))
        {
            $error['rut'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->prevision))
        {
            $error['prevision'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'exito';
            $datos['registro'] = array(
                'numero' => random_int(11111,99999),
                'total' => 80000,
                'bonificacion' => 60000,
                'aporte_seguro' => 10000,
                'a_pagar' => 10000,
            );
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'falla';
        }

        return $datos;
    }

    function procesarPagoVenta(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if($valido)
        {
            $orden = new Orden();

            $orden->id_lugar_atencion = $request->id_lugar_atencion;
            $orden->id_hora_medica = $request->id_hora_medica;
            $orden->origen = $request->origen;
            $orden->tipo_movimiento = $request->tipo_movimiento;
            $orden->rut = $request->rut;
            $orden->nombre = $request->nombre;
            $orden->apellido_uno = $request->apellido_uno;
            $orden->apellido_dos = $request->apellido_dos;
            $orden->email = $request->email;
            $orden->monto = $request->monto;
            $orden->estado_orden = $request->estado_orden;
            $orden->fecha_pagado_cap = date('Y-m-d H:i:s');

            if($orden->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'exito';

                $orden_detalle = new OrdenDetalle();
                $orden_detalle->id_orden = $orden->id;
                $orden_detalle->id_lugar_atencion = $request->id_lugar_atencion;
                $orden_detalle->id_hora_medica = $request->id_hora_medica;
                $orden_detalle->nombre = $request->nombre_detalle;
                $orden_detalle->cantidad = $request->cantidad;
                $orden_detalle->unitario = $request->unitario;
                $orden_detalle->descuento = $request->descuento;
                $orden_detalle->total = $request->total;

                if($orden_detalle->save())
                {
                    $datos['detalle']['estado'] = 1;
                    $datos['detalle']['msj'] = 'exito';
                }
                else
                {
                    $datos['detalle']['estado'] = 0;
                    $datos['detalle']['msj'] = 'falla';
                }

                if($request->estado_orden == 'PAGADO')
                {
                    $venta = new VentaBonoController();
                    $datos['bono'] = $venta->recibir_bono($request);
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'falla';
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

    public function recibir_bono(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->convenio))
        {
            $error['convenio'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->numero_bono))
        {
            $error['numero_bono'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->valor_atencion))
        {
            $error['valor_atencion'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->bonificacion))
        {
            $error['bonificacion'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->aporte_seguro))
        {
            $error['aporte_seguro'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->a_pagar))
        {
            $error['a_pagar'] = 'campo requerido';
            $valido = 0;
        }
        // if(empty($request->glosa))
        // {
        //     $error['glosa'] = 'campo requerido';
        //     $valido = 0;
        // }

        if(empty($request->id_profesional))
        {
            $error['id_profesional'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_asistente))
        {
            $error['id_asistente'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_paciente))
        {
            $error['id_paciente'] = 'campo requerido';
            $valido = 0;
        }
        // if(empty($request->id_tipo_bono))
        // {
        //     $error['id_tipo_bono'] = 'campo requerido';
        //     $valido = 0;
        // }
        if(empty($request->id_referencia))
        {
            $error['id_referencia'] = 'campo requerido';
            $valido = 0;
        }
        // if(empty($request->numero_sesiones))
        // {
        //     $error['numero_sesiones'] = 'campo requerido';
        //     $valido = 0;
        // }


        if($valido == 1)
        {
            $enviar_correo = 0;
            /** registro bono */
            $bono = new Bono();
            $bono->convenio = $request->convenio;
            $bono->numero_bono = $request->numero_bono;
            $bono->fecha_atencion = date('Y-m-d H:i:s');
            $bono->valor_atencion = $request->valor_atencion;
            $bono->bonificacion = $request->bonificacion;
            $bono->aporte_seguro = $request->aporte_seguro;
            $bono->a_pagar = $request->a_pagar;
            $bono->glosa = empty($request->glosa)?'0':$request->glosa;
            $bono->rendido = 0;
            $bono->id_profesional = $request->id_profesional;
            $bono->id_asistente = $request->id_asistente;
            $bono->id_paciente = $request->id_paciente;
            $bono->id_clase_bono = $request->id_clase_bono;
            $bono->id_tipo_bono = $request->id_tipo_bono;
            $bono->id_referencia = $request->id_referencia;// id_hora/id_hora_dental/..
            $bono->numero_sesiones = empty($request->numero_sesiones)?'0':$request->numero_sesiones;
            $bono->estado_consulta = 4;

            if($bono->save())
            {
                $datos['bono']['estado'] = 1;
                $datos['bono']['mensaje'] = 'Bonos registrado';
                /** cambio estado hora medica */
                switch ($request->id_tipo_bono) {
                    case  '1': /** hora medica -> Bonos de Consultas Medicas */
                            $hora_medica = HoraMedica::find($request->id_referencia);
                            $hora_medica->id_estado = 4;
                            if($hora_medica->save())
                            {
                                $datos['estado'] = 1;
                                $datos['msj'] = 'Bono registrado';
                                $datos['hora_medica']['estado'] = 1;
                                $datos['hora_medica']['msj'] = 'Hora medica actualizada';
                                $datos['hora_medica']['fecha_consulta'] = $hora_medica->fecha_consulta;
                            }
                            else
                            {
                                $datos['hora_medica']['estado'] = 0;
                                $datos['hora_medica']['msj'] = 'Problema a actualizar hora medica';
                            }

                            /** GENERAR PDF */
                            $info_pdf = $this->generarPdf($bono->id,'G');
                            $nombre_pdf = $info_pdf->pdf;
                            $store_file =  Storage::disk('pdf')->path($nombre_pdf);
                            if($info_pdf->estado == 1)
                            {
                                /** INFORMACION PARA ENVIO DE CORREO */
                                $enviar_correo = 1;
                                $paciente = $hora_medica->Paciente()->first();
                                $profesional = $hora_medica->Profesional()->first();
                                $lugar_atencion = $hora_medica->LugarAtencion()->first();

                                $blade = 'compra_bono';
                                $to = array(
                                        array('email' => $paciente->email,'name' =>  $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos),
                                    );
                                $cc = array();
                                $bcc = array();
                                $asunto = 'MED-SDI - Compra de Bono';

                                $tipo_bono = TipoBono::find($bono->id_tipo_bono);
                                $prevision = Prevision::find($bono->convenio);

                                $body = array(
                                    'nombre_paciente'=> mb_strtoupper($paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos),
                                    'fecha'=> $hora_medica->fecha_evento,
                                    'hora'=> $hora_medica->hora_evento,
                                    'profesional_nombre'=> mb_strtoupper($profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos),
                                    'lugar_atencion'=> mb_strtoupper($lugar_atencion->nombre),
                                    'convenio' => $prevision->nombre,
                                    'numero_bono' => $bono->numero_bono,
                                    'fecha_atencion' => $bono->fecha_atencion,
                                    'valor_atencion' => $bono->valor_atencion,
                                    'bonificacion' => $bono->bonificacion,
                                    'aporte_seguro' => $bono->aporte_seguro,
                                    'a_pagar' => $bono->a_pagar,
                                    'tipo_bono' => $tipo_bono->nombre,

                                );
                                $archivo = array(
                                                array('url'=>$store_file,'mime'=>'application/pdf')
                                            );
                                $id_institucion = '';
                            }
                            else
                            {
                                $enviar_correo = 0;
                            }

                    break;
                    case  '2': /** Bono de Examen */
                        /** code */
                    break;
                    case  '3': /** Bonos de Cirugía */
                        /** code */
                    break;
                    case  '4': /** Bonos Parto Normal */
                        /** code */
                    break;
                    case  '5': /** Bonos de Cesarea */
                        /** code */
                    break;
                    case  '6': /** Bonos de Laboratorio */
                        /** code */
                    break;
                    case  '7': /** Bonos de Radiologia */
                        /** code */
                    break;
                    case  '8': /** Bonos de Fonaudiología */
                        /** code */
                    break;
                    case  '9': /** Bonos de Kinesiología */
                        /** code */
                    break;
                    case '10': /** Bonos de Nutrición */
                        /** code */
                    break;
                    case '11': /** Bonos de Procedimiento */
                        /** code */
                    break;
                }

                if($enviar_correo == 1)
                {
                    /** enviar correo de confirmada */
                    $result_mail =  SendMailController::envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, $id_institucion);
                }

                if($result_mail['estado'])
                {
                    $datos['mail'] = 'Notificacion de cancelacion enviado';
                }
                else
                {
                    $datos['mail'] = 'Falle en envio de Notificacion de cancelada';
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'problema al registrar pago';
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

    public function generarPdf_r(Request $request)
    {
        return static::generarPdf($request->id, 'V');
    }

    static public function generarPdf($id, $funcionalida = 'V')
    {
        $datos = array();

        $registros = Bono::find($id);

        if($registros)
        {
            $paciente = Paciente::find($registros->id_paciente);
            $profesional = Profesional::find($registros->id_profesional);
            $tipo_bono = TipoBono::find($registros->id_tipo_bono);
            $hora = HoraMedica::find($registros->id_referencia);
            $prevision = Prevision::find($registros->convenio);

            // info solicitud
            $array_paciente = array(
                'id' => $paciente->id,
                'nombre' => $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos,
                'fecha_nac' => $paciente->fecha_nac,
                'rut' => $paciente->rut,
                'sexo' => $paciente->sexo,
                'direccion' => $paciente->Direccion()->first()->direccion.' '.$paciente->Direccion()->first()->numero_dir.', '.$paciente->Direccion()->first()->Ciudad()->first()->nombre,
                'email' => $paciente->email,
                'telefono_uno' => $paciente->telefono_uno,
            );
            $array_profesional = array(
                'nombre' => $profesional->nombre,
                'apellido_uno' => $profesional->apellido_uno,
                'apellido_dos' => $profesional->apellido_dos,
            );

            $array_hora = array(
                'id' => $hora->id,
                'fecha_consulta' => $hora->fecha_consulta,
                'hora_inicio' => $hora->hora_inicio,
                'tipo_hora_medica' => $hora->tipo_hora_medica,
            );

            $array = array(
                'id' => $registros->id,
                'convenio' => $registros->convenio,
                'convenio_texto' => $prevision->nombre,
                'numero_bono' => $registros->numero_bono,
                'fecha_atencion' => $registros->fecha_atencion,
                'valor_atencion' => $registros->valor_atencion,
                'bonificacion' => $registros->bonificacion,
                'aporte_seguro' => $registros->aporte_seguro,
                'a_pagar' => $registros->a_pagar,
                'glosa' => $registros->glosa,
                'rendido' => $registros->rendido,
                'id_profesional' => $registros->id_profesional,
                'id_asistente' => $registros->id_asistente,
                'id_paciente' => $registros->id_paciente,
                // 'id_clase_bono' => $registros->id_clase_bono,
                'id_tipo_bono' => $registros->id_tipo_bono,
                'tipo_bono' => $tipo_bono->nombre,
                'id_referencia' => $registros->id_referencia,
                'numero_sesiones' => $registros->numero_sesiones,
                'estado_consulta' => $registros->estado_consulta,
            );

            $rut_temp = str_replace(str_replace($paciente->rut, '.', ''), '-', '');
            $nombre_archivo = strtolower('Venta_Bono_'.$paciente->rut.'_'.rand(1111,9999));

            return  PdfController::generarPDF('VENTA DE BONO', compact( 'array_paciente', 'array_profesional', 'array_hora', 'array'), $nombre_archivo, 'pdf_bono', $funcionalida);

        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'No se encontraron medicamentos';
        }
    }
}


