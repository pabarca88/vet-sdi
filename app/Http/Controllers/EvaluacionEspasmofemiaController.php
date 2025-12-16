<?php

namespace App\Http\Controllers;

use App\Models\EvaluacionEspasmofemia;
use Illuminate\Http\Request;

class EvaluacionEspasmofemiaController extends Controller
{
    public function Registrar_r(Request $request)
    {
        return static::Registrar(
            $request->id_ficha_otros_prof, $request->id_ficha_fono, $request->id_paciente, $request->id_profesional,

            /** ANTECEDENTES GENERALES */
            $request->modo_resp, $request->cond_aparicion, $request->evol, $request->trat_ant, $request->perso, $request->con_prob, $request->fen_em, $request->fact_her, $request->rel_fam, $request->obs_coment_ag,

            /** EVALUACIONES */
            $request->ev_ofa, $request->obs_ofa, $request->praxias, $request->obs_praxias, $request->resp, $request->obs_resp, $request->musc, $request->obs_coment_eval,

            /** HABLA */
            $request->fluidez, $request->ritmo, $request->prosodia, $request->cond_verb, $request->condmot, $request->enunc, $request->emocional, $request->obs_coment_hab,

            /**LECTURA */
            $request->lectsin_verb, $request->lectsin_mot, $request->lectsin_enun, $request->lectsin_emoc, $request->lectcon_verb, $request->lectcon_mot, $request->lectcon_enun, $request->lectcon_emoc, $request->obs_coment_lect,

            /** REPETICIONES */
            $request->con_verb_pal_or, $request->con_mot_pal_or, $request->caract_enunc_pal_or, $request->fen_asoc_pal_or, $request->con_verb_pal_ser, $request->con_mot_pal_ser, $request->caract_enunc_pal_ser, $request->fen_asoc_pal_ser, $request->obs_coment_rep,

            /** DIAGNOSTICO */
            $request->dg_espasm, $request->grav_espasm, $request->plan,
        );
    }
    static public function Registrar(
        $id_ficha_otros_prof, $id_ficha_fono, $id_paciente, $id_profesional,

        /** ANTECEDENTES GENERALES */
        $modo_resp, $cond_aparicion, $evol, $trat_ant, $perso, $con_prob, $fen_em, $fact_her, $rel_fam, $obs_coment_ag,

        /** EVALUACIONES */
        $ev_ofa, $obs_ofa, $praxias, $obs_praxias, $resp, $obs_resp, $musc, $obs_coment_eval,

        /** HABLA */
        $fluidez, $ritmo, $prosodia, $cond_verb, $condmot, $enunc, $emocional, $obs_coment_hab,

        /**LECTURA */
        $lectsin_verb, $lectsin_mot, $lectsin_enun, $lectsin_emoc, $lectcon_verb, $lectcon_mot, $lectcon_enun, $lectcon_emoc, $obs_coment_lect,

        /** REPETICIONES */
        $con_verb_pal_or, $con_mot_pal_or, $caract_enunc_pal_or, $fen_asoc_pal_or, $con_verb_pal_ser, $con_mot_pal_ser, $caract_enunc_pal_ser, $fen_asoc_pal_ser, $obs_coment_rep,

        /** DIAGNOSTICO */
        $dg_espasm, $grav_espasm, $plan,

        /** ESTADO */
        $estado = 1
    )
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($id_ficha_otros_prof))
        {
            $error['$id_ficha_otros_prof'] = 'campo requerido';
            $valido = 0;
        }
        // if(empty($id_ficha_fono))
        // {
        //     $error['$id_ficha_fono'] = 'campo requerido';
        //     $valido = 0;
        // }
        if(empty($id_paciente))
        {
            $error['$id_paciente'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($id_profesional))
        {
            $error['$id_profesional'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $registro = new EvaluacionEspasmofemia();

            $registro->id_ficha_otros_prof = $id_ficha_otros_prof;
            $registro->id_ficha_fono = $id_ficha_fono;
            $registro->id_paciente = $id_paciente;
            $registro->id_profesional = $id_profesional;

            $registro->modo_resp = $modo_resp; // - select-one
            $registro->cond_aparicion = $cond_aparicion; // - textarea
            $registro->evol = $evol; // - textarea
            $registro->trat_ant = $trat_ant; // - textarea
            $registro->perso = $perso; // - textarea
            $registro->con_prob = $con_prob; // - textarea
            $registro->fen_em = $fen_em; // - textarea
            $registro->fact_her = $fact_her; // - textarea
            $registro->rel_fam = $rel_fam; // - textarea
            $registro->obs_coment_ag = $obs_coment_ag; // - textarea
            $registro->ev_ofa = $ev_ofa; // - select-one
            $registro->obs_ofa = $obs_ofa; // - textarea
            $registro->praxias = $praxias; // - select-one
            $registro->obs_praxias = $obs_praxias; // - textarea
            $registro->resp = $resp; // - select-one
            $registro->obs_resp = $obs_resp; // - textarea
            $registro->musc = $musc; // - textarea
            $registro->obs_coment_eval = $obs_coment_eval; // - textarea
            $registro->fluidez = $fluidez; // - textarea
            $registro->ritmo = $ritmo; // - textarea
            $registro->prosodia = $prosodia; // - textarea
            $registro->cond_verb = $cond_verb; // - textarea
            $registro->condmot = $condmot; // - textarea
            $registro->enunc = $enunc; // - textarea
            $registro->emocional = $emocional; // - textarea
            $registro->obs_coment_hab = $obs_coment_hab; // - textarea
            $registro->lectsin_verb = $lectsin_verb; // - textarea
            $registro->lectsin_mot = $lectsin_mot; // - textarea
            $registro->lectsin_enun = $lectsin_enun; // - textarea
            $registro->lectsin_emoc = $lectsin_emoc; // - textarea
            $registro->lectcon_verb = $lectcon_verb; // - textarea
            $registro->lectcon_mot = $lectcon_mot; // - textarea
            $registro->lectcon_enun = $lectcon_enun; // - textarea
            $registro->lectcon_emoc = $lectcon_emoc; // - textarea
            $registro->obs_coment_lect = $obs_coment_lect; // - textarea
            $registro->con_verb_pal_or = $con_verb_pal_or; // - textarea
            $registro->con_mot_pal_or = $con_mot_pal_or; // - textarea
            $registro->caract_enunc_pal_or = $caract_enunc_pal_or; // - textarea
            $registro->fen_asoc_pal_or = $fen_asoc_pal_or; // - textarea
            $registro->con_verb_pal_ser = $con_verb_pal_ser; // - textarea
            $registro->con_mot_pal_ser = $con_mot_pal_ser; // - textarea
            $registro->caract_enunc_pal_ser = $caract_enunc_pal_ser; // - textarea
            $registro->fen_asoc_pal_ser = $fen_asoc_pal_ser; // - textarea
            $registro->obs_coment_rep = $obs_coment_rep; // - textarea
            $registro->dg_espasm = $dg_espasm; // - select-one
            $registro->grav_espasm = $grav_espasm; // - select-one
            $registro->plan = $plan; // - textarea

            $registro->estado = $estado;

            if( $registro->save() )
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'exito';
                $datos['last_id'] = $registro->id;
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
}
