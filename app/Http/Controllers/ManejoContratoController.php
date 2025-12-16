<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AdminInstServ;
use App\Models\AdminMantenInst;
use App\Models\Asistente;
use App\Models\AsistenteLugarAtencion;
use App\Models\AdminLugarAtencion;
use App\Models\AsistenteTipo;
use App\Models\ContratoDependiente;
use App\Models\ContratoDependienteProfesional;
use App\Models\ContratoConvenioProfesional;
use App\Models\ContratoHistorico;
use App\Models\Direccion;
use App\Models\Instituciones;
use App\Models\LiquidacionesProfesional;
use App\Models\LugarAtencion;
use App\Models\Paciente;
use App\Models\Profesional;
use App\Models\MantencionLugarAtencion;
use App\Models\ProfesionalesLugaresAtencion;
use App\Models\Servicios;
use App\Models\TipoProfesional;
use App\Models\TipoAdministrador;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Roles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Carbon\Carbon;

class ManejoContratoController extends Controller
{
    /** MANEJO DE CONTRATO  */
    public function verContrato(Request $request)
    {
        $datos = array();
        $filtro = array();
        $valido = 1;
        $error = array();

        if(empty($request->id))
        {
            $error['id'] = 'campo requerido';
            $valido = 0;
        }

        if($valido == 1)
        {
            if(!empty($request->id))
                $filtro[] = array('id',$request->id);
            if(!empty($request->tipo_empleado))
                $filtro[] = array('tipo_empleado',$request->tipo_empleado);
            if(!empty($request->id_empleado))
                $filtro[] = array('id_empleado',$request->id_empleado);
            if(!empty($request->id_institucion))
                $filtro[] = array('id_institucion',$request->id_institucion);
            if(!empty($request->id_lugar_atencion))
                $filtro[] = array('id_lugar_atencion',$request->id_lugar_atencion);
            if(!empty($request->tipo_contrato))
                $filtro[] = array('tipo_contrato',$request->tipo_contrato);
            if(!empty($request->fecha_inicio))
                $filtro[] = array('fecha_inicio',$request->fecha_inicio);
            if(!empty($request->fecha_termino))
                $filtro[] = array('fecha_termino',$request->fecha_termino);
            if($request->monto_imponible != '')
                $filtro[] = array('monto_imponible',$request->monto_imponible);
            if($request->locomocion != '')
                $filtro[] = array('locomocion',$request->locomocion);
            if(!empty($request->locomocion_porcentaje))
                $filtro[] = array('locomocion_porcentaje',$request->locomocion_porcentaje);
            if($request->colacion != '')
                $filtro[] = array('colacion',$request->colacion);
            if(!empty($request->colacion_porcentaje))
                $filtro[] = array('colacion_porcentaje',$request->colacion_porcentaje);
            if($request->asignacion_familiar != '')
                $filtro[] = array('asignacion_familiar',$request->asignacion_familiar);
            if(!empty($request->asignacion_familiar_cantidad))
                $filtro[] = array('asignacion_familiar_cantidad',$request->asignacion_familiar_cantidad);
            if($request->caja_compensacion != '')
                $filtro[] = array('caja_compensacion',$request->caja_compensacion);
            if(!empty($request->caja_compensacion_porcentaje))
                $filtro[] = array('caja_compensacion_porcentaje',$request->caja_compensacion_porcentaje);
            if(!empty($request->otro))
                $filtro[] = array('otro',$request->otro);
            if(!empty($request->dias_laborales))
                $filtro[] = array('dias_laborales',$request->dias_laborales);
            if(!empty($request->hora_ingreso))
                $filtro[] = array('hora_ingreso',$request->hora_ingreso);
            if(!empty($request->hora_salida))
                $filtro[] = array('hora_salida',$request->hora_salida);
            if(!empty($request->hora_inicio_colacion))
                $filtro[] = array('hora_inicio_colacion',$request->hora_inicio_colacion);
            if(!empty($request->hora_termino_colacion))
                $filtro[] = array('hora_termino_colacion',$request->hora_termino_colacion);
            if(!empty($request->fecha_creacion))
                $filtro[] = array('fecha_creacion',$request->fecha_creacion);
            if(!empty($request->id_admin_creador))
                $filtro[] = array('id_admin_creador',$request->id_admin_creador);
            if(!empty($request->id_tipo_admin_creador))
                $filtro[] = array('id_tipo_admin_creador',$request->id_tipo_admin_creador);
            if(!empty($request->texto_contrato))
                $filtro[] = array('texto_contrato',$request->texto_contrato);
            if(!empty($request->pdf_base))
                $filtro[] = array('pdf_base',$request->pdf_base);
            if($request->estado_firmado != '')
                $filtro[] = array('estado_firmado',$request->estado_firmado);
            if(!empty($request->pdf_firmado))
                $filtro[] = array('pdf_firmado',$request->pdf_firmado);
            if($request->estado_inspeccion_trabajo != '')
                $filtro[] = array('estado_inspeccion_trabajo',$request->estado_inspeccion_trabajo);
            if(!empty($request->otro_2))
                $filtro[] = array('otro_2',$request->otro_2);
            if(!empty($request->estado))
                $filtro[] = array('estado',$request->estado);

            $registro = ContratoDependiente::where($filtro)
                                            ->with(['Historico' => function ($query){
                                                $query->select('id_contrato', 'id_user', 'data', 'fecha', 'hora', 'tipo_verificacion_usuario', 'codigo_verificacion_usuario', 'fecha_codigo_usuario', 'tipo_verificacion_tercero', 'codigo_verificacion_tercero', 'fecha_codigo_tercero', 'procesado' );
                                            }])
                                            ->first();
            if($registro)
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

    public function verContratoEmpleado(Request $request)
    {
        $datos = array();
        $filtro = array();
        $valido = 1;
        $error = array();

        if(empty($request->id_empleado))
        {
            $error['id_empleado'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->tipo_empleado))
        {
            $error['tipo_empleado'] = 'campo requerido';
            $valido = 0;
        }

        if($valido == 1)
        {
            if(!empty($request->id))
                $filtro[] = array('id',$request->id);
            if(!empty($request->tipo_empleado))
                $filtro[] = array('tipo_empleado',$request->tipo_empleado);
            if(!empty($request->id_empleado))
                $filtro[] = array('id_empleado',$request->id_empleado);
            if(!empty($request->id_institucion))
                $filtro[] = array('id_institucion',$request->id_institucion);
            if(!empty($request->id_lugar_atencion))
                $filtro[] = array('id_lugar_atencion',$request->id_lugar_atencion);
            if(!empty($request->tipo_contrato))
                $filtro[] = array('tipo_contrato',$request->tipo_contrato);
            if(!empty($request->fecha_inicio))
                $filtro[] = array('fecha_inicio',$request->fecha_inicio);
            if(!empty($request->fecha_termino))
                $filtro[] = array('fecha_termino',$request->fecha_termino);
            if($request->monto_imponible != '')
                $filtro[] = array('monto_imponible',$request->monto_imponible);
            if($request->locomocion != '')
                $filtro[] = array('locomocion',$request->locomocion);
            if(!empty($request->locomocion_porcentaje))
                $filtro[] = array('locomocion_porcentaje',$request->locomocion_porcentaje);
            if($request->colacion != '')
                $filtro[] = array('colacion',$request->colacion);
            if(!empty($request->colacion_porcentaje))
                $filtro[] = array('colacion_porcentaje',$request->colacion_porcentaje);
            if($request->asignacion_familiar != '')
                $filtro[] = array('asignacion_familiar',$request->asignacion_familiar);
            if(!empty($request->asignacion_familiar_cantidad))
                $filtro[] = array('asignacion_familiar_cantidad',$request->asignacion_familiar_cantidad);
            if($request->caja_compensacion != '')
                $filtro[] = array('caja_compensacion',$request->caja_compensacion);
            if(!empty($request->caja_compensacion_porcentaje))
                $filtro[] = array('caja_compensacion_porcentaje',$request->caja_compensacion_porcentaje);
            if(!empty($request->otro))
                $filtro[] = array('otro',$request->otro);
            if(!empty($request->dias_laborales))
                $filtro[] = array('dias_laborales',$request->dias_laborales);
            if(!empty($request->hora_ingreso))
                $filtro[] = array('hora_ingreso',$request->hora_ingreso);
            if(!empty($request->hora_salida))
                $filtro[] = array('hora_salida',$request->hora_salida);
            if(!empty($request->hora_inicio_colacion))
                $filtro[] = array('hora_inicio_colacion',$request->hora_inicio_colacion);
            if(!empty($request->hora_termino_colacion))
                $filtro[] = array('hora_termino_colacion',$request->hora_termino_colacion);
            if(!empty($request->fecha_creacion))
                $filtro[] = array('fecha_creacion',$request->fecha_creacion);
            if(!empty($request->id_admin_creador))
                $filtro[] = array('id_admin_creador',$request->id_admin_creador);
            if(!empty($request->id_tipo_admin_creador))
                $filtro[] = array('id_tipo_admin_creador',$request->id_tipo_admin_creador);
            if(!empty($request->texto_contrato))
                $filtro[] = array('texto_contrato',$request->texto_contrato);
            if(!empty($request->pdf_base))
                $filtro[] = array('pdf_base',$request->pdf_base);
            if($request->estado_firmado != '')
                $filtro[] = array('estado_firmado',$request->estado_firmado);
            if(!empty($request->pdf_firmado))
                $filtro[] = array('pdf_firmado',$request->pdf_firmado);
            if($request->estado_inspeccion_trabajo != '')
                $filtro[] = array('estado_inspeccion_trabajo',$request->estado_inspeccion_trabajo);
            if(!empty($request->otro_2))
                $filtro[] = array('otro_2',$request->otro_2);
            if(!empty($request->estado))
                $filtro[] = array('estado',$request->estado);

            $registros = ContratoDependiente::where($filtro)
                                        ->with(['Historico' => function ($query){
                                            $query->select('id_contrato', 'id_user', 'data', 'fecha', 'hora', 'tipo_verificacion_usuario', 'codigo_verificacion_usuario', 'fecha_codigo_usuario', 'tipo_verificacion_tercero', 'codigo_verificacion_tercero', 'fecha_codigo_tercero', 'procesado' );
                                        }])
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

    public function verHorarioEmpleado(Request $request)
    {
        $datos = array();
        $filtro = array();
        $valido = 1;
        $error = array();

        if(empty($request->id_empleado))
        {
            $error['id_empleado'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->tipo_empleado))
        {
            $error['tipo_empleado'] = 'campo requerido';
            $valido = 0;
        }

        if($valido == 1)
        {
            if(!empty($request->id))
                $filtro[] = array('id',$request->id);
            if(!empty($request->tipo_empleado))
                $filtro[] = array('tipo_empleado',$request->tipo_empleado);
            if(!empty($request->id_empleado))
                $filtro[] = array('id_empleado',$request->id_empleado);
            if(!empty($request->id_institucion))
                $filtro[] = array('id_institucion',$request->id_institucion);
            if(!empty($request->id_lugar_atencion))
                $filtro[] = array('id_lugar_atencion',$request->id_lugar_atencion);
            if(!empty($request->tipo_contrato))
                $filtro[] = array('tipo_contrato',$request->tipo_contrato);
            if(!empty($request->fecha_inicio))
                $filtro[] = array('fecha_inicio',$request->fecha_inicio);
            if(!empty($request->fecha_termino))
                $filtro[] = array('fecha_termino',$request->fecha_termino);
            if($request->monto_imponible != '')
                $filtro[] = array('monto_imponible',$request->monto_imponible);
            if($request->locomocion != '')
                $filtro[] = array('locomocion',$request->locomocion);
            if(!empty($request->locomocion_porcentaje))
                $filtro[] = array('locomocion_porcentaje',$request->locomocion_porcentaje);
            if($request->colacion != '')
                $filtro[] = array('colacion',$request->colacion);
            if(!empty($request->colacion_porcentaje))
                $filtro[] = array('colacion_porcentaje',$request->colacion_porcentaje);
            if($request->asignacion_familiar != '')
                $filtro[] = array('asignacion_familiar',$request->asignacion_familiar);
            if(!empty($request->asignacion_familiar_cantidad))
                $filtro[] = array('asignacion_familiar_cantidad',$request->asignacion_familiar_cantidad);
            if($request->caja_compensacion != '')
                $filtro[] = array('caja_compensacion',$request->caja_compensacion);
            if(!empty($request->caja_compensacion_porcentaje))
                $filtro[] = array('caja_compensacion_porcentaje',$request->caja_compensacion_porcentaje);
            if(!empty($request->otro))
                $filtro[] = array('otro',$request->otro);
            if(!empty($request->dias_laborales))
                $filtro[] = array('dias_laborales',$request->dias_laborales);
            if(!empty($request->hora_ingreso))
                $filtro[] = array('hora_ingreso',$request->hora_ingreso);
            if(!empty($request->hora_salida))
                $filtro[] = array('hora_salida',$request->hora_salida);
            if(!empty($request->hora_inicio_colacion))
                $filtro[] = array('hora_inicio_colacion',$request->hora_inicio_colacion);
            if(!empty($request->hora_termino_colacion))
                $filtro[] = array('hora_termino_colacion',$request->hora_termino_colacion);
            if(!empty($request->fecha_creacion))
                $filtro[] = array('fecha_creacion',$request->fecha_creacion);
            if(!empty($request->id_admin_creador))
                $filtro[] = array('id_admin_creador',$request->id_admin_creador);
            if(!empty($request->id_tipo_admin_creador))
                $filtro[] = array('id_tipo_admin_creador',$request->id_tipo_admin_creador);
            if(!empty($request->texto_contrato))
                $filtro[] = array('texto_contrato',$request->texto_contrato);
            if(!empty($request->pdf_base))
                $filtro[] = array('pdf_base',$request->pdf_base);
            if($request->estado_firmado != '')
                $filtro[] = array('estado_firmado',$request->estado_firmado);
            if(!empty($request->pdf_firmado))
                $filtro[] = array('pdf_firmado',$request->pdf_firmado);
            if($request->estado_inspeccion_trabajo != '')
                $filtro[] = array('estado_inspeccion_trabajo',$request->estado_inspeccion_trabajo);
            if(!empty($request->otro_2))
                $filtro[] = array('otro_2',$request->otro_2);
            if(!empty($request->estado))
                $filtro[] = array('estado',$request->estado);

            $registros = ContratoDependiente::select('id','tipo_empleado','id_empleado','id_institucion','id_lugar_atencion','dias_laborales','hora_ingreso','hora_salida','hora_inicio_colacion','hora_termino_colacion')
                                        ->where($filtro)
                                        ->with(['Historico' => function ($query){
                                            $query->select('id_contrato', 'id_user', 'data', 'fecha', 'hora', 'tipo_verificacion_usuario', 'codigo_verificacion_usuario', 'fecha_codigo_usuario', 'tipo_verificacion_tercero', 'codigo_verificacion_tercero', 'fecha_codigo_tercero', 'procesado' );
                                        }])
                                        ->get();
            if($registros)
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registros';
                $datos['registros'] = $registros;
                $datos['filtro'] = $filtro;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'sin registro';
                $datos['request'] = $request->all();
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

    public function verHorarioEmpleadoAdmin(Request $request)
    {
        $datos = array();
        $filtro = array();
        $valido = 1;
        $error = array();

        if(empty($request->id_empleado))
        {
            $error['id_empleado'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->tipo_empleado))
        {
            $error['tipo_empleado'] = 'campo requerido';
            $valido = 0;
        }

        if($valido == 1)
        {
            if(!empty($request->id))
                $filtro[] = array('id',$request->id);
            if(!empty($request->tipo_empleado))
                $filtro[] = array('tipo_empleado',$request->tipo_empleado);
            if(!empty($request->id_empleado))
                $filtro[] = array('id_empleado',$request->id_empleado);
            if(!empty($request->id_institucion))
                $filtro[] = array('id_institucion',$request->id_institucion);
            if(!empty($request->id_lugar_atencion))
                $filtro[] = array('id_lugar_atencion',$request->id_lugar_atencion);
            if(!empty($request->tipo_contrato))
                $filtro[] = array('tipo_contrato',$request->tipo_contrato);
            if(!empty($request->fecha_inicio))
                $filtro[] = array('fecha_inicio',$request->fecha_inicio);
            if(!empty($request->fecha_termino))
                $filtro[] = array('fecha_termino',$request->fecha_termino);
            if($request->monto_imponible != '')
                $filtro[] = array('monto_imponible',$request->monto_imponible);
            if($request->locomocion != '')
                $filtro[] = array('locomocion',$request->locomocion);
            if(!empty($request->locomocion_porcentaje))
                $filtro[] = array('locomocion_porcentaje',$request->locomocion_porcentaje);
            if($request->colacion != '')
                $filtro[] = array('colacion',$request->colacion);
            if(!empty($request->colacion_porcentaje))
                $filtro[] = array('colacion_porcentaje',$request->colacion_porcentaje);
            if($request->asignacion_familiar != '')
                $filtro[] = array('asignacion_familiar',$request->asignacion_familiar);
            if(!empty($request->asignacion_familiar_cantidad))
                $filtro[] = array('asignacion_familiar_cantidad',$request->asignacion_familiar_cantidad);
            if($request->caja_compensacion != '')
                $filtro[] = array('caja_compensacion',$request->caja_compensacion);
            if(!empty($request->caja_compensacion_porcentaje))
                $filtro[] = array('caja_compensacion_porcentaje',$request->caja_compensacion_porcentaje);
            if(!empty($request->otro))
                $filtro[] = array('otro',$request->otro);
            if(!empty($request->dias_laborales))
                $filtro[] = array('dias_laborales',$request->dias_laborales);
            if(!empty($request->hora_ingreso))
                $filtro[] = array('hora_ingreso',$request->hora_ingreso);
            if(!empty($request->hora_salida))
                $filtro[] = array('hora_salida',$request->hora_salida);
            if(!empty($request->hora_inicio_colacion))
                $filtro[] = array('hora_inicio_colacion',$request->hora_inicio_colacion);
            if(!empty($request->hora_termino_colacion))
                $filtro[] = array('hora_termino_colacion',$request->hora_termino_colacion);
            if(!empty($request->fecha_creacion))
                $filtro[] = array('fecha_creacion',$request->fecha_creacion);
            if(!empty($request->id_admin_creador))
                $filtro[] = array('id_admin_creador',$request->id_admin_creador);
            if(!empty($request->id_tipo_admin_creador))
                $filtro[] = array('id_tipo_admin_creador',$request->id_tipo_admin_creador);
            if(!empty($request->texto_contrato))
                $filtro[] = array('texto_contrato',$request->texto_contrato);
            if(!empty($request->pdf_base))
                $filtro[] = array('pdf_base',$request->pdf_base);
            if($request->estado_firmado != '')
                $filtro[] = array('estado_firmado',$request->estado_firmado);
            if(!empty($request->pdf_firmado))
                $filtro[] = array('pdf_firmado',$request->pdf_firmado);
            if($request->estado_inspeccion_trabajo != '')
                $filtro[] = array('estado_inspeccion_trabajo',$request->estado_inspeccion_trabajo);
            if(!empty($request->otro_2))
                $filtro[] = array('otro_2',$request->otro_2);
            if(!empty($request->estado))
                $filtro[] = array('estado',$request->estado);

            $registros = ContratoDependiente::select('id','tipo_empleado','id_empleado','id_institucion','id_lugar_atencion','dias_laborales','hora_ingreso','hora_salida','hora_inicio_colacion','hora_termino_colacion')
                                        ->where($filtro)
                                        ->with(['Historico' => function ($query){
                                            $query->select('id_contrato', 'id_user', 'data', 'fecha', 'hora', 'tipo_verificacion_usuario', 'codigo_verificacion_usuario', 'fecha_codigo_usuario', 'tipo_verificacion_tercero', 'codigo_verificacion_tercero', 'fecha_codigo_tercero', 'procesado' );
                                        }])
                                        ->get();
            if($registros)
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registros';
                $datos['registros'] = $registros;
                $datos['filtro'] = $filtro;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'sin registro';
                $datos['request'] = $request->all();
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

    public function verHorarioEmpleadoMantencion(Request $request){
        $datos = array();
        $filtro = array();
        $valido = 1;
        $error = array();

        if(empty($request->id_empleado))
        {
            $error['id_empleado'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->tipo_empleado))
        {
            $error['tipo_empleado'] = 'campo requerido';
            $valido = 0;
        }

        if($valido == 1)
        {
            if(!empty($request->id))
                $filtro[] = array('id',$request->id);
            if(!empty($request->tipo_empleado))
                $filtro[] = array('tipo_empleado',$request->tipo_empleado);
            if(!empty($request->id_empleado))
                $filtro[] = array('id_empleado',$request->id_empleado);
            if(!empty($request->id_institucion))
                $filtro[] = array('id_institucion',$request->id_institucion);
            if(!empty($request->id_lugar_atencion))
                $filtro[] = array('id_lugar_atencion',$request->id_lugar_atencion);
            if(!empty($request->tipo_contrato))
                $filtro[] = array('tipo_contrato',$request->tipo_contrato);
            if(!empty($request->fecha_inicio))
                $filtro[] = array('fecha_inicio',$request->fecha_inicio);
            if(!empty($request->fecha_termino))
                $filtro[] = array('fecha_termino',$request->fecha_termino);
            if($request->monto_imponible != '')
                $filtro[] = array('monto_imponible',$request->monto_imponible);
            if($request->locomocion != '')
                $filtro[] = array('locomocion',$request->locomocion);
            if(!empty($request->locomocion_porcentaje))
                $filtro[] = array('locomocion_porcentaje',$request->locomocion_porcentaje);
            if($request->colacion != '')
                $filtro[] = array('colacion',$request->colacion);
            if(!empty($request->colacion_porcentaje))
                $filtro[] = array('colacion_porcentaje',$request->colacion_porcentaje);
            if($request->asignacion_familiar != '')
                $filtro[] = array('asignacion_familiar',$request->asignacion_familiar);
            if(!empty($request->asignacion_familiar_cantidad))
                $filtro[] = array('asignacion_familiar_cantidad',$request->asignacion_familiar_cantidad);
            if($request->caja_compensacion != '')
                $filtro[] = array('caja_compensacion',$request->caja_compensacion);
            if(!empty($request->caja_compensacion_porcentaje))
                $filtro[] = array('caja_compensacion_porcentaje',$request->caja_compensacion_porcentaje);
            if(!empty($request->otro))
                $filtro[] = array('otro',$request->otro);
            if(!empty($request->dias_laborales))
                $filtro[] = array('dias_laborales',$request->dias_laborales);
            if(!empty($request->hora_ingreso))
                $filtro[] = array('hora_ingreso',$request->hora_ingreso);
            if(!empty($request->hora_salida))
                $filtro[] = array('hora_salida',$request->hora_salida);
            if(!empty($request->hora_inicio_colacion))
                $filtro[] = array('hora_inicio_colacion',$request->hora_inicio_colacion);
            if(!empty($request->hora_termino_colacion))
                $filtro[] = array('hora_termino_colacion',$request->hora_termino_colacion);
            if(!empty($request->fecha_creacion))
                $filtro[] = array('fecha_creacion',$request->fecha_creacion);
            if(!empty($request->id_admin_creador))
                $filtro[] = array('id_admin_creador',$request->id_admin_creador);
            if(!empty($request->id_tipo_admin_creador))
                $filtro[] = array('id_tipo_admin_creador',$request->id_tipo_admin_creador);
            if(!empty($request->texto_contrato))
                $filtro[] = array('texto_contrato',$request->texto_contrato);
            if(!empty($request->pdf_base))
                $filtro[] = array('pdf_base',$request->pdf_base);
            if($request->estado_firmado != '')
                $filtro[] = array('estado_firmado',$request->estado_firmado);
            if(!empty($request->pdf_firmado))
                $filtro[] = array('pdf_firmado',$request->pdf_firmado);
            if($request->estado_inspeccion_trabajo != '')
                $filtro[] = array('estado_inspeccion_trabajo',$request->estado_inspeccion_trabajo);
            if(!empty($request->otro_2))
                $filtro[] = array('otro_2',$request->otro_2);
            if(!empty($request->estado))
                $filtro[] = array('estado',$request->estado);

            $registros = ContratoDependiente::select('id','tipo_empleado','id_empleado','id_institucion','id_lugar_atencion','dias_laborales','hora_ingreso','hora_salida','hora_inicio_colacion','hora_termino_colacion')
                                        ->where($filtro)
                                        ->with(['Historico' => function ($query){
                                            $query->select('id_contrato', 'id_user', 'data', 'fecha', 'hora', 'tipo_verificacion_usuario', 'codigo_verificacion_usuario', 'fecha_codigo_usuario', 'tipo_verificacion_tercero', 'codigo_verificacion_tercero', 'fecha_codigo_tercero', 'procesado' );
                                        }])
                                        ->get();
            if($registros)
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registros';
                $datos['registros'] = $registros;
                $datos['filtro'] = $filtro;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'sin registro';
                $datos['request'] = $request->all();
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

    public function registrarContrato_r(Request $request)
    {
        return static::registrarContrato($request->tipo_empleado, $request->id_empleado, $request->rut, $request->nombres, $request->apellido_uno, $request->apellido_dos, $request->telefono, $request->email, $request->id_institucion, $request->id_lugar_atencion, $request->tipo_contrato, $request->fecha_inicio, $request->fecha_termino, $request->monto_imponible, $request->locomocion, $request->locomocion_porcentaje, $request->colacion, $request->colacion_porcentaje, $request->asignacion_familiar, $request->asignacion_familiar_cantidad, $request->caja_compensacion, $request->caja_compensacion_porcentaje, $request->otro, $request->dias_laborales, $request->hora_ingreso, $request->hora_salida, $request->hora_inicio_colacion, $request->hora_termino_colacion, $request->fecha_creacion, $request->id_admin_creador, $request->id_tipo_admin_creador, $request->texto_contrato, $request->pdf_base, $request->estado_firmado, $request->pdf_firmado, $request->estado_inspeccion_trabajo, $request->otro_2, $request->estado);
    }

    static public function registrarContrato($tipo_empleado,$tipo_mantenedor, $id_empleado, $rut, $nombres, $apellido_uno, $apellido_dos, $telefono, $email, $id_institucion, $id_lugar_atencion, $tipo_contrato, $fecha_inicio, $fecha_termino, $monto_imponible, $locomocion, $locomocion_porcentaje, $colacion, $colacion_porcentaje, $asignacion_familiar, $asignacion_familiar_cantidad, $caja_compensacion, $caja_compensacion_porcentaje, $otro, $dias_laborales, $hora_ingreso, $hora_salida, $hora_inicio_colacion, $hora_termino_colacion, $fecha_creacion, $id_admin_creador, $id_tipo_admin_creador, $texto_contrato, $pdf_base, $estado_firmado, $pdf_firmado, $estado_inspeccion_trabajo, $otro_2, $estado)
    {
        $datos = array();
        $filtro = array();
        $valido = 1;
        $error = array();


        if(empty($tipo_empleado))
        {
            $error['tipo_empleado'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($id_empleado))
        {
            $error['id_empleado'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($rut))
        {
            $error['rut'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($nombres))
        {
            $error['nombres'] = 'campo requerido';
            $valido = 0;
        }
        if($tipo_mantenedor != 1){
        if(empty($apellido_uno))
            {
                $error['apellido_uno'] = 'campo requerido';
                $valido = 0;
            }
            if(empty($apellido_dos))
            {
                $error['apellido_dos'] = 'campo requerido';
                $valido = 0;
            }
        }
        if(empty($telefono))
        {
            $error['telefono'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($email))
        {
            $error['email'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($id_institucion))
        {
            $error['id_institucion'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($id_lugar_atencion))
        {
            $error['id_lugar_atencion'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($tipo_contrato))
        {
            $error['tipo_contrato'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($fecha_inicio))
        {
            $error['fecha_inicio'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($monto_imponible))
        {
            $error['monto_imponible'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($dias_laborales))
        {
            $error['dias_laborales'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($hora_ingreso))
        {
            $error['hora_ingreso'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($hora_salida))
        {
            $error['hora_salida'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($hora_inicio_colacion))
        {
            $error['hora_inicio_colacion'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($hora_termino_colacion))
        {
            $error['hora_termino_colacion'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($id_admin_creador))
        {
            $error['id_admin_creador'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($id_tipo_admin_creador))
        {
            $error['id_tipo_admin_creador'] = 'campo requerido';
            $valido = 0;
        }

        if($valido == 1)
        {
            $contrato = new ContratoDependiente();
            $contrato->empresa = $tipo_mantenedor;
            $contrato->tipo_empleado = $tipo_empleado;
            $contrato->id_empleado = $id_empleado;

            $contrato->rut = $rut;
            $contrato->nombres = $nombres;
            $contrato->apellido_uno = $apellido_uno;
            $contrato->apellido_dos = $apellido_dos;
            $contrato->telefono = $telefono;
            $contrato->email = $email;

            $contrato->id_institucion = $id_institucion;
            $contrato->id_lugar_atencion = $id_lugar_atencion;
            $contrato->tipo_contrato = $tipo_contrato;
            $contrato->fecha_inicio = $fecha_inicio;
            $contrato->fecha_termino = $fecha_termino;
            $contrato->monto_imponible = $monto_imponible;
            $contrato->locomocion = $locomocion;
            $contrato->locomocion_porcentaje = $locomocion_porcentaje;
            $contrato->colacion = $colacion;
            $contrato->colacion_porcentaje = $colacion_porcentaje;
            $contrato->asignacion_familiar = $asignacion_familiar;
            $contrato->asignacion_familiar_cantidad = $asignacion_familiar_cantidad;
            $contrato->caja_compensacion = $caja_compensacion;
            $contrato->caja_compensacion_porcentaje = $caja_compensacion_porcentaje;
            $contrato->otro = $otro;
            $contrato->dias_laborales = $dias_laborales;
            $contrato->hora_ingreso = $hora_ingreso;
            $contrato->hora_salida = $hora_salida;
            $contrato->hora_inicio_colacion = $hora_inicio_colacion;
            $contrato->hora_termino_colacion = $hora_termino_colacion;
            $contrato->fecha_creacion = $fecha_creacion;
            $contrato->id_admin_creador = $id_admin_creador;
            $contrato->id_tipo_admin_creador = $id_tipo_admin_creador;
            $contrato->texto_contrato = $texto_contrato;
            $contrato->pdf_base = $pdf_base;
            $contrato->estado_firmado = $estado_firmado;
            $contrato->pdf_firmado = $pdf_firmado;
            $contrato->estado_inspeccion_trabajo = $estado_inspeccion_trabajo;
            $contrato->otro_2 = $otro_2;
            $contrato->estado = $estado;

            if($contrato->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registro realizado';
                $datos['last_id'] = $contrato->id;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'falla registro';
                $datos['request'] = array(
                                            'tipo_empleado' => $tipo_empleado,
                                            'id_empleado' => $id_empleado,
                                            'id_institucion' => $id_institucion,
                                            'id_lugar_atencion' => $id_lugar_atencion,
                                            'tipo_contrato' => $tipo_contrato,
                                            'fecha_inicio' => $fecha_inicio,
                                            'fecha_termino' => $fecha_termino,
                                            'monto_imponible' => $monto_imponible,
                                            'locomocion' => $locomocion,
                                            'locomocion_porcentaje' => $locomocion_porcentaje,
                                            'colacion' => $colacion,
                                            'colacion_porcentaje' => $colacion_porcentaje,
                                            'asignacion_familiar' => $asignacion_familiar,
                                            'asignacion_familiar_cantidad' => $asignacion_familiar_cantidad,
                                            'caja_compensacion' => $caja_compensacion,
                                            'caja_compensacion_porcentaje' => $caja_compensacion_porcentaje,
                                            'otro' => $otro,
                                            'dias_laborales' => $dias_laborales,
                                            'hora_ingreso' => $hora_ingreso,
                                            'hora_salida' => $hora_salida,
                                            'hora_inicio_colacion' => $hora_inicio_colacion,
                                            'hora_termino_colacion' => $hora_termino_colacion,
                                            'fecha_creacion' => $fecha_creacion,
                                            'id_admin_creador' => $id_admin_creador,
                                            'id_tipo_admin_creador' => $id_tipo_admin_creador,
                                            'texto_contrato' => $texto_contrato,
                                            'pdf_base' => $pdf_base,
                                            'estado_firmado' => $estado_firmado,
                                            'pdf_firmado' => $pdf_firmado,
                                            'estado_inspeccion_trabajo' => $estado_inspeccion_trabajo,
                                            'otro_2' => $otro_2,
                                            'estado' => $estado,
                                        );
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campo requerido';
            $datos['error'] = $error;
        }
        return (object)$datos;
    }

    /** MANEJO DE HISTORICO */
    static public function registrarHistorico(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(!empty($request->id_contrato))
        {
            $error['id_contrato'] = 'campo requerido';
            $valido = 1;
        }
        if(!empty($request->id_user))
        {
            $error['id_user'] = 'campo requerido';
            $valido = 1;
        }
        if(!empty($request->data))
        {
            $error['data'] = 'campo requerido';
            $valido = 1;
        }
        if(!empty($request->fecha))
        {
            $error['fecha'] = 'campo requerido';
            $valido = 1;
        }
        if(!empty($request->hora))
        {
            $error['hora'] = 'campo requerido';
            $valido = 1;
        }

        if($valido == 1)
        {
            $historico = new ContratoHistorico();
            $historico->id_contrato = $request->id_contrato;
            $historico->id_user = $request->id_user;
            $historico->data = $request->data;
            $historico->fecha = $request->fecha;
            $historico->hora = $request->hora;
            $historico->tipo_verificacion_usuario = $request->tipo_verificacion_usuario;
            $historico->codigo_verificacion_usuario = $request->codigo_verificacion_usuario;
            $historico->fecha_codigo_usuario = $request->fecha_codigo_usuario;
            $historico->tipo_verificacion_tercero = $request->tipo_verificacion_tercero;
            $historico->codigo_verificacion_tercero = $request->codigo_verificacion_tercero;
            $historico->fecha_codigo_tercero = $request->fecha_codigo_tercero;
            $historico->procesado = $request->procesado;

            if($historico->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registro exitoso';
                $datos['last_id'] = $historico->id;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'falla registro';
                $datos['request'] = $request->all();
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

    /** REGISTRO DE NUEVO PERSONAL */
    /** REGISTRO NUEVO  */
    public function registrarPersonal(Request $request)
    {

        $datos = array();
        $error = array();
        $valido = 1;

        /** VALIDAR EXISTENCIA DE CONTRATO ACTUAL ACTIVO */
        $validacion_contrato = ContratoDependiente::where('email', $request->email)->whereIn('estado', [1,2,3])->get();
        if($validacion_contrato->count() > 0)
        {
            $error['validacion_contrado'] = 'El Email esta siendo utilizado en un contrato (Nuevo, Activo o Vencido), valide la información.';
            // $error['info'] = $validacion_contrato;
            // $error['count'] = $validacion_contrato->count();
            $valido = 0;
        }

        if($valido)
        {
            $lista_tipo_asitente = array('ASISTENTE PUBLICO', 'ASISTENTE JEFA CAJA', 'ASISTENTE ADMINISTRATIVO', 'ASISTENTE ONLINE', 'ASISTENTE CONSULTA', 'ASISTENTE MANEJO DE AGENDA', 'ASISTENTE LABORATORIO');
            $lista_tipo_admi_inst_serv = array('ADMINISTRADOR DE CM', 'ADMINISTRADOR COMERCIAL','ADMINISTRADOR FARMACIA','ADMINISTRADOR MINISTERIO','CONTADOR','ENCARGADO DE BODEGA');
            $lista_tipo_mantencion = array('GASFITERÍA', 'ELECTRICIDAD', 'CARPINTERÍA', 'PINTURA', 'JARDINERÍA', 'LIMPIEZA', 'MANTENCIÓN');

            /** registro asistente */
            if(in_array($request->tipo_contrato, $lista_tipo_asitente))
            {
                $result_registro_perfil = static::registroPerfil($request);

                $datos['result_registro_perfil'] = $result_registro_perfil;

                if( $result_registro_perfil->estado == 1)
                {

                    $id_empleado = $result_registro_perfil->result->id;
                    $id_empleado_user = $result_registro_perfil->result->id_user;

                    /** CREAR CONTRATO */
                    $registro = User::find(Auth::user()->id);
                    $roles = $registro->roles()->get();
                    $lista_roles = '';
                    foreach ($roles as $key => $value)
                        {
                        $lista_roles = $value->id.'|';
                    }
                    $lista_roles = substr($lista_roles, 0, -1);

                    /**
                     * # TIPOS DE CONTRATOS DEPENDIENTES
                     * 1. CONTRATO INDEFINIDO
                     * 2. CONTRATO DEFINIDO
                     * */
                    $tipo_contrato = 1;
                    if(!empty($fecha_termino))
                        $tipo_contrato = 2;

                    $registro_contrato = static::registrarContrato( $request->tipo_contrato,$request->tipo_mantenedor, $id_empleado, $request->rut, $request->nombre, $request->apellido_uno, $request->apellido_dos, $request->telefono, $request->email, $request->id_institucion, $request->id_lugar_atencion, $tipo_contrato, $request->fecha_inicio, $request->fecha_termino, $request->monto_imponible, $request->locomocion, $request->locomocion_porcentaje, $request->colacion, $request->colacion_porcentaje, $request->asignacion_familiar, $request->asignacion_familiar_cantidad, $request->caja_compensacion, $request->caja_compensacion_porcentaje, $request->otro, implode(',', $request->dias_laborales), $request->hora_entrada, $request->hora_salida, $request->hora_entrada_colacion, $request->hora_salida_colacion, date('Y-m-d') , Auth::user()->id, $lista_roles, '','', 0, 0, 0, $request->otro_2, 2);
                    $datos['registro_contrato'] = $registro_contrato;

                    if($registro_contrato->estado == 1)
                    {
                        $datos['estado'] = 1;
                        $datos['msj'] = 'Contrato generado';

                        // relacion de personal con institucion (asistente)
                        $asistente_lugar_atencion = new AsistenteLugarAtencion();
                        $asistente_lugar_atencion->id_asistente = $id_empleado;
                        $asistente_lugar_atencion->id_lugar_atencion = $request->id_lugar_atencion;
                        $asistente_lugar_atencion->token = $request->clave_ingreso;
                        $asistente_lugar_atencion->id_profesional = NULL;
                        $asistente_lugar_atencion->id_institucion = $request->id_institucion;
                        $asistente_lugar_atencion->estado = 1;

                        if($asistente_lugar_atencion->save())
                        {
                            $datos['asignacion']['estado'] = 1;
                            $datos['asignacion']['msj'] = 'Asignacion de asistente exitosa';
                        }
                        else
                        {
                            $datos['asignacion']['estado'] = 0;
                            $datos['asignacion']['msj'] = 'Asignacion de asistente fallida';
                        }
                    }
                    else
                    {
                        $datos['estado'] = 0;
                        $datos['msj'] = 'Problema al generar contrato';
                    }
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'Problema con el perfil del Empleado';
                }
            }
            else if(in_array((strtoupper($request->tipo_contrato)), $lista_tipo_admi_inst_serv))
            {
                $result_registro_perfil_administrativo = static::registroPerfilAdministrativo($request);
                $datos['result_registro_perfil'] = $result_registro_perfil_administrativo;

                if($result_registro_perfil_administrativo['estado'] == 1){
                    $id_admin = $result_registro_perfil_administrativo['result']->id_administrativo;
                    $id_admin_user = $result_registro_perfil_administrativo['result']->id_administrativo_usuario;

                    /** CREAR CONTRATO */
                    $registro = User::find(Auth::user()->id);
                    $roles = $registro->roles()->get();
                    $lista_roles = '';
                    foreach ($roles as $key => $value)
                        {
                        $lista_roles = $value->id.'|';
                    }
                    $lista_roles = substr($lista_roles, 0, -1);

                    /**
                     * # TIPOS DE CONTRATOS DEPENDIENTES
                     * 1. CONTRATO INDEFINIDO
                     * 2. CONTRATO DEFINIDO
                     * */
                    $tipo_contrato = 1;
                    if(!empty($fecha_termino))
                        $tipo_contrato = 2;

                    $id_empleado = $id_admin;

                    $registro_contrato = static::registrarContrato( $request->tipo_contrato,0,$id_empleado, $request->rut, $request->nombre, $request->apellido_uno, $request->apellido_dos, $request->telefono, $request->email, $request->id_institucion, $request->id_lugar_atencion, $tipo_contrato, $request->fecha_inicio, $request->fecha_termino, $request->monto_imponible, $request->locomocion, $request->locomocion_porcentaje, $request->colacion, $request->colacion_porcentaje, $request->asignacion_familiar, $request->asignacion_familiar_cantidad, $request->caja_compensacion, $request->caja_compensacion_porcentaje, $request->otro, implode(',', $request->dias_laborales), $request->hora_entrada, $request->hora_salida, $request->hora_entrada_colacion, $request->hora_salida_colacion, date('Y-m-d') , Auth::user()->id, $lista_roles, '','', 0, 0, 0, $request->otro_2, 2);
                    $datos['registro_contrato'] = $registro_contrato;

                    if($registro_contrato->estado == 1)
                    {
                        $datos['estado'] = 1;
                        $datos['msj'] = 'Contrato generado';

                        // relacion de personal con institucion (administrativo)
                        $administrativo_lugar_atencion = new AdminLugarAtencion();
                        $administrativo_lugar_atencion->id_admin = $id_admin;
                        $administrativo_lugar_atencion->id_lugar_atencion = $request->id_lugar_atencion;
                        $administrativo_lugar_atencion->token = $request->clave_ingreso;
                        $administrativo_lugar_atencion->id_profesional = NULL;
                        $administrativo_lugar_atencion->id_institucion = $request->id_institucion;
                        $administrativo_lugar_atencion->estado = 1;

                        if($administrativo_lugar_atencion->save())
                        {
                            $datos['asignacion']['estado'] = 1;
                            $datos['asignacion']['msj'] = 'Asignacion de administrativo exitosa';
                        }
                        else
                        {
                            $datos['asignacion']['estado'] = 0;
                            $datos['asignacion']['msj'] = 'Asignacion de administrativo fallida';
                        }
                    }
                    else
                    {
                        $datos['estado'] = 0;
                        $datos['msj'] = 'Problema al generar contrato';
                    }

                }else{
                    $datos['estado'] = 0;
                    $datos['msj'] = 'Problema con el perfil del Empleado';

                }
            }
            else if(in_array((strtoupper($request->tipo_contrato)), $lista_tipo_mantencion))
            {
                $result_registro_perfil_mantencion = static::registroPerfilMantencion($request);
                $datos['result_registro_perfil'] = $result_registro_perfil_mantencion;

                if($result_registro_perfil_mantencion['estado'] == 1){
                    $id_mantencion = $result_registro_perfil_mantencion['result']->id_mantencion;
                    $id_mantencion_user = $result_registro_perfil_mantencion['result']->id_mantencion_usuario;

                    /** CREAR CONTRATO */
                    $registro = User::find(Auth::user()->id);
                    $roles = $registro->roles()->get();
                    $lista_roles = '';
                    foreach ($roles as $key => $value)
                        {
                        $lista_roles = $value->id.'|';
                    }
                    $lista_roles = substr($lista_roles, 0, -1);

                    /**
                     * # TIPOS DE CONTRATOS DEPENDIENTES
                     * 1. CONTRATO INDEFINIDO
                     * 2. CONTRATO DEFINIDO
                     * */
                    $tipo_contrato = 1;
                    if(!empty($fecha_termino))
                        $tipo_contrato = 2;

                    $id_empleado = $id_mantencion;

                    $registro_contrato = static::registrarContrato( $request->tipo_contrato,$request->tipo_mantenedor, $id_empleado, $request->rut, $request->nombre, $request->apellido_uno, $request->apellido_dos, $request->telefono, $request->email, $request->id_institucion, $request->id_lugar_atencion, $tipo_contrato, $request->fecha_inicio, $request->fecha_termino, $request->monto_imponible, $request->locomocion, $request->locomocion_porcentaje, $request->colacion, $request->colacion_porcentaje, $request->asignacion_familiar, $request->asignacion_familiar_cantidad, $request->caja_compensacion, $request->caja_compensacion_porcentaje, $request->otro, implode(',', $request->dias_laborales), $request->hora_entrada, $request->hora_salida, $request->hora_entrada_colacion, $request->hora_salida_colacion, date('Y-m-d') , Auth::user()->id, $lista_roles, '','', 0, 0, 0, $request->otro_2, 2);
                    $datos['registro_contrato'] = $registro_contrato;

                    if($registro_contrato->estado == 1)
                    {
                        $datos['estado'] = 1;
                        $datos['msj'] = 'Contrato generado';

                        // relacion de personal con institucion (mantencion)
                        $mantencion_lugar_atencion = new MantencionLugarAtencion();
                        $mantencion_lugar_atencion->id_admin = $id_mantencion;
                        $mantencion_lugar_atencion->id_lugar_atencion = $request->id_lugar_atencion;
                        $mantencion_lugar_atencion->token = $request->clave_ingreso;
                        $mantencion_lugar_atencion->id_profesional = NULL;
                        $mantencion_lugar_atencion->id_institucion = $request->id_institucion;
                        $mantencion_lugar_atencion->estado = 1;

                        if($mantencion_lugar_atencion->save())
                        {
                            $datos['asignacion']['estado'] = 1;
                            $datos['asignacion']['msj'] = 'Asignacion de mantencion exitosa';
                        }
                        else
                        {
                            $datos['asignacion']['estado'] = 0;
                            $datos['asignacion']['msj'] = 'Asignacion de mantencion fallida';
                        }
                    }
                    else
                    {
                        $datos['estado'] = 0;
                        $datos['msj'] = 'Problema al generar contrato';
                    }

                }else{
                    $datos['estado'] = 0;
                    $datos['msj'] = 'Problema con el perfil del Empleado';

                }


            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Contrato no manejado por el momento';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Campo requerido';
            $datos['error'] = $error;
        }

        $institucion = '';
        $tipo_institucion = '1';
        $id_busqueda = Auth::user()->id;

        /** INFORMACION DE INSTITUCION Y RESPONSABLE */
        if(Auth::user()->id == 3)
        {
            $id_busqueda = 5;
            $registro = Instituciones::where('id', $id_busqueda)->first();
        }
        else
        {
            $registro = Instituciones::where('id_usuario',Auth::user()->id)->first();
        }

        if($registro)
        {
            // var_dump($registro);
            // var_dump($registro->UsuarioAdministrador()->first());
            //var_dump($registro->UsuarioAdministrador()->first()->id);
            /** INSTITUCION */
            $institucion = $registro;
            $responsable = AdminInstServ::where('id',$registro->UsuarioAdministrador()->first()->id)->first();
            $tipo_institucion = 'institucion';

        }
        else
        {
            $registro = Servicios::where('id_usuario',Auth::user()->id)->first();
            if($registro)
            {
                /** SERVICIOS */
                $institucion = $registro;
                $tipo_institucion = 'servicio';
            }
            else
            {
                /** busqueda por responsable */
                $responsable = AdminInstServ::where('id_admin',Auth::user()->id)->first();

                if($responsable)
                {
                    $registro = Instituciones::where('id_responsable',$responsable->id)->first();
                    if($registro)
                    {
                        // var_dump($registro);
                        // var_dump($registro->UsuarioAdministrador()->first());
                        /** INSTITUCION */
                        $institucion = $registro;
                        $tipo_institucion = 'institucion';

                    }
                    else
                    {
                        $registro = Servicios::where('id_responsable',$responsable->id)->first();
                        if($registro)
                        {
                            /** SERVICIOS */
                            $institucion = $registro;
                            $tipo_institucion = 'servicio';
                        }
                        else
                        {

                            $result_contrato = ContratoDependiente::where('tipo_empleado', 'like', '%ADMINISTRADOR%')
                                    ->where('id_empleado', $responsable->id)
                                    ->whereIn('estado', [2,3])
                                    ->first();

                            if($result_contrato)
                            {
                                $registro = Instituciones::where('id',$result_contrato->id_institucion)->first();
                                if($registro)
                                {
                                    /** INSTITUCION */
                                    $institucion = $registro;
                                    $tipo_institucion = 'institucion';
                                }
                                else
                                {
                                    $registro = Servicios::where('id',$result_contrato->id_institucion)->first();
                                    if($registro)
                                    {
                                        /** SERVICIOS */
                                        $institucion = $registro;
                                        $tipo_institucion = 'servicio';
                                    }
                                    else
                                    {
                                        return back()->with('error','Institución no encontrada');
                                    }
                                }
                            }
                            else
                            {
                                return back()->with('error','Permisos de usuario no validos para Ingresar al modulo');
                            }
                        }
                    }
                }
                else
                {
                    return back()->with('error','Institución no encontrada');
                }

            }
        }
        /** FIN INFORMACION DE INSTITUCION Y RESPONSABLE */

        /** CARGA DE ASISTENTES */
        $LugarAtencion = LugarAtencion::where('id',$institucion->id_lugar_atencion)->first();
        $lista_asistente = array();
        if($LugarAtencion)
        {
            $lista_asistente = $LugarAtencion->AsistenteIntitucion()->get();

            if($lista_asistente)
            {
                foreach ($lista_asistente as $key => $value)
                {

                    /** roles */
                    $usuario = User::where('id', $value->id_usuario)->first();

                    $roles = $usuario->roles()->get();

                    $array_roles = array();
                    foreach ($roles as $key_2 => $value_2) {
                        array_push($array_roles, $value_2->name);
                    }

                    if(!empty($array_roles))
                        $lista_asistente[$key]->roles = implode(",",$array_roles);
                    else
                        $lista_asistente[$key]->roles = '';

                    /** tipo asistente */
                    $lista_asistente[$key]->asistente_tipo = AsistenteTipo::find($value->id_asistente_tipo);

                    /** info contrato */
                    $filtro_cont = array();
                    $filtro_cont[] = array('id_lugar_atencion', $institucion->id_lugar_atencion);
                    $filtro_cont[] = array('id_empleado', $value->id);
                    $lista_asistente[$key]->contrato = ContratoDependiente::select('id', 'id_empleado', 'id_lugar_atencion')->where($filtro_cont)->first();
                }
            }
        }
        /** FIN CARGA DE ASISTENTES */
        $view = view("app.general.asistente.contenedor_asistentes_cm",compact('institucion','tipo_institucion','responsable','lista_asistente'))->render();
        $datos['asistentes'] = $lista_asistente;
        $datos['view'] = $view;

        return $datos;
    }

    public function editarPersonal(Request $request)
    {

        $datos = array();
        $error = array();
        $valido = 1;

        if($valido)
        {
            $registro_asistente = Asistente::find($request->id_empleado);

            if($registro_asistente)
            {
                $registro_contrato = ContratoDependiente::find($request->id_contrato);
                if($registro_contrato)
                {
                    $filtro = array();
                    $filtro[] = array('id_asistente',$request->id_empleado);
                    $filtro[] = array('id_lugar_atencion',$request->id_lugar_atencion);
                    $filtro[] = array('estado',1);
                    $registro_asis_lugar = AsistenteLugarAtencion::where($filtro)->first();


                    /** actualizar asistente */
                    $asistente_tipo = AsistenteTipo::where(DB::raw('UPPER(nombre)'), $request->tipo_empleado)->first();

                    // buscar el rol
                    $rol = Roles::where(DB::raw('UPPER(alias)'), strtoupper($request->tipo_empleado))->first();

                    if($asistente_tipo)
                        $registro_asistente->id_asistente_tipo = $asistente_tipo->id;

                    // asignar nuevo rol al usuario
                    $registro = User::find($registro_asistente->id_usuario);

                    if($rol)
                    {
                        $registro->syncRoles([$rol->id]);
                    }
                    else
                    {
                         $registro->syncRoles([$asistente_tipo->id]);
                        // $registro->syncRoles([]);
                    }

                    $registro_asistente->rut = $request->rut;
                    $registro_asistente->nombres = $request->nombre;
                    $registro_asistente->apellido_uno = $request->apellido_uno;
                    $registro_asistente->apellido_dos = $request->apellido_dos;
                    $registro_asistente->telefono_uno = $request->telefono;
                    if(!empty($request->telefono_dos))
                        $registro_asistente->telefono_dos = $request->telefono_dos;
                    $registro_asistente->sexo = $request->sexo;
                    $registro_asistente->email = $request->email;
                    $registro_asistente->fecha_nac = $request->fecha_nac;

                    if($registro_asistente->save())
                    {
                        $datos['update_asistente']['estado'] = 1;
                        $datos['update_asistente']['msj'] = 'Datos Asistente Actualizados';

                        /** MODIFICAR DIRECCION */
                        // $registro_asistente->id_direccion = $request->id_direccion;
                        $registro_direccion = Direccion::find($registro_asistente->id_direccion);

                        if($registro_direccion)
                        {
                            /** update de direccion */
                            $registro_direccion->direccion = $request->direccion;
                            $registro_direccion->numero_dir = $request->numero;
                            $registro_direccion->id_ciudad = $request->ciudad;

                            if($registro_direccion->save())
                            {
                                $datos['update_asistente']['direccion']['estado'] = 1;
                                $datos['update_asistente']['direccion']['msj'] = 'Datos Direccion Asistente Actualizados';
                            }
                            else
                            {
                                $datos['update_asistente']['direccion']['estado'] = 0;
                                $datos['update_asistente']['direccion']['msj'] = 'Datos Direccion Asistente Actualizacion con falla';
                            }

                        }
                        else
                        {
                            /** registro direccion */
                            $registro_direccion = new Direccion();
                            $registro_direccion->direccion = $request->direccion;
                            $registro_direccion->numero = $request->numero;
                            $registro_direccion->ciudad = $request->ciudad;

                            if($registro_direccion->save())
                            {
                                $datos['update_asistente']['direccion']['estado'] = 1;
                                $datos['update_asistente']['direccion']['msj'] = 'Datos Direccion Asistente Registrada';

                                $registro_asistente->id_direccion = $registro_direccion->id;
                                if($registro_asistente->save())
                                {
                                    $datos['update_asistente']['direccion']['registro']['estado'] = 1;
                                    $datos['update_asistente']['direccion']['registro']['msj'] = 'Datos Asistente Direccion Actualizado';
                                }
                                else
                                {
                                    $datos['update_asistente']['direccion']['registro']['estado'] = 0;
                                    $datos['update_asistente']['direccion']['registro']['msj'] = 'Datos Asistente Direccon con Falla';
                                }

                            }
                            else
                            {
                                $datos['update_asistente']['direccion']['estado'] = 0;
                                $datos['update_asistente']['direccion']['msj'] = 'Datos Direccion Asistente Registro con Falla';
                            }

                        }

                        /** ACTUALIZACION CONTRATO */

                        $registro = User::find(Auth::user()->id);
                        $roles = $registro->roles()->get();
                        $lista_roles = '';
                        foreach ($roles as $key => $value)
                            {
                            $lista_roles = $value->id.'|';
                        }
                        $lista_roles = substr($lista_roles, 0, -1);

                        $registro_contrato->tipo_empleado = $request->tipo_empleado;
                        $registro_contrato->rut = $request->rut;
                        $registro_contrato->nombres = $request->nombre;
                        $registro_contrato->apellido_uno = $request->apellido_uno;
                        $registro_contrato->apellido_dos = $request->apellido_dos;
                        $registro_contrato->telefono = $request->telefono;
                        $registro_contrato->email = $request->email;
                        $registro_contrato->id_institucion = $request->id_institucion;
                        $registro_contrato->id_lugar_atencion = $request->id_lugar_atencion;
                        $registro_contrato->tipo_contrato = $request->tipo_contrato;
                        $registro_contrato->fecha_inicio = $request->fecha_inicio;
                        $registro_contrato->fecha_termino = $request->fecha_termino;
                        $registro_contrato->monto_imponible = $request->monto_imponible;
                        $registro_contrato->locomocion = $request->locomocion;
                        $registro_contrato->locomocion_porcentaje = $request->locomocion_porcentaje;
                        $registro_contrato->colacion = $request->colacion;
                        $registro_contrato->colacion_porcentaje = $request->colacion_porcentaje;
                        $registro_contrato->asignacion_familiar = $request->asignacion_familiar;
                        $registro_contrato->asignacion_familiar_cantidad = $request->asignacion_familiar_cantidad;
                        $registro_contrato->caja_compensacion = $request->caja_compensacion;
                        $registro_contrato->caja_compensacion_porcentaje = $request->caja_compensacion_porcentaje;
                        // $registro_contrato->otro = '';
                        $registro_contrato->dias_laborales = implode(',', $request->dias_laborales);
                        $registro_contrato->hora_ingreso = $request->hora_entrada;
                        $registro_contrato->hora_salida = $request->hora_salida;
                        $registro_contrato->hora_inicio_colacion = $request->hora_entrada_colacion;
                        $registro_contrato->hora_termino_colacion = $request->hora_salida_colacion;
                        $registro_contrato->fecha_creacion = date('Y-m-d H:i:s');
                        $registro_contrato->id_admin_creador = Auth::user()->id;
                        $registro_contrato->id_tipo_admin_creador = $lista_roles;
                        // $registro_contrato->texto_contrato = '';
                        // $registro_contrato->pdf_base = '';
                        // $registro_contrato->estado_firmado = '';
                        // $registro_contrato->pdf_firmado = '';
                        // $registro_contrato->estado_inspeccion_trabajo = '';
                        // $registro_contrato->otro_2 = '';
                        // $registro_contrato->estado = '';

                        if($registro_contrato->save())
                        {

                            $datos['estado'] = 1;
                            $datos['msj'] = 'Exito';

                            $requestHistorico = new Request(array(
                                'id_contrato' => $registro_contrato->id,
                                'id_user' => Auth::user()->id,
                                'data' => json_encode($request->all()),
                                'fecha' => date('Y-m-d'),
                                'hora' => date('H:i:s'),
                                'tipo_verificacion_usuario' => null,
                                'codigo_verificacion_usuario' => null,
                                'fecha_codigo_usuario' => null,
                                'tipo_verificacion_tercero' => null,
                                'codigo_verificacion_tercero' => null,
                                'fecha_codigo_tercero' => null,
                                'procesado' => null,
                            ));
                            $datos['historico'] = static::registrarHistorico($requestHistorico);

                            $datos['update_contrato']['estado'] = 1;
                            $datos['update_contrato']['msj'] = 'Datos Contrato Asistente Actualizado';

                            /** ACTUALIZAR CONTRASEÑA DE ASISTENTE LUGAR DE ATENCION */
                            if($registro_asis_lugar)
                            {
                                $datos['asistente_lugar_atencion']['estado'] = 1;
                                $datos['asistente_lugar_atencion']['msj'] = 'Datos Asistente Lugar Atencion existente';
                            }
                            else
                            {
                                $asistente_lugar_atencion = new AsistenteLugarAtencion();
                                $asistente_lugar_atencion->id_asistente = $request->id_empleado;
                                $asistente_lugar_atencion->id_lugar_atencion = $request->id_lugar_atencion;
                                $asistente_lugar_atencion->token = $request->clave_ingreso;
                                $asistente_lugar_atencion->id_profesional = NULL;
                                $asistente_lugar_atencion->id_institucion = $request->id_institucion;
                                $asistente_lugar_atencion->estado = 1;

                                if($asistente_lugar_atencion->save())
                                {
                                    $datos['asignacion']['estado'] = 1;
                                    $datos['asignacion']['msj'] = 'Asignacion de asistente exitosa';
                                }
                                else
                                {
                                    $datos['estado'] = 0;
                                    $datos['msj'] = 'Falla en Asignando Asistente a Lugar de Atencion';

                                    $datos['asignacion']['estado'] = 0;
                                    $datos['asignacion']['msj'] = 'Asignacion de asistente fallida';
                                }
                            }
                        }
                        else
                        {
                            $datos['estado'] = 0;
                            $datos['msj'] = 'Falla en modificacion Contrato Asistente';

                            $datos['update_contrato']['estado'] = 0;
                            $datos['update_contrato']['msj'] = 'Datos Contrato Asistente Actualizacion con Falla';
                        }

                    }
                    else
                    {
                        $datos['estado'] = 0;
                        $datos['msj'] = 'Falla en modificacion Asistente';

                        $datos['update_asistente']['estado'] = 0;
                        $datos['update_asistente']['msj'] = 'Datos Asistente Actualizacion con Falla';
                    }
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'Contrato no encontrado';
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Asistente no encontrado';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campos requeridos';
            $datos['error'] = $error;
        }

        $institucion = '';
        $tipo_institucion = '1';
        $id_busqueda = Auth::user()->id;

        /** INFORMACION DE INSTITUCION Y RESPONSABLE */
        if(Auth::user()->id == 3)
        {
            $id_busqueda = 5;
            $registro = Instituciones::where('id', $id_busqueda)->first();
        }
        else
        {
            $registro = Instituciones::where('id_usuario',Auth::user()->id)->first();
        }

        if($registro)
        {
            // var_dump($registro);
            // var_dump($registro->UsuarioAdministrador()->first());
            //var_dump($registro->UsuarioAdministrador()->first()->id);
            /** INSTITUCION */
            $institucion = $registro;
            $responsable = AdminInstServ::where('id',$registro->UsuarioAdministrador()->first()->id)->first();
            $tipo_institucion = 'institucion';

        }
        else
        {
            $registro = Servicios::where('id_usuario',Auth::user()->id)->first();
            if($registro)
            {
                /** SERVICIOS */
                $institucion = $registro;
                $tipo_institucion = 'servicio';
            }
            else
            {
                /** busqueda por responsable */
                $responsable = AdminInstServ::where('id_admin',Auth::user()->id)->first();

                if($responsable)
                {
                    $registro = Instituciones::where('id_responsable',$responsable->id)->first();
                    if($registro)
                    {
                        // var_dump($registro);
                        // var_dump($registro->UsuarioAdministrador()->first());
                        /** INSTITUCION */
                        $institucion = $registro;
                        $tipo_institucion = 'institucion';

                    }
                    else
                    {
                        $registro = Servicios::where('id_responsable',$responsable->id)->first();
                        if($registro)
                        {
                            /** SERVICIOS */
                            $institucion = $registro;
                            $tipo_institucion = 'servicio';
                        }
                        else
                        {

                            $result_contrato = ContratoDependiente::where('tipo_empleado', 'like', '%ADMINISTRADOR%')
                                    ->where('id_empleado', $responsable->id)
                                    ->whereIn('estado', [2,3])
                                    ->first();

                            if($result_contrato)
                            {
                                $registro = Instituciones::where('id',$result_contrato->id_institucion)->first();
                                if($registro)
                                {
                                    /** INSTITUCION */
                                    $institucion = $registro;
                                    $tipo_institucion = 'institucion';
                                }
                                else
                                {
                                    $registro = Servicios::where('id',$result_contrato->id_institucion)->first();
                                    if($registro)
                                    {
                                        /** SERVICIOS */
                                        $institucion = $registro;
                                        $tipo_institucion = 'servicio';
                                    }
                                    else
                                    {
                                        return back()->with('error','Institución no encontrada');
                                    }
                                }
                            }
                            else
                            {
                                return back()->with('error','Permisos de usuario no validos para Ingresar al modulo');
                            }
                        }
                    }
                }
                else
                {
                    return back()->with('error','Institución no encontrada');
                }

            }
        }
        /** FIN INFORMACION DE INSTITUCION Y RESPONSABLE */

        /** CARGA DE ASISTENTES */
        $LugarAtencion = LugarAtencion::where('id',$institucion->id_lugar_atencion)->first();
        $lista_asistente = array();
        if($LugarAtencion)
        {
            $lista_asistente = $LugarAtencion->AsistenteIntitucion()->get();

            if($lista_asistente)
            {
                foreach ($lista_asistente as $key => $value)
                {

                    /** roles */
                    $usuario = User::where('id', $value->id_usuario)->first();

                    $roles = $usuario->roles()->get();

                    $array_roles = array();
                    foreach ($roles as $key_2 => $value_2) {
                        array_push($array_roles, $value_2->name);
                    }

                    if(!empty($array_roles))
                        $lista_asistente[$key]->roles = implode(",",$array_roles);
                    else
                        $lista_asistente[$key]->roles = '';

                    /** tipo asistente */
                    $lista_asistente[$key]->asistente_tipo = AsistenteTipo::find($value->id_asistente_tipo);

                    /** info contrato */
                    $filtro_cont = array();
                    $filtro_cont[] = array('id_lugar_atencion', $institucion->id_lugar_atencion);
                    $filtro_cont[] = array('id_empleado', $value->id);
                    $lista_asistente[$key]->contrato = ContratoDependiente::select('id', 'id_empleado', 'id_lugar_atencion')->where($filtro_cont)->first();
                }
            }
        }
        /** FIN CARGA DE ASISTENTES */
        $view = view("app.general.asistente.contenedor_asistentes_cm",compact('institucion','tipo_institucion','responsable','lista_asistente'))->render();
        $datos['asistentes'] = $lista_asistente;
        $datos['view'] = $view;

        return $datos;
    }

    public function editarProfesional(Request $request){

        $datos = array();
        $error = array();
        $valido = 1;

        if($valido)
        {
            $registro_profesional = Profesional::find($request->id_prof);
            if($registro_profesional)
            {
                $registro_contrato = ContratoDependienteProfesional::find($request->id_contrato);

                if($registro_contrato)
                {
                    $filtro = array();
                    $filtro[] = array('id_profesional',$request->id_prof);
                    $filtro[] = array('id_lugar_atencion',$request->id_lugar_atencion);
                    $filtro[] = array('estado',1);
                    $registro_prof_lugar = ProfesionalesLugaresAtencion::where($filtro)->first();

                    $registro_profesional->rut = $request->rut;
                    $registro_profesional->nombre = $request->nombre;
                    $registro_profesional->apellido_uno = $request->apellido1;
                    $registro_profesional->apellido_dos = $request->apellido2;
                    $registro_profesional->telefono_uno = $request->telefono1;
                    if(!empty($request->telefono2))
                        $registro_profesional->telefono_dos = $request->telefono2;
                    $registro_profesional->sexo = $request->sexo;
                    $registro_profesional->email = $request->email;
                    $registro_profesional->fecha_nacimiento = $request->fecha_nacimiento;

                    if($registro_profesional->save())
                    {
                        $datos['update_profesionales']['estado'] = 1;
                        $datos['update_profesionales']['msj'] = 'Datos Profesional Actualizados';

                        /** MODIFICAR DIRECCION */
                        // $registro_asistente->id_direccion = $request->id_direccion;
                        $registro_direccion = Direccion::find($registro_profesional->id_direccion);
                        if($registro_direccion)
                        {
                            /** update de direccion */
                            $registro_direccion->direccion = $request->direccion;
                            $registro_direccion->numero = $request->numero;
                            $registro_direccion->ciudad = $request->ciudad;

                            if($registro_profesional->save())
                            {
                                $datos['update_profesionales']['direccion']['estado'] = 1;
                                $datos['update_profesionales']['direccion']['msj'] = 'Datos Direccion Profesional Actualizados';
                            }
                            else
                            {
                                $datos['update_profesionales']['direccion']['estado'] = 0;
                                $datos['update_profesionales']['direccion']['msj'] = 'Datos Direccion Profesional Actualizacion con falla';
                            }

                        }
                        else
                        {
                            /** registro direccion */
                            $registro_direccion = new Direccion();
                            $registro_direccion->direccion = $request->direccion;
                            $registro_direccion->numero = $request->numero;
                            $registro_direccion->ciudad = $request->ciudad;

                            if($registro_direccion->save())
                            {
                                $datos['update_profesionales']['direccion']['estado'] = 1;
                                $datos['update_profesionales']['direccion']['msj'] = 'Datos Direccion Profesional Registrada';

                                $registro_profesional->id_direccion = $registro_direccion->id;
                                if($registro_profesional->save())
                                {
                                    $datos['update_profesionales']['direccion']['registro']['estado'] = 1;
                                    $datos['update_profesionales']['direccion']['registro']['msj'] = 'Datos Profesional Direccion Actualizado';
                                }
                                else
                                {
                                    $datos['update_profesionales']['direccion']['registro']['estado'] = 0;
                                    $datos['update_profesionales']['direccion']['registro']['msj'] = 'Datos Profesional Direccon con Falla';
                                }

                            }
                            else
                            {
                                $datos['update_profesionales']['direccion']['estado'] = 0;
                                $datos['update_profesionales']['direccion']['msj'] = 'Datos Direccion Profesional Registro con Falla';
                            }

                        }
                    }
                    else
                    {
                        $datos['update_profesionales']['estado'] = 0;
                        $datos['update_profesionales']['msj'] = 'Datos Profesional Actualizacion con falla';
                    }

                    /** ACTUALIZACION CONTRATO */

                    $registro = User::find(Auth::user()->id);
                    $roles = $registro->roles()->get();
                    $lista_roles = '';
                    foreach ($roles as $key => $value)
                        {
                        $lista_roles = $value->id.'|';
                    }
                    $lista_roles = substr($lista_roles, 0, -1);

                    $registro_contrato->id_especialidad = $request->profesion;
                    $registro_contrato->id_tipo_especialidad = $request->especialidad;
                    $registro_contrato->id_subtipo_especialidad = $request->sub_especialidad;
                    $registro_contrato->id_profesional = $request->id_prof;
                    $registro_contrato->rut = $request->rut;
                    $registro_contrato->nombres = $request->nombre;
                    $registro_contrato->apellido_uno = $request->apellido1;
                    $registro_contrato->apellido_dos = $request->apellido2;
                    $registro_contrato->telefono = $request->telefono1;
                    $registro_contrato->email = $request->email;
                    $registro_contrato->id_institucion = $request->id_institucion;
                    $registro_contrato->id_lugar_atencion = $request->id_lugar_atencion;
                    $registro_contrato->tipo_contrato = $request->tipo_contrato;
                    $registro_contrato->fecha_inicio = $request->fecha_inicio;
                    $registro_contrato->fecha_termino = $request->fecha_termino;
                    $registro_contrato->monto_imponible = $request->monto_imponible;
                    $registro_contrato->id_banco = $request->banco;
                    $registro_contrato->numero_cuenta = $request->n_cta;
                    $registro_contrato->sucursal = $request->sucursal;
                    $registro_contrato->locomocion = $request->locomocion;
                    $registro_contrato->locomocion_porcentaje = $request->locomocion_porcentaje;
                    $registro_contrato->colacion = $request->colacion;
                    $registro_contrato->colacion_porcentaje = $request->colacion_porcentaje;
                    $registro_contrato->asignacion_familiar = $request->asignacion_familiar;
                    $registro_contrato->asignacion_familiar_cantidad = $request->asignacion_familiar_cantidad;
                    $registro_contrato->caja_compensacion = $request->caja_compensacion;
                    $registro_contrato->caja_compensacion_porcentaje = $request->caja_compensacion_porcentaje;
                    $registro_contrato->otro = $request->otro;
                    $registro_contrato->dias_laborales = implode(',', $request->dias_laborales);
                    $registro_contrato->hora_ingreso = $request->hora_entrada;
                    $registro_contrato->hora_salida = $request->hora_salida;
                    $registro_contrato->hora_inicio_colacion = $request->hora_entrada_colacion;
                    $registro_contrato->hora_termino_colacion = $request->hora_salida_colacion;
                    $registro_contrato->fecha_creacion = date('Y-m-d H:i:s');

                    if($registro_contrato->save()){
                        $datos['update_contrato']['estado'] = 1;
                        $datos['update_contrato']['msj'] = 'Datos Contrato Profesional Actualizado';
                        $datos['estado'] = 1;
                    }else{
                        $datos['update_contrato']['estado'] = 0;
                        $datos['update_contrato']['msj'] = 'Datos Contrato Profesional Actualizacion con Falla';
                        $datos['estado'] = 0;
                    }
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'Contrato no encontrado';
                }

            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Profesional no encontrado';
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

    public function editarAdministrativo(Request $request){

        try {
            $datos = array();
            $error = array();
            $valido = 1;

            if($valido)
            {
                $registro_administrativo = AdminInstServ::find($request->id_administrativo);

                if($registro_administrativo)
                {
                    $registro_contrato = ContratoDependiente::find($request->id_contrato);

                    if($registro_contrato)
                    {
                        $filtro = array();
                        $filtro[] = array('id_admin',$request->id_administrativo);
                        $filtro[] = array('id_lugar_atencion',$request->id_lugar_atencion);
                        $filtro[] = array('estado',1);
                        $registro_admin_lugar = AdminLugarAtencion::where($filtro)->first();

                        $registro_administrativo->rut = $request->rut;
                        $registro_administrativo->nombres = $request->nombre;
                        $registro_administrativo->apellido_uno = $request->apellido1;
                        $registro_administrativo->apellido_dos = $request->apellido2;
                        $registro_administrativo->telefono_uno = $request->telefono;
                        if(!empty($request->telefono2))
                            $registro_administrativo->telefono_dos = $request->telefono2;
                        $registro_administrativo->sexo = $request->sexo;
                        $registro_administrativo->email = $request->email;
                        $registro_administrativo->fecha_nac = $request->fecha_nacimiento;

                        try {
                            if($registro_administrativo->save())
                            {
                                $datos['update_administrativo']['estado'] = 1;
                                $datos['update_administrativo']['msj'] = 'Datos Administrativo Actualizados';

                                /** MODIFICAR DIRECCION */
                                // $registro_asistente->id_direccion = $request->id_direccion;
                                $registro_direccion = Direccion::find($registro_administrativo->id_direccion);

                                if($registro_direccion)
                                {
                                    /** update de direccion */
                                    $registro_direccion->direccion = $request->direccion;
                                    $registro_direccion->numero_dir = $request->numero;
                                    $registro_direccion->id_ciudad = $request->ciudad;

                                    if($registro_direccion->update())
                                    {
                                        $datos['update_administrativo']['direccion']['estado'] = 1;
                                        $datos['update_administrativo']['direccion']['msj'] = 'Datos Direccion Administrativo Actualizados';
                                    }
                                    else
                                    {
                                        $datos['update_administrativo']['direccion']['estado'] = 0;
                                        $datos['update_administrativo']['direccion']['msj'] = 'Datos Direccion Administrativo Actualizacion con falla';
                                    }

                                    if($registro_administrativo->save())
                                    {
                                        $datos['update_administrativo']['direccion']['estado'] = 1;
                                        $datos['update_administrativo']['direccion']['msj'] = 'Datos Direccion Administrativo Actualizados';
                                    }
                                    else
                                    {
                                        $datos['update_administrativo']['direccion']['estado'] = 0;
                                        $datos['update_administrativo']['direccion']['msj'] = 'Datos Direccion Administrativo Actualizacion con falla';
                                    }

                                }

                                else
                                {
                                    /** registro direccion */
                                    $registro_direccion = new Direccion();
                                    $registro_direccion->direccion = $request->direccion;
                                    $registro_direccion->numero_dir = $request->numero;
                                    $registro_direccion->id_ciudad = $request->ciudad;

                                    if($registro_direccion->save())
                                    {
                                        $datos['update_administrativo']['direccion']['estado'] = 1;
                                        $datos['update_administrativo']['direccion']['msj'] = 'Datos Direccion Administrativo Registrada';

                                        $registro_administrativo->id_direccion = $registro_direccion->id;
                                        if($registro_administrativo->save())
                                        {
                                            $datos['update_administrativo']['direccion']['registro']['estado'] = 1;
                                            $datos['update_administrativo']['direccion']['registro']['msj'] = 'Datos Administrativo Direccion Actualizado';
                                        }
                                        else
                                        {
                                            $datos['update_administrativo']['direccion']['registro']['estado'] = 0;
                                            $datos['update_administrativo']['direccion']['registro']['msj'] = 'Datos Administrativo Direccon con Falla';
                                        }

                                    }
                                    else
                                    {
                                        $datos['update_administrativo']['direccion']['estado'] = 0;
                                        $datos['update_administrativo']['direccion']['msj'] = 'Datos Direccion Administrativo Registro con Falla';
                                    }

                                }

                            }else{
                                $datos['update_administrativo']['estado'] = 0;
                                $datos['update_administrativo']['msj'] = 'Datos Administrativo Actualizacion con falla';
                            }
                        } catch (\Exception $e) {
                            //throw $th;
                            return $e->getMessage();
                        }

                        /** ACTUALIZACION CONTRATO */

                        $registro = User::find(Auth::user()->id);
                        $roles = $registro->roles()->get();
                        $lista_roles = '';
                        foreach ($roles as $key => $value)
                        {
                            $lista_roles = $value->id.'|';
                        }
                        $lista_roles = substr($lista_roles, 0, -1);


                        $registro_contrato->tipo_empleado = $request->tipo_empleado;
                        $registro_contrato->rut = $request->rut;
                        $registro_contrato->nombres = $request->nombres;
                        $registro_contrato->apellido_uno = $request->apellido1;
                        $registro_contrato->apellido_dos = $request->apellido2;
                        $registro_contrato->telefono = $request->telefono;
                        $registro_contrato->email = $request->email;
                        $registro_contrato->id_institucion = $request->id_institucion;
                        $registro_contrato->id_lugar_atencion = $request->id_lugar_atencion;
                        $registro_contrato->tipo_contrato = $request->tipo_contrato;
                        $registro_contrato->fecha_inicio = $request->fecha_inicio;
                        $registro_contrato->fecha_termino = $request->fecha_termino;
                        $registro_contrato->monto_imponible = $request->monto_imponible;
                        $registro_contrato->locomocion = $request->locomocion;
                        $registro_contrato->locomocion_porcentaje = $request->locomocion_porcentaje;
                        $registro_contrato->colacion = $request->colacion;
                        $registro_contrato->colacion_porcentaje = $request->colacion_porcentaje;
                        $registro_contrato->asignacion_familiar = $request->asignacion_familiar;
                        $registro_contrato->asignacion_familiar_cantidad = $request->asignacion_familiar_cantidad;
                        $registro_contrato->caja_compensacion = $request->caja_compensacion;
                        $registro_contrato->caja_compensacion_porcentaje = $request->caja_compensacion_porcentaje;
                        // $registro_contrato->otro = '';
                        $registro_contrato->dias_laborales = implode(',', $request->dias_laborales);
                        $registro_contrato->hora_ingreso = $request->hora_entrada;
                        $registro_contrato->hora_salida = $request->hora_salida;
                        $registro_contrato->hora_inicio_colacion = $request->hora_entrada_colacion;
                        $registro_contrato->hora_termino_colacion = $request->hora_salida_colacion;
                        $registro_contrato->fecha_creacion = date('Y-m-d H:i:s');
                        $registro_contrato->id_admin_creador = Auth::user()->id;
                        $registro_contrato->id_tipo_admin_creador = $lista_roles;

                        if($registro_contrato->save())
                        {
                            $datos['update_contrato']['estado'] = 1;
                            $datos['update_contrato']['msj'] = 'Datos Contrato Administrativo Actualizado';

                            $requestHistorico = new Request(array(
                                'id_contrato' => $registro_contrato->id,
                                'id_user' => Auth::user()->id,
                                'data' => json_encode($request->all()),
                                'fecha' => date('Y-m-d'),
                                'hora' => date('H:i:s'),
                                'tipo_verificacion_usuario' => null,
                                'codigo_verificacion_usuario' => null,
                                'fecha_codigo_usuario' => null,
                                'tipo_verificacion_tercero' => null,
                                'codigo_verificacion_tercero' => null,
                                'fecha_codigo_tercero' => null,
                                'procesado' => null,
                            ));
                            $datos['historico'] = static::registrarHistorico($requestHistorico);

                            $datos['estado'] = 1;
                        }
                        else
                        {
                            $datos['update_contrato']['estado'] = 0;
                            $datos['update_contrato']['msj'] = 'Datos Contrato Administrativo Actualizacion con Falla';
                            $datos['estado'] = 0;
                        }

                    }
                    else
                    {
                        $datos['estado'] = 0;
                        $datos['msj'] = 'Contrato no encontrado';
                    }

                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'Administrativo no encontrado';
                }

            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'campos requeridos';
                $datos['error'] = $error;
            }

            return $datos;
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }

    public function editarMantencion(Request $request){
        try {
            $datos = array();
            $error = array();
            $valido = 1;

            if($valido)
            {
                $registro_mantencion = AdminMantenInst::find($request->id_mantencion);

                if($registro_mantencion)
                {
                    $registro_contrato = ContratoDependiente::find($request->id_contrato_mantencion);


                    if($registro_contrato)
                    {
                        $filtro = array();
                        $filtro[] = array('id_admin',$request->id_mantencion);
                        $filtro[] = array('id_lugar_atencion',$request->id_lugar_atencion);
                        $filtro[] = array('estado',1);
                        $registro_mantencion_lugar = MantencionLugarAtencion::where($filtro)->first();

                        $registro_mantencion->rut = $request->rut;
                        $registro_mantencion->nombre = $request->nombre;
                        $registro_mantencion->apellido_paterno = $request->apellido_uno;
                        $registro_mantencion->apellido_materno = $request->apellido_dos;
                        $registro_mantencion->telefono_uno = $request->telefono;
                        if(!empty($request->telefono2))
                            $registro_mantencion->telefono_dos = $request->telefono2;
                        $registro_mantencion->sexo = $request->sexo;
                        $registro_mantencion->email = $request->email;
                        $registro_mantencion->fecha_nac = $request->fecha_nacimiento;

                        try {
                            if($registro_mantencion->save())
                            {
                                $datos['update_mantencion']['estado'] = 1;
                                $datos['update_mantencion']['msj'] = 'Datos Mantencion Actualizados';

                                /** MODIFICAR DIRECCION */
                                // $registro_asistente->id_direccion = $request->id_direccion;
                                $registro_direccion = Direccion::find($registro_mantencion->id_direccion);

                                if($registro_direccion)
                                {
                                    /** update de direccion */
                                    $registro_direccion->direccion = $request->direccion;
                                    $registro_direccion->numero_dir = $request->numero;
                                    $registro_direccion->id_ciudad = $request->ciudad;
                                }

                                if($registro_direccion->update())
                                {
                                    $datos['update_mantencion']['direccion']['estado'] = 1;
                                    $datos['update_mantencion']['direccion']['msj'] = 'Datos Direccion Mantencion Actualizados';
                                }
                                else
                                {
                                    $datos['update_mantencion']['direccion']['estado'] = 0;
                                    $datos['update_mantencion']['direccion']['msj'] = 'Datos Direccion Mantencion Actualizacion con falla';
                                }

                                if($registro_mantencion->save())
                                {
                                    $datos['update_mantencion']['direccion']['estado'] = 1;
                                    $datos['update_mantencion']['direccion']['msj'] = 'Datos Direccion Mantencion Actualizados';
                                }
                                else
                                {
                                    $datos['update_mantencion']['direccion']['estado'] = 0;
                                    $datos['update_mantencion']['direccion']['msj'] = 'Datos Direccion Mantencion Actualizacion con falla';
                                }

                            }

                            else
                            {
                                $datos['update_mantencion']['estado'] = 0;
                                $datos['update_mantencion']['msj'] = 'Datos Mantencion Actualizacion con falla';
                            }



                                 /** ACTUALIZACION CONTRATO */
                                 $registro_contrato->tipo_empleado = $request->tipo_empleado;
                                 $registro_contrato->rut = $request->rut;
                                    $registro_contrato->nombres = $request->nombre;
                                    $registro_contrato->apellido_uno = $request->apellido1;
                                    $registro_contrato->apellido_dos = $request->apellido2;
                                    $registro_contrato->telefono = $request->telefono;
                                    $registro_contrato->email = $request->email;
                                    $registro_contrato->id_institucion = $request->id_institucion;
                                    $registro_contrato->id_lugar_atencion = $request->id_lugar_atencion;
                                    $registro_contrato->tipo_contrato = $request->tipo_contrato;
                                    $registro_contrato->fecha_inicio = $request->fecha_inicio;
                                    $registro_contrato->fecha_termino = $request->fecha_termino;
                                    $registro_contrato->monto_imponible = $request->monto_imponible;
                                    $registro_contrato->locomocion = $request->locomocion;
                                    $registro_contrato->locomocion_porcentaje = $request->locomocion_porcentaje;
                                    $registro_contrato->colacion = $request->colacion;
                                    $registro_contrato->colacion_porcentaje = $request->colacion_porcentaje;
                                    $registro_contrato->asignacion_familiar = $request->asignacion_familiar;
                                    $registro_contrato->asignacion_familiar_cantidad = $request->asignacion_familiar_cantidad;
                                    $registro_contrato->caja_compensacion = $request->caja_compensacion;
                                    $registro_contrato->caja_compensacion_porcentaje = $request->caja_compensacion_porcentaje;
                                    // $registro_contrato->otro = '';
                                    $registro_contrato->dias_laborales = implode(',', $request->dias_laborales);
                                    $registro_contrato->hora_ingreso = $request->hora_entrada;
                                    $registro_contrato->hora_salida = $request->hora_salida;
                                    $registro_contrato->hora_inicio_colacion = $request->hora_entrada_colacion;
                                    $registro_contrato->hora_termino_colacion = $request->hora_salida_colacion;
                                    $registro_contrato->fecha_creacion = date('Y-m-d H:i:s');
                                    $registro_contrato->id_admin_creador = Auth::user()->id;

                                    if($registro_contrato->save())
                                    {
                                        $datos['update_contrato']['estado'] = 1;
                                        $datos['update_contrato']['msj'] = 'Datos Contrato Mantencion Actualizado';
                                        $datos['estado'] = 1;
                                    }
                                    else
                                    {
                                        $datos['update_contrato']['estado'] = 0;
                                        $datos['update_contrato']['msj'] = 'Datos Contrato Mantencion Actualizacion con Falla';
                                        $datos['estado'] = 0;
                                    }

                        } catch (\Exception $e) {
                            //throw $th;
                            return $e->getMessage();
                        }
                    }
                    else
                    {
                        $datos['estado'] = 0;
                        $datos['msj'] = 'Contrato no encontrado';
                    }

                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Mantencion no encontrado';
            }

        }
        catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();

        }

        return $datos;
    }

    static public function registroPerfil($registros)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($registros->rut))
        {
            $error['rut'] = 'Campo requerido';
            $valido = 0;
        }
        if(empty($registros->nombre))
        {
            $error['nombre'] = 'Campo requerido';
            $valido = 0;
        }
        if(empty($registros->apellido_uno))
        {
            $error['apellido_uno'] = 'Campo requerido';
            $valido = 0;
        }
        if(empty($registros->apellido_dos))
        {
            $error['apellido_dos'] = 'Campo requerido';
            $valido = 0;
        }
        if(empty($registros->fecha_nacimiento))
        {
            $error['fecha_nacimiento'] = 'Campo requerido';
            $valido = 0;
        }
        if(empty($registros->sexo))
        {
            $error['sexo'] = 'Campo requerido';
            $valido = 0;
        }
        if(empty($registros->email))
        {
            $error['email'] = 'Campo requerido';
            $valido = 0;
        }
        if(empty($registros->telefono))
        {
            $error['telefono'] = 'Campo requerido';
            $valido = 0;
        }
        if(empty($registros->direccion))
        {
            $error['direccion'] = 'Campo requerido';
            $valido = 0;
        }
        if(empty($registros->numero))
        {
            $error['numero'] = 'Campo requerido';
            $valido = 0;
        }
        if(empty($registros->ciudad))
        {
            $error['ciudad'] = 'Campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            // $lista_tipo_asitente = array('ASISTENTE PUBLICO', 'ASISTENTE JEFA CAJA', 'ASISTENTE ADMINISTRATIVO', 'ASISTENTE ONLINE', 'ASISTENTE CONSULTA');
            // $lista_tipo_admi_inst_serv = array('ADMINISTRADOR DE CM', 'ADMINISTRADOR DE SERVICIOS');
            // 1 - Asistente Publico
            // 2 - Asistente Jefa Caja
            // 3 - Asistente Administrativo
            // 4 - Asistente Online
            // 5 - Asistente Consulta
            // 5 - Asistente Consulta
            $tipo = 0;
            $rol_asignar = '';
            $id_asistente = 0;
            $id_asistente_user = 0;
            switch ($registros->tipo_contrato) {
                case 'ASISTENTE PUBLICO':
                    if($tipo == 0){
                        $rol_asignar = 'Asistente';
                        $tipo = 1;
                    }
                case 'ASISTENTE JEFA CAJA':
                    if($tipo == 0){
                        $rol_asignar = 'AsistenteJefaCaja';
                        $tipo = 2;
                    }
                case 'ASISTENTE ADMINISTRATIVO':
                    if($tipo == 0){
                        $rol_asignar = 'AsistenteAdm';
                        $tipo = 3;
                    }
                case 'ASISTENTE ONLINE':
                    if($tipo == 0){
                        $rol_asignar = 'AsistenteOnline';
                        $tipo = 4;
                    }
                case 'ASISTENTE CONSULTA':
                    if($tipo == 0){
                        $rol_asignar = 'Asistente Consulta';
                        $tipo = 5;
                    }
                case 'ASISTENTE MANEJO DE AGENDA':
                    if($tipo == 0){
                        $rol_asignar = 'Asistente Manejo de Agenda';
                        $tipo = 6;
                    }
                case 'ASISTENTE LABORATORIO':
                    if($tipo == 0){
                        $rol_asignar = 'Asistente Laboratorio';
                        $tipo = 12;
                    }

                    $validar_asistente = Asistente::where('email', $registros->email)->first();
                    if($validar_asistente)
                    {
                        /** asistente existente */
                        $id_asistente = $validar_asistente->id;
                        $id_asistente_user = $validar_asistente->id_usuario;
                    }
                    else
                    {
                        /** buscar usuario relacionado */
                        $validarUsuarios = Paciente::where('email', $registros->email)->first();
                        if(!$validarUsuarios)
                        {
                            $validarUsuarios = Profesional::where('email', $registros->email)->first();
                            if(!$validarUsuarios)
                            {
                                $validarUsuarios = AdminInstServ::where('email', $registros->email)->first();
                            }
                            else
                            {
                                $id_asistente_user = $validarUsuarios->id_usuario;
                            }
                        }
                        else
                        {
                            $id_asistente_user = $validarUsuarios->id_usuario;
                        }

                        /** asistente a crear */
                        $registro_asistente = new Asistente();
                        $registro_asistente->rut = $registros->rut;
                        $registro_asistente->id_asistente_tipo = $tipo;
                        $registro_asistente->nombres = $registros->nombre;
                        $registro_asistente->apellido_uno = $registros->apellido_uno;
                        $registro_asistente->apellido_dos = $registros->apellido_dos;
                        $registro_asistente->fecha_nac = $registros->fecha_nacimiento;
                        $registro_asistente->sexo = $registros->sexo;
                        $registro_asistente->id_usuario = (empty($id_asistente_user))?0:$id_asistente_user;
                        $registro_asistente->email = $registros->email;
                        $registro_asistente->telefono_uno = $registros->telefono;
                        $registro_asistente->telefono_dos = '';

                        $direccion = new Direccion();
                        $direccion->direccion = $registros->direccion;
                        $direccion->numero_dir = $registros->numero;
                        $direccion->id_ciudad = $registros->ciudad;
                        if ($direccion->save())
                        {
                            $registro_asistente->id_direccion = $direccion->id;
                            $datos['registro']['direccion']['estado'] = 1;
                            $datos['registro']['direccion']['msj'] = 'registro exitoso';
                        }
                        else
                        {
                            $registro_asistente->id_direccion = 0;
                            $datos['registro']['direccion']['estado'] = 0;
                            $datos['registro']['direccion']['msj'] = 'falla al registrar';
                        }

                        if($registro_asistente->save())
                        {
                            $datos['registro_asistente']['estado'] = 1;
                            $datos['registro_asistente']['msj'] = 'registro';

                            $id_asistente = $registro_asistente->id;
                            if(empty($id_asistente_user))
                            {
                                $asistente_user = new User();
                                $asistente_user->email = $registros->email;
                                $pass_temp = rand(11111,99999);
                                $asistente_user->password = Hash::make($pass_temp);
                                $asistente_user->name = $registros->nombre.' '.$registros->apellido_uno.' '.$registros->apellido_dos;
                                if ($asistente_user->save())
                                {
                                    $datos['user']['estado'] = 1;
                                    $datos['user']['result'] = $asistente_user;
                                    /** asignando rol de adminstrador de institucion */
                                    $asistente_user->assignRole($rol_asignar);
                                    $id_asistente_user = $asistente_user->id;

                                    /** envio de correo de confirmacion  */
                                    $blade = 'bienvenida_asistente_usuario';
                                    $to = array(
                                            array('email' => $asistente_user->email,'name' => $asistente_user->name),
                                        );
                                    $cc = array();
                                    $bcc = array();
                                    $asunto = 'MED-SDI - Bienvenido!';
                                    $body = array(
                                        'nombre' => $asistente_user->name,
                                        'user' => $asistente_user->email,
                                        'pass' => $pass_temp,
                                    );
                                    $archivo = '';/** pendiente */
                                    $id_institucion = '';

                                    $result_mail =  SendMailController::envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, $id_institucion);

                                    if($result_mail['estado'])
                                    {
                                        $datos['mail']['estado'] = 1;
                                        $datos['mail']['msj'] = 'Notificacion de bienvenida enviado';
                                    }
                                    else
                                    {
                                        $datos['mail']['estado'] = 0;
                                        $datos['mail']['msj'] = 'Falle en envio de Notificacion de bienvenida';
                                    }
                                }
                                else
                                {
                                    $datos['user']['estado'] = 0;
                                    $datos['user']['result'] = $asistente_user;
                                }
                            }

                            $registro_asistente->id_usuario = (empty($id_asistente_user))?0:$id_asistente_user;

                            if($registro_asistente->save())
                            {
                                $datos['registro_asistente']['update']['estado'] = 1;
                                $datos['registro_asistente']['update']['msj'] = 'registro';
                            }
                            else
                            {
                                $datos['registro_asistente']['update']['estado'] = 0;
                                $datos['registro_asistente']['update']['msj'] = 'fallo registro';
                            }
                        }
                        else
                        {
                            $datos['registro_asistente']['estado'] = 0;
                            $datos['registro_asistente']['msj'] = 'Problema al crear perfil';
                        }
                    }

                    // $id_asistente
                    // $id_asistente_user

                    $datos['estado'] = 1;
                    $datos['msj'] = 'perfil creado';
                    $datos['result'] = (object)array(
                        'id' => $id_asistente,
                        'id_user' => $id_asistente_user,
                    );

                    break;

                default:
                    # code...
                    break;
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campo requerido';
            $datos['error'] = $error;
        }

        return (object)$datos;
    }

    public function registroPerfilProfesional($registros)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($registros->rut))
        {
            $error['rut'] = 'Campo requerido';
            $valido = 0;
        }
        if(empty($registros->nombre))
        {
            $error['nombre'] = 'Campo requerido';
            $valido = 0;
        }
        if(empty($registros->apellido1))
        {
            $error['apellido_uno'] = 'Campo requerido';
            $valido = 0;
        }
        if(empty($registros->apellido2))
        {
            $error['apellido_dos'] = 'Campo requerido';
            $valido = 0;
        }
        if(empty($registros->fecha_nacimiento))
        {
            $error['fecha_nacimiento'] = 'Campo requerido';
            $valido = 0;
        }
        if(empty($registros->sexo))
        {
            $error['sexo'] = 'Campo requerido';
            $valido = 0;
        }
        if(empty($registros->email))
        {
            $error['email'] = 'Campo requerido';
            $valido = 0;
        }
        if(empty($registros->telefono1))
        {
            $error['telefono'] = 'Campo requerido';
            $valido = 0;
        }
        if(empty($registros->direccion))
        {
            $error['direccion'] = 'Campo requerido';
            $valido = 0;
        }
        if(empty($registros->comuna))
        {
            $error['ciudad'] = 'Campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $validar_profesional = Profesional::where('email', $registros->email)->first();

            if($validar_profesional)
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Profesional ya registrado';
                $datos['result'] = $validar_profesional;
            }
            else
            {
                // Buscar usuario relacionado
                $validarUsuarios = Paciente::where('email', $registros->email)->first();

                if(!$validarUsuarios)
                {
                    $validarUsuarios = Profesional::where('email', $registros->email)->first();

                    if(!$validarUsuarios)
                    {
                        $validarUsuarios = AdminInstServ::where('email', $registros->email)->first();
                    }
                    else
                    {
                        $id_asistente_user = $validarUsuarios->id_usuario;
                    }
                }
                else
                {
                    $id_asistente_user = $validarUsuarios->id_usuario;
                }

                $registro_profesional = new Profesional();
                $registro_profesional->nombre = $registros->nombre;
                $registro_profesional->apellido_uno = $registros->apellido1;
                $registro_profesional->apellido_dos = $registros->apellido2;
                $registro_profesional->sexo = $registros->sexo;
                $registro_profesional->rut = $registros->rut;
                $registro_profesional->fecha_nacimiento = $registros->fecha_nacimiento;
                $registro_profesional->email = $registros->email;
                $registro_profesional->bienvenida = 0;
                $registro_profesional->telefono_uno = $registros->telefono1;
                $registro_profesional->telefono_dos = '';
                $registro_profesional->estado = 1;
                $registro_profesional->certificado = 1;

                $registro_profesional->id_usuario = (empty($id_asistente_user))?0:$id_asistente_user;
                $registro_profesional->id_especialidad = $registros->profesion;
                $registro_profesional->id_tipo_especialidad = $registros->especialidad;
                $registro_profesional->id_sub_tipo_especialidad = $registros->sub_especialidad;


                $direccion = new Direccion();
                $direccion->direccion = $registros->direccion;
                $direccion->numero_dir =$registros->numero;
                $direccion->id_ciudad = $registros->comuna;

                if ($direccion->save())
                {
                    $registro_profesional->id_direccion = $direccion->id;
                    $datos['registro']['direccion']['estado'] = 1;
                    $datos['registro']['direccion']['msj'] = 'registro exitoso';
                }
                else
                {
                    $registro_profesional->id_direccion = 0;
                    $datos['registro']['direccion']['estado'] = 0;
                    $datos['registro']['direccion']['msj'] = 'falla al registrar';
                }

                if($registro_profesional->save()){

                    $datos['registro_profesional']['estado'] = 1;
                    $datos['registro_profesional']['msj'] = 'registro';

                    $id_profesional = $registro_profesional->id;

                    if(!empty($id_profesional))
                    {
                        $profesional_user = new User();
                        $profesional_user->email = $registro_profesional->email;
                        $pass_temp = rand(11111,99999);
                        $profesional_user->password = Hash::make($pass_temp);
                        $profesional_user->name = $registro_profesional->nombre.' '.$registro_profesional->apellido_uno.' '.$registro_profesional->apellido_dos;
                        if ($profesional_user->save())
                        {
                            $datos['user']['estado'] = 1;
                            $datos['user']['result'] = $profesional_user;
                            /** asignando rol de adminstrador de institucion */
                            $profesional_user->assignRole(3);
                            $profesional_user->assignRole(23);
                            $id_profesional_user = $profesional_user->id;

                            // asignamos el usuario al profesional
                            $registro_profesional->id_usuario = $id_profesional_user;
                            $registro_profesional->save();

                            /** envio de correo de confirmacion  */
                            $blade = 'bienvenida_asistente_usuario';
                            $to = array(
                                    array('email' => $profesional_user->email,'name' => $profesional_user->name),
                                );
                            $cc = array();
                            $bcc = array();
                            $asunto = 'MED-SDI - Bienvenido!';
                            $body = array(
                                'nombre' => $profesional_user->name,
                                'user' => $profesional_user->email,
                                'pass' => $pass_temp,
                            );
                            $archivo = '';/** pendiente */
                            $id_institucion = '';

                            $result_mail =  SendMailController::envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, $id_institucion);

                            if($result_mail['estado'])
                            {
                                $datos['mail']['estado'] = 1;
                                $datos['mail']['msj'] = 'Notificacion de bienvenida enviado';
                            }
                            else
                            {
                                $datos['mail']['estado'] = 0;
                                $datos['mail']['msj'] = 'Falle en envio de Notificacion de bienvenida';
                            }
                        }
                        else
                        {
                            $datos['user']['estado'] = 0;
                            $datos['user']['result'] = $profesiona_user;
                        }
                    }

                    $profesional_lugar_atencion = new ProfesionalesLugaresAtencion();
                    $profesional_lugar_atencion->id_profesional = $registro_profesional->id;
                    $profesional_lugar_atencion->id_lugar_atencion = $registros->id_lugar_atencion;
                    $profesional_lugar_atencion->estado = 1;

                    if($profesional_lugar_atencion->save())
                    {
                        $datos['profesional_lugar_atencion']['estado'] = 1;
                        $datos['profesional_lugar_atencion']['msj'] = 'Asignacion de profesional exitosa';
                    }
                    else
                    {
                        $datos['estado'] = 0;
                        $datos['msj'] = 'Falla en Asignando Profesional a Lugar de Atencion';

                        $datos['profesional_lugar_atencion']['estado'] = 0;
                        $datos['profesional_lugar_atencion']['msj'] = 'Asignacion de profesional fallida';
                    }

                    $registro_profesional->id_usuario = (empty($id_profesional_user))?0:$id_profesional_user;

                    if($registro_profesional->save())
                    {
                        $datos['registro_profesional']['update']['estado'] = 1;
                        $datos['registro_profesional']['update']['msj'] = 'registro';
                    }
                    else
                    {
                        $datos['registro_profesional']['update']['estado'] = 0;
                        $datos['registro_profesional']['update']['msj'] = 'fallo registro';
                    }
                }else{
                    $datos['registro_profesional']['estado'] = 0;
                    $datos['registro_profesional']['msj'] = 'Problema al crear perfil';
                }
            }

            $datos['estado'] = 1;
            $datos['msj'] = 'perfil creado';
            $datos['result'] = (object)array(
                'id_profesional' => $registro_profesional->id,
                'id_profesional_usuario' => $registro_profesional->id_usuario,
            );

        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campo requerido';
            $datos['error'] = $error;
        }

        return $datos;
    }

    public function registroPerfilAdministrativo($registros){
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($registros->rut))
        {
            $error['rut'] = 'Campo requerido';
            $valido = 0;
        }
        if(empty($registros->nombre))
        {
            $error['nombre'] = 'Campo requerido';
            $valido = 0;
        }
        if(empty($registros->apellido_uno))
        {
            $error['apellido_uno'] = 'Campo requerido';
            $valido = 0;
        }
        if(empty($registros->apellido_dos))
        {
            $error['apellido_dos'] = 'Campo requerido';
            $valido = 0;
        }
        if(empty($registros->fecha_nacimiento))
        {
            $error['fecha_nacimiento'] = 'Campo requerido';
            $valido = 0;
        }
        if(empty($registros->sexo))
        {
            $error['sexo'] = 'Campo requerido';
            $valido = 0;
        }
        if(empty($registros->email))
        {
            $error['email'] = 'Campo requerido';
            $valido = 0;
        }
        if(empty($registros->telefono))
        {
            $error['telefono'] = 'Campo requerido';
            $valido = 0;
        }
        if(empty($registros->direccion))
        {
            $error['direccion'] = 'Campo requerido';
            $valido = 0;
        }
        if(empty($registros->ciudad))
        {
            $error['ciudad'] = 'Campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $validar_administrativo = AdminInstServ::where('email', $registros->email)->first();

            if($validar_administrativo)
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Administrativo ya registrado';
                $datos['result'] = $validar_administrativo;
            }
            else
            {
                // Buscar usuario relacionado
                $validarUsuarios = Paciente::where('email', $registros->email)->first();

                if(!$validarUsuarios)
                {
                    $validarUsuarios = Profesional::where('email', $registros->email)->first();
                }
                else
                {
                    $id_admin_user = $validarUsuarios->id_usuario;
                }

                $registro_administrativo = new AdminInstServ();
                $registro_administrativo->nombres = $registros->nombre;
                $registro_administrativo->apellido_uno = $registros->apellido_uno;
                $registro_administrativo->apellido_dos = $registros->apellido_dos;
                $registro_administrativo->sexo = $registros->sexo;
                $registro_administrativo->rut = $registros->rut;
                $registro_administrativo->email = $registros->email;
                $registro_administrativo->id_tipo_administrador = 1;
                $registro_administrativo->bienvenido = 0;
                $registro_administrativo->telefono_uno = $registros->telefono;
                $registro_administrativo->telefono_dos = '';
                $registro_administrativo->estado = 1;

                $registro_administrativo->id_admin = (empty($id_asistente_user))?0:$id_asistente_user;

                $direccion = new Direccion();
                $direccion->direccion = $registros->direccion;
                $direccion->numero_dir =123;
                $direccion->id_ciudad = $registros->ciudad;

                if ($direccion->save())
                {
                    $registro_administrativo->id_direccion = $direccion->id;
                    $datos['registro']['direccion']['estado'] = 1;
                    $datos['registro']['direccion']['msj'] = 'registro exitoso';
                }
                else
                {
                    $registro_administrativo->id_direccion = 0;
                    $datos['registro']['direccion']['estado'] = 0;
                    $datos['registro']['direccion']['msj'] = 'falla al registrar';
                }

                if($registro_administrativo->save()){

                    $datos['registro_administrativo']['estado'] = 1;
                    $datos['registro_administrativo']['msj'] = 'registro';

                    $id_administrativo = $registro_administrativo->id;

                    if(!empty($id_administrativo))
                    {
                        $administrativo_user = new User();
                        $administrativo_user->email = $registro_administrativo->email;
                        $pass_temp = rand(11111,99999);
                        $administrativo_user->password = Hash::make($pass_temp);
                        $administrativo_user->name = $registro_administrativo->nombre.' '.$registro_administrativo->apellido_uno.' '.$registro_administrativo->apellido_dos;
                        if ($administrativo_user->save())
                        {
                            $datos['user']['estado'] = 1;
                            $datos['user']['result'] = $administrativo_user;
                            /** asignando rol de adminstrador de institucion */
                            // se asigna el rol dependiendo del tipo de contrato que viene en el request
                            $administrativo_user->assignRole(2);
                            $administrativo_user->assignRole(23);
                            $id_administrativo_user = $administrativo_user->id;

                            // asignamos el usuario al profesional
                            $registro_administrativo->id_admin = $id_administrativo_user;
                            $registro_administrativo->save();

                            /** envio de correo de confirmacion  */
                            $blade = 'bienvenida_asistente_usuario';
                            $to = array(
                                    array('email' => $administrativo_user->email,'name' => $administrativo_user->name),
                                );
                            $cc = array();
                            $bcc = array();
                            $asunto = 'MED-SDI - Bienvenido!';
                            $body = array(
                                'nombre' => $administrativo_user->name,
                                'user' => $administrativo_user->email,
                                'pass' => $pass_temp,
                            );
                            $archivo = '';/** pendiente */
                            $id_institucion = '';

                            $result_mail =  SendMailController::envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, $id_institucion);

                            if($result_mail['estado'])
                            {
                                $datos['mail']['estado'] = 1;
                                $datos['mail']['msj'] = 'Notificacion de bienvenida enviado';
                            }
                            else
                            {
                                $datos['mail']['estado'] = 0;
                                $datos['mail']['msj'] = 'Falle en envio de Notificacion de bienvenida';
                            }

                        }
                        else
                        {
                            $datos['user']['estado'] = 0;
                            $datos['user']['result'] = $administrativo_user;
                        }

                        $registro_administrativo->id_admin = (empty($id_administrativo_user))?0:$id_administrativo_user;

                        if($registro_administrativo->save())
                        {
                            $datos['registro_administrativo']['update']['estado'] = 1;
                            $datos['registro_administrativo']['update']['msj'] = 'registro';
                            $datos['estado'] = 1;
                            $datos['msj'] = 'perfil creado';
                            $datos['result'] = (object)array(
                                'id_administrativo' => $registro_administrativo->id,
                                'id_administrativo_usuario' => $registro_administrativo->id_admin,
                            );
                        }
                        else
                        {
                            $datos['registro_administrativo']['update']['estado'] = 0;
                            $datos['registro_administrativo']['update']['msj'] = 'fallo registro';
                        }
                    }
                }
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

    public function registroPerfilMantencion($registros){
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($registros->rut))
        {
            $error['rut'] = 'Campo requerido';
            $valido = 0;
        }
        if($registros->tipo_mantenedor != 1){
            if(empty($registros->nombre))
            {
                $error['nombre'] = 'Campo requerido';
                $valido = 0;
            }
            if(empty($registros->apellido_uno))
            {
                $error['apellido_uno'] = 'Campo requerido';
                $valido = 0;
            }
            if(empty($registros->apellido_dos))
            {
                $error['apellido_dos'] = 'Campo requerido';
                $valido = 0;
            }
            if(empty($registros->fecha_nacimiento))
            {
                $error['fecha_nacimiento'] = 'Campo requerido';
                $valido = 0;
            }
            if(empty($registros->sexo))
            {
                $error['sexo'] = 'Campo requerido';
                $valido = 0;
            }
        }

        if(empty($registros->email))
        {
            $error['email'] = 'Campo requerido';
            $valido = 0;
        }
        if(empty($registros->telefono))
        {
            $error['telefono'] = 'Campo requerido';
            $valido = 0;
        }
        if(empty($registros->direccion))
        {
            $error['direccion'] = 'Campo requerido';
            $valido = 0;
        }
        if(empty($registros->ciudad))
        {
            $error['ciudad'] = 'Campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $validar_mantencion = AdminMantenInst::where('email', $registros->email)->first();

            if($validar_mantencion)
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Mantencion ya registrado';
                $datos['result'] = $validar_mantencion;
            }
            else
            {
                // Buscar usuario relacionado
                $validarUsuarios = Paciente::where('email', $registros->email)->first();

                if(!$validarUsuarios)
                {
                    $validarUsuarios = Profesional::where('email', $registros->email)->first();
                }
                else
                {
                    $id_mantencion_user = $validarUsuarios->id_usuario;
                }

                $registro_mantencion = new AdminMantenInst();
                $registro_mantencion->empresa = $registros->tipo_mantenedor;
                $registro_mantencion->nombre = $registros->nombre;
                $registro_mantencion->apellido_paterno = $registros->apellido_uno;
                $registro_mantencion->apellido_materno = $registros->apellido_dos;
                $registro_mantencion->sexo = $registros->sexo;
                $registro_mantencion->rut = $registros->rut;
                $registro_mantencion->email = $registros->email;
                $registro_mantencion->bienvenido = 0;
                $registro_mantencion->telefono_uno = $registros->telefono;
                $registro_mantencion->telefono_dos = '';
                $registro_mantencion->estado = 1;

                $registro_mantencion->id_admin = (empty($id_mantencion_user))?0:$id_mantencion_user;

                $direccion = new Direccion();
                $direccion->direccion = $registros->direccion;
                $direccion->numero_dir =123;
                $direccion->id_ciudad = $registros->ciudad;

                if ($direccion->save())
                {
                    $registro_mantencion->id_direccion = $direccion->id;
                    $datos['registro']['direccion']['estado'] = 1;
                    $datos['registro']['direccion']['msj'] = 'registro exitoso';
                }
                else
                {
                    $registro_mantencion->id_direccion = 0;
                    $datos['registro']['direccion']['estado'] = 0;
                    $datos['registro']['direccion']['msj'] = 'falla al registrar';
                }

                if($registro_mantencion->save()){

                    $datos['registro_mantencion']['estado'] = 1;
                    $datos['registro_mantencion']['msj'] = 'registro';

                    $id_mantencion = $registro_mantencion->id;

                    if(!empty($id_mantencion))
                    {
                        // $mantencion_user = new User();
                        // $mantencion_user->email = $registro_mantencion->email;
                        // $pass_temp = rand(11111,99999);
                        // $mantencion_user->password = Hash::make($pass_temp);
                        // $mantencion_user->name = $registro_mantencion->nombre.' '.$registro_mantencion->apellido_uno.' '.$registro_mantencion->apellido_dos;
                        // if ($mantencion_user->save())
                        // {
                        //     $datos['user']['estado'] = 1;
                        //     $datos['user']['result'] = $mantencion_user;
                        //     /** asignando rol de adminstrador de institucion */
                        //     $mantencion_user->assignRole(4);
                        //     $mantencion_user->assignRole(23);
                        //     $id_mantencion_user = $mantencion_user->id;

                        //     // asignamos el usuario al profesional
                        //     $registro_mantencion->id_admin = $id_mantencion_user;
                        //     $registro_mantencion->save();

                        //     /** envio de correo de confirmacion  */
                        //     $blade = 'bienvenida_asistente_usuario';
                        //     $to = array(
                        //             array('email' => $mantencion_user->email,'name' => $mantencion_user->name),
                        //         );
                        //     $cc = array();
                        //     $bcc = array();
                        //     $asunto = 'MED-SDI - Bienvenido!';
                        //     $body = array(
                        //         'nombre' => $mantencion_user->name,
                        //         'user' => $mantencion_user->email,
                        //         'pass' => $pass_temp,
                        //     );
                        //     $archivo = '';/** pendiente */
                        //     $id_institucion = '';

                        //     $result_mail =  SendMailController::envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, $id_institucion);

                        //     if($result_mail['estado'])
                        //     {
                        //         $datos['mail']['estado'] = 1;
                        //         $datos['mail']['msj'] = 'Notificacion de bienvenida';
                        //     }
                        //     else
                        //     {
                        //         $datos['mail']['estado'] = 0;
                        //         $datos['mail']['msj'] = 'Falle en envio de Notificacion de bienvenida';
                        //     }

                        // }
                        // else
                        // {
                        //     $datos['user']['estado'] = 0;
                        //     $datos['user']['result'] = $mantencion_user;
                        // }

                        $registro_mantencion->id_admin = (empty($id_mantencion_user))?0:$id_mantencion_user;

                        if($registro_mantencion->save())
                        {
                            $datos['registro_mantencion']['update']['estado'] = 1;
                            $datos['registro_mantencion']['update']['msj'] = 'registro';
                            $datos['estado'] = 1;
                            $datos['msj'] = 'perfil creado';
                            $datos['result'] = (object)array(
                                'id_mantencion' => $registro_mantencion->id,
                                'id_mantencion_usuario' => $registro_mantencion->id_admin,
                            );
                        }
                        else
                        {
                            $datos['registro_mantencion']['update']['estado'] = 0;
                            $datos['registro_mantencion']['update']['msj'] = 'fallo registro';
                        }

                    }

                }
            }
        }else{
            $datos['estado'] = 0;
            $datos['msj'] = 'campo requerido';
            $datos['error'] = $error;
        }

        return $datos;
    }

    public function modificarHorario(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id))
        {
            $error['id'] = 'ID Contato - campo requerido';
            $valido = 0;
        }
        if(empty($request->id_empleado))
        {
            $error['id_empleado'] = 'ID Empleado - campo requerido';
            $valido = 0;
        }
        if(empty($request->dias_laborales))
        {
            $error['dias_laborales'] = 'Dias Laborales - campo requerido';
            $valido = 0;
        }
        if(empty($request->hora_ingreso))
        {
            $error['hora_ingreso'] = 'Hora entrada - campo requerido';
            $valido = 0;
        }
        if(empty($request->hora_salida))
        {
            $error['hora_salida'] = 'Hora salida - campo requerido';
            $valido = 0;
        }
        if(empty($request->hora_inicio_colacion))
        {
            $error['hora_inicio_colacion'] = 'Hora inicio colación - campo requerido';
            $valido = 0;
        }
        if(empty($request->hora_termino_colacion))
        {
            $error['hora_termino_colacion'] = 'Hora término colación - campo requerido';
            $valido = 0;
        }


        if($valido)
        {
            $filtro = array();
            $filtro[] = array('id', $request->id);
            $filtro[] = array('id_empleado', $request->id_empleado);

            $registro = ContratoDependiente::where($filtro)->first();

            if($registro)
            {
                $registro->dias_laborales = implode(',',$request->dias_laborales);
                $registro->hora_ingreso = $request->hora_ingreso;
                $registro->hora_salida = $request->hora_salida;
                $registro->hora_inicio_colacion = $request->hora_inicio_colacion;
                $registro->hora_termino_colacion = $request->hora_termino_colacion;

                if($registro->save())
                {
                    $datos['estado'] = 1;
                    $datos['msj'] = 'Horario Modificado';

                    $requestHistorico = new Request(array(
                        'id_contrato' => $request->id,
                        'id_user' => Auth::user()->id,
                        'data' => json_encode($request->all()),
                        'fecha' => date('Y-m-d'),
                        'hora' => date('H:i:s'),
                        'tipo_verificacion_usuario' => null,
                        'codigo_verificacion_usuario' => null,
                        'fecha_codigo_usuario' => null,
                        'tipo_verificacion_tercero' => null,
                        'codigo_verificacion_tercero' => null,
                        'fecha_codigo_tercero' => null,
                        'procesado' => null,
                    ));
                    $datos['historico'] = static::registrarHistorico($requestHistorico);
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'Problema al modificar Horario';
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Contrato no encontrado';
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


    public function desasociarPersonalAsistente(Request $request)
    {
        $institucion = '';
        $tipo_institucion = '1';
        $id_busqueda = Auth::user()->id;

        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_empleado))
        {
            $error['id_empleado'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->id_contrato))
        {
            $error['id_contrato'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            /** INFORMACION DE INSTITUCION Y RESPONSABLE */
            if(Auth::user()->id == 3)
            {
                $id_busqueda = 5;
                $registro = Instituciones::where('id', $id_busqueda)->first();
            }
            else
            {
                $registro = Instituciones::where('id_usuario',Auth::user()->id)->first();
            }

            if($registro)
            {
                // var_dump($registro);
                // var_dump($registro->UsuarioAdministrador()->first());
                //var_dump($registro->UsuarioAdministrador()->first()->id);
                /** INSTITUCION */
                $institucion = $registro;
                $responsable = AdminInstServ::where('id',$registro->UsuarioAdministrador()->first()->id)->first();
                $tipo_institucion = 'institucion';

            }
            else
            {
                $registro = Servicios::where('id_usuario',Auth::user()->id)->first();
                if($registro)
                {
                    /** SERVICIOS */
                    $institucion = $registro;
                    $tipo_institucion = 'servicio';
                }
                else
                {
                    /** busqueda por responsable */
                    $responsable = AdminInstServ::where('id_admin',Auth::user()->id)->first();

                    if($responsable)
                    {
                        $registro = Instituciones::where('id_responsable',$responsable->id)->first();
                        if($registro)
                        {
                            // var_dump($registro);
                            // var_dump($registro->UsuarioAdministrador()->first());
                            /** INSTITUCION */
                            $institucion = $registro;
                            $tipo_institucion = 'institucion';

                        }
                        else
                        {
                            $registro = Servicios::where('id_responsable',$responsable->id)->first();
                            if($registro)
                            {
                                /** SERVICIOS */
                                $institucion = $registro;
                                $tipo_institucion = 'servicio';
                            }
                            else
                            {

                                $result_contrato = ContratoDependiente::where('tipo_empleado', 'like', '%ADMINISTRADOR%')
                                        ->where('id_empleado', $responsable->id)
                                        ->whereIn('estado', [2,3])
                                        ->first();

                                if($result_contrato)
                                {
                                    $registro = Instituciones::where('id',$result_contrato->id_institucion)->first();
                                    if($registro)
                                    {
                                        /** INSTITUCION */
                                        $institucion = $registro;
                                        $tipo_institucion = 'institucion';
                                    }
                                    else
                                    {
                                        $registro = Servicios::where('id',$result_contrato->id_institucion)->first();
                                        if($registro)
                                        {
                                            /** SERVICIOS */
                                            $institucion = $registro;
                                            $tipo_institucion = 'servicio';
                                        }
                                        else
                                        {
                                            return back()->with('error','Institución no encontrada');
                                        }
                                    }
                                }
                                else
                                {
                                    return back()->with('error','Permisos de usuario no validos para Ingresar al modulo');
                                }
                            }
                        }
                    }
                    else
                    {
                        return back()->with('error','Institución no encontrada');
                    }

                }
            }
            /** FIN INFORMACION DE INSTITUCION Y RESPONSABLE */

            if($institucion)
            {
                /** CARGA DE ASISTENTES */
                $LugarAtencion = LugarAtencion::where('id',$institucion->id_lugar_atencion)->first();
                $lista_asistente = array();
                if($LugarAtencion)
                {
                    $filtro = array();
                    $filtro[] = array('id_asistente',$request->id_empleado);
                    $filtro[] = array('id_institucion',$institucion->id);
                    $filtro[] = array('id_lugar_atencion',$LugarAtencion->id);
                    $registro_asis_lugar = AsistenteLugarAtencion::where($filtro)->first();
                    if($registro_asis_lugar)
                    {
                        if ($registro_asis_lugar->delete())
                        {

                            $registro_contrato = ContratoDependiente::find($request->id_contrato);
                            if($registro_contrato)
                            {
                                $registro_contrato->estado = 4;
                                if($registro_contrato->save())
                                {
                                    $datos['contrato']['estado'] = 1;
                                    $datos['contrato']['msj'] = 'Contrato Finalizado';

                                    $requestHistorico = new Request(array(
                                        'id_contrato' => $registro_contrato->id,
                                        'id_user' => Auth::user()->id,
                                        'data' => json_encode($request->all()),
                                        'fecha' => date('Y-m-d'),
                                        'hora' => date('H:i:s'),
                                        'tipo_verificacion_usuario' => null,
                                        'codigo_verificacion_usuario' => null,
                                        'fecha_codigo_usuario' => null,
                                        'tipo_verificacion_tercero' => null,
                                        'codigo_verificacion_tercero' => null,
                                        'fecha_codigo_tercero' => null,
                                        'procesado' => null,
                                    ));
                                    $datos['contrato']['historico'] = static::registrarHistorico($requestHistorico);
                                }
                                else
                                {
                                    $datos['contrato']['estado'] = 0;
                                    $datos['contrato']['msj'] = 'Problema al Finalizar Contrato';
                                }
                            }
                            else
                            {
                                $datos['contrato']['estado'] = 0;
                                $datos['contrato']['msj'] = 'Contrato no encontrado';
                            }

                            $datos['estado'] = 1;
                            $datos['msj'] = 'Relacion Eliminada';
                        }
                        else
                        {
                            $datos['estado'] = 0;
                            $datos['msj'] = 'Problema al eliminar relacion';
                        }
                    }
                    else
                    {
                        $datos['estado'] = 0;
                        $datos['msj'] = 'Relacion no encontrada';
                        // $datos['request'] = array(
                        //     'id_empleado' => $request->id_empleado,
                        //     'id_institucion' => $institucion->id,
                        //     'id_lugar_atencion' => $LugarAtencion->id);
                    }
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'Lugar de atencion no encontrado';
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Institucion no encontrado';
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

    public function desasociarPersonalProfesional(Request $request){

        $institucion = '';
        $tipo_institucion = '1';
        $id_busqueda = Auth::user()->id;

        $datos = array();
        $error = array();
        $valido = 1;

        /** INFORMACION DE INSTITUCION Y RESPONSABLE */
        if(Auth::user()->id == 3)
        {
            $id_busqueda = 5;
            $registro_ = Instituciones::where('id', $id_busqueda)->first();
        }
        else
        {
            $registro_ = Instituciones::where('id_usuario',Auth::user()->id)->first();
        }

        if($registro_){
            $LugarAtencion = LugarAtencion::where('id',$registro_->id_lugar_atencion)->first();
            $filtro = array();
            $filtro[] = array('id_profesional',$request->id_empleado);
            $filtro[] = array('id_lugar_atencion',$LugarAtencion->id);
            $regis_prof = ProfesionalesLugaresAtencion::where($filtro)->first();

            if($regis_prof){
                if($regis_prof->delete()){
                    $datos['estado'] = 1;
                    $datos['msj'] = 'Profesional desasociado';
                }else{
                    $datos['estado'] = 0;
                    $datos['msj'] = 'Problema al desasociar profesional';
                }
            }else{
                $datos['estado'] = 0;
                $datos['msj'] = 'Profesional no encontrado';
            }

            return $datos;
        }

        if(empty($request->id_empleado))
        {
            $error['id_empleado'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->id_contrato))
        {
            $error['id_contrato'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {


            if($registro)
            {
                // var_dump($registro);
                // var_dump($registro->UsuarioAdministrador()->first());
                //var_dump($registro->UsuarioAdministrador()->first()->id);
                /** INSTITUCION */
                $institucion = $registro;
                $responsable = AdminInstServ::where('id',$registro->UsuarioAdministrador()->first()->id)->first();
                $tipo_institucion = 'institucion';

            }
            else
            {
                $registro = Servicios::where('id_usuario',Auth::user()->id)->first();
                if($registro)
                {
                    /** SERVICIOS */
                    $institucion = $registro;
                    $tipo_institucion = 'servicio';
                }
                else
                {
                    /** busqueda por responsable */
                    $responsable = AdminInstServ::where('id_admin',Auth::user()->id)->first();

                    if($responsable)
                    {
                        $registro = Instituciones::where('id_responsable',$responsable->id)->first();
                        if($registro)
                        {
                            // var_dump($registro);
                            // var_dump($registro->UsuarioAdministrador()->first());
                            /** INSTITUCION */
                            $institucion = $registro;
                            $tipo_institucion = 'institucion';

                        }
                        else
                        {
                            $registro = Servicios::where('id_responsable',$responsable->id)->first();
                            if($registro)
                            {
                                /** SERVICIOS */
                                $institucion = $registro;
                                $tipo_institucion = 'servicio';
                            }
                            else
                            {

                                $result_contrato = ContratoDependienteProfesional::where('tipo_empleado', 'like', '%ADMINISTRADOR%')
                                        ->where('id_empleado', $responsable->id)
                                        ->whereIn('estado', [2,3])
                                        ->first();

                                if($result_contrato)
                                {
                                    $registro = Instituciones::where('id',$result_contrato->id_institucion)->first();
                                    if($registro)
                                    {
                                        /** INSTITUCION */
                                        $institucion = $registro;
                                        $tipo_institucion = 'institucion';
                                    }
                                    else
                                    {
                                        $registro = Servicios::where('id',$result_contrato->id_institucion)->first();
                                        if($registro)
                                        {
                                            /** SERVICIOS */
                                            $institucion = $registro;
                                            $tipo_institucion = 'servicio';
                                        }
                                        else
                                        {
                                            return back()->with('error','Institución no encontrada');
                                        }
                                    }
                                }
                                else
                                {
                                    return back()->with('error','Permisos de usuario no validos para Ingresar al modulo');
                                }
                            }
                        }
                    }
                    else
                    {
                        return back()->with('error','Institución no encontrada');
                    }

                }
            }
            /** FIN INFORMACION DE INSTITUCION Y RESPONSABLE */

            if($institucion)
            {
                /** CARGA DE ASISTENTES */
                $LugarAtencion = LugarAtencion::where('id',$institucion->id_lugar_atencion)->first();
                $lista_asistente = array();
                if($LugarAtencion)
                {
                    $filtro = array();
                    $filtro[] = array('id_profesional',$request->id_empleado);
                    $filtro[] = array('id_lugar_atencion',$LugarAtencion->id);
                    $registro_asis_lugar = ProfesionalesLugaresAtencion::where($filtro)->first();
                    if($registro_asis_lugar)
                    {
                        if ($registro_asis_lugar->delete())
                        {

                            $registro_contrato = ContratoDependienteProfesional::find($request->id_contrato);
                            if($registro_contrato)
                            {
                                $registro_contrato->estado = 4;
                                if($registro_contrato->save())
                                {
                                    $datos['contrato']['estado'] = 1;
                                    $datos['contrato']['msj'] = 'Contrato Finalizado';

                                    $requestHistorico = new Request(array(
                                        'id_contrato' => $registro_contrato->id,
                                        'id_user' => Auth::user()->id,
                                        'data' => json_encode($request->all()),
                                        'fecha' => date('Y-m-d'),
                                        'hora' => date('H:i:s'),
                                        'tipo_verificacion_usuario' => null,
                                        'codigo_verificacion_usuario' => null,
                                        'fecha_codigo_usuario' => null,
                                        'tipo_verificacion_tercero' => null,
                                        'codigo_verificacion_tercero' => null,
                                        'fecha_codigo_tercero' => null,
                                        'procesado' => null,
                                    ));
                                    $datos['contrato']['historico'] = static::registrarHistorico($requestHistorico);
                                }
                                else
                                {
                                    $datos['contrato']['estado'] = 0;
                                    $datos['contrato']['msj'] = 'Problema al Finalizar Contrato';
                                }
                            }
                            else
                            {
                                $datos['contrato']['estado'] = 0;
                                $datos['contrato']['msj'] = 'Contrato no encontrado';
                            }

                            $datos['estado'] = 1;
                            $datos['msj'] = 'Relacion Eliminada';
                        }
                        else
                        {
                            $datos['estado'] = 0;
                            $datos['msj'] = 'Problema al eliminar relacion';
                        }
                    }
                    else
                    {
                        $datos['estado'] = 0;
                        $datos['msj'] = 'Relacion no encontrada';
                        // $datos['request'] = array(
                        //     'id_empleado' => $request->id_empleado,
                        //     'id_institucion' => $institucion->id,
                        //     'id_lugar_atencion' => $LugarAtencion->id);
                    }
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'Lugar de atencion no encontrado';
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Institucion no encontrado';
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

    public function desasociarPersonalOtrosProfesionales(Request $request){
        $tipo_profesional = $request->tipo;
        $institucion = '';
        $tipo_institucion = '1';
        $id_busqueda = Auth::user()->id;

        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_empleado))
        {
            $error['id_empleado'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->id_contrato))
        {
            $error['id_contrato'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            /** INFORMACION DE INSTITUCION Y RESPONSABLE */
            if(Auth::user()->id == 3)
            {
                $id_busqueda = 5;
                $registro = Instituciones::where('id', $id_busqueda)->first();
            }
            else
            {
                $registro = Instituciones::where('id_usuario',Auth::user()->id)->first();
            }

            if($registro)
            {
                // var_dump($registro);
                // var_dump($registro->UsuarioAdministrador()->first());
                //var_dump($registro->UsuarioAdministrador()->first()->id);
                /** INSTITUCION */
                $institucion = $registro;
                $responsable = AdminInstServ::where('id',$registro->UsuarioAdministrador()->first()->id)->first();
                $tipo_institucion = 'institucion';

            }
            else
            {
                $registro = Servicios::where('id_usuario',Auth::user()->id)->first();
                if($registro)
                {
                    /** SERVICIOS */
                    $institucion = $registro;
                    $tipo_institucion = 'servicio';
                }
                else
                {
                    /** busqueda por responsable */
                    $responsable = AdminInstServ::where('id_admin',Auth::user()->id)->first();

                    if($responsable)
                    {
                        $registro = Instituciones::where('id_responsable',$responsable->id)->first();
                        if($registro)
                        {
                            // var_dump($registro);
                            // var_dump($registro->UsuarioAdministrador()->first());
                            /** INSTITUCION */
                            $institucion = $registro;
                            $tipo_institucion = 'institucion';

                        }
                        else
                        {
                            $registro = Servicios::where('id_responsable',$responsable->id)->first();
                            if($registro)
                            {
                                /** SERVICIOS */
                                $institucion = $registro;
                                $tipo_institucion = 'servicio';
                            }
                            else
                            {

                                $result_contrato = ContratoDependiente::where('tipo_empleado', 'like', '%ADMINISTRADOR%')
                                        ->where('id_empleado', $responsable->id)
                                        ->whereIn('estado', [2,3])
                                        ->first();

                                if($result_contrato)
                                {
                                    $registro = Instituciones::where('id',$result_contrato->id_institucion)->first();
                                    if($registro)
                                    {
                                        /** INSTITUCION */
                                        $institucion = $registro;
                                        $tipo_institucion = 'institucion';
                                    }
                                    else
                                    {
                                        $registro = Servicios::where('id',$result_contrato->id_institucion)->first();
                                        if($registro)
                                        {
                                            /** SERVICIOS */
                                            $institucion = $registro;
                                            $tipo_institucion = 'servicio';
                                        }
                                        else
                                        {
                                            return back()->with('error','Institución no encontrada');
                                        }
                                    }
                                }
                                else
                                {
                                    return back()->with('error','Permisos de usuario no validos para Ingresar al modulo');
                                }
                            }
                        }
                    }
                    else
                    {
                        return back()->with('error','Institución no encontrada');
                    }

                }
            }
            /** FIN INFORMACION DE INSTITUCION Y RESPONSABLE */

            if($institucion)
            {
                /** CARGA DE ASISTENTES */
                $LugarAtencion = LugarAtencion::where('id',$institucion->id_lugar_atencion)->first();
                $lista_asistente = array();
                if($LugarAtencion)
                {
                    $filtro = array();
                    $filtro[] = array('id_admin',$request->id_empleado);
                    $filtro[] = array('id_lugar_atencion',$LugarAtencion->id);
                    $registro_otro_profesional = $tipo_profesional == 'mantencion' ? MantencionLugarAtencion::where($filtro)->first() : AdminLugarAtencion::where($filtro)->first();

                    if($registro_otro_profesional)
                    {
                        if ($registro_otro_profesional->delete())
                        {

                            $registro_contrato = ContratoDependiente::find($request->id_contrato);
                            if($registro_contrato)
                            {
                                $registro_contrato->estado = 4;
                                if($registro_contrato->save())
                                {
                                    $datos['contrato']['estado'] = 1;
                                    $datos['contrato']['msj'] = 'Contrato Finalizado';

                                    $requestHistorico = new Request(array(
                                        'id_contrato' => $registro_contrato->id,
                                        'id_user' => Auth::user()->id,
                                        'data' => json_encode($request->all()),
                                        'fecha' => date('Y-m-d'),
                                        'hora' => date('H:i:s'),
                                        'tipo_verificacion_usuario' => null,
                                        'codigo_verificacion_usuario' => null,
                                        'fecha_codigo_usuario' => null,
                                        'tipo_verificacion_tercero' => null,
                                        'codigo_verificacion_tercero' => null,
                                        'fecha_codigo_tercero' => null,
                                        'procesado' => null,
                                    ));
                                    $datos['contrato']['historico'] = static::registrarHistorico($requestHistorico);
                                }
                                else
                                {
                                    $datos['contrato']['estado'] = 0;
                                    $datos['contrato']['msj'] = 'Problema al Finalizar Contrato';
                                }
                            }
                            else
                            {
                                $datos['contrato']['estado'] = 0;
                                $datos['contrato']['msj'] = 'Contrato no encontrado';
                            }

                            $datos['estado'] = 1;
                            $datos['msj'] = 'Relacion Eliminada';
                        }
                        else
                        {
                            $datos['estado'] = 0;
                            $datos['msj'] = 'Problema al eliminar relacion';
                        }
                    }
                    else
                    {
                        $datos['estado'] = 0;
                        $datos['msj'] = 'Relacion no encontrada';
                        // $datos['request'] = array(
                        //     'id_empleado' => $request->id_empleado,
                        //     'id_institucion' => $institucion->id,
                        //     'id_lugar_atencion' => $LugarAtencion->id);
                    }
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'Lugar de atencion no encontrado';
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Institucion no encontrado';
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

    /* MANEJOR CONTRATOS PROFESIONALES */
    public function registrarProfesional(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;
        /** VALIDAR EXISTENCIA DE CONTRATO ACTUAL ACTIVO */
        $validacion_contrato = ContratoDependienteProfesional::where('email', $request->email)->whereIn('estado', [1,2,3])->get();
        if($validacion_contrato->count() > 0)
        {
            $error['validacion_contrado'] = 'El Email esta siendo utilizado en un contrato (Nuevo, Activo o Vencido), valide la información.';
            // $error['info'] = $validacion_contrato;
            // $error['count'] = $validacion_contrato->count();
            $valido = 0;
        }

        if($valido)
        {
            $result_registro_perfil = static::registroPerfilProfesional($request);

            if($result_registro_perfil['estado'] == 1){

                $id_profesional = $result_registro_perfil['result']->id_profesional;
                $id_profesional_usuario = $result_registro_perfil['result']->id_profesional_usuario;

                /** CREAR CONTRATO */
                $registro = User::find(Auth::user()->id);
                $roles = $registro->roles()->get();
                $lista_roles = '';
                foreach ($roles as $key => $value)
                    {
                    $lista_roles = $value->id.'|';
                }
                $lista_roles = substr($lista_roles, 0, -1);
                /**
                 * # TIPOS DE CONTRATOS DEPENDIENTES
                 * 1. CONTRATO INDEFINIDO
                 * 2. CONTRATO DEFINIDO
                 * */
                $tipo_contrato = 1;
                if(!empty($request->fecha_termino))
                    $tipo_contrato = 2;
                $request->tipo_contrato = 1;

                $registro_contrato = static::registrarContratoProfesional(
                    1,
                    $request->profesion,
                    $request->especialidad,
                    $request->sub_especialidad,
                    $id_profesional,
                    $request->rut,
                    $request->nombre,
                    $request->apellido1,
                    $request->apellido2,
                    $request->telefono1,
                    $request->email,
                    $request->id_institucion,
                    $request->id_lugar_atencion,
                    $tipo_contrato,
                    $request->fecha_inicio,
                    $request->fecha_termino,
                    $request->monto_imponible,
                    $request->locomocion,
                    $request->locomocion_porcentaje,
                    $request->colacion,
                    $request->colacion_porcentaje,
                    $request->asignacion_familiar,
                    $request->asignacion_familiar_cantidad,
                    $request->caja_compensacion,
                    $request->caja_compensacion_porcentaje,
                    '',
                    implode(',', $request->dias_laborales),
                    $request->hora_entrada,
                    $request->hora_salida,
                    $request->hora_entrada_colacion,
                    $request->hora_salida_colacion,
                    $request->banco,
                    $request->n_cta,
                    $request->sucursal,
                    Carbon::now(),
                );
                $datos['registro_contrato'] = $registro_contrato;
                if($registro_contrato->estado == 1)
                {
                    $datos['estado'] = 1;
                    $datos['msj'] = 'Registro Exitoso';
                    $datos['result'] = $registro_contrato;
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'Problema al registrar contrato';
                    $datos['result'] = $registro_contrato;
                }
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

    static public function registrarContratoProfesional(
        $tipo_empleado,
        $profesion,
        $especialidad,
        $sub_especialidad,
        $id_profesional,
        $rut,
        $nombres,
        $apellido_uno,
        $apellido_dos,
        $telefono,
        $email,
        $id_institucion,
        $id_lugar_atencion,
        $tipo_contrato,
        $fecha_inicio,
        $fecha_termino,
        $monto_imponible,
        $locomocion,
        $locomocion_porcentaje,
        $colacion,
        $colacion_porcentaje,
        $asignacion_familiar,
        $asignacion_familiar_cantidad,
        $caja_compensacion,
        $caja_compensacion_porcentaje,
        $otro,
        $dias_laborales,
        $hora_ingreso,
        $hora_salida,
        $hora_inicio_colacion,
        $hora_termino_colacion,
        $banco,
        $n_cta,
        $sucursal,
        $fecha_creacion
    )
    {
        $datos = array();
        $filtro = array();
        $valido = 1;
        $error = array();


        if(empty($tipo_empleado))
        {
            $error['tipo_empleado'] = 'campo requerido';
            $valido = 0;
        }
        // if(empty($id_empleado))
        // {
        //     $error['id_empleado'] = 'campo requerido';
        //     $valido = 0;
        // }
        if(empty($rut))
        {
            $error['rut'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($nombres))
        {
            $error['nombres'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($apellido_uno))
        {
            $error['apellido_uno'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($apellido_dos))
        {
            $error['apellido_dos'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($telefono))
        {
            $error['telefono'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($email))
        {
            $error['email'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($id_institucion))
        {
            $error['id_institucion'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($id_lugar_atencion))
        {
            $error['id_lugar_atencion'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($tipo_contrato))
        {
            $error['tipo_contrato'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($fecha_inicio))
        {
            $error['fecha_inicio'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($monto_imponible))
        {
            $error['monto_imponible'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($dias_laborales))
        {
            $error['dias_laborales'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($hora_ingreso))
        {
            $error['hora_ingreso'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($hora_salida))
        {
            $error['hora_salida'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($hora_inicio_colacion))
        {
            $error['hora_inicio_colacion'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($hora_termino_colacion))
        {
            $error['hora_termino_colacion'] = 'campo requerido';
            $valido = 0;
        }

        if($valido == 1)
        {
            $contrato = new ContratoDependienteProfesional();

            $contrato->id_especialidad = $profesion;
            $contrato->id_tipo_especialidad = $especialidad;
            $contrato->id_subtipo_especialidad = $sub_especialidad;
            $contrato->id_profesional = $id_profesional;
            $contrato->rut = $rut;
            $contrato->nombres = $nombres;
            $contrato->apellido_uno = $apellido_uno;
            $contrato->apellido_dos = $apellido_dos;
            $contrato->telefono = $telefono;
            $contrato->email = $email;
            $contrato->id_institucion = $id_institucion;
            $contrato->id_lugar_atencion = $id_lugar_atencion;
            $contrato->tipo_contrato = $tipo_contrato;
            $contrato->fecha_inicio = $fecha_inicio;
            $contrato->fecha_termino = $fecha_termino;
            $contrato->monto_imponible = $monto_imponible;
            $contrato->id_banco = $banco;
            $contrato->numero_cuenta = $n_cta;
            $contrato->sucursal = $sucursal;
            $contrato->locomocion = $locomocion;
            $contrato->locomocion_porcentaje = $locomocion_porcentaje;
            $contrato->colacion = $colacion;
            $contrato->colacion_porcentaje = $colacion_porcentaje;
            $contrato->asignacion_familiar = $asignacion_familiar;
            $contrato->asignacion_familiar_cantidad = $asignacion_familiar_cantidad;
            $contrato->caja_compensacion = $caja_compensacion;
            $contrato->caja_compensacion_porcentaje = $caja_compensacion_porcentaje;
            $contrato->otro = $otro;
            $contrato->dias_laborales = $dias_laborales;
            $contrato->hora_ingreso = $hora_ingreso;
            $contrato->hora_salida = $hora_salida;
            $contrato->hora_inicio_colacion = $hora_inicio_colacion;
            $contrato->hora_termino_colacion = $hora_termino_colacion;
            $contrato->fecha_creacion = $fecha_creacion;
            $contrato->estado = 2;
            if($contrato->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registro realizado';
                $datos['last_id'] = $contrato->id;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'falla registro';
                $datos['request'] = array(
                    'profesion' => $profesion,
                    'especialidad' => $especialidad,
                    'sub_especialidad' => $sub_especialidad,
                    'otra_profesion' => $otra_profesion,
                    'rut' => $rut,
                    'nombres' => $nombres,
                    'apellido_uno' => $apellido_uno,
                    'apellido_dos' => $apellido_dos,
                    'telefono' => $telefono,
                    'email' => $email,
                    'id_institucion' => $id_institucion,
                    'id_lugar_atencion' => $id_lugar_atencion,
                    'tipo_contrato' => $tipo_contrato,
                    'fecha_inicio' => $fecha_inicio,
                    'fecha_termino' => $fecha_termino,
                    'monto_imponible' => $monto_imponible,
                    'locomocion' => $locomocion,
                    'locomocion_porcentaje' => $locomocion_porcentaje,
                    'colacion' => $colacion,
                    'colacion_porcentaje' => $colacion_porcentaje,
                    'asignacion_familiar' => $asignacion_familiar,
                    'asignacion_familiar_cantidad' => $asignacion_familiar_cantidad,
                    'caja_compensacion' => $caja_compensacion,
                    'caja_compensacion_porcentaje' => $caja_compensacion_porcentaje,
                    'otro' => $otro,
                    'dias_laborales' => $dias_laborales,
                    'hora_ingreso' => $hora_ingreso,
                    'hora_salida' => $hora_salida,
                    'hora_inicio_colacion' => $hora_inicio_colacion,
                    'hora_termino_colacion' => $hora_termino_colacion,
                    'fecha_creacion' => $fecha_creacion,
                                        );
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campo requerido';
            $datos['error'] = $error;
        }
        return (object)$datos;
    }

    public function registrarProfesionalConvenio(Request $request){
        try {
            // nueva liquidacion
            $profesional = Profesional::find($request->id_profesional);
            $institucion = Instituciones::find($request->id_institucion);

            $liquidacion_profesional = new LiquidacionesProfesional;
            $liquidacion_profesional->id_profesional = $profesional->id;
            $liquidacion_profesional->id_institucion = $institucion->id;
            $liquidacion_profesional->id_lugar_atencion = $institucion->id_lugar_atencion;
            $liquidacion_profesional->numero_atenciones = intval($request->n_atenciones);
            $liquidacion_profesional->descuentos = $request->descuentos;
            $liquidacion_profesional->monto_imponible = 500000; // por defecto, revisar el monto desde la vista
            $liquidacion_profesional->total = 500000; // por defecto
            $liquidacion_profesional->id_usuario = Auth::user()->id;
            $liquidacion_profesional->fecha_emision = Carbon::now();
            $liquidacion_profesional->fecha_inicio = $request->fecha_inicio;
            $liquidacion_profesional->fecha_termino = $request->fecha_termino;
            $liquidacion_profesional->porcentaje = 10; // por defecto
            $liquidacion_profesional->estado = 1;
            if($liquidacion_profesional->save()){
                return ['estado' => 'OK','msj' => 'Se ha registrado la liquidacion correctamente.'];
            }else{
                return ['estado' => 'error','msj' => 'Ha ocurrido algun error.'];
            }
        } catch (\Exception $e) {
            return ['estado' => 'error','msj' => $e->getMessage()];
        }
    }
}
