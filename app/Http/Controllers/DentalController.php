<?php



namespace App\Http\Controllers;



use App\Http\Controllers\Controller;
use App\Models\AnestesiaPaciente;
use App\Models\AntecedenteAnestesiaPaciente;
use App\Models\AntecedenteFracturaPaciente;
use App\Models\AntecedenteHemorragiaPaciente;
use App\Models\Articulo;
use App\Models\Asistente;
use App\Models\Biopsia;
use App\Models\Bono;
use App\Models\CertificadoReposo;
use App\Models\Ciudad;
use App\Models\ConstanciaGes;
use App\Models\ControlBocaCompleta;
use App\Models\ControlEndodonciaPaciente;
use App\Models\ControlEnvioLaboratorio;
use App\Models\ControlMaxilarInferior;
use App\Models\ControlMaxilarSuperior;
use App\Models\ControlObesidad;
use App\Models\Correlativos;
use App\Models\DeclaracionEno;
use App\Models\DetalleReceta;
use App\Imports\DiagnosticosDentalImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\DiagnosticosPsicologicosImport;
use App\Models\Diabete;
use App\Models\DiagnosticoCie;
use App\Models\DiagnosticosDental;
use App\Models\DiagnosticosDentalProfesional;
use App\Models\Direccion;
use App\Models\EmpresasConvenios;
use App\Models\EndodonciaPaciente;
use App\Models\EvolucionOdontologiaGral;
use App\Models\ExamenMedico;
use App\Models\ExamenPPF;
use App\Models\ExamenesBocaGeneral;
use App\Models\ExamenRadiologico;
use App\Models\ExamenesDentalPieza;
use App\Models\ficha_dentalAtencion;
use App\Models\FichaAtencionDental;
use App\Models\FichaAtencion;
use App\Models\FichaOdontopediatria;
use App\Models\GastoMedico;
use App\Models\Hipertension;
use App\Models\HoraMedica;
use App\Models\InformeMedico;
use App\Models\Instituciones;
use App\Models\IngresoPacienteCirugia;
use App\Models\Interconsulta;
use App\Models\InsumosTratamientosDental;
use App\Models\Laboratorio;
use App\Models\LugarAtencion;
use App\Models\MarcasImplantes;
use App\Models\MaterialesImplantologia;
use App\Models\MaterialesInsumosPaciente;
use App\Models\MedicamentoUsoCronicoExterno;
use App\Models\MotivoConsultas;
use App\Models\OdontogramaPaciente;
use App\Models\OrdenTrabajoMayor;
use App\Models\OrdenTrabajoMenor;
use App\Models\Paciente;
use App\Models\PacienteExterno;
use App\Models\PagosPresupuestoDental;
use App\Models\PagosUrgenciaDental;
use App\Models\PedidoInsumos;
use App\Models\PedidoMateriales;
use App\Models\PiezaPeriodontograma;
use App\Models\PresupuestosDental;
use App\Models\PrestacionesLaboratorio;
use App\Models\Prevision;
use App\Models\Profesional;
use App\Models\ProfesionalHorario;
use App\Models\ProtocoloOperatorioCirugia;
use App\Models\RecetaDosis;
use App\Models\RecetaPresentacion;
use App\Models\Region;
use App\Models\SolicitudPabellonQuirurgico;
use App\Models\TratamientosImplantologia;
use App\Models\TratamientosRehabImplantologia;
use App\Models\User;

use Carbon\Carbon;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use PDF;



class DentalController extends Controller

{



    //INICIO Cirugia Dental

    public function index_cirugia_dental()

    {



        $paciente = Paciente::where('id', 3)->first();

        $ficha_dental = FichaAtencionDental::where('id_paciente', $paciente->id)->first();

        $regiones = Region::all();

        $ciudades = Ciudad::where('id_region', $paciente->Direccion()->first()->Ciudad()->first()->id_region)->get();

        $laboratorios = Laboratorio::all();

        $user = Auth::user()->id;

        $profesional = Profesional::where('id_usuario', $user)->first();



        $lugar_atencion = LugarAtencion::where('id', 1)->first();

        $prevision = Prevision::all();

        $examenMedico = ExamenMedico::where('cod_parent', 0)->get();

        $examen_radiologico = ExamenRadiologico::count();

        $lugares_atenciones = LugarAtencion::all();



        if ($examen_radiologico == 0) {

            $examen_radiologico = 1;

        } else {

            $examen_radiologico = DB::table('examenes_radiologicos')->orderBy('id', 'desc')->first()->id + 1;

        }





        return view('app.dental.index_cirugia_dental')->with(

            [

                'paciente' => $paciente,

                'regiones' => $regiones,

                'ciudades' => $ciudades,

                'ficha' => $ficha_dental,

                'laboratorios' => $laboratorios,

                'profesional' => $profesional,

                'examen_radiologico' => $examen_radiologico,

                'lugar_atencion' => $lugar_atencion,

                'prevision' => $prevision,

                'examenMedico' => $examenMedico,

                'lugares_atenciones' => $lugares_atenciones



            ]

        );

    }



    public function registrar_solicitud_pabellon_quirurgico(Request $request)

    {

        $user = Auth::user()->id;

        $profesional = Profesional::where('id_usuario', $user)->first();



        $solicitud_pabellon = new SolicitudPabellonQuirurgico();



        $solicitud_pabellon->patalogias_cronicas = $request->patologias_cronicas_pabellon;

        $solicitud_pabellon->diagnostico_preoperatorio = $request->diagnositco_preoperatorio_pabellon;

        $solicitud_pabellon->operacion = $request->operacion_pabellon;

        $solicitud_pabellon->codigo_cirugia = $request->codigo_cirugia_pabellon;

        $solicitud_pabellon->anestesia = $request->anestesia_pabellon;

        $solicitud_pabellon->tipo_hospitalizacion = $request->tipo_hospitalizacion_pabellon;

        $solicitud_pabellon->grado_urgencia = $request->grado_urgencia_pabellon;

        $solicitud_pabellon->cirujano = $request->cirujano_pabellon;

        $solicitud_pabellon->ayudante1 = $request->ayudante_uno_pabellon;

        $solicitud_pabellon->ayudante2 = $request->ayudante_dos_pabellon;

        $solicitud_pabellon->anestesista = $request->anestesista_pabellon;

        $solicitud_pabellon->arsenaleria = $request->arsenaleria_pabellon;

        $solicitud_pabellon->equipamiento_especial = $request->equipamiento_especial_pabellon;

        $solicitud_pabellon->instrumental_especial = $request->instrumental_especial_pabellon;

        $solicitud_pabellon->insumos_especiales = $request->insumos_especial_pabellon;

        $solicitud_pabellon->codigo_cirugia_2 = $request->codigo_cirugia_dos_pabellon;

        $solicitud_pabellon->anestesia_2 = $request->anestesia_dos_pabellon;

        $solicitud_pabellon->tipo_hospitalizacion_2 = $request->tipo_hospitalizacion_dos_pabellon;

        $solicitud_pabellon->grado_urgencia_2 = $request->grado_cirugia_dos_pabellon;

        $solicitud_pabellon->especialidad_1 = $request->especialidad_uno_pabellon;

        $solicitud_pabellon->especialidad_2 = $request->especialidad_dos_pabellon;

        $solicitud_pabellon->comentarios = $request->comentarios_pabellon;

        $solicitud_pabellon->id_paciente = $request->paciente_quirurgico_dental;

        $solicitud_pabellon->id_profesional = $profesional->id;

        //$solicitud_pabellon->id_ficha_atencion = $request->;

        $solicitud_pabellon->id_lugar_atencion = $request->lugar_atencion_pabellon;



        if (!$solicitud_pabellon->save()) {

            return back();

        }

        $mensaje = 'Se ha agregado solicitud de pabellon de forma exitosa';



        return redirect()->back()->with('mensaje', $mensaje);

    }



    public function registrar_ingreso_paciente_cirugia(Request $request)

    {

        $user = Auth::user()->id;

        $profesional = Profesional::where('id_usuario', $user)->first();



        $ingreso_paciente = new IngresoPacienteCirugia();



        $ingreso_paciente->anamnesis = $request->anamnesis_ingreso_cirugia_dental;

        $ingreso_paciente->antecedentes_examenes_fisicos = $request->antecedentes_examenes_ingreso_cirugia_dental;

        $ingreso_paciente->hipotesis_diagnostica = $request->hipotesis_diagnostica_ingreso_cirugia_dental;

        $ingreso_paciente->diagnostico_cie10 = $request->diagnostico_cie_ingreso_cirugia_dental;

        $ingreso_paciente->indicaciones_ingreso = $request->indicaciones_ingreso_cirugia_dental;

        $ingreso_paciente->hora_operacion = $request->hora_ingreso_cirugia_dentalhora_ingreso_cirugia_dental;

        $ingreso_paciente->hospitalizar_en = $request->hospitalizar_en_cirugia_dental;

        $ingreso_paciente->tipo_sala = $request->tipo_sala_cirugia_dental;



        $ingreso_paciente->id_paciente = $request->paciente_ingreso_cirugia_dental;

        $ingreso_paciente->id_profesional = $profesional->id;

        // $ingreso_paciente->id_lugar_atencion = $request->lugar_atencion_pabellon;



        if (!$ingreso_paciente->save()) {

            return back();

        }

        $mensaje = 'Se ha agregado ingreso de paciente de forma exitosa';



        return redirect()->back()->with('mensaje', $mensaje);

    }



    public function registrar_protocolo_operatorio(Request $request)

    {

        $user = Auth::user()->id;

        $profesional = Profesional::where('id_usuario', $user)->first();



        $protocolo_operatorio = new ProtocoloOperatorioCirugia();



        $protocolo_operatorio->nro_pabellon = $request->nro_pabellon_protocolo_operatorio_dental;

        $protocolo_operatorio->inicio_operacion = $request->inicio_operacion_protocolo_operatorio_dental;

        $protocolo_operatorio->fin_operacion = $request->fin_operacion_protocolo_operatorio_dental;

        $protocolo_operatorio->diagnostico_preoperatorio = $request->diag_preoperatorio_protocolo_operatorio_dental;

        $protocolo_operatorio->diagnostico_postoperatorio = $request->diag_postoperatorio_protocolo_operatorio_dental;

        $protocolo_operatorio->codigo_cirugia = $request->codigo_cirugia_protocolo_operatorio_dental;

        $protocolo_operatorio->anestesia = $request->anestesia_protocolo_operatorio_dental;

        $protocolo_operatorio->cirujano = $request->cirujano_protocolo_operatorio_dental;

        $protocolo_operatorio->ayudantes = $request->ayudantes_protocolo_operatorio_dental;

        $protocolo_operatorio->anestesistas_ayudantes_anestesia = $request->anestesias_ayudantes_protocolo_operatorio_dental;

        $protocolo_operatorio->arsenaleria = $request->arsenaleria_protocolo_operatorio_dental;

        $protocolo_operatorio->biopsia_rapida = $request->biopsia_rapida_protocolo_operatorio_dental;

        $protocolo_operatorio->biopsia_diferida = $request->biopsia_diferida_protocolo_operatorio_dental;

        $protocolo_operatorio->biopsia_nro_muestras = $request->biopsia_nro_muestra_protocolo_operatorio_dental;

        $protocolo_operatorio->biopsia_patologo = $request->biopsia_patologo_protocolo_operatorio_dental;

        $protocolo_operatorio->nombre_operacion = $request->nombre_operacion_protocolo_operatorio_dental;

        $protocolo_operatorio->material_hemostasia = $request->material_hemostasia_protocolo_operatorio_dental;

        $protocolo_operatorio->material_cierre = $request->material_cierre_protocolo_operatorio_dental;

        $protocolo_operatorio->otros_implantes = $request->otros_materiales_protocolo_operatorio_dental;

        $protocolo_operatorio->descripcion_cirugia = $request->descripcion_cirugia_protocolo_operatorio_dental;

        $protocolo_operatorio->farmacos = $request->farmacos_protocolo_operatorio_dental;

        $protocolo_operatorio->pulso_presion_arterial = $request->pulso_presion_protocolo_operatorio_dental;

        $protocolo_operatorio->incidentes = $request->incidentes_protocolo_operatorio_dental;

        $protocolo_operatorio->recuperacion_anestesia = $request->recuperacion_anestesia_protocolo_operatorio_dental;

        $protocolo_operatorio->descripcion_anestesia = $request->descripcion_anestesia_protocolo_operatorio_dental;

        $protocolo_operatorio->incidencias = $request->descripcion_incidencia_protocolo_operatorio_dental;

        $protocolo_operatorio->destino_paciente = $request->destino_protocolo_operatorio_dental;

        $protocolo_operatorio->indicaciones_postoperacion = $request->indicaciones_postoperacion_protocolo_operatorio_dental;



        $protocolo_operatorio->id_paciente = $request->paciente_protocolo_operatorio_dental;

        $protocolo_operatorio->id_profesional = $profesional->id;

        //$protocolo_operatorio->id_ficha_atencion = $request->;

        $protocolo_operatorio->id_lugar_atencion = $request->lugar_atencion_protocolo_operatorio_dental;



        if (!$protocolo_operatorio->save()) {

            return back();

        }

        $mensaje = 'Se ha agregado solicitud de pabellon de forma exitosa';



        return redirect()->back()->with('mensaje', $mensaje);

    }



    public function registrar_epicrisis_carnet_cirugia(Request $request)

    {

        $user = Auth::user()->id;

        $profesional = Profesional::where('id_usuario', $user)->first();



        $epicrisis_carnet = new IngresoPacienteCirugia();



        $epicrisis_carnet->inicio_hospitalizacion = $request->fecha_inicio_epicrisis_carnet_cirugia_dental;

        $epicrisis_carnet->fin_hospitalizacion = $request->fecha_termino_epicrisis_carnet_cirugia_dental;

        $epicrisis_carnet->diagnostico_ingreso = $request->diagnostico_ingreso_epicrisis_carnet_cirugia_dental;

        $epicrisis_carnet->diagnostico_alta = $request->diagnostico_alta_epicrisis_carnet_cirugia_dental;

        $epicrisis_carnet->tratamientos_cirugias = $request->tratamiento_cirugia_epicrisis_carnet_cirugia_dental;

        $epicrisis_carnet->procedimientos_quirurgicos_cirugia = $request->procedimiento_quirurgico_cirugia_epicrisis_carnet_cirugia_dental;

        $epicrisis_carnet->otros_tratamientos_procedimientos = $request->otro_procedimiento_tratamiento_cirugia_epicrisis_carnet_cirugia_dental;

        $epicrisis_carnet->tratamientos_controles = $request->tratamiento_control_cirugia_epicrisis_carnet_cirugia_dental;

        $epicrisis_carnet->procedimientos_quirurgicos_controles = $request->procedimiento_control_cirugia_epicrisis_carnet_cirugia_dental;

        $epicrisis_carnet->fecha_control = $request->fecha_control_alta_epicrisis_carnet_cirugia_dental;

        $epicrisis_carnet->indicaciones_alta = $request->indicaciones_alta_epicrisis_carnet_cirugia_dental;

        $epicrisis_carnet->id_paciente = $request->paciente_ingreso_epicrisis_carnet_cirugia_dental;
        $epicrisis_carnet->id_profesional = $profesional->id;
        $epicrisis_carnet->id_lugar_atencion = $request->lugar_atencion_pabellon;

        if (!$epicrisis_carnet->save()) {
            return back();
        }

        $mensaje = 'Se ha agregado ingreso de paciente de forma exitosa';

        return redirect()->back()->with('mensaje', $mensaje);

    }



    public function registrar_evolucion_recuperacion_cirugia(Request $request)

    {

        $user = Auth::user()->id;

        $profesional = Profesional::where('id_usuario', $user)->first();



        $ingreso_paciente = new IngresoPacienteCirugia();



        $ingreso_paciente->anamnesis = $request->anamnesis_ingreso_cirugia_dental;

        $ingreso_paciente->antecedentes_examenes_fisicos = $request->antecedentes_examenes_ingreso_cirugia_dental;

        $ingreso_paciente->hipotesis_diagnostica = $request->hipotesis_diagnostica_ingreso_cirugia_dental;

        $ingreso_paciente->diagnostico_cie10 = $request->diagnostico_cie_ingreso_cirugia_dental;

        $ingreso_paciente->indicaciones_ingreso = $request->indicaciones_ingreso_cirugia_dental;

        $ingreso_paciente->hora_operacion = $request->hora_ingreso_cirugia_dentalhora_ingreso_cirugia_dental;

        $ingreso_paciente->hospitalizar_en = $request->hospitalizar_en_cirugia_dental;

        $ingreso_paciente->tipo_sala = $request->tipo_sala_cirugia_dental;



        $ingreso_paciente->id_paciente = $request->paciente_ingreso_cirugia_dental;

        $ingreso_paciente->id_profesional = $profesional->id;

        // $ingreso_paciente->id_lugar_atencion = $request->lugar_atencion_pabellon;



        if (!$ingreso_paciente->save()) {

            return back();

        } else {

            if ($request->medicamentos == '' && $request->examenes == '') {

                return back()->with('mensaje', 'ficha medica guardada de forma correcta');

            } else {

                $examenes = json_decode($request->examenes);



                if (!$examenes == null) {

                    for ($i = 0; $i < count($examenes); ++$i) {

                        $examen = new ExamenPPF();

                        $examen->examen = $examenes[$i]->nombre_examen;

                        $examen->tipo_examen = $examenes[$i]->tipo;



                        switch ($examenes[$i]->prioridad) {

                            case 'Baja':

                                $examen->id_prioridad = 1;

                                break;

                            case 'Media':

                                $examen->id_prioridad = 2;

                                break;

                            case 'Alta':

                                $examen->id_prioridad = 3;

                                break;

                            case 'Urgente':

                                $examen->id_prioridad = 4;

                                break;

                        }



                        $examen->id_prioridad = 2;

                        $examen->id_profesional = $id_profesional;

                        $examen->id_ficha_atencion = $ficha->id;

                        $examen->id_paciente = $id_paciente;



                        if (!$examen->save()) {

                            return 'error';

                        }

                    }

                }



                $medicamentos = json_decode($request->medicamentos);



                for ($i = 0; $i < count($medicamentos); ++$i) {

                    //dd($medicamentos);

                    $detalle_receta = new DetalleReceta();

                    $detalle_receta->frecuencia = $medicamentos[$i]->frecuencia;

                    $detalle_receta->periodo = $medicamentos[$i]->periodo;

                    $detalle_receta->comentario = $medicamentos[$i]->comentario;

                    $detalle_receta->presentacion = $medicamentos[$i]->presentacion;

                    $detalle_receta->dosis = $medicamentos[$i]->dosis;

                    $detalle_receta->producto = $medicamentos[$i]->medicamento;

                    $detalle_receta->id_ficha = $ficha->id;

                    $detalle_receta->receta = $ficha->id;

                    $detalle_receta->estado = 1;



                    if (!$detalle_receta->save()) {

                        return 'error';

                    }

                }



                return ['mensaje', 'ficha medica guardada de forma correcta'];

            }

        }





        $mensaje = 'Se ha agregado ingreso de paciente de forma exitosa';



        return redirect()->back()->with('mensaje', $mensaje);

    }



    //FIN Cirugia Dental





    public function index()

    {



        $paciente = Paciente::where('id', 3)->first();

        $ficha_dental = FichaAtencionDental::where('id_paciente', $paciente->id)->first();

        $regiones = Region::all();

        $ciudades = Ciudad::where('id_region', $paciente->Direccion()->first()->Ciudad()->first()->id_region)->get();

        $laboratorios = Laboratorio::all();

        $user = Auth::user()->id;

        $profesional = Profesional::where('id_usuario', $user)->first();



        $lugar_atencion = LugarAtencion::where('id', 1)->first();

        $prevision = Prevision::all();

        $examenMedico = ExamenMedico::where('cod_parent', 0)->get();


        $examen_radiologico = ExamenRadiologico::count();


        if ($examen_radiologico == 0) {

            $examen_radiologico = 1;

        } else {

            $examen_radiologico = DB::table('examenes_radiologicos')->orderBy('id', 'desc')->first()->id + 1;

        }


        $anestesias_paciente = AntecedenteAnestesiaPaciente::where('id_paciente', $paciente->id)->get();

        $fracturas_paciente = AntecedenteFracturaPaciente::where('id_paciente', $paciente->id)->get();

        $hemorragias_paciente = AntecedenteHemorragiaPaciente::where('id_paciente', $paciente->id)->get();

        return view('app.dental.index_dental')->with(

            [

                'paciente' => $paciente,

                'regiones' => $regiones,

                'ciudades' => $ciudades,

                'ficha' => $ficha_dental,

                'laboratorios' => $laboratorios,

                'profesional' => $profesional,

                'examen_radiologico' => $examen_radiologico,

                'lugar_atencion' => $lugar_atencion,

                'prevision' => $prevision,

                'examenMedico' => $examenMedico,

                'anestesias_paciente' => $anestesias_paciente,

                'fracturas_paciente' => $fracturas_paciente,

                'hemorragias_paciente' => $hemorragias_paciente



            ]

        );

    }



    public function tab_examenes_paciente()

    {

        return view('app.dental.secciones_ficha.examenes_paciente');

    }



    public function index_endodoncia()

    {



        $paciente = Paciente::where('id', 3)->first();

        $ficha_dental = FichaAtencionDental::where('id_paciente', $paciente->id)->first();

        $regiones = Region::all();

        $ciudades = Ciudad::where('id_region', $paciente->Direccion()->first()->Ciudad()->first()->id_region)->get();

        $laboratorios = Laboratorio::all();

        $user = Auth::user()->id;

        $profesional = Profesional::where('id_usuario', $user)->first();



        $lugar_atencion = LugarAtencion::where('id', 1)->first();

        $prevision = Prevision::all();

        $examenMedico = ExamenMedico::where('cod_parent', 0)->get();

        $control_endodoncias = ControlEndodonciaPaciente::where('id_paciente', $paciente->id)->get();







        $examen_radiologico = ExamenRadiologico::count();



        if ($examen_radiologico == 0) {

            $examen_radiologico = 1;

        } else {

            $examen_radiologico = DB::table('examenes_radiologicos')->orderBy('id', 'desc')->first()->id + 1;

        }





        return view('app.dental.index_endodoncia')->with(

            [

                'paciente' => $paciente,

                'regiones' => $regiones,

                'ciudades' => $ciudades,

                'ficha' => $ficha_dental,

                'laboratorios' => $laboratorios,

                'profesional' => $profesional,

                'examen_radiologico' => $examen_radiologico,

                'lugar_atencion' => $lugar_atencion,

                'prevision' => $prevision,

                'examenMedico' => $examenMedico,

                'control_endodoncias' => $control_endodoncias

            ]

        );

    }



    public function index_dental_infantil()

    {



        $paciente = Paciente::where('id', 3)->first();

        $ficha_dental = FichaAtencionDental::where('id_paciente', $paciente->id)->first();

        $regiones = Region::all();

        $ciudades = Ciudad::where('id_region', $paciente->Direccion()->first()->Ciudad()->first()->id_region)->get();

        $laboratorios = Laboratorio::all();

        $user = Auth::user()->id;

        $profesional = Profesional::where('id_usuario', $user)->first();



        $lugar_atencion = LugarAtencion::where('id', 1)->first();

        $prevision = Prevision::all();

        $examenMedico = ExamenMedico::where('cod_parent', 0)->get();

        $anestesias_paciente = AntecedenteAnestesiaPaciente::where('id_paciente', $paciente->id)->get();

        $fracturas_paciente = AntecedenteFracturaPaciente::where('id_paciente', $paciente->id)->get();

        $hemorragias_paciente = AntecedenteHemorragiaPaciente::where('id_paciente', $paciente->id)->get();



        $examen_radiologico = ExamenRadiologico::count();



        if ($examen_radiologico == 0) {

            $examen_radiologico = 1;

        } else {

            $examen_radiologico = DB::table('examenes_radiologicos')->orderBy('id', 'desc')->first()->id + 1;

        }





        return view('app.dental.index_dental_infantil')->with(

            [

                'paciente' => $paciente,

                'regiones' => $regiones,

                'ciudades' => $ciudades,

                'ficha' => $ficha_dental,

                'laboratorios' => $laboratorios,

                'profesional' => $profesional,

                'examen_radiologico' => $examen_radiologico,

                'lugar_atencion' => $lugar_atencion,

                'prevision' => $prevision,

                'examenMedico' => $examenMedico,

                'anestesias_paciente' => $anestesias_paciente,

                'fracturas_paciente' => $fracturas_paciente,

                'hemorragias_paciente' => $hemorragias_paciente

            ]

        );

    }



    public function registrar_maxilar_superior_infantil(Request $request)

    {

        $user = Auth::user()->id;

        $profesional = Profesional::where('id_usuario', $user)->first();



        $maxilar_superior = new ControlMaxilarSuperior();

        $maxilar_superior->procedimiento = $request->procedimiento_infantil_maxilar_superior;

        $maxilar_superior->comentario = $request->comentarios_infantil_maxilar_superior;

        if ($request->terminado_infantil_maxilar_superior == 'on') {

            $maxilar_superior->terminado = 1;

        } else {

            $maxilar_superior->terminado = 0;

        }

        $maxilar_superior->id_paciente = $request->id_paciente_maxilar_superior;

        $maxilar_superior->id_profesional = $profesional->id;



        if (!$maxilar_superior->save()) {

            return back()->with('messagge', 'error');

        }



        if ($request->agendar_hora_infantil_maxilar_superior == 'on') {



            //$profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

            $horas_medicas = HoraMedica::where('id_profesional', $profesional->id)->get();

            $horario = ProfesionalHorario::where('id_profesional', $profesional->id)->get();



            $horario_agenda = '0,1,2,3,4,5,6';

            foreach ($horario as $hor) {

                $ho = explode(',', $hor->dia);

                foreach ($ho as $h) {

                    if ($h == '0') {

                        $horario_agenda = str_replace($h, '', $horario_agenda);

                    } else {

                        $horario_agenda = str_replace(',' . $h, '', $horario_agenda);

                    }

                }

            }

            $horario_agenda = ltrim($horario_agenda, ',');



            $prevision = Prevision::all();

            $region = Region::all();



            return view('app.profesional.agenda')->with(['horas_medicas' => $horas_medicas, 'horario' => $horario, 'horario_agenda' => $horario_agenda, 'prevision' => $prevision, 'region' => $region]);

        } else {

            return redirect()->back()->with('message', 'registro exitoso');

        }

    }





    public function registrar_maxilar_inferior_infantil(Request $request)

    {

        $user = Auth::user()->id;

        $profesional = Profesional::where('id_usuario', $user)->first();



        $maxilar_inferior = new ControlMaxilarInferior();

        $maxilar_inferior->procedimiento = $request->procedimiento_infantil_maxilar_inferior;

        $maxilar_inferior->comentario = $request->comentarios_infantil_maxilar_inferior;

        if ($request->terminado_infantil_maxilar_inferior == 'on') {

            $maxilar_inferior->terminado = 1;

        } else {

            $maxilar_inferior->terminado = 0;

        }

        $maxilar_inferior->id_paciente = $request->id_paciente_maxilar_inferior;

        $maxilar_inferior->id_profesional = $profesional->id;



        if (!$maxilar_inferior->save()) {

            return back()->with('messagge', 'error');

        }



        if ($request->agendar_hora_infantil_maxilar_inferior == 'on') {



            //$profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

            $horas_medicas = HoraMedica::where('id_profesional', $profesional->id)->get();

            $horario = ProfesionalHorario::where('id_profesional', $profesional->id)->get();



            $horario_agenda = '0,1,2,3,4,5,6';

            foreach ($horario as $hor) {

                $ho = explode(',', $hor->dia);

                foreach ($ho as $h) {

                    if ($h == '0') {

                        $horario_agenda = str_replace($h, '', $horario_agenda);

                    } else {

                        $horario_agenda = str_replace(',' . $h, '', $horario_agenda);

                    }

                }

            }

            $horario_agenda = ltrim($horario_agenda, ',');



            $prevision = Prevision::all();

            $region = Region::all();



            return view('app.profesional.agenda')->with(['horas_medicas' => $horas_medicas, 'horario' => $horario, 'horario_agenda' => $horario_agenda, 'prevision' => $prevision, 'region' => $region]);

        } else {

            return redirect()->back()->with('message', 'registro exitoso');

        }

    }



    public function registrar_boca_completa_infantil(Request $request)

    {

        $user = Auth::user()->id;

        $profesional = Profesional::where('id_usuario', $user)->first();



        $boca_completa = new ControlBocaCompleta();

        $boca_completa->procedimiento = $request->procedimiento_infantil_boca_completa;

        $boca_completa->comentario = $request->comentarios_infantil_boca_completa;

        if ($request->terminado_infantil_boca_completa == 'on') {

            $boca_completa->terminado = 1;

        } else {

            $boca_completa->terminado = 0;

        }

        $boca_completa->id_paciente = $request->id_paciente_boca_completa;

        $boca_completa->id_profesional = $profesional->id;



        if (!$boca_completa->save()) {

            return back()->with('messagge', 'error');

        }



        if ($request->agendar_hora_infantil_maxilar_inferior == 'on') {



            //$profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

            $horas_medicas = HoraMedica::where('id_profesional', $profesional->id)->get();

            $horario = ProfesionalHorario::where('id_profesional', $profesional->id)->get();



            $horario_agenda = '0,1,2,3,4,5,6';

            foreach ($horario as $hor) {

                $ho = explode(',', $hor->dia);

                foreach ($ho as $h) {

                    if ($h == '0') {

                        $horario_agenda = str_replace($h, '', $horario_agenda);

                    } else {

                        $horario_agenda = str_replace(',' . $h, '', $horario_agenda);

                    }

                }

            }

            $horario_agenda = ltrim($horario_agenda, ',');



            $prevision = Prevision::all();

            $region = Region::all();



            return view('app.profesional.agenda')->with(['horas_medicas' => $horas_medicas, 'horario' => $horario, 'horario_agenda' => $horario_agenda, 'prevision' => $prevision, 'region' => $region]);

        } else {

            return redirect()->back()->with('message', 'registro exitoso');

        }

    }



    public function registrar_odontograma_infantil(Request $request)

    {



        $user = Auth::user()->id;

        $profesional = Profesional::where('id_usuario', $user)->first();



        $odontograma =  new OdontogramaPaciente();



        if (isset($request->odontograma1) && $request->odontograma1 == 1) {



            $caras = $request->caraM_check_1 . '|';

            $caras = $caras . $request->caraO_check_1 . '|';

            $caras = $caras . $request->caraD_check_1 . '|';

            $caras = $caras . $request->carav_check_1 . '|';

            $caras = $caras . $request->caraP_check_1;



            $odontograma->diagnostico = $request->diagnostico_1;

            $odontograma->tratamiento = $request->tratamiento_1;

            $odontograma->caras = $caras;

            $odontograma->pieza = $request->pieza_odontograma_1;

            $odontograma->id_paciente = $request->paciente_atencion_dental_odon1;

            $odontograma->id_profesional = $profesional->id;



            if (!$odontograma->save()) {

                return back()->with('messagge', 'error');

            }

            $mensaje = 'Se ha agregado Odontograma a pieza 5.5 de forma exitosa';



            return redirect()->back()->with('mensaje', $mensaje);

        }



        if (isset($request->odontograma2) && $request->odontograma2 == 1) {



            $caras = $request->caraM_check_2 . '|';

            $caras = $caras . $request->caraO_check_2 . '|';

            $caras = $caras . $request->caraD_check_2 . '|';

            $caras = $caras . $request->carav_check_2 . '|';

            $caras = $caras . $request->caraP_check_2;





            $odontograma->diagnostico = $request->diagnostico_2;

            $odontograma->tratamiento = $request->tratamiento_2;

            $odontograma->caras = $caras;

            $odontograma->pieza = $request->pieza_odontograma_2;

            $odontograma->id_paciente = $request->paciente_atencion_dental_odon2;

            $odontograma->id_profesional = $profesional->id;



            if (!$odontograma->save()) {

                return back()->with('messagge', 'error');

            }

            $mensaje = 'Se ha agregado Odontograma a pieza' . $odontograma->pieza . ' de forma exitosa';



            return redirect()->back()->with('mensaje', $mensaje);

        }





        if (isset($request->odontograma3) && $request->odontograma3 == 1) {



            $caras = $request->caraM_check_3 . '|';

            $caras = $caras . $request->caraO_check_3 . '|';

            $caras = $caras . $request->caraD_check_3 . '|';

            $caras = $caras . $request->carav_check_3 . '|';

            $caras = $caras . $request->caraP_check_3;





            $odontograma->diagnostico = $request->diagnostico_3;

            $odontograma->tratamiento = $request->tratamiento_3;

            $odontograma->caras = $caras;

            $odontograma->pieza = $request->pieza_odontograma_3;

            $odontograma->id_paciente = $request->paciente_atencion_dental_odon3;

            $odontograma->id_profesional = $profesional->id;



            if (!$odontograma->save()) {

                return back()->with('messagge', 'error');

            }

            $mensaje = 'Se ha agregado Odontograma a pieza' . $odontograma->pieza . ' de forma exitosa';



            return redirect()->back()->with('mensaje', $mensaje);

        }





        if (isset($request->odontograma4) && $request->odontograma4 == 1) {



            $caras = $request->caraM_check_4 . '|';

            $caras = $caras . $request->caraO_check_4 . '|';

            $caras = $caras . $request->caraD_check_4 . '|';

            $caras = $caras . $request->carav_check_4 . '|';

            $caras = $caras . $request->caraP_check_4;





            $odontograma->diagnostico = $request->diagnostico_4;

            $odontograma->tratamiento = $request->tratamiento_4;

            $odontograma->caras = $caras;

            $odontograma->pieza = $request->pieza_odontograma_4;

            $odontograma->id_paciente = $request->paciente_atencion_dental_odon4;

            $odontograma->id_profesional = $profesional->id;



            if (!$odontograma->save()) {

                return back()->with('messagge', 'error');

            }

            $mensaje = 'Se ha agregado Odontograma a pieza' . $odontograma->pieza . ' de forma exitosa';



            return redirect()->back()->with('mensaje', $mensaje);

        }

    }



    public function registrar_odontograma(Request $request)
    {
        try {

            if($request->diagnostico == 0 || $request->tratamiento == null){
                return ['status' => 0 , 'mensaje' => 'Debe seleccionar un diagnostico y un tratamiento'];
            }
            $user = Auth::user()->id;
            $profesional = Profesional::where('id_usuario', $user)->first();

            $odontograma =  new OdontogramaPaciente();
            $posicion_pieza = $request->posicion_pieza;
            $cuadrante = $request->cuadrante;

            $value = $posicion_pieza .'_'. $cuadrante;

            $caras = '';
            if ($request->{'caraM'} == '1') {
                $caras .= 'M' . '|';
            }
            if ($request->{'caraO'} == '1') {
                $caras .= 'O' . '|';
            }
            if ($request->{'caraD'} == '1') {
                $caras .= 'D' . '|';
            }
            if ($request->{'caraV'} == '1') {
                $caras .= 'V' . '|';
            }
            if ($request->{'caraP'} == '1') {
                $caras .= 'P' . '|';
            }

            $odontograma->diagnostico = $request->diagnostico;
            $odontograma->tratamiento = $request->tratamiento;
            $odontograma->caras = $caras;
            $odontograma->pieza = $request->pieza;
            $odontograma->id_paciente = $request->id_paciente;
            $odontograma->id_profesional = $profesional->id;
            $odontograma->id_ficha_atencion = $request->id_ficha_atencion;
            $odontograma->id_lugar_atencion = $request->id_lugar_atencion;
            $odontograma->tipo_especialidad = $profesional->id_tipo_especialidad;
            $odontograma->fecha = Carbon::now()->format('Y-m-d H:m:s');
            $odontograma->estado = 0;

            if (!$odontograma->save()) {
                return ['status' => 0,'mensaje', 'Ocurrio un error al guardar el registro'];
            }

            $mensaje = 'Se ha agregado Odontograma a pieza '.$odontograma->pieza.' de forma exitosa';
            $odontograma_paciente = $this->dame_odontograma_paciente($request->id_paciente, $request->id_ficha_atencion, $request->id_lugar_atencion, $profesional->id_tipo_especialidad, $request->id_presupuesto);
            $odontograma_paciente_historial = $this->dame_odontograma_paciente_historial($request->id_paciente);
            $odontograma_paciente_vista = view('atencion_odontologica.generales.odontograma_adulto',['odontograma' => $odontograma_paciente_historial])->render();
            $valores = $this->dameValoresOdontograma($request->id_paciente, $request->id_ficha_atencion, $request->id_lugar_atencion, $profesional->id_tipo_especialidad);
            return ['status' => 1 ,'mensaje' => $mensaje, 'odontograma_paciente' => $odontograma_paciente,'valores' => $valores,'odontograma_paciente_vista' => $odontograma_paciente_vista];


        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function dameValoresOdontograma($id_paciente, $id_ficha_atencion, $id_lugar_atencion, $id_tipo_especialidad = null){
        $fichaController = new ficha_atencionController;
        $valores = $fichaController->dameValores($id_paciente, $id_ficha_atencion, $id_lugar_atencion, $id_tipo_especialidad);
        return $valores;
    }

    public function dame_odontograma_paciente($id_paciente, $id_ficha_atencion, $id_lugar_atencion, $tipo_especialidad,$id_presupuesto = null){
        $fichaController = new ficha_atencionController;
        $odontograma_paciente = $fichaController->dameOdontogramaPaciente($id_paciente, $id_ficha_atencion, $id_lugar_atencion, $tipo_especialidad,$id_presupuesto);
        return $odontograma_paciente;
    }

    public function dame_odontograma_paciente_historial($id_paciente){
        $fichaController = new ficha_atencionController;
        $odontograma_paciente = $fichaController->dameOdontogramaPacienteHistorial($id_paciente);
        return $odontograma_paciente;
    }

    public function eliminar_odontograma(Request $request){
        try {

            $ids = $request->ids;
            $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();

            $id_paciente = $request->id_paciente;
            $id_ficha_atencion = $request->id_ficha_atencion;
            $id_lugar_atencion = $request->id_lugar_atencion;
            foreach($ids as $id){
                $odontograma = OdontogramaPaciente::find($id);
                $odontograma->delete();
            }

            $mensaje = 'La pieza se ha eliminado del presupuesto de forma exitosa';
            $odontograma_paciente = $this->dame_odontograma_paciente($id_paciente, $id_ficha_atencion, $id_lugar_atencion, $profesional->id_tipo_especialidad);
            $odontograma_paciente_historial = $this->dame_odontograma_paciente_historial($id_paciente);

            $odontograma_paciente_vista = view('atencion_odontologica.generales.odontograma_adulto',['odontograma_historial' => $odontograma_paciente_historial])->render();
            if($request->tipo == 'odped'){
                $odontograma_paciente_vista = view('atencion_odontologica.generales.odontograma_pediatrico_completo',['odontograma_historial' => $odontograma_paciente_historial])->render();
            }
            $valores = $this->dameValoresOdontograma($id_paciente, $id_ficha_atencion, $id_lugar_atencion, $profesional->id_tipo_especialidad);
            return ['status' => 1 ,'mensaje' => $mensaje, 'odontograma_paciente' => $odontograma_paciente,'valores' => $valores, 'odontograma_paciente_vista' => $odontograma_paciente_vista,'odontograma_historial' => $odontograma_paciente_historial];

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function importarDiagnosticos(Request $request)
    {
        // Validar que el request tenga un archivo
        $request->validate([
            'archivo' => 'required|file',
        ]);

        // Importar los datos
        $diagnosticos = Excel::toArray(new DiagnosticosDentalImport, $request->file('archivo'));

        // Procesar únicamente las filas de la hoja 'ARANCEL DENTOLAB'
        // Procesar únicamente las filas de la hoja 'ARANCEL DENTOLAB'
        foreach ($diagnosticos['ARANCEL DENTOLAB'] as $row) {
            // Verificar que la fila tenga datos válidos en las columnas esperadas y que el valor sea numérico
            if (isset($row[0], $row[1]) && !is_null($row[0]) && is_numeric($row[1])) {
                // Crear y guardar el diagnóstico
                $diagnostico = new DiagnosticosDental();
                $diagnostico->descripcion = trim($row[0]); // Elimina espacios innecesarios
                $diagnostico->valor = $row[1];
                $diagnostico->estado = 1;
                $diagnostico->tipo_examen = 4;
                $diagnostico->save();
            }
        }

        return redirect()->back()->with('mensaje', 'Datos importados correctamente');
    }

    public function importar(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv'
        ]);

        Excel::import(new DiagnosticosPsicologicosImport, $request->file('file'));

        return back()->with('success', 'Diagnósticos importados correctamente.');
    }

    public function guardarDiagnosticoLaboratorio(Request $request){
        try {
            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

            // preguntar si existe el diagnóstico para el profesional
            $diagnostico = DiagnosticosDental::find($request->trabajo_id);

            $diagnostico->laboratorio = $request->existe_laboratorio;

            if($diagnostico->save()){
                $trabajos = DiagnosticosDental::where('tipo_examen',1)->orWhere('tipo_examen',2)->orWhere('tipo_examen',3)->get();
                $procedimientos = DiagnosticosDental::where('id_responsable',$profesional->id)->get();
                $mis_trabajos_profesional = DiagnosticosDentalProfesional::select('diagnosticos_dental_profesional.*','diagnosticos_dental.descripcion','diagnosticos_dental.uco','diagnosticos_dental.valor','diagnosticos_dental.tipo_examen','diagnosticos_dental.id_responsable','diagnosticos_dental.id as id_diagnostico')
                        ->join('diagnosticos_dental','diagnosticos_dental_profesional.id_diagnostico','=','diagnosticos_dental.id')
                        ->where('diagnosticos_dental_profesional.id_profesional', $profesional->id)
                        ->get();
                // Crear un array asociativo para un acceso más rápido
                $mis_trabajos_profesional_map = [];
                foreach ($mis_trabajos_profesional as $trabajo_profesional) {
                    $mis_trabajos_profesional_map[$trabajo_profesional->id_diagnostico] = $trabajo_profesional->laboratorio;
                }

                // Agregar el atributo 'laboratorio' a los trabajos
                foreach ($trabajos as $trabajo) {
                    if (isset($mis_trabajos_profesional_map[$trabajo->id])) {
                        $trabajo->laboratorio = $mis_trabajos_profesional_map[$trabajo->id];
                    } else {
                        $trabajo->laboratorio = 0; // O el valor por defecto que prefieras
                    }
                }

                foreach($procedimientos as $procedimiento){
                    if (isset($mis_trabajos_profesional_map[$procedimiento->id])) {
                        $procedimiento->laboratorio = $mis_trabajos_profesional_map[$procedimiento->id];
                    } else {
                        $procedimiento->laboratorio = 0; // O el valor por defecto que prefieras
                    }
                }

                $procedimientos = $mis_trabajos_profesional;

                return ['status' => 1, 'mensaje' => 'Diagnóstico guardado correctamente','procedimientos' => $procedimientos, 'trabajos' => $trabajos];
            }else{
                return ['status' => 0, 'mensaje' => 'Error al guardar diagnóstico'];
            }
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }

    public function cargar_tratamiento_presupuesto(Request $request){

        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        // Si $request->tipo es null, significa que se busca en odontograma
        if($request->tipo == null){
            $pieza = OdontogramaPaciente::find($request->id);
            $pieza->presupuesto = 1;
            if($pieza->save()){

                // crear el presupuesto si es que aun no se ha registrado
                $presupuesto = PresupuestosDental::where('id_paciente', $pieza->id_paciente)->where('id_lugar_atencion', $pieza->id_lugar_atencion)->where('id_ficha_atencion', $pieza->id_ficha_atencion)->first();
                if(!$presupuesto){
                    $presupuesto = new PresupuestosDental;
                    $presupuesto->id_paciente = $pieza->id_paciente;
                    $presupuesto->id_profesional = $pieza->id_profesional;
                    $presupuesto->id_ficha_atencion = $pieza->id_ficha_atencion;
                    $presupuesto->id_lugar_atencion = $pieza->id_lugar_atencion;
                    $presupuesto->datos_piezas_dentales = '{"key": "value"}'; // luego lo modificamos
                    $presupuesto->estado = 1;
                    $presupuesto->aprobado = 0;
                    $presupuesto->fecha_control = \Carbon\Carbon::parse($request->fecha)->format('Y-m-d');
                    $presupuesto->fecha = \Carbon\Carbon::parse($request->fecha)->format('Y-m-d');
                    $presupuesto->boca = 0;
                    $presupuesto->save();
                }
                $pieza->id_presupuesto = $presupuesto->id;
                $pieza->save();
                $odontograma_paciente = $this->dame_odontograma_paciente($pieza->id_paciente, $pieza->id_ficha_atencion, $pieza->id_lugar_atencion, $profesional->id_tipo_especialidad);

                $odontograma_paciente_vista = view('atencion_odontologica.generales.odontograma_adulto',['odontograma_historial' => $odontograma_paciente])->render();
                $valores = $this->dameValoresOdontograma($pieza->id_paciente, $pieza->id_ficha_atencion, $pieza->id_lugar_atencion, $profesional->id_tipo_especialidad);
                $valor_total = $valores[0] + $valores[1] + $valores[2];
                $presupuesto->valor_total = $valor_total;
                $presupuesto->save();
                $pagos_tratamientos_dentales = PagosPresupuestoDental::where('id_ficha_atencion', $pieza->id_ficha_atencion)->get();

                $total_abonado = 0;
                foreach($pagos_tratamientos_dentales as $p){
                    $total_abonado += intval($p->total);
                }

                $valor_insumos = $valores[2];

                $total_abonado_sin_insumos = $total_abonado - $valor_insumos;
                $valor_odontograma = $valores[1];

                $total_piezas_odontograma = count($odontograma_paciente);
                $resto = $total_abonado_sin_insumos;

                foreach($odontograma_paciente as $o){
                    if($resto >= 0 && $resto >= intval($o->valor)){
                        $o->estado_pago = 'ok';
                        $resto -= intval($o->valor);
                        $o->resto = $resto;

                    }else if($resto >= 0 && $resto <= intval($o->valor)){
                        $o->estado_pago = 'incompleto';

                        $resto -= intval($o->valor);
                        $o->resto = $resto;
                    }else if($resto < 0){
                        $o->estado_pago = 'error';
                        $o->resto = $resto;
                    }

                }
                return ['status' => 1, 'mensaje' => 'Pieza '.$pieza->pieza.' agregada con éxito.', 'odontograma_paciente' => $odontograma_paciente, 'valores' => $valores,'presupuesto' => $presupuesto];
            }else{
                return ['status' => 0, 'mensaje' => 'Ha ocurrido un error con la pieza '.$pieza->pieza.'.','presupuesto' => $presupuesto];
            }
        }else if($request->tipo == 'gral'){
            $pieza = ExamenesBocaGeneral::find($request->id);
            $pieza->presupuesto = 1;
            if($pieza->save()){
                // crear el presupuesto si es que aun no se ha registrado
                $presupuesto = PresupuestosDental::where('id_paciente', $pieza->id_paciente)->where('id_lugar_atencion', $pieza->id_lugar_atencion)->where('id_ficha_atencion', $pieza->id_ficha_atencion)->first();
                if(!$presupuesto){
                    $presupuesto = new PresupuestosDental;
                    $presupuesto->id_paciente = $pieza->id_paciente;
                    $presupuesto->id_profesional = $pieza->id_profesional;
                    $presupuesto->id_ficha_atencion = $pieza->id_ficha_atencion;
                    $presupuesto->id_lugar_atencion = $pieza->id_lugar_atencion;
                    $presupuesto->datos_piezas_dentales = '{"key": "value"}'; // luego lo modificamos
                    $presupuesto->estado = 1;
                    $presupuesto->aprobado = 0;
                    $presupuesto->fecha_control = \Carbon\Carbon::parse($request->fecha)->format('Y-m-d');
                    $presupuesto->fecha = \Carbon\Carbon::parse($request->fecha)->format('Y-m-d');
                    $presupuesto->boca = 1;
                    $presupuesto->save();
                }
                $paciente = Paciente::find($pieza->id_paciente);
                $ficha_atencionController = new ficha_atencionController();
                $maxilar_superior_gral_tratamiento = $ficha_atencionController->dameMaxilarSuperiorGeneralTratamiento($paciente->id, $profesional->id_tipo_especialidad);

                $maxilar_superior_gral_diagnostico = $ficha_atencionController->dameMaxilarSuperiorGeneralDiagnostico($paciente->id, $profesional->id_tipo_especialidad);
                $maxilar_inferior_gral_tratamiento = $ficha_atencionController->dameMaxilarInferiorGeneralTratamiento($paciente->id, $profesional->id_tipo_especialidad);
                $maxilar_inferior_gral_diagnostico = $ficha_atencionController->dameMaxilarInferiorGeneralDiagnostico($paciente->id, $profesional->id_tipo_especialidad);
                $boca_completa_gral_tratamiento = $ficha_atencionController->dameBocaCompletaGeneralTratamiento($paciente->id, $profesional->id_tipo_especialidad);
                $boca_completa_gral_diagnostico = $ficha_atencionController->dameBocaCompletaGeneralDiagnostico($paciente->id, $profesional->id_tipo_especialidad);
                $maxilar_inferior_gral_tratamientos_endo = $ficha_atencionController->dameMaxilarInferiorGeneralTratamientoEndodoncia($paciente->id, $profesional->id_tipo_especialidad);
                $maxilar_inferior_gral_diagnosticos_endo = $ficha_atencionController->dameMaxilarInferiorGeneralDiagnosticoEndodoncia($paciente->id, $profesional->id_tipo_especialidad);
                $maxilar_superior_gral_tratamientos_endo = $ficha_atencionController->dameMaxilarSuperiorGeneralTratamientoEndodoncia($paciente->id, $profesional->id_tipo_especialidad);
                $maxilar_superior_gral_diagnosticos_endo = $ficha_atencionController->dameMaxilarSuperiorGeneralDiagnosticoEndodoncia($paciente->id, $profesional->id_tipo_especialidad);
                $boca_completa_gral_tratamiento_endo = $ficha_atencionController->dameCompletaEndoTratamiento($paciente->id, $profesional->id_tipo_especialidad);
                $boca_completa_gral_diagnostico_endo = $ficha_atencionController->dameCompletaEndoDiagnostico($paciente->id, $profesional->id_tipo_especialidad);
                $odontograma_paciente = $this->dame_odontograma_paciente($pieza->id_paciente, $pieza->id_ficha_atencion, $pieza->id_lugar_atencion,$profesional->id_tipo_especialidad);
                $valores = $this->dameValoresOdontograma($pieza->id_paciente, $pieza->id_ficha_atencion, $pieza->id_lugar_atencion,$profesional->id_tipo_especialidad);
                $valor_total = $valores[0] + $valores[1] + $valores[2];
                $presupuesto->valor_total = $valor_total;
                $presupuesto->save();
                return [
                    'status' => 1,
                    'mensaje' => 'Pieza '.$pieza->pieza.' agregada con éxito.',
                    'valores' => $valores,
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
                    'presupuesto' => $presupuesto,
                    'todos' => $this->dameTratamientosBocaGeneral($pieza->id_ficha_atencion)
                ];
            }else{
                return ['status' => 0, 'mensaje' => 'Ha ocurrido un error con la pieza '.$pieza->pieza.'.'];
            }
        }else{
            $presupuesto = PresupuestosDental::where('id_paciente', $request->id_paciente)->where('id_lugar_atencion', $request->id_lugar_atencion)->where('id_ficha_atencion', $request->id_ficha_atencion)->first();

                if(!$presupuesto){
                    $presupuesto = new PresupuestosDental;
                    $presupuesto->id_paciente = $request->id_paciente;
                    $presupuesto->id_profesional = $profesional->id;
                    $presupuesto->id_ficha_atencion = $request->id_ficha_atencion;
                    $presupuesto->id_lugar_atencion = $request->id_lugar_atencion;
                    $presupuesto->datos_piezas_dentales = '{"key": "value"}'; // luego lo modificamos
                    $presupuesto->estado = 1;
                    $presupuesto->aprobado = 0;
                    $presupuesto->fecha_control = \Carbon\Carbon::parse($request->fecha)->format('Y-m-d');
                    $presupuesto->fecha = \Carbon\Carbon::parse($request->fecha)->format('Y-m-d');
                    $presupuesto->boca = 0;
                    $presupuesto->save();
                }

                $insumo = InsumosTratamientosDental::find($request->id);
                $insumo->presupuesto = 1;
                $insumo->id_presupuesto = $presupuesto->id;
                $insumo->save();
                $odontograma_paciente = $this->dame_odontograma_paciente($request->id_paciente, $request->id_ficha_atencion, $request->id_lugar_atencion, $profesional->id_tipo_especialidad);

                $odontograma_paciente_vista = view('atencion_odontologica.generales.odontograma_adulto',['odontograma_historial' => $odontograma_paciente])->render();

                $valores = $this->dameValoresOdontograma($request->id_paciente, $request->id_ficha_atencion, $request->id_lugar_atencion, $profesional->id_tipo_especialidad);
                $insumos = InsumosTratamientosDental::where('id_ficha_atencion',$request->id_ficha_atencion)->get();
                $valor_total = $valores[0] + $valores[1] + $valores[2];
                $presupuesto->valor_total = $valor_total;
                $presupuesto->save();
                $pagos_tratamientos_dentales = PagosPresupuestoDental::where('id_ficha_atencion', $request->id_ficha_atencion)->get();

                $total_abonado = 0;
                foreach($pagos_tratamientos_dentales as $p){
                    $total_abonado += intval($p->total);
                }

                $valor_insumos = $valores[2];

                $total_abonado_sin_insumos = $total_abonado - $valor_insumos;
                $valor_odontograma = $valores[1];

                $total_piezas_odontograma = count($odontograma_paciente);
                $resto = $total_abonado_sin_insumos;

                foreach($odontograma_paciente as $o){
                    if($resto >= 0 && $resto >= intval($o->valor)){
                        $o->estado_pago = 'ok';
                        $resto -= intval($o->valor);
                        $o->resto = $resto;

                    }else if($resto >= 0 && $resto <= intval($o->valor)){
                        $o->estado_pago = 'incompleto';

                        $resto -= intval($o->valor);
                        $o->resto = $resto;
                    }else if($resto < 0){
                        $o->estado_pago = 'error';
                        $o->resto = $resto;
                    }

                }

                foreach($insumos as $i){
                    if($total_abonado > $valor_insumos){
                        $i->estado_pago = "ok";
                        $i->total_pagado = $total_abonado;
                        $i->total_insumos = $valor_insumos;

                        $i->insumos = mb_strtoupper($i->insumos);
                        $i->nombre_marca = $i->nombre_marca ? $i->nombre_marca : '';
                    }else{
                        $i->estado_pago = "error";
                        $i->total_pagado = $total_abonado;
                        $i->total_insumos = $valor_insumos;

                        $i->insumos = mb_strtoupper($i->insumos);
                        $i->nombre_marca = $i->nombre_marca ? $i->nombre_marca : '';
                    }
                }
                return ['status' => 1, 'mensaje' => 'Insumo '.$insumo->descripcion.' agregada con éxito.', 'odontograma_paciente' => $odontograma_paciente, 'valores' => $valores,'presupuesto' => $presupuesto,'insumos' => $insumos];
        }
    }

    public function reasignar_pago_presupuesto(Request $request)
    {
        try {
            $valores = $request->valores;
            $valorAbonado = intval($request->valorAbonado);

            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

            // Limpiar estados anteriores
            $odontograma_paciente = OdontogramaPaciente::where('id_ficha_atencion', $request->id_ficha_atencion)->get();

            foreach ($odontograma_paciente as $o) {
                $o->estado_pago = null;
                $o->save();
            }

            $todos = $this->dameTratamientosBocaGeneral($request->id_ficha_atencion);

            foreach ($todos as $o) {
                $o->estado_pago = null;
                $o->save();
            }

            $insumos = InsumosTratamientosDental::where('id_ficha_atencion', $request->id_ficha_atencion)->get();
            foreach ($insumos as $i) {
                $i->estado_pago = null;
                $i->save();
            }

            // 1. Procesar insumos primero
            foreach ($valores as $v) {
                if ($v['info'] == 'insumo') {
                    $valor = intval($v['valor']);
                    $insumo = $insumos->find($v['id']);

                    if ($valorAbonado >= $valor) {
                        $insumo->estado_pago = 'ok';
                        $valorAbonado -= $valor;
                    } elseif ($valorAbonado > 0) {
                        $insumo->estado_pago = 'incompleto';
                        $valorAbonado = 0; // Se consume todo
                    } else {
                        $insumo->estado_pago = 'error';
                    }

                    $insumo->save();
                }
            }

            // 2. Procesar odontograma después
            foreach ($valores as $v) {
                if ($v['info'] == 'odonto') {
                    $valor = intval($v['valor']);
                    $pieza = $odontograma_paciente->find($v['id']);
                    if (!$pieza) {
                        continue; // Si no se encuentra la pieza, continuar con la siguiente
                    }

                    if ($valorAbonado >= $valor) {
                        $pieza->estado_pago = 'ok';
                        $valorAbonado -= $valor;
                    } elseif ($valorAbonado > 0) {
                        $pieza->estado_pago = 'incompleto';
                        $valorAbonado = 0;
                    } else {
                        $pieza->estado_pago = 'error';
                    }

                    $pieza->save();
                }else if($v['info'] == 'gral'){
                    $valor = intval($v['valor']);
                    $pieza = $todos->find($v['id']);
                    if (!$pieza) {
                        continue; // Si no se encuentra la pieza, continuar con la siguiente
                    }

                    if ($valorAbonado >= $valor) {
                        $pieza->estado_pago = 'ok';
                        $valorAbonado -= $valor;
                    } elseif ($valorAbonado > 0) {
                        $pieza->estado_pago = 'incompleto';
                        $valorAbonado = 0;
                    } else {
                        $pieza->estado_pago = 'error';
                    }

                    $pieza->save();
                }
            }

            $fc = new ficha_atencionController();
            $odontograma_paciente = $fc->dameOdontogramaPaciente($request->id_paciente, $request->id_ficha_atencion,$request->id_lugar_atencion, $profesional->id_tipo_especialidad);
            $insumos = InsumosTratamientosDental::where('id_ficha_atencion', $request->id_ficha_atencion)->get();

            return [
                'estado' => 1,
                'mensaje' => 'Pagos reasignados correctamente',
                'odontograma' => $odontograma_paciente,
                'insumos' => $insumos,
                'todos' => $todos,
            ];
        } catch (\Exception $e) {
            return ['estado' => 0, 'mensaje' => $e->getMessage()];
        }
    }


    public function cargar_tratamiento_presupuesto_period(Request $request){

        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

        $tratamiento = DiagnosticosDental::where('descripcion', $request->tto)->first();

        if(!$request->piezas){
            $odontograma =  new OdontogramaPaciente();
            $posicion_pieza = $request->posicion_pieza;
            $cuadrante = $request->cuadrante;

            $value = $posicion_pieza .'_'. $cuadrante;

            $caras = '';
            if ($request->{'caraM'} == '1') {
                $caras .= 'M' . '|';
            }
            if ($request->{'caraO'} == '1') {
                $caras .= 'O' . '|';
            }
            if ($request->{'caraD'} == '1') {
                $caras .= 'D' . '|';
            }
            if ($request->{'caraV'} == '1') {
                $caras .= 'V' . '|';
            }
            if ($request->{'caraP'} == '1') {
                $caras .= 'P' . '|';
            }

            $request->fecha = Carbon::now();

            $odontograma->diagnostico = 3; // Fractura
            $odontograma->tratamiento = $request->tto;
            $odontograma->caras = $caras;
            $odontograma->pieza = $request->pieza;
            $odontograma->id_paciente = $request->id_paciente;
            $odontograma->id_profesional = $profesional->id;
            $odontograma->id_ficha_atencion = $request->id_ficha_atencion;
            $odontograma->id_lugar_atencion = $request->id_lugar_atencion;
            $odontograma->tipo_especialidad = $profesional->id_tipo_especialidad;
            $odontograma->id_presupuesto = $request->id_presupuesto;
            $odontograma->presupuesto = 1;
            $odontograma->estado = 0;
            $odontograma->impl_rehab = $request->rehab ? 1 : 0;
            $odontograma->urgencia = $request->urgencia == 1 ? 1 : 0;
            if ($odontograma->save()) {
                // crear el presupuesto si es que aun no se ha registrado
                $presupuesto = PresupuestosDental::where('id_paciente', $odontograma->id_paciente)->where('id_lugar_atencion', $odontograma->id_lugar_atencion)->where('id_ficha_atencion', $odontograma->id_ficha_atencion)->first();
                if(!$presupuesto){
                    $presupuesto = new PresupuestosDental;
                    $presupuesto->id_paciente = $odontograma->id_paciente;
                    $presupuesto->id_profesional = $profesional->id;
                    $presupuesto->id_ficha_atencion = $odontograma->id_ficha_atencion;
                    $presupuesto->id_lugar_atencion = $odontograma->id_lugar_atencion;
                    $presupuesto->datos_piezas_dentales = '{"key": "value"}'; // luego lo modificamos
                    $presupuesto->estado = 1;
                    $presupuesto->aprobado = 0;
                    $presupuesto->fecha_control = \Carbon\Carbon::parse($request->fecha)->format('Y-m-d');
                    $presupuesto->fecha = \Carbon\Carbon::parse($request->fecha)->format('Y-m-d');
                    $presupuesto->boca = 0;
                    $presupuesto->save();

                    $odontograma->id_presupuesto = $presupuesto->id;
                    $odontograma->save();
                }else{
                    $odontograma->id_presupuesto = $presupuesto->id;
                    $odontograma->save();
                }
                $odontograma_paciente = $this->dame_odontograma_paciente($odontograma->id_paciente, $odontograma->id_ficha_atencion, $odontograma->id_lugar_atencion, $profesional->id_tipo_especialidad);

                $odontograma_paciente_vista = view('atencion_odontologica.generales.odontograma_adulto',['odontograma_historial' => $odontograma_paciente])->render();
                $valores = $this->dameValoresOdontograma($odontograma->id_paciente, $odontograma->id_ficha_atencion, $odontograma->id_lugar_atencion, $profesional->id_tipo_especialidad);
                $insumos = InsumosTratamientosDental::where('id_ficha_atencion',$odontograma->id_ficha_atencion)->get();
                $valor_total = $valores[0] + $valores[1] + $valores[2] + $valores[3];
                $presupuesto->valor_total = $valor_total;
                $presupuesto->save();

                $pagos_tratamientos_dentales = PagosPresupuestoDental::where('id_ficha_atencion', $request->id_ficha_atencion)->get();

                $total_abonado = 0;
                foreach($pagos_tratamientos_dentales as $p){
                    $total_abonado += intval($p->total);
                }

                $valor_insumos = $valores[2];

                $total_abonado_sin_insumos = $total_abonado - $valor_insumos;
                $valor_odontograma = $valores[1];

                $total_piezas_odontograma = count($odontograma_paciente);
                $resto = $total_abonado_sin_insumos;

                foreach($odontograma_paciente as $o){
                    if($resto >= 0 && $resto >= intval($o->valor)){
                        $o->estado_pago = 'ok';
                        $resto -= intval($o->valor);
                        $o->resto = $resto;

                    }else if($resto >= 0 && $resto <= intval($o->valor)){
                        $o->estado_pago = 'incompleto';

                        $resto -= intval($o->valor);
                        $o->resto = $resto;
                    }else if($resto < 0){
                        $o->estado_pago = 'error';
                        $o->resto = $resto;
                    }

                }

                foreach($insumos as $i){
                    if($total_abonado > $valor_insumos){
                        $i->estado_pago = "ok";
                        $i->total_pagado = $total_abonado;
                        $i->total_insumos = $valor_insumos;
                    }else{
                        $i->estado_pago = "error";
                        $i->total_pagado = $total_abonado;
                        $i->total_insumos = $valor_insumos;
                    }
                }
                if($odontograma->pieza == 0){
                    return ['status' => 1, 'mensaje' => 'Tratamiento agregado con éxito a Laboratorio.', 'odontograma_paciente' => $odontograma_paciente, 'valores' => $valores,'presupuesto' => $presupuesto,'insumos' => $insumos];
                }
                return ['status' => 1, 'mensaje' => 'Pieza '.$odontograma->pieza.' agregada con éxito.', 'odontograma_paciente' => $odontograma_paciente, 'valores' => $valores,'presupuesto' => $presupuesto,'insumos' => $insumos];
            }else{
                return ['status' => 0, 'mensaje' => 'Ha ocurrido un error con la odontograma '.$odontograma->pieza.'.','presupuesto' => $presupuesto];
            }
        }else{
            $piezas = $request->piezas;
            foreach($piezas as $pieza){
                $odontograma =  new OdontogramaPaciente();
                $posicion_pieza = $pieza;
                $cuadrante = $request->cuadrante;

                $value = $posicion_pieza .'_'. $cuadrante;

                $caras = '';
                if ($request->{'caraM'} == '1') {
                    $caras .= 'M' . '|';
                }
                if ($request->{'caraO'} == '1') {
                    $caras .= 'O' . '|';
                }
                if ($request->{'caraD'} == '1') {
                    $caras .= 'D' . '|';
                }
                if ($request->{'caraV'} == '1') {
                    $caras .= 'V' . '|';
                }
                if ($request->{'caraP'} == '1') {
                    $caras .= 'P' . '|';
                }

                $request->fecha = Carbon::now();

                $odontograma->diagnostico = $request->diagnostico; // Fractura
                $odontograma->tratamiento = $request->tto;
                $odontograma->caras = $caras;
                $odontograma->pieza = $pieza;
                $odontograma->fecha = $request->fecha;
                $odontograma->id_paciente = $request->id_paciente;
                $odontograma->id_profesional = $profesional->id;
                $odontograma->id_ficha_atencion = $request->id_ficha_atencion;
                $odontograma->id_lugar_atencion = $request->id_lugar_atencion;
                $odontograma->tipo_especialidad = $profesional->id_tipo_especialidad;
                $odontograma->presupuesto = 1;
                $odontograma->id_presupuesto = $request->id_presupuesto;
                $odontograma->estado = 0;
                $odontograma->impl_rehab = $request->rehab ? 1 : 0;
                $odontograma->urgencia = $request->urgencia ? 1 : 0;
                $odontograma->diagnostico = $request->diagnostico;

                $odontograma->save();

                // crear el presupuesto si es que aun no se ha registrado
                $presupuesto = PresupuestosDental::where('id_paciente', $odontograma->id_paciente)->where('id_lugar_atencion', $odontograma->id_lugar_atencion)->where('id_ficha_atencion', $odontograma->id_ficha_atencion)->first();
                if(!$presupuesto){
                    $presupuesto = new PresupuestosDental;
                    $presupuesto->id_paciente = $odontograma->id_paciente;
                    $presupuesto->id_profesional = $profesional->id;
                    $presupuesto->id_ficha_atencion = $odontograma->id_ficha_atencion;
                    $presupuesto->id_lugar_atencion = $odontograma->id_lugar_atencion;
                    $presupuesto->datos_piezas_dentales = '{"key": "value"}'; // luego lo modificamos
                    $presupuesto->estado = 1;
                    $presupuesto->aprobado = 0;
                    $presupuesto->fecha_control = \Carbon\Carbon::parse($request->fecha)->format('Y-m-d');
                    $presupuesto->fecha = \Carbon\Carbon::parse($request->fecha)->format('Y-m-d');
                    $presupuesto->boca = 0;
                    $presupuesto->save();

                    $odontograma->id_presupuesto = $presupuesto->id;
                    $odontograma->save();
                }else{
                    $odontograma->id_presupuesto = $presupuesto->id;
                    $odontograma->save();
                }
                $odontograma_paciente = $this->dame_odontograma_paciente($odontograma->id_paciente, $odontograma->id_ficha_atencion, $odontograma->id_lugar_atencion, $profesional->id_tipo_especialidad);

                $odontograma_paciente_vista = view('atencion_odontologica.generales.odontograma_adulto',['odontograma_historial' => $odontograma_paciente])->render();

                $valores = $this->dameValoresOdontograma($odontograma->id_paciente, $odontograma->id_ficha_atencion, $odontograma->id_lugar_atencion, $profesional->id_tipo_especialidad);
                $valor_total = $valores[0] + $valores[1] + $valores[2] + $valores[3];
                $presupuesto->valor_total = $valor_total;
                $presupuesto->save();

                }

                $prof_controller = new EscritorioProfesional;
                $primer_cuadrante = $prof_controller->dameExamenesPiezaDentalPiezaPrimerCuadrante($odontograma->id_paciente,'adulto',$profesional->id_tipo_especialidad);
                $segundo_cuadrante = $prof_controller->dameExamenesPiezaDentalPiezaSegundoCuadrante($odontograma->id_paciente,'adulto',$profesional->id_tipo_especialidad);
                $tercer_cuadrante = $prof_controller->dameExamenesPiezaDentalPiezaTercerCuadrante($odontograma->id_paciente,'adulto',$profesional->id_tipo_especialidad);
                $cuarto_cuadrante = $prof_controller->dameExamenesPiezaDentalPiezaCuartoCuadrante($odontograma->id_paciente,'adulto',$profesional->id_tipo_especialidad);
                $quinto_cuadrante = $prof_controller->dameExamenesPiezaDentalPiezaQuintoCuadrante($odontograma->id_paciente,'adulto',$profesional->id_tipo_especialidad);
                $sexto_cuadrante = $prof_controller->dameExamenesPiezaDentalPiezaSextoCuadrante($odontograma->id_paciente,'adulto',$profesional->id_tipo_especialidad);

                $primer_cuadrante_endodoncia = $prof_controller->dameExamenesPiezaDentalPiezaPrimerCuadrante($odontograma->id_paciente,'endodoncia', $profesional->id_tipo_especialidad);
                $segundo_cuadrante_endodoncia = $prof_controller->dameExamenesPiezaDentalPiezaSegundoCuadrante($odontograma->id_paciente,'endodoncia', $profesional->id_tipo_especialidad);
                $tercer_cuadrante_endodoncia = $prof_controller->dameExamenesPiezaDentalPiezaTercerCuadrante($odontograma->id_paciente,'endodoncia', $profesional->id_tipo_especialidad);
                $cuarto_cuadrante_endodoncia = $prof_controller->dameExamenesPiezaDentalPiezaCuartoCuadrante($odontograma->id_paciente,'endodoncia', $profesional->id_tipo_especialidad);
                $quinto_cuadrante_endodoncia = $prof_controller->dameExamenesPiezaDentalPiezaQuintoCuadrante($odontograma->id_paciente,'endodoncia', $profesional->id_tipo_especialidad);
                $sexto_cuadrante_endodoncia = $prof_controller->dameExamenesPiezaDentalPiezaSextoCuadrante($odontograma->id_paciente,'endodoncia', $profesional->id_tipo_especialidad);

                $paciente = Paciente::where('id', $odontograma->id_paciente)->first();
                $tratamientos_dentales = DiagnosticosDental::where('tipo_examen',2)->orWhere('tipo_examen',3)->get();
                $pagos_tratamientos_dentales = PagosPresupuestoDental::where('id_ficha_atencion', $request->id_ficha_atencion)->get();

                $total_abonado = 0;
                foreach($pagos_tratamientos_dentales as $p){
                    $total_abonado += intval($p->total);
                }

                $valor_insumos = $valores[2];

                $valor_lab = $valores[3];

                $total_abonado_sin_insumos = $total_abonado - $valor_insumos;
                $valor_odontograma = $valores[1];

                $total_piezas_odontograma = count($odontograma_paciente);
                $resto = $total_abonado_sin_insumos;

                foreach($odontograma_paciente as $o){
                    if($resto >= 0 && $resto >= intval($o->valor)){
                        $o->estado_pago = 'ok';
                        $resto -= intval($o->valor);
                        $o->resto = $resto;

                    }else if($resto >= 0 && $resto <= intval($o->valor)){
                        $o->estado_pago = 'incompleto';

                        $resto -= intval($o->valor);
                        $o->resto = $resto;
                    }else if($resto < 0){
                        $o->estado_pago = 'error';
                        $o->resto = $resto;
                    }

                }

                $url_tratamientos = $profesional->id_tipo_especialidad == 18
                    ? route('dental.getDiagnosticoDental')
                    : route('dental.getTratamientoImplantologia');

                $vista_presupuestos = view('atencion_odontologica.include.cuadrantes',[
                    'url_tratamientos' => $url_tratamientos,
                    'primer_cuadrante' => $primer_cuadrante,
                    'segundo_cuadrante' => $segundo_cuadrante,
                    'tercer_cuadrante' => $tercer_cuadrante,
                    'cuarto_cuadrante' => $cuarto_cuadrante,
                    'quinto_cuadrante' => $quinto_cuadrante,
                    'sexto_cuadrante' => $sexto_cuadrante,
                    'primer_cuadrante_endodoncia' => $primer_cuadrante_endodoncia,
                    'segundo_cuadrante_endodoncia' => $segundo_cuadrante_endodoncia,
                    'tercer_cuadrante_endodoncia' => $tercer_cuadrante_endodoncia,
                    'cuarto_cuadrante_endodoncia' => $cuarto_cuadrante_endodoncia,
                    'quinto_cuadrante_endodoncia' => $quinto_cuadrante_endodoncia,
                    'sexto_cuadrante_endodoncia' => $sexto_cuadrante_endodoncia,
                    'paciente' => $paciente,
                    'id_ficha_atencion' => $odontograma->id_ficha_atencion,
                    'id_lugar_atencion' => $odontograma->id_lugar_atencion,
                    'tratamientos' => $tratamientos_dentales
                    ])->render();

            $odontograma_paciente_historial = $this->dame_odontograma_paciente_historial($request->id_paciente);
            $odontograma_paciente_vista = view('atencion_odontologica.generales.odontograma_adulto',['odontograma_historial' => $odontograma_paciente_historial])->render();
            if($request->tipo == 'odped'){
                $odontograma_paciente_vista = view('atencion_odontologica.generales.odontograma_pediatrico_completo',['odontograma_historial' => $odontograma_paciente])->render();
            }
            return ['status' => 1, 'mensaje' => 'Piezas agregada con éxito.', 'odontograma_paciente' => $odontograma_paciente, 'valores' => $valores,'presupuesto' => $presupuesto,'vista_presupuestos' => $vista_presupuestos,'odontograma_paciente_vista' => $odontograma_paciente_vista];
        }

    }

    public function modificar_evolucion(Request $request){

        $evolucion = EvolucionOdontologiaGral::find($request->id_evolucion);
        $evolucion->evolucion = $request->observaciones;
        $evolucion->save();

        $id_ficha_atencion = $request->id_ficha_atencion;
        $id_paciente = $request->id_paciente;
        $id_lugar_atencion = $request->id_lugar_atencion;

        // Usar múltiples scopes encadenados para filtrar
        $evoluciones = EvolucionOdontologiaGral::porFichaAtencion($id_ficha_atencion)
            ->porPaciente($id_paciente) // Usar el scope porPaciente
            ->porLugarAtencion($id_lugar_atencion) // Usar scope de lugar de atención
            ->with(['paciente', // Cargar todos los datos del paciente
                   'profesional', // Cargar todos los datos del profesional
                   'fichaAtencion', // Cargar todos los datos de la ficha
                   'lugarAtencion', // Cargar todos los datos del lugar de atención
                   'presupuesto', // Cargar presupuesto si existe
                   'procedimiento',
                  ])
            ->orderBy('created_at', 'desc') // Ordenar por más reciente
            ->get();

        // Cargar procedimientos de forma condicional (solo si id_procedimiento no es null y es numérico)
        $evoluciones->load(['procedimiento' => function($query) {
            $query->where('id', '!=', null);
        }]);

        return response()->json(['mensaje' => 'ok', 'evoluciones' => $evoluciones]);
    }

    public function dame_estado_prestacion(Request $request){
        $odontograma = OdontogramaPaciente::find($request->id_procedimiento);
        if($odontograma){
            if($odontograma->estado == 0){
                $estado = 'Pendiente';
                $clase = 'badge badge-warning';
            }else if($odontograma->estado == 1){
                $estado = 'Finalizado';
                $clase = 'badge badge-success';
            }else if($odontograma->estado == 2){
                $estado = 'Error';
                $clase = 'badge badge-danger';
            }else if($odontograma->estado == 3){
                $estado = 'Citado a control';
                $clase = 'badge badge-info';
            }

            return response()->json(['estado' => $estado, 'clase' => $clase]);
        }else{
            return response()->json(['error' => 'error', 'clase' => 'badge badge-secondary']);
        }

    }

    public function terminar_pieza_odonto_gral(Request $request){
        return $request;
    }

    public function cargar_tratamiento_presupuesto_endo(Request $request){

        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $tratamiento = DiagnosticosDental::where('descripcion', $request->tto)->first();

        if(!$request->piezas){
            $odontograma =  new OdontogramaPaciente();
            $posicion_pieza = $request->posicion_pieza;
            $cuadrante = $request->cuadrante;

            $value = $posicion_pieza .'_'. $cuadrante;

            $caras = '';
            if ($request->{'caraM'} == '1') {
                $caras .= 'M' . '|';
            }
            if ($request->{'caraO'} == '1') {
                $caras .= 'O' . '|';
            }
            if ($request->{'caraD'} == '1') {
                $caras .= 'D' . '|';
            }
            if ($request->{'caraV'} == '1') {
                $caras .= 'V' . '|';
            }
            if ($request->{'caraP'} == '1') {
                $caras .= 'P' . '|';
            }

            $request->fecha = Carbon::now();

            $odontograma->diagnostico = 3; // Fractura
            $odontograma->tratamiento = $request->tto;
            $odontograma->caras = $caras;
            $odontograma->pieza = $request->pieza;
            $odontograma->id_paciente = $request->id_paciente;
            $odontograma->id_profesional = $profesional->id;
            $odontograma->id_ficha_atencion = $request->id_ficha_atencion;
            $odontograma->id_lugar_atencion = $request->id_lugar_atencion;
            $odontograma->tipo_especialidad = $profesional->id_tipo_especialidad;
            $odontograma->presupuesto = 1;
            $odontograma->estado = 0;
            if ($odontograma->save()) {
                // crear el presupuesto si es que aun no se ha registrado
                $presupuesto = PresupuestosDental::where('id_paciente', $odontograma->id_paciente)->where('id_lugar_atencion', $odontograma->id_lugar_atencion)->where('id_ficha_atencion', $odontograma->id_ficha_atencion)->first();
                if(!$presupuesto){
                    $presupuesto = new PresupuestosDental;
                    $presupuesto->id_paciente = $odontograma->id_paciente;
                    $presupuesto->id_profesional = $profesional->id;
                    $presupuesto->id_ficha_atencion = $odontograma->id_ficha_atencion;
                    $presupuesto->id_lugar_atencion = $odontograma->id_lugar_atencion;
                    $presupuesto->datos_piezas_dentales = '{"key": "value"}'; // luego lo modificamos
                    $presupuesto->estado = 1;
                    $presupuesto->aprobado = 0;
                    $presupuesto->fecha_control = \Carbon\Carbon::parse($request->fecha)->format('Y-m-d');
                    $presupuesto->fecha = \Carbon\Carbon::parse($request->fecha)->format('Y-m-d');
                    $presupuesto->boca = 0;
                    $presupuesto->save();
                }
                $odontograma_paciente = $this->dame_odontograma_paciente($odontograma->id_paciente, $odontograma->id_ficha_atencion, $odontograma->id_lugar_atencion, $profesional->id_tipo_especialidad);

                $odontograma_paciente_vista = view('atencion_odontologica.generales.odontograma_adulto',['odontograma_historial' => $odontograma_paciente])->render();
                $valores = $this->dameValoresOdontograma($odontograma->id_paciente, $odontograma->id_ficha_atencion, $odontograma->id_lugar_atencion, $profesional->id_tipo_especialidad);
                $insumos = InsumosTratamientosDental::where('id_ficha_atencion',$odontograma->id_ficha_atencion)->get();
                $valor_total = $valores[0] + $valores[1] + $valores[2];
                $presupuesto->valor_total = $valor_total;
                $presupuesto->save();

                $pagos_tratamientos_dentales = PagosPresupuestoDental::where('id_ficha_atencion', $request->id_ficha_atencion)->get();

                $total_abonado = 0;
                foreach($pagos_tratamientos_dentales as $p){
                    $total_abonado += intval($p->total);
                }

                $valor_insumos = $valores[2];

                $total_abonado_sin_insumos = $total_abonado - $valor_insumos;
                $valor_odontograma = $valores[1];

                $total_piezas_odontograma = count($odontograma_paciente);
                $resto = $total_abonado_sin_insumos;

                foreach($odontograma_paciente as $o){
                    if($resto >= 0 && $resto >= intval($o->valor)){
                        $o->estado_pago = 'ok';
                        $resto -= intval($o->valor);
                        $o->resto = $resto;

                    }else if($resto >= 0 && $resto <= intval($o->valor)){
                        $o->estado_pago = 'incompleto';

                        $resto -= intval($o->valor);
                        $o->resto = $resto;
                    }else if($resto < 0){
                        $o->estado_pago = 'error';
                        $o->resto = $resto;
                    }

                }

                foreach($insumos as $i){
                    if($total_abonado > $valor_insumos){
                        $i->estado_pago = "ok";
                        $i->total_pagado = $total_abonado;
                        $i->total_insumos = $valor_insumos;
                    }else{
                        $i->estado_pago = "error";
                        $i->total_pagado = $total_abonado;
                        $i->total_insumos = $valor_insumos;
                    }
                }

                return ['status' => 1, 'mensaje' => 'Pieza '.$odontograma->pieza.' agregada con éxito.', 'odontograma_paciente' => $odontograma_paciente, 'valores' => $valores,'presupuesto' => $presupuesto,'insumos' => $insumos];
            }else{
                return ['status' => 0, 'mensaje' => 'Ha ocurrido un error con la odontograma '.$odontograma->pieza.'.','presupuesto' => $presupuesto];
            }
        }else{
            $piezas = $request->piezas;
            foreach($piezas as $pieza){
                $odontograma =  new OdontogramaPaciente();
                $posicion_pieza = $pieza;
                $cuadrante = $request->cuadrante;

                $value = $posicion_pieza .'_'. $cuadrante;

                $caras = '';
                if ($request->{'caraM'} == '1') {
                    $caras .= 'M' . '|';
                }
                if ($request->{'caraO'} == '1') {
                    $caras .= 'O' . '|';
                }
                if ($request->{'caraD'} == '1') {
                    $caras .= 'D' . '|';
                }
                if ($request->{'caraV'} == '1') {
                    $caras .= 'V' . '|';
                }
                if ($request->{'caraP'} == '1') {
                    $caras .= 'P' . '|';
                }

                $request->fecha = Carbon::now();

                $odontograma->diagnostico = $request->diagnostico;
                $odontograma->tratamiento = $request->tto;
                $odontograma->caras = $caras;
                $odontograma->pieza = $pieza;
                $odontograma->fecha = $request->fecha;
                $odontograma->id_paciente = $request->id_paciente;
                $odontograma->id_profesional = $profesional->id;
                $odontograma->id_ficha_atencion = $request->id_ficha_atencion;
                $odontograma->id_lugar_atencion = $request->id_lugar_atencion;
                $odontograma->tipo_especialidad = $profesional->id_tipo_especialidad;
                $odontograma->presupuesto = 1;
                $odontograma->estado = 0;
                $odontograma->save();

                // crear el presupuesto si es que aun no se ha registrado
                $presupuesto = PresupuestosDental::where('id_paciente', $odontograma->id_paciente)->where('id_lugar_atencion', $odontograma->id_lugar_atencion)->where('id_ficha_atencion', $odontograma->id_ficha_atencion)->first();
                if(!$presupuesto){
                    $presupuesto = new PresupuestosDental;
                    $presupuesto->id_paciente = $odontograma->id_paciente;
                    $presupuesto->id_profesional = $profesional->id;
                    $presupuesto->id_ficha_atencion = $odontograma->id_ficha_atencion;
                    $presupuesto->id_lugar_atencion = $odontograma->id_lugar_atencion;
                    $presupuesto->datos_piezas_dentales = '{"key": "value"}'; // luego lo modificamos
                    $presupuesto->estado = 1;
                    $presupuesto->aprobado = 0;
                    $presupuesto->fecha_control = \Carbon\Carbon::parse($request->fecha)->format('Y-m-d');
                    $presupuesto->fecha = \Carbon\Carbon::parse($request->fecha)->format('Y-m-d');
                    $presupuesto->boca = 0;
                    $presupuesto->save();
                }
                $odontograma_paciente = $this->dame_odontograma_paciente($odontograma->id_paciente, $odontograma->id_ficha_atencion, $odontograma->id_lugar_atencion, $profesional->id_tipo_especialidad);

                $odontograma_paciente_vista = view('atencion_odontologica.generales.odontograma_adulto',['odontograma_historial' => $odontograma_paciente])->render();
                $valores = $this->dameValoresOdontograma($odontograma->id_paciente, $odontograma->id_ficha_atencion, $odontograma->id_lugar_atencion, $profesional->id_tipo_especialidad);
                $valor_total = $valores[0] + $valores[1] + $valores[2];
                $presupuesto->valor_total = $valor_total;
                $presupuesto->save();

                }

                $prof_controller = new EscritorioProfesional;
                $primer_cuadrante = $prof_controller->dameExamenesPiezaDentalPiezaPrimerCuadrante($odontograma->id_paciente,'adulto',$profesional->id_tipo_especialidad);
                $segundo_cuadrante = $prof_controller->dameExamenesPiezaDentalPiezaSegundoCuadrante($odontograma->id_paciente,'adulto',$profesional->id_tipo_especialidad);
                $tercer_cuadrante = $prof_controller->dameExamenesPiezaDentalPiezaTercerCuadrante($odontograma->id_paciente,'adulto',$profesional->id_tipo_especialidad);
                $cuarto_cuadrante = $prof_controller->dameExamenesPiezaDentalPiezaCuartoCuadrante($odontograma->id_paciente,'adulto',$profesional->id_tipo_especialidad);
                $quinto_cuadrante = $prof_controller->dameExamenesPiezaDentalPiezaQuintoCuadrante($odontograma->id_paciente,'adulto',$profesional->id_tipo_especialidad);
                $sexto_cuadrante = $prof_controller->dameExamenesPiezaDentalPiezaSextoCuadrante($odontograma->id_paciente,'adulto',$profesional->id_tipo_especialidad);

                $primer_cuadrante_endodoncia = $prof_controller->dameExamenesPiezaDentalPiezaPrimerCuadrante($odontograma->id_paciente,'endodoncia', $profesional->id_tipo_especialidad);
                $segundo_cuadrante_endodoncia = $prof_controller->dameExamenesPiezaDentalPiezaSegundoCuadrante($odontograma->id_paciente,'endodoncia', $profesional->id_tipo_especialidad);
                $tercer_cuadrante_endodoncia = $prof_controller->dameExamenesPiezaDentalPiezaTercerCuadrante($odontograma->id_paciente,'endodoncia', $profesional->id_tipo_especialidad);
                $cuarto_cuadrante_endodoncia = $prof_controller->dameExamenesPiezaDentalPiezaCuartoCuadrante($odontograma->id_paciente,'endodoncia', $profesional->id_tipo_especialidad);
                $quinto_cuadrante_endodoncia = $prof_controller->dameExamenesPiezaDentalPiezaQuintoCuadrante($odontograma->id_paciente,'endodoncia', $profesional->id_tipo_especialidad);
                $sexto_cuadrante_endodoncia = $prof_controller->dameExamenesPiezaDentalPiezaSextoCuadrante($odontograma->id_paciente,'endodoncia', $profesional->id_tipo_especialidad);

                $paciente = Paciente::where('id', $odontograma->id_paciente)->first();
                $tratamientos_dentales = DiagnosticosDental::where('tipo_examen',2)->orWhere('tipo_examen',3)->get();
                $pagos_tratamientos_dentales = PagosPresupuestoDental::where('id_ficha_atencion', $request->id_ficha_atencion)->get();

                $total_abonado = 0;
                foreach($pagos_tratamientos_dentales as $p){
                    $total_abonado += intval($p->total);
                }

                $valor_insumos = $valores[2];

                $total_abonado_sin_insumos = $total_abonado - $valor_insumos;
                $valor_odontograma = $valores[1];

                $total_piezas_odontograma = count($odontograma_paciente);
                $resto = $total_abonado_sin_insumos;

                foreach($odontograma_paciente as $o){
                    if($resto >= 0 && $resto >= intval($o->valor)){
                        $o->estado_pago = 'ok';
                        $resto -= intval($o->valor);
                        $o->resto = $resto;

                    }else if($resto >= 0 && $resto <= intval($o->valor)){
                        $o->estado_pago = 'incompleto';

                        $resto -= intval($o->valor);
                        $o->resto = $resto;
                    }else if($resto < 0){
                        $o->estado_pago = 'error';
                        $o->resto = $resto;
                    }

                }

                $url_tratamientos = $profesional->id_tipo_especialidad == 18
                    ? route('dental.getDiagnosticoDental')
                    : route('dental.getTratamientoImplantologia');

                $vista_presupuestos = view('atencion_odontologica.include.cuadrantes',[
                    'url_tratamientos' => $url_tratamientos,
                    'primer_cuadrante' => $primer_cuadrante,
                    'segundo_cuadrante' => $segundo_cuadrante,
                    'tercer_cuadrante' => $tercer_cuadrante,
                    'cuarto_cuadrante' => $cuarto_cuadrante,
                    'quinto_cuadrante' => $quinto_cuadrante,
                    'sexto_cuadrante' => $sexto_cuadrante,
                    'primer_cuadrante_endodoncia' => $primer_cuadrante_endodoncia,
                    'segundo_cuadrante_endodoncia' => $segundo_cuadrante_endodoncia,
                    'tercer_cuadrante_endodoncia' => $tercer_cuadrante_endodoncia,
                    'cuarto_cuadrante_endodoncia' => $cuarto_cuadrante_endodoncia,
                    'quinto_cuadrante_endodoncia' => $quinto_cuadrante_endodoncia,
                    'sexto_cuadrante_endodoncia' => $sexto_cuadrante_endodoncia,
                    'paciente' => $paciente,
                    'id_ficha_atencion' => $odontograma->id_ficha_atencion,
                    'id_lugar_atencion' => $odontograma->id_lugar_atencion,
                    'tratamientos' => $tratamientos_dentales
                    ])->render();

            return ['status' => 1, 'mensaje' => 'Piezas agregada con éxito.', 'odontograma_paciente' => $odontograma_paciente, 'valores' => $valores,'presupuesto' => $presupuesto,'vista_presupuestos' => $vista_presupuestos];
        }

    }

    public function sacar_tratamiento_presupuesto(Request $request){

        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        if($request->tipo == null){
            $pieza = OdontogramaPaciente::find($request->id);
            $pieza->presupuesto = 0;
            if($pieza->save()){
                // crear el presupuesto si es que aun no se ha registrado
                $presupuesto = PresupuestosDental::where('id_paciente', $pieza->id_paciente)->where('id_lugar_atencion', $pieza->id_lugar_atencion)->where('id_ficha_atencion', $pieza->id_ficha_atencion)->first();
                $pieza->id_presupuesto = null;
                $pieza->save();
                $odontograma_paciente = $this->dame_odontograma_paciente($pieza->id_paciente, $pieza->id_ficha_atencion, $pieza->id_lugar_atencion, $profesional->id_tipo_especialidad);
                $odontograma_paciente_vista = view('atencion_odontologica.generales.odontograma_adulto',['odontograma_historial' => $odontograma_paciente])->render();
                $valores = $this->dameValoresOdontograma($pieza->id_paciente, $pieza->id_ficha_atencion, $pieza->id_lugar_atencion, $profesional->id_tipo_especialidad);
                $valor_total = $valores[0] + $valores[1] + $valores[2] + $valores[3];
                $presupuesto->valor_total = $valor_total;
                if($presupuesto->valor_total == 0){
                    //$presupuesto->estado = 0;
                }
                $presupuesto->save();
                $pagos_tratamientos_dentales = PagosPresupuestoDental::where('id_ficha_atencion', $pieza->id_ficha_atencion)->get();

                $total_abonado = 0;
                foreach($pagos_tratamientos_dentales as $p){
                    $total_abonado += intval($p->total);
                }

                $valor_insumos = $valores[2];

                $total_abonado_sin_insumos = $total_abonado - $valor_insumos;
                $valor_odontograma = $valores[1];

                $total_piezas_odontograma = count($odontograma_paciente);
                $resto = $total_abonado_sin_insumos;

                foreach($odontograma_paciente as $o){
                    if($resto >= 0 && $resto >= intval($o->valor)){
                        $o->estado_pago = 'ok';
                        $resto -= intval($o->valor);
                        $o->resto = $resto;

                    }else if($resto >= 0 && $resto <= intval($o->valor)){
                        $o->estado_pago = 'incompleto';

                        $resto -= intval($o->valor);
                        $o->resto = $resto;
                    }else if($resto < 0){
                        $o->estado_pago = 'error';
                        $o->resto = $resto;
                    }

                }
                return ['status' => 1, 'mensaje' => 'Pieza '.$pieza->pieza.' sacada con éxito.', 'odontograma_paciente' => $odontograma_paciente, 'valores' => $valores];
            }else{
                return ['status' => 0, 'mensaje' => 'Ha ocurrido un error con la pieza '.$pieza->pieza.'.'];
            }
        }else if($request->tipo == 'gral'){
            $pieza = ExamenesBocaGeneral::find($request->id);
            $pieza->presupuesto = 0;
            if($pieza->save()){
                // crear el presupuesto si es que aun no se ha registrado
                $presupuesto = PresupuestosDental::where('id_paciente', $pieza->id_paciente)->where('id_lugar_atencion', $pieza->id_lugar_atencion)->where('id_ficha_atencion', $pieza->id_ficha_atencion)->first();
                $paciente = Paciente::find($pieza->id_paciente);
                $ficha_atencionController = new ficha_atencionController();
                $maxilar_superior_gral_tratamiento = $ficha_atencionController->dameMaxilarSuperiorGeneralTratamiento($paciente->id, $profesional->id_tipo_especialidad);

                $maxilar_superior_gral_diagnostico = $ficha_atencionController->dameMaxilarSuperiorGeneralDiagnostico($paciente->id, $profesional->id_tipo_especialidad);
                $maxilar_inferior_gral_tratamiento = $ficha_atencionController->dameMaxilarInferiorGeneralTratamiento($paciente->id, $profesional->id_tipo_especialidad);
                $maxilar_inferior_gral_diagnostico = $ficha_atencionController->dameMaxilarInferiorGeneralDiagnostico($paciente->id, $profesional->id_tipo_especialidad);
                $boca_completa_gral_tratamiento = $ficha_atencionController->dameBocaCompletaGeneralTratamiento($paciente->id, $profesional->id_tipo_especialidad);
                $boca_completa_gral_diagnostico = $ficha_atencionController->dameBocaCompletaGeneralDiagnostico($paciente->id, $profesional->id_tipo_especialidad);
                $maxilar_inferior_gral_tratamientos_endo = $ficha_atencionController->dameMaxilarInferiorGeneralTratamientoEndodoncia($paciente->id, $profesional->id_tipo_especialidad);
                $maxilar_inferior_gral_diagnosticos_endo = $ficha_atencionController->dameMaxilarInferiorGeneralDiagnosticoEndodoncia($paciente->id, $profesional->id_tipo_especialidad);
                $maxilar_superior_gral_tratamientos_endo = $ficha_atencionController->dameMaxilarSuperiorGeneralTratamientoEndodoncia($paciente->id, $profesional->id_tipo_especialidad);
                $maxilar_superior_gral_diagnosticos_endo = $ficha_atencionController->dameMaxilarSuperiorGeneralDiagnosticoEndodoncia($paciente->id, $profesional->id_tipo_especialidad);
                $boca_completa_gral_tratamiento_endo = $ficha_atencionController->dameCompletaEndoTratamiento($paciente->id, $profesional->id_tipo_especialidad);
                $boca_completa_gral_diagnostico_endo = $ficha_atencionController->dameCompletaEndoDiagnostico($paciente->id, $profesional->id_tipo_especialidad);
                $odontograma_paciente = $this->dame_odontograma_paciente($pieza->id_paciente, $pieza->id_ficha_atencion, $pieza->id_lugar_atencion, $profesional->id_tipo_especialidad);
                $valores = $this->dameValoresOdontograma($pieza->id_paciente, $pieza->id_ficha_atencion, $pieza->id_lugar_atencion, $profesional->id_tipo_especialidad);
                $valor_total = $valores[0] + $valores[1] + $valores[2] + $valores[3];
                $presupuesto->valor_total = $valor_total;
                $presupuesto->save();
                return [
                    'status' => 1,
                    'mensaje' => 'Pieza '.$pieza->pieza.' agregada con éxito.',
                    'valores' => $valores,
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
                    'todos' => $this->dameTratamientosBocaGeneral($pieza->id_ficha_atencion)
                ];
            }else{
                return ['status' => 0, 'mensaje' => 'Ha ocurrido un error con la pieza '.$pieza->pieza.'.'];
            }
        }else{
            $insumo = InsumosTratamientosDental::find($request->id);
            $presupuesto = PresupuestosDental::where('id_paciente', $request->id_paciente)->where('id_lugar_atencion', $request->id_lugar_atencion)->where('id_ficha_atencion', $request->id_ficha_atencion)->first();
            $insumo->presupuesto = 0;
            $insumo->id_presupuesto = null;
            if($insumo->save()){
                $insumos = InsumosTratamientosDental::where('id_ficha_atencion',$request->id_ficha_atencion)->get();
                $odontograma_paciente = $this->dame_odontograma_paciente($request->id_paciente, $request->id_ficha_atencion, $request->id_lugar_atencion, $profesional->id_tipo_especialidad);
                $odontograma_paciente_vista = view('atencion_odontologica.generales.odontograma_adulto',['odontograma_historial' => $odontograma_paciente])->render();
                $valores = $this->dameValoresOdontograma($request->id_paciente, $request->id_ficha_atencion, $request->id_lugar_atencion, $profesional->id_tipo_especialidad);
                $valor_total = $valores[0] + $valores[1] + $valores[2] + $valores[3];
                $presupuesto->valor_total = $valor_total;
                $presupuesto->save();
                $pagos_tratamientos_dentales = PagosPresupuestoDental::where('id_ficha_atencion', $request->id_ficha_atencion)->get();

                $total_abonado = 0;
                foreach($pagos_tratamientos_dentales as $p){
                    $total_abonado += intval($p->total);
                }

                $valor_insumos = $valores[2];

                foreach($insumos as $i){
                    if($total_abonado > $valor_insumos){
                        $i->estado_pago = "ok";
                        $i->total_pagado = $total_abonado;
                        $i->total_insumos = $valor_insumos;
                    }else{
                        $i->estado_pago = "error";
                        $i->total_pagado = $total_abonado;
                        $i->total_insumos = $valor_insumos;
                    }
                    $i->insumos = mb_strtoupper($i->insumos, 'UTF-8');
                    $i->nombre_marca = $i->nombre_marca ? mb_strtoupper($i->nombre_marca, 'UTF-8') : '';
                }
                return ['status' => 1, 'mensaje' => 'Insumo '.$insumo->descripcion.' sacada con éxito.', 'odontograma_paciente' => $odontograma_paciente, 'valores' => $valores, 'insumos' => $insumos];
            }
        }

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

    public function agregar_insumos_tratamiento(Request $req){

        if($req->tipo == null){
            $pieza = OdontogramaPaciente::find($req->id_tto);

        }else{
            $pieza = ExamenesBocaGeneral::find($req->id_tto);

        }
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $insumo = new InsumosTratamientosDental;
        $insumo->tipo = $req->tipo ? $req->tipo : null;
        $insumo->tipo_insumo = $req->tipoInsumo;
        $insumo->id_paciente = $req->id_paciente;
        $insumo->id_profesional = $profesional->id;
        $insumo->id_ficha_atencion = $req->id_ficha_atencion;
        $insumo->id_especialidad = $profesional->id_especialidad;
        $insumo->id_tratamiento = $pieza ? $pieza->id : null;
        $insumo->id_marca = $req->idMarcaInsumo;
        $insumo->nombre_marca = $req->marcaInsumo;
        $insumo->insumos = $req->idTipoInsumo == 1 ? 'Implante' : $req->insumos;
        $insumo->id_tipo_insumo = $req->idTipoInsumo;
        $insumo->cantidad = $req->cantidad;
        $insumo->valor = $req->valor;
        $insumo->observaciones = $req->observaciones;
        $insumo->presupuesto = 1;
        $insumo->impl_rehab = $req->impl_rehab ? 1 : 0;
        $insumo->urgencia = $req->urgencia ? 1 : 0;
        $insumo->estado = 1;
        try {
            if($insumo->save()){
                $insumos = $this->dame_insumos_tratamiento_todos($req->id_paciente, $req->id_ficha_atencion,$req->id_tto, $req->tipo);
                return ['mensaje'=>'ok','insumos'=>$insumos['insumos'],'total_insumos' => $insumos['total'], 'insumo' => $insumo];
            }else{
                return ['mensaje'=>'error'];
            }
        } catch (\Exception $e) {
            //throw $th;
            return ['mensaje' => $e->getMessage()];
        }

    }

    public function dame_bono_pago(Request $req){

        $pagos = PagosPresupuestoDental::where('id_presupuesto', $req->id_presupuesto)->get();

        $pago = 0;
        foreach($pagos as $p){
            $pago += $p->total;
        }
        return ['valor_atencion' => $pago, 'id_presupuesto' => $req->id_presupuesto];
    }

    public function pago_presupuesto(Request $req){

        if($req->id_dcto <> 0){
            $convenio = EmpresasConvenios::find($req->id_dcto);
        }
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        // buscamos el presupuesto
        $total_presupuesto = $req->total_pago;
        $pago_actual = $req->monto_pago;
        $abonado = $req->monto_abonado;

        $presupuesto = PresupuestosDental::where('id_paciente', $req->id_paciente)->where('id_ficha_atencion', $req->id_ficha_atencion)->first();

        $nuevo_pago = new PagosPresupuestoDental;
        $nuevo_pago->id_paciente = $req->id_paciente;
        $nuevo_pago->id_profesional = $profesional->id;
        $nuevo_pago->id_lugar_atencion = $req->id_lugar_atencion;
        $nuevo_pago->id_ficha_atencion = $req->id_ficha_atencion;
        $nuevo_pago->id_presupuesto = $presupuesto->id;
        $nuevo_pago->id_metodo_pago = 1;
        $nuevo_pago->fecha_pago = Carbon::now()->format('Y-m-d');
        $nuevo_pago->metodo_pago = $req->metodo_pago;
        $nuevo_pago->total = $pago_actual;

        $presupuesto->valor_abonado = $presupuesto->valor_abonado + $pago_actual;
        $presupuesto->save();

        if($nuevo_pago->save()){
            $descuentos = 0;
            $odontograma_paciente = $this->dame_odontograma_paciente($req->id_paciente, $req->id_ficha_atencion, $req->id_lugar_atencion, $profesional->id_tipo_especialidad);
            $pagos_presupuesto = $this->dame_pagos_presupuesto($presupuesto->id);
            $pagos_tratamientos_dentales = PagosPresupuestoDental::where('id_ficha_atencion', $req->id_ficha_atencion)->get();
            $total_abonado = 0;
            foreach($pagos_tratamientos_dentales as $p){
                $total_abonado += intval($p->total);
            }
            $valores = $this->dameValoresOdontograma($req->id_paciente, $req->id_ficha_atencion,$req->id_lugar_atencion, $profesional->id_tipo_especialidad);
            $suma_presupuesto = $valores[0] + $valores[1] + $valores[2] + $valores[3];

            $valor_insumos = $valores[2];
            $fichaController = new ficha_atencionController;
            $insumos_tratamientos = $fichaController->dame_insumos_tratamiento($req->id_paciente, $req->id_ficha_atencion);

            $resto_insumos = $total_abonado; // inicializamos el "dinero" disponible solo para insumos

            foreach ($insumos_tratamientos as $i) {
                $valor_insumo = intval($i->valor);

                if ($resto_insumos >= $valor_insumo) {
                    $i->estado_pago = "ok";
                    $resto_insumos -= $valor_insumo;
                } elseif ($resto_insumos > 0 && $resto_insumos < $valor_insumo) {
                    $i->estado_pago = "incompleto";
                    $resto_insumos -= $valor_insumo;
                } else {
                    $i->estado_pago = "error";
                }

                $i->resto = $resto_insumos;
                $i->valor_insumo = $valor_insumo;
                $i->pagado = $total_abonado;
            }
            foreach($insumos_tratamientos as $i){
                if(isset($convenio)){
                    $i->valor_descuento = $i->valor - $i->valor * (intval($convenio->porcentaje) / 100);
                    $descuentos += $i->valor * (intval($convenio->porcentaje) / 100);
                    $i->nuevo_valor = $i->valor - $i->valor_descuento;
                }
            }

            $total_abonado_sin_insumos = $total_abonado - $valor_insumos;

            $valor_odontograma = $valores[1];

            $total_piezas_odontograma = count($odontograma_paciente);
            $resto = $total_abonado_sin_insumos;


                foreach($odontograma_paciente as $o){
                    if($o->presupuesto == 1){
                        if($resto > 0 && $resto >= intval($o->valor)){
                            $o->estado_pago = 'ok';
                            $resto -= intval($o->valor);

                        }else if($resto > 0 && $resto <= intval($o->valor)){
                            $o->estado_pago = 'incompleto';
                            $resto -= intval($o->valor);
                        }else if($resto <= 0){
                            $o->estado_pago = 'error';
                        }
                        // $o->save();
                    }


                }

                if(isset($convenio)){
                    foreach($odontograma_paciente as $o){
                        $o->valor_descuento = $o->valor - $o->valor * (intval($convenio->porcentaje) / 100);
                        $descuentos += $o->valor * (intval($convenio->porcentaje) / 100);
                        $o->nuevo_valor = $o->valor - $o->valor_descuento;
                    }
                }

            $total_para_gral = $resto;

            $maxilar_inferior_gral_diagnostico = $fichaController->dameMaxilarInferiorGeneralDiagnostico($req->id_paciente, $profesional->id_tipo_especialidad);
            $maxilar_inferior_gral_tratamiento = $fichaController->dameMaxilarInferiorGeneralTratamiento($req->id_paciente, $profesional->id_tipo_especialidad);
            $maxilar_superior_gral_diagnostico = $fichaController->dameMaxilarSuperiorGeneralDiagnostico($req->id_paciente, $profesional->id_tipo_especialidad);
            $maxilar_superior_gral_tratamiento = $fichaController->dameMaxilarSuperiorGeneralTratamiento($req->id_paciente, $profesional->id_tipo_especialidad);
            $boca_completa_gral_diagnostico = $fichaController->dameBocaCompletaGeneralDiagnostico($req->id_paciente, $profesional->id_tipo_especialidad);
            $boca_completa_gral_tratamiento = $fichaController->dameBocaCompletaGeneralTratamiento($req->id_paciente, $profesional->id_tipo_especialidad);
            $maxilar_inferior_gral_tratamientos_endo = $fichaController->dameMaxilarInferiorGeneralTratamientoEndodoncia($req->id_paciente, $profesional->id_tipo_especialidad);
            $maxilar_inferior_gral_diagnosticos_endo = $fichaController->dameMaxilarInferiorGeneralDiagnosticoEndodoncia($req->id_paciente, $profesional->id_tipo_especialidad);
            $maxilar_superior_gral_tratamientos_endo = $fichaController->dameMaxilarSuperiorGeneralTratamientoEndodoncia($req->id_paciente, $profesional->id_tipo_especialidad);
            $maxilar_superior_gral_diagnosticos_endo = $fichaController->dameMaxilarSuperiorGeneralDiagnosticoEndodoncia($req->id_paciente, $profesional->id_tipo_especialidad);
            $boca_completa_gral_tratamiento_endo = $fichaController->dameCompletaEndoTratamiento($req->id_paciente, $profesional->id_tipo_especialidad);
            $boca_completa_gral_diagnostico_endo = $fichaController->dameCompletaEndoDiagnostico($req->id_paciente, $profesional->id_tipo_especialidad);

            $todos = $this->dameTratamientosBocaGeneral($req->id_ficha_atencion, $total_para_gral);

            if(intval($total_presupuesto) <= intval($pago_actual) || intval($total_abonado) >= intval($total_presupuesto)){
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

            }


            $total_general = $valores[0] + $valores[1] + $valores[2] + $valores[3];
            $total_con_descuento = $total_general - $descuentos;
            $total_abonado = intval(str_replace('.', '', $req->monto_abonado));

            if($total_con_descuento <= $total_abonado){
                foreach($odontograma_paciente as $o){
                    $o->estado_pago = 'ok';
                }
            }
            $suma_adeudado = $total_general - $total_abonado;
            $total_abonado= 0;
            foreach($pagos_presupuesto as $p){
                $total_abonado += $p->total;
            }
            if($resto <= 0){
                //$presupuesto->estado = 0;
                //$presupuesto->save();
            }
            return [
                'estado' => 1,
                'mensaje' => 'Se ha registrado el pago correctamente',
                'pagos' => $pagos_presupuesto,
                'insumos' => $insumos_tratamientos,
                'suma_pagado' => $total_abonado,
                'odontograma' => $odontograma_paciente,
                'suma_presupuesto' => $suma_presupuesto,
                'suma_adeudado' => $suma_adeudado,
                'pago_actual' => $pago_actual,
                'resto' => $resto,
                'maxilar_superior_gral_tratamientos' => $maxilar_superior_gral_tratamiento,
                'maxilar_superior_gral_diagnosticos' => $maxilar_superior_gral_diagnostico,
                'maxilar_inferior_gral_tratamientos' => $maxilar_inferior_gral_tratamiento,
                'maxilar_inferior_gral_diagnosticos' => $maxilar_inferior_gral_diagnostico,
                'boca_completa_gral_tratamientos' => $boca_completa_gral_tratamiento,
                'boca_completa_gral_diagnosticos' => $boca_completa_gral_diagnostico,
                'todos' => $todos
            ];
        }else{
            return ['estado' => 0, 'mensaje' => 'Ha ocurrido un problema'];
        }
    }

    public function pago_urgencias(Request $req){

        try {

            if($req->id_dcto <> 0){
                $convenio = EmpresasConvenios::find($req->id_dcto);
            }
            $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
            // buscamos el presupuesto
            $total_presupuesto = $req->total_pago;
            $pago_actual = $req->monto;
            $abonado = $req->monto_abonado;

            $nuevo_pago = new PagosUrgenciaDental;
            $nuevo_pago->id_paciente = $req->id_paciente;
            $nuevo_pago->id_profesional = $profesional->id;
            $nuevo_pago->id_lugar_atencion = $req->id_lugar_atencion;
            $nuevo_pago->id_ficha_atencion = $req->id_ficha_atencion;

            $nuevo_pago->id_metodo_pago = 1;
            $nuevo_pago->fecha_pago = Carbon::now()->format('Y-m-d');
            $nuevo_pago->metodo_pago = $req->metodo;
            $nuevo_pago->total = $pago_actual;

            if($nuevo_pago->save()){
                $descuentos = 0;
                $odontograma_paciente = $this->dame_odontograma_paciente($req->id_paciente, $req->id_ficha_atencion, $req->id_lugar_atencion, $profesional->id_tipo_especialidad);
                $pagos_urgencias_dentales = PagosUrgenciaDental::where('id_ficha_atencion', $req->id_ficha_atencion)->get();
                $total_abonado = 0;
                foreach($pagos_urgencias_dentales as $p){
                    $total_abonado += intval($p->total);
                }

                return [
                    'estado' => 1,
                    'mensaje' => 'Se ha registrado el pago correctamente',
                    'pago_actual' => $pago_actual,
                ];
            }else{
                return ['estado' => 0, 'mensaje' => 'Ha ocurrido un problema'];
            }
        } catch (\Exception $e) {
            //throw $th;
            return ['estado' => 0, 'mensaje' => $e->getMessage()];
        }


    }

    public function actualizar_presupuesto(Request $req){
        try {

            //code...
        if($req->id_dcto <> 0){
            $convenio = EmpresasConvenios::find($req->id_dcto);
        }

        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $paciente = Paciente::find($req->id_paciente);
        $presupuesto = PresupuestosDental::find($req->id_presupuesto);

        if(!$presupuesto){
            $presupuesto = PresupuestosDental::where('id_paciente', $req->id_paciente)->where('id_ficha_atencion', $req->id_ficha_atencion)->first();
        }

        if($presupuesto){
            $id_ficha_atencion = $presupuesto->id_ficha_atencion;
            $descuentos = 0;
            $odontograma_paciente = $this->dame_odontograma_paciente($req->id_paciente, $id_ficha_atencion, $req->id_lugar_atencion, $profesional->id_tipo_especialidad);
            $pagos_presupuesto = $this->dame_pagos_presupuesto($presupuesto->id);
            $pagos_tratamientos_dentales = PagosPresupuestoDental::where('id_presupuesto', $presupuesto->id)->get();
            $total_abonado = 0;
            foreach($pagos_tratamientos_dentales as $p){
                $total_abonado += intval($p->total);
            }

            $valores = $this->dameValoresOdontograma($req->id_paciente, $id_ficha_atencion, $req->id_lugar_atencion, $profesional->id_tipo_especialidad);

            $suma_presupuesto = $valores[0] + $valores[1] + $valores[2] + $valores[3];

            $valor_insumos = $valores[2];
            $fichaController = new ficha_atencionController;
            $insumos_tratamientos = $fichaController->dame_insumos_tratamiento($req->id_paciente, $id_ficha_atencion);

            $resto_insumos = $total_abonado; // inicializamos el "dinero" disponible solo para insumos

            foreach ($insumos_tratamientos as $i) {
                if($i->urgencia == 1){
                    // continue
                    continue;
                }
                $valor_insumo = intval($i->valor) * intval($i->cantidad);

                if ($resto_insumos >= $valor_insumo) {
                    $i->estado_pago = "ok";
                    $resto_insumos -= $valor_insumo;
                } elseif ($resto_insumos > 0 && $resto_insumos < $valor_insumo) {
                    $i->estado_pago = "incompleto";
                    $resto_insumos -= $valor_insumo;
                } else {
                    $i->estado_pago = "error";
                }

                $i->resto = $resto_insumos;
                $i->valor_insumo = $valor_insumo;
                $i->pagado = $total_abonado;
            }



            foreach($insumos_tratamientos as $i){
                if($i->urgencia == 1){
                    continue;
                }
                if(isset($convenio)){
                    $i->valor_descuento = $i->valor - $i->valor * (intval($convenio->porcentaje) / 100);
                    $descuentos += $i->valor * (intval($convenio->porcentaje) / 100);
                    $i->nuevo_valor = $i->valor - $i->valor_descuento;
                }

                $i->nombre_marca = $i->nombre_marca ? strtoupper($i->nombre_marca) : '';
            }


            $total_abonado_sin_insumos = $total_abonado - $valor_insumos;

            $valor_odontograma = $valores[1];

            $total_piezas_odontograma = count($odontograma_paciente);
            $resto = $total_abonado_sin_insumos;

            foreach($odontograma_paciente as $o){
                if($o->urgencia == 1){
                    continue;
                }
                if($o->presupuesto == 1){
                    if($resto > 0 && $resto >= intval($o->valor)){
                        $o->estado_pago = 'ok';
                        $resto -= intval($o->valor);

                    }else if($resto > 0 && $resto <= intval($o->valor)){
                        $o->estado_pago = 'incompleto';
                        $resto -= intval($o->valor);
                    }else if($resto <= 0){
                        $o->estado_pago = 'error';
                    }
                    // $o->save();
                }
            }

            if(isset($convenio)){
                foreach($odontograma_paciente as $o){
                    if($o->urgencia == 1){
                        continue;
                    }
                    $o->valor_descuento = $o->valor - $o->valor * (intval($convenio->porcentaje) / 100);
                    $descuentos += $o->valor * (intval($convenio->porcentaje) / 100);
                    $o->nuevo_valor = $o->valor - $o->valor_descuento;
                }
            }

            $total_para_gral = $resto;

            $todos = $this->dameTratamientosBocaGeneral($id_ficha_atencion, $total_para_gral);

            foreach($todos as $o){
                // if($o->urgencia == 1){
                //     continue;
                // }
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

            $total_general = $valores[0] + $valores[1] + $valores[2] + $valores[3];
            $total_con_descuento = $total_general - $descuentos;

            if($resto <= 0){
                //$presupuesto->estado = 0;
                //$presupuesto->save();
                $examenes = ExamenesDentalPieza::where('id_paciente', $paciente->id)
                        ->where('id_profesional', $profesional->id)
                        ->where('estado', 1)
                        ->get();
                foreach($examenes as $e){
                    $e->estado = 0;
                    $e->save();
                }
            }
             $suma_adeudado = $total_general;

             $total_lab = 0;

            $fc = new ficha_atencionController();
            $ordenes_trabajo_menor = $fc->dameOrdenesTrabajoMenor($paciente->id, $profesional->id, $presupuesto->id);
            $ordenes_trabajo_mayor = $fc->dameOrdenesTrabajoMayor($paciente->id, $profesional->id, $presupuesto->id);

            foreach($ordenes_trabajo_menor as $trabajo){
                if($trabajo->presupuesto == 1){
                    $total_lab += intval($trabajo->valor_prestacion);
                }
            }

            foreach($ordenes_trabajo_mayor as $trabajo){
                if($trabajo->presupuesto == 1){
                    $total_lab += intval($trabajo->valor_prestacion);
                }
            }

            $suma_adeudado += $total_lab;

            return [
                'estado' => 1,
                'mensaje' => 'Se ha registrado el pago correctamente',
                'pagos' => $pagos_presupuesto,
                'insumos' => $insumos_tratamientos,
                'suma_pagado' => $total_abonado,
                'odontograma' => $odontograma_paciente,
                'suma_presupuesto' => $suma_presupuesto,
                'suma_adeudado' => $suma_adeudado,
                'pago_actual' => 0,
                'trabajos_lab' => $ordenes_trabajo_menor,
                'total_lab' => $total_lab,
                'resto' => $resto,
                'todos' => $todos,
                'trabajos_mayor' => $ordenes_trabajo_mayor,
                'presupuesto' => $presupuesto,
            ];
            }else{
                return ['estado' => 0,'mensaje' => 'No hay presupuesto'];
            }
        } catch (\Exception $e) {
            //throw $th;
            return ['estado' => 0, 'mensaje' => $e->getMessage()];
        }

    }

    public function actualizar_presupuesto_urg(Request $req){
        try {

            $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
            $paciente = Paciente::find($req->id_paciente);
            $fichaController = new ficha_atencionController;
            $insumos_tratamientos = $fichaController->dame_insumos_tratamiento($req->id_paciente, $req->id_ficha_atencion);
            $insumos_por_pagar = 0;
            $piezas_por_pagar = 0;
            $pagos_urgencia = PagosUrgenciaDental::select('pagos_urgencia_dental.*', 'profesionales.nombre as nombre_profesional','profesionales.apellido_uno','profesionales.apellido_dos')
                ->where('id_paciente', $req->id_paciente)
                ->where('id_ficha_atencion', $req->id_ficha_atencion)
                ->where('id_lugar_atencion', $req->id_lugar_atencion)
                ->where('id_profesional', $profesional->id)
                ->join('profesionales', 'profesionales.id', '=', 'pagos_urgencia_dental.id_profesional')
                ->get();

            $pagos = 0;
            foreach($pagos_urgencia as $p){
                $pagos += $p->total;
            }

            $total_pagos = $pagos;

            foreach ($insumos_tratamientos as $i) {
                if($i->urgencia == 0 || $i->presupuesto == 0){
                    continue; // saltamos los insumos que no son de urgencia
                }
                $valor_insumo = intval($i->valor) * intval($i->cantidad);

                if ($pagos >= $valor_insumo) {
                    $i->estado_pago = "ok";
                    $pagos -= $valor_insumo;
                } elseif ($pagos > 0 && $pagos < $valor_insumo) {
                    $i->estado_pago = "incompleto";
                    $pagos -= $valor_insumo;
                } else {
                    $i->estado_pago = "error";
                }

                $i->resto = $pagos;
                $i->valor_insumo = $valor_insumo;
            }

            foreach($insumos_tratamientos as $i){
                if($i->urgencia == 1 && $i->presupuesto == 1){
                    $a_pagar = $i->cantidad * $i->valor;
                    $insumos_por_pagar += $a_pagar;
                }
            }

            $odontograma_paciente = $this->dame_odontograma_paciente($req->id_paciente, $req->id_ficha_atencion, $req->id_lugar_atencion, $profesional->id_tipo_especialidad);

            foreach($odontograma_paciente as $o){
                if($o->urgencia != 1){
                    continue; // saltamos las piezas que no son de urgencia
                }
                if ($pagos >= intval($o->valor)) {
                    $o->estado_pago = 'ok';
                    $pagos -= intval($o->valor);
                } elseif ($pagos > 0 && $pagos < intval($o->valor)) {
                    $o->estado_pago = 'incompleto';
                    $pagos -= intval($o->valor);
                } else {
                    $o->estado_pago = 'error';
                }
            }

            foreach($odontograma_paciente as $o){
                if($o->urgencia == 1){
                    $piezas_por_pagar += $o->valor;
                }
            }

            $total_deuda = $insumos_por_pagar + $piezas_por_pagar;

            return [
                'estado' => 1,
                'mensaje' => 'ok',
                'insumos_por_pagar' => $insumos_por_pagar,
                'piezas_por_pagar' => $piezas_por_pagar,
                'odontograma' => $odontograma_paciente,
                'insumos' => $insumos_tratamientos,
                'pagos' => $total_pagos,
                'total_deuda' => $total_deuda,
                'pagos_urgencia' => $pagos_urgencia
            ];
        } catch (\Exception $e) {
            //throw $th;
            return ['estado' => 0, 'mensaje' => $e->getMessage()];
        }

    }

    public function finalizar_atencion_urg(Request $request){

        $campos_requeridos = 0;
        $mensaje = '';
        if(!$request->motivo)
        {
            //$campos_requeridos = 1;
            $mensaje .= 'El Motivo de la Consulta es Requerido.<br> Su Ficha Clínica NO ha sido Guardada aún.<br>';
        }
        //return $campos_requeridos;
        if($campos_requeridos == 0)
        {
            $hora_medica = HoraMedica::where('id', $request->id_hora_medica)->first();
            $ficha = FichaAtencion::where('id', $hora_medica->id_ficha_atencion)->first();
            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
            $id_profesional = $profesional->id;
            $id_paciente = $request->id_paciente;
            $motivo = "";
            foreach($request->motivo as $m){
                $motivo .= $m . "; ";
            }
            $ficha->motivo = $motivo;
            $ficha->antecedentes = "Atención dental de urgencia";
            $ficha->examen_fisico = "";

            $ficha->hipotesis_diagnostico = $request->descripcion_hipotesis ? $request->descripcion_hipotesis : 'Tratamiento dental';
            $ficha->diagnostico_ce10 = $request->descripcion_cie ? $request->descripcion_cie : '';
            $ficha->indicaciones = $request->indicaciones ? $request->indicaciones : '';

            $ficha->cronico = $request->cronico ? 1 : 0;
            $ficha->ges = $request->ges ? 1 : 0;
            $ficha->confidencial = $request->confidencial ? 1 : 0;
            $ficha->id_paciente = $id_paciente;
            $ficha->id_profesional = $id_profesional;
            $ficha->finalizada = 1;

            if(!$ficha->save()){
                $mensaje = 'Ha ocurrido un error al guardar la ficha clínica.';
                return back()->with('error', $mensaje)->withInput();
            }
            else
            {
                $tipo_mensaje = 'success';
                $mensaje = 'Ficha Clínica guardada de forma correcta.';


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
                $array_tem = array(
                                    'lugares_atencion' => $request->id_lugar_atencion,
                                    'pdf' => $request->mostrarpdf,
                                    'tipo' => $request->tipopdf,
                                    'id_examen' => 0,
                                );
                // se mantiene en la vista actual
                $tipo_mensaje = 'success';
                $mensaje = 'Atención de urgencia finalizada correctamente.';

                return ['estado' => 'ok', 'mensaje' => $mensaje];

            }
        }else
        {
            return ['estado' => 'error', 'mensaje' => $mensaje];
        }
    }

    public function proxima_atencion_paciente(Request $request){
        $fecha_atencion = HoraMedica::where('id_paciente', $request->id_paciente)
            ->where('id_lugar_atencion', $request->id_lugar_atencion)
            ->where('id_profesional', $request->id_profesional)
            ->where('id', '<>', $request->id_hora_medica)
            ->where('id_estado',1)
            ->orderBy('fecha_consulta', 'desc')
            ->first();

        if ($fecha_atencion) {
            return response()->json([
                'estado' => 'ok',
                'fecha_atencion' => $fecha_atencion
            ]);
        } else {
            return response()->json([
                'estado' => 'error',
                'mensaje' => 'No se encontró una próxima atención para el paciente.'
            ]);
        }
    }

    public function dame_evoluciones_od_gral(Request $request){
        $id_ficha_atencion = $request->id_ficha_atencion;
        $id_paciente = $request->id_paciente;
        $id_lugar_atencion = $request->id_lugar_atencion;
        $id_profesional = $request->id_profesional;
        $id_hora_medica = $request->id_hora_medica;

        // Usar múltiples scopes encadenados para filtrar
        $evoluciones = EvolucionOdontologiaGral::porFichaAtencion($id_ficha_atencion)
            ->porPaciente($id_paciente) // Usar el scope porPaciente
            ->porLugarAtencion($id_lugar_atencion) // Usar scope de lugar de atención
            ->with(['paciente', // Cargar todos los datos del paciente
                   'profesional', // Cargar todos los datos del profesional
                   'fichaAtencion', // Cargar todos los datos de la ficha
                   'lugarAtencion', // Cargar todos los datos del lugar de atención
                   'presupuesto', // Cargar presupuesto si existe
                   'procedimiento',
                  ])
            ->orderBy('created_at', 'desc') // Ordenar por más reciente
            ->get();

        // Cargar procedimientos de forma condicional (solo si id_procedimiento no es null y es numérico)
        $evoluciones->load(['procedimiento' => function($query) {
            $query->where('id', '!=', null);
        }]);

        // Formatear los datos para la vista
        $evoluciones_formateadas = [];
        foreach ($evoluciones as $evolucion) {
            $evoluciones_formateadas[] = [
                // Todos los datos de la evolución
                'id' => $evolucion->id,
                'pieza' => $evolucion->pieza,
                'id_procedimiento' => $evolucion->id_procedimiento,
                'obs' => $evolucion->obs,
                'evolucion' => $evolucion->evolucion,
                'id_ficha_atencion' => $evolucion->id_ficha_atencion,
                'id_paciente' => $evolucion->id_paciente,
                'id_profesional' => $evolucion->id_profesional,
                'id_lugar_atencion' => $evolucion->id_lugar_atencion,
                'id_presupuesto' => $evolucion->id_presupuesto,
                'created_at' => $evolucion->created_at,
                'updated_at' => $evolucion->updated_at,
                'fecha_formateada' => $evolucion->created_at->format('d/m/Y H:i'),

                // Datos del paciente completos
                'paciente' => $evolucion->paciente,
                'paciente_nombre_completo' => $evolucion->paciente ?
                    $evolucion->paciente->nombres . ' ' . $evolucion->paciente->apellido_uno . ' ' . $evolucion->paciente->apellido_dos : 'No disponible',

                // Datos del profesional completos
                'profesional' => $evolucion->profesional,
                'profesional_nombre_completo' => $evolucion->profesional ?
                    $evolucion->profesional->nombre . ' ' . $evolucion->profesional->apellido_uno . ' ' . $evolucion->profesional->apellido_dos : 'No disponible',

                // Datos de la ficha de atención completos
                'ficha_atencion' => $evolucion->fichaAtencion,

                // Datos del lugar de atención completos
                'lugar_atencion' => $evolucion->lugarAtencion,
                'lugar_atencion_nombre' => $evolucion->lugarAtencion ?
                    $evolucion->lugarAtencion->nombre_lugar : 'No disponible',

                // Datos del presupuesto (si existe)
                'presupuesto' => $evolucion->presupuesto ?? null,

                // Procedimiento - manejo condicional
                'procedimiento' => $evolucion->procedimiento ?? null,
                'procedimiento_info' => [
                    'tiene_relacion' => $evolucion->procedimiento !== null,
                    'id_procedimiento_raw' => $evolucion->id_procedimiento,
                    'es_numerico' => is_numeric($evolucion->id_procedimiento),
                    'debug_info' => [
                        'tipo' => gettype($evolucion->id_procedimiento),
                        'valor' => $evolucion->id_procedimiento
                    ]
                ],

                // Datos formateados para compatibilidad con el frontend existente
                'n_pieza' => $evolucion->pieza, // Corregir el nombre del campo
                'proc' => $evolucion->id_procedimiento, // Usar id_procedimiento como proc
                'fecha' => $evolucion->created_at->format('d/m/Y H:i'), // Alias para compatibilidad
                'profesional_simple' => $evolucion->profesional ?
                    $evolucion->profesional->nombre . ' ' . $evolucion->profesional->apellido_uno : 'No disponible',
            ];
        }

        if ($evoluciones->count() > 0) {
            // Generar historia clínica en formato texto
            $historia_clinica = $this->generarHistoriaClinica($evoluciones);

            // Extraer piezas únicas de las evoluciones
            $piezas_tratadas = $evoluciones->pluck('pieza')
                                         ->filter(function($pieza) {
                                             return !empty($pieza) && !is_null($pieza);
                                         })
                                         ->unique()
                                         ->sort()
                                         ->values()
                                         ->toArray();

            return response()->json([
                'estado' => 'ok',
                'evoluciones' => $evoluciones_formateadas,
                'evoluciones_raw' => $evoluciones, // Datos completos sin formatear
                'historia_clinica' => $historia_clinica, // Nueva historia en formato texto
                'piezas_tratadas' => $piezas_tratadas, // Array simple de piezas únicas
                'total_evoluciones' => $evoluciones->count(),
                'informacion_adicional' => [
                    'id_ficha_atencion' => $id_ficha_atencion,
                    'id_paciente' => $id_paciente,
                    'id_lugar_atencion' => $id_lugar_atencion,
                    'id_profesional' => $id_profesional
                ]
            ]);
        } else {
            return response()->json([
                'estado' => 'ok',
                'evoluciones' => [],
                'evoluciones_raw' => [],
                'historia_clinica' => 'No hay evoluciones registradas para generar historia clínica.',
                'piezas_tratadas' => [], // Array vacío si no hay evoluciones
                'mensaje' => 'No se encontraron evoluciones para esta ficha.',
                'total_evoluciones' => 0
            ]);
        }
    }

    /**
     * Generar historia clínica en formato texto a partir de las evoluciones
     */
    private function generarHistoriaClinica($evoluciones)
    {
        $historia = "";

        if ($evoluciones->count() === 0) {
            return "No hay tratamientos registrados.";
        }

        // Agrupar evoluciones por pieza dental
        $evoluciones_por_pieza = $evoluciones->groupBy('pieza');

        // Procesar cada pieza dental
        foreach ($evoluciones_por_pieza as $pieza => $evoluciones_pieza) {
            if (empty($pieza)) continue; // Saltar si no hay pieza definida

            $historia .= "La pieza {$pieza} ";

            // Obtener todas las evoluciones de esta pieza (ordenadas por fecha)
            $tratamientos_pieza = [];

            foreach ($evoluciones_pieza->sortBy('created_at') as $evolucion) {
                $tratamiento_texto = "";
                $fecha_hora = $evolucion->created_at->format('d/m/Y H:i');

                // Si tiene evolución registrada, usar esa descripción
                if ($evolucion->evolucion && !empty(trim($evolucion->evolucion))) {
                    $tratamiento_texto = trim($evolucion->evolucion) . " ({$fecha_hora})";
                }
                // Si no tiene evolución pero tiene procedimiento, usar la descripción del procedimiento
                elseif ($evolucion->procedimiento && $evolucion->procedimiento->descripcion) {
                    $tratamiento_texto = "se ha realizado " . $evolucion->procedimiento->descripcion . " ({$fecha_hora})";
                }
                // Si tiene observaciones del procedimiento
                elseif ($evolucion->obs && !empty(trim($evolucion->obs))) {
                    $tratamiento_texto = "se ha realizado " . trim($evolucion->obs) . " ({$fecha_hora})";
                }
                // Si solo tiene código de procedimiento
                elseif ($evolucion->id_procedimiento) {
                    $tratamiento_texto = "se ha aplicado procedimiento código " . $evolucion->id_procedimiento . " ({$fecha_hora})";
                }

                if (!empty($tratamiento_texto)) {
                    $tratamientos_pieza[] = $tratamiento_texto;
                }
            }

            // Unir todos los tratamientos de la pieza
            if (!empty($tratamientos_pieza)) {
                if (count($tratamientos_pieza) === 1) {
                    $historia .= $tratamientos_pieza[0];
                } else {
                    // Si hay múltiples tratamientos, separarlos con comas y "y" para el último
                    $ultimo_tratamiento = array_pop($tratamientos_pieza);
                    $historia .= implode(", ", $tratamientos_pieza) . " y " . $ultimo_tratamiento;
                }
            } else {
                $historia .= "ha sido tratada";
            }

            $historia .= ".\n";
        }

        // Si no hay piezas específicas pero hay evoluciones generales
        $evoluciones_sin_pieza = $evoluciones->filter(function($evolucion) {
            return empty($evolucion->pieza);
        });

        if ($evoluciones_sin_pieza->count() > 0) {
            $historia .= "\nTratamientos generales realizados:\n";

            foreach ($evoluciones_sin_pieza as $evolucion) {
                $tratamiento_general = "";
                $fecha_hora = $evolucion->created_at->format('d/m/Y H:i');

                if ($evolucion->evolucion && !empty(trim($evolucion->evolucion))) {
                    $tratamiento_general = trim($evolucion->evolucion);
                } elseif ($evolucion->procedimiento && $evolucion->procedimiento->descripcion) {
                    $tratamiento_general = $evolucion->procedimiento->descripcion;
                } elseif ($evolucion->obs && !empty(trim($evolucion->obs))) {
                    $tratamiento_general = trim($evolucion->obs);
                }

                if (!empty($tratamiento_general)) {
                    $historia .= "- " . $tratamiento_general . " ({$fecha_hora}).\n";
                }
            }
        }

        return trim($historia);
    }

    public function eliminar_pago_presupuesto(Request $req)
    {

        $pago = PagosPresupuestoDental::find($req->id);

        if ($pago && $pago->delete()) {
            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

            $pagos = $this->dame_pagos_presupuesto($req->id_presupuesto);
            $total_pagado = $pagos->sum('total');

            $resultado = $this->recalcularPagosYDescuentos(
                $req->id_paciente,
                $req->id_ficha_atencion,
                $req->id_lugar_atencion,
                $profesional->id_tipo_especialidad,
                $total_pagado,
                $req->id_dcto // puede ser 0 si no hay convenio
            );

            $total_lab = 0;
            $fc = new ficha_atencionController();
            $ordenes_trabajo_menor = $fc->dameOrdenesTrabajoMenor($req->id_paciente, $profesional->id, $req->id_presupuesto);
            $ordenes_trabajo_mayor = $fc->dameOrdenesTrabajoMayor($req->id_paciente, $profesional->id, $req->id_presupuesto);

            foreach ($ordenes_trabajo_menor as $trabajo) {
                if ($trabajo->presupuesto == 1) {
                    $total_lab += intval($trabajo->valor_prestacion);
                }
            }

            foreach ($ordenes_trabajo_mayor as $trabajo) {
                if ($trabajo->presupuesto == 1) {
                    $total_lab += intval($trabajo->valor_prestacion);
                }
            }

            return array_merge(
                ['estado' => 'ok'],
                $resultado,
                ['pagos' => $pagos, 'total_abonado' => $total_pagado,'total_lab' => $total_lab, 'trabajos_menor' => $ordenes_trabajo_menor, 'trabajos_mayor' => $ordenes_trabajo_mayor]
            );
        } else {
            return [
                'estado' => 'error',
                'mensaje' => 'Ha ocurrido un problema'
            ];
        }
    }

    public function eliminar_pago_urgencias(Request $req){

        $pago = PagosUrgenciaDental::find($req->id_pago);

        if ($pago && $pago->delete()) {
            return [
                'estado' => 'ok',
                'mensaje' => 'Pago eliminado correctamente'
            ];
        } else {
            return [
                'estado' => 'error',
                'mensaje' => 'Ha ocurrido un problema'
            ];
        }
    }

    private function recalcularPagosYDescuentos($id_paciente, $id_ficha, $id_lugar, $id_especialidad, $monto_abonado, $id_convenio = 0)
    {
        $ep = new EscritorioProfesional;
        $fc = new ficha_atencionController;
        $odontograma = $fc->dameOdontogramaPaciente($id_paciente, $id_ficha, $id_lugar, $id_especialidad);
        $valores = $ep->dameValoresOdontograma($id_paciente, $id_ficha, $id_lugar, $id_especialidad);
        $insumos = $ep->dame_insumos_tratamiento($id_paciente, $id_ficha);
        $todos = $ep->dameTratamientosBocaGeneral($id_ficha);

        $descuentos = 0;
        $porcentaje_descuento = 0;

        if ($id_convenio != 0) {
            $convenio = EmpresasConvenios::find($id_convenio);
            $porcentaje_descuento = intval($convenio->porcentaje);
        }

        // Aplicar descuento
        foreach ($insumos as $i) {
            $total_insumo = $i->cantidad * $i->valor;
            $descuento = $total_insumo * ($porcentaje_descuento / 100);
            $i->valor_descuento = $descuento;
            $i->nuevo_valor = $total_insumo - $descuento;
            $descuentos += $descuento;
        }

        foreach ($odontograma as $o) {
            $descuento = $o->valor * ($porcentaje_descuento / 100);
            $o->valor_descuento = $descuento;
            $o->nuevo_valor = $o->valor - $descuento;
            $descuentos += $descuento;
        }

        foreach ($todos as $o) {
            $descuento = $o->valor * ($porcentaje_descuento / 100);
            $o->valor_descuento = $descuento;
            $o->nuevo_valor = $o->valor - $descuento;
            $descuentos += $descuento;
        }

        // Pago progresivo
        $resto_pago = $monto_abonado;

        foreach ($insumos as $i) {
            $valor = intval($i->nuevo_valor);
            if ($resto_pago >= $valor) {
                $i->estado_pago = 'ok';
                $resto_pago -= $valor;
            } elseif ($resto_pago > 0) {
                $i->estado_pago = 'incompleto';
                $resto_pago = 0;
            } else {
                $i->estado_pago = 'error';
            }
        }

        foreach ($odontograma as $o) {
            $valor = intval($o->nuevo_valor);
            if ($resto_pago >= $valor) {
                $o->estado_pago = 'ok';
                $resto_pago -= $valor;
            } elseif ($resto_pago > 0) {
                $o->estado_pago = 'incompleto';
                $resto_pago = 0;
            } else {
                $o->estado_pago = 'error';
            }
        }

        foreach ($todos as $o) {
            if ($o->presupuesto == 1) {
                $valor = intval($o->nuevo_valor);
                if ($resto_pago >= $valor) {
                    $o->estado_pago = 'ok';
                    $resto_pago -= $valor;
                } elseif ($resto_pago > 0) {
                    $o->estado_pago = 'incompleto';
                    $resto_pago = 0;
                } else {
                    $o->estado_pago = 'error';
                }
            }
        }

        $total_general = $valores[0] + $valores[1] + $valores[2];
        $total_con_descuento = $total_general - $descuentos;

        return [
            'odontograma' => $odontograma,
            'insumos' => $insumos,
            'todos' => $todos,
            'valores' => $valores,
            'descuentos' => $descuentos,
            'total_general' => $total_general,
            'total_con_descuento' => $total_con_descuento,
            'suma_pagado' => $monto_abonado - $resto_pago
        ];
    }

    public function guardar_pieza_periodonto(Request $req)
    {
        // Extraer solo los datos del cuerpo
        $datosCuerpo = $req->except(['id_ficha_atencion', 'pieza']);

        // Buscar si ya existe la pieza
        $pieza = PiezaPeriodontograma::where('id_ficha_atencion', $req->id_ficha_atencion)
            ->where('pieza', $req->pieza)
            ->first();

        if ($pieza) {
            // Actualizar el cuerpo existente
            $pieza->update([
                'cuerpo' => $datosCuerpo
            ]);
        } else {
            // Crear una nueva si no existe
            $pieza = PiezaPeriodontograma::create([
                'id_ficha_atencion' => $req->id_ficha_atencion,
                'pieza' => $req->pieza,
                'cuerpo' => $datosCuerpo
            ]);
        }


        return response()->json([
            'success' => true,
            'pieza_guardada' => $pieza
        ]);
    }




    public function registrar_pedidos_insumos(Request $req){
        return $req;
    }

    public function dame_pagos_presupuesto($id_presupuesto){
        $pagos = PagosPresupuestoDental::where('id_presupuesto', $id_presupuesto)->get();
        return $pagos;
    }

    public function eliminar_insumos_tratamiento(Request $req){

        $insumo = InsumosTratamientosDental::find($req->id);

        $id_paciente = $insumo->id_paciente;
        $id_ficha_atencion = $insumo->id_ficha_atencion;
        $id_lugar_atencion = $insumo->id_lugar_atencion;
        $id_tto = $insumo->id_tratamiento;

        $presupuesto = PresupuestosDental::where('id_paciente', $id_paciente)->where('id_ficha_atencion', $id_ficha_atencion)->first();

        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        if($insumo->delete()){
            try {
                $insumos = $this->dame_insumos_tratamiento_todos($id_paciente, $id_ficha_atencion,null, null);
                $valores = $this->dameValoresOdontograma($id_paciente, $id_ficha_atencion, $req->id_lugar_atencion, $profesional->id_tipo_especialidad);
                $valor_total = $valores[0] + $valores[1] + $valores[2] + $valores[3];

                $presupuesto->valor_total = $valor_total;
                $presupuesto->save();
                return ['mensaje'=>'ok','insumos'=>$insumos['insumos'],'total_insumos' => $insumos['total'],'valores' => $valores];
            }catch (\Exception $e) {
                //throw $th;
                return ['mensaje' => $e->getMessage()];
            }
        }
    }

    public function dame_insumos_tipo(Request $req){
        $insumos = MaterialesImplantologia::where('id_tipo_insumo',$req->id_tipo_insumo)->get();

        if(count($insumos) > 0){
            return $insumos;
        }else{
            $insumos = MaterialesImplantologia::all();
            return $insumos;
        }
    }

    public function dame_insumos_tratamiento(Request $req){
        $insumos = $this->dame_insumos_tratamiento_todos($req->id_paciente, $req->id_ficha_atencion, $req->id, null);
        return ['mensaje' => 'ok', 'insumos' => $insumos['insumos'],'total_insumos' => $insumos['total']];
    }

    public function dame_prestaciones_presupuesto(Request $req)
    {
        $total_abonado = intval(str_replace('.', '', $req->monto_abonado));

        $convenio = $req->tiene_dcto ? EmpresasConvenios::find($req->tiene_dcto) : null;

        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

        $fc = new ficha_atencionController;
        $total_lab = 0;
        $ordenes_trabajo_menor = $fc->dameOrdenesTrabajoMenor($req->id_paciente, $profesional->id, $req->id_ficha_atencion);
        $ordenes_trabajo_mayor = $fc->dameOrdenesTrabajoMayor($req->id_paciente, $profesional->id, $req->id_ficha_atencion);

        $odontograma = $this->dame_odontograma_paciente(
            $req->id_paciente,
            $req->id_ficha_atencion,
            $req->id_lugar_atencion,
            $profesional->id_tipo_especialidad
        );

        $fichaController = new ficha_atencionController;
        $insumos = $fichaController->dame_insumos_tratamiento($req->id_paciente, $req->id_ficha_atencion);

        $todos = $this->dameTratamientosBocaGeneral(
            $req->id_ficha_atencion
        );

        $valores = $this->dameValoresOdontograma(
            $req->id_paciente,
            $req->id_ficha_atencion,
            $req->id_lugar_atencion,
            $profesional->id_tipo_especialidad
        );

        $total_general = $valores[0] + $valores[1] + $valores[2] + $valores[3];
        $total_con_descuento = $total_general; // se mantiene por claridad
        $resto_pago = $total_abonado;


        // Si no hay convenio, trabajamos con los valores normales
        // foreach ($odontograma as $o) {
        //     unset($o->nuevo_valor); // opcional si existía antes
        // }
        // foreach ($insumos as $i) {
        //     unset($i->nuevo_valor);
        // }

        foreach ($insumos as $i) {
            $valor_unitario = intval($i->valor);
            $valor_total = $valor_unitario * intval($i->cantidad);

            if ($resto_pago >= $valor_total) {
                $i->estado_pago = 'ok';
                $resto_pago -= $valor_total;
            } elseif ($resto_pago > 0) {
                $i->estado_pago = 'incompleto';
                $resto_pago = 0;
            } else {
                $i->estado_pago = 'error';
            }
        }

        foreach ($ordenes_trabajo_menor as $o) {
            $valor = intval($o->valor_prestacion);
            if ($resto_pago >= $valor) {
                $o->estado_pago = 'ok';
                $resto_pago -= $valor;
            } elseif ($resto_pago > 0) {
                $o->estado_pago = 'incompleto';
                $resto_pago = 0;
            } else {
                $o->estado_pago = 'error';
            }
            $total_lab += $valor; // Acumulamos el total de los trabajos menores
        }

        foreach ($ordenes_trabajo_mayor as $o) {
            $valor = intval($o->valor_prestacion);
            if ($resto_pago >= $valor) {
                $o->estado_pago = 'ok';
                $resto_pago -= $valor;
            } elseif ($resto_pago > 0) {
                $o->estado_pago = 'incompleto';
                $resto_pago = 0;
            } else {
                $o->estado_pago = 'error';
            }
            $total_lab += $valor; // Acumulamos el total de los trabajos mayores
        }

        // Recalcular estados de pago
        foreach ($odontograma as $o) {
            $valor = isset($o->nuevo_valor) ? intval($o->nuevo_valor) : intval($o->valor);
            if ($resto_pago >= $valor) {
                $o->estado_pago = 'ok';
                $resto_pago -= $valor;
            } elseif ($resto_pago > 0) {
                $o->estado_pago = 'incompleto';
                $resto_pago = 0;
            } else {
                $o->estado_pago = 'error';
            }
        }



        foreach($todos as $o){
            if($o->presupuesto == 1){
                $valor = intval($o->valor);
                if ($resto_pago >= $valor) {
                    $o->estado_pago = 'ok';
                    $resto_pago -= $valor;
                } elseif ($resto_pago > 0) {
                    $o->estado_pago = 'incompleto';
                    $resto_pago = 0;
                } else {
                    $o->estado_pago = 'error';
                }
            }
        }



        return [
            'odontograma' => $odontograma,
            'insumos' => $insumos,
            'valores' => $valores,
            'total_general' => $total_general,
            'total_abonado' => $total_abonado,
            'convenio_aplicado' => $convenio ? true : false,
            'total_lab' => $total_lab,
            'todos' => $todos
        ];
    }


    public function generar_pdf_prot_impl(Request $req){
        try {
            $id_ficha_atencion = $req->id_ficha_atencion;
            $ficha_atencion = FichaAtencion::find($id_ficha_atencion);
            $lugar_atencion = LugarAtencion::find($ficha_atencion->id_lugar_atencion);

            $paciente = Paciente::find($ficha_atencion->id_paciente);
            $profesional = Profesional::find($ficha_atencion->id_profesional);
            if($profesional == null){
                $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
            }
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
                'nombre' => $lugar_atencion->nombre
            ];

            $array_profesional = [
                'id' => $profesional->id,
                'nombre' => $profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos,
                'rut' => $profesional->rut,
                'especialidad' => optional($profesional->SubTipoEspecialidad()->first())->nombre,
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
            $cuerpo = [
                    'array_ficha_atencion' => $array_ficha_atencion,
                    'array_lugar_atencion' => $array_lugar_atencion,
                    'array_profesional' => $array_profesional,
                    'array_paciente' => $array_paciente
                ];


                $titulo = 'PROTOCOLO DENTAL ';
            // Recibir los datos desde el request
            $data = $req->all();
            $id_paciente = $req->id_paciente;
            $nombre_cir = $req->nombre_cir;
            $nombre_cir_nuevo = $req->nombre_cir_nuevo ?? '';
            $nombre_anest = $req->nombre_anest;
            $nombre_ars = $req->nombre_arsenalera ?? '';
            $implantes = $req->implantes;
            $insumos = $req->implantes_insumos;

            $insumos_array = [];
            foreach($insumos as $i){
                $insumo = InsumosTratamientosDental::find($i);
                array_push($insumos_array,$insumo);
            }
            $forma_mat_impl = $req->forma_mat_impl;
            $prot_prot_corona = $req->prot_prot_corona;
            $det_cir = $req->det_cir;
            $nombre_tons = $req->nombre_tons;
            $prot_pieza_imp = $req->prot_pieza_imp;
            //code...
            // Renderizar la vista del presupuesto dental
            $pdf = Pdf::loadView('atencion_odontologica.PDF.protocolo_implantes_dental',compact(
                'id_paciente',
                'nombre_cir',
                'nombre_cir_nuevo',
                'nombre_anest',
                'nombre_ars',
                'implantes',
                'insumos_array',
                'forma_mat_impl',
                'prot_prot_corona',
                'det_cir',
                'nombre_tons',
                'prot_pieza_imp',
                'titulo',
                'cuerpo',
                'array_ficha_atencion',
                'array_lugar_atencion',
                'array_profesional',
                'array_paciente'
            ));
            // Guardar el PDF en la carpeta public
            $fileName = 'presupuesto_dental_' . $req->id_paciente . '.pdf';
            $filePath = public_path('reportes/' . $fileName);
            file_put_contents($filePath, $pdf->output());

            // Devolver la ruta accesible del archivo PDF
            return response()->json(['ruta' => asset('reportes/' . $fileName)]);
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }

    public function generar_pdf_prot_endodoncia(Request $req){
        try {

            $id_ficha_atencion = $req->id_ficha_atencion;
            $ficha_atencion = FichaAtencion::find($id_ficha_atencion);
            $lugar_atencion = LugarAtencion::with('direccion')->find($ficha_atencion->id_lugar_atencion);

            $paciente = Paciente::find($ficha_atencion->id_paciente);
             $profesional = Profesional::with('direccion')->find($ficha_atencion->id_profesional);

            if($profesional == null){
                $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
            }
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
            $cuerpo = [
                    'array_ficha_atencion' => $array_ficha_atencion,
                    'array_lugar_atencion' => $array_lugar_atencion,
                    'array_profesional' => $array_profesional,
                    'array_paciente' => $array_paciente
                ];


                $titulo = 'PROTOCOLO DENTAL ';
            // Recibir los datos desde el request
            $data = $req->all();
            $id_paciente = $req->id_paciente;
            $nombre_cir = $req->nombre_cir;
            $nombre_cir_nuevo = $req->nombre_cir_nuevo ?? '';
            $nombre_anest = $req->nombre_anest;
            $nombre_ars = $req->nombre_arsenalera ?? '';

            $forma_mat_end = $req->mat_relleno_end;
            $prot_prot_corona = $req->prot_prot_corona;
            $det_cir = $req->det_cir;
            $nombre_tons = $req->nombre_tons;
            $prot_pieza_imp = $req->prot_pieza_imp;
            //code...
            // Renderizar la vista del presupuesto dental
            $pdf = Pdf::loadView('atencion_odontologica.PDF.protocolo_endodoncia_dental',compact(
                'id_paciente',
                'nombre_cir',
                'nombre_cir_nuevo',
                'nombre_anest',
                'nombre_ars',
                'forma_mat_end',
                'prot_prot_corona',
                'det_cir',
                'nombre_tons',
                'prot_pieza_imp',
                'titulo',
                'cuerpo',
                'array_ficha_atencion',
                'array_lugar_atencion',
                'array_profesional',
                'array_paciente'
            ));
            // Guardar el PDF en la carpeta public
            $fileName = 'presupuesto_dental_' . $req->id_paciente . '.pdf';
            $filePath = public_path('reportes/' . $fileName);
            file_put_contents($filePath, $pdf->output());

            // Devolver la ruta accesible del archivo PDF
            return response()->json(['ruta' => asset('reportes/' . $fileName)]);
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }
    }

    public function dame_tratamientos_pieza_impl(Request $req){
        $tratamientos = OdontogramaPaciente::where('id_paciente', $req->id_paciente)
            ->where('id_ficha_atencion', $req->id_ficha_atencion)
            ->where('pieza', $req->pieza)
            ->where('presupuesto', 1)
            ->where('estado',0)
            ->get();

        return ['tratamientos' => $tratamientos];
    }

    public function dame_tratamientos_pieza_gral(Request $req){

        $tratamientos = OdontogramaPaciente::where('id_paciente', $req->id_paciente)
            ->where('id_ficha_atencion', $req->id_ficha_atencion)
            ->where('pieza', $req->n_pieza)
            ->where('presupuesto', 1)
            ->where('estado',0)
            ->get();

        return ['tratamientos' => $tratamientos];
    }

    public function dame_insumos_tratamiento_todos($id_paciente,$id_ficha_atencion,$id_tto, $tipo){
        try {
            if($id_tto){
                if(!$tipo){
                    $pieza = OdontogramaPaciente::find($id_tto);

                }else{
                    $pieza = ExamenesBocaGeneral::find($id_tto);
                }
                $insumos = InsumosTratamientosDental::where('id_paciente', $id_paciente)->where('id_ficha_atencion',$id_ficha_atencion)->where('id_tratamiento', $id_tto)->get();
                $suma = 0;
                foreach($insumos as $i){
                    $suma += $i->valor;
                    $i->insumos = mb_strtoupper($i->insumos, 'UTF-8');
                    $i->nombre_marca = $i->nombre_marca ? mb_strtoupper($i->nombre_marca, 'UTF-8') : '';
                }
                return ['mensaje' => 'ok','insumos' =>$insumos,'total' => $suma];
            }else{
                $insumos = InsumosTratamientosDental::where('id_paciente', $id_paciente)->where('id_ficha_atencion',$id_ficha_atencion)->get();
                $suma = 0;
                foreach($insumos as $i){
                    $suma += $i->valor;
                    $i->insumos = mb_strtoupper($i->insumos, 'UTF-8');
                    $i->nombre_marca = $i->nombre_marca ? mb_strtoupper($i->nombre_marca, 'UTF-8') : '';
                }
                return ['mensaje' => 'ok','insumos' =>$insumos,'total' => $suma];
            }

        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }

    public function importacion_datos_excel(){
        return view('app.dental.importacion_datos_excel');
    }

    public function registrar_control_endodoncia(Request $request)
    {
        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();

        $control_endodoncia = new ControlEndodonciaPaciente();
        $control_endodoncia->fecha = \Carbon\Carbon::parse($request->fecha)->format('Y-m-d');
        $control_endodoncia->nro_pieza = $request->nro_pieza;
        $control_endodoncia->respuesta_calor = $request->resp_calor;
        $control_endodoncia->respuesta_frio = $request->resp_frio;
        $control_endodoncia->electrico = $request->electrico;
        $control_endodoncia->percucion = $request->percucion;
        $control_endodoncia->exploracion = $request->exploracion;
        $control_endodoncia->cavitaria = $request->cavitaria;

        $control_endodoncia->id_paciente = $request->id_paciente;
        $control_endodoncia->id_profesional = $profesional->id;

        //$control_endodoncia->id_ficha_atencion = $request->;

        //$control_endodoncia->id_lugar_atencion = $request->;



        if (!$control_endodoncia->save()) {

            return back();

        }

        $mensaje = 'Se ha agregado control de endodoncia de forma exitosa';



        return json_encode($control_endodoncia);

    }



    public function listar_odontograma_infantil(Request $request)

    {



        $odontogramas = OdontogramaPaciente::where('pieza', $request->pieza)->where('id_paciente', $request->id_paciente)->get();



        return json_encode($odontogramas);

    }



    public function get_tipo_examen(Request $request)

    {

        $examenMedico = ExamenMedico::where('cod_parent', 0)->get();



        return json_encode($examenMedico);

    }



    public function get_sub_tipo_examen(Request $request)

    {

        $sub_tipo_examen = ExamenMedico::where('cod_parent', $request->tipo_examen)->get();





        return json_encode($sub_tipo_examen);

    }



    public function get_examen(Request $request)

    {

        $examen = ExamenMedico::where('cod_parent', $request->sub_tipo_examen)->get();

        return json_encode($examen);

    }



    public function registrar_constancia_ges(Request $request)

    {



        $user = Auth::user()->id;

        $profesional = Profesional::where('id_usuario', $user)->first();



        $constancias_ges = new ConstanciaGes();

        $constancias_ges->confirmacion_ges = $request->confirmacion_ges_diagnostica_constancia_ges;

        $constancias_ges->confirmacion_diagnostico = $request->confirmacion_diagnostica_constancia_ges;

        $constancias_ges->paciente_tratamiento = $request->paciente_tratamiento_constancia_ges;

        $constancias_ges->fecha_notificacion = \Carbon\Carbon::parse($request->fecha_constancia_ges)->format('Y-m-d');

        $constancias_ges->hora_notificacion = \Carbon\Carbon::parse($request->hora_constancia_ges)->format('H:i');

        $constancias_ges->id_paciente = $request->paciente_constancia_ges;

        $constancias_ges->id_profesional = $profesional->id;

        $constancias_ges->id_lugar_atencion = $request->lugar_constancia_ges;



        //$constancias_ges->id_lugar_atencion



        if (!$constancias_ges->save()) {

            return back();

        }

        $mensaje = 'Se ha agregado Constancia ges de forma exitosa';



        return redirect()->back()->with('mensaje', $mensaje);

    }



    public function registrar_declaracion_eno(Request $request)

    {



        $user = Auth::user()->id;

        $profesional = Profesional::where('id_usuario', $user)->first();



        //\Carbon\Carbon::parse($request->fecha_consulta)->format('H:i:s');



        $declaracion_eno = new DeclaracionEno();

        $declaracion_eno->nombre_establecimiento = $request->nombre_establecimiento;

        $declaracion_eno->codigo_establecimiento = $request->codigo_establecimiento;

        $declaracion_eno->nombre_oficina = $request->nombre_oficina_provincial;

        $declaracion_eno->codigo_oficina = $request->codigo_oficina_provincial;

        $declaracion_eno->nacionalidad_paciente = $request->nacionalidad_paciente_eno;

        $declaracion_eno->codigo_nacionalidad_paciente = $request->cod_nacionalidad_paciente_eno;

        $declaracion_eno->ocupacion_paciente = $request->ocupacion_paciente_eno;

        $declaracion_eno->pueblo_originario_paciente = $request->pueblo_originario_eno;

        $declaracion_eno->condicion_paciente = $request->ocupacion_condicion_eno;

        $declaracion_eno->categoria_paciente = $request->ocupacion_categoria_eno;

        $declaracion_eno->diagnositico_confirmado = $request->diagnostico_confirmado_eno;

        $declaracion_eno->diagnostico_cie = $request->cie_10_eno;

        $declaracion_eno->primeros_sintomas = \Carbon\Carbon::parse($request->fecha_primeros_sintomas_eno)->format('Y-m-d');

        $declaracion_eno->pais_contagio = $request->pais_contagio_eno;

        $declaracion_eno->pais = $request->pais_eno;

        $declaracion_eno->vacunacion = $request->vacunacion_eno;

        $declaracion_eno->fecha_ultima_dosis = \Carbon\Carbon::parse($request->fecha_ultima_dosis_eno)->format('Y-m-d');

        $declaracion_eno->numero_ultima_dosis = $request->numero_ultima_dosis_eno;

        $declaracion_eno->tbc = $request->nuevo_tbc_eno;

        $declaracion_eno->tbc_recaidas = $request->recaidas_tbc_eno;

        $declaracion_eno->fecha_notificacion = \Carbon\Carbon::parse($request->fecha_eno)->format('Y-m-d');

        $declaracion_eno->hora_notificacion = \Carbon\Carbon::parse($request->hora_eno)->format('H:i');

        $declaracion_eno->id_paciente = $request->paciente_declaracion_eno;

        $declaracion_eno->id_profesional = $profesional->id;

        $declaracion_eno->id_lugar_atencion = $request->lugar_declaracion_eno;



        //$constancias_ges->id_lugar_atencion



        if (!$declaracion_eno->save()) {

            return back();

        }

        $mensaje = 'Se ha agregado Declaración ENO de forma exitosa';



        return redirect()->back()->with('mensaje', $mensaje);

    }



    public function registrar_gastos(Request $request)

    {



        $user = Auth::user()->id;

        $profesional = Profesional::where('id_usuario', $user)->first();



        //\Carbon\Carbon::parse($request->fecha_consulta)->format('H:i:s');



        $gasto = new GastoMedico();

        $gasto->aseguradora = $request->aseguradora_gastos_medicos;

        $gasto->nro_poliza = $request->num_poliza_gastos_medicos;

        $gasto->empresa_asociada = $request->empresa_asociada_gastos_medicos;

        $gasto->nombre_asegurado = $request->nombre_asegurado_gastos_medicos;

        $gasto->rut_asegurado = $request->rut_asegurado_gastos_medicos;

        $gasto->prevision = $request->prevision_gastos_medicos;

        $gasto->nombre_paciente_asegurado = $request->nombre_paciente_asegurado_gastos_medicos;

        $gasto->tipo_carga = $request->tipo_carga_gastos_medicos;

        $gasto->edad = $request->edad_gastos_medicos;

        $gasto->nro_carga = $request->numero_carga_gastos_medicos;

        $gasto->causa = $request->causa_gastos_medicos;

        $gasto->especifique_otro = $request->especifique_otro_gastos_medicos;

        $gasto->diagnostico = $request->diagnostico_causa_gastos_medicos;

        $gasto->continuidad_tratamiento = $request->continuidad_gastos_medicos;

        $gasto->fecha_accidente = \Carbon\Carbon::parse($request->fecha_accidente_gastos_medicos)->format('Y-m-d');

        $gasto->tipo_accidente = $request->tipo_accidente_gastos_medicos;

        $gasto->fecha_prestacion = \Carbon\Carbon::parse($request->fecha_prestación_gastos_medicos)->format('Y-m-d');

        $gasto->bonos = $request->bonos_gastos_medicos;

        $gasto->total_documentos = $request->total_documentos_gastos_medicos;

        $gasto->boletas = $request->boletas_gastos_medicos;

        $gasto->recetas = $request->recetas_gastos_medicos;

        $gasto->diferencia_reclamada = $request->diferencia_reclamada_gastos_medicos;

        $gasto->otros = $request->otros_gastos_medicos;

        $gasto->nro_reclamos = $request->numero_reclamos_gastos_medicos;

        $gasto->fecha_ingreso = \Carbon\Carbon::parse($request->fecha_ingreso_gastos_medicos)->format('Y-m-d');

        $gasto->otros1 = $request->otros1_gastos_medicos;

        $gasto->fecha_reclamo_anterior = \Carbon\Carbon::parse($request->reclamo_anterior_gastos_medicos)->format('Y-m-d');

        $gasto->autorizacion_usuario = $request->autorizacion_usuario_gastos_medicos;

        $gasto->fecha_inicio_enfermedad = \Carbon\Carbon::parse($request->fecha_inicio_enfermedad_gastos_medicos)->format('Y-m-d');

        $gasto->fecha_primera_consulta = \Carbon\Carbon::parse($request->fecha_primera_consulta_gastos_medicos)->format('Y-m-d');

        $gasto->fecha_consulta_medica = \Carbon\Carbon::parse($request->fecha_consulta_gastos_medicos)->format('Y-m-d');

        $gasto->nombre_paciente = $request->nombre_paciente_gastos_medicos;

        $gasto->edad_paciente = $request->edad_paciente_gastos_medicos;

        $gasto->direccion_paciente = $request->direccion_paciente;

        $gasto->diagnostico_paciente = $request->diagnostico_gastos_medicos;

        $gasto->control = $request->control_gastos_medicos;

        $gasto->embarazo = $request->embarazo_gastos_medicos;

        $gasto->numero_semanas = $request->num_semanas_gastos_medicos;

        $gasto->fur = \Carbon\Carbon::parse($request->fecha_fur_gastos_medicos)->format('Y-m-d');

        $gasto->complicaciones_embarazo = $request->complicacion_embarazo_gastos_medicos;

        $gasto->accidente = $request->accidente_gastos_medicos;

        $gasto->fecha_accidente1 = \Carbon\Carbon::parse($request->fecha_accidente1_gastos_medicos)->format('Y-m-d');

        $gasto->tipo_accidente1 = $request->tipo_accidente1_gastos_medicos;

        $gasto->lugar_accidente = $request->lugar_accidente_gastos_medicos;

        $gasto->fecha_informe = \Carbon\Carbon::parse($request->fecha_informe_gastos_medicos)->format('Y-m-d');



        $gasto->id_paciente = $request->paciente_gastos;

        $gasto->id_profesional = $profesional->id;

        $gasto->id_lugar_atencion = $request->lugar_gastos;



        //$constancias_ges->id_lugar_atencion



        if (!$gasto->save()) {

            return back();

        }

        $mensaje = 'Se ha agregado Declaración ENO de forma exitosa';



        return redirect()->back()->with('mensaje', $mensaje);

    }





    public function imprimir(Request $request)

    {

        $data = [

            'title' => 'First PDF for Coding Driver',

            'heading' => 'Hello from Coding Driver',

            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.'

        ];



        $pdf = PDF::loadView('app.dental.PDF.pdf_prueba', $data);



        return $pdf->download('codingdriver.pdf');

    }



    public function imprimir1(Request $request)

    {

        $user = Auth::user()->id;

        $profesional = Profesional::where('id_usuario', $user)->first();

        $paciente = Paciente::where('id', $request->id_paciente)->first();



        // $vista = view('app.dental.PDF.pdf_prueba')

        // ->with(['profesional' => $profesional, 'paciente' => $paciente]);



        $datos = [];

        array_push($datos, $profesional);

        array_push($datos, $paciente);



        // $productos = Producto::all();

        view()->share('datos', $datos);

        $pdf = \PDF::loadView('app.dental.PDF.pdf_prueba', $datos);

        return $pdf->download('archivo-pdf.pdf');

        //view()->share('datos', $datos);

        //view()->share('paciente', $paciente);



        $pdf = \PDF::loadView('app.dental.PDF.pdf_prueba', compact('datos'));



        return $pdf->download('hola.pdf');

    }







    public function autocomplete1(Request $request)

    {



        $query = $request->get('query');

        $filterResult = Articulo::where('nombre', 'LIKE', '%' . $query . '%')->get();

        return response()->json($filterResult);

    }


    public function dame_insumo_tto(Request $request){
        $insumo = InsumosTratamientosDental::find($request->id);
        return ['mensaje' => 'ok', 'insumo' => $insumo];
    }

    public function editar_insumo_tto(Request $request){

        $insumo = InsumosTratamientosDental::find($request->id);
        $insumo->id_tipo_insumo = $request->id_tipo_insumo;
        $insumo->insumos = $request->id_tipo_insumo == 1 ? 'Implante' : $request->insumos;
        $insumo->cantidad = $request->cantidad;
        $insumo->valor = $request->precio;
        $insumo->observaciones = $request->observaciones;

        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $id_paciente = $request->id_paciente;
        $id_ficha_atencion = $request->id_ficha_atencion;

        $presupuesto = PresupuestosDental::where('id', $request->id_presupuesto)->first();

        if($insumo->save()){
            $insumos = $this->dame_insumos_tratamiento_todos($id_paciente, $id_ficha_atencion,null, null);
                $valores = $this->dameValoresOdontograma($id_paciente, $id_ficha_atencion, $request->id_lugar_atencion, $profesional->id_tipo_especialidad);
                $valor_total = $valores[0] + $valores[1] + $valores[2] + $valores[3];

                if($presupuesto){
                    $presupuesto->valor_total = $valor_total;
                    $presupuesto->save();
                }

                return ['mensaje'=>'ok','insumos'=>$insumos['insumos'],'total_insumos' => $insumos['total'],'valores' => $valores];
        }else{
            return ['mensaje' => 'error', 'insumo' => $insumo];
        }
    }


    public function registrar_ficha_atencion_dental(Request $request)
    {
        try {

            $campos_requeridos = 0;
            $mensaje = '';
            if(empty(trim($request->motivo)))
            {
                $campos_requeridos = 1;
                $mensaje .= 'El Motivo de la Consulta es Requerido.<br> Su Ficha Clínica NO ha sido Guardada aún.<br>';
            }
            if(empty( trim($request->descripcion_hipotesis)))
            {
                //$campos_requeridos = 1;
                $mensaje .= 'El Diagnóstico es Requerido.<br> Su Ficha Clínica NO ha sido Guardada aún. <br> Si es solo Control, indicar Control de Patología.';
            }
            else
            {
                if(empty($request->diag_endos))
                {
                    //$campos_requeridos = 1;
                    $mensaje .= 'El Diagnóstico Endoscópico es Requerido.<br> Su Ficha Clínica NO ha sido Guardada aún.<br>';
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

                $ficha->hipotesis_diagnostico = $request->descripcion_hipotesis ? $request->descripcion_hipotesis : 'Tratamiento dental';
                $ficha->diagnostico_ce10 = $request->descripcion_cie ? $request->descripcion_cie : '';
                $ficha->indicaciones = $request->indicaciones ? $request->indicaciones : '';

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
                    $mensaje = 'Ficha Clínica guardada de forma correcta.';

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

                    }else{
                        // se mantiene en la vista actual
                        $tipo_mensaje = 'success';
                        $mensaje = 'Ficha Clínica guardada de forma correcta.';
                        if($request->id_continuar_ficha == "0"){
                            $array_tem = array(
                                'lugares_atencion' => $request->id_lugar_atencion,
                                'pdf' => $request->mostrarpdf,
                                'tipo' => $request->tipopdf,
                                'id_examen' => 0,
                            );
                            return \Redirect::route('profesional.mi_agenda',$array_tem)->with($tipo_mensaje, $mensaje);
                        }else{
                            return ['estado' => 'ok', 'mensaje' => $mensaje];
                            //return \Redirect::route('profesional.mi_agenda',$array_tem)->with($tipo_mensaje, $mensaje);
                        }

                    }

                }
            }
            else
            {
                return back()->with('error', $mensaje)->withInput();
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }

        $ficha_dental = new ficha_dentalAtencion();

        $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();

        $ficha_dental = ficha_dentalAtencion::where('id', $hora_medica->id_ficha_dental_atencion)->first();


        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();

        $ficha_dental = new FichaAtencionDental();

        if ($request->es_ficha_infantil == 1) {
            $ficha_dental->rut_acompañante = $request->rut_acompañante_ficha_dental;
            $ficha_dental->nombre_acompañante = $request->nombre_acompañante_ficha_dental;
            $ficha_dental->relacion_acompañante = $request->relacion_acompañante_ficha_dental;
            $ficha_dental->rut_responsable_pago = $request->rut_responsable_pago_ficha_dental;
            $ficha_dental->nombre_acompañante_pago = $request->nombre_acompañante_pago_ficha_dental;
            $ficha_dental->email_acompañante = $request->email_acompañante_ficha_dental;
            $ficha_dental->ficha_infantil = 1;
        }

        $ges = 0;
        if ($request->ges_ficha_dental == 'on') {
            $ges = 1;
        } else {
            $ges = 0;
        }

        $cronico = 0;
        if ($request->cronico_ficha_dental == 'on') {
            $cronico = 1;
        } else {
            $cronico = 0;
        }


        $anestesia_local = 0;
        if ($request->anestesia_local_ficha_dental == 'on') {
            $anestesia_local = 1;
        } else {
            $anestesia_local = 0;
        }


        $hemorragias = 0;
        if ($request->hemorragias_ficha_dental == 'on') {
            $hemorragias = 1;
        } else {
            $hemorragias = 0;
        }


        $fracturas = 0;
        if (
            $request->fracturas_ficha_dental == 'on'
        ) {
            $fracturas = 1;
        } else {
            $fracturas = 0;
        }


        /* $confidencial = 0;
        if ($request->confidencial == 'on') {
            $confidencial = 1;
        } else {
            $confidencial = 0;
        }*/


        $ficha_dental->motivo = $request->descripcion_consulta_ficha_dental;
        $ficha_dental->antecedentes = $request->descripcion_antecedentes_ficha_dental;



        //$ficha_dental->examen_fisico = $request->descripcion_examen_fisico;


        //Signos vitales
        if ($request->temperatura_ficha_dental != '') {
            $ficha_dental->temperatura = $request->temperatura_ficha_dental;
        } else {
            $ficha_dental->temperatura = null;
        }

        if ($request->pulso_ficha_dental != '') {
            $ficha_dental->pulso = $request->pulso_ficha_dental;
        } else {
            $ficha_dental->pulso = null;
        }

        if ($request->frecuencia_reposo_ficha_dental != '') {
            $ficha_dental->frecuencia_reposo = $request->frecuencia_reposo_ficha_dental;
        } else {
            $ficha_dental->frecuencia_reposo = null;
        }

        if ($request->peso_ficha_dental != '') {
            $ficha_dental->peso = $request->peso_ficha_dental;
        } else {
            $ficha_dental->peso = null;
        }


        if ($request->talla_ficha_dental != '') {
            $ficha_dental->talla = $request->talla_ficha_dental;
        } else {
            $ficha_dental->talla = null;
        }


        if ($request->imc_ficha_dental != '') {
            $ficha_dental->imc = $request->imc_ficha_dental;
        } else {
            $ficha_dental->imc = null;
        }

        if ($request->estado_nutricional_ficha_dental != '') {
            $ficha_dental->estado_nutricional = $request->estado_nutricional_ficha_dental;
        } else {
            $ficha_dental->estado_nutricional = null;
        }

        //presion Arterial
        if ($request->presion_bi_ficha_dental != '') {
            $ficha_dental->presion_bi = $request->presion_bi_ficha_dental;
        } else {
            $ficha_dental->presion_bi = null;
        }

        if ($request->presion_bd_ficha_dental != '') {
            $ficha_dental->presion_bd = $request->presion_bd_ficha_dental;
        } else {
            $ficha_dental->presion_bd = null;
        }

        if ($request->presion_de_pie_ficha_dental != '') {
            $ficha_dental->presion_de_pie = $request->presion_de_pie_ficha_dental;
        } else {
            $ficha_dental->presion_de_pie = null;
        }

        if ($request->presion_sentado_ficha_dental != '') {
            $ficha_dental->presion_sentado = $request->presion_sentado_ficha_dental;
        } else {
            $ficha_dental->presion_sentado = null;
        }


        //comunicacion y Traslado
        if ($request->estado_conciencia_ficha_dental != '') {
            $ficha_dental->ct_estado_conciencia = $request->estado_conciencia_ficha_dental;
        } else {
            $ficha_dental->ct_estado_conciencia = null;
        }

        if ($request->lenguaje_ficha_dental != '') {
            $ficha_dental->ct_lenguaje = $request->lenguaje_ficha_dental;
        } else {
            $ficha_dental->ct_lenguaje = null;
        }

        if ($request->traslado_ficha_dental != '') {
            $ficha_dental->ct_traslado = $request->traslado_ficha_dental;
        } else {
            $ficha_dental->ct_traslado = null;
        }

        $ficha_dental->hipotesis_diagnostico = $request->hipotesis_ficha_dental;
        $ficha_dental->diagnostico_ce10 = $request->cie10_ficha_dental;

        $ficha_dental->cronico = $cronico;
        $ficha_dental->ges = $ges;

        //dental
        $ficha_dental->anestesia_local = $anestesia_local;
        $ficha_dental->hemorragias = $hemorragias;
        $ficha_dental->fracturas = $fracturas;



        //$ficha_dental->confidencial = $confidencial;
        $ficha_dental->id_paciente = $request->paciente_atencion_dental;
        $ficha_dental->id_profesional = $profesional->id;

        return $ficha_dental;

        if (!$ficha_dental->save()) {
            return 'error';
        }

        $examenes = json_decode($request->examenes);
        if (!$examenes == null) {
            for ($i = 0; $i < count($examenes); ++$i) {
                $examen = new ExamenPPF();
                $examen->examen = $examenes[$i]->nombre_examen;
                $examen->tipo_examen = $examenes[$i]->tipo;

                switch ($examenes[$i]->prioridad) {
                    case 'Baja':
                        $examen->id_prioridad = 1;
                        break;
                    case 'Media':
                        $examen->id_prioridad = 2;
                        break;
                    case 'Alta':
                        $examen->id_prioridad = 3;
                        break;
                    case 'Urgente':
                        $examen->id_prioridad = 4;
                        break;
                }



                //$examen->id_prioridad = 2;
                $examen->id_profesional = $profesional->id;
                $examen->id_ficha_atencion = $ficha_dental->id;
                $examen->id_paciente = $request->paciente_atencion_dental;
                $examen->tipo_ficha = 1;

                if (!$examen->save()) {
                    return 'error';
                }
            }

        }



        $medicamentos = json_decode($request->medicamentos);
        if (!$medicamentos == null) {
            for ($i = 0; $i < count($medicamentos); ++$i) {
                //dd($medicamentos);
                $detalle_receta = new DetalleReceta();
                $detalle_receta->frecuencia = $medicamentos[$i]->frecuencia;
                $detalle_receta->periodo = $medicamentos[$i]->periodo;
                $detalle_receta->comentario = $medicamentos[$i]->comentario;
                $detalle_receta->presentacion = $medicamentos[$i]->presentacion;
                $detalle_receta->dosis = $medicamentos[$i]->dosis;
                $detalle_receta->producto = $medicamentos[$i]->medicamento;
                $detalle_receta->id_ficha = $ficha_dental->id;
                $detalle_receta->receta = $ficha_dental->id;
                $detalle_receta->estado = 1;
                $examen->tipo_ficha = 1;

                if (!$detalle_receta->save()) {
                    return 'error';
                }

            }

        }

        if (isset($request->es_ficha_endodoncia) && $request->es_ficha_endodoncia == 1) {
            $endodoncia_paciente = new EndodonciaPaciente();
            $endodoncia_paciente->nro_pieza = $request->nro_pieza_ficha_endodoncia;
            $endodoncia_paciente->derivado_por = $request->derivado_por_ficha_endodoncia;
            $endodoncia_paciente->zona_dolor = $request->zona_dolor_ficha_endodoncia;
            $endodoncia_paciente->historia_anterior = $request->historia_anterior_ficha_endodoncia;
            $endodoncia_paciente->tipo_dolor = $request->tipo_dolor_ficha_endodoncia;
            $endodoncia_paciente->provoca_dolor = $request->provoca_dolor_ficha_endodoncia;
            $endodoncia_paciente->tiempo_evolucion = $request->hidden_tiempo_evolucion_ficha_endodoncia;
            $endodoncia_paciente->examen_extraoral = $request->examen_extra_oral_ficha_endodoncia;
            $endodoncia_paciente->examen__periodonto = $request->examen_periodonto_ficha_endodoncia;
            $endodoncia_paciente->examen_intraoral = $request->examen_intraoral_ficha_endodoncia;
            $endodoncia_paciente->radiologia1 = $request->radiologia1_ficha_endodoncia;
            $endodoncia_paciente->radiologia2 = $request->radiologia2_ficha_endodoncia;
            $endodoncia_paciente->id_paciente = $request->paciente_atencion_dental;
            $endodoncia_paciente->id_profesional = $profesional->id;
            $endodoncia_paciente->id_ficha_atencion = $ficha_dental->id;
            // $endodoncia_paciente->id_lugar_atencion = $request->;
            if (!$endodoncia_paciente->save()) {
                return 'error';
            }
        }
        $mensaje = 'Se ha agregado Biopsia de forma exitosa';
        return redirect()->back()->with('mensaje', $mensaje);
        /*else {

            if ($request->medicamentos == '' && $request->examenes == '') {

                return back()->with('mensaje', 'ficha_dental medica guardada de forma correcta');

            } else {

                $examenes = json_decode($request->examenes);



                if (!$examenes == null) {

                    for ($i = 0; $i < count($examenes); ++$i) {

                        $examen = new ExamenPPF();

                        $examen->examen = $examenes[$i]->nombre_examen;

                        $examen->tipo_examen = $examenes[$i]->tipo;



                        switch ($examenes[$i]->prioridad) {

                            case 'Baja':

                                $examen->id_prioridad = 1;

                                break;

                            case 'Media':

                                $examen->id_prioridad = 2;

                                break;

                            case 'Alta':

                                $examen->id_prioridad = 3;

                                break;

                            case 'Urgente':

                                $examen->id_prioridad = 4;

                                break;

                        }



                        $examen->id_prioridad = 2;

                        $examen->id_profesional = $id_profesional;

                        $examen->id_ficha_dental_atencion = $ficha_dental->id;

                        $examen->id_paciente = $id_paciente;



                        if (!$examen->save()) {

                            return 'error';

                        }

                    }

                }



                $medicamentos = json_decode($request->medicamentos);



                for ($i = 0; $i < count($medicamentos); ++$i) {

                    //dd($medicamentos);

                    $detalle_receta = new DetalleReceta();

                    $detalle_receta->frecuencia = $medicamentos[$i]->frecuencia;

                    $detalle_receta->periodo = $medicamentos[$i]->periodo;

                    $detalle_receta->comentario = $medicamentos[$i]->comentario;

                    $detalle_receta->presentacion = $medicamentos[$i]->presentacion;

                    $detalle_receta->dosis = $medicamentos[$i]->dosis;

                    $detalle_receta->producto = $medicamentos[$i]->medicamento;

                    $detalle_receta->id_ficha_dental = $ficha_dental->id;

                    $detalle_receta->receta = $ficha_dental->id;

                    $detalle_receta->estado = 1;



                    if (!$detalle_receta->save()) {

                        return 'error';

                    }

                }



                return ['mensaje', 'ficha_dental medica guardada de forma correcta'];

            }

        }*/

    }

    public function registrar_ficha_atencion_dental_odontopediatria(Request $request)
    {
        try {
            $campos_requeridos = 0;
            $mensaje = '';
            if(empty(trim($request->motivo)))
            {
                $campos_requeridos = 1;
                $mensaje .= 'El Motivo de la Consulta es Requerido.<br> Su Ficha Clínica NO ha sido Guardada aún.<br>';
            }
            if(empty( trim($request->descripcion_hipotesis)))
            {
                //$campos_requeridos = 1;
                $mensaje .= 'El Diagnóstico es Requerido.<br> Su Ficha Clínica NO ha sido Guardada aún. <br> Si es solo Control, indicar Control de Patología.';
            }
            else
            {
                if(empty($request->diag_endos))
                {
                    //$campos_requeridos = 1;
                    $mensaje .= 'El Diagnóstico Endoscópico es Requerido.<br> Su Ficha Clínica NO ha sido Guardada aún.<br>';
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

                $ficha->hipotesis_diagnostico = $request->descripcion_hipotesis ? $request->descripcion_hipotesis : 'Tratamiento dental';
                $ficha->diagnostico_ce10 = $request->descripcion_cie ? $request->descripcion_cie : '';
                $ficha->indicaciones = $request->indicaciones ? $request->indicaciones : '';

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
                    $mensaje = 'Ficha Clínica guardada de forma correcta.';

                    // guardamos la ficha de la especialidad odontopediatria
                    $ficha_odonto = new FichaOdontopediatria();
                    $ficha_odonto->id_ficha_atencion = $ficha->id;
                    $ficha_odonto->id_lugar_atencion = $request->id_lugar_atencion ?? null;
                    $ficha_odonto->id_profesional = $id_profesional;
                    $ficha_odonto->id_responsable = $id_profesional; // o el ID del responsable si es diferente
                    $ficha_odonto->descripcion_consulta = $request->motivo ?? null;

                    // Campos de hábitos morfológicos
                    $ficha_odonto->op_bruxismo = $request->op_bruxismo ?? null;
                    $ficha_odonto->op_sueno = $request->op_sueno ?? null;
                    $ficha_odonto->op_resp = $request->op_resp ?? null;
                    $ficha_odonto->op_interpling = $request->op_interpling ?? null;

                    // Campos ATM
                    $ficha_odonto->op_atm = $request->op_atm ?? null;
                    $ficha_odonto->op_asim_atm = $request->op_asim_atm ?? null;
                    $ficha_odonto->op_resalte_atm = $request->op_resalte_atm ?? null;
                    $ficha_odonto->op_dolor_atm = $request->op_dolor_atm ?? null;

                    // Observaciones morfológicas (concatenando los campos de detalle si existen)
                    $obs_morfologico = '';
                    if ($request->det_op_bruxismo) $obs_morfologico .= 'Bruxismo: ' . $request->det_op_bruxismo . '. ';
                    if ($request->aprec_op_sueno) $obs_morfologico .= 'Sueño: ' . $request->aprec_op_sueno . '. ';
                    if ($request->det_op_resp) $obs_morfologico .= 'Respiración: ' . $request->det_op_resp . '. ';
                    if ($request->aprec_op_interpling) $obs_morfologico .= 'Interposición Lingual: ' . $request->aprec_op_interpling . '. ';
                    if ($request->det_op_atm) $obs_morfologico .= 'ATM: ' . $request->det_op_atm . '. ';
                    if ($request->aprec_op_asim_atm) $obs_morfologico .= 'Asimetrías: ' . $request->aprec_op_asim_atm . '. ';
                    if ($request->det_op_resalte_atm) $obs_morfologico .= 'Resalte: ' . $request->det_op_resalte_atm . '. ';
                    if ($request->aprec_op_dolor_atm) $obs_morfologico .= 'Dolor: ' . $request->aprec_op_dolor_atm . '. ';
                    $ficha_odonto->obs_ex_op_morfologico = $obs_morfologico ?: null;

                    // Campos de oclusión - Dentición Temporal
                    $ficha_odonto->tpo_oclusion_dent_temp = $request->tpo_oclusion_dent_temp ?? null;
                    $ficha_odonto->tpo_mord = $request->tpo_mord ?? null;
                    $ficha_odonto->supernum = $request->supernum ?? null;
                    $ficha_odonto->ot_anomalias = $request->ot_anomalias ?? null;

                    // Campos de oclusión - Dentición Permanente
                    $ficha_odonto->tpo_oclusion_dent_permanente = $request->tpo_oclusion_dent_permanente ?? null;

                    // Observaciones de examen oral (concatenando observaciones de oclusión)
                    $obs_oral = '';
                    if ($request->obs_ex_oral) $obs_oral .= $request->obs_ex_oral . '. ';
                    if ($request->det_tpo_oclusion_dent_temp) $obs_oral .= 'Oclusión Temporal: ' . $request->det_tpo_oclusion_dent_temp . '. ';
                    if ($request->aprec_tpo_mord) $obs_oral .= 'Tipo Mordida: ' . $request->aprec_tpo_mord . '. ';
                    if ($request->det_supernum) $obs_oral .= 'Supernumerarias: ' . $request->det_supernum . '. ';
                    if ($request->aprec_ot_anomalias) $obs_oral .= 'Otras Anomalías: ' . $request->aprec_ot_anomalias . '. ';
                    if ($request->det_tpo_oclusion_dent_permanente) $obs_oral .= 'Oclusión Permanente: ' . $request->det_tpo_oclusion_dent_permanente . '. ';
                    if ($request->aprec_periodonto) $obs_oral .= 'Periodonto: ' . $request->aprec_periodonto . '. ';
                    if ($request->det_intra_general) $obs_oral .= 'Aspecto General: ' . $request->det_intra_general . '. ';
                    $ficha_odonto->obs_ex_oral = $obs_oral ?: null;

                    // Campos de radiología
                    $ficha_odonto->tipo_radio = $request->tipo_radio ?? null;
                    $ficha_odonto->result_radio = $request->result_radio ?? null;

                    if (!$ficha_odonto->save()) {
                        return back()->with('error', 'Ficha Odontopediatría con problema al guardar')->withInput();
                    }

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



                    // /** registro examen especialidad Rinofibrolaringoscopía */
                    // $parametro = $request->all();
                    // $examen_json = ExamenEspecialidadController::estructuraJson(1,$parametro);
                    // // return json_encode($examen_json);
                    // if($examen_json['estado'] == 1)
                    // {
                    //     $examen = '';
                    //     /** VALIDAR INFORMACION */
                    //     if($examen_json['cant_datos'] > 0)
                    //     {
                    //         $profesional = Profesional::find($id_profesional);

                    //         $examen = new ExamenEspecialidad();
                    //         $examen->id_tipo = '1';
                    //         $examen->id_template = '1';
                    //         $examen->id_examen_tipo = '1';
                    //         $examen->id_sub_tipo_especialidad = $profesional->id_sub_tipo_especialidada;
                    //         $examen->id_ficha_atencion = $ficha->id;
                    //         $examen->id_ficha_especialidad = $ficha_orl->id;
                    //         $examen->id_paciente = $id_paciente;
                    //         $examen->id_profesional = $id_profesional;
                    //         $examen->nombre = 'Rinofibrolaringoscopía';
                    //         $examen->cuerpo = $examen_json['json'];
                    //         $examen->estado = '1';

                    //         // if($registro_rfl->save())
                    //         if($examen->save())
                    //         {
                    //             $datos['examen']['estado'] = 1;
                    //             $datos['examen']['msj'] = 'registro exitoso';
                    //             $mensaje .= 'Ficha Otorrino Rinofibrolaringoscopía guardada de forma correcta\n';

                    //             /** registro de imagenes  */
                    //             if(!empty($request->input_lista_imagenes))
                    //             {
                    //                 $array_imagenes = json_decode($request->input_lista_imagenes);

                    //                 $resulto_img = array();
                    //                 foreach ($array_imagenes as $key => $value)
                    //                 {
                    //                     $paciente = Paciente::find($id_paciente);
                    //                     // echo json_encode($value);
                    //                     $ruta_temp = $value[0];
                    //                     $nombre_real = $value[1];
                    //                     $nombre_temp = $value[2];
                    //                     $file_extension = $value[3];
                    //                     $nombre_final = $paciente->rut.'_'.$examen->id.'_'.date('YmdHis').'_'.uniqid().'.'.$file_extension;

                    //                     $resulto_img[$key] = CargaImagenController::moverImagen($nombre_temp, 'img_examen', $nombre_final);
                    //                     $registro_img = new ExamenEspecialidadImg();
                    //                     $registro_img->id_examen = $examen->id;
                    //                     $registro_img->url = $resulto_img[$key]['proceso']['url'];
                    //                     $registro_img->nombre = $nombre_final;
                    //                     $registro_img->otro = '';
                    //                     $registro_img->estado = 1;

                    //                     if($registro_img->save())
                    //                     {
                    //                         $resulto_img[$key]['estado'] = 1;
                    //                         $resulto_img[$key]['msj'] = 'imagen registrada';
                    //                     }
                    //                     else
                    //                     {
                    //                         $resulto_img[$key]['estado'] = 0;
                    //                         $resulto_img[$key]['msj'] = 'falla en registro de imagen';
                    //                     }

                    //                 }
                    //                 $datos['examen']['resulto_img'] = $resulto_img;

                    //             }

                    //             /** registro de porfesional provisorio */
                    //             if(empty($request->solicitado_id_profesional_rfl))
                    //             {
                    //                 $profesional_provisorio = ProfesionalProvisorioController::registrar( $request->solicitado_nombre_rfl, $request->solicitado_apellido_rfl, '', '', $request->solicitado_rut_rfl, $request->solicitado_email_rfl, $request->solicitado_telefono_rfl, '', '', '', '', '', '', '', '', '', 1);

                    //                 if($profesional_provisorio['estado'] == 1)
                    //                 {
                    //                     $datos['registro_prof_provi']['estado'] = 1;
                    //                     $datos['registro_prof_provi']['msj'] = 'registro exitoso';
                    //                     $datos['registro_prof_provi']['result'] = $profesional_provisorio;

                    //                     $mensaje .= 'Profesional Prvisorio creado\n';
                    //                 }
                    //                 else
                    //                 {
                    //                     $datos['registro_prof_provi']['estado'] = 0;
                    //                     $datos['registro_prof_provi']['msj'] = 'falla en registro';
                    //                     $datos['registro_prof_provi']['result'] = $profesional_provisorio;
                    //                     $mensaje .= 'Profesional Prvisorio creado\n';
                    //                 }

                    //             }

                    //         }
                    //         else
                    //         {
                    //             $datos['examen']['estado'] = 0;
                    //             $datos['examen']['msj'] = 'registro NO exitoso';
                    //             $mensaje .= 'Ficha Otorrino Rinofibrolaringoscopía No guardada \n';
                    //         }
                    //     }
                    // }
                    // else
                    // {
                    //     $mensaje .= 'Problema al registrar Examen Espacial';
                    // }

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

                    }else{
                        // se mantiene en la vista actual
                        $tipo_mensaje = 'success';
                        $mensaje = 'Ficha Clínica guardada de forma correcta.';
                        if($request->id_continuar_ficha == "0"){
                            $array_tem = array(
                                'lugares_atencion' => $request->id_lugar_atencion,
                                'pdf' => $request->mostrarpdf,
                                'tipo' => $request->tipopdf,
                                'id_examen' => 0,
                            );
                            return \Redirect::route('profesional.mi_agenda',$array_tem)->with($tipo_mensaje, $mensaje);
                        }else{
                            return ['estado' => 'ok', 'mensaje' => $mensaje];
                            //return \Redirect::route('profesional.mi_agenda',$array_tem)->with($tipo_mensaje, $mensaje);
                        }

                    }

                }
            }
            else
            {
                return back()->with('error', $mensaje)->withInput();
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }

        $ficha_dental = new ficha_dentalAtencion();

        $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();

        $ficha_dental = ficha_dentalAtencion::where('id', $hora_medica->id_ficha_dental_atencion)->first();


        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();

        $ficha_dental = new FichaAtencionDental();

        if ($request->es_ficha_infantil == 1) {
            $ficha_dental->rut_acompañante = $request->rut_acompañante_ficha_dental;
            $ficha_dental->nombre_acompañante = $request->nombre_acompañante_ficha_dental;
            $ficha_dental->relacion_acompañante = $request->relacion_acompañante_ficha_dental;
            $ficha_dental->rut_responsable_pago = $request->rut_responsable_pago_ficha_dental;
            $ficha_dental->nombre_acompañante_pago = $request->nombre_acompañante_pago_ficha_dental;
            $ficha_dental->email_acompañante = $request->email_acompañante_ficha_dental;
            $ficha_dental->ficha_infantil = 1;
        }

        $ges = 0;
        if ($request->ges_ficha_dental == 'on') {
            $ges = 1;
        } else {
            $ges = 0;
        }

        $cronico = 0;
        if ($request->cronico_ficha_dental == 'on') {
            $cronico = 1;
        } else {
            $cronico = 0;
        }


        $anestesia_local = 0;
        if ($request->anestesia_local_ficha_dental == 'on') {
            $anestesia_local = 1;
        } else {
            $anestesia_local = 0;
        }


        $hemorragias = 0;
        if ($request->hemorragias_ficha_dental == 'on') {
            $hemorragias = 1;
        } else {
            $hemorragias = 0;
        }


        $fracturas = 0;
        if (
            $request->fracturas_ficha_dental == 'on'
        ) {
            $fracturas = 1;
        } else {
            $fracturas = 0;
        }


        /* $confidencial = 0;
        if ($request->confidencial == 'on') {
            $confidencial = 1;
        } else {
            $confidencial = 0;
        }*/


        $ficha_dental->motivo = $request->descripcion_consulta_ficha_dental;
        $ficha_dental->antecedentes = $request->descripcion_antecedentes_ficha_dental;



        //$ficha_dental->examen_fisico = $request->descripcion_examen_fisico;


        //Signos vitales
        if ($request->temperatura_ficha_dental != '') {
            $ficha_dental->temperatura = $request->temperatura_ficha_dental;
        } else {
            $ficha_dental->temperatura = null;
        }

        if ($request->pulso_ficha_dental != '') {
            $ficha_dental->pulso = $request->pulso_ficha_dental;
        } else {
            $ficha_dental->pulso = null;
        }

        if ($request->frecuencia_reposo_ficha_dental != '') {
            $ficha_dental->frecuencia_reposo = $request->frecuencia_reposo_ficha_dental;
        } else {
            $ficha_dental->frecuencia_reposo = null;
        }

        if ($request->peso_ficha_dental != '') {
            $ficha_dental->peso = $request->peso_ficha_dental;
        } else {
            $ficha_dental->peso = null;
        }


        if ($request->talla_ficha_dental != '') {
            $ficha_dental->talla = $request->talla_ficha_dental;
        } else {
            $ficha_dental->talla = null;
        }


        if ($request->imc_ficha_dental != '') {
            $ficha_dental->imc = $request->imc_ficha_dental;
        } else {
            $ficha_dental->imc = null;
        }

        if ($request->estado_nutricional_ficha_dental != '') {
            $ficha_dental->estado_nutricional = $request->estado_nutricional_ficha_dental;
        } else {
            $ficha_dental->estado_nutricional = null;
        }

        //presion Arterial
        if ($request->presion_bi_ficha_dental != '') {
            $ficha_dental->presion_bi = $request->presion_bi_ficha_dental;
        } else {
            $ficha_dental->presion_bi = null;
        }

        if ($request->presion_bd_ficha_dental != '') {
            $ficha_dental->presion_bd = $request->presion_bd_ficha_dental;
        } else {
            $ficha_dental->presion_bd = null;
        }

        if ($request->presion_de_pie_ficha_dental != '') {
            $ficha_dental->presion_de_pie = $request->presion_de_pie_ficha_dental;
        } else {
            $ficha_dental->presion_de_pie = null;
        }

        if ($request->presion_sentado_ficha_dental != '') {
            $ficha_dental->presion_sentado = $request->presion_sentado_ficha_dental;
        } else {
            $ficha_dental->presion_sentado = null;
        }


        //comunicacion y Traslado
        if ($request->estado_conciencia_ficha_dental != '') {
            $ficha_dental->ct_estado_conciencia = $request->estado_conciencia_ficha_dental;
        } else {
            $ficha_dental->ct_estado_conciencia = null;
        }

        if ($request->lenguaje_ficha_dental != '') {
            $ficha_dental->ct_lenguaje = $request->lenguaje_ficha_dental;
        } else {
            $ficha_dental->ct_lenguaje = null;
        }

        if ($request->traslado_ficha_dental != '') {
            $ficha_dental->ct_traslado = $request->traslado_ficha_dental;
        } else {
            $ficha_dental->ct_traslado = null;
        }

        $ficha_dental->hipotesis_diagnostico = $request->hipotesis_ficha_dental;
        $ficha_dental->diagnostico_ce10 = $request->cie10_ficha_dental;

        $ficha_dental->cronico = $cronico;
        $ficha_dental->ges = $ges;

        //dental
        $ficha_dental->anestesia_local = $anestesia_local;
        $ficha_dental->hemorragias = $hemorragias;
        $ficha_dental->fracturas = $fracturas;



        //$ficha_dental->confidencial = $confidencial;
        $ficha_dental->id_paciente = $request->paciente_atencion_dental;
        $ficha_dental->id_profesional = $profesional->id;

        return $ficha_dental;

        if (!$ficha_dental->save()) {
            return 'error';
        }

        $examenes = json_decode($request->examenes);
        if (!$examenes == null) {
            for ($i = 0; $i < count($examenes); ++$i) {
                $examen = new ExamenPPF();
                $examen->examen = $examenes[$i]->nombre_examen;
                $examen->tipo_examen = $examenes[$i]->tipo;

                switch ($examenes[$i]->prioridad) {
                    case 'Baja':
                        $examen->id_prioridad = 1;
                        break;
                    case 'Media':
                        $examen->id_prioridad = 2;
                        break;
                    case 'Alta':
                        $examen->id_prioridad = 3;
                        break;
                    case 'Urgente':
                        $examen->id_prioridad = 4;
                        break;
                }



                //$examen->id_prioridad = 2;
                $examen->id_profesional = $profesional->id;
                $examen->id_ficha_atencion = $ficha_dental->id;
                $examen->id_paciente = $request->paciente_atencion_dental;
                $examen->tipo_ficha = 1;

                if (!$examen->save()) {
                    return 'error';
                }
            }

        }



        $medicamentos = json_decode($request->medicamentos);
        if (!$medicamentos == null) {
            for ($i = 0; $i < count($medicamentos); ++$i) {
                //dd($medicamentos);
                $detalle_receta = new DetalleReceta();
                $detalle_receta->frecuencia = $medicamentos[$i]->frecuencia;
                $detalle_receta->periodo = $medicamentos[$i]->periodo;
                $detalle_receta->comentario = $medicamentos[$i]->comentario;
                $detalle_receta->presentacion = $medicamentos[$i]->presentacion;
                $detalle_receta->dosis = $medicamentos[$i]->dosis;
                $detalle_receta->producto = $medicamentos[$i]->medicamento;
                $detalle_receta->id_ficha = $ficha_dental->id;
                $detalle_receta->receta = $ficha_dental->id;
                $detalle_receta->estado = 1;
                $examen->tipo_ficha = 1;

                if (!$detalle_receta->save()) {
                    return 'error';
                }

            }

        }

        if (isset($request->es_ficha_endodoncia) && $request->es_ficha_endodoncia == 1) {
            $endodoncia_paciente = new EndodonciaPaciente();
            $endodoncia_paciente->nro_pieza = $request->nro_pieza_ficha_endodoncia;
            $endodoncia_paciente->derivado_por = $request->derivado_por_ficha_endodoncia;
            $endodoncia_paciente->zona_dolor = $request->zona_dolor_ficha_endodoncia;
            $endodoncia_paciente->historia_anterior = $request->historia_anterior_ficha_endodoncia;
            $endodoncia_paciente->tipo_dolor = $request->tipo_dolor_ficha_endodoncia;
            $endodoncia_paciente->provoca_dolor = $request->provoca_dolor_ficha_endodoncia;
            $endodoncia_paciente->tiempo_evolucion = $request->hidden_tiempo_evolucion_ficha_endodoncia;
            $endodoncia_paciente->examen_extraoral = $request->examen_extra_oral_ficha_endodoncia;
            $endodoncia_paciente->examen__periodonto = $request->examen_periodonto_ficha_endodoncia;
            $endodoncia_paciente->examen_intraoral = $request->examen_intraoral_ficha_endodoncia;
            $endodoncia_paciente->radiologia1 = $request->radiologia1_ficha_endodoncia;
            $endodoncia_paciente->radiologia2 = $request->radiologia2_ficha_endodoncia;
            $endodoncia_paciente->id_paciente = $request->paciente_atencion_dental;
            $endodoncia_paciente->id_profesional = $profesional->id;
            $endodoncia_paciente->id_ficha_atencion = $ficha_dental->id;
            // $endodoncia_paciente->id_lugar_atencion = $request->;
            if (!$endodoncia_paciente->save()) {
                return 'error';
            }
        }
        $mensaje = 'Se ha agregado Biopsia de forma exitosa';
        return redirect()->back()->with('mensaje', $mensaje);
        /*else {

            if ($request->medicamentos == '' && $request->examenes == '') {

                return back()->with('mensaje', 'ficha_dental medica guardada de forma correcta');

            } else {

                $examenes = json_decode($request->examenes);



                if (!$examenes == null) {

                    for ($i = 0; $i < count($examenes); ++$i) {

                        $examen = new ExamenPPF();

                        $examen->examen = $examenes[$i]->nombre_examen;

                        $examen->tipo_examen = $examenes[$i]->tipo;



                        switch ($examenes[$i]->prioridad) {

                            case 'Baja':

                                $examen->id_prioridad = 1;

                                break;

                            case 'Media':

                                $examen->id_prioridad = 2;

                                break;

                            case 'Alta':

                                $examen->id_prioridad = 3;

                                break;

                            case 'Urgente':

                                $examen->id_prioridad = 4;

                                break;

                        }



                        $examen->id_prioridad = 2;

                        $examen->id_profesional = $id_profesional;

                        $examen->id_ficha_dental_atencion = $ficha_dental->id;

                        $examen->id_paciente = $id_paciente;



                        if (!$examen->save()) {

                            return 'error';

                        }

                    }

                }



                $medicamentos = json_decode($request->medicamentos);



                for ($i = 0; $i < count($medicamentos); ++$i) {

                    //dd($medicamentos);

                    $detalle_receta = new DetalleReceta();

                    $detalle_receta->frecuencia = $medicamentos[$i]->frecuencia;

                    $detalle_receta->periodo = $medicamentos[$i]->periodo;

                    $detalle_receta->comentario = $medicamentos[$i]->comentario;

                    $detalle_receta->presentacion = $medicamentos[$i]->presentacion;

                    $detalle_receta->dosis = $medicamentos[$i]->dosis;

                    $detalle_receta->producto = $medicamentos[$i]->medicamento;

                    $detalle_receta->id_ficha_dental = $ficha_dental->id;

                    $detalle_receta->receta = $ficha_dental->id;

                    $detalle_receta->estado = 1;



                    if (!$detalle_receta->save()) {

                        return 'error';

                    }

                }



                return ['mensaje', 'ficha_dental medica guardada de forma correcta'];

            }

        }*/

    }


    public function registrar_examen_radiologico(Request $request)
    {
        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();
        $examenes_radiologicos = json_decode($request->radiologicos);

        for ($i = 0; $i < count($examenes_radiologicos); $i++) {
            $radiologico  = new ExamenRadiologico;
            $radiologico->nro_orden = $examenes_radiologicos[$i]->nro_orden;
            $radiologico->tipo_examen_radiologico = $examenes_radiologicos[$i]->examen_radiologico;
            $radiologico->id_paciente = $request->paciente_radiologico;
            $radiologico->id_profesional = $profesional->id;

            if (!$radiologico->save()) {
                return 'error';
            }

        }

        if (count($examenes_radiologicos) > 1) {
            $mensaje = 'Se ha agregado Exámenes de forma exitosa';
        } else {
            $mensaje = 'Se ha agregado Examen de forma exitosa';
        }

        return redirect()->back()->with('mensaje', $mensaje);

    }

    public function dame_pieza(Request $request)
    {
        try {
            $pieza = OdontogramaPaciente::select('odontogramas_pacientes.*','tratamientos_dental.descripcion as diagnostico')
                        ->join('tratamientos_dental','odontogramas_pacientes.diagnostico','tratamientos_dental.id')
                        ->where('odontogramas_pacientes.pieza', $request->pieza)
                        ->where('odontogramas_pacientes.id_paciente', $request->id_paciente)
                        ->get();

            foreach ($pieza as $key => $value) {
                $value->fecha = Carbon::parse($value->created_at)->format('Y-m-d H:m:s');
                if($value->id_profesional == null){
                    $value->profesional = 'No asignado';
                }else{
                    $profesional = Profesional::where('id', $value->id_profesional)->first();
                    $value->profesional = $profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos;
                }
            }
            return $pieza;
        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }

    public function registrar_biopsia(Request $request)
    {

        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();

        if ($request->biopsia_rapida == 'on') {
            $biopsia_rapida = 1;
        } else {
            $biopsia_rapida = 0;
        }


        $biopsia  = new Biopsia();
        $biopsia->fecha = $request->fecha_biopsia;
        $biopsia->numero_orden = $request->numero_orden_biopsia;
        $biopsia->laboratorio_patologia = $request->laboratorio_patologia;
        $biopsia->diagnostico_pre = $request->diagnostico_pre ? $request->diagnostico_pre : 'SIN DIAGNOSTICO PREVIO';
        $biopsia->diagnostico_post = $request->diagnostico_post ? $request->diagnostico_post : 'SIN DIAGNOSTICO POSTERIOR';
        $biopsia->organo_localizacion = $request->organo_localizacion ? $request->organo_localizacion : 'SIN ORGANO LOCALIZADO';
        $biopsia->enfermedades_asociadas = $request->enfermedades_asociadas ? $request->enfermedades_asociadas : 'SIN ENFERMEDADES ASOCIADAS';
        $biopsia->informacion_adicional = $request->informacion_adicional ? $request->informacion_adicional : 'SIN INFORMACION ADICIONAL';
        $biopsia->biopsia_rapida = $biopsia_rapida;
        $biopsia->id_paciente = $request->id_paciente;
        $biopsia->id_profesional = $profesional->id;
        $biopsia->id_lugar_atencion = $request->id_lugar_atencion;
        $biopsia->id_ficha_atencion = $request->id_ficha_atencion;

        if (!$biopsia->save()) {
            return 'error';
        }

        $mensaje = 'Se ha agregado Biopsia de forma exitosa';
        return ['mensaje' => 'OK', 'msj' => $mensaje, 'biopsia' => $biopsia];

    }





    public function registrar_orden_trabajo_menor(Request $request)
    {
        try {
            //code...
            $user = Auth::user()->id;
            $ficha = FichaAtencion::where('id', $request->id_ficha_atencion)->first();
            $profesional = Profesional::where('id_usuario', $user)->first();
            // verificar si no existe la orden de trabajo menor
            $orden_trabajo_menor = OrdenTrabajoMenor::where('id_presupuesto', $request->id_presupuesto)->first();
            if ($orden_trabajo_menor) {
                //return ['mensaje' => 'ERROR', 'msj' => 'Ya existe una orden de trabajo menor con el número de orden ingresado'];
            }
            $trabajo_menor  = new OrdenTrabajoMenor();
            $trabajo_menor->nro_orden = $request->nro_orden_trabajo_menor;
            $trabajo_menor->clinica_doctor = $request->clinica_doctor;
            $trabajo_menor->rut_profesional = $request->rut_profesional;
            $trabajo_menor->guia = $request->guia;
            $trabajo_menor->color = $request->color;
            $trabajo_menor->urgencia = $request->urgencia;
            $trabajo_menor->material = $request->material;
            $trabajo_menor->trabajo_realizar = $request->trabajo_realizar;
            $trabajo_menor->comentarios = $request->comentarios_trabajo_menor;
            $trabajo_menor->id_paciente = $request->id_paciente;
            $trabajo_menor->id_profesional = $profesional->id;
            $trabajo_menor->id_ficha_atencion = $request->id_ficha_atencion;
            $trabajo_menor->id_lugar_atencion = $request->id_lugar_atencion;
            $trabajo_menor->id_laboratorio = $request->laboratorio;
            $trabajo_menor->id_presupuesto = $request->id_presupuesto;
            $trabajo_menor->fecha_envio = Carbon::now();

            if (!$trabajo_menor->save()) {
                return 'error';
            }
            $mensaje = 'Se ha agregado Orden de trabajo menor de forma exitosa';

            $fc = new ficha_atencionController();
            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
            $ordenes_trabajo_menor = $fc->dameOrdenesTrabajoMenor($request->id_paciente, $profesional->id, $request->id_presupuesto);
            $ordenes_trabajo_mayor = $fc->dameOrdenesTrabajoMayor($request->id_paciente, $profesional->id, $request->id_presupuesto);
            $html_ordenes = view('atencion_odontologica.ordenes_trabajo', compact('ordenes_trabajo_menor', 'ordenes_trabajo_mayor', 'ficha'))->render();
            $resumen = view('atencion_odontologica.resumen_costos_lab', compact('ordenes_trabajo_menor','ordenes_trabajo_mayor','ficha'))->render();

            $correlativo = Correlativos::where('documento', 'Orden Trabajo Menor')->where('id_usuario',Auth::user()->id)->first();
            $correlativo->correlativo = $correlativo->correlativo + 1;
            $correlativo->save();

            return ['mensaje' => 'OK',
                'msj' => $mensaje,
                'ordenes_trabajo_menor' => $ordenes_trabajo_menor,
                'ordenes_trabajo_mayor' => $ordenes_trabajo_mayor,
                'orden_trabajo_menor' => $trabajo_menor,
                'html' => $html_ordenes,
                'resumen' => $resumen,
            ];
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }


    }

    public function info_laboratorio(Request $request){
        try {
            // Cargar la relación Direccion junto con el laboratorio
            $laboratorio = Laboratorio::with('Direccion')->where('id', $request->id_lab)->first();
            if ($laboratorio) {
                return [
                    'mensaje' => 'OK',
                    'msj' => 'Laboratorio encontrado',
                    'laboratorio' => $laboratorio,
                    'direccion' => $laboratorio->Direccion // Esto te da el objeto de dirección relacionado
                ];
            } else {
                return ['mensaje' => 'ERROR', 'msj' => 'Laboratorio no encontrado'];
            }
        } catch (\Exception $e) {
            return ['mensaje' => 'ERROR', 'msj' => $e->getMessage()];
        }
    }

    public function registrar_insumos_pedido(Request $req){
        return $req;
    }

    public function generar_pdf_trabajo_menor_hist(Request $request){
       try {
            $orden_trabajo = OrdenTrabajoMenor::with('Laboratorio')->where('id', $request->id)->first();

            $paciente = Paciente::where('id', $orden_trabajo->id_paciente)->first();
            $orden_trabajo->paciente_trabajo_menor = $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos;

            $datos = $orden_trabajo;

            // Renderizar la vista del presupuesto dental
            $pdf = Pdf::loadView('atencion_odontologica.PDF.trabajo_menor_dental_hist',compact('datos'));
            // Guardar el PDF en la carpeta public
            $fileName = 'trabajo_menor_dental_' . $orden_trabajo->id_paciente . '.pdf';
            $filePath = public_path('reportes/' . $fileName);
            file_put_contents($filePath, $pdf->output());

            // Devolver la ruta accesible del archivo PDF
            return response()->json(['ruta' => asset('reportes/' . $fileName)]);
       } catch (\Exception $e) {
        //throw $th;
        return ['mensaje' => 'ERROR', 'msj' => $e->getMessage()];
       }

    }

    public function generar_pdf_insumos_dental_sidebar(Request $req){
        $datos = $req;

        // Renderizar la vista del presupuesto dental
        $pdf = Pdf::loadView('atencion_odontologica.PDF.insumos_dental',compact('datos'));
        // Guardar el PDF en la carpeta public
        $fileName = 'insumos_dental_' . $req->id_paciente . '.pdf';
        $filePath = public_path('reportes/' . $fileName);
        file_put_contents($filePath, $pdf->output());

        // Devolver la ruta accesible del archivo PDF
        return response()->json(['ruta' => asset('reportes/' . $fileName)]);
    }

    public function eliminar_orden_trabajo_menor(Request $req){
        try {
            $orden_trabajo_menor = OrdenTrabajoMenor::where('id', $req->id)->first();
            $ficha = FichaAtencion::where('id', $req->id_ficha_atencion)->first();
            $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
            $nro_orden = $orden_trabajo_menor->nro_orden;
            if ($orden_trabajo_menor->delete()) {
                $ficha_atencionController = new ficha_atencionController();
                $ordenes_trabajo_menor = $ficha_atencionController->dameOrdenesTrabajoMenor($req->id_paciente, $profesional->id, $req->id_presupuesto);
                $ordenes_trabajo_mayor = $ficha_atencionController->dameOrdenesTrabajoMayor($req->id_paciente, $profesional->id, $req->id_presupuesto);

                $html_ordenes = view('atencion_odontologica.ordenes_trabajo', compact('ordenes_trabajo_menor', 'ordenes_trabajo_mayor', 'ficha'))->render();
                $resumen = view('atencion_odontologica.resumen_costos_lab', compact('ordenes_trabajo_menor','ordenes_trabajo_mayor','ficha'))->render();
                return ['mensaje' => 'OK',
                    'msj' => 'Orden de trabajo menor eliminada correctamente',
                    'ordenes_trabajo_menor' => $ordenes_trabajo_menor,
                    'ordenes_trabajo_mayor' => $ordenes_trabajo_mayor,
                    'orden_trabajo_menor' => $orden_trabajo_menor,
                    'html' => $html_ordenes,
                    'resumen' => $resumen,
                ];
            } else {
                return ['mensaje' => 'ERROR', 'msj' => 'No se encontró la orden de trabajo menor'];
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function eliminar_orden_trabajo_mayor(Request $req){
        try {

            $orden_trabajo_mayor = OrdenTrabajoMayor::where('id', $req->id)->first();
            $ficha = FichaAtencion::where('id', $req->id_ficha_atencion)->first();
            $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
            $nro_orden = $orden_trabajo_mayor->nro_orden;
            if ($orden_trabajo_mayor->delete()) {
                $ficha_atencionController = new ficha_atencionController();
                 $ordenes_trabajo_menor = $ficha_atencionController->dameOrdenesTrabajoMenor($req->id_paciente, $profesional->id, $req->id_presupuesto);
                $ordenes_trabajo_mayor = $ficha_atencionController->dameOrdenesTrabajoMayor($req->id_paciente, $profesional->id, $req->id_presupuesto);

                $html_ordenes = view('atencion_odontologica.ordenes_trabajo', compact('ordenes_trabajo_menor', 'ordenes_trabajo_mayor', 'ficha'))->render();
                $resumen = view('atencion_odontologica.resumen_costos_lab', compact('ordenes_trabajo_menor','ordenes_trabajo_mayor','ficha'))->render();
                return ['mensaje' => 'OK',
                    'msj' => 'Orden de trabajo menor eliminada correctamente',
                    'ordenes_trabajo_menor' => $ordenes_trabajo_menor,
                    'ordenes_trabajo_mayor' => $ordenes_trabajo_mayor,
                    'orden_trabajo_mayor' => $orden_trabajo_mayor,
                    'html' => $html_ordenes,
                    'resumen' => $resumen,
                ];
            } else {
                return ['mensaje' => 'ERROR', 'msj' => 'No se encontró la orden de trabajo menor'];
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function generar_pdf_trabajo_menor(Request $req){
        try {
            // Obtener la orden de trabajo menor
            $orden_trabajo_menor = OrdenTrabajoMenor::where('id', $req->id_trabajo)->first();

            if (!$orden_trabajo_menor) {
                return response()->json(['error' => 'Orden de trabajo no encontrada'], 404);
            }

            // Preparar los datos para la vista
            $datos = $orden_trabajo_menor;

            // Obtener el nombre del paciente manualmente
            if ($orden_trabajo_menor->id_paciente) {
                $paciente = Paciente::find($orden_trabajo_menor->id_paciente);
                if ($paciente) {
                    $datos->paciente_nombre = $paciente->nombres . ' ' .
                                            $paciente->apellido_uno . ' ' .
                                            $paciente->apellido_dos;
                } else {
                    $datos->paciente_nombre = 'N/A';
                }
            } else {
                $datos->paciente_nombre = 'N/A';
            }

            // Obtener el nombre del laboratorio si existe
            if ($orden_trabajo_menor->id_laboratorio) {
                $laboratorio = Laboratorio::find($orden_trabajo_menor->id_laboratorio);
                if ($laboratorio) {
                    $datos->nombre_lab = $laboratorio->nombre;
                } else {
                    $datos->nombre_lab = 'N/A';
                }
            } else {
                $datos->nombre_lab = 'N/A';
            }

            // Renderizar la vista del trabajo menor dental
            $pdf = Pdf::loadView('atencion_odontologica.PDF.trabajo_menor_dental', compact('datos'));

            // Guardar el PDF en la carpeta public
            $fileName = 'trabajo_menor_dental_' . $orden_trabajo_menor->id . '_' . date('Y-m-d_H-i-s') . '.pdf';
            $filePath = public_path('reportes/' . $fileName);

            // Crear directorio si no existe
            if (!file_exists(public_path('reportes'))) {
                mkdir(public_path('reportes'), 0755, true);
            }

            file_put_contents($filePath, $pdf->output());

            // Devolver la ruta accesible del archivo PDF
            return response()->json([
                'estado' => 'ok',
                'mensaje' => 'PDF generado correctamente',
                'ruta' => asset('reportes/' . $fileName)
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'estado' => 'error',
                'mensaje' => 'Error al generar el PDF: ' . $e->getMessage()
            ]);
        }
    }

    public function generar_pdf_trabajo_mayor(Request $req){
        try {
            // Obtener la orden de trabajo mayor
            $orden_trabajo_mayor = OrdenTrabajoMayor::where('id', $req->id_orden_trabajo)->first();

            if (!$orden_trabajo_mayor) {
                return response()->json(['error' => 'Orden de trabajo no encontrada'], 404);
            }

            // Preparar los datos para la vista
            $datos = $orden_trabajo_mayor;

            // Obtener el nombre del paciente manualmente
            if ($orden_trabajo_mayor->id_paciente) {
                $paciente = Paciente::find($orden_trabajo_mayor->id_paciente);
                if ($paciente) {
                    $datos->paciente_nombre = $paciente->nombres . ' ' .
                                            $paciente->apellido_uno . ' ' .
                                            $paciente->apellido_dos;
                } else {
                    $datos->paciente_nombre = 'N/A';
                }
            } else {
                $datos->paciente_nombre = 'N/A';
            }

            // Obtener el nombre del laboratorio si existe
            if ($orden_trabajo_mayor->id_laboratorio) {
                $laboratorio = Laboratorio::find($orden_trabajo_mayor->id_laboratorio);
                if ($laboratorio) {
                    $datos->nombre_lab = $laboratorio->nombre;
                } else {
                    $datos->nombre_lab = 'N/A';
                }
            } else {
                $datos->nombre_lab = 'N/A';
            }

            // Renderizar la vista del trabajo mayor dental
            $pdf = Pdf::loadView('atencion_odontologica.PDF.trabajo_mayor_dental', compact('datos'));

            // Guardar el PDF en la carpeta public
            $fileName = 'trabajo_mayor_dental_' . $orden_trabajo_mayor->id . '_' . date('Y-m-d_H-i-s') . '.pdf';
            $filePath = public_path('reportes/' . $fileName);

            // Crear directorio si no existe
            if (!file_exists(public_path('reportes'))) {
                mkdir(public_path('reportes'), 0755, true);
            }

            file_put_contents($filePath, $pdf->output());

            // Devolver la ruta accesible del archivo PDF
            return response()->json([
                'estado' => 'ok',
                'mensaje' => 'PDF generado correctamente',
                'ruta' => asset('reportes/' . $fileName)
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'estado' => 'error',
                'mensaje' => 'Error al generar el PDF: ' . $e->getMessage()
            ]);
        }
    }

    public function registrar_orden_trabajo_mayor(Request $request)
    {

        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();
        $ficha = FichaAtencion::where('id', $request->id_ficha_atencion)->first();
        $trabajo_mayor  = new OrdenTrabajoMayor();

        $trabajo_mayor->nro_orden = $request->nro_orden_trabajo_mayor;

        $trabajo_mayor->clinica_doctor = $request->clinica_doctor_trabajo_mayor;

        $trabajo_mayor->rut_profesional = $request->rut_profesional_trabajo_mayor;

        $trabajo_mayor->guia = $request->guia_trabajo_mayor;

        $trabajo_mayor->color = $request->color_trabajo_mayor;

        $trabajo_mayor->urgencia = $request->urgencia_trabajo_mayor;

        $trabajo_mayor->material = $request->material_trabajo_mayor;

        $trabajo_mayor->trabajo_realizar = $request->trabajo_realizar_trabajo_mayor;

        $trabajo_mayor->comentarios = $request->comentarios_trabajo_mayor;

        $marca_implante = MarcasImplantes::find($request->marca_implante_trabajo_mayor);
        $trabajo_mayor->marca_implante = $marca_implante ? $marca_implante->descripcion : '';

        $trabajo_mayor->medida_implante = $request->_medida_implantetrabajo_mayor;

        $trabajo_mayor->nro_replicas = $request->nro_replicas_trabajo_mayor;

        $trabajo_mayor->nro_tornillos = $request->nro_tornillos_trabajo_mayor;

        $trabajo_mayor->otros = $request->otros_trabajo_mayor;

        $trabajo_mayor->cubetas = $request->cubetas_trabajo_mayor;

        $trabajo_mayor->p_articulacion = $request->p_articulacion_trabajo_mayor;

        $trabajo_mayor->p_dientes = $request->p_dientes_trabajo_mayor;

        $trabajo_mayor->p_metal = $request->p_metal_trabajo_mayor;

        $trabajo_mayor->bizcocho = $request->bizcocho_trabajo_mayor;

        $trabajo_mayor->terminacion = $request->terminacion_trabajo_mayor;

        $trabajo_mayor->compostura = $request->compostura_trabajo_mayor;



        $trabajo_mayor->id_paciente = $request->paciente_trabajo_mayor;

        $trabajo_mayor->id_profesional = $profesional->id;

        $trabajo_mayor->id_ficha_atencion = $request->id_ficha_atencion;
        $trabajo_mayor->id_lugar_atencion = $request->id_lugar_atencion;
        $trabajo_mayor->id_laboratorio = $request->laboratorio;
        $trabajo_mayor->fecha_envio = Carbon::now();
        $trabajo_mayor->id_presupuesto = $request->id_presupuesto;
        $trabajo_mayor->presupuesto = 1;

        if (!$trabajo_mayor->save()) {

            return 'error';

        }

        $mensaje = 'Se ha agregado Orden de trabajo mayor de forma exitosa';

         $fc = new ficha_atencionController();
        $ordenes_trabajo_menor = $fc->dameOrdenesTrabajoMenor($request->id_paciente, $request->id_profesional,$request->id_presupuesto, $request->id_ficha_atencion);
        $ordenes_trabajo_mayor = $fc->dameOrdenesTrabajoMayor($request->id_paciente, $request->id_profesional,$request->id_presupuesto, $request->id_ficha_atencion);
        $html_ordenes = view('atencion_odontologica.ordenes_trabajo', compact('ordenes_trabajo_menor', 'ordenes_trabajo_mayor', 'ficha'))->render();
        $resumen = view('atencion_odontologica.resumen_costos_lab', compact('ordenes_trabajo_menor','ordenes_trabajo_mayor','ficha'))->render();

        $correlativo = Correlativos::where('documento', 'Orden Trabajo Mayor')->where('id_usuario',Auth::user()->id)->first();
        $correlativo->correlativo = $correlativo->correlativo + 1;
        $correlativo->save();

        return ['mensaje' => 'OK',
        'estado' => 1,
            'msj' => $mensaje,
            'ordenes_trabajo_menor' => $ordenes_trabajo_menor,
            'ordenes_trabajo_mayor' => $ordenes_trabajo_mayor,
            'orden_trabajo_mayor' => $trabajo_mayor,
            'html' => $html_ordenes,
            'resumen' => $resumen,
        ];

    }



    public function registrar_pedido_insumos_materiales(Request $request)
    {
        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();

        switch ($request->tipo_insumo_material) {
            case 'insumo':
                $pedido  = new PedidoInsumos();
                $pedido->tipo_solicitud = $request->tipo_insumo_material;
                $pedido->cantidad = $request->cantidad_insumo_material;
                $pedido->uso = $request->uso_en_insumo_material;
                $pedido->pedido_a = $request->lugar_pedido_insumo_material;
                $pedido->descripcion = $request->nombre_insumo_material;
                $pedido->id_usuario = Auth::user()->id;
                $pedido->id_ficha_atencion = $request->id_ficha_atencion;
                $pedido->id_profesional = $profesional->id;
                break;

            case 'material':
                $pedido  = new PedidoMateriales();
                $pedido->tipo_solicitud = $request->tipo_insumo_material;
                $pedido->cantidad = $request->cantidad_insumo_material;
                $pedido->uso = $request->uso_en_insumo_material;
                $pedido->pedido_a = $request->lugar_pedido_insumo_material;
                $pedido->descripcion = $request->nombre_insumo_material;
                $pedido->id_usuario = Auth::user()->id;
                $pedido->id_ficha_atencion = $request->id_ficha_atencion;
                $pedido->id_profesional = $profesional->id;
                break;

        }

        if (!$pedido->save()) {
            return 'error';
        }


        $mensaje = 'Se ha agregado Orden de trabajo menor de forma exitosa';
        $pedidos = $this->dame_insumos_bodega($request->id_ficha_atencion);
        return ['status' => 1, 'mensaje' => $mensaje, 'pedido' => $pedido, 'pedidos' => $pedidos];

    }

    public function eliminar_pedido_insumos_materiales(Request $request)
    {
        try {
            $tipo = $request->tipo;
            if($tipo == 'insumo'){
                $pedido = PedidoInsumos::where('id', $request->id)->first();
            }else{
                $pedido = PedidoMateriales::where('id', $request->id)->first();
            }
            $id_ficha_atencion = $pedido->id_ficha_atencion;
            if ($pedido) {
                $pedido->delete();
                $pedidos = $this->dame_insumos_bodega($id_ficha_atencion);
                return ['status' => 1, 'mensaje' => 'Pedido eliminado correctamente', 'pedidos' => $pedidos];
            } else {
                return ['status' => 0, 'mensaje' => 'No se encontró el pedido'];
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function generar_pdf_pedido_insumos(Request $req){
        $id_ficha_atencion = $req->id_ficha_atencion;
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $insumos = PedidoInsumos::where('id_ficha_atencion',$id_ficha_atencion)->get();
        $materiales = PedidoMateriales::where('id_ficha_atencion',$id_ficha_atencion)->get();
        // unificar los insumos y materiales en un solo array de tipo collection
        $insumos = $insumos->merge($materiales);

        $ficha_atencion = FichaAtencion::where('id',$id_ficha_atencion)->first();
        $paciente = Paciente::where('id',$ficha_atencion->id_paciente)->first();
        $datos = [
            'insumos' => $insumos,
            'ficha_atencion' => $ficha_atencion,
            'paciente' => $paciente,
            'profesional' => $profesional
        ];
        // Renderizar la vista del presupuesto dental
        $pdf = Pdf::loadView('atencion_odontologica.PDF.pedido_insumos',compact('profesional','insumos','paciente'));
        // Guardar el PDF en la carpeta public
        $fileName = 'pedido_insumos_' . $req->id_paciente . '.pdf';
        $filePath = public_path('reportes/' . $fileName);
        file_put_contents($filePath, $pdf->output());
        // Devolver la ruta accesible del archivo PDF
        return ['status' => 1, 'ruta' => asset('reportes/' . $fileName)];
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

    public function registrar_gastos_material_paciente(Request $request)

    {



        $user = Auth::user()->id;

        $profesional = Profesional::where('id_usuario', $user)->first();



        $gastos_paciente  = new MaterialesInsumosPaciente();





        $gastos_paciente->codigo_trabajo = $request->cod_trabajo_materiales_insumos;

        $gastos_paciente->material = $request->material_materiales_insumos;

        $gastos_paciente->cantidad_material = $request->cantidad_material_materiales_insumos;

        $gastos_paciente->insumo = $request->insumo_materiales_insumos;

        $gastos_paciente->cantidad_insumo = $request->cantidad_insumo_materiales_insumos;



        $gastos_paciente->instrumental = $request->instrumental_materiales_insumos;

        $gastos_paciente->cantidad_instrumental = $request->cantidad_instrumental_materiales_insumos;

        $gastos_paciente->instrumental_desechable = $request->instrumental_desechable_materiales_insumos;

        $gastos_paciente->cantidad_instrumental_desechable = $request->cantidad_instrumental_desechable_materiales_insumos;

        $gastos_paciente->nro_box = $request->box_materiales_insumos;

        $gastos_paciente->hora_inicio = $request->hora_inicio__materiales_insumos;

        $gastos_paciente->hora_termino = $request->hora_termino_materiales_insumos;



        $gastos_paciente->id_paciente = $request->paciente_material_paciente;

        $gastos_paciente->id_profesional = $profesional->id;



        if (!$gastos_paciente->save()) {

            return 'error';

        }



        $mensaje = 'Se ha agregado Orden de trabajo menor de forma exitosa';



        return redirect()->back()->with('mensaje', $mensaje);

    }





    public function registrar_control_trabajo_laboratorio(Request $request)

    {



        $user = Auth::user()->id;

        $profesional = Profesional::where('id_usuario', $user)->first();



        $control_laboratorio  = new ControlEnvioLaboratorio();





        $control_laboratorio->nro_etiquetado = $request->nro_etiquetado_control_trabajo_laboratorio;

        $control_laboratorio->clinica = $request->clinica_control_trabajo_laboratorio;

        $control_laboratorio->doctor = $request->doctor_control_trabajo_laboratorio;

        $control_laboratorio->rut_profesional = $request->rut_profesional_control_trabajo_laboratorio;

        $control_laboratorio->grado_urgencia = $request->grado_urgencia_control_trabajo_laboratorio;



        $control_laboratorio->guia = $request->guia_control_trabajo_laboratorio;

        $control_laboratorio->color = $request->color_control_trabajo_laboratorio;

        $control_laboratorio->material = $request->material_control_trabajo_laboratorio;

        $control_laboratorio->trabajo_realizar = $request->trabajo_realizar_control_trabajo_laboratorio;

        $control_laboratorio->contenido_envio = $request->contenido_envio_control_trabajo_laboratorio;

        $control_laboratorio->comentarios = $request->comentarios_control_trabajo_laboratorio;



        $control_laboratorio->id_laboratorio = $request->laboratorio_control_trabajo_laboratorio;

        $control_laboratorio->id_paciente = $request->paciente_control_trabajo_laboratorio;

        $control_laboratorio->id_profesional = $profesional->id;



        if (!$control_laboratorio->save()) {

            return 'error';

        }



        $mensaje = 'Se ha agregado Orden de trabajo menor de forma exitosa';



        return redirect()->back()->with('mensaje', $mensaje);

    }





    public function registrar_anestesia_paciente(Request $request)

    {



        $user = Auth::user()->id;

        $profesional = Profesional::where('id_usuario', $user)->first();



        $anestesia  = new AnestesiaPaciente();



        $anestesia->nombre_responsable = $request->nombre_responsable_anestesia_paciente;

        $anestesia->incapacitado_por = $request->incapacitado_por_anestesia_paciente;

        $anestesia->nombre_anestesia = $request->nombre_anestesia_anestesia_paciente;

        $anestesia->codigo_verificacion = $request->codigo_verificacion_anestesia_paciente;



        $anestesia->id_paciente = $request->paciente_anestesia_paciente;

        $anestesia->id_profesional = $profesional->id;



        if (!$anestesia->save()) {

            return 'error';

        }



        $mensaje = 'Se ha agregado Orden de trabajo menor de forma exitosa';



        return redirect()->back()->with('mensaje', $mensaje);

    }



    public function registrar_certificado_reposo(Request $request)

    {

        $user = Auth::user()->id;

        $profesional = Profesional::where('id_usuario', $user)->first();



        // $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();



        $certificado = new CertificadoReposo();

        $certificado->fecha_inicio = $request->fecha_inicio_certificado;

        $certificado->fecha_termino = $request->fecha_termino_certificado;

        $certificado->hipotesis = $request->hipotesis_certificado;

        $certificado->comentarios = $request->comentarios_certificado;

        $certificado->id_profesional = $profesional->id;

        $certificado->id_paciente = $request->paciente_certificado_reposo;

        $certificado->id_ficha_dental_atencion = $request->ficha_dental_id_certificado_reposo;



        if (!$certificado->save()) {

            return 'error';

        }



        $mensaje = 'Se ha agregado Orden de trabajo menor de forma exitosa';



        return redirect()->back()->with('mensaje', $mensaje);

    }



    public function registrar_interconsulta(Request $request)

    {

        $user = Auth::user()->id;

        $profesional = Profesional::where('id_usuario', $user)->first();



        //$hora_medica = HoraMedica::where('id', $request->hora_medica)->first();



        $interconsulta = new Interconsulta();

        $interconsulta->nombre_esp = $request->nombre_especialista_interconsulta;

        $interconsulta->hipotesis = $request->hipotesis_interconsulta;

        $interconsulta->hipotesis = $request->comentarios_interconsulta;

        $interconsulta->comentarios = $request->comentarios_interconsulta;

        $interconsulta->fecha_solicitud = Carbon::now();

        $interconsulta->id_profesional = $profesional->id;

        $interconsulta->id_paciente = $request->paciente_interconsulta;

        $interconsulta->id_ficha_dental_atencion = $request->ficha_dental_id_interconsulta;



        if (!$interconsulta->save()) {

            return 'error';

        }



        $mensaje = 'Se ha agregado Orden de trabajo menor de forma exitosa';



        return redirect()->back()->with('mensaje', $mensaje);

    }



    public function registrar_informe_medico(Request $request)

    {

        $user = Auth::user()->id;

        $profesional = Profesional::where('id_usuario', $user)->first();



        //$hora_medica = HoraMedica::where('id', $request->hora_medica)->first();



        $informe = new InformeMedico();

        $informe->informe_medico = $request->comentarios_informe_medico;

        $informe->fecha_informe_medico = $request->fecha_informe_medico;

        $informe->id_profesional = $profesional->id;

        $informe->id_paciente = $request->paciente_informe_medico;

        $informe->id_ficha_dental_atencion = $request->ficha_dental_id_informe_medico;



        if (!$informe->save()) {

            return 'error';

        }



        $mensaje = 'Se ha agregado Orden de trabajo menor de forma exitosa';



        return redirect()->back()->with('mensaje', $mensaje);

    }



    public function registrar_antecedente_anestesia_ficha_dental(Request $request)

    {

        $user = Auth::user()->id;

        $profesional = Profesional::where('id_usuario', $user)->first();





        //$hora_medica = HoraMedica::where('id', $request->hora_medica)->first();



        $anestesia_paciente = new AntecedenteAnestesiaPaciente();

        $anestesia_paciente->procedimiento = $request->procedimiento_anestesia_ficha_atencion;

        $anestesia_paciente->detalle_tratamiento = $request->tratamiento_anestesia_ficha_atencion;

        $anestesia_paciente->rut_responsable = $request->rut_anestesia_ficha_atencion;

        $anestesia_paciente->id_profesional = $profesional->id;

        $anestesia_paciente->id_paciente = $request->paciente_antecedente_anestesia_atencion_dental;

        //$anestesia_paciente->id_ficha_dental_atencion = $request->ficha_dental_id_informe_medico;



        if (!$anestesia_paciente->save()) {

            return 'error';

        }



        //dd($anestesia_paciente);



        $mensaje = 'Se ha agregado Antecedente de anestesia de forma exitosa';



        return redirect()->back()->with('mensaje', $mensaje);

    }



    public function registrar_antecedente_hemorragia_ficha_dental(Request $request)

    {

        $user = Auth::user()->id;

        $profesional = Profesional::where('id_usuario', $user)->first();





        //$hora_medica = HoraMedica::where('id', $request->hora_medica)->first();



        $hemorragia_paciente = new AntecedenteHemorragiaPaciente();



        $hemorragia_paciente->procedimiento = $request->procedimiento_hemorragia_ficha_atencion;

        $hemorragia_paciente->detalle_tratamiento = $request->tratamiento_hemorragia_ficha_atencion;

        $hemorragia_paciente->rut_responsable = $request->rut_hemorragia_ficha_atencion;

        $hemorragia_paciente->id_profesional = $profesional->id;

        $hemorragia_paciente->id_paciente = $request->paciente_antecedente_hemorragia_atencion_dental;

        //$hemorragia_paciente->id_ficha_dental_atencion = $request->ficha_dental_id_informe_medico;



        if (!$hemorragia_paciente->save()) {

            return 'error';

        }



        //dd($hemorragia_paciente);



        $mensaje = 'Se ha agregado Antecedente de Hemorragia de forma exitosa';



        return redirect()->back()->with('mensaje', $mensaje);

    }



    public function registrar_antecedente_fractura_ficha_dental(Request $request)

    {

        $user = Auth::user()->id;

        $profesional = Profesional::where('id_usuario', $user)->first();





        //$hora_medica = HoraMedica::where('id', $request->hora_medica)->first();



        $fractura_paciente = new AntecedenteFracturaPaciente();



        $fractura_paciente->procedimiento = $request->procedimiento_fractura_ficha_atencion;

        $fractura_paciente->detalle_tratamiento = $request->tratamiento_fractura_ficha_atencion;

        $fractura_paciente->rut_responsable = $request->rut_fractura_ficha_atencion;

        $fractura_paciente->id_profesional = $profesional->id;

        $fractura_paciente->id_paciente = $request->paciente_antecedente_fractura_atencion_dental;

        //$fractura_paciente->id_ficha_dental_atencion = $request->ficha_dental_id_informe_medico;



        if (!$fractura_paciente->save()) {

            return 'error';

        }



        //dd($fractura_paciente);



        $mensaje = 'Se ha agregado Antecedente de Fractura de forma exitosa';



        return redirect()->back()->with('mensaje', $mensaje);

    }



    public function getArticulo(Request $request)
    {
        $search = $request->search;
        if ($search == '') {
            $employees = Articulo::orderby('nombre', 'asc')->select('id', 'nombre', 'droga', 'cant_comp', 'tipo_cont')->limit(15)->get();
        } else {
           //  $employees = Articulo::orderby('nombre', 'asc')->select('id', 'nombre')->where('nombre', 'like', '%' . $search . '%')->limit(15)->get();
            $employees = Articulo::orderby('nombre', 'asc')->select('id', 'nombre','droga', 'cant_comp', 'tipo_cont')->where('nombre', 'like', $search . '%')->limit(15)->get();
        }
        $response = array();

        foreach ($employees as $employee) {

            $response[] = array("value" => $employee->id, "label" => $employee->nombre,"droga" => $employee->droga, "control" => $employee->tipo_cont);

        }



        return response()->json($response);

    }

    public function getDiagnosticoDental(Request $request)
    {
        $search = $request->search;
        if ($search == '') {
            $employees = DiagnosticosDental::orderby('descripcion', 'asc')->select('id', 'descripcion', 'uco', 'valor', 'tipo_examen')->limit(15)->get();
        } else {
           //  $employees = DiagnosticoDental::orderby('descripcion', 'asc')->select('id', 'descripcion')->where('descripcion', 'like', '%' . $search . '%')->limit(15)->get();
            $employees = DiagnosticosDental::orderby('descripcion', 'asc')->select('id', 'descripcion','uco', 'valor', 'tipo_examen')->where('descripcion', 'like', $search . '%')->limit(15)->get();
        }
        $response = array();

        foreach ($employees as $employee) {
            $employee->descripcion = mb_strtoupper($employee->descripcion, 'UTF-8');
            $response[] = array("value" => $employee->id, "label" => $employee->descripcion,"descripcion" => $employee->descripcion, "control" => $employee->tipo_examen,'valor' => $employee->valor);

        }



        return response()->json($response);

    }

    public function getDiagnosticoDentalUrg(Request $request)
    {
        $search = $request->search;
        if ($search == '') {
            $employees = DiagnosticosDental::orderby('descripcion', 'asc')->select('id', 'descripcion', 'uco', 'valor', 'tipo_examen')->limit(15)->get();
        } else {
           //  $employees = DiagnosticoDental::orderby('descripcion', 'asc')->select('id', 'descripcion')->where('descripcion', 'like', '%' . $search . '%')->limit(15)->get();
            $employees = DiagnosticosDental::orderby('descripcion', 'asc')->select('id', 'descripcion','uco', 'valor', 'tipo_examen')->where('descripcion', 'like', $search . '%')->where('urgencia',1)->limit(15)->get();
        }
        $response = array();

        foreach ($employees as $employee) {
            $employee->descripcion = mb_strtoupper($employee->descripcion, 'UTF-8');
            $response[] = array("value" => $employee->id, "label" => $employee->descripcion,"descripcion" => $employee->descripcion, "control" => $employee->tipo_examen,'valor' => $employee->valor);

        }



        return response()->json($response);

    }

    public function guardarCambiosTratamientoUrgencia(Request $req){
       try {
        $pieza = OdontogramaPaciente::find($req->id_tratamiento);
        $pieza->estado = $req->estado;
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        if($pieza->save()){
            $odontograma = $this->dame_odontograma_paciente($req->id_paciente, $req->id_ficha_atencion, $req->id_lugar_atencion, $profesional->id_tipo_especialidad);
            $odontograma_paciente_historial = $this->dame_odontograma_paciente_historial($req->id_paciente);
            $odontograma_paciente_vista = view('atencion_odontologica.generales.odontograma_adulto',['odontograma_historial' => $odontograma_paciente_historial])->render();
            return [
                'mensaje' => 'OK',
                'odontograma' => $odontograma,
                'odontograma_paciente_vista' => $odontograma_paciente_vista
            ];
        }else{
            return [
                'mensaje' => 'ERROR',
            ];
        }
       } catch (\Exception $e) {
        //throw $th;
        return [
            'mensaje' => 'ERROR',
            'error' => $e->getMessage()
        ];
       }

    }

    public function getTratamientoImplantologia(Request $request){
        $search = $request->search;
        if ($search == '') {
            $employees = TratamientosImplantologia::orderby('descripcion', 'asc')->select('id', 'descripcion', 'valor')->limit(15)->get();
        } else {
           //  $employees = DiagnosticoDental::orderby('descripcion', 'asc')->select('id', 'descripcion')->where('descripcion', 'like', '%' . $search . '%')->limit(15)->get();
            $employees = TratamientosImplantologia::orderby('descripcion', 'asc')->select('id', 'descripcion', 'valor')->where('descripcion', 'like', $search . '%')->limit(15)->get();
        }
        $response = array();

        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();

        foreach ($employees as $employee) {
            $id_diagnostico = TratamientosImplantologia::where('descripcion',$employee->descripcion)->first();
            $employee->id_diagnostico = $id_diagnostico->id;
            // buscamos el valor del tratamiento en la tabla diagnosticos_dental_profesional
            $d = DiagnosticosDentalProfesional::where('id_diagnostico',$id_diagnostico->id)
                ->where('id_profesional',$profesional->id)
                ->first();
                if($d){
                    $employee->valor = $d->valor;
                }
            $employee->descripcion = mb_strtoupper($employee->descripcion, 'UTF-8');
            $response[] = array("value" => $employee->id, "label" => $employee->descripcion,"descripcion" => $employee->descripcion, "control" => $employee->tipo_examen,'valor' => $employee->valor);

        }



        return response()->json($response);
    }

    public function getTratamientoRehabImplantologia(Request $request){

$search = $request->search;
        if ($search == '') {
            $employees = TratamientosImplantologia::where('impl_rehab',1)->orderby('descripcion', 'asc')->select('id', 'descripcion', 'valor')->limit(15)->get();
        } else {
           //  $employees = DiagnosticoDental::orderby('descripcion', 'asc')->select('id', 'descripcion')->where('descripcion', 'like', '%' . $search . '%')->limit(15)->get();
            $employees = TratamientosImplantologia::where('impl_rehab',1)->orderby('descripcion', 'asc')->select('id', 'descripcion', 'valor')->where('descripcion', 'like', $search . '%')->limit(15)->get();
        }
        $response = array();

        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();

        foreach ($employees as $employee) {
            $id_diagnostico = TratamientosImplantologia::where('descripcion',$employee->descripcion)->first();
            $employee->id_diagnostico = $id_diagnostico->id;
            // buscamos el valor del tratamiento en la tabla diagnosticos_dental_profesional
            $d = DiagnosticosDentalProfesional::where('id_diagnostico',$id_diagnostico->id)
                ->where('id_profesional',$profesional->id)
                ->first();
                if($d){
                    $employee->valor = $d->valor;
                }
            $response[] = array("value" => $employee->id, "label" => $employee->descripcion,"descripcion" => $employee->descripcion, "control" => $employee->tipo_examen,'valor' => $employee->valor);

        }



        return response()->json($response);
    }

    public function getPrestacionesLaboratorio(Request $request){
        $search = $request->search;
        if ($search == '') {
            $employees = PrestacionesLaboratorio::orderby('nombre', 'asc')->select('id', 'nombre', 'valor')->limit(15)->get();
        } else {
           //  $employees = DiagnosticoDental::orderby('descripcion', 'asc')->select('id', 'descripcion')->where('descripcion', 'like', '%' . $search . '%')->limit(15)->get();
            $employees = PrestacionesLaboratorio::orderby('nombre', 'asc')->select('id', 'nombre', 'valor')->where('nombre', 'like', $search . '%')->limit(15)->get();
        }
        $response = array();

        foreach ($employees as $employee) {

            $response[] = array("value" => $employee->id, "label" => $employee->nombre,"descripcion" => $employee->categoria, "control" => $employee->nombre,'valor' => $employee->valor);

        }
         return response()->json($response);
    }

    public function cargar_prestacion_laboratorio(Request $request){
        try {

            $id_trabajo = $request->id_trabajo;
            if($request->tipo == 'menor'){
                $orden_trabajo = OrdenTrabajoMenor::where('id', $id_trabajo)->first();
            }else{
                $orden_trabajo = OrdenTrabajoMayor::where('id', $id_trabajo)->first();
            }

            $request->fecha = Carbon::now();

            $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
            // crear el presupuesto si es que aun no se ha registrado
            $presupuesto = PresupuestosDental::where('id_paciente', $orden_trabajo->id_paciente)->where('id_lugar_atencion', $orden_trabajo->id_lugar_atencion)->where('id_ficha_atencion', $orden_trabajo->id_ficha_atencion)->first();
            if(!$presupuesto){
                $presupuesto = new PresupuestosDental;
                $presupuesto->id_paciente = $orden_trabajo->id_paciente;
                $presupuesto->id_profesional = $orden_trabajo->id_profesional;
                $presupuesto->id_ficha_atencion = $orden_trabajo->id_ficha_atencion;
                $presupuesto->id_lugar_atencion = $request->id_lugar_atencion;
                $presupuesto->datos_piezas_dentales = '{"key": "value"}'; // luego lo modificamos
                $presupuesto->estado = 1;
                $presupuesto->aprobado = 0;
                $presupuesto->fecha_control = Carbon::parse($request->fecha)->format('Y-m-d');
                $presupuesto->fecha = Carbon::parse($request->fecha)->format('Y-m-d');
                $presupuesto->boca = 0;
                $presupuesto->save();
            }
            $orden_trabajo->presupuesto = 1;
            $orden_trabajo->id_presupuesto = $presupuesto->id;
            $orden_trabajo->id_lugar_atencion = $request->id_lugar_atencion;

            $ficha = FichaAtencion::where('id', $request->id_ficha_atencion)->first();

            if($orden_trabajo->save()){
                $fc = new ficha_atencionController();
                $ordenes_trabajo_menor = $fc->dameOrdenesTrabajoMenor($request->id_paciente, $request->id_profesional, $request->id_presupuesto);
                $ordenes_trabajo_mayor = $fc->dameOrdenesTrabajoMayor($request->id_paciente, $request->id_profesional, $request->id_presupuesto);
                $html_ordenes = view('atencion_odontologica.ordenes_trabajo', compact('ordenes_trabajo_menor', 'ordenes_trabajo_mayor', 'ficha'))->render();
                $resumen = view('atencion_odontologica.resumen_costos_lab', compact('ordenes_trabajo_menor','ordenes_trabajo_mayor','ficha'))->render();
                $valores = $this->dameValoresOdontograma($request->id_paciente, $request->id_ficha_atencion, $request->id_lugar_atencion, $profesional->id_tipo_especialidad);
                return ['estado' => 'ok', 'mensaje' => 'Prestación de laboratorio cargada correctamente',
                        'orden_trabajo_menor' => $orden_trabajo,
                        'ordenes_trabajo_menor' => $ordenes_trabajo_menor,
                        'ordenes_trabajo_mayor' => $ordenes_trabajo_mayor,
                        'html' => $html_ordenes,
                        'resumen' => $resumen,
                        'valores' => $valores
                    ];
            }else{
                return ['estado' => 'error', 'mensaje' => 'Error al cargar la prestación de laboratorio',
                        'orden_trabajo_menor' => $orden_trabajo_menor,
                        'ordenes_trabajo_menor' => $ordenes_trabajo_menor,
                    ];
            }
        } catch (\Exception $e) {
            //throw $th;
            return ['estado' => 'error', 'mensaje' => $e->getMessage()];
        }

    }

    public function dame_estados_trabajo(Request $request){

        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $ficha = FichaAtencion::where('id', $request->id_ficha_atencion)->first();
        $fc = new ficha_atencionController();
        $ordenes_trabajo_menor = $fc->dameOrdenesTrabajoMenor($request->id_paciente, $profesional->id, $request->id_presupuesto, $request->id_ficha_atencion);
        $ordenes_trabajo_mayor = $fc->dameOrdenesTrabajoMayor($request->id_paciente, $profesional->id, $request->id_presupuesto, $request->id_ficha_atencion);
        $html_ordenes = view('atencion_odontologica.ordenes_trabajo', compact('ordenes_trabajo_menor', 'ordenes_trabajo_mayor', 'ficha'))->render();
        $resumen = view('atencion_odontologica.resumen_costos_lab', compact('ordenes_trabajo_menor','ordenes_trabajo_mayor','ficha'))->render();
        $valores = $this->dameValoresOdontograma($request->id_paciente, $request->id_ficha_atencion, $request->id_lugar_atencion, $profesional->id_tipo_especialidad);
        return ['estado' => 'ok', 'mensaje' => 'Prestación de laboratorio cargada correctamente',
                'ordenes_trabajo_menor' => $ordenes_trabajo_menor,
                'ordenes_trabajo_mayor' => $ordenes_trabajo_mayor,
                'html' => $html_ordenes,
                'resumen' => $resumen,
                'valores' => $valores
            ];
    }


    public function sacar_prestacion_laboratorio(Request $request){
        try {

            $id_trabajo = $request->id_trabajo;
            if($request->tipo == 'menor'){
                $orden_trabajo = OrdenTrabajoMenor::where('id', $id_trabajo)->first();
            }else{
                $orden_trabajo = OrdenTrabajoMayor::where('id', $id_trabajo)->first();
            }
            $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
            $orden_trabajo->presupuesto = 0;
            $ficha = FichaAtencion::where('id', $request->id_ficha_atencion)->first();

            if($orden_trabajo->save()){
                $fc = new ficha_atencionController();
                $ordenes_trabajo_menor = $fc->dameOrdenesTrabajoMenor($request->id_paciente, $request->id_profesional, $request->id_presupuesto);
                $ordenes_trabajo_mayor = $fc->dameOrdenesTrabajoMayor($request->id_paciente, $request->id_profesional, $request->id_presupuesto);
                $html_ordenes = view('atencion_odontologica.ordenes_trabajo', compact('ordenes_trabajo_menor', 'ordenes_trabajo_mayor', 'ficha'))->render();
                $resumen = view('atencion_odontologica.resumen_costos_lab', compact('ordenes_trabajo_menor','ordenes_trabajo_mayor','ficha'))->render();
                $valores = $this->dameValoresOdontograma($request->id_paciente,$request->id_ficha_atencion,$request->id_lugar_atencion, $profesional->id_tipo_especialidad);
                return ['estado' => 'ok', 'mensaje' => 'Prestación de laboratorio eliminada correctamente',
                        'orden_trabajo_menor' => $orden_trabajo,
                        'ordenes_trabajo_menor' => $ordenes_trabajo_menor,
                        'ordenes_trabajo_mayor' => $ordenes_trabajo_mayor,
                        'html' => $html_ordenes,
                        'resumen' => $resumen,
                        'valores' => $valores
                    ];
                } else {
                    return ['estado' => 'error', 'mensaje' => 'Error al eliminar la prestación de laboratorio',
                        'orden_trabajo_menor' => $orden_trabajo_menor,
                        'ordenes_trabajo_menor' => $ordenes_trabajo_menor,
                        'ordenes_trabajo_mayor' => $ordenes_trabajo_mayor,
                    ];
                }
        } catch (\Exception $e) {
            //throw $th;
            return ['estado' => 'error', 'mensaje' => $e->getMessage()];
        }
    }

    public function getCie10(Request $request)

    {

        $search = $request->search;



        if ($search == '') {

            $employees = DiagnosticoCie::orderby('descripcion', 'asc')->select('id', 'descripcion')->limit(15)->get();

        } else {

             // $employees = DiagnosticoCie::orderby('descripcion', 'asc')->select('id', 'descripcion')->where('descripcion', 'like', '%' . $search . '%')->limit(15)->get();

            $employees = DiagnosticoCie::orderby('descripcion', 'asc')->select('id', 'descripcion')->where('descripcion', 'like', $search . '%')->limit(15)->get();

        }



        $response = array();

        foreach ($employees as $employee) {

            $response[] = array("value" => $employee->id, "label" => $employee->descripcion);

        }



        return response()->json($response);

    }

    public function getCie10_1(Request $request)

    {

        $search = $request->search;



        if ($search == '') {

            $employees = DiagnosticoCie::orderby('descripcion', 'asc')->select('id', 'descripcion')->limit(15)->get();

        } else {

            $employees = DiagnosticoCie::orderby('descripcion', 'asc')->select('id', 'descripcion')->where('descripcion', 'like', '%' . $search . '%')->limit(15)->get();

        }



        $response = array();

        foreach ($employees as $employee) {

            $response[] = array("value" => $employee->id, "label" => $employee->descripcion);

        }



        return response()->json($response);

    }



    public function getTipoExamen(Request $request)
    {
        $search = $request->search;

        if ($search == '') {
            $employees = ExamenMedico::orderby('id', 'asc')->select('id', 'nombre_examen')->limit(15)->get();
        } else {
            $employees = ExamenMedico::orderby('id', 'asc')->select('id', 'nombre_examen')->where('nombre_examen', 'like', '%' . $search . '%')->limit(15)->get();
        }

        $response = array();
        foreach ($employees as $employee) {
            $response[] = array("value" => $employee->id, "label" => $employee->descripcion);
        }
        return response()->json($response);
    }

    public function buscar_ciudad_region(Request $request)
    {
        $ciudad = Ciudad::where('id_region', $request->region)->orderBy('nombre')->get();
        return json_encode($ciudad);
    }

    public function dameRegiones()
    {
        $regiones = Region::all();
        return json_encode($regiones);
    }

    public function getDosis(Request $request)
    {



        //$articulo = Articulo::where('id', $request->id_medicamento)->first()->dosis;



        $dosis = Articulo::where('cod_parent', $request->id_medicamento)->get();



        return json_encode($dosis);

    }

    public function insertMedicamento(Request $request){
        try {
            $medicamento_cronico_externo = new MedicamentoUsoCronicoExterno();
            $medicamento_cronico_externo->id_paciente = $request->id_paciente;
            $medicamento_cronico_externo->id_articulo = $request->id_medicamento;
            $medicamento_cronico_externo->nombre_medicamento = $request->medicamento;
            $medicamento_cronico_externo->cantidad = $request->cantidad;
            $medicamento_cronico_externo->presentacion = $request->dosis;
            $medicamento_cronico_externo->tipo_enfermedad = "cronico";
            $medicamento_cronico_externo->estado = 1;
            if($medicamento_cronico_externo->save()){
                $medicamentos = $this->dameMedicamentosCronicos($request->id_paciente);
                return ['estado' => 'ok','mensaje', 'Medicamento guardado de forma correcta','medicamentos' => $medicamentos];
            }else{
                return ['estado' => 'error','mensaje', 'Error al guardar el medicamento'];
            }
        } catch (\Exception $e) {
            return ['estado' => 'error','mensaje', $e->getMessage()];
        }
    }

    public function buscarPaciente(Request $request)
    {
        try {
            $paciente = Paciente::where('rut', $request->rut)->first();
            if($paciente){
                $token = rand(100000, 999999); // O usa Str::random(6) para letras/números
                $paciente->token = $token;
                $paciente->save();
                // buscar la direccion
                $direccion = Direccion::where('id', $paciente->id_direccion)->first();
                $paciente->direccion = $direccion;
                // buscar la ciudad
                $ciudad = Ciudad::where('id', $direccion->id_ciudad)->first();
                $paciente->ciudad = $ciudad;
                $id_paciente_externo = $this->agregar_paciente_externo($paciente->id);

                $paciente->id_paciente_externo = $id_paciente_externo;
                $medicamentos = $this->dameMedicamentosCronicos($id_paciente_externo);


                return ['estado' => 'ok','mensaje'=> 'Paciente encontrado','paciente' => $paciente, 'medicamentos' => $medicamentos];
            }else{
                // buscar en paciente externo
                $paciente_externo = PacienteExterno::where('rut', $request->rut)->first();
                if($paciente_externo){
                    $direccion = Direccion::where('id', $paciente_externo->id_direccion)->first();
                    $paciente_externo->direccion = $direccion;
                    $ciudad = Ciudad::where('id', $direccion->id_ciudad)->first();
                    $paciente_externo->ciudad = $ciudad;
                    $paciente_externo->apellido_uno = $paciente_externo->apellido_paterno;
                    $paciente_externo->apellido_dos = $paciente_externo->apellido_materno;
                    $paciente_externo->telefono_uno = $paciente_externo->telefono;
                    $medicamentos = $this->dameMedicamentosCronicos($paciente_externo->id);

                    return ['estado' => 'ok','mensaje'=> 'Paciente encontrado','paciente' => $paciente_externo, 'medicamentos' => $medicamentos];
                }else{
                    return ['estado' => 'error','mensaje'=> 'Paciente no encontrado'];
                }
            }
        } catch (\Exception $e) {
            //throw $th;
            return ['estado' => 'error','mensaje', $e->getMessage()];
        }

    }

    public function buscarPacienteHoraMedica(Request $request){
        try {

            $paciente = Paciente::find($request->id_paciente);
            if($paciente){
                // buscar la direccion
                $direccion = Direccion::where('id', $paciente->id_direccion)->with('ciudad')->first();
                $paciente->direccion = $direccion;
                $paciente->prevision = Prevision::where('id', $paciente->id_prevision)->first();
                // buscar la ciudad
                $ciudad = Ciudad::where('id', $direccion->id_ciudad)->first();
                $paciente->ciudad = $ciudad;
                $token = rand(100000, 999999); // O usa Str::random(6) para letras/números
                return ['estado' => 'ok','mensaje'=> 'Paciente encontrado','paciente' => $paciente];
            }else{
                return ['estado' => 'error','mensaje'=> 'Paciente no encontrado'];
            }
        } catch (\Exception $e) {
            //throw $th;
            return ['estado' => 'error','mensaje', $e->getMessage()];
        }
    }

    public function agendarHoraMedica(Request $request)
    {

        // var_dump($request->all());

        $token_paciente = $request->_token;
        $paciente = paciente::where('id', $request->reserva_hora_id)->where('token', $token_paciente)->first();
        //$asistente = Asistente::where('id_usuario', Auth::user()->id)->first();
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
        $hora_medica->id_asistente = isset($asistente) ? $asistente->id : null;
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
        $lugar_atencion = LugarAtencion::find($request->id_lugar_atencion);
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

    public function horas_medicas_profesional_lugar_atencion(Request $request){


        $datos = array();
        $horario = ProfesionalHorario::where('id_profesional', $request->id_profesional)
                                        ->where('id_lugar_atencion', $request->lugar_atencion)
                                        // ->tipoAgenda($request->tipo_agenda)
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

    public function eliminarMedicamento(Request $request){
        try {
            $medicamento = MedicamentoUsoCronicoExterno::find($request->id_medicamento);
            $id_paciente = $medicamento->id_paciente;
            if($medicamento->delete()){
                $medicamentos = $this->dameMedicamentosCronicos($id_paciente);
                return ['estado' => 'ok','mensaje', 'Medicamento eliminado de forma correcta','medicamentos' => $medicamentos];
            }else{
                return ['estado' => 'error','mensaje', 'Error al eliminar el medicamento'];
            }
        } catch (\Exception $e) {
            return ['estado' => 'error','mensaje', $e->getMessage()];
        }
    }

    private function agregar_paciente_externo($id_paciente){
        try {
            $paciente = Paciente::find($id_paciente);
            $existe = PacienteExterno::where('rut', $paciente->rut)->first();
            if($existe){
                return $existe->id;
            }
            $paciente_externo = new PacienteExterno();
            $paciente_externo->rut = $paciente->rut;
            $paciente_externo->nombres = $paciente->nombres;
            $paciente_externo->apellido_paterno = $paciente->apellido_uno;
            $paciente_externo->apellido_materno = $paciente->apellido_dos;
            $paciente_externo->telefono = $paciente->telefono_uno;
            $paciente_externo->email = $paciente->email;
            $paciente_externo->id_direccion = $paciente->id_direccion;
            $paciente_externo->estado = 1;
            $paciente_externo->save();
            return $paciente_externo->id;
        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }

    private function dameMedicamentosCronicos($id_paciente = null){
        $medicamentos = MedicamentoUsoCronicoExterno::where('id_paciente', $id_paciente)->get();
        return $medicamentos;
    }

    public function insertPaciente(Request $request){
        try {
            // revisar si existe el paciente por el rut
            $paciente = PacienteExterno::where('rut', $request->rut)->first();
            if(!$paciente){
                $paciente = new PacienteExterno();
            }
            $paciente->rut = $request->rut;
            $paciente->nombres = $request->nombre;
            $paciente->apellido_paterno = $request->apellido_paterno;
            $paciente->apellido_materno = $request->apellido_materno;
            $paciente->telefono = $request->telefono;
            $registro_direccion = new Direccion();
            $registro_direccion->direccion = $request->direccion;
            $registro_direccion->numero_dir = $request->numero;
            $registro_direccion->id_ciudad = $request->comuna;
            $registro_direccion->save();

            $paciente->email = $request->correo;
            $paciente->id_direccion = $registro_direccion->id;
            $paciente->id_region = $request->region;
            $paciente->id_comuna = $request->comuna;
            $paciente->estado = 1;

            if($paciente->save()){
                return ['estado' => 'ok','mensaje', 'Paciente guardado de forma correcta','id_paciente' => $paciente->id];
            }else{
                return ['estado' => 'error','mensaje', 'Error al guardar el paciente'];
            }
        } catch (\Exception $e) {
            //throw $th;
            return ['estado' => 'error','mensaje', $e->getMessage()];
        }

    }

    public function getCantComp(Request $request)
    {
        $cant_comp = RecetaPresentacion::where('tipo_presentacion', $request->cant_comp)->get();
        return json_encode($cant_comp);
    }

    public function getFrecuencia(Request $request)
    {
        //$articulo = Articulo::where('id', $request->id_medicamento)->first()->dosis;
        //$dosis = RecetaDosis::where('id', $request->id_dosis)->get();
        $frecuencias = RecetaDosis::where('cod_parent', $request->id_dosis)->get();
        //dd($frecuencias);
        return json_encode($frecuencias);
    }







    public function registro_obesidad_dental(Request $request)

    {

        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();



        //$hora_medica = HoraMedica::where('id', $request->hora_medica)->first();



        $control_obesidad = new ControlObesidad();

        $control_obesidad->peso = $request->peso;

        $control_obesidad->variacion = $request->variacion;

        $control_obesidad->ideal = $request->ideal;

        $control_obesidad->id_profesional = $profesional->id;

        $control_obesidad->id_paciente = $request->paciente_atencion_dental;

        //$control_obesidad->id_ficha_atencion = $request->id_ficha_atencion;



        if (!$control_obesidad->save()) {

            return 'error';

        }



        return json_encode($control_obesidad);

    }



    public function registrar_control_diabetes(Request $request)

    {

        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();



        //$hora_medica = HoraMedica::where('id', $request->hora_medica)->first();



        $diabetes = new Diabete();

        $diabetes->peso = $request->peso;

        $diabetes->pies = $request->pies;

        $diabetes->hgac1 = $request->hgac1;

        $diabetes->colesterol = $request->colesterol;

        $diabetes->creatina = $request->creatina;

        $diabetes->glicosilada_postprandial = $request->glicosilada_postprandial;

        $diabetes->glicosinada_ayuno = $request->glicosinada_ayuno;

        $diabetes->id_profesional = $profesional->id;

        $diabetes->id_paciente = $request->paciente_atencion_dental;

        //$diabetes->id_ficha_atencion = $hora_medica->id_ficha_atencion;



        if (!$diabetes->save()) {

            return 'error';

        }



        return json_encode($diabetes);

    }



    public function registrar_control_hipertension(Request $request)

    {

        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();



        // $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();



        $hipertension = new Hipertension();

        $hipertension->sistolica = $request->sistolica;

        $hipertension->diastolica = $request->diastolica;

        $hipertension->ideal = $request->ideal;

        $hipertension->id_profesional = $profesional->id;

        $hipertension->id_paciente = $request->paciente_atencion_dental;

        //$hipertension->id_ficha_atencion = $hora_medica->id_ficha_atencion;



        //dd($hipertension);



        if (!$hipertension->save()) {

            return 'error';

        }



        return json_encode($hipertension);

    }

    public function guardar_evolucion_od_gral(Request $request){
        try {
            // Obtener el profesional autenticado
            $user = Auth::user()->id;
            $profesional = Profesional::where('id_usuario', $user)->first();

            if (!$profesional) {
                return [
                    'estado' => 'error',
                    'mensaje' => 'No se encontró el profesional asociado al usuario'
                ];
            }

            if($request->piezas){
                foreach($request->piezas as $pieza){
                    // Aquí puedes realizar la lógica que necesites para cada pieza
                    // Crear la nueva evolución
                    $evolucion = new EvolucionOdontologiaGral();
                    $evolucion->pieza = $pieza;
                    $evolucion->evolucion = $request->evolucion;
                    $evolucion->obs = $request->obs;
                    $evolucion->id_procedimiento = $request->proc;
                    $evolucion->id_ficha_atencion = $request->id_ficha_atencion;
                    $evolucion->id_paciente = $request->id_paciente;
                    $evolucion->id_profesional = $profesional->id;
                    $evolucion->id_lugar_atencion = $request->id_lugar_atencion;
                    $evolucion->id_presupuesto = $request->id_presupuesto;

                    $evolucion->save();
                }
            }else{
                // Crear la nueva evolución
                $evolucion = new EvolucionOdontologiaGral();
                $evolucion->pieza = $request->pieza;
                $evolucion->evolucion = $request->evolucion;
                $evolucion->obs = $request->obs;
                $evolucion->id_procedimiento = $request->proc;
                $evolucion->id_ficha_atencion = $request->id_ficha_atencion;
                $evolucion->id_paciente = $request->id_paciente;
                $evolucion->id_profesional = $profesional->id;
                $evolucion->id_lugar_atencion = $request->id_lugar_atencion;
                $evolucion->id_presupuesto = $request->id_presupuesto;

                if (!$evolucion->save()) {
                    return [
                        'estado' => 'error',
                        'mensaje' => 'Error al guardar la evolución de odontología general'
                    ];
                }
            }



            // Obtener todas las evoluciones de la ficha de atención
            $evoluciones = EvolucionOdontologiaGral::where('id_ficha_atencion', $request->id_ficha_atencion)
                ->orderBy('created_at', 'desc')
                ->get();

            // Formatear las evoluciones para la respuesta
            $evolucionesFormatted = [];
            foreach($evoluciones as $evol) {
                $profesionalNombre = 'N/A';
                if($evol->profesional) {
                    $profesionalNombre = $evol->profesional->nombre . ' ' . $evol->profesional->apellido_uno;
                }

                $evolucionesFormatted[] = [
                    'id' => $evol->id,
                    'pieza' => $evol->pieza,
                    'evolucion' => $evol->evolucion,
                    'obs' => $evol->obs,
                    'proc' => $evol->proc,
                    'fecha' => $evol->created_at->format('d/m/Y H:i'),
                    'profesional' => $profesionalNombre,
                    'presupuesto_id' => $evol->id_presupuesto,
                ];
            }

            return [
                'estado' => 'ok',
                'mensaje' => 'Evolución de odontología general guardada correctamente',
                'evolucion' => $evolucion,
                'evoluciones' => $evolucionesFormatted
            ];

        } catch (\Exception $e) {
            return [
                'estado' => 'error',
                'mensaje' => 'Error interno del servidor: ' . $e->getMessage()
            ];
        }
    }

     public function eliminar_evolucion_od_gral(Request $request) {
        try {
            $id_evolucion = $request->id_evolucion;
            $id_ficha_atencion = $request->id_ficha_atencion;
            $id_paciente = $request->id_paciente;
            $id_lugar_atencion = $request->id_lugar_atencion;

            // Buscar la evolución
            $evolucion = EvolucionOdontologiaGral::find($id_evolucion);

            if (!$evolucion) {
                return [
                    'estado' => 'error',
                    'mensaje' => 'Evolución no encontrada'
                ];
            }

            // Verificar que la evolución pertenece a la ficha de atención correcta
            if ($evolucion->id_ficha_atencion != $id_ficha_atencion) {
                return [
                    'estado' => 'error',
                    'mensaje' => 'La evolución no pertenece a esta ficha de atención'
                ];
            }

            // Eliminar la evolución
            $evolucion->delete();

            // Obtener las evoluciones restantes para devolver la lista actualizada usando scopes y relaciones completas
            $evoluciones_restantes = EvolucionOdontologiaGral::porFichaAtencion($id_ficha_atencion)
                ->with(['paciente', // Cargar todos los datos del paciente
                       'profesional', // Cargar todos los datos del profesional
                       'fichaAtencion', // Cargar todos los datos de la ficha
                       'lugarAtencion', // Cargar todos los datos del lugar de atención
                       'presupuesto' // Cargar presupuesto si existe
                      ])
                ->orderBy('created_at', 'desc')
                ->get();

            // Cargar procedimientos de forma condicional (solo si id_procedimiento no es null y es numérico)
            $evoluciones_restantes->load(['procedimiento' => function($query) {
                $query->where('id', '!=', null);
            }]);

            // Formatear las evoluciones para la vista con estructura completa
            $evoluciones_formateadas = [];
            foreach ($evoluciones_restantes as $evol) {
                $evoluciones_formateadas[] = [
                    // Todos los datos de la evolución
                    'id' => $evol->id,
                    'pieza' => $evol->pieza,
                    'id_procedimiento' => $evol->id_procedimiento,
                    'procedimiento_nombre' => $evol->id_procedimiento, // Si es string, usar directamente
                    'obs' => $evol->obs,
                    'evolucion' => $evol->evolucion,
                    'id_ficha_atencion' => $evol->id_ficha_atencion,
                    'id_paciente' => $evol->id_paciente,
                    'id_profesional' => $evol->id_profesional,
                    'id_lugar_atencion' => $evol->id_lugar_atencion,
                    'id_presupuesto' => $evol->id_presupuesto,
                    'created_at' => $evol->created_at,
                    'updated_at' => $evol->updated_at,
                    'fecha_formateada' => $evol->created_at->format('d/m/Y H:i'),

                    // Datos del paciente completos
                    'paciente' => $evol->paciente,
                    'paciente_nombre_completo' => $evol->paciente ?
                        $evol->paciente->nombres . ' ' . $evol->paciente->apellido_uno . ' ' . $evol->paciente->apellido_dos : 'No disponible',

                    // Datos del profesional completos
                    'profesional' => $evol->profesional,
                    'profesional_nombre_completo' => $evol->profesional ?
                        $evol->profesional->nombre . ' ' . $evol->profesional->apellido_uno . ' ' . $evol->profesional->apellido_dos : 'No disponible',

                    // Datos de la ficha de atención completos
                    'ficha_atencion' => $evol->fichaAtencion,

                    // Datos del lugar de atención completos
                    'lugar_atencion' => $evol->lugarAtencion,
                    'lugar_atencion_nombre' => $evol->lugarAtencion ?
                        $evol->lugarAtencion->nombre_lugar : 'No disponible',

                    // Datos del presupuesto (si existe)
                    'presupuesto' => $evol->presupuesto ?? null,

                    // Procedimiento - manejo condicional
                    'procedimiento' => $evol->procedimiento ?? null,
                    'procedimiento_info' => [
                        'tiene_relacion' => $evol->procedimiento !== null,
                        'id_procedimiento_raw' => $evol->id_procedimiento,
                        'es_numerico' => is_numeric($evol->id_procedimiento),
                        'debug_info' => [
                            'tipo' => gettype($evol->id_procedimiento),
                            'valor' => $evol->id_procedimiento
                        ]
                    ],

                    // Datos formateados para compatibilidad con el frontend existente
                    'n_pieza' => $evol->pieza, // Corregir el nombre del campo
                    'proc' => $evol->id_procedimiento, // Usar id_procedimiento como proc
                    'fecha' => $evol->created_at->format('d/m/Y H:i'), // Alias para compatibilidad
                    'profesional_simple' => $evol->profesional ?
                        $evol->profesional->nombre . ' ' . $evol->profesional->apellido_uno : 'No disponible',
                ];
            }

            return [
                'estado' => 'ok',
                'mensaje' => 'Evolución eliminada correctamente',
                'evoluciones' => $evoluciones_formateadas,
                'evoluciones_raw' => $evoluciones_restantes, // Datos completos sin formatear
                'total_evoluciones' => $evoluciones_restantes->count(),
                'informacion_adicional' => [
                    'id_ficha_atencion' => $id_ficha_atencion,
                    'id_paciente' => $id_paciente,
                    'id_lugar_atencion' => $id_lugar_atencion,
                    'evolucion_eliminada_id' => $id_evolucion
                ]
            ];

        } catch (\Exception $e) {
            return [
                'estado' => 'error',
                'mensaje' => 'Error al eliminar la evolución: ' . $e->getMessage()
            ];
        }
    }
}
