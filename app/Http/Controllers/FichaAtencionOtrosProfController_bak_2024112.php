<?php

namespace App\Http\Controllers;


use App\Models\FichaOtrosProfesionales;
use App\Models\FichaOtProfControl;
use App\Models\FichaKinesiologia;
use App\Models\FichaKineNeurologia;
use App\Models\FichaKineTorax;
use App\Models\FichaKineTratamiento;
use App\Models\FichaFonoaudiologia;
use App\Models\FichaFonoHablaLenguaje;
use App\Models\FichaSicoAntPsiquiatricos;
use App\Models\FichaSicoBiopatografia;
use App\Models\FichaSicoExamenMental;
use App\Models\FichaSicoHistFamiliar;
use App\Models\FichaSicoHistFamiliarRelaciones;
use App\Models\FichaSicologia;
use App\Models\FichaSicoOtrosTest;
use App\Models\FichaSicosocial;
use App\Models\FichaSicoTestRorshchach;
use App\Models\FonoInforme;
use App\Models\HoraMedica;
use App\Models\KineInforme;
use App\Models\KinePlanificacion;
use App\Models\OtrosProfesionalesSeccionAntecedentes;
use App\Models\Profesional;
use Illuminate\Http\Request;


class FichaAtencionOtrosProfController extends Controller
{

    public function store_ot_prof(Request $request, $ficha)//listo - revisado
    {

        $id_profesional = $request->id_profesional_fc;
        $profesional = Profesional::find($id_profesional);
        $id_paciente = $request->id_paciente_fc;
        $id_especialidad = $profesional->id_especialidad_fc;
        $id_tipo_especialidad = $profesional->id_tipo_especialidad_fc;
        /** REGISTRO FICHA OTROS PROFESIONALES */
        $ficha_ot_prof = new FichaOtrosProfesionales();
        // $ficha_ot_prof->id = '';
        $ficha_ot_prof->id_especialidad = $id_especialidad;
        $ficha_ot_prof->id_tipo_especialidad = $id_tipo_especialidad;
        $ficha_ot_prof->id_profesional = $id_profesional;
        $ficha_ot_prof->id_paciente = $id_paciente;
        $ficha_ot_prof->tipo_consulta_d= $request->tipo_consulta_d;
        $ficha_ot_prof->der_por = $request->der_por;
        $ficha_ot_prof->cond_fis_ingreso = $request->cond_fis_ingreso;
        $ficha_ot_prof->num_sesiones = $request->num_sesiones;
        $ficha_ot_prof->dg_ingreso = $request->dg_ingreso;
        $ficha_ot_prof->solicitud_prof= $request->solicitud_prof;
        $ficha_ot_prof->espect_pcte = $request->espect_pcte;
        $ficha_ot_prof->hipotesis = $request->hipotesis;
        $ficha_ot_prof->indicaciones = $request->indicaciones;
        $ficha_ot_prof->otro = $request->otro;
        $ficha_ot_prof->otro1 = $request->otro1;
        $ficha_ot_prof->estado = 1;

        if($ficha_ot_prof->save())
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'Ficha Clínica  guardada de forma correcta\n';
            /** REGISTRO FICHA CONTROL OTROS PROFESIONALES   */
            {

                $ficha_control = new FichaOtProfControl();
                $ficha_control->ficha_ot_prof = $ficha->id;
                $ficha_control->id_paciente = $id_paciente;
                $ficha_control->id_profesional = $id_profesional;
                $ficha_control->cont_n_sesion= $request->cont_n_sesion;
                $ficha_control->cont_trabajo_en = $request->cont_trabajo_en;
                $ficha_control->cont_colaboracion = $request->cont_colaboracion;
                $ficha_control->cont_obj= $request->cont_obj;
                $ficha_control->otro = '';
                $ficha_control->otro2 = '';
                $ficha_control->estado = 1;

                if($ficha_control->save())
                {
                    $datos['controles']['estado'] = 1;
                    $datos['controles']['msj'] = 'Control registrado con exito\n';
                }
                else
                {
                    $datos['controles']['estado'] = 0;
                    $datos['controles']['msj'] = 'Control con problema al registrar\n';
                }
            }

        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Ficha Clínica  con problema al registrar\n';
        }

        return (object)$datos;

    }

    public function store_sico(Request $request)//listo - revisado
    {
        // echo json_encode($request->all());
        // die();
        $campos_requeridos = 1;
        $mensaje = '';
        if(empty( trim($request->hipotesis)))
        {
            $campos_requeridos = 0;
            $mensaje = 'El Diagnóstico es Requerido.\n Su Ficha Clínica NO ha sido Guardada aún. \n Si es solo Control, indicar Control de Patología.';
        }

        if($campos_requeridos)
        {
            /** FICHA ATENCION  */
            $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();
            $ficha = FichaOtrosProfesionales::where('id', $hora_medica->id_ficha_otros_prof)->first();
            $id_profesional = $request->id_profesional_fc;
            $id_paciente = $request->id_paciente_fc;
            $ficha->dg_ingreso = $request->dg_ingreso;
            // $ficha->antecedentes = $request->cond_fis_ingreso;
            $ficha->hipotesis = $request->hipotesis;
            $ficha->id_paciente = $id_paciente;
            $ficha->id_profesional = $id_profesional;
            $ficha->finalizada = 1;

            if (!$ficha->save())
            {
                return back()->with('error', 'Ficha Clínica con problema al guardar')->withInput();
            }
            else
            {
                $profesional = Profesional::find($id_profesional);

                $tipo_mensaje = 'success';
                $mensaje .= 'Ficha Clínica guardada de forma correcta\n';

                /** REGISTRO FICHA SICOLOGIA */
                $ficha_sico = new FichaSicologia();
                $ficha_sico->id_otros_profesionales = $ficha->id;
                $ficha_sico->id_profesional = $id_profesional;
                $ficha_sico->id_paciente = $id_paciente;
                $ficha_sico->presentacion= $request->presentacion;
                $ficha_sico->conciencia = $request->conciencia;
                $ficha_sico->actitud = $request->actitud;
                $ficha_sico->atencion_concentracion = $request->atencion_concentracion;
                $ficha_sico->afectividad = $request->afectividad;
                $ficha_sico->pensamiento = $request->pensamiento;
                $ficha_sico->sensopercepcion = $request->sensopercepcion;
                $ficha_sico->psicomotricidad = $request->psicomotricidad;
                $ficha_sico->sueno = $request->sueno;
                $ficha_sico->higiene = $request->higiene;
                $ficha_sico->alimentacion = $request->alimentacion;
                $ficha_sico->psi_solo_control = $request->psi_solo_control;
                $ficha_sico->psi_ter_indiv =$request->psi_ter_indiv;
                $ficha_sico->psi_ter_grup =$request->psi_ter_grup;
                $ficha_sico->psi_sol_hosp =$request->psi_sol_hosp;
                $ficha_sico->obs_plan_tratamiento =$request->obs_plan_tratamiento;
                $ficha_sico->dsm_5 =$request->dsm_5;
                $ficha_sico->dsm_5p =$request->dsm_5p;
                $ficha_sico->otro = '';
                $ficha_sico->otro1 = '';
                $ficha_sico->estado = 1;
                if($ficha_sico->save())
                {
                    $mensaje .= 'Ficha Clínica Sicología guardada de forma correcta\n';

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

                    /** REGISTRO SECCION ANTECEDENTES */
                    // otros_prof_seccion_antecedentes
                    $seccion_ant = new OtrosProfesionalesSeccionAntecedentes();
                    $seccion_ant->id_ficha_otros_prof = $ficha->id;
                    $seccion_ant->id_profesional = $id_profesional;
                    $seccion_ant->id_paciente = $id_paciente;
                    $seccion_ant->id_especialidad = $profesional->id_especialidad;
                    $seccion_ant->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                    $seccion_ant->pat_pat = $request->pat_pat;
                    $seccion_ant->pat_mat = $request->pat_mat;
                    $seccion_ant->pat_fam = $request->pat_fam;
                    $seccion_ant->pat_prop = $request->pat_prop;
                    $seccion_ant->sint_act = $request->sint_act;
                    $seccion_ant->gin_obt = $request->gin_obt;
                    $seccion_ant->ot_pat_act = $request->ot_pat_act;
                    $seccion_ant->ot_sint_act = $request->ot_sint_act;
                    $seccion_ant->ot_ant_gine = $request->ot_ant_gine;
                    $seccion_ant->otro = '';
                    $seccion_ant->otro1 = '';
                    $seccion_ant->estado = 1;
                    if($seccion_ant->save())
                    {
                        $mensaje .= 'Ficha Seccion Antecedentes registrada con exito\n';
                    }
                    else
                    {
                        $mensaje .= 'Ficha Seccion Antecedentes con problema al registrar\n';
                    }

                    /** REGISTRO FICHA SICOSOCIAL   */
                    $ficha_sicosocial = new FichaSicosocial();
                    $ficha_sicosocial->id_ficha_otros_prof = $ficha->id;
                    $ficha_sicosocial->id_especialidad = $profesional->id_especialidad;
                    $ficha_sicosocial->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                    $ficha_sicosocial->id_paciente = $id_paciente;
                    $ficha_sicosocial->id_profesional = $id_profesional;
                    $ficha_sicosocial->lugar_nacimiento = $request->lugar_nacimiento;
                    $ficha_sicosocial->estado_civil = $request->estado_civil;
                    $ficha_sicosocial->niv_ed = $request->niv_ed;
                    $ficha_sicosocial->ocupacion = $request->ocupacion;
                    $ficha_sicosocial->religion = $request->religion;
                    $ficha_sicosocial->vive_con = $request->vive_con;
                    $ficha_sicosocial->vive_obs = $request->vive_obs;
                    $ficha_sicosocial->alcohol = $request->alcohol;
                    $ficha_sicosocial->tabaco = $request->tabaco;
                    $ficha_sicosocial->sustancias_ilicitas = $request->sustancias_ilicitas;
                    $ficha_sicosocial->sexualidad = $request->sexualidad;
                    $ficha_sicosocial->com_generales = $request->com_generales;
                    $ficha_sicosocial->ant_laborales = $request->ant_laborales;
                    $ficha_sicosocial->ant_esparc = $request->ant_esparc;
                    $ficha_sicosocial->obs_generales = $request->obs_generales;
                    $ficha_sicosocial->otro = '';
                    $ficha_sicosocial->otro1 = '';
                    $ficha_sicosocial->estado = 1;

                    if($ficha_sicosocial->save())
                    {
                        $mensaje .= 'Ficha Sico-Social registrada con exito\n';
                    }
                    else
                    {
                        $mensaje .= 'Ficha Sico-Social con problema al registrar\n';
                    }

                    /** REGISTRO FICHA SICOBIOPATOGRAFIA   */
                    $ficha_sicobiopatografia = new FichaSicoBiopatografia();
                    $ficha_sicobiopatografia->id_ficha_otros_prof = $ficha->id;
                    $ficha_sicobiopatografia->id_especialidad = $profesional->id_especialidad;
                    $ficha_sicobiopatografia->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                    $ficha_sicobiopatografia->id_paciente = $id_paciente;
                    $ficha_sicobiopatografia->id_profesional = $id_profesional;
                    $ficha_sicobiopatografia->prenatal = $request->prenatal;
                    $ficha_sicobiopatografia->natal = $request->natal;
                    $ficha_sicobiopatografia->infancia = $request->infancia;
                    $ficha_sicobiopatografia->adolescencia = $request->adolescencia;
                    $ficha_sicobiopatografia->edad_adulta = $request->edad_adulta;
                    $ficha_sicobiopatografia->ad_mayor = $request->ad_mayor;
                    $ficha_sicobiopatografia->actualidad = $request->actualidad;
                    $ficha_sicobiopatografia->otro = '';
                    $ficha_sicobiopatografia->otro1 = '';
                    $ficha_sicobiopatografia->estado = 1;

                    if($ficha_sicobiopatografia->save())
                    {
                        $mensaje .= 'Ficha Sico-Biopatografía registrada con exito\n';
                    }
                    else
                    {
                        $mensaje .= 'Ficha Sico-Biopatografía con problema al registrar\n';
                    }

                    /** REGISTRO FICHA SICOHISTORIAFAMILIAR   */
                    $ficha_sico_hist_fam = new FichaSicoHistFamiliar();
                    $ficha_sico_hist_fam->id_ficha_otros_prof = $ficha->id;
                    $ficha_sico_hist_fam->id_especialidad = $profesional->id_especialidad;
                    $ficha_sico_hist_fam->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                    $ficha_sico_hist_fam->id_paciente = $id_paciente;
                    $ficha_sico_hist_fam->id_profesional = $id_profesional;

                    $ficha_sico_hist_fam->nombre_padre = $request->nombre_padre;
                    $ficha_sico_hist_fam->rel_padre = $request->rel_padre;

                    $ficha_sico_hist_fam->nombre_madre = $request->nombre_madre;
                    $ficha_sico_hist_fam->rel_madre = $request->rel_madre;

                    $ficha_sico_hist_fam->rel_entre_padres = $request->rel_entre_padres;

                    $ficha_sico_hist_fam->tiene_hnos = $request->tiene_hnos;
                    $ficha_sico_hist_fam->cantidad_hnos = $request->cantidad_hnos;
                    // $ficha_sico_hist_fam->nombre_hno = $request->nombre_hno;
                    // $ficha_sico_hist_fam->rel_hf_hno = $request->rel_hf_hno;
                    $ficha_sico_hist_fam->rel_entre_hnos = $request->rel_entre_hnos;

                    $ficha_sico_hist_fam->nombre_pareja = $request->nombre_pareja;
                    $ficha_sico_hist_fam->rel_pareja = $request->rel_pareja;
                    $ficha_sico_hist_fam->rel_hf_pareja_obs = $request->rel_hf_pareja_obs;

                    $ficha_sico_hist_fam->tiene_hijos = $request->tiene_hijos;
                    $ficha_sico_hist_fam->cantidad_hijos = $request->cantidad_hijos;
                    // $ficha_sico_hist_fam->nombre_hijo = $request->nombre_hijo;
                    // $ficha_sico_hist_fam->rel_hijo = $request->rel_hijo;
                    $ficha_sico_hist_fam->rel_entre_hijos = $request->rel_entre_hijos;

                    $ficha_sico_hist_fam->cantidad_ot_per = $request->cantidad_ot_per;
                    // $ficha_sico_hist_fam->nombre_ot_per = $request->nombre_ot_per;
                    // $ficha_sico_hist_fam->rel_ot_per = $request->rel_ot_per;
                    $ficha_sico_hist_fam->rel_obs_generales = $request->rel_obs_generales;

                    $ficha_sico_hist_fam->otro = '';
                    $ficha_sico_hist_fam->otro1 = '';
                    $ficha_sico_hist_fam->estado = 1;
                    if($ficha_sico_hist_fam->save())
                    {
                        $mensaje .= 'Ficha Sico-Historia-Familiar registrada con exito\n';


                        if( $request->tiene_hnos == 1 )
                        {
                            for ($i=1; $i <= $request->cantidad_hnos ; $i++) {
                                $ficha_relacion = new FichaSicoHistFamiliarRelaciones();
                                $ficha_relacion->id_ficha_sico_hist_familiar = $ficha_sico_hist_fam->id;
                                $ficha_relacion->id_especialidad = $ficha->id_especialidad;
                                $ficha_relacion->id_tipo_especialidad = $ficha->id_tipo_especialidad;
                                $ficha_relacion->id_ficha_otros_prof = $ficha->id;
                                $ficha_relacion->id_profesional = $id_profesional;
                                $ficha_relacion->id_paciente = $id_paciente;
                                $ficha_relacion->id_tipo_relacion = 1;
                                $ficha_relacion->nombre = $request['psi_hf_nombre_hno_'.$i];
                                $ficha_relacion->rel = $request['psi_rel_hf_hno_'.$i];
                                $ficha_relacion->otro = '';
                                $ficha_relacion->estado = 1;
                                if($ficha_relacion->save())
                                {
                                    $mensaje .= 'Ficha Sico-Historia-Familiar hermnano registrada con exito\n';
                                }
                                else
                                {
                                    $mensaje .= 'Ficha Sico-Historia-Familiar hermnano '.$request->psi_hf_nombre_hno_.''.$i.'falla en registro \n';
                                }
                            }

                        }

                        if( $request->tiene_hijos == 1)
                        {
                            for ($i=1; $i <= $request->cantidad_hijos ; $i++) {
                                $ficha_relacion = new FichaSicoHistFamiliarRelaciones();
                                $ficha_relacion->id_ficha_sico_hist_familiar = $ficha_sico_hist_fam->id;
                                $ficha_relacion->id_especialidad = $ficha->id_especialidad;
                                $ficha_relacion->id_tipo_especialidad = $ficha->id_tipo_especialidad;
                                $ficha_relacion->id_ficha_otros_prof = $ficha->id;
                                $ficha_relacion->id_profesional = $id_profesional;
                                $ficha_relacion->id_paciente = $id_paciente;
                                $ficha_relacion->id_tipo_relacion = 2;
                                $ficha_relacion->nombre = $request['psi_hf_nombre_hno_'.$i];
                                $ficha_relacion->rel = $request['psi_rel_hf_hno_'.$i];
                                $ficha_relacion->otro = '';
                                $ficha_relacion->estado = 1;
                                if($ficha_relacion->save())
                                {
                                    $mensaje .= 'Ficha Sico-Historia-Familiar hermnano registrada con exito\n';
                                }
                                else
                                {
                                    $mensaje .= 'Ficha Sico-Historia-Familiar hermnano '.$request->psi_hf_nombre_hno_.''.$i.'falla en registro \n';
                                }
                            }
                        }

                        if( $request->cantidad_ot_per == 1)
                        {
                            for ($i=1; $i <= $request->cantidad_ot_per ; $i++) {
                                $ficha_relacion = new FichaSicoHistFamiliarRelaciones();
                                $ficha_relacion->id_ficha_sico_hist_familiar = $ficha_sico_hist_fam->id;
                                $ficha_relacion->id_especialidad = $ficha->id_especialidad;
                                $ficha_relacion->id_tipo_especialidad = $ficha->id_tipo_especialidad;
                                $ficha_relacion->id_ficha_otros_prof = $ficha->id;
                                $ficha_relacion->id_profesional = $id_profesional;
                                $ficha_relacion->id_paciente = $id_paciente;
                                $ficha_relacion->id_tipo_relacion = 3;
                                $ficha_relacion->nombre = $request['psi_hf_nombre_ot_per_'.$i];
                                $ficha_relacion->rel = $request['psi_hf_rel_ot_per_'.$i];
                                $ficha_relacion->otro = '';
                                $ficha_relacion->estado = 1;
                                if($ficha_relacion->save())
                                {
                                    $mensaje .= 'Ficha Sico-Historia-Familiar hermnano registrada con exito\n';
                                }
                                else
                                {
                                    $mensaje .= 'Ficha Sico-Historia-Familiar hermnano '.$request->psi_hf_nombre_hno_.''.$i.'falla en registro \n';
                                }
                            }
                        }
                    }
                    else
                    {
                        $mensaje .= 'Ficha Sico-Historia-Familiar con problema al registrar\n';
                    }

                    /** REGISTRO FICHA SICOANTECEDENTES PSIQUIATRICOS   */
                    $ficha_sicoantpsiq = new FichaSicoAntPsiquiatricos();
                    $ficha_sicoantpsiq->id_ficha_otros_prof = $ficha->id;
                    $ficha_sicoantpsiq->id_especialidad = $profesional->id_especialidad;
                    $ficha_sicoantpsiq->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                    $ficha_sicoantpsiq->id_paciente = $id_paciente;
                    $ficha_sicoantpsiq->id_profesional = $id_profesional;
                    $ficha_sicoantpsiq->ant_medicos = $request->ant_medicos;
                    $ficha_sicoantpsiq->ant_suicidio = $request->ant_suicidio;
                    $ficha_sicoantpsiq->enf_mentales = $request->enf_mentales;
                    $ficha_sicoantpsiq->trat_psicologicos_prev = $request->trat_psicologicos_prev;
                    $ficha_sicoantpsiq->trat_psiquiatricos_prev = $request->trat_psiquiatricos_prev;
                    $ficha_sicoantpsiq->medicacion_actual = $request->medicacion_actual;
                    $ficha_sicoantpsiq->otro = '';
                    $ficha_sicoantpsiq->otro1 = '';
                    $ficha_sicoantpsiq->estado = 1;
                    if($ficha_sicoantpsiq->save())
                    {
                        $mensaje .= 'Ficha Sico-Antecedentes Psiquiatricos registrada con exito\n';
                    }
                    else
                    {
                        $mensaje .= 'Ficha Sico-Antecedentes Psiquiatricos con problema al registrar\n';
                    }

                    /** REGISTRO FICHA SICO EXAMEN MENTAL   */
                    $ficha_sicoexamenmental = new FichaSicoExamenMental();

                    $ficha_sicoexamenmental->id_ficha_otros_prof = $ficha->id;
                    $ficha_sicoexamenmental->id_especialidad = $profesional->id_especialidad;
                    $ficha_sicoexamenmental->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                    $ficha_sicoexamenmental->id_paciente = $id_paciente;
                    $ficha_sicoexamenmental->id_profesional = $id_profesional;
                    $ficha_sicoexamenmental->presentacion = $request->presentacion;
                    $ficha_sicoexamenmental->conciencia = $request->conciencia;
                    $ficha_sicoexamenmental->actitud = $request->actitud;
                    $ficha_sicoexamenmental->atencion_concentracion = $request->atencion_concentracion;
                    $ficha_sicoexamenmental->afectividad = $request->afectividad;
                    $ficha_sicoexamenmental->pensamiento = $request->pensamiento;
                    $ficha_sicoexamenmental->sensopercepcion = $request->sensopercepcion;
                    $ficha_sicoexamenmental->psicomotricidad = $request->psicomotricidad;
                    $ficha_sicoexamenmental->sueno = $request->sueno;
                    $ficha_sicoexamenmental->higiene = $request->higiene;
                    $ficha_sicoexamenmental->alimentacion = $request->alimentacion;
                    $ficha_sicoexamenmental->otro = '';
                    $ficha_sicoexamenmental->otro1 = '';
                    $ficha_sicoexamenmental->estado = 1;
                    if($ficha_sicoexamenmental->save())
                    {
                        $mensaje .= 'Ficha Sico-Examen-Mental registrada con exito\n';
                    }
                    else
                    {
                        $mensaje .= 'Ficha Sico-Examen-Mental con problema al registrar\n';
                    }

                    if($request->cerrarsession == 0 || $request->cerrarsession =='')
                    {
                        /** redireccion Redirect funciona correcto */
                        return \Redirect::route('profesional.mi_agenda','lugares_atencion='.$request->id_lugar_atencion)->with($tipo_mensaje, $mensaje);
                    }
                    else if($request->cerrarsession == 1)
                    {
                        //si funciona
                        // $request->session()->invalidate();
                        $request->session()->regenerateToken();
                        return \Redirect::route('home.ingreso');

                    }
                }
                else
                {
                    $mensaje .= 'Ficha Clínica Sicología con problema al registrar\n';
                }
            }

        }
        else
        {
            return back()->with('error', $mensaje)->withInput();
        }
    }




    public function store_kine(Request $request)// revisado
    {

        $campos_requeridos = 1;
        $mensaje = '';
        if(empty( trim($request->hipotesis)))
        {
            $campos_requeridos = 0;
            $mensaje = 'El Diagnóstico es Requerido.\n Su Ficha Clínica NO ha sido Guardada aún. \n Si es solo Control, indicar Control de Patología.';
        }

        if($campos_requeridos)
        {
            /** FICHA ATENCION OTROS PROFESIONALES*/
            $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();
            $ficha = FichaOtrosProfesionales::where('id', $hora_medica->id_ficha_otros_prof)->first();
            $id_profesional = $request->id_profesional_fc;
            $id_paciente = $request->id_paciente_fc;
            $ficha->motivo = $request->dg_ingreso;
            $ficha->antecedentes = $request->cond_fis_ingreso;
            $ficha->hipotesis = $request->hipotesis;
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

                /** ficha otros prof general */
                $store_ot = $this->store_ot_prof($request, $ficha);
                if($store_ot->estado == 1)
                {
                    $mensaje .= $store_ot->msj;

                    /** REGISTRO FICHA KINESIOLOGIA */
                    $ficha_kine = new FichaKinesiologia();
                    $ficha_kine->id_ficha_otros_prof = $ficha->id;
                    $ficha_kine->id_profesional = $id_profesional;
                    $ficha_kine->id_paciente = $id_paciente;
                    $ficha_kine->postura = $request->postura;
                    $ficha_kine->alineacion_post = $request->alineacion_post;
                    $ficha_kine->post_descripcion = $request->post_descripcion;
                    $ficha_kine->exp_post = $request->exp_post;
                    $ficha_kine->obs_post = $request->obs_post;
                    $ficha_kine->expl_lateral = $request->expl_lateral;
                    $ficha_kine->aprec_expl_lateral = $request->aprec_expl_lateral;
                    $ficha_kine->obs_exp_columna_total = $request->obs_exp_columna_total;
                    $ficha_kine->resultado_examenes_ct = $request->resultado_examenes_ct;
                    $ficha_kine->cerv_insp = $request->cerv_insp;
                    $ficha_kine->ex_cerv_insp = $request->ex_cerv_insp;
                    $ficha_kine->cerv_palp = $request->cerv_palp;
                    $ficha_kine->ex_cerv_palp =$request->ex_cerv_palp;
                    $ficha_kine->obs_ex_col_cerv =$request->obs_ex_col_cerv;
                    $ficha_kine->resultado_examenes_cc =$request->resultado_examenes_cc;
                    $ficha_kine->dorso_lum_insp =$request->dorso_lum_insp;
                    $ficha_kine->ex_dorso_lum_insp =$request->ex_dorso_lum_insp;
                    $ficha_kine->dors_lumb_palp =$request->dors_lumb_palp;
                    $ficha_kine->ex_dors_lumb_palp = $request->ex_dors_lumb_palp;
                    $ficha_kine->obs_ex_col_dors_lumb = $request->obs_ex_col_dors_lumb;
                    $ficha_kine->resultado_examenes_dl = $request->resultado_examenes_dl;
                    $ficha_kine->sacro_dol = $request->sacro_dol;
                    $ficha_kine->detalle_sacro_dol =$request->detalle_sacro_dol;
                    $ficha_kine->sacro_palp = $request->sacro_palp;
                    $ficha_kine->detalle_sacro_palp = $request->detalle_sacro_palp;
                    $ficha_kine->obs_sacro_palp = $request->obs_sacro_palp;
                    $ficha_kine->obs_ex_sacrocoxis = $request->obs_ex_sacrocoxis;
                    $ficha_kine->ex_articulacion = $request->ex_articulacion;
                        //Json
                        // ex_articulacion = [
                                // [
                                    // articulacion => '',
                                    // dolor => '',
                                    // funcionalidad=> '',
                                    // deformaciones
                                    //observaciones
                                // ]
                            // ]
                    $ficha_kine->obs_gen_artic = $request->obs_gen_artic;
                    $ficha_kine->ex_tendones = $request->ex_tendones;


                            // ex_tendones = [
                                    // [
                                        // tendon => '',
                                        // dolor => '',
                                        // funcionalidad=> '',
                                        // deformaciones
                                        //observaciones
                                    // ]
                                // ]
                    $ficha_kine->obs_gen_tendon = $request->obs_gen_tendon;
                    $ficha_kine->otro = '';
                    $ficha_kine->otro1 = '';
                    $ficha_kine->estado = 1;

                    if($ficha_kine->save())
                    {
                        $mensaje .= 'Ficha Clínica Kinesiogía guardada de forma correcta\n';

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


                        /** REGISTRO FICHA KINESIOLOGIA NEUROLOGIA   */

                        {

                            $ficha_kine_neuro = new FichaKineNeurologia();
                            $ficha_kine_neuro->id_ficha_atencion_otros = $ficha->id;
                            $ficha_kine_neuro->id_ficha_kine = $ficha_kine->id;
                            $ficha_kine_neuro->id_paciente = $id_paciente;
                            $ficha_kine_neuro->id_profesional = $id_profesional;
                            $ficha_kine_neuro->lenguaje= $request->lenguaje;
                            $ficha_kine_neuro->t_alt_leng = $request->t_alt_leng;
                            $ficha_kine_neuro->leng_alt_mod = $request->leng_alt_mod;
                            $ficha_kine_neuro->audio= $request->audio;
                            $ficha_kine_neuro->audifono = $request->audifono;
                            $ficha_kine_neuro->ap_capac = $request->ap_capac;
                            $ficha_kine_neuro->leng_descrip_alt = $request->leng_descrip_alt;
                            $ficha_kine_neuro->obs_leng = $request->obs_leng;
                            $ficha_kine_neuro->mem_exam= $request->mem_exam;
                            $ficha_kine_neuro->descrip_mem = $request->descrip_mem;
                            $ficha_kine_neuro->praxias = $request->praxias;
                            $ficha_kine_neuro->fcs_descripcion = $request->fcs_descripcion;
                            $ficha_kine_neuro->capvis_tipo = $request->capvis_tipo;
                            $ficha_kine_neuro->capvis_descrip = $request->capvis_descrip;
                            $ficha_kine_neuro->percve_ex = $request->percve_ex;
                            $ficha_kine_neuro->percve_descrip = $request->percve_descrip;
                            $ficha_kine_neuro->otro = '';
                            $ficha_kine_neuro->otro2 = '';
                            $ficha_kine_neuro->estado = 1;

                            if($ficha_kine_neuro->save())
                            {
                                $mensaje .= 'Ficha KINESIOLOGÍA-NEUROLOGIA registrada con exito\n';
                            }
                            else
                            {
                                $mensaje .= 'Ficha KINESIOLOGÍA-NEUROLOGIA con problema al registrar\n';
                            }
                        }

                        /** REGISTRO FICHA KINESIOLOGIA TORAX   */

                        {

                            $ficha_kine_torax = new FichaKineTorax();

                            $ficha_kine_torax->id_ficha_otros_prof = $ficha->id;
                            $ficha_kine_torax->id_ficha_kine = $ficha_kine->id;
                            $ficha_kine_torax->id_paciente = $id_paciente;
                            $ficha_kine_torax->id_profesional = $id_profesional;
                            $ficha_kine_torax->resp_tipo= $request->resp_tipo;
                            $ficha_kine_torax->ftorax = $request->ftorax;
                            $ficha_kine_torax->storax = $request->storax;
                            $ficha_kine_torax->resp_desc= $request->resp_desc;
                            $ficha_kine_torax->resp_piel = $request->resp_piel;
                            $ficha_kine_torax->resp_cian = $request->resp_cian;
                            $ficha_kine_torax->resp_mov = $request->resp_mov;
                            $ficha_kine_torax->resp_tiraje = $request->resp_tiraje;
                            $ficha_kine_torax->resp_descrip= $request->resp_descrip;
                            $ficha_kine_torax->palp_pd= $request->palp_pd;
                            $ficha_kine_torax->palp_vv = $request->palp_vv;
                            $ficha_kine_torax->palp_exp = $request->palp_exp;
                            $ficha_kine_torax->palp_elast = $request->palp_elast;
                            $ficha_kine_torax->palp_frem = $request->palp_frem;
                            $ficha_kine_torax->palp_desc = $request->palp_desc;
                            $ficha_kine_torax->perc_descrip = $request->perc_descrip;
                            $ficha_kine_torax->r_normal_pre = $request->r_normal_pre;
                            $ficha_kine_torax->r_adv_pre = $request->r_adv_pre;
                            $ficha_kine_torax->r_normal_post = $request->r_normal_post;
                            $ficha_kine_torax->r_adv_post = $request->r_adv_post;
                            $ficha_kine_torax->resp_comen = $request->resp_comen;
                            $ficha_kine_torax->ex_resp_descrip = $request->ex_resp_descrip;
                            $ficha_kine_torax->resp_desc_obj = $request->resp_desc_obj;
                            $ficha_kine_torax->otro = '';
                            $ficha_kine_torax->otro2 = '';
                            $ficha_kine_torax->estado = 1;

                            if($ficha_kine_torax->save())
                            {
                                $mensaje .= 'Ficha KINESIOLOGÍA-RESPIRATORIA registrada con exito\n';
                            }
                            else
                            {
                                $mensaje .= 'Ficha KINESIOLOGÍA-RESPIRATORIA con problema al registrar\n';

                            }
                        }




                        /** REGISTRO FICHA TRATAMIENTO KINESIOLOGIA   */

                        {

                            $ficha_kine_trat= new FichaKineTratamiento();

                            $ficha_kine_trat->id_ficha_otros_prof = $ficha->id;
                            $ficha_kine_trat->id_ficha_kine = $ficha_kine->id;
                            $ficha_kine_trat->id_paciente = $id_paciente;
                            $ficha_kine_trat->id_profesional = $id_profesional;
                            $ficha_kine_trat->tipo_trat= $request->tipo_trat;
                            $ficha_kine_trat->r_comentario = $request->r_comentario;
                            $ficha_kine_trat->otro = '';
                            $ficha_kine_trat->otro2 = '';
                            $ficha_kine_trat->estado = 1;

                            if($ficha_kine_trat->save())
                            {
                                $mensaje .= 'Ficha CONTROL registrada con exito\n';
                            }
                            else
                            {
                                $mensaje .= 'Ficha CONTROL con problema al registrar\n';

                            }
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
                    else
                    {
                        $mensaje .= 'Ficha Clínica Kinesiología con problema al registrar\n';
                    }
                }
                else
                {
                    $mensaje .= $store_ot->msj;
                }
            }
        }
        else
        {
            return back()->with('error', $mensaje)->withInput();
        }
    }

    public function store_fono(Request $request)//listo - revisado
    {

        $campos_requeridos = 1;
        $mensaje = '';
        if(empty( trim($request->hipotesis)))
        {
            $campos_requeridos = 0;
            $mensaje = 'El Diagnóstico es Requerido.\n Su Ficha Clínica NO ha sido Guardada aún. \n Si es solo Control, indicar Control de Patología.';
        }

        if($campos_requeridos)
        {
            /** FICHA ATENCION  */
            $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();
            $ficha = FichaOtrosProfesionales::where('id', $hora_medica->id_ficha_otros_prof)->first();
            $id_profesional = $request->id_profesional_fc;
            $id_paciente = $request->id_paciente_fc;
            $ficha->motivo = $request->dg_ingreso;
            $ficha->antecedentes = $request->cond_fis_ingreso;
            $ficha->hipotesis = $request->hipotesis;
            $ficha->id_paciente = $id_paciente;
            $ficha->id_profesional = $id_profesional;
            $ficha->finalizada = 1;

            if (!$ficha->save())
            {
                return back()->with('error', 'Ficha Clínica con problema al guardar')->withInput();
            }
            else
            {
                /** ficha otros prof general */
                $store_ot = $this->store_ot_prof($request, $ficha);
                if($store_ot->estado == 1)
                {
                    $mensaje .= $store_ot->msj;
                    $tipo_mensaje = 'success';
                    $mensaje .= 'Ficha Clínica guardada de forma correcta\n';

                    /** REGISTRO FICHA FONOAUDIOLOGIA */
                    $ficha_fono = new FichaFonoaudiologia();
                    $ficha_fono->id_ficha_otros_prof = $ficha->id;
                    $ficha_fono->id_profesional = $id_profesional;
                    $ficha_fono->id_paciente = $id_paciente;
                    $ficha_fono->eval_g_le = $request->eval_g_le;
                    $ficha_fono->eval_g_le_obs = $request->eval_g_le_obs;
                    $ficha_fono->eval_g_leti = $request->eval_g_leti;
                    $ficha_fono->eval_g_leti_obs = $request->eval_g_leti_obs;
                    $ficha_fono->eval_g_lr = $request->eval_g_lr;
                    $ficha_fono->eval_g_lr_obs = $request->eval_g_lr_obs;
                    $ficha_fono->eval_g_lrti = $request->eval_g_lrti;
                    $ficha_fono->eval_g_lrti_obs = $request->eval_g_lrti_obs;
                    $ficha_fono->eval_g_leng_obs = $request->eval_g_leng_obs;
                    $ficha_fono->eval_aud = $request->eval_aud;
                    $ficha_fono->eval_ofa = $request->eval_ofa;
                    $ficha_fono->obs_ex_ofa = $request->obs_ex_ofa;
                    $ficha_fono->vo_flu_voz =$request->vo_flu_voz;
                    $ficha_fono->vo_flu_voz_obs =$request->vo_flu_voz_obs;
                    $ficha_fono->vo_tpo_voz =$request->vo_tpo_voz;
                    $ficha_fono->vo_tpo_voz_obs =$request->vo_tpo_voz_obso;
                    $ficha_fono->vo_ritm =$request->vo_ritm;
                    $ficha_fono->vo_ritm_obs =$request->vo_ritm_obs;
                    $ficha_fono->vo_pro = $request->vo_pro;
                    $ficha_fono->vo_pro_obs = $request->vo_pro_obs;
                    $ficha_fono->ex_voz_obs = $request->ex_voz_obs;
                    $ficha_fono->ex_gral_obs = $request->ex_gral_obs;
                    $ficha_fono->otro = '';
                    $ficha_fono->otro1 = '';
                    $ficha_fono->estado = 1;

                    if($ficha_fono->save())
                    {
                        $mensaje .= 'Ficha Clínica Fonoaudiogía guardada de forma correcta\n';

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


                        /** REGISTRO FICHA FONOAUDIOLOGIA HABLA Y LENGUAJE   */

                        {

                            $ficha_hablaleng = new FichaFonoHablaLenguaje();

                            $ficha_fono->id_ficha_otros_prof = $ficha->id;
                            $ficha_hablaleng->id_ficha_fono = $ficha_fono->id;
                            $ficha_hablaleng->id_paciente = $id_paciente;
                            $ficha_hablaleng->id_profesional = $id_profesional;
                            $ficha_hablaleng->ex_resp = $request->ex_resp;
                            $ficha_hablaleng->ex_resp_obs = $request->ex_resp_obs;
                            $ficha_hablaleng->ex_fonac = $request->ex_fonac;
                            $ficha_hablaleng->ex_fonac_obs = $request->ex_fonac_obs;
                            $ficha_hablaleng->ex_art_pal = $request->ex_art_pal;
                            $ficha_hablaleng->ex_art_pal_obs = $request->ex_art_pal_obs;
                            $ficha_hablaleng->ex_prosodia = $request->ex_prosodia;
                            $ficha_hablaleng->ex_prosodia_obs = $request->ex_prosodia_obs;
                            $ficha_hablaleng->habla_obs = $request->habla_obs;
                            $ficha_hablaleng->res_tp = $request->res_tp;
                            $ficha_hablaleng->res_tp_obs = $request->res_tp_obs;
                            $ficha_hablaleng->res_mod = $request->res_mod;
                            $ficha_hablaleng->res_mod_obs = $request->res_mod_obs;
                            $ficha_hablaleng->res_cfr = $request->res_cfr;
                            $ficha_hablaleng->res_cfr_obs = $request->res_cfr_obs;
                            $ficha_hablaleng->alt_esp_leng = $request->alt_esp_leng;
                            $ficha_hablaleng->alt_esp_leng_obs = $request->alt_esp_leng_obs;
                            $ficha_hablaleng->g_leng_obs = $request->g_leng_obs;
                            $ficha_hablaleng->otro = '';
                            $ficha_hablaleng->otro2 = '';
                            $ficha_hablaleng->estado = 1;

                            if($ficha_hablaleng->save())
                            {
                                $mensaje .= 'Ficha Habla y Lenguaje registrada con exito\n';
                            }
                            else
                            {
                                $mensaje .= 'Ficha Habla y Lenguaje con problema al registrar\n';
                            }
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
                    else
                    {
                        $mensaje .= 'Ficha Clínica Oftalmolagia con problema al registrar\n';
                    }
                }
                else
                {
                    $mensaje .= $store_ot->msj;
                }
            }

        }
        else
        {
            return back()->with('error', $mensaje)->withInput();
        }
    }



    public function store_nutri(Request $request)//listo - revisado
    {

        $campos_requeridos = 1;
        $mensaje = '';
        if(empty( trim($request->hipotesis)))
        {
            $campos_requeridos = 0;
            $mensaje = 'El Diagnóstico es Requerido.\n Su Ficha Clínica NO ha sido Guardada aún. \n Si es solo Control, indicar Control de Patología.';
        }

        if($campos_requeridos)
        {
            /** FICHA ATENCION  */
            $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();
            $ficha = FichaOtrosProfesionales::where('id', $hora_medica->id_ficha_otros_prof)->first();
            $id_profesional = $request->id_profesional_fc;
            $id_paciente = $request->id_paciente_fc;
            $ficha->motivo = $request->dg_ingreso;
            $ficha->antecedentes = $request->cond_fis_ingreso;
            $ficha->hipotesis = $request->hipotesis;
            $ficha->id_paciente = $id_paciente;
            $ficha->id_profesional = $id_profesional;
            $ficha->finalizada = 1;

            if (!$ficha->save())
            {
                return back()->with('error', 'Ficha Clínica con problema al guardar')->withInput();
            }
            else
            {
                $profesional = Profesional::find($id_profesional);

                /** ficha otros prof general */
                $store_ot = $this->store_ot_prof($request, $ficha);
                if($store_ot->estado == 1)
                {
                    $mensaje .= $store_ot->msj;
                    $tipo_mensaje = 'success';
                    $mensaje .= 'Ficha Clínica guardada de forma correcta\n';

                    /** REGISTRO FICHA SICOLOGIA */
                    $ficha_sico = new FichaSicologia();
                    $ficha_sico->id_ficha_otros_prof = $ficha->id;

                    $ficha_sico->id_profesional = $id_profesional;
                    $ficha_sico->id_paciente = $id_paciente;
                    $ficha_sico->presentacion= $request->presentacion;
                    $ficha_sico->conciencias = $request->conciencia;
                    $ficha_sico->actitud = $request->actitud;
                    $ficha_sico->atencion_concentracion = $request->atencion_concentracion;
                    $ficha_sico->afectividad = $request->afectividad;
                    $ficha_sico->pensamiento = $request->pensamiento;
                    $ficha_sico->sensopercepcion = $request->sensopercepcion;
                    $ficha_sico->psicomotricidad = $request->psicomotricidad;
                    $ficha_sico->sueno = $request->sueno;
                    $ficha_sico->higiene = $request->higiene;
                    $ficha_sico->alimentacion = $request->alimentacion;
                    $ficha_sico->psi_solo_control = $request->psi_solo_control;
                    $ficha_sico->psi_ter_indiv =$request->psi_ter_indiv;
                    $ficha_sico->psi_ter_grup =$request->psi_ter_grup;
                    $ficha_sico->psi_sol_hosp =$request->psi_sol_hosp;
                    $ficha_sico->obs_plan_tratamiento =$request->obs_plan_tratamiento;
                    $ficha_sico->otro = '';
                    $ficha_sico->otro1 = '';
                    $ficha_sico->estado = 1;

                    if($ficha_sico->save())
                    {
                        $mensaje .= 'Ficha Clínica Sicología guardada de forma correcta\n';

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


                        /** REGISTRO FICHA SICOSOCIAL   */

                        {

                            $ficha_sicosocial = new FichaSicosocial();
                            $ficha_sicosocial->id_ficha_otros_prof = $ficha->id;
                            $ficha_sicosocial->id_especialidad = $profesional->id_especialidad;
                            $ficha_sicosocial->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                            $ficha_sicosocial->id_paciente = $id_paciente;
                            $ficha_sicosocial->id_profesional = $id_profesional;
                            $ficha_sicosocial->lugar_nacimiento = $request->lugar_nacimiento;
                            $ficha_sicosocial->estado_civil = $request->estado_civil;
                            $ficha_sicosocial->niv_ed = $request->niv_ed;
                            $ficha_sicosocial->ocupacion = $request->ocupacion;
                            $ficha_sicosocial->religion = $request->religion;
                            $ficha_sicosocial->vive_con = $request->vive_con;
                            $ficha_sicosocial->vive_obs = $request->vive_obs;
                            $ficha_sicosocial->alcohol = $request->alcohol;
                            $ficha_sicosocial->tabaco = $request->tabaco;
                            $ficha_sicosocial->sustancias_ilicitas = $request->sustancias_ilicitas;
                            $ficha_sicosocial->sexualidad = $request->sexualidad;
                            $ficha_sicosocial->com_generales = $request->com_generales;
                            $ficha_sicosocial->ant_laborales = $request->ant_laborales;
                            $ficha_sicosocial->ant_esparc = $request->ant_esparc;
                            $ficha_sicosocial->obs_generales = $request->obs_generales;
                            $ficha_sicosocial->otro = '';
                            $ficha_sicosocial->otro2 = '';
                            $ficha_sicosocial->estado = 1;

                            if($ficha_sicosocial->save())
                            {
                                $mensaje .= 'Ficha Sico-Social registrada con exito\n';
                            }
                            else
                            {
                                $mensaje .= 'Ficha Sico-Social con problema al registrar\n';
                            }
                        }
                        /** REGISTRO FICHA SICOBIOPATOGRAFIA   */

                        {

                            $ficha_sicobiopatografia = new FichaSicoBiopatografia();
                            $ficha_sicobiopatografia->id_ficha_otros_prof = $ficha->id;
                            $ficha_sicobiopatografia->id_especialidad = $profesional->id_especialidad;
                            $ficha_sicobiopatografia->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                            $ficha_sicobiopatografia->id_paciente = $id_paciente;
                            $ficha_sicobiopatografia->id_profesional = $id_profesional;
                            $ficha_sicobiopatografia->prenatal = $request->prenatal;
                            $ficha_sicobiopatografia->natal = $request->natal;
                            $ficha_sicobiopatografia->infancia = $request->infancia;
                            $ficha_sicobiopatografia->adolescencia = $request->adolescencia;
                            $ficha_sicobiopatografia->edad_adulta = $request->edad_adulta;
                            $ficha_sicobiopatografia->ad_mayor = $request->ad_mayor;
                            $ficha_sicobiopatografia->actualidad = $request->actualidad;
                            $ficha_sicobiopatografia->otro = '';
                            $ficha_sicobiopatografia->otro2 = '';
                            $ficha_sicobiopatografia->estado = 1;

                            if($ficha_sicobiopatografia->save())
                            {
                                $mensaje .= 'Ficha Sico-Biopatografía registrada con exito\n';
                            }
                            else
                            {
                                $mensaje .= 'Ficha Sico-Biopatografía con problema al registrar\n';
                            }
                        }
                         /** REGISTRO FICHA SICOHISTORIAFAMILIAR   */

                         {

                            $ficha_sico_hist_fam = new FichaSicoHistFamiliar();
                            $ficha_sico_hist_fam->id_ficha_otros_prof = $ficha->id;
                            $ficha_sico_hist_fam->id_especialidad = $profesional->id_especialidad;
                            $ficha_sico_hist_fam->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                            $ficha_sico_hist_fam->id_paciente = $id_paciente;
                            $ficha_sico_hist_fam->id_profesional = $id_profesional;
                            $ficha_sico_hist_fam->nombre_padre = $request->nombre_padre;
                            $ficha_sico_hist_fam->rel_padre = $request->rel_padre;
                            $ficha_sico_hist_fam->nombre_madre = $request->nombre_madre;
                            $ficha_sico_hist_fam->rel_madre = $request->rel_madre;
                            $ficha_sico_hist_fam->rel_entre_padres = $request->rel_entre_padres;
                            $ficha_sico_hist_fam->tiene_hnos = $request->tiene_hnos;
                            $ficha_sico_hist_fam->cantidad_hnos = $request->cantidad_hnos;
                            $ficha_sico_hist_fam->nombre_hno = $request->nombre_hno;
                            $ficha_sico_hist_fam->rel_hf_hno = $request->rel_hf_hno;
                            $ficha_sico_hist_fam->rel_entre_hnos = $request->rel_entre_hnos;
                            $ficha_sico_hist_fam->nombre_pareja = $request->nombre_pareja;
                            $ficha_sico_hist_fam->rel_pareja = $request->rel_pareja;
                            $ficha_sico_hist_fam->rel_hf_pareja_obs = $request->rel_hf_pareja_obs;
                            $ficha_sico_hist_fam->tiene_hijos = $request->tiene_hijos;
                            $ficha_sico_hist_fam->cantidad_hijos = $request->cantidad_hijos;
                            $ficha_sico_hist_fam->nombre_hijo = $request->nombre_hijo;
                            $ficha_sico_hist_fam->rel_hijo = $request->rel_hijo;
                            $ficha_sico_hist_fam->rel_entre_hijos = $request->rel_entre_hijos;
                            $ficha_sico_hist_fam->nombre_ot_per = $request->nombre_ot_per;
                            $ficha_sico_hist_fam->rel_ot_per = $request->rel_ot_per;
                            $ficha_sico_hist_fam->rel_obs_generales = $request->rel_obs_generales;
                            $ficha_sico_hist_fam->otro = '';
                            $ficha_sico_hist_fam->otro2 = '';
                            $ficha_sico_hist_fam->estado = 1;
                            if($ficha_sico_hist_fam->save())
                            {
                                $mensaje .= 'Ficha Sico-Historia-Familiar registrada con exito\n';
                            }
                            else
                            {
                                $mensaje .= 'Ficha Sico-Historia-Familiar con problema al registrar\n';
                            }
                        }
                         /** REGISTRO FICHA SICOANTECEDENTES PSIQUIATRICOS   */

                         {

                            $ficha_sicoantpsiq = new FichaSicoAntPsiquiatricos();
                            $ficha_sicoantpsiq->id_ficha_otros_prof = $ficha->id;
                            $ficha_sicoantpsiq->id_especialidad = $profesional->id_especialidad;
                            $ficha_sicoantpsiq->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                            $ficha_sicoantpsiq->id_paciente = $id_paciente;
                            $ficha_sicoantpsiq->id_profesional = $id_profesional;
                            $ficha_sicoantpsiq->ant_medicos = $request->ant_medicos;
                            $ficha_sicoantpsiq->ant_suicidio = $request->ant_suicidio;
                            $ficha_sicoantpsiq->enf_mentales = $request->enf_mentales;
                            $ficha_sicoantpsiq->trat_psicologicos_prev = $request->trat_psicologicos_prev;
                            $ficha_sicoantpsiq->trat_psiquiatricos_prev = $request->trat_psiquiatricos_prev;
                            $ficha_sicoantpsiq->medicacion_actual = $request->medicacion_actual;
                            $ficha_sicoantpsiq->otro = '';
                            $ficha_sicoantpsiq->otro2 = '';
                            $ficha_sicoantpsiq->estado = 1;
                            if($ficha_sicoantpsiq->save())
                            {
                                $mensaje .= 'Ficha Sico-Antecedentes Psiquiatricos registrada con exito\n';
                            }
                            else
                            {
                                $mensaje .= 'Ficha Sico-Antecedentes Psiquiatricos con problema al registrar\n';
                            }
                        }
                         /** REGISTRO FICHA SICO EXAMEN MENTAL   */

                         {

                            $ficha_sicoexamenmental = new FichaSicoAntPsiquiatricos();
                            $ficha_sicoexamenmental->id_ficha_otros_prof = $ficha->id;
                            $ficha_sicoexamenmental->id_especialidad = $profesional->id_especialidad;
                            $ficha_sicoexamenmental->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                            $ficha_sicoexamenmental->id_paciente = $id_paciente;
                            $ficha_sicoexamenmental->id_profesional = $id_profesional;
                            $ficha_sicoexamenmental->presentacion = $request->presentacion;
                            $ficha_sicoexamenmental->conciencia = $request->conciencia;
                            $ficha_sicoexamenmental->actitud = $request->actitud;
                            $ficha_sicoexamenmental->tencion_concentracion = $request->tencion_concentracion;
                            $ficha_sicoexamenmental->afectividad = $request->afectividad;
                            $ficha_sicoexamenmental->pensamiento = $request->pensamiento;
                            $ficha_sicoexamenmental->sensopercepcion = $request->sensopercepcion;
                            $ficha_sicoexamenmental->psicomotricidad = $request->psicomotricidad;
                            $ficha_sicoexamenmental->sueno = $request->sueno;
                            $ficha_sicoexamenmental->higiene = $request->higiene;
                            $ficha_sicoexamenmental->alimentacion = $request->alimentacion;
                            $ficha_sicoexamenmental->otro = '';
                            $ficha_sicoexamenmental->otro2 = '';
                            $ficha_sicoexamenmental->estado = 1;
                            if($ficha_sicoexamenmental->save())
                            {
                                $mensaje .= 'Ficha Sico-Examen-Mental registrada con exito\n';
                            }
                            else
                            {
                                $mensaje .= 'Ficha Sico-Examen-Mental con problema al registrar\n';
                            }
                        }
                         /** REGISTRO FICHA SICO TEST DE RORSHCHARCH   */

                         {

                            $ficha_sico_test_rorschach = new FichaSicoTestRorshchach();
                            $ficha_sico_test_rorschach->id_ficha_otros_prof = $ficha->id;
                            $ficha_sico_test_rorschach->id_especialidad = $profesional->id_especialidad;
                            $ficha_sico_test_rorschach->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                            $ficha_sico_test_rorschach->id_paciente = $id_paciente;
                            $ficha_sico_test_rorschach->id_profesional = $id_profesional;
                            $ficha_sico_test_rorschach->lam_uno_resp = $request->lam_uno_resp;
                            $ficha_sico_test_rorschach->lam_uno_com = $request->lam_uno_com;
                            $ficha_sico_test_rorschach->lam_dos_resp = $request->lam_dos_resp;
                            $ficha_sico_test_rorschach->lam_dos_com = $request->rlam_dos_com;
                            $ficha_sico_test_rorschach->lam_tres_resp = $request->lam_tres_resp;
                            $ficha_sico_test_rorschach->lam_tres_com = $request->lam_tres_com;
                            $ficha_sico_test_rorschach->lam_cuatro_resp = $request->lam_cuatro_resp;
                            $ficha_sico_test_rorschach->lam_cuatro_com= $request->lam_cuatro_com;
                            $ficha_sico_test_rorschach->lam_cinco_resp = $request->lam_cinco_resp;
                            $ficha_sico_test_rorschach->lam_cinco_com = $request->lam_cinco_com;
                            $ficha_sico_test_rorschach->lam_seis_resp= $request->lam_seis_resp;
                            $ficha_sico_test_rorschach->lam_seis_com = $request->rlam_seis_com;
                            $ficha_sico_test_rorschach->lam_siete_resp = $request->lam_siete_resp;
                            $ficha_sico_test_rorschach->lam_siete_com = $request->lam_siete_com;
                            $ficha_sico_test_rorschach->lam_ocho_resp = $request->lam_ocho_resp;
                            $ficha_sico_test_rorschach->lam_ocho_com = $request->lam_ocho_com;
                            $ficha_sico_test_rorschach->lam_nueve_resp = $request->lam_nueve_resp;
                            $ficha_sico_test_rorschach->lam_nueve_com = $request->lam_nueve_com;
                            $ficha_sico_test_rorschach->lam_diez_resp= $request->lam_diez_resp;
                            $ficha_sico_test_rorschach->lam_diez_com = $request->lam_diez_com;
                            $ficha_sico_test_rorschach->comentarios_gen = $request->comentarios_gen;
                            $ficha_sico_test_rorschach->otro = '';
                            $ficha_sico_test_rorschach->otro2 = '';
                            $ficha_sico_test_rorschach->estado = 1;
                            if($ficha_sico_test_rorschach->save())
                            {
                                $mensaje .= 'Ficha Sico-Test de Rorshchach registrada con exito\n';
                            }
                            else
                            {
                                $mensaje .= 'Ficha Sico-Test de Rorshchach con problema al registrar\n';
                            }
                        }
                          /** REGISTRO FICHA OTROS TEST SICOLOGICOS  */

                          {

                            $ficha_sicootrostest = new FichaSicoOtrosTest();
                            $ficha_sicootrostest->id_ficha_otros_prof = $ficha->id;
                            $ficha_sicootrostest->id_especialidad = $profesional->id_especialidad;
                            $ficha_sicootrostest->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                            $ficha_sicootrostest->id_paciente = $id_paciente;
                            $ficha_sicootrostest->id_profesional = $id_profesional;
                            $ficha_sicootrostest->nomb_test = $request->nomb_test;
                            $ficha_sicootrostest->resp = $request->resp;
                            $ficha_sicootrostest->com = $request->com;
                            $ficha_sicootrostest->ind = $request->ind;
                            $ficha_sicootrostest->comentarios_gen = $request->comentarios_gen;
                            $ficha_sicootrostest->otro = '';
                            $ficha_sicootrostest->otro2 = '';
                            $ficha_sicootrostest->estado = 1;
                            if($ficha_sicootrostest->save())
                            {
                                $mensaje .= 'Ficha Sico-Otros Test registrada con exito\n';
                            }
                            else
                            {
                                $mensaje .= 'Ficha Sico-Otros Test con problema al registrar\n';
                            }
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
                    else
                    {
                        $mensaje .= 'Ficha Clínica Sicología con problema al registrar\n';
                    }
                }
                else
                {
                    $mensaje .= $store_ot->msj;
                }
            }

        }
        else
        {
            return back()->with('error', $mensaje)->withInput();
        }
    }

    public function store_terapia(Request $request)
    {

        $campos_requeridos = 1;
        $mensaje = '';
        if(empty( trim($request->hipotesis)))
        {
            $campos_requeridos = 0;
            $mensaje = 'El Diagnóstico es Requerido.\n Su Ficha Clínica NO ha sido Guardada aún. \n Si es solo Control, indicar Control de Patología.';
        }

        if($campos_requeridos)
        {
            /** FICHA ATENCION  */
            $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();
            $ficha = FichaOtrosProfesionales::where('id', $hora_medica->id_ficha_otros_prof)->first();
            $id_profesional = $request->id_profesional_fc;
            $id_paciente = $request->id_paciente_fc;
            $ficha->motivo = $request->dg_ingreso;
            $ficha->antecedentes = $request->cond_fis_ingreso;
            $ficha->hipotesis = $request->hipotesis;
            $ficha->id_paciente = $id_paciente;
            $ficha->id_profesional = $id_profesional;
            $ficha->finalizada = 1;

            if (!$ficha->save())
            {
                return back()->with('error', 'Ficha Clínica con problema al guardar')->withInput();
            }
            else
            {
                $profesional = Profesional::find($id_profesional);

                /** ficha otros prof general */
                $store_ot = $this->store_ot_prof($request, $ficha);
                if($store_ot->estado == 1)
                {
                    $mensaje .= $store_ot->msj;
                    $tipo_mensaje = 'success';
                    $mensaje .= 'Ficha Clínica guardada de forma correcta\n';

                    /** REGISTRO FICHA SICOLOGIA */
                    $ficha_sico = new FichaSicologia();
                    $ficha_sico->id_ficha_otros_prof = $ficha->id;

                    $ficha_sico->id_profesional = $id_profesional;
                    $ficha_sico->id_paciente = $id_paciente;
                    $ficha_sico->presentacion= $request->presentacion;
                    $ficha_sico->conciencias = $request->conciencia;
                    $ficha_sico->actitud = $request->actitud;
                    $ficha_sico->atencion_concentracion = $request->atencion_concentracion;
                    $ficha_sico->afectividad = $request->afectividad;
                    $ficha_sico->pensamiento = $request->pensamiento;
                    $ficha_sico->sensopercepcion = $request->sensopercepcion;
                    $ficha_sico->psicomotricidad = $request->psicomotricidad;
                    $ficha_sico->sueno = $request->sueno;
                    $ficha_sico->higiene = $request->higiene;
                    $ficha_sico->alimentacion = $request->alimentacion;
                    $ficha_sico->psi_solo_control = $request->psi_solo_control;
                    $ficha_sico->psi_ter_indiv =$request->psi_ter_indiv;
                    $ficha_sico->psi_ter_grup =$request->psi_ter_grup;
                    $ficha_sico->psi_sol_hosp =$request->psi_sol_hosp;
                    $ficha_sico->obs_plan_tratamiento =$request->obs_plan_tratamiento;
                    $ficha_sico->otro = '';
                    $ficha_sico->otro1 = '';
                    $ficha_sico->estado = 1;

                    if($ficha_sico->save())
                    {
                        $mensaje .= 'Ficha Clínica Sicología guardada de forma correcta\n';

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


                        /** REGISTRO FICHA SICOSOCIAL   */

                        {

                            $ficha_sicosocial = new FichaSicosocial();
                            $ficha_sicosocial->id_ficha_otros_prof = $ficha->id;
                            $ficha_sicosocial->id_especialidad = $profesional->id_especialidad;
                            $ficha_sicosocial->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                            $ficha_sicosocial->id_paciente = $id_paciente;
                            $ficha_sicosocial->id_profesional = $id_profesional;
                            $ficha_sicosocial->lugar_nacimiento = $request->lugar_nacimiento;
                            $ficha_sicosocial->estado_civil = $request->estado_civil;
                            $ficha_sicosocial->niv_ed = $request->niv_ed;
                            $ficha_sicosocial->ocupacion = $request->ocupacion;
                            $ficha_sicosocial->religion = $request->religion;
                            $ficha_sicosocial->vive_con = $request->vive_con;
                            $ficha_sicosocial->vive_obs = $request->vive_obs;
                            $ficha_sicosocial->alcohol = $request->alcohol;
                            $ficha_sicosocial->tabaco = $request->tabaco;
                            $ficha_sicosocial->sustancias_ilicitas = $request->sustancias_ilicitas;
                            $ficha_sicosocial->sexualidad = $request->sexualidad;
                            $ficha_sicosocial->com_generales = $request->com_generales;
                            $ficha_sicosocial->ant_laborales = $request->ant_laborales;
                            $ficha_sicosocial->ant_esparc = $request->ant_esparc;
                            $ficha_sicosocial->obs_generales = $request->obs_generales;
                            $ficha_sicosocial->otro = '';
                            $ficha_sicosocial->otro2 = '';
                            $ficha_sicosocial->estado = 1;

                            if($ficha_sicosocial->save())
                            {
                                $mensaje .= 'Ficha Sico-Social registrada con exito\n';
                            }
                            else
                            {
                                $mensaje .= 'Ficha Sico-Social con problema al registrar\n';
                            }
                        }
                        /** REGISTRO FICHA SICOBIOPATOGRAFIA   */

                        {

                            $ficha_sicobiopatografia = new FichaSicoBiopatografia();
                            $ficha_sicobiopatografia->id_ficha_otros_prof = $ficha->id;
                            $ficha_sicobiopatografia->id_especialidad = $profesional->id_especialidad;
                            $ficha_sicobiopatografia->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                            $ficha_sicobiopatografia->id_paciente = $id_paciente;
                            $ficha_sicobiopatografia->id_profesional = $id_profesional;
                            $ficha_sicobiopatografia->prenatal = $request->prenatal;
                            $ficha_sicobiopatografia->natal = $request->natal;
                            $ficha_sicobiopatografia->infancia = $request->infancia;
                            $ficha_sicobiopatografia->adolescencia = $request->adolescencia;
                            $ficha_sicobiopatografia->edad_adulta = $request->edad_adulta;
                            $ficha_sicobiopatografia->ad_mayor = $request->ad_mayor;
                            $ficha_sicobiopatografia->actualidad = $request->actualidad;
                            $ficha_sicobiopatografia->otro = '';
                            $ficha_sicobiopatografia->otro2 = '';
                            $ficha_sicobiopatografia->estado = 1;

                            if($ficha_sicobiopatografia->save())
                            {
                                $mensaje .= 'Ficha Sico-Biopatografía registrada con exito\n';
                            }
                            else
                            {
                                $mensaje .= 'Ficha Sico-Biopatografía con problema al registrar\n';
                            }
                        }
                         /** REGISTRO FICHA SICOHISTORIAFAMILIAR   */

                         {

                            $ficha_sico_hist_fam = new FichaSicoHistFamiliar();
                            $ficha_sico_hist_fam->id_ficha_otros_prof = $ficha->id;
                            $ficha_sico_hist_fam->id_especialidad = $profesional->id_especialidad;
                            $ficha_sico_hist_fam->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                            $ficha_sico_hist_fam->id_paciente = $id_paciente;
                            $ficha_sico_hist_fam->id_profesional = $id_profesional;
                            $ficha_sico_hist_fam->nombre_padre = $request->nombre_padre;
                            $ficha_sico_hist_fam->rel_padre = $request->rel_padre;
                            $ficha_sico_hist_fam->nombre_madre = $request->nombre_madre;
                            $ficha_sico_hist_fam->rel_madre = $request->rel_madre;
                            $ficha_sico_hist_fam->rel_entre_padres = $request->rel_entre_padres;
                            $ficha_sico_hist_fam->tiene_hnos = $request->tiene_hnos;
                            $ficha_sico_hist_fam->cantidad_hnos = $request->cantidad_hnos;
                            $ficha_sico_hist_fam->nombre_hno = $request->nombre_hno;
                            $ficha_sico_hist_fam->rel_hf_hno = $request->rel_hf_hno;
                            $ficha_sico_hist_fam->rel_entre_hnos = $request->rel_entre_hnos;
                            $ficha_sico_hist_fam->nombre_pareja = $request->nombre_pareja;
                            $ficha_sico_hist_fam->rel_pareja = $request->rel_pareja;
                            $ficha_sico_hist_fam->rel_hf_pareja_obs = $request->rel_hf_pareja_obs;
                            $ficha_sico_hist_fam->tiene_hijos = $request->tiene_hijos;
                            $ficha_sico_hist_fam->cantidad_hijos = $request->cantidad_hijos;
                            $ficha_sico_hist_fam->nombre_hijo = $request->nombre_hijo;
                            $ficha_sico_hist_fam->rel_hijo = $request->rel_hijo;
                            $ficha_sico_hist_fam->rel_entre_hijos = $request->rel_entre_hijos;
                            $ficha_sico_hist_fam->nombre_ot_per = $request->nombre_ot_per;
                            $ficha_sico_hist_fam->rel_ot_per = $request->rel_ot_per;
                            $ficha_sico_hist_fam->rel_obs_generales = $request->rel_obs_generales;
                            $ficha_sico_hist_fam->otro = '';
                            $ficha_sico_hist_fam->otro2 = '';
                            $ficha_sico_hist_fam->estado = 1;
                            if($ficha_sico_hist_fam->save())
                            {
                                $mensaje .= 'Ficha Sico-Historia-Familiar registrada con exito\n';
                            }
                            else
                            {
                                $mensaje .= 'Ficha Sico-Historia-Familiar con problema al registrar\n';
                            }
                        }
                         /** REGISTRO FICHA SICOANTECEDENTES PSIQUIATRICOS   */

                         {

                            $ficha_sicoantpsiq = new FichaSicoAntPsiquiatricos();
                            $ficha_sicoantpsiq->id_ficha_otros_prof = $ficha->id;
                            $ficha_sicoantpsiq->id_especialidad = $profesional->id_especialidad;
                            $ficha_sicoantpsiq->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                            $ficha_sicoantpsiq->id_paciente = $id_paciente;
                            $ficha_sicoantpsiq->id_profesional = $id_profesional;
                            $ficha_sicoantpsiq->ant_medicos = $request->ant_medicos;
                            $ficha_sicoantpsiq->ant_suicidio = $request->ant_suicidio;
                            $ficha_sicoantpsiq->enf_mentales = $request->enf_mentales;
                            $ficha_sicoantpsiq->trat_psicologicos_prev = $request->trat_psicologicos_prev;
                            $ficha_sicoantpsiq->trat_psiquiatricos_prev = $request->trat_psiquiatricos_prev;
                            $ficha_sicoantpsiq->medicacion_actual = $request->medicacion_actual;
                            $ficha_sicoantpsiq->otro = '';
                            $ficha_sicoantpsiq->otro2 = '';
                            $ficha_sicoantpsiq->estado = 1;
                            if($ficha_sicoantpsiq->save())
                            {
                                $mensaje .= 'Ficha Sico-Antecedentes Psiquiatricos registrada con exito\n';
                            }
                            else
                            {
                                $mensaje .= 'Ficha Sico-Antecedentes Psiquiatricos con problema al registrar\n';
                            }
                        }
                         /** REGISTRO FICHA SICO EXAMEN MENTAL   */

                         {

                            $ficha_sicoexamenmental = new FichaSicoAntPsiquiatricos();
                            $ficha_sicoexamenmental->id_ficha_otros_prof = $ficha->id;
                            $ficha_sicoexamenmental->id_especialidad = $profesional->id_especialidad;
                            $ficha_sicoexamenmental->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                            $ficha_sicoexamenmental->id_paciente = $id_paciente;
                            $ficha_sicoexamenmental->id_profesional = $id_profesional;
                            $ficha_sicoexamenmental->presentacion = $request->presentacion;
                            $ficha_sicoexamenmental->conciencia = $request->conciencia;
                            $ficha_sicoexamenmental->actitud = $request->actitud;
                            $ficha_sicoexamenmental->tencion_concentracion = $request->tencion_concentracion;
                            $ficha_sicoexamenmental->afectividad = $request->afectividad;
                            $ficha_sicoexamenmental->pensamiento = $request->pensamiento;
                            $ficha_sicoexamenmental->sensopercepcion = $request->sensopercepcion;
                            $ficha_sicoexamenmental->psicomotricidad = $request->psicomotricidad;
                            $ficha_sicoexamenmental->sueno = $request->sueno;
                            $ficha_sicoexamenmental->higiene = $request->higiene;
                            $ficha_sicoexamenmental->alimentacion = $request->alimentacion;
                            $ficha_sicoexamenmental->otro = '';
                            $ficha_sicoexamenmental->otro2 = '';
                            $ficha_sicoexamenmental->estado = 1;
                            if($ficha_sicoexamenmental->save())
                            {
                                $mensaje .= 'Ficha Sico-Examen-Mental registrada con exito\n';
                            }
                            else
                            {
                                $mensaje .= 'Ficha Sico-Examen-Mental con problema al registrar\n';
                            }
                        }
                         /** REGISTRO FICHA SICO TEST DE RORSHCHARCH   */

                         {

                            $ficha_sico_test_rorschach = new FichaSicoTestRorshchach();
                            $ficha_sico_test_rorschach->id_ficha_otros_prof = $ficha->id;
                            $ficha_sico_test_rorschach->id_especialidad = $profesional->id_especialidad;
                            $ficha_sico_test_rorschach->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                            $ficha_sico_test_rorschach->id_paciente = $id_paciente;
                            $ficha_sico_test_rorschach->id_profesional = $id_profesional;
                            $ficha_sico_test_rorschach->lam_uno_resp = $request->lam_uno_resp;
                            $ficha_sico_test_rorschach->lam_uno_com = $request->lam_uno_com;
                            $ficha_sico_test_rorschach->lam_dos_resp = $request->lam_dos_resp;
                            $ficha_sico_test_rorschach->lam_dos_com = $request->rlam_dos_com;
                            $ficha_sico_test_rorschach->lam_tres_resp = $request->lam_tres_resp;
                            $ficha_sico_test_rorschach->lam_tres_com = $request->lam_tres_com;
                            $ficha_sico_test_rorschach->lam_cuatro_resp = $request->lam_cuatro_resp;
                            $ficha_sico_test_rorschach->lam_cuatro_com= $request->lam_cuatro_com;
                            $ficha_sico_test_rorschach->lam_cinco_resp = $request->lam_cinco_resp;
                            $ficha_sico_test_rorschach->lam_cinco_com = $request->lam_cinco_com;
                            $ficha_sico_test_rorschach->lam_seis_resp= $request->lam_seis_resp;
                            $ficha_sico_test_rorschach->lam_seis_com = $request->rlam_seis_com;
                            $ficha_sico_test_rorschach->lam_siete_resp = $request->lam_siete_resp;
                            $ficha_sico_test_rorschach->lam_siete_com = $request->lam_siete_com;
                            $ficha_sico_test_rorschach->lam_ocho_resp = $request->lam_ocho_resp;
                            $ficha_sico_test_rorschach->lam_ocho_com = $request->lam_ocho_com;
                            $ficha_sico_test_rorschach->lam_nueve_resp = $request->lam_nueve_resp;
                            $ficha_sico_test_rorschach->lam_nueve_com = $request->lam_nueve_com;
                            $ficha_sico_test_rorschach->lam_diez_resp= $request->lam_diez_resp;
                            $ficha_sico_test_rorschach->lam_diez_com = $request->lam_diez_com;
                            $ficha_sico_test_rorschach->comentarios_gen = $request->comentarios_gen;
                            $ficha_sico_test_rorschach->otro = '';
                            $ficha_sico_test_rorschach->otro2 = '';
                            $ficha_sico_test_rorschach->estado = 1;
                            if($ficha_sico_test_rorschach->save())
                            {
                                $mensaje .= 'Ficha Sico-Test de Rorshchach registrada con exito\n';
                            }
                            else
                            {
                                $mensaje .= 'Ficha Sico-Test de Rorshchach con problema al registrar\n';
                            }
                        }
                          /** REGISTRO FICHA OTROS TEST SICOLOGICOS  */

                          {

                            $ficha_sicootrostest = new FichaSicoOtrosTest();
                            $ficha_sicootrostest->id_ficha_otros_prof = $ficha->id;
                            $ficha_sicootrostest->id_especialidad = $profesional->id_especialidad;
                            $ficha_sicootrostest->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                            $ficha_sicootrostest->id_paciente = $id_paciente;
                            $ficha_sicootrostest->id_profesional = $id_profesional;
                            $ficha_sicootrostest->nomb_test = $request->nomb_test;
                            $ficha_sicootrostest->resp = $request->resp;
                            $ficha_sicootrostest->com = $request->com;
                            $ficha_sicootrostest->ind = $request->ind;
                            $ficha_sicootrostest->comentarios_gen = $request->comentarios_gen;
                            $ficha_sicootrostest->otro = '';
                            $ficha_sicootrostest->otro2 = '';
                            $ficha_sicootrostest->estado = 1;
                            if($ficha_sicootrostest->save())
                            {
                                $mensaje .= 'Ficha Sico-Otros Test registrada con exito\n';
                            }
                            else
                            {
                                $mensaje .= 'Ficha Sico-Otros Test con problema al registrar\n';
                            }
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
                    else
                    {
                        $mensaje .= 'Ficha Clínica Sicología con problema al registrar\n';
                    }
                }
                else
                {
                    $mensaje .= $store_ot->msj;
                }
            }

        }
        else
        {
            return back()->with('error', $mensaje)->withInput();
        }
    }

    public function store_tec_orl(Request $request)
    {

        $campos_requeridos = 1;
        $mensaje = '';
        if(empty( trim($request->hipotesis)))
        {
            $campos_requeridos = 0;
            $mensaje = 'El Diagnóstico es Requerido.\n Su Ficha Clínica NO ha sido Guardada aún. \n Si es solo Control, indicar Control de Patología.';
        }

        if($campos_requeridos)
        {
            /** FICHA ATENCION  */
            $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();
            $ficha = FichaOtrosProfesionales::where('id', $hora_medica->id_ficha_otros_prof)->first();
            $id_profesional = $request->id_profesional_fc;
            $id_paciente = $request->id_paciente_fc;
            $ficha->motivo = $request->dg_ingreso;
            $ficha->antecedentes = $request->cond_fis_ingreso;
            $ficha->hipotesis = $request->hipotesis;
            $ficha->id_paciente = $id_paciente;
            $ficha->id_profesional = $id_profesional;
            $ficha->finalizada = 1;

            if (!$ficha->save())
            {
                return back()->with('error', 'Ficha Clínica con problema al guardar')->withInput();
            }
            else
            {
                $profesional = Profesional::find($id_profesional);

                /** ficha otros prof general */
                $store_ot = $this->store_ot_prof($request, $ficha);
                if($store_ot->estado == 1)
                {
                    $mensaje .= $store_ot->msj;
                    $tipo_mensaje = 'success';
                    $mensaje .= 'Ficha Clínica guardada de forma correcta\n';

                    /** REGISTRO FICHA SICOLOGIA */
                    $ficha_sico = new FichaSicologia();
                    $ficha_sico->id_ficha_otros_prof = $ficha->id;

                    $ficha_sico->id_profesional = $id_profesional;
                    $ficha_sico->id_paciente = $id_paciente;
                    $ficha_sico->presentacion= $request->presentacion;
                    $ficha_sico->conciencias = $request->conciencia;
                    $ficha_sico->actitud = $request->actitud;
                    $ficha_sico->atencion_concentracion = $request->atencion_concentracion;
                    $ficha_sico->afectividad = $request->afectividad;
                    $ficha_sico->pensamiento = $request->pensamiento;
                    $ficha_sico->sensopercepcion = $request->sensopercepcion;
                    $ficha_sico->psicomotricidad = $request->psicomotricidad;
                    $ficha_sico->sueno = $request->sueno;
                    $ficha_sico->higiene = $request->higiene;
                    $ficha_sico->alimentacion = $request->alimentacion;
                    $ficha_sico->psi_solo_control = $request->psi_solo_control;
                    $ficha_sico->psi_ter_indiv =$request->psi_ter_indiv;
                    $ficha_sico->psi_ter_grup =$request->psi_ter_grup;
                    $ficha_sico->psi_sol_hosp =$request->psi_sol_hosp;
                    $ficha_sico->obs_plan_tratamiento =$request->obs_plan_tratamiento;
                    $ficha_sico->otro = '';
                    $ficha_sico->otro1 = '';
                    $ficha_sico->estado = 1;

                    if($ficha_sico->save())
                    {
                        $mensaje .= 'Ficha Clínica Sicología guardada de forma correcta\n';

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


                        /** REGISTRO FICHA SICOSOCIAL   */

                        {

                            $ficha_sicosocial = new FichaSicosocial();
                            $ficha_sicosocial->id_ficha_otros_prof = $ficha->id;
                            $ficha_sicosocial->id_especialidad = $profesional->id_especialidad;
                            $ficha_sicosocial->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                            $ficha_sicosocial->id_paciente = $id_paciente;
                            $ficha_sicosocial->id_profesional = $id_profesional;
                            $ficha_sicosocial->lugar_nacimiento = $request->lugar_nacimiento;
                            $ficha_sicosocial->estado_civil = $request->estado_civil;
                            $ficha_sicosocial->niv_ed = $request->niv_ed;
                            $ficha_sicosocial->ocupacion = $request->ocupacion;
                            $ficha_sicosocial->religion = $request->religion;
                            $ficha_sicosocial->vive_con = $request->vive_con;
                            $ficha_sicosocial->vive_obs = $request->vive_obs;
                            $ficha_sicosocial->alcohol = $request->alcohol;
                            $ficha_sicosocial->tabaco = $request->tabaco;
                            $ficha_sicosocial->sustancias_ilicitas = $request->sustancias_ilicitas;
                            $ficha_sicosocial->sexualidad = $request->sexualidad;
                            $ficha_sicosocial->com_generales = $request->com_generales;
                            $ficha_sicosocial->ant_laborales = $request->ant_laborales;
                            $ficha_sicosocial->ant_esparc = $request->ant_esparc;
                            $ficha_sicosocial->obs_generales = $request->obs_generales;
                            $ficha_sicosocial->otro = '';
                            $ficha_sicosocial->otro2 = '';
                            $ficha_sicosocial->estado = 1;

                            if($ficha_sicosocial->save())
                            {
                                $mensaje .= 'Ficha Sico-Social registrada con exito\n';
                            }
                            else
                            {
                                $mensaje .= 'Ficha Sico-Social con problema al registrar\n';
                            }
                        }
                        /** REGISTRO FICHA SICOBIOPATOGRAFIA   */

                        {

                            $ficha_sicobiopatografia = new FichaSicoBiopatografia();
                            $ficha_sicobiopatografia->id_ficha_otros_prof = $ficha->id;
                            $ficha_sicobiopatografia->id_especialidad = $profesional->id_especialidad;
                            $ficha_sicobiopatografia->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                            $ficha_sicobiopatografia->id_paciente = $id_paciente;
                            $ficha_sicobiopatografia->id_profesional = $id_profesional;
                            $ficha_sicobiopatografia->prenatal = $request->prenatal;
                            $ficha_sicobiopatografia->natal = $request->natal;
                            $ficha_sicobiopatografia->infancia = $request->infancia;
                            $ficha_sicobiopatografia->adolescencia = $request->adolescencia;
                            $ficha_sicobiopatografia->edad_adulta = $request->edad_adulta;
                            $ficha_sicobiopatografia->ad_mayor = $request->ad_mayor;
                            $ficha_sicobiopatografia->actualidad = $request->actualidad;
                            $ficha_sicobiopatografia->otro = '';
                            $ficha_sicobiopatografia->otro2 = '';
                            $ficha_sicobiopatografia->estado = 1;

                            if($ficha_sicobiopatografia->save())
                            {
                                $mensaje .= 'Ficha Sico-Biopatografía registrada con exito\n';
                            }
                            else
                            {
                                $mensaje .= 'Ficha Sico-Biopatografía con problema al registrar\n';
                            }
                        }
                         /** REGISTRO FICHA SICOHISTORIAFAMILIAR   */

                         {

                            $ficha_sico_hist_fam = new FichaSicoHistFamiliar();
                            $ficha_sico_hist_fam->id_ficha_otros_prof = $ficha->id;
                            $ficha_sico_hist_fam->id_especialidad = $profesional->id_especialidad;
                            $ficha_sico_hist_fam->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                            $ficha_sico_hist_fam->id_paciente = $id_paciente;
                            $ficha_sico_hist_fam->id_profesional = $id_profesional;
                            $ficha_sico_hist_fam->nombre_padre = $request->nombre_padre;
                            $ficha_sico_hist_fam->rel_padre = $request->rel_padre;
                            $ficha_sico_hist_fam->nombre_madre = $request->nombre_madre;
                            $ficha_sico_hist_fam->rel_madre = $request->rel_madre;
                            $ficha_sico_hist_fam->rel_entre_padres = $request->rel_entre_padres;
                            $ficha_sico_hist_fam->tiene_hnos = $request->tiene_hnos;
                            $ficha_sico_hist_fam->cantidad_hnos = $request->cantidad_hnos;
                            $ficha_sico_hist_fam->nombre_hno = $request->nombre_hno;
                            $ficha_sico_hist_fam->rel_hf_hno = $request->rel_hf_hno;
                            $ficha_sico_hist_fam->rel_entre_hnos = $request->rel_entre_hnos;
                            $ficha_sico_hist_fam->nombre_pareja = $request->nombre_pareja;
                            $ficha_sico_hist_fam->rel_pareja = $request->rel_pareja;
                            $ficha_sico_hist_fam->rel_hf_pareja_obs = $request->rel_hf_pareja_obs;
                            $ficha_sico_hist_fam->tiene_hijos = $request->tiene_hijos;
                            $ficha_sico_hist_fam->cantidad_hijos = $request->cantidad_hijos;
                            $ficha_sico_hist_fam->nombre_hijo = $request->nombre_hijo;
                            $ficha_sico_hist_fam->rel_hijo = $request->rel_hijo;
                            $ficha_sico_hist_fam->rel_entre_hijos = $request->rel_entre_hijos;
                            $ficha_sico_hist_fam->nombre_ot_per = $request->nombre_ot_per;
                            $ficha_sico_hist_fam->rel_ot_per = $request->rel_ot_per;
                            $ficha_sico_hist_fam->rel_obs_generales = $request->rel_obs_generales;
                            $ficha_sico_hist_fam->otro = '';
                            $ficha_sico_hist_fam->otro2 = '';
                            $ficha_sico_hist_fam->estado = 1;
                            if($ficha_sico_hist_fam->save())
                            {
                                $mensaje .= 'Ficha Sico-Historia-Familiar registrada con exito\n';
                            }
                            else
                            {
                                $mensaje .= 'Ficha Sico-Historia-Familiar con problema al registrar\n';
                            }
                        }
                         /** REGISTRO FICHA SICOANTECEDENTES PSIQUIATRICOS   */

                         {

                            $ficha_sicoantpsiq = new FichaSicoAntPsiquiatricos();
                            $ficha_sicoantpsiq->id_ficha_otros_prof = $ficha->id;
                            $ficha_sicoantpsiq->id_especialidad = $profesional->id_especialidad;
                            $ficha_sicoantpsiq->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                            $ficha_sicoantpsiq->id_paciente = $id_paciente;
                            $ficha_sicoantpsiq->id_profesional = $id_profesional;
                            $ficha_sicoantpsiq->ant_medicos = $request->ant_medicos;
                            $ficha_sicoantpsiq->ant_suicidio = $request->ant_suicidio;
                            $ficha_sicoantpsiq->enf_mentales = $request->enf_mentales;
                            $ficha_sicoantpsiq->trat_psicologicos_prev = $request->trat_psicologicos_prev;
                            $ficha_sicoantpsiq->trat_psiquiatricos_prev = $request->trat_psiquiatricos_prev;
                            $ficha_sicoantpsiq->medicacion_actual = $request->medicacion_actual;
                            $ficha_sicoantpsiq->otro = '';
                            $ficha_sicoantpsiq->otro2 = '';
                            $ficha_sicoantpsiq->estado = 1;
                            if($ficha_sicoantpsiq->save())
                            {
                                $mensaje .= 'Ficha Sico-Antecedentes Psiquiatricos registrada con exito\n';
                            }
                            else
                            {
                                $mensaje .= 'Ficha Sico-Antecedentes Psiquiatricos con problema al registrar\n';
                            }
                        }
                         /** REGISTRO FICHA SICO EXAMEN MENTAL   */

                         {

                            $ficha_sicoexamenmental = new FichaSicoAntPsiquiatricos();
                            $ficha_sicoexamenmental->id_ficha_otros_prof = $ficha->id;
                            $ficha_sicoexamenmental->id_especialidad = $profesional->id_especialidad;
                            $ficha_sicoexamenmental->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                            $ficha_sicoexamenmental->id_paciente = $id_paciente;
                            $ficha_sicoexamenmental->id_profesional = $id_profesional;
                            $ficha_sicoexamenmental->presentacion = $request->presentacion;
                            $ficha_sicoexamenmental->conciencia = $request->conciencia;
                            $ficha_sicoexamenmental->actitud = $request->actitud;
                            $ficha_sicoexamenmental->tencion_concentracion = $request->tencion_concentracion;
                            $ficha_sicoexamenmental->afectividad = $request->afectividad;
                            $ficha_sicoexamenmental->pensamiento = $request->pensamiento;
                            $ficha_sicoexamenmental->sensopercepcion = $request->sensopercepcion;
                            $ficha_sicoexamenmental->psicomotricidad = $request->psicomotricidad;
                            $ficha_sicoexamenmental->sueno = $request->sueno;
                            $ficha_sicoexamenmental->higiene = $request->higiene;
                            $ficha_sicoexamenmental->alimentacion = $request->alimentacion;
                            $ficha_sicoexamenmental->otro = '';
                            $ficha_sicoexamenmental->otro2 = '';
                            $ficha_sicoexamenmental->estado = 1;
                            if($ficha_sicoexamenmental->save())
                            {
                                $mensaje .= 'Ficha Sico-Examen-Mental registrada con exito\n';
                            }
                            else
                            {
                                $mensaje .= 'Ficha Sico-Examen-Mental con problema al registrar\n';
                            }
                        }
                         /** REGISTRO FICHA SICO TEST DE RORSHCHARCH   */

                         {

                            $ficha_sico_test_rorschach = new FichaSicoTestRorshchach();
                            $ficha_sico_test_rorschach->id_ficha_otros_prof = $ficha->id;
                            $ficha_sico_test_rorschach->id_especialidad = $profesional->id_especialidad;
                            $ficha_sico_test_rorschach->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                            $ficha_sico_test_rorschach->id_paciente = $id_paciente;
                            $ficha_sico_test_rorschach->id_profesional = $id_profesional;
                            $ficha_sico_test_rorschach->lam_uno_resp = $request->lam_uno_resp;
                            $ficha_sico_test_rorschach->lam_uno_com = $request->lam_uno_com;
                            $ficha_sico_test_rorschach->lam_dos_resp = $request->lam_dos_resp;
                            $ficha_sico_test_rorschach->lam_dos_com = $request->rlam_dos_com;
                            $ficha_sico_test_rorschach->lam_tres_resp = $request->lam_tres_resp;
                            $ficha_sico_test_rorschach->lam_tres_com = $request->lam_tres_com;
                            $ficha_sico_test_rorschach->lam_cuatro_resp = $request->lam_cuatro_resp;
                            $ficha_sico_test_rorschach->lam_cuatro_com= $request->lam_cuatro_com;
                            $ficha_sico_test_rorschach->lam_cinco_resp = $request->lam_cinco_resp;
                            $ficha_sico_test_rorschach->lam_cinco_com = $request->lam_cinco_com;
                            $ficha_sico_test_rorschach->lam_seis_resp= $request->lam_seis_resp;
                            $ficha_sico_test_rorschach->lam_seis_com = $request->rlam_seis_com;
                            $ficha_sico_test_rorschach->lam_siete_resp = $request->lam_siete_resp;
                            $ficha_sico_test_rorschach->lam_siete_com = $request->lam_siete_com;
                            $ficha_sico_test_rorschach->lam_ocho_resp = $request->lam_ocho_resp;
                            $ficha_sico_test_rorschach->lam_ocho_com = $request->lam_ocho_com;
                            $ficha_sico_test_rorschach->lam_nueve_resp = $request->lam_nueve_resp;
                            $ficha_sico_test_rorschach->lam_nueve_com = $request->lam_nueve_com;
                            $ficha_sico_test_rorschach->lam_diez_resp= $request->lam_diez_resp;
                            $ficha_sico_test_rorschach->lam_diez_com = $request->lam_diez_com;
                            $ficha_sico_test_rorschach->comentarios_gen = $request->comentarios_gen;
                            $ficha_sico_test_rorschach->otro = '';
                            $ficha_sico_test_rorschach->otro2 = '';
                            $ficha_sico_test_rorschach->estado = 1;
                            if($ficha_sico_test_rorschach->save())
                            {
                                $mensaje .= 'Ficha Sico-Test de Rorshchach registrada con exito\n';
                            }
                            else
                            {
                                $mensaje .= 'Ficha Sico-Test de Rorshchach con problema al registrar\n';
                            }
                        }
                          /** REGISTRO FICHA OTROS TEST SICOLOGICOS  */

                          {

                            $ficha_sicootrostest = new FichaSicoOtrosTest();
                            $ficha_sicootrostest->id_ficha_otros_prof = $ficha->id;
                            $ficha_sicootrostest->id_especialidad = $profesional->id_especialidad;
                            $ficha_sicootrostest->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                            $ficha_sicootrostest->id_paciente = $id_paciente;
                            $ficha_sicootrostest->id_profesional = $id_profesional;
                            $ficha_sicootrostest->nomb_test = $request->nomb_test;
                            $ficha_sicootrostest->resp = $request->resp;
                            $ficha_sicootrostest->com = $request->com;
                            $ficha_sicootrostest->ind = $request->ind;
                            $ficha_sicootrostest->comentarios_gen = $request->comentarios_gen;
                            $ficha_sicootrostest->otro = '';
                            $ficha_sicootrostest->otro2 = '';
                            $ficha_sicootrostest->estado = 1;
                            if($ficha_sicootrostest->save())
                            {
                                $mensaje .= 'Ficha Sico-Otros Test registrada con exito\n';
                            }
                            else
                            {
                                $mensaje .= 'Ficha Sico-Otros Test con problema al registrar\n';
                            }
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
                    else
                    {
                        $mensaje .= 'Ficha Clínica Sicología con problema al registrar\n';
                    }
                }
                else
                {
                    $mensaje .= $store_ot->msj;
                }
            }

        }
        else
        {
            return back()->with('error', $mensaje)->withInput();
        }
    }

    /** REGISTRO INFORME KINE - Registro*/
    public function KineInformeRegistro(Request $request)
    {

        {

            $kine_informe = new KineInforme();
            $kine_informe->id_ficha_atencion = $ficha->id;
            $kine_informe->id_ficha_otros_prof = $ficha->id;
            $kine_informe->id_especialidad = $profesional->id_especialidad;
            $kine_informe->id_tipo_especialidad = $profesional->id_tipo_especialidad;
            $kine_informe->id_paciente = $id_paciente;
            $kine_informe->id_profesional = $id_profesional;
            $kine_informe->med_tte = $request->med_tte;
            $kine_informe->dg_kine = $request->dg_kine;
            $kine_informe->ses_real = $request->ses_real;
            $kine_informe->ses_pend= $request->ses_pend;
            $kine_informe->tto_realizado = $request->tto_realizado;
            $kine_informe->com_inf_kine = $request->com_inf_kine;
            $kine_informe->prox_cont = $request->prox_cont;
            $kine_informe->otro = '';
            $kine_informe->otro2 = '';
            $kine_informe->estado = 1;
            if($kine_informe->save())
            {
                $mensaje .= 'Ficha Sico-Examen-Mental registrada con exito\n';
            }
            else
            {
                $mensaje .= 'Ficha Sico-Examen-Mental con problema al registrar\n';
            }
        }
    }
    /** REGISTRO INFORME KINE - Registro*/
    public function KinePlanificacionRegistro(Request $request)
    {

        {

            $kine_planificacion = new KinePlanificacion();
            $kine_planificacion->id_ficha_atencion = $ficha->id;
            $kine_planificacion->id_ficha_otros_prof = $ficha->id;
            $kine_planificacion->id_especialidad = $profesional->id_especialidad;
            $kine_planificacion->id_tipo_especialidad = $profesional->id_tipo_especialidad;
            $kine_planificacion->id_paciente = $id_paciente;
            $kine_planificacion->id_profesional = $id_profesional;
            $kine_planificacion->fec_inicio_tto = $request->fec_inicio_tto;
            $kine_planificacion->dg_ingreso = $request->dg_ingreso;
            $kine_planificacion->n_sesione = $request->n_sesione;
            $kine_planificacion->obj= $request->obj;
            $kine_planificacion->otro = '';
            $kine_planificacion->otro2 = '';
            $kine_planificacion->estado = 1;
            if($kine_planificacion->save())
            {
                $mensaje .= 'Ficha Sico-Examen-Mental registrada con exito\n';
            }
            else
            {
                $mensaje .= 'Ficha Sico-Examen-Mental con problema al registrar\n';
            }
        }
    }
      /** REGISTRO INFORME FONO - Registro*/
    public function FonoInformeRegistro(Request $request)
    {

        {

            $fono_informe = new FonoInforme();

            $fono_informe->id_ficha_otros_prof = $ficha_otros_prof->id;
            $fono_informe->id_ficha_fonoaudiologia = $ficha_fonoaudiologia;
            $fono_informe->id_paciente = $id_paciente;
            $fono_informe->id_profesional = $id_profesional;

            $fono_informe->med_tte = $request->med_tte;
            $fono_informe->nombre_paciente = $request->nombre_paciente;
            $fono_informe->edad = $request->nedad;
            $fono_informe->email = $request->email;
            $fono_informe->dg_fono = $request->ddg_fono;
            $fono_informe->ses_real= $request->ses_real;
            $fono_informe->ses_pend = $request->ses_pend;
            $fono_informe->tto_realizado = $request->tto_realizado;
            $fono_informe->com_inf_fono = $request->com_inf_fono;
            $fono_informe->nomb_fono= $request->nomb_fono;
            $fono_informe->prox_cont_fono= $request->prox_cont_fono;
            $fono_informe->otro = '';
            $fono_informe->otro2 = '';
            $fono_informe->estado = 1;
            if($fono_informe->save())
            {
                $mensaje .= 'Informe registrado con exito\n';
            }
            else
            {
                $mensaje .= 'Informe con problema al registrar\n';
            }
        }
    }
}
