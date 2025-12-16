<?php

namespace App\Http\Controllers;

use App\Models\EvaluacionOfa;
use Illuminate\Http\Request;

class EvaluacionOfaController extends Controller
{

    public function Registrar_r(Request $request)
    {
        return static::Registrar(
                            $request->id_ficha_otros_prof, $request->id_ficha_fono, $request->id_paciente, $request->id_profesional,
                            /** CARA */
                            $request->est_osea, $request->est_osea_obs, $request->form_fac, $request->form_fac_obs, $request->ap_bucal, $request->ap_bucal_obs, $request->dientes, $request->dientes_obs, $request->mordid, $request->mordid_obs, $request->nariz, $request->nariz_obs, $request->cara_obs,
                            /** BOCA */
                            $request->vestib, $request->vestib_obs, $request->fren_sup, $request->fren_sup_obs, $request->fren_inf, $request->fren_inf_obs, $request->fren_subl, $request->fren_subl_obs, $request->palad_duro, $request->palad_duro_obs, $request->palad_bl, $request->palad_bl_obs, $request->cierre_vf, $request->cierre_vf_obs, $request->uvul, $request->uvul_obs, $request->amigd, $request->amigd_obs, $request->adenoi, $request->adenoi_obs, $request->obs_gral_boc,
                            /** LENGUA */
                            $request->forma, $request->forma_obs, $request->posicion, $request->posicion_obs, $request->tono, $request->tono_obs, $request->cicatriz, $request->cicatriz_obs, $request->tam, $request->tam_obs, $request->funcion, $request->funcion_obs, $request->leng_obs,
                            /** LABIOS - SUPERIOR */
                            $request->formalab, $request->formalab_obs, $request->tonolab, $request->tonolab_obs, $request->cicatriz_lab, $request->cicatriz_lab_obs, $request->posicion_lab, $request->posicion_lab_obs, $request->tamano_lab, $request->tamano_lab_obs, $request->funcionalidad, $request->funcionalidad_obs, $request->obs_lab_sup,
                            /** LABIOS - INFERIROR */
                            $request->formalabi, $request->formalabi_obs, $request->tonolabi, $request->tonolabi_obs, $request->cicatrizi_lab, $request->cicatrizi_lab_obs, $request->posicioni_lab, $request->posicioni_lab_obs, $request->tamanoi_lab, $request->tamanoi_lab_obs, $request->funcionalidadi, $request->funcionalidadi_obs, $request->obs_lab_supi,
                            /** OTRO */
                            $request->otro
        );
    }

    static public function Registrar(
                $id_ficha_otros_prof, $id_ficha_fono, $id_paciente, $id_profesional,
                /** CARA */
                $est_osea, $est_osea_obs, $form_fac, $form_fac_obs, $ap_bucal, $ap_bucal_obs, $dientes, $dientes_obs, $mordid, $mordid_obs, $nariz, $nariz_obs, $cara_obs,
                /** BOCA */
                $vestib, $vestib_obs, $fren_sup, $fren_sup_obs, $fren_inf, $fren_inf_obs, $fren_subl, $fren_subl_obs, $palad_duro, $palad_duro_obs, $palad_bl, $palad_bl_obs, $cierre_vf, $cierre_vf_obs, $uvul, $uvul_obs, $amigd, $amigd_obs, $adenoi, $adenoi_obs, $obs_gral_boc,
                /** LENGUA */
                $forma, $forma_obs, $posicion, $posicion_obs, $tono, $tono_obs, $cicatriz, $cicatriz_obs, $tam, $tam_obs, $funcion, $funcion_obs, $leng_obs,
                /** LABIOS - SUPERIOR */
                $formalab, $formalab_obs, $tonolab, $tonolab_obs, $cicatriz_lab, $cicatriz_lab_obs, $posicion_lab, $posicion_lab_obs, $tamano_lab, $tamano_lab_obs, $funcionalidad, $funcionalidad_obs, $obs_lab_sup,
                /** LABIOS - INFERIROR */
                $formalabi, $formalabi_obs, $tonolabi, $tonolabi_obs, $cicatrizi_lab, $cicatrizi_lab_obs, $posicioni_lab, $posicioni_lab_obs, $tamanoi_lab, $tamanoi_lab_obs, $funcionalidadi, $funcionalidadi_obs, $obs_lab_supi,
                /** OTRO */
                $otro,
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

            $registro = new EvaluacionOfa();

            $registro->id_ficha_otros_prof = $id_ficha_otros_prof;//bigInteger
            $registro->id_ficha_fono = $id_ficha_fono;//bigInteger
            $registro->id_paciente = $id_paciente;//bigInteger
            $registro->id_profesional = $id_profesional;//bigInteger
            $registro->est_osea = $est_osea;//integer
            $registro->est_osea_obs = $est_osea_obs;//string
            $registro->form_fac = $form_fac;//integer
            $registro->form_fac_obs = $form_fac_obs;//string
            $registro->ap_bucal = $ap_bucal;//integer
            $registro->ap_bucal_obs = $ap_bucal_obs;//string
            $registro->dientes = $dientes;//integer
            $registro->dientes_obs = $dientes_obs;//string
            $registro->mordid = $mordid;//integer
            $registro->mordid_obs = $mordid_obs;//string
            $registro->nariz = $nariz;//integer
            $registro->nariz_obs = $nariz_obs;//string
            $registro->cara_obs = $cara_obs;//string
            $registro->vestib = $vestib;//integer
            $registro->vestib_obs = $vestib_obs;//string
            $registro->fren_sup = $fren_sup;//integer
            $registro->fren_sup_obs = $fren_sup_obs;//string
            $registro->fren_inf = $fren_inf;//integer
            $registro->fren_inf_obs = $fren_inf_obs;//string
            $registro->fren_subl = $fren_subl;//integer
            $registro->fren_subl_obs = $fren_subl_obs;//string
            $registro->palad_duro = $palad_duro;//integer
            $registro->palad_duro_obs = $palad_duro_obs;//string
            $registro->palad_bl = $palad_bl;//integer
            $registro->palad_bl_obs = $palad_bl_obs;//string
            $registro->cierre_vf = $cierre_vf;//integer
            $registro->cierre_vf_obs = $cierre_vf_obs;//string
            $registro->uvul = $uvul;//integer
            $registro->uvul_obs = $uvul_obs;//string
            $registro->amigd = $amigd;//integer
            $registro->amigd_obs = $amigd_obs;//string
            $registro->adenoi = $adenoi;//integer
            $registro->adenoi_obs = $adenoi_obs;//string
            $registro->obs_gral_boc = $obs_gral_boc;//string
            $registro->forma = $forma;//integer
            $registro->forma_obs = $forma_obs;//string
            $registro->posicion = $posicion;//integer
            $registro->posicion_obs = $posicion_obs;//string
            $registro->tono = $tono;//integer
            $registro->tono_obs = $tono_obs;//string
            $registro->cicatriz = $cicatriz;//integer
            $registro->cicatriz_obs = $cicatriz_obs;//string
            $registro->tam = $tam;//integer
            $registro->tam_obs = $tam_obs;//string
            $registro->funcion = $funcion;//integer
            $registro->funcion_obs = $funcion_obs;//string
            $registro->leng_obs = $leng_obs;//string
            $registro->formalab = $formalab;//integer
            $registro->formalab_obs = $formalab_obs;//string
            $registro->tonolab = $tonolab;//integer
            $registro->tonolab_obs = $tonolab_obs;//string
            $registro->cicatriz_lab = $cicatriz_lab;//integer
            $registro->cicatriz_lab_obs = $cicatriz_lab_obs;//string
            $registro->posicion_lab = $posicion_lab;//integer
            $registro->posicion_lab_obs = $posicion_lab_obs;//string
            $registro->tamano_lab = $tamano_lab;//integer
            $registro->tamano_lab_obs = $tamano_lab_obs;//string
            $registro->funcionalidad = $funcionalidad;//integer
            $registro->funcionalidad_obs = $funcionalidad_obs;//string
            $registro->obs_lab_sup = $obs_lab_sup;//string
            $registro->formalabi = $formalabi;//integer
            $registro->formalabi_obs = $formalabi_obs;//string
            $registro->tonolabi = $tonolabi;//integer
            $registro->tonolabi_obs = $tonolabi_obs;//string
            $registro->cicatrizi_lab = $cicatrizi_lab;//integer
            $registro->cicatrizi_lab_obs = $cicatrizi_lab_obs;//string
            $registro->posicioni_lab = $posicioni_lab;//integer
            $registro->posicioni_lab_obs = $posicioni_lab_obs;//string
            $registro->tamanoi_lab = $tamanoi_lab;//integer
            $registro->tamanoi_lab_obs = $tamanoi_lab_obs;//string
            $registro->funcionalidadi = $funcionalidadi;//integer
            $registro->funcionalidadi_obs = $funcionalidadi_obs;//string
            $registro->obs_lab_supi = $obs_lab_supi;//string
            $registro->otro = $otro;//string
            $registro->estado = $estado;//integer

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
