<?php

namespace App\Http\Controllers;

use App\Models\OftalmoRecetaLente;
use Illuminate\Http\Request;

class OftarmoRecetaLenteController extends Controller
{
    public function registrar(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_ficha_atencion))
        {
            $error['id_ficha_atencion'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_profesional))
        {
            $error['id_profesional'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_paciente))
        {
            $error['id_paciente'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->tipo_lentes))
        {
            $error['tipo_lentes'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->lentes_para))
        {
            $error['lentes_para'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $registro = new OftalmoRecetaLente();
            $registro->id_ficha_atencion = $request->id_ficha_atencion;
            $registro->id_profesional = $request->id_profesional;
            $registro->id_paciente = $request->id_paciente;
            $registro->tipo_lentes = $request->tipo_lentes;
            $registro->lentes_para = $request->lentes_para;
            $registro->lentes_para_texto = $request->lentes_para_texto;
            $registro->r_oi_esfera = $request->r_oi_esfera;
            $registro->r_oi_cilindro = $request->r_oi_cilindro;
            $registro->r_oi_valor_eje = $request->r_oi_valor_eje;
            $registro->r_oi_add = $request->r_oi_add;
            $registro->r_oi_prisma = $request->r_oi_prisma;
            $registro->r_oi_dip = $request->r_oi_dip;
            $registro->r_oi_obs = $request->r_oi_obs;
            $registro->r_od_esfera = $request->r_od_esfera;
            $registro->r_od_cilindro = $request->r_od_cilindro;
            $registro->r_od_valor_eje = $request->r_od_valor_eje;
            $registro->r_od_add = $request->r_od_add;
            $registro->r_od_prisma = $request->r_od_prisma;
            $registro->r_od_dip = $request->r_od_dip;
            $registro->r_od_obs = $request->r_od_obs;
            $registro->r_obs = $request->r_obs;
            $registro->cod_auto = session('lic_token');
            $registro->estado = 1;

            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'Exito';
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Falla en registro';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Campos Requeridos';
            $datos['error'] = $error;
        }

        return $datos;
    }

    public function verRegistros(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_ficha_atencion))
        {
            $error['ID FICHA ATENCION'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $filtro = array();
            $filtro[] = array('id_ficha_atencion', $request->id_ficha_atencion);

            if(!empty($request->id_profesional))
                $filtro[] = array('id_profesional', $request->id_profesional);
            if(!empty($request->id_paciente))
                $filtro[] = array('id_paciente', $request->id_paciente);

            $registro = OftalmoRecetaLente::where($filtro)->get();

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
            $datos['msj'] = 'Campos Requeridos';
            $datos['error'] = $error;
        }

        return $datos;
    }

    public function verRegistro(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id))
        {
            $error['id'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $registro = OftalmoRecetaLente::find($request->id)->get();
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
            $datos['msj'] = 'Campos Requeridos';
            $datos['error'] = $error;
        }

        return $datos;
    }
}
