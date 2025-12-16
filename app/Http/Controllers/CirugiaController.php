<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Biopsia;
use App\Models\Ciudad;
use App\Models\DetalleReceta;
use App\Models\EpicrisisCarnetCirugia;
use App\Models\EvolucionNeonatologia;
use App\Models\ExamenMedico;
use App\Models\ExamenPPF;
use App\Models\ExamenRadiologico;
use App\Models\FichaAtencionDental;
use App\Models\FichaNeonatologia;
use App\Models\IngresoPacienteCirugia;
use App\Models\Interconsulta;
use App\Models\Laboratorio;
use App\Models\LugarAtencion;
use App\Models\Paciente;
use App\Models\Prevision;
use App\Models\Profesional;
use App\Models\ProtocoloOperatorioCirugia;
use App\Models\RecuperacionCirugia;
use App\Models\Region;
use App\Models\SalaCirugia;
use App\Models\SolicitudPabellonQuirurgico;
use Faker\Calculator\Ean;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CirugiaController extends Controller
{
    public function index_cirugia_obstetricia_cesarea()
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

        $solicitudes_pabellon_obstetrico = SolicitudPabellonQuirurgico::where('id_paciente', $paciente->id)->where('tipo_cirugia', 'cesarea')->get();

        // dd($solicitudes_pabellon_obstetrico);
        if ($examen_radiologico == 0) {
            $examen_radiologico = 1;
        } else {
            $examen_radiologico = DB::table('examenes_radiologicos')->orderBy('id', 'desc')->first()->id + 1;
        }


        return view('app.cirugia.index_cirugia_cesarea')->with(
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
                'lugares_atenciones' => $lugares_atenciones,
                'solicitudes_pabellon_obstetrico' => $solicitudes_pabellon_obstetrico,

            ]
        );
    }

    public function registrar_solicitud_pabellon_cesarea(Request $request)
    {


        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();

        $solicitud_pabellon = new SolicitudPabellonQuirurgico();

        $solicitud_pabellon->tipo_cirugia = 'cesarea';

        $solicitud_pabellon->fecha_hora_operacion = $request->fecha_hora_pabellon;
        $solicitud_pabellon->grado_urgencia = $request->grado_urgencia_pabellon;
        $solicitud_pabellon->patalogias_cronicas = $request->patologias_cronicas;
        $solicitud_pabellon->cesareas_previas = $request->cesareas_previas;
        $solicitud_pabellon->semanas_embarazo = $request->semanas_embarazo;
        $solicitud_pabellon->evolucion = $request->evolucion;
        $solicitud_pabellon->riesgo_fetal = $request->riesgo_fetal;
        $solicitud_pabellon->riesgo_materno = $request->riesgo_materno;
        $solicitud_pabellon->patologia_embarazo = $request->patologia_embarazo;
        $solicitud_pabellon->codigo_parto = $request->codigo_parto;
        $solicitud_pabellon->anestesia = $request->anestesia;
        $solicitud_pabellon->tipo_hospital = $request->tipo_hospital;
        $solicitud_pabellon->ayudante1 = $request->ayudantes;
        $solicitud_pabellon->anestesista = $request->anestesista_pabellon;
        $solicitud_pabellon->arsenaleria = $request->arsenaleria_pabellon;
        $solicitud_pabellon->neonatologo = $request->neonatologo;
        $solicitud_pabellon->enfermero = $request->enfermero;
        // $solicitud_pabellon->tipo_hospitalizacion = $request->tipo_hospitalizacion;
        //$solicitud_pabellon->especialidad_1 = $request->especialidad_uno_pabellon;
        $solicitud_pabellon->comentarios = $request->comentarios_pabellon;

        $solicitud_pabellon->id_paciente = $request->paciente_cesarea;
        $solicitud_pabellon->id_profesional = $profesional->id;
        $solicitud_pabellon->id_lugar_atencion = $request->lugar_atencion_pabellon_quirurgico;


        //$solicitud_pabellon->operacion = $request->operacion_pabellon;
        // $solicitud_pabellon->codigo_cirugia = $request->codigo_cirugia_pabellon;
        // $solicitud_pabellon->equipamiento_especial = $request->equipamiento_especial_pabellon;
        // $solicitud_pabellon->codigo_cirugia_2 = $request->codigo_cirugia_pabellon1;
        // $solicitud_pabellon->especialidad_2 = $request->especialidad_dos_pabellon;



        //$solicitud_pabellon->id_ficha_atencion = $request->;

        if (!$solicitud_pabellon->save()) {
            return back();
        }
        $mensaje = 'Se ha agregado solicitud de pabellon de forma exitosa';

        return redirect()->back()->with('mensaje', $mensaje);
    }

    public function ingreso_paciente_cesarea(Request $request)
    {
        $id_solicitud_pabellon = $request->id;
        $ingreso_paciente = IngresoPacienteCirugia::where('id_solicitud_pabellon', $id_solicitud_pabellon)->first();
        $examenMedico = ExamenMedico::where('cod_parent', 0)->get();
        // dd($ingreso_paciente);

        if (isset($ingreso_paciente)) {
            $medicamentos_ingreso_paciente = DetalleReceta::where('id_ingreso_paciente', $ingreso_paciente->id)->get();
            // dd($medicamentos_ingreso_paciente);
            $examenes_ingreso_paciente = ExamenPPF::where('id_ingreso_paciente', $ingreso_paciente->id)->get();
        } else {
            $medicamentos_ingreso_paciente = null;
            $examenes_ingreso_paciente = null;
        }
        return view('app.cirugia.secciones_cesarea.ingreso_paciente')->with([
            'id_solicitud_pabellon' => $id_solicitud_pabellon,
            'ingreso_paciente' => $ingreso_paciente,
            'examenMedico' => $examenMedico,
            'medicamentos_ingreso_paciente' => $medicamentos_ingreso_paciente,
            'examenes_ingreso_paciente' => $examenes_ingreso_paciente,
        ]);

        // if (isset($medicamentos_ingreso_paciente)) {

        //     if (isset($examenes_ingreso_paciente)) {
        //         return view('app.cirugia.secciones_cesarea.ingreso_paciente')->with([
        //             'id_solicitud_pabellon' => $id_solicitud_pabellon,
        //             'ingreso_paciente' => $ingreso_paciente,
        //             'examenMedico' => $examenMedico,
        //             'medicamentos_ingreso_paciente' => $medicamentos_ingreso_paciente,
        //             'examenes_ingreso_paciente' => $examenes_ingreso_paciente,
        //         ]);
        //     } else {
        //         return view('app.cirugia.secciones_cesarea.ingreso_paciente')->with([
        //             'id_solicitud_pabellon' => $id_solicitud_pabellon,
        //             'ingreso_paciente' => $ingreso_paciente,
        //             'examenMedico' => $examenMedico,
        //             'medicamentos_ingreso_paciente' => $medicamentos_ingreso_paciente,
        //         ]);
        //     }
        // } else {

        //     return view('app.cirugia.secciones_cesarea.ingreso_paciente')->with([
        //         'id_solicitud_pabellon' => $id_solicitud_pabellon,
        //         'ingreso_paciente' => $ingreso_paciente,
        //         'examenMedico' => $examenMedico,
        //     ]);
        // }
    }
    public function registrar_ingreso_paciente_cesarea(Request $request)
    {
        //$id_solicitud_pabellon = $request->id_solicitud_pabellon;
        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();

        $ingreso_paciente = new IngresoPacienteCirugia();

        $ingreso_paciente->anamnesis = $request->anamnesis;
        $ingreso_paciente->antecedentes_examenes_fisicos = $request->antecedentes_examenes_fisicos;
        $ingreso_paciente->hipotesis_diagnostica = $request->hipotesis_diagnostica;
        $ingreso_paciente->diagnostico_cie10 = $request->diagnostico_cie10;
        $ingreso_paciente->indicaciones_ingreso = $request->indicaciones_ingreso;
        $ingreso_paciente->hora_operacion = $request->hora_operacion;
        $ingreso_paciente->hospitalizar_en = $request->hospitalizar_en;
        $ingreso_paciente->tipo_sala = $request->tipo_sala;
        $ingreso_paciente->id_solicitud_pabellon = $request->id_solicitud_pabellon;

        $ingreso_paciente->patologia_embarazo = $request->patologia_embarazo;
        $ingreso_paciente->patologia_cronica = $request->patologia_cronica;
        $ingreso_paciente->otros_antecedentes = $request->otros_antecedentes;
        $ingreso_paciente->patologia = $request->patologia;
        $ingreso_paciente->semanas_gestacion = $request->semanas_gestacion;
        $ingreso_paciente->otros_antecedentes_fetal = $request->otros_antecedentes_fetal;
        // $ingreso_paciente->indidaciones_induccion = $request->indidaciones_induccion;
        // $ingreso_paciente->hora_comienzo_induccion = $request->hora_comienzo_induccion;
        // $ingreso_paciente->dilatacion = $request->dilatacion;
        // $ingreso_paciente->hora_parto = $request->hora_parto;
        // $ingreso_paciente->indicacion_control_fetal = $request->indicacion_control_fetal;

        /*$ingreso_paciente->id_paciente = $request->paciente_ialta_medica;
        $ingreso_paciente->id_profesional = $profesional->id;*/
        // $ingreso_paciente->id_lugar_atencion = $request->lugar_atencion_pabellon;

        if (!$ingreso_paciente->save()) {
            return back();
        }

        $medicamentos = json_decode($request->medicamentos_cirugia);

        for ($i = 0; $i < count($medicamentos); ++$i) {
            //dd($medicamentos);
            $detalle_receta = new DetalleReceta();
            $detalle_receta->frecuencia = $medicamentos[$i]->frecuencia;
            $detalle_receta->periodo = $medicamentos[$i]->periodo;
            $detalle_receta->comentario = $medicamentos[$i]->comentario;
            $detalle_receta->presentacion = $medicamentos[$i]->presentacion;
            $detalle_receta->dosis = $medicamentos[$i]->dosis;
            $detalle_receta->producto = $medicamentos[$i]->medicamento;
            $detalle_receta->id_ingreso_paciente = $ingreso_paciente->id;
            $detalle_receta->receta = $ingreso_paciente->id;
            $detalle_receta->estado = 1;

            if (!$detalle_receta->save()) {
                return 'error';
            }
        }
        $examenes = json_decode($request->examenes_cirugia);

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
                $examen->id_ingreso_paciente = $ingreso_paciente->id;
                // $examen->id_ficha_atencion = $ficha->id;
                // $examen->id_paciente = $id_paciente;

                if (!$examen->save()) {
                    return 'error';
                }
            }
        }

        $mensaje = 'Se ha agregado ingreso de paciente de forma exitosa';

        return redirect()->back()->with('mensaje', $mensaje);
    }

    public function actualizar_ingreso_paciente_cesarea(Request $request)
    {
        // dd($request->all());
        //$id_solicitud_pabellon = $request->id_solicitud_pabellon;
        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();

        $ingreso_paciente = IngresoPacienteCirugia::findOrFail($request->id_ingreso_paciente);

        $ingreso_paciente->anamnesis = $request->anamnesis;
        $ingreso_paciente->antecedentes_examenes_fisicos = $request->antecedentes_examenes_fisicos;
        $ingreso_paciente->hipotesis_diagnostica = $request->hipotesis_diagnostica;
        $ingreso_paciente->diagnostico_cie10 = $request->diagnostico_cie10;
        $ingreso_paciente->indicaciones_ingreso = $request->indicaciones_ingreso;
        $ingreso_paciente->hora_operacion = $request->hora_operacion;
        $ingreso_paciente->hospitalizar_en = $request->hospitalizar_en;
        $ingreso_paciente->tipo_sala = $request->tipo_sala;
        $ingreso_paciente->id_solicitud_pabellon = $request->id_solicitud_pabellon;

        $ingreso_paciente->patologia_embarazo = $request->patologia_embarazo;
        $ingreso_paciente->patologia_cronica = $request->patologia_cronica;
        $ingreso_paciente->otros_antecedentes = $request->otros_antecedentes;
        $ingreso_paciente->patologia = $request->patologia;
        $ingreso_paciente->semanas_gestacion = $request->semanas_gestacion;
        $ingreso_paciente->otros_antecedentes_fetal = $request->otros_antecedentes_fetal;
        // $ingreso_paciente->indidaciones_induccion = $request->indidaciones_induccion;
        // $ingreso_paciente->hora_comienzo_induccion = $request->hora_comienzo_induccion;
        // $ingreso_paciente->dilatacion = $request->dilatacion;
        // $ingreso_paciente->hora_parto = $request->hora_parto;
        // $ingreso_paciente->indicacion_control_fetal = $request->indicacion_control_fetal;

        /*$ingreso_paciente->id_paciente = $request->paciente_ialta_medica;
        $ingreso_paciente->id_profesional = $profesional->id;*/
        // $ingreso_paciente->id_lugar_atencion = $request->lugar_atencion_pabellon;

        if (!$ingreso_paciente->save()) {
            return back();
        }

        $medicamentos = json_decode($request->medicamentos_cirugia);

        for ($i = 0; $i < count($medicamentos); ++$i) {
            //dd($medicamentos);
            $detalle_receta = new DetalleReceta();
            $detalle_receta->frecuencia = $medicamentos[$i]->frecuencia;
            $detalle_receta->periodo = $medicamentos[$i]->periodo;
            $detalle_receta->comentario = $medicamentos[$i]->comentario;
            $detalle_receta->presentacion = $medicamentos[$i]->presentacion;
            $detalle_receta->dosis = $medicamentos[$i]->dosis;
            $detalle_receta->producto = $medicamentos[$i]->medicamento;
            $detalle_receta->id_ingreso_paciente = $ingreso_paciente->id;
            $detalle_receta->receta = $ingreso_paciente->id;
            $detalle_receta->estado = 1;

            if (!$detalle_receta->save()) {
                return 'error';
            }
        }
        $examenes = json_decode($request->examenes_cirugia);

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
                $examen->id_ingreso_paciente = $ingreso_paciente->id;
                // $examen->id_ficha_atencion = $ficha->id;
                // $examen->id_paciente = $id_paciente;

                if (!$examen->save()) {
                    return 'error';
                }
            }
        }
        $mensaje = 'Se ha agregado ingreso de paciente de forma exitosa';

        return redirect()->back()->with('mensaje', $mensaje);
    }

    public function protocolo_cesarea(Request $request)
    {
        $id_solicitud_pabellon = $request->id;
        $solicitud_pabellon = SolicitudPabellonQuirurgico::where('id', $request->id)->first();
        $lugar_atencion = LugarAtencion::where('id', $solicitud_pabellon->id_lugar_atencion)->first();
        $protocolo = ProtocoloOperatorioCirugia::where('id_solicitud_pabellon', $id_solicitud_pabellon)->first();
        $examenMedico = ExamenMedico::where('cod_parent', 0)->get();
        if ($protocolo != null) {
            $solicitud_pabellon->semanas_gestacion = $protocolo->semanas_gestacion;
            $medicamentos_protocolo = DetalleReceta::where('id_protocolo', $protocolo->id)->get();
            $examenes_protocolo = ExamenPPF::where('id_protocolo', $protocolo->id)->get();
            $biopsia = Biopsia::where('id_protocolo', $protocolo->id)->first();
        }




        $ficha_neonatologica = FichaNeonatologia::where('id_solicitud_pabellon', $id_solicitud_pabellon)->first();


        // dd($medicamentos_protocolo);


        $paciente = Paciente::where('id', $solicitud_pabellon->id_paciente)->first();
        //$protocolo = IngresoPacienteCirugia::where('id_solicitud_pabellon', $id_solicitud_pabellon)->first();

        if ($protocolo != null) {
            return view('app.cirugia.secciones_cesarea.protocolo_parto')->with([
                'id_solicitud_pabellon' => $id_solicitud_pabellon,
                'paciente' => $paciente,
                'lugar_atencion' => $lugar_atencion,
                'protocolo' => $protocolo,
                'examenMedico' => $examenMedico,
                'solicitud_pabellon' => $solicitud_pabellon,
                'ficha_neonatologica' => $ficha_neonatologica,
                'medicamentos_protocolo' => $medicamentos_protocolo,
                'examenes_protocolo' => $examenes_protocolo,
                'biopsia' => $biopsia,
            ]);
        } else {
            return view('app.cirugia.secciones_cesarea.protocolo_parto')->with([
                'id_solicitud_pabellon' => $id_solicitud_pabellon,
                'paciente' => $paciente,
                'lugar_atencion' => $lugar_atencion,
                'protocolo' => $protocolo,
                'examenMedico' => $examenMedico,
                'solicitud_pabellon' => $solicitud_pabellon,
                'ficha_neonatologica' => $ficha_neonatologica,

            ]);
        }
    }

    public function registrar_protocolo_cesarea(Request $request)
    {
        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();


        $protocolo_operatorio = new ProtocoloOperatorioCirugia();

        $protocolo_operatorio->nro_pabellon = $request->nro_pabellon_protocolo_operatorio;
        $protocolo_operatorio->inicio_operacion = $request->inicio_operacion_protocolo_operatorio;
        $protocolo_operatorio->fin_operacion = $request->fin_operacion_protocolo_operatorio;

        $protocolo_operatorio->diagnostico_preoperatorio = $request->diag_preoperatorio_protocolo_operatorio;
        $protocolo_operatorio->diagnostico_postoperatorio = $request->diag_postoperatorio_protocolo_operatorio;
        $protocolo_operatorio->codigo_cirugia = $request->codigo_cirugia_protocolo_operatorio;
        $protocolo_operatorio->anestesia = $request->anestesia_protocolo_operatorio;

        // $protocolo_operatorio->semanas_gestacion = $request->semanas_gestacion;
        // $protocolo_operatorio->tipo_embarazo = $request->tipo_embarazo;
        // $protocolo_operatorio->sufrimiento_fetal = $request->sufrimiento_fetal;
        // $protocolo_operatorio->induccion_parto = $request->induccion_parto;
        // $protocolo_operatorio->presentacion_fetal = $request->presentacion_fetal;
        // $protocolo_operatorio->anestesia = $request->anestesia;


        $protocolo_operatorio->cirujano = $request->nombre_cirujano;
        $protocolo_operatorio->ayudantes = $request->ayudantes_cirujano;
        $protocolo_operatorio->anestesistas_ayudantes_anestesia = $request->anestesista;
        $protocolo_operatorio->arsenaleria = $request->arsenaleria;
        $protocolo_operatorio->neonatologo = $request->neonatologo;
        $protocolo_operatorio->enfermero = $request->enfermero;

        $protocolo_operatorio->biopsia_rapida = $request->biopsia_rapida_protocolo_operatorio;
        $protocolo_operatorio->biopsia_diferida = $request->biopsia_diferida_protocolo_operatorio;
        $protocolo_operatorio->biopsia_nro_muestras = $request->biopsia_nro_muestra_protocolo_operatorio;
        $protocolo_operatorio->biopsia_patologo = $request->biopsia_patologo_protocolo_operatorio;
        $protocolo_operatorio->nombre_operacion = $request->nombre_operacion_protocolo_operatorio;
        $protocolo_operatorio->material_hemostasia = $request->material_hemostasia_protocolo_operatorio;
        $protocolo_operatorio->material_cierre = $request->material_cierre_protocolo_operatorio;
        $protocolo_operatorio->otros_implantes = $request->otros_materiales_protocolo_operatorio;
        $protocolo_operatorio->descripcion_cirugia = $request->descripcion_cirugia_protocolo_operatorio;

        // $protocolo_operatorio->presentacion_tipo_parto = $request->presentacion_tipo_parto;
        // $protocolo_operatorio->placenta = $request->placenta;
        // $protocolo_operatorio->recien_nacido = $request->recien_nacido;
        // $protocolo_operatorio->episiotomia = $request->episiotomia;
        // $protocolo_operatorio->material_cierre = $request->material_cierre;
        // $protocolo_operatorio->incidencias_parto = $request->incidencias_parto;


        $protocolo_operatorio->farmacos = $request->farmacos;
        $protocolo_operatorio->pulso_presion_arterial = $request->pulso_presion_protocolo_operatorio;
        $protocolo_operatorio->incidentes = $request->incidentes_protocolo_operatorio;
        $protocolo_operatorio->recuperacion_anestesia = $request->recuperacion_anestesia_protocolo_operatorio;
        $protocolo_operatorio->descripcion_anestesia = $request->descripcion_anestesia_protocolo_operatorio;
        $protocolo_operatorio->incidencias = $request->descripcion_incidencia_protocolo_operatorio;
        $protocolo_operatorio->destino_paciente = $request->destino_protocolo_operatorio;
        $protocolo_operatorio->indicaciones_postoperacion = $request->indicaciones_postoperacion_protocolo_operatorio;

        // $protocolo_operatorio->id_paciente = $request->paciente_protocolo_operatorio;
        // $protocolo_operatorio->id_profesional = $profesional->id;
        // $protocolo_operatorio->id_ficha_atencion = $request->;
        // $protocolo_operatorio->id_lugar_atencion = $request->lugar_atencion_protocolo_operatorio;
        $protocolo_operatorio->id_solicitud_pabellon = $request->id_solicitud_pabellon;
        if (!$protocolo_operatorio->save()) {
            return back();
        }

        $medicamentos = json_decode($request->medicamentos_cirugia);

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
                $detalle_receta->id_protocolo = $protocolo_operatorio->id;
                $detalle_receta->receta = $protocolo_operatorio->id;
                $detalle_receta->estado = 1;

                if (!$detalle_receta->save()) {
                    return 'error';
                }
            }
        }
        $examenes = json_decode($request->examenes_cirugia);

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
                $examen->id_protocolo = $protocolo_operatorio->id;
                // $examen->id_ficha_atencion = $ficha->id;
                // $examen->id_paciente = $id_paciente;

                if (!$examen->save()) {
                    return 'error';
                }
            }
        }


        $mensaje = 'Se ha agregado Protocolo operatorio de forma exitosa';

        return redirect()->back()->with('mensaje', $mensaje);
    }

    public function actualizar_protocolo_cesarea(Request $request)
    {
        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();

        $protocolo_operatorio = ProtocoloOperatorioCirugia::FindOrFail($request->id_protocolo);

        $protocolo_operatorio->nro_pabellon = $request->nro_pabellon_protocolo_operatorio;
        $protocolo_operatorio->inicio_operacion = $request->inicio_operacion_protocolo_operatorio;
        $protocolo_operatorio->fin_operacion = $request->fin_operacion_protocolo_operatorio;

        $protocolo_operatorio->diagnostico_preoperatorio = $request->diag_preoperatorio_protocolo_operatorio;
        $protocolo_operatorio->diagnostico_postoperatorio = $request->diag_postoperatorio_protocolo_operatorio;
        $protocolo_operatorio->codigo_cirugia = $request->codigo_cirugia_protocolo_operatorio;
        $protocolo_operatorio->anestesia = $request->anestesia_protocolo_operatorio;

        // $protocolo_operatorio->semanas_gestacion = $request->semanas_gestacion;
        // $protocolo_operatorio->tipo_embarazo = $request->tipo_embarazo;
        // $protocolo_operatorio->sufrimiento_fetal = $request->sufrimiento_fetal;
        // $protocolo_operatorio->induccion_parto = $request->induccion_parto;
        // $protocolo_operatorio->presentacion_fetal = $request->presentacion_fetal;
        // $protocolo_operatorio->anestesia = $request->anestesia;


        $protocolo_operatorio->cirujano = $request->nombre_cirujano;
        $protocolo_operatorio->ayudantes = $request->ayudantes_cirujano;
        $protocolo_operatorio->anestesistas_ayudantes_anestesia = $request->anestesista;
        $protocolo_operatorio->arsenaleria = $request->arsenaleria;
        $protocolo_operatorio->neonatologo = $request->neonatologo;
        $protocolo_operatorio->enfermero = $request->enfermero;

        $protocolo_operatorio->biopsia_rapida = $request->biopsia_rapida_protocolo_operatorio;
        $protocolo_operatorio->biopsia_diferida = $request->biopsia_diferida_protocolo_operatorio;
        $protocolo_operatorio->biopsia_nro_muestras = $request->biopsia_nro_muestra_protocolo_operatorio;
        $protocolo_operatorio->biopsia_patologo = $request->biopsia_patologo_protocolo_operatorio;
        $protocolo_operatorio->nombre_operacion = $request->nombre_operacion_protocolo_operatorio;
        $protocolo_operatorio->material_hemostasia = $request->material_hemostasia_protocolo_operatorio;
        $protocolo_operatorio->material_cierre = $request->material_cierre_protocolo_operatorio;
        $protocolo_operatorio->otros_implantes = $request->otros_materiales_protocolo_operatorio;
        $protocolo_operatorio->descripcion_cirugia = $request->descripcion_cirugia_protocolo_operatorio;

        // $protocolo_operatorio->presentacion_tipo_parto = $request->presentacion_tipo_parto;
        // $protocolo_operatorio->placenta = $request->placenta;
        // $protocolo_operatorio->recien_nacido = $request->recien_nacido;
        // $protocolo_operatorio->episiotomia = $request->episiotomia;
        // $protocolo_operatorio->material_cierre = $request->material_cierre;
        // $protocolo_operatorio->incidencias_parto = $request->incidencias_parto;


        $protocolo_operatorio->farmacos = $request->farmacos;
        $protocolo_operatorio->pulso_presion_arterial = $request->pulso_presion_protocolo_operatorio;
        $protocolo_operatorio->incidentes = $request->incidentes_protocolo_operatorio;
        $protocolo_operatorio->recuperacion_anestesia = $request->recuperacion_anestesia_protocolo_operatorio;
        $protocolo_operatorio->descripcion_anestesia = $request->descripcion_anestesia_protocolo_operatorio;
        $protocolo_operatorio->incidencias = $request->descripcion_incidencia_protocolo_operatorio;
        $protocolo_operatorio->destino_paciente = $request->destino_protocolo_operatorio;
        $protocolo_operatorio->indicaciones_postoperacion = $request->indicaciones_postoperacion_protocolo_operatorio;

        // $protocolo_operatorio->id_paciente = $request->paciente_protocolo_operatorio;
        // $protocolo_operatorio->id_profesional = $profesional->id;
        // $protocolo_operatorio->id_ficha_atencion = $request->;
        // $protocolo_operatorio->id_lugar_atencion = $request->lugar_atencion_protocolo_operatorio;
        $protocolo_operatorio->id_solicitud_pabellon = $request->id_solicitud_pabellon;
        if (!$protocolo_operatorio->save()) {
            return back();
        }

        $medicamentos = json_decode($request->medicamentos_cirugia);

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
                $detalle_receta->id_protocolo = $protocolo_operatorio->id;
                $detalle_receta->receta = $protocolo_operatorio->id;
                $detalle_receta->estado = 1;

                if (!$detalle_receta->save()) {
                    return 'error';
                }
            }
        }

        $examenes = json_decode($request->examenes_cirugia);

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
                $examen->id_protocolo = $protocolo_operatorio->id;
                // $examen->id_ficha_atencion = $ficha->id;
                // $examen->id_paciente = $id_paciente;

                if (!$examen->save()) {
                    return 'error';
                }
            }
        }
        $mensaje = 'Se ha agregado Protocolo operatorio de forma exitosa';

        return redirect()->back()->with('mensaje', $mensaje);
    }

    public function registrar_biopsia_cesarea(Request $request)
    {

        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();


        if ($request->biopsia_rapida = 'on') {
            $biopsia_rapida = 1;
        } else {
            $biopsia_rapida = 0;
        }

        $biopsia  = new Biopsia();

        $biopsia->laboratorio_patologia = $request->laboratorio_patologia;
        $biopsia->diagnostico_pre = $request->diagnostico_pre;
        $biopsia->diagnostico_post = $request->diagnostico_post;
        $biopsia->organo_localizacion = $request->organo_localizacion;
        $biopsia->enfermedades_asociadas = $request->enfermedades_asociadas;
        $biopsia->informacion_adicional = $request->informacion_adicional;
        $biopsia->biopsia_rapida = $biopsia_rapida;
        //$biopsia->id_paciente = $request->paciente_biopsia;
        $biopsia->id_profesional = $profesional->id;
        $biopsia->id_protocolo = $request->id_protocolo;

        if (!$biopsia->save()) {
            return 'error';
        }

        $mensaje = 'Se ha agregado Biopsia de forma exitosa';

        return redirect()->back()->with('mensaje', $mensaje);
    }

    public function actualizar_biopsia_cesarea(Request $request)
    {


        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();


        if ($request->biopsia_rapida = 'on') {
            $biopsia_rapida = 1;
        } else {
            $biopsia_rapida = 0;
        }

        $biopsia  = Biopsia::FindOrFail($request->id_biopsia);

        $biopsia->laboratorio_patologia = $request->laboratorio_patologia;
        $biopsia->diagnostico_pre = $request->diagnostico_pre;
        $biopsia->diagnostico_post = $request->diagnostico_post;
        $biopsia->organo_localizacion = $request->organo_localizacion;
        $biopsia->enfermedades_asociadas = $request->enfermedades_asociadas;
        $biopsia->informacion_adicional = $request->informacion_adicional;
        $biopsia->biopsia_rapida = $biopsia_rapida;
        //$biopsia->id_paciente = $request->paciente_biopsia;
        $biopsia->id_profesional = $profesional->id;
        $biopsia->id_protocolo = $request->id_protocolo;

        if (!$biopsia->save()) {
            return 'error';
        }

        $mensaje = 'Se ha agregado Biopsia de forma exitosa';

        return redirect()->back()->with('mensaje', $mensaje);
    }

    public function recuperacion_cesarea(Request $request)
    {
        $id_solicitud_pabellon = $request->id;
        $solicitud_pabellon = SolicitudPabellonQuirurgico::where('id', $request->id)->first();
        $lugar_atencion = LugarAtencion::where('id', $solicitud_pabellon->id_lugar_atencion)->first();
        $recuperacion = RecuperacionCirugia::where('id_solicitud_pabellon', $id_solicitud_pabellon)->first();
        $recuperaciones = RecuperacionCirugia::where('id_solicitud_pabellon', $request->id)->get();
        $paciente = Paciente::where('id', $solicitud_pabellon->id_paciente)->first();
        $examenMedico = ExamenMedico::where('cod_parent', 0)->get();
        $regiones = Region::all();
        $ciudades = Ciudad::where('id_region', $paciente->Direccion()->first()->Ciudad()->first()->id_region)->get();
        //$protocolo = IngresoPacienteCirugia::where('id_solicitud_pabellon', $id_solicitud_pabellon)->first();


        if (isset($recuperaciones)) {
            foreach ($recuperaciones as $r) {
                $medicamentos = DetalleReceta::where('id_recuperacion', $r->id)->get();
                $r->medicamentos = $medicamentos;
            }
        }

        if (isset($recuperaciones)) {
            foreach ($recuperaciones as $r) {
                $examenes = ExamenPPF::where('id_recuperacion', $r->id)->get();
                $r->examenes = $examenes;
            }
        }
        if (isset($recuperaciones)) {
            foreach ($recuperaciones as $r) {
                $interconsultas = Interconsulta::where('id_recuperacion', $r->id)->get();
                $r->interconsultas = $interconsultas;
            }
        }
        // dd($recuperaciones);

        //dd($recuperaciones);
        //$medicamentos_recuperacion = DetalleReceta::where('id_recuperacion', $recuperacion->id)->get();
        // $examenes_protocolo = ExamenPPF::where('id_protocolo', $protocolo->id)->get();

        return view('app.cirugia.secciones_cesarea.recuperacion_parto')->with([
            'id_solicitud_pabellon' => $id_solicitud_pabellon,
            'paciente' => $paciente,
            'lugar_atencion' => $lugar_atencion,
            'recuperacion' => $recuperacion,
            'recuperaciones' => $recuperaciones,
            'examenMedico' => $examenMedico,
            'regiones' => $regiones,
            'ciudades' => $ciudades,
            //'medicamentos_recuperacion' => $medicamentos_recuperacion,
        ]);
    }

    public function registrar_recuperacion_cesarea(Request $request)
    {

        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();


        $recuperacion = new RecuperacionCirugia();
        $recuperacion->evolucion = $request->madre;
        $recuperacion->recien_nacido = $request->recien_nacido;

        // $protocolo_operatorio->id_paciente = $request->paciente_protocolo_operatorio;
        $recuperacion->id_profesional = $profesional->id;
        // $protocolo_operatorio->id_ficha_atencion = $request->;
        // $protocolo_operatorio->id_lugar_atencion = $request->lugar_atencion_protocolo_operatorio;
        $recuperacion->id_solicitud_pabellon = $request->id_solicitud_pabellon;

        // $recuperaciones = RecuperacionCirugia::where('id_solicitud_pabellon', $request->id_solicitud_pabellon)->get();

        if (!$recuperacion->save()) {
            return back();
        }


        $medicamentos = json_decode($request->medicamentos_cirugia);


        for ($i = 0; $i < count($medicamentos); ++$i) {
            //dd($medicamentos);
            $detalle_receta = new DetalleReceta();
            $detalle_receta->frecuencia = $medicamentos[$i]->frecuencia;
            $detalle_receta->periodo = $medicamentos[$i]->periodo;
            $detalle_receta->comentario = $medicamentos[$i]->comentario;
            $detalle_receta->presentacion = $medicamentos[$i]->presentacion;
            $detalle_receta->dosis = $medicamentos[$i]->dosis;
            $detalle_receta->producto = $medicamentos[$i]->medicamento;
            $detalle_receta->id_recuperacion = $recuperacion->id;
            $detalle_receta->receta = $recuperacion->id;
            $detalle_receta->estado = 1;

            if (!$detalle_receta->save()) {
                return 'error';
            }
        }

        $examenes = json_decode($request->examenes_cirugia);

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
                $examen->id_recuperacion = $recuperacion->id;
                // $examen->id_ficha_atencion = $ficha->id;
                // $examen->id_paciente = $id_paciente;

                if (!$examen->save()) {
                    return 'error';
                }
            }
        }


        $interconsultas = json_decode($request->interconsultas_cirugia);

        if (!$interconsultas == null) {
            for ($i = 0; $i < count($interconsultas); ++$i) {
                $interconsulta = new Interconsulta();

                $interconsulta->fecha_solicitud = \Carbon\Carbon::now()->format('Y/m/d');
                $interconsulta->nombre_esp = $interconsultas[$i]->nombre_especialista_interconsulta;
                $interconsulta->hipotesis = $interconsultas[$i]->hipotesis_interconsulta;
                $interconsulta->comentarios = $interconsultas[$i]->comentarios_interconsulta;

                //$examen->id_profesional = $profesional->id;
                $interconsulta->id_recuperacion = $recuperacion->id;
                // $examen->id_ficha_atencion = $ficha->id;
                // $examen->id_paciente = $id_paciente;

                if (!$interconsulta->save()) {
                    return 'error';
                }
            }
        }

        $neonatologia = json_decode($request->evolucion_neonatologia);


        if (!$neonatologia == null) {

            $evolucion_neonatologia = new EvolucionNeonatologia();
            $evolucion_neonatologia->brazalete = $neonatologia[0]->brazalete;
            $evolucion_neonatologia->temperatura_rectal = $neonatologia[0]->temperatura_rectal;
            $evolucion_neonatologia->peso = $neonatologia[0]->peso;
            $evolucion_neonatologia->evacuaciones = $neonatologia[0]->evacuaciones;
            $evolucion_neonatologia->alerta = $neonatologia[0]->alerta;
            $evolucion_neonatologia->piel = $neonatologia[0]->piel;
            $evolucion_neonatologia->cuerpo = $neonatologia[0]->cuerpo;
            $evolucion_neonatologia->cordon = $neonatologia[0]->cordon;
            $evolucion_neonatologia->succion = $neonatologia[0]->succion;
            $evolucion_neonatologia->actitud = $neonatologia[0]->actitud;
            $evolucion_neonatologia->otra_alimentacion = $neonatologia[0]->otra_alimentacion;
            $evolucion_neonatologia->indicacion_madre = $neonatologia[0]->indicacion_madre;
            $evolucion_neonatologia->indicacion_enfermera = $neonatologia[0]->indicacion_enfermera;
            $evolucion_neonatologia->indicacion_otra = $neonatologia[0]->indicacion_otra;
            $evolucion_neonatologia->frecuencia_respiratoria = $neonatologia[0]->frecuencia_respiratoria;
            $evolucion_neonatologia->frecuencia_cardiaca = $neonatologia[0]->frecuencia_cardiaca;
            $evolucion_neonatologia->temperatura_axilar = $neonatologia[0]->temperatura_axilar;

            $evolucion_neonatologia->id_recuperacion = $recuperacion->id;

            if (!$evolucion_neonatologia->save()) {
                return 'error';
            }
        }

        $mensaje = 'Se ha agregado recuperacion de forma exitosa';

        return redirect()->back()->with(['mensaje' => $mensaje,]);
    }

    public function sala_parto_cesarea(Request $request)
    {
        $id_solicitud_pabellon = $request->id;

        $solicitud_pabellon = SolicitudPabellonQuirurgico::where('id', $request->id)->first();
        $lugar_atencion = LugarAtencion::where('id', $solicitud_pabellon->id_lugar_atencion)->first();
        $sala_hospitalizacion = SalaCirugia::where('id_solicitud_pabellon', $id_solicitud_pabellon)->first();
        $sala_hospitalizaciones = SalaCirugia::where('id_solicitud_pabellon', $request->id)->get();
        $paciente = Paciente::where('id', $solicitud_pabellon->id_paciente)->first();
        $protocolo = ProtocoloOperatorioCirugia::where('id_solicitud_pabellon', $id_solicitud_pabellon)->first();
        $solicitud_pabellon->semanas_gestacion = $protocolo->semanas_gestacion;
        $ficha_neonatologica = FichaNeonatologia::where('id_solicitud_pabellon', $id_solicitud_pabellon)->first();
        $examenMedico = ExamenMedico::where('cod_parent', 0)->get();
        $regiones = Region::all();
        $ciudades = Ciudad::where('id_region', $paciente->Direccion()->first()->Ciudad()->first()->id_region)->get();

        if (isset($sala_hospitalizaciones)) {
            foreach ($sala_hospitalizaciones as $sh) {
                $medicamentos = DetalleReceta::where('id_sala', $sh->id)->get();
                $sh->medicamentos = $medicamentos;
            }
        }

        if (isset($sala_hospitalizaciones)) {
            foreach ($sala_hospitalizaciones as $sh) {
                $examenes = ExamenPPF::where('id_sala', $sh->id)->get();
                $sh->examenes = $examenes;
            }
        }
        if (isset($sala_hospitalizaciones)) {
            foreach ($sala_hospitalizaciones as $sh) {
                $interconsultas = Interconsulta::where('id_sala', $sh->id)->get();
                $sh->interconsultas = $interconsultas;
            }
        }

        // dd($sala_hospitalizaciones);


        return view('app.cirugia.secciones_cesarea.sala_parto')->with([
            'id_solicitud_pabellon' => $id_solicitud_pabellon,
            'paciente' => $paciente,
            'lugar_atencion' => $lugar_atencion,
            'sala_hospitalizacion' => $sala_hospitalizacion,
            'sala_hospitalizaciones' => $sala_hospitalizaciones,
            'solicitud_pabellon' => $solicitud_pabellon,
            'ficha_neonatologica' => $ficha_neonatologica,
            'examenMedico' => $examenMedico,
            'regiones' => $regiones,
            'ciudades' => $ciudades,
        ]);
    }

    public function registrar_sala_parto_cesarea(Request $request)
    {

        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();


        $sala_hospitalizacion = new SalaCirugia();
        $sala_hospitalizacion->evolucion = $request->madre;
        $sala_hospitalizacion->recien_nacido = $request->recien_nacido;
        $sala_hospitalizacion->resumen_evolucion = $request->resumen_evolucion1;

        // $protocolo_operatorio->id_paciente = $request->paciente_protocolo_operatorio;
        $sala_hospitalizacion->id_profesional = $profesional->id;
        // $protocolo_operatorio->id_ficha_atencion = $request->;
        // $protocolo_operatorio->id_lugar_atencion = $request->lugar_atencion_protocolo_operatorio;
        $sala_hospitalizacion->id_solicitud_pabellon = $request->id_solicitud_pabellon;

        if (!$sala_hospitalizacion->save()) {
            return back();
        }


        // dd($request->all());
        $medicamentos = json_decode($request->medicamentos_cirugia);

        for ($i = 0; $i < count($medicamentos); ++$i) {
            //dd($medicamentos);
            $detalle_receta = new DetalleReceta();
            $detalle_receta->frecuencia = $medicamentos[$i]->frecuencia;
            $detalle_receta->periodo = $medicamentos[$i]->periodo;
            $detalle_receta->comentario = $medicamentos[$i]->comentario;
            $detalle_receta->presentacion = $medicamentos[$i]->presentacion;
            $detalle_receta->dosis = $medicamentos[$i]->dosis;
            $detalle_receta->producto = $medicamentos[$i]->medicamento;
            $detalle_receta->id_sala = $sala_hospitalizacion->id;
            $detalle_receta->receta = $sala_hospitalizacion->id;
            $detalle_receta->estado = 1;

            if (!$detalle_receta->save()) {
                return 'error';
            }
        }

        $examenes = json_decode($request->examenes_cirugia);

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
                $examen->id_sala = $sala_hospitalizacion->id;
                // $examen->id_ficha_atencion = $ficha->id;
                // $examen->id_paciente = $id_paciente;

                if (!$examen->save()) {
                    return 'error';
                }
            }
        }


        $interconsultas = json_decode($request->interconsultas_cirugia);

        if (!$interconsultas == null) {
            for ($i = 0; $i < count($interconsultas); ++$i) {
                $interconsulta = new Interconsulta();

                $interconsulta->fecha_solicitud = \Carbon\Carbon::now()->format('Y/m/d');
                $interconsulta->nombre_esp = $interconsultas[$i]->nombre_especialista_interconsulta;
                $interconsulta->hipotesis = $interconsultas[$i]->hipotesis_interconsulta;
                $interconsulta->comentarios = $interconsultas[$i]->comentarios_interconsulta;

                //$examen->id_profesional = $profesional->id;
                $interconsulta->id_sala = $sala_hospitalizacion->id;
                // $examen->id_ficha_atencion = $ficha->id;
                // $examen->id_paciente = $id_paciente;

                if (!$interconsulta->save()) {
                    return 'error';
                }
            }
        }

        $neonatologia = json_decode($request->evolucion_neonatologia);


        if (!$neonatologia == null) {

            $evolucion_neonatologia = new EvolucionNeonatologia();
            $evolucion_neonatologia->brazalete = $neonatologia[0]->brazalete;
            $evolucion_neonatologia->temperatura_rectal = $neonatologia[0]->temperatura_rectal;
            $evolucion_neonatologia->peso = $neonatologia[0]->peso;
            $evolucion_neonatologia->evacuaciones = $neonatologia[0]->evacuaciones;
            $evolucion_neonatologia->alerta = $neonatologia[0]->alerta;
            $evolucion_neonatologia->piel = $neonatologia[0]->piel;
            $evolucion_neonatologia->cuerpo = $neonatologia[0]->cuerpo;
            $evolucion_neonatologia->cordon = $neonatologia[0]->cordon;
            $evolucion_neonatologia->succion = $neonatologia[0]->succion;
            $evolucion_neonatologia->actitud = $neonatologia[0]->actitud;
            $evolucion_neonatologia->otra_alimentacion = $neonatologia[0]->otra_alimentacion;
            $evolucion_neonatologia->indicacion_madre = $neonatologia[0]->indicacion_madre;
            $evolucion_neonatologia->indicacion_enfermera = $neonatologia[0]->indicacion_enfermera;
            $evolucion_neonatologia->indicacion_otra = $neonatologia[0]->indicacion_otra;
            $evolucion_neonatologia->frecuencia_respiratoria = $neonatologia[0]->frecuencia_respiratoria;
            $evolucion_neonatologia->frecuencia_cardiaca = $neonatologia[0]->frecuencia_cardiaca;
            $evolucion_neonatologia->temperatura_axilar = $neonatologia[0]->temperatura_axilar;

            $evolucion_neonatologia->id_sala = $sala_hospitalizacion->id;

            if (!$evolucion_neonatologia->save()) {
                return 'error';
            }
        }

        $mensaje = 'Se ha agregado Registro de Evolucion de Sala Parto operatorio de forma exitosa';

        return redirect()->back()->with(['mensaje' => $mensaje,]);
    }

    public function epicrisis_alta_medica_cesarea(Request $request)
    {
        $id_solicitud_pabellon = $request->id;
        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();

        $solicitud_pabellon = SolicitudPabellonQuirurgico::where('id', $request->id)->first();
        $lugar_atencion = LugarAtencion::where('id', $solicitud_pabellon->id_lugar_atencion)->first();
        $epicrisis_alta_medica = EpicrisisCarnetCirugia::where('id_solicitud_pabellon', $id_solicitud_pabellon)->first();
        $paciente = Paciente::where('id', $solicitud_pabellon->id_paciente)->first();
        //$protocolo = IngresoPacienteCirugia::where('id_solicitud_pabellon', $id_solicitud_pabellon)->first();
        $protocolo = ProtocoloOperatorioCirugia::where('id_solicitud_pabellon', $id_solicitud_pabellon)->first();

        if ($protocolo != null) {

            $solicitud_pabellon->semanas_gestacion = $protocolo->semanas_gestacion;
        } else {
            return Redirect::back()->withErrors(['mensaje' => 'No se encontro registro de protocolo operatorio, no puede realizar la epicrisis de alta medica']);
        }

        $ficha_neonatologica = FichaNeonatologia::where('id_solicitud_pabellon', $id_solicitud_pabellon)->first();

        // dd($epicrisis_alta_medica);

        return view('app.cirugia.secciones_cesarea.epicrisis_carnet')->with([
            'id_solicitud_pabellon' => $id_solicitud_pabellon,
            'paciente' => $paciente,
            'lugar_atencion' => $lugar_atencion,
            'epicrisis_alta_medica' => $epicrisis_alta_medica,
            'profesional' => $profesional,
            'solicitud_pabellon' => $solicitud_pabellon,
            'ficha_neonatologica' => $ficha_neonatologica

        ]);
    }

    public function registrar_epicrisis_alta_medica_cesarea(Request $request)
    {
        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();

        $epicrisis_alta_medica = new EpicrisisCarnetCirugia();

        $epicrisis_alta_medica->inicio_hospitalizacion = $request->inicio_hospitalizacion;
        $epicrisis_alta_medica->fin_hospitalizacion = $request->fin_hospitalizacion;
        $epicrisis_alta_medica->diagnostico_ingreso = $request->diagnostico_ingreso;
        $epicrisis_alta_medica->diagnostico_alta = $request->diagnostico_alta;
        $epicrisis_alta_medica->tratamientos_cirugias = $request->tratamientos_cirugias;
        $epicrisis_alta_medica->procedimientos_quirurgicos_cirugia = $request->procedimientos_quirurgicos_cirugia;
        $epicrisis_alta_medica->otros_tratamientos_procedimientos = $request->otros_tratamientos_procedimientos;

        $epicrisis_alta_medica->herida_operatoria = $request->herida_operatoria;
        $epicrisis_alta_medica->pezones = $request->pezones;
        $epicrisis_alta_medica->lactancia = $request->lactancia;
        $epicrisis_alta_medica->fecha_alta = $request->fecha_alta;
        $epicrisis_alta_medica->condicion_salud = $request->condicion_salud;
        $epicrisis_alta_medica->fecha_control = $request->fecha_control;
        $epicrisis_alta_medica->indicaciones_alta = $request->indicaciones_alta;

        //$epicrisis_alta_medica->id_paciente = $request->paciente_ingreso_epicrisis_alta_medica;
        $epicrisis_alta_medica->id_profesional = $profesional->id;
        $epicrisis_alta_medica->id_lugar_atencion = $request->id_lugar_atencion;
        $epicrisis_alta_medica->id_solicitud_pabellon = $request->id_solicitud_pabellon;

        if (!$epicrisis_alta_medica->save()) {
            return back();
        }
        $mensaje = 'Se ha agregado ingreso de paciente de forma exitosa';

        return redirect()->back()->with('mensaje', $mensaje);
    }

    public function actualizar_epicrisis_alta_medica_cesarea(Request $request)
    {
        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();

        $epicrisis_alta_medica = EpicrisisCarnetCirugia::FindOrFail($request->id_epicrisis_alta_medica);

        $epicrisis_alta_medica->inicio_hospitalizacion = $request->inicio_hospitalizacion;
        $epicrisis_alta_medica->fin_hospitalizacion = $request->fin_hospitalizacion;
        $epicrisis_alta_medica->diagnostico_ingreso = $request->diagnostico_ingreso;
        $epicrisis_alta_medica->diagnostico_alta = $request->diagnostico_alta;
        $epicrisis_alta_medica->tratamientos_cirugias = $request->tratamientos_cirugias;
        $epicrisis_alta_medica->procedimientos_quirurgicos_cirugia = $request->procedimientos_quirurgicos_cirugia;
        $epicrisis_alta_medica->otros_tratamientos_procedimientos = $request->otros_tratamientos_procedimientos;

        $epicrisis_alta_medica->herida_operatoria = $request->herida_operatoria;
        $epicrisis_alta_medica->pezones = $request->pezones;
        $epicrisis_alta_medica->lactancia = $request->lactancia;
        $epicrisis_alta_medica->fecha_alta = $request->fecha_alta;
        $epicrisis_alta_medica->condicion_salud = $request->condicion_salud;
        $epicrisis_alta_medica->fecha_control = $request->fecha_control;
        $epicrisis_alta_medica->indicaciones_alta = $request->indicaciones_alta;

        //$epicrisis_alta_medica->id_paciente = $request->paciente_ingreso_epicrisis_alta_medica;
        $epicrisis_alta_medica->id_profesional = $profesional->id;
        $epicrisis_alta_medica->id_lugar_atencion = $request->id_lugar_atencion;
        $epicrisis_alta_medica->id_solicitud_pabellon = $request->id_solicitud_pabellon;

        if (!$epicrisis_alta_medica->save()) {
            return back();
        }
        $mensaje = 'Se ha actualizado epicrisis de forma exitosa';

        return redirect()->back()->with('mensaje', $mensaje);
    }

    public function index_cirugia_obstetricia()
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

        $solicitudes_pabellon_obstetrico = SolicitudPabellonQuirurgico::where('id_paciente', $paciente->id)->where('tipo_cirugia', 'parto_normal')->get();

        // dd($solicitudes_pabellon_obstetrico);
        if ($examen_radiologico == 0) {
            $examen_radiologico = 1;
        } else {
            $examen_radiologico = DB::table('examenes_radiologicos')->orderBy('id', 'desc')->first()->id + 1;
        }


        return view('app.cirugia.index_cirugia_obstetrica')->with(
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
                'lugares_atenciones' => $lugares_atenciones,
                'solicitudes_pabellon_obstetrico' => $solicitudes_pabellon_obstetrico,

            ]
        );
    }

    public function registrar_solicitud_pabellon_parto_normal(Request $request)
    {


        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();

        $solicitud_pabellon = new SolicitudPabellonQuirurgico();

        $solicitud_pabellon->tipo_cirugia = 'parto_normal';

        $solicitud_pabellon->grado_urgencia = $request->grado_urgencia_pabellon;
        $solicitud_pabellon->patalogias_cronicas = $request->patologias_cronicas;
        $solicitud_pabellon->cesareas_previas = $request->cesareas_previas;
        $solicitud_pabellon->semanas_embarazo = $request->semanas_embarazo;
        $solicitud_pabellon->evolucion = $request->evolucion;
        $solicitud_pabellon->riesgo_fetal = $request->riesgo_fetal;
        $solicitud_pabellon->riesgo_materno = $request->riesgo_materno;
        $solicitud_pabellon->patologia_embarazo = $request->patologia_embarazo;
        $solicitud_pabellon->codigo_parto = $request->codigo_parto;
        $solicitud_pabellon->anestesia = $request->anestesia;
        $solicitud_pabellon->tipo_hospital = $request->tipo_hospital;
        $solicitud_pabellon->ayudante1 = $request->ayudantes;
        $solicitud_pabellon->anestesista = $request->anestesista_pabellon;
        $solicitud_pabellon->arsenaleria = $request->arsenaleria_pabellon;
        $solicitud_pabellon->neonatologo = $request->neonatologo;
        $solicitud_pabellon->matron = $request->matron;
        $solicitud_pabellon->tipo_hospitalizacion = $request->tipo_hospitalizacion;
        $solicitud_pabellon->especialidad_1 = $request->especialidad_uno_pabellon;
        $solicitud_pabellon->comentarios = $request->comentarios_pabellon;

        $solicitud_pabellon->id_paciente = $request->paciente_parto_normal;
        $solicitud_pabellon->id_profesional = $profesional->id;
        $solicitud_pabellon->id_lugar_atencion = $request->lugar_atencion_pabellon_quirurgico;

        //$solicitud_pabellon->fecha_hora_operacion = $request->fecha_hora_pabellon;
        //$solicitud_pabellon->operacion = $request->operacion_pabellon;
        // $solicitud_pabellon->codigo_cirugia = $request->codigo_cirugia_pabellon;
        // $solicitud_pabellon->equipamiento_especial = $request->equipamiento_especial_pabellon;
        // $solicitud_pabellon->codigo_cirugia_2 = $request->codigo_cirugia_pabellon1;
        // $solicitud_pabellon->especialidad_2 = $request->especialidad_dos_pabellon;



        //$solicitud_pabellon->id_ficha_atencion = $request->;

        if (!$solicitud_pabellon->save()) {
            return back();
        }
        $mensaje = 'Se ha agregado solicitud de pabellon de forma exitosa';

        return redirect()->back()->with('mensaje', $mensaje);
    }

    public function ingreso_paciente_obstetrico(Request $request)
    {
        $id_solicitud_pabellon = $request->id;
        $ingreso_paciente = IngresoPacienteCirugia::where('id_solicitud_pabellon', $id_solicitud_pabellon)->first();
        $examenMedico = ExamenMedico::where('cod_parent', 0)->get();

        if (isset($ingreso_paciente)) {
            $medicamentos_ingreso_paciente = DetalleReceta::where('id_ingreso_paciente', $ingreso_paciente->id)->get();
            // dd($medicamentos_ingreso_paciente);
            $examenes_ingreso_paciente = ExamenPPF::where('id_ingreso_paciente', $ingreso_paciente->id)->get();
        } else {
            $medicamentos_ingreso_paciente = null;
            $examenes_ingreso_paciente = null;
        }

        // dd($ingreso_paciente);

        return view('app.cirugia.secciones_obstetricia.ingreso_paciente')->with([
            'id_solicitud_pabellon' => $id_solicitud_pabellon,
            'ingreso_paciente' => $ingreso_paciente,
            'examenMedico' => $examenMedico,
            'medicamentos_ingreso_paciente' => $medicamentos_ingreso_paciente,
            'examenes_ingreso_paciente' => $examenes_ingreso_paciente,
        ]);
    }
    public function registrar_ingreso_paciente_obstetrico(Request $request)
    {
        //$id_solicitud_pabellon = $request->id_solicitud_pabellon;
        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();

        $ingreso_paciente = new IngresoPacienteCirugia();

        $ingreso_paciente->anamnesis = $request->anamnesis;
        $ingreso_paciente->antecedentes_examenes_fisicos = $request->antecedentes_examenes_fisicos;
        $ingreso_paciente->hipotesis_diagnostica = $request->hipotesis_diagnostica;
        $ingreso_paciente->diagnostico_cie10 = $request->diagnostico_cie10;
        $ingreso_paciente->indicaciones_ingreso = $request->indicaciones_ingreso;
        $ingreso_paciente->hora_operacion = $request->hora_operacion;
        $ingreso_paciente->hospitalizar_en = $request->hospitalizar_en;
        $ingreso_paciente->tipo_sala = $request->tipo_sala;
        $ingreso_paciente->id_solicitud_pabellon = $request->id_solicitud_pabellon;

        $ingreso_paciente->patologia_embarazo = $request->patologia_embarazo;
        $ingreso_paciente->patologia_cronica = $request->patologia_cronica;
        $ingreso_paciente->otros_antecedentes = $request->otros_antecedentes;
        $ingreso_paciente->patologia = $request->patologia;
        $ingreso_paciente->semanas_gestacion = $request->semanas_gestacion;
        $ingreso_paciente->otros_antecedentes_fetal = $request->otros_antecedentes_fetal;
        $ingreso_paciente->indidaciones_induccion = $request->indidaciones_induccion;
        $ingreso_paciente->hora_comienzo_induccion = $request->hora_comienzo_induccion;
        $ingreso_paciente->dilatacion = $request->dilatacion;
        $ingreso_paciente->hora_parto = $request->hora_parto;
        $ingreso_paciente->indicacion_control_fetal = $request->indicacion_control_fetal;

        /*$ingreso_paciente->id_paciente = $request->paciente_ialta_medica;
        $ingreso_paciente->id_profesional = $profesional->id;*/
        // $ingreso_paciente->id_lugar_atencion = $request->lugar_atencion_pabellon;

        if (!$ingreso_paciente->save()) {
            return back();
        }
        $medicamentos = json_decode($request->medicamentos_cirugia);

        for ($i = 0; $i < count($medicamentos); ++$i) {
            //dd($medicamentos);
            $detalle_receta = new DetalleReceta();
            $detalle_receta->frecuencia = $medicamentos[$i]->frecuencia;
            $detalle_receta->periodo = $medicamentos[$i]->periodo;
            $detalle_receta->comentario = $medicamentos[$i]->comentario;
            $detalle_receta->presentacion = $medicamentos[$i]->presentacion;
            $detalle_receta->dosis = $medicamentos[$i]->dosis;
            $detalle_receta->producto = $medicamentos[$i]->medicamento;
            $detalle_receta->id_ingreso_paciente = $ingreso_paciente->id;
            $detalle_receta->receta = $ingreso_paciente->id;
            $detalle_receta->estado = 1;

            if (!$detalle_receta->save()) {
                return 'error';
            }
        }
        $examenes = json_decode($request->examenes_cirugia);

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
                $examen->id_ingreso_paciente = $ingreso_paciente->id;
                // $examen->id_ficha_atencion = $ficha->id;
                // $examen->id_paciente = $id_paciente;

                if (!$examen->save()) {
                    return 'error';
                }
            }
        }


        $mensaje = 'Se ha agregado ingreso de paciente de forma exitosa';

        return redirect()->back()->with('mensaje', $mensaje);
    }

    public function actualizar_ingreso_paciente_obstetrico(Request $request)
    {
        //$id_solicitud_pabellon = $request->id_solicitud_pabellon;
        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();

        $ingreso_paciente = IngresoPacienteCirugia::FindOrFail($request->id_ingreso_paciente);

        $ingreso_paciente->anamnesis = $request->anamnesis;
        $ingreso_paciente->antecedentes_examenes_fisicos = $request->antecedentes_examenes_fisicos;
        $ingreso_paciente->hipotesis_diagnostica = $request->hipotesis_diagnostica;
        $ingreso_paciente->diagnostico_cie10 = $request->diagnostico_cie10;
        $ingreso_paciente->indicaciones_ingreso = $request->indicaciones_ingreso;
        $ingreso_paciente->hora_operacion = $request->hora_operacion;
        $ingreso_paciente->hospitalizar_en = $request->hospitalizar_en;
        $ingreso_paciente->tipo_sala = $request->tipo_sala;
        $ingreso_paciente->id_solicitud_pabellon = $request->id_solicitud_pabellon;

        $ingreso_paciente->patologia_embarazo = $request->patologia_embarazo;
        $ingreso_paciente->patologia_cronica = $request->patologia_cronica;
        $ingreso_paciente->otros_antecedentes = $request->otros_antecedentes;
        $ingreso_paciente->patologia = $request->patologia;
        $ingreso_paciente->semanas_gestacion = $request->semanas_gestacion;
        $ingreso_paciente->otros_antecedentes_fetal = $request->otros_antecedentes_fetal;
        $ingreso_paciente->indidaciones_induccion = $request->indidaciones_induccion;
        $ingreso_paciente->hora_comienzo_induccion = $request->hora_comienzo_induccion;
        $ingreso_paciente->dilatacion = $request->dilatacion;
        $ingreso_paciente->hora_parto = $request->hora_parto;
        $ingreso_paciente->indicacion_control_fetal = $request->indicacion_control_fetal;

        /*$ingreso_paciente->id_paciente = $request->paciente_ialta_medica;
        $ingreso_paciente->id_profesional = $profesional->id;*/
        // $ingreso_paciente->id_lugar_atencion = $request->lugar_atencion_pabellon;

        if (!$ingreso_paciente->save()) {
            return back();
        }

        $medicamentos = json_decode($request->medicamentos_cirugia);

        for ($i = 0; $i < count($medicamentos); ++$i) {
            //dd($medicamentos);
            $detalle_receta = new DetalleReceta();
            $detalle_receta->frecuencia = $medicamentos[$i]->frecuencia;
            $detalle_receta->periodo = $medicamentos[$i]->periodo;
            $detalle_receta->comentario = $medicamentos[$i]->comentario;
            $detalle_receta->presentacion = $medicamentos[$i]->presentacion;
            $detalle_receta->dosis = $medicamentos[$i]->dosis;
            $detalle_receta->producto = $medicamentos[$i]->medicamento;
            $detalle_receta->id_ingreso_paciente = $ingreso_paciente->id;
            $detalle_receta->receta = $ingreso_paciente->id;
            $detalle_receta->estado = 1;

            if (!$detalle_receta->save()) {
                return 'error';
            }
        }
        $examenes = json_decode($request->examenes_cirugia);

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
                $examen->id_ingreso_paciente = $ingreso_paciente->id;
                // $examen->id_ficha_atencion = $ficha->id;
                // $examen->id_paciente = $id_paciente;

                if (!$examen->save()) {
                    return 'error';
                }
            }
        }

        $mensaje = 'Se ha agregado ingreso de paciente de forma exitosa';

        return redirect()->back()->with('mensaje', $mensaje);
    }

    public function protocolo_obstetrico(Request $request)
    {
        $id_solicitud_pabellon = $request->id;
        $solicitud_pabellon = SolicitudPabellonQuirurgico::where('id', $request->id)->first();
        $lugar_atencion = LugarAtencion::where('id', $solicitud_pabellon->id_lugar_atencion)->first();
        $protocolo = ProtocoloOperatorioCirugia::where('id_solicitud_pabellon', $id_solicitud_pabellon)->first();
        $examenMedico = ExamenMedico::where('cod_parent', 0)->get();
        //$solicitud_pabellon->semanas_gestacion = $protocolo->semanas_gestacion;
        $ficha_neonatologica = FichaNeonatologia::where('id_solicitud_pabellon', $id_solicitud_pabellon)->first();
        // $ficha_neonatologica->fecha_nacimiento = \Carbon\Carbon::parse($ficha_neonatologica->fecha_nacimiento)->format('m/d/Y');
        // $ficha_neonatologica->hora_nacimiento = \Carbon\Carbon::parse($ficha_neonatologica->hora_nacimiento)->format('g:i A');
        // dd($ficha_neonatologica);
        if ($protocolo != null) {
            $solicitud_pabellon->semanas_gestacion = $protocolo->semanas_gestacion;
            $medicamentos_protocolo = DetalleReceta::where('id_protocolo', $protocolo->id)->get();
            $examenes_protocolo = ExamenPPF::where('id_protocolo', $protocolo->id)->get();
            $biopsia = Biopsia::where('id_protocolo', $protocolo->id)->first();
        }


        $paciente = Paciente::where('id', $solicitud_pabellon->id_paciente)->first();
        //$protocolo = IngresoPacienteCirugia::where('id_solicitud_pabellon', $id_solicitud_pabellon)->first();

        if ($protocolo != null) {
            return view('app.cirugia.secciones_obstetricia.protocolo_parto')->with([
                'id_solicitud_pabellon' => $id_solicitud_pabellon,
                'paciente' => $paciente,
                'lugar_atencion' => $lugar_atencion,
                'protocolo' => $protocolo,
                'examenMedico' => $examenMedico,
                'solicitud_pabellon' => $solicitud_pabellon,
                'ficha_neonatologica' => $ficha_neonatologica,
                'medicamentos_protocolo' => $medicamentos_protocolo,
                'examenes_protocolo' => $examenes_protocolo,
                'biopsia' => $biopsia,
            ]);
        } else {
            return view('app.cirugia.secciones_obstetricia.protocolo_parto')->with([
                'id_solicitud_pabellon' => $id_solicitud_pabellon,
                'paciente' => $paciente,
                'lugar_atencion' => $lugar_atencion,
                'protocolo' => $protocolo,
                'examenMedico' => $examenMedico,
                'solicitud_pabellon' => $solicitud_pabellon,
                'ficha_neonatologica' => $ficha_neonatologica,

            ]);
        }
    }

    public function registrar_protocolo_obstetrico(Request $request)
    {
        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();

        $protocolo_operatorio = new ProtocoloOperatorioCirugia();

        $protocolo_operatorio->nro_pabellon = $request->nro_pabellon_protocolo_operatorio;
        $protocolo_operatorio->inicio_operacion = $request->inicio_operacion_protocolo_operatorio;
        $protocolo_operatorio->fin_operacion = $request->fin_operacion_protocolo_operatorio;

        $protocolo_operatorio->semanas_gestacion = $request->semanas_gestacion;
        $protocolo_operatorio->tipo_embarazo = $request->tipo_embarazo;
        $protocolo_operatorio->sufrimiento_fetal = $request->sufrimiento_fetal;
        $protocolo_operatorio->induccion_parto = $request->induccion_parto;
        $protocolo_operatorio->presentacion_fetal = $request->presentacion_fetal;
        $protocolo_operatorio->anestesia = $request->anestesia;


        $protocolo_operatorio->cirujano = $request->nombre_cirujano;
        $protocolo_operatorio->ayudantes = $request->ayudantes_cirujano;
        $protocolo_operatorio->anestesistas_ayudantes_anestesia = $request->anestesista;
        $protocolo_operatorio->arsenaleria = $request->arsenaleria;
        $protocolo_operatorio->neonatologo = $request->neonatologo;
        $protocolo_operatorio->matron = $request->matron;
        $protocolo_operatorio->presentacion_tipo_parto = $request->presentacion_tipo_parto;
        $protocolo_operatorio->placenta = $request->placenta;
        $protocolo_operatorio->recien_nacido = $request->recien_nacido;
        $protocolo_operatorio->episiotomia = $request->episiotomia;
        $protocolo_operatorio->material_cierre = $request->material_cierre;
        $protocolo_operatorio->incidencias_parto = $request->incidencias_parto;


        $protocolo_operatorio->farmacos = $request->farmacos;
        $protocolo_operatorio->pulso_presion_arterial = $request->pulso_presion_protocolo_operatorio;
        $protocolo_operatorio->incidentes = $request->incidentes_protocolo_operatorio;
        $protocolo_operatorio->recuperacion_anestesia = $request->recuperacion_anestesia_protocolo_operatorio;
        $protocolo_operatorio->descripcion_anestesia = $request->descripcion_anestesia_protocolo_operatorio;
        $protocolo_operatorio->incidencias = $request->descripcion_incidencia_protocolo_operatorio;
        $protocolo_operatorio->destino_paciente = $request->destino_protocolo_operatorio;
        $protocolo_operatorio->indicaciones_postoperacion = $request->indicaciones_postoperacion_protocolo_operatorio;

        // $protocolo_operatorio->id_paciente = $request->paciente_protocolo_operatorio;
        // $protocolo_operatorio->id_profesional = $profesional->id;
        // $protocolo_operatorio->id_ficha_atencion = $request->;
        // $protocolo_operatorio->id_lugar_atencion = $request->lugar_atencion_protocolo_operatorio;
        $protocolo_operatorio->id_solicitud_pabellon = $request->id_solicitud_pabellon;

        if (!$protocolo_operatorio->save()) {
            return back();
        }

        $medicamentos = json_decode($request->medicamentos_cirugia);

        for ($i = 0; $i < count($medicamentos); ++$i) {
            //dd($medicamentos);
            $detalle_receta = new DetalleReceta();
            $detalle_receta->frecuencia = $medicamentos[$i]->frecuencia;
            $detalle_receta->periodo = $medicamentos[$i]->periodo;
            $detalle_receta->comentario = $medicamentos[$i]->comentario;
            $detalle_receta->presentacion = $medicamentos[$i]->presentacion;
            $detalle_receta->dosis = $medicamentos[$i]->dosis;
            $detalle_receta->producto = $medicamentos[$i]->medicamento;
            $detalle_receta->id_protocolo = $protocolo_operatorio->id;
            $detalle_receta->receta = $protocolo_operatorio->id;
            $detalle_receta->estado = 1;

            if (!$detalle_receta->save()) {
                return 'error';
            }
        }

        $examenes = json_decode($request->examenes_cirugia);

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
                $examen->id_protocolo = $protocolo_operatorio->id;
                // $examen->id_ficha_atencion = $ficha->id;
                // $examen->id_paciente = $id_paciente;

                if (!$examen->save()) {
                    return 'error';
                }
            }
        }
        $mensaje = 'Se ha agregado Protocolo operatorio de forma exitosa';

        return redirect()->back()->with('mensaje', $mensaje);
    }

    public function actualizar_protocolo_obstetrico(Request $request)
    {
        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();

        $protocolo_operatorio = ProtocoloOperatorioCirugia::FindOrFail($request->id_protocolo);

        $protocolo_operatorio->nro_pabellon = $request->nro_pabellon_protocolo_operatorio;
        $protocolo_operatorio->inicio_operacion = $request->inicio_operacion_protocolo_operatorio;
        $protocolo_operatorio->fin_operacion = $request->fin_operacion_protocolo_operatorio;

        $protocolo_operatorio->semanas_gestacion = $request->semanas_gestacion;
        $protocolo_operatorio->tipo_embarazo = $request->tipo_embarazo;
        $protocolo_operatorio->sufrimiento_fetal = $request->sufrimiento_fetal;
        $protocolo_operatorio->induccion_parto = $request->induccion_parto;
        $protocolo_operatorio->presentacion_fetal = $request->presentacion_fetal;
        $protocolo_operatorio->anestesia = $request->anestesia;


        $protocolo_operatorio->cirujano = $request->nombre_cirujano;
        $protocolo_operatorio->ayudantes = $request->ayudantes_cirujano;
        $protocolo_operatorio->anestesistas_ayudantes_anestesia = $request->anestesista;
        $protocolo_operatorio->arsenaleria = $request->arsenaleria;
        $protocolo_operatorio->neonatologo = $request->neonatologo;
        $protocolo_operatorio->matron = $request->matron;
        $protocolo_operatorio->presentacion_tipo_parto = $request->presentacion_tipo_parto;
        $protocolo_operatorio->placenta = $request->placenta;
        $protocolo_operatorio->recien_nacido = $request->recien_nacido;
        $protocolo_operatorio->episiotomia = $request->episiotomia;
        $protocolo_operatorio->material_cierre = $request->material_cierre;
        $protocolo_operatorio->incidencias_parto = $request->incidencias_parto;


        $protocolo_operatorio->farmacos = $request->farmacos;
        $protocolo_operatorio->pulso_presion_arterial = $request->pulso_presion_protocolo_operatorio;
        $protocolo_operatorio->incidentes = $request->incidentes_protocolo_operatorio;
        $protocolo_operatorio->recuperacion_anestesia = $request->recuperacion_anestesia_protocolo_operatorio;
        $protocolo_operatorio->descripcion_anestesia = $request->descripcion_anestesia_protocolo_operatorio;
        $protocolo_operatorio->incidencias = $request->descripcion_incidencia_protocolo_operatorio;
        $protocolo_operatorio->destino_paciente = $request->destino_protocolo_operatorio;
        $protocolo_operatorio->indicaciones_postoperacion = $request->indicaciones_postoperacion_protocolo_operatorio;
        // $protocolo_operatorio->id_paciente = $request->paciente_protocolo_operatorio;
        // $protocolo_operatorio->id_profesional = $profesional->id;
        // $protocolo_operatorio->id_ficha_atencion = $request->;
        // $protocolo_operatorio->id_lugar_atencion = $request->lugar_atencion_protocolo_operatorio;
        $protocolo_operatorio->id_solicitud_pabellon = $request->id_solicitud_pabellon;

        if (!$protocolo_operatorio->save()) {
            return back();
        }


        $medicamentos = json_decode($request->medicamentos_cirugia);

        for ($i = 0; $i < count($medicamentos); ++$i) {
            //dd($medicamentos);
            $detalle_receta = new DetalleReceta();
            $detalle_receta->frecuencia = $medicamentos[$i]->frecuencia;
            $detalle_receta->periodo = $medicamentos[$i]->periodo;
            $detalle_receta->comentario = $medicamentos[$i]->comentario;
            $detalle_receta->presentacion = $medicamentos[$i]->presentacion;
            $detalle_receta->dosis = $medicamentos[$i]->dosis;
            $detalle_receta->producto = $medicamentos[$i]->medicamento;
            $detalle_receta->id_protocolo = $protocolo_operatorio->id;
            $detalle_receta->receta = $protocolo_operatorio->id;
            $detalle_receta->estado = 1;

            if (!$detalle_receta->save()) {
                return 'error';
            }
        }

        $examenes = json_decode($request->examenes_cirugia);

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
                $examen->id_protocolo = $protocolo_operatorio->id;
                // $examen->id_ficha_atencion = $ficha->id;
                // $examen->id_paciente = $id_paciente;

                if (!$examen->save()) {
                    return 'error';
                }
            }
        }
        $mensaje = 'Se ha agregado Protocolo operatorio de forma exitosa';

        return redirect()->back()->with('mensaje', $mensaje);
    }

    public function registrar_ficha_neonatoligica(Request $request)
    {

        $neonatologia = new FichaNeonatologia();

        $neonatologia->fecha_nacimiento = $request->fecha_nacimiento;
        $neonatologia->hora_nacimiento = $request->hora_nacimiento;
        $neonatologia->peso_nacimiento = $request->peso_nacimiento;
        $neonatologia->talla_nacimiento = $request->talla_nacimiento;
        $neonatologia->perimetro_cefalico = $request->perimetro_cefalico;
        $neonatologia->apgar = $request->apgar;
        $neonatologia->apgar_cinco = $request->apgar_cinco;
        $neonatologia->edad_gestacional = $request->edad_gestacional;
        $neonatologia->reanimacion = $request->reanimacion;
        $neonatologia->medicamentos = $request->medicamentos;
        $neonatologia->bcg = $request->bcg;
        $neonatologia->hepatitis_b = $request->hepatitis_b;
        $neonatologia->otras_vacunas = $request->otras_vacunas;
        $neonatologia->id_solicitud_pabellon = $request->id_solicitud_pabellon;

        if (!$neonatologia->save()) {

            return back();
        }

        $mensaje = 'Se ha agregado Ficha neonatologica de forma exitosa';

        return redirect()->back()->with('mensaje', $mensaje);
    }

    public function actualizar_ficha_neonatoligica(Request $request)
    {

        $neonatologia = FichaNeonatologia::findOrFail($request->ficha_neonatologica);


        $neonatologia->fecha_nacimiento = $request->fecha_nacimiento;
        $neonatologia->hora_nacimiento = $request->hora_nacimiento;
        $neonatologia->peso_nacimiento = $request->peso_nacimiento;
        $neonatologia->talla_nacimiento = $request->talla_nacimiento;
        $neonatologia->perimetro_cefalico = $request->perimetro_cefalico;
        $neonatologia->apgar = $request->apgar;
        $neonatologia->apgar_cinco = $request->apgar_cinco;
        $neonatologia->edad_gestacional = $request->edad_gestacional;
        $neonatologia->reanimacion = $request->reanimacion;
        $neonatologia->medicamentos = $request->medicamentos;
        $neonatologia->bcg = $request->bcg;
        $neonatologia->hepatitis_b = $request->hepatitis_b;
        $neonatologia->otras_vacunas = $request->otras_vacunas;


        if (!$neonatologia->save()) {

            return back();
        }

        $mensaje = 'Se ha Actualizado Ficha neonatologica de forma exitosa';

        return redirect()->back()->with('mensaje', $mensaje);
    }

    public function recuperacion_obstetrico(Request $request)
    {
        $id_solicitud_pabellon = $request->id;
        $solicitud_pabellon = SolicitudPabellonQuirurgico::where('id', $request->id)->first();
        $lugar_atencion = LugarAtencion::where('id', $solicitud_pabellon->id_lugar_atencion)->first();
        $recuperacion = RecuperacionCirugia::where('id_solicitud_pabellon', $id_solicitud_pabellon)->first();
        $recuperaciones = RecuperacionCirugia::where('id_solicitud_pabellon', $request->id)->get();
        $paciente = Paciente::where('id', $solicitud_pabellon->id_paciente)->first();
        $examenMedico = ExamenMedico::where('cod_parent', 0)->get();
        $regiones = Region::all();
        $ciudades = Ciudad::where('id_region', $paciente->Direccion()->first()->Ciudad()->first()->id_region)->get();
        //$protocolo = IngresoPacienteCirugia::where('id_solicitud_pabellon', $id_solicitud_pabellon)->first();


        if (isset($recuperaciones)) {
            foreach ($recuperaciones as $r) {
                $medicamentos = DetalleReceta::where('id_recuperacion', $r->id)->get();
                $r->medicamentos = $medicamentos;
            }
        }

        if (isset($recuperaciones)) {
            foreach ($recuperaciones as $r) {
                $examenes = ExamenPPF::where('id_recuperacion', $r->id)->get();
                $r->examenes = $examenes;
            }
        }
        if (isset($recuperaciones)) {
            foreach ($recuperaciones as $r) {
                $interconsultas = Interconsulta::where('id_recuperacion', $r->id)->get();
                $r->interconsultas = $interconsultas;
            }
        }

        return view('app.cirugia.secciones_obstetricia.recuperacion_parto')->with([
            'id_solicitud_pabellon' => $id_solicitud_pabellon,
            'paciente' => $paciente,
            'lugar_atencion' => $lugar_atencion,
            'recuperacion' => $recuperacion,
            'recuperaciones' => $recuperaciones,
            'examenMedico' => $examenMedico,
            'regiones' => $regiones,
            'ciudades' => $ciudades,
        ]);
    }

    public function registrar_recuperacion_obstetrico(Request $request)
    {
        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();

        $recuperacion = new RecuperacionCirugia();
        $recuperacion->evolucion = $request->madre;
        $recuperacion->recien_nacido  = $request->recien_nacido;
        $recuperacion->resumen_evolucion = $request->resumen_evolucion;

        // $protocolo_operatorio->id_paciente = $request->paciente_protocolo_operatorio;
        $recuperacion->id_profesional = $profesional->id;
        // $protocolo_operatorio->id_ficha_atencion = $request->;
        // $protocolo_operatorio->id_lugar_atencion = $request->lugar_atencion_protocolo_operatorio;
        $recuperacion->id_solicitud_pabellon = $request->id_solicitud_pabellon;

        // $recuperaciones = RecuperacionCirugia::where('id_solicitud_pabellon', $request->id_solicitud_pabellon)->get();

        if (!$recuperacion->save()) {
            return back();
        }

        $medicamentos = json_decode($request->medicamentos_cirugia);

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
                $detalle_receta->id_recuperacion = $recuperacion->id;
                $detalle_receta->receta = $recuperacion->id;
                $detalle_receta->estado = 1;

                if (!$detalle_receta->save()) {
                    return 'error';
                }
            }
        }
        $examenes = json_decode($request->examenes_cirugia);

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
                $examen->id_recuperacion = $recuperacion->id;
                // $examen->id_ficha_atencion = $ficha->id;
                // $examen->id_paciente = $id_paciente;

                if (!$examen->save()) {
                    return 'error';
                }
            }
        }


        $interconsultas = json_decode($request->interconsultas_cirugia);

        if (!$interconsultas == null) {
            for ($i = 0; $i < count($interconsultas); ++$i) {
                $interconsulta = new Interconsulta();

                $interconsulta->fecha_solicitud = \Carbon\Carbon::now()->format('Y/m/d');
                $interconsulta->nombre_esp = $interconsultas[$i]->nombre_especialista_interconsulta;
                $interconsulta->hipotesis = $interconsultas[$i]->hipotesis_interconsulta;
                $interconsulta->comentarios = $interconsultas[$i]->comentarios_interconsulta;

                //$examen->id_profesional = $profesional->id;
                $interconsulta->id_recuperacion = $recuperacion->id;
                // $examen->id_ficha_atencion = $ficha->id;
                // $examen->id_paciente = $id_paciente;

                if (!$interconsulta->save()) {
                    return 'error';
                }
            }
        }

        $neonatologia = json_decode($request->evolucion_neonatologia);


        if (!$neonatologia == null) {

            $evolucion_neonatologia = new EvolucionNeonatologia();
            $evolucion_neonatologia->brazalete = $neonatologia[0]->brazalete;
            $evolucion_neonatologia->temperatura_rectal = $neonatologia[0]->temperatura_rectal;
            $evolucion_neonatologia->peso = $neonatologia[0]->peso;
            $evolucion_neonatologia->evacuaciones = $neonatologia[0]->evacuaciones;
            $evolucion_neonatologia->alerta = $neonatologia[0]->alerta;
            $evolucion_neonatologia->piel = $neonatologia[0]->piel;
            $evolucion_neonatologia->cuerpo = $neonatologia[0]->cuerpo;
            $evolucion_neonatologia->cordon = $neonatologia[0]->cordon;
            $evolucion_neonatologia->succion = $neonatologia[0]->succion;
            $evolucion_neonatologia->actitud = $neonatologia[0]->actitud;
            $evolucion_neonatologia->otra_alimentacion = $neonatologia[0]->otra_alimentacion;
            $evolucion_neonatologia->indicacion_madre = $neonatologia[0]->indicacion_madre;
            $evolucion_neonatologia->indicacion_enfermera = $neonatologia[0]->indicacion_enfermera;
            $evolucion_neonatologia->indicacion_otra = $neonatologia[0]->indicacion_otra;
            $evolucion_neonatologia->frecuencia_respiratoria = $neonatologia[0]->frecuencia_respiratoria;
            $evolucion_neonatologia->frecuencia_cardiaca = $neonatologia[0]->frecuencia_cardiaca;
            $evolucion_neonatologia->temperatura_axilar = $neonatologia[0]->temperatura_axilar;

            $evolucion_neonatologia->id_recuperacion = $recuperacion->id;

            if (!$evolucion_neonatologia->save()) {
                return 'error';
            }
        }
        $mensaje = 'Se ha agregado Protocolo operatorio de forma exitosa';

        return redirect()->back()->with(['mensaje' => $mensaje,]);
    }

    public function sala_parto_obstetrico(Request $request)
    {
        $id_solicitud_pabellon = $request->id;

        $solicitud_pabellon = SolicitudPabellonQuirurgico::where('id', $request->id)->first();
        $lugar_atencion = LugarAtencion::where('id', $solicitud_pabellon->id_lugar_atencion)->first();
        $sala_hospitalizacion = SalaCirugia::where('id_solicitud_pabellon', $id_solicitud_pabellon)->first();
        $sala_hospitalizaciones = SalaCirugia::where('id_solicitud_pabellon', $request->id)->get();
        $paciente = Paciente::where('id', $solicitud_pabellon->id_paciente)->first();
        $protocolo = ProtocoloOperatorioCirugia::where('id_solicitud_pabellon', $id_solicitud_pabellon)->first();
        //$solicitud_pabellon->semanas_gestacion = $protocolo->semanas_gestacion;
        $ficha_neonatologica = FichaNeonatologia::where('id_solicitud_pabellon', $id_solicitud_pabellon)->first();
        $examenMedico = ExamenMedico::where('cod_parent', 0)->get();
        $regiones = Region::all();
        $ciudades = Ciudad::where('id_region', $paciente->Direccion()->first()->Ciudad()->first()->id_region)->get();

        if (isset($sala_hospitalizaciones)) {
            foreach ($sala_hospitalizaciones as $sh) {
                $medicamentos = DetalleReceta::where('id_sala', $sh->id)->get();
                $sh->medicamentos = $medicamentos;
            }
        }

        if (isset($sala_hospitalizaciones)) {
            foreach ($sala_hospitalizaciones as $sh) {
                $examenes = ExamenPPF::where('id_sala', $sh->id)->get();
                $sh->examenes = $examenes;
            }
        }
        if (isset($sala_hospitalizaciones)) {
            foreach ($sala_hospitalizaciones as $sh) {
                $interconsultas = Interconsulta::where('id_sala', $sh->id)->get();
                $sh->interconsultas = $interconsultas;
            }
        }
        return view('app.cirugia.secciones_obstetricia.sala_parto')->with([
            'id_solicitud_pabellon' => $id_solicitud_pabellon,
            'paciente' => $paciente,
            'lugar_atencion' => $lugar_atencion,
            'sala_hospitalizacion' => $sala_hospitalizacion,
            'sala_hospitalizaciones' => $sala_hospitalizaciones,
            'solicitud_pabellon' => $solicitud_pabellon,
            'ficha_neonatologica' => $ficha_neonatologica,
            'examenMedico' => $examenMedico,
            'regiones' => $regiones,
            'ciudades' => $ciudades,
        ]);
    }

    public function registrar_sala_parto_obstretico(Request $request)
    {
        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();


        $sala_hospitalizacion = new SalaCirugia();
        $sala_hospitalizacion->evolucion = $request->madre;
        $sala_hospitalizacion->recien_nacido = $request->recien_nacido;
        $sala_hospitalizacion->resumen_evolucion = $request->resumen_evolucion1;

        // $protocolo_operatorio->id_paciente = $request->paciente_protocolo_operatorio;
        $sala_hospitalizacion->id_profesional = $profesional->id;
        // $protocolo_operatorio->id_ficha_atencion = $request->;
        // $protocolo_operatorio->id_lugar_atencion = $request->lugar_atencion_protocolo_operatorio;
        $sala_hospitalizacion->id_solicitud_pabellon = $request->id_solicitud_pabellon;

        // $recuperaciones = RecuperacionCirugia::where('id_solicitud_pabellon', $request->id_solicitud_pabellon)->get();

        if (!$sala_hospitalizacion->save()) {
            return back();
        }

        $medicamentos = json_decode($request->medicamentos_cirugia);

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
                $detalle_receta->id_sala = $sala_hospitalizacion->id;
                $detalle_receta->receta = $sala_hospitalizacion->id;
                $detalle_receta->estado = 1;

                if (!$detalle_receta->save()) {
                    return 'error';
                }
            }
        }

        $examenes = json_decode($request->examenes_cirugia);

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
                $examen->id_sala = $sala_hospitalizacion->id;
                // $examen->id_ficha_atencion = $ficha->id;
                // $examen->id_paciente = $id_paciente;

                if (!$examen->save()) {
                    return 'error';
                }
            }
        }


        $interconsultas = json_decode($request->interconsultas_cirugia);

        if (!$interconsultas == null) {
            for ($i = 0; $i < count($interconsultas); ++$i) {
                $interconsulta = new Interconsulta();

                $interconsulta->fecha_solicitud = \Carbon\Carbon::now()->format('Y/m/d');
                $interconsulta->nombre_esp = $interconsultas[$i]->nombre_especialista_interconsulta;
                $interconsulta->hipotesis = $interconsultas[$i]->hipotesis_interconsulta;
                $interconsulta->comentarios = $interconsultas[$i]->comentarios_interconsulta;

                //$examen->id_profesional = $profesional->id;
                $interconsulta->id_sala = $sala_hospitalizacion->id;
                // $examen->id_ficha_atencion = $ficha->id;
                // $examen->id_paciente = $id_paciente;

                if (!$interconsulta->save()) {
                    return 'error';
                }
            }
        }

        $neonatologia = json_decode($request->evolucion_neonatologia);


        if (!$neonatologia == null) {

            $evolucion_neonatologia = new EvolucionNeonatologia();
            $evolucion_neonatologia->brazalete = $neonatologia[0]->brazalete;
            $evolucion_neonatologia->temperatura_rectal = $neonatologia[0]->temperatura_rectal;
            $evolucion_neonatologia->peso = $neonatologia[0]->peso;
            $evolucion_neonatologia->evacuaciones = $neonatologia[0]->evacuaciones;
            $evolucion_neonatologia->alerta = $neonatologia[0]->alerta;
            $evolucion_neonatologia->piel = $neonatologia[0]->piel;
            $evolucion_neonatologia->cuerpo = $neonatologia[0]->cuerpo;
            $evolucion_neonatologia->cordon = $neonatologia[0]->cordon;
            $evolucion_neonatologia->succion = $neonatologia[0]->succion;
            $evolucion_neonatologia->actitud = $neonatologia[0]->actitud;
            $evolucion_neonatologia->otra_alimentacion = $neonatologia[0]->otra_alimentacion;
            $evolucion_neonatologia->indicacion_madre = $neonatologia[0]->indicacion_madre;
            $evolucion_neonatologia->indicacion_enfermera = $neonatologia[0]->indicacion_enfermera;
            $evolucion_neonatologia->indicacion_otra = $neonatologia[0]->indicacion_otra;
            $evolucion_neonatologia->frecuencia_respiratoria = $neonatologia[0]->frecuencia_respiratoria;
            $evolucion_neonatologia->frecuencia_cardiaca = $neonatologia[0]->frecuencia_cardiaca;
            $evolucion_neonatologia->temperatura_axilar = $neonatologia[0]->temperatura_axilar;

            $evolucion_neonatologia->id_sala = $sala_hospitalizacion->id;

            if (!$evolucion_neonatologia->save()) {
                return 'error';
            }
        }
        $mensaje = 'Se ha agregado Registro de Evolucion de Sala Parto operatorio de forma exitosa';

        return redirect()->back()->with(['mensaje' => $mensaje,]);
    }

    public function epicrisis_alta_medica_obstetrico(Request $request)
    {
        $id_solicitud_pabellon = $request->id;
        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();

        $solicitud_pabellon = SolicitudPabellonQuirurgico::where('id', $request->id)->first();
        $lugar_atencion = LugarAtencion::where('id', $solicitud_pabellon->id_lugar_atencion)->first();
        $epicrisis_alta_medica = EpicrisisCarnetCirugia::where('id_solicitud_pabellon', $id_solicitud_pabellon)->first();
        $paciente = Paciente::where('id', $solicitud_pabellon->id_paciente)->first();
        //$protocolo = IngresoPacienteCirugia::where('id_solicitud_pabellon', $id_solicitud_pabellon)->first();
        $protocolo = ProtocoloOperatorioCirugia::where('id_solicitud_pabellon', $id_solicitud_pabellon)->first();
        $solicitud_pabellon->semanas_gestacion = $protocolo->semanas_gestacion;
        $ficha_neonatologica = FichaNeonatologia::where('id_solicitud_pabellon', $id_solicitud_pabellon)->first();

        if ($protocolo != null) {

            $solicitud_pabellon->semanas_gestacion = $protocolo->semanas_gestacion;
        } else {
            return Redirect::back()->withErrors(['mensaje' => 'No se encontro registro de protocolo operatorio, no puede realizar la epicrisis de alta medica']);
        }

        return view('app.cirugia.secciones_obstetricia.epicrisis_carnet')->with([
            'id_solicitud_pabellon' => $id_solicitud_pabellon,
            'paciente' => $paciente,
            'lugar_atencion' => $lugar_atencion,
            'epicrisis_alta_medica' => $epicrisis_alta_medica,
            'profesional' => $profesional,
            'solicitud_pabellon' => $solicitud_pabellon,
            'ficha_neonatologica' => $ficha_neonatologica

        ]);
    }

    public function registrar_epicrisis_alta_medica_obstetrico(Request $request)
    {
        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();

        $epicrisis_alta_medica = new EpicrisisCarnetCirugia();

        $epicrisis_alta_medica->inicio_hospitalizacion = $request->inicio_hospitalizacion;
        $epicrisis_alta_medica->fin_hospitalizacion = $request->fin_hospitalizacion;
        $epicrisis_alta_medica->diagnostico_ingreso = $request->diagnostico_ingreso;
        $epicrisis_alta_medica->diagnostico_alta = $request->diagnostico_alta;
        $epicrisis_alta_medica->tratamientos_cirugias = $request->tratamientos_cirugias;
        $epicrisis_alta_medica->procedimientos_quirurgicos_cirugia = $request->procedimientos_quirurgicos_cirugia;
        $epicrisis_alta_medica->otros_tratamientos_procedimientos = $request->otros_tratamientos_procedimientos;

        $epicrisis_alta_medica->herida_operatoria = $request->herida_operatoria;
        $epicrisis_alta_medica->pezones = $request->pezones;
        $epicrisis_alta_medica->lactancia = $request->lactancia;
        $epicrisis_alta_medica->fecha_alta = $request->fecha_alta;
        $epicrisis_alta_medica->condicion_salud = $request->condicion_salud;
        $epicrisis_alta_medica->fecha_control = $request->fecha_control;
        $epicrisis_alta_medica->indicaciones_alta = $request->indicaciones_alta;

        //$epicrisis_alta_medica->id_paciente = $request->paciente_ingreso_epicrisis_alta_medica;
        $epicrisis_alta_medica->id_profesional = $profesional->id;
        $epicrisis_alta_medica->id_lugar_atencion = $request->id_lugar_atencion;
        $epicrisis_alta_medica->id_solicitud_pabellon = $request->id_solicitud_pabellon;

        if (!$epicrisis_alta_medica->save()) {
            return back();
        }
        $mensaje = 'Se ha agregado ingreso de paciente de forma exitosa';

        return redirect()->back()->with('mensaje', $mensaje);
    }

    public function actualizar_epicrisis_alta_medica_obstetrico(Request $request)
    {
        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();

        $epicrisis_alta_medica = EpicrisisCarnetCirugia::FindOrFail($request->id_epicrisis_alta_medica);

        $epicrisis_alta_medica->inicio_hospitalizacion = $request->inicio_hospitalizacion;
        $epicrisis_alta_medica->fin_hospitalizacion = $request->fin_hospitalizacion;
        $epicrisis_alta_medica->diagnostico_ingreso = $request->diagnostico_ingreso;
        $epicrisis_alta_medica->diagnostico_alta = $request->diagnostico_alta;
        $epicrisis_alta_medica->tratamientos_cirugias = $request->tratamientos_cirugias;
        $epicrisis_alta_medica->procedimientos_quirurgicos_cirugia = $request->procedimientos_quirurgicos_cirugia;
        $epicrisis_alta_medica->otros_tratamientos_procedimientos = $request->otros_tratamientos_procedimientos;

        $epicrisis_alta_medica->herida_operatoria = $request->herida_operatoria;
        $epicrisis_alta_medica->pezones = $request->pezones;
        $epicrisis_alta_medica->lactancia = $request->lactancia;
        $epicrisis_alta_medica->fecha_alta = $request->fecha_alta;
        $epicrisis_alta_medica->condicion_salud = $request->condicion_salud;
        $epicrisis_alta_medica->fecha_control = $request->fecha_control;
        $epicrisis_alta_medica->indicaciones_alta = $request->indicaciones_alta;

        //$epicrisis_alta_medica->id_paciente = $request->paciente_ingreso_epicrisis_alta_medica;
        $epicrisis_alta_medica->id_profesional = $profesional->id;
        $epicrisis_alta_medica->id_lugar_atencion = $request->id_lugar_atencion;
        $epicrisis_alta_medica->id_solicitud_pabellon = $request->id_solicitud_pabellon;

        if (!$epicrisis_alta_medica->save()) {
            return back();
        }
        $mensaje = 'Se ha actualizado epicrisis de forma exitosa';

        return redirect()->back()->with('mensaje', $mensaje);
    }

    public function index_cirugia_quirurgica()
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
        $solicitudes_pabellon_quirurgico = SolicitudPabellonQuirurgico::where('id_paciente', $paciente->id)->where('tipo_cirugia', 'quirurgica')->get();

        //$profesionalCirugia = Profesional::where('id', $solicitudes_pabellon_quirurgico->id_profesional)->first();

        if ($examen_radiologico == 0) {
            $examen_radiologico = 1;
        } else {
            $examen_radiologico = DB::table('examenes_radiologicos')->orderBy('id', 'desc')->first()->id + 1;
        }


        return view('app.cirugia.index_cirugia_quirurgica')->with(
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
                'lugares_atenciones' => $lugares_atenciones,
                'solicitudes_pabellon_quirurgico' => $solicitudes_pabellon_quirurgico,
                //'profesionalCirugia' => $profesionalCirugia,

            ]
        );
    }

    public function cargar_lugar_atencion(Request $request)
    {

        $lugar_atencion = LugarAtencion::where('id', $request->lugar_atencion)->first();

        return json_encode($lugar_atencion);
    }

    public function registrar_solicitud_pabellon_quirurgico(Request $request)
    {

        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();

        $solicitud_pabellon = new SolicitudPabellonQuirurgico();

        $solicitud_pabellon->tipo_cirugia = 'quirurgica';

        $solicitud_pabellon->grado_urgencia = $request->grado_urgencia_pabellon;
        //$solicitud_pabellon->fecha_hora_operacion = $request->fecha_hora_pabellon;
        $solicitud_pabellon->patalogias_cronicas = $request->patologias_cronicas_pabellon;
        $solicitud_pabellon->operacion = $request->operacion_pabellon;
        $solicitud_pabellon->codigo_cirugia = $request->codigo_cirugia_pabellon;
        $solicitud_pabellon->anestesia = $request->anestesia_pabellon;
        $solicitud_pabellon->ayudante1 = $request->ayudante_uno_pabellon;
        $solicitud_pabellon->anestesista = $request->anestesista_pabellon;
        $solicitud_pabellon->arsenaleria = $request->arsenaleria_pabellon;
        $solicitud_pabellon->equipamiento_especial = $request->equipamiento_especial_pabellon;
        $solicitud_pabellon->codigo_cirugia_2 = $request->codigo_cirugia_pabellon1;
        $solicitud_pabellon->especialidad_1 = $request->especialidad_uno_pabellon;
        $solicitud_pabellon->especialidad_2 = $request->especialidad_dos_pabellon;
        $solicitud_pabellon->comentarios = $request->comentarios_pabellon;

        $solicitud_pabellon->id_paciente = $request->paciente_quirurgico;
        $solicitud_pabellon->id_profesional = $profesional->id;
        //$solicitud_pabellon->id_ficha_atencion = $request->;
        $solicitud_pabellon->id_lugar_atencion = $request->lugar_atencion_pabellon_quirurgico;

        if (!$solicitud_pabellon->save()) {
            return back();
        }
        $mensaje = 'Se ha agregado solicitud de pabellon de forma exitosa';

        return redirect()->back()->with('mensaje', $mensaje);
    }

    public function ingreso_paciente(Request $request)
    {
        $id_solicitud_pabellon = $request->id;
        $ingreso_paciente = IngresoPacienteCirugia::where('id_solicitud_pabellon', $id_solicitud_pabellon)->first();
        // $ingreso_paciente->hora_operacion = Carbon::parse($ingreso_paciente->hora_operacion)
        $examenMedico = ExamenMedico::where('cod_parent', 0)->get();
        if (isset($ingreso_paciente)) {
            $medicamentos_ingreso_paciente = DetalleReceta::where('id_ingreso_paciente', $ingreso_paciente->id)->get();
            // dd($medicamentos_ingreso_paciente);
            $examenes_ingreso_paciente = ExamenPPF::where('id_ingreso_paciente', $ingreso_paciente->id)->get();
        } else {
            $medicamentos_ingreso_paciente = null;
            $examenes_ingreso_paciente = null;
        }


        return view('app.cirugia.secciones_cirugia.ingreso')->with([
            'id_solicitud_pabellon' => $id_solicitud_pabellon,
            'ingreso_paciente' => $ingreso_paciente,
            'examenMedico' => $examenMedico,
            'medicamentos_ingreso_paciente' => $medicamentos_ingreso_paciente,
            'examenes_ingreso_paciente' => $examenes_ingreso_paciente,
        ]);
    }

    public function registrar_ingreso_paciente_cirugia(Request $request)
    {
        //$id_solicitud_pabellon = $request->id_solicitud_pabellon;
        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();

        $ingreso_paciente = new IngresoPacienteCirugia();

        $ingreso_paciente->anamnesis = $request->anamnesis;
        $ingreso_paciente->antecedentes_examenes_fisicos = $request->antecedentes_examenes_fisicos;
        $ingreso_paciente->hipotesis_diagnostica = $request->hipotesis_diagnostica;
        $ingreso_paciente->diagnostico_cie10 = $request->diagnostico_cie10;
        $ingreso_paciente->indicaciones_ingreso = $request->indicaciones_ingreso;
        $ingreso_paciente->hora_operacion = $request->hora_operacion;
        $ingreso_paciente->hospitalizar_en = $request->hospitalizar_en;
        $ingreso_paciente->tipo_sala = $request->tipo_sala;
        $ingreso_paciente->id_solicitud_pabellon = $request->id_solicitud_pabellon;

        /*$ingreso_paciente->id_paciente = $request->paciente_ialta_medica;
        $ingreso_paciente->id_profesional = $profesional->id;*/
        // $ingreso_paciente->id_lugar_atencion = $request->lugar_atencion_pabellon;

        if (!$ingreso_paciente->save()) {
            return back();
        }

        $medicamentos = json_decode($request->medicamentos_cirugia);

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
                $detalle_receta->id_ingreso_paciente = $ingreso_paciente->id;
                $detalle_receta->receta = $ingreso_paciente->id;
                $detalle_receta->estado = 1;

                if (!$detalle_receta->save()) {
                    return 'error';
                }
            }
        }
        $examenes = json_decode($request->examenes_cirugia);

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
                $examen->id_ingreso_paciente = $ingreso_paciente->id;
                // $examen->id_ficha_atencion = $ficha->id;
                // $examen->id_paciente = $id_paciente;

                if (!$examen->save()) {
                    return 'error';
                }
            }
        }
        $mensaje = 'Se ha agregado ingreso de paciente de forma exitosa';

        return redirect()->back()->with('mensaje', $mensaje);
    }

    public function actualizar_ingreso_paciente_cirugia(Request $request)
    {
        //$id_solicitud_pabellon = $request->id_solicitud_pabellon;
        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();

        $ingreso_paciente = IngresoPacienteCirugia::FindOrFail($request->id_ingreso_paciente);

        $ingreso_paciente->anamnesis = $request->anamnesis;
        $ingreso_paciente->antecedentes_examenes_fisicos = $request->antecedentes_examenes_fisicos;
        $ingreso_paciente->hipotesis_diagnostica = $request->hipotesis_diagnostica;
        $ingreso_paciente->diagnostico_cie10 = $request->diagnostico_cie10;
        $ingreso_paciente->indicaciones_ingreso = $request->indicaciones_ingreso;
        $ingreso_paciente->hora_operacion = $request->hora_operacion;
        $ingreso_paciente->hospitalizar_en = $request->hospitalizar_en;
        $ingreso_paciente->tipo_sala = $request->tipo_sala;
        $ingreso_paciente->id_solicitud_pabellon = $request->id_solicitud_pabellon;

        /*$ingreso_paciente->id_paciente = $request->paciente_ialta_medica;
        $ingreso_paciente->id_profesional = $profesional->id;*/
        // $ingreso_paciente->id_lugar_atencion = $request->lugar_atencion_pabellon;

        if (!$ingreso_paciente->save()) {
            return back();
        }

        $medicamentos = json_decode($request->medicamentos_cirugia);

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
                $detalle_receta->id_ingreso_paciente = $ingreso_paciente->id;
                $detalle_receta->receta = $ingreso_paciente->id;
                $detalle_receta->estado = 1;

                if (!$detalle_receta->save()) {
                    return 'error';
                }
            }
        }
        $examenes = json_decode($request->examenes_cirugia);

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
                $examen->id_ingreso_paciente = $ingreso_paciente->id;
                // $examen->id_ficha_atencion = $ficha->id;
                // $examen->id_paciente = $id_paciente;

                if (!$examen->save()) {
                    return 'error';
                }
            }
        }

        $mensaje = 'Se ha agregado ingreso de paciente de forma exitosa';

        return redirect()->back()->with('mensaje', $mensaje);
    }

    public function protocolo_cirugia(Request $request)
    {
        $id_solicitud_pabellon = $request->id;
        $solicitud_pabellon = SolicitudPabellonQuirurgico::where('id', $request->id)->first();
        $lugar_atencion = LugarAtencion::where('id', $solicitud_pabellon->id_lugar_atencion)->first();
        $protocolo = ProtocoloOperatorioCirugia::where('id_solicitud_pabellon', $id_solicitud_pabellon)->first();
        $examenMedico = ExamenMedico::where('cod_parent', 0)->get();
        if ($protocolo != null) {
            $solicitud_pabellon->semanas_gestacion = $protocolo->semanas_gestacion;
            $medicamentos_protocolo = DetalleReceta::where('id_protocolo', $protocolo->id)->get();
            $examenes_protocolo = ExamenPPF::where('id_protocolo', $protocolo->id)->get();
            $biopsia = Biopsia::where('id_protocolo', $protocolo->id)->first();
        } else {

            $medicamentos_protocolo = null;
            $examenes_protocolo = null;
            $biopsia = null;
        }
        $paciente = Paciente::where('id', $solicitud_pabellon->id_paciente)->first();
        //$protocolo = IngresoPacienteCirugia::where('id_solicitud_pabellon', $id_solicitud_pabellon)->first();

        return view('app.cirugia.secciones_cirugia.protocolo_cirugia')->with([
            'id_solicitud_pabellon' => $id_solicitud_pabellon,
            'paciente' => $paciente,
            'lugar_atencion' => $lugar_atencion,
            'protocolo' => $protocolo,
            'examenMedico' => $examenMedico,
            'medicamentos_protocolo' => $medicamentos_protocolo,
            'examenes_protocolo' => $examenes_protocolo,
            'biopsia' => $biopsia,
        ]);
    }

    public function registrar_protocolo_cirugia(Request $request)
    {
        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();

        $protocolo_operatorio = new ProtocoloOperatorioCirugia();

        $protocolo_operatorio->nro_pabellon = $request->nro_pabellon_protocolo_operatorio;
        $protocolo_operatorio->inicio_operacion = $request->inicio_operacion_protocolo_operatorio;
        $protocolo_operatorio->fin_operacion = $request->fin_operacion_protocolo_operatorio;
        $protocolo_operatorio->diagnostico_preoperatorio = $request->diag_preoperatorio_protocolo_operatorio;
        $protocolo_operatorio->diagnostico_postoperatorio = $request->diag_postoperatorio_protocolo_operatorio;
        $protocolo_operatorio->codigo_cirugia = $request->codigo_cirugia_protocolo_operatorio;
        $protocolo_operatorio->anestesia = $request->anestesia_protocolo_operatorio;
        $protocolo_operatorio->cirujano = $request->cirujano_protocolo_operatorio;
        $protocolo_operatorio->ayudantes = $request->ayudantes_protocolo_operatorio;
        $protocolo_operatorio->anestesistas_ayudantes_anestesia = $request->anestesias_ayudantes_protocolo_operatorio;
        $protocolo_operatorio->arsenaleria = $request->arsenaleria_protocolo_operatorio;
        $protocolo_operatorio->biopsia_rapida = $request->biopsia_rapida_protocolo_operatorio;
        $protocolo_operatorio->biopsia_diferida = $request->biopsia_diferida_protocolo_operatorio;
        $protocolo_operatorio->biopsia_nro_muestras = $request->biopsia_nro_muestra_protocolo_operatorio;
        $protocolo_operatorio->biopsia_patologo = $request->biopsia_patologo_protocolo_operatorio;
        $protocolo_operatorio->nombre_operacion = $request->nombre_operacion_protocolo_operatorio;
        $protocolo_operatorio->material_hemostasia = $request->material_hemostasia_protocolo_operatorio;
        $protocolo_operatorio->material_cierre = $request->material_cierre_protocolo_operatorio;
        $protocolo_operatorio->otros_implantes = $request->otros_materiales_protocolo_operatorio;
        $protocolo_operatorio->descripcion_cirugia = $request->descripcion_cirugia_protocolo_operatorio;
        $protocolo_operatorio->farmacos = $request->farmacos_protocolo_operatorio;
        $protocolo_operatorio->pulso_presion_arterial = $request->pulso_presion_protocolo_operatorio;
        $protocolo_operatorio->incidentes = $request->incidentes_protocolo_operatorio;
        $protocolo_operatorio->recuperacion_anestesia = $request->recuperacion_anestesia_protocolo_operatorio;
        $protocolo_operatorio->descripcion_anestesia = $request->descripcion_anestesia_protocolo_operatorio;
        $protocolo_operatorio->incidencias = $request->descripcion_incidencia_protocolo_operatorio;
        $protocolo_operatorio->destino_paciente = $request->destino_protocolo_operatorio;
        $protocolo_operatorio->indicaciones_postoperacion = $request->indicaciones_postoperacion_protocolo_operatorio;

        // $protocolo_operatorio->id_paciente = $request->paciente_protocolo_operatorio;
        // $protocolo_operatorio->id_profesional = $profesional->id;
        // $protocolo_operatorio->id_ficha_atencion = $request->;
        // $protocolo_operatorio->id_lugar_atencion = $request->lugar_atencion_protocolo_operatorio;
        $protocolo_operatorio->id_solicitud_pabellon = $request->id_solicitud_pabellon;

        if (!$protocolo_operatorio->save()) {
            return back();
        }
        $mensaje = 'Se ha agregado Protocolo operatorio de forma exitosa';

        return redirect()->back()->with('mensaje', $mensaje);
    }

    public function actualizar_protocolo_cirugia(Request $request)
    {
        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();

        $protocolo_operatorio = ProtocoloOperatorioCirugia::FindOrFail($request->id_protocolo);

        $protocolo_operatorio->nro_pabellon = $request->nro_pabellon_protocolo_operatorio;
        $protocolo_operatorio->inicio_operacion = $request->inicio_operacion_protocolo_operatorio;
        $protocolo_operatorio->fin_operacion = $request->fin_operacion_protocolo_operatorio;
        $protocolo_operatorio->diagnostico_preoperatorio = $request->diag_preoperatorio_protocolo_operatorio;
        $protocolo_operatorio->diagnostico_postoperatorio = $request->diag_postoperatorio_protocolo_operatorio;
        $protocolo_operatorio->codigo_cirugia = $request->codigo_cirugia_protocolo_operatorio;
        $protocolo_operatorio->anestesia = $request->anestesia_protocolo_operatorio;
        $protocolo_operatorio->cirujano = $request->cirujano_protocolo_operatorio;
        $protocolo_operatorio->ayudantes = $request->ayudantes_protocolo_operatorio;
        $protocolo_operatorio->anestesistas_ayudantes_anestesia = $request->anestesias_ayudantes_protocolo_operatorio;
        $protocolo_operatorio->arsenaleria = $request->arsenaleria_protocolo_operatorio;
        $protocolo_operatorio->biopsia_rapida = $request->biopsia_rapida_protocolo_operatorio;
        $protocolo_operatorio->biopsia_diferida = $request->biopsia_diferida_protocolo_operatorio;
        $protocolo_operatorio->biopsia_nro_muestras = $request->biopsia_nro_muestra_protocolo_operatorio;
        $protocolo_operatorio->biopsia_patologo = $request->biopsia_patologo_protocolo_operatorio;
        $protocolo_operatorio->nombre_operacion = $request->nombre_operacion_protocolo_operatorio;
        $protocolo_operatorio->material_hemostasia = $request->material_hemostasia_protocolo_operatorio;
        $protocolo_operatorio->material_cierre = $request->material_cierre_protocolo_operatorio;
        $protocolo_operatorio->otros_implantes = $request->otros_materiales_protocolo_operatorio;
        $protocolo_operatorio->descripcion_cirugia = $request->descripcion_cirugia_protocolo_operatorio;
        $protocolo_operatorio->farmacos = $request->farmacos_protocolo_operatorio;
        $protocolo_operatorio->pulso_presion_arterial = $request->pulso_presion_protocolo_operatorio;
        $protocolo_operatorio->incidentes = $request->incidentes_protocolo_operatorio;
        $protocolo_operatorio->recuperacion_anestesia = $request->recuperacion_anestesia_protocolo_operatorio;
        $protocolo_operatorio->descripcion_anestesia = $request->descripcion_anestesia_protocolo_operatorio;
        $protocolo_operatorio->incidencias = $request->descripcion_incidencia_protocolo_operatorio;
        $protocolo_operatorio->destino_paciente = $request->destino_protocolo_operatorio;
        $protocolo_operatorio->indicaciones_postoperacion = $request->indicaciones_postoperacion_protocolo_operatorio;

        // $protocolo_operatorio->id_paciente = $request->paciente_protocolo_operatorio;
        // $protocolo_operatorio->id_profesional = $profesional->id;
        // $protocolo_operatorio->id_ficha_atencion = $request->;
        // $protocolo_operatorio->id_lugar_atencion = $request->lugar_atencion_protocolo_operatorio;
        $protocolo_operatorio->id_solicitud_pabellon = $request->id_solicitud_pabellon;

        if (!$protocolo_operatorio->save()) {
            return back();
        }

        $medicamentos = json_decode($request->medicamentos_cirugia);

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
                $detalle_receta->id_protocolo = $protocolo_operatorio->id;
                $detalle_receta->receta = $protocolo_operatorio->id;
                $detalle_receta->estado = 1;

                if (!$detalle_receta->save()) {
                    return 'error';
                }
            }
        }

        $examenes = json_decode($request->examenes_cirugia);

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
                $examen->id_protocolo = $protocolo_operatorio->id;
                // $examen->id_ficha_atencion = $ficha->id;
                // $examen->id_paciente = $id_paciente;

                if (!$examen->save()) {
                    return 'error';
                }
            }
        }
        $mensaje = 'Se ha agregado Protocolo operatorio de forma exitosa';

        return redirect()->back()->with('mensaje', $mensaje);
    }


    public function sala_recuperacion(Request $request)
    {
        $id_solicitud_pabellon = $request->id;
        $solicitud_pabellon = SolicitudPabellonQuirurgico::where('id', $request->id)->first();
        $lugar_atencion = LugarAtencion::where('id', $solicitud_pabellon->id_lugar_atencion)->first();
        $recuperacion = RecuperacionCirugia::where('id_solicitud_pabellon', $id_solicitud_pabellon)->first();
        $recuperaciones = RecuperacionCirugia::where('id_solicitud_pabellon', $request->id)->get();
        $paciente = Paciente::where('id', $solicitud_pabellon->id_paciente)->first();
        //$protocolo = IngresoPacienteCirugia::where('id_solicitud_pabellon', $id_solicitud_pabellon)->first();
        $examenMedico = ExamenMedico::where('cod_parent', 0)->get();
        $regiones = Region::all();
        $ciudades = Ciudad::where('id_region', $paciente->Direccion()->first()->Ciudad()->first()->id_region)->get();

        if (isset($recuperaciones)) {
            foreach ($recuperaciones as $recuperacion) {
                $medicamentos = DetalleReceta::where('id_recuperacion', $recuperacion->id)->get();
                $recuperacion->medicamentos = $medicamentos;
            }
        }

        if (isset($recuperaciones)) {
            foreach ($recuperaciones as $recuperacion) {
                $examenes = ExamenPPF::where('id_recuperacion', $recuperacion->id)->get();
                $recuperacion->examenes = $examenes;
            }
        }
        if (isset($recuperaciones)) {
            foreach ($recuperaciones as $recuperacion) {
                $interconsultas = Interconsulta::where('id_recuperacion', $recuperacion->id)->get();
                $recuperacion->interconsultas = $interconsultas;
            }
        }

        return view('app.cirugia.secciones_cirugia.sala_recuperacion')->with([
            'id_solicitud_pabellon' => $id_solicitud_pabellon,
            'paciente' => $paciente,
            'lugar_atencion' => $lugar_atencion,
            'recuperacion' => $recuperacion,
            'recuperaciones' => $recuperaciones,
            'examenMedico' => $examenMedico,
            'regiones' => $regiones,
            'ciudades' => $ciudades,
        ]);
    }

    public function registrar_recuperacion_cirugia(Request $request)
    {
        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();

        $recuperacion = new RecuperacionCirugia();
        $recuperacion->evolucion = $request->evolucion;
        $recuperacion->resumen_evolucion = $request->resumen_evolucion;

        // $protocolo_operatorio->id_paciente = $request->paciente_protocolo_operatorio;
        $recuperacion->id_profesional = $profesional->id;
        // $protocolo_operatorio->id_ficha_atencion = $request->;
        // $protocolo_operatorio->id_lugar_atencion = $request->lugar_atencion_protocolo_operatorio;
        $recuperacion->id_solicitud_pabellon = $request->id_solicitud_pabellon;

        // $recuperaciones = RecuperacionCirugia::where('id_solicitud_pabellon', $request->id_solicitud_pabellon)->get();

        if (!$recuperacion->save()) {
            return back();
        }
        $medicamentos = json_decode($request->medicamentos_cirugia);

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
                $detalle_receta->id_recuperacion = $recuperacion->id;
                $detalle_receta->receta = $recuperacion->id;
                $detalle_receta->estado = 1;

                if (!$detalle_receta->save()) {
                    return 'error';
                }
            }
        }
        $examenes = json_decode($request->examenes_cirugia);

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
                $examen->id_recuperacion = $recuperacion->id;
                // $examen->id_ficha_atencion = $ficha->id;
                // $examen->id_paciente = $id_paciente;

                if (!$examen->save()) {
                    return 'error';
                }
            }
        }


        $interconsultas = json_decode($request->interconsultas_cirugia);

        if (!$interconsultas == null) {
            for ($i = 0; $i < count($interconsultas); ++$i) {
                $interconsulta = new Interconsulta();

                $interconsulta->fecha_solicitud = \Carbon\Carbon::now()->format('Y/m/d');
                $interconsulta->nombre_esp = $interconsultas[$i]->nombre_especialista_interconsulta;
                $interconsulta->hipotesis = $interconsultas[$i]->hipotesis_interconsulta;
                $interconsulta->comentarios = $interconsultas[$i]->comentarios_interconsulta;

                //$examen->id_profesional = $profesional->id;
                $interconsulta->id_recuperacion = $recuperacion->id;
                // $examen->id_ficha_atencion = $ficha->id;
                // $examen->id_paciente = $id_paciente;

                if (!$interconsulta->save()) {
                    return 'error';
                }
            }
        }

        $mensaje = 'Se ha agregado Protocolo operatorio de forma exitosa';

        return redirect()->back()->with(['mensaje' => $mensaje,]);
    }

    public function sala_hospitalizacion(Request $request)
    {
        $id_solicitud_pabellon = $request->id;

        $solicitud_pabellon = SolicitudPabellonQuirurgico::where('id', $request->id)->first();
        $lugar_atencion = LugarAtencion::where('id', $solicitud_pabellon->id_lugar_atencion)->first();
        $sala_hospitalizacion = SalaCirugia::where('id_solicitud_pabellon', $id_solicitud_pabellon)->first();
        $sala_hospitalizaciones = SalaCirugia::where('id_solicitud_pabellon', $request->id)->get();
        $paciente = Paciente::where('id', $solicitud_pabellon->id_paciente)->first();
        //$protocolo = IngresoPacienteCirugia::where('id_solicitud_pabellon', $id_solicitud_pabellon)->first();
        $examenMedico = ExamenMedico::where('cod_parent', 0)->get();
        $regiones = Region::all();
        $ciudades = Ciudad::where('id_region', $paciente->Direccion()->first()->Ciudad()->first()->id_region)->get();

        if (isset($sala_hospitalizaciones)) {
            foreach ($sala_hospitalizaciones as $sh) {
                $medicamentos = DetalleReceta::where('id_sala', $sh->id)->get();
                $sh->medicamentos = $medicamentos;
            }
        }

        if (isset($sala_hospitalizaciones)) {
            foreach ($sala_hospitalizaciones as $sh) {
                $examenes = ExamenPPF::where('id_sala', $sh->id)->get();
                $sh->examenes = $examenes;
            }
        }
        if (isset($sala_hospitalizaciones)) {
            foreach ($sala_hospitalizaciones as $sh) {
                $interconsultas = Interconsulta::where('id_sala', $sh->id)->get();
                $sh->interconsultas = $interconsultas;
            }
        }

        return view('app.cirugia.secciones_cirugia.sala_hospitalizacion')->with([
            'id_solicitud_pabellon' => $id_solicitud_pabellon,
            'paciente' => $paciente,
            'lugar_atencion' => $lugar_atencion,
            'sala_hospitalizacion' => $sala_hospitalizacion,
            'sala_hospitalizaciones' => $sala_hospitalizaciones,
            'examenMedico' => $examenMedico,
            'regiones' => $regiones,
            'ciudades' => $ciudades,
        ]);
    }

    public function registrar_hospitalizacion_cirugia(Request $request)
    {
        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();


        $sala_hospitalizacion = new SalaCirugia();
        $sala_hospitalizacion->evolucion = $request->evolucion1;
        $sala_hospitalizacion->resumen_evolucion = $request->resumen_evolucion1;

        // $protocolo_operatorio->id_paciente = $request->paciente_protocolo_operatorio;
        $sala_hospitalizacion->id_profesional = $profesional->id;
        // $protocolo_operatorio->id_ficha_atencion = $request->;
        // $protocolo_operatorio->id_lugar_atencion = $request->lugar_atencion_protocolo_operatorio;
        $sala_hospitalizacion->id_solicitud_pabellon = $request->id_solicitud_pabellon;

        // $recuperaciones = RecuperacionCirugia::where('id_solicitud_pabellon', $request->id_solicitud_pabellon)->get();

        if (!$sala_hospitalizacion->save()) {
            return back();
        }

        $medicamentos = json_decode($request->medicamentos_cirugia);

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
                $detalle_receta->id_sala = $sala_hospitalizacion->id;
                $detalle_receta->receta = $sala_hospitalizacion->id;
                $detalle_receta->estado = 1;

                if (!$detalle_receta->save()) {
                    return 'error';
                }
            }
        }

        $examenes = json_decode($request->examenes_cirugia);

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
                $examen->id_sala = $sala_hospitalizacion->id;
                // $examen->id_ficha_atencion = $ficha->id;
                // $examen->id_paciente = $id_paciente;

                if (!$examen->save()) {
                    return 'error';
                }
            }
        }


        $interconsultas = json_decode($request->interconsultas_cirugia);

        if (!$interconsultas == null) {
            for ($i = 0; $i < count($interconsultas); ++$i) {
                $interconsulta = new Interconsulta();

                $interconsulta->fecha_solicitud = \Carbon\Carbon::now()->format('Y/m/d');
                $interconsulta->nombre_esp = $interconsultas[$i]->nombre_especialista_interconsulta;
                $interconsulta->hipotesis = $interconsultas[$i]->hipotesis_interconsulta;
                $interconsulta->comentarios = $interconsultas[$i]->comentarios_interconsulta;

                //$examen->id_profesional = $profesional->id;
                $interconsulta->id_sala = $sala_hospitalizacion->id;
                // $examen->id_ficha_atencion = $ficha->id;
                // $examen->id_paciente = $id_paciente;

                if (!$interconsulta->save()) {
                    return 'error';
                }
            }
        }


        $mensaje = 'Se ha agregado Protocolo operatorio de forma exitosa';

        return redirect()->back()->with(['mensaje' => $mensaje,]);
    }

    public function epicrisis_alta_medica(Request $request)
    {
        $id_solicitud_pabellon = $request->id;
        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();

        $solicitud_pabellon = SolicitudPabellonQuirurgico::where('id', $request->id)->first();
        $lugar_atencion = LugarAtencion::where('id', $solicitud_pabellon->id_lugar_atencion)->first();
        $epicrisis_alta_medica = EpicrisisCarnetCirugia::where('id_solicitud_pabellon', $id_solicitud_pabellon)->first();
        $paciente = Paciente::where('id', $solicitud_pabellon->id_paciente)->first();
        //$protocolo = IngresoPacienteCirugia::where('id_solicitud_pabellon', $id_solicitud_pabellon)->first();

        return view('app.cirugia.secciones_cirugia.epicrisis_alta_medica')->with([
            'id_solicitud_pabellon' => $id_solicitud_pabellon,
            'paciente' => $paciente,
            'lugar_atencion' => $lugar_atencion,
            'epicrisis_alta_medica' => $epicrisis_alta_medica,
            'profesional' => $profesional,

        ]);
    }

    public function registrar_epicrisis_alta_medica(Request $request)
    {
        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();

        $epicrisis_alta_medica = new EpicrisisCarnetCirugia();
        $epicrisis_alta_medica->inicio_hospitalizacion = $request->inicio_hospitalizacion;
        $epicrisis_alta_medica->fin_hospitalizacion = $request->fin_hospitalizacion;
        $epicrisis_alta_medica->diagnostico_ingreso = $request->diagnostico_ingreso_epicrisis_alta_medica;
        $epicrisis_alta_medica->diagnostico_alta = $request->diagnostico_alta_epicrisis_alta_medica;
        $epicrisis_alta_medica->tratamientos_cirugias = $request->tratamiento_cirugia_epicrisis_alta_medica;
        $epicrisis_alta_medica->procedimientos_quirurgicos_cirugia = $request->procedimiento_quirurgico_cirugia_epicrisis_alta_medica;
        $epicrisis_alta_medica->otros_tratamientos_procedimientos = $request->otro_procedimiento_tratamiento_cirugia_epicrisis_alta_medica;
        $epicrisis_alta_medica->tratamientos_controles = $request->tratamiento_control_cirugia_epicrisis_alta_medica;
        $epicrisis_alta_medica->procedimientos_quirurgicos_controles = $request->procedimiento_control_cirugia_epicrisis_alta_medica;
        $epicrisis_alta_medica->fecha_control = $request->fecha_control;
        $epicrisis_alta_medica->indicaciones_alta = $request->indicaciones_alta_epicrisis_alta_medica;
        //$epicrisis_alta_medica->id_paciente = $request->paciente_ingreso_epicrisis_alta_medica;
        $epicrisis_alta_medica->id_profesional = $profesional->id;
        //$epicrisis_alta_medica->id_lugar_atencion = $request->lugar_atencion_pabellon;
        $epicrisis_alta_medica->id_solicitud_pabellon = $request->id_solicitud_pabellon;

        if (!$epicrisis_alta_medica->save()) {
            return back();
        }
        $mensaje = 'Se ha agregado ingreso de paciente de forma exitosa';

        return redirect()->back()->with('mensaje', $mensaje);
    }

    public function actualizar_epicrisis_alta_medica(Request $request)
    {
        $user = Auth::user()->id;
        $profesional = Profesional::where('id_usuario', $user)->first();

        $epicrisis_alta_medica = EpicrisisCarnetCirugia::where('id_solicitud_pabellon', $request->id_solicitud_pabellon)->first();

        $epicrisis_alta_medica->inicio_hospitalizacion = $request->inicio_hospitalizacion;
        $epicrisis_alta_medica->fin_hospitalizacion = $request->fin_hospitalizacion;
        $epicrisis_alta_medica->diagnostico_ingreso = $request->diagnostico_ingreso_epicrisis_alta_medica;
        $epicrisis_alta_medica->diagnostico_alta = $request->diagnostico_alta_epicrisis_alta_medica;
        $epicrisis_alta_medica->tratamientos_cirugias = $request->tratamiento_cirugia_epicrisis_alta_medica;
        $epicrisis_alta_medica->procedimientos_quirurgicos_cirugia = $request->procedimiento_quirurgico_cirugia_epicrisis_alta_medica;
        $epicrisis_alta_medica->otros_tratamientos_procedimientos = $request->otro_procedimiento_tratamiento_cirugia_epicrisis_alta_medica;
        $epicrisis_alta_medica->tratamientos_controles = $request->tratamiento_control_cirugia_epicrisis_alta_medica;
        $epicrisis_alta_medica->procedimientos_quirurgicos_controles = $request->procedimiento_control_cirugia_epicrisis_alta_medica;
        $epicrisis_alta_medica->fecha_control = $request->fecha_control;
        $epicrisis_alta_medica->indicaciones_alta = $request->indicaciones_alta_epicrisis_alta_medica;
        //$epicrisis_alta_medica->id_paciente = $request->paciente_ingreso_epicrisis_alta_medica;
        $epicrisis_alta_medica->id_profesional = $profesional->id;
        //$epicrisis_alta_medica->id_lugar_atencion = $request->lugar_atencion_pabellon;
        $epicrisis_alta_medica->id_solicitud_pabellon = $request->id_solicitud_pabellon;

        if (!$epicrisis_alta_medica->save()) {
            return back();
        }
        $mensaje = 'Se ha agregado ingreso de paciente de forma exitosa';

        return redirect()->back()->with('mensaje', $mensaje);
    }
}