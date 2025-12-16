<?php

namespace App\Http\Controllers;

use App\Helpers\Funciones;
use App\Models\Asistente;
use App\Models\AsistenteContactoEmergencia;
use App\Models\AsistenteLugarAtencion;
use App\Models\AsistenteTipo;
use App\Models\Bancos;
use App\Models\Bodega;
use App\Models\Categoria;
use App\Models\Ciudad;
use App\Models\ContactoEmergencia;
use App\Models\ContratoDependiente;
use App\Models\Direccion;
use App\Models\Especialidad;
use App\Models\ExamenEspecialidadTipo;
use App\Models\HoraMedica;
use App\Models\Instituciones;
use App\Models\LiquidacionRecibo;
use App\Models\LugarAtencion;
use App\Models\LugarAtencionBoxProfesional;
use App\Models\Paciente;
use App\Models\PacientesDependientes;
use App\Models\Prevision;
use App\Models\ProcedimientosCentro;
use App\Models\Profesional;
use App\Models\ProfesionalAsistente;
use App\Models\ProfesionalConvenio;
use App\Models\ProfesionalesLugaresAtencion;
use App\Models\ProfesionalHorario;
use App\Models\ProfesionOficio;
use App\Models\Region;
use App\Models\RegistroConfirmacionHoraAgenda;
use App\Models\SubTipoEspecialidad;
use App\Models\TipoBono;
use App\Models\TipoEspecialidad;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class EscritorioAsistente extends Controller
{
    public function index()
    {
        $array_data = array();
        $asistente = Asistente::where('id_usuario', Auth::user()->id)->first();

        $region = Region::all();
        $prevision = Prevision::all();
        $tipo_bonos = TipoBono::where('estado', 1)->get();

        $url = 'app.asistente.escritorio_asistente';
        $array_data = array(
            'asistente' => $asistente,
            'prevision' => $prevision,
            'tipo_bonos' => $tipo_bonos,
            'region' => $region,
        );



        if (isset($asistente)) {
            if($asistente->bienvenido == 0)
                return view('bienvenida.inicio_asistente');
            else
                return view($url)->with($array_data);
        }

        return view('auth.Registros.registro_asistente')->with(['region' => $region, 'prevision' => $prevision]);
    }

    public function registroPaciente()
    {
        return view('app.asistente.registro_paciente');
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

        return view('app.asistente.perfil_asistente', [
            'asistente' => $asistente,
            'regiones' => $regiones,
            'region' => $regiones,
            'ciudades' => $ciudades,
            'direccion_ciudad' => $direccion_ciudad,
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

        // echo json_encode($asistente);
        // die();
        if($asistente->id_asistente_tipo)
            $asistente_tipo = AsistenteTipo::where('id',$asistente->id_asistente_tipo)->first();
        else
            $asistente_tipo = AsistenteTipo::where('id',5)->first();

        $filtro = array();
        $filtro[] = array('tipo_empleado',strtoupper($asistente_tipo->nombre));
        $filtro[] = array('estado',2) ;
        $contrato = ContratoDependiente::where($filtro)->first();
        $id_lugar_atencion = $contrato->id_lugar_atencion;

        $lugares_atencion = LugarAtencion::where('id', $id_lugar_atencion)->first();

        $url = 'app.asistente.buscar_paciente'; // institucion
        $array_data = array(
            'asistente' => $asistente,
            'lugares_atencion' => $lugares_atencion,
        );

        return view($url, $array_data);
    }

    public function reservar_hora()
    {
        return view('app.asistente.buscador_profesional');
    }

    public function mis_profesionales()
    {
        $asistente = Asistente::where('id_usuario', Auth::user()->id)->first();
        $asistente_tipo = AsistenteTipo::where('id',$asistente->id_asistente_tipo)->first();

        $url = 'app.asistente.mis_profesionales';
        $array_data = array(
            'asistente' => $asistente,
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

        return view('app.asistente.buscador_profesional', ['profesional' => $profesional]);
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

        return view('app.asistente.buscador_profesional', ['profesional' => $profesional]);
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

        return view('app.asistente.buscador_profesional', ['profesional' => $profesional]);
    }

    /*Asistente Centro Medico*/
    public function buscarInfoProfesional(Request $request)
    {
        $datos = array();

        $filtro = array();
        if(!empty($request->id_profesional))
            $filtro[] = array('id',$request->id_profesional);
        // if(!empty($request->id_lugar_atencion))
        //     $filtro[] = array('id_lugar_atencion',$request->id_lugar_atencion);

        $profesional = Profesional::where($filtro)->first();

        if($profesional)
        {
            $filtro = array();
            if(!empty($request->id_profesional))
                $filtro[] = array('id_profesional',$request->id_profesional);
            if(!empty($request->id_lugar_atencion))
                $filtro[] = array('id_lugar_atencion',$request->id_lugar_atencion);
            if(!empty($request->tipo_agenda))
                $filtro[] = array('tipo_agenda',$request->tipo_agenda);
            else
                $filtro[] = array('tipo_agenda',1);

            $horario = ProfesionalHorario::where($filtro)->get();

            // var_dump($filtro);
            // var_dump($horario);
            // die();

			// busqueda de imagen
            $array_rut = explode('-',$profesional->rut);
            $nombre_imagen = asset('images/iconos/usuario_profesional.svg');
            if(file_exists(public_path('images/img_perfil/'.$array_rut[0].'.png')))
            {
                $nombre_imagen = asset('images/img_perfil/'.$array_rut[0].'.png');
            }
            $profesional->img_profesional = $nombre_imagen;


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
                foreach ($horario as $hor)
                {
                    $ho = explode(',', $hor->dia);
                    // dd($ho);
                    foreach ($ho as $h)
                    {
                        if ($h == '0')
                        {
                            $horario_agenda = str_replace($h, '', $horario_agenda);
                        }
                        else
                        {
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
                $examen_tipo = '';
                if($profesional->id_sub_tipo_especialidad)
                    $examen_tipo = ProcedimientosCentro::where('id_sub_tipo_especialidad', $profesional->id_sub_tipo_especialidad)->get();
					// $examen_tipo = ExamenEspecialidadTipo::where('id_sub_tipo_especialidad', $profesional->id_sub_tipo_especialidad)->with('ExamenEspecialidadTemplate')->get();

                $tipo_agendas = ProfesionalHorario::select('tipo_agenda')->where('id_profesional', $profesional->id)->groupBy('tipo_agenda')->pluck('tipo_agenda')->toArray();

                // box de profesional
                $filtro_l_p_b = array();
                $filtro_l_p_b[] = array('estado', 1);
                $filtro_l_p_b[] = array('id_lugar_atencion', $request->id_lugar_atencion);
                $filtro_l_p_b[] = array('id_profesional', $profesional->id);
                $lug_prof_box = LugarAtencionBoxProfesional::with('box')->where($filtro_l_p_b)->first();

                $datos['estado'] = 1;
                $datos['msj'] = 'registros';
                $datos['profesional'] = $profesional;
                $datos['horario'] = $horario;
                $datos['horario_data'] = $horario_data;
                $datos['especialidad'] = $especialidad;
                $datos['tipo_especialidad'] = $tipo_especialidad;
                $datos['sub_tipo_especialidad'] = $sub_tipo_especialidad;
                $datos['examen_tipo'] = $examen_tipo;
                $datos['tipo_agendas'] = $tipo_agendas;
                $datos['lug_prof_box'] = $lug_prof_box;
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

	public function administracion_asistente()
    {
        $asistente = Asistente::where('id_usuario', Auth::user()->id)->first();
        $asistente_tipo = Asistente::where('id_usuario', Auth::user()->id)->first();
        $result_solicitudes = SolicitudController::verSolicitudesSolicitante($asistente->id);
        $solicitudes = '';

        if($result_solicitudes['estado'] == 1)
            $solicitudes = $result_solicitudes['registros'];

        $categorias = array();
        if( Auth::user()->id == 3)
        {

        }
        else
        {
            if($asistente->id_asistente_tipo == "1") // Asistente Publico
            {
            //
            }
            else if($asistente->id_asistente_tipo == "2") // Asistente Jefa
            {
                $filtro = array();
                $filtro[] = array('tipo_empleado',$asistente_tipo->nombre);
                $filtro[] = array('estado',1) ;
                $contrato = ContratoDependiente::where($filtro)->first();
                $id_lugar_atencion = $contrato->id_lugar_atencion;
                $id_institucion = $contrato->id_institucion;

                $lugares_atencion = LugarAtencion::where('id', $id_lugar_atencion)->first();

                $filtro_bodega = array();
                $filtro_bodega[] = array('id_lugar_atencion', $id_lugar_atencion);
                $filtro_bodega[] = array('id_institucion', $id_institucion);
                $bodega = Bodega::where($filtro_bodega)->first();
                $id_bodega = $bodega->id;

                /** CATEGORIA DE BODEGA */
                $filtro_cat = array();
                $filtro_cat[] = array('id_bodega', $id_bodega);
                $categorias = Categoria::where($filtro_cat)->get();
            }
            else if($asistente->id_asistente_tipo == "3") // Asistente Adm
            {

            }
            else if($asistente->id_asistente_tipo == "4") // Asistente Online
            {

            }
            else if($asistente->id_asistente_tipo == "5") // Asistente Consulta
            {

            }
            else
            {

            }

        }


        return view('app.asistente.administracion_asistente')->with([
            'solicitudes' => $solicitudes,
            'categorias' => $categorias,
        ]);
    }

    /*Asistente Online*/
    public function indexon()
    {
        return view('app.asistente_on.escritorio_asistente');
    }

    public function registroPacienteon()
    {
        return view('app.asistente_on.registro_paciente');
    }

    public function perfilon()
    {
        $asistente = Asistente::where('id_usuario', Auth::user()->id)->first();

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


        return view('app.asistente_on.perfil_asistente', [
            'asistente' => $asistente,
            'bancos' => $bancos,
            'liquidacion' => $liquidacion,
            'liqui_principal' => $liqui_principal,
        ]);
    }

    public function buscar_pacienteon()
    {
        $asistente = Asistente::where('id_usuario', Auth::user()->id)->first();


        /** cargar lugar atencion por asistentes_lugar_atencion */
        $lugares_atencion_1 = AsistenteLugarAtencion::where('id_asistente', $asistente->id)->where('estado', 1)->pluck('id_lugar_atencion')->toArray();

        /** cargar lugar atencion por profesionales_asistentes */
        $lista_profesional = ProfesionalAsistente::where('id_asistente', $asistente->id)->pluck('id_profesional')->toArray();
        $lugares_atencion_2 = ProfesionalesLugaresAtencion::where('estado', 1)-> whereIn('id_profesional', $lista_profesional)->pluck('id_lugar_atencion')->toArray();

        $lugares_atencion_3 = array_merge($lugares_atencion_1, $lugares_atencion_2);

        $url = 'app.asistente_on.buscar_paciente'; // online
        $array_data = array(
            'asistente' => $asistente,
            'lugares_atencion' => $lugares_atencion_3,
        );

        return view($url, $array_data);

        // $asistente = Asistente::where('id_usuario', Auth::user()->id)->first();
        // return view('app.asistente_on.buscar_paciente', ['asistente' => $asistente]);
    }

    public function reservar_horaon()
    {
        return view('app.asistente_on.buscador_profesional');
    }

    public function mis_profesionaleson()
    {
        $array_data = array();
        $asistente = Asistente::where('id_usuario', Auth::user()->id)->first();
        $region = Region::all();
        $prevision = Prevision::all();

        if (!isset($asistente))
            return view('auth.Registros.registro_asistente')->with(['region' => $region, 'prevision' => $prevision]);

        $asistente_tipo = AsistenteTipo::where('id',$asistente->id_asistente_tipo)->first();
        $profesion_oficio = ProfesionOficio::all();

        /** cargar lugar atencion por asistentes_lugar_atencion */
        $lugares_atencion_1 = AsistenteLugarAtencion::where('id_asistente', $asistente->id)->where('estado', 1)->pluck('id_lugar_atencion')->toArray();

        /** cargar lugar atencion por profesionales_asistentes */
        $lista_profesional = ProfesionalAsistente::where('id_asistente', $asistente->id)->pluck('id_profesional')->toArray();
        $lugares_atencion_2 = ProfesionalesLugaresAtencion::where('estado', 1)-> whereIn('id_profesional', $lista_profesional)->pluck('id_lugar_atencion')->toArray();

        /** array de lugares de atencion */
        $lugares_atencion_3 = array_merge($lugares_atencion_1, $lugares_atencion_2);

        /** lugares de atencion */
        $lugares_atencion = LugarAtencion::whereIn('id', $lugares_atencion_3)->get();


        $prof_lugar_atencion = ProfesionalesLugaresAtencion::where('estado', 1)-> whereIn('id_profesional', $lista_profesional)->pluck('id_profesional')->toArray();

        $profesionales_temp_array = array_merge($lista_profesional, $prof_lugar_atencion);

        $profesionales = Profesional::whereIn('id', $profesionales_temp_array)->get();


        $reg_confirmacion_hora = RegistroConfirmacionHoraAgenda::where('estado',1)->get();
        $tipo_bonos = TipoBono::where('estado', 1)->get();

        $url = 'app.asistente_cm_publico.escritorio_asistente'; // institucion
        $array_data = array(
            'asistente' => $asistente,
            'prevision' => $prevision,
            'profesionales' => $profesionales,
            'lugares_atencion' => $lugares_atencion,
            // 'reg_confirmacion_hora' => $reg_confirmacion_hora,
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

    public function getEspecialidadon(Request $request)
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

        return view('app.asistente_on.buscador_profesional', ['profesional' => $profesional]);
    }

    public function getProfesionalon(Request $request)
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

        return view('app.asistente_on.buscador_profesional', ['profesional' => $profesional]);
    }

    public function getVideoConsultaon(Request $request)
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

        return view('app.asistente_on.buscador_profesional', ['profesional' => $profesional]);
    }

    public function agendaPorProfesional()
    {
        $asistente = Asistente::where('id_usuario', Auth::user()->id)->first();
        $lugares_atencion = $asistente->LugarAtencion()->get();
        $profesional = $asistente->Profesionales()->get();
        $conteo_prof = 0;

        if($lugares_atencion->count()>0 || $profesional->count()>0)
        {
            foreach ($profesional as $key => $value)
            {
                $conteo_prof++;
            }

            if($conteo_prof == 0)
            {
                $profesional_lugar_array = ProfesionalesLugaresAtencion::where('id_lugar_atencion', $lugares_atencion[0]->id)
                                                                    ->pluck('id_profesional')
                                                                    ->toArray();

                $profesional = Profesional::whereIn('id', $profesional_lugar_array)->get();
                foreach($profesional as $p){
                    $p->nombre = strtoupper($p->nombre);
                    $p->apellido_uno = strtoupper($p->apellido_uno);
                    $p->apellido_dos = strtoupper($p->apellido_dos);
                }
            }

            foreach ($profesional as $key_tipo_agenda => $value_tipo_agenda)
				{
					$registro_tipo_agenda = ProfesionalHorario::where('id_profesional', $value_tipo_agenda->id)->where('id_lugar_atencion', $lugares_atencion[0]->id)->orderBy('id', 'ASC')->get();

					$registro_tipo_agenda_cantidad = ProfesionalHorario::where('id_profesional', $value_tipo_agenda->id)->where('id_lugar_atencion', $lugares_atencion[0]->id)->count();

					if($registro_tipo_agenda_cantidad > 0)
					{
						$profesional[$key_tipo_agenda]['id_tipo_agenda'] = $registro_tipo_agenda[0]->tipo_agenda;
					}
					else
					{
						$profesional[$key_tipo_agenda]['id_tipo_agenda'] = 0;
					}
				}

            $reg_confirmacion_hora = RegistroConfirmacionHoraAgenda::where('estado',1)->get();
            $prevision = Prevision::all();
            $region = Region::all();
            $profesion_oficio = ProfesionOficio::all();
            $tipo_bonos = TipoBono::where('estado', 1)->get();

            return view('app.asistente.agenda_por_profesional')->with([
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
        else
        {
            $mensaje = 'Usted No esta asociada a ningun lugar de atencion o a profesionales';
            return back()->with('error', $mensaje)->withInput();
        }

    }

    public function agendar_hora_nuevo_paciente(Request $request)
    {
        try {
            $datos = array();
            $error = array();
            $valido = 1;

            /** validacion de correo en paciente */
            $temp_valid_email = Paciente::where(DB::raw('UPPER(email)'), mb_strtoupper($request->reserva_hora_email))->count();

            if($temp_valid_email == 0)
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
                $paciente->rut = $request->rut_paciente_reserva;
                $paciente->nombres = $request->reserva_hora_nombre;
                $paciente->apellido_uno = $request->reserva_hora_primer_apellido;
                $paciente->apellido_dos = $request->reserva_hora_segundo_apellido;
                $paciente->sexo = $request->reserva_hora_sexo;
                // $paciente->profesion = $request->reserva_hora_profesion;
                try {
                    if (strpos($request->reserva_hora_fecha_nac, '/') !== false) {
                        // Si la fecha tiene el formato dd/mm/yyyy
                        $fechaConvertida = Carbon::createFromFormat('d/m/Y', $request->reserva_hora_fecha_nac)->format('Y-m-d');
                    } else {
                        // Si ya está en formato yyyy-mm-dd
                        $fechaConvertida = Carbon::createFromFormat('Y-m-d', $request->reserva_hora_fecha_nac)->format('Y-m-d');
                    }
                } catch (\Exception $e) {
                    return $e->getMessage();
                }

                $paciente->fecha_nac = $fechaConvertida;

                $paciente->id_prevision = $request->reserva_hora_convenio;

                $permitted_chars = '#\qwertyuiopasdfghjkklzxcvbnm123467890ABCDEFGHIJKLMNOPQRSTUVWXYZ&=';
                $temp = substr(str_shuffle($permitted_chars), 0, 10);

                if( (\Carbon\Carbon::parse($request->fecha_nac)->age) < 18 && !empty($request->reserva_hora_email))
                {
                    // $paciente->email = $temp.'@med-sdi.cl';
                    $paciente->email = PacienteController::generarEmailPacienteTemporal($request->reserva_hora_nombre,$request->reserva_hora_primer_apellido,$request->reserva_hora_segundo_apellido);
                }
                else
                {
                    if( (\Carbon\Carbon::parse($request->fecha_nac)->age) > 18 )
                    {
                        if($request->dependiente == 1)
                        {
                            if(!empty($request->reserva_hora_email))
                            {
                                $paciente->email = $request->reserva_hora_email;
                            }
                            else
                            {
                                // $paciente->email = $temp.'@med-sdi.cl';
                                $paciente->email = PacienteController::generarEmailPacienteTemporal($request->reserva_hora_nombre,$request->reserva_hora_primer_apellido,$request->reserva_hora_segundo_apellido);
                            }
                        }
                        else if($request->dependiente == 0)
                        {
                            if( $request->reserva_result_codigo_validacion == 1 )
                            {
                                if(!empty($request->reserva_hora_email))
                                {
                                    $paciente->email = $request->reserva_hora_email;
                                }
                                else
                                {
                                    // $paciente->email = $temp.'@med-sdi.cl';
                                    $paciente->email = PacienteController::generarEmailPacienteTemporal($request->reserva_hora_nombre,$request->reserva_hora_primer_apellido,$request->reserva_hora_segundo_apellido);
                                }
                            }
                            else
                            {
                                $paciente->email = $request->reserva_hora_email;
                            }
                        }
                    }
                    else
                    {
                        // $paciente->email = $temp.'@med-sdi.cl';
                        $paciente->email = PacienteController::generarEmailPacienteTemporal($request->reserva_hora_nombre,$request->reserva_hora_primer_apellido,$request->reserva_hora_segundo_apellido);
                    }
                }

                // $paciente->telefono_uno = '569';
                if( !empty($request->reserva_hora_telefono) )
                    $paciente->telefono_uno = $request->reserva_hora_telefono;
                else
                    $paciente->telefono_uno = '569';
                if( (\Carbon\Carbon::parse($fechaConvertida)->age) < 18 && $request->reserva_representante_nuevo_exitente == 1)
                {
                    $representante_temp = Paciente::find($request->reserva_representante_id);
                    if(!empty($representante_temp->telefono_uno))
                        $paciente->telefono_uno = $representante_temp->telefono_uno;
                }
                else if( (\Carbon\Carbon::parse($fechaConvertida)->age) < 18 && $request->reserva_representante_nuevo_exitente == 0)
                {
                    if(!empty($reserva_hora_representante_telefono_uno))
                    $paciente->telefono_uno = $request->reserva_hora_representante_telefono_uno;;
                }
                else
                {
                    if( (\Carbon\Carbon::parse($request->fecha_nac)->age) > 18 && $request->dependiente == 0 && !empty($request->reserva_hora_telefono) )
                    {
                        $paciente->telefono_uno = $request->reserva_hora_telefono;
                    }
                    else if( (\Carbon\Carbon::parse($request->fecha_nac)->age) > 18 && $request->dependiente == 0 && empty($request->reserva_hora_telefono) && $request->reserva_result_codigo_validacion == 0 )
                    {
                        $paciente->telefono_uno = '569';
                    }
                    else if( (\Carbon\Carbon::parse($request->fecha_nac)->age) > 18 && $request->dependiente == 0 && !empty($request->reserva_hora_telefono) && $request->reserva_result_codigo_validacion == 1 )
                    {
                        $paciente->telefono_uno = $request->reserva_hora_telefono;
                    }
                    else if( (\Carbon\Carbon::parse($request->fecha_nac)->age) > 18 && $request->dependiente == 1 )
                    {
                        if( !empty($request->reserva_hora_telefono) )
                            $paciente->telefono_uno = $request->reserva_hora_telefono;
                        else
                            $paciente->telefono_uno = '569';
                    }
                }

                $paciente->id_direccion = $direccion->id;

                if ($paciente->save())
                {
                    $datos['paciente']['estado'] = 1;
                    $datos['paciente']['msj'] = 'Paciente registrado';

                    /** CREACION DE USUARIO  */
                    if( (\Carbon\Carbon::parse($fechaConvertida)->age) >= 18)
                    {
                        // $user = User::where('email', $paciente->email)->first();
                        if( $request->reserva_result_codigo_validacion == 1 )
                        {
                            $temp_rut = $paciente->rut;
                            $temp_rut = str_replace('.','' , $temp_rut);
                            $temp_rut = str_replace('-','' , $temp_rut);
                            $temp_rut = str_replace(' ','' , $temp_rut);
                            /** buscar por rut */
                            $user = User::where(DB::raw('UPPER(email)'), mb_strtoupper($temp_rut))->first();
                        }
                        else
                        {
                            /** buscar por correo */
                            $user = User::where(DB::raw('UPPER(email)'), mb_strtoupper($paciente->email))->first();
                        }

                        if($user == NULL)
                        {
                            $user = new User();
                            $user->name = $paciente->nombres . ' ' .$paciente->apellido_uno . ' ' .$paciente->apellido_dos;

                            if( $request->reserva_result_codigo_validacion == 1 )
                            {
                                $temp_rut = $paciente->rut;
                                $temp_rut = str_replace('.','' , $temp_rut);
                                $temp_rut = str_replace('-','' , $temp_rut);
                                $temp_rut = str_replace(' ','' , $temp_rut);
                                $user->email = $temp_rut;
                            }
                            else
                            {
                                if( strpos($paciente->email, $temp) !== false )
                                {
                                    $temp_rut = $paciente->rut;
                                    $temp_rut = str_replace('.','' , $temp_rut);
                                    $temp_rut = str_replace('-','' , $temp_rut);
                                    $temp_rut = str_replace(' ','' , $temp_rut);
                                    $user->email = $temp_rut;
                                }
                                else
                                    $user->email = $paciente->email;

                            }

                            $pass_temp = random_int(1111,9999);
                            $user->password = Hash::make($pass_temp);

                            if($user->save())
                            {
                                $user->assignRole('Paciente');
                                $paciente->id_usuario = $user->id;
                                if($paciente->save())
                                {
                                    $datos['paciente']['user']['update_paciente'] = 'Paciente actualizado con Usuario.';
                                    if( $request->reserva_result_codigo_validacion == 1 )
                                    {
                                        /** envio de sms */
                                    }
                                    else
                                    {
                                        /** envio de correo de confirmacion  */
                                        $blade = 'bienvenida_paciente_usuario';
                                        $to = array(
                                                array('email' => $paciente->email,'name' => $paciente->nombres . ' ' .$paciente->apellido_uno . ' ' .$paciente->apellido_dos),
                                            );
                                        $cc = array();
                                        $bcc = array();
                                        $asunto = 'MED-SDI - Bienvenido!';
                                        $body = array(
                                                    'nombre'=>$paciente->nombres . ' ' .$paciente->apellido_uno . ' ' .$paciente->apellido_dos,
                                                    'user' => $paciente->email,
                                                    'pass' => $pass_temp
                                                    );
                                        $archivo = '';/** pendiente */
                                        $id_institucion = '';

                                        $result_mail =  SendMailController::envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, $id_institucion);

                                        if($result_mail['estado'])
                                        {
                                            $datos['paciente']['user']['mail']['estado'] = 1;
                                            $datos['paciente']['user']['mail']['msj'] = 'Notificacion de bienvenida enviado';
                                        }
                                        else
                                        {
                                            $datos['paciente']['user']['mail']['estado'] = 0;
                                            $datos['paciente']['user']['mail']['msj'] = 'Falle en envio de Notificacion de bienvenida';
                                        }
                                        /** cerrar envio de correo de confirmacion  */
                                    }
                                }
                            }
                        }
                        else
                        {
                            $user->assignRole('Paciente');
                            $paciente->id_usuario = $user->id;
                            if($paciente->save())
                            {
                                $datos['paciente']['user']['update_paciente'] = 'Paciente actualizado con Usuario.';
                            }
                        }
                    }
                    /** CIERRE CREACION DE USUARIO  */

                    /** REGISTRO DE REPRESENTANTE */
                    if( (\Carbon\Carbon::parse($fechaConvertida)->age) < 18 || $request->dependiente == 1 )
                    {
                        $id_representante = '';
                        $id_user_representante = '';

                        if($request->reserva_representante_nuevo_exitente == 0)
                        {
                            $representante_direccion = $request->reserva_hora_representante_direccion;
                            $representante_numero_dir = $request->reserva_hora_representante_numero_dir;
                            $representante_region_agregar = $request->reserva_hora_representante_region_agregar;
                            $representante_ciudad_agregar = $request->reserva_hora_representante_ciudad_agregar;

                            $direccion_representante = new Direccion();
                            $direccion_representante->direccion = $representante_direccion;
                            $direccion_representante->numero_dir = $representante_numero_dir;
                            $direccion_representante->id_ciudad = $representante_ciudad_agregar;
                            $direccion_representante->save();


                            $representante_rut = $request->reserva_hora_representante_rut;
                            $representante_nombres_paciente = $request->reserva_hora_representante_nombres_paciente;
                            $representante_apellido_uno = $request->reserva_hora_representante_apellido_uno;
                            $representante_apellido_dos = $request->reserva_hora_representante_apellido_dos;

                            if (strpos($request->reserva_hora_representante_fecha_nac, '/') !== false) {
                                // Si la fecha tiene el formato dd/mm/yyyy
                                $fechaConvertidaRepresentante = Carbon::createFromFormat('d/m/Y', $request->reserva_hora_representante_fecha_nac)->format('Y-m-d');
                            } else {
                                // Si ya está en formato yyyy-mm-dd
                                $fechaConvertidaRepresentante = Carbon::createFromFormat('Y-m-d', $request->reserva_hora_representante_fecha_nac)->format('Y-m-d');
                            }
                            $representante_fecha_nac = $fechaConvertidaRepresentante;

                            $representante_sexo = $request->reserva_hora_representante_sexo;
                            $representante_convenio = $request->reserva_hora_representante_convenio;
                            $representante_correo = $request->reserva_hora_representante_correo;
                            $representante_telefono_uno = $request->reserva_hora_representante_telefono_uno;
                            $representante_result_codigo_validacion = $request->reserva_hora_representante_result_codigo_validacion;

                            $permitted_chars = '#\qwertyuiopasdfghjkklzxcvbnm123467890ABCDEFGHIJKLMNOPQRSTUVWXYZ&=';
                            $representante_temp = substr(str_shuffle($permitted_chars), 0, 10);


                            $paciente_representante = new Paciente();
                            $paciente_representante->rut = $representante_rut;
                            $paciente_representante->nombres = $representante_nombres_paciente;
                            $paciente_representante->apellido_uno = $representante_apellido_uno;
                            $paciente_representante->apellido_dos = $representante_apellido_dos;
                            $paciente_representante->sexo = $representante_sexo;
                            // $paciente_representante->profesion = $request->reserva_hora_profesion;
                            $paciente_representante->fecha_nac = $representante_fecha_nac;
                            $paciente_representante->id_prevision = $representante_convenio;

                            if( $representante_result_codigo_validacion == 1 && empty($paciente_representante->email))
                            {
                                // $paciente_representante->email = $representante_temp.'@med-sdi.cl';
                                $paciente_representante->email = PacienteController::generarEmailPacienteTemporal($representante_nombres_paciente,$representante_apellido_uno,$representante_apellido_dos);
                            }
                            else if( $representante_result_codigo_validacion == 1 && !empty($paciente_representante->email))
                                $paciente_representante->email = $representante_correo;
                            else
                                $paciente_representante->email = $representante_correo;

                            $paciente_representante->telefono_uno = $representante_telefono_uno;
                            $paciente_representante->id_direccion = $direccion_representante->id;

                            if ($paciente_representante->save())
                            {
                                $datos['paciente_representante']['estado'] = 1;
                                $datos['paciente_representante']['msj'] = 'Paciente registrado';

                                $id_representante = $paciente_representante->id;
                                /** CREACION DE USUARIO  */
                                // $user_representante = User::where('email', $paciente_representante->email)->first();
                                if( $request->reserva_result_codigo_validacion == 1 )
                                {
                                    $temp_representante_rut = $paciente_representante->rut;
                                    $temp_representante_rut = str_replace('.','' , $temp_representante_rut);
                                    $temp_representante_rut = str_replace('-','' , $temp_representante_rut);
                                    $temp_representante_rut = str_replace(' ','' , $temp_representante_rut);
                                    /** buscar por rut */
                                    $user_representante = User::where(DB::raw('UPPER(email)'), mb_strtoupper($temp_representante_rut))->first();
                                }
                                else
                                {
                                    /** buscar por correo */
                                    $user_representante = User::where(DB::raw('UPPER(email)'), mb_strtoupper($paciente_representante->email))->first();
                                }


                                if($user_representante == NULL)
                                {
                                    $user_representante = new User();
                                    $user_representante->name = $representante_nombres_paciente . ' ' .$representante_apellido_uno . ' ' .$representante_apellido_dos;

                                    if(!empty($representante_correo))
                                        $user_representante->email = $representante_correo;
                                    else
                                    {
                                        $temp_representante_rut = $representante_rut;
                                        $temp_representante_rut = str_replace('.','' , $temp_representante_rut);
                                        $temp_representante_rut = str_replace('-','' , $temp_representante_rut);
                                        $temp_representante_rut = str_replace(' ','' , $temp_representante_rut);
                                        $user_representante->email = $temp_representante_rut;
                                    }

                                    $pass_temp_repre = random_int(1111,9999);
                                    $user_representante->password = Hash::make($pass_temp_repre);

                                    if($user_representante->save())
                                    {
                                        $id_user_representante = $user_representante->id;
                                        $user_representante->assignRole('Paciente');
                                        $paciente_representante->id_usuario = $user_representante->id;
                                        if($paciente_representante->save())
                                        {
                                            $datos['paciente_representante']['user']['update_paciente'] = 'Paciente actualizado con Usuario.';
                                            if( $request->reserva_result_codigo_validacion == 1 )
                                            {
                                                /** envio de sms */
                                            }
                                            else
                                            {
                                                if(strpos($paciente_representante->email, $representante_temp) !== false)
                                                {
                                                    /** envio de sms */
                                                }
                                                else
                                                {
                                                    /** envio de correo de confirmacion  */
                                                    $blade = 'bienvenida_paciente_usuario';
                                                    $to = array(
                                                            array('email' => $representante_correo,'name' => $representante_nombres_paciente . ' ' .$representante_apellido_uno . ' ' .$representante_apellido_dos),
                                                        );
                                                    $cc = array();
                                                    $bcc = array();
                                                    $asunto = 'MED-SDI - Bienvenido!';
                                                    $body = array(
                                                                'nombre'=>$representante_nombres_paciente . ' ' .$representante_apellido_uno . ' ' .$representante_apellido_dos,
                                                                'user' => $representante_correo,
                                                                'pass' => $pass_temp_repre
                                                                );
                                                    $archivo = '';/** pendiente */
                                                    $id_institucion = '';

                                                    $result_mail =  SendMailController::envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, $id_institucion);

                                                    if($result_mail['estado'])
                                                    {
                                                        $datos['paciente_representante']['user']['mail']['estado'] = 1;
                                                        $datos['paciente_representante']['user']['mail']['msj'] = 'Notificacion de bienvenida enviado';
                                                    }
                                                    else
                                                    {
                                                        $datos['paciente_representante']['user']['mail']['estado'] = 0;
                                                        $datos['paciente_representante']['user']['mail']['msj'] = 'Falle en envio de Notificacion de bienvenida';
                                                    }
                                                    /** cerrar envio de correo de confirmacion  */
                                                }
                                            }
                                        }
                                    }
                                }
                                else
                                {
                                    $user->assignRole('Paciente');
                                    $paciente_representante->id_usuario = $user->id;

                                    $id_user_representante = $user->id;;

                                    if($paciente_representante->save())
                                    {
                                        $datos['paciente_representante']['user']['update_paciente'] = 'Paciente actualizado con Usuario.';
                                    }
                                }
                            }
                        }
                        else
                        {
                            $id_representante = $request->reserva_representante_id;
                            $id_user_representante = $request->reserva_representante_id_usuario;
                        }

                        $representante_relacion = $request->reserva_hora_representante_agregar_relacion;

                        /** CREAR RELACION DE DEPENDENCIA */
                        $registro_dependencia = new PacientesDependientes();

                        $registro_dependencia->id_responsable = $id_representante;
                        $registro_dependencia->id_paciente = $paciente->id;
                        $registro_dependencia->relacion = $representante_relacion;
                        $registro_dependencia->tipo_dependencia = 1;
                        $registro_dependencia->fecha_inicio = date('Y-m-d');
                        $registro_dependencia->comentario = '';
                        // $registro_dependencia->confirmacion_inscripcion = $request->confirmacion_inscripcion;
                        // $registro_dependencia->id_log_users_devices = $request->id_log_users_devices;
                        // $registro_dependencia->otro = $request->otro;
                        $registro_dependencia->id_user = $id_user_representante;
                        $registro_dependencia->estado = 1;

                        if($registro_dependencia->save())
                        {
                            $datos['registro_dependencia']['estado'] = 1;
                            $datos['registro_dependencia']['msj'] = 'Dependencia creada con exito.';
                        }
                        else
                        {
                            $datos['registro_dependencia']['estado'] = 0;
                            $datos['registro_dependencia']['msj'] = 'Problemas en el registro de Dependencia.';
                        }
                        /** CIERRE CREAR RELACION DE DEPENDENCIA */

                    }
                    /** CIERRE REGISTRO DE REPRESENTANTE */


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

                    $texto_alias_examen = '';
                    # TIPO HORA MEDICA
                    switch ($request->tipo_hora_medica) {
                        case 'C': // 1
                            $texto_alias_examen = 'Consulta';
                            break;
                        case 'D': // 2
                            $texto_alias_examen = 'Consulta Dental';
                            break;
                        case 'T': // 3
                            $texto_alias_examen = 'Consulta Telemedicina';
                            break;
                        case 'E': // 4
                            $texto_alias_examen = 'Consulta Examen';
                            break;
                        case 'P': // 5
                            $texto_alias_examen = 'Procedimiento';
                            break;
                    }

                    $hora_medica = new HoraMedica();

                    $hora_medica->id_paciente = $paciente->id;
                    $hora_medica->id_profesional = $profesional->id;
                    $hora_medica->id_asistente = $asistente->id;
                    $hora_medica->id_estado = 1;
                    $hora_medica->id_lugar_atencion = $request->id_lugar_atencion;
                    $hora_medica->fecha_consulta = \Carbon\Carbon::parse($request->fecha_consulta)->format('Y-m-d');

                    $hora_medica->hora_inicio = \Carbon\Carbon::parse($request->fecha_consulta)->format('H:i:s');
                    $hora_medica->hora_termino = \Carbon\Carbon::parse($request->fecha_consulta)->addMinutes($tiempo_consulta)->subSecond()->format('H:i:s');

                    $hora_medica->tipo_hora_medica = $request->tipo_hora_medica;
                    $hora_medica->alias_examen = $texto_alias_examen;
                    $hora_medica->id_procedimiento = $request->reserva_hora_id_procedimiento;

                    $hora_medica->descripcion = $hora_medica->descripcion = $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos;

                    if( (\Carbon\Carbon::parse($fechaConvertida)->age) < 18 || $request->dependiente == 1 )
                    {
                        $hora_medica->acomp_representante = 1;
                        $hora_medica->acomp_acompanante = 0;
                        $hora_medica->acomp_lista = '';

                        $hora_medica->autorizacion_atencion = '1234567890';
                    }

                    if ($hora_medica->save())
                    {
                        $datos['estado'] = 1;
                        $datos['msj'] = 'Hora Medica creada';
                        $datos['hora_medica'] = $hora_medica;

                        $lugar_atencion = LugarAtencion::find($request->id_lugar_atencion);

                        /** envio de correo de confirmacion INSTITUCION */
                        $blade = 'hora_agendada';
                        // if( (\Carbon\Carbon::parse($fechaConvertida)->age) < 18 || $request->dependiente == 1 )
                        // {
                        //     /** buscar representante de paciente */
                        //     $to = array(
                        //         array('email' => $paciente->email,'name' =>  $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos),
                        //     );
                        // }
                        // else
                        {
                            $to = array(
                                array('email' => $paciente->email,'name' =>  $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos),
                            );
                        }
                        $cc = array();
                        $bcc = array();
                        $asunto = 'MED-SDI - Nueva Hora Agendada';
                        $body = array(
                            'nombre_paciente'=> $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos,
                            'fecha'=> $hora_medica->fecha_consulta,
                            'hora'=> $hora_medica->hora_inicio,
                            'profesional_nombre'=> $profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos,
                            'profesional_especialidad'=> $profesional->Especialidad()->first()->nombre ? $profesional->Especialidad()->first()->nombre : '',
                            'profesional_tipo_especialidad'=> $profesional->TipoEspecialidad()->first()->nombre ? $profesional->TipoEspecialidad()->first()->nombre : '',
                            'profesional_sub_tipo_especialidad'=> $profesional->subTipoEspecialidad()->exists() ? $profesional->subTipoEspecialidad()->first()->nombre : '',
                            // 'institucion'=> $nombre_institucion,
                            'lugar_atencion'=>$lugar_atencion ? $lugar_atencion->nombre : '',
                            'direccion'=> $lugar_atencion ? $lugar_atencion->Direccion()->first()->direccion.' '.$lugar_atencion->Direccion()->first()->numero_dir.', '.$lugar_atencion->Direccion()->first()->Ciudad()->first()->nombre : '',
                        );
                        $archivo = '';/** pendiente */
                        $id_institucion = '';

                        $result_mail =  SendMailController::envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, $id_institucion);

                        if($result_mail['estado'])
                        {
                            $datos['mail']['institucion']['estado'] = 1;
                            $datos['mail']['institucion']['msj'] = 'Notificacion de bienvenida enviado';
                        }
                        else
                        {
                            $datos['mail']['institucion']['estado'] = 0;
                            $datos['mail']['institucion']['msj'] = 'Falle en envio de Notificacion de bienvenida';
                        }
                    }
                    else
                    {
                        $datos['estado'] = 0;
                        $datos['msj'] = 'Problema al crear Hora Medica';
                    }
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'Problema al crear Paciente';
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'el correo ya esta siendo utilizado por otro paciente.';
            }

            return $datos;
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }

    public function agendar_hora_nuevo_paciente_prereserva(Request $request)
    {
        try {
            $datos = array();
            $error = array();
            $valido = 1;

            /** validacion de correo en paciente */
            $temp_valid_email = Paciente::where(DB::raw('UPPER(email)'), mb_strtoupper($request->reserva_hora_email))->count();

            if($temp_valid_email == 0)
            {

                $user = Auth::user()->id;
                $paciente = new Paciente();
                $asistente = Asistente::where('id_usuario', Auth::user()->id)->first();
                $profesional = Profesional::where('id',$request->id_profesional)->first();

                $paciente->token = md5(uniqid());
                $paciente->rut = $request->rut_paciente_reserva;
                $paciente->nombres = $request->reserva_hora_nombre;
                $paciente->apellido_uno = $request->reserva_hora_primer_apellido;
                $paciente->apellido_dos = $request->reserva_hora_segundo_apellido;
                $paciente->sexo = 'M';
                // // $paciente->profesion = $request->reserva_hora_profesion;
                // try {
                //     if (strpos($request->reserva_hora_fecha_nac, '/') !== false) {
                //         // Si la fecha tiene el formato dd/mm/yyyy
                //         $fechaConvertida = Carbon::createFromFormat('d/m/Y', $request->reserva_hora_fecha_nac)->format('Y-m-d');
                //     } else {
                //         // Si ya está en formato yyyy-mm-dd
                //         $fechaConvertida = Carbon::createFromFormat('Y-m-d', $request->reserva_hora_fecha_nac)->format('Y-m-d');
                //     }
                // } catch (\Exception $e) {
                //     return $e->getMessage();
                // }

                // $paciente->fecha_nac = $fechaConvertida;

                $paciente->id_prevision = 1;

                // $permitted_chars = '#\qwertyuiopasdfghjkklzxcvbnm123467890ABCDEFGHIJKLMNOPQRSTUVWXYZ&=';
                // $temp = substr(str_shuffle($permitted_chars), 0, 10);

                $paciente->email = $request->reserva_hora_email;

                // $paciente->telefono_uno = '569';
                if( !empty($request->reserva_hora_telefono) )
                    $paciente->telefono_uno = $request->reserva_hora_telefono;
                else
                    $paciente->telefono_uno = '+569';

                if ($paciente->save())
                {
                    $datos['paciente']['estado'] = 1;
                    $datos['paciente']['msj'] = 'Paciente registrado';

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

                    $texto_alias_examen = '';
                    # TIPO HORA MEDICA
                    switch ($request->tipo_hora_medica) {
                        case 'C': // 1
                            $texto_alias_examen = 'Consulta';
                            break;
                        case 'D': // 2
                            $texto_alias_examen = 'Consulta Dental';
                            break;
                        case 'T': // 3
                            $texto_alias_examen = 'Consulta Telemedicina';
                            break;
                        case 'E': // 4
                            $texto_alias_examen = 'Consulta Examen';
                            break;
                        case 'P': // 5
                            $texto_alias_examen = 'Procedimiento';
                            break;
                    }

                    $hora_medica = new HoraMedica();

                    $hora_medica->id_paciente = $paciente->id;
                    $hora_medica->id_profesional = $profesional->id;
                    $hora_medica->id_asistente = $asistente->id;
                    $hora_medica->id_estado = 16; //PRE RESERVA
                    $hora_medica->id_lugar_atencion = $request->id_lugar_atencion;
                    $hora_medica->fecha_consulta = \Carbon\Carbon::parse($request->fecha_consulta)->format('Y-m-d');

                    $hora_medica->hora_inicio = \Carbon\Carbon::parse($request->fecha_consulta)->format('H:i:s');
                    $hora_medica->hora_termino = \Carbon\Carbon::parse($request->fecha_consulta)->addMinutes($tiempo_consulta)->subSecond()->format('H:i:s');

                    $hora_medica->tipo_hora_medica = $request->tipo_hora_medica;
                    $hora_medica->alias_examen = $texto_alias_examen;
                    $hora_medica->id_procedimiento = $request->reserva_hora_id_procedimiento;

                    $hora_medica->descripcion = $hora_medica->descripcion = $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos;

                    if ($hora_medica->save())
                    {
                        $datos['estado'] = 1;
                        $datos['msj'] = 'Hora Medica creada';
                        $datos['hora_medica'] = $hora_medica;

                        $lugar_atencion = LugarAtencion::find($request->id_lugar_atencion);

                        if(!empty($paciente->email))
                        {

                            /** envio de correo de confirmacion INSTITUCION */
                            $blade = 'completar_datos_usuarios';

                            $to = array(
                                array('email' => $paciente->email,'name' =>  $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos),
                            );

                            $cc = array();
                            $bcc = array();
                            $asunto = 'MED-SDI - Pre Agendada';
                            $body = array(
                                'nombre_paciente'=> $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos,
								'token_paciente'=> $paciente->token,
                                'fecha'=> $hora_medica->fecha_consulta,
                                'hora'=> $hora_medica->hora_inicio,
                                'profesional_nombre'=> $profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos,
                                'profesional_especialidad'=> $profesional->Especialidad()->first()->nombre ? $profesional->Especialidad()->first()->nombre : '',
                                'profesional_tipo_especialidad'=> $profesional->TipoEspecialidad()->first()->nombre ? $profesional->TipoEspecialidad()->first()->nombre : '',
                                'profesional_sub_tipo_especialidad'=> $profesional->subTipoEspecialidad()->exists() ? $profesional->subTipoEspecialidad()->first()->nombre : '',
                                // 'institucion'=> $nombre_institucion,
                                'lugar_atencion'=>$lugar_atencion ? $lugar_atencion->nombre : '',
                                'direccion'=> $lugar_atencion ? $lugar_atencion->Direccion()->first()->direccion.' '.$lugar_atencion->Direccion()->first()->numero_dir.', '.$lugar_atencion->Direccion()->first()->Ciudad()->first()->nombre : '',
                            );
                            $archivo = '';/** pendiente */
                            $id_institucion = '';

                            $result_mail =  SendMailController::envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, $id_institucion);

                            if($result_mail['estado'])
                            {
                                $datos['mail']['paciente']['estado'] = 1;
                                $datos['mail']['paciente']['msj'] = 'Notificacion de bienvenida enviado';
                            }
                            else
                            {
                                $datos['mail']['paciente']['estado'] = 0;
                                $datos['mail']['paciente']['msj'] = 'Falle en envio de Notificacion de bienvenida';
                            }
                        }
                        else
                        {
                            $datos['mail']['paciente']['estado'] = 0;
                            $datos['mail']['paciente']['msj'] = 'Sin correo  de paciente';
                        }
                    }
                    else
                    {
                        $datos['estado'] = 0;
                        $datos['msj'] = 'Problema al crear Hora Medica';
                    }
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'Problema al crear Paciente';
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'el correo ya esta siendo utilizado por otro paciente.';
            }

            return $datos;
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }

    public function agendar_hora_extra_nuevo_paciente_prereserva(Request $request)
    {
        try {

            $datos = array();
            $error = array();
            $valido = 1;

            $paciente = Paciente::find($request->id_paciente);
            $profesional = Profesional::find($request->id_profesional);

            $datos['paciente']['estado'] = 1;
            $datos['paciente']['msj'] = 'Paciente registrado';

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

            $texto_alias_examen = '';
            # TIPO HORA MEDICA
            switch ($request->tipo_hora_medica) {
                case 'C': // 1
                    $texto_alias_examen = 'Consulta';
                    break;
                case 'D': // 2
                    $texto_alias_examen = 'Consulta Dental';
                    break;
                case 'T': // 3
                    $texto_alias_examen = 'Consulta Telemedicina';
                    break;
                case 'E': // 4
                    $texto_alias_examen = 'Consulta Examen';
                    break;
                case 'P': // 5
                    $texto_alias_examen = 'Procedimiento';
                    break;
            }

            $hora_medica = new HoraMedica();

            $hora_medica->id_paciente = $paciente->id;
            $hora_medica->id_profesional = $profesional->id;
            $hora_medica->id_asistente = $request->id_asistente;
            // $hora_medica->id_estado = 16; //PRE RESERVA
            $hora_medica->id_estado = 1; // AGENDADA
            $hora_medica->id_lugar_atencion = $request->id_lugar_atencion;
            $hora_medica->fecha_consulta = \Carbon\Carbon::parse($request->fecha_consulta)->format('Y-m-d');

            $hora_medica->hora_inicio = \Carbon\Carbon::parse($request->fecha_consulta)->format('H:i:s');
            $hora_medica->hora_termino = \Carbon\Carbon::parse($request->fecha_consulta)->addMinutes($tiempo_consulta)->subSecond()->format('H:i:s');

            $hora_medica->tipo_hora_medica = $request->tipo_hora_medica;
            $hora_medica->alias_examen = $texto_alias_examen;
            $hora_medica->id_procedimiento = $request->reserva_hora_id_procedimiento;

            $hora_medica->descripcion = $hora_medica->descripcion = $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos;

            if ($hora_medica->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'Hora Medica creada';
                $datos['hora_medica'] = $hora_medica;

                $lugar_atencion = LugarAtencion::find($request->id_lugar_atencion);

                if(!empty($paciente->email))
                {

                    /** envio de correo de confirmacion INSTITUCION */
                    $blade = 'completar_datos_usuarios';

                    $to = array(
                        array('email' => $paciente->email,'name' =>  $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos),
                    );

                    $cc = array();
                    $bcc = array();
                    $asunto = 'MED-SDI - Pre Agendada';
                    $body = array(
                        'nombre_paciente'=> $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos,
                        'fecha'=> $hora_medica->fecha_consulta,
                        'hora'=> $hora_medica->hora_inicio,
                        'profesional_nombre'=> $profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos,
                        'profesional_especialidad'=> $profesional->Especialidad()->first()->nombre ? $profesional->Especialidad()->first()->nombre : '',
                        'profesional_tipo_especialidad'=> $profesional->TipoEspecialidad()->first()->nombre ? $profesional->TipoEspecialidad()->first()->nombre : '',
                        'profesional_sub_tipo_especialidad'=> $profesional->subTipoEspecialidad()->exists() ? $profesional->subTipoEspecialidad()->first()->nombre : '',
                        // 'institucion'=> $nombre_institucion,
                        'lugar_atencion'=>$lugar_atencion ? $lugar_atencion->nombre : '',
                        'direccion'=> $lugar_atencion ? $lugar_atencion->Direccion()->first()->direccion.' '.$lugar_atencion->Direccion()->first()->numero_dir.', '.$lugar_atencion->Direccion()->first()->Ciudad()->first()->nombre : '',
                    );
                    $archivo = '';/** pendiente */
                    $id_institucion = '';

                    $result_mail =  SendMailController::envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, $id_institucion);

                    if($result_mail['estado'])
                    {
                        $datos['mail']['paciente']['estado'] = 1;
                        $datos['mail']['paciente']['msj'] = 'Notificacion de bienvenida enviado';
                    }
                    else
                    {
                        $datos['mail']['paciente']['estado'] = 0;
                        $datos['mail']['paciente']['msj'] = 'Falle en envio de Notificacion de bienvenida';
                    }
                }
                else
                {
                    $datos['mail']['paciente']['estado'] = 0;
                    $datos['mail']['paciente']['msj'] = 'Sin correo  de paciente';
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Problema al crear Hora Medica';
            }


            return $datos;
        } catch (\Exception $e) {
            //throw $th;
            var_dump($e->getLine());
            return $e->getMessage();
        }

    }

    public function agendar_horas(Request $request)
    {

        // var_dump($request->all());

        $paciente = paciente::where('id', $request->reserva_hora_id)->first();
        $asistente = Asistente::where('id_usuario', Auth::user()->id)->first();
        $profesional = Profesional::where('id', $request->id_profesional)->first();

        $filtro_tipo_hora_medica = array(1);
        $texto_alias_examen = '';
        # TIPO HORA MEDICA
        switch ($request->tipo_hora_medica) {
            case 'C': // 1
                // $filtro_tipo_hora_medica = array(1);
                $filtro_tipo_hora_medica = array('C');
                $texto_alias_examen = 'Consulta';
                break;
            case 'D': // 2
                // $filtro_tipo_hora_medica = array(2);
                $filtro_tipo_hora_medica = array('D');
                $texto_alias_examen = 'Consulta Dental';
                break;
            case 'T': // 3
                // $filtro_tipo_hora_medica = array(3);
                $filtro_tipo_hora_medica = array('T');
                $texto_alias_examen = 'Consulta Telemedicina';
                break;
            case 'E': // 4
                // $filtro_tipo_hora_medica = array(4);
                $filtro_tipo_hora_medica = array('E');
                $texto_alias_examen = 'Consulta Examen';
                break;
            case 'P': // 5
                // $filtro_tipo_hora_medica = array(4);
                $filtro_tipo_hora_medica = array('P');
                $texto_alias_examen = 'Procedimiento';
                break;
        }

        # ESTADOS DE HORA DE ATENCION
        // 1.  Reservada -> celeste
        // 2.  CONFIRMADO -> verde
        // 3.  Rechazada -> Rojo
        // 4.  Espera -> morado
        // 5.  Realizando-> rosa
        // 6.  Realizada -> Azul
        // 7.  Inasistida -> naranjo
        // 8.  Llamando -> morado (monitor sala espera)
        // validar si paciente tiene otra consulta
        $validar = HoraMedica::where('id_paciente', $paciente->id)
                ->whereIn('id_estado',[1,2,4,5,6,8])
                ->where('id_profesional',$profesional->id)
                ->where('id_lugar_atencion',$request->id_lugar_atencion)
                ->whereIn('tipo_hora_medica',$filtro_tipo_hora_medica)
                ->where('fecha_consulta',\Carbon\Carbon::parse($request->fecha_consulta)->format('Y-m-d'))
                ->first();
        if($validar)
        {
            return json_encode(array(
                'estado' => 'error',
                'id_profesional' => $profesional->id,
                'msj' => 'PACIENTE TIENE HORA AGENDADA PARA ESTE DIA'
            ));
        }
        else
        {

            $hora_cunsulta = \Carbon\Carbon::parse($request->fecha_consulta)->format('H:i:s');

            // DB::enableQueryLog(); // Habilitar el registro de consultas

            $validar = HoraMedica::where('id_paciente', $paciente->id)
                                ->whereIn('id_estado',[1,2,4,5,6,8])
                                ->where('fecha_consulta',\Carbon\Carbon::parse($request->fecha_consulta)->format('Y-m-d'))
                                ->where(function($query) use ($hora_cunsulta) {
                                    $query->whereTime('hora_inicio','>=', $hora_cunsulta)
                                        ->whereTime('hora_termino','<=', $hora_cunsulta);
                                })
                                ->first();

            // $queries = DB::getQueryLog();
            // dd($queries);

            if($validar)
            {
                return json_encode(array(
                        'estado' => 'error',
                        'id_profesional' => $profesional->id,
                        'msj' => 'PACIENTE TIENE HORA AGENDADA PARA ESTE DÍA EN OTRO LUGAR DE ATENCIÓN'
                        ));
            }

        }

        $tiempo_consulta = 15;
        $procedimiento = '';

        if($profesional->id_especialidad == 4 && $profesional->id_tipo_especialidad == 55)
        {
            $procedimiento = $request->procedimiento;
            $proc_bloque = ( !empty($request->proc_bloque)?intval($request->proc_bloque):1 );
            $tiempo_consulta = intval($proc_bloque) * 15;
        }else if($profesional->id_especialidad == 2){
            $procedimiento = $request->procedimiento;
            $proc_bloque = ( !empty($request->proc_bloque)?intval($request->proc_bloque):1 );
            $tiempo_consulta = intval($proc_bloque) * 15;
        }
        else
        {

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
        }

        $hora_medica = new HoraMedica();

        $hora_medica->id_paciente = $request->reserva_hora_id;
        $hora_medica->id_profesional = $profesional->id;
        $hora_medica->id_asistente = $asistente->id;
        $hora_medica->id_estado = '1';
        $hora_medica->fecha_consulta = \Carbon\Carbon::parse($request->fecha_consulta)->format('Y-m-d');

        $hora_medica->hora_inicio = \Carbon\Carbon::parse($request->fecha_consulta)->format('H:i:s');
        $hora_medica->hora_termino = \Carbon\Carbon::parse($request->fecha_consulta)->addMinutes($tiempo_consulta)->subSecond()->format('H:i:s');

        $hora_medica->tipo_hora_medica = $request->tipo_hora_medica;
        $hora_medica->alias_examen = $texto_alias_examen;

        $hora_medica->id_procedimiento = $request->id_procedimiento;

        $hora_medica->descripcion = $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos;
        $hora_medica->observaciones = $request->observaciones;
        $hora_medica->id_lugar_atencion = $request->id_lugar_atencion;

        /**acompañantes */
        $hora_medica->acomp_representante = $request->representante;
        $hora_medica->acomp_acompanante = $request->acompanante;
        if(!empty($request->lista_Acompanante))
        $hora_medica->acomp_lista = json_encode($request->lista_Acompanante);

        $hora_medica->autorizacion_atencion = $request->autorizacion_atencion;
        // $hora_medica->id_log_users_devices = '';

        if (!$hora_medica->save()) {
            return 'error';
        }

        if($request->tipo_hora_medica == 'T')
        {
            $jitsi = JitsiController::jitsiRegistroMeet( $profesional->id, $paciente->id, $hora_medica->id );
            $hora_medica->video_llamada = $jitsi;
        }

        $lugar_atencion = LugarAtencion::find($request->id_lugar_atencion);

        /** menor edad? */
        // $edad = \Carbon\Carbon::parse($paciente->fecha_nac)->diff(\Carbon\Carbon::now())->format('%y');
        // if( $edad < 18 )
        // {

        //     if( $request->autorizacion_atencion == 1 )
        //     {
        //         $responsable_temp = PacientesDependientes::where('id_paciente', $paciente->id)->first();
        //         $responsable = Paciente::find($responsable_temp->id_responsable);

        //         $id_user_create = $responsable->id_usuario;
        //         $id_user_recept = Auth::user()->id;
        //         $evento = 'Autorizacion Atencion a Menor de Edad';
        //         $nombre = $paciente->nombre;
        //         $apellido_p = $paciente->apellido_uno;
        //         $apellido_m = $paciente->apellido_dos;
        //         $lugar = $lugar_atencion->nombre;
        //         $profesional_log = $profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos;
        //         $tipo = 'Autorizacion Atencion a Menor de Edad';
        //         $tipo_id = '15';

        //         // $log_users_devices = new LogUsersDevices();
        //         $funcion = new Funciones();
        //         $log_users_devices = (object) $funcion->generatePermApp($id_user_create,$id_user_recept,$evento,$nombre,$apellido_p,$apellido_m,$lugar,$profesional_log,$tipo,$tipo_id);

        //         $datos['log_users_devices'] = $log_users_devices;

        //         if($log_users_devices->app['estado'] == 1)
        //         {
        //             $hora_medica->autorizacion_atencion = $request->autorizacion_atencion;
        //             $hora_medica->id_log_users_devices = $log_users_devices->app['last_id'];
        //             if($hora_medica->save())
        //             {
        //                 $datos['hora_medica_update']['estado'] = 1;
        //                 $datos['hora_medica_update']['msj'] = 'autorizacion';
        //             }
        //         }
        //     }
        // }

        $institucion = Instituciones::where('id_lugar_atencion',$lugar_atencion->id)->first();
        $nombre_institucion = '';
        if($institucion)
        {
            $nombre_institucion = $institucion->nombre;
        }

        /** envio de correo de confirmacion INSTITUCION */
        $blade = 'hora_agendada';
        $to = array(
                array('email' => $paciente->email,'name' =>  $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos),
            );
        $cc = array();
        $bcc = array();
        $asunto = 'MED-SDI - Nueva Hora Agendada';
        $body = array(
            'nombre_paciente'=> $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos,
            'fecha'=> $hora_medica->fecha_consulta,
            'hora'=> $hora_medica->hora_inicio,
            'profesional_nombre'=> $profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos,
            'profesional_especialidad'=> $profesional->Especialidad()->first()->nombre,
            'profesional_tipo_especialidad'=> $profesional->TipoEspecialidad()->first()->nombre,
            'profesional_sub_tipo_especialidad'=> $profesional->SubTipoEspecialidad()->first()?$profesional->SubTipoEspecialidad()->first()->nombre:'',
            // 'institucion'=> $nombre_institucion,
            'lugar_atencion'=> $lugar_atencion->nombre,
            'direccion'=> $lugar_atencion->Direccion()->first()->direccion.' '.$lugar_atencion->Direccion()->first()->numero_dir.', '.$lugar_atencion->Direccion()->first()->Ciudad()->first()->nombre,
        );
        $archivo = '';/** pendiente */
        $id_institucion = '';

        $result_mail =  SendMailController::envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, $id_institucion);

        if($result_mail['estado'])
        {
            $datos['mail']['institucion']['estado'] = 1;
            $datos['mail']['institucion']['msj'] = 'Notificacion de bienvenida enviado';
        }
        else
        {
            $datos['mail']['institucion']['estado'] = 0;
            $datos['mail']['institucion']['msj'] = 'Falle en envio de Notificacion de bienvenida';
        }

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

    public function editar_configuracion_busqueda(Request $request)
    {
        $datos = array();
        $resulto_img = '';

        $asistente = Asistente::where('id_usuario', Auth::user()->id)->first();

        // echo $request->archivo[0];//url temp
        // echo $request->archivo[1];//nombre original
        // echo $request->archivo[2];//nombre temp
        // echo $request->archivo[3];//tipo archivo

        $info_archivos = '';
        if($request->archivo)
        {
            // [0] = url
            // [1] = nombre_original
            // [2] = nombre_archivo
            // [3] = file_extension
            $nombre_temp = $request->archivo[2];
            $file_extension = $request->archivo[3];
            $rut = str_replace('-', '', $asistente->rut);
            $rut = str_replace('.', '', $rut);


            $nombre_final = 'CV_'.$rut.'_'.uniqid().'.'.$file_extension;
            $resulto_img = (object)CargaArchivoController::moverArchivo($nombre_temp, 'archivo_archivo', $nombre_final);

            $datos['archivo'] = $resulto_img;

            if( $resulto_img->estado == 1 )
            {
                $asistente->curriculum = $nombre_final;
            }
        }

        $asistente->buscador = $request->buscador;
        $asistente->id_modalidad = $request->modalidad;

        if($asistente->save())
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'registro actualizado';
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'registro no actualizado';
        }
        // echo json_encode($datos);
        // exit();
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

    public function envioSolicitudAtencionMenor(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_lugar_atencion))
        {
            $error['id_lugar_atencion'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_profesional))
        {
            $error['id_profesional'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_paciente))
        {
            $error['id_paciente'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_responsable))
        {
            $error['id_responsable'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $lugar_atencion = LugarAtencion::find($request->id_lugar_atencion);
            $profesional = Profesional::find($request->id_profesional);
            $paciente = Paciente::find($request->id_paciente);

            if(strpos($request->id_responsable, '-') === false)
            {
                $respn_temp = array($request->id_responsable);
            }
            else
            {
                $respn_temp = explode('-', $request->id_responsable);
            }

            $responsable = Paciente::whereIn('id', $respn_temp)->get();

            if($responsable)
            {
                if($paciente)
                {
                    $cantidad = 0;
                    $exito = 0;
                    $fallo = 0;
                    foreach ($responsable as $key => $value)
                    {
                        $cantidad++;

                        $id_user_create = Auth::user()->id;
                        $id_user_recept = $value->id_usuario;
                        $evento = 'Autorizacion Atencion a Menor de Edad';
                        $nombre = $paciente->nombre;
                        $apellido_p = $paciente->apellido_uno;
                        $apellido_m = $paciente->apellido_dos;
                        $lugar = $lugar_atencion->nombre;
                        $profesional_log = $profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos;
                        $tipo = 'Autorizacion Atencion a Menor de Edad';
                        $tipo_id = '15';

                        // $log_users_devices = new LogUsersDevices();
                        $funcion = new Funciones();
                        $log_users_devices = (object) $funcion->generatePermApp($id_user_create,$id_user_recept,$evento,$nombre,$apellido_p,$apellido_m,$lugar,$profesional_log,$tipo,$tipo_id);

                        $datos['registros'][$key]['log_users_devices'] = $log_users_devices->app;

                        if($log_users_devices->app['estado'] == 1)
                        {
                            $datos['registros'][$key]['estado'] = 1;
                            $datos['registros'][$key]['msj'] = 'Solicitud enviada';

                            $exito++;
                        }
                        else
                        {
                            $datos['registros'][$key]['estado'] = 0;
                            $datos['registros'][$key]['msj'] = 'Falla en solicitud';

                            $fallo++;
                        }
                    }

                    if($cantidad == $exito)
                    {
                        $datos['estado'] = 1;
                        $datos['cantidad'] = $cantidad;
                        $datos['exito'] = $exito;
                        $datos['fallo'] = $fallo;
                        $datos['msj'] = 'exito';
                    }
                    else if($cantidad == $fallo)
                    {
                        $datos['estado'] = 0;
                        $datos['cantidad'] = $cantidad;
                        $datos['exito'] = $exito;
                        $datos['fallo'] = $fallo;
                        $datos['msj'] = 'falla';
                    }
                    else
                    {
                        $datos['estado'] = 1;
                        $datos['cantidad'] = $cantidad;
                        $datos['exito'] = $exito;
                        $datos['fallo'] = $fallo;
                        $datos['msj'] = 'falla intermedia';
                    }

                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'Paciente no encontrado';
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Responsable no encontrado';
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

    public function validarSolicitudAtencionMenor(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->token))
        {
            $error['token'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $funcion = new Funciones();
            $datos = $funcion->checkStatePermApp($request->token);
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campo requerido';
            $datos['error'] = $error;
        }

        return $datos;
    }

    public function cancelarSolicitudAtencionMenor(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->token))
        {
            $error['token'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $funcion = new Funciones();
            $datos = $funcion->disablePermApp($request->token);
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campo requerido';
            $datos['error'] = $error;
        }

        return $datos;
    }

    public function actualizarFoto(Request $request)
    {
        try {
            $request->validate([
                'foto_perfil' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120', // 5MB máximo
            ]);

            $asistente = Asistente::where('id_usuario', Auth::user()->id)->first();
            return $asistente;
            // Eliminar la foto anterior si existe
            if ($asistente->foto_perfil) {
                Storage::disk('public')->delete($asistente->foto_perfil);
            }
            
            // Guardar la nueva foto
            $path = $request->file('foto_perfil')->store('fotos_perfil', 'public');
            
            // Actualizar en la base de datos
            $asistente->update(['foto_perfil' => $path]);
            
            return response()->json([
                'success' => true,
                'message' => 'Foto actualizada correctamente',
                'foto_url' => asset('storage/' . $path)
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar la foto: ' . $e->getMessage()
            ], 500);
        }
    }

    public function eliminarFoto()
    {
        try {
            $asistente = Asistente::where('id_usuario', Auth::user()->id)->first();

            if ($asistente->foto_perfil) {
                // Eliminar archivo del storage
                Storage::disk('public')->delete($asistente->foto_perfil);

                // Actualizar en la base de datos
                $asistente->update(['foto_perfil' => null]);
            }
            
            return response()->json([
                'success' => true,
                'message' => 'Foto eliminada correctamente'
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar la foto: ' . $e->getMessage()
            ], 500);
        }
    }
}
