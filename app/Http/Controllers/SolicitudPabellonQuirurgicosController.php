<?php

namespace App\Http\Controllers;

use App\Models\Profesional;
use App\Models\ProfesionalMiEquipo;
use App\Models\ProfesionalMiEquipoProfesional;
use App\Models\SolicitudPabellonesQuirurgicosEquipo;
use App\Models\SolicitudPabellonQuirurgico;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SolicitudPabellonQuirurgicosController extends Controller
{
    public function registroSolicitud(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->grado_urgencia))
        {
            $error['grado_urgencia'] = 'campo requerido\n';
            $valido = 0;
        }
        // if(empty($request->id_hospital))
        // {
        //     $error['id_hospital'] = 'campo requerido\n';
        //     $valido = 0;
        // }
        if(empty($request->hospital))
        {
            $error['hospital'] = 'campo requerido\n';
            $valido = 0;
        }
        if(empty($request->fecha_hora_operacion))
        {
            $error['fecha_hora_operacion'] = 'campo requerido\n';
            $valido = 0;
        }
        if(empty($request->operacion))
        {
            $error['operacion'] = 'campo requerido\n';
            $valido = 0;
        }
        if(empty($request->codigo_cirugia))
        {
            $error['codigo_cirugia'] = 'campo requerido\n';
            $valido = 0;
        }
        if(empty($request->equipamiento_especial))
        {
            $error['equipamiento_especial'] = 'campo requerido\n';
            $valido = 0;
        }
        if(empty($request->especialidad_1))
        {
            $error['especialidad_1'] = 'campo requerido\n';
            $valido = 0;
        }
        if(empty($request->comentarios))
        {
            $error['comentarios'] = 'campo requerido\n';
            $valido = 0;
        }
        if(empty($request->tipo_cirugia))
        {
            $error['tipo_cirugia'] = 'campo requerido\n';
            $valido = 0;
        }
        // if(empty($request->patalogias_cronicas))
        // {
        //     $error['patalogias_cronicas'] = 'campo requerido\n';
        //     $valido = 0;
        // }
        if(empty($request->otros_antecedentes))
        {
            $error['otros_antecedentes'] = 'campo requerido\n';
            $valido = 0;
        }
        if(empty($request->diagnostico_preoperatorio))
        {
            $error['diagnostico_preoperatorio'] = 'campo requerido\n';
            $valido = 0;
        }
        // if(empty($request->tipo_hospitalizacion))
        // {
        //     $error['tipo_hospitalizacion'] = 'campo requerido\n';
        //     $valido = 0;
        // }
        // if(empty($request->cirujano))
        // {
        //     $error['cirujano'] = 'campo requerido\n';
        //     $valido = 0;
        // }
        // if(empty($request->instrumental_especial))
        // {
        //     $error['instrumental_especial'] = 'campo requerido\n';
        //     $valido = 0;
        // }
        // if(empty($request->insumos_especiales))
        // {
        //     $error['insumos_especiales'] = 'campo requerido\n';
        //     $valido = 0;
        // }
        if(empty($request->id_paciente))
        {
            $error['id_paciente'] = 'campo requerido\n';
            $valido = 0;
        }
        if(empty($request->id_profesional))
        {
            $error['id_profesional'] = 'campo requerido\n';
            $valido = 0;
        }
        if(empty($request->id_ficha_atencion))
        {
            $error['id_ficha_atencion'] = 'campo requerido\n';
            $valido = 0;
        }
        if(empty($request->id_lugar_atencion))
        {
            $error['id_lugar_atencion'] = 'campo requerido\n';
            $valido = 0;
        }
        /** equipo  */
        if(empty(json_decode($request->lista_profesionales_eq_nuevo)) && empty($request->lista_profesionales))
        {
            $error['equipo'] = 'campo requerido\n';
            $valido = 0;
        }

        if($valido)
        {
            $registro = new SolicitudPabellonQuirurgico();
            $registro->grado_urgencia = $request->grado_urgencia;
            $registro->id_hospital = $request->id_hospital;
            $registro->hospital = $request->hospital;
            $registro->fecha_hora_operacion = $request->fecha_hora_operacion;
            $registro->operacion = $request->operacion;
            $registro->codigo_cirugia = $request->codigo_cirugia;
            $registro->equipamiento_especial = $request->equipamiento_especial;
            $registro->especialidad_1 = $request->especialidad_1;
            $registro->comentarios = $request->comentarios;
            $registro->tipo_cirugia = $request->tipo_cirugia;
            $registro->patalogias_cronicas = $request->patalogias_cronicas;
            $registro->otros_antecedentes = $request->otros_antecedentes;
            $registro->diagnostico_preoperatorio = $request->diagnostico_preoperatorio;
            $registro->tipo_hospitalizacion = $request->tipo_hospitalizacion;
            // $registro->cirujano = $request->cirujano;
            $registro->instrumental_especial = $request->instrumental_especial;
            $registro->insumos_especiales = $request->insumos_especiales;
            $registro->id_paciente = $request->id_paciente;
            $registro->id_profesional = $request->id_profesional;
            $registro->id_ficha_atencion = $request->id_ficha_atencion;
            $registro->id_lugar_atencion = $request->id_lugar_atencion;

            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'solicitud exitosa';
                $datos['last_id'] = $registro->id;

                /** registro equipo  */
                if(empty(json_decode($request->lista_profesionales_eq_nuevo)) && !empty($request->lista_profesionales))
                {
                    /** registro de equipo exitente */
                    $lista_equipo = explode('|',$request->lista_profesionales);

                    foreach ($lista_equipo as $key => $value)
                    {
                        if(!empty($value))
                        {
                            // [0] = id_tipo_especialidad
                            // [1] = id_sub_tipo_especialidad
                            // [2] = posicion
                            // [3] = id_profesional
                            $temp = explode(',', $value);
                            $datos['registro_equipo'][] = static::registroSolicitudPabellonEquipo($registro->id, $temp[0], $temp[1], $temp[2], $temp[3]);
                        }
                    }
                }
                else if(!empty($request->lista_profesionales_eq_nuevo) && empty($request->lista_profesionales))
                {
                    /** regitro de equipo nuevo */
                    // var_dump('regitro de equipo nuevo');
                    $lista_equipo_nuevo = json_decode($request->lista_profesionales_eq_nuevo);
                    $equipo_a_guardar = array();
                    foreach ($lista_equipo_nuevo as $key => $value)
                    {
                        // var_dump($value );
                        // var_dump('*****************' );
                        if(!empty($value))
                        {
                            // [posicion] => "CIRUJANO"
                            // [profesional_apellido]:=>""
                            // [profesional_email] => undefined
                            // [profesional_id] => "3"
                            // [profesional_nombre] => "jaime kriman"
                            // [tipo] => "existente"
                            $temp = $value;

                            if($temp->tipo == 'nuevo')
                            {
                                /** crear profesional */
                                $prof_nuevo = new Profesional();
                                $prof_nuevo->nombre = $temp->profesional_nombre;
                                $prof_nuevo->apellido_uno = $temp->profesional_apellido;
                                $prof_nuevo->apellido_dos = '.';
                                $prof_nuevo->sexo = 'M';
                                $prof_nuevo->rut = '1';
                                $prof_nuevo->email = $temp->profesional_email;
                                $prof_nuevo->bienvenida = 1;
                                $prof_nuevo->telefono_uno = '1234';
                                $prof_nuevo->estado = 1;
	                            $prof_nuevo->certificado = '1234';

                                if($prof_nuevo->save())
                                {
                                    $datos['nuevo_profe'][$key]['estado'] = 1;
                                    $datos['nuevo_profe'][$key]['msj'] = 'Profesional Creado';
                                    $datos['nuevo_profe'][$key]['last_id'] = $prof_nuevo->id;

                                    /** crear usuario */
                                    $prof_user = new User();
                                    $prof_user->name = $temp->profesional_nombre.' '.$temp->profesional_apellido;
                                    $prof_user->email = $temp->profesional_email;
                                    $temp_pass = rand(1111,999);
                                    $prof_user->password = Hash::make($temp_pass);

                                    if($prof_user->save())
                                    {
                                        $prof_user->assignRole('Profesional');

                                        $datos['nuevo_profe'][$key]['prof_user']['estado'] = 1;
                                        $datos['nuevo_profe'][$key]['prof_user']['msj'] = 'Profesional Creado';
                                        $datos['nuevo_profe'][$key]['prof_user']['last_id'] = $prof_user->id;

                                        /** actualizar profesional con id_user */
                                        $prof_nuevo->id_usuario = $prof_user->id;

                                        if($prof_nuevo->save())
                                        {

                                            $datos['nuevo_profe'][$key]['prof_update']['estado'] = 1;
                                            $datos['nuevo_profe'][$key]['prof_update']['msj'] = 'Profesional actualizado';


                                            /** envio de correo de nuevo integrante  */
                                            $blade = 'profesional_usuario_creado';
                                            $to = array(
                                                    array('email' => $temp->profesional_email,'name' =>$temp->profesional_nombre.' '.$temp->profesional_apellido),
                                                );
                                            $cc = array();
                                            $bcc = array();
                                            $asunto = 'MED-SDI - Nuevo Integrante!';
                                            $body = array('nombre'=>$temp->profesional_nombre.' '.$temp->profesional_apellido, 'user'=>$temp->profesional_email, 'pass'=>$temp_pass);
                                            $archivo = '';/** pendiente */
                                            $id_institucion = '';

                                            $result_mail =  SendMailController::envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, $id_institucion);

                                            if($result_mail['estado'])
                                            {
                                                $datos['nuevo_profe'][$key]['mail']['estado'] = 1;
                                                $datos['nuevo_profe'][$key]['mail']['msj'] = 'Notificacion de bienvenida enviado';
                                            }
                                            else
                                            {
                                                $datos['nuevo_profe'][$key]['mail']['estado'] = 0;
                                                $datos['nuevo_profe'][$key]['mail']['msj'] = 'Falle en envio de Notificacion de bienvenida';
                                            }

                                        }
                                        else
                                        {
                                            $datos['nuevo_profe'][$key]['prof_update']['estado'] = 0;
                                            $datos['nuevo_profe'][$key]['prof_update']['msj'] = 'Problema actualizando profesional';
                                        }
                                    }
                                    else
                                    {
                                        $datos['nuevo_profe'][$key]['prof_user']['estado'] = 0;
                                        $datos['nuevo_profe'][$key]['prof_user']['msj'] = 'Falla creando usuario';
                                    }

                                }
                                else
                                {
                                    $datos['nuevo_profe'][$key]['estado'] = 0;
                                    $datos['nuevo_profe'][$key]['msj'] = 'falla creando al Profesional';
                                }

                            }

                            /** guardar en pabellon equipo  */
                            if($temp->tipo == 'nuevo')
                            {
                                $datos['registro_equipo'][] = static::registroSolicitudPabellonEquipo($registro->id, 0, 0, $temp->posicion, $prof_nuevo->id);
                                $id_pro_temp = $prof_nuevo->id;
                            }
                            else
                            {
                                $prof = Profesional::find($temp->profesional_id);
                                $datos['registro_equipo'][] = static::registroSolicitudPabellonEquipo($registro->id, $prof->id_tipo_especialidad, $prof->id_sub_tipo_especialidad, $temp->posicion, $temp->profesional_id);
                                $id_pro_temp = $temp->profesional_id;
                            }


                            /** cargar equipo del profesional */
                            if(!empty($request->nombre_equipo))
                            {
                                $array_temp = array(
                                    'posicion' => $temp->posicion,
                                    'id_profesional' => $id_pro_temp,
                                );
                                array_push($equipo_a_guardar, $array_temp);
                            }


                        }
                    }

                    if(!empty($request->nombre_equipo) && !empty($equipo_a_guardar))
                    {
                        /** cargar equipo del profesional */
                        $equipo_profesional = new ProfesionalMiEquipo();
                        $equipo_profesional->nombre = $request->nombre_equipo;
                        $equipo_profesional->descripcion = $request->descripcion_equipo;
                        $equipo_profesional->id_profesional = $request->id_profesional;

                        if($equipo_profesional->save())
                        {
                            $datos['profesionalMiEquipo']['estado'] = 1;
                            $datos['profesionalMiEquipo']['msj'] = 'equipo creado';

                            foreach ($equipo_a_guardar as $key => $value)
                            {
                                $datos['profesionalMiEquipo']['profesionales'][] = static::registroMiEquipoProfesional($equipo_profesional->id, 0, 0, $value['posicion'], $value['id_profesional']);
                            }
                        }
                    }

                }
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




    static public function registroSolicitudPabellonEquipo($id_solicitudes_pabellones_quirurgicos, $id_tipo_especialidad, $id_sub_tipo_especialidad, $posicion, $id_profesional)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($id_solicitudes_pabellones_quirurgicos))
        {
            $error['id_solicitudes_pabellones_quirurgicos'] ='campo requerido';
            $valido = 0;
        }
        // if(empty($id_tipo_especialidad))
        // {
        //     $error['id_tipo_especialidad'] ='campo requerido';
        //     $valido = 0;
        // }
        // if(empty($id_sub_tipo_especialidad))
        // {
        //     $error['id_sub_tipo_especialidad'] ='campo requerido';
        //     $valido = 0;
        // }
        if(empty($posicion))
        {
            $error['posicion'] ='campo requerido';
            $valido = 0;
        }
        if(empty($id_profesional))
        {
            $error['id_profesional'] ='campo requerido';
            $valido = 0;
        }


        if($valido)
        {
            $registro = new SolicitudPabellonesQuirurgicosEquipo();
            $registro->id_solicitudes_pabellones_quirurgicos = $id_solicitudes_pabellones_quirurgicos;
            $registro->id_tipo_especialidad = $id_tipo_especialidad;
            $registro->id_sub_tipo_especialidad = $id_sub_tipo_especialidad;
            $registro->posicion = $posicion;
            $registro->id_profesional = $id_profesional;
            $registro->estado = 1;

            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registro exitosa';
                $datos['last_id'] = $registro->id;
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


    static public function registroMiEquipoProfesional($id_profesional_mi_equipo, $id_tipo_especialidad, $id_sub_tipo_especialidad, $posicion, $id_profesional)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($id_profesional_mi_equipo))
        {
            $error['id_profesional_mi_equipo'] ='campo requerido';
            $valido = 0;
        }
        // if(empty($id_tipo_especialidad))
        // {
        //     $error['id_tipo_especialidad'] ='campo requerido';
        //     $valido = 0;
        // }
        // if(empty($id_sub_tipo_especialidad))
        // {
        //     $error['id_sub_tipo_especialidad'] ='campo requerido';
        //     $valido = 0;
        // }
        if(empty($posicion))
        {
            $error['posicion'] ='campo requerido';
            $valido = 0;
        }
        if(empty($id_profesional))
        {
            $error['id_profesional'] ='campo requerido';
            $valido = 0;
        }


        if($valido)
        {
            $registro = new ProfesionalMiEquipoProfesional();
            $registro->id_profesional_mi_equipo = $id_profesional_mi_equipo;
            $registro->id_tipo_especialidad = $id_tipo_especialidad;
            $registro->id_sub_tipo_especialidad = $id_sub_tipo_especialidad;
            $registro->posicion = $posicion;
            $registro->id_profesional = $id_profesional;
            $registro->estado = 1;

            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registro exitosa';
                $datos['last_id'] = $registro->id;
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
