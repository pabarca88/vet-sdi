<?php

namespace App\Http\Controllers;

use App\Models\PlanTratamientoTerapiaSicologica;
use Illuminate\Http\Request;

class PlanTratamientoTerapiaSicologicaController extends Controller
{


    public function registrar_r( Request $request )
    {
        return static::registrar( $request->id_ficha_otros_prof, $request->id_paciente, $request->id_profesional, $request->terapia, $request->psi_vidadiaria, $request->psi_ant_cond, $request->psi_laboral, $request->psi_autoestima, $request->obs_ind_terapia_psi );
    }

    static public function registrar( $id_ficha_otros_prof, $id_paciente, $id_profesional, $terapia, $psi_vidadiaria, $psi_ant_cond, $psi_laboral, $psi_autoestima, $obs_ind_terapia_psi )
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if($valido)
        {
            $registros = new PlanTratamientoTerapiaSicologica();

            $registros->id_ficha_otros_prof = $id_ficha_otros_prof;
            $registros->id_paciente = $id_paciente;
            $registros->id_profesional = $id_profesional;
            $registros->terapia = $terapia;
            $registros->psi_vidadiaria = $psi_vidadiaria;
            $registros->psi_ant_cond = $psi_ant_cond;
            $registros->psi_laboral = $psi_laboral;
            $registros->psi_autoestima = $psi_autoestima;
            $registros->obs_ind_terapia_psi = $obs_ind_terapia_psi;

            if($registros->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'Exito';
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'fallo en registo';
                $datos['request'] = array(
                    'id_ficha_otros_prof' => $id_ficha_otros_prof,
                    'id_paciente' => $id_paciente,
                    'id_profesional' => $id_profesional,
                    'terapia' => $terapia,
                    'psi_vidadiaria' => $psi_vidadiaria,
                    'psi_ant_cond' => $psi_ant_cond,
                    'psi_laboral' => $psi_laboral,
                    'psi_autoestima' => $psi_autoestima,
                    'obs_ind_terapia_psi' => $obs_ind_terapia_psi,
                );
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
