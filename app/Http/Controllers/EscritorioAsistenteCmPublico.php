<?php

namespace App\Http\Controllers;

use App\Models\Asistente;
use App\Models\AsistenteContactoEmergencia;
use App\Models\AsistenteTipo;
use App\Models\Bancos;
use App\Models\Categoria;
use App\Models\Ciudad;
use App\Models\ContactoEmergencia;
use App\Models\ContratoDependiente;
use App\Models\Direccion;
use App\Models\Especialidad;
use App\Models\HoraMedica;
use App\Models\Instituciones;
use App\Models\LiquidacionRecibo;
use App\Models\LugarAtencion;
use App\Models\Paciente;
use App\Models\Prevision;
use App\Models\Profesional;
use App\Models\ProfesionalConvenio;
use App\Models\ProfesionalHorario;
use App\Models\ProfesionOficio;
use App\Models\Region;
use App\Models\RegistroConfirmacionHoraAgenda;
use App\Models\SubTipoEspecialidad;
use App\Models\TipoBono;
use App\Models\TipoEspecialidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class EscritorioAsistenteCmPublico extends Controller
{

    /*Asistente Centro Medico*/
    public function index()
    {

        $array_data = array();
        $asistente = Asistente::where('id_usuario', Auth::user()->id)->first();
        $region = Region::all();
        $prevision = Prevision::all();

        if (!isset($asistente))
            return view('auth.Registros.registro_asistente')->with(['region' => $region, 'prevision' => $prevision]);

        $asistente_tipo = AsistenteTipo::where('id',$asistente->id_asistente_tipo)->first();
        $profesion_oficio = ProfesionOficio::all();

        $filtro = array();
        // $filtro[] = array('tipo_empleado',$asistente_tipo->nombre);
        $filtro[] = array('estado',2) ;// contrato activo
        $filtro[] = array('id_empleado',$asistente->id) ;

        // $filtro[] = array('tipo_empleado','ASISTENTE PUBLICO');
        $array_tipo_empleado = array('ASISTENTE ADMINISTRATIVO', 'ASISTENTE CONSULTA', 'ASISTENTE JEFA CAJA', 'ASISTENTE MANEJO DE AGENDA', 'ASISTENTE ONLINE', 'ASISTENTE PUBLICO');

        $contrato = ContratoDependiente::where($filtro)->whereIn('tipo_empleado',$array_tipo_empleado)->first();

        if($contrato)
        {
            $id_lugar_atencion = $contrato->id_lugar_atencion;

            $lugares_atencion = LugarAtencion::where('id', $id_lugar_atencion)->first();
            $profesionales = $lugares_atencion->profesionales()
            ->orderBy('apellido_uno','asc')
            ->get();

            foreach ($profesionales as $key_tipo_agenda => $value_tipo_agenda)
            {
                $registro_tipo_agenda = ProfesionalHorario::where('id_profesional', $value_tipo_agenda->id)->where('id_lugar_atencion', $id_lugar_atencion)->orderBy('id', 'ASC')->get();
                $registro_tipo_agenda_cantidad = ProfesionalHorario::where('id_profesional', $value_tipo_agenda->id)->where('id_lugar_atencion', $id_lugar_atencion)->count();

                if($registro_tipo_agenda_cantidad > 0)
				{
                    $profesionales[$key_tipo_agenda]['id_tipo_agenda'] = $registro_tipo_agenda[0]->tipo_agenda;
				}
                else
				{
                    $profesionales[$key_tipo_agenda]['id_tipo_agenda'] = 0;
				}
            }

            $reg_confirmacion_hora = RegistroConfirmacionHoraAgenda::where('estado',1)->get();
            $tipo_bonos = TipoBono::where('estado', 1)->get();



            $url = 'app.asistente_cm_publico.escritorio_asistente'; // institucion
            $asistente->id_lugar_atencion = $id_lugar_atencion;

            $array_data = array(
                'asistente' => $asistente,
                'prevision' => $prevision,
                'profesionales' => $profesionales,
                'lugares_atencion' => $lugares_atencion,
                'reg_confirmacion_hora' => $reg_confirmacion_hora,
                'region' => $region,
                'profesion_oficio' => $profesion_oficio,
                'tipo_bonos' => $tipo_bonos,
            );


            if (isset($asistente)) {
                if($asistente->bienvenido == 0)
                    return view('bienvenida.inicio_asistente');
                else
                    return view($url)->with($array_data);
            }

            return view('auth.Registros.registro_asistente')->with(['region' => $region, 'prevision' => $prevision]);
        }
        else
        {
            return 'revisar el contrato';
            return back()->with('error','Contrato de usuario no encontado');
        }

    }

    public function registroPaciente()
    {
        return view('app.asistente_cm.registro_paciente');
    }

    public function perfil()
    {
        $asistente = Asistente::where('id_usuario', Auth::user()->id)->first();

        $direccion = $asistente->Direccion()->first();

        if($direccion)
        {
            $direccion_ciudad_objeto = Ciudad::where('id', $direccion->id_ciudad)->first();
            $direccion_ciudad = Ciudad::where('id', $direccion->id_ciudad)->first()->id;
            $direccion_region = Region::where('id', $direccion_ciudad_objeto->id_region)->first()->id;
            $direccion_region_nombre = Region::where('id', $direccion_ciudad_objeto->id_region)->first()->nombre;
        }
        else
        {
            $direccion_ciudad_objeto = '';
            $direccion_ciudad = '';
            $direccion_region = '';
            $direccion_region_nombre = '';
        }

        $regiones = Region::all();
        $ciudades = Ciudad::where('id_region',  $direccion_region)->get();
        $contacto = $asistente->ContactosEmergencia()->get();
        $bancos = Bancos::where('estado',1)->get();
        $liquidacion = LiquidacionRecibo::where('id_seccion',Auth::user()->id)->get();

        $liqui_principal = 0;

        if($liquidacion)
        foreach ($liquidacion as $key => $value)
        {
            $id_banco = decrypt($value->casa);
            $banco = Bancos::select('id', 'nombre')->where('id',$id_banco)->first();
            $liquidacion[$key]->banco = $banco;
            if($value->serie!='')
                $liquidacion[$key]->serie  = decrypt($value->serie);
            if($value->autor!='')
                $liquidacion[$key]->autor = decrypt($value->autor);
            if($value->casa!='')
                $liquidacion[$key]->casa = decrypt($value->casa);
            if($value->numero_control!='')
                $liquidacion[$key]->numero_control = decrypt($value->numero_control);
            if($value->email!='')
                $liquidacion[$key]->email = decrypt($value->email);
            if($value->otro!='')
                $liquidacion[$key]->otro = decrypt($value->otro);
            if($liqui_principal == 0 && $value->principal == 1)
                $liqui_principal = 1;
        }

        return view('app.asistente_cm_publico.perfil_asistente', [
            'asistente' => $asistente,
            'regiones' => $regiones,
            'region' => $regiones,
            'ciudades' => $ciudades,
            'direccion_ciudad' => $direccion_ciudad,
            'direccion_ciudad_nombre' => $direccion_ciudad_objeto->nombre,
            'direccion_region' => $direccion_region,
            'direccion_region_nombre' => $direccion_region_nombre,
            'contacto' => $contacto,
            'bancos' => $bancos,
            'liquidacion' => $liquidacion,
            'liqui_principal' => $liqui_principal,
        ]);
    }

    public function buscar_paciente()
    {
        $asistente = Asistente::where('id_usuario', Auth::user()->id)->first();
        $asistente_tipo = AsistenteTipo::where('id',$asistente->id_asistente_tipo)->first();

        $filtro = array();
        $filtro[] = array('tipo_empleado',strtoupper($asistente_tipo->nombre));
        $filtro[] = array('estado',2) ;
        $contrato = ContratoDependiente::where($filtro)->first();
        $id_lugar_atencion = $contrato->id_lugar_atencion;

        $lugares_atencion = LugarAtencion::where('id', $id_lugar_atencion)->first();

        $url = 'app.asistente_cm_publico.buscar_paciente'; // institucion
        $array_data = array(
            'asistente' => $asistente,
            'lugares_atencion' => $lugares_atencion,
        );

        return view($url, $array_data);
    }

    public function reservar_hora()
    {
        return view('app.asistente_cm.buscador_profesional');
    }

    public function mis_profesionales()
    {
        $asistente = Asistente::where('id_usuario', Auth::user()->id)->first();
        $asistente_tipo = AsistenteTipo::where('id',$asistente->id_asistente_tipo)->first();

        $filtro = array();
        $filtro[] = array('tipo_empleado',$asistente_tipo->nombre);
        $filtro[] = array('estado',2) ;
        $contrato = ContratoDependiente::where($filtro)->first();
        $id_lugar_atencion = $contrato->id_lugar_atencion;

        $lugares_atencion = LugarAtencion::where('id', $id_lugar_atencion)->first();

        $profesionales = $lugares_atencion->profesionales()->get();


        $url = 'app.asistente_cm_publico.mis_profesionales'; // institucion
        $array_data = array(
            'asistente' => $asistente,
            'lugares_atencion' => $lugares_atencion,
            'profesionales' => $profesionales,
        );

        return view($url, $array_data);
    }

    public function getEspecialidad(Request $request)
    {
        if (Session::has('view')) {
            Session::forget('view');
        }
        Session::put('view', $request->view);

        $this->validate($request, [
            'especialidad_profesional' => 'required',
            'convenios' => 'required|between:2,999',
            'comuna_paciente' => 'required|between:2,999',
        ]);

        $especialidad = (isset($request->especialidad_profesional)) ? $request->especialidad_profesional : null;
        $convenios = (isset($request->convenios)) ? $request->convenios : null;
        $comuna = (isset($request->comuna_paciente)) ? $request->comuna_paciente : null;

        $Especialidad = Especialidad::where('nombre', 'like', '%'.$especialidad.'%')->get();
        $profesional = [];
        foreach ($Especialidad as $e) {
            if (isset($e->id)) {
                foreach ($e->Profesionales()->get() as $p) {
                    array_push($profesional, $p);
                }
            }
        }

        return view('app.asistente_cm_publico.buscador_profesional', ['profesional' => $profesional]);
    }

    public function buscarInfoProfesional(Request $request)
    {
        $datos = array();

        $filtro = array();
        if(!empty($request->id_profesional))
            $filtro[] = array('id',$request->id_profesional);
        // if(!empty($request->id_lugar_atencion))
        //     $filtro[] = array('id_lugar_atencion',$request->id_lugar_atencion);

        $profesional = Profesional::where($filtro)->first();

        $filtro = array();
        if(!empty($request->id_profesional))
            $filtro[] = array('id_profesional',$request->id_profesional);
        if(!empty($request->id_lugar_atencion))
            $filtro[] = array('id_lugar_atencion',$request->id_lugar_atencion);

        $horario = ProfesionalHorario::where($filtro)->get();

        if($profesional)
        {
            $especialidad = Especialidad::find($profesional->id_especialidad);
            $tipo_especialidad = TipoEspecialidad::find($profesional->id_tipo_especialidad);
            $sub_tipo_especialidad = '';
            if(!empty($profesional->id_sub_tipo_especialidad))
            $sub_tipo_especialidad = SubTipoEspecialidad::find($profesional->id_sub_tipo_especialidad);
            if($horario)
            {

                $horario_data = array();
                $horario_agenda = '0,1,2,3,4,5,6';
                $periodo_agenda = '';
                $periodo_agenda_temp = '01:00';
                $hora_inicio_agenda = '';
                $hora_inicio_agenda_temp = '24:00';
                $hora_termino_agenda = '';
                $hora_termino_agenda_temp = 0;
                foreach ($horario as $hor) {
                    $ho = explode(',', $hor->dia);
                    // dd($ho);
                    foreach ($ho as $h) {
                        if ($h == '0') {
                            $horario_agenda = str_replace($h, '', $horario_agenda);
                        } else {
                            $horario_agenda = str_replace(',' . $h, '', $horario_agenda);
                        }
                    }
                    if(strtotime($hor->duracion_consulta) < strtotime($periodo_agenda_temp))
                        $periodo_agenda_temp = $hor->duracion_consulta;

                    if(strtotime($hor->hora_inicio) < strtotime($hora_inicio_agenda_temp))
                        $hora_inicio_agenda_temp = $hor->hora_inicio;

                    if(strtotime($hor->hora_termino) > strtotime($hora_termino_agenda_temp))
                        $hora_termino_agenda_temp = $hor->hora_termino;
                }
                $horario_agenda = ltrim($horario_agenda, ',');
                $periodo_agenda = $periodo_agenda_temp;
                $hora_inicio_agenda = $hora_inicio_agenda_temp;
                $hora_termino_agenda = $hora_termino_agenda_temp;

                $horario_data['horario_agenda'] = $horario_agenda;
                $horario_data['periodo_agenda'] = $periodo_agenda;
                $horario_data['hora_inicio_agenda'] = $hora_inicio_agenda;
                $horario_data['hora_termino_agenda'] = $hora_termino_agenda;

                $datos['estado'] = 1;
                $datos['msj'] = 'registros';
                $datos['profesional'] = $profesional;
                $datos['horario'] = $horario;
                $datos['horario_data'] = $horario_data;
                $datos['especialidad'] = $especialidad;
                $datos['tipo_especialidad'] = $tipo_especialidad;
                $datos['sub_tipo_especialidad'] = $sub_tipo_especialidad;
                $datos['request'] = $request->all();
            }
            else
            {
                $datos['estado'] = 0;
                $datos['profesional'] = $profesional;
                $datos['horario'] = '';
                $datos['msj'] = 'sin registros de horarios';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['horario'] = '';
            $datos['msj'] = 'sin registros';
        }

        return $datos;
    }

    public function getProfesional(Request $request)
    {
        if (Session::has('view')) {
            Session::forget('view');
        }
        Session::put('view', $request->view);

        $this->validate($request, [
            'nombrerut_profesional' => 'required',
            'comuna_paciente2' => 'required|between:2,999',
        ]);

        $nombrerut = (isset($request->nombrerut_profesional)) ? $request->nombrerut_profesional : null;
        $comuna = (isset($request->comuna_paciente2)) ? $request->comuna_paciente2 : null;

        $profesional = Profesional::where(function ($query) use ($nombrerut) {
            $query->where('nombre', 'like', '%'.$nombrerut.'%')->orWhere('rut', '=', $nombrerut);
        })->get();

        return view('app.asistente_cm_publico.buscador_profesional', ['profesional' => $profesional]);
    }

    public function getVideoConsulta(Request $request)
    {
        if (Session::has('view')) {
            Session::forget('view');
        }
        Session::put('view', $request->view);

        $this->validate($request, [
            'especialidad_profesional3' => 'required',
            'convenios3' => 'required|between:2,999',
            'comuna_paciente3' => 'required|between:2,999',
        ]);

        $especialidad = (isset($request->especialidad_profesional3)) ? $request->especialidad_profesional3 : null;
        $convenios = (isset($request->convenios3)) ? $request->convenios3 : null;
        $comuna = (isset($request->comuna_paciente3)) ? $request->comuna_paciente3 : null;

        $Especialidad = Especialidad::where('nombre', 'like', '%'.$especialidad.'%')->get();
        $profesional = [];
        foreach ($Especialidad as $e) {
            if (isset($e->id)) {
                foreach ($e->Profesionales()->get() as $p) {
                    array_push($profesional, $p);
                }
            }
        }

        return view('app.asistente_cm_publico.buscador_profesional', ['profesional' => $profesional]);
    }

    public function agendaPorProfesional()
    {
        $asistente = Asistente::where('id_usuario', Auth::user()->id)->first();
        $profesional = $asistente->Profesionales()->get();
        $lugares_atencion = $asistente->LugarAtencion()->get();
        $reg_confirmacion_hora = RegistroConfirmacionHoraAgenda::where('estado',1)->get();
        $prevision = Prevision::all();
        $region = Region::all();
        $profesion_oficio = ProfesionOficio::all();
        $tipo_bonos = TipoBono::where('estado', 1)->get();

        return view('app.asistente_cm_publico.agenda_por_profesional')->with([
            'asistente' => $asistente,
            'profesional' => $profesional,
            'lugares_atencion' => $lugares_atencion,
            'reg_confirmacion_hora' => $reg_confirmacion_hora,
            'prevision' => $prevision,
            'region' => $region,
            'profesion_oficio' => $profesion_oficio,
            'tipo_bonos' => $tipo_bonos,
        ]);
    }

    public function agendar_hora_nuevo_paciente(Request $request)
    {
        $user = Auth::user()->id;
        $paciente = new Paciente();
        $direccion = new Direccion();
        $asistente = Asistente::where('id_usuario', Auth::user()->id)->first();
        $profesional = Profesional::where('id',$request->id_profesional)->first();

        $direccion->direccion = $request->reserva_hora_direccion;
        $direccion->numero_dir = $request->reserva_hora_numero_dir;
        $direccion->id_ciudad = $request->reserva_hora_comuna;
        $direccion->save();
        $paciente->token = md5(uniqid());
        $paciente->rut = $request->rut_paciente_reserva;
        $paciente->nombres = $request->reserva_hora_nombre;
        $paciente->apellido_uno = $request->reserva_hora_primer_apellido;
        $paciente->apellido_dos = $request->reserva_hora_segundo_apellido;
        $paciente->sexo = $request->reserva_hora_sexo;
        $paciente->profesion = $request->reserva_hora_profesion;
        $paciente->fecha_nac = $request->reserva_hora_fecha_nac;
        $paciente->id_prevision = $request->reserva_hora_convenio;
        $paciente->email = $request->reserva_hora_email;
        $paciente->telefono_uno = $request->reserva_hora_telefono;
        $paciente->id_direccion = $direccion->id;

        if ($paciente->save()) {

            /** buscar tiempo de la consult */
            $dia_de_semana = \Carbon\Carbon::parse($request->fecha_consulta)->format('w');
            $profesional_horarios = ProfesionalHorario::select('duracion_consulta')
                                                    ->where('id_profesional', $profesional->id)
                                                    ->where('id_lugar_atencion',$request->id_lugar_atencion)
                                                    ->where('dia','like','%'.$dia_de_semana.'%')
                                                    ->first();

            // $profesional_horarios = '00:30:00';
            // $tiempo_consulta = 30;
            $horas = date('H',strtotime($profesional_horarios->duracion_consulta));
            $minutos = date('i',strtotime($profesional_horarios->duracion_consulta));
            $totales = ($horas*60) + $minutos;
            $tiempo_consulta = $totales;

            $hora_medica = new HoraMedica();

            $hora_medica->id_paciente = $paciente->id;
            $hora_medica->id_profesional = $profesional->id;
            $hora_medica->id_asistente = $asistente->id;
            $hora_medica->id_estado = 1;
            $hora_medica->id_lugar_atencion = $request->id_lugar_atencion;
            $hora_medica->fecha_consulta = \Carbon\Carbon::parse($request->fecha_consulta)->format('Y-m-d');

            $hora_medica->hora_inicio = \Carbon\Carbon::parse($request->fecha_consulta)->format('H:i:s');
            $hora_medica->hora_termino = \Carbon\Carbon::parse($request->fecha_consulta)->addMinutes($tiempo_consulta)->format('H:i:s');
            $hora_medica->descripcion = $hora_medica->descripcion = $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos;

            if (!$hora_medica->save()) {
                return 'error';
            }

            $details = [
                'title' => 'Hora medica Reservada',
                'body' => 'Estimado/a ' . $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos . ',<br>
                    Junto con saludar, por medio de este correo le informamos que se ha reservado su hora medida <br>' .
                    'Fecha: ' . $hora_medica->fecha_consulta . '<br>' .
                    'Hora : ' . $hora_medica->hora_inicio . '<br>' .
                    'Profesional: <b>' . $profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos . '<b> <br><br>' .
                    'Que tenga un excelente día. </br></br>' .
                    'Saludos.',
            ];

            //Mail::to($paciente->email)->send(new \App\Mail\RegistroPacienteMail($details));

            return json_encode($hora_medica);
        }

        return 'algo';
    }

    public function agendar_horas(Request $request)
    {

        $paciente = paciente::where('id', $request->reserva_hora_id)->first();
        $asistente = Asistente::where('id_usuario', Auth::user()->id)->first();
        $profesional = Profesional::where('id', $request->id_profesional)->first();

        /** buscar tiempo de la consult */
        $dia_de_semana = \Carbon\Carbon::parse($request->fecha_consulta)->format('w');
        $profesional_horarios = ProfesionalHorario::select('duracion_consulta')
                                                    ->where('id_profesional', $profesional->id)
                                                    ->where('id_lugar_atencion',$request->id_lugar_atencion)
                                                    ->where('dia','like','%'.$dia_de_semana.'%')
                                                    ->first();

        // $profesional_horarios = '00:30:00';
        // $tiempo_consulta = 30;
        $horas = date('H',strtotime($profesional_horarios->duracion_consulta));
        $minutos = date('i',strtotime($profesional_horarios->duracion_consulta));
        $totales = ($horas*60) + $minutos;
        $tiempo_consulta = $totales;

        $hora_medica = new HoraMedica();

        $hora_medica->id_paciente = $request->reserva_hora_id;
        $hora_medica->id_profesional = $profesional->id;
        $hora_medica->id_asistente = $asistente->id;
        $hora_medica->id_estado = '1';
        $hora_medica->fecha_consulta = \Carbon\Carbon::parse($request->fecha_consulta)->format('Y-m-d');

        $hora_medica->hora_inicio = \Carbon\Carbon::parse($request->fecha_consulta)->format('H:i:s');
        $hora_medica->hora_termino = \Carbon\Carbon::parse($request->fecha_consulta)->addMinutes($tiempo_consulta)->format('H:i:s');
        $hora_medica->descripcion = $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos;
        $hora_medica->id_lugar_atencion = $request->id_lugar_atencion;

        if (!$hora_medica->save()) {
            return 'error';
        }

        $details = [
            'title' => 'Hora medica Reservada',
            'body' => 'Estimado/a ' . $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos . ',<br>
                    Junto con saludar, por medio de este correo le informamos que se ha reservado su hora medida <br>' .
                'Fecha: ' . $hora_medica->fecha_consulta . '<br>' .
                'Hora : ' . $hora_medica->hora_inicio . '<br>' .
                'Profesional: <b>' . $profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos . '<b> <br><br>' .
                'Que tenga un excelente día. </br></br>' .
                'Saludos.',
        ];

        //Mail::to($paciente->email)->send(new \App\Mail\RegistroPacienteMail($details));

        return json_encode($hora_medica);
    }

    public function editar_datos_personales_perfil(Request $request)
    {

        $asistente = Asistente::where('id',  $request->id_asistente)->first();

        $asistente->rut = $request->rut;
        $asistente->nombres = $request->nombres;
        $asistente->apellido_uno = $request->apellido_uno;
        $asistente->apellido_dos = $request->apellido_dos;
        $asistente->sexo = $request->sexo;
        $asistente->fecha_nac = $request->nacimiento;

        if (!$asistente->save()) {
            return response()->json(['success' => false, 'message' => 'Error al editar datos personales.']);
        } else {
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Datos personales Actualizados de forma exitosa.',
                    'asistente' => $asistente
                ]
            );
        }
    }

    public function editar_datos_contacto_perfil(Request $request)
    {

        $asistente = Asistente::where('id',  $request->id_asistente)->first();

        $asistente->email = $request->email;
        $asistente->telefono_uno = $request->telefono_uno;

        if (!$asistente->save()) {
            return response()->json(['success' => false, 'message' => 'Error al editar datos de Contacto.']);
        } else {
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Datos de Contactos Actualizados.',
                    'asistente' => $asistente
                ]
            );
        }
    }

    public function editar_datos_direccion_perfil(Request $request)
    {
        $asistente = Asistente::where('id',  $request->id_asistente)->first();
        $direccion = Direccion::where('id', $asistente->Direccion()->first()->id)->first();
        if($direccion)
        {
            $direccion->id_ciudad = $request->id_ciudad;
            $direccion->direccion = $request->direccion;
            $direccion->numero_dir = $request->numero_dir;

            if (!$direccion->save()) {
                return response()->json(['success' => false, 'message' => 'Error al editar datos de residencia.']);
            } else {
                return response()->json(
                    [
                        'success' => true,
                        'message' => 'Datos de Residencia Actualizados.',
                        'direccion' => $direccion
                    ]
                );
            }
        }
        else
        {
            return response()->json(['success' => false, 'message' => 'Error al editar datos de residencia. sin direccion']);
        }
    }

    public function eliminar_contacto_paciente(Request $request)
    {
        $asistenteContacto = AsistenteContactoEmergencia::where('id_asistente', $request->id_asistente)->where('id_contacto', $request->id_contacto)->first();
        if (!$asistenteContacto->delete()) {
            return 'error';
        } else {
            return 'ok';
        }
    }

    public function cargar_datos_contacto(Request $request)
    {
        $contacto = ContactoEmergencia::where('id', $request->id_contacto)->first();
        $contacto->direccion = $contacto->Direccion()->first();
        $contacto->ciudad = $contacto->Direccion()->first()->Ciudad()->first();
        $contacto->region = Region::find($contacto->Direccion()->first()->Ciudad()->first()->id_region);
        //$contacto->region  = $contacto->Direccion()->first()->Ciudad()->first()->Region()->first();

        return $contacto;
    }

    public function editar_contacto_emergencia(Request $request)
    {
        $contacto = ContactoEmergencia::where('id', $request->id_contacto)->first();
        $direccion = Direccion::where('id', $contacto->id_direccion)->first();
        $asistente = Asistente::where('id_usuario', Auth::user()->id)->first();

        $direccion->direccion = $request->direccion;
        $direccion->numero_dir = $request->numero_dir;
        $direccion->id_ciudad = $request->id_ciudad;
        $direccion->save();

        $contacto->rut = $request->rut;
        $contacto->nombre = $request->nombres;
        $contacto->apellido_uno = $request->apellido_uno;
        $contacto->apellido_dos = $request->apellido_dos;
        $contacto->parentezco = $request->parentezco;
        //$contacto->fecha_nac = \Carbon\Carbon::parse($request->fecha)->format('Y-m-d');
        $contacto->prioridad = $request->prioridad;
        $contacto->email = $request->email;
        $contacto->telefono = $request->telefono;
        $contacto->id_direccion = $direccion->id;

        if ($contacto->save()) {
            /*  $details = [
                      'title' => 'Hora medica Reservada',
                      'body' => 'Estimado/a '.$contacto->nombres.' '.$contacto->apellido_uno.' '.$contacto->apellido_dos.',<br>
                      Junto con saludar, por medio de este correo le informamos que se ha reservado su hora medida <br>'.
                      'Fecha: '.$contacto->fecha_consulta.'<br>'.
                      'Hora : '.$hora_medica->hora_inicio.'<br>'.
                      'Asistente: <b>'.$asistente->nombres.' '.$asistente->apellido_uno.' '.$asistente->apellido_dos.'<b> <br><br>'.
                      'Que tenga un excelente día. </br></br>'.
                      'Saludos.',
                  ];

              //Mail::to($paciente->email)->send(new \App\Mail\RegistroPacienteMail($details));
        */
            return json_encode($contacto);
        }
        else
        {
            return 'error';
        }
    }

    public function cargar_contacto_emergencia()
    {
        $datos = array();

        $asistente = Asistente::where('id_usuario', Auth::user()->id)->first();
        $contactos = $asistente->ContactosEmergencia()->get();
        if($contactos)
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'registros';
            $datos['id_asistente'] = $asistente->id;
            $datos['registros'] = $contactos;
        }
        else
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'registros';

        }
        return $datos;
    }

    public function registrar_contacto_emergencia(Request $request)
    {
        $asistente = Asistente::where('id_usuario', Auth::user()->id)->first();
        $contacto_emergencia = ContactoEmergencia::where('rut', $request->rut)->first();
        //$direccion_contacto = Direccion::where('id', $contacto_emergencia->id_direccion)->first();

        if ($contacto_emergencia == null) {
            $contacto_emergencia = new ContactoEmergencia();
            $direccion_contacto = new Direccion();
        } else {
            $direccion_contacto = Direccion::where('id', $contacto_emergencia->id_direccion)->first();
        }

        $direccion_contacto->direccion = $request->direccion;
        $direccion_contacto->numero_dir = $request->numero_dir;
        $direccion_contacto->id_ciudad = $request->id_ciudad;

        $direccion_contacto->save();

        $contacto_emergencia->rut = $request->rut;
        $contacto_emergencia->nombre = $request->nombres;
        $contacto_emergencia->apellido_uno = $request->apellido_uno;
        $contacto_emergencia->apellido_dos = $request->apellido_dos;
        $contacto_emergencia->parentezco = $request->parentezco;
        $contacto_emergencia->fecha_nac = \Carbon\Carbon::parse($request->fecha)->format('Y-m-d');
        $contacto_emergencia->prioridad = $request->prioridad;
        $contacto_emergencia->id_direccion = $direccion_contacto->id;

        if ($contacto_emergencia->email != $request->email) {
            $contacto_emergencia->email = $request->email;
        }
        $contacto_emergencia->telefono = $request->telefono;

        //$direccion_contacto = Direccion::where('id', $contacto_emergencia->id_direccion)->first();

        if ($contacto_emergencia->save()) {
            $asistenteContacto = new AsistenteContactoEmergencia();

            $asistenteContacto->id_asistente = $asistente->id;
            $asistenteContacto->id_contacto = $contacto_emergencia->id;
            $contacto_emergencia->relacion = $request->parentezco;

            if (!$asistenteContacto->save()) {
                return 'error';
            }

            return json_encode($contacto_emergencia);
        } else {
            return 'error al registrar el contacto de emergencia';
        }
    }

    public function buscar_contacto(Request $request)
    {
        $contacto = ContactoEmergencia::where('rut', $request->rut_contacto)->get();
        $asistente = Asistente::where('id_usuario', Auth::user()->id)->first();

        foreach ($contacto as $con) {
            $contacto_paciente = AsistenteContactoEmergencia::where('id_contacto', $con->id)->where('id_asistente', $asistente->id)->first();
            if ($contacto_paciente != '') {
                return 'existe';
            }
        }

        $contacto = ContactoEmergencia::where('rut', $request->rut_contacto)->first();

        $region = region::all();
        if ($contacto == null) {
            $contacto = Paciente::where('rut', $request->rut_contacto)->first();

            if ($contacto == null) {
                $contacto = Profesional::where('rut', $request->rut_contacto)->first();

                if ($contacto == null) {
                    $contacto = Asistente::where('rut', $request->rut_contacto)->first();
                    if ($contacto == null) {
                        return 'vacio';
                    } else {
                        //$contacto->nombres = $contacto->nombre;
                        $contacto->direccion = $contacto->Direccion()->first()->direccion;
                        $contacto->numero_dir = $contacto->Direccion()->first()->numero_dir;
                        $contacto->ciudad = $contacto->Direccion()->first()->Ciudad()->first();
                        $contacto->region = $region;

                        return json_encode($contacto);
                    }
                } else {
                    $contacto->direccion = $contacto->Direccion()->first()->direccion;
                    $contacto->nombres = $contacto->nombre;
                    $contacto->numero_dir = $contacto->Direccion()->first()->numero_dir;
                    $contacto->ciudad = $contacto->Direccion()->first()->Ciudad()->first();
                    $contacto->region = $region;

                    return json_encode($contacto);
                }
            } else {
                $contacto->direccion = $contacto->Direccion()->first()->direccion;
                $contacto->numero_dir = $contacto->Direccion()->first()->numero_dir;
                $contacto->ciudad = $contacto->Direccion()->first()->Ciudad()->first();
                $contacto->region = $region;

                return json_encode($contacto);
            }
        } else {
            $contacto->telefono_uno = $contacto->telefono;
            $contacto->nombres = $contacto->nombre;
            $contacto->direccion = $contacto->Direccion()->first()->direccion;
            $contacto->numero_dir = $contacto->Direccion()->first()->numero_dir;
            $contacto->ciudad = $contacto->Direccion()->first()->Ciudad()->first();
            $contacto->region = $region;

            return json_encode($contacto);
        }
    }

    public function eliminar_contacto_asistente(Request $request)
    {
        $asistenteContacto = AsistenteContactoEmergencia::where('id_asistente', $request->id_asistente)->where('id_contacto', $request->id_contacto)->first();
        if (!$asistenteContacto->delete()) {
            return 'error';
        } else {
            return 'ok';
        }
    }

    public function buscar_informacion_profesional(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_profesional))
        {
            $error['id_profesional'] = 'campo requerido';
            $valido = 0;
        }

        if($valido ==1)
        {
            $profesional = Profesional::find($request->id_profesional);
            $lugares_atencion = $profesional->LugaresAtencion()->where('estado',1)->get();


            foreach ($lugares_atencion as $key => $value)
            {

                // CONVENIOS
                $convenios_lugar_atencion = ProfesionalConvenio::where('id_profesional', $profesional->id)->where('id_lugar_atencion',$value->id)->first();
                if($convenios_lugar_atencion)
                {
                    $lugares_atencion[$key]['convenios'] = $convenios_lugar_atencion->convenios;
                }
                else
                {
                    $lugares_atencion[$key]['convenios'] = '';
                }

                // DIRECCION LUGAR ATENCION
                $direccion = $value->Direccion()->first();
                $direccion_ciudad = $direccion->Ciudad()->first()->nombre;
                if($direccion)
                {
                    $lugares_atencion[$key]['direccion_texto'] = $direccion->direccion.' #'.$direccion->numero_dir.', '.$direccion_ciudad;
                }

                if($value->tipo == 1)
                {
                    $lugares_atencion[$key]['tipo_texto'] = 'Consulta Privada';
                }
                else if($value->tipo == 2)
                {
                    $lugares_atencion[$key]['tipo_texto'] = 'Centro Medico';
                }
                else
                {
                    $lugares_atencion[$key]['tipo_texto'] = 'Sin Información';
                }


            }

            $datos['estado'] = 1;
            $datos['msj'] = 'registros';
            $datos['profesional'] = $profesional;
            $datos['lugares_atencion'] = $lugares_atencion;

        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campo requerido';
            $datos['error'] = $error;
        }
        return $datos;

    }

    public function buscar_paciente_rut(Request $request)
    {
        $datos = array();
        $id_lugar_atencion = $request->id_lugar_atencion;
        $rut = $request->rut;
        $nombre = $request->nombre;
        $apellido = $request->apellido;

        // $filtro = array();
        // $filtro[] = array('rut',$rut);
        // $filtro[] = array('nombres','like','%'.$nombre.'%');

        // $filtro_2 = array();
        // $filtro_2[] = array('apellido_uno','like','%'.$apellido.'%');
        // $filtro_2[] = array('apellido_dos','like','%'.$apellido.'%');
        // 1=1
        // rut='26340063-1' and (nombres like '%'.$nombre.'%'; or apellido_uno like '%daviladasda%' or apellido_dos like '%fdavila%')

        $sql  = '';
        $sql_val = array();
        if(!empty($rut))
        {
            $sql .= " rut=? ";
            $sql_val[] = $rut;
        }
        if(!empty($nombre))
        {
            if($sql != '')
                $sql .=' OR ';

            $sql .= " nombres like ? ";
            $sql_val[] = '%'.$nombre.'%';
        }
        if(!empty($apellido))
        {
            if($sql != '')
                $sql .=' OR ';

            $sql .= " apellido_uno like ?  OR  apellido_dos like ? ";
            $sql_val[] = '%'.$apellido.'%';
            $sql_val[] = '%'.$apellido.'%';
        }

        $registro = Paciente::with(['FichaAtencion' => function($query) use ($id_lugar_atencion){
                                $query->select('id','id_lugar_atencion','id_paciente')->where('id_lugar_atencion',$id_lugar_atencion);
                            }])
                            ->with(['Prevision' =>function($query){
                                $query->select('id','nombre');
                            }])
                            ->with(['Direccion' =>function($query){
                                $query->select('id','direccion','numero_dir','id_ciudad')
                                            ->with(['Ciudad' => function($query2){
                                                $query2->select('id','nombre','id_region')
                                                    // ->Region()
                                                    ;
                                            }]);
                            }])
                            /** PERMITE FILTRAR POR LUGAR ATENCION, RUT, NOMBRE, APELLIDO  */
                            ->porLuAt_Rut_Nom_Ape($id_lugar_atencion, $rut, $nombre, $apellido)
                            ->get();
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

    public function confirmarHora(Request $request)
    {
        $asistente = Asistente::where('id_usuario', Auth::user()->id)->first();
        $filtro = array();
        // $filtro[] = array('tipo_empleado',$asistente_tipo->nombre);
        $filtro[] = array('estado',2) ;// contrato activo
        $filtro[] = array('id_empleado',$asistente->id) ;
        $contrato = ContratoDependiente::where($filtro)->first();
        if($contrato)
        {
            $id_lugar_atencion = $contrato->id_lugar_atencion;
            $lugares_atencion = LugarAtencion::where('id', $id_lugar_atencion)->first();

            $filtro_hora = array();
            $filtro_hora[] = array('id_lugar_atencion', $lugares_atencion->id);
            $filtro_hora[] = array('id_estado', 1);
            $fecha_incio = date('Y-m-d');
            $fecha_termino = date('Y-m-d', strtotime(date('Y-m-d').'+1 days'));
            $horas = HoraMedica::where($filtro_hora)
                                ->with(['Notificacionesconfirmacion' => function($query){
                                    // $query->whereIn('estado_confirmacion', [0,1]);
                                }])
                                ->with(['Profesional' => function($query){
                                    $query->select('id', 'nombre', 'apellido_uno', 'apellido_dos');
                                }])
                                ->with(['Paciente' => function($query){
                                    $query->select('id', 'nombres', 'apellido_uno', 'apellido_dos', 'telefono_uno', 'telefono_dos');
                                }])
                                ->whereBetween('fecha_consulta', [$fecha_incio, $fecha_termino])
                                ->orderBy('fecha_consulta', 'ASC')
                                ->get();

            // echo json_encode($horas);

            return view('app.asistente_cm_publico.confirmar_hora', [
                'horas' => $horas,
                'fecha_incio' => $fecha_incio,
                'fecha_termino' => $fecha_termino,
                'lugares_atencion' => $lugares_atencion,
            ]);

        }
        else
        {
            return back()->with('error','Contrato de usuario no encontado');
        }
    }

    public function cargarConfirmarHora(Request $request)
    {
        $datos = array();

        $asistente = Asistente::where('id_usuario', Auth::user()->id)->first();
        $filtro = array();
        // $filtro[] = array('tipo_empleado',$asistente_tipo->nombre);
        $filtro[] = array('estado',2) ;// contrato activo
        $filtro[] = array('id_empleado',$asistente->id) ;
        $contrato = ContratoDependiente::where($filtro)->first();
        if($contrato)
        {
            $id_lugar_atencion = $contrato->id_lugar_atencion;
            $lugares_atencion = LugarAtencion::where('id', $id_lugar_atencion)->first();

            $filtro_hora = array();
            $filtro_hora[] = array('id_lugar_atencion', $lugares_atencion->id);
            $filtro_hora[] = array('id_estado', 1);
            $fecha_incio = date('Y-m-d');
            $fecha_termino = date('Y-m-d', strtotime(date('Y-m-d').'+1 days'));
            $horas = HoraMedica::where($filtro_hora)
                                ->with(['Notificacionesconfirmacion' => function($query){
                                    // $query->whereIn('estado_confirmacion', [0,1]);
                                }])
                                ->with(['Profesional' => function($query){
                                    $query->select('id', 'nombre', 'apellido_uno', 'apellido_dos');
                                }])
                                ->with(['Paciente' => function($query){
                                    $query->select('id', 'nombres', 'apellido_uno', 'apellido_dos', 'telefono_uno', 'telefono_dos');
                                }])
                                ->whereBetween('fecha_consulta', [$fecha_incio, $fecha_termino])
                                ->orderBy('fecha_consulta', 'ASC')
                                ->get();


            if($horas)
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registros';
                $datos['registros'] = $horas;
                $datos['fecha_incio'] = $fecha_incio;
                $datos['fecha_termino'] = $fecha_termino;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'sin registros';
                $datos['fecha_incio'] = $fecha_incio;
                $datos['fecha_termino'] = $fecha_termino;
            }

        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Usuario son acceso a registros.';
        }

        return $datos;
    }

}
