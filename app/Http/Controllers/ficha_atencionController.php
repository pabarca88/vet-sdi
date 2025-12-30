<?php

namespace App\Http\Controllers;

use App\Helpers\Funciones;

use App\Models\AntConfidenciales;
use App\Models\AntecedentesCirugias;
use App\Models\Antecedente;
use App\Models\AntecedenteAlergiaPaciente;
use App\Models\AntecedenteEnferCronica;
use App\Models\AntecedenteMedicamentoCronico;
use App\Models\AntecedentesPaciente;
use App\Models\Articulo;
use App\Models\AsignacionUrgencia;
use App\Models\ArticuloFaltante;
use App\Models\Biopsia;
use App\Models\Bodega;
use App\Models\CertificadoReposo;
use App\Models\ConsentimientoFaltante;
use App\Models\ControlNutricion;
use App\Models\Correlativos;
use App\Models\DiagnosticosDental;
use App\Models\DiagnosticosDentalProfesional;
use App\Models\EmpresasConvenios;
use App\Models\EvolucionPacienteHospital;
use App\Models\EvolucionUrgencia;
use App\Models\ExamenPlanTratamiento;
use App\Models\ExamenesBocaGeneral;
use App\Models\ExamenesDentalDolor;
use App\Models\ExamenesDentalPieza;
use App\Models\ExamenesDentalPiezaHistoria;
use App\Models\ExamenesDentalPiezaPeriod;
use App\Models\ExamenesDentalPeriodoncia;
use App\Models\FormularioFaltante;
use App\Models\Sugerencias;
use App\Models\Ciudad;
use App\Models\CnsTipo;
use App\Models\CnsTipoTemplate;
use App\Models\ContactoEmergencia;
use App\Models\ControlObesidad;
use App\Models\ControlPostQuirurgico;
use App\Models\CuracionesTipo;
use App\Models\DeclaracionEno;
use App\Models\DetalleReceta;
use App\Models\Diabete;
use App\Models\Direccion;
use App\Models\Especialidad;
use App\Models\ExamenEspecialidad;
use App\Models\ExamenEspecialidadImg;
use App\Models\ExamenEspecialidadTemplate;
use App\Models\ExamenEspecialidadTipo;
use App\Models\ExamenesDentalOralRx;
use App\Models\ExamenMedico;
use App\Models\ExamenPPF;
use App\Models\FichaAtencion;
use App\Models\FichaAtencionRayo;
use App\Models\FichaCirugiaDigestivaTipo;
use App\Models\FichaCirugiaGeneral;
use App\Models\FichaCirugiaGeneralAdulto;
use App\Models\FichaCirugiaGeneralTipo;
use App\Models\FichaNeuro;
use App\Models\FichaOtorrino;
use App\Models\FichaOrl;
use App\Models\FichaOtorrinoTipo;
use App\Models\GesRegistros;
use App\Models\Hipertension;
use App\Models\HoraMedica;
use App\Models\InformeMedico;
use App\Models\InsumosTratamientosDental;
use App\Models\Interconsulta;
use App\Models\ImagenesDentalRxPaciente;
use App\Models\ImagenesDentalPaciente;
use App\Models\Laboratorio;
use App\Models\Licencia;
use App\Models\LicenciaPPF;
use App\Models\LugarAtencion;
use App\Models\MarcasImplantes;
use App\Models\EspecieMascota;
use App\Models\Mascota;
use App\Models\PresupuestoMascota;
use App\Models\Paciente;
use App\Models\PacienteContactoEmergencia;
use App\Models\PacienteTriage;
use App\Models\PagosPresupuestoDental;
use App\Models\PedidoInsumos;
use App\Models\PedidoMateriales;
use App\Models\PiezasDentalCoronaProtesis;
use App\Models\PiezaPeriodontograma;
use App\Models\Presentacion;
use App\Models\PresupuestosDental;
use App\Models\Prevision;
use App\Models\Producto;
use App\Models\ProcedimientosPostImplantes;
use App\Models\ProcedimientosImplantesRehab;
use App\Models\ProcedimientosGruposPostImplantes;
use App\Models\Profesional;
use App\Models\PlanTratamientoOtrosProfesionales;
use App\Models\Region;
use App\Models\Responsable;
use App\Models\SolicitudPabellonQuirurgico;
use App\Models\SubTipoEspecialidad;
use App\Models\TratamientosDental;
use App\Models\TipoEspecialidad;
use App\Models\TipoExamen;
use App\Models\User;
use App\Models\UsoPersonal;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\FichaCirugiaDigestivaGeneralAdulto;
use App\Models\FichaDermo;
use App\Models\FichaDermoImg;
use App\Models\FichaGinecoObstetrica;
use App\Models\FichaOft;
use App\Models\FichaOftalmologiaAdulto;
use App\Models\FichaOftBiomicroscopia;
use App\Models\FichaOftBiomicroscopiaTipo;
use App\Models\FichaOftFondoOjo;
use App\Models\FichaOftFondoOjoTipo;
use App\Models\FichaOftTipo;
use App\Models\FichaOrtopedia;
use App\Models\FichaOrtopediaAdulto;
use App\Models\FichaOtrosProfesionales;
use App\Models\FichaPediatriaCns;
use App\Models\FichaPediatriaGeneral;
use App\Models\FichaPediatriaGeneralTipo;
use App\Models\FichaTraumatologia;
use App\Models\FichaTraumatologiaAdulto;
use App\Models\FichaUro;
use App\Models\FichaUroTipo;
use App\Models\GesRegistrosImg;
use App\Models\Instituciones;
use App\Models\LogUsersDevices;
use App\Models\NotificacionConfirmacion;
use App\Models\PacientesDependientes;
use App\Models\ProcedimientosImplantes;
use App\Models\Proveedor;
use App\Models\RecetaAudifono;
use App\Models\RecetaControl;
use App\Models\Recomendacion;
use App\Models\ResultadoExamen;
use App\Models\TipoAntecedente;
use App\Models\TipoInforme;
use App\Models\FichaUrologiaAdulto;
use App\Models\FichaVenereas;
use App\Models\GrupoSanguineo;
use App\Models\OctavoPar;
use App\Models\OdontogramaPaciente;
use App\Models\OftalmoExamenAgudezaVisual;
use App\Models\OftalmoExamenCampoVisual;
use App\Models\OftalmoExamenEstrabismo;
use App\Models\OftalmoExamenMovOculares;
use App\Models\OftalmoExamenNeurologico;
use App\Models\OftalmoExamenPresionOcular;
use App\Models\OftalmoExamenVisionColores;
use App\Models\OrdenTrabajoMenor;
use App\Models\OrdenTrabajoMayor;
use App\Models\ProcedimientosCentro;
use App\Models\RecomendacionDetalle;
use App\Models\VideoConsultaInfo;
use App\Models\TratamientosImplantologia;
use App\Models\TiposReceta;
use App\Models\MaterialesImplantologia;
use Hamcrest\Type\IsNumeric;
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
        $mascota = null;
        $mascota_edad = null;
        $responsable_mascota = null;
        $ficha_atencion_mascota = null;
        if (!empty($hora->id_mascota)) {
            $mascota = Mascota::with('especieMascota')->find($hora->id_mascota);
            if ($mascota && !empty($mascota->fecha_nacimiento)) {
                $mascota_edad = Carbon::parse($mascota->fecha_nacimiento)->age;
            }
            if ($mascota && !$mascota->especieMascota) {
                $especieId = null;
                if (!empty($mascota->especie_id)) {
                    $especieId = $mascota->especie_id;
                } elseif (!empty($mascota->especie) && is_numeric($mascota->especie)) {
                    $especieId = (int) $mascota->especie;
                }
                if ($especieId) {
                    $mascota->setRelation('especieMascota', EspecieMascota::find($especieId));
                }
            }
            if ($mascota) {
                $responsable_mascota = $mascota->Responsable()->first();
                $ficha_atencion_mascota = DB::table('fichas_atenciones')
                    ->where('id_mascota', $mascota->id)
                    ->orderBy('id', 'desc')
                    ->first();
            }
        }

        $necesita_plan_tratamiento = false;
        $tiene_controles = false;
        $ultimoControl = 0;

        /* FMU CONTACTO EMERGENCIA */
        $pacientes_contacto_emergencia = PacienteContactoEmergencia::with('ContactoEmergencia')->where('id_paciente',$paciente->id)->get();

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

        /** FMU ALERGIAS */
        $paciente_alergias = Antecedente::where('id_paciente', $paciente->id)->where('id_tipo_antecedente', 5)->get();

        $pacienteDpendiente = PacientesDependientes::where('id_paciente', $paciente->id)->get()->first();
        $responsable = '';
        if($pacienteDpendiente)
        {
            $responsable = Paciente::find($pacienteDpendiente->id_responsable);
        }

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

		// $examenMedico = ExamenMedico::where('cod_parent', 0)->whereBetween('id',[1,362])->orderby('nombre_examen', 'ASC')->get();
        $examenMedico = ExamenMedico::where('cod_parent', 0)->where('habilitado', 1)->orderby('nombre_examen', 'ASC')->get();
        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();

        // echo json_encode($profesional);

        $profesional_especialidad = '';
        $prof_especialidad = '';
        $prof_tipo_especialidad = '';
        $prof_sub_tipo_especialidad = '';

        if(!empty($profesional->id_especialidad))
            $prof_especialidad = Especialidad::find($profesional->id_especialidad);
        if(!empty($profesional->id_tipo_especialidad))
            $prof_tipo_especialidad = TipoEspecialidad::find($profesional->id_tipo_especialidad);
        if(!empty($profesional->id_sub_tipo_especialidad))
            $prof_sub_tipo_especialidad = SubTipoEspecialidad::find($profesional->id_sub_tipo_especialidad);

        // if( !empty($prof_especialidad) )
        //     $profesional_especialidad .= $prof_especialidad->nombre.' ';
        if( !empty($prof_tipo_especialidad) )
            $profesional_especialidad .= $prof_tipo_especialidad->nombre.' ';
        if( !empty($prof_sub_tipo_especialidad) )
            $profesional_especialidad .= $prof_sub_tipo_especialidad->nombre.'';


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
        $filtro_fichaAtencion = array();
        $filtro_fichaAtencion[] = array('id_paciente', $hora->id_paciente);

        if(!empty($hora->id_ficha_atencion))
            $filtro_fichaAtencion[] = array('id', $hora->id_ficha_atencion);
        $fichaAtencion = FichaAtencion::where($filtro_fichaAtencion)->first();

        /* ANTECEDENTES */
        $antecedentes = Antecedente::where('id_paciente',$paciente->id)->with('users','paciente','tipo_antecendente','profesional')->orderBy('id', 'DESC')->get();
        foreach ($antecedentes as $valor)
        {
            $valor['antecedente_data'] = json_decode($valor['data']);
        }

        $antecedentes_paciente = AntecedentesPaciente::where('id', $paciente->id_antecedente)->first();

        if (isset($antecedentes_paciente))
        {
            $medicamentos_cronicos = AntecedenteMedicamentoCronico::where('id_antecedentes', $paciente->Antecedentes()->first()->id)->get();
            $alergias = AntecedenteAlergiaPaciente::where('id_antecedentes', $paciente->Antecedentes()->first()->id)->get();
            $antecedentes_quirurgicos = SolicitudPabellonQuirurgico::where('id_paciente', $paciente->id)->get();
            $patoligias_cronicas = Antecedente::where('id_tipo_antecedente', 1)->where('id_paciente', $paciente->id)->where('estado', 1)->get();
        }
        else
        {
            $medicamentos_cronicos = [];
            $alergias = [];
            $antecedentes_quirurgicos = [];
            $patoligias_cronicas = [];
        }

        // FICHAS PREVIAS Y FICHA ACTUAL(ACTIVA O NUEVA)
        $fichas = '';
        $id_ficha_atencion = '';
        $fichaAtencion = '';
        $result_fichas = static::cargarInfoFichaBase($hora);

        // echo json_encode($hora);
        // echo '*****************';
        // echo json_encode($result_fichas);

        if($result_fichas->estado == 1)
        {
            // $fichas = (object)$result_fichas->ficha_previas;
            $id_ficha_atencion = $result_fichas->id_ficha_actual_nueva;
            $fichaAtencion = (object)$result_fichas->ficha_actual_nueva;
        }

        // echo  json_encode($result_fichas);
        // exit();

        // CONSULTAS PREVIAS base fichas atencion
        $filtro_previas = array();
        $filtro_previas[] = array('id_paciente', $hora->id_paciente); //3
        $filtro_previas[] = array('confidencial', '0');
        $filtro_previas[] = array('finalizada', 1);
        $filtro_previas[] = array('id_profesional', $profesional->id);
        $fichas = FichaAtencion::where($filtro_previas)->orderBy('id','desc')->get();

        // // FICHA DE ATENCION ACTUAL
        // $filtro_fichaAtencion = array();
        // $filtro_fichaAtencion[] = array('id_paciente', $hora->id_paciente);

        // if(!empty($hora->id_ficha_atencion))
        //     $filtro_fichaAtencion[] = array('id', $hora->id_ficha_atencion);
        $fichaAtencion = FichaAtencion::where($filtro_fichaAtencion)->first();

        if( !empty($fichaAtencion) )
            $id_ficha_atencion = $fichaAtencion->id;

        // 5 realizando
        // 6 realizada
        if ($hora->id_estado != 5 && $hora->id_estado != 6)
        {
            $nueva_ficha_atencion = new FichaAtencion();
            $nueva_ficha_atencion->id_paciente = $paciente->id;
            $nueva_ficha_atencion->id_mascota = $request->id_mascota ?? $hora->id_mascota ?? null;
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

        $receta_control = RecetaControl::orderBy('Descripcion')->get();
        $fichaTipo = array();

        $ruta_blade = '';

        $cns_tipo = '';
        $cns_tipo_template = '';
        $cns_registros = '';

		$examen_tipo = '';

        $placeholder_examen_fisico = '';
        $placeholder_motivo_consulta = '';
        $placeholder_antecedentes = '';
        // Inicializar la variable que contendrá el resultado
        $procedimientoCentroTem = null;

		if($profesional->id_especialidad == 14)
        {
            //urgencia
            $ruta_blade = 'atencion_urgencia.atencion_medica_cirugia_urgencia';
            $fichaTipo = '';
            $examen = '';
            $lista_examen_especial = '';

            /** examenes de la especialidad */
            $examenes_especialidad = '';

            /** examenes radiologicos */
            $examenes_radiologicos = '';

			/** examen_tipo */
			$examen_tipo = '';
        }else

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

            $fichaTipoTipos = FichaOtorrinoTipo::where('id_profesional', $profesional->id)->pluck('tipo')->toArray();
            $fichaTipo = array();
            foreach ($fichaTipoTipos as $key => $value)
            {
                $fichaTipo[$value] = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('tipo', $value)->where('id_profesional', $profesional->id)->get();
            }

            $examen_tipo = ExamenEspecialidadTipo::where('id_sub_tipo_especialidad', $profesional->id_sub_tipo_especialidad)->with('ExamenEspecialidadTemplate')->first();
            $examen = $examen_tipo->ExamenEspecialidadTemplate->cuerpo;
            $lista_examen_especial = '';

            /** examenes de la especialidad */
            $examenes_especialidad = '';
            $examenes_especialidad = ExamenMedico::whereIn('cod_parent',[582])->orderBy('nombre_examen', 'ASC')->get();

            /** examenes radiologicos */
            $examenes_radiologicos = '';
            $examenes_radiologicos = ExamenMedico::whereIn('cod_parent',[355,356,357,358,359,360,361])->orderBy('nombre_examen', 'ASC')->get();
            $placeholder_motivo_consulta = "CONSULTA POR, SINTOMATOLOGIA";
            $placeholder_examen_fisico = "EXAMEN ORL,BIOMICROSCOPIA, RESULTADO DE EXÁMENES ";
            $placeholder_antecedentes = "ANTECEDENTES DE LA ESPECIALIDAD, EXAMENES, CIRUGIAS";
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
            $placeholder_motivo_consulta = "CONSULTA POR, SINTOMATOLOGIA";
            $placeholder_examen_fisico = "EXAMEN UROLÓGICO, RESULTADO DE EXÁMENES ";
            $placeholder_antecedentes = "ANTECEDENTES DE LA ESPECIALIDAD, EXAMENES, CIRUGIAS";

        }
        else if($profesional->id_sub_tipo_especialidad == 19)
        {
            //dermatologia

            $ruta_blade = 'atencion_medica.atencion_medica_dermatologia';
            $fichaTipo = '';
            $examen = '';
            $lista_examen_especial = '';

            /** examenes de la especialidad */
            $examenes_especialidad = '';

            /** examenes radiologicos */
            $examenes_radiologicos = '';
            $placeholder_motivo_consulta = "CONSULTA POR, SINTOMATOLOGIA DERMATOLÓGICA Y GENERAL";
            $placeholder_examen_fisico = "EXAMEN DERMATOLÓGICO, BIOMICROSCOPIA, RESULTADO DE EXÁMENES ";
            $placeholder_antecedentes = "ANTECEDENTES DE LA ESPECIALIDAD, EXAMENES, CIRUGIAS";
        }
		else if($profesional->id_sub_tipo_especialidad == 85)
        {
            //traumatologia
            $ruta_blade = 'atencion_medica.atencion_traumatologia_general';

            $fichaTipo = '';
            $examen = '';
            $lista_examen_especial = '';

            /** examenes de la especialidad */
            $examenes_especialidad = '';

            /** examenes radiologicos */
            $examenes_radiologicos = '';
            $placeholder_motivo_consulta = "CONSULTA POR,TIPO DE ACCIDENTE, SINTOMATOLOGIA TRAUMATOLÓGICA Y GENERAL";
            $placeholder_examen_fisico = "EXAMEN TRAUMATOLÓGICO, RX, RESULTADO DE EXÁMENES ";
            $placeholder_antecedentes = "ANTECEDENTES DE LA ESPECIALIDAD, EXAMENES, CIRUGIAS";
        }

        else if($profesional->id_sub_tipo_especialidad == 58)
        {
            //neurologia
            $ruta_blade = 'atencion_medica.atencion_medica_neurologia';

            $fichaTipo = '';
            $examen = '';
            $lista_examen_especial = '';

            /** examenes de la especialidad */
            $examenes_especialidad = '';

            /** examenes radiologicos */
            $examenes_radiologicos = '';
            $placeholder_motivo_consulta = "CONSULTA POR, SINTOMATOLOGIA NEUROLÓGICA Y GENERAL";
            $placeholder_examen_fisico = "EXAMEN NEUROLÓGICO, RESULTADO DE EXÁMENES ";
            $placeholder_antecedentes = "ANTECEDENTES DE LA ESPECIALIDAD, EXAMENES, CIRUGIAS";
        }
        else if($profesional->id_sub_tipo_especialidad == 59)
        {
            //neurocirugia
            $ruta_blade = 'atencion_medica.atencion_medica_neurocirugia';

            $fichaTipo = '';
            $examen = '';
            $lista_examen_especial = '';

            /** examenes de la especialidad */
            $examenes_especialidad = '';

            /** examenes radiologicos */
            $examenes_radiologicos = '';
            $placeholder_motivo_consulta = "CONSULTA POR, SINTOMATOLOGIA NEUROLÓGICA Y GENERAL";
            $placeholder_examen_fisico = "EXAMEN NEUROLÓGICO, RESULTADO DE EXÁMENES ";
            $placeholder_antecedentes = "ANTECEDENTES DE LA ESPECIALIDAD, EXAMENES, CIRUGIAS";
        }
        else if($profesional->id_sub_tipo_especialidad == 27)
        {
            //gineco obstetricia
            $ruta_blade = 'atencion_gine_obstetricia.atencion_gine_obst_general';

			// $fichaTipo = '';
            $examen = array();
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
            $placeholder_motivo_consulta = "CONSULTA POR, SINTOMATOLOGIA GINECOLÓGICA, OBSTÉTRICA Y GENERAL";
            $placeholder_examen_fisico = "EXAMEN GINECOLÓGICO, RESULTADO DE EXÁMENES ";
            $placeholder_antecedentes = "ANTECEDENTES DE LA ESPECIALIDAD, EXAMENES, CIRUGIAS";

            // CONSULTAS PREVIAS base fichas atencion
            $filtro_previas = array();
            $filtro_previas[] = array('id_paciente', $paciente->id);
            // $filtro_previas[] = array('confidencial', '0');
            // $filtro_previas[] = array('finalizada', 1);
            $filtro_previas[] = array('id_profesional', $profesional->id);
            $fichas = FichaGinecoObstetrica::where($filtro_previas)->orderBy('created_at','asc')->get();
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
            $placeholder_motivo_consulta = "CONSULTA POR, SINTOMATOLOGIA GENERAL";
            $placeholder_examen_fisico = "EXAMEN FÍSICO, RESULTADO DE EXÁMENES ";
            $placeholder_antecedentes = "ANTECEDENTES DE LA ESPECIALIDAD, EXAMENES, CIRUGIAS";

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

            $fichaTipo = '';
            $examen = '';
            $lista_examen_especial = '';

            /** examenes de la especialidad */
            $examenes_especialidad = '';

            /** examenes radiologicos */
            $examenes_radiologicos = '';
        }
        /** MEDICINA INTERNA */
        else if($profesional->id_sub_tipo_especialidad == 44){
            // gastroenterologia
            $ruta_blade = 'atencion_medica.atencion_medica_gastroenterologia';
            $examen = '';
            $lista_examen_especial = '';
            $examen_tipo = ExamenEspecialidadTipo::where('id_sub_tipo_especialidad', $profesional->id_sub_tipo_especialidad)->with('ExamenEspecialidadTemplate')->get();
            foreach ($examen_tipo as $key => $value)
            {
                $examen[$value->ExamenEspecialidadTemplate->alias] = $value->ExamenEspecialidadTemplate->cuerpo;
                $lista_examen_especial .= $value->ExamenEspecialidadTemplate->alias.','.$value->id.','.$value->ExamenEspecialidadTemplate->id.'|';
            }
            $lista_examen_especial = substr($lista_examen_especial, 0, -1);
            $examenes_especialidad = '';
                /** examenes radiologicos */
                $examenes_radiologicos = '';
                $placeholder_motivo_consulta = "CONSULTA POR, SINTOMATOLOGIA GASTROENTEROLÓGICA";
                $placeholder_examen_fisico = "EXAMEN FÍSICO GENERAL Y GASTROENTEROLÓGICO, RESULTADO DE EXÁMENES ";
                $placeholder_antecedentes = "ANTECEDENTES DE LA ESPECIALIDAD, EXAMENES, CIRUGIAS";

        }
          else if($profesional->id_sub_tipo_especialidad == 121){
            // cardiologia
            $ruta_blade = 'atencion_medica.atencion_medica_homeopatia';
            $examen = '';
                $lista_examen_especial = '';
                $examen_tipo = ExamenEspecialidadTipo::where('id_sub_tipo_especialidad', $profesional->id_sub_tipo_especialidad)->with('ExamenEspecialidadTemplate')->get();
                foreach ($examen_tipo as $key => $value)
                {
                    $examen[$value->ExamenEspecialidadTemplate->alias] = $value->ExamenEspecialidadTemplate->cuerpo;
                    $lista_examen_especial .= $value->ExamenEspecialidadTemplate->alias.','.$value->id.','.$value->ExamenEspecialidadTemplate->id.'|';
                }
                $lista_examen_especial = substr($lista_examen_especial, 0, -1);
                $examenes_especialidad = '';
                /** examenes radiologicos */
                $examenes_radiologicos = '';
                $placeholder_motivo_consulta = "CONSULTA POR, SINTOMATOLOGIA EN GENERAL, ETC.";
                $placeholder_examen_fisico = "EXAMEN FÍSICO GENERAL , RESULTADO DE EXÁMENES ";
                $placeholder_antecedentes = "ANTECEDENTES DE LA ESPECIALIDAD,EXPERIENCIA HOMEOPATÍA EXAMENES, CIRUGIAS";
            }
        else if($profesional->id_sub_tipo_especialidad == 122){
            // cardiologia
            $ruta_blade = 'atencion_medica.atencion_medica_cardiologia';
            $examen = '';
                $lista_examen_especial = '';
                $examen_tipo = ExamenEspecialidadTipo::where('id_sub_tipo_especialidad', $profesional->id_sub_tipo_especialidad)->with('ExamenEspecialidadTemplate')->get();
                foreach ($examen_tipo as $key => $value)
                {
                    $examen[$value->ExamenEspecialidadTemplate->alias] = $value->ExamenEspecialidadTemplate->cuerpo;
                    $lista_examen_especial .= $value->ExamenEspecialidadTemplate->alias.','.$value->id.','.$value->ExamenEspecialidadTemplate->id.'|';
                }
                $lista_examen_especial = substr($lista_examen_especial, 0, -1);
                $examenes_especialidad = '';
                /** examenes radiologicos */
                $examenes_radiologicos = '';
                $placeholder_motivo_consulta = "CONSULTA POR, SINTOMATOLOGIA CARDIOVASCULAR, EDEMAS, ETC.";
                $placeholder_examen_fisico = "EXAMEN FÍSICO GENERAL Y CARDIOVASCULAR, RESULTADO DE EXÁMENES ";
                $placeholder_antecedentes = "ANTECEDENTES DE LA ESPECIALIDAD, EXAMENES, CIRUGIAS";
        }else if($profesional->id_sub_tipo_especialidad == 40 ){
            //broncopulmonar
            $ruta_blade = 'atencion_medica.atencion_medica_broncopulmonar';
            $examen = '';
                $lista_examen_especial = '';
                $examen_tipo = ExamenEspecialidadTipo::where('id_sub_tipo_especialidad', $profesional->id_sub_tipo_especialidad)->with('ExamenEspecialidadTemplate')->get();
                foreach ($examen_tipo as $key => $value)
                {
                    $examen[$value->ExamenEspecialidadTemplate->alias] = $value->ExamenEspecialidadTemplate->cuerpo;
                    $lista_examen_especial .= $value->ExamenEspecialidadTemplate->alias.','.$value->id.','.$value->ExamenEspecialidadTemplate->id.'|';
                }
                $lista_examen_especial = substr($lista_examen_especial, 0, -1);
                $examenes_especialidad = '';
                /** examenes radiologicos */
                $examenes_radiologicos = '';
                $placeholder_motivo_consulta = "CONSULTA POR, SINTOMATOLOGIA BRONCOPULMONAR,TOS SECRECIONES, INSUFICIENCIA RESPIRATORIA ETC.";
                $placeholder_examen_fisico = "EXAMEN FÍSICO GENERAL Y BRONCOPULMONAR, RESULTADO DE EXÁMENES ";
                $placeholder_antecedentes = "ANTECEDENTES DE LA ESPECIALIDAD, EXAMENES, CIRUGIAS";

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
            $placeholder_motivo_consulta = "CONSULTA POR, SINTOMATOLOGIA, ETC.";
            $placeholder_examen_fisico = "EXAMEN FÍSICO GENERAL , RESULTADO DE EXÁMENES ";
            $placeholder_antecedentes = "ANTECEDENTES DE LA ESPECIALIDAD, EXAMENES, CIRUGIAS";
        }
        else if($profesional->id_sub_tipo_especialidad == 11 )
        {
            $examen = array();
            // Cirugía digestiva
            $ruta_blade = 'atencion_medica.atencion_medica_cirugia_digestiva_general';
            // Obtener el valor de id_procedimiento
            $idProcedimiento = $hora->id_procedimiento;

            // Verificar si el valor contiene barras verticales (caso múltiples IDs)
            if (strpos($idProcedimiento, '|') !== false) {
                // Convertir la cadena en un array de IDs
                $array_id_procedimiento = explode('|', $idProcedimiento);

                // Obtener todos los procedimientos que coincidan con los IDs
                $procedimientoCentroTem = ProcedimientosCentro::whereIn('id', $array_id_procedimiento)->get();
            } else {
                // Caso de un solo ID (número)
                $procedimientoCentroTem = ProcedimientosCentro::where('id',$idProcedimiento)->get();
            }

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


            /** examenes radiologicos */
            $examenes_radiologicos = '';
            $placeholder_motivo_consulta = "CONSULTA POR, SINTOMATOLOGIA, ETC.";
            $placeholder_examen_fisico = "EXAMEN FÍSICO GENERAL , RESULTADO DE EXÁMENES ";
            $placeholder_antecedentes = "ANTECEDENTES DE LA ESPECIALIDAD, EXAMENES, CIRUGIAS";

        }
        else if($profesional->id_sub_tipo_especialidad == 12 )
        {
            $examen = array();

            // Cirugía Gástrica
            $ruta_blade = 'atencion_medica.atencion_medica_cirugia_digestiva_alta';

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
            $placeholder_motivo_consulta = "CONSULTA POR, SINTOMATOLOGIA, ETC.";
            $placeholder_examen_fisico = "EXAMEN FÍSICO GENERAL , RESULTADO DE EXÁMENES ";
            $placeholder_antecedentes = "ANTECEDENTES DE LA ESPECIALIDAD, EXAMENES, CIRUGIAS";
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
            $placeholder_motivo_consulta = "CONSULTA POR, SINTOMATOLOGIA, ETC.";
            $placeholder_examen_fisico = "EXAMEN FÍSICO GENERAL , RESULTADO DE EXÁMENES ";
            $placeholder_antecedentes = "ANTECEDENTES DE LA ESPECIALIDAD, EXAMENES, CIRUGIAS";
        }
        else if($profesional->id_sub_tipo_especialidad == 66 )
        {
            // Cirugía y Traumatología Pediatrica
            $ruta_blade = 'atencion_pediatrica.atencion_pediatrica_cirugia';

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

            $fichaTipo = '';
            $examen = '';
            $lista_examen_especial = '';

            /** examenes de la especialidad */
            $examenes_especialidad = '';

            /** examenes radiologicos */
            $examenes_radiologicos = '';
            $necesita_plan_tratamiento = true;
            $controlExistente = PlanTratamientoOtrosProfesionales::where('id_profesional', $hora->id_profesional)
            ->where('id_paciente', $hora->id_paciente)
            ->where('estado',1)
            ->first();
     
            if ($controlExistente) {
                $tiene_controles = true;
                if($controlExistente->sesion_actual == $controlExistente->numero_sesiones){
                    $ultimoControl = 1;
                }else{
                    $ultimoControl = 0;
                }
            }else{
                $tiene_controles = false;
            }
            
        }
        else if($profesional->id_tipo_especialidad == 12 )
        {
            // ATENCIÓN SIQUIATRIA
            // 80 Psiquiatría General
            // 81 Adicciones

            $ruta_blade = 'atencion_medica.atencion_medica_siquiatria';

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

            $fichaTipo = '';
            $examen = '';
            $lista_examen_especial = '';

            /** examenes de la especialidad */
            $examenes_especialidad = '';

            /** examenes radiologicos */
            $examenes_radiologicos = '';

            $necesita_plan_tratamiento = true;
            $controlExistente = PlanTratamientoOtrosProfesionales::where('id_profesional', $hora->id_profesional)
            ->where('id_paciente', $hora->id_paciente)
            ->where('estado',1)
            ->first();
     
            if ($controlExistente) {
                $tiene_controles = true;
                if($controlExistente->sesion_actual == $controlExistente->numero_sesiones){
                    $ultimoControl = 1;
                }else{
                    $ultimoControl = 0;
                }
            }else{
                $tiene_controles = false;
            }
        }
        // else if(($profesional->id_tipo_especialidad == 54 || $profesional->id_tipo_especialidad == 55)  && empty($profesional->id_sub_tipo_especialidad))
        else if(($profesional->id_tipo_especialidad == 54 )  && empty($profesional->id_sub_tipo_especialidad))
        {
            // 54 - TECNOLOGO ORL (tecnologo)
            // 55 - EXAMENES ORL (fonoaudiologo)
            $ruta_blade = 'atencion_otros_prof.atencion_tecn_orl';

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
         else if($profesional->id_especialidad == 16)
        {
            // QUIROPRAXIA
            $ruta_blade = 'atencion_medica.atencion_quiropraxia';
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
            /** medicos */
            if($profesional->id_especialidad == 1)
            {
                $ruta_blade = 'atencion_medica.atencion_medica_general';
            }
            /** odontologia */
            else if($profesional->id_especialidad == 2)
            {
                $ruta_blade = 'atencion_odontologica.atencion_odonto_gral';
            }
            /** kinesiologia */
            else if($profesional->id_especialidad == 3)
            {
                $ruta_blade = 'atencion_otros_prof.atencion_kine';
            }
            /** fonoaudiologia */
            else if($profesional->id_especialidad == 4)
            {
                if($profesional->id_tipo_especialidad == 55)
                {
                    // Obtener el valor de id_procedimiento
                    $idProcedimiento = $hora->id_procedimiento;

                    // Verificar si el valor contiene barras verticales (caso múltiples IDs)
                    if (strpos($idProcedimiento, '|') !== false) {
                        // Convertir la cadena en un array de IDs
                        $array_id_procedimiento = explode('|', $idProcedimiento);

                        // Obtener todos los procedimientos que coincidan con los IDs
                        $procedimientoCentroTem = ProcedimientosCentro::whereIn('id', $array_id_procedimiento)->get();
                    } else {
                        // Caso de un solo ID (número)
                        $procedimientoCentroTem = ProcedimientosCentro::where('id',$idProcedimiento)->get();
                    }


                    $ruta_blade = 'app.laboratorio.atencion_prof_laboratorio_especialidades';


                    // $procedimientoCentroTem = ProcedimientosCentro::find($hora->id_procedimiento);
                    // switch ($procedimientoCentroTem->otros) {
                    //     case '1':
                    //         $ruta_blade = 'app.laboratorio.atencion_prof_laboratorio_especialidades';
                    //         break;
                    //     case '2':
                    //         // $ruta_blade = 'atencion_otros_prof.atencion_fono_octavopar';
                    //         $ruta_blade = 'app.laboratorio.atencion_fono_octavopar';
                    //         break;

                    //     default:
                    //         $ruta_blade = 'app.laboratorio.atencion_prof_laboratorio_especialidades';
                    //         break;
                    // }

                    $fichaTipo = '';
                    $examen = '';
                    $lista_examen_especial = '';

                    /** examenes de la especialidad */
                    $examenes_especialidad = '';

                    /** examenes radiologicos */
                    $examenes_radiologicos = '';

                    $hora->id_profesional = $profesional->id;
                    $hora->save();
                }
                else
                {
                    // $ruta_blade = 'atencion_otros_prof.atencion_fonoaudiologo';
                    $ruta_blade = 'atencion_otros_prof.atencion_fono';
                }
            }
            /** nutricion */
            else if($profesional->id_especialidad == 5)
            {
                $ruta_blade = 'atencion_otros_prof.atencion_nutricion';
            }
            /** psicologia */
            else if($profesional->id_especialidad == 6)
            {
                $ruta_blade = 'atencion_otros_prof.atencion_psicologia';
            }
            /** matrona */
            else if($profesional->id_especialidad == 7)
            {
                $ruta_blade = 'atencion_otros_prof.atencion_matrona';
            }
            /** enfermera universitaria */
            else if($profesional->id_especialidad == 8)
            {
                $ruta_blade = 'atencion_otros_prof.atencion_enfermeria';
            }
            /** terapia ocupacional */
            else if($profesional->id_especialidad == 9)
            {
                $ruta_blade = 'atencion_otros_prof.atencion_terapia_ocup';
            }
            /** tecnico enfermeria */
            else if($profesional->id_especialidad == 10)
            {
                $ruta_blade = 'atencion_otros_prof.atencion_tens';
            }
            /** tecnologo medico */
            else if($profesional->id_especialidad == 11)
            {
                /** TECNOLOGO RAYOS */
                if($profesional->id_tipo_especialidad == 59)
                {
                    // Obtener el valor de id_procedimiento
                    $idProcedimiento = $hora->id_procedimiento;

                    // Verificar si el valor contiene barras verticales (caso múltiples IDs)
                    if (strpos($idProcedimiento, '|') !== false) {
                        // Convertir la cadena en un array de IDs
                        $array_id_procedimiento = explode('|', $idProcedimiento);

                        // Obtener todos los procedimientos que coincidan con los IDs
                        $procedimientoCentroTem = ProcedimientosCentro::whereIn('id', $array_id_procedimiento)->get();
                    } else {
                        // Caso de un solo ID (número)
                        $procedimientoCentroTem = ProcedimientosCentro::where('id',$idProcedimiento)->get();
                    }

                    $ruta_blade = 'app.laboratorio.atencion_prof_laboratorio_especialidades_rayox';
                }
                else
                {
                    $ruta_blade = 'atencion_otros_prof.atencion_tecn_orl';
                }
            }
            else
            {
                $ruta_blade = 'atencion_otros_prof.atencion_general';
            }
            $fichaTipo = '';
            $examen = '';
            $lista_examen_especial = '';

            /** examenes de la especialidad */
            $examenes_especialidad = '';

            /** examenes radiologicos */
            $examenes_radiologicos = '';
        }

        /** EXAMENES DE ESPECIALIDAD REALIZADOS */
        $examenes_especialidad_realizados = ExamenEspecialidad::select('id', 'id_tipo', 'id_template', 'id_examen_tipo', 'id_sub_tipo_especialidad', 'id_ficha_atencion', 'id_ficha_especialidad', 'id_paciente', 'id_profesional', 'id_asistente', 'nombre', 'revisado', 'estado')
                                                            // ->with(['HoraMedica' => function($query){
                                                            //     $query->select('id', 'id_ficha_atencion', 'fecha_realizacion_consulta', 'id_estado');
                                                            // }])
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


        foreach ($examenes_especialidad_realizados as $key_ex_esp_realizado => $value_ex_esp_realizado)
        {
            if($value_ex_esp_realizado->id_sub_tipo_especialidad == 27)
            {
                $filtro_h_ex_esp_ral = array();
                $filtro_h_ex_esp_ral[] = array('id_ficha_otros_prof', $value_ex_esp_realizado->id_ficha_especialidad);
                $filtro_h_ex_esp_ral[] = array('id_profesional', $value_ex_esp_realizado->id_profesional);
                $hora_medica = HoraMedica::where($filtro_h_ex_esp_ral)->get()->first();
                $examenes_especialidad_realizados[$key_ex_esp_realizado]->HoraMedica = $hora_medica;
            }
            else if($profesional->id_especialidad != 1)
            {
                $filtro_h_ex_esp_ral = array();
                $filtro_h_ex_esp_ral[] = array('id_ficha_otros_prof', $value_ex_esp_realizado->id_ficha_especialidad);
                $filtro_h_ex_esp_ral[] = array('id_profesional', $value_ex_esp_realizado->id_profesional);
                $hora_medica = HoraMedica::where($filtro_h_ex_esp_ral)->get()->first();
                $examenes_especialidad_realizados[$key_ex_esp_realizado]->HoraMedica = $hora_medica;
            }
            else
            {
                $filtro_h_ex_esp_ral = array();
                $filtro_h_ex_esp_ral[] = array('id_ficha_atencion', $value_ex_esp_realizado->id_ficha_atencion);
                $filtro_h_ex_esp_ral[] = array('id_profesional', $value_ex_esp_realizado->id_profesional);
                $hora_medica = HoraMedica::where($filtro_h_ex_esp_ral)->get()->first();
                $examenes_especialidad_realizados[$key_ex_esp_realizado]->HoraMedica = $hora_medica;
            }
        }
        // echo json_encode($examenes_especialidad_realizados);
        // die();
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
        $especialidad = Especialidad::where('estado',1)->get();
        $sub_tipo_especialidad = SubTipoEspecialidad::where('estado',1)->get();

		$tipo_antecedente = TipoAntecedente::all();


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
        $lista_recetas = Recomendacion::join('fichas_atenciones', 'recomendacion.atencion', '=', 'fichas_atenciones.id')
            ->whereDate('recomendacion.created_at', '>=', date("Y-m-d", strtotime($fecha_actual . "- 1 week")))
            ->where('fichas_atenciones.id_paciente', $paciente->id)
            ->pluck('recomendacion.id')
            ->toArray();
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

        $licencia = Licencia::where('id_ficha_atencion', $id_ficha_atencion)->first();

        /** ULTIMA LICENCIA DEL PACIENTE */
        $filtro_ultima_lic = array();
        $filtro_ultima_lic[] = array('id_ficha_atencion','<>', $id_ficha_atencion);
        $filtro_ultima_lic[] = array('id_paciente', $paciente->id);
        $ultima_licencia = Licencia::where($filtro_ultima_lic)->first();

        // $info_video = '';
        // if($hora->tipo_hora_medica == 'T')
        // {
        //     $filtro_v = array();
        //     $filtro_v[] = array('id_hora_atencion', $hora->id);
        //     $filtro_v[] = array('id_profesional', $hora->id_profesional);
        //     $filtro_v[] = array('id_paciente', $hora->id_paciente);
        //     $info_video = VideoConsultaInfo::where($filtro_v)->first();
        // }

        /** INFO ACOMPAÑANTE */
        $responsables = '';
        $acompanantes = '';
        if(\Carbon\Carbon::parse($paciente->fecha_nac)->age < 18)
        {
            if($hora->acomp_representante == 1)
            {
                $filtro_list_PD = array();
                $filtro_list_PD[] = array('estado', 1);
                $filtro_list_PD[] = array('id_paciente', $paciente->id);
                $responsables_relacion = PacientesDependientes::where($filtro_list_PD)->pluck('id_responsable')->toArray();
                if($responsables_relacion)
                {
                    $responsables = Paciente::whereIn('id', $responsables_relacion)->get();
                }
            }

            if($hora->acomp_acompanante == 1)
            {
                if(!empty($hora->acomp_lista))
                {
                    $lista_acompanante = json_decode($hora->acomp_lista);
                    $acompanantes = Paciente::whereIn('id', $lista_acompanante)->get();
                }
            }
        }
        /** CIERRE INFO ACOMPAÑANTE */
        $tipos_receta = TiposReceta::all();
        $detalle_receta_controlador = new DetalleRecetaController();
        $recetas = $detalle_receta_controlador->dameTodoDetalleRecetaPaciente($paciente['id']);

        $adm_hospital_controlador = new AdministradorHospitalController();
        $procedimientos = $adm_hospital_controlador->dameProcedimientosPaciente($paciente->id);
        $curaciones = $adm_hospital_controlador->dameCuracionesPaciente($paciente->id);
        $examenControlador = new ExamenMedicoController();
        $examenes_solicitados = $examenControlador->dame_examenes_solicitados($paciente->id, $id_ficha_atencion);
        
        $controles_ciclo = $this->dameEvolucionesPacienteHosp($paciente->id);
        $examenes_dental = $this->dameExamenesPiezaDentalDolor($paciente->id, $profesional->id_tipo_especialidad);
        $examenes_dental_end = $this->dameExamenesPiezaDentalEndDolor($paciente->id);

        $examenes_dental_odontopediatria = $this->dameExamenesPiezaDentalPiezaOdontop($paciente->id);

        if(count($controles_ciclo) == 0)
        {
            // si no hay ciclos de control se inicia en 1 para manejar el id en la vista
            $contador_div_evaluaciones = 1;
        }else{
            // si hay ciclos de control se suma 1 para manejar el id en la vista
            $contador_div_evaluaciones = count($controles_ciclo) + 1;
        }

        foreach($controles_ciclo as $cc)
        {
            $cc->datos_evolucion = json_decode($cc->datos_evolucion);
        }


        if(count($examenes_dental) == 0)
        {
            // si no hay ciclos de control se inicia en 1 para manejar el id en la vista
            $contador_div_examenes = 1;
        }else{
            // si hay ciclos de control se suma 1 para manejar el id en la vista
            $contador_div_examenes = count($examenes_dental) + 1;
        }
        $examenes_rx_oral = $this->dameExamenesPiezaDentalOraxRx($paciente->id, $profesional->id_tipo_especialidad);

        $examenes_rx_oral_endodoncia = $this->dameExamenesPiezaDentalOraxRxEnd($paciente->id, $id_ficha_atencion);
        foreach($examenes_rx_oral_endodoncia as $ero)
        {
            $ero->numero_piezas = json_decode($ero->numero_piezas);
        }
        $examenes_rx_oral_odontop = $this->dameExamenesPiezaDentalOraxRxOdontop($paciente->id, $profesional->id_tipo_especialidad);
        $imagenes = $this->dameInfoImagenesDentalPaciente($paciente->id,'gral', $id_ficha_atencion);
        $imagenes_preimplante = $this->dameInfoImagenesDentalPaciente($paciente->id,'implantologia',$id_ficha_atencion);
        $imagenes_periodoncia = $this->dameInfoImagenesDentalPaciente($paciente->id,'periodoncica',$id_ficha_atencion);
        $examenes_pieza = $this->dameExamenesPiezaDentalPieza($paciente->id, $profesional->id_tipo_especialidad, $id_ficha_atencion);

        $examenes_pieza_end = $this->dameExamenesPiezaDentalPiezaEnd($paciente->id, $profesional->id_tipo_especialidad, $id_ficha_atencion);

        $biopsias = $this->dameBiopsiasDentalPaciente($paciente->id);

        $maxilar_superior_gral_tratamiento = $this->dameMaxilarSuperiorGeneralTratamiento($paciente->id, $profesional->id_tipo_especialidad);
        $maxilar_superior_gral_diagnostico = $this->dameMaxilarSuperiorGeneralDiagnostico($paciente->id, $profesional->id_tipo_especialidad);
        $maxilar_inferior_gral_tratamiento = $this->dameMaxilarInferiorGeneralTratamiento($paciente->id, $profesional->id_tipo_especialidad);
        $maxilar_inferior_gral_diagnostico = $this->dameMaxilarInferiorGeneralDiagnostico($paciente->id, $profesional->id_tipo_especialidad);
        $boca_completa_gral_tratamiento = $this->dameBocaCompletaGeneralTratamiento($paciente->id, $profesional->id_tipo_especialidad);
        $boca_completa_gral_diagnostico = $this->dameBocaCompletaGeneralDiagnostico($paciente->id, $profesional->id_tipo_especialidad);
        $maxilar_inferior_gral_tratamientos_endo = $this->dameMaxilarInferiorGeneralTratamientoEndodoncia($paciente->id, $profesional->id_tipo_especialidad);
        $maxilar_inferior_gral_diagnosticos_endo = $this->dameMaxilarInferiorGeneralDiagnosticoEndodoncia($paciente->id, $profesional->id_tipo_especialidad);
        $maxilar_superior_gral_tratamientos_endo = $this->dameMaxilarSuperiorGeneralTratamientoEndodoncia($paciente->id, $profesional->id_tipo_especialidad);
        $maxilar_superior_gral_diagnosticos_endo = $this->dameMaxilarSuperiorGeneralDiagnosticoEndodoncia($paciente->id, $profesional->id_tipo_especialidad);
        $boca_completa_gral_tratamiento_endo = $this->dameCompletaEndoTratamiento($paciente->id, $profesional->id_tipo_especialidad);
        $boca_completa_gral_diagnostico_endo = $this->dameCompletaEndoDiagnostico($paciente->id, $profesional->id_tipo_especialidad);

        $valores_tratamientos = $this->dameValores($paciente->id, $id_ficha_atencion, $request->lugar_atencion_id, $profesional->id_tipo_especialidad);
        
        $primer_cuadrante = $this->dameExamenesPiezaDentalPiezaPrimerCuadrante($paciente->id,'adulto', $profesional->id_tipo_especialidad);
        $segundo_cuadrante = $this->dameExamenesPiezaDentalPiezaSegundoCuadrante($paciente->id,'adulto', $profesional->id_tipo_especialidad);
        $tercer_cuadrante = $this->dameExamenesPiezaDentalPiezaTercerCuadrante($paciente->id,'adulto', $profesional->id_tipo_especialidad);
        $cuarto_cuadrante = $this->dameExamenesPiezaDentalPiezaCuartoCuadrante($paciente->id,'adulto', $profesional->id_tipo_especialidad);
        $quinto_cuadrante = $this->dameExamenesPiezaDentalPiezaQuintoCuadrante($paciente->id,'adulto', $profesional->id_tipo_especialidad);
        $sexto_cuadrante = $this->dameExamenesPiezaDentalPiezaSextoCuadrante($paciente->id,'adulto', $profesional->id_tipo_especialidad);

        $primer_cuadrante_endodoncia = $this->dameExamenesPiezaDentalPiezaPrimerCuadrante($paciente->id,'endodoncia', $profesional->id_tipo_especialidad);
        $segundo_cuadrante_endodoncia = $this->dameExamenesPiezaDentalPiezaSegundoCuadrante($paciente->id,'endodoncia', $profesional->id_tipo_especialidad);
        $tercer_cuadrante_endodoncia = $this->dameExamenesPiezaDentalPiezaTercerCuadrante($paciente->id,'endodoncia', $profesional->id_tipo_especialidad);
        $cuarto_cuadrante_endodoncia = $this->dameExamenesPiezaDentalPiezaCuartoCuadrante($paciente->id,'endodoncia', $profesional->id_tipo_especialidad);
        $quinto_cuadrante_endodoncia = $this->dameExamenesPiezaDentalPiezaQuintoCuadrante($paciente->id,'endodoncia', $profesional->id_tipo_especialidad);
        $sexto_cuadrante_endodoncia = $this->dameExamenesPiezaDentalPiezaSextoCuadrante($paciente->id,'endodoncia', $profesional->id_tipo_especialidad);

        $primer_cuadrante_infantil = $this->dameExamenesPiezaDentalPiezaPrimerCuadrante($paciente->id,'infantil', $profesional->id_tipo_especialidad);
        $segundo_cuadrante_infantil = $this->dameExamenesPiezaDentalPiezaSegundoCuadrante($paciente->id,'infantil', $profesional->id_tipo_especialidad);
        $tercer_cuadrante_infantil = $this->dameExamenesPiezaDentalPiezaTercerCuadrante($paciente->id,'infantil', $profesional->id_tipo_especialidad);
        $cuarto_cuadrante_infantil = $this->dameExamenesPiezaDentalPiezaCuartoCuadrante($paciente->id,'infantil', $profesional->id_tipo_especialidad);
        $quinto_cuadrante_infantil = $this->dameExamenesPiezaDentalPiezaQuintoCuadrante($paciente->id,'infantil', $profesional->id_tipo_especialidad);
        $sexto_cuadrante_infantil = $this->dameExamenesPiezaDentalPiezaSextoCuadrante($paciente->id,'infantil', $profesional->id_tipo_especialidad);
        $septimo_cuadrante_infantil = $this->dameExamenesPiezaDentalPiezaSeptimoCuadrante($paciente->id,'infantil', $profesional->id_tipo_especialidad);
        $octavo_cuadrante_infantil = $this->dameExamenesPiezaDentalPiezaOctavoCuadrante($paciente->id,'infantil', $profesional->id_tipo_especialidad);

        $todos = $this->dameTratamientosBocaGeneral(
            $id_ficha_atencion
        );
        
        $tratamientos_dentales = DiagnosticosDental::where('tipo_examen',2)->orWhere('tipo_examen',3)->get();
    
        if($hora->id_presupuesto != 0){
            $presupuesto_dental = PresupuestosDental::where('id', $hora->id_presupuesto)->first();
            if($presupuesto_dental){
                $id_ficha_atencion = $presupuesto_dental->id_ficha_atencion;
                $id_ficha = $presupuesto_dental->id_ficha_atencion;
            }else{
                $id_ficha = $id_ficha_atencion;
            }
            
        }else{
            $presupuesto_dental = PresupuestosDental::where('id_ficha_atencion', $id_ficha_atencion)->first();
            $id_ficha = $id_ficha_atencion;
        }

        $odontograma = $this->dameOdontogramaPaciente($paciente->id, $id_ficha, $request->lugar_atencion_id, $profesional->id_tipo_especialidad,null);
        $odontograma_historial = $this->dameOdontogramaPacienteHistorial($paciente->id);
       
        $paciente->edad = Carbon::parse($paciente->fecha_nac)->age;

        if($paciente->edad >= 18){
            $paciente->es_adulto = true;
        }else{
            $paciente->es_adulto = false;
        }

        $diagnosticos_dentales = TratamientosDental::where('estado',1)->get();


        
        /** EXAMEN OCTAVO PAR */
        $reg_octavo_par = OctavoPar::where('id_paciente', $paciente->id)->get();
        /** EXAMENES EVALUACION PRE IMPLANTE DENTAL  */
        $examenes_preimplante = $this->dameHistorialDentalImpl($paciente->id,'impl');

        $examenes_period = $this->dameHistorialDentalImpl($paciente->id,'period');

        $examenes_period_period = $this->dameHistorialDentalPeriod($paciente->id);

        $odontograma_especialidad = $this->dameOdontogramaPaciente($paciente->id, $id_ficha, $request->lugar_atencion_id, $profesional->id_tipo_especialidad);

        $insumos_tratamientos = $this->dame_insumos_tratamiento($paciente->id, $id_ficha);

        $insumos_bodega = $this->dame_insumos_bodega($id_ficha);


        $examenes_tto_implantes = $this->dameProcedimientosImplantes($paciente->id, $profesional->id, $id_ficha);
        
        $examenes_tto_rehab_implantes = $this->dameProcedimientosImplantesRehab($paciente->id, $profesional->id, $id_ficha);
     
        $examenes_post_implantes = $this->dameProcedimientosImplantes($paciente->id, $profesional->id,$id_ficha,'post');

        $examenes_post_implantes_grupos = $this->dameProcedimientosGruposImplantes($paciente->id, $profesional->id,'post');

        //return $examenes_post_implantes_grupos;

        $examenes_piezas_pfu = $this->dameProcedimientosCoronaProtesis($paciente->id, $profesional->id, $id_ficha, 'pfu');

        $examenes_piezas_pfp = $this->dameProcedimientosCoronaProtesis($paciente->id, $profesional->id, $id_ficha, 'pfp');

        if($presupuesto_dental){
            $ordenes_tm = $this->dameOrdenesTrabajoMenor($paciente->id, $profesional->id, $presupuesto_dental->id, $id_ficha);
            $ordenes_tmy = $this->dameOrdenesTrabajoMayor($paciente->id, $profesional->id, $presupuesto_dental->id, $id_ficha);
        }else{
            $ordenes_tm = [];
            $ordenes_tmy = [];
        }
        

        $correlativo_otm = $this->dame_correlativo('Orden Trabajo Menor');

        $proveedores = $this->dame_proveedores($request->lugar_atencion_id);

        $bodegas = $this->dame_bodegas($request->lugar_atencion_id);

        // return $presupuesto_dental;

        $tratamientos_implantologia = TratamientosImplantologia::orderBy('descripcion','asc')->get();

        $materiales_implantologia = MaterialesImplantologia::orderBy('descripcion','asc')->get();

        $laboratorios = Laboratorio::where('id_lugar_atencion', $request->lugar_atencion_id)->get();
        
        $marcas_implantes = MarcasImplantes::all();

        $pagos_tratamientos_dentales = PagosPresupuestoDental::where('id_ficha_atencion', $id_ficha)->get();

        $valores_tratamientos = $this->dameValores($paciente->id, $id_ficha, $request->lugar_atencion_id, $profesional->id_tipo_especialidad);

        $total_abonado = 0;
        foreach($pagos_tratamientos_dentales as $p){
            $total_abonado += intval($p->total);
        }

        $suma_presupuesto = $valores_tratamientos[0] + $valores_tratamientos[1] + $valores_tratamientos[2] + $valores_tratamientos[3];

        $valor_insumos = $valores_tratamientos[2];

        // Inicializamos el resto en lo que se pagó:
        $resto_insumos = $total_abonado;

        foreach ($insumos_tratamientos as $i) {
            // Si tu modelo no tiene ya el subtotal, lo calculas:
            $valor_insumo = intval($i->cantidad) * intval($i->valor);
            // — O si ya tienes $i->total, simplemente:
            // $valor_insumo = intval($i->total);

            if ($resto_insumos >= $valor_insumo) {
                // Hay dinero suficiente para cubrir este insumo por completo
                $i->estado_pago = 'ok';
                $resto_insumos -= $valor_insumo;

            } elseif ($resto_insumos > 0 && $resto_insumos < $valor_insumo) {
                // Hay algo de dinero, pero no para cubrirlo entero
                $i->estado_pago = 'incompleto';
                // Si prefieres no dejar resto negativo, lo pones a 0:
                $resto_insumos = 0;

            } else {
                // Ya no queda dinero
                $i->estado_pago = 'error';
            }

            // Opcional: guardar cuánto quedaba después de este insumo
            $i->resto = $resto_insumos;
            // Y si quieres almacenar pagado/insumo para la vista:
            $i->total_pagado = $total_abonado;
            // $i->total_insumos = /* aquí el total de todos los insumos si lo necesitas */;

            // Finalmente, si vas a persistir:
            // $i->save();
        }

        $total_abonado_sin_insumos = $total_abonado - $valor_insumos;
        $valor_odontograma = $valores_tratamientos[1];

        $total_piezas_odontograma = count($odontograma);
        $resto = $total_abonado_sin_insumos;

        foreach($odontograma as $o){
            if($o->presupuesto == 1){
                if($resto > 0 && $resto >= intval($o->valor)){
                    $o->estado_pago = 'ok';
                    $o->clase = 'bg-success';
                    $resto -= intval($o->valor);


                }else if($resto > 0 && $resto <= intval($o->valor)){
                    $o->estado_pago = 'incompleto';
                    $o->clase = 'bg-warning';
                    $resto = 0;

                }else if($resto <= 0){
                    $o->estado_pago = 'error';
                    $o->clase = 'bg-danger';

                }
                $o->resto = $resto; // asignas el valor final del resto
            }


        }

        foreach($todos as $o){
            if($o->presupuesto == 1){
                $valor = intval($o->valor);
                if ($resto >= $valor) {
                    $o->estado_pago = 'ok';
                    $o->clase = 'bg-success';
                    $resto -= $valor;
                } elseif ($resto > 0) {
                    $o->estado_pago = 'incompleto';
                    $o->clase = 'bg-warning';
                    $resto = 0;
                } else {
                    $o->estado_pago = 'error';
                    $o->clase = 'bg-danger';
                }
                $o->resto = $resto; // asignas el valor final del resto
            }
        }


        $convenio = EmpresasConvenios::where('nombre_convenio','LIKE',$paciente->prevision->nombre)->first();
        if($convenio){
            $paciente->info_convenio = $convenio;
        }else{
            $paciente->info_convenio = null;
        }

        $convenios_empresas = EmpresasConvenios::where('id_profesional',$profesional->id)->get();
        $convenios_prevision = EmpresasConvenios::select('empresas_convenios.*','tipoproducto_convenios.descripcion')
                                                    ->leftjoin('tipoproducto_convenios','empresas_convenios.id_convenio','tipoproducto_convenios.id')
                                                    ->where('empresas_convenios.id_empresa',null)
                                                    ->where('empresas_convenios.id_profesional', $profesional->id)
                                                    ->get();

        $hoy = Carbon::now()->toDateString(); // Se usa toDateString() para comparar solo la fecha

        $proxima_fecha_atencion = HoraMedica::where('fecha_consulta', '>', $hoy)
            ->where('id_paciente',$paciente->id)
            ->where('id_profesional', $profesional->id)
            ->where('id_estado',1)
            ->whereNotNull('id_ficha_atencion')
            ->orderBy('fecha_consulta', 'asc') // Ordena por la fecha más cercana
            ->first();
        if($proxima_fecha_atencion){
            $hora_inicio_fecha_atencion = $proxima_fecha_atencion->hora_inicio;
            $hora_fin_fecha_atencion = $proxima_fecha_atencion->hora_termino;
            $proxima_fecha_atencion = $proxima_fecha_atencion->fecha_consulta;

        }

        $epc = new EscritorioProfesional;
        $tons_dental = $epc->dame_relaciones_tons($profesional->id);
        
        if($profesional->id_tipo_especialidad == 18){
            $url_tratamientos_autocomplete = "{{ route('dental.getDiagnosticoDental') }}";
        }else if($profesional->id_tipo_especialidad == 16){
            $url_tratamientos_autocomplete = "{{ route('dental.getTratamientoImplantologia') }}";
        }else{
            $url_tratamientos_autocomplete = "{{ route('dental.getDiagnosticoDental') }}";
        }

        $piezas_periodonto = ExamenesDentalPeriodoncia::where('id_ficha_atencion', $id_ficha_atencion)->get();
        
        $examenes_plan_tratamiento = ExamenPlanTratamiento::where('id_ficha_atencion', $id_ficha_atencion)->where('tipo_examen',1)->get();
        $examenes_plan_tratamiento_rx = ExamenPlanTratamiento::where('id_ficha_atencion', $id_ficha_atencion)->where('tipo_examen',2)->get();
        $examenes_plan_tratamiento_broncoscopia = ExamenPlanTratamiento::where('id_ficha_atencion', $id_ficha_atencion)->where('tipo_examen',3)->get();
        $examenes_plan_tratamiento_otros = ExamenPlanTratamiento::where('id_ficha_atencion', $id_ficha_atencion)->where('tipo_examen',4)->get();

        $comunas_contacto_emer = $this->dame_comunas_contacto_emergencia($paciente->id);
        $paciente->comunas_contacto_emer = $comunas_contacto_emer;

        $discapacidades = Antecedente::where('id_paciente', $paciente->id)->where('id_tipo_antecedente',8)->where('estado',1)->get();
        if(count($discapacidades) > 0){
            foreach($discapacidades as $d){
                $data = json_decode($d->data);
                $d->nombre = $data->nombre;
            }
        }

		/** EXAMENES DE RADIOLOGIA */
        $filtro_rayo = array();
        $filtro_rayo[] = array('estado', 1);
        $filtro_rayo[] = array('estado_informe', 1);
        $filtro_rayo[] = array('estado_archivo', 1);
        $filtro_rayo[] = array('id_paciente', $paciente->id);
        $reg_exam_rayo = FichaAtencionRayo::where($filtro_rayo)->orderBy('created_at', 'DESC')->get();

        if($reg_exam_rayo && $procedimientoCentroTem == '')
        {
            foreach ($reg_exam_rayo as $key_ry => $value_ry)
            {
                $idProcedimiento = $value_ry->id_procedimiento;

                // Verificar si el valor contiene barras verticales (caso múltiples IDs)
                if (strpos($idProcedimiento, '|') !== false) {
                    // Convertir la cadena en un array de IDs
                    $array_id_procedimiento = explode('|', $idProcedimiento);

                    // Obtener todos los procedimientos que coincidan con los IDs
                    $procedimientoCentroTem = ProcedimientosCentro::whereIn('id', $array_id_procedimiento)->get();
                } else {
                    // Caso de un solo ID (número)
                    $procedimientoCentroTem = ProcedimientosCentro::where('id',$idProcedimiento)->get();
                }

                $nombre_proc_temp = '';
                foreach ($procedimientoCentroTem as $key_proc_temp => $value_proc_temp)
                {
                    $nombre_proc_temp .= $value_proc_temp->nombre.', ';
                }

                $reg_exam_rayo[$key_ry]->procedimientos = $procedimientoCentroTem;
                $reg_exam_rayo[$key_ry]->nombre_procedimientos = $nombre_proc_temp;
            }
        }

        $trabajos_laboratorio = $this->dame_trabajos_laboratorio($paciente->id, $id_ficha_atencion, $request->lugar_atencion, $profesional->id);

        
        
        return view($ruta_blade)->with(
            [
                'examenes_plan_tratamiento_broncoscopia' => $examenes_plan_tratamiento_broncoscopia,
                'examenes_plan_tratamiento_rx' => $examenes_plan_tratamiento_rx,
                'examenes_plan_tratamiento' => $examenes_plan_tratamiento,
                'examenes_plan_tratamiento_otros' => $examenes_plan_tratamiento_otros,
                'piezas_periodonto' => $piezas_periodonto,
                'todos' => $todos,
                'placeholder_antecedentes' => $placeholder_antecedentes,
                'placeholder_motivo_consulta' => $placeholder_motivo_consulta,
                'placeholder_examen_fisico' => $placeholder_examen_fisico,
                'url_tratamientos_autocomplete' => $url_tratamientos_autocomplete,
                'paciente' => $paciente,
                'mascota' => $mascota,
                'mascota_edad' => $mascota_edad,
                'responsable_mascota' => $responsable_mascota,
                'ficha_atencion_mascota' => $ficha_atencion_mascota,
                'proxima_fecha_atencion' => $proxima_fecha_atencion,
                'tons_dental' => $tons_dental,
                'hora_inicio_atencion' => isset($hora_inicio_fecha_atencion) ? $hora_inicio_fecha_atencion : '',
                'hora_fin_atencion' => isset($hora_fin_fecha_atencion) ? $hora_fin_fecha_atencion : '',
                'convenios_empresas' => $convenios_empresas,
                'convenios_prevision' => $convenios_prevision,
                'tipos_receta' => $tipos_receta,
                'recetas' => $recetas,
                'insumos_tratamientos' => $insumos_tratamientos,
                'insumos_bodega' => $insumos_bodega,
                'contador_div_evaluaciones' => $contador_div_evaluaciones,
                'valores' => $valores_tratamientos[0],
                'valores_piezas' => $valores_tratamientos[1],
                'valores_insumos' => $valores_tratamientos[2],
                'valores_laboratorio' => $valores_tratamientos[3],
                'valor_abonado' => $total_abonado,
                'examenes_tto_implantes' => $examenes_tto_implantes,
                'examenes_tto_rehab_implantes' => $examenes_tto_rehab_implantes,
                'examenes_post_implantes' => $examenes_post_implantes,
                'examenes_post_implantes_grupos' => $examenes_post_implantes_grupos,
                'examenes_piezas_pfu' => $examenes_piezas_pfu,
                'examenes_piezas_pfp' => $examenes_piezas_pfp,
                'ordenes_tm' => $ordenes_tm,
                'ordenes_tmy' => $ordenes_tmy,
                'correlativo_otm' => $correlativo_otm,
                'proveedores' => $proveedores,
                'bodegas' => $bodegas,
                'tratamientos_implantologia' => $tratamientos_implantologia,
                'pagos_tratamientos_dentales' => $pagos_tratamientos_dentales,
                'materiales_implantologia' => $materiales_implantologia,
                'marcas_implantes' => $marcas_implantes,
                'examenes_dental' => $examenes_dental,
                'examenes_pre_implante' => $examenes_preimplante,
                'examenes_period' => $examenes_period,
                'examenes_period_period' => $examenes_period_period,
                'examenes_dental_end' => $examenes_dental_end,
                'examenes_dental_odontopediatria' => $examenes_dental_odontopediatria,
                'examenes_rx_oral' => $examenes_rx_oral,
                'examenes_rx_oral_end' => $examenes_rx_oral_endodoncia,
                'examenes_rx_oral_odontop' => $examenes_rx_oral_odontop,
                'examenes_pieza' => $examenes_pieza,
                'examenes_pieza_end' => $examenes_pieza_end,
                'maxilar_superior_gral_tratamientos' => $maxilar_superior_gral_tratamiento,
                'maxilar_superior_gral_diagnosticos' => $maxilar_superior_gral_diagnostico,
                'maxilar_inferior_gral_tratamientos' => $maxilar_inferior_gral_tratamiento,
                'maxilar_inferior_gral_diagnosticos' => $maxilar_inferior_gral_diagnostico,
                'maxilar_inferior_gral_tratamientos_endo' => $maxilar_inferior_gral_tratamientos_endo,
                'maxilar_inferior_gral_diagnosticos_endo' => $maxilar_inferior_gral_diagnosticos_endo,
                'maxilar_superior_gral_tratamientos_endo' => $maxilar_superior_gral_tratamientos_endo,
                'maxilar_superior_gral_diagnosticos_endo' => $maxilar_superior_gral_diagnosticos_endo,
                'boca_completa_gral_tratamiento_endo' => $boca_completa_gral_tratamiento_endo,
                'boca_completa_gral_diagnostico_endo' => $boca_completa_gral_diagnostico_endo,
                'boca_completa_gral_tratamientos' => $boca_completa_gral_tratamiento,
                'boca_completa_gral_diagnosticos' => $boca_completa_gral_diagnostico,
                'primer_cuadrante' => $primer_cuadrante,
                'segundo_cuadrante' => $segundo_cuadrante,
                'tercer_cuadrante' => $tercer_cuadrante,
                'cuarto_cuadrante' => $cuarto_cuadrante,
                'quinto_cuadrante' => $quinto_cuadrante,
                'sexto_cuadrante' => $sexto_cuadrante,
                'primer_cuadrante_infantil' => $primer_cuadrante_infantil,
                'segundo_cuadrante_infantil' => $segundo_cuadrante_infantil,
                'tercer_cuadrante_infantil' => $tercer_cuadrante_infantil,
                'cuarto_cuadrante_infantil' => $cuarto_cuadrante_infantil,
                'quinto_cuadrante_infantil' => $quinto_cuadrante_infantil,
                'sexto_cuadrante_infantil' => $sexto_cuadrante_infantil,
                'septimo_cuadrante_infantil' => $septimo_cuadrante_infantil,
                'octavo_cuadrante_infantil' => $octavo_cuadrante_infantil,
                'primer_cuadrante_endodoncia' => $primer_cuadrante_endodoncia,
                'segundo_cuadrante_endodoncia' => $segundo_cuadrante_endodoncia,
                'tercer_cuadrante_endodoncia' => $tercer_cuadrante_endodoncia,
                'cuarto_cuadrante_endodoncia' => $cuarto_cuadrante_endodoncia,
                'quinto_cuadrante_endodoncia' => $quinto_cuadrante_endodoncia,
                'sexto_cuadrante_endodoncia' => $sexto_cuadrante_endodoncia,
                'tratamientos' => $tratamientos_dentales,
                'diagnosticos' => $diagnosticos_dentales,
                'odontograma' => $odontograma,
                'odontograma_historial' => $odontograma_historial,
                'presupuesto' => $presupuesto_dental,
                'biopsias' => $biopsias,
                'imagenes' => $imagenes,
                'imagenes_preimplante' => $imagenes_preimplante,
                'imagenes_periodoncia' => $imagenes_periodoncia,
                'contador_div_examenes' => $contador_div_examenes,
                'controles_ciclo' => $controles_ciclo,
                'procedimientos' => $procedimientos,
                'curaciones' => $curaciones,
                'examenes_solicitados' => $examenes_solicitados,
                'direccion_paciente' => $direccion_paciente,
                'direccion_id_ciudad_paciente' => $direccion_id_ciudad_paciente,
                'direccion_txt_ciudad_paciente' => $direccion_txt_ciudad_paciente,
                'direccion_id_region_paciente' => $direccion_id_region_paciente,
                'direccion_txt_region_paciente' => $direccion_txt_region_paciente,
                'responsable' => $responsable,
				'pacientes_contacto_emergencia' => $pacientes_contacto_emergencia,
                'paciente_alergias' => $paciente_alergias,
                'prevision' => $prevision,
                'profesional' => $profesional,
                'profesional_especialidad' => $profesional_especialidad,
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
                // 'medicamentos_cronicos' => $medicamentos_cronicos,
                'alergias' => $alergias,
                // 'antecedentes_quirurgicos' => $antecedentes_quirurgicos,
                'discapacidades' => $discapacidades,
                'patoligias_cronicas' => $patoligias_cronicas,
                'fichaAtencion' => $fichaAtencion,
                'id_lugar_atencion' => $request->lugar_atencion_id,
                'lugar_atencion' => $lugar_atencion,
                'lugares_atencion ' => $lugares_atencion ,
                'id_ficha_atencion' => $id_ficha_atencion,
                'especialidad' => $especialidad,
                'interconsulta' => $interconsulta,
                'fichaTipo' => $fichaTipo,
				'examen_tipo' => $examen_tipo,
                'examen' => $examen,
                'lista_examen_especial' => $lista_examen_especial,
                'examenes_especialidad' => $examenes_especialidad,
                'examenes_radiologicos' => $examenes_radiologicos,
                'examenes_especialidad_realizados' => $examenes_especialidad_realizados,
                'institucion' => $institucion,
                'cns_tipo' => $cns_tipo,
                'cns_tipo_template' => $cns_tipo_template,
                'cns_registros' => $cns_registros,
				'resultado_examen' => $resultado_examen,
                'tipo_antecedente' => $tipo_antecedente,
                'receta_control' => $receta_control,
                'tiene_controles' => $tiene_controles,
                /** FMU */
                // 'id_usuario' => $id_usuario,
                //// 'paciente' => $paciente,
                // 'contacto_emergencia' => $contacto_emergencia,
                'antecedentes_paciente' => $antecedentes_paciente,
                'grupo_sanguineo' => $grupo_sanguineo,
                'antecedentes' => $antecedentes,
                'token' => $request->token,
                'especialidad' => $especialidad,
                'sub_tipo_especialidad' => $sub_tipo_especialidad,
                'direccion' => $direccion,
                'datos' => $datos, // TEMPLATE PARA USO EN MODAL INCLUDE
                'tratamiento_activo' => $regisrto_result,
                //// 'examenes_especialidad_realizados' => $examenes_especialidad_realizados,
                //// 'resultado_examen' => $resultado_examen,
                'control_enfer_cronicas' => $control_enfer_cronicas,

                // 'ficha_ges' => $ges,
                // 'direccion' => $direccion,
                /*'contacto' => $contacto,
                'contacto_direccion'=> $contacto_direccion,
                'contacto_ciudad' => $contacto_ciudad,*/
                'licencia' => $licencia,
                'ultima_licencia' => $ultima_licencia,

                /** CONSULTA VIDEO LLAMADA */
                // 'info_video' => $info_video,

                /** RESPONSABLES */
                'responsables'  => $responsables,
                'acompanantes'  => $acompanantes,

                'reg_octavo_par'  => $reg_octavo_par,
                'procedimientoCentro'  => $procedimientoCentroTem,

				'reg_exam_rayo'  => $reg_exam_rayo,
                'ultimoControl' => $ultimoControl,
                'laboratorios' => $laboratorios,
            ]
        );
    }

    public function guardarPresupuestoMascota(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'id_paciente' => 'required|integer',
            'id_profesional' => 'required|integer',
            'id_ficha_atencion' => 'required|integer',
            'id_lugar_atencion' => 'required|integer',
            'datos_atencion' => 'nullable|string',
            'estado' => 'nullable|integer',
            'aprobado' => 'nullable|integer',
            'fecha_control' => 'nullable|date',
            'fecha' => 'nullable|date',
            'otros' => 'nullable|string',
            'observaciones' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'estado' => 0,
                'msj' => 'Datos inválidos',
                'error' => $validator->errors(),
            ], 422);
        }

        $datosAtencionRaw = $request->input('datos_atencion');
        if ($datosAtencionRaw !== null && $datosAtencionRaw !== '') {
            $decoded = json_decode($datosAtencionRaw, true);
            $datosAtencion = json_last_error() === JSON_ERROR_NONE ? $decoded : ['detalle' => $datosAtencionRaw];
        } else {
            $datosAtencion = [];
        }

        $presupuesto = new PresupuestoMascota();
        $presupuesto->id_paciente = $request->input('id_paciente');
        $presupuesto->id_profesional = $request->input('id_profesional');
        $presupuesto->id_ficha_atencion = $request->input('id_ficha_atencion');
        $presupuesto->id_lugar_atencion = $request->input('id_lugar_atencion');
        $presupuesto->id_tipo_tratamiento = $request->input('id_tipo_tratamiento');
        $presupuesto->datos_atencion = $datosAtencion;
        $presupuesto->estado = $request->input('estado');
        $presupuesto->aprobado = $request->input('aprobado');
        $presupuesto->fecha_control = $request->input('fecha_control');
        $presupuesto->fecha = $request->input('fecha');
        $presupuesto->otros = $request->input('otros');
        $presupuesto->observaciones = $request->input('observaciones');

        if (!$presupuesto->save()) {
            return response()->json([
                'estado' => 0,
                'msj' => 'No se pudo guardar el presupuesto',
            ], 500);
        }

        return response()->json([
            'estado' => 1,
            'msj' => 'Presupuesto registrado',
            'id' => $presupuesto->id,
        ]);
    }

    public function dame_comunas_contacto_emergencia($id_paciente){
        $paciente = Paciente::find($id_paciente);
        // verificar si el paciente tiene contacto de emergencia
        if($paciente->ContactosEmergencia()->count() == 0){
            return [];
        }
        $region = $paciente->ContactosEmergencia()->first()->Direccion()->first()->Ciudad()->first()->Region()->first()->id;
        $comunas = Ciudad::where('id_region', $region)->get();
        return $comunas;
    }

    private function dame_bodegas($id_lugar_atencion)
    {
        $bodegas = Bodega::all();

        return $bodegas;
    }

    private function dame_proveedores($id_lugar_atencion)
    {
        $proveedores = Proveedor::where('estado', 1)->get();

        return $proveedores;
    }

    public function dame_correlativo($tip_doc)
    {
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $fila=Correlativos::where('documento', $tip_doc)
                        ->where('id_usuario', $profesional->id_usuario)
                        ->first();

        if(!is_null($fila))
        {
            $corr=$fila->correlativo;
            $el_siguiente=$corr+1;
            $num=$el_siguiente;

        }else{
            $fila = new Correlativos;
            $fila->documento = $tip_doc;
            $fila->id_usuario = $profesional->id_usuario;
            $fila->correlativo = 0;
            $fila->serie = 0;
            $fila->alarma = 50;
            $fila->estado = 1;
            $fila->fecha = Carbon::now();

            $fila->save();
            $num = 1;
        }

        return $num;
    }

    public function dameOrdenesTrabajoMenor($id_paciente, $id_profesional,$id_presupuesto, $id_ficha_atencion = null){
        $ordenes = OrdenTrabajoMenor::select('ordenes_trabajos_menores.*','laboratorios.nombre as nombre_lab','prestaciones_laboratorio.valor as valor_prestacion')
                                        ->distinct()
                                        ->join('laboratorios','ordenes_trabajos_menores.id_laboratorio','laboratorios.id')
                                        ->leftjoin('prestaciones_laboratorio','ordenes_trabajos_menores.trabajo_realizar','prestaciones_laboratorio.nombre')
                                        ->where('ordenes_trabajos_menores.id_paciente', $id_paciente)
                                        ->where('ordenes_trabajos_menores.id_profesional',$id_profesional)
                                        ->when($id_ficha_atencion, function ($query) use ($id_ficha_atencion) {
                                            return $query->where('ordenes_trabajos_menores.id_ficha_atencion', $id_ficha_atencion);
                                        })
                                        ->orderBy('ordenes_trabajos_menores.created_at', 'asc')
                                        ->get();
        return $ordenes;
    }

    public function dameOrdenesTrabajoMayor($id_paciente, $id_profesional,$id_presupuesto, $id_ficha_atencion = null){
        $ordenes = OrdenTrabajoMayor::select('ordenes_trabajos_mayores.*','laboratorios.nombre as nombre_lab', 'prestaciones_laboratorio.valor as valor_prestacion')
                                     
                                        ->leftjoin('laboratorios','ordenes_trabajos_mayores.id_laboratorio','laboratorios.id')
                                        ->leftjoin('prestaciones_laboratorio','ordenes_trabajos_mayores.trabajo_realizar','prestaciones_laboratorio.nombre')
                                        ->where('ordenes_trabajos_mayores.id_paciente', $id_paciente)
                                        ->where('ordenes_trabajos_mayores.id_profesional',$id_profesional)
                                        ->when($id_ficha_atencion, function ($query) use ($id_ficha_atencion) {
                                            return $query->where('ordenes_trabajos_mayores.id_ficha_atencion', $id_ficha_atencion);
                                        })
                                        ->get();
        return $ordenes;
    }

    public function dameProcedimientosCoronaProtesis($id_paciente, $id_profesional,$id_ficha_atencion, $seccion = null){
        if($seccion == 'pfu'){
            $procedimientos = PiezasDentalCoronaProtesis::where('id_paciente', $id_paciente)->where('id_profesional',$id_profesional)->where('seccion','pfu')->get();
        }else{
            $procedimientos = PiezasDentalCoronaProtesis::where('id_paciente', $id_paciente)->where('id_profesional',$id_profesional)->where('seccion','pfp')->get();
        }

        return $procedimientos;
    }

    public function dame_insumos_tratamiento($id_paciente,$id_ficha_atencion,$tipo = null){
        try {

            $insumos = InsumosTratamientosDental::where('id_paciente', $id_paciente)->where('id_ficha_atencion',$id_ficha_atencion)->get();
            foreach($insumos as $i){
                $i->insumos = mb_strtoupper($i->insumos, 'UTF-8');
            }
            return $insumos;
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }

    public function dame_insumos_bodega($id_ficha_atencion){
        try {
            $insumos = PedidoInsumos::where('id_ficha_atencion',$id_ficha_atencion)->get();
            $materiales = PedidoMateriales::where('id_ficha_atencion',$id_ficha_atencion)->get();
            // unificar los insumos y materiales en un solo array de tipo collection
            $pedidos = $insumos->merge($materiales);
            foreach ($pedidos as $pedido) {
                $pedido->fecha = Carbon::parse($pedido->created_at)->format('Y-m-d H:m:s');
                if($pedido->id_profesional == null){
                    $pedido->profesional = 'No asignado';
                }else{
                    $profesional = Profesional::where('id', $pedido->id_profesional)->first();
                    $pedido->profesional = $profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos;
                }
            }
            return $pedidos;
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }

    public function dameHistorialDentalImpl($id_paciente, $seccion){
        $historial = ExamenesDentalPiezaHistoria::where('id_paciente', $id_paciente)->where('seccion',$seccion)->get();
        return $historial;
    }

    public function dameHistorialDentalPeriod($id_paciente){
        $historial = ExamenesDentalPiezaPeriod::where('id_paciente',$id_paciente)->get();
        return $historial;
    }

    public function damePresupuestosDental($id_paciente, $id_ficha_atencion, $id_lugar_atencion){
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $presupuestos = PresupuestosDental::where('id_paciente',$id_paciente)
        ->where('id_profesional', $profesional->id)
        ->where('estado',0)
        ->first();
        return $presupuestos;
    }

    public function dameValores($id_paciente, $id_ficha_atencion, $id_lugar_atencion, $tipo_especialidad){
        $total_general = 0;
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        // Obtener todos los tratamientos desde dameTratamientosBocaGeneral()
        $tratamientos = $this->dameTratamientosBocaGeneral($id_ficha_atencion);

        foreach ($tratamientos as $item) {
            // Sumar solo los que están en presupuesto y tienen valor definido
            if ($item->presupuesto == 1 && isset($item->valor) && $item->urgencia == 0) {
                $total_general += $item->valor;
            }
        }

        $total_odontograma = 0;

        $odontograma = $this->dameOdontogramaPaciente($id_paciente, $id_ficha_atencion, $id_lugar_atencion, $tipo_especialidad);

        // Iterar y sumar valores
        foreach ($odontograma as $item) {
            if($item['presupuesto'] == 1 && $item['urgencia'] == 0){
                if (isset($item['valor'])) {
                    $total_odontograma += $item['valor'];
                }
            }

        }

        $total_insumos = 0;

        $insumos = $this->dame_insumos_tratamiento($id_paciente, $id_ficha_atencion, null);

        // Iterar y sumar valores
        foreach ($insumos as $item) {
            if($item['presupuesto'] == 1 && $item['urgencia'] == 0){
                if (isset($item['valor'])) {
                    $total_insumos += $item['valor'] * $item['cantidad'];
                }
            }

        }

        $trabajos_laboratorio = $this->dame_trabajos_laboratorio($id_paciente, $id_ficha_atencion, $id_lugar_atencion, $profesional->id);

        $total_lab = 0;

        foreach ($trabajos_laboratorio as $trabajo) {
            if($trabajo->presupuesto == 1){
                $total_lab += $trabajo->valor_prestacion;
            }
        }

        return [$total_general, $total_odontograma, $total_insumos, $total_lab];
    }

    public function dame_trabajos_laboratorio($id_paciente, $id_ficha_atencion, $id_lugar_atencion, $id_presupuesto, $id_profesional = null)
    {
        $ficha = FichaAtencion::find($id_ficha_atencion);

        $trabajos = $this->dameOrdenesTrabajoMenor($id_paciente, $id_profesional, $id_presupuesto, $id_ficha_atencion);

        $trabajos_mayor = $this->dameOrdenesTrabajoMayor($id_paciente, $id_profesional,$id_presupuesto, $id_ficha_atencion);

        // Unir los resultados de trabajos menores y mayores
        $trabajos = $trabajos->merge($trabajos_mayor);
        return $trabajos;
    }

   public function pdf_orden_examenes_tipo_examen(Request $request)
    {
        $id_ficha_atencion = $request->id;
        $tipo_examen = $request->tipo;

        $examenes = ExamenPlanTratamiento::where('id_ficha_atencion', $id_ficha_atencion)
                                        ->where('tipo_examen', $tipo_examen)
                                        ->get();

        if ($examenes->isEmpty()) {
            return 'No se encontraron exámenes para esta ficha de atención.';
        }

        $ficha_atencion = FichaAtencion::find($id_ficha_atencion);
        $lugar_atencion = LugarAtencion::with('direccion')->find($ficha_atencion->id_lugar_atencion);
        $paciente = Paciente::find($ficha_atencion->id_paciente);
        $profesional = Profesional::with('direccion')->find($ficha_atencion->id_profesional);
       
        // Certificados y QR
        $token_receta = '';
        $temp_token = CertificadoController::certificadoDocumento($ficha_atencion->id, $profesional->id, $paciente->id, 1);
        if ($temp_token['estado'] != 1) {
            $temp_token = CertificadoController::certificadoDocumento($ficha_atencion->id, rand(111,999), $paciente->id, 1);
        }
        $token_receta = $temp_token['certificado'];
        $url_documento = CertificadoController::generarUrlDocumento($token_receta);
        $qr_documento = GeneradorQrController::generar($url_documento);

        $temp_token = CertificadoController::certificadoProfesional($profesional->id, 1, 1, $ficha_atencion->id);
        if ($temp_token['estado'] != 1) {
            $temp_token = CertificadoController::certificadoProfesional(rand(1114, 999));
        }
        $token_profesional = $temp_token['certificado'];
        $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
        $qr_profesional = GeneradorQrController::generar($url_documento);

        // Arreglos para la vista
        $array_ficha_atencion = [
            'id' => $ficha_atencion->id,
            'created_at' => $ficha_atencion->created_at->format('d/m/Y'),
            'token' => $token_receta,
            'url' => $url_documento,
            'qr' => $qr_documento,
        ];

        $array_lugar_atencion = [
            'id' => $lugar_atencion->id,
            'nombre' => $lugar_atencion->nombre,
            'direccion' => $lugar_atencion->direccion->direccion.' '.$lugar_atencion->direccion->numero_dir.', '.$lugar_atencion->direccion->Ciudad()->first()->nombre,
            'region' => $lugar_atencion->direccion->Ciudad()->first()->Region()->first()->nombre,
        ];

        $array_profesional = [
            'id' => $profesional->id,
            'nombre' => $profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos,
            'rut' => $profesional->rut,
            'direccion' => $profesional->direccion->direccion.' '.$profesional->direccion->numero_dir.', '.$profesional->direccion->Ciudad()->first()->nombre,
            'especialidad' => optional($profesional->SubTipoEspecialidad()->first())->nombre,
            'id_especialidad' => $profesional->id_especialidad,
            'num_colegio' => $profesional->num_colegio,
            'region' => $profesional->direccion->Ciudad()->first()->Region()->first()->nombre,
            'token' => $token_profesional,
            'url' => $url_profesional,
            'qr' => $qr_profesional,
        ];

        $direccion = $paciente->Direccion()->first();
        $array_paciente = [
            'id' => $paciente->id,
            'nombre' => $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos,
            'fecha_nac' => $paciente->fecha_nac,
            'rut' => $paciente->rut,
            'sexo' => $paciente->sexo,
            'direccion' => $direccion->direccion.' '.$direccion->numero_dir.', '.$direccion->Ciudad()->first()->nombre
        ];

        $detalle_orden = [
            $tipo_examen => []
        ];

        foreach ($examenes as $ex) {
            $lista_examenes = json_decode($ex->examenes, true);

            if (is_array($lista_examenes)) {
                foreach ($lista_examenes as $descripcion) {
                    $detalle_orden[$tipo_examen][] = [
                        'examen' => $descripcion ?? 'Sin descripción',
                        'prioridad' => $ex->prioridad ?? 'Normal',
                        'codigo' => $ex->codigo ?? '',
                        'otro' => $ex->otro ?? '',
                        'contraste' => $ex->contraste ?? 0
                    ];
                }
            } else {
                $detalle_orden[$tipo_examen][] = [
                    'examen' => 'Sin descripción',
                    'prioridad' => $ex->prioridad ?? 'Normal',
                    'codigo' => $ex->codigo ?? '',
                    'otro' => $ex->otro ?? '',
                    'contraste' => $ex->contraste ?? 0
                ];
            }
        }


        $cuerpo = [
            'array_ficha_atencion' => $array_ficha_atencion,
            'array_lugar_atencion' => $array_lugar_atencion,
            'array_profesional' => $array_profesional,
            'array_paciente' => $array_paciente,
            'detalle_orden' => $detalle_orden,
            'cantidad_recetas' => count($detalle_orden)
        ];


        $titulo = 'Solicitud de Exámenes: '.$tipo_examen;

        return PdfController::generarPDF($titulo, compact('titulo', 'cuerpo','array_ficha_atencion', 'array_lugar_atencion', 'array_profesional', 'array_paciente','detalle_orden'), 'Exámenes '.$paciente->rut, 'pdf_solicitud_examen_tipo');
    }



    public function dameOdontogramaPaciente($id_paciente, $id_ficha_atencion, $id_lugar_atencion, $tipo_especialidad,$id_presupuesto = null, $id_profesional = null){

        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        if(!is_null($id_profesional)){
            $profesional = Profesional::find($id_profesional);
        }
       
        if($tipo_especialidad == 16){
            $query = OdontogramaPaciente::select(
                'odontogramas_pacientes.*',
                'tratamientos_implantologia.descripcion',
                'tratamientos_implantologia.cantidad_bloques',
                'tratamientos_implantologia.valor',
                'tratamientos_dental.descripcion as diagnostico')
                ->join('tratamientos_implantologia', 'odontogramas_pacientes.tratamiento', '=', 'tratamientos_implantologia.descripcion')
                ->join('tratamientos_dental', 'odontogramas_pacientes.diagnostico', '=', 'tratamientos_dental.id')
                ->where('odontogramas_pacientes.id_paciente', $id_paciente)
                ->where('odontogramas_pacientes.id_lugar_atencion', $id_lugar_atencion)
                ->where('odontogramas_pacientes.id_profesional', $profesional->id)
                ->where('odontogramas_pacientes.tipo_especialidad', $tipo_especialidad);
        }else{
            $query = OdontogramaPaciente::select(
                'odontogramas_pacientes.*',
                'diagnosticos_dental.descripcion',
                'diagnosticos_dental.cantidad_bloques',
                'diagnosticos_dental.valor',
                'tratamientos_dental.descripcion as diagnostico')
                ->join('diagnosticos_dental', 'odontogramas_pacientes.tratamiento', '=', 'diagnosticos_dental.descripcion')
                ->join('tratamientos_dental', 'odontogramas_pacientes.diagnostico', '=', 'tratamientos_dental.id')
                ->where('odontogramas_pacientes.id_paciente', $id_paciente)
                ->where('odontogramas_pacientes.id_lugar_atencion', $id_lugar_atencion)
                ->where('odontogramas_pacientes.id_profesional', $profesional->id)
                ->where('odontogramas_pacientes.tipo_especialidad', $tipo_especialidad);
        }


            // verificar si trae ficha de atencion
            if (!is_null($id_ficha_atencion)) {
                $query->where('odontogramas_pacientes.id_ficha_atencion', $id_ficha_atencion);
            }

            // Verificar si el parámetro $id_presupuesto no es nulo
            if (!is_null($id_presupuesto)) {
                $query->where('odontogramas_pacientes.id_presupuesto', $id_presupuesto);
            }

            // Obtener los resultados
            $odontogramas = $query->get();

            foreach ($odontogramas as $odontograma) {
                if($profesional->id_tipo_especialidad == 16){
                    $id_diagnostico = TratamientosImplantologia::where('descripcion',$odontograma->tratamiento)->first();
                    $odontograma->id_diagnostico = $id_diagnostico->id;
                    // buscamos el valor del tratamiento en la tabla diagnosticos_dental_profesional
                    $d = DiagnosticosDentalProfesional::where('id_diagnostico',$id_diagnostico->id)
                        ->where('id_profesional',$profesional->id)
                        ->first();
                        if($d){
                            $odontograma->valor = $d->valor;
                        }
                }else{
                    $id_diagnostico = DiagnosticosDental::where('descripcion',$odontograma->tratamiento)->first();
                    $odontograma->id_diagnostico = $id_diagnostico->id;
                    // buscamos el valor del tratamiento en la tabla diagnosticos_dental_profesional
                    $d = DiagnosticosDentalProfesional::where('id_diagnostico',$id_diagnostico->id)
                        ->where('id_profesional',$profesional->id)
                        ->first();
                        if($d){
                            $odontograma->valor = $d->valor;
                        }
                }
                $odontograma->descripcion = mb_strtoupper($odontograma->descripcion, 'UTF-8');
            }

            return $odontogramas;
    }

    public function dameOdontogramaPacienteHistorial($id_paciente){
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        if($profesional->id_tipo_especialidad == 16){
            $odontogramas = OdontogramaPaciente::select(
                'odontogramas_pacientes.*',
                'tratamientos_implantologia.descripcion',
                'tratamientos_implantologia.cantidad_bloques',
                'tratamientos_implantologia.valor',
                'tratamientos_dental.descripcion as diagnostico')
                ->join('tratamientos_implantologia', 'odontogramas_pacientes.tratamiento', '=', 'tratamientos_implantologia.descripcion')
                ->join('tratamientos_dental', 'odontogramas_pacientes.diagnostico', '=', 'tratamientos_dental.id')
                ->where('odontogramas_pacientes.id_paciente', $id_paciente)
                ->get();
        }else{
            $odontogramas = OdontogramaPaciente::select(
                'odontogramas_pacientes.*',
                'diagnosticos_dental.descripcion',
                'diagnosticos_dental.cantidad_bloques',
                'diagnosticos_dental.valor',
                'tratamientos_dental.descripcion as diagnostico')
                ->join('diagnosticos_dental', 'odontogramas_pacientes.tratamiento', '=', 'diagnosticos_dental.descripcion')
                ->join('tratamientos_dental', 'odontogramas_pacientes.diagnostico', '=', 'tratamientos_dental.id')
                ->where('odontogramas_pacientes.id_paciente', $id_paciente)
                ->get();
        }
        return $odontogramas;

    }

    public function dameCompletaEndoTratamiento($id_paciente, $tipo_especialidad, $id_ficha_atencion = null){
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $examenes = ExamenesBocaGeneral::select('examenes_boca_general.*','diagnosticos_dental.valor')
        ->join('diagnosticos_dental','examenes_boca_general.diagnostico_tratamiento','=','diagnosticos_dental.descripcion')
        ->where('localizacion','Boca completa')
        ->where('examenes_boca_general.tipo_examen',2)
        ->where('especialidad_examen','tratamiento')
        ->where('examenes_boca_general.id_paciente',$id_paciente)
        ->where('examenes_boca_general.id_profesional', $profesional->id)
        ->where('examenes_boca_general.tipo_especialidad',$tipo_especialidad);

        if(!is_null($id_ficha_atencion)){
            $examenes->where('examenes_boca_general.id_ficha_atencion',$id_ficha_atencion);
        }
        $examenes = $examenes->get();
        return $examenes;
    }

    public function dameCompletaEndoDiagnostico($id_paciente, $tipo_especialidad, $id_ficha_atencion = null){
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $examenes = ExamenesBocaGeneral::select('examenes_boca_general.*','diagnosticos_dental.valor')
        ->join('diagnosticos_dental','examenes_boca_general.diagnostico_tratamiento','=','diagnosticos_dental.descripcion')
        ->where('localizacion','Boca completa')
        ->where('examenes_boca_general.tipo_examen',2)
        ->where('especialidad_examen','diagnostico')
        ->where('examenes_boca_general.id_paciente',$id_paciente)
        ->where('examenes_boca_general.id_profesional', $profesional->id)
        ->where('examenes_boca_general.tipo_especialidad',$tipo_especialidad);

        if(!is_null($id_ficha_atencion)){
            $examenes->where('examenes_boca_general.id_ficha_atencion',$id_ficha_atencion);
        }
        $examenes = $examenes->get();
        return $examenes;
    }

    public function dameMaxilarSuperiorGeneralTratamientoEndodoncia($id_paciente,$tipo_especialidad, $id_ficha_atencion = null){
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $examenes = ExamenesBocaGeneral::select('examenes_boca_general.*','diagnosticos_dental.valor')
        ->join('diagnosticos_dental','examenes_boca_general.diagnostico_tratamiento','=','diagnosticos_dental.descripcion')
        ->where('examenes_boca_general.localizacion','Maxilar superior')
        ->where('examenes_boca_general.tipo_examen',2)
        ->where('examenes_boca_general.especialidad_examen','tratamiento')
        ->where('examenes_boca_general.id_paciente',$id_paciente)
        ->where('examenes_boca_general.id_profesional', $profesional->id)
        ->where('examenes_boca_general.tipo_especialidad',$tipo_especialidad);

        if(!is_null($id_ficha_atencion)){
            $examenes->where('examenes_boca_general.id_ficha_atencion',$id_ficha_atencion);
        }
        $examenes = $examenes->get();
        return $examenes;
    }

    public function dameMaxilarSuperiorGeneralDiagnosticoEndodoncia($id_paciente,$tipo_especialidad, $id_ficha_atencion = null){
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $examenes = ExamenesBocaGeneral::select('examenes_boca_general.*','diagnosticos_dental.valor')
        ->join('diagnosticos_dental','examenes_boca_general.diagnostico_tratamiento','=','diagnosticos_dental.descripcion')
        ->where('localizacion','Maxilar superior')
        ->where('examenes_boca_general.tipo_examen',2)
        ->where('especialidad_examen','diagnostico')
        ->where('examenes_boca_general.id_paciente',$id_paciente)
        ->where('examenes_boca_general.id_profesional', $profesional->id)
        ->where('examenes_boca_general.tipo_especialidad',$tipo_especialidad);

        if(!is_null($id_ficha_atencion)){
            $examenes->where('examenes_boca_general.id_ficha_atencion',$id_ficha_atencion);
        }
        $examenes = $examenes->get();
        return $examenes;
    }

    public function dameMaxilarInferiorGeneralTratamientoEndodoncia($id_paciente, $tipo_especialidad, $id_ficha_atencion = null){
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $examenes = ExamenesBocaGeneral::select('examenes_boca_general.*','diagnosticos_dental.valor')
        ->join('diagnosticos_dental','examenes_boca_general.diagnostico_tratamiento','=','diagnosticos_dental.descripcion')
        ->where('localizacion','Maxilar inferior')
        ->where('examenes_boca_general.tipo_examen',2)
        ->where('especialidad_examen','tratamiento')
        ->where('examenes_boca_general.id_paciente',$id_paciente)
        ->where('examenes_boca_general.id_profesional', $profesional->id)
        ->where('examenes_boca_general.tipo_especialidad',$tipo_especialidad);

        if(!is_null($id_ficha_atencion)){
            $examenes->where('examenes_boca_general.id_ficha_atencion',$id_ficha_atencion);
        }
        $examenes = $examenes->get();
        return $examenes;
    }

    public function dameMaxilarInferiorGeneralDiagnosticoEndodoncia($id_paciente, $tipo_especialidad, $id_ficha_atencion = null){
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $examenes = ExamenesBocaGeneral::select('examenes_boca_general.*','diagnosticos_dental.valor')
        ->where('examenes_boca_general.id_paciente',$id_paciente)
        ->where('examenes_boca_general.id_profesional', $profesional->id)
        ->where('examenes_boca_general.tipo_especialidad',$tipo_especialidad)
        ->join('diagnosticos_dental','examenes_boca_general.diagnostico_tratamiento','=','diagnosticos_dental.descripcion')
        ->where('localizacion','Maxilar inferior')
        ->where('examenes_boca_general.tipo_examen',2)
        ->where('especialidad_examen','diagnostico');

        if(!is_null($id_ficha_atencion)){
            $examenes->where('examenes_boca_general.id_ficha_atencion',$id_ficha_atencion);
        }
        $examenes = $examenes->get();
        return $examenes;
    }

    public function dameBocaCompletaGeneralTratamiento($id_paciente, $tipo_especialidad, $id_ficha_atencion = null){
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        if($profesional->id_tipo_especialidad == 16){
        $examenes = ExamenesBocaGeneral::select('examenes_boca_general.*','tratamientos_implantologia.valor')

        ->join('tratamientos_implantologia','examenes_boca_general.diagnostico_tratamiento','=','tratamientos_implantologia.descripcion')
        ->where('localizacion','Boca completa')
        ->where('examenes_boca_general.tipo_examen',1)
        ->where('especialidad_examen','tratamiento')
        ->where('examenes_boca_general.id_paciente',$id_paciente)
        ->where('examenes_boca_general.id_profesional', $profesional->id)
        ->where('examenes_boca_general.tipo_especialidad',$tipo_especialidad);
        }else{
        $examenes = ExamenesBocaGeneral::select('examenes_boca_general.*','diagnosticos_dental.valor')

        ->join('diagnosticos_dental','examenes_boca_general.diagnostico_tratamiento','=','diagnosticos_dental.descripcion')
        ->where('localizacion','Boca completa')
        ->where('examenes_boca_general.tipo_examen',1)
        ->where('especialidad_examen','tratamiento')
        ->where('examenes_boca_general.id_paciente',$id_paciente)
        ->where('examenes_boca_general.id_profesional', $profesional->id)
        ->where('examenes_boca_general.tipo_especialidad',$tipo_especialidad);
        }


        if(!is_null($id_ficha_atencion)){
            $examenes->where('examenes_boca_general.id_ficha_atencion',$id_ficha_atencion);
        }
        $examenes = $examenes->get();
        return $examenes;
    }

    public function dameBocaCompletaGeneralDiagnostico($id_paciente, $tipo_especialidad, $id_ficha_atencion = null){
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        if($profesional->id_tipo_especialidad == 16){
        $examenes = ExamenesBocaGeneral::select('examenes_boca_general.*','tratamientos_implantologia.valor')

        ->join('tratamientos_implantologia','examenes_boca_general.diagnostico_tratamiento','=','tratamientos_implantologia.descripcion')
        ->where('localizacion','Boca completa')
        ->where('examenes_boca_general.tipo_examen',1)
        ->where('especialidad_examen','diagnostico')
        ->where('examenes_boca_general.id_paciente',$id_paciente)
        ->where('examenes_boca_general.id_profesional', $profesional->id)
        ->where('examenes_boca_general.tipo_especialidad',$tipo_especialidad);
        }else{
        $examenes = ExamenesBocaGeneral::select('examenes_boca_general.*','diagnosticos_dental.valor')

        ->join('diagnosticos_dental','examenes_boca_general.diagnostico_tratamiento','=','diagnosticos_dental.descripcion')
        ->where('localizacion','Boca completa')
        ->where('examenes_boca_general.tipo_examen',1)
        ->where('especialidad_examen','diagnostico')
        ->where('examenes_boca_general.id_paciente',$id_paciente)
        ->where('examenes_boca_general.id_profesional', $profesional->id)
        ->where('examenes_boca_general.tipo_especialidad',$tipo_especialidad);
        }


        if(!is_null($id_ficha_atencion)){
            $examenes->where('examenes_boca_general.id_ficha_atencion',$id_ficha_atencion);
        }
        $examenes = $examenes->get();
        return $examenes;
    }

    public function dameMaxilarInferiorGeneralTratamiento($id_paciente, $tipo_especialidad, $id_ficha_atencion = null){
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        if($profesional->id_tipo_especialidad == 16){
            $examenes = ExamenesBocaGeneral::select('examenes_boca_general.*','tratamientos_implantologia.valor')
            ->join('tratamientos_implantologia','examenes_boca_general.diagnostico_tratamiento','=','tratamientos_implantologia.descripcion')
            ->where('localizacion','Maxilar inferior')
            ->where('examenes_boca_general.tipo_examen',1)
            ->where('especialidad_examen','tratamiento')
            ->where('examenes_boca_general.id_paciente',$id_paciente)
            ->where('examenes_boca_general.id_profesional', $profesional->id)
            ->where('examenes_boca_general.tipo_especialidad',$tipo_especialidad);
        }else{
            $examenes = ExamenesBocaGeneral::select('examenes_boca_general.*','diagnosticos_dental.valor')
            ->join('diagnosticos_dental','examenes_boca_general.diagnostico_tratamiento','=','diagnosticos_dental.descripcion')
            ->where('localizacion','Maxilar inferior')
            ->where('examenes_boca_general.tipo_examen',1)
            ->where('especialidad_examen','tratamiento')
            ->where('examenes_boca_general.id_paciente',$id_paciente)
            ->where('examenes_boca_general.id_profesional', $profesional->id)
            ->where('examenes_boca_general.tipo_especialidad',$tipo_especialidad);
        }


        if(!is_null($id_ficha_atencion)){
            $examenes->where('examenes_boca_general.id_ficha_atencion',$id_ficha_atencion);
        }
        $examenes = $examenes->get();
        return $examenes;
    }

    public function dameMaxilarInferiorGeneralDiagnostico($id_paciente, $tipo_especialidad, $id_ficha_atencion = null){
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        if($profesional->id_tipo_especialidad == 16){
            $examenes = ExamenesBocaGeneral::select('examenes_boca_general.*','tratamientos_implantologia.valor')

            ->join('tratamientos_implantologia','examenes_boca_general.diagnostico_tratamiento','=','tratamientos_implantologia.descripcion')
            ->where('localizacion','Maxilar inferior')
            ->where('examenes_boca_general.tipo_examen',1)
            ->where('especialidad_examen','diagnostico')
            ->where('examenes_boca_general.id_paciente',$id_paciente)
            ->where('examenes_boca_general.id_profesional', $profesional->id)
            ->where('examenes_boca_general.tipo_especialidad',$tipo_especialidad);
        }else{
            $examenes = ExamenesBocaGeneral::select('examenes_boca_general.*','diagnosticos_dental.valor')

            ->join('diagnosticos_dental','examenes_boca_general.diagnostico_tratamiento','=','diagnosticos_dental.descripcion')
            ->where('localizacion','Maxilar inferior')
            ->where('examenes_boca_general.tipo_examen',1)
            ->where('especialidad_examen','diagnostico')
            ->where('examenes_boca_general.id_paciente',$id_paciente)
            ->where('examenes_boca_general.id_profesional', $profesional->id)
            ->where('examenes_boca_general.tipo_especialidad',$tipo_especialidad);
        }


        if(!is_null($id_ficha_atencion)){
            $examenes->where('examenes_boca_general.id_ficha_atencion',$id_ficha_atencion);
        }
        $examenes = $examenes->get();
        return $examenes;
    }

    public function dameMaxilarSuperiorGeneralTratamiento($id_paciente, $tipo_especialidad, $id_ficha_atencion = null){

        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        if($profesional->id_tipo_especialidad == 16){
            $examenes = ExamenesBocaGeneral::select('examenes_boca_general.*','tratamientos_implantologia.valor')
            ->join('tratamientos_implantologia','examenes_boca_general.diagnostico_tratamiento','=','tratamientos_implantologia.descripcion')
            ->where('examenes_boca_general.id_paciente',$id_paciente)
            ->where('examenes_boca_general.id_profesional', $profesional->id)
            ->where('examenes_boca_general.tipo_especialidad',$tipo_especialidad)
            ->where('examenes_boca_general.localizacion','Maxilar superior')
            ->where('examenes_boca_general.tipo_examen',1)
            ->where('examenes_boca_general.especialidad_examen','tratamiento');
            if(!is_null($id_ficha_atencion)){
            $examenes->where('examenes_boca_general.id_ficha_atencion',$id_ficha_atencion);
            }
            $examenes = $examenes->get();
        }else{
            $examenes = ExamenesBocaGeneral::select('examenes_boca_general.*','diagnosticos_dental.valor')
            ->join('diagnosticos_dental','examenes_boca_general.diagnostico_tratamiento','=','diagnosticos_dental.descripcion')
            ->where('examenes_boca_general.id_paciente',$id_paciente)
            ->where('examenes_boca_general.id_profesional', $profesional->id)
            ->where('examenes_boca_general.tipo_especialidad',$tipo_especialidad)
            ->where('examenes_boca_general.localizacion','Maxilar superior')
            ->where('examenes_boca_general.tipo_examen',1)
            ->where('examenes_boca_general.especialidad_examen','tratamiento');
            if(!is_null($id_ficha_atencion)){
            $examenes->where('examenes_boca_general.id_ficha_atencion',$id_ficha_atencion);
            }
            $examenes = $examenes->get();
        }

        return $examenes;
    }

    public function dameMaxilarSuperiorGeneralDiagnostico($id_paciente, $tipo_especialidad, $id_ficha_atencion = null){
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        if($profesional->id_tipo_especialidad == 16){
            $examenes = ExamenesBocaGeneral::select('examenes_boca_general.*','tratamientos_implantologia.valor')

            ->join('tratamientos_implantologia','examenes_boca_general.diagnostico_tratamiento','=','tratamientos_implantologia.descripcion')
            ->where('localizacion','Maxilar superior')
            ->where('examenes_boca_general.tipo_examen',1)
            ->where('especialidad_examen','diagnostico')
            ->where('examenes_boca_general.id_paciente',$id_paciente)
            ->where('examenes_boca_general.id_profesional', $profesional->id)
            ->where('examenes_boca_general.tipo_especialidad',$tipo_especialidad);
            if(!is_null($id_ficha_atencion)){
                $examenes->where('examenes_boca_general.id_ficha_atencion',$id_ficha_atencion);
            }
            $examenes = $examenes->get();
        }else{
            $examenes = ExamenesBocaGeneral::select('examenes_boca_general.*','diagnosticos_dental.valor')

            ->join('diagnosticos_dental','examenes_boca_general.diagnostico_tratamiento','=','diagnosticos_dental.descripcion')
            ->where('localizacion','Maxilar superior')
            ->where('examenes_boca_general.tipo_examen',1)
            ->where('especialidad_examen','diagnostico')
            ->where('examenes_boca_general.id_paciente',$id_paciente)
            ->where('examenes_boca_general.id_profesional', $profesional->id)
            ->where('examenes_boca_general.tipo_especialidad',$tipo_especialidad);
            if(!is_null($id_ficha_atencion)){
                $examenes->where('examenes_boca_general.id_ficha_atencion',$id_ficha_atencion);
            }
            $examenes = $examenes->get();
        }

        return $examenes;
    }

    public function dameMaxilarInferiorGeneral($id_paciente){
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $examenes = ExamenesBocaGeneral::where('id_paciente',$id_paciente)
        ->where('examenes_boca_general.id_profesional', $profesional->id)
        ->where('localizacion','Maxilar inferior')
        ->where('tipo_examen',1)
        ->get();
        return $examenes;
    }

    public function dameMBocaCompletaGeneral($id_paciente){
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $examenes = ExamenesBocaGeneral::where('id_paciente',$id_paciente)->where('localizacion','Boca completa')->where('tipo_examen',1)->first();
        return $examenes;
    }

    public function dameBiopsiasDentalPaciente($id_paciente){
        $biopsias = Biopsia::where('id_paciente',$id_paciente)->where('estado',1)->get();
        return $biopsias;
    }

    public function dameExamenesPiezaDentalOraxRxOdontop($id_paciente){
        $examenes = ExamenesDentalOralRx::where('id_paciente',$id_paciente)->where('tipo_examen',3)->get();
        foreach ($examenes as $e) {
            $imagenes = ImagenesDentalRxPaciente::where('id_examen', $e->id)->get();
            $e->imagenes = $imagenes;
            $nueva_lista_imagenes = []; // Inicializamos un nuevo array

            foreach ($imagenes as $i) {
                // Decodificamos el JSON contenido en el atributo `paths_imagenes`
                $decoded_paths = json_decode($i->paths_imagenes, true);

                // Creamos un nuevo objeto/array con la imagen y sus paths decodificados
                $nueva_lista_imagenes[] = [
                    'id' => $i->id,
                    'id_examen' => $i->id_examen,
                    'paths_imagenes' => $decoded_paths, // Ahora es un array decodificado
                ];
            }

            // Puedes asignar este array al objeto `$e` si lo necesitas
            $e->decoded_imagenes = $nueva_lista_imagenes; // Agregamos el array decodificado al examen
        }

        return $examenes;
    }

    public function dameExamenesPiezaDentalPieza($id_paciente, $tipo_especialidad, $id_ficha_atencion){
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();

        $examenes = ExamenesDentalPieza::where('id_paciente',$id_paciente)
        ->where('tipo_examen',1)
        ->where('tipo_especialidad', $profesional->id_tipo_especialidad)
        ->where('id_profesional', $profesional->id)
        ->where('id_ficha_atencion', $id_ficha_atencion)
        ->where('estado',1)
        ->get();
        return $examenes;
    }

    public function dameExamenesPiezaDentalPiezaPrimerCuadrante($id_paciente, $tipo_paciente, $tipo_especialidad) {
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        if($tipo_paciente == 'adulto'){
            $tipo = 1;
            $examenes = ExamenesDentalPieza::where('id_paciente', $id_paciente)
                    ->where('tipo_examen', $tipo)
                    ->where('tipo_especialidad', $tipo_especialidad)
                    ->where('id_profesional', $profesional->id)
                    ->where('estado', 1)
                    ->whereRaw("CAST(numero_pieza AS CHAR) LIKE '1.%'") // Convierte a cadena y filtra
                    ->get();
        }else if($tipo_paciente == 'infantil'){
            $tipo = 3;
            $examenes = ExamenesDentalPieza::where('id_paciente', $id_paciente)
                    ->where('tipo_examen', $tipo)
                    ->where('tipo_especialidad', $tipo_especialidad)
                    ->where('id_profesional', $profesional->id)
                    ->where('estado', 1)
                    ->whereRaw("CAST(numero_pieza AS CHAR) LIKE '5.%'") // Convierte a cadena y filtra
                    ->get();
        }else{
            $tipo = 2;
            $examenes = ExamenesDentalPieza::where('id_paciente', $id_paciente)
                    ->where('tipo_examen', $tipo)
                    ->where('tipo_especialidad', $tipo_especialidad)
                    ->where('id_profesional', $profesional->id)
                    ->where('estado', 1)
                    ->whereRaw("CAST(numero_pieza AS CHAR) LIKE '1.%'") // Convierte a cadena y filtra
                    ->get();
        }


        return $examenes;
    }

    public function dameExamenesPiezaDentalPiezaSegundoCuadrante($id_paciente, $tipo_paciente, $tipo_especialidad) {
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        if($tipo_paciente == 'adulto'){
            $tipo = 1;
            $otro_tipo = 2;
            $examenes = ExamenesDentalPieza::where('id_paciente', $id_paciente)
                    ->where('tipo_examen', $tipo)
                    ->where('tipo_especialidad', $tipo_especialidad)
                      ->where('id_profesional', $profesional->id)
                    ->where('estado', 1)
                    ->whereRaw("CAST(numero_pieza AS CHAR) LIKE '2.%'") // Convierte a cadena y filtra
                    ->get();
        }else if($tipo_paciente == 'infantil'){
            $tipo = 3;
            $examenes = ExamenesDentalPieza::where('id_paciente', $id_paciente)
                    ->where('tipo_examen', $tipo)
                    ->where('tipo_especialidad', $tipo_especialidad)
                      ->where('id_profesional', $profesional->id)
                    ->where('estado', 1)
                    ->whereRaw("CAST(numero_pieza AS CHAR) LIKE '6.%'") // Convierte a cadena y filtra
                    ->get();
        }else{
            $tipo = 2;
            $examenes = ExamenesDentalPieza::where('id_paciente', $id_paciente)
                    ->where('tipo_examen', $tipo)
                    ->where('tipo_especialidad', $tipo_especialidad)
                      ->where('id_profesional', $profesional->id)
                    ->where('estado', 1)
                    ->whereRaw("CAST(numero_pieza AS CHAR) LIKE '2.%'") // Convierte a cadena y filtra
                    ->get();
        }

        return $examenes;
    }

    public function dameExamenesPiezaDentalPiezaTercerCuadrante($id_paciente, $tipo_paciente, $tipo_especialidad) {
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        if($tipo_paciente == 'adulto'){
            $tipo = 1;
            $otro_tipo = 2;
            $examenes = ExamenesDentalPieza::where('id_paciente', $id_paciente)
                    ->where('tipo_examen', $tipo)
                    ->where('tipo_especialidad', $tipo_especialidad)
                      ->where('id_profesional', $profesional->id)
                    ->where('estado', 1)
                    ->whereRaw("CAST(numero_pieza AS CHAR) LIKE '3.%'") // Convierte a cadena y filtra
                    ->get();
        }else if($tipo_paciente == 'infantil'){
            $tipo = 3;
            $examenes = ExamenesDentalPieza::where('id_paciente', $id_paciente)
                    ->where('tipo_examen', $tipo)
                    ->where('tipo_especialidad', $tipo_especialidad)
                      ->where('id_profesional', $profesional->id)
                    ->where('estado', 1)
                    ->whereRaw("CAST(numero_pieza AS CHAR) LIKE '7.%'") // Convierte a cadena y filtra
                    ->get();
        }else{
            $tipo = 2;
            $examenes = ExamenesDentalPieza::where('id_paciente', $id_paciente)
                    ->where('tipo_examen', $tipo)
                    ->where('tipo_especialidad', $tipo_especialidad)
                      ->where('id_profesional', $profesional->id)
                    ->where('estado', 1)
                    ->whereRaw("CAST(numero_pieza AS CHAR) LIKE '3.%'") // Convierte a cadena y filtra
                    ->get();
        }

        return $examenes;
    }

    public function dameExamenesPiezaDentalPiezaCuartoCuadrante($id_paciente, $tipo_paciente, $tipo_especialidad) {
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        if($tipo_paciente == 'adulto'){
            $tipo = 1;
            $otro_tipo = 2;
            $examenes = ExamenesDentalPieza::where('id_paciente', $id_paciente)
                    ->where('tipo_examen', $tipo)
                    ->where('tipo_especialidad', $tipo_especialidad)
                      ->where('id_profesional', $profesional->id)
                    ->where('estado', 1)
                    ->whereRaw("CAST(numero_pieza AS CHAR) LIKE '4.%'") // Convierte a cadena y filtra
                    ->get();
        }else if($tipo_paciente == 'infantil'){
            $tipo = 3;
            $examenes = ExamenesDentalPieza::where('id_paciente', $id_paciente)
                    ->where('tipo_examen', $tipo)
                    ->where('tipo_especialidad', $tipo_especialidad)
                      ->where('id_profesional', $profesional->id)
                    ->where('estado', 1)
                    ->whereRaw("CAST(numero_pieza AS CHAR) LIKE '8.%'") // Convierte a cadena y filtra
                    ->get();
        }else{
            $tipo = 2;
            $examenes = ExamenesDentalPieza::where('id_paciente', $id_paciente)
                    ->where('tipo_examen', $tipo)
                    ->where('tipo_especialidad', $tipo_especialidad)
                      ->where('id_profesional', $profesional->id)
                    ->where('estado', 1)
                    ->whereRaw("CAST(numero_pieza AS CHAR) LIKE '4.%'") // Convierte a cadena y filtra
                    ->get();
        }

        return $examenes;
    }

    public function dameExamenesPiezaDentalPiezaQuintoCuadrante($id_paciente, $tipo_paciente, $tipo_especialidad) {

        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        if($tipo_paciente == 'adulto'){
            $tipo = 1;
            $otro_tipo = 2;
            $examenes = ExamenesDentalPieza::where('id_paciente', $id_paciente)
                    ->where('tipo_examen', $tipo)
                    ->where('tipo_especialidad', $tipo_especialidad)
                      ->where('id_profesional', $profesional->id)
                    ->where('estado', 1)
                    ->whereRaw("CAST(numero_pieza AS CHAR) LIKE '5.%'") // Convierte a cadena y filtra
                    ->get();
        }else if($tipo_paciente == 'infantil'){
            $tipo = 3;
            $examenes = ExamenesDentalPieza::where('id_paciente', $id_paciente)
                    ->where('tipo_examen', $tipo)
                    ->where('tipo_especialidad', $tipo_especialidad)
                      ->where('id_profesional', $profesional->id)
                    ->where('estado', 1)
                    ->whereRaw("CAST(numero_pieza AS CHAR) LIKE '5.%'") // Convierte a cadena y filtra
                    ->get();
        }else{
            $tipo = 2;
            $examenes = ExamenesDentalPieza::where('id_paciente', $id_paciente)
                    ->where('tipo_examen', $tipo)
                    ->where('tipo_especialidad', $tipo_especialidad)
                      ->where('id_profesional', $profesional->id)
                    ->where('estado', 1)
                    ->whereRaw("CAST(numero_pieza AS CHAR) LIKE '5.%'") // Convierte a cadena y filtra
                    ->get();
        }

        return $examenes;
    }

    public function dameExamenesPiezaDentalPiezaSextoCuadrante($id_paciente, $tipo_paciente, $tipo_especialidad) {
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        if($tipo_paciente == 'adulto'){
            $tipo = 1;
            $otro_tipo = 2;
            $examenes = ExamenesDentalPieza::where('id_paciente', $id_paciente)
                    ->where('tipo_examen', $tipo)
                    ->where('tipo_especialidad', $tipo_especialidad)
                      ->where('id_profesional', $profesional->id)
                    ->where('estado', 1)
                    ->whereRaw("CAST(numero_pieza AS CHAR) LIKE '6.%'") // Convierte a cadena y filtra
                    ->get();
        }else if($tipo_paciente == 'infantil'){
            $tipo = 3;
            $examenes = ExamenesDentalPieza::where('id_paciente', $id_paciente)
                    ->where('tipo_examen', $tipo)
                    ->where('tipo_especialidad', $tipo_especialidad)
                      ->where('id_profesional', $profesional->id)
                    ->where('estado', 1)
                    ->whereRaw("CAST(numero_pieza AS CHAR) LIKE '6.%'") // Convierte a cadena y filtra
                    ->get();
        }else{
            $tipo = 2;
            $examenes = ExamenesDentalPieza::where('id_paciente', $id_paciente)
                    ->where('tipo_examen', $tipo)
                    ->where('tipo_especialidad', $tipo_especialidad)
                      ->where('id_profesional', $profesional->id)
                    ->where('estado', 1)
                    ->whereRaw("CAST(numero_pieza AS CHAR) LIKE '6.%'") // Convierte a cadena y filtra
                    ->get();
        }

        return $examenes;
    }

    public function dameExamenesPiezaDentalPiezaSeptimoCuadrante($id_paciente, $tipo_paciente, $tipo_especialidad){
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        if($tipo_paciente == 'adulto'){
            $tipo = 1;
            $otro_tipo = 2;
            $examenes = ExamenesDentalPieza::where('id_paciente', $id_paciente)
                    ->where('tipo_examen', $tipo)
                    ->where('tipo_especialidad', $tipo_especialidad)
                      ->where('id_profesional', $profesional->id)
                    ->where('estado', 1)
                    ->whereRaw("CAST(numero_pieza AS CHAR) LIKE '7.%'") // Convierte a cadena y filtra
                    ->get();
        }else if($tipo_paciente == 'infantil'){
            $tipo = 3;
            $examenes = ExamenesDentalPieza::where('id_paciente', $id_paciente)
                    ->where('tipo_examen', $tipo)
                    ->where('tipo_especialidad', $tipo_especialidad)
                      ->where('id_profesional', $profesional->id)
                    ->where('estado', 1)
                    ->whereRaw("CAST(numero_pieza AS CHAR) LIKE '7.%'") // Convierte a cadena y filtra
                    ->get();
        }else{
            $tipo = 2;
            $examenes = ExamenesDentalPieza::where('id_paciente', $id_paciente)
                    ->where('tipo_examen', $tipo)
                    ->where('tipo_especialidad', $tipo_especialidad)
                      ->where('id_profesional', $profesional->id)
                    ->where('estado', 1)
                    ->whereRaw("CAST(numero_pieza AS CHAR) LIKE '7.%'") // Convierte a cadena y filtra
                    ->get();
        }

        return $examenes;
    }

    public function dameExamenesPiezaDentalPiezaOctavoCuadrante($id_paciente, $tipo_paciente, $tipo_especialidad){
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        if($tipo_paciente == 'adulto'){
            $tipo = 1;
            $otro_tipo = 2;
            $examenes = ExamenesDentalPieza::where('id_paciente', $id_paciente)
                    ->where('tipo_examen', $tipo)
                    ->where('tipo_especialidad', $tipo_especialidad)
                      ->where('id_profesional', $profesional->id)
                    ->where('estado', 1)
                    ->whereRaw("CAST(numero_pieza AS CHAR) LIKE '8.%'") // Convierte a cadena y filtra
                    ->get();
        }else if($tipo_paciente == 'infantil'){
            $tipo = 3;
            $examenes = ExamenesDentalPieza::where('id_paciente', $id_paciente)
                    ->where('tipo_examen', $tipo)
                    ->where('tipo_especialidad', $tipo_especialidad)
                      ->where('id_profesional', $profesional->id)
                    ->where('estado', 1)
                    ->whereRaw("CAST(numero_pieza AS CHAR) LIKE '8.%'") // Convierte a cadena y filtra
                    ->get();
        }else{
            $tipo = 2;
            $examenes = ExamenesDentalPieza::where('id_paciente', $id_paciente)
                    ->where('tipo_examen', $tipo)
                    ->where('tipo_especialidad', $tipo_especialidad)
                      ->where('id_profesional', $profesional->id)
                    ->where('estado', 1)
                    ->whereRaw("CAST(numero_pieza AS CHAR) LIKE '8.%'") // Convierte a cadena y filtra
                    ->get();
        }

        return $examenes;
    }

    public function dameExamenesPiezaDentalPiezaEnd($id_paciente, $id_profesional, $id_ficha_atencion){
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $examenes = ExamenesDentalPieza::where('id_paciente',$id_paciente)
        ->where('id_profesional',$profesional->id)
        ->where('tipo_examen',2)
        ->where('id_ficha_atencion', $id_ficha_atencion)
        // ->where('estado',1)
        ->get();
        return $examenes;
    }

    public function dameExamenesPiezaDentalPiezaOdontop($id_paciente){
        $examenes = ExamenesDentalPieza::where('id_paciente',$id_paciente)->where('tipo_examen',3)->where('estado',1)->get();
        return $examenes;
    }

    public function dameInfoImagenesDentalPaciente($id_paciente,$seccion, $id_ficha_atencion = null)
    {
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        // Obtén las imágenes del paciente
        $imagenes = ImagenesDentalPaciente::where('id_paciente', $id_paciente)->where('id_profesional',$profesional->id)->where('seccion',$seccion)
        ->when($id_ficha_atencion, function ($query, $id_ficha_atencion) {
            return $query->where('id_ficha_atencion', $id_ficha_atencion);
        })
        ->get();

        // Itera sobre cada imagen para procesar `paths_imagenes`
        foreach ($imagenes as $imagen) {
            if (!empty($imagen->paths_imagenes)) {
                $imagenes_decoded = json_decode($imagen->paths_imagenes, true);

                if (json_last_error() === JSON_ERROR_NONE && is_array($imagenes_decoded)) {
                    $imagen->paths_imagenes = $imagenes_decoded; // ← YA decodificado como array
                } else {
                    $imagen->paths_imagenes = [];
                }
            } else {
                $imagen->paths_imagenes = [];
            }
        }


        return $imagenes;
    }


    public function dameExamenesPiezaDentalOraxRx($id_paciente){
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $examenes = ExamenesDentalOralRx::where('id_paciente',$id_paciente)->where('id_profesional',$profesional->id)->get();
        foreach ($examenes as $e) {
            $imagenes = ImagenesDentalRxPaciente::where('id_examen', $e->id)->get();
            $e->imagenes = $imagenes;
            $nueva_lista_imagenes = []; // Inicializamos un nuevo array

            foreach ($imagenes as $i) {
                // Decodificamos el JSON contenido en el atributo `paths_imagenes`
                $decoded_paths = json_decode($i->paths_imagenes, true);

                // Creamos un nuevo objeto/array con la imagen y sus paths decodificados
                $nueva_lista_imagenes[] = [
                    'id' => $i->id,
                    'id_examen' => $i->id_examen,
                    'paths_imagenes' => $decoded_paths, // Ahora es un array decodificado
                ];
            }

            // Puedes asignar este array al objeto `$e` si lo necesitas
            $e->decoded_imagenes = $nueva_lista_imagenes; // Agregamos el array decodificado al examen
            $e->numero_piezas = json_decode($e->numero_piezas);
        }

        return $examenes;
    }

    public function dameExamenesPiezaDentalOraxRxEnd($id_paciente, $id_ficha_atencion){
        $examenes = ExamenesDentalOralRx::where('id_paciente',$id_paciente)->where('id_ficha_atencion',$id_ficha_atencion)->where('tipo_examen',2)->get();
        foreach ($examenes as $e) {
            $imagenes = ImagenesDentalRxPaciente::where('id_examen', $e->id)->get();
            $e->imagenes = $imagenes;
            $nueva_lista_imagenes = []; // Inicializamos un nuevo array

            foreach ($imagenes as $i) {
                // Decodificamos el JSON contenido en el atributo `paths_imagenes`
                $decoded_paths = json_decode($i->paths_imagenes, true);

                // Creamos un nuevo objeto/array con la imagen y sus paths decodificados
                $nueva_lista_imagenes[] = [
                    'id' => $i->id,
                    'id_examen' => $i->id_examen,
                    'paths_imagenes' => $decoded_paths, // Ahora es un array decodificado
                ];
            }

            // Puedes asignar este array al objeto `$e` si lo necesitas
            $e->decoded_imagenes = $nueva_lista_imagenes; // Agregamos el array decodificado al examen
        }

        return $examenes;
    }

    public function dameEvolucionesPacienteHosp($idpaciente){
        $controles_ciclo = EvolucionPacienteHospital::select('evoluciones_paciente_hosp.*','users.name as nombre')
                                                    ->join('users','users.id','=','evoluciones_paciente_hosp.id_responsable')
                                                    ->where('evoluciones_paciente_hosp.id_paciente', $idpaciente)
                                                    ->get();

        return $controles_ciclo;
    }

    public function dameEvolucionesPaciente($idpaciente){
        $controles_ciclo = EvolucionUrgencia::select('evoluciones_urgencias.*','users.name as nombre')
                                                    ->join('users','users.id','=','evoluciones_urgencias.id_responsable')
                                                    ->where('evoluciones_urgencias.id_paciente', $idpaciente)
                                                    ->get();

        return $controles_ciclo;
    }

    public function dameExamenesPiezaDentalDolor($id_paciente, $tipo_especialidad){
        $examenes = ExamenesDentalDolor::where('id_paciente',$id_paciente)->where('tipo_examen',1)->where('tipo_especialidad',$tipo_especialidad)->where('estado',1)->get();
        return $examenes;
    }

    public function dameExamenesPiezaDentalEndDolor($id_paciente){
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $examenes = ExamenesDentalDolor::where('id_paciente',$id_paciente)->where('id_profesional',$profesional->id)->where('tipo_examen',2)->get();
        return $examenes;
    }

	public function index_sdi(Request $request)
    {
        $hora = HoraMedica::where('id', $request->id_hora_realizar)->first();
        $paciente = Paciente::where('id', $hora->id_paciente)->first();

		// FICHAS PREVIAS Y FICHA ACTUAL(ACTIVA O NUEVA)
        $fichas = '';
        $id_ficha_atencion = '';
        $fichaAtencion = '';
        $result_fichas = static::cargarInfoFichaBase($hora);

        if($result_fichas->estado == 1)
        {
            // $fichas = (object)$result_fichas->ficha_previas;
            $id_ficha_atencion = $result_fichas->id_ficha_actual_nueva;
            $fichaAtencion = (object)$result_fichas->ficha_actual_nueva;
        }

        $pacienteDpendiente = PacientesDependientes::where('id_paciente', $paciente->id)->get()->first();
        $responsable = '';
        if($pacienteDpendiente)
        {
            $responsable = Paciente::find($pacienteDpendiente->id_responsable);
        }

		list($ano,$mes,$dia) = explode("-",$paciente->fecha_nac);
		$ano_diferencia  = date("Y") - $ano;
		$mes_diferencia = date("m") - $mes;
		$dia_diferencia   = date("d") - $dia;
		if ($dia_diferencia < 0 || $mes_diferencia < 0)
		$ano_diferencia--;

		$edad = $ano_diferencia;
		$paciente->fecha_nac = $dia.'-'.$mes.'-'.$ano;
		$paciente->edad = $edad;

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
        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();

        // LUGAR DE ATENCION
        $lugar_atencion = LugarAtencion::where('id',$request->lugar_atencion_id)->first();

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

        $receta_control = RecetaControl::orderBy('Descripcion')->get();

        $grupo_sanguineo = GrupoSanguineo::all();

        $info_video = '';
        // if($hora->tipo_hora_medica == 'T')
        // {
        //     $filtro_v = array();
        //     $filtro_v[] = array('id_hora_atencion', $hora->id);
        //     $filtro_v[] = array('id_profesional', $hora->id_profesional);
        //     $filtro_v[] = array('id_paciente', $hora->id_paciente);
        //     $info_video = VideoConsultaInfo::where($filtro_v)->first();
        // }

        /** INFO ACOMPAÑANTE */
        $responsables = '';
        $acompanantes = '';
        if(\Carbon\Carbon::parse($paciente->fecha_nac)->age < 18)
        {
            if($hora->acomp_representante == 1)
            {
                $filtro_list_PD = array();
                $filtro_list_PD[] = array('estado', 1);
                $filtro_list_PD[] = array('id_paciente', $paciente->id);
                $responsables_relacion = PacientesDependientes::where($filtro_list_PD)->pluck('id_responsable')->toArray();
                if($responsables_relacion)
                {
                    $responsables = Paciente::whereIn('id', $responsables_relacion)->get();
                }
            }

            if($hora->acomp_acompanante == 1)
            {
                if(!empty($hora->acomp_lista))
                {
                    $lista_acompanante = json_decode($hora->acomp_lista);
                    $acompanantes = Paciente::whereIn('id', $lista_acompanante)->get();
                }
            }
        }
        /** CIERRE INFO ACOMPAÑANTE */

        // INSTITUCION
        $institucion = '';
        $temp_inst = Instituciones::where('id_lugar_atencion', $request->lugar_atencion_id)->first();
        if($temp_inst)
        {
            $institucion = $temp_inst;
        }

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
		$id_usuario = Auth::user()->id;
        $userData = Funciones::userData($id_usuario);

        return view('atencion_institucional_sdi.atencion_ant_generales')->with(
            [
                'id_ficha_atencion' => $id_ficha_atencion,
                'fichaAtencion' => $fichaAtencion,
                'paciente' => $paciente,
                'direccion_paciente' => $direccion_paciente,
                'direccion_id_ciudad_paciente' => $direccion_id_ciudad_paciente,
                'direccion_txt_ciudad_paciente' => $direccion_txt_ciudad_paciente,
                'direccion_id_region_paciente' => $direccion_id_region_paciente,
                'direccion_txt_region_paciente' => $direccion_txt_region_paciente,
                'responsable' => $responsable,
                'prevision' => $prevision,
                'profesional' => $profesional,
                'medicamento' => $medicamento,
                'hora_medica' => $hora,
                'ciudades' => $ciudades,
                'regiones' => $regiones,
                'tipo_examen' => $tipoExamen,
                'control_peso' => $control_peso,
                'hipertension' => $hipertension,
                'diabetes' => $diabetes,
                'ciudad' => $ciudad,
                'id_lugar_atencion' => $request->lugar_atencion_id,
                'lugar_atencion' => $lugar_atencion,
                'institucion' => $institucion,

                'receta_control' => $receta_control,
                'grupo_sanguineo' => $grupo_sanguineo,
                'token' => $request->token,
                'direccion' => $direccion,

                /** CONSULTA VIDEO LLAMADA */
                'info_video' => $info_video,

                /** RESPONSABLES */
                'responsables'  => $responsables,
                'acompanantes'  => $acompanantes,

				'userData' => $userData,
				'alergias' => $alergias,
				'antecedentes_quirurgicos' => $antecedentes_quirurgicos,
				'antecedentes_cirugias' => $antecedentes_cirugias,
				'ant_confidenciales' => $ant_confidenciales,
				'patoligias_cronicas' => $patoligias_cronicas,
				'medicamentos_cronicos' => $medicamentos_cronicos,
				'grupo_sanguineo' => $grupo_sanguineo,

            ]
        );

    }

    public function index_hospital_amb(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if($valido)
        {
            $user = Auth::user()->id;
            $profesional = Profesional::where('id_usuario', $user)->first();

            $id_paciente = $request->id_paciente;
            if(empty($request->id_paciente)) $id_paciente = 6;
            $paciente = Paciente::where('pacientes.id', $id_paciente)->first();

            /** carga de direccion en paciente */
            $direccion = Direccion::find($paciente->id_direccion);
            if (!$direccion == null)
            {
                $ciudad = Ciudad::find($direccion->id_ciudad);
                if($ciudad)
                    $region = Region::find($ciudad->id_region);
                else
                    $region = null;
            }
            else
            {
                $direccion = null;
                $ciudad = null;
                $region = null;
            }

            $paciente->direccion = (object)array(
                'direccion' => $direccion,
                'ciudad' => $ciudad,
                'region' => $region,
            );
            
            /* FMU CONTACTO EMERGENCIA */
            $pacientes_contacto_emergencia = PacienteContactoEmergencia::with('ContactoEmergencia')->where('id_paciente',$paciente->id)->get();

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

            /** FMU ALERGIAS */
            $paciente_alergias = Antecedente::where('id_paciente', $paciente->id)->where('id_tipo_antecedente', 5)->get();

            /* ANTECEDENTES */
            $antecedentes = Antecedente::where('id_paciente',$paciente->id)->with('users','paciente','tipo_antecendente','profesional')->get();
            foreach ($antecedentes as $valor)
            {
                $valor['antecedente_data'] = json_decode($valor['data']);
            }

            $antecedentes_paciente = AntecedentesPaciente::where('id', $paciente->id_antecedente)->first();
            if (isset($antecedentes_paciente))
            {
                $medicamentos_cronicos = AntecedenteMedicamentoCronico::where('id_antecedentes', $paciente->Antecedentes()->first()->id)->get();
                $alergias = AntecedenteAlergiaPaciente::where('id_antecedentes', $paciente->Antecedentes()->first()->id)->get();
                $antecedentes_quirurgicos = SolicitudPabellonQuirurgico::where('id_paciente', $paciente->id)->get();
                $patoligias_cronicas = Antecedente::where('id_tipo_antecedente', 2)->where('id_paciente', $paciente->id)->where('estado', 1)->get();
            }
            else
            {
                $medicamentos_cronicos = [];
                $alergias = [];
                $antecedentes_quirurgicos = [];
                $patoligias_cronicas = [];
            }

            $control_peso = ControlObesidad::where('id_paciente', $paciente->id)->get();
            $hipertension = Hipertension::where('id_paciente', $paciente->id)->get();
            $diabetes = Diabete::where('id_paciente', $paciente->id)->get();

            /** resultado de examenes */
            $resultado_examen = ResultadoExamen::with('ResultadoExamenArchivo')->where('id_paciente', $paciente->id)->get();
            if($resultado_examen)
            {
                foreach ($resultado_examen as $key => $value)
                {
                    $result_tipo_ex = ExamenMedico::where('id', $value->tipo_examen)->get()->first();
                    $resultado_examen[$key]['obj_tipo_examen'] = $result_tipo_ex;
                }
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

            /** RESPONSABLES */
            $responsables = '';
            /** validar si es dependiente */
            $array_id_responsable = PacientesDependientes::where('id_paciente', $paciente->id)->pluck('id_responsable')->toArray();

            if(count($array_id_responsable) > 0)
            {
                $responsables = Paciente::whereIn('id', $array_id_responsable)->get();
            }

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

            /** RECETAS */
            $fecha_actual = date("d-m-Y");
            $regisrto_result = array();
            $lista_recetas = Recomendacion::whereDate('created_at', '>=', date("Y-m-d",strtotime($fecha_actual."- 1 week")) )->pluck('id')->toArray();
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


            /** EXAMENES DE ESPECIALIDAD REALIZADOS */
            $examenes_especialidad_realizados = ExamenEspecialidad::select('id', 'id_tipo', 'id_template', 'id_examen_tipo', 'id_sub_tipo_especialidad', 'id_ficha_atencion', 'id_ficha_especialidad', 'id_paciente', 'id_profesional', 'id_asistente', 'nombre', 'revisado', 'estado')
                                                                // ->with(['HoraMedica' => function($query){
                                                                //     $query->select('id', 'id_ficha_atencion', 'fecha_realizacion_consulta', 'id_estado');
                                                                // }])
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
            foreach ($examenes_especialidad_realizados as $key_ex_esp_realizado => $value_ex_esp_realizado)
            {
                if($value_ex_esp_realizado->id_sub_tipo_especialidad == 27)
                {
                    $filtro_h_ex_esp_ral = array();
                    $filtro_h_ex_esp_ral[] = array('id_ficha_otros_prof', $value_ex_esp_realizado->id_ficha_especialidad);
                    $filtro_h_ex_esp_ral[] = array('id_profesional', $value_ex_esp_realizado->id_profesional);
                    $hora_medica = HoraMedica::where($filtro_h_ex_esp_ral)->get()->first();
                    $examenes_especialidad_realizados[$key_ex_esp_realizado]->HoraMedica = $hora_medica;
                }
                else if($profesional->id_especialidad != 1)
                {
                    $filtro_h_ex_esp_ral = array();
                    $filtro_h_ex_esp_ral[] = array('id_ficha_otros_prof', $value_ex_esp_realizado->id_ficha_especialidad);
                    $filtro_h_ex_esp_ral[] = array('id_profesional', $value_ex_esp_realizado->id_profesional);
                    $hora_medica = HoraMedica::where($filtro_h_ex_esp_ral)->get()->first();
                    $examenes_especialidad_realizados[$key_ex_esp_realizado]->HoraMedica = $hora_medica;
                }
                else
                {
                    $filtro_h_ex_esp_ral = array();
                    $filtro_h_ex_esp_ral[] = array('id_ficha_atencion', $value_ex_esp_realizado->id_ficha_atencion);
                    $filtro_h_ex_esp_ral[] = array('id_profesional', $value_ex_esp_realizado->id_profesional);
                    $hora_medica = HoraMedica::where($filtro_h_ex_esp_ral)->get()->first();
                    $examenes_especialidad_realizados[$key_ex_esp_realizado]->HoraMedica = $hora_medica;
                }
            }

            /** resultado de examenes */
            $resultado_examen = ResultadoExamen::with('ResultadoExamenArchivo')->where('id_paciente', $paciente->id)->get();
            if($resultado_examen)
            {
                foreach ($resultado_examen as $key => $value)
                {
                    $result_tipo_ex = ExamenMedico::where('id', $value->tipo_examen)->get()->first();
                    $resultado_examen[$key]['obj_tipo_examen'] = $result_tipo_ex;
                }
            }

            $receta_control = RecetaControl::orderBy('Descripcion')->get();

            
            $examenMedico = ExamenMedico::where('cod_parent', 0)->where('habilitado', 1)->orderby('nombre_examen', 'ASC')->get();

            // triage del paciente
            $pt = PacienteTriage::where('id_paciente', $paciente->id)->first();
            

            $niveles_urgencia = AsignacionUrgencia::all();
            // Si existe un paciente en espera
            if($pt){
                foreach($niveles_urgencia as $nu){
                    if($nu->id == $pt->id_triage){
                        $paciente->clase = $nu->clase_html;
                        $paciente->descripcion = $nu->descripcion;
                    }
                }
            }

            // $datos['estado'] = 1;
            // $datos['msj'] = 'exito';

            $responsables = Responsable::all();

            $controles_ciclo = $this->dameEvolucionesPaciente($paciente->id);

            if(count($controles_ciclo) == 0)
            {
                // si no hay ciclos de control se inicia en 1 para manejar el id en la vista
                $contador_div_evaluaciones = 1;
            }else{
                // si hay ciclos de control se suma 1 para manejar el id en la vista
                $contador_div_evaluaciones = count($controles_ciclo) + 1;
            }

            foreach($controles_ciclo as $cc)
            {
                $cc->datos_evolucion = json_decode($cc->datos_evolucion);
            }

            $tipos_curaciones = CuracionesTipo::all();

            $tipos_receta = TiposReceta::all();

            $detalle_receta_controlador = new DetalleRecetaController();
            $recetas = $detalle_receta_controlador->dameTodoDetalleRecetaPaciente($paciente['id']);
           
            foreach($recetas as $receta)
            {
                if($receta->id_dosis == null){
                    $receta->dosis = $receta->nombre_dosis;
                }

                $receta->frecuencia = $receta->nombre_frecuencia;
                
            }

            // $procedimientos = $this->dameProcedimientosPaciente($paciente->id);
            // $examenControlador = new ExamenMedicoController();
            // $examenes_solicitados = $examenControlador->dame_examenes_solicitados($paciente->id);
            // $curaciones = $this->dameCuracionesPaciente($paciente->id);
            // $curaciones_planas = $this->dameCuracionesPlanasPaciente($paciente->id);
            // $enfermeraControlador = new EscritorioEnfermerasController();
            // $curaciones_lpp = $enfermeraControlador->dameCuracionesLppPaciente($paciente->id);

            // return json_encode($examenes_solicitados[0]->datos_examen->lado);
            // variable que identifica si el usuario es enfermera
            $enfermera = false;

            // ultimo controla de ciclo 
            $ultimo_control_ciclo = EvolucionUrgencia::where('id_paciente', $paciente->id)->orderBy('id', 'desc')->first();
            if($ultimo_control_ciclo)
                $ultimo_control_ciclo->datos_evolucion = json_decode($ultimo_control_ciclo->datos_evolucion);

                

            $tieneRecetaPendiente_ = false;
            // buscar recetas con estado 1
            foreach($recetas as $key => $receta)
            {
                if($receta->estado_tratamiento == 1)
                {
                    $tieneRecetaPendiente_ = true;
                    break;
                }
            }


        //     $bc = new BoxController();
        //     $boxes = $bc->dame_boxes_atencion();

        //             // dame los pacientes que esten en cada box
        // foreach($boxes as $box)
        // {
        //     $box->pacientes = $this->dame_pacientes_box($box->id);
        //     // guardar la edad de cada paciente por el atributo fecha_nac
        //     foreach($box->pacientes as $paciente_box)
        //     {
        //         list($ano,$mes,$dia) = explode("-",$paciente_box->fecha_nac);
        //         $ano_diferencia  = date("Y") - $ano;
        //         $mes_diferencia = date("m") - $mes;
        //         $dia_diferencia   = date("d") - $dia;
        //         if ($dia_diferencia < 0 || $mes_diferencia < 0)
        //         $ano_diferencia--;

        //         $edad = $ano_diferencia;
        //         $paciente_box->edad = $edad;
                
        //         $detalle_receta_controlador = new DetalleRecetaController();
        //         $recetas_ = $detalle_receta_controlador->dameTodoDetalleRecetaPaciente($paciente_box->id_paciente);
                
        //         // Inicializar la variable booleana como false
        //         $tieneRecetaPendiente = false;
        //         // Recorrer las recetas
        //         foreach ($recetas_ as $receta) {
        //             // Suponiendo que 'estado' es el campo que indica si la receta está pendiente
        //             if ($receta->estado_tratamiento == 1) {
        //                 // Si se encuentra una receta pendiente, cambiar la variable a true
        //                 $tieneRecetaPendiente = true;
        //                 // Salir del ciclo
        //                 break;
        //             }
        //         }

        //         $paciente_box->tieneRecetaPendiente = $tieneRecetaPendiente;
        //     }
        // }

        // $pacientes_esperando = $this->dame_pacientes_en_espera();

        $resumen_recetas = "";
            foreach($recetas as $r){
                $resumen_recetas .= "<p>".$r->nombre_medicamento." ".$r->dosis." ".$r->nombre_frecuencia." ".$r->duracion." ".$r->comentario." con fecha ".$r->created_at."</p>";
            }


        // $examen_sad_person = $this->dame_examen_sad_person($paciente->id);

        $regiones = Region::all();
        $ciudades = Ciudad::all();

        // $tipos_roles_incidentes = TipoRolesIncidentePaciente::all();
        // $tipos_apreciaciones_paciente = TipoApreciacionClinicaPaciente::all();
        // $boleta_alcoholemia_paciente = $this->dame_boleta_alcoholemia_paciente($paciente->id);

        $ficha_atencion = FichaAtencion::where('id_paciente', $paciente->id)->first();

        // $rescate_paciente = RescatePaciente::where('id_paciente', $paciente->id)->where('id_ficha_atencion',$ficha_atencion->id)->first();

        // $examen_drogas = $this->dame_examen_drogas($paciente->id, $ficha_atencion->id);

        $lugar_atencion = LugarAtencion::find($ficha_atencion->id_lugar_atencion);


            return view('atencion_hospital_ambulatorio.atencion_medica')->with([
                'paciente' => $paciente,
                'responsables' => $responsables,
                'controles_ciclo' => $controles_ciclo,
                'ultimo_control_ciclo' => $ultimo_control_ciclo,
                'niveles_urgencia' => $niveles_urgencia,
                'contador_div_evaluaciones' => $contador_div_evaluaciones,
                'tipos_curaciones' => $tipos_curaciones,
                'tipos_receta' => $tipos_receta,
                'recetas' => $recetas,
                'tiene_receta_pendiente' => $tieneRecetaPendiente_,
                'resumen_recetas' => $resumen_recetas,
                'direccion_txt_ciudad_paciente' => '',
                'direccion_id_region_paciente' => 1,
                // 'procedimientos' => $procedimientos,
                // 'examenes_solicitados' => $examenes_solicitados,
                // 'examen_sad_person' => $examen_sad_person,
                // 'rescate_paciente' => $rescate_paciente,
                // 'examen_drogas' => $examen_drogas ? $examen_drogas : null,
                // 'curaciones' => $curaciones,
                // 'curacion_plana' => $curaciones_planas,
                // 'curaciones_lpp' => $curaciones_lpp,
                'enfermera' => $enfermera,
                // 'responsable' => $responsable,
                'pacientes_contacto_emergencia' => $pacientes_contacto_emergencia,
                'paciente_alergias' => $paciente_alergias,
                // 'prevision' => $prevision,
                'profesional' => $profesional,
                'ciudades' => $ciudades,
                'regiones' => $regiones,
                // 'tipo_roles_incidentes' => $tipos_roles_incidentes,
                // 'tipos_apreciaciones_paciente' => $tipos_apreciaciones_paciente,
                // 'boleta_alcoholemia_paciente' => $boleta_alcoholemia_paciente,
                // // 'medicamento' => $medicamento,
                // 'hora_medica' => $hora,
                // 'fichas' => $fichas,
                // 'ciudades' => $ciudades,
                // 'regiones' => $regiones,
                // 'tipo_examen' => $tipoExamen,
                'control_peso' => $control_peso,
                'hipertension' => $hipertension,
                'diabetes' => $diabetes,
                // 'ciudad' => $ciudad,
                'examenMedico' => $examenMedico,
                // 'medicamentos_cronicos' => $medicamentos_cronicos,
                // 'alergias' => $alergias,
                // 'antecedentes_quirurgicos' => $antecedentes_quirurgicos,
                'patoligias_cronicas' => $patoligias_cronicas,
                // 'fichaAtencion' => $fichaAtencion,
                'id_lugar_atencion' => $request->lugar_atencion_id,
                'lugar_atencion' => $lugar_atencion,
                // 'lugares_atencion ' => $lugares_atencion ,
                'id_ficha_atencion' => $pt->id_ficha_atencion,
                'fichaAtencion' => $ficha_atencion,
                // 'especialidad' => $especialidad,
                // 'interconsulta' => $interconsulta,
                // 'fichaTipo' => $fichaTipo,
                // 'examen_tipo' => $examen_tipo,
                // 'examen' => $examen,
                // 'lista_examen_especial' => $lista_examen_especial,
                // 'examenes_especialidad' => $examenes_especialidad,
                // 'examenes_radiologicos' => $examenes_radiologicos,
                'examenes_especialidad_realizados' => $examenes_especialidad_realizados,
                // 'institucion' => $institucion,
                // 'cns_tipo' => $cns_tipo,
                // 'cns_tipo_template' => $cns_tipo_template,
                // 'cns_registros' => $cns_registros,
                'resultado_examen' => $resultado_examen,
                // 'tipo_antecedente' => $tipo_antecedente,
                'receta_control' => $receta_control,

                /** FMU */
                // 'id_usuario' => $id_usuario,
                //// 'paciente' => $paciente,
                // 'contacto_emergencia' => $contacto_emergencia,
                'antecedentes_paciente' => $antecedentes_paciente,
                'grupo_sanguineo' => $grupo_sanguineo,
                'antecedentes' => $antecedentes,
                'token' => $request->token,
                // 'fichas' => $fichas,
                // 'especialidad' => $especialidad,
                // 'sub_tipo_especialidad' => $sub_tipo_especialidad,
                'direccion' => $direccion,
                'ciudad' => $ciudad,
                'region' => $region,
                'datos' => $datos, // TEMPLATE PARA USO EN MODAL INCLUDE
                'tratamiento_activo' => $regisrto_result,
                //// 'examenes_especialidad_realizados' => $examenes_especialidad_realizados,
                //// 'resultado_examen' => $resultado_examen,
                'control_enfer_cronicas' => $control_enfer_cronicas,

                // 'ficha_ges' => $ges,
                // 'direccion' => $direccion,
                /*'contacto' => $contacto,
                'contacto_direccion'=> $contacto_direccion,
                'contacto_ciudad' => $contacto_ciudad,*/
                // 'licencia' => $licencia,

                /** RESPONSABLES */
                // 'responsables'  => $responsables,
                // 'acompanantes'  => $acompanantes,
            ]);
        }
        else
        {
            
            $datos['estado'] = 0;
            $datos['msj'] = 'Campo requerido';
            $datos['error'] = $error;
            return redirect()->back()->with(['mensaje'=>'Paciente reuqerido']);
        }
    }

    /** no se utiliza  s eutiliza index */
    // public function index2(Request $request) //profesional provisorio
    // {
    //     $hora = HoraMedica::where('id', $request->id_hora_realizar)->first();
    //     $paciente = Paciente::where('id', $request->id_paciente)->first();
    //     $ciudades = Ciudad::where('id_region', $paciente->Direccion()->first()->Ciudad()->first()->id_region)->get();
    //     $regiones = Region::all();
    //     // $examenMedico = ExamenMedico::where('cod_parent', 0)->whereBetween('id',[1,362])->orderby('nombre_examen', 'ASC')->get();
    //     $examenMedico = ExamenMedico::where('cod_parent', 0)->where('habilitado', 1)->orderby('nombre_examen', 'ASC')->get();
    //     $user = Auth::user()->id;
    //     $profesional = Profesional::where('id_usuario', $user)->first();

    //     // CONSULTAS PREVIAS
    //     // $fichas = FichaAtencion::where('id_paciente', $hora->id_paciente)->where('confidencial', false)->where('finalizada', 1)->get();
    //     $filtro_previas = array();
    //     $filtro_previas[] = array('id_paciente', $request->id_paciente);
    //     $filtro_previas[] = array('confidencial', '0');
    //     $filtro_previas[] = array('finalizada', 1);
    //     $filtro_previas[] = array('id_profesional', $profesional->id);
    //     $fichas = FichaAtencion::where($filtro_previas)->get();

    //     // LUGAR DE ATENCION
    //     $lugar_atencion = LugarAtencion::where('id',$request->lugar_atencion_id)->first();
    //     $lugares_atencion  = LugarAtencion::all();

    //     // FICHA DE ATENCION ACTUAL
    //     // $fichaAtencion = FichaAtencion::where('id_paciente', $hora->id_paciente)->where('confidencial', false)->where('finalizada', 0)->first();
    //     // $fichaAtencion = FichaAtencion::where('id_paciente', $hora->id_paciente)->where('finalizada', 0)->first();
    //     $filtro_fichaAtencion = array();
    //     $filtro_fichaAtencion[] = array('id_paciente', $request->id_paciente);
    //     // $filtro_fichaAtencion[] = array('confidencial', false);
    //     // $filtro_fichaAtencion[] = array('finalizada', 0);

    //     if(!empty($hora->id_ficha_atencion))
    //         $filtro_fichaAtencion[] = array('id', $hora->id_ficha_atencion);
    //     $fichaAtencion = FichaAtencion::where($filtro_fichaAtencion)->first();

    //     $antecedentes = AntecedentesPaciente::where('id', $paciente->id_antecedente)->first();

    //     if (isset($antecedentes)) {

    //         $medicamentos_cronicos = AntecedenteMedicamentoCronico::where('id_antecedentes', $paciente->Antecedentes()->first()->id)->get();
    //         $alergias = AntecedenteAlergiaPaciente::where('id_antecedentes', $paciente->Antecedentes()->first()->id)->get();
    //         $antecedentes_quirurgicos = SolicitudPabellonQuirurgico::where('id_paciente', $paciente->id)->get();
    //         // $patoligias_cronicas = AntecedenteEnferCronica::where('id_antecedentes', $paciente->Antecedentes()->first()->id)->get();
    //         $patoligias_cronicas = Antecedente::where('id_tipo_antecedente', 2)->where('id_paciente', $paciente->id)->where('estado', 1)->get();
    //     } else {
    //         $medicamentos_cronicos = [];
    //         $alergias = [];
    //         $antecedentes_quirurgicos = [];
    //         $patoligias_cronicas = [];
    //     }

    //     if( !empty($fichaAtencion) )
    //         $id_ficha_atencion = $fichaAtencion->id;


    //     // 5 realizando
    //     // 6 realizada
    //     //if ($hora->id_estado != 5 && $hora->id_estado != 6)
    //     //{
    //         $nueva_ficha_atencion = new FichaAtencion();
    //         $nueva_ficha_atencion->id_paciente = $paciente->id;
    //         $nueva_ficha_atencion->id_profesional = $profesional->id;
    //         $nueva_ficha_atencion->id_lugar_atencion = $request->lugar_atencion_id;

    //         if (!$nueva_ficha_atencion->save()) {
    //             return back()->with('mensaje', 'error');
    //         }
    //         else
    //         {
    //             $id_ficha_atencion = $nueva_ficha_atencion->id;
    //         }

    //         $hora->id_estado = 5;
    //         $hora->fecha_realizacion_consulta = now();
    //         $hora->id_ficha_atencion = $nueva_ficha_atencion->id;

    //         if (!$hora->save()) {
    //             return back()->with('mensaje', 'error');
    //         }

    //     //}

    //     $prevision = Prevision::all();
    //     $medicamento = Producto::all();
    //     $tipoExamen = TipoExamen::all();
    //     // $control_peso = ControlObesidad::where('id_paciente', $paciente->id)->where('id_profesional', $profesional->id)->get();
    //     $control_peso = ControlObesidad::where('id_paciente', $paciente->id)->get();
    //     // $hipertension = Hipertension::where('id_paciente', $paciente->id)->where('id_profesional', $profesional->id)->get();
    //     $hipertension = Hipertension::where('id_paciente', $paciente->id)->get();
    //     // $diabetes = Diabete::where('id_paciente', $paciente->id)->where('id_profesional', $profesional->id)->get();
    //     $diabetes = Diabete::where('id_paciente', $paciente->id)->get();
    //     $direccion = $paciente->Direccion()->first();
    //     if (!$direccion == null) {
    //         $ciudad = $direccion->Ciudad()->first();
    //     } else {
    //         $direccion = null;
    //         $ciudad = null;
    //     }

    //     $fichaTipo = array();

    //     $ruta_blade = '';
    //     // if( $user == 3)
    //     // {

    //     //     // $ruta_blade = 'atencion_medica.atencion_medica_otorrinolaringologia';
    //     //     // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();

    //     //     $ruta_blade = 'atencion_medica.atencion_medica_urologia';
    //     //     $fichaTipo = '';

    //     //     // $ruta_blade = 'atencion_medica.atencion_medica_dermatologia';
    //     //     // $fichaTipo = '';
    //     // }
    //     // else
    //     // {
    //         if($profesional->id_sub_tipo_especialidad == 20)
    //         {
    //             //oftalmologia
    //             $ruta_blade = 'atencion_medica.atencion_medica_oftalmologia';
    //             $fichaTipo['oft'] = FichaOftTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //             $fichaTipo['bio'] = FichaOftBiomicroscopiaTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //             $fichaTipo['fo'] = FichaOftFondoOjoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();

    //             $examen = '';
    //             $lista_examen_especial = '';

    //             /** examenes de la especialidad */
    //             $examenes_especialidad = '';
    //             $examenes_especialidad = ExamenMedico::whereIn('cod_parent',[601])->orderBy('nombre_examen', 'ASC')->get();

    //             /** examenes radiologicos */
    //             $examenes_radiologicos = '';
    //             $examenes_radiologicos = ExamenMedico::whereIn('cod_parent',[355,356,357,358,359,360,361])->orderBy('nombre_examen', 'ASC')->get();
    //         }
    //         else if($profesional->id_sub_tipo_especialidad == 21)
    //         {
    //             //otorrinolaringologia
    //             $ruta_blade = 'atencion_medica.atencion_medica_otorrinolaringologia';
    //             $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();

    //             $examen_tipo = ExamenEspecialidadTipo::where('id_sub_tipo_especialidad', $profesional->id_sub_tipo_especialidad)->with('ExamenEspecialidadTemplate')->first();
    //             $examen = $examen_tipo->ExamenEspecialidadTemplate->cuerpo;
    //             $lista_examen_especial = '';

    //             /** examenes de la especialidad */
    //             $examenes_especialidad = '';
    //             $examenes_especialidad = ExamenMedico::whereIn('cod_parent',[582])->orderBy('nombre_examen', 'ASC')->get();

    //             /** examenes radiologicos */
    //             $examenes_radiologicos = '';
    //             $examenes_radiologicos = ExamenMedico::whereIn('cod_parent',[355,356,357,358,359,360,361])->orderBy('nombre_examen', 'ASC')->get();


    //         }
    //         else if($profesional->id_sub_tipo_especialidad == 22)
    //         {
    //             $examen = array();
    //             //UROLOGIA
    //             $ruta_blade = 'atencion_medica.atencion_medica_urologia';
    //             $fichaTipo['uro'] = FichaUroTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //             $lista_examen_especial = '';
    //             $examen_tipo = ExamenEspecialidadTipo::where('id_sub_tipo_especialidad', $profesional->id_sub_tipo_especialidad)->with('ExamenEspecialidadTemplate')->get();
    //             foreach ($examen_tipo as $key => $value)
    //             {
    //                 $examen[$value->ExamenEspecialidadTemplate->alias] = $value->ExamenEspecialidadTemplate->cuerpo;
    //                 $lista_examen_especial .= $value->ExamenEspecialidadTemplate->alias.','.$value->id.','.$value->ExamenEspecialidadTemplate->id.'|';
    //             }
    //             $lista_examen_especial = substr($lista_examen_especial, 0, -1);

    //             /** examenes de la especialidad */
    //             $examenes_especialidad = '';

    //             /** examenes radiologicos */
    //             $examenes_radiologicos = '';


    //         }
    //         else if($profesional->id_sub_tipo_especialidad == 19)
    //         {
    //             //dermatologia
    //             $ruta_blade = 'atencion_medica.atencion_medica_dermatologia';
    //             // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //             $fichaTipo = '';
    //             $examen = '';
    //             $lista_examen_especial = '';

    //             /** examenes de la especialidad */
    //             $examenes_especialidad = '';

    //             /** examenes radiologicos */
    //             $examenes_radiologicos = '';
    //         }
    //         else if($profesional->id_sub_tipo_especialidad == 27)
    //         {
    //             //gineco obstetricia
    //             $ruta_blade = 'atencion_gine_obstetricia.atencion_gine_obst_general';
    //             // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //             $fichaTipo = '';
    //             $examen = '';
    //             $lista_examen_especial = '';

    //             /** examenes de la especialidad */
    //             $examenes_especialidad = '';

    //             /** examenes radiologicos */
    //             $examenes_radiologicos = '';
    //         }
    //         else if($profesional->id_sub_tipo_especialidad == 78)
    //         {
    //             //pediatria general
    //             $ruta_blade = 'atencion_pediatrica.atencion_pediatrica_general';
    //             $fichaTipo['ped_gen'] = FichaPediatriaGeneralTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //             // $fichaTipo['bio'] = FichaOftBiomicroscopiaTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //             // $fichaTipo['fo'] = FichaOftFondoOjoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //             $examen = '';
    //             $lista_examen_especial = '';

    //             /** examenes de la especialidad */
    //             $examenes_especialidad = '';

    //             /** examenes radiologicos */
    //             $examenes_radiologicos = '';
    //         }
    //         else if($profesional->id_sub_tipo_especialidad == 72)
    //         {
    //             //NEONATOLOGIA
    //             $ruta_blade = 'atencion_pediatrica.atencion_pediatrica_neonatologia';
    //             // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //             $fichaTipo = '';
    //             $examen = '';
    //             $lista_examen_especial = '';

    //             /** examenes de la especialidad */
    //             $examenes_especialidad = '';

    //             /** examenes radiologicos */
    //             $examenes_radiologicos = '';
    //         }
    //         else if($profesional->id_tipo_especialidad == 53 && empty($profesional->id_sub_tipo_especialidad))
    //         {
    //             // ATENCIÓN ENFERMERA CONTROL NIÑO SANO
    //             $ruta_blade = 'atencion_pediatrica.atencion_enfermeria_control_nino_sano';
    //             $fichaTipo = '';
    //             $examen = '';
    //             $lista_examen_especial = '';

    //             /** examenes de la especialidad */
    //             $examenes_especialidad = '';

    //             /** examenes radiologicos */
    //             $examenes_radiologicos = '';
    //         }
    //         else if($profesional->id_tipo_especialidad == 108 && empty($profesional->id_sub_tipo_especialidad))
    //         {
    //             // ATENCIÓN ENFERMERA CONTROL NIÑO SANO
    //             $ruta_blade = 'atencion_pediatrica.control_nino_sano';
    //             // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //             $fichaTipo = '';
    //             $examen = '';
    //             $lista_examen_especial = '';

    //             /** examenes de la especialidad */
    //             $examenes_especialidad = '';

    //             /** examenes radiologicos */
    //             $examenes_radiologicos = '';
    //         }
    //         else if($profesional->id_tipo_especialidad == 51 && empty($profesional->id_sub_tipo_especialidad))
    //         {
    //             // MATRONA CONTROL NIÑO SANO
    //             $ruta_blade = 'atencion_pediatrica.atencion_matrona_control_nino_sano';
    //             // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //             $fichaTipo = '';
    //             $examen = '';
    //             $lista_examen_especial = '';

    //             /** examenes de la especialidad */
    //             $examenes_especialidad = '';

    //             /** examenes radiologicos */
    //             $examenes_radiologicos = '';
    //         }

    //         // 1 Cirugía Abdominal General -> atencion_medica_cirugia_digestiva_general
    //         // 7 Cirugía Coloproctológica -> atencion_medica_cirugia_digestiva_baja
    //         // 11 Cirugía digestiva -> atencion_medica_cirugia_digestiva_general
    //         // 12 Cirugía Gástrica -> atencion_medica_cirugia_digestiva_alta

    //         else if($profesional->id_sub_tipo_especialidad == 1)
    //         {
    //             // Cirugía digestiva general
    //             $ruta_blade = 'atencion_medica.atencion_medica_cirugia_digestiva_general';
    //             // $fichaTipo = FichaCirugiaDigestivaTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //             // $fichaTipo = FichaCirugiaDigestivaTipo::get();
    //             // var_dump($profesional->id);
    //             // var_dump($fichaTipo);
    //             // die();
    //             $examen = '';
    //             $lista_examen_especial = '';

    //             /** examenes de la especialidad */
    //             $examenes_especialidad = '';

    //             /** examenes radiologicos */
    //             $examenes_radiologicos = '';
    //         }
    //         else if($profesional->id_sub_tipo_especialidad == 7)
    //         {
    //             $examen = array();
    //             // Cirugía Coloproctológica
    //             $ruta_blade = 'atencion_medica.atencion_medica_cirugia_digestiva_baja';
    //             $fichaTipo['cdg'] = FichaCirugiaDigestivaTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //             $fichaTipo['cg'] = FichaCirugiaGeneralTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //             $lista_examen_especial = '';
    //             $examen_tipo = ExamenEspecialidadTipo::where('id_sub_tipo_especialidad', $profesional->id_sub_tipo_especialidad)->with('ExamenEspecialidadTemplate')->get();
    //             foreach ($examen_tipo as $key => $value)
    //             {
    //                 $examen[$value->ExamenEspecialidadTemplate->alias] = $value->ExamenEspecialidadTemplate->cuerpo;
    //                 $lista_examen_especial .= $value->ExamenEspecialidadTemplate->alias.','.$value->id.','.$value->ExamenEspecialidadTemplate->id.'|';
    //             }
    //             $lista_examen_especial = substr($lista_examen_especial, 0, -1);

    //             /** examenes de la especialidad */
    //             $examenes_especialidad = '';

    //             /** examenes radiologicos */
    //             $examenes_radiologicos = '';
    //         }
    //         else if($profesional->id_sub_tipo_especialidad == 11 )
    //         {
    //             $examen = array();
    //             // Cirugía digestiva
    //             $ruta_blade = 'atencion_medica.atencion_medica_cirugia_digestiva_general';
    //             $fichaTipo['cdg'] = FichaCirugiaDigestivaTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //             $fichaTipo['cg'] = FichaCirugiaGeneralTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();

    //             $lista_examen_especial = '';
    //             $examen_tipo = ExamenEspecialidadTipo::where('id_sub_tipo_especialidad', $profesional->id_sub_tipo_especialidad)->with('ExamenEspecialidadTemplate')->get();
    //             foreach ($examen_tipo as $key => $value)
    //             {
    //                 $examen[$value->ExamenEspecialidadTemplate->alias] = $value->ExamenEspecialidadTemplate->cuerpo;
    //                 $lista_examen_especial .= $value->ExamenEspecialidadTemplate->alias.','.$value->id.','.$value->ExamenEspecialidadTemplate->id.'|';
    //             }
    //             $lista_examen_especial = substr($lista_examen_especial, 0, -1);

    //             /** examenes de la especialidad */
    //             $examenes_especialidad = '';

    //             /** examenes radiologicos */
    //             $examenes_radiologicos = '';

    //         }
    //         else if($profesional->id_sub_tipo_especialidad == 12 )
    //         {
    //             $examen = array();

    //             // Cirugía Gástrica
    //             $ruta_blade = 'atencion_medica.atencion_medica_cirugia_digestiva_alta';
    //             // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //             $fichaTipo['cdg'] = FichaCirugiaDigestivaTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //             $fichaTipo['cg'] = FichaCirugiaGeneralTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //             $lista_examen_especial = '';
    //             $examen_tipo = ExamenEspecialidadTipo::where('id_sub_tipo_especialidad', $profesional->id_sub_tipo_especialidad)->with('ExamenEspecialidadTemplate')->get();
    //             foreach ($examen_tipo as $key => $value)
    //             {
    //                 $examen[$value->ExamenEspecialidadTemplate->alias] = $value->ExamenEspecialidadTemplate->cuerpo;
    //                 $lista_examen_especial .= $value->ExamenEspecialidadTemplate->alias.','.$value->id.','.$value->ExamenEspecialidadTemplate->id.'|';
    //             }
    //             $lista_examen_especial = substr($lista_examen_especial, 0, -1);

    //             /** examenes de la especialidad */
    //             $examenes_especialidad = '';

    //             /** examenes radiologicos */
    //             $examenes_radiologicos = '';
    //         }
	// 		else if($profesional->id_sub_tipo_especialidad == 119 )
    //         {
    //             // Cirugía General
    //             $ruta_blade = 'atencion_medica.atencion_medica_cirugia_general';
    //             $fichaTipo['cg'] = FichaCirugiaGeneralTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //            // $fichaTipo = '';
    //             $examen = '';
	// 			$lista_examen_especial = '';

    //             /** examenes de la especialidad */
    //             $examenes_especialidad = '';

    //             /** examenes radiologicos */
    //             $examenes_radiologicos = '';
    //         }
    //         else if($profesional->id_sub_tipo_especialidad == 120 )
    //         {
    //             // Cirugía Pediatrica General
    //             $ruta_blade = 'atencion_pediatrica.atencion_pediatrica_cirugia';
    //             // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //             $fichaTipo = '';
    //             $examen = '';
	// 			$lista_examen_especial = '';

    //             /** examenes de la especialidad */
    //             $examenes_especialidad = '';

    //             /** examenes radiologicos */
    //             $examenes_radiologicos = '';
    //         }
    //         else if($profesional->id_sub_tipo_especialidad == 66 )
    //         {
    //             // Cirugía Pediatrica General
    //             $ruta_blade = 'atencion_pediatrica.atencion_pediatrica_cirugia';
    //             // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //             $fichaTipo = '';
    //             $examen = '';
	// 			$lista_examen_especial = '';

    //             /** examenes de la especialidad */
    //             $examenes_especialidad = '';

    //             /** examenes radiologicos */
    //             $examenes_radiologicos = '';
    //         }
    //         else if($profesional->id_tipo_especialidad == 25 )
    //         {
    //             // KINESIOLOGIA GENERAL
    //             $ruta_blade = 'atencion_otros_prof.atencion_kine';
    //             // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //             $fichaTipo = '';
    //             $examen = '';
	// 			$lista_examen_especial = '';

    //             /** examenes de la especialidad */
    //             $examenes_especialidad = '';

    //             /** examenes radiologicos */
    //             $examenes_radiologicos = '';
    //         }
    //         else if($profesional->id_tipo_especialidad == 28 )
    //         {
    //             // FONOAUDIOLOGIA CLÍNICA ADULTOS Y NIÑOS
    //             $ruta_blade = 'atencion_otros_prof.atencion_fono';
    //             // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //             $fichaTipo = '';
    //             $examen = '';
	// 			$lista_examen_especial = '';

    //             /** examenes de la especialidad */
    //             $examenes_especialidad = '';

    //             /** examenes radiologicos */
    //             $examenes_radiologicos = '';
    //         }
    //         else if($profesional->id_tipo_especialidad == 34 && empty($profesional->id_sub_tipo_especialidad))
    //         {
    //             // ATENCIÓN PSICOLOGIA
    //             $ruta_blade = 'atencion_otros_prof.atencion_psicologia';
    //             // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //             $fichaTipo = '';
    //             $examen = '';
    //             $lista_examen_especial = '';

	// 			/** examenes de la especialidad */
    //             $examenes_especialidad = '';

    //             /** examenes radiologicos */
    //             $examenes_radiologicos = '';
    //         }
    //         else if($profesional->id_tipo_especialidad == 31 && empty($profesional->id_sub_tipo_especialidad))
    //         {
    //             // ATENCIÓN NUTRICION
    //             $ruta_blade = 'atencion_otros_prof.atencion_nutricion';
    //             // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //             $fichaTipo = '';
    //             $examen = '';
    //             $lista_examen_especial = '';

    //             /** examenes de la especialidad */
    //             $examenes_especialidad = '';

    //             /** examenes radiologicos */
    //             $examenes_radiologicos = '';
    //         }
    //         else if($profesional->id_tipo_especialidad == 54 && empty($profesional->id_sub_tipo_especialidad))
    //         {
    //             // TECNOLOGO ORL
    //             $ruta_blade = 'atencion_otros_prof.atencion_tecn_orl';
    //             // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //             $fichaTipo = '';
    //             $examen = '';
    //             $lista_examen_especial = '';

    //             /** examenes de la especialidad */
    //             $examenes_especialidad = '';

    //             /** examenes radiologicos */
    //             $examenes_radiologicos = '';
    //         }
    //         else if($profesional->id_tipo_especialidad == 55 && empty($profesional->id_sub_tipo_especialidad))
    //         {
    //             // EXAMENES ORL
    //             $ruta_blade = 'atencion_otros_prof.atencion_tecn_orl';
    //             // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //             $fichaTipo = '';
    //             $examen = '';
    //             $lista_examen_especial = '';

    //             /** examenes de la especialidad */
    //             $examenes_especialidad = '';

    //             /** examenes radiologicos */
    //             $examenes_radiologicos = '';
    //         }
    //         /** traumatologia - 13 */
    //         else if($profesional->id_tipo_especialidad == 13 && $profesional->id_sub_tipo_especialidad == 85)
    //         {
    //             // TRAUMATOLOGIA GENERAL
    //             $ruta_blade = 'atencion_medica.atencion_traumatologia_general';
    //             // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //             $fichaTipo = '';
    //             $examen = '';
    //             $lista_examen_especial = '';

    //             /** examenes de la especialidad */
    //             $examenes_especialidad = '';

    //             /** examenes radiologicos */
    //             $examenes_radiologicos = '';
    //         }
    //         else
    //         {
    //             $ruta_blade = 'atencion_medica.atencion_medica';
    //             $fichaTipo = '';
    //             $examen = '';
    //             $lista_examen_especial = '';

    //             /** examenes de la especialidad */
    //             $examenes_especialidad = '';

    //             /** examenes radiologicos */
    //             $examenes_radiologicos = '';
    //         }
    //     // }

    //     // INTERCONSULTA
    //     $filtro_inter = array();
    //     $filtro_inter[] = array('id_paciente', $paciente->id);
    //     if((int)$profesional->id_especialidad>0)
    //         $filtro_inter[] = array('id_especialidad', $profesional->id_especialidad);//especialiadd
    //     if((int)$profesional->id_tipo_especialidad>0)
    //         $filtro_inter[] = array('id_tipos_especialidad', $profesional->id_tipo_especialidad);//tipo_espacialidad
    //     if((int)$profesional->id_sub_tipo_especialidad>0)
    //         $filtro_inter[] = array('id_sub_tipo_especialidad', $profesional->id_sub_tipo_especialidad);//sub_tipo_especialidad
    //     $filtro_inter[] = array('estado', 1);//pendiente por respuesta
    //     $interconsulta = Interconsulta::where($filtro_inter)->first();

    //     // informacion ges
    //     // $filtro_ges = array();
    //     // $filtro_ges[] = array('id_ficha_atencion',$id_ficha_atencion);
    //     // $ges = GesRegistros::where($filtro_ges)->first();

    //     // ESPECIALIDAD -> PROFESION
    //     $especialidad = Especialidad::all();

    //     return view($ruta_blade)->with(
    //         [
    //             'paciente' => $paciente,
    //             'prevision' => $prevision,
    //             'profesional' => $profesional,
    //             'medicamento' => $medicamento,
    //             'hora_medica' => $hora, //quitado
    //             'fichas' => $fichas,
    //             'ciudades' => $ciudades,
    //             'regiones' => $regiones,
    //             'tipo_examen' => $tipoExamen,
    //             'control_peso' => $control_peso,
    //             'hipertension' => $hipertension,
    //             'diabetes' => $diabetes,
    //             'ciudad' => $ciudad,
    //             'examenMedico' => $examenMedico,
    //             'medicamentos_cronicos' => $medicamentos_cronicos,
    //             'alergias' => $alergias,
    //             'antecedentes_quirurgicos' => $antecedentes_quirurgicos,
    //             'patoligias_cronicas' => $patoligias_cronicas,
    //             'fichaAtencion' => $fichaAtencion,
    //             'id_lugar_atencion' => $request->lugar_atencion_id,
    //             'lugar_atencion' => $lugar_atencion,
    //             'lugares_atencion ' => $lugares_atencion ,
    //             'id_ficha_atencion' => $id_ficha_atencion,
    //             'especialidad' => $especialidad,
    //             'interconsulta' => $interconsulta,
    //             'fichaTipo' => $fichaTipo,
    //             'examen' => $examen,
    //             'lista_examen_especial' => $lista_examen_especial,
    //             'examenes_especialidad' => $examenes_especialidad,
    //             'examenes_radiologicos' => $examenes_radiologicos,


    //             // 'ficha_ges' => $ges,
    //             // 'direccion' => $direccion,
    //             /*'contacto' => $contacto,
    //             'contacto_direccion'=> $contacto_direccion,
    //             'contacto_ciudad' => $contacto_ciudad,*/

    //         ]
    //     );
    // }

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
        if(!empty($request->id_profesional))
            $profesional = Profesional::where('id', $request->id_profesional)->first();
        else
            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

        $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();

        $diabetes = new Diabete();
        $diabetes->peso = $request->peso;
        $diabetes->pies = $request->pies;
        $diabetes->hgac1 = $request->hgac1;
        $diabetes->colesterol = (empty($request->colesterol)?null:$request->colesterol);
        $diabetes->creatina = (empty($request->creatina)?null:$request->creatina);
        $diabetes->glucosuria = (empty($request->glucosuria)?null:$request->glucosuria);
        $diabetes->glicosilada_postprandial = (empty($request->glicosilada_postprandial)?null:$request->glicosilada_postprandial);
        $diabetes->glicosilada_ayuno = (empty($request->glicosilada_ayuno)?null:$request->glicosilada_ayuno);
        $diabetes->tamano_fetal = (empty($request->tamano_fetal)?null:$request->tamano_fetal);
        $diabetes->id_paciente = $hora_medica->id_paciente;
        $diabetes->id_profesional = $profesional->id;
        $diabetes->id_ficha_atencion = (empty($hora_medica->id_ficha_atencion)?null:$hora_medica->id_ficha_atencion);

        if($profesional->id_especialidad == 1 && $profesional->id_tipo_especialidad == 3)
        {
            $diabetes->id_ficha_otros_prof = null;
            $diabetes->id_ficha_gineco_obstetrica = $hora_medica->id_ficha_otros_prof;
        }
        else
        {
            $diabetes->id_ficha_otros_prof = $request->id_ficha_otros_prof;
            $diabetes->id_ficha_gineco_obstetrica = null;
        }

        $diabetes->id_lugar_atencion = $hora_medica->id_lugar_atencion;

        if (!$diabetes->save()) {
            return 'error';
        }

        return json_encode($hora_medica);
    }

    public function registrar_control_hipertension(Request $request)
    {
        if(!empty($request->id_profesional))
            $profesional = Profesional::where('id', $request->id_profesional)->first();
        else
            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

        $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();


        $hipertension = new Hipertension();
        $hipertension->sistolica = $request->sistolica;
        $hipertension->diastolica = $request->diastolica;
        $hipertension->ideal = $request->ideal;
        $hipertension->pulso = (empty($request->pulso)?null:$request->pulso);
        $hipertension->medicamento = (empty($request->medicamento)?null:$request->medicamento);
        $hipertension->sintomas = (empty($request->sintomas)?null:$request->sintomas);
        $hipertension->id_paciente = $hora_medica->id_paciente;
        $hipertension->id_profesional = $profesional->id;
        $hipertension->id_ficha_atencion = (empty($hora_medica->id_ficha_atencion)?null:$hora_medica->id_ficha_atencion);

        if($profesional->id_especialidad == 1 && $profesional->id_tipo_especialidad == 3)
        {
            $hipertension->id_ficha_otros_prof = null;
            $hipertension->id_ficha_gineco_obstetrica = $hora_medica->id_ficha_otros_prof;
        }
        else
        {
            $hipertension->id_ficha_otros_prof = $request->id_ficha_otros_prof;
            $hipertension->id_ficha_gineco_obstetrica = null;
        }

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
        $datos = array();

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
        $ges->id_ges_diagnostico = $request->id_ges;
        $ges->nombre_ges = $request->nombre_ges;
        $ges->hora_ficha_ges = \Carbon\Carbon::parse($request->hora_ficha_ges)->format('H:i:s');
        $ges->id_profesional = $profesional->id;
        $ges->id_paciente = $hora_medica->id_paciente;
        $ges->id_ficha_atencion = $hora_medica->id_ficha_atencion;
        $ges->id_lugar_atencion = $request->id_lugar_atencion;
        $ges->codigo_verificacion = $request->codigo_verificacion;

        if ($ges->save())
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'registro';

            $archivo_correo = array();

			$paciente = Paciente::find($hora_medica->id_paciente);

            /** REGISTROS DE ARCHIVOS */
            if(!empty($request->lista_archivo))
            {
                $lista_archivo_array = json_decode($request->lista_archivo);

                if(array_key_exists('ges', $lista_archivo_array))
                {
                    $resulto_img = array();
                    foreach ($lista_archivo_array->ges as $key => $value)
                    {

                        $ruta_temp = $value[0];
                        $nombre_real = $value[1];
                        $nombre_temp = $value[2];
                        $file_extension = $value[3];
                        $nombre_final = $paciente->rut.'_ges_'.date('YmdHis').'_'.uniqid().'.'.$file_extension;

                        $resulto_img[$key] = CargaImagenController::moverArchivo($nombre_temp, 'archivo_archivo', $nombre_final);

                        $ges_img = new GesRegistrosImg();
                        $ges_img->id_registro_ges = $ges->id;
                        $ges_img->id_paciente = $hora_medica->id_paciente;
                        $ges_img->id_profesional = $profesional->id;
                        $ges_img->id_ficha_atencion = $hora_medica->id_ficha_atencion;
                        $ges_img->id_lugar_atencion = $request->id_lugar_atencion;
                        $ges_img->url = $resulto_img[$key]['proceso']['url'];
                        $ges_img->img = $nombre_final;

                        if($ges_img->save())
                        {

                            $url_temp = Storage::disk('archivo_archivo')->url($nombre_final);
                            $archivo_correo[] = array('url' => $url_temp, 'nombre' => $nombre_final);

                            $datos['img'][$key]['estado'] = 1;
                            $datos['img'][$key]['msj'] = 'registro';
                            $datos['img'][$key]['url_temp'] = $url_temp;
                            $datos['img'][$key]['archivo_correo'] = $archivo_correo;
                            $datos['img'][$key]['resulto_img'] = $resulto_img;
                        }
                        else
                        {
                            $datos['img'][$key]['estado'] = 0;
                            $datos['img'][$key]['msj'] = 'falla';
                        }
                    }
                }
            }

            $pdf_constancia = GesRegistrosController::generarPdf($ges->id, 'G');

            $datos['pdf_constancia'] = $pdf_constancia;

            $archivo_constancia = array('url'=>$pdf_constancia->pdf_url, 'nombre'=>$pdf_constancia->pdf);

            /** ENVIO DE CORREO  */
            $blade = 'notificacion_ges';
            $to = array(
                    array('email' => $paciente->email,'name' =>  $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos),
                );
            $cc = array();
            $bcc = array();
            $asunto = 'MED-SDI - Notificación GES';
            $body = array(
                'nombre_paciente'=> $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos,
                'nombre_ges'=>$request->nombre_ges,
                'archivo_correo_adjuntos'=>$archivo_correo,
                'archivo_constancia'=>$archivo_constancia,
            );
            $archivo = '';
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


            $lugar_atencion = LugarAtencion::find($request->id_lugar_atencion);

            /** ENVIO DE NOTIFICACION APP */
            $tipo_notificacion = '2';
            $id_evento = $ges->id;
            $fecha_evento = $ges->fecha_ficha_ges;
            $hora_evento = $ges->hora_ficha_ges;
            $fecha_primera_notificacion = date('Y-m-d H:i:s');
            $cantidad_notificacion = '';
            $medio_notificacion = 'email';
            $fecha_notificacion = date('Y-m-d H:i:s');
            $medio_confirmacion = '';
            $fecha_confirmacion = '';
            $estado_confirmacion = '';
            $otros = '';
            $otros_1 = '';
            $notificaiconResult = NotificacionConfirmacionController::registrar($tipo_notificacion,$id_evento,$fecha_evento,$hora_evento,$fecha_primera_notificacion,$cantidad_notificacion,$medio_notificacion,$fecha_notificacion,$medio_confirmacion,$fecha_confirmacion,$estado_confirmacion,$otros,$otros_1);
            $datos['notificacion']['notificaiconResult'] = $notificaiconResult;

            if($notificaiconResult['estado'] == 1)
            {
                $id_notificacion_confimacion = $notificaiconResult['last_id'];

                $msj = array(
                    'id' => $ges->id,
                    'nombre' => mb_strtoupper($paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos),
                    'evento' => 'NOTIFICACION GES',
                    'fecha' => $ges->fecha_ficha_ges,
                    'hora' => $ges->hora_ficha_ges,
                    'lugar_atencion' => $lugar_atencion->nombre,
                    'profesional' => $profesional->apellido_uno,
                    'tipo' => 'confirmacion',
                );

                $log_users_devices = new LogUsersDevices();
                $log_users_devices->id_user_create = $profesional->id_usuario;
                $log_users_devices->id_user_recept = $paciente->id_usuario;
                $log_users_devices->msg = json_encode($msj);
                $log_users_devices->estado = 0;
                $log_users_devices->fecha_ingreso = date('Y-m-d H:i:s');
                // $log_users_devices->fecha_termino = '';
                $log_users_devices->tipo = 10; // NOTIFICACION GES

                if($log_users_devices->save())
                {
                    $datos['notificacion']['log_users_devices'] = $log_users_devices;

                    $notificacion_confirmacion_edit = NotificacionConfirmacion::find($id_notificacion_confimacion);
                    $notificacion_confirmacion_edit->id_log_users_devices = $log_users_devices->id;
                    $notificacion_confirmacion_edit->medio_notificacion = $notificacion_confirmacion_edit->medio_notificacion.'|APP';
                    if($notificacion_confirmacion_edit->save())
                    {
                        $datos['notificacion']['notificaicon_update'] = $notificacion_confirmacion_edit;
                    }
                    else
                    {
                        $datos['notificacion']['notificaicon_update'] = $notificacion_confirmacion_edit;
                    }
                }
            }
            /** ENVIO DE NOTIFICACION APP */
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'registro fallido';
        }

        return $datos;
    }

    public function registrar_eno(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_lugar_atencion))
        {
            $error['Lugar atencion'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->nombre_establecimiento))
        {
            $error['nombre establecimiento'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->codigo_establecimiento))
        {
            $error['codigo establecimiento'] = 'campo requerido';
            $valido = 0;
        }

        // if(empty($request->nombre_oficina))
        // {
        //     $error['nombre oficina'] = 'campo requerido';
        //     $valido = 0;
        // }

        // if(empty($request->codigo_oficina))
        // {
        //     $error['codigo oficina'] = 'campo requerido';
        //     $valido = 0;
        // }

        if(empty($request->id_ficha_atencion))
        {
            $error['ficha atencion'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->id_paciente))
        {
            $error['paciente'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->nacionalidad_paciente))
        {
            $error['nacionalidad paciente'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->codigo_nacionalidad_paciente))
        {
            $error['codigo nacionalidad paciente'] = 'campo requerido';
            $valido = 0;
        }

        if($request->pueblo_originario_paciente == '')
        {
            $error['pueblo originario paciente'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->ocupacion_paciente))
        {
            $error['ocupacion paciente'] = 'campo requerido';
            $valido = 0;
        }

        if($request->condicion_paciente=='')
        {
            $error['condicion paciente'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->categoria_paciente))
        {
            $error['categoria paciente'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->diagnositico_confirmado))
        {
            $error['diagnositico_confirmado'] = 'campo requerido';
            $valido = 0;
        }

        // if(empty($request->diagnostico_cie))
        // {
        //     $error['diagnostico_cie'] = 'campo requerido';
        //     $valido = 0;
        // }

        if(empty($request->primeros_sintomas))
        {
            $error['primeros sintomas'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->pais_contagio))
        {
            $error['pais contagio'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->pais))
        {
            $error['pais'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->vacunacion))
        {
            $error['vacunacion'] = 'campo requerido';
            $valido = 0;
        }
        else if($request->vacunacion == 1)
        {
            if(empty($request->fecha_ultima_dosis))
            {
                $error['fecha ultima dosis'] = 'campo requerido';
                $valido = 0;
            }

            if(empty($request->numero_ultima_dosis))
            {
                $error['numero ultima dosis'] = 'campo requerido';
                $valido = 0;
            }
        }

        if(empty($request->id_profesional))
        {
            $error['profesional'] = 'campo requerido';
            $valido = 0;
        }


        if($valido)
        {
            $registro_eno = new DeclaracionEno();
            $registro_eno->id_lugar_atencion = $request->id_lugar_atencion;

            $registro_eno->nombre_establecimiento = $request->nombre_establecimiento;
            $registro_eno->codigo_establecimiento = $request->codigo_establecimiento;
            $registro_eno->nombre_oficina = $request->nombre_oficina;
            $registro_eno->codigo_oficina = $request->codigo_oficina;
            $registro_eno->id_ficha_atencion = $request->id_ficha_atencion;

            $registro_eno->id_paciente = $request->id_paciente;
            $registro_eno->nacionalidad_paciente = $request->nacionalidad_paciente;
            $registro_eno->codigo_nacionalidad_paciente = $request->codigo_nacionalidad_paciente;
            $registro_eno->pueblo_originario_paciente = $request->pueblo_originario_paciente;
            $registro_eno->ocupacion_paciente = $request->ocupacion_paciente;
            $registro_eno->condicion_paciente = $request->condicion_paciente;
            $registro_eno->categoria_paciente = $request->categoria_paciente;

            $registro_eno->diagnositico_confirmado = $request->diagnositico_confirmado;
            $registro_eno->diagnostico_cie = $request->diagnostico_cie;
            $registro_eno->primeros_sintomas = $request->primeros_sintomas;
            $registro_eno->pais_contagio = $request->pais_contagio;
            $registro_eno->pais = $request->pais;

            $registro_eno->vacunacion = $request->vacunacion;
            $registro_eno->fecha_ultima_dosis = $request->fecha_ultima_dosis;
            $registro_eno->numero_ultima_dosis = $request->numero_ultima_dosis;
            $registro_eno->tbc = $request->tbc;
            $registro_eno->tbc_recaidas = $request->tbc_recaidas;

            $registro_eno->fecha_notificacion = date('Y-m-d');
            $registro_eno->hora_notificacion = date('H:i:s');
            $registro_eno->id_profesional = $request->id_profesional;

            if($registro_eno->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registro';
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Falla registro';
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

    public function cargar_eno(Request $request)
    {
        $datos = array();

        $registros = DeclaracionEno::with('Profesional')->where('id_paciente', $request->id_paciente)->get();

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
            $certificado->id_profesional = $profesional->id;
            $certificado->id_paciente = $hora_medica->id_paciente;
            if(!empty($hora_medica->id_ficha_atencion))
                $certificado->id_ficha_atencion = $hora_medica->id_ficha_atencion;
            if(!empty($hora_medica->id_ficha_otros_prof))
                $certificado->id_ficha_otro_prof = $hora_medica->id_ficha_otros_prof;
            $certificado->id_lugar_atencion = $request->id_lugar_atencion;
            $certificado->cod_auto =  session('lic_token');

            if (!$certificado->save())
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Problema al registrar';
                $datos['request'] = $request->all();
            }
            else
            {
                /** REGISTRAR FIRMA PROFESIONAL */
                $papeleria_token = session('lic_token');
                $papeleria_log_id = session('lic_log_id');
                $prof_firma_registro = (object)CertificadoController::registroProfesionalFirma((int)$profesional->id, $papeleria_token, $papeleria_log_id, "7", $certificado->id);

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
        if($request->id_fc)
            $ficha_atencion = FichaAtencion::find($request->id_fc);
        else if($request->id_fc_op)
            $ficha_atencion = FichaOtrosProfesionales::find($request->id_fc_op);

        $nombre_especialidad = '';
        if(!empty($request->sub_tipo_especialidad))
            $nombre_especialidad = SubTipoEspecialidad::find($request->sub_tipo_especialidad)->nombre ;
        else if(!empty($request->tipo_especialidad))
            $nombre_especialidad = TipoEspecialidad::find($request->especialidad)->nombre ;
        else if(!empty($request->tipo_especialidad))
            $nombre_especialidad = Especialidad::find($request->profesion)->nombre ;
        $lic_token = '';

        if( !empty(session('lic_token')) && $profesional->id_espacialidad == 1)
        {
            $lic_token = session('lic_token');
            $lic_log_id = session('lic_log_id');
        }
        else
        {
            /** calculo de periodo de vigencia para aprobacion */
            $fecha = date('Y-m-d');
            $hora =  date('H:i:s');
            $fecha_actual  = date('Y-m-d H:i:s', strtotime($fecha.' '.$hora));
            $fecha_vencimiento  = date ( 'Y-m-d H:i:s' ,strtotime ( '+'.(int)env('TIEMPO_ESPERA_CONFIRMACION').' hours' , strtotime ($fecha_actual) ) );
            $fecha_expira = date ('Y-m-d H:i:s' ,strtotime ( '+'.((int)env('TIEMPO_ESPERA_CONFIRMACION')+(int)env('TIEMPO_EXP_PERMISO')).' hours' , strtotime ($fecha_actual) ) );

            $id = LogUsersDevices::latest()->first();
            if(is_object($id)==false)
            $id=0;
            else
            $id = LogUsersDevices::latest()->first()->id;

            $msj = array(
                'id' => ($id+1),
                'nombre' => mb_strtoupper($profesional->nombre.' '.$profesional->apellido_p.' '.$profesional->apellido_m),
                'evento' => 'Interconsulta Siquiatría',
                'fecha' => $fecha,
                'hora' => $hora,
                'nombre_especialidad' => $nombre_especialidad,
                'nombre_profesional_inter' => $request->nombre_profesional_inter_sq,
                'tipo' => 'interconsulta'
            );

            $log_users_devices = new LogUsersDevices();
            $log_users_devices->id_user_create = $profesional->id_usuario;
            $log_users_devices->id_user_recept = $profesional->id_usuario;
            $log_users_devices->msg = json_encode($msj);
            $log_users_devices->estado = 1;

            $log_users_devices->fecha_ingreso = $fecha_actual;
            $log_users_devices->fecha_termino = $fecha_vencimiento;
            $log_users_devices->tipo = 16; // check sdi // ESTRUCTURA DE TEXTO
            $token_temp = md5(uniqid());
            $log_users_devices->token = $token_temp;
            $log_users_devices->fecha_exp = $fecha_expira;

            if($log_users_devices->save())
            {
                $datos['app']['estado'] = 1;
                $datos['app']['msj'] = $msj;
                $datos['app']['fecha_inicio'] = $fecha_actual;
                $datos['app']['fecha_termino'] = $fecha_vencimiento;
                $datos['app']['fecha_exp'] = $fecha_expira;
                $datos['app']['tiempo'] = env('TIEMPO_ESPERA');
                $datos['app']['last_id'] = $log_users_devices->id;
                $datos['app']['token'] = $log_users_devices->token;
            }
            else
            {
                $datos['app']['estado'] = 0;
                $datos['app']['msj'] = 'Solicitud de aprobacion con falla';
            }

            $lic_token = $token_temp;
            $lic_log_id = $log_users_devices->id;
        }



        $interconsulta = new Interconsulta();
        $interconsulta->id_especialidad = $request->profesion;
        $interconsulta->id_tipos_especialidad = $request->especialidad;
        $interconsulta->id_sub_tipo_especialidad = $request->sub_tipo_especialidad;
        $interconsulta->nombre_especialidad = $nombre_especialidad;
        $interconsulta->fecha_solicitud = Carbon::now();
        $interconsulta->id_paciente = $ficha_atencion->id_paciente;
        $interconsulta->id_profesional_soli = $profesional->id;
        $interconsulta->cod_auto_soli = $lic_token;
        if($request->id_fc)
        {
            $interconsulta->id_ficha_atencion_soli = $ficha_atencion->id;
            // $interconsulta->id_ficha_otro_prof_soli = '';
        }
        else if($request->id_fc_op)
        {
            // $interconsulta->id_ficha_atencion_soli = '';
            $interconsulta->id_ficha_otro_prof_soli = $ficha_atencion->id;
        }

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
            /** REGISTRAR FIRMA PROFESIONAL */
            $papeleria_token = $lic_token;
            $papeleria_log_id = $lic_log_id;
            $prof_firma_registro = (object)CertificadoController::registroProfesionalFirma((int)$profesional->id, $papeleria_token, $papeleria_log_id, "8", $interconsulta->id);

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
            $registro->cod_auto_resp = session('lic_token');
            $registro->citado_control_resp = $request->requiere_control?'1':'0';
            $registro->id_ficha_atencion_resp = $ficha_atencion->id;
            $registro->id_lugar_atencion_resp = $ficha_atencion->id_lugar_atencion;
            $registro->id_recuperacion_resp = $request->id_recuperacion_resp;
            $registro->id_sala_resp = $request->id_sala_resp;
            $registro->estado = 2;

            if($registro->save())
            {
                /** REGISTRAR FIRMA PROFESIONAL */
                $papeleria_token = session('lic_token');
                $papeleria_log_id = session('lic_log_id');
                $prof_firma_registro = (object)CertificadoController::registroProfesionalFirma((int)$profesional->id, $papeleria_token, $papeleria_log_id, "8", $registro->id);

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
        $interconsulta = Interconsulta::where('id', $request->id_interconsulta)->first();
        if($interconsulta->count()>0)
        {

            $paciente = Paciente::find($interconsulta->id_paciente);

            // info solicitud
            if(!empty($interconsulta->id_ficha_otro_prof_soli))
            {
                $ficha_atencion_soli = FichaOtrosProfesionales::find($interconsulta->id_ficha_otro_prof_soli);
            }
            else
            {
                $ficha_atencion_soli = FichaAtencion::find($interconsulta->id_ficha_atencion_soli);
            }
            $lugar_atencion_soli = LugarAtencion::find($interconsulta->id_lugar_atencion_soli);
            $profesional_soli = Profesional::find($interconsulta->id_profesional_soli);
            // $token_firma_soli = encrypt( $profesional_soli->rut.'_'.$profesional_soli->email.'_'.$lugar_atencion_soli->id );
            $lugar_atencion = LugarAtencion::find($ficha_atencion_soli->id_lugar_atencion);


            /** token receta */
            $temp_token_soli = CertificadoController::certificadoDocumento($ficha_atencion_soli->id, $profesional_soli->id, $paciente->id, 8, $interconsulta->id);
            if($temp_token_soli['estado'] == 1)
            {
                $token_receta_soli = $temp_token_soli['certificado'];
                $url_documento_soli = CertificadoController::generarUrlDocumento($token_receta_soli);
                $qr_documento_soli = GeneradorQrController::generar($url_documento_soli);
            }
            else
            {
                $temp_token_soli = CertificadoController::certificadoDocumento($ficha_atencion_soli->id, rand(111,999), $paciente->id, 8, $interconsulta->id);
                $token_receta_soli = $temp_token_soli['certificado'];
                $url_documento_soli = CertificadoController::generarUrlDocumento($token_receta_soli);
                $qr_documento_soli = GeneradorQrController::generar($url_documento_soli);
            }

            /** token profesional */
            $temp_token_soli = CertificadoController::certificadoProfesional($profesional_soli->id, $interconsulta->cod_auto_soli, 8, $interconsulta->id);
            if($temp_token_soli['estado'] == 1)
            {
                $token_profesional_soli = $temp_token_soli['certificado'];
                $url_profesional_soli = CertificadoController::generarUrlProfesional($token_profesional_soli);
                $qr_profesional_soli = GeneradorQrController::generar($url_documento_soli);
            }
            else
            {
                $temp_token_soli = CertificadoController::certificadoProfesional(rand(1114,999), $interconsulta->cod_auto_soli, 8, $interconsulta->id);
                $token_profesional_soli = $temp_token_soli['certificado'];
                $url_profesional_soli = CertificadoController::generarUrlProfesional($token_profesional_soli);
                $qr_profesional_soli = GeneradorQrController::generar($url_documento_soli);
            }

            $array_paciente = array(
                'id' => $paciente->id,
                'nombre' => $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos,
                'fecha_nac' => $paciente->fecha_nac,
                'rut' => $paciente->rut,
                'sexo' => $paciente->sexo,
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
                'token' => $token_receta_soli,
                'url' => $url_documento_soli,
                'qr' => $qr_documento_soli,
            );
            $array_lugar_atencion_soli = array(
                'id' => $lugar_atencion_soli->id,
                'nombre' => $lugar_atencion_soli->nombre
            );
            $array_profesional_soli = array(
                'id' => $profesional_soli->id,
                'nombre' => $profesional_soli->nombre.' '.$profesional_soli->apellido_uno.' '.$profesional_soli->apellido_dos,
                'rut' => $profesional_soli->rut,
                'especialidad' => ($profesional_soli->SubTipoEspecialidad()->first()?$profesional_soli->SubTipoEspecialidad()->first()->nombre:$profesional_soli->TipoEspecialidad()->first()->nombre),
                'token' =>  $token_profesional_soli,
                'url' =>  $url_profesional_soli,
                'qr' =>  $qr_profesional_soli,
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
                // $token_firma_resp = encrypt( $profesional_resp->rut.'_'.$profesional_resp->email.'_'.$lugar_atencion_resp->id );

                /** token receta */
                $temp_token_resp = CertificadoController::certificadoDocumento($ficha_atencion_resp->id, $profesional_resp->id, $paciente->id, 8, $interconsulta->id);
                if($temp_token_resp['estado'] == 1)
                {
                    $token_receta_resp = $temp_token_resp['certificado'];
                    $url_documento_resp = CertificadoController::generarUrlDocumento($token_receta_resp);
                    $qr_documento_resp = GeneradorQrController::generar($url_documento_resp);
                }
                else
                {
                    $temp_token_resp = CertificadoController::certificadoDocumento($request->id_ficha_atencion, rand(111,999), $paciente->id, 8, $interconsulta->id);
                    $token_receta_resp = $temp_token_resp['certificado'];
                    $url_documento_resp = CertificadoController::generarUrlDocumento($token_receta_resp);
                    $qr_documento_resp = GeneradorQrController::generar($url_documento_resp);
                }

                /** token profesional */
                $temp_token_resp = CertificadoController::certificadoProfesional($profesional_resp->id, $interconsulta->cod_auto_resp, 8, $interconsulta->id);
                if($temp_token_resp['estado'] == 1)
                {
                    $token_profesional_resp = $temp_token_resp['certificado'];
                    $url_profesional_resp = CertificadoController::generarUrlProfesional($token_profesional_resp);
                    $qr_profesional_resp = GeneradorQrController::generar($url_documento_resp);
                }
                else
                {
                    $temp_token_resp = CertificadoController::certificadoProfesional(rand(1114,999), $interconsulta->cod_auto_resp, 8, $interconsulta->id);
                    $token_profesional_resp = $temp_token_resp['certificado'];
                    $url_profesional_resp = CertificadoController::generarUrlProfesional($token_profesional_resp);
                    $qr_profesional_resp = GeneradorQrController::generar($url_documento_resp);
                }
                // array respuesta
                $array_ficha_atencion_resp = array(
                    'id' => $ficha_atencion_resp->id,
                    'created_at' => $ficha_atencion_resp->created_at->format('d/m/Y'),
                    'token' => $token_receta_resp,
                    'url' => $url_documento_resp,
                    'qr' => $qr_documento_resp,
                );

                $array_lugar_atencion_resp = array(
                    'id' => $lugar_atencion_resp->id,
                    'nombre' => $lugar_atencion_resp->nombre
                );

                $array_profesional_resp = array(
                    'id' => $profesional_resp->id,
                    'nombre' => $profesional_resp->nombre.' '.$profesional_resp->apellido_uno.' '.$profesional_resp->apellido_dos,
                    'rut' => $profesional_resp->rut,
                    'especialidad' => ($profesional_resp->SubTipoEspecialidad()->first()?$profesional_resp->SubTipoEspecialidad()->first()->nombre:$profesional_resp->TipoEspecialidad()->first()->nombre),
                    'token' =>  $token_profesional_resp,
                    'url' =>  $url_profesional_resp,
                    'qr' =>  $qr_profesional_resp,
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
            if(!empty($hora_medica->id_ficha_atencion))
                $informe->id_ficha_atencion = $hora_medica->id_ficha_atencion;
            if(!empty($hora_medica->id_ficha_otros_prof))
                $informe->id_ficha_otro_prof = $hora_medica->id_ficha_otros_prof;
            $informe->id_profesional = $profesional->id;
            $informe->id_lugar_atencion = $request->id_lugar_atencion;
            $informe->cod_auto = session('lic_token');

            if (!$informe->save())
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'problema al momento de registrar informe medico';
            }
            else
            {
                /** REGISTRAR FIRMA PROFESIONAL */
                $papeleria_token = session('lic_token');
                $papeleria_log_id = session('lic_log_id');
                $prof_firma_registro = (object)CertificadoController::registroProfesionalFirma((int)$profesional->id, $papeleria_token, $papeleria_log_id, "10", $informe->id);

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
            $uso_personal->cod_auto = session('lic_token');

            if (!$uso_personal->save()) {

                $datos['estado'] = 0;
                $datos['msj'] = 'problema al momento de registrar Uso Personal';

            }
            else
            {
                /** REGISTRAR FIRMA PROFESIONAL */
                $papeleria_token = session('lic_token');
                $papeleria_log_id = session('lic_log_id');
                $prof_firma_registro = (object)CertificadoController::registroProfesionalFirma((int)$profesional->id, $papeleria_token, $papeleria_log_id, "25", $uso_personal->id);

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
	public function storeFichaAntSdi(Request $request)
	{
		$hora_medica = HoraMedica::where('id', $request->hora_medica)->first();

		$ficha = FichaAtencion::where('id', $hora_medica->id_ficha_atencion)->first();
		$id_profesional = $request->id_profesional_fc;
		$id_paciente = $request->id_paciente_fc;

		$ficha->motivo = $request->motivo;
		$ficha->hipotesis_diagnostico = $request->descripcion_hipotesis;
		$ficha->cronico = $request->cronico;
		$ficha->ges = $request->ges;
		$ficha->confidencial = $request->confidencial;
		$ficha->id_paciente = $id_paciente;
		$ficha->id_profesional = $id_profesional;
		$ficha->finalizada = 1;
		if (!$ficha->save())
		{
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
			else
			{
				/** redireccion Redirect funciona correcto */
				return \Redirect::route('profesional.mi_agenda','lugares_atencion='.$request->id_lugar_atencion)->with($tipo_mensaje, $mensaje);
			}
        }
	}

    /** REGISTRO FICHA ATENCION GENERAL */
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

            $ficha->motivo = $request->motivo;
            $ficha->antecedentes = $request->antecedentes;
            $ficha->examen_fisico = $request->examen_fisico;

            $ges = 0;
            // if ($request->modal_ges == 'on' || $request->modal_ges == '1') {
            if ($request->has('modal_ges')) {
                $ges = 1;
            }

            $cronico = 0;
            // if ($request->enf_cronico == 'on' || $request->enf_cronico == '1') {
            if ($request->has('enf_cronico')) {
                $cronico = 1;
            }

            $confidencial = 0;
            // if ($request->confidencial == 'on' || $request->confidencial == '1') {
            if ($request->has('confidencial')) {
                $confidencial = 1;
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
            $ficha->indicaciones = $request->indicaciones;

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

    /** REGISTRO FICHA ATENCION Y OTORRINOLARINGOLOGIA*/
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
            if(!$ficha){
                $ficha = new FichaAtencion;
            }
			$ficha->motivo = $request->motivo;
            $ficha->antecedentes = $request->antecedentes;
            $ficha->examen_fisico = $request->examen_fisico;

            $ges = 0;
            // if ($request->modal_ges == 'on' || $request->modal_ges == '1') {
            if ($request->has('modal_ges')) {
                $ges = 1;
            }

            $cronico = 0;
            // if ($request->enf_cronico == 'on' || $request->enf_cronico == '1') {
            if ($request->has('enf_cronico')) {
                $cronico = 1;
            }

            $confidencial = 0;
            // if ($request->confidencial == 'on' || $request->confidencial == '1') {
            if ($request->has('confidencial')) {
                $confidencial = 1;
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
			$ficha->indicaciones = $request->indicaciones;

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
                $mensaje = 'Ficha Clínica guardada de forma correcta\n';

                if($request->estudio == 1)
                {
                    /** registro ficha especialidad */
                    $ficha_otorrino = new FichaOtorrino();
                    $ficha_otorrino->id_fichas_atenciones = $ficha->id;
                    $ficha_otorrino->id_paciente = $id_paciente;
                    $ficha_otorrino->id_usa_audifono = $request->usa_audifono;
                    $ficha_otorrino->audifono = $request->audifono;
                    $ficha_otorrino->apreciacion_auditiva = $request->apreciacion_auditiva;
                    $ficha_otorrino->aprec_auditiva_def = $request->aprec_auditiva_def;
                    $ficha_otorrino->examen_oi = $request->examen_oi;
                    $ficha_otorrino->ex_oi_anormal = $request->ex_oi_anormal;
                    $ficha_otorrino->examen_od = $request->examen_od;
                    $ficha_otorrino->ex_od_anormal = $request->examen_od;
                    $ficha_otorrino->obs_ex_oidos = $request->ex_od_anormal;
                    $ficha_otorrino->examen_bio_oi = $request->examen_bio_oi;
                    $ficha_otorrino->obs_examen_bio_oi = $request->obs_examen_bio_oi;
                    $ficha_otorrino->examen_bio_od = $request->examen_bio_od;
                    $ficha_otorrino->obs_examen_bio_od = $request->obs_examen_bio_od;
                    $ficha_otorrino->obs_ex_biom = $request->obs_ex_biom;
                    $ficha_otorrino->id_tipo_episodios = $request->episodios;
                    $ficha_otorrino->obs_episodios = $request->detalle_episodios;
                    $ficha_otorrino->id_tipo_equilibrio = $request->equilibrio;
                    $ficha_otorrino->obs_equilibrio = $request->detalle_equilibrio;
                    $ficha_otorrino->id_tipo_ng = $request->ng;
                    $ficha_otorrino->obs_ng = $request->detalle_ng;
                    $ficha_otorrino->id_tipo_sint_acomp = $request->sint_acomp;
                    $ficha_otorrino->obs_sint_acomp = $request->detalle_sint_acompanantes;
                    $ficha_otorrino->id_tipo_vertigo = $request->tipo_vertigo;
                    $ficha_otorrino->obs_tipo_vertigo = $request->detalle_tipo_vertigo;
                    $ficha_otorrino->obs_vestibular = $request->obs_vestibular;
                    $ficha_otorrino->nariz_general = $request->nariz_general;
                    $ficha_otorrino->det_nariz_general = $request->det_nariz_general;
                    $ficha_otorrino->apreciacion_resp = $request->apreciacion_resp;
                    $ficha_otorrino->aprec_resp_def = $request->aprec_resp_def;
                    $ficha_otorrino->examen_fni = $request->examen_fni;
                    $ficha_otorrino->ex_fni_anormal = $request->ex_fni_anormal;
                    $ficha_otorrino->examen_fnd = $request->examen_fnd;
                    $ficha_otorrino->ex_fnd_anormal = $request->ex_fnd_anormal;
                    $ficha_otorrino->obs_ex_nasal = $request->obs_ex_nasal;
                    $ficha_otorrino->disfonia = $request->disfonia;
                    $ficha_otorrino->det_disfonia = $request->det_disfonia;
                    $ficha_otorrino->ex_boca = $request->ex_boca;
                    $ficha_otorrino->detalle_ex_boca = $request->detalle_ex_boca;
                    $ficha_otorrino->examen_faringe =$request->examen_faringe;
                    $ficha_otorrino->ex_farige_anormal = $request->ex_farige_anormal;
                    $ficha_otorrino->examen_laringe =$request->examen_laringe;
                    $ficha_otorrino->ex_larige_anormal = $request->ex_larige_anormal;
                    $ficha_otorrino->obs_examen_laringe = $request->obs_examen_laringe;
                    $ficha_otorrino->obs_ex_orl = $request->bs_ex_orl;
                    $ficha_otorrino->hip_diag_orl = $request->diag_spec;
                    $ficha_otorrino->ind_orl = $request->ind_orl;
                    $ficha_otorrino->estado = 1;

                    if($ficha_otorrino->save())
                    {
                        $datos['ficha_otorrino']['estado'] = 1;
                        $datos['ficha_otorrino']['msj'] = 'registro exitoso';
                        $mensaje .= '\n'.'Ficha Otorrino guardada de forma correcta';

                    }
                    else
                    {
                        $datos['ficha_otorrino']['estado'] = 0;
                        $datos['ficha_otorrino']['msj'] = 'registro NO exitoso';
                        $mensaje .= '\n'.'Ficha Otorrino No guardada ';
                    }
                }

                 /** registro ficha especialidad */
                $ficha_orl = new FichaOrl();
                $ficha_orl->id_fichas_atenciones = $ficha->id;
                $ficha_orl->id_paciente = $id_paciente;
				$ficha_orl->id_profesional = $id_profesional;
                $ficha_orl->audicion = $request->audicion;
                $ficha_orl->ex_oido = $request->ex_oido;
                $ficha_orl->biomicroscopia = $request->biomicroscopia;
                $ficha_orl->vestibular = $request->vestibular;
                $ficha_orl->o_resultado_ex = $request->o_resultado_ex;
                $ficha_orl->nariz_ext = $request->nariz_ext;
                $ficha_orl->f_nasales = $request->f_nasales;
                $ficha_orl->n_resultado_ex = $request->n_resultado_ex;
                $ficha_orl->boca = $request->boca;
                $ficha_orl->faringe = $request->faringe;
                $ficha_orl->laringe = $request->laringe;
                $ficha_orl->fl_resultado_ex = $request->fl_resultado_ex;
                $ficha_orl->cuello_grl = $request->cuello_grl;
                $ficha_orl->masas = $request->masas;
                $ficha_orl->glandulas = $request->glandulas;
                $ficha_orl->c_resultado_ex = $request->c_resultado_ex;
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
                $parametro['id_ficha_orl'] = $ficha_orl->id;
                $examen_json = ExamenEspecialidadController::estructuraJson(1,$parametro);

                if($examen_json['estado'] == 1)
                {
                    $examen = '';
                    /** VALIDAR INFORMACION */
                    if($examen_json['cant_datos'] > 0)
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
                        if(!empty($examen))
                        {
                            $array_tem = array(
                                'lugares_atencion' => $request->id_lugar_atencion,
                                'pdf' => $request->mostrarpdf,
                                'tipo' => $request->tipopdf,
                                'id_examen' => $examen->id,
                            );
                        }
                        else
                        {
                            $array_tem = array(
                                'lugares_atencion' => $request->id_lugar_atencion,
                                'pdf' => $request->mostrarpdf,
                                'tipo' => $request->tipopdf,
                                'id_examen' => 0,
                            );
                        }
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



     /** REGISTRO FICHA ATENCION Y NEUROLOGIA*/
    public function store_neuro(Request $request)
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
            if(empty($request->descripcion_hipotesis))
            {
                $campos_requeridos = 1;
                $mensaje = 'El Diagnóstico Nuero es Requerido.\n Su Ficha Clínica NO ha sido Guardada aún.\n';
            }
            else
            {
                // if(empty($request->solicitado_id_profesional_rfl))
                // {
                //     if(empty($request->solicitado_rut_rfl))
                //     {
                //         $campos_requeridos = 1;
                //         $mensaje = 'Rinofibrolaringoscopía - Campo requerido RUT del Solicitante.\n';
                //     }
                //     if(empty($request->solicitado_nombre_rfl))
                //     {
                //         $campos_requeridos = 1;
                //         $mensaje = 'Rinofibrolaringoscopía - Campo requerido NOMBRE del Solicitante.\n';
                //     }
                //     if(empty($request->solicitado_apellido_rfl))
                //     {
                //         $campos_requeridos = 1;
                //         $mensaje = 'Rinofibrolaringoscopía - Campo requerido APELLIDO del Solicitante.\n';
                //     }
                //     if(empty($request->solicitado_telefono_rfl) || empty($request->solicitado_email_rfl))
                //     {
                //         $campos_requeridos = 1;
                //         $mensaje = 'Rinofibrolaringoscopía - Campo requerido TELÉFONO o EMAIL del Solicitante.\n';
                //     }
                // }
            }
        }

        if($campos_requeridos == 0)
        {
            $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();

            $ficha = FichaAtencion::where('id', $hora_medica->id_ficha_atencion)->first();
            $id_profesional = $request->id_profesional_fc;
            $id_paciente = $request->id_paciente_fc;
            if(!$ficha){
                $ficha = new FichaAtencion;
            }
			$ficha->motivo = $request->motivo;
            $ficha->antecedentes = $request->antecedentes;
            $ficha->examen_fisico = $request->examen_fisico;

            $ges = 0;
            // if ($request->modal_ges == 'on' || $request->modal_ges == '1') {
            if ($request->has('modal_ges')) {
                $ges = 1;
            }

            $cronico = 0;
            // if ($request->enf_cronico == 'on' || $request->enf_cronico == '1') {
            if ($request->has('enf_cronico')) {
                $cronico = 1;
            }

            $confidencial = 0;
            // if ($request->confidencial == 'on' || $request->confidencial == '1') {
            if ($request->has('confidencial')) {
                $confidencial = 1;
            }

            $ficha->hipotesis_diagnostico = $request->descripcion_hipotesis;
            $ficha->diagnostico_ce10 = $request->descripcion_cie;
			$ficha->indicaciones = $request->indicaciones;

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
                $mensaje = 'Ficha Clínica guardada de forma correcta\n';

                if($request->estudio == 1)
                {
                    /** registro ficha especialidad */
                    $ficha_otorrino = new FichaOtorrino();
                    $ficha_otorrino->id_fichas_atenciones = $ficha->id;
                    $ficha_otorrino->id_paciente = $id_paciente;
                    $ficha_otorrino->id_usa_audifono = $request->usa_audifono;
                    $ficha_otorrino->audifono = $request->audifono;
                    $ficha_otorrino->apreciacion_auditiva = $request->apreciacion_auditiva;
                    $ficha_otorrino->aprec_auditiva_def = $request->aprec_auditiva_def;
                    $ficha_otorrino->examen_oi = $request->examen_oi;
                    $ficha_otorrino->ex_oi_anormal = $request->ex_oi_anormal;
                    $ficha_otorrino->examen_od = $request->examen_od;
                    $ficha_otorrino->ex_od_anormal = $request->examen_od;
                    $ficha_otorrino->obs_ex_oidos = $request->ex_od_anormal;
                    $ficha_otorrino->examen_bio_oi = $request->examen_bio_oi;
                    $ficha_otorrino->obs_examen_bio_oi = $request->obs_examen_bio_oi;
                    $ficha_otorrino->examen_bio_od = $request->examen_bio_od;
                    $ficha_otorrino->obs_examen_bio_od = $request->obs_examen_bio_od;
                    $ficha_otorrino->obs_ex_biom = $request->obs_ex_biom;
                    $ficha_otorrino->id_tipo_episodios = $request->episodios;
                    $ficha_otorrino->obs_episodios = $request->detalle_episodios;
                    $ficha_otorrino->id_tipo_equilibrio = $request->equilibrio;
                    $ficha_otorrino->obs_equilibrio = $request->detalle_equilibrio;
                    $ficha_otorrino->id_tipo_ng = $request->ng;
                    $ficha_otorrino->obs_ng = $request->detalle_ng;
                    $ficha_otorrino->id_tipo_sint_acomp = $request->sint_acomp;
                    $ficha_otorrino->obs_sint_acomp = $request->detalle_sint_acompanantes;
                    $ficha_otorrino->id_tipo_vertigo = $request->tipo_vertigo;
                    $ficha_otorrino->obs_tipo_vertigo = $request->detalle_tipo_vertigo;
                    $ficha_otorrino->obs_vestibular = $request->obs_vestibular;
                    $ficha_otorrino->nariz_general = $request->nariz_general;
                    $ficha_otorrino->det_nariz_general = $request->det_nariz_general;
                    $ficha_otorrino->apreciacion_resp = $request->apreciacion_resp;
                    $ficha_otorrino->aprec_resp_def = $request->aprec_resp_def;
                    $ficha_otorrino->examen_fni = $request->examen_fni;
                    $ficha_otorrino->ex_fni_anormal = $request->ex_fni_anormal;
                    $ficha_otorrino->examen_fnd = $request->examen_fnd;
                    $ficha_otorrino->ex_fnd_anormal = $request->ex_fnd_anormal;
                    $ficha_otorrino->obs_ex_nasal = $request->obs_ex_nasal;
                    $ficha_otorrino->disfonia = $request->disfonia;
                    $ficha_otorrino->det_disfonia = $request->det_disfonia;
                    $ficha_otorrino->ex_boca = $request->ex_boca;
                    $ficha_otorrino->detalle_ex_boca = $request->detalle_ex_boca;
                    $ficha_otorrino->examen_faringe =$request->examen_faringe;
                    $ficha_otorrino->ex_farige_anormal = $request->ex_farige_anormal;
                    $ficha_otorrino->examen_laringe =$request->examen_laringe;
                    $ficha_otorrino->ex_larige_anormal = $request->ex_larige_anormal;
                    $ficha_otorrino->obs_examen_laringe = $request->obs_examen_laringe;
                    $ficha_otorrino->obs_ex_orl = $request->bs_ex_orl;
                    $ficha_otorrino->hip_diag_orl = $request->diag_spec;
                    $ficha_otorrino->ind_orl = $request->ind_orl;
                    $ficha_otorrino->estado = 1;

                    if($ficha_otorrino->save())
                    {
                        $datos['ficha_otorrino']['estado'] = 1;
                        $datos['ficha_otorrino']['msj'] = 'registro exitoso';
                        $mensaje .= '\n'.'Ficha Otorrino guardada de forma correcta';

                    }
                    else
                    {
                        $datos['ficha_otorrino']['estado'] = 0;
                        $datos['ficha_otorrino']['msj'] = 'registro NO exitoso';
                        $mensaje .= '\n'.'Ficha Otorrino No guardada ';
                    }
                }

                 /** registro ficha especialidad */
                $ficha_neuro = new FichaNeuro();
                $ficha_neuro->id_fichas_atenciones = $ficha->id;
                $ficha_neuro->id_paciente = $id_paciente;
				$ficha_neuro->id_profesional = $id_profesional;
                $ficha_neuro->datos = json_encode($request->all());
                $ficha_neuro->estado = 1;

                if($ficha_neuro->save())
                {
                    $datos['ficha_orl']['estado'] = 1;
                    $datos['ficha_orl']['msj'] = 'registro exitoso';
                    $mensaje .= '\n'.'Ficha Neurología guardada de forma correcta';

                }
                else
                {
                    $datos['ficha_orl']['estado'] = 0;
                    $datos['ficha_orl']['msj'] = 'registro NO exitoso';
                    $mensaje .= '\n'.'Ficha Neuro No guardada ';
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
                $parametro['id_ficha_neuro'] = $ficha_neuro->id;
                $examen_json = ExamenEspecialidadController::estructuraJson(1,$parametro);

                if($examen_json['estado'] == 1)
                {
                    $examen = '';
                    /** VALIDAR INFORMACION */
                    if($examen_json['cant_datos'] > 0)
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
                        $examen->nombre = 'Neurología';
                        $examen->cuerpo = $examen_json['json'];
                        $examen->estado = '1';

                        // if($registro_rfl->save())
                        if($examen->save())
                        {
                            $datos['examen']['estado'] = 1;
                            $datos['examen']['msj'] = 'registro exitoso';
                            $mensaje .= 'Ficha Neurología guardada de forma correcta\n';

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
                            $mensaje .= 'Ficha Neurología No guardada \n';
                        }
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
                        if(!empty($examen))
                        {
                            $array_tem = array(
                                'lugares_atencion' => $request->id_lugar_atencion,
                                'pdf' => $request->mostrarpdf,
                                'tipo' => $request->tipopdf,
                                'id_examen' => $examen->id,
                            );
                        }
                        else
                        {
                            $array_tem = array(
                                'lugares_atencion' => $request->id_lugar_atencion,
                                'pdf' => $request->mostrarpdf,
                                'tipo' => $request->tipopdf,
                                'id_examen' => 0,
                            );
                        }
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

    /** REGISTRO FICHA ATENCION Y CIRUGIA GENERAL*/
    public function store_cg(Request $request)
    {
        $campos_requeridos = 0;
        $mensaje = '';
        if(empty( trim($request->descripcion_hipotesis)))
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

            $ficha->motivo = $request->motivo;
            $ficha->antecedentes = $request->antecedentes;
            $ficha->examen_fisico = $request->examen_fisico;

            $ges = 0;
            // if ($request->modal_ges == 'on' || $request->modal_ges == '1') {
            if ($request->has('modal_ges')) {
                $ges = 1;
            }

            $cronico = 0;
            // if ($request->enf_cronico == 'on' || $request->enf_cronico == '1') {
            if ($request->has('enf_cronico')) {
                $cronico = 1;
            }

            $confidencial = 0;
            // if ($request->confidencial == 'on' || $request->confidencial == '1') {
            if ($request->has('confidencial')) {
                $confidencial = 1;
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
			$ficha->indicaciones = $request->indicaciones;

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
                $mensaje = 'Ficha Clínica guardada de forma correcta\n';

                /** REGISTRO DE CONTROL POST QUIRURGICO */
                if( !empty($request->eg_cpq_cg) ||  !empty($request->hoc_cpa_cg) ||  !empty($request->masas_cpq_cg) ||  !empty($request->obs_egp_cpq_cg))
                {
                    $control_post_q = new ControlPostQuirurgico();
                    $control_post_q->id_ficha_atencion = $ficha->id;
                    $control_post_q->id_profesional = $id_profesional;
                    $control_post_q->id_paciente = $id_paciente;
                    $control_post_q->eg_cpq_cg = $request->eg_cpq_cg;
                    $control_post_q->hoc_cpa_cg = $request->hoc_cpa_cg;
                    $control_post_q->masas_cpq_cg = $request->masas_cpq_cg;
                    $control_post_q->obs_egp_cpq_cg = $request->obs_egp_cpq_cg;
                    $control_post_q->estado = 1;

                    if($control_post_q->save())
                    {
                        $mensaje .='Control Post Quirurgico registrado\n';
                    }
                    else
                    {
                        $mensaje .='Problema en el registro de Control Post Quirurgico\n';
                    }
                }
                else
                {
                    $mensaje .='Registro de Control Post Quirurgico no requerido\n';
                }

                /** registro ficha_cir_general_adulto  */
                $ficha_cirugia_gen_adul = new FichaCirugiaGeneralAdulto();
                $ficha_cirugia_gen_adul->id_ficha_atencion = $ficha->id;
                $ficha_cirugia_gen_adul->id_profesional = $id_profesional;
                $ficha_cirugia_gen_adul->id_paciente = $id_paciente;
                $ficha_cirugia_gen_adul->est_grl = $request->est_grl;
                $ficha_cirugia_gen_adul->ex_seg = $request->ex_seg;
                $ficha_cirugia_gen_adul->cir_grl_urgencia = $request->cir_grl_urgencia;
                $ficha_cirugia_gen_adul->obs_est_grl = $request->obs_est_grl;

                if ($request->tto_med_cg == 'on') {
                    $ficha_cirugia_gen_adul->tto_med_cg = 1;
                } else {
                    $ficha_cirugia_gen_adul->tto_med_cg = 0;
                }

                $ficha_cirugia_gen_adul->rec_tto_cg = $request->rec_tto_cg;

                if ($request->pr_cg == 'on') {
                    $ficha_cirugia_gen_adul->pr_cg = 1;
                } else {
                    $ficha_cirugia_gen_adul->pr_cg = 0;
                }

                $ficha_cirugia_gen_adul->tipo_proc_cg = $request->tipo_proc_cg;
                $ficha_cirugia_gen_adul->plan_proc_cg = $request->plan_proc_cg;
                if ($request->plan_cirugia == 'on') {
                    $ficha_cirugia_gen_adul->plan_cirugia = 1;
                } else {
                    $ficha_cirugia_gen_adul->plan_cirugia = 0;
                }

                $ficha_cirugia_gen_adul->otro = $request->otro;
                $ficha_cirugia_gen_adul->otro1 = $request->otro1;
                $ficha_cirugia_gen_adul->estado = '1';

                if($ficha_cirugia_gen_adul->save())
                {
                    $mensaje = 'Ficha Cirugia General Adulto guardada de forma correcta\n';
                }
                else
                {
                    $mensaje .= 'Ficha Cirugia General Adulto presentó problema al guardar\n';
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

    public function registrar_ficha_atencion_cirugia_digestiva(Request $request)
    {
        try {
            $campos_requeridos = 0;
            $mensaje = '';
            $id_profesional = $request->id_profesional_fc;
            $id_paciente = $request->id_paciente;
            if(empty(trim($request->solicitado_por)))
            {
                $campos_requeridos = 1;
                $mensaje .= 'Solicitado por es Requerido.<br> Su Endoscopía NO ha sido Guardada aún.<br>';
            }
            if(empty( trim($request->desc_endo_gast)))
            {
                //$campos_requeridos = 1;
                $mensaje .= 'La descripción del examen es Requerida.<br> Su Endoscopía NO ha sido Guardada aún.';
            }
            else
            {
                if(empty($request->diag_endos))
                {
                    //$campos_requeridos = 1;
                    $mensaje .= 'El Diagnóstico Endoscópico es Requerido.<br> Su Endoscopía NO ha sido Guardada aún.<br>';
                }
                else
                {

                }
            }

            //return $campos_requeridos;
            if($campos_requeridos == 0)
            {
                $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();
                $ficha = FichaAtencion::where('id', $hora_medica->id_ficha_atencion)->first();

                $tipo_mensaje = 'success';
                $mensaje = 'Ficha Clínica guardada de forma correcta\n';

                //  si cerrarsesion es 2, no se cambia el estado de la hora medica
                if($request->cerrarsession !== 2)
                {
                    $hora_medica->id_estado = 6;
                }

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
                $examen_json = ExamenEspecialidadController::estructuraJson(1,$parametro);

                // return json_encode($examen_json);
                if($examen_json['estado'] == 1)
                {
                    $examen = '';
                    /** VALIDAR INFORMACION */
                    if($examen_json['cant_datos'] > 0)
                    {
                        $profesional = Profesional::find($id_profesional);

                        $examen = new ExamenEspecialidad();
                        $examen->id_tipo = '1';
                        $examen->id_template = '1';
                        $examen->id_examen_tipo = '1';
                        $examen->id_sub_tipo_especialidad = $profesional->id_sub_tipo_especialidad;
                        $examen->id_ficha_atencion = $ficha->id;
                        $examen->id_ficha_especialidad = $examen->id;
                        $examen->id_paciente = $id_paciente;
                        $examen->id_profesional = $id_profesional;
                        $examen->nombre = 'Endoscopía alta';
                        $examen->cuerpo = $examen_json['json'];
                        $examen->estado = '1';
                        // if($registro_rfl->save())
                        if($examen->save())
                        {
                            $datos['examen']['estado'] = 1;
                            $datos['examen']['msj'] = 'registro exitoso';
                            $mensaje .= 'Ficha Endoscopía guardada de forma correcta\n';

                            /** registro de imagenes  */
                            if(!empty($request->input_lista_imagenes))
                            {
                                $array_imagenes = json_decode($request->input_lista_imagenes, true);

                                $resulto_img = array();
                                foreach ($array_imagenes['eda'] as $key => $value)
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
                        if(!empty($examen))
                        {
                            $array_tem = array(
                                'lugares_atencion' => $request->id_lugar_atencion,
                                'pdf' => $request->mostrarpdf,
                                'tipo' => $request->tipopdf,
                                'id_examen' => $examen->id,
                            );
                        }
                        else
                        {
                            $array_tem = array(
                                'lugares_atencion' => $request->id_lugar_atencion,
                                'pdf' => $request->mostrarpdf,
                                'tipo' => $request->tipopdf,
                                'id_examen' => 0,
                            );
                        }
                        return ['success' => true, 'mensaje' => $mensaje];
                    }
                }
                else if($request->cerrarsession == 1)
                {
                //si funciona
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                    return \Redirect::route('home.ingreso');

                }else{
                    // se mantiene en la vista actual
                    $tipo_mensaje = 'success';
                    $mensaje = 'Ficha Clínica guardada de forma correcta\n';
                    return ['estado' => 'ok','mensaje' => $mensaje];
                }


            }
            else
            {
                return ['success' => false, 'error' => 'Ha ocurrido un error'];
            }
        } catch (\Exception $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }

        return ['success' => true];

    }

    /** REGISTRO FICHA ATENCION Y CIRUGIA DIGESTIVA GENERAL*/
    public function store_cdg(Request $request)
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

            $ficha->motivo = $request->motivo;
            $ficha->antecedentes = $request->antecedentes;
            $ficha->examen_fisico = $request->examen_fisico;

            $ges = 0;
            // if ($request->modal_ges == 'on' || $request->modal_ges == '1') {
            if ($request->has('modal_ges')) {
                $ges = 1;
            }

            $cronico = 0;
            // if ($request->enf_cronico == 'on' || $request->enf_cronico == '1') {
            if ($request->has('enf_cronico')) {
                $cronico = 1;
            }

            $confidencial = 0;
            // if ($request->confidencial == 'on' || $request->confidencial == '1') {
            if ($request->has('confidencial')) {
                $confidencial = 1;
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
			$ficha->indicaciones = $request->indicaciones;

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
                $mensaje = 'Ficha Clínica guardada de forma correcta\n';

                /** REGISTRO DE CONTROL POST QUIRURGICO */
                if( !empty($request->eg_cpq_cg) ||  !empty($request->hoc_cpa_cg) ||  !empty($request->masas_cpq_cg) ||  !empty($request->obs_egp_cpq_cg))
                {
                    $control_post_q = new ControlPostQuirurgico();
                    $control_post_q->id_ficha_atencion = $ficha->id;
                    $control_post_q->id_profesional = $id_profesional;
                    $control_post_q->id_paciente = $id_paciente;
                    $control_post_q->eg_cpq_cg = $request->eg_cpq_cg;
                    $control_post_q->hoc_cpa_cg = $request->hoc_cpa_cg;
                    $control_post_q->masas_cpq_cg = $request->masas_cpq_cg;
                    $control_post_q->obs_egp_cpq_cg = $request->obs_egp_cpq_cg;
                    $control_post_q->estado = 1;

                    if($control_post_q->save())
                    {
                        $mensaje .='Control Post Quirurgico registrado\n';
                    }
                    else
                    {
                        $mensaje .='Problema en el registro de Control Post Quirurgico\n';
                    }
                }
                else
                {
                    $mensaje .='Registro de Control Post Quirurgico no requerido\n';
                }

                /** REGISTRO FICHA CIRUGIA GENERAL ADULTO - ficha_cir_general_adulto  */
                $ficha_cirugia_gen_adul = new FichaCirugiaGeneralAdulto();
                $ficha_cirugia_gen_adul->id_ficha_atencion = $ficha->id;
                $ficha_cirugia_gen_adul->id_profesional = $id_profesional;
                $ficha_cirugia_gen_adul->id_paciente = $id_paciente;
                $ficha_cirugia_gen_adul->est_grl = $request->est_grl;
                $ficha_cirugia_gen_adul->ex_seg = $request->ex_seg;
                $ficha_cirugia_gen_adul->cir_grl_urgencia = $request->cir_grl_urgencia;
                $ficha_cirugia_gen_adul->obs_est_grl = $request->obs_est_grl;

                if ($request->tto_med_cg == 'on') {
                    $ficha_cirugia_gen_adul->tto_med_cg = 1;
                } else {
                    $ficha_cirugia_gen_adul->tto_med_cg = 0;
                }

                $ficha_cirugia_gen_adul->rec_tto_cg = $request->rec_tto_cg;

                if ($request->pr_cg == 'on') {
                    $ficha_cirugia_gen_adul->pr_cg = 1;
                } else {
                    $ficha_cirugia_gen_adul->pr_cg = 0;
                }

                $ficha_cirugia_gen_adul->tipo_proc_cg = $request->tipo_proc_cg;
                $ficha_cirugia_gen_adul->plan_proc_cg = $request->plan_proc_cg;
                if ($request->plan_cirugia == 'on') {
                    $ficha_cirugia_gen_adul->plan_cirugia = 1;
                } else {
                    $ficha_cirugia_gen_adul->plan_cirugia = 0;
                }

                $ficha_cirugia_gen_adul->otro = $request->otro;
                $ficha_cirugia_gen_adul->otro1 = $request->otro1;
                $ficha_cirugia_gen_adul->estado = '1';

                if($ficha_cirugia_gen_adul->save())
                {

                    $mensaje .= 'Ficha Cirugia General Adulto guardada de forma correcta\n';

                    /** REGISTRO  FICHA CIRUGIA DIGESTIVA GENERAL - ficha_cir_digestiva_general*/
                    $ficha_cd = new FichaCirugiaDigestivaGeneralAdulto();
                    $ficha_cd->id_ficha_atencion = $ficha->id;
                    $ficha_cd->id_ficha_cirugia = $ficha_cirugia_gen_adul->id;
                    $ficha_cd->id_profesional = $id_profesional;
                    $ficha_cd->id_paciente = $id_paciente;

                    /** CIRUGIA DIGESTIVA ALTA */
                    $ficha_cd->cda_mc = $request->cda_mc;
                    $ficha_cd->cda_ex_fis = $request->cda_ex_fis;
                    $ficha_cd->urgencia_cda = $request->urgencia_cda;
                    $ficha_cd->obs_egp_cda = $request->obs_egp_cda;
                    $ficha_cd->tto_med_cda = $request->tto_med_cda;
                    $ficha_cd->rec_tto_cda = $request->rec_tto_cda;
                    if ($request->pr_cda == 'on') {
                        $ficha_cd->pr_cda = 1;
                    } else {
                        $ficha_cd->pr_cda = 0;
                    }
                    $ficha_cd->tipo_proc_cda = $request->tipo_proc_cda;
                    $ficha_cd->plan_proc_cda = $request->plan_proc_cda;
                    if ($request->cirug_cda == 'on') {
                        $ficha_cd->cirug_cda = 1;
                    } else {
                        $ficha_cd->cirug_cda = 0;
                    }
                    $ficha_cd->obs_plan_trat_cda = $request->obs_plan_trat_cda;

                    /** CIRUGIA DIGESTIVA BAJA */
                    $ficha_cd->cdb_ex_fisico_ab = $request->cdb_ex_fisico_ab;
                    $ficha_cd->cdb_ex_tr = $request->cdb_ex_tr;
                    $ficha_cd->urgencia_cdb = $request->urgencia_cdb;
                    $ficha_cd->obs_egp_cdb  = $request->obs_egp_cdb ;
                    $ficha_cd->tto_med_cdb = $request->tto_med_cdb;
                    $ficha_cd->rec_tto_cdb = $request->rec_tto_cdb;
                    if ($request->pr_cdb == 'on') {
                        $ficha_cd->pr_cdb = 1;
                    } else {
                        $ficha_cd->pr_cdb = 0;
                    }
                    $ficha_cd->tipo_proc_cdb = $request->tipo_proc_cdb;
                    $ficha_cd->plan_proc_cdb = $request->plan_proc_cdb;
                    if ($request->cirug_cdb == 'on') {
                        $ficha_cd->cirug_cdb = 1;
                    } else {
                        $ficha_cd->cirug_cdb = 0;
                    }
                    $ficha_cd->obs_plan_trat_cdb = $request->obs_plan_trat_cdb;

                    /** CIRUGIA DIGESTIVA GENERAL */
                    $ficha_cd->cdg_mc = $request->cdg_mc;
                    $ficha_cd->cdg_ex_fis = $request->cdg_ex_fis;
                    $ficha_cd->urgencia_cdg = $request->urgencia_cdg;
                    $ficha_cd->obs_egp_cdg  = $request->obs_egp_cdg ;
                    $ficha_cd->tto_med_cdg = $request->tto_med_cdg;
                    $ficha_cd->rec_tto_cdg = $request->rec_tto_cdg;
                    if ($request->pr_cdg == 'on') {
                        $ficha_cd->pr_cdg = 1;
                    } else {
                        $ficha_cd->pr_cdg = 0;
                    }
                    $ficha_cd->tipo_proc_cdg = $request->tipo_proc_cdg;
                    $ficha_cd->plan_proc_cdg = $request->plan_proc_cdg;
                    if ($request->cirug_cdg == 'on') {
                        $ficha_cd->cirug_cdg = 1;
                    } else {
                        $ficha_cd->cirug_cdg = 0;
                    }
                    $ficha_cd->obs_plan_trat_cdg = $request->obs_plan_trat_cdg;

                    /** OTROS */
                    $ficha_cd->otro = $request->otro;
                    $ficha_cd->otro1 = $request->otro1;
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
                                        $examen = '';
                                        /** VALIDAR INFORMACION */
                                        if($examen_json['cant_datos'] > 0)
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
                        $mensaje .= 'Ficha Cirugia Digestiva presentó problema al guardar\n';
                    }
                }
                else
                {
                    $mensaje .= 'Ficha Cirugia General Adulto presentó problema al guardar\n';
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

    /** REGISTRO FICHA ATENCION Y UROLOGIA*/
    public function store_uro(Request $request)
    {
        $campos_requeridos = 0;
        $mensaje = '';


        if(empty( trim($request->descripcion_hipotesis)))
        {
            $campos_requeridos = 1;
            $mensaje .= 'El Diagnóstico es Requerido.\n';
            $mensaje .='Su Ficha Clínica NO ha sido Guardada aún. \n Si es solo Control, indicar Control de Patología.';
        }
        else
        {

            if(empty($request->mc_ex_fisico_cons) || empty($request->obs_egp_uro))
            {
                $campos_requeridos = 1;
                if(empty($request->mc_ex_fisico_cons))
                {
                    $mensaje .= 'El Motivo de consulta y Examen general es Requerido\n';
                }

                if(empty($request->obs_egp_uro))
                {
                    $mensaje .= 'El Estado General del Paciente es Requerido\n';
                }
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

            /** validacion de veneria */
            if(
                !empty($request->select_1_ven_sint) ||  !empty($request->select_2_ven_ant_pat_ant) ||  !empty($request->ot_ant_ven_pat) ||  !empty($request->select_6_ven_gen) ||
                !empty($request->select_7_ven_ant_cond) || !empty($request->select_8_ven_prot) || !empty($request->select_9_ven_cont_sos) || !empty($request->select_3_ven_ant_pat_pater) ||
                !empty($request->select_4_ven_ant_pat_mater) || !empty($request->select_5_pat_ssfam) || !empty($request->ven_ex_fg) || !empty($request->ven_ex_pm) ||
                !empty($request->ven_obs_egp) || !empty($request->ven_gen_masc) || !empty($request->ven_gen_fem) || !empty($request->imagenes_ven_pre) ||
                !empty($request->imagenes_ven_post) || !empty($request->obs_fotos_ven) || !empty($request->tto_ven) || !empty($request->pr_ven) ||
                !empty($request->hosp_ven) || !empty($request->recom_tto_ven) || !empty($request->tipo_proc_ven) || !empty($request->plan_ven_proc) ||
                !empty($request->obs_plan_tratamiento) || !empty($request->diagnostico_ven) || !empty($request->descripcion_cie_ven) || !empty($request->indicaciones_ven)
            ){

                if(empty($request->select_1_ven_sint))
                {
                    $campos_requeridos = 1;
                    $mensaje .= 'Venereas - El Sintomatología actual es Requerido.\n';
                }

                if(empty($request->diagnostico_ven))
                {
                    $campos_requeridos = 1;
                    $mensaje .= 'Venereas - El Diagnóstico de Veneria es Requerido.\n';
                }
            }
            $mensaje .='Su Ficha Clínica NO ha sido Guardada aún. \n Si es solo Control, indicar Control de Patología.';
        }


        if($campos_requeridos == 0)
        {
            $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();

            $ficha = FichaAtencion::where('id', $hora_medica->id_ficha_atencion)->first();
            $id_profesional = $request->id_profesional_fc;
            $id_paciente = $request->id_paciente_fc;

            $ficha->motivo = $request->motivo;
            $ficha->antecedentes = $request->antecedentes;
            $ficha->examen_fisico = $request->examen_fisico;

            $ges = 0;
            // if ($request->modal_ges == 'on' || $request->modal_ges == '1') {
            if ($request->has('modal_ges')) {
                $ges = 1;
            }

            $cronico = 0;
            // if ($request->enf_cronico == 'on' || $request->enf_cronico == '1') {
            if ($request->has('enf_cronico')) {
                $cronico = 1;
            }

            $confidencial = 0;
            // if ($request->confidencial == 'on' || $request->confidencial == '1') {
            if ($request->has('confidencial')) {
                $confidencial = 1;
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
			$ficha->indicaciones = $request->indicaciones;

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
                $mensaje = 'Ficha Clínica guardada de forma correcta\n';

                // $ficha_uro->estado = 1;
                $ficha_urologia = new FichaUrologiaAdulto();
                $ficha_urologia->id_ficha_atencion = $ficha->id;
                $ficha_urologia->id_profesional= $id_profesional;
                $ficha_urologia->id_paciente = $id_paciente;

                $ficha_urologia->mc_ex_fisico_cons=$request->mc_ex_fisico_cons;
                $ficha_urologia->uro_gen_ext=$request->uro_gen_ext;
                $ficha_urologia->uro_gen_int=$request->uro_gen_int;
                $ficha_urologia->urgencia_uro=$request->urgencia_uro;
                $ficha_urologia->obs_egp_uro=$request->obs_egp_uro;
                $ficha_urologia->uro_res_exam=$request->uro_res_exam;

                $ficha_urologia->imagen_uro_pre=$request->imagen_uro_pre;
                $ficha_urologia->imagen_uro_post=$request->imagen_uro_post;
                $ficha_urologia->obs_fotos_uro=$request->obs_fotos_uro;

                if ($request->tto_uro == '1') {
                    $ficha_urologia->tto_uro = 1;
                } else {
                    $ficha_urologia->tto_uro = 0;
                }
                $ficha_urologia->rec_tto_uro=$request->rec_tto_uro;

                if ($request->pr_uro == '1') {
                    $ficha_urologia->pr_uro = 1;
                } else {
                    $ficha_urologia->pr_uro = 0;
                }
                $ficha_urologia->tipo_proc_uro=$request->tipo_proc_uro;
                $ficha_urologia->plan_proc_uro=$request->plan_proc_uro;

                if ($request->urogen_cir == '1') {
                    $ficha_urologia->urogen_cir = 1;
                } else {
                    $ficha_urologia->urogen_cir = 0;
                }
                $ficha_urologia->obs_gen_plan_tto=$request->obs_gen_plan_tto;

                $ficha_urologia->otro=$request->otro;
                $ficha_urologia->otro1=$request->otro1;
                $ficha_urologia->estado= 1;

                if($ficha_urologia->save())
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

                            $parametro['id_ficha_uro'] = $ficha_urologia->id;

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
                                $examen->id_ficha_especialidad = $ficha_urologia->id;
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

                    /** REGISTRO DE VENEREAS */
                    if(
                        !empty($request->select_1_ven_sint) ||  !empty($request->select_2_ven_ant_pat_ant) ||  !empty($request->ot_ant_ven_pat) ||  !empty($request->select_6_ven_gen) ||
                        !empty($request->select_7_ven_ant_cond) || !empty($request->select_8_ven_prot) || !empty($request->select_9_ven_cont_sos) || !empty($request->select_3_ven_ant_pat_pater) ||
                        !empty($request->select_4_ven_ant_pat_mater) || !empty($request->select_5_pat_ssfam) || !empty($request->ven_ex_fg) || !empty($request->ven_ex_pm) ||
                        !empty($request->ven_obs_egp) || !empty($request->ven_gen_masc) || !empty($request->ven_gen_fem) || !empty($request->imagenes_ven_pre) ||
                        !empty($request->imagenes_ven_post) || !empty($request->obs_fotos_ven) || !empty($request->tto_ven) || !empty($request->pr_ven) ||
                        !empty($request->hosp_ven) || !empty($request->recom_tto_ven) || !empty($request->tipo_proc_ven) || !empty($request->plan_ven_proc) ||
                        !empty($request->obs_plan_tratamiento) || !empty($request->diagnostico_ven) || !empty($request->descripcion_cie_ven) || !empty($request->indicaciones_ven)
                    ){
                        $ficha_venerea = new FichaVenereas ();
                        $ficha_venerea->id_ficha_atencion = $ficha->id;
                        $ficha_venerea->id_profesional= $id_profesional;
                        $ficha_venerea->id_paciente = $id_paciente;
                        $ficha_venerea->select_1_ven_sint = $request->select_1_ven_sint;
                        $ficha_venerea->select_2_ven_ant_pat_ant = $request->select_2_ven_ant_pat_ant;
                        $ficha_venerea->ot_ant_ven_pat = $request->ot_ant_ven_pat;
                        $ficha_venerea->select_6_ven_gen = $request->select_6_ven_gen;
                        $ficha_venerea->select_7_ven_ant_cond = $request->select_7_ven_ant_cond;
                        $ficha_venerea->select_8_ven_prot = $request->select_8_ven_prot;
                        $ficha_venerea->select_9_ven_cont_sos = $request->select_9_ven_cont_sos;
                        $ficha_venerea->select_3_ven_ant_pat_pater = $request->select_3_ven_ant_pat_pater;
                        $ficha_venerea->select_4_ven_ant_pat_mater = $request->select_4_ven_ant_pat_mater;
                        $ficha_venerea->select_5_pat_ssfam = $request->select_5_pat_ssfam;
                        $ficha_venerea->ven_ex_fg = $request->ven_ex_fg;
                        $ficha_venerea->ven_ex_pm = $request->ven_ex_pm;
                        $ficha_venerea->ven_obs_egp = $request->ven_obs_egp;
                        $ficha_venerea->ven_gen_masc = $request->ven_gen_masc;
                        $ficha_venerea->ven_gen_fem = $request->ven_gen_fem;

                        $ficha_venerea->imagenes_ven_pre = $request->imagenes_ven_pre;
                        $ficha_venerea->imagenes_ven_post = $request->imagenes_ven_post;
                        $ficha_venerea->obs_fotos_ven = $request->obs_fotos_ven;

                        if($request->tto_ven == 1)
                            $ficha_venerea->tto_ven = 1;
                        else
                            $ficha_venerea->tto_ven = 0;

                        $ficha_venerea->recom_tto_ven = $request->recom_tto_ven;


                        if($request->pr_ven == 1)
                            $ficha_venerea->pr_ven = 1;
                        else
                            $ficha_venerea->pr_ven = 0;

                        $ficha_venerea->tipo_proc_ven = $request->tipo_proc_ven;
                        $ficha_venerea->plan_ven_proc = $request->plan_ven_proc;


                        if($request->hosp_ven == 1)
                            $ficha_venerea->hosp_ven = 1;
                        else
                            $ficha_venerea->hosp_ven = 0;



                        $ficha_venerea->obs_plan_tratamiento = $request->obs_plan_tratamiento;
                        $ficha_venerea->diagnostico_ven = $request->diagnostico_ven;
                        $ficha_venerea->descripcion_cie_ven = $request->descripcion_cie_ven;
                        $ficha_venerea->indicaciones_ven = $request->indicaciones_ven;
                        $ficha_venerea->otro = $request->otro;
                        $ficha_venerea->otro1 = $request->otro1;
                        $ficha_venerea->estado= 1;

                        if($ficha_venerea->save())
                        {
                            $mensaje = 'Ficha Venéreas guardada de forma correcta\n';
                        }
                        else
                        {
                            $mensaje = 'Falla en el registro de Ficha Venéreas\n';
                        }
                    }


                }
                else
                {
                    $mensaje .= 'Ficha Cirugia General presentó problema al guardar\n';
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

    /** REGISTRO FICHA ATENCION Y OFTALMOLOGIA*/
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

            $ficha->motivo = $request->motivo;
            $ficha->antecedentes = $request->antecedentes;
            $ficha->examen_fisico = $request->examen_fisico;

            $ges = 0;
            // if ($request->modal_ges == 'on' || $request->modal_ges == '1') {
            if ($request->has('modal_ges')) {
                $ges = 1;
            }

            $cronico = 0;
            // if ($request->enf_cronico == 'on' || $request->enf_cronico == '1') {
            if ($request->has('enf_cronico')) {
                $cronico = 1;
            }

            $confidencial = 0;
            // if ($request->confidencial == 'on' || $request->confidencial == '1') {
            if ($request->has('confidencial')) {
                $confidencial = 1;
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
			$ficha->indicaciones = $request->indicaciones;

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
                /** REGISTRO FICHA OFT  FichaOftalmologiaAdulto */
                $ficha_oft = new FichaOftalmologiaAdulto();
                $ficha_oft->id_ficha_atencion = $ficha->id;
                $ficha_oft->id_profesional = $id_profesional;
                $ficha_oft->id_paciente = $id_paciente;
                $ficha_oft->tto_ojo = $request->tto_ojo;
                $ficha_oft->rec_tto_ojo = $request->rec_tto_ojo;
                $ficha_oft->pr_ojo = $request->pr_ojo;
                $ficha_oft->tipo_proc_ojo = $request->tipo_proc_ojo;
                $ficha_oft->plan_proc_ojo = $request->plan_proc_ojo;
                $ficha_oft->r_lentes = $request->r_lentes;
                $ficha_oft->ojo_cir = $request->ojo_cir;
                $ficha_oft->obs_gen_plan_tto = $request->obs_gen_plan_tto;
                $ficha_oft->obs_ex_generales = $request->obs_ex_generales;
                $ficha_oft->otro = $request->otro;
                $ficha_oft->otro1 = $request->otro1;
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


                    /** REGISTRO FICHA OFTALMOLOGIA Biomicroscopia   */
                    if( !empty($request->parpbiood) || !empty($request->obs_parpbiood) || !empty($request->conjuntiva_bio_od) ||
                        !empty($request->obs_conjuntiva_bio_od) || !empty($request->biocornea_od) || !empty($request->obs_biocornea_od) ||
                        !empty($request->camara_ant_od) || !empty($request->obs_camara_ant_od) || !empty($request->tyndall_od) ||
                        !empty($request->obs_tyndall_od) || !empty($request->cristalino_bio_od) || !empty($request->obs_cristalino_bio_od) ||
                        // !empty($request->campo_otros_bio_od) ||
                        !empty($request->parpbiooi) || !empty($request->obs_parpbiooi) ||
                        !empty($request->conjuntiva_bio_oi) || !empty($request->obs_conjuntiva_bio_oi) || !empty($request->biocornea_oi) ||
                        !empty($request->obs_biocornea_oi) || !empty($request->camara_ant_oi) || !empty($request->obs_camara_ant_oi) ||
                        !empty($request->tyndall_oi) || !empty($request->obs_tyndall_oi) || !empty($request->cristalino_bio_oi) ||
                        !empty($request->obs_cristalino_bio_oi || !empty($request->otro))
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
                        //$ficha_bio->campo_otros_bio_od = $request->campo_otros_bio_od;
                        $ficha_bio->otro = $request->otro;
                        $ficha_bio->otro2 = '';
                        $ficha_bio->estado = 1;

                        if($ficha_bio->save())
                        {
                            $mensaje .= 'Biomicroscopia registrada con exito\n';
                        }
                        else
                        {
                            $mensaje .= 'Biomicroscopia con problema al registrar\n';
                        }
                    }
                    else
                    {
                        // $mensaje .= 'Ficha Clínica Oftalmolagia Biomicroscopia no requiere ser registrado\n';
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
                        $ficha_fo->otro2 = $request->otro2;
                        $ficha_fo->estado = 1;

                        if($ficha_fo->save())
                        {
                            $mensaje .= 'Examen de Fondo de Ojo registrada correctamente\n';
                        }
                        else
                        {
                            $mensaje .= 'Examen de Fondo de Ojo C/problemas al registrar\n';
                        }
                    }
                    else
                    {
                        // $mensaje .= 'Ficha Clínica Oftalmolagia Fondo de Ojo no requiere ser registrado\n';
                    }


                    /** REGISTRO FICHA OFTALMOLOGIA oftalmo_examen_agudeza_visual */
                    if(
                        !empty($request->av_subj_sc_od) || !empty($request->obs_av_subj_sc_od) || !empty($request->av_subj_sc_oi) ||
                        !empty($request->obs_av_subj_sc_oi) || !empty($request->av_cc_od) || !empty($request->obs_av_cc_od) ||
                        !empty($request->av_cc_oi) || !empty($request->obs_av_cc_oi) || !empty($request->av_autorefrac_od) ||
                        !empty($request->obs_av_autorefrac_od) || !empty($request->av_autorefrac_oi) || !empty($request->obs_av_autorefrac_oi) ||
                        !empty($request->av_ret_od_cc) || !empty($request->av_ret_oi_cc) || !empty($request->av_ret_od_sc) ||
                        !empty($request->av_ret_oi_sc) || !empty($request->av_add) || !empty($request->av_dip) ||
                        !empty($request->av_pris_od) || !empty($request->av_pris_oi)
                    )
                    {
                        $ficha_oftalmo_examen_agudeza_visual = new OftalmoExamenAgudezaVisual();
                        $ficha_oftalmo_examen_agudeza_visual->id_ficha_atencion = $ficha->id;
                        $ficha_oftalmo_examen_agudeza_visual->id_oftalmologia_adulto = $ficha_oft->id;
                        $ficha_oftalmo_examen_agudeza_visual->id_paciente = $id_paciente;
                        $ficha_oftalmo_examen_agudeza_visual->id_profesional = $id_profesional;
                        $ficha_oftalmo_examen_agudeza_visual->av_subj_sc_od = $request->av_subj_sc_od;
                        $ficha_oftalmo_examen_agudeza_visual->obs_av_subj_sc_od = $request->obs_av_subj_sc_od;
                        $ficha_oftalmo_examen_agudeza_visual->av_subj_sc_oi = $request->av_subj_sc_oi;
                        $ficha_oftalmo_examen_agudeza_visual->obs_av_subj_sc_oi = $request->obs_av_subj_sc_oi;
                        $ficha_oftalmo_examen_agudeza_visual->av_cc_od = $request->av_cc_od;
                        $ficha_oftalmo_examen_agudeza_visual->obs_av_cc_od = $request->obs_av_cc_od;
                        $ficha_oftalmo_examen_agudeza_visual->av_cc_oi = $request->av_cc_oi;
                        $ficha_oftalmo_examen_agudeza_visual->obs_av_cc_oi = $request->obs_av_cc_oi;
                        $ficha_oftalmo_examen_agudeza_visual->av_autorefrac_od = $request->av_autorefrac_od;
                        $ficha_oftalmo_examen_agudeza_visual->obs_av_autorefrac_od = $request->obs_av_autorefrac_od;
                        $ficha_oftalmo_examen_agudeza_visual->av_autorefrac_oi = $request->av_autorefrac_oi;
                        $ficha_oftalmo_examen_agudeza_visual->obs_av_autorefrac_oi = $request->obs_av_autorefrac_oi;
                        $ficha_oftalmo_examen_agudeza_visual->av_ret_od_cc = $request->av_ret_od_cc;
                        $ficha_oftalmo_examen_agudeza_visual->av_ret_oi_cc = $request->av_ret_oi_cc;
                        $ficha_oftalmo_examen_agudeza_visual->av_ret_od_sc = $request->av_ret_od_sc;
                        $ficha_oftalmo_examen_agudeza_visual->av_ret_oi_sc = $request->av_ret_oi_sc;
                        $ficha_oftalmo_examen_agudeza_visual->av_add = $request->av_add;
                        $ficha_oftalmo_examen_agudeza_visual->av_dip = $request->av_dip;
                        $ficha_oftalmo_examen_agudeza_visual->av_pris_od = $request->av_pris_od;
                        $ficha_oftalmo_examen_agudeza_visual->av_pris_oi = $request->av_pris_oi;
                        $ficha_oftalmo_examen_agudeza_visual->otro = '';
                        $ficha_oftalmo_examen_agudeza_visual->otro1 = '';
                        $ficha_oftalmo_examen_agudeza_visual->estado = 1;

                        if($ficha_oftalmo_examen_agudeza_visual->save())
                        {
                            $mensaje .='Examen Agudeza Visual registrado con exito.\n';
                        }
                        else
                        {
                            $mensaje .= 'Falla en el registro de Examen Agudeza Visual.\n';
                        }
                    }
                    else
                    {
                        // $mensaje .= 'no hace falta registrar';
                    }

                    /** REGISTRO FICHA OFTALMOLOGIA oftalmo_examen_neurologico */
                    if(
                        !empty($request->ne_mov_oculares) || !empty($request->obs_ne_mov_oculares) || !empty($request->ne_pupul) ||
                        !empty($request->obs_ne_pupul) || !empty($request->ne_rfm) || !empty($request->obs_ne_rfm) ||
                        !empty($request->ne_dpar) || !empty($request->obs_ne_dpar) || !empty($request->ne_diplo) ||
                        !empty($request->obs_ne_diplo)
                    )
                    {
                        $ficha_oftalmo_examen_neurologico = new OftalmoExamenNeurologico();
                        $ficha_oftalmo_examen_neurologico->id_ficha_atencion = $ficha->id;
                        $ficha_oftalmo_examen_neurologico->id_oftalmologia_adulto = $ficha_oft->id;
                        $ficha_oftalmo_examen_neurologico->id_paciente = $id_paciente;
                        $ficha_oftalmo_examen_neurologico->id_profesional = $id_profesional;
                        $ficha_oftalmo_examen_neurologico->ne_mov_oculares = $request->ne_mov_oculares;
                        $ficha_oftalmo_examen_neurologico->obs_ne_mov_oculares = $request->obs_ne_mov_oculares;
                        $ficha_oftalmo_examen_neurologico->ne_pupul = $request->ne_pupul;
                        $ficha_oftalmo_examen_neurologico->obs_ne_pupul = $request->obs_ne_pupul;
                        $ficha_oftalmo_examen_neurologico->ne_rfm = $request->ne_rfm;
                        $ficha_oftalmo_examen_neurologico->obs_ne_rfm = $request->obs_ne_rfm;
                        $ficha_oftalmo_examen_neurologico->ne_dpar = $request->ne_dpar;
                        $ficha_oftalmo_examen_neurologico->obs_ne_dpar = $request->obs_ne_dpar;
                        $ficha_oftalmo_examen_neurologico->ne_diplo = $request->ne_diplo;
                        $ficha_oftalmo_examen_neurologico->obs_ne_diplo = $request->obs_ne_diplo;
                        $ficha_oftalmo_examen_neurologico->otro = $request->otro;
                        $ficha_oftalmo_examen_neurologico->otro1 = $request->otro1;
                        $ficha_oftalmo_examen_neurologico->estado = 1;

                        if($ficha_oftalmo_examen_neurologico->save())
                        {
                            $mensaje .= 'Examen Neurológico registrado con Exito\n';
                        }
                        else
                        {
                            $mensaje .= 'Examen Neurológico con Falla en el registro\n';
                        }
                    }
                    else
                    {
                        // $mensaje .= 'no hace falta registrar';
                    }

                    /** REGISTRO FICHA OFTALMOLOGIA oftalmo_examen_presion_ocular */
                    if(
                        !empty($request->po_od) || !empty($request->obs_po_od) || !empty($request->po_val_od) ||
                        !empty($request->po_oi) || !empty($request->obs_po_oi) || !empty($request->po_val_oi)
                    )
                    {
                        $ficha_oftalmo_examen_presion_ocular = new OftalmoExamenPresionOcular();
                        $ficha_oftalmo_examen_presion_ocular->id_ficha_atencion = $ficha->id;
                        $ficha_oftalmo_examen_presion_ocular->id_oftalmologia_adulto = $ficha_oft->id;
                        $ficha_oftalmo_examen_presion_ocular->id_paciente = $id_paciente;
                        $ficha_oftalmo_examen_presion_ocular->id_profesional = $id_profesional;
                        $ficha_oftalmo_examen_presion_ocular->po_od = $request->po_od;
                        $ficha_oftalmo_examen_presion_ocular->obs_po_od = $request->obs_po_od;
                        $ficha_oftalmo_examen_presion_ocular->po_val_od = $request->po_val_od;
                        $ficha_oftalmo_examen_presion_ocular->po_oi = $request->po_oi;
                        $ficha_oftalmo_examen_presion_ocular->obs_po_oi = $request->obs_po_oi;
                        $ficha_oftalmo_examen_presion_ocular->po_val_oi = $request->po_val_oi;
                        $ficha_oftalmo_examen_presion_ocular->otro = $request->otro;
                        $ficha_oftalmo_examen_presion_ocular->otro1 = $request->otro1;
                        $ficha_oftalmo_examen_presion_ocular->estado = 1;

                        if($ficha_oftalmo_examen_presion_ocular->save())
                        {
                            $mensaje .= 'Examen Presión Ocular registrado con Exito\n';
                        }
                        else
                        {
                            $mensaje .= 'Examen Presión Ocular Falla en el registro\n';
                        }
                    }
                    else
                    {
                        // $mensaje .= 'no hace falta registrar';
                    }

                    /** REGISTRO FICHA OFTALMOLOGIA oftalmo_examen_vision_colores */
                    if( !empty($request->v_col_test) || !empty($request->obs_v_col_test) || !empty($request->v_col_tipo) || !empty($request->obs_tipo_v_col) )
                    {
                        $ficha_oftalmo_examen_vision_colores = new OftalmoExamenVisionColores();

                        $ficha_oftalmo_examen_vision_colores->id_ficha_atencion = $ficha->id;
                        $ficha_oftalmo_examen_vision_colores->id_oftalmologia_adulto = $ficha_oft->id;
                        $ficha_oftalmo_examen_vision_colores->id_paciente = $id_paciente;
                        $ficha_oftalmo_examen_vision_colores->id_profesional = $id_profesional;
                        $ficha_oftalmo_examen_vision_colores->v_col_test = $request->v_col_test;
                        $ficha_oftalmo_examen_vision_colores->obs_v_col_test = $request->obs_v_col_test;
                        $ficha_oftalmo_examen_vision_colores->v_col_tipo = $request->v_col_tipo;
                        $ficha_oftalmo_examen_vision_colores->obs_tipo_v_col = $request->obs_tipo_v_col;
                        $ficha_oftalmo_examen_vision_colores->otro = $request->otro;
                        $ficha_oftalmo_examen_vision_colores->otro1 = $request->otro1;
                        $ficha_oftalmo_examen_vision_colores->estado = 1;
                        if($ficha_oftalmo_examen_vision_colores->save())
                        {
                            $mensaje .= 'Examen Vision Colores registrado con Exito\n';
                        }
                        else
                        {
                            $mensaje .= 'Examen Vision Colores Falla en el registro\n';
                        }
                    }
                    else
                    {
                        // $mensaje .= 'no hace falta registrar';
                    }
                    /** REGISTRO FICHA OFTALMOLOGIA oftalmo_examen_estrabismo */
                    if(
                        !empty($request->est_ct_int) || !empty($request->obs_est_ct_int) || !empty($request->est_ct_alt) ||
                        !empty($request->obs_est_ct_alt) || !empty($request->est_ct_prisma) || !empty($request->obs_est_ct_prisma) ||
                        !empty($request->est_test_hirsch) || !empty($request->obs_est_test_hirsch) || !empty($request->est_Krim) ||
                        !empty($request->obs_est_Krim) || !empty($request->est_ot_est) || !empty($request->obs_est_estr)
                    )
                    {
                        $ficha_oftalmo_examen_estrabismo = new OftalmoExamenEstrabismo();
                        $ficha_oftalmo_examen_estrabismo->id_ficha_atencion = $ficha->id;
                        $ficha_oftalmo_examen_estrabismo->id_oftalmologia_adulto = $ficha_oft->id;
                        $ficha_oftalmo_examen_estrabismo->id_paciente = $id_paciente;
                        $ficha_oftalmo_examen_estrabismo->id_profesional = $id_profesional;
                        $ficha_oftalmo_examen_estrabismo->est_ct_int = $request->est_ct_int;
                        $ficha_oftalmo_examen_estrabismo->obs_est_ct_int = $request->obs_est_ct_int;
                        $ficha_oftalmo_examen_estrabismo->est_ct_alt = $request->est_ct_alt;
                        $ficha_oftalmo_examen_estrabismo->obs_est_ct_alt = $request->obs_est_ct_alt;
                        $ficha_oftalmo_examen_estrabismo->est_ct_prisma = $request->est_ct_prisma;
                        $ficha_oftalmo_examen_estrabismo->obs_est_ct_prisma = $request->obs_est_ct_prisma;
                        $ficha_oftalmo_examen_estrabismo->est_test_hirsch = $request->est_test_hirsch;
                        $ficha_oftalmo_examen_estrabismo->obs_est_test_hirsch = $request->obs_est_test_hirsch;
                        $ficha_oftalmo_examen_estrabismo->est_Krim = $request->est_Krim;
                        $ficha_oftalmo_examen_estrabismo->obs_est_Krim = $request->obs_est_Krim;
                        $ficha_oftalmo_examen_estrabismo->est_ot_est = $request->est_ot_est;
                        $ficha_oftalmo_examen_estrabismo->obs_est_estr = $request->obs_est_estr;
                        $ficha_oftalmo_examen_estrabismo->otro = $request->otro;
                        $ficha_oftalmo_examen_estrabismo->otro1 = $request->otro1;
                        $ficha_oftalmo_examen_estrabismo->estado = 1;
                        if($ficha_oftalmo_examen_estrabismo->save())
                        {
                            $mensaje .= 'Examen Estrabismo registrado con Exito\n';
                        }
                        else
                        {
                            $mensaje .= 'Examen Estrabismo Falla en el registro \n';
                        }
                    }
                    else
                    {
                        // $mensaje .= 'no hace falta registrar';
                    }

                    /** REGISTRO FICHA OFTALMOLOGIA oftalmo_examen_mov_oculares */
                    if(
                        !empty($request->ducciones) || !empty($request->obs_ducc) || !empty($request->versiones) ||
                        !empty($request->obs_versiones) || !empty($request->vergencia) || !empty($request->obs_vergencia) ||
                        !empty($request->estereop) || !empty($request->obs_estereop)
                    )
                    {
                        $ficha_oftalmo_examen_mov_oculares = new OftalmoExamenMovOculares();

                        $ficha_oftalmo_examen_mov_oculares->id_ficha_atencion = $ficha->id;
                        $ficha_oftalmo_examen_mov_oculares->id_oftalmologia_adulto = $ficha_oft->id;
                        $ficha_oftalmo_examen_mov_oculares->id_paciente = $id_paciente;
                        $ficha_oftalmo_examen_mov_oculares->id_profesional = $id_profesional;
                        $ficha_oftalmo_examen_mov_oculares->ducciones = $request->ducciones;
                        $ficha_oftalmo_examen_mov_oculares->obs_ducc = $request->obs_ducc;
                        $ficha_oftalmo_examen_mov_oculares->versiones = $request->versiones;
                        $ficha_oftalmo_examen_mov_oculares->obs_versiones = $request->obs_versiones;
                        $ficha_oftalmo_examen_mov_oculares->vergencia = $request->vergencia;
                        $ficha_oftalmo_examen_mov_oculares->obs_vergencia=  $request->obs_vergencia;
                        $ficha_oftalmo_examen_mov_oculares->estereop = $request->estereop;
                        $ficha_oftalmo_examen_mov_oculares->obs_estereop = $request->obs_estereop;
                        $ficha_oftalmo_examen_mov_oculares->otro = $request->otro;
                        $ficha_oftalmo_examen_mov_oculares->otro1 = $request->otro1;
                        $ficha_oftalmo_examen_mov_oculares->estado = 1;

                        if($ficha_oftalmo_examen_mov_oculares->save())
                        {
                            $mensaje .= 'Examen Movimiento Oculares registrado con Exito\n';
                        }
                        else
                        {
                            $mensaje .= 'Examen Movimiento Oculares Falla en el registro \n';
                        }
                    }
                    else
                    {
                        // $mensaje .= 'no hace falta registrar';
                    }

                    /** REGISTRO FICHA OFTALMOLOGIA oftalmo_examen_campo_visual */
                    if( !empty($request->campo_visual_od) || !empty($request->obs_campo_visual_od) || !empty($request->campo_visual_oi) || !empty($request->obs_campo_visual_oi) )
                    {
                        $ficha_oftalmo_examen_campo_visual = new OftalmoExamenCampoVisual();

                        $ficha_oftalmo_examen_campo_visual->id_ficha_atencion = $ficha->id;
                        $ficha_oftalmo_examen_campo_visual->id_oftalmologia_adulto = $ficha_oft->id;
                        $ficha_oftalmo_examen_campo_visual->id_paciente = $id_paciente;
                        $ficha_oftalmo_examen_campo_visual->id_profesional = $id_profesional;
                        $ficha_oftalmo_examen_campo_visual->campo_visual_od = $request->campo_visual_od;
                        $ficha_oftalmo_examen_campo_visual->obs_campo_visual_od = $request->obs_campo_visual_od;
                        $ficha_oftalmo_examen_campo_visual->campo_visual_oi = $request->campo_visual_oi;
                        $ficha_oftalmo_examen_campo_visual->obs_campo_visual_oi = $request->obs_campo_visual_oi;
                        $ficha_oftalmo_examen_campo_visual->otro = $request->otro;
                        $ficha_oftalmo_examen_campo_visual->otro1 = $request->otro1;
                        $ficha_oftalmo_examen_campo_visual->estado = 1;
                        if($ficha_oftalmo_examen_campo_visual->save())
                        {
                            $mensaje .= 'Examen Campo Visual registrado con Exito\n';
                        }
                        else
                        {
                            $mensaje .= 'Examen Campo Visual Falla en el registro\n';
                        }
                    }
                    else
                    {
                        // $mensaje .= 'no hace falta registrar';
                    }

                    /** REGISTRO DE CONTROL POST QUIRURGICO */
                    if( !empty($request->eg_cpq_cg) ||  !empty($request->hoc_cpa_cg) ||  !empty($request->masas_cpq_cg) ||  !empty($request->obs_egp_cpq_cg))
                    {
                        $control_post_q = new ControlPostQuirurgico();
                        $control_post_q->id_ficha_atencion = $ficha->id;
                        $control_post_q->id_profesional = $id_profesional;
                        $control_post_q->id_paciente = $id_paciente;
                        $control_post_q->eg_cpq_cg = $request->eg_cpq_cg;
                        $control_post_q->hoc_cpa_cg = $request->hoc_cpa_cg;
                        $control_post_q->masas_cpq_cg = $request->masas_cpq_cg;
                        $control_post_q->obs_egp_cpq_cg = $request->obs_egp_cpq_cg;
                        $control_post_q->estado = 1;

                        if($control_post_q->save())
                        {
                            $mensaje .='Control Post Quirurgico registrado con Exito\n';
                        }
                        else
                        {
                            $mensaje .='Control Post Quirurgico Falla en registro\n';
                        }
                    }
                    else
                    {
                        // $mensaje .='Registro de Control Post Quirurgico no requerido\n';
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
                    $mensaje .= 'Ficha Clínica Oftalmolagia con problema al registrar\n';
                }
            }

        }
        else
        {
            return back()->with('error', $mensaje)->withInput();
        }
    }

    /** REGISTRO FICHA ATENCION Y DERMATOLOGIA*/
    public function store_dermo(Request $request)
    {
        return $request;
        $campos_requeridos = 1;
        $mensaje = '';
        if(empty( trim($request->descripcion_hipotesis)))
        {
            $campos_requeridos = 0;
            $mensaje = 'El Diagnóstico es Requerido.\n';
        }

        /** validacion de veneria */
        if(
            !empty($request->select_1_ven_sint) ||  !empty($request->select_2_ven_ant_pat_ant) ||  !empty($request->ot_ant_ven_pat) ||  !empty($request->select_6_ven_gen) ||
            !empty($request->select_7_ven_ant_cond) || !empty($request->select_8_ven_prot) || !empty($request->select_9_ven_cont_sos) || !empty($request->select_3_ven_ant_pat_pater) ||
            !empty($request->select_4_ven_ant_pat_mater) || !empty($request->select_5_pat_ssfam) || !empty($request->ven_ex_fg) || !empty($request->ven_ex_pm) ||
            !empty($request->ven_obs_egp) || !empty($request->ven_gen_masc) || !empty($request->ven_gen_fem) || !empty($request->imagenes_ven_pre) ||
            !empty($request->imagenes_ven_post) || !empty($request->obs_fotos_ven) || !empty($request->tto_ven) || !empty($request->pr_ven) ||
            !empty($request->hosp_ven) || !empty($request->recom_tto_ven) || !empty($request->tipo_proc_ven) || !empty($request->plan_ven_proc) ||
            !empty($request->obs_plan_tratamiento) || !empty($request->diagnostico_ven) || !empty($request->descripcion_cie_ven) || !empty($request->indicaciones_ven)
        ){

            if(empty($request->select_1_ven_sint))
            {
                $campos_requeridos = 0;
                $mensaje .= 'Venereas - El Sintomatología actual es Requerido.\n';
            }

            if(empty($request->diagnostico_ven))
            {
                $campos_requeridos = 0;
                $mensaje .= 'Venereas - El Diagnóstico de Veneria es Requerido.\n';
            }
        }

        if($campos_requeridos == 0)
        {
            $mensaje .='Su Ficha Clínica NO ha sido Guardada aún. \n Si es solo Control, indicar Control de Patología.';
        }



        if($campos_requeridos)
        {
            /** FICHA ATENCION  */
            $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();

            $ficha = FichaAtencion::where('id', $hora_medica->id_ficha_atencion)->first();
            $id_profesional = $request->id_profesional_fc;
            $id_paciente = $request->id_paciente_fc;

            $ficha->motivo = $request->motivo;
            $ficha->antecedentes = $request->antecedentes;
            $ficha->examen_fisico = $request->examen_fisico;

            $ges = 0;
            // if ($request->modal_ges == 'on' || $request->modal_ges == '1') {
            if ($request->has('modal_ges')) {
                $ges = 1;
            }

            $cronico = 0;
            // if ($request->enf_cronico == 'on' || $request->enf_cronico == '1') {
            if ($request->has('enf_cronico')) {
                $cronico = 1;
            }

            $confidencial = 0;
            // if ($request->confidencial == 'on' || $request->confidencial == '1') {
            if ($request->has('confidencial')) {
                $confidencial = 1;
            }

            $ficha->hipotesis_diagnostico = $request->descripcion_hipotesis;
            $ficha->diagnostico_ce10 = $request->descripcion_cie;
            $ficha->indicaciones = $request->indicaciones;

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

                if(array_key_exists('',$array_imagenes))


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
                $ficha_dermo->mot_zona_bp = $request->mot_zona_bp;
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

                /** REGISTRO DE VENEREAS */
                if(
                    !empty($request->select_1_ven_sint) ||  !empty($request->select_2_ven_ant_pat_ant) ||  !empty($request->ot_ant_ven_pat) ||  !empty($request->select_6_ven_gen) ||
                    !empty($request->select_7_ven_ant_cond) || !empty($request->select_8_ven_prot) || !empty($request->select_9_ven_cont_sos) || !empty($request->select_3_ven_ant_pat_pater) ||
                    !empty($request->select_4_ven_ant_pat_mater) || !empty($request->select_5_pat_ssfam) || !empty($request->ven_ex_fg) || !empty($request->ven_ex_pm) ||
                    !empty($request->ven_obs_egp) || !empty($request->ven_gen_masc) || !empty($request->ven_gen_fem) || !empty($request->imagenes_ven_pre) ||
                    !empty($request->imagenes_ven_post) || !empty($request->obs_fotos_ven) || !empty($request->tto_ven) || !empty($request->pr_ven) ||
                    !empty($request->hosp_ven) || !empty($request->recom_tto_ven) || !empty($request->tipo_proc_ven) || !empty($request->plan_ven_proc) ||
                    !empty($request->obs_plan_tratamiento) || !empty($request->diagnostico_ven) || !empty($request->descripcion_cie_ven) || !empty($request->indicaciones_ven)
                ){
                    $ficha_venerea = new FichaVenereas ();
                    $ficha_venerea->id_ficha_atencion = $ficha->id;
                    $ficha_venerea->id_profesional= $id_profesional;
                    $ficha_venerea->id_paciente = $id_paciente;
                    $ficha_venerea->select_1_ven_sint = $request->select_1_ven_sint;
                    $ficha_venerea->select_2_ven_ant_pat_ant = $request->select_2_ven_ant_pat_ant;
                    $ficha_venerea->ot_ant_ven_pat = $request->ot_ant_ven_pat;
                    $ficha_venerea->select_6_ven_gen = $request->select_6_ven_gen;
                    $ficha_venerea->select_7_ven_ant_cond = $request->select_7_ven_ant_cond;
                    $ficha_venerea->select_8_ven_prot = $request->select_8_ven_prot;
                    $ficha_venerea->select_9_ven_cont_sos = $request->select_9_ven_cont_sos;
                    $ficha_venerea->select_3_ven_ant_pat_pater = $request->select_3_ven_ant_pat_pater;
                    $ficha_venerea->select_4_ven_ant_pat_mater = $request->select_4_ven_ant_pat_mater;
                    $ficha_venerea->select_5_pat_ssfam = $request->select_5_pat_ssfam;
                    $ficha_venerea->ven_ex_fg = $request->ven_ex_fg;
                    $ficha_venerea->ven_ex_pm = $request->ven_ex_pm;
                    $ficha_venerea->ven_obs_egp = $request->ven_obs_egp;
                    $ficha_venerea->ven_gen_masc = $request->ven_gen_masc;
                    $ficha_venerea->ven_gen_fem = $request->ven_gen_fem;

                    $ficha_venerea->imagenes_ven_pre = $request->imagenes_ven_pre;
                    $ficha_venerea->imagenes_ven_post = $request->imagenes_ven_post;
                    $ficha_venerea->obs_fotos_ven = $request->obs_fotos_ven;

                    if($request->tto_ven == 1)
                        $ficha_venerea->tto_ven = 1;
                    else
                        $ficha_venerea->tto_ven = 0;

                    $ficha_venerea->recom_tto_ven = $request->recom_tto_ven;


                    if($request->pr_ven == 1)
                        $ficha_venerea->pr_ven = 1;
                    else
                        $ficha_venerea->pr_ven = 0;

                    $ficha_venerea->tipo_proc_ven = $request->tipo_proc_ven;
                    $ficha_venerea->plan_ven_proc = $request->plan_ven_proc;


                    if($request->hosp_ven == 1)
                        $ficha_venerea->hosp_ven = 1;
                    else
                        $ficha_venerea->hosp_ven = 0;



                    $ficha_venerea->obs_plan_tratamiento = $request->obs_plan_tratamiento;
                    $ficha_venerea->diagnostico_ven = $request->diagnostico_ven;
                    $ficha_venerea->descripcion_cie_ven = $request->descripcion_cie_ven;
                    $ficha_venerea->indicaciones_ven = $request->indicaciones_ven;
                    $ficha_venerea->otro = $request->otro;
                    $ficha_venerea->otro1 = $request->otro1;
                    $ficha_venerea->estado= 1;

                    if($ficha_venerea->save())
                    {
                        $mensaje = 'Ficha Venéreas guardada de forma correcta\n';
                    }
                    else
                    {
                        $mensaje = 'Falla en el registro de Ficha Venéreas\n';
                    }
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

    /** REGISTRO FICHA ATENCION Y TRAUMATOLOGIA/ORTOPEDIA */
    public function store_tru_ort(Request $request)
    {
        $campos_requeridos = 1;
        $mensaje = '';
        if(empty( trim($request->descripcion_hipotesis)) )
        {
            $campos_requeridos = 0;
            $mensaje .= 'El Diagnóstico es Requerido.\n';
            $mensaje .='Su Ficha Clínica NO ha sido Guardada aún. \n Si es solo Control, indicar Control de Patología.';
        }

        if($campos_requeridos)
        {
            /** FICHA ATENCION  */
            $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();

            $ficha = FichaAtencion::where('id', $hora_medica->id_ficha_atencion)->first();
            $id_profesional = $request->id_profesional_fc;
            $id_paciente = $request->id_paciente_fc;

            $ficha->motivo = $request->motivo;
            $ficha->antecedentes = $request->antecedentes;
            $ficha->examen_fisico = $request->examen_fisico;

            $ges = 0;
            // if ($request->modal_ges == 'on' || $request->modal_ges == '1') {
            if ($request->has('modal_ges')) {
                $ges = 1;
            }

            $cronico = 0;
            // if ($request->enf_cronico == 'on' || $request->enf_cronico == '1') {
            if ($request->has('enf_cronico')) {
                $cronico = 1;
            }

            $confidencial = 0;
            // if ($request->confidencial == 'on' || $request->confidencial == '1') {
            if ($request->has('confidencial')) {
                $confidencial = 1;
            }

            //Signos vitales
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

            //presion Arterial
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

            //comunicacion y Traslado
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
			$ficha->indicaciones = $request->indicaciones;

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

				// /** registro de ficha Traumatologia  */
				$ficha_trauma_ad = new FichaTraumatologiaAdulto();
				$ficha_trauma_ad->id_ficha_atencion = $ficha->id;
				$ficha_trauma_ad->id_profesional= $id_profesional;
				$ficha_trauma_ad->id_paciente = $id_paciente;
				$ficha_trauma_ad->e_causa_traum = $request->e_causa_traum;
				$ficha_trauma_ad->obs_e_causa_traum = $request->obs_e_causa_traum;
				$ficha_trauma_ad->mc_ex_fisico_cons = $request->mc_ex_fisico_cons;
				$ficha_trauma_ad->obs_egp_tr = $request->obs_egp_tr;
				$ficha_trauma_ad->mc_masas_tu = $request->mc_masas_tu ;
				$ficha_trauma_ad->egp_trauma_mt = $request->egp_trauma_mt;

                if ($request->tto_trauma == '1') {
                    $ficha_trauma_ad->tto_trauma = 1;
                } else {
                    $ficha_trauma_ad->tto_trauma = 0;
                }
				$ficha_trauma_ad->rec_tto_trauma = $request->rec_tto_trauma;

                if ($request->pr_trauma == '1') {
                    $ficha_trauma_ad->pr_trauma = 1;
                } else {
                    $ficha_trauma_ad->pr_trauma = 0;
                }
				$ficha_trauma_ad->tipo_proc_trauma = $request->tipo_proc_trauma;
				$ficha_trauma_ad->plan_proc_trauma = $request->plan_proc_trauma;

                if ($request->tr_gen_cir == '1') {
                    $ficha_trauma_ad->tr_gen_cir = 1;
                } else {
                    $ficha_trauma_ad->tr_gen_cir = 0;
                }

                $ficha_trauma_ad->obs_gen_plan_tto= $request->obs_gen_plan_tto;
				$ficha_trauma_ad->otro=$request->otro;
				$ficha_trauma_ad->otro1=$request->otro1;
				$ficha_trauma_ad->estado= 1;
				if($ficha_trauma_ad->save())
				{
					$mensaje .= 'Ficha Clínica Traumatología guardada de forma correcta\n';
				}
				else
				{
					$mensaje .= 'Ficha Clínica Traumatología problema al registrar\n';
				}

                /** REGISTRO ORTOPEDIA */
                if(
                    !empty($request->orto_peso_ad) || !empty($request->orto_talla_ad) || !empty($request->orto_manip_ad) || !empty($request->orto_dolor_ad) ||
                    !empty($request->orto_marpos_ad) || !empty($request->orto_ea_mv_ad) || !empty($request->orto_ea_rlp_ad) || !empty($request->orto_ea_icls_ad) ||
                    !empty($request->orto_ea_ir_ad) || !empty($request->orto_ea_nb_ad) || !empty($request->obs_e_ext_sup) || !empty($request->orto_ep_bmm_ad) ||
                    !empty($request->orto_ep_hlart_ad) || !empty($request->orto_ep_dism_minf_ad) || !empty($request->orto_ep_si_ad) || !empty($request->orto_ep_tc_ad) ||
                    !empty($request->orto_ep_com_ad) || !empty($request->orto_ep_obgen_ad)
                ){

                    $ficha_orto_adult = new FichaOrtopediaAdulto();
                    $ficha_orto_adult->id_ficha_atencion = $ficha->id;
                    $ficha_orto_adult->id_profesional= $id_profesional;
                    $ficha_orto_adult->id_ficha_trauma= $ficha_trauma_ad->id;
                    $ficha_orto_adult->id_paciente = $id_paciente;
                    $ficha_orto_adult->orto_peso_ad = $request->orto_peso_ad;
                    $ficha_orto_adult->orto_talla_ad = $request->orto_talla_ad;
                    $ficha_orto_adult->orto_manip_ad = $request->orto_manip_ad;
                    $ficha_orto_adult->orto_dolor_ad = $request->orto_dolor_ad;
                    $ficha_orto_adult->orto_marpos_ad = $request->orto_marpos_ad;
                    $ficha_orto_adult->orto_ea_mv_ad = $request->orto_ea_mv_ad;
                    $ficha_orto_adult->orto_ea_rlp_ad = $request->orto_ea_rlp_ad;
                    $ficha_orto_adult->orto_ea_icls_ad = $request->orto_ea_icls_ad;
                    $ficha_orto_adult->orto_ea_ir_ad = $request->orto_ea_ir_ad;
                    $ficha_orto_adult->orto_ea_nb_ad = $request->orto_ea_nb_ad;
                    $ficha_orto_adult->obs_e_ext_sup = $request->obs_e_ext_sup;
                    $ficha_orto_adult->orto_ep_bmm_ad = $request->orto_ep_bmm_ad;
                    $ficha_orto_adult->orto_ep_hlart_ad = $request->orto_ep_hlart_ad;
                    $ficha_orto_adult->orto_ep_dism_minf_ad = $request->orto_ep_dism_minf_ad;
                    $ficha_orto_adult->orto_ep_si_ad = $request->orto_ep_si_ad;
                    $ficha_orto_adult->orto_ep_tc_ad = $request->orto_ep_tc_ad;
                    $ficha_orto_adult->orto_ep_com_ad = $request->orto_ep_com_ad;
                    $ficha_orto_adult->orto_ep_obgen_ad = $request->orto_ep_obgen_ad;
                    $ficha_orto_adult->otro = $request->otro;
                    $ficha_orto_adult->otro1 = $request->otro1;
                    $ficha_orto_adult->estado = 1;

                    if($ficha_orto_adult->save())
                    {
                        $mensaje .= 'Ficha Clínica Ortopedia guardada de forma correcta\n';
                    }
                    else
                    {
                        $mensaje .= 'Ficha Clínica Ortopedia problema al registrar\n';
                    }
                }

                /** REGISTRO DE CONTROL POST QUIRURGICO */
                if( !empty($request->eg_cpq_cg) ||  !empty($request->hoc_cpa_cg) ||  !empty($request->masas_cpq_cg) ||  !empty($request->obs_egp_cpq_cg))
                {
                    $control_post_q = new ControlPostQuirurgico();
                    $control_post_q->id_ficha_atencion = $ficha->id;
                    $control_post_q->id_profesional = $id_profesional;
                    $control_post_q->id_paciente = $id_paciente;
                    $control_post_q->eg_cpq_cg = $request->eg_cpq_cg;
                    $control_post_q->hoc_cpa_cg = $request->hoc_cpa_cg;
                    $control_post_q->masas_cpq_cg = $request->masas_cpq_cg;
                    $control_post_q->obs_egp_cpq_cg = $request->obs_egp_cpq_cg;
                    $control_post_q->estado = 1;

                    if($control_post_q->save())
                    {
                        $mensaje .='Control Post Quirurgico registrado\n';
                    }
                    else
                    {
                        $mensaje .='Problema en el registro de Control Post Quirurgico\n';
                    }
                }
                else
                {
                    $mensaje .='Registro de Control Post Quirurgico no requerido\n';
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
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_hora_medica))
        {
            $error['Hora Medica'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_ficha_atencion))
        {
            $error['Ficha Atencion'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_paciente))
        {
            $error['Paciente'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_profesional))
        {
            $error['Profesional'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_lugar_atencion))
        {
            $error['Lugar Atencion'] = 'campo requerido';
            $valido = 0;
        }
        if( empty($request->enfermedad_comun) && empty($request->laboral) )
        {
            $error['Enfermedad común o maternal'] = 'campo requerido';
            $error['Laboral'] = 'campo requerido';
            $valido = 0;
        }
        if( empty($request->paciente_prevision))
        {
            $error['Tabajador Prevision'] = 'campo requerido';
            $valido = 0;
        }
        if( empty($request->paciente_prevision_text))
        {
            $error['Tabajador Prevision'] = 'campo requerido';
            $valido = 0;
        }
        if( empty($request->rut_paciente))
        {
            $error['Trabajador Rut'] = 'campo requerido';
            $valido = 0;
        }
        if( empty($request->empleador_id))
        {
            $error['Empleador'] = 'campo requerido';
            $valido = 0;
        }
        if( empty($request->empleador_nombre))
        {
            $error['Empleador Nombre'] = 'campo requerido';
            $valido = 0;
        }
        if( empty($request->empleador_rut))
        {
            $error['Empleador rut'] = 'campo requerido';
            $valido = 0;
        }
        if( empty($request->empleador_direccion))
        {
            $error['Empleador Direccion'] = 'campo requerido';
            $valido = 0;
        }
        if( empty($request->empleador_email))
        {
            $error['Empleador email'] = 'campo requerido';
            $valido = 0;
        }
        if( empty($request->num_dias_reposo))
        {
            $error['N° Días'] = 'campo requerido';
            $valido = 0;
        }
        if( empty($request->fecha_inicio))
        {
            $error['Desde'] = 'campo requerido';
            $valido = 0;
        }
        if( empty($request->fecha_termino))
        {
            $error['Hasta'] = 'campo requerido';
            $valido = 0;
        }
        if( empty($request->tipo_reposo))
        {
            $error['Tipo de Reposo'] = 'campo requerido';
            $valido = 0;
        }
        if( empty($request->lugar_reposo))
        {
            $error['Lugar de Reposo'] = 'campo requerido';
            $valido = 0;
        }
        if( empty($request->tipo_licencia))
        {
            $error['Tipo de Licencia'] = 'campo requerido';
            $valido = 0;
        }
        if( empty($request->info_licencia_1) && empty($request->info_licencia_2) )
        {
            $error['Recuperabilidad laboral'] = 'campo requerido';
            $error['Inicio trámite de invalidez'] = 'campo requerido';
            $valido = 0;
        }
        if( empty($request->descripcion_hipotesis))
        {
            $error['Hipotesis Diagnostica'] = 'campo requerido';
            $valido = 0;
        }
        if( empty($request->descripcion_cie))
        {
            $error['Diagnostico CIE-10 DES'] = 'campo requerido';
            $valido = 0;
        }
        if( empty($request->id_descripcion_cie))
        {
            $error['Diagnostico CIE-10 ID'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            /** proceso de archivos */
            $registro_archivo = '';
            if(!empty($request->input_lista_archivo_lic))
            {
                $paciente = Paciente::find($request->id_paciente);
                $lista_archivo_array = json_decode($request->input_lista_archivo_lic);
                $registro_archivo = array();
                foreach ($lista_archivo_array as $key => $value)
                {
                    $ruta_temp = $value[0];
                    $nombre_real = $value[1];
                    $nombre_temp = $value[2];
                    $file_extension = $value[3];
                    $nombre_final = $paciente->rut.'_examen_apoyo_'.date('YmdHis').'_'.uniqid().'.'.$file_extension;

                    $resulto_archivo[$key] = CargaArchivoController::moverArchivo($nombre_temp, 'archivo_archivo', $nombre_final);
                    $url = $resulto_archivo[$key]['proceso']['url'];

                    $url_temp = Storage::disk('archivo_archivo')->url($nombre_final);
                    $archivo_correo[] = array('url' => $url_temp, 'nombre' => $nombre_final);

                    array_push($registro_archivo, array(
                        'nombre' => $nombre_final,
                        'url' => $url
                    ));
                }

                $registro_archivo = json_encode($registro_archivo);
            }
            $registro = new Licencia();
            $registro->id_hora_medica = $request->id_hora_medica;
            $registro->id_ficha_atencion = $request->id_ficha_atencion;
            $registro->id_paciente = $request->id_paciente;
            $registro->id_profesional = $request->id_profesional;
            $registro->id_lugar_atencion = $request->id_lugar_atencion;
            $registro->enfermedad_comun = $request->enfermedad_comun;
            $registro->laboral = $request->laboral;
            $registro->paciente_prevision = $request->paciente_prevision;
            $registro->paciente_prevision_text = $request->paciente_prevision_text;
            $registro->rut_paciente = $request->rut_paciente;
            $registro->empleador_id = $request->empleador_id;
            $registro->empleador_nombre = $request->empleador_nombre;
            $registro->empleador_rut = $request->empleador_rut;
            $registro->empleador_direccion = $request->empleador_direccion;
            $registro->empleador_email = $request->empleador_email;
            $registro->num_dias_reposo = $request->num_dias_reposo;
            $registro->fecha_inicio = date('Y-m-d', strtotime($request->fecha_inicio));
            $registro->fecha_termino = date('Y-m-d', strtotime($request->fecha_termino));
            $registro->tipo_reposo = $request->tipo_reposo;
            $registro->lugar_reposo = $request->lugar_reposo;
            $registro->tipo_licencia = $request->tipo_licencia;
            $registro->recuperabilidad_laboral = $request->info_licencia_1;
            $registro->tramite_invalidez = $request->info_licencia_2;
            $registro->descripcion_hipotesis = $request->descripcion_hipotesis;
            $registro->descripcion_cie = $request->descripcion_cie;
            $registro->id_descripcion_cie = $request->id_descripcion_cie;
            $registro->otros_ant_desc = $request->otros_ant_desc;
            $registro->examen_apoyo = $registro_archivo;

            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'exito';
                $datos['registro'] = $registro;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'falla';
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
    // public function crear_licencia(Request $request)
    // {
    //     /*  $request->validate([
    //            'nombre_trabajador' => ' required|max:32',
    //            'prevision'=> 'required',
    //            'rut_trabajador' => 'required|max:12',
    //            'nombre_empleador' => 'required|max:500',
    //            'rut_empleador' => 'required|max:12',
    //            'cantidad_dias' => 'required|number|max:365',
    //            'direccion' => 'required|max:250',
    //            'telefono' => ' required|max:11',
    //            'direccion_alternavitva' => ' required',
    //            'diagnostico_descripcion' => ' required',
    //            'diagnostico_descripcion_alternativo' => ' required',
    //            'otros_antecedentes' => ' required',
    //        ]);*/

    //     $licencia = new licencia();

    //     $laboral = 0;
    //     if ($request->laboral == 'on') {
    //         $laboral = 1;
    //     } else {
    //         $laboral = 0;
    //     }

    //     $enfermedad_comun_maternal = 0;
    //     if ($request->enfermedad_comun_maternal == 'on') {
    //         $enfermedad_comun_maternal = 1;
    //     } else {
    //         $enfermedad_comun_maternal = 0;
    //     }

    //     $recuperabilidad_laboral = 0;
    //     if ($request->recuperabilidad_laboral == 'on') {
    //         $recuperabilidad_laboral = 1;
    //     } else {
    //         $recuperabilidad_laboral = 0;
    //     }

    //     $tramite_invalidez = 0;
    //     if ($request->tramite_invalidez == 'on') {
    //         $tramite_invalidez = 1;
    //     } else {
    //         $tramite_invalidez = 0;
    //     }

    //     $licencia->enfermedad_comun_maternal = $enfermedad_comun_maternal;
    //     $licencia->laboral = $laboral;
    //     $licencia->nombre_empleador = $request->nombre_empleador;
    //     $licencia->rut_empleador = $request->rut_empleador;
    //     $licencia->reposo_inicio = $request->reposo_inicio;
    //     $licencia->reposo_fin = $request->reposo_fin;
    //     $licencia->tipo_reposo = $request->tipo_reposo;
    //     $licencia->lugar_reposo = $request->lugar_reposo;
    //     $licencia->direccion_reposo = $request->direccion_reposo;
    //     $licencia->region_reposo = $request->region_reposo;
    //     $licencia->tipo_licencia = $request->tipo_licencia;
    //     $licencia->recuperabilidad_laboral = $recuperabilidad_laboral;
    //     $licencia->tramite_invalidez = $tramite_invalidez;
    //     $licencia->diagnostico_c10 = $request->diagnostico_c10;
    //     $licencia->diagnostico = $request->diagnostico;
    //     $licencia->antecedentes = $request->antecedentes;
    //     //$licencia->telefono = $request->telefono;
    //     //$licencia->direccion_alternavitva = $request->direccion_alternavitva;
    //     //$licencia->diagnostico_alternativo = $request->diagnostico_alternativo;
    //     //$licencia->diagnostico_descripcion_alternativo = $request->diagnostico_descripcion_alternativo;

    //     /*
    //     $file=$request->file("examen_apoyo");

    //     $nombre = "pdf_examen_apoyo=".$licencia->rut_paciente.".".$file->guessExtension();

    //     $ruta = public_path("pdf/examenes_apoyo/".$nombre);*/
    //     //$licencia->examenes_apoyo = $request->examenes_apoyo;

    //     if (!$licencia->save()) {
    //         $mensajeLicencia = 'Error al crear la licencia';

    //         return back()->with('mensajeLicencia', $mensajeLicencia);
    //     } else {
    //         //copy($file, $ruta);

    //         $licenciaPPF = new LicenciaPPF();
    //         $licenciaPPF->id_paciente = $request->id_paciente_li;
    //         $licenciaPPF->id_profesional = $request->id_profesional_li;
    //         $licenciaPPF->id_licencia = $licencia->id;
    //         $licenciaPPF->id_ficha_atencion = $request->id_ficha_li;

    //         if (!$licenciaPPF->save()) {
    //             $mensajeLicencia = 'Error al crear la licencia';

    //             return back()->with('mensajeLicencia', $mensajeLicencia);
    //         }
    //         $mensajeLicencia = 'Se Registro la licencia de forma correcta';

    //         return back()->with('mensajeLicencia', $mensajeLicencia);

    //         //return $mensajeLicencia;
    //     }
    // }

    /**
     * creado 20220809
     * subir  manual
     * usado en vista de profesional/receta_online
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
        $tipo_control = 0;
        $datos = array();

        if(!empty($request->tipo_control))
            $tipo_control = 1;

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

        $qr_id = GeneradorQrController::generar(encrypt($ficha_atencion->id));

        /** cantidad de hojas (secciones) */
        $cantidad_recetas = 0;

        /** detalle de receta */
        $detalle_receta = (object)array();


        /** TIPO DE CONTROL */
        // 1	Receta retenida con control de Psicotrópicos
        // 2	Receta retenida con control de Estupefacientes
        // 3	Receta Cheque
        // 4	Receta retenida
        // 5	Receta retenida con control de Codeína
        // 6	Receta Simple
        // 7	Venta Directa
        $med = array(0,6,7);
        $med_ret = array(0,1,2,3,4,5);
        $control = array($med, $med_ret);
        /** MEDICAMENTOS */
        $detalleReceta = DetalleReceta::where('id_ficha', $request->id_ficha_atencion)->get();
        if($detalleReceta->count()>0)
        {
            foreach ($detalleReceta as $key_detalle_receta => $value_detalle_receta)
            {
                $array_medicamento = array();
                $producto = Articulo::where('nombre',$value_detalle_receta->producto)->first();

                if($producto)
                {
                    $nombre_control = $producto->RecetaControl()->first()->descripcion;
                    $id_control = $producto->RecetaControl()->first()->cod_control;
                    if( array_search( $id_control, $control[$tipo_control] ) != false )
                    {
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
                    }
                }
                else
                {
                    if(!empty($tipo_control))
                    {
                        $med_faltante = ArticuloFaltante::where('nombre', $value_detalle_receta->producto)->orderBy('id', 'DESC')->get()->first();

                        $droga = '';
                        if($med_faltante)
                        {
                            $droga = '('.$med_faltante->droga.')';
                        }
                        else
                        {
                            $droga = '(Droga no indicada)';
                        }
                        $array_medicamento = array(
                            'nombre_medicamento' => $value_detalle_receta->producto,
                            'droga'=>$droga,
                            'presentacion' => $value_detalle_receta->presentacion,
                            'posologia' => $value_detalle_receta->posologia,
                            'via_administracion' => $value_detalle_receta->via_administracion,
                            'periodo' => $value_detalle_receta->periodo,
                            'uso_cronico' => $value_detalle_receta->uso_cronico,
                            'cantidad_compra' => $value_detalle_receta->cantidad_compra,
                            'receta_token' => $value_detalle_receta->receta_token,
                        );

                        $nombre_control = 'Receta Simple';
                        $id_control = 6;
                    }
                }

                // 4 - Receta retenida
                // 6 - Receta Simple
                // 7 - Venta Directa

                // 1 - Receta retenida con control de Psicotrópicos
                // 2 - Receta retenida con control de Estupefacientes
                // 3 - Receta Cheque
                // 5 - Receta retenida con control de Codeína
                if(!empty($array_medicamento))
                {
                    // if(trim($nombre_control) == 'Receta retenida' || trim($nombre_control) == 'Receta Simple' || trim($nombre_control) == 'Venta Directa')
                    if(trim($nombre_control) == 'Receta Simple' || trim($nombre_control) == 'Venta Directa')
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
            }

            // return  PdfController::generarPDF('RECETA MEDICA', compact('array_ficha_atencion', 'array_lugar_atencion', 'array_profesional', 'array_paciente', 'detalle_receta','cantidad_recetas'), 'Receta Medica '.$paciente->rut, 'pdf_receta_medica');
        }

        if($tipo_control == 0)
        {
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
        }

        $array_ficha_atencion = array(
            'id' => $ficha_atencion->id,
            'created_at' => $ficha_atencion->created_at->format('d/m/Y'),
            'token' => $token_receta,
            'url' => $url_documento,
            'qr' => $qr_documento,
            'qr_id' => $qr_id,
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
         
            $lugar_atencion = LugarAtencion::with('direccion')->find($ficha_atencion->id_lugar_atencion);
            
            $profesional = Profesional::find($ficha_atencion->id_profesional);
       
            $paciente = Paciente::find($ficha_atencion->id_paciente);
        
            $token_firma = encrypt( $profesional->rut.'_'.$profesional->email.'_'.$lugar_atencion->id );
          
            $detalle_orden = (object)array();

            $token_receta = '';
            $temp_token = CertificadoController::certificadoDocumento($request->id_ficha_atencion, $profesional->id, $paciente->id, 3, $ficha_atencion->id);
      
            if($temp_token['estado'] == 1)
            {
                $token_receta = $temp_token['certificado'];
                $url_documento = CertificadoController::generarUrlDocumento($token_receta);
              
                $qr_documento = GeneradorQrController::generar($url_documento);
            }
            else
            {
                $temp_token = CertificadoController::certificadoDocumento($request->id_ficha_atencion, rand(111,999), $paciente->id, 3, $ficha_atencion->id);
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

                $temp_token = CertificadoController::certificadoProfesional($profesional->id, 1, 3,$ficha_atencion->id) ;
                if($temp_token['estado'] == 1)
                {
                    $token_profesional = $temp_token['certificado'];
                    $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
                    $qr_profesional = GeneradorQrController::generar($url_documento);
                }
                else
                {
                    $temp_token = CertificadoController::certificadoProfesional(rand(1114,999), rand(1114,999), 3,$ficha_atencion->id);
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
                'qr' => $qr_documento
            );

            $array_lugar_atencion = array(
                'id' => $lugar_atencion->id,
                'nombre' => $lugar_atencion->nombre,
                'direccion' => $lugar_atencion->direccion->direccion.' '.$lugar_atencion->direccion->numero_dir.', '.$lugar_atencion->direccion->Ciudad()->first()->nombre,
                'region' => $lugar_atencion->direccion->Ciudad()->first()->Region()->first()->nombre,
            );

            if ($profesional->subTipoEspecialidad()->first() == '' || $profesional->subTipoEspecialidad()->first() == null) {
                $subtipo_especialidad = $profesional->tipoEspecialidad()->first()->nombre;
            }else{
                $subtipo_especialidad = $profesional->subTipoEspecialidad()->first()->nombre;
            }

            $array_profesional = array(
                'id' => $profesional->id,
                'nombre' => $profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos,
                'rut' => $profesional->rut,
                'especialidad' => $subtipo_especialidad,
                'id_especialidad' => $profesional->id_especialidad,
                'num_colegio' => $profesional->num_colegio,
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

    public function pdf_orden_examenes_plan_tto(Request $req){
        $examen = ExamenPlanTratamiento::find($req->id);

        $ficha_atencion = FichaAtencion::find($examen->id_ficha_atencion);
        $lugar_atencion = LugarAtencion::find($ficha_atencion->id_lugar_atencion);
        $paciente = Paciente::find($ficha_atencion->id_paciente);
        $profesional = Profesional::find($ficha_atencion->id_profesional);

        $nombre_examen = $req->nombre;
        if($examen){
            $token_receta = '';
            $temp_token = CertificadoController::certificadoDocumento($ficha_atencion->id, $profesional->id, $paciente->id, 1);

            if($temp_token['estado'] == 1)
            {
                $token_receta = $temp_token['certificado'];
                $url_documento = CertificadoController::generarUrlDocumento($token_receta);
                $qr_documento = GeneradorQrController::generar($url_documento);
            }
            else
            {
                $temp_token = CertificadoController::certificadoDocumento($ficha_atencion->id, rand(111,999), $paciente->id, 1);
                $token_receta = $temp_token['certificado'];
                $url_documento = CertificadoController::generarUrlDocumento($token_receta);
                $qr_documento = GeneradorQrController::generar($url_documento);
            }
            $temp_token = CertificadoController::certificadoProfesional($profesional->id, 1, 1,$ficha_atencion->id) ;
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
             return  PdfController::generarPDF('Examen '.$nombre_examen, compact('array_ficha_atencion', 'array_lugar_atencion', 'array_profesional', 'array_paciente','nombre_examen','examen'), 'Solicitud examen '.$paciente->rut, 'pdf_solicitud_examen');
        }

        else
            return 'error';
    }


    public function pdf_certificado_reposo(Request $request)
    {
        $datos = array();
        if(!empty($request->id_ficha_atencion))
            $certificadoReposo = CertificadoReposo::where('id_ficha_atencion', $request->id_ficha_atencion)->first();
        else if(!empty($request->id_ficha_otros_prof))
            $certificadoReposo = CertificadoReposo::where('id_ficha_otro_prof', $request->id_ficha_otros_prof)->first();

        // echo json_encode($certificadoReposo);
        // die();

        if($certificadoReposo->count()>0)
        {

            if(!empty($request->id_ficha_atencion))
                $ficha_atencion = FichaAtencion::find($request->id_ficha_atencion);
            else if(!empty($request->id_ficha_otros_prof))
                $ficha_atencion = FichaOtrosProfesionales::find($request->id_ficha_otros_prof);

            // echo json_encode($ficha_atencion);
            // die();

            $lugar_atencion = LugarAtencion::find($ficha_atencion->id_lugar_atencion);
            $profesional = Profesional::find($ficha_atencion->id_profesional);
            $paciente = Paciente::find($ficha_atencion->id_paciente);

            /** token certificado */
            $temp_token = CertificadoController::certificadoDocumento($ficha_atencion->id, $profesional->id, $paciente->id, 7, $certificadoReposo->id);
            if($temp_token['estado'] == 1)
            {
                $token_receta = $temp_token['certificado'];
                $url_documento = CertificadoController::generarUrlDocumento($token_receta);
                $qr_documento = GeneradorQrController::generar($url_documento);
            }
            else
            {
                $temp_token = CertificadoController::certificadoDocumento($ficha_atencion->id, rand(111,999), $paciente->id, 7, $certificadoReposo->id);
                $token_receta = $temp_token['certificado'];
                $url_documento = CertificadoController::generarUrlDocumento($token_receta);
                $qr_documento = GeneradorQrController::generar($url_documento);
            }

            /** token profesional */
            $temp_token = CertificadoController::certificadoProfesional($profesional->id, $certificadoReposo->cod_auto,'7',$certificadoReposo->id);
            if($temp_token['estado'] == 1)
            {
                $token_profesional = $temp_token['certificado'];
                $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
                $qr_profesional = GeneradorQrController::generar($url_documento);
            }
            else
            {
                $temp_token = CertificadoController::certificadoProfesional(rand(1114,999), $certificadoReposo->cod_auto,'7',$certificadoReposo->id);
                $token_profesional = $temp_token['certificado'];
                $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
                $qr_profesional = GeneradorQrController::generar($url_documento);
            }

            /** token profesional */
            $temp_token = CertificadoController::certificadoProfesional($profesional->id, $certificadoReposo->cod_auto,'7',$certificadoReposo->id);
            if($temp_token['estado'] == 1)
            {
                $token_profesional = $temp_token['certificado'];
                $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
                $qr_profesional = GeneradorQrController::generar($url_documento);
            }
            else
            {
                $temp_token = CertificadoController::certificadoProfesional(rand(1114,999), $certificadoReposo->cod_auto,'7',$certificadoReposo->id);
                $token_profesional = $temp_token['certificado'];
                $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
                $qr_profesional = GeneradorQrController::generar($url_documento);
            }

            $detalle_certificado = array(
                'fecha_inicio' => $certificadoReposo->fecha_inicio,
                'fecha_termino' => $certificadoReposo->fecha_termino,
                'hipotesis' => $certificadoReposo->hipotesis,
                'comentarios' => $certificadoReposo->comentarios,
            );

            // $array_ficha_atencion = array(
            //     'id' => $ficha_atencion->id,
            //     'created_at' => $ficha_atencion->created_at->format('d/m/Y'),
            //     'token' => $token_receta,
            // );
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

            return  PdfController::generarPDF('CERTIFICADO REPOSO', compact('array_ficha_atencion', 'array_lugar_atencion', 'array_profesional', 'array_paciente', 'detalle_certificado'), 'Certificado Reposo '.$paciente->rut.' '.date('YmdHi'), 'pdf_certificado_reposo');
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'No se encontraron medicamentos';
			return $datos;
        }
    }

    public function pdf_informe_medico(Request $request)
    {
        $datos = array();
        $filtro = array();
        if(!empty($request->id_ficha_atencion))
            $filtro[] = array('id_ficha_atencion', $request->id_ficha_atencion);
        if(!empty($request->id_ficha_otro_prof))
            $filtro[] = array('id_ficha_otro_prof', $request->id_ficha_otro_prof);
        if(!empty($request->id_tipo_informe))
            $filtro[] = array('id_tipo_informe', $request->id_tipo_informe);
        else
            $filtro[] = array('id_tipo_informe', 1);

        // echo json_encode($filtro);
        // die();
        $informMedico = InformeMedico::where($filtro)->first();
        // echo json_encode($informMedico);
        // die();
        if($informMedico)
        {
            $tipo_informe = TipoInforme::find($informMedico->id_tipo_informe);

            $ficha_atencion = '';
            if(!empty($request->id_ficha_atencion))
                $ficha_atencion = FichaAtencion::find($request->id_ficha_atencion);
            else if(!empty($request->id_ficha_otro_prof))
                $ficha_atencion = FichaOtrosProfesionales::find($request->id_ficha_otro_prof);

            $lugar_atencion = LugarAtencion::find($informMedico->id_lugar_atencion);
            $profesional = Profesional::find($ficha_atencion->id_profesional);
            $paciente = Paciente::find($ficha_atencion->id_paciente);

            /** token documento */
            $temp_token = CertificadoController::certificadoDocumento($ficha_atencion->id, $profesional->id, $paciente->id, 10, $informMedico->id);
            if($temp_token['estado'] == 1)
            {
                $token_receta = $temp_token['certificado'];
                $url_documento = CertificadoController::generarUrlDocumento($token_receta);
                $qr_documento = GeneradorQrController::generar($url_documento);
            }
            else
            {
                $temp_token = CertificadoController::certificadoDocumento($ficha_atencion->id, rand(111,999), $paciente->id, 10, $informMedico->id);
                $token_receta = $temp_token['certificado'];
                $url_documento = CertificadoController::generarUrlDocumento($token_receta);
                $qr_documento = GeneradorQrController::generar($url_documento);
            }

            /** token profesional */
            $temp_token = CertificadoController::certificadoProfesional($profesional->id, $informMedico->cod_auto, 10, $informMedico->id);
            if($temp_token['estado'] == 1)
            {
                $token_profesional = $temp_token['certificado'];
                $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
                $qr_profesional = GeneradorQrController::generar($url_documento);
            }
            else
            {
                $temp_token = CertificadoController::certificadoProfesional(rand(1114,999), $informMedico->cod_auto, 10, $informMedico->id);
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

            // $token_firma = encrypt( $profesional->rut.'_'.$profesional->email.'_'.$lugar_atencion->id );

            $token_receta = '';
            /** token receta */
            $temp_token = CertificadoController::certificadoDocumento($request->id_ficha_atencion, $profesional->id, $paciente->id, 25, $usoPersonal->id);
            if($temp_token['estado'] == 1)
            {
                $token_receta = $temp_token['certificado'];
                $url_documento = CertificadoController::generarUrlDocumento($token_receta);
                $qr_documento = GeneradorQrController::generar($url_documento);
            }
            else
            {
                $temp_token = CertificadoController::certificadoDocumento($request->id_ficha_atencion, rand(111,999), $paciente->id, 25, $usoPersonal->id);
                $token_receta = $temp_token['certificado'];
                $url_documento = CertificadoController::generarUrlDocumento($token_receta);
                $qr_documento = GeneradorQrController::generar($url_documento);
            }

            /** token profesional */
            $temp_token = CertificadoController::certificadoProfesional($profesional->id, $usoPersonal->cod_auto, 25, $usoPersonal->id);
            if($temp_token['estado'] == 1)
            {
                $token_profesional = $temp_token['certificado'];
                $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
                $qr_profesional = GeneradorQrController::generar($url_documento);
            }
            else
            {
                $temp_token = CertificadoController::certificadoProfesional(rand(1114,999), $usoPersonal->cod_auto, 25, $usoPersonal->id);
                $token_profesional = $temp_token['certificado'];
                $url_profesional = CertificadoController::generarUrlProfesional($token_profesional);
                $qr_profesional = GeneradorQrController::generar($url_documento);
            }

            $detalle_uso_personal = array(
                'dirigido' => $usoPersonal->dirigido,
                'cargo' => $usoPersonal->cargo,
                'mensaje' => $usoPersonal->mensaje,
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

            $nombre_archivo = strtolower('dirigido_a_'.$usoPersonal->dirigido);
            $bad = array(" ", "ñ", "á", "é", "í", "ó","ú" );
            $god   = array("_", "n", "a", "e", "i", "o","u" );
            $nombre_archivo = str_replace($bad, $god, $nombre_archivo);
            // $nombre_archivo = str_replace($god, $bad, $nombre_archivo);

            return  PdfController::generarPDF('USO PERSONAL', compact('array_ficha_atencion', 'array_lugar_atencion', 'array_profesional', 'array_paciente', 'detalle_uso_personal'), $nombre_archivo, 'pdf_uso_personal');
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

    public function getTrabajosDentales(Request $request){

        $id_ficha_atencion = $request->id_ficha_atencion_soli;
        $ficha = FichaAtencion::where('id',$id_ficha_atencion)->first();
        $paciente = Paciente::find($ficha->id_paciente);
        $profesional = Profesional::find($ficha->id_profesional);
        $maxilar_superior_gral_tratamiento = $this->dameMaxilarSuperiorGeneralTratamiento($paciente->id, $profesional->id_tipo_especialidad);
        $maxilar_superior_gral_diagnostico = $this->dameMaxilarSuperiorGeneralDiagnostico($paciente->id, $profesional->id_tipo_especialidad);
        $maxilar_inferior_gral_tratamiento = $this->dameMaxilarInferiorGeneralTratamiento($paciente->id, $profesional->id_tipo_especialidad);
        $maxilar_inferior_gral_diagnostico = $this->dameMaxilarInferiorGeneralDiagnostico($paciente->id, $profesional->id_tipo_especialidad);
        $boca_completa_gral_tratamiento = $this->dameBocaCompletaGeneralTratamiento($paciente->id, $profesional->id_tipo_especialidad);
        $boca_completa_gral_diagnostico = $this->dameBocaCompletaGeneralDiagnostico($paciente->id, $profesional->id_tipo_especialidad);
        $maxilar_inferior_gral_tratamientos_endo = $this->dameMaxilarInferiorGeneralTratamientoEndodoncia($paciente->id, $profesional->id_tipo_especialidad);
        $maxilar_inferior_gral_diagnosticos_endo = $this->dameMaxilarInferiorGeneralDiagnosticoEndodoncia($paciente->id, $profesional->id_tipo_especialidad);
        $maxilar_superior_gral_tratamientos_endo = $this->dameMaxilarSuperiorGeneralTratamientoEndodoncia($paciente->id, $profesional->id_tipo_especialidad);
        $maxilar_superior_gral_diagnosticos_endo = $this->dameMaxilarSuperiorGeneralDiagnosticoEndodoncia($paciente->id, $profesional->id_tipo_especialidad);
        $boca_completa_gral_tratamiento_endo = $this->dameCompletaEndoTratamiento($paciente->id, $profesional->id_tipo_especialidad);
        $boca_completa_gral_diagnostico_endo = $this->dameCompletaEndoDiagnostico($paciente->id, $profesional->id_tipo_especialidad);
        $odontograma = $this->dameOdontogramaPaciente($paciente->id, $id_ficha_atencion, $ficha->id_lugar_atencion, $profesional->id_tipo_especialidad);
        $valores_odontograma = $this->dameValores($paciente->id, $ficha->id, $ficha->id_lugar_atencion, $profesional->id_tipo_especialidad);
        return [
            'maxilar_superior_gral_tratamiento' => $maxilar_superior_gral_tratamiento,
            'maxilar_superior_gral_diagnostico' => $maxilar_superior_gral_diagnostico,
            'maxilar_inferior_gral_tratamiento' => $maxilar_inferior_gral_tratamiento,
            'maxilar_inferior_gral_diagnostico' => $maxilar_inferior_gral_diagnostico,
            'boca_completa_gral_tratamiento' => $boca_completa_gral_tratamiento,
            'boca_completa_gral_diagnostico' => $boca_completa_gral_diagnostico,
            'maxilar_inferior_gral_tratamientos_endo' => $maxilar_inferior_gral_tratamientos_endo,
            'maxilar_inferior_gral_diagnosticos_endo' => $maxilar_inferior_gral_diagnosticos_endo,
            'maxilar_superior_gral_tratamientos_endo' => $maxilar_superior_gral_tratamientos_endo,
            'maxilar_superior_gral_diagnosticos_endo' => $maxilar_superior_gral_diagnosticos_endo,
            'boca_completa_gral_tratamiento_endo' => $boca_completa_gral_tratamiento_endo,
            'boca_completa_gral_diagnostico_endo' => $boca_completa_gral_diagnostico_endo,
            'odontograma' => $odontograma,
            'valores_odontograma' => $valores_odontograma,
            'paciente' => $paciente,
            'profesional' => $profesional,
            'estado' => 1
        ];
    }

    public function getEvolucionesDentales(Request $request){
        $id_ficha_atencion = $request->id_ficha_atencion_soli;
        $ficha = FichaAtencion::where('id',$id_ficha_atencion)->first();
        $paciente = Paciente::find($ficha->id_paciente);
        $profesional = Profesional::find($ficha->id_profesional);
        $odontograma = $this->dameOdontogramaPaciente($paciente->id, $id_ficha_atencion, $ficha->id_lugar_atencion, $profesional->id_tipo_especialidad);
        $valores_odontograma = $this->dameValores($paciente->id, $ficha->id, $ficha->id_lugar_atencion, $profesional->id_tipo_especialidad);
        return [
            'odontograma' => $odontograma,
            'valores_odontograma' => $valores_odontograma,
            'paciente' => $paciente,
            'profesional' => $profesional,
            'estado' => 1
        ];
    }

    public function getFichaAtencion(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;
        $html_base = '';

        if(empty($request->id_ficha_atencion))
        {
            $error['id_ficha_atencion'] = 'campo requerido';
            $valido = 0;
        }

        if($valido == 1)
        {
            $registro = FichaAtencion::find($request->id_ficha_atencion);
            $paciente = Paciente::find($registro->id_paciente);

            if($registro)
            {
                /** POST QUIRURGICO */
                $registro_post = ControlPostQuirurgico::where('id_ficha_atencion', $request->id_ficha_atencion)->get();
                $registro->post_quirurgico = $registro_post;

                /** CANT RECOMENDACION */
                $cant_recetas = Recomendacion::where('atencion', $request->id_ficha_atencion)->count();

                /** CANT EXAMENES */
                $cant_examen_ppf = ExamenPPF::where('id_ficha_atencion', $request->id_ficha_atencion)->count();

                /** PROFESIONAL */
                $profesional = Profesional::select('id', 'nombre', 'apellido_uno', 'apellido_dos', 'rut', 'email', 'id_especialidad', 'id_tipo_especialidad', 'id_sub_tipo_especialidad')
                ->with(['Especialidad' => function ($query){
                    $query->select('id', 'nombre');
                }])
                ->with(['TipoEspecialidad' => function ($query){
                    $query->select('id', 'nombre');
                }])
                ->with(['SubTipoEspecialidad' => function ($query){
                    $query->select('id', 'nombre');
                }])
                ->find($registro->id_profesional);

                $registro->fichas = array();

                switch (intval($profesional->id_especialidad))
                {
                    case 1: //MÉDICOS
                        if(!empty($profesional->id_tipo_especialidad))
                        {
                            switch (intval($profesional->id_tipo_especialidad)) {
                                case 1: //CIRUGIA
                                    if(!empty($profesional->id_sub_tipo_especialidad))
                                    {
                                        $temp_cirugia_general = FichaCirugiaGeneralAdulto::where('id_ficha_atencion', $request->id_ficha_atencion)->first();
                                        if($temp_cirugia_general)
                                        {
											$registro->fichas = array('cirugia_general'=>$temp_cirugia_general);
                                            // $registro['fichas']['cirugia_general'] = $temp_cirugia_general;
                                        }
                                        switch (intval($profesional->id_sub_tipo_especialidad)) {
                                            case 1: // 1 Cirugía Abdominal General
                                                break;
                                            case 2: // 2 Cirugía Bariátrica
                                                break;
                                            case 3: // 3 Cirugia Broncopulmonar
                                                break;
                                            case 4: // 4 Cirugía Cardiovascular
                                                break;
                                            case 5: // 5 Cirugía Cardiovascular Adultos
                                                break;
                                            case 6: // 6 Cirugía Cardiovascular Niños
                                                break;
                                            case 7: // 7 Cirugía Coloproctológica
                                                $temp_ficha = FichaCirugiaDigestivaGeneralAdulto::where('id_ficha_atencion', $request->id_ficha_atencion)->first();
                                                $registro->fichas = array('digestiva_general'=>$temp_ficha);
                                                break;
                                            case 8: // 8 Cirugía de Cabeza y Cuello
                                                break;
                                            case 9: // 9 Cirugía de la mama
                                                break;
                                            case 10: // 10 Cirugía del Tórax
                                                break;
                                            case 11: // 11 Cirugía digestiva
                                                $temp_ficha = FichaCirugiaDigestivaGeneralAdulto::where('id_ficha_atencion', $request->id_ficha_atencion)->first();
                                                $registro->fichas = array('digestiva_general'=>$temp_ficha);
                                                break;
                                            case 12: // 12 Cirugía Gástrica
                                                $temp_ficha = FichaCirugiaDigestivaGeneralAdulto::where('id_ficha_atencion', $request->id_ficha_atencion)->first();
                                                $registro->fichas = array('digestiva_general'=>$temp_ficha);
                                                break;
                                            case 13: // 13 Cirugía maxilofacial
                                                break;
                                            case 14: // 14 Cirugía Nefrourológica
                                                break;
                                            case 15: // 15 Cirugía Oncológica
                                                break;
                                            case 16: // 16 Cirugía Pancreas
                                                break;
                                            case 17: // 17 Cirugía Plástica y Reparadora
                                                break;
                                            case 18: // 18 Cirugía Vascular Periférica
                                                break;
                                            case 119: // 119 Cirugía General
                                                /** NO REQUIERE CONSULTA ADICIONAL */
                                                break;
                                            case 120: // 120 Cirugía y Traumatologia Pediatrica General
                                                break;

                                        }
                                    }
                                    break;

                                case 2: //ESPECIALIDADES MÉDICAS
                                    if(!empty($profesional->id_sub_tipo_especialidad))
                                    {
                                        switch (intval($profesional->id_sub_tipo_especialidad)) {
                                            case 19:// 19	Dermatología
                                                $temp_ficha = FichaDermo::where('id_ficha_atencion', $request->id_ficha_atencion)->first();
                                                if($temp_ficha)
                                                {
                                                    $filtro_img = array();
                                                    $filtro_img[] = array('id_ficha_atencion', $request->id_ficha_atencion);
                                                    $filtro_img[] = array('id_ficha_dermo',$temp_ficha->id);
                                                    $imagenes = FichaDermoImg::where($filtro_img)->get();

                                                    $temp_ficha['img'] = $imagenes;
                                                    $registro->fichas = array('dermato'=>$temp_ficha);
                                                    // $registro['fichas']['dermato'] = $temp_ficha;
                                                }
                                                break;
                                            case 20:// 20	Oftalmología
                                                $html_base_temp = SubTipoEspecialidad::select('html_ver')->find(20);
                                                $html_base = $html_base_temp->html_ver;
                                                $temp_ficha_1 = FichaOftalmologiaAdulto::where('id_ficha_atencion', $request->id_ficha_atencion)->first();
                                                $temp_ficha_2 = FichaOftBiomicroscopia::where('id_ficha_atencion', $request->id_ficha_atencion)->first();
                                                $temp_ficha_3 = FichaOftFondoOjo::where('id_ficha_atencion', $request->id_ficha_atencion)->first();
                                                $temp_ficha_4 = OftalmoExamenAgudezaVisual::where('id_ficha_atencion', $request->id_ficha_atencion)->first();// oftalmo_examen_agudeza_visual
                                                $temp_ficha_5 = OftalmoExamenNeurologico::where('id_ficha_atencion', $request->id_ficha_atencion)->first();// oftalmo_examen_neurologico
                                                $temp_ficha_6 = OftalmoExamenPresionOcular::where('id_ficha_atencion', $request->id_ficha_atencion)->first();// oftalmo_examen_presion_ocular
                                                $temp_ficha_7 = OftalmoExamenVisionColores::where('id_ficha_atencion', $request->id_ficha_atencion)->first();// oftalmo_examen_vision_colores
                                                $temp_ficha_8 = OftalmoExamenEstrabismo::where('id_ficha_atencion', $request->id_ficha_atencion)->first();// oftalmo_examen_estrabismo
                                                $temp_ficha_9 = OftalmoExamenMovOculares::where('id_ficha_atencion', $request->id_ficha_atencion)->first();// oftalmo_examen_mov_oculares
                                                $temp_ficha_10 = OftalmoExamenCampoVisual::where('id_ficha_atencion', $request->id_ficha_atencion)->first();// oftalmo_examen_campo_visual
                                                $array_temp = array();
                                                if($temp_ficha_1)
                                                {
                                                    $array_temp['oft'] = $temp_ficha_1;
                                                    // $registro->fichas = array('oft'=>$temp_ficha_1);
                                                    // $registro['fichas']['oft'] = $temp_ficha_1;
                                                }
                                                if($temp_ficha_2)
                                                {
                                                    $array_temp['biomicroscopia'] = $temp_ficha_2;
                                                    // $registro->fichas = array('biomicroscopia'=>$temp_ficha_2);
                                                    // $registro['fichas']['oft']['biomicroscopia'] = $temp_ficha_2;
                                                }
                                                if($temp_ficha_3)
                                                {
                                                    $array_temp['fondo'] = $temp_ficha_3;
                                                    // $registro->fichas = array('fondo'=>$temp_ficha_3);
                                                    // $registro['fichas']['oft']['fondo'] = $temp_ficha_3;
                                                }
                                                if($temp_ficha_4)
                                                {
                                                    $array_temp['agudeza_visual'] = $temp_ficha_4;
                                                    // $registro->fichas = array('agudeza_visual'=>$temp_ficha_4);
                                                }
                                                if($temp_ficha_5)
                                                {
                                                    $array_temp['neurologico'] = $temp_ficha_5;
                                                    // $registro->fichas = array('neurologico'=>$temp_ficha_5);
                                                }
                                                if($temp_ficha_6)
                                                {
                                                    $array_temp['presion_ocular'] = $temp_ficha_6;
                                                    // $registro->fichas = array('presion_ocular'=>$temp_ficha_6);
                                                }
                                                if($temp_ficha_7)
                                                {
                                                    $array_temp['vision_colores'] = $temp_ficha_7;
                                                    // $registro->fichas = array('vision_colores'=>$temp_ficha_7);
                                                }
                                                if($temp_ficha_8)
                                                {
                                                    $array_temp['estrabismo'] = $temp_ficha_8;
                                                    // $registro->fichas = array('estrabismo'=>$temp_ficha_8);
                                                }
                                                if($temp_ficha_9)
                                                {
                                                    $array_temp['mov_oculares'] = $temp_ficha_9;
                                                    // $registro->fichas = array('mov_oculares'=>$temp_ficha_9);
                                                }
                                                if($temp_ficha_10)
                                                {
                                                    $array_temp['campo_visual'] = $temp_ficha_10;
                                                    // $registro->fichas = array('campo_visual'=>$temp_ficha_10);
                                                }
                                                $registro->fichas = $array_temp;
                                                break;
                                            case 21:// 21	Otorrinolaringología
                                                // $temp_ficha = FichaOtorrino::where('id_fichas_atenciones', $request->id_ficha_atencion)->first();
                                                $temp_ficha = FichaOrl::where('id_fichas_atenciones', $request->id_ficha_atencion)->first();
                                                if($temp_ficha)
                                                {
                                                    $temp_exam = ExamenEspecialidad::where('id_ficha_atencion', $request->id_ficha_atencion)->get();
                                                    if($temp_exam)
                                                    {
                                                        $temp_ficha['examen_especial'] = $temp_exam;
                                                    }
                                                    $registro->fichas = array('orl'=>$temp_ficha);
                                                }
                                                break;
                                            case 22:// 22	Urología
                                                $temp_ficha = FichaUro::where('id_ficha_atencion', $request->id_ficha_atencion)->first();
                                                if($temp_ficha)
                                                {
                                                    $registro->fichas = array('uro'=>$temp_ficha);
                                                }
                                                break;
                                        }
                                    }
                                    break;

                                case 3: //GINECO-OBSTETRÍCIA
                                    if(!empty($profesional->id_sub_tipo_especialidad))
                                    {
                                        switch (intval($profesional->id_sub_tipo_especialidad)) {
                                            case 23:// 23	Ginecología endocrinológica
                                                break;
                                            case 24:// 24	Ginecología  Infantil
                                                break;
                                            case 25:// 25	Ginecología Infertilidad
                                                break;
                                            case 26:// 26	Ginecología Oncológica
                                                break;
                                            case 27:// 27	Ginecologia y Obtetricia General
                                                break;
                                            case 28:// 28	Medicina Materno Fetal
                                                break;

                                        }
                                    }
                                    break;
                                case 4: //MEDICINA DE ALTURA
                                    if(!empty($profesional->id_sub_tipo_especialidad))
                                    {
                                        switch (intval($profesional->id_sub_tipo_especialidad)) {
                                            case 29:// 29	Medicina de Altura
                                                break;
                                        }
                                    }
                                    break;
                                case 5: //MEDICINA DEL TRABAJO
                                    if(!empty($profesional->id_sub_tipo_especialidad))
                                    {
                                        switch (intval($profesional->id_sub_tipo_especialidad)) {
                                            case 30:// 30	Medicina del Trabajo
                                                break;
                                        }
                                    }
                                    break;
                                case 6: //MEDICINA DEPORTIVA
                                    if(!empty($profesional->id_sub_tipo_especialidad))
                                    {
                                        switch (intval($profesional->id_sub_tipo_especialidad)) {
                                            case 31:// 31	Medicina deportiva General
                                                break;
                                            case 32:// 32	Medicina deportiva Alto Rendimiento
                                                break;
                                        }
                                    }
                                    break;
                                case 7: //MEDICINA FISICA Y REHABILITACIÓN
                                    if(!empty($profesional->id_sub_tipo_especialidad))
                                    {
                                        switch (intval($profesional->id_sub_tipo_especialidad)) {
                                            case 33:// 33	Mdicina física y Rehabilitación General
                                                break;
                                            case 34:// 34	Mdicina física y Rehabilitación Neurológica
                                                break;
                                            case 35:// 35	Mdicina física y Rehabilitación Respiratoria
                                                break;
                                        }
                                    }
                                    break;
                                case 8: //MEDICINA GENERAL
                                    if(!empty($profesional->id_sub_tipo_especialidad))
                                    {
                                        switch (intval($profesional->id_sub_tipo_especialidad)) {
                                            case 36:// 36	Medicina Familiar
                                                break;
                                            case 37:// 37	Medicina general adultos y niños
                                                break;
                                            case 38:// 38	Medicina general a Domicilio
                                                break;
                                        }
                                    }
                                    break;
                                case 9: //MEDICINA INTERNA
                                    if(!empty($profesional->id_sub_tipo_especialidad))
                                    {
                                        switch (intval($profesional->id_sub_tipo_especialidad)) {
                                            case 39:// 39	Alimentación y Nutrición
                                                break;
                                            case 40:// 40	Broncopulmonar
                                                break;
                                            case 41:// 41	Diabetología
                                                break;
                                            case 42:// 42	Endocrinología
                                                break;
                                            case 43:// 43	Endoscopía Digestiva
                                                break;
                                            case 44:// 44	Gastroenterología
                                                break;
                                            case 45:// 45	Geriatría
                                                break;
                                            case 46:// 46	Hematología
                                                break;
                                            case 47:// 47	Hepatología
                                                break;
                                            case 48:// 48	Infectología
                                                break;
                                            case 49:// 49	Inmunología y Alérgias
                                                break;
                                            case 50:// 50	Medicina Nuclear
                                                break;
                                            case 51:// 51	Nefrología
                                                break;
                                            case 52:// 52	Nefrourología
                                                break;
                                            case 53:// 53	Oncología
                                                break;
                                            case 54:// 54	Parasitología
                                                break;
                                            case 55:// 55	Quimioterapia
                                                break;
                                            case 56:// 56	Radioterapia
                                                break;
                                            case 57:// 57	Reumatología
                                                break;
                                        }
                                    }
                                    break;
                                case 10: //NEUROLOGÍA Y NEUROCIRUGÍA
                                    if(!empty($profesional->id_sub_tipo_especialidad))
                                    {
                                        switch (intval($profesional->id_sub_tipo_especialidad)) {
                                            case 58:// 58	Neurología
                                                break;
                                            case 59:// 59	Neurocirugía
                                                break;
                                            case 60:// 60	Neuropsiquiatría
                                                break;
                                            case 61:// 61	Neuroradiología
                                                break;
                                        }
                                    }
                                    break;
                                case 11: //PEDIATRÍA
                                    if(!empty($profesional->id_sub_tipo_especialidad))
                                    {
                                        switch (intval($profesional->id_sub_tipo_especialidad)) {
                                            case 62:// 62	Alergología Pediátrica
                                                break;
                                            case 63:// 63	Alimentación y Nutrición  Infantil
                                                break;
                                            case 64:// 64	Broncopulmonar Infantil
                                                break;
                                            case 65:// 65	Cardiología Pediátrica
                                                break;
                                            case 66:// 66	Cirugía y Traumatología Pediatrica
                                                break;
                                            case 67:// 67	Dermatología Pediátrica
                                                break;
                                            case 68:// 68	Endocrinología Pediátrica
                                                break;
                                            case 69:// 69	Gastroenterología  Pediátrica
                                                break;
                                            case 70:// 70	Ginecología  Infantil
                                                break;
                                            case 71:// 71	Nefrología Pediátrica
                                                break;
                                            case 72:// 72	Neonatología
                                                break;
                                            case 73:// 73	Neurología Infantil
                                                break;
                                            case 74:// 74	Neurosiquiatría Infantil
                                                break;
                                            case 75:// 75	Oftalmología Pediátrica
                                                break;
                                            case 76:// 76	Oncología y Radioterapia  Infantil
                                                break;
                                            case 77:// 77	Otorrinolaringología Pediátrica
                                                break;
                                            case 78:// 78	Pediatría General
                                                break;
                                            case 79:// 79	Urología Pediátrica
                                                break;
                                        }
                                    }
                                    break;
                                case 12: //SIQUIATRÍA
                                    if(!empty($profesional->id_sub_tipo_especialidad))
                                    {
                                        switch (intval($profesional->id_sub_tipo_especialidad)) {
                                            case 80:// 80	Psiquiatría General
                                                break;
                                            case 81:// 81	Adicciones
                                                break;
                                        }
                                    }
                                    break;
                                case 13: //TRAUMATOLOGIA Y ORTOPEDIA
                                    if(!empty($profesional->id_sub_tipo_especialidad))
                                    {
                                        $temp_trumatologia = FichaTraumatologiaAdulto::where('id_ficha_atencion', $request->id_ficha_atencion)->first();
                                        if($temp_trumatologia)
                                        {
											$registro->fichas = array('traumatologia_adulto'=>$temp_trumatologia);
                                            // $registro['fichas']['traulatologia_adulto'] = $temp_trumatologia;
                                        }

                                        switch (intval($profesional->id_sub_tipo_especialidad)) {
                                            case 82:// 82	Traumatología Cadera
                                                break;
                                            case 83:// 83	Traumatología Codo
                                                break;
                                            case 84:// 84	Traumatología Columna
                                                break;
                                            case 85:// 85	Traumatología General
                                                $temp_ficha = FichaOrtopediaAdulto::where('id_ficha_atencion', $request->id_ficha_atencion)->first();
                                                $registro->fichas = array('traumatologia_ortopedia'=>$temp_ficha);
                                                break;
                                            case 86:// 86	Traumatología Hombro
                                                break;
                                            case 87:// 87	Traumatología Rodilla
                                                break;
                                        }
                                    }
                                    break;
                            }
                        }
                        break;
                    case 2: //ODONTÓLOGOS
                        if(!empty($profesional->id_tipo_especialidad))
                        {
                            switch (intval($profesional->id_tipo_especialidad))
                            {
                                case 14:// 14	CIRUGÍA MAXILOFACIAL
                                    break;
                                case 15:// 15	ENDODÓNCIA
                                    break;
                                case 16:// 16	IMPLANTOLOGÍA
                                    break;
                                case 17:// 17	ODONTOLOGÍA ESTETICA
                                    break;
                                case 18:// 18	ODONTOLOGÍA GENERAL
                                    break;
                                case 19:// 19	ODONTOPEDIATRÍA
                                    break;
                                case 20:// 20	ORTODÓNCIA
                                    break;
                                case 21:// 21	PERIODÓNCIA
                                    break;
                                case 22:// 22	REHABILITACIÓN ORAL
                                    break;
                                case 23:// 23	RADIOLOGÍA DENTAL
                                    break;
                                case 24:// 24	REHABILITACIÓN ORAL
                                    break;
                                case 56:// 56	ESPECIALISTA EN TRANSTORNOS TEMPOROMANDIBULARES
                                    break;
                            }
                        }


                        break;
                    case 3: //KINESIOLOGIA
                        if(!empty($profesional->id_tipo_especialidad))
                        {
                            switch (intval($profesional->id_tipo_especialidad))
                            {
                                case 25:// 25  KINESIOLOGIA GENERAL
                                    if(!empty($profesional->id_sub_tipo_especialidad))
                                    {
                                        switch (intval($profesional->id_sub_tipo_especialidad))
                                        {
                                            case 88: // 88	Kinesiología Respiratoria
                                                break;
                                            case 89: // 89	Kinesiología Traumatológica
                                                break;
                                            case 90: // 90	Kinesiología Neurológica
                                                break;
                                            case 91: // 91	Kinesiología Tercera Edad
                                                break;
                                            case 92: // 92	Kinesiología Infantil
                                                break;
                                            case 93: // 93	Kinesiología Del Desarrollo
                                                break;
                                        }
                                    }
                                    break;
                                case 26:// 26  KINESIOLOGIA ESPECIALIZADA
                                    break;
                                case 27:// 27  KINESIOLOGIA DOMICILIARIA
                                    break;
                            }
                        }
                        break;
                    case 4: //FONOAUDIOLOGÍA
                        if(!empty($profesional->id_tipo_especialidad))
                        {
                            switch (intval($profesional->id_tipo_especialidad))
                            {
                                case 28:// 28	FONOAUDIOLOGIA CLÍNICA ADULTOS Y NIÑOS
                                    break;
                                case 29:// 29	FONOAUDIOLOGIA EDUCACIONAL
                                    break;
                                case 30:// 30	FONOAUDIOLOGIA ESPECIALIZADA
                                    if(!empty($profesional->id_sub_tipo_especialidad))
                                    {
                                        switch (intval($profesional->id_sub_tipo_especialidad))
                                        {
                                            case 94: // 94	Fonoaudiología Habla y Lenguaje
                                                break;
                                            case 95: // 95	Fonoaudiología Neurológica
                                                break;
                                            case 96: // 96	Fonoaudiología de la Audición
                                                break;
                                            case 97: // 97	Fonoaudiología del Canto
                                                break;
                                        }
                                    }

                                    break;
                                case 55:// 55	EXMENES ORL
                                    break;
                            }
                        }

                        break;
                    case 5: //NUTRICIÓN Y DIETÉTICA
                        if(!empty($profesional->id_tipo_especialidad))
                        {
                            switch (intval($profesional->id_tipo_especialidad))
                            {
                                case 31:// 31	NUTRICIONISTA GENERAL
                                    break;
                                case 32:// 32	NUTRICIONISTA PEDIÁTRICA
                                    break;
                                case 33:// 33	NUTRICIONISTA ESPECIALIDAD
                                    if(!empty($profesional->id_sub_tipo_especialidad))
                                    {
                                        switch (intval($profesional->id_sub_tipo_especialidad))
                                        {
                                            case 98: //98	Obesidad
                                                break;
                                            case 99: //99	Diabetes
                                                break;
                                            case 100: //100	Dietología
                                                break;
                                            case 101: //101	Transtornos Metabólicos
                                                break;
                                            case 102: //102	Tercera Edad
                                                break;

                                        }
                                    }
                                    break;
                            }
                        }

                        break;
                    case 6: //SICOLOGÍA
                        if(!empty($profesional->id_tipo_especialidad))
                        {
                            switch (intval($profesional->id_tipo_especialidad))
                            {
                                case 34:// 34	SICOLOGÍA GENERAL ADULTOS
                                    break;
                                case 35:// 35	SICOLOGÍA GENERAL INFANTIL
                                    break;
                                case 36:// 36	SICOLOGÍA LABORAL
                                    break;
                                case 37:// 37	SICOLOGÍA ESPECIALIZADA
                                    if(!empty($profesional->id_sub_tipo_especialidad))
                                    {
                                        switch (intval($profesional->id_sub_tipo_especialidad))
                                        {
                                            case 103: // 103	Sicología Adicciones
                                                break;
                                            case 104: // 104	Sicología de la Obesidad
                                                break;
                                            case 105: // 105	Sicología Oncológica
                                                break;
                                        }
                                    }
                                    break;
                            }
                        }

                        break;
                    case 7: //MATRÓN/A
                        if(!empty($profesional->id_tipo_especialidad))
                        {
                            switch (intval($profesional->id_tipo_especialidad))
                            {
                                case 38:// 38	ATENCIÓN EMBARAZO
                                    break;
                                case 39:// 39	ANTICONCEPCIÓN
                                    break;
                                case 40:// 40	ATENCIÓN PUERPERIO
                                    break;
                                case 51:// 51	CONTROL NIÑO SANO
                                    break;
                                case 52:// 52	MATRON/A ATENCIÓN GENERAL
                                    break;
                            }
                        }

                        break;
                    case 8: //ENFERMERA UNIVERSITARIA
                        if(!empty($profesional->id_tipo_especialidad))
                        {
                            switch (intval($profesional->id_tipo_especialidad))
                            {
                                case 41:// 41	ENFERMERÍA GENERAL
                                    if(!empty($profesional->id_sub_tipo_especialidad))
                                    {
                                        switch (intval($profesional->id_sub_tipo_especialidad))
										{
                                            case 106: // 106	Cuidado de enfermos
                                                break;
                                            case 107: // 107	Curaciones tratamientos
                                                break;
                                            case 108: // 108	Control de niño sano
                                                break;
										}
									}
                                    break;
                                case 42:// 42	ENFERMERÍA ESPECIALIZADA
                                    break;
                                case 53:// 53	ENFERMERÍA CONTROL NIÑO SANO
                                    break;
                            }
                        }

                        break;
                    case 9: //TERÁPIA OCUPACIONAL
                        if(!empty($profesional->id_tipo_especialidad))
                        {
                            switch (intval($profesional->id_tipo_especialidad))
                            {
                                case 43:// 43	TERÁPIA OCUPACIONAL ADULTOS
                                    break;
                                case 44:// 44	TERÁPIA OCUPACIONAL NIÑOS
                                    break;
                            }
                        }

                        break;
                    case 10: //TÉCNICO ENFERMERÍA
                        if(!empty($profesional->id_tipo_especialidad))
                        {
                            switch (intval($profesional->id_tipo_especialidad))
                            {
                                case 45:// 45	ATENCIÓN TENS EN GENERAL
                                    break;
                                case 46:// 46	ATENCIÓN TENS ESPECIALIZADA
                                    break;
                            }
                        }

                        break;
                    case 11: //TECNÓLOGO MÉDICO
                        if(!empty($profesional->id_tipo_especialidad))
                        {
                            switch (intval($profesional->id_tipo_especialidad))
                            {
                                case 47:// 47	TECNOLOGÍA MÉDICA GENERAL
                                    break;
                                case 48:// 48	TECNOLOGÍA MÉDICA ESPECIALIZADA
                                    if(!empty($profesional->id_sub_tipo_especialidad))
                                    {
                                        switch (intval($profesional->id_sub_tipo_especialidad))
										{
                                            case 109: // 109	Laboratorio Radiología
                                                break;
                                            case 110: // 110	Laboratorio clínico
                                                break;
                                            case 111: // 111	Laboratorio Anatomía Patológica
                                                break;
                                            case 112: // 112	Laboratorio Otorrinolaringología
                                                break;
                                            case 113: // 113	Laboratorio Oftalmología
                                                break;
                                            case 114: // 114	Laboratorio Cardiología
                                                break;
                                            case 115: // 115	Laboratorio Neurología
                                                break;
                                            case 116: // 116	Laboratorio Dental
                                                break;
                                            case 117: // 117	Laboratorio Citopatología
                                                break;
                                            case 118: // 118	Laboratorio Inmunología
                                                break;

										}
									}
                                    break;
                                case 54:// 54	TECNOLOGO ORL
                                    break;
                            }
                        }

                        break;
                    case 12: //ARSENALERÍA
                        if(!empty($profesional->id_tipo_especialidad))
                        {
                            switch (intval($profesional->id_tipo_especialidad))
                            {
                                case 49:// 49	ARSENALERÍA QUIRÚRGICA
                                    break;
                                case 50:// 50	ARSENALERÍA OBSTÉTRICA
                                    break;
                            }
                        }
                        break;
                }

                $datos['estado'] = 1;
                $datos['registros'] = $registro;
                $datos['profesional'] = $profesional;
                $datos['cant_recetas'] = $cant_recetas;
                $datos['cant_examen_ppf'] = $cant_examen_ppf;
                $datos['html_base'] = $html_base;

                $datos['paciente'] = array(
                    'id' => $paciente->id,
                    'nombre' => $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos
                );
            }

        }
        else
        {
            $datos['estado'] = 0;
            $datos['mjs'] = 'campo requerido';
            $datos['error'] = $error;
        }

        return $datos;
    }


    /**
     * var (int) @id
     * var (profesional) @profesional
     * var (int) @id_paciente
     * return objet
     */
    public function cargarInfoFichaBase_r(Request $request)
    {
        $profesional = Profesional::find($request->id_profesional);
        return static::cargarInfoFichaBase($request->id, $profesional, $request->id_paciente, $request->id_ficha);
    }

    /**
     * var (hora) @hora
     * return object
     */
    static public function cargarInfoFichaBase($hora)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($hora))
        {
            $error['hora'] = 'cmapo requerido';
            $valido = 0;
        }

        if($valido)
        {

            $profesional = Profesional::find($hora->id_profesional);

            if(!$profesional)
            {
                $user = Auth::user()->id;
                $profesional = Profesional::where('id_usuario', $user)->first();
            }

            return $profesional;

            $paciente = Paciente::find($hora->id_paciente);

            $ficha_previas = '';
            $ficha_actual_nueva = '';
            switch (intval($profesional->id_especialidad))
            {
                case 1: //MÉDICOS
                    if(!empty($profesional->id_tipo_especialidad))
                    {
                        switch (intval($profesional->id_tipo_especialidad)) {
                            case 1: //CIRUGIA
                                /** FICHAS DE ATENCIONES PREVIAS */
                                $filtro_previas = array();
                                $filtro_previas[] = array('id_paciente', $paciente->id);
                                $filtro_previas[] = array('confidencial', '0');
                                $filtro_previas[] = array('finalizada', 1);
                                $filtro_previas[] = array('id_profesional', $profesional->id);
                                $ficha_previas = FichaAtencion::where($filtro_previas)->get();

                                $datos['ficha_previas'] = $ficha_previas;


                                /** FICHA ATENCION ACTUAL */
                                if(empty($hora->id_ficha_atencion))
                                {
                                    $nueva_ficha_atencion = new FichaAtencion();
                                    $nueva_ficha_atencion->id_paciente = $paciente->id;
                                    $nueva_ficha_atencion->id_profesional = $profesional->id;
                                    $nueva_ficha_atencion->id_lugar_atencion = $hora->id_lugar_atencion;

                                    if ($nueva_ficha_atencion->save())
                                    {
                                        $hora->id_estado = 5;
                                        $hora->fecha_realizacion_consulta = now();
                                        $hora->id_ficha_atencion = $nueva_ficha_atencion->id;
                                        $hora->save();
                                        $ficha_actual_nueva = $nueva_ficha_atencion;
                                    }
                                    else
                                    {
                                        $nueva_ficha_atencion = '';
                                    }
                                }
                                else
                                {
                                    $filtro_fichaAtencion = array();
                                    $filtro_fichaAtencion[] = array('id_paciente', $paciente->id);
                                    $filtro_fichaAtencion[] = array('id', $hora->id_ficha_atencion);
                                    $ficha_actual_nueva = FichaAtencion::where($filtro_fichaAtencion)->first();
                                }

                                $datos['id_ficha_actual_nueva'] = $ficha_actual_nueva->id;
                                $datos['ficha_actual_nueva'] = $ficha_actual_nueva;

                                if(!empty($profesional->id_sub_tipo_especialidad))
                                {
                                    switch (intval($profesional->id_sub_tipo_especialidad)) {
                                        case 1:// 1	Cirugía Abdominal General
                                            break;
                                        case 2:// 2	Cirugía Bariátrica
                                            break;
                                        case 3:// 3	Cirugia Broncopulmonar
                                            break;
                                        case 4:// 4	Cirugía Cardiovascular
                                            break;
                                        case 5:// 5	Cirugía Cardiovascular Adultos
                                            break;
                                        case 6:// 6	Cirugía Cardiovascular Niños
                                            break;
                                        case 7:// 7	Cirugía Coloproctológica
                                            break;
                                        case 8:// 8	Cirugía de Cabeza y Cuello
                                            break;
                                        case 9:// 9	Cirugía de la mama
                                            break;
                                        case 10:// 10	Cirugía del Tórax
                                            break;
                                        case 11:// 11	Cirugía digestiva
                                            break;
                                        case 12:// 12	Cirugía Gástrica
                                            break;
                                        case 13:// 13	Cirugía maxilofacial
                                            break;
                                        case 14:// 14	Cirugía Nefrourológica
                                            break;
                                        case 15:// 15	Cirugía Oncológica
                                            break;
                                        case 16:// 16	Cirugía Pancreas
                                            break;
                                        case 17:// 17	Cirugía Plástica y Reparadora
                                            break;
                                        case 18:// 18	Cirugía Vascular Periférica
                                            break;
                                        case 119:// 119	Cirugía General
                                            break;
                                        case 120:// 120	Cirugía y Traumatologia Pediatrica General
                                            break;

                                    }
                                }
                                break;
                            case 2: //ESPECIALIDADES MÉDICAS
                                /** FICHAS DE ATENCIONES PREVIAS */
                                $filtro_previas = array();
                                $filtro_previas[] = array('id_paciente', $paciente->id);
                                $filtro_previas[] = array('confidencial', '0');
                                $filtro_previas[] = array('finalizada', 1);
                                $filtro_previas[] = array('id_profesional', $profesional->id);
                                $ficha_previas = FichaAtencion::where($filtro_previas)->get();

                                $datos['ficha_previas'] = $ficha_previas;


                                /** FICHA ATENCION ACTUAL */
                                if(empty($hora->id_ficha_atencion))
                                {
                                    $nueva_ficha_atencion = new FichaAtencion();
                                    $nueva_ficha_atencion->id_paciente = $paciente->id;
                                    $nueva_ficha_atencion->id_profesional = $profesional->id;
                                    $nueva_ficha_atencion->id_lugar_atencion = $hora->id_lugar_atencion;

                                    if ($nueva_ficha_atencion->save())
                                    {
                                        $hora->id_estado = 5;
                                        $hora->fecha_realizacion_consulta = now();
                                        $hora->id_ficha_atencion = $nueva_ficha_atencion->id;
                                        $hora->save();
                                        $ficha_actual_nueva = $nueva_ficha_atencion;
                                    }
                                    else
                                    {
                                        $nueva_ficha_atencion = '';
                                    }
                                }
                                else
                                {
                                    $filtro_fichaAtencion = array();
                                    $filtro_fichaAtencion[] = array('id_paciente', $paciente->id);
                                    $filtro_fichaAtencion[] = array('id', $hora->id_ficha_atencion);
                                    $ficha_actual_nueva = FichaAtencion::where($filtro_fichaAtencion)->first();
                                }

                                $datos['id_ficha_actual_nueva'] = $ficha_actual_nueva->id;
                                $datos['ficha_actual_nueva'] = $ficha_actual_nueva;


                                if(!empty($profesional->id_sub_tipo_especialidad))
                                {
                                    switch (intval($profesional->id_sub_tipo_especialidad)) {
                                        case 19:// 19	Dermatología
                                            break;
                                        case 20:// 20	Oftalmología
                                            break;
                                        case 21:// 21	Otorrinolaringología
                                            break;
                                        case 22:// 22	Urología
                                            break;
                                    }
                                }


                                break;
                            case 3: //GINECO-OBSTETRÍCIA

                                /** FICHA ATENCION ACTUAL */
                                if(empty($hora->id_ficha_otros_prof))
                                {
                                    $nueva_ficha_atencion = new FichaGinecoObstetrica();
                                    $nueva_ficha_atencion->id_paciente = $paciente->id;
                                    $nueva_ficha_atencion->id_profesional = $profesional->id;
                                    $nueva_ficha_atencion->id_lugar_atencion = $hora->id_lugar_atencion;

                                    if ($nueva_ficha_atencion->save())
                                    {
                                        $hora->id_estado = 5;
                                        $hora->fecha_realizacion_consulta = now();
                                        $hora->id_ficha_otros_prof = $nueva_ficha_atencion->id;
                                        $hora->save();
                                        $ficha_actual_nueva = $nueva_ficha_atencion;
                                    }
                                    else
                                    {
                                        $nueva_ficha_atencion = '';
                                    }
                                }
                                else
                                {
                                    $filtro_fichaAtencion = array();
                                    $filtro_fichaAtencion[] = array('id_paciente', $paciente->id);
                                    $filtro_fichaAtencion[] = array('id', $hora->id_ficha_otros_prof);
                                    $ficha_actual_nueva = FichaGinecoObstetrica::where($filtro_fichaAtencion)->first();
                                }

                                $datos['id_ficha_actual_nueva'] = $ficha_actual_nueva->id;
                                $datos['ficha_actual_nueva'] = $ficha_actual_nueva;

                                if(!empty($profesional->id_sub_tipo_especialidad))
                                {
                                    switch (intval($profesional->id_sub_tipo_especialidad)) {
                                        case 23:// 23	Ginecología endocrinológica
                                            break;
                                        case 24:// 24	Ginecología  Infantil
                                            break;
                                        case 25:// 25	Ginecología Infertilidad
                                            break;
                                        case 26:// 26	Ginecología Oncológica
                                            break;
                                        case 27:// 27	Ginecologia y Obtetricia General
                                            break;
                                        case 28:// 28	Medicina Materno Fetal
                                            break;

                                    }
                                }
                                break;
                            case 4: //MEDICINA DE ALTURA
                                if(!empty($profesional->id_sub_tipo_especialidad))
                                {
                                    switch (intval($profesional->id_sub_tipo_especialidad)) {
                                        case 29:// 29	Medicina de Altura
                                            break;
                                    }
                                }
                                break;
                            case 5: //MEDICINA DEL TRABAJO
                                if(!empty($profesional->id_sub_tipo_especialidad))
                                {
                                    switch (intval($profesional->id_sub_tipo_especialidad)) {
                                        case 30:// 30	Medicina del Trabajo
                                            break;
                                    }
                                }
                                break;
                            case 6: //MEDICINA DEPORTIVA
                                if(!empty($profesional->id_sub_tipo_especialidad))
                                {
                                    switch (intval($profesional->id_sub_tipo_especialidad)) {
                                        case 31:// 31	Medicina deportiva General
                                            break;
                                        case 32:// 32	Medicina deportiva Alto Rendimiento
                                            break;
                                    }
                                }
                                break;
                            case 7: //MEDICINA FISICA Y REHABILITACIÓN
                                if(!empty($profesional->id_sub_tipo_especialidad))
                                {
                                    switch (intval($profesional->id_sub_tipo_especialidad)) {
                                        case 33:// 33	Mdicina física y Rehabilitación General
                                            break;
                                        case 34:// 34	Mdicina física y Rehabilitación Neurológica
                                            break;
                                        case 35:// 35	Mdicina física y Rehabilitación Respiratoria
                                            break;
                                    }
                                }
                                break;
                            case 8: //MEDICINA GENERAL
                                /** FICHAS DE ATENCIONES PREVIAS */
                                $filtro_previas = array();
                                $filtro_previas[] = array('id_paciente', $paciente->id);
                                $filtro_previas[] = array('confidencial', '0');
                                $filtro_previas[] = array('finalizada', 1);
                                $filtro_previas[] = array('id_profesional', $profesional->id);
                                $ficha_previas = FichaAtencion::where($filtro_previas)->get();

                                $datos['ficha_previas'] = $ficha_previas;


                                /** FICHA ATENCION ACTUAL */
                                if(empty($hora->id_ficha_atencion))
                                {
                                    $nueva_ficha_atencion = new FichaAtencion();
                                    $nueva_ficha_atencion->id_paciente = $paciente->id;
                                    $nueva_ficha_atencion->id_profesional = $profesional->id;
                                    $nueva_ficha_atencion->id_lugar_atencion = $hora->id_lugar_atencion;

                                    if ($nueva_ficha_atencion->save())
                                    {
                                        $hora->id_estado = 5;
                                        $hora->fecha_realizacion_consulta = now();
                                        $hora->id_ficha_atencion = $nueva_ficha_atencion->id;
                                        $hora->save();
                                        $ficha_actual_nueva = $nueva_ficha_atencion;
                                    }
                                    else
                                    {
                                        $nueva_ficha_atencion = '';
                                    }
                                }
                                else
                                {
                                    $filtro_fichaAtencion = array();
                                    $filtro_fichaAtencion[] = array('id_paciente', $paciente->id);
                                    $filtro_fichaAtencion[] = array('id', $hora->id_ficha_atencion);
                                    $ficha_actual_nueva = FichaAtencion::where($filtro_fichaAtencion)->first();
                                }

                                $datos['id_ficha_actual_nueva'] = $ficha_actual_nueva->id;
                                $datos['ficha_actual_nueva'] = $ficha_actual_nueva;


                                if(!empty($profesional->id_sub_tipo_especialidad))
                                {
                                    switch (intval($profesional->id_sub_tipo_especialidad)) {
                                        case 36:// 36	Medicina Familiar
                                            break;
                                        case 37:// 37	Medicina general adultos y niños
                                            break;
                                        case 38:// 38	Medicina general a Domicilio
                                            break;
                                    }
                                }
                                break;
                            case 9: //MEDICINA INTERNA
                                if(!empty($profesional->id_sub_tipo_especialidad))
                                {
                                    switch (intval($profesional->id_sub_tipo_especialidad)) {
                                        case 39:// 39	Alimentación y Nutrición
                                            break;
                                        case 40:// 40	Broncopulmonar
                                            break;
                                        case 41:// 41	Diabetología
                                            break;
                                        case 42:// 42	Endocrinología
                                            break;
                                        case 43:// 43	Endoscopía Digestiva
                                            break;
                                        case 44:// 44	Gastroenterología
                                            break;
                                        case 45:// 45	Geriatría
                                            break;
                                        case 46:// 46	Hematología
                                            break;
                                        case 47:// 47	Hepatología
                                            break;
                                        case 48:// 48	Infectología
                                            break;
                                        case 49:// 49	Inmunología y Alérgias
                                            break;
                                        case 50:// 50	Medicina Nuclear
                                            break;
                                        case 51:// 51	Nefrología
                                            break;
                                        case 52:// 52	Nefrourología
                                            break;
                                        case 53:// 53	Oncología
                                            break;
                                        case 54:// 54	Parasitología
                                            break;
                                        case 55:// 55	Quimioterapia
                                            break;
                                        case 56:// 56	Radioterapia
                                            break;
                                        case 57:// 57	Reumatología
                                            break;
                                    }
                                }
                                break;
                            case 10: //NEUROLOGÍA Y NEUROCIRUGÍA
                                /** FICHAS DE ATENCIONES PREVIAS */
                                $filtro_previas = array();
                                $filtro_previas[] = array('id_paciente', $paciente->id);
                                $filtro_previas[] = array('confidencial', '0');
                                $filtro_previas[] = array('finalizada', 1);
                                $filtro_previas[] = array('id_profesional', $profesional->id);
                                $ficha_previas = FichaAtencion::where($filtro_previas)->get();

                                $datos['ficha_previas'] = $ficha_previas;


                                /** FICHA ATENCION ACTUAL */
                                if(empty($hora->id_ficha_atencion))
                                {
                                    $nueva_ficha_atencion = new FichaAtencion();
                                    $nueva_ficha_atencion->id_paciente = $paciente->id;
                                    $nueva_ficha_atencion->id_profesional = $profesional->id;
                                    $nueva_ficha_atencion->id_lugar_atencion = $hora->id_lugar_atencion;

                                    if ($nueva_ficha_atencion->save())
                                    {
                                        $hora->id_estado = 5;
                                        $hora->fecha_realizacion_consulta = now();
                                        $hora->id_ficha_atencion = $nueva_ficha_atencion->id;
                                        $hora->save();
                                        $ficha_actual_nueva = $nueva_ficha_atencion;
                                    }
                                    else
                                    {
                                        $nueva_ficha_atencion = '';
                                    }
                                }
                                else
                                {
                                    $filtro_fichaAtencion = array();
                                    $filtro_fichaAtencion[] = array('id_paciente', $paciente->id);
                                    $filtro_fichaAtencion[] = array('id', $hora->id_ficha_atencion);
                                    $ficha_actual_nueva = FichaAtencion::where($filtro_fichaAtencion)->first();
                                }

                                $datos['id_ficha_actual_nueva'] = $ficha_actual_nueva->id;
                                $datos['ficha_actual_nueva'] = $ficha_actual_nueva;
                                if(!empty($profesional->id_sub_tipo_especialidad))
                                {
                                    switch (intval($profesional->id_sub_tipo_especialidad)) {
                                        case 58:// 58	Neurología

                                            break;
                                        case 59:// 59	Neurocirugía
                                            break;
                                        case 60:// 60	Neuropsiquiatría
                                            break;
                                        case 61:// 61	Neuroradiología
                                            break;
                                    }
                                }
                                break;
                            case 11: //PEDIATRÍA

                                /** FICHAS DE ATENCIONES PREVIAS */
                                $filtro_previas = array();
                                $filtro_previas[] = array('id_paciente', $paciente->id);
                                $filtro_previas[] = array('confidencial', '0');
                                $filtro_previas[] = array('finalizada', 1);
                                $filtro_previas[] = array('id_profesional', $profesional->id);
                                $ficha_previas = FichaAtencion::where($filtro_previas)->get();

                                $datos['ficha_previas'] = $ficha_previas;


                                /** FICHA ATENCION ACTUAL */
                                if(empty($hora->id_ficha_atencion))
                                {
                                    $nueva_ficha_atencion = new FichaAtencion();
                                    $nueva_ficha_atencion->id_paciente = $paciente->id;
                                    $nueva_ficha_atencion->id_profesional = $profesional->id;
                                    $nueva_ficha_atencion->id_lugar_atencion = $hora->id_lugar_atencion;

                                    if ($nueva_ficha_atencion->save())
                                    {
                                        $hora->id_estado = 5;
                                        $hora->fecha_realizacion_consulta = now();
                                        $hora->id_ficha_atencion = $nueva_ficha_atencion->id;
                                        $hora->save();
                                        $ficha_actual_nueva = $nueva_ficha_atencion;
                                    }
                                    else
                                    {
                                        $nueva_ficha_atencion = '';
                                    }
                                }
                                else
                                {
                                    $filtro_fichaAtencion = array();
                                    $filtro_fichaAtencion[] = array('id_paciente', $paciente->id);
                                    $filtro_fichaAtencion[] = array('id', $hora->id_ficha_atencion);
                                    $ficha_actual_nueva = FichaAtencion::where($filtro_fichaAtencion)->first();
                                }

                                $datos['id_ficha_actual_nueva'] = $ficha_actual_nueva->id;
                                $datos['ficha_actual_nueva'] = $ficha_actual_nueva;

                                if(!empty($profesional->id_sub_tipo_especialidad))
                                {
                                    switch (intval($profesional->id_sub_tipo_especialidad)) {
                                        case 62:// 62	Alergología Pediátrica
                                            break;
                                        case 63:// 63	Alimentación y Nutrición  Infantil
                                            break;
                                        case 64:// 64	Broncopulmonar Infantil
                                            break;
                                        case 65:// 65	Cardiología Pediátrica
                                            break;
                                        case 66:// 66	Cirugía y Traumatología Pediatrica
                                            break;
                                        case 67:// 67	Dermatología Pediátrica
                                            break;
                                        case 68:// 68	Endocrinología Pediátrica
                                            break;
                                        case 69:// 69	Gastroenterología  Pediátrica
                                            break;
                                        case 70:// 70	Ginecología  Infantil
                                            break;
                                        case 71:// 71	Nefrología Pediátrica
                                            break;
                                        case 72:// 72	Neonatología
                                            break;
                                        case 73:// 73	Neurología Infantil
                                            break;
                                        case 74:// 74	Neurosiquiatría Infantil
                                            break;
                                        case 75:// 75	Oftalmología Pediátrica
                                            break;
                                        case 76:// 76	Oncología y Radioterapia  Infantil
                                            break;
                                        case 77:// 77	Otorrinolaringología Pediátrica
                                            break;
                                        case 78:// 78	Pediatría General
                                            break;
                                        case 79:// 79	Urología Pediátrica
                                            break;
                                    }
                                }
                                break;
                            case 12: //SIQUIATRÍA
								/** FICHAS DE ATENCIONES PREVIAS */
                                $filtro_previas = array();
                                $filtro_previas[] = array('id_paciente', $paciente->id);
                                $filtro_previas[] = array('confidencial', '0');
                                $filtro_previas[] = array('finalizada', 1);
                                $filtro_previas[] = array('id_profesional', $profesional->id);
                                $ficha_previas = FichaAtencion::where($filtro_previas)->get();

                                $datos['ficha_previas'] = $ficha_previas;


                                /** FICHA ATENCION ACTUAL */
                                if(empty($hora->id_ficha_atencion))
                                {
                                    $nueva_ficha_atencion = new FichaAtencion();
                                    $nueva_ficha_atencion->id_paciente = $paciente->id;
                                    $nueva_ficha_atencion->id_profesional = $profesional->id;
                                    $nueva_ficha_atencion->id_lugar_atencion = $hora->id_lugar_atencion;

                                    if ($nueva_ficha_atencion->save())
                                    {
                                        $hora->id_estado = 5;
                                        $hora->fecha_realizacion_consulta = now();
                                        $hora->id_ficha_atencion = $nueva_ficha_atencion->id;
                                        $hora->save();
                                        $ficha_actual_nueva = $nueva_ficha_atencion;
                                    }
                                    else
                                    {
                                        $nueva_ficha_atencion = '';
                                    }
                                }
                                else
                                {
                                    $filtro_fichaAtencion = array();
                                    $filtro_fichaAtencion[] = array('id_paciente', $paciente->id);
                                    $filtro_fichaAtencion[] = array('id', $hora->id_ficha_atencion);
                                    $ficha_actual_nueva = FichaAtencion::where($filtro_fichaAtencion)->first();
                                }

                                $datos['id_ficha_actual_nueva'] = $ficha_actual_nueva->id;
                                $datos['ficha_actual_nueva'] = $ficha_actual_nueva;

                                if(!empty($profesional->id_sub_tipo_especialidad))
                                {
                                    switch (intval($profesional->id_sub_tipo_especialidad)) {
                                        case 80:// 80	Psiquiatría General
                                            break;
                                        case 81:// 81	Adicciones
                                            break;
                                    }
                                }
                                break;
                            case 13: //TRAUMATOLOGIA Y ORTOPEDIA
                                if(!empty($profesional->id_sub_tipo_especialidad))
                                {
                                    switch (intval($profesional->id_sub_tipo_especialidad)) {
                                        case 82:// 82	Traumatología Cadera
                                            break;
                                        case 83:// 83	Traumatología Codo
                                            break;
                                        case 84:// 84	Traumatología Columna
                                            break;
                                        case 85:// 85	Traumatología General
                                            break;
                                        case 86:// 86	Traumatología Hombro
                                            break;
                                        case 87:// 87	Traumatología Rodilla
                                            break;
                                    }
                                }
                                break;
                        }
                    }
                    break;
                case 2: //ODONTÓLOGOS
                    if(!empty($profesional->id_tipo_especialidad))
                    {
                        /** FICHAS DE ATENCIONES PREVIAS */
                        $filtro_previas = array();
                        $filtro_previas[] = array('id_paciente', $paciente->id);
                        $filtro_previas[] = array('confidencial', '0');
                        $filtro_previas[] = array('finalizada', 1);
                        $filtro_previas[] = array('id_profesional', $profesional->id);
                        $ficha_previas = FichaAtencion::where($filtro_previas)->get();

                        $datos['ficha_previas'] = $ficha_previas;

                        /** FICHA ATENCION ACTUAL */
                        if(empty($hora->id_ficha_atencion))
                        {

                            $nueva_ficha_atencion = new FichaAtencion();
                            $nueva_ficha_atencion->id_paciente = $paciente->id;
                            $nueva_ficha_atencion->id_profesional = $profesional->id;
                            $nueva_ficha_atencion->id_lugar_atencion = $hora->id_lugar_atencion;

                            if ($nueva_ficha_atencion->save())
                            {
                                $hora->id_estado = 5;
                                $hora->fecha_realizacion_consulta = now();
                                $hora->id_ficha_atencion = $nueva_ficha_atencion->id;
                                $hora->save();
                                $ficha_actual_nueva = $nueva_ficha_atencion;
                            }
                            else
                            {
                                $nueva_ficha_atencion = '';
                            }
                        }
                        else
                        {
                            $filtro_fichaAtencion = array();
                            $filtro_fichaAtencion[] = array('id_paciente', $paciente->id);
                            $filtro_fichaAtencion[] = array('id', $hora->id_ficha_atencion);
                            $ficha_actual_nueva = FichaAtencion::where($filtro_fichaAtencion)->first();
                        }

                        $datos['id_ficha_actual_nueva'] = $ficha_actual_nueva->id;
                        $datos['ficha_actual_nueva'] = $ficha_actual_nueva;


                        switch (intval($profesional->id_tipo_especialidad))
                        {
                            case 14:// 14	CIRUGÍA MAXILOFACIAL
                                break;
                            case 15:// 15	ENDODÓNCIA
                                break;
                            case 16:// 16	IMPLANTOLOGÍA
                                break;
                            case 17:// 17	ODONTOLOGÍA ESTETICA
                                break;
                            case 18:// 18	ODONTOLOGÍA GENERAL
                                break;
                            case 19:// 19	ODONTOPEDIATRÍA
                                break;
                            case 20:// 20	ORTODÓNCIA
                                break;
                            case 21:// 21	PERIODÓNCIA
                                break;
                            case 22:// 22	REHABILITACIÓN ORAL
                                break;
                            case 23:// 23	RADIOLOGÍA DENTAL
                                break;
                            case 24:// 24	REHABILITACIÓN ORAL
                                break;
                            case 56:// 56	ESPECIALISTA EN TRANSTORNOS TEMPOROMANDIBULARES
                                break;
                        }
                    }


                    break;
                case 3: //KINESIOLOGIA

                    if(!empty($profesional->id_tipo_especialidad))
                    {
                        /** FICHAS DE ATENCIONES PREVIAS */
                        $filtro_previas = array();
                        $filtro_previas[] = array('id_paciente', $paciente->id);
                        $filtro_previas[] = array('id_profesional', $profesional->id);
                        $filtro_previas[] = array('finalizada', 1);
                        $ficha_previas = FichaOtrosProfesionales::where($filtro_previas)->get();

                        $datos['ficha_previas'] = $ficha_previas;


                        /** FICHA ATENCION ACTUAL */
                        if(empty($hora->id_ficha_otros_prof))
                        {
                            $nueva_ficha_atencion = new FichaOtrosProfesionales();
                            $nueva_ficha_atencion->id_paciente = $paciente->id;
                            $nueva_ficha_atencion->id_profesional = $profesional->id;
                            $nueva_ficha_atencion->id_especialidad = $profesional->id_especialidad;
                            $nueva_ficha_atencion->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                            $nueva_ficha_atencion->id_lugar_atencion = $hora->id_lugar_atencion;

                            if ($nueva_ficha_atencion->save())
                            {
                                $hora->id_estado = 5;
                                $hora->fecha_realizacion_consulta = now();
                                $hora->id_ficha_atencion = NULL;
                                $hora->id_ficha_otros_prof = $nueva_ficha_atencion->id;
                                $hora->save();
                                $ficha_actual_nueva = $nueva_ficha_atencion;
                            }
                            else
                            {
                                $nueva_ficha_atencion = '';
                            }
                        }
                        else
                        {
                            $filtro_fichaAtencion = array();
                            $filtro_fichaAtencion[] = array('id_paciente', $paciente->id);
                            $filtro_fichaAtencion[] = array('id', $hora->id_ficha_otros_prof);
                            $ficha_actual_nueva = FichaOtrosProfesionales::where($filtro_fichaAtencion)->first();
                        }

                        $datos['id_ficha_actual_nueva'] = $ficha_actual_nueva->id;
                        $datos['ficha_actual_nueva'] = $ficha_actual_nueva;

                        switch (intval($profesional->id_tipo_especialidad))
                        {
                            case 25:// 25  KINESIOLOGIA GENERAL
                                if(!empty($profesional->id_sub_tipo_especialidad))
                                {
                                    switch (intval($profesional->id_sub_tipo_especialidad))
                                    {
                                        case 88: // 88	Kinesiología Respiratoria
                                            break;
                                        case 89: // 89	Kinesiología Traumatológica
                                            break;
                                        case 90: // 90	Kinesiología Neurológica
                                            break;
                                        case 91: // 91	Kinesiología Tercera Edad
                                            break;
                                        case 92: // 92	Kinesiología Infantil
                                            break;
                                        case 93: // 93	Kinesiología Del Desarrollo
                                            break;
                                    }
                                }
                                break;
                            case 26:// 26  KINESIOLOGIA ESPECIALIZADA
                                break;
                            case 27:// 27  KINESIOLOGIA DOMICILIARIA
                                break;
                        }
                    }
                    break;
                case 4: //FONOAUDIOLOGÍA

                    if(!empty($profesional->id_tipo_especialidad))
                    {
                        /** FICHAS DE ATENCIONES PREVIAS */
                        $filtro_previas = array();
                        $filtro_previas[] = array('id_paciente', $paciente->id);
                        $filtro_previas[] = array('id_profesional', $profesional->id);
                        $filtro_previas[] = array('finalizada', 1);
                        $ficha_previas = FichaOtrosProfesionales::where($filtro_previas)->get();

                        $datos['ficha_previas'] = $ficha_previas;

                        /** FICHA ATENCION ACTUAL */
                        if(empty($hora->id_ficha_otros_prof))
                        {
                            $nueva_ficha_atencion = new FichaOtrosProfesionales();
                            $nueva_ficha_atencion->id_paciente = $paciente->id;
                            $nueva_ficha_atencion->id_profesional = $profesional->id;
                            $nueva_ficha_atencion->id_especialidad = $profesional->id_especialidad;
                            $nueva_ficha_atencion->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                            $nueva_ficha_atencion->id_lugar_atencion = $hora->id_lugar_atencion;

                            if ($nueva_ficha_atencion->save())
                            {
                                $hora->id_estado = 5;
                                $hora->fecha_realizacion_consulta = now();
                                $hora->id_ficha_atencion = NULL;
                                $hora->id_ficha_otros_prof = $nueva_ficha_atencion->id;
                                $hora->save();
                                $ficha_actual_nueva = $nueva_ficha_atencion;
                            }
                            else
                            {
                                $nueva_ficha_atencion = '';
                            }
                        }
                        else
                        {
                            $filtro_fichaAtencion = array();
                            $filtro_fichaAtencion[] = array('id_paciente', $paciente->id);
                            $filtro_fichaAtencion[] = array('id', $hora->id_ficha_otros_prof);
                            $ficha_actual_nueva = FichaOtrosProfesionales::where($filtro_fichaAtencion)->first();
                        }

                        $datos['id_ficha_actual_nueva'] = $ficha_actual_nueva->id;
                        $datos['ficha_actual_nueva'] = $ficha_actual_nueva;

                        switch (intval($profesional->id_tipo_especialidad))
                        {
                            case 28:// 28	FONOAUDIOLOGIA CLÍNICA ADULTOS Y NIÑOS
                                break;
                            case 29:// 29	FONOAUDIOLOGIA EDUCACIONAL
                                break;
                            case 30:// 30	FONOAUDIOLOGIA ESPECIALIZADA
                                if(!empty($profesional->id_sub_tipo_especialidad))
                                {
                                    switch (intval($profesional->id_sub_tipo_especialidad))
                                    {
                                        case 94: // 94	Fonoaudiología Habla y Lenguaje
                                            break;
                                        case 95: // 95	Fonoaudiología Neurológica
                                            break;
                                        case 96: // 96	Fonoaudiología de la Audición
                                            break;
                                        case 97: // 97	Fonoaudiología del Canto
                                            break;
                                    }
                                }

                                break;
                            case 55:// 55	EXMENES ORL
                                break;
                        }
                    }

                    break;
                case 5: //NUTRICIÓN Y DIETÉTICA
                    if(!empty($profesional->id_tipo_especialidad))
                    {
                        switch (intval($profesional->id_tipo_especialidad))
                        {
                            case 31:// 31	NUTRICIONISTA GENERAL
                                break;
                            case 32:// 32	NUTRICIONISTA PEDIÁTRICA
                                break;
                            case 33:// 33	NUTRICIONISTA ESPECIALIDAD
                                if(!empty($profesional->id_sub_tipo_especialidad))
                                {
                                    switch (intval($profesional->id_sub_tipo_especialidad))
                                    {
                                        case 98: //98	Obesidad
                                            break;
                                        case 99: //99	Diabetes
                                            break;
                                        case 100: //100	Dietología
                                            break;
                                        case 101: //101	Transtornos Metabólicos
                                            break;
                                        case 102: //102	Tercera Edad
                                            break;

                                    }
                                }
                                break;
                        }
                    }

                    break;
                case 6: //SICOLOGÍA

                    if(!empty($profesional->id_tipo_especialidad))
                    {
                        /** FICHAS DE ATENCIONES PREVIAS */
                        $filtro_previas = array();
                        $filtro_previas[] = array('id_paciente', $paciente->id);
                        $filtro_previas[] = array('id_profesional', $profesional->id);
                        $filtro_previas[] = array('finalizada', 1);
                        $ficha_previas = FichaOtrosProfesionales::where($filtro_previas)->get();

                        $datos['ficha_previas'] = $ficha_previas;

                        /** FICHA ATENCION ACTUAL */
                        if(empty($hora->id_ficha_otros_prof))
                        {
                            $nueva_ficha_atencion = new FichaOtrosProfesionales();
                            $nueva_ficha_atencion->id_paciente = $paciente->id;
                            $nueva_ficha_atencion->id_profesional = $profesional->id;
                            $nueva_ficha_atencion->id_especialidad = $profesional->id_especialidad;
                            $nueva_ficha_atencion->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                            $nueva_ficha_atencion->id_lugar_atencion = $hora->id_lugar_atencion;

                            if ($nueva_ficha_atencion->save())
                            {
                                $hora->id_estado = 5;
                                $hora->fecha_realizacion_consulta = now();
                                $hora->id_ficha_atencion = NULL;
                                $hora->id_ficha_otros_prof = $nueva_ficha_atencion->id;
                                $hora->save();
                                $ficha_actual_nueva = $nueva_ficha_atencion;
                            }
                            else
                            {
                                $nueva_ficha_atencion = '';
                            }
                        }
                        else
                        {
                            $filtro_fichaAtencion = array();
                            $filtro_fichaAtencion[] = array('id_paciente', $paciente->id);
                            $filtro_fichaAtencion[] = array('id', $hora->id_ficha_otros_prof);
                            $ficha_actual_nueva = FichaOtrosProfesionales::where($filtro_fichaAtencion)->first();
                        }

                        $datos['id_ficha_actual_nueva'] = $ficha_actual_nueva->id;
                        $datos['ficha_actual_nueva'] = $ficha_actual_nueva;

                        switch (intval($profesional->id_tipo_especialidad))
                        {
                            case 34:// 34	SICOLOGÍA GENERAL ADULTOS
                                break;
                            case 35:// 35	SICOLOGÍA GENERAL INFANTIL
                                break;
                            case 36:// 36	SICOLOGÍA LABORAL
                                break;
                            case 37:// 37	SICOLOGÍA ESPECIALIZADA
                                if(!empty($profesional->id_sub_tipo_especialidad))
                                {
                                    switch (intval($profesional->id_sub_tipo_especialidad))
                                    {
                                        case 103: // 103	Sicología Adicciones
                                            break;
                                        case 104: // 104	Sicología de la Obesidad
                                            break;
                                        case 105: // 105	Sicología Oncológica
                                            break;
                                    }
                                }
                                break;
                        }
                    }

                    break;
                case 7: //MATRÓN/A
                    if(!empty($profesional->id_tipo_especialidad))
                    {
                        switch (intval($profesional->id_tipo_especialidad))
                        {
                            case 38:// 38	ATENCIÓN EMBARAZO
                                break;
                            case 39:// 39	ANTICONCEPCIÓN
                                break;
                            case 40:// 40	ATENCIÓN PUERPERIO
                                break;
                            case 51:// 51	CONTROL NIÑO SANO
                                break;
                            case 52:// 52	MATRON/A ATENCIÓN GENERAL
                                break;
                        }
                    }

                    break;
                case 8: //ENFERMERA UNIVERSITARIA
                    if(!empty($profesional->id_tipo_especialidad))
                    {
                        /** FICHAS DE ATENCIONES PREVIAS */
                        $filtro_previas = array();
                        $filtro_previas[] = array('id_paciente', $paciente->id);
                        $filtro_previas[] = array('id_profesional', $profesional->id);
                        $filtro_previas[] = array('finalizada', 1);
                        $ficha_previas = FichaOtrosProfesionales::where($filtro_previas)->get();

                        $datos['ficha_previas'] = $ficha_previas;

                        /** FICHA ATENCION ACTUAL */
                        if(empty($hora->id_ficha_otros_prof))
                        {
                            $nueva_ficha_atencion = new FichaOtrosProfesionales();
                            $nueva_ficha_atencion->id_paciente = $paciente->id;
                            $nueva_ficha_atencion->id_profesional = $profesional->id;
                            $nueva_ficha_atencion->id_especialidad = $profesional->id_especialidad;
                            $nueva_ficha_atencion->id_tipo_especialidad = $profesional->id_tipo_especialidad;
                            $nueva_ficha_atencion->id_lugar_atencion = $hora->id_lugar_atencion;

                            if ($nueva_ficha_atencion->save())
                            {
                                $hora->id_estado = 5;
                                $hora->fecha_realizacion_consulta = now();
                                $hora->id_ficha_atencion = NULL;
                                $hora->id_ficha_otros_prof = $nueva_ficha_atencion->id;
                                $hora->save();
                                $ficha_actual_nueva = $nueva_ficha_atencion;
                            }
                            else
                            {
                                $nueva_ficha_atencion = '';
                            }
                        }
                        else
                        {
                            $filtro_fichaAtencion = array();
                            $filtro_fichaAtencion[] = array('id_paciente', $paciente->id);
                            $filtro_fichaAtencion[] = array('id', $hora->id_ficha_otros_prof);
                            $ficha_actual_nueva = FichaOtrosProfesionales::where($filtro_fichaAtencion)->first();
                        }

                        $datos['id_ficha_actual_nueva'] = $ficha_actual_nueva->id;
                        $datos['ficha_actual_nueva'] = $ficha_actual_nueva;

                        switch (intval($profesional->id_tipo_especialidad))
                        {
                            case 41:// 41	ENFERMERÍA GENERAL
                                if(!empty($profesional->id_sub_tipo_especialidad))
                                {
                                    switch (intval($profesional->id_sub_tipo_especialidad))
                                    {
                                        case 106: // 106	Cuidado de enfermos
                                            break;
                                        case 107: // 107	Curaciones tratamientos
                                            break;
                                        case 108: // 108	Control de niño sano
                                            break;
                                    }
                                }
                                break;
                            case 42:// 42	ENFERMERÍA ESPECIALIZADA
                                break;
                            case 53:// 53	ENFERMERÍA CONTROL NIÑO SANO
                                break;
                        }
                    }

                    break;
                case 9: //TERÁPIA OCUPACIONAL
                    if(!empty($profesional->id_tipo_especialidad))
                    {
                        switch (intval($profesional->id_tipo_especialidad))
                        {
                            case 43:// 43	TERÁPIA OCUPACIONAL ADULTOS
                                break;
                            case 44:// 44	TERÁPIA OCUPACIONAL NIÑOS
                                break;
                        }
                    }

                    break;
                case 10: //TÉCNICO ENFERMERÍA
                    if(!empty($profesional->id_tipo_especialidad))
                    {
                        switch (intval($profesional->id_tipo_especialidad))
                        {
                            case 45:// 45	ATENCIÓN TENS EN GENERAL
                                break;
                            case 46:// 46	ATENCIÓN TENS ESPECIALIZADA
                                break;
                        }
                    }

                    break;
                case 11: //TECNÓLOGO MÉDICO
                    if(!empty($profesional->id_tipo_especialidad))
                    {
                        switch (intval($profesional->id_tipo_especialidad))
                        {
                            case 47:// 47	TECNOLOGÍA MÉDICA GENERAL
                                break;
                            case 48:// 48	TECNOLOGÍA MÉDICA ESPECIALIZADA
                                if(!empty($profesional->id_sub_tipo_especialidad))
                                {
                                    switch (intval($profesional->id_sub_tipo_especialidad))
                                    {
                                        case 109: // 109	Laboratorio Radiología
                                            break;
                                        case 110: // 110	Laboratorio clínico
                                            break;
                                        case 111: // 111	Laboratorio Anatomía Patológica
                                            break;
                                        case 112: // 112	Laboratorio Otorrinolaringología

                                            break;
                                        case 113: // 113	Laboratorio Oftalmología
                                            break;
                                        case 114: // 114	Laboratorio Cardiología
                                            break;
                                        case 115: // 115	Laboratorio Neurología
                                            break;
                                        case 116: // 116	Laboratorio Dental
                                            break;
                                        case 117: // 117	Laboratorio Citopatología
                                            break;
                                        case 118: // 118	Laboratorio Inmunología
                                            break;

                                    }
                                }
                                break;
                            case 54:// 54	TECNOLOGO ORL
                                break;
                        }
                    }

                    break;
                case 12: //ARSENALERÍA
                    if(!empty($profesional->id_tipo_especialidad))
                    {
                        switch (intval($profesional->id_tipo_especialidad))
                        {
                            case 49:// 49	ARSENALERÍA QUIRÚRGICA
                                break;
                            case 50:// 50	ARSENALERÍA OBSTÉTRICA
                                break;
                        }
                    }
                    break;
                default:
                    /** FICHAS DE ATENCIONES PREVIAS */
                    $filtro_previas = array();
                    $filtro_previas[] = array('id_paciente', $paciente->id);
                    $filtro_previas[] = array('confidencial', '0');
                    $filtro_previas[] = array('finalizada', 1);
                    $filtro_previas[] = array('id_profesional', $profesional->id);
                    $ficha_previas = FichaAtencion::where($filtro_previas)->get();

                    $datos['ficha_previas'] = $ficha_previas;


                    /** FICHA ATENCION ACTUAL */
                    if(empty($hora->id_ficha_atencion))
                    {
                        $nueva_ficha_atencion = new FichaAtencion();
                        $nueva_ficha_atencion->id_paciente = $paciente->id;
                        $nueva_ficha_atencion->id_profesional = $profesional->id;
                        $nueva_ficha_atencion->id_lugar_atencion = $hora->id_lugar_atencion;

                        if ($nueva_ficha_atencion->save())
                        {
                            $hora->id_estado = 5;
                            $hora->fecha_realizacion_consulta = now();
                            $hora->id_ficha_atencion = $nueva_ficha_atencion->id;
                            $hora->save();
                            $ficha_actual_nueva = $nueva_ficha_atencion;
                        }
                        else
                        {
                            $nueva_ficha_atencion = '';
                        }
                    }
                    else
                    {
                        $filtro_fichaAtencion = array();
                        $filtro_fichaAtencion[] = array('id_paciente', $paciente->id);
                        $filtro_fichaAtencion[] = array('id', $hora->id_ficha_atencion);
                        $ficha_actual_nueva = FichaAtencion::where($filtro_fichaAtencion)->first();
                    }

                    $datos['id_ficha_actual_nueva'] = $ficha_actual_nueva->id;
                    $datos['ficha_actual_nueva'] = $ficha_actual_nueva;


                    break;
            }

            $datos['estado'] = 1;
            $datos['msj'] = 'registros';

        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campo requerido';
            $datos['error'] = $error;
        }


        return (object)$datos;
    }

    public function dameProcedimientosImplantes($id_paciente, $id_profesional,$id_ficha_atencion, $tipo = null){
        if($tipo == null){
            $procedimientos = ProcedimientosImplantes::select('procedimientos_implantes.*', 'odontogramas_pacientes.tratamiento', 'odontogramas_pacientes.id as id_procedimiento')
            ->where('procedimientos_implantes.id_paciente',$id_paciente)
            ->where('procedimientos_implantes.id_profesional', $id_profesional)
            ->where('procedimientos_implantes.id_ficha_atencion', $id_ficha_atencion)
            ->leftjoin('odontogramas_pacientes', 'odontogramas_pacientes.id', '=', 'procedimientos_implantes.id_procedimiento')
            ->get();
        }else{
            $procedimientos = ProcedimientosPostImplantes::select('procedimientos_post_implantes.*', 'odontogramas_pacientes.tratamiento', 'odontogramas_pacientes.id as id_procedimiento')
            ->where('procedimientos_post_implantes.id_paciente',$id_paciente)
            ->where('procedimientos_post_implantes.id_profesional', $id_profesional)
            ->where('procedimientos_post_implantes.id_ficha_atencion', $id_ficha_atencion)
            ->leftjoin('odontogramas_pacientes', 'odontogramas_pacientes.id', '=', 'procedimientos_post_implantes.id_procedimiento')
            ->get();
        }

        return $procedimientos;
    }

    public function dameProcedimientosImplantesRehab($id_paciente, $id_profesional, $id_ficha_atencion, $tipo = null){
        if($tipo == null){
            $procedimientos = ProcedimientosImplantesRehab::select('procedimientos_implantes_rehab.*', 'odontogramas_pacientes.tratamiento', 'odontogramas_pacientes.id as id_procedimiento')
            ->where('procedimientos_implantes_rehab.id_paciente',$id_paciente)
            ->where('procedimientos_implantes_rehab.id_profesional', $id_profesional)
            ->where('procedimientos_implantes_rehab.id_ficha_atencion', $id_ficha_atencion)
            ->leftjoin('odontogramas_pacientes', 'odontogramas_pacientes.id', '=', 'procedimientos_implantes_rehab.id_procedimiento')
            ->get();
        }else{
            $procedimientos = ProcedimientosImplantesRehab::select('procedimientos_post_implantes.*', 'odontogramas_pacientes.tratamiento', 'odontogramas_pacientes.id as id_procedimiento')
            ->where('procedimientos_post_implantes.id_paciente',$id_paciente)
            ->where('procedimientos_post_implantes.id_profesional', $id_profesional)
            ->where('procedimientos_post_implantes.id_ficha_atencion', $id_ficha_atencion)
            ->leftjoin('odontogramas_pacientes', 'odontogramas_pacientes.id', '=', 'procedimientos_post_implantes.id_procedimiento')
            ->get();
        }

        return $procedimientos;
    }

    public function dameProcedimientosGruposImplantes($id_paciente, $id_profesional, $tipo = null){
        if($tipo == null){
            $procedimientos = ProcedimientosGruposImplantes::where('id_paciente',$id_paciente)->where('id_profesional', $id_profesional)->get();
        }else{
            $procedimientos = ProcedimientosGruposPostImplantes::where('id_paciente',$id_paciente)->where('id_profesional', $id_profesional)->get();
            foreach($procedimientos as $p){
                $p->grupo_piezas = json_decode($p->grupo_piezas);
            }
        }

        return $procedimientos;
    }

    public function dameTratamientosBocaGeneral($id_ficha_atencion, $total = null)
    {
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        if($profesional->id_tipo_especialidad !== 16){
        $examenes = ExamenesBocaGeneral::select('examenes_boca_general.*', 'diagnosticos_dental.valor','tratamientos_dental.descripcion')
            ->leftjoin('diagnosticos_dental', 'examenes_boca_general.diagnostico_tratamiento', '=', 'diagnosticos_dental.descripcion')
            ->join('tratamientos_dental','examenes_boca_general.diagnostico','tratamientos_dental.id')
            ->where('examenes_boca_general.id_ficha_atencion', $id_ficha_atencion)
            ->get();
        }else{
            $examenes = ExamenesBocaGeneral::select('examenes_boca_general.*', 'tratamientos_implantologia.valor','tratamientos_dental.descripcion')
            ->join('tratamientos_implantologia', 'examenes_boca_general.diagnostico_tratamiento', '=', 'tratamientos_implantologia.descripcion')
            ->join('tratamientos_dental','examenes_boca_general.diagnostico','tratamientos_dental.id')
            ->where('examenes_boca_general.id_ficha_atencion', $id_ficha_atencion)
            ->get();
        }


        // Si quieres retornar también el total general, puedes incluirlo así:
        // return ['examenes' => $examenes, 'total_gral' => $total_gral];

        return $examenes;
    }

}
