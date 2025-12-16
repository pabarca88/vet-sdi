<?php

namespace App\Http\Controllers;

use App\Models\SucursalHorario;
use Illuminate\Http\Request;

class SucursalHorarioController extends Controller
{

    public function registrar_r( Request $request )
    {
        return $this->registrar( $request->id_institucion, $request->id_sucursal, $request->id_lugar_atencion, $request->hora_inicio, $request->hora_termino, $request->dia, $request->duracion_consulta, $request->tipo_agenda, $request->otro, $request->estado );
    }
    public function registrar( $id_institucion, $id_sucursal, $id_lugar_atencion, $hora_inicio, $hora_termino, $dia, $duracion_consulta, $tipo_agenda, $otro, $estado )
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if($valido)
        {
            $registro = new SucursalHorario();

            $registro->id_institucion = $id_institucion;
            $registro->id_sucursal = $id_sucursal;
            $registro->id_lugar_atencion = $id_lugar_atencion;
            $registro->hora_inicio = $hora_inicio;
            $registro->hora_termino = $hora_termino;
            $registro->dia = $dia;
            $registro->duracion_consulta = $duracion_consulta;
            $registro->tipo_agenda = $tipo_agenda;
            $registro->otro = $otro;
            $registro->estado = $estado;


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

    public function modificar_r( Request $request )
    {
        return $this->modificar( $request->id, $request->id_institucion, $request->id_sucursal, $request->id_lugar_atencion, $request->hora_inicio, $request->hora_termino, $request->dia, $request->duracion_consulta, $request->tipo_agenda, $request->otro, $request->estado );
    }
    public function modificar( $id, $id_institucion, $id_sucursal, $id_lugar_atencion, $hora_inicio, $hora_termino, $dia, $duracion_consulta, $tipo_agenda, $otro, $estado )
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($id))
        {
            $error['id'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $registro = SucursalHorario::find($id);

            if($registro)
            {
                if(!empty($id_institucion))
                    $registro->id_institucion = $id_institucion;
                if(!empty($id_sucursal))
                    $registro->id_sucursal = $id_sucursal;
                if(!empty($id_lugar_atencion))
                    $registro->id_lugar_atencion = $id_lugar_atencion;
                if(!empty($hora_inicio))
                    $registro->hora_inicio = $hora_inicio;
                if(!empty($hora_termino))
                    $registro->hora_termino = $hora_termino;
                if(!empty($dia))
                    $registro->dia = $dia;
                if(!empty($duracion_consulta))
                    $registro->duracion_consulta = $duracion_consulta;
                if(!empty($tipo_agenda))
                    $registro->tipo_agenda = $tipo_agenda;
                if(!empty($otro))
                    $registro->otro = $otro;
                if( $estado != '')
                    $registro->estado = $estado;


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

    public function verRegistros_r( Request $request )
    {
        return $this->verRegistros( $request->id_institucion, $request->id_sucursal, $request->id_lugar_atencion, $request->hora_inicio, $request->hora_termino, $request->dia, $request->duracion_consulta, $request->tipo_agenda, $request->otro, $request->estado );
    }
    public function verRegistros( $id_institucion, $id_sucursal, $id_lugar_atencion, $hora_inicio, $hora_termino, $dia, $duracion_consulta, $tipo_agenda, $otro, $estado )
    {
        $datos = array();
        $filtro = array();
        $error = array();
        $valido = 1;

        if(!empty($id_institucion))
            $filtro[] = array('id_institucion', $id_institucion);
        if(!empty($id_sucursal))
            $filtro[] = array('id_sucursal', $id_sucursal);
        if(!empty($id_lugar_atencion))
            $filtro[] = array('id_lugar_atencion', $id_lugar_atencion);
        if(!empty($hora_inicio))
            $filtro[] = array('hora_inicio', $hora_inicio);
        if(!empty($hora_termino))
            $filtro[] = array('hora_termino', $hora_termino);
        if(!empty($dia))
            $filtro[] = array('dia', $dia);
        if(!empty($duracion_consulta))
            $filtro[] = array('duracion_consulta', $duracion_consulta);
        if(!empty($tipo_agenda))
            $filtro[] = array('tipo_agenda', $tipo_agenda);
        if(!empty($otro))
            $filtro[] = array('otro', $otro);
        if($estado != '')
            $filtro[] = array('estado', $estado);


        $registro = SucursalHorario::where($filtro)->get();

        if($registro)
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'registros';
            $datos['registros'] = $registro;
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'sin registros';
            $datos['registros'] = array();
        }

        return $datos;
    }

    public function verRegistro_r( Request $request )
    {
        return $this->verRegistro( $request->id, $request->id_institucion, $request->id_sucursal, $request->id_lugar_atencion, $request->hora_inicio, $request->hora_termino, $request->dia, $request->duracion_consulta, $request->tipo_agenda, $request->otro, $request->estado );
    }
    public function verRegistro($id, $id_institucion, $id_sucursal, $id_lugar_atencion, $hora_inicio, $hora_termino, $dia, $duracion_consulta, $tipo_agenda, $otro, $estado )
    {
        $datos = array();
        $filtro = array();
        $error = array();
        $valido = 1;

        if(empty($id))
        {
            $error['id'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $filtro[] = array('id', $id);

            if(!empty($id_institucion))
                $filtro[] = array('id_institucion', $id_institucion);
            if(!empty($id_sucursal))
                $filtro[] = array('id_sucursal', $id_sucursal);
            if(!empty($id_lugar_atencion))
                $filtro[] = array('id_lugar_atencion', $id_lugar_atencion);
            if(!empty($hora_inicio))
                $filtro[] = array('hora_inicio', $hora_inicio);
            if(!empty($hora_termino))
                $filtro[] = array('hora_termino', $hora_termino);
            if(!empty($dia))
                $filtro[] = array('dia', $dia);
            if(!empty($duracion_consulta))
                $filtro[] = array('duracion_consulta', $duracion_consulta);
            if(!empty($tipo_agenda))
                $filtro[] = array('tipo_agenda', $tipo_agenda);
            if(!empty($otro))
                $filtro[] = array('otro', $otro);
            if($estado != '')
                $filtro[] = array('estado', $estado);

            $registro = SucursalHorario::where($filtro)->get()->first();

            if($registro)
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registros';
                $datos['registro'] = $registro;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'sin registros';
                $datos['registro'] = array();
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
