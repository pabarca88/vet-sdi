<?php



namespace App\Http\Controllers;



use App\Http\Controllers\Controller;
use App\Models\AnestesiaPaciente;
use App\Models\AntecedenteAnestesiaPaciente;
use App\Models\AntecedenteFracturaPaciente;
use App\Models\AntecedenteHemorragiaPaciente;
use App\Models\Articulo;
use App\Models\Biopsia;
use App\Models\CertificadoReposo;
use App\Models\Ciudad;
use App\Models\ConstanciaGes;
use App\Models\ControlBocaCompleta;
use App\Models\ControlEndodonciaPaciente;
use App\Models\ControlEnvioLaboratorio;
use App\Models\ControlMaxilarInferior;
use App\Models\ControlMaxilarSuperior;
use App\Models\ControlObesidad;
use App\Models\DeclaracionEno;
use App\Models\DetalleReceta;
use App\Imports\DiagnosticosDentalImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Diabete;
use App\Models\DiagnosticoCie;
use App\Models\DiagnosticosDental;
use App\Models\DiagnosticosDentalProfesional;
use App\Models\Direccion;
use App\Models\EndodonciaPaciente;
use App\Models\ExamenMedico;
use App\Models\ExamenPPF;
use App\Models\ExamenRadiologico;
use App\Models\ExamenesDentalPieza;
use App\Models\ficha_dentalAtencion;
use App\Models\FichaAtencionDental;
use App\Models\GastoMedico;
use App\Models\Hipertension;
use App\Models\HoraMedica;
use App\Models\InformeMedico;
use App\Models\IngresoPacienteCirugia;
use App\Models\Interconsulta;
use App\Models\Laboratorio;
use App\Models\LugarAtencion;
use App\Models\MaterialesInsumosPaciente;
use App\Models\MedicamentoUsoCronicoExterno;
use App\Models\MotivoConsultas;
use App\Models\OdontogramaPaciente;
use App\Models\OrdenTrabajoMayor;
use App\Models\OrdenTrabajoMenor;
use App\Models\Paciente;
use App\Models\PacienteExterno;
use App\Models\PedidoInsumos;
use App\Models\PedidoMateriales;
use App\Models\Prevision;
use App\Models\Profesional;
use App\Models\ProfesionalHorario;
use App\Models\ProtocoloOperatorioCirugia;
use App\Models\RecetaDosis;
use App\Models\RecetaPresentacion;
use App\Models\Region;
use App\Models\SolicitudPabellonQuirurgico;
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

                    if ($h == '1') {

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

                    if ($h == '1') {

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

                    if ($h == '1') {

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
            $user = Auth::user()->id;
            $profesional = Profesional::where('id_usuario', $user)->first();

            $odontograma =  new OdontogramaPaciente();
            $posicion_pieza = $request->posicion_pieza;
            $cuadrante = $request->cuadrante;

            $value = $posicion_pieza .'_'. $cuadrante;

            $caras = '';
            if ($request->{'caraM_check_' . $value} == '1') {
                $caras .= 'M' . $posicion_pieza . $cuadrante . '|';
            }
            if ($request->{'caraO_check_' . $value} == '1') {
                $caras .= 'O' . $posicion_pieza . $cuadrante . '|';
            }
            if ($request->{'caraD_check_' . $value} == '1') {
                $caras .= 'D' . $posicion_pieza . $cuadrante . '|';
            }
            if ($request->{'carav_check_' . $value} == '1') {
                $caras .= 'V' . $posicion_pieza . $cuadrante . '|';
            }
            if ($request->{'caraP_check_' . $value} == '1') {
                $caras .= 'P' . $posicion_pieza . $cuadrante;
            }

            $odontograma->diagnostico = $request->{'diagnostico_' . $value};
            $odontograma->tratamiento = $request->{'tratamiento_' . $value};
            $odontograma->caras = $caras;
            $odontograma->pieza = $request->{'pieza_odontograma_' . $value};
            $odontograma->id_paciente = $request->id_paciente;
            $odontograma->id_profesional = $profesional->id;

            if (!$odontograma->save()) {
                return back()->with('messagge', 'error');
            }
            $mensaje = 'Se ha agregado Odontograma a pieza '.$odontograma->pieza.' de forma exitosa';
            return redirect()->back()->with('mensaje', $mensaje);

            return 'ok';

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

    // Procesar únicamente las filas de la hoja 'ODONTO-GENERAL'
    foreach ($diagnosticos['ARANCELES PEDIATRIA'] as $row) {
        // Verificar que la fila tenga datos válidos en las columnas esperadas
        if (isset($row[0], $row[1]) && !is_null($row[0]) && !is_null($row[1])) {
            // Crear y guardar el diagnóstico
            $diagnostico = new DiagnosticosDental();
            $diagnostico->descripcion = trim($row[0]); // Elimina espacios innecesarios
            // $diagnostico->uco = $row[2];
            $diagnostico->valor = $row[1];
            $diagnostico->estado = 1;
            $diagnostico->tipo_examen = 3;
            $diagnostico->save();
        }
    }

    return redirect()->back()->with('mensaje', 'Datos importados correctamente');
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





    public function registrar_ficha_atencion_dental(Request $request)
    {
        try {
            return $request;
            $motivoConsulta = new MotivoConsultas;
            $motivoConsulta->id_profesional = $request->id_profesional_fc;
            $motivoConsulta->id_lugar_atencion = $request->id_lugar_atencion;
            $motivoConsulta->id_paciente = $request->id_paciente_fc;
            $motivoConsulta->id_especialidad = $request->id_especialidad;
            $motivoConsulta->motivo = $request->motivo;
            $motivoConsulta->antecedentes = $request->antecedentes;
            $motivoConsulta->examen_fisico = $request->examen_fisico;
            // if ($motivoConsulta->save()) {
            //     // return redirect()->back()->with('success', 'El motivo de consulta se ha guardado con éxito.');
            // } else {
            //     return redirect()->back()->with('error', 'Algo salió mal al guardar el motivo de consulta.');
            // }
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
            $mensaje = 'Se ha agregado Examenwes de forma exitosa';
        } else {
            $mensaje = 'Se ha agregado Examen de forma exitosa';
        }

        return redirect()->back()->with('mensaje', $mensaje);

    }

    public function dame_pieza(Request $request)
    {
       
        $pieza = ExamenesDentalPieza::where('numero_pieza', $request->pieza)->where('id_ficha_atencion',$request->id_ficha_atencion)->get();
        foreach ($pieza as $key => $value) {
            $value->fecha = Carbon::parse($value->created_at)->format('Y-m-d H:m:s');
            if($value->id_profesional == null){
                $value->profesional = 'No asignado';
            }else{
                $profesional = Profesional::where('id_usuario', $value->id_profesional)->first();
                $value->profesional = $profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos;
            }
            $value->diagnostico = OdontogramaPaciente::where('pieza', $value->numero_pieza)->where('id_ficha_atencion', $request->id_ficha_atencion)->first();
        }
        return $pieza;
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



        $user = Auth::user()->id;

        $profesional = Profesional::where('id_usuario', $user)->first();



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

        $trabajo_menor->id_paciente = $request->paciente_trabajo_menor;

        $trabajo_menor->id_profesional = $profesional->id;



        if (!$trabajo_menor->save()) {

            return 'error';

        }



        $mensaje = 'Se ha agregado Orden de trabajo menos de forma exitosa';



        return redirect()->back()->with('mensaje', $mensaje);

    }



    public function registrar_orden_trabajo_mayor(Request $request)

    {



        $user = Auth::user()->id;

        $profesional = Profesional::where('id_usuario', $user)->first();



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

        $trabajo_mayor->marca_implante = $request->marca_implante_trabajo_mayor;

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



        if (!$trabajo_mayor->save()) {

            return 'error';

        }



        $mensaje = 'Se ha agregado Orden de trabajo menos de forma exitosa';



        return redirect()->back()->with('mensaje', $mensaje);

    }



    public function registrar_pedido_insumos_materiales(Request $request)

    {



        $user = Auth::user()->id;

        $profesional = Profesional::where('id_usuario', $user)->first();



        switch ($request->tipo_insumo_material) {

            case 'insumo':

                $pedido  = new PedidoInsumos();

                $pedido->tipo_solicitud = $request->nro_orden_trabajo_menor;

                $pedido->cantidad = $request->clinica_doctor;

                $pedido->uso = $request->rut_profesional;

                $pedido->validacion = $request->guia;

                $pedido->nombre_insumo_material = $request->color;

                $pedido->urgencia = $request->urgencia;

                $pedido->material = $request->material;

                $pedido->trabajo_realizar = $request->trabajo_realizar;

                $pedido->comentarios = $request->comentarios_trabajo_menor;

                $pedido->id_paciente = $request->paciente_trabajo_menor;

                $pedido->id_profesional = $profesional->id;



                break;

            case 'material':

                $pedido  = new PedidoMateriales();

                $pedido->nro_orden = $request->nro_orden_trabajo_menor;

                $pedido->clinica_doctor = $request->clinica_doctor;

                $pedido->rut_profesional = $request->rut_profesional;

                $pedido->guia = $request->guia;

                $pedido->color = $request->color;

                $pedido->urgencia = $request->urgencia;

                $pedido->material = $request->material;

                $pedido->trabajo_realizar = $request->trabajo_realizar;

                $pedido->comentarios = $request->comentarios_trabajo_menor;

                $pedido->id_paciente = $request->paciente_trabajo_menor;

                $pedido->id_profesional = $profesional->id;



                break;

        }



        $pedido  = new PedidoInsumos();







        if (!$pedido->save()) {

            return 'error';

        }



        $mensaje = 'Se ha agregado Orden de trabajo menos de forma exitosa';



        return redirect()->back()->with('mensaje', $mensaje);

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



        $mensaje = 'Se ha agregado Orden de trabajo menos de forma exitosa';



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



        $mensaje = 'Se ha agregado Orden de trabajo menos de forma exitosa';



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



        $mensaje = 'Se ha agregado Orden de trabajo menos de forma exitosa';



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



        $mensaje = 'Se ha agregado Orden de trabajo menos de forma exitosa';



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



        $mensaje = 'Se ha agregado Orden de trabajo menos de forma exitosa';



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



        $mensaje = 'Se ha agregado Orden de trabajo menos de forma exitosa';



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

            $response[] = array("value" => $employee->id, "label" => $employee->descripcion,"descripcion" => $employee->descripcion, "control" => $employee->tipo_examen);

        }



        return response()->json($response);

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
                // buscar la direccion
                $direccion = Direccion::where('id', $paciente->id_direccion)->first();
                $paciente->direccion = $direccion;
                // buscar la ciudad
                $ciudad = Ciudad::where('id', $direccion->id_ciudad)->first();
                $paciente->ciudad = $ciudad;
                $id_paciente_externo = $this->agregar_paciente_externo($paciente->id);

                $paciente->id = $id_paciente_externo;
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

    
    public function periodontograma_prueba(){
        return view('pruebas.periodontograma');
    }

    public function guardarDiagnosticoLaboratorio(Request $request){
        try {
            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
            // preguntar si existe el diagnóstico para el profesional
            $existe = DiagnosticosDentalProfesional::where('id_diagnostico', $request->trabajo_id)->where('id_profesional', $profesional->id)->first();
            if ($existe) {
                $diagnostico = DiagnosticosDentalProfesional::find($existe->id);
            }else{
                $diagnostico = new DiagnosticosDentalProfesional();
            }
            $diagnostico->id_diagnostico = $request->trabajo_id;

            $diagnostico->id_profesional = $profesional->id;
            $diagnostico->laboratorio = $request->existe_laboratorio;

            if($diagnostico->save()){
                return ['status' => 1, 'mensaje' => 'Diagnóstico guardado correctamente'];
            }else{
                return ['status' => 0, 'mensaje' => 'Error al guardar diagnóstico'];
            }
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }

}
