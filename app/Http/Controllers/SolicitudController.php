<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Solicitud;
use App\Models\SolicitudDetalle;
use Illuminate\Http\Request;

class SolicitudController extends Controller
{
    /**
     * Undocumented function
     *
     * @param [type] $solicitud_tipo
     * @param [type] $id_solicitante
     * @param [type] $observacion_solicitud
     * @param [type] $detalle
     * @return array
     */
    static public function registroSolicitudDetalle( $solicitud_tipo, $id_solicitante, $observacion_solicitud, $detalle )
    {
        $datos = array();

        $datos['Solicitud'] = $result_solicitud = static::registrarSolicitud($solicitud_tipo, $id_solicitante, $observacion_solicitud);
        if($result_solicitud['estado'] == 1)
        {
            $result_detalle = array();
            if(count($detalle)>0)
            {
                foreach ($detalle as $key => $value) {
                    $result_detalle[$key] = static::registrarSolicitudDetalle($result_solicitud['last_id'],$value->id_producto, $value->codigo_producto, $value->descripcion_producto, $value->cantidad);
                }
                $datos['SolicitudDetalle'] = $result_detalle;
            }
            else
            {
                $result_detalle = 'sin detalle';
                $datos['SolicitudDetalle'] = $result_detalle;
            }
        }
        return $datos;
    }

    /**
     * Undocumented function
     *
     * @param [type] $solicitud_tipo
     * @param [type] $id_solicitante
     * @param [type] $observacion_solicitud
     * @return array
     */
    static public function registrarSolicitud( $solicitud_tipo, $id_solicitante, $observacion_solicitud )
    {
        $datos = array();
        $valido = 1;
        $error = array();

        if(empty($solicitud_tipo))
        {
            $error['solicitud_tipo'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($id_solicitante))
        {
            $error['id_solicitante'] = 'campo requerido';
            $valido = 0;
        }
        // if(empty($observacion_solicitud))
        // {
        //     $error['observacion_solicitud'] = 'campo requerido';
        //     $valido = 0;
        // }

        if($valido == 1)
        {

            $registro = new Solicitud();

            $registro->solicitud_tipo = $solicitud_tipo;
            $registro->id_solicitante = $id_solicitante;
            $registro->fecha_solicitud = date('Y-m-d H:i:s');
            $registro->observacion_solicitud = $observacion_solicitud;
            $registro->estado = 1;

            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registro';
                $datos['last_id'] = $registro->id;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'falla en el registro';
            }
        }
        else
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'campos requeridos';
            $datos['error'] = $error;
        }
        return $datos;
    }

    /**
     * Undocumented function
     *
     * @param [type] $id_solicitud
     * @param [type] $id_producto
     * @param [type] $codigo_producto
     * @param [type] $descripcion_producto
     * @param [type] $cantidad
     * @return array
     */
    static public function registrarSolicitudDetalle( $id_solicitud, $id_producto, $codigo_producto, $descripcion_producto, $cantidad )
    {
        $datos = array();
        $valido = 1;
        $error = array();

        if(empty($id_solicitud))
        {
            $error['id_solicitud'] = 'campo requerido';
            $valido = 0;
        }
        // if(empty($id_producto))
        // {
        //     $error['id_producto'] = 'campo requerido';
        //     $valido = 0;
        // }
        // if(empty($codigo_producto))
        // {
        //     $error['codigo_producto'] = 'campo requerido';
        //     $valido = 0;
        // }
        if(empty($descripcion_producto))
        {
            $error['descripcion_producto'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($cantidad))
        {
            $error['cantidad'] = 'campo requerido';
            $valido = 0;
        }

        if($valido == 1)
        {

            $registro = new SolicitudDetalle();

            $registro->id_solicitud = $id_solicitud;
            $registro->id_producto = $id_producto;
            $registro->codigo_producto = $codigo_producto;
            $registro->descripcion_producto = $descripcion_producto;
            $registro->cantidad = $cantidad;
            $registro->estado = 1;

            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registro';
                $datos['last_id'] = $registro->id;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'falla en el registro';
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

    /**
     * Undocumented function
     *
     * @param [type] $id_solicitud
     * @param [type] $id_persona
     * @param [type] $id_user
     * @param [type] $observacion
     * @param [type] $accion
     * @return array
     */
    static public function aproRechSolicitud($id_solicitud, $id_persona, $id_user, $observacion, $accion)
    {

        $datos = array();
        $valido = 1;
        $error = array();

        if(empty($id_solicitud))
        {
            $error['id_solicitud'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($accion))
        {
            $error['accion'] = 'campo requerido';
            $valido = 0;
        }

        if($valido == 1)
        {
            $registro = Solicitud::with('Detalle')->where('id', $id_solicitud)->first();
            if($registro)
            {
                if($accion == 'APROBADO')
                {
                    /** APROBACION */
                    $registro->id_persona_aprobacion = $id_persona;
                    $registro->id_user_aprobacion = $id_user;
                    $registro->fecha_aprobacion = date('Y-m-d H:i:s');
                    $registro->observacion_aprobacion = $observacion;
                    $registro->estado = 2;
                }
                else if($accion == 'RECHAZO')
                {
                    /** RECHAZO */
                    $registro->id_persona_rechazo = $id_persona;
                    $registro->id_user_rechazo = $id_user;
                    $registro->fecha_rechazo = date('Y-m-d H:i:s');
                    $registro->observacion_rechazo = $observacion;
                    $registro->estado = 3;
                }

                if($registro->save())
                {
                    $datos['estado'] = 1;
                    $datos['msj'] = 'registro actualozado';
                    $detalle = $registro->detalle;
                    if(count($detalle)>0)
                    {
                        foreach($detalle as $det)
                        {
                            $result = static::aproRechDetaSolicitud($id_solicitud,$det->id, $accion);
                            $datos['detalle'][$det->id] = $result;
                        }
                    }
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'falla al actualizar';
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'registro no encontrado';
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

    /**
     * Undocumented function
     *
     * @param [type] $id_solicitud
     * @param [type] $id_detalle
     * @param [type] $accion
     * @return array
     */
    static public function aproRechDetalleSolicitud($id_solicitud, $id_detalle, $accion){
        $datos = array();
        $valido = 1;
        $error = array();

        if(empty($id_solicitud))
        {
            $error['id_solicitud'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($id_detalle))
        {
            $error['id_detalle'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($accion))
        {
            $error['accion'] = 'campo requerido';
            $valido = 0;
        }

        if($valido == 1)
        {
            $registro = SolicitudDetalle::where('id_solicitud',$id_solicitud)->where('id_detalle',$id_detalle)->first();
            if($registro)
            {
                if($accion == 'APROBADO')
                {
                    $registro->estado = 2;
                }
                else if($accion == 'RECHAZO')
                {
                    $registro->estado = 3;
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'registro no encontrado';
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

    /**
     * Undocumented function
     *
     * @param [type] $id_solicitud
     * @return array
     */
    static public function verSolicitud($id_solicitud){
        $datos = array();
        $valido = 1;
        $error = array();

        if(empty($id_solicitud))
        {
            $error['id_solicitud'] = 'campo requerido';
            $valido = 0;
        }

        if($valido == 1)
        {
            $registro = Solicitud::with(['Detalle' => function($query){
                                        $query->select( 'id_solicitud', 'id_producto', 'codigo_producto', 'descripcion_producto', 'cantidad', 'estado');
                                    }])
                                    ->with(['Tipo' => function($query){
                                        $query->select('id','nombre','detalle');
                                    }])
                                    ->where('id', $id_solicitud)
                                    ->first();
            if($registro)
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registro';
                $datos['registro'] = $registro;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'registro no encontrado';
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

    /**
     * Undocumented function
     *
     * @param [type] $id_solicitud
     * @return array
     */
    static public function verDetalleSolicitud($id_solicitud)
    {
        $datos = array();
        $valido = 1;
        $error = array();

        if(empty($id_solicitud))
        {
            $error['id_solicitud'] = 'campo requerido';
            $valido = 0;
        }

        if($valido == 1)
        {
            $registros = SolicitudDetalle::where('id', $id_solicitud)->get();
            if($registros)
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registros';
                $datos['registros'] = $registros;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'registros no encontrado';
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

    /**
     * Undocumented function
     *
     * @param [type] $id_solicitud
     * @return array
     */
    static public function verSolicitudesSolicitante($id_solicitante){
        $datos = array();
        $valido = 1;
        $error = array();

        if(empty($id_solicitante))
        {
            $error['id_solicitante'] = 'campo requerido';
            $valido = 0;
        }

        if($valido == 1)
        {
            $registros = Solicitud::with(['Detalle' => function($query){
                                        $query->select( 'id_solicitud', 'id_producto', 'codigo_producto', 'descripcion_producto', 'cantidad', 'estado');
                                    }])
                                    ->with(['Tipo' => function($query){
                                        $query->select('id','nombre','detalle');
                                    }])
                                    ->where('id_solicitante', $id_solicitante)
                                    ->get();
            if($registros)
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registros';
                $datos['registros'] = $registros;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'registro no encontrado';
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
