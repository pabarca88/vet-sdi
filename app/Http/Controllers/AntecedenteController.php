<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Antecedente;
use App\Models\Articulo;
use App\Models\MedicamentoUsoCronicoGeneral;
use App\Models\User;
use App\Models\Paciente;
use App\Models\Profesional;
use App\Models\TipoAntecedente;
use Illuminate\Support\Facades\Log;

class AntecedenteController extends Controller
{
    public function verRegistros(Request $request)
    {
        $datos = array();
        $cant_x_pagina = 10;
        $filtros = array();

        if(!empty($request->id))
            $filtros[] = array('id',$request->id);
        if(!empty($request->id_paciente))
            $filtros[] = array('id_paciente',$request->id_paciente);
        if(!empty($request->id_tipo_antecedente))
            $filtros[] = array('id_tipo_antecedente',$request->id_tipo_antecedente);
        if(!empty($request->id_usuario))
            $filtros[] = array('id_usuario',$request->id_usuario);
        if(!empty($request->comentario))
            $filtros[] = array('comentario',$request->comentario);
        if($request->estado!='')
            $filtros[] = array('estado',$request->estado);


        /* CANTIDAD REGISTROS X PAG */
        $cant_reg = Antecedente::where($filtros)->count();

        if($cant_reg >0){

            $registros = Antecedente::where($filtros)->with('users','paciente','tipo_antecendente')->orderBy('id', 'DESC')->get();

            foreach ($registros as $valor) {
                $valor['antecedente_data'] = json_decode($valor['data'],true);
            }

            $datos['estado'] = 1;
            $datos['cantidad_registros'] = $cant_reg;
            $datos['request'] = $request->all();
            $datos['registros'] = $registros;

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
        if(!empty($request->id))
            $filtros[] = array('id',$request->id);
        if(!empty($request->id_paciente))
            $filtros[] = array('id_paciente',$request->id_paciente);
        if(!empty($request->id_tipo_antecedente))
            $filtros[] = array('id_tipo_antecedente',$request->id_tipo_antecedente);
        if(!empty($request->id_users))
            $filtros[] = array('id_users',$request->id_users);
        if(!empty($request->comentario))
            $filtros[] = array('comentario',$request->comentario);
        if($request->estado!='')
            $filtros[] = array('estado',$request->estado);
        if($campos_requeridos==0)
        {

            $cant_reg = Antecedente::count();

            if($cant_reg >0){

                // Generamos la consulta
                $registros = Antecedente::where($filtros)->with('users','paciente','tipo_antecendente')->find($request->id);

                if($registros->count())
                {

                        $registros['antecedente_data'] = json_decode($registros['data'],true);

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

        $request->nombre = $request->nombre ?? $request->procedimiento;

        $registro = new Antecedente();

        /* VALIDACION CAMPOS */
        if($request->id_paciente=='')
        {
            $error['id_paciente'] = 'campo requerido';
            $campos_requeridos = 1;
        }
        if($request->id_tipo_antecedente=='')
        {
            $error['id_tipo_antecedente'] = 'campo requerido';
            $campos_requeridos = 1;
        }

        if($request->id_users=='')
        {
            $error['id_users'] = 'campo requerido';
            $campos_requeridos = 1;
        }

        if($request->nombre=='' || $request->nombre == null)
        {
            $error['nombre'] = 'campo requerido';
            $campos_requeridos = 1;
        }

        /*
        if($request->data=='')
        {
            $error['data'] = 'campo requerido';
            $campos_requeridos = 1;
        }
        */

        if($request->estado=='')
        {
            $error['estado'] = 'campo requerido';
            $campos_requeridos = 1;
        }


        /* FIN - VALIDACION CAMPOS */

        if($campos_requeridos==0)
        {
            $registro->id_paciente = $request->id_paciente;
            $registro->id_tipo_antecedente = $request->id_tipo_antecedente;

            $registro->id_users = $request->id_users;
            $registro->comentario = $request->comentario;
            //GUARDADO DE DATOS
            $data_json = $this->estructuraJson($request);
            $registro->data = $data_json;

            $registro->estado = $request->estado;

            // validar que no se repita
            // **VERIFICAR SI YA EXISTE UN REGISTRO CON EL MISMO "nombre" PARA EL PACIENTE**
            $existe = Antecedente::where('id_paciente', $request->id_paciente)
            ->whereRaw("JSON_EXTRACT(data, '$.nombre') = ?", [$request->nombre])
            ->exists();

            if ($existe) {
                return response([
                    'estado' => 0,
                    'error' => 'El antecedente con este nombre ya existe para este paciente'
                ])->header('Content-Type', 'application/json');
            }
            if($registro->save())
            {
				$datos['estado'] = 1;
                $datos['msg'] = 'Registros Creado';
                $datos['request_data'] = $request->all();

				if( $request->id_tipo_antecedente == 7)
                {
					$profesional = Profesional::where('id_usuario', $request->id_users)->get()->first();

					$registro_med_cronico = new MedicamentoUsoCronicoGeneral();
					$registro_med_cronico->id_ficha_atencion = NULL;
					$registro_med_cronico->id_paciente = $request->id_paciente;
					$registro_med_cronico->id_profesional = $profesional->id;
					$registro_med_cronico->nombre_medicamento = $request->nombre_medicamento_cronico;
					$registro_med_cronico->cantidad = $request->dosis;
					$registro_med_cronico->cliente = 0;
					$registro_med_cronico->tipo_enfermedad = 'cronica';
					$registro_med_cronico->estado = 1;

					if($registro_med_cronico->save())
					{
						$datos['med_cronico']['estado'] = 1;
						$datos['med_cronico']['msg'] = 'Registros Creado';
					}
					else
					{
						$datos['med_cronico']['estado'] = 0;
						$datos['med_cronico']['msg'] = 'Falla Registros';
					}
                }

                $texto_datos = '';

                switch($request->id_tipo_antecedente)
                {
                    case 1: //Antecedentes Anestesias Pacientes
                        $texto_datos .= 'Registro de Antecedentes Anestesias Pacientes -> Procedimiento: '.$request->procedimiento.', Incidente: '.$request->comentario.', Fecha:'.$request->fecha_regitro.'';
                    break;
                    case 2: //Patologías Crónicas
                        $texto_datos .= 'Registro de Patologías Crónicas -> Nombre: '.$request->nombre.', Comentario:'.$request->comentario;
                    break;
                    case 3: //Antecedentes Cirugias y Procedimientos
                        $texto_datos .= 'Registro de Antecedentes Cirugias y Procedimientos -> Fecha: '.$request->fecha.', Procedimiento: '.$request->procedimiento.', Incidente:'.$request->comentario.'';
                    break;
                    case 4: //Antecedentes Hemorragias Pacientes
                        $texto_datos .= 'Registro de Antecedentes Hemorragias Pacientes -> Procedimiento: '.$request->procedimiento.', Incidente: '.$request->comentario.'';
                    break;
                    case 5: //Solicitud de Antecedentes a servicios asistenciales
                        $texto_datos .= 'Registro de Solicitud de Antecedentes a servicios asistenciales -> Antecedente: '.$request->procedimiento.', Institución: '.$request->institucion.', Fecha:'.$request->fecha.'';
                    break;
                    case 6: //Antecedentes de Alergias
                        $texto_datos .= 'Registro de Antecedentes de Alergias -> Alergia: '.$request->nombre.', Detalle:'.$request->comentario.'';
                    break;
                    case 7: //Antecedentes de Medicamento Crónico
                        $texto_datos .= 'Registro de Antecedentes de Medicamento Crónico -> Medicamento: '.$request->nombre_medicamento_cronico.', Dosis:'.$request->dosis.'';
                    break;
                    case 8: //Presenta alguna discapacidad ?
                        $texto_datos .= 'Registro de Presenta alguna discapacidad ? -> Tipo de Discapacidad: '.$request->discapacidad_tipo.', Grado: '.$request->discapacidad_grado.', Permanente:'.$request->discapacidad_permanente.'';
                    break;
                }

                $profesional = Profesional::where('id_usuario', $request->id_users)->get()->first();

                $return_log = PacienteHistoricoDatosMedicosController::registrar($request->id_paciente, $profesional->id, $texto_datos);

                $datos['log_datos_med'] = $return_log;
                Log::build([
                    'path' => storage_path('logs/log_datos_medicos_' . date('Ymd') . '.log'),
                ])->info(json_encode($return_log) );
            }
			else
			{
                $datos['estado'] = 0;
                $datos['msg'] = 'Problemas al registrar';
                $datos['request_data'] = $request->all();
            }
        }
		else
		{
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

        if($request->id_paciente=='')
        {
            $error['id_paciente'] = 'campo requerido';
            $campos_requeridos = 1;
        }
        if($request->id_tipo_antecedente=='')
        {
            $error['id_tipo_antecedente'] = 'campo requerido';
            $campos_requeridos = 1;
        }

        if($request->id_users=='')
        {
            $error['id_users'] = 'campo requerido';
            $campos_requeridos = 1;
        }

        /*
        if($request->comentario=='')
        {
            $error['comentario'] = 'campo requerido';
            $campos_requeridos = 1;
        }
        */
        /*
        if($request->data=='')
        {
            $error['data'] = 'campo requerido';
            $campos_requeridos = 1;
        }
        */

        if($campos_requeridos==0)
        {

            $registro = Antecedente::find($request->id);

            if($registro)
            {

                $previo = Antecedente::find($request->id);

                if(!empty($request->id_paciente))
                    $registro->id_paciente = $request->id_paciente;
                if(!empty($request->id_tipo_antecedente))
                    $registro->id_tipo_antecedente = $request->id_tipo_antecedente;

                if(!empty($request->id_users))
                    $registro->id_users = $request->id_users;
                if(!empty($request->comentario))
                    $registro->comentario = $request->comentario;

                //GUARDADO DE DATOS
                $data_json = $this->estructuraJson($request);
                $registro->data = $data_json;

                if($registro->save())
                {
                    $datos['estado'] = 1;
                    $datos['msg'] = 'Registro Modificado';
                    $datos['request_data'] = $request->all();

                    /** registro log  */
                    $texto_datos = '';
                    $datos_previo = (object)json_decode($previo->data);

                    switch($request->id_tipo_antecedente)
                    {
                        case 1: //Antecedentes Anestesias Pacientes
                            $texto_datos .= 'Registro de Antecedentes Anestesias Pacientes -> <br>';
                            $texto_datos .= 'Previo: Procedimiento: '.$datos_previo->procedimiento.', Incidente: '.$datos_previo->comentario.', Fecha:'.$datos_previo->fecha_regitro.'<br>';
                            $texto_datos .= 'Nuevo: Procedimiento: '.$request->procedimiento.', Incidente: '.$request->comentario.', Fecha:'.$request->fecha_regitro.'';
                        break;
                        case 2: //Patologías Crónicas
                            $texto_datos .= 'Registro de Patologías Crónicas -> <br>';
                            $texto_datos .= 'Previo: Nombre: '.$datos_previo->nombre.', Comentario:'.$datos_previo->comentario.'<br>';
                            $texto_datos .= 'Nuevo: Nombre: '.$request->nombre.', Comentario:'.$request->comentario.'';
                        break;
                        case 3: //Antecedentes Cirugias y Procedimientos
                            $texto_datos .= 'Registro de Antecedentes Cirugias y Procedimientos -> <br>';
                            $texto_datos .= 'Previo: Fecha: '.$datos_previo->fecha.', Procedimiento: '.$datos_previo->procedimiento.', Incidente:'.$datos_previo->comentario.'<br>';
                            $texto_datos .= 'Nuevo: Fecha: '.$request->fecha.', Procedimiento: '.$request->procedimiento.', Incidente:'.$request->comentario.'';
                        break;
                        case 4: //Antecedentes Hemorragias Pacientes
                            $texto_datos .= 'Registro de Antecedentes Hemorragias Pacientes -> <br>';
                            $texto_datos .= 'Previo: Procedimiento: '.$request->procedimiento.', Incidente: '.$datos_previo->comentario.'<br>';
                            $texto_datos .= 'Nuevo: Procedimiento: '.$request->procedimiento.', Incidente: '.$request->comentario.'';
                        break;
                        case 5: //Solicitud de Antecedentes a servicios asistenciales
                            $texto_datos .= 'Registro de Solicitud de Antecedentes a servicios asistenciales -> <br>';
                            $texto_datos .= 'Previo: Antecedente: '.$datos_previo->procedimiento.', Institución: '.$datos_previo->institucion.', Fecha:'.$datos_previo->fecha.'<br>';
                            $texto_datos .= 'Nuevo: Antecedente: '.$request->procedimiento.', Institución: '.$request->institucion.', Fecha:'.$request->fecha.'';
                        break;
                        case 6: //Antecedentes de Alergias
                            $texto_datos .= 'Registro de Antecedentes de Alergias -> <br>';
                            $texto_datos .= 'Previo: Alergia: '.$datos_previo->nombre.', Detalle:'.$datos_previo->comentario.'<br>';
                            $texto_datos .= 'Nuevo: Alergia: '.$request->nombre.', Detalle:'.$request->comentario.'';
                        break;
                        case 7: //Antecedentes de Medicamento Crónico
                            $texto_datos .= 'Registro de Antecedentes de Medicamento Crónico -> <br>';
                            $texto_datos .= 'Previo: Medicamento: '.$datos_previo->nombre_medicamento_cronico.', Dosis:'.$datos_previo->dosis.'<br>';
                            $texto_datos .= 'Nuevo: Medicamento: '.$request->nombre_medicamento_cronico.', Dosis:'.$request->dosis.'';
                        break;
                        case 8: //Presenta alguna discapacidad ?
                            $texto_datos .= 'Registro de Presenta alguna discapacidad ? -> <br>';
                            $texto_datos .= 'Previo: Tipo de Discapacidad: '.$datos_previo->discapacidad_tipo.', Grado: '.$datos_previo->discapacidad_grado.', Permanente:'.$datos_previo->discapacidad_permanente.'<br>';
                            $texto_datos .= 'Nuevo: Tipo de Discapacidad: '.$request->discapacidad_tipo.', Grado: '.$request->discapacidad_grado.', Permanente:'.$request->discapacidad_permanente.'';
                        break;
                    }

                    $profesional = Profesional::where('id_usuario', $request->id_users)->get()->first();

                    $return_log = PacienteHistoricoDatosMedicosController::registrar($request->id_paciente, $profesional->id, $texto_datos);

                    $datos['log_datos_med'] = $return_log;
                    Log::build([
                        'path' => storage_path('logs/log_datos_medicos_' . date('Ymd') . '.log'),
                    ])->info(json_encode($return_log) );
                }
                else
                {
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

            $registro = Antecedente::find($request->id);

            if($registro->count()>0)
            {

                    $registro->estado = $request->estado;
                    if($registro->save())
                    {
                        $datos['estado'] = 1;
                        $datos['msg'] = 'Registro Actualizado';
                        $datos['request'] = $request->all();


                        $datos_actuales = (object)json_decode($registro->data);
                        $texto_datos = '';
                        switch($registro->id_tipo_antecedente)
                        {
                            case 1: //Antecedentes Anestesias Pacientes
                                $texto_datos .= 'Registro de Antecedentes Anestesias Pacientes -> Eliminado<br>';
                                $texto_datos .= 'Procedimiento: '.$datos_actuales->procedimiento.', Incidente: '.$datos_actuales->comentario.', Fecha:'.$datos_actuales->fecha_regitro.'<br>';
                            break;
                            case 2: //Patologías Crónicas
                                $texto_datos .= 'Registro de Patologías Crónicas -> Eliminado<br>';
                                $texto_datos .= 'Nombre: '.$datos_actuales->nombre.', Comentario:'.$datos_actuales->comentario.'';
                            break;
                            case 3: //Antecedentes Cirugias y Procedimientos
                                $texto_datos .= 'Registro de Antecedentes Cirugias y Procedimientos -> Eliminado<br>';
                                $texto_datos .= 'Fecha: '.$datos_actuales->fecha.', Procedimiento: '.$datos_actuales->procedimiento.', Incidente:'.$datos_actuales->comentario.'';
                            break;
                            case 4: //Antecedentes Hemorragias Pacientes
                                $texto_datos .= 'Registro de Antecedentes Hemorragias Pacientes -> Eliminado<br>';
                                $texto_datos .= 'Procedimiento: '.$request->procedimiento.', Incidente: '.$datos_actuales->comentario.'';
                            break;
                            case 5: //Solicitud de Antecedentes a servicios asistenciales
                                $texto_datos .= 'Registro de Solicitud de Antecedentes a servicios asistenciales -> Eliminado<br>';
                                $texto_datos .= 'Antecedente: '.$datos_actuales->procedimiento.', Institución: '.$datos_actuales->institucion.', Fecha:'.$datos_actuales->fecha.'';
                            break;
                            case 6: //Antecedentes de Alergias
                                $texto_datos .= 'Registro de Antecedentes de Alergias -> Eliminado<br>';
                                $texto_datos .= 'Alergia: '.$datos_actuales->nombre.', Detalle:'.$datos_actuales->comentario.'';
                            break;
                            case 7: //Antecedentes de Medicamento Crónico
                                $texto_datos .= 'Registro de Antecedentes de Medicamento Crónico -> Eliminado<br>';
                                $texto_datos .= 'Medicamento: '.$datos_actuales->nombre_medicamento_cronico.', Dosis:'.$datos_actuales->dosis.'';
                            break;
                            case 8: //Presenta alguna discapacidad ?
                                $texto_datos .= 'Registro de Presenta alguna discapacidad ? -> Eliminado<br>';
                                $texto_datos .= 'Tipo de Discapacidad: '.$datos_actuales->discapacidad_tipo.', Grado: '.$datos_actuales->discapacidad_grado.', Permanente:'.$datos_actuales->discapacidad_permanente.'';
                            break;
                        }

                        $profesional = Profesional::where('id_usuario', $registro->id_users)->get()->first();

                        $return_log = PacienteHistoricoDatosMedicosController::registrar($registro->id_paciente, $profesional->id, $texto_datos);

                        $datos['return_log'] = $return_log;

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


    public function estructuraJson($request)
    {
        $params = $request->all();

        extract($params);
        $nombre = isset($nombre)==true?$nombre:'';
        $fecha = isset($fecha)==true?$fecha:'';
        $procedimiento = isset($procedimiento)==true?$procedimiento:'';
        $detalle = isset($detalle)==true?$detalle:'';
        $incidene = isset($incidene)==true?$incidene:'';
        $profesional = isset($profesional)==true?$profesional:'';
        $rut_responsable = isset($rut_responsable)==true?$rut_responsable:'';
        $comentario = isset($comentario)==true?$comentario:'';
        $transfusion = isset($transfusion)==true?$transfusion:'';
        $dona_organos = isset($dona_organos)==true?$dona_organos:'';
        $dona_organos_parcial = isset($dona_organos_parcial)==true?$dona_organos_parcial:'';
        $dona_sangre = isset($dona_sangre)==true?$dona_sangre:'';
        $impedimento_donar = isset($impedimento_donar)==true?$impedimento_donar:'';
        $comentario_gs = isset($comentario_gs)==true?$comentario_gs:'';
        $hepatitis = isset($hepatitis)==true?$hepatitis:'';
        $comentario_hepa = isset($comentario_hepa)==true?$comentario_hepa:'';
        $id_grupo_sanguineo = isset($id_grupo_sanguineo)==true?$id_grupo_sanguineo:'';
        $nombre_enfermedad_cronica = isset($nombre_enfermedad_cronica)==true?$nombre_enfermedad_cronica:'';
        $id_enfermedad_cronica = isset($id_enfermedad_cronica)==true?$id_enfermedad_cronica:'';
        $id_medicamento = isset($id_medicamento)==true?$id_medicamento:'';
        $nombre_medicamento_cronico = isset($nombre_medicamento_cronico)==true?$nombre_medicamento_cronico:'';
        $id_dosis = isset($id_dosis)==true?$id_dosis:'';
        $dosis = isset($dosis)==true?$dosis:'';
        $institucion = isset($institucion)==true?$institucion:'';
        $discapacidad_tipo = isset($discapacidad_tipo)==true?$discapacidad_tipo:'';
        $discapacidad_grado = isset($discapacidad_grado)==true?$discapacidad_grado:'';
        $discapacidad_permanente = isset($discapacidad_permanente)==true?$discapacidad_permanente:'';

        $json_data = array(
            'nombre'=>$nombre,
            'fecha'=>$fecha,
            'procedimiento'=>$procedimiento,
            'detalle'=>$detalle,
            'incidene'=>$incidene,
            'profesional'=>$profesional,
            'rut_responsable'=>$rut_responsable,
            'comentario'=>$comentario,
            'transfusion'=>$transfusion,
            'dona_organos'=>$dona_organos,
            'dona_organos_parcial'=>$dona_organos_parcial,
            'dona_sangre'=>$dona_sangre,
            'impedimento_donar'=>$impedimento_donar,
            'comentario_gs'=>$comentario_gs,
            'hepatitis'=>$hepatitis,
            'comentario_hepa'=>$comentario_hepa,
            'id_grupo_sanguineo'=>$id_grupo_sanguineo,
            'nombre_enfermedad_cronica'=> $nombre_enfermedad_cronica,
            'id_enfermedad_cronica'=>$id_enfermedad_cronica,
            'id_medicamento'=>$id_medicamento,
            'nombre_medicamento_cronico'=>$nombre_medicamento_cronico,
            'id_dosis'=>$id_dosis,
            'dosis'=>$dosis,
            'institucion'=>$institucion,
            'discapacidad_tipo'=>$discapacidad_tipo,
            'discapacidad_grado'=>$discapacidad_grado,
            'discapacidad_permanente'=>$discapacidad_permanente,
            'fecha_regitro'=>date('d-m-Y')
        );

        /* JSON */
        /*
          {
            "nombre":"",
            "fecha":"",
            "procedimiento":"",
            "detalle":"",
            "rut_responsable":"",
            "comentario":"",
            "transfusion":"",
            "dona_organos":"",
            "dona_organos_parcial":"",
            "dona_sangre":"",
            "impedimento_donar":"",
            "comentario_gs":"",
            "hepatitis":"",
            "comentario_hepa":"",
            "id_grupo_sanguineo":"",
            "nombre_enfermedad_cronica":"",
            "id_enfermedad_cronica":"",
            "id_medicamento":"",
            "nombre_medicamento_cronico":"",
            "id_dosis":"",
            "dosis":"",
            "institucion":"",
            "discapacidad_tipo":"",
            "discapacidad_grado":"",
            "discapacidad_permanente":"",
          }
        */

        return json_encode($json_data);
    }

    public function eliminar(Request $request){

        $antecedente = Antecedente::find($request->id_antecedente);
        if($antecedente->delete())
            {
				$datos['estado'] = 1;
                $datos['msg'] = 'Registros Creado';
                $datos['request_data'] = $request->all();

				if( $request->id_tipo_antecedente == 7)
                {
					$profesional = Profesional::where('id_usuario', $request->id_users)->get()->first();

					$registro_med_cronico = new MedicamentoUsoCronicoGeneral();
					$registro_med_cronico->id_ficha_atencion = NULL;
					$registro_med_cronico->id_paciente = $request->id_paciente;
					$registro_med_cronico->id_profesional = $profesional->id;
					$registro_med_cronico->nombre_medicamento = $request->nombre_medicamento_cronico;
					$registro_med_cronico->cantidad = $request->dosis;
					$registro_med_cronico->cliente = 0;
					$registro_med_cronico->tipo_enfermedad = 'cronica';
					$registro_med_cronico->estado = 1;

					if($registro_med_cronico->save())
					{
						$datos['med_cronico']['estado'] = 1;
						$datos['med_cronico']['msg'] = 'Registros Creado';
					}
					else
					{
						$datos['med_cronico']['estado'] = 0;
						$datos['med_cronico']['msg'] = 'Falla Registros';
					}
                }

                $texto_datos = '';

                switch($request->id_tipo_antecedente)
                {
                    case 1: //Antecedentes Anestesias Pacientes
                        $texto_datos .= 'Registro de Antecedentes Anestesias Pacientes -> Procedimiento: '.$request->procedimiento.', Incidente: '.$request->comentario.', Fecha:'.$request->fecha_regitro.'';
                    break;
                    case 2: //Patologías Crónicas
                        $texto_datos .= 'Registro de Patologías Crónicas -> Nombre: '.$request->nombre.', Comentario:'.$request->comentario;
                    break;
                    case 3: //Antecedentes Cirugias y Procedimientos
                        $texto_datos .= 'Registro de Antecedentes Cirugias y Procedimientos -> Fecha: '.$request->fecha.', Procedimiento: '.$request->procedimiento.', Incidente:'.$request->comentario.'';
                    break;
                    case 4: //Antecedentes Hemorragias Pacientes
                        $texto_datos .= 'Registro de Antecedentes Hemorragias Pacientes -> Procedimiento: '.$request->procedimiento.', Incidente: '.$request->comentario.'';
                    break;
                    case 5: //Solicitud de Antecedentes a servicios asistenciales
                        $texto_datos .= 'Registro de Solicitud de Antecedentes a servicios asistenciales -> Antecedente: '.$request->procedimiento.', Institución: '.$request->institucion.', Fecha:'.$request->fecha.'';
                    break;
                    case 6: //Antecedentes de Alergias
                        $texto_datos .= 'Registro de Antecedentes de Alergias -> Alergia: '.$request->nombre.', Detalle:'.$request->comentario.'';
                    break;
                    case 7: //Antecedentes de Medicamento Crónico
                        $texto_datos .= 'Registro de Antecedentes de Medicamento Crónico -> Medicamento: '.$request->nombre_medicamento_cronico.', Dosis:'.$request->dosis.'';
                    break;
                    case 8: //Presenta alguna discapacidad ?
                        $texto_datos .= 'Registro de Presenta alguna discapacidad ? -> Tipo de Discapacidad: '.$request->discapacidad_tipo.', Grado: '.$request->discapacidad_grado.', Permanente:'.$request->discapacidad_permanente.'';
                    break;
                }

                $profesional = Profesional::where('id_usuario', $request->id_users)->get()->first();

                $return_log = PacienteHistoricoDatosMedicosController::registrar($request->id_paciente, $profesional->id, $texto_datos);

                $datos['log_datos_med'] = $return_log;
                Log::build([
                    'path' => storage_path('logs/log_datos_medicos_' . date('Ymd') . '.log'),
                ])->info(json_encode($return_log) );
            }
			else
			{
                $datos['estado'] = 0;
                $datos['msg'] = 'Problemas al registrar';
                $datos['request_data'] = $request->all();
            }

            return response($datos)->header('Content-Type', 'application/json');
    }
}
