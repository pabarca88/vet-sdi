<?php

namespace App\Http\Controllers;

use App\Models\TomaMuestraDetalle;
use Illuminate\Http\Request;

class TomaMuestraDetalleController extends Controller
{

    static public function registrar($id_toma_muestra, $id_tipo_embase, $observacion)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($id_toma_muestra))
        {
            $error['TOMA MUESTRA'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($id_tipo_embase))
        {
            $error['TIPO EMBASE'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($observacion))
        {
            $error['OBSERVACION'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $registrar = new TomaMuestraDetalle();
            $registrar->id_toma_muestra = $id_toma_muestra;
            $registrar->id_tipo_embase = $id_tipo_embase;
            $registrar->observacion = $observacion;
            $registrar->estado = 1;

            if($registrar->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'resgistro exitoso';
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'resgistro con falla';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campo requerido';
            $datos['error'] = $error;
        }

        return (object)$datos;
    }

    public function modificar($id, $id_toma_muestra, $id_tipo_embase, $observacion, $estado)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($id_toma_muestra))
        {
            $error['TOMA MUESTRA'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($id_tipo_embase))
        {
            $error['TIPO EMBASE'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($observacion))
        {
            $error['OBSERVACIONES'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $registrar = TomaMuestraDetalle::find($id);
            $registrar->id_toma_muestra = $id_toma_muestra;
            $registrar->id_tipo_embase = $id_tipo_embase;
            $registrar->observacion = $observacion;
            $registrar->estado = $estado;

            if($registrar->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'resgistro exitoso';
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'resgistro con falla';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campo requerido';
            $datos['error'] = $error;
        }

        return (object)$datos;
    }

    public function verRegistro($id)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(!empty($id))
        {
            $error['ID'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $registro = TomaMuestraDetalle::find($id);
            if($registro)
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registro';
                $datos['registro'] = $registro;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'sin registro';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campo requerido';
            $datos['error'] = $error;
        }

        return (object)$datos;
    }

    public function verRegistros()
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if($valido)
        {
            $filtro = array();
            if(!empty($id))
                $filtro[] = array('id', $id);
            if(!empty($id_toma_muestra))
                $filtro[] = array('id_toma_muestra', $id_toma_muestra);
            if(!empty($id_tipo_embase))
                $filtro[] = array('id_tipo_embase', $id_tipo_embase);
            if(!empty($estado))
                $filtro[] = array('estado', $estado);

            $registro = TomaMuestraDetalle::where($filtro)->get();

            if($registro)
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registro';
                $datos['registro'] = $registro;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'sin registro';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campo requerido';
            $datos['error'] = $error;
        }

        return (object)$datos;
    }

}
