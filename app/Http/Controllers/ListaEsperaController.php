<?php

namespace App\Http\Controllers;

use App\Models\Asistente;
use App\Models\Direccion;
use App\Models\Instituciones;
use App\Models\ListaEspera;
use App\Models\Paciente;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ListaEsperaController extends Controller
{
    public function buscarListaPorProfesional(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;


        if(empty($request->id_lugar_atencion))
        {
            $error['id_lugar_atencion'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_profesional))
        {
            $error['id_profesional'] = 'campo requerido';
            $valido = 0;
        }
        // if(empty($request->id_institucion))
        // {
        //     $error['id_institucion'] = 'campo requerido';
        //     $valido = 0;
        // }
        // if(empty($request->id_paciente))
        // {
        //     $error['id_paciente'] = 'campo requerido';
        //     $valido = 0;
        // }

        if($valido)
        {

            $filtros = array();
            if(!empty($request->id_institucion))
                $filtros[] = array('id_institucion', $request->id_institucion);
            if(!empty($request->id_paciente))
                $filtros[] = array('id_paciente', $request->id_paciente);

            $filtros[] = array('id_lugar_atencion', $request->id_lugar_atencion);
            $filtros[] = array('id_profesional', $request->id_profesional);

            $registros = ListaEspera::with('Institucion')
                                    ->with('LugarAtencion')
                                    ->with('Asistente')
                                    ->with('Profesional')
                                    ->with('Paciente')
                                    ->where($filtros)
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
                $datos['msj'] = 'sin registros';
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
            $registro = ListaEspera::with('Institucion')
                                    ->with('LugarAtencion')
                                    ->with('Asistente')
                                    ->with('Profesional')
                                    ->with('Paciente')
                                    ->find($request->id);

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
            $datos['msj'] = 'campos requeridos';
            $datos['error'] = $error;
        }
        return $datos;
    }

    public function registrarExistente(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        // if(empty($request->id_institucion))
        // {
        //     $error['id_institucion'] = 'campo requerido';
        //     $valido = 0;
        // }
        if(empty($request->id_lugar_atencion))
        {
            $error['id_lugar_atencion'] = 'campo requerido';
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

        if($valido)
        {
            $institucion = '';
            if(empty($request->id_institucion))
            {
                $institucion = Instituciones::where('id_lugar_atencion', $request->id_lugar_atencion)->first();
            }
            /** INFO ASISTENTE */
            $asistente = Asistente::where('id_usuario', Auth::user()->id )->first();

            $registro = new ListaEspera();

            if($institucion)
                $registro->id_institucion = $institucion->id;

            $registro->id_lugar_atencion = $request->id_lugar_atencion;
            if($asistente)
                $registro->id_asistente = $asistente->id;
            else
                $registro->id_asistente = 2;
            $registro->id_profesional = $request->id_profesional;
            $registro->id_paciente = $request->id_paciente;
            $registro->observacion = $request->observacion;
            $registro->estado = 1;

            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registro exitoso';
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'falla registros';
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

    public function registrarNuevo(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_lugar_atencion))
        {
            $error['id_lugar_atencion'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_profesional))
        {
            $error['id_profesional'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->rut))
        {
            $error['rut'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->nombres))
        {
            $error['nombres'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->apellido_uno))
        {
            $error['apellido_uno'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->apellido_dos))
        {
            $error['apellido_dos'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->fecha_nac))
        {
            $error['fecha_nac'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->sexo))
        {
            $error['sexo'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->convenio))
        {
            $error['convenio'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->direccion))
        {
            $error['direccion'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->numero_dir))
        {
            $error['numero_dir'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->region))
        {
            $error['region'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->ciudad))
        {
            $error['ciudad'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->correo))
        {
            $error['correo'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->telefono_uno))
        {
            $error['telefono_uno'] = 'campo requerido';
            $valido = 0;
        }


        if($valido)
        {
            $institucion = '';
            if(empty($request->id_institucion))
            {
                $institucion = Instituciones::where('id_lugar_atencion', $request->id_lugar_atencion)->first();
            }
            /** INFO ASISTENTE */
            $asistente = Asistente::where('id_usuario', Auth::user()->id )->first();

            /** CREAR PACIENTE */
            $pacienteFinal = '';
            /** valida rut */
            $validacion_rut = Paciente::where('rut', $request->rut)->first();
            if(!$validacion_rut)
            {
                /** creo paciente */
                $direccion = new Direccion();
                $direccion->direccion = $request->direccion;
                $direccion->numero_dir = $request->numero_dir;
                $direccion->id_ciudad = $request->ciudad;
                $direccion->save();

                $paciente = new Paciente();
				$paciente->token = md5(uniqid());
                $paciente->rut = $request->rut;
                $paciente->nombres = $request->nombres;
                $paciente->apellido_uno = $request->apellido_uno;
                $paciente->apellido_dos = $request->apellido_dos;
                $paciente->sexo = $request->sexo;
                $paciente->fecha_nac = $request->fecha_nac;
                $paciente->id_prevision = $request->convenio;
                $paciente->email = $request->correo;
                $paciente->telefono_uno = $request->telefono_uno;
                $paciente->id_direccion = $direccion->id;
                if($paciente->save())
                {
                    $datos['paciente']['estado'] = 1;
                    $datos['paciente']['msj'] = 'Paciente creado.';

                    $pacienteFinal = Paciente::find($paciente->id);

                    /** CREACION DE USUARIO  */
                    $user = User::where('email', $request->correo)->first();
                    if($user == NULL)
                    {
                        $user = new User();
                        $user->name = $request->nombres_paciente . ' ' .$request->apellido_uno . ' ' .$request->apellido_dos;
                        $user->email = $request->correo;
                        $pass_temp = random_int(1111,9999);
                        $user->password = Hash::make($pass_temp);

                        if($user->save())
                        {
                            $user->assignRole('Paciente');
                            $paciente->id_usuario = $user->id;
                            if($paciente->save())
                            {
                                $datos['user']['update_paciente'] = 'Paciente actualizado con Usuario.';

                                /** envio de correo de confirmacion  */
                                $blade = 'bienvenida_paciente_usuario';
                                $to = array(
                                        array('email' => $request->correo,'name' => $request->nombres_paciente . ' ' .$request->apellido_uno . ' ' .$request->apellido_dos),
                                    );
                                $cc = array();
                                $bcc = array();
                                $asunto = 'MED-SDI - Bienvenido!';
                                $body = array(
                                            'nombre'=>$request->nombres_paciente . ' ' .$request->apellido_uno . ' ' .$request->apellido_dos,
                                            'user' => $request->correo,
                                            'pass' => $pass_temp
                                            );
                                $archivo = '';/** pendiente */
                                $id_institucion = '';

                                $result_mail =  SendMailController::envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, $id_institucion);

                                if($result_mail['estado'])
                                {
                                    $datos['user']['mail']['estado'] = 1;
                                    $datos['user']['mail']['msj'] = 'Notificacion de bienvenida enviado';
                                }
                                else
                                {
                                    $datos['user']['mail']['estado'] = 0;
                                    $datos['user']['mail']['msj'] = 'Falle en envio de Notificacion de bienvenida';
                                }
                                /** cerrar envio de correo de confirmacion  */
                            }
                        }
                    }
                    else
                    {
                        $user->assignRole('Paciente');
                        $paciente->id_usuario = $user->id;
                        if($paciente->save())
                        {
                            $datos['user']['update_paciente'] = 'Paciente actualizado con Usuario.';
                        }
                    }
                    /** CIERRE CREACION DE USUARIO  */
                }
                else
                {
                    $datos['paciente']['estado'] = 0;
                    $datos['paciente']['msj'] = 'Problema a crear el Paciente.';
                }
            }
            else
            {
                $pacienteFinal = $validacion_rut;
            }
            /** CIERRE CREAR PACIENTE */

            if($pacienteFinal != '')
            {
                $registro = new ListaEspera();
                $registro->id_institucion = $institucion->id;
                $registro->id_lugar_atencion = $request->id_lugar_atencion;
                if($asistente)
                    $registro->id_asistente = $asistente->id;
                else
                    $registro->id_asistente = 2;
                $registro->id_profesional = $request->id_profesional;
                $registro->id_paciente = $pacienteFinal->id;
                $registro->observacion = $request->observacion;
                $registro->estado = 1;

                if($registro->save())
                {
                    $datos['estado'] = 1;
                    $datos['msj'] = 'registro exitoso';
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'falla registros';
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Falta de paciente';
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

    public function eliminar(Request $request)
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
            if(ListaEspera::find($request->id)->delete())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'Eliminado';
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Problema al eliminar';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Campos requeridos';
        }

        return $datos;
    }
}
