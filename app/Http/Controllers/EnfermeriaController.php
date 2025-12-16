<?php

namespace App\Http\Controllers;

use App\Models\Antecedente;
use App\Models\AntecedentesPaciente;
use App\Models\AntecedenteMedicamentoCronico;
use App\Models\AntecedenteAlergiaPaciente;
use App\Models\AsignacionUrgencia;
use App\Http\Controllers\Controller;
use App\Models\ContactoEmergencia;
use App\Models\ControlObesidad;
use App\Models\CuracionesPlanasServicio;
use App\Models\CuracionesTipo;
use App\Models\CuracionesServicio;
use App\Models\CuracionesLppServicio;
use App\Models\Direccion;
use App\Models\Diabete;
use App\Models\EvolucionPacienteHospital;
use App\Models\EvolucionUrgencia;
use App\Models\ExamenMedico;
use App\Models\ExamenEspecialidad;
use App\Models\FichaAtencion;
use App\Models\GrupoSanguineo;
use App\Models\Hipertension;
use App\Models\HoraMedica;
use App\Models\Instituciones;
use App\Models\InformesUrgenciasPuntaje;
use Illuminate\Http\Request;
use App\Models\SolicitudPabellonQuirurgico;
use App\Models\Paciente;
use App\Models\PacienteSala;
use App\Models\PacienteTriage;
use App\Models\PacienteContactoEmergencia;
use App\Models\PacientesDependientes;
use App\Models\ProcedimientoServicio;
use App\Models\Profesional;
use App\Models\ProfesionalServicioClinico;
use App\Models\RecetaControl;
use App\Models\TipoApreciacionClinicaPaciente;
use App\Models\TiposReceta;
use App\Models\TipoRolesIncidentePaciente;
use App\Models\Region;
use App\Models\Recomendacion;
use App\Models\RecomendacionDetalle;
use App\Models\Responsable;
use App\Models\ResultadoExamen;
use App\Models\ServiciosInternos;
use App\Models\ServiciosInternosSalas;
use App\Models\Ciudad;

use Illuminate\Support\Facades\Auth;

class EnfermeriaController extends Controller
{
    public function enfermera_administrativa(){
        return view('app.enfermeria.enfermera_administrativa');
    }
    public function enfermera_tratante(){
        return view('app.enfermeria.enfermera_tratante');
    }
    public function enfermera_tens(){
        return view('app.enfermeria.enfermera_tens');
    }

    public function enfermera_atencion(Request $request){
        try {
            $datos = array();
            $error = array();
            $valido = 1;

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

            $controles_ciclo_hosp = $this->dameEvolucionesPacienteHosp($paciente['id']);


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
            $examenControlador = new ExamenMedicoController();
            $examenes_solicitados = $examenControlador->dame_examenes_solicitados($paciente->id);
            $curaciones = $this->dameCuracionesPaciente($paciente->id);
            $curaciones_planas = $this->dameCuracionesPlanasPaciente($paciente->id);
            $enfermeraControlador = new EscritorioEnfermerasController();
            $curaciones_lpp = $enfermeraControlador->dameCuracionesLppPaciente($paciente->id);

            // return json_encode($examenes_solicitados[0]->datos_examen->lado);
            // variable que identifica si el usuario es enfermera
            $enfermera = true;

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



        $resumen_recetas = "";
            foreach($recetas as $r){
                $resumen_recetas .= "<p>".$r->nombre_medicamento." ".$r->dosis." ".$r->nombre_frecuencia." ".$r->duracion." ".$r->comentario." con fecha ".$r->created_at."</p>";
            }


        $regiones = Region::all();
        $ciudades = Ciudad::all();

        $institucion = Instituciones::find(12);


        $servicio_interno = ServiciosInternos::find($request->id_servicio);

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

        $paciente_sala = PacienteSala::select('paciente_sala.*','pacientes.nombres','pacientes.apellido_uno as apellido_uno_paciente','pacientes.apellido_dos as apellido_dos_paciente','profesionales.nombre','profesionales.apellido_uno','profesionales.apellido_dos','pacientes_triage.id as id_paciente_triage')
                                    ->join('pacientes','paciente_sala.id_paciente','pacientes.id')
                                    ->join('profesionales','paciente_sala.id_profesional','profesionales.id')
                                    ->join('pacientes_triage','pacientes_triage.id_paciente','=','paciente_sala.id_paciente')
                                    ->where('paciente_sala.id_servicio_interno',$servicio_interno->id)
                                    ->where('paciente_sala.id_paciente',$paciente->id)
                                    ->first();

            switch ($paciente_sala->nivel_urgencia) {
                case 1:
                    # code...
                    $paciente_sala->urgencia = 'Leve';
                    $paciente_sala->clase_html = 'bg-primary text-white';
                    break;
                case 2:
                    $paciente_sala->urgencia = 'Media Gravedad';
                    $paciente_sala->clase_html = 'bg-warning text-white';
                    break;
                case 3:
                    $paciente_sala->urgencia = 'Grave';
                    $paciente_sala->clase_html = 'bg-danger text-white';
                    break;
                default:
                    # code...
                    $paciente_sala->urgencia = '-----';
                    break;
            }

            return view('app.adm_hospital.servicios.enfermera.escritorio_atencion')->with([
                'servicio' => $servicio_interno,
                'paciente' => $paciente,
                'paciente_sala' => $paciente_sala,
                'responsables' => $responsables,
                'controles_ciclo' => $controles_ciclo,
                'controles_ciclo_hosp' => $controles_ciclo_hosp,
                'ultimo_control_ciclo' => $ultimo_control_ciclo,
                'niveles_urgencia' => $niveles_urgencia,
                'contador_div_evaluaciones' => $contador_div_evaluaciones,
                'tipos_curaciones' => $tipos_curaciones,
                'tipos_receta' => $tipos_receta,
                'recetas' => $recetas,
                'tiene_receta_pendiente' => $tieneRecetaPendiente_,
                'resumen_recetas' => $resumen_recetas,
                'procedimientos' => $procedimientos,
                'examenes_solicitados' => $examenes_solicitados,
                'curaciones' => $curaciones,
                'curacion_plana' => $curaciones_planas,
                'curaciones_lpp' => $curaciones_lpp,
                'enfermera' => $enfermera,
                // 'responsable' => $responsable,
                'pacientes_contacto_emergencia' => $pacientes_contacto_emergencia,
                'paciente_alergias' => $paciente_alergias,
                // 'prevision' => $prevision,
                'profesional' => $profesional,
                // 'medicamento' => $medicamento,
                // 'hora_medica' => $hora_medica,
                // 'fichas' => $fichas,
                'ciudades' => $ciudades,
                'regiones' => $regiones,

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
                'id_lugar_atencion' =>87, // lugar de atencion de prueba
                'id_ficha_atencion' => isset($ficha_atencion) ? $ficha_atencion->id : null,
                // 'lugar_atencion' => $lugar_atencion,
                // 'lugares_atencion ' => $lugares_atencion ,
                // 'id_ficha_atencion' => $id_ficha_atencion,
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
                // 'token' => $request->token,
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
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function dameEvolucionesPacienteHosp($idpaciente){
        $controles_ciclo = EvolucionPacienteHospital::select('evoluciones_paciente_hosp.*','users.name as nombre')
                                                    ->join('users','users.id','=','evoluciones_paciente_hosp.id_responsable')
                                                    ->where('evoluciones_paciente_hosp.id_paciente', $idpaciente)
                                                    ->get();

        return $controles_ciclo;
    }

    public function salas($id){
        try {
            $servicio_interno=ServiciosInternos::select('servicio_interno.*','servicios.nombre as nombre_servicio','profesionales.nombre as nombre_responsable','profesionales.apellido_uno as apellido_uno_responsable','profesionales.apellido_dos as apellido_dos_responsable')
                                                ->join('servicios','servicios.id','=','servicio_interno.id_servicio')
                                                ->leftjoin('profesionales','profesionales.id','=','servicio_interno.id_responsable')
                                                ->where('servicio_interno.id',$id)
                                                ->first();

                $salas_servicio = ServiciosInternosSalas::where('id_servicio_interno',$servicio_interno->id)->get();


                $servicio_interno->salas = $salas_servicio;

                $pacientes_salas = PacienteSala::select('paciente_sala.*','pacientes.nombres','pacientes.apellido_uno as apellido_uno_paciente','pacientes.apellido_dos as apellido_dos_paciente','profesionales.nombre','profesionales.apellido_uno','profesionales.apellido_dos','pacientes_triage.id as id_paciente_triage')
                                    ->join('pacientes','paciente_sala.id_paciente','pacientes.id')
                                    ->join('profesionales','paciente_sala.id_profesional','profesionales.id')
                                    ->join('pacientes_triage','pacientes_triage.id_paciente','=','paciente_sala.id_paciente')
                                    ->where('paciente_sala.id_servicio_interno',$servicio_interno->id)
                                    ->get();
                foreach($pacientes_salas as $paciente){
                    switch ($paciente->nivel_urgencia) {
                        case 1:
                            # code...
                            $paciente->urgencia = 'Leve';
                            $paciente->clase_html = 'bg-primary text-white';
                            break;
                        case 2:
                            $paciente->urgencia = 'Media Gravedad';
                            $paciente->clase_html = 'bg-warning text-white';
                            break;
                        case 3:
                            $paciente->urgencia = 'Grave';
                            $paciente->clase_html = 'bg-danger text-white';
                            break;
                        default:
                            # code...
                            $paciente->urgencia = '-----';
                            break;
                    }
                }
                $servicio_interno->pacientes = $pacientes_salas;
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

            return view('app.adm_hospital.servicios.enfermera.salas_enfermeria',['servicio' => $servicio_interno])->render();
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }


    public function dameEvolucionesPaciente($idpaciente){
        $controles_ciclo = EvolucionUrgencia::select('evoluciones_urgencias.*','users.name as nombre')
                                                    ->join('users','users.id','=','evoluciones_urgencias.id_responsable')
                                                    ->where('evoluciones_urgencias.id_paciente', $idpaciente)
                                                    ->get();

        return $controles_ciclo;
    }

    public function dameProcedimientosPaciente($idpaciente){
        $procedimientos =  ProcedimientoServicio::select('procedimientos_servicio.*','users.name as responsable')
                                                 ->join('users','users.id','=','procedimientos_servicio.id_responsable')
                                                 ->where('id_paciente', $idpaciente)
                                                 ->get();

         foreach($procedimientos as $procedimiento)
         {
             // convertir el atributo datos_procedimiento de longtext a array
             $procedimiento->datos_procedimiento = json_decode($procedimiento->datos_procedimiento);
             // sacar la fecha y hora del campo created_at
             $procedimiento->fecha = date('d-m-Y', strtotime($procedimiento->created_at));
             $procedimiento->hora = date('H:i', strtotime($procedimiento->created_at));
         }

         return $procedimientos;
 }

 public function dameCuracionesPaciente($idpaciente){
     $curaciones =  CuracionesServicio::select('curaciones_servicio.*','users.name as responsable')
                                          ->join('users','users.id','=','curaciones_servicio.id_responsable')
                                          ->where('id_paciente', $idpaciente)
                                          ->get();

         foreach($curaciones as $curacion)
         {
             // convertir el atributo datos_procedimiento de longtext a array
             $curacion->datos_curacion = json_decode($curacion->datos_curacion);
             // sacar la fecha y hora del campo created_at
             $curacion->fecha = date('d-m-Y', strtotime($curacion->created_at));
             $curacion->hora = date('H:i', strtotime($curacion->created_at));
         }

         return $curaciones;
 }

 public function guardarCuracionPlanaServicio(Request $req){
    try {

     $nueva_curacion_plana = new CuracionesPlanasServicio();
     $nueva_curacion_plana->id_institucion = 19;
     $nueva_curacion_plana->id_servicio = 4;
     $nueva_curacion_plana->id_paciente = $req->id_paciente;
     $nueva_curacion_plana->id_responsable = Auth::user()->id;

     $datos_curacion = [
         'cp_asp' => $req->cp_asp,
         'cp_dol' => $req->cp_dol,
         'cp_ecal' => $req->cp_ecal,
         'cp_ecant' => $req->cp_ecant,
         'cp_ed' => $req->cp_ed,
         'cp_me' => $req->cp_me,
         'cp_pielc' => $req->cp_pielc,
         'cp_pro' => $req->cp_pro,
         'cp_tg' => $req->cp_tg,
         'cp_tn' => $req->cp_tn,
         'cp_obs' => $req->cp_obs,
         'tpo_les_curgen' => $req->tpo_les_curgen,
         'obs_cur_plana' => $req->obs_cur_plana,
         'ptos_tot_ev' => $req->ptos_tot_ev,
         'observaciones' => $req->observaciones,
     ];

     $nueva_curacion_plana->datos_curacion_plana = json_encode($datos_curacion);
     if($nueva_curacion_plana->save()){
         return ['mensaje' => 'OK'];
     }
    } catch (\Exception $e) {
     //throw $th;
     return ['mensaje' => $e->getMessage()];
    }

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

}
