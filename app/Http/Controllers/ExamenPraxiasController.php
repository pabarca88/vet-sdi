<?php

namespace App\Http\Controllers;

use App\Models\ExamenPraxias;
use Illuminate\Http\Request;

class ExamenPraxiasController extends Controller
{
    public function Registrar_r(Request $request)
    {
        return static::Registrar(
            $request->id_ficha_otros_prof, $request->id_ficha_fono, $request->id_paciente, $request->id_profesional,

            /** GENERAL */
            $request->prax_dg, $request->prax_dg_obs, $request->prax_suc, $request->prax_suc_obs, $request->prax_mast, $request->prax_mast_obs, $request->prax_sop, $request->prax_sop_obs, $request->prax_gen_obs,

            /** RESPIRATORIA */
            $request->prax_re_m, $request->prax_re_m_obs, $request->prax_re_t, $request->prax_re_t_obs, $request->prax_re_cfr, $request->prax_re_cfr_obs, $request->praxias_tiempo_maximo, $request->prax_re_f, $request->prax_re_f_obs, $request->prax_re_obs,

            /** FONACION */
            $request->prax_fon_t, $request->prax_fon_t_obs, $request->prax_fon_i, $request->prax_fon_i_obs, $request->prax_fon_e, $request->prax_fon_e_obs, $request->prax_fon_av, $request->prax_fon_av_obs, $request->prax_fon_r, $request->prax_fon_r_obs, $request->prax_fon_ex_obs,

            /** DIFONIA */
            $request->difon_c_pl, $request->difon_c_bl, $request->difon_c_fl, $request->difon_c_kl, $request->difon_c_gl, $request->difon_c_tl, $request->difon_c_pr, $request->difon_c_br, $request->difon_c_fr, $request->difon_c_tr, $request->difon_c_kr, $request->difon_c_gr, $request->difon_c_dr, $request->difon_c_ot, $request->obs_difon_c, $request->ofa_lab_obs,

        );
    }
    static public function Registrar(
        $id_ficha_otros_prof, $id_ficha_fono, $id_paciente, $id_profesional,

        /** GENERAL */
        $prax_dg, $prax_dg_obs, $prax_suc, $prax_suc_obs, $prax_mast, $prax_mast_obs, $prax_sop, $prax_sop_obs, $prax_gen_obs,

        /** RESPIRATORIA */
        $prax_re_m, $prax_re_m_obs, $prax_re_t, $prax_re_t_obs, $prax_re_cfr, $prax_re_cfr_obs, $praxias_tiempo_maximo, $prax_re_f, $prax_re_f_obs, $prax_re_obs,

        /** FONACION */
        $prax_fon_t, $prax_fon_t_obs, $prax_fon_i, $prax_fon_i_obs, $prax_fon_e, $prax_fon_e_obs, $prax_fon_av, $prax_fon_av_obs, $prax_fon_r, $prax_fon_r_obs, $prax_fon_ex_obs,

        /** DIFONIA */
        $difon_c_pl, $difon_c_bl, $difon_c_fl, $difon_c_kl, $difon_c_gl, $difon_c_tl, $difon_c_pr, $difon_c_br, $difon_c_fr, $difon_c_tr, $difon_c_kr, $difon_c_gr, $difon_c_dr, $difon_c_ot, $obs_difon_c, $ofa_lab_obs,

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
            $registro = new ExamenPraxias();

            $registro->id_ficha_otros_prof = $id_ficha_otros_prof;
            $registro->id_ficha_fono = $id_ficha_fono;
            $registro->id_paciente = $id_paciente;
            $registro->id_profesional = $id_profesional;

            $registro->prax_dg = $prax_dg; // - select-one
            $registro->prax_dg_obs = $prax_dg_obs; // - textarea
            $registro->prax_suc = $prax_suc; // - select-one
            $registro->prax_suc_obs = $prax_suc_obs; // - textarea
            $registro->prax_mast = $prax_mast; // - select-one
            $registro->prax_mast_obs = $prax_mast_obs; // - textarea
            $registro->prax_sop = $prax_sop; // - select-one
            $registro->prax_sop_obs = $prax_sop_obs; // - textarea
            $registro->prax_gen_obs = $prax_gen_obs; // - textarea
            $registro->prax_re_m = $prax_re_m; // - select-one
            $registro->prax_re_m_obs = $prax_re_m_obs; // - textarea
            $registro->prax_re_t = $prax_re_t; // - select-one
            $registro->prax_re_t_obs = $prax_re_t_obs; // - textarea
            $registro->prax_re_cfr = $prax_re_cfr; // - select-one
            $registro->prax_re_cfr_obs = $prax_re_cfr_obs; // - textarea
            $registro->praxias_tiempo_maximo = $praxias_tiempo_maximo; // - text
            $registro->prax_re_f = $prax_re_f; // - select-one
            $registro->prax_re_f_obs = $prax_re_f_obs; // - textarea
            $registro->prax_re_obs = $prax_re_obs; // - textarea
            $registro->prax_fon_t = $prax_fon_t; // - select-one
            $registro->prax_fon_t_obs = $prax_fon_t_obs; // - textarea
            $registro->prax_fon_i = $prax_fon_i; // - select-one
            $registro->prax_fon_i_obs = $prax_fon_i_obs; // - textarea
            $registro->prax_fon_e = $prax_fon_e; // - select-one
            $registro->prax_fon_e_obs = $prax_fon_e_obs; // - textarea
            $registro->prax_fon_av = $prax_fon_av; // - select-one
            $registro->prax_fon_av_obs = $prax_fon_av_obs; // - textarea
            $registro->prax_fon_r = $prax_fon_r; // - select-one
            $registro->prax_fon_r_obs = $prax_fon_r_obs; // - textarea
            $registro->prax_fon_ex_obs = $prax_fon_ex_obs; // - textarea
            $registro->difon_c_pl = $difon_c_pl; // - text
            $registro->difon_c_bl = $difon_c_bl; // - text
            $registro->difon_c_fl = $difon_c_fl; // - text
            $registro->difon_c_kl = $difon_c_kl; // - text
            $registro->difon_c_gl = $difon_c_gl; // - text
            $registro->difon_c_tl = $difon_c_tl; // - text
            $registro->difon_c_pr = $difon_c_pr; // - text
            $registro->difon_c_br = $difon_c_br; // - text
            $registro->difon_c_fr = $difon_c_fr; // - text
            $registro->difon_c_tr = $difon_c_tr; // - text
            $registro->difon_c_kr = $difon_c_kr; // - text
            $registro->difon_c_gr = $difon_c_gr; // - text
            $registro->difon_c_dr = $difon_c_dr; // - text
            $registro->difon_c_ot = $difon_c_ot; // - text
            $registro->obs_difon_c = $obs_difon_c; // - textarea
            $registro->ofa_lab_obs = $ofa_lab_obs; // - textarea

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
