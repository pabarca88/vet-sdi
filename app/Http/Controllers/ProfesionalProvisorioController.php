<?php

namespace App\Http\Controllers;

use App\Models\ProfesionalProvisorio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Direccion;

class ProfesionalProvisorioController extends Controller
{
    public function verRegistros(Request $request)
    {
        $datos = array();
        $filtros = array();

        if($request->id!='')
            $filtros[] = array('id',$request->id);
        if($request->nombre!='')
            $filtro[] = array('nombre',$request->nombre);
        if($request->apellido_uno!='')
            $filtro[] = array('apellido_uno',$request->apellido_uno);
        if($request->apellido_dos!='')
            $filtro[] = array('apellido_dos',$request->apellido_dos);
        if($request->sexo!='')
            $filtro[] = array('sexo',$request->sexo);
        if($request->rut!='')
            $filtro[] = array('rut',$request->rut);
        if($request->email!='')
            $filtro[] = array('email',$request->email);
        if($request->telefono_uno!='')
            $filtro[] = array('telefono_uno',$request->telefono_uno);
        if($request->telefono_dos!='')
            $filtro[] = array('telefono_dos',$request->telefono_dos);
        if($request->id_direccion!='')
            $filtro[] = array('id_direccion',$request->id_direccion);
        if($request->id_usuario!='')
            $filtro[] = array('id_usuario',$request->id_usuario);
        if($request->id_especialidad!='')
            $filtro[] = array('id_especialidad',$request->id_especialidad);
        if($request->id_tipo_especialidad!='')
            $filtro[] = array('id_tipo_especialidad',$request->id_tipo_especialidad);
        if($request->id_sub_tipo_especialidad!='')
            $filtro[] = array('id_sub_tipo_especialidad',$request->id_sub_tipo_especialidad);
        if($request->supersalud!='')
            $filtro[] = array('supersalud',$request->supersalud);
        if($request->contactado!='')
            $filtro[] = array('contactado',$request->contactado);
        if($request->otro!='')
            $filtro[] = array('otro',$request->otro);
        if($request->estado!='')
            $filtro[] = array('estado',$request->estado);



        /* CANTIDAD REGISTROS X PAG */
        $cant_reg = ProfesionalProvisorio::where($filtros)->count();

        if($cant_reg >0){
            $datos['estado'] = 1;
            $datos['cantidad_registros'] = $cant_reg;
            $datos['request'] = $request->all();

            // Generamos la consulta
            $datos['registros'] = $registros = ProfesionalProvisorio::where($filtros)->get();

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
        if($request->nombre!='')
            $filtro[] = array('nombre',$request->nombre);
        if($request->apellido_uno!='')
            $filtro[] = array('apellido_uno',$request->apellido_uno);
        if($request->apellido_dos!='')
            $filtro[] = array('apellido_dos',$request->apellido_dos);
        if($request->sexo!='')
            $filtro[] = array('sexo',$request->sexo);
        if($request->rut!='')
            $filtro[] = array('rut',$request->rut);
        if($request->email!='')
            $filtro[] = array('email',$request->email);
        if($request->telefono_uno!='')
            $filtro[] = array('telefono_uno',$request->telefono_uno);
        if($request->telefono_dos!='')
            $filtro[] = array('telefono_dos',$request->telefono_dos);
        if($request->id_direccion!='')
            $filtro[] = array('id_direccion',$request->id_direccion);
        if($request->id_usuario!='')
            $filtro[] = array('id_usuario',$request->id_usuario);
        if($request->id_especialidad!='')
            $filtro[] = array('id_especialidad',$request->id_especialidad);
        if($request->id_tipo_especialidad!='')
            $filtro[] = array('id_tipo_especialidad',$request->id_tipo_especialidad);
        if($request->id_sub_tipo_especialidad!='')
            $filtro[] = array('id_sub_tipo_especialidad',$request->id_sub_tipo_especialidad);
        if($request->supersalud!='')
            $filtro[] = array('supersalud',$request->supersalud);
        if($request->contactado!='')
            $filtro[] = array('contactado',$request->contactado);
        if($request->otro!='')
            $filtro[] = array('otro',$request->otro);
        if($request->estado!='')
            $filtro[] = array('estado',$request->estado);

        if($campos_requeridos==0)
        {

            $cant_reg = ProfesionalProvisorio::where($filtros)->count();

            if($cant_reg >0){

                // Generamos la consulta
                $registros = ProfesionalProvisorio::where($filtros)->find($request->id);

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

    public function registrar_R(Request $request)
    {
        $datos = array();
        $error = array();
        $campos_requeridos = 0;

        $registro = new ProfesionalProvisorio();


        /* VALIDACION CAMPOS */
        if($request->nombre == '')
        {
            $error['nombre'] = 'campo requerido';
            $campos_requeridos = 1;
        }
        if($request->apellido_uno == '')
        {
            $error['apellido_uno'] = 'campo requerido';
            $campos_requeridos = 1;
        }
        // if($request->apellido_dos == '')
        // {
        //     $error['apellido_dos'] = 'campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($request->sexo == '')
        // {
        //     $error['sexo'] = 'campo requerido';
        //     $campos_requeridos = 1;
        // }
        if($request->rut == '')
        {
            $error['rut'] = 'campo requerido';
            $campos_requeridos = 1;
        }
        /*
         if($request->email == '')
         {
             $error['email'] = 'campo requerido';
             $campos_requeridos = 1;
         }
         */
        // if($request->telefono_uno == '')
        // {
        //     $error['telefono_uno'] = 'campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($request->telefono_dos == '')
        // {
        //     $error['telefono_dos'] = 'campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($request->id_direccion == '')
        // {
        //     $error['id_direccion'] = 'campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($request->id_usuario == '')
        // {
        //     $error['id_usuario'] = 'campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($request->id_especialidad == '')
        // {
        //     $error['id_especialidad'] = 'campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($request->id_tipo_especialidad == '')
        // {
        //     $error['id_tipo_especialidad'] = 'campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($request->id_sub_tipo_especialidad == '')
        // {
        //     $error['id_sub_tipo_especialidad'] = 'campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($request->supersalud == '')
        // {
        //     $error['supersalud'] = 'campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($request->contactado == '')
        // {
        //     $error['contactado'] = 'campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($request->otro == '')
        // {
        //     $error['otro'] = 'campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($request->estado == '')
        // {
        //     $error['estado'] = 'campo requerido';
        //     $campos_requeridos = 1;
        // }

        /* FIN - VALIDACION CAMPOS */

        if($campos_requeridos==0)
        {
            $registro->id_user = $request->id_user;
            $registro->nombre = $request->nombre;
            $registro->apellido_uno = $request->apellido_uno;
            $registro->apellido_dos = $request->apellido_dos;
            $registro->sexo = $request->sexo;
            $registro->rut = $request->rut;
            $registro->email = $request->email;
            $registro->telefono_uno = $request->telefono_uno;
            $registro->telefono_dos = $request->telefono_dos;
            $registro->id_direccion = $request->id_direccion;
            $registro->id_usuario = $request->id_usuario;
            $registro->id_especialidad = $request->id_especialidad;
            $registro->id_tipo_especialidad = $request->id_tipo_especialidad;
            $registro->id_sub_tipo_especialidad = $request->id_sub_tipo_especialidad;
            $registro->supersalud = $request->supersalud;
            $registro->contactado = $request->contactado;
            $registro->otro = $request->otro;
            // $registro->estado = $request->estado;

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

    public function registrar_profesional_provisorio(Request $request)
    {
        $datos = array();
        $error = array();
        $campos_requeridos = 0;

        $registro = new ProfesionalProvisorio();


        /* VALIDACION CAMPOS */
        // if($request->nombre == '')
        // {
        //     $error['nombre'] = 'campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($request->apellido_uno == '')
        // {
        //     $error['apellido_uno'] = 'campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($request->apellido_dos == '')
        // {
        //     $error['apellido_dos'] = 'campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($request->sexo == '')
        // {
        //     $error['sexo'] = 'campo requerido';
        //     $campos_requeridos = 1;
        // }
        if($request->rut == '')
        {
            $error['rut'] = 'campo requerido';
            $campos_requeridos = 1;
        }

         if($request->email == '')
         {
             $error['email'] = 'campo requerido';
             $campos_requeridos = 1;
         }
        // if($request->telefono_uno == '')
        // {
        //     $error['telefono_uno'] = 'campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($request->telefono_dos == '')
        // {
        //     $error['telefono_dos'] = 'campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($request->id_direccion == '')
        // {
        //     $error['id_direccion'] = 'campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($request->id_usuario == '')
        // {
        //     $error['id_usuario'] = 'campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($request->id_especialidad == '')
        // {
        //     $error['id_especialidad'] = 'campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($request->id_tipo_especialidad == '')
        // {
        //     $error['id_tipo_especialidad'] = 'campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($request->id_sub_tipo_especialidad == '')
        // {
        //     $error['id_sub_tipo_especialidad'] = 'campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($request->supersalud == '')
        // {
        //     $error['supersalud'] = 'campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($request->contactado == '')
        // {
        //     $error['contactado'] = 'campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($request->otro == '')
        // {
        //     $error['otro'] = 'campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($request->estado == '')
        // {
        //     $error['estado'] = 'campo requerido';
        //     $campos_requeridos = 1;
        // }

        /* FIN - VALIDACION CAMPOS */

        if($campos_requeridos==0)
        {
            //if(!empty($request->id_user))
            //$registro->id_user = 0;
            if(!empty($request->nombre))
            $registro->nombre = $request->nombre;

            if(!empty($request->apellido_uno))
            $registro->apellido_uno = $request->apellido_uno;

            if(!empty($request->apellido_uno))
            $registro->apellido_dos = $request->apellido_dos;

            if(!empty($request->sexo))
            $registro->sexo = $request->sexo;

            if(!empty($request->rut))
            $registro->rut = str_replace('.','',$request->rut);

            if(!empty($request->email))
            $registro->email = $request->email;

            if(!empty($request->telefono_uno))
            $registro->telefono_uno = $request->telefono_uno;

            if(!empty($request->telefono_dos))
            $registro->telefono_dos = $request->telefono_dos;

            if(!empty($request->direccion))
            {
                $direcciones = new Direccion();
                $direcciones->direccion = $request->direccion;
                $direcciones->numero_dir = $request->numero_dir;
                $direcciones->id_ciudad = $request->id_ciudad;
                if($direcciones->save())
                $registro->id_direccion = $direcciones->id;
            }
            //if(!empty($request->id_usuario))
            $registro->id_usuario = 0; //sin usuario // no existe aun

            if(!empty($request->id_especialidad))
            $registro->id_especialidad = $request->id_especialidad;

            if(!empty($request->id_tipo_especialidad))
            $registro->id_tipo_especialidad = $request->id_tipo_especialidad;

            if(!empty($request->id_sub_tipo_especialidad))
            $registro->id_sub_tipo_especialidad = $request->id_sub_tipo_especialidad;

            if(!empty($request->supersalud))
            $registro->supersalud = $request->supersalud;

            if(!empty($request->contactado))
            $registro->contactado = $request->contactado;

            if(!empty($request->otro))
            $registro->otro = $request->otro;

            $token_ = md5(uniqid());
            $registro->token = $token_;
            $id_recept_ = $request->id_usuario;
            $registro->id_usuario_genera = $request->id_usuario;
            $registro->estado_token = 0;
            // $registro->estado = $request->estado;

            if($registro->save())
            {
                /* CORREO INVITADO */

                $blade = 'profesional_provisorio_creado';
                $to = array(
                        array(
                            'email' => $request->email,
                            'name' => $request->nombre.' '.$request->apellido_uno.' '.$request->apellido_dos
                        ),
                    );
                $cc = array();
                $bcc = array();
                $asunto = 'MED-SDI - Invitación a Profesional!';

                //$url_ = 'http://medichile_sistema.test'; // LOCAL
                $url_ = env('APP_URL'); // PRODUCCION

                $link_ = $url_.'/Check_sdi_external?urla='.$url_.'&urln='.$url_.'/Acceso_Profesional_NI&id_tipo=8&token_='.$token_.'&evento=Profesional Provisorio&id_recept='.$id_recept_;

                $body = array(
                    'nombre'=>$request->nombre.' '.$request->apellido_uno.' '.$request->apellido_dos,
                    'link' => $link_,
                );
                $archivo = '';/** pendiente */
                $id_institucion = '';

                $result_mail =  SendMailController::envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, $id_institucion);

                $mensaje = '';
                if($result_mail['estado'])
                {
                    $mensaje .= 'Invitacion enviada.<br/>';
                    $mensaje .= 'Recibirá un correo de Bienvenida con la información de acceso al sistema. <br/>';
                    $datos['msg_mail'] = $mensaje;
                }
                else
                {
                    $mensaje .= 'Invitacion enviada.<br/>';
                    $mensaje .= 'Correo de Bienvenida con la información de acceso al sistema con problema para envío. <br/>';
                    $datos['msg_mail'] = $mensaje;
                }

                /* FIN - CORREO INVITADO */

                $datos['estado'] = 1;
                $datos['msg'] = 'Registros Creado';
                $datos['request_data'] = $request->all();
                $datos['link'] = $link_;
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

        if($request->nombre == '')
        {
            $error['nombre'] = 'Campo requerido';
            $campos_requeridos = 1;
        }
        if($request->apellido_uno == '')
        {
            $error['apellido_uno'] = 'Campo requerido';
            $campos_requeridos = 1;
        }
        // if($request->apellido_dos == '')
        // {
        //     $error['apellido_dos'] = 'Campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($request->sexo == '')
        // {
        //     $error['sexo'] = 'Campo requerido';
        //     $campos_requeridos = 1;
        // }
        if($request->rut == '')
        {
            $error['rut'] = 'Campo requerido';
            $campos_requeridos = 1;
        }
        // if($request->email == '')
        // {
        //     $error['email'] = 'Campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($request->telefono_uno == '')
        // {
        //     $error['telefono_uno'] = 'Campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($request->telefono_dos == '')
        // {
        //     $error['telefono_dos'] = 'Campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if((int)$request->id_direccion == 0)
        // {
        //     $error['id_direccion'] = 'Campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if((int)$request->id_usuario == 0)
        // {
        //     $error['id_usuario'] = 'Campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if((int)$request->id_especialidad == 0)
        // {
        //     $error['id_especialidad'] = 'Campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if((int)$request->id_tipo_especialidad == 0)
        // {
        //     $error['id_tipo_especialidad'] = 'Campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if((int)$request->id_sub_tipo_especialidad == 0)
        // {
        //     $error['id_sub_tipo_especialidad'] = 'Campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($request->supersalud == '')
        // {
        //     $error['supersalud'] = 'Campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($request->contactado == '')
        // {
        //     $error['contactado'] = 'Campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($request->otro == '')
        // {
        //     $error['otro'] = 'Campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($request->estado == '')
        // {
        //     $error['estado'] = 'Campo requerido';
        //     $campos_requeridos = 1;
        // }

        if($campos_requeridos==0)
        {

            $registro = ProfesionalProvisorio::find($request->id);

            if(count($registro))
            {

                if(!empty($request->nombre))
                    $registro->nombre = $request->nombre;
                if(!empty($request->apellido_uno))
                    $registro->apellido_uno = $request->apellido_uno;
                if(!empty($request->apellido_dos))
                    $registro->apellido_dos = $request->apellido_dos;
                if(!empty($request->sexo))
                    $registro->sexo = $request->sexo;
                if(!empty($request->rut))
                    $registro->rut = $request->rut;
                if(!empty($request->email))
                    $registro->email = $request->email;
                if(!empty($request->telefono_uno))
                    $registro->telefono_uno = $request->telefono_uno;
                if(!empty($request->telefono_dos))
                    $registro->telefono_dos = $request->telefono_dos;
                if(!empty($request->id_direccion))
                    $registro->id_direccion = $request->id_direccion;
                if(!empty($request->id_usuario))
                    $registro->id_usuario = $request->id_usuario;
                if(!empty($request->id_especialidad))
                    $registro->id_especialidad = $request->id_especialidad;
                if(!empty($request->id_tipo_especialidad))
                    $registro->id_tipo_especialidad = $request->id_tipo_especialidad;
                if(!empty($request->id_sub_tipo_especialidad))
                    $registro->id_sub_tipo_especialidad = $request->id_sub_tipo_especialidad;
                if(!empty($request->supersalud))
                    $registro->supersalud = $request->supersalud;
                if(!empty($request->contactado))
                    $registro->contactado = $request->contactado;
                if(!empty($request->otro))
                    $registro->otro = $request->otro;
                if($request->estado != '')
                    $registro->estado = $request->estado;


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

            $registro = ProfesionalProvisorio::find($request->id);

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

    static public function registrar($nombre,$apellido_uno,$apellido_dos,$sexo,$rut,$email,$telefono_uno,$telefono_dos,$id_direccion,$id_usuario,$id_especialidad,$id_tipo_especialidad,$id_sub_tipo_especialidad,$supersalud,$contactado,$otro,$estado)
    {
        $datos = array();
        $error = array();
        $campos_requeridos = 0;

        $registro = new ProfesionalProvisorio();


        /* VALIDACION CAMPOS */
        if($nombre == '')
        {
            $error['nombre'] = 'campo requerido';
            $campos_requeridos = 1;
        }
        if($apellido_uno == '')
        {
            $error['apellido_uno'] = 'campo requerido';
            $campos_requeridos = 1;
        }
        // if($apellido_dos == '')
        // {
        //     $error['apellido_dos'] = 'campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($sexo == '')
        // {
        //     $error['sexo'] = 'campo requerido';
        //     $campos_requeridos = 1;
        // }
        if($rut == '')
        {
            $error['rut'] = 'campo requerido';
            $campos_requeridos = 1;
        }
        // if($email == '')
        // {
        //     $error['email'] = 'campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($telefono_uno == '')
        // {
        //     $error['telefono_uno'] = 'campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($telefono_dos == '')
        // {
        //     $error['telefono_dos'] = 'campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($id_direccion == '')
        // {
        //     $error['id_direccion'] = 'campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($id_usuario == '')
        // {
        //     $error['id_usuario'] = 'campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($id_especialidad == '')
        // {
        //     $error['id_especialidad'] = 'campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($id_tipo_especialidad == '')
        // {
        //     $error['id_tipo_especialidad'] = 'campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($id_sub_tipo_especialidad == '')
        // {
        //     $error['id_sub_tipo_especialidad'] = 'campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($supersalud == '')
        // {
        //     $error['supersalud'] = 'campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($contactado == '')
        // {
        //     $error['contactado'] = 'campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($otro == '')
        // {
        //     $error['otro'] = 'campo requerido';
        //     $campos_requeridos = 1;
        // }
        // if($estado == '')
        // {
        //     $error['estado'] = 'campo requerido';
        //     $campos_requeridos = 1;
        // }

        /* FIN - VALIDACION CAMPOS */

        if($campos_requeridos==0)
        {
            // $registro->id_user = Auth::user()->id;
            $registro->nombre = $nombre;
            $registro->apellido_uno = $apellido_uno;
            $registro->apellido_dos = $apellido_dos;
            if(!empty($sexo))
                $registro->sexo = $sexo;
            $registro->rut = $rut;
            $registro->email = $email;
            $registro->telefono_uno = $telefono_uno;
            if(!empty($telefono_dos))
                $registro->telefono_dos = $telefono_dos;
            if(!empty($id_direccion))
                $registro->id_direccion = $id_direccion;
            if(!empty($id_usuario))
                $registro->id_usuario = $id_usuario;
            if(!empty($id_especialidad))
                $registro->id_especialidad = $id_especialidad;
            if(!empty($id_tipo_especialidad))
                $registro->id_tipo_especialidad = $id_tipo_especialidad;
            if(!empty($id_sub_tipo_especialidad))
                $registro->id_sub_tipo_especialidad = $id_sub_tipo_especialidad;
            if(!empty($supersalud))
                $registro->supersalud = $supersalud;
            if(!empty($contactado))
                $registro->contactado = $contactado;
            if(!empty($otro))
                $registro->otro = $otro;
            // $registro->estado = $estado;

            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msg'] = 'Registros Creado';
                $datos['last_id'] = $registro->id;
                $datos['request_data'] = json_encode(array(
                    'nombre'=>$nombre,
                    'apellido_uno'=>$apellido_uno,
                    'apellido_dos'=>$apellido_dos,
                    'sexo'=>$sexo,
                    'rut'=>$rut,
                    'email'=>$email,
                    'telefono_uno'=>$telefono_uno,
                    'telefono_dos'=>$telefono_dos,
                    'id_direccion'=>$id_direccion,
                    'id_usuario'=>$id_usuario,
                    'id_especialidad'=>$id_especialidad,
                    'id_tipo_especialidad'=>$id_tipo_especialidad,
                    'id_sub_tipo_especialidad'=>$id_sub_tipo_especialidad,
                    'supersalud'=>$supersalud,
                    'contactado'=>$contactado,
                    'otro'=>$otro,
                ));
            }else{
                $datos['estado'] = 0;
                $datos['msg'] = 'Problemas al registrar';
                $datos['request_data'] = json_encode(array(
                    'nombre'=>$nombre,
                    'apellido_uno'=>$apellido_uno,
                    'apellido_dos'=>$apellido_dos,
                    'sexo'=>$sexo,
                    'rut'=>$rut,
                    'email'=>$email,
                    'telefono_uno'=>$telefono_uno,
                    'telefono_dos'=>$telefono_dos,
                    'id_direccion'=>$id_direccion,
                    'id_usuario'=>$id_usuario,
                    'id_especialidad'=>$id_especialidad,
                    'id_tipo_especialidad'=>$id_tipo_especialidad,
                    'id_sub_tipo_especialidad'=>$id_sub_tipo_especialidad,
                    'supersalud'=>$supersalud,
                    'contactado'=>$contactado,
                    'otro'=>$otro,
                ));
            }
        }else{
            $datos['estado'] = 0;
            $datos['msg'] = 'Campos requeridos';
            $datos['error'] = $error;
            $datos['request_data'] = json_encode(array(
                    'nombre'=>$nombre,
                    'apellido_uno'=>$apellido_uno,
                    'apellido_dos'=>$apellido_dos,
                    'sexo'=>$sexo,
                    'rut'=>$rut,
                    'email'=>$email,
                    'telefono_uno'=>$telefono_uno,
                    'telefono_dos'=>$telefono_dos,
                    'id_direccion'=>$id_direccion,
                    'id_usuario'=>$id_usuario,
                    'id_especialidad'=>$id_especialidad,
                    'id_tipo_especialidad'=>$id_tipo_especialidad,
                    'id_sub_tipo_especialidad'=>$id_sub_tipo_especialidad,
                    'supersalud'=>$supersalud,
                    'contactado'=>$contactado,
                    'otro'=>$otro,
            ));
        }

        return $datos;
    }
}
