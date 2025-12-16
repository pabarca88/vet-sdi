<?php

namespace App\Http\Controllers;

use App\Models\ExamenEspecialidad;
use App\Models\ExamenEspecialidadImg;
use App\Models\ExamenEspecialidadTemplate;
use App\Models\FichaGinecoContObstetrico;
use App\Models\FichaGinecoContPuerpCir;
use App\Models\FichaGinecologia;
use App\Models\FichaGinecoObstAntAro;
use App\Models\FichaGinecoObstAntec;
use App\Models\FichaGinecoObstAro;
use App\Models\FichaGinecoObstetrica;
use App\Models\GineModalAntecedentesPartoPuerperio;
use App\Models\GinemodalAborto;
use App\Models\GineModalAnteAnticonceptivo;
use App\Models\GineModalAntHormonales;
use App\Models\GinemodalAro;
use App\Models\GineModalEcoObstetrica;
use App\Models\GineModalEcoGinecologica;
use App\Models\HoraMedica;
use App\Models\GinemodalCicloMenstrual;
use App\Models\GinemodalGlicemia;
use App\Models\GinemodalHipertension;
use App\Models\GinemodalMamas;
use App\Models\GinemodalMamasExamen;
use App\Models\GinemodalOtrosProcedimientos;
use App\Models\Hipertension;
use App\Models\Paciente;
use App\Models\Profesional;
use Illuminate\Http\Request;

class FichaGinecoObstetricoController extends Controller
{
    /** ginecoOstetricia */
    public function store(Request $request)
    {
        if(!empty( trim($request->descripcion_hipotesis)))
        {
            $id_profesional = $request->id_profesional_fc;
            $id_paciente = $request->id_paciente_fc;

            $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();

            $ficha = FichaGinecoObstetrica::where('id', $hora_medica->id_ficha_otros_prof)->first();

            $ficha->m_cons = $request->m_cons;
            $ficha->obs_m_cons=$request->obs_m_cons;
            $ficha->menst = $request->menst;
            $ficha->fur = $request->fur;
            $ficha->tipo_mens = $request->tipo_mens;
            $ficha->obs_tipo_mens = $request->obs_tipo_mens;
            $ficha->anam = $request->anam;
            $ficha->examen_fisico = $request->examen_fisico;

            $ges = 0;
            // if ($request->modal_ges == 'on' || $request->modal_ges == '1') {
            if ($request->has('modal_ges')) {
                $ges = 1;
            }

            $cronico = 0;
            // if ($request->enf_cronico == 'on' || $request->enf_cronico == '1') {
            if ($request->has('enf_cronico')) {
                $cronico = 1;
            }

            $confidencial = 0;
            // if ($request->confidencial == 'on' || $request->confidencial == '1') {
            if ($request->has('confidencial')) {
                $confidencial = 1;
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
            $ficha->diagnostico_ce10 = $request->descripcion_cie;
            $ficha->indicaciones = $request->indicaciones;

            $ficha->cronico = $cronico;
            $ficha->ges = $ges;
            $ficha->confidencial = $confidencial;
            $ficha->id_paciente = $id_paciente;
            $ficha->id_profesional = $id_profesional;
            // $ficha->finalizada = 1;
            $ficha->estado = 6;

            if (!$ficha->save())
            {
                return back()->with('error', 'Ficha Clínica con problema al guardar')->withInput();
            }
            else
            {
                $tipo_mensaje = 'success';
                $mensaje = 'Ficha Clínica guardada de forma correcta';

                /** GINECOLOGIA */
                if(
                    // !empty($request->id_tunner)||
                    !empty($request->crecdes)|| !empty($request->examen_ext)||
                    !empty($request->tacto)|| !empty($request->obs_ex_gine)|| !empty($request->res_exam)||
                    !empty($request->desc_ex_mamas)|| !empty($request->obs_ex_mamas)|| !empty($request->res_ex_mamas) ||
                    !empty($request->mac)|| !empty($request->obs_t_mac)|| !empty($request->mac_n)||
                    !empty($request->mac_n_nom)|| !empty($request->mac_mec)|| !empty($request->mac_mec_obs)||
                    !empty($request->mac_far)|| !empty($request->obs_mac_far)|| !empty($request->g_mac_obs)||
                    !empty($request->res_ex_mac)
                    )
                {
                    $ficha_ginecologia = new FichaGinecologia();
                    $ficha_ginecologia->id_ficha_gineco_obstetrica = $ficha->id;
                    $ficha_ginecologia->id_paciente = $id_paciente;
                    $ficha_ginecologia->id_profesional = $id_profesional;
                    $ficha_ginecologia->id_tunner = $request->id_tunner;
                    $ficha_ginecologia->crecdes = $request->crecdes;
                    $ficha_ginecologia->examen_ext = $request->examen_ext;
                    $ficha_ginecologia->tacto = $request->tacto;
                    $ficha_ginecologia->obs_ex_gine = $request->obs_ex_gine;
                    $ficha_ginecologia->res_exam = $request->res_exam;
                    $ficha_ginecologia->desc_ex_mamas = $request->desc_ex_mamas;
                    $ficha_ginecologia->obs_ex_mamas = $request->obs_ex_mamas;
                    $ficha_ginecologia->res_ex_mamas = $request->res_ex_mamas;
                    $ficha_ginecologia->mac = $request->mac;
                    $ficha_ginecologia->obs_t_mac = $request->obs_t_mac;
                    $ficha_ginecologia->mac_n = $request->mac_n;
                    $ficha_ginecologia->mac_n_nom = $request->mac_n_nom;
                    $ficha_ginecologia->mac_mec = $request->mac_mec;
                    $ficha_ginecologia->mac_mec_obs = $request->mac_mec_obs;
                    $ficha_ginecologia->mac_far = $request->mac_far;
                    $ficha_ginecologia->obs_mac_far = $request->obs_mac_far;
                    $ficha_ginecologia->g_mac_obs = $request->g_mac_obs;
                    $ficha_ginecologia->res_ex_mac = $request->res_ex_mac;
                    $ficha_ginecologia->otro = '';
                    $ficha_ginecologia->otro1 = '';
                    $ficha_ginecologia->estado = 1;

                    if($ficha_ginecologia->save())
                    {
                        $mensaje .='Ficha Ginecologa registrado con exito.\n';
                    }
                    else
                    {
                        $mensaje .= 'Falla en el registro de Ficha Ginecologa.\n';
                    }
                }
                else
                {
                    // $mensaje .= 'no hace falta registrar';
                }
                /** FIN GINECOLOGIA */

                /** CONTROL OBSTETRICO */
                if(
                    !empty($request->ed_gest) || !empty($request->fpp_fur) || !empty($request->fpp_eco) ||
                    !empty($request->fpp_aut) || !empty($request->sosp_pat_emb) || !empty($request->sosp_pat_emb_obs) ||
                    !empty($request->control_emb) || !empty($request->control_emb_obs) || !empty($request->obs_grl_emb) ||
                    !empty($request->riesg_pat_grl) || !empty($request->riesg_pat_grl_obs) || !empty($request->pat_prev_emb) ||
                    !empty($request->pat_prev_emb_obs) || !empty($request->pat_prev_emb_obs_gl) || !empty($request->riesg_pat_act) ||
                    !empty($request->riesg_pat_act_obs) || !empty($request->rieg_pat_emb) || !empty($request->rieg_pat_emb_obs) ||
                    !empty($request->rieg_pat_emb_obs_grl) || !empty($request->cont_emb_mamas) || !empty($request->cont_emb_mamas_obs) ||
                    !empty($request->cont_emb_gine) || !empty($request->cont_emb_gine_obs) || !empty($request->cont_emb_au_gine) ||
                    !empty($request->cont_emb_otros) || !empty($request->cont_emb_otros_obs) || !empty($request->cont_emb_mat_obs_grl) ||
                    !empty($request->feto_lcf) || !empty($request->feto_resp_cont) || !empty($request->feto_tam) ||
                    !empty($request->feto_aut) || !empty($request->feto_obs_grl) || !empty($request->cont_rutina) ||
                    !empty($request->der_emb_aro) || !empty($request->sol_hosp)
                )
                {
                    $ficha_control_embarazo = new FichaGinecoContObstetrico();
                    $ficha_control_embarazo->id_paciente = $id_paciente;
                    $ficha_control_embarazo->id_profesional = $id_profesional;
                    $ficha_control_embarazo->id_lugar_atencion = $request->id_lugar_atencion;
                    $ficha_control_embarazo->id_ficha_gineco_obstetrica = $ficha->id;
                    $ficha_control_embarazo->ed_gest = $request->ed_gest;
                    $ficha_control_embarazo->fpp_fur = $request->fpp_fur;
                    $ficha_control_embarazo->fpp_eco = $request->fpp_eco;
                    $ficha_control_embarazo->fpp_aut = $request->fpp_aut;
                    $ficha_control_embarazo->sosp_pat_emb = $request->sosp_pat_emb;
                    $ficha_control_embarazo->sosp_pat_emb_obs = $request->sosp_pat_emb_obs;
                    $ficha_control_embarazo->control_emb = $request->control_emb;
                    $ficha_control_embarazo->control_emb_obs = $request->control_emb_obs;
                    $ficha_control_embarazo->obs_grl_emb = $request->obs_grl_emb;
                    $ficha_control_embarazo->riesg_pat_grl = $request->riesg_pat_grl;
                    $ficha_control_embarazo->riesg_pat_grl_obs = $request->riesg_pat_grl_obs;
                    $ficha_control_embarazo->pat_prev_emb = $request->pat_prev_emb;
                    $ficha_control_embarazo->pat_prev_emb_obs = $request->pat_prev_emb_obs;
                    $ficha_control_embarazo->pat_prev_emb_obs_gl = $request->pat_prev_emb_obs_gl;
                    // $ficha_control_embarazo->id_modal_fact_riesgo = $request->id_modal_fact_riesgo; // modal
                    $ficha_control_embarazo->riesg_pat_act = $request->riesg_pat_act;
                    $ficha_control_embarazo->riesg_pat_act_obs = $request->riesg_pat_act_obs;
                    $ficha_control_embarazo->rieg_pat_emb = $request->rieg_pat_emb;
                    $ficha_control_embarazo->rieg_pat_emb_obs = $request->rieg_pat_emb_obs;
                    $ficha_control_embarazo->rieg_pat_emb_obs_grl = $request->rieg_pat_emb_obs_grl;
                    $ficha_control_embarazo->cont_emb_mamas = $request->cont_emb_mamas;
                    $ficha_control_embarazo->cont_emb_mamas_obs = $request->cont_emb_mamas_obs;
                    $ficha_control_embarazo->cont_emb_gine = $request->cont_emb_gine;
                    $ficha_control_embarazo->cont_emb_gine_obs = $request->cont_emb_gine_obs;
                    $ficha_control_embarazo->cont_emb_au_gine = $request->cont_emb_au_gine;
                    $ficha_control_embarazo->cont_emb_otros = $request->cont_emb_otros;
                    $ficha_control_embarazo->cont_emb_otros_obs = $request->cont_emb_otros_obs;
                    $ficha_control_embarazo->cont_emb_mat_obs_grl = $request->cont_emb_mat_obs_grl;
                    $ficha_control_embarazo->feto_lcf = $request->feto_lcf;
                    $ficha_control_embarazo->feto_resp_cont = $request->feto_resp_cont;
                    $ficha_control_embarazo->feto_tam = $request->feto_tam;
                    $ficha_control_embarazo->feto_aut = $request->feto_aut;
                    $ficha_control_embarazo->feto_obs_grl = $request->feto_obs_grl;
                    $ficha_control_embarazo->cont_rutina = $request->cont_rutina;
                    $ficha_control_embarazo->der_emb_aro = $request->der_emb_aro;
                    $ficha_control_embarazo->sol_hosp = $request->sol_hosp;
                    $ficha_control_embarazo->otro = '';
                    $ficha_control_embarazo->otro1 = '';
                    $ficha_control_embarazo->estado = 1;


                    if($ficha_control_embarazo->save())
                    {
                        $mensaje .='Control Obstetrico registrado con exito.\n';
                    }
                    else
                    {
                        $mensaje .= 'Falla en el registro de Control Obstetrico.\n';
                    }
                }
                else
                {
                    // $mensaje .= 'no hace falta registrar';
                }
                /** FIN CONTROL OBSTETRICO  */


                /** ANTECEDENTES GINECO-OBSTETRICO  */
                if(
                    !empty($request->abort) || !empty($request->abort_obs) || !empty($request->ab_num) || !empty($request->ab_n_obs) || !empty($request->abort_obs_gl) ||
                    !empty($request->emb_prev) || !empty($request->emb_prev_obs) || !empty($request->pat_emb_prev) || !empty($request->pat_emb_prev_obs) || !empty($request->emb_prev_obs_grl) ||
                    !empty($request->emb_mult) || !empty($request->emb_mult_obs) || !empty($request->nac_vivos) || !empty($request->nac_vivos_obs) || !empty($request->nac_vivos_sal) ||
                    !empty($request->nac_vivos_sal_obs) || !empty($request->nac_vivos_obs_gls)
                )
                {

                    $ficha_gine_obst_antecedentes = new FichaGinecoObstAntec();

                    $ficha_gine_obst_antecedentes->id_paciente = $id_paciente;
                    $ficha_gine_obst_antecedentes->id_profesional = $id_profesional;
                    $ficha_gine_obst_antecedentes->id_lugar_atencion = $request->id_lugar_atencion;
                    $ficha_gine_obst_antecedentes->id_ficha_gineco_obstetrica = $ficha->id;
                    $ficha_gine_obst_antecedentes->abort = $request->abort;
                    $ficha_gine_obst_antecedentes->abort_obs = $request->abort_obs;
                    $ficha_gine_obst_antecedentes->ab_num = $request->ab_num;
                    $ficha_gine_obst_antecedentes->ab_n_obs = $request->ab_n_obs;
                    $ficha_gine_obst_antecedentes->abort_obs_gl = $request->abort_obs_gl;
                    // $ficha_gine_obst_antecedentes->id_modal_abort = //modal
                    $ficha_gine_obst_antecedentes->emb_prev = $request->emb_prev;
                    $ficha_gine_obst_antecedentes->emb_prev_obs = $request->emb_prev_obs;
                    $ficha_gine_obst_antecedentes->pat_emb_prev = $request->pat_emb_prev;
                    $ficha_gine_obst_antecedentes->pat_emb_prev_obs = $request->pat_emb_prev_obs;
                    $ficha_gine_obst_antecedentes->emb_prev_obs_grl = $request->emb_prev_obs_grl;
                    $ficha_gine_obst_antecedentes->emb_mult = $request->emb_mult;
                    $ficha_gine_obst_antecedentes->emb_mult_obs = $request->emb_mult_obs;
                    $ficha_gine_obst_antecedentes->nac_vivos = $request->nac_vivos;
                    $ficha_gine_obst_antecedentes->nac_vivos_obs = $request->nac_vivos_obs;
                    $ficha_gine_obst_antecedentes->nac_vivos_sal = $request->nac_vivos_sal;
                    $ficha_gine_obst_antecedentes->nac_vivos_sal_obs = $request->nac_vivos_sal_obs;
                    $ficha_gine_obst_antecedentes->nac_vivos_obs_gls = $request->nac_vivos_obs_gls;
                    // $ficha_gine_obst_antecedentes->id_modal_emb = //modal
                    // $ficha_gine_obst_antecedentes->id_modal_mamas = //modal
                    // $ficha_gine_obst_antecedentes->id_ex_horm = //modal
                    $ficha_gine_obst_antecedentes->otro = '';
                    $ficha_gine_obst_antecedentes->otro1 = '';
                    $ficha_gine_obst_antecedentes->estado = 1;

                    if($ficha_gine_obst_antecedentes->save())
                    {
                        $mensaje .='Antecedentes Gineco-Obstetricos registrado con exito.\n';
                    }
                    else
                    {
                        $mensaje .= 'Falla en el registro de Antecedentes Gineco-Obstetricos.\n';
                    }
                }
                else
                {
                    // $mensaje .= 'no hace falta registrar';
                }
                /** FIN ANTECEDENTES GINECO-OBSTETRICO  */

                /** ANTECEDENTES-ARO  */
                if(
                    !empty($request->aro_fact_mat) || !empty($request->aro_fact_mat_obs) || !empty($request->aro_cp1) ||
                    !empty($request->aro_cp1_obs) || !empty($request->aro_cp) || !empty($request->aro_cp_obs) ||
                    !empty($request->aro_m_puer) || !empty($request->aro_m_puer_obs) || !empty($request->aro_fact_fet) ||
                    !empty($request->aro_fact_fet_obs) || !empty($request->aro_otra_f) || !empty($request->aro_otra_f_obs)
                )
                {
                    $ficha_antec_aro = new FichaGinecoObstAntAro();

                    $ficha_antec_aro->id_paciente = $id_paciente;
                    $ficha_antec_aro->id_profesional = $id_profesional;
                    $ficha_antec_aro->id_lugar_atencion = $request->id_lugar_atencion;
                    $ficha_antec_aro->id_ficha_gineco_obstetrica = $ficha->id;
                    // $ficha_antec_aro->id_ant_go
                    $ficha_antec_aro->aro_fact_mat = $request->aro_fact_mat;
                    $ficha_antec_aro->aro_fact_mat_obs = $request->aro_fact_mat_obs;
                    $ficha_antec_aro->aro_cp1 = $request->aro_cp1;
                    $ficha_antec_aro->aro_cp1_obs = $request->aro_cp1_obs;
                    $ficha_antec_aro->aro_cp = $request->aro_cp;
                    $ficha_antec_aro->aro_cp_obs = $request->aro_cp_obs;
                    $ficha_antec_aro->aro_m_puer = $request->aro_m_puer;
                    $ficha_antec_aro->aro_m_puer_obs = $request->aro_m_puer_obs;
                    $ficha_antec_aro->aro_fact_fet = $request->aro_fact_fet;
                    $ficha_antec_aro->aro_fact_fet_obs = $request->aro_fact_fet_obs;
                    $ficha_antec_aro->aro_otra_f = $request->aro_otra_f;
                    $ficha_antec_aro->aro_otra_f_obs = $request->aro_otra_f_obs;
                    $ficha_antec_aro->otro = '';
                    $ficha_antec_aro->otro1 = '';
                    $ficha_antec_aro->estado = 1;

                    if($ficha_antec_aro->save())
                    {
                        $mensaje .='ficha Antecedentes ARO registrado con exito.\n';
                    }
                    else
                    {
                        $mensaje .= 'Falla en el registro de ficha Antecedentes ARO .\n';
                    }
                }
                else
                {
                    // $mensaje .= 'no hace falta registrar';
                }
                /**FIN ANTECEDENTES-ARO  */

                /** CONTROL EMBARAZO ARO  */
                if(
                    !empty($request->aro_feto_eg) || !empty($request->aro_feto_fpp_fur) || !empty($request->aro_feto_fpp_eco) ||
                    !empty($request->aro_feto_fpp_au) || !empty($request->aro_s_pat_ea) || !empty($request->aro_s_pat_ea_obs) ||
                    !empty($request->aro_cont_ea) || !empty($request->aro_cont_ea_obs) || !empty($request->aro_cont_ea_obs_gl) ||
                    !empty($request->aro_ea_mam) || !empty($request->aro_ea_mam_obs) || !empty($request->aro_ea_gine) ||
                    !empty($request->aro_ea_gine_obs) || !empty($request->aro_ea_m_au) || !empty($request->aro_ea_m_ot) ||
                    !empty($request->aro_ea_m_ot_obs) || !empty($request->aro_ea_m_exgin) || !empty($request->aro_ea_m_exgin_obs) ||
                    !empty($request->aro_ea_m_pe) || !empty($request->aro_ea_m_ede) || !empty($request->aro_ea_m_pa) ||
                    !empty($request->aro_ea_m_p) || !empty($request->aro_ea_m_obs) || !empty($request->aro_fur_fpp_act) ||
                    !empty($request->aro_resp_cont_act) || !empty($request->aro_tam_fet_act) || !empty($request->aro_alt_uter_act) ||
                    !empty($request->aro_ex_fetal_act_obs) || !empty($request->aro_obs_eco_fetal_act) || !empty($request->fp_normal) ||
                    !empty($request->adel_fp) || !empty($request->hosp_aro) || !empty($request->obs_plan_tto_em_aro)
                )
                {
                    $ficha_aro = new FichaGinecoObstAro ();
                    $ficha_aro->id_paciente = $id_paciente;
                    $ficha_aro->id_profesional = $id_profesional;
                    $ficha_aro->id_lugar_atencion = $request->id_lugar_atencion;
                    $ficha_aro->id_ficha_gineco_obstetrica = $ficha->id;
                    $ficha_aro->id_ficha_ant_aro = empty($ficha_antec_aro)?'':$ficha_antec_aro->id;
                    $ficha_aro->aro_feto_eg = $request->aro_feto_eg;
                    $ficha_aro->aro_feto_fpp_fur = $request->aro_feto_fpp_fur;
                    $ficha_aro->aro_feto_fpp_eco = $request->aro_feto_fpp_eco;
                    $ficha_aro->aro_feto_fpp_au = $request->aro_feto_fpp_au;
                    $ficha_aro->aro_s_pat_ea = $request->aro_s_pat_ea;
                    $ficha_aro->aro_s_pat_ea_obs = $request->aro_s_pat_ea_obs;
                    $ficha_aro->aro_cont_ea = $request->aro_cont_ea;
                    $ficha_aro->aro_cont_ea_obs = $request->aro_cont_ea_obs;
                    $ficha_aro->aro_cont_ea_obs_gl = $request->aro_cont_ea_obs_gl;
                    $ficha_aro->aro_ea_mam = $request->aro_ea_mam;
                    $ficha_aro->aro_ea_mam_obs = $request->aro_ea_mam_obs;
                    $ficha_aro->aro_ea_gine = $request->aro_ea_gine;
                    $ficha_aro->aro_ea_gine_obs = $request->aro_ea_gine_obs;
                    $ficha_aro->aro_ea_m_au = $request->aro_ea_m_au;
                    $ficha_aro->aro_ea_m_ot = $request->aro_ea_m_ot;
                    $ficha_aro->aro_ea_m_ot_obs = $request->aro_ea_m_ot_obs;
                    $ficha_aro->aro_ea_m_exgin = $request->aro_ea_m_exgin;
                    $ficha_aro->aro_ea_m_exgin_obs = $request->aro_ea_m_exgin_obs;
                    $ficha_aro->aro_ea_m_pe = $request->aro_ea_m_pe;
                    $ficha_aro->aro_ea_m_ede = $request->aro_ea_m_ede;
                    $ficha_aro->aro_ea_m_pa = $request->aro_ea_m_pa;
                    $ficha_aro->aro_ea_m_p = $request->aro_ea_m_p;
                    $ficha_aro->aro_ea_m_obs = $request->aro_ea_m_obs;
                    $ficha_aro->aro_fur_fpp_act = $request->aro_fur_fpp_act;
                    $ficha_aro->aro_resp_cont_act = $request->aro_resp_cont_act;
                    $ficha_aro->aro_tam_fet_act = $request->aro_tam_fet_act;
                    $ficha_aro->aro_alt_uter_act = $request->aro_alt_uter_act;
                    $ficha_aro->aro_ex_fetal_act_obs = $request->aro_ex_fetal_act_obs;
                    $ficha_aro->aro_obs_eco_fetal_act = $request->aro_obs_eco_fetal_act;
                    $ficha_aro->fp_normal = $request->fp_normal;
                    $ficha_aro->adel_fp = $request->adel_fp;
                    $ficha_aro->hosp_aro = $request->hosp_aro;
                    $ficha_aro->obs_plan_tto_em_aro = $request->obs_plan_tto_em_aro;
                    $ficha_aro->otro = '';
                    $ficha_aro->otro1 = '';
                    $ficha_aro->estado = 1;

                    if($ficha_aro->save())
                    {
                        $mensaje .='ficha ARO registrado con exito.\n';
                    }
                    else
                    {
                        $mensaje .= 'Falla en el registro de ficha ARO .\n';
                    }
                }
                else
                {
                    // $mensaje .= 'no hace falta registrar';
                }

                /**FIN CONTROL EMBARAZO ARO   */
                /** CONTROL CIRUGIA GINECO-OBSTETRICA */
                if(
                    !empty($request->e_general) || !empty($request->parto_cesarea) || !empty($request->parto_normal) ||
                    !empty($request->cirugia_gine_obst) || !empty($request->hda_operatoria) || !empty($request->retiro_ptos) ||
                    !empty($request->insp_abd) || !empty($request->tacto) || !empty($request->mamas)
                )
                {
                    $ficha_gine_obst_cirugia_control = new FichaGinecoContPuerpCir();
                    $ficha_gine_obst_cirugia_control->id_paciente = $id_paciente;
                    $ficha_gine_obst_cirugia_control->id_profesional = $id_profesional;
                    $ficha_gine_obst_cirugia_control->id_lugar_atencion = $request->id_lugar_atencion;
                    $ficha_gine_obst_cirugia_control->id_ficha_gineco_obstetrica = $ficha->id;
                    $ficha_gine_obst_cirugia_control->id_ficha_cont_emb = empty($ficha_aro)?'':$ficha_aro->id;
                    $ficha_gine_obst_cirugia_control->id_ficha_gine = $ficha_ginecologia->id;
                    $ficha_gine_obst_cirugia_control->id_ant_go = empty($ficha_antec_aro)?'':$ficha_antec_aro->id;
                    // $ficha_gine_obst_cirugia_control->id_protocolo = // modal protocolo
                    // $ficha_gine_obst_cirugia_control->id_carne_alta = // modal carnet de alta
                    $ficha_gine_obst_cirugia_control->e_general = $request->e_general;
                    $ficha_gine_obst_cirugia_control->parto_cesarea = $request->parto_cesarea;
                    $ficha_gine_obst_cirugia_control->parto_normal = $request->parto_normal;
                    $ficha_gine_obst_cirugia_control->cirugia_gine_obst = $request->cirugia_gine_obst;
                    $ficha_gine_obst_cirugia_control->hda_operatoria = $request->hda_operatoria;
                    $ficha_gine_obst_cirugia_control->retiro_ptos = $request->retiro_ptos;
                    $ficha_gine_obst_cirugia_control->insp_abd = $request->insp_abd;
                    $ficha_gine_obst_cirugia_control->tacto = $request->tacto;
                    $ficha_gine_obst_cirugia_control->mamas = $request->mamas;
                    $ficha_gine_obst_cirugia_control->otro = '';
                    $ficha_gine_obst_cirugia_control->otro1 = '';
                    $ficha_gine_obst_cirugia_control->estado = 1;

                    if($ficha_gine_obst_cirugia_control->save())
                    {
                        $mensaje .='Control Cirugîa Gineco-Obstetricos registrado con exito.\n';
                    }
                    else
                    {
                        $mensaje .= 'Falla en el registro de Control Cirugîa Gineco-Obstetricos.\n';
                    }
                }
                else
                {
                    // $mensaje .= 'no hace falta registrar';
                }


                /** FIN CONTROL CIRUGIA GINECO-OBSTETRICA  */

                /** INICIO REGISTRO DE EXAMENES ESPECIALES */
                /** REGISTRO DE EXAMEN */
                $lista_examen_especialidad = explode('|',$request->tipo_examen_especial);

                foreach ($lista_examen_especialidad as $key_examen_tipo => $value_examen_tipo)
                {
                    $parametro = $request->all();

                    $temp_value_examen_tipo = explode(',',$value_examen_tipo);
                    // $temp_value_examen_tipo[0] = alias template
                    // $temp_value_examen_tipo[1] = id_tipo
                    // $temp_value_examen_tipo[2] = id_template

                    if( !empty( $request['diag_endos_'.$temp_value_examen_tipo[0]] ) || ( !isset($request['diag_endos_'.$temp_value_examen_tipo[0]]) && !empty($request['tipo_proced']) ) )
                    {

                        /** limpiar parametos */
                        foreach( $parametro as $key => $value )
                        {
                            if(!strpos($key, '_'.$temp_value_examen_tipo[0]) && !strpos($key, 'id_fc') && !strpos($key, '_fc') )
                            unset($parametro[$key]);
                        }

                        $parametro['id_ficha_ginecologico'] = $ficha->id;
                        $examen_json = ExamenEspecialidadController::estructuraJson($temp_value_examen_tipo[2],$parametro);
                        if($examen_json['estado'] == 1)
                        {
                            $examen = '';
                            /** VALIDAR INFORMACION */
                            if($examen_json['cant_datos'] > 0)
                            {
                                $profesional = Profesional::find($id_profesional);
                                $template = ExamenEspecialidadTemplate::find($temp_value_examen_tipo[2]);

                                $examen = new ExamenEspecialidad();
                                $examen->id_tipo = '1';
                                $examen->id_template = $temp_value_examen_tipo[2];
                                $examen->id_examen_tipo = $temp_value_examen_tipo[1];
                                $examen->id_sub_tipo_especialidad = $profesional->id_sub_tipo_especialidad;
                                // $examen->id_ficha_atencion = $ficha->id;
                                $examen->id_ficha_especialidad = $ficha->id;
                                $examen->id_paciente = $id_paciente;
                                $examen->id_profesional = $id_profesional;
                                $examen->nombre = $template->nombre;
                                $examen->cuerpo = $examen_json['json'];
                                $examen->estado = '1';
                                if($examen->save())
                                {
                                    $datos['examen'][$temp_value_examen_tipo[0]]['estado'] = 1;
                                    $datos['examen'][$temp_value_examen_tipo[0]]['msj'] = 'registro exitoso';
                                    $mensaje .= 'Examen '.$template->nombre.' registrado de forma exitosa\n';

                                    /** carga imagen */
                                    if(!empty($request->input_lista_imagenes))
                                    {

                                        $array_imagenes = (array)json_decode($request->input_lista_imagenes);

                                        // var_dump($array_imagenes);
                                        // var_dump($temp_value_examen_tipo[0]);
                                        // var_dump($array_imagenes[$temp_value_examen_tipo[0]]);

                                        if(!empty($array_imagenes[$temp_value_examen_tipo[0]]))
                                        {
                                            $resulto_img = array();
                                            foreach ($array_imagenes[$temp_value_examen_tipo[0]] as $key => $value)
                                            {
                                                $paciente = Paciente::find($id_paciente);
                                                // echo json_encode($value);
                                                $ruta_temp = $value[0];
                                                $nombre_real = $value[1];
                                                $nombre_temp = $value[2];
                                                $file_extension = $value[3];
                                                if(isset($value[4])) $descripcion = $value[4];
                                                else $descripcion = '';
                                                $nombre_final = $paciente->rut.'_'.$examen->id.'_'.date('YmdHis').'_'.uniqid().'.'.$file_extension;

                                                $resulto_img[$key] = CargaImagenController::moverImagen($nombre_temp, 'img_examen', $nombre_final);
                                                $registro_img = new ExamenEspecialidadImg();
                                                $registro_img->id_examen = $examen->id;
                                                $registro_img->url = $resulto_img[$key]['proceso']['url'];
                                                $registro_img->nombre = $nombre_final;
                                                $registro_img->otro = $descripcion;
                                                $registro_img->estado = 1;

                                                if($registro_img->save())
                                                {
                                                    $resulto_img[$key]['estado'] = 1;
                                                    $resulto_img[$key]['msj'] = 'imagen registrada';
                                                }
                                                else
                                                {
                                                    $resulto_img[$key]['estado'] = 0;
                                                    $resulto_img[$key]['msj'] = 'falla en registro de imagen';
                                                }

                                            }
                                            $datos['examen'][$temp_value_examen_tipo[0]]['resulto_img'] = $resulto_img;
                                        }
                                    }
                                }
                                else
                                {
                                    $datos['examen'][$temp_value_examen_tipo[0]]['estado'] = 0;
                                    $datos['examen'][$temp_value_examen_tipo[0]]['msj'] = 'Registro NO exitoso';
                                    $mensaje .= 'Examen '.$template->nombre.' No guardada \n';
                                }
                            }
                        }
                        else
                        {
                            $mensaje .= 'Problema al general Estructura de examen '.$temp_value_examen_tipo[0].'\n';
                        }

                    }
                    // else
                    // {
                    //     $mensaje .= 'No tiene diag_endos_'.$temp_value_examen_tipo[0].'\n';
                    // }
                }
                /** FIN REGISTRO DE EXAMENES ESPECIALES */



                //  finalizar hora medica
                $hora_medica->id_estado = 6;
                $mensaje_estado_hora_medica = '';
                if (!$hora_medica->save()) {
                    $mensaje_estado_hora_medica .= 'Hora Medica con Problemas para finalizar.';
                }
                else
                {
                    $mensaje_estado_hora_medica .= 'Hora medica Finalizada con Exito.';
                }
                $mensaje .= '\n' . $mensaje_estado_hora_medica;

                if($request->cerrarsession == 0 || $request->cerrarsession =='')
                {
                    /** redireccion Redirect funciona correcto */
                    return \Redirect::route('profesional.mi_agenda','lugares_atencion='.$request->id_lugar_atencion)->with($tipo_mensaje, $mensaje);
                }
                else if($request->cerrarsession == 1)
                {
					// $request->session()->invalidate();
					// $request->session()->regenerateToken();
					// return \Redirect::route('home.ingreso');
                    // return redirect()->route('logout')->with('request', $request);
                    // \Redirect::ROUTE('logout');

                   //si funciona
					$request->session()->invalidate();
                    $request->session()->regenerateToken();
                    return \Redirect::route('home.ingreso');
                }
            }

        }
        else
        {
            return back()->with('error', 'El Diagnóstico es Requerido.\n Su Ficha Clínica NO ha sido Guardada aún. \n Si es solo Control, indicar Control de Patología.')->withInput();;
        }
    }

    public function GineModalCicloMenstrual(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        /** menarquia */
        if(!empty($request->fecha_comienzo))
        {
            // !empty($request->fecha_actual)
            if(empty($request->edad_menarquia))
            {
                $error['Edad - Menarquia'] = 'campo requerido';
                $valido = 0;
            }
            if(empty($request->gr_tunner))
            {
                $error['Grado Tunner - Menarquia'] = 'campo requerido';
                $valido = 0;
            }
            if(empty($request->fecha_comienzo))
            {
                $error['Fecha Comienzo - Menarquia'] = 'campo requerido';
                $valido = 0;
            }
            if(empty($request->comentarios_menarquia))
            {
                $error['Comentarios - Menarquia'] = 'campo requerido';
                $valido = 0;
            }
        }

        /** ciclo menstrual */
        if(!empty($request->fur))
        {
            if(empty($request->fur))
            {
                $error['FUR - Ciclo Menstrual'] = '';
                $valido = 0;
            }
            if(empty($request->tipo_ciclo))
            {
                $error['Tipo Ciclo - Ciclo Menstrual'] = '';
                $valido = 0;
            }
            if(empty($request->frecuencia_ciclo))
            {
                $error['Frecuencia Ciclo - Ciclo Menstrual'] = '';
                $valido = 0;
            }
            if(empty($request->sintomas_ciclo))
            {
                $error['Sintomas Ciclo - Ciclo Menstrual'] = '';
                $valido = 0;
            }
            if(empty($request->comentarios_ciclo))
            {
                $error['Comentarios - Ciclo Menstrual'] = '';
                $valido = 0;
            }
        }

        if($valido)
        {

            $modal_ciclo_menst = new GinemodalCicloMenstrual();
            $modal_ciclo_menst->id_ficha_gineco_obstetrica = $request->id_ficha_gineco_obstetrica;
            // $modal_ciclo_menst->id_ficha_gine = $request->id_ficha_gine;
            $modal_ciclo_menst->id_paciente = $request->id_paciente;
            $modal_ciclo_menst->id_profesional = $request->id_profesional;
            $modal_ciclo_menst->fecha_actual = date('Y-m-d');
            if(!empty($request->fecha_comienzo))
            {
                $modal_ciclo_menst->edad_menarquia = $request->edad_menarquia;
                $modal_ciclo_menst->gr_tunner = $request->gr_tunner;
                $modal_ciclo_menst->fecha_comienzo= $request->fecha_comienzo;
                $modal_ciclo_menst->comentarios_menarquia = $request->comentarios_menarquia;
            }

            if(!empty($request->fur))
            {
                $modal_ciclo_menst->fur = $request->fur;
                $modal_ciclo_menst->tipo_ciclo = $request->tipo_ciclo;
                $modal_ciclo_menst->frecuencia_ciclo = $request->frecuencia_ciclo;
                $modal_ciclo_menst->sintomas_ciclo = $request->sintomas_ciclo;
                $modal_ciclo_menst->comentarios_ciclo= $request->comentarios_ciclo;
            }
            $modal_ciclo_menst->otro = '';
            $modal_ciclo_menst->otro1 = '';
            $modal_ciclo_menst->estado = 1;

            if($modal_ciclo_menst->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'exito';
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'falla en el registro';
                $datos['request'] = $request->all();
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

    public function VerGineModalCicloMenstrual(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_ficha_gineco_obstetrica))
        {
            $error['Id Ficha'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->id_paciente))
        {
            $error['Id Paciente'] = 'campo requerido';
            $valido = 0;
        }


        if($valido)
        {
            $filtros = array();
            $filtros[] = array('id_ficha_gineco_obstetrica', $request->id_ficha_gineco_obstetrica);
            $filtros[] = array('id_paciente', $request->id_paciente);
            $registros = GinemodalCicloMenstrual::where($filtros)->get();

            if($registros)
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registros';
                $datos['registros'] = $registros;
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

    /** MODA ANTECEDENTES DE MAMAS */
    public function AgregarAntesedenteMamas(Request $request)
    {
        $datos = array();
        $error = array();
        $valido=1;

        if(empty($request->id_ficha_gineco_obstetrica))
        {
            $error['ID FICHA'] = 'campo requerido';
            $valido = 0;
        }
        // if(empty($request->id_lugar_atencion))
        // {
        //     $error['LIGAR ATENCION'] = 'campo requerido';
        //     $valido = 0;
        // }
        if(empty($request->id_paciente))
        {
            $error['PACIENTE'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_profesional))
        {
            $error['PROFESIONAL'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->fecha))
        {
            $error['FECHA'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->tipo_examen))
        {
            $error['TIPO DE EXAMEN'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->resultado))
        {
            $error['RESULTADO'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->indic))
        {
            $error['INDICACIONES'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->tto_complicaciones))
        {
            $error['TRATAMIENTO O COMPLICACIONES'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $gine_modal_mamas_antec = new GinemodalMamas();
            $gine_modal_mamas_antec->id_ficha_gineco_obstetrica = $request->id_ficha_gineco_obstetrica;
            // $gine_modal_mamas_antec->id_lugar_atencion = $request->id_lugar_atencion;
            $gine_modal_mamas_antec->id_paciente = $request->id_paciente;
            $gine_modal_mamas_antec->id_profesional = $request->id_profesional;
            $gine_modal_mamas_antec->fecha = $request->fecha;
            $gine_modal_mamas_antec->tipo_examen = $request->tipo_examen;
            $gine_modal_mamas_antec->resultado = $request->resultado;
            $gine_modal_mamas_antec->indic= $request->indic;
            $gine_modal_mamas_antec->tto_complicaciones = $request->tto_complicaciones;
            $gine_modal_mamas_antec->otro = '';
            $gine_modal_mamas_antec->otro1 = '';
            $gine_modal_mamas_antec->estado = 1;

            if($gine_modal_mamas_antec->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'exito';
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
            $datos['msj'] = 'campos requeridos';
            $datos['error'] = $error;
        }

        return $datos;
    }

    public function VerAntesedenteMamas(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if($valido)
        {
            $filtros = array();
            $filtros[] = array('id_paciente', $request->id_paciente);
            $registros = GinemodalMamas::where($filtros)->get();
            if($registros)
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registros';
                $datos['registros'] = $registros;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Sin registros';
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
    /** FIN MODA ANTECEDENTES DE MAMAS */

    /** MODAL Examen clínico de mamas Solicitud Examen */
    public function AgregarExamenCliniMamas(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_ficha_gineco_obstetrica))
        {
            $error['ID FICHA'] = "Campo requerido";
            $valido = 0;
        }
        if(empty($request->id_paciente))
        {
            $error['PACIENTE'] = "Campo requerido";
            $valido = 0;
        }
        if(empty($request->id_profesional))
        {
            $error['PROFESIONAL'] = "Campo requerido";
            $valido = 0;
        }
        // if(empty($request->fecha))
        // {
        //     $error['FECHA'] = 'Campo requerido';
        //     $valido = 0;
        // }
        if(empty($request->lado_1))
        {
            $error['LADO'] = 'Campo requerido';
            $valido = 0;
        }
        if(empty($request->des_ex_mamas_1))
        {
            $error['DESCRIPCION EXAMEN'] = 'Campo requerido';
            $valido = 0;
        }

        if(!empty($request->lado_2))
        {
            if(empty($request->des_ex_mamas_2))
            {
                $error['DESCRIPCION EXAMEN'] = 'Campo requerido';
                $valido = 0;
            }
        }

        if($valido)
        {
            $filtros = array();
            $filtros[] = array('id_ficha_gineco_obstetrica',$request->id_ficha_gineco_obstetrica);
            $filtros[] = array('id_paciente',$request->id_paciente);
            $filtros[] = array('id_profesional',$request->id_profesional);
            $buscar_registro = GinemodalMamasExamen::where($filtros)->first();
            if($buscar_registro)
            {
                $gine_modal_mamas_examen = GinemodalMamasExamen::find($buscar_registro->id);
                $gine_modal_mamas_examen->id_ficha_gineco_obstetrica = $request->id_ficha_gineco_obstetrica;
                $gine_modal_mamas_examen->id_paciente = $request->id_paciente;
                $gine_modal_mamas_examen->id_profesional = $request->id_profesional;
                // $gine_modal_mamas_examen->id_ficha_gine = $request->id_ficha_gine;
                $gine_modal_mamas_examen->fecha = date('Y-m-d');
                $gine_modal_mamas_examen->lado_1 = $request->lado_1;
                $gine_modal_mamas_examen->des_ex_mamas_1 = $request->des_ex_mamas_1;
                $gine_modal_mamas_examen->lado_2 = $request->lado_2;
                $gine_modal_mamas_examen->des_ex_mamas_2 = $request->des_ex_mamas_2;
                $gine_modal_mamas_examen->des_ex_mamasgen = $request->des_ex_mamasgen;
                // $gine_modal_mamas_examen->sol_ex_lado = $request->sol_ex_lado;
                // $gine_modal_mamas_examen->sol_ex_tipo = $request->sol_ex_tipo;
                // $gine_modal_mamas_examen->enf_cuadrante = $request->enf_cuadrante;
                // $gine_modal_mamas_examen->sosp_dg = $request->sosp_dg;
                // $gine_modal_mamas_examen->sol_ex_mamas_esp = $request->sol_ex_mamas_esp;

            }
            else
            {
                $gine_modal_mamas_examen = new GinemodalMamasExamen();
                $gine_modal_mamas_examen->id_ficha_gineco_obstetrica = $request->id_ficha_gineco_obstetrica;
                $gine_modal_mamas_examen->id_paciente = $request->id_paciente;
                $gine_modal_mamas_examen->id_profesional = $request->id_profesional;
                // $gine_modal_mamas_examen->id_ficha_gine = $request->id_ficha_gine;
                $gine_modal_mamas_examen->fecha = date('Y-m-d');
                $gine_modal_mamas_examen->lado_1 = $request->lado_1;
                $gine_modal_mamas_examen->des_ex_mamas_1 = $request->des_ex_mamas_1;
                $gine_modal_mamas_examen->lado_2 = $request->lado_2;
                $gine_modal_mamas_examen->des_ex_mamas_2 = $request->des_ex_mamas_2;
                $gine_modal_mamas_examen->des_ex_mamasgen = $request->des_ex_mamasgen;
                // $gine_modal_mamas_examen->sol_ex_lado = $request->sol_ex_lado;
                // $gine_modal_mamas_examen->sol_ex_tipo = $request->sol_ex_tipo;
                // $gine_modal_mamas_examen->enf_cuadrante = $request->enf_cuadrante;
                // $gine_modal_mamas_examen->sosp_dg = $request->sosp_dg;
                // $gine_modal_mamas_examen->sol_ex_mamas_esp = $request->sol_ex_mamas_esp;
                $gine_modal_mamas_examen->otro = '';
                $gine_modal_mamas_examen->otro1 = '';
                $gine_modal_mamas_examen->estado = 1;
            }

            if($gine_modal_mamas_examen->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'exito';
            }
            else
            {
                $datos['estado'] = 1;
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

    public function VerExamenCliniMamas(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_ficha_gineco_obstetrica))
        {
            $error['ID FICHA'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_paciente))
        {
            $error['PACIENTE'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_profesional))
        {
            $error['PROFESIONAL'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $filtros = array();
            $filtros[] = array('id_ficha_gineco_obstetrica',$request->id_ficha_gineco_obstetrica);
            $filtros[] = array('id_paciente',$request->id_paciente);
            $filtros[] = array('id_profesional',$request->id_profesional);
            $registro = GinemodalMamasExamen::where($filtros)->first();
            if($registro)
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registro';
                $datos['registro'] = $registro;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'sin registros';
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
    /** FIN MODAL Examen clínico de mamas Solicitud Examen */

    /**  INICIO MODAL Antecedentes Abortos */
    public function AgregarAntAborto(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_ficha_gineco_obstetrica))
        {
            $error['ID FICHA'] = "Campo requerido";
            $valido = 0;
        }
        if(empty($request->id_paciente))
        {
            $error['PACIENTE'] = "Campo requerido";
            $valido = 0;
        }
        if(empty($request->id_profesional))
        {
            $error['PROFESIONAL'] = "Campo requerido";
            $valido = 0;
        }
        if(empty($request->fecha_abort))
        {
            $error['FECHA ABORTO'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->num_emb))
        {
            $error['N° EMBARAZO'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->causa))
        {
            $error['CAUSA'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->tipo_aborto))
        {
            $error['TIPO ABORTO'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->obs_tto_complic))
        {
            $error['TRATAMIENTO'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $modal_ant_abortos = new GinemodalAborto();
            $modal_ant_abortos->id_ficha_gineco_obstetrica = $request->id_ficha_gineco_obstetrica;
            $modal_ant_abortos->id_paciente = $request->id_paciente;
            $modal_ant_abortos->id_profesional = $request->id_profesional;
            // $modal_ant_abortos->id_ficha_gine = $id_profesional;
            $modal_ant_abortos->fecha_abort = $request->fecha_abort;
            $modal_ant_abortos->num_emb = $request->num_emb;
            $modal_ant_abortos->causa = $request->causa;
            $modal_ant_abortos->tipo_aborto= $request->tipo_aborto;
            $modal_ant_abortos->obs_tto_complic = $request->obs_tto_complic;
            $modal_ant_abortos->otro = '';
            $modal_ant_abortos->otro1 = '';
            $modal_ant_abortos->estado = 1;

            if($modal_ant_abortos->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'exito';
            }
            else
            {
                $datos['estado'] = 1;
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

    public function VerAntAborto(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;
        if(empty($request->id_paciente))
        {
            $error['PACIENTE'] = "Campo requerido";
            $valido = 0;
        }

        if($valido)
        {
            $filtros = array();
            $filtros[] = array('id_paciente', $request->id_paciente);
            $filtros[] = array('estado', 1);
            $registros = GinemodalAborto::where($filtros)->get();

            if($registros)
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registros';
                $datos['registros'] = $registros;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'sin registros';
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
    /** FIN  MODAL Antecedentes Abortos */

    /** MODAL ANTECEDENTE PARTO PUERPERIO */
    public function AgregarAntePartoPuerperio(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_ficha_gineco_obstetrica))
        {
            $error['ID FICHA'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_paciente))
        {
            $error['PACIENTE'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_profesional))
        {
            $error['PROFESIONAL'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $modal_ant_parto_puerperio = new GineModalAntecedentesPartoPuerperio();
            $modal_ant_parto_puerperio->id_ficha_gineco_obstetrica = $request->id_ficha_gineco_obstetrica;
            $modal_ant_parto_puerperio->id_paciente = $request->id_paciente;
            $modal_ant_parto_puerperio->id_profesional = $request->id_profesional;
            // $modal_ant_parto_puerperio->id_ficha_gine = $request->id_ficha_gine;
            $modal_ant_parto_puerperio->fecha = $request->fecha;
            $modal_ant_parto_puerperio->num_emb = $request->num_emb;
            $modal_ant_parto_puerperio->control_emb = $request->control_emb;
            $modal_ant_parto_puerperio->tipo_parto= $request->tipo_parto;
            $modal_ant_parto_puerperio->puerperio = $request->puerperio;
            $modal_ant_parto_puerperio->recien_nacido= $request->recien_nacido;
            $modal_ant_parto_puerperio->tto_complicaciones = $request->tto_complicaciones;
            $modal_ant_parto_puerperio->otro = '';
            $modal_ant_parto_puerperio->otro1 = '';
            $modal_ant_parto_puerperio->estado = 1;
            if($modal_ant_parto_puerperio->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'exito';
            }
            else
            {
                $datos['estado'] = 1;
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

    public function VerAntePartoPuerperio(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;
        if(empty($request->id_paciente))
        {
            $error['PACIENTE'] = "Campo requerido";
            $valido = 0;
        }

        if($valido)
        {
            $filtros = array();
            $filtros[] = array('id_paciente', $request->id_paciente);
            $filtros[] = array('estado', 1);
            $registros = GineModalAntecedentesPartoPuerperio::where($filtros)->get();

            if($registros)
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registros';
                $datos['registros'] = $registros;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'sin registros';
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
    /** FIN MODAL ANTECEDENTE PARTO PUERPERIO */

    /** INICIO DE MODAL ANTECEDENTES HORMONALES  **/
    public function AgregarAntExHormonales(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_ficha_gineco_obstetrica))
        {
            $error['ID FICHA'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_paciente))
        {
            $error['PACIENTE'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_profesional))
        {
            $error['PROFESIONAL'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $registro = new GineModalAntHormonales();
            $registro->id_ficha_gineco_obstetrica = $request->id_ficha_gineco_obstetrica;
            $registro->id_paciente = $request->id_paciente;
            $registro->id_profesional = $request->id_profesional;
            $registro->fecha = $request->fecha;
            $registro->motivo = $request->motivo;
            $registro->tipo_examen = $request->tipo_examen;
            $registro->resultado = $request->resultado;
            $registro->otros_ant = $request->otros_ant;
            $registro->otro = '';
            $registro->otro1 = '';
            $registro->estado = 1;
            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'exito';
            }
            else
            {
                $datos['estado'] = 1;
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

    public function VerAntExHormonales(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;
        if(empty($request->id_paciente))
        {
            $error['PACIENTE'] = "Campo requerido";
            $valido = 0;
        }

        if($valido)
        {
            $filtros = array();
            $filtros[] = array('id_paciente', $request->id_paciente);
            $filtros[] = array('estado', 1);
            $registros = GineModalAntHormonales::where($filtros)->get();

            if($registros)
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registros';
                $datos['registros'] = $registros;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'sin registros';
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
    /** FIN DE MODAL ANTECEDENTES HORMONALES  **/

    /** INICIO MODAL HIPERTENSION */
    public function AgregarModalHipertension(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_ficha_gineco_obstetrica))
        {
            $error['ID FICHA'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_paciente))
        {
            $error['PACIENTE'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_profesional))
        {
            $error['PROFESIONAL'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_lugar_atencion))
        {
            $error['LUGAR ATENCION'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->sistolica))
        {
            $error['SISTOLICA'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->diastolica))
        {
            $error['DIASTOLICA'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->ideal))
        {
            $error['IDEAL'] = 'campo requerido';
            $valido = 0;
        }
        // if(empty($request->pulso))
        // {
        //     $error['PULSO'] = 'campo requerido';
        //     $valido = 0;
        // }

        if($valido)
        {
            $registro = new Hipertension();

            $registro->sistolica = $request->sistolica;
            $registro->diastolica = $request->diastolica;
            $registro->ideal = $request->ideal;
            $registro->pulso = (empty($request->pulso)?null:$request->pulso);
            $registro->medicamento = (empty($request->medicamento)?null:$request->medicamento);
            $registro->sintomas = (empty($request->sintomas)?null:$request->sintomas);
            $registro->id_paciente = $request->id_paciente;
            $registro->id_profesional = $request->id_profesional;
            $registro->id_ficha_atencion = (empty($request->id_ficha_atencion)?null:$request->id_ficha_atencion);
            $registro->id_ficha_otros_prof = (empty($request->id_ficha_otros_prof)?null:$request->id_ficha_otros_prof);
            $registro->id_ficha_gineco_obstetrica = (empty($request->id_ficha_gineco_obstetrica)?null:$request->id_ficha_gineco_obstetrica);
            $registro->id_lugar_atencion = $request->id_lugar_atencion;

            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'exito';
            }
            else
            {
                $datos['estado'] = 1;
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

    public function VerModalHipertension(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;
        if(empty($request->id_paciente))
        {
            $error['PACIENTE'] = "Campo requerido";
            $valido = 0;
        }

        if($valido)
        {
            $filtros = array();
            $filtros[] = array('id_paciente', $request->id_paciente);
            $filtros[] = array('estado', 1);
            $registros = Hipertension::where($filtros)->get();

            if($registros)
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registros';
                $datos['registros'] = $registros;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'sin registros';
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
    /** FIN MODAL HIPERTENSION */

    /** INICIO MODAL OTRO PROCEDIMIENTO */
    public function AgregarModalOtrosProcedimientos(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_ficha_gineco_obstetrica))
        {
            $error['ID FICHA'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_paciente))
        {
            $error['PACIENTE'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_profesional))
        {
            $error['PROFESIONAL'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->procedimiento))
        {
            $error['NOMBRE PROCEDIMIENTO'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->desc_procedimiento))
        {
            $error['DESCRIPCIÓN PROCEDIMIENTO'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $modal_otros_procedimientos = new GinemodalOtrosProcedimientos();
            $modal_otros_procedimientos->id_ficha_gineco_obstetrica = $request->id_ficha_gineco_obstetrica;
            $modal_otros_procedimientos->id_paciente = $request->id_paciente;
            $modal_otros_procedimientos->id_profesional = $request->id_profesional;
            $modal_otros_procedimientos->fecha = date('Y-m-d');
            $modal_otros_procedimientos->procedimiento = $request->procedimiento;
            $modal_otros_procedimientos->desc_procedimiento = $request->desc_procedimiento;
            $modal_otros_procedimientos->otro = '';
            $modal_otros_procedimientos->otro1 = '';
            $modal_otros_procedimientos->estado = 1;
            if($modal_otros_procedimientos->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'exito';
            }
            else
            {
                $datos['estado'] = 1;
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

    public function VerModalOtrosProcedimientos(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;
        if(empty($request->id_paciente))
        {
            $error['PACIENTE'] = "Campo requerido";
            $valido = 0;
        }

        if($valido)
        {
            $filtros = array();
            $filtros[] = array('id_paciente', $request->id_paciente);
            $filtros[] = array('estado', 1);
            $registros = GinemodalOtrosProcedimientos::where($filtros)->get();

            if($registros)
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registros';
                $datos['registros'] = $registros;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'sin registros';
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

    public function EliminarModalOtrosProcedimientos(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;



        if(empty($request->id))
        {
            $error['ID'] = "Campo requerido";
            $valido = 0;
        }
        // if(empty($request->id_ficha_gineco_obstetrica))
        // {
        //     $error['ID FICHA'] = "Campo requerido";
        //     $valido = 0;
        // }
        // if(empty($request->id_paciente))
        // {
        //     $error['PACIENTE'] = "Campo requerido";
        //     $valido = 0;
        // }

        if($valido)
        {
            $filtro = array();
            $filtro[] = array('id', $request->id);
            if(!empty($request->id_ficha_gineco_obstetrica))
                $filtro[] = array('id_ficha_gineco_obstetrica', $request->id_ficha_gineco_obstetrica);
            if(!empty($request->id_paciente))
                $filtro[] = array('id_paciente', $request->id_paciente);

            $registros = GinemodalOtrosProcedimientos::where($filtro)->delete();

            if($registros)
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'eliminado';
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'falla al eliminar';
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
    /** FIN MODAL OTRO PROCEDIMIENTO */

    /** INICIO MODAL ANTECEDENTE ANTICONCEPTIVO */
    public function AgregarModalAntAnticonceptivo(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_paciente))
        {
            $error['PACIENTE'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_profesional))
        {
            $error['PROFESIONAL'] = 'campo requerido';
            $valido = 0;
        }

        if( empty($request->id_ficha_atencion) && empty($request->id_ficha_otros_prof) && empty($request->id_ficha_gineco_obstetrica) )
        {
            $error['FICHA ATENCION'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->tipo))
        {
            $error['TIPO ANTECEDENTE'] = 'campo requerido';
            $valido = 0;
        }
        else
        {
            if($request->tipo == 'HORMONAL')
            {
                if(empty($request->farmaco))
                {
                    $error['FARMACO'] = 'campo requerido';
                    $valido = 0;
                }
                if(empty($request->tiempo))
                {
                    $error['TIEMPO'] = 'campo requerido';
                    $valido = 0;
                }
            }
            else if($request->tipo == 'MECANICA')
            {
                if(empty($request->elemento))
                {
                    $error['TIPO'] = 'campo requerido';
                    $valido = 0;
                }
                if(empty($request->fecha_instalacion))
                {
                    $error['FECHA INSTALACION'] = 'campo requerido';
                    $valido = 0;
                }
            }
        }
        if(empty($request->fecha))
        {
            $error['FECHA'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $registro = new GineModalAnteAnticonceptivo();
            $registro->id_paciente = $request->id_paciente;
            $registro->id_profesional = $request->id_profesional;
            if(!empty($request->id_ficha_atencion))
                $registro->id_ficha_atencion = $request->id_ficha_atencion;
            if(!empty($request->id_ficha_otros_prof))
                $registro->id_ficha_otros_prof = $request->id_ficha_otros_prof;
            if(!empty($request->id_ficha_gineco_obstetrica))
                $registro->id_ficha_gineco_obstetrica = $request->id_ficha_gineco_obstetrica;
            $registro->tipo = $request->tipo;
            $registro->fecha = $request->fecha;
            if(!empty($request->elemento))
                $registro->elemento = $request->elemento;
            if(!empty($request->farmaco))
                $registro->farmaco = $request->farmaco;
            if(!empty($request->tiempo))
                $registro->tiempo = $request->tiempo;
            if(!empty($request->fecha_instalacion))
                $registro->fecha_instalacion = $request->fecha_instalacion;
            if(!empty($request->comentarios))
                $registro->comentarios = $request->comentarios;
            if(!empty($request->otro))
                $registro->otro = $request->otro;
            $registro->estado = 1;

            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'exito';
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Falla en el registro';
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

    public function VerModalAntAnticonceptivo(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_paciente))
        {
            $error['PACIENTE'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_profesional))
        {
            $error['PROFESIONAL'] = 'campo requerido';
            $valido = 0;
        }

        if( empty($request->id_ficha_atencion) && empty($request->id_ficha_otros_prof) && empty($request->id_ficha_gineco_obstetrica) )
        {
            $error['FICHA ATENCION'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $filtro = array();
            $filtro[] = array('id_paciente', $request->id_paciente);
            $filtro[] = array('id_profesional', $request->id_profesional);
            if(!empty($request->id_ficha_atencion))
                $filtro[] = array('id_ficha_atencion', $request->id_ficha_atencion);
            if(!empty($request->id_ficha_otros_prof))
                $filtro[] = array('id_ficha_otros_prof', $request->id_ficha_otros_prof);
            if(!empty($request->id_ficha_gineco_obstetrica))
                $filtro[] = array('id_ficha_gineco_obstetrica', $request->id_ficha_gineco_obstetrica);

            $registro = GineModalAnteAnticonceptivo::where($filtro)->get();
            if($registro)
            {
                $datos['estado'] = 1;
                $datos['msj'] = "Registros encontrados.";
                $datos['registros'] = $registro;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = "sin Registros.";
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
    /** FIN MODAL ANTECEDENTE ANTICONCEPTIVO */

    /****************************************************** */


    public function modalEcoObstetrica(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

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
            if(
                !empty($request->eco_sol)&& !empty($request->sosp_dg)|| !empty($request->Prioridad)||
                !empty($request->fecha)|| !empty($request->tipo)|| !empty($request->sol_por)||
                !empty($request->sol_por_nom )|| !empty($request->motivo)|| !empty($request->mot_examen) ||
                !empty($request->fur)|| !empty($request->fpp)|| !empty($request->e_gest)||
                !empty($request->num_gest)|| !empty($request->lcc)|| !empty($request->diametro_cef)||
                !empty($request->peso_fetal)|| !empty($request->edad_ecografia)|| !empty($request->placenta)||
                !empty($request->liq_amniotico)|| !empty($request->sexo)|| !empty($request->dg_ecografico)||
                !empty($request->obs_eco)|| !empty($request->img)
                )
            {
                $modal_eco_obstetrica = new GineModalEcoObstetrica();
                $modal_eco_obstetrica->ficha_gineco_obstetrica = $request->id_ficha_atencion;
                $modal_eco_obstetrica->id_lugar_atencion = $request->id_lugar_atencion;
                $modal_eco_obstetrica->id_paciente = $request->id_paciente;
                $modal_eco_obstetrica->id_profesional = $request->id_profesional;
                $modal_eco_obstetrica->eco_sol = $request->eco_sol;
                $modal_eco_obstetrica->sosp_dg = $request->sosp_dg;
                $modal_eco_obstetrica->Prioridad = $request->Prioridad;
                $modal_eco_obstetrica->fecha= $request->fecha;
                $modal_eco_obstetrica->tipo = $request->tipo;
                $modal_eco_obstetrica->sol_por = $request->sol_por;
                $modal_eco_obstetrica->sol_por_nom = $request->sol_por_nom;
                $modal_eco_obstetrica->motivo = $request->motivo;
                $modal_eco_obstetrica->mot_examen = $request->mot_examen;
                $modal_eco_obstetrica->fur= $request->fur;
                $modal_eco_obstetrica->fpp = $request->fpp;
                $modal_eco_obstetrica->e_gest = $request->e_gest;
                $modal_eco_obstetrica->num_gest = $request->num_gest;
                $modal_eco_obstetrica->lcc = $request->lcc;
                $modal_eco_obstetrica-> diametro_cef = $request->diametro_cef;
                $modal_eco_obstetrica->peso_fetal = $request->peso_fetal;
                $modal_eco_obstetrica->edad_ecografia = $request->edad_ecografia;
                $modal_eco_obstetrica->placenta = $request->placenta;
                $modal_eco_obstetrica->liq_amniotico = $request->liq_amniotico;
                $modal_eco_obstetrica->sexo = $request->sexo;
                $modal_eco_obstetrica->dg_ecografico = $request->dg_ecografico;
                $modal_eco_obstetrica->obs_eco = $request->obs_eco;
                // $modal_eco_obstetrica->img = $request->img; // crear tabla de manejod e imagenes
                $modal_eco_obstetrica->otro = '';
                $modal_eco_obstetrica->otro1 = '';
                $modal_eco_obstetrica->estado = 1;

                if($modal_eco_obstetrica->save())
                {
                    $datos['estado'] = 1;
                    $datos['msj'] =  'modal Eco Obstetrica registrado con exito.\n';
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] =  'Falla en el registro de modal Eco Obstetrica .\n';
                }
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] =  'campos requerido.';
            $datos['error'] = $error;
        }
        return $datos;
    }

    public function modalEcoGinecologica(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

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
            if(
                !empty($request->eco_sol)|| !empty($request->sosp_dg)|| !empty($request->Prioridad)||
                !empty($request->fecha)|| !empty($request->tipo)|| !empty($request->sol_por)||
                !empty($request->sol_por_nom )|| !empty($request->motivo)|| !empty($request->mot_examen) ||
                !empty($request->ex_utero)|| !empty($request->endometrio)|| !empty($request->ovario_der)||
                !empty($request->ovario_izq)|| !empty($request->trompa_der)|| !empty($request->trompa_izq)||
                !empty($request->fondo_saco)|| !empty($request->dg_ecografico)|| !empty($request->obs_eco)||
                !empty($request->img)



                )
            {
                $modal_eco_ginecologica = new GineModalEcoGinecologica();
                $modal_eco_ginecologica->ficha_gineco_obstetrica = $request->id_ficha_atencion;
                $modal_eco_ginecologica->id_lugar_atencion = $request->id_lugar_atencion;
                $modal_eco_ginecologica->id_paciente = $request->id_paciente;
                $modal_eco_ginecologica->id_profesional = $request->id_profesional;
                $modal_eco_ginecologica->eco_sol = $request->eco_sol;
                $modal_eco_ginecologica->sosp_dg = $request->sosp_dg;
                $modal_eco_ginecologica->Prioridad = $request->Prioridad;
                $modal_eco_ginecologica->fecha= $request->fecha;
                $modal_eco_ginecologica->tipo = $request->tipo;
                $modal_eco_ginecologica->sol_por = $request->sol_por;
                $modal_eco_ginecologica->sol_por_nom = $request->sol_por_nom;
                $modal_eco_ginecologica->motivo = $request->motivo;
                $modal_eco_ginecologica->mot_examen = $request->mot_examen;
                $modal_eco_ginecologica->ex_utero= $request->ex_utero;
                $modal_eco_ginecologica->endometrio = $request->endometrio;
                $modal_eco_ginecologica->ovario_der = $request->ovario_der;
                $modal_eco_ginecologica->ovario_izq = $request->ovario_izq;
                $modal_eco_ginecologica->trompa_der = $request->trompa_der;
                $modal_eco_ginecologica->trompa_izq = $request->trompa_izq;
                $modal_eco_ginecologica->peso_fetal = $request->peso_fetal;
                $modal_eco_ginecologica->edad_ecografia = $request->edad_ecografia;
                $modal_eco_ginecologica->placenta = $request->placenta;
                $modal_eco_ginecologica->liq_amniotico = $request->liq_amniotico;
                $modal_eco_ginecologica->sexo = $request->sexo;
                $modal_eco_ginecologica->dg_ecografico = $request->dg_ecografico;
                $modal_eco_ginecologica->obs_eco = $request->obs_eco;
                // $modal_eco_ginecologica->img = $request->img; // crear tabla de manejod e imagenes
                $modal_eco_ginecologica->otro = '';
                $modal_eco_ginecologica->otro1 = '';
                $modal_eco_ginecologica->estado = 1;
                if($modal_eco_ginecologica->save())
                {
                    $datos['estado'] = 1;
                    $datos['msj'] =  'modal Eco Ginecológica registrado con exito.\n';
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] =  'Falla en el registro de modal Eco Ginecológica .\n';
                }
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] =  'campos requerido.';
            $datos['error'] = $error;
        }
        return $datos;
    }

    public function GinemodalGlicemia(Request $request)
    {
        if(
            !empty($request->fecha)|| !empty($request->peso)|| !empty($request->glicemia)||
            !empty($request->hg_glicosilada)|| !empty($request->tam_fetal)

            )
        {
            $modal_glicemia_emb = new GinemodalGlicemia();
            $modal_glicemia_emb->ficha_gineco_obstetrica = $ficha->id;
            $modal_glicemia_emb->id_lugar_atencion = $request->id_lugar_atencion;
            $modal_glicemia_emb->id_paciente = $id_paciente;
            $modal_glicemia_emb->id_profesional = $id_profesional;
            $modal_glicemia_emb->fecha = $request->fecha;
            $modal_glicemia_emb->peso = $request->peso;
            $modal_glicemia_emb->glicemia = $request->glicemia;
            $modal_glicemia_emb->hg_glicosilada= $request->hg_glicosilada;
            $modal_glicemia_emb->tam_fetal = $request->tam_fetal;
            $modal_glicemia_emb->otro = '';
            $modal_glicemia_emb->otro1 = '';
            $modal_glicemia_emb->estado = 1;
            if($modal_glicemia_emb->save())
            {
                $mensaje .='modal glicemia embarazo registrado con exito.\n';
            }
            else
            {
                $mensaje .= 'Falla en el registro de modal glicemia embarazo .\n';
            }
        }
    }

    public function GinemodalAro(Request $request)
    {
        if(
            !empty($request->fecha)|| !empty($request->Edad)|| !empty($request->escolaridad)||
            !empty($request->grupo)|| !empty($request->ant_pers)|| !empty($request->otros_ant_mat)||
            !empty($request->ant_padre )|| !empty($request->ant_familiares_madre)|| !empty($request->ant_familiares_padre) ||
            !empty($request->ant_otros)|| !empty($request->habitos_mat)|| !empty($request->f_ult_parto)||
            !empty($request->num_gest)|| !empty($request->num_abortos)|| !empty($request->num_ect)||
            !empty($request->num_part)|| !empty($request->num_part_espo)|| !empty($request->n_forcep)||
            !empty($request->n_cesareas)|| !empty($request->obs_partos_ant)|| !empty($request->nac_vivos)||
            !empty($request->viven)|| !empty($request->muert_semana)|| !empty($request->n_mortinato)||
            !empty($request->peso_menor_dosquin)|| !empty($request->peso_may_cuatro)|| !empty($request->obs_ant)||
            !empty($request->fact_riesgo_obst)|| !empty($request->ot_fact_riesgo)
            )
        {
            $modal_ant_aro = new GinemodalAro();
            $modal_ant_aro->ficha_gineco_obstetrica = $ficha->id;
            $modal_ant_aro->id_lugar_atencion = $request->id_lugar_atencion;
            $modal_ant_aro->id_paciente = $id_paciente;
            $modal_ant_aro->id_profesional = $id_profesional;
            $modal_ant_aro->fecha = $request->fecha;
            $modal_ant_aro->Edad = $request->Edad;
            $modal_ant_aro->escolaridad = $request->escolaridad;
            $modal_ant_aro->grupo= $request->grupo;
            $modal_ant_aro->ant_pers = $request->ant_pers;
            $modal_ant_aro->otros_ant_mat = $request->otros_ant_mat;
            $modal_ant_aro->ant_padre = $request->ant_padre;
            $modal_ant_aro->ant_familiares_madre = $request->ant_familiares_madre;
            $modal_ant_aro->ant_familiares_padre = $request->ant_familiares_padre;
            $modal_ant_aro->ant_otros= $request->ant_otros;
            $modal_ant_aro->habitos_mat = $request->habitos_mat;
            $modal_ant_aro->f_ult_parto = $request->f_ult_parto;
            $modal_ant_aro->num_gest = $request->num_gest;
            $modal_ant_aro->num_abortos = $request->num_abortos;
            $modal_ant_aro->num_ect = $request->num_ect;
            $modal_ant_aro->num_part = $request->num_part;
            $modal_ant_aro->num_part_espon = $request->num_part_espon;
            $modal_ant_aro->n_forcep = $request->n_forcep;
            $modal_ant_aro->n_cesareas = $request->n_cesareas;
            $modal_ant_aro->obs_partos_ant = $request->obs_partos_ant;
            $modal_ant_aro->nac_vivos = $request->nac_vivos;
            $modal_ant_aro->viven = $request->viven;
            $modal_ant_aro-> muert_semana = $request-> muert_semana;
            $modal_ant_aro->n_mortinato = $request->n_mortinato;
            $modal_ant_aro->peso_menor_dosquin = $request->peso_menor_dosquin;
            $modal_ant_aro->peso_may_cuatro = $request->peso_may_cuatro;
            $modal_ant_aro->obs_ant = $request->obs_ant;
            $modal_ant_aro->fact_riesgo_obst = $request->fact_riesgo_obst;
            $modal_ant_aro->ot_fact_riesgo = $request->ot_fact_riesgo;
            $modal_ant_aro->otro = '';
            $modal_ant_aro->otro1 = '';
            $modal_ant_aro->estado = 1;
            if($modal_ant_aro->save())
            {
                $mensaje .='modal Antecedentes ARO registrado con exito.\n';
            }
            else
            {
                $mensaje .= 'Falla en el registro de modal Antecedentes ARO .\n';
            }
        }
    }

}

