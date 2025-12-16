<?php

namespace App\Http\Controllers;

use App\Models\Acompanante;
use App\Models\AcompananteDependiente;
use Illuminate\Http\Request;

class AcompananteController extends Controller
{
    public function verRegistros(Request $request)
    {
        $data = array();
        $filtro = array();
        $error = array();
        $valido = 1;
        $result = '';

        if(empty($request->id_responsable))
        {
            $erro['id_responsable'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $filtro[] = array('id_responsable', $request->id_responsable);
            // $filtro[] = array('id_tipo', $request->id_tipo);
            // $filtro[] = array('id_dependiente', $request->id_dependiente);

            if(!empty($request->id_dependiente))
            {
                $filtro[] = array('id_dependiente', $request->id_dependiente);
                $registro_depen = AcompananteDependiente::where($filtro)->where('id_tipo', 1)->with('acompanante');
                $registro_temp = AcompananteDependiente::where('id_responsable', $request->id_responsable)->whereNull('id_dependiente')->where('id_tipo', 2)->with('acompanante')->union($registro_depen)->get();
            }
            else
            {
                $registro_temp = AcompananteDependiente::where('id_responsable', $request->id_responsable)->where('id_tipo', [1,2])->get();
            }

            $result = $registro_temp;

            if($result)
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registro';
                $datos['registros'] = $result;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Sin registro';
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

    public function registraAcompanante_r(Request $request)
    {
        return $this->registraAcompanante($request->rut, $request->numero_documento, $request->nombre, $request->apellido_uno, $request->apellido_dos, $request->email);
    }

    public function registraAcompanante($rut, $numero_documento, $nombre, $apellido_uno, $apellido_dos, $email)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($rut))
        {
            $error['RUT'] = 'campo requerido';
            $valido = 0;
        }

        // if(empty($numero_documento))
        // {
        //     $error['NUMERO DOCUMENTO'] = 'campo requerido';
        //     $valido = 0;
        // }

        if(empty($nombre))
        {
            $error['NOMBRE'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($apellido_uno))
        {
            $error['APELLIDO PATERNO'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($apellido_dos))
        {
            $error['APELLIDO MATERNO'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($email))
        {
            $error['EMAIL'] = 'campo requerido';
            $valido = 0;
        }


        if($valido)
        {
            $registro = new Acompanante();
            $registro->rut = $rut;
            $registro->numero_documento = $numero_documento;
            $registro->nombre = $nombre;
            $registro->apellido_uno = $apellido_uno;
            $registro->apellido_dos = $apellido_dos;
            $registro->email = $email;

            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registro';
                $datos['last_id'] = $registro->id;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'falla en registro';
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

    public function modificarAcompanante(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id))
        {
            $error['ID'] = 'campo  requerido';
            $valido = 0;
        }

        if($valido)
        {
            $registro = Acompanante::find($request->id);
            if($registro)
            {
                if(!empty($request->rut))
                    $registro->rut = $request->rut;
                // if(!empty($request->numero_documento))
                    $registro->numero_documento = $request->numero_documento;
                if(!empty($request->nombre))
                    $registro->nombre = $request->nombre;
                if(!empty($request->apellido_uno))
                    $registro->apellido_uno = $request->apellido_uno;
                if(!empty($request->apellido_dos))
                    $registro->apellido_dos = $request->apellido_dos;
                if(!empty($request->email))
                    $registro->email = $request->email;

                if($registro->save())
                {
                    $datos['estado'] = 1;
                    $datos['msj'] = 'registro';
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'falla en registro';
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

    public function asignacionAcompanantePaciente($id_responsable, $id_tipo, $id_dependiente, $id_acompanante)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($id_responsable))
        {
            $error['id_responsable'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($id_tipo))
        {
            $error['id_tipo'] = 'campo requerido';
            $valido = 0;
        }
        else
        {
            if($id_tipo == 1)//Solo para este Paciente Dependiente
            {
                if(empty($id_dependiente))
                {
                    $error['id_dependiente'] = 'campo requerido';
                    $valido = 0;
                }
            }
            // else if($id_tipo == 2)//Para Todos mis Pacientes Dependientes
            // {
            // }
        }

        if(empty($id_acompanante))
        {
            $error['id_acompanante'] = 'campo requerido';
            $valido = 0;
        }


        if($valido)
        {
            $registro = new AcompananteDependiente();
            $registro->id_responsable = $id_responsable;
            $registro->id_tipo = $id_tipo;

            if($id_tipo == 1)//Solo para este Paciente Dependiente
                $registro->id_dependiente = $id_dependiente;
            else if($id_tipo == 2)//Para Todos mis Pacientes Dependientes
                $registro->id_dependiente = null;

            $registro->id_acompanante = $id_acompanante;

            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registro';
                $datos['last_id'] = $registro->id;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'falla';
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

    public function registrarAcompananteAsignacionPaciente(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if($valido)
        {
            /** BUSCANDO ACOMPAÑANTE EXISTENTE */
            $registroAcompanante = Acompanante::where('rut', $request->rut)->first();
            if(!$registroAcompanante)
                $registroAcompanante = (object) $this->registraAcompanante($request->rut, $request->numero_documento, $request->nombre, $request->apellido_uno, $request->apellido_dos, $request->email);

            if($registroAcompanante->estado)
            {
                $datos['msj'] = 'acompañante';
                $datos['acompananate'] = $registroAcompanante;
                // if($request->id_tipo != '')
                {
                    $datos['estado'] = 1;

                    /** REGISTRO DE ACOMPAÑANA DEPENDIENTE */
                    $registro_asignacion_paciente = (object) $this->asignacionAcompanantePaciente($request->id_responsable, $request->id_tipo, $request->id_dependiente, $registroAcompanante->last_id);

                    if($registro_asignacion_paciente->estado)
                    {
                        $datos['asignacion_paciente']['estado'] = 1;
                        $datos['asignacion_paciente']['msj'] = 'asignacion paciente';
                    }
                    else
                    {
                        $datos['asignacion_paciente']['estado'] = 0;
                        $datos['asignacion_paciente']['msj'] = 'falla asignacion paciente';
                        $datos['asignacion_paciente']['result'] = $registro_asignacion_paciente;
                    }
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'problema con el acompañante';
                $datos['acompanante'] = $registroAcompanante;
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
