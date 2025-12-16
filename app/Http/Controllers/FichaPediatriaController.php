<?php

namespace App\Http\Controllers;

use App\Models\FichaAtencion;
use App\Models\FichaCirugiaGeneral;
use App\Models\FichaPadiatriaGeneralTunner;
use App\Models\FichaPediatriaGeneral;
use App\Models\FichaPediatriaOrtopedia;
use App\Models\FichaPediatriaQuemado;
use App\Models\FichaPediatriaTraumatologia;
use App\Models\FichaPediatriaTraumatologiaOrtopedia;
use App\Models\HoraMedica;
use App\Models\Profesional;
use Illuminate\Http\Request;

class FichaPediatriaController extends Controller
{

    /**** INICIO DE TUNNER */
    public function agergarTunner(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        // if(empty($request->id_ficha_atencion))
        // {
        //     $error['id_ficha_atencion'] = 'campo requerido';
        //     $valido = 0;
        // }
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
        if(empty($request->sexo))
        {
            $error['sexo'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->tanner))
        {
            $error['tanner'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->edad_biologica))
        {
            $error['edad_biologica'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->edad_cronologica))
        {
            $error['edad_cronologica'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->comentario))
        {
            $error['comentario'] = 'campo requerido';
            $valido = 0;
        }
        // if(empty($request->fecha))
        // {
        //     $error['fecha'] = 'campo requerido';
        //     $valido = 0;
        // }


        if($valido)
        {

            $profesional = Profesional::find($request->id_profesional);

            $tunner = new FichaPadiatriaGeneralTunner();

            $tunner->id_ficha_atencion = $request->id_ficha_atencion;
            $tunner->id_paciente = $request->id_paciente;
            $tunner->id_profesional = $request->id_profesional;
            $tunner->id_especialidad = $profesional->id_especialidad;
            $tunner->id_tipo_especialidad = $profesional->id_tipo_especialidad;
            $tunner->id_sub_tipoespecialidad = $profesional->id_sub_tipoespecialidad;
            $tunner->sexo = $request->sexo;
            $tunner->tanner = $request->tanner;
            $tunner->edad_biologica = $request->edad_biologica;
            $tunner->edad_cronologica = $request->edad_cronologica;
            $tunner->comentario = $request->comentario;
            $tunner->fecha = date('Y-m-d H:i:s');
            $tunner->otro = $request->otro;
            $tunner->estado = 1;

            if($tunner->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registro exitoso';
                $datos['last_id'] = $tunner->id;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'problemas al registrar';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['error'] = $error;
        }

        return $datos;
    }

    public function verTunner(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;
        if(empty($request->id_paciente))
        {
            $error['id_paciente'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->sexo))
        {
            $error['sexo'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $filtro= array();
            $filtro[] = array('id_paciente', $request->id_paciente);
            $filtro[] = array('sexo', $request->sexo);
            $registros = FichaPadiatriaGeneralTunner::where($filtro)->get();
            if($registros)
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registro';
                $datos['registros'] = $registros;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'problemas al buscar Registros';
            }

        }
        else
        {
            $datos['estado'] = 0;
            $datos['error'] = $error;
        }

        return $datos;
    }
    /**** CIERRE DE TUNNER */

    /**** INICIO DE PEDIATRIA GENERAL */
    public function storePediatriaGeneral(Request $request)
    {
        $campos_requeridos = 1;
        $mensaje = '';
        if(empty( trim($request->descripcion_hipotesis)))
        {
            $campos_requeridos = 0;
            $mensaje = 'El Diagnóstico es Requerido.\n Su Ficha Clínica NO ha sido Guardada aún. \n Si es solo Control, indicar Control de Patología.';
        }
        if($campos_requeridos)
        {
            /** FICHA ATENCION  */
            $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();

            $ficha = FichaAtencion::where('id', $hora_medica->id_ficha_atencion)->first();
            $id_profesional = $request->id_profesional_fc;
            $id_paciente = $request->id_paciente_fc;

            $ficha->motivo = $request->descripcion_consulta;
            $ficha->antecedentes = $request->antec_especialidad_ped;

            $ges = 0;
            if ($request->modal_ges == 'on') {
                $ges = 1;
            } else {
                $ges = 0;
            }

            $cronico = 0;
            if ($request->enf_cronico == 'on') {
                $cronico = 1;
            } else {
                $cronico = 0;
            }

            $confidencial = 0;
            if ($request->confidencial == 'on') {
                $confidencial = 1;
            } else {
                $confidencial = 0;
            }

            //Signos vitales
            if ($request->temperatura != '') {
                $ficha->temperatura = $request->temperatura;
            } else {
                $ficha->temperatura = null;
            }

            if ($request->pulso != '') {
                $ficha->pulso = $request->pulso;
            } else {
                $ficha->pulso = null;
            }

            if ($request->frecuencia_reposo != '') {
                $ficha->frecuencia_reposo = $request->frecuencia_reposo;
            } else {
                $ficha->frecuencia_reposo = null;
            }

            if ($request->peso != '') {
                $ficha->peso = $request->peso;
            } else {
                $ficha->peso = null;
            }

            if ($request->talla != '') {
                $ficha->talla = $request->talla;
            } else {
                $ficha->talla = null;
            }

            if ($request->imc != '') {
                $ficha->imc = $request->imc;
            } else {
                $ficha->imc = null;
            }

            if ($request->estado_nutricional != '') {
                $ficha->estado_nutricional = $request->estado_nutricional;
            } else {
                $ficha->estado_nutricional = null;
            }

            //presion Arterial
            if ($request->presion_bi != '') {
                $ficha->presion_bi = $request->presion_bi;
            } else {
                $ficha->presion_bi = null;
            }

            if ($request->presion_bd != '') {
                $ficha->presion_bd = $request->presion_bd;
            } else {
                $ficha->presion_bd = null;
            }

            if ($request->presion_de_pie != '') {
                $ficha->presion_de_pie = $request->presion_de_pie;
            } else {
                $ficha->presion_de_pie = null;
            }

            if ($request->presion_sentado != '') {
                $ficha->presion_sentado = $request->presion_sentado;
            } else {
                $ficha->presion_sentado = null;
            }

            //comunicacion y Traslado
            if ($request->ct_estado_conciencia != '') {
                $ficha->ct_estado_conciencia = $request->ct_estado_conciencia;
            } else {
                $ficha->ct_estado_conciencia = null;
            }

            if ($request->ct_lenguaje != '') {
                $ficha->ct_lenguaje = $request->ct_lenguaje;
            } else {
                $ficha->ct_lenguaje = null;
            }

            if ($request->ct_traslado != '') {
                $ficha->ct_traslado = $request->ct_traslado;
            } else {
                $ficha->ct_traslado = null;
            }

            $ficha->hipotesis_diagnostico = $request->descripcion_hipotesis;
            $ficha->diagnostico_ce10 = $request->descripcion_cie_esp;

            // $ficha->cronico = $cronico;
            // $ficha->ges = $ges;
            // $ficha->confidencial = $confidencial;
            $ficha->id_paciente = $id_paciente;
            $ficha->id_profesional = $id_profesional;
            $ficha->finalizada = 1;
            if (!$ficha->save())
            {
                return back()->with('error', 'Ficha Clínica con problema al guardar')->withInput();
            }
            else
            {
                $tipo_mensaje = 'success';
                $mensaje .= 'Ficha Clínica guardada de forma correcta\n';


                /** REGISTRO FICHA DERMATOLOGIA */
                $ficha_ped_gen = new FichaPediatriaGeneral();

                $ficha_ped_gen->id_ficha_atencion = $ficha->id;
                // $ficha_ped_gen->id_paciente = $id_paciente;
                $ficha_ped_gen->id_profesional = $id_profesional;
                $ficha_ped_gen->id_lugar_atencion = $request->id_lugar_atencion;

                $ficha_ped_gen->id_responsable = $request->id_responsable;

                $ficha_ped_gen->descripcion_consulta = $request->descripcion_consulta;
                $ficha_ped_gen->antec_especialidad_ped = $request->antec_especialidad_ped;

                $ficha_ped_gen->obs_gral_crec_desarr = $request->obs_gral_crec_desarr;
                $ficha_ped_gen->e_nutricional = $request->e_nutricional;
                $ficha_ped_gen->obs_e_nutricional = $request->obs_e_nutricional;
                $ficha_ped_gen->e_vacunas = $request->e_vacunas;
                $ficha_ped_gen->obs_e_vacunas = $request->obs_e_vacunas;
                $ficha_ped_gen->obs_ex_nutricional_vacunas = $request->obs_ex_nutricional_vacunas;
                $ficha_ped_gen->e_piel = $request->e_piel;
                $ficha_ped_gen->obs_e_piel = $request->obs_e_piel;
                $ficha_ped_gen->e_cabcuello = $request->e_cabcuello;
                $ficha_ped_gen->obs_e_cabcuello = $request->obs_e_cabcuello;
                $ficha_ped_gen->e_torax = $request->e_torax;
                $ficha_ped_gen->obs_e_torax = $request->obs_e_torax;
                $ficha_ped_gen->e_abdomen = $request->e_abdomen;
                $ficha_ped_gen->obs_e_abdomen = $request->obs_e_abdomen;
                $ficha_ped_gen->e_muscesq = $request->e_muscesq;
                $ficha_ped_gen->obs_e_muscesq = $request->obs_e_muscesq;
                $ficha_ped_gen->e_o_sent = $request->e_o_sent;
                $ficha_ped_gen->obs_e_o_sent = $request->obs_e_o_sent;
                $ficha_ped_gen->obs_ex_segmentario = $request->obs_ex_segmentario;
                $ficha_ped_gen->obs_ex_pedgen = $request->obs_ex_pedgen;

                $ficha_ped_gen->hip_diag_spec = $request->descripcion_hipotesis;
                $ficha_ped_gen->indicacion = $request->indicacion;

                if($ficha_ped_gen->save())
                {
                    $mensaje .= 'Ficha Clínica Pediatria General guardada de forma correcta\n';
                    //  finalizar hora medica
                    $hora_medica->id_estado = 6;
                    $mensaje_estado_hora_medica = '';
                    if (!$hora_medica->save()) {
                        $mensaje_estado_hora_medica .= 'Hora Medica con Problemas para finalizar.\n';
                    }
                    else
                    {
                        $mensaje_estado_hora_medica .= 'Hora medica Finalizada con Exito.\n';
                    }
                    $mensaje .= $mensaje_estado_hora_medica;

                }
                else
                {
                    $mensaje .= 'Ficha Clínica Pediatria General problema al registrar\n';
                }

                if($request->cerrarsession == 0 || $request->cerrarsession =='')
                {
                    /** redireccion Redirect funciona correcto */
                    return \Redirect::route('profesional.mi_agenda','lugares_atencion='.$request->id_lugar_atencion)->with($tipo_mensaje, $mensaje);
                }
                else if($request->cerrarsession == 1)
                {
                    //si funciona
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                    return \Redirect::route('home.ingreso');

                }
            }

        }
        else
        {
            return back()->with('error', $mensaje)->withInput();
        }
    }
    /**** CIERRE DE PEDIATRIA GENERAL */

    /**** INICIO DE PEDIATRIA CIRUGIA GENERAL */
    public function storePediatriaCirugiaGeneral(Request $request)
    {
        $campos_requeridos = 1;
        $mensaje = '';
        if(empty( trim($request->descripcion_hipotesis)))
        {
            $campos_requeridos = 0;
            $mensaje = 'El Diagnóstico es Requerido.\n Su Ficha Clínica NO ha sido Guardada aún. \n Si es solo Control, indicar Control de Patología.';
        }
        if($campos_requeridos)
        {
            /** FICHA ATENCION  */
            $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();

            $ficha = FichaAtencion::where('id', $hora_medica->id_ficha_atencion)->first();
            $id_profesional = $request->id_profesional_fc;
            $id_paciente = $request->id_paciente_fc;


            if(!empty($request->motivo_ped_cg))
                $ficha->motivo = $request->motivo_ped_cg;
            else if(!empty($request->motivo_ped_trau))
                $ficha->motivo = $request->motivo_ped_trau;
            else if(!empty($request->motivo_ped_quem))
                $ficha->motivo = $request->motivo_ped_quem;


            if(!empty($request->antec_especialidad_ped_cg))
                $ficha->antecedentes = $request->antec_especialidad_ped_cg;
            else if(!empty($request->antec_especialidad_ped_trau))
                $ficha->antecedentes = $request->antec_especialidad_ped_trau;
            else if(!empty($request->antec_especialidad_ped_quem))
                $ficha->antecedentes = $request->antec_especialidad_ped_quem;


            $ges = 0;
            if ($request->modal_ges == 'on') {
                $ges = 1;
            } else {
                $ges = 0;
            }

            $cronico = 0;
            if ($request->enf_cronico == 'on') {
                $cronico = 1;
            } else {
                $cronico = 0;
            }

            $confidencial = 0;
            if ($request->confidencial == 'on') {
                $confidencial = 1;
            } else {
                $confidencial = 0;
            }

            //Signos vitales
            if ($request->temperatura != '') {
                $ficha->temperatura = $request->temperatura;
            } else {
                $ficha->temperatura = null;
            }

            if ($request->pulso != '') {
                $ficha->pulso = $request->pulso;
            } else {
                $ficha->pulso = null;
            }

            if ($request->frecuencia_reposo != '') {
                $ficha->frecuencia_reposo = $request->frecuencia_reposo;
            } else {
                $ficha->frecuencia_reposo = null;
            }

            if ($request->peso != '') {
                $ficha->peso = $request->peso;
            } else {
                $ficha->peso = null;
            }

            if ($request->talla != '') {
                $ficha->talla = $request->talla;
            } else {
                $ficha->talla = null;
            }

            if ($request->imc != '') {
                $ficha->imc = $request->imc;
            } else {
                $ficha->imc = null;
            }

            if ($request->estado_nutricional != '') {
                $ficha->estado_nutricional = $request->estado_nutricional;
            } else {
                $ficha->estado_nutricional = null;
            }

            //presion Arterial
            if ($request->presion_bi != '') {
                $ficha->presion_bi = $request->presion_bi;
            } else {
                $ficha->presion_bi = null;
            }

            if ($request->presion_bd != '') {
                $ficha->presion_bd = $request->presion_bd;
            } else {
                $ficha->presion_bd = null;
            }

            if ($request->presion_de_pie != '') {
                $ficha->presion_de_pie = $request->presion_de_pie;
            } else {
                $ficha->presion_de_pie = null;
            }

            if ($request->presion_sentado != '') {
                $ficha->presion_sentado = $request->presion_sentado;
            } else {
                $ficha->presion_sentado = null;
            }

            //comunicacion y Traslado
            if ($request->ct_estado_conciencia != '') {
                $ficha->ct_estado_conciencia = $request->ct_estado_conciencia;
            } else {
                $ficha->ct_estado_conciencia = null;
            }

            if ($request->ct_lenguaje != '') {
                $ficha->ct_lenguaje = $request->ct_lenguaje;
            } else {
                $ficha->ct_lenguaje = null;
            }

            if ($request->ct_traslado != '') {
                $ficha->ct_traslado = $request->ct_traslado;
            } else {
                $ficha->ct_traslado = null;
            }

            $ficha->hipotesis_diagnostico = $request->descripcion_hipotesis;
            $ficha->diagnostico_ce10 = $request->descripcion_cie_esp;

            // $ficha->cronico = $cronico;
            // $ficha->ges = $ges;
            // $ficha->confidencial = $confidencial;
            $ficha->id_paciente = $id_paciente;
            $ficha->id_profesional = $id_profesional;
            $ficha->finalizada = 1;
            if (!$ficha->save())
            {
                return back()->with('error', 'Ficha Clínica con problema al guardar')->withInput();
            }
            else
            {
                $tipo_mensaje = 'success';
                $mensaje .= 'Ficha Clínica guardada de forma correcta\n';


                /** REGISTRO FICHA PEDIATRIA GENERAL */
                $ficha_ped_gen = new FichaPediatriaGeneral();

                $ficha_ped_gen->id_ficha_atencion = $ficha->id;
                // $ficha_ped_gen->id_paciente = $id_paciente;
                $ficha_ped_gen->id_profesional = $id_profesional;
                $ficha_ped_gen->id_lugar_atencion = $request->id_lugar_atencion;

                $ficha_ped_gen->id_responsable = $request->id_responsable;

                if(!empty($request->motivo_ped_cg))
                    $ficha_ped_gen->descripcion_consulta = $request->motivo_ped_cg;
                else if(!empty($request->motivo_ped_trau))
                    $ficha_ped_gen->descripcion_consulta = $request->motivo_ped_trau;
                else if(!empty($request->motivo_ped_quem))
                    $ficha_ped_gen->descripcion_consulta = $request->motivo_ped_quem;


                if(!empty($request->antec_especialidad_ped_cg))
                    $ficha_ped_gen->antec_especialidad_ped = $request->antec_especialidad_ped_cg;
                else if(!empty($request->antec_especialidad_ped_trau))
                    $ficha_ped_gen->antec_especialidad_ped = $request->antec_especialidad_ped_trau;
                else if(!empty($request->antec_especialidad_ped_quem))
                    $ficha_ped_gen->antec_especialidad_ped = $request->antec_especialidad_ped_quem;


                $ficha_ped_gen->obs_gral_crec_desarr = $request->obs_gral_crec_desarr;
                $ficha_ped_gen->e_nutricional = $request->e_nutricional;
                $ficha_ped_gen->obs_e_nutricional = $request->obs_e_nutricional;
                $ficha_ped_gen->e_vacunas = $request->e_vacunas;
                $ficha_ped_gen->obs_e_vacunas = $request->obs_e_vacunas;
                $ficha_ped_gen->obs_ex_nutricional_vacunas = $request->obs_ex_nutricional_vacunas;
                $ficha_ped_gen->e_piel = $request->e_piel;
                $ficha_ped_gen->obs_e_piel = $request->obs_e_piel;
                $ficha_ped_gen->e_cabcuello = $request->e_cabcuello;
                $ficha_ped_gen->obs_e_cabcuello = $request->obs_e_cabcuello;
                $ficha_ped_gen->e_torax = $request->e_torax;
                $ficha_ped_gen->obs_e_torax = $request->obs_e_torax;
                $ficha_ped_gen->e_abdomen = $request->e_abdomen;
                $ficha_ped_gen->obs_e_abdomen = $request->obs_e_abdomen;
                $ficha_ped_gen->e_muscesq = $request->e_muscesq;
                $ficha_ped_gen->obs_e_muscesq = $request->obs_e_muscesq;
                $ficha_ped_gen->e_o_sent = $request->e_o_sent;
                $ficha_ped_gen->obs_e_o_sent = $request->obs_e_o_sent;
                $ficha_ped_gen->obs_ex_segmentario = $request->obs_ex_segmentario;
                $ficha_ped_gen->obs_ex_pedgen = $request->obs_ex_pedgen;

                $ficha_ped_gen->hip_diag_spec = $request->descripcion_hipotesis;
                $ficha_ped_gen->indicacion = $request->ind_esp_cirugia;

                if($ficha_ped_gen->save())
                {
                    $mensaje .= 'Ficha Clínica Pediatria General guardada de forma correcta\n';

                    /** REGISTRO CIRUGIA GENERAL */
                    if(!empty($request->motivo_ped_cg))
                    {
                        $registroCG = static::registroCirugiaGeneral($request, $ficha->id, $id_profesional, $id_paciente);
                        if($registroCG['estado'] == 1)
                        {
                            $mensaje .= 'Registro de ficha Cirugia General Exitosa.\n';
                        }
                        else
                        {
                            $mensaje .= 'Registro de ficha Cirugia General Fallida.\n';
                        }
                    }
                    else
                    {
                        $mensaje .= 'No se requeire registro de ficha Cirugia General.\n';
                    }

                    /** REGISTRO TRAUMATOLOGIA Y ORTOPEDIA */
                    if(!empty($request->motivo_ped_trau))
                    {
                        $registroTO = static::registroTraumaOrtopedia($request, $ficha->id, $id_profesional, $id_paciente);
                        if($registroTO['estado'] == 1)
                        {
                            $mensaje .= 'Registro de ficha Traumatologia y Ortopedia Exitosa.\n';
                        }
                        else
                        {
                            $mensaje .= 'Registro de ficha Traumatologia y Ortopedia Fallida.\n';
                        }
                    }
                    else
                    {
                        $mensaje .= 'No se requeire registro de ficha Traumatologia y Ortopedia.\n';
                    }

                    /** REGISTRO QUEMADOS */
                    if(!empty($request->motivo_ped_quem))
                    {
                        $registroQ = static::registroQuemado($request, $ficha->id, $id_profesional, $id_paciente);
                        if($registroQ['estado'] == 1)
                        {
                            $mensaje .= 'Registro de ficha Quemado Exitosa.\n';
                        }
                        else
                        {
                            $mensaje .= 'Registro de ficha Quemado Fallida.\n';
                        }
                    }
                    else
                    {
                        $mensaje .= 'No se requeire registro de ficha Quemado.\n';
                    }



                    //  FINALIZAR HORA MEDICA
                    $hora_medica->id_estado = 6;
                    $mensaje_estado_hora_medica = '';
                    if (!$hora_medica->save()) {
                        $mensaje_estado_hora_medica .= 'Hora Medica con Problemas para finalizar.\n';
                    }
                    else
                    {
                        $mensaje_estado_hora_medica .= 'Hora medica Finalizada con Exito.\n';
                    }
                    $mensaje .= $mensaje_estado_hora_medica;

                }
                else
                {
                    $mensaje .= 'Ficha Clínica Pediatria General problema al registrar\n';
                }

                if($request->cerrarsession == 0 || $request->cerrarsession =='')
                {
                    /** redireccion Redirect funciona correcto */
                    return \Redirect::route('profesional.mi_agenda','lugares_atencion='.$request->id_lugar_atencion)->with($tipo_mensaje, $mensaje);
                }
                else if($request->cerrarsession == 1)
                {
                    //si funciona
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                    return \Redirect::route('home.ingreso');
                }
            }
        }
        else
        {
            return back()->with('error', $mensaje)->withInput();
        }
    }


    static public function registroCirugiaGeneral(Request $request, $id_ficha, $id_profesional, $id_paciente)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        /** REGISTRO FICHA CIRUGIA GENERAL */
        $ficha_cg = new FichaCirugiaGeneral();
        $ficha_cg->id_ficha_atencion = $id_ficha;
        $ficha_cg->id_profesional = $id_profesional;
        $ficha_cg->id_paciente = $id_paciente;
        $ficha_cg->sintoma_cons = $request->sintoma_cons_ped_cg;
        $ficha_cg->obs_sintoma_cons = $request->obs_sintoma_cons_ped_cg;
        $ficha_cg->antecedentes = $request->antec_especialidad_ped_cg;
        $ficha_cg->ind_esp_cirugia = $request->ind_esp_cirugia;
        $ficha_cg->e_general = $request->e_general;
        $ficha_cg->obs_e_general = $request->obs_e_general;
        $ficha_cg->e_signos_vit = $request->e_signos_vit;
        $ficha_cg->obs_e_signos_vit = $request->obs_e_signos_vit;
        $ficha_cg->e_dolor_loc = $request->e_dolor_loc;
        $ficha_cg->obs_e_dolor_loc = $request->obs_e_dolor_loc;
        $ficha_cg->masas_pal = $request->masas_pal;
        $ficha_cg->obs_masas_pal = $request->obs_masas_pal;
        $ficha_cg->e_piel_fan = $request->e_piel_fan;
        $ficha_cg->obs_e_piel_fan = $request->obs_e_piel_fan;
        $ficha_cg->ex_cabcuello = $request->ex_cabcuello;
        $ficha_cg->obs_ex_cabcuello = $request->obs_ex_cabcuello;
        $ficha_cg->ex_torax = $request->ex_torax;
        $ficha_cg->obs_ex_torax = $request->obs_ex_torax;
        $ficha_cg->ex_abdomen = $request->ex_abdomen;
        $ficha_cg->obs_ex_abdomen = $request->obs_ex_abdomen;
        $ficha_cg->ex_muscesq = $request->ex_muscesq;
        $ficha_cg->obs_ex_muscesq = $request->obs_ex_muscesq;
        $ficha_cg->ex_o_sent = $request->ex_o_sent;
        $ficha_cg->obs_ex_o_sent = $request->obs_ex_o_sent;
        $ficha_cg->obs_ex_segmentario = $request->obs_ex_segmentario;
        $ficha_cg->urgencia_cg = $request->urgencia_cg;
        $ficha_cg->obs_urgencia_cg = $request->obs_urgencia_cg;
        $ficha_cg->hosp_cg = $request->hosp_cg;
        $ficha_cg->obs_hosp_cg = $request->obs_hosp_cg;
        $ficha_cg->otrotto_cg = $request->otrotto_cg;
        $ficha_cg->obs_otrotto_cg = $request->obs_otrotto_cg;
        $ficha_cg->obs_plan_tratamiento = $request->obs_plan_tratamiento;
        $ficha_cg->hospen_cg = $request->hospen;
        $ficha_cg->obs_hospen_cg = $request->obs_hospen;
        $ficha_cg->hosp_enserv_cg = $request->hosp_enserv;
        $ficha_cg->obs_hosp_enserv_cg = $request->obs_hosp_enserv;
        $ficha_cg->otro_tto_cg = $request->otro_tto_cg;//
        $ficha_cg->obs_otro_tto_cg = $request->obs_otro_tto_cg;//
        $ficha_cg->obs_hospitalizacion_cg = $request->obs_hospitalizacion_cg;//
        $ficha_cg->eg_cpq_cg = $request->eg_cpq_cg;
        $ficha_cg->hoc_cpa_cg = $request->hoc_cpa_cg;
        $ficha_cg->masas_cpq_cg = $request->masas_cpq_cg;
        $ficha_cg->obs_egp_cpq_cg = $request->obs_egp_cpq_cg;
        // $ficha_cg->otro = '';
        $ficha_cg->estado = 1;

        if($ficha_cg->save())
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'exito';
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'falla';
        }

        return $datos;
    }
    /**** CIERRE DE PEDIATRIA CIRUGIA GENERAL */

    /** PEDIATRIA TRAUMATOLOGIA Y ORTOPEDIA */
    static public function registroTraumaOrtopedia(Request $request, $id_ficha, $id_profesional, $id_paciente)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        $info = static::json_crecimiento_desarrollo($request, $request->id_cns_tipo);

        if($info['estado'] == 1)
        {
            $ficha_trau_ort = new FichaPediatriaTraumatologiaOrtopedia();
            $ficha_trau_ort->id_lugar_atencion = $request->id_lugar_atencion;
            $ficha_trau_ort->id_ficha_atencion = $id_ficha;
            $ficha_trau_ort->id_ficha_pediatria = $request->id_ficha_pediatria;
            $ficha_trau_ort->id_paciente = $id_paciente;
            $ficha_trau_ort->id_responsable = $request->id_responsable;
            $ficha_trau_ort->id_profesional = $id_profesional;

            $ficha_trau_ort->sintoma_cons_ped_trau = $request->sintoma_cons_ped_trau;
            $ficha_trau_ort->obs_sintoma_cons_ped_trau = $request->obs_sintoma_cons_ped_trau;
            $ficha_trau_ort->motivo_ped_trau = $request->motivo_ped_trau;
            $ficha_trau_ort->antec_especialidad_ped_trau = $request->antec_especialidad_ped_trau;
            $ficha_trau_ort->antec_especialidad_gen_trau = $request->antec_especialidad_gen_trau;
            $ficha_trau_ort->id_cns_tipo = $request->id_cns_tipo;
            $ficha_trau_ort->cuerpo = $info['json'];
            $ficha_trau_ort->exfis_cabcuello = $request->exfis_cabcuello;
            $ficha_trau_ort->obs_exfis_cabcuello = $request->obs_exfis_cabcuello;
            $ficha_trau_ort->e_columna = $request->e_columna;
            $ficha_trau_ort->obs_e_columna = $request->obs_e_columna;
            $ficha_trau_ort->e_parrilla = $request->e_parrilla;
            $ficha_trau_ort->obs_e_parrilla = $request->obs_e_parrilla;
            $ficha_trau_ort->e_ext_sup = $request->e_ext_sup;
            $ficha_trau_ort->obs_e_ext_sup = $request->obs_e_ext_sup;
            $ficha_trau_ort->e_pelvis = $request->e_pelvis;
            $ficha_trau_ort->obs_e_pelvis = $request->obs_e_pelvis;
            $ficha_trau_ort->e_extinfer = $request->e_extinfer;
            $ficha_trau_ort->obs_e_extinfer = $request->obs_e_extinfer;
            $ficha_trau_ort->e_tend_lig = $request->e_tend_lig;
            $ficha_trau_ort->obs_e_tend_lig = $request->obs_e_tend_lig;
            $ficha_trau_ort->obs_ex_tra_fisico = $request->obs_ex_tra_fisico;
            $ficha_trau_ort->hospen = $request->hospen;
            $ficha_trau_ort->obs_hospen = $request->obs_hospen;
            $ficha_trau_ort->nom_inst = $request->nom_inst;
            $ficha_trau_ort->hosp_enserv = $request->hosp_enserv;
            $ficha_trau_ort->obs_hosp_enserv = $request->obs_hosp_enserv;
            $ficha_trau_ort->motivo_hosp = $request->motivo_hosp;
            $ficha_trau_ort->obs_motivo_hosp = $request->obs_motivo_hosp;
            $ficha_trau_ort->obs_hospitalizar = $request->obs_hospitalizar;

            if($ficha_trau_ort->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'exito';

                $datos['registroTraumatologia'] = static::registroTraumatologia($request, $id_ficha, $id_profesional, $id_paciente, $ficha_trau_ort->id);
                $datos['registroOrtopedia'] = static::registroOrtopedia($request, $id_ficha, $id_profesional, $id_paciente, $ficha_trau_ort->id);
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
            $datos['msj'] = 'tipo no encontrado';
        }

        return $datos;
    }

    static public function registroTraumatologia(Request $request, $id_ficha, $id_profesional, $id_paciente, $id_ficha_peditria_traumatologia_ortopedia)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        $ficha_trau = new FichaPediatriaTraumatologia();
        $ficha_trau->id_lugar_atencion = $request->id_lugar_atencion;
        $ficha_trau->id_ficha_atencion = $id_ficha;
        $ficha_trau->id_ficha_pediatria = $request->id_ficha_pediatria;
        $ficha_trau->id_ficha_traumatologia_ortopedia = $id_ficha_peditria_traumatologia_ortopedia;
        $ficha_trau->id_paciente = $id_paciente;
        $ficha_trau->id_responsable = $request->id_responsable;
        $ficha_trau->id_profesional = $id_profesional;

        $ficha_trau->t_causa_acc_esg = $request->t_causa_acc_esg;
        $ficha_trau->obs_t_causa_acc_esg = $request->obs_t_causa_acc_esg;
        $ficha_trau->tipo_lesion_esg = $request->tipo_lesion_esg;
        $ficha_trau->obs_tipo_lesion_esg = $request->obs_tipo_lesion_esg;
        $ficha_trau->signos_sintomas_esg = $request->signos_sintomas_esg;
        $ficha_trau->obs_signos_sintomas_esg = $request->obs_signos_sintomas_esg;
        $ficha_trau->complic_esg = $request->complic_esg;
        $ficha_trau->obs_complic_esg = $request->obs_complic_esg;
        $ficha_trau->localizacion_esguince = $request->localizacion_esguince;
        $ficha_trau->plan_tto_esg = $request->plan_tto_esg;
        $ficha_trau->obs_plan_tto_esg = $request->obs_plan_tto_esg;
        $ficha_trau->obs_esguince = $request->obs_esguince;
        $ficha_trau->t_causa_acc_fx = $request->t_causa_acc_fx;
        $ficha_trau->obs_t_causa_acc_fx = $request->obs_t_causa_acc_fx;
        $ficha_trau->tipo_lesion_fx = $request->tipo_lesion_fx;
        $ficha_trau->obs_tipo_lesion_fx = $request->obs_tipo_lesion_fx;
        $ficha_trau->signos_sintomas_fx = $request->signos_sintomas_fx;
        $ficha_trau->obs_signos_sintomas_fx = $request->obs_signos_sintomas_fx;
        $ficha_trau->complic_fx = $request->complic_fx;
        $ficha_trau->obs_complic_fx = $request->obs_complic_fx;
        $ficha_trau->local_fx = $request->local_fx;
        $ficha_trau->plan_tto_fx = $request->plan_tto_fx;
        $ficha_trau->obs_plan_tto_fx = $request->obs_plan_tto_fx;
        $ficha_trau->obs_fracturas = $request->obs_fracturas;
        $ficha_trau->ex_loc_tumo = $request->ex_loc_tumo;
        $ficha_trau->obs_ex_loc_tumo = $request->obs_ex_loc_tumo;
        $ficha_trau->e_signos_sint_tu = $request->e_signos_sint_tu;
        $ficha_trau->obs_e_signos_sint_tu = $request->obs_e_signos_sint_tu;
        $ficha_trau->e_crec_tu = $request->e_crec_tu;
        $ficha_trau->obs_e_crec_tu = $request->obs_e_crec_tu;
        $ficha_trau->plan_tto_tu = $request->plan_tto_tu;
        $ficha_trau->obs_plan_tto_tu = $request->obs_plan_tto_tu;
        $ficha_trau->obs_ex_masas_tu = $request->obs_ex_masas_tu;

        if($ficha_trau->save())
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'exito';

        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'falla';
        }

        return $datos;
    }

    static public function registroOrtopedia(Request $request, $id_ficha, $id_profesional, $id_paciente, $id_ficha_peditria_traumatologia_ortopedia)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        $ficha_ort = new FichaPediatriaOrtopedia();
        $ficha_ort->id_lugar_atencion = $request->id_lugar_atencion;
        $ficha_ort->id_ficha_atencion = $id_ficha;
        $ficha_ort->id_ficha_pediatria = $request->id_ficha_pediatria;
        $ficha_ort->id_ficha_traumatologia_ortopedia = $id_ficha_peditria_traumatologia_ortopedia;
        $ficha_ort->id_paciente = $id_paciente;
        $ficha_ort->id_responsable = $request->id_responsable;
        $ficha_ort->id_profesional = $id_profesional;

        $ficha_ort->tipo_ortopedia = $request->tipo_ortopedia;
        $ficha_ort->orto_peso_lac = $request->orto_peso_lac;
        $ficha_ort->orto_talla_lac = $request->orto_talla_lac;
        $ficha_ort->e_orto_lact_mov = $request->e_orto_lact_mov;
        $ficha_ort->obs_e_orto_lact_mov = $request->obs_e_orto_lact_mov;
        $ficha_ort->mov_cerv_ortolact = $request->mov_cerv_ortolact;
        $ficha_ort->ecm_ortolact = $request->ecm_ortolact;
        $ficha_ort->test_adams_ortolact = $request->test_adams_ortolact;
        $ficha_ort->angvellos_ortolact = $request->angvellos_ortolact;
        $ficha_ort->cifosis_lumbar_ortolact = $request->cifosis_lumbar_ortolact;
        $ficha_ort->flexoext_codo_ortolact = $request->flexoext_codo_ortolact;
        $ficha_ort->dedo_resorte_ortolact = $request->dedo_resorte_ortolact;
        $ficha_ort->rigidez_ortolact = $request->rigidez_ortolact;
        $ficha_ort->caderas_ortolact = $request->caderas_ortolact;
        $ficha_ort->abd_ortolact = $request->abd_ortolact;
        $ficha_ort->pliegues_ortolacr = $request->pliegues_ortolacr;
        $ficha_ort->rodillas_ortolact = $request->rodillas_ortolact;
        $ficha_ort->pie_flexdors_ortolact = $request->pie_flexdors_ortolact;
        $ficha_ort->plantar_ortolact = $request->plantar_ortolact;
        $ficha_ort->pie_valvaro_retro_ortolact = $request->pie_valvaro_retro_ortolact;
        $ficha_ort->obs_ex_ortopedia_ortolact = $request->obs_ex_ortopedia_ortolact;
        $ficha_ort->peso_ortoinf = $request->peso_ortoinf;
        $ficha_ort->talla_ortoinf = $request->talla_ortoinf;
        $ficha_ort->e_orto_inf_manip = $request->e_orto_inf_manip;
        $ficha_ort->obs_e_orto_inf_manip = $request->obs_e_orto_inf_manip;
        $ficha_ort->mov_vert_ortoinf = $request->mov_vert_ortoinf;
        $ficha_ort->ritmo_lumbosac_ortoinf = $request->ritmo_lumbosac_ortoinf;
        $ficha_ort->indicecif_ortoinf = $request->indicecif_ortoinf;
        $ficha_ort->irrit_radicular_ortoinf = $request->irrit_radicular_ortoinf;
        $ficha_ort->ex_neuro_bas_ortoinf = $request->ex_neuro_bas_ortoinf;
        $ficha_ort->balance_art_ortoinf = $request->balance_art_ortoinf;
        $ficha_ort->balance_musc_ortoinf = $request->balance_musc_ortoinf;
        $ficha_ort->hiperlaxart_ortoinf = $request->hiperlaxart_ortoinf;
        $ficha_ort->dismetriamsup_ortoinf = $request->dismetriamsup_ortoinf;
        $ficha_ort->sig_inf_ortoinf = $request->sig_inf_ortoinf;
        $ficha_ort->test_clin_ortoinf = $request->test_clin_ortoinf;
        $ficha_ort->obs_ex_ortoinf = $request->obs_ex_ortoinf;

        if($ficha_ort->save())
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'exito';

        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'falla';
        }

        return $datos;
    }

    public function json_crecimiento_desarrollo(Request $request, $id_cns_tipo)
    {
        $datos = array();

        $estructura_array = array(
            2 => 'cadera_rn|obs_cadera_rn|columna_rn|obs_columna_rn|p_ext_rn|obs_p_ext_rn|cadera_1m',
            3 => 'obs_cadera_1m|columna_1m|obs_columna_1m|p_ext_1m|obs_p_ext_1m|cadera_25',
            4 => 'obs_cadera_25|columna_25|obs_columna_25|p_ext_25|obs_p_ext_25|result_rx_25|cadera_611',
            5 => 'obs_cadera_611|columna_611|obs_columna_611|p_ext_611|obs_p_ext_611|cadera_1223',
            6 => 'obs_cadera_1223|columna_1223|obs_columna_1223|p_ext_1223|obs_p_ext_1223|marcha_24',
            7 => 'obs_marcha_24|ppf_24|obs_ppf_24|p_ppd_24|obs_p_ppd_24|p_gv_24|obs_p_gv_24|p_24_angcostbertane|p_24_angcalcplant|p_24_angmeary|p_24_angastracalcaneo|p_24_result_rx|marcha_69',
            8 => 'obs_marcha_69|ppf_69|obs_ppf_69|p_ppd_69|obs_p_ppd_69|p_69_g_valgo|obs_p_69_g_valgo|p_69_angcosbertani|p_69_ang_calplantar|p_69_ang_meary|p_69_angastracalcaneo|p_69_result_rx',
        );

        if(array_key_exists($id_cns_tipo, $estructura_array))
        {
            $estructura = explode('|', $estructura_array[$id_cns_tipo]);
            $info = array();
            foreach ($estructura as $key => $value)
            {
                $info[$value] = '';
            }
            foreach ($request as $key_param => $value_param)
            {
                $temp = $key_param;

                if(key_exists($temp,$info))
                    $info[$temp] = $value_param;
            }

            $datos['estado'] = 1;
            $datos['msj'] = 'json';
            $datos['json'] = json_encode($info);
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'tipo no encontrado';
        }
        return $datos;
    }
    /** CIERRE PEDIATRIA TRAUMATOLOGIA Y ORTOPEDIA */

    /** QUEMADO */
    static function registroQuemado(Request $request, $id_ficha, $id_profesional, $id_paciente)
    {

        $datos = array();
        $error = array();
        $valido = 1;

        $ficha_quem = new FichaPediatriaQuemado();
        $ficha_quem->id_lugar_atencion = $request->id_lugar_atencion;
        $ficha_quem->id_ficha_atencion = $id_ficha;
        $ficha_quem->id_ficha_pediatria = $request->id_ficha_pediatria;
        $ficha_quem->id_paciente = $id_paciente;
        $ficha_quem->id_responsable = $request->id_responsable;
        $ficha_quem->id_profesional = $id_profesional;
        $ficha_quem->sintoma_cons_ped_quem = $request->sintoma_cons_ped_quem;
        $ficha_quem->obs_sintoma_cons_quem = $request->obs_sintoma_cons_quem;
        $ficha_quem->motivo_ped_quem = $request->motivo_ped_quem;
        $ficha_quem->antec_especialidad_ped_quem = $request->antec_especialidad_ped_quem;
        $ficha_quem->antec_especialidad_gen_quem = $request->antec_especialidad_gen_quem;
        $ficha_quem->e_etiologia = $request->e_etiologia;
        $ficha_quem->obs_e_etiologia = $request->obs_e_etiologia;
        $ficha_quem->e_zona_esp = $request->e_zona_esp;
        $ficha_quem->obs_e_zona_esp = $request->obs_e_zona_esp;
        $ficha_quem->e_zona_neutra = $request->e_zona_neutra;
        $ficha_quem->obs_e_zona_neutra = $request->obs_e_zona_neutra;
        $ficha_quem->e_prof_quem = $request->e_prof_quem;
        $ficha_quem->sup_quem = $request->sup_quem;
        $ficha_quem->ind_gravedad_garces = $request->ind_gravedad_garces;
        $ficha_quem->obs_ex_segmentario = $request->obs_ex_segmentario;
        $ficha_quem->urgencia_quem_ped = $request->urgencia_quem_ped;
        $ficha_quem->obs_urgencia_quem_ped = $request->obs_urgencia_quem_ped;
        $ficha_quem->hosp_quem_ped = $request->hosp_quem_ped;
        $ficha_quem->obs_hosp_quem_ped = $request->obs_hosp_quem_ped;
        $ficha_quem->otrotto_quem_ped = $request->otrotto_quem_ped;
        $ficha_quem->obs_otrotto_quem_ped = $request->obs_otrotto_quem_ped;
        $ficha_quem->obs_plan_quem = $request->obs_plan_quem;
        $ficha_quem->hospen = $request->hospen;
        $ficha_quem->obs_hospen = $request->obs_hospen;
        $ficha_quem->nom_inst = $request->nom_inst;
        $ficha_quem->hosp_enserv = $request->hosp_enserv;
        $ficha_quem->obs_hosp_enserv = $request->obs_hosp_enserv;
        $ficha_quem->motivo_hosp = $request->motivo_hosp;
        $ficha_quem->obs_motivo_hosp = $request->obs_motivo_hosp;
        $ficha_quem->obs_hospitalizar = $request->obs_hospitalizar;

        if($ficha_quem->save())
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'exito';
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'falla';
        }

        return $datos;
    }
    /** CIERRE QUEMADO */

}
