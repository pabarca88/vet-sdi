<?php
namespace App\Http\Controllers;

use App\Models\Direccion;
use App\Models\Paciente;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class AsistenteController extends Controller
{
    public function index(){
        $code = Crypt::encryptString(Auth::user()->email);
        return view('template.asistenteLabTemplate',['code' => $code]);
    }

    public function getPacientes(){
        $pacientes = Paciente::all();
        foreach ($pacientes as $p) {
            $previcion = $p->Prevision()->first()->nombre;
            $direccion = $p->Direccion()->first();
            $formatDirection = $direccion->direccion.' #'.$direccion->numero_dir.', '.$direccion->Ciudad()->first()->nombre;
            $p->Previcion = $previcion;
            $p->Direccion = $formatDirection;
        }
        $data = [
            'pacientes' => $pacientes
        ];
        return json_encode($data);
    }

    public function AgregarNuevoPaciente(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if($valido)
        {
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
                $direccion->id_ciudad = $request->id_ciudad;
                $direccion->save();

                $paciente = new Paciente();
				$paciente->token = md5(uniqid());
                $paciente->rut = $request->rut;
                $paciente->nombres = $request->nombres;
                $paciente->apellido_uno = $request->apellido_uno;
                $paciente->apellido_dos = $request->apellido_dos;
                $paciente->sexo = $request->sexo;

                if (strpos($request->reserva_hora_fecha_nac, '/') !== false) {
                    // Si la fecha tiene el formato dd/mm/yyyy
                    $fechaConvertida = Carbon::createFromFormat('d/m/Y', $request->reserva_hora_fecha_nac)->format('Y-m-d');
                } else {
                    // Si ya está en formato yyyy-mm-dd
					if(!empty($request->reserva_hora_fecha_nac))
						$fechaConvertida = Carbon::createFromFormat('Y-m-d', $request->reserva_hora_fecha_nac)->format('Y-m-d');
					if(!empty($request->fecha_nac))
						$fechaConvertida = Carbon::createFromFormat('Y-m-d', $request->fecha_nac)->format('Y-m-d');
				
                }
                $paciente->fecha_nac = $fechaConvertida;
                $paciente->id_prevision = $request->id_prevision;
                $paciente->email = $request->email;
                $paciente->telefono_uno = $request->telefono_uno;
                $paciente->id_direccion = $direccion->id;
                if($paciente->save())
                {
                    $datos['estado'] = 1;
                    $datos['msj'] = 'Paciente creado.';

                    $pacienteFinal = Paciente::find($paciente->id);

                    /** CREACION DE USUARIO  */
                    $user = User::where('email', $request->email)->first();
                    if($user == NULL)
                    {
                        $user = new User();
                        $user->name = $request->nombres_paciente . ' ' .$request->apellido_uno . ' ' .$request->apellido_dos;
                        $user->email = $request->email;
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
                                        array('email' => $request->email,'name' => $request->nombres_paciente . ' ' .$request->apellido_uno . ' ' .$request->apellido_dos),
                                    );
                                $cc = array();
                                $bcc = array();
                                $asunto = 'MED-SDI - Bienvenido!';
                                $body = array(
                                            'nombre'=>$request->nombres_paciente . ' ' .$request->apellido_uno . ' ' .$request->apellido_dos,
                                            'user' => $request->email,
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
                    $datos['estado'] = 0;
                    $datos['msj'] = 'Problema a crear el Paciente.';
                }
            }
            else
            {
                $pacienteFinal = $validacion_rut;
            }
            $datos['paciente_final'] = $pacienteFinal->id;
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campos requeridos';
            $datos['error'] = $error;
        }

        return $datos;
    }

    public function AgregarNuevoPacientePrereserva(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if($valido)
        {
            /** CREAR PACIENTE */
            $pacienteFinal = '';
            /** valida rut */
            $validacion_rut = Paciente::where('rut', $request->rut)->first();
            if(!$validacion_rut)
            {
                /** creo paciente */
                $paciente = new Paciente();
                $paciente->rut = $request->rut;
                $paciente->nombres = $request->nombres;
                $paciente->apellido_uno = $request->apellido_uno;
                $paciente->apellido_dos = $request->apellido_dos;
                $paciente->sexo = 'M';

                $paciente->id_prevision = 1;
                $paciente->email = $request->email;
                $paciente->telefono_uno = $request->telefono_uno;

                if($paciente->save())
                {
                    $datos['estado'] = 1;
                    $datos['msj'] = 'Paciente creado.';

                    $pacienteFinal = Paciente::find($paciente->id);
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'Problema a crear el Paciente.';
                }
            }
            else
            {
                $pacienteFinal = $validacion_rut;
            }
            $datos['paciente_final'] = $pacienteFinal->id;
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
