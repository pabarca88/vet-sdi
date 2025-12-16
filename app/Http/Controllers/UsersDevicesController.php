<?php

namespace App\Http\Controllers;

use App\Models\AdminInstServ;
use App\Models\Asistente;
use App\Models\Paciente;
use App\Models\Profesional;
use App\Models\User;
use App\Models\UsersDevices;
use Exception;
use Illuminate\Http\Request;

class UsersDevicesController extends Controller
{
    public function verRegistros(Request $request)
    {
        $datos = array();
        $cant_x_pagina = 10;
        $filtros = array();

        if($request->id!='')
            $filtros[] = array('id',$request->id);
        if($request->id_user!='')
            $filtros[] = array('id_user',$request->id_user);
        if($request->alias!='')
            $filtros[] = array('alias',$request->alias);
        if($request->uuid!='')
            $filtros[] = array('uuid',$request->uuid);
        if($request->estado!='')
            $filtros[] = array('estado',$request->estado);



        /* CANTIDAD REGISTROS X PAG */
        $cant_reg = UsersDevices::where($filtros)->count();

        if($cant_reg >0){
            $datos['estado'] = 1;
            $datos['cantidad_registros'] = $cant_reg;
            $datos['request'] = $request->all();

            // Generamos la consulta
            $datos['registros'] = $registros = UsersDevices::where($filtros)->get();
            $datos['password'] = $registros[0]->password;

        }else{
            $datos['estado'] = 0;
            $datos['msg'] = 'Sin registros';
            $datos['request'] = $request->all();
        }

        return response($datos)->header('Content-Type', 'application/json');
    }

    public function verRegistro(Request $request){

        $datos = array();
        $filtros = array();
        $error = array();
        $campos_requeridos = 0;


        /* VALIDACION CAMPOS */
        if(empty($request->id)||(int)$request->id==0)
        {
            $error['id'] = 'campo requerido';
            $campos_requeridos = 1;
        }


        /* CAMPOS FILTRO */
        if($request->id!='')
            $filtros[] = array('id',$request->id);
        if($request->id_user!='')
            $filtros[] = array('id_user',$request->id_user);
        if($request->alias!='')
            $filtros[] = array('alias',$request->alias);
        if($request->uuid!='')
            $filtros[] = array('uuid',$request->uuid);
        if($request->estado!='')
            $filtros[] = array('estado',$request->estado);

        if($campos_requeridos==0)
        {

            $cant_reg = UsersDevices::count();

            if($cant_reg >0){

                // Generamos la consulta
                $registros = UsersDevices::where($filtros)->find($request->id);

                if($registros->count())
                {
                    $datos['estado'] = 1;
                    $datos['registros'] = $registros;
                    $datos['request'] = $request->all();

                }else{
                    $datos['estado'] = 0;
                    $datos['msg'] = 'Registro no encontrado';
                    $datos['request'] = $request->all();
                }

            }else{
                $datos['estado'] = 0;
                $datos['msg'] = 'Sin registros';
                $datos['request'] = $request->all();
            }
        }else{
            $datos['estado'] = 0;
            $datos['msg'] = 'Campos Requeridos';
            $datos['request'] = $request->all();
            $datos['error'] = $error;
        }

        return response($datos)->header('Content-Type', 'application/json');

    }

    public function registrar(Request $request)
    {

        $datos = array();
        $error = array();
        $campos_requeridos = 0;

        $registro = new UsersDevices();


        /* VALIDACION CAMPOS */
        if($request->id_user=='')
        {
            $error['id_user'] = 'campo requerido';
            $campos_requeridos = 1;
        }
        if($request->alias=='')
        {
            $error['alias'] = 'campo requerido';
            $campos_requeridos = 1;
        }
        if($request->uuid=='')
        {
            $error['uuid'] = 'campo requerido';
            $campos_requeridos = 1;
        }

        if($request->password=='')
        {
            $error['password'] = 'campo requerido';
            $campos_requeridos = 1;
        }

        if($request->estado=='')
        {
            $error['estado'] = 'campo requerido';
            //$campos_requeridos = 1;
        }
        if($request->fecha_ingreso=='')
        {
            $error['fecha_ingreso'] = 'campo requerido';
            $campos_requeridos = 1;
        }
        if($request->fecha_termino=='')
        {
            $error['fecha_termino'] = 'campo requerido';
            $campos_requeridos = 1;
        }


        /* FIN - VALIDACION CAMPOS */

        if($campos_requeridos==0)
        {
            $registro->id_user = $request->id_user;
            $registro->alias = $request->alias;
            $registro->uuid = $request->uuid;
            $registro->password = $request->password;

            $registro->estado = $request->estado;
            $registro->fecha_ingreso = $request->fecha_ingreso;
            $registro->fecha_termino = $request->fecha_termino;

            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msg'] = 'Registros Creado';
                $datos['request_data'] = $request->all();
            }else{
                $datos['estado'] = 0;
                $datos['msg'] = 'Problemas al registrar';
                $datos['request_data'] = $request->all();
            }
        }else{
            $datos['estado'] = 0;
            $datos['msg'] = 'Campos requeridos';
            $datos['error'] = $error;
            $datos['request_data'] = $request->all();
        }

        return response($datos)->header('Content-Type', 'application/json');
    }

    public function modificar(Request $request)
    {
        $datos = array();
        $error = array();
        $campos_requeridos = 0;

        /* VALIDAR DATOS */
        if((int)$request->id==0){
            $error['id'] = 'Campo requerido';
            $campos_requeridos = 1;
        }

        if($request->id_user=='')
        {
            $error['id_user'] = 'campo requerido';
            $campos_requeridos = 1;
        }
        if($request->alias=='')
        {
            $error['alias'] = 'campo requerido';
            $campos_requeridos = 1;
        }
        if($request->uuid=='')
        {
            $error['uuid'] = 'campo requerido';
            $campos_requeridos = 1;
        }


        if($request->estado=='')
        {
            $error['estado'] = 'campo requerido';
            $campos_requeridos = 1;
        }
        if($request->fecha_ingreso=='')
        {
            $error['fecha_ingreso'] = 'campo requerido';
            $campos_requeridos = 1;
        }
        if($request->fecha_termino=='')
        {
            $error['fecha_termino'] = 'campo requerido';
            $campos_requeridos = 1;
        }


        if($campos_requeridos==0)
        {

            $registro = UsersDevices::find($request->id);

            if(count($registro))
            {

                if(!empty($request->id_user))
                    $registro->id_user = $request->id_user;
                if(!empty($request->alias))
                    $registro->alias = $request->alias;
                if(!empty($request->uuid))
                    $registro->uuid = $request->uuid;

                    if(!empty($request->password))
                    $registro->password = $request->password;

                if(!empty($request->estado))
                    $registro->estado = $request->estado;
                if(!empty($request->fecha_ingreso))
                    $registro->fecha_ingreso = $request->fecha_ingreso;
                if(!empty($request->fecha_termino))
                    $registro->fecha_termino = $request->fecha_termino;


                if($registro->save())
                {
                    $datos['estado'] = 1;
                    $datos['msg'] = 'Registro Modificado';
                    $datos['request_data'] = $request->all();
                }else{
                    $datos['estado'] = 0;
                    $datos['msg'] = 'Problemas al Modificar';
                    $datos['request_data'] = $request->all();
                }
            }else{
                $datos['estado'] = 0;
                $datos['msg'] = 'Registro no existente, vuelva a intentarlo.';
                $datos['request_data'] = $request->all();
            }
        }else{
            $datos['estado'] = 0;
            $datos['msg'] = 'Registro no existente, vuelva a intentarlo.';
            $datos['error'] = $error;
            $datos['request_data'] = $request->all();
        }

        return response($datos)->header('Content-Type', 'application/json');
    }

    public function estado(Request $request)
    {
        $datos = array();
        $error = array();
        $campos_requeridos = 0;

        /* VALIDAR DATOS */
        if(empty($request->id)||(int)$request->id==0){
            $error['id'] = 'Campo requerido';
            $campos_requeridos = 1;
        }
        if($request->estado==null){
            $error['estado'] = 'Campo requerido';
            $campos_requeridos = 1;
        }

        if($campos_requeridos==0)
        {

            $registro = UsersDevices::find($request->id);

            if(count($registro)>0)
            {
                $registro->estado = $request->estado;

                if($registro->save())
                {
                    $datos['estado'] = 1;
                    $datos['msg'] = 'Registro Actualizado';
                    $datos['request'] = $request->all();
                }else{
                    $datos['estado'] = 0;
                    $datos['msg'] = 'Problemas al actualizar el registro';
                    $datos['request'] = $request->all();
                }
            }else{
                $datos['estado'] = 0;
                $datos['msg'] = 'Registro no existe';
                $datos['request'] = $request->all();
            }
        }else{
            $datos['estado'] = 0;
            $datos['msg'] = 'Campos Requeridos';
            $datos['error'] = $error;
            $datos['request'] = $request->all();
        }

        return response($datos)->header('Content-Type', 'application/json');
    }

    public function solicitarAutorizacion(Request $request)
    {

        $datos = array();
        $error = array();
        $campos_requeridos = 0;
        $persona = '';

        /* VALIDACION CAMPOS */
        if(empty($request->uuid))
        {
            $error['uuid'] = 'campo requerido';
            $campos_requeridos = 1;
        }


        if($campos_requeridos==0)
        {
            /** buscar user divices */
            $user_divices = UsersDevices::where('uuid', $request->uuid)->first();

            if($user_divices)
            {
                /** buscar usuario */
                $usuario = User::find($user_divices->id_user);
                if($usuario)
                {
                    /** buscar informacion de usuario */
                    $persona = Asistente::where('id_usuario',$usuario->id)->first();
                    if($persona == null)
                    {
                        $persona = Profesional::where('id_usuario',$usuario->id)->first();
                        if($persona == null)
                        {
                            $persona = Paciente::where('id_usuario',$usuario->id)->first();
                            if($persona == null)
                            {
                                $persona = AdminInstServ::where('id_usuario',$usuario->id)->first();
                                $nombre = $persona->nombres.' '.$persona->apellido_uno.' '.$persona->apellido_dos;
                                $rut = $persona->rut;
                                $correo = $persona->email;
                            }
                            else
                            {
                                $nombre = $persona->nombres.' '.$persona->apellido_uno.' '.$persona->apellido_dos;
                                $rut = $persona->rut;
                                $correo = $persona->email;
                            }
                        }
                        else
                        {
                            $nombre = $persona->nombre.' '.$persona->apellido_uno.' '.$persona->apellido_dos;
                            $rut = $persona->rut;
                            $correo = $persona->email;
                        }
                    }
                    else
                    {
                        $nombre = $persona->nombres.' '.$persona->apellido_uno.' '.$persona->apellido_dos;
                        $rut = $persona->rut;
                        $correo = $persona->email;
                    }

                    $token_id = encrypt($user_divices->id);
                    $url = url('/registro/equipo?t='.$token_id);

                    /** envio de correo */
                    $blade = 'registrar_app';
                    $to = array(array('email' => $correo,'name' => $nombre));
                    $cc = array();
                    $bcc = array();
                    $asunto = 'MED-SDI - Solicitud de Registro de Equipo';
                    $body = array('URL'=>$url, 'NOMBRE_CLIENTE'=> $nombre);
                    $archivo = '';/** pendiente */
                    $id_institucion = '';

                    $datos['envio_correo'] = SendMailController::envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, $id_institucion);

                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msg'] = 'Usuario no encontrado';
                    $datos['request'] = $request->all();
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msg'] = 'Dispositivo no encontrado';
                $datos['request'] = $request->all();
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msg'] = 'Campos Requeridos';
            $datos['request'] = $request->all();
            $datos['error'] = $error;
        }

        return response($datos)->header('Content-Type', 'application/json');
    }

    /** METODO NO API */
    public function enlazarEquipo(Request $request)
    {
        $nombre_cliente = '';
        $mensaje_resultado = '';
        if(empty($request->t))
        {
            $nombre_cliente = 'Cliente';
            $mensaje_resultado = 'Se presento un problema encontrando la solicitud de Enlace de Equipo, intente de nuevo.1';
        }
        else
        {
            try{
                $id = decrypt($request->t);
            }
            catch(Exception $e)
            {
                $id = $request->t;
            }

            $registro = UsersDevices::find($id);
            if($registro)
            {

                /** buscar usuario */
                $usuario = User::find($registro->id_user);
                if($usuario)
                {
                    /** buscar informacion de usuario */
                    $persona = Asistente::where('id_usuario',$usuario->id)->first();
                    if($persona == null)
                    {
                        $persona = Profesional::where('id_usuario',$usuario->id)->first();
                        if($persona == null)
                        {
                            $persona = Paciente::where('id_usuario',$usuario->id)->first();
                            if($persona == null)
                            {
                                $persona = AdminInstServ::where('id_usuario',$usuario->id)->first();
                                $nombre = $persona->nombres.' '.$persona->apellido_uno.' '.$persona->apellido_dos;
                                $rut = $persona->rut;
                                $correo = $persona->email;
                            }
                            else
                            {
                                $nombre = $persona->nombres.' '.$persona->apellido_uno.' '.$persona->apellido_dos;
                                $rut = $persona->rut;
                                $correo = $persona->email;
                            }
                        }
                        else
                        {
                            $nombre = $persona->nombre.' '.$persona->apellido_uno.' '.$persona->apellido_dos;
                            $rut = $persona->rut;
                            $correo = $persona->email;
                        }
                    }
                    else
                    {
                        $nombre = $persona->nombres.' '.$persona->apellido_uno.' '.$persona->apellido_dos;
                        $rut = $persona->rut;
                        $correo = $persona->email;
                    }

                    $nombre_cliente = $nombre;

                    if($registro->estado == 1)
                    {
                        $mensaje_resultado = 'Su Equipo ya se encuentra Enlazado.';
                    }
                    else
                    {
                        $registro->estado = 1;
                        $registro->code = date('YmdHis');
                        if($registro->save())
                        {
                            $mensaje_resultado = 'Su Equipo ha sido registrado con exito.';
                        }
                        else
                        {
                            $mensaje_resultado = 'Se presento un problema al enlazar el Equipo, intente de nuevo.';
                        }
                    }


                }
                else
                {
                    $nombre_cliente = 'Cliente';
                    $mensaje_resultado = 'Se presento un problema encontrando información del Usuario, intente de nuevo.';
                }
            }
            else
            {
                $nombre_cliente = 'Cliente';
                $mensaje_resultado = 'Se presento un problema encontrando la solicitud de Enlace de Equipo, intente de nuevo.3';
            }
        }

        return view('app.autorizacion.enlace_equipo_app')->with([
            'nombre_cliente' => $nombre_cliente,
            'mensaje_resultado' => $mensaje_resultado,
        ]);
    }
}
