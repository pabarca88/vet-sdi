<?php

namespace App\Http\Controllers;

use App\Models\Acompanante;
use App\Models\AcompananteDependiente;
use App\Models\Asistente;
use App\Models\Direccion;
use App\Models\Paciente;
use App\Models\PacientesDependientes;
use App\Models\Prevision;
use App\Models\Profesional;
use App\Models\Region;
use App\Models\TipoDependencia;
use App\Models\User;
use App\Models\FichaAtencion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EscritorioDependientesController extends Controller
{
    /** dependencia definitiva */
    public function verDependiente(Request $request)
    {

        if(!empty($request->tipo_dependencia))
        {
            if(gettype($request->tipo_dependencia) == 'string')
                $lista = explode(',',$request->tipo_dependencia);
            else
                $lista = $request->tipo_dependencia;

            $tipo_dpendencia = TipoDependencia::whereIn('id', $lista)->get();
            if($tipo_dpendencia)
            {
                $dependencia = 0;
                $tipo = array();
                foreach ($tipo_dpendencia as $key => $value) {
                    array_push($tipo, $value->id);
                    $dependencia = $value->tipo;
                }

                $paciente = Paciente::where('id_usuario', Auth::user()->id)->first();
                $registros = PacientesDependientes::whereIn('tipo_dependencia', $tipo)
                                                    // ->with('Responsable')
                                                    ->with('Paciente')
                                                    // ->with('Relacion')
                                                    ->with('Tipodependencia')
                                                    ->where('id_responsable',$paciente->id)
                                                    ->get();

                foreach ($registros as $key_2 => $value_2)
                {
                    $filtro_temp = array();
                    $filtro_temp[] = array('id_dependiente', $value_2->id_paciente);
                    $registro_depen = AcompananteDependiente::where($filtro_temp)->where('id_tipo', 1)->with('acompanante');
                    $registro_temp = AcompananteDependiente::where('id_responsable', $value_2->id_responsable)->whereNull('id_dependiente')->where('id_tipo', 2)->with('acompanante')->union($registro_depen)->get();
                    $registros[$key_2]['acompanante'] = $registro_temp;
                }

                $prevision = Prevision::all();
                $region = Region::all();
                $titulo = '';
                if($dependencia == 1) $titulo = 'Menor Edad';
                if($dependencia == 2) $titulo = 'Mayor Edad';

                return view('app.paciente.dependientes')->with([
                    'titulo' => $titulo,
                    'registros' => $registros,
                    'dependencia' => $dependencia,
                    'tipo_dependencias' => $request->tipo_dependencia,
                    'prevision' => $prevision,
                    'region' => $region,
                    'paciente' => $paciente,
                    'fichasMascota' => FichaAtencion::where('id_paciente', 3)->orderBy('id', 'desc')->get(),

                ]);

            }
        }
        else
        {
            back()->with('error', 'Debe indicar tipo de Dependiente, (Adulto, Infante)');
        }

    }

    /** dependencia temporal */
    public function verDependienteAdultoTemporales(Request $request)
    {
        if(!empty($request->tipo_dependencia))
        {
            if(gettype($request->tipo_dependencia) == 'string')
                $lista = explode(',',$request->tipo_dependencia);
            else
                $lista = $request->tipo_dependencia;

            $tipo_dpendencia = TipoDependencia::whereIn('id', $lista)->get();
            if($tipo_dpendencia)
            {
                $dependencia = 0;
                $tipo = array();
                foreach ($tipo_dpendencia as $key => $value) {
                    $dependencia = $value->tipo;
                    array_push($tipo, $value->id);
                }

                $paciente = Paciente::where('id_usuario', Auth::user()->id)->first();
                $registros = PacientesDependientes::whereIn('tipo_dependencia', $tipo)
                                                    // ->with('Responsable')
                                                    ->with('Paciente')
                                                    // ->with('Relacion')
                                                    ->with('Tipodependencia')
                                                    ->where('id_responsable',$paciente->id)
                                                    ->get();
                $prevision = Prevision::all();
                $region = Region::all();

                $titulo = '';
                if($dependencia == 1) $titulo = 'Menor Edad';
                if($dependencia == 2) $titulo = 'Mayor Edad';

                return view('app.paciente.dependientes')->with([
                    'titulo' => $titulo,
                    'registros' => $registros,
                    'dependencia' => $dependencia,
                    'tipo_dependencias' => $request->tipo_dependencia,
                    'prevision' => $prevision,
                    'region' => $region,
                    'fichasMascota' => FichaAtencion::where('id_paciente', 3)->orderBy('id', 'desc')->get(),
                ]);
            }
        }
        else
        {
            back()->with('error', 'Debe indicar tipo de Dependiente, (Adulto, Infante)');
        }
    }



    public function registrarDepPacienteExistente(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_paciente))
        {
            $error['id_paciente'] = 'campo requerido';
        }
        if(empty($request->relacion))
        {
            $error['relacion'] = 'campo requerido';
        }
        if(empty($request->tipo_dependencia))
        {
            $error['tipo_dependencia'] = 'campo requerido';
        }
        // if(empty($request->fecha_inicio))
        // {
        //     $error['fecha_inicio'] = 'campo requerido';
        // }
        // if(empty($request->fecha_termino))
        // {
        //     $error['fecha_termino'] = 'campo requerido';
        // }
        // if(empty($request->comentario))
        // {
        //     $error['comentario'] = 'campo requerido';
        // }
        // if(empty($request->confirmacion_inscripcion))
        // {
        //     $error['confirmacion_inscripcion'] = 'campo requerido';
        // }
        // if(empty($request->id_log_users_devices))
        // {
        //     $error['id_log_users_devices'] = 'campo requerido';
        // }
        // if(empty($request->otro))
        // {
        //     $error['otro'] = 'campo requerido';
        // }
        // if(empty($request->id_user))
        // {
        //     $error['id_user'] = 'campo requerido';
        // }
        // if(empty($request->estado))
        // {
        //     $error['estado'] = 'campo requerido';
        // }


        if($valido)
        {
            /** validar paciente ya dependiente */
            $paciente = Paciente::where('id_usuario', Auth::user()->id)->first();

            $busqueda = PacientesDependientes::where('id_paciente',$request->id_paciente)->where('id_responsable',$paciente->id)->first();
            if(!$busqueda)
            {
                $registro = new PacientesDependientes();

                $paciente = Paciente::where('id_usuario', Auth::user()->id)->first();

                $registro->id_responsable = $paciente->id;
                $registro->id_paciente = $request->id_paciente;
                $registro->relacion = $request->relacion;
                $registro->tipo_dependencia = $request->tipo_dependencia;

                if($request->tipo_dependencia == 3)
                {
                    $registro->fecha_inicio = $request->fecha_inicio;
                    $registro->fecha_termino = $request->fecha_termino;
                }
                else
                {
                    $registro->fecha_inicio = date('Y-m-d');
                }

                $registro->comentario = $request->comentario;
                // $registro->confirmacion_inscripcion = $request->confirmacion_inscripcion;
                // $registro->id_log_users_devices = $request->id_log_users_devices;
                $registro->otro = $request->otro;
                $registro->id_user = Auth::user()->id;
                $registro->estado = 1;

                if($registro->save())
                {
                    $datos['estado'] = 1;
                    $datos['msj'] = 'registro exitoso';
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'Problemas al registro';
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Paciente Dependiente ya existente';
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

    public function registroDepPacienteNuevo(Request $request )
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->rut))
        {
            $error['rut'] = 'Campo requerido';
            $valido = 0;
        }
        if(empty($request->nombres_paciente))
        {
            $error['nombres_paciente'] = 'Campo requerido';
            $valido = 0;
        }
        if(empty($request->apellido_uno))
        {
            $error['apellido_uno'] = 'Campo requerido';
            $valido = 0;
        }
        if(empty($request->apellido_dos))
        {
            $error['apellido_dos'] = 'Campo requerido';
            $valido = 0;
        }
        if(empty($request->fecha_nac))
        {
            $error['fecha_nac'] = 'Campo requerido';
            $valido = 0;
        }
        else
        {
            /** mayor de edad */
            if( (\Carbon\Carbon::parse($request->fecha_nac)->age) > 17)
            {
                if(empty($request->correo))
                {
                    $error['correo'] = 'Campo requerido';
                    $valido = 0;
                }
                if(empty($request->telefono_uno))
                {
                    $error['telefono_uno'] = 'Campo requerido';
                    $valido = 0;
                }
            }
        }

        if(empty($request->sexo))
        {
            $error['sexo'] = 'Campo requerido';
            $valido = 0;
        }
        if(empty($request->convenio))
        {
            $error['convenio'] = 'Campo requerido';
            $valido = 0;
        }
        if(empty($request->direccion))
        {
            $error['direccion'] = 'Campo requerido';
            $valido = 0;
        }
        if(empty($request->numero_dir))
        {
            $error['numero_dir'] = 'Campo requerido';
            $valido = 0;
        }
        if(empty($request->region))
        {
            $error['region'] = 'Campo requerido';
            $valido = 0;
        }
        if(empty($request->ciudad))
        {
            $error['ciudad'] = 'Campo requerido';
            $valido = 0;
        }

        if(empty($request->relacion))
        {
            $error['relacion'] = 'Campo requerido';
            $valido = 0;
        }
        if(empty($request->tipo_dependencia))
        {
            $error['tipo_dependencia'] = 'Campo requerido';
            $valido = 0;
        }
        // if(empty($request->fecha_inicio))
        // {
        //     $error['fecha_inicio'] = 'Campo requerido';
        //     $valido = 0;
        // }
        // if(empty($request->fecha_termino))
        // {
        //     $error['fecha_termino'] = 'Campo requerido';
        //     $valido = 0;
        // }
        // if(empty($request->comentario))
        // {
        //     $error['comentario'] = 'Campo requerido';
        //     $valido = 0;
        // }
        // if(empty($request->otro))
        // {
        //     $error['otro'] = 'Campo requerido';
        //     $valido = 0;
        // }

        if($valido)
        {
            $paciente = Paciente::where('id_usuario', Auth::user()->id)->first();

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

                $paciente_dep = new Paciente();
				$paciente_dep->token = md5(uniqid());
                $paciente_dep->rut = $request->rut;
                $paciente_dep->nombres = $request->nombres_paciente;
                $paciente_dep->apellido_uno = $request->apellido_uno;
                $paciente_dep->apellido_dos = $request->apellido_dos;
                $paciente_dep->sexo = $request->sexo;
                $paciente_dep->profesion = $request->reserva_hora_profesion;
                $paciente_dep->fecha_nac = $request->fecha_nac;
                $paciente_dep->id_prevision = $request->convenio;

                if(empty($request->correo))
                {
                    $permitted_chars = '#\qwertyuiopasdfghjkklzxcvbnm123467890ABCDEFGHIJKLMNOPQRSTUVWXYZ&=';
                    $temp = substr(str_shuffle($permitted_chars), 0, 10);
                    // $paciente_dep->email = $paciente->email = $temp.'@med-sdi.cl';
                    $paciente_dep->email = $paciente->email = PacienteController::generarEmailPacienteTemporal($request->nombres_paciente,$request->apellido_uno,$request->apellido_dos);
                }
                else
                    $paciente_dep->email = $request->correo;

                if(empty($request->telefono_uno))
                    $paciente_dep->telefono_uno = $paciente->telefono_uno;
                else
                    $paciente_dep->telefono_uno = $request->telefono_uno;

                $paciente_dep->id_direccion = $direccion->id;

                if($paciente_dep->save())
                {
                    $datos['paciente']['estado'] = 1;
                    $datos['paciente']['msj'] = 'Paciente creado.';

                    /** mayor edad genera usuario */
                    if( (\Carbon\Carbon::parse($request->fecha_nac)->age) > 17)
                    {
                        if(!empty($request->correo))
                        {
                            $user = User::where('email', $request->correo)->first();
                            if($user == NULL)
                            {
                                $user = new User();
                                $user->name = $request->nombres_paciente . ' ' .$request->apellido_uno . ' ' .$request->apellido_dos;
                                $user->email = $request->correo;
                                $user->password = Hash::make(random_int(1111,9999));

                                if($user->save())
                                {
                                    $user->assignRole('Paciente');

                                    $paciente_dep->id_usuario = $user->id;
                                    if($paciente_dep->save())
                                    {
                                        $datos['user']['update_paciente'] = 'Paciente actualizado con Usuario.';
                                    }

                                    /** envio de correo de confirmacion  */
                                    $blade = 'bienvenida_paciente';
                                    $to = array(
                                            array('email' => $request->correo,'name' => $request->nombres_paciente . ' ' .$request->apellido_uno . ' ' .$request->apellido_dos),
                                        );
                                    $cc = array();
                                    $bcc = array();
                                    $asunto = 'MED-SDI - Bienvenido!';
                                    $body = array('nombre'=>$request->nombres_paciente . ' ' .$request->apellido_uno . ' ' .$request->apellido_dos);
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

                                    $datos['user']['estado'] = 1;
                                    $datos['user']['msj'] = 'Usuario creado.';
                                }
                                else
                                {
                                    $datos['user']['estado'] = 0;
                                    $datos['user']['msj'] = 'Problema al registrar Usuario.';
                                }
                            }
                            else
                            {
                                $datos['user']['estado'] = 0;
                                $datos['user']['msj'] = 'Correo utilizado en otro usuario.';
                            }
                        }
                        else
                        {
                            $datos['user']['estado'] = 0;
                            $datos['user']['msj'] = 'Correo en blanco.';
                        }

                    }

                    /** reidtro de dependencia  */
                    $registro = new PacientesDependientes();

                    $registro->id_responsable = $paciente->id;
                    $registro->id_paciente = $paciente_dep->id;
                    $registro->relacion = $request->relacion;
                    $registro->tipo_dependencia = $request->tipo_dependencia;

                    /** Menor de Edad Temporal */
                    if($request->tipo_dependencia == 2)
                    {
                        $registro->fecha_inicio = $request->fecha_inicio;
                        $registro->fecha_termino = $request->fecha_termino;
                    }
                    else
                    {
                        $registro->fecha_inicio = date('Y-m-d');
                    }

                    $registro->comentario = $request->comentario;
                    // $registro->confirmacion_inscripcion = $request->confirmacion_inscripcion;
                    // $registro->id_log_users_devices = $request->id_log_users_devices;
                    $registro->otro = $request->otro;
                    $registro->id_user = Auth::user()->id;
                    $registro->estado = 1;

                    if($registro->save())
                    {
                        $datos['estado'] = 1;
                        $datos['msj'] = 'Dependencia creada con exito.';
                    }
                    else
                    {
                        $datos['estado'] = 0;
                        $datos['msj'] = 'Problemas en el registro de Dependencia.';
                    }
                }
                else
                {
                    $datos['paciente']['estado'] = 0;
                    $datos['paciente']['msj'] = 'Problema a crear el Paciente.';
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Rut ya registrado como paciente.';
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


    public function buscar_persona_rut(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->rut))
        {
            $error['RUT'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $registro = '';

            $acompanante = Acompanante::where('rut', $request->rut)->first();

            $paciente = Paciente::where('rut', $request->rut)->first();
            if(empty($paciente))
            {
                $asistente = Asistente::where('rut', $request->rut)->first();
                if(empty($asistente))
                {
                    $profesional = Profesional::where('rut', $request->rut)->first();
                    if(empty($profesional))
                    {
                        $registro = '';
                    }
                    else
                    {
                        $registro = array(
                            'id' => $profesional->id,
                            'rut' => $profesional->rut,
                            'nombre' => $profesional->nombre,
                            'apellido_paterno' => $profesional->apellido_uno,
                            'apellido_materno' => $profesional->apellido_dos,
                            'email' => $profesional->email,
                            'tipo' => 'profesional',
                        );// $profesional;
                    }
                }
                else
                {
                    $registro = array(
                        'id' => $asistente->id,
                        'rut' => $asistente->rut,
                        'nombre' => $asistente->nombre,
                        'apellido_paterno' => $asistente->apellido_uno,
                        'apellido_materno' => $asistente->apellido_dos,
                        'email' => $asistente->email,
                        'tipo' => 'asistente',
                    );// $asistente;
                }
            }
            else
            {
                $registro = array(
                    'id' => $paciente->id,
                    'rut' => $paciente->rut,
                    'nombre' => $paciente->nombres,
                    'apellido_paterno' => $paciente->apellido_uno,
                    'apellido_materno' => $paciente->apellido_dos,
                    'email' => $paciente->email,
                    'tipo' => 'paciente',
                );// $paciente;
            }

            if(is_array($registro))
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

        return $datos;
    }

}
