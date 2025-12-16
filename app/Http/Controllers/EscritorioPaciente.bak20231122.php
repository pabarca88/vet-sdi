<?php

namespace App\Http\Controllers;

use App\Models\AntConfidenciales;
use App\Models\AntecedenteAlergiaPaciente;
use App\Models\AntecedenteEnferCronica;
use App\Models\AntecedenteMedicamentoCronico;
use App\Models\AntecedentesCirugias;
use App\Models\AntecedentesPaciente;
use App\Models\Antecedente;
use App\Models\Ciudad;
use App\Models\ContactoEmergencia;
use App\Models\Direccion;
use App\Models\Especialidad;
use App\Models\EspecialidadMedica;
use App\Models\FichaAtencion;
use App\Models\GrupoSanguineo;
use App\Models\HoraMedica;
use App\Models\LugarAtencion;
use App\Models\Paciente;
use App\Models\PacienteContactoEmergencia;
use App\Models\ContactosEmergencia;


use App\Models\Prevision;
use App\Models\Profesional;
use App\Models\ProfesionalesLugaresAtencion;
use App\Models\ProfesionalHorario;
use App\Models\Region;
use App\Models\RegistroConfirmacionHoraAgenda;
use App\Models\SolicitudPabellonQuirurgico;
use App\Models\SubTipoEspecialidad;
use App\Models\TipoEspecialidad;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use App\Helpers\Funciones;
use App\Models\AcompananteDependiente;
use App\Models\ExamenEspecialidad;
use App\Models\ExamenMedico;
use App\Models\LogUsersDevices;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use App\Models\PacienteControlGlicemia;
use App\Models\PacienteControlPeso;
use App\Models\PacienteControlPresion;
use App\Models\PacienteControlOxigeno;
use App\Models\PacienteControlOrina;
use App\Models\PacientesDependientes;
use App\Models\ResultadoExamen;
use DateTime;

class EscritorioPaciente extends Controller
{

    public function buscar_especialidad(Request $request)
    {
        $profesion_profesional = $request->profesion_profesional;
        $especialidades = TipoEspecialidad::where('id_especialidad', $profesion_profesional)->get();

        return json_encode($especialidades);
    }


    public function buscar_sub_especialidad(Request $request)
    {
        $especialidad = $request->especialidad;
        $sub_especialidades = SubTipoEspecialidad::where('id_tipo_especialidad', $especialidad)->get();

        return json_encode($sub_especialidades);
    }

    public function registrar_paciente(Request $request)
    {

        $paciente = new Paciente();
        $paciente->rut = $request->txt_rut;
        $paciente->nombres = $request->nombre_registro;
        $paciente->apellido_uno = $request->primer_apellido_registro;
        $paciente->apellido_dos = $request->segundo_apellido_registro;
        $paciente->fecha_nac = $request->fecha_nacimiento_registro;
        $paciente->sexo = $request->sexo_registro;
        $paciente->id_prevision = $request->prevision_registro;
        $paciente->telefono_uno = $request->telefono_registro;
        $paciente->telefono_dos = $request->telefono_dos_registro;
        $paciente->id_usuario = Auth::user()->id;
        $paciente->email = Auth::user()->email;

        if (!$paciente->save()) {
            return back()->with('error', 'Error al registrar el paciente');
        } else {
            $direccion = new Direccion();

            $direccion->direccion = $request->direccion;
            $direccion->numero_dir = $request->numero_dir;
            $direccion->id_ciudad = $request->id_ciudad;


            if (!$direccion->save()) {
                return back()->with('error', 'Error al registrar la dirección');
            } else {

                $paciente->id_direccion = $direccion->id;
                $paciente->save();
                return redirect()->route('paciente.home')->with('success', 'Paciente registrado correctamente');
            }
        }
    }

    public function index()
    {
        // dd(Auth::user());
        $paciente = Paciente::where('id_usuario', Auth::user()->id)->first();
        $region = Region::all();
        $prevision = Prevision::all();


        if (isset($paciente)) {

            if($paciente->bienvenida == 0)
            {
                $regiones = Region::all();
                return view('bienvenida.inicio_pacientes')->with([
                    'paciente' => $paciente,
                    'regiones' => $regiones,
                ]);

            }
            else
                return view('app.paciente.escritorio_paciente')->with('paciente', $paciente);
        }

        /** formulario nuevos */
        return view('auth.Registros.registro_paciente')->with(['region' => $region, 'prevision' => $prevision]);
    }

    public function agendarHora($id_profesion_ = 0,$id_especialidad_ = 0,$id_subespecialidad_ = 0)
    {
        $profesiones = Especialidad::where('estado', 1)->whereNotIn('id',[8,10,11,12])->get();
        $especialidades = TipoEspecialidad::where('estado', 1)->whereNotIn('id_especialidad',[8,10,11,12])->get();
        if($id_especialidad_>0)
        $sub_especialidades = SubTipoEspecialidad::where('estado', 1)->where('id_tipo_especialidad',$id_especialidad_)->get();
        else
        $sub_especialidades = (object)array();
        $regiones = Region::all();
        $ciudades = Ciudad::all();
        $previsiones = Prevision::all();

        $reg_confirmacion_hora = RegistroConfirmacionHoraAgenda::where('estado',1)->get();

        if(Auth::user()->hasRole('Paciente'))
        {
            $user = Auth::user();
            $paciente = Paciente::where('id_usuario', $user->id)->first();
            // return view('app.paciente.buscador_profesional_paciente')->with(
            return view('app.general.buscador_profesionales.buscador')->with(
                [
                    'profesiones' => $profesiones,
                    'especialidades' => $especialidades,
                    'sub_especialidades' => $sub_especialidades,
                    'previsiones' => $previsiones,
                    'paciente' => $paciente,
                    'regiones' => $regiones,
                    'ciudades' => $ciudades,
                    'reg_confirmacion_hora' => $reg_confirmacion_hora,
                    'filtros' => array(
                        'id_profesion' => $id_profesion_,
                        'id_especialidad' => $id_especialidad_,
                        'id_subespecialidad' => $id_subespecialidad_
                    )

                ]
            );
        }
        else
        {
            // return view('app.paciente.buscador_profesional_paciente')->with(
            return view('app.general.buscador_profesionales.buscador')->with(
                [
                    'profesiones' => $profesiones,
                    'especialidades' => $especialidades,
                    'sub_especialidades' => $sub_especialidades,
                    'regiones' => $regiones,
                    'ciudades' => $ciudades,
                    'filtros' => array(
                        'id_profesion' => $id_profesion_,
                        'id_especialidad' => $id_especialidad_,
                        'id_subespecialidad' => $id_subespecialidad_
                    )

                ]
            );
        }


    }

    public function miProfesionales($id_usuario_ = 0, $id_profesional_ = 0)
    {
        // DESVINCULAR profesional
        if($id_usuario_ != 0 && $id_profesional_ != 0)
        {
            $fichas = FichaAtencion::where('id_paciente', $id_usuario_)
                                     ->where('id_profesional', $id_profesional_)
                                     ->first();

            if($fichas)
            {
                $fichas->desvincular = 1;
                $fichas->save();
            }
        }

        // VER lista de profesionales
        $paciente = Paciente::where('id_usuario', Auth::user()->id)->first();
        $fichas = FichaAtencion::where('id_paciente', $paciente->id)->get()->unique('id_profesional');

        $fichas_desvinculados = FichaAtencion::select('id_profesional')
                                        ->where('id_paciente', $paciente->id)
                                        ->where('desvincular', 1)
                                        ->get()
                                        ->unique('id_profesional');

        $profesional = [];
        $desvinculados = [];
        $profesion = [];
        foreach ($fichas as $f) {
            array_push($profesional, $f->profesional()->first());
            $profesional_ = Profesional::with('Especialidad')->find($f->id_profesional);
            $profesion[$profesional_->Especialidad->id] = $profesional_->Especialidad->nombre;
        }

        foreach ($fichas_desvinculados as $d) {
            array_push($desvinculados, $d->id_profesional);
        }

        $id_usuario = Auth::user()->id;

        //$lista_especialidad = array_unique($profesion);
        $lista_especialidad = $profesion;

        // var_dump(Auth::user()->id);
        // var_dump($profesional);
        return view('app.paciente.medicos_paciente',
        [
            'paciente' => $paciente,
            'id_usuario' => $id_usuario,
            'profesional' => $profesional,
            'desvinculados' => $desvinculados,
            'lista_especialidad' => $lista_especialidad
        ]);
    }

    public function checkSdi(Request $request)
    {
        $url_anterior = $request->urla;
        $url_nueva = $request->urln;
        $id_usuario_recept = (int)$request->id_recept; // 19

        if(Auth::check())
        $id_usuario = Auth::user()->id; //interno logeado
        else
        $id_usuario = 0; //externo

        $id_user_create = $id_usuario;

        if($id_usuario_recept!=0)
        $id_user_recept = $id_usuario_recept;
        else
        $id_user_recept = $id_usuario;

        if(!empty($request->evento))
            $evento = $request->evento;
        else
            $evento = 'Ficha Única';

        if(Auth::check())
            $nombre = Auth::user()->name;
        else
            $nombre = '';

        $apellido_p = '';
        $apellido_m = '';
        $lugar = 'Sistema';

        if(Auth::check())
        $profesional = Auth::user()->name;
        else
        $profesional = '';

        $tipo = 'Check SDI';

        if(!empty($request->id_tipo))
            $id_tipo = $request->id_tipo;
        else
            $id_tipo = 2; // CHECK FUM - ficha medica unica

        if($request->token)
        {
            Funciones::disablePermApp($request->token);
        }

        $permiso = Funciones::generatePermApp($id_user_create,$id_user_recept,$evento,$nombre,$apellido_p,$apellido_m,$lugar,$profesional,$tipo,$id_tipo);

        return view('check_sdi', [
            'id_recept' => $id_user_recept,
            'url_nueva' => $url_nueva,
            'url_anterior' => $url_anterior,
            'token' => $permiso['app']['token'],
            'token_' => $request->token_,
            'fecha_termino' => $permiso['app']['fecha_termino']
        ]);
    }

    public function checkSdiToken(Request $request){
        $state = Funciones::checkStatePermApp($request->token);

        return $state;
    }

    public function miFichaMedica(Request $request)
    {
        //VALIDAR TOKEN
        $registro = Funciones::validTokenPermApp($request->token);


        //capturamos el id_usuario receptor
        $id_usuario = $registro['id_user_recept'];

        /* PACIENTE */
        $paciente = Paciente::where('id_usuario', $id_usuario)->first();

        list($ano,$mes,$dia) = explode("-",$paciente->fecha_nac);
        $ano_diferencia  = date("Y") - $ano;
        $mes_diferencia = date("m") - $mes;
        $dia_diferencia   = date("d") - $dia;
        if ($dia_diferencia < 0 || $mes_diferencia < 0)
          $ano_diferencia--;

        $edad = $ano_diferencia;
        $paciente->fecha_nac = $dia.'-'.$mes.'-'.$ano;
        $paciente->edad = $edad;

        /* DIRECCION */
        $direccion = Direccion::find($paciente->id_direccion);

        if($direccion)
        {
        $direccion_nombre = $direccion->direccion;
        $numero_dir = $direccion->numero_dir;
        $id_ciudad = $direccion->id_ciudad;

        $ciudad = Ciudad::find($id_ciudad);
        $ciudad_nombre = $ciudad->nombre;
        $region = Region::find($ciudad->id_region);
        $region_nombre = $region->nombre;
        }else{
            $direccion_nombre = "";
            $numero_dir = "";
            $ciudad_nombre = "";
            $region_nombre = "";
        }

        $direccion = (object)$direccion = array(
            'direccion' => $direccion_nombre,
            'numero' => $numero_dir,
            'ciudad' => $ciudad_nombre,
            'region' => $region_nombre,
        );

        /* CONTACTO EMERGENCIA */
        $pacientes_contacto_emergencia = PacienteContactoEmergencia::where('id_paciente',$paciente->id)->first();

        if(is_object($pacientes_contacto_emergencia))
        {
            $contacto_emergencia = ContactoEmergencia::find($pacientes_contacto_emergencia->id_contacto);

            list($ano,$mes,$dia) = explode("-",$paciente->fecha_nac);
            $ano_diferencia  = date("Y") - $ano;
            $mes_diferencia = date("m") - $mes;
            $dia_diferencia   = date("d") - $dia;
            if ($dia_diferencia < 0 || $mes_diferencia < 0)
            $ano_diferencia--;

            $edad = $ano_diferencia;
            $contacto_emergencia->fecha_nac = $dia.'-'.$mes.'-'.$ano;
            $contacto_emergencia->edad = $edad;

        }else{
            $contacto_emergencia = (object) array(
                'nombre'=>'N/A',
                'apellido_uno'=>'N/A',
                'apellido_dos'=>'N/A',
                'rut'=>'N/A',
                'edad'=>'N/A',
                'email'=>'N/A',
                'fecha_nac'=>'N/A',
                'telefono'=>'N/A',
                'parentezco'=>'N/A'
            );
        }

        /* ANTECEDENTES */

        $id_antecedente = $paciente->id_antecedente;

        if($id_antecedente!=null)
        {
            $antecedentes_paciente = AntecedentesPaciente::find($id_antecedente);
        }else{
            $antecedentes_paciente = (object) array(
                'id'=>'',
                'transfusion'=>'N/A',
                'dona_organos'=>'N/A',
                'dona_organos_parcial'=>'N/A',
                'dona_sangre'=>'N/A',
                'impedimento_donar'=>'N/A',
                'comentario_gs'=>'N/A',
                'comentarios'=>'N/A',
                'hepatitis'=>'N/A',
                'comentario_hepa'=>'N/A',
                'id_grupo_sanguineo'=>0,
            );
        }

        /* SANGUINEO */

        $id_grupo_sanguineo = $antecedentes_paciente->id_grupo_sanguineo;
        if($id_grupo_sanguineo!=0)
        {
            $grupo_sanguineo = GrupoSanguineo::find($id_grupo_sanguineo);
        }else{
            $grupo_sanguineo = (object) array(
                'id'=> 0,
                'nombre_gs'=> 'N/A',
                'descripcion_gs'=> 'N/A'
            );
        }

        /* ANTECEDENTES */
        $antecedentes = Antecedente::where('id_users',$id_usuario)->with('users','paciente','tipo_antecendente','profesional')->get();

        foreach ($antecedentes as $valor) {
            $valor['antecedente_data'] = json_decode($valor['data']);
        }


        /* ATENCIONES MEDICAS */
        $fichas = FichaAtencion::where('id_paciente', $paciente->id)->where('finalizada', 1)->get();
        $especialidad = Especialidad::where('estado',1)->get();
        $sub_tipo_especialidad = SubTipoEspecialidad::where('estado',1)->get();

        return view('ficha_medica', [
            'id_usuario' => $id_usuario,
            'paciente' => $paciente,
            'contacto_emergencia' => $contacto_emergencia,
            'antecedentes_paciente' => $antecedentes_paciente,
            'grupo_sanguineo' => $grupo_sanguineo,
            'antecedentes' => $antecedentes,
            'token' => $request->token,
            'fichas' => $fichas,
            'especialidad' => $especialidad,
            'sub_tipo_especialidad' => $sub_tipo_especialidad,
            'direccion' => $direccion

        ]);
    }


    public function miFichaMedicaPdfView(Request $request)
    {
        //VALIDAR TOKEN
        $registro = Funciones::validTokenPermApp($request->token);


        //capturamos el id_usuario receptor
        $id_usuario = $registro['id_user_recept'];

        /* PACIENTE */
        $paciente = Paciente::where('id_usuario', $id_usuario)->first();

        list($ano,$mes,$dia) = explode("-",$paciente->fecha_nac);
        $ano_diferencia  = date("Y") - $ano;
        $mes_diferencia = date("m") - $mes;
        $dia_diferencia   = date("d") - $dia;
        if ($dia_diferencia < 0 || $mes_diferencia < 0)
          $ano_diferencia--;

        $edad = $ano_diferencia;
        $paciente->fecha_nac = $dia.'-'.$mes.'-'.$ano;
        $paciente->edad = $edad;

        /* DIRECCION */
        $direccion = Direccion::find($paciente->id_direccion);

        if($direccion)
        {
        $direccion_nombre = $direccion->direccion;
        $numero_dir = $direccion->numero_dir;
        $id_ciudad = $direccion->id_ciudad;

        $ciudad = Ciudad::find($id_ciudad);
        $ciudad_nombre = $ciudad->nombre;
        $region = Region::find($ciudad->id_region);
        $region_nombre = $region->nombre;
        }else{
            $direccion_nombre = "";
            $numero_dir = "";
            $ciudad_nombre = "";
            $region_nombre = "";
        }

        $direccion = (object)$direccion = array(
            'direccion' => $direccion_nombre,
            'numero' => $numero_dir,
            'ciudad' => $ciudad_nombre,
            'region' => $region_nombre,
        );

        /* CONTACTO EMERGENCIA */
        $pacientes_contacto_emergencia = PacienteContactoEmergencia::where('id_paciente',$paciente->id)->first();

        if(is_object($pacientes_contacto_emergencia))
        {
            $contacto_emergencia = ContactoEmergencia::find($pacientes_contacto_emergencia->id_contacto);

            list($ano,$mes,$dia) = explode("-",$paciente->fecha_nac);
            $ano_diferencia  = date("Y") - $ano;
            $mes_diferencia = date("m") - $mes;
            $dia_diferencia   = date("d") - $dia;
            if ($dia_diferencia < 0 || $mes_diferencia < 0)
            $ano_diferencia--;

            $edad = $ano_diferencia;
            $contacto_emergencia->fecha_nac = $dia.'-'.$mes.'-'.$ano;
            $contacto_emergencia->edad = $edad;

        }else{
            $contacto_emergencia = (object) array(
                'nombre'=>'N/A',
                'apellido_uno'=>'N/A',
                'apellido_dos'=>'N/A',
                'rut'=>'N/A',
                'edad'=>'N/A',
                'email'=>'N/A',
                'fecha_nac'=>'N/A',
                'telefono'=>'N/A',
                'parentezco'=>'N/A'
            );
        }

        /* ANTECEDENTES */

        $id_antecedente = $paciente->id_antecedente;

        if($id_antecedente!=null)
        {
            $antecedentes_paciente = AntecedentesPaciente::find($id_antecedente);
        }else{
            $antecedentes_paciente = (object) array(
                'id'=>'',
                'transfusion'=>'N/A',
                'dona_organos'=>'N/A',
                'dona_organos_parcial'=>'N/A',
                'dona_sangre'=>'N/A',
                'impedimento_donar'=>'N/A',
                'comentario_gs'=>'N/A',
                'comentarios'=>'N/A',
                'hepatitis'=>'N/A',
                'comentario_hepa'=>'N/A',
                'id_grupo_sanguineo'=>0,
            );
        }

        /* SANGUINEO */
        $id_grupo_sanguineo = $antecedentes_paciente->id_grupo_sanguineo;
        if($id_grupo_sanguineo!=0)
        {
            $grupo_sanguineo = GrupoSanguineo::find($id_grupo_sanguineo);
        }else{
            $grupo_sanguineo = (object) array(
                'id'=> 0,
                'nombre_gs'=> 'N/A',
                'descripcion_gs'=> 'N/A'
            );
        }

         /* ANTECEDENTES */
        $antecedentes = Antecedente::where('id_users',$id_usuario)->with('users','paciente','tipo_antecendente')->get();
        //$antecedentes = Antecedente::with('users','paciente','tipo_antecendente')->get();

        foreach ($antecedentes as $valor) {
            $valor['antecedente_data'] = json_decode($valor['data']);
        }

        $titulo = 'Ficha Medica';
        $detalle = array(
            'id_usuario' => $id_usuario,
            'paciente' => $paciente,
            'contacto_emergencia' => $contacto_emergencia,
            'antecedentes_paciente' => $antecedentes_paciente,
            'grupo_sanguineo' => $grupo_sanguineo,
            'antecedentes' => $antecedentes,
            'token' => $request->token,
            'direccion' => $direccion
        );
        $nombre = 'ficha_medica_'.$id_usuario;
        $template = 'pdf_mi_ficha_medica';

        return PdfController::generarPDF($titulo,$detalle,$nombre,$template,$request->funcionalidad);
    }

    function obtener_edad_segun_fecha($fecha_nacimiento)
    {
        $nacimiento = new DateTime($fecha_nacimiento);
        $ahora = new DateTime(date("Y-m-d"));
        $diferencia = $ahora->diff($nacimiento);
        return $diferencia->format("%y");
    }

    public function miFichaMedica2()
    {
        $paciente = Paciente::where('id_usuario', Auth::user()->id)->first();

        return view('app.paciente.ficha_medica', ['paciente' => $paciente]);

    }


    public function recetaOnline()
    {
        return view('app.paciente.receta.inicio_receta');
    }

    /*Acceso Profecional no Inscrito*/
    public function acceso_pni()
    {
        $regiones = Region::all();
        $ciudades = Ciudad::all();


        $especialidades = Especialidad::where('estado',1)->get();
        $tipo_especialidad = TipoEspecialidad::where('estado',1)->get();
        $sub_tipo_especialidad = SubTipoEspecialidad::where('estado',1)->get();

        return view('app.paciente.acceso_profesional_no_inscrito')->with([
            'regiones' => $regiones,
            'ciudades' => $ciudades,

            'profesion' => $especialidades,
            'especialidad' => $tipo_especialidad,
            'subespecialidad' => $sub_tipo_especialidad,
        ]);
    }

    public function perfil()
    {


        $paciente = Paciente::where('id_usuario', Auth::user()->id)->first();
        $previsiones = Prevision::all();
        $regiones = Region::all();
        $ciudades = Ciudad::where('id_region', $paciente->direccion()->first()->ciudad()->first()->Region()->first()->id)->get();
        $contacto = $paciente->ContactosEmergencia()->get();

        $antecedentes = AntecedentesPaciente::where('id', $paciente->id_antecedente)->first();

        $ant_confidenciales = AntConfidenciales::where('id_paciente', $paciente->id)->first();

        if (isset($antecedentes)) {

            $medicamentos_cronicos = AntecedenteMedicamentoCronico::where('id_antecedentes', $paciente->Antecedentes()->first()->id)->get();
            $alergias = AntecedenteAlergiaPaciente::where('id_antecedentes', $paciente->Antecedentes()->first()->id)->get();
            $antecedentes_quirurgicos = SolicitudPabellonQuirurgico::where('id_paciente', $paciente->id)->get();
            $antecedentes_cirugias = AntecedentesCirugias::where('id_antecedentes', $paciente->Antecedentes()->first()->id)->get();
            $patoligias_cronicas = AntecedenteEnferCronica::where('id_antecedentes', $paciente->Antecedentes()->first()->id)->get();
        } else {
            $medicamentos_cronicos = [];
            $alergias = [];
            $antecedentes_quirurgicos = [];
            $patoligias_cronicas = [];
            $antecedentes_cirugias = [];
        }

        $fichasConfi = FichaAtencion::where('id_paciente', $paciente->id)->where('confidencial', true)->get();
        $grupo_sanguineo = GrupoSanguineo::all();

        $id_usuario = Auth::user()->id;
        $userData = Funciones::userData($id_usuario);

        return view(
            'app.paciente.perfil_paciente',
            [
                'userData' => $userData,
                'paciente' => $paciente,
                'previsiones' => $previsiones,
                'regiones' => $regiones,
                'ciudades' => $ciudades,
                'contacto' => $contacto,
                'alergias' => $alergias,
                'antecedentes_quirurgicos' => $antecedentes_quirurgicos,
                'antecedentes_cirugias' => $antecedentes_cirugias,
                'ant_confidenciales' => $ant_confidenciales,
                //'organosDonar'=>$organosDonar,
                'patoligias_cronicas' => $patoligias_cronicas,
                'medicamentos_cronicos' => $medicamentos_cronicos,
                'grupo_sanguineo' => $grupo_sanguineo,
            ]
        );
    }

    public function rompeclave()
    {
        $paciente = Paciente::where('id_usuario', Auth::user()->id)->first();
        $direcion = $paciente->Direccion()->first();

        return view('app.paciente.perfil_paciente', ['paciente' => $paciente, 'direcion' => $direcion]);
    }

    public function subcripcion()
    {
        $paciente = Paciente::where('id_usuario', Auth::user()->id)->first();
        $direcion = $paciente->Direccion()->first();

        return view('app.paciente.perfil_paciente', ['paciente' => $paciente, 'direcion' => $direcion]);
    }

    /* Reservar Hora Médica */
    public function getEspecialidad(Request $request)
    {
        if (Session::has('view')) {
            Session::forget('view');
        }
        Session::put('view', $request->view);

        $especialidades = Especialidad::all();
        $previsiones = Prevision::all();
        $regiones = Region::all();
        $paciente = Paciente::where('id_usuario', Auth::user()->id)->first();

        $profesion_profesional = $request->profesion_profesional;
        $esp = $request->especialidad;
        $sub_especialidad = $request->sub_especialidad;
        $ciudad_paciente = $request->ciudad_paciente;
        // dd($request->all());

        if ($ciudad_paciente != '0') {

            // ->
            $profesionales = Profesional::select(
                [
                    'profesionales.id',
                    'profesionales.nombre',
                    'profesionales.apellido_uno',
                    'profesionales.apellido_dos',
                    'e.nombre as especialidad',
                    'se.nombre as sub_tipo_especialidad',
                    'te.nombre as tipo_especialidad',
                    'h.id as id_horario',
                    'h.hora_inicio',
                    'h.hora_termino',
                    'h.dia',
                    'hm.hora_inicio as hora_inicio_consulta',
                    'hm.hora_termino as hora_termino_consulta',
                ]
            )->leftjoin('profesionales_lugares_atencion as la', 'la.id_profesional', '=', 'profesionales.id')
                ->leftjoin('lugares_atencion as l', 'l.id', '=', 'la.id_lugar_atencion')
                ->join('direcciones as d', 'd.id', '=', 'l.id_direccion')
                ->join('especialidades as e', 'profesionales.id_especialidad', '=', 'e.id')
                ->leftjoin('sub_tipo_especialidad as se', 'profesionales.id_sub_tipo_especialidad', '=', 'se.id')
                ->leftjoin('tipos_especialidad as te', 'profesionales.id_tipo_especialidad', '=', 'te.id')
                ->leftjoin('profesional_horarios as h', 'h.id_profesional', '=', 'profesionales.id', 'and', 'h.id_lugar_atencion', '=', 'la.id')
                ->leftjoin('horas_medicas as hm', 'hm.id_profesional', '=', 'h.id_profesional')
                ->where('d.id_ciudad', $ciudad_paciente)
                ->get();


            foreach ($profesionales as $p) {

                $dias_atencion =  ProfesionalHorario::select(
                    [
                        'dia',
                    ]
                )
                    ->where('id_profesional', $p->id)
                    ->get();

                $p->dias_atencion = $dias_atencion;
            }




            // dd($profesionales);

            // $lugares_atencion = LugarAtencion::where('id_ciudad', $ciudad_paciente)->get();
            // $lugares_atencion_array = [];
            // foreach ($lugares_atencion as $lugar) {
            //     $profesionales = ProfesionalesLugaresAtencion::where('id_lugar_atencion', $lugar->id)->get();
            //     dd($profesionales);
            //     array_push($lugares_atencion_array, $lugar->id);
            // }
            // $profesionales = Profesional::where('', $sub_especialidad)->get();
        } else {
            if ($sub_especialidad != '0') {
                $profesionales = Profesional::select(
                    [
                        'profesionales.nombre',
                        'profesionales.apellido_uno',
                        'profesionales.apellido_dos',
                        'e.nombre as especialidad',
                        'se.nombre as sub_tipo_especialidad',
                        'te.nombre as tipo_especialidad',
                    ]
                )->join('especialidades as e', 'profesionales.id_especialidad', '=', 'e.id')
                    ->leftjoin('sub_tipo_especialidad as se', 'profesionales.id_sub_tipo_especialidad', '=', 'se.id')
                    ->leftjoin('tipos_especialidad as te', 'profesionales.id_tipo_especialidad', '=', 'te.id')
                    ->where('profesionales.id_sub_tipo_especialidad', $sub_especialidad)->get();
            } else {
                if ($esp != '0') {
                    // $profesionales = Profesional::where('profesionales.id_especialidad', $esp)->get();

                    $profesionales = Profesional::select(
                        [
                            'profesionales.nombre',
                            'profesionales.apellido_uno',
                            'profesionales.apellido_dos',
                            'e.nombre as especialidad',
                            'se.nombre as sub_tipo_especialidad',
                            'te.nombre as tipo_especialidad',
                        ]
                    )->leftjoin('especialidades as e', 'profesionales.id_especialidad', '=', 'e.id')
                        ->leftjoin('sub_tipo_especialidad as se', 'profesionales.id_sub_tipo_especialidad', '=', 'se.id')
                        ->leftjoin('tipos_especialidad as te', 'profesionales.id_tipo_especialidad', '=', 'te.id')
                        ->where('profesionales.id_tipo_especialidad', $esp)->get();
                } else {
                    $profesionales = Profesional::select(
                        [
                            'profesionales.nombre',
                            'profesionales.apellido_uno',
                            'profesionales.apellido_dos',
                            'e.nombre as especialidad',
                            'se.nombre as sub_tipo_especialidad',
                            'te.nombre as tipo_especialidad',
                        ]
                    )->join('especialidades as e', 'profesionales.id_especialidad', '=', 'e.id')
                        ->leftjoin('sub_tipo_especialidad as se', 'profesionales.id_sub_tipo_especialidad', '=', 'se.id')
                        ->leftjoin('tipos_especialidad as te', 'profesionales.id_tipo_especialidad', '=', 'te.id')
                        ->where('profesionales.id_especialidad', $profesion_profesional)->get();
                }
            }
        }

        return view(
            'app.paciente.buscador_profesional_paciente',
            [
                'profesionales' => $profesionales,
                'especialidades' => $especialidades,
                'previsiones' => $previsiones,
                'regiones' => $regiones,
                'paciente' => $paciente
            ]
        );
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
            $query->where('nombre', 'like', '%' . $nombrerut . '%')->orWhere('rut', '=', $nombrerut);
        })->get();

        return view('app.paciente.buscador_profesional_paciente', ['profesional' => $profesional]);
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

        $Especialidad = Especialidad::where('nombre', 'like', '%' . $especialidad . '%')->get();
        $profesional = [];
        foreach ($Especialidad as $e) {
            if (isset($e->id)) {
                foreach ($e->Profesionales()->get() as $p) {
                    array_push($profesional, $p);
                }
            }
        }

        return view('app.paciente.buscador_profesional_paciente', ['profesional' => $profesional]);
    }

    /* Receta Online*/
    public function receta_misrecetas()
    {
        $fichas = FichaAtencion::where('id_paciente', Auth::user()->id)->get();

        return view('app.paciente.receta.mis_recetas', ['fichas' => $fichas]);
    }

    public function receta_misexamenes()
    {
        $paciente = Paciente::where('id_usuario', Auth::user()->id)->first();

        /** EXAMENES DE ESPECIALIDAD REALIZADOS */
        $examenes_especialidad_realizados = ExamenEspecialidad::select('id', 'id_tipo', 'id_template', 'id_examen_tipo', 'id_sub_tipo_especialidad', 'id_ficha_atencion', 'id_ficha_especialidad', 'id_paciente', 'id_profesional', 'id_asistente', 'nombre', 'revisado', 'estado')
                                                            ->with(['HoraMedica' => function($query){
                                                                $query->select('id', 'id_ficha_atencion', 'fecha_realizacion_consulta', 'id_estado');
                                                            }])
                                                            ->with(['ExamenEspecialidadTemplate' => function($query){
                                                                $query->select('id', 'nombre', 'alias');
                                                            }])
                                                            ->with(['ExamenEspecialidadTipo' => function($query){
                                                                $query->select('id', 'nombre', 'descripcion');
                                                            }])
                                                            ->with(['SubTipoEspecialidad' => function($query){
                                                                $query->select('id', 'nombre');
                                                            }])
                                                            ->with(['Profesional' => function($query){
                                                                $query->select('id', 'nombre', 'apellido_uno', 'apellido_dos');
                                                            }])
                                                            ->where('id_paciente', $paciente->id)
                                                            ->get();

        /** resultado de examenes */
        // $resultado_examen = ResultadoExamen::where('id_paciente', $paciente->id)->get();
        $resultado_examen = ResultadoExamen::with('ResultadoExamenArchivo')->where('id_paciente', $paciente->id)->get();
        if($resultado_examen)
        {
            foreach ($resultado_examen as $key => $value)
            {
                $result_tipo_ex = ExamenMedico::where('id', $value->tipo_examen)->get()->first();
                $resultado_examen[$key]['obj_tipo_examen'] = $result_tipo_ex;
            }
        }

        return view('app.paciente.receta.mis_examenes')->with([
            'examenes_especialidad_realizados' => $examenes_especialidad_realizados,
            'resultado_examen' => $resultado_examen,
        ]);
    }

    public function receta_miscertificados()
    {
        $fichas = FichaAtencion::where('id_paciente', Auth::user()->id)->get();

        return view('app.paciente.receta.mis_certificados', ['fichas' => $fichas]);
    }

    public function receta_mislicencias()
    {
        $fichas = FichaAtencion::where('id_paciente', Auth::user()->id)->get();

        return view('app.paciente.receta.mis_licencias', ['fichas' => $fichas]);
    }

    /* Perfil */
    public function editInfor(Request $request)
    {

        // $this->validate($request, [
        //     'perfil_nombre' => 'required',
        //     'perfil_apellido_uno' => 'required',
        //     'perfil_apellido_dos' => 'required',
        //     'perfil_sexo' => 'required',
        //     'perfil_nac' => 'required|date',
        //     'perfil_prevision' => 'required|between:2,999',
        // ]);



        $nombre = (isset($request->perfil_nombre)) ? $request->perfil_nombre : null;
        $apellido_uno = (isset($request->perfil_apellido_uno)) ? $request->perfil_apellido_uno : null;
        $apellido_dos = (isset($request->perfil_apellido_dos)) ? $request->perfil_apellido_dos : null;
        $sexo = (isset($request->perfil_sexo)) ? $request->perfil_sexo : null;
        $fecha_nac = (isset($request->perfil_nac)) ? $request->perfil_nac : null;
        $prevision = (isset($request->perfil_prevision)) ? $request->perfil_prevision : null;


        $paciente = Paciente::where('id_usuario', Auth::user()->id)->first();
        $paciente->nombres = $nombre;
        $paciente->apellido_uno = $apellido_uno;
        $paciente->apellido_dos = $apellido_dos;
        $paciente->sexo = $sexo;
        $paciente->fecha_nac = $fecha_nac;
        $paciente->id_prevision = $prevision;
        $paciente->save();

        return json_encode(['success' => true]);

        // return redirect()->route('paciente.perfil');
    }

    public function editcontacto(Request $request)
    {
        // $this->validate($request, [
        //     'Perfil_email' => 'required|email',
        //     'Perfil_fono' => 'required',
        // ]);

        $email = (isset($request->perfil_email)) ? $request->perfil_email : null;
        $fono = (isset($request->perfil_fono)) ? $request->perfil_fono : null;

        $paciente = Paciente::where('id_usuario', Auth::user()->id)->first();
        $paciente->email = $email;
        $paciente->telefono_uno = $fono;
        $paciente->save();
        return json_encode(['success' => true]);

        // return redirect()->route('paciente.perfil');
    }

    public function editdirec(Request $request)
    {
        // $this->validate($request, [
        //     'perfil_dire' => 'required',
        //     'perfil_comuna' => 'required|between:2,999',
        // ]);

        $perfil_dire = (isset($request->perfil_dire)) ? $request->perfil_dire : null;
        $ciudad = (isset($request->perfil_ciudad)) ? $request->perfil_ciudad : null;
        $numero_dir = (isset($request->perfil_numero_dir)) ? $request->perfil_numero_dir : null;
        $paciente = Paciente::where('id_usuario', Auth::user()->id)->first();
        $direccion = Direccion::where('id', $paciente->id_direccion)->first();

        $direccion->direccion = $perfil_dire;
        $direccion->numero_dir = $numero_dir;
        $direccion->id_ciudad = $ciudad;


        $direccion->save();

        return json_encode(['success' => true]);
        // return redirect()->route('paciente.perfil');
    }

    //Falta revisar el modelo y valdiaciones
    public function crearcontacto(Request $request)
    {
        $paciente = Paciente::where('id_usuario', Auth::user()->id)->first();

        $contacto = new ContactoEmergencia();
        $contacto->rut_contacto = $request->rut_paciente;
        $contacto->nombre_contacto = $request->nombres_paciente;
        $contacto->apellido_uno_contacto = $request->apellidos_paciente;
        $contacto->apellido_dos_contacto = $request->apellidos_paciente;
        $contacto->direccion_contacto = $request->direccion_paciente;
        $contacto->ciudad_contacto = $request->comuna_paciente;
        $contacto->telefono_uno_contacto = $request->telefono_paciente;

        $contacto->fecha_nac_contacto = Carbon::now();
        $contacto->region_contacto = 'algo';
        $contacto->telefono_dos_contacto = 111;
        $contacto->save();

        $paciente->Contacto_emergencia()->attach($contacto);

        return redirect()->route('paciente.perfil');
    }


    public function getPacienteUser(Request $request)
    {
        // var_dump($request->all());
        // var_dump($request->id_dependiente_activo);

        $datos = array();
        if(empty($request->id_dependiente_activo))
        {
            $paciente = Paciente::where('id_usuario', Auth::user()->id)
                        ->with(['Prevision' => function($query){
                            $query->select('id', 'nombre');
                        }])
                        ->with(['Direccion' => function($query){
                            $query->with('Ciudad')->first();
                        }])
                        ->first();
        }
        else
        {
            $paciente = Paciente::where('id', $request->id_dependiente_activo)
                        ->with(['Prevision' => function($query){
                            $query->select('id', 'nombre');
                        }])
                        ->with(['Direccion' => function($query){
                            $query->with('Ciudad')->first();
                        }])
                        ->first();

            /** BUSCAR INFORMACION DE DEPENDIENTES */
            $info_depen = PacientesDependientes::where('id_paciente', $paciente->id)->first();

            /** BUSCAR RESPONSABLES */
            $filtro_temp = array();
            $filtro_temp[] = array('id_dependiente', $info_depen->id_paciente);
            $registro_depen = AcompananteDependiente::where($filtro_temp)->where('id_tipo', 1)->with('acompanante');
            $registro_temp = AcompananteDependiente::where('id_responsable', $info_depen->id_responsable)->whereNull('id_dependiente')->where('id_tipo', 2)->with('acompanante')->union($registro_depen)->get();
            $paciente['acompanante'] = $registro_temp;

            /** BUSCAR REPRESENTENATE */
            $registro_representante = Paciente::where('id_usuario', Auth::user()->id)->first();
            $paciente['representante'] = $registro_representante;

            $paciente['edad'] = $this->obtener_edad_segun_fecha($paciente->fecha_nac);
        }


        if($paciente)
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'Registros';
            $datos['registro'] = $paciente;
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'registros no encontrados';
        }

        return $datos;
    }

    public function agendar_horas(Request $request)
    {
        $datos = array();
        $valido = 1;

        $paciente = paciente::where('id', $request->reserva_hora_id)->first();
        $profesional = Profesional::where('id', $request->id_profesional)->first();
        $lugar_atencion = LugarAtencion::where('id', $request->id_lugar_atencion)->first();

        /** HORA DE EXAMEN */
        if($request->tipo_hora_medica == 'E')
        {
            // validar si paciente tiene otra consulta
            $validar = HoraMedica::where('id_paciente', $paciente->id)
                                ->where('id_profesional',$profesional->id)
                                ->where('tipo_hora_medica','E')
                                ->where('fecha_consulta',\Carbon\Carbon::parse($request->fecha_consulta)->format('Y-m-d'))
                                ->first();
        }
        else
        {
            // validar si paciente tiene otra consulta
            $validar = HoraMedica::where('id_paciente', $paciente->id)
                                ->where('id_profesional',$profesional->id)
                                ->where('tipo_hora_medica','C')
                                ->where('fecha_consulta',\Carbon\Carbon::parse($request->fecha_consulta)->format('Y-m-d'))
                                ->first();
        }

        if($validar)
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Paciente ya tiene Hora para este dia';
            $valido = 0;
            return json_encode(array(
                'estado' => 'error',
                'id_profesional' => $profesional->id,
                'msj' => 'Paciente ya tiene Hora para este dia'
            ));
        }

        if($valido)
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

            $hora_medica = new HoraMedica();

            $hora_medica->id_paciente = $request->reserva_hora_id;
            $hora_medica->id_profesional = $profesional->id;
            $hora_medica->id_asistente = $request->id_asistente;
            $hora_medica->id_estado = '1';
            $hora_medica->fecha_consulta = \Carbon\Carbon::parse($request->fecha_consulta)->format('Y-m-d');

            $hora_medica->hora_inicio = \Carbon\Carbon::parse($request->fecha_consulta)->format('H:i:s');
            $hora_medica->hora_termino = \Carbon\Carbon::parse($request->fecha_consulta)->addMinutes($tiempo_consulta)->format('H:i:s');
            $hora_medica->descripcion = $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos;
            $hora_medica->id_lugar_atencion = $request->id_lugar_atencion;

            $hora_medica->acomp_representante = $request->representante;
            $hora_medica->acomp_acompanante = $request->acompanante;
            if(!empty($request->lista_Acompanante))
            $hora_medica->acomp_lista = json_encode($request->lista_Acompanante);

            $hora_medica->autorizacion_atencion = $request->autorizacion_atencion;
            // $hora_medica->id_log_users_devices = '';


            if(!empty($request->tipo_hora_medica))
            {
                $hora_medica->tipo_hora_medica = $request->tipo_hora_medica;
                $hora_medica->alias_examen = $request->examen;
            }

            // $hora_medica->origen = $request->origen;

            if ($hora_medica->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'Hora Reservada';
                $datos['registro'] = array(
                    'fecha' => \Carbon\Carbon::parse($request->fecha_consulta)->format('Y-m-d'),
                    'hora' => \Carbon\Carbon::parse($request->fecha_consulta)->format('H:i:s'),
                    'profesional' => $profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos ,
                    'lugar_atencion' => $lugar_atencion->nombre,
                );

                /**  */
                /** menor edad? */
                $edad = \Carbon\Carbon::parse($paciente->fecha_nac)->diff(\Carbon\Carbon::now())->format('%y');
                if( $edad < 18 )
                {

                    if( $request->autorizacion_atencion == 1 )
                    {
                        $usuario = Auth::user()->id;
                        $id_user_create = $usuario;
                        $id_user_recept = $usuario;
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

                        $datos['log_users_devices'] = $log_users_devices;

                        if($log_users_devices->app['estado'] == 1)
                        {
                            $hora_medica->autorizacion_atencion = $request->autorizacion_atencion;
                            $hora_medica->id_log_users_devices = $log_users_devices->app['last_id'];
                            if($hora_medica->save())
                            {
                                $datos['hora_medica_update']['estado'] = 1;
                                $datos['hora_medica_update']['msj'] = 'autorizacion';
                            }
                        }
                    }
                }
            }
        }

        // nombre_paciente
        // fecha
        // hora
        // profesional_nombre
        // profesional_especialidad
        // profesional_tipo_especialidad
        // profesional_sub_tipo_especialidad
        // profesional_sub_tipo_especialidad
        // lugar_atencion
        // direccion

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
            $datos['mail']['institucion']['estado'] = 1;
            $datos['mail']['institucion']['msj'] = 'Notificacion de bienvenida enviado';
        }
        else
        {
            $datos['mail']['institucion']['estado'] = 0;
            $datos['mail']['institucion']['msj'] = 'Falle en envio de Notificacion de bienvenida';
        }

        // $details = [
        //     'title' => 'Hora medica Reservada',
        //     'body' => 'Estimado/a ' . $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos . ',<br>
        //             Junto con saludar, por medio de este correo le informamos que se ha reservado su hora con exito <br>' .
        //         'Fecha: ' . $hora_medica->fecha_consulta . '<br>' .
        //         'Hora : ' . $hora_medica->hora_inicio . '<br>' .
        //         'Profesional: <b>' . $profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos . '<b> <br><br>' .
        //         'Que tenga un excelente día. </br></br>' .
        //         'Saludos.',
        // ];

        //Mail::to($paciente->email)->send(new \App\Mail\RegistroPacienteMail($details));

        return json_encode($hora_medica);
    }


	/** MIS CONTROLES PERSONALES */

	public function mis_controles()
	{
		return view('app.paciente.mis_controles');
	}


    public function CambiocontrasenaLiberacionBienvenida(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->contrasena_actual)) {
            $error['contrasena_actual'] = 'campo requerido';
            $valido = 0;
        }
        else
        {
            $filtro = array();
            $filtro[] = array('id', Auth::user()->id);
            $user = User::where( $filtro )->first();
            $password = $request->contrasena_actual;

            if (!password_verify($password, $user->password)) {
                if($user == NULL){
                    $error['contrasena_actual'] = 'Contraseña actual no es valida';
                    $valido = 0;
                }
            }
        }

        if(empty($request->password_registro)) {
            $error['password_registro'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->password_confirmacion_registro)) {
            $error['password_confirmacion_registro'] = 'campo requerido';
            $valido = 0;
        }

        if(!empty($request->password_registro)  && !empty($request->password_confirmacion_registro))
        {
            if($request->password_registro != $request->password_confirmacion_registro)
            {
                $error['password_confirmacion'] = 'Contraseñas no son iguales';
                $valido = 0;
            }
        }

        if($valido == 1)
        {
            $user->password = Hash::make($request->password_registro);
            if($user->save())
            {
                $datos['estado'] = 1 ;
                $datos['msj'] = 'Contraseña actualizada' ;
                $mensaje_success = 'Contraseña Actualizada';

                $paciente = Paciente::where('id_usuario', Auth::user()->id)->first();
                $paciente->bienvenida = 1;

                if($paciente->save())
                {
                    $datos['liberar_bienvenida']['estado'] = 1;
                    $datos['liberar_bienvenida']['msj'] = 'exito';
                }
                else
                {
                    $datos['liberar_bienvenida']['estado'] = 1;
                    $datos['liberar_bienvenida']['msj'] = 'falla';
                }
            }
            else
            {
                $datos['estado'] = 0 ;
                $datos['msj'] = 'Problemas al Actualizar la Contraseña' ;
            }
        }
        else
        {
            $datos['estado'] = 0 ;
            $datos['msj'] = 'campos requeridos' ;
            $datos['error'] = $error;
        }

        return $datos;
        // if(!empty($mensaje_error))
        //     return back()->with(['error' => $mensaje_error.'\n'.$mensaje_error2, 'titulo_error' => 'Cambio de Contraseña']);
        // else
        // {
        //     //envio de correo
        //     return redirect()->route('home.ingreso',['mensaje' => 'Contraseña actualizada'])->with('mensaje', 'Contraseña actualizada');
        //     // return back()->with( 'mensaje', 'Contraseña actualizada');
        // }
    }

    public function liberarBienvenida()
    {
        $datos = array();

        $paciente = Paciente::where('id_usuario', Auth::user()->id)->first();
        $paciente->bienvenida = 1;

        if($paciente->save())
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'exito';
        }
        else
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'falla';
        }
        return $datos;
    }

    public function buscarPacientePorRut(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        $rut = $request->rut;

        if($valido)
        {
            $paciente = Paciente::where('rut','like', ''.$rut.'%')->get()->first();
            if($paciente)
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registros';
                $datos['registro'] = $paciente;
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
            $datos['error'] = $error;
        }

        return $datos;
    }

    public function registroControlGlicemia(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->alimento))
        {
            $error['alimento'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->postprandial))
        {
            $error['postprandial'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->preprandial))
        {
            $error['preprandial'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $paciente = Paciente::where('id_usuario', Auth::user()->id)->get()->first();
            $registro = new PacienteControlGlicemia();
            $registro->id_paciente = $paciente->id;
            $registro->alimento = $request->alimento;
            $registro->postprandial = $request->postprandial;
            $registro->preprandial = $request->preprandial;
            $registro->noche = $request->noche;
            $registro->observacion = $request->observacion;
            $registro->fecha = date('Y-m-d H:i');

            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'exito';
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

    public function verRegistrosControlGlicemia(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if($valido)
        {
            $paciente = Paciente::where('id_usuario', Auth::user()->id)->get()->first();

            $filtro = array();
            $filtro[] = array('id_paciente', $paciente->id);
            if($request->estado == '')
                $filtro[] = array('estado', 1);
            else
                $filtro[] = array('estado', $request->estado);

            $registros = PacienteControlGlicemia::where($filtro)->get();

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

    public function eliminarRegistroControlGlicemia(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id))
        {
            $error['id'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $registro = PacienteControlGlicemia::find($request->id);

            if($registro)
            {
                $registro->estado = 0;
                if($registro->save())
                {
                    $datos['estado'] = 1;
                    $datos['msj'] = 'registro eliminado';
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'falla en eliminar';
                }
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'registro no encontrado';
        }

        return $datos;

    }



    public function registroControlPeso(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->inicial))
        {
            $error['inicial'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->actual))
        {
            $error['actual'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->estatura))
        {
            $error['estatura'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->imc))
        {
            $error['imc'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->variacion))
        {
            $error['variacion'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->ideal))
        {
            $error['ideal'] = 'campo requerido';
            $valido = 0;
        }
        if($valido)
        {
            $paciente = Paciente::where('id_usuario', Auth::user()->id)->get()->first();
            $registro = new PacienteControlPeso();
            $registro->id_paciente = $paciente->id;
            $registro->inicial = $request->inicial;
            $registro->actual = $request->actual;
            $registro->estatura = $request->estatura;
            $registro->imc = $request->imc;
            $registro->variacion = $request->variacion;
            $registro->ideal = $request->ideal;
            $registro->fecha = date('Y-m-d H:i');

            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'exito';
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

    public function verRegistrosControlPeso(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if($valido)
        {
            $paciente = Paciente::where('id_usuario', Auth::user()->id)->get()->first();

            $filtro = array();
            $filtro[] = array('id_paciente', $paciente->id);
            if($request->estado == '')
                $filtro[] = array('estado', 1);
            else
                $filtro[] = array('estado', $request->estado);

            $registros = PacienteControlPeso::where($filtro)->get();

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

    public function eliminarRegistroControlPeso(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id))
        {
            $error['id'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $registro = PacienteControlPeso::find($request->id);

            if($registro)
            {
                $registro->estado = 0;
                if($registro->save())
                {
                    $datos['estado'] = 1;
                    $datos['msj'] = 'registro eliminado';
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'falla en eliminar';
                }
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'registro no encontrado';
        }

        return $datos;

    }

    public function registroControlPresion(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;
        if(empty($request->sistolica))
        {
            $error['sistolica'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->diastólica))
        {
            $error['diastólica'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->pulso))
        {
            $error['pulso'] = 'campo requerido';
            $valido = 0;
        }
        if($valido)
        {

            $paciente = Paciente::where('id_usuario', Auth::user()->id)->get()->first();
            $registro = new PacienteControlPresion();
            $registro->id_paciente = $paciente->id;
            $registro->sistolica = $request->sistolica;
            $registro->diastólica = $request->diastólica;
            $registro->pulso = $request->pulso;
            $registro->coment = $request->coment;
            $registro->fecha = date('Y-m-d H:i');
            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'exito';
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

    public function verRegistrosControlPresion(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if($valido)
        {
            $paciente = Paciente::where('id_usuario', Auth::user()->id)->get()->first();

            $filtro = array();
            $filtro[] = array('id_paciente', $paciente->id);
            if($request->estado == '')
                $filtro[] = array('estado', 1);
            else
                $filtro[] = array('estado', $request->estado);

            $registros = PacienteControlPresion::where($filtro)->get();

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

    public function eliminarRegistroControlPresion(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id))
        {
            $error['id'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $registro = PacienteControlPresion::find($request->id);

            if($registro)
            {
                $registro->estado = 0;
                if($registro->save())
                {
                    $datos['estado'] = 1;
                    $datos['msj'] = 'registro eliminado';
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'falla en eliminar';
                }
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'registro no encontrado';
        }

        return $datos;

    }
    public function registroControlOxigeno(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->lectura))
        {
            $error['lectura'] = 'campo requerido';
            $valido = 0;
        }


        if($valido)
        {
            $paciente = Paciente::where('id_usuario', Auth::user()->id)->get()->first();
            $registro = new PacienteControlOxigeno();
            $registro->id_paciente = $paciente->id;
            $registro->lectura = $request->lectura;
            $registro->coment = $request->coment;
            $registro->fecha = date('Y-m-d H:i');

            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'exito';
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

    public function verRegistrosControlOxigeno(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if($valido)
        {
            $paciente = Paciente::where('id_usuario', Auth::user()->id)->get()->first();

            $filtro = array();
            $filtro[] = array('id_paciente', $paciente->id);
            if($request->estado == '')
                $filtro[] = array('estado', 1);
            else
                $filtro[] = array('estado', $request->estado);

            $registros = PacienteControlOxigeno::where($filtro)->get();

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

    public function eliminarRegistroControlOxigeno(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id))
        {
            $error['id'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $registro = PacienteControlOxigeno::find($request->id);

            if($registro)
            {
                $registro->estado = 0;
                if($registro->save())
                {
                    $datos['estado'] = 1;
                    $datos['msj'] = 'registro eliminado';
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'falla en eliminar';
                }
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'registro no encontrado';
        }

        return $datos;

    }






    public function registroControlOrina(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->lectura))
        {
            $error['lectura'] = 'campo requerido';
            $valido = 0;
        }


        if($valido)
        {
            $paciente = Paciente::where('id_usuario', Auth::user()->id)->get()->first();
            $registro = new PacienteControlOrina();
            $registro->id_paciente = $paciente->id;
            $registro->lectura = $request->lectura;
            $registro->coment = $request->coment;
            $registro->fecha = date('Y-m-d H:i');

            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'exito';
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

    public function verRegistrosControlOrina(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if($valido)
        {
            $paciente = Paciente::where('id_usuario', Auth::user()->id)->get()->first();

            $filtro = array();
            $filtro[] = array('id_paciente', $paciente->id);
            if($request->estado == '')
                $filtro[] = array('estado', 1);
            else
                $filtro[] = array('estado', $request->estado);

            $registros = PacienteControlOrina::where($filtro)->get();

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

    public function eliminarRegistroControlOrina(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id))
        {
            $error['id'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $registro = PacienteControlOrina::find($request->id);

            if($registro)
            {
                $registro->estado = 0;
                if($registro->save())
                {
                    $datos['estado'] = 1;
                    $datos['msj'] = 'registro eliminado';
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'falla en eliminar';
                }
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'registro no encontrado';
        }

        return $datos;

    }

}
