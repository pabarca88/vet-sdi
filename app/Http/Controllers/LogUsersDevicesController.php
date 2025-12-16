<?php

namespace App\Http\Controllers;

use App\Models\LogLogUsersDevices;
use App\Models\LogUsersDevices;
use App\Helpers\Funciones;
use Illuminate\Http\Request;

class LogUsersDevicesController extends Controller
{
    public function verRegistros(Request $request)
    {
        $datos = array();
        $cant_x_pagina = 10;
        $filtros = array();

        if(!empty($request->id))
            $filtros[] = array('id',$request->id);
        if(!empty($request->id_user_create))
            $filtros[] = array('id_user_create',$request->id_user_create);
        if(!empty($request->id_user_recept))
            $filtros[] = array('id_user_recept',$request->id_user_recept);
        if(!empty($request->msg))
            $filtros[] = array('msg',$request->msg);
        if(!empty($request->tipo))
            $filtros[] = array('tipo',$request->tipo);
        if($request->estado!='')
            $filtros[] = array('estado',$request->estado);
        if(!empty($request->fecha_ingreso))
            $filtros[] = array('fecha_ingreso',$request->fecha_ingreso);
        if(!empty($request->fecha_termino))
            $filtros[] = array('fecha_termino',$request->fecha_termino);


        /* CANTIDAD REGISTROS X PAG */
        $cant_reg = LogUsersDevices::where($filtros)->count();

        if($cant_reg >0){
            $datos['estado'] = 1;
            $datos['cantidad_registros'] = $cant_reg;
            $datos['request'] = $request->all();

            // Generamos la consulta
            $registros = LogUsersDevices::where($filtros)->orderBy('id', 'DESC')->get();

             foreach($registros as $key => $value)
             {
                $msg_html_estructura = '';

                switch($value['tipo'])
                {
                    case 1: // rendicion
                        $data = json_decode($value['msg'],false);
                        $id = $data->id;
                        $nombre = $data->nombre;
                        $fecha = $data->fecha;
                        /** peticion */
                        $value['msg_estado'] = "<span class='color-azul txt_bold'>{$data->nombre}</span> - Rendición de Caja <span class='color-azul txt_bold'>N°{$id}</span>";

                        /** resultado */
                        switch($value['estado'])
                        {
                            case 1:
                                $value['msg_body'] = "<span class='color-azul txt_bold'>{$data->nombre}</span> - Rendición de Caja <span class='color-azul txt_bold'>N°{$id}</span>";
                            break;
                            case 2:
                                $value['msg_body'] = "<span class='color-azul txt_bold'>{$data->nombre}</span> - Rendición de Caja <span class='color-azul txt_bold'>N°{$id}</span>";
                            break;
                            case 3:
                                $value['msg_body'] = "<span class='color-azul txt_bold'>{$data->nombre}</span> - Rendición de Caja <span class='color-azul txt_bold'>N°{$id}</span>";
                            break;
                            case 4:
                                $value['msg_body'] = "<span class='color-azul txt_bold'>{$data->nombre}</span> - Rendición de Caja <span class='color-azul txt_bold'>N°{$id}</span>";
                            break;
                        }


                        /** lista log */
                        switch($value['estado'])
                        {
                            case 1:
                                $msg_html_estructura = "<p><span class='color-verde txt_bold'>Solicitud Autorizada</span> Rendición de Caja N°{$id} de la Asistente <span class='color-azul txt_bold'>{$nombre}</span> de fecha {$fecha}</p><br>";
                            break;
                            case 2:
                                $msg_html_estructura = "<p><span class='color-rojo txt_bold'>Solicitud Rechazada</span> Rendición de Caja N°{$id} de la Asistente <span class='color-azul txt_bold'>{$nombre}</span> de fecha {$fecha}</p><br>";
                            break;
                            case 3:
                                $msg_html_estructura = "<p><span class='color-rojo txt_bold'>Solicitud Cancelada</span> Rendición de Caja N°{$id} de la Asistente <span class='color-azul txt_bold'>{$nombre}</span> de fecha {$fecha}</p><br>";
                            break;
                            case 4:
                                $msg_html_estructura = "<p><span class='color-verde txt_bold'>Solicitud Autorizada <span class='color-rojo txt_bold'>Expirada</span></span> Rendición de Caja N°{$id} de la Asistente <span class='color-azul txt_bold'>{$nombre}</span> de fecha {$fecha}</p><br>";
                            break;
                        }


                    break;

                    case 2: // ficha única
                        $data = json_decode($value['msg'],false);
                        $id = $data->id;
                        $nombre = $data->nombre;
                        $fecha = $data->fecha;
                        /** peticion */
                        $value['msg_estado'] = "El Profesional <span class='color-azul txt_bold'>{$nombre}</span> esta solicitando ver su ficha unica con fecha <span class='color-azul txt_bold'>{$fecha}</span>";

                        /** resultado */
                        switch($value['estado'])
                        {
                            case 1:
                                $value['msg_body'] = "El Profesional <span class='color-azul txt_bold'>{$nombre}</span> esta solicitando ver su ficha unica con fecha <span class='color-azul txt_bold'>{$fecha}</span>";
                            break;
                            case 2:
                                $value['msg_body'] = "El Profesional <span class='color-azul txt_bold'>{$nombre}</span> esta solicitando ver su ficha unica con fecha <span class='color-azul txt_bold'>{$fecha}</span>";
                            break;
                            case 3:
                                $value['msg_body'] = "El Profesional <span class='color-azul txt_bold'>{$nombre}</span> esta solicitando ver su ficha unica con fecha <span class='color-azul txt_bold'>{$fecha}</span>";
                            break;
                            case 4:
                                $value['msg_body'] = "El Profesional <span class='color-azul txt_bold'>{$nombre}</span> esta solicitando ver su ficha unica con fecha <span class='color-azul txt_bold'>{$fecha}</span>";
                            break;
                        }

                        /** lista log */
                        switch($value['estado'])
                        {
                            case 1:
                                $msg_html_estructura = "<p><span class='color-verde txt_bold'>Solicitud Autorizada</span> El Profesional {$nombre} esta solicitando ver su ficha unica con fecha {$fecha}</p><br>";
                            break;
                            case 2:
                                $msg_html_estructura = "<p><span class='color-rojo txt_bold'>Solicitud Rechazada</span> El Profesional {$nombre} esta solicitando ver su ficha unica con fecha {$fecha}</p><br>";
                            break;
                            case 3:
                                $msg_html_estructura = "<p><span class='color-rojo txt_bold'>Solicitud Cancelada</span> El Profesional {$nombre} esta solicitando ver su ficha unica con fecha {$fecha}</p><br>";
                            break;
                            case 4:
                                $msg_html_estructura = "<p><span class='color-verde txt_bold'>Solicitud Autorizada <span class='color-rojo txt_bold'>Expirada</span></span> El Profesional {$nombre} esta solicitando ver su ficha unica con fecha {$fecha}</p><br>";
                            break;
                        }


                    break;

                    case 3: // reserva de hora
                        $data = json_decode($value['msg'],false);
                        $id = $data->id;
                        $nombre = $data->nombre;
                        $evento = $data->evento;
                        $fecha = $data->fecha;
                        $hora = $data->hora;
                        $lugar_atencion = $data->lugar_atencion;
                        $profesional = $data->profesional;

                        /** peticion */
                        $value['msg_estado'] = "Usted tiene una Reserva <span class='color-azul txt_bold'>{$evento}</span> por Confirmar, con el Dr. {$profesional}, en <span class='color-azul txt_bold'>{$lugar_atencion}</span> en fecha <span class='color-azul txt_bold'>{$fecha} {$hora}</span>";

                        /** resultado */
                        switch($value['estado'])
                        {
                            case 1:
                                $value['msg_body'] = "Usted ha Confirmado la Reserva <span class='color-azul txt_bold'>{$evento}</span>, con el Dr. {$profesional}, en <span class='color-azul txt_bold'>{$lugar_atencion}</span> en fecha <span class='color-azul txt_bold'>{$fecha} {$hora}</span>";
                            break;
                            case 2:
                                $value['msg_body'] = "Usted ha Rechazado la Reserva <span class='color-azul txt_bold'>{$evento}</span>, con el Dr. {$profesional}, en <span class='color-azul txt_bold'>{$lugar_atencion}</span> en fecha <span class='color-azul txt_bold'>{$fecha} {$hora}</span>";
                            break;
                            case 3:
                                $value['msg_body'] = "Se ha cancelado la Reserva <span class='color-azul txt_bold'>{$evento}</span>, con el Dr. {$profesional}, en <span class='color-azul txt_bold'>{$lugar_atencion}</span> en fecha <span class='color-azul txt_bold'>{$fecha} {$hora}</span>";
                            break;
                            case 4:
                                $value['msg_body'] = "Usted ha Confirmado la Reserva <span class='color-azul txt_bold'>{$evento}</span>, con el Dr. {$profesional}, en <span class='color-azul txt_bold'>{$lugar_atencion}</span> en fecha <span class='color-azul txt_bold'>{$fecha} {$hora}</span>";
                            break;
                        }


                        /** lista log */
                        switch($value['estado'])
                        {
                            case 1:
                                $msg_html_estructura = "<p><span class='color-verde txt_bold'>Reserva Confirmada</span> Reserva de {$evento} para el día <span class='color-azul txt_bold'>{$fecha} {$hora}</span></p><br>";
                            break;
                            case 2:
                                $msg_html_estructura = "<p><span class='color-rojo txt_bold'>Reserva Rechazada</span> Reserva de {$evento} para el día <span class='color-azul txt_bold'>{$fecha} {$hora}</span></p><br>";
                            break;
                            case 3:
                                $msg_html_estructura = "<p><span class='color-rojo txt_bold'>Reserva Cancelada</span> Reserva de {$evento} para el día <span class='color-azul txt_bold'>{$fecha} {$hora}</span></p><br>";
                            break;
                            case 4:
                                $msg_html_estructura = "<p><span class='color-verde txt_bold'>Reserva Confirmada <span class='color-rojo txt_bold'>Expirada</span></span> Reserva de {$evento} para el día <span class='color-azul txt_bold'>{$fecha} {$hora}</span></p><br>";
                            break;
                        }

                    break;

                    case 4: // consentimiento informado
                        $data = json_decode($value['msg'],false);
                        $id = $data->id_consentimiento_pcte;
                        $consentimiento = $data->nombre_consentimiento;
                        $paciente = $data->nombre_paciente;
                        $profesional = $data->nombre_profesional;
                        $tipo = $data->tipo;

                        /** peticion */
                        $value['msg_estado'] = "Tiene pendiente confirmar un Consentimiento <span class='color-azul txt_bold'>{$consentimiento}</span>, para el Dr. {$profesional}. Puede leerlo en su escritorio de Paciente o email.";

                        /** resultado */
                        switch($value['estado'])
                        {
                            case 1:
                                $value['msg_body'] = "Usted ha Autorizado el Consentimiento <span class='color-azul txt_bold'>{$consentimiento}</span>, para el Dr. {$profesional}.";
                            break;
                            case 2:
                                $value['msg_body'] = "Usted ha Rechazado el Consentimiento <span class='color-azul txt_bold'>{$consentimiento}</span>, para el Dr. {$profesional}.";
                            break;
                            case 3:
                                $value['msg_body'] = "Se ha cancelado la solicitud de Consentimiento <span class='color-azul txt_bold'>{$consentimiento}</span>, para el Dr. {$profesional}. Por sobrepasar el tiempo de aprobación.";
                            break;
                            case 4:
                                $value['msg_body'] = "Usted ha Autorizado el Consentimiento <span class='color-azul txt_bold'>{$consentimiento}</span>, para el Dr. {$profesional}.";
                            break;
                        }


                        /** lista log */
                        switch($value['estado'])
                        {
                            case 1:
                                $msg_html_estructura = "<p><span class='color-verde txt_bold'>Consentimiento Autorizado</span> Consentimiento de {$consentimiento}</p><br>";
                            break;
                            case 2:
                                $msg_html_estructura = "<p><span class='color-rojo txt_bold'>Consentimiento Rechazada</span> Consentimiento de {$consentimiento}</p><br>";
                            break;
                            case 3:
                                $msg_html_estructura = "<p><span class='color-rojo txt_bold'>Consentimiento Cancelada</span> Consentimiento de {$consentimiento}</p><br>";
                            break;
                            case 4:
                                $msg_html_estructura = "<p><span class='color-verde txt_bold'>Consentimiento Autorizado <span class='color-rojo txt_bold'>Expirada</span></span> Consentimiento de {$consentimiento}</p><br>";
                            break;
                        }


                    break;

                    case 5: // revocacion de consentimiento informado
                        $data = json_decode($value['msg'],false);
                        $id = $data->id_consentimiento_pcte;
                        $consentimiento = $data->nombre_consentimiento;
                        $paciente = $data->nombre_paciente;
                        $profesional = $data->nombre_profesional;
                        $tipo = $data->tipo;

                        /** peticion */
                        $value['msg_estado'] = "Tiene pendiente confirmar una Revocacionde Consentimiento <span class='color-azul txt_bold'>{$consentimiento}</span>, para el Dr. {$profesional}.";

                        /** resultado */
                        switch($value['estado'])
                        {
                            case 1:
                                $value['msg_body'] = "Usted ha Confirmado la Revocación de Consentimiento <span class='color-azul txt_bold'>{$consentimiento}</span>, para el Dr. {$profesional}.";
                            break;
                            case 2:
                                $value['msg_body'] = "Usted ha Rechazado la Revocacion de Consentimiento <span class='color-azul txt_bold'>{$consentimiento}</span>, para el Dr. {$profesional}.";
                            break;
                            case 3:
                                $value['msg_body'] = "Se ha cancelado la Revocación de Consentimiento <span class='color-azul txt_bold'>{$consentimiento}</span>, para el Dr. {$profesional}. Por sobrepasar el tiempo de aprobación.";
                            break;
                            case 4:
                                $value['msg_body'] = "Usted ha Confirmado la Revocación de Consentimiento <span class='color-azul txt_bold'>{$consentimiento}</span>, para el Dr. {$profesional}.";
                            break;
                        }

                        /** lista log */
                        switch($value['estado'])
                        {
                            case 1:
                                $msg_html_estructura = "<p><span class='color-verde txt_bold'>Revocación de Consentimiento Confirmada</span> {$consentimiento}.<br>";
                            break;
                            case 2:
                                $msg_html_estructura = "<p><span class='color-rojo txt_bold'>Revocación de Consentimiento Rechazada</span> {$consentimiento}.<br>";
                            break;
                            case 3:
                                $msg_html_estructura = "<p><span class='color-rojo txt_bold'>Revocación de Consentimiento Cancelada</span> {$consentimiento}.<br>";
                            break;
                            case 4:
                                $msg_html_estructura = "<p><span class='color-verde txt_bold'>Revocación de Consentimiento Confirmada <span class='color-rojo txt_bold'>Expirada</span></span> {$consentimiento}.</p><br>";
                            break;
                        }

                    break;

                    case 6: //  solicitud alta voluntaria
                        $data = json_decode($value['msg'],false);
                        $id = $data->id_sol_alta;
                        $consentimiento = $data->nombre_consentimiento;
                        $paciente = $data->nombre_paciente;
                        $profesional = $data->nombre_profesional;
                        $tipo = $data->tipo;

                        /** peticion */
                        $value['msg_estado'] = "Tiene pendiente confirmar una <span class='color-azul txt_bold'>Solicitud de Alta Voluntaria</span>.";

                        /** resultado */
                        switch($value['estado'])
                        {
                            case 1:
                                $value['msg_body'] = "Usted ha Autorizado su <span class='color-azul txt_bold'>Solicitud de Alta Voluntaria</span></span>.";
                            break;
                            case 2:
                                $value['msg_body'] = "Usted ha Rechazado su <span class='color-azul txt_bold'>Solicitud de Alta Voluntaria</span>.";
                            break;
                            case 3:
                                $value['msg_body'] = "Se ha cancelado su <span class='color-azul txt_bold'>Solicitud de Alta Voluntaria</span>. Por sobrepasar el tiempo de aprobación.";
                            break;
                            case 4:
                                $value['msg_body'] = "Usted ha Autorizado su <span class='color-azul txt_bold'>Solicitud de Alta Voluntaria</span></span>.";
                            break;
                        }

                        /** lista log */
                        switch($value['estado'])
                        {
                            case 1:
                                $msg_html_estructura = "<p><span class='color-verde txt_bold'>Solicitud de Alta Voluntaria Autorizada</span></p><br>";
                            break;
                            case 2:
                                $msg_html_estructura = "<p><span class='color-rojo txt_bold'>Solicitud de Alta Voluntaria Rechazada</span></p><br>";
                            break;
                            case 3:
                                $msg_html_estructura = "<p><span class='color-rojo txt_bold'>Solicitud de Alta Voluntaria Cancelada</span></p><br>";
                            break;
                            case 4:
                                $msg_html_estructura = "<p><span class='color-verde txt_bold'>Solicitud de Alta Voluntaria Autorizada <span class='color-rojo txt_bold'>Expirada</span></span></p><br>";
                            break;
                        }

                    break;

                    case 7: //  rechazo de tratamiento
                        $data = json_decode($value['msg'],false);
                        $id = $data->id_rechazo_trtt;
                        $consentimiento = $data->nombre_consentimiento;
                        $paciente = $data->nombre_paciente;
                        $profesional = $data->nombre_profesional;
                        $tipo = $data->tipo;

                        /** peticion */
                        $value['msg_estado'] = "Tiene pendiente confirmar un <span class='color-azul txt_bold'>Rechazo voluntario de tratamiento médico, procedimientos y/o cirugia</span>.";

                        /** resultado */
                        switch($value['estado'])
                        {
                            case 1:
                                $value['msg_body'] = "Usted ha Autorizado un <span class='color-azul txt_bold'>Rechazo voluntario de tratamiento médico, procedimientos y/o cirugia</span></span>.";
                            break;
                            case 2:
                                $value['msg_body'] = "Usted ha Rechazado un <span class='color-azul txt_bold'>Rechazo voluntario de tratamiento médico, procedimientos y/o cirugia</span>.";
                            break;
                            case 3:
                                $value['msg_body'] = "Se ha cancelado un <span class='color-azul txt_bold'>Rechazo voluntario de tratamiento médico, procedimientos y/o cirugia</span>. Por sobrepasar el tiempo de aprobación.";
                            break;
                            case 4:
                                $value['msg_body'] = "Usted ha Autorizado un <span class='color-azul txt_bold'>Rechazo voluntario de tratamiento médico, procedimientos y/o cirugia</span></span>.";
                            break;
                        }

                        /** lista log */
                        switch($value['estado'])
                        {
                            case 1:
                                $msg_html_estructura = "<p><span class='color-verde txt_bold'>Rechazo voluntario de tratamiento médico, procedimientos y/o cirugia Autorizada</span></p><br>";
                            break;
                            case 2:
                                $msg_html_estructura = "<p><span class='color-rojo txt_bold'>Rechazo voluntario de tratamiento médico, procedimientos y/o cirugia Rechazada</span></p><br>";
                            break;
                            case 3:
                                $msg_html_estructura = "<p><span class='color-rojo txt_bold'>Rechazo voluntario de tratamiento médico, procedimientos y/o cirugia Cancelada</span></p><br>";
                            break;
                            case 4:
                                $msg_html_estructura = "<p><span class='color-verde txt_bold'>Rechazo voluntario de tratamiento médico, procedimientos y/o cirugia Autorizada <span class='color-rojo txt_bold'>Expirada</span></span></p><br>";
                            break;
                        }

                    break;

                    case 8: //  Profesional Provisorio
                         $data = json_decode($value['msg'],false);
                        $id = $data->id;
                        $nombre = $data->nombre;
                        $fecha = $data->fecha;

                        /** peticion */
                        $value['msg_estado'] = "Tiene pendiente confirmar una <span class='color-azul txt_bold'>Invitación a un Profesional Provisorio</span>.";

                        /** resultado */
                        switch($value['estado'])
                        {
                            case 1:
                                $value['msg_body'] = "Usted ha Autorizado una <span class='color-azul txt_bold'>Invitación a un Profesional Provisorio</span></span>.";
                            break;
                            case 2:
                                $value['msg_body'] = "Usted ha Rechazado una <span class='color-azul txt_bold'>Invitación a un Profesional Provisorio</span>.";
                            break;
                            case 3:
                                $value['msg_body'] = "Se ha cancelado una <span class='color-azul txt_bold'>Invitación a un Profesional Provisorio</span>. Por sobrepasar el tiempo de aprobación.";
                            break;
                            case 4:
                                $value['msg_body'] = "Usted ha Autorizado una <span class='color-azul txt_bold'>Invitación a un Profesional Provisorio</span></span>.";
                            break;
                        }


                        /** lista log */
                        switch($value['estado'])
                        {
                            case 1:
                                $msg_html_estructura = "<p><span class='color-verde txt_bold'>Invitación a un Profesional Provisorio Autorizada</span></p><br>";
                            break;
                            case 2:
                                $msg_html_estructura = "<p><span class='color-rojo txt_bold'>Invitación a un Profesional Provisorio Rechazada</span></p><br>";
                            break;
                            case 3:
                                $msg_html_estructura = "<p><span class='color-rojo txt_bold'>Invitación a un Profesional Provisorio Cancelada</span></p><br>";
                            break;
                            case 4:
                                $msg_html_estructura = "<p><span class='color-verde txt_bold'>Invitación a un Profesional Provisorio Autorizada <span class='color-rojo txt_bold'>Expirada</span></span></p><br>";
                            break;
                        }

                    break;

					case 9: //  modificar antecedentes medicos de paciente
                        $data = json_decode($value['msg'],false);
                        $id = $data->id;
                        $nombre = $data->nombre;
                        $fecha = $data->fecha;
                        /** peticion */
                        $value['msg_estado'] = "El Profesional <span class='color-azul txt_bold'>{$nombre}</span> esta solicitando su autorizacion para modificar sus antecedentes médicos";

                        /** resultado */
                        switch($value['estado'])
                        {
                            case 1:
                                $value['msg_body'] = "El Profesional <span class='color-azul txt_bold'>{$nombre}</span> ha sido Autorizado con fecha <span class='color-azul txt_bold'>{$fecha}</span>";
                            break;
                            case 2:
                                $value['msg_body'] = "El Profesional <span class='color-azul txt_bold'>{$nombre}</span> ha sido Rechazado con fecha <span class='color-azul txt_bold'>{$fecha}</span>";
                            break;
                            case 3:
                                $value['msg_body'] = "El Profesional <span class='color-azul txt_bold'>{$nombre}</span> ha cancelado su autorización con fecha <span class='color-azul txt_bold'>{$fecha}</span>";
                            break;
                            case 4:
                                $value['msg_body'] = "El Profesional <span class='color-azul txt_bold'>{$nombre}</span> ha sido Autorizado con fecha <span class='color-azul txt_bold'>{$fecha}</span>";
                            break;
                        }
                       /** lista log */
                       switch($value['estado'])
                       {
                           case 1:
                               $msg_html_estructura = "<p><span class='color-verde txt_bold'>Solicitud Autorizada</span> El Profesional {$nombre} ha sido autorizado con fecha {$fecha}</p><br>";
                           break;
                           case 2:
                               $msg_html_estructura = "<p><span class='color-rojo txt_bold'>Solicitud Rechazada</span> El Profesional {$nombre} ha sido notificado con fecha {$fecha}</p><br>";
                           break;
                           case 3:
                               $msg_html_estructura = "<p><span class='color-rojo txt_bold'>Solicitud Cancelada</span> El Profesional {$nombre} ha recibido la cancelacion de autorización con fecha {$fecha}</p><br>";
                           break;
                           case 4:
                               $msg_html_estructura = "<p><span class='color-verde txt_bold'>Solicitud Autorizada <span class='color-rojo txt_bold'>Expirada</span> El Profesional {$nombre} ha sido autorizado con fecha {$fecha}</span></p><br>";
                           break;
                       }

                    break;

                    case 10: //  notificar ges
                        $data = json_decode($value['msg'],false);
                        $id = $data->id;
                        $nombre = $data->nombre;
                        $fecha = $data->fecha;
                        $profesional = $data->profesional;
                        /** peticion */
                        $value['msg_estado'] = "El Profesional <span class='color-azul txt_bold'>{$profesional}</span> Notifica Patologia GES";

                        /** resultado */
                        switch($value['estado'])
                        {
                            case 1:
                                $value['msg_body'] = "El Profesional <span class='color-azul txt_bold'>{$profesional}</span> le ha notificado Patologia GES con fecha<span class='color-azul txt_bold'>{$fecha}</span>";
                            break;
                            case 2:
                                $value['msg_body'] = "El Profesional <span class='color-azul txt_bold'>{$profesional}</span> le ha notificado Patologia GES con fecha<span class='color-azul txt_bold'>{$fecha}</span>";
                            break;
                            case 3:
                                $value['msg_body'] = "El Profesional <span class='color-azul txt_bold'>{$profesional}</span> le ha notificado Patologia GES con fecha <span class='color-azul txt_bold'>{$fecha}</span>";
                            break;
                            case 4:
                                $value['msg_body'] = "El Profesional <span class='color-azul txt_bold'>{$profesional}</span> le ha notificado Patologia GES con fecha<span class='color-azul txt_bold'>{$fecha}</span>";
                            break;
                        }
                        /** lista log */
                        switch($value['estado'])
                        {
                           case 1:
                               $msg_html_estructura = "<p><span class='color-verde txt_bold'>Notificación GES</span> El Profesional {$profesional} le ha notificado Patologia GES con fecha {$fecha}</p><br>";
                           break;
                           case 2:
                               $msg_html_estructura = "<p><span class='color-rojo txt_bold'>Notificación GES</span> El Profesional {$profesional} le ha notificado Patologia GES con fecha {$fecha}</p><br>";
                           break;
                           case 3:
                               $msg_html_estructura = "<p><span class='color-rojo txt_bold'>Notificación GES</span> El Profesional {$profesional} le ha notificado Patologia GES con fecha {$fecha}</p><br>";
                           break;
                           case 4:
                            $msg_html_estructura = "<p><span class='color-verde txt_bold'>Notificación GES</span> El Profesional {$profesional} le ha notificado Patologia GES con fecha {$fecha}</p><br>";
                           break;
                        }

                    break;

                    case 11: //  autorizacion compin paciente
                        $data = json_decode($value['msg'],false);
                        $id = $data->id;
                        $nombre = $data->nombre;
                        $fecha = $data->fecha;
                        $profesional = $data->profesional;
                        /** peticion */
                        $value['msg_estado'] = "El Profesional <span class='color-azul txt_bold'>{$profesional}</span> solicita su permiso para Iniciar una Licencia";

                        /** resultado */
                        switch($value['estado'])
                        {
                            case 1:
                                $value['msg_body'] = "El Profesional <span class='color-azul txt_bold'>{$profesional}</span> solicita su permiso para Iniciar una Licencia con fecha <span class='color-azul txt_bold'>{$fecha}</span>";
                            break;
                            case 2:
                                $value['msg_body'] = "El Profesional <span class='color-azul txt_bold'>{$profesional}</span> solicita su permiso para Iniciar una Licencia con fecha <span class='color-azul txt_bold'>{$fecha}</span>";
                            break;
                            case 3:
                                $value['msg_body'] = "El Profesional <span class='color-azul txt_bold'>{$profesional}</span> solicita su permiso para Iniciar una Licencia con fecha <span class='color-azul txt_bold'>{$fecha}</span>";
                            break;
                            case 4:
                                $value['msg_body'] = "El Profesional <span class='color-azul txt_bold'>{$profesional}</span> solicita su permiso para Iniciar una Licencia con fecha <span class='color-azul txt_bold'>{$fecha}</span>";
                            break;
                        }
                        /** lista log */
                        switch($value['estado'])
                        {
                            case 1:
                                $msg_html_estructura = "<p><span class='color-verde txt_bold'>Notificación COMPIN</span> El Profesional {$profesional} solicita su permiso para Iniciar una Licencia con fecha {$fecha}</p><br>";
                            break;
                            case 2:
                                $msg_html_estructura = "<p><span class='color-rojo txt_bold'>Notificación COMPIN</span> El Profesional {$profesional} solicita su permiso para Iniciar una Licencia con fecha {$fecha}</p><br>";
                            break;
                            case 3:
                                $msg_html_estructura = "<p><span class='color-rojo txt_bold'>Notificación COMPIN</span> El Profesional {$profesional} solicita su permiso para Iniciar una Licencia con fecha {$fecha}</p><br>";
                            break;
                            case 4:
                                $msg_html_estructura = "<p><span class='color-verde txt_bold'>Notificación COMPIN</span> El Profesional {$profesional} solicita su permiso para Iniciar una Licencia con fecha {$fecha}</p><br>";
                            break;
                        }

                    break;

                    case 12: //  autorizacion licencia profesional
                        $data = json_decode($value['msg'],false);
                        $id = $data->id;
                        $nombre = $data->nombre;
                        $fecha = $data->fecha;
                        $profesional = $data->profesional;
                        /** peticion */
                        $value['msg_estado'] = "Profesional esta por Iniciar Licencia";

                        /** resultado */
                        switch($value['estado'])
                        {
                            case 1:
                                $value['msg_body'] = "Profesional por iniciar una Liciencia con fecha <span class='color-azul txt_bold'>{$fecha}</span>";
                            break;
                            case 2:
                                $value['msg_body'] = "Profesional por iniciar una Liciencia con fecha <span class='color-azul txt_bold'>{$fecha}</span>";
                            break;
                            case 3:
                                $value['msg_body'] = "Profesional por iniciar una Liciencia con fecha <span class='color-azul txt_bold'>{$fecha}</span>";
                            break;
                            case 4:
                                $value['msg_body'] = "Profesional por iniciar una Liciencia con fecha <span class='color-azul txt_bold'>{$fecha}</span>";
                            break;
                        }

                        /** lista log */
                        switch($value['estado'])
                        {
                           case 1:
                               $msg_html_estructura = "<p><span class='color-verde txt_bold'>Creacion de Licencia</span> con fecha {$fecha}</p><br>";
                           break;
                           case 2:
                               $msg_html_estructura = "<p><span class='color-rojo txt_bold'>Creacion de Licencia</span> con fecha {$fecha}</p><br>";
                           break;
                           case 3:
                               $msg_html_estructura = "<p><span class='color-rojo txt_bold'>Creacion de Licencia</span> con fecha {$fecha}</p><br>";
                           break;
                           case 4:
                               $msg_html_estructura = "<p><span class='color-verde txt_bold'>Creacion de Licencia <span class='color-rojo txt_bold'>Expirada</span> con fecha {$fecha}</span></p><br>";
                           break;
                        }

                    break;

                    case 13: //  autorizacion de paciente para compra de bono
                        $data = json_decode($value['msg'],false);
                        $id = $data->id;
                        $nombre = $data->nombre;
                        $fecha = $data->fecha;
                        $profesional = $data->profesional;
                        /** peticion */
                        $value['msg_estado'] = "Autorizacion para compra de bono";

                        /** resultado */
                        switch($value['estado'])
                        {
                            case 1:
                                $value['msg_body'] = "Autorizacion para compra de bono con fecha <span class='color-azul txt_bold'>{$fecha}</span>";
                            break;
                            case 2:
                                $value['msg_body'] = "Autorizacion para compra de bono con fecha <span class='color-azul txt_bold'>{$fecha}</span>";
                            break;
                            case 3:
                                $value['msg_body'] = "Autorizacion para compra de bono con fecha <span class='color-azul txt_bold'>{$fecha}</span>";
                            break;
                            case 4:
                                $value['msg_body'] = "Autorizacion para compra de bono con fecha <span class='color-azul txt_bold'>{$fecha}</span>";
                            break;
                        }


                        /** lista log */
                        switch($value['estado'])
                        {
                           case 1:
                               $msg_html_estructura = "<p><span class='color-verde txt_bold'>Autorizacion para compra de bono</span> con fecha {$fecha}</p><br>";
                           break;
                           case 2:
                               $msg_html_estructura = "<p><span class='color-rojo txt_bold'>Autorizacion para compra de bono</span> con fecha {$fecha}</p><br>";
                           break;
                           case 3:
                               $msg_html_estructura = "<p><span class='color-rojo txt_bold'>Autorizacion para compra de bono</span> con fecha {$fecha}</p><br>";
                           break;
                           case 4:
                               $msg_html_estructura = "<p><span class='color-verde txt_bold'>Autorizacion para compra de bono <span class='color-rojo txt_bold'>Expirada</span> con fecha {$fecha}</span></p><br>";
                           break;
                        }

                    break;

					case 14: //  Permiso para venta de MEDICAMENTOS
                        $data = json_decode($value['msg'],false);
                        $id = $data->id;
                        $nombre = $data->nombre;
                        $fecha = $data->fecha;
                        $profesional = $data->profesional;
                        /** peticion */
                        $value['msg_estado'] = "Se necesita  <span class='color-azul txt_bold'>permiso</span> para la venta de medicamentos asociados a una receta";

                        /** resultado */
                        switch($value['estado'])
                        {
                            case 1:
                                $value['msg_body'] = "<span class='color-azul txt_bold'>Permiso</span> para venta con fecha <span class='color-azul txt_bold'>{$fecha}</span>";
                            break;
                            case 2:
                                $value['msg_body'] = "<span class='color-azul txt_bold'>Permiso</span> para venta con fecha <span class='color-azul txt_bold'>{$fecha}</span>";
                            break;
                            case 3:
                                $value['msg_body'] = "<span class='color-azul txt_bold'>Permiso</span> para venta con fecha <span class='color-azul txt_bold'>{$fecha}</span>";
                            break;
                            case 4:
                                $value['msg_body'] = "<span class='color-azul txt_bold'>Permiso</span> para venta con fecha <span class='color-azul txt_bold'>{$fecha}</span>";
                            break;
                        }

                        /** lista log */
                        switch($value['estado'])
                        {
                           case 1:
                               $msg_html_estructura = "<p><span class='color-verde txt_bold'>Venta Farmacia Autorizada</span> Permiso para venta con fecha {$fecha}</p><br>";
                           break;
                           case 2:
                               $msg_html_estructura = "<p><span class='color-rojo txt_bold'>Venta Farmacia Rechazada</span> Permiso para venta con fecha {$fecha}</p><br>";
                           break;
                           case 3:
                               $msg_html_estructura = "<p><span class='color-rojo txt_bold'>Venta Farmacia Cancelada</span> Permiso para venta con fecha {$fecha}</p><br>";
                           break;
                           case 4:
                               $msg_html_estructura = "<p><span class='color-verde txt_bold'>Venta Farmacia Autorizada <span class='color-rojo txt_bold'>Expirada</span> Permiso para venta con fecha {$fecha}</span></p><br>";
                           break;
                        }

                    break;

                    case 15: //  AUTORIZACION DE ATENCION MEDICA
                        $data = json_decode($value['msg'],false);
                        $id = $data->id;
                        $nombre = $data->nombre;
                        $fecha = $data->fecha;
                        $profesional = $data->profesional;
                        /** peticion */
                        $value['msg_estado'] = "Se necesita <span class='color-azul txt_bold'>Autorización</span> para la Atención Medica de Menor de Edad";

                        /** resultado */
                        switch($value['estado'])
                        {
                            case 1:
                                $value['msg_body'] = "<span class='color-azul txt_bold'>Autorización</span> para Atención Medica a Menor de Edad con fecha <span class='color-azul txt_bold'>{$fecha}</span>";
                            break;
                            case 2:
                                $value['msg_body'] = "<span class='color-azul txt_bold'>Autorización</span> para Atención Medica a Menor de Edad con fecha <span class='color-azul txt_bold'>{$fecha}</span>";
                            break;
                            case 3:
                                $value['msg_body'] = "<span class='color-azul txt_bold'>Autorización</span> para Atención Medica a Menor de Edad con fecha <span class='color-azul txt_bold'>{$fecha}</span>";
                            break;
                            case 4:
                                $value['msg_body'] = "<span class='color-azul txt_bold'>Autorización</span> para Atención Medica a Menor de Edad con fecha <span class='color-azul txt_bold'>{$fecha}</span>";
                            break;
                        }

                        /** lista log */
                        switch($value['estado'])
                        {
                           case 1:
                               $msg_html_estructura = "<p><span class='color-verde txt_bold'>Autorizada</span> Atención Medica a Menor de Edad con fecha {$fecha}</p><br>";
                           break;
                           case 2:
                               $msg_html_estructura = "<p><span class='color-rojo txt_bold'>Rechazada</span> Atención Medica a Menor de Edad con fecha {$fecha}</p><br>";
                           break;
                           case 3:
                               $msg_html_estructura = "<p><span class='color-rojo txt_bold'>Cancelada</span> Atención Medica a Menor de Edad con fecha {$fecha}</p><br>";
                           break;
                           case 4:
                               $msg_html_estructura = "<p><span class='color-verde txt_bold'>Atención Medica a Menor de Edad Autorizada <span class='color-rojo txt_bold'>Expirada</span> para venta con fecha {$fecha}</span></p><br>";
                           break;
                        }
                    break;

                    case 16: // interconsula
                        $data = json_decode($value['msg'],false);
                        $id = $data->id;
                        $nombre = $data->nombre;
                        $fecha = $data->fecha;
                        $profesional = $data->profesional;
                        /** peticion */
                        $value['msg_estado'] = "Se necesita <span class='color-azul txt_bold'>Autorización</span> para la Interconsulta";

                        /** resultado */
                        switch($value['estado'])
                        {
                            case 1:
                                $value['msg_body'] = "<span class='color-azul txt_bold'>Autorización</span> para Interconsulta<br>";
                            break;
                            case 2:
                                $value['msg_body'] = "<span class='color-azul txt_bold'>Autorización</span> para Interconsulta<br>";
                            break;
                            case 3:
                                $value['msg_body'] = "<span class='color-azul txt_bold'>Autorización</span> para Interconsulta<br>";
                            break;
                            case 4:
                                $value['msg_body'] = "<span class='color-azul txt_bold'>Autorización</span> para Interconsulta<br>";
                            break;
                        }

                        /** lista log */
                        switch($value['estado'])
                        {
                           case 1:
                               $msg_html_estructura = "<p><span class='color-verde txt_bold'>Autorizada</span> Interconsulta</p><br>";
                           break;
                           case 2:
                               $msg_html_estructura = "<p><span class='color-rojo txt_bold'>Rechazada</span> Interconsulta</p><br>";
                           break;
                           case 3:
                               $msg_html_estructura = "<p><span class='color-rojo txt_bold'>Cancelada</span> Interconsulta</p><br>";
                           break;
                           case 4:
                               $msg_html_estructura = "<p><span class='color-verde txt_bold'>Interconsulta<span class='color-rojo txt_bold'>Expirada</span></span></p><br>";
                           break;
                        }
                    break;

                    case 17: // CONFIDENCIAL
                        $data = json_decode($value['msg'],false);
                        $id = $data->id;
                        $nombre = $data->nombre;
                        $fecha = $data->fecha;
                        // $profesional = $data->profesional;
                        /** peticion */
                        $value['msg_estado'] = "Se necesita <span class='color-azul txt_bold'>Autorización</span> para la visualizar Confidenciales";

                        /** resultado */
                        switch($value['estado'])
                        {
                            case 1:
                                $value['msg_body'] = "<span class='color-azul txt_bold'>Autorización</span> para visualizar confidenciales<br>";
                            break;
                            case 2:
                                $value['msg_body'] = "<span class='color-azul txt_bold'>Autorización</span> para visualizar confidenciales<br>";
                            break;
                            case 3:
                                $value['msg_body'] = "<span class='color-azul txt_bold'>Autorización</span> para visualizar confidenciales<br>";
                            break;
                            case 4:
                                $value['msg_body'] = "<span class='color-azul txt_bold'>Autorización</span> para visualizar confidenciales<br>";
                            break;
                        }

                        /** lista log */
                        switch($value['estado'])
                        {
                           case 1:
                               $msg_html_estructura = "<p><span class='color-verde txt_bold'>Autorizada</span> visualizar confidenciales</p><br>";
                           break;
                           case 2:
                               $msg_html_estructura = "<p><span class='color-rojo txt_bold'>Rechazada</span> visualizar confidenciales</p><br>";
                           break;
                           case 3:
                               $msg_html_estructura = "<p><span class='color-rojo txt_bold'>Cancelada</span> visualizar confidenciales</p><br>";
                           break;
                           case 4:
                               $msg_html_estructura = "<p><span class='color-verde txt_bold'>visualizar confidenciales<span class='color-rojo txt_bold'>Expirada</span></span></p><br>";
                           break;
                        }
                    break;

                }


                $value['msg_html'] = $msg_html_estructura;
             }

             $datos['registros'] = $registros;

        }else{
            $datos['estado'] = 0;
            $datos['msg'] = 'Sin registros';
            $datos['request'] = $request->all();
        }

        return response($datos)->header('Content-Type', 'application/json');
    }

    public function verRegistro(Request $request){

        $datos = array();
        $filtros = array();
        $error = array();
        $campos_requeridos = 0;


        /* VALIDACION CAMPOS */
        if(empty($request->id)||(int)$request->id==0)
        {
            $error['id'] = 'campo requerido';
            $campos_requeridos = 1;
        }


        /* CAMPOS FILTRO */
        if(!empty($request->id))
            $filtros[] = array('id',$request->id);
        if(!empty($request->id_user_create))
            $filtros[] = array('id_user_create',$request->id_user_create);
        if(!empty($request->id_user_recept))
            $filtros[] = array('id_user_recept',$request->id_user_recept);
        if(!empty($request->msg))
            $filtros[] = array('msg',$request->msg);
        if(!empty($request->tipo))
            $filtros[] = array('tipo',$request->tipo);
        if($request->estado!='')
            $filtros[] = array('estado',$request->estado);
        if(!empty($request->fecha_ingreso))
            $filtros[] = array('fecha_ingreso',$request->fecha_ingreso);
        if(!empty($request->fecha_termino))
            $filtros[] = array('fecha_termino',$request->fecha_termino);

        if($campos_requeridos==0)
        {

            $cant_reg = LogUsersDevices::count();

            if($cant_reg >0){

                // Generamos la consulta
                $registros = LogUsersDevices::where($filtros)->find($request->id);

                if($registros->count())
                {
                    $datos['estado'] = 1;
                    $datos['registros'] = $registros;
                    $datos['request'] = $request->all();

                }else{
                    $datos['estado'] = 0;
                    $datos['msg'] = 'Registro no encontrado';
                    $datos['request'] = $request->all();
                }

            }else{
                $datos['estado'] = 0;
                $datos['msg'] = 'Sin registros';
                $datos['request'] = $request->all();
            }
        }else{
            $datos['estado'] = 0;
            $datos['msg'] = 'Campos Requeridos';
            $datos['request'] = $request->all();
            $datos['error'] = $error;
        }

        return response($datos)->header('Content-Type', 'application/json');

    }

    public function registrar(Request $request)
    {
        $datos = array();
        $error = array();
        $campos_requeridos = 0;

        $registro = new LogUsersDevices();


        /* VALIDACION CAMPOS */
        if($request->id_user_create=='')
        {
            $error['id_user_create'] = 'campo requerido';
            $campos_requeridos = 1;
        }
        if($request->id_user_recept=='')
        {
            $error['id_user_recept'] = 'campo requerido';
            $campos_requeridos = 1;
        }

        if($request->msg=='')
        {
            $error['msg'] = 'campo requerido';
            $campos_requeridos = 1;
        }

        if($request->tipo=='')
        {
            $error['tipo'] = 'campo requerido';
            $campos_requeridos = 1;
        }

        if($request->estado=='')
        {
            $error['estado'] = 'campo requerido';
            $campos_requeridos = 1;
        }
        /*
        if($request->fecha_ingreso=='')
        {
            $error['fecha_ingreso'] = 'campo requerido';
            $campos_requeridos = 1;
        }
        if($request->fecha_termino=='')
        {
            $error['fecha_termino'] = 'campo requerido';
            $campos_requeridos = 1;
        }
        */

        /* FIN - VALIDACION CAMPOS */

        if($campos_requeridos==0)
        {

            /*
            $registro->id_user_create = $request->id_user_create;
            $registro->id_user_recept = $request->id_user_recept;

            $registro->msg = $request->msg;
            $registro->tipo = $request->tipo;

            $registro->estado = $request->estado;


            $fecha =date('Y-m-d');
            $hora = date('H:i:s');
            $fecha_actual  = date('Y-m-d H:i:s', strtotime($fecha.' '.$hora));
            $fecha_vencimiento  = date ( 'Y-m-d H:i:s' ,strtotime ( '+'.env('TIEMPO_ESPERA_CONFIRMACION').' hours' , strtotime ($fecha_actual) ) );
            $fecha_expira = date ( 'Y-m-d H:i:s' ,strtotime ( '+'.((int)env('TIEMPO_ESPERA_CONFIRMACION')).' hours' , strtotime ($fecha_actual) ) );

            $registro->fecha_ingreso = $fecha_actual;
            $registro->fecha_termino = $fecha_vencimiento;
            $registro->fecha_exp = $fecha_expira;
            $registro->token = md5(uniqid());
			*/

            $id_user_create = $request->id_user_create;
            $id_user_recept = $request->id_user_recept;

            $evento = 'Generar Permiso';
            $nombre = '';
            $apellido_p = '';
            $apellido_m = '';
            $lugar = 'Sistema';
            $profesional = '';
            $tipo = 'Check SDI';
            $id_tipo = $request->tipo;

            $permiso = Funciones::generatePermApp($id_user_create,$id_user_recept,$evento,$nombre,$apellido_p,$apellido_m,$lugar,$profesional,$tipo,$id_tipo);

            if($permiso['app']['estado'] == 1)
            {
                $datos['id'] =  $permiso['app']['last_id'];
                $datos['estado'] = 1;
                $datos['msg'] = 'Registros Creado';
                $datos['request_data'] = $request->all();
            }else{
                $datos['estado'] = 0;
                $datos['msg'] = 'Problemas al registrar';
                $datos['request_data'] = $request->all();
            }
        }else{
            $datos['estado'] = 0;
            $datos['msg'] = 'Campos requeridos';
            $datos['error'] = $error;
            $datos['request_data'] = $request->all();
        }

        return response($datos)->header('Content-Type', 'application/json');
    }

    public function modificar(Request $request)
    {
        $datos = array();
        $error = array();
        $campos_requeridos = 0;

        /* VALIDAR DATOS */
        if((int)$request->id==0){
            $error['id'] = 'Campo requerido';
            $campos_requeridos = 1;
        }

        if($request->id_user_create=='')
        {
            $error['id_user_create'] = 'campo requerido';
            $campos_requeridos = 1;
        }
        if($request->id_user_recept=='')
        {
            $error['id_user_recept'] = 'campo requerido';
            $campos_requeridos = 1;
        }

        if($request->msg=='')
        {
            $error['msg'] = 'campo requerido';
            $campos_requeridos = 1;
        }

        if($request->tipo=='')
        {
            $error['tipo'] = 'campo requerido';
            $campos_requeridos = 1;
        }

        if($request->estado=='')
        {
            $error['estado'] = 'campo requerido';
            $campos_requeridos = 1;
        }
        if($request->fecha_ingreso=='')
        {
            $error['fecha_ingreso'] = 'campo requerido';
            $campos_requeridos = 1;
        }
        if($request->fecha_termino=='')
        {
            $error['fecha_termino'] = 'campo requerido';
            $campos_requeridos = 1;
        }


        if($campos_requeridos==0)
        {

            $registro = LogUsersDevices::find($request->id);

            if(count($registro))
            {

                if(!empty($request->id_user_create))
                    $registro->id_user_create = $request->id_user_create;
                if(!empty($request->id_user_recept))
                    $registro->id_user_recept = $request->id_user_recept;

                if(!empty($request->msg))
                    $registro->msg = $request->msg;
                if(!empty($request->tipo))
                    $registro->tipo = $request->tipo;
                if(!empty($request->estado))
                    $registro->estado = $request->estado;

                if(!empty($request->fecha_ingreso))
                    $registro->fecha_ingreso = $request->fecha_ingreso;
                if(!empty($request->fecha_termino))
                    $registro->fecha_termino = $request->fecha_termino;


                if($registro->save())
                {
                    $datos['estado'] = 1;
                    $datos['msg'] = 'Registro Modificado';
                    $datos['request_data'] = $request->all();
                }else{
                    $datos['estado'] = 0;
                    $datos['msg'] = 'Problemas al Modificar';
                    $datos['request_data'] = $request->all();
                }
            }else{
                $datos['estado'] = 0;
                $datos['msg'] = 'Registro no existente, vuelva a intentarlo.';
                $datos['request_data'] = $request->all();
            }
        }else{
            $datos['estado'] = 0;
            $datos['msg'] = 'Registro no existente, vuelva a intentarlo.';
            $datos['error'] = $error;
            $datos['request_data'] = $request->all();
        }

        return response($datos)->header('Content-Type', 'application/json');
    }

    public function estado(Request $request)
    {
        $datos = array();
        $error = array();
        $campos_requeridos = 0;

        /* VALIDAR DATOS */
        if(empty($request->id)||(int)$request->id==0){
            $error['id'] = 'Campo requerido';
            $campos_requeridos = 1;
        }
        if($request->estado==null){
            $error['estado'] = 'Campo requerido';
            $campos_requeridos = 1;
        }

        if($campos_requeridos==0)
        {

            $registro = LogUsersDevices::find($request->id);

            if($registro->count()>0)
            {
                if($registro->estado == 0)
                {
                    $registro->estado = $request->estado;
                    if($registro->save())
                    {
                        $datos['estado'] = 1;
                        $datos['msg'] = 'Registro Actualizado';
                        $datos['request'] = $request->all();
                    }else{
                        $datos['estado'] = 0;
                        $datos['msg'] = 'Problemas al actualizar el registro';
                        $datos['request'] = $request->all();
                    }
                }else{
                    $datos['estado'] = 2;
                    $datos['estado_registro'] = $registro->estado;
                    $datos['msg'] = 'Registro ya actualizado';
                    $datos['request'] = $request->all();
                }

            }else{
                $datos['estado'] = 0;
                $datos['msg'] = 'Registro no existe';
                $datos['request'] = $request->all();
            }
        }else{
            $datos['estado'] = 0;
            $datos['msg'] = 'Campos Requeridos';
            $datos['error'] = $error;
            $datos['request'] = $request->all();
        }

        return response($datos)->header('Content-Type', 'application/json');
    }

    public function checkStateSol(){ // CRON CADA 1 MIN

        $registros = LogUsersDevices::whereIn('estado',[0,1])->get();
        //$registros = LogUsersDevices::whereIn('estado',[0])->get();

        if($registros)
        {
            foreach($registros as $key => $value)
            {

                $fecha_actual = date('Y-m-d H:i:s');
                $fecha_exp = $value['fecha_exp'];
                if($fecha_exp==null)
                {
                    $value->estado = 3;
                    $value->save();
                }else{
                    $segundos = strtotime($fecha_exp) - strtotime($fecha_actual);
                    if($segundos<0)
                    {
                        if($value->estado == 1){
                            $value->estado = 4;
                            $value->save();
                        }else{
                            $value->estado = 3;
                            $value->save();
                        }

                    }
                }
            }
        }

    }

    public function genSolicitud(Request $request)
    {
        /* params generatePermApp() */
        /* $id_user_create,$id_user_recept,$evento,$nombre,$apellido_p,$apellido_m,$lugar,$profesional,$tipo = 'confirmacion' */
        $id_user_create = 3;
        $id_user_recept = 3;
        $evento = 'Ficha Única';
        $nombre = 'Paul';
        $apellido_p = 'Baeza';
        $apellido_m = 'Del Canto';
        $lugar = 'Clinica';
        $profesional = 'Jaime Kriman';
        $tipo = 'confirmacion';

        $datos = Funciones::generatePermApp($id_user_create,$id_user_recept,$evento,$nombre,$apellido_p,$apellido_m,$lugar,$profesional,$tipo);

        return response($datos)->header('Content-Type', 'application/json');
    }
}
