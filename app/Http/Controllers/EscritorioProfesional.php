<?php

namespace App\Http\Controllers;

use App\Models\AntConfidenciales;
use App\Models\AntecedenteAlergiaPaciente;
use App\Models\AntecedenteEnferCronica;
use App\Models\AntecedenteMedicamentoCronico;
use App\Models\AntecedentesCirugias;
use App\Models\AntecedentesPaciente;
use App\Models\Asistente;
use App\Models\AsistenteLugarAtencion;
use App\Models\AtencionProfesion;
use App\Models\Bono;
use App\Models\Bancos;
use Carbon\Carbon;
use App\Models\CertificadoReposo;
use App\Models\Ciudad;
use App\Models\ContactoEmergencia;
use App\Models\ControlObesidad;
use App\Models\ControlNutricion;
use App\Models\CuracionesPlanasServicio;
use App\Models\CuracionesLppServicio;
use App\Models\DetalleReceta;
use App\Models\DiagnosticoCie;
use App\Models\DiagnosticosDental;
use App\Models\DiagnosticoPsicologico;
use App\Models\DiagnosticosDentalProfesional;
use App\Models\DietaNutricional;
use App\Imports\DiagnosticosPsicologicosImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Direccion;
use App\Models\Empresas;
use App\Models\EmpresasConvenios;
use App\Models\Especialidad;
use App\Models\EspecieMascota;
use App\Models\EvolucionPacienteHospital;
use App\Models\EvaluacionPeriodoncia;
use App\Models\EvolucionUrgencia;
use App\Models\ExamenBiopsia;
use App\Models\ExamenesBocaGeneral;
use App\Models\ExamenesDentalDolor;
use App\Models\ExamenesDentalPieza;
use App\Models\ExamenesDentalPeriodoncia;
use App\Models\ExamenesDentalPiezaHistoria;
use App\Models\ExamenesDentalOralRx;
use App\Models\ExamenPlanTratamiento;
use App\Models\ExamenPPF;
use App\Models\ExamenMedico;
use App\Models\ExamenSolicitudServicio;
use App\Models\FichaAtencion;
use App\Models\FichaCirugiaDigestivaTipo;
use App\Models\FichaCirugiaGeneral;
use App\Models\FichaCirugiaGeneralTipo;
use App\Models\FichaCirugiaDigestivaGeneralAdulto;
use App\Models\FichaCirugiaGeneralAdulto;
use App\Models\FichaDermo;
use App\Models\FichaNeuro;
use App\Models\FichaOftalmologiaAdulto;
use App\Models\FichaOftBiomicroscopia;
use App\Models\FichaOftBiomicroscopiaTipo;
use App\Models\FichaOftFondoOjo;
use App\Models\FichaOftFondoOjoTipo;
use App\Models\FichaOftTipo;
use App\Models\FichaOtorrino;
use App\Models\FichaOrl;
use App\Models\FichaOtorrinoTipo;
use App\Models\FichaPediatriaGeneral;
use App\Models\FichaTraumatologiaAdulto;
use App\Models\FichaUroTipo;
use App\Models\GrupoSanguineo;
use App\Models\Hipertension;
use App\Models\HoraMedica;
use App\Models\ImagenesDentalRxPaciente;
use App\Models\ImagenesDentalPaciente;
use App\Models\InformeMedico;
use App\Models\Interconsulta;
use App\Models\Instituciones;
use App\Models\InsumosTratamientosDental;
use App\Models\LugarAtencion;
use App\Models\LiquidacionRecibo;
use App\Models\Mascota;
use App\Models\LogUsersDevices;
use App\Models\MensajesProfesional;
use App\Models\MensajesDifusion;
use App\Models\Mensajes;
use App\Models\NotificacionConfirmacion;
use App\Models\MaterialesImplantologia;
use App\Models\OdontogramaPaciente;
use App\Models\OftalmoExamenNeurologico;
use App\Models\Paciente;
use App\Models\PacienteContactoEmergencia;
use App\Models\PagosPresupuestoDental;
use App\Models\PermisoProfesional;
use App\Models\PiezasDentalCoronaProtesis;
use App\Models\PlanTratamientoOtrosProfesionales;
use App\Models\Prevision;
use App\Models\Profesional;
use App\Models\ProfesionalTons;
use App\Models\PresupuestosDental;
use App\Mail\PresupuestoInsumosMail;
use App\Models\ProcedimientosImplantes;
use App\Models\ProcedimientosImplantesRehab;
use App\Models\ProcedimientosPostImplantes;
use App\Models\ProcedimientosGruposPostImplantes;
use App\Models\ProcedimientosPeriodoncia;
use App\Models\ProfesionalAntecedenteAcademico;
use App\Models\ProfesionalAsistente;
use App\Models\ProfesionalConvenio;
use App\Models\ProfesionalDiagnosticoCie;
use App\Models\ProfesionalesLugaresAtencion;
use App\Models\ProfesionalHorario;
use App\Models\ProfesionalMiEquipo;
use App\Models\RecetaAudifono;
use App\Models\ProfesionalProvisorio;
use App\Models\ProfesionalServicioClinico;
use App\Models\RecetaControl;
use App\Models\Region;
use App\Models\RegistroConfirmacionHoraAgenda;
use App\Models\ServiciosInternos;
use App\Models\ServiciosInternosSalas;
use App\Models\SolicitudPabellonQuirurgico;
use App\Models\SolicitudHospitalizacion;
use App\Models\TipoAntecedenteAcademico;
use App\Models\TipoEspecialidad;
use App\Models\TipoProductoConvenios;
use App\Models\TratamientosImplantologia;
use App\Models\TratamientosDental;
use App\Models\SubTipoEspecialidad;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

use App\Mail\ExamenesPorRealizar;

use PDF;
use App\Helpers\Funciones;
use App\Models\AcompananteDependiente;
use App\Models\BoxesCm;
use App\Models\FichaPediatriaGeneralTipo;
use App\Models\Invitacion;
use App\Models\Licencia;
use App\Models\LugarAtencionBoxProfesional;
use App\Models\PacienteHistoricoDatosMedicos;
use App\Models\PacientesDependientes;
use App\Models\Personas;
use App\Models\ProcedimientosCentro;
use App\Models\ProcedimientosCentroLugarAtencionProfesional;
use App\Models\ProfesionalHorariosBloqueo;
use App\Models\SucursalHorario;
use App\Models\TipoBono;
use App\Models\TiposReceta;
use DateTime;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;


class EscritorioProfesional extends Controller
{

    public function eliminar_horario_agenda(Request $request)
    {
        
        // $profesional = Profesional::where('id_usuario', Auth::user()->id);
        $horario = ProfesionalHorario::where('id', $request->id_horario)->first();
        if(!$horario){
            $horario = SucursalHorario::where('id', $request->id_horario)->first();
        }
        if ($horario->delete()) {

            return json_encode(['success' => true]);
        } else {
            return json_encode(['success' => false]);
        }
        // dd($horario);
    }

    public function ver_ficha_atencion(Request $request)
    {

        $ficha = FichaAtencion::where('id', $request->id_ficha)->first();
        return json_encode($ficha);
    }

    public function examenes_frecuentes()
    {
        // $profesional = Profesional::find(Auth::user()->id_profesional);
        // $diagnosticos = $profesional->diagnosticos_frecuentes;
        return view('app.profesional.configuracion.examenes_frecuentes');
    }

    public function editar_datos_personales_perfil(Request $request)
    {

        $user = Auth::user();
        $profesional = Profesional::where('id_usuario', $user->id)->first();

        $profesional->nombre = $request->nombre;
        $profesional->apellido_uno = $request->apellido_uno;
        $profesional->apellido_dos = $request->apellido_dos;
        $profesional->sexo = $request->sexo;
        $profesional->id_especialidad = $request->id_especialidad;
        $profesional->id_tipo_especialidad = $request->id_tipo_especialidad;
        $profesional->id_sub_tipo_especialidad = $request->id_sub_tipo_especialidad;
        $profesional->id_tipo_atencion = $request->id_tipo_atencion;
        $profesional->num_colegio = $request->num_colegio;
        $profesional->save();

        if (!$profesional->save()) {

            return response()->json(['success' => false, 'message' => 'Error al editar el profesional.']);
        } else {
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Profesional Editado correctamente.',
                    'profesional' => $profesional
                ]
            );
        }
    }

    public function editar_datos_contacto_perfil(Request $request)
    {

        $user = Auth::user();
        $profesional = Profesional::where('id_usuario', $user->id)->first();

        $profesional->email = $request->email;
        $profesional->telefono_uno = $request->telefono_uno;

        $profesional->save();
        $user->email = $request->email;

        $user->save();

        if (!$profesional->save()) {

            return response()->json(['success' => false, 'message' => 'Error al editar el profesional.']);
        } else {
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Profesional Editado correctamente.',
                    'profesional' => $profesional
                ]
            );
        }
    }

    public function editar_datos_residencia_perfil(Request $request)
    {

        $user = Auth::user();
        $profesional = Profesional::where('id_usuario', $user->id)->first();
        $direccion = Direccion::where('id', $profesional->id_direccion)->first();

        if($direccion)
        {
            // $direccion->region = $request->region;
            $direccion->id_ciudad = $request->ciudad;
            $direccion->direccion = $request->direccion;
            $direccion->numero_dir = $request->numero_dir;
            if($direccion->save())
            {
                return response()->json(
                    [
                        'success' => true,
                        'message' => 'Profesional Editado correctamente.',
                        'profesional' => $profesional
                    ]
                );
            }
            else
            {
                return response()->json(
                    [
                        'success' => false,
                        'message' => 'proble a al actualziar direcion del Profesional.',
                        'profesional' => $profesional
                    ]
                );
            }
        }
        else
        {
            $direccion = new Direccion();
            // $direccion->region = $request->region;
            $direccion->id_ciudad = $request->ciudad;
            $direccion->direccion = $request->direccion;
            $direccion->numero_dir = $request->numero_dir;
            if($direccion->save())
            {
                return response()->json(
                    [
                        'success' => true,
                        'message' => 'Profesional Editado correctamente.',
                        'profesional' => $profesional
                    ]
                );
            }
            else
            {
                return response()->json(
                    [
                        'success' => false,
                        'message' => 'problema a al actualziar direcion del Profesional.',
                        'profesional' => $profesional
                    ]
                );
            }
        }
    }

     public function guardar_diagnostico_periodoncia(Request $req){
        try {
            // Obtener el profesional actual
            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

            // Validar que existan todos los campos requeridos
            $req->validate([
                'pieza' => 'required',
                'id_ficha_atencion' => 'required|exists:fichas_atenciones,id',
                'id_paciente' => 'required|exists:pacientes,id',
                'id_lugar_atencion' => 'required'
            ]);

            // Verificar si ya existe una evaluación para esta pieza en esta ficha
            $evaluacion_existente = EvaluacionPeriodoncia::where([
                'pieza' => $req->pieza,
                'id_ficha_atencion' => $req->id_ficha_atencion
            ])->first();

            if ($evaluacion_existente) {
                return response()->json([
                    'mensaje' => 'ERROR',
                    'error' => 'Ya existe una evaluación para la pieza ' . $req->pieza . ' en esta ficha de atención'
                ], 400);
            }

            // Crear nueva evaluación de periodoncia
            $evaluacion = new EvaluacionPeriodoncia();
            $evaluacion->pieza = $req->pieza;
            $evaluacion->antecedentes_molestias = $req->antecedentes_molestias;
            $evaluacion->evaluacion_clinica = $req->evaluacion_clinica;
            $evaluacion->estudio_rx = $req->estudio_rx;
            $evaluacion->diagnostico = $req->diagnostico;
            $evaluacion->lesion_sistemica = $req->lesion_sistemica;
            $evaluacion->dg_period = $req->dg_period;
            $evaluacion->observaciones = $req->observaciones;
            $evaluacion->id_ficha_atencion = $req->id_ficha_atencion;
            $evaluacion->id_paciente = $req->id_paciente;
            $evaluacion->id_lugar_atencion = $req->id_lugar_atencion;
            $evaluacion->id_profesional = $profesional->id;

            if ($evaluacion->save()) {
                // Obtener todas las evaluaciones de esta ficha para retornar la vista actualizada
                $evaluaciones = EvaluacionPeriodoncia::where('id_ficha_atencion', $req->id_ficha_atencion)
                    ->orderBy('pieza')
                    ->get();

                // Generar la vista actualizada
                $vista_evaluaciones = view('atencion_odontologica.secciones_especialidad.evaluaciones_periodoncia_lista', [
                    'evaluaciones' => $evaluaciones
                ])->render();

                return response()->json([
                    'mensaje' => 'OK',
                    'data' => $evaluacion,
                    'v' => $vista_evaluaciones,
                    'evaluaciones' => $evaluaciones,
                    'total_evaluaciones' => $evaluaciones->count()
                ]);
            } else {
                return response()->json([
                    'mensaje' => 'ERROR',
                    'error' => 'No se pudo guardar la evaluación de periodoncia'
                ], 500);
            }

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'mensaje' => 'ERROR',
                'error' => 'Datos de validación incorrectos',
                'detalles' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'mensaje' => 'ERROR',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function editar_evaluacion_periodonto(Request $req){
        try {
            $evaluacion = EvaluacionPeriodoncia::find($req->id);

            if (!$evaluacion) {
                return response()->json([
                    'mensaje' => 'ERROR',
                    'error' => 'Evaluación no encontrada'
                ], 404);
            }

            // Actualizar los campos
            $evaluacion->pieza = $req->pieza;
            $evaluacion->antecedentes_molestias = $req->antecedentes_molestias;
            $evaluacion->evaluacion_clinica = $req->evaluacion_clinica;
            $evaluacion->estudio_rx = $req->estudio_rx;
            $evaluacion->diagnostico = $req->diagnostico;
            $evaluacion->lesion_sistemica = $req->lesion_sistemica;
            $evaluacion->dg_period = $req->dg_period;
            $evaluacion->observaciones = $req->observaciones;

            if ($evaluacion->save()) {
                // Obtener todas las evaluaciones actualizadas
                $evaluaciones = EvaluacionPeriodoncia::where('id_ficha_atencion', $evaluacion->id_ficha_atencion)
                    ->orderBy('pieza')
                    ->get();

                $vista_evaluaciones = view('atencion_odontologica.secciones_especialidad.evaluaciones_periodoncia_lista', [
                    'evaluaciones' => $evaluaciones
                ])->render();

                return response()->json([
                    'mensaje' => 'OK',
                    'data' => $evaluacion,
                    'v' => $vista_evaluaciones
                ]);
            } else {
                return response()->json([
                    'mensaje' => 'ERROR',
                    'error' => 'No se pudo actualizar la evaluación'
                ], 500);
            }

        } catch (\Exception $e) {
            return response()->json([
                'mensaje' => 'ERROR',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function eliminar_evaluacion_periodonto(Request $req){
        try {
            $evaluacion = EvaluacionPeriodoncia::find($req->id);

            if (!$evaluacion) {
                return response()->json([
                    'mensaje' => 'ERROR',
                    'error' => 'Evaluación no encontrada'
                ], 404);
            }

            $id_ficha_atencion = $evaluacion->id_ficha_atencion;

            if ($evaluacion->delete()) {
                // Obtener todas las evaluaciones restantes
                $evaluaciones = EvaluacionPeriodoncia::where('id_ficha_atencion', $id_ficha_atencion)
                    ->orderBy('pieza')
                    ->get();

                $vista_evaluaciones = view('atencion_odontologica.secciones_especialidad.evaluaciones_periodoncia_lista', [
                    'evaluaciones' => $evaluaciones
                ])->render();

                return response()->json([
                    'mensaje' => 'OK',
                    'v' => $vista_evaluaciones,
                    'evaluaciones' => $evaluaciones,
                    'total_evaluaciones' => $evaluaciones->count()
                ]);
            } else {
                return response()->json([
                    'mensaje' => 'ERROR',
                    'error' => 'No se pudo eliminar la evaluación'
                ], 500);
            }

        } catch (\Exception $e) {
            return response()->json([
                'mensaje' => 'ERROR',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function obtener_evaluaciones_periodonto(Request $req) {
        try {
            $evaluaciones = EvaluacionPeriodoncia::where('id_ficha_atencion', $req->id_ficha_atencion)
                ->orderBy('pieza')
                ->get();

            $vista_evaluaciones = view('atencion_odontologica.secciones_especialidad.evaluaciones_periodoncia_lista', [
                'evaluaciones' => $evaluaciones
            ])->render();

            return response()->json([
                'mensaje' => 'OK',
                'v' => $vista_evaluaciones,
                'total_evaluaciones' => $evaluaciones->count(),
                'evaluaciones' => $evaluaciones
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'mensaje' => 'ERROR',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function obtener_tto_periodonto(Request $req){
        try {
           
            $evaluaciones = ProcedimientosPeriodoncia::select('procedimientos_periodoncia.*','op.tratamiento','op.id as id_odontograma')
                ->where('procedimientos_periodoncia.id_ficha_atencion', $req->id_ficha_atencion)
                ->leftjoin('odontogramas_pacientes as op', 'op.id', 'procedimientos_periodoncia.id_procedimiento')
                ->orderBy('pieza')
                ->get();
           
            $vista_evaluaciones = view('atencion_odontologica.include.procedimientos_periodoncia_todos', [
                'examenes' => $evaluaciones
            ])->render();

            return response()->json([
                'mensaje' => 'OK',
                'v' => $vista_evaluaciones,
                'total_evaluaciones' => $evaluaciones->count(),
                'evaluaciones' => $evaluaciones
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'mensaje' => 'ERROR',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function agregar_medicamento_cronico_paciente(Request $request)
    {
        $paciente = Paciente::find($request->paciente);
        $antecedente = AntecedentesPaciente::where('id', $paciente->id_antecedente)->first();

        $medicamento_cronico = new AntecedenteMedicamentoCronico();
        $medicamento_cronico->id_antecedentes = $antecedente->id;
        $medicamento_cronico->id_medicamento = $request->id_medicamento_cronico;
        $medicamento_cronico->nombre_medicamento_cronico = $request->medicamento_cronico;
        $medicamento_cronico->id_dosis = $request->id_dosis;
        $medicamento_cronico->dosis = $request->dosis;

        if ($medicamento_cronico->save())
        {

            $medicamentos_cronicos = AntecedenteMedicamentoCronico::where('id_antecedentes', $antecedente->id)->get();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Medicamento agregado correctamente.',
                    'medicamentos_cronicos' => $medicamentos_cronicos
                ]
            );
        } else {
            return response()->json(['success' => false, 'message' => 'Error al agregar el medicamento crónica.']);
        }
    }

    public function eliminar_medicamento_cronico_paciente(Request $request)
    {
        $paciente = Paciente::find($request->paciente);
        $antecedente = AntecedentesPaciente::where('id', $paciente->id_antecedente)->first();
        $antecedenteMedCronico = AntecedenteMedicamentoCronico::where('id',$request->id)->first()->delete();

        $med_cronico = AntecedenteMedicamentoCronico::where('id_antecedentes', $antecedente->id)->get();

        return response()->json(
            [
                'success' => true,
                'message' => 'Medicamento eliminada correctamente.',
                'medicamento' => $med_cronico,
                'result' => $antecedenteMedCronico
            ]
        );
    }

    public function agregar_cirugias_paciente(Request $request)
    {
        $paciente = Paciente::find($request->paciente);
        $antecedente = AntecedentesPaciente::where('id', $paciente->id_antecedente)->first();

        $antCirugia = new AntecedentesCirugias();
        $antCirugia->nombre = $request->nombre;
        $antCirugia->fecha_cirugia = $request->fecha_cirugia;
        $antCirugia->comentarios = $request->comentarios;
        $antCirugia->id_antecedentes = $antecedente->id;

        if ($antCirugia->save())
        {

            $antCirugias = AntecedentesCirugias::where('id_antecedentes', $antecedente->id)->get();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Cirugia agregada correctamente.',
                    'cirugias' => $antCirugias
                ]
            );
        } else {
            return response()->json(['success' => false, 'message' => 'Error al agregar el medicamento crónica.']);
        }
    }

    public function eliminar_cirugias_paciente(Request $request)
    {
        $paciente = Paciente::find($request->paciente);
        $antecedente = AntecedentesPaciente::where('id', $paciente->id_antecedente)->first();
        $antCirugia = AntecedentesCirugias::where('id',$request->id)->first()->delete();

        $antCirugias = AntecedentesCirugias::where('id_antecedentes', $antecedente->id)->get();

        return response()->json(
            [
                'success' => true,
                'message' => 'Cirugia eliminada correctamente.',
                'cirugias' => $antCirugias,
                'result' => $antCirugia
            ]
        );
    }

    public function agregar_patologia_cronica_paciente(Request $request)
    {
        $paciente = Paciente::find($request->paciente);
        $antecedente = AntecedentesPaciente::where('id', $paciente->id_antecedente)->first();

        $patologia_cronica = new AntecedenteEnferCronica();
        $patologia_cronica->id_antecedentes = $antecedente->id;
        $patologia_cronica->id_enfermedad_cronica = $request->id_patologia_cronica;
        $patologia_cronica->nombre_patologia_cronica = $request->patologia_cronica;

        if ($patologia_cronica->save()) {

            $patologias_cronicas = AntecedenteEnferCronica::where('id_antecedentes', $antecedente->id)->get();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Alergia agregada correctamente.',
                    'patologias_cronicas' => $patologias_cronicas
                ]
            );
        } else {
            return response()->json(['success' => false, 'message' => 'Error al agregar la patologia crónica.']);
        }
    }

    public function eliminarPatologiaCronicaPaciente(Request $request)
    {
        $paciente = Paciente::find($request->paciente);
        $antecedente = AntecedentesPaciente::where('id', $paciente->id_antecedente)->first();
        $antecedentesEnferCronicas = AntecedenteEnferCronica::where('id',$request->id)->first()->delete();

        $cronicas = AntecedenteEnferCronica::where('id_antecedentes', $antecedente->id)->get();

        return response()->json(
            [
                'success' => true,
                'message' => 'Alergia eliminada correctamente.',
                'cronicas' => $cronicas,
                'result' => $antecedentesEnferCronicas
            ]
        );
    }

    public function agregar_alergia_paciente(Request $request)
    {
        $paciente = Paciente::find($request->paciente);
        $antecedente = AntecedentesPaciente::where('id', $paciente->id_antecedente)->first();

        $alergiaPaciente = new AntecedenteAlergiaPaciente();
        $alergiaPaciente->id_antecedentes = $antecedente->id;
        $alergiaPaciente->nombre_alergia = $request->alergia;
        $alergiaPaciente->id_alergia = $request->id_alergia;
        $alergiaPaciente->comentario = $request->comentario;



        if ($alergiaPaciente->save()) {

            $alergias = AntecedenteAlergiaPaciente::where('id_antecedentes', $antecedente->id)->get();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Alergia agregada correctamente.',
                    'alergias' => $alergias
                ]
            );
        } else {
            return response()->json(['success' => false, 'message' => 'Error al agregar la alergia.']);
        }
        // $paciente->alergias()->attach($request->alergia_id);
        return response()->json(['success' => 'Alergia agregada correctamente.']);
    }

    public function eliminarAlergiaPaciente(Request $request)
    {
        $paciente = Paciente::find($request->paciente);
        $antecedente = AntecedentesPaciente::where('id', $paciente->id_antecedente)->first();
        $antecedente_alergia_paciente = AntecedenteAlergiaPaciente::where('id',$request->id_alergia_paciente)->first()->delete();

        $alergias = AntecedenteAlergiaPaciente::where('id_antecedentes', $antecedente->id)->get();

        return response()->json(
            [
                'success' => true,
                'message' => 'Alergia eliminada correctamente.',
                'alergias' => $alergias
            ]
        );
    }

    public function solicitar_codigo_fmu(Request $request)
    {
        $paciente = Paciente::find($request->id_paciente);
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

        $paciente->fecha_autorizacion = Carbon::now();
        $paciente->codigo_autorizacion = mt_Rand(1, 10000000);

        if ($paciente->save()) {

            $details = [
                'title' => 'Código autorización FMU',
                'body' => 'Estimado/a ' . $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos . ',<br/>
                        Junto con saludar, por medio de este correo le informamos que el profesional Dr. ' .
                    $profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos .
                    ' <br/> ha solicitado acceder a su Ficha Medica Unica (FMU), favor entregar siguiente codigo al profesional:  <br/>' .
                    $paciente->codigo_autorizacion . ' <br/>' .
                    '<br/> Que tenga un excelente día. <br/><br/> \n' .
                    ' Saludos.',
            ];
            //dd($details);

            Mail::to('jkriman@gmail.com')->send(new \App\Mail\RegistroPacienteMail($details));
            //Mail::to($paciente->email)->send(new \App\Mail\RegistroPacienteMail($details));

            return 'success';
        } else {
            return 'error';
        }
    }

    public function lugares_atencion_profesional_agenda()
    {
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        // $lugares_atencion_profesional = ProfesionalesLugaresAtencion::where('id_profesional', $profesional->id)->where('estado', 1)->get();
        // dd($lugares_atencion_profesional);

        $lugares_atencion_profesional = $profesional->LugaresAtencion()->get();

        // dd($lugares_atencion_profesional);
        //$lugares_atencion_profesional = null;
        //dd($lugares_atencion_profesional);
        //$lugares_atencion_profesional = '';
        // dd($lugares_atencion_profesional);


        if (count($lugares_atencion_profesional) == 0) {
            return 'fail';
        }

        return json_encode($lugares_atencion_profesional);
    }

    public function ver_receta_pdf($id)
    {
        $detalleReceta = DetalleReceta::where('id_ficha', $id)->get();


        // return PdfController::generarPDF('RECETA MEDICA');
        // return $detalleReceta;

        $pdf = PDF::loadView('atencion_medica.PDF.pdf_prueba', compact($detalleReceta));

        return $pdf->download('ejemplo.pdf');

        // return 'hola';
    }

    public function index()
    {

        $usuario = User::where('id', Auth::user()->id)->first();
        $roles = $usuario->roles()->orderBy('id', 'DESC')->get();

        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

        $region = Region::all();
        $especialidad = Especialidad::all();

        if (isset($profesional)) {
            $tipo_agendas = ProfesionalHorario::select('tipo_agenda')->where('id_profesional', $profesional->id)->groupBy('tipo_agenda')->pluck('tipo_agenda')->toArray();
            $horas_dia = HoraMedica::where('id_profesional', $profesional->id)->where('tipo_hora_medica','!=','B')->whereDate('fecha_consulta', \Carbon\Carbon::now()->format('Y-m-d'))->get();
            foreach ($horas_dia as $h) {
                $h->paciente = Paciente::where('id', $h->id_paciente)->first();
                $h->lugar_atencion = LugarAtencion::where('id', $h->id_lugar_atencion)->first();
            }

            $lugar_atencion_prof = ProfesionalesLugaresAtencion::where('id_profesional', $profesional->id)->count();

            $mensajes = $this->dame_mensajes($profesional->id);

            //if($profesional->bienvenida == 0)
            if( $lugar_atencion_prof == 0 )
            {
                return view('bienvenida.inicio_profesionales')->with([
                    'region' => $region,
                    'profesional' => $profesional,
                ]);
            }
            else
            {
                // preguntamos si esta asociada a algun servicio de hospital

				// $direccion_escritorio = 'app.profesional.escritorio_profesional_laboratorio_clinico';
                $direccion_escritorio = 'app.profesional.escritorio_profesional';
                if($profesional->id_especialidad == 4 && $profesional->id_tipo_especialidad == 55)
                {
                    /** profesional de laboratorio */
                    $direccion_escritorio = 'app.laboratorio.lab_profesional.escritorio_profesional_laboratorio_orl';
                }
                else if($profesional->id_especialidad == 11 && $profesional->id_tipo_especialidad == 59)
                {
                    /** tecnico rayos */
                    $direccion_escritorio = 'app.laboratorio.lab_profesional.escritorio_profesional_laboratorio_rayos';
                }
                else
                {
                    /** otros */
                    // $direccion_escritorio = 'app.profesional.escritorio_profesional_laboratorio_clinico';
                    $direccion_escritorio = 'app.profesional.escritorio_profesional';
                }

                $lugar_atencion = ProfesionalesLugaresAtencion::where('id_profesional', $profesional->id)->first();
                $institucion = Instituciones::where('id_lugar_atencion',$lugar_atencion->id_lugar_atencion)->first();

                // buscamos si el profesional es director medico
                $director_medico = false;
                if($institucion){
                    if($institucion->id_director_medico == $profesional->id_usuario){
                        $director_medico = true;
                    }
                }

                $agenda_examen = ProfesionalHorario::where('id_profesional', $profesional->id)
                                ->where('tipo_agenda', 4)
                                ->exists();

                $permisos_profesional = PermisoProfesional::where('id_profesional', $profesional->id)->first();
           
                return view($direccion_escritorio)->with([
                    'region' => $region,
                    'profesional' => $profesional,
                    'director_medico' => $director_medico,
                    'hora_dia' => $horas_dia,
                    'tipo_agendas' => $tipo_agendas,
                    'mensajes' => $mensajes,
                     'agenda_examen' => $agenda_examen,
                        'permisos_profesional' => $permisos_profesional,
                    'fecha_carga' => \Carbon\Carbon::now()->format('Y-m-d'),
                ]);
            }
        }


        $filtro = array();
        $filtro[] = array('id_user_invitado', Auth::user()->id);
        $filtro[] = array('procesado', 1);
        // $filtro[] = array('estado', 2);
        $invitacion = Invitacion::where($filtro)->whereNotNull('fecha_aprobacion')->first();
        $tipo_especialidad = '';
        $sub_tipo_especialidad = '';
        if($invitacion)
        {
            $tipo_especialidad = TipoEspecialidad::where('id_especialidad', $invitacion->id_especialidad)->get();
            $sub_tipo_especialidad = SubTipoEspecialidad::where('id_tipo_especialidad', $invitacion->id_tipo_especialidad)->get();
        }

        return view('auth.Registros.registro_profesional')->with([
            'region' => $region,
            'especialidad' => $especialidad,
            'tipo_especialidad' => $tipo_especialidad,
            'sub_tipo_especialidad' => $sub_tipo_especialidad,
            'invitacion' => $invitacion,
        ]);
    }

    public function dame_mensajes($id){
        $mensajes_directos = Mensajes::where('id_receptor', $id)->get();

        foreach($mensajes_directos as $m)
        {
            $datos_mensaje = json_decode($m->datos_mensaje,true);
            $m->datos_mensaje = $datos_mensaje;
            $emisor = User::where('id', $m->id_usuario)->first();

        }

        return $mensajes_directos;
    }

    public function mantencion_equipo(){
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $filtro[] = array('id_profesional', $profesional->id);
        // $filtro[] = array('estado', 1);

        $registros = ProfesionalMiEquipo::where($filtro)
                                        // ->with(['ProfesionalMiEquipoProfesionales' => function($query){
                                        //     $query->select();
                                        // }])
                                        ->get();
        return view('app.profesional.equipo',['equipos' => $registros,'profesional' => $profesional]);
    }

    public function validar_rut(Request $request)
    {
        $email = User::where('email', $request->email)->first();

        if (isset($email) || $email != '') {
            return 'fail';
        }

        return 'ok';
    }

    public function validar_email_paciente(Request $request)
    {
        $email = Paciente::where('email', $request->email)->first();

        if (isset($email) || $email != '') {
            return 'fail';
        }

        return 'ok';
    }

    public function registro()
    {
        return view('auth.Registros.registro_profesional');
    }

    public function ficha_medica_unica_auth(Request $request)
    {
        // dd($request);
        $paciente = Paciente::where('id', $request->id_paciente_fmu)->first();

        if ($paciente->codigo_autorizacion == $request->paciente_codigo) {
            return view('app.paciente.ficha_medica', ['paciente' => $paciente]);
            // return json_encode($paciente->id);
        }

        return redirect()->back()->with('mensaje_codigo', $paciente->id);
    }



    public function miFichaMedicaAtencion(Request $request)
    {
        $paciente = Paciente::where('id', $request->id)->first();

        return view('app.paciente.ficha_medica', ['paciente' => $paciente]);
    }

    public function diagnosticos_frecuentes()
    {
        return view('app.profesional.diagnosticos_frecuentes_configuracion');
    }

    public function ver_flujo_caja()
    {

        $rendicion_caja = array();
        return view('app.profesional.flujo_caja_profesional')->with([
            'rendicion' => $rendicion_caja
        ]);
    }

    public function diagnosticos_cie10()
    {
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        // $df_cies = DB::table('diagnosticos_cies')->paginate(25);
        $diagnoticos_profesional = ProfesionalDiagnosticoCie::where('id_profesional', $profesional->id)->get();

        // return view('app.profesional.diagnosticos_cie10_configuracion')->with(['diagnostico' => $df_cies, 'diagnoticos_profesional' => $diagnoticos_profesional]);
        return view('app.profesional.diagnosticos_cie10_configuracion')->with(['diagnoticos_profesional' => $diagnoticos_profesional]);
    }

    public function buscarDiagnostico_cie10(Request $request)
    {
        $datos = array();
        $registros = DiagnosticoCie::where('descripcion', 'like', ''.$request->descripcion.'%')->get();

        $datos['count'] = $registros->count();
        if($registros->count())
        {
            foreach ($registros as $key => $value) {
                $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
                $filtro = array();
                $filtro[] = array('id_diagnostico_cie',$value->id);
                $filtro[] = array('id_profesional', $profesional->id);
                $diagnoticos_profesional = ProfesionalDiagnosticoCie::where($filtro)->first();
                if( $diagnoticos_profesional )
                {
                    $registros[$key]['activo'] = 1;
                }
                else
                {
                    $registros[$key]['activo'] = 0;
                }
            }
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

    public function registrarDiagnosticoCie10Profesional(Request $request)
    {
        $datos = array();

        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $lista_diagnosticos = $request->lista_diagnostico;
        if(count($lista_diagnosticos) > 0)
        {
            foreach ($lista_diagnosticos as $key => $value)
            {
                $id_diagnostico = $value[0];
                $estado_diagnostico = $value[1];
                /** buscar registro esxistene */
                $filtro = array();
                $filtro[] = array('id_diagnostico_cie',$id_diagnostico);
                $filtro[] = array('id_profesional',Auth::user()->id);
                $registro = ProfesionalDiagnosticoCie::where($filtro)->first();

                if($registro)
                {
                    $datos['diagnostico_encontrado'][] = $registro;
                    /** encontrado */
                    /** inactivo */
                    if($estado_diagnostico == 'false')
                    {
                        if($registro->delete()){
                            /** eliminado  */
                            $datos['diagnostico'][$key]['estado'] = 1;
                            $datos['diagnostico'][$key]['msj'] = 'desactivacion exitosa';
                            $datos['diagnostico'][$key]['datos'] = $value;
                        }
                        else
                        {
                            /** falla al eliminar */
                            $datos['diagnostico'][$key]['estado'] = 0;
                            $datos['diagnostico'][$key]['msj'] = 'problemas al desactivacion';
                            $datos['diagnostico'][$key]['datos'] = $value;
                        }
                    }
                }
                else
                {
                    /** no encotrnado */
                    /** activo */
                    if($estado_diagnostico== 'true')
                    {
                        $nuevo_registro = new ProfesionalDiagnosticoCie();
                        $nuevo_registro->id_profesional = Auth::user()->id;
                        $nuevo_registro->id_diagnostico_cie = $id_diagnostico;
                        if($nuevo_registro->save()){
                            /** registro con exito */
                            $datos['diagnostico'][$key]['estado'] = 1;
                            $datos['diagnostico'][$key]['msj'] = 'registro exitoso';
                            $datos['diagnostico'][$key]['datos'] = $value;
                        }
                        else
                        {
                            /** falla en el registro */
                            $datos['diagnostico'][$key]['estado'] = 0;
                            $datos['diagnostico'][$key]['msj'] = 'registro con error al registrar';
                            $datos['diagnostico'][$key]['datos'] = $value;
                        }
                    }
                }

            }

            $datos['estado'] = 1;
            $datos['msj'] = 'registros actualizados';
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'debe ingresar lista de diagnostico cie 10';
        }
        return $datos;

    }


    public function buscar_contacto(Request $request)
    {
        $contacto = ContactoEmergencia::where('rut', $request->rut_contacto)->get();

        foreach ($contacto as $con) {
            $contacto_paciente = PacienteContactoEmergencia::where('id_contacto', $con->id)->where('id_paciente', $request->id_paciente_contacto)->first();
            if ($contacto_paciente != '') {
                return 'existe';
            }
        }

        $contacto = ContactoEmergencia::where('rut', $request->rut_contacto)->first();

        // $contacto_paciente = PacienteContactoEmergencia::where('id_contacto', $contacto->id)->where('id_paciente', $request->id_paciente_contacto)->first();

        //$contacto = $resultado->Direccion()->first()->Ciudad()->first()->Region()->first()->nombre;
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

    public function mis_estadisticas()
    {
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

        $now = Carbon::now();
        $last = Carbon::now()->add(-30, 'day');
        $total_pacientes = FichaAtencion::where('id_profesional', $profesional->id)->distinct()->count('id_paciente');
        $treinta_dias = FichaAtencion::where('id_profesional', $profesional->id)->whereBetween('created_at', [$last, $now])->distinct()->count('id_paciente');

        return view('app.profesional.estadisticas_profesional')->with(['total_pacientes' => $total_pacientes, 'treinta_dias' => $treinta_dias]);
    }

    public function mis_pacientes()
    {
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $ficha_atencion = FichaAtencion::where('id_profesional', $profesional->id)->distinct()->get(['id_paciente']);
        $prevision = Prevision::all();
        $region = Region::all();
        $paciente = [];
        // foreach ($ficha_atencion as $f) {
        //     $paciente_temp = Paciente::find($f->id_paciente);
		// 	if($paciente_temp){
        //         $ficha_atencion_paciente = FichaAtencion::where('id_profesional', $profesional->id)
        //         ->where('id_paciente', $f->Paciente()->first()->id)
        //         ->distinct()
        //         ->get(['id_lugar_atencion']);

        //         $lugares_atenm = LugarAtencion::whereIn('id', $ficha_atencion_paciente)->pluck('nombre')->toArray();

        //         $paciente_temp->lugares_atencion = $lugares_atenm;

        //         array_push($paciente, $paciente_temp);
        //     }
        // }

        // echo json_encode($paciente);
        // exit();


        return view('app.profesional.pacientes_profesional')->with(
            [
                'ficha_atencion' => $ficha_atencion,
                'prevision' => $prevision,
                'paciente' => $paciente,
                'profesional' => $profesional,
                'region' => $region
            ]
        );
    }

    public function buscar_evaluaciones_especialidad(Request $req){
        try {
            $id_ficha_atencion = $req->id_ficha_atencion;
            $ficha = FichaAtencion::find($id_ficha_atencion);
            $paciente = Paciente::find($ficha->id_paciente);
            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

            if($profesional->id_sub_tipo_especialidad == 19){
                $evaluaciones = FichaDermo::where('id_ficha_atencion', $id_ficha_atencion)->first();
            }else if($profesional->id_sub_tipo_especialidad == 20){
                $evaluaciones = FichaOftalmologiaAdulto::where('id_ficha_atencion', $id_ficha_atencion)->first();
                $evaluaciones_biomicroscopia = FichaOftBiomicroscopia::where('id_ficha_atencion', $id_ficha_atencion)->first();
                $evaluaciones_fondo_ojo = FichaOftFondoOjo::where('id_ficha_atencion', $id_ficha_atencion)->first();
                $evaluaciones_neurologia = OftalmoExamenNeurologico::where('id_ficha_atencion', $id_ficha_atencion)->first();
                // Asegúrate de que ambos sean colecciones
                $evaluaciones = collect($evaluaciones); // convierte el modelo en colección
                $evaluaciones_biomicroscopia = collect($evaluaciones_biomicroscopia); // igual
                $evaluaciones_fondo_ojo = collect($evaluaciones_fondo_ojo); // igual
                $evaluaciones_neurologia = collect($evaluaciones_neurologia); // igual
                // Unir ambas colecciones
                $evaluaciones = $evaluaciones->merge($evaluaciones_biomicroscopia);
                $evaluaciones = $evaluaciones->merge($evaluaciones_fondo_ojo);
                $evaluaciones = $evaluaciones->merge($evaluaciones_neurologia);
            }else if($profesional->id_sub_tipo_especialidad == 21){
                $evaluaciones = FichaOrl::where('id_fichas_atenciones', $id_ficha_atencion)->first();
                $evaluaciones_especialidad = FichaOtorrino::where('id_fichas_atenciones', $id_ficha_atencion)->first();
                // Asegúrate de que ambos sean colecciones
                $evaluaciones = collect($evaluaciones); // convierte el modelo en colección
                $evaluaciones_especialidad = collect($evaluaciones_especialidad); // igual
                // Unir ambas colecciones
                $evaluaciones = $evaluaciones->merge($evaluaciones_especialidad);
            }else if($profesional->id_sub_tipo_especialidad == 22){
                $evaluaciones = FichaUro::where('id_ficha_atencion', $id_ficha_atencion)->first();
                $evaluaciones_especialidad = FichaUrologiaAdulto::where('id_ficha_atencion', $id_ficha_atencion)->first();
                // Asegúrate de que ambos sean colecciones
                $evaluaciones = collect($evaluaciones); // convierte el modelo en colección
                $evaluaciones_especialidad = collect($evaluaciones_especialidad); // igual
                // Unir ambas colecciones
                $evaluaciones = $evaluaciones->merge($evaluaciones_especialidad);
            }else if($profesional->id_sub_tipo_especialidad == 28){
                $evaluaciones = FichaUro::where('id_ficha_atencion', $id_ficha_atencion)->first();
                $evaluaciones_especialidad = FichaUrologiaAdulto::where('id_ficha_atencion', $id_ficha_atencion)->first();
                // Asegúrate de que ambos sean colecciones
                $evaluaciones = collect($evaluaciones); // convierte el modelo en colección
                $evaluaciones_especialidad = collect($evaluaciones_especialidad); // igual
                // Unir ambas colecciones
                $evaluaciones = $evaluaciones->merge($evaluaciones_especialidad);
            }else if($profesional->id_sub_tipo_especialidad == 58){
                $evaluaciones = FichaNeuro::where('id_fichas_atenciones', $id_ficha_atencion)->first();
                $evaluaciones->datos = json_decode($evaluaciones->datos, true);
                $evaluaciones =$evaluaciones->datos;
            }
            else if($profesional->id_sub_tipo_especialidad == 85){
                $evaluaciones = FichaTraumatologiaAdulto::where('id_ficha_atencion', $id_ficha_atencion)->first();
            }
            else if($profesional->id_sub_tipo_especialidad == 78){
                $evaluaciones = FichaPediatriaGeneral::where('id_ficha_atencion', $id_ficha_atencion)->first();
            }else if($profesional->id_tipo_especialidad == 31){
                $plan_tratamiento = PlanTratamientoOtrosProfesionales::where('id_profesional', $profesional->id)->where('id_paciente', $paciente->id)->where('estado', 0)->get();

                foreach ($plan_tratamiento as $pt) {
                    $evaluacion = ControlNutricion::where('id_plan_tratamiento', $pt->id)->first();
                    if($evaluacion){
                        $evaluaciones =  $evaluacion->datos_control;

                    }
                }
                 return ['evaluaciones' => $evaluaciones, 'paciente' => $paciente,'profesional' => $profesional, 'plan_tratamiento' => $plan_tratamiento];
            }
            else{
                $evaluaciones = FichaCirugiaGeneralAdulto::where('id_ficha_atencion', $id_ficha_atencion)->first();
            }

            return ['evaluaciones' => $evaluaciones, 'paciente' => $paciente,'profesional' => $profesional];
        } catch (\Exception $e) {
            //throw $th;
            return ['error' => $e->getMessage()];
        }

    }

    public function mis_pacientes_ajax(Request $request)
    {
        $profesional = Profesional::where('id_usuario', Auth::id())->first();

        $fichas = FichaAtencion::where('id_profesional', $profesional->id)
           ->where('finalizada',1)
            ->distinct()
            ->get(['id_paciente']);

        $pacientes = Paciente::whereIn('id', $fichas)
            ->with(['prevision', 'fichasAtencion.lugarAtencion'])
            ->orderBy('apellido_uno')
            ->orderBy('apellido_dos')
            ->orderBy('nombres');

        // 👇 Filtro global de búsqueda por nombre completo
        if ($search = $request->input('search.value')) {
            $pacientes->where(function ($q) use ($search) {
                $q->where('nombres', 'like', "%{$search}%")
                ->orWhere('apellido_uno', 'like', "%{$search}%")
                ->orWhere('apellido_dos', 'like', "%{$search}%")
                ->orWhereRaw("CONCAT(nombres, ' ', apellido_uno, ' ', apellido_dos) like ?", ["%{$search}%"]);
            });
        }

        return DataTables::of($pacientes)
            ->addColumn('nombre_completo', function ($p) {
                return '<strong>' . strtoupper($p->nombres . ' ' . $p->apellido_uno . ' ' . $p->apellido_dos) . '</strong><br>' . $p->rut;
            })

            ->addColumn('fecha_nacimiento', function ($p) {
                return Carbon::parse($p->fecha_nac)->format('d/m/Y');
            })
            ->addColumn('convenio', function ($p) {
                return optional($p->prevision)->nombre;
            })
            ->addColumn('contacto', function ($p) {
                return strtolower($p->email) . '<br>' . $p->telefono_uno;
            })
            ->addColumn('acciones', function ($p) use ($profesional) {
                return view('components.paciente-acciones', compact('p', 'profesional'))->render();
            })
            ->addColumn('mensaje', function ($p) {
                return '<button class="btn btn-icon btn-purple" onclick="enviar_mensaje_paciente(' . $p->id . ')"><i class="feather icon-mail"></i></button>';
            })
            ->addColumn('lugares_atencion', function ($p) use ($profesional) {
                $lugares = FichaAtencion::where('id_profesional', $profesional->id)
                    ->where('id_paciente', $p->id)
                    ->pluck('id_lugar_atencion');

                return LugarAtencion::whereIn('id', $lugares)->pluck('nombre')->implode('<br>');
            })
            ->rawColumns(['nombre_completo', 'contacto', 'acciones', 'mensaje', 'lugares_atencion'])
            ->make(true);
    }

    function enviar_mensaje_paciente(Request $req){
        try {
            //code...
            $asunto = $req->asunto;
            $mensaje = $req->mensaje;
            $id_paciente = $req->id_paciente;

            $datos_mensaje = [
                'asunto' => $asunto,
                'mensaje' => $mensaje
            ];

            // buscamos al paciente
            $paciente = Paciente::where('id', $id_paciente)->first();
            $nuevo_mensaje = new Mensajes;
            $nuevo_mensaje->id_usuario = Auth::user()->id;
            $nuevo_mensaje->id_receptor = $paciente->id;
            $nuevo_mensaje->estado = 1;
            $nuevo_mensaje->datos_mensaje = json_encode($datos_mensaje);
            $nuevo_mensaje->tipo_mensaje = 3;
            $nuevo_mensaje->fecha_envio = Carbon::now()->format('Y-m-d H:i:s');
            $nuevo_mensaje->save();

            return ['estado' => 1, 'mensaje' => 'Mensaje enviado correctamente'];
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }

    function enviar_mensaje_difusion_pacientes(Request $req){
        try {
            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
            $ficha_atencion = FichaAtencion::where('id_profesional', $profesional->id)->distinct()->get(['id_paciente']);
            $prevision = Prevision::all();
            $region = Region::all();
            $pacientes = [];
            foreach ($ficha_atencion as $f) {
                array_push($pacientes, $f->Paciente()->first());
            }
            //code...
            $asunto = $req->asunto;
            $mensaje = $req->mensaje;
            $id_paciente = $req->id_paciente;

            $datos_mensaje = [
                'asunto' => $asunto,
                'mensaje' => $mensaje
            ];
            foreach($pacientes as $paciente){
                $nuevo_mensaje = new Mensajes;
                $nuevo_mensaje->id_usuario = Auth::user()->id;
                $nuevo_mensaje->id_receptor = $paciente->id;
                $nuevo_mensaje->estado = 1;
                $nuevo_mensaje->datos_mensaje = json_encode($datos_mensaje);
                $nuevo_mensaje->tipo_mensaje = 4; // 1: directo a profesional, 2: difusion a profesionales, 3: directo a paciente, 4: difusion a pacientes
                $nuevo_mensaje->fecha_envio = Carbon::now()->format('Y-m-d H:i:s');
                $nuevo_mensaje->save();
            }
            return ['estado' => 1, 'mensaje' => 'Mensaje enviado correctamente'];
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }

    public function buscar_ciudad_region(Request $request)
    {
        $ciudad = Ciudad::where('id_region', $request->region)->orderBy('nombre')->get();

        return json_encode($ciudad);
    }

    public function registrar_empresa(Request $req){
        try {

            $nombre_empresa = $req->nombre;
            $rut_empresa = $req->rut;
            $giro_empresa = $req->giro;
            $direccion_empresa = $req->direccion;
            $id_region = $req->region;
            $id_ciudad = $req->ciudad;
            $telefono_empresa = $req->telefono;
            $email_empresa = $req->correo;
            $observaciones = $req->observaciones;

            $empresa = new Empresas;
            $empresa->nombre_empresa = $nombre_empresa;
            $empresa->rut_empresa = $rut_empresa;
            $empresa->direccion_empresa = $direccion_empresa;
            $empresa->giro_empresa = $giro_empresa;
            $empresa->id_region = $id_region;
            $empresa->id_comuna = $id_ciudad;
            $empresa->telefono_empresa = $telefono_empresa;
            $empresa->email_empresa = $email_empresa;
            $empresa->observaciones = $observaciones;
            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
            // $empresa->id_profesional = $profesional->id;

            if($empresa->save()){
                return ['estado' => 1, 'mensaje' => 'Empresa registrada correctamente'];
            }else{
                return ['estado' => 0, 'mensaje' => 'Error al registrar empresa'];
            }
        } catch (\Exception $e) {
            //throw $th;
            return ['estado' => 0, 'mensaje' => $e->getMessage()];
        }

    }

    public function dame_convenios_profesional($id_profesional){
        try {
            $convenios_empresas = EmpresasConvenios::where('id_profesional', $id_profesional)->get();
            foreach($convenios_empresas as $convenio){
                $convenio->id_tipo_convenio = json_decode($convenio->id_tipo_convenio);
                $tipos_convenios_ = [];
                foreach($convenio->id_tipo_convenio as $tipo){
                    $tipo_convenio = TipoProductoConvenios::where('id', $tipo)->first();
                    array_push($tipos_convenios_, $tipo_convenio->nombre);
                }
                $convenio->tipos_convenios = $tipos_convenios_;
            }
            return $convenios_empresas;
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }

    public function aplicar_convenio_tratamiento(Request $request)
    {

        $convenio = EmpresasConvenios::find($request->id);

        $porcentaje_descuento = intval($convenio->porcentaje);
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

        $odontograma = $this->dameOdontogramaPaciente(
            $request->id_paciente,
            $request->id_ficha_atencion,
            $request->id_lugar_atencion,
            $profesional->id_tipo_especialidad
        );

        $valores = $this->dameValoresOdontograma(
            $request->id_paciente,
            $request->id_ficha_atencion,
            $request->id_lugar_atencion,
            $profesional->id_tipo_especialidad
        );

        $insumos = $this->dame_insumos_tratamiento(
            $request->id_paciente,
            $request->id_ficha_atencion
        );

        $todos = $this->dameTratamientosBocaGeneral(
            $request->id_ficha_atencion
        );

        $total_lab = 0;

        $fc = new ficha_atencionController();
        $ordenes_trabajo_menor = $fc->dameOrdenesTrabajoMenor($request->id_paciente,$profesional->id, $request->id_ficha_atencion);
        $ordenes_trabajo_mayor = $fc->dameOrdenesTrabajoMayor($request->id_paciente,$profesional->id, $request->id_ficha_atencion);

        foreach($ordenes_trabajo_menor as $ot){
            if($ot->presupuesto == 1){
                $total_lab += $ot->valor_prestacion;
            }
        }

        foreach($ordenes_trabajo_mayor as $ot){
            if($ot->presupuesto == 1){
                $total_lab += $ot->valor_prestacion;
            }
        }

        $descuentos = 0;

        // Aplicamos el descuento a insumos
        foreach ($insumos as $i) {
            if($i->presupuesto == 1){
                $total_insumo = $i->cantidad * $i->valor;
                $descuento = $total_insumo * ($porcentaje_descuento / 100);
                $i->valor_descuento = $descuento;
                $i->nuevo_valor = $total_insumo - $descuento;
                $descuentos += $descuento;
            }

        }

        // Aplicamos el descuento a las ordenes de trabajo
        foreach ($ordenes_trabajo_menor as $ot) {
            if($ot->presupuesto == 1){
                $descuento = $ot->valor_prestacion * ($porcentaje_descuento / 100);
                $ot->valor_descuento = $descuento;
                $ot->nuevo_valor = $ot->valor_prestacion - $descuento;
                $descuentos += $descuento;
            }
        }

        // Aplicamos el descuento a las ordenes de trabajo
        foreach ($ordenes_trabajo_mayor as $ot) {
            if($ot->presupuesto == 1){
                $descuento = $ot->valor_prestacion * ($porcentaje_descuento / 100);
                $ot->valor_descuento = $descuento;
                $ot->nuevo_valor = $ot->valor_prestacion - $descuento;
                $descuentos += $descuento;
            }
        }

        // Aplicamos el descuento a odontograma
        foreach ($odontograma as $o) {
            if($o->presupuesto == 1){
                $descuento = $o->valor * ($porcentaje_descuento / 100);
                $o->valor_descuento = $descuento;
                $o->nuevo_valor = $o->valor - $descuento;
                $descuentos += $descuento;
            }

        }

        // Aplicamos el descuento a tratamientos generales
        foreach($todos as $o){
            if($o->presupuesto == 1){
                $descuento = $o->valor * ($porcentaje_descuento / 100);
                $o->valor_descuento = $descuento;
                $o->nuevo_valor = $o->valor - $descuento;
                $descuentos += $descuento;
            }

        }



        $total_general = $valores[0] + $valores[1] + $valores[2] + $valores[3];
        $total_con_descuento = $total_general - $descuentos;
        $pagos_tratamientos_dentales = PagosPresupuestoDental::where('id_ficha_atencion', $request->id_ficha_atencion)->get();

        $resto_pago = 0;
        foreach($pagos_tratamientos_dentales as $p){
            $resto_pago += intval($p->total);
        }
        $total_abonado = $resto_pago;

        // Primero Insumos
        foreach ($insumos as $i) {
            $valor = intval($i->nuevo_valor) * intval($i->cantidad);
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
        // return $resto_pago;
        // PAGO PROGRESIVO - Luego Odontograma
        foreach ($odontograma as $o) {
            if ($o->presupuesto == 1) {
                $valor_real = max(intval($o->nuevo_valor) - intval($o->valor_descuento), 0); // evita negativos

                if ($resto_pago >= $valor_real) {
                    $o->estado_pago = 'ok';
                    $resto_pago -= $valor_real;
                } elseif ($resto_pago > 0) {
                    $o->estado_pago = 'incompleto';
                    $resto_pago = 0;
                } else {
                    $o->estado_pago = 'error';
                }
            }
        }

        foreach($todos as $o){
            if($o->presupuesto == 1){
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



        return [
            'odontograma' => $odontograma,
            'insumos' => $insumos,
            'valores' => $valores,
            'descuentos' => $descuentos,
            'total_general' => $total_general,
            'total_con_descuento' => $total_con_descuento,
            'total_abonado' => $total_abonado,
            'total_lab' => $total_lab,
            'todos' => $todos
        ];
    }

    public function dameCorrelativo(Request $request){
        try {

            $fc = new ficha_atencionController;
            $correlativo = $fc->dame_correlativo($request->tip_doc);

            return response()->json(['fila' => $correlativo]);
        } catch (\Exception $e) {
            //throw $th;
            return response()->json(['error' => $e->getMessage()], 500);
        }

    }

    public function dameTratamientosBocaGeneral($id_ficha_atencion, $total = null)
    {
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        if($profesional->id_tipo_especialidad !== 16){
        $examenes = ExamenesBocaGeneral::select('examenes_boca_general.*', 'diagnosticos_dental.valor','tratamientos_dental.descripcion')
            ->join('diagnosticos_dental', 'examenes_boca_general.diagnostico_tratamiento', '=', 'diagnosticos_dental.descripcion')
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

        $total_gral = 0;

        foreach ($examenes as $e) {
            if($e->presupuesto == 1){
                $valor = (float) $e->valor;
                $total_gral += $valor;

                if ($total === null) {
                    $e->estado_pago = 'intermedio'; // o 'pendiente' si prefieres
                    continue;
                }

                if ($total <= 0) {
                    $e->estado_pago = 'error';
                } elseif ($valor <= $total) {
                    $e->estado_pago = 'ok';
                    $total -= $valor;
                } else {
                    $e->estado_pago = 'intermedio';
                    $total -= $valor; // puede quedar negativo
                }
            }

        }

        // Si quieres retornar también el total general, puedes incluirlo así:
        // return ['examenes' => $examenes, 'total_gral' => $total_gral];

        return $examenes;
    }


    public function buscar_tons(Request $req){
        try {
            $rut = $req->rut_tons;
            $profesional = Profesional::where('rut','like',$rut)->where('id_especialidad',13)->first();
            $odontologo = Profesional::where('id_usuario',Auth::user()->id)->first();
            $profesionales_lugares_atencion = ProfesionalesLugaresAtencion::select('profesionales_lugares_atencion.*','lugares_atencion.nombre','lugares_atencion.id as id_lugar_atencion')
                                                ->join('lugares_atencion','profesionales_lugares_atencion.id_lugar_atencion','=','lugares_atencion.id')
                                                ->where('profesionales_lugares_atencion.id_profesional',$odontologo->id)
                                                ->get();
            if($profesional){
                $direccion = Direccion::where('id', $profesional->id_direccion)->first();
                $profesional->direccion = $direccion;
                $profesional->ciudad = $direccion->Ciudad()->first();
                return ['estado' => 1,'tons' => $profesional,'lugares_atencion' => $profesionales_lugares_atencion];
            }else{
                return ['estado' => 0];
            }
        } catch (\Exception $e) {
            //throw $th;
            return ['estado' => 0, 'mensaje' => $e->getMessage()];
        }


    }

    public function tons(){

        $region = Region::all();
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $relaciones = $this->dame_relaciones_tons($profesional->id);

        return view('app.profesional.tons',['region' => $region, 'relaciones' => $relaciones])->render();
    }

    public function dame_relaciones_tons($id_profesional){
       $relaciones =  ProfesionalTons::select(
            'profesional_tons.*',
            'profesionales1.nombre as nombre_profesional',
            'profesionales1.apellido_uno as apellido_profesional',
            'profesionales2.nombre as nombre_tons',
            'profesionales2.apellido_uno as apellido_tons',
            'lugares_atencion.nombre as nombre_lugar_atencion',
            'profesionales2.rut as rut_tons',
            'profesionales2.email as email_tons',
            'profesionales2.telefono_uno as telefono_tons',
        )
        ->join('profesionales as profesionales1', 'profesional_tons.id_profesional', '=', 'profesionales1.id')
        ->join('profesionales as profesionales2', 'profesional_tons.id_tons', '=', 'profesionales2.id')
        ->join('lugares_atencion', 'profesional_tons.id_lugar_atencion', '=', 'lugares_atencion.id')
        ->where('profesional_tons.id_profesional', $id_profesional)
        ->get();

        return $relaciones;
    }

    public function solicitar_tons_atencion(Request $req){
        try {

            $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
            $id_profesional = $profesional->id;
            // revisamos si el profesional ya tiene una relacion con el tons
            $existe = ProfesionalTons::where('id_profesional',$id_profesional)->where('estado',2)->first();

            if($existe){
                return ['estado' => 0, 'mensaje' => 'El profesional ya tiene una solicitud de atencion en espera para Tons'];
            }
            // buscamos el profesional tons
            $relacion = ProfesionalTons::find($req->id_tons);

            if($relacion){
                $relacion->estado = 2;
                if($relacion->save()){
                    $tonss = $this->dame_relaciones_tons($id_profesional);
                    return ['estado' => 1, 'mensaje' => 'Solicitud enviada correctamente','tonss' => $tonss];
                }else{
                    return ['estado' => 0, 'mensaje' => 'Error al enviar solicitud'];
                }
            }else{
                return ['estado' => 0, 'mensaje' => 'No existe la relacion'];
            }
        } catch (\Exception $e) {
            //throw $th;
            return ['estado' => 0, 'mensaje' => $e->getMessage()];
        }
    }

    public function eliminar_tons(Request $req){

        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $id_profesional = $profesional->id;
        $relacion = ProfesionalTons::where('id',$req->id)->first();
        if($relacion){
            if($relacion->delete()){
                $tonss = $this->dame_relaciones_tons($id_profesional);
                return ['estado' => 1, 'mensaje' => 'Eliminado correctamente','tonss' => $tonss];
            }else{
                return ['estado' => 0, 'mensaje' => 'Error al eliminar'];
            }
        }else{
            return ['estado' => 0, 'mensaje' => 'No existe la relacion'];
        }
    }

    public function registrar_tons(Request $req){

        $datos = array();
        $error = array();
        $valido = 1;
        /** validacion de correo en paciente */
        $temp_valid_email = Profesional::where(DB::raw('UPPER(email)'), mb_strtoupper($req->email))->count();
        if($temp_valid_email == 0){
            $user = Auth::user()->id;
            $direccion = new Direccion();
            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
            $direccion->direccion = $req->direccion;
            $direccion->numero_dir = $req->numero;
            $direccion->id_ciudad = $req->ciudad;
            $direccion->save();
            $nuevo_profesional = new Profesional;
            $nuevo_profesional->rut = $req->rut;
            $nuevo_profesional->nombre = $req->nombre;
            $nuevo_profesional->apellido_uno = $req->apellido_uno;
            $nuevo_profesional->apellido_dos = $req->apellido_dos;
            $nuevo_profesional->sexo = $req->sexo;
            $nuevo_profesional->fecha_nacimiento = $req->fecha_nac;
            $nuevo_profesional->certificado = 3;
            $nuevo_profesional->email = $req->email;
            $nuevo_profesional->id_especialidad = 13; // tons
            $nuevo_profesional->telefono_uno = $req->telefono;
            $nuevo_profesional->id_direccion = $direccion->id;

            if ($nuevo_profesional->save())
            {
                $datos['tons']['estado'] = 1;
                $datos['tons']['msj'] = 'Tons registrado';

                /** CREACION DE USUARIO  */
                if( (\Carbon\Carbon::parse($req->fecha_nac)->age) >= 18)
                {
                    /** buscar por rut */
                    //$user = User::where(DB::raw('UPPER(email)'), mb_strtoupper($nuevo_profesional))->first();
                    /** buscar por correo */
                    $user = User::where(DB::raw('UPPER(email)'), mb_strtoupper($nuevo_profesional->email))->first();


                    if($user == NULL)
                    {
                        $user = new User();
                        $user->name = $nuevo_profesional->nombres . ' ' .$nuevo_profesional->apellido_uno . ' ' .$nuevo_profesional->apellido_dos;

                        $user->email = $nuevo_profesional->email;


                        $pass_temp = random_int(1111,9999);
                        $user->password = Hash::make($pass_temp);

                        if($nuevo_profesional->email == '' || $nuevo_profesional->email == null || empty($nuevo_profesional->email)){
                            $user->rut = $nuevo_profesional->rut;
                        }

                        if($user->save())
                        {
                            $user->assignRole('Profesional');
                            $nuevo_profesional->id_usuario = $user->id;
                            if($nuevo_profesional->save())
                            {
                                $datos['tons']['user']['update_tons'] = 'Tons actualizado con Usuario.';
                                if( $req->reserva_result_codigo_validacion == 1 )
                                {
                                    /** envio de sms */
                                }
                                else
                                {
                                    if($nuevo_profesional->email == '' || $nuevo_profesional->email == null || empty($nuevo_profesional->email)){
                                        /** envio de correo de confirmacion  */
                                        $blade = 'bienvenida_tons_usuario';
                                        $to = array(
                                                array('email' => $nuevo_profesional->email,'name' => $nuevo_profesional->nombres . ' ' .$nuevo_profesional->apellido_uno . ' ' .$nuevo_profesional->apellido_dos),
                                            );
                                        $cc = array();
                                        $bcc = array();
                                        $asunto = 'MED-SDI - Bienvenido!';
                                        $body = array(
                                                    'nombre'=>$nuevo_profesional->nombres . ' ' .$nuevo_profesional->apellido_uno . ' ' .$nuevo_profesional->apellido_dos,
                                                    'user' => $nuevo_profesional->email,
                                                    'pass' => $pass_temp
                                                    );
                                        $archivo = '';/** pendiente */
                                        $id_institucion = '';

                                        $result_mail =  SendMailController::envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, $id_institucion);

                                        if($result_mail['estado'])
                                        {
                                            $datos['tons']['user']['mail']['estado'] = 1;
                                            $datos['tons']['user']['mail']['msj'] = 'Notificacion de bienvenida enviado';
                                        }
                                        else
                                        {
                                            $datos['tons']['user']['mail']['estado'] = 0;
                                            $datos['tons']['user']['mail']['msj'] = 'Falle en envio de Notificacion de bienvenida';
                                        }
                                        /** cerrar envio de correo de confirmacion  */
                                    }else{
                                        $datos['tons']['user']['mail']['estado'] = 0;
                                        $datos['tons']['user']['mail']['msj'] = 'El tons no tiene email valido';
                                    }
                                    $datos['estado'] = 1;
                                    $datos['msj'] = 'Tons creada';
                                }
                            }
                        }
                    }
                    else
                    {
                        $user->assignRole('Profesional');
                        $nuevo_profesional->id_usuario = $user->id;
                        if($nuevo_profesional->save())
                        {
                            $datos['tons']['user']['update_paciente'] = 'tons actualizado con Usuario.';
                        }
                    }
                }
                /** CIERRE CREACION DE USUARIO  */

            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Problema al crear Tons';
            }
        }else{
            $datos['estado'] = 0;
            $datos['msj'] = 'el correo ya esta siendo utilizado por otro profesional.';
        }

        return $datos;
    }

    public function solicitar_tons(Request $req){
        try {

            $tons = Profesional::find($req->id_tons);
            $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
            $existe = ProfesionalTons::where('id_profesional', $profesional->id)->where('estado',2)->first();

            if($existe){
                return ['estado' => 0,'msj' => 'Ya estan asociados con anterioridad.'];
            }
            $relacion = new ProfesionalTons;
            $relacion->id_profesional = $profesional->id;
            $relacion->id_tons = $tons->id;
            $relacion->id_lugar_atencion = $req->lugar_atencion_profesional;
            $relacion->fecha = Carbon::now();

            if($relacion->save()){
                $todas_tons = $this->dame_relaciones_tons($profesional->id);
                return ['estado' => 1, 'msj' => 'Se ha generado la relación exitosamente.','tonss' => $todas_tons];
            }else{
                return ['estado' => 0,'msj' => 'Ha ocurrido un error al guardar la relación'];
            }
        } catch (\Exception $e) {
            //throw $th;
            return ['estado' => 0,'msj' => $e->getMessage()];
        }

    }

    public function desasociar_tons(Request $req){

        $relacion = ProfesionalTons::find($req->id_tons);
        if($relacion){
            $relacion->estado = 1;
            if($relacion->save()){
                $relaciones = $this->dame_relaciones_tons($relacion->id_profesional);
                return ['estado' => 1, 'msj' => 'Desasociado correctamente', 'tonss' => $relaciones];
            }else{
                return ['estado' => 0, 'msj' => 'Error al desasociar'];
            }
        }else{
            return ['estado' => 0, 'msj' => 'No existe la relacion'];
        }

    }

    public function guardar_tipo_convenio(Request $req){
        try {
            $empresa = Empresas::where('id', $req->id_empresa)->first();
            $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
            if ($empresa) {

                $nuevo_convenio = new EmpresasConvenios;
                $nuevo_convenio->id_empresa = $empresa->id;
                $nuevo_convenio->id_convenio = $req->tipo_convenio;
                $nuevo_convenio->nombre_convenio = $req->nombre_convenio;
                $nuevo_convenio->porcentaje = $req->porcentaje;
                $nuevo_convenio->id_profesional = $profesional->id;
                $nuevo_convenio->fecha_inicio = $req->fecha_inicio;
                $nuevo_convenio->fecha_termino = $req->fecha_termino;
                $nuevo_convenio->observaciones = $req->observaciones;
                if($nuevo_convenio->save()){
                    $todos_convenios = EmpresasConvenios::select('empresas_convenios.*','tipoproducto_convenios.descripcion')
                    ->join('tipoproducto_convenios','empresas_convenios.id_convenio','tipoproducto_convenios.id')
                    ->where('empresas_convenios.id_profesional',$profesional->id)
                    ->where('empresas_convenios.id_empresa', $empresa->id)
                    ->get();
                    $convenios =  EmpresasConvenios::select('empresas_convenios.*','tipoproducto_convenios.descripcion')
                    ->join('tipoproducto_convenios','empresas_convenios.id_convenio','tipoproducto_convenios.id')
                    ->where('empresas_convenios.id_profesional',$profesional->id)
                    ->get();
                    return [
                        'estado' => 1,
                        'mensaje' => 'Tipo de convenio agregado correctamente',
                        'empresa' => $empresa,
                        'todos_convenios' => $todos_convenios,
                        'convenios' => $convenios
                    ];
                }
            }else{
                $conveniosSeleccionados = $req->conveniosSeleccionados;
                foreach($conveniosSeleccionados as $c){
                    $nuevo_convenio = new EmpresasConvenios;
                    $nuevo_convenio->id_convenio = $req->tipo_convenio;
                    $nuevo_convenio->nombre_convenio = $c['convenio'];
                    $nuevo_convenio->porcentaje = $req->porcentaje;
                    $nuevo_convenio->id_profesional = $profesional->id;
                    $nuevo_convenio->fecha_inicio = $req->fecha_inicio;
                    $nuevo_convenio->fecha_termino = $req->fecha_termino;
                    $nuevo_convenio->observaciones = $req->observaciones;

                    $nuevo_convenio->save();
                }
                $todos_convenios = EmpresasConvenios::select('empresas_convenios.*','tipoproducto_convenios.descripcion')
                ->join('tipoproducto_convenios','empresas_convenios.id_convenio','tipoproducto_convenios.id')
                ->where('empresas_convenios.id_profesional',$profesional->id)
                ->where('empresas_convenios.id_empresa', null)
                ->get();
                $convenios =  EmpresasConvenios::select('empresas_convenios.*','tipoproducto_convenios.descripcion')
                ->join('tipoproducto_convenios','empresas_convenios.id_convenio','tipoproducto_convenios.id')
                ->where('empresas_convenios.id_profesional',$profesional->id)
                ->get();
                return [
                    'estado' => 1,
                    'mensaje' => 'Tipo de convenio agregado correctamente',
                    'empresa' => $empresa,
                    'todos_convenios' => $todos_convenios,
                    'convenios' => $convenios
                ];
                return ['estado' => 0, 'mensaje' => 'Empresa no encontrada'];
            }
        } catch (\Exception $e) {
            //throw $th;
            return ['estado' => 0, 'mensaje' => $e->getMessage()];
        }

    }

    public function eliminar_tipo_convenio(Request $req){
        try {
            $tipo_convenio = EmpresasConvenios::find($req->id);
            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
            if($tipo_convenio->delete()){
                $todos_convenios = EmpresasConvenios::select('empresas_convenios.*','tipoproducto_convenios.descripcion')
                        ->leftjoin('tipoproducto_convenios','empresas_convenios.id_convenio','tipoproducto_convenios.id')
                        ->where('empresas_convenios.id_profesional',$profesional->id)
                        ->get();

                $todos_convenios_prevision = EmpresasConvenios::select('empresas_convenios.*','tipoproducto_convenios.descripcion')
                ->join('tipoproducto_convenios','empresas_convenios.id_convenio','tipoproducto_convenios.id')
                ->where('empresas_convenios.id_profesional',$profesional->id)
                ->where('empresas_convenios.id_empresa', null)
                ->get();
                return ['estado' => 1, 'mensaje' => 'Se ha eliminado con exito', 'convenios' => $todos_convenios, 'convenios_prevision' => $todos_convenios_prevision];
            }else{
                return ['estado' => 0,'mensaje' => 'Ha ocurrido un error'];
            }
        } catch (\Exception $e) {
            //throw $th;
            return ['estado' => 0,'mensaje' => $e->getMessage()];
        }

    }

    public function mis_asistentes()
    {
        /*$sistentes = Profesional::where('id', 3)->first();
        $ficha_atencion = FichaAtencion::where('id_profesional', $profesional->id)->get();
        $paciente = [];
        foreach ($ficha_atencion as $f) {
            array_push($paciente, $f->Paciente()->first());
        }*/
        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();
        $region = Region::all();

        $asistentes = $profesional->Asistentes()->get();
        $asistentes_lugar_atencion = AsistenteLugarAtencion::where('id_profesional', $profesional->id)->get();

        // dd($asistentes_lugar_atencion);

        return view('app.profesional.mis_asistentes')->with(['asistentes' => $asistentes, 'region' => $region, 'asistentes_lugar_atencion' => $asistentes_lugar_atencion]);
    }

    public function crear_asistente(Request $request)
    {
        /** REGISTRO DE ASISTENTE EXISTENTE */
        if ($request->id_asistente_registrado != null) {
            $user = Auth::user()->id;
            $profesional = Profesional::where('id_usuario', $user)->first();
            $asistente = Asistente::find($request->id_asistente_registrado);
            $asistente->rut = $request->rut_nuevo_asistente;
            $asistente->nombres = $request->nombre_nuevo_asistente;
            $asistente->apellido_uno = $request->apellido_nuevo_asistente;
            $asistente->apellido_dos = $request->apellido_dos_nuevo_asistente;
            $asistente->telefono_uno = $request->telefono_nuevo_asistente;

            $direccion = $asistente->Direccion()->first();
            $direccion->direccion = $request->direccion_nuevo_asistente;
            $direccion->numero_dir = $request->numero_nuevo_asistente;
            $direccion->id_ciudad = $request->ciudad_agregar;

            $asistente->save();
            $direccion->save();

            $profesional_asistente = new ProfesionalAsistente();
            $profesional_asistente->id_profesional = $profesional->id;
            $profesional_asistente->id_asistente = $asistente->id;

            if (!$profesional_asistente->save()) {
                return back()->with('mensaje', 'error al registrar asistente');
            }

            return back()->with('mensaje', "Se ha registrado asistente $asistente->nombre");
        }
        /** REGISTRO DE ASISTENTE NUEVA */
        else
        {
            $user = Auth::user()->id;
            $profesional = Profesional::where('id_usuario', $user)->first();
            $asistente = new Asistente();
            $asistente->rut = $request->rut_nuevo_asistente;
            $asistente->nombres = $request->nombre_nuevo_asistente;
            $asistente->apellido_uno = $request->apellido_nuevo_asistente;
            $asistente->apellido_dos = $request->apellido_dos_nuevo_asistente;
            $asistente->telefono_uno = $request->telefono_nuevo_asistente;
            //$asistente->telefono_dos = $request->;
            //$asistente->sexo = $request->;
            $asistente->email = $request->email_nuevo_asistente;
            //$asistente->fecha_nac = $request->;

            $direccion = new Direccion();
            $direccion->direccion = $request->direccion_nuevo_asistente;
            $direccion->numero_dir = $request->numero_nuevo_asistente;
            $direccion->id_ciudad = $request->ciudad_agregar;

            if ($direccion->save()) {
                $asistente->id_direccion = $direccion->id;
            }

            if (!$asistente->save()) {
                return back()->with('mensaje', 'error al registrar asistente');
            }

            $profesional_asistente = new ProfesionalAsistente();
            $profesional_asistente->id_profesional = $profesional->id;
            $profesional_asistente->id_asistente = $asistente->id;

            if (!$profesional_asistente->save()) {
                return back()->with('mensaje', 'error al registrar asistente');
            }

            return back()->with('mensaje', "Se ha registrado asistente $asistente->nombre");
        }

    }

    public function ver_lugar_atencion(Request $request)
    {
        $lugar_atencion = LugarAtencion::where('id', $request->lugar_atencion)->first();
        $direccion = Direccion::where('id', $lugar_atencion->id_direccion)->first();

        $direccion->Ciudad = $direccion->Ciudad()->first();
        $region = Region::all();
        $ciudad = Ciudad::where('id_region', $direccion->Ciudad->id_region)->orderBy('nombre')->get();

        $data = [
            'LugarAtencion' => $lugar_atencion,
            'Direccion' => $direccion,
            'Regiones' => $region,
            'Ciudades' => $ciudad,
        ];

        return json_encode($data);
    }

    public function editar_lugar_atencion(Request $request)
    {
        $lugar_atencion = LugarAtencion::where('id', $request->id_lugar_atencion)->first();
        $lugar_atencion->email = $request->email;
        $lugar_atencion->telefono = $request->telefono;
        $lugar_atencion->nombre = $request->nombre;
        $lugar_atencion->tipo = $request->tipo;

        $direccion = Direccion::where('id', $lugar_atencion->id_direccion)->first();

        $direccion->direccion = $request->direccion;
        $direccion->numero_dir = $request->numero_dir;
        $direccion->id_ciudad = $request->id_ciudad;

        if (!$lugar_atencion->save()) {
            return 'error';
        }

        if (!$direccion->save()) {
            return 'error';
        }

        if ($request->notificar_pacientes_modificar == 'on') {
            $fichas = FichaAtencion::where('id_profesional', Auth::user()->id)->get();
            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
            $ciudad = Ciudad::where('id', $direccion->id_ciudad)->first();

            $pacientes = [];
            foreach ($fichas as $f) {
                array_push($pacientes, $f->Paciente()->first());
            }

            foreach ($pacientes as $p) {
                $details = [
                    'title' => 'Edición lugar de atención',
                    'body' => 'Estimado/a ' . $p->nombres . ' ' . $p->apellido_uno . ' ' . $p->apellido_dos . ',<br/>
                    Junto con saludar, por medio de este correo le informamos que el profesional Dr. ' .
                        $profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos .
                        ' <br/> ha Editado los datos del lugar de atención:  <br/>' .
                        'Nombre:' . $lugar_atencion->nombre . ' <br/>' .
                        'Dirección: ' . $direccion->direccion . ' ' . $direccion->numero_dir . ' <br/>' .
                        'Ciudad: ' . $ciudad->nombre .
                        '<br/> Que tenga un excelente día. <br/><br/> \n' .
                        ' Saludos.',
                ];

                //Mail::to('jkriman@gmail.com')->send(new \App\Mail\RegistroPacienteMail($details));
            }
        }

        return json_encode($lugar_atencion);
    }

    public function buscar_hora_medica(Request $request)
    {
        $hora_medica = HoraMedica::where('id', $request->id_hora_medica)->first();
        $paciente = Paciente::where('id', $hora_medica->id_paciente)
                                // ->with(['Direccion' => function($query){
                                //     $query->with(['Ciudad' => function($query2){
                                //         $query2->with('Region')->first();
                                //     }])->first();
                                // }])
                                ->first();
        if(!empty($paciente->id_direccion))
        {
            $direccion = Direccion::with('Ciudad')->find($paciente->id_direccion);
            $dir_regi = Region::find($direccion->ciudad->id_region);
            if($dir_regi)
            {
                $direccion->region = $dir_regi;
            }

            if($direccion)
            {
                $paciente->direccion = $direccion;
            }
        }

        if(!empty($hora_medica->id_profesional))
            $profesional = Profesional::where('id', $hora_medica->id_profesional)->first();
        else
        {
            $user = Auth::user()->id;
            $profesional = Profesional::where('id_usuario', $user)->first();
        }

        $mascota = null;
        if (!empty($hora_medica->id_mascota)) {
            $mascota = Mascota::with(['especieMascota', 'tamanoMascota'])->find($hora_medica->id_mascota);
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
        }

		$fecha_ultima_atencion = HoraMedica::select('horas_medicas.fecha_consulta','fichas_atenciones.*')
        ->join('fichas_atenciones','horas_medicas.id_ficha_atencion','fichas_atenciones.id')
        ->where('horas_medicas.id_paciente', $hora_medica->id_paciente)
        ->where('horas_medicas.id_profesional',$profesional->id)
        ->where('fichas_atenciones.finalizada',1)
        // ->where('horas_medicas.id_lugar_atencion', $hora_medica->id_lugar_atencion)
        ->orderBy('horas_medicas.id','desc')
        ->first();

        if ($fecha_ultima_atencion) {
            $paciente->fecha_ultima_atencion = Carbon::parse($fecha_ultima_atencion->fecha_consulta)->toDateString(); // Solo la fecha (YYYY-MM-DD)
            //$paciente->hora_ultima_atencion = Carbon::parse($fecha_ultima_atencion->created_at)->toTimeString(); // Solo la hora (HH:MM:SS)
        }

        $presupuestos_dentales = PresupuestosDental::where('id_paciente',$hora_medica->id_paciente)->where('estado',1)->get();

        $paciente->presupuestos = $presupuestos_dentales;

        $edad = (\Carbon\Carbon::parse($paciente->fecha_nac)->age);

        $responsable = '';
        if($edad < 18)
        {
            $result_responsable = PacientesDependientes::where('id_paciente', $paciente->id)->first();
            if($result_responsable)
                $responsable = Paciente::where('id', $result_responsable->id_responsable)->first();
            else
                $responsable = null;
        }

        $procedimiento = '';
        if(!empty($hora_medica->id_procedimiento))
        {
            // Obtener el valor de id_procedimiento
            $idProcedimiento = $hora_medica->id_procedimiento;

            // Verificar si el valor contiene barras verticales (caso múltiples IDs)
            if (strpos($idProcedimiento, '|') !== false) {
                // Convertir la cadena en un array de IDs
                $array_id_procedimiento = explode('|', $idProcedimiento);

                // Obtener todos los procedimientos que coincidan con los IDs
                $procedimiento = ProcedimientosCentro::whereIn('id', $array_id_procedimiento)->get();
            } else {
                // Caso de un solo ID (número)
                $procedimiento = ProcedimientosCentro::where('id',$idProcedimiento)->get();
            }
        }
        else
        {
            $procedimiento = array();
        }


        // return json_encode($paciente);
        return array(
            'paciente' => $paciente,
            'profesional' =>$profesional,
            'estado_hora' =>$hora_medica->id_estado,
            'hora_medica' => $hora_medica,
            'edad' => $edad,
            'responsable' => $responsable,
            'procedimiento' => $procedimiento,
            'mascota' => $mascota,
        );
    }

    //funciones mis lugares de atencion
    public function mi_asistente_lugar_atencion(Request $request)
    {
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $asistenteLugar = AsistenteLugarAtencion::where('id_lugar_atencion', $request->id_lugar_atencion)->where('id_profesional', $profesional->id)->get();

        $asistente = [];
        $pos = 0;
        foreach ($asistenteLugar as  $key => $a) {
            // array_push($asistente, $a->Asistentes()->first());
            $asistente[$pos] = $a->Asistentes()->first();
            $asistente[$pos]['estado'] = $a->estado;
            $pos++;
        }

        return json_encode($asistente);
    }

    public function cambio_estado_asistente(Request $request)
    {
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $filtro = array();
        if(!empty($request->id_lugar_atencion))
            $filtro[] = array('id_lugar_atencion', $request->id_lugar_atencion);

        $filtro[] = array('id_asistente', $request->id_asistente);
        $filtro[] = array('id_profesional', $profesional->id);
        $asistenteLugar = AsistenteLugarAtencion::where($filtro)
                                        ->where('id_profesional', $profesional->id)
                                        ->first();

        $asistenteLugar->estado = $request->estado;
        if (!$asistenteLugar->save()) {
            return 'fail';
        }
        //$asistente = $asistenteLugar->Asistentes()->first();
        return 'ok';
    }

    public function cambio_estado_lugar_atencion(Request $request)
    {
      
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $ProfesionalLugar = ProfesionalesLugaresAtencion::where('id_lugar_atencion', $request->id_lugar_atencion)->where('id_profesional', $profesional->id)->first();

        $ProfesionalLugar->estado = $request->estado;
        if (!$ProfesionalLugar->save()) {
            return 'fail';
        }
        //$asistente = $asistenteLugar->Asistentes()->first();
        if($request->estado == 3)
        {
            /** liberar horario */
            ProfesionalHorario::where('id_profesional', $profesional->id)->where('id_lugar_atencion', $request->id_lugar_atencion )->delete();
            /** liberar asistente */
        }
        return 'ok';
    }

    public function mis_valores_lugar_atencion(Request $request)
    {
        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();
        $valores = ProfesionalConvenio::where('id_profesional', $profesional->id)->where('id_lugar_atencion', $request->id_lugar_atencion)->get();

        return json_encode($valores);
    }

    public function eliminar_contacto_paciente(Request $request)
    {
        $pacienteContacto = PacienteContactoEmergencia::where('id_paciente', $request->id_paciente)->where('id_contacto', $request->id_contacto)->first();
        if (!$pacienteContacto->delete()) {
            return 'error';
        } else {
            return 'ok';
        }
    }

    public function guardar_pieza_dental_dolor(Request $request){
        try {
            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
            $dolor = new ExamenesDentalDolor;
            $dolor->derivado_por = $request->derivado_por;
            $dolor->zona_dolor = $request->zona_dolor;
            $dolor->historia_anterior = $request->historia_anterior;
            $dolor->numero_pieza = $request->pieza_numero;
            $dolor->tipo_dolor = $request->tipo_dolor;
            $dolor->intensidad = $request->intensidad;
            $dolor->modo_dolor = $request->modo_dolor;
            $dolor->localizacion = $request->loc_dolor;
            $dolor->provocacion_dolor = $request->provocacion_dolor;
            $dolor->momento_dolor = $request->cdo_duele;
            $dolor->tipo_evolucion = $request->tpo_evolucion;
            $dolor->observaciones = $request->obs_anal_dolor;
            $dolor->id_profesional = $request->id_profesional;
            $dolor->id_paciente = $request->id_paciente;
            $dolor->id_lugar_atencion = $request->id_lugar_atencion;
            $dolor->tipo_examen = 1; // examen normal
            $dolor->tipo_especialidad = $profesional->id_tipo_especialidad;
            if($dolor->save()){
                $examenes = $this->dameExamenesPiezaDentalDolor($request->id_paciente, $profesional->id_tipo_especialidad);
                $v = view('atencion_odontologica.include.examenes_dental_dolor_todos',['examenes' => $examenes])->render();
                return ['mensaje' => 'OK', 'v' => $v];
            }
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }
    }


    public function guardar_pieza_dental_tto_impl(Request $request)
    {
        try {
            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();


            if($request->piezas){
                foreach($request->piezas as $pieza){
                    $tto = new ProcedimientosImplantes;
                    $tto->id_paciente = $request->id_paciente;
                    $tto->id_profesional = $profesional->id;
                    $tto->id_ficha_atencion = $request->id_ficha_atencion;
                    $tto->id_especialidad = $profesional->id_especialidad;
                    $tto->numero_pieza = $pieza;
                    $tto->id_procedimiento = $request->tto;
                    $tto->fecha = Carbon::now()->format('Y-m-d');
                    $tto->id_tipo_procedimiento = $request->tipo_tto;
                    $tto->tipo_procedimiento = $request->tipo_tto_text;
                    $tto->id_tipo_membrana = $request->membrana_tto;
                    $tto->membrana = $request->membrana_tto_text;
                    $tto->id_material_membrana = $request->material_membrana_tto;
                    $tto->material_membrana = $request->material_membrana_tto_text;
                    $tto->id_tipo_anestesia = $request->anestesia_tto;
                    $tto->anestesia = $request->anestesia_tto_text;
                    $tto->numero_tubos = $request->numero_tubos;
                    $tto->id_tecnica_anestesia = $request->tecnica_anestesia;
                    $tto->tecnica_anestesia = $request->tecnica_anestesia_text;
                    $tto->id_anestesico = $request->anestesico_tto;
                    $tto->anestesico = $request->anestesico_tto_text;
                    $tto->id_incidentes = $request->incidente_tto;
                    $tto->incidentes = $request->incidente_tto_text;
                    $tto->id_mat_injerto_oseo = $request->material_injerto_tto;
                    $tto->material_injerto_oseo = $request->material_injerto_tto_text;
                    $tto->metodo_injerto_oseo = $request->tipo_injerto_tto;
                    $tto->id_suturas = $request->suturas_tto;
                    $tto->suturas = $request->suturas_tto_text;
                    $tto->grosor_nylon = intval($request->grosor_nylon);
                    $tto->tiempo_quirurgico = $request->tiempo_quirurgico_tto;
                    $tto->observaciones = $request->observaciones;
                    $tto->estado = 1;
                    $tto->save();

                    // Actualiza el estado en la tabla OdontogramaPaciente
                    $piezaModelo = OdontogramaPaciente::where('pieza', $pieza)
                        ->get();
                    if ($piezaModelo) {
                        foreach ($piezaModelo as $pieza) {
                            $pieza->estado = 1;
                            $pieza->save();
                        }
                    }
                }
            }else{
                $tto = new ProcedimientosImplantes;
                $tto->id_paciente = $request->id_paciente;
                $tto->id_profesional = $profesional->id;
                $tto->id_ficha_atencion = $request->id_ficha_atencion;
                $tto->id_especialidad = $profesional->id_especialidad;
                $tto->numero_pieza = $request->numero_pieza;
                $tto->id_procedimiento = $request->tto;
                $tto->fecha = Carbon::now()->format('Y-m-d');
                $tto->id_tipo_procedimiento = $request->tipo_tto;
                $tto->tipo_procedimiento = $request->tipo_tto_text;
                $tto->id_tipo_membrana = $request->membrana_tto;
                $tto->membrana = $request->membrana_tto_text;
                $tto->id_material_membrana = $request->material_membrana_tto;
                $tto->material_membrana = $request->material_membrana_tto_text;
                $tto->id_tipo_anestesia = $request->anestesia_tto;
                $tto->anestesia = $request->anestesia_tto_text;
                $tto->numero_tubos = $request->numero_tubos;
                $tto->id_tecnica_anestesia = $request->tecnica_anestesia;
                $tto->tecnica_anestesia = $request->tecnica_anestesia_text;
                $tto->id_anestesico = $request->anestesico_tto;
                $tto->anestesico = $request->anestesico_tto_text;
                $tto->id_incidentes = $request->incidente_tto;
                $tto->incidentes = $request->incidente_tto_text;
                $tto->id_mat_injerto_oseo = $request->material_injerto_tto;
                $tto->material_injerto_oseo = $request->material_injerto_tto_text;
                $tto->metodo_injerto_oseo = $request->tipo_injerto_tto;
                $tto->id_suturas = $request->suturas_tto;
                $tto->suturas = $request->suturas_tto_text;
                $tto->grosor_nylon = intval($request->grosor_nylon);
                $tto->tiempo_quirurgico = $request->tiempo_quirurgico_tto;
                $tto->estado = 1;
                $tto->save();

                // Actualiza el estado en la tabla OdontogramaPaciente
                $piezaModelo = OdontogramaPaciente::where('id', $request->tto)
                    ->first();
                if ($piezaModelo) {
                    $piezaModelo->estado = 1;
                    $piezaModelo->save();
                }
            }




            // Datos que se devuelven una vez guardado todo
            $examenes = $this->dameProcedimientosImplantes($request->id_paciente, $profesional->id, $request->id_ficha_atencion);
            $tratamientos_implantologia = TratamientosImplantologia::orderBy('descripcion','asc')->get();
            $materiales_implantologia = MaterialesImplantologia::orderBy('descripcion','asc')->get();

            $odontograma = $this->dameOdontogramaPaciente($request->id_paciente, $request->id_ficha_atencion, $request->id_lugar_atencion, $profesional->id_tipo_especialidad);

            // buscamos el presupuesto dental
            $presupuesto = PresupuestosDental::where('id_paciente', $request->id_paciente)
                ->where('id_ficha_atencion', $request->id_ficha_atencion)
                ->where('estado', 1)
                ->first();

            if ($presupuesto) {
                $total_piezas = count($odontograma);
                $piezas_estado_1 = 0;

                foreach ($odontograma as $pieza) {
                    if ($pieza->estado == 1) {
                        $piezas_estado_1++;
                    }
                }

                // Si todas las piezas están en estado 1, cerrar el presupuesto
                if ($total_piezas > 0 && $piezas_estado_1 == $total_piezas) {
                    $presupuesto->estado = 0;
                    $presupuesto->save();
                }
            }

            $dc = new DentalController;
            $odontograma_paciente_historial = $dc->dame_odontograma_paciente_historial($request->id_paciente);
            $odontograma_paciente_vista = view('atencion_odontologica.generales.odontograma_adulto',['odontograma_historial' => $odontograma_paciente_historial])->render();

            $v = view('atencion_odontologica.include.procedimientos_implantes_todos', [
                'examenes' => $examenes,
                'tratamientos_implantologia' => $tratamientos_implantologia,
                'materiales_implantologia' => $materiales_implantologia,
            ])->render();

            return [
                'mensaje' => 'OK',
                'v' => $v,
                'examenes' => $examenes,
                'odontograma' => $odontograma,
                'odontograma_paciente_vista' => $odontograma_paciente_vista
            ];
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function guardar_pieza_dental_tto_period(Request $request)
    {
        try {
            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
            if($request->piezas){
                foreach($request->piezas as $pieza){
                    $tto = new ProcedimientosPeriodoncia;
                    $tto->id_paciente = $request->id_paciente;
                    $tto->id_profesional = $profesional->id;
                    $tto->id_ficha_atencion = $request->id_ficha_atencion;
                    $tto->id_especialidad = $profesional->id_especialidad;
                    $tto->numero_pieza = $pieza;
                    $tto->id_procedimiento = $request->tto;
                    $tto->fecha = Carbon::now()->format('Y-m-d');
                    $tto->id_tipo_procedimiento = $request->tipo_tto;
                    $tto->tipo_procedimiento = $request->tipo_tto_text;
                    $tto->id_tipo_membrana = $request->membrana_tto;
                    $tto->membrana = $request->membrana_tto_text;
                    $tto->id_material_membrana = $request->material_membrana_tto;
                    $tto->material_membrana = $request->material_membrana_tto_text;
                    $tto->id_tipo_anestesia = $request->anestesia_tto;
                    $tto->anestesia = $request->anestesia_tto_text;
                    $tto->numero_tubos = $request->numero_tubos;
                    $tto->id_tecnica_anestesia = $request->tecnica_anestesia;
                    $tto->tecnica_anestesia = $request->tecnica_anestesia_text;
                    $tto->id_anestesico = $request->anestesico_tto;
                    $tto->anestesico = $request->anestesico_tto_text;
                    $tto->id_incidentes = $request->incidente_tto;
                    $tto->incidentes = $request->incidente_tto_text;
                    $tto->id_mat_injerto_oseo = $request->material_injerto_tto;
                    $tto->material_injerto_oseo = $request->material_injerto_tto_text;
                    $tto->metodo_injerto_oseo = $request->tipo_injerto_tto;
                    $tto->cantidad_superficie_teñida = $request->cantidad_superficie_teñida;
                    $tto->cantidad_superficie_total = $request->cantidad_superficie_total;
                    $tto->indice_oleary = $request->indice_oleary;
                    $tto->id_suturas = $request->suturas_tto;
                    $tto->suturas = $request->suturas_tto_text;
                    $tto->grosor_nylon = intval($request->grosor_nylon);
                    $tto->tiempo_quirurgico = $request->tiempo_quirurgico_tto;
                    $tto->observaciones = $request->observaciones;
                    $tto->estado = 1;
                    $tto->save();

                    // Actualiza el estado en la tabla OdontogramaPaciente
                    $piezaModelo = OdontogramaPaciente::where('pieza', $pieza)
                        ->get();
                    if ($piezaModelo) {
                        foreach ($piezaModelo as $pieza) {
                            $pieza->estado = 1;
                            $pieza->save();
                        }
                    }
                }
            }else{
                $tto = new ProcedimientosPeriodoncia;
                $tto->id_paciente = $request->id_paciente;
                $tto->id_profesional = $profesional->id;
                $tto->id_ficha_atencion = $request->id_ficha_atencion;
                $tto->id_especialidad = $profesional->id_especialidad;
                $tto->numero_pieza = $request->numero_pieza;
                $tto->id_procedimiento = $request->tto;
                $tto->fecha = Carbon::now()->format('Y-m-d');
                $tto->id_tipo_procedimiento = $request->tipo_tto;
                $tto->tipo_procedimiento = $request->tipo_tto_text;
                $tto->id_tipo_membrana = $request->membrana_tto;
                $tto->membrana = $request->membrana_tto_text;
                $tto->id_material_membrana = $request->material_membrana_tto;
                $tto->material_membrana = $request->material_membrana_tto_text;
                $tto->id_tipo_anestesia = $request->anestesia_tto;
                $tto->anestesia = $request->anestesia_tto_text;
                $tto->numero_tubos = $request->numero_tubos;
                $tto->id_tecnica_anestesia = $request->tecnica_anestesia;
                $tto->tecnica_anestesia = $request->tecnica_anestesia_text;
                $tto->id_anestesico = $request->anestesico_tto;
                $tto->anestesico = $request->anestesico_tto_text;
                $tto->id_incidentes = $request->incidente_tto;
                $tto->incidentes = $request->incidente_tto_text;
                $tto->id_mat_injerto_oseo = $request->material_injerto_tto;
                $tto->material_injerto_oseo = $request->material_injerto_tto_text;
                $tto->metodo_injerto_oseo = $request->tipo_injerto_tto;
                $tto->cantidad_superficie_teñida = $request->cantidad_superficie_teñida;
                $tto->cantidad_superficie_total = $request->cantidad_superficie_total;
                $tto->indice_oleary = $request->indice_oleary;
                $tto->id_suturas = $request->suturas_tto;
                $tto->suturas = $request->suturas_tto_text;
                $tto->grosor_nylon = intval($request->grosor_nylon);
                $tto->tiempo_quirurgico = $request->tiempo_quirurgico_tto;
                $tto->observaciones = $request->observaciones; 
                $tto->estado = 1;
                $tto->save();

                // Actualiza el estado en la tabla OdontogramaPaciente
                $piezaModelo = OdontogramaPaciente::where('id', $request->tto)
                    ->first();
                if ($piezaModelo) {
                    $piezaModelo->estado = 1;
                    $piezaModelo->save();
                }
            }

            // Datos que se devuelven una vez guardado todo
            $examenes = $this->dameProcedimientosPeriodoncia($request->id_paciente, $profesional->id, $request->id_ficha_atencion);
            $tratamientos_implantologia = TratamientosImplantologia::orderBy('descripcion','asc')->get();
            $materiales_implantologia = MaterialesImplantologia::orderBy('descripcion','asc')->get();

            $odontograma = $this->dameOdontogramaPaciente($request->id_paciente, $request->id_ficha_atencion, $request->id_lugar_atencion, $profesional->id_tipo_especialidad);

            // buscamos el presupuesto dental
            $presupuesto = PresupuestosDental::where('id_paciente', $request->id_paciente)
                ->where('id_ficha_atencion', $request->id_ficha_atencion)
                ->where('estado', 1)
                ->first();

            if ($presupuesto) {
                $total_piezas = count($odontograma);
                $piezas_estado_1 = 0;

                foreach ($odontograma as $pieza) {
                    if ($pieza->estado == 1) {
                        $piezas_estado_1++;
                    }
                }

                // Si todas las piezas están en estado 1, cerrar el presupuesto
                if ($total_piezas > 0 && $piezas_estado_1 == $total_piezas) {
                    $presupuesto->estado = 0;
                    $presupuesto->save();
                }
            }

            $dc = new DentalController;
            $odontograma_paciente_historial = $dc->dame_odontograma_paciente_historial($request->id_paciente);
            $odontograma_paciente_vista = view('atencion_odontologica.generales.odontograma_adulto',['odontograma_historial' => $odontograma_paciente_historial])->render();

            $v = view('atencion_odontologica.include.procedimientos_periodoncia_todos', [
                'examenes' => $examenes,
                'tratamientos_implantologia' => $tratamientos_implantologia,
                'materiales_implantologia' => $materiales_implantologia,
            ])->render();

            return [
                'mensaje' => 'OK',
                'v' => $v,
                'examenes' => $examenes,
                'odontograma' => $odontograma,
                'odontograma_paciente_vista' => $odontograma_paciente_vista
            ];
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function guardar_pieza_dental_tto_impl_rehab(Request $request){
        try {
            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();


            if($request->piezas){
                foreach($request->piezas as $pieza){
                    $tto = new ProcedimientosImplantesRehab;
                    $tto->id_paciente = $request->id_paciente;
                    $tto->id_profesional = $profesional->id;
                    $tto->id_ficha_atencion = $request->id_ficha_atencion;
                    $tto->id_especialidad = $profesional->id_especialidad;
                    $tto->numero_pieza = $pieza;
                    $tto->id_procedimiento = $request->tto;
                    $tto->fecha = Carbon::now()->format('Y-m-d');
                    $tto->id_tipo_procedimiento = $request->tipo_tto;
                    $tto->tipo_procedimiento = $request->tipo_tto_text;

                    // Anestesia
                    $tto->id_tipo_anestesia = $request->anestesia_tto;
                    $tto->anestesia = $request->anestesia_tto_text;
                    $tto->numero_tubos = $request->numero_tubos;
                    $tto->id_tecnica_anestesia = $request->tecnica_anestesia;
                    $tto->tecnica_anestesia = $request->tecnica_anestesia_text;
                    $tto->id_anestesico = $request->anestesico_tto;
                    $tto->anestesico = $request->anestesico_tto_text;

                    // Incidente
                    $tto->id_incidentes = $request->incidente_tto;
                    $tto->incidentes = $request->incidente_tto_text;

                    // Restauración y anclaje
                    $tto->id_material_rest = $request->material_rest;
                    $tto->material_rest = $request->material_rest_text;
                    $tto->id_tipo_anclaje = $request->tipo_anclaje;
                    $tto->tipo_anclaje = $request->tipo_anclaje_text;

                    $tto->estado = 1;
                    $tto->save();

                    // Actualiza el estado en la tabla OdontogramaPaciente
                    $piezaModelo = OdontogramaPaciente::where('pieza', $pieza)
                        ->get();
                    if ($piezaModelo) {
                        foreach ($piezaModelo as $pieza) {
                            $pieza->estado = 1;
                            $pieza->save();
                        }
                    }
                }
            }else{
                $tto = new ProcedimientosImplantesRehab;
                $tto->id_paciente = $request->id_paciente;
                $tto->id_profesional = $profesional->id;
                $tto->id_ficha_atencion = $request->id_ficha_atencion;
                $tto->id_especialidad = $profesional->id_especialidad;
                $tto->numero_pieza = $request->numero_pieza;
                $tto->id_procedimiento = $request->tto;
                $tto->fecha = Carbon::now()->format('Y-m-d');
                $tto->id_tipo_procedimiento = $request->tipo_tto;
                $tto->tipo_procedimiento = $request->tipo_tto_text;

                // Anestesia
                $tto->id_tipo_anestesia = $request->anestesia_tto;
                $tto->anestesia = $request->anestesia_tto_text;
                $tto->numero_tubos = $request->numero_tubos;
                $tto->id_tecnica_anestesia = $request->tecnica_anestesia;
                $tto->tecnica_anestesia = $request->tecnica_anestesia_text;
                $tto->id_anestesico = $request->anestesico_tto;
                $tto->anestesico = $request->anestesico_tto_text;

                // Incidente
                $tto->id_incidentes = $request->incidente_tto;
                $tto->incidentes = $request->incidente_tto_text;

                // Restauración y anclaje
                $tto->id_material_rest = $request->material_rest;
                $tto->material_rest = $request->material_rest_text;
                $tto->id_tipo_anclaje = $request->tipo_anclaje;
                $tto->tipo_anclaje = $request->tipo_anclaje_text;

                $tto->estado = 1;
                $tto->save();

                // Actualiza el estado en la tabla OdontogramaPaciente
                $piezaModelo = OdontogramaPaciente::where('id', $request->tto)
                    ->first();
                if ($piezaModelo) {
                    $piezaModelo->estado = 1;
                    $piezaModelo->save();
                }
            }




            // Datos que se devuelven una vez guardado todo
            $examenes = $this->dameProcedimientosImplantesRehab($request->id_paciente, $profesional->id, $request->id_ficha_atencion);

            $tratamientos_implantologia = TratamientosImplantologia::orderBy('descripcion','asc')->get();
            $materiales_implantologia = MaterialesImplantologia::orderBy('descripcion','asc')->get();

            $odontograma = $this->dameOdontogramaPaciente($request->id_paciente, $request->id_ficha_atencion, $request->id_lugar_atencion, $profesional->id_tipo_especialidad);

            // buscamos el presupuesto dental
            $presupuesto = PresupuestosDental::where('id_paciente', $request->id_paciente)
                ->where('id_ficha_atencion', $request->id_ficha_atencion)
                ->where('estado', 1)
                ->first();

            if ($presupuesto) {
                $total_piezas = count($odontograma);
                $piezas_estado_1 = 0;

                foreach ($odontograma as $pieza) {
                    if ($pieza->estado == 1) {
                        $piezas_estado_1++;
                    }
                }

                // Si todas las piezas están en estado 1, cerrar el presupuesto
                if ($total_piezas > 0 && $piezas_estado_1 == $total_piezas) {
                    $presupuesto->estado = 0;
                    $presupuesto->save();
                }
            }

            $dc = new DentalController;
            $odontograma_paciente_historial = $dc->dame_odontograma_paciente_historial($request->id_paciente);
            $odontograma_paciente_vista = view('atencion_odontologica.generales.odontograma_adulto',['odontograma_historial' => $odontograma_paciente_historial])->render();

            $v = view('atencion_odontologica.include.procedimientos_implantes_rehab_todos', [
                'examenes' => $examenes,
                'tratamientos_implantologia' => $tratamientos_implantologia,
                'materiales_implantologia' => $materiales_implantologia,
            ])->render();

            return [
                'mensaje' => 'OK',
                'v' => $v,
                'examenes' => $examenes,
                'odontograma' => $odontograma,
                'odontograma_paciente_vista' => $odontograma_paciente_vista
            ];
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function buscar_empresa(Request $req){
        try {
            $empresa = Empresas::where('rut_empresa', $req->rut)->first();

            if(!$empresa){
                return ['estado' => 0, 'mensaje' => 'Empresa no encontrada. Completar formulario.'];
            }else{
                $empresa->region = Region::where('id', $empresa->id_region)->first();
                $empresa->ciudad = Ciudad::where('id', $empresa->id_comuna)->first();

                $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();

                $todos_convenios = EmpresasConvenios::select('empresas_convenios.*','tipoproducto_convenios.descripcion')
                    ->join('tipoproducto_convenios','empresas_convenios.id_convenio','tipoproducto_convenios.id')
                    ->where('empresas_convenios.id_profesional',$profesional->id)
                    ->where('empresas_convenios.id_empresa', $empresa->id)
                    ->get();


                return ['estado' => 1, 'mensaje' => 'Empresa encontrada', 'empresa' => $empresa, 'todos_convenios' => $todos_convenios];
            }
        } catch (\Exception $e) {
            //throw $th;
            return ['estado' => 0, 'mensaje' => $e->getMessage()];
        }

    }

    public function registrar_convenio_profesional_empresa(Request $req){
        try {
            $id_empresa = $req->id_empresa;
            $empresa = EmpresasConvenios::where('id', $id_empresa)->first();
            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
            $empresa->nombre_convenio = $req->nombre_convenio;
            $empresa->fecha_inicio = $req->fecha_inicial_pago_convenio;
            $empresa->fecha_termino = $req->fecha_final_pago_convenio;
            $empresa->porcentaje = $req->porcentaje_dcto;
            $empresa->estado_convenio = 1;
            $empresa->id_lugar_atencion = $req->id_lugar_atencion;
            $empresa->id_profesional = $profesional->id;
            $empresa->id_tipo_convenio = json_encode($req->tipo_convenio);
            $empresa->observaciones = $req->observaciones;
            if($empresa->save()){
                $convenios = $this->dame_convenios_profesional($profesional->id);
                return ['estado' => 1, 'mensaje' => 'Convenio registrado correctamente', 'convenios' => $convenios];
            }else{
                return ['estado' => 0, 'mensaje' => 'Error al registrar convenio'];
            }
        } catch (\Exception $e) {
            //throw $th;
            return ['estado' => 0, 'mensaje' => $e->getMessage()];
        }

    }

    public function guardar_pieza_dental_pfu(Request $req){
        try {

            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
            $pieza = new PiezasDentalCoronaProtesis;
            $pieza->id_paciente = $req->id_paciente;
            $pieza->id_ficha_atencion = $req->id_ficha_atencion;
            $pieza->id_profesional = $profesional->id;
            $pieza->id_especialidad = $profesional->id_especialidad;
            $pieza->numero_pieza = $req->n_pieza_pfu;
            $pieza->id_movil = $req->movil_pfu;
            $pieza->movil = $req->movil_pfu_text;
            $pieza->fecha = Carbon::now()->format('Y-m-d');
            $pieza->id_prueba_ajuste = $req->prueba_ajuste_cor_pfu;
            $pieza->prueba_ajuste = $req->prueba_ajuste_cor_pfu_text;
            $pieza->id_tornillo = $req->tornillo_cor_pfu;
            $pieza->tornillo = $req->tornillo_cor_pfu_text;
            $pieza->id_pulido = $req->pulido_ajuste_pfu;
            $pieza->pulido = $req->pulido_ajuste_pfu_text;
            $pieza->observaciones = $req->aprec_pfu;
            // en la bd se guarda como pfu por defecto
            if($pieza->save()){
                $seccion = 'pfu';
                $examenes = $this->dameProcedimientosCoronaProtesis($req->id_paciente, $profesional->id, $seccion);
                $v = view('atencion_odontologica.include.procedimientos_corona_protesis_todos',['examenes' => $examenes, 'seccion' =>$seccion])->render();
                return ['mensaje' => 'OK', 'v' => $v,'examenes' => $examenes];
            }
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }
    }

    public function guardar_pieza_dental_pfp(Request $req){
        try {
            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
            $pieza = new PiezasDentalCoronaProtesis;
            $pieza->id_paciente = $req->id_paciente;
            $pieza->id_ficha_atencion = $req->id_ficha_atencion;
            $pieza->id_profesional = $profesional->id;
            $pieza->id_especialidad = $profesional->id_especialidad;
            $pieza->numero_pieza = $req->n_pieza_pfp;
            $pieza->id_tipo_anclaje = $req->tipo_anclaje_pfp;
            $pieza->tipo_anclaje = $req->tipo_anclaje_pfp_text;
            $pieza->fecha = Carbon::now()->format('Y-m-d');
            $pieza->id_toma_medida = $req->corona_toma_imp_pfp;
            $pieza->nombre_paciente = $req->nombre_paciente_pfp;
            $pieza->nombre_laboratorio = $req->lab_pfp;
            $pieza->numero_orden = $req->n_orden_pfp;
            $pieza->id_prueba_ajuste = $req->prueba_ajuste_cor_pfp;
            $pieza->prueba_ajuste = $req->prueba_ajuste_cor_pfp_text;
            $pieza->id_pulido = $req->pulido_ajuste_pfp;
            $pieza->pulido = $req->pulido_ajuste_pfp_text;
            $pieza->observaciones = $req->aprec_pfp;
            $pieza->seccion = "pfp";

            if($pieza->save()){
                $examenes = $this->dameProcedimientosCoronaProtesis($req->id_paciente, $profesional->id,'pfp');
                $v = view('atencion_odontologica.include.procedimientos_corona_protesis_todos',['examenes' => $examenes,'seccion' => 'pfp'])->render();
                return ['mensaje' => 'OK', 'v' => $v,'examenes' => $examenes];
            }
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }
    }

    public function dameProcedimientosCoronaProtesis($id_paciente, $id_profesional, $seccion = null){
        if($seccion == null){
            $procedimientos = PiezasDentalCoronaProtesis::where('id_paciente',$id_paciente)->where('id_profesional', $id_profesional)->get();
        }else{
            $procedimientos = PiezasDentalCoronaProtesis::where('id_paciente',$id_paciente)->where('id_profesional', $id_profesional)->where('seccion',$seccion)->get();
        }

        return $procedimientos;
    }

    public function guardarSignosVitalesSidebar(Request $request){

        $ficha = FichaAtencion::where('id', $request->id_ficha_atencion)->first();
        if(!$ficha){
            return ['mensaje' => 'error', 'detalle' => 'Ficha de atención no encontrada'];
        }
        $ficha->temperatura = $request->temperatura;
        $ficha->pulso = $request->pulso;
        $ficha->frecuencia_reposo = $request->frec_reposo;

        if($ficha->save()){
            return ['mensaje' => 'ok', 'detalle' => 'Signos vitales guardados correctamente'];
        }else{
            return ['mensaje' => 'error', 'detalle' => 'Error al guardar los signos vitales'];
        }
    }

    public function guardar_planificacion_nutri(Request $request)
    {
        // Validar si existe la ficha
        $ficha = FichaAtencion::find($request->id_ficha_atencion);

        if (!$ficha) {
            return response()->json([
                'mensaje' => 'error',
                'detalle' => 'Ficha de atención no encontrada'
            ], 404);
        }

         // buscamos el ultimo plan de tratamiento nutricional del profesional y paciente
        $ultimoPlan = PlanTratamientoOtrosProfesionales::where('id_paciente', $ficha->id_paciente)
            ->where('id_profesional', $ficha->id_profesional)
            ->where('estado', 1) // solo activos
            ->orderBy('id', 'desc')
            ->first();

        if($ultimoPlan){
            $plan = $ultimoPlan;
        }else{
            // Crear nuevo registro de planificación nutricional
            $plan = new PlanTratamientoOtrosProfesionales();
        }


        $plan->id_ficha_atencion = $request->id_ficha_atencion;
        $plan->id_profesional = $ficha->id_profesional;
        $plan->id_paciente = $ficha->id_paciente;
        $plan->id_lugar_atencion = $ficha->id_lugar_atencion;
        $plan->fecha = Carbon::now()->format('Y-m-d');
        $plan->diagnostico = $request->diagnostico;
        $plan->tratamiento = json_encode($request->tratamiento);
        $plan->numero_sesiones = $request->numero_sesiones;
        $plan->sesion_actual = $ultimoPlan ? $ultimoPlan->sesion_actual + 1 : 1; // Incrementar la sesión actual
        $plan->tipo_sesiones = $request->tipo_sesiones;
        $plan->objetivos = $request->objetivos;
        $plan->peso_inicial = $request->peso_inicial;
        // if($plan->numero_sesiones < $plan->sesion_actual){
        //     $plan->estado = 0; // Finalizado
        // }else{
        //     $plan->estado = 1; // Activo
        // }
        if ($plan->save()) {
            return response()->json([
                'mensaje' => 'ok',
                'detalle' => 'Planificación nutricional guardada correctamente',
                'plan_id' => $plan->id
            ]);
        } else {
            return response()->json([
                'mensaje' => 'error',
                'detalle' => 'Error al guardar la planificación nutricional'
            ], 500);
        }
    }

    public function continuarTratamientoNutricional(Request $request){

        $plan = PlanTratamientoOtrosProfesionales::find($request->id_plan);
        $plan->numero_sesiones = intval($request->nuevas_sesiones) + $plan->numero_sesiones;

        if($plan->save()){
            return response()->json([
                'mensaje' => 'success',
                'detalle' => 'Sesiones agregadas al plan'
            ]);
        }else{
             return response()->json([
                'mensaje' => 'error',
                'detalle' => 'Ficha de atención no encontrada'
            ], 404);
        }


    }

    public function damePlanTratamiento(Request $request){

        // Validar si existe la ficha
        $ficha = FichaAtencion::find($request->id_ficha_atencion);

        if (!$ficha) {
            return response()->json([
                'mensaje' => 'error',
                'detalle' => 'Ficha de atención no encontrada'
            ], 404);
        }
        if($request->hora_pedida == 1){
            // Obtener el penúltimo plan (ordenado por ID descendente, luego saltamos uno con skip(1))
            $plan = PlanTratamientoOtrosProfesionales::where('id_paciente', $request->id_paciente)
            ->where('id_profesional', $request->id_profesional)
            ->where('estado', 1)
            ->orderBy('id', 'desc')
            ->skip(1)
            ->first();
        }else{
            // Obtener el plan de tratamiento nutricional
            $plan = PlanTratamientoOtrosProfesionales::where('id_paciente', $request->id_paciente)
            ->where('id_profesional',$request->id_profesional)
            ->Where('estado',1)
            ->first();
        }


        if ($plan) {
            return response()->json([
                'mensaje' => 'ok',
                'registro' => $plan
            ]);
        } else {
            return response()->json([
                'mensaje' => 'error',
                'detalle' => 'Plan de tratamiento nutricional no iniciado'
            ], 200);
        }
    }


    public function guardarEvaluacionNutricional(Request $request)
    {

        // $request->validate([
        //     'id_ficha_atencion' => 'required|exists:fichas_atenciones,id',
        //     'id_profesional' => 'required|exists:profesionales,id',
        //     'id_lugar_atencion' => 'required|exists:lugares_atencion,id',
        //     'id_paciente' => 'required|exists:pacientes,id',
        //     'datos_nutri' => 'required|array',
        // ]);
        // preguntamos si existe la atención nutricional
        $atencionExistente = AtencionProfesion::where('id_ficha_atencion', $request->id_ficha_atencion)
            ->where('id_profesional', $request->id_profesional)
            ->where('id_paciente', $request->id_paciente)
            ->first();

        if ($atencionExistente) {
            $atencion = $atencionExistente;
        }else{
            $atencion = new AtencionProfesion();
        }

        // buscamos el plan de tratamiento nutricional activo
        $plan_tratamiento = PlanTratamientoOtrosProfesionales::where('id_profesional', $request->id_profesional)
            ->where('id_paciente', $request->id_paciente)
            ->where('estado', 1)
            ->first();

        $atencion->id_ficha_atencion = $request->id_ficha_atencion;
        $atencion->id_profesional = $request->id_profesional;
        $atencion->id_lugar_atencion = $request->id_lugar_atencion;
        $atencion->id_paciente = $request->id_paciente;
        $atencion->fecha = Carbon::now()->format('Y-m-d');
        $atencion->datos_nutri = $request->datos_nutri;
        $atencion->estado = 1;
        $atencion->observaciones = $request->observaciones ?? null;

        $atencion->id_plan_tratamiento = $plan_tratamiento ? $plan_tratamiento->id : null;
        $atencion->save();

        if ($request->filled('archivos_adjuntos') && is_array($request->archivos_adjuntos)) {
            foreach ($request->archivos_adjuntos as $archivo) {
                $rutaTemporal = 'public/archivo/temp/' . $archivo;
                $rutaDestino = 'public/archivo/atenciones/' . $atencion->id . '/';

                if (Storage::exists($rutaTemporal)) {
                    Storage::makeDirectory($rutaDestino); // Asegura que la carpeta destino exista
                    Storage::move($rutaTemporal, $rutaDestino . $archivo);
                }
            }
        }


        return response()->json([
            'mensaje' => 'ok',
            'detalle' => 'Evaluación guardada correctamente',
            'id' => $atencion->id
        ]);
    }

    public function guardarControlNutricional(Request $request){

        $controlExistente = ControlNutricion::where('id_ficha_atencion', $request->id_ficha_atencion)
            ->where('id_profesional', $request->id_profesional)
            ->where('id_paciente', $request->id_paciente)
            ->first();

        if ($controlExistente) {
            $control = $controlExistente;
        }else{
            $control = new ControlNutricion();
        }

        $control->id_ficha_atencion = $request->id_ficha_atencion;
        $control->id_profesional = $request->id_profesional;
        $control->id_lugar_atencion = $request->id_lugar_atencion;
        $control->id_paciente = $request->id_paciente;
        $control->fecha = Carbon::now()->format('Y-m-d');
        $control->datos_control = $request->datos_control;
        $control->objetivo_logrado = $request->objetivo_logrado;
        $control->peso_actual = $request->peso_actual;
        $control->estado = 1;
        $control->observaciones = $request->observaciones ?? null;

        // actualizamos el numero de sesiones en la atencion nutricional
        $plan_tratamiento = PlanTratamientoOtrosProfesionales::where('id_profesional', $request->id_profesional)
            ->where('id_paciente', $request->id_paciente)
            ->where('id_lugar_atencion', $request->id_lugar_atencion)
            ->where('estado', 1)
            ->first();

        // if($plan_tratamiento->numero_sesiones == $plan_tratamiento->sesion_actual){
        //     $plan_tratamiento->estado = 0; // Finalizado
        // }else{
        //     $plan_tratamiento->estado = 1; // Activo
        // }

        $control->id_plan_tratamiento = $plan_tratamiento ? $plan_tratamiento->id : null;

        $control->save();

        return response()->json([
            'mensaje' => 'ok',
            'detalle' => 'Control guardado correctamente',
            'id' => $control->id,
            'plan_tratamiento' => $plan_tratamiento ? $plan_tratamiento->id : null
        ]);
    }

    public function dameHistorialControlNutricional(Request $request)
    {
        $controles = ControlNutricion::where('id_paciente', $request->id_paciente)
            // ->where('id_profesional', $request->id_profesional)
            // ->where('id_lugar_atencion', $request->id_lugar_atencion)
            ->where('estado', 1)
            ->orderBy('id', 'asc')
            ->get()
            ->groupBy('id_plan_tratamiento'); // Agrupar aquí

        $filtro = [];
        if(!empty($request->id_paciente)){
            $filtro[] = ['id_paciente', $request->id_paciente];
        }

        $registros = ControlObesidad::where($filtro)->get();
        $tieneObesidad = $registros->count() > 0 ? 1 : 0;

        // Si quieres traer todos los planes asociados al paciente
        $planes = PlanTratamientoOtrosProfesionales::select('plan_tratamiento_otros_profesionales.*', 'profesionales.nombre as profesional_nombre', 'profesionales.apellido_uno as profesional_apellido')
            ->where('id_paciente', $request->id_paciente)
            // ->where('id_profesional', $request->id_profesional)
            // ->where('id_lugar_atencion', $request->id_lugar_atencion)
            ->join('profesionales', 'plan_tratamiento_otros_profesionales.id_profesional', '=', 'profesionales.id')
            ->get();

        if ($controles->isEmpty()) {
            return response()->json([
                'mensaje' => 'error',
                'detalle' => 'No se encontraron controles nutricionales para este paciente'
            ], 404);
        } else {
            return response()->json([
                'mensaje' => 'ok',
                'controles_agrupados' => $controles,
                'planes' => $planes,
                'tiene_obesidad' => $tieneObesidad,
                'registros_obesidad' => $registros
            ]);
        }
    }

    public function dameHistorialControlHipertension(Request $request)
    {
        $controles = Hipertension::where('id_paciente', $request->id_paciente)->get();

        if ($controles->isEmpty()) {
            return response()->json([
                'mensaje' => 'error',
                'detalle' => 'No se encontraron controles de hipertensión para este paciente'
            ], 404);
        } else {
            return response()->json([
                'mensaje' => 'ok',
                'controles' => $controles
            ]);
        }
    }

    public function guardarPresionArterialSidebar(Request $request){
        $ficha = FichaAtencion::where('id', $request->id_ficha_atencion)->first();

        if(!$ficha){
            return ['mensaje' => 'error', 'detalle' => 'Ficha de atención no encontrada'];
        }

        $ficha->presion_bd = $request->presion_bd;
        $ficha->presion_bi = $request->presion_bi;
        $ficha->presion_de_pie = $request->presion_pie;
        $ficha->presion_sentado = $request->presion_sentado;

        if($ficha->save()){
            return ['mensaje' => 'ok', 'detalle' => 'Presión arterial guardada correctamente','ficha' => $ficha];
        }else{
            return ['mensaje' => 'error', 'detalle' => 'Error al guardar la presión arterial'];
        }
    }

    public function guardarComunicacionConcienciaSidebar(Request $request){
        $ficha = FichaAtencion::where('id', $request->id_ficha_atencion)->first();

        if(!$ficha){
            return ['mensaje' => 'error', 'detalle' => 'Ficha de atención no encontrada'];
        }
return $ficha;
        $ficha->ct_lenguaje = $request->lenguaje;
        $ficha->ct_traslado = $request->traslado;
        $ficha->ct_estado_conciencia = $request->conciencia;

        if($ficha->save()){
            return ['mensaje' => 'ok', 'detalle' => 'Comunicación y conciencia guardada correctamente','ficha' => $ficha];
        }else{
            return ['mensaje' => 'error', 'detalle' => 'Error al guardar la comunicación y conciencia'];
        }
    }

    public function dameControlNutricional(Request $request){
        // aca preguntamos si existe el control nutricional en la ficha actual
        $control = ControlNutricion::where('id_ficha_atencion', $request->id_ficha_atencion)
            ->first();
        if ($control) {
            return response()->json([
                'mensaje' => 'ok',
                'registro' => $control
            ]);
        } else {
            // ultimo control nutricional no encontrado
            $plan = PlanTratamientoOtrosProfesionales::where('id_paciente', $request->id_paciente)
                ->where('id_profesional', $request->id_profesional)
                ->where('estado', 1)
                ->first();
            // buscamos el ultimo control nutricional activo entre el profesional y el paciente y que este activo
            $control = ControlNutricion::where('id_paciente', $request->id_paciente)
                ->where('id_profesional', $request->id_profesional)
                ->where('estado', 1)
                ->orderBy('id', 'desc')
                ->first();
            return response()->json([
                'mensaje' => 'error',
                'detalle' => 'Control nutricional no encontrado',
                'num_sesion' => $plan ? $plan->sesion_actual : 0,
                'peso_inicial' => $plan ? $plan->peso_inicial : 0,
                'plan' => $plan
            ]);
        }
    }

   public function dameEvaluacionNutricional(Request $request)
    {
        $ficha = FichaAtencion::find($request->id_ficha_atencion);

        if (!$ficha) {
            return response()->json([
                'mensaje' => 'error',
                'detalle' => 'Ficha de atención no encontrada'
            ], 404);
        }

        $evaluaciones = AtencionProfesion::where('id_paciente', $request->id_paciente)
            ->where('id_profesional', $request->id_profesional)
            ->where('estado', 1)
            ->orderBy('created_at', 'desc')
            ->get();

        if ($evaluaciones->isEmpty()) {
            return response()->json([
                'mensaje' => 'error',
                'detalle' => 'Evaluación nutricional no iniciada'
            ], 200);
        }

        $datos_unificados = [];
        $imagenes_urls = [];

        foreach ($evaluaciones as $evaluacion) {
            $datos = $evaluacion->datos_nutri;

            if (!$datos || !is_array($datos)) continue;

            // Unificamos datos
            foreach ($datos as $campo => $valor) {
                if (is_array($valor)) {
                    if (!isset($datos_unificados[$campo])) {
                        $datos_unificados[$campo] = [];
                    }
                    $datos_unificados[$campo] = array_unique(array_merge($datos_unificados[$campo], $valor));
                } else {
                    if (!isset($datos_unificados[$campo])) {
                        $datos_unificados[$campo] = $valor;
                    } else {
                        if ($valor !== null && $valor !== '' && $datos_unificados[$campo] !== $valor) {
                            $datos_unificados[$campo] = $valor;
                        }
                    }
                }
            }

            // Buscar archivos físicos asociados a esta evaluación
            $rutaArchivos = 'public/archivo/atenciones/' . $evaluacion->id;
            if (Storage::exists($rutaArchivos)) {
                $archivos = Storage::files($rutaArchivos);
                foreach ($archivos as $archivo) {
                    $imagenes_urls[] = Storage::url($archivo); // Convierte a URL pública
                }
            }
        }

        return response()->json([
            'mensaje' => 'ok',
            'registro' => $datos_unificados,
            'imagenes' => $imagenes_urls
        ]);
    }

    public function enviarMailInsumosPresupuesto(Request $request){
        try {

            $ficha = FichaAtencion::where('id', $request->idFichaAtencion)->first();
            if(!$ficha){
                return ['mensaje' => 'error', 'detalle' => 'Ficha de atención no encontrada'];
            }

            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
            $paciente = Paciente::where('id', $ficha->id_paciente)->first();

            $fc = new ficha_atencionController;
            $insumos = $fc->dame_insumos_tratamiento($paciente->id, $ficha->id);

            $pdf = Pdf::loadView('PDF.pdf_presupuesto_insumos', [
                'ficha' => $ficha,
                'profesional' => $profesional,
                'insumos' => $insumos
            ]);
            $pdfContent = $pdf->output();

            // Obtener destinatarios del request
            $destinatarios = $request->input('destinatarios', []);

            // Agregar el correo libre si existe y es válido
            if ($request->filled('correoLibre')) {
                $correoLibre = $request->input('correoLibre');
                if (filter_var($correoLibre, FILTER_VALIDATE_EMAIL)) {
                    $destinatarios[] = $correoLibre;
                }
            }

            // Eliminar duplicados y vacíos
            $destinatarios = array_unique(array_filter($destinatarios));

            // Enviar correo
            Mail::to($destinatarios)->send(
                new PresupuestoInsumosMail($ficha, $profesional, $insumos, $pdfContent)
            );

            return ['mensaje' => 'ok', 'detalle' => 'Correo enviado correctamente'];
        } catch (\Exception $e) {
            //throw $th;
            return ['mensaje' => 'error', 'detalle' => 'Error al enviar el correo: ' . $e->getMessage()];
        }

    }


    public function guardarEstadoNutricionalSidebar(Request $request){
        $ficha = FichaAtencion::where('id', $request->id_ficha_atencion)->first();
        if(!$ficha){
            return ['mensaje' => 'error', 'detalle' => 'Ficha de atención no encontrada'];
        }
        $ficha->estado_nutricional = $request->estado_nutri;
        $ficha->peso = $request->peso;
        $ficha->talla = $request->talla;
        $ficha->imc = $request->imc;

        if($ficha->save()){
            return ['mensaje' => 'ok', 'detalle' => 'Estado nutricional guardado correctamente'];
        }else{
            return ['mensaje' => 'error', 'detalle' => 'Error al guardar el estado nutricional'];
        }
    }


    public function guardar_grupo_dental_post_impl(Request $req){
        try {
            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
            $grupo_dental = new ProcedimientosGruposPostImplantes;
            $grupo_dental->id_paciente = $req->id_paciente;

            $grupo_dental->id_profesional = $profesional->id;
            $grupo_dental->id_ficha_atencion = $req->id_ficha_atencion;
            $grupo_dental->id_especialidad = $profesional->id_especialidad;
            $grupo_dental->fecha = Carbon::now()->format('Y-m-d');
            $grupo_dental->grupo_piezas = json_encode($req->piezas);
            $grupo_dental->id_estabilidad = 1; // por defecto, se guarda como estable
            $grupo_dental->estabilidad = 'Estable';
            $grupo_dental->id_posicion = $req->posicion;
            $grupo_dental->posicion = $req->posicion_text ? $req->posicion_text : '';
            $grupo_dental->altura = $req->altura;
            $grupo_dental->dpa = $req->dpa;
            $grupo_dental->id_desgaste = $req->desgaste;
            $grupo_dental->desgaste = $req->desgaste_text;
            $grupo_dental->id_estado_encia = $req->estado_encia;
            $grupo_dental->estado_encia = $req->estado_encia_text;
            $grupo_dental->id_hueso_circundante = $req->hueso_circundante;
            $grupo_dental->hueso_circundante = $req->hueso_circundante_text;
            $grupo_dental->id_eva_cp = $req->ev_corona_prot;
            $grupo_dental->eva_cp = $req->ev_corona_prot_text;
            $grupo_dental->observaciones = $req->observaciones;
            if($grupo_dental->save()){
                $examenes = $this->dameProcedimientosGruposImplantes($req->id_paciente, $profesional->id,'post');
                $v = view('atencion_odontologica.include.procedimientos_grupos_post_impl_todos',['examenes' => $examenes])->render();
                return ['mensaje' => 'OK', 'v' => $v,'examenes' => $examenes];
            }
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }

    public function dameProcedimientosGruposImplantes($id_paciente, $id_profesional, $tipo = null){
        if($tipo == null){
            $procedimientos = ProcedimientosGruposImplantes::where('id_paciente',$id_paciente)->where('id_profesional', $id_profesional)->get();
        }else{
            $procedimientos = ProcedimientosGruposPostImplantes::where('id_paciente',$id_paciente)->where('id_profesional', $id_profesional)->get();
        }

        return $procedimientos;
    }

    public function guardar_pieza_dental_post_impl(Request $request){
        try {
            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
            $existe = ProcedimientosPostImplantes::where('id_paciente',$request->id_paciente)->where('id_profesional', $profesional->id)->where('numero_pieza',$request->numero_pieza)->first();
            if($existe){
                return ['mensaje' => 'error, '.$request->numero_pieza.' ya existe en la base de datos'];
            }
            $ppi = new ProcedimientosPostImplantes;
            $ppi->id_paciente = $request->id_paciente;
            $ppi->id_profesional = $profesional->id;
            $ppi->id_ficha_atencion = $request->id_ficha_atencion;
            $ppi->id_especialidad = $profesional->id_especialidad;
            $ppi->numero_pieza = $request->numero_pieza;
            $ppi->fecha = Carbon::now()->format('Y-m-d');
            $ppi->id_movil = $request->estab_post_implante;
            $ppi->movil = $request->estab_post_implante_text;
            $ppi->id_posicion = $request->posc_post_impl;
            $ppi->posicion = $request->posc_post_impl_text;
            $ppi->id_exp_esp = $request->exp_esp_post_impl;
            $ppi->exp_esp = $request->exp_esp_post_impl_text;
            $ppi->id_sup = $request->sut_post_impl;
            $ppi->supuracion = $request->sut_post_impl_text;
            $ppi->id_est_encia = $request->est_encia_post_impl;
            $ppi->estado_encia = $request->est_encia_post_impl_text;
            $ppi->perdida_osea_marginal = $request->perd_osea_marg_post_impl;
            $ppi->observaciones = $request->obs_control_post_implante;
            $ppi->tipo = $request->tipo; // 1 = implante propio, 2 = implante ajeno
            $ppi->nombre_implantologo = $request->nombre_implantologo != null ? $request->nombre_implantologo : $profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos;

            if($ppi->save()){
                $examenes = $this->dameProcedimientosImplantes($request->id_paciente, $profesional->id,$request->id_ficha_atencion,'post');
                $piezas = OdontogramaPaciente::where('pieza', $request->numero_pieza)->where('id_paciente', $request->id_paciente)->where('id_ficha_atencion',$request->id_ficha_atencion)->get();
                if($piezas->count() > 0){
                    foreach($piezas as $pieza){
                        $pieza->estado = 1;
                        $pieza->save();
                    }
                }
                $v = view('atencion_odontologica.include.procedimientos_post_implantes_todos',['examenes' => $examenes])->render();
                return ['mensaje' => 'OK', 'v' => $v,'examenes' => $examenes];
            }else{
                return 'error';
            }
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }
    }

    public function mostrar_nuevo_grupo_post_impl(Request $req){
        $idCounter = $req->counter ? $req->counter : 0;
        $v = view('atencion_odontologica.include.grupos_dentales_post_impl',['counter' => $idCounter])->render();
        return ['mensaje' => 'OK','v' => $v];
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

    public function dameProcedimientosPeriodoncia($id_paciente, $id_profesional, $id_ficha_atencion){
        $procedimientos = ProcedimientosPeriodoncia::select('procedimientos_periodoncia.*', 'odontogramas_pacientes.tratamiento', 'odontogramas_pacientes.id as id_procedimiento','odontogramas_pacientes.id as id_odontograma')
        ->where('procedimientos_periodoncia.id_paciente',$id_paciente)
        ->where('procedimientos_periodoncia.id_profesional', $id_profesional)
        ->where('procedimientos_periodoncia.id_ficha_atencion', $id_ficha_atencion)
        ->leftjoin('odontogramas_pacientes', 'odontogramas_pacientes.id', '=', 'procedimientos_periodoncia.id_procedimiento')
        ->get();

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

    public function guardar_pieza_dental_end_dolor(Request $request){
        try {
            $dolor = new ExamenesDentalDolor;
            $dolor->derivado_por = $request->derivado_por;
            $dolor->zona_dolor = $request->zona_dolor;
            $dolor->historia_anterior = $request->historia_anterior;
            $dolor->numero_pieza = $request->pieza_numero;
            $dolor->tipo_dolor = $request->tipo_dolor;
            $dolor->intensidad = $request->intensidad;
            $dolor->modo_dolor = $request->modo_dolor;
            $dolor->localizacion = $request->loc_dolor;
            $dolor->provocacion_dolor = $request->provocacion_dolor;
            $dolor->momento_dolor = $request->cdo_duele;
            $dolor->tipo_evolucion = $request->tpo_evolucion;
            $dolor->observaciones = $request->obs_anal_dolor;
            $dolor->id_profesional = $request->id_profesional;
            $dolor->id_paciente = $request->id_paciente;
            $dolor->id_lugar_atencion = $request->id_lugar_atencion;
            $dolor->tipo_examen = 2; // examen normal
            if($dolor->save()){
                $examenes = $this->dameExamenesPiezaDentalEndDolor($request->id_paciente);
                $v = view('atencion_odontologica.include.examenes_dental_dolor_end_todos',['examenes' => $examenes])->render();
                return ['mensaje' => 'OK', 'v' => $v, 'examenes' => $examenes];
            }
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }
    }

    public function guardar_pieza_dental_odontp_dolor(Request $request){
            $dolor = new ExamenesDentalDolor;
            $dolor->derivado_por = $request->derivado_por;
            $dolor->zona_dolor = $request->zona_dolor;
            $dolor->historia_anterior = $request->historia_anterior;
            $dolor->numero_pieza = $request->numero_pieza;
            $dolor->tipo_dolor = $request->tipo_dolor;
            $dolor->intensidad = $request->intensidad;
            $dolor->modo_dolor = $request->modo_dolor;
            $dolor->localizacion = $request->loc_dolor;
            $dolor->provocacion_dolor = $request->provocacion_dolor;
            $dolor->momento_dolor = $request->cdo_duele;
            $dolor->tipo_evolucion = $request->tpo_evolucion;
            $dolor->observaciones = $request->obs_loc_dolor;
            $dolor->id_profesional = $request->id_profesional;
            $dolor->id_paciente = $request->id_paciente;
            $dolor->id_lugar_atencion = $request->id_lugar_atencion;
            $dolor->tipo_examen = 3; // examen normal
            if($dolor->save()){
                $examenes = $this->dameExamenesPiezaDentalOdontopDolor($request->id_paciente);
                $v = view('atencion_odontologica.include.examenes_dental_dolor_odontop_todos',['examenes' => $examenes])->render();
                return ['mensaje' => 'OK', 'v' => $v, 'examenes' => $examenes];
            }
    }

    public function mostrar_nueva_pieza_dental(Request $req){

        $idCounter = $req->counter;
        $responsable = User::find(Auth::user()->id);
        $v = view('atencion_odontologica.include.examenes_dental_dolor',['counter' => $idCounter])->render();
        return ['mensaje' => 'OK','v' => $v];
    }

    public function mostrar_nueva_pieza_dental_tto(Request $req){
     
        $idCounter = $req->counter ? $req->counter : 0;
        $pieza = $req->pieza;
        $responsable = User::find(Auth::user()->id);
        $profesional = Profesional::where('id_usuario',$responsable->id)->first();
        $seccion = $req->seccion;
        $insumos_tratamientos = $this->dame_insumos_tratamiento($req->id_paciente, $req->id_ficha_atencion, null);
        $v = view('atencion_odontologica.include.examenes_dental_tto',['counter' => $idCounter,'seccion' => $seccion,'pieza' => $pieza, 'insumos_tratamientos' => $insumos_tratamientos])->render();
        if($seccion == 'period'){
            $odontograma_paciente = $this->dameOdontogramaPaciente($req->id_paciente, $req->id_ficha_atencion, $req->id_lugar_atencion, $profesional->id_tipo_especialidad);
            $v = view('atencion_odontologica.include.examenes_dental_tto_period',['counter' => $idCounter,'seccion' => $seccion,'pieza' => $pieza, 'insumos_tratamientos' => $insumos_tratamientos, 'odontograma' => $odontograma_paciente])->render();
        }
        return ['mensaje' => 'OK','v' => $v, 'odontograma' => $odontograma_paciente];
    }

    public function dame_insumos_tratamiento($id_paciente,$id_ficha_atencion,$tipo = null){
        try {

            $insumos = InsumosTratamientosDental::where('id_paciente', $id_paciente)->where('id_ficha_atencion',$id_ficha_atencion)->get();
            return $insumos;
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }

    public function mostrar_nueva_pieza_dental_tto_impl(Request $req){
        // generar numero random entre el 20 y el 30
        $random = rand(20,30);
        $idCounter = $req->counter;
        $responsable = User::find(Auth::user()->id);
        $tratamientos_implantologia = TratamientosImplantologia::orderBy('descripcion','asc')->get();
        $materiales_implantologia = MaterialesImplantologia::orderBy('descripcion','asc')->get();
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $odontograma = $this->dameOdontogramaPaciente($req->id_paciente, $req->id_ficha_atencion, $req->id_lugar_atencion, $profesional->id_tipo_especialidad);
        $v = view('atencion_odontologica.include.piezas_dental_tto_impl',[
            'counter' => $idCounter,
            'tratamientos_implantologia' => $tratamientos_implantologia,
            'materiales_implantologia' => $materiales_implantologia,
            'odontograma' => $odontograma,
            ])->render();
            if($req->tipo == 'periodoncia'){
                $v = view('atencion_odontologica.include.piezas_dental_tto_period',[
                    'counter' => $idCounter,
                    'tratamientos_implantologia' => $tratamientos_implantologia,
                    'materiales_implantologia' => $materiales_implantologia,
                    'odontograma' => $odontograma,
                    ])->render();
            }
        return ['mensaje' => 'OK','v' => $v];
    }

    public function mostrar_nueva_pieza_dental_tto_period(Request $req){
        // generar numero random entre el 20 y el 30
        $random = rand(20,30);
        $idCounter = $req->counter;
        $responsable = User::find(Auth::user()->id);
        $tratamientos_implantologia = TratamientosImplantologia::orderBy('descripcion','asc')->get();
        $materiales_implantologia = MaterialesImplantologia::orderBy('descripcion','asc')->get();
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $odontograma = $this->dameOdontogramaPaciente($req->id_paciente, $req->id_ficha_atencion, $req->id_lugar_atencion, $profesional->id_tipo_especialidad);
        $v = view('atencion_odontologica.include.piezas_dental_tto_impl',[
            'counter' => $idCounter,
            'tratamientos_implantologia' => $tratamientos_implantologia,
            'materiales_implantologia' => $materiales_implantologia,
            'odontograma' => $odontograma,
            ])->render();
        return ['mensaje' => 'OK','v' => $v];
    }

    public function mostrar_nueva_pieza_dental_tto_impl_rehab(Request $req){
        // generar numero random entre el 20 y el 30
        $random = rand(20,30);
        $idCounter = $req->counter;
        $responsable = User::find(Auth::user()->id);
        $tratamientos_implantologia = TratamientosImplantologia::orderBy('descripcion','asc')->get();
        $materiales_implantologia = MaterialesImplantologia::orderBy('descripcion','asc')->get();
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $odontograma = $this->dameOdontogramaPaciente($req->id_paciente, $req->id_ficha_atencion, $req->id_lugar_atencion, $profesional->id_tipo_especialidad);
        $v = view('atencion_odontologica.include.piezas_dental_tto_impl_rehab',[
            'counter' => $idCounter,
            'tratamientos_implantologia' => $tratamientos_implantologia,
            'materiales_implantologia' => $materiales_implantologia,
            'odontograma' => $odontograma,
            ])->render();
        return ['mensaje' => 'OK','v' => $v];
    }

    public function guardar_examen_boca_general(Request $req){

        if($req->tipo_examen == "gral"){
            $tipo_examen = 1;
        }else if($req->tipo_examen == "endo"){
            $tipo_examen = 2;
        }else{
            $tipo_examen = 3;
        }


        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();

        $examen_boca_general = new ExamenesBocaGeneral;
        $examen_boca_general->id_paciente = $req->id_paciente;
        $examen_boca_general->id_profesional = $req->id_profesional;
        $examen_boca_general->id_lugar_atencion = $req->id_lugar_atencion;
        $examen_boca_general->id_ficha_atencion = $req->id_ficha_atencion;
        $examen_boca_general->id_especialidad = $profesional->id_especialidad;
        $examen_boca_general->tipo_especialidad = $profesional->id_tipo_especialidad;
        $examen_boca_general->fecha = $req->fecha;
        $examen_boca_general->tipo_examen = $tipo_examen;
        $examen_boca_general->especialidad_examen = $req->especialidad_examen;
        $examen_boca_general->diagnostico = $req->diagnostico;
        $examen_boca_general->diagnostico_tratamiento = $req->tratamiento;
        $examen_boca_general->terminado = $req->trabajo_terminado == 'Si' ? 1 : 0;
        $examen_boca_general->agendar_control = $req->agendar_control == 'Si' ? 1 : 0;
        $examen_boca_general->comentario = $req->comentarios == '' ? 'SIN OBSERVACIONES' : $req->comentarios;
        $examen_boca_general->localizacion = $req->localizacion_examen;

        if($examen_boca_general->save()){
            $ficha_atencionController = new ficha_atencionController;
            $todos = $ficha_atencionController->dameTratamientosBocaGeneral($req->id_ficha_atencion);
            $valores_tratamientos = $this->dameValoresOdontograma($req->id_paciente, $req->id_ficha_atencion, $req->id_lugar_atencion, $profesional->id_tipo_especialidad);
            return [
                'mensaje' => 'OK',
                'examen' => $examen_boca_general,
                'todos' => $todos,
                'valores_tratamientos' => $valores_tratamientos
            ];
        } else {
            return ['mensaje' => 'Error'];
        }
    }

    public function getDsm5(Request $request){

       try {
            //code...
            $search = $request->search;

            if ($search == '') {
                $employees = DiagnosticoPsicologico::orderby('descripcion', 'asc')->select('id','codigo', 'descripcion', 'f')->limit(15)->get();
            } else {
            //  $employees = DiagnosticoPsicologico::orderby('nombre', 'asc')->select('id', 'nombre')->where('nombre', 'like', '%' . $search . '%')->limit(15)->get();
                $employees = DiagnosticoPsicologico::orderby('descripcion', 'asc')->select('id','codigo', 'descripcion','f')->where('descripcion', 'like', $search . '%')->limit(15)->get();
            }
            $response = array();

            foreach ($employees as $employee) {

                $response[] = array("value" => $employee->id, "label" =>$employee->f.' - '. $employee->descripcion);

            }
            return response()->json($response);
       } catch (\Exception $e) {
        //throw $th;
        return response()->json(['error' => 'Error al buscar el diagnóstico: ' . $e->getMessage()], 500);
       }

    }

    public function registro_examen(Request $req)
    {
       
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
  
        // Validar datos mínimos
        $req->validate([
            'diagnostico' => 'required|string',
            'observaciones' => 'nullable|string',
            'id_ficha_atencion' => 'required|integer',
            'id_tipo_examen' => 'required|integer',
            'examenes' => 'required|array',
        ]);

        // Guardar el registro
        ExamenPlanTratamiento::create([
            'diagnostico' => $req->diagnostico,
            'observaciones' => $req->observaciones,
            'id_ficha_atencion' => $req->id_ficha_atencion,
            'tipo_examen' => $req->id_tipo_examen,
            'especialidad' => $profesional->id_tipo_especialidad,
            'examenes' => json_encode($req->examenes),
        ]);

        // Consultar todos los exámenes del mismo tipo y ficha
        $examenes = ExamenPlanTratamiento::where('id_ficha_atencion', $req->id_ficha_atencion)
            ->where('tipo_examen', $req->id_tipo_examen)
            ->orderBy('created_at', 'desc')
            ->get();
        
        $tipo_examen = $req->tipo_examen;
        $sub_tipo_examen = $req->sub_tipo_examen;
        $examen = $req->examen;
        $lado = $req->lado;
        $prioridad = $req->prioridad;
        $imagenologia_con_contraste = $req->imagenologia_con_contraste;

        // Verificar si id_examen es un array o un valor único
        $ids_examenes = is_array($req->id_examen) ? $req->id_examen : [$req->id_examen];
        
        $examenes_guardados = 0;
        $examenes_solicitados = [];
        
        // Crear una solicitud para cada id_examen
        foreach ($ids_examenes as $id_examen) {
            $nueva_solicitud_examen = new ExamenSolicitudServicio();
            $nueva_solicitud_examen->id_institucion = 1;
            $nueva_solicitud_examen->id_servicio = 1;
            $nueva_solicitud_examen->id_paciente = $req->id_paciente;
            $nueva_solicitud_examen->id_ficha_atencion = $req->id_ficha_atencion;
            $nueva_solicitud_examen->id_responsable = Auth::user()->id;
            
            $examen = ExamenMedico::find($id_examen);

            // crear un objeto json con los datos del examen para cada id
            $datos_examen = array(
                'id_examen' => $id_examen,
                'tipo_examen' => $tipo_examen,
                'sub_tipo_examen' => $sub_tipo_examen,
                'examen' => $examen->nombre_examen,
                'lado' => $lado,
                'prioridad' => $prioridad,
                'imagenologia_con_contraste' => $imagenologia_con_contraste,
            );
            $nueva_solicitud_examen->datos_examen = json_encode($datos_examen);

            if($nueva_solicitud_examen->save()){
                $examenes_guardados++;
            }
        }

        // Obtener exámenes solicitados actualizados
        if ($examenes_guardados > 0) {
            $examen_medico_controller = new ExamenMedicoController();
            $examenes_solicitados = $examen_medico_controller->dame_examenes_solicitados($req->id_paciente, $req->id_ficha_atencion);
        }

        // Retornar respuesta en JSON
        return response()->json([
            'success' => true,
            'examenes' => $examenes->map(function ($examen) {
                return [
                    'fecha' => Carbon::parse($examen->created_at)->format('d-m-Y H:i'),
                    'diagnostico' => $examen->diagnostico,
                    'observaciones' => $examen->observaciones,
                    'examenes' => json_decode($examen->examenes),
                    'id' => $examen->id,
                ];
            }),
            'examenes_guardados' => $examenes_guardados,
            'total_examenes' => count($ids_examenes),
            'examenes_solicitados' => $examenes_solicitados
        ]);
    }

    public function eliminar_examen(Request $req)
    {
        $req->validate([
            'id' => 'required|integer',
            'nombre_examen' => 'required|string',
        ]);

        $examen = ExamenPlanTratamiento::find($req->id);

        if (!$examen) {
            return response()->json(['success' => false, 'message' => 'Examen no encontrado.'], 404);
        }

        // Decodificar los exámenes almacenados (como array)
        $examenes = json_decode($examen->examenes, true);

        // Eliminar el examen que coincida exactamente
        $examenes = array_filter($examenes, function ($item) use ($req) {
            return $item !== $req->nombre_examen;
        });


        // Si ya no quedan exámenes, eliminar el registro completo
        if (empty($examenes)) {
            $examen->delete();
        } else {
            // Si aún quedan exámenes, guardar el arreglo actualizado
            $examen->examenes = json_encode(array_values($examenes)); // reindexar
            $examen->save();
        }

        // Consultar todos los exámenes del mismo tipo y ficha
        $examenes_actualizados = ExamenPlanTratamiento::where('id_ficha_atencion', $req->id_ficha_atencion)
            ->where('tipo_examen', $req->tipo)
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Examen eliminado correctamente.',
            'examenes' => $examenes_actualizados->map(function ($ex) {
                return [
                    'fecha' => Carbon::parse($ex->created_at)->format('d-m-Y H:i'),
                    'diagnostico' => $ex->diagnostico,
                    'observaciones' => $ex->observaciones,
                    'examenes' => json_decode($ex->examenes),
                    'id' => $ex->id,
                ];
            })
        ]);
    }

     public function dame_examenes_hosp($id_ficha_atencion, $id_paciente){
        $examenes_solicitados = ExamenSolicitudServicio::select('examenes_solicitudes_servicio.*', 'users.name as responsable')
                                ->leftJoin('users', 'examenes_solicitudes_servicio.id_responsable', 'users.id')
                                ->where('examenes_solicitudes_servicio.id_paciente', $id_paciente)
                                ->where('examenes_solicitudes_servicio.otros','hosp')
                                ->when($id_ficha_atencion, function ($query, $id_ficha_atencion) {
                                    return $query->where('examenes_solicitudes_servicio.id_ficha_atencion', $id_ficha_atencion);
                                })
                                ->get();
        foreach ($examenes_solicitados as $examen_solicitado) {
            $examen_solicitado->datos_examen = json_decode($examen_solicitado->datos_examen);
            $examen_solicitado->fecha = date('d-m-Y', strtotime($examen_solicitado->created_at));
            $examen_solicitado->hora = date('H:i', strtotime($examen_solicitado->created_at));
        }
        return $examenes_solicitados;
    }

    public function ordenHospitalizacion(Request $req){

        $medicamentos = json_decode($req->medicamentos, true);

        $id_ficha_atencion = $req->id_ficha_atencion;
        $ficha_atencion = FichaAtencion::find($id_ficha_atencion);
        $lugar_atencion = LugarAtencion::find($ficha_atencion->id_lugar_atencion);
        $paciente = Paciente::find($ficha_atencion->id_paciente);
        $profesional = Profesional::find($ficha_atencion->id_profesional);

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

        $examenes = $this->dame_examenes_hosp($id_ficha_atencion, $ficha_atencion->id_paciente);
        // Extraer solo los datos_examen
        $solo_datos_examen = collect($examenes)->pluck('datos_examen')->toArray();

         // Hospitalización (incluyendo nuevos campos)
        $array_hospitalizacion = [
            'hosp_enserv' => $req->hosp_enserv_text,
            'hospen' => $req->hospen_text,
            'motivo_hosp' => $req->motivo_hosp_text,
            'nom_inst' => $req->nom_inst,
            'obs_hospitalizar' => $req->obs_hospitalizar,
            'otros_hosp' => $req->otros_hosp,
            'otros_antecedentes' => $req->ingreso_sol_pab_modal_otros_antecedentes,
            'hosp_origen' => $req->hosp_origen,
            'diagn_ingreso' => $req->diagn_ingreso,
            'servicio_hosp' => $req->serv_hosp,
            'preparar_cirugia' => $req->preparar_cirugia === "1",
            'motivo_hosp_indicaciones' => $req->motivo_hosp_indicaciones,
            'ind_grales_hosp' => $req->ind_grales_hosp,
            'control_enfermeria' => $req->control_enfermeria_text,
            'otras_indicaciones' => $req->otras_indicaciones,
            'medicamentos' => $medicamentos,
            'examenes' => $solo_datos_examen
        ];

        $nombre_archivo = 'orden_hospitalizacion_'.$paciente->nombres.'_'.$paciente->apellido_uno.'_'.$paciente->apellido_dos.'_'.date('YmdHis').'.pdf';

        $cuerpo = [
            'array_ficha_atencion' => $array_ficha_atencion,
            'array_lugar_atencion' => $array_lugar_atencion,
            'array_profesional' => $array_profesional,
            'array_paciente' => $array_paciente
        ];
       // Renderizar la vista del presupuesto dental
        $pdf = Pdf::loadView('atencion_medica.PDF.hospitalizacion', compact(
            'array_paciente',
            'array_profesional',
            'array_ficha_atencion',
            'array_lugar_atencion',
            'array_hospitalizacion',
            'cuerpo'
        ));
        // Guardar el PDF en la carpeta public
        $fileName = 'hospitalizacion_' . $paciente->id . '.pdf';
        $filePath = public_path('reportes/' . $fileName);
        file_put_contents($filePath, $pdf->output());

        // Devolver la ruta accesible del archivo PDF
        return response()->json(['ruta' => asset('reportes/' . $fileName),'success' => true,'examenes' => $examenes]);
    }

     public function pdfSolicitud(Request $request){

        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->grado_urgencia))
        {
            $error['grado_urgencia'] = 'campo requerido\n';
            $valido = 0;
        }
        if(empty($request->hospital))
        {
            $error['hospital'] = 'campo requerido\n';
            $valido = 0;
        }
        if(empty($request->fecha_hora_operacion))
        {
            $error['fecha_hora_operacion'] = 'campo requerido\n';
            $valido = 0;
        }
        if(empty($request->operacion))
        {
            $error['operacion'] = 'campo requerido\n';
            $valido = 0;
        }
        if(empty($request->codigo_cirugia))
        {
            $error['codigo_cirugia'] = 'campo requerido\n';
            $valido = 0;
        }
        if(empty($request->equipamiento_especial))
        {
            $error['equipamiento_especial'] = 'campo requerido\n';
            $valido = 0;
        }
        if(empty($request->especialidad_1))
        {
            $error['especialidad_1'] = 'campo requerido\n';
            $valido = 0;
        }
        if(empty($request->comentarios))
        {
            $error['comentarios'] = 'campo requerido\n';
            $valido = 0;
        }
        if(empty($request->tipo_cirugia))
        {
            $error['tipo_cirugia'] = 'campo requerido\n';
            $valido = 0;
        }
        // if(empty($request->patalogias_cronicas))
        // {
        //     $error['patalogias_cronicas'] = 'campo requerido\n';
        //     $valido = 0;
        // }
        // if(empty($request->otros_antecedentes))
        // {
        //     $error['otros_antecedentes'] = 'campo requerido\n';
        //     $valido = 0;
        // }
        if(empty($request->diagnostico_preoperatorio))
        {
            $error['diagnostico_preoperatorio'] = 'campo requerido\n';
            $valido = 0;
        }
        if(empty($request->id_paciente))
        {
            $error['id_paciente'] = 'campo requerido\n';
            $valido = 0;
        }
        if(empty($request->id_profesional))
        {
            $error['id_profesional'] = 'campo requerido\n';
            $valido = 0;
        }
        if(empty($request->id_ficha_atencion))
        {
            $error['id_ficha_atencion'] = 'campo requerido\n';
            $valido = 0;
        }
        if(empty($request->id_lugar_atencion))
        {
            $error['id_lugar_atencion'] = 'campo requerido\n';
            $valido = 0;
        }
        /** equipo  */
        if(empty(json_decode($request->lista_profesionales_eq_nuevo)) && empty($request->lista_profesionales))
        {
            $error['equipo'] = 'campo requerido\n';
            $valido = 0;
        }

         if($valido)
        {
            $id_ficha_atencion = $request->id_ficha_atencion;
            $ficha_atencion = FichaAtencion::find($id_ficha_atencion);
            $lugar_atencion = LugarAtencion::find($ficha_atencion->id_lugar_atencion);
            $paciente = Paciente::find($ficha_atencion->id_paciente);
            $profesional = Profesional::find($ficha_atencion->id_profesional);

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


            $array_hospitalizacion = [
                'grado_urgencia' => $request->grado_urgencia,
                'hospital' => $request->hospital,
                'fecha_hora_operacion' => $request->fecha_hora_operacion,
                'operacion' => $request->operacion,
                'codigo_cirugia' => $request->codigo_cirugia,
                'equipamiento_especial' => $request->equipamiento_especial,
                'especialidad_1' => $request->especialidad_1,
                'comentarios' => $request->comentarios,
                'tipo_cirugia' => $request->tipo_cirugia,
                'patalogias_cronicas' => $request->patalogias_cronicas,
                'otros_antecedentes' => $request->otros_antecedentes,
                'diagnostico_preoperatorio' => $request->diagnostico_preoperatorio,
                'equipo' => !empty(json_decode($request->lista_profesionales_eq_nuevo)) ? json_decode($request->lista_profesionales_eq_nuevo) : json_decode($request->lista_profesionales),
            ];


            $nombre_archivo = 'solicitud_pabellon'.$paciente->nombres.'_'.$paciente->apellido_uno.'_'.$paciente->apellido_dos.'_'.date('YmdHis').'.pdf';

            $cuerpo = [
                'array_ficha_atencion' => $array_ficha_atencion,
                'array_lugar_atencion' => $array_lugar_atencion,
                'array_profesional' => $array_profesional,
                'array_paciente' => $array_paciente
            ];
            $equipo_raw = $request->lista_profesionales;
            $equipo_array = [];

            if (!empty($equipo_raw)) {
                $profesionales_raw = explode('|', $equipo_raw);
                foreach ($profesionales_raw as $p) {
                    if (empty(trim($p))) continue;

                    list($res1, $res2, $rol, $id) = explode(',', $p);
                    $prof = Profesional::find($id);

                    if ($prof) {
                        $equipo_array[] = [
                            'nombre' => $prof->nombre . ' ' . $prof->apellido_uno . ' ' . $prof->apellido_dos,
                            'especialidad' => optional($prof->SubTipoEspecialidad()->first())->nombre,
                            'rol' => $rol,
                        ];
                    }
                }
            }

            $array_hospitalizacion['equipo'] = $equipo_array;


        // Renderizar la vista del presupuesto dental
            $pdf = Pdf::loadView('atencion_medica.PDF.solicitud_pabellon', compact(
                'array_paciente',
                'array_profesional',
                'array_ficha_atencion',
                'array_lugar_atencion',
                'array_hospitalizacion',
                'cuerpo'
            ));
            // Guardar el PDF en la carpeta public
            $fileName = 'solicitud_pabellon_' . $paciente->id . '.pdf';
            $filePath = public_path('reportes/' . $fileName);
            file_put_contents($filePath, $pdf->output());

            $datos['estado'] = 1;
            $datos['msj'] = 'Exito';
            $datos['error'] = 'Todo bien';
            // Devolver la ruta accesible del archivo PDF
            $datos['response'] = ['ruta' => asset('reportes/' . $fileName),'success' => true];
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campos requeridos';
            $datos['error'] = $error;
        }

        return $datos;
    }

    public function guardar_examen_biopsia(Request $req){
        try {
            $fecha = $req->fecha;
            $n_orden = $req->n_orden;
            $zona1 = $req->zona1;
            $zona2 = $req->zona2;
            $zona3 = $req->zona3;
            $zona4 = $req->zona4;
            $patologo = $req->patologo;
            $observaciones = $req->observaciones;
            $id_ficha_atencion = $req->id_ficha_atencion;

            $examen = new ExamenBiopsia;
            $examen->fecha = $fecha;
            $examen->n_orden = $n_orden;
            $examen->zona1 = $zona1;
            $examen->zona2 = $zona2;
            $examen->zona3 = $zona3;
            $examen->zona4 = $zona4;
            $examen->patologo = $patologo;
            $examen->observaciones = $observaciones;
            $examen->id_ficha_atencion = $id_ficha_atencion;

            if($examen->save()){
                // Agrupar zonas
                $zonas = array_filter([$zona1, $zona2, $zona3, $zona4]);
                $zonas_string = implode(', ', $zonas);

                return [
                    'success' => true,
                    'examen' => [
                        'fecha' => $examen->fecha,
                        'n_orden' => $examen->n_orden,
                        'localizacion' => $zonas_string,
                        'zona' => $zonas_string,
                        'patologo' => $examen->patologo,
                        'id' => $examen->id
                    ]
                ];
            }else{
                return ['success' => false];
            }

        } catch (\Throwable $e) {
            //throw $th;
            return ['success' => false, 'examen' => $e->getMessage()];
        }

    }

    // Método privado reutilizable
    private function procesar_examenes_biopsia($id_ficha_atencion) {
        $examenes = ExamenBiopsia::where('id_ficha_atencion', $id_ficha_atencion)->get();
        foreach ($examenes as $examen) {
            $zonas = array_filter([$examen->zona1, $examen->zona2, $examen->zona3, $examen->zona4]);
            $zonas_string = implode(', ', $zonas);
            $examen->localizacion = $zonas_string;
            $examen->zona = $zonas_string;
        }
        return $examenes;
    }

    // Controlador para el frontend (JS)
    public function dame_examenes_biopsia(Request $req) {
        return $this->procesar_examenes_biopsia($req->id_ficha_atencion);
    }

    public function eliminar_examen_biopsia(Request $req){
        $examen = ExamenBiopsia::find($req->id);
        $id_ficha_atencion = $examen->id_ficha_atencion;
        if($examen->delete()){
            $examenes = $this->procesar_examenes_biopsia($id_ficha_atencion);
            return ['success' => true, 'examenes' => $examenes];
        }else{
            return ['success' => false];
        }
    }

    public function generar_pdf_biopsias(Request $req){
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

            $array_examenes = ExamenBiopsia::find($req->id)->toArray();

            $cuerpo = [
                'array_ficha_atencion' => $array_ficha_atencion,
                'array_lugar_atencion' => $array_lugar_atencion,
                'array_profesional' => $array_profesional,
                'array_paciente' => $array_paciente,
                'array_examenes' => $array_examenes 
            ];

            // return  PdfController::generarPDF($tipo->nombre, compact('imagenes', 'registro', 'array_lugar_atencion', 'array_profesional', 'array_paciente','array_ficha_atencion'), $nombre_archivo, 'pdf_orl_rino',$pdf_tipo);
            return  PdfController::generarPDF('ORDEN EXAMENES',
            compact(
                'array_ficha_atencion',
                'array_lugar_atencion',
                'array_profesional',
                'array_paciente',
                'array_examenes'
            ), 'Orden Examenes '.$paciente->rut, 'pdf_orden_examen_biopsia');
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }
    }

    public function mostrar_nuevo_medicamento_hosp(Request $req){
        $idCounter = $req->counter ? $req->counter : 0;
        $responsable = User::find(Auth::user()->id);

        $v = view('general.hospitalizacion.modals.includes.medicamento_hosp',['counter' => $idCounter])->render();

        return ['mensaje' => 'OK','v' => $v];
    }

    public function guardarHospitalizacion(Request $request)
    {
        try {
            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

            $datos = [
                'id_ficha_atencion' => $request->id_ficha_atencion,
                'id_paciente' => $request->id_paciente,
                'id_profesional' => $profesional->id,
                'tipo' => $request->preparar_cirugia,
                'hospen' => $request->hospen,
                'obs_hospen' => $request->hospen_text,
                'nom_inst' => $request->nom_inst,
                'hosp_enserv' => $request->hosp_enserv,
                'obs_hosp_enserv' => $request->hosp_enserv_text,
                'motivo_hosp' => $request->motivo_hosp,
                'obs_motivo_hosp' => $request->motivo_hosp_text,
                'obs_hospitalizar' => $request->obs_hospitalizar,
                'otros_hosp' => $request->otros_hosp,
                'medicamentos' => $request->medicamentos,
                'estado' => 1,
                'updated_at' => now(),
            ];

            $solicitud = SolicitudHospitalizacion::where('id_ficha_atencion', $request->id_ficha_atencion)->first();

            if ($solicitud) {
                $solicitud->update($datos);
            } else {
                $datos['created_at'] = now();
                SolicitudHospitalizacion::create($datos);
            }

            return response()->json(['success' => true]);

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'mensaje' => $e->getMessage()]);
        }
    }



    public function generar_pdf_examen(Request $req){
        try {
            $examen = ExamenPlanTratamiento::find($req->id);
            $ficha_atencion = FichaAtencion::find($examen->id_ficha_atencion);
            $paciente = Paciente::find($ficha_atencion->id_paciente);
            $profesional = Profesional::find($ficha_atencion->id_profesional);
            $nombre_examen = $req->nombre_examen;
                // Renderizar la vista del presupuesto dental
            $pdf = Pdf::loadView('atencion_medica.PDF.plan_tratamiento', compact(
                'examen',
                'nombre_examen',
                'paciente',
                'profesional'
            ));
            // Guardar el PDF en la carpeta public
            $fileName = 'plan_tratamiento_' . $paciente->id . '.pdf';
            $filePath = public_path('reportes/' . $fileName);
            file_put_contents($filePath, $pdf->output());

            // Devolver la ruta accesible del archivo PDF
            return response()->json(['ruta' => asset('reportes/' . $fileName)]);

        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }

    public function enviar_pdf_examen(Request $request){
        try {
            $id_ficha_atencion = $request->id_ficha_atencion;
            $tipo_examen = $request->tipo;

            $examenes_ = ExamenPlanTratamiento::where('id_ficha_atencion', $id_ficha_atencion)
                                            ->where('tipo_examen', $tipo_examen)
                                            ->first();

            $examenes = json_decode($examenes_->examenes, true);

            $paciente = Paciente::find($request->id_paciente);

            // verificamos si el paciente tiene email
            if (empty($paciente->email)) {
                return [
                    'success' => false,
                    'mensaje' => 'El paciente no tiene un correo electrónico registrado.'
                ];
            }

            // Enviar mail
            Mail::to($paciente->email)->send(new ExamenesPorRealizar($paciente, $examenes));

            return [
                'success' => true,
                'mensaje' => 'Exámenes enviados correctamente al correo del paciente.'
            ];
        } catch (\Exception $e) {
            //throw $th;
            return [
                'success' => false,
                'mensaje' => 'Error al enviar los exámenes: ' . $e->getMessage()
            ];
        }

    }

    public function guardarDietaNutricional(Request $request)
    {
        try {
            $id_paciente = $request->input('id_paciente');
            $id_profesional = $request->input('id_profesional');
            $dieta_para = $request->input('dieta_para');

            // validamos si existe una dieta nutricional para el paciente y profesional
            $dietaExistente = DietaNutricional::where('id_paciente', $id_paciente)
                ->where('id_profesional', $id_profesional)
                ->where('estado', 1)
                ->first();

            if ($dietaExistente) {
                // Si existe, actualizamos la dieta
                $dietaExistente->dieta_para = $dieta_para;
                $dietaExistente->desayuno = $request->input('desayuno');
                $dietaExistente->merienda = $request->input('merienda');
                $dietaExistente->almuerzo = $request->input('almuerzo');
                $dietaExistente->media_tarde = $request->input('media_tarde');
                $dietaExistente->cena = $request->input('cena');
                $dietaExistente->alimentos_prohibidos = $request->input('alimentos_prohibidos');
                $dietaExistente->sustitucion = $request->input('sustitucion');
                $dietaExistente->recomendaciones = $request->input('recomendaciones');
                $dietaExistente->save();
            } else {
                // Si no existe, creamos una nueva dieta
                $dieta = new DietaNutricional();
                $dieta->id_paciente = $id_paciente;
                $dieta->id_profesional = $id_profesional;
                $dieta->dieta_para = $dieta_para;
                $dieta->desayuno = $request->input('desayuno');
                $dieta->merienda = $request->input('merienda');
                $dieta->almuerzo = $request->input('almuerzo');
                $dieta->media_tarde = $request->input('media_tarde');
                $dieta->cena = $request->input('cena');
                $dieta->alimentos_prohibidos = $request->input('alimentos_prohibidos');
                $dieta->sustitucion = $request->input('sustitucion');
                $dieta->recomendaciones = $request->input('recomendaciones');
                $dieta->estado = 1;
                $dieta->fecha = Carbon::now()->format('Y-m-d');

                $dieta->save();

                return response()->json(['success' => true]);
            }
        } catch (\Exception $e) {
            //throw $th;
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }

    }

    public function dameBocaCompletaGeneralTratamiento($id_paciente, $tipo_especialidad){
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $examenes = ExamenesBocaGeneral::select('examenes_boca_general.*','diagnosticos_dental.valor')
        ->join('diagnosticos_dental','examenes_boca_general.diagnostico_tratamiento','=','diagnosticos_dental.descripcion')
        ->where('localizacion','Boca completa')
        ->where('examenes_boca_general.tipo_examen',1)
        ->where('especialidad_examen','tratamiento')
        ->where('examenes_boca_general.id_paciente',$id_paciente)
        ->where('examenes_boca_general.id_profesional',$profesional->id)
        ->get();
        return $examenes;
    }

    public function dameBocaCompletaGeneralDiagnostico($id_paciente, $tipo_especialidad){
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $examenes = ExamenesBocaGeneral::select('examenes_boca_general.*','diagnosticos_dental.valor')
        ->join('diagnosticos_dental','examenes_boca_general.diagnostico_tratamiento','=','diagnosticos_dental.descripcion')
        ->where('localizacion','Boca completa')
        ->where('examenes_boca_general.tipo_examen',1)
        ->where('especialidad_examen','diagnostico')
        ->where('examenes_boca_general.id_paciente',$id_paciente)
        ->where('examenes_boca_general.id_profesional',$profesional->id)
        ->get();
        return $examenes;
    }

    public function dameMaxilarInferiorGeneralTratamiento($id_paciente, $tipo_especialidad){
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $examenes = ExamenesBocaGeneral::select('examenes_boca_general.*','diagnosticos_dental.valor')
        ->join('diagnosticos_dental','examenes_boca_general.diagnostico_tratamiento','=','diagnosticos_dental.descripcion')
        ->where('localizacion','Maxilar inferior')
        ->where('examenes_boca_general.tipo_examen',1)
        ->where('especialidad_examen','tratamiento')
        ->where('examenes_boca_general.id_paciente',$id_paciente)
        ->where('examenes_boca_general.id_profesional',$profesional->id)
        ->where('examenes_boca_general.tipo_especialidad',$tipo_especialidad)
        ->get();
        return $examenes;
    }

    public function dameMaxilarInferiorGeneralDiagnostico($id_paciente, $tipo_especialidad){
        $examenes = ExamenesBocaGeneral::select('examenes_boca_general.*','diagnosticos_dental.valor')
        ->join('diagnosticos_dental','examenes_boca_general.diagnostico_tratamiento','=','diagnosticos_dental.descripcion')
        ->where('localizacion','Maxilar inferior')
        ->where('examenes_boca_general.tipo_examen',1)
        ->where('especialidad_examen','diagnostico')
        ->where('examenes_boca_general.id_paciente',$id_paciente)
        ->where('examenes_boca_general.tipo_especialidad',$tipo_especialidad)
        ->get();
        return $examenes;
    }

    public function dameCompletaEndoTratamiento($id_paciente, $tipo_especialidad){
        $examenes = ExamenesBocaGeneral::select('examenes_boca_general.*','diagnosticos_dental.valor')
        ->join('diagnosticos_dental','examenes_boca_general.diagnostico_tratamiento','=','diagnosticos_dental.descripcion')
        ->where('localizacion','Boca completa')
        ->where('examenes_boca_general.tipo_examen',2)
        ->where('especialidad_examen','tratamiento')
        ->where('examenes_boca_general.id_paciente',$id_paciente)
        ->get();
        return $examenes;
    }

    public function dameCompletaEndoDiagnostico($id_paciente, $tipo_especialidad){
        $examenes = ExamenesBocaGeneral::select('examenes_boca_general.*','diagnosticos_dental.valor')
        ->join('diagnosticos_dental','examenes_boca_general.diagnostico_tratamiento','=','diagnosticos_dental.descripcion')
        ->where('localizacion','Boca completa')
        ->where('examenes_boca_general.tipo_examen',2)
        ->where('especialidad_examen','diagnostico')
        ->where('examenes_boca_general.id_paciente',$id_paciente)
        ->get();
        return $examenes;
    }

    public function dameMaxilarSuperiorGeneralTratamientoEndodoncia($id_paciente){
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $examenes = ExamenesBocaGeneral::select('examenes_boca_general.*','diagnosticos_dental.valor')
        ->join('diagnosticos_dental','examenes_boca_general.diagnostico_tratamiento','=','diagnosticos_dental.descripcion')
        ->where('examenes_boca_general.localizacion','Maxilar superior')
        ->where('examenes_boca_general.tipo_examen',2)
        ->where('examenes_boca_general.especialidad_examen','tratamiento')
        ->where('examenes_boca_general.id_paciente',$id_paciente)
        ->where('examenes_boca_general.id_profesional',$profesional->id)
        ->get();
        return $examenes;
    }

    public function dameMaxilarSuperiorGeneralDiagnosticoEndodoncia($id_paciente){
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $examenes = ExamenesBocaGeneral::select('examenes_boca_general.*','diagnosticos_dental.valor')
        ->join('diagnosticos_dental','examenes_boca_general.diagnostico_tratamiento','=','diagnosticos_dental.descripcion')
        ->where('localizacion','Maxilar superior')
        ->where('examenes_boca_general.tipo_examen',2)
        ->where('especialidad_examen','diagnostico')
        ->where('examenes_boca_general.id_paciente',$id_paciente)
        ->where('examenes_boca_general.id_profesional',$profesional->id)
        ->get();
        return $examenes;
    }

    public function dameMaxilarInferiorGeneralTratamientoEndodoncia($id_paciente){
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $examenes = ExamenesBocaGeneral::select('examenes_boca_general.*','diagnosticos_dental.valor')
        ->join('diagnosticos_dental','examenes_boca_general.diagnostico_tratamiento','=','diagnosticos_dental.descripcion')
        ->where('localizacion','Maxilar inferior')
        ->where('examenes_boca_general.tipo_examen',2)
        ->where('especialidad_examen','tratamiento')
        ->where('examenes_boca_general.id_paciente',$id_paciente)
        ->where('examenes_boca_general.id_profesional',$profesional->id)
        ->get();
        return $examenes;
    }

    public function dameMaxilarInferiorGeneralDiagnosticoEndodoncia($id_paciente){
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $examenes = ExamenesBocaGeneral::select('examenes_boca_general.*','diagnosticos_dental.valor')
        ->join('diagnosticos_dental','examenes_boca_general.diagnostico_tratamiento','=','diagnosticos_dental.descripcion')
        ->where('localizacion','Maxilar inferior')
        ->where('examenes_boca_general.tipo_examen',2)
        ->where('especialidad_examen','diagnostico')
        ->where('examenes_boca_general.id_paciente',$id_paciente)
        ->where('examenes_boca_general.id_profesional',$profesional->id)
        ->get();
        return $examenes;
    }

    public function eliminar_diagnostico_dental(Request $req){

        $diagnostico = ExamenesBocaGeneral::find($req->id);
        $id_ficha_atencion = $diagnostico->id_ficha_atencion;
        if($diagnostico->delete()){
            $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
            $valores_tratamientos = $this->dameValoresOdontograma($req->id_paciente, $req->id_ficha_atencion, $req->id_lugar_atencion, $profesional->id_tipo_especialidad);
            $todos = $this->dameTratamientosBocaGeneral(
                $id_ficha_atencion
            );
            return [
                'mensaje' => 'OK',
                'examen' => $diagnostico,
                'valores_tratamientos' => $valores_tratamientos,
                'todos' => $todos
            ];
        }
    }

    public function importar_datos_excel_psicologia(Request $request){
         $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv'
        ]);

        Excel::import(new DiagnosticosPsicologicosImport, $request->file('file'));

        return back()->with('success', 'Diagnósticos importados correctamente.');
    }

    public function generar_pdf_presupuesto(Request $req){
        try {
           
            $ficha_atencionController = new ficha_atencionController();
            $paciente = Paciente::find($req->id_paciente);
            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
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
            $odontograma = $this->dameOdontogramaPaciente($req->id_paciente, $req->id_ficha_atencion, $req->id_lugar_atencion, $profesional->id_tipo_especialidad);
            $valores_odontograma = $this->dameValoresOdontograma($req->id_paciente, $req->id_ficha_atencion, $req->id_lugar_atencion, $profesional->id_tipo_especialidad);
         
            $insumos = $ficha_atencionController->dame_insumos_tratamiento($req->id_paciente, $req->id_ficha_atencion);

            // Renderizar la vista del presupuesto dental
            $pdf = Pdf::loadView('atencion_odontologica.PDF.presupuesto_dental', compact(
                'odontograma',
                'paciente',
                'valores_odontograma',
                'maxilar_superior_gral_tratamiento',
                'maxilar_superior_gral_diagnostico',
                'maxilar_inferior_gral_tratamiento',
                'maxilar_inferior_gral_diagnostico',
                'boca_completa_gral_tratamiento',
                'boca_completa_gral_diagnostico',
                'maxilar_inferior_gral_tratamientos_endo',
                'maxilar_inferior_gral_diagnosticos_endo',
                'maxilar_superior_gral_tratamientos_endo',
                'maxilar_superior_gral_diagnosticos_endo',
                'boca_completa_gral_tratamiento_endo',
                'boca_completa_gral_diagnostico_endo',
                'insumos'
            ));
            // Guardar el PDF en la carpeta public
            $fileName = 'presupuesto_dental_' . $req->id_paciente . '.pdf';
            $filePath = public_path('reportes/' . $fileName);
            file_put_contents($filePath, $pdf->output());

            // Devolver la ruta accesible del archivo PDF
            return response()->json(['ruta' => asset('reportes/' . $fileName)]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }

    public function generar_pdf_presupuesto_hist(Request $req){
        try {

            $ficha_atencionController = new ficha_atencionController();
            $ficha = FichaAtencion::find($req->id_ficha_atencion);

            $presupuesto_dental = PresupuestosDental::where('id_ficha_atencion', $ficha->id)->first();

            $paciente = Paciente::find($req->id_paciente);
            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
            $maxilar_superior_gral_tratamiento = $ficha_atencionController->dameMaxilarSuperiorGeneralTratamiento($paciente->id, $profesional->id_tipo_especialidad, $ficha->id);
            $maxilar_superior_gral_diagnostico = $ficha_atencionController->dameMaxilarSuperiorGeneralDiagnostico($paciente->id, $profesional->id_tipo_especialidad, $ficha->id);
            $maxilar_inferior_gral_tratamiento = $ficha_atencionController->dameMaxilarInferiorGeneralTratamiento($paciente->id, $profesional->id_tipo_especialidad, $ficha->id);
            $maxilar_inferior_gral_diagnostico = $ficha_atencionController->dameMaxilarInferiorGeneralDiagnostico($paciente->id, $profesional->id_tipo_especialidad, $ficha->id);
            $boca_completa_gral_tratamiento = $ficha_atencionController->dameBocaCompletaGeneralTratamiento($paciente->id, $profesional->id_tipo_especialidad, $ficha->id);
            $boca_completa_gral_diagnostico = $ficha_atencionController->dameBocaCompletaGeneralDiagnostico($paciente->id, $profesional->id_tipo_especialidad, $ficha->id);
            $maxilar_inferior_gral_tratamientos_endo = $ficha_atencionController->dameMaxilarInferiorGeneralTratamientoEndodoncia($paciente->id, $profesional->id_tipo_especialidad, $ficha->id);
            $maxilar_inferior_gral_diagnosticos_endo = $ficha_atencionController->dameMaxilarInferiorGeneralDiagnosticoEndodoncia($paciente->id, $profesional->id_tipo_especialidad, $ficha->id);
            $maxilar_superior_gral_tratamientos_endo = $ficha_atencionController->dameMaxilarSuperiorGeneralTratamientoEndodoncia($paciente->id, $profesional->id_tipo_especialidad, $ficha->id);
            $maxilar_superior_gral_diagnosticos_endo = $ficha_atencionController->dameMaxilarSuperiorGeneralDiagnosticoEndodoncia($paciente->id, $profesional->id_tipo_especialidad, $ficha->id);
            $boca_completa_gral_tratamiento_endo = $ficha_atencionController->dameCompletaEndoTratamiento($paciente->id, $profesional->id_tipo_especialidad, $ficha->id);
            $boca_completa_gral_diagnostico_endo = $ficha_atencionController->dameCompletaEndoDiagnostico($paciente->id, $profesional->id_tipo_especialidad, $ficha->id);
            $odontograma = $ficha_atencionController->dameOdontogramaPaciente($paciente->id, $ficha->id, $ficha->id_lugar_atencion, $profesional->id_tipo_especialidad);

            $valores_odontograma = $this->dameValoresOdontograma($paciente->id, $ficha->id, $ficha->id_lugar_atencion, $profesional->id_tipo_especialidad);

            $insumos = $ficha_atencionController->dame_insumos_tratamiento($paciente->id, $ficha->id);


            // Renderizar la vista del presupuesto dental
            $pdf = Pdf::loadView('atencion_odontologica.PDF.presupuesto_dental', compact(
                'odontograma',
                'paciente',
                'valores_odontograma',
                'maxilar_superior_gral_tratamiento',
                'maxilar_superior_gral_diagnostico',
                'maxilar_inferior_gral_tratamiento',
                'maxilar_inferior_gral_diagnostico',
                'boca_completa_gral_tratamiento',
                'boca_completa_gral_diagnostico',
                'maxilar_inferior_gral_tratamientos_endo',
                'maxilar_inferior_gral_diagnosticos_endo',
                'maxilar_superior_gral_tratamientos_endo',
                'maxilar_superior_gral_diagnosticos_endo',
                'boca_completa_gral_tratamiento_endo',
                'boca_completa_gral_diagnostico_endo',
                'insumos'
            ));
            $timestamp = time();
            // Guardar el PDF en la carpeta public
            $fileName = 'presupuesto_dental_' . $req->id_paciente . '_'. $timestamp .'.pdf';
            $filePath = public_path('reportes/' . $fileName);
            file_put_contents($filePath, $pdf->output());

            // Devolver la ruta accesible del archivo PDF
            return response()->json(['ruta' => asset('reportes/' . $fileName)]);
        } catch (\Exception $e) {
            //throw $th;
            return response()->json(['error' => $e->getMessage()]);
        }

    }

    public function dameOdontogramaPaciente($id_paciente, $id_ficha_atencion, $id_lugar_atencion, $tipo_especialidad,$id_presupuesto = null){
        $fc = new ficha_atencionController();
        $odontograma = $fc->dameOdontogramaPaciente($id_paciente, $id_ficha_atencion, $id_lugar_atencion, $tipo_especialidad);
        return $odontograma;
    }

    public function dameTratamientosImplante($id_paciente, $id_ficha_atencion = null, $id_lugar_atencion = null, $id_presupuesto = null)
    {
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

        $query = OdontogramaPaciente::select(
            'odontogramas_pacientes.*',
            'tratamientos_implantologia.descripcion',
            'tratamientos_implantologia.cantidad_bloques',
            'tratamientos_implantologia.valor',
            'tratamientos_dental.descripcion as diagnostico'
        )
        ->join('tratamientos_implantologia', 'odontogramas_pacientes.tratamiento', '=', 'tratamientos_implantologia.descripcion')
        ->join('tratamientos_dental', 'odontogramas_pacientes.diagnostico', '=', 'tratamientos_dental.id')
        ->where('odontogramas_pacientes.id_paciente', $id_paciente)
        ->where('odontogramas_pacientes.id_profesional', $profesional->id)
        ->where('odontogramas_pacientes.tratamiento', 'like', '%Implante%');

        if (!is_null($id_ficha_atencion)) {
            $query->where('odontogramas_pacientes.id_ficha_atencion', $id_ficha_atencion);
        }

        if (!is_null($id_lugar_atencion)) {
            $query->where('odontogramas_pacientes.id_lugar_atencion', $id_lugar_atencion);
        }

        if (!is_null($id_presupuesto)) {
            $query->where('odontogramas_pacientes.id_presupuesto', $id_presupuesto);
        }

        return $query->get();
    }


    public function atender_tratamiento_presupuesto(Request $req){
        if(!$req->tipo){
            $pieza = OdontogramaPaciente::select('odontogramas_pacientes.*','diagnosticos_dental.descripcion','diagnosticos_dental.cantidad_bloques')
            ->join('diagnosticos_dental','odontogramas_pacientes.diagnostico','diagnosticos_dental.id')
            ->where('odontogramas_pacientes.id',$req->id)
            ->first();
            if(!isset($req->origen) && !$req->origen == 'agenda'){
                if($req->checked == 'true'){
                    $pieza->atendido = 1;
                    $pieza->save();
                    return ['msj' => 'Pieza '.$pieza->pieza.' atendida con éxito.','bloques' => $pieza->cantidad_bloques, 'atendido' => 1];
                }else{
                    $pieza->atendido = 0;
                    $pieza->save();
                    return ['msj' => 'Pieza '.$pieza->pieza.' liberada.','bloques' => $pieza->cantidad_bloques, 'atendido' => 0];
                }
            }

            if($req->checked == 'true'){
                return ['msj' => 'Pieza '.$pieza->pieza.' agendada con éxito', 'bloques' => $pieza->cantidad_bloques,'atendido' => 1];
            }else{
                return ['msj' => 'Pieza '.$pieza->pieza.' desagendada con éxito', 'bloques' => $pieza->cantidad_bloques,'atendido' => 0];
            }


        }else{
            $examen_boca_general = ExamenesBocaGeneral::select('examenes_boca_general.*','diagnosticos_dental.valor','diagnosticos_dental.cantidad_bloques')
                                    ->join('diagnosticos_dental','examenes_boca_general.diagnostico_tratamiento','=','diagnosticos_dental.descripcion')
                                    ->where('examenes_boca_general.id',$req->id)
                                    ->first();
            if($req->checked == 'true'){
                $examen_boca_general->atendido = 1;
                $examen_boca_general->save();
                return ['msj' => $examen_boca_general->diagnostico_tratamiento.' atendida con éxito.','bloques' => $examen_boca_general->cantidad_bloques, 'atendido' => 1];
            }else{
                $examen_boca_general->atendido = 0;
                $examen_boca_general->save();
                return ['msj' => $examen_boca_general->diagnostico_tratamiento.' liberada.','bloques' => $examen_boca_general->cantidad_bloques, 'atendido' => 0];
            }
        }





    }

    public function eliminar_tratamiento_dental(Request $req){
        $tratamiento = ExamenesBocaGeneral::find($req->id);
        if($tratamiento->delete()){
            $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
            $maxilar_superior_gral_tratamiento = $this->dameMaxilarSuperiorGeneralTratamiento($req->id_paciente, $profesional->id_tipo_especialidad);
            $maxilar_superior_gral_diagnostico = $this->dameMaxilarSuperiorGeneralDiagnostico($req->id_paciente, $profesional->id_tipo_especialidad);
            $maxilar_inferior_gral_tratamiento = $this->dameMaxilarInferiorGeneralTratamiento($req->id_paciente, $profesional->id_tipo_especialidad);
            $maxilar_inferior_gral_diagnostico = $this->dameMaxilarInferiorGeneralDiagnostico($req->id_paciente, $profesional->id_tipo_especialidad);
            $boca_completa_gral_tratamiento = $this->dameBocaCompletaGeneralTratamiento($req->id_paciente, $profesional->id_tipo_especialidad);
            $boca_completa_gral_diagnostico = $this->dameBocaCompletaGeneralDiagnostico($req->id_paciente, $profesional->id_tipo_especialidad);

            $maxilar_superior_gral_tratamiento_endo = $this->dameMaxilarSuperiorGeneralTratamientoEndodoncia($req->id_paciente, $profesional->id_tipo_especialidad);
            $maxilar_superior_gral_diagnostico_endo = $this->dameMaxilarSuperiorGeneralDiagnosticoEndodoncia($req->id_paciente, $profesional->id_tipo_especialidad);
            $maxilar_inferior_gral_tratamiento_endo = $this->dameMaxilarInferiorGeneralTratamientoEndodoncia($req->id_paciente, $profesional->id_tipo_especialidad);
            $maxilar_inferior_gral_diagnostico_endo = $this->dameMaxilarInferiorGeneralDiagnosticoEndodoncia($req->id_paciente, $profesional->id_tipo_especialidad);
            $boca_completa_gral_tratamiento_endo = $this->dameCompletaEndoTratamiento($req->id_paciente, $profesional->id_tipo_especialidad);
            $boca_completa_gral_diagnostico_endo = $this->dameCompletaEndoDiagnostico($req->id_paciente, $profesional->id_tipo_especialidad);
            $valores = $this->dameValoresOdontograma($req->id_paciente, $req->id_ficha_atencion, $req->id_lugar_atencion, $profesional->id_tipo_especialidad);
            return [
                'mensaje' => 'OK',
                'examen' => $tratamiento,
                'maxilar_superior_gral_tratamiento' => $maxilar_superior_gral_tratamiento,
                'maxilar_superior_gral_diagnostico' => $maxilar_superior_gral_diagnostico,
                'maxilar_inferior_gral_tratamiento' => $maxilar_inferior_gral_tratamiento,
                'maxilar_inferior_gral_diagnostico' => $maxilar_inferior_gral_diagnostico,
                'boca_completa_gral_tratamiento' => $boca_completa_gral_tratamiento,
                'boca_completa_gral_diagnostico' => $boca_completa_gral_diagnostico,
                'maxilar_superior_gral_tratamiento_endo' => $maxilar_superior_gral_tratamiento_endo,
                'maxilar_superior_gral_diagnostico_endo' => $maxilar_superior_gral_diagnostico_endo,
                'maxilar_inferior_gral_tratamiento_endo' => $maxilar_inferior_gral_tratamiento_endo,
                'maxilar_inferior_gral_diagnostico_endo' => $maxilar_inferior_gral_diagnostico_endo,
                'boca_completa_gral_tratamiento_endo' => $boca_completa_gral_tratamiento_endo,
                'boca_completa_gral_diagnostico_endo' => $boca_completa_gral_diagnostico_endo,
                'valores_tratamientos' => $valores
            ];
        }
    }

    public function actualizar_tratamiento_dental(Request $req){
        try {

            if($req->espera_lab == 1){
                $estado = 3;
            }else if($req->trabajo_terminado == 1){
                $estado = 1;
            }else{
                $estado = 0;
            }
            $tratamiento = OdontogramaPaciente::find($req->id_odontograma);

            $tratamiento->estado = $estado;
            $tratamiento->agenda_control = $req->agenda_control == true ? 1 : 0;
            $tratamiento->observaciones = $req->comentarios_tratamiento;

            if($tratamiento->save()){
                $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();

                $odontograma_paciente = $this->dameOdontogramaPaciente($tratamiento->id_paciente, $tratamiento->id_ficha_atencion, $tratamiento->id_lugar_atencion, $profesional->id_tipo_especialidad);
                $odontograma = [];
                foreach($odontograma_paciente as $o){
                    if($o->presupuesto == 1){
                        $odontograma[] = $o;
                    }
                }
                $odontograma_paciente_vista = view('atencion_odontologica.generales.odontograma_adulto',['odontograma' => $odontograma])->render();
                $valores = $this->dameValoresOdontograma($tratamiento->id_paciente, $tratamiento->id_ficha_atencion, $tratamiento->id_lugar_atencion, $profesional->id_tipo_especialidad);
                $valor_total = $valores[0] + $valores[1] + $valores[2];

                $pagos_tratamientos_dentales = PagosPresupuestoDental::where('id_ficha_atencion', $tratamiento->id_ficha_atencion)->get();

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
                return ['status' => 1 ,'mensaje' => 'Se ha actualizado correctamente', 'odontograma_paciente' => $odontograma_paciente,'odontograma' => $odontograma, 'valores' => $valores,'odontograma_paciente_vista' => $odontograma_paciente_vista];
            }else{
                return ['status' => 0, 'mensaje' => 'Ha ocurrido un error'];
            }
        } catch (\Exception $e) {
            return ['status' => 0, 'mensaje' => $e->getMessage()];
        }


    }

    public function dameValoresOdontograma($id_paciente, $id_ficha_atencion, $id_lugar_atencion, $tipo_especialidad){
        $fichaController = new ficha_atencionController;
        $valores = $fichaController->dameValores($id_paciente, $id_ficha_atencion, $id_lugar_atencion, $tipo_especialidad);
        return $valores;
    }

    public function dameMaxilarSuperiorGeneralTratamiento($id_paciente, $tipo_especialidad){
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $examenes = ExamenesBocaGeneral::select('examenes_boca_general.*','diagnosticos_dental.valor')
                                            ->join('diagnosticos_dental','examenes_boca_general.diagnostico_tratamiento','=','diagnosticos_dental.descripcion')
                                            ->where('examenes_boca_general.id_paciente',$id_paciente)
                                            ->where('examenes_boca_general.tipo_especialidad',$tipo_especialidad)
                                            ->where('examenes_boca_general.localizacion','Maxilar superior')
                                            ->where('examenes_boca_general.tipo_examen',1)
                                            ->where('examenes_boca_general.id_profesional',$profesional->id)
                                            ->where('examenes_boca_general.especialidad_examen','tratamiento')
                                            ->get();
        return $examenes;
    }

    public function dameMaxilarSuperiorGeneralDiagnostico($id_paciente, $tipo_especialidad){
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $examenes = ExamenesBocaGeneral::select('examenes_boca_general.*','diagnosticos_dental.valor')

        ->join('diagnosticos_dental','examenes_boca_general.diagnostico_tratamiento','=','diagnosticos_dental.descripcion')
        ->where('localizacion','Maxilar superior')
        ->where('examenes_boca_general.tipo_examen',1)
        ->where('especialidad_examen','diagnostico')
        ->where('examenes_boca_general.id_paciente',$id_paciente)
        ->where('examenes_boca_general.id_profesional',$profesional->id)
        ->where('examenes_boca_general.tipo_especialidad',$tipo_especialidad)
        ->get();
        return $examenes;
    }

    public function guardar_imagenes_dental_paciente(Request $req){
        try {
            if($req->seccion == 'odontop'){
                $existe = ImagenesDentalPaciente::where('id_ficha_atencion', $req->id_ficha_atencion)->first();
                if($existe){
                    $rx = $existe;
                }else{
                    $rx = new ImagenesDentalPaciente;
                }
            }else{
                $rx = new ImagenesDentalPaciente;
            }
            
            $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
           
            $rx->id_ficha_atencion = $req->id_ficha_atencion;
            $rx->id_paciente = $req->id_paciente;
            $rx->id_profesional = $profesional->id;
            $rx->id_lugar_atencion = $req->id_lugar_atencion;
            $rx->id_especialidad = $req->id_especialidad;
            $rx->id_tipo_especialidad = $profesional->id_tipo_especialidad;
            $rx->numero_pieza = $req->numero_pieza;
            $rx->observaciones_ex = $req->observaciones_ex;
            $rx->seccion = $req->seccion;
            $rx->zona_y_motivo = $req->zona_motivo ? $req->zona_motivo : 'SIN ZONA NI MOTIVO';
            
            // 🔧 Lógica para acumular observaciones con fecha y hora
            if($req->observaciones && $req->observaciones != ''){
                $nuevaObservacion = '[' . now()->format('d/m/Y H:i:s') . '] ' . $req->observaciones;
                
                if($rx->exists && $rx->observaciones && $rx->observaciones != 'SIN OBSERVACIONES'){
                    // Si ya existe un registro con observaciones, agregar la nueva al final
                    $rx->observaciones = $rx->observaciones . "\n" . $nuevaObservacion;
                }else{
                    // Si es nuevo o no tiene observaciones previas
                    $rx->observaciones = $nuevaObservacion;
                }
            }else{
                // Si no se envían observaciones nuevas, mantener las existentes o poner valor por defecto
                if(!$rx->exists || !$rx->observaciones){
                    $rx->observaciones = 'SIN OBSERVACIONES';
                }
            }
            
            $rx->biopsia = $req->biopsia == 'true' ? 1 : 0;
            $rx->estado = 1;
            
            if($rx->save()){
                if($req->seccion == 'gral'){
                    $imagenes = $this->dameInfoImagenesDentalPaciente($req->id_paciente,'gral');
                    $v = view('atencion_odontologica.include.imagenes_dental_todas',['imagenes' => $imagenes])->render();
                }elseif($req->seccion == 'implantologia'){
                    $imagenes = $this->dameInfoImagenesDentalPaciente($req->id_paciente,'implantologia');
                    $v = view('atencion_odontologica.include.imagenes_dental_preimplante_todas',['imagenes' => $imagenes])->render();
                }elseif($req->seccion == 'odontop'){
                    $imagenes = $this->dameInfoImagenesDentalPaciente($req->id_paciente,'odontop');
                    $v = view('atencion_odontologica.include.imagenes_dental_odontop_todas',['imagenes' => $imagenes])->render();
                }elseif($req->seccion=='periodoncica'){
                    $imagenes = $this->dameInfoImagenesDentalPaciente($req->id_paciente,'periodoncica');
                    $v = view('atencion_odontologica.include.imagenes_dental_periodoncia_todas',['imagenes' => $imagenes])->render();
                }else{
                    $imagenes = $this->dameInfoImagenesDentalPaciente($req->id_paciente,'periodoncica');
                    $v = view('atencion_odontologica.include.imagenes_dental_period_todas',['imagenes' => $imagenes])->render();
                }
                return ['mensaje' => 'OK', 'v' => $v,'rx' => $rx];

            }else{
                return ['mensaje' => 'error'];
            }
        } catch (\Exception $e) {
            return ['mensaje' => 'error','v' => $e->getMessage()];
        }
    }

    public function recargar_imagenes_dental_paciente(Request $req){

        if($req->seccion == 'gral'){
            // Orden correcto: id_paciente, seccion, id_ficha_atencion
            $imagenes = $this->dameInfoImagenesDentalPaciente($req->id_paciente, 'gral', $req->id_ficha_atencion);
            $v = view('atencion_odontologica.include.imagenes_dental_todas',['imagenes' => $imagenes])->render();
        }elseif($req->seccion == 'implantologia'){
            $imagenes = $this->dameInfoImagenesDentalPaciente($req->id_paciente, 'implantologia', $req->id_ficha_atencion);
            $v = view('atencion_odontologica.include.imagenes_dental_preimplante_todas',['imagenes' => $imagenes])->render();
        }elseif($req->seccion == 'odontop'){
            $imagenes = $this->dameInfoImagenesDentalPaciente($req->id_paciente, 'odontop', $req->id_ficha_atencion);
            $v = view('atencion_odontologica.include.imagenes_dental_odontop_todas',['imagenes' => $imagenes])->render();
        }elseif($req->seccion=='periodoncica'){
            // Periodoncica no usa id_ficha_atencion
            $imagenes = $this->dameInfoImagenesDentalPaciente($req->id_paciente, 'periodoncica');
            $v = view('atencion_odontologica.include.imagenes_dental_periodoncia_todas',['imagenes' => $imagenes])->render();
        }else{
            $imagenes = $this->dameExamenesPiezaDentalOraxRxEnd($req->id_paciente, $req->id_ficha_atencion);

            $v = view('atencion_odontologica.include.examenes_dental_oral_rx_end_todos',['examenes' => $imagenes])->render();
        }
        return ['mensaje' => 'OK', 'v' => $v];
    }

    public function recargar_imagenes_dental_general_paciente(Request $request){
     
        $examenes = $this->dameExamenesPiezaDentalOraxRx($request->id_paciente);
     
        $v = view('atencion_odontologica.include.examenes_dental_oral_rx_todos',['examenes' => $examenes])->render();
        return ['mensaje' => 'OK', 'v' => $v,'examenes' => $examenes];
    }

    public function mostrar_nuevas_imagenes_dental(Request $req){
  
        $idCounter = $req->counter ? $req->counter : 0;

        $opt = $req->tipo;
        $responsable = User::find(Auth::user()->id);

        if(!$opt){
            $v = view('atencion_odontologica.include.imagenes_dental',['counter' => $idCounter,'opt' => $opt])->render();
        }elseif($opt == 'preimplante' || $opt == 'periodoncica'){
            $v = view('atencion_odontologica.include.imagenes_preimplante',['count' => $idCounter,'opt' => $opt])->render();
        }elseif($opt == 'odontop'){
            $v = view('atencion_odontologica.include.imagenes_odontopediatria',['count' => $idCounter,'opt' => $opt])->render();
        }

        return ['mensaje' => 'OK','v' => $v];
    }

    public function eliminar_pieza_dental_imagenes_paciente(Request $req){
        
        $imagen_info = ImagenesDentalPaciente::find($req->id);
        $seccion =  $imagen_info->seccion;
        if($imagen_info->delete()){
            if($seccion == 'gral'){
                $imagenes = $this->dameInfoImagenesDentalPaciente($imagen_info->id_paciente,'gral');
                $v = view('atencion_odontologica.include.imagenes_dental_todas',['imagenes' => $imagenes])->render();
            }elseif($seccion == 'implantologia'){
                $imagenes = $this->dameInfoImagenesDentalPaciente($imagen_info->id_paciente,'implantologia');
                $v = view('atencion_odontologica.include.imagenes_dental_preimplante_todas',['imagenes' => $imagenes])->render();
            }else{
                $imagenes = $this->dameInfoImagenesDentalPaciente($imagen_info->id_paciente,'periodoncica');
                $v = view('atencion_odontologica.include.imagenes_dental_periodoncia_todas',['imagenes' => $imagenes])->render();
            }

            return ['mensaje' => 'OK', 'v' => $v,'seccion' => $seccion];
        }else{
            return ['mensaje' => 'error'];
        }
    }

    public function eliminar_pieza_dental_tto_impl(Request $req){

        $procedimiento = ProcedimientosImplantes::find($req->id);
        if($req->rehab == 1){
            $procedimiento = ProcedimientosImplantesRehab::find($req->id);
        }

        $pieza = $procedimiento->numero_pieza;
        $id_procedimiento = $req->id_procedimiento;
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $odontograma = $this->dameOdontogramaPaciente($req->id_paciente, $req->id_ficha_atencion, $req->id_lugar_atencion, $profesional->id_tipo_especialidad);


        foreach($odontograma as $o){
            if($o->id == $id_procedimiento){
                $o->estado = 0;
                $o->save();
            }
        }
        $id_paciente = $procedimiento->id_paciente;
        $id_profesional = $procedimiento->id_profesional;
        if($procedimiento->delete()){
            $examenes = $this->dameProcedimientosImplantes($id_paciente, $id_profesional, $req->id_ficha_atencion);
            if($req->rehab == 1){
                $examenes = $this->dameProcedimientosImplantesRehab($id_paciente, $id_profesional, $req->id_ficha_atencion);
            }
            $tratamientos_implantologia = TratamientosImplantologia::orderBy('descripcion','asc')->get();
            $materiales_implantologia = MaterialesImplantologia::orderBy('descripcion','asc')->get();
            $dc = new DentalController;
            $odontograma_paciente_historial = $dc->dame_odontograma_paciente_historial($id_paciente);
            $odontograma_paciente_vista = view('atencion_odontologica.generales.odontograma_adulto',['odontograma_historial' => $odontograma_paciente_historial])->render();

            $v = view('atencion_odontologica.include.procedimientos_implantes_todos',[
                'examenes' => $examenes,
                'tratamientos_implantologia' => $tratamientos_implantologia,
                'materiales_implantologia' => $materiales_implantologia,
                'odontograma' => $odontograma
                ])->render();
            if($req->rehab == 1){
                $v = view('atencion_odontologica.include.procedimientos_implantes_rehab_todos',[
                    'examenes' => $examenes,
                    'tratamientos_implantologia' => $tratamientos_implantologia,
                    'materiales_implantologia' => $materiales_implantologia,
                    'odontograma' => $odontograma
                ])->render();
            }
                return ['mensaje' => 'OK', 'v' => $v,'examenes' => $examenes, 'odontograma' => $odontograma,'odontograma_paciente_vista' => $odontograma_paciente_vista];
        }
    }

    public function eliminar_pieza_dental_tto_period(Request $req){
      
        $procedimiento = ProcedimientosPeriodoncia::find($req->id);
     

        $pieza = $procedimiento->numero_pieza;
        $id_procedimiento = $req->id_procedimiento;
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $odontograma = $this->dameOdontogramaPaciente($req->id_paciente, $req->id_ficha_atencion, $req->id_lugar_atencion, $profesional->id_tipo_especialidad);


        foreach($odontograma as $o){
            if($o->id == $id_procedimiento){
                $o->estado = 0;
                $o->save();
            }
        }
        $id_paciente = $procedimiento->id_paciente;
        $id_profesional = $procedimiento->id_profesional;
        if($procedimiento->delete()){
            $examenes = $this->dameProcedimientosPeriodoncia($id_paciente, $id_profesional, $req->id_ficha_atencion);
        
            $tratamientos_implantologia = TratamientosImplantologia::orderBy('descripcion','asc')->get();
            $materiales_implantologia = MaterialesImplantologia::orderBy('descripcion','asc')->get();
            $dc = new DentalController;
            $odontograma_paciente_historial = $dc->dame_odontograma_paciente_historial($id_paciente);
            $odontograma_paciente_vista = view('atencion_odontologica.generales.odontograma_adulto',['odontograma_historial' => $odontograma_paciente_historial])->render();

            $v = view('atencion_odontologica.include.procedimientos_periodoncia_todos',[
                'examenes' => $examenes,
                'tratamientos_implantologia' => $tratamientos_implantologia,
                'materiales_implantologia' => $materiales_implantologia,
                'odontograma' => $odontograma
                ])->render();
            
                return ['mensaje' => 'OK', 'v' => $v,'examenes' => $examenes, 'odontograma' => $odontograma,'odontograma_paciente_vista' => $odontograma_paciente_vista];
        }
    }

    public function eliminar_pieza_dental_post_impl(Request $req){
        $procedimiento = ProcedimientosPostImplantes::find($req->id);

        $id_paciente = $procedimiento->id_paciente;
        $id_profesional = $procedimiento->id_profesional;
        if($procedimiento->delete()){
            $examenes = $this->dameProcedimientosImplantes($id_paciente, $id_profesional,$req->id_ficha_atencion,'post');
            $v = view('atencion_odontologica.include.procedimientos_post_implantes_todos',['examenes' => $examenes])->render();
                return ['mensaje' => 'OK', 'v' => $v,'examenes' => $examenes];
        }
    }

    public function eliminar_grupo_dental_post_impl(Request $req){
        $grupo_piezas = ProcedimientosGruposPostImplantes::find($req->id);
        $id_paciente = $grupo_piezas->id_paciente;
        $id_profesional = $grupo_piezas->id_profesional;
        if($grupo_piezas->delete()){
            $examenes = $this->dameProcedimientosGruposImplantes($id_paciente, $id_profesional,'post');
            $v = view('atencion_odontologica.include.procedimientos_grupos_post_impl_todos',['examenes' => $examenes])->render();
                return ['mensaje' => 'OK', 'v' => $v,'examenes' => $examenes];
        }else{
            return ['mensaje' => 'error'];
        }
    }

    public function guardar_pieza_dental_examen_oral_imagenes(Request $req){
        try {

            $rx = new ImagenesDentalPaciente;
            $rx->id_ficha_atencion = $req->id_ficha_atencion;
            $rx->id_paciente = $req->id_paciente;
            $rx->id_profesional = $req->id_profesional;
            $rx->id_lugar_atencion = $req->id_lugar_atencion;
            $rx->id_especialidad = $req->id_especialidad;
            $rx->zona_y_motivo = $req->zona_motivo ? $req->zona_motivo : 'SIN INFORMACION';
            $rx->observaciones = $req->obs ? $req->obs : 'SIN OBSERVACIONES';
            $rx->estado = 1; // por defecto
            if($rx->save()){
                $imagenes = $this->dameInfoImagenesDentalPaciente($rx->id_paciente,'gral');
                $v = view('atencion_odontologica.include.examenes_dental_oral_todos',['imagenes' => $imagenes])->render();
                return ['mensaje' => 'OK','v' => $v,'rx' => $rx];
            }else{
                return ['mensaje' => 'error'];
            }
        } catch (\Exception $e) {
            return ['mensaje' => 'error','v' => $e->getMessage()];
        }

    }

    public function mostrar_nueva_pieza_dental_end(Request $req){

        $idCounter = $req->counter;
        $responsable = User::find(Auth::user()->id);
        $v = view('atencion_odontologica.include.examenes_dental_dolor_end',['counter' => $idCounter])->render();
        return ['mensaje' => 'OK','v' => $v];
    }

    public function eliminar_nueva_pieza_dental(Request $req){
        $examen = ExamenesDentalDolor::find($req->id);
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        if($examen->delete()){
            $examenes = $this->dameExamenesPiezaDentalDolor($req->id_paciente, $profesional->id_tipo_especialidad);
            if(count($examenes) == 0)
            {
                // si no hay ciclos de control se inicia en 1 para manejar el id en la vista
                $contador_div_examenes = 1;
            }else{
                // si hay ciclos de control se suma 1 para manejar el id en la vista
                $contador_div_examenes = count($examenes) + 1;
            }

            $v = view('atencion_odontologica.include.examenes_dental_dolor_todos', compact('examenes'))->render();
            return ['mensaje' => 'OK','vista' => $v];
        }
    }

    public function eliminar_nueva_pieza_dental_odontop(Request $req){

        $examen = ExamenesDentalDolor::find($req->id);
        if($examen->delete()){
            $examenes = $this->dameExamenesPiezaDentalOdontopDolor($req->id_paciente);
            if(count($examenes) == 0)
            {
                // si no hay ciclos de control se inicia en 1 para manejar el id en la vista
                $contador_div_examenes = 1;
            }else{
                // si hay ciclos de control se suma 1 para manejar el id en la vista
                $contador_div_examenes = count($examenes) + 1;
            }

            $v = view('atencion_odontologica.include.examenes_dental_dolor_odontop_todos', compact('examenes'))->render();
            return ['mensaje' => 'OK','vista' => $v];
        }
    }

    public function eliminar_pieza_dental_rx(Request $req){
       $examen = ExamenesDentalOralRx::find($req->id);
       if($examen->delete()){
            $examenes = $this->dameExamenesPiezaDentalOraxRx($req->id_paciente);
            $v = view('atencion_odontologica.include.examenes_dental_oral_rx_todos',['examenes' => $examenes])->render();
            return ['mensaje' => 'OK','v' => $v];
        }
    }

    public function eliminar_pieza_dental_rx_end(Request $req){
        $examen = ExamenesDentalOralRx::find($req->id);
        if($examen->delete()){
            $examenes = $this->dameExamenesPiezaDentalOraxRxEnd($req->id_paciente, $req->id_ficha_atencion);
            $v = view('atencion_odontologica.include.examenes_dental_oral_rx_end_todos',['examenes' => $examenes])->render();
            return ['mensaje' => 'OK','v' => $v];
        }
    }

    public function eliminar_nueva_pieza_dental_rx_odontop(Request $req){

        $examen = ExamenesDentalOralRx::find($req->id);
        if($examen->delete()){
            $examenes = $this->dameExamenesPiezaDentalOraxRxOdontop($req->id_paciente);
            $v = view('atencion_odontologica.include.examenes_dental_dolor_odontop_todos',['examenes' => $examenes])->render();
            return ['mensaje' => 'OK','v' => $v,'examenes' => $examenes];
        }
    }

    public function eliminar_nueva_pieza_dental_end(Request $req){
        try {

            $examen = ExamenesDentalDolor::find($req->id);

        if($examen->delete()){
            if($req->tipo_examen == 'endo'){
                $examenes = $this->dameExamenesPiezaDentalEndDolor($req->id_paciente);
                if(count($examenes) == 0)
                {
                    // si no hay ciclos de control se inicia en 1 para manejar el id en la vista
                    $contador_div_examenes = 1;
                }else{
                    // si hay ciclos de control se suma 1 para manejar el id en la vista
                    $contador_div_examenes = count($examenes) + 1;
                }

                $v = view('atencion_odontologica.include.examenes_dental_dolor_end_todos', compact('examenes'))->render();
                return ['mensaje' => 'OK','vista' => $v];
            }else{
                $examenes = $this->dameExamenesPiezaDentalOdontopDolor($req->id_paciente);
                $v = view('atencion_odontologica.include.examenes_dental_dolor_odontop_todos', compact('examenes'))->render();
                return ['mensaje' => 'OK','vista' => $v];
            }

        }
        } catch (\Exception $e) {
            //throw $th;
            return ['mensaje' => $e->getMessage()];
        }

    }

    public function guardar_pieza_dental_examen_oral_rx(Request $req){
        try {

            $rx = new ExamenesDentalOralRx;
            $rx->id_ficha_atencion = $req->id_fc;
            $rx->id_paciente = $req->id_paciente;
            $rx->id_profesional = $req->id_profesional;
            $rx->id_lugar_atencion = $req->id_lugar_atencion;
            $rx->numero_piezas = $req->numero_pieza;  // El cast 'array' en el modelo lo convierte automáticamente
            $rx->espacio_periodontal = $req->espacio_periodontal_aplical;
            $rx->hueso_alveolal = $req->hueso_alveolar_apical;
            $rx->informe = $req->informe_radiologo;
            $rx->observaciones = $req->observaciones_radiologo ? $req->observaciones_radiologo : 'SIN OBSERVACIONES';

            if($rx->save()){
                $examenes = $this->dameExamenesPiezaDentalOraxRx($rx->id_paciente);
                $v = view('atencion_odontologica.include.examenes_dental_oral_rx_todos',['examenes' => $examenes])->render();
                return ['mensaje' => 'OK','v' => $v,'rx' => $rx];
            }else{
                return ['mensaje' => 'error'];
            }
        } catch (\Exception $e) {
            return ['mensaje' => 'error','v' => $e->getMessage()];
        }

    }

    public function recargar_piezas_dental_examen_oral_rx(Request $req){
        $examenes = $this->dameExamenesPiezaDentalOraxRx($req->id_paciente);
        $v = view('atencion_odontologica.include.examenes_dental_oral_rx_todos',['examenes' => $examenes])->render();
        return ['mensaje' => 'OK','v' => $v];
    }

    public function guardar_pieza_dental_examen_dolor_odontop(Request $req){
        return 'hola';
    }

     public function guardar_pieza_dental_examen_oral_rx_end(Request $req){
        try {
            // Validar campos requeridos
            $req->validate([
                'numero_pieza' => 'required',
                'id_paciente' => 'required|integer',
                'id_profesional' => 'required|integer',
                'id_lugar_atencion' => 'required|integer',
                'id_fc' => 'required|integer',
                'tipo_examen' => 'required|string',
            ]);

            // Determinar tipo de examen
            if($req->tipo_examen == 'odontop'){
                $tipo_examen = 3;
            }elseif($req->tipo_examen == 'endo'){
                $tipo_examen = 2;
            }else{
                $tipo_examen = 1;
            }

            // Normalizar el array de piezas
            $numero_piezas_array = is_array($req->numero_pieza) ? $req->numero_pieza : [$req->numero_pieza];

            // Verificar si ya existe la pieza (comparando JSON con sort para consistencia)
            sort($numero_piezas_array); // Ordenar para comparación consistente
            $numero_piezas_json = json_encode($numero_piezas_array);

            $existe = ExamenesDentalOralRx::where('id_paciente', $req->id_paciente)
                        ->where('id_ficha_atencion', $req->id_fc)
                        ->where('tipo_examen', $tipo_examen)
                        ->get()
                        ->filter(function($item) use ($numero_piezas_array) {
                            $item_piezas = $item->numero_piezas;
                            if (is_array($item_piezas)) {
                                sort($item_piezas);
                                return json_encode($item_piezas) === json_encode($numero_piezas_array);
                            }
                            return false;
                        })
                        ->first();

            if($existe){
                return ['mensaje' => 'error', 'v' => 'Las piezas ' . implode(', ', $numero_piezas_array) . ' ya existen para este examen'];
            }

            // Crear nuevo registro
            $rx = new ExamenesDentalOralRx;
            $rx->id_ficha_atencion = $req->id_fc;
            $rx->id_paciente = $req->id_paciente;
            $rx->id_profesional = $req->id_profesional;
            $rx->id_lugar_atencion = $req->id_lugar_atencion;
            $rx->numero_piezas = $numero_piezas_array;  // El cast 'array' lo convierte automáticamente
            $rx->espacio_periodontal = $req->espacio_periodontal_aplical;
            $rx->hueso_alveolal = $req->hueso_alveolar_apical;
            $rx->informe = $req->informe_radiologo ?? '';
            $rx->observaciones = $req->obs ?? 'SIN OBSERVACIONES';
            $rx->tipo_examen = $tipo_examen;

            if(!$rx->save()){
                return ['mensaje' => 'error', 'v' => 'No se pudo guardar el examen'];
            }

            // Obtener examenes según tipo
            switch($tipo_examen) {
                case 2: // Endodoncia
                    $examenes = $this->dameExamenesPiezaDentalOraxRxEnd($rx->id_paciente, $req->id_fc);
                    $v = view('atencion_odontologica.include.examenes_dental_oral_rx_end_todos', ['examenes' => $examenes])->render();
                    break;

                case 3: // Odontopediatría
                    $examenes = $this->dameExamenesPiezaDentalOraxRxOdontop($rx->id_paciente, $req->id_fc);
                    $v = view('atencion_odontologica.include.examenes_dental_dolor_odontop_todos', ['examenes' => $examenes])->render();
                    break;

                default: // General
                    $examenes = $this->dameExamenesPiezaDentalOraxRx($rx->id_paciente);
                    $v = view('atencion_odontologica.include.examenes_dental_oral_rx_todos', ['examenes' => $examenes])->render();
                    break;
            }

            return [
                'mensaje' => 'OK',
                'v' => $v,
                'rx' => $rx,
                'examenes' => $examenes
            ];

        } catch (\Illuminate\Validation\ValidationException $e) {
            return ['mensaje' => 'error', 'v' => 'Campos requeridos faltantes: ' . implode(', ', array_keys($e->errors()))];
        } catch (\Exception $e) {

            return ['mensaje' => 'error', 'v' => 'Error: ' . $e->getMessage()];
        }
    }

    public function mostrar_nueva_pieza_dental_rx(Request $req){
        $idCounter = $req->counter ? $req->counter : 199;
        $v = view('atencion_odontologica.include.rx_pieza_dental',['counter' => $idCounter])->render();
        return ['mensaje' => 'OK', 'v' => $v];
    }

    public function mostrar_nueva_pieza_dental_rx_end(Request $req){

        $idCounter = $req->counter ? $req->counter : 1;
        if($req->tipo_examen == 'endo'){
            $v = view('atencion_odontologica.include.rx_pieza_dental_end',['counter' => $idCounter])->render();
        }else if($req->tipo_examen == 'odontop'){
            $examenes = $this->dameExamenesPiezaDentalOraxRxOdontop($req->id_paciente);
            $vista_piezas = view('atencion_odontologica.include.examenes_dental_dolor_odontop_todos',['examenes' => $examenes])->render();
            $v = view('atencion_odontologica.include.rx_pieza_dental_odontop',['counter' => $idCounter])->render();
            return ['mensaje' => 'OK', 'v' => $v, 'vista_piezas' => $vista_piezas];
        }

        return ['mensaje' => 'OK', 'v' => $v];
    }

    public function mostrar_nueva_pieza_dental_examen(Request $req){

        $idCounter = $req->count ? $req->count : 1;
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();

        $odontograma = $this->dameOdontogramaPaciente($req->id_paciente, $req->id_ficha_atencion, $req->id_lugar_atencion, $profesional->id_tipo_especialidad);
        $v = view('atencion_odontologica.include.pieza_dental_examen',['counter' => $idCounter, 'odontograma' => $odontograma])->render();
        return ['mensaje' => 'OK', 'v' => $v,'odontograma' => $odontograma];
    }

    public function guardar_pieza_dental_tto_gral(Request $request){
        try {

            // Actualiza el estado en la tabla OdontogramaPaciente
            $piezaModelo = OdontogramaPaciente::where('id', $request->procedimiento)
                ->first();

            if ($piezaModelo) {
                $piezaModelo->estado = 1;
                $piezaModelo->save();
            }

            $profesional = Profesional::find($request->id_profesional);

            // Datos que se devuelven una vez guardado todo
            $examenes = $this->dameProcedimientosImplantes($request->id_paciente, $profesional->id, $request->id_ficha_atencion);
            $tratamientos_implantologia = TratamientosImplantologia::orderBy('descripcion','asc')->get();
            $materiales_implantologia = MaterialesImplantologia::orderBy('descripcion','asc')->get();

            $odontograma = $this->dameOdontogramaPaciente($request->id_paciente, $request->id_ficha_atencion, $request->id_lugar_atencion, $profesional->id_tipo_especialidad);

            // buscamos el presupuesto dental
            $presupuesto = PresupuestosDental::where('id_paciente', $request->id_paciente)
                ->where('id_ficha_atencion', $request->id_ficha_atencion)
                ->where('estado', 1)
                ->first();

            if ($presupuesto) {
                $total_piezas = count($odontograma);
                $piezas_estado_1 = 0;

                foreach ($odontograma as $pieza) {
                    if ($pieza->estado == 1) {
                        $piezas_estado_1++;
                    }
                }

                // Si todas las piezas están en estado 1, cerrar el presupuesto
                if ($total_piezas > 0 && $piezas_estado_1 == $total_piezas) {
                    $presupuesto->estado = 0;
                    $presupuesto->save();
                }
            }

            $dc = new DentalController;
            $odontograma_paciente_historial = $dc->dame_odontograma_paciente_historial($request->id_paciente);
            $odontograma_paciente_vista = view('atencion_odontologica.generales.odontograma_adulto',['odontograma_historial' => $odontograma_paciente_historial])->render();

            $v = view('atencion_odontologica.include.procedimientos_implantes_todos', [
                'examenes' => $examenes,
                'tratamientos_implantologia' => $tratamientos_implantologia,
                'materiales_implantologia' => $materiales_implantologia,
            ])->render();

            return [
                'mensaje' => 'OK',
                'v' => $v,
                'examenes' => $examenes,
                'odontograma' => $odontograma,
                'odontograma_paciente_vista' => $odontograma_paciente_vista
            ];
        } catch (\Exception $e) {
            //throw $th;
            return ['mensaje' => $e->getMessage()];
        }

    }

    public function mostrar_nueva_pieza_dental_examen_odontop(Request $req){
        $idCounter = $req->count ? $req->count : 1;
        $v = view('atencion_odontologica.include.pieza_dental_examen_odontop',['counter' => $idCounter])->render();
        return ['mensaje' => 'OK', 'v' => $v];
    }

    public function mostrar_nueva_pieza_dental_end_examen(Request $req){
        try {

            $idCounter = $req->count ? $req->count : 1;
            $tipo_examen = $req->tipo_examen;
            if($tipo_examen == 'endo'){
                $v = view('atencion_odontologica.include.pieza_dental_examen_end',['counter' => $idCounter, 'tipo_examen' => $tipo_examen])->render();
                return ['mensaje' => 'OK', 'v' => $v];
            }
            if($tipo_examen == 'odontop'){
                $v = view('atencion_odontologica.include.pieza_dental_examen_pieza_odontop',['counter' => $idCounter, 'tipo_examen' => $tipo_examen])->render();
                return ['mensaje' => 'OK', 'v' => $v];
            }

        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }

    public function mostrar_nueva_pieza_dental_hist(Request $req){
        try {
            $idCounter = $req->count ? $req->count : 1;
            $seccion = $req->seccion;
            $v = view('atencion_odontologica.include.pieza_dental_hist',['counter' => $idCounter,'seccion' => $seccion])->render();
            return ['mensaje' => 'OK', 'v' => $v];


        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }
    }

    public function guardar_pieza_dental_examen_pieza_period(Request $req){
 
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $examen = new ExamenesDentalPeriodoncia;
        $examen->id_paciente = $req->id_paciente;
        $examen->id_lugar_atencion = $req->id_lugar_atencion;
        $examen->id_profesional = $profesional->id;
        $examen->id_ficha_atencion = $req->id_ficha_atencion;
        
        // Campos específicos de periodoncia
        $examen->numero_pieza = $req->numero_pieza;
        $examen->sangrado = $req->sangrado;
        $examen->supuracion = $req->supuracion;
        $examen->higiene = $req->higiene;
        $examen->alt_mg = $req->alt_mg;
        $examen->p_sondaje = $req->p_sondaje;
        $examen->mov_dent = $req->mov_dent;
        $examen->furca = $req->furca;
        $examen->tipo_sonda = $req->tipo_sonda;
        $examen->obs_perio_pza = $req->observaciones;
        
        // Campos de biopsia
        $examen->biopsia = $req->biopsia == "1" ? "Sí" : "No";
        $examen->zona_motivo = $req->zona_y_motivo;
        $examen->observaciones_biopsia = $req->obs_result_biopsia;

        if($examen->save()){
            $examenes = $this->dameExamenesPiezaDentalPiezaPeriod($req->id_paciente, $profesional->id_tipo_especialidad);
            $v = view('atencion_odontologica.include.examenes_dental_pieza_period_todos',['examenes' => $examenes])->render();

        }

        return ['mensaje' => 'OK','v' => $v,'examenes' => $examenes];
    }

    public function mostrar_nueva_pieza_dental_period(Request $req){
        try {
            $idCounter = $req->count ? $req->count : 1;
            $v = view('atencion_odontologica.include.pieza_dental_period',['counter' => $idCounter])->render();
            return ['mensaje' => 'OK', 'v' => $v];


        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }
    }


    public function mostrar_nueva_pieza_dental_post_impl(Request $req){
        try {

            $idCounter = $req->count ? $req->count : 1;
            $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
            $odontograma = $this->dameOdontogramaPaciente($req->id_paciente, $req->id_ficha_atencion, $req->id_lugar_atencion, $profesional->id_tipo_especialidad);
            $v = view('atencion_odontologica.include.pieza_dental_post_impl',[
                'counter' => $idCounter,
                'odontograma' => $odontograma
                ])->render();
            return ['mensaje' => 'OK', 'v' => $v];


        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }
    }

    public function eliminar_imagen_rx_paciente(Request $req){
        $imagen = ImagenesDentalRxPaciente::find($req->id);
        if($imagen->delete()){
            $examenes = $this->dameExamenesPiezaDentalOraxRx($req->id_paciente);
            $v = view('atencion_odontologica.include.examenes_dental_oral_rx_todos',['examenes' => $examenes])->render();

            return ['mensaje' => 'OK','v' => $v];
        }else{
            return ['mensaje' => 'error'];
        }
    }

    public function dameExamenesPiezaDentalPiezaPeriod($id_paciente, $id_tipo_especialidad){
        $examenes = ExamenesDentalPeriodoncia::where('id_paciente',$id_paciente)->get();
        return $examenes;
    }

    public function eliminar_imagen_rx_end_paciente(Request $req){
        $imagen = ImagenesDentalRxPaciente::find($req->id);
        if($imagen->delete()){
            $examenes = $this->dameExamenesPiezaDentalOraxRxEnd($req->id_paciente, $req->id_fc);
            $v = view('atencion_odontologica.include.examenes_dental_oral_rx_end_todos',['examenes' => $examenes])->render();

            return ['mensaje' => 'OK','v' => $v];
        }else{
            return ['mensaje' => 'error'];
        }
    }

    public function dameExamenesPiezaDentalDolor($id_paciente, $tipo_especialidad){
        $examenes = ExamenesDentalDolor::where('id_paciente',$id_paciente)->where('tipo_examen',1)->where('tipo_especialidad',$tipo_especialidad)->get();
        return $examenes;
    }


    public function dameExamenesPiezaDentalOraxRx($id_paciente){
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $examenes = ExamenesDentalOralRx::where('id_paciente',$id_paciente)->where('id_profesional', $profesional->id)->get();
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
            $e->numero_piezas = $e->numero_piezas;
        }

        return $examenes;
    }

    public function dameExamenesPiezaDentalOraxRxEnd($id_paciente, $id_ficha_atencion){
        try {
            $examenes = ExamenesDentalOralRx::where('id_paciente',$id_paciente)->where('id_ficha_atencion', $id_ficha_atencion)->where('tipo_examen',2)->get();
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
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }
        
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

    public function dameInfoImagenesDentalPaciente($id_paciente, $seccion, $id_ficha_atencion = null)
    {
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

        if (!$profesional) {
            \Log::warning('Profesional no encontrado para usuario', ['user_id' => Auth::user()->id]);
            return collect();
        }

        // Log para debugging
        \Log::info('Buscando imágenes dentales', [
            'id_paciente' => $id_paciente,
            'seccion' => $seccion,
            'id_ficha_atencion' => $id_ficha_atencion,
            'id_profesional' => $profesional->id
        ]);

        // Obtén las imágenes del paciente
        $imagenes = ImagenesDentalPaciente::where('id_paciente', $id_paciente)
            ->where('id_profesional', $profesional->id)
            ->where('seccion', $seccion)
            ->when($id_ficha_atencion, function ($query, $id_ficha_atencion) {
                return $query->where('id_ficha_atencion', $id_ficha_atencion);
            })
            ->get();

        \Log::info('Imágenes encontradas', ['count' => $imagenes->count()]);

        // Itera sobre cada imagen para procesar `paths_imagenes`
        foreach ($imagenes as $imagen) {
            if (!empty($imagen->paths_imagenes)) {
                // Si ya es un array (cast en el modelo), no decodificar
                if (is_array($imagen->paths_imagenes)) {
                    // Ya está como array gracias al cast
                    continue;
                }

                // Si es string, decodificar
                $imagenes_decoded = json_decode($imagen->paths_imagenes, true);

                if (json_last_error() === JSON_ERROR_NONE && is_array($imagenes_decoded)) {
                    $imagen->paths_imagenes = $imagenes_decoded;
                } else {
                    \Log::warning('Error decodificando paths_imagenes', [
                        'id' => $imagen->id,
                        'error' => json_last_error_msg()
                    ]);
                    $imagen->paths_imagenes = [];
                }
            } else {
                $imagen->paths_imagenes = [];
            }
        }

        return $imagenes;
    }

    public function eliminar_imagen_dental_paciente(Request $req){
        $imagen = ImagenesDentalPaciente::find($req->id);
        
        if (!$imagen) {
            return ['mensaje' => 'error', 'v' => 'Imagen no encontrada'];
        }
    
        $seccion = $imagen->seccion;
        $path = $req->path;
    
        // Con el cast 'array', paths_imagenes YA es un array
        $paths = $imagen->paths_imagenes ?? [];
    
        // Filtramos los paths para eliminar el que coincide
        $filteredPaths = array_filter($paths, function($p) use ($path) {
            return $p['path'] !== $path;
        });
    
        // Reindexamos el array
        $filteredPaths = array_values($filteredPaths);
    
        // Actualizamos - NO necesitas json_encode(), el cast lo hace automáticamente
        $imagen->paths_imagenes = $filteredPaths;
    
        // Guardamos los cambios
        if($imagen->save()){
            // Recargar imágenes según sección
            switch($seccion) {
                case 'gral':
                    $imagenes = $this->dameInfoImagenesDentalPaciente($imagen->id_paciente, 'gral', $imagen->id_ficha_atencion);
                    $v = view('atencion_odontologica.include.imagenes_dental_todas', ['imagenes' => $imagenes])->render();
                    break;
                    
                case 'implantologia':
                    $imagenes = $this->dameInfoImagenesDentalPaciente($imagen->id_paciente, 'implantologia', $imagen->id_ficha_atencion);
                    $v = view('atencion_odontologica.include.imagenes_dental_preimplante_todas', ['imagenes' => $imagenes])->render();
                    break;
                    
                case 'odontop':
                    $imagenes = $this->dameInfoImagenesDentalPaciente($imagen->id_paciente, 'odontop', $imagen->id_ficha_atencion);
                    $v = view('atencion_odontologica.include.imagenes_dental_odontop_todas', ['imagenes' => $imagenes])->render();
                    break;
                    
                case 'periodoncica':
                    // Periodoncica no usa id_ficha_atencion
                    $imagenes = $this->dameInfoImagenesDentalPaciente($imagen->id_paciente, 'periodoncica');
                    $v = view('atencion_odontologica.include.imagenes_dental_period_todas', ['imagenes' => $imagenes])->render();
                    break;
                    
                default:
                    return ['mensaje' => 'error', 'v' => 'Sección no válida'];
            }
    
            return ['mensaje' => 'OK', 'v' => $v, 'seccion' => $seccion];
        } else {
            return ['mensaje' => 'error', 'v' => 'No se pudo guardar los cambios'];
        }
    }

    public function guardar_pieza_dental_examen_pieza(Request $req){
      
        if($req->tipo_examen == 'gral'){
            $tipo_examen = 1;
        }else if($req->tipo_examen == 'endo'){
            $tipo_examen = 2;
        }else{
            $tipo_examen = 3; // odontopediatria
        }
        
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();

        $examen = new ExamenesDentalPieza;
        $examen->numero_pieza = $req->numero_pieza;
        $examen->zona_dolor = $req->zona_dolor;
        $examen->historia_anterior = $req->historia_anterior;
        $examen->intensidad_dolor = $req->intensidad;
        $examen->modo_dolor = $req->modo_dolor;
        $examen->localizacion = $req->localizacion;
        $examen->provocacion_dolor = $req->provocacion_dolor;
        $examen->resp_calor = $req->resp_calor;
        $examen->electrico = $req->resp_elect;
        $examen->id_paciente = $req->id_paciente;
        $examen->id_lugar_atencion = $req->id_lugar_atencion;
        $examen->id_profesional = $profesional->id;
        $examen->id_especialidad = $profesional->id_especialidad;
        $examen->id_ficha_atencion = $req->id_ficha_atencion;
        $examen->resp_frio = $req->resp_frio;
        $examen->percusion = $req->resp_perc;
        $examen->exploracion = $req->resp_expl;
        $examen->cavitaria = $req->resp_cavitaria;
        $examen->fecha_examen = Carbon::now()->format('Y-m-d');
        $examen->tipo_examen = $tipo_examen; // general o endodoncia
        $examen->tipo_especialidad = $profesional->id_tipo_especialidad;
        $examen->estado = 1; // por defecto activo
        $examen->id_responsable = Auth::user()->id;
        $examen->observaciones = $req->observaciones;
     
        if($examen->save()){

            if($tipo_examen == 1){
                $examenes = $this->dameExamenesPiezaDentalPieza($req->id_paciente, $profesional->id_tipo_especialidad, $req->id_ficha_atencion);
                $v = view('atencion_odontologica.include.examenes_dental_pieza_todos',['examenes' => $examenes])->render();
            }else if($tipo_examen == 2){
                $examenes = $this->dameExamenesPiezaDentalPiezaEnd($req->id_paciente, $profesional->id_tipo_especialidad);
                $v = view('atencion_odontologica.include.examenes_dental_pieza_endodoncia_todos',['examenes' => $examenes])->render();
             
            }else{
                $examenes = $this->dameExamenesPiezaDentalPiezaOdontop($req->id_paciente, $profesional->id_tipo_especialidad);
                $v = view('atencion_odontologica.include.examenes_dental_pieza_odontop_todos',['examenes' => $examenes])->render();
            }
        
            $primer_cuadrante = $this->dameExamenesPiezaDentalPiezaPrimerCuadrante($req->id_paciente,'adulto',$profesional->id_tipo_especialidad);
            $segundo_cuadrante = $this->dameExamenesPiezaDentalPiezaSegundoCuadrante($req->id_paciente,'adulto',$profesional->id_tipo_especialidad);
            $tercer_cuadrante = $this->dameExamenesPiezaDentalPiezaTercerCuadrante($req->id_paciente,'adulto',$profesional->id_tipo_especialidad);
            $cuarto_cuadrante = $this->dameExamenesPiezaDentalPiezaCuartoCuadrante($req->id_paciente,'adulto',$profesional->id_tipo_especialidad);
            $quinto_cuadrante = $this->dameExamenesPiezaDentalPiezaQuintoCuadrante($req->id_paciente,'adulto',$profesional->id_tipo_especialidad);
            $sexto_cuadrante = $this->dameExamenesPiezaDentalPiezaSextoCuadrante($req->id_paciente,'adulto',$profesional->id_tipo_especialidad);

            $primer_cuadrante_endodoncia = $this->dameExamenesPiezaDentalPiezaPrimerCuadrante($req->id_paciente,'endodoncia', $profesional->id_tipo_especialidad);
            $segundo_cuadrante_endodoncia = $this->dameExamenesPiezaDentalPiezaSegundoCuadrante($req->id_paciente,'endodoncia', $profesional->id_tipo_especialidad);
            $tercer_cuadrante_endodoncia = $this->dameExamenesPiezaDentalPiezaTercerCuadrante($req->id_paciente,'endodoncia', $profesional->id_tipo_especialidad);
            $cuarto_cuadrante_endodoncia = $this->dameExamenesPiezaDentalPiezaCuartoCuadrante($req->id_paciente,'endodoncia', $profesional->id_tipo_especialidad);
            $quinto_cuadrante_endodoncia = $this->dameExamenesPiezaDentalPiezaQuintoCuadrante($req->id_paciente,'endodoncia', $profesional->id_tipo_especialidad);
            $sexto_cuadrante_endodoncia = $this->dameExamenesPiezaDentalPiezaSextoCuadrante($req->id_paciente,'endodoncia', $profesional->id_tipo_especialidad);

            $paciente = Paciente::where('id', $req->id_paciente)->first();
            $tratamientos_dentales = DiagnosticosDental::where('tipo_examen',2)->orWhere('tipo_examen',3)->get();
            $url_tratamientos = $profesional->id_tipo_especialidad != 16
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
                'id_ficha_atencion' => $req->id_ficha_atencion,
                'id_lugar_atencion' => $req->id_lugar_atencion,
                'tratamientos' => $tratamientos_dentales
                ])->render();
                if($tipo_examen == 3){
                    $tratamientos_dentales = DiagnosticosDental::where('tipo_examen',3)->get();
                    $diagnosticos_dentales = TratamientosDental::where('estado',1)->get();
                    $fc = new ficha_atencionController;
                    $quinto_cuadrante_infantil = $fc->dameExamenesPiezaDentalPiezaQuintoCuadrante($paciente->id,'infantil', $profesional->id_tipo_especialidad);
                    $sexto_cuadrante_infantil = $fc->dameExamenesPiezaDentalPiezaSextoCuadrante($paciente->id,'infantil', $profesional->id_tipo_especialidad);
                    $septimo_cuadrante_infantil = $fc->dameExamenesPiezaDentalPiezaSeptimoCuadrante($paciente->id,'infantil', $profesional->id_tipo_especialidad);
                    $octavo_cuadrante_infantil = $fc->dameExamenesPiezaDentalPiezaOctavoCuadrante($paciente->id,'infantil', $profesional->id_tipo_especialidad);
                    $vista_presupuestos = view('atencion_odontologica.include.cuadrantes_odontop',[
                        'url_tratamientos' => $url_tratamientos,
                        'quinto_cuadrante_infantil' => $quinto_cuadrante_infantil,
                        'sexto_cuadrante_infantil' => $sexto_cuadrante_infantil,
                        'septimo_cuadrante_infantil' => $septimo_cuadrante_infantil,
                        'octavo_cuadrante_infantil' => $octavo_cuadrante_infantil,
                        'paciente' => $paciente,
                        'id_ficha_atencion' => $req->id_ficha_atencion,
                        'id_lugar_atencion' => $req->id_lugar_atencion,
                        'tratamientos' => $tratamientos_dentales,
                        'diagnosticos' => $diagnosticos_dentales

                    ])->render();
                }
            return ['mensaje' => 'OK','v' => $v,'examenes' => $examenes, 'tipo_examen' => $tipo_examen, 'vista_presupuestos' => $vista_presupuestos];
        }else{
            return ['mensaje' => 'error'];
        }
    }

    public function guardar_pieza_dental_examen_pieza_hist(Request $req){

        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $examen = new ExamenesDentalPiezaHistoria;
        $examen->id_paciente = $req->id_paciente;
        $examen->id_lugar_atencion = $req->id_lugar_atencion;
        $examen->id_profesional = $profesional->id;
        $examen->id_especialidad = $profesional->id_especialidad;
        $examen->id_ficha_atencion = $req->id_ficha_atencion;
        $examen->numero_pieza = $req->pieza;
        $examen->fecha_examen = Carbon::now();
        $examen->perdida = $req->perdida_texto;
        $examen->tiempo = $req->tiempo_texto;
        $examen->estado = 1;
        $examen->observaciones = $req->observaciones !== null ? $req->observaciones : '';
        $examen->seccion = $req->seccion;

        if($examen->save()){
                $examenes = $this->dameExamenesPiezaDentalPiezaHistoria($req->id_paciente, $profesional->id_tipo_especialidad, $req->seccion);
                $v = view('atencion_odontologica.include.examenes_dental_pieza_historial_todos',['examenes' => $examenes])->render();

        }

        return ['mensaje' => 'OK','v' => $v,'examenes' => $examenes];
    }

     public function eliminar_examen_period(Request $req){
        try {
            $examen = ExamenesDentalPeriodoncia::find($req->id);
            if($examen){
                $id_paciente = $examen->id_paciente;
                $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

                if($examen->delete()){
                    $examenes = $this->dameExamenesPiezaDentalPiezaPeriod($id_paciente, $profesional->id_tipo_especialidad);
                    $v = view('atencion_odontologica.include.examenes_dental_pieza_period_todos',['examenes' => $examenes])->render();

                    return ['mensaje' => 'OK', 'v' => $v, 'examenes' => $examenes];
                } else {
                    return ['mensaje' => 'ERROR', 'error' => 'No se pudo eliminar el examen'];
                }
            } else {
                return ['mensaje' => 'ERROR', 'error' => 'Examen no encontrado'];
            }
        } catch (\Exception $e) {
            return ['mensaje' => 'ERROR', 'error' => $e->getMessage()];
        }
    }

    public function eliminar_pieza_dental_examen_pieza(Request $req){

        $examen = ExamenesDentalPieza::find($req->id);
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
    
        if($examen->delete()){
            if($req->tipo == 'gral'){
                $examenes = $this->dameExamenesPiezaDentalPieza($req->id_paciente , $profesional->id_tipo_especialidad, $req->id_ficha_atencion);
                $v = view('atencion_odontologica.include.examenes_dental_pieza_todos',['examenes' => $examenes])->render();
            }else if($req->tipo == 'endo'){
                $examenes = $this->dameExamenesPiezaDentalPiezaEnd($req->id_paciente);
                $v = view('atencion_odontologica.include.examenes_dental_pieza_endodoncia_todos',['examenes' => $examenes])->render();
            }else{
                $examenes = $this->dameExamenesPiezaDentalPiezaOdontop($req->id_paciente);
                $v = view('atencion_odontologica.include.examenes_dental_pieza_odontop_todos',['examenes' => $examenes])->render();
            }
            $primer_cuadrante = $this->dameExamenesPiezaDentalPiezaPrimerCuadrante($req->id_paciente,'adulto', $profesional->id_tipo_especialidad);
            $segundo_cuadrante = $this->dameExamenesPiezaDentalPiezaSegundoCuadrante($req->id_paciente,'adulto', $profesional->id_tipo_especialidad);
            $tercer_cuadrante = $this->dameExamenesPiezaDentalPiezaTercerCuadrante($req->id_paciente,'adulto', $profesional->id_tipo_especialidad);
            $cuarto_cuadrante = $this->dameExamenesPiezaDentalPiezaCuartoCuadrante($req->id_paciente,'adulto', $profesional->id_tipo_especialidad);
            $quinto_cuadrante = $this->dameExamenesPiezaDentalPiezaQuintoCuadrante($req->id_paciente,'adulto', $profesional->id_tipo_especialidad);
            $sexto_cuadrante = $this->dameExamenesPiezaDentalPiezaSextoCuadrante($req->id_paciente,'adulto', $profesional->id_tipo_especialidad);

            $primer_cuadrante_endodoncia = $this->dameExamenesPiezaDentalPiezaPrimerCuadrante($req->id_paciente,'endodoncia', $profesional->id_tipo_especialidad);
            $segundo_cuadrante_endodoncia = $this->dameExamenesPiezaDentalPiezaSegundoCuadrante($req->id_paciente,'endodoncia', $profesional->id_tipo_especialidad);
            $tercer_cuadrante_endodoncia = $this->dameExamenesPiezaDentalPiezaTercerCuadrante($req->id_paciente,'endodoncia', $profesional->id_tipo_especialidad);
            $cuarto_cuadrante_endodoncia = $this->dameExamenesPiezaDentalPiezaCuartoCuadrante($req->id_paciente,'endodoncia', $profesional->id_tipo_especialidad);
            $quinto_cuadrante_endodoncia = $this->dameExamenesPiezaDentalPiezaQuintoCuadrante($req->id_paciente,'endodoncia', $profesional->id_tipo_especialidad);
            $sexto_cuadrante_endodoncia = $this->dameExamenesPiezaDentalPiezaSextoCuadrante($req->id_paciente,'endodoncia', $profesional->id_tipo_especialidad);

            $paciente = Paciente::where('id', $req->id_paciente)->first();
            $tratamientos_dentales = DiagnosticosDental::where('tipo_examen',2)->orWhere('tipo_examen',3)->get();
            $url_tratamientos = $profesional->id_tipo_especialidad != 16
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
                'id_ficha_atencion' => $req->id_ficha_atencion,
                'id_lugar_atencion' => $req->id_lugar_atencion,
                'tratamientos' => $tratamientos_dentales
                ])->render();
                if($req->tipo == 'odontop'){
                    $tratamientos_dentales = DiagnosticosDental::where('tipo_examen',3)->get();
                    $diagnosticos_dentales = TratamientosDental::where('estado',1)->get();
                    $fc = new ficha_atencionController;
                    $quinto_cuadrante_infantil = $fc->dameExamenesPiezaDentalPiezaQuintoCuadrante($paciente->id,'infantil', $profesional->id_tipo_especialidad);
                    $sexto_cuadrante_infantil = $fc->dameExamenesPiezaDentalPiezaSextoCuadrante($paciente->id,'infantil', $profesional->id_tipo_especialidad);
                    $septimo_cuadrante_infantil = $fc->dameExamenesPiezaDentalPiezaSeptimoCuadrante($paciente->id,'infantil', $profesional->id_tipo_especialidad);
                    $octavo_cuadrante_infantil = $fc->dameExamenesPiezaDentalPiezaOctavoCuadrante($paciente->id,'infantil', $profesional->id_tipo_especialidad);
                    $vista_presupuestos = view('atencion_odontologica.include.cuadrantes_odontop',[
                        'url_tratamientos' => $url_tratamientos,
                        'quinto_cuadrante_infantil' => $quinto_cuadrante_infantil,
                        'sexto_cuadrante_infantil' => $sexto_cuadrante_infantil,
                        'septimo_cuadrante_infantil' => $septimo_cuadrante_infantil,
                        'octavo_cuadrante_infantil' => $octavo_cuadrante_infantil,
                        'paciente' => $paciente,
                        'id_ficha_atencion' => $req->id_ficha_atencion,
                        'id_lugar_atencion' => $req->id_lugar_atencion,
                        'tratamientos' => $tratamientos_dentales,
                        'diagnosticos' => $diagnosticos_dentales
                    ])->render();
                }
            return ['mensaje' => 'OK','v' => $v,'tipo_examen' => $req->tipo, 'examenes' => $examenes, 'vista_presupuestos' => $vista_presupuestos];
        }else{
            return ['mensaje' => 'error'];
        }
    }

    public function eliminar_pieza_dental_examen_hist(Request $req){

        $examen = ExamenesDentalPiezaHistoria::find($req->id);
        $id_paciente = $examen->id_paciente;
        $seccion = $examen->seccion;
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        if($examen->delete()){
            $examenes = $this->dameExamenesPiezaDentalPiezaHistoria($id_paciente, $profesional->id_tipo_especialidad, $seccion);
            $v = view('atencion_odontologica.include.examenes_dental_pieza_historial_todos',['examenes' => $examenes])->render();
            return ['mensaje' => 'OK','v' => $v, 'examenes' => $examenes,'seccion' => $seccion];
        }else{
            return ['mensaje' => 'error'];
        }
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
                    ->whereRaw("CAST(numero_pieza AS CHAR) LIKE '9.%'") // Convierte a cadena y filtra
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

    public function dameExamenesPiezaDentalPiezaEnd($id_paciente){
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $examenes = ExamenesDentalPieza::where('id_paciente',$id_paciente)
        ->where('id_profesional',$profesional->id)
        ->where('tipo_examen',2)
        // ->where('estado',1)
        ->get();
        return $examenes;
    }

    public function dameExamenesPiezaDentalPiezaOdontop($id_paciente){
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $examenes = ExamenesDentalPieza::where('id_paciente',$id_paciente)
        ->where('id_profesional',$profesional->id)
        ->where('tipo_examen',3)
        // ->where('estado',1)
        ->get();
        return $examenes;
    }

    public function dameExamenesPiezaDentalPieza($id_paciente, $tipo_especialidad, $id_ficha_atencion){
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $examenes = ExamenesDentalPieza::where('id_paciente',$id_paciente)
        ->where('tipo_examen',1)
        ->where('tipo_especialidad',$tipo_especialidad)
        ->where('id_profesional', $profesional->id)
        ->where('id_ficha_atencion', $id_ficha_atencion)
        ->where('estado',1)
        ->get();
        return $examenes;
    }

    public function dameExamenesPiezaDentalPiezaHistoria($id_paciente,$tipo_especialidad, $seccion){
        $examenes = ExamenesDentalPiezaHistoria::where('id_paciente',$id_paciente)
        ->where('estado',1)
        ->where('seccion', $seccion)
        ->get();
        return $examenes;
    }

    public function dameExamenesPiezaDentalEndDolor($id_paciente){
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $examenes = ExamenesDentalDolor::where('id_paciente',$id_paciente)->where('id_profesional',$profesional->id)->where('tipo_examen',2)->get();
        return $examenes;
    }

    public function dameExamenesPiezaDentalOdontopDolor($id_paciente){
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        $examenes = ExamenesDentalDolor::where('id_paciente',$id_paciente)->where('id_profesional',$profesional->id)->where('tipo_examen',3)->get();
        return $examenes;
    }

    public function guardar_valores_lugar_atencion(Request $request)
    {
        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();

        $profesional_convenio = new ProfesionalConvenio();

        $profesional_convenio->convenios = $request->convenios;
        $profesional_convenio->tipo_atencion = $request->lugar_atencion_convenio;
        $profesional_convenio->valor = $request->valor;
        $profesional_convenio->id_profesional = $profesional->id;
        $profesional_convenio->id_lugar_atencion = $request->id_lugar_atencion_valor;

        if (!$profesional_convenio->save()) {
            return 'Error';
        }

        return json_encode($profesional_convenio);
    }

    public function paciente_esperando(Request $request)
    {
        $hora_medica = HoraMedica::where('id', $request->id_hora_medica)->first();
        $hora_medica->id_estado = 4;
        // $paciente = Paciente::where('id', $hora_medica->id_paciente)->first();
        // $profesional = Profesional::where('id', $hora_medica->id_profesional)->first();

        if (!$hora_medica->save()) {
            return 'error';
        }

        return json_encode($hora_medica);
    }

    public function buscar_asistente_profesional(Request $request)
    {
        $asistente = Asistente::where('rut', $request->rut_asistente)->first();

        if ($asistente == null) {
            return 'null';
        }

        $usuario = Auth::user();

        $profesional = Profesional::where('id_usuario', $usuario->id)->first();

        $asistenteP = ProfesionalAsistente::where('id_asistente', $asistente->id)->where('id_profesional', $profesional->id)->first();
        if ($asistenteP == null) {
            $asistente->ciudad = $asistente->Direccion()->first()->id_ciudad;
            $asistente->region = $asistente->Direccion()->first()->Ciudad()->first()->id_region;
            $asistente->direccion = $asistente->Direccion()->first()->direccion;
            $asistente->numero_dir = $asistente->Direccion()->first()->numero_dir;

            return json_encode($asistente);
        } else {
            return 'existe';
        }
    }

    public function buscar_asistente(Request $request)
    {
        $profesional = '';
        $profesional_temp = Profesional::where('id_usuario', Auth::user()->id)->first();
        if($profesional_temp)
            $profesional = $profesional_temp;

        $asistente = Asistente::where('rut', $request->rut)->first();
        $lugar = LugarAtencion::where('id', $request->id_lugar)->first();

        if ($asistente == null) {
            return 'null';
        }

        if($profesional)
            $asistenteL = AsistenteLugarAtencion::where('id_asistente', $asistente->id)->where('id_lugar_atencion', $lugar->id)->where('id_profesional', $profesional->id)->first();
        else
            $asistenteL = AsistenteLugarAtencion::where('id_asistente', $asistente->id)->where('id_lugar_atencion', $lugar->id)->first();

        if ($asistenteL == null) {
            return json_encode($asistente);
        } else {
            return 'existe';
        }

        /* if ($asistente == null) {
             $paciente = Paciente::where('rut', $request->rut_asistente)->first();
             if ($paciente == null) {
                 $profesional = Paciente::where('rut', $request->rut_asistente)->first();
                 if ($profesional == null) {
                     return 'null';
                 } else {
                     return json_encode($profesional);
                 }
             } else {
                 return json_encode($paciente);
             }
         } else {
             return json_encode($asistente);
         }*/
    }

    public function agregar_asistente_lugar_atencion(Request $request)
    {
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

        $asistente_lugar_atencion = new AsistenteLugarAtencion();
        $asistente_lugar_atencion->id_asistente = $request->id_asistente;
        $asistente_lugar_atencion->id_lugar_atencion = $request->id_lugar_atencion;
        $asistente_lugar_atencion->id_profesional = $profesional->id;
        if(!empty($request->examen))
            $asistente_lugar_atencion->examen = $request->examen;

        if (!$asistente_lugar_atencion->save()) {
            return 'error';
        }

        return json_encode($asistente_lugar_atencion);
    }

    public function ver_paciente($id)
    {
        $paciente = Paciente::where('id', $id)->first();
        //$contacto_emergencia = PacienteContactoEmergencia::where('id_paciente', $paciente->id)->first();
        //$contacto = ContactoEmergencia::where('id', $contacto_emergencia->id_contacto)->first();
        $prevision = Prevision::all();
        $direccion = $paciente->Direccion()->first();
        $ciudad = $direccion->Ciudad()->first();
        $contacto = $paciente->ContactosEmergencia()->get();
        $region = Region::all();
        $ciudades = Ciudad::orderBy('nombre');
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

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


        // $alergias = AntecedenteAlergiaPaciente::where('id_antecedentes', $paciente->Antecedentes()->first()->id)->get();
        // $antecedentes_quirurgicos = SolicitudPabellonQuirurgico::where('id_paciente', $paciente->id)->get();
        // $patoligias_cronicas = AntecedenteEnferCronica::where('id_antecedentes', $paciente->Antecedentes()->first()->id)->get();
        //$contacto = $paciente->ContactosEmergencia()->first();
        //$alergias = $paciente->alergias()->get();
        //$operaciones = $paciente->operaciones()->get();
        //$organosDonar = $paciente->organosDonar()->get();
        //$EnfeCronica = $paciente->enf_cronicas()->get();
        // $medicamentos_cronicos = AntecedenteMedicamentoCronico::where('id_antecedentes', $paciente->Antecedentes()->first()->id)->get();
        $fichasConfi = FichaAtencion::where('id_paciente', 4)->where('confidencial', true)->get();
        $grupo_sanguineo = GrupoSanguineo::all();

        $id_usuario = Auth::user()->id;
        $userData = Funciones::userData($id_usuario);


        return view('app.profesional.editar_perfil_paciente_profesional')
            ->with([
                'userData' => $userData,
                'paciente' => $paciente,
                'prevision' => $prevision,
                'contacto' => $contacto,
                'direccion' => $direccion,
                'ciudad' => $ciudad,
                'region' => $region,
                'ciudades' => $ciudades,
                'profesional' => $profesional,
                'alergias' => $alergias,
                'antecedentes_quirurgicos' => $antecedentes_quirurgicos,
                'antecedentes_cirugias' => $antecedentes_cirugias,
                'ant_confidenciales' => $ant_confidenciales,
                //'organosDonar'=>$organosDonar,
                'patoligias_cronicas' => $patoligias_cronicas,
                'medicamentos_cronicos' => $medicamentos_cronicos,
                'grupo_sanguineo' => $grupo_sanguineo,
            ]);
    }

    public function editar_antecedentes_paciente(Request $request)
    {
        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();

        $paciente = Paciente::where('id', $request->id_paciente)->first();

        $antecedente = AntecedentesPaciente::where('id', $paciente->id_antecedente)->first();
        $nuevo = 0;
        $previo = array();
        $texto_datos = '';
        if ($antecedente == null) {
            $antecedente = new AntecedentesPaciente();
            $nuevo = 1;
        }
        else
        {
            $previo = AntecedentesPaciente::where('id', $paciente->id_antecedente)->first();
        }

        $antecedente->transfusion = $request->edit_transfusion;
        $antecedente->dona_organos = $request->edit_donante_total;
        $antecedente->dona_organos_parcial = $request->edit_donante_parcial;
        $antecedente->dona_sangre = $request->edit_dona_sangre;
        $antecedente->impedimento_donar = $request->comentarios_impedimento;
        // $antecedente->comentario_gs = $request->comentarios_gruposangre;
        $antecedente->comentarios = $request->comentarios_organo;
        $antecedente->hepatitis = $request->edit_hepatitis;
        $antecedente->comentario_hepa = $request->comentarios_hepatitis;
        if(!empty($request->editar_grupo_sanguineo))
        $antecedente->id_grupo_sanguineo = $request->editar_grupo_sanguineo;

        if ($antecedente->save()) {
            $paciente->id_antecedente = $antecedente->id;
            $paciente->save();

            if($nuevo == 1)
            {
                if(!empty($request->edit_transfusion))
                    $texto_datos .= 'Registro Transfusión:'.(($request->edit_transfusion==1)?'SI':'NO').' | ';
                if(!empty($request->edit_donante_total))
                    $texto_datos .= 'Registro Donante Total:'.(($request->edit_donante_total==1)?'SI':'NO').' | ';
                if(!empty($request->edit_donante_parcial))
                    $texto_datos .= 'Registro Donante Parcial:'.(($request->edit_donante_parcial==1)?'SI':'NO').' | ';
                if(!empty($request->edit_dona_sangre))
                    $texto_datos .= 'Registro Donante Sangre:'.(($request->edit_dona_sangre==1)?'SI':'NO').' | ';
                if(!empty($request->comentarios_impedimento))
                    $texto_datos .= 'Registro Posee Impedimento:'.$request->comentarios_impedimento.' | ';
                if(!empty($request->comentarios_organo))
                    $texto_datos .= 'Registro Organo a Donar:'.$request->comentarios_organo.' | ';
                if(!empty($request->edit_hepatitis))
                    $texto_datos .= 'Registro Vacuna o Hepatitis:'.(($request->edit_hepatitis==1)?'SI':'NO').' | ';
                if(!empty($request->comentarios_hepatitis))
                    $texto_datos .= 'Registro Comentrio Hepatitis o VIH:'.$request->comentarios_hepatitis.' | ';
                if(!empty($request->editar_grupo_sanguineo))
                {
                    $grupo_sang = GrupoSanguineo::find($request->editar_grupo_sanguineo);
                    if($grupo_sang)
                        $texto_datos .= 'Registro GrupoSangineo:'.$grupo_sang->nombre_gs.' | ';
                }
            }
            else
            {
                if(!empty($request->edit_transfusion) && ($previo->edit_transfusion != $request->edit_transfusion))
                    $texto_datos .= 'Actualización Transfusión:'.(($previo->edit_transfusion==1)?'SI':'NO').' a '.(($request->edit_transfusion==1)?'SI':'NO').' | ';

                if(!empty($request->edit_donante_total) && ($previo->edit_donante_total != $request->edit_donante_total))
                    $texto_datos .= 'Actualización Donante Total:'.(($previo->edit_donante_total==1)?'SI':'NO').' a '.(($request->edit_donante_total==1)?'SI':'NO').' | ';

                if(!empty($request->edit_donante_parcial) && ($previo->edit_donante_parcial != $request->edit_donante_parcial))
                    $texto_datos .= 'Actualización Donante Parcial:'.(($previo->edit_donante_parcial==1)?'SI':'NO').' a '.(($request->edit_donante_parcial==1)?'SI':'NO').' | ';

                if(!empty($request->edit_dona_sangre) && ($previo->edit_dona_sangre != $request->edit_dona_sangre))
                    $texto_datos .= 'Actualización Donante Sangre:'.(($previo->edit_dona_sangre==1)?'SI':'NO').' a '.(($request->edit_dona_sangre==1)?'SI':'NO').' | ';

                if(!empty($request->comentarios_impedimento) && ($previo->comentarios_impedimento != $request->comentarios_impedimento))
                    $texto_datos .= 'Actualización Posee Impedimento:'.$request->comentarios_impedimento.' | ';

                if(!empty($request->comentarios_organo) && ($previo->comentarios_organo != $request->comentarios_organo))
                    $texto_datos .= 'Actualización Organo a Donar:'.$request->comentarios_organo.' | ';

                if(!empty($request->edit_hepatitis) && ($previo->edit_hepatitis != $request->edit_hepatitis))
                    $texto_datos .= 'Actualización Vacuna o Hepatitis:'.(($previo->edit_hepatitis==1)?'SI':'NO').' a '.(($request->edit_hepatitis==1)?'SI':'NO').' | ';

                if(!empty($request->comentarios_hepatitis) && ($previo->comentarios_hepatitis != $request->comentarios_hepatitis))
                    $texto_datos .= 'Actualización Comentrio Hepatitis o VIH:'.$request->comentarios_hepatitis.' | ';

                if(!empty($request->editar_grupo_sanguineo) && ($previo->editar_grupo_sanguineo != $request->editar_grupo_sanguineo))
                {
                    $grupo_sang_prev = GrupoSanguineo::find($previo->editar_grupo_sanguineo);
                    $grupo_sang = GrupoSanguineo::find($request->editar_grupo_sanguineo);
                    if($grupo_sang)
                        $texto_datos .= 'Actualización GrupoSangineo:'.$grupo_sang_prev.' a '.$grupo_sang->nombre_gs.' | ';
                }
            }

            if(!empty($texto_datos))
            {
                $return_log = PacienteHistoricoDatosMedicosController::registrar($paciente->id, $profesional->id, $texto_datos);
                // Log::useFiles(storage_path() . '/logs/log_datos_medicos_' . date('Ymd') . '.log');
                // Log::debug( json_encode($return_log) );
                Log::build([
                    'path' => storage_path('logs/log_datos_medicos_' . date('Ymd') . '.log'),
                  ])->info(json_encode($return_log) );
            }


            return json_encode($antecedente);
        }


        return 'failed';
    }

    public function editar_antecedentes_confidenciales_paciente(Request $request)
    {
        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();

        $paciente = Paciente::where('id', $request->id_paciente)->first();

        $antecedente = AntConfidenciales::where('id_paciente', $request->id_paciente)->first();

        if ($antecedente == null) {
            $antecedente = new AntConfidenciales();
        }


        $antecedente->id_paciente = $request->id_paciente;
        $antecedente->rompeclave = $request->rompeclave;
        $antecedente->antecedentes = $request->antecedentes;
        $antecedente->otros_antecedentes = $request->otros_antecedentes;

        if ($antecedente->save()) {
            $paciente->id_antecedente = $antecedente->id;
            $paciente->save();

            return json_encode($antecedente);
        }


        return 'failed';
    }

    public function mi_perfil()
    {
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $direccion_profesional = Direccion::where('id',$profesional->id_direccion)->first();
        $direccion_id_ciudad_profesional = '';
        $direccion_txt_ciudad_profesional = '';
        $direccion_region_profesional = '';
        $direccion_id_region_profesional = '';
        $direccion_txt_region_profesional = '';

        $regiones = Region::all();
        $ciudades = Ciudad::all();

        if($direccion_profesional)
        {
            $direccion_id_ciudad_profesional = $direccion_profesional->id_ciudad;
            $direccion_region_profesional = Ciudad::select('nombre','id_region')->where('id',$direccion_id_ciudad_profesional)->first();

            if($direccion_region_profesional)
            {
                $direccion_txt_ciudad_profesional = $direccion_region_profesional->nombre;

                $ciudades = Ciudad::where('id_region', $direccion_region_profesional->id_region)->get();
                $direccion_id_region_profesional = $direccion_region_profesional->id_region;

                $direccion_txt_region_profesional_temp = Region::find($direccion_id_region_profesional);
                $direccion_txt_region_profesional = $direccion_txt_region_profesional_temp->nombre;
            }
        }

        $txt_especialidades = '';
        $txt_tipo_especialidades = '';
        $txt_sub_tipo_especialidades = '';

        $especialidades = Especialidad::all();

        $tipo_especialidades = TipoEspecialidad::all();
        if($profesional->id_especialidad)
        {
            $tipo_especialidades = TipoEspecialidad::where('id_especialidad', $profesional->id_especialidad)->get();
            $txt_especialidades = '';
            $especialidad_temp = Especialidad::where('id', $profesional->id_especialidad)->get()->first();
            if($especialidad_temp)
                $txt_especialidades = $especialidad_temp->nombre;
        }

        $sub_tipo_especialidades = SubTipoEspecialidad::all();
        if($profesional->id_tipo_especialidad)
        {
            $sub_tipo_especialidades = SubTipoEspecialidad::where('id_tipo_especialidad', $profesional->id_tipo_especialidad)->get();
            $txt_tipo_especialidades = '';
            $tipo_especialidad_temp = TipoEspecialidad::where('id', $profesional->id_tipo_especialidad)->get()->first();
            if($especialidad_temp)
                $txt_tipo_especialidades = $tipo_especialidad_temp->nombre;
        }

        if($profesional->id_sub_tipo_especialidad)
        {
            $txt_sub_tipo_especialidades = '';
            $sub_tipo_especialidades_temp = SubTipoEspecialidad::where('id', $profesional->id_sub_tipo_especialidad)->get()->first();

            if($sub_tipo_especialidades_temp)
                $txt_sub_tipo_especialidades = $sub_tipo_especialidades_temp->nombre;

        }

        $perfil_academico = ProfesionalAntecedenteAcademico::where('id_profesional',$profesional->id)->get();
        $tipo_ant_academico = TipoAntecedenteAcademico::all();
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
        // $user = Auth::user()->password;
        // // $pass = Crypt::decryptString($user);
        // dd($user);


        return view('app.profesional.perfil_profesional')->with(
            [
                'profesional' => $profesional,
                'direccion_id_ciudad_profesional' => $direccion_id_ciudad_profesional,
                'direccion_txt_ciudad_profesional' => $direccion_txt_ciudad_profesional,
                'direccion_region_profesional' => $direccion_region_profesional,
                'direccion_id_region_profesional' => $direccion_id_region_profesional,
                'direccion_txt_region_profesional' => $direccion_txt_region_profesional,
                'especialidades' => $especialidades,
                'tipo_especialidades' => $tipo_especialidades,
                'sub_tipo_especialidades' => $sub_tipo_especialidades,
                'txt_especialidades' => $txt_especialidades,
                'txt_tipo_especialidades' => $txt_tipo_especialidades,
                'txt_sub_tipo_especialidades' => $txt_sub_tipo_especialidades,
                'regiones' => $regiones,
                'ciudades' => $ciudades,
                'perfil_academico' => $perfil_academico,
                'tipo_ant_academico' => $tipo_ant_academico,
                'bancos' => $bancos,
                'liquidacion' => $liquidacion,
                'liqui_principal' => $liqui_principal,
                // 'pass' => $pass,
            ]
        );
    }

    public function index_receta()
    {

        return view('app.profesional.receta_online.inicio_receta_online_profesional');
    }

    public function mis_examenes()
    {
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $ficha = FichaAtencion::where('id_profesional', $profesional->id)->get();

        $examenes = array();
        foreach ($ficha as $key_f => $value_f)
        {
            $nombre_paciente = $value_f->Paciente()->first()->nombres .' ' .$value_f->Paciente()->first()->apellido_uno .' ' .$value_f->Paciente()->first()->apellido_dos;
            $rut_paciente = $value_f->Paciente()->first()->rut;
            $created_at = $value_f->created_at;

            $registros = ExamenPPF::where('id_ficha_atencion', $value_f->id)->get();


            if($registros->count())
            {

                $examen = '';
                $examen_array = array();
                $tipo_examen = '';
                $tipo_examen_array = array();
                foreach ($registros as $key_examen => $value_examen) {
                    if(!in_array($value_examen->examen, $examen_array)){
                        $examen .= $value_examen->examen.' | ';
                        array_push($examen_array,$value_examen->examen);
                    }
                    if(!in_array($value_examen->tipo_examen, $tipo_examen_array)){
                        $tipo_examen .= $value_examen->tipo_examen.' | ';
                        array_push($tipo_examen_array,$value_examen->tipo_examen);
                    }
                }

                $examen_temp = array(
                    'created_at'=>\Carbon\Carbon::parse($created_at)->format('Y-m-d'),
                    'id_ficha_atencion'=>$value_f->id,
                    'examen'=>$examen,
                    'tipo_examen'=>$tipo_examen,
                    'Paciente' => array(
                        'nombre' => $nombre_paciente,
                        'rut' => $rut_paciente,
                    ),
                );

                array_push($examenes,$examen_temp);
            }
        }
        // $examenes = $profesional->Examenes()->get();
        return view('app.profesional.receta_online.mis_examenes_profesional')->with(
            [
                'examenes' => $examenes,
            ]
        );
    }

    public function mis_recetas()
    {
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $fichas = FichaAtencion::where('id_profesional',$profesional->id)->with('Recetas')->get();
        return view('app.profesional.receta_online.mis_recetas_profesional')->with(['ficha' => $fichas]);
    }

    public function mis_certificados()
    {
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $ficha = FichaAtencion::where('id_profesional', $profesional->id)->get();
        $reposo = array();
        $interconsulta = array();
        $informesMedicos = array();
        $controlObesidad = array();
        $hipertensiones = array();
        foreach ($ficha as $key_f => $value_f) {
            $result_CertificadoReposo = CertificadoReposo::where('id_ficha_atencion', $value_f->id)->first();
            $result_Interconsulta = Interconsulta::where('id_ficha_atencion_soli', $value_f->id)->first();
            $result_InformeMedico = InformeMedico::where('id_ficha_atencion', $value_f->id)->first();
            if(!empty($result_CertificadoReposo))
                array_push($reposo,$result_CertificadoReposo);
            if(!empty($result_Interconsulta))
                array_push($interconsulta,$result_Interconsulta);
            if(!empty($result_InformeMedico))
                array_push($informesMedicos,$result_InformeMedico);

        }

        // $reposo = CertificadoReposo::where('id_profesional', $profesional->id)->get();
        // $interconsulta = Interconsulta::where('id_profesional', $profesional->id)->get();
        // $informesMedicos = InformeMedico::where('id_profesional', $profesional->id)->get();
        // $controlObesidad = ControlObesidad::where('id_profesional', $profesional->id)->get();
        // $hipertensiones = Hipertension::where('id_profesional', $profesional->id)->get();

        return view('app.profesional.receta_online.mis_certificados_profesional')->with(
            [
                'ficha' => $ficha,
                'reposo' => $reposo,
                'interconsulta' => $interconsulta,
                'informesMedicos' => $informesMedicos,
                'controlObesidad' => $controlObesidad,
                'hipertensiones' => $hipertensiones,
            ]
        );
    }

    public function aranceles(){
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $trabajos = DiagnosticosDental::where('tipo_examen',1)->orWhere('tipo_examen',2)->orWhere('tipo_examen',3)->get();

        if($profesional->id_tipo_especialidad != 16)
        {
                // $trabajos = DiagnosticosDental::where('tipo_examen',1)->orWhere('tipo_examen',2)->orWhere('tipo_examen',3)->get();
                $mis_trabajos_profesional = DiagnosticosDentalProfesional::select('diagnosticos_dental_profesional.*','diagnosticos_dental.descripcion','diagnosticos_dental.uco','diagnosticos_dental.tipo_examen','diagnosticos_dental.id_responsable','diagnosticos_dental.id as id_diagnostico')
                ->join('diagnosticos_dental','diagnosticos_dental_profesional.id_diagnostico','=','diagnosticos_dental.id')
                ->where('diagnosticos_dental_profesional.id_profesional', $profesional->id)
                ->get();
        }
        else
        {
                // $trabajos = DiagnosticosDental::where('tipo_examen',1)->orWhere('tipo_examen',2)->orWhere('tipo_examen',3)->get();
                $mis_trabajos_profesional = DiagnosticosDentalProfesional::select('diagnosticos_dental_profesional.*','tratamientos_implantologia.descripcion','tratamientos_implantologia.uco','tratamientos_implantologia.tipo_examen','tratamientos_implantologia.id_responsable','tratamientos_implantologia.id as id_diagnostico')
                ->join('tratamientos_implantologia','diagnosticos_dental_profesional.id_diagnostico','=','tratamientos_implantologia.id')
                ->where('diagnosticos_dental_profesional.id_profesional', $profesional->id)
                ->get();
        }


        // Crear un array asociativo para un acceso más rápido
        $mis_trabajos_profesional_map = [];
        if($mis_trabajos_profesional->count() == 0)
        {
            $valor_uco = 0;
        }

        foreach ($mis_trabajos_profesional as $trabajo_profesional) {
            $mis_trabajos_profesional_map[$trabajo_profesional->id_diagnostico] = $trabajo_profesional->laboratorio;
            if($trabajo_profesional->cantidad_uco != 0){
                $valor_uco = $trabajo_profesional->valor / $trabajo_profesional->cantidad_uco;
            }else{
                $valor_uco = 0;
            }
            
        }

        if($profesional->id_tipo_especialidad != 18)
        {
            $mis_trabajos_agregados = DiagnosticosDental::where('id_responsable', $profesional->id)->get();
        }
        else
        {
            $mis_trabajos_agregados = TratamientosImplantologia::where('id_responsable', $profesional->id)->get();
        }


        foreach($mis_trabajos_agregados as $mi_trabajo){
            if (isset($mis_trabajos_profesional_map[$mi_trabajo->id])) {
                $mi_trabajo->laboratorio = $mis_trabajos_profesional_map[$mi_trabajo->id];
            } else {
                $mi_trabajo->laboratorio = 0; // O el valor por defecto que prefieras
            }
        }

        $aranceles_lab = DiagnosticosDental::where('tipo_examen',4)->get();

        $url_tratamientos = $profesional->id_tipo_especialidad == 18
        ? route('dental.getDiagnosticoDental')
        : route('dental.getTratamientoImplantologia');

        return view('app.profesional.aranceles_profesional')->with([
            'aranceles' => $aranceles_lab,
            'trabajos' => $trabajos,
            'mis_trabajos_agregados' => $mis_trabajos_agregados,
            'mis_trabajos_profesional' => $mis_trabajos_profesional,
            'profesional' => $profesional,
            'url_tratamientos' => $url_tratamientos,
            'profesional' => $profesional,
            'valor_uco' => $valor_uco,
        ]);
    }

    public function recalcular_presupuestos(Request $req){
        $valor_uco = $req->valor_uco;
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
       if($profesional->id_tipo_especialidad != 16)
       {
            $mis_trabajos_profesional = DiagnosticosDentalProfesional::select('diagnosticos_dental_profesional.*','diagnosticos_dental.descripcion','diagnosticos_dental.uco','diagnosticos_dental.tipo_examen','diagnosticos_dental.id_responsable','diagnosticos_dental.id as id_diagnostico')
            ->join('diagnosticos_dental','diagnosticos_dental_profesional.id_diagnostico','=','diagnosticos_dental.id')
            ->where('diagnosticos_dental_profesional.id_profesional', $profesional->id)
            ->get();
       }else{
            $mis_trabajos_profesional = DiagnosticosDentalProfesional::select('diagnosticos_dental_profesional.*','tratamientos_implantologia.descripcion','tratamientos_implantologia.uco','tratamientos_implantologia.tipo_examen','tratamientos_implantologia.id_responsable','tratamientos_implantologia.id as id_diagnostico')
            ->join('tratamientos_implantologia','diagnosticos_dental_profesional.id_diagnostico','=','tratamientos_implantologia.id')
            ->where('diagnosticos_dental_profesional.id_profesional', $profesional->id)
            ->get();
       }

       foreach($mis_trabajos_profesional as $mi_trabajo){
            $mi_trabajo->valor = $valor_uco * $mi_trabajo->cantidad_uco;
            $mi_trabajo->save();
        }

        return ['status' => 'ok', 'mis_trabajos_profesional' => $mis_trabajos_profesional];
    }

    public function editarProcedimientoDental(Request $req){

        $procedimiento = DiagnosticosDentalProfesional::find($req->id);
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        if($profesional->id_tipo_especialidad != 16){
            $procedimiento_lab = DiagnosticosDental::find($procedimiento->id_diagnostico);
        }else{
            $procedimiento_lab = TratamientosImplantologia::find($procedimiento->id_diagnostico);
        }

        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $procedimiento->cantidad_uco = $req->cantidad_uco;
        $procedimiento->laboratorio = $req->tiene_lab;
        $procedimiento->cantidad_bloques = $req->cantidad_bloques;
        $procedimiento->valor = $req->valor_uco * $req->cantidad_uco;

        if($procedimiento->save()){
            $trabajos = DiagnosticosDental::where('tipo_examen',1)->orWhere('tipo_examen',2)->orWhere('tipo_examen',3)->get();
            $procedimientos = DiagnosticosDental::where('id_responsable',$profesional->id)->get();
            if($profesional->id_tipo_especialidad != 16)
            {
                $mis_trabajos_profesional = DiagnosticosDentalProfesional::select('diagnosticos_dental_profesional.*','diagnosticos_dental.descripcion','diagnosticos_dental.uco','diagnosticos_dental.tipo_examen','diagnosticos_dental.id_responsable','diagnosticos_dental.id as id_diagnostico')
                                        ->join('diagnosticos_dental','diagnosticos_dental_profesional.id_diagnostico','=','diagnosticos_dental.id')
                                        ->where('diagnosticos_dental_profesional.id_profesional', $profesional->id)
                                        ->get();
            }
            else
            {
                $mis_trabajos_profesional = DiagnosticosDentalProfesional::select('diagnosticos_dental_profesional.*','tratamientos_implantologia.descripcion','tratamientos_implantologia.uco','tratamientos_implantologia.tipo_examen','tratamientos_implantologia.id_responsable','tratamientos_implantologia.id as id_diagnostico')
                                        ->join('tratamientos_implantologia','diagnosticos_dental_profesional.id_diagnostico','=','tratamientos_implantologia.id')
                                        ->where('diagnosticos_dental_profesional.id_profesional', $profesional->id)
                                        ->get();
            }


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
                    $procedimiento->laboratorio = 0; // O el valor por defecto que prefiere
                }
            }

            $procedimientos = $mis_trabajos_profesional;

            return ['status' => 'ok', 'procedimientos' => $procedimientos, 'trabajos' => $trabajos];
        }else{
            return ['status' => 'error'];
        }
    }

    public function mostrarProcedimientoDental(Request $req){
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        if($profesional->id_tipo_especialidad != 16){
                $trabajo = DiagnosticosDentalProfesional::select('diagnosticos_dental_profesional.*','diagnosticos_dental.descripcion','diagnosticos_dental.uco','diagnosticos_dental.tipo_examen','diagnosticos_dental.id_responsable','diagnosticos_dental.id as id_diagnostico')
                            ->join('diagnosticos_dental','diagnosticos_dental_profesional.id_diagnostico','=','diagnosticos_dental.id')
                            ->where('diagnosticos_dental_profesional.id', $req->id)
                            ->first();
        }else{
                $trabajo = DiagnosticosDentalProfesional::select('diagnosticos_dental_profesional.*','tratamientos_implantologia.descripcion','tratamientos_implantologia.uco','tratamientos_implantologia.tipo_examen','tratamientos_implantologia.id_responsable','tratamientos_implantologia.id as id_diagnostico')
                            ->join('tratamientos_implantologia','diagnosticos_dental_profesional.id_diagnostico','=','tratamientos_implantologia.id')
                            ->where('diagnosticos_dental_profesional.id', $req->id)
                            ->first();
        }


        return ['status' => 'ok', 'procedimiento' => $trabajo];
    }

    public function mostrarPrestacionLaboratorio(Request $req){
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $trabajo = ProcedimientosCentro::where('id', $req->id)->first();

        return ['status' => 'ok', 'procedimiento' => $trabajo];
    }

    public function agregarProcedimientoDental(Request $req){

        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        if($req->nuevo_procedimiento == 'true'){
            // agregar procedimiento dental
            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
            $procedimiento = new DiagnosticosDental();
            $procedimiento->descripcion = $req->nombre_procedimiento_nuevo;
            $procedimiento->uco = $req->cantidad_uco;
            $procedimiento->valor = $req->valor_uco * $req->cantidad_uco;
            $procedimiento->tipo_examen = 1;
            $procedimiento->id_responsable = $profesional->id;

            if($procedimiento->save()){
                $trabajo_profesional = new DiagnosticosDentalProfesional;
                $trabajo_profesional->id_profesional = $profesional->id;
                $trabajo_profesional->id_diagnostico = $procedimiento->id;
                $trabajo_profesional->laboratorio = $req->tiene_lab ? 1 : 0;
                $trabajo_profesional->valor = $req->valor_uco * $req->cantidad_uco;
                $trabajo_profesional->save();
                $trabajos = DiagnosticosDental::where('tipo_examen',1)->orWhere('tipo_examen',2)->orWhere('tipo_examen',3)->get();
                $procedimientos = DiagnosticosDental::where('id_responsable',$profesional->id)->get();
                $mis_trabajos_profesional = DiagnosticosDentalProfesional::where('id_profesional', $profesional->id)->get();
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

                $mis_trabajos_profesional = DiagnosticosDentalProfesional::select('diagnosticos_dental_profesional.*','diagnosticos_dental.descripcion','diagnosticos_dental.uco','diagnosticos_dental.valor','diagnosticos_dental.tipo_examen','diagnosticos_dental.id_responsable','diagnosticos_dental.id as id_diagnostico')
                                                                            ->join('diagnosticos_dental','diagnosticos_dental_profesional.id_diagnostico','=','diagnosticos_dental.id')
                                                                            ->where('diagnosticos_dental_profesional.id_profesional', $profesional->id)
                                                                            ->get();

                $procedimientos = $mis_trabajos_profesional;

                return ['status' => 'ok', 'procedimientos' => $procedimientos, 'trabajos' => $trabajos];
            }else{
                return ['status' => 'error'];
            }
        }else{
            if($profesional->id_tipo_especialidad != 16)
                $procedimiento = DiagnosticosDental::where('descripcion', $req->nombre_procedimiento)->first();
            else
                $procedimiento = TratamientosImplantologia::where('descripcion', $req->nombre_procedimiento)->first();

            $trabajo_profesional = new DiagnosticosDentalProfesional;
            $trabajo_profesional->id_profesional = $profesional->id;
            $trabajo_profesional->id_diagnostico = $procedimiento->id;
            $trabajo_profesional->laboratorio = $req->tiene_lab ? 1 : 0;
            $trabajo_profesional->cantidad_bloques = $req->cantidad_bloques;
            $trabajo_profesional->cantidad_uco = $req->cantidad_uco;
            $trabajo_profesional->valor = $req->valor_uco * $req->cantidad_uco;
            $trabajo_profesional->save();
            if($profesional->id_tipo_especialidad != 16)
                $procedimientos = DiagnosticosDental::where('id_responsable',$profesional->id)->get();
            else
                $procedimientos = TratamientosImplantologia::where('id_responsable',$profesional->id)->get();
            $trabajos = DiagnosticosDental::where('tipo_examen',1)->orWhere('tipo_examen',2)->orWhere('tipo_examen',3)->get();
            if($profesional->id_tipo_especialidad != 16)
                $mis_trabajos_profesional = DiagnosticosDentalProfesional::select('diagnosticos_dental_profesional.*','diagnosticos_dental.descripcion','diagnosticos_dental.uco','diagnosticos_dental.tipo_examen','diagnosticos_dental.id_responsable','diagnosticos_dental.id as id_diagnostico')
                ->join('diagnosticos_dental','diagnosticos_dental_profesional.id_diagnostico','=','diagnosticos_dental.id')
                ->where('diagnosticos_dental_profesional.id_profesional', $profesional->id)
                ->get();
            else
                $mis_trabajos_profesional = DiagnosticosDentalProfesional::select('diagnosticos_dental_profesional.*','tratamientos_implantologia.descripcion','tratamientos_implantologia.uco','tratamientos_implantologia.tipo_examen','tratamientos_implantologia.id_responsable','tratamientos_implantologia.id as id_diagnostico')
                ->join('tratamientos_implantologia','diagnosticos_dental_profesional.id_diagnostico','=','tratamientos_implantologia.id')
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

            return ['status' => 'ok', 'procedimientos' => $procedimientos, 'trabajos' => $trabajos, 'mis_trabajos_profesional' => $mis_trabajos_profesional];
        }

    }

    public function eliminarProcedimientoDental(Request $req){
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        if($profesional->id_tipo_especialidad != 16)
            $procedimiento = DiagnosticosDentalProfesional::where('id', $req->id)->first();
        else
            $procedimiento = TratamientosImplantologia::where('id', $req->id)->first();
        if($procedimiento->delete()){
            if($profesional->id_tipo_especialidad != 16)
                $trabajos = DiagnosticosDental::where('tipo_examen',1)->orWhere('tipo_examen',2)->orWhere('tipo_examen',3)->get();
            else
            $trabajos = TratamientosImplantologia::where('tipo_examen',1)->orWhere('tipo_examen',2)->orWhere('tipo_examen',3)->get();
            $procedimientos = DiagnosticosDental::where('id_responsable',$profesional->id)->get();
            if($profesional->id_tipo_especialidad != 16)
                $mis_trabajos_profesional = DiagnosticosDentalProfesional::select('diagnosticos_dental_profesional.*','diagnosticos_dental.descripcion','diagnosticos_dental.uco','diagnosticos_dental.tipo_examen','diagnosticos_dental.id_responsable','diagnosticos_dental.id as id_diagnostico')
                ->join('diagnosticos_dental','diagnosticos_dental_profesional.id_diagnostico','=','diagnosticos_dental.id')
                ->where('diagnosticos_dental_profesional.id_profesional', $profesional->id)
                ->get();
            else
                $mis_trabajos_profesional = DiagnosticosDentalProfesional::select('diagnosticos_dental_profesional.*','tratamientos_implantologia.descripcion','tratamientos_implantologia.uco','tratamientos_implantologia.tipo_examen','tratamientos_implantologia.id_responsable','tratamientos_implantologia.id as id_diagnostico')
                ->join('tratamientos_implantologia','diagnosticos_dental_profesional.id_diagnostico','=','tratamientos_implantologia.id')
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

            return ['status' => 'ok', 'procedimientos' => $procedimientos, 'trabajos' => $trabajos];
        }else{
            return ['status' => 'error'];
        }
    }

    public function mostrar_nueva_pieza_dental_pfu(Request $req){

        $idCounter = $req->counter ? $req->counter : 0;

        $responsable = User::find(Auth::user()->id);
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $odontograma = $this->dameOdontogramaPaciente($req->id_paciente, $req->id_ficha_atencion, $req->id_lugar_atencion, $profesional->id_tipo_especialidad);
        if($req->seccion == 'pfu'){
            $v = view('atencion_odontologica.include.piezas_dental_pfu',['counter' => $idCounter, 'odontograma' => $odontograma])->render();
        }else{
            $v = view('atencion_odontologica.include.piezas_dental_pfp',['counter' => $idCounter, 'odontograma' => $odontograma])->render();
        }

        return ['mensaje' => 'OK','v' => $v, 'odontograma' => $odontograma];
    }

public function insumosDental(){
    $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
    return view('app.dental.insumos_dental',['profesional' => $profesional]);
}

public function eliminarPiezaCoronaProtesis(Request $req){
    $pieza = PiezasDentalCoronaProtesis::find($req->id);
    $id_paciente = $pieza->id_paciente;
    $id_profesional = $pieza->id_profesional;
    $seccion = $pieza->seccion;
    if($pieza->delete()){
        $examenes = $this->dameProcedimientosCoronaProtesis($id_paciente, $id_profesional, $seccion);
        $v = view('atencion_odontologica.include.procedimientos_corona_protesis_todos',['examenes' => $examenes,'seccion' => $seccion])->render();
        return ['mensaje' => 'OK', 'v' => $v,'examenes' => $examenes];
    }
    return $pieza;
}

    public function config_profesional()
    {
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        return view('app.profesional.configuracion_profesional')->with(['profesional' => $profesional]);
    }

    public function mis_lugares()
    {
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        //$lugarAtencion = LugarAtencion::where()
        $lugares = $profesional->LugaresAtencion()->get();
        //ProfesionalesLugaresAtencion::where('id_profesional', $profesional->id)->get();

        // echo json_encode($lugares);

        //$lugares = [];
        //
        //foreach ($lugares as $lt) {
        //     $lt->lugar = $lt->LugaresAtencion()->first();
        //array_push($lugares, $a->LugaresAtencion()->first()->estado);
        //}

        //$lugares = $profesional->LugaresAtencion()->get();
        $region = Region::all();

        return view('app.profesional.mis_lugares_atencion')->with([
            'lugares' => $lugares,
            'region' => $region,
            'id_profesional' => $profesional->id,
            'profesional' => $profesional,
        ]);
    }

    public function eliminar_valor_lugar_atencion(Request $request)
    {
        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();

        $convenio = ProfesionalConvenio::where('id', $request->id_convenio)->first();

        if (!$convenio->delete()) {
            return 'failed';
        }

        return 'ok';
    }

    public function mi_agenda(Request $request)
    {
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $institucion = Instituciones::where('id_lugar_atencion',$request->lugares_atencion)->first();

        if($institucion && $institucion->id_tipo_institucion == 2){
            try {
                // buscamos los servicios internos
            $servicios_internos = $this->dame_servicios_internos($institucion->id, $institucion->id_lugar_atencion);

            foreach($servicios_internos as $servicio_interno){
                // preguntamos si es profesional es jefe de algun servicio
                if($servicio_interno->jefe_servicio && $servicio_interno->jefe_servicio->id == $profesional->id){
                    return view('app.adm_hospital.servicios.jefe_servicio.escritorio_adm',['servicio' => $servicio_interno])->render();
                }
            }

            foreach($servicios_internos as $servicio_interno){
                // preguntamos si el profesional pertenece al grupo de profesionales del hospital de algun servicio
                foreach($servicio_interno->profesionales as $profesional_servicio){
                    if($profesional_servicio->id == $profesional->id && $profesional->id_especialidad == 8){
                        $enfermera = true;
                        $tipos_receta = TiposReceta::all();
                        $controles_ciclo = $this->dameEvolucionesPacienteHosp($servicio_interno->id_paciente);
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
                        $curaciones_planas = $this->dameCuracionesPlanasPaciente($servicio_interno->id_paciente);
                        $curaciones_lpp = $this->dameCuracionesLppPaciente($servicio_interno->id_paciente);

                        $controles_ciclo = $this->dameEvolucionesPacienteHosp($servicio_interno->id_paciente);

                        $detalle_receta_controlador = new DetalleRecetaController();
                        $recetas = $detalle_receta_controlador->dameTodoDetalleRecetaPaciente($servicio_interno->id_paciente);

                        $resumen_recetas = "";
                        foreach($recetas as $r){
                            $resumen_recetas .= "<p>".$r->nombre_medicamento." ".$r->dosis." ".$r->nombre_frecuencia." ".$r->duracion." ".$r->comentario." con fecha ".$r->created_at."</p>";
                        }
                        // return view('app.adm_hospital.servicios.enfermera.escritorio_enfermera',[
                        //     'servicio' => $servicio_interno,
                        //     'institucion' => $institucion,
                        //     'enfermera' => $enfermera,
                        //     'tipos_receta' => $tipos_receta,
                        //     'controles_ciclo' => $controles_ciclo,
                        //     'contador_div_evaluaciones' => $contador_div_evaluaciones,
                        //     'curacion_plana' => $curaciones_planas,
                        //     'curaciones_lpp' => $curaciones_lpp,
                        //     'controles_ciclo' => $controles_ciclo,
                        //     'recetas' => $recetas,
                        //     'resumen_recetas' => $resumen_recetas
                        //     ])->render();
                        $receta_control = RecetaControl::orderBy('Descripcion')->get();
                        $examenMedico = ExamenMedico::where('cod_parent', 0)->where('habilitado', 1)->orderby('nombre_examen', 'ASC')->get();
                        $examenControlador = new ExamenMedicoController();
                        $examenes_solicitados = $examenControlador->dame_examenes_solicitados($servicio_interno->id_paciente);
                        return view('app.adm_hospital.servicios.enfermera.home',[
                            'enfermera' => $enfermera,
                            'institucion' => $institucion,
                            'servicio' => $servicio_interno,
                            'tipos_receta' => $tipos_receta,
                            'receta_control' => $receta_control,
                            'examenMedico' => $examenMedico,
                            'examenes_solicitados' => $examenes_solicitados
                        ])->render();
                    }
                    if($profesional_servicio->id == $profesional->id){
                        return view('app.adm_hospital.servicios.profesionales.escritorio',['servicio' => $servicio_interno])->render();
                    }
                }
            }

            return $servicios_internos;
            } catch (\Exception $e) {
                //throw $th;
                return $e->getMessage();
            }

        }
        /** tipos de agendas del profesional */
        $tipo_agendas_temp = ProfesionalHorario::select('tipo_agenda')->where('id_lugar_atencion', $request->lugares_atencion)->where('id_profesional', $profesional->id)->orderBy('tipo_agenda')->groupBy('tipo_agenda')->first();
        $horario = array();
        $lugares = $profesional->LugaresAtencion()->get();
        $prevision = Prevision::all();
        $region = Region::all();

        if($tipo_agendas_temp)
        {
            $horario = ProfesionalHorario::where('id_profesional', $profesional->id)->where('id_lugar_atencion', $request->lugares_atencion)->where('tipo_agenda', $tipo_agendas_temp->tipo_agenda)->get();
            $horas_medicas = HoraMedica::where('id_profesional', $profesional->id)
                                        ->whereIn('id_estado',[1,2,4,5,6,7,8])
                                        ->with(['Paciente'=> function($query){
                                                    $query->select('id','id_prevision','rut')
                                                            ->with(['Prevision'=>function($query2){
                                                                        $query2->select('id','nombre');
                                                    }]);
                                                }])
                                        ->get();

            //$horario = ProfesionalHorario::where('id_profesional', $profesional->id)->get();

            $reg_confirmacion_hora = RegistroConfirmacionHoraAgenda::where('estado',1)->get();
            $lugarAtencion = LugarAtencion::find($request->lugares_atencion);
        }

        if($tipo_agendas_temp)
        {
            $horario = ProfesionalHorario::where('id_profesional', $profesional->id)->where('id_lugar_atencion', $request->lugares_atencion)->where('tipo_agenda', $tipo_agendas_temp->tipo_agenda)->get();
            $horas_medicas = HoraMedica::where('id_profesional', $profesional->id)
                                        ->whereIn('id_estado',[1,2,4,5,6,7,8])
                                        ->with(['Paciente'=> function($query){
                                                    $query->select('id','id_prevision','rut')
                                                            ->with(['Prevision'=>function($query2){
                                                                        $query2->select('id','nombre');
                                                    }]);
                                                }])
                                        ->get();

            //$horario = ProfesionalHorario::where('id_profesional', $profesional->id)->get();

            $reg_confirmacion_hora = RegistroConfirmacionHoraAgenda::where('estado',1)->get();
            $lugarAtencion = LugarAtencion::find($request->lugares_atencion);
        }

        if (count($horario) == 0) {
            return view('app.profesional.mis_lugares_atencion')->with(
                [
                    'id_profesional' => $profesional->id,
                    'profesional' => $profesional,
                    'lugares' => $lugares,
                    'region' => $region,
                    'mensaje' => 'Para abrir Agenda debe ingresar horario de atención en el botón correspondiente'
                ]
            );
        }

        // dd($horario);

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

        if (!isset($horario)) {
            return view('app.profesional.mis_lugares_atencion')->with([
                'id_profesional' => $profesional->id,
                'profesional' => $profesional,
                'lugares' => $lugares,
                'region' => $region,
                'mensaje' => 'Para abrir Agenda debe ingresar horario de atención en el botón correspondiente',
            ]);
        }
        $tipo_agendas = ProfesionalHorario::select('tipo_agenda')->where('id_lugar_atencion', $request->lugares_atencion)->where('id_profesional', $profesional->id)->groupBy('tipo_agenda')->pluck('tipo_agenda')->toArray();

        $arrayTipoAgenda = array('', 'Atención General', 'Atención Dental', 'Atención Telemedicina', 'Exámenes', 'Laboratorio');
        $listaTipoAgendaProf = array();
        foreach ($tipo_agendas as $keyTA => $valueTA) {
            array_push($listaTipoAgendaProf, array('id' => $valueTA, 'texto' => $arrayTipoAgenda[$valueTA]));
        }

        /** BLOQUEOS DE HORARIOS */
        $filtro_bloqueos = array();
        $filtro_bloqueos[] = array('id_profesional', $profesional->id);
        $filtro_bloqueos[] = array('id_lugar_atencion', $lugarAtencion->id);
        $bloque_horario = ProfesionalHorariosBloqueo::where($filtro_bloqueos)->get();
        $tipo_bonos = TipoBono::where('estado', 1)->get();

        $filtro_procedimiento = array();
        $filtro_procedimiento[] = array('procedimientos_centro.id_lugar_atencion', $lugarAtencion->id);
        $filtro_procedimiento[] = array('procedimientos_centro.estado', 1);
        $id_profesional = $profesional->id;
        // $filtro_procedimiento[] = array('procedimientos_lugar_atencion_profesional.id_profesional', '=', $id_profesional);
        // $filtro_procedimiento[] = array('procedimientos_lugar_atencion_profesional.estado', '=', '1');
        $procedimientos = ProcedimientosCentro::select( 'procedimientos_centro.id', 'procedimientos_centro.nombre', 'procedimientos_centro.minutos_bloque', 'procedimientos_centro.cantidad_bloques',
                                                        'procedimientos_lugar_atencion_profesional.cantidad_bloques as cantidad_bloques_prof' )
                                            ->leftJoin('procedimientos_lugar_atencion_profesional', function($join) use ($id_profesional) {
                                                $join->on('procedimientos_centro.id', '=', 'procedimientos_lugar_atencion_profesional.id_procedimiento_centro' )
                                                ->where('procedimientos_lugar_atencion_profesional.id_profesional', '=', $id_profesional )
                                                ->where('procedimientos_lugar_atencion_profesional.estado', '=', 1 );
                                            })
                                            ->where($filtro_procedimiento)
                                            ->get();

        $procedimientos_dentales = DiagnosticosDental::all();

        // echo json_encode($procedimientos);
        // die();

		// box de institucion
        $filtro_box = array();
        $filtro_box[] = array('estado',1);
        $filtro_box[] = array('id_lugar_atencion',$request->lugares_atencion);
        $boxes = BoxesCm::where($filtro_box)->get();

        // BOX DEL PROFESIONAL
        $filtro_l_p_b = array();
        $filtro_l_p_b[] = array('estado', 1);
        $filtro_l_p_b[] = array('id_lugar_atencion', $request->lugares_atencion);
        $filtro_l_p_b[] = array('id_profesional', $profesional->id);
        $lug_prof_box = LugarAtencionBoxProfesional::with('box')->where($filtro_l_p_b)->first();

        return view('app.profesional.agenda')->with(
            [
                'horas_medicas' => $horas_medicas,
                'horario' => $horario,
                'horario_agenda' => $horario_agenda,
                'periodo_agenda' => $periodo_agenda,
                'hora_inicio_agenda' => $hora_inicio_agenda,
                'hora_termino_agenda' => $hora_termino_agenda,
                'prevision' => $prevision,
                'region' => $region,
                'lugar_atencion' => $request->lugares_atencion,
                'lugar_atencion_nombre' => $lugarAtencion->nombre,
                'reg_confirmacion_hora' => $reg_confirmacion_hora,
                'profesional' => $profesional,
                'id_profesional ' => $profesional->id,
                'tipo_agendas' => $tipo_agendas,
                'listaTipoAgendaProf' => $listaTipoAgendaProf,
                'bloque_horario' => $bloque_horario,
                'tipo_bonos' => $tipo_bonos,
                'tipo_agenda_activa' => $tipo_agendas_temp->tipo_agenda,
                'procedimientos' => $procedimientos,
                'procedimientos_dentales' => $procedimientos_dentales,
                'boxes' => $boxes,
                'lugares_atencion' => $lugarAtencion,
                'lug_prof_box' => $lug_prof_box,
				'institucion' => $institucion,
            ]

        );
    }

    public function dame_tratamientos_presupuesto(Request $req){

        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        if(!$profesional){
            $profesional = Profesional::where('id',$req->id_profesional)->first();
        }
        $presupuesto_dental = PresupuestosDental::where('id',$req->id)->where('id_profesional',$profesional->id)->first();

        if($presupuesto_dental){
            // $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();

        if($profesional->tipo_especialidad == 16){
            $tratamientos_piezas = OdontogramaPaciente::select(
                'odontogramas_pacientes.*',
                'tratamientos_implantologia.descripcion',
                'tratamientos_implantologia.cantidad_bloques',
                'tratamientos_implantologia.valor',
                'tratamientos_dental.descripcion as diagnostico')
                ->leftjoin('tratamientos_implantologia', 'odontogramas_pacientes.tratamiento', '=', 'tratamientos_implantologia.descripcion')
                ->leftjoin('tratamientos_dental', 'odontogramas_pacientes.diagnostico', '=', 'tratamientos_dental.id')
                ->where('odontogramas_pacientes.id_presupuesto', $presupuesto_dental->id)
                ->where('odontogramas_pacientes.estado', 0)
                ->get();
        }else{
            $tratamientos_piezas = OdontogramaPaciente::select(
                'odontogramas_pacientes.*',
                'diagnosticos_dental.descripcion',
                'diagnosticos_dental.cantidad_bloques',
                'diagnosticos_dental.valor',
                'tratamientos_dental.descripcion as diagnostico')
                ->leftjoin('diagnosticos_dental', 'odontogramas_pacientes.tratamiento', '=', 'diagnosticos_dental.descripcion')
                ->leftjoin('tratamientos_dental', 'odontogramas_pacientes.diagnostico', '=', 'tratamientos_dental.id')
                ->where('odontogramas_pacientes.id_presupuesto', $presupuesto_dental->id)
                ->where('odontogramas_pacientes.estado', 0)
                ->get();
        }

            $bloques = 0;
            $todos = $this->dameTratamientosPresupuesto($presupuesto_dental->id_paciente, $profesional->id);
        }else{
            $tratamientos_piezas = [];
            $bloques = 1;
            $todos = [];
        }

        return [
            'tratamientos' => $tratamientos_piezas,
            'bloques' => $bloques,
            'todos' => $todos
        ];
    }

    public function dameTratamientosPresupuesto($id_paciente, $id_profesional)
    {
        $profesional = Profesional::where('id', $id_profesional)->first();
        if($profesional->id_tipo_especialidad == 16){
            // Tratamientos dentales
        $examenes = ExamenesBocaGeneral::select('examenes_boca_general.*', 'diagnosticos_dental.valor','tratamientos_dental.descripcion')
            ->join('diagnosticos_dental', 'examenes_boca_general.diagnostico_tratamiento', '=', 'diagnosticos_dental.descripcion')
            ->join('tratamientos_dental','examenes_boca_general.diagnostico','tratamientos_dental.id')
            ->where('examenes_boca_general.id_paciente', $id_paciente)
            ->where('examenes_boca_general.id_profesional', $id_profesional)
            ->where('examenes_boca_general.terminado', 1)
            ->get();
        }else{
            $examenes = ExamenesBocaGeneral::select('examenes_boca_general.*', 'tratamientos_implantologia.valor','tratamientos_dental.descripcion')
            ->join('tratamientos_implantologia', 'examenes_boca_general.diagnostico_tratamiento', '=', 'tratamientos_implantologia.descripcion')
            ->join('tratamientos_dental','examenes_boca_general.diagnostico','tratamientos_dental.id')
            ->where('examenes_boca_general.id_paciente', $id_paciente)
            ->where('examenes_boca_general.id_profesional', $id_profesional)
            ->where('examenes_boca_general.terminado', 1)
            ->get();
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

    public function dameCuracionesPlanasPaciente($id_paciente){
        $curacion = CuracionesPlanasServicio::select('curaciones_planas_servicio.*','users.name as responsable')
                                        ->join('users','users.id','=','curaciones_planas_servicio.id_responsable')
                                        ->where('id_paciente', $id_paciente)
                                        ->where('activa', 1)
                                        ->first();

            if($curacion)
            {
                // convertir el atributo datos_procedimiento de longtext a array
                $curacion->datos_curacion_plana = json_decode($curacion->datos_curacion_plana);
                // sacar la fecha y hora del campo created_at
                $curacion->fecha = date('d-m-Y', strtotime($curacion->created_at));
                $curacion->hora = date('H:i', strtotime($curacion->created_at));
            }


        return $curacion;
    }

    public function guardarCuracionLPPServicio(Request $req){
        try {
            //code...
            $nueva_curacion_lpp = new CuracionesLppServicio();
            $nueva_curacion_lpp->id_institucion = 19;
            $nueva_curacion_lpp->id_servicio = 4;
            $nueva_curacion_lpp->id_paciente = $req->id_paciente;
            $nueva_curacion_lpp->id_responsable = Auth::user()->id;

            $datos_curacion = [
                'upp_local_eval' => $req->upp_local_eval,
                'upp_gr_eval' => $req->upp_gr_eval,
                'upp_diam_eval' => $req->upp_diam_eval,
                'upp_prof_eval' => $req->upp_prof_eval,
                'upp_Infec_eval' => $req->upp_Infec_eval,
                'obs_pa_eval_upp' => $req->obs_pa_eval_upp,
                'patologias_asociadas' => $req->patologias,
            ];

            $nueva_curacion_lpp->datos_curacion_lpp = json_encode($datos_curacion);
            $nueva_curacion_lpp->activo = 1;
            if($nueva_curacion_lpp->save()){
                $curaciones_lpp = $this->dameCuracionesLppPaciente($req->id_paciente);
                return ['mensaje' => 'OK','curaciones_lpp' => $curaciones_lpp];
            }
        } catch (\Exception $e) {
            //throw $th;
            return ['mensaje' => $e->getMessage()];
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function dameCuracionesLppPaciente($id_paciente){
        $curaciones = CuracionesLppServicio::select('curaciones_lpp_servicio.*','users.name as responsable')
                                        ->join('users','users.id','=','curaciones_lpp_servicio.id_responsable')
                                        ->where('id_paciente', $id_paciente)
                                        ->where('activo', 1)
                                        ->get();

        foreach($curaciones as $curacion)
        {
            // convertir el atributo datos_procedimiento de longtext a array
            $curacion->datos_curacion_lpp = json_decode($curacion->datos_curacion_lpp);
            // sacar la fecha y hora del campo created_at
            $curacion->fecha = date('d-m-Y', strtotime($curacion->created_at));
            $curacion->hora = date('H:i', strtotime($curacion->created_at));
        }

        return $curaciones;
    }

    public function eliminarCuracionLPPServicio($id){
        try {
            //code...
            $curacion = CuracionesLppServicio::find($id);
            $curacion->activo = 0;
            if($curacion->save()){
                $curaciones_lpp = $this->dameCuracionesLppPaciente($curacion->id_paciente);
                return ['mensaje' => 'OK','curaciones_lpp' => $curaciones_lpp];
            }
        } catch (\Exception $e) {
            //throw $th;
            return ['mensaje' => $e->getMessage()];
        }
    }

    public function dameEvolucionesPaciente($idpaciente){
        $controles_ciclo = EvolucionUrgencia::select('evoluciones_urgencias.*','users.name as nombre')
                                                    ->join('users','users.id','=','evoluciones_urgencias.id_responsable')
                                                    ->where('evoluciones_urgencias.id_paciente', $idpaciente)
                                                    ->get();

        return $controles_ciclo;
    }

    public function dame_servicios_internos($id_institucion, $id_lugar_atencion){
        $servicios_internos = ServiciosInternos::select('servicio_interno.*','servicios.nombre as nombre_servicio','profesionales.nombre as nombre_responsable','profesionales.apellido_uno as apellido_uno_responsable','profesionales.apellido_dos as apellido_dos_responsable')
                            ->join('servicios','servicios.id','=','servicio_interno.id_servicio')
                            ->leftjoin('profesionales','profesionales.id','=','servicio_interno.id_responsable')
                            // ->where('servicio_interno.id_institucion',$id_institucion)
                            ->where('servicio_interno.id_lugar_atencion',$id_lugar_atencion)
                            ->get();

        foreach($servicios_internos as $servicio_interno){
            $salas_servicio = ServiciosInternosSalas::where('id_servicio_interno',$servicio_interno->id)->get();
            $servicio_interno->salas = $salas_servicio;

            $profesionales = ProfesionalServicioClinico::select('profesionales.*','profesionales_servicios_clinicos.id_servicio_interno','especialidades.nombre as especialidad','tipos_especialidad.nombre as tipo_especialidad')
                                ->join('profesionales','profesionales_servicios_clinicos.id_profesional','profesionales.id')
                                ->join('especialidades','profesionales.id_especialidad','especialidades.id')
                                ->leftjoin('tipos_especialidad','profesionales.id_tipo_especialidad','tipos_especialidad.id')
                                ->where('profesionales_servicios_clinicos.id_cargo',1)
                                ->where('profesionales_servicios_clinicos.id_servicio_interno',$servicio_interno->id)
                                ->get();
            $servicio_interno->profesionales = $profesionales;

            $tens = ProfesionalServicioClinico::select('profesionales.*','profesionales_servicios_clinicos.id_servicio_interno','especialidades.nombre as especialidad','tipos_especialidad.nombre as tipo_especialidad')
                                ->join('profesionales','profesionales_servicios_clinicos.id_profesional','profesionales.id')
                                ->join('especialidades','profesionales.id_especialidad','especialidades.id')
                                ->leftjoin('tipos_especialidad','profesionales.id_tipo_especialidad','tipos_especialidad.id')
                                ->where('profesionales_servicios_clinicos.id_cargo',5)
                                ->where('profesionales_servicios_clinicos.id_servicio_interno',$servicio_interno->id)
                                ->get();

            $servicio_interno->tens = $tens;

            $servicio_interno->jefe_servicio = Profesional::find($servicio_interno->id_responsable);
        }

        return $servicios_internos;
    }

    public function atenciones_previas_paciente($id)
    {
        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();
        $fichas = FichaAtencion::where('id_paciente', $id)->where('id_profesional', $profesional->id)->where('finalizada', 1)->get();

        //$detalle_receta = $fichas->Recetas()->get();
        //dd($detalle_receta);

        return view('app.profesional.atenciones_previas_paciente')->with(['fichas' => $fichas,'profesional' => $profesional]);
    }

    public function buscar_receta_ficha(Request $request)
    {
        $ficha = FichaAtencion::where('id', $request->id_ficha)->first();

        $detalle_receta = DetalleReceta::where('id_ficha', $request->id_ficha)->get();

        return json_encode($detalle_receta);
    }

    public function buscar_examen_ficha(Request $request)
    {
        $ficha = FichaAtencion::where('id', $request->id_ficha)->first();
        $examenes = $ficha->Examenes()->get();

        return json_encode($examenes);
    }

    public function agregar_lugar_atencion(Request $request)
    {
        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();

        $direccion = new Direccion();
        $direccion->direccion = $request->direccion_lugar_atencion;
        $direccion->numero_dir = $request->numero_lugar_atencion;
        $direccion->id_ciudad = $request->ciudad_agregar;

        $lugar_existente = LugarAtencion::where('email', $request->email_lugar_atencion)->first();

        if ($lugar_existente != '') {
            return back()->with('mensaje', 'email ya existe');
        }

        $ciudad = Ciudad::where('id', $direccion->id_ciudad)->first();

        if (!$direccion->save()) {
            return 'error';
        }

        $lugar_atencion = new LugarAtencion();
        $lugar_atencion->nombre = $request->nombre_lugar_atencion;
        $lugar_atencion->email = $request->email_lugar_atencion;
        $lugar_atencion->rut = $request->rut_lugar_atencion;
        $lugar_atencion->telefono = $request->telefono_lugar_atencion;
        $lugar_atencion->id_direccion = $direccion->id;
        $lugar_atencion->tipo = $request->tipo_agregar_lugar_atencion;

        if ($lugar_atencion->save()) {
            $profesional_lugar_atencion = new ProfesionalesLugaresAtencion();
            $profesional_lugar_atencion->id_profesional = $profesional->id;
            $profesional_lugar_atencion->id_lugar_atencion = $lugar_atencion->id;

            if (!$profesional_lugar_atencion->save()) {
                return 'error';
            }

            if ($request->notificar_pacientes == 'on') {
                $fichas = FichaAtencion::where('id_profesional', Auth::user()->id)->get();

                $pacientes = [];
                foreach ($fichas as $f) {
                    array_push($pacientes, $f->Paciente()->first());
                }

                foreach ($pacientes as $p) {
                    $details = [
                        'title' => 'Nuevo lugar de atención',
                        'body' => 'Estimado/a ' . $p->nombres . ' ' . $p->apellido_uno . ' ' . $p->apellido_dos . ',<br/>
                    Junto con saludar, por medio de este correo le informamos que el profesional Dr. ' .
                            $profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos .
                            ' <br/> ha agregado un nuevo lugar de atención:  <br/>' .
                            'Nombre:' . $lugar_atencion->nombre . ' <br/>' .
                            'Dirección: ' . $direccion->direccion . ' ' . $direccion->numero_dir . ' <br/>' .
                            'Ciudad: ' . $ciudad->nombre .
                            '<br/> Que tenga un excelente día. <br/><br/> \n' .
                            ' Saludos.',
                    ];

                    //Mail::to('jkriman@gmail.com')->send(new \App\Mail\RegistroPacienteMail($details));
                }
            }

            return back()->with(['mensaje' => 'se agregado centro de atención','titulo_mensaje'=>'Mis Lugares de Atención']);
        }

        return 'error';
    }

    public function crear_contacto_paciente(Request $request)
    {
        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();

        $apellidoPaso = explode(' ', $request->apellidos_paciente);

        $contacto = new ContactoEmergencia();
        $contacto->rut = $request->rut_paciente;
        $contacto->nombre = $request->nombres_paciente;
        $contacto->apellido_uno = $apellidoPaso[0];
        $contacto->apellido_dos = $apellidoPaso[1];
        $contacto->id_direccion = mt_rand(1, 10);
        $contacto->email = $request->email_paciente;
        $contacto->telefono = $request->telefono_paciente;
        $contacto->fecha_nac = $request->fecha_nac_paciente;
        $contacto->prioridad = $request->prioridad;

        $paciente = paciente::where('id', $request->id_paciente)->first();

        if ($contacto->save()) {
            $paciente->ContactosEmergencia()->attach($contacto->id);

            return back()->with('mensaje', 'se agregado centro de atención');
        }

        return 'error';
    }

    public function mis_horas()
    {
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $horas_medicas = $profesional->mis_horas()->get();

        $duracion = 15;

        $datos = [];
        foreach ($horas_medicas as $hora_medica) {
            array_push(
                $datos,
                [
                    'id' => $hora_medica->id_hora_medica,
                    'title' => $hora_medica->descripcion_estado_hora_medica+'Bienvenido!!',
                    'extendedProps' => ['estado' => $hora_medica->id_estado_hora_medica],
                    'start' => $hora_medica->fecha_hora_medica . 'T' . $hora_medica->hora_hora_medica . ':10',
                    'end' => $hora_medica->fecha_hora_medica . 'T' . date('H:i', strtotime($hora_medica->hora_hora_medica) + (60 * $duracion)) . ':00',
                    'color' => $hora_medica->color_estado_hora_medica,
                ]
            );
        }

        return json_encode($datos);
    }

    public function datos_hora_paciente($id_hora_medica)
    {
        if (!is_numeric($id_hora_medica)) {
            print_r(json_encode(['success' => 0, 'message' => 'Hora médica no válida']));
            exit();
        }

        $respuesta = $this->Agenda_profesional_model->datos_hora_paciente($id_hora_medica);
        print_r(json_encode($respuesta));
    }

    public function desasociar_asistente(Request $request)
    {

        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $asistente = ProfesionalAsistente::where('id_asistente', $request->id)->first();

        if ($asistente == null) {

            $asistentes = AsistenteLugarAtencion::where('id_asistente', $request->id)->first();
            if (!$asistentes->delete()) {

                return 'fail';
            }
        } else {
            if (!$asistente->delete()) {
                return 'fail';
            }
        }

        return 'ok';
    }

    public function buscar_rut_paciente(Request $request)
    {

        if ($request->tipo == 'asistente') {
            $asistente = Asistente::where('rut', $request->rut)->with(['Direccion' => function($query){$query->with('Ciudad')->first();}])->first();

            if ($asistente != null) {
                return 'asistente';
            }
        }

        $tipo_paciente = 1;
        $paciente = Paciente::where('rut', $request->rut)->with('Prevision')->with(['Direccion' => function($query){$query->with('Ciudad')->first();}])->first();
        if ($paciente == null) {
            $tipo_paciente++;
            $paciente = Asistente::where('rut', $request->rut)->with(['Direccion' => function($query){$query->with('Ciudad')->first();}])->first();
            if ($paciente == null) {
                $tipo_paciente++;
                $paciente = Profesional::where('rut', $request->rut)->with(['Direccion' => function($query){$query->with('Ciudad')->first();}])->first();
                if ($paciente == null) {
                    $tipo_paciente++;
                    //$paciente = Personas::select('id as id', 'rut as rut', 'nombre1 as nombres', 'appaterno as apellido_uno', 'apmaterno as apellido_dos')->where('rut', $request->rut)->first();
                }
            }
        }
        if(isset($paciente))
            $paciente['code'] = Crypt::encryptString( $paciente['email'] );
        else
            $paciente = null;

        // validar si es paciente
        if($tipo_paciente > 1)
        {
            $regiones = Region::all();
            $paciente['tipo_paciente'] = 'NO';
            $paciente['edad'] = 99;
            $paciente['nombre_responsable'] = '';
            $paciente['id_responsable'] = '';
            $paciente['mascotas'] = [];
            $paciente['regiones'] = $regiones;

            return json_encode($paciente);
        }
        else
        {
            $paciente['tipo_paciente'] = 'SI';
            $edad = \Carbon\Carbon::parse($paciente->fecha_nac)->diff(\Carbon\Carbon::now())->format('%y');
            $paciente['edad'] = $edad;

            $nombres_representante = '';
            $id_representante = '';
            $registro_temp = '';

            /** datos de representeante y acompañantes */
            if( $edad < 18)
            {
                $lista_representante = PacientesDependientes::where('id_paciente', $paciente->id)->get();
                if($lista_representante)
                {
                    $array_resp = array();
                    foreach ($lista_representante as $key => $value)
                    {
                        $paciente_temp = Paciente::find($value->id_responsable);
                        $array_resp[] = $paciente_temp->id;
                        if(!empty($nombres_representante))
                        {
                            $nombres_representante .= ' - ';
                            $id_representante .= '-';
                        }
                        $nombres_representante .= $paciente_temp->nombres.' '.$paciente_temp->apellido_uno.' '.$paciente_temp->apellido_dos;
                        $id_representante .= $paciente_temp->id;
                    }

                    /** BUSCAR RESPONSABLES */
                    $filtro_temp = array();
                    $filtro_temp[] = array('id_dependiente', $paciente->id);
                    $registro_depen = AcompananteDependiente::where($filtro_temp)->where('id_tipo', 1)->with('acompanante');
                    $registro_temp = AcompananteDependiente::whereIn('id_responsable', $array_resp)->whereNull('id_dependiente')->where('id_tipo', 2)->with('acompanante')->union($registro_depen)->get();
                }
            }
            $paciente['nombre_responsable'] = $nombres_representante;
            $paciente['id_responsable'] = $id_representante;
            $paciente['acompanante'] = $registro_temp;
            $paciente['mascotas'] = Mascota::with(['especieMascota', 'tamanoMascota'])
                ->where('id_responsable', $paciente->id)
                ->get();


        }

        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();

        if(!$profesional){
            $profesional = Profesional::where('id', $request->id_profesional)->first();
        }

        if($paciente['tipo_paciente'] == 'SI'){
            if($profesional->id_especialidad == 2){
                $presupuestos_dentales = PresupuestosDental::where('id_paciente',$paciente->id)->where('id_profesional', $profesional->id)->where('estado',1)->get();

                if($presupuestos_dentales) $paciente['presupuestos'] = $presupuestos_dentales;
            }else{
                $paciente['presupuestos'] = [];
            }
        }


        // $paciente->fecha_ultima = Carbon::now()->format('Y-m-d');
        // $paciente['fecha_ultima'] = Carbon::now()->format('Y-m-d');

        $profesional_agenda = Profesional::where('id_usuario', $request->id_profesional)->first();

		if($profesional_agenda && !$profesional && $paciente['tipo_paciente'] == 'SI')
		{
			$fecha_ultima_atencion = HoraMedica::select('horas_medicas.fecha_consulta','fichas_atenciones.*')
			->join('fichas_atenciones','horas_medicas.id_ficha_atencion','fichas_atenciones.id')
			->where('horas_medicas.id_paciente', $paciente->id)
			->where('horas_medicas.id_profesional', $profesional_agenda->id)
			->where('fichas_atenciones.finalizada',1)
			->where('horas_medicas.id_lugar_atencion', $request->id_lugar_atencion)
			->orderBy('horas_medicas.id','desc')
			->first();

			if ($fecha_ultima_atencion) {
				$paciente->fecha_ultima_atencion = Carbon::parse($fecha_ultima_atencion->fecha_consulta)->toDateString(); // Solo la fecha (YYYY-MM-DD)
				//$paciente->hora_ultima_atencion = Carbon::parse($fecha_ultima_atencion->created_at)->toTimeString(); // Solo la hora (HH:MM:SS)
			}else{
                $paciente->fecha_ultima_atencion = Carbon::now()->format('Y-m-d');
            }
		}

        if($profesional && $paciente['tipo_paciente'] == 'SI'){
            $fecha_ultima_atencion = HoraMedica::select('horas_medicas.fecha_consulta','fichas_atenciones.*')
			->join('fichas_atenciones','horas_medicas.id_ficha_atencion','fichas_atenciones.id')
			// ->where('horas_medicas.id_paciente', $paciente->id)
			->where('horas_medicas.id_profesional', $profesional->id)
			->where('fichas_atenciones.finalizada',1)
			->where('horas_medicas.id_lugar_atencion', $request->id_lugar_atencion)
			->orderBy('horas_medicas.id','desc')
			->first();
            //if($fecha_ultima_atencion) $paciente->fecha_ultima_atencion = Carbon::parse($fecha_ultima_atencion->fecha_consulta)->toDateString(); // Solo la fecha (YYYY-MM-DD)
        }
        else
		{
			$paciente['fecha_ultima_atencion'] = Carbon::now()->format('Y-m-d');
		}

        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

        // bonos
        if($profesional &&  $paciente['tipo_paciente'] == 'NO'){
            // $bonos = Bono::where('id_paciente', $paciente->id)->where('id_profesional',$profesional->id)->orderBy('id','desc')->take(1)->get();
            $bonos = [];
            //$paciente->bonos = $bonos;
        }else{
            if($paciente['tipo_paciente'] == 'SI' && isset($paciente->id)){
                $bonos = Bono::where('id_paciente', $paciente->id)->where('id_profesional',$request->id_profesional)->get();
                $paciente->bonos = $bonos;
            }else{
                $paciente['bonos'] = [];
            }

        }

         $procedimientos_lugar_atencion = ProcedimientosCentroLugarAtencionProfesional::where('id_lugar_atencion', $request->id_lugar_atencion)
                                                    ->where('id_profesional', $request->id_profesional)
                                                    ->get();

        $paciente['procedimientos_lugar_atencion'] = $procedimientos_lugar_atencion;
        $paciente['id_lugar_atencion'] = $request->id_lugar_atencion;
        $paciente['id_profesional'] = $request->id_profesional;


        return json_encode($paciente);
    }

    /** METODO PARA VALIDAR EL TIPO AGENDA POR HORA SELECCIONADA Y RPOFESIONAL */
    public function tipoHorario_r(Request $request)
    {
        return static::tipoHorario($request->id_profesional, $request->fecha_consulta);
    }

    static public function tipoHorario($id_profesional, $fecha_consulta)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($id_profesional))
        {
            $error['id_profesional'] = 'Campos requeridos';
            $valido = 0;
        }
        if(empty($fecha_consulta))
        {
            $error['fecha_consulta'] = 'Campos requeridos';
            $valido = 0;
        }

        if($valido)
        {
            $fecha_consulta = \Carbon\Carbon::parse($fecha_consulta); //2024-01-05T08:00:01-03:00
            // var_dump($fecha_consulta);
            $dia_semana = $fecha_consulta->dayOfWeek;
            // var_dump($dia_semana);
            $hora_inicio = $fecha_consulta->format('H:i:s');
            // var_dump($hora_inicio);
            $horario = ProfesionalHorario::where('dia','like','%'.$dia_semana.'%')
                                        ->where('id_profesional', $id_profesional)
                                        // ->whereBetween($hora_inicio, ['hora_inicio' , 'hora_termino'])
                                        ->whereRaw("'".$hora_inicio."' BETWEEN hora_inicio and hora_termino")
                                        ->first();
            // echo json_encode($horario);
            // die();
            if($horario)
            {
                $datos['estado'] = 1;
                $datos['tipo_agenda'] = $horario->tipo_agenda;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['tipo_agenda'] = 1;
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['tipo_agenda'] = 1;
        }

        return $datos;
    }
    /** FIN METODO PARA VALIDAR EL TIPO AGENDA POR HORA SELECCIONADA Y RPOFESIONAL */

    public function agendar_horas(Request $request)
    {

        $paciente = paciente::where('id', $request->reserva_hora_id)->first();
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

        // var_dump( static::tipoHorario($profesional->id, $request->fecha_consulta) );
        // die();

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
        // var_dump($paciente->id);
        // var_dump($profesional->id);
        // var_dump($filtro_tipo_hora_medica);
        // var_dump(\Carbon\Carbon::parse($request->fecha_consulta)->format('Y-m-d'));
        $validar = HoraMedica::where('id_paciente', $paciente->id)
                                ->whereIn('id_estado',[1,2,4,5,6,8])
                                ->where('id_profesional',$profesional->id)
                                ->whereIn('tipo_hora_medica',$filtro_tipo_hora_medica)
                                ->where('fecha_consulta',\Carbon\Carbon::parse($request->fecha_consulta)->format('Y-m-d'))
                                ->first();
        // var_dump($validar);
        // exit();
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
            $procedimiento = $request->procedimiento;
            $proc_bloque = ( !empty($request->proc_bloque)?intval($request->proc_bloque):1 );
            $tiempo_consulta = intval($proc_bloque) * 15;
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
        $hora_medica->id_presupuesto = $request->id_presupuesto ?? null;
        $hora_medica->id_paciente = $request->reserva_hora_id;
        $hora_medica->id_mascota = $request->id_mascota ?? null;
        $hora_medica->id_profesional = $profesional->id;
        $hora_medica->id_ficha_otros_prof = $profesional->id;
        $hora_medica->id_estado = '1';
        $hora_medica->fecha_consulta = \Carbon\Carbon::parse($request->fecha_consulta)->format('Y-m-d');

        $hora_medica->hora_inicio = \Carbon\Carbon::parse($request->fecha_consulta)->format('H:i:s');
        $hora_medica->hora_termino = \Carbon\Carbon::parse($request->fecha_consulta)->addMinutes($tiempo_consulta)->subSecond()->format('H:i:s');

        $hora_medica->tipo_hora_medica = $request->tipo_hora_medica;
        $hora_medica->alias_examen = $texto_alias_examen;
        $hora_medica->id_procedimiento = $procedimiento;

        $hora_medica->descripcion = $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos;
        $hora_medica->id_lugar_atencion = $request->id_lugar_atencion;

        if (!$hora_medica->save()) {
            return 'error';
        }

        if($request->tipo_hora_medica == 'T')
        {
            $jitsi = JitsiController::jitsiRegistroMeet( $profesional->id, $paciente->id, $hora_medica->id );
			$hora_medica->video_llamada = $jitsi;
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

    public function buscar_horas_medicas(Request $request)
    {
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        // $horas_medicas = HoraMedica::where('id_profesional', $profesional->id)->where('fecha_consulta', $request->buscar_horas)->get();
        $filtro = array();
        $filtro[] = array('id_profesional', $profesional->id);

        if(!empty($request->buscar_horas))
            $filtro[] = array('fecha_consulta', $request->buscar_horas);

        if(!empty($request->id_lugares_atencion))
            $filtro[] = array('id_lugar_atencion', $request->id_lugares_atencion);
        $horas_medicas = HoraMedica::where($filtro)->where('tipo_hora_medica','!=','B')->get();

        foreach ($horas_medicas as $h) {
            $h->id_paciente = Paciente::where('id', $h->id_paciente)->first();
            $h->lugar_atencion = LugarAtencion::where('id', $h->id_lugar_atencion)->first();
        }

        return json_encode($horas_medicas);
    }

    public function agendar_hora_nuevo_paciente(Request $request)
    {

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
            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

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

            $permitted_chars = '#\qwertyuiopasdfghjkklzxcvbnm123467890ABCDEFGHIJKLMNOPQRSTUVWXYZ&=';
            $temp = substr(str_shuffle($permitted_chars), 0, 10);

            if( (\Carbon\Carbon::parse($request->fecha_nac)->age) < 18 && !empty($request->reserva_hora_email))
            {
                $paciente->email = $request->reserva_hora_email;
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
                            //$paciente->email = PacienteController::generarEmailPacienteTemporal($request->reserva_hora_nombre,$request->reserva_hora_primer_apellido,$request->reserva_hora_segundo_apellido);
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
                                //$paciente->email = PacienteController::generarEmailPacienteTemporal($request->reserva_hora_nombre,$request->reserva_hora_primer_apellido,$request->reserva_hora_segundo_apellido);
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
                    //$paciente->email = PacienteController::generarEmailPacienteTemporal($request->reserva_hora_nombre,$request->reserva_hora_primer_apellido,$request->reserva_hora_segundo_apellido);
                }
            }


			// $paciente->telefono_uno = '569';
            if( !empty($request->reserva_hora_telefono) )
                $paciente->telefono_uno = $request->reserva_hora_telefono;
            else
                $paciente->telefono_uno = '569';
            if( (\Carbon\Carbon::parse($request->reserva_hora_fecha_nac)->age) < 18 && $request->reserva_representante_nuevo_exitente == 1)
            {
                $representante_temp = Paciente::find($request->reserva_representante_id);
				if(!empty($representante_temp->telefono_uno))
                    $paciente->telefono_uno = $representante_temp->telefono_uno;
            }
            else if( (\Carbon\Carbon::parse($request->reserva_hora_fecha_nac)->age) < 18 && $request->reserva_representante_nuevo_exitente == 0)
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
                if( (\Carbon\Carbon::parse($request->reserva_hora_fecha_nac)->age) >= 18)
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

                        if($paciente->email == '' || $paciente->email == null || empty($paciente->email)){
                            $user->rut = $paciente->rut;
                        }

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
                                    if($paciente->email == '' || $paciente->email == null || empty($paciente->email)){
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
                                    }else{
                                        $datos['paciente']['user']['mail']['estado'] = 0;
                                        $datos['paciente']['user']['mail']['msj'] = 'El paciente no tiene email valido';
                                    }

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
                if( (\Carbon\Carbon::parse($request->reserva_hora_fecha_nac)->age) < 18 || $request->dependiente == 1 )
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
                        $representante_fecha_nac = $request->reserva_hora_representante_fecha_nac;
                        $representante_sexo = $request->reserva_hora_representante_sexo;
                        $representante_convenio = $request->reserva_hora_representante_convenio;
                        $representante_correo = $request->reserva_hora_representante_correo;
                        $representante_telefono_uno = $request->reserva_hora_representante_telefono_uno;
                        $representante_result_codigo_validacion = $request->reserva_hora_representante_result_codigo_validacion;

                        $permitted_chars = '#\qwertyuiopasdfghjkklzxcvbnm123467890ABCDEFGHIJKLMNOPQRSTUVWXYZ&=';
                        $representante_temp = substr(str_shuffle($permitted_chars), 0, 10);


                        $paciente_representante = new Paciente();
                        $paciente_representante->token = md5(uniqid());
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
                }

                $hora_medica = new HoraMedica();

                $hora_medica->id_paciente = $paciente->id;
                $hora_medica->id_profesional = $profesional->id;
                $hora_medica->id_estado = 1;
                $hora_medica->id_lugar_atencion = $request->id_lugar_atencion;
                $hora_medica->fecha_consulta = \Carbon\Carbon::parse($request->fecha_consulta)->format('Y-m-d');

                $hora_medica->hora_inicio = \Carbon\Carbon::parse($request->fecha_consulta)->format('H:i:s');
                $hora_medica->hora_termino = \Carbon\Carbon::parse($request->fecha_consulta)->addMinutes($tiempo_consulta)->subSecond()->format('H:i:s');

                $hora_medica->tipo_hora_medica = $request->tipo_hora_medica;
                $hora_medica->alias_examen = $texto_alias_examen;

                $hora_medica->descripcion = $hora_medica->descripcion = $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos;

                if( (\Carbon\Carbon::parse($request->reserva_hora_fecha_nac)->age) < 18 || $request->dependiente == 1 )
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

                    if($paciente->email == '' || $paciente->email == null || empty($paciente->email)){
                        $datos['mail']['institucion']['estado'] = 0;
                        $datos['mail']['institucion']['msj'] = 'Falle en envio de Notificacion de bienvenida';
                    }else{
                        /** envio de correo de confirmacion INSTITUCION */
                        $blade = 'hora_agendada';
                        // if( (\Carbon\Carbon::parse($request->reserva_hora_fecha_nac)->age) < 18 || $request->dependiente == 1 )
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
                        $sub_tipo_especialidad = $profesional->SubTipoEspecialidad()->first();
                        $body = array(
                            'nombre_paciente'=> $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos,
                            'fecha'=> $hora_medica->fecha_consulta,
                            'hora'=> $hora_medica->hora_inicio,
                            'profesional_nombre'=> $profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos,
                            'profesional_especialidad'=> $profesional->Especialidad()->first()->nombre,
                            'profesional_tipo_especialidad'=> $profesional->TipoEspecialidad()->first()->nombre,
                            'profesional_sub_tipo_especialidad' => $sub_tipo_especialidad ? $sub_tipo_especialidad->nombre : null,
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
    }

    public function presupuestosPaciente(Request $request)
    {
        $id = $request->input('id');
        $presupuestos = PresupuestosDental::select(
                'presupuestos_dental.id',
                'presupuestos_dental.fecha',
                'presupuestos_dental.valor_total',
                'presupuestos_dental.estado',
                'profesionales.nombre as profesional_nombre',
                'profesionales.apellido_uno as profesional_apellido_uno',
                'profesionales.apellido_dos as profesional_apellido_dos',
                'pacientes.nombres as paciente_nombres',
                'pacientes.apellido_uno as paciente_apellido_uno',
                'pacientes.apellido_dos as paciente_apellido_dos',
            )
            ->join('pacientes', 'presupuestos_dental.id_paciente', '=', 'pacientes.id')
            ->join('profesionales', 'presupuestos_dental.id_profesional', '=', 'profesionales.id')
            ->where('presupuestos_dental.id_paciente', $id)
            ->orderBy('presupuestos_dental.fecha', 'desc')
            ->get();

        return $presupuestos;
    }


    public function confirmar_hora(Request $request)
    {
        $hora_medica = HoraMedica::where('id', $request->id_hora_medica)->first();

        $hora_medica->comentarios_confirmacion = $request->comentario;
        $hora_medica->fecha_confirmacion = Carbon::now();
        $hora_medica->id_estado = 2;
        $paciente = Paciente::where('id', $hora_medica->id_paciente)->first();
        $profesional = Profesional::where('id', $hora_medica->id_profesional)->first();

        if (!$hora_medica->save()) {
            return 'error';
        }

        /** actualizacion de notificacion confirmacion */
        $notificacion = NotificacionConfirmacion::where('tipo_notificacion', 1)
                                                ->where('id_evento', $hora_medica->id)
                                                ->first();
        $datos['notificacion'] = $notificacion;
        if($notificacion)
        {
            /** cambiar estado notificacion */
            $notificacion->medio_confirmacion = $request->medio_confirmacion;
            $notificacion->fecha_confirmacion = date('Y-m-d H:m:s');
            $notificacion->estado_confirmacion = 2; //CONFIRMADA
            if($notificacion->save())
            {
                /** notificacion actualizada */
                // echo 'notificacion actualizada';
                $datos['notificacion']['update'] = 'notificacion Actualzada';
            }
            else
            {
                $datos['notificacion']['update'] = 'falla al actualizar notificacion';
            }

            /** actualizacion de notificacion confirmacion */
            $id_log_users_devices = $notificacion->id_log_users_devices;
            if(!empty($id_log_users_devices))
            {
                $log_users_devices = LogUsersDevices::find($id_log_users_devices);
                $log_users_devices->estado = 1;
                if($log_users_devices->save())
                {
                    /** log_users_devices */
                    $datos['log_users_devices']['update'] = 'log_users_devices Actualzada';
                }
                else
                {
                    $datos['log_users_devices']['update'] = 'falla al actualizar log_users_devices';
                }
            }
            else
            {
                $datos['log_users_devices']['update'] = 'no posee log_users_devices';
            }
        }




        $lugar_atencion = LugarAtencion::find($hora_medica->id_lugar_atencion);

        /** envio correo */
        /** envio de correo de confirmacion INSTITUCION */
        $blade = 'hora_confirmada_paciente';
        $to = array(
                array('email' => $paciente->email,'name' =>  $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos),
            );
        $cc = array();
        $bcc = array();
        $asunto = 'MED-SDI - Reserva de Hora Confirmada';
        if($profesional)
        {
            $body = array(
                'nombre_paciente'=> mb_strtoupper($paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos),
                'fecha'=> $hora_medica->fecha_consulta,
                'hora'=> $hora_medica->hora_inicio,
                'profesional_nombre'=> mb_strtoupper($profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos),
                'profesional_especialidad'=> mb_strtoupper($profesional->Especialidad()->first()->nombre),
                'profesional_tipo_especialidad'=> ($profesional->TipoEspecialidad()->first()?mb_strtoupper($profesional->TipoEspecialidad()->first()->nombre):''),
                'profesional_sub_tipo_especialidad'=> $profesional->SubTipoEspecialidad()->first()?mb_strtoupper($profesional->SubTipoEspecialidad()->first()->nombre):'',
                // 'institucion'=> $nombre_institucion,
                'lugar_atencion'=> mb_strtoupper($lugar_atencion->nombre),
                'direccion'=> mb_strtoupper($lugar_atencion->Direccion()->first()->direccion.' '.$lugar_atencion->Direccion()->first()->numero_dir.', '.$lugar_atencion->Direccion()->first()->Ciudad()->first()->nombre),
            );
        }
        else
        {
            $body = array(
                'nombre_paciente'=> mb_strtoupper($paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos),
                'fecha'=> $hora_medica->fecha_consulta,
                'hora'=> $hora_medica->hora_inicio,
                // 'institucion'=> $nombre_institucion,
                'lugar_atencion'=> mb_strtoupper($lugar_atencion->nombre),
                'direccion'=> mb_strtoupper($lugar_atencion->Direccion()->first()->direccion.' '.$lugar_atencion->Direccion()->first()->numero_dir.', '.$lugar_atencion->Direccion()->first()->Ciudad()->first()->nombre),
            );
        }

        $archivo = '';/** pendiente */
        $id_institucion = '';

        $result_mail =  SendMailController::envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, $id_institucion);

        if($result_mail['estado'])
        {
            $datos['registros'][$hora_medica->id]['mail']['estado'] = 1;
            $datos['registros'][$hora_medica->id]['mail']['msj'] = 'Notificacion de bienvenida enviado';
        }
        else
        {
            $datos['registros'][$hora_medica->id]['mail']['estado'] = 0;
            $datos['registros'][$hora_medica->id]['mail']['msj'] = 'Falle en envio de Notificacion de bienvenida';
        }

        return json_encode($hora_medica);
    }



    public function recibir_bono(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->convenio))
        {
            $error['convenio'] = 'campo requerido';
            $valido = 0;
        }
        // if(empty($request->numero_bono))
        // {
        //     $error['numero_bono'] = 'campo requerido';
        //     $valido = 0;
        // }

        if($request->valor_atencion == '')
        {
            $error['valor_atencion'] = 'campo requerido';
            $valido = 0;
        }

        if(empty($request->id_profesional))
        {
            $error['id_profesional'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_asistente))
        {
            $error['id_asistente'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_paciente))
        {
            $error['id_paciente'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_tipo_bono))
        {
            $error['id_tipo_bono'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->id_referencia))
        {
            $error['id_referencia'] = 'campo requerido';
            $valido = 0;
        }

        if($request->id_clase_bono == 6 || $request->id_clase_bono == 8){
            $profesional_convenio = ProfesionalConvenio::where('id_profesional', $request->id_profesional)->where('id_lugar_atencion', $request->id_lugar_atencion)->first();
            if($profesional_convenio){
                if($request->valor_atencion !== $profesional_convenio->valor){
                    $error['id_referencia'] = 'El valor de la atención no corresponde al convenio del profesional. El valor a pagar es $'.number_format($profesional_convenio->valor,0,',','.');
                    $valido = 0;
                }
            }
        }


        if($valido == 1)
        {
            if($request->id_clase_bono == 6 || $request->id_clase_bono == 8){
                $valor_bono = 40000;
            }else if($request->id_clase_bono == 2){
                $valor_bono = 0;
            }else{
                $valor_bono = 26830;
            }
            // $profesional = Profesional::where('id_usuario',$request->id_profesional)->first();
            // return $profesional;
            /** registro bono */
            $bono = new Bono();
            $bono->convenio = $request->convenio;
            // $bono->convenio = $request->convenio_nombre;
            $bono->numero_bono = $request->numero_bono;
            $bono->numero_boleta = empty($request->numero_boleta)?'0':$request->numero_boleta;
            $bono->fecha_atencion = date('Y-m-d H:i:s');
            $bono->valor_atencion = $request->valor_atencion==''?'0':$request->valor_atencion;
            $bono->a_pagar =  $valor_bono;
            if($request->id_clase_bono ==6 || $request->id_clase_bono ==8 || $request->valor_bonificacion == null){
                $bono->bonificacion = 0;
            }else{
                $bono->bonificacion = empty($request->valor_bonificacion)?'0':$request->valor_bonificacion;
            }

            $bono->aporte_seguro = $request->valor_seguro==''?'0':$request->valor_seguro;
            $bono->glosa = empty($request->glosa)?'0':$request->glosa;
            $bono->rendido = 0;
            $bono->id_profesional = $request->id_profesional;
            $bono->id_asistente = $request->id_asistente;
            $bono->id_paciente = $request->id_paciente;
            $bono->id_clase_bono = $request->id_clase_bono;
            $bono->id_tipo_bono = $request->id_tipo_bono;
            $bono->id_referencia = $request->id_referencia;// id_hora/id_hora_dental/..
            $bono->numero_sesiones = empty($request->numero_sesiones)?'0':$request->numero_sesiones;
            $bono->estado_consulta = 4;

            $usuario = User::where('id', Auth::user()->id)->first();
            $roles = $usuario->roles()->orderBy('id', 'DESC')->pluck('name')->toArray();
            if( in_array( 'Profesional', $roles) )
            {
                $bono->rendido = 1;
            }

            if($bono->save())
            {
                $datos['bono']['estado'] = 1;
                $datos['bono']['mensaje'] = 'Bonos registrado';
                /** cambio estado hora medica */
                switch ($request->id_tipo_bono) {
                    case  '1': /** hora medica -> Bonos de Consultas Medicas */
                            $hora_medica = HoraMedica::find($request->id_referencia);
                            $hora_medica->id_estado = 4;
                            if($hora_medica->save())
                            {
                                $datos['estado'] = 1;
                                $datos['msj'] = 'Bono registrado';
                                $datos['hora_medica']['estado'] = 1;
                                $datos['hora_medica']['msj'] = 'Hora medica actualizada';
                                $datos['hora_medica']['fecha_consulta'] = $hora_medica->fecha_consulta;
                            }
                            else
                            {
                                $datos['hora_medica']['estado'] = 0;
                                $datos['hora_medica']['msj'] = 'Problema a actualizar hora medica';
                            }
                    break;
                    case  '2': /** Bono de Examen */
                        /** code */
                        $hora_medica = HoraMedica::find($request->id_referencia);
                            $hora_medica->id_estado = 4;
                            if($hora_medica->save())
                            {
                                $datos['estado'] = 1;
                                $datos['msj'] = 'Bono registrado';
                                $datos['hora_medica']['estado'] = 1;
                                $datos['hora_medica']['msj'] = 'Hora medica actualizada';
                                $datos['hora_medica']['fecha_consulta'] = $hora_medica->fecha_consulta;
                            }
                            else
                            {
                                $datos['hora_medica']['estado'] = 0;
                                $datos['hora_medica']['msj'] = 'Problema a actualizar hora medica';
                            }
                    break;
                    case  '3': /** Bonos de Cirugía */
                        /** code */
                        $hora_medica = HoraMedica::find($request->id_referencia);
                            $hora_medica->id_estado = 4;
                            if($hora_medica->save())
                            {
                                $datos['estado'] = 1;
                                $datos['msj'] = 'Bono registrado';
                                $datos['hora_medica']['estado'] = 1;
                                $datos['hora_medica']['msj'] = 'Hora medica actualizada';
                                $datos['hora_medica']['fecha_consulta'] = $hora_medica->fecha_consulta;
                            }
                            else
                            {
                                $datos['hora_medica']['estado'] = 0;
                                $datos['hora_medica']['msj'] = 'Problema a actualizar hora medica';
                            }
                    break;
                    case  '4': /** Bonos Parto Normal */
                        /** code */
                        $hora_medica = HoraMedica::find($request->id_referencia);
                            $hora_medica->id_estado = 4;
                            if($hora_medica->save())
                            {
                                $datos['estado'] = 1;
                                $datos['msj'] = 'Bono registrado';
                                $datos['hora_medica']['estado'] = 1;
                                $datos['hora_medica']['msj'] = 'Hora medica actualizada';
                                $datos['hora_medica']['fecha_consulta'] = $hora_medica->fecha_consulta;
                            }
                            else
                            {
                                $datos['hora_medica']['estado'] = 0;
                                $datos['hora_medica']['msj'] = 'Problema a actualizar hora medica';
                            }
                    break;
                    case  '5': /** Bonos de Cesarea */
                        /** code */
                        $hora_medica = HoraMedica::find($request->id_referencia);
                            $hora_medica->id_estado = 4;
                            if($hora_medica->save())
                            {
                                $datos['estado'] = 1;
                                $datos['msj'] = 'Bono registrado';
                                $datos['hora_medica']['estado'] = 1;
                                $datos['hora_medica']['msj'] = 'Hora medica actualizada';
                                $datos['hora_medica']['fecha_consulta'] = $hora_medica->fecha_consulta;
                            }
                            else
                            {
                                $datos['hora_medica']['estado'] = 0;
                                $datos['hora_medica']['msj'] = 'Problema a actualizar hora medica';
                            }
                    break;
                    case  '6': /** Bonos de Laboratorio */
                        /** code */
                        $hora_medica = HoraMedica::find($request->id_referencia);
                            $hora_medica->id_estado = 4;
                            if($hora_medica->save())
                            {
                                $datos['estado'] = 1;
                                $datos['msj'] = 'Bono registrado';
                                $datos['hora_medica']['estado'] = 1;
                                $datos['hora_medica']['msj'] = 'Hora medica actualizada';
                                $datos['hora_medica']['fecha_consulta'] = $hora_medica->fecha_consulta;
                            }
                            else
                            {
                                $datos['hora_medica']['estado'] = 0;
                                $datos['hora_medica']['msj'] = 'Problema a actualizar hora medica';
                            }
                    break;
                    case  '7': /** Bonos de Radiologia */
                        /** code */
                        $hora_medica = HoraMedica::find($request->id_referencia);
                            $hora_medica->id_estado = 4;
                            if($hora_medica->save())
                            {
                                $datos['estado'] = 1;
                                $datos['msj'] = 'Bono registrado';
                                $datos['hora_medica']['estado'] = 1;
                                $datos['hora_medica']['msj'] = 'Hora medica actualizada';
                                $datos['hora_medica']['fecha_consulta'] = $hora_medica->fecha_consulta;
                            }
                            else
                            {
                                $datos['hora_medica']['estado'] = 0;
                                $datos['hora_medica']['msj'] = 'Problema a actualizar hora medica';
                            }
                    break;
                    case  '8': /** Bonos de Fonaudiología */
                        /** code */
                        $hora_medica = HoraMedica::find($request->id_referencia);
                            $hora_medica->id_estado = 4;
                            if($hora_medica->save())
                            {
                                $datos['estado'] = 1;
                                $datos['msj'] = 'Bono registrado';
                                $datos['hora_medica']['estado'] = 1;
                                $datos['hora_medica']['msj'] = 'Hora medica actualizada';
                                $datos['hora_medica']['fecha_consulta'] = $hora_medica->fecha_consulta;
                            }
                            else
                            {
                                $datos['hora_medica']['estado'] = 0;
                                $datos['hora_medica']['msj'] = 'Problema a actualizar hora medica';
                            }
                    break;
                    case  '9': /** Bonos de Kinesiología */
                        /** code */
                        $hora_medica = HoraMedica::find($request->id_referencia);
                            $hora_medica->id_estado = 4;
                            if($hora_medica->save())
                            {
                                $datos['estado'] = 1;
                                $datos['msj'] = 'Bono registrado';
                                $datos['hora_medica']['estado'] = 1;
                                $datos['hora_medica']['msj'] = 'Hora medica actualizada';
                                $datos['hora_medica']['fecha_consulta'] = $hora_medica->fecha_consulta;
                            }
                            else
                            {
                                $datos['hora_medica']['estado'] = 0;
                                $datos['hora_medica']['msj'] = 'Problema a actualizar hora medica';
                            }
                    break;
                    case '10': /** Bonos de Nutrición */
                        /** code */
                    break;
                    case '11': /** Bonos de Procedimiento */
                        /** code */
                    break;
                }
                /** CIERRE CAMBIO ESTADO HORA MEDICA */
                // preguntamos si el profesional es dentista
                $profesional = Profesional::where('id', $request->id_profesional)->first();
                if($profesional->Especialidad()->first()->id == 2)
                {
                    // código específico para dentistas
                    // verificamos si tiene algun presupuesto dental
                     $presupuestos_dentales = PresupuestosDental::where('id_paciente',$bono->id_paciente)->where('estado',1)->first();
                     if($presupuestos_dentales){
                        $pago = new PagosPresupuestoDental();
                        $pago->id_presupuesto = $request->id_presupuesto ? $request->id_presupuesto : 0;
                        $pago->id_profesional = $profesional->id;
                        $pago->id_paciente = $bono->id_paciente;
                        $pago->id_ficha_atencion = $request->id_referencia;
                        $pago->id_lugar_atencion = $request->id_lugar_atencion;
                        $pago->fecha_pago = date('Y-m-d');
                        $pago->metodo_pago = 'Bono';
                        $pago->id_metodo_pago = 1; // Bono
                        $pago->total = $request->valor_abono;
                        $pago->save();
                    }

                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'problema al registrar pago';
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

    public function devolucion_bono(Request $req){
        $id_bono = $req->id_hora_medica;
        $bono = Bono::where('id_referencia', $id_bono)->first();

        $bono->devuelto = 1;

        if($bono->save()){
            return ['estado' => 1, 'mensaje' => 'El dinero y/o documento fue devuelto con éxito.'];
        }else{
            return ['estado' => 0, 'mensaje' => 'Ha ocurrido un error'];
        }

    }

    public function dame_valor_consulta(Request $request){
        try {
            if($request->id_profesional){
                $profesional = Profesional::find($request->id_profesional);
            }else{
                $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
            }

            $profesional_convenio = ProfesionalConvenio::where('id_profesional',$profesional->id)->where('id_lugar_atencion',$request->id_lugar_atencion)->first();
            //$profesional_convenio = ProfesionalConvenio::where('id_profesional',$profesional->id)->first();
            return $profesional_convenio;
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }

    public function dame_valor_consulta_nueva(Request $req){
        return 'hola';
    }

    public function enviar_email(Request $request)
    {

        if ($request->titulo_email == '' || $request->mensaje_email == '') {
            return 'error';
        }

        $titulo = $request->titulo_email;
        $mensaje = $request->mensaje_email;
        $paciente = Paciente::where('id', $request->id_paciente)->first();

        $details = [
            'title' => $titulo,
            'body' => $mensaje,
        ];

        ////Mail::to($paciente->email)->send(new \App\Mail\RegistroPacienteMail($details));
        Mail::to('jkriman@gmail.com')->send(new \App\Mail\RegistroPacienteMail($details));

        return 'ok';
    }

    public function cancelar_hora(Request $request)
    {

        $hora_medica = HoraMedica::where('id', $request->id_hora_medica)->first();

        $hora_medica->comentarios_cancelacion = $request->comentario;
        $hora_medica->fecha_cancelacion = Carbon::now();
        $hora_medica->id_estado = 3;
        $paciente = Paciente::where('id', $hora_medica->id_paciente)->first();
        $profesional = Profesional::where('id', $hora_medica->id_profesional)->first();

        if (!$hora_medica->save()) {
            return 'error';
        }


        $notificacion = NotificacionConfirmacion::where('tipo_notificacion',1)
                                                ->where('id_evento',$hora_medica->id)
                                                ->first();
        $datos['notificacion'] = $notificacion;
        if($notificacion)
        {
            /** cambiar estado notificacion */
            $notificacion->medio_confirmacion = $request->medio_confirmacion;
            $notificacion->fecha_confirmacion = date('Y-m-d H:m:s');
            $notificacion->estado_confirmacion = 3; // RECHAZADA
            if($notificacion->save())
            {
                /** notificacion actualizada */
                $datos['notificacion']['update'] = 'notificacion Actualzada';
            }
            else
            {
                $datos['notificacion']['update'] = 'falla al actualizar notificacion';
            }

            /** cambiar estado de log */
            $id_log_users_devices = $notificacion->id_log_users_devices;
            if(!empty($id_log_users_devices))
            {
                $log_users_devices = LogUsersDevices::find($id_log_users_devices);
                $log_users_devices->estado = 3; //RECHAZADA
                if($log_users_devices->save())
                {
                    /** log_users_devices */
                    $datos['log_users_devices']['update'] = 'log_users_devices Actualzada';
                }
                else
                {
                    $datos['log_users_devices']['update'] = 'falla al actualizar log_users_devices';
                }
            }
            else
            {
                $datos['log_users_devices']['update'] = 'no posee log_users_devices';
            }
        }

        /** enviar correo de confirmada */
        $paciente = $hora_medica->Paciente()->first();
        $profesional = $hora_medica->Profesional()->first();
        $lugar_atencion = $hora_medica->LugarAtencion()->first();

        $blade = 'hora_cancelada_paciente';
        $to = array(
                array('email' => $paciente->email,'name' =>  $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos),
            );
        $cc = array();
        $bcc = array();
        $asunto = 'MED-SDI - Reserva de Hora Cancelada';
        if(!empty($profesional))
        {
            $body = array(
                'nombre_paciente'=> mb_strtoupper($paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos),
                'fecha'=> $hora_medica->fecha_evento,
                'hora'=> $hora_medica->hora_evento,
                'profesional_nombre'=> mb_strtoupper($profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos),
                'profesional_especialidad'=> mb_strtoupper($profesional->Especialidad()->first()->nombre),
                'profesional_tipo_especialidad'=> mb_strtoupper($profesional->TipoEspecialidad()->first()->nombre),
                'profesional_sub_tipo_especialidad' => optional($profesional->SubTipoEspecialidad()->first())->nombre ?? null, // Si no existe, no se muestra
                // 'institucion'=> $nombre_institucion,
                'lugar_atencion'=> mb_strtoupper($lugar_atencion->nombre),
                'direccion'=> mb_strtoupper($lugar_atencion->Direccion()->first()->direccion.' '.$lugar_atencion->Direccion()->first()->numero_dir.', '.$lugar_atencion->Direccion()->first()->Ciudad()->first()->nombre),
            );
        }
        else
        {
            $body = array(
                'nombre_paciente'=> mb_strtoupper($paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos),
                'fecha'=> $hora_medica->fecha_evento,
                'hora'=> $hora_medica->hora_evento,
                // 'institucion'=> $nombre_institucion,
                'lugar_atencion'=> mb_strtoupper($lugar_atencion->nombre),
                'direccion'=> mb_strtoupper($lugar_atencion->Direccion()->first()->direccion.' '.$lugar_atencion->Direccion()->first()->numero_dir.', '.$lugar_atencion->Direccion()->first()->Ciudad()->first()->nombre),
            );
        }

        $archivo = '';/** pendiente */
        $id_institucion = '';

        $result_mail =  SendMailController::envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, $id_institucion);

        if($result_mail['estado'])
        {
            $datos['mail'] = 'Notificacion de cancelacion enviado';
        }
        else
        {
            $datos['mail'] = 'Falle en envio de Notificacion de cancelada';
        }

        return json_encode($hora_medica);
    }

    public function mi_horario_lugar_atencion(Request $request)
    {
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $horario = ProfesionalHorario::where('id_profesional', $profesional->id)->where('id_lugar_atencion', $request->id_lugar_atencion)->get();

        return json_encode($horario);
    }

    public function mi_horario_lugar_atencion_agregar(Request $request)
    {
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $hora_inicio = \Carbon\Carbon::parse($request->hora_inicio . ':01')->format('H:i:s');
        $hora_termino = \Carbon\Carbon::parse($request->hora_termino . ':00')->format('H:i:s');

        $validate = ProfesionalHorario::where('id_profesional', $profesional->id)
            ->where('dia', 'like', "%$request->dia%")
            ->whereRaw("('$hora_inicio' BETWEEN hora_inicio AND hora_termino OR '$hora_termino' BETWEEN hora_inicio AND hora_termino)", [0])
            ->get();

        if (count($validate) > 0) {
            return 'Failed';
        }

        $horario = ProfesionalHorario::where('hora_inicio', $hora_inicio)
            ->where('hora_termino', $hora_termino)
            ->where('duracion_consulta', $request->duracion)
            ->where('id_profesional', $profesional->id)
            ->first();



        if (isset($horario->id)) {
            $horario->dia = $horario->dia . ',' . $request->dia;
        } else {

            $horario = new ProfesionalHorario();
            $horario->hora_inicio = $hora_inicio;
            $horario->hora_termino = $hora_termino;
            $horario->dia = $request->dia;
            $horario->duracion_consulta = $request->duracion;
            $horario->id_profesional = $profesional->id;
            $horario->id_lugar_atencion = $request->id_lugar_atencion;
            $horario->tipo_Agenda = (int) $request->tipo_agenda_medica;
        }
        if (!$horario->save()) {
            return 'error';
        }

        return json_encode($horario);
    }

    // modulo editar perfil paciente
    public function registrar_contacto_emergencia(Request $request)
    {
        $id_paciente = Paciente::where('id', $request->id_paciente)->first();
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
            $pacienteContacto = new PacienteContactoEmergencia();

            $pacienteContacto->id_paciente = $request->id_paciente;
            $pacienteContacto->id_contacto = $contacto_emergencia->id;
            $contacto_emergencia->relacion = $request->parentezco;

            if (!$pacienteContacto->save()) {
                return 'error';
            }

            return json_encode($contacto_emergencia);
        } else {
            return 'error al registrar el contacto de emergencia';
        }

        /*

        $contacto = new ContactoEmergencia();
        $direccion = new Direccion();
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

        $direccion->direccion = $request->direccion;
        $direccion->numero_dir = mt_rand(100, 9999);
        $direccion->id_ciudad = $request->id_ciudad;
        $direccion->save();
        $contacto->rut = $request->rut;
        $contacto->nombre = $request->nombres;
        $contacto->apellido_uno = $request->apellido_uno;
        $contacto->apellido_dos = $request->apellido_dos;
        $contacto->parentezco = $request->parentezco;
        $contacto->fecha_nac = \Carbon\Carbon::parse($request->fecha)->format('Y-m-d');
        $contacto->prioridad = $request->prioridad;
        $contacto->email = $request->email;
        $contacto->telefono = $request->telefono;
        $contacto->id_direccion = $direccion->id;

        if ($contacto->save()) {
            $pacienteContacto = new PacienteContactoEmergencia();

            $pacienteContacto->id_paciente = $request->id_paciente;
            $pacienteContacto->id_contacto = $contacto->id;
            $contacto->relacion = $request->parentezco;

            if (!$pacienteContacto->save()) {
                return 'error';
            }

            /*  $details = [
                      'title' => 'Hora medica Reservada',
                      'body' => 'Estimado/a '.$contacto->nombres.' '.$contacto->apellido_uno.' '.$contacto->apellido_dos.',<br>
                      Junto con saludar, por medio de este correo le informamos que se ha reservado su hora medida <br>'.
                      'Fecha: '.$contacto->fecha_consulta.'<br>'.
                      'Hora : '.$hora_medica->hora_inicio.'<br>'.
                      'Profesional: <b>'.$profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos.'<b> <br><br>'.
                      'Que tenga un excelente día. </br></br>'.
                      'Saludos.',
                  ];

              //Mail::to($paciente->email)->send(new \App\Mail\RegistroPacienteMail($details));

            return json_encode($contacto);
        }

        return 'algo';*/
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
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

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
                      'Profesional: <b>'.$profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos.'<b> <br><br>'.
                      'Que tenga un excelente día. </br></br>'.
                      'Saludos.',
                  ];

              //Mail::to($paciente->email)->send(new \App\Mail\RegistroPacienteMail($details));
        */
            return json_encode($contacto);
        }

        return 'error';
    }

    public function modificarAntecedenteAademico(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id)){
            $error['id'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->nombre)){
            $error['nombre'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->universidad)){
            $error['universidad'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->anio)){
            $error['anio'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->ciudad_pais)){
            $error['ciudad_pais'] = 'campo requerido';
            $valido = 0;
        }
        // if(empty($request->supersalud)){
        //     $error['supersalud'] = 'campo requerido';
        //     $valido = 0;
        // }
        // if(empty($request->numero_colegio)){
        //     $error['numero_colegio'] = 'campo requerido';
        //     $valido = 0;
        // }

        if($valido == 1)
        {
            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
            $filtro = array();
            $filtro[] = array('id_profesional',$profesional->id);
            $filtro[] = array('id',$request->id);
            $registro = ProfesionalAntecedenteAcademico::where($filtro)->first();
            if($registro)
            {
                $registro->nombre = $request->nombre;
                $registro->universidad = $request->universidad;
                $registro->anio = $request->anio;
                $registro->ciudad_pais = $request->ciudad_pais;
                if(!empty($request->supersalud))
                    $registro->supersalud = $request->supersalud;
                if(!empty($request->numero_colegio))
                    $registro->numero_colegio = $request->numero_colegio;

                if($registro->save())
                {
                    $datos['estado'] = 1;
                    $datos['msj'] = 'Registro Academico Actualizado.';
                }
                else
                {
                    $datos['estado'] = 0;
                    $datos['msj'] = 'Registro Academico no actualizado.';
                }
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Registro Academico no disponible.';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campos requeridos.';
            $datos['error'] = $error;
        }
        return $datos;
    }

    public function agregarAntecedenteAademico(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_tipo_antecedente_academico)){
            $error['id_tipo_antecedente_academico'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->nombre)){
            $error['nombre'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->universidad)){
            $error['universidad'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->anio)){
            $error['anio'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($request->ciudad_pais)){
            $error['ciudad_pais'] = 'campo requerido';
            $valido = 0;
        }
        // if(empty($request->supersalud)){
        //     $error['supersalud'] = 'campo requerido';
        //     $valido = 0;
        // }
        // if(empty($request->numero_colegio)){
        //     $error['numero_colegio'] = 'campo requerido';
        //     $valido = 0;
        // }

        if($valido == 1)
        {
            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
            $registro = new ProfesionalAntecedenteAcademico();

            $registro->id_profesional = $profesional->id;
            $registro->id_tipo_antecedente_academico = $request->id_tipo_antecedente_academico;
            $registro->nombre = $request->nombre;
            $registro->universidad = $request->universidad;
            $registro->anio = $request->anio;
            $registro->ciudad_pais = $request->ciudad_pais;
            if(!empty($request->supersalud))
                $registro->supersalud = $request->supersalud;
            if(!empty($request->numero_colegio))
                $registro->numero_colegio = $request->numero_colegio;

            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'Registro Academico Agregado.';
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Registro Academico no Agregado.';
            }

        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campos requeridos.';
            $datos['error'] = $error;
        }
        return $datos;
    }

    public function eliminarAntecedenteAcademico(Request $request)
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
            $registro = ProfesionalAntecedenteAcademico::find($request->id);
            if($registro)
            {
                $registro->delete();

                $datos['estado'] = 1;
                $datos['msj'] = 'Registro eliminado';
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'registro no encontrado';
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

    public function agregarFichaTipoOtorrino(Request $request)
    {
        $datos = array();
        $ficha_tipo = new FichaOtorrinoTipo();
        $ficha_tipo->id_profesional = $request->id_profesional;
        $ficha_tipo->tipo = $request->tipo;
        $ficha_tipo->nombre = $request->registro_f_t_orl_nombre;
        $ficha_tipo->descripcion = $request->registro_f_t_orl_descripcion;
        $ficha_tipo->id_usa_audifono = $request->modal_agregar_tipo_usa_audifono;
        $ficha_tipo->audifono = $request->observaciones_audifono;
        $ficha_tipo->apreciacion_auditiva = $request->modal_agregar_tipo_apreciacion_auditiva;
        $ficha_tipo->aprec_auditiva_def = $request->observaciones_aprec_auditiva_def;
        $ficha_tipo->examen_oi = $request->modal_agregar_tipo_examen_oi;
        $ficha_tipo->ex_oi_anormal = $request->observaciones_ex_oi_anormal;
        $ficha_tipo->examen_od = $request->modal_agregar_tipo_examen_od;
        $ficha_tipo->ex_od_anormal = $request->observaciones_ex_od_anormal;
        $ficha_tipo->obs_ex_oidos = $request->observaciones_obs_ex_oidos;
        $ficha_tipo->examen_bio_oi = $request->modal_agregar_tipo_examen_bio_oi;
        $ficha_tipo->obs_examen_bio_oi = $request->observaciones_obs_examen_bio_oi;
        $ficha_tipo->examen_bio_od = $request->modal_agregar_tipo_examen_bio_od;
        $ficha_tipo->obs_examen_bio_od = $request->observaciones_obs_examen_bio_od;
        $ficha_tipo->obs_ex_biom = $request->observaciones_obs_ex_biom;
        $ficha_tipo->id_tipo_episodios = $request->modal_agregar_tipo_episodios;
        $ficha_tipo->obs_episodios = $request->observaciones_detalle_episodios;
        $ficha_tipo->id_tipo_equilibrio = $request->modal_agregar_tipo_equilibrio;
        $ficha_tipo->obs_equilibrio = $request->observaciones_detalle_equilibrio;
        $ficha_tipo->id_tipo_ng = $request->modal_agregar_tipo_ng;
        $ficha_tipo->obs_ng = $request->observaciones_detalle_ng;
        $ficha_tipo->id_tipo_sint_acomp = $request->modal_agregar_tipo_sint_acomp;
        $ficha_tipo->obs_sint_acomp = $request->observaciones_detalle_sint_acompanantes;
        $ficha_tipo->id_tipo_vertigo = $request->modal_agregar_tipo_vertigo;
        $ficha_tipo->obs_tipo_vertigo = $request->observaciones_detalle_tipo_vertigo;
        $ficha_tipo->obs_vestibular = $request->observaciones_vestibular;
        $ficha_tipo->nariz_general = $request->modal_agregar_tipo_nariz_general;
        $ficha_tipo->det_nariz_general = $request->observaciones_det_nariz_general;
        $ficha_tipo->apreciacion_resp = $request->modal_agregar_tipo_apreciacion_resp;
        $ficha_tipo->aprec_resp_def = $request->observaciones_aprec_resp_def;
        $ficha_tipo->examen_fni = $request->modal_agregar_tipo_examen_fni;
        $ficha_tipo->ex_fni_anormal = $request->observaciones_ex_fni_anormal;
        $ficha_tipo->examen_fnd = $request->modal_agregar_tipo_examen_fnd;
        $ficha_tipo->ex_fnd_anormal = $request->observaciones_ex_fnd_anormal;
        $ficha_tipo->obs_ex_nasal = $request->observaciones_obs_ex_nasal;
        $ficha_tipo->disfonia = $request->modal_agregar_tipo_disfonia;
        $ficha_tipo->det_disfonia = $request->observaciones_det_disfonia;
        $ficha_tipo->ex_boca = $request->modal_agregar_tipo_ex_boca;
        $ficha_tipo->detalle_ex_boca = $request->observaciones_detalle_ex_boca;
        $ficha_tipo->examen_faringe =$request->modal_agregar_tipo_examen_faringe;
        $ficha_tipo->ex_farige_anormal = $request->observaciones_ex_farige_anormal;
        $ficha_tipo->examen_laringe =$request->modal_agregar_tipo_examen_laringe;
        $ficha_tipo->ex_larige_anormal = $request->observaciones_ex_larige_anormal;
        $ficha_tipo->obs_examen_laringe =$request->observaciones_obs_examen_laringe;
        $ficha_tipo->obs_ex_orl = $request->observaciones_obs_ex_orl;
        $ficha_tipo->hip_diag_orl = '';
        $ficha_tipo->ind_orl = '';

        $ficha_tipo->piel_tegumnto = $request->modal_agregar_tipo_piel_tegumnto;
        $ficha_tipo->obs_piel_tegumnto = $request->observaciones_obs_piel_tegumnto;
        $ficha_tipo->adenopatias = $request->modal_agregar_tipo_adenopatias;
        $ficha_tipo->obs_adenopatias = $request->observaciones_obs_adenopatias;
        $ficha_tipo->tumores_masas = $request->modal_agregar_tipo_tumores_masas;
        $ficha_tipo->obs_tumores_masas = $request->observaciones_obs_tumores_masas;
        $ficha_tipo->gland_anexas = $request->modal_agregar_tipo_gland_anexas;
        $ficha_tipo->obs_gland_anexas = $request->observaciones_obs_gland_anexas;

        if($ficha_tipo->save())
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'registro exitoso';

        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'registro NO exitoso';
        }
        return $datos;
    }

    public function buscarFichaTipoOtorrino(Request $request)
    {
        $datos = array();

        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $registro = FichaOtorrinoTipo::where('id_profesional',$profesional->id)->where('id',$request->id_ficha_tipo)->first();

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



    public function agregarAudifono(Request $request)
    {
        $datos = array();

        $filtro = array();
        $filtro[] = array('id_ficha_atencion',$request->id_ficha_atencion);
        $filtro[] = array('id_paciente',$request->id_paciente);
        $filtro[] = array('id_profesional',$request->id_profesional);
        $registro_existente = RecetaAudifono::where($filtro)->first();

        if($registro_existente)
        {
            $registros = $registro_existente;
        }
        else
        {
            $registros = new RecetaAudifono();
        }

        $registros->id_ficha_atencion = $request->id_ficha_atencion;
        $registros->id_paciente = $request->id_paciente;
        $registros->id_profesional = $request->id_profesional;
        $registros->fecha = date('Y-m-d H:i:s');
        $registros->tipo = $request->tipo;
        $registros->otro_tipo = $request->tipo_otro;
        $registros->od = $request->od;
        $registros->especificacion_od = $request->especificacion_od;
        $registros->oi = $request->oi;
        $registros->especificacion_oi = $request->especificacion_oi;
        $registros->bi = $request->bi;
        $registros->especificacion_bi = $request->especificacion_bi;
        $registros->especificacion_general = $request->especificacion_general;
        $registros->cod_auto = session('lic_token');

        if($registros->save())
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'registro con exito';
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'registro con falla';
        }

        return $datos;
    }

    public function verAudifono(Request $request)
    {
        $datos = array();
        $filtro = array();
        $error = array();
        $valido = 1;

        if(empty($request->id_ficha_atencion))
        {
            $valido = 0;
            $error['id_ficha_atencion'] = 'campo requerido';
        }
        if(empty($request->id_paciente))
        {
            $valido = 0;
            $error['id_paciente'] = 'campo requerido';
        }
        if(empty($request->id_profesional))
        {
            $valido = 0;
            $error['id_profesional'] = 'campo requerido';
        }

        if($valido == 1)
        {
            $filtro[] = array('id_ficha_atencion',$request->id_ficha_atencion);
            $filtro[] = array('id_paciente',$request->id_paciente);
            $filtro[] = array('id_profesional',$request->id_profesional);
            $registro = RecetaAudifono::where($filtro)->first();
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

        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Campo requerido';
            $datos['error'] = $error;

        }

        return $datos;
    }

	public function agregarLiquidacion(Request $request)
    {
        $result = LiquidacionReciboController::store( Auth::user()->id, $request->rut, $request->nombre, $request->banco, $request->cuenta, $request->email, $request->principal, $request->tipo_cuenta,1);
        return $result;
    }

    public function modificarLiquidacion(Request $request)
    {
        $result = LiquidacionReciboController::edit($request->id, Auth::user()->id, $request->rut, $request->nombre, $request->banco, $request->cuenta, $request->email, $request->principal, $request->tipo_cuenta,1);
        return $result;
    }

    /** FICHA CIRUGIA DIGESTIVA TIPO */
    public function agregarFichaTipoCDG(Request $request)
    {
        $datos = array();
        $ficha_tipo = new FichaCirugiaDigestivaTipo();
        $ficha_tipo->nombre = $request->nombre;
        $ficha_tipo->descripcion = $request->descripcion;
        $ficha_tipo->id_profesional = $request->id_profesional;
        $ficha_tipo->ind_esp_cirugia = $request->ind_esp_cirugia;
        $ficha_tipo->dolor_cdg = $request->dolor_cdg;
        $ficha_tipo->obs_dolor_cdg = $request->obs_dolor_cdg;

        $ficha_tipo->transito_intest = $request->transito_intest;
        $ficha_tipo->obs_transito_intest = $request->obs_transito_intest;
        $ficha_tipo->dolor_def = $request->dolor_def;
        $ficha_tipo->obs_dolor_def = $request->obs_dolor_def;
        $ficha_tipo->sangre_otros = $request->sangre_otros;
        $ficha_tipo->obs_sangre_otros = $request->obs_sangre_otros;

        $ficha_tipo->otros_sintomas_cdg = $request->otros_sintomas_cdg;
        $ficha_tipo->obs_otros_sintomas_cdg = $request->obs_otros_sintomas_cdg;
        $ficha_tipo->ceg_cdg = $request->ceg_cdg;
        $ficha_tipo->obs_ceg_cdg = $request->obs_ceg_cdg;
        $ficha_tipo->masa_cdg = $request->masa_cdg;
        $ficha_tipo->obs_masa_cdg = $request->obs_masa_cdg;
        $ficha_tipo->urgencia_cdg = $request->urgencia_cdg;
        $ficha_tipo->obs_urgencia_cdg = $request->obs_urgencia_cdg;
        $ficha_tipo->so_cdg = $request->so_cdg;
        $ficha_tipo->obs_so_cdg = $request->obs_so_cdg;
        $ficha_tipo->obs_egp_cdg = $request->obs_egp_cdg;
        $ficha_tipo->obs_gen_ex_esp_cdg = $request->obs_gen_ex_esp_cdg;
        // $ficha_tipo->otro = $request->otro;
        // $ficha_tipo->estado = $request->estado;

        if($ficha_tipo->save())
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'registro exitoso';

        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'registro NO exitoso';
        }
        return $datos;
    }

    public function buscarFichaTipoCDG(Request $request)
    {
        $datos = array();

        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $registro = FichaCirugiaDigestivaTipo::where('id_profesional',$profesional->id)->where('id',$request->id_ficha_tipo)->first();

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

    public function cargarFichasTipoCDG()
    {
        $datos = array();

        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $registro = FichaCirugiaDigestivaTipo::where('id_profesional',$profesional->id)->get();

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
    /** CIERRE FICHA CIRUGIA DIGESTIVA TIPO */

    /** FICHA CIRUGIA GENERAL TIPO */
    public function agregarFichaTipoCG(Request $request)
    {
        $datos = array();
        $ficha_tipo = new FichaCirugiaGeneralTipo();
        $ficha_tipo->id_profesional = $request->id_profesional;
        $ficha_tipo->ind_esp_cirugia = $request->ind_esp_cirugia;
        $ficha_tipo->nombre = $request->nombre;
        $ficha_tipo->descripcion = $request->descripcion;
        $ficha_tipo->e_general = $request->e_general;
        $ficha_tipo->obs_e_general = $request->obs_e_general;
        $ficha_tipo->e_signos_vit = $request->e_signos_vit;
        $ficha_tipo->obs_e_signos_vit = $request->obs_e_signos_vit;
        $ficha_tipo->e_dolor_loc = $request->e_dolor_loc;
        $ficha_tipo->obs_e_dolor_loc = $request->obs_e_dolor_loc;
        $ficha_tipo->masas_pal = $request->masas_pal;
        $ficha_tipo->obs_masas_pal = $request->obs_masas_pal;
        $ficha_tipo->e_piel_fan = $request->e_piel_fan;
        $ficha_tipo->obs_e_piel_fan = $request->obs_e_piel_fan;
        $ficha_tipo->ex_cabcuello = $request->ex_cabcuello;
        $ficha_tipo->obs_ex_cabcuello = $request->obs_ex_cabcuello;
        $ficha_tipo->ex_torax = $request->ex_torax;
        $ficha_tipo->obs_ex_torax = $request->obs_ex_torax;
        $ficha_tipo->ex_abdomen = $request->ex_abdomen;
        $ficha_tipo->obs_ex_abdomen = $request->obs_ex_abdomen;
        $ficha_tipo->ex_muscesq = $request->ex_muscesq;
        $ficha_tipo->obs_ex_muscesq = $request->obs_ex_muscesq;
        $ficha_tipo->ex_o_sent = $request->ex_o_sent;
        $ficha_tipo->obs_ex_o_sent = $request->obs_ex_o_sent;
        $ficha_tipo->obs_ex_segmentario = $request->obs_ex_segmentario;
        $ficha_tipo->urgencia_cg = $request->urgencia_cg;
        $ficha_tipo->obs_urgencia_cg = $request->obs_urgencia_cg;
        $ficha_tipo->hosp_cg = $request->hosp_cg;
        $ficha_tipo->obs_hosp_cg = $request->obs_hosp_cg;
        $ficha_tipo->otrotto_cg = $request->otrotto_cg;
        $ficha_tipo->obs_otrotto_cg = $request->obs_otrotto_cg;
        $ficha_tipo->obs_plan_tratamiento = $request->obs_plan_tratamiento;
        $ficha_tipo->hospen_cg = $request->hospen_cg;
        $ficha_tipo->obs_hospen_cg = $request->obs_hospen_cg;
        $ficha_tipo->hosp_enserv_cg = $request->hosp_enserv_cg;
        $ficha_tipo->obs_hosp_enserv_cg = $request->obs_hosp_enserv_cg;
        $ficha_tipo->otro_tto_cg = $request->otro_tto_cg;
        $ficha_tipo->obs_otro_tto_cg = $request->obs_otro_tto_cg;
        $ficha_tipo->obs_hospitalizacion_cg = $request->obs_hospitalizacion_cg;
        $ficha_tipo->otro = $request->otro;
        $ficha_tipo->estado = 1;


        if($ficha_tipo->save())
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'registro exitoso';

        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'registro NO exitoso';
        }
        return $datos;
    }

    public function buscarFichaTipoCG(Request $request)
    {
        $datos = array();

        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $registro = FichaCirugiaGeneralTipo::where('id_profesional',$profesional->id)->where('id',$request->id_ficha_tipo)->first();

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

    public function cargarFichasTipoCG(Request $request)
    {
        $datos = array();

        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $registro = FichaCirugiaGeneralTipo::where('id_profesional',$profesional->id)->get();

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
    /** CIERRE FICHA CIRUGIA GENERAL TIPO */


    /**************** FICHA TIPO OFTALMOLOGIA ******************** */
    /** FICHA OFTALMOLOGIA GENERAL TIPO */
    public function agregarFichaTipoOft(Request $request)
    {
        $datos = array();
        $ficha_tipo = new FichaOftTipo();
        $ficha_tipo->nombre = $request->nombre;
        $ficha_tipo->descripcion = $request->descripcion;
        $ficha_tipo->id_profesional = $request->id_profesional;

        $ficha_tipo->agudeza_visual_subj_od = $request->agudeza_visual_subj_od;
        $ficha_tipo->obs_agudeza_visual_subj_od = $request->obs_agudeza_visual_subj_od;
        $ficha_tipo->agudeza_visual_subj_oi = $request->agudeza_visual_subj_oi;
        $ficha_tipo->obs_agudeza_visual_subj_oi = $request->obs_agudeza_visual_subj_oi;
        $ficha_tipo->agudeza_visual_obj_od = $request->agudeza_visual_obj_od;
        $ficha_tipo->obs_agudeza_visual_obj_od = $request->obs_agudeza_visual_obj_od;
        $ficha_tipo->agudeza_visual_obj_oi = $request->agudeza_visual_obj_oi;
        $ficha_tipo->obs_agudeza_visual_obj_oi = $request->obs_agudeza_visual_obj_oi;
        $ficha_tipo->mov_oculares = $request->mov_oculares;
        $ficha_tipo->obs_mov_oculares = $request->obs_mov_oculares;
        $ficha_tipo->autorefracto_od = $request->autorefracto_od;
        $ficha_tipo->obs_autorefracto_od = $request->obs_autorefracto_od;
        $ficha_tipo->autorefracto_oi = $request->autorefracto_oi;
        $ficha_tipo->obs_autorefracto_oi = $request->obs_autorefracto_oi;
        $ficha_tipo->presion_ocular_od = $request->presion_ocular_od;
        $ficha_tipo->obs_presion_ocular_od = $request->obs_presion_ocular_od;
        $ficha_tipo->valor_presion_ocular_od = $request->valor_presion_ocular_od;
        $ficha_tipo->presion_ocular_oi = $request->presion_ocular_oi;
        $ficha_tipo->obs_presion_ocular_oi = $request->obs_presion_ocular_oi;
        $ficha_tipo->valor_presion_ocular_oi = $request->valor_presion_ocular_oi;
        $ficha_tipo->campo_visual_od = $request->campo_visual_od;
        $ficha_tipo->obs_campo_visual_od = $request->obs_campo_visual_od;
        $ficha_tipo->campo_visual_oi = $request->campo_visual_oi;
        $ficha_tipo->obs_campo_visual_oi = $request->obs_campo_visual_oi;
        $ficha_tipo->campo_otros_ex_general = $request->campo_otros_ex_general;
        $ficha_tipo->otro = $request->otro;
        $ficha_tipo->otro2 = $request->otro2;

        $ficha_tipo->estado = 1;


        if($ficha_tipo->save())
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'registro exitoso';

        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'registro NO exitoso';
        }
        return $datos;
    }

    public function buscarFichaTipoOft(Request $request)
    {
        $datos = array();

        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $registro = FichaOftTipo::where('id_profesional',$profesional->id)->where('id',$request->id_ficha_tipo)->first();

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
    /** CIERRE FICHA OFTALMOLOGIA GENERAL TIPO */

    /** EXAMEN EXAMEN BIOMICROSCOPIA TIPO */
    public function agregarFichaTipoOftBio(Request $request)
    {
        $datos = array();
        $ficha_tipo = new FichaOftBiomicroscopiaTipo();
        $ficha_tipo->nombre = $request->nombre;
        $ficha_tipo->descripcion = $request->descripcion;
        $ficha_tipo->id_profesional = $request->id_profesional;

        $ficha_tipo->parpbiood = $request->parpbiood;
        $ficha_tipo->obs_parpbiood = $request->obs_parpbiood;
        $ficha_tipo->conjuntiva_bio_od = $request->conjuntiva_bio_od;
        $ficha_tipo->obs_conjuntiva_bio_od = $request->obs_conjuntiva_bio_od;
        $ficha_tipo->biocornea_od = $request->biocornea_od;
        $ficha_tipo->obs_biocornea_od = $request->obs_biocornea_od;
        $ficha_tipo->camara_ant_od = $request->camara_ant_od;
        $ficha_tipo->obs_camara_ant_od = $request->obs_camara_ant_od;
        $ficha_tipo->tyndall_od = $request->tyndall_od;
        $ficha_tipo->obs_tyndall_od = $request->obs_tyndall_od;
        $ficha_tipo->cristalino_bio_od = $request->cristalino_bio_od;
        $ficha_tipo->obs_cristalino_bio_od = $request->obs_cristalino_bio_od;
        $ficha_tipo->campo_otros_bio_od = $request->campo_otros_bio_od;
        $ficha_tipo->parpbiooi = $request->parpbiooi;
        $ficha_tipo->obs_parpbiooi = $request->obs_parpbiooi;
        $ficha_tipo->conjuntiva_bio_oi = $request->conjuntiva_bio_oi;
        $ficha_tipo->obs_conjuntiva_bio_oi = $request->obs_conjuntiva_bio_oi;
        $ficha_tipo->biocornea_oi = $request->biocornea_oi;
        $ficha_tipo->obs_biocornea_oi = $request->obs_biocornea_oi;
        $ficha_tipo->camara_ant_oi = $request->camara_ant_oi;
        $ficha_tipo->obs_camara_ant_oi = $request->obs_camara_ant_oi;
        $ficha_tipo->tyndall_oi = $request->tyndall_oi;
        $ficha_tipo->obs_tyndall_oi = $request->obs_tyndall_oi;
        $ficha_tipo->cristalino_bio_oi = $request->cristalino_bio_oi;
        $ficha_tipo->obs_cristalino_bio_oi = $request->obs_cristalino_bio_oi;
        $ficha_tipo->campo_otros_bio_oi = $request->campo_otros_bio_oi;
        $ficha_tipo->otro = $request->otro;
        $ficha_tipo->otro2 = $request->otro2;

        $ficha_tipo->estado = 1;

        if($ficha_tipo->save())
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'registro exitoso';

        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'registro NO exitoso';
        }
        return $datos;
    }

    public function buscarFichaTipoOftBio(Request $request)
    {
        $datos = array();

        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $registro = FichaOftBiomicroscopiaTipo::where('id_profesional',$profesional->id)->where('id',$request->id_ficha_tipo)->first();

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
    /** CIERRE EXAMEN EXAMEN BIOMICROSCOPIA TIPO */

    /** EXAMEN FONDO DE OJO TIPO */
    public function agregarFichaTipoOftFondo(Request $request)
    {
        $datos = array();
        $ficha_tipo = new FichaOftFondoOjoTipo();
        $ficha_tipo->nombre = $request->nombre;
        $ficha_tipo->descripcion = $request->descripcion;
        $ficha_tipo->id_profesional = $request->id_profesional;

        $ficha_tipo->papilas_fo_od = $request->papilas_fo_od;
        $ficha_tipo->obs_papilas_fo_od = $request->obs_papilas_fo_od;
        $ficha_tipo->excavacion_fo_od = $request->excavacion_fo_od;
        $ficha_tipo->obs_excavacion_fo_od = $request->obs_excavacion_fo_od;
        $ficha_tipo->bordes_od = $request->bordes_od;
        $ficha_tipo->obs_bordes_od = $request->obs_bordes_od;
        $ficha_tipo->maculas_fo_od = $request->maculas_fo_od;
        $ficha_tipo->obs_maculas_fo_od = $request->obs_maculas_fo_od;
        $ficha_tipo->vasos_fo_od = $request->vasos_fo_od;
        $ficha_tipo->obs_vasos_fo_od = $request->obs_vasos_fo_od;
        $ficha_tipo->periferia_fo_od = $request->periferia_fo_od;
        $ficha_tipo->obs_periferia_fo_od = $request->obs_periferia_fo_od;
        $ficha_tipo->campo_fo_otros_od = $request->campo_fo_otros_od;
        $ficha_tipo->papilas_fo_oi = $request->papilas_fo_oi;
        $ficha_tipo->obs_papilas_fo_oi = $request->obs_papilas_fo_oi;
        $ficha_tipo->excavacion_fo_oi = $request->excavacion_fo_oi;
        $ficha_tipo->obs_excavacion_fo_oi = $request->obs_excavacion_fo_oi;
        $ficha_tipo->bordes_oi = $request->bordes_oi;
        $ficha_tipo->obs_bordes_oi = $request->obs_bordes_oi;
        $ficha_tipo->maculas_fo_oi = $request->maculas_fo_oi;
        $ficha_tipo->obs_maculas_fo_oi = $request->obs_maculas_fo_oi;
        $ficha_tipo->vasos_fo_oi = $request->vasos_fo_oi;
        $ficha_tipo->obs_vasos_fo_oi = $request->obs_vasos_fo_oi;
        $ficha_tipo->periferia_fo_oi = $request->periferia_fo_oi;
        $ficha_tipo->obs_periferia_fo_oi = $request->obs_periferia_fo_oi;
        $ficha_tipo->campo_fo_otros_oi = $request->campo_fo_otros_oi;
        $ficha_tipo->otro = $request->otro;
        $ficha_tipo->otro2 = $request->otro2;

        $ficha_tipo->estado = 1;

        if($ficha_tipo->save())
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'registro exitoso';

        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'registro NO exitoso';
        }
        return $datos;
    }

    public function buscarFichaTipoOftFondo(Request $request)
    {
        $datos = array();

        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $registro = FichaOftFondoOjoTipo::where('id_profesional',$profesional->id)->where('id',$request->id_ficha_tipo)->first();

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
    /** CIERRE EXAMEN FONDO DE OJO TIPO */
    /**************** CIERRE FICHA TIPO OFTALMOLOGIA ******************** */

    /**************** FICHA TIPO UROLOGIA ******************** */
    /** FICHA UROLOGIA GENERAL TIPO */
    public function agregarFichaTipoUro(Request $request)
    {
        $datos = array();
        $ficha_tipo = new FichaUroTipo();
        $ficha_tipo->nombre = $request->nombre;
        $ficha_tipo->descripcion = $request->descripcion;
        $ficha_tipo->id_profesional = $request->id_profesional;

        $ficha_tipo->costo_vert_ld = $request->costo_vert_ld;
        $ficha_tipo->obs_costo_vert_ld = $request->obs_costo_vert_ld;
        $ficha_tipo->costo_vert_li = $request->costo_vert_li;
        $ficha_tipo->obs_costo_vert_li = $request->obs_costo_vert_li;
        $ficha_tipo->examen_abd = $request->examen_abd;
        $ficha_tipo->obs_examen_abd = $request->obs_examen_abd;
        $ficha_tipo->tacto_rec = $request->tacto_rec;
        $ficha_tipo->obs_tacto_rec = $request->obs_tacto_rec;
        $ficha_tipo->antigeno_prost = $request->antigeno_prost;
        $ficha_tipo->obs_antigeno_prost = $request->obs_antigeno_prost;
        $ficha_tipo->biopsia_uro = $request->biopsia_uro;
        $ficha_tipo->obs_biopsia_uro = $request->obs_biopsia_uro;
        $ficha_tipo->ingle = $request->ingle;
        $ficha_tipo->obs_detalle_ingle = $request->obs_detalle_ingle;
        $ficha_tipo->habitos_micionales = $request->habitos_micionales;
        $ficha_tipo->obs_habitos_micionales = $request->obs_habitos_micionales;
        $ficha_tipo->funcion_pene = $request->funcion_pene;
        $ficha_tipo->obs_funcion_pene = $request->obs_funcion_pene;
        $ficha_tipo->sintomas_funcionales = $request->sintomas_funcionales;
        $ficha_tipo->obs_sintomas_funcionales = $request->obs_sintomas_funcionales;
        $ficha_tipo->uretra_masc = $request->uretra_masc;
        $ficha_tipo->obs_detalle_uretra_masc = $request->obs_detalle_uretra_masc;
        $ficha_tipo->examen_pene = $request->examen_pene;
        $ficha_tipo->obs_pene_anormal = $request->obs_pene_anormal;
        $ficha_tipo->examen_test = $request->examen_test;
        $ficha_tipo->obs_test_anormal = $request->obs_test_anormal;
        $ficha_tipo->vulva = $request->vulva;
        $ficha_tipo->obs_det_vulva = $request->obs_det_vulva;
        $ficha_tipo->vagina = $request->vagina;
        $ficha_tipo->obs_det_vagina = $request->obs_det_vagina;
        $ficha_tipo->examen_horm = $request->examen_horm;
        $ficha_tipo->obs_examen_horm = $request->obs_examen_horm;
        $ficha_tipo->obs_ex_uro = $request->obs_ex_uro;


        if($ficha_tipo->save())
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'registro exitoso';

        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'registro NO exitoso';
        }
        return $datos;
    }

    public function buscarFichaTipoUro(Request $request)
    {
        $datos = array();

        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $registro = FichaUroTipo::where('id_profesional',$profesional->id)->where('id',$request->id_ficha_tipo)->first();

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
    /** CIERRE FICHA UROLOGIA GENERAL TIPO */


    /**************** FICHA TIPO PEDIATRIA ******************** */
    /** FICHA PEDIATRIA GENERAL TIPO */
    public function agregarFichaTipoPedGen(Request $request)
    {
        $datos = array();
        $ficha_tipo = new FichaPediatriaGeneralTipo();

        $ficha_tipo->id_profesional = $request->id_profesional;
        $ficha_tipo->nombre = $request->nombre;
        $ficha_tipo->descripcion = $request->descripcion;
        $ficha_tipo->e_nutricional = $request->e_nutricional;
        $ficha_tipo->obs_e_nutricional = $request->obs_e_nutricional;
        $ficha_tipo->e_vacunas = $request->e_vacunas;
        $ficha_tipo->obs_e_vacunas = $request->obs_e_vacunas;
        $ficha_tipo->obs_ex_nutricional_vacunas = $request->obs_ex_nutricional_vacunas;
        $ficha_tipo->e_piel = $request->e_piel;
        $ficha_tipo->obs_e_piel = $request->obs_e_piel;
        $ficha_tipo->e_cabcuello = $request->e_cabcuello;
        $ficha_tipo->obs_e_cabcuello = $request->obs_e_cabcuello;
        $ficha_tipo->e_torax = $request->e_torax;
        $ficha_tipo->obs_e_torax = $request->obs_e_torax;
        $ficha_tipo->e_abdomen = $request->e_abdomen;
        $ficha_tipo->obs_e_abdomen = $request->obs_e_abdomen;
        $ficha_tipo->e_muscesq = $request->e_muscesq;
        $ficha_tipo->obs_e_muscesq = $request->obs_e_muscesq;
        $ficha_tipo->e_o_sent = $request->e_o_sent;
        $ficha_tipo->obs_e_o_sent = $request->obs_e_o_sent;
        $ficha_tipo->obs_ex_segmentario = $request->obs_ex_segmentario;
        $ficha_tipo->obs_ex_pedgen = $request->obs_ex_pedgen;

        if($ficha_tipo->save())
        {
            $datos['estado'] = 1;
            $datos['msj'] = 'registro exitoso';
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'registro NO exitoso';
        }
        return $datos;
    }

    public function buscarFichaTipoPedGen(Request $request)
    {
        $datos = array();

        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $registro = FichaPediatriaGeneralTipo::where('id_profesional',$profesional->id)->where('id',$request->id_ficha_tipo)->first();

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
    /** CIERRE FICHA PEDIATRIA GENERAL TIPO */


    /** buscar profesionales autocomplete */
    public function buscarPorNombreAutocomplete(Request $request)
    {
        $search = $request->search;
        if ($search == '')
        {
            $registros = Profesional::orderby('nombre', 'asc')->select('id', 'nombre', 'apellido_uno')->limit(5)->get();
        }
        else
        {
            $registros = Profesional::orderby('nombre', 'asc')
                ->select('id', 'nombre', 'apellido_uno')
                ->where(function($query) use($search){
                    $query->where('nombre', 'like', '%'.$search.'%')
                            ->orWhere('apellido_uno', 'like', '%'.$search.'%');
                })
                ->limit(5)
                ->get();
        }

        $response = array();
        foreach ($registros as $registro)
        {
            $response[] = array("value" => $registro->id, "label" => $registro->nombre.' '.$registro->apellido_uno, "codigo" => $registro->codigo);
        }
        return response()->json($response);
    }
    /** fin buscar profesionales autocomplete */

     /*Acceso Profecional no Inscrito*/
     public function acceso_pni(Request $request)
     {

        // echo json_encode($request->all());
        // die();

        $token = $request->token;

        $profesional_provisorio = ProfesionalProvisorio::where([['token',$token],['estado_token',0]])->first();

        if($profesional_provisorio)
        {

            $id_registro = $profesional_provisorio->id;

            $profesional = Profesional::where('rut', $profesional_provisorio->rut)->get()->first();
            $profesional_cant = Profesional::where('rut', $profesional_provisorio->rut)->get()->count();

            if($profesional_cant > 0)
            {
                $direccion = Direccion::find($profesional->id_direccion);
                $request_temp = new Request(
                    array(
                        'id_registro' => $profesional_provisorio->id,
                        'nombre_profesional' => $profesional->nombre,
                        'primer_apellido_profesional' => $profesional->apellido_uno,
                        'segundo_apellido_profesional' => $profesional->apellido_dos,
                        'lista_profesion' => $profesional->id_especialidad,
                        'sexo_profesional' => $profesional->sexo,
                        'rut_profesional' => $profesional->rut,
                        'email_profesional' => $profesional->email,
                        'lista_especialidad' => $profesional->id_tipo_especialidad,
                        'lista_sub_especialidad' => $profesional->id_sub_tipo_especialidad,
                        'telefono_uno_profesional' => $profesional->telefono_uno,
                        'telefono_dos_profesional' => $profesional->telefono_dos,
                        'direccion_consulta_profesional' => $direccion->direccion,
                        'numero_dir_consulta_profesional' => $direccion->numero_dir,
                        'lista_ciudades' => $direccion->id_ciudad,
                        'token_profesional_provisorio' => $token
                    )
                );
                return $this->agregar_profesional_provisorio($request_temp);

                $region_temp = Region::find($direccion->id_ciudad);

                $direccion_nombre = $direccion->direccion;
                $direccion_numero = $direccion->numero_dir;
                $id_ciudad = $direccion->id_ciudad;
                $id_region = $region_temp->id_region;
            }
            else
            {


                if($profesional_provisorio->id_direccion)
                {
                        $direccion = Direccion::find($profesional_provisorio->id_direccion);

                        if($direccion)
                        {
                            $direccion_nombre =  $direccion->direccion;
                            $direccion_numero =  $direccion->numero_dir;
                            $id_ciudad = $direccion->id_ciudad;

                            $ciudad = Ciudad::find($direccion->id_ciudad);

                            if($ciudad)
                            {
                            $id_region =  $ciudad->id_region;
                            }else{
                                $id_region =  0;
                            }
                        }else{
                            $direccion_nombre =  '';
                            $direccion_numero =  '';
                            $id_ciudad = 0;
                            $id_region =  0;
                        }

                }else{
                            $direccion_nombre =  '';
                            $direccion_numero =  '';
                            $id_ciudad = 0;
                            $id_region =  0;
                }
            }

        }else{
            // abort(401);
            return view('app.profesional.acceso_profesional_no_inscrito_no_valido');
        }



         $regiones = Region::all();
         $ciudades = Ciudad::all();


         $especialidades = Especialidad::where('estado',1)->get();
         $tipo_especialidad = TipoEspecialidad::where('estado',1)->get();
         $sub_tipo_especialidad = SubTipoEspecialidad::where('estado',1)->get();

         return view('app.profesional.acceso_profesional_no_inscrito')->with([
             'id_registro' => $id_registro,
             'registro' => $profesional_provisorio,
             'regiones' => $regiones,
             'ciudades' => $ciudades,

             'direccion_nombre' => $direccion_nombre,
             'direccion_numero' => $direccion_numero,
             'id_ciudad' => $id_ciudad,
             'id_region' => $id_region,

             'profesion' => $especialidades,
             'especialidad' => $tipo_especialidad,
             'subespecialidad' => $sub_tipo_especialidad,
             'token' => $token
         ]);
     }

     public function agregar_profesional_provisorio(Request $request)
     {
        $datos = array();
        $error = array();
        $estado = 0;
        $profesional_nuevo = 0;

        $lugar_atencion_id_ = 0;
        $id_usuario_genera_ = 0;
        $id_usuario_ = 0;
        $id_profesional_ = 0;
        $id_hora_realizar_ = 0;
        $clave_ = rand(1111,9999);

        $id_registro = $request->id_registro;
        $nombre = $request->nombre_profesional;
        $primer_apellido = $request->primer_apellido_profesional;
        $segundo_apellido = $request->segundo_apellido_profesional;
        $lista_profesion = $request->lista_profesion;
        $sexo = $request->sexo_profesional;
        $rut = $request->rut_profesional;
        $email = $request->email_profesional;
        $lista_especialidad = $request->lista_especialidad;
        $lista_sub_especialidad = $request->lista_sub_especialidad;
        $telefono_uno = $request->telefono_uno_profesional;
        $telefono_dos = $request->telefono_dos_profesional;

        $direccion = $request->direccion_consulta_profesional;
        $numero_dir = $request->numero_dir_consulta_profesional;
        $lista_ciudades = $request->lista_ciudades;
        $token_profesional_provisorio = $request->token_profesional_provisorio;


        //VALIDAMOS TOKEN
        // PROFESIONAL PROVISORIO
        $profesional_provisorio = ProfesionalProvisorio::find($request->id_registro);

        if($profesional_provisorio->estado_token==1||empty($request->id_registro))
        {
            return view('app.profesional.estado_acceso_profesional_no_inscrito')->with([
                'estado' => 0,
                'error' => 'Token invalido'
            ]);
        }

        if($profesional_provisorio)
        {
            $id_usuario_ = $profesional_provisorio->id_usuario;
            $id_usuario_genera_ = $profesional_provisorio->id_usuario_genera; // ID USUARIO QUE CREO INVITACION

            $profesional_provisorio->nombre = $nombre;
            $profesional_provisorio->apellido_uno = $primer_apellido;
            $profesional_provisorio->apellido_dos = $segundo_apellido;
            $profesional_provisorio->sexo = $sexo;
            $profesional_provisorio->rut = str_replace('.','',$rut);
            $profesional_provisorio->email = $email;
            $profesional_provisorio->telefono_uno = $telefono_uno;
            $profesional_provisorio->telefono_dos = $telefono_dos;
            //$profesional_provisorio->id_direccion = $id_direccion;
            //$profesional_provisorio->id_usuario = $id_usuario;
            $profesional_provisorio->id_especialidad = $lista_profesion;
            $profesional_provisorio->id_tipo_especialidad = $lista_especialidad;
            //desactivamos token
            $profesional_provisorio->estado_token = 1;
            $profesional_provisorio->save();
        }


        // PROFESIONAL EXISTENTE
        $validar_profesional = Profesional::where('email',$email)->first();
        if($validar_profesional)
        {
            $id_profesional_ = $validar_profesional->id;
            $validar_profesional->nombre = $nombre;
            $validar_profesional->apellido_uno = $primer_apellido;
            $validar_profesional->apellido_dos = $segundo_apellido;
            $validar_profesional->sexo = $sexo;
            $validar_profesional->rut = str_replace('.','',$rut);
            $validar_profesional->email = $email;

            $validar_profesional->id_especialidad = $lista_profesion; //id_especialidad
            $validar_profesional->id_tipo_especialidad = $lista_especialidad; //id_tipo_especialidad
            $validar_profesional->id_sub_tipo_especialidad = $lista_sub_especialidad; //id_sub_tipo_especialidad

            $validar_profesional->telefono_uno = $telefono_uno;
            $validar_profesional->telefono_dos = $telefono_dos;
            $validar_profesional->estado = 1;
            $validar_profesional->certificado = 0;

            $validar_profesional->provisorio = 1;
            $validar_profesional->save();

            $id_usuario_ = $validar_profesional->id_usuario; // ID USUARIO PROFESIONAL EXISTENTE

            //ACTUALIZAMOS REGISTRO PROFESIONAL PROVISORIO ID USUARIO
            $profesional_provisorio2 = ProfesionalProvisorio::find($request->id_registro);
            $profesional_provisorio2->id_usuario = $id_usuario_;
            $profesional_provisorio2->save();

            //AUTH USUARIO
            //var_dump($id_usuario_);
            if(Auth::loginUsingId($id_usuario_))
            {
                $estado = 1;
                $datos['login_msg'] = 'Usuario Logeado';
            }else{
                $datos['login_msg'] = 'Usuario no se pudo Logear';
                $error = 'Usuario no se pudo Logear';
                $estado = 0;
            }

            //LUGAR ATENCION
            $lugarAtencion = LugarAtencion::where('email',$email)->first();
            $lugar_atencion_id_ = $lugarAtencion->id;

            $datos['estado'] = 1;
            $datos['msj'] = 'Profesional ya existe';

        }else{ // PROFESIONAL NUEVO
            $profesional_nuevo = 1;
            $profesionales = new Profesional();

            $profesionales->nombre = $nombre;
            $profesionales->apellido_uno = $primer_apellido;
            $profesionales->apellido_dos = $segundo_apellido;
            $profesionales->sexo = $sexo;
            $profesionales->rut = str_replace('.','',$rut);
            $profesionales->email = $email;

            $profesionales->id_especialidad = $lista_profesion; //id_especialidad
            $profesionales->id_tipo_especialidad = $lista_especialidad; //id_tipo_especialidad
            $profesionales->id_sub_tipo_especialidad = $lista_sub_especialidad; //id_sub_tipo_especialidad

            $profesionales->telefono_uno = $telefono_uno;
            $profesionales->telefono_dos = $telefono_dos;
            $profesionales->estado = 1;
            $profesionales->certificado = 0;

            $profesionales->id_direccion = NULL;
            $profesionales->id_usuario = NULL;
            $profesionales->provisorio = 1;

            if($profesionales->save())
            {

                $id_profesional_ = $profesionales->id;
                //DIRECCIONES
                $direcciones = new Direccion();
                $direcciones->direccion = $direccion;
                $direcciones->numero_dir = $numero_dir;
                $direcciones->id_ciudad = $lista_ciudades;

                //USER
                $validar_user = User::where('email',$email)->first();
                if($validar_user == NULL)
                {
                    $user = new User();
                    $pass = Hash::make($clave_);
                    $user->name = $nombre.' '.$primer_apellido.' '.$segundo_apellido;
                    $user->email = $email;
                    $user->password = $pass;

                    if($user->save())
                    {
                        //ACTUALIZAMOS REGISTRO PROFESIONAL PROVISORIO ID USUARIO
                        $profesional_provisorio2 = ProfesionalProvisorio::find($request->id_registro);
                        $profesional_provisorio2->id_usuario = $user->id;
                        $profesional_provisorio2->save();

                        $id_usuario_ = $user->id; // GUARDAMOS ID USUARIO NUEVO

                        $user->assignRole('Profesional');
                        $datos['user_msg'] = 'Usuario Creado';

                        //AUTH USUARIO
                        if (Auth::attempt(['email' => $email, 'password' =>  $clave_])) {
                            $datos['login_msg'] = 'Usuario Logeado';
                        }else{
                            $datos['login_msg'] = 'Usuario no se pudo Logear';
                        }

                    }else{
                        $datos['user_msg'] = 'Usuario No Creado';
                    }
                }else{
                    //AUTH USUARIO
                    if (Auth::attempt(['email' => $validar_user->email, 'password' =>  $validar_user->password])) {
                        $datos['login_msg'] = 'Usuario Logeado';
                    }else{
                        $datos['login_msg'] = 'Usuario no se pudo Logear';
                    }
                }

                if($direcciones->save())
                {
                    $error = 'direccion creado';
                    $profesionales->id_direccion = $direcciones->id;
                    if($validar_user == NULL)
                    $profesionales->id_usuario = $user->id;
                    $profesionales->save();


                    //LUGARES ATENCION
                    $lugar_atencion = new LugarAtencion();
                    $lugar_atencion->nombre = $nombre.' '.$primer_apellido.' '.$segundo_apellido;
                    $lugar_atencion->rut = $rut;
                    $lugar_atencion->email = $email;
                    $lugar_atencion->telefono = $telefono_uno;
                    $lugar_atencion->id_direccion = $direcciones->id;

                    if($lugar_atencion->save()){
                        $datos['lugar_atencion_msg'] = 'Lugar Atención Creado';
                        $lugar_atencion_id_ = $lugar_atencion->id;
                    }else{
                        $datos['lugar_atencion_msg'] = 'Lugar Atención No Creado';
                    }

                    //PROFESIONALES LUGARES ATENCION
                    $profesionales_lugares_atencion = new ProfesionalesLugaresAtencion();
                    $profesionales_lugares_atencion->id_profesional = $profesionales->id;
                    $profesionales_lugares_atencion->id_lugar_atencion = $lugar_atencion->id;
                    $profesionales_lugares_atencion->estado = 1;

                    if($profesionales_lugares_atencion->save())
                    {
                        $datos['profesionales_lugar_atencion_msg'] = 'Profesional Lugar Atención Creado';
                    }else{
                        $datos['profesionales_lugar_atencion_msg'] = 'Profesional Lugar Atención No Creado';
                    }

                    $datos['estado'] = 1;
                    $datos['msj'] = 'registro exitoso';



                }else{
                    $error = 'direccion no creado';
                }

                $error = 'Profesional creado';
                $estado = 1;

            }else{
                $error = 'Profesional no creado';
                $estado = 0;
            }
        }

        // HORA MEDICA
        $paciente = Paciente::where('id_usuario', $id_usuario_genera_)->first();
        $hora_medica = new HoraMedica();

        $hora_medica->id_paciente = $paciente->id;
        $hora_medica->id_profesional = $id_profesional_;
        $hora_medica->id_asistente = 2;
        $hora_medica->id_estado = 1;
        $hora_medica->id_lugar_atencion = $lugar_atencion_id_;
        $hora_medica->fecha_consulta = \Carbon\Carbon::parse(date('Y-m-d'))->format('Y-m-d');

        $hora_medica->hora_inicio = \Carbon\Carbon::parse(date('H:i:s'))->format('H:i:s');
        $hora_medica->hora_termino = \Carbon\Carbon::parse(date('H:i:s'))->addMinutes(15)->subSecond()->format('H:i:s');
        $hora_medica->descripcion = $hora_medica->descripcion = $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos;
        if($hora_medica->save()){
            $id_hora_realizar_ = $hora_medica->id;
            $datos['hora_medica_msg'] = 'Hora Medica Creada';
        }else{
            $datos['hora_medica_msg'] = 'Hora Medica no Creada';
            $error['hora_medica_msg'] = 'Hora Medica no Creada';
        }



        /** envio de correo de confirmacion  */
        if($profesional_nuevo == 1) // VALIDANDO SI ES UN PROFESIONAL NUEVO O EXISTENTE
        {
            $blade = 'profesional_usuario_creado';
            $to = array(
                    array('email' => $email,'name' => $nombre.' '.$primer_apellido.' '.$segundo_apellido),
                );
            $cc = array();
            $bcc = array();
            $asunto = 'MED-SDI - Bienvenido!';
            $body = array(
                'nombre' => $nombre.' '.$primer_apellido.' '.$segundo_apellido,
                'user'=> $email,
                'pass' => $clave_
            );
            $archivo = '';/** pendiente */
            $id_institucion = '';

            $result_mail =  SendMailController::envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, $id_institucion);

            if($result_mail['estado'])
            {
                $datos['mail']['estado'] = 1;
                $datos['mail']['msj'] = 'Notificacion de bienvenida enviado';
            }else{
                $datos['mail']['estado'] = 0;
                $datos['mail']['msj'] = 'Falle en envio de Notificacion de bienvenida';
            }
        }else{
            $datos['mail']['estado'] = 1;
            $datos['mail']['msj'] = 'Usuario existente, redirigiendo al sistema';
        }

        return view('app.profesional.estado_acceso_profesional_no_inscrito')->with([
            'estado' => $estado,
            'error' => $error,
            'datos'=> $datos,
            'token_'=> $token_profesional_provisorio,

            'id_paciente' => $paciente->id,
            'lugar_atencion_id' => $lugar_atencion_id_,
            'id_hora_realizar' =>$id_hora_realizar_,
            'profesional_nuevo' => $profesional_nuevo
        ]);


     }


     public function historial_mensajes(){

        $mis_mensajes = Mensajes::where('id_receptor', Auth::user()->id)->get();
        $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
        // buscamos el lugar de atencion de la institucion de la cual el profesional es director medico
        // $institucion = Instituciones::where('id_director_medico', $profesional->id_usuario)->first();
        // return $institucion;
        foreach($mis_mensajes as $m){
            $remitente = User::find($m->id_usuario);
            $m->remitente = $remitente->name;
            $m->datos_mensaje = json_decode($m->datos_mensaje);
            if($m->tipo_mensaje == 1){
                $m->tipo_mensaje = 'DIRECTO';
            }else{
                $m->tipo_mensaje = 'DIFUSION';
            }

            if($m->estado == 1){
                $m->estado = 'NO LEIDO';
            }else{
                $m->estado = 'LEIDO';
            }
        }

        return view('app.profesional.receta_online.historial_mensajes',['mis_mensajes' => $mis_mensajes,'profesional' => $profesional]);
     }

     public function buscar_rut_profesional_bodega(Request $request){
        $responsables = Profesional::where('rut','like',$request->rut.'%')->get();
        return json_encode($responsables);
    }

     public function dame_historial_mensajes_json(){
        $mis_mensajes = Mensajes::where('id_receptor', Auth::user()->id)->get();

        foreach($mis_mensajes as $m){
            $remitente = User::find($m->id_usuario);
            $m->remitente = $remitente->name;
            $m->datos_mensaje = json_decode($m->datos_mensaje);
            if($m->tipo_mensaje == 1){
                $m->tipo_mensaje = 'DIRECTO';
            }else{
                $m->tipo_mensaje = 'DIFUSION';
            }

            if($m->estado == 1){
                $m->estado = 'NO LEIDO';
            }else{
                $m->estado = 'LEIDO';
            }
        }

        return $mis_mensajes;
     }

     public function mis_documentos()
     {

        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $fichas = FichaAtencion::where('id_profesional', $profesional->id)->get();

        return view('app.profesional.receta_online.mis_documentos', ['fichas' => $fichas]);
     }

     public function mis_licencias()
     {

        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $licencias = Licencia::where('id_profesional', $profesional->id)
                            ->with('Paciente')
                            ->with('Profesional')
                            ->with('LugarAtencion')
                            ->get();


        return view('app.profesional.receta_online.mis_licencias', ['licencias' => $licencias]);
     }


     public function ver_mensaje($id){
        try {
            $mensaje = Mensajes::find($id);
            $mensaje->estado = 0;
            $mensaje->save();
            $remitente = User::find($mensaje->id_usuario);
            $mensaje->remitente = $remitente->name;
            $mensaje->datos_mensaje = json_decode($mensaje->datos_mensaje);

            $mensaje->fecha_emision = Carbon::parse($mensaje->created_at)->format('d-m-Y H:i:s');
            return $mensaje;
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

     }

     public function eliminar_mensaje($id){
        try {
            $mensaje = Mensajes::find($id);
            $mensaje->delete();
            $mensajes = $this->dame_historial_mensajes_json();
            return ['estado' => 1, 'msj' => 'Mensaje eliminado','mensajes' => $mensajes];
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }
     }

     public function descargar_mensaje($id){
        try {
            $mensaje = Mensajes::find($id);
            $mensaje->descarga = 1;
            $mensaje->save();
            $remitente = User::find($mensaje->id_usuario);
            $mensaje->remitente = $remitente->name;
            $mensaje->datos_mensaje = json_decode($mensaje->datos_mensaje);

            $mensaje->fecha_emision = Carbon::parse($mensaje->created_at)->format('d-m-Y H:i:s');
            return ['estado' => 1, 'msj' => 'Mensaje descargado','mensaje' => $mensaje];
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }
     }

     public function mis_procedimientos_lugar_atencion(Request $request)
     {
        $datos = array();
        $error = array();
        $valido = 1;


        if($valido)
        {
            $datos = ProcedimientosCentroLugarAtencionProfesionalController::verRegistros(
                '',
                '',
                $request->id_lugar_atencion,
                $request->id_profesional,
                '',
                '',
                '',
                '',
                '',
                $request->estado );

        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campos requeridos';
            $datos['error'] = $error;
        }
        return $datos;
     }

     public function atencion_paciente(Request $request){
        $id_paciente = $request->id_paciente;
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
                $filtro_h_ex_esp_ral[] = array('id_ficha_atencion', $value_ex_esp_realizado->id_ficha_especialidad);
                $filtro_h_ex_esp_ral[] = array('id_profesional', $value_ex_esp_realizado->id_profesional);
                $hora_medica = HoraMedica::where($filtro_h_ex_esp_ral)->get()->first();
                $examenes_especialidad_realizados[$key_ex_esp_realizado]->HoraMedica = $hora_medica;
            }
            else if($profesional->id_especialidad != 1)
            {
                $filtro_h_ex_esp_ral = array();
                $filtro_h_ex_esp_ral[] = array('id_ficha_atencion', $value_ex_esp_realizado->id_ficha_especialidad);
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

        $procedimientos = $this->dameProcedimientosPaciente($paciente->id);
        $curaciones = $this->dameCuracionesPaciente($paciente->id);
        $examenControlador = new ExamenMedicoController();
        $examenes_solicitados = $examenControlador->dame_examenes_solicitados($paciente->id);
        $curaciones_planas = $this->dameCuracionesPlanasPaciente($paciente->id);
        $curaciones_lpp = $this->dameCuracionesLppPaciente($paciente->id);
        // variable que identifica si el usuario es enfermera
        $enfermera = true;

        // ultimo controla de ciclo
        $ultimo_control_ciclo = EvolucionUrgencia::where('id_paciente', $paciente->id)->orderBy('id', 'desc')->first();
        if($ultimo_control_ciclo)
            $ultimo_control_ciclo->datos_evolucion = json_decode($ultimo_control_ciclo->datos_evolucion);

        $resumen_recetas = "";
        foreach($recetas as $r){
            $resumen_recetas .= "<p>".$r->nombre_medicamento." ".$r->dosis." ".$r->nombre_frecuencia." ".$r->duracion." ".$r->comentario." con fecha ".$r->created_at."</p>";
        }

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

        $bc = new BoxController();
        $boxes = $bc->dame_boxes_atencion();

                // dame los pacientes que esten en cada box
    foreach($boxes as $box)
    {
        $box->pacientes = $this->dame_pacientes_box($box->id);
        // guardar la edad de cada paciente por el atributo fecha_nac
        foreach($box->pacientes as $paciente_box)
        {
            list($ano,$mes,$dia) = explode("-",$paciente_box->fecha_nac);
            $ano_diferencia  = date("Y") - $ano;
            $mes_diferencia = date("m") - $mes;
            $dia_diferencia   = date("d") - $dia;
            if ($dia_diferencia < 0 || $mes_diferencia < 0)
            $ano_diferencia--;

            $edad = $ano_diferencia;
            $paciente_box->edad = $edad;

            $detalle_receta_controlador = new DetalleRecetaController();
            $recetas_ = $detalle_receta_controlador->dameTodoDetalleRecetaPaciente($paciente_box->id_paciente);

            // Inicializar la variable booleana como false
            $tieneRecetaPendiente = false;
            // Recorrer las recetas
            foreach ($recetas_ as $receta) {
                // Suponiendo que 'estado' es el campo que indica si la receta está pendiente
                if ($receta->estado_tratamiento == 1) {
                    // Si se encuentra una receta pendiente, cambiar la variable a true
                    $tieneRecetaPendiente = true;
                    // Salir del ciclo
                    break;
                }
            }

            $paciente_box->tieneRecetaPendiente = $tieneRecetaPendiente;
        }
    }

    $pacientes_esperando = $this->dame_pacientes_en_espera();

    $examen_sad_person = $this->dame_examen_sad_person($paciente->id);

    $regiones = Region::all();
    $ciudades = Ciudad::all();

    $tipos_roles_incidentes = TipoRolesIncidentePaciente::all();
    $tipos_apreciaciones_paciente = TipoApreciacionClinicaPaciente::all();


    $ficha_atencion = FichaAtencion::where('id_paciente', $paciente->id)->first();

    $boleta_alcoholemia_paciente = $this->dame_boleta_alcoholemia_paciente($paciente->id, $ficha_atencion->id);

    $rescate_paciente = RescatePaciente::where('id_paciente', $paciente->id)->where('id_ficha_atencion',$ficha_atencion->id)->first();

    $examen_drogas = $this->dame_examen_drogas($paciente->id, $ficha_atencion->id);

    $antecedentes_urgencia_paciente = $this->dame_antecedentes_urgencia_paciente($paciente->id, $ficha_atencion->id);

    $puntajes_informes = InformesUrgenciasPuntaje::where('id_ficha_atencion', $ficha_atencion->id)->where('id_paciente', $paciente->id)->first();

     }

     public function actualizarFoto(Request $request)
    {
        try {
            $request->validate([
                'foto_perfil' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120', // 5MB máximo
            ]);

            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

            // Eliminar la foto anterior si existe
            if ($profesional->foto_perfil) {
                Storage::disk('public')->delete($profesional->foto_perfil);
            }

            // Guardar la nueva foto
            $path = $request->file('foto_perfil')->store('fotos_perfil', 'public');

            // Actualizar en la base de datos
            $profesional->update(['foto_perfil' => $path]);

            return response()->json([
                'success' => true,
                'message' => 'Foto actualizada correctamente',
                'foto_url' => asset('storage/' . $path)
            ]);

        } catch (\Exception $e) {
            return $e->getMessage();
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar la foto: ' . $e->getMessage()
            ], 500);
        }
    }

    public function eliminarFoto()
    {
        try {
            $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();

            if ($profesional->foto_perfil) {
                // Eliminar archivo del storage
                Storage::disk('public')->delete($profesional->foto_perfil);

                // Actualizar en la base de datos
                $profesional->update(['foto_perfil' => null]);
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
