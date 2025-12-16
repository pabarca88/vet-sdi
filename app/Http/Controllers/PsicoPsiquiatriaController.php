<?php

namespace App\Http\Controllers;

use App\Models\FichaOtrosProfesionales;
use App\Models\FichaSicoOtrosTest;
use App\Models\FichaSicoTestRorshchach;
use App\Models\Profesional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PsicoPsiquiatriaController extends Controller
{
    public function TestRorshchachRegistro(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if($valido)
        {
            $ficha = FichaOtrosProfesionales::find($request->id_ficha_atencion);
            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

            /** REGISTRO FICHA SICO TEST DE RORSHCHARCH   */
            if($ficha)
            {

                $ficha_sico_test_rorschach = new FichaSicoTestRorshchach();
                $ficha_sico_test_rorschach->id_ficha_otros_prof = $ficha->id;
                $ficha_sico_test_rorschach->id_especialidad = $profesional->id_especialidad;
                $ficha_sico_test_rorschach->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                $ficha_sico_test_rorschach->id_paciente = $request->id_paciente;
                $ficha_sico_test_rorschach->id_profesional = $profesional->id;
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
                $ficha_sico_test_rorschach->otro1 = '';
                $ficha_sico_test_rorschach->estado = 1;
                if($ficha_sico_test_rorschach->save())
                {
                    $datos['estado'] = 1;
                    $datos['msj'] = 'exito';
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
                $datos['msj'] = 'ficha no encontrada';
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

    public function OtrosTestPsicoPsiquiatrico(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if($valido)
        {
            $ficha = FichaOtrosProfesionales::find($request->id_ficha_atencion);
            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
            /** REGISTRO FICHA OTROS TEST SICOLOGICOS  */
            if($ficha)
            {
                $ficha_sicootrostest = new FichaSicoOtrosTest();
                $ficha_sicootrostest->id_ficha_otros_prof = $ficha->id;
                $ficha_sicootrostest->id_especialidad = $profesional->id_especialidad;
                $ficha_sicootrostest->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                $ficha_sicootrostest->id_paciente = $request->id_paciente;
                $ficha_sicootrostest->id_profesional = $profesional->id;
                $ficha_sicootrostest->nomb_test = $request->nomb_test;
                $ficha_sicootrostest->resp = $request->resp;
                $ficha_sicootrostest->com = $request->com;
                $ficha_sicootrostest->ind = $request->ind;
                $ficha_sicootrostest->comentarios_gen = $request->comentarios_gen;
                $ficha_sicootrostest->otro = '';
                $ficha_sicootrostest->otro1 = '';
                $ficha_sicootrostest->estado = 1;

                if($ficha_sicootrostest->save())
                {
                    $datos['estado'] = 1;
                    $datos['msj'] = 'exito';
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
                $datos['msj'] = 'ficha no encontrada';
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
