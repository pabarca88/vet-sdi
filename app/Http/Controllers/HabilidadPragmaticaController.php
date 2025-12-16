<?php

namespace App\Http\Controllers;

use App\Models\HabilidadPragmatica;
use Illuminate\Http\Request;

class HabilidadPragmaticaController extends Controller
{
    public function Registrar_r(Request $request)
    {
        return static::Registrar(
            $request->id_ficha_otros_prof, $request->id_ficha_fono, $request->id_paciente, $request->id_profesional,

            $request->cinetica, $request->proxemica, $request->intencion, $request->cont_visual, $request->expr_facial, $request->facult_conversacion, $request->vari_estilisticas, $request->alter_reciproca, $request->tematizacion, $request->peticiones, $request->aclara_repara,

            $request->obs_generales
        );
    }
    static public function Registrar(
        $id_ficha_otros_prof, $id_ficha_fono, $id_paciente, $id_profesional,

        $cinetica, $proxemica, $intencion, $cont_visual, $expr_facial, $facult_conversacion, $vari_estilisticas, $alter_reciproca, $tematizacion, $peticiones, $aclara_repara,

        $obs_generales,

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
            $registro = new HabilidadPragmatica();

            $registro->id_ficha_otros_prof = $id_ficha_otros_prof;
            $registro->id_ficha_fono = $id_ficha_fono;
            $registro->id_paciente = $id_paciente;
            $registro->id_profesional = $id_profesional;

            $registro->cinetica; // - select-one
            $registro->proxemica; // - select-one
            $registro->intencion; // - select-one
            $registro->cont_visual; // - select-one
            $registro->expr_facial; // - select-one
            $registro->facult_conversacion; // - select-one
            $registro->vari_estilisticas; // - select-one
            $registro->alter_reciproca; // - select-one
            $registro->tematizacion; // - select-one
            $registro->peticiones; // - select-one
            $registro->aclara_repara; // - select-one
            $registro->obs_generales; // - textarea

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
