<?php

namespace App\Http\Controllers;

use App\Models\Asistente;
use App\Models\Bono;
use App\Models\Especialidad;
use App\Models\HoraMedica;
use App\Models\Instituciones;
use App\Models\Invitacion;
use App\Models\LugarAtencion;
use App\Models\Mensajes;
use App\Models\Paciente;
use App\Models\Prevision;
use App\Models\Profesional;
use App\Models\Servicios;
use App\Models\Parametro;
use App\Models\Personas;
use App\Models\ProfesionalConvenio;
use App\Models\ProfesionalesLugaresAtencion;
use App\Models\ProfesionalHorario;
use App\Models\ProfesionalInstitucionConvenio;
use App\Models\SubTipoEspecialidad;
use App\Models\TipoEspecialidad;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EscritorioGeneral extends Controller
{
    /**
     * BUSQUEDA DE PROFESIONAL
     *
     * @param Request $request
     * @return array (Profesional)
     */
    public function buscarProfesional(Request $request)
    {
        $datos = array();
        $filtro = array();
        if(!empty($request->nombre))
            $filtro[] = array('nombre','like',$request->nombre.'%');
        if(!empty($request->apellido_uno))
            $filtro[] = array('apellido_uno','like',$request->apellido_uno.'%');
        if(!empty($request->apellido_dos))
            $filtro[] = array('apellido_dos','like',$request->apellido_dos.'%');

        if(!empty($request->rut))
            $filtro[] = array('rut',$request->rut);

        // if(!empty($request->id_direccion))
        //     $filtro[] = array('id_direccion',request->id_direccion);
        if(!empty($request->id_especialidad))
            $filtro[] = array('id_especialidad', $request->id_especialidad);
        if(!empty($request->id_tipo_especialidad))
            $filtro[] = array('id_tipo_especialidad', $request->id_tipo_especialidad);
        if(!empty($request->id_sub_tipo_especialidad))
            $filtro[] = array('id_sub_tipo_especialidad', $request->id_sub_tipo_especialidad);

        if(!empty($request->id_sub_tipo_especialidad))
            $filtro[] = array('id_sub_tipo_especialidad', $request->id_sub_tipo_especialidad);
        if(!empty($request->id_sub_tipo_especialidad))
            $filtro[] = array('id_sub_tipo_especialidad', $request->id_sub_tipo_especialidad);


        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        if($profesional)
            $registros = Profesional::where($filtro)->whereNotIn('id',[$profesional->id])->get();
        else
            $registros = Profesional::where($filtro)->get();


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
        return $datos;
    }

    /**
     * BUSQUEDA DE PROFESIONAL buscador
     *
     * @param Request $request
     * @return array (Profesional)
     */
    public function buscarProfesionalBuscador(Request $request)
    {
        $datos = array();
        $filtro = array();
        if(!empty($request->nombre))
            $filtro[] = array('nombre','like',$request->nombre.'%');
        if(!empty($request->apellido_uno))
            $filtro[] = array('apellido_uno','like',$request->apellido_uno.'%');
        if(!empty($request->apellido_dos))
            $filtro[] = array('apellido_dos','like',$request->apellido_dos.'%');
        // if(!empty($request->id_direccion))
        //     $filtro[] = array('id_direccion',request->id_direccion);
        if(!empty($request->id_especialidad))
            $filtro[] = array('id_especialidad', $request->id_especialidad);
        if(!empty($request->id_tipo_especialidad))
            $filtro[] = array('id_tipo_especialidad', $request->id_tipo_especialidad);
        if(!empty($request->id_sub_tipo_especialidad))
            $filtro[] = array('id_sub_tipo_especialidad', $request->id_sub_tipo_especialidad);

        // if(Auth::user()->hasRole('Profesional'))
        // {
        //     $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        //     $registros = Profesional::where($filtro)->whereNotIn('id',[$profesional->id])->get();
        // }
        // else
        {
            // $registros = Profesional::where($filtro)
            //                 ->with(['Direccion'=>function($query) use ($request){
            //                         $query->where('id_ciudad',$request->id_ciudad);
            //                 }])
            //                 ->Dire
            //                 ->get();
            $sql  = "SELECT ";
            $sql .= "    profesionales.id profesionales_id, ";
            $sql .= "    profesionales.nombre profesionales_nombre, ";
            $sql .= "    profesionales.apellido_uno profesionales_apellido_uno, ";
            $sql .= "    profesionales.apellido_dos profesionales_apellido_dos, ";
            $sql .= "    profesionales.rut profesionales_rut, ";
            $sql .= "    profesionales.telefono_uno profesional_telefono_uno, ";
            $sql .= "    profesionales.email profesional_email, ";
            $sql .= "    profesionales.certificado profesional_certificado, ";
            $sql .= "    profesionales.numero_certificado profesional_numero_certificado, ";
            $sql .= "    profesionales.dv_certiicado profesional_dv_certiicado , ";
            $sql .= "    profesionales.id_direccion profesional_id_direccion, ";
            $sql .= "    profesionales.foto_perfil profesionales_foto_perfil, ";

            $sql .= "    profesionales.id_especialidad profesional_id_especialidad, ";
            $sql .= "    especialidades.nombre especialidades_nombre, ";

            $sql .= "    profesionales.id_tipo_especialidad profesional_id_tipo_especialidad, ";
            $sql .= "    tipos_especialidad.nombre tipos_especialidad_nombre, ";

            $sql .= "    profesionales.id_sub_tipo_especialidad profesional_id_sub_tipo_especialidad, ";
            $sql .= "    sub_tipo_especialidad.nombre sub_tipo_especialidad_nombre, ";

            $sql .= "    direcciones.id direcciones_id, ";
            $sql .= "    direcciones.direccion direcciones_direccion, ";
            $sql .= "    direcciones.id_ciudad direcciones_id_ciudad, ";

            $sql .= "    ciudades.nombre ciudades_nombre, ";
            $sql .= "    ciudades.id_region ciudades_id_region, ";

            $sql .= "    regiones.nombre  regiones_nombre ";
            $sql .= " FROM profesionales ";

            $sql .= " INNER JOIN direcciones ON (direcciones.id = profesionales.id_direccion ) ";

            $sql .= " INNER JOIN ciudades ON (ciudades.id = direcciones.id_ciudad) ";

            $sql .= " INNER JOIN regiones ON (regiones.id = ciudades.id_region ) ";

            $sql .= " INNER JOIN especialidades ON (profesionales.id_especialidad = especialidades.id) ";

            $sql .= " LEFT JOIN tipos_especialidad ON (profesionales.id_tipo_especialidad = tipos_especialidad.id) ";

            $sql .= " LEFT JOIN sub_tipo_especialidad ON (profesionales.id_sub_tipo_especialidad = sub_tipo_especialidad.id) ";

            $sql .= " WHERE 1=1";

            if(!empty($request->id_especialidad))
                $sql .= " AND profesionales.id_especialidad = ".$request->id_especialidad."";
            if(!empty($request->id_tipo_especialidad))
                $sql .= " AND profesionales.id_tipo_especialidad = ".$request->id_tipo_especialidad."";
            if(!empty($request->id_sub_tipo_especialidad))
                $sql .= " AND profesionales.id_sub_tipo_especialidad = ".$request->id_sub_tipo_especialidad."";
            if(!empty($request->nombre))
                $sql .= " AND profesionales.nombre LIKE '".$request->nombre."%'";
            if(!empty($request->apellido_uno))
                $sql .= " AND profesionales.apellido_uno LIKE '".$request->apellido_uno."%'";
            if(!empty($request->apellido_dos))
                $sql .= " AND profesionales.apellido_dos LIKE '".$request->apellido_dos."%'";
            if(!empty($request->rut))
                $sql .= " AND profesionales.rut = '".$request->rut."'";

            if(!empty($request->nombre_rut))
            {
                $sql .= " AND (profesionales.nombre LIKE '".$request->nombre_rut."%'";
                $sql .= " OR profesionales.apellido_uno LIKE '".$request->nombre_rut."%'";
                $sql .= " OR profesionales.apellido_dos LIKE '".$request->nombre_rut."%'";
                $sql .= " OR profesionales.rut = '".$request->nombre_rut."')";
            }

            if(!empty($request->id_institucion))
                $sql .= " AND profesionales.id in (SELECT id_profesional FROM profesionales_lugares_atencion WHERE id_lugar_atencion = (SELECT id_lugar_atencion FROM instituciones WHERE id = ".$request->id_institucion.") and estado=1 )";

            // 1 -> Atención General
            // 2 -> Atención Dental
            // 3 -> Atención Telemedicina
            // 4 -> Examene
            if(!empty($request->tipo_agenda))
                $sql .= " AND profesionales.id IN (SELECT id_profesional FROM `profesional_horarios` WHERE tipo_agenda in (".$request->tipo_agenda.") GROUP BY id_profesional)";

            // $sql .= " AND profesionales.id IN (
            //                 SELECT profesionales_lugares_atencion.id_profesional
            //                 FROM `profesionales_lugares_atencion`
            //                 WHERE profesionales_lugares_atencion.`estado` = 1
            //                     and profesionales_lugares_atencion.id_lugar_atencion in (
            //                                                                     SELECT
            //                                                                         lugares_atencion.id
            //                                                                     FROM
            //                                                                         `lugares_atencion`
            //                                                                     INNER JOIN direcciones ON direcciones.id = lugares_atencion.id_direccion
            //                                                                     INNER JOIN ciudades ON ciudades.id = direcciones.id_ciudad
            //                                                                     INNER JOIN regiones ON ciudades.id_region = regiones.id
            //                                                                     WHERE  1=1 ";
            //                                                                         if(!empty($request->id_ciudad))
            //                                                                             $sql .= " AND direcciones.id_ciudad = ".$request->id_ciudad."";
            //                                                                         if(!empty($request->id_region))
            //                                                                             $sql .= " AND regiones.id = ".$request->id_region." ";
            //                                                         $sql .= " )
            //                 )
            //         ";
            // return var_dump($sql);
            // return  '**';
            // die();
            $registros = DB::select($sql);
            $registros_validos = array();
            foreach ($registros as $key_r => $value_r)
            {
                // $profesional_horarios = ProfesionalHorario::where('id_profesional',$value_r->profesionales_id)->get();
                // $registros[$key_r]->profesional_horarios = $profesional_horarios;
                $registros[$key_r]->profesional_hora_mas_proxima = $this->cargarFechaMasProxima($value_r->profesionales_id, $request->tipo_agenda);
                // $registros[$key_r]->profesional_hora_mas_proxima = array();

                // var_dump($registros[$key_r]->profesional_hora_mas_proxima);

                // busqueda de imagen
                $array_rut = explode('-',$value_r->profesionales_rut);
                $nombre_imagen = asset('images/iconos/usuario_profesional.svg');
                if(file_exists(public_path('images/img_perfil/'.$array_rut[0].'.png')))
                {
                    $nombre_imagen = asset('images/img_perfil/'.$array_rut[0].'.png');
                }
                $registros[$key_r]->img_profesional = $nombre_imagen;


                if($request->buscar_especialidad_hora24 == '1')
                {
                    if(count($registros[$key_r]->profesional_hora_mas_proxima)>0)
                    {
                        $dia = $registros[$key_r]->profesional_hora_mas_proxima['dia'];
                        $hora = $registros[$key_r]->profesional_hora_mas_proxima['hora'];
                        $dia_hora = date('Y-m-d H:i:s',strtotime($dia.' '.$hora));

                        // var_dump('****'.$value_r->profesionales_id.'****');
                        // var_dump('dia_hora:'.$dia_hora);
                        $dia_hoy = date('Y-m-d H:i:s');
                        // var_dump('dia_hoy:'.$dia_hoy);
                        $dia_hoy_24 = date('Y-m-d H:i:s', strtotime('+24 hours',strtotime($dia_hoy)) );
                        // var_dump('dia_hoy_24:'.$dia_hoy_24);


                        if(strtotime($dia_hora) > strtotime( date('Y-m-d H:i:s', strtotime($dia_hoy_24) )))
                        {
                            unset($registros[$key_r]);
                        }
                        else
                        {
                            $registros_validos[] = $registros[$key_r];
                        }

                    }
                    else
                    {
                        unset($registros[$key_r]);
                    }
                }
                else
                {
                    $registros_validos[] = $registros[$key_r];
                }
            }
        }

        $registros =  $registros_validos;

        if($registros)
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'registros';
            $datos['registros'] = $registros;
            $datos['cant'] = count($registros);
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'sin registros';
        }
        return $datos;
    }

    public function cargarFechaMasProxima($id_profesional, $tipo_agenda)
    {
        $datos = array();

        $lugar_atencion_activo = ProfesionalesLugaresAtencion::where('id_profesional',$id_profesional)->where('estado','1')->pluck('id_lugar_atencion')->toArray();

        // var_dump($tipo_agenda);
        $profesional_horarios = ProfesionalHorario::where('id_profesional',$id_profesional)
                                                    ->whereIn('id_lugar_atencion',$lugar_atencion_activo)
                                                    // ->orderBy('id_lugar_atencion', 'ASC')
                                                    ->orderBy('dia', 'ASC')
                                                    ->orderBy('hora_inicio', 'ASC')
                                                    ->tipoAgenda($tipo_agenda)
                                                    ->get();

        // echo json_encode($profesional_horarios);

        $mes_inicio = date('m');
        $anio_inicio = date('Y');
        $dia_hoy = date('Y-m-d');
        $array_bloques = array();

        $fechas_mas_proxima = array();
        $fechas_mas_proxima_final = array(
            // 'id_lugar_atencion' => '',
            // 'dia' => date('Y-m-d') ,
            // 'hora' => date('H:i:s')
        );

        foreach ($profesional_horarios as $key_prof_hora => $value_prof_hora)
        {
            if(!isset($fechas_mas_proxima[$value_prof_hora->id_lugar_atencion]))
                $fechas_mas_proxima[$value_prof_hora->id_lugar_atencion] = array();

            $finalizar = 0;
            // echo 'paso 0'.$finalizar;
            // if($finalizar == 1) break;
            $hora_inicio_turno  = $value_prof_hora->hora_inicio;
            $hora_termino_turno  = $value_prof_hora->hora_termino;

            /** duracion de consulta en minutos */
            $duracion =  $value_prof_hora->duracion_consulta;
            $array_duracion = explode(':', $duracion);
            $duracion_total = 0;

            if((int)$array_duracion[0]>0)
                $duracion_total += (int)$array_duracion[0]*60;
            if((int)$array_duracion[1]>0)
                $duracion_total += (int)$array_duracion[1];

            $array_dia = explode(',',$value_prof_hora->dia);

            foreach ($array_dia as $key_dia => $value_dia)
            {
                // echo 'paso 1'.$finalizar;
                if($finalizar == 1) break;

                $dia_termino_for = strtotime('+1 days', strtotime($dia_hoy));

                $paso = 0;
                for ($dia=strtotime($dia_hoy); $dia <= $dia_termino_for ; $dia = strtotime('+1 days',$dia)) {
                    $paso++;
                    if($paso>20)break;
                    if(date('w',$dia) == $value_dia)
                    {
                        // echo '*entro';
                        for ($hora=strtotime($hora_inicio_turno); $hora <= strtotime( '+'. $duracion_total.' minute', strtotime($hora_termino_turno) ); $hora = strtotime('+'. $duracion_total.' minute',$hora))
                        {
                            if($finalizar == 1) break;

                            $filtro_tipo_hora = 'C';
                            switch ($tipo_agenda) {
                                // 1 -> Atención General
                                case '1':
                                    $filtro_tipo_hora = 'C';
                                    break;

                                // 2 -> Atención Dental
                                case '2':
                                    $filtro_tipo_hora = 'D';
                                    break;

                                // 3 -> Atención Telemedicina
                                case '3':
                                    $filtro_tipo_hora = 'T';
                                    break;

                                // 4 -> Examene
                                case '4':
                                    $filtro_tipo_hora = 'E';
                                    break;

                                default:
                                    $filtro_tipo_hora = 'C';
                                    break;
                            }

                            // echo '*filtro_tipo_hora hora:'.$filtro_tipo_hora;
                            // echo '*dia hora:'.date('Y-m-d',$dia);
                            // echo '*hora hora:'.date('H:i:s',$hora);
                            $hora_medica = HoraMedica::where('id_profesional', $id_profesional)->where('fecha_consulta',date('Y-m-d',$dia))->where('hora_inicio',date('H:i:s',$hora))->where('tipo_hora_medica', $filtro_tipo_hora)->first();

                            // var_dump(date('Y-m-d', $dia));
                            // var_dump(date('H:i:s',$hora));
                            // echo json_encode($hora_medica);

                            if($hora_medica)
                            {
                                $finalizar = 0;
                                // $dia_termino_for = strtotime('+1 days', $dia_termino_for);
                                $dia_termino_for = $dia_termino_for + 86400;
                            }
                            else
                            {
                                $finalizar = 1;
                                if(count($fechas_mas_proxima[$value_prof_hora->id_lugar_atencion]) > 0)
                                {
                                    $dias_registrado = strtotime($fechas_mas_proxima[$value_prof_hora->id_lugar_atencion][0]['dia']);
                                    $hora_registrado = strtotime($fechas_mas_proxima[$value_prof_hora->id_lugar_atencion][0]['hora']);
                                    if($dias_registrado >= $dia)
                                    {
                                        if($hora_registrado >= $hora)
                                        {
                                            $fechas_mas_proxima[$value_prof_hora->id_lugar_atencion][0] = array('dia' => date('Y-m-d',$dia) , 'hora' => date('H:i:s',$hora) );

                                            if(count($fechas_mas_proxima_final)>0)
                                            {
                                                $dias_registrado_final = strtotime($fechas_mas_proxima_final['dia']);
                                                $hora_registrado_final = strtotime($fechas_mas_proxima_final['hora']);
                                                if($dias_registrado_final >= $dia)
                                                {
                                                    if($hora_registrado_final >= $hora)
                                                    {
                                                        $fechas_mas_proxima_final = array(
                                                            'id_lugar_atencion' => $value_prof_hora->id_lugar_atencion,
                                                            'dia' => date('Y-m-d',$dia) ,
                                                            'hora' => date('H:i:s',$hora)
                                                        );
                                                    }
                                                }
                                            }
                                            else
                                            {
                                                $fechas_mas_proxima_final = array(
                                                    'id_lugar_atencion' => $value_prof_hora->id_lugar_atencion,
                                                    'dia' => date('Y-m-d',$dia) ,
                                                    'hora' => date('H:i:s',$hora)
                                                );
                                            }
                                        }
                                    }
                                }
                                else
                                {
                                    $fechas_mas_proxima[$value_prof_hora->id_lugar_atencion][0] = array('dia' => date('Y-m-d',$dia) , 'hora' => date('H:i:s',$hora) );

                                    if(count($fechas_mas_proxima_final)>0)
                                    {
                                        $dias_registrado_final = strtotime($fechas_mas_proxima_final['dia']);
                                        $hora_registrado_final = strtotime($fechas_mas_proxima_final['hora']);
                                        if($dias_registrado_final >= $dia)
                                        {
                                            if($hora_registrado_final >= $hora)
                                            {
                                                $fechas_mas_proxima_final = array(
                                                    'id_lugar_atencion' => $value_prof_hora->id_lugar_atencion,
                                                    'dia' => date('Y-m-d',$dia) ,
                                                    'hora' => date('H:i:s',$hora)
                                                );
                                            }
                                        }
                                    }
                                    else
                                    {
                                        $fechas_mas_proxima_final = array(
                                            'id_lugar_atencion' => $value_prof_hora->id_lugar_atencion,
                                            'dia' => date('Y-m-d',$dia) ,
                                            'hora' => date('H:i:s',$hora)
                                        );
                                    }
                                }
                                break;
                            }
                        }
                    }
                    else
                    {


                        // $dia_termino_for = strtotime('+1 days', $dia_termino_for);
                        $dia_termino_for = $dia_termino_for + 86400;
                    }

                    // echo '*Paso:';
                    // echo $paso;
                }
            }
        }
        // echo json_encode($fechas_mas_proxima);
        // echo '*******';
        // echo json_encode($fechas_mas_proxima_final);

        return $fechas_mas_proxima_final;

    }

    public function informacionProfesional(Request $request)
    {
        $datos = array();

        $profesional = Profesional::select('id', 'nombre', 'apellido_uno', 'apellido_dos', 'sexo', 'rut', 'email', 'telefono_uno', 'telefono_dos', 'estado', 'certificado',
                                            'numero_certificado', 'dv_certiicado', 'id_direccion', 'id_especialidad', 'id_usuario', 'id_tipo_especialidad', 'id_sub_tipo_especialidad')

                                    ->with(['Especialidad' => function($query){
                                        $query->select('id', 'nombre')->get();
                                    }])

                                    ->with(['TipoEspecialidad' => function($query){
                                        $query->select('id', 'nombre')->get();
                                    }])

                                    ->with(['SubTipoEspecialidad' => function($query){
                                        $query->select('id', 'nombre')->get();
                                    }])

                                    ->with(['Direccion' => function($query){
                                        $query->select('id', 'direccion', 'numero_dir', 'id_ciudad')
                                            ->with(['Ciudad' => function($query){
                                                $query->select('id', 'nombre')->get();
                                            }])
                                            ->get();
                                    }])

                                    ->with(['AntecedenteAcademico' => function($query){
                                        $query->select('id', 'id_profesional', 'id_tipo_antecedente_academico', 'nombre', 'universidad', 'anio', 'ciudad_pais', 'numero_inscripcion', 'supersalud', 'numero_colegio')
                                                    ->with(['TipoAntecedenteAcademico' => function($query){
                                                        $query->select('id', 'nombre')->get();
                                                    }])
                                            ->get();
                                    }])

                                    ->where('id', $request->id_profesional)
                                    ->first();




        if($profesional)
        {

            $lugares_atencion = $profesional->LugaresAtencion()
                                            ->select('lugares_atencion.id', 'lugares_atencion.nombre', 'lugares_atencion.rut', 'lugares_atencion.email', 'lugares_atencion.telefono', 'lugares_atencion.id_direccion')
                                            ->with(['Direccion' => function($query){
                                                $query->select('id', 'direccion', 'numero_dir', 'id_ciudad')
                                                    ->with(['Ciudad' => function($query){
                                                        $query->select('id', 'nombre')->get();
                                                    }])
                                                    ->get();
                                            }])
											->where('estado', 1)
                                            ->get();

            foreach ($lugares_atencion as $key => $lg)
            {
                $profesional_convenios = ProfesionalConvenio::where('id_profesional', $request->id_profesional)->where('id_lugar_atencion', $lg->id)->first();
                if($profesional_convenios)
                {
                    $lugares_atencion[$key]->convenio = $profesional_convenios;
                }
                else
                {
                    $lugares_atencion[$key]->convenio = '';
                }
            }
            $array_rut = explode('-',$profesional->rut);
            $nombre_imagen = asset('images/iconos/usuario_profesional.svg');

            if(file_exists(public_path('images/img_perfil/'.$array_rut[0].'.png')))
            {
                $nombre_imagen = asset('images/img_perfil/'.$array_rut[0].'.png');
            }
            $profesional->img_profesional = $nombre_imagen;

            $datos['estado'] = 1;
            $datos['msj'] = 'Registros';
            $datos['profesional'] = $profesional;
            $datos['lugares_atencion'] = $lugares_atencion;
            $datos['array_rut'] = $array_rut[0];



        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Informacion Profesional no encotnrada';
        }

        return $datos;

    }


    // listar lugares de atenciones
    /**
     * busqueda de lugares de  atencion por profesional
     * @param Request $requst
     *
     * @return array()
     */
    public function lugaresAtencionProfesionalBuscador(Request $request){

        $datos = array();

        $profesional = Profesional::where('id', $request->id_profesional)->first();
        $lugares_atencion = $profesional->LugaresAtencion()->where('estado',1)->get();

        if($lugares_atencion)
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'registros';
            $datos['registros'] = $lugares_atencion;

        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'sin registros';
        }

        return $datos;
    }

    // carga de dias laborales profesional por profesional y lugar atenciones (dias laborables)
    /**
     * busqueda de dias laborables del profesional en un lugar de atencion
     * @param Request $requst
     *
     * @return array()
     */
    public function diasLaboralesProfesionaLugarAtencionBuscador(Request $request){

        $datos = array();
        $horario = ProfesionalHorario::where('id_profesional', $request->id_profesional)
                                        ->where('id_lugar_atencion', $request->lugar_atencion)
                                        ->tipoAgenda($request->tipo_agenda)
                                        ->orderBy('dia', 'ASC')
                                        ->get();

        $dias_no_laborales = ['1','2','3','4','5','6','7'];
        $dias_laborales = [];

        foreach ($horario as $hor) {
            $ho = explode(',', $hor->dia);
            foreach ($ho as $h) {
                $h = trim($h);
                // Agregar a días laborales si no está ya
                if (!in_array($h, $dias_laborales)) {
                    $dias_laborales[] = $h;
                }

                // Quitar de los días no laborales si está presente
                if (($key = array_search($h, $dias_no_laborales)) !== false) {
                    unset($dias_no_laborales[$key]);
                }
            }
        }

        // Ordenar los arrays si quieres mantener un orden consistente
        sort($dias_laborales);
        sort($dias_no_laborales);

        $horario_agenda_laboral = implode(',', $dias_laborales);
        $horario_agenda_no_laboral = implode(',', $dias_no_laborales);

        $datos['estado'] = 1;
        $datos['msj'] = 'registros';
        $datos['registros'] = array(
            'horario_agenda_laboral' => $horario_agenda_laboral,
            'horario_agenda_no_laboral' => $horario_agenda_no_laboral
        );

        return $datos;
    }


    // carga de horas disponibles para profesional por profesional lugar atencion y dia (horas disponibles)
    /**
     * busqueda de horas disponibles del profesional en una fecha especifica en un lugar de atencion
     * @param Request $requst
     *
     * @return array()
     */
    public function horasDisponiblesProfesionalLugarAtencionBuscador(Request $request){
        // id_profesional
        // id_lugar_atencion
        // dia
        $texto_dia = ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'];
        $texto_mes = ['', 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

        $datos = array();

        $dia_semana = date('N',strtotime($request->dia));

        $profesional_horarios = ProfesionalHorario::where('id_profesional',$request->id_profesional)
                                                ->where('id_lugar_atencion',$request->id_lugar_atencion)
                                                ->where('dia','like','%'.$dia_semana.'%')
                                                ->tipoAgenda($request->tipo_agenda)
                                                ->orderBy('dia', 'ASC')
                                                ->first();
        if($profesional_horarios)
        {
            $array_bloques = array();

            $hora_inicio_turno  = $request->dia.' '.$profesional_horarios->hora_inicio;
            $hora_termino_turno  = $request->dia.' '.$profesional_horarios->hora_termino;

            /** duracion de consulta en minutos */
            $duracion =  $profesional_horarios->duracion_consulta;
            $array_duracion = explode(':', $duracion);
            $duracion_total = 0;

            if((int)$array_duracion[0]>0)
                $duracion_total += (int)$array_duracion[0]*60;
            if((int)$array_duracion[1]>0)
                $duracion_total += (int)$array_duracion[1];

            for ($hora=strtotime($hora_inicio_turno); $hora <= strtotime( '+'. $duracion_total.' minute', strtotime($hora_termino_turno) ); $hora = strtotime('+'. $duracion_total.' minute',$hora) )
            {
                // $hora_medica = HoraMedica::where('fecha_consulta', date('Y-m-d',$hora))->where('hora_inicio',date('H:i:s',$hora))->first();
                $hora_medica = HoraMedica::where('fecha_consulta', date('Y-m-d',$hora))
                                            ->where('id_profesional', $request->id_profesional)
                                            ->where('id_lugar_atencion', $request->id_lugar_atencion)
                                            ->whereRaw("'".date('H:i:s',strtotime( '+1 second', $hora))."' BETWEEN hora_inicio and hora_termino")
                                            ->first();

                $datos['hora'][strtotime( '+1 second', $hora)] = date('H:i:s',strtotime( '+1 second', $hora));
                $datos['hora_medica'][strtotime( '+1 second', $hora)] = $hora_medica;

                if($hora_medica)
                {
                    // con reserva
                }
                else
                {
                    // sin reserva
                    $array_bloques[] = array(
                                            'dia' => date('Y-m-d',$hora),
                                            'hora' => date('H:i:s',$hora),
                                            'fecha_hora' => date('Y-m-d H:i:s',$hora)
                                        );
                }
            }

            $datos['estado'] = 1;
            $datos['msj'] = 'registros';
            $datos['registros'] = $array_bloques;
            $datos['text_fecha'] = $texto_dia[(int)$dia_semana].' '. date('d',strtotime($request->dia)).' '.$texto_mes[(int)date('m',strtotime($request->dia))];

        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'sin registros';
            $datos['profesional_horario'] = $profesional_horarios;
        }

        return $datos;
    }

    // carga de horas para profesional por profesional lugar atencion y dia (horas)
    /**
     * busqueda de horas del profesional en una fecha especifica en un lugar de atencion
     * @param Request $requst
     *
     * @return array()
     */
    public function horasProfesionalLugarAtencionBuscador(Request $request){
        // id_profesional
        // id_lugar_atencion
        // dia
        $texto_dia = ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'];
        $texto_mes = ['', 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

        $datos = array();

        $dia_semana = date('N',strtotime($request->dia));

        $profesional_horarios = ProfesionalHorario::where('id_profesional',$request->id_profesional)
                                                ->where('id_lugar_atencion',$request->id_lugar_atencion)
                                                ->where('dia','like','%'.$dia_semana.'%')
                                                ->orderBy('dia', 'ASC')
                                                ->first();
        if($profesional_horarios)
        {
            $array_bloques = array();

            $hora_inicio_turno  = $request->dia.' '.$profesional_horarios->hora_inicio;
            $hora_termino_turno  = $request->dia.' '.$profesional_horarios->hora_termino;

            /** duracion de consulta en minutos */
            $duracion =  $profesional_horarios->duracion_consulta;
            $array_duracion = explode(':', $duracion);
            $duracion_total = 0;

            if((int)$array_duracion[0]>0)
                $duracion_total += (int)$array_duracion[0]*60;
            if((int)$array_duracion[1]>0)
                $duracion_total += (int)$array_duracion[1];

            for ($hora=strtotime($hora_inicio_turno); $hora <= strtotime( '+'. $duracion_total.' minute', strtotime($hora_termino_turno) ); $hora = strtotime('+'. $duracion_total.' minute',$hora))
            {
                $hora_medica = HoraMedica::where('fecha_consulta', date('Y-m-d',$hora))->where('hora_inicio',date('H:i:s',$hora))->first();
                if($hora_medica)
                {
                    $cantidad_hora_medica = HoraMedica::where('fecha_consulta', date('Y-m-d',$hora))->where('hora_inicio',date('H:i:s',$hora))->count();
                    $reserva = 0;
                    if($cantidad_hora_medica > 1)
                    {
                        $reserva = 1;
                    }

                    // con reserva
                    $array_bloques[] = array(
                                            'dia' => date('Y-m-d',$hora),
                                            'hora' => date('H:i:s',$hora),
                                            'fecha_hora' => date('Y-m-d H:i:s',$hora),
                                            'reserva' => $reserva
                                        );
                }
                else
                {
                    // sin reserva
                    $array_bloques[] = array(
                                            'dia' => date('Y-m-d',$hora),
                                            'hora' => date('H:i:s',$hora),
                                            'fecha_hora' => date('Y-m-d H:i:s',$hora),
                                            'reserva' => '0'
                                        );
                }
            }

            $datos['estado'] = 1;
            $datos['msj'] = 'registros';
            $datos['registros'] = $array_bloques;
            $datos['text_fecha'] = $texto_dia[(int)$dia_semana].' '. date('d',strtotime($request->dia)).' '.$texto_mes[(int)date('m',strtotime($request->dia))];

        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'sin registros';
            $datos['profesional_horario'] = $profesional_horarios;
        }

        return $datos;
    }

    public function getPersona(Request $request)
    {
        $datos = array();
        $registro = Personas::select('rut', 'nombre1', 'appaterno', 'apmaterno')->where('rut', $request->rut)->first();
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
        }
        return $datos;
    }

    public function invitacionProfesionalConfirmacionRechazo(Request $request)
    {
        // var_dump($request->all);
        $mensaje ='';
        $valido = 1;
        if(empty($request->inv)){
            $valido = 0;
            $mensaje .= 'Problema al manejar invitacion';
        }
        if(empty($request->tpi))
        {
            $valido = 0;
            $mensaje .= 'Problema al manejar el tipo de proceso de la invitacion';
        }

        if($valido == 1)
        {
            $id_invitacion = $request->inv;
            $tipo_proceso = $request->tpi;

            $invitacion = Invitacion::where('id',$id_invitacion)->first();

            if($invitacion->procesado == 0)
            {
                switch ($tipo_proceso) {
                    case '1':// acepto
                        if($invitacion->id_user_invitado)
                        {
                            $profesional = Profesional::where('id_usuario',$invitacion->id_user_invitado)->first();
                            if($profesional)
                            {
                                $buscar_prof_lugar = ProfesionalesLugaresAtencion::where('id_profesional',$profesional->id)->where('id_lugar_atencion',$invitacion->id_lugar_atencion)->first();
                                if($buscar_prof_lugar)
                                {
                                    $invitacion->procesado = 1;
                                    $invitacion->fecha_procesado = date('Y-m-d H:i:s');
                                    $invitacion->fecha_aprobacion = date('Y-m-d H:i:s');
                                    $invitacion->estado = 1;
                                    if($invitacion->save())
                                    {
                                        $mensaje .= 'Profesional '.$profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos.', ya se encuentra como integrante de la Intitucion '.$invitacion->LugarAtencion()->first()->nombre.'. <br/>';
                                    }
                                    else
                                    {
                                        $mensaje .= 'Profesional '.$profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos.', ya se encuentra como integrante de la Intitucion '.$invitacion->LugarAtencion()->first()->nombre.'. <br/>';
                                        $mensaje .= '<br/>';
                                        $mensaje .= 'Invitacion no actualizada. <br/>';
                                    }

                                }
                                else
                                {
                                    /** profesional existente */
                                    $reg_prof_lugar = new ProfesionalesLugaresAtencion();
                                    $reg_prof_lugar->id_profesional = $profesional->id;
                                    $reg_prof_lugar->id_lugar_atencion = $invitacion->id_lugar_atencion;
                                    $reg_prof_lugar->estado = 1;
                                    if($reg_prof_lugar->save())
                                    {
                                        $invitacion->procesado = 1;
                                        $invitacion->fecha_procesado = date('Y-m-d H:i:s');
                                        $invitacion->fecha_aprobacion = date('Y-m-d H:i:s');
                                        $invitacion->estado = 1;
                                        if($invitacion->save())
                                        {
                                            $mensaje .= 'Profesional '.$profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos.', ha sido confirmado como integrante de la Intitucion '.$invitacion->LugarAtencion()->first()->nombre.'. <br/>';
                                        }
                                        else
                                        {
                                            $mensaje .= 'Profesional '.$profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos.', ha sido confirmado como integrante de la Intitucion '.$invitacion->LugarAtencion()->first()->nombre.'. <br/>';
                                            $mensaje .= 'Invitacion no actualizada. <br/>';
                                        }
                                    }
                                    else
                                    {
                                        $mensaje .= 'Profesional '.$profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos.', se ha presentado un problema al confirmar como integrante de la Intitucion '.$invitacion->LugarAtencion()->first()->nombre.'. <br/>';
                                    }
                                }
                            }
                            else
                            {

                                $user = User::find($invitacion->id_user_invitado);
                                $temp_pass = rand(1111,9999);
                                $user->password = Hash::make($temp_pass);
                                if ($user->save())
                                {
                                    $mensaje .='Problema con Activar su invitación, intente nuevamente.<br/>';
                                    /** envio de correo de confirmacion  */
                                    $blade = 'profesional_usuario_creado';
                                    $to = array(
                                            array('email' => $invitacion->email,'name' => $invitacion->nombre.' '.$invitacion->apellido_uno.' '.$invitacion->apellido_dos),
                                        );
                                    $cc = array();
                                    $bcc = array();
                                    $asunto = 'MED-SDI - Bienvenido!';
                                    $body = array(
                                        'nombre'=>$invitacion->nombre.' '.$invitacion->apellido_uno.' '.$invitacion->apellido_dos,
                                        'user' => $invitacion->email,
                                        'pass' => $temp_pass,
                                    );
                                    $archivo = '';/** pendiente */
                                    $id_institucion = '';

                                    $result_mail =  SendMailController::envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, $id_institucion);

                                    if($result_mail['estado'])
                                    {
                                        $mensaje .= 'Usuario creado con exito.<br/>';
                                        $mensaje .= 'Recibirá un correo de Bienvenida con la información de acceso al sistema. <br/>';
                                    }
                                    else
                                    {
                                        $mensaje .= 'Usuario creado con exito.<br/>';
                                        $mensaje .= 'Correo de Bienvenida con la información de acceso al sistema con problema para envío. <br/>';
                                    }
                                }

                            }
                        }
                        else
                        {
                            /** profesional nuevo  */
                            $user = User::where('email', $invitacion->email)->first();
                            if($user == NULL)
                            {
                                $user = new User();
                                $user->name = $invitacion->nombre.' '.$invitacion->apellido_uno.' '.$invitacion->apellido_dos;
                                $user->email = $invitacion->email;
                                $temp_pass = rand(1111,9999);
                                $user->password = Hash::make($temp_pass);
                                if ($user->save()) {
                                    $user->assignRole('Profesional');
                                    $invitacion->procesado = 1;
                                    $invitacion->fecha_procesado = date('Y-m-d H:i:s');
                                    $invitacion->fecha_aprobacion = date('Y-m-d H:i:s');
                                    $invitacion->id_user_invitado = $user->id;
                                    $invitacion->estado = 0;
                                    if($invitacion->save())
                                    {
                                        $mensaje .= 'Profesional '.$invitacion->nombre.' '.$invitacion->apellido_uno.' '.$invitacion->apellido_dos.', ha sido confirmado como integrante de la Intitucion '.$invitacion->LugarAtencion()->first()->nombre.'. <br/>';


                                        /** envio de correo de confirmacion  */
                                        $blade = 'profesional_usuario_creado';
                                        $to = array(
                                                array('email' => $invitacion->email,'name' => $invitacion->nombre.' '.$invitacion->apellido_uno.' '.$invitacion->apellido_dos),
                                            );
                                        $cc = array();
                                        $bcc = array();
                                        $asunto = 'MED-SDI - Bienvenido!';
                                        $body = array(
                                            'nombre'=>$invitacion->nombre.' '.$invitacion->apellido_uno.' '.$invitacion->apellido_dos,
                                            'user' => $invitacion->email,
                                            'pass' => $temp_pass,
                                        );
                                        $archivo = '';/** pendiente */
                                        $id_institucion = '';

                                        $result_mail =  SendMailController::envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, $id_institucion);

                                        if($result_mail['estado'])
                                        {
                                            $mensaje .= 'Usuario creado con exito.<br/>';
                                            $mensaje .= 'Recibirá un correo de Bienvenida con la información de acceso al sistema. <br/>';
                                        }
                                        else
                                        {
                                            $mensaje .= 'Usuario creado con exito.<br/>';
                                            $mensaje .= 'Correo de Bienvenida con la información de acceso al sistema con problema para envío. <br/>';
                                        }

                                        $mensaje .= 'Deberá completar su perfil en el escritorio asignado. <br/>';
                                    }
                                    else
                                    {
                                        $mensaje .= 'Profesional '.$invitacion->nombre.' '.$invitacion->apellido_uno.' '.$invitacion->apellido_dos.', ha sido confirmado como integrante de la Intitucion '.$invitacion->LugarAtencion()->first()->nombre.'. <br/>';
                                        $mensaje .= 'Usuario creado con exito.<br/>';
                                        $mensaje .= 'Recibirá un correo con la información de acceso al sistema. <br/>';
                                        $mensaje .= 'Deberá completar su perfil en el escritorio asignado. <br/>';
                                        $mensaje .= 'Invitacion no actualizada. <br/>';
                                    }
                                }
                                else
                                {
                                    $mensaje .= 'Se presento un problema al generar su Usuario, intente nuevamente. <br/>';
                                }
                            }
                            else
                            {
                                $mensaje .= 'El correo "'.$invitacion->email.'" ya esta siendo utilizado o su usuario ya ha sido creado. <br/>';
                            }

                        }

                        break;
                    case '2': // rechazo
                            $invitacion->procesado = 1;
                            $invitacion->fecha_procesado = date('Y-m-d H:i:s');
                            $invitacion->fecha_rechazo = date('Y-m-d H:i:s');
                            $invitacion->estado = 2;
                            if($invitacion->save())
                            {
                                $mensaje .= 'Profesional '.$invitacion->nombre.' '.$invitacion->apellido_uno.' '.$invitacion->apellido_dos.', ha RECHAZADO la invitacion para ser integrante de la Intitucion '.$invitacion->LugarAtencion()->first()->nombre.'. <br/>';
                            }
                            else
                            {
                                $mensaje .= 'Profesional '.$invitacion->nombre.' '.$invitacion->apellido_uno.' '.$invitacion->apellido_dos.', ha RECHAZADO la invitacion para ser integrante de la Intitucion '.$invitacion->LugarAtencion()->first()->nombre.'. <br/>';
                                $mensaje .= 'Invitacion no actualizada. <br/>';
                            }
                            /** CORREO NOTIFICACION AL CENTRO MEDICO DE RECHAZO DE INVITACION */
                            /** CORREO AL PROFESIONAL INDICANDO RECHAZO A LA INVITACION */

                        break;

                    default:
                            $mensaje .= 'Proceso solicitado no aceptado. <br/>';
                        break;
                }
            }
            else
            {
                $mensaje .= 'Invitacion Ya se encuentra procesada. <br/>';
            }
        }
        return view('app.general.validaciones.invitacion')->with([
                'mensaje' => $mensaje,
            ]);

    }

    public function invitacionConvenioProfesionalConfirmacionRechazo(Request $request)
    {
        // var_dump($request->all);
        $mensaje ='';
        $valido = 1;
        if(empty($request->inv)){
            $valido = 0;
            $mensaje .= 'Problema al manejar invitacion';
        }
        if(empty($request->tpi))
        {
            $valido = 0;
            $mensaje .= 'Problema al manejar el tipo de proceso de la invitacion';
        }

        if($valido == 1)
        {
            $token = $request->inv;
            $tipo_proceso = $request->tpi;

            $invitacion = Invitacion::where('token',$token)->first();

            if($invitacion->procesado == 0)
            {
                switch ($tipo_proceso) {
                    case '1':// acepto
                        if($invitacion->id_user_invitado)
                        {
                            $profesional = Profesional::where('id_usuario',$invitacion->id_user_invitado)->first();
                            if($profesional)
                            {
                                $buscar_prof_lugar = ProfesionalesLugaresAtencion::where('id_profesional',$profesional->id)->where('id_lugar_atencion',$invitacion->id_lugar_atencion)->first();
                                if($buscar_prof_lugar)
                                {
                                    $invitacion->procesado = 1;
                                    $invitacion->fecha_procesado = date('Y-m-d H:i:s');
                                    $invitacion->fecha_aprobacion = date('Y-m-d H:i:s');
                                    $invitacion->estado = 1;
                                    if($invitacion->save())
                                    {
                                        $mensaje .= 'Profesional '.$profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos.', ya se encuentra como integrante de la Intitucion '.$invitacion->LugarAtencion()->first()->nombre.'. <br/>';

                                        /** CONFIRMAR CONVENIO */
                                        $filtro_cov = array();
                                        $filtro_cov[] = array('id_invitacion', $invitacion->id);
                                        $filtro_cov[] = array('id_profesional', $profesional->id);
                                        $result_prof_inst_conv = ProfesionalInstitucionConvenio::where($filtro_cov)->first();
                                        if($result_prof_inst_conv)
                                        {
                                            $result_prof_inst_conv_temp = ProfesionalInstitucionConvenio::find($result_prof_inst_conv->id);
                                            if($result_prof_inst_conv_temp)
                                            {
                                                $result_prof_inst_conv_temp->fecha_confirmacion = date('Y-m-d H:i:s');
                                                $result_prof_inst_conv_temp->estado = 2;

                                                if($result_prof_inst_conv_temp->save())
                                                {
                                                    $mensaje .= 'Convenio Aprobado con exito.<br/>';
                                                }
                                                else
                                                {
                                                    $mensaje .= 'Problema con la Confirmacion del Convenio.<br/>';
                                                }
                                            }
                                            else
                                            {
                                                $mensaje .= 'Convenio No Encontrado.<br/>';
                                            }
                                        }
                                        else
                                        {
                                            $mensaje .= 'Convenio No Encontrado.<br/>';
                                        }
                                    }
                                    else
                                    {
                                        $mensaje .= 'Profesional '.$profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos.', ya se encuentra como integrante de la Intitucion '.$invitacion->LugarAtencion()->first()->nombre.'. <br/>';
                                        $mensaje .= '<br/>';
                                        $mensaje .= 'Invitacion no actualizada. <br/>';
                                    }

                                }
                                else
                                {
                                    /** profesional existente */
                                    $reg_prof_lugar = new ProfesionalesLugaresAtencion();
                                    $reg_prof_lugar->id_profesional = $profesional->id;
                                    $reg_prof_lugar->id_lugar_atencion = $invitacion->id_lugar_atencion;
                                    $reg_prof_lugar->estado = 1;
                                    if($reg_prof_lugar->save())
                                    {
                                        $invitacion->procesado = 1;
                                        $invitacion->fecha_procesado = date('Y-m-d H:i:s');
                                        $invitacion->fecha_aprobacion = date('Y-m-d H:i:s');
                                        $invitacion->estado = 1;
                                        if($invitacion->save())
                                        {
                                            $mensaje .= 'Profesional '.$profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos.', ha sido confirmado como integrante de la Intitucion '.$invitacion->LugarAtencion()->first()->nombre.'. <br/>';

                                            /** CONFIRMAR CONVENIO */
                                            $filtro_cov = array();
                                            $filtro_cov[] = array('id_invitacion', $invitacion->id);
                                            $filtro_cov[] = array('id_profesional', $profesional->id);
                                            $result_prof_inst_conv = ProfesionalInstitucionConvenio::where($filtro_cov)->first();
                                            if($result_prof_inst_conv)
                                            {
                                                $result_prof_inst_conv_temp = ProfesionalInstitucionConvenio::find($result_prof_inst_conv->id);
                                                if($result_prof_inst_conv_temp)
                                                {
                                                    $result_prof_inst_conv_temp->fecha_confirmacion = date('Y-m-d H:i:s');
                                                    $result_prof_inst_conv_temp->estado = 2;

                                                    if($result_prof_inst_conv_temp->save())
                                                    {
                                                        $mensaje .= 'Convenio Aprobado con exito.<br/>';
                                                    }
                                                    else
                                                    {
                                                        $mensaje .= 'Problema con la Confirmacion del Convenio.<br/>';
                                                    }
                                                }
                                                else
                                                {
                                                    $mensaje .= 'Convenio No Encontrado.<br/>';
                                                }
                                            }
                                            else
                                            {
                                                $mensaje .= 'Convenio No Encontrado.<br/>';
                                            }
                                        }
                                        else
                                        {
                                            $mensaje .= 'Profesional '.$profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos.', ha sido confirmado como integrante de la Intitucion '.$invitacion->LugarAtencion()->first()->nombre.'. <br/>';
                                            $mensaje .= 'Invitacion no actualizada. <br/>';
                                        }
                                    }
                                    else
                                    {
                                        $mensaje .= 'Profesional '.$profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos.', se ha presentado un problema al confirmar como integrante de la Intitucion '.$invitacion->LugarAtencion()->first()->nombre.'. <br/>';
                                    }
                                }
                            }
                            else
                            {

                                $user = User::find($invitacion->id_user_invitado);
                                $temp_pass = rand(1111,9999);
                                $user->password = Hash::make($temp_pass);
                                if ($user->save())
                                {
                                    $mensaje .= 'Usuario creado con exito.<br/>';
                                    /** envio de correo de confirmacion  */
                                    $blade = 'profesional_usuario_creado';
                                    $to = array(
                                            array('email' => $invitacion->email,'name' => $invitacion->nombre.' '.$invitacion->apellido_uno.' '.$invitacion->apellido_dos),
                                        );
                                    $cc = array();
                                    $bcc = array();
                                    $asunto = 'MED-SDI - Bienvenido!';
                                    $body = array(
                                        'nombre'=> $invitacion->nombre.' '.$invitacion->apellido_uno.' '.$invitacion->apellido_dos,
                                        'user' => $invitacion->email,
                                        'pass' => $temp_pass,
                                    );
                                    $archivo = '';/** pendiente */
                                    $id_institucion = '';

                                    $result_mail =  SendMailController::envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, $id_institucion);

                                    if($result_mail['estado'])
                                    {
                                        $mensaje .= 'Recibirá un correo de Bienvenida con la información de acceso al sistema. <br/>';
                                    }
                                    else
                                    {
                                        $mensaje .= 'Correo de Bienvenida con la información de acceso al sistema con problema para envío. <br/>';
                                    }

                                    /** CONFIRMAR CONVENIO */
                                    $filtro_cov = array();
                                    $filtro_cov[] = array('id_invitacion', $invitacion->id);
                                    $result_prof_inst_conv = ProfesionalInstitucionConvenio::where($filtro_cov)->first();
                                    if($result_prof_inst_conv)
                                    {
                                        $result_prof_inst_conv_temp = ProfesionalInstitucionConvenio::find($result_prof_inst_conv->id);
                                        if($result_prof_inst_conv_temp)
                                        {
                                            $result_prof_inst_conv_temp->fecha_confirmacion = date('Y-m-d H:i:s');
                                            $result_prof_inst_conv_temp->estado = 2;

                                            if($result_prof_inst_conv_temp->save())
                                            {
                                                $mensaje .= 'Convenio Aprobado con exito.<br/>';
                                            }
                                            else
                                            {
                                                $mensaje .= 'Problema con la Confirmacion del Convenio.<br/>';
                                            }
                                        }
                                        else
                                        {
                                            $mensaje .= 'Convenio No Encontrado.<br/>';
                                        }
                                    }
                                    else
                                    {
                                        $mensaje .= 'Convenio No Encontrado.<br/>';
                                    }
                                }
                                else
                                {
                                    $mensaje .= 'Problema al crear Usuario.<br/>';
                                    $mensaje .= 'Problema con Activar su invitación, intente nuevamente.<br/>';
                                }

                            }
                        }
                        else
                        {
                            /** profesional nuevo  */
                            $user = User::where('email', $invitacion->email)->first();
                            if($user == NULL)
                            {
                                $user = new User();
                                $user->name = $invitacion->nombre.' '.$invitacion->apellido_uno.' '.$invitacion->apellido_dos;
                                $user->email = $invitacion->email;
                                $temp_pass = rand(1111,9999);
                                $user->password = Hash::make($temp_pass);
                                if ($user->save()) {
                                    $user->assignRole('Profesional');
                                    $invitacion->procesado = 1;
                                    $invitacion->fecha_procesado = date('Y-m-d H:i:s');
                                    $invitacion->fecha_aprobacion = date('Y-m-d H:i:s');
                                    $invitacion->id_user_invitado = $user->id;
                                    $invitacion->estado = 0;
                                    if($invitacion->save())
                                    {
                                        $mensaje .= 'Profesional '.$invitacion->nombre.' '.$invitacion->apellido_uno.' '.$invitacion->apellido_dos.', ha sido confirmado como integrante de la Intitucion '.$invitacion->LugarAtencion()->first()->nombre.'. <br/>';

                                        /** envio de correo de confirmacion  */
                                        $blade = 'profesional_usuario_creado';
                                        $to = array(
                                                array('email' => $invitacion->email,'name' => $invitacion->nombre.' '.$invitacion->apellido_uno.' '.$invitacion->apellido_dos),
                                            );
                                        $cc = array();
                                        $bcc = array();
                                        $asunto = 'MED-SDI - Bienvenido!';
                                        $body = array(
                                            'nombre'=>$invitacion->nombre.' '.$invitacion->apellido_uno.' '.$invitacion->apellido_dos,
                                            'user' => $invitacion->email,
                                            'pass' => $temp_pass,
                                        );
                                        $archivo = '';/** pendiente */
                                        $id_institucion = '';

                                        $result_mail =  SendMailController::envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, $id_institucion);

                                        if($result_mail['estado'])
                                        {
                                            $mensaje .= 'Usuario creado con exito.<br/>';
                                            $mensaje .= 'Recibirá un correo de Bienvenida con la información de acceso al sistema. <br/>';
                                        }
                                        else
                                        {
                                            $mensaje .= 'Usuario creado con exito.<br/>';
                                            $mensaje .= 'Correo de Bienvenida con la información de acceso al sistema con problema para envío. <br/>';
                                        }

                                        $mensaje .= 'Deberá completar su perfil en el escritorio asignado. <br/>';

                                        /** CONFIRMAR CONVENIO */
                                        $filtro_cov = array();
                                        $filtro_cov[] = array('id_invitacion', $invitacion->id);
                                        $result_prof_inst_conv = ProfesionalInstitucionConvenio::where($filtro_cov)->first();
                                        if($result_prof_inst_conv)
                                        {
                                            $result_prof_inst_conv_temp = ProfesionalInstitucionConvenio::find($result_prof_inst_conv->id);
                                            if($result_prof_inst_conv_temp)
                                            {
                                                $result_prof_inst_conv_temp->fecha_confirmacion = date('Y-m-d H:i:s');
                                                $result_prof_inst_conv_temp->estado = 2;

                                                if($result_prof_inst_conv_temp->save())
                                                {
                                                    $mensaje .= 'Convenio Aprobado con exito.<br/>';
                                                }
                                                else
                                                {
                                                    $mensaje .= 'Problema con la Confirmacion del Convenio.<br/>';
                                                }
                                            }
                                            else
                                            {
                                                $mensaje .= 'Convenio No Encontrado.<br/>';
                                            }
                                        }
                                        else
                                        {
                                            $mensaje .= 'Convenio No Encontrado.<br/>';
                                        }
                                    }
                                    else
                                    {
                                        $mensaje .= 'Profesional '.$invitacion->nombre.' '.$invitacion->apellido_uno.' '.$invitacion->apellido_dos.', ha sido confirmado como integrante de la Intitucion '.$invitacion->LugarAtencion()->first()->nombre.'. <br/>';
                                        $mensaje .= 'Usuario creado con exito.<br/>';
                                        $mensaje .= 'Recibirá un correo con la información de acceso al sistema. <br/>';
                                        $mensaje .= 'Deberá completar su perfil en el escritorio asignado. <br/>';
                                        $mensaje .= 'Invitacion no actualizada. <br/>';
                                    }
                                }
                                else
                                {
                                    $mensaje .= 'Se presento un problema al generar su Usuario, intente nuevamente. <br/>';
                                }
                            }
                            else
                            {
                                $mensaje .= 'El correo "'.$invitacion->email.'" ya esta siendo utilizado o su usuario ya ha sido creado. <br/>';
                            }

                        }

                        break;
                    case '2': // rechazo
                            $invitacion->procesado = 1;
                            $invitacion->fecha_procesado = date('Y-m-d H:i:s');
                            $invitacion->fecha_rechazo = date('Y-m-d H:i:s');
                            $invitacion->estado = 2;
                            if($invitacion->save())
                            {
                                $mensaje .= 'Profesional '.$invitacion->nombre.' '.$invitacion->apellido_uno.' '.$invitacion->apellido_dos.', ha RECHAZADO la invitacion para ser integrante de la Intitucion '.$invitacion->LugarAtencion()->first()->nombre.'. <br/>';

                                /** CONFIRMAR CONVENIO */
                                $filtro_cov = array();
                                $filtro_cov[] = array('id_invitacion', $invitacion->id);
                                $result_prof_inst_conv = ProfesionalInstitucionConvenio::where($filtro_cov)->first();
                                if($result_prof_inst_conv)
                                {
                                    $result_prof_inst_conv_temp = ProfesionalInstitucionConvenio::find($result_prof_inst_conv->id);
                                    if($result_prof_inst_conv_temp)
                                    {
                                        $result_prof_inst_conv_temp->fecha_rechazo = date('Y-m-d H:i:s');
                                        $result_prof_inst_conv_temp->estado = 3;

                                        if($result_prof_inst_conv_temp->save())
                                        {
                                            $mensaje .= 'Convenio Rechazado con exito.<br/>';
                                        }
                                        else
                                        {
                                            $mensaje .= 'Problema con la Confirmacion del Convenio.<br/>';
                                        }
                                    }
                                    else
                                    {
                                        $mensaje .= 'Convenio No Encontrado.<br/>';
                                    }
                                }
                                else
                                {
                                    $mensaje .= 'Convenio No Encontrado.<br/>';
                                }
                            }
                            else
                            {
                                $mensaje .= 'Profesional '.$invitacion->nombre.' '.$invitacion->apellido_uno.' '.$invitacion->apellido_dos.', ha RECHAZADO la invitacion para ser integrante de la Intitucion '.$invitacion->LugarAtencion()->first()->nombre.'. <br/>';
                                $mensaje .= 'Invitacion no actualizada. <br/>';
                            }
                            /** CORREO NOTIFICACION AL CENTRO MEDICO DE RECHAZO DE INVITACION */
                            /** CORREO AL PROFESIONAL INDICANDO RECHAZO A LA INVITACION */

                        break;

                    default:
                            $mensaje .= 'Proceso solicitado no aceptado. <br/>';
                        break;
                }
            }
            else
            {
                $mensaje .= 'Invitacion Ya se encuentra procesada. <br/>';
            }
        }
        return view('app.general.validaciones.invitacion')->with([
                'mensaje' => $mensaje,
            ]);

    }

    /** especialidad */
    public function cargar_especialidad(Request $request)
    {
        $datos = array();
        $filtro = array();
        $filtro[] = array('estado',1);
        $registros = Especialidad::select('id', 'nombre')->where($filtro)->get();

        if($registros)
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'registro';
            $datos['registros'] = $registros;
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'sin registro';
        }
        return $datos;
    }

    /** tipo especialidad */
    public function cargar_tipo_especialidad(Request $request)
    {
        $datos = array();
        $filtro = array();
        $filtro[] = array('estado',1);
        if(!empty($request->id_especialidad))
            $filtro[] = array('id_especialidad',$request->id_especialidad);

        $registros = TipoEspecialidad::select('id', 'nombre','id_especialidad')->where($filtro)->get();

        if($registros)
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'registro';
            $datos['registros'] = $registros;
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'sin registro';
        }
        return $datos;
    }

    /** sub tipo especialidad */
    public function cargar_sub_tipo_especialidad(Request $request)
    {

        $datos = array();
        $filtro = array();
        $filtro[] = array('estado',1);

        if(!empty($request->id_tipo_especialidad))
            $filtro[] = array('id_tipo_especialidad',$request->id_tipo_especialidad);

        $registros = SubTipoEspecialidad::select('id', 'nombre','id_tipo_especialidad')->where($filtro)->get();

        if($registros)
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'registro';
            $datos['registros'] = $registros;
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'sin registro';
        }
        return $datos;
    }

    public function mensaje($id){
        $mensaje = Mensajes::find($id);
        $mensaje->estado = 0;
        $mensaje->update();
        $mensaje->datos_mensaje = json_decode($mensaje->datos_mensaje);
        $pc = new EscritorioProfesional;
        $mensajes = $pc->dame_mensajes($mensaje->id_receptor);
        $mensaje->datos_mensaje->emisor = Profesional::find($mensaje->id_usuario);
        $mensaje->datos_mensaje->receptor = Profesional::find($mensaje->id_receptor);
        foreach($mensajes as $m){
            $m->emisor = User::find($m->id_usuario);
        }
        return view('app.general.mensajes.profesional')->with([
            'mensaje' => $mensaje->datos_mensaje,
            'mensajes' => $mensajes,
        ]);
    }

    public function mensajeJson($id)
    {
        $mensaje = Mensajes::findOrFail($id);
        $mensaje->estado = 0;
        $mensaje->update();

        $datos = json_decode($mensaje->datos_mensaje);
        $datos->emisor = User::find($mensaje->id_usuario);
        $datos->receptor = Profesional::find($mensaje->id_receptor);

        return response()->json($datos);
    }


}
