<?php

namespace App\Http\Controllers;

use App\Models\HoraMedica;
use App\Models\LugarAtencion;
use App\Models\Paciente;
use App\Models\Profesional;
use App\Models\ProfesionalHorariosBloqueo;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfesionalHorariosBloqueoController extends Controller
{

    public function registrar_r(Request $request)
    {
        return  $this->registrar(
                    $request->id_profesional,
                    $request->id_lugar_atencion,
                    $request->motivo,
                    $request->fecha_inicio,
                    $request->hora_inicio,
                    $request->fecha_termino,
                    $request->hora_termino,
                    $request->todo_dia);
    }

    public function registrar($id_profesional, $id_lugar_atencion, $motivo, $fecha_inicio, $hora_inicio, $fecha_termino, $hora_termino, $todo_dia)
    {

        $datos = array();
        $error = array();
        $valido = 1;

        if(empty(trim($id_profesional))){
            $error['id_profesional'] = 'campo requerido';
            $valido = 0;
        }
        if(empty(trim($id_lugar_atencion))){
            $error['id_lugar_atencion'] = 'campo requerido';
            $valido = 0;
        }
        // if(empty(trim($motivo))){
        //     $error['motivo'] = 'campo requerido';
        //     $valido = 0;
        // }
        if(empty(trim($fecha_inicio))){
            $error['fecha_inicio'] = 'campo requerido';
            $valido = 0;
        }
        if(empty(trim($hora_inicio))){
            $error['hora_inicio'] = 'campo requerido';
            $valido = 0;
        }
        if(empty(trim($fecha_termino))){
            $error['fecha_termino'] = 'campo requerido';
            $valido = 0;
        }
        if(empty(trim($hora_termino))){
            $error['hora_termino'] = 'campo requerido';
            $valido = 0;
        }
        // if(empty(trim($todo_dia))){
        //     $error['todo_dia'] = 'campo requerido';
        //     $valido = 0;
        // }

        if($valido)
        {
            $registro = new ProfesionalHorariosBloqueo();
            $registro->id_profesional = $id_profesional;
            $registro->id_lugar_atencion = $id_lugar_atencion;
            $registro->motivo = $motivo;
            $registro->fecha_inicio = $fecha_inicio;
            $registro->hora_inicio = $hora_inicio;
            $registro->fecha_termino = $fecha_termino;
            $registro->hora_termino = $hora_termino;
            $registro->todo_dia = $todo_dia;
            $registro->id_user = Auth::user()->id;
            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'exito';

                /** GENERAR HORA MEDICA */
                // CALCULAR MINUTOS ENTRE FECHA HORA DE INICIO A FECHA Y HORA DE TERMINO
                $start = DateTime::createFromFormat('Y-m-d H:i', $fecha_inicio . ' ' . $hora_inicio);
                $end = DateTime::createFromFormat('Y-m-d H:i', $fecha_termino . ' ' . $hora_termino);
                $interval = $start->diff($end);
                $minutes = $interval->h * 60 + $interval->i;

                // CALCULAR  DIAS ENTRE FECHAS DE INICIO Y TERMINO
                $days = $this->calcularCantidadDiasEntreFechas($fecha_inicio, $fecha_termino);

                $lista_id_hora_atencion = '';
                for ($i=0; $i < $days; $i++)
                {
                    $hora_bloqueo = new HoraMedica();
                    $hora_bloqueo->id_paciente = 3; // paciente estandart
                    $hora_bloqueo->id_profesional = $id_profesional;
                    $hora_bloqueo->id_estado = 13;
                    $hora_bloqueo->id_lugar_atencion = $id_lugar_atencion;
                    $hora_bloqueo->fecha_consulta = \Carbon\Carbon::parse($start)->addDay($i)->format('Y-m-d');
                    if(\Carbon\Carbon::parse($start)->addDay($i)->format('Y-m-d') == $fecha_inicio)
                        $hora_bloqueo->hora_inicio = $registro->hora_inicio;
                    else
                        $hora_bloqueo->hora_inicio = '00:01';

                    if(\Carbon\Carbon::parse($start)->addDay($i)->format('Y-m-d') == $fecha_termino)
                        $hora_bloqueo->hora_termino = \Carbon\Carbon::parse($start)->addMinutes($minutes)->format('H:i:s');
                    else
                        $hora_bloqueo->hora_termino = '23:59';

                    $hora_bloqueo->tipo_hora_medica = 'B';
                    $hora_bloqueo->descripcion = 'BLOQUEO HORAS POR PROFESIONAL';

                    if ($hora_bloqueo->save())
                    {
                        $datos['hora'][$i]['estado'] = 1;
                        $datos['hora'][$i]['msj'] = 'exito';
                        $datos['hora'][$i]['fecha_consulta'] = $hora_bloqueo->fecha_consulta;
                        $datos['hora'][$i]['hora_inicio'] = $hora_bloqueo->hora_inicio;
                        $datos['hora'][$i]['hora_termino'] = $hora_bloqueo->hora_termino;
                        $datos['hora'][$i]['dias'] = $days;
                        $datos['hora'][$i]['i'] = $i;
                        $lista_id_hora_atencion .= $hora_bloqueo->id.'|';

                        /** BUSCAR HORAS MEDICAS PARA CANCELAR */
                        // SELECT * FROM `horas_medicas` WHERE fecha_consulta = '2024-03-22' AND hora_inicio BETWEEN '00:00:00' and '23:59:00';
                        $filtro_hora_busqueda = array();
                        $filtro_hora_busqueda[] = array('id_profesional', $id_profesional);
                        $filtro_hora_busqueda[] = array('id_lugar_atencion', $id_lugar_atencion);
                        $filtro_hora_busqueda[] = array('fecha_consulta', $hora_bloqueo->fecha_consulta);
                        $horas_medica_activas = HoraMedica::select('id', 'fecha_consulta', 'hora_inicio', 'hora_termino', 'tipo_hora_medica', 'id_profesional', 'id_lugar_atencion', 'id_asistente', 'id_paciente', 'id_estado')
                                                            ->where($filtro_hora_busqueda)
                                                            ->whereIn('id_estado', [1,2,4,5])
                                                            ->whereRaw("hora_inicio BETWEEN '".$hora_bloqueo->hora_inicio."' and '".$hora_bloqueo->hora_termino."'")
                                                            ->get();
                        if($horas_medica_activas)
                        {
                            foreach ($horas_medica_activas as $key_hma => $value_hma)
                            {
                                $hora_temp = HoraMedica::find($value_hma->id);
                                if($hora_temp)
                                {
                                    $hora_temp->id_estado = 15;
                                    if($hora_temp->save())
                                    {
                                        $datos['hora_medica_anulacion'][$key_hma]['estado'] = 1;
                                        $datos['hora_medica_anulacion'][$key_hma]['msj'] = 'Hora Anulada';

                                        /** envio de correo de ANULACION DE HORA POR PROFESIONAL */
                                        $paciente = Paciente::find($value_hma->id_paciente);
                                        $profesional = Profesional::find($value_hma->id_profesional);
                                        $lugar_atencion = LugarAtencion::find($value_hma->id_lugar_atencion);
                                        $blade = 'hora_anulada_profesional';
                                        $to = array(
                                                array('email' => $paciente->email,'name' =>  $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos),
                                            );
                                        $cc = array();
                                        $bcc = array();
                                        $asunto = 'MED-SDI - Hora Medica Anulada';
                                        $body = array(
                                            'nombre_paciente'=> $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos,
                                            'fecha'=> $value_hma->fecha_consulta,
                                            'hora'=> $value_hma->hora_inicio,
                                            'profesional_nombre'=> $profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos,
                                            'profesional_especialidad'=> $profesional->Especialidad()->first()->nombre,
                                            'profesional_tipo_especialidad'=> $profesional->TipoEspecialidad()->first()->nombre,
                                            'profesional_sub_tipo_especialidad'=> $profesional->SubTipoEspecialidad()->first()->nombre,
                                            // 'institucion'=> $nombre_institucion,
                                            'lugar_atencion'=> $lugar_atencion->nombre,
                                            'direccion'=> $lugar_atencion->Direccion()->first()->direccion.' '.$lugar_atencion->Direccion()->first()->numero_dir.', '.$lugar_atencion->Direccion()->first()->Ciudad()->first()->nombre,
                                        );
                                        $archivo = '';/** pendiente */
                                        $id_institucion = '';

                                        $result_mail =  SendMailController::envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, $id_institucion);

                                        if($result_mail['estado'])
                                        {
                                            $datos['hora_medica_anulacion'][$key_hma]['mail']['estado'] = 1;
                                            $datos['hora_medica_anulacion'][$key_hma]['mail']['msj'] = 'Notificacion enviada';
                                        }
                                        else
                                        {
                                            $datos['hora_medica_anulacion'][$key_hma]['mail']['estado'] = 0;
                                            $datos['hora_medica_anulacion'][$key_hma]['mail']['msj'] = 'Falle en envio de Notificacion';
                                        }
                                    }
                                    else
                                    {
                                        $datos['hora_medica_anulacion'][$key_hma]['estado'] = 0;
                                        $datos['hora_medica_anulacion'][$key_hma]['msj'] = 'Problema al Anular Hora';
                                    }
                                }
                            }
                        }
                    }
                    else
                    {
                        $datos['hora']['estado'] = 0;
                        $datos['hora']['msj'] = 'falla';
                    }
                }

                $registro->id_hora_medica = $lista_id_hora_atencion;
                if($registro->save())
                {
                    $datos['update_id_hora']['estado'] = 1;
                    $datos['update_id_hora']['msj'] = 'exito';
                }
                else
                {
                    $datos['update_id_hora']['estado'] = 0;
                    $datos['update_id_hora']['msj'] = 'error';
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'error';
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

    public function verRegistros(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty(trim($request->id_profesional))){
            $error['id_profesional'] = 'campo requerido';
            $valido = 0;
        }
        if(empty(trim($request->id_lugar_atencion))){
            $error['id_lugar_atencion'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $filtros = array();
            $filtros[] = array('id_profesional', $request->id_profesional);
            $filtros[] = array('id_lugar_atencion', $request->id_lugar_atencion);
            $filtros[] = array('estado','<>' , 2);
            $filtros[] = array('fecha_termino','>=' , date('Y-m-d'));

            $registros = ProfesionalHorariosBloqueo::where($filtros)
                        ->orderBy('fecha_inicio','ASC')
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

    public function estado(Request $request)
    {
        $datos = array();
        $error =  array();
        $valido = 1;

        if(empty($request->id))
        {
            $error['ID'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_profesional))
        {
            $error['PROFESIONAL'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_lugar_atencion))
        {
            $error['LUGAR ATENCION'] = 'campo requerido';
            $valido = 0;
        }
        if($request->estado == '')
        {
            $error['ESTADO'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $filtros = array();
            $filtros[] = array('id',$request->id);
            $filtros[] = array('id_profesional',$request->id_profesional);
            $filtros[] = array('id_lugar_atencion',$request->id_lugar_atencion);

            $registro = ProfesionalHorariosBloqueo::where($filtros)->first();
            $registro->estado = $request->estado;

            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registro actualizado';


                /** ANULAR HORAS DEL BLOQUE TOMADO */
                $arrayTemp = explode('|', $registro->id_hora_medica);
                $horas_a_anular = array_filter($arrayTemp);
                if(!empty($horas_a_anular))
                {
                    foreach ($horas_a_anular as $key => $value)
                    {
                        $result_hora_temp = HoraMedica::find($value);
                        if($request->estado == 1)
                            $result_hora_temp->id_estado = 13;
                        else
                            $result_hora_temp->id_estado = 14;

                        if($result_hora_temp->save())
                        {
                            $datos['hora_estado'][$key]['estado'] = 1;
                            $datos['hora_estado'][$key]['msj'] = 'anulacion de hora con exito';
                        }
                        else
                        {
                            $datos['hora_estado'][$key]['estado'] = 0;
                            $datos['hora_estado'][$key]['msj'] = 'falla en anulacion de hora';
                        }
                    }
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

    public function calcularCantidadDiasEntreFechas($fecha_inicio, $fecha_termino)
    {
        $cant_dias = 0;
        if( date('m', strtotime($fecha_inicio)) == date('m', strtotime($fecha_termino)) )
        {
            if( date('d', strtotime($fecha_inicio)) == date('d', strtotime($fecha_termino)) )
            {
                $cant_dias = 1;
            }
            else if( date('d', strtotime($fecha_inicio)) <= date('d', strtotime($fecha_termino)) )
            {
                $dia_ini = date('d', strtotime($fecha_inicio));
                $dia_fin = date('d', strtotime($fecha_termino));
                $total = 0;
                for ($i = $dia_ini; $i <= $dia_fin; $i++) {
                    $total++;
                }
                $cant_dias = $total;
            }
        }
        else if( date('m', strtotime($fecha_inicio)) <= date('m', strtotime($fecha_termino)) )
        {
            $mes_inicio = date('m', strtotime($fecha_inicio));
            $mes_termino = date('m', strtotime($fecha_termino));

            $total_meses = 0;
            for ($i = $mes_inicio; $i <= $mes_termino; $i++) {
                $total_meses++;
            }

            $cantidad_meses = $total_meses;

            $total = 0;
            for ($i = 1; $i <= $cantidad_meses; $i++)
            {
                if($i == 1)
                {
                    /** primer mes */
                    $dia_ini = date('d', strtotime($fecha_inicio));
                    $ultimo_dia_mes_ini = date("t", strtotime($fecha_inicio));
                    for ($j = $dia_ini; $j <= $ultimo_dia_mes_ini; $j++) {
                        $total++;
                    }
                }
                else
                {
                    if($cantidad_meses > 2)
                    {
                        if($i == $cantidad_meses)
                        {
                            $primer_dia_mes_term = 1;
                            $dia_term = date("d", strtotime($fecha_termino));
                        }
                        else
                        {
                            $primer_dia_mes_term = 1;
                            $fecha_paso = date('Y-m-d', strtotime('+'.($i-1).' month', strtotime(date('Y-m-15', strtotime($fecha_inicio)))) );
                            $dia_term = date("t", strtotime($fecha_paso));
                        }
                    }
                    else
                    {
                        $primer_dia_mes_term = 1;
                        $dia_term = date("d", strtotime($fecha_termino));
                    }

                    for ($k = $primer_dia_mes_term; $k <= $dia_term; $k++) {
                        $total++;
                    }
                }
            }
            $cant_dias = $total;
        }

        return $cant_dias;
    }
}
