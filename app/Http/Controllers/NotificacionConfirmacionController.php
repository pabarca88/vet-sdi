<?php

namespace App\Http\Controllers;

use App\Models\NotificacionConfirmacion;
use Illuminate\Http\Request;

class NotificacionConfirmacionController extends Controller
{
    /**
     * registro de notificaciones
     *
     * @param integer $tipo_notificacion
     * @param integer $id_evento
     * @param Date $fecha_evento
     * @param Time $hora_evento
     * @param DateTime $fecha_primera_notificacion
     * @param integer $cantidad_notificacion
     * @param string $medio_notificacion (json) -> { 0:{ 0:{tipo:email,estado:1,fecha:2023-01-17 08:00:01}, 1:{tipo:app,estado:1,fecha:2023-01-17 08:00:01} }, 1:{ 0:{tipo:email,estado:1, fecha:2023-01-18 06:00:01} } }
     * @param DateTime $fecha_notificacion
     * @param string $medio_confirmacion
     * @param DateTime $fecha_confirmacion
     * @param integer $estado_confirmacion
     * @param string $otros
     * @param string $otros_1
     * @return array
     */
    static public function registrar($tipo_notificacion,$id_evento,$fecha_evento,$hora_evento,$fecha_primera_notificacion,$cantidad_notificacion,$medio_notificacion,$fecha_notificacion,$medio_confirmacion,$fecha_confirmacion,$estado_confirmacion,$otros,$otros_1)
    {

        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($tipo_notificacion))
        {
            $error['tipo_notificacion'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($id_evento))
        {
            $error['id_evento'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($fecha_evento))
        {
            $error['fecha_evento'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($hora_evento))
        {
            $error['hora_evento'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $notificacion = new NotificacionConfirmacion();

            $notificacion->tipo_notificacion = $tipo_notificacion;
            $notificacion->id_evento = $id_evento;
            $notificacion->fecha_evento = $fecha_evento;
            $notificacion->hora_evento = $hora_evento;
            if(!empty($fecha_primera_notificacion))
                $notificacion->fecha_primera_notificacion = $fecha_primera_notificacion;
            if(!empty($cantidad_notificacion))
                $notificacion->cantidad_notificacion = $cantidad_notificacion;
            if(!empty($medio_notificacion))
                $notificacion->medio_notificacion = $medio_notificacion;
            if(!empty($fecha_notificacion))
                $notificacion->fecha_notificacion = $fecha_notificacion;
            if(!empty($medio_confirmacion))
                $notificacion->medio_confirmacion = $medio_confirmacion;
            if(!empty($fecha_confirmacion))
                $notificacion->fecha_confirmacion = $fecha_confirmacion;
            if(!empty($estado_confirmacion))
                $notificacion->estado_confirmacion = $estado_confirmacion;
            if(!empty($otros))
                $notificacion->otros = $otros;
            if(!empty($otros_1))
                $notificacion->otros_1 = $otros_1;

            if($notificacion->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registro con exito';
                $datos['last_id'] = $notificacion->id;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'error en registro';
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
