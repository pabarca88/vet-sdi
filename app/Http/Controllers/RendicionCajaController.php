<?php

namespace App\Http\Controllers;

use App\Models\AdminInstServ;
use App\Models\Asistente;
use App\Models\Bono;
use App\Models\RendicionCaja;
use App\Models\LogUsersDevices;
use App\Models\Profesional;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RendicionCajaController extends Controller
{
    public function rendirCajaDiariaInstitucion(Request $request)
    {
        // tipo_rendicion
        // bonos
        // id_asistente
        // fecha_rendicion
        // total_documentos
        // total_bono
        // total_efectivo
        // total_otros
        // id_asistente_receptor
        // fecha_recepcion
        // codigo_autorizacion
        // observacion
        // otro
        // estado
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->bonos))
        {
            $error['bonos'] = 'Campo requerido';
            $valido = 0;
        }
        if(empty($request->id_asistente_receptor))
        {
            $error['id_asistente_receptor'] = 'Campo requerido';
            $valido = 0;
        }

       

        // if(empty($request->observaciones)){
        //     $error['observaciones'] = 'Campo requerido';
        //     $valido = 0;
        // }

        if($valido)
        {
            $tipo_rendicion = 1; // rendicion caja institucion
            $asistenteRendicion = Asistente::where('id_usuario', Auth::user()->id)->first();
            $fecha_rendicion = date('Y-m-d H:i:s');

            $asistenteReceptor = Asistente::where('id', $request->id_asistente_receptor)->first();
            
            if($asistenteReceptor)
            {
                // $asistenteReceptor = Asistente::where('id', $request->id_asistente_receptor)->first();
            }
            else
            {
                $asistenteReceptor = AdminInstServ::where('id', $request->id_asistente_receptor)->first();
            }


            $bonos = $request->bonos;
            $observaciones = $request->observaciones;

            $total = 0;
            $total_bonos = 0;
            $total_efectivo = 0;
            $total_otros = 0;
            $detalle_bonos = Bono::whereIn('id',explode('|', $bonos))->get();
            if($detalle_bonos)
            {
                $datos['update_bonos'] = array();
                foreach ($detalle_bonos as $key_bono => $value_bono)
                {
                    $bono = Bono::find($value_bono->id);
                    $bono->rendido = 1;// en proceso de rendicion

                    if($bono->save())
                    {
                        $datos['update_bonos'][$bono->id]['estado'] = 1;
                        $datos['update_bonos'][$bono->id]['maj'] = 'registro actualizado';
                    }
                    else
                    {
                        $datos['update_bonos'][$bono->id]['estado'] = 0;
                        $datos['update_bonos'][$bono->id]['maj'] = 'registro NO actualizado';
                    }

                    $total++;
                    // 1->Bono Fisico
                    if($value_bono->id_clase_bono == 1)
                        $total_bonos++;
                    // 2->Sencillito
                    else if($value_bono->id_clase_bono == 2)
                        $total_bonos++;
                    // 3->Caja Vecina
                    else if($value_bono->id_clase_bono == 3)
                        $total_bonos++;
                    // 4->Bono Web
                    else if($value_bono->id_clase_bono == 4)
                        $total_bonos++;
                    // 5->Bono Web Pre-Pago
                    else if($value_bono->id_clase_bono == 5)
                        $total_bonos++;
                    // 6->Particular
                    else if($value_bono->id_clase_bono == 6)
                        $total_efectivo += $value_bono->valor_atencion;
                    else
                        $total_otros++;
                }
            }

            $rendicionCaja = new RendicionCaja();

            $rendicionCaja->tipo_rendicion = $tipo_rendicion;

            $rendicionCaja->bonos = $bonos;

            $rendicionCaja->id_asistente = $asistenteRendicion->id;
            $rendicionCaja->fecha_rendicion = $fecha_rendicion;

            $rendicionCaja->total_documentos = $total;
            $rendicionCaja->total_bono = $total_bonos;
            $rendicionCaja->total_efectivo = $total_efectivo;
            $rendicionCaja->total_otros = $total_otros;

            $rendicionCaja->id_asistente_receptor = $asistenteReceptor->id;
            $rendicionCaja->id_profesional_receptor = 3;
            $rendicionCaja->fecha_recepcion = Carbon::now()->format('Y-m-d H:i:s');
            $rendicionCaja->codigo_autorizacion = '';
            $rendicionCaja->observacion = $observaciones;
            $rendicionCaja->otro = '';
            $rendicionCaja->estado = 0;

            if($rendicionCaja->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'Registro de Rendicion';
                $datos['last_id'] = $rendicionCaja->id;


                /** MANEJO DE ARCHIVOS */
                $archivos = json_decode($request->archivos);
                $info_archivos = '';
                $resulto_img = [];
                if($archivos)
                {
                    foreach ($archivos as $key => $value)
                    {
                        // [0] = url
                        // [1] = nombre_original
                        // [2] = nombre_archivo
                        // [3] = file_extension
                        $nombre_temp = $value[2];
                        $file_extension = $value[3];


                        $nombre_final = 'rendicion_'.$rendicionCaja->id.'_'.date('YmdHis').'_'.uniqid().'.'.$file_extension;
                        $resulto_img[$key] = CargaArchivoController::moverArchivo($nombre_temp, 'archivo_archivo', $nombre_final);

                        $info_archivos .= $nombre_final.'|';
                    }

                    if(!empty($info_archivos))
                    {
                        $info_archivos = substr($info_archivos, 0, -1);
                        $rendicionCaja->archivos = $info_archivos;
                        if($rendicionCaja->save())
                        {
                            $datos['rendicion_archivo']['estado'] = 1;
                            $datos['rendicion_archivo']['msj'] = 'archivo registrado';
                        }
                        else
                        {
                            $datos['rendicion_archivo']['estado'] = 0;
                            $datos['rendicion_archivo']['msj'] = 'falla en registro de archivo';
                        }
                    }
                    else
                    {
                        $datos['rendicion_archivo']['estado'] = 0;
                        $datos['rendicion_archivo']['msj'] = 'problema en lectura de archivos';
                    }
                }
                else
                {
                    $datos['rendicion_archivo']['estado'] = 1;
                    $datos['rendicion_archivo']['msj'] = 'sin archivos a registrar';
                }


                $registro = RendicionCaja::where('id', $rendicionCaja->id)
                    ->with(['Asistente' => function($query){
                        $query->select('id','nombres','apellido_uno','apellido_dos');
                    }])
                    // ->with(['AsistenteReceptor' => function($query){
                    //     $query->select('id','nombres','apellido_uno','apellido_dos');
                    // }])
                    ->first();

                /** informacion de asistente o admin_inst_serv */
                $registro_receptor = Asistente::where('id', $registro->id_asistente_receptor)->first();
                if($registro_receptor)
                {
                    $registro->asistente_receptor = $registro_receptor;
                }
                else
                {
                    $registro_receptor = AdminInstServ::where('id', $registro->id_asistente_receptor)->first();
                    $registro->asistente_receptor = $registro_receptor;
                }
                $datos['registro'] = $registro;

                /** SOLICITAR AUTORIZACION POR APP */
                $msj = array(
                    'id' => $rendicionCaja->id,
                    'nombre' => $asistenteRendicion->nombres.' '.$asistenteRendicion->apellido_uno.' '.$asistenteRendicion->apellido_dos,
                    'fecha' => $fecha_rendicion,
                    'tipo' => 'rendicion',
                    // 'mensaje' => 'Recibe conforme Rendición de Caja N°{id_rendicion} de la Asistente {nombre_asistente} de fecha {fecha_rendicion}'
                );

                /** calculo de periodo de vigencia para aprobacion */
                $fecha_actual  = date('Y-m-d H:i:s');
                $fecha_vencimiento  = date ( 'Y-m-d H:i:s' ,strtotime ( '+'.env('TIEMPO_ESPERA').' minute' , strtotime ($fecha_actual) ) );

                $log_users_devices = new LogUsersDevices();
                $log_users_devices->id_user_create = $asistenteRendicion->id_usuario;
                if($asistenteReceptor->id_usuario)
                    $log_users_devices->id_user_recept = $asistenteReceptor->id_usuario;
                else
                    $log_users_devices->id_user_recept = $asistenteReceptor->id_admin;
                $log_users_devices->msg = json_encode($msj);
                $log_users_devices->estado = 0;
                $log_users_devices->fecha_ingreso = $fecha_actual;
                $log_users_devices->fecha_termino = $fecha_vencimiento;
                $log_users_devices->tipo = 1; // rendicion

                if($log_users_devices->save())
                {
                    $datos['autorizacion']['estado'] = 1;
                    $datos['autorizacion']['msj'] = 'Solicitud de aprobacion enviada';
                    $datos['autorizacion']['fecha_inicio'] = $fecha_actual;
                    $datos['autorizacion']['fecha_termino'] = $fecha_vencimiento;
                    $datos['autorizacion']['tiempo'] = 10;
                    $datos['autorizacion']['last_id'] = $log_users_devices->id;

                    $rendicionCaja->id_log_users_devices = $log_users_devices->id;
                    $rendicionCaja->estado = 1;
                    if($rendicionCaja->save())
                    {
                        $datos['update_log_users_devices']['estado'] = 1;
                        $datos['update_log_users_devices']['msj'] = 'Registro de id_log_users_devices';
                    }
                    else
                    {
                        $datos['update_log_users_devices']['estado'] = 1;
                        $datos['update_log_users_devices']['msj'] = 'Falla registro de id_log_users_devices';
                    }
                }
                else
                {
                    $datos['autorizacion']['estado'] = 0;
                    $datos['autorizacion']['msj'] = 'Solicitud de aprobacion con falla';
                }
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

    public function rendirCajaDiariaInstitucionProf(Request $request)
    {
        // tipo_rendicion
        // bonos
        // id_asistente
        // fecha_rendicion
        // total_documentos
        // total_bono
        // total_efectivo
        // total_otros
        // id_asistente_receptor
        // fecha_recepcion
        // codigo_autorizacion
        // observacion
        // otro
        // estado
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->bonos))
        {
            $error['bonos'] = 'Campo requerido';
            $valido = 0;
        }
        if(empty($request->id_asistente_receptor))
        {
            $error['id_asistente_receptor'] = 'Campo requerido';
            $valido = 0;
        }

        if(empty($request->observaciones)){
            // $error['observaciones'] = 'Campo requerido';
            // $valido = 0;
        }

        if($valido)
        {
            $tipo_rendicion = 1; // rendicion caja institucion
            $asistenteRendicion = Asistente::where('id_usuario', Auth::user()->id)->first();
            $fecha_rendicion = date('Y-m-d H:i:s');
            $profesionalReceptor = Profesional::where('id', $request->id_asistente_receptor)->first();
            $bonos = $request->bonos;
            $observaciones = $request->observaciones;

            $total = 0;
            $total_bonos = 0;
            $total_efectivo = 0;
            $total_otros = 0;
            $detalle_bonos = Bono::whereIn('id',explode('|', $bonos))->get();
            if($detalle_bonos)
            {
                $datos['update_bonos'] = array();
                foreach ($detalle_bonos as $key_bono => $value_bono)
                {
                    $bono = Bono::find($value_bono->id);
                    $bono->rendido = 1;// en proceso de rendicion

                    if($bono->save())
                    {
                        $datos['update_bonos'][$bono->id]['estado'] = 1;
                        $datos['update_bonos'][$bono->id]['msj'] = 'registro actualizado';
                    }
                    else
                    {
                        $datos['update_bonos'][$bono->id]['estado'] = 0;
                        $datos['update_bonos'][$bono->id]['msj'] = 'registro NO actualizado';
                    }

                    $total++;
                    // 1->Bono Fisico
                    if($value_bono->id_clase_bono == 1)
                        $total_bonos++;
                    // 2->Sencillito
                    else if($value_bono->id_clase_bono == 2)
                        $total_bonos++;
                    // 3->Caja Vecina
                    else if($value_bono->id_clase_bono == 3)
                        $total_bonos++;
                    // 4->Bono Web
                    else if($value_bono->id_clase_bono == 4)
                        $total_bonos++;
                    // 5->Bono Web Pre-Pago
                    else if($value_bono->id_clase_bono == 5)
                        $total_bonos++;
                    // 6->Particular
                    else if($value_bono->id_clase_bono == 6)
                        $total_efectivo += $value_bono->valor_atencion;
                    else
                        $total_otros++;
                }
            }

            $rendicionCaja = new RendicionCaja();

            $rendicionCaja->tipo_rendicion = $tipo_rendicion;

            $rendicionCaja->bonos = $bonos;

            $rendicionCaja->id_asistente = $asistenteRendicion->id;
            $rendicionCaja->fecha_rendicion = $fecha_rendicion;

            $rendicionCaja->total_documentos = $total;
            $rendicionCaja->total_bono = $total_bonos;
            $rendicionCaja->total_efectivo = $total_efectivo;
            $rendicionCaja->total_otros = $total_otros;

            $rendicionCaja->id_asistente_receptor = null;
            $rendicionCaja->id_profesional_receptor = $profesionalReceptor->id;
            // $rendicionCaja->fecha_recepcion = ;
            $rendicionCaja->codigo_autorizacion = '';
            $rendicionCaja->observacion = $observaciones;
            $rendicionCaja->otro = '';
            $rendicionCaja->estado = 0;

            if($rendicionCaja->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'Registro de Rendicion';
                $datos['last_id'] = $rendicionCaja->id;


                /** MANEJO DE ARCHIVOS */
                $archivos = json_decode($request->archivos);
                $info_archivos = '';
                $resulto_img = [];
                if($archivos)
                {
                    foreach ($archivos as $key => $value)
                    {
                        // [0] = url
                        // [1] = nombre_original
                        // [2] = nombre_archivo
                        // [3] = file_extension
                        $nombre_temp = $value[2];
                        $file_extension = $value[3];


                        $nombre_final = 'rendicion_'.$rendicionCaja->id.'_'.date('YmdHis').'_'.uniqid().'.'.$file_extension;
                        $resulto_img[$key] = CargaArchivoController::moverArchivo($nombre_temp, 'archivo_archivo', $nombre_final);

                        $info_archivos .= $nombre_final.'|';
                    }

                    if(!empty($info_archivos))
                    {
                        $info_archivos = substr($info_archivos, 0, -1);
                        $rendicionCaja->archivos = $info_archivos;
                        if($rendicionCaja->save())
                        {
                            $datos['rendicion_archivo']['estado'] = 1;
                            $datos['rendicion_archivo']['msj'] = 'archivo registrado';
                        }
                        else
                        {
                            $datos['rendicion_archivo']['estado'] = 0;
                            $datos['rendicion_archivo']['msj'] = 'falla en registro de archivo';
                        }
                    }
                    else
                    {
                        $datos['rendicion_archivo']['estado'] = 0;
                        $datos['rendicion_archivo']['msj'] = 'problema en lectura de archivos';
                    }
                }
                else
                {
                    $datos['rendicion_archivo']['estado'] = 1;
                    $datos['rendicion_archivo']['msj'] = 'sin archivos a registrar';
                }


                $registro = RendicionCaja::where('id', $rendicionCaja->id)
                    ->with(['Asistente' => function($query){
                        $query->select('id','nombres','apellido_uno','apellido_dos');
                    }])
                    ->with(['ProfesionalReceptor' => function($query){
                        $query->select('id','nombre','apellido_uno','apellido_dos');
                    }])
                    ->first();

                $datos['registro'] = $registro;

                /** SOLICITAR AUTORIZACION POR APP */
                $msj = array(
                    'id' => $rendicionCaja->id,
                    'nombre' => $asistenteRendicion->nombres.' '.$asistenteRendicion->apellido_uno.' '.$asistenteRendicion->apellido_dos,
                    'fecha' => $fecha_rendicion,
                    'tipo' => 'rendicion',
                    // 'mensaje' => 'Recibe conforme Rendición de Caja N°{id_rendicion} de la Asistente {nombre_asistente} de fecha {fecha_rendicion}'
                );

                /** calculo de periodo de vigencia para aprobacion */
                $fecha_actual  = date('Y-m-d H:i:s');
                $fecha_vencimiento  = date ( 'Y-m-d H:i:s' ,strtotime ( '+'.env('TIEMPO_ESPERA').' minute' , strtotime ($fecha_actual) ) );

                $log_users_devices = new LogUsersDevices();
                $log_users_devices->id_user_create = $asistenteRendicion->id_usuario;
                $log_users_devices->id_user_recept = $profesionalReceptor->id_usuario;
                $log_users_devices->msg = json_encode($msj);
                $log_users_devices->estado = 0;
                $log_users_devices->fecha_ingreso = $fecha_actual;
                $log_users_devices->fecha_termino = $fecha_vencimiento;
                $log_users_devices->tipo = 1; // rendicion

                if($log_users_devices->save())
                {
                    $datos['autorizacion']['estado'] = 1;
                    $datos['autorizacion']['msj'] = 'Solicitud de aprobacion enviada';
                    $datos['autorizacion']['fecha_inicio'] = $fecha_actual;
                    $datos['autorizacion']['fecha_termino'] = $fecha_vencimiento;
                    $datos['autorizacion']['tiempo'] = 10;
                    $datos['autorizacion']['last_id'] = $log_users_devices->id;

                    $rendicionCaja->id_log_users_devices = $log_users_devices->id;
                    $rendicionCaja->estado = 1;
                    if($rendicionCaja->save())
                    {
                        $datos['update_log_users_devices']['estado'] = 1;
                        $datos['update_log_users_devices']['msj'] = 'Registro de id_log_users_devices';
                    }
                    else
                    {
                        $datos['update_log_users_devices']['estado'] = 1;
                        $datos['update_log_users_devices']['msj'] = 'Falla registro de id_log_users_devices';
                    }
                }
                else
                {
                    $datos['autorizacion']['estado'] = 0;
                    $datos['autorizacion']['msj'] = 'Solicitud de aprobacion con falla';
                }
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

    static public function rendirCajaDiariaInstitucionDesistir(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_rendicion))
        {
            $error['id_rendicion'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $registro = RendicionCaja::find($request->id_rendicion);
            $lista_bonos = $registro->bonos;
            $array_bonos = explode('|',$lista_bonos);

            /** liberar bonos */
            foreach ( $array_bonos as $key_bono => $value_bono)
            {
                $bono = Bono::find($value_bono);
                $bono->rendido = 0;// no rendidos

                if($bono->save())
                {
                    $datos['update_bonos'][$bono->id]['estado'] = 1;
                    $datos['update_bonos'][$bono->id]['maj'] = 'registro actualizado';
                }
                else
                {
                    $datos['update_bonos'][$bono->id]['estado'] = 0;
                    $datos['update_bonos'][$bono->id]['maj'] = 'registro NO actualizado';
                }
            }

            /** elimino(cambio estado) rendicion */
            $registro->estado = 4;// DESISTIDA
            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'Solicitud de rendicion desistida';

                $id_log_users_devices_actual = $registro->id_log_users_devices;

                $log_users_devices_registro = LogUsersDevices::find($id_log_users_devices_actual);
                $log_users_devices_registro->estado = 2;
                if($log_users_devices_registro->save())
                {
                    $datos['log_users_devices_update']['estado'] = 1;
                    $datos['log_users_devices_update']['msj'] = 'actualizado';
                }
                else
                {
                    $datos['log_users_devices_update']['estado'] = 0;
                    $datos['log_users_devices_update']['msj'] = 'problema al actualizado';
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Falla al desistir rendicion';
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

    // public function rendirCajaDiariaInstitucionReiniciar(Request $request)
    // {
    //     $datos = array();
    //     $error = array();
    //     $valido = 1;

    //     if(empty($request->id_rendicion))
    //     {
    //         $error['id_rendicion'] = 'campo requerido';
    //         $valido = 0;
    //     }

    //     if($valido)
    //     {
    //         $registro = RendicionCaja::find($request->id_rendicion);
    //         $lista_bonos = $registro->bonos;
    //         $array_bonos = explode('|',$lista_bonos);

    //         /** liberar bonos */
    //         foreach ( $array_bonos as $key_bono => $value_bono)
    //         {
    //             $bono = Bono::find($value_bono);
    //             $bono->rendido = 0;// no rendidos

    //             if($bono->save())
    //             {
    //                 $datos['update_bonos'][$bono->id]['estado'] = 1;
    //                 $datos['update_bonos'][$bono->id]['maj'] = 'registro actualizado';
    //             }
    //             else
    //             {
    //                 $datos['update_bonos'][$bono->id]['estado'] = 0;
    //                 $datos['update_bonos'][$bono->id]['maj'] = 'registro NO actualizado';
    //             }
    //         }

    //         /** elimino(cambio estado) rendicion */
    //         $registro->estado = 4;// DESISTIDA
    //         if($registro->save())
    //         {
    //             $datos['estado'] = 1;
    //             $datos['msj'] = 'Solicitud de rendicion desistida';
    //         }
    //         else
    //         {
    //             $datos['estado'] = 0;
    //             $datos['msj'] = 'Falla al desistir rendicion';
    //         }
    //     }
    //     else
    //     {
    //         $datos['estado'] = 0;
    //         $datos['error'] = $error;
    //     }

    //     return $datos;
    // }

    public function rendirCajaDiariaInstitucionExtenderValidacion(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_rendicion))
        {
            $error['id_rendicion'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $rendicionCaja = RendicionCaja::find($request->id_rendicion);
            $asistenteRendicion = Asistente::where('id', $rendicionCaja->id_asistente)->first();
            $fecha_rendicion = date('Y-m-d H:i:s');
            $asistenteReceptor = Asistente::where('id', $rendicionCaja->id_asistente_receptor)->first();

            /** id LogUsersDevices actual */
            $id_log_users_devices_actual = $rendicionCaja->id_log_users_devices;

            $lista_bonos = $rendicionCaja->bonos;
            $array_bonos = explode('|',$lista_bonos);

            /** SOLICITAR AUTORIZACION POR APP */
            $msj = array(
                'id_rendicion' => $rendicionCaja->id,
                'nombre_asistente' => $asistenteRendicion->nombres.' '.$asistenteRendicion->apellido_uno.' '.$asistenteRendicion->apellido_dos,
                'fecha_rendicion' => $fecha_rendicion,
                'tipo' => 'rendicion',
                // 'mensaje' => 'Recibe conforme Rendición de Caja N°{id_rendicion} de la Asistente {nombre_asistente} de fecha {fecha_rendicion}'
            );

            /** calculo de periodo de vigencia para aprobacion */
            $fecha_actual  = date('Y-m-d H:i:s');
            $datos['TIEMPO_ESPERA'] = env('TIEMPO_ESPERA');
            $fecha_vencimiento  = date ( 'Y-m-d H:i:s' ,strtotime ( '+'.env('TIEMPO_ESPERA').' minute' , strtotime ($fecha_actual) ) );

            $log_users_devices = new LogUsersDevices();
            $log_users_devices->id_user_create = $asistenteRendicion->id_usuario;
            $log_users_devices->id_user_recept = $asistenteReceptor->id_usuario;
            $log_users_devices->msg = json_encode($msj);
            $log_users_devices->estado = 0;
            $log_users_devices->fecha_ingreso = $fecha_actual;
            $log_users_devices->fecha_termino = $fecha_vencimiento;
            $log_users_devices->tipo = 1; // rendicion

            if($log_users_devices->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'renovacion de autorizacion realizada';

                $datos['autorizacion']['estado'] = 1;
                $datos['autorizacion']['msj'] = 'Solicitud de aprobacion enviada';
                $datos['autorizacion']['fecha_inicio'] = $fecha_actual;
                $datos['autorizacion']['fecha_termino'] = $fecha_vencimiento;
                $datos['autorizacion']['tiempo'] = env('TIEMPO_ESPERA');
                $datos['autorizacion']['last_id'] = $log_users_devices->id;

                $rendicionCaja->id_log_users_devices = $log_users_devices->id;
                $rendicionCaja->estado = 1;
                if($rendicionCaja->save())
                {
                    $datos['update_log_users_devices']['estado'] = 1;
                    $datos['update_log_users_devices']['msj'] = 'Registro de id_log_users_devices';

                    $log_users_devices_registro = LogUsersDevices::find($id_log_users_devices_actual);
                    $log_users_devices_registro->estado = 2;
                    if($log_users_devices_registro->save())
                    {
                        $datos['log_users_devices_update']['estado'] = 1;
                        $datos['log_users_devices_update']['msj'] = 'actualizado';
                    }
                    else
                    {
                        $datos['log_users_devices_update']['estado'] = 0;
                        $datos['log_users_devices_update']['msj'] = 'problema al actualizado';
                    }
                }
                else
                {
                    $datos['update_log_users_devices']['estado'] = 1;
                    $datos['update_log_users_devices']['msj'] = 'Falla registro de id_log_users_devices';
                }
            }
            else
            {
                $datos['autorizacion']['estado'] = 0;
                $datos['autorizacion']['msj'] = 'Falla al renovar autorizacion';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['error'] = $error;
        }

        return $datos;
    }

    public function rendirCajaDiariaInstitucionValidarAutorizacion(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_rendicion))
        {
            $error['id_rendicion'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $rendicionCaja = RendicionCaja::find($request->id_rendicion);
            if($rendicionCaja)
            {
                $log_users_devices = LogUsersDevices::select('id', 'estado')->find($rendicionCaja->id_log_users_devices);
                if($log_users_devices)
                {
                    $datos['estado'] = 1;
                    $datos['registro'] = $log_users_devices;

                    if($log_users_devices->estado == 0)//ESPERA
                    {
                        $rendicionCaja->estado = 1;
                        if($rendicionCaja->save())
                        {
                            $datos['update_rendicion']['estado'] = 1;
                            $datos['update_rendicion']['msj'] = 'Rendicion Actualizada en Espera';
                        }
                        else
                        {
                            $datos['update_rendicion']['estado'] = 0;
                            $datos['update_rendicion']['msj'] = 'Falla Actualizando Rendicion en Espera';
                        }
                    }
                    if($log_users_devices->estado == 1)//VALIDO
                    {
                        $rendicionCaja->estado = 2;
                        if($rendicionCaja->save())
                        {
                            $datos['update_rendicion']['estado'] = 1;
                            $datos['update_rendicion']['msj'] = 'Rendicion Actualizada valida';
                        }
                        else
                        {
                            $datos['update_rendicion']['estado'] = 0;
                            $datos['update_rendicion']['msj'] = 'Falla Actualizando Rendicion valida';
                        }
                    }
                    if($log_users_devices->estado == 2)//VENCIDO
                    {
                        $requestDesistir = new Request(array(
                            'id_rendicion' => $rendicionCaja->id,
                        ));
                        $result_desistida = static::rendirCajaDiariaInstitucionDesistir($requestDesistir);
                        $datos['result_vencida'] = $result_desistida;
                    }
                    if($log_users_devices->estado == 3)//RECHAZADO
                    {
                        $requestDesistir = new Request(array(
                            'id_rendicion' => $rendicionCaja->id,
                        ));
                        $result_desistida = static::rendirCajaDiariaInstitucionDesistir($requestDesistir);
                        $datos['result_rechazada'] = $result_desistida;
                    }

                }
                else
                {
                    $datos['estado'] = 1;
                    $datos['msj'] = 'Autorizacion Administrada por FRANCISCO';
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Rendicion no encontrada';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['error'] = $error;
        }

        return $datos;
    }
}
