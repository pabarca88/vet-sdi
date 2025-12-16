<?php

namespace App\Http\Controllers;

use App\Models\AcompananteDependiente;
use App\Models\Paciente;
use App\Models\PacientesDependientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PacientesDependientesController extends Controller
{

    public function registrar_r(Request $request)
    {
        return static::registrar($request->id_responsable,$request->id_paciente,$request->id_relacion,$request->tipo_dependencia,$request->fecha_inicio,$request->comentario,$request->otro,Auth::user()->id);
    }

    static public function registrar($id_responsable,$id_paciente,$id_relacion,$tipo_dependencia,$fecha_inicio,$comentario,$otro,$id_user)
    {

        $datos = array();
        $error = array();
        $valido = 1;

        // id_responsable
        // id_paciente
        // id_relacion
        // tipo_dependencia
        // fecha_inicio
        // fecha_termino
        // comentario
        // confirmacion_inscripcion
        // id_log_users_devices
        // otro
        // id_user
        // estado

        if(empty($id_responsable))
        {
            $error['id_responsable'] = 'campo requerido';
        }
        if(empty($id_paciente))
        {
            $error['id_paciente'] = 'campo requerido';
        }
        if(empty($id_relacion))
        {
            $error['id_relacion'] = 'campo requerido';
        }
        if(empty($tipo_dependencia))
        {
            $error['tipo_dependencia'] = 'campo requerido';
        }
        // if(empty($fecha_inicio))
        // {
        //     $error['fecha_inicio'] = 'campo requerido';
        // }
        // if(empty($fecha_termino))
        // {
        //     $error['fecha_termino'] = 'campo requerido';
        // }
        if(empty($comentario))
        {
            $error['comentario'] = 'campo requerido';
        }
        // if(empty($otro))
        // {
        //     $error['otro'] = 'campo requerido';
        // }
        if(empty($id_user))
        {
            $error['id_user'] = 'campo requerido';
        }
        // if(empty($estado))
        // {
        //     $error['estado'] = 'campo requerido';
        // }

        if($valido)
        {
            $registros = new PacientesDependientes();
            $registros->id_responsable = $id_responsable;
            $registros->id_paciente = $id_paciente;
            $registros->id_relacion = $id_relacion;
            $registros->tipo_dependencia = $tipo_dependencia;
            if(!empty($fecha_inicio))
                $registros->fecha_inicio = $fecha_inicio;
            else
                $registros->fecha_inicio = date('Y-m-d');
            if(!empty($fecha_termino))
                $registros->fecha_termino = $fecha_termino;
            $registros->comentario = $comentario;
            // $registros->confirmacion_inscripcion = $confirmacion_inscripcion;
            // $registros->id_log_users_devices = $id_log_users_devices;
            $registros->otro = $otro;
            $registros->id_user = $id_user;
            $registros->estado = 1;
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campo requerido';
            $datos['error'] = $error;
        }

        return $datos;

    }

    public function ver_registro_paciente(Request $request)
    {
        $datos = array();

        $paciente = Paciente::where('id_usuario', Auth::user()->id)->first();
        if($paciente)
        {
            $filtro = array();
            // if(!empty($request->id_responsable))
            {

                $filtro[] = array('id_responsable', $paciente->id);
            }
            if(!empty($request->id_paciente))
            {
                $filtro[] = array('id_paciente', $request->id_paciente);
            }
            if(!empty($request->id_relacion))
            {
                $filtro[] = array('id_relacion', $request->id_relacion);
            }
            // if(!empty($request->tipo_dependencia))
            // {
            //     $filtro[] = array('tipo_dependencia', $request->tipo_dependencia);
            // }

            $registros = PacientesDependientes::where($filtro)
                                                ->with('Paciente')
                                                ->with('Tipodependencia')
                                                ->tipoDependencia($request->tipo_dependencia)
                                                ->get();

            if($registros)
            {
                foreach ($registros as $key => $value)
                {
                    $filtro_2 = array();
                    $filtro_2[] = array('id_dependiente', $value->id_paciente);
                    $registro_depen = AcompananteDependiente::where($filtro_2)->where('id_tipo', 1)->with('acompanante');
                    $registro_temp = AcompananteDependiente::where('id_responsable', $paciente->id)->where('id_tipo', 2)->whereNull('id_dependiente')->with('acompanante')->union($registro_depen)->get();
                    $registros[$key]['acompanante'] = $registro_temp;
                }

                $datos['estado'] = 1;
                $datos['msj'] = 'registros';
                $datos['registros'] = $registros;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Sin registros encontrados';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Paciente no encotnrado';
        }


        return $datos;
    }
}
