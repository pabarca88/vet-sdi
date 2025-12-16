<?php

namespace App\Http\Controllers;

use App\Models\EvaluacionVoz;
use Illuminate\Http\Request;

class EvaluacionVozController extends Controller
{
    public function Registrar_r(Request $request)
    {
        return static::Registrar(
            $request->id_ficha_otros_prof, $request->id_ficha_fono, $request->id_paciente, $request->id_profesional,

            /** GENERAL */
            $request->edad, $request->tpo_uso_vz, $request->tpo_disf, $request->tpo_exp_ruidos, $request->audic, $request->enf_resp, $request->uso_med, $request->pat_ant, $request->habitos, $request->ttos_ant, $request->voz_obs_gen,

            /** OROFACIL */
            $request->ev_voz_vest_boc, $request->ev_voz_vest_boc_obs, $request->ev_voz_fre_sup, $request->ev_voz_fre_sup_obs, $request->ev_voz_fr_inf, $request->ev_voz_fr_inf_obs, $request->ev_voz_fr_sl, $request->ev_voz_fr_sl_obs, $request->ev_voz_pd, $request->ev_voz_pd_obs, $request->ev_voz_pb, $request->ev_voz_pb_obs, $request->ev_voz_cvf, $request->ev_voz_cvf_obs, $request->ev_voz_uvul, $request->ev_voz_uvul_obs, $request->ev_voz_amig, $request->ev_voz_amig_obs, $request->ev_voz_aden, $request->ev_voz_aden_obs, $request->ev_voz_boc_obs,

            /** POSTURAL */
            $request->posic_estatica, $request->posic_dinamica, $request->ev_vf, $request->ev_vf_obs, $request->ev_vext, $request->ev_vext_obs, $request->ev_vro, $request->ev_vro_obs, $request->ev_vflat, $request->ev_vflat_obs, $request->ev_val, $request->ev_val_obs, $request->ev_val_ep_obs,

            /** RESPIRACION */
            $request->ex_resp_torax, $request->ex_resp_torax_obs, $request->resp_din, $request->resp_col, $request->resp_col_obs, $request->resp_tpo_resp, $request->resp_tpo_resp_obs, $request->resp_modo, $request->resp_modo_obs, $request->soplo_dur, $request->soplo_dur_obs, $request->soplo_fza, $request->soplo_fza_obs, $request->coord_fono_resp, $request->coord_fono_resp_obs, $request->ex_respiratorio_obs,

            /** PARAM VOCALE */
            $request->ataque_voc, $request->ataque_voc_obs, $request->ton_voc, $request->ton_voc_obs, $request->int_voz, $request->int_voz_obs, $request->param_voc_obs
        );
    }
    static public function Registrar(
        $id_ficha_otros_prof, $id_ficha_fono, $id_paciente, $id_profesional,

        /** GENERAL */
        $edad, $tpo_uso_vz, $tpo_disf, $tpo_exp_ruidos, $audic, $enf_resp, $uso_med, $pat_ant, $habitos, $ttos_ant, $voz_obs_gen,

        /** OROFACIL */
        $ev_voz_vest_boc, $ev_voz_vest_boc_obs, $ev_voz_fre_sup, $ev_voz_fre_sup_obs, $ev_voz_fr_inf, $ev_voz_fr_inf_obs, $ev_voz_fr_sl, $ev_voz_fr_sl_obs, $ev_voz_pd, $ev_voz_pd_obs, $ev_voz_pb, $ev_voz_pb_obs, $ev_voz_cvf, $ev_voz_cvf_obs, $ev_voz_uvul, $ev_voz_uvul_obs, $ev_voz_amig, $ev_voz_amig_obs, $ev_voz_aden, $ev_voz_aden_obs, $ev_voz_boc_obs,

        /** POSTURAL */
        $posic_estatica, $posic_dinamica, $ev_vf, $ev_vf_obs, $ev_vext, $ev_vext_obs, $ev_vro, $ev_vro_obs, $ev_vflat, $ev_vflat_obs, $ev_val, $ev_val_obs, $ev_val_ep_obs,

        /** RESPIRACION */
        $ex_resp_torax, $ex_resp_torax_obs, $resp_din, $resp_col, $resp_col_obs, $resp_tpo_resp, $resp_tpo_resp_obs, $resp_modo, $resp_modo_obs, $soplo_dur, $soplo_dur_obs, $soplo_fza, $soplo_fza_obs, $coord_fono_resp, $coord_fono_resp_obs, $ex_respiratorio_obs,

        /** PARAM VOCALE */
        $ataque_voc, $ataque_voc_obs, $ton_voc, $ton_voc_obs, $int_voz, $int_voz_obs, $param_voc_obs,

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
            $registro = new EvaluacionVoz();

            $registro->id_ficha_otros_prof = $id_ficha_otros_prof;
            $registro->id_ficha_fono = $id_ficha_fono;
            $registro->id_paciente = $id_paciente;
            $registro->id_profesional = $id_profesional;
            $registro->edad = $edad; // - text
            $registro->tpo_uso_vz = $tpo_uso_vz; // - text
            $registro->tpo_disf = $tpo_disf; // - text
            $registro->tpo_exp_ruidos = $tpo_exp_ruidos; // - text
            $registro->audic = $audic; // - text
            $registro->enf_resp = $enf_resp; // - text
            $registro->uso_med = $uso_med; // - text
            $registro->pat_ant = $pat_ant; // - text
            $registro->habitos = $habitos; // - text
            $registro->ttos_ant = $ttos_ant; // - text
            $registro->voz_obs_gen = $voz_obs_gen; // - textarea
            $registro->ev_voz_vest_boc = $ev_voz_vest_boc; // - select-one
            $registro->ev_voz_vest_boc_obs = $ev_voz_vest_boc_obs; // - textarea
            $registro->ev_voz_fre_sup = $ev_voz_fre_sup; // - select-one
            $registro->ev_voz_fre_sup_obs = $ev_voz_fre_sup_obs; // - textarea
            $registro->ev_voz_fr_inf = $ev_voz_fr_inf; // - select-one
            $registro->ev_voz_fr_inf_obs = $ev_voz_fr_inf_obs; // - textarea
            $registro->ev_voz_fr_sl = $ev_voz_fr_sl; // - select-one
            $registro->ev_voz_fr_sl_obs = $ev_voz_fr_sl_obs; // - textarea
            $registro->ev_voz_pd = $ev_voz_pd; // - select-one
            $registro->ev_voz_pd_obs = $ev_voz_pd_obs; // - textarea
            $registro->ev_voz_pb = $ev_voz_pb; // - select-one
            $registro->ev_voz_pb_obs = $ev_voz_pb_obs; // - textarea
            $registro->ev_voz_cvf = $ev_voz_cvf; // - select-one
            $registro->ev_voz_cvf_obs = $ev_voz_cvf_obs; // - textarea
            $registro->ev_voz_uvul = $ev_voz_uvul; // - select-one
            $registro->ev_voz_uvul_obs = $ev_voz_uvul_obs; // - textarea
            $registro->ev_voz_amig = $ev_voz_amig; // - select-one
            $registro->ev_voz_amig_obs = $ev_voz_amig_obs; // - textarea
            $registro->ev_voz_aden = $ev_voz_aden; // - select-one
            $registro->ev_voz_aden_obs = $ev_voz_aden_obs; // - textarea
            $registro->ev_voz_boc_obs = $ev_voz_boc_obs; // - textarea
            $registro->posic_estatica = $posic_estatica; // - text
            $registro->posic_dinamica = $posic_dinamica; // - text
            $registro->ev_vf = $ev_vf; // - select-one
            $registro->ev_vf_obs = $ev_vf_obs; // - textarea
            $registro->ev_vext = $ev_vext; // - select-one
            $registro->ev_vext_obs = $ev_vext_obs; // - textarea
            $registro->ev_vro = $ev_vro; // - select-one
            $registro->ev_vro_obs = $ev_vro_obs; // - textarea
            $registro->ev_vflat = $ev_vflat; // - select-one
            $registro->ev_vflat_obs = $ev_vflat_obs; // - textarea
            $registro->ev_val = $ev_val; // - select-one
            $registro->ev_val_obs = $ev_val_obs; // - textarea
            $registro->ev_val_ep_obs = $ev_val_ep_obs; // - textarea
            $registro->ex_resp_torax = $ex_resp_torax; // - select-one
            $registro->ex_resp_torax_obs = $ex_resp_torax_obs; // - textarea
            $registro->resp_din = $resp_din; // - text
            $registro->resp_col = $resp_col; // - select-one
            $registro->resp_col_obs = $resp_col_obs; // - textarea
            $registro->resp_tpo_resp = $resp_tpo_resp; // - select-one
            $registro->resp_tpo_resp_obs = $resp_tpo_resp_obs; // - textarea
            $registro->resp_modo = $resp_modo; // - select-one
            $registro->resp_modo_obs = $resp_modo_obs; // - textarea
            $registro->soplo_dur = $soplo_dur; // - select-one
            $registro->soplo_dur_obs = $soplo_dur_obs; // - textarea
            $registro->soplo_fza = $soplo_fza; // - select-one
            $registro->soplo_fza_obs = $soplo_fza_obs; // - textarea
            $registro->coord_fono_resp = $coord_fono_resp; // - select-one
            $registro->coord_fono_resp_obs = $coord_fono_resp_obs; // - textarea
            $registro->ex_respiratorio_obs = $ex_respiratorio_obs; // - textarea
            $registro->ataque_voc = $ataque_voc; // - select-one
            $registro->ataque_voc_obs = $ataque_voc_obs; // - textarea
            $registro->ton_voc = $ton_voc; // - select-one
            $registro->ton_voc_obs = $ton_voc_obs; // - textarea
            $registro->int_voz = $int_voz; // - select-one
            $registro->int_voz_obs = $int_voz_obs; // - textarea
            $registro->param_voc_obs = $param_voc_obs; // - textarea
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
