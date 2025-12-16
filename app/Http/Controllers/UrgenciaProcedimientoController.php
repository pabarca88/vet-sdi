<?php

namespace App\Http\Controllers;

use App\Models\UrgenciaProcedimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UrgenciaProcedimientoController extends Controller
{
    /** ver registros API */
    static public function verRegistros_r(Request $request)
    {
        return static::verRegistros($request->id_urgencia, $request->id_tipo_procedimiento, $request->tipo_procedimiento, $request->id_procedimiento, $request->procedimiento, $request->comentario, $request->fecha_registro, $request->hora_registro,  $request->estado);
    }

    /** ver registros */
    /**
     * consulta de registros de reta por atencion
     * @param id_urgencia integer - ID URGENCIA - REQUERIDO
     * @param id_tipo_procedimiento integer - ID TIPO PROCEDIMIENTO - OPCIONAL
     * @param tipo_procedimiento string - NOMBRE TIPO PROCEDIMIENTO - OPCIONAL
     * @param id_procedimiento integer - ID PROCEDIMIENTO - OPCIONAL
     * @param procedimiento string - NOMBRE PROCEDIMIENTO - OPCIONAL
     * @param comentario string - COMENTARIO - OPCIONAL
     * @param fecha_registro date - fecha registro (Y-m-d) - OPCIONAL
     * @param hora_registro time - hora registro (H:i:s) - OPCIONAL
     * @param estado int - estado - OPCIONAL
     * @return object
     */
    static public function verRegistros($id_urgencia, $id_tipo_procedimiento = '', $tipo_procedimiento = '', $id_procedimiento = '', $procedimiento = '', $comentario = '', $id_usuario = '', $fecha_registro = '', $hora_registro = '',  $estado = '')
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($id_urgencia))
        {
            $error['ID URGENCIA'] = 'campo requediro';
            $valido = 0;
        }

        if($valido)
        {
            $filtro = array();
            if( !empty($id_urgencia))
            {
                $filtro[] = array('id_urgencia', $id_urgencia);
            }
            if( !empty($id_tipo_procedimiento))
            {
                $filtro[] = array('id_tipo_procedimiento', $id_tipo_procedimiento);
            }
            if( !empty($tipo_procedimiento))
            {
                $filtro[] = array('tipo_procedimiento', 'like', $tipo_procedimiento.'%');
            }
            if( !empty($id_procedimiento))
            {
                $filtro[] = array('id_procedimiento', $id_procedimiento);
            }
            if( !empty($procedimiento))
            {
                $filtro[] = array('procedimiento', 'like', $procedimiento.'%');
            }
            if( !empty($comentario))
            {
                $filtro[] = array('comentario', 'like', $comentario.'%');
            }
            if( !empty($id_usuario))
            {
                $filtro[] = array('id_usuario', $id_usuario);
            }
            if( !empty($fecha_registro))
            {
                $filtro[] = array('fecha_registro', $fecha_registro);
            }
            if( !empty($hora_registro))
            {
                $filtro[] = array('hora_registro', $hora_registro);
            }
            if( $estado !== '')
            {
                $filtro[] = array('estado', $estado);
            }

            $registros = UrgenciaProcedimiento::where($filtro)->get();
            if($registros)
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registro';
                $datos['registros'] = $registros;
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

    /** registrar API */
    public function registrar_r(Request $request)
    {
        return static::registrar($request->id_urgencia, $request->id_tipo_procedimiento, $request->tipo_procedimiento, $request->id_procedimiento, $request->procedimiento, $request->comentario);
    }
    /** registrar */
    /**
     * consulta de registros de reta por atencion
     * @param id_urgencia integer - ID URGENCIA - REQUERIDO
     * @param id_tipo_procedimiento integer - ID TIPO PROCEDIMIENTO - REQUERIDO
     * @param tipo_procedimiento string - NOMBRE TIPO PROCEDIMIENTO - REQUERIDO
     * @param id_procedimiento integer - ID PROCEDIMIENTO - REQUERIDO
     * @param procedimiento string - NOMBRE PROCEDIMIENTO - REQUERIDO
     * @param comentario string - COMENTARIO - OPCIONAL
     * @return object
     */
    static public function registrar($id_urgencia, $id_tipo_procedimiento, $tipo_procedimiento, $id_procedimiento, $procedimiento, $comentario)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if( empty($id_urgencia) )
        {
            $error['id_urgencia'] = 'campo requerido';
            $valido = 0;
        }
        if( empty($id_tipo_procedimiento) )
        {
            $error['id_tipo_procedimiento'] = 'campo requerido';
            $valido = 0;
        }
        if( empty($tipo_procedimiento) )
        {
            $error['tipo_procedimiento'] = 'campo requerido';
            $valido = 0;
        }
        if( empty($id_procedimiento) )
        {
            $error['id_procedimiento'] = 'campo requerido';
            $valido = 0;
        }
        if( empty($procedimiento) )
        {
            $error['procedimiento'] = 'campo requerido';
            $valido = 0;
        }
        // if( empty($comentario) )
        // {
        //     $error['comentario'] = 'campo requerido';
        //     $valido = 0;
        // }
        // if( empty($fecha_registro) )
        // {
        //     $error['fecha_registro'] = 'campo requerido';
        //     $valido = 0;
        // }
        // if( empty($hora_registro) )
        // {
        //     $error['hora_registro'] = 'campo requerido';
        //     $valido = 0;
        // }

        if($valido)
        {
            $registrar = new UrgenciaProcedimiento();
            $registrar->id_urgencia = $id_urgencia;
            $registrar->id_tipo_procedimiento = $id_tipo_procedimiento;
            $registrar->tipo_procedimiento = $tipo_procedimiento;
            $registrar->id_procedimiento = $id_procedimiento;
            $registrar->procedimiento = $procedimiento;
            $registrar->comentario = $comentario;
            $registrar->id_usuario = Auth::user()->id;
            $registrar->fecha_registro = date('Y-m-d');
            $registrar->hora_registro = date('H:m:s');
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
}
