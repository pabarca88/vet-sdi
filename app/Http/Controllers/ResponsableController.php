<?php

namespace App\Http\Controllers;

use App\Models\Responsable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResponsableController extends Controller
{

    public function registrar_r(Request $request)
    {
        return static::registrar($request->nombre,$request->apellido,$request->rut,$request->email,$request->telefono,$request->id_responsable_tipo,$request->id_responsable_nivel,$request->fecha_inicio,$request->fecha_termino,$request->comentario,$request->otro,Auth::user()->id);
    }

    static public function registrar($nombre,$apellido,$rut,$email,$telefono,$id_responsable_tipo,$id_responsable_nivel,$fecha_inicio,$fecha_termino,$comentario,$otro,$id_user)
    {

        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($nombre))
        {
            $error['nombre'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($apellido))
        {
            $error['apellido'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($rut))
        {
            $error['rut'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($email))
        {
            $error['email'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($telefono))
        {
            $error['telefono'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($id_responsable_tipo))
        {
            $error['id_responsable_tipo'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($id_responsable_nivel))
        {
            $error['id_responsable_nivel'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($fecha_inicio))
        {
            $error['fecha_inicio'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($fecha_termino))
        {
            $error['fecha_termino'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($comentario))
        {
            $error['comentario'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($otro))
        {
            $error['otro'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($id_user))
        {
            $error['id_user'] = 'campo requerido';
            $valido = 0;
        }



        if($valido)
        {
            $registro = new Responsable();

            $registro->nombre = $nombre;
            $registro->apellido = $apellido;
            $registro->rut = $rut;
            $registro->email = $email;
            $registro->telefono = $telefono;
            $registro->id_responsable_tipo = $id_responsable_tipo;
            $registro->id_responsable_nivel = $id_responsable_nivel;
            if(empty($fecha_inicio))
                $registro->fecha_inicio = date('Y-m-d');
            else
                $registro->fecha_inicio = $fecha_inicio;
            $registro->fecha_termino = $fecha_termino;
            $registro->comentario = $comentario;
            $registro->confirmacion_inscripcion = '';//$confirmacion_inscripcion;
            $registro->id_log_users_devices = '';//$id_log_users_devices;
            $registro->confirmacion_responsable_app = '';//$confirmacion_responsable_app;
            $registro->confirmacion_responsable_email = '';//$confirmacion_responsable_email;
            $registro->otro = $otro;
            $registro->id_user = $id_user;
            $registro->estado = 1;

            if($registro->save())
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

        return $datos;
    }


}
