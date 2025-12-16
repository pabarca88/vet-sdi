<?php

namespace App\Http\Controllers;

use App\Helpers\Funciones;
use App\Models\Antecedente;
use App\Models\AntecedenteAlergiaPaciente;
use App\Models\AntecedenteEnferCronica;
use App\Models\AntecedenteMedicamentoCronico;
use App\Models\AntecedentesPaciente;
use App\Models\Articulo;
use App\Models\CertificadoReposo;
use App\Models\ConsentimientoFaltante;
use App\Models\FormularioFaltante;
use App\Models\Sugerencias;
use App\Models\Ciudad;
use App\Models\CnsTipo;
use App\Models\CnsTipoTemplate;
use App\Models\ControlObesidad;
use App\Models\DeclaracionEno;
use App\Models\DetalleReceta;
use App\Models\Diabete;
use App\Models\Direccion;
use App\Models\Especialidad;
use App\Models\ExamenEspecialidad;
use App\Models\ExamenEspecialidadImg;
use App\Models\ExamenEspecialidadTemplate;
use App\Models\ExamenEspecialidadTipo;
use App\Models\ExamenMedico;
use App\Models\ExamenPPF;
use App\Models\FichaAtencion;
use App\Models\FichaCirugiaDigestivaTipo;
use App\Models\FichaCirugiaGeneral;
use App\Models\FichaCirugiaGeneralTipo;
use App\Models\FichaOtorrino;
use App\Models\FichaOtorrinoTipo;
use App\Models\GesRegistros;
use App\Models\Hipertension;
use App\Models\HoraMedica;
use App\Models\InformeMedico;
use App\Models\Interconsulta;
use App\Models\Licencia;
use App\Models\LicenciaPPF;
use App\Models\LugarAtencion;
use App\Models\Paciente;
use App\Models\PacienteContactoEmergencia;
use App\Models\Presentacion;
use App\Models\Prevision;
use App\Models\Producto;
use App\Models\Profesional;
use App\Models\Region;
use App\Models\SolicitudPabellonQuirurgico;
use App\Models\SubTipoEspecialidad;
use App\Models\TipoEspecialidad;
use App\Models\TipoExamen;
use App\Models\User;
use App\Models\UsoPersonal;
use Carbon\Carbon;
use App\Models\FichaCirugiaDigestiva;
use App\Models\FichaDermo;
use App\Models\FichaDermoImg;
use App\Models\FichaOft;
use App\Models\FichaOftBiomicroscopia;
use App\Models\FichaOftBiomicroscopiaTipo;
use App\Models\FichaOftFondoOjo;
use App\Models\FichaOftFondoOjoTipo;
use App\Models\FichaOftTipo;
use App\Models\FichaPediatriaCns;
use App\Models\FichaPediatriaGeneral;
use App\Models\FichaPediatriaGeneralTipo;
use App\Models\FichaUro;
use App\Models\FichaUroTipo;
use App\Models\GesRegistrosImg;
use App\Models\Instituciones;
use App\Models\LogUsersDevices;
use App\Models\NotificacionConfirmacion;
use App\Models\PacientesDependientes;
use App\Models\RecetaAudifono;
use App\Models\TipoInforme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use PDF;

class ficha_atencionController extends Controller
{

    public function atencion_profesional_no_inscrito(Request $request)
    {

        $prof = Profesional::where('rut', $request->rut_profesional)->first();


        if ($prof == null) {
            return view('auth.Registros.ingreso_registro');
        }

        $profesional = new Profesional();

        $profesional->nombre = $request->nombre_profesional;
        $profesional->apellido_uno = $request->primer_apellido_profesional;
        $profesional->apellido_dos = $request->segundo_apellido_profesional;
        $profesional->rut = $request->rut_profesional;
        $profesional->telefono_uno = $request->telefono_uno_profesional;
        $profesional->telefono_dos = $request->telefono_dos_profesional;
        $profesional->estado = 0;
        $profesional->email = $request->email_profesional;
        $nombre_paso = explode(' ', $request->nombre_profesional);
        $nombre_profesional = $nombre_paso[0] . "_" . $nombre_paso[1];

        if ($profesional->save()) {

            $direccion = new Direccion();

            $direccion->direccion = $request->direccion_consulta_profesional;
            $direccion->numero_dir = $request->numero_dir_consulta_profesional;
            $direccion->id_ciudad = $request->ciudad_no_inscrito;

            if ($direccion->save()) {

                $usuario = new User();
                $usuario->name = $nombre_profesional;
                $usuario->email = $request->email_profesional;
                $usuario->password = bcrypt($request->rut_profesional);

                if ($usuario->save()) {

                    $usuario->assignRole('ProfesionalBasico');

                    return view('atencion_medica.atencion_medica_general');
                } else {

                    return response()->json(['success' => false]);
                }
            } else {

                return response()->json(['success' => false]);
            }
        } else {
            return response()->json(['success' => false]);
        }
    }


    public function medicamentos(Request $request)
    {
        $search = $request->search;

        if ($search == '') {
            $employees = Articulo::orderby('nombre', 'asc')->select('id', 'nombre')->limit(15)->get();
        } else {
            $employees = Articulo::orderby('nombre', 'asc')->select('id', 'nombre')->where('nombre', 'like', '%' . $search . '%')->limit(15)->get();
        }

        $response = array();
        foreach ($employees as $employee) {
            $response[] = array("value" => $employee->id, "label" => $employee->nombre);
        }

        return response()->json($response);
    }

    public function ficha_medica()
    {
        return view('atencion_medica.atencion_medica_general');
    }

    public function imprimir()
    {
        $pdf = PDF::loadView('atencion_medica.PDF.pdf_prueba');

        return $pdf->download('ejemplo.pdf');
    }

    public function index(Request $request)
    {
        $hora = HoraMedica::where('id', $request->id_hora_realizar)->first();
        $paciente = Paciente::where('id', $hora->id_paciente)->first();
        /* FMU CONTACTO EMERGENCIA */
        $pacientes_contacto_emergencia = PacienteContactoEmergencia::with('ContactoEmergencia')->where('id_paciente',$paciente->id)->get();
        /** FMU ALERGIAS */
        $paciente_alergias = Antecedente::where('id_paciente', $paciente->id)->where('id_tipo_antecedente', 5)->get();
		$pacienteDpendiente = PacientesDependientes::where('id_paciente', $paciente->id)->get()->first();
        $responsable = '';
        if($pacienteDpendiente)
        {
            $responsable = Paciente::find($pacienteDpendiente->id_responsable);
        }

        $ciudades = Ciudad::where('id_region', $paciente->Direccion()->first()->Ciudad()->first()->id_region)->get();
        $regiones = Region::all();
        // $examenMedico = ExamenMedico::where('cod_parent', 0)->whereBetween('id',[1,362])->orderby('nombre_examen', 'ASC')->get();
        $examenMedico = ExamenMedico::where('cod_parent', 0)->where('habilitado', 1)->orderby('nombre_examen', 'ASC')->get();
        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();

        // CONSULTAS PREVIAS
        // $fichas = FichaAtencion::where('id_paciente', $hora->id_paciente)->where('confidencial', false)->where('finalizada', 1)->get();
        $filtro_previas = array();
        $filtro_previas[] = array('id_paciente', $hora->id_paciente);
        $filtro_previas[] = array('confidencial', '0');
        $filtro_previas[] = array('finalizada', 1);
        $filtro_previas[] = array('id_profesional', $profesional->id);
        $fichas = FichaAtencion::where($filtro_previas)->get();

        // LUGAR DE ATENCION
        $lugar_atencion = LugarAtencion::where('id',$request->lugar_atencion_id)->first();
        $lugares_atencion  = LugarAtencion::all();

        // INSTITUCION
        $institucion = '';
        $temp_inst = Instituciones::where('id_lugar_atencion', $request->lugar_atencion_id)->first();
        if($temp_inst)
        {
            $institucion = $temp_inst;
        }

        // FICHA DE ATENCION ACTUAL
        // $fichaAtencion = FichaAtencion::where('id_paciente', $hora->id_paciente)->where('confidencial', false)->where('finalizada', 0)->first();
        // $fichaAtencion = FichaAtencion::where('id_paciente', $hora->id_paciente)->where('finalizada', 0)->first();
        $filtro_fichaAtencion = array();
        $filtro_fichaAtencion[] = array('id_paciente', $hora->id_paciente);
        // $filtro_fichaAtencion[] = array('confidencial', false);
        // $filtro_fichaAtencion[] = array('finalizada', 0);
        if(!empty($hora->id_ficha_atencion))
            $filtro_fichaAtencion[] = array('id', $hora->id_ficha_atencion);
        $fichaAtencion = FichaAtencion::where($filtro_fichaAtencion)->first();

        $antecedentes = AntecedentesPaciente::where('id', $paciente->id_antecedente)->first();

        if (isset($antecedentes)) {

            $medicamentos_cronicos = AntecedenteMedicamentoCronico::where('id_antecedentes', $paciente->Antecedentes()->first()->id)->get();
            $alergias = AntecedenteAlergiaPaciente::where('id_antecedentes', $paciente->Antecedentes()->first()->id)->get();
            $antecedentes_quirurgicos = SolicitudPabellonQuirurgico::where('id_paciente', $paciente->id)->get();
            // $patoligias_cronicas = AntecedenteEnferCronica::where('id_antecedentes', $paciente->Antecedentes()->first()->id)->get();
            $patoligias_cronicas = Antecedente::where('id_tipo_antecedente', 2)->where('id_paciente', $paciente->id)->where('estado', 1)->get();
        } else {
            $medicamentos_cronicos = [];
            $alergias = [];
            $antecedentes_quirurgicos = [];
            $patoligias_cronicas = [];
        }

        if( !empty($fichaAtencion) )
            $id_ficha_atencion = $fichaAtencion->id;


        // 5 realizando
        // 6 realizada
        if ($hora->id_estado != 5 && $hora->id_estado != 6)
        {
            $nueva_ficha_atencion = new FichaAtencion();
            $nueva_ficha_atencion->id_paciente = $paciente->id;
            $nueva_ficha_atencion->id_profesional = $profesional->id;
            $nueva_ficha_atencion->id_lugar_atencion = $request->lugar_atencion_id;

            if (!$nueva_ficha_atencion->save()) {
                return back()->with('mensaje', 'error');
            }
            else
            {
                $id_ficha_atencion = $nueva_ficha_atencion->id;
            }

            $hora->id_estado = 5;
            $hora->fecha_realizacion_consulta = now();
            $hora->id_ficha_atencion = $nueva_ficha_atencion->id;

            if (!$hora->save()) {
                return back()->with('mensaje', 'error');
            }
        }

        $prevision = Prevision::all();
        $medicamento = Producto::all();
        $tipoExamen = TipoExamen::all();
        $control_peso = ControlObesidad::where('id_paciente', $paciente->id)->get();
        $hipertension = Hipertension::where('id_paciente', $paciente->id)->get();
        $diabetes = Diabete::where('id_paciente', $paciente->id)->get();
        $direccion = $paciente->Direccion()->first();
        if (!$direccion == null)
        {
            $ciudad = $direccion->Ciudad()->first();
        }
        else
        {
            $direccion = null;
            $ciudad = null;
        }

        $fichaTipo = array();

        $ruta_blade = '';

        $cns_tipo = '';
        $cns_tipo_template = '';
        $cns_registros = '';

            if($profesional->id_sub_tipo_especialidad == 20)
            {
                //oftalmologia
                $ruta_blade = 'atencion_medica.atencion_medica_oftalmologia';
                $fichaTipo['oft'] = FichaOftTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
                $fichaTipo['bio'] = FichaOftBiomicroscopiaTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
                $fichaTipo['fo'] = FichaOftFondoOjoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();

                $examen = '';
                $lista_examen_especial = '';

                /** examenes de la especialidad */
                $examenes_especialidad = '';
                $examenes_especialidad = ExamenMedico::whereIn('cod_parent',[601])->orderBy('nombre_examen', 'ASC')->get();

                /** examenes radiologicos */
                $examenes_radiologicos = '';
                $examenes_radiologicos = ExamenMedico::whereIn('cod_parent',[355,356,357,358,359,360,361])->orderBy('nombre_examen', 'ASC')->get();
            }
            else if($profesional->id_sub_tipo_especialidad == 21)
            {
                //otorrinolaringologia
                $ruta_blade = 'atencion_medica.atencion_medica_otorrinolaringologia';
                $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();

                $examen_tipo = ExamenEspecialidadTipo::where('id_sub_tipo_especialidad', $profesional->id_sub_tipo_especialidad)->with('ExamenEspecialidadTemplate')->first();
                $examen = $examen_tipo->ExamenEspecialidadTemplate->cuerpo;
                $lista_examen_especial = '';

                /** examenes de la especialidad */
                $examenes_especialidad = '';
                $examenes_especialidad = ExamenMedico::whereIn('cod_parent',[582])->orderBy('nombre_examen', 'ASC')->get();

                /** examenes radiologicos */
                $examenes_radiologicos = '';
                $examenes_radiologicos = ExamenMedico::whereIn('cod_parent',[355,356,357,358,359,360,361])->orderBy('nombre_examen', 'ASC')->get();


            }
            else if($profesional->id_sub_tipo_especialidad == 22)
            {
                $examen = array();
                //UROLOGIA
                $ruta_blade = 'atencion_medica.atencion_medica_urologia';
                $fichaTipo['uro'] = FichaUroTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
                $lista_examen_especial = '';
                $examen_tipo = ExamenEspecialidadTipo::where('id_sub_tipo_especialidad', $profesional->id_sub_tipo_especialidad)->with('ExamenEspecialidadTemplate')->get();
                foreach ($examen_tipo as $key => $value)
                {
                    $examen[$value->ExamenEspecialidadTemplate->alias] = $value->ExamenEspecialidadTemplate->cuerpo;
                    $lista_examen_especial .= $value->ExamenEspecialidadTemplate->alias.','.$value->id.','.$value->ExamenEspecialidadTemplate->id.'|';
                }
                $lista_examen_especial = substr($lista_examen_especial, 0, -1);

                /** examenes de la especialidad */
                $examenes_especialidad = '';

                /** examenes radiologicos */
                $examenes_radiologicos = '';


            }
            else if($profesional->id_sub_tipo_especialidad == 19)
            {
                //dermatologia
                $ruta_blade = 'atencion_medica.atencion_medica_dermatologia';
                // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
                $fichaTipo = '';
                $examen = '';
                $lista_examen_especial = '';

                /** examenes de la especialidad */
                $examenes_especialidad = '';

                /** examenes radiologicos */
                $examenes_radiologicos = '';
            }
            else if($profesional->id_sub_tipo_especialidad == 85)
            {
                //traumatologia
                $ruta_blade = 'atencion_medica.atencion_traumatologia_general';
                // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
                $fichaTipo = '';
                $examen = '';
                $lista_examen_especial = '';

                /** examenes de la especialidad */
                $examenes_especialidad = '';

                /** examenes radiologicos */
                $examenes_radiologicos = '';
            }
            else if($profesional->id_sub_tipo_especialidad == 27)
            {
                //gineco obstetricia
                $ruta_blade = 'atencion_gine_obstetricia.atencion_gine_obst_general';
                // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
                $fichaTipo = '';
                $examen = '';
                $lista_examen_especial = '';

                /** examenes de la especialidad */
                $examenes_especialidad = '';

                /** examenes radiologicos */
                $examenes_radiologicos = '';
            }
            else if($profesional->id_sub_tipo_especialidad == 78)
            {
               //pediatria general
                $ruta_blade = 'atencion_pediatrica.atencion_pediatrica_general';
                $fichaTipo['ped_gen'] = FichaPediatriaGeneralTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
                // $fichaTipo['bio'] = FichaOftBiomicroscopiaTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
                // $fichaTipo['fo'] = FichaOftFondoOjoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
                $examen = '';
                $lista_examen_especial = '';

                /** examenes de la especialidad */
                $examenes_especialidad = '';

                /** examenes radiologicos */
                $examenes_radiologicos = '';

                /** CNS */
                $cns_tipo = CnsTipo::with(['CnsTipoTemplate' => function($query){
                                                $query->select('id', 'nombre', 'alias');
                                            }])
                                            ->where('estado', 1)
                                            ->get();
                $cns_tipo_array = CnsTipo::where('estado', 1)->pluck('id')->toArray();

                $cns_tipo_template = CnsTipoTemplate::with(['CnsTipo' => function($query){
                                                                $query->select('id', 'id_cns_template', 'nombre');
                                                            }])
                                                            ->whereIn('id', $cns_tipo_array)
                                                            ->get();

                $filtro_cns = array();
                $filtro_cns[] = array('id_paciente', $paciente->id);
                $cns_registros = FichaPediatriaCns::with(['CnsTipoTemplate' => function($query){ $query->select('id', 'nombre', 'alias');}])->where($filtro_cns)->get();
            }
            else if($profesional->id_sub_tipo_especialidad == 72)
            {
                //NEONATOLOGIA
                $ruta_blade = 'atencion_pediatrica.atencion_pediatrica_neonatologia';
                // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
                $fichaTipo = '';
                $examen = '';
                $lista_examen_especial = '';

                /** examenes de la especialidad */
                $examenes_especialidad = '';

                /** examenes radiologicos */
                $examenes_radiologicos = '';
            }

            /** MATRONAS */
            else if($profesional->id_especialidad == 7 && empty($profesional->id_sub_tipo_especialidad))
            {
                // SUB_TIPO_ESPECIALIDAD
                // 38	ATENCIÓN EMBARAZO
                // 39	ANTICONCEPCIÓN
                // 40	ATENCIÓN PUERPERIO
                // 51	CONTROL NIÑO SANO
                // 52	MATRON/A ATENCIÓN GENERAL

                $ruta_blade = 'atencion_otros_prof.atencion_matrona';
                // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
                $fichaTipo = '';
                $examen = '';
                $lista_examen_especial = '';

                /** examenes de la especialidad */
                $examenes_especialidad = '';

                /** examenes radiologicos */
                $examenes_radiologicos = '';

                /** CNS */
                $cns_tipo = CnsTipo::with(['CnsTipoTemplate' => function($query){
                    $query->select('id', 'nombre', 'alias');
                }])
                ->where('estado', 1)
                ->get();
                $cns_tipo_array = CnsTipo::where('estado', 1)->pluck('id')->toArray();

                $cns_tipo_template = CnsTipoTemplate::with(['CnsTipo' => function($query){
                                                    $query->select('id', 'id_cns_template', 'nombre');
                                                }])
                                                ->whereIn('id', $cns_tipo_array)
                                                ->get();

                $filtro_cns = array();
                $filtro_cns[] = array('id_paciente', $paciente->id);
                $cns_registros = FichaPediatriaCns::with(['CnsTipoTemplate' => function($query){ $query->select('id', 'nombre', 'alias');}])->where($filtro_cns)->get();
            }

            /** ENFERMERA UNIVERSITARIA */
            else if($profesional->id_especialidad == 8 )
            {
                // 41  ENFERMERÍA GENERAL
                // 42  ENFERMERÍA ESPECIALIZADA
                // 53  ENFERMERÍA CONTROL NIÑO SANO
                $ruta_blade = 'atencion_otros_prof.atencion_enfermeria';
                // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
                $fichaTipo = '';
                $examen = '';
                $lista_examen_especial = '';

                /** examenes de la especialidad */
                $examenes_especialidad = '';

                /** examenes radiologicos */
                $examenes_radiologicos = '';

                 /** CNS */
                $cns_tipo = CnsTipo::with(['CnsTipoTemplate' => function($query){
                    $query->select('id', 'nombre', 'alias');
                }])
                ->where('estado', 1)
                ->get();
                $cns_tipo_array = CnsTipo::where('estado', 1)->pluck('id')->toArray();

                $cns_tipo_template = CnsTipoTemplate::with(['CnsTipo' => function($query){
                                                    $query->select('id', 'id_cns_template', 'nombre');
                                                }])
                                                ->whereIn('id', $cns_tipo_array)
                                                ->get();

                $filtro_cns = array();
                $filtro_cns[] = array('id_paciente', $paciente->id);
                $cns_registros = FichaPediatriaCns::with(['CnsTipoTemplate' => function($query){ $query->select('id', 'nombre', 'alias');}])->where($filtro_cns)->get();
            }

            /** TENS */
            else if($profesional->id_especialidad == 10 && ($profesional->id_tipo_especialidad == 45 || $profesional->id_tipo_especialidad == 46) )
            {
                // 45  ATENCIÓN TENS EN GENERAL
                // 46  ATENCIÓN TENS ESPECIALIZADA
                $ruta_blade = 'atencion_otros_prof.atencion_tens';
                // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
                $fichaTipo = '';
                $examen = '';
                $lista_examen_especial = '';

                /** examenes de la especialidad */
                $examenes_especialidad = '';

                /** examenes radiologicos */
                $examenes_radiologicos = '';
            }


            // 1 Cirugía Abdominal General -> atencion_medica_cirugia_digestiva_general
            // 7 Cirugía Coloproctológica -> atencion_medica_cirugia_digestiva_baja
            // 11 Cirugía digestiva -> atencion_medica_cirugia_digestiva_general
            // 12 Cirugía Gástrica -> atencion_medica_cirugia_digestiva_alta

            else if($profesional->id_sub_tipo_especialidad == 1)
            {
                // Cirugía digestiva general
                $ruta_blade = 'atencion_medica.atencion_medica_cirugia_digestiva_general';
                // $fichaTipo = FichaCirugiaDigestivaTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
                // $fichaTipo = FichaCirugiaDigestivaTipo::get();
                // var_dump($profesional->id);
                // var_dump($fichaTipo);
                // die();
                $examen = '';
                $lista_examen_especial = '';

                /** examenes de la especialidad */
                $examenes_especialidad = '';

                /** examenes radiologicos */
                $examenes_radiologicos = '';
            }
            else if($profesional->id_sub_tipo_especialidad == 7)
            {
                $examen = array();
                // Cirugía Coloproctológica
                $ruta_blade = 'atencion_medica.atencion_medica_cirugia_digestiva_baja';
                $fichaTipo['cdg'] = FichaCirugiaDigestivaTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
                $fichaTipo['cg'] = FichaCirugiaGeneralTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
                $lista_examen_especial = '';
                $examen_tipo = ExamenEspecialidadTipo::where('id_sub_tipo_especialidad', $profesional->id_sub_tipo_especialidad)->with('ExamenEspecialidadTemplate')->get();
                foreach ($examen_tipo as $key => $value)
                {
                    $examen[$value->ExamenEspecialidadTemplate->alias] = $value->ExamenEspecialidadTemplate->cuerpo;
                    $lista_examen_especial .= $value->ExamenEspecialidadTemplate->alias.','.$value->id.','.$value->ExamenEspecialidadTemplate->id.'|';
                }
                $lista_examen_especial = substr($lista_examen_especial, 0, -1);

                /** examenes de la especialidad */
                $examenes_especialidad = '';

                /** examenes radiologicos */
                $examenes_radiologicos = '';
            }
            else if($profesional->id_sub_tipo_especialidad == 11 )
            {
                $examen = array();
                // Cirugía digestiva
                $ruta_blade = 'atencion_medica.atencion_medica_cirugia_digestiva_general';
                $fichaTipo['cdg'] = FichaCirugiaDigestivaTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
                $fichaTipo['cg'] = FichaCirugiaGeneralTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();

                $lista_examen_especial = '';
                $examen_tipo = ExamenEspecialidadTipo::where('id_sub_tipo_especialidad', $profesional->id_sub_tipo_especialidad)->with('ExamenEspecialidadTemplate')->get();
                foreach ($examen_tipo as $key => $value)
                {
                    $examen[$value->ExamenEspecialidadTemplate->alias] = $value->ExamenEspecialidadTemplate->cuerpo;
                    $lista_examen_especial .= $value->ExamenEspecialidadTemplate->alias.','.$value->id.','.$value->ExamenEspecialidadTemplate->id.'|';
                }
                $lista_examen_especial = substr($lista_examen_especial, 0, -1);

                /** examenes de la especialidad */
                $examenes_especialidad = '';

                /** examenes radiologicos */
                $examenes_radiologicos = '';

            }
            else if($profesional->id_sub_tipo_especialidad == 12 )
            {
                $examen = array();

                // Cirugía Gástrica
                $ruta_blade = 'atencion_medica.atencion_medica_cirugia_digestiva_alta';
                // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
                $fichaTipo['cdg'] = FichaCirugiaDigestivaTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
                $fichaTipo['cg'] = FichaCirugiaGeneralTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
                $lista_examen_especial = '';
                $examen_tipo = ExamenEspecialidadTipo::where('id_sub_tipo_especialidad', $profesional->id_sub_tipo_especialidad)->with('ExamenEspecialidadTemplate')->get();
                foreach ($examen_tipo as $key => $value)
                {
                    $examen[$value->ExamenEspecialidadTemplate->alias] = $value->ExamenEspecialidadTemplate->cuerpo;
                    $lista_examen_especial .= $value->ExamenEspecialidadTemplate->alias.','.$value->id.','.$value->ExamenEspecialidadTemplate->id.'|';
                }
                $lista_examen_especial = substr($lista_examen_especial, 0, -1);

                /** examenes de la especialidad */
                $examenes_especialidad = '';

                /** examenes radiologicos */
                $examenes_radiologicos = '';
            }
			else if($profesional->id_sub_tipo_especialidad == 119 )
            {
                // Cirugía General
                $ruta_blade = 'atencion_medica.atencion_medica_cirugia_general';
                $fichaTipo['cg'] = FichaCirugiaGeneralTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
               // $fichaTipo = '';
                $examen = '';
				$lista_examen_especial = '';

                /** examenes de la especialidad */
                $examenes_especialidad = '';

                /** examenes radiologicos */
                $examenes_radiologicos = '';
            }
            else if($profesional->id_sub_tipo_especialidad == 66 )
            {
                // Cirugía Pediatrica General
                $ruta_blade = 'atencion_pediatrica.atencion_pediatrica_cirugia';
                // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
                $fichaTipo = '';
                $examen = '';
				$lista_examen_especial = '';

                /** examenes de la especialidad */
                $examenes_especialidad = '';

                /** examenes radiologicos */
                $examenes_radiologicos = '';
            }
            else if($profesional->id_tipo_especialidad == 25 )
            {
                // KINESIOLOGIA GENERAL
                $ruta_blade = 'atencion_otros_prof.atencion_kine';
                // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
                $fichaTipo = '';
                $examen = '';
				$lista_examen_especial = '';

                /** examenes de la especialidad */
                $examenes_especialidad = '';

                /** examenes radiologicos */
                $examenes_radiologicos = '';
            }
            else if($profesional->id_tipo_especialidad == 28 )
            {
                // FONOAUDIOLOGIA CLÍNICA ADULTOS Y NIÑOS
                $ruta_blade = 'atencion_otros_prof.atencion_fono';
                // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
                $fichaTipo = '';
                $examen = '';
				$lista_examen_especial = '';

                /** examenes de la especialidad */
                $examenes_especialidad = '';

                /** examenes radiologicos */
                $examenes_radiologicos = '';
            }
            else if($profesional->id_tipo_especialidad == 34 && empty($profesional->id_sub_tipo_especialidad))
            {
                // ATENCIÓN PSICOLOGIA
                $ruta_blade = 'atencion_otros_prof.atencion_psicologia';
                // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
                $fichaTipo = '';
                $examen = '';
                $lista_examen_especial = '';

				/** examenes de la especialidad */
                $examenes_especialidad = '';

                /** examenes radiologicos */
                $examenes_radiologicos = '';
            }
            else if($profesional->id_tipo_especialidad == 31 && empty($profesional->id_sub_tipo_especialidad))
            {
                // ATENCIÓN NUTRICION
                $ruta_blade = 'atencion_otros_prof.atencion_nutricion';
                // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
                $fichaTipo = '';
                $examen = '';
                $lista_examen_especial = '';

                /** examenes de la especialidad */
                $examenes_especialidad = '';

                /** examenes radiologicos */
                $examenes_radiologicos = '';
            }
            else if($profesional->id_tipo_especialidad == 54 && empty($profesional->id_sub_tipo_especialidad))
            {
                // TECNOLOGO ORL
                $ruta_blade = 'atencion_otros_prof.atencion_tecn_orl';
                // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
                $fichaTipo = '';
                $examen = '';
                $lista_examen_especial = '';

                /** examenes de la especialidad */
                $examenes_especialidad = '';

                /** examenes radiologicos */
                $examenes_radiologicos = '';
            }
            else if($profesional->id_especialidad == 9)
            {
                // TERAPIA OCUPACIONAL
                $ruta_blade = 'atencion_otros_prof.atencion_terapia_ocup';
                $fichaTipo = '';
                $examen = '';
                $lista_examen_especial = '';

                /** examenes de la especialidad */
                $examenes_especialidad = '';

                /** examenes radiologicos */
                $examenes_radiologicos = '';
            }
            else if($profesional->id_tipo_especialidad == 55 && empty($profesional->id_sub_tipo_especialidad))
            {
                // EXAMENES ORL
                $ruta_blade = 'atencion_otros_prof.atencion_tecn_orl';
                // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
                $fichaTipo = '';
                $examen = '';
                $lista_examen_especial = '';

                /** examenes de la especialidad */
                $examenes_especialidad = '';

                /** examenes radiologicos */
                $examenes_radiologicos = '';
            }

            /** traumatologia - 13 */
            else if($profesional->id_tipo_especialidad == 13 && $profesional->id_sub_tipo_especialidad == 85)
            {
                // TRAUMATOLOGIA GENERAL
                $ruta_blade = 'atencion_medica.atencion_traumatologia_general';
                // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
                $fichaTipo = '';
                $examen = '';
                $lista_examen_especial = '';

                /** examenes de la especialidad */
                $examenes_especialidad = '';

                /** examenes radiologicos */
                $examenes_radiologicos = '';
            }
            
            /**ESPECIALIDADES DENTALES */

             /** implantologia - 16 */
            else if($profesional->id_tipo_especialidad == 16 )
            {
                // IMPLANTOLOGIA
                $ruta_blade = 'atencion_odontologica.atencion_implantologia';
                // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
                $fichaTipo = '';
                $examen = '';
                $lista_examen_especial = '';

                /** examenes de la especialidad */
                $examenes_especialidad = '';

                /** examenes radiologicos */
                $examenes_radiologicos = '';
            }
              /** ODONTOPEDIATRIA - 19 */
              else if($profesional->id_tipo_especialidad == 19 )
              {

                  $ruta_blade = 'atencion_odontologica.atencion_odontopediatria';
                  // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
                  $fichaTipo = '';
                  $examen = '';
                  $lista_examen_especial = '';

                  /** examenes de la especialidad */
                  $examenes_especialidad = '';

                  /** examenes radiologicos */
                  $examenes_radiologicos = '';
              }
                /** periodoncia - 21 */
                else if($profesional->id_tipo_especialidad == 21 )
                {
                    // PERIODONCIA
                    $ruta_blade = 'atencion_odontologica.atencion_periodoncia';
                    // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
                    $fichaTipo = '';
                    $examen = '';
                    $lista_examen_especial = '';

                    /** examenes de la especialidad */
                    $examenes_especialidad = '';

                    /** examenes radiologicos */
                    $examenes_radiologicos = '';
                }
                /** ENDODONCIA - 15 */
                else if($profesional->id_tipo_especialidad == 15 )
                {

                    $ruta_blade = 'atencion_odontologica.atencion_endodoncia';
                    // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
                    $fichaTipo = '';
                    $examen = '';
                    $lista_examen_especial = '';

                    /** examenes de la especialidad */
                    $examenes_especialidad = '';

                    /** examenes radiologicos */
                    $examenes_radiologicos = '';
                }
                  /** odontologia general - 18 */
            else if($profesional->id_tipo_especialidad == 18 )
            {
                // ODONTOLOGIA GENERAL
                $ruta_blade = 'atencion_odontologica.atencion_odonto_gral';
                // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
                $fichaTipo = '';
                $examen = '';
                $lista_examen_especial = '';

                /** examenes de la especialidad */
                $examenes_especialidad = '';

                /** examenes radiologicos */
                $examenes_radiologicos = '';
            }
              /** ODONTOPROTESISTA- 22 */
              else if($profesional->id_tipo_especialidad == 22 )
              {

                  $ruta_blade = 'atencion_odontologica.atencion_odonto_protesis';
                  // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
                  $fichaTipo = '';
                  $examen = '';
                  $lista_examen_especial = '';

                  /** examenes de la especialidad */
                  $examenes_especialidad = '';

                  /** examenes radiologicos */
                  $examenes_radiologicos = '';
              }
                /** ortodoncia - 20 */
                else if($profesional->id_tipo_especialidad == 20 )
                {
                    // ORTODONCIA
                    $ruta_blade = 'atencion_odontologica.atencion_ortodoncia';
                    // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
                    $fichaTipo = '';
                    $examen = '';
                    $lista_examen_especial = '';

                    /** examenes de la especialidad */
                    $examenes_especialidad = '';

                    /** examenes radiologicos */
                    $examenes_radiologicos = '';
                }
                /** ENDODONCIA - 17 */
                else if($profesional->id_tipo_especialidad == 17 )
                {

                    $ruta_blade = 'atencion_odontologica.atencion_od_cosmetica';
                    // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
                    $fichaTipo = '';
                    $examen = '';
                    $lista_examen_especial = '';

                    /** examenes de la especialidad */
                    $examenes_especialidad = '';

                    /** examenes radiologicos */
                    $examenes_radiologicos = '';
                }
                  /** esp TTM - 24 */
                  else if($profesional->id_tipo_especialidad == 24 )
                  {

                      $ruta_blade = 'atencion_odontologica.atencion_ttm';
                      // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
                      $fichaTipo = '';
                      $examen = '';
                      $lista_examen_especial = '';

                      /** examenes de la especialidad */
                      $examenes_especialidad = '';

                      /** examenes radiologicos */
                      $examenes_radiologicos = '';
                  }
                   /** esp CIRUGIA MAXILO-FACIAL - 14 */
                   else if($profesional->id_tipo_especialidad == 14 )
                   {

                       $ruta_blade = 'atencion_odontologica.atencion_maxilo_facial';
                       // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
                       $fichaTipo = '';
                       $examen = '';
                       $lista_examen_especial = '';

                       /** examenes de la especialidad */
                       $examenes_especialidad = '';

                       /** examenes radiologicos */
                       $examenes_radiologicos = '';
                   }
            else
            {
                $ruta_blade = 'atencion_medica.atencion_medica_general';
                $fichaTipo = '';
                $examen = '';
                $lista_examen_especial = '';

                /** examenes de la especialidad */
                $examenes_especialidad = '';

                /** examenes radiologicos */
                $examenes_radiologicos = '';
            }


        // }

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

        // INTERCONSULTA
        $filtro_inter = array();
        $filtro_inter[] = array('id_paciente', $paciente->id);
        if((int)$profesional->id_especialidad>0)
            $filtro_inter[] = array('id_especialidad', $profesional->id_especialidad);//especialiadd
        if((int)$profesional->id_tipo_especialidad>0)
            $filtro_inter[] = array('id_tipos_especialidad', $profesional->id_tipo_especialidad);//tipo_espacialidad
        if((int)$profesional->id_sub_tipo_especialidad>0)
            $filtro_inter[] = array('id_sub_tipo_especialidad', $profesional->id_sub_tipo_especialidad);//sub_tipo_especialidad
        $filtro_inter[] = array('estado', 1);//pendiente por respuesta
        $interconsulta = Interconsulta::where($filtro_inter)->first();

        // informacion ges
        // $filtro_ges = array();
        // $filtro_ges[] = array('id_ficha_atencion',$id_ficha_atencion);
        // $ges = GesRegistros::where($filtro_ges)->first();

        // ESPECIALIDAD -> PROFESION
        $especialidad = Especialidad::all();

        return view($ruta_blade)->with(
            [
                'paciente' => $paciente,
                'pacientes_contacto_emergencia' => $pacientes_contacto_emergencia,
                'paciente_alergias' => $paciente_alergias,
                'prevision' => $prevision,
                'profesional' => $profesional,
                'medicamento' => $medicamento,
                'hora_medica' => $hora,
                'fichas' => $fichas,
                'ciudades' => $ciudades,
                'regiones' => $regiones,
                'tipo_examen' => $tipoExamen,
                'control_peso' => $control_peso,
                'hipertension' => $hipertension,
                'diabetes' => $diabetes,
                'ciudad' => $ciudad,
                'examenMedico' => $examenMedico,
                'medicamentos_cronicos' => $medicamentos_cronicos,
                'alergias' => $alergias,
                'antecedentes_quirurgicos' => $antecedentes_quirurgicos,
                'patoligias_cronicas' => $patoligias_cronicas,
                'fichaAtencion' => $fichaAtencion,
                'id_lugar_atencion' => $request->lugar_atencion_id,
                'lugar_atencion' => $lugar_atencion,
                'lugares_atencion ' => $lugares_atencion ,
                'id_ficha_atencion' => $id_ficha_atencion,
                'especialidad' => $especialidad,
                'interconsulta' => $interconsulta,
                'fichaTipo' => $fichaTipo,
                'examen' => $examen,
                'lista_examen_especial' => $lista_examen_especial,
                'examenes_especialidad' => $examenes_especialidad,
                'examenes_radiologicos' => $examenes_radiologicos,
                'examenes_especialidad_realizados' => $examenes_especialidad_realizados,
                'institucion' => $institucion,
                'cns_tipo' => $cns_tipo,
                'cns_tipo_template' => $cns_tipo_template,
                'cns_registros' => $cns_registros,

                // 'ficha_ges' => $ges,
                // 'direccion' => $direccion,
                /*'contacto' => $contacto,
                'contacto_direccion'=> $contacto_direccion,
                'contacto_ciudad' => $contacto_ciudad,*/

            ]
        );
    }

    public function registrar_control_obesidad(Request $request)
    {
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

        $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();

        $control_obesidad = new ControlObesidad();
        $control_obesidad->peso = $request->peso;
        $control_obesidad->variacion = $request->variacion;
        $control_obesidad->ideal = $request->ideal;
        $control_obesidad->id_profesional = $profesional->id;
        $control_obesidad->id_paciente = $hora_medica->id_paciente;
        $control_obesidad->id_ficha_atencion = $hora_medica->id_ficha_atencion;

        if (!$control_obesidad->save()) {
            return 'error';
        }

        return json_encode($hora_medica);
    }

    public function registrar_control_diabetes(Request $request)
    {
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

        $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();

        $diabetes = new Diabete();
        $diabetes->peso = $request->peso;
        $diabetes->pies = $request->pies;
        $diabetes->hgac1 = $request->hgac1;
        $diabetes->colesterol = $request->colesterol;
        $diabetes->creatina = $request->creatina;
        $diabetes->glicosilada_postprandial = $request->glicosilada_postprandial;
        $diabetes->glicosinada_ayuno = $request->glicosinada_ayuno;
        $diabetes->id_profesional = $profesional->id;
        $diabetes->id_paciente = $hora_medica->id_paciente;
        $diabetes->id_ficha_atencion = $hora_medica->id_ficha_atencion;

        if (!$diabetes->save()) {
            return 'error';
        }

        return json_encode($hora_medica);
    }

    public function registrar_control_hipertension(Request $request)
    {
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

        $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();


        $hipertension = new Hipertension();
        $hipertension->sistolica = $request->sistolica;
        $hipertension->diastolica = $request->diastolica;
        $hipertension->ideal = $request->ideal;
        $hipertension->id_profesional = $profesional->id;
        $hipertension->id_paciente = $hora_medica->id_paciente;
        $hipertension->id_ficha_atencion = $hora_medica->id_ficha_atencion;
        $hipertension->id_lugar_atencion = $hora_medica->id_lugar_atencion;

        //dd($hipertension);

        if (!$hipertension->save()) {
            return 'error';
        }

        return json_encode($hora_medica);
    }

    public function finalizar_atencion(Request $request)
    {
        $hora_medica = HoraMedica::where('id', $request->finalizar_hora_medica)->first();
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

        $ficha = FichaAtencion::where('id', $hora_medica->id_ficha_atencion)->first();

        $ficha->finalizada = $request->finalizar_atencion;

        if (!$ficha->save()) {
            return 'error';
        }

        $hora_medica->id_estado = 6;

        if (!$hora_medica->save()) {
            return 'error';
        }

        return view('app.profesional.escritorio_profesional')->with('profesional', $profesional);
    }

    public function registrar_ges_ficha(Request $request)
    {
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

        $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();

        $ges = new GesRegistros();

        // nombre_institucion_ficha_ges
        // direccion_institucion_ficha_ges
        // nombre_responsable_ficha_ges
        // rut_responsable_ficha_ges
        // confirmacion_diagnostica_ficha_ges
        // paciente_tratamiento_ficha_ges
        // nombre_ges
        // id_paciente
        // id_profesional
        // id_ficha_atencion
        // id_lugar_atencion

        $ges->nombre_institucion_ficha_ges = $request->nombre_institucion_ficha_ges;
        $ges->direccion_institucion_ficha_ges = $request->direccion_institucion_ficha_ges;
        $ges->nombre_responsable_ficha_ges = $request->nombre_responsable_ficha_ges;
        $ges->rut_responsable_ficha_ges = $request->rut_responsable_ficha_ges;
        $ges->confirmacion_diagnostica_ficha_ges = $request->confirmacion_diagnostica_ficha_ges;
        $ges->paciente_tratamiento_ficha_ges = $request->paciente_tratamiento_ficha_ges;
        $ges->fecha_ficha_ges = \Carbon\Carbon::parse($request->fecha_ficha_ges)->format('Y-m-d');
        $ges->nombre_ges = $request->nombre_ges;
        $ges->hora_ficha_ges = \Carbon\Carbon::parse($request->hora_ficha_ges)->format('H:i:s');
        $ges->id_profesional = $profesional->id;
        $ges->id_paciente = $hora_medica->id_paciente;
        $ges->id_ficha_atencion = $hora_medica->id_ficha_atencion;
        $ges->id_lugar_atencion = $request->id_lugar_atencion;
        $ges->codigo_verificacion = $request->codigo_verificacion;

        if (!$ges->save()) {
            return 'error';
        }

        return json_encode($hora_medica);
    }

    public function registrar_certificado_reposo(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->fecha_inicio_certificado))
        {
            $valido=0;
            $error['fecha_inicio_certificado'] = 'Campo requerido fecha_inicio_certificado';
        }
        if(empty($request->fecha_termino_certificado))
        {
            $valido=0;
            $error['fecha_termino_certificado'] = 'Campo requerido fecha_termino_certificado';
        }
        if(empty($request->hipotesis_certificado))
        {
            $valido=0;
            $error['hipotesis_certificado'] = 'Campo requerido hipotesis_certificado';
        }
        // if(empty($request->comentarios_certificado))
        // {
        //     $valido=0;
        //     $error['comentarios_certificado'] = 'Campo requerido comentarios_certificado';
        // }
        if(empty($request->id_lugar_atencion))
        {
            $valido=0;
            $error['id_lugar_atencion'] = 'Campo requerido id_lugar_atencion';
        }

        if($valido == 1)
        {

            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
            $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();



            $certificado = new CertificadoReposo();
            $certificado->fecha_inicio = $request->fecha_inicio_certificado;
            $certificado->fecha_termino = $request->fecha_termino_certificado;
            $certificado->hipotesis = $request->hipotesis_certificado;
            $certificado->comentarios = isset( $request->comentarios_certificado)? $request->comentarios_certificado:'';
            $certificado->id_profesional = $hora_medica->id_profesional;
            $certificado->id_paciente = $hora_medica->id_paciente;
            $certificado->id_ficha_atencion = $hora_medica->id_ficha_atencion;
            $certificado->id_lugar_atencion = $request->id_lugar_atencion;

            if (!$certificado->save()) {
                $datos['estado'] = 0;
                $datos['msj'] = 'Problema al registrar';
                $datos['request'] = $request->all();
            }
            else
            {
                $result_delete = CertificadoReposo::where('id_ficha_atencion', $hora_medica->id_ficha_atencion)->whereNotIn('id', [$certificado->id])->delete();
                $datos['estado'] = 1;
                $datos['msj'] = 'Registros con exito';
                $datos['delete'] = $result_delete;
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Campos Requeridos';
            $datos['error'] = $error;
        }
        return $datos;
    }
    public function registrar_consentimiento_faltante(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->form_cons_faltante))
        {
            $valido=0;
            $error['form_cons_faltante'] = 'Campo requerido Consentimineto faltante';
        }
        if(empty($request->form_cons_faltante_especialidad))
        {
            $valido=0;
            $error['form_cons_faltante_especialidad'] = 'Campo requerido Especialidad';
        }

        if($valido == 1)
        {

            $certificado = new ConsentimientoFaltante();
            $certificado->id_prof_sol_cons = $request->id_prof_sol_cons;
            $certificado->prof_sol_cons_fecha = date('Y-m-d H:i:s');
            $certificado->form_cons_faltante = $request->form_cons_faltante;
            $certificado->form_cons_faltante_especialidad =  $request->form_cons_faltante_especialidad;
            $certificado->obs_sol_cons_formulario = isset( $request->obs_sol_cons_formulario)? $request->obs_sol_cons_formulario:'';
            $certificado->estado = 1;
            $certificado->otro = '';

            // $certificado->id_lugar_atencion = $request->id_lugar_atencion;

            if ($certificado->save()) {
                $datos['estado'] = 1;
                $datos['msj'] = 'Registros con exito';
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Problema al registrar';
                $datos['request'] = $request->all();
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Campos Requeridos';
            $datos['error'] = $error;
        }
        return $datos;
    }
    public function registrar_formulario_faltante(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->form_faltante))
        {
            $valido=0;
            $error['form_faltante'] = 'Campo requerido Consentimineto faltante';
        }
        if(empty($request->form_faltante_especialidad))
        {
            $valido=0;
            $error['form_faltante_especialidad'] = 'Campo requerido Especialidad';
        }

        if($valido == 1)
        {

            $certificado = new FormularioFaltante();
            $certificado->id_prof_sol_form = $request->id_prof_sol_form;
            $certificado->prof_sol_form_fecha = date('Y-m-d H:i:s');
            $certificado->form_faltante = $request->form_faltante;
            $certificado->form_faltante_especialidad =  $request->form_faltante_especialidad;
            $certificado->obs_sol_form_formulario = isset( $request->obs_sol_form_formulario)? $request->obs_sol_form_formulario:'';
            $certificado->estado = 1;
            $certificado->otro = '';

            // $certificado->id_lugar_atencion = $request->id_lugar_atencion;

            if ($certificado->save()) {
                $datos['estado'] = 1;
                $datos['msj'] = 'Registros con exito';
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Problema al registrar';
                $datos['request'] = $request->all();
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Campos Requeridos';
            $datos['error'] = $error;
        }
        return $datos;
    }
    public function registrar_sugerencia(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->form_sugerencia))
        {
            $valido=0;
            $error['form_sugerencia'] = 'Campo requerido Consentimiento faltante';
        }
        if(empty($request->form_sugerencia))
        {
            $valido=0;
            $error['form_sugerencias_especialidad'] = 'Campo requerido Especialidad';
        }

        if($valido == 1)
        {

            $certificado = new Sugerencias();
            $certificado->id_prof_sugerencias = $request->id_prof_sugerencias;
            $certificado->prof_sugerencias_fecha = date('Y-m-d H:i:s');
            $certificado->form_sugerencia = $request->form_sugerencia;
            $certificado->form_sugerencias_especialidad =  $request->form_sugerencias_especialidad;
            $certificado->obs_sugerencias = isset( $request->obs_sugerencias)? $request->obs_sugerencias:'';
            $certificado->estado = 1;
            $certificado->otro = '';

            // $certificado->id_lugar_atencion = $request->id_lugar_atencion;

            if ($certificado->save()) {
                $datos['estado'] = 1;
                $datos['msj'] = 'Registros con exito';
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Problema al registrar';
                $datos['request'] = $request->all();
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Campos Requeridos';
            $datos['error'] = $error;
        }
        return $datos;
    }

    public function registrar_interconsulta(Request $request)
    {
        $datos = array();

        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

        // $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();
        $ficha_atencion = FichaAtencion::find($request->id_fc);

        $nombre_especialidad = '';
        if(!empty($request->sub_tipo_especialidad))
            $nombre_especialidad = SubTipoEspecialidad::find($request->sub_tipo_especialidad)->nombre ;
        else if(!empty($request->tipo_especialidad))
            $nombre_especialidad = TipoEspecialidad::find($request->especialidad)->nombre ;
        else if(!empty($request->tipo_especialidad))
            $nombre_especialidad = Especialidad::find($request->profesion)->nombre ;

        $interconsulta = new Interconsulta();
        $interconsulta->id_especialidad = $request->profesion;
        $interconsulta->id_tipos_especialidad = $request->especialidad;
        $interconsulta->id_sub_tipo_especialidad = $request->sub_tipo_especialidad;
        $interconsulta->nombre_especialidad = $nombre_especialidad;
        $interconsulta->fecha_solicitud = Carbon::now();
        $interconsulta->id_paciente = $ficha_atencion->id_paciente;
        $interconsulta->id_profesional_soli = $profesional->id;
        $interconsulta->id_ficha_atencion_soli = $ficha_atencion->id;
        $interconsulta->id_lugar_atencion_soli = $ficha_atencion->id_lugar_atencion;
        $interconsulta->id_recuperacion = $request->id_recuperacion;
        $interconsulta->id_sala = $request->id_sala;
        $interconsulta->id_profesional_inter = $request->profesional_inter;
        $interconsulta->nombre_profesional_inter = $request->nombre_profesional_inter;
        $interconsulta->hipotesis = $request->hipotesis_interconsulta;
        $interconsulta->comentarios = $request->comentarios_interconsulta;

        if ($interconsulta->save())
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'registros';
            $datos['id_last'] = $interconsulta->id;
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'falla al registrar';
        }

        return $datos;
    }

    public function registrar_interconsulta_respuesta(Request $request)
    {
        $datos = array();
        $registro = Interconsulta::find($request->inter_id);

        if($registro)
        {
            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

            // $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();
            $ficha_atencion = FichaAtencion::find($request->id_fc);


            $registro->diagnostico_resp = $request->inter_resp_diagnostico;
            $registro->tratamiento_resp = $request->inter_resp_tratamiento;
            $registro->comentario_examen_resp = $request->inter_resp_comentario;
            $registro->fecha_resp =  Carbon::now();
            $registro->id_profesional_resp = $profesional->id;
            $registro->citado_control_resp = $request->requiere_control?'1':'0';
            $registro->id_ficha_atencion_resp = $ficha_atencion->id;
            $registro->id_lugar_atencion_resp = $ficha_atencion->id_lugar_atencion;
            $registro->id_recuperacion_resp = $request->id_recuperacion_resp;
            $registro->id_sala_resp = $request->id_sala_resp;
            $registro->estado = 2;

            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registro actualizado';
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'problema al registrar';
            }


        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'registro no encontrado';
        }

        return $datos;
    }

    public function pdf_interconsulta(Request $request)
    {
        $datos = array();
        $interconsulta = Interconsulta::where('id', $request->id_interconsulta)
                                        ->first();
        if($interconsulta->count()>0)
        {

            $paciente = Paciente::find($interconsulta->id_paciente);

            // info solicitud
            $ficha_atencion_soli = FichaAtencion::find($interconsulta->id_ficha_atencion_soli);
            $lugar_atencion_soli = LugarAtencion::find($interconsulta->id_lugar_atencion_soli);
            $profesional_soli = Profesional::find($interconsulta->id_profesional_soli);
            $token_firma_soli = encrypt( $profesional_soli->rut.'_'.$profesional_soli->email.'_'.$lugar_atencion_soli->id );



            $lugar_atencion = LugarAtencion::find($ficha_atencion_soli->id_lugar_atencion);

            $array_paciente = array(
                'id' => $paciente->id,
                'nombre' => $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos,
                'fecha_nac' => $paciente->fecha_nac,
                'rut' => $paciente->rut,
                'direccion' => $paciente->Direccion()->first()->direccion.' '.$paciente->Direccion()->first()->numero_dir.', '.$paciente->Direccion()->first()->Ciudad()->first()->nombre
            );


            $array_lugar_atencion = array(
                'id' => $lugar_atencion->id,
                'nombre' => $lugar_atencion->nombre
            );

            // array solicitud
            $array_ficha_atencion_soli = array(
                'id' => $ficha_atencion_soli->id,
                'created_at' => $ficha_atencion_soli->created_at->format('d/m/Y'),
            );
            $array_lugar_atencion_soli = array(
                'id' => $lugar_atencion_soli->id,
                'nombre' => $lugar_atencion_soli->nombre
            );
            $array_profesional_soli = array(
                'id' => $profesional_soli->id,
                'nombre' => $profesional_soli->nombre.' '.$profesional_soli->apellido_uno.' '.$profesional_soli->apellido_dos,
                'rut' => $profesional_soli->rut,
                'especialidad' => $profesional_soli->SubTipoEspecialidad()->first()->nombre,
                'token' =>  $token_firma_soli,
            );
            $array_soli = array(
                'id' => $interconsulta->id,
                'hipotesis' => $interconsulta->hipotesis,
                'comentarios' => $interconsulta->comentarios,
            );

            if(isset($interconsulta->diagnostico_resp))
            {
                // info respuesta
                $ficha_atencion_resp = FichaAtencion::find($interconsulta->id_ficha_atencion_resp);
                $lugar_atencion_resp = LugarAtencion::find($interconsulta->id_lugar_atencion_resp);
                $profesional_resp = Profesional::find($interconsulta->id_profesional_resp);
                $token_firma_resp = encrypt( $profesional_resp->rut.'_'.$profesional_resp->email.'_'.$lugar_atencion_resp->id );

                // array respuesta
                $array_ficha_atencion_resp = array(
                    'id' => $ficha_atencion_resp->id,
                    'created_at' => $ficha_atencion_resp->created_at->format('d/m/Y'),
                );
                $array_lugar_atencion_resp = array(
                    'id' => $lugar_atencion_resp->id,
                    'nombre' => $lugar_atencion_resp->nombre
                );
                $array_profesional_resp = array(
                    'id' => $profesional_resp->id,
                    'nombre' => $profesional_resp->nombre.' '.$profesional_resp->apellido_uno.' '.$profesional_resp->apellido_dos,
                    'rut' => $profesional_resp->rut,
                    'especialidad' => $profesional_resp->SubTipoEspecialidad()->first()->nombre,
                    'token' =>  $token_firma_resp,
                );
                $array_resp = array(
                    'id' => $interconsulta->id,
                    'diagnostico' => $interconsulta->diagnostico_resp,
                    'tratamiento' => $interconsulta->tratamiento_resp,
                    'comentario_examen' => $interconsulta->comentario_examen_resp,
                    'control' => $interconsulta->citado_control_resp==1?'SI':'NO',
                    'fecha' => $interconsulta->fecha_resp,
                );
            }
            else
            {
                // array respuesta
                $array_ficha_atencion_resp = array(

                );
                $array_lugar_atencion_resp = array(

                );
                $array_profesional_resp = array(

                );
                $array_resp = array(

                );
            }



            $nombre_archivo = strtolower('interconsulta_'.$interconsulta->id);

            return  PdfController::generarPDF('', compact( 'array_paciente', 'array_lugar_atencion', 'array_ficha_atencion_soli', 'array_lugar_atencion_soli', 'array_profesional_soli', 'array_soli', 'array_ficha_atencion_resp', 'array_lugar_atencion_resp', 'array_profesional_resp', 'array_resp'), $nombre_archivo, 'pdf_interconsulta');
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'No se encontraron medicamentos';
        }
    }


    public function registrar_informe_medico(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;


        if(empty($request->comentarios_informe_medico)) {
            $error['comentarios_informe_medico'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->hora_medica)) {
            $error['hora_medica'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_lugar_atencion)) {
            $error['id_lugar_atencion'] = 'campo requerido';
            $valido = 0;
        }

        if($valido == 1)
        {
            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

            $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();

            $tipo_informe = $request->tipo_informe;
            if(empty($request->tipo_informe)) {
                $tipo_informe = 1;
            }

            $informe = new InformeMedico();
            $informe->id_tipo_informe = $tipo_informe;
            $informe->informe_medico = $request->comentarios_informe_medico;
            $informe->fecha_informe_medico = date('Y-m-d');
            $informe->id_paciente = $hora_medica->id_paciente;
            $informe->id_ficha_atencion = $hora_medica->id_ficha_atencion;
            $informe->id_profesional = $profesional->id;
            $informe->id_lugar_atencion = $request->id_lugar_atencion;

            if (!$informe->save()) {

                $datos['estado'] = 0;
                $datos['msj'] = 'problema al momento de registrar informe medico';

            }
            else
            {
                $delete  = InformeMedico::where('id_ficha_atencion', $hora_medica->id_ficha_atencion)->where('id_tipo_informe', $tipo_informe)->whereNotIn('id', [$informe->id])->delete();
                $datos['estado'] = 1;
                $datos['mjs'] = 'registro exitoso';
                $datos['delete'] = $delete;
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campo requerido';
            $datos['error'] = $error;
            $datos['request'] = $request->all();
        }

        return $datos;
    }

    public function registrar_uso_personal(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->dirigido_a)) {
            $error['dirigido_a'] = 'campo requerido';
            $valido = 0;
        }
        // if(empty($request->cargo)) {
        //     $error['cargo'] = 'campo requerido';
        //     $valido = 0;
        // }
        if(empty($request->mensaje)) {
            $error['mensaje'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->hora_medica)) {
            $error['hora_medica'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_lugar_atencion)) {
            $error['id_lugar_atencion'] = 'campo requerido';
            $valido = 0;
        }

        if($valido == 1)
        {
            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
            $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();

            $uso_personal = new UsoPersonal();

            $uso_personal->dirigido = $request->dirigido_a;
            $uso_personal->cargo = $request->cargo;
            $uso_personal->mensaje = $request->mensaje;
            $uso_personal->id_paciente = $hora_medica->id_paciente;
            $uso_personal->id_ficha_atencion = $hora_medica->id_ficha_atencion;
            $uso_personal->id_profesional = $profesional->id;
            $uso_personal->id_lugar_atencion = $request->id_lugar_atencion;

            if (!$uso_personal->save()) {

                $datos['estado'] = 0;
                $datos['msj'] = 'problema al momento de registrar Uso Personal';

            }
            else
            {
                $delete  = UsoPersonal::where('id_ficha_atencion', $hora_medica->id_ficha_atencion)->whereNotIn('id', [$uso_personal->id])->delete();
                $datos['estado'] = 1;
                $datos['mjs'] = 'registro exitoso';
                $datos['delete'] = $delete;
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campo requerido';
            $datos['error'] = $error;
            $datos['request'] = $request->all();
        }

        return $datos;
    }

    public function get_tipo_examen(Request $request)
    {
        $tipo_examen = TipoExamen::all();

        return json_encode($tipo_examen);
    }

    public function get_sub_tipo_examen(Request $request)
    {
        $sub_tipo_examen = ExamenMedico::where('cod_parent', $request->tipo_examen)->where('habilitado', 1)->orderBy('nombre_examen','ASC')->get();
        return json_encode($sub_tipo_examen);
    }

    public function get_examen(Request $request)
    {
        $examen = ExamenMedico::where('cod_parent', $request->sub_tipo_examen)->where('habilitado', 1)->orderBy('nombre_examen','ASC')->get();
        return json_encode($examen);
    }

    public function buscar_examen(Request $request)
    {
        $examen = ExamenMedico::where('cod_examen', $request->id)->where('habilitado', 1)->orderBy('nombre_examen','ASC')->first();
        return $examen;
    }

    public function get_presentacion(Request $request)
    {
        $producto = Producto::where('id', $request->medicamento)->first();
        $presenta = $producto->Presentaciones()->get();

        return json_encode($presenta);
    }

    public function get_dosis(Request $request)
    {
        $presenta = Presentacion::where('id', $request->presentacion)->first();
        $dosis = $presenta->Dosis()->get();

        /* $pre_dos = PresentacionDosis::where('id_presentacion', $request->presentacion)->get();
         $dosis = [];
         $c = 0;
         foreach ($pre_dos as $pd) {
             $dosis[$c] = dosis::where('id', $pd->id_dosis)->first();
             $c++;
         }*/
        return json_encode($dosis);
    }

    public function get_recetas(Request $request)
    {
        $detalle_receta = DetalleReceta::where('id_ficha', $request->id_ficha)->get();

        /*if (!isset($detalle_receta->id)) {
            return json_encode(null);
        }*/

        return json_encode($detalle_receta);
    }

    public function get_examenes(Request $request)
    {
        $examen = ExamenPPF::where('id_ficha_atencion', $request->id_ficha)->get();

        /*  if (!$examen) {
            return json_encode($examen);
        }*/

        return json_encode($examen);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {

        if(!empty( trim($request->descripcion_hipotesis)))
        {
            // MEDICAMENTO REQUERIDO PARA CONSULTAS
            // if($request->id_consulta_control == 0)// CONSULTA
            // {
            //     if ($request->medicamentos == '[]' )
            //     {
            //         return back()->with('error', 'Ficha Clínica requiere cargar Medicamento.')->withInput();
            //     }
            // }


             // dd($request);
            //$ficha = new FichaAtencion();
            $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();

            $ficha = FichaAtencion::where('id', $hora_medica->id_ficha_atencion)->first();
            $id_profesional = $request->id_profesional_fc;
            $id_paciente = $request->id_paciente_fc;

            $ges = 0;
            if ($request->modal_ges == 'on') {
                $ges = 1;
            } else {
                $ges = 0;
            }

            $cronico = 0;
            if ($request->enf_cronico == 'on') {
                $cronico = 1;
            } else {
                $cronico = 0;
            }

            $confidencial = 0;
            if ($request->confidencial == 'on') {
                $confidencial = 1;
            } else {
                $confidencial = 0;
            }

            $ficha->motivo = $request->descripcion_consulta;
            $ficha->antecedentes = $request->descripcion_antecedentes;
            $ficha->examen_fisico = $request->descripcion_examen_fisico;

            //Signos vitales
            if ($request->temperatura != '') {
                $ficha->temperatura = $request->temperatura;
            } else {
                $ficha->temperatura = null;
            }

            if ($request->pulso != '') {
                $ficha->pulso = $request->pulso;
            } else {
                $ficha->pulso = null;
            }

            if ($request->frecuencia_reposo != '') {
                $ficha->frecuencia_reposo = $request->frecuencia_reposo;
            } else {
                $ficha->frecuencia_reposo = null;
            }

            if ($request->peso != '') {
                $ficha->peso = $request->peso;
            } else {
                $ficha->peso = null;
            }

            if ($request->talla != '') {
                $ficha->talla = $request->talla;
            } else {
                $ficha->talla = null;
            }

            if ($request->imc != '') {
                $ficha->imc = $request->imc;
            } else {
                $ficha->imc = null;
            }

            if ($request->estado_nutricional != '') {
                $ficha->estado_nutricional = $request->estado_nutricional;
            } else {
                $ficha->estado_nutricional = null;
            }

            //presion Arterial
            if ($request->presion_bi != '') {
                $ficha->presion_bi = $request->presion_bi;
            } else {
                $ficha->presion_bi = null;
            }

            if ($request->presion_bd != '') {
                $ficha->presion_bd = $request->presion_bd;
            } else {
                $ficha->presion_bd = null;
            }

            if ($request->presion_de_pie != '') {
                $ficha->presion_de_pie = $request->presion_de_pie;
            } else {
                $ficha->presion_de_pie = null;
            }

            if ($request->presion_sentado != '') {
                $ficha->presion_sentado = $request->presion_sentado;
            } else {
                $ficha->presion_sentado = null;
            }

            //comunicacion y Traslado
            if ($request->ct_estado_conciencia != '') {
                $ficha->ct_estado_conciencia = $request->ct_estado_conciencia;
            } else {
                $ficha->ct_estado_conciencia = null;
            }

            if ($request->ct_lenguaje != '') {
                $ficha->ct_lenguaje = $request->ct_lenguaje;
            } else {
                $ficha->ct_lenguaje = null;
            }

            if ($request->ct_traslado != '') {
                $ficha->ct_traslado = $request->ct_traslado;
            } else {
                $ficha->ct_traslado = null;
            }

            $ficha->hipotesis_diagnostico = $request->descripcion_hipotesis;
            $ficha->diagnostico_ce10 = $request->descripcion_cie;

            $ficha->cronico = $cronico;
            $ficha->ges = $ges;
            $ficha->confidencial = $confidencial;
            $ficha->id_paciente = $id_paciente;
            $ficha->id_profesional = $id_profesional;
            $ficha->finalizada = 1;

            if (!$ficha->save()) {
                // return 'error';
                return back()->with('error', 'Ficha Clínica con problema al guardar')->withInput();
            }
            else
            {
                $tipo_mensaje = 'success';
                $mensaje = 'Ficha Clínica guardada de forma correcta';

                //  finalizar hora medica
                $hora_medica->id_estado = 6;
                $mensaje_estado_hora_medica = '';
                if (!$hora_medica->save()) {
                    $mensaje_estado_hora_medica .= 'Hora Medica con Problemas para finalizar.';
                }
                else
                {
                    $mensaje_estado_hora_medica .= 'Hora medica Finalizada con Exito.';
                }
                $mensaje .= '\n' . $mensaje_estado_hora_medica;


                /**examenes */
                // $mensaje_examenes = '';
                // if ($request->examenes == '[]') {
                //    $mensaje_examenes = 'No se han agregado Examenes a Ficha Clínica.';
                // } else {
                //     $examenes = json_decode($request->examenes);

                //     if (!$examenes == null) {
                //         for ($i = 0; $i < count($examenes); ++$i) {
                //             $examen = new ExamenPPF();
                //             $examen->examen = $examenes[$i]->nombre_examen;
                //             $examen->tipo_examen = $examenes[$i]->tipo;

                //             switch ($examenes[$i]->prioridad) {
                //                 case 'Baja':
                //                     $examen->id_prioridad = 1;
                //                     break;
                //                 case 'Media':
                //                     $examen->id_prioridad = 2;
                //                     break;
                //                 case 'Alta':
                //                     $examen->id_prioridad = 3;
                //                     break;
                //                 case 'Urgente':
                //                     $examen->id_prioridad = 4;
                //                     break;
                //             }

                //             $examen->id_prioridad = 2;
                //             $examen->id_profesional = $id_profesional;
                //             $examen->id_ficha_atencion = $ficha->id;
                //             $examen->id_paciente = $id_paciente;
                //             $examen->tipo_ficha = 0;

                //             if (!$examen->save()) {
                //                 $mensaje_examenes .= 'Problema al registrar el examen '.$examenes[$i]->nombre_examen.'.';
                //             }
                //         }
                //     }
                // }

                /**medicamentos */
                // $mensaje_medicamento = '';
                // if ($request->medicamentos == '[]' ) {
                //    $mensaje_medicamento = 'No se han agregado Medicamentos a Ficha Clínica.';
                // } else {

                //     $medicamentos = json_decode($request->medicamentos);

                //     for ($i = 0; $i < count($medicamentos); ++$i) {

                //         //dd($medicamentos);
                //         $detalle_receta = new DetalleReceta();
                //         $detalle_receta->id_ficha =  $ficha->id;
                //         // $detalle_receta->id_ingreso_paciente = $medicamentos[$i]->ddd;
                //         // $detalle_receta->id_recuperacion = $medicamentos[$i]->ddd;
                //         // $detalle_receta->id_sala = $medicamentos[$i]->ddd;
                //         $detalle_receta->id_articulo = $medicamentos[$i]->id_producto;
                //         $detalle_receta->producto = $medicamentos[$i]->medicamento;
                //         $detalle_receta->presentacion = $medicamentos[$i]->presentacion;
                //         $detalle_receta->posologia = $medicamentos[$i]->posologia;
                //         $detalle_receta->via_administracion = $medicamentos[$i]->via_administracion;
                //         $detalle_receta->periodo = $medicamentos[$i]->periodo;
                //         $detalle_receta->cantidad_compra = $medicamentos[$i]->compra;
                //         $detalle_receta->cantidad_vendida = 0;
                //         // $detalle_receta->comentario = $medicamentos[$i]->ddd;
                //         // $detalle_receta->receta_token = $token_receta = encrypt( date('Ymd').'_'.$profesional->nombre.'_'.$paciente->apellido_uno.'_'.$lugar_atencion->id );
                //         $detalle_receta->estado = 1;

                //         if (!$detalle_receta->save()) {
                //             $mensaje_medicamento .= 'Problema al registrar el medicamento '.$$medicamentos[$i]->medicamento.'.';
                //         }
                //     }
                // }


                // if($mensaje_medicamento != '')
                // {
                //     $mensaje .= '\n' . $mensaje_medicamento;
                //     $tipo_mensaje = 'warning';
                // }
                // if($mensaje_examenes != '')
                // {
                //     $mensaje .= '\n' . $mensaje_examenes;
                //     $tipo_mensaje = 'warning';
                // }

                if($request->cerrarsession == 0 || $request->cerrarsession =='')
                {
                    /** redireccion Redirect funciona correcto */
                    return \Redirect::route('profesional.mi_agenda','lugares_atencion='.$request->id_lugar_atencion)->with($tipo_mensaje, $mensaje);
                }
                else if($request->cerrarsession == 1)
                {
					// $request->session()->invalidate();
					// $request->session()->regenerateToken();
					// return \Redirect::route('home.ingreso');
                    // return redirect()->route('logout')->with('request', $request);
                    // \Redirect::ROUTE('logout');

                   //si funciona
					$request->session()->invalidate();
                    $request->session()->regenerateToken();
                    return \Redirect::route('home.ingreso');

                }
            }
        }
        else
        {
            return back()->with('error', 'El Diagnóstico es Requerido.\n Su Ficha Clínica NO ha sido Guardada aún. \n Si es solo Control, indicar Control de Patología.')->withInput();;
        }

    }

    public function store_orl(Request $request)
    {

        $campos_requeridos = 0;
        $mensaje = '';
        if(empty( trim($request->descripcion_hipotesis)))
        {
            $campos_requeridos = 1;
            $mensaje = 'El Diagnóstico es Requerido.\n Su Ficha Clínica NO ha sido Guardada aún. \n Si es solo Control, indicar Control de Patología.';
        }
        else
        {
            if(empty($request->diag_endos))
            {
                // $campos_requeridos = 1;
                // $mensaje = 'El Diagnóstico Endoscópico es Requerido.\n Su Ficha Clínica NO ha sido Guardada aún.\n';
            }
            else
            {
                if(empty($request->solicitado_id_profesional_rfl))
                {
                    if(empty($request->solicitado_rut_rfl))
                    {
                        $campos_requeridos = 1;
                        $mensaje = 'Rinofibrolaringoscopía - Campo requerido RUT del Solicitante.\n';
                    }
                    if(empty($request->solicitado_nombre_rfl))
                    {
                        $campos_requeridos = 1;
                        $mensaje = 'Rinofibrolaringoscopía - Campo requerido NOMBRE del Solicitante.\n';
                    }
                    if(empty($request->solicitado_apellido_rfl))
                    {
                        $campos_requeridos = 1;
                        $mensaje = 'Rinofibrolaringoscopía - Campo requerido APELLIDO del Solicitante.\n';
                    }
                    if(empty($request->solicitado_telefono_rfl) || empty($request->solicitado_email_rfl))
                    {
                        $campos_requeridos = 1;
                        $mensaje = 'Rinofibrolaringoscopía - Campo requerido TELÉFONO o EMAIL del Solicitante.\n';
                    }
                }
            }
        }


        if($campos_requeridos == 0)
        {
            $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();

            $ficha = FichaAtencion::where('id', $hora_medica->id_ficha_atencion)->first();
            $id_profesional = $request->id_profesional_fc;
            $id_paciente = $request->id_paciente_fc;

            $ges = 0;
            if ($request->modal_ges == 'on') {
                $ges = 1;
            } else {
                $ges = 0;
            }

            $cronico = 0;
            if ($request->enf_cronico == 'on') {
                $cronico = 1;
            } else {
                $cronico = 0;
            }

            $confidencial = 0;
            if ($request->confidencial == 'on') {
                $confidencial = 1;
            } else {
                $confidencial = 0;
            }

            $ficha->motivo = $request->descripcion_consulta_orl;
            $ficha->antecedentes = $request->antec_especialidad;
            // $ficha->examen_fisico = $request->descripcion_examen_fisico;

            //Signos vitales
            if ($request->temperatura != '') {
                $ficha->temperatura = $request->temperatura;
            } else {
                $ficha->temperatura = null;
            }

            if ($request->pulso != '') {
                $ficha->pulso = $request->pulso;
            } else {
                $ficha->pulso = null;
            }

            if ($request->frecuencia_reposo != '') {
                $ficha->frecuencia_reposo = $request->frecuencia_reposo;
            } else {
                $ficha->frecuencia_reposo = null;
            }

            if ($request->peso != '') {
                $ficha->peso = $request->peso;
            } else {
                $ficha->peso = null;
            }

            if ($request->talla != '') {
                $ficha->talla = $request->talla;
            } else {
                $ficha->talla = null;
            }

            if ($request->imc != '') {
                $ficha->imc = $request->imc;
            } else {
                $ficha->imc = null;
            }

            if ($request->estado_nutricional != '') {
                $ficha->estado_nutricional = $request->estado_nutricional;
            } else {
                $ficha->estado_nutricional = null;
            }

            //presion Arterial
            if ($request->presion_bi != '') {
                $ficha->presion_bi = $request->presion_bi;
            } else {
                $ficha->presion_bi = null;
            }

            if ($request->presion_bd != '') {
                $ficha->presion_bd = $request->presion_bd;
            } else {
                $ficha->presion_bd = null;
            }

            if ($request->presion_de_pie != '') {
                $ficha->presion_de_pie = $request->presion_de_pie;
            } else {
                $ficha->presion_de_pie = null;
            }

            if ($request->presion_sentado != '') {
                $ficha->presion_sentado = $request->presion_sentado;
            } else {
                $ficha->presion_sentado = null;
            }

            //comunicacion y Traslado
            if ($request->ct_estado_conciencia != '') {
                $ficha->ct_estado_conciencia = $request->ct_estado_conciencia;
            } else {
                $ficha->ct_estado_conciencia = null;
            }

            if ($request->ct_lenguaje != '') {
                $ficha->ct_lenguaje = $request->ct_lenguaje;
            } else {
                $ficha->ct_lenguaje = null;
            }

            if ($request->ct_traslado != '') {
                $ficha->ct_traslado = $request->ct_traslado;
            } else {
                $ficha->ct_traslado = null;
            }

            $ficha->hipotesis_diagnostico = $request->descripcion_hipotesis;
            $ficha->diagnostico_ce10 = $request->descripcion_cie;

            // $ficha->cronico = $cronico;
            // $ficha->ges = $ges;
            // $ficha->confidencial = $confidencial;
            $ficha->id_paciente = $id_paciente;
            $ficha->id_profesional = $id_profesional;
            $ficha->finalizada = 1;

            if (!$ficha->save())
            {
                return back()->with('error', 'Ficha Clínica con problema al guardar')->withInput();
            }
            else
            {
                $tipo_mensaje = 'success';
                $mensaje = 'Ficha Clínica guardada de forma correcta\n';


                /** registro ficha especialidad */
                $ficha_orl = new FichaOtorrino();
                $ficha_orl->id_fichas_atenciones = $ficha->id;
                $ficha_orl->id_paciente = $id_paciente;
                $ficha_orl->id_usa_audifono = $request->usa_audifono;
                $ficha_orl->audifono = $request->audifono;
                $ficha_orl->apreciacion_auditiva = $request->apreciacion_auditiva;
                $ficha_orl->aprec_auditiva_def = $request->aprec_auditiva_def;
                $ficha_orl->examen_oi = $request->examen_oi;
                $ficha_orl->ex_oi_anormal = $request->ex_oi_anormal;
                $ficha_orl->examen_od = $request->examen_od;
                $ficha_orl->ex_od_anormal = $request->examen_od;
                $ficha_orl->obs_ex_oidos = $request->ex_od_anormal;
                $ficha_orl->examen_bio_oi = $request->examen_bio_oi;
                $ficha_orl->obs_examen_bio_oi = $request->obs_examen_bio_oi;
                $ficha_orl->examen_bio_od = $request->examen_bio_od;
                $ficha_orl->obs_examen_bio_od = $request->obs_examen_bio_od;
                $ficha_orl->obs_ex_biom = $request->obs_ex_biom;

                $ficha_orl->id_tipo_episodios = $request->episodios;
                $ficha_orl->obs_episodios = $request->detalle_episodios;
                $ficha_orl->id_tipo_equilibrio = $request->equilibrio;
                $ficha_orl->obs_equilibrio = $request->detalle_equilibrio;
                $ficha_orl->id_tipo_ng = $request->ng;
                $ficha_orl->obs_ng = $request->detalle_ng;
                $ficha_orl->id_tipo_sint_acomp = $request->sint_acomp;
                $ficha_orl->obs_sint_acomp = $request->detalle_sint_acompanantes;
                $ficha_orl->id_tipo_vertigo = $request->tipo_vertigo;
                $ficha_orl->obs_tipo_vertigo = $request->detalle_tipo_vertigo;
                $ficha_orl->obs_vestibular = $request->obs_vestibular;

                $ficha_orl->nariz_general = $request->nariz_general;
                $ficha_orl->det_nariz_general = $request->det_nariz_general;
                $ficha_orl->apreciacion_resp = $request->apreciacion_resp;
                $ficha_orl->aprec_resp_def = $request->aprec_resp_def;
                $ficha_orl->examen_fni = $request->examen_fni;
                $ficha_orl->ex_fni_anormal = $request->ex_fni_anormal;
                $ficha_orl->examen_fnd = $request->examen_fnd;
                $ficha_orl->ex_fnd_anormal = $request->ex_fnd_anormal;
                $ficha_orl->obs_ex_nasal = $request->obs_ex_nasal;
                $ficha_orl->disfonia = $request->disfonia;
                $ficha_orl->det_disfonia = $request->det_disfonia;
                $ficha_orl->ex_boca = $request->ex_boca;
                $ficha_orl->detalle_ex_boca = $request->detalle_ex_boca;

                $ficha_orl->examen_faringe =$request->examen_faringe;
                $ficha_orl->ex_farige_anormal = $request->ex_farige_anormal;
                $ficha_orl->examen_laringe =$request->examen_laringe;
                $ficha_orl->ex_larige_anormal = $request->ex_larige_anormal;

                $ficha_orl->obs_examen_laringe = $request->obs_examen_laringe;

                $ficha_orl->obs_ex_orl = $request->bs_ex_orl;
                $ficha_orl->hip_diag_orl = $request->diag_spec;
                $ficha_orl->ind_orl = $request->ind_orl;
                $ficha_orl->estado = 1;

                if($ficha_orl->save())
                {
                    $datos['ficha_orl']['estado'] = 1;
                    $datos['ficha_orl']['msj'] = 'registro exitoso';
                    $mensaje .= '\n'.'Ficha Otorrino guardada de forma correcta';

                }
                else
                {
                    $datos['ficha_orl']['estado'] = 0;
                    $datos['ficha_orl']['msj'] = 'registro NO exitoso';
                    $mensaje .= '\n'.'Ficha Otorrino No guardada ';
                }

                //  finalizar hora medica
                $hora_medica->id_estado = 6;
                $mensaje_estado_hora_medica = '';
                if (!$hora_medica->save()) {
                    $mensaje_estado_hora_medica .= 'Hora Medica con Problemas para finalizar.\n';
                }
                else
                {
                    $mensaje_estado_hora_medica .= 'Hora medica Finalizada con Exito.\n';
                }
                $mensaje .= $mensaje_estado_hora_medica;


                /** registro examen especialidad Rinofibrolaringoscopía */
                $parametro = $request->all();
                $parametro['id_ficha_otorrino'] = $ficha_orl->id;
                $examen_json = ExamenEspecialidadController::estructuraJson(1,$parametro);

                if($examen_json['estado'] == 1)
                {
                    $profesional = Profesional::find($id_profesional);

                    $examen = new ExamenEspecialidad();
                    $examen->id_tipo = '1';
                    $examen->id_template = '1';
                    $examen->id_examen_tipo = '1';
                    $examen->id_sub_tipo_especialidad = $profesional->id_sub_tipo_especialidada;
                    $examen->id_ficha_atencion = $ficha->id;
                    $examen->id_ficha_especialidad = $ficha_orl->id;
                    $examen->id_paciente = $id_paciente;
                    $examen->id_profesional = $id_profesional;
                    $examen->nombre = 'Rinofibrolaringoscopía';
                    $examen->cuerpo = $examen_json['json'];
                    $examen->estado = '1';

                    // if($registro_rfl->save())
                    if($examen->save())
                    {
                        $datos['examen']['estado'] = 1;
                        $datos['examen']['msj'] = 'registro exitoso';
                        $mensaje .= 'Ficha Otorrino Rinofibrolaringoscopía guardada de forma correcta\n';

                        /** registro de imagenes  */
                        if(!empty($request->input_lista_imagenes))
                        {
                            $array_imagenes = json_decode($request->input_lista_imagenes);

                            $resulto_img = array();
                            foreach ($array_imagenes as $key => $value)
                            {
                                $paciente = Paciente::find($id_paciente);
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
                            $datos['examen']['resulto_img'] = $resulto_img;

                        }

                        /** registro de porfesional provisorio */
                        if(empty($request->solicitado_id_profesional_rfl))
                        {
                            $profesional_provisorio = ProfesionalProvisorioController::registrar( $request->solicitado_nombre_rfl, $request->solicitado_apellido_rfl, '', '', $request->solicitado_rut_rfl, $request->solicitado_email_rfl, $request->solicitado_telefono_rfl, '', '', '', '', '', '', '', '', '', 1);

                            if($profesional_provisorio['estado'] == 1)
                            {
                                $datos['registro_prof_provi']['estado'] = 1;
                                $datos['registro_prof_provi']['msj'] = 'registro exitoso';
                                $datos['registro_prof_provi']['result'] = $profesional_provisorio;

                                $mensaje .= 'Profesional Prvisorio creado\n';
                            }
                            else
                            {
                                $datos['registro_prof_provi']['estado'] = 0;
                                $datos['registro_prof_provi']['msj'] = 'falla en registro';
                                $datos['registro_prof_provi']['result'] = $profesional_provisorio;
                                $mensaje .= 'Profesional Prvisorio creado\n';
                            }

                        }

                    }
                    else
                    {
                        $datos['examen']['estado'] = 0;
                        $datos['examen']['msj'] = 'registro NO exitoso';
                        $mensaje .= 'Ficha Otorrino Rinofibrolaringoscopía No guardada \n';
                    }
                }
                else
                {
                    $mensaje .= 'Problema al registrar Examen Espacial';
                }

                if($request->cerrarsession == 0 || $request->cerrarsession =='')
                {
                    // if($request->mostrarpdf == 0 || $request->mostrarpdf =='')
                    // {
                    //     return \Redirect::route('profesional.mi_agenda','lugares_atencion='.$request->id_lugar_atencion)->with($tipo_mensaje, $mensaje);
                    // }
                    // else
                    {
                        /** redireccion Redirect funciona correcto */
                        $array_tem = array(
                            'lugares_atencion' => $request->id_lugar_atencion,
                            'pdf' => $request->mostrarpdf,
                            'tipo' => $request->tipopdf,
                            'id_examen' => $examen->id,
                        );
                        return \Redirect::route('profesional.mi_agenda',$array_tem)->with($tipo_mensaje, $mensaje);
                    }
                }
                else if($request->cerrarsession == 1)
                {
                   //si funciona
					$request->session()->invalidate();
                    $request->session()->regenerateToken();
                    return \Redirect::route('home.ingreso');

                }
            }
        }
        else
        {
            return back()->with('error', $mensaje)->withInput();
        }

    }

    public function store_cg(Request $request)
    {
        $campos_requeridos = 0;
        $mensaje = '';
        if(empty( trim($request->hip_diag_spec)))
        {
            $campos_requeridos = 1;
            $mensaje = 'El Diagnóstico es Requerido.\n Su Ficha Clínica NO ha sido Guardada aún. \n Si es solo Control, indicar Control de Patología.';
        }


        if($campos_requeridos == 0)
        {
            $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();

            $ficha = FichaAtencion::where('id', $hora_medica->id_ficha_atencion)->first();
            $id_profesional = $request->id_profesional_fc;
            $id_paciente = $request->id_paciente_fc;

            $ges = 0;
            if ($request->modal_ges == 'on') {
                $ges = 1;
            } else {
                $ges = 0;
            }

            $cronico = 0;
            if ($request->enf_cronico == 'on') {
                $cronico = 1;
            } else {
                $cronico = 0;
            }

            $confidencial = 0;
            if ($request->confidencial == 'on') {
                $confidencial = 1;
            } else {
                $confidencial = 0;
            }

            $ficha->motivo = $request->descripcion_consulta_cdg;
            $ficha->antecedentes = $request->antec_especialidad_cdg;
            // $ficha->examen_fisico = $request->descripcion_examen_fisico;

            //Signos vitales
            if ($request->temperatura != '') {
                $ficha->temperatura = $request->temperatura;
            } else {
                $ficha->temperatura = null;
            }

            if ($request->pulso != '') {
                $ficha->pulso = $request->pulso;
            } else {
                $ficha->pulso = null;
            }

            if ($request->frecuencia_reposo != '') {
                $ficha->frecuencia_reposo = $request->frecuencia_reposo;
            } else {
                $ficha->frecuencia_reposo = null;
            }

            if ($request->peso != '') {
                $ficha->peso = $request->peso;
            } else {
                $ficha->peso = null;
            }

            if ($request->talla != '') {
                $ficha->talla = $request->talla;
            } else {
                $ficha->talla = null;
            }

            if ($request->imc != '') {
                $ficha->imc = $request->imc;
            } else {
                $ficha->imc = null;
            }

            if ($request->estado_nutricional != '') {
                $ficha->estado_nutricional = $request->estado_nutricional;
            } else {
                $ficha->estado_nutricional = null;
            }

            //presion Arterial
            if ($request->presion_bi != '') {
                $ficha->presion_bi = $request->presion_bi;
            } else {
                $ficha->presion_bi = null;
            }

            if ($request->presion_bd != '') {
                $ficha->presion_bd = $request->presion_bd;
            } else {
                $ficha->presion_bd = null;
            }

            if ($request->presion_de_pie != '') {
                $ficha->presion_de_pie = $request->presion_de_pie;
            } else {
                $ficha->presion_de_pie = null;
            }

            if ($request->presion_sentado != '') {
                $ficha->presion_sentado = $request->presion_sentado;
            } else {
                $ficha->presion_sentado = null;
            }

            //comunicacion y Traslado
            if ($request->ct_estado_conciencia != '') {
                $ficha->ct_estado_conciencia = $request->ct_estado_conciencia;
            } else {
                $ficha->ct_estado_conciencia = null;
            }

            if ($request->ct_lenguaje != '') {
                $ficha->ct_lenguaje = $request->ct_lenguaje;
            } else {
                $ficha->ct_lenguaje = null;
            }

            if ($request->ct_traslado != '') {
                $ficha->ct_traslado = $request->ct_traslado;
            } else {
                $ficha->ct_traslado = null;
            }

            $ficha->hipotesis_diagnostico = $request->hip_diag_spec;
            $ficha->diagnostico_ce10 = $request->descripcion_cie_esp;

            // $ficha->cronico = $cronico;
            // $ficha->ges = $ges;
            // $ficha->confidencial = $confidencial;
            $ficha->id_paciente = $id_paciente;
            $ficha->id_profesional = $id_profesional;
            $ficha->finalizada = 1;

            if (!$ficha->save())
            {
                return back()->with('error', 'Ficha Clínica con problema al guardar')->withInput();
            }
            else
            {
                $tipo_mensaje = 'success';
                $mensaje = 'Ficha Clínica guardada de forma correcta\n';

                /** registro de ficha Cirugia General  */
                $ficha_cg = new FichaCirugiaGeneral();
                $ficha_cg->id_ficha_atencion = $ficha->id;
                $ficha_cg->id_profesional = $id_profesional;
                $ficha_cg->id_paciente = $id_paciente;
                $ficha_cg->ind_esp_cirugia = $request->ind_esp_cirugia;
                $ficha_cg->e_general = $request->e_general;
                $ficha_cg->obs_e_general = $request->obs_e_general;
                $ficha_cg->e_signos_vit = $request->e_signos_vit;
                $ficha_cg->obs_e_signos_vit = $request->obs_e_signos_vit;
                $ficha_cg->e_dolor_loc = $request->e_dolor_loc;
                $ficha_cg->obs_e_dolor_loc = $request->obs_e_dolor_loc;
                $ficha_cg->masas_pal = $request->masas_pal;
                $ficha_cg->obs_masas_pal = $request->obs_masas_pal;
                $ficha_cg->e_piel_fan = $request->e_piel_fan;
                $ficha_cg->obs_e_piel_fan = $request->obs_e_piel_fan;
                $ficha_cg->ex_cabcuello = $request->ex_cabcuello;
                $ficha_cg->obs_ex_cabcuello = $request->obs_ex_cabcuello;
                $ficha_cg->ex_torax = $request->ex_torax;
                $ficha_cg->obs_ex_torax = $request->obs_ex_torax;
                $ficha_cg->ex_abdomen = $request->ex_abdomen;
                $ficha_cg->obs_ex_abdomen = $request->obs_ex_abdomen;
                $ficha_cg->ex_muscesq = $request->ex_muscesq;
                $ficha_cg->obs_ex_muscesq = $request->obs_ex_muscesq;
                $ficha_cg->ex_o_sent = $request->ex_o_sent;
                $ficha_cg->obs_ex_o_sent = $request->obs_ex_o_sent;
                $ficha_cg->obs_ex_segmentario = $request->obs_ex_segmentario;
                $ficha_cg->urgencia_cg = $request->urgencia_cg;
                $ficha_cg->obs_urgencia_cg = $request->obs_urgencia_cg;
                $ficha_cg->hosp_cg = $request->hosp_cg;
                $ficha_cg->obs_hosp_cg = $request->obs_hosp_cg;
                $ficha_cg->otrotto_cg = $request->otrotto_cg;
                $ficha_cg->obs_otrotto_cg = $request->obs_otrotto_cg;
                $ficha_cg->obs_plan_tratamiento = $request->obs_plan_tratamiento;
                $ficha_cg->hospen_cg = $request->hospen_cg;
                $ficha_cg->obs_hospen_cg = $request->obs_hospen_cg;
                $ficha_cg->hosp_enserv_cg = $request->hosp_enserv_cg;
                $ficha_cg->obs_hosp_enserv_cg = $request->obs_hosp_enserv_cg;
                $ficha_cg->otro_tto_cg = $request->otro_tto_cg;
                $ficha_cg->obs_otro_tto_cg = $request->obs_otro_tto_cg;
                $ficha_cg->obs_hospitalizacion_cg = $request->obs_hospitalizacion_cg;
                // $ficha_cg->otro = '';
                $ficha_cg->estado = 1;

                if($ficha_cg->save())
                {
                    $mensaje = 'Ficha Cirugia General guardada de forma correcta\n';
                }
                else
                {
                    $mensaje .= 'Ficha Cirugia General presento problema al guardar\n';
                }

                // finalizar hora medica
                $hora_medica->id_estado = 6;
                $mensaje_estado_hora_medica = '';
                if (!$hora_medica->save()) {
                    $mensaje_estado_hora_medica .= 'Hora Medica con Problemas para finalizar.\n';
                }
                else
                {
                    $mensaje_estado_hora_medica .= 'Hora medica Finalizada con Exito.\n';
                }
                $mensaje .= $mensaje_estado_hora_medica;

                if($request->cerrarsession == 0 || $request->cerrarsession =='')
                {
                    /** redireccion Redirect funciona correcto */
                    return \Redirect::route('profesional.mi_agenda','lugares_atencion='.$request->id_lugar_atencion)->with($tipo_mensaje, $mensaje);
                }
                else if($request->cerrarsession == 1)
                {
                    //si funciona
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                    return \Redirect::route('home.ingreso');

                }
            }
        }
        else
        {
            var_dump($mensaje);
            exit();
            return back()->with('error', $mensaje)->withInput();
        }
    }

    public function store_cdg(Request $request)
    {
        $campos_requeridos = 0;
        $mensaje = '';
        if(empty( trim($request->hip_diag_spec)))
        {
            $campos_requeridos = 1;
            $mensaje = 'El Diagnóstico es Requerido.\n Su Ficha Clínica NO ha sido Guardada aún. \n Si es solo Control, indicar Control de Patología.';
        }
        else
        {
            if(!empty($request->diag_endos_eda))
            {
                if($request->diag_endos_eda != 'Test de ureasa No tomado')
                {
                    if(empty($request->id_profesional_solicitado_por_eda))
                    {
                        if(empty($request->solicitado_por_rut_eda))
                        {
                            $campos_requeridos = 1;
                            $mensaje = 'Endoscopía Digestiva Alta - Campo requerido RUT del Solicitante.\n';
                        }
                        if(empty($request->solicitado_por_nombre_eda))
                        {
                            $campos_requeridos = 1;
                            $mensaje = 'Endoscopía Digestiva Alta - Campo requerido NOMBRE del Solicitante.\n';
                        }
                        if(empty($request->solicitado_por_apellido_eda))
                        {
                            $campos_requeridos = 1;
                            $mensaje = 'Endoscopía Digestiva Alta - Campo requerido APELLIDO del Solicitante.\n';
                        }
                        if(empty($request->solicitado_por_telefono_eda) || empty($request->solicitado_por_email_eda))
                        {
                            $campos_requeridos = 1;
                            $mensaje = 'Endoscopía Digestiva Alta - Campo requerido TELÉFONO o EMAIL del Solicitante.\n';
                        }
                    }
                }

            }
            else if(!empty($request->diag_endos_edb))
            {
                if(empty($request->id_profesional_solicitado_por_edb))
                {
                    if(empty($request->solicitado_por_rut_edb))
                    {
                        $campos_requeridos = 1;
                        $mensaje = 'Endoscopía Digestiva Baja - Campo requerido RUT del Solicitante.\n';
                    }
                    if(empty($request->solicitado_por_nombre_edb))
                    {
                        $campos_requeridos = 1;
                        $mensaje = 'Endoscopía Digestiva Baja - Campo requerido NOMBRE del Solicitante.\n';
                    }
                    if(empty($request->solicitado_por_apellido_edb))
                    {
                        $campos_requeridos = 1;
                        $mensaje = 'Endoscopía Digestiva Baja - Campo requerido APELLIDO del Solicitante.\n';
                    }
                    if(empty($request->solicitado_por_telefono_edb) || empty($request->solicitado_por_email_edb))
                    {
                        $campos_requeridos = 1;
                        $mensaje = 'Endoscopía Digestiva Baja - Campo requerido TELÉFONO o EMAIL del Solicitante.\n';
                    }
                }
            }

        }

        if($campos_requeridos == 0)
        {
            $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();

            $ficha = FichaAtencion::where('id', $hora_medica->id_ficha_atencion)->first();
            $id_profesional = $request->id_profesional_fc;
            $id_paciente = $request->id_paciente_fc;

            $ges = 0;
            if ($request->modal_ges == 'on') {
                $ges = 1;
            } else {
                $ges = 0;
            }

            $cronico = 0;
            if ($request->enf_cronico == 'on') {
                $cronico = 1;
            } else {
                $cronico = 0;
            }

            $confidencial = 0;
            if ($request->confidencial == 'on') {
                $confidencial = 1;
            } else {
                $confidencial = 0;
            }

            $ficha->motivo = $request->descripcion_consulta_cdg;
            $ficha->antecedentes = $request->antec_especialidad_cdg;
            // $ficha->examen_fisico = $request->descripcion_examen_fisico;

            //Signos vitales
            if ($request->temperatura != '') {
                $ficha->temperatura = $request->temperatura;
            } else {
                $ficha->temperatura = null;
            }

            if ($request->pulso != '') {
                $ficha->pulso = $request->pulso;
            } else {
                $ficha->pulso = null;
            }

            if ($request->frecuencia_reposo != '') {
                $ficha->frecuencia_reposo = $request->frecuencia_reposo;
            } else {
                $ficha->frecuencia_reposo = null;
            }

            if ($request->peso != '') {
                $ficha->peso = $request->peso;
            } else {
                $ficha->peso = null;
            }

            if ($request->talla != '') {
                $ficha->talla = $request->talla;
            } else {
                $ficha->talla = null;
            }

            if ($request->imc != '') {
                $ficha->imc = $request->imc;
            } else {
                $ficha->imc = null;
            }

            if ($request->estado_nutricional != '') {
                $ficha->estado_nutricional = $request->estado_nutricional;
            } else {
                $ficha->estado_nutricional = null;
            }

            //presion Arterial
            if ($request->presion_bi != '') {
                $ficha->presion_bi = $request->presion_bi;
            } else {
                $ficha->presion_bi = null;
            }

            if ($request->presion_bd != '') {
                $ficha->presion_bd = $request->presion_bd;
            } else {
                $ficha->presion_bd = null;
            }

            if ($request->presion_de_pie != '') {
                $ficha->presion_de_pie = $request->presion_de_pie;
            } else {
                $ficha->presion_de_pie = null;
            }

            if ($request->presion_sentado != '') {
                $ficha->presion_sentado = $request->presion_sentado;
            } else {
                $ficha->presion_sentado = null;
            }

            //comunicacion y Traslado
            if ($request->ct_estado_conciencia != '') {
                $ficha->ct_estado_conciencia = $request->ct_estado_conciencia;
            } else {
                $ficha->ct_estado_conciencia = null;
            }

            if ($request->ct_lenguaje != '') {
                $ficha->ct_lenguaje = $request->ct_lenguaje;
            } else {
                $ficha->ct_lenguaje = null;
            }

            if ($request->ct_traslado != '') {
                $ficha->ct_traslado = $request->ct_traslado;
            } else {
                $ficha->ct_traslado = null;
            }

            $ficha->hipotesis_diagnostico = $request->hip_diag_spec;
            $ficha->diagnostico_ce10 = $request->descripcion_cie_esp;

            // $ficha->cronico = $cronico;
            // $ficha->ges = $ges;
            // $ficha->confidencial = $confidencial;
            $ficha->id_paciente = $id_paciente;
            $ficha->id_profesional = $id_profesional;
            $ficha->finalizada = 1;

            if (!$ficha->save())
            {
                return back()->with('error', 'Ficha Clínica con problema al guardar')->withInput();
            }
            else
            {
                $tipo_mensaje = 'success';
                $mensaje = 'Ficha Clínica guardada de forma correcta\n';

                /** registro de ficha Cirugia General  */
                $ficha_cg = new FichaCirugiaGeneral();
                $ficha_cg->id_ficha_atencion = $ficha->id;
                $ficha_cg->id_profesional = $id_profesional;
                $ficha_cg->id_paciente = $id_paciente;
                $ficha_cg->ind_esp_cirugia = $request->ind_esp_cirugia;
                $ficha_cg->e_general = $request->e_general;
                $ficha_cg->obs_e_general = $request->obs_e_general;
                $ficha_cg->e_signos_vit = $request->e_signos_vit;
                $ficha_cg->obs_e_signos_vit = $request->obs_e_signos_vit;
                $ficha_cg->e_dolor_loc = $request->e_dolor_loc;
                $ficha_cg->obs_e_dolor_loc = $request->obs_e_dolor_loc;
                $ficha_cg->masas_pal = $request->masas_pal;
                $ficha_cg->obs_masas_pal = $request->obs_masas_pal;
                $ficha_cg->e_piel_fan = $request->e_piel_fan;
                $ficha_cg->obs_e_piel_fan = $request->obs_e_piel_fan;
                $ficha_cg->ex_cabcuello = $request->ex_cabcuello;
                $ficha_cg->obs_ex_cabcuello = $request->obs_ex_cabcuello;
                $ficha_cg->ex_torax = $request->ex_torax;
                $ficha_cg->obs_ex_torax = $request->obs_ex_torax;
                $ficha_cg->ex_abdomen = $request->ex_abdomen;
                $ficha_cg->obs_ex_abdomen = $request->obs_ex_abdomen;
                $ficha_cg->ex_muscesq = $request->ex_muscesq;
                $ficha_cg->obs_ex_muscesq = $request->obs_ex_muscesq;
                $ficha_cg->ex_o_sent = $request->ex_o_sent;
                $ficha_cg->obs_ex_o_sent = $request->obs_ex_o_sent;
                $ficha_cg->obs_ex_segmentario = $request->obs_ex_segmentario;
                $ficha_cg->urgencia_cg = $request->urgencia_cg;
                $ficha_cg->obs_urgencia_cg = $request->obs_urgencia_cg;
                $ficha_cg->hosp_cg = $request->hosp_cg;
                $ficha_cg->obs_hosp_cg = $request->obs_hosp_cg;
                $ficha_cg->otrotto_cg = $request->otrotto_cg;
                $ficha_cg->obs_otrotto_cg = $request->obs_otrotto_cg;
                $ficha_cg->obs_plan_tratamiento = $request->obs_plan_tratamiento;
                $ficha_cg->hospen_cg = $request->hospen_cg;
                $ficha_cg->obs_hospen_cg = $request->obs_hospen_cg;
                $ficha_cg->hosp_enserv_cg = $request->hosp_enserv_cg;
                $ficha_cg->obs_hosp_enserv_cg = $request->obs_hosp_enserv_cg;
                $ficha_cg->otro_tto_cg = $request->otro_tto_cg;
                $ficha_cg->obs_otro_tto_cg = $request->obs_otro_tto_cg;
                $ficha_cg->obs_hospitalizacion_cg = $request->obs_hospitalizacion_cg;
                // $ficha_cg->otro = '';
                $ficha_cg->estado = 1;

                if($ficha_cg->save())
                {

                    $mensaje = 'Ficha Cirugia General guardada de forma correcta\n';

                    /** registro de ficha Cirugia Digestiva */
                    $ficha_cd = new FichaCirugiaDigestiva();
                    $ficha_cd->id_ficha_atencion = $ficha->id;
                    $ficha_cd->id_ficha_cirugia = $ficha_cg->id;
                    $ficha_cd->id_profesional = $id_profesional;
                    $ficha_cd->id_paciente = $id_paciente;
                    $ficha_cd->ind_esp_cirugia = $request->ind_esp_cirugia;
                    $ficha_cd->dolor_cdg = $request->dolor_cdg;
                    $ficha_cd->obs_dolor_cdg = $request->obs_dolor_cdg;

                    $ficha_cd->transito_intest = $request->transito_intest;
                    $ficha_cd->obs_transito_intest = $request->obs_transito_intest;
                    $ficha_cd->dolor_def = $request->dolor_def;
                    $ficha_cd->obs_dolor_def = $request->obs_dolor_def;
                    $ficha_cd->sangre_otros = $request->sangre_otros;
                    $ficha_cd->obs_sangre_otros = $request->obs_sangre_otros;

                    $ficha_cd->otros_sintomas_cdg = $request->otros_sintomas_cdg;
                    $ficha_cd->obs_otros_sintomas_cdg = $request->obs_otros_sintomas_cdg;
                    $ficha_cd->ceg_cdg = $request->ceg_cdg;
                    $ficha_cd->obs_ceg_cdg = $request->obs_ceg_cdg;
                    $ficha_cd->masa_cdg = $request->masa_cdg;
                    $ficha_cd->obs_masa_cdg = $request->obs_masa_cdg;
                    $ficha_cd->urgencia_cdg = $request->urgencia_cdg;
                    $ficha_cd->obs_urgencia_cdg = $request->obs_urgencia_cdg;
                    $ficha_cd->so_cdg = $request->so_cdg;
                    $ficha_cd->obs_so_cdg = $request->obs_so_cdg;
                    $ficha_cd->obs_egp_cdg = $request->obs_egp_cdg;
                    $ficha_cd->obs_gen_ex_esp_cdg = $request->obs_gen_ex_esp_cdg;
                    // $ficha_cd->otro = '';
                    $ficha_cd->estado = 1;

                    if($ficha_cd->save())
                    {
                        $mensaje .= 'Ficha Cirugia Digestiva guardada de forma correcta\n';

                        /** REGISTRO DE EXAMEN */
                        $lista_examen_especialidad = explode('|',$request->tipo_examen_especial);
                        foreach ($lista_examen_especialidad as $key_examen_tipo => $value_examen_tipo)
                        {
                            $parametro = $request->all();

                            $temp_value_examen_tipo = explode(',',$value_examen_tipo);
                            // $temp_value_examen_tipo[0] = alias template
                            // $temp_value_examen_tipo[1] = id_tipo
                            // $temp_value_examen_tipo[2] = id_template

                            if( !empty( $request['diag_endos_'.$temp_value_examen_tipo[0]] ) )
                            {

                                if($request['diag_endos_'.$temp_value_examen_tipo[0]] != 'Test de ureasa No tomado')
                                {
                                    /** limpiar parametos */
                                    foreach( $parametro as $key => $value )
                                    {
                                        if(!strpos($key, '_'.$temp_value_examen_tipo[0]) && !strpos($key, 'id_fc') && !strpos($key, '_fc') )
                                        unset($parametro[$key]);
                                    }

                                    $parametro['id_ficha_cirugia_digestiva'] = $ficha_cd->id;
                                    $examen_json = ExamenEspecialidadController::estructuraJson($temp_value_examen_tipo[2],$parametro);
                                    if($examen_json['estado'] == 1)
                                    {
                                        $profesional = Profesional::find($id_profesional);
                                        $template = ExamenEspecialidadTemplate::find($temp_value_examen_tipo[2]);

                                        $examen = new ExamenEspecialidad();
                                        $examen->id_tipo = '1';
                                        $examen->id_template = $temp_value_examen_tipo[2];
                                        $examen->id_examen_tipo = $temp_value_examen_tipo[1];
                                        $examen->id_sub_tipo_especialidad = $profesional->id_sub_tipo_especialidad;
                                        $examen->id_ficha_atencion = $ficha->id;
                                        $examen->id_ficha_especialidad = $ficha_cd->id;
                                        $examen->id_paciente = $id_paciente;
                                        $examen->id_profesional = $id_profesional;
                                        $examen->nombre = $template->nombre;
                                        $examen->cuerpo = $examen_json['json'];
                                        $examen->estado = '1';
                                        if($examen->save())
                                        {
                                            $datos['examen'][$temp_value_examen_tipo[0]]['estado'] = 1;
                                            $datos['examen'][$temp_value_examen_tipo[0]]['msj'] = 'registro exitoso';
                                            $mensaje .= 'Examen '.$template->nombre.' registrado de forma exitosa\n';

                                            /** carga imagen */
                                            if(!empty($request->input_lista_imagenes))
                                            {

                                                $array_imagenes = (array)json_decode($request->input_lista_imagenes);

                                                // var_dump($array_imagenes);
                                                // var_dump($temp_value_examen_tipo[0]);
                                                // var_dump($array_imagenes[$temp_value_examen_tipo[0]]);

                                                if(!empty($array_imagenes[$temp_value_examen_tipo[0]]))
                                                {
                                                    $resulto_img = array();
                                                    foreach ($array_imagenes[$temp_value_examen_tipo[0]] as $key => $value)
                                                    {
                                                        $paciente = Paciente::find($id_paciente);
                                                        // echo json_encode($value);
                                                        $ruta_temp = $value[0];
                                                        $nombre_real = $value[1];
                                                        $nombre_temp = $value[2];
                                                        $file_extension = $value[3];
                                                        if(isset($value[4])) $descripcion = $value[4];
                                                        else $descripcion = '';
                                                        $nombre_final = $paciente->rut.'_'.$examen->id.'_'.date('YmdHis').'_'.uniqid().'.'.$file_extension;

                                                        $resulto_img[$key] = CargaImagenController::moverImagen($nombre_temp, 'img_examen', $nombre_final);
                                                        $registro_img = new ExamenEspecialidadImg();
                                                        $registro_img->id_examen = $examen->id;
                                                        $registro_img->url = $resulto_img[$key]['proceso']['url'];
                                                        $registro_img->nombre = $nombre_final;
                                                        $registro_img->otro = $descripcion;
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
                                                    $datos['examen'][$temp_value_examen_tipo[0]]['resulto_img'] = $resulto_img;
                                                }
                                            }
                                        }
                                        else
                                        {
                                            $datos['examen'][$temp_value_examen_tipo[0]]['estado'] = 0;
                                            $datos['examen'][$temp_value_examen_tipo[0]]['msj'] = 'Registro NO exitoso';
                                            $mensaje .= 'Examen '.$template->nombre.' No guardada \n';
                                        }
                                    }
                                    else
                                    {
                                        $mensaje .= 'Problema al general Estructura de examen '.$temp_value_examen_tipo[0].'\n';
                                    }
                                }
                            }
                            // else
                            // {
                            //     $mensaje .= 'No tiene diag_endos_'.$temp_value_examen_tipo[0].'\n';
                            // }
                        }
                    }
                    else
                    {
                        $mensaje .= 'Ficha Cirugia Digestiva presento problema al guardar\n';
                    }
                }
                else
                {
                    $mensaje .= 'Ficha Cirugia General presento problema al guardar\n';
                }

                // finalizar hora medica
                $hora_medica->id_estado = 6;
                $mensaje_estado_hora_medica = '';
                if (!$hora_medica->save()) {
                    $mensaje_estado_hora_medica .= 'Hora Medica con Problemas para finalizar.\n';
                }
                else
                {
                    $mensaje_estado_hora_medica .= 'Hora medica Finalizada con Exito.\n';
                }
                $mensaje .= $mensaje_estado_hora_medica;

                if($request->cerrarsession == 0 || $request->cerrarsession =='')
                {
                    /** redireccion Redirect funciona correcto */
                    return \Redirect::route('profesional.mi_agenda','lugares_atencion='.$request->id_lugar_atencion)->with($tipo_mensaje, $mensaje);
                }
                else if($request->cerrarsession == 1)
                {
                    //si funciona
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                    return \Redirect::route('home.ingreso');

                }
            }
        }
        else
        {
            return back()->with('error', $mensaje)->withInput();
        }
    }

    // public function store_cdg(Request $request)
    // {
    //     $campos_requeridos = 0;
    //     $mensaje = '';
    //     if(empty( trim($request->hip_diag_spec)))
    //     {
    //         $campos_requeridos = 1;
    //         $mensaje = 'El Diagnóstico es Requerido.\n Su Ficha Clínica NO ha sido Guardada aún. \n Si es solo Control, indicar Control de Patología.';
    //     }
    //     else
    //     {
    //         if(!empty($request->diag_endos_eda))
    //         {
    //             if($request->diag_endos_eda != 'Test de ureasa No tomado')
    //             {
    //                 if(empty($request->id_profesional_solicitado_por_eda))
    //                 {
    //                     if(empty($request->solicitado_por_rut_eda))
    //                     {
    //                         $campos_requeridos = 1;
    //                         $mensaje = 'Endoscopía Digestiva Alta - Campo requerido RUT del Solicitante.\n';
    //                     }
    //                     if(empty($request->solicitado_por_nombre_eda))
    //                     {
    //                         $campos_requeridos = 1;
    //                         $mensaje = 'Endoscopía Digestiva Alta - Campo requerido NOMBRE del Solicitante.\n';
    //                     }
    //                     if(empty($request->solicitado_por_apellido_eda))
    //                     {
    //                         $campos_requeridos = 1;
    //                         $mensaje = 'Endoscopía Digestiva Alta - Campo requerido APELLIDO del Solicitante.\n';
    //                     }
    //                     if(empty($request->solicitado_por_telefono_eda) || empty($request->solicitado_por_email_eda))
    //                     {
    //                         $campos_requeridos = 1;
    //                         $mensaje = 'Endoscopía Digestiva Alta - Campo requerido TELÉFONO o EMAIL del Solicitante.\n';
    //                     }
    //                 }
    //             }

    //         }
    //         else if(!empty($request->diag_endos_edb))
    //         {
    //             if(empty($request->id_profesional_solicitado_por_edb))
    //             {
    //                 if(empty($request->solicitado_por_rut_edb))
    //                 {
    //                     $campos_requeridos = 1;
    //                     $mensaje = 'Endoscopía Digestiva Baja - Campo requerido RUT del Solicitante.\n';
    //                 }
    //                 if(empty($request->solicitado_por_nombre_edb))
    //                 {
    //                     $campos_requeridos = 1;
    //                     $mensaje = 'Endoscopía Digestiva Baja - Campo requerido NOMBRE del Solicitante.\n';
    //                 }
    //                 if(empty($request->solicitado_por_apellido_edb))
    //                 {
    //                     $campos_requeridos = 1;
    //                     $mensaje = 'Endoscopía Digestiva Baja - Campo requerido APELLIDO del Solicitante.\n';
    //                 }
    //                 if(empty($request->solicitado_por_telefono_edb) || empty($request->solicitado_por_email_edb))
    //                 {
    //                     $campos_requeridos = 1;
    //                     $mensaje = 'Endoscopía Digestiva Baja - Campo requerido TELÉFONO o EMAIL del Solicitante.\n';
    //                 }
    //             }
    //         }

    //     }

    //     if($campos_requeridos == 0)
    //     {
    //         $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();

    //         $ficha = FichaAtencion::where('id', $hora_medica->id_ficha_atencion)->first();
    //         $id_profesional = $request->id_profesional_fc;
    //         $id_paciente = $request->id_paciente_fc;

    //         $ges = 0;
    //         if ($request->modal_ges == 'on') {
    //             $ges = 1;
    //         } else {
    //             $ges = 0;
    //         }

    //         $cronico = 0;
    //         if ($request->enf_cronico == 'on') {
    //             $cronico = 1;
    //         } else {
    //             $cronico = 0;
    //         }

    //         $confidencial = 0;
    //         if ($request->confidencial == 'on') {
    //             $confidencial = 1;
    //         } else {
    //             $confidencial = 0;
    //         }

    //         $ficha->motivo = $request->descripcion_consulta_cdg;
    //         $ficha->antecedentes = $request->antec_especialidad_cdg;
    //         // $ficha->examen_fisico = $request->descripcion_examen_fisico;

    //         //Signos vitales
    //         if ($request->temperatura != '') {
    //             $ficha->temperatura = $request->temperatura;
    //         } else {
    //             $ficha->temperatura = null;
    //         }

    //         if ($request->pulso != '') {
    //             $ficha->pulso = $request->pulso;
    //         } else {
    //             $ficha->pulso = null;
    //         }

    //         if ($request->frecuencia_reposo != '') {
    //             $ficha->frecuencia_reposo = $request->frecuencia_reposo;
    //         } else {
    //             $ficha->frecuencia_reposo = null;
    //         }

    //         if ($request->peso != '') {
    //             $ficha->peso = $request->peso;
    //         } else {
    //             $ficha->peso = null;
    //         }

    //         if ($request->talla != '') {
    //             $ficha->talla = $request->talla;
    //         } else {
    //             $ficha->talla = null;
    //         }

    //         if ($request->imc != '') {
    //             $ficha->imc = $request->imc;
    //         } else {
    //             $ficha->imc = null;
    //         }

    //         if ($request->estado_nutricional != '') {
    //             $ficha->estado_nutricional = $request->estado_nutricional;
    //         } else {
    //             $ficha->estado_nutricional = null;
    //         }

    //         //presion Arterial
    //         if ($request->presion_bi != '') {
    //             $ficha->presion_bi = $request->presion_bi;
    //         } else {
    //             $ficha->presion_bi = null;
    //         }

    //         if ($request->presion_bd != '') {
    //             $ficha->presion_bd = $request->presion_bd;
    //         } else {
    //             $ficha->presion_bd = null;
    //         }

    //         if ($request->presion_de_pie != '') {
    //             $ficha->presion_de_pie = $request->presion_de_pie;
    //         } else {
    //             $ficha->presion_de_pie = null;
    //         }

    //         if ($request->presion_sentado != '') {
    //             $ficha->presion_sentado = $request->presion_sentado;
    //         } else {
    //             $ficha->presion_sentado = null;
    //         }

    //         //comunicacion y Traslado
    //         if ($request->ct_estado_conciencia != '') {
    //             $ficha->ct_estado_conciencia = $request->ct_estado_conciencia;
    //         } else {
    //             $ficha->ct_estado_conciencia = null;
    //         }

    //         if ($request->ct_lenguaje != '') {
    //             $ficha->ct_lenguaje = $request->ct_lenguaje;
    //         } else {
    //             $ficha->ct_lenguaje = null;
    //         }

    //         if ($request->ct_traslado != '') {
    //             $ficha->ct_traslado = $request->ct_traslado;
    //         } else {
    //             $ficha->ct_traslado = null;
    //         }

    //         $ficha->hipotesis_diagnostico = $request->hip_diag_spec;
    //         $ficha->diagnostico_ce10 = $request->descripcion_cie_esp;

    //         // $ficha->cronico = $cronico;
    //         // $ficha->ges = $ges;
    //         // $ficha->confidencial = $confidencial;
    //         $ficha->id_paciente = $id_paciente;
    //         $ficha->id_profesional = $id_profesional;
    //         $ficha->finalizada = 1;

    //         if (!$ficha->save())
    //         {
    //             return back()->with('error', 'Ficha Clínica con problema al guardar')->withInput();
    //         }
    //         else
    //         {
    //             $tipo_mensaje = 'success';
    //             $mensaje = 'Ficha Clínica guardada de forma correcta\n';

    //             /** registro de ficha Cirugia General  */
    //             $ficha_cg = new FichaCirugiaGeneral();
    //             $ficha_cg->id_ficha_atencion = $ficha->id;
    //             $ficha_cg->id_profesional = $id_profesional;
    //             $ficha_cg->id_paciente = $id_paciente;
    //             $ficha_cg->ind_esp_cirugia = $request->ind_esp_cirugia;
    //             $ficha_cg->obs_e_general = $request->obs_e_general;
    //             $ficha_cg->e_signos_vit = $request->e_signos_vit;
    //             $ficha_cg->obs_e_signos_vit = $request->obs_e_signos_vit;
    //             $ficha_cg->e_dolor_loc = $request->e_dolor_loc;
    //             $ficha_cg->obs_e_dolor_loc = $request->obs_e_dolor_loc;
    //             $ficha_cg->masas_pal = $request->masas_pal;
    //             $ficha_cg->obs_masas_pal = $request->obs_masas_pal;
    //             $ficha_cg->e_piel_fan = $request->e_piel_fan;
    //             $ficha_cg->obs_e_piel_fan = $request->obs_e_piel_fan;
    //             $ficha_cg->ex_cabcuello = $request->ex_cabcuello;
    //             $ficha_cg->obs_ex_cabcuello = $request->obs_ex_cabcuello;
    //             $ficha_cg->ex_torax = $request->ex_torax;
    //             $ficha_cg->obs_ex_torax = $request->obs_ex_torax;
    //             $ficha_cg->ex_abdomen = $request->ex_abdomen;
    //             $ficha_cg->obs_ex_abdomen = $request->obs_ex_abdomen;
    //             $ficha_cg->ex_muscesq = $request->ex_muscesq;
    //             $ficha_cg->obs_ex_muscesq = $request->obs_ex_muscesq;
    //             $ficha_cg->ex_o_sent = $request->ex_o_sent;
    //             $ficha_cg->obs_ex_o_sent = $request->obs_ex_o_sent;
    //             $ficha_cg->obs_ex_segmentario = $request->obs_ex_segmentario;
    //             $ficha_cg->urgencia_cg = $request->urgencia_cg;
    //             $ficha_cg->obs_urgencia_cg = $request->obs_urgencia_cg;
    //             $ficha_cg->hosp_cg = $request->hosp_cg;
    //             $ficha_cg->obs_hosp_cg = $request->obs_hosp_cg;
    //             $ficha_cg->otrotto_cg = $request->otrotto_cg;
    //             $ficha_cg->obs_otrotto_cg = $request->obs_otrotto_cg;
    //             $ficha_cg->obs_plan_tratamiento = $request->obs_plan_tratamiento;
    //             $ficha_cg->hospen_cg = $request->hospen_cg;
    //             $ficha_cg->obs_hospen_cg = $request->obs_hospen_cg;
    //             $ficha_cg->hosp_enserv_cg = $request->hosp_enserv_cg;
    //             $ficha_cg->obs_hosp_enserv_cg = $request->obs_hosp_enserv_cg;
    //             $ficha_cg->otro_tto_cg = $request->otro_tto_cg;
    //             $ficha_cg->obs_otro_tto_cg = $request->obs_otro_tto_cg;
    //             $ficha_cg->obs_hospitalizacion_cg = $request->obs_hospitalizacion_cg;
    //             // $ficha_cg->otro = '';
    //             $ficha_cg->estado = 1;

    //             if($ficha_cg->save())
    //             {

    //                 $mensaje = 'Ficha Cirugia General guardada de forma correcta\n';

    //                 /** registro de ficha Cirugia Digestiva */
    //                 $ficha_cd = new FichaCirugiaDigestiva();
    //                 $ficha_cd->id_ficha_atencion = $ficha->id;
    //                 $ficha_cd->id_ficha_cirugia = $ficha_cg->id;
    //                 $ficha_cd->id_profesional = $id_profesional;
    //                 $ficha_cd->id_paciente = $id_paciente;
    //                 $ficha_cd->ind_esp_cirugia = $request->ind_esp_cirugia;
    //                 $ficha_cd->dolor_cdg = $request->dolor_cdg;
    //                 $ficha_cd->obs_dolor_cdg = $request->obs_dolor_cdg;

    //                 $ficha_cd->transito_intest = $request->transito_intest;
    //                 $ficha_cd->obs_transito_intest = $request->obs_transito_intest;
    //                 $ficha_cd->dolor_def = $request->dolor_def;
    //                 $ficha_cd->obs_dolor_def = $request->obs_dolor_def;
    //                 $ficha_cd->sangre_otros = $request->sangre_otros;
    //                 $ficha_cd->obs_sangre_otros = $request->obs_sangre_otros;

    //                 $ficha_cd->otros_sintomas_cdg = $request->otros_sintomas_cdg;
    //                 $ficha_cd->obs_otros_sintomas_cdg = $request->obs_otros_sintomas_cdg;
    //                 $ficha_cd->ceg_cdg = $request->ceg_cdg;
    //                 $ficha_cd->obs_ceg_cdg = $request->obs_ceg_cdg;
    //                 $ficha_cd->masa_cdg = $request->masa_cdg;
    //                 $ficha_cd->obs_masa_cdg = $request->obs_masa_cdg;
    //                 $ficha_cd->urgencia_cdg = $request->urgencia_cdg;
    //                 $ficha_cd->obs_urgencia_cdg = $request->obs_urgencia_cdg;
    //                 $ficha_cd->so_cdg = $request->so_cdg;
    //                 $ficha_cd->obs_so_cdg = $request->obs_so_cdg;
    //                 $ficha_cd->obs_egp_cdg = $request->obs_egp_cdg;
    //                 $ficha_cd->obs_gen_ex_esp_cdg = $request->obs_gen_ex_esp_cdg;
    //                 // $ficha_cd->otro = '';
    //                 $ficha_cd->estado = 1;

    //                 if($ficha_cd->save())
    //                 {
    //                     $mensaje .= 'Ficha Cirugia Digestiva guardada de forma correcta\n';

    //                     /** REGISTRO DE EXAMEN */
    //                     $lista_examen_especialidad = explode('|',$request->tipo_examen_especial);
    //                     foreach ($lista_examen_especialidad as $key_examen_tipo => $value_examen_tipo)
    //                     {
    //                         $parametro = $request->all();

    //                         $temp_value_examen_tipo = explode(',',$value_examen_tipo);
    //                         // $temp_value_examen_tipo[0] = alias template
    //                         // $temp_value_examen_tipo[1] = id_tipo
    //                         // $temp_value_examen_tipo[2] = id_template

    //                         if( !empty( $request['diag_endos_'.$temp_value_examen_tipo[0]] ) )
    //                         {

    //                             if($request['diag_endos_'.$temp_value_examen_tipo[0]] != 'Test de ureasa No tomado')
    //                             {
    //                                 /** limpiar parametos */
    //                                 foreach( $parametro as $key => $value )
    //                                 {
    //                                     if(!strpos($key, '_'.$temp_value_examen_tipo[0]) && !strpos($key, 'id_fc') && !strpos($key, '_fc') )
    //                                     unset($parametro[$key]);
    //                                 }

    //                                 $parametro['id_ficha_cirugia_digestiva'] = $ficha_cd->id;
    //                                 $examen_json = ExamenEspecialidadController::estructuraJson($temp_value_examen_tipo[2],$parametro);
    //                                 if($examen_json['estado'] == 1)
    //                                 {
    //                                     $profesional = Profesional::find($id_profesional);
    //                                     $template = ExamenEspecialidadTemplate::find($temp_value_examen_tipo[2]);

    //                                     $examen = new ExamenEspecialidad();
    //                                     $examen->id_tipo = '1';
    //                                     $examen->id_template = $temp_value_examen_tipo[2];
    //                                     $examen->id_examen_tipo = $temp_value_examen_tipo[1];
    //                                     $examen->id_sub_tipo_especialidad = $profesional->id_sub_tipo_especialidad;
    //                                     $examen->id_ficha_atencion = $ficha->id;
    //                                     $examen->id_ficha_especialidad = $ficha_cd->id;
    //                                     $examen->id_paciente = $id_paciente;
    //                                     $examen->id_profesional = $id_profesional;
    //                                     $examen->nombre = $template->nombre;
    //                                     $examen->cuerpo = $examen_json['json'];
    //                                     $examen->estado = '1';
    //                                     if($examen->save())
    //                                     {
    //                                         $datos['examen'][$temp_value_examen_tipo[0]]['estado'] = 1;
    //                                         $datos['examen'][$temp_value_examen_tipo[0]]['msj'] = 'registro exitoso';
    //                                         $mensaje .= 'Examen '.$template->nombre.' registrado de forma exitosa\n';

    //                                         /** carga imagen */
    //                                         if(!empty($request->input_lista_imagenes))
    //                                         {

    //                                             $array_imagenes = (array)json_decode($request->input_lista_imagenes);

    //                                             // var_dump($array_imagenes);
    //                                             // var_dump($temp_value_examen_tipo[0]);
    //                                             // var_dump($array_imagenes[$temp_value_examen_tipo[0]]);

    //                                             if(!empty($array_imagenes[$temp_value_examen_tipo[0]]))
    //                                             {
    //                                                 $resulto_img = array();
    //                                                 foreach ($array_imagenes[$temp_value_examen_tipo[0]] as $key => $value)
    //                                                 {
    //                                                     $paciente = Paciente::find($id_paciente);
    //                                                     // echo json_encode($value);
    //                                                     $ruta_temp = $value[0];
    //                                                     $nombre_real = $value[1];
    //                                                     $nombre_temp = $value[2];
    //                                                     $file_extension = $value[3];
    //                                                     if(isset($value[4])) $descripcion = $value[4];
    //                                                     else $descripcion = '';
    //                                                     $nombre_final = $paciente->rut.'_'.$examen->id.'_'.date('YmdHis').'_'.uniqid().'.'.$file_extension;

    //                                                     $resulto_img[$key] = CargaImagenController::moverImagen($nombre_temp, 'img_examen', $nombre_final);
    //                                                     $registro_img = new ExamenEspecialidadImg();
    //                                                     $registro_img->id_examen = $examen->id;
    //                                                     $registro_img->url = $resulto_img[$key]['proceso']['url'];
    //                                                     $registro_img->nombre = $nombre_final;
    //                                                     $registro_img->otro = $descripcion;
    //                                                     $registro_img->estado = 1;

    //                                                     if($registro_img->save())
    //                                                     {
    //                                                         $resulto_img[$key]['estado'] = 1;
    //                                                         $resulto_img[$key]['msj'] = 'imagen registrada';
    //                                                     }
    //                                                     else
    //                                                     {
    //                                                         $resulto_img[$key]['estado'] = 0;
    //                                                         $resulto_img[$key]['msj'] = 'falla en registro de imagen';
    //                                                     }

    //                                                 }
    //                                                 $datos['examen'][$temp_value_examen_tipo[0]]['resulto_img'] = $resulto_img;
    //                                             }
    //                                         }
    //                                     }
    //                                     else
    //                                     {
    //                                         $datos['examen'][$temp_value_examen_tipo[0]]['estado'] = 0;
    //                                         $datos['examen'][$temp_value_examen_tipo[0]]['msj'] = 'Registro NO exitoso';
    //                                         $mensaje .= 'Examen '.$template->nombre.' No guardada \n';
    //                                     }
    //                                 }
    //                                 else
    //                                 {
    //                                     $mensaje .= 'Problema al general Estructura de examen '.$temp_value_examen_tipo[0].'\n';
    //                                 }
    //                             }
    //                         }
    //                         // else
    //                         // {
    //                         //     $mensaje .= 'No tiene diag_endos_'.$temp_value_examen_tipo[0].'\n';
    //                         // }
    //                     }
    //                 }
    //                 else
    //                 {
    //                     $mensaje .= 'Ficha Cirugia Digestiva presento problema al guardar\n';
    //                 }
    //             }
    //             else
    //             {
    //                 $mensaje .= 'Ficha Cirugia General presento problema al guardar\n';
    //             }

    //             // finalizar hora medica
    //             $hora_medica->id_estado = 6;
    //             $mensaje_estado_hora_medica = '';
    //             if (!$hora_medica->save()) {
    //                 $mensaje_estado_hora_medica .= 'Hora Medica con Problemas para finalizar.\n';
    //             }
    //             else
    //             {
    //                 $mensaje_estado_hora_medica .= 'Hora medica Finalizada con Exito.\n';
    //             }
    //             $mensaje .= $mensaje_estado_hora_medica;

    //             if($request->cerrarsession == 0 || $request->cerrarsession =='')
    //             {
    //                 /** redireccion Redirect funciona correcto */
    //                 return \Redirect::route('profesional.mi_agenda','lugares_atencion='.$request->id_lugar_atencion)->with($tipo_mensaje, $mensaje);
    //             }
    //             else if($request->cerrarsession == 1)
    //             {
    //                 //si funciona
    //                 $request->session()->invalidate();
    //                 $request->session()->regenerateToken();
    //                 return \Redirect::route('home.ingreso');

    //             }
    //         }
    //     }
    //     else
    //     {
    //         return back()->with('error', $mensaje)->withInput();
    //     }
    // }

    public function store_uro(Request $request)
    {
        $campos_requeridos = 0;
        $mensaje = '';
        if(empty( trim($request->descripcion_hipotesis)))
        {
            $campos_requeridos = 1;
            $mensaje = 'El Diagnóstico es Requerido.\n Su Ficha Clínica NO ha sido Guardada aún. \n Si es solo Control, indicar Control de Patología.';
        }
        else
        {
            if(!empty($request->diag_endos_eda))
            {
                if($request->diag_endos_eda != 'Test de ureasa No tomado')
                {
                    if(empty($request->id_profesional_solicitado_por_cisto))
                    {
                        if(empty($request->solicitado_por_rut_cisto))
                        {
                            $campos_requeridos = 1;
                            $mensaje = 'Cistocopía - Campo requerido RUT del Solicitante.\n';
                        }
                        if(empty($request->solicitado_por_nombre_cisto))
                        {
                            $campos_requeridos = 1;
                            $mensaje = 'Cistocopía - Campo requerido NOMBRE del Solicitante.\n';
                        }
                        if(empty($request->solicitado_por_apellido_cisto))
                        {
                            $campos_requeridos = 1;
                            $mensaje = 'Cistocopía - Campo requerido APELLIDO del Solicitante.\n';
                        }
                        if(empty($request->solicitado_por_telefono_cisto) || empty($request->solicitado_por_email_cisto))
                        {
                            $campos_requeridos = 1;
                            $mensaje = 'Cistocopía - Campo requerido TELÉFONO o EMAIL del Solicitante.\n';
                        }
                    }
                }

            }

            if( !empty($request->vol_vac_uro_flujo) || !empty($request->q_flujo_uro_flujo) || !empty($request->m_curva_uro_flujo)
                    || !empty($request->residuo_uro_flujo) || !empty($request->comentrarios_uro_flujo) )
            {
                if(empty($request->id_profesional_solicitado_por_uro_flujo))
                {

                    if(empty($request->solicitado_por_rut_uro_flujo))
                    {
                        $campos_requeridos = 1;
                        $mensaje = 'Uroflujometría - Campo requerido RUT del Solicitante.\n'; }
                    if(empty($request->solicitado_por_nombre_uro_flujo))
                    {
                        $campos_requeridos = 1;
                        $mensaje = 'Uroflujometría - Campo requerido NOMBRE del Solicitante.\n';
                    }
                    if(empty($request->solicitado_por_apellido_uro_flujo))
                    {
                        $campos_requeridos = 1;
                        $mensaje = 'Uroflujometría - Campo requerido APELLIDO del Solicitante.\n';
                    }
                    if(empty($request->solicitado_por_telefono_uro_flujo) || empty($request->solicitado_por_email_uro_flujo))
                    {
                        $campos_requeridos = 1;
                        $mensaje = 'Uroflujometría - Campo requerido TELÉFONO o EMAIL del Solicitante.\n';
                    }
                }
            }
            else
            {
                $array_imagenes = (array)json_decode($request->input_lista_imagenes);
                $temp = array();
                if(isset($array_imagenes['uro_flujo']))
                    $temp = (array)$array_imagenes['uro_flujo'];

                if( count($temp) > 0)
                {

                    if(empty($request->id_profesional_solicitado_por_uro_flujo))
                    {
                        if(empty($request->solicitado_por_rut_uro_flujo))
                        {
                            $campos_requeridos = 1;
                            $mensaje = 'Uroflujometría - Campo requerido RUT del Solicitante.\n'; }
                        if(empty($request->solicitado_por_nombre_uro_flujo))
                        {
                            $campos_requeridos = 1;
                            $mensaje = 'Uroflujometría - Campo requerido NOMBRE del Solicitante.\n';
                        }
                        if(empty($request->solicitado_por_apellido_uro_flujo))
                        {
                            $campos_requeridos = 1;
                            $mensaje = 'Uroflujometría - Campo requerido APELLIDO del Solicitante.\n';
                        }
                        if(empty($request->solicitado_por_telefono_uro_flujo) || empty($request->solicitado_por_email_uro_flujo))
                        {
                            $campos_requeridos = 1;
                            $mensaje = 'Uroflujometría - Campo requerido TELÉFONO o EMAIL del Solicitante.\n';
                        }
                    }
                }
            }
        }

        if($campos_requeridos == 0)
        {
            $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();

            $ficha = FichaAtencion::where('id', $hora_medica->id_ficha_atencion)->first();
            $id_profesional = $request->id_profesional_fc;
            $id_paciente = $request->id_paciente_fc;

            $ges = 0;
            if ($request->modal_ges == 'on') {
                $ges = 1;
            } else {
                $ges = 0;
            }

            $cronico = 0;
            if ($request->enf_cronico == 'on') {
                $cronico = 1;
            } else {
                $cronico = 0;
            }

            $confidencial = 0;
            if ($request->confidencial == 'on') {
                $confidencial = 1;
            } else {
                $confidencial = 0;
            }

            $ficha->motivo = $request->descripcion_consulta_uro;
            $ficha->antecedentes = $request->antec_especialidad_uro;

            $ficha->hipotesis_diagnostico = $request->descripcion_hipotesis;
            // $ficha->indicaciones = $request->ind_uro; /// ????????????????
            $ficha->diagnostico_ce10 = $request->descripcion_cie;

            $ficha->id_paciente = $id_paciente;
            $ficha->id_profesional = $id_profesional;
            $ficha->finalizada = 1;

            if (!$ficha->save())
            {
                return back()->with('error', 'Ficha Clínica con problema al guardar')->withInput();
            }
            else
            {
                $tipo_mensaje = 'success';
                $mensaje = 'Ficha Clínica guardada de forma correcta\n';

                /** registro de ficha Cirugia General  */
                $ficha_uro = new FichaUro();
                $ficha_uro->id_fichas_atenciones = $ficha->id;
                $ficha_uro->id_profesional = $id_profesional;
                $ficha_uro->id_paciente = $id_paciente;

                $ficha_uro->descripcion_consulta_uro = $request->descripcion_consulta_uro;
                $ficha_uro->antec_especialidad_uro = $request->antec_especialidad_uro;
                $ficha_uro->tipo_antecedente = $request->tipo_antecedente;
                $ficha_uro->antec_nuevo = $request->antec_nuevo;
                $ficha_uro->costo_vert_ld = $request->costo_vert_ld;
                $ficha_uro->obs_costo_vert_ld = $request->obs_costo_vert_ld;
                $ficha_uro->costo_vert_li = $request->costo_vert_li;
                $ficha_uro->obs_costo_vert_lI = $request->obs_costo_vert_lI;
                $ficha_uro->examen_abd = $request->examen_abd;
                $ficha_uro->obs_examen_abd = $request->obs_examen_abd;
                $ficha_uro->tacto_rec = $request->tacto_rec;
                $ficha_uro->obs_tacto_rec = $request->obs_tacto_rec;
                $ficha_uro->antigeno_prost = $request->antigeno_prost;
                $ficha_uro->obs_antigeno_prost = $request->obs_antigeno_prost;
                $ficha_uro->biopsia_uro = $request->biopsia_uro;
                $ficha_uro->obs_biopsia_uro = $request->obs_biopsia_uro;
                $ficha_uro->ingle = $request->ingle;
                $ficha_uro->obs_detalle_ingle = $request->obs_detalle_ingle;
                $ficha_uro->habitos_micionales = $request->habitos_micionales;
                $ficha_uro->obs_habitos_micionales = $request->obs_habitos_micionales;
                $ficha_uro->funcion_pene = $request->funcion_pene;
                $ficha_uro->obs_funcion_pene = $request->obs_funcion_pene;
                $ficha_uro->sintomas_funcionales = $request->sintomas_funcionales;
                $ficha_uro->obs_sintomas_funcionales = $request->obs_sintomas_funcionales;
                $ficha_uro->uretra_masc = $request->uretra_masc;
                $ficha_uro->obs_detalle_uretra_masc = $request->obs_detalle_uretra_masc;
                $ficha_uro->examen_pene = $request->examen_pene;
                $ficha_uro->obs_pene_anormal = $request->obs_pene_anormal;
                $ficha_uro->examen_test = $request->examen_test;
                $ficha_uro->obs_test_anormal = $request->obs_test_anormal;
                $ficha_uro->vulva = $request->vulva;
                $ficha_uro->obs_det_vulva = $request->obs_det_vulva;
                $ficha_uro->vagina = $request->vagina;
                $ficha_uro->obs_detalle_uretra_fem = $request->obs_detalle_uretra_fem;
                $ficha_uro->examen_horm = $request->examen_horm;
                $ficha_uro->obs_examen_horm = $request->obs_examen_horm;
                $ficha_uro->obs_ex_uro = $request->obs_ex_uro;

                $ficha_uro->estado = 1;

                if($ficha_uro->save())
                {

                    $mensaje = 'Ficha Urologia guardada de forma correcta\n';

                    /** REGISTRO DE EXAMEN */
                    $lista_examen_especialidad = explode('|',$request->tipo_examen_especial);
                    foreach ($lista_examen_especialidad as $key_examen_tipo => $value_examen_tipo)
                    {
                        $validacion = 0;
                        $parametro = $request->all();

                        $temp_value_examen_tipo = explode(',',$value_examen_tipo);
                        // $temp_value_examen_tipo[0] = alias template
                        // $temp_value_examen_tipo[1] = id_tipo
                        // $temp_value_examen_tipo[2] = id_template

                        if($temp_value_examen_tipo[0] == 'cisto')
                        {
                            if(!empty( $request['hip_diag_'.$temp_value_examen_tipo[0]] ))
                                $validacion = 1;
                        }
                        else if($temp_value_examen_tipo[0] == 'uro_flujo')
                        {
                            if(!empty($request->vol_vac_uro_flujo) || !empty($request->q_flujo_uro_flujo) || !empty($request->m_curva_uro_flujo) || !empty($request->residuo_uro_flujo) )
                                $validacion = 1;
                            else if(isset($array_imagenes[$temp_value_examen_tipo[0]]))
                                if(count($array_imagenes[$temp_value_examen_tipo[0]]) > 0)
                                    $validacion = 1;
                        }


                        if( $validacion == 1 )
                        {

                            /** limpiar parametos */
                            foreach( $parametro as $key => $value )
                            {
                                if(!strpos($key, '_'.$temp_value_examen_tipo[0]) && !strpos($key, 'id_fc') && !strpos($key, '_fc') )
                                    unset($parametro[$key]);
                            }

                            $parametro['id_ficha_uro'] = $ficha_uro->id;

                            if(isset($array_imagenes[$temp_value_examen_tipo[0]]))
                                if(count($array_imagenes[$temp_value_examen_tipo[0]]) > 0)
                                    $parametro['imagenes'] = 'IMAGEN REGISTRADA';

                            $examen_json = ExamenEspecialidadController::estructuraJson($temp_value_examen_tipo[2],$parametro);
                            if($examen_json['estado'] == 1)
                            {
                                $profesional = Profesional::find($id_profesional);
                                $template = ExamenEspecialidadTemplate::find($temp_value_examen_tipo[2]);

                                $examen = new ExamenEspecialidad();
                                $examen->id_tipo = '1';
                                $examen->id_template = $temp_value_examen_tipo[2];
                                $examen->id_examen_tipo = $temp_value_examen_tipo[1];
                                $examen->id_sub_tipo_especialidad = $profesional->id_sub_tipo_especialidad;
                                $examen->id_ficha_atencion = $ficha->id;
                                $examen->id_ficha_especialidad = $ficha_uro->id;
                                $examen->id_paciente = $id_paciente;
                                $examen->id_profesional = $id_profesional;
                                $examen->nombre = $template->nombre;
                                $examen->cuerpo = $examen_json['json'];
                                $examen->estado = '1';
                                if($examen->save())
                                {
                                    $datos['examen'][$temp_value_examen_tipo[0]]['estado'] = 1;
                                    $datos['examen'][$temp_value_examen_tipo[0]]['msj'] = 'registro exitoso';
                                    $mensaje .= 'Examen '.$template->nombre.' registrado de forma exitosa\n';

                                    /** carga imagen */
                                    if(!empty($request->input_lista_imagenes))
                                    {

                                        $array_imagenes = (array)json_decode($request->input_lista_imagenes);

                                        // var_dump($array_imagenes);
                                        // var_dump($temp_value_examen_tipo[0]);
                                        // var_dump($array_imagenes[$temp_value_examen_tipo[0]]);

                                        if(!empty($array_imagenes[$temp_value_examen_tipo[0]]))
                                        {
                                            $resulto_img = array();
                                            foreach ($array_imagenes[$temp_value_examen_tipo[0]] as $key => $value)
                                            {
                                                $paciente = Paciente::find($id_paciente);
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
                                            $datos['examen'][$temp_value_examen_tipo[0]]['resulto_img'] = $resulto_img;
                                        }
                                    }
                                }
                                else
                                {
                                    $datos['examen'][$temp_value_examen_tipo[0]]['estado'] = 0;
                                    $datos['examen'][$temp_value_examen_tipo[0]]['msj'] = 'Registro NO exitoso';
                                    $mensaje .= 'Examen '.$template->nombre.' No guardada \n';
                                }
                            }
                            else
                            {
                                $mensaje .= 'Problema al general Estructura de examen '.$temp_value_examen_tipo[0].'\n';
                            }
                        }
                        else
                        {
                            // $mensaje .= 'caso de '.$temp_value_examen_tipo[0].' validacion='.$validacion.'\n';
                        }
                    }

                }
                else
                {
                    $mensaje .= 'Ficha Cirugia General presento problema al guardar\n';
                }

                // finalizar hora medica
                $hora_medica->id_estado = 6;
                $mensaje_estado_hora_medica = '';
                if (!$hora_medica->save()) {
                    $mensaje_estado_hora_medica .= 'Hora Medica con Problemas para finalizar.\n';
                }
                else
                {
                    $mensaje_estado_hora_medica .= 'Hora medica Finalizada con Exito.\n';
                }
                $mensaje .= $mensaje_estado_hora_medica;

                if($request->cerrarsession == 0 || $request->cerrarsession =='')
                {
                    /** redireccion Redirect funciona correcto */
                    return \Redirect::route('profesional.mi_agenda','lugares_atencion='.$request->id_lugar_atencion)->with($tipo_mensaje, $mensaje);
                }
                else if($request->cerrarsession == 1)
                {
                    //si funciona
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                    return \Redirect::route('home.ingreso');

                }
            }
        }
        else
        {
            return back()->with('error', $mensaje)->withInput();
        }
    }

    public function store_oft(Request $request)
    {

        $campos_requeridos = 1;
        $mensaje = '';
        if(empty( trim($request->descripcion_hipotesis)))
        {
            $campos_requeridos = 0;
            $mensaje = 'El Diagnóstico es Requerido.\n Su Ficha Clínica NO ha sido Guardada aún. \n Si es solo Control, indicar Control de Patología.';
        }

        if($campos_requeridos)
        {
            /** FICHA ATENCION  */
            $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();

            $ficha = FichaAtencion::where('id', $hora_medica->id_ficha_atencion)->first();
            $id_profesional = $request->id_profesional_fc;
            $id_paciente = $request->id_paciente_fc;

            $ficha->motivo = $request->descripcion_consulta_oftalmo;
            $ficha->antecedentes = $request->antec_especialidad_oftalmo;
            $ges = 0;
            if ($request->modal_ges == 'on') {
                $ges = 1;
            } else {
                $ges = 0;
            }

            $cronico = 0;
            if ($request->enf_cronico == 'on') {
                $cronico = 1;
            } else {
                $cronico = 0;
            }

            $confidencial = 0;
            if ($request->confidencial == 'on') {
                $confidencial = 1;
            } else {
                $confidencial = 0;
            }


            // //Signos vitales
            // if ($request->temperatura != '') {
            //     $ficha->temperatura = $request->temperatura;
            // } else {
            //     $ficha->temperatura = null;
            // }

            // if ($request->pulso != '') {
            //     $ficha->pulso = $request->pulso;
            // } else {
            //     $ficha->pulso = null;
            // }

            // if ($request->frecuencia_reposo != '') {
            //     $ficha->frecuencia_reposo = $request->frecuencia_reposo;
            // } else {
            //     $ficha->frecuencia_reposo = null;
            // }

            // if ($request->peso != '') {
            //     $ficha->peso = $request->peso;
            // } else {
            //     $ficha->peso = null;
            // }

            // if ($request->talla != '') {
            //     $ficha->talla = $request->talla;
            // } else {
            //     $ficha->talla = null;
            // }

            // if ($request->imc != '') {
            //     $ficha->imc = $request->imc;
            // } else {
            //     $ficha->imc = null;
            // }

            // if ($request->estado_nutricional != '') {
            //     $ficha->estado_nutricional = $request->estado_nutricional;
            // } else {
            //     $ficha->estado_nutricional = null;
            // }

            // //presion Arterial
            // if ($request->presion_bi != '') {
            //     $ficha->presion_bi = $request->presion_bi;
            // } else {
            //     $ficha->presion_bi = null;
            // }

            // if ($request->presion_bd != '') {
            //     $ficha->presion_bd = $request->presion_bd;
            // } else {
            //     $ficha->presion_bd = null;
            // }

            // if ($request->presion_de_pie != '') {
            //     $ficha->presion_de_pie = $request->presion_de_pie;
            // } else {
            //     $ficha->presion_de_pie = null;
            // }

            // if ($request->presion_sentado != '') {
            //     $ficha->presion_sentado = $request->presion_sentado;
            // } else {
            //     $ficha->presion_sentado = null;
            // }

            // //comunicacion y Traslado
            // if ($request->ct_estado_conciencia != '') {
            //     $ficha->ct_estado_conciencia = $request->ct_estado_conciencia;
            // } else {
            //     $ficha->ct_estado_conciencia = null;
            // }

            // if ($request->ct_lenguaje != '') {
            //     $ficha->ct_lenguaje = $request->ct_lenguaje;
            // } else {
            //     $ficha->ct_lenguaje = null;
            // }

            // if ($request->ct_traslado != '') {
            //     $ficha->ct_traslado = $request->ct_traslado;
            // } else {
            //     $ficha->ct_traslado = null;
            // }

            $ficha->hipotesis_diagnostico = $request->descripcion_hipotesis;
            $ficha->diagnostico_ce10 = $request->descripcion_cie;

            $ficha->cronico = $cronico;
            $ficha->ges = $ges;
            $ficha->confidencial = $confidencial;
            $ficha->id_paciente = $id_paciente;
            $ficha->id_profesional = $id_profesional;
            $ficha->finalizada = 1;

            if (!$ficha->save())
            {
                return back()->with('error', 'Ficha Clínica con problema al guardar')->withInput();
            }
            else
            {
                $tipo_mensaje = 'success';
                $mensaje .= 'Ficha Clínica guardada de forma correcta\n';
                /** REGISTRO FICHA OFT */
                $ficha_oft = new FichaOft();

                $ficha_oft->id_ficha_atencion = $ficha->id;
                $ficha_oft->id_paciente = $id_paciente;
                $ficha_oft->id_profesional = $id_profesional;
                $ficha_oft->descripcion_consulta_oftalmo = $request->descripcion_consulta_oftalmo;
                $ficha_oft->antec_especialidad_oftalmo = $request->antec_especialidad_oftalmo;
                $ficha_oft->agudeza_visual_subj_od = $request->agudeza_visual_subj_od;
                $ficha_oft->obs_agudeza_visual_subj_od = $request->obs_agudeza_visual_subj_od;
                $ficha_oft->agudeza_visual_subj_oi = $request->agudeza_visual_subj_oi;
                $ficha_oft->obs_agudeza_visual_subj_oi = $request->obs_agudeza_visual_subj_oi;
                $ficha_oft->agudeza_visual_obj_od = $request->agudeza_visual_obj_od;
                $ficha_oft->obs_agudeza_visual_obj_od = $request->obs_agudeza_visual_obj_od;
                $ficha_oft->agudeza_visual_obj_oi = $request->agudeza_visual_obj_oi;
                $ficha_oft->obs_agudeza_visual_obj_oi = $request->obs_agudeza_visual_obj_oi;
                $ficha_oft->mov_oculares = $request->mov_oculares;
                $ficha_oft->obs_mov_oculares = $request->obs_mov_oculares;
                $ficha_oft->autorefracto_od = $request->autorefracto_od;
                $ficha_oft->obs_autorefracto_od = $request->obs_autorefracto_od;
                $ficha_oft->autorefracto_oi = $request->autorefracto_oi;
                $ficha_oft->obs_autorefracto_oi = $request->obs_autorefracto_oi;
                $ficha_oft->presion_ocular_od = $request->presion_ocular_od;
                $ficha_oft->obs_presion_ocular_od = $request->obs_presion_ocular_od;
                $ficha_oft->valor_presion_ocular_od = $request->valor_presion_ocular_od;
                $ficha_oft->presion_ocular_oi = $request->presion_ocular_oi;
                $ficha_oft->obs_presion_ocular_oi = $request->obs_presion_ocular_oi;
                $ficha_oft->valor_presion_ocular_oi = $request->valor_presion_ocular_oi;
                $ficha_oft->campo_visual_od = $request->campo_visual_od;
                $ficha_oft->obs_campo_visual_od = $request->obs_campo_visual_od;
                $ficha_oft->campo_visual_oi = $request->campo_visual_oi;
                $ficha_oft->obs_campo_visual_oi = $request->obs_campo_visual_oi;
                $ficha_oft->campo_otros_ex_general = $request->campo_otros_ex_general;
                $ficha_oft->descripcion_hipotesis = $request->descripcion_hipotesis;
                $ficha_oft->ind_oft = $request->ind_oft;
                $ficha_oft->descripcion_cie = $request->descripcion_cie;
                $ficha_oft->tratamiento = $request->tratamiento;
                $ficha_oft->lentes = $request->lentes;
                $ficha_oft->procedimiento = $request->procedimiento;
                $ficha_oft->cirugia = $request->cirugia;
                $ficha_oft->otro = '';
                $ficha_oft->otro2 = '';
                $ficha_oft->estado = 1;

                if($ficha_oft->save())
                {
                    $mensaje .= 'Ficha Clínica Oftalmologia guardada de forma correcta\n';
                    //  finalizar hora medica
                    $hora_medica->id_estado = 6;
                    $mensaje_estado_hora_medica = '';
                    if (!$hora_medica->save()) {
                        $mensaje_estado_hora_medica .= 'Hora Medica con Problemas para finalizar.\n';
                    }
                    else
                    {
                        $mensaje_estado_hora_medica .= 'Hora medica Finalizada con Exito.\n';
                    }
                    $mensaje .= $mensaje_estado_hora_medica;


                    /** REGISTRO FICHA OFTALMOLOGIA Biomicroscopia */
                    if( !empty($request->parpbiood) || !empty($request->obs_parpbiood) || !empty($request->conjuntiva_bio_od) ||
                        !empty($request->obs_conjuntiva_bio_od) || !empty($request->biocornea_od) || !empty($request->obs_biocornea_od) ||
                        !empty($request->camara_ant_od) || !empty($request->obs_camara_ant_od) || !empty($request->tyndall_od) ||
                        !empty($request->obs_tyndall_od) || !empty($request->cristalino_bio_od) || !empty($request->obs_cristalino_bio_od) ||
                        !empty($request->campo_otros_bio_od) || !empty($request->parpbiooi) || !empty($request->obs_parpbiooi) ||
                        !empty($request->conjuntiva_bio_oi) || !empty($request->obs_conjuntiva_bio_oi) || !empty($request->biocornea_oi) ||
                        !empty($request->obs_biocornea_oi) || !empty($request->camara_ant_oi) || !empty($request->obs_camara_ant_oi) ||
                        !empty($request->tyndall_oi) || !empty($request->obs_tyndall_oi) || !empty($request->cristalino_bio_oi) ||
                        !empty($request->obs_cristalino_bio_oi)
                    )
                    {

                        $ficha_bio = new FichaOftBiomicroscopia();

                        $ficha_bio->id_ficha_atencion = $ficha->id;
                        $ficha_bio->id_ficha_oft = $ficha_oft->id;
                        $ficha_bio->id_paciente = $id_paciente;
                        $ficha_bio->id_profesional = $id_profesional;
                        $ficha_bio->parpbiood = $request->parpbiood;
                        $ficha_bio->obs_parpbiood = $request->obs_parpbiood;
                        $ficha_bio->conjuntiva_bio_od = $request->conjuntiva_bio_od;
                        $ficha_bio->obs_conjuntiva_bio_od = $request->obs_conjuntiva_bio_od;
                        $ficha_bio->biocornea_od = $request->biocornea_od;
                        $ficha_bio->obs_biocornea_od = $request->obs_biocornea_od;
                        $ficha_bio->camara_ant_od = $request->camara_ant_od;
                        $ficha_bio->obs_camara_ant_od = $request->obs_camara_ant_od;
                        $ficha_bio->tyndall_od = $request->tyndall_od;
                        $ficha_bio->obs_tyndall_od = $request->obs_tyndall_od;
                        $ficha_bio->cristalino_bio_od = $request->cristalino_bio_od;
                        $ficha_bio->obs_cristalino_bio_od = $request->obs_cristalino_bio_od;
                        $ficha_bio->campo_otros_bio_od = $request->campo_otros_bio_od;
                        $ficha_bio->parpbiooi = $request->parpbiooi;
                        $ficha_bio->obs_parpbiooi = $request->obs_parpbiooi;
                        $ficha_bio->conjuntiva_bio_oi = $request->conjuntiva_bio_oi;
                        $ficha_bio->obs_conjuntiva_bio_oi = $request->obs_conjuntiva_bio_oi;
                        $ficha_bio->biocornea_oi = $request->biocornea_oi;
                        $ficha_bio->obs_biocornea_oi = $request->obs_biocornea_oi;
                        $ficha_bio->camara_ant_oi = $request->camara_ant_oi;
                        $ficha_bio->obs_camara_ant_oi = $request->obs_camara_ant_oi;
                        $ficha_bio->tyndall_oi = $request->tyndall_oi;
                        $ficha_bio->obs_tyndall_oi = $request->obs_tyndall_oi;
                        $ficha_bio->cristalino_bio_oi = $request->cristalino_bio_oi;
                        $ficha_bio->obs_cristalino_bio_oi = $request->obs_cristalino_bio_oi;
                        $ficha_bio->otro = '';
                        $ficha_bio->otro2 = '';
                        $ficha_bio->estado = 1;

                        if($ficha_bio->save())
                        {
                            $mensaje .= 'Ficha Clínica Oftalmolagia Biomicroscopia registrada\n';
                        }
                        else
                        {
                            $mensaje .= 'Ficha Clínica Oftalmolagia Biomicroscopia problema al registrar\n';
                        }
                    }
                    else
                    {
                        $mensaje .= 'Ficha Clínica Oftalmolagia Biomicroscopia no requiere ser registrado\n';
                    }

                    /** REGISTRO FICHA OFTALMOLOGIA Fondo de Ojo */
                    if( !empty($request->papilas_fo_od) || !empty($request->obs_papilas_fo_od) || !empty($request->excavacion_fo_od) ||
                        !empty($request->obs_excavacion_fo_od) || !empty($request->bordes_od) || !empty($request->obs_bordes_od) ||
                        !empty($request->maculas_fo_od) || !empty($request->obs_maculas_fo_od) || !empty($request->vasos_fo_od) ||
                        !empty($request->obs_vasos_fo_od) || !empty($request->periferia_fo_od) || !empty($request->obs_periferia_fo_od) ||
                        !empty($request->campo_fo_otros_od) || !empty($request->papilas_fo_oi) || !empty($request->obs_papilas_fo_oi) ||
                        !empty($request->excavacion_fo_oi) || !empty($request->obs_excavacion_fo_oi) || !empty($request->bordes_oi) ||
                        !empty($request->obs_bordes_oi) || !empty($request->maculas_fo_oi) || !empty($request->obs_maculas_fo_oi) ||
                        !empty($request->vasos_fo_oi) || !empty($request->obs_vasos_fo_oi) || !empty($request->periferia_fo_oi) ||
                        !empty($request->obs_periferia_fo_oi) || !empty($request->campo_fo_otros_oi) )
                    {
                        $ficha_fo = new FichaOftFondoOjo();

                        $ficha_fo->id_ficha_atencion = $ficha->id;
                        $ficha_fo->id_ficha_oft = $ficha_oft->id;
                        $ficha_fo->id_paciente = $id_paciente;
                        $ficha_fo->id_profesional = $id_profesional;
                        $ficha_fo->papilas_fo_od = $request->papilas_fo_od;
                        $ficha_fo->obs_papilas_fo_od = $request->obs_papilas_fo_od;
                        $ficha_fo->excavacion_fo_od = $request->excavacion_fo_od;
                        $ficha_fo->obs_excavacion_fo_od = $request->obs_excavacion_fo_od;
                        $ficha_fo->bordes_od = $request->bordes_od;
                        $ficha_fo->obs_bordes_od = $request->obs_bordes_od;
                        $ficha_fo->maculas_fo_od = $request->maculas_fo_od;
                        $ficha_fo->obs_maculas_fo_od = $request->obs_maculas_fo_od;
                        $ficha_fo->vasos_fo_od = $request->vasos_fo_od;
                        $ficha_fo->obs_vasos_fo_od = $request->obs_vasos_fo_od;
                        $ficha_fo->periferia_fo_od = $request->periferia_fo_od;
                        $ficha_fo->obs_periferia_fo_od = $request->obs_periferia_fo_od;
                        $ficha_fo->campo_fo_otros_od = $request->campo_fo_otros_od;
                        $ficha_fo->papilas_fo_oi = $request->papilas_fo_oi;
                        $ficha_fo->obs_papilas_fo_oi = $request->obs_papilas_fo_oi;
                        $ficha_fo->excavacion_fo_oi = $request->excavacion_fo_oi;
                        $ficha_fo->obs_excavacion_fo_oi = $request->obs_excavacion_fo_oi;
                        $ficha_fo->bordes_oi = $request->bordes_oi;
                        $ficha_fo->obs_bordes_oi = $request->obs_bordes_oi;
                        $ficha_fo->maculas_fo_oi = $request->maculas_fo_oi;
                        $ficha_fo->obs_maculas_fo_oi = $request->obs_maculas_fo_oi;
                        $ficha_fo->vasos_fo_oi = $request->vasos_fo_oi;
                        $ficha_fo->obs_vasos_fo_oi = $request->obs_vasos_fo_oi;
                        $ficha_fo->periferia_fo_oi = $request->periferia_fo_oi;
                        $ficha_fo->obs_periferia_fo_oi = $request->obs_periferia_fo_oi;
                        $ficha_fo->campo_fo_otros_oi = $request->campo_fo_otros_oi;
                        $ficha_fo->otro = '';
                        $ficha_fo->otro2 = '';
                        $ficha_fo->estado = 1;

                        if($ficha_fo->save())
                        {
                            $mensaje .= 'Ficha Clínica Oftalmolagia Fondo de Ojo registrada\n';
                        }
                        else
                        {
                            $mensaje .= 'Ficha Clínica Oftalmolagia Fondo de Ojo problema al registrar\n';
                        }
                    }
                    else
                    {
                        $mensaje .= 'Ficha Clínica Oftalmolagia Fondo de Ojo no requiere ser registrado\n';
                    }

                    if($request->cerrarsession == 0 || $request->cerrarsession =='')
                    {
                        /** redireccion Redirect funciona correcto */
                        return \Redirect::route('profesional.mi_agenda','lugares_atencion='.$request->id_lugar_atencion)->with($tipo_mensaje, $mensaje);
                    }
                    else if($request->cerrarsession == 1)
                    {
                    //si funciona
                        $request->session()->invalidate();
                        $request->session()->regenerateToken();
                        return \Redirect::route('home.ingreso');

                    }
                }
                else
                {
                    $mensaje .= 'Ficha Clínica Oftalmolagia problema al registrar\n';
                }
            }

        }
        else
        {
            return back()->with('error', $mensaje)->withInput();
        }
    }

    public function store_dermo(Request $request)
    {
        $campos_requeridos = 1;
        $mensaje = '';
        if(empty( trim($request->descripcion_hipotesis)))
        {
            $campos_requeridos = 0;
            $mensaje = 'El Diagnóstico es Requerido.\n Su Ficha Clínica NO ha sido Guardada aún. \n Si es solo Control, indicar Control de Patología.';
        }
        if($campos_requeridos)
        {
            /** FICHA ATENCION  */
            $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();

            $ficha = FichaAtencion::where('id', $hora_medica->id_ficha_atencion)->first();
            $id_profesional = $request->id_profesional_fc;
            $id_paciente = $request->id_paciente_fc;

            $ficha->motivo = $request->descripcion_consulta_dermato;
            $ficha->antecedentes = $request->antec_especialidad_dermato;

            $ges = 0;
            if ($request->modal_ges == 'on') {
                $ges = 1;
            } else {
                $ges = 0;
            }

            $cronico = 0;
            if ($request->enf_cronico == 'on') {
                $cronico = 1;
            } else {
                $cronico = 0;
            }

            $confidencial = 0;
            if ($request->confidencial == 'on') {
                $confidencial = 1;
            } else {
                $confidencial = 0;
            }

            //Signos vitales
            if ($request->temperatura != '') {
                $ficha->temperatura = $request->temperatura;
            } else {
                $ficha->temperatura = null;
            }

            if ($request->pulso != '') {
                $ficha->pulso = $request->pulso;
            } else {
                $ficha->pulso = null;
            }

            if ($request->frecuencia_reposo != '') {
                $ficha->frecuencia_reposo = $request->frecuencia_reposo;
            } else {
                $ficha->frecuencia_reposo = null;
            }

            if ($request->peso != '') {
                $ficha->peso = $request->peso;
            } else {
                $ficha->peso = null;
            }

            if ($request->talla != '') {
                $ficha->talla = $request->talla;
            } else {
                $ficha->talla = null;
            }

            if ($request->imc != '') {
                $ficha->imc = $request->imc;
            } else {
                $ficha->imc = null;
            }

            if ($request->estado_nutricional != '') {
                $ficha->estado_nutricional = $request->estado_nutricional;
            } else {
                $ficha->estado_nutricional = null;
            }

            //presion Arterial
            if ($request->presion_bi != '') {
                $ficha->presion_bi = $request->presion_bi;
            } else {
                $ficha->presion_bi = null;
            }

            if ($request->presion_bd != '') {
                $ficha->presion_bd = $request->presion_bd;
            } else {
                $ficha->presion_bd = null;
            }

            if ($request->presion_de_pie != '') {
                $ficha->presion_de_pie = $request->presion_de_pie;
            } else {
                $ficha->presion_de_pie = null;
            }

            if ($request->presion_sentado != '') {
                $ficha->presion_sentado = $request->presion_sentado;
            } else {
                $ficha->presion_sentado = null;
            }

            //comunicacion y Traslado
            if ($request->ct_estado_conciencia != '') {
                $ficha->ct_estado_conciencia = $request->ct_estado_conciencia;
            } else {
                $ficha->ct_estado_conciencia = null;
            }

            if ($request->ct_lenguaje != '') {
                $ficha->ct_lenguaje = $request->ct_lenguaje;
            } else {
                $ficha->ct_lenguaje = null;
            }

            if ($request->ct_traslado != '') {
                $ficha->ct_traslado = $request->ct_traslado;
            } else {
                $ficha->ct_traslado = null;
            }

            $ficha->hipotesis_diagnostico = $request->descripcion_hipotesis;
            $ficha->diagnostico_ce10 = $request->descripcion_cie;

            $ficha->cronico = $cronico;
            $ficha->ges = $ges;
            $ficha->confidencial = $confidencial;
            $ficha->id_paciente = $id_paciente;
            $ficha->id_profesional = $id_profesional;
            $ficha->finalizada = 1;
            if (!$ficha->save())
            {
                return back()->with('error', 'Ficha Clínica con problema al guardar')->withInput();
            }
            else
            {
                $tipo_mensaje = 'success';
                $mensaje .= 'Ficha Clínica guardada de forma correcta\n';

                /** IMAGENES DE DERMATOLOGIA */
                $array_imagenes = (array)json_decode($request->input_lista_imagenes);
                if(array_key_exists('',$array_imagenes))

                $value_img_cons_dermato_pre = 0;
                $value_img_cons_dermato_post = 0;
                $value_imagenes_elim_cicat_pre = 0;
                $value_imagenes_elim_cicat_post = 0;
                $value_proc_piel_danada_img_pre = 0;
                $value_proc_piel_danada_img_post = 0;
                $value_imagenes_exfoliacion_pre = 0;
                $value_imagenes_exfoliacion_post = 0;
                $value_imagenes_dermabras_pre = 0;
                $value_imagenes_dermabras_post = 0;
                $value_imagenes_laser_pre = 0;
                $value_imagenes_laser_post = 0;
                if(array_key_exists('img_cons_dermato_pre',$array_imagenes))
                    $value_img_cons_dermato_pre = 1;
                if(array_key_exists('img_cons_dermato_post',$array_imagenes))
                    $value_img_cons_dermato_post = 1;
                if(array_key_exists('imagenes_elim_cicat_pre',$array_imagenes))
                    $value_imagenes_elim_cicat_pre = 1;
                if(array_key_exists('imagenes_elim_cicat_post',$array_imagenes))
                    $value_imagenes_elim_cicat_post = 1;
                if(array_key_exists('proc_piel_danada_img_pre',$array_imagenes))
                    $value_proc_piel_danada_img_pre = 1;
                if(array_key_exists('proc_piel_danada_img_post',$array_imagenes))
                    $value_proc_piel_danada_img_post = 1;
                if(array_key_exists('imagenes_exfoliacion_pre',$array_imagenes))
                    $value_imagenes_exfoliacion_pre = 1;
                if(array_key_exists('imagenes_exfoliacion_post',$array_imagenes))
                    $value_imagenes_exfoliacion_post = 1;
                if(array_key_exists('imagenes_dermabras_pre',$array_imagenes))
                    $value_imagenes_dermabras_pre = 1;
                if(array_key_exists('imagenes_dermabras_post',$array_imagenes))
                    $value_imagenes_dermabras_post = 1;
                if(array_key_exists('imagenes_laser_pre',$array_imagenes))
                    $value_imagenes_laser_pre = 1;
                if(array_key_exists('imagenes_laser_post',$array_imagenes))
                    $value_imagenes_laser_post = 1;



                /** REGISTRO FICHA DERMATOLOGIA */
                $ficha_dermo = new FichaDermo();

                $ficha_dermo->id_ficha_atencion = $ficha->id;
                $ficha_dermo->id_paciente = $id_paciente;
                $ficha_dermo->id_profesional = $id_profesional;

                $ficha_dermo->descripcion_consulta_dermato = $request->descripcion_consulta_dermato;
                $ficha_dermo->antec_especialidad_dermato = $request->antec_especialidad_dermato;
                $ficha_dermo->img_cons_dermato_pre = $value_img_cons_dermato_pre;
                $ficha_dermo->img_cons_dermato_post = $value_img_cons_dermato_post;
                $ficha_dermo->biopsia_dermat = $request->biopsia_dermat;
                $ficha_dermo->obs_result_biopsia = $request->obs_result_biopsia;
                $ficha_dermo->elim_cicat = $request->elim_cicat;
                $ficha_dermo->desc_elim_cicat = $request->desc_elim_cicat;
                $ficha_dermo->obs_elim_cica = $request->obs_elim_cica;
                $ficha_dermo->imagenes_elim_cicat_pre = $value_imagenes_elim_cicat_pre;
                $ficha_dermo->imagenes_elim_cicat_post = $value_imagenes_elim_cicat_post;

                $ficha_dermo->proc_piel_danada = $request->proc_piel_danada;
                $ficha_dermo->proc_piel_danada_desc = $request->proc_piel_danada_desc;
                $ficha_dermo->proc_piel_danada_obs = $request->proc_piel_danada_obs;
                $ficha_dermo->proc_piel_danada_img_pre = $value_proc_piel_danada_img_pre;
                $ficha_dermo->proc_piel_danada_img_post = $value_proc_piel_danada_img_post;
                $ficha_dermo->exfoliacion_proc = $request->exfoliacion_proc;
                $ficha_dermo->exfoliacion_comp = $request->exfoliacion_comp;
                $ficha_dermo->exfoliacion_desc = $request->exfoliacion_desc;
                $ficha_dermo->exfoliacion_obs = $request->exfoliacion_obs;
                $ficha_dermo->imagenes_exfoliacion_pre = $value_imagenes_exfoliacion_pre;
                $ficha_dermo->imagenes_exfoliacion_post = $value_imagenes_exfoliacion_post;

                $ficha_dermo->dermabras_proc = $request->dermabras_proc;
                $ficha_dermo->dermabras_desc = $request->dermabras_desc;
                $ficha_dermo->dermabras_obs = $request->dermabras_obs;
                $ficha_dermo->imagenes_dermabras_pre = $value_imagenes_dermabras_pre;
                $ficha_dermo->imagenes_dermabras_post = $value_imagenes_dermabras_post;
                $ficha_dermo->laser_motivo = $request->laser_motivo;
                $ficha_dermo->laser_desc = $request->laser_desc;
                $ficha_dermo->laser_obs = $request->laser_obs;
                $ficha_dermo->imagenes_laser_pre = $value_imagenes_laser_pre;
                $ficha_dermo->imagenes_laser_post = $value_imagenes_laser_post;

                $ficha_dermo->nombre_otro_proced = $request->nombre_otro_proced;
                $ficha_dermo->desc_otro_proced = $request->desc_otro_proced;
                $ficha_dermo->obs_otro_proced = $request->obs_otro_proced;

                if($ficha_dermo->save())
                {
                    $mensaje .= 'Ficha Clínica Dermatologia guardada de forma correcta\n';
                    //  finalizar hora medica
                    $hora_medica->id_estado = 6;
                    $mensaje_estado_hora_medica = '';
                    if (!$hora_medica->save()) {
                        $mensaje_estado_hora_medica .= 'Hora Medica con Problemas para finalizar.\n';
                    }
                    else
                    {
                        $mensaje_estado_hora_medica .= 'Hora medica Finalizada con Exito.\n';
                    }
                    $mensaje .= $mensaje_estado_hora_medica;

                    $array_lista_key_img = array( 'img_cons_dermato_pre', 'img_cons_dermato_post', 'imagenes_elim_cicat_pre', 'imagenes_elim_cicat_post', 'proc_piel_danada_img_pre', 'proc_piel_danada_img_post', 'imagenes_exfoliacion_pre', 'imagenes_exfoliacion_post', 'imagenes_dermabras_pre', 'imagenes_dermabras_post', 'imagenes_laser_pre', 'imagenes_laser_post' );

                    $resulto_img = array();
                    foreach ($array_lista_key_img as $key_key => $value_key)
                    {
                        if(array_key_exists($value_key,$array_imagenes))
                        {
                            foreach ($array_imagenes[$value_key] as $key => $value)
                            {
                                $paciente = Paciente::find($id_paciente);
                                // echo json_encode($value);
                                $ruta_temp = $value[0];
                                $nombre_real = $value[1];
                                $nombre_temp = $value[2];
                                $file_extension = $value[3];
                                $nombre_final = $paciente->rut.'_'.$value_key.'_'.date('YmdHis').'_'.uniqid().'.'.$file_extension;

                                $resulto_img[$key] = CargaImagenController::moverImagen($nombre_temp, 'img_examen', $nombre_final);
                                $registro_img = new FichaDermoImg();
                                $registro_img->id_ficha_atencion = $ficha->id;
                                $registro_img->id_ficha_dermo = $ficha_dermo->id;
                                $registro_img->id_paciente = $id_paciente;
                                $registro_img->id_profesional = $id_profesional;
                                $registro_img->tipo = $value_key;
                                $registro_img->url = $resulto_img[$key]['proceso']['url'];
                                $registro_img->nombre = $nombre_final;

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
                            $datos['imagenes'][$value_key]['resulto_img'][] = $resulto_img;
                        }
                    }
                }
                else
                {
                    $mensaje .= 'Ficha Clínica Dermatologia problema al registrar\n';
                }

                if($request->cerrarsession == 0 || $request->cerrarsession =='')
                {
                    /** redireccion Redirect funciona correcto */
                    return \Redirect::route('profesional.mi_agenda','lugares_atencion='.$request->id_lugar_atencion)->with($tipo_mensaje, $mensaje);
                }
                else if($request->cerrarsession == 1)
                {
                    //si funciona
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                    return \Redirect::route('home.ingreso');

                }
            }

        }
        else
        {
            return back()->with('error', $mensaje)->withInput();
        }
    }

    public function store_pediatria_general(Request $request)
    {
        $campos_requeridos = 1;
        $mensaje = '';
        if(empty( trim($request->descripcion_hipotesis)))
        {
            $campos_requeridos = 0;
            $mensaje = 'El Diagnóstico es Requerido.\n Su Ficha Clínica NO ha sido Guardada aún. \n Si es solo Control, indicar Control de Patología.';
        }
        if($campos_requeridos)
        {
            /** FICHA ATENCION  */
            $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();

            $ficha = FichaAtencion::where('id', $hora_medica->id_ficha_atencion)->first();
            $id_profesional = $request->id_profesional_fc;
            $id_paciente = $request->id_paciente_fc;

            $ficha->motivo = $request->descripcion_consulta;
            $ficha->antecedentes = $request->antec_especialidad_ped;

            $ges = 0;
            if ($request->modal_ges == 'on') {
                $ges = 1;
            } else {
                $ges = 0;
            }

            $cronico = 0;
            if ($request->enf_cronico == 'on') {
                $cronico = 1;
            } else {
                $cronico = 0;
            }

            $confidencial = 0;
            if ($request->confidencial == 'on') {
                $confidencial = 1;
            } else {
                $confidencial = 0;
            }

            //Signos vitales
            if ($request->temperatura != '') {
                $ficha->temperatura = $request->temperatura;
            } else {
                $ficha->temperatura = null;
            }

            if ($request->pulso != '') {
                $ficha->pulso = $request->pulso;
            } else {
                $ficha->pulso = null;
            }

            if ($request->frecuencia_reposo != '') {
                $ficha->frecuencia_reposo = $request->frecuencia_reposo;
            } else {
                $ficha->frecuencia_reposo = null;
            }

            if ($request->peso != '') {
                $ficha->peso = $request->peso;
            } else {
                $ficha->peso = null;
            }

            if ($request->talla != '') {
                $ficha->talla = $request->talla;
            } else {
                $ficha->talla = null;
            }

            if ($request->imc != '') {
                $ficha->imc = $request->imc;
            } else {
                $ficha->imc = null;
            }

            if ($request->estado_nutricional != '') {
                $ficha->estado_nutricional = $request->estado_nutricional;
            } else {
                $ficha->estado_nutricional = null;
            }

            //presion Arterial
            if ($request->presion_bi != '') {
                $ficha->presion_bi = $request->presion_bi;
            } else {
                $ficha->presion_bi = null;
            }

            if ($request->presion_bd != '') {
                $ficha->presion_bd = $request->presion_bd;
            } else {
                $ficha->presion_bd = null;
            }

            if ($request->presion_de_pie != '') {
                $ficha->presion_de_pie = $request->presion_de_pie;
            } else {
                $ficha->presion_de_pie = null;
            }

            if ($request->presion_sentado != '') {
                $ficha->presion_sentado = $request->presion_sentado;
            } else {
                $ficha->presion_sentado = null;
            }

            //comunicacion y Traslado
            if ($request->ct_estado_conciencia != '') {
                $ficha->ct_estado_conciencia = $request->ct_estado_conciencia;
            } else {
                $ficha->ct_estado_conciencia = null;
            }

            if ($request->ct_lenguaje != '') {
                $ficha->ct_lenguaje = $request->ct_lenguaje;
            } else {
                $ficha->ct_lenguaje = null;
            }

            if ($request->ct_traslado != '') {
                $ficha->ct_traslado = $request->ct_traslado;
            } else {
                $ficha->ct_traslado = null;
            }

            $ficha->hipotesis_diagnostico = $request->descripcion_hipotesis;
            $ficha->diagnostico_ce10 = $request->descripcion_cie_esp;

            // $ficha->cronico = $cronico;
            // $ficha->ges = $ges;
            // $ficha->confidencial = $confidencial;
            $ficha->id_paciente = $id_paciente;
            $ficha->id_profesional = $id_profesional;
            $ficha->finalizada = 1;
            if (!$ficha->save())
            {
                return back()->with('error', 'Ficha Clínica con problema al guardar')->withInput();
            }
            else
            {
                $tipo_mensaje = 'success';
                $mensaje .= 'Ficha Clínica guardada de forma correcta\n';


                /** REGISTRO FICHA DERMATOLOGIA */
                $ficha_ped_gen = new FichaPediatriaGeneral();

                $ficha_ped_gen->id_ficha_atencion = $ficha->id;
                // $ficha_ped_gen->id_paciente = $id_paciente;
                $ficha_ped_gen->id_profesional = $id_profesional;
                $ficha_ped_gen->id_lugar_atencion = $request->id_lugar_atencion;

                $ficha_ped_gen->id_responsable = $request->id_responsable;

                $ficha_ped_gen->descripcion_consulta = $request->descripcion_consulta;
                $ficha_ped_gen->antec_especialidad_ped = $request->antec_especialidad_ped;

                $ficha_ped_gen->obs_gral_crec_desarr = $request->obs_gral_crec_desarr;
                $ficha_ped_gen->e_nutricional = $request->e_nutricional;
                $ficha_ped_gen->obs_e_nutricional = $request->obs_e_nutricional;
                $ficha_ped_gen->e_vacunas = $request->e_vacunas;
                $ficha_ped_gen->obs_e_vacunas = $request->obs_e_vacunas;
                $ficha_ped_gen->obs_ex_nutricional_vacunas = $request->obs_ex_nutricional_vacunas;
                $ficha_ped_gen->e_piel = $request->e_piel;
                $ficha_ped_gen->obs_e_piel = $request->obs_e_piel;
                $ficha_ped_gen->e_cabcuello = $request->e_cabcuello;
                $ficha_ped_gen->obs_e_cabcuello = $request->obs_e_cabcuello;
                $ficha_ped_gen->e_torax = $request->e_torax;
                $ficha_ped_gen->obs_e_torax = $request->obs_e_torax;
                $ficha_ped_gen->e_abdomen = $request->e_abdomen;
                $ficha_ped_gen->obs_e_abdomen = $request->obs_e_abdomen;
                $ficha_ped_gen->e_muscesq = $request->e_muscesq;
                $ficha_ped_gen->obs_e_muscesq = $request->obs_e_muscesq;
                $ficha_ped_gen->e_o_sent = $request->e_o_sent;
                $ficha_ped_gen->obs_e_o_sent = $request->obs_e_o_sent;
                $ficha_ped_gen->obs_ex_segmentario = $request->obs_ex_segmentario;
                $ficha_ped_gen->obs_ex_pedgen = $request->obs_ex_pedgen;

                $ficha_ped_gen->hip_diag_spec = $request->descripcion_hipotesis;
                $ficha_ped_gen->indicacion = $request->indicacion;

                if($ficha_ped_gen->save())
                {
                    $mensaje .= 'Ficha Clínica Pediatria General guardada de forma correcta\n';
                    //  finalizar hora medica
                    $hora_medica->id_estado = 6;
                    $mensaje_estado_hora_medica = '';
                    if (!$hora_medica->save()) {
                        $mensaje_estado_hora_medica .= 'Hora Medica con Problemas para finalizar.\n';
                    }
                    else
                    {
                        $mensaje_estado_hora_medica .= 'Hora medica Finalizada con Exito.\n';
                    }
                    $mensaje .= $mensaje_estado_hora_medica;

                }
                else
                {
                    $mensaje .= 'Ficha Clínica Pediatria General problema al registrar\n';
                }

                if($request->cerrarsession == 0 || $request->cerrarsession =='')
                {
                    /** redireccion Redirect funciona correcto */
                    return \Redirect::route('profesional.mi_agenda','lugares_atencion='.$request->id_lugar_atencion)->with($tipo_mensaje, $mensaje);
                }
                else if($request->cerrarsession == 1)
                {
                    //si funciona
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                    return \Redirect::route('home.ingreso');

                }
            }

        }
        else
        {
            return back()->with('error', $mensaje)->withInput();
        }
    }


    public function crear_licencia(Request $request)
    {
        /*  $request->validate([
               'nombre_trabajador' => ' required|max:32',
               'prevision'=> 'required',
               'rut_trabajador' => 'required|max:12',
               'nombre_empleador' => 'required|max:500',
               'rut_empleador' => 'required|max:12',
               'cantidad_dias' => 'required|number|max:365',
               'direccion' => 'required|max:250',
               'telefono' => ' required|max:11',
               'direccion_alternavitva' => ' required',
               'diagnostico_descripcion' => ' required',
               'diagnostico_descripcion_alternativo' => ' required',
               'otros_antecedentes' => ' required',
           ]);*/

        $licencia = new licencia();

        $laboral = 0;
        if ($request->laboral == 'on') {
            $laboral = 1;
        } else {
            $laboral = 0;
        }

        $enfermedad_comun_maternal = 0;
        if ($request->enfermedad_comun_maternal == 'on') {
            $enfermedad_comun_maternal = 1;
        } else {
            $enfermedad_comun_maternal = 0;
        }

        $recuperabilidad_laboral = 0;
        if ($request->recuperabilidad_laboral == 'on') {
            $recuperabilidad_laboral = 1;
        } else {
            $recuperabilidad_laboral = 0;
        }

        $tramite_invalidez = 0;
        if ($request->tramite_invalidez == 'on') {
            $tramite_invalidez = 1;
        } else {
            $tramite_invalidez = 0;
        }

        $licencia->enfermedad_comun_maternal = $enfermedad_comun_maternal;
        $licencia->laboral = $laboral;
        $licencia->nombre_empleador = $request->nombre_empleador;
        $licencia->rut_empleador = $request->rut_empleador;
        $licencia->reposo_inicio = $request->reposo_inicio;
        $licencia->reposo_fin = $request->reposo_fin;
        $licencia->tipo_reposo = $request->tipo_reposo;
        $licencia->lugar_reposo = $request->lugar_reposo;
        $licencia->direccion_reposo = $request->direccion_reposo;
        $licencia->region_reposo = $request->region_reposo;
        $licencia->tipo_licencia = $request->tipo_licencia;
        $licencia->recuperabilidad_laboral = $recuperabilidad_laboral;
        $licencia->tramite_invalidez = $tramite_invalidez;
        $licencia->diagnostico_c10 = $request->diagnostico_c10;
        $licencia->diagnostico = $request->diagnostico;
        $licencia->antecedentes = $request->antecedentes;
        //$licencia->telefono = $request->telefono;
        //$licencia->direccion_alternavitva = $request->direccion_alternavitva;
        //$licencia->diagnostico_alternativo = $request->diagnostico_alternativo;
        //$licencia->diagnostico_descripcion_alternativo = $request->diagnostico_descripcion_alternativo;

        /*
        $file=$request->file("examen_apoyo");

        $nombre = "pdf_examen_apoyo=".$licencia->rut_paciente.".".$file->guessExtension();

        $ruta = public_path("pdf/examenes_apoyo/".$nombre);*/
        //$licencia->examenes_apoyo = $request->examenes_apoyo;

        if (!$licencia->save()) {
            $mensajeLicencia = 'Error al crear la licencia';

            return back()->with('mensajeLicencia', $mensajeLicencia);
        } else {
            //copy($file, $ruta);

            $licenciaPPF = new LicenciaPPF();
            $licenciaPPF->id_paciente = $request->id_paciente_li;
            $licenciaPPF->id_profesional = $request->id_profesional_li;
            $licenciaPPF->id_licencia = $licencia->id;
            $licenciaPPF->id_ficha_atencion = $request->id_ficha_li;

            if (!$licenciaPPF->save()) {
                $mensajeLicencia = 'Error al crear la licencia';

                return back()->with('mensajeLicencia', $mensajeLicencia);
            }
            $mensajeLicencia = 'Se Registro la licencia de forma correcta';

            return back()->with('mensajeLicencia', $mensajeLicencia);

            //return $mensajeLicencia;
        }
    }
    /**
     * creado 20220809
     * subir  manual
     * usado en vista de profesional/receta_online

     johan
     */
    public function registroExamen(Request $request)
    {
        $error = array();
        $valido = 0;
        $retorno = array();

        /*
        `id`,
	    `id_prioridad`,
	    `id_paciente`,
	    `id_profesional`,
	    `id_ficha_atencion`,
	    `examen`,
	    `tipo_examen`,
	    `tipo_ficha`,
	    `archivo`,
        */
        // if(empty($request->email_paciente)){
	    //     $error['email_paciente'] = 'email_paciente requerido';
	    //     $valido = 1;
        // }
        if(empty($request->id_paciente)){
	        $error['id_paciente'] = 'id_paciente requerido';
	        $valido = 1;
        }
        // if(empty($request->code_paciente)){
	    //     $error['code_paciente'] = 'code_paciente requerido';
	    //     $valido = 1;
        // }
        if(empty($request->_token)){
	        $error['_token'] = '_token requerido';
	        $valido = 1;
        }
        if(empty($request->id_profesional)){
	        $error['id_profesional'] = 'id_profesional requerido';
	        $valido = 1;
        }
        // if(empty($request->rut_paciente)){
	    //     $error['rut_paciente'] = 'rut_paciente requerido';
	    //     $valido = 1;
        // }
        // if(empty($request->nombres_paciente)){
	    //     $error['nombres_paciente'] = 'nombres_paciente requerido';
	    //     $valido = 1;
        // }
        // if(empty($request->apellidos_paciente)){
	    //     $error['apellidos_paciente'] = 'apellidos_paciente requerido';
	    //     $valido = 1;
        // }
        if(empty($request->id_ficha_atencion)){
	        $error['id_ficha_atencion'] = 'id_ficha_atencion requerido';
	        $valido = 1;
        }
        if(empty($request->t_examen)){
	        $error['t_examen'] = 't_examen requerido';
	        $valido = 1;
        }
        if(empty($request->n_examen)){
	        $error['n_examen'] = 'n_examen requerido';
	        $valido = 1;
        }
        // // if(empty($request->fecha_paciente)){
	    // //     $error['fecha_paciente'] = 'fecha_paciente requerido';
	    // //     $valido = 1;
        // // }
        // if(empty($request->adjuntar_examen_receta_online)){
	    //     $error['adjuntar_examen_receta_online'] = 'adjuntar_examen_receta_online requerido';
	    //     $valido = 1;
        // }
        if(empty($request->adjuntar_examen_receta_online_base64)){
	        $error['adjuntar_examen_receta_online_base64'] = 'adjuntar_examen_receta_online_base64 requerido';
	        $valido = 1;
        }


        if($valido == 0)
        {
            $examen = new ExamenPPF();

            $examen->id_prioridad = 2;
            $examen->id_paciente = $request->id_paciente;
            $examen->id_profesional = $request->id_profesional;
            $examen->id_ficha_atencion = $request->id_ficha_atencion;
            $examen->examen = $request->n_examen;
            $examen->tipo_examen = $request->t_examen;
            $examen->tipo_ficha = 999;/** fu cargado por profesional  fuera de consulta */
            $examen->archivo = $request->adjuntar_examen_receta_online_base64;

            if (!$examen->save()) {
                $retorno['estado'] = 0;
                $retorno['msj'] = 'Falla al subir examen';
            }
            else
            {
	            $retorno['estado'] = 1;
                $retorno['msj'] = 'Examen subido con Exito.';
            }

        }
        else
        {
            $retorno['estado'] = 0;
            $retorno['msj'] = 'campo faltante';
            $retorno['error'] = $error;

        }
        return $retorno;

    }

    /**
     * getFichasClinicaPaciente  function
     *
     * @param Request $request
     *  id_paciente
     *  id_profesional
     * @return json
     */
    public function getFichasClinicaPaciente(Request $request)
    {
        $filtro = array();
        $datos = array();
        if(!empty($request->id_paciente)){
            $filtro[] = array('id_paciente',$request->id_paciente);
        }
        if(!empty($request->id_profesional)){
            $filtro[] = array('id_profesional',$request->id_profesional);
        }

        $registros = FichaAtencion::with('Paciente')->with('Profesional')->where($filtro)->orderBy('created_at','ASC')->get();
        if($registros->count()){
            $datos['estado'] = 1;
            $datos['msj'] = 'Datos Encontrados';
            $datos['registros'] = $registros;
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Sin Datos';
        }
        return $datos;
    }


    public function pdf_receta_medicamentosBAK(Request $request)
    {
        $datos = array();
        $detalleReceta = DetalleReceta::where('id_ficha', $request->id_ficha_atencion)->get();
        if($detalleReceta->count()>0)
        {
            $ficha_atencion = FichaAtencion::find($request->id_ficha_atencion);
            $lugar_atencion = LugarAtencion::find($ficha_atencion->id_lugar_atencion);
            $profesional = Profesional::find($ficha_atencion->id_profesional);
            $paciente = Paciente::find($ficha_atencion->id_paciente);

            $token_firma = encrypt( $profesional->rut.'_'.$profesional->email.'_'.$lugar_atencion->id );

            $detalle_receta = (object)array();

            $token_receta = '';
            $cantidad_recetas = 0;
            foreach ($detalleReceta as $key_detalle_receta => $value_detalle_receta)
            {
                // var_dump($value_detalle_receta);
                $producto = Articulo::where('nombre',$value_detalle_receta->producto)->first();

                $array_medicamento = array(
                    'nombre_medicamento' => $producto->nombre,
                    'droga'=>$producto->droga,
                    'presentacion' => $value_detalle_receta->presentacion,
                    'posologia' => $value_detalle_receta->posologia,
                    'via_administracion' => $value_detalle_receta->via_administracion,
                    'periodo' => $value_detalle_receta->periodo,
                    'uso_cronico' => $value_detalle_receta->uso_cronico,
                    'cantidad_compra' => $value_detalle_receta->cantidad_compra,
                    'receta_token' => $value_detalle_receta->receta_token,
                );

                $temp_token = CertificadoController::certificadoDocumento($request->id_ficha_atencion, $profesional->id, $paciente->id, 1);
                if($temp_token['estado'] == 1)
                {
                    $token_receta = $temp_token['certificado'];
                    $url_documento = CertificadoController::generarUrlDocumento($token_receta);
                    $qr_documento = GeneradorQrController::generar($url_documento);
                }
                else
                {
                    $temp_token = CertificadoController::certificadoDocumento($request->id_ficha_atencion, rand(111,999), $paciente->id, 1);
                    $token_receta = $temp_token['certificado'];
                    $url_documento = CertificadoController::generarUrlDocumento($token_receta);
                    $qr_documento = GeneradorQrController::generar($url_documento);
                }


                $nombre_control = $producto->RecetaControl()->first()->descripcion;
                $id_control = $producto->RecetaControl()->first()->cod_control;

                // 4 - Receta retenida
                // 6 - Receta Simple
                // 7 - Venta Directa

                // 1 - Receta retenida con control de Psicotrópicos
                // 2 - Receta retenida con control de Estupefacientes
                // 3 - Receta Cheque
                // 5 - Receta retenida con control de Codeína


                if(trim($nombre_control) == 'Receta retenida' || trim($nombre_control) == 'Receta Simple' || trim($nombre_control) == 'Venta Directa')
                {
                    $nombre_control = 'Receta';

                    if(!isset($detalle_receta->$nombre_control))
                        $cantidad_recetas ++;

                }
                else
                {
                    $nombre_control = trim($nombre_control).'_'.$key_detalle_receta;

                    if(!isset($detalle_receta->$nombre_control))
                        $cantidad_recetas ++;

                }

                $detalle_receta->$nombre_control[] = $array_medicamento;


                $temp_token = CertificadoController::certificadoProfesional($profesional->id);
                if($temp_token['estado'] == 1)
                {
                    $token_profesional = $temp_token['certificado'];
                    $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
                    $qr_profesional = GeneradorQrController::generar($url_documento);
                }
                else
                {
                    $temp_token = CertificadoController::certificadoProfesional(rand(1114,999));
                    $token_profesional = $temp_token['certificado'];
                    $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
                    $qr_profesional = GeneradorQrController::generar($url_documento);
                }


            }

            // echo json_encode($detalle_receta);
            // die();

            $array_ficha_atencion = array(
                'id' => $ficha_atencion->id,
                'created_at' => $ficha_atencion->created_at->format('d/m/Y'),
                'token' => $token_receta,
                'url' => $url_documento,
                'qr' => $qr_documento,
            );
            $array_lugar_atencion = array(
                'id' => $lugar_atencion->id,
                'nombre' => $lugar_atencion->nombre
            );
            $array_profesional = array(
                'id' => $profesional->id,
                'nombre' => $profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos,
                'rut' => $profesional->rut,
                'especialidad' => ($profesional->SubTipoEspecialidad()->first()?$profesional->SubTipoEspecialidad()->first()->nombre:$profesional->TipoEspecialidad()->first()->nombre),
                'token' =>  $token_profesional,
                'url' =>  $url_profesional,
                'qr' =>  $qr_profesional,
            );
            $array_paciente = array(
                'id' => $paciente->id,
                'nombre' => $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos,
                'fecha_nac' => $paciente->fecha_nac,
                'rut' => $paciente->rut,
                'sexo' => $paciente->sexo,
                'direccion' => $paciente->Direccion()->first()->direccion.' '.$paciente->Direccion()->first()->numero_dir.', '.$paciente->Direccion()->first()->Ciudad()->first()->nombre
            );

            return  PdfController::generarPDF('RECETA MEDICA', compact('array_ficha_atencion', 'array_lugar_atencion', 'array_profesional', 'array_paciente', 'detalle_receta','cantidad_recetas'), 'Receta Medica '.$paciente->rut, 'pdf_receta_medica');
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'No se encontraron medicamentos';
        }
    }

    public function pdf_receta_medicamentos(Request $request)
    {
        $datos = array();

        $ficha_atencion = FichaAtencion::find($request->id_ficha_atencion);
        $lugar_atencion = LugarAtencion::find($ficha_atencion->id_lugar_atencion);
        $profesional = Profesional::find($ficha_atencion->id_profesional);
        $paciente = Paciente::find($ficha_atencion->id_paciente);

        /** token receta */
        $temp_token = CertificadoController::certificadoDocumento($request->id_ficha_atencion, $profesional->id, $paciente->id, 1);
        if($temp_token['estado'] == 1)
        {
            $token_receta = $temp_token['certificado'];
            $url_documento = CertificadoController::generarUrlDocumento($token_receta);
            $qr_documento = GeneradorQrController::generar($url_documento);
        }
        else
        {
            $temp_token = CertificadoController::certificadoDocumento($request->id_ficha_atencion, rand(111,999), $paciente->id, 1);
            $token_receta = $temp_token['certificado'];
            $url_documento = CertificadoController::generarUrlDocumento($token_receta);
            $qr_documento = GeneradorQrController::generar($url_documento);
        }

        /** token profesional */
        $temp_token = CertificadoController::certificadoProfesional($profesional->id);
        if($temp_token['estado'] == 1)
        {
            $token_profesional = $temp_token['certificado'];
            $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
            $qr_profesional = GeneradorQrController::generar($url_documento);
        }
        else
        {
            $temp_token = CertificadoController::certificadoProfesional(rand(1114,999));
            $token_profesional = $temp_token['certificado'];
            $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
            $qr_profesional = GeneradorQrController::generar($url_documento);
        }

        /** cantidad de hojas (secciones) */
        $cantidad_recetas = 0;

        /** detalle de receta */
        $detalle_receta = (object)array();

        /** MEDICAMENTOS */
        $detalleReceta = DetalleReceta::where('id_ficha', $request->id_ficha_atencion)->get();
        if($detalleReceta->count()>0)
        {
            foreach ($detalleReceta as $key_detalle_receta => $value_detalle_receta)
            {
                // var_dump($value_detalle_receta);
                $producto = Articulo::where('nombre',$value_detalle_receta->producto)->first();

                $array_medicamento = array(
                    'nombre_medicamento' => $producto->nombre,
                    'droga'=>$producto->droga,
                    'presentacion' => $value_detalle_receta->presentacion,
                    'posologia' => $value_detalle_receta->posologia,
                    'via_administracion' => $value_detalle_receta->via_administracion,
                    'periodo' => $value_detalle_receta->periodo,
                    'uso_cronico' => $value_detalle_receta->uso_cronico,
                    'cantidad_compra' => $value_detalle_receta->cantidad_compra,
                    'receta_token' => $value_detalle_receta->receta_token,
                );

                $nombre_control = $producto->RecetaControl()->first()->descripcion;
                $id_control = $producto->RecetaControl()->first()->cod_control;

                // 4 - Receta retenida
                // 6 - Receta Simple
                // 7 - Venta Directa

                // 1 - Receta retenida con control de Psicotrópicos
                // 2 - Receta retenida con control de Estupefacientes
                // 3 - Receta Cheque
                // 5 - Receta retenida con control de Codeína


                if(trim($nombre_control) == 'Receta retenida' || trim($nombre_control) == 'Receta Simple' || trim($nombre_control) == 'Venta Directa')
                {
                    $nombre_control = 'Receta';
                    if(!isset($detalle_receta->$nombre_control))
                        $cantidad_recetas ++;
                }
                else
                {
                    $nombre_control = trim($nombre_control).'_'.$key_detalle_receta;
                    if(!isset($detalle_receta->$nombre_control))
                        $cantidad_recetas ++;
                }
                $detalle_receta->$nombre_control[] = $array_medicamento;
            }

            // return  PdfController::generarPDF('RECETA MEDICA', compact('array_ficha_atencion', 'array_lugar_atencion', 'array_profesional', 'array_paciente', 'detalle_receta','cantidad_recetas'), 'Receta Medica '.$paciente->rut, 'pdf_receta_medica');
        }

        /** ESPECIALIDAD OTORRINOLARINGOLOGÍA (AUDIFONOS) */
        $detalleOrlAudifono = RecetaAudifono::where('id_ficha_atencion', $request->id_ficha_atencion)->first();
        if($detalleOrlAudifono)
        {
            $cantidad_recetas ++;
            $arrayTipo = array('','Intracanal', 'Retroauricular', 'Audigafas', 'Implante', 'Otro Tipo');
            $array_medicamento = array(
                'tipo' => $arrayTipo[$detalleOrlAudifono->tipo],
                'od' => $detalleOrlAudifono->od,
                'especificacion_od' => $detalleOrlAudifono->especificacion_od,
                'oi' => $detalleOrlAudifono->oi,
                'especificacion_oi' => $detalleOrlAudifono->especificacion_oi,
                'bi' => $detalleOrlAudifono->bi,
                'especificacion_bi' => $detalleOrlAudifono->especificacion_bi,
                'especificacion_general' => $detalleOrlAudifono->especificacion_general,
            );
            $nombre_control = 'ORL_AUDIFONO';
            $detalle_receta->$nombre_control[] = $array_medicamento;
        }

        $array_ficha_atencion = array(
            'id' => $ficha_atencion->id,
            'created_at' => $ficha_atencion->created_at->format('d/m/Y'),
            'token' => $token_receta,
            'url' => $url_documento,
            'qr' => $qr_documento,
        );
        $array_lugar_atencion = array(
            'id' => $lugar_atencion->id,
            'nombre' => $lugar_atencion->nombre
        );
        $array_profesional = array(
            'id' => $profesional->id,
            'nombre' => $profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos,
            'rut' => $profesional->rut,
            'especialidad' => ($profesional->SubTipoEspecialidad()->first()?$profesional->SubTipoEspecialidad()->first()->nombre:$profesional->TipoEspecialidad()->first()->nombre),
            'token' =>  $token_profesional,
            'url' =>  $url_profesional,
            'qr' =>  $qr_profesional,
        );
        $array_paciente = array(
            'id' => $paciente->id,
            'nombre' => $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos,
            'fecha_nac' => $paciente->fecha_nac,
            'rut' => $paciente->rut,
            'sexo' => $paciente->sexo,
            'direccion' => $paciente->Direccion()->first()->direccion.' '.$paciente->Direccion()->first()->numero_dir.', '.$paciente->Direccion()->first()->Ciudad()->first()->nombre
        );
        return  PdfController::generarPDF('RECETA MEDICA', compact('array_ficha_atencion', 'array_lugar_atencion', 'array_profesional', 'array_paciente', 'detalle_receta','cantidad_recetas'), 'Receta Medica '.$paciente->rut, 'pdf_receta_medica');

    }

    public function pdf_orden_examenes(Request $request)
    {
        $datos = array();
        $examenesPPF = ExamenPPF::where('id_ficha_atencion', $request->id_ficha_atencion)->get();
        if($examenesPPF->count()>0)
        {
            $ficha_atencion = FichaAtencion::find($request->id_ficha_atencion);
            $lugar_atencion = LugarAtencion::find($ficha_atencion->id_lugar_atencion);
            $profesional = Profesional::find($ficha_atencion->id_profesional);
            $paciente = Paciente::find($ficha_atencion->id_paciente);

            $token_firma = encrypt( $profesional->rut.'_'.$profesional->email.'_'.$lugar_atencion->id );

            $detalle_orden = (object)array();

            $token_receta = '';
            $temp_token = CertificadoController::certificadoDocumento($request->id_ficha_atencion, $profesional->id, $paciente->id, 1);
            if($temp_token['estado'] == 1)
            {
                $token_receta = $temp_token['certificado'];
                $url_documento = CertificadoController::generarUrlDocumento($token_receta);
                $qr_documento = GeneradorQrController::generar($url_documento);
            }
            else
            {
                $temp_token = CertificadoController::certificadoDocumento($request->id_ficha_atencion, rand(111,999), $paciente->id, 1);
                $token_receta = $temp_token['certificado'];
                $url_documento = CertificadoController::generarUrlDocumento($token_receta);
                $qr_documento = GeneradorQrController::generar($url_documento);
            }

            $cantidad_recetas = 0;
            foreach ($examenesPPF as $key_examen_ppf => $value_examen_ppf)
            {
                $nombre_examen = $value_examen_ppf->examen;

                $nombre_parent = '';
                $examen_base = ExamenMedico::where('nombre_examen', $value_examen_ppf->examen)->where('habilitado',1)->first();
                if($examen_base->cod_parent !== 0)
                {
                    $nombre_parent = $examen_base->algo;
                    // $padre1 = ExamenMedico::where('cod_examen', $examen_base->cod_parent)->first();
                    // if($padre1)
                    // {
                    //     $nombre_parent = $padre1->nombre_examen;
                    //     if($padre1->cod_parent != 0)
                    //     {
                    //         $padre2 = ExamenMedico::where('cod_examen', $padre1->cod_parent)->first();
                    //         if($padre2)
                    //         {
                    //             $nombre_parent = $padre2->nombre_examen;
                    //             if($padre2->cod_parent != 0)
                    //             {
                    //                 $padre3 = ExamenMedico::where('cod_examen', $padre2->cod_parent)->first();
                    //                 if($padre3)
                    //                 {
                    //                     $nombre_parent = $padre3->nombre_examen;
                    //                 }
                    //             }
                    //         }
                    //     }
                    // }
                }


                $id_base =  $examen_base->cod_parent;
                $codigo =  $examen_base->codigo;
                $con_contraste =  $value_examen_ppf->con_contraste;
                $nombre_control = $nombre_parent;
                // $nombre_control = 'orden';
                // if( $id_base == 363 || $id_base == 364 || $id_base == 365 || $id_base == 366 || $id_base == 367 )
                // {
                //     $nombre_control = 'radiologia';
                //     if( $id_base == 363 || $id_base == 364 )
                //     {
                //         $nombre_radiologia = ExamenMedico::where('cod_examen', $id_base)->first();
                //         $nombre_examen = $nombre_radiologia->nombre_examen.' '.$value_examen_ppf->examen;
                //     }

                // }



                if(!isset($detalle_orden->$nombre_control))
                        $cantidad_recetas ++;

                /**
                * `id_prioridad`,
                * `id_paciente`,
                * `id_profesional`,
                * `id_ficha_atencion`,
                * `examen`,
                * `tipo_examen`,
                * `tipo_ficha`,
                */
                $prioridad_text = array('','Baja', 'Media', 'Alta', 'Urgente');
                $array_examenes = array(
                    'prioridad' => $prioridad_text[$value_examen_ppf->id_prioridad],
                    'examen'=> $nombre_examen,
                    'otro' => $value_examen_ppf->otro,
                    'contraste'=>$con_contraste,
                    'tipo_examen' => $value_examen_ppf->tipo_examen,
                    'codigo' => $codigo,
                );


                $detalle_orden->$nombre_control[] = $array_examenes;

                $temp_token = CertificadoController::certificadoProfesional($profesional->id);
                if($temp_token['estado'] == 1)
                {
                    $token_profesional = $temp_token['certificado'];
                    $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
                    $qr_profesional = GeneradorQrController::generar($url_documento);
                }
                else
                {
                    $temp_token = CertificadoController::certificadoProfesional(rand(1114,999));
                    $token_profesional = $temp_token['certificado'];
                    $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
                    $qr_profesional = GeneradorQrController::generar($url_documento);
                }
            }

            $array_ficha_atencion = array(
                'id' => $ficha_atencion->id,
                'created_at' => $ficha_atencion->created_at->format('d/m/Y'),
                'token' => $token_receta,
                'url' => $url_documento,
                'qr' => $qr_documento,
            );
            $array_lugar_atencion = array(
                'id' => $lugar_atencion->id,
                'nombre' => $lugar_atencion->nombre
            );
            $array_profesional = array(
                'id' => $profesional->id,
                'nombre' => $profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos,
                'rut' => $profesional->rut,
                'especialidad' => $profesional->SubTipoEspecialidad()->first()->nombre,
                'token' =>  $token_profesional,
                'url' =>  $url_profesional,
                'qr' =>  $qr_profesional,
            );
            $array_paciente = array(
                'id' => $paciente->id,
                'nombre' => $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos,
                'fecha_nac' => $paciente->fecha_nac,
                'rut' => $paciente->rut,
                'sexo' => $paciente->sexo,
                'direccion' => $paciente->Direccion()->first()->direccion.' '.$paciente->Direccion()->first()->numero_dir.', '.$paciente->Direccion()->first()->Ciudad()->first()->nombre
            );

            return  PdfController::generarPDF('ORDEN EXAMENES', compact('array_ficha_atencion', 'array_lugar_atencion', 'array_profesional', 'array_paciente', 'detalle_orden','cantidad_recetas'), 'Orden Examenes '.$paciente->rut, 'pdf_orden_examen');
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'No se encontraron medicamentos';
        }
    }


    public function pdf_certificado_reposo(Request $request)
    {
        $datos = array();
        $certificadoReposo = CertificadoReposo::where('id_ficha_atencion', $request->id_ficha_atencion)->first();
        if($certificadoReposo->count()>0)
        {
            $ficha_atencion = FichaAtencion::find($request->id_ficha_atencion);
            $lugar_atencion = LugarAtencion::find($ficha_atencion->id_lugar_atencion);
            $profesional = Profesional::find($ficha_atencion->id_profesional);
            $paciente = Paciente::find($ficha_atencion->id_paciente);

            $token_firma = encrypt( $profesional->rut.'_'.$profesional->email.'_'.$lugar_atencion->id );

            $token_receta = '';

            $detalle_certificado = array(
                'fecha_inicio' => $certificadoReposo->fecha_inicio,
                'fecha_termino' => $certificadoReposo->fecha_termino,
                'hipotesis' => $certificadoReposo->hipotesis,
                'comentarios' => $certificadoReposo->comentarios,
            );

            $array_ficha_atencion = array(
                'id' => $ficha_atencion->id,
                'created_at' => $ficha_atencion->created_at->format('d/m/Y'),
                'token' => $token_receta,
            );
            $array_lugar_atencion = array(
                'id' => $lugar_atencion->id,
                'nombre' => $lugar_atencion->nombre
            );
            $array_profesional = array(
                'id' => $profesional->id,
                'nombre' => $profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos,
                'rut' => $profesional->rut,
                'especialidad' => $profesional->SubTipoEspecialidad()->first()->nombre,
                'token' =>  $token_firma,
            );
            $array_paciente = array(
                'id' => $paciente->id,
                'nombre' => $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos,
                'fecha_nac' => $paciente->fecha_nac,
                'rut' => $paciente->rut,
                'direccion' => $paciente->Direccion()->first()->direccion.' '.$paciente->Direccion()->first()->numero_dir.', '.$paciente->Direccion()->first()->Ciudad()->first()->nombre
            );

            return  PdfController::generarPDF('CERTIFICADO REPOSO', compact('array_ficha_atencion', 'array_lugar_atencion', 'array_profesional', 'array_paciente', 'detalle_certificado'), 'Certificado Reposo '.$paciente->rut, 'pdf_certificado_reposo');
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'No se encontraron medicamentos';
        }
    }

    public function pdf_informe_medico(Request $request)
    {
        $datos = array();
        $filtro = array();
        $filtro[] = array('id_ficha_atencion', $request->id_ficha_atencion);
        if(!empty($request->id_tipo_informe))
            $filtro[] = array('id_tipo_informe', $request->id_tipo_informe);
        else
            $filtro[] = array('id_tipo_informe', 1);

        $informMedico = InformeMedico::where($filtro)->first();
        if($informMedico)
        {
            $tipo_informe = TipoInforme::find($informMedico->id_tipo_informe);
            $ficha_atencion = FichaAtencion::find($request->id_ficha_atencion);
            $lugar_atencion = LugarAtencion::find($ficha_atencion->id_lugar_atencion);
            $profesional = Profesional::find($ficha_atencion->id_profesional);
            $paciente = Paciente::find($ficha_atencion->id_paciente);

            /** token receta */
            $temp_token = CertificadoController::certificadoDocumento($request->id_ficha_atencion, $profesional->id, $paciente->id, 1);
            if($temp_token['estado'] == 1)
            {
                $token_receta = $temp_token['certificado'];
                $url_documento = CertificadoController::generarUrlDocumento($token_receta);
                $qr_documento = GeneradorQrController::generar($url_documento);
            }
            else
            {
                $temp_token = CertificadoController::certificadoDocumento($request->id_ficha_atencion, rand(111,999), $paciente->id, 1);
                $token_receta = $temp_token['certificado'];
                $url_documento = CertificadoController::generarUrlDocumento($token_receta);
                $qr_documento = GeneradorQrController::generar($url_documento);
            }

            /** token profesional */
            $temp_token = CertificadoController::certificadoProfesional($profesional->id);
            if($temp_token['estado'] == 1)
            {
                $token_profesional = $temp_token['certificado'];
                $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
                $qr_profesional = GeneradorQrController::generar($url_documento);
            }
            else
            {
                $temp_token = CertificadoController::certificadoProfesional(rand(1114,999));
                $token_profesional = $temp_token['certificado'];
                $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
                $qr_profesional = GeneradorQrController::generar($url_documento);
            }

            $detalle_informe_medico = array(
                'informe_medico' => $informMedico->informe_medico,
                'fecha_informe_medico' => $informMedico->fecha_informe_medico,
            );

            $array_ficha_atencion = array(
                'id' => $ficha_atencion->id,
                'created_at' => $ficha_atencion->created_at->format('d/m/Y'),
                'token' => $token_receta,
                'url' => $url_documento,
                'qr' => $qr_documento,
            );
            $array_lugar_atencion = array(
                'id' => $lugar_atencion->id,
                'nombre' => $lugar_atencion->nombre
            );
            $array_profesional = array(
                'id' => $profesional->id,
                'nombre' => $profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos,
                'rut' => $profesional->rut,
                'especialidad' => ($profesional->SubTipoEspecialidad()->first()?$profesional->SubTipoEspecialidad()->first()->nombre:$profesional->TipoEspecialidad()->first()->nombre),
                'token' =>  $token_profesional,
                'url' =>  $url_profesional,
                'qr' =>  $qr_profesional,
            );
            $array_paciente = array(
                'id' => $paciente->id,
                'nombre' => $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos,
                'fecha_nac' => $paciente->fecha_nac,
                'rut' => $paciente->rut,
                'sexo' => $paciente->sexo,
                'direccion' => $paciente->Direccion()->first()->direccion.' '.$paciente->Direccion()->first()->numero_dir.', '.$paciente->Direccion()->first()->Ciudad()->first()->nombre
            );

            return  PdfController::generarPDF(strtoupper($tipo_informe->nombre), compact('array_ficha_atencion', 'array_lugar_atencion', 'array_profesional', 'array_paciente', 'detalle_informe_medico'), $tipo_informe->nombre.' '.$paciente->rut, $tipo_informe->pdf);
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'No se encontraron Documento';
            return $datos;
        }
    }

    public function pdf_uso_personal(Request $request)
    {
        $datos = array();
        $usoPersonal = UsoPersonal::where('id_ficha_atencion', $request->id_ficha_atencion)->first();
        if($usoPersonal->count()>0)
        {
            $ficha_atencion = FichaAtencion::find($request->id_ficha_atencion);
            $lugar_atencion = LugarAtencion::find($ficha_atencion->id_lugar_atencion);
            $profesional = Profesional::find($ficha_atencion->id_profesional);
            $paciente = Paciente::find($ficha_atencion->id_paciente);

            $token_firma = encrypt( $profesional->rut.'_'.$profesional->email.'_'.$lugar_atencion->id );

            $token_receta = '';

            $detalle_uso_personal = array(
                'dirigido' => $usoPersonal->dirigido,
                'cargo' => $usoPersonal->cargo,
                'mensaje' => $usoPersonal->mensaje,
            );

            $array_ficha_atencion = array(
                'id' => $ficha_atencion->id,
                'created_at' => $ficha_atencion->created_at->format('d/m/Y'),
                'token' => $token_receta,
            );
            $array_lugar_atencion = array(
                'id' => $lugar_atencion->id,
                'nombre' => $lugar_atencion->nombre
            );
            $array_profesional = array(
                'id' => $profesional->id,
                'nombre' => $profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos,
                'rut' => $profesional->rut,
                'especialidad' => $profesional->SubTipoEspecialidad()->first()->nombre,
                'token' =>  $token_firma,
            );
            $array_paciente = array(
                'id' => $paciente->id,
                'nombre' => $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos,
                'fecha_nac' => $paciente->fecha_nac,
                'rut' => $paciente->rut,
                'direccion' => $paciente->Direccion()->first()->direccion.' '.$paciente->Direccion()->first()->numero_dir.', '.$paciente->Direccion()->first()->Ciudad()->first()->nombre
            );

            $nombre_archivo = strtolower('dirigido_a_'.$usoPersonal->dirigido);
            $bad = array(" ", "ñ", "á", "é", "í", "ó","ú" );
            $god   = array("_", "n", "a", "e", "i", "o","u" );
            $nombre_archivo = str_replace($god, $bad, $nombre_archivo);

            return  PdfController::generarPDF('', compact('array_ficha_atencion', 'array_lugar_atencion', 'array_profesional', 'array_paciente', 'detalle_uso_personal'), $nombre_archivo, 'pdf_uso_personal');
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'No se encontraron medicamentos';
        }
    }

    public function getArchivosFicha(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;
        $registros = array();

        if(empty($request->id_ficha_atencion_soli))
        {
            $error['id_ficha_atencion_soli'] = 'campo requerido';
            $valido = 0;
        }

        if($valido == 1)
        {
            $ficha = FichaAtencion::where('id',$request->id_ficha_atencion_soli)->first();
            // if(count($ficha) > 0)
            if($ficha->count())
            {
                $paciente = Paciente::find($ficha->id_paciente);

                /** certificado */
                $registro_certificado = CertificadoReposo::where('id_ficha_atencion',$ficha->id)->get();
                $registro_certificado_cantidad = 0;
                if(count($registro_certificado)>0)
                {
                    foreach ($registro_certificado as $key => $value) {
                        $registros[] = array(
                            'id' => $value->id,
                            'id_ficha' =>$ficha->id,
                            'fecha' => $value->created_at,
                            'tipo' => 'Certificado de Reposo',
                            'url_archivo' => 'pdf.certificado_reposo'
                        );
                        $registro_certificado_cantidad++;
                    }
                }

                /** interconsulta */
                $registro_interconsulta = Interconsulta::where('id_ficha_atencion_soli',$ficha->id)->get();
                $registro_interconsulta_cantidad = 0;
                if(count($registro_interconsulta)>0)
                {
                    foreach ($registro_interconsulta as $key => $value) {
                        $registros[] = array(
                            'id' => $value->id,
                            'id_ficha' =>$ficha->id,
                            'fecha' => $value->created_at,
                            'tipo' => 'Interconsulta',
                            'url_archivo' => 'pdf.informe_medico'
                        );
                        $registro_interconsulta_cantidad++;
                    }
                }
                /** informe */
                $registro_informe = InformeMedico::where('id_ficha_atencion',$ficha->id)->get();
                $registro_informe_cantidad = 0;
                if(count($registro_informe)>0)
                {
                    foreach ($registro_informe as $key => $value) {
                        $registros[] = array(
                            'id' => $value->id,
                            'id_ficha' =>$ficha->id,
                            'fecha' => $value->created_at,
                            'tipo' => 'Informen Medico',
                            'url_archivo' => 'pdf.informe_medico'
                        );
                        $registro_informe_cantidad++;
                    }
                }
                /** uso personal */
                $registro_uso = UsoPersonal::where('id_ficha_atencion',$ficha->id)->get();
                $registro_uso_cantidad = 0;
                if(count($registro_uso)>0)
                {
                    foreach ($registro_uso as $key => $value) {
                        $registros[] = array(
                            'id' => $value->id,
                            'id_ficha' =>$ficha->id,
                            'fecha' => $value->created_at,
                            'tipo' => 'Uso Personal',
                            'url_archivo' => 'pdf.uso_personal'
                        );
                        $registro_uso_cantidad++;
                    }
                }

                if( $registro_certificado_cantidad == 0 && $registro_interconsulta_cantidad == 0 && $registro_informe_cantidad == 0 && $registro_uso_cantidad == 0 )
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'no se encontraron registros';
                    $datos['paciente'] = array(
                        'id' => $paciente->id,
                        'nombre' => $paciente->nombre.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos
                    );
                }
                else
                {
                    $datos['estado'] = 1;
                    $datos['registros'] = $registros;
                    $datos['paciente'] = array(
                        'id' => $paciente->id,
                        'nombre' => $paciente->nombre.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos
                    );
                    $datos['cantidad'] = array(
                        'registro_certificado_cantidad' => $registro_certificado_cantidad,
                        'registro_interconsulta_cantidad' => $registro_interconsulta_cantidad,
                        'registro_informe_cantidad' => $registro_informe_cantidad,
                        'registro_uso_cantidad' => $registro_uso_cantidad,
                    );
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'no se encontraron registros';
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

    public function getFichaAtencion(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_ficha_atencion))
        {
            $error['id_ficha_atencion'] = 'campo requerido';
            $valido = 0;
        }

        if($valido == 1)
        {
            $registro = FichaAtencion::find($request->id_ficha_atencion);
            $paciente = Paciente::find($registro->id_paciente);

            $datos['estado'] = 1;
            $datos['registros'] = $registro;
            $datos['paciente'] = array(
                'id' => $paciente->id,
                'nombre' => $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos
            );
        }
        else
        {
            $datos['estado'] = 0;
            $datos['mjs'] = 'campo requerido';
            $datos['error'] = $error;
        }

        return $datos;
    }

    /*
        public function interconsulta(Request $request)
        {
            $interconsulta = new interconsulta;

            $interconsulta->especialidad = $request->especialidad;
            $interconsulta->hipotesis = $request->hipotesis;
            $interconsulta->descripcion = $request->descripcion;
            $interconsulta->diagnostico = $request->diagnostico;
            $interconsulta->tratamiento = $request->tratamiento;
            $interconsulta->comentario = $request->comentario;
            $interconsulta->fecha_control = $request->fecha_control;
            $interconsulta->id_paciente = $request->id_paciente;
            $interconsulta->id_profesional = $request->id_profesional;

            if (!$interconsulta->save()) {
                return 'error al ingresar la interconsulta';
            }

            return back()->with('mensaje', 'se ha registrado la interconsulta');
        }

        public function reposo(Request $request)
        {
            $reposo = new reposo;

            $reposo->fecha_inicio = $request->fecha_inicio;
            $reposo->fecha_termino = $request->fecha_termino;
            $reposo->hipotesis_reposo = $request->hipotesis_reposo;
            $reposo->comentarios_reposo = $request->comentarios_reposo;
            $reposo->id_paciente = $request->id_paciente_reposo;
            $reposo->id_profesional = $request->id_profesional_reposo;

            if ($reposo->save()) {
                return back()->with('mensaje', 'Error al registar el reposo del paciente');
            }

            return back()->with('mensaje', 'Exito al registar el reposo del paciente');
        }

        public function informe_medico(Request $request)
        {
            $informe_medico = new informe_medico;

            $informe_medico->fecha_informe = $request->fecha_informe;
            $informe_medico->descripcion_informe = $request->descripcion_informe;
            $informe_medico->id_paciente = $request->paciente_informe;
            $informe_medico->id_profesional = $request->profesional_informe;

            if (!$informe_medico->save()) {
                return back()->with('mensaje', 'no se pudo almacenar el informe medico');
            }

            return back()->with('mensaje', 'Informe almacenado de forma correcta');
        }

        public function constancia_ges(Request $request)
        {
            $ges = new constancia_ges;
            $ges->nombre_prestador = $request->nombre_prestador;
            $ges->direccion_prestador = $request->direccion_prestador;
            $ges->nombre_responsable = $request->nombre_responsable;
            $ges->rut_responsable = $request->rut_responsable;
            $ges->confirmacion_ges = $request->confirmacion_ges;
            $ges->paciente_tratamiento = $request->paciente_tratamiento;
            $ges->fecha_notificacion = $request->fecha_notificacion;
            $ges->id_paciente = $request->id_paciente_ges;

            if (!$ges->save()) {
                return back()->with('mensaje', 'Error al guardar la constancia ges');
            }

            return back()->with('mensaje', 'Constancia ges  registrada con exito');
        }
        */


}
