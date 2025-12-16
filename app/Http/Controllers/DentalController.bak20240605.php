<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AnestesiaPaciente;
use App\Models\Antecedente;
use App\Models\AntecedenteAlergiaPaciente;
use App\Models\AntecedenteAnestesiaPaciente;
use App\Models\AntecedenteFracturaPaciente;
use App\Models\AntecedenteHemorragiaPaciente;
use App\Models\AntecedenteMedicamentoCronico;
use App\Models\AntecedentesPaciente;
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
use App\Models\Diabete;
use App\Models\DiagnosticoCie;
use App\Models\EndodonciaPaciente;
use App\Models\Especialidad;
use App\Models\ExamenEspecialidadTipo;
use App\Models\ExamenMedico;
use App\Models\ExamenPPF;
use App\Models\ExamenRadiologico;
use App\Models\FichaAtencion;
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
use App\Models\OdontogramaPaciente;
use App\Models\OrdenTrabajoMayor;
use App\Models\OrdenTrabajoMenor;
use App\Models\Paciente;
use App\Models\PacienteContactoEmergencia;
use App\Models\PedidoInsumos;
use App\Models\PedidoMateriales;
use App\Models\Prevision;
use App\Models\Producto;
use App\Models\Profesional;
use App\Models\ProfesionalHorario;
use App\Models\ProtocoloOperatorioCirugia;
use App\Models\RecetaDosis;
use App\Models\RecetaPresentacion;
use App\Models\Region;
use App\Models\SolicitudPabellonQuirurgico;
use App\Models\TipoExamen;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use PDF;



class DentalController extends Controller

{
    // public function index(Request $request)
    // {
    //     $hora = HoraMedica::where('id', $request->id_hora_realizar)->first();
    //     $paciente = Paciente::where('id', $hora->id_paciente)->first();
    //     /* FMU CONTACTO EMERGENCIA */
    //     $pacientes_contacto_emergencia = PacienteContactoEmergencia::with('ContactoEmergencia')->where('id_paciente',$paciente->id)->get();
    //     /** FMU ALERGIAS */
    //     $paciente_alergias = Antecedente::where('id_paciente', $paciente->id)->where('id_tipo_antecedente', 5)->get();

    //     $ciudades = Ciudad::where('id_region', $paciente->Direccion()->first()->Ciudad()->first()->id_region)->get();
    //     $regiones = Region::all();
    //     // $examenMedico = ExamenMedico::where('cod_parent', 0)->whereBetween('id',[1,362])->orderby('nombre_examen', 'ASC')->get();
    //     $examenMedico = ExamenMedico::where('cod_parent', 0)->where('habilitado', 1)->orderby('nombre_examen', 'ASC')->get();
    //     $user = Auth::user()->id;
    //     $profesional = Profesional::where('id_usuario', $user)->first();

    //     // CONSULTAS PREVIAS
    //     // $fichas = FichaAtencion::where('id_paciente', $hora->id_paciente)->where('confidencial', false)->where('finalizada', 1)->get();
    //     $filtro_previas = array();
    //     $filtro_previas[] = array('id_paciente', $hora->id_paciente);
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
    //     $filtro_fichaAtencion[] = array('id_paciente', $hora->id_paciente);
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
    //     if ($hora->id_estado != 5 && $hora->id_estado != 6)
    //     {
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
    //     }

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
    //         if($profesional->id_tipos_especialidad == 18)
    //         {
    //             //odontologia general
    //             $ruta_blade = 'atencion_odontologica.atencion_odontologica_general';
    //            // $fichaTipo['oft'] = FichaOftTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //            // //$fichaTipo['bio'] = FichaOftBiomicroscopiaTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //            // $fichaTipo['fo'] = FichaOftFondoOjoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();

    //             $examen = '';
    //             $lista_examen_especial = '';

    //             /** examenes de la especialidad */
    //             $examenes_especialidad = '';
    //             $examenes_especialidad = ExamenMedico::whereIn('cod_parent',[601])->orderBy('nombre_examen', 'ASC')->get();

    //             /** examenes radiologicos */
    //             $examenes_radiologicos = '';
    //             $examenes_radiologicos = ExamenMedico::whereIn('cod_parent',[355,356,357,358,359,360,361])->orderBy('nombre_examen', 'ASC')->get();
    //         }
    //         else if($profesional->id_tipos_especialidad == 19)
    //         {
    //             //odonto-pediatria
    //             $ruta_blade = 'atencion_odontologica.atencion_odontopediatria';
    //             //$fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();

    //             //$examen_tipo = ExamenEspecialidadTipo::where('id_sub_tipo_especialidad', $profesional->id_sub_tipo_especialidad)->with('ExamenEspecialidadTemplate')->first();
    //            // $examen = $examen_tipo->ExamenEspecialidadTemplate->cuerpo;
    //             $lista_examen_especial = '';

    //             /** examenes de la especialidad */
    //             $examenes_especialidad = '';
    //             $examenes_especialidad = ExamenMedico::whereIn('cod_parent',[582])->orderBy('nombre_examen', 'ASC')->get();

    //             /** examenes radiologicos */
    //             $examenes_radiologicos = '';
    //             $examenes_radiologicos = ExamenMedico::whereIn('cod_parent',[355,356,357,358,359,360,361])->orderBy('nombre_examen', 'ASC')->get();


    //         }
    //         else if($profesional->id_tipos_especialidad == 15)
    //         {
    //             $examen = array();
    //             //endodoncia
    //             $ruta_blade = 'atencion_odontologica.atencion_endodoncia';
    //             //$fichaTipo['uro'] = FichaUroTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
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
    //         else if($profesional->id_tipos_especialidad == 16)
    //         {
    //             //implantologia
    //             $ruta_blade = 'atencion_odontologica.atencion_implantologia';
    //             // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //             $fichaTipo = '';
    //             $examen = '';
    //             $lista_examen_especial = '';

    //             /** examenes de la especialidad */
    //             $examenes_especialidad = '';

    //             /** examenes radiologicos */
    //             $examenes_radiologicos = '';
    //         }
    //         else if($profesional->id_tipos_especialidad == 22)
    //         {
    //             //rehabilitacion oral
    //             $ruta_blade = 'atencion_odontologica.atencion_rehabilitacion_oral';
    //             // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //             $fichaTipo = '';
    //             $examen = '';
    //             $lista_examen_especial = '';

    //             /** examenes de la especialidad */
    //             $examenes_especialidad = '';

    //             /** examenes radiologicos */
    //             $examenes_radiologicos = '';
    //         }
    //         else if($profesional->id_tipos_especialidad == 17)
    //         {
    //             //odontologia estetica
    //             $ruta_blade = 'atencion_odontologica.atencion_od_estetica';
    //             // $fichaTipo = FichaOtorrinoTipo::select('id','nombre','descripcion')->where('id_profesional', $profesional->id)->get();
    //             $fichaTipo = '';
    //             $examen = '';
    //             $lista_examen_especial = '';

    //             /** examenes de la especialidad */
    //             $examenes_especialidad = '';

    //             /** examenes radiologicos */
    //             $examenes_radiologicos = '';
    //         }
    //         else if($profesional->id_tipos_especialidad == 21)
    //         {
    //             //periodoncia
    //             $ruta_blade = 'atencion_odontologica.atencion_periodoncia';
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
    //         else if($profesional->id_tipos_especialidad == 56)
    //         {
    //             //especialista en transtornos temporomandibulares
    //             $ruta_blade = 'atencion_odontologica.atencion_ttm';
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
    //             $ruta_blade = 'atencion_odontologica.atencion_odontologica_general';
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
    //             'pacientes_contacto_emergencia' => $pacientes_contacto_emergencia,
    //             'paciente_alergias' => $paciente_alergias,
    //             'prevision' => $prevision,
    //             'profesional' => $profesional,
    //             'medicamento' => $medicamento,
    //             'hora_medica' => $hora,
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
    //INICIO Cirugia Dental

    public function registrar_ficha_atencion_dental(Request $request)
    {
        $mensaje = '';
        $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();

        $ficha_dental = FichaAtencionDental::where('id', $hora_medica->id_ficha_dental)->first();
        if($ficha_dental)
        {
            $user = Auth::user()->id;
            $profesional = Profesional::where('id_usuario', $user)->first();

            $ficha_dental->motivo = $request->motivo;
            $ficha_dental->antecedentes = $request->antecedentes;
            $ficha_dental->examen_fisico = $request->examen_fisico;


            // $ficha_dental = new FichaAtencionDental();



            // //PACIENTE MENOR DE EDAD
            // if ($request->es_ficha_infantil == 1) {

            //     $ficha_dental->rut_acompañante = $request->rut_acompañante_ficha_dental;
            //     $ficha_dental->nombre_acompañante = $request->nombre_acompañante_ficha_dental;
            //     $ficha_dental->relacion_acompañante = $request->relacion_acompañante_ficha_dental;
            //     $ficha_dental->rut_responsable_pago = $request->rut_responsable_pago_ficha_dental;
            //     $ficha_dental->nombre_acompañante_pago = $request->nombre_acompañante_pago_ficha_dental;
            //     $ficha_dental->email_acompañante = $request->email_acompañante_ficha_dental;
            //     $ficha_dental->ficha_infantil = 1;

            // }

            // $ges = 0;
            // if ($request->ges_ficha_dental == 'on') {
            //     $ges = 1;
            // } else {
            //     $ges = 0;

            // }
            // $cronico = 0;

            // if ($request->cronico_ficha_dental == 'on') {
            //     $cronico = 1;
            // } else {
            //     $cronico = 0;

            // }

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
            if ($request->fracturas_ficha_dental == 'on') {
                $fracturas = 1;
            } else {
                $fracturas = 0;
            }


            //Signos vitales

            // if ($request->temperatura_ficha_dental != '') {

            //     $ficha_dental->temperatura = $request->temperatura_ficha_dental;

            // } else {

            //     $ficha_dental->temperatura = null;

            // }



            // if ($request->pulso_ficha_dental != '') {

            //     $ficha_dental->pulso = $request->pulso_ficha_dental;

            // } else {

            //     $ficha_dental->pulso = null;

            // }

            // if ($request->frecuencia_reposo_ficha_dental != '') {

            //     $ficha_dental->frecuencia_reposo = $request->frecuencia_reposo_ficha_dental;

            // } else {

            //     $ficha_dental->frecuencia_reposo = null;

            // }

            // if ($request->peso_ficha_dental != '') {

            //     $ficha_dental->peso = $request->peso_ficha_dental;

            // } else {

            //     $ficha_dental->peso = null;

            // }

            // if ($request->talla_ficha_dental != '') {

            //     $ficha_dental->talla = $request->talla_ficha_dental;

            // } else {

            //     $ficha_dental->talla = null;

            // }

            // if ($request->imc_ficha_dental != '') {

            //     $ficha_dental->imc = $request->imc_ficha_dental;

            // } else {

            //     $ficha_dental->imc = null;

            // }

            // if ($request->estado_nutricional_ficha_dental != '') {

            //     $ficha_dental->estado_nutricional = $request->estado_nutricional_ficha_dental;

            // } else {

            //     $ficha_dental->estado_nutricional = null;

            // }

            // //presion Arterial

            // if ($request->presion_bi_ficha_dental != '') {

            //     $ficha_dental->presion_bi = $request->presion_bi_ficha_dental;

            // } else {

            //     $ficha_dental->presion_bi = null;

            // }

            // if ($request->presion_bd_ficha_dental != '') {

            //     $ficha_dental->presion_bd = $request->presion_bd_ficha_dental;

            // } else {

            //     $ficha_dental->presion_bd = null;

            // }

            // if ($request->presion_de_pie_ficha_dental != '') {

            //     $ficha_dental->presion_de_pie = $request->presion_de_pie_ficha_dental;

            // } else {

            //     $ficha_dental->presion_de_pie = null;

            // }

            // if ($request->presion_sentado_ficha_dental != '') {

            //     $ficha_dental->presion_sentado = $request->presion_sentado_ficha_dental;

            // } else {

            //     $ficha_dental->presion_sentado = null;

            // }

            // //comunicacion y Traslado

            // if ($request->estado_conciencia_ficha_dental != '') {

            //     $ficha_dental->ct_estado_conciencia = $request->estado_conciencia_ficha_dental;

            // } else {

            //     $ficha_dental->ct_estado_conciencia = null;

            // }

            // if ($request->lenguaje_ficha_dental != '') {

            //     $ficha_dental->ct_lenguaje = $request->lenguaje_ficha_dental;

            // } else {

            //     $ficha_dental->ct_lenguaje = null;

            // }

            // if ($request->traslado_ficha_dental != '') {

            //     $ficha_dental->ct_traslado = $request->traslado_ficha_dental;

            // } else {

            //     $ficha_dental->ct_traslado = null;

            // }


            $ficha_dental->anestesia_local = $anestesia_local;
            $ficha_dental->anestesia_local_obs = $request->anestesia_local_obs;
            $ficha_dental->hemorragias = $hemorragias;
            $ficha_dental->hemorragias_obs = $request->hemorragias_obs;
            $ficha_dental->fracturas = $fracturas;
            $ficha_dental->fracturas_obs = $request->fracturas_obs;

            $ficha_dental->hipotesis_diagnostico = $request->descripcion_hipotesis;
            $ficha_dental->diagnostico_ce10 = $request->descripcion_cie;
            $ficha_dental->indicaciones = $request->indicaciones;

            // $ficha_dental->cronico = $cronico;
            // $ficha_dental->ges = $ges;
            // $ficha_dental->confidencial = $confidencial;
            $ficha_dental->id_paciente = $request->paciente_atencion_dental;
            $ficha_dental->id_profesional = $profesional->id;;
            $ficha_dental->finalizada = 1;

            if (!$ficha_dental->save())
            {
                return 'error';
            }
            else
            {
                $mensaje .= 'Se ha agregado Ficha Dental General de forma exitosa';

                if (isset($request->es_ficha_endodoncia) && $request->es_ficha_endodoncia == 1)
                {
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
                    if (!$endodoncia_paciente->save())
                    {
                        return 'error';
                    }
                    else
                    {
                        $mensaje .= 'Se ha agregado Endodoncia de forma exitosa';
                    }
                }

                //aca van las especialidades
            }
        }
        else
        {
            return 'error - ficha no encontrada';
            // $mensaje .= 'ficha no encontrada';
        }


        return redirect()->back()->with('mensaje', $mensaje);

    }


    /**************************************************************** */
    /**************************************************************** */
    /**************************************************************** */
    /**************************************************************** */

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

    // public function index()

    // {

    //     $paciente = Paciente::where('id', 3)->first();

    //     $ficha_dental = FichaAtencionDental::where('id_paciente', $paciente->id)->first();

    //     $regiones = Region::all();

    //     $ciudades = Ciudad::where('id_region', $paciente->Direccion()->first()->Ciudad()->first()->id_region)->get();

    //     $laboratorios = Laboratorio::all();

    //     $user = Auth::user()->id;

    //     $profesional = Profesional::where('id_usuario', $user)->first();

    //     $lugar_atencion = LugarAtencion::where('id', 1)->first();

    //     $prevision = Prevision::all();

    //     $examenMedico = ExamenMedico::where('cod_parent', 0)->get();

    //     $examen_radiologico = ExamenRadiologico::count();

    //     if ($examen_radiologico == 0) {

    //         $examen_radiologico = 1;

    //     } else {

    //         $examen_radiologico = DB::table('examenes_radiologicos')->orderBy('id', 'desc')->first()->id + 1;

    //     }

    //     $anestesias_paciente = AntecedenteAnestesiaPaciente::where('id_paciente', $paciente->id)->get();

    //     $fracturas_paciente = AntecedenteFracturaPaciente::where('id_paciente', $paciente->id)->get();

    //     $hemorragias_paciente = AntecedenteHemorragiaPaciente::where('id_paciente', $paciente->id)->get();

    //     return view('app.dental.index_dental')->with(

    //         [

    //             'paciente' => $paciente,

    //             'regiones' => $regiones,

    //             'ciudades' => $ciudades,

    //             'ficha' => $ficha_dental,

    //             'laboratorios' => $laboratorios,

    //             'profesional' => $profesional,

    //             'examen_radiologico' => $examen_radiologico,

    //             'lugar_atencion' => $lugar_atencion,

    //             'prevision' => $prevision,

    //             'examenMedico' => $examenMedico,

    //             'anestesias_paciente' => $anestesias_paciente,

    //             'fracturas_paciente' => $fracturas_paciente,

    //             'hemorragias_paciente' => $hemorragias_paciente



    //         ]

    //     );

    // }

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



            $horario_agenda = '1,2,3,4,5,6,7';

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



            $horario_agenda = '1,2,3,4,5,6,7';

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



            $horario_agenda = '1,2,3,4,5,6,7';

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



        $user = Auth::user()->id;

        $profesional = Profesional::where('id_usuario', $user)->first();



        $odontograma =  new OdontogramaPaciente();



        if (isset($request->odontograma1) && $request->odontograma1 == 1) {



            $caras = $request->caraM_check_1 . '|';

            $caras = $caras . $request->caraO_check_1 . '|';

            $caras = $caras . $request->caraD_check_1 . '|';

            $caras = $caras . $request->caraV_check_1 . '|';

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

            $caras = $caras . $request->caraV_check_4 . '|';

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



        $constancias_ges = new registrar_constancia_ges();

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

        $mensaje = 'Se ha agregado Seguro de forma exitosa';



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

    // public function autocomplete(Request $request)

    // {

    //     $search = $request->get('term');



    //     $result = Articulo::where('nombre', 'LIKE', '%' . $search . '%')->get();



    //     return response()->json($result);

    // }

    // public function autocomplete1(Request $request)

    // {



    //     $query = $request->get('query');

    //     $filterResult = Articulo::where('nombre', 'LIKE', '%' . $query . '%')->get();

    //     return response()->json($filterResult);

    // }



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

    public function registrar_biopsia(Request $request)

    {



        $user = Auth::user()->id;

        $profesional = Profesional::where('id_usuario', $user)->first();





        if ($request->biopsia_rapida = 'on') {

            $biopsia_rapida = 1;

        } else {

            $biopsia_rapida = 0;

        }



        $biopsia  = new Biopsia();



        $biopsia->laboratorio_patologia = $request->laboraorio_patologia;

        $biopsia->diagnostico_pre = $request->diagnostico_pre;

        $biopsia->diagnostico_post = $request->diagnostico_post;

        $biopsia->organo_localizacion = $request->organo_localizacion;

        $biopsia->enfermedades_asociadas = $request->enfermedades_asociadas;

        $biopsia->informacion_adicional = $request->informacion_adicional;

        $biopsia->biopsia_rapida = $biopsia_rapida;

        $biopsia->id_paciente = $request->paciente_biopsia;

        $biopsia->id_profesional = $profesional->id;



        if (!$biopsia->save()) {

            return 'error';

        }



        $mensaje = 'Se ha agregado Biopsia de forma exitosa';



        return redirect()->back()->with('mensaje', $mensaje);

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

    // public function registrar_anestesia_paciente(Request $request)

    // {



    //     $user = Auth::user()->id;

    //     $profesional = Profesional::where('id_usuario', $user)->first();



    //     $anestesia  = new AnestesiaPaciente();



    //     $anestesia->nombre_responsable = $request->nombre_responsable_anestesia_paciente;

    //     $anestesia->incapacitado_por = $request->incapacitado_por_anestesia_paciente;

    //     $anestesia->nombre_anestesia = $request->nombre_anestesia_anestesia_paciente;

    //     $anestesia->codigo_verificacion = $request->codigo_verificacion_anestesia_paciente;



    //     $anestesia->id_paciente = $request->paciente_anestesia_paciente;

    //     $anestesia->id_profesional = $profesional->id;



    //     if (!$anestesia->save()) {

    //         return 'error';

    //     }



    //     $mensaje = 'Se ha agregado Orden de trabajo menos de forma exitosa';



    //     return redirect()->back()->with('mensaje', $mensaje);

    // }

    // public function registrar_certificado_reposo(Request $request)

    // {

    //     $user = Auth::user()->id;

    //     $profesional = Profesional::where('id_usuario', $user)->first();



    //     // $hora_medica = HoraMedica::where('id', $request->hora_medica)->first();



    //     $certificado = new CertificadoReposo();

    //     $certificado->fecha_inicio = $request->fecha_inicio_certificado;

    //     $certificado->fecha_termino = $request->fecha_termino_certificado;

    //     $certificado->hipotesis = $request->hipotesis_certificado;

    //     $certificado->comentarios = $request->comentarios_certificado;

    //     $certificado->id_profesional = $profesional->id;

    //     $certificado->id_paciente = $request->paciente_certificado_reposo;

    //     $certificado->id_ficha_dental_atencion = $request->ficha_dental_id_certificado_reposo;



    //     if (!$certificado->save()) {

    //         return 'error';

    //     }



    //     $mensaje = 'Se ha agregado Orden de trabajo menor de forma exitosa';



    //     return redirect()->back()->with('mensaje', $mensaje);

    // }

    // public function registrar_interconsulta(Request $request)

    // {

    //     $user = Auth::user()->id;

    //     $profesional = Profesional::where('id_usuario', $user)->first();



    //     //$hora_medica = HoraMedica::where('id', $request->hora_medica)->first();



    //     $interconsulta = new Interconsulta();

    //     $interconsulta->nombre_esp = $request->nombre_especialista_interconsulta;

    //     $interconsulta->hipotesis = $request->hipotesis_interconsulta;

    //     $interconsulta->hipotesis = $request->comentarios_interconsulta;

    //     $interconsulta->comentarios = $request->comentarios_interconsulta;

    //     $interconsulta->fecha_solicitud = Carbon::now();

    //     $interconsulta->id_profesional = $profesional->id;

    //     $interconsulta->id_paciente = $request->paciente_interconsulta;

    //     $interconsulta->id_ficha_dental_atencion = $request->ficha_dental_id_interconsulta;



    //     if (!$interconsulta->save()) {

    //         return 'error';

    //     }



    //     $mensaje = 'Se ha agregado Orden de trabajo menos de forma exitosa';



    //     return redirect()->back()->with('mensaje', $mensaje);

    // }

    // public function registrar_informe_medico(Request $request)

    // {

    //     $user = Auth::user()->id;

    //     $profesional = Profesional::where('id_usuario', $user)->first();



    //     //$hora_medica = HoraMedica::where('id', $request->hora_medica)->first();



    //     $informe = new InformeMedico();

    //     $informe->informe_medico = $request->comentarios_informe_medico;

    //     $informe->fecha_informe_medico = $request->fecha_informe_medico;

    //     $informe->id_profesional = $profesional->id;

    //     $informe->id_paciente = $request->paciente_informe_medico;

    //     $informe->id_ficha_dental_atencion = $request->ficha_dental_id_informe_medico;



    //     if (!$informe->save()) {

    //         return 'error';

    //     }



    //     $mensaje = 'Se ha agregado Orden de trabajo menos de forma exitosa';



    //     return redirect()->back()->with('mensaje', $mensaje);

    // }

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

            $employees = Articulo::orderby('nombre', 'asc')->select('id', 'nombre', 'droga', 'cant_comp')->limit(15)->get();

        } else {

           //  $employees = Articulo::orderby('nombre', 'asc')->select('id', 'nombre')->where('nombre', 'like', '%' . $search . '%')->limit(15)->get();

            $employees = Articulo::orderby('nombre', 'asc')->select('id', 'nombre','droga', 'cant_comp')->where('nombre', 'like', $search . '%')->limit(15)->get();

        }



        $response = array();

        foreach ($employees as $employee) {

            $response[] = array("value" => $employee->id, "label" => $employee->nombre,"droga" => $employee->droga);

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

    public function getDosis(Request $request)

    {



        //$articulo = Articulo::where('id', $request->id_medicamento)->first()->dosis;



        $dosis = Articulo::where('cod_parent', $request->id_medicamento)->get();



        return json_encode($dosis);

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

}
