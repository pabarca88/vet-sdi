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
use App\Models\CertificadoReposo;
use App\Models\ControlObesidad;
use App\Models\Diabete;
use App\Models\ExamenEspecialidad;
use App\Models\ExamenMedico;
use App\Models\Hipertension;
use App\Models\InformeMedico;
use App\Models\Interconsulta;
use App\Models\LogUsersDevices;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use App\Models\OdontogramaPaciente;

use App\Models\PacienteControlGlicemia;
use App\Models\PacienteControlPeso;
use App\Models\PacienteControlPresion;
use App\Models\PacienteControlOxigeno;
use App\Models\PacienteControlOrina;
use App\Models\PacienteHistoricoDatosMedicos;
use App\Models\PacientesDependientes;
use App\Models\Recomendacion;
use App\Models\RecomendacionDetalle;
use App\Models\ResultadoExamen;
use App\Models\TipoExamen;
use App\Models\UsoPersonal;
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
        $paciente->token = md5(uniqid());
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
        // dd(Auth::user()->id);
        $paciente = Paciente::where('id_usuario', Auth::user()->id)->first();
        if($paciente)
        {
            $region = Region::all();
            $prevision = Prevision::all();

            $hora_medica = HoraMedica::select('horas_medicas.id', 'horas_medicas.fecha_consulta', 'horas_medicas.hora_inicio', 'horas_medicas.hora_termino', 'horas_medicas.alias_examen',
                                                'horas_medicas.comentarios_confirmacion', 'horas_medicas.fecha_confirmacion', 'horas_medicas.comentarios_cancelacion', 'horas_medicas.fecha_cancelacion',
                                                'horas_medicas.fecha_realizacion_consulta', 'horas_medicas.id_ficha_atencion', 'horas_medicas.id_profesional', 'horas_medicas.id_lugar_atencion',
                                                'horas_medicas.id_asistente', 'horas_medicas.id_paciente', 'horas_medicas.acomp_representante', 'horas_medicas.acomp_acompanante',
                                                'horas_medicas.acomp_lista', 'horas_medicas.autorizacion_atencion', 'horas_medicas.id_log_users_devices', 'horas_medicas.id_estado',
                                                'profesionales.nombre as nombre_profesional', 'profesionales.apellido_uno as apellido_uno_profesional',
                                                'lugares_atencion.nombre as nombre_lugar_atencion', 'direcciones.direccion as direccion_lugar_atencion', 'direcciones.numero_dir as numero_dir_lugar_atencion',
                                                'especialidades.nombre as nombre_especialidad', 'tipos_especialidad.nombre as nombre_tipo_especialidad', 'sub_tipo_especialidad.nombre as nombre_sub_tipo_especialidad',
                                                'parametros.valor as texto_estado', 'parametros.color as color_estado')
                                        ->join('profesionales', 'profesionales.id', '=', 'horas_medicas.id_profesional')
                                        ->join('especialidades', 'especialidades.id', '=', 'profesionales.id_especialidad')
                                        ->join('tipos_especialidad', 'tipos_especialidad.id', '=', 'profesionales.id_tipo_especialidad')
                                        ->rightJoin('sub_tipo_especialidad', 'sub_tipo_especialidad.id', '=', 'profesionales.id_sub_tipo_especialidad')
                                        ->join('lugares_atencion', 'lugares_atencion.id', '=', 'horas_medicas.id_lugar_atencion')
                                        ->join('direcciones', 'direcciones.id', '=', 'lugares_atencion.id_direccion')
                                        ->join('parametros', function ($join) {
                                            $join->on('parametros.id', '=', 'horas_medicas.id_estado')
                                                    ->where('parametros.referencia', '=', 'Agenda_Estado');
                                        })
                                        ->where('id_paciente', $paciente->id)
                                        // ->whereRaw("fecha_consulta >= NOW() AND hora_inicio >= NOW()")
                                        ->whereRaw("date(fecha_consulta) >= '".date('Y-m-d')."' ")
                                        // ->whereIn('id_estado',[1,2,4,5,6,8])
                                        ->orderBy('fecha_consulta', 'ASC')
                                        ->orderBy('hora_inicio', 'DESC')
                                        ->get();

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
                    return view('app.paciente.escritorio_paciente')->with(['paciente' => $paciente, 'hora_medica' => $hora_medica]);
            }

            /** formulario nuevos */
            return view('auth.Registros.registro_paciente')->with(['region' => $region, 'prevision' => $prevision]);
        }
        else
        {
            // return view('app.home.acceso');
            $region = Region::all();
            $prevision = Prevision::all();
            /** formulario nuevos */
            return view('auth.Registros.registro_paciente')->with(['region' => $region, 'prevision' => $prevision]);
        }
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

            $paciente = Paciente::where('id_usuario', $id_usuario_)->first();
            $fichas = FichaAtencion::where('id_paciente', $paciente->id)
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

            $profesional_ = Profesional::with('Especialidad')->find($f->id_profesional);
            $profesion[$profesional_->Especialidad->id] = $profesional_->Especialidad->nombre;

            // busqueda de imagen
            $array_rut = explode('-',$profesional_->rut);
            $nombre_imagen = asset('images/iconos/usuario_profesional.svg');

            if(file_exists(public_path('images/img_perfil/'.$array_rut[0].'.png')))
            {
                $nombre_imagen = asset('images/img_perfil/'.$array_rut[0].'.png');
                $profesional_temp['img_profesional2'] = $nombre_imagen;
            }
            $profesional_temp = $f->profesional()->first();
            $profesional_temp['img_profesional'] = $nombre_imagen;


            array_push($profesional, $profesional_temp);
        }

        foreach ($fichas_desvinculados as $d) {
            array_push($desvinculados, $d->id_profesional);
        }

        $id_usuario = Auth::user()->id;

        //$lista_especialidad = array_unique($profesion);
        $lista_especialidad = $profesion;

        // var_dump(Auth::user()->id);
        // echo json_encode($profesional);
        // die();
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
        //$registro = Funciones::validTokenPermApp($request->token);


        //capturamos el id_usuario receptor
        //$id_usuario = $registro['id_user_recept'];

        $paciente = Paciente::where('id_usuario',Auth::user()->id)->first();

        /* PACIENTE */
        $paciente = Paciente::where('id_usuario', $paciente->id_usuario)->first();
  
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

        // $direccion = (object)$direccion = array(
        //     'direccion' => $direccion_nombre,
        //     'numero' => $numero_dir,
        //     'ciudad' => $ciudad_nombre,
        //     'region' => $region_nombre,
        // );

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

        }
        else
        {
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
        }
        else
        {
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
        }
        else
        {
            $grupo_sanguineo = (object) array(
                'id'=> 0,
                'nombre_gs'=> 'N/A',
                'descripcion_gs'=> 'N/A'
            );
        }

        /* ANTECEDENTES */
        $antecedentes = Antecedente::where('id_paciente',$paciente->id)->with('users','paciente','tipo_antecendente','profesional')->get();
        foreach ($antecedentes as $valor)
        {
            $valor['antecedente_data'] = json_decode($valor['data']);
        }

        /** RESPONSABLES */
        $responsables = '';
        /** validar si es dependiente */
        $array_id_responsable = PacientesDependientes::where('id_paciente', $paciente->id)->pluck('id_responsable')->toArray();
        if(count($array_id_responsable) > 0)
        {
            $responsables = Paciente::whereIn('id', $array_id_responsable)->get();
        }

        /** RECETAS */
        $fecha_actual = date("d-m-Y");
        $regisrto_result = array();
        $lista_recetas = Recomendacion::whereDate('created_at', '>=', date("Y-m-d",strtotime($fecha_actual."- 1 week")) )->where('activo',$paciente->id)->pluck('id')->toArray();
        if($lista_recetas)
        {
            $registros = Recomendacion::whereIn('id', $lista_recetas)->get();
            if($registros)
            {
                $regisrto_result = array();
                foreach ($registros as $key => $value)
                {
                    $detalle = RecomendacionDetalle::where('id_recomendacion',$value->id)->get();
                    $detalle_temp = array();
                    if($detalle)
                    {
                        $detalle_temp = array();
                        foreach ($detalle as $key_det => $value_det)
                        {
                            $detalle_temp[] = array(
                                'id' => $value_det->id,
                                'id_receta' => $value_det->id_recomendacion,
                                'id_tipo_control' => decrypt($value_det->control),
                                'id_producto' => decrypt($value_det->id_articulo),
                                'producto' => decrypt($value_det->articulo),
                                'farmaco' => decrypt($value_det->componente),
                                'id_presentacion' => decrypt($value_det->id_apariencia),
                                'presentacion' => decrypt($value_det->apariencia),
                                'id_receta_dosis' => decrypt($value_det->id_cuota),
                                'posologia' => decrypt($value_det->cuota),
                                'id_via_administracion' => decrypt($value_det->id_regimen),
                                'via_administracion' => decrypt($value_det->regimen),
                                'id_periodo' => decrypt($value_det->id_lapso),
                                'periodo' => decrypt($value_det->lapso),
                                'uso_cronico' => decrypt($value_det->uso_frecuente),
                                'cantidad_compra' => decrypt($value_det->volumen_compra),
                                'cantidad' => decrypt($value_det->volumen),
                                'cantidad_vendida' => decrypt($value_det->volumen_entregado),
                                'comentario' => decrypt($value_det->comentario),
                                'token_doc' => $value_det->cod_doc,
                                'estado' => $value_det->estado,
                                'created_at' => $value_det->created_at,
                                'updated_at' => $value_det->updated_at,
                            );
                        }
                    }

                    $regisrto_result[] = array(
                        'id' => $value->id,
                        'id_ficha_atencion' => $value->atencion,
                        'id_ingreso_paciente' => $value->salida,
                        'id_recuperacion' => $value->herir,
                        'id_sala' => $value->cuadro,
                        'id_paciente' => $value->activo,
                        'id_profesional' => $value->aficionado,
                        'id_tipo_control' => $value->control,
                        'token_doc' => $value->cod_doc,
                        'token_auto' => $value->cod_auto,
                        'pdf' => $value->info,
                        'estado' => $value->estado,
                        'detalle' => $detalle_temp,
                        'created_at' => $value->created_at,
                        'updated_at' => $value->updated_at,
                    );
                }
            }
        }

        /** Control enfermedades Cronicas */
        $control_enfer_cronicas = array();
        /** obsidad */
        $obesidad = ControlObesidad::where('id_paciente', $paciente->id)->get();
        if($obesidad)
        {
            foreach ($obesidad as $key => $value)
            {
                $temp = array(
                    'fecha' => date('d-m-Y', strtotime($value->created_at)),
                    'tipo' => 'Obesidad',
                    'detalle' => array(
                        'Peso' => $value->peso,
                        'Variación' => $value->variacion,
                        'Ideal' => $value->ideal,
                    )
                );
                $control_enfer_cronicas[] = $temp;
            }
        }

        /** diabetes */
        $diabetes = Diabete::where('id_paciente', $paciente->id)->get();
        if($diabetes)
        {
            foreach ($diabetes as $key => $value)
            {
                $temp = array(
                    'fecha' => date('d-m-Y', strtotime($value->created_at)),
                    'tipo' => 'Diabetes',
                    'detalle' => array(
                        'Peso' => $value->peso,
                        'Piés' => $value->pies,
                        'HG A1c' => $value->hgac1,
                        'Colesterol' => $value->colesterol,
                        'Creatina' => $value->creatina,
                        'Glicosilada postprandial' => $value->glicosilada_postprandial,
                        'Glicosilada ayuno' => $value->glicosinada_ayuno,
                    )
                );
                $control_enfer_cronicas[] = $temp;
            }
        }

        /** hipertensiones */
        $hipertension = Hipertension::where('id_paciente', $paciente->id)->get();
        if($hipertension)
        {
            foreach ($hipertension as $key => $value)
            {
                $temp = array(
                    'fecha' => date('d-m-Y', strtotime($value->created_at)),
                    'tipo' => 'Hipertensión',
                    'detalle' => array(
                        'Presión Sistólica' => $value->sistolica,
                        'Presión Diastólica' => $value->diastolica,
                        'Presión Ideal' => $value->ideal,
                    )
                );
                $control_enfer_cronicas[] = $temp;
            }
        }


        /* ATENCIONES MEDICAS */
		$profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $fichas = FichaAtencion::where('id_paciente', $paciente->id)->where('id_profesional', $profesional->id)->where('finalizada', 1)->get();
        if($fichas->count() == 0){
             $fichas = FichaAtencion::where('id_paciente', $paciente->id)->where('finalizada', 1)->get();
        }
        // $fichas = FichaAtencion::where('id_paciente', $paciente->id)->where('finalizada', 1)->get();
        $especialidad = Especialidad::where('estado',1)->get();
        $sub_tipo_especialidad = SubTipoEspecialidad::where('estado',1)->get();

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

        /* --------------------------- HTML MODAL -------------------------- */
        //MODALS - Externos
        $contacto_emergencia_html = "
            <table class='table table-bordered table-xs'>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido Materno</th>
                        <th>Apellido Paterno</th>
                        <th>Rut</th>
                        <th>Edad</th>
                        <th>Email</th>
                        <th>Fecha Nacimiento</th>
                        <th>Teléfono</th>
                        <th>Parentezco</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>$contacto_emergencia->nombre</td>
                        <td>$contacto_emergencia->apellido_uno</td>
                        <td>$contacto_emergencia->apellido_dos</td>

                        <td>$contacto_emergencia->rut</td>
                        <td>$contacto_emergencia->edad</td>
                        <td>$contacto_emergencia->email</td>

                        <td>$contacto_emergencia->fecha_nac</td>
                        <td>$contacto_emergencia->telefono</td>
                        <td>$contacto_emergencia->parentezco</td>
                    </tr>
                </tbody>
            </table>
        ";

        $responsables_html = "
            <table class='table table-bordered table-xs'>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido Materno</th>
                        <th>Apellido Paterno</th>
                        <th>Rut</th>
                        <th>Email</th>
                        <th>Teléfono </th>
                    </tr>
                </thead>
                <tbody>";
                if($responsables)
                {
                    foreach ($responsables as $key => $value)
                    {
                        $responsables_html .= "<tr>
                            <td>$value->nombres</td>
                            <td>$value->apellido_uno</td>
                            <td>$value->apellido_dos</td>
                            <td>$value->rut</td>
                            <td>$value->email</td>
                            <td>$value->telefono</td>
                        </tr>";
                    }
                }
        $responsables_html .=     "</tbody>
            </table>";

        // $regisrto_result
        $receta_activa_html = "
            <table class='table table-bordered table-xs'>
            <thead>
                <tr>
                    <th>Fecha Receta</th>
                    <th>Producto</th>
                    <th>Presentación</th>
                    <th>Posologia</th>
                    <th>Via<br/>Administracion</th>
                    <th>Periodo</th>
                    <th>Cantidad Compra</th>
                </tr>
            </thead>
            <tbody>";
            if($regisrto_result)
            {
                foreach ($regisrto_result as $key => $value)
                {
                    foreach ($value['detalle'] as $key_detalle => $value_detalle)
                    {
                        $receta_activa_html .= "
                            <tr>
                                <td>".date('d-m-Y', strtotime($value['created_at']))."</td>
                                <td>".$value_detalle['producto']."<br/><span style=\"font-size:10px;\">".$value_detalle['farmaco']."</span></td>
                                <td>".$value_detalle['presentacion']."</td>
                                <td>".$value_detalle['posologia']."</td>
                                <td>".$value_detalle['via_administracion']."</td>
                                <td>".$value_detalle['periodo']."</td>
                                <td>".$value_detalle['cantidad_compra']."</td>
                            </tr>";
                    }
                }
            }
        $receta_activa_html .= "
            </tbody>
        </table>";

        $datos = (object)array(
            'contacto_emergencia' =>  $contacto_emergencia_html,
            'tratamientos_activos' => $receta_activa_html,
            'confidencial' => '',
            'responsables' => $responsables_html,

        );


        /* FIN --------------------------- HTML MODAL -------------------------- */

        $odontograma = $this->dameOdontogramaPaciente($paciente->id);

        return view('ficha_medica', [
            'id_usuario' => Auth::user()->id,
            'odontograma' => $odontograma,
            'paciente' => $paciente,
            // 'contacto_emergencia' => $contacto_emergencia,
            'antecedentes_paciente' => $antecedentes_paciente,
            'grupo_sanguineo' => $grupo_sanguineo,
            'antecedentes' => $antecedentes,
            'token' => $request->token,
            'fichas' => $fichas,
            'especialidad' => $especialidad,
            'sub_tipo_especialidad' => $sub_tipo_especialidad,
            'direccion' => $direccion,
            'datos' => $datos, // TEMPLATE PARA USO EN MODAL INCLUDE
            'tratamiento_activo' => $regisrto_result,
            'examenes_especialidad_realizados' => $examenes_especialidad_realizados,
            'resultado_examen' => $resultado_examen,
            'control_enfer_cronicas' => $control_enfer_cronicas,

        ]);
    }

    public function getMiFichMedica(Request $request){
        return $request;
        //capturamos el id_usuario receptor
        $id_usuario = $request->id_usuario;

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

        // $direccion = (object)$direccion = array(
        //     'direccion' => $direccion_nombre,
        //     'numero' => $numero_dir,
        //     'ciudad' => $ciudad_nombre,
        //     'region' => $region_nombre,
        // );

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

        }
        else
        {
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
        }
        else
        {
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
        }
        else
        {
            $grupo_sanguineo = (object) array(
                'id'=> 0,
                'nombre_gs'=> 'N/A',
                'descripcion_gs'=> 'N/A'
            );
        }

        /* ANTECEDENTES */
        $antecedentes = Antecedente::where('id_paciente',$paciente->id)->with('users','paciente','tipo_antecendente','profesional')->get();
        foreach ($antecedentes as $valor)
        {
            $valor['antecedente_data'] = json_decode($valor['data']);
        }

        /** RESPONSABLES */
        $responsables = '';
        /** validar si es dependiente */
        $array_id_responsable = PacientesDependientes::where('id_paciente', $paciente->id)->pluck('id_responsable')->toArray();
        if(count($array_id_responsable) > 0)
        {
            $responsables = Paciente::whereIn('id', $array_id_responsable)->get();
        }

        /** RECETAS */
        $fecha_actual = date("d-m-Y");
        $regisrto_result = array();
        $lista_recetas = Recomendacion::whereDate('created_at', '>=', date("Y-m-d",strtotime($fecha_actual."- 1 week")) )->where('activo',$paciente->id)->pluck('id')->toArray();
        if($lista_recetas)
        {
            $registros = Recomendacion::whereIn('id', $lista_recetas)->get();
            if($registros)
            {
                $regisrto_result = array();
                foreach ($registros as $key => $value)
                {
                    $detalle = RecomendacionDetalle::where('id_recomendacion',$value->id)->get();
                    $detalle_temp = array();
                    if($detalle)
                    {
                        $detalle_temp = array();
                        foreach ($detalle as $key_det => $value_det)
                        {
                            $detalle_temp[] = array(
                                'id' => $value_det->id,
                                'id_receta' => $value_det->id_recomendacion,
                                'id_tipo_control' => decrypt($value_det->control),
                                'id_producto' => decrypt($value_det->id_articulo),
                                'producto' => decrypt($value_det->articulo),
                                'farmaco' => decrypt($value_det->componente),
                                'id_presentacion' => decrypt($value_det->id_apariencia),
                                'presentacion' => decrypt($value_det->apariencia),
                                'id_receta_dosis' => decrypt($value_det->id_cuota),
                                'posologia' => decrypt($value_det->cuota),
                                'id_via_administracion' => decrypt($value_det->id_regimen),
                                'via_administracion' => decrypt($value_det->regimen),
                                'id_periodo' => decrypt($value_det->id_lapso),
                                'periodo' => decrypt($value_det->lapso),
                                'uso_cronico' => decrypt($value_det->uso_frecuente),
                                'cantidad_compra' => decrypt($value_det->volumen_compra),
                                'cantidad' => decrypt($value_det->volumen),
                                'cantidad_vendida' => decrypt($value_det->volumen_entregado),
                                'comentario' => decrypt($value_det->comentario),
                                'token_doc' => $value_det->cod_doc,
                                'estado' => $value_det->estado,
                                'created_at' => $value_det->created_at,
                                'updated_at' => $value_det->updated_at,
                            );
                        }
                    }

                    $regisrto_result[] = array(
                        'id' => $value->id,
                        'id_ficha_atencion' => $value->atencion,
                        'id_ingreso_paciente' => $value->salida,
                        'id_recuperacion' => $value->herir,
                        'id_sala' => $value->cuadro,
                        'id_paciente' => $value->activo,
                        'id_profesional' => $value->aficionado,
                        'id_tipo_control' => $value->control,
                        'token_doc' => $value->cod_doc,
                        'token_auto' => $value->cod_auto,
                        'pdf' => $value->info,
                        'estado' => $value->estado,
                        'detalle' => $detalle_temp,
                        'created_at' => $value->created_at,
                        'updated_at' => $value->updated_at,
                    );
                }
            }
        }

        /** Control enfermedades Cronicas */
        $control_enfer_cronicas = array();
        /** obsidad */
        $obesidad = ControlObesidad::where('id_paciente', $paciente->id)->get();
        if($obesidad)
        {
            foreach ($obesidad as $key => $value)
            {
                $temp = array(
                    'fecha' => date('d-m-Y', strtotime($value->created_at)),
                    'tipo' => 'Obesidad',
                    'detalle' => array(
                        'Peso' => $value->peso,
                        'Variación' => $value->variacion,
                        'Ideal' => $value->ideal,
                    )
                );
                $control_enfer_cronicas[] = $temp;
            }
        }

        /** diabetes */
        $diabetes = Diabete::where('id_paciente', $paciente->id)->get();
        if($diabetes)
        {
            foreach ($diabetes as $key => $value)
            {
                $temp = array(
                    'fecha' => date('d-m-Y', strtotime($value->created_at)),
                    'tipo' => 'Diabetes',
                    'detalle' => array(
                        'Peso' => $value->peso,
                        'Piés' => $value->pies,
                        'HG A1c' => $value->hgac1,
                        'Colesterol' => $value->colesterol,
                        'Creatina' => $value->creatina,
                        'Glicosilada postprandial' => $value->glicosilada_postprandial,
                        'Glicosilada ayuno' => $value->glicosinada_ayuno,
                    )
                );
                $control_enfer_cronicas[] = $temp;
            }
        }

        /** hipertensiones */
        $hipertension = Hipertension::where('id_paciente', $paciente->id)->get();
        if($hipertension)
        {
            foreach ($hipertension as $key => $value)
            {
                $temp = array(
                    'fecha' => date('d-m-Y', strtotime($value->created_at)),
                    'tipo' => 'Hipertensión',
                    'detalle' => array(
                        'Presión Sistólica' => $value->sistolica,
                        'Presión Diastólica' => $value->diastolica,
                        'Presión Ideal' => $value->ideal,
                    )
                );
                $control_enfer_cronicas[] = $temp;
            }
        }


        /* ATENCIONES MEDICAS */
		$profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $fichas = FichaAtencion::where('id_paciente', $paciente->id)->where('id_profesional', $profesional->id)->where('finalizada', 1)->get();
        if($fichas->count() == 0){
             $fichas = FichaAtencion::where('id_paciente', $paciente->id)->where('finalizada', 1)->get();
        }
        // $fichas = FichaAtencion::where('id_paciente', $paciente->id)->where('finalizada', 1)->get();
        $especialidad = Especialidad::where('estado',1)->get();
        $sub_tipo_especialidad = SubTipoEspecialidad::where('estado',1)->get();

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

        /* --------------------------- HTML MODAL -------------------------- */
        //MODALS - Externos
        $contacto_emergencia_html = "
            <table class='table table-bordered table-xs'>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido Materno</th>
                        <th>Apellido Paterno</th>
                        <th>Rut</th>
                        <th>Edad</th>
                        <th>Email</th>
                        <th>Fecha Nacimiento</th>
                        <th>Teléfono</th>
                        <th>Parentezco</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>$contacto_emergencia->nombre</td>
                        <td>$contacto_emergencia->apellido_uno</td>
                        <td>$contacto_emergencia->apellido_dos</td>

                        <td>$contacto_emergencia->rut</td>
                        <td>$contacto_emergencia->edad</td>
                        <td>$contacto_emergencia->email</td>

                        <td>$contacto_emergencia->fecha_nac</td>
                        <td>$contacto_emergencia->telefono</td>
                        <td>$contacto_emergencia->parentezco</td>
                    </tr>
                </tbody>
            </table>
        ";

        $responsables_html = "
            <table class='table table-bordered table-xs'>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido Materno</th>
                        <th>Apellido Paterno</th>
                        <th>Rut</th>
                        <th>Email</th>
                        <th>Teléfono </th>
                    </tr>
                </thead>
                <tbody>";
                if($responsables)
                {
                    foreach ($responsables as $key => $value)
                    {
                        $responsables_html .= "<tr>
                            <td>$value->nombres</td>
                            <td>$value->apellido_uno</td>
                            <td>$value->apellido_dos</td>
                            <td>$value->rut</td>
                            <td>$value->email</td>
                            <td>$value->telefono</td>
                        </tr>";
                    }
                }
        $responsables_html .=     "</tbody>
            </table>";

        // $regisrto_result
        $receta_activa_html = "
            <table class='table table-bordered table-xs'>
            <thead>
                <tr>
                    <th>Fecha Receta</th>
                    <th>Producto</th>
                    <th>Presentación</th>
                    <th>Posologia</th>
                    <th>Via<br/>Administracion</th>
                    <th>Periodo</th>
                    <th>Cantidad Compra</th>
                </tr>
            </thead>
            <tbody>";
            if($regisrto_result)
            {
                foreach ($regisrto_result as $key => $value)
                {
                    foreach ($value['detalle'] as $key_detalle => $value_detalle)
                    {
                        $receta_activa_html .= "
                            <tr>
                                <td>".date('d-m-Y', strtotime($value['created_at']))."</td>
                                <td>".$value_detalle['producto']."<br/><span style=\"font-size:10px;\">".$value_detalle['farmaco']."</span></td>
                                <td>".$value_detalle['presentacion']."</td>
                                <td>".$value_detalle['posologia']."</td>
                                <td>".$value_detalle['via_administracion']."</td>
                                <td>".$value_detalle['periodo']."</td>
                                <td>".$value_detalle['cantidad_compra']."</td>
                            </tr>";
                    }
                }
            }
        $receta_activa_html .= "
            </tbody>
        </table>";

        $datos = (object)array(
            'contacto_emergencia' =>  $contacto_emergencia_html,
            'tratamientos_activos' => $receta_activa_html,
            'confidencial' => '',
            'responsables' => $responsables_html,

        );


        /* FIN --------------------------- HTML MODAL -------------------------- */

        $odontograma = $this->dameOdontogramaPaciente($paciente->id);

        return view('ficha_medica', [
            'id_usuario' => $id_usuario,
            'odontograma' => $odontograma,
            'paciente' => $paciente,
            // 'contacto_emergencia' => $contacto_emergencia,
            'antecedentes_paciente' => $antecedentes_paciente,
            'grupo_sanguineo' => $grupo_sanguineo,
            'antecedentes' => $antecedentes,
            'token' => $request->token,
            'fichas' => $fichas,
            'especialidad' => $especialidad,
            'sub_tipo_especialidad' => $sub_tipo_especialidad,
            'direccion' => $direccion,
            'datos' => $datos, // TEMPLATE PARA USO EN MODAL INCLUDE
            'tratamiento_activo' => $regisrto_result,
            'examenes_especialidad_realizados' => $examenes_especialidad_realizados,
            'resultado_examen' => $resultado_examen,
            'control_enfer_cronicas' => $control_enfer_cronicas,

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

    public function dameOdontogramaPaciente($id_paciente, $id_ficha_atencion = null, $id_lugar_atencion = null,$id_presupuesto = null){
        $query = OdontogramaPaciente::select(
            'odontogramas_pacientes.*',
            'diagnosticos_dental.descripcion',
            'diagnosticos_dental.cantidad_bloques',
            'diagnosticos_dental.valor',
            'tratamientos_dental.descripcion as diagnostico')
            ->join('diagnosticos_dental', 'odontogramas_pacientes.tratamiento', '=', 'diagnosticos_dental.descripcion')
            ->join('tratamientos_dental', 'odontogramas_pacientes.diagnostico', '=', 'tratamientos_dental.id')
            ->where('odontogramas_pacientes.id_paciente', $id_paciente);
            // ->where('odontogramas_pacientes.id_ficha_atencion', $id_ficha_atencion)
            // ->where('odontogramas_pacientes.id_lugar_atencion', $id_lugar_atencion);

            // Verificar si el parámetro $id_presupuesto no es nulo
            if (!is_null($id_presupuesto)) {
                $query->where('odontogramas_pacientes.id_presupuesto', $id_presupuesto);
            }

            // Obtener los resultados
            $odontogramas = $query->get();

            return $odontogramas;
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
        $direccion_paciente = Direccion::where('id',$paciente->id_direccion)->first();
        $direccion_id_ciudad_paciente = '';
        $direccion_txt_ciudad_paciente = '';
        $direccion_region_paciente = '';
        $direccion_id_region_paciente = '';
        $direccion_txt_region_paciente = '';

        $regiones = Region::all();
        $ciudades = Ciudad::all();

        if($direccion_paciente)
        {
            $direccion_id_ciudad_paciente = $direccion_paciente->id_ciudad;
            $direccion_region_paciente = Ciudad::select('nombre','id_region')->where('id',$direccion_id_ciudad_paciente)->first();

            if($direccion_region_paciente)
            {
                $direccion_txt_ciudad_paciente = $direccion_region_paciente->nombre;

                $ciudades = Ciudad::where('id_region', $direccion_region_paciente->id_region)->get();
                $direccion_id_region_paciente = $direccion_region_paciente->id_region;

                $direccion_txt_region_paciente_temp = Region::find($direccion_id_region_paciente);
                $direccion_txt_region_paciente = $direccion_txt_region_paciente_temp->nombre;
            }
        }

        $previsiones = Prevision::all();

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

        $log_datos_medicos = PacienteHistoricoDatosMedicos::select( 'paciente_historico_datos_medicos.id', 'paciente_historico_datos_medicos.id_paciente', 'paciente_historico_datos_medicos.id_profesional', 'paciente_historico_datos_medicos.datos', 'paciente_historico_datos_medicos.created_at',
                                                        'profesionales.nombre', 'profesionales.apellido_uno', 'profesionales.apellido_dos', 'profesionales.rut',
                                                        'especialidades.nombre as especialidad', 'tipos_especialidad.nombre as tipo_especialidad', 'sub_tipo_especialidad.nombre as sub_tipo_especialidad')
                                    ->join('profesionales','profesionales.id', '=', 'paciente_historico_datos_medicos.id_profesional')
                                    ->join('especialidades','especialidades.id', '=', 'profesionales.id_especialidad')
                                    ->join('tipos_especialidad','tipos_especialidad.id', '=', 'profesionales.id_tipo_especialidad')
                                    ->leftJoin('sub_tipo_especialidad','sub_tipo_especialidad.id', '=', 'profesionales.id_sub_tipo_especialidad')
                                    ->where('id_paciente', $paciente->id)
                                    ->orderBy('created_at', 'DESC')
                                    ->get();


        // echo json_encode($log_datos_medicos);
        // die();

        return view('app.paciente.perfil_paciente',
            [
                'userData' => $userData,
                'paciente' => $paciente,
                'direccion_paciente' => $direccion_paciente,
                'direccion_id_ciudad_paciente' => $direccion_id_ciudad_paciente,
                'direccion_txt_ciudad_paciente' => $direccion_txt_ciudad_paciente,
                'direccion_id_region_paciente' => $direccion_id_region_paciente,
                'direccion_txt_region_paciente' => $direccion_txt_region_paciente,
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
                'log_datos_medicos' => $log_datos_medicos,
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

        // $fichas = FichaAtencion::where('id_paciente', Auth::user()->id)->get();
        // return view('app.paciente.receta.mis_recetas', ['fichas' => $fichas]);

        $recetas = '';

        $paciente = Paciente::where('id_usuario', Auth::user()->id)->first();

        $request_receta = new Request(array(
            'id_paciente' => $paciente->id,
        ));
        $recetas_temp = (object)RecomendacionController::verRecomendaciones($request_receta);
        if($recetas_temp->estado == 1)
        {
            foreach ($recetas_temp->registros as $key => $value)
            {
                // $recetas_temp[$key]['profesional'] = Profesional::select('id','nombre', 'apellido_uno', 'apellido_dos', 'rut' )->where('id', $value['id_profesional'])->first();
                $recetas_temp->registros[$key]['profesional'] = Profesional::select('id','nombre', 'apellido_uno', 'apellido_dos', 'rut', 'id_tipo_especialidad', 'id_sub_tipo_especialidad')
                                                                    ->with(['TipoEspecialidad'=>function($query){
                                                                        $query->select('id', 'nombre');
                                                                    }])
                                                                    ->with(['SubTipoEspecialidad'=>function($query){
                                                                        $query->select('id', 'nombre');
                                                                    }])
                                                                    ->where('id', $value['id_profesional'])->first();
                unset($recetas_temp->registros[$key]['detalle']);
            }
            $recetas = $recetas_temp->registros;
        }

        return view('app.paciente.receta.mis_recetas', ['recetas' => $recetas]);
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

        $tipo_examen = TipoExamen::all();

        return view('app.paciente.receta.mis_examenes')->with([
            'examenes_especialidad_realizados' => $examenes_especialidad_realizados,
            'resultado_examen' => $resultado_examen,
            'tipo_examen' => $tipo_examen,
        ]);
    }

    public function receta_miscertificados()
    {
        $paciente = Paciente::where('id_usuario', Auth::user()->id)->first();
        // $fichas = FichaAtencion::where('id_paciente', $paciente->id)->get();
        $certificado_reposo = CertificadoReposo::with(['Profesional' => function($query){
                                        $query->select('id','nombre', 'apellido_uno', 'apellido_dos', 'id_especialidad', 'id_tipo_especialidad', 'id_sub_tipo_especialidad')
                                                    ->with(['Especialidad' => function($query2){
                                                        $query2->select('id', 'nombre');
                                                    }])
                                                    ->with(['TipoEspecialidad' => function($query){
                                                        $query->select('id', 'nombre');
                                                    }])
                                                    ->with(['SubTipoEspecialidad' => function($query){
                                                        $query->select('id', 'nombre');
                                                    }])
                                                    ;
                                    }])
                                    ->where('id_paciente', $paciente->id)->get();

        $interconsulta = Interconsulta::with(['profesional' => function($query){
                                        $query->select('id','nombre', 'apellido_uno', 'apellido_dos', 'id_especialidad', 'id_tipo_especialidad', 'id_sub_tipo_especialidad')
                                                    ->with(['Especialidad' => function($query){
                                                        $query->select('id', 'nombre');
                                                    }])
                                                    ->with(['TipoEspecialidad' => function($query){
                                                        $query->select('id', 'nombre');
                                                    }])
                                                    ->with(['SubTipoEspecialidad' => function($query){
                                                        $query->select('id', 'nombre');
                                                    }])
                                                    ;
                                    }])
                                    ->with(['ProfesionalInter' => function($query){
                                        $query->select('id','nombre', 'apellido_uno', 'apellido_dos', 'id_especialidad', 'id_tipo_especialidad', 'id_sub_tipo_especialidad')
                                                    ->with(['Especialidad' => function($query){
                                                        $query->select('id', 'nombre');
                                                    }])
                                                    ->with(['TipoEspecialidad' => function($query){
                                                        $query->select('id', 'nombre');
                                                    }])
                                                    ->with(['SubTipoEspecialidad' => function($query){
                                                        $query->select('id', 'nombre');
                                                    }])
                                                    ;
                                    }])
                                    ->with(['ProfesionalResp' => function($query){
                                        $query->select('id','nombre', 'apellido_uno', 'apellido_dos', 'id_especialidad', 'id_tipo_especialidad', 'id_sub_tipo_especialidad')
                                                    ->with(['Especialidad' => function($query){
                                                        $query->select('id', 'nombre');
                                                    }])
                                                    ->with(['TipoEspecialidad' => function($query){
                                                        $query->select('id', 'nombre');
                                                    }])
                                                    ->with(['SubTipoEspecialidad' => function($query){
                                                        $query->select('id', 'nombre');
                                                    }])
                                                    ;
                                    }])
                                    ->where('id_paciente', $paciente->id)->get();
        // ProfesionalInter
        // ProfesionalResp
        $informe_medico = InformeMedico::with(['Profesional' => function($query){
                                        $query->select('id','nombre', 'apellido_uno', 'apellido_dos', 'id_especialidad', 'id_tipo_especialidad', 'id_sub_tipo_especialidad')
                                                    ->with(['Especialidad' => function($query){
                                                        $query->select('id', 'nombre');
                                                    }])
                                                    ->with(['TipoEspecialidad' => function($query){
                                                        $query->select('id', 'nombre');
                                                    }])
                                                    ->with(['SubTipoEspecialidad' => function($query){
                                                        $query->select('id', 'nombre');
                                                    }])
                                                    ;
                                    }])
                                    ->where('id_paciente', $paciente->id)->get();

        $uso_personal = UsoPersonal::with(['profesional' => function($query){
                                        $query->select('id','nombre', 'apellido_uno', 'apellido_dos', 'id_especialidad', 'id_tipo_especialidad', 'id_sub_tipo_especialidad')
                                                    ->with(['Especialidad' => function($query){
                                                        $query->select('id', 'nombre');
                                                    }])
                                                    ->with(['TipoEspecialidad' => function($query){
                                                        $query->select('id', 'nombre');
                                                    }])
                                                    ->with(['SubTipoEspecialidad' => function($query){
                                                        $query->select('id', 'nombre');
                                                    }])
                                                    ;
                                    }])
                                    ->where('id_paciente', $paciente->id)->get();


        return view('app.paciente.receta.mis_certificados', [
            'certificado_reposo' => $certificado_reposo,
            'interconsulta' => $interconsulta,
            'informe_medico' => $informe_medico,
            'uso_personal' => $uso_personal,
        ]);
    }

    public function receta_mislicencias()
    {
        $paciente = Paciente::where('id_usuario', Auth::user()->id)->first();
        $fichas = FichaAtencion::where('id_paciente', $paciente->id)->get();

        return view('app.paciente.receta.mis_licencias', ['fichas' => $fichas]);
    }

    public function receta_misdocumentos()
    {
        $paciente = Paciente::where('id_usuario', Auth::user()->id)->first();
        $fichas = FichaAtencion::where('id_paciente', $paciente->id)->get();



        return view('app.paciente.receta.mis_documentos', ['fichas' => $fichas]);
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

        $user = User::find($paciente->id_usuario);
        if( $user->name != $nombre . ' ' . $apellido_uno )
        {
            $user->name = $nombre . ' ' . $apellido_uno;
            $user->save();
        }

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

        $user = User::find($paciente->id_usuario);
        if( $user->email != $email )
        {
            $user->email = $email;
            $user->save();
        }

        return json_encode(['success' => true]);

        // return redirect()->route('paciente.perfil');
    }

    public function editdirec(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->perfil_dire))
        {
            $valido=0;
            $error['Direccion'] = "Campo requerido.";
        }
        if(empty($request->perfil_region))
        {
            $valido=0;
            $error['Region'] = "Campo requerido.";
        }
        if(empty($request->perfil_ciudad))
        {
            $valido=0;
            $error['Ciudad'] = "Campo requerido.";
        }
        if(empty($request->perfil_numero_dir))
        {
            $valido=0;
            $error['Numero'] = "Campo requerido.";
        }

        if($valido)
        {
            $perfil_dire = $request->perfil_dire;
            $ciudad = $request->perfil_ciudad;
            $numero_dir = $request->perfil_numero_dir;
            $paciente = Paciente::where('id_usuario', Auth::user()->id)->first();
            $direccion = Direccion::where('id', $paciente->id_direccion)->first();

            if($direccion)
            {
                $direccion->direccion = $perfil_dire;
                $direccion->numero_dir = $numero_dir;
                $direccion->id_ciudad = $ciudad;

                if($direccion->save())
                {
                    $datos['estado'] = 1;
                    $datos['msj'] = 'Exito';
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'Falla';
                }
            }
            else
            {
                /** crear direccion*/
                $nueva_direccion = new Direccion();
                $nueva_direccion->direccion = $perfil_dire;
                $nueva_direccion->numero_dir = $numero_dir;
                $nueva_direccion->id_ciudad = $ciudad;

                if($nueva_direccion->save())
                {
                    $datos['estado'] = 1;
                    $datos['msj'] = 'exito';

                    $paciente->id_direccion = $nueva_direccion->id;
                    if( $paciente->save() )
                    {
                        $datos['update_paciente']['estado'] = 1;
                        $datos['update_paciente']['msj'] = 'exito';
                    }
                    else
                    {
                        $datos['update_paciente']['estado'] = 0;
                        $datos['update_paciente']['msj'] = 'falla';
                    }
                }
                else
                {
                    $datos['direccion']['estado'] = 0;
                    $datos['direccion']['msj'] = 'falla';
                }
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

            if($info_depen)
            {
                /** BUSCAR RESPONSABLES */
                $filtro_temp = array();
                $filtro_temp[] = array('id_dependiente', $info_depen->id_paciente);
                $registro_depen = AcompananteDependiente::where($filtro_temp)->where('id_tipo', 1)->with('acompanante');
                $registro_temp = AcompananteDependiente::where('id_responsable', $info_depen->id_responsable)->whereNull('id_dependiente')->where('id_tipo', 2)->with('acompanante')->union($registro_depen)->get();
                $paciente['acompanante'] = $registro_temp;

                /** BUSCAR REPRESENTENATE */
                $registro_representante = Paciente::where('id_usuario', Auth::user()->id)->first();
                $paciente['representante'] = $registro_representante;
            }
            else
            {
                $paciente['acompanante'] = null;
                $paciente['representante'] = null;
            }

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
                // $texto_alias_examen = 'Consulta Examen';
                $texto_alias_examen = $request->examen;
                break;
        }

        $validar = HoraMedica::where('id_paciente', $paciente->id)
                            ->where('id_profesional',$profesional->id)
                            ->where('tipo_hora_medica',$request->tipo_hora_medica)
                            ->where('fecha_consulta',\Carbon\Carbon::parse($request->fecha_consulta)->format('Y-m-d'))
                            ->first();

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
            $tiempo_consulta = 15;
            $procedimiento = '';

            if($profesional->id_especialidad == 4 && $profesional->id_tipo_especialidad == 55)
            {
                $procedimiento = $request->procedimiento;
                $proc_bloque = ( !empty($request->proc_bloque)?intval($request->proc_bloque):1 );
                $tiempo_consulta = intval($proc_bloque) * 15;
            }else if($profesional->id_especialidad == 2){
                // $procedimiento = $request->procedimiento;
                // $proc_bloque = ( !empty($request->proc_bloque)?intval($request->proc_bloque):1 );
                // $tiempo_consulta = intval($proc_bloque) * 15;
                $procedimiento = $request->procedimiento;
                $proc_bloque = (!empty($request->proc_bloque) ? intval($request->proc_bloque) : 1);
                $tiempo_consulta = intval($proc_bloque) * 15;

                // Calcular hora de inicio y término
                $hora_inicio = \Carbon\Carbon::parse($request->fecha_consulta)->format('H:i:s');
                $hora_termino = \Carbon\Carbon::parse($request->fecha_consulta)->addMinutes($tiempo_consulta)->format('H:i:s');

                // Validar si ya hay una hora médica que se solape
                $choque_horario = HoraMedica::where('id_profesional', $profesional->id)
                    ->where('id_lugar_atencion', $request->id_lugar_atencion)
                    ->where('fecha_consulta', \Carbon\Carbon::parse($request->fecha_consulta)->format('Y-m-d'))
                    ->where(function ($query) use ($hora_inicio, $hora_termino) {
                        $query->whereBetween('hora_inicio', [$hora_inicio, $hora_termino])
                            ->orWhereBetween('hora_termino', [$hora_inicio, $hora_termino])
                            ->orWhere(function ($query) use ($hora_inicio, $hora_termino) {
                                $query->where('hora_inicio', '<=', $hora_inicio)
                                        ->where('hora_termino', '>=', $hora_termino);
                            });
                    })
                    ->exists();

                if ($choque_horario) {
                    return json_encode([
                        'estado' => 'error',
                        'id_profesional' => $profesional->id,
                        'msj' => 'La hora médica se superpone con otra ya registrada.<br> Eliga un bloque mayor'
                    ]);
                }
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
            $hora_medica->id_asistente = $request->id_asistente;
            $hora_medica->id_estado = '1';
            $hora_medica->fecha_consulta = \Carbon\Carbon::parse($request->fecha_consulta)->format('Y-m-d');

            $hora_medica->hora_inicio = \Carbon\Carbon::parse($request->fecha_consulta)->format('H:i:s');
            $hora_medica->hora_termino = \Carbon\Carbon::parse($request->fecha_consulta)->addMinutes($tiempo_consulta)->format('H:i:s');

            $hora_medica->tipo_hora_medica = $request->tipo_hora_medica;
            $hora_medica->alias_examen = $texto_alias_examen;
            $hora_medica->id_procedimiento = $request->id_procedimiento;

            $hora_medica->descripcion = $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos;
            $hora_medica->id_lugar_atencion = $request->id_lugar_atencion;

            $hora_medica->acomp_representante = $request->representante;
            $hora_medica->acomp_acompanante = $request->acompanante;
            if(!empty($request->lista_Acompanante))
            $hora_medica->acomp_lista = json_encode($request->lista_Acompanante);

            $hora_medica->autorizacion_atencion = $request->autorizacion_atencion;
            // $hora_medica->id_log_users_devices = '';

            // $hora_medica->origen = $request->origen;

            if ($hora_medica->save())
            {
                if($request->tipo_hora_medica == 'T')
                {
                    $jitsi = JitsiController::jitsiRegistroMeet( $profesional->id, $paciente->id, $hora_medica->id );
					$hora_medica->video_llamada = $jitsi;
                }

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
            'profesional_sub_tipo_especialidad' => optional($profesional->SubTipoEspecialidad()->first())->nombre ?? null, // Si no existe, no se muestra
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

    public function cargarHorasMedicas(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        $id_usuario = '';

        $usuario_temp = Paciente::where('id_usuario', Auth::user()->id)->first();

        if($usuario_temp)
        {
            $id_usuario = $usuario_temp->id;
        }
        else
        {
            $id_usuario = $request->id_usuario;
        }

        if(empty($id_usuario))
        {
            $error['USUARIO'] = 'Campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $hora_medica = HoraMedica::select('horas_medicas.id', 'horas_medicas.fecha_consulta', 'horas_medicas.hora_inicio', 'horas_medicas.hora_termino', 'horas_medicas.alias_examen',
                                            'horas_medicas.comentarios_confirmacion', 'horas_medicas.fecha_confirmacion', 'horas_medicas.comentarios_cancelacion', 'horas_medicas.fecha_cancelacion',
                                            'horas_medicas.fecha_realizacion_consulta', 'horas_medicas.id_ficha_atencion', 'horas_medicas.id_profesional', 'horas_medicas.id_lugar_atencion',
                                            'horas_medicas.id_asistente', 'horas_medicas.id_paciente', 'horas_medicas.acomp_representante', 'horas_medicas.acomp_acompanante',
                                            'horas_medicas.acomp_lista', 'horas_medicas.autorizacion_atencion', 'horas_medicas.id_log_users_devices', 'horas_medicas.id_estado',
                                            'profesionales.nombre as nombre_profesional', 'profesionales.apellido_uno as apellido_uno_profesional',
                                            'lugares_atencion.nombre as nombre_lugar_atencion', 'direcciones.direccion as direccion_lugar_atencion', 'direcciones.numero_dir as numero_dir_lugar_atencion',
                                            'especialidades.nombre as nombre_especialidad', 'tipos_especialidad.nombre as nombre_tipo_especialidad', 'sub_tipo_especialidad.nombre as nombre_sub_tipo_especialidad',
                                            'parametros.valor as texto_estado', 'parametros.color as color_estado')
                                    ->join('profesionales', 'profesionales.id', '=', 'horas_medicas.id_profesional')
                                    ->join('especialidades', 'especialidades.id', '=', 'profesionales.id_especialidad')
                                    ->join('tipos_especialidad', 'tipos_especialidad.id', '=', 'profesionales.id_tipo_especialidad')
                                    ->rightJoin('sub_tipo_especialidad', 'sub_tipo_especialidad.id', '=', 'profesionales.id_sub_tipo_especialidad')
                                    ->join('lugares_atencion', 'lugares_atencion.id', '=', 'horas_medicas.id_lugar_atencion')
                                    ->join('direcciones', 'direcciones.id', '=', 'lugares_atencion.id_direccion')
                                    ->join('parametros', function ($join) {
                                        $join->on('parametros.id', '=', 'horas_medicas.id_estado')
                                                ->where('parametros.referencia', '=', 'Agenda_Estado');
                                    })
                                    ->where('id_paciente', $id_usuario)
                                    ->orderBy('fecha_consulta', 'DESC')
                                    ->orderBy('hora_inicio', 'DESC')
                                    ->get();
            $datos['estado'] = 1;
            $datos['msj'] = 'registros';
            $datos['registros'] = $hora_medica;
        }
        else
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'campo requerido';
            $datos['error'] = $error;
        }

        return $datos;
    }

    public function modificarPaciente(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        $nombre = $request->nombre;
        $apellido_uno = $request->apellido_uno;
        $apellido_dos = $request->apellido_dos;
        if (strpos($request->fecha_nacimiento, '/') !== false) {
            // Si la fecha tiene el formato dd/mm/yyyy
            $fechaConvertida = Carbon::createFromFormat('d/m/Y', $request->fecha_nacimiento)->format('Y-m-d');
        } else {
            // Si ya está en formato yyyy-mm-dd
            $fechaConvertida = Carbon::createFromFormat('Y-m-d', $request->fecha_nacimiento)->format('Y-m-d');
        }
        $fecha_nacimiento = $fechaConvertida;
        $sexo = $request->sexo;
        $convenio = $request->convenio;
        $direccion = $request->direccion;
        $numero_direccion = $request->numero_direccion;
        $region = $request->region;
        $ciudad = $request->ciudad;
        $email = $request->email;
        $telefono = $request->telefono;

        $region_paciente = Region::where('id', $region)->first();
        $ciudad_paciente = Ciudad::where('id', $ciudad)->first();

        $paciente = Paciente::where('id', $request->id)->first();

        $email_origen = $paciente->email;
        $email_nuevo = $email;

        $paciente->nombres = $nombre;
        $paciente->apellido_uno = $apellido_uno;
        $paciente->apellido_dos = $apellido_dos;
        $paciente->sexo = $sexo;
        $paciente->fecha_nac = $fecha_nacimiento;
        $paciente->id_prevision = $convenio ? $convenio : $paciente->id_prevision;
        $paciente->email = $email;
        $paciente->telefono_uno = $telefono;

        if( $paciente->save() )
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'exito';
            $datos['paciente'] = $paciente;
            // $paciente->region = $region_paciente ? $region_paciente->nombre : '';
            $datos['paciente']['region'] = $region_paciente ? $region_paciente->nombre : '';
            // $paciente->ciudad = $ciudad_paciente ? $ciudad_paciente->nombre : '';
            $datos['paciente']['ciudad'] = $ciudad_paciente ? $ciudad_paciente->nombre : '';
            $datos['paciente']['numero_direccion'] = $request->numero_direccion;
            $paciente->email = $email;

            /** modificar direccion */
            if($direccion){
                $id_direccion = $paciente->id_direccion;
                $carga_direccion = Direccion::find($id_direccion);
                if($carga_direccion)
                {
                    /** modificar direccion */

                    $carga_direccion->direccion = $direccion;
                    $carga_direccion->numero_dir = $numero_direccion;
                    $carga_direccion->id_ciudad = $ciudad;

                    if($carga_direccion->save())
                    {
                        $datos['direccion']['estado'] = 1;
                        $datos['direccion']['msj'] = 'exito';
                        $datos['direccion']['direccion'] = $carga_direccion;
                    }
                    else
                    {
                        $datos['direccion']['estado'] = 0;
                        $datos['direccion']['msj'] = 'falla';
                    }

                }
                else
                {
                    /** crear direccion*/
                    $nueva_direccion = new Direccion();
                    $nueva_direccion->direccion = $direccion;
                    $nueva_direccion->numero_dir = $numero_direccion;
                    $nueva_direccion->id_ciudad = $ciudad;

                    if($nueva_direccion->save())
                    {
                        $datos['direccion']['estado'] = 1;
                        $datos['direccion']['msj'] = 'exito';
                        $ciudad = Ciudad::find($ciudad);
                        // $paciente->ciudad = $ciudad->nombre;

                        $datos['direccion']['direccion'] = $carga_direccion;

                        $paciente2 = Paciente::where('id', $request->id)->first();
                        $paciente2->id_direccion = $nueva_direccion->id;
                        if( $paciente2->save() )
                        {
                            $datos['direccion']['update_paciente']['estado'] = 1;
                            $datos['direccion']['update_paciente']['msj'] = 'exito';
                        }
                        else
                        {
                            $datos['direccion']['update_paciente']['estado'] = 0;
                            $datos['direccion']['update_paciente']['msj'] = 'falla';
                        }
                    }
                    else
                    {
                        $datos['direccion']['estado'] = 0;
                        $datos['direccion']['msj'] = 'falla';
                    }

                }
            }


            /** modifica usuario */
            if( $email_origen != $email_nuevo)
            {
                $usuario = User::find($paciente->id_usuario);
                if($usuario)
                {
                    $usuario->email = $email_nuevo;
                    if($usuario->save())
                    {
                        $datos['usuario']['estado'] = 1;
                        $datos['usuario']['msj'] = 'exito';
                        /** envo de correo al paciente para notificar cambio de correo */
                    }
                    else
                    {
                        $datos['usuario']['estado'] = 0;
                        $datos['usuario']['msj'] = 'falla';
                    }
                }
                else
                {
                    $datos['usuario']['estado'] = 0;
                    $datos['usuario']['msj'] = 'no encontrado';
                }
            }

			/** modificar horas medicas */
            HoraMedica::where('id_paciente', $paciente->id)
                ->get()
                ->each(function ($hora) use ($paciente) {
                    $hora->update([
                        'descripcion' => $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos
                    ]);
                });
        }
        else
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'falla';
            $datos['error'] = $error;
        }

        return $datos;
    }

    public function modificarContacto(Request $request){

        $datos = array();
        $error = array();
        $valido = 1;
        $nombre = $request->nombre;
        $apellido_uno = $request->apellido_uno;
        $apellido_dos = $request->apellido_dos;
        if (strpos($request->fecha_nac, '/') !== false) {
            // Si la fecha tiene el formato dd/mm/yyyy
            $fechaConvertida = Carbon::createFromFormat('d/m/Y', $request->fn)->format('Y-m-d');
        } else {
            // Si ya está en formato yyyy-mm-dd
            $fechaConvertida = Carbon::createFromFormat('Y-m-d', $request->fn)->format('Y-m-d');
        }
        $fecha_nacimiento = $fechaConvertida;
        $sexo = $request->sexo;
        $direccion = $request->direccion;
        $numero_direccion = $request->numero_direccion;
        $region = $request->region;
        $ciudad = $request->comuna;
        $email = $request->email;
        $telefono = $request->telefono;

        $region_contacto = Region::where('id', $region)->first();
        $ciudad_contacto = Ciudad::where('id', $ciudad)->first();

         $rut = $request->rut;
        $contacto = ContactoEmergencia::where('rut','like','%'.$rut.'%')->first();


        $email_origen = $contacto->email;
        $email_nuevo = $email;

        $contacto->nombre = $nombre;
        $contacto->sexo = $sexo;
        $contacto->apellido_uno = $apellido_uno;
        $contacto->apellido_dos = $apellido_dos;
        $contacto->fecha_nac = $fecha_nacimiento;
        $contacto->email = $email;
        $contacto->telefono = $telefono;

        if( $contacto->save() )
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'exito';
            $datos['contacto'] = $contacto;
            // $paciente->region = $region_contacto ? $region_contacto->nombre : '';
            $datos['contacto']['region'] = $region_contacto ? $region_contacto->nombre : '';
            // $paciente->ciudad = $ciudad_contacto ? $ciudad_contacto->nombre : '';
            $datos['contacto']['ciudad'] = $ciudad_contacto ? $ciudad_contacto->nombre : '';

            $contacto->email = $email;

            /** modificar direccion */
            if($direccion){
                $id_direccion = $contacto->id_direccion;
                $carga_direccion = Direccion::find($id_direccion);
                if($carga_direccion)
                {
                    /** modificar direccion */

                    $carga_direccion->direccion = $direccion;
                    $carga_direccion->numero_dir = $numero_direccion;
                    $carga_direccion->id_ciudad = $ciudad;

                    if($carga_direccion->save())
                    {
                        $datos['direccion']['estado'] = 1;
                        $datos['direccion']['msj'] = 'exito';
                    }
                    else
                    {
                        $datos['direccion']['estado'] = 0;
                        $datos['direccion']['msj'] = 'falla';
                    }

                }
                else
                {
                    /** crear direccion*/
                    $nueva_direccion = new Direccion();
                    $nueva_direccion->direccion = $direccion;
                    $nueva_direccion->numero_dir = $numero_direccion;
                    $nueva_direccion->id_ciudad = $ciudad;

                    if($nueva_direccion->save())
                    {
                        $datos['direccion']['estado'] = 1;
                        $datos['direccion']['msj'] = 'exito';
                        $datos['direccion']['direccion'] = $carga_direccion;
                        $ciudad = Ciudad::find($ciudad);
                        // $paciente->ciudad = $ciudad->nombre;



                        $paciente2 = Paciente::where('id', $request->id)->first();
                        $paciente2->id_direccion = $nueva_direccion->id;
                        if( $paciente2->save() )
                        {
                            $datos['direccion']['update_paciente']['estado'] = 1;
                            $datos['direccion']['update_paciente']['msj'] = 'exito';
                        }
                        else
                        {
                            $datos['direccion']['update_paciente']['estado'] = 0;
                            $datos['direccion']['update_paciente']['msj'] = 'falla';
                        }
                    }
                    else
                    {
                        $datos['direccion']['estado'] = 0;
                        $datos['direccion']['msj'] = 'falla';
                    }

                }
            }


            /** modifica usuario */
            if( $email_origen != $email_nuevo)
            {
                $usuario = User::find($contacto->id_usuario);
                if($usuario)
                {
                    $usuario->email = $email_nuevo;
                    if($usuario->save())
                    {
                        $datos['usuario']['estado'] = 1;
                        $datos['usuario']['msj'] = 'exito';
                        /** envo de correo al paciente para notificar cambio de correo */
                    }
                    else
                    {
                        $datos['usuario']['estado'] = 0;
                        $datos['usuario']['msj'] = 'falla';
                    }
                }
                else
                {
                    $datos['usuario']['estado'] = 0;
                    $datos['usuario']['msj'] = 'no encontrado';
                }
            }
        }
        else
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'falla';
            $datos['error'] = $error;
        }

        return $datos;
    }

    public function editarAutorizacion(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if( $request->auto_fmu == '')
        {
            $valido = 0;
            $error['auto_fmu'] = 'campo requerido';
        }
        if( $request->auto_inf_turno == '')
        {
            $valido = 0;
            $error['auto_inf_turno'] = 'campo requerido';
        }
        if( $request->auto_inf_confd == '')
        {
            $valido = 0;
            $error['auto_inf_confd'] = 'campo requerido';
        }

        if($valido)
        {

            $paciente = Paciente::find($request->id_paciente);

            if($paciente)
            {
                $paciente->auto_fmu = $request->auto_fmu;
                $paciente->auto_inf_turno = $request->auto_inf_turno;
                $paciente->auto_inf_confd = $request->auto_inf_confd;

                if($paciente->save())
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
                $datos['msj'] = 'Paciente no encontrado';
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


    public function buscar_informacion_profesional(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->rut))
        {
            $error['rut'] = 'campo requerido';
            $valido = 0;
        }

        if($valido ==1)
        {
            $profesional = Profesional::where('rut', $request->rut)->get()->first();
            $profesional_cant = Profesional::where('rut', $request->rut)->get()->count();

            if($profesional_cant > 0)
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registros';
                $datos['profesional'] = $profesional;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'no encontrado';
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

    public function cargaExamenPorPaciente(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_tipo_examen))
        {
            $error['id_tipo_examen'] = 'campo requerido';
            $valido = 0;
        }
        // if(empty($request->id_paciente))
        // {
        //     $error['id_paciente'] = 'campo requerido';
        //     $valido = 0;
        // }
        if(empty($request->comentario))
        {
            $error['comentario'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->profesional_rut))
        {
            $error['profesional_ru'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $paciente = Paciente::where('id_usuario', Auth::user()->id)->first();

            $id_lugar_atencion = '';
            $id_institucion = '';
            $fecha_registro = $request->fecha_registro;
            $tipo_examen = $request->id_tipo_examen;
            $nombre_examen = $request->nombre_examen;
            $id_paciente = $paciente->id;

            $rut = $paciente->rut;
            $nombre = $paciente->nombres;
            $apellido_paterno = $paciente->apellido_uno;
            $apellido_materno = $paciente->apellido_dos;
            $email = $paciente->email;
            $observacion = $request->comentario;
            $lista_temp = '';
            $lista_archivo = '';
            if(isset($request->list_archivos)  && !empty($request->list_archivos))
            {
                $lista_temp = json_decode($request->list_archivos);
                // $lista_temp = $lista_temp['ex'];
                $lista_temp = $lista_temp->ex;
                if(!empty($lista_temp))
                    $lista_archivo = json_encode( $lista_temp );
            }

            $id_profesional = '';
            $profesional_rut = '';
            $profesional_nombre = '';
            if(isset($request->profesional_rut) && !empty($request->profesional_rut))
            {
                $rut_temp = str_replace('.', '', $request->profesional_rut);
                $profesional = Profesional::where('rut', $rut_temp)->first();
                if($profesional)
                {
                    $id_profesional = $profesional->id;

                    $profesional_rut = $request->profesional_rut;

                    if(!empty($request->profesional_nombre))
                        $profesional_nombre = $request->profesional_nombre;
                    else
                        $profesional_nombre = $profesional->apellido_uno;
                }
            }

            $datos = ResultadoExamenController::registrar($id_lugar_atencion,$id_institucion,$tipo_examen,$nombre_examen,$id_paciente,$rut,$nombre,$apellido_paterno,$apellido_materno,$email,$observacion,$fecha_registro, $lista_archivo, $id_profesional, $profesional_rut, $profesional_nombre);
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campos requeridos';
            $datos['error'] = $error;
        }

        return $datos;
    }

    public function cargaConsultaConfidencial(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_paciente))
        {
            $error['id_paciente'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $registros = FichaAtencion::with('Paciente')
                                    ->with('Profesional')
                                    ->with('LugarAtencion')
                                    ->where('id_paciente', $request->id_paciente)
                                    ->where('confidencial', true)
                                    ->get();

            $cant_registros = FichaAtencion::where('id_paciente', $request->id_paciente)->where('confidencial', true)->count();

            if($cant_registros>0)
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registros';
                $datos['cant_registros'] = $cant_registros;
                $datos['registros'] = $registros;
            }
            else
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registros';
                $datos['cant_registros'] = $cant_registros;
                $datos['registros'] = array();
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

    public function cargaDatosPacientePreReserva(Request $request, $token1, $token2, $token3)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->token2))
        {
            $error['token'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $paciente = Paciente::where('token', $token2)->get()->first();

            if($paciente)
            {
                $previsiones = Prevision::all();
                $regiones = Region::all();


                return view('general.paciente.carga_datos_paciente')->with([
                    'estado' => 1,
                    'paciente' => $paciente,
                    'previsiones' => $previsiones,
                    'regiones' => $regiones,
                ]);
            }
            else
            {
                // $datos['estado'] = 0;
                // $datos['msj'] = 'paciente no encontrado';
                return view('general.paciente.carga_datos_paciente')->with([
                    'estado' => 0,
                    'mensaje' => 'Paciente no encontrado',
                ]);
            }
        }
        else
        {
            // $datos['estado'] = 0;
            // $datos['msj'] = 'campos requeridos';
            // $datos['error'] = $error;
            return view('general.paciente.carga_datos_paciente')->with([
                'estado' => 0,
                'mensaje' => 'Paciente no encontrado',
            ]);
        }

        // return $datos;
    }

    public function registrarCargaDatosPacientePreReserva(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->rut))
        {
            $error['rut'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->nombre))
        {
            $error['nombre'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->primer_apellido))
        {
            $error['primer_apellido'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->segundo_apellido))
        {
            $error['segundo_apellido'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->fecha_nacimiento))
        {
            $error['fecha_nacimiento'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->sexo))
        {
            $error['sexo'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->prevision))
        {
            $error['prevision'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->telefono))
        {
            $error['telefono'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->telefono_dos))
        {
            $error['telefono_dos'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->direccion))
        {
            $error['direccion'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->numero_dir))
        {
            $error['numero_dir'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_ciudad))
        {
            $error['id_ciudad'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $paciente = Paciente::find($request->id);

            if($paciente)
            {
                $paciente->rut = $request->rut;
                $paciente->nombres = $request->nombre;
                $paciente->apellido_uno = $request->primer_apellido;
                $paciente->apellido_dos = $request->segundo_apellido;
                $paciente->fecha_nac = $request->fecha_nacimiento;
                $paciente->sexo = $request->sexo;
                // $paciente->id_usuario = @Auth::user()->id;
                // $paciente->email = @Auth::user()->email;
                $paciente->id_prevision = $request->prevision;
                $paciente->telefono_uno = $request->telefono;
                $paciente->telefono_dos = $request->telefono_dos;

                $direccion = new Direccion();
                $direccion->direccion = $request->direccion;
                $direccion->numero_dir = $request->numero_dir;
                $direccion->id_ciudad = $request->id_ciudad;
                if (!$direccion->save()) {
                    // return 'error';
                    $paciente->id_direccion = 0;
                    $datos['direccion']['estado'] = 0;
                    $datos['direccion']['msj'] = 'falla al registrar';
                } else {
                    $paciente->id_direccion = $direccion->id;
                    $datos['direccion']['estado'] = 1;
                    $datos['direccion']['msj'] = 'registro exitoso';
                }

                if (!$paciente->save()) {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'falla al registrar paciente';
                } else {

                    $user = new User();
                    $user->email = $paciente->email;
                    $pass_temp = rand(1111,9999);
                    $user->password = Hash::make($pass_temp);
                    $user->name = $request->nombre.' '.$request->primer_apellido.' '.$request->segundo_apellido;
                    if ($user->save())
                    {
                        /** asignando rol de adminstrador de institucion */
                        $user->assignRole('Paciente');

                        $paciente_temp = Paciente::find($request->id);
                        $paciente_temp->id_usuario = $user->id;
                        if($paciente_temp->save())
                        {
                            $datos['user']['estado'] = 1;
                            $datos['user']['msj'] = 'Usuario Creado';

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
                            $datos['user']['msj'] = 'Falle en nuevo usuario';
                        }
                    }
                    else
                    {
                        $datos['user']['estado'] = 0;
                        $datos['user']['reuslt'] = $user;
                    }

                    $datos['estado'] = 1;
                    $datos['msj'] = 'registro exitoso';
                    $datos['email'] = $paciente->email;

                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'paciente no encontrado';

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
