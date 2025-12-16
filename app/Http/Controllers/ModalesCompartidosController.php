<?php

namespace App\Http\Controllers;

use App\Models\EvalFuncionalidadGlobal;
use App\Models\EvalMetria;
use App\Models\EvalParesCraneales;
use App\Models\EvalPostural;
use App\Models\EvalSensibilidad;
use App\Models\EvalReflejos;
use App\Models\EvalTonoMotor;
use Illuminate\Http\Request;

class ModalesCompartidosController extends Controller
{

    public function EvaluacionFuerzaMbSuperior()
    {
        /** evaluar  tablas de eval_fuerza_mb_superior y eval_fuerza_mb_inferior con modal */
    }

    public function EvaluacionFuerzaMbInferior()
    {
        /** evaluar  tablas de eval_fuerza_mb_superior y eval_fuerza_mb_inferior con modal */
    }

    /** REGISTRO eval_pares_craneales - Registro*/
    public function EvalParesCranealesRegistro(Request $request)
    {

        {

            $eval_pares = new EvalParesCraneales();
            $eval_pares->id_ficha_atencion = $ficha->id;
            $eval_pares->id_ficha_otros_prof = $ficha->id;
            $eval_pares->id_especialidad = $profesional->id_especialidad;
            $eval_pares->id_tipo_especialidad = $profesional->id_tipo_especialidad;
            $eval_pares->id_paciente = $id_paciente;
            $eval_pares->id_profesional = $id_profesional;

            $eval_pares->pc_uno = $request->pc_uno;
            $eval_pares->pc_dos = $request->pc_dos;
            $eval_pares->pc_tres = $request->pc_tres;
            $eval_pares->pc_cuatro = $request->pc_cuatro;
            $eval_pares->pc_cinco = $request->pc_cinco;
            $eval_pares->pc_seis = $request->pc_seis;
            $eval_pares->pc_siete = $request->pc_siete;
            $eval_pares->pc_ocho = $request->pc_ocho;
            $eval_pares->pc_nueve = $request->pc_nueve;
            $eval_pares->pc_diez = $request->pc_diez;
            $eval_pares->pc_once = $request->pc_once;
            $eval_pares->pc_doce = $request->pc_doce;
            $eval_pares->pc_concluciones = $request->pc_concluciones;

            $eval_pares->otro = '';
            $eval_pares->otro2 = '';
            $eval_pares->estado = 1;
            if($eval_pares->save())
            {
                $mensaje .= 'Ficha Sico-Examen-Mental registrada con exito\n';
            }
            else
            {
                $mensaje .= 'Ficha Sico-Examen-Mental con problema al registrar\n';
            }
        }
    }
    public function EvalParesSensibilidadRegistro(Request $request)
    {

        {

            $eval_sensibilidad = new EvalSensibilidad();
            $eval_sensibilidad->id_ficha_atencion = $ficha->id;
            $eval_sensibilidad->id_ficha_otros_prof = $ficha->id;
            $eval_sensibilidad->id_especialidad = $profesional->id_especialidad;
            $eval_sensibilidad->id_tipo_especialidad = $profesional->id_tipo_especialidad;
            $eval_sensibilidad->id_paciente = $id_paciente;
            $eval_sensibilidad->id_profesional = $id_profesional;
            $eval_sensibilidad->sens_prim = $request->sens_prim;
            $eval_sensibilidad->sens_sec = $request->sens_sec;
            $eval_sensibilidad->sens_coment = $request->sens_coment;
            $eval_sensibilidad->otro = '';
            $eval_sensibilidad->otro2 = '';
            $eval_sensibilidad->estado = 1;
            if($eval_sensibilidad->save())
            {
                $mensaje .= 'Ficha Sico-Examen-Mental registrada con exito\n';
            }
            else
            {
                $mensaje .= 'Ficha Sico-Examen-Mental con problema al registrar\n';
            }
        }
    }
    public function EvalReflejosRegistro(Request $request)
    {

        {

            $eval_reflejos = new EvalReflejos();
            $eval_reflejos->id_ficha_atencion = $ficha->id;
            $eval_reflejos->id_ficha_otros_prof = $ficha->id;
            $eval_reflejos->id_especialidad = $profesional->id_especialidad;
            $eval_reflejos->id_tipo_especialidad = $profesional->id_tipo_especialidad;
            $eval_reflejos->id_paciente = $id_paciente;
            $eval_reflejos->id_profesional = $id_profesional;
            $eval_reflejos->ref_bicip = $request->ref_bicip;
            $eval_reflejos->ref_tricip = $request->ref_tricip;
            $eval_reflejos->ref_est_rad = $request->ref_est_rad;
            $eval_reflejos->ref_rot = $request->ref_rot;
            $eval_reflejos->ref_aquil = $request->ref_aquil;
            $eval_reflejos->ref_cut = $request->ref_cut;
            $eval_reflejos->ref_cut_abd = $request->ref_cut_abd;
            $eval_reflejos->ref_cremast = $request->ref_cremast;
            $eval_reflejos->ref_plant = $request->ref_plant;
            $eval_reflejos->ref_pa = $request->ref_pa;
            $eval_reflejos->ref_concl = $request->ref_concl;
            $eval_reflejos->otro = '';
            $eval_reflejos->otro2 = '';
            $eval_reflejos->estado = 1;
            if($eval_reflejos->save())
            {
                $mensaje .= 'Ficha Sico-Examen-Mental registrada con exito\n';
            }
            else
            {
                $mensaje .= 'Ficha Sico-Examen-Mental con problema al registrar\n';
            }
        }
    }
    public function EvalParesPosturalRegistro(Request $request)
    {

        {

            $eval_postural = new EvalPostural();
            $eval_postural->id_ficha_atencion = $ficha->id;
            $eval_postural->id_ficha_otros_prof = $ficha->id;
            $eval_postural->id_especialidad = $profesional->id_especialidad;
            $eval_postural->id_tipo_especialidad = $profesional->id_tipo_especialidad;
            $eval_postural->id_paciente = $id_paciente;
            $eval_postural->id_profesional = $id_profesional;
            $eval_postural->ss_ant = $request->ss_ant;
            $eval_postural->ss_poster = $request->ss_poster;
            $eval_postural->ss_lat = $request->ss_lat;
            $eval_postural->ss_conc = $request->ss_conc;
            $eval_postural->sm_ant = $request->sm_ant;
            $eval_postural->sm_post = $request->sm_post;
            $eval_postural->sm_lat = $request->sm_lat;
            $eval_postural->sm_conc = $request->sm_conc;
            $eval_postural->inf_ant = $request->inf_ant;
            $eval_postural->inf_post = $request->inf_post;
            $eval_postural->inf_lat = $request->inf_lat;
            $eval_postural->inf_conc = $request->inf_conc;
            $eval_postural->post_eval = $request->post_eval;
            $eval_postural->eval_gral_marcha = $request->eval_gral_marcha;
            $eval_postural->otro = '';
            $eval_postural->otro2 = '';
            $eval_postural->estado = 1;
            if($eval_postural->save())
            {
                $mensaje .= 'Ficha Sico-Examen-Mental registrada con exito\n';
            }
            else
            {
                $mensaje .= 'Ficha Sico-Examen-Mental con problema al registrar\n';
            }
        }
    }
    public function EvalMetriaRegistro(Request $request)
    {

        {

            $eval_metria = new EvalMetria();
            $eval_metria->id_ficha_atencion = $ficha->id;
            $eval_metria->id_ficha_otros_prof = $ficha->id;
            $eval_metria->id_especialidad = $profesional->id_especialidad;
            $eval_metria->id_tipo_especialidad = $profesional->id_tipo_especialidad;
            $eval_metria->id_paciente = $id_paciente;
            $eval_metria->id_profesional = $id_profesional;
            $eval_metria->metria_pin = $request->metria_pin;
            $eval_metria->metria_ptr = $request->metria_ptr;
            $eval_metria->metria_d = $request->metria_d;
            $eval_metria->otro = '';
            $eval_metria->otro2 = '';
            $eval_metria->estado = 1;
            if($eval_metria->save())
            {
                $mensaje .= 'Ficha Sico-Examen-Mental registrada con exito\n';
            }
            else
            {
                $mensaje .= 'Ficha Sico-Examen-Mental con problema al registrar\n';
            }
        }
    }
    public function EvalTonoMotorRegistro(Request $request)
    {

        {

            $eval_tono_motor = new EvalTonoMotor();
            $eval_tono_motor->id_ficha_atencion = $ficha->id;
            $eval_tono_motor->id_ficha_otros_prof = $ficha->id;
            $eval_tono_motor->id_especialidad = $profesional->id_especialidad;
            $eval_tono_motor->id_tipo_especialidad = $profesional->id_tipo_especialidad;
            $eval_tono_motor->id_paciente = $id_paciente;
            $eval_tono_motor->id_profesional = $id_profesional;
            $eval_tono_motor->ex_musc_grupo_es = $request->ex_musc_grupo_es;
            $eval_tono_motor->est_masa_musc = $request->est_masa_musc;
            $eval_tono_motor->obs_est_masa_musc = $request->obs_est_masa_musc;
            $eval_tono_motor->obs_emm_ge = $request->obs_emm_ge;
            $eval_tono_motor->mov_inv_grupo_es = $request->mov_inv_grupo_es;
            $eval_tono_motor->est_mov_inv = $request->est_mov_inv;
            $eval_tono_motor->obs_eminv = $request->obs_eminv;
            $eval_tono_motor->tono_grupo_estudio = $request->tono_grupo_estudio;
            $eval_tono_motor->est_tono = $request->est_tono;
            $eval_tono_motor->obs_est_tono = $request->obs_est_tono;
            $eval_tono_motor->obs_tono_musc_grupo_es = $request->obs_tono_musc_grupo_es;
            $eval_tono_motor->emg_grupo_es = $request->emg_grupo_es;
            $eval_tono_motor->est_emg= $request->est_emg;
            $eval_tono_motor->obs_est_emg = $request->obs_est_emg;
            $eval_tono_motor->ecn = $request->ecn;
            $eval_tono_motor->obs_ecn = $request->obs_ecn;
            $eval_tono_motor->emg_grupo_es = $request->emg_grupo_es;
            $eval_tono_motor->eval_est_mmgral = $request->eval_est_mmgral;
            $eval_tono_motor->otro = '';
            $eval_tono_motor->otro2 = '';
            $eval_tono_motor->estado = 1;
            if($eval_tono_motor->save())
            {
                $mensaje .= 'Ficha Sico-Examen-Mental registrada con exito\n';
            }
            else
            {
                $mensaje .= 'Ficha Sico-Examen-Mental con problema al registrar\n';
            }
        }
    }
    public function EvalFuncionalidadGlobalRegistro(Request $request)
    {

        {

            $eval_funcionalidad_global = new EvalFuncionalidadGlobal();
            $eval_funcionalidad_global->id_ficha_atencion = $ficha->id;
            $eval_funcionalidad_global->id_ficha_otros_prof = $ficha->id;
            $eval_funcionalidad_global->id_especialidad = $profesional->id_especialidad;
            $eval_funcionalidad_global->id_tipo_especialidad = $profesional->id_tipo_especialidad;
            $eval_funcionalidad_global->id_paciente = $id_paciente;
            $eval_funcionalidad_global->id_profesional = $id_profesional;
            $eval_funcionalidad_global->cont_cab = $request->cont_cab;
            $eval_funcionalidad_global->cont_pelvis = $request->cont_pelvis;
            $eval_funcionalidad_global->cont_giros = $request->cont_giros;
            $eval_funcionalidad_global->cont_arrastre = $request->cont_arrastre;
            $eval_funcionalidad_global->cont_reinc = $request->cont_reinc;
            $eval_funcionalidad_global->cont_cuad = $request->cont_cuad;
            $eval_funcionalidad_global->cont_tronco = $request->cont_tronco;
            $eval_funcionalidad_global->cont_sedest = $request->cont_sedest;
            $eval_funcionalidad_global->cont_trans = $request->cont_trans;
            $eval_funcionalidad_global->cont_bipedest = $request->cont_bipedest;
            $eval_funcionalidad_global->cont_equil = $request->cont_equil;
            $eval_funcionalidad_global->cont_marcha = $request->cont_marcha;
            $eval_funcionalidad_global->cont_coment = $request->cont_coment;
            $eval_funcionalidad_global->otro = '';
            $eval_funcionalidad_global->otro2 = '';
            $eval_funcionalidad_global->estado = 1;
            if($eval_funcionalidad_global->save())
            {
                $mensaje .= 'Ficha Sico-Examen-Mental registrada con exito\n';
            }
            else
            {
                $mensaje .= 'Ficha Sico-Examen-Mental con problema al registrar\n';
            }
        }
    }
}
