<?php

namespace App\Http\Controllers;

use App\Models\Asistente;
use App\Models\AsistenteLugarAtencion;
use App\Models\ExamenEspecialidad;
use App\Models\ExamenEspecialidadImg;
use App\Models\ExamenEspecialidadTemplate;
use App\Models\ExamenEspecialidadTipo;
use App\Models\FichaAtencion;
use App\Models\HoraMedica;
use App\Models\Paciente;
use App\Models\Profesional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TranscripcionController extends Controller
{
    /** SECCION ASISTENTE */
    public function CargarExamen(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_hora_medica))
        {
            $error['id_hora_medica'] = 'Campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $hora_medica = HoraMedica::find($request->id_hora_medica);
            if($hora_medica)
            {
                $asistente = Asistente::where('id_usuario', Auth::user()->id)->first();


                $filtro_ala = array();
                $filtro_ala[] = array('id_asistente', $asistente->id);
                $filtro_ala[] = array('id_profesional', $hora_medica->id_profesional);
                $filtro_ala[] = array('id_lugar_atencion', $hora_medica->id_lugar_atencion);
                $asistente_lugar_atension = AsistenteLugarAtencion::where($filtro_ala)->first();

                if($asistente_lugar_atension)
                {
                    if($asistente_lugar_atension->examen == 1)
                    {
                        $tipo_examen = ExamenEspecialidadTipo::where('nombre', $hora_medica->alias_examen )->first();
                        if($tipo_examen)
                        {
                            $tipo_examen_especialidad = ExamenEspecialidadTemplate::find($tipo_examen->id_template);
                            $datos['tipo_examen']['id'] = $tipo_examen_especialidad->id;
                            $datos['tipo_examen']['nombre'] = $tipo_examen_especialidad->nombre;
                            $datos['tipo_examen']['formulario'] = $tipo_examen_especialidad->cuerpo;
                            $datos['tipo_examen']['estructura'] = $tipo_examen_especialidad->estructura;
                            $datos['tipo_examen']['alias'] = $tipo_examen_especialidad->alias;

                            $examen_resultado = ExamenEspecialidad::with('ExamenEspecialidadImg')
                                                                ->where('id_ficha_atencion', $hora_medica->id_ficha_atencion)
                                                                ->where('nombre', $tipo_examen_especialidad->nombre )
                                                                ->first();

                            if($examen_resultado)
                            {
                                $datos['ficha_examen'] = $examen_resultado;
                                $datos['estado'] = 1;
                                $datos['msj'] = 'registro';
                            }
                            else
                            {
                                $datos['estado'] = 0;
                                $datos['msj'] = 'Examan a cargar no encontrado';
                            }

                        }
                        else
                        {
                            $datos['estado'] = 0;
                            $datos['msj'] = 'Tipo Examen no encontrado';
                        }
                    }
                    else
                    {
                        $datos['estado'] = 0;
                        $datos['msj'] = 'Asistente sin permiso para transcribir';
                    }
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'Asistente sin relacion';
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Hora no encontrada';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Campos requeridos';
            $datos['error'] = $error;
        }

        return $datos;
    }

    public function RegistrarTranscripcion(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;
        $mensaje = '';

        if(empty($request->examen_especialidad_id))
        {
            $error['examen_especialidad_id'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->id_ficha_atencion))
        {
            $error['id_ficha_atencion'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->id_ficha_especialidad))
        {
            $error['id_ficha_especialidad'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->id_examen_tipo))
        {
            $error['id_examen_tipo'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->id_paciente))
        {
            $error['id_paciente'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->id_profesional))
        {
            $error['id_profesional'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->id_tipo))
        {
            $error['id_tipo'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->alias))
        {
            $error['alias'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            /** ESTRUCTURA JSON DESDE TEMPLATE */
            $parametro = $request->all();
            $parametro['id_fichas_atenciones'] = $request->id_ficha_atencion;

            $examen_original = ExamenEspecialidad::find($request->examen_especialidad_id);

            $examen_json = ExamenEspecialidadController::estructuraJson($examen_original->id_template,$parametro);

            $examen_original_cuerpo = json_decode($examen_original->cuerpo);

            $tiene_biopsia = 0;
            $tiene_muestra_hp = 0;

            // echo $examen_json['json'];
            if($examen_json['estado'] == 1)
            {
                $json_temp = json_decode($examen_json['json']);

                $datos['examen']['examen_json'] = json_encode($json_temp);


                /** CARGA DE DATA BASE */
                foreach ($json_temp as $key1 => $value1)
                {
                    foreach ($examen_original_cuerpo as $key2 => $value2)
                    {
                        if( $key1 == $key2)
                        {
                            $json_temp->$key1 = $value2;
                        }
                    }
                }
                $datos['examen']['examen_original_cuerpo'] = json_encode($examen_original_cuerpo);

                /** CARGA DE DATA DESDE FORMULARIO */
                foreach ($json_temp as $key1 => $value1)
                {
                    foreach ($parametro as $key2 => $value2)
                    {
                        $temp_2 = str_replace('_'.$request->alias,'',$key2);
                        if( $key1 == $temp_2 )
                        {
                            $json_temp->$key1 = $value2;

                            if($temp_2 == 'biopsia' && $value2 == 1)
                            {
                                $tiene_biopsia = 1;
                            }

                            if($temp_2 == 'muestra_hp' && $value2 == 1)
                            {
                                $tiene_muestra_hp = 1;
                            }
                        }
                    }
                }

                $datos['examen']['parametro'] = json_encode($parametro);

                $asistente = Asistente::where('id_usuario', Auth::user()->id)->first();

                $examen = ExamenEspecialidad::find($request->examen_especialidad_id);
                $examen->id_asistente = $asistente->id;
                $examen->cuerpo = json_encode($json_temp);
                $datos['examen']['cuerpo'] = json_encode($json_temp);

                // if($registro_rfl->save())
                if($examen->save())
                {
                    $datos['estado'] = 1;
                    $datos['msj'] = 'registrado';

                    $datos['examen']['estado'] = 1;
                    $datos['examen']['msj'] = 'registro exitoso';
                    $mensaje .= 'Ficha Otorrino Rinofibrolaringoscopía guardada de forma correcta\n';

                    /** CAMBAIR DE ESTADO HORA  */
                    $hora_medica = HoraMedica::where('id_ficha_atencion', $request->id_ficha_atencion)->get()->first();
                    $hora_medica->id_estado = 11; // 11. EXAMEN TRANSCRITO
                    if($hora_medica->save())
                    {
                        $datos['hora_medica']['estado'] = 1;
                        $datos['hora_medica']['msj'] = 'registro actualizado';

                        /** CAMBAIR DE ESTADO FICHA ATENCION */
                        $ficha_atencion = FichaAtencion::find($request->id_ficha_atencion);
                        $ficha_atencion->finalizada = 3; // 3. EXAMEN TRANSCRITO
                        if($ficha_atencion->save())
                        {
                            $datos['ficha_atencion']['estado'] = 1;
                            $datos['ficha_atencion']['msj'] = 'registro actualizado';
                        }
                        else
                        {
                            $datos['ficha_atencion']['estado'] = 0;
                            $datos['ficha_atencion']['msj'] = 'falla actualizando';
                        }
                    }
                    else
                    {
                        $datos['hora_medica']['estado'] = 0;
                        $datos['hora_medica']['msj'] = 'falla actualizando';
                    }

                    /** registro de imagenes  */
                    if(!empty($request->input_lista_imagenes))
                    {
                        $array_imagenes = json_decode($request->input_lista_imagenes);

                        // var_dump( $request->alias );
                        // var_dump( $array_imagenes->eda );
                        // var_dump( $array_imagenes->{$request->alias} );
                        if(!empty($array_imagenes->{$request->alias}))
                        {
                            $datos['array_imagenes'] = $array_imagenes->{$request->alias};
                            $resulto_img = array();
                            foreach ($array_imagenes->{$request->alias} as $key => $value)
                            {
                                if(!str_contains($value[0], "http:"))
                                {
                                    $paciente = Paciente::find($request->id_paciente);
                                    // echo json_encode($value);
                                    $ruta_temp = $value[0];
                                    $nombre_real = $value[1];
                                    $nombre_temp = $value[2];
                                    $file_extension = $value[3];
                                    $nombre_final = $paciente->rut.'_'.$examen->id.'_'.date('YmdHis').'_'.uniqid().'.'.$file_extension;

                                    $resulto_img[$key] = CargaImagenController::moverImagen($nombre_temp, 'img_examen', $nombre_final);
                                    $registro_img = new ExamenEspecialidadImg();
                                    $registro_img->id_examen = $examen->id;
                                    $registro_img->url = $resulto_img[$key]['proceso']['url'];
                                    $registro_img->nombre = $nombre_final;
                                    $registro_img->otro = '';
                                    $registro_img->estado = 1;

                                    if($registro_img->save())
                                    {
                                        $resulto_img[$key]['estado'] = 1;
                                        $resulto_img[$key]['msj'] = 'imagen registrada';
                                    }
                                    else
                                    {
                                        $resulto_img[$key]['estado'] = 0;
                                        $resulto_img[$key]['msj'] = 'falla en registro de imagen';
                                    }
                                }
                            }
                            $datos['examen']['resulto_img'] = $resulto_img;
                        }
                    }
                }
                else
                {
                    $datos['examen']['estado'] = 0;
                    $datos['examen']['msj'] = 'registro NO exitoso';
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'problema procesando informacion del examen';
                $datos['examen_json'] = $examen_json;
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

    /** SECCION PROFESIONAL */
    public function verExamenTranscrito(Request $request)
    {
        $mensaje = '';

        $user = Auth::user();
        $profesional = Profesional::where('id_usuario', $user->id)->first();

        if($profesional)
        {
            $filtro = array();
            $filtro[] = array('fichas_atenciones.id_profesional', $profesional->id);
            // $filtro[] = array('finalizada', 3);
            $examenes_transcritos = FichaAtencion::select(
                                                        'fichas_atenciones.id as fichas_atenciones_id',
                                                        'fichas_atenciones.id_lugar_atencion as fichas_atenciones_id_lugar_atencion',
                                                        'lugares_atencion.nombre as lugares_atencion_nombre',
                                                        'fichas_atenciones.motivo as fichas_atenciones_motivo',
                                                        'fichas_atenciones.antecedentes as fichas_atenciones_antecedentes',
                                                        'fichas_atenciones.examen_fisico as fichas_atenciones_examen_fisico',
                                                        'fichas_atenciones.hipotesis_diagnostico as fichas_atenciones_hipotesis_diagnostico',
                                                        'fichas_atenciones.diagnostico_ce10 as fichas_atenciones_diagnostico_ce10',
                                                        'fichas_atenciones.cronico as fichas_atenciones_cronico',
                                                        'fichas_atenciones.ges as fichas_atenciones_ges',
                                                        'fichas_atenciones.confidencial as fichas_atenciones_confidencial',
                                                        'fichas_atenciones.profesional_visible as fichas_atenciones_profesional_visible',
                                                        'fichas_atenciones.temperatura as fichas_atenciones_temperatura',
                                                        'fichas_atenciones.pulso as fichas_atenciones_pulso',
                                                        'fichas_atenciones.frecuencia_reposo as fichas_atenciones_frecuencia_reposo',
                                                        'fichas_atenciones.peso as fichas_atenciones_peso',
                                                        'fichas_atenciones.talla as fichas_atenciones_talla',
                                                        'fichas_atenciones.imc as fichas_atenciones_imc',
                                                        'fichas_atenciones.estado_nutricional as fichas_atenciones_estado_nutricional',
                                                        'fichas_atenciones.presion_bi as fichas_atenciones_presion_bi',
                                                        'fichas_atenciones.presion_bd as fichas_atenciones_presion_bd',
                                                        'fichas_atenciones.presion_de_pie as fichas_atenciones_presion_de_pie',
                                                        'fichas_atenciones.presion_sentado as fichas_atenciones_presion_sentado',
                                                        'fichas_atenciones.ct_estado_conciencia as fichas_atenciones_ct_estado_conciencia',
                                                        'fichas_atenciones.ct_lenguaje as fichas_atenciones_ct_lenguaje',
                                                        'fichas_atenciones.ct_traslado as fichas_atenciones_ct_traslado',
                                                        'fichas_atenciones.id_paciente as fichas_atenciones_id_paciente',
                                                        'fichas_atenciones.id_profesional as fichas_atenciones_id_profesional',
                                                        'fichas_atenciones.finalizada as fichas_atenciones_finalizada',

                                                        'examen_especialidad.id as examen_especialidad_id',
                                                        'examen_especialidad.id_tipo as examen_especialidad_id_tipo',
                                                        'examen_especialidad.id_template as examen_especialidad_id_template',
                                                        'examen_especialidad.id_examen_tipo as examen_especialidad_id_examen_tipo',
                                                        'examen_especialidad.id_sub_tipo_especialidad as examen_especialidad_id_sub_tipo_especialidad',
                                                        'examen_especialidad.id_ficha_atencion as examen_especialidad_id_ficha_atencion',
                                                        'examen_especialidad.id_ficha_especialidad as examen_especialidad_id_ficha_especialidad',
                                                        'examen_especialidad.id_paciente as examen_especialidad_id_paciente',
                                                        'examen_especialidad.id_profesional as examen_especialidad_id_profesional',
                                                        'examen_especialidad.id_asistente as examen_especialidad_id_asistente',
                                                        'examen_especialidad.nombre as examen_especialidad_nombre',
                                                        'examen_especialidad.cuerpo as examen_especialidad_cuerpo',
                                                        'examen_especialidad.estado as examen_especialidad_estado',

                                                        'pacientes.id as paciente_id',
                                                        'pacientes.rut as paciente_rut',
                                                        'pacientes.nombres as paciente_nombres',
                                                        'pacientes.apellido_uno as paciente_apellido_uno',
                                                        'pacientes.apellido_dos as paciente_apellido_dos',
                                                        'pacientes.telefono_uno as paciente_telefono_uno',
                                                        'pacientes.email as paciente_email',
                                                        'pacientes.fecha_nac as paciente_fecha_nac',

                                                        'asistentes.id as asistentes_id',
                                                        'asistentes.rut as asistentes_rut',
                                                        'asistentes.nombres as asistentes_nombres',
                                                        'asistentes.apellido_uno as asistentes_apellido_uno',
                                                        'asistentes.apellido_dos as asistentes_apellido_dos',
                                                        'asistentes.telefono_uno as asistentes_telefono_uno',
                                                        'asistentes.email as asistentes_email',

                                                        'horas_medicas.id as horas_medicas_id',
                                                        'horas_medicas.fecha_consulta as horas_medicas_fecha_consulta',
                                                        'horas_medicas.hora_inicio as horas_medicas_hora_inicio',
                                                        'horas_medicas.hora_termino as horas_medicas_hora_termino',
                                                        'horas_medicas.tipo_hora_medica as horas_medicas_tipo_hora_medica',
                                                        'horas_medicas.alias_examen as horas_medicas_alias_examen',
                                                        'horas_medicas.descripcion as horas_medicas_descripcion',
                                                        'horas_medicas.fecha_realizacion_consulta as horas_medicas_fecha_realizacion_consulta',
                                                        'horas_medicas.id_ficha_atencion as horas_medicas_id_ficha_atencion',
                                                        'horas_medicas.id_estado as horas_medicas_id_estado'

                                                        )
                                    ->join('lugares_atencion', 'lugares_atencion.id', '=', 'fichas_atenciones.id_lugar_atencion')
                                    ->join('examen_especialidad', 'examen_especialidad.id_ficha_atencion', '=', 'fichas_atenciones.id')
                                    ->join('examen_especialidad_template', 'examen_especialidad_template.id', '=', 'examen_especialidad.id_template')
                                    ->join('pacientes', 'pacientes.id', '=', 'fichas_atenciones.id_paciente')
                                    ->join('asistentes', 'asistentes.id', '=', 'examen_especialidad.id_asistente')
                                    ->join('horas_medicas', 'horas_medicas.id_ficha_atencion', '=', 'fichas_atenciones.id')
                                    ->where($filtro)
                                    ->whereIn('fichas_atenciones.finalizada', [2,3])
                                    ->get();

            // foreach ($examenes_transcritos as $key => $value)
            // {
            //     //examen_especialidad_img
            //     $imagenes = ExamenEspecialidadImg::where('id_examen', $value->examen_especialidad_id)->get();
            //     if($imagenes)
            //         $examenes_transcritos[$key]['imagenes'] = $imagenes;
            //     else
            //         $examenes_transcritos[$key]['imagenes'] = array();
            // }

            // echo json_encode($examenes_transcritos);
            // exit();
            return view('app.profesional.examen_transcripcion',
                            [
                                'examenes_transcritos' => $examenes_transcritos,
                            ]
                        );
        }
        else
        {
            $mensaje = 'Profesional: Profesional no encontrado';
            return redirect()->back()->with('mensaje', $mensaje);
        }

    }

    public function CargarExamenProfesional(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_hora_medica))
        {
            $error['id_hora_medica'] = 'Campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $hora_medica = HoraMedica::find($request->id_hora_medica);
            if($hora_medica)
            {
                $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

                $tipo_examen = ExamenEspecialidadTipo::where('nombre', $hora_medica->alias_examen )->first();
                if($tipo_examen)
                {
                    $tipo_examen_especialidad = ExamenEspecialidadTemplate::find($tipo_examen->id_template);
                    $datos['tipo_examen']['id'] = $tipo_examen_especialidad->id;
                    $datos['tipo_examen']['nombre'] = $tipo_examen_especialidad->nombre;
                    $datos['tipo_examen']['formulario'] = $tipo_examen_especialidad->cuerpo;
                    $datos['tipo_examen']['estructura'] = $tipo_examen_especialidad->estructura;
                    $datos['tipo_examen']['alias'] = $tipo_examen_especialidad->alias;

                    $examen_resultado = ExamenEspecialidad::with('ExamenEspecialidadImg')
                                                        ->where('id_ficha_atencion', $hora_medica->id_ficha_atencion)
                                                        ->where('id_profesional', $profesional->id)
                                                        ->where('nombre', $tipo_examen_especialidad->nombre )
                                                        ->first();

                    if($examen_resultado)
                    {
                        $datos['ficha_examen'] = $examen_resultado;
                        $datos['estado'] = 1;
                        $datos['msj'] = 'registro';
                    }
                    else
                    {
                        $datos['estado'] = 0;
                        $datos['msj'] = 'Examan a cargar no encontrado';
                    }
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'Tipo Examen no encontrado';
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Hora no encontrada';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Campos requeridos';
            $datos['error'] = $error;
        }

        return $datos;
    }

    public function RegistrarTranscripcionProfesional(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;
        $mensaje = '';

        if(empty($request->examen_especialidad_id))
        {
            $error['examen_especialidad_id'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->id_ficha_atencion))
        {
            $error['id_ficha_atencion'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->id_ficha_especialidad))
        {
            $error['id_ficha_especialidad'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->id_examen_tipo))
        {
            $error['id_examen_tipo'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->id_paciente))
        {
            $error['id_paciente'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->id_profesional))
        {
            $error['id_profesional'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->id_tipo))
        {
            $error['id_tipo'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->alias))
        {
            $error['alias'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            /** ESTRUCTURA JSON DESDE TEMPLATE */
            $parametro = $request->all();
            $parametro['id_fichas_atenciones'] = $request->id_ficha_atencion;

            $examen_original = ExamenEspecialidad::find($request->examen_especialidad_id);
            $examen_json = ExamenEspecialidadController::estructuraJson($examen_original->id_template,$parametro);

            $examen_original_cuerpo = json_decode($examen_original->cuerpo);

            $tiene_biopsia = 0;
            $tiene_muestra_hp = 0;

            // echo $examen_json['json'];
            if($examen_json['estado'] == 1)
            {
                $json_temp = json_decode($examen_json['json']);

                $datos['examen']['examen_json'] = json_encode($json_temp);


                /** CARGA DE DATA BASE */
                foreach ($json_temp as $key1 => $value1)
                {
                    foreach ($examen_original_cuerpo as $key2 => $value2)
                    {
                        if( $key1 == $key2)
                        {
                            $json_temp->$key1 = $value2;
                        }
                    }
                }
                $datos['examen']['examen_original_cuerpo'] = json_encode($examen_original_cuerpo);

                /** CARGA DE DATA DESDE FORMULARIO */
                foreach ($json_temp as $key1 => $value1)
                {
                    foreach ($parametro as $key2 => $value2)
                    {
                        $temp_2 = str_replace('_'.$request->alias,'',$key2);
                        if( $key1 == $temp_2 )
                        {
                            $json_temp->$key1 = $value2;

                            if($temp_2 == 'biopsia' && $value2 == 1)
                            {
                                $tiene_biopsia = 1;
                            }

                            if($temp_2 == 'muestra_hp' && $value2 == 1)
                            {
                                $tiene_muestra_hp = 1;
                            }
                        }
                    }
                }

                $datos['examen']['parametro'] = json_encode($parametro);

                $examen = ExamenEspecialidad::find($request->examen_especialidad_id);
                $examen->cuerpo = json_encode($json_temp);
                $datos['examen']['cuerpo'] = json_encode($json_temp);

                // if($registro_rfl->save())
                if($examen->save())
                {
                    $datos['estado'] = 1;
                    $datos['msj'] = 'registrado';

                    $datos['examen']['estado'] = 1;
                    $datos['examen']['msj'] = 'registro exitoso';
                    $mensaje .= 'Ficha Otorrino Rinofibrolaringoscopía guardada de forma correcta\n';

                    /** CAMBAIR DE ESTADO HORA  */
                    $hora_medica = HoraMedica::where('id_ficha_atencion', $request->id_ficha_atencion)->get()->first();
                    $hora_medica->id_estado = 12; // 12. EXAMEN FINALIZADO
                    if($hora_medica->save())
                    {
                        $datos['hora_medica']['estado'] = 1;
                        $datos['hora_medica']['msj'] = 'registro actualizado';

                        /** CAMBAIR DE ESTADO FICHA ATENCION */
                        $ficha_atencion = FichaAtencion::find($request->id_ficha_atencion);
                        $ficha_atencion->finalizada = 1; // 1. CONSULTA/EXAMEN FINALIZADA
                        if($ficha_atencion->save())
                        {
                            $datos['ficha_atencion']['estado'] = 1;
                            $datos['ficha_atencion']['msj'] = 'registro actualizado';
                        }
                        else
                        {
                            $datos['ficha_atencion']['estado'] = 0;
                            $datos['ficha_atencion']['msj'] = 'falla actualizando';
                        }
                    }
                    else
                    {
                        $datos['hora_medica']['estado'] = 0;
                        $datos['hora_medica']['msj'] = 'falla actualizando';
                    }

                    /** registro de imagenes  */
                    if(!empty($request->input_lista_imagenes))
                    {
                        $array_imagenes = json_decode($request->input_lista_imagenes);

                        // var_dump( $request->alias );
                        // var_dump( $array_imagenes->eda );
                        // var_dump( $array_imagenes->{$request->alias} );
                        if(!empty($array_imagenes->{$request->alias}))
                        {
                            $datos['array_imagenes'] = $array_imagenes->{$request->alias};
                            $resulto_img = array();
                            foreach ($array_imagenes->{$request->alias} as $key => $value)
                            {
                                if(!str_contains($value[0], "http:"))
                                {
                                    $paciente = Paciente::find($request->id_paciente);
                                    // echo json_encode($value);
                                    $ruta_temp = $value[0];
                                    $nombre_real = $value[1];
                                    $nombre_temp = $value[2];
                                    $file_extension = $value[3];
                                    $nombre_final = $paciente->rut.'_'.$examen->id.'_'.date('YmdHis').'_'.uniqid().'.'.$file_extension;

                                    $resulto_img[$key] = CargaImagenController::moverImagen($nombre_temp, 'img_examen', $nombre_final);
                                    $registro_img = new ExamenEspecialidadImg();
                                    $registro_img->id_examen = $examen->id;
                                    $registro_img->url = $resulto_img[$key]['proceso']['url'];
                                    $registro_img->nombre = $nombre_final;
                                    $registro_img->otro = '';
                                    $registro_img->estado = 1;

                                    if($registro_img->save())
                                    {
                                        $resulto_img[$key]['estado'] = 1;
                                        $resulto_img[$key]['msj'] = 'imagen registrada';
                                    }
                                    else
                                    {
                                        $resulto_img[$key]['estado'] = 0;
                                        $resulto_img[$key]['msj'] = 'falla en registro de imagen';
                                    }
                                }
                            }
                            $datos['examen']['resulto_img'] = $resulto_img;
                        }
                    }

                    $mensaje_correo = '';
                    if($tiene_biopsia == 1)
                        $mensaje_correo = 'El resultado de Biopsia se encontrara disponible en los proximos 20 dias.<br/>';
                    else
                        $mensaje_correo = 'No se realizo Biopsia.<br/>';

                    if($tiene_muestra_hp == 1)
                        $mensaje_correo = 'El resultado de la Muestra H.P se encuentra disponible para su retiro.<br>';
                    else
                        $mensaje_correo = 'No se tomo Muestra H.P.<br>';


                    $url_documento = route('pdf.examen_especialidad', array('id_examen_especialidad' => $examen->id));

                    /** ENVIO DE CORREO */
                    $paciente = Paciente::where('id', $examen->id_paciente)->first();
                    $blade = 'resultado_examen';
                    $to = array(
                            array('email' => $paciente->email,'name' => $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos),
                        );
                    $cc = array();
                    $bcc = array();
                    $asunto = 'MED-SDI - Resultado de Examen';
                    $body = array(
                        'nombre_cliente' => $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos,
                        'mensaje' => $mensaje_correo,
                        'url_documento' => $url_documento,
                    );
                    $archivo = '';/** pendiente */
                    $id_institucion = '';

                    $result_mail =  SendMailController::envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, $id_institucion);

                    if($result_mail['estado'])
                    {
                        $datos['email']['estado'] = 1;
                        $datos['email']['msj'] = 'Correo enviado';
                        $datos['email']['result_mail'] = $result_mail;
                    }
                    else
                    {
                        $datos['email']['estado'] = 0;
                        $datos['email']['msj'] = 'Problema en el envio del Correo.';
                        $datos['email']['result_mail'] = $result_mail;
                    }
                }
                else
                {
                    $datos['examen']['estado'] = 0;
                    $datos['examen']['msj'] = 'registro NO exitoso';
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'problema procesando informacion del examen';
                $datos['examen_json'] = $examen_json;
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
