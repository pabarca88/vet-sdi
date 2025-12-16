<?php

namespace App\Http\Controllers;

use App\Models\Antecedente;
use App\Models\AntecedenteAlergiaPaciente;
use App\Models\AntecedenteMedicamentoCronico;
use App\Models\AntecedentesPaciente;
use App\Models\AntecedentesUrgencias;
use App\Models\AsignacionUrgencia;
use App\Models\BoxAtencionServicio;
use App\Models\BoletaAlcoholemiaPaciente;
use App\Models\Ciudad;
use App\Models\ContactoEmergencia;
use App\Models\ControlObesidad;
use App\Models\CuracionesTipo;
use App\Models\CuracionesServicio;
use App\Models\CuracionesPlanasServicio;
use App\Models\CuracionesLppServicio;
use App\Models\DetalleRecetaInterna;
use App\Models\Diabete;
use App\Models\Direccion;
use App\Models\DrogasPaciente;
use App\Models\EvolucionUrgencia;
use App\Models\EvolucionPacienteHospital;
use App\Models\ExamenEspecialidad;
use App\Models\ExamenSadPerson;
use App\Models\ExamenMedico;
use App\Models\FichaAtencion;
use App\Models\GrupoSanguineo;
use App\Models\Hipertension;
use App\Models\HoraMedica;
use App\Models\InformesUrgenciasPuntaje;
use App\Models\JefeTurnosUrgencias;
use App\Models\NovedadesUrgencia;
use App\Models\Paciente;
use App\Models\PacienteSala;
use App\Models\PacienteBox;
use App\Models\PacienteTriage;
use App\Models\PacienteContactoEmergencia;
use App\Models\PacientesDependientes;
use App\Models\Profesional;
use App\Models\ProcedimientoServicio;
use App\Models\ProfesionalesTurnos;
use App\Models\RecetaControl;
use App\Models\Recomendacion;
use App\Models\RecomendacionDetalle;
use App\Models\Region;
use App\Models\RescatePaciente;
use App\Models\Responsable;
use App\Models\ReponsableBodega;
use App\Models\ResultadoExamen;
use App\Models\SolicitudPabellonQuirurgico;
use App\Models\TiposReceta;
use App\Models\TipoApreciacionClinicaPaciente;
use App\Models\TipoRolesIncidentePaciente;
use App\Models\User;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\DetalleRecetaController;

class EscritorioEnfermerasController extends Controller
{
    /**
     * index manejado en el index de EscritorioProfesionalController
     */

    /** METODOS DE ENFERMERIA */
    public function atencion(Request $request)
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
            return $request;
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

        $servicio_interno = ServiciosInternos::find(12);
            // return redirect()->to('page/tens/escritorio_atencion')->with([
            return view('page.enfermera.escritorio_atencion')->with([
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
                'procedimientos' => $procedimientos,
                'examenes_solicitados' => $examenes_solicitados,
                'examen_sad_person' => $examen_sad_person,
                'rescate_paciente' => $rescate_paciente ? $rescate_paciente : null,
                'examen_drogas' => $examen_drogas ? $examen_drogas : null,
                'antecedentes_urgencia_paciente' => $antecedentes_urgencia_paciente,
                'puntajes_informes' => $puntajes_informes,
                'curaciones' => $curaciones,
                'curacion_plana' => $curaciones_planas,
                'curaciones_lpp' => $curaciones_lpp,
                'enfermera' => $enfermera,
                'boxes' => $boxes,
                'pacientes_esperando' => $pacientes_esperando,
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
                'tipo_roles_incidentes' => $tipos_roles_incidentes,
                'tipos_apreciaciones_paciente' => $tipos_apreciaciones_paciente,
                'boleta_alcoholemia_paciente' => $boleta_alcoholemia_paciente,
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
                'id_ficha_atencion' => $ficha_atencion ? $ficha_atencion->id : null,
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

    public function guardar_informes(Request $req){
        try {
            $existe = InformesUrgenciasPuntaje::where('id_paciente', $req->id_paciente)->where('id_ficha_atencion', $req->id_ficha_atencion)->first();
            if($existe){
                return ['estado'=>0, 'mensaje'=>'Ya existe un informe para este paciente'];
            }
            $informe_urgencia = new InformesUrgenciasPuntaje();
            $informe_urgencia->id_paciente = $req->id_paciente;
            $informe_urgencia->id_ficha_atencion = $req->id_ficha_atencion;
            $informe_urgencia->id_lugar_atencion = $req->id_lugar_atencion;
            $informe_urgencia->barthel = $req->puntos_barthel;
            $informe_urgencia->braden = $req->puntos_braden;
            $informe_urgencia->cudyr_riesgo = $req->ptos_criesg_;
            $informe_urgencia->cudyr_dependencia = $req->puntos_cdep;
            $informe_urgencia->riesgo_caida = $req->puntos_riesgo_caida;
            $informe_urgencia->eva = $req->puntos_eva;
            $informe_urgencia->balance_hidrico = $req->puntos_balance;
            $informe_urgencia->glasgow = $req->puntos_glasgow;
            $informe_urgencia->id_profesional = Auth::user()->id;
            $informe_urgencia->fecha = Carbon::now()->format('Y-m-d');
            $informe_urgencia->id_estado = 1;
            if($informe_urgencia->save()){
                return ['estado'=>1, 'mensaje'=>'Informe guardado correctamente'];
            }else{
                return ['estado'=>0, 'mensaje'=>'Error al guardar el informe'];
            }
        } catch (\Exception $e) {
            //throw $th;
            return ['estado'=>0, 'mensaje'=>$e->getMessage()];
        }
    }

    public function dame_antecedentes_urgencia_paciente($id_paciente, $id_ficha_atencion)
    {
        $antecedentes_urgencia_paciente = AntecedentesUrgencias::where('id_paciente', $id_paciente)->where('id_ficha_atencion', $id_ficha_atencion)->first();
        if($antecedentes_urgencia_paciente){
            return $antecedentes_urgencia_paciente;
        }else{
            return null;
        }
    }

    public function entrega_turno()
    {
        try {
            $pacientes_finalizados = PacienteTriage::select('pacientes_triage.*','pacientes.nombres','pacientes.apellido_uno','pacientes.apellido_dos','pacientes.fecha_nac','pacientes.rut','asignacion_urgencia.descripcion','asignacion_urgencia.clase_html','asignacion_urgencia.codigo')
                                        ->join('pacientes','pacientes.id','=','pacientes_triage.id_paciente')
                                        ->join('asignacion_urgencia','asignacion_urgencia.id','=','pacientes_triage.id_triage')
                                        ->where('estado', 'FINALIZADO')
                                        ->orderBy('asignacion_urgencia.codigo','asc')
                                        ->get();
            $pacientes_ingresados = PacienteTriage::select('pacientes_triage.*','pacientes.nombres','pacientes.apellido_uno','pacientes.apellido_dos','pacientes.fecha_nac','pacientes.rut','asignacion_urgencia.descripcion','asignacion_urgencia.clase_html','asignacion_urgencia.codigo','paciente_box.id_box')
                                        ->join('pacientes','pacientes.id','=','pacientes_triage.id_paciente')
                                        ->join('asignacion_urgencia','asignacion_urgencia.id','=','pacientes_triage.id_triage')
                                        ->join('paciente_box','paciente_box.id_paciente','=','pacientes_triage.id_paciente')
                                        ->where('estado', 'INGRESADO')
                                        ->orderBy('asignacion_urgencia.codigo','asc')
                                        ->get();

            $pacientes_rechazados = PacienteTriage::select('pacientes_triage.*','pacientes.nombres','pacientes.apellido_uno','pacientes.apellido_dos','pacientes.fecha_nac','pacientes.rut','asignacion_urgencia.descripcion','asignacion_urgencia.clase_html','asignacion_urgencia.codigo')
                                        ->join('pacientes','pacientes.id','=','pacientes_triage.id_paciente')
                                        ->join('asignacion_urgencia','asignacion_urgencia.id','=','pacientes_triage.id_triage')
                                        ->where('estado', 'RECHAZO')
                                        ->orWhere('estado','ALTA')
                                        ->orderBy('asignacion_urgencia.codigo','asc')
                                        ->get();

            $pacientes_fallecidos = PacienteTriage::select('pacientes_triage.*','pacientes.nombres','pacientes.apellido_uno','pacientes.apellido_dos','pacientes.fecha_nac','pacientes.rut','asignacion_urgencia.descripcion','asignacion_urgencia.clase_html','asignacion_urgencia.codigo')
                                        ->join('pacientes','pacientes.id','=','pacientes_triage.id_paciente')
                                        ->join('asignacion_urgencia','asignacion_urgencia.id','=','pacientes_triage.id_triage')
                                        ->where('estado', 'FALLECIDO')
                                        ->orderBy('asignacion_urgencia.codigo','asc')
                                        ->get();

            $pacientes_graves = PacienteTriage::select('pacientes_triage.*','pacientes.nombres','pacientes.apellido_uno','pacientes.apellido_dos','pacientes.fecha_nac','pacientes.rut','asignacion_urgencia.descripcion','asignacion_urgencia.clase_html','asignacion_urgencia.codigo')
                                        ->join('pacientes','pacientes.id','=','pacientes_triage.id_paciente')
                                        ->join('asignacion_urgencia','asignacion_urgencia.id','=','pacientes_triage.id_triage')
                                        ->where('id_triage', 1)
                                        ->orWhere('id_triage', 2)
                                        ->orderBy('asignacion_urgencia.codigo','asc')
                                        ->get();

            $novedades_turno_urgencias = NovedadesUrgencia::where('fecha', date('Y-m-d'))->where('tipo_novedad','urgencias')->get();
            $novedades_turno_hospital = NovedadesUrgencia::where('fecha', date('Y-m-d'))->where('tipo_novedad','hospital')->get();

            foreach($pacientes_graves as $paciente){
                $box = BoxAtencionServicio::find($paciente->id_box);
                if($box){
                    $paciente->tipo_box = $box->tipo_box;
                    $paciente->numero_box = $box->numero_box;
                }else{
                    $paciente->tipo_box = '';
                    $paciente->numero_box = '';
                }
                list($ano,$mes,$dia) = explode("-",$paciente->fecha_nac);
                $ano_diferencia  = date("Y") - $ano;
                $mes_diferencia = date("m") - $mes;
                $dia_diferencia   = date("d") - $dia;
                if ($dia_diferencia < 0 || $mes_diferencia < 0)
                $ano_diferencia--;

                $edad = $ano_diferencia;
                $paciente->edad = $edad;
            }

            foreach($pacientes_fallecidos as $paciente)
            {
                $box = BoxAtencionServicio::find($paciente->id_box);
                if($box){
                    $paciente->tipo_box = $box->tipo_box;
                    $paciente->numero_box = $box->numero_box;
                }else{
                    $paciente->tipo_box = '';
                    $paciente->numero_box = '';
                }
                list($ano,$mes,$dia) = explode("-",$paciente->fecha_nac);
                $ano_diferencia  = date("Y") - $ano;
                $mes_diferencia = date("m") - $mes;
                $dia_diferencia   = date("d") - $dia;
                if ($dia_diferencia < 0 || $mes_diferencia < 0)
                $ano_diferencia--;

                $edad = $ano_diferencia;
                $paciente->edad = $edad;
            }

            foreach($pacientes_rechazados as $paciente)
            {
                $box = BoxAtencionServicio::find($paciente->id_box);
                if($box){
                    $paciente->tipo_box = $box->tipo_box;
                    $paciente->numero_box = $box->numero_box;
                }else{
                    $paciente->tipo_box = '';
                    $paciente->numero_box = '';
                }
                list($ano,$mes,$dia) = explode("-",$paciente->fecha_nac);
                $ano_diferencia  = date("Y") - $ano;
                $mes_diferencia = date("m") - $mes;
                $dia_diferencia   = date("d") - $dia;
                if ($dia_diferencia < 0 || $mes_diferencia < 0)
                $ano_diferencia--;

                $edad = $ano_diferencia;
                $paciente->edad = $edad;
            }


            foreach($pacientes_finalizados as $paciente)
            {
                $box = BoxAtencionServicio::find($paciente->id_box);
                if($box){
                    $paciente->tipo_box = $box->tipo_box;
                    $paciente->numero_box = $box->numero_box;
                }else{
                    $paciente->tipo_box = '';
                    $paciente->numero_box = '';
                }
                list($ano,$mes,$dia) = explode("-",$paciente->fecha_nac);
                $ano_diferencia  = date("Y") - $ano;
                $mes_diferencia = date("m") - $mes;
                $dia_diferencia   = date("d") - $dia;
                if ($dia_diferencia < 0 || $mes_diferencia < 0)
                $ano_diferencia--;

                $edad = $ano_diferencia;
                $paciente->edad = $edad;
            }

            foreach($pacientes_ingresados as $paciente)
            {
                $box = BoxAtencionServicio::find($paciente->id_box);
                if($box){
                    $paciente->tipo_box = $box->tipo_box;
                    $paciente->numero_box = $box->numero_box;
                }else{
                    $paciente->tipo_box = '';
                    $paciente->numero_box = '';
                }
                list($ano,$mes,$dia) = explode("-",$paciente->fecha_nac);
                $ano_diferencia  = date("Y") - $ano;
                $mes_diferencia = date("m") - $mes;
                $dia_diferencia   = date("d") - $dia;
                if ($dia_diferencia < 0 || $mes_diferencia < 0)
                $ano_diferencia--;

                $edad = $ano_diferencia;
                $paciente->edad = $edad;
            }

            $equipo_trabajo = JefeTurnosUrgencias::where('id_profesional', Auth::user()->id)->first();
            if($equipo_trabajo){
                $equipo_trabajo->profesional = Profesional::find($equipo_trabajo->id_profesional);
            }else{
                $equipo_trabajo = JefeTurnosUrgencias::where('id_profesional',3)->first();
            }
            // buscar los profesionales que pertenecen al equipo
            $profesionales = ProfesionalesTurnos::where('equipo', $equipo_trabajo->equipo)
                                                ->where('id_lugar_atencion', $equipo_trabajo->id_lugar_atencion)
                                                ->where('tipo_turno', $equipo_trabajo->tipo_turno)
                                                ->first();

            $profesionales->ids_profesionales = json_decode($profesionales->ids_profesionales);
            $profesionales->profesionales = Profesional::whereIn('id', $profesionales->ids_profesionales)->get();

            return view('page.enfermera.entrega_turno')->with([
                'pacientes_finalizados' => $pacientes_finalizados,
                'pacientes_ingresados' => $pacientes_ingresados,
                'pacientes_despachados' => $pacientes_rechazados,
                'pacientes_fallecidos' => $pacientes_fallecidos,
                'pacientes_graves' => $pacientes_graves,
                'novedades' => $novedades_turno_urgencias,
                'profesionales'=> $profesionales->profesionales,
            ]);
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }

    public function dame_examen_drogas($id_paciente, $id_ficha_atencion)
    {
        $examen_drogas = DrogasPaciente::where('id_paciente', $id_paciente)->where('id_ficha_atencion',$id_ficha_atencion)->first();
        if($examen_drogas){
            $examen_drogas->datos_examen_drogas = json_decode($examen_drogas->datos_examen_drogas);
            return $examen_drogas;
        }

    }

    public function dame_boleta_alcoholemia_paciente($id_paciente, $id_ficha_atencion)
    {
        $boleta_alcoholemia_paciente = BoletaAlcoholemiaPaciente::where('id_paciente', $id_paciente)->where('id_ficha_atencion',$id_ficha_atencion)->first();
        if($boleta_alcoholemia_paciente){
            $boleta_alcoholemia_paciente->datos_paciente_alcoholemia = json_decode($boleta_alcoholemia_paciente->datos_paciente_alcoholemia);
            return $boleta_alcoholemia_paciente;
        }

    }

    public function dame_examen_sad_person($id_paciente)
    {
        $examen_sad_person = ExamenSadPerson::where('id_paciente', $id_paciente)->first();
        return $examen_sad_person;
    }


    public function triage()
    {
        $pacientes = PacienteTriage::select('pacientes_triage.*','pacientes.nombres','pacientes.apellido_uno','pacientes.apellido_dos','pacientes.fecha_nac','pacientes.rut','asignacion_urgencia.descripcion','asignacion_urgencia.clase_html','asignacion_urgencia.codigo')
                                    ->join('pacientes','pacientes.id','=','pacientes_triage.id_paciente')
                                    ->join('asignacion_urgencia','asignacion_urgencia.id','=','pacientes_triage.id_triage')
                                    ->get();

        $niveles_urgencia = AsignacionUrgencia::all();

        return view('page.enfermera.escritorio_triage')->with([
            'pacientes' => $pacientes,
            'niveles_urgencia' => $niveles_urgencia,
        ]);
    }

    public function box()
    {
        $bc = new BoxController();
        $boxes = $bc->dame_boxes_atencion();
        $pacientes = PacienteTriage::select('pacientes_triage.*','pacientes.nombres','pacientes.apellido_uno','pacientes.apellido_dos','pacientes.fecha_nac','pacientes.rut','asignacion_urgencia.descripcion','asignacion_urgencia.clase_html','asignacion_urgencia.codigo')
                                    ->join('pacientes','pacientes.id','=','pacientes_triage.id_paciente')
                                    ->join('asignacion_urgencia','asignacion_urgencia.id','=','pacientes_triage.id_triage')
                                    ->where('pacientes_triage.estado',"EN ESPERA")
                                    ->orderBy('asignacion_urgencia.codigo','asc')
                                    ->get();

        // dame los pacientes que esten en cada box
        foreach($boxes as $box)
        {
            $box->pacientes = $this->dame_pacientes_box($box->id);
            foreach($box->pacientes as $paciente)
            {
                list($ano,$mes,$dia) = explode("-",$paciente->fecha_nac);
                $ano_diferencia  = date("Y") - $ano;
                $mes_diferencia = date("m") - $mes;
                $dia_diferencia   = date("d") - $dia;
                if ($dia_diferencia < 0 || $mes_diferencia < 0)
                $ano_diferencia--;

                $edad = $ano_diferencia;
                $paciente->edad = $edad;

                $detalle_receta_controlador = new DetalleRecetaController();
                $recetas = $detalle_receta_controlador->dameTodoDetalleRecetaPaciente($paciente->id_paciente);

                // Inicializar la variable booleana como false
                $tieneRecetaPendiente = false;
                // Recorrer las recetas
                foreach ($recetas as $receta) {
                    // Suponiendo que 'estado' es el campo que indica si la receta está pendiente
                    if ($receta->estado_tratamiento == 1) {
                        // Si se encuentra una receta pendiente, cambiar la variable a true
                        $tieneRecetaPendiente = true;
                        // Salir del ciclo
                        break;
                    }
                }

                $paciente->tieneRecetaPendiente = $tieneRecetaPendiente;

                $ficha_atencion = FichaAtencion::where('id_paciente', $paciente->id_paciente)->first();
                if($ficha_atencion) $paciente->id_ficha = $ficha_atencion->id; else $paciente->id_ficha = 0;
            }
        }

        $pacientes_graves = PacienteTriage::select('pacientes_triage.*','pacientes.nombres','pacientes.apellido_uno','pacientes.apellido_dos','pacientes.fecha_nac','pacientes.rut','asignacion_urgencia.descripcion','asignacion_urgencia.clase_html','asignacion_urgencia.codigo','pacientes.sexo')
                                    ->join('pacientes','pacientes.id','=','pacientes_triage.id_paciente')
                                    ->join('asignacion_urgencia','asignacion_urgencia.id','=','pacientes_triage.id_triage')
                                    ->where('pacientes_triage.id_triage', 1)
                                    ->orWhere('pacientes_triage.id_triage', 2)
                                    ->get();

        $pacientes_urgentes = [];

        foreach($pacientes_graves as $paciente){
            // calcular edad del paciente por fecha de nacimiento
            list($ano,$mes,$dia) = explode("-",$paciente->fecha_nac);
            $ano_diferencia  = date("Y") - $ano;
            $mes_diferencia = date("m") - $mes;
            $dia_diferencia   = date("d") - $dia;
            if ($dia_diferencia < 0 || $mes_diferencia < 0)
            $ano_diferencia--;

            $edad = $ano_diferencia;
            $paciente->edad = $edad;
            // pacientes que no esten en ningun box
            $p = PacienteBox::where('id_paciente', $paciente->id_paciente)->first();
            if(!$p){
                $pacientes_urgentes[] = $paciente;
            }
        }

        // dar formato de colección a los pacientes
        $pacientes_urgentes = collect($pacientes_urgentes);

        // agregar a pacientes_triage los pacientes urgentes
        $pacientes = $pacientes->merge($pacientes_urgentes);

        // por cada paciente, buscar su ficha de atencion
        // foreach($pacientes as $paciente){
        //     $ficha = FichaAtencion::where('id_paciente', $paciente->id_paciente)->first();
        //     if($ficha) $paciente->id_ficha = $ficha->id; else $paciente->id_ficha = 0;
        // }

        return view('page.enfermera.escritorio_box')->with([
            'boxes' => $boxes,
            'pacientes_triage' => $pacientes,
            'pacientes_graves' => $pacientes_urgentes,
        ]);
    }

    public function ambulancia()
    {
        return view('page.enfermera.escritorio_ambulancia')->with([]);
    }

    public function buscar_paciente_rut(Request $request)
    {
        $datos = array();
        $id_lugar_atencion = $request->id_lugar_atencion;
        $rut = $request->rut;
        $nombre = $request->nombre;
        $apellido = $request->apellido;

        // $filtro = array();
        // $filtro[] = array('rut',$rut);
        // $filtro[] = array('nombres','like','%'.$nombre.'%');

        // $filtro_2 = array();
        // $filtro_2[] = array('apellido_uno','like','%'.$apellido.'%');
        // $filtro_2[] = array('apellido_dos','like','%'.$apellido.'%');
        // 1=1
        // rut='26340063-1' and (nombres like '%'.$nombre.'%'; or apellido_uno like '%daviladasda%' or apellido_dos like '%fdavila%')

        $sql  = '';
        $sql_val = array();
        if(!empty($rut))
        {
            $sql .= " rut=? ";
            $sql_val[] = $rut;
        }
        if(!empty($nombre))
        {
            if($sql != '')
                $sql .=' OR ';

            $sql .= " nombres like ? ";
            $sql_val[] = '%'.$nombre.'%';
        }
        if(!empty($apellido))
        {
            if($sql != '')
                $sql .=' OR ';

            $sql .= " apellido_uno like ?  OR  apellido_dos like ? ";
            $sql_val[] = '%'.$apellido.'%';
            $sql_val[] = '%'.$apellido.'%';
        }

        $registro = Paciente::with(['FichaAtencion' => function($query) use ($id_lugar_atencion) {
                                        $query->select('id', 'id_lugar_atencion', 'id_paciente')->where('id_lugar_atencion', $id_lugar_atencion);
                                    }])
                                    ->with(['Prevision' => function($query) {
                                        $query->select('id', 'nombre');
                                    }])
                                    ->with(['Direccion' => function($query) {
                                        $query->select('id', 'direccion', 'numero_dir', 'id_ciudad')
                                              ->with(['Ciudad' => function($query2) {
                                                  $query2->select('id', 'nombre', 'id_region');
                                              }]);
                                    }])
                                    /** PERMITE FILTRAR POR LUGAR ATENCION, RUT, NOMBRE, APELLIDO  */
                                    ->porLuAt_Rut_Nom_Ape($id_lugar_atencion, $rut, $nombre, $apellido)
                                    ->get();

        try {
            foreach($registro as $paciente){
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

                    $paciente->contacto_emergencia = $contacto_emergencia;

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

                    $paciente->contacto_emergencia = $contacto_emergencia;
                }
            }
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

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

    public function camas()
    {
        return view('page.enfermera.escritorio_camas')->with([]);
    }

    public function buscarPaciente()
    {
        return view('page.enfermera.buscar_paciente')->with([]);
    }

    public function asignar_nuevo_triage_paciente (Request $req){
        try {
            //code...
            $paciente = $this->buscarPacienteTriage($req->id_paciente);
            $paciente->id_triage = $req->id_triage;
            $paciente->save();

            $p = $this->buscarPacienteTriage($req->id_paciente);
            return ['mensaje' => 'OK','paciente' => $p];
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }

    public function asignar_nueva_urgencia_paciente (Request $req){
        try {
            //code...
            $paciente = $this->buscarPacienteNivelUrgencia($req->id_paciente);
            $paciente->nivel_urgencia = $req->id_triage;

            $paciente->save();

            $p = $this->buscarPacienteNivelUrgencia($req->id_paciente);
            return ['mensaje' => 'OK','paciente' => $p];
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }

    public function buscarPacienteTriage($id_paciente)
    {
        $paciente = PacienteTriage::select('pacientes_triage.*','pacientes.nombres','pacientes.apellido_uno','pacientes.apellido_dos','asignacion_urgencia.descripcion','asignacion_urgencia.clase_html as clase','asignacion_urgencia.codigo')
                                    ->join('pacientes','pacientes.id','=','pacientes_triage.id_paciente')
                                    ->join('asignacion_urgencia','asignacion_urgencia.id','=','pacientes_triage.id_triage')
                                    ->where('pacientes_triage.id_paciente', $id_paciente)
                                    ->first();
        return $paciente;
    }

    public function buscarPacienteNivelUrgencia($id_paciente)
    {
        $paciente = PacienteSala::select('paciente_sala.*','pacientes.nombres','pacientes.apellido_uno','pacientes.apellido_dos')
                                    ->join('pacientes','pacientes.id','=','paciente_sala.id_paciente')
                                    ->where('paciente_sala.id_paciente', $id_paciente)
                                    ->first();
        return $paciente;
    }

    public function agregar_evolucion_paciente_hosp(Request $req){
       try {
        //code...
        $evolucion_hospital = new EvolucionPacienteHospital();
        $evolucion_hospital->id_responsable = Auth::user()->id;
        $evolucion_hospital->id_paciente = $req->id_paciente;
        $evolucion_hospital->fecha =  date('Y-m-d');
        $evolucion_hospital->hora =  date('H:i:s');
        $evolucion_hospital->evolucion = $req->evolucion;
        $evolucion_hospital->resumen = $req->resumen ? $req->resumen : 'SIN OBSERVACIONES';

        if($evolucion_hospital->save()){
            $idCounter = $req->idCounter;
            $detalle_receta_controlador = new DetalleRecetaController();
            $recetas = $detalle_receta_controlador->dameTodoDetalleRecetaPaciente($req->id_paciente);
            $procedimientos = $this->dameProcedimientosPaciente($req->id_paciente);
            $curaciones = $this->dameCuracionesPaciente($req->id_paciente);
            $controles_ciclo = $this->dameEvolucionesPacienteHosp($req->id_paciente);
            $examenControlador = new ExamenMedicoController();
            $examenes_solicitados = $examenControlador->dame_examenes_solicitados($req->id_paciente);
            foreach ($controles_ciclo as $index => &$evolucion) {
                // Construir fecha y hora de la evolución actual
                $fechaHoraEvolucionActual = Carbon::parse($evolucion['fecha'] . ' ' . $evolucion['hora']);

                // Construir fecha y hora de la evolución siguiente (si existe)
                $fechaHoraEvolucionSiguiente = isset($controles_ciclo[$index + 1])
                    ? Carbon::parse($controles_ciclo[$index + 1]['fecha'] . ' ' . $controles_ciclo[$index + 1]['hora'])
                    : null;

                // Filtrar exámenes que ocurren después de la evolución actual y antes de la siguiente
                $examenesFiltrados = collect($examenes_solicitados)->filter(function ($examen) use ($fechaHoraEvolucionActual, $fechaHoraEvolucionSiguiente) {
                    // Construir fecha y hora del examen
                    $fechaHoraExamen = Carbon::parse($examen['fecha'] . ' ' . $examen['hora']);
                    return $fechaHoraExamen->greaterThan($fechaHoraEvolucionActual) && // Debe ser posterior a la evolución actual
                           ($fechaHoraEvolucionSiguiente === null || $fechaHoraExamen->lessThan($fechaHoraEvolucionSiguiente)); // Opcionalmente anterior a la siguiente evolución
                });

                  // Filtrar recetas que ocurren después de la evolución actual y antes de la siguiente
                $recetasFiltradas = collect($recetas)->filter(function ($receta) use ($fechaHoraEvolucionActual, $fechaHoraEvolucionSiguiente) {
                    // Construir fecha y hora de la receta
                    $fechaHoraReceta = Carbon::parse($receta['fecha'] . ' ' . $receta['hora']);
                    return $fechaHoraReceta->greaterThan($fechaHoraEvolucionActual) && // Debe ser posterior a la evolución actual
                        ($fechaHoraEvolucionSiguiente === null || $fechaHoraReceta->lessThan($fechaHoraEvolucionSiguiente)); // Opcionalmente anterior a la siguiente evolución
                });

                 // Filtrar procedimientos que ocurren después de la evolución actual y antes de la siguiente
                $procedimientosFiltrados = collect($procedimientos)->filter(function ($procedimiento) use ($fechaHoraEvolucionActual, $fechaHoraEvolucionSiguiente) {
                    // Construir fecha y hora del procedimiento
                    $fechaHoraProcedimiento = Carbon::parse($procedimiento['fecha'] . ' ' . $procedimiento['hora']);
                    return $fechaHoraProcedimiento->greaterThan($fechaHoraEvolucionActual) && // Después de la evolución actual
                        ($fechaHoraEvolucionSiguiente === null || $fechaHoraProcedimiento->lessThan($fechaHoraEvolucionSiguiente)); // Antes de la siguiente evolución
                });

                // Asignar exámenes a la evolución actual
                $evolucion['examenes'] = $examenesFiltrados->values(); // Asegurar que sea una lista indexada
                // Asignar recetas a la evolución actual
                $evolucion['recetas'] = $recetasFiltradas->values(); // Asegurar que sea una lista indexada
                // Asignar procedimientos a la evolución actual
                $evolucion['procedimientos'] = $procedimientosFiltrados->values(); // Asegurar que sea una lista indexada
            }

            if(count($controles_ciclo) == 0)
            {
                // si no hay ciclos de control se inicia en 1 para manejar el id en la vista
                $contador_div_evaluaciones = 1;
            }else{
                // si hay ciclos de control se suma 1 para manejar el id en la vista
                $contador_div_evaluaciones = count($controles_ciclo) + 1;
            }

            $enfermera = true;

            $v = view('app.adm_hospital.servicios.enfermera.control_ciclo', compact('controles_ciclo','idCounter','enfermera','contador_div_evaluaciones'))->render();

            return ['mensaje' => 'OK','vista' => $v,'idCounter' => $idCounter,'controles_ciclo' => $controles_ciclo];
        }
       } catch (\Exception $e) {
        //throw $th;
        return ['mensaje' => $e->getMessage()];
       }

    }

    public function agregar_evolucion_paciente(Request $req){
        try {

         //code...
         $evolucion_urgencia = new EvolucionUrgencia();
         $evolucion_urgencia->id_responsable = Auth::user()->id;
         $evolucion_urgencia->id_paciente = $req->id_paciente;
         // Crear un objeto con los datos de la evolución
         $datos_evolucion = [
             'pulso' => $req->pulso,
             'temperatura' => $req->temperatura,
             'pas' => $req->pas,
             'pad' => $req->pad,
             'pam' => $req->pam,
             'fr' => $req->frec_resp,
             'peso' => $req->peso,
             'talla' => $req->talla,
             'imc' => $req->imc,
             'tipo_respiracion' => $req->tipo_respiracion_servicio,
             'sat_fio2' => $req->sat_fio2,
             'sat_o2' => $req->sat_o2,
             'dispositivo_servicio' => $req->dispositivo_servicio,
             'hemoglucotest' => $req->hemoglucotest,
             'glasgow' => $req->glasgow,
             'eva' => $req->c_eva,
             'otras_pruebas' => $req->otras_pruebas,
             'gravedad' => $req->gravedad_e_conc,
         ];
         // Convertir el objeto a una cadena JSON y guardarla en la base de datos
         $evolucion_urgencia->datos_evolucion = json_encode($datos_evolucion);
         if($evolucion_urgencia->save()){
             // $idCounter = $req->idCounter;
             // $user = Auth::user()->id;
             // $responsable = Profesional::where('id_usuario', $user)->first();
             // $v= view('page.enfermera.agregar_evolucion_paciente', compact('idCounter','responsable'))->render();


             $controles_ciclo = $this->dameEvolucionesPaciente($req->id_paciente);
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
                     $v = view('app.adm_hospital.servicios.enfermera.controles_ciclo_urg', compact('controles_ciclo'))->render();
                     return ['mensaje' => 'OK','vista' => $v];
         }
        } catch (\Exception $e) {
         //throw $th;
         return ['mensaje' => $e->getMessage()];
        }

     }

    public function dameEvolucionesPacienteHosp($idpaciente){
        $controles_ciclo = EvolucionPacienteHospital::select('evoluciones_paciente_hosp.*','users.name as nombre')
                                                    ->join('users','users.id','=','evoluciones_paciente_hosp.id_responsable')
                                                    ->where('evoluciones_paciente_hosp.id_paciente', $idpaciente)
                                                    ->get();

        return $controles_ciclo;
    }

    public function mostrar_nueva_evolucion_paciente(Request $req){

        $idCounter = $req->counter;
        $responsable = User::find(Auth::user()->id);

        return view('app.adm_hospital.servicios.enfermera.agregar_evolucion_paciente', compact('idCounter','responsable'));
    }

    public function mostrar_nueva_evolucion_paciente_hosp(Request $req){

        $idCounter = $req->counter;
        $responsable = User::find(Auth::user()->id);

        return view('app.adm_hospital.servicios.enfermera.agregar_evolucion_paciente_', compact('idCounter','responsable'));
    }



    public function mostrar_nuevo_tratamiento_paciente(Request $req){

        $idCounter = $req->counter;
        $responsable = User::find(Auth::user()->id);
        return view('page.enfermera.agregar_tratamiento_paciente', compact('idCounter','responsable'));
    }

    public function eliminar_evolucion_agregada(Request $req){
        try {
            //code...
            return $req;
                $evolucion = EvolucionUrgencia::find($req->id);

                if($evolucion->delete()){
                    $controles_ciclo = $this->dameEvolucionesPaciente($req->id_paciente);
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

                    $v = view('app.adm_hospital.servicios.enfermera.agregar_evolucion_paciente', compact('controles_ciclo'))->render();
                    return ['mensaje' => 'OK','vista' => $v];
                }
        } catch (\Exception $e) {
            //throw $th;
            return ['mensaje' => $e->getMessage()];
        }
    }

    public function eliminar_evolucion_agregada_hosp(Request $req){
        try {
            //code...

                $evolucion = EvolucionPacienteHospital::find($req->id);

                if($evolucion->delete()){
                    $idCounter = $req->id_counter;
                    $detalle_receta_controlador = new DetalleRecetaController();
                    $recetas = $detalle_receta_controlador->dameTodoDetalleRecetaPaciente($req->id_paciente);
                    $procedimientos = $this->dameProcedimientosPaciente($req->id_paciente);
                    $curaciones = $this->dameCuracionesPaciente($req->id_paciente);
                    $controles_ciclo = $this->dameEvolucionesPacienteHosp($req->id_paciente);
                    $examenControlador = new ExamenMedicoController();
                    $examenes_solicitados = $examenControlador->dame_examenes_solicitados($req->id_paciente);
                    foreach ($controles_ciclo as $index => &$evolucion) {
                        // Construir fecha y hora de la evolución actual
                        $fechaHoraEvolucionActual = Carbon::parse($evolucion['fecha'] . ' ' . $evolucion['hora']);

                        // Construir fecha y hora de la evolución siguiente (si existe)
                        $fechaHoraEvolucionSiguiente = isset($controles_ciclo[$index + 1])
                            ? Carbon::parse($controles_ciclo[$index + 1]['fecha'] . ' ' . $controles_ciclo[$index + 1]['hora'])
                            : null;

                        // Filtrar exámenes que ocurren después de la evolución actual y antes de la siguiente
                        $examenesFiltrados = collect($examenes_solicitados)->filter(function ($examen) use ($fechaHoraEvolucionActual, $fechaHoraEvolucionSiguiente) {
                            // Construir fecha y hora del examen
                            $fechaHoraExamen = Carbon::parse($examen['fecha'] . ' ' . $examen['hora']);
                            return $fechaHoraExamen->greaterThan($fechaHoraEvolucionActual) && // Debe ser posterior a la evolución actual
                                   ($fechaHoraEvolucionSiguiente === null || $fechaHoraExamen->lessThan($fechaHoraEvolucionSiguiente)); // Opcionalmente anterior a la siguiente evolución
                        });

                          // Filtrar recetas que ocurren después de la evolución actual y antes de la siguiente
                        $recetasFiltradas = collect($recetas)->filter(function ($receta) use ($fechaHoraEvolucionActual, $fechaHoraEvolucionSiguiente) {
                            // Construir fecha y hora de la receta
                            $fechaHoraReceta = Carbon::parse($receta['fecha'] . ' ' . $receta['hora']);
                            return $fechaHoraReceta->greaterThan($fechaHoraEvolucionActual) && // Debe ser posterior a la evolución actual
                                ($fechaHoraEvolucionSiguiente === null || $fechaHoraReceta->lessThan($fechaHoraEvolucionSiguiente)); // Opcionalmente anterior a la siguiente evolución
                        });

                         // Filtrar procedimientos que ocurren después de la evolución actual y antes de la siguiente
                        $procedimientosFiltrados = collect($procedimientos)->filter(function ($procedimiento) use ($fechaHoraEvolucionActual, $fechaHoraEvolucionSiguiente) {
                            // Construir fecha y hora del procedimiento
                            $fechaHoraProcedimiento = Carbon::parse($procedimiento['fecha'] . ' ' . $procedimiento['hora']);
                            return $fechaHoraProcedimiento->greaterThan($fechaHoraEvolucionActual) && // Después de la evolución actual
                                ($fechaHoraEvolucionSiguiente === null || $fechaHoraProcedimiento->lessThan($fechaHoraEvolucionSiguiente)); // Antes de la siguiente evolución
                        });

                        // Asignar exámenes a la evolución actual
                        $evolucion['examenes'] = $examenesFiltrados->values(); // Asegurar que sea una lista indexada
                        // Asignar recetas a la evolución actual
                        $evolucion['recetas'] = $recetasFiltradas->values(); // Asegurar que sea una lista indexada
                        // Asignar procedimientos a la evolución actual
                        $evolucion['procedimientos'] = $procedimientosFiltrados->values(); // Asegurar que sea una lista indexada
                    }

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

                    $v = view('app.adm_hospital.servicios.enfermera.control_ciclo', compact('controles_ciclo'))->render();
                    return ['mensaje' => 'OK','vista' => $v,'controles_ciclo' => $controles_ciclo];
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

    public function pacientes(){
        $pacientes = PacienteTriage::select('pacientes_triage.*','pacientes.nombres','pacientes.apellido_uno','pacientes.apellido_dos','pacientes.fecha_nac','pacientes.rut','asignacion_urgencia.descripcion','asignacion_urgencia.clase_html','asignacion_urgencia.codigo','paciente_box.id_box')
                                    ->join('pacientes','pacientes.id','=','pacientes_triage.id_paciente')
                                    ->join('asignacion_urgencia','asignacion_urgencia.id','=','pacientes_triage.id_triage')
                                    ->join('paciente_box','paciente_box.id_paciente','=','pacientes_triage.id_paciente')
                                    ->get();


        foreach($pacientes as $paciente)
        {
            $box = BoxAtencionServicio::find($paciente->id_box);
            if($box){
                $paciente->tipo_box = $box->tipo_box;
                $paciente->numero_box = $box->numero_box;
            }else{
                $paciente->tipo_box = '';
                $paciente->numero_box = '';
            }
        }

        $pacientes_finalizados = PacienteTriage::select('pacientes_triage.*','pacientes.nombres','pacientes.apellido_uno','pacientes.apellido_dos','pacientes.fecha_nac','pacientes.rut','asignacion_urgencia.descripcion','asignacion_urgencia.clase_html','asignacion_urgencia.codigo','paciente_box.id_box')
                                    ->join('pacientes','pacientes.id','=','pacientes_triage.id_paciente')
                                    ->join('asignacion_urgencia','asignacion_urgencia.id','=','pacientes_triage.id_triage')
                                    ->join('paciente_box','paciente_box.id_paciente','=','pacientes_triage.id_paciente')
                                    ->where('pacientes_triage.estado','FINALIZADO')
                                    ->get();

        foreach($pacientes_finalizados as $paciente)
        {
            $box = BoxAtencionServicio::find($paciente->id_box);
            $paciente->tipo_box = $box->tipo_box;
            $paciente->numero_box = $box->numero_box;
            // calcular la edad del paciente
            $fecha_nac = $paciente->fecha_nac;
            $fecha_actual = date('Y-m-d');
            $edad = Carbon::parse($fecha_nac)->diff(Carbon::parse($fecha_actual))->format('%y años');
            $paciente->edad = $edad;
        }
        return view('page.enfermera.pacientes')->with([
            'pacientes' => $pacientes,
            'pacientes_finalizados' => $pacientes_finalizados,
        ]);
    }

    public function cambiar_estado_paciente_triage(Request $req){

        $paciente_triage = PacienteTriage::find($req->id_paciente_triage);
        $paciente_triage->estado = "INGRESADO";
        $paciente_triage->save();

        return ['mensaje' => 'OK'];
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

    public function llamar_paciente(Request $req){
        try {

            // verificar si ya existe ese paciente ingresado en el box
            $existe = PacienteBox::where('id_paciente',$req->id_paciente)->first();
            if(!$existe){
                $paciente_box = new PacienteBox();
                $paciente_box->id_paciente = $req->id_paciente;
                $paciente_box->id_box = $req->id_box;
                $paciente_box->id_camilla = $req->id_camilla;
                $paciente_box->id_responsable = Auth::user()->id;
                $paciente_box->fecha = date('Y-m-d');
                $paciente_box->hora = date('H:i:s');
                $paciente_box->observaciones = "SIN OBSERVACIONES";

                if($paciente_box->save()){
                    $bc = new BoxController();
                    $boxes = $bc->dame_boxes_atencion();
                    $pacientes_triage = PacienteTriage::select('pacientes_triage.*','pacientes.nombres','pacientes.apellido_uno','pacientes.apellido_dos','pacientes.fecha_nac','pacientes.rut','asignacion_urgencia.descripcion','asignacion_urgencia.clase_html','asignacion_urgencia.codigo')
                                        ->join('pacientes','pacientes.id','=','pacientes_triage.id_paciente')
                                        ->join('asignacion_urgencia','asignacion_urgencia.id','=','pacientes_triage.id_triage')
                                        ->orderBy('asignacion_urgencia.codigo','asc')
                                        ->get();

                    // dame los pacientes que esten en cada box
                    foreach($boxes as $box)
                    {
                        $box->pacientes = $this->dame_pacientes_box($box->id);
                        foreach($box->pacientes as $paciente)
                        {
                            list($ano,$mes,$dia) = explode("-",$paciente->fecha_nac);
                            $ano_diferencia  = date("Y") - $ano;
                            $mes_diferencia = date("m") - $mes;
                            $dia_diferencia   = date("d") - $dia;
                            if ($dia_diferencia < 0 || $mes_diferencia < 0)
                            $ano_diferencia--;

                            $edad = $ano_diferencia;
                            $paciente->edad = $edad;

                            $detalle_receta_controlador = new DetalleRecetaController();
                            $recetas = $detalle_receta_controlador->dameTodoDetalleRecetaPaciente($paciente->id_paciente);

                            // Inicializar la variable booleana como false
                            $tieneRecetaPendiente = false;
                            // Recorrer las recetas
                            foreach ($recetas as $receta) {
                                // Suponiendo que 'estado' es el campo que indica si la receta está pendiente
                                if ($receta->estado_tratamiento == 1) {
                                    // Si se encuentra una receta pendiente, cambiar la variable a true
                                    $tieneRecetaPendiente = true;
                                    // Salir del ciclo
                                    break;
                                }
                            }

                            $paciente->tieneRecetaPendiente = $tieneRecetaPendiente;
                        }
                    }



                    $paciente_triage = PacienteTriage::where('id_paciente',$req->id_paciente)->first();
                    $paciente_triage->estado = "INGRESADO";
                    $paciente_triage->save();

                    $pacientes_triage = $this->dame_pacientes_en_espera();

                    $pacientes_graves = $this->dame_pacientes_graves();

                    $v = view('page.fragm.boxes', compact('pacientes_triage','boxes'))->render();
                    return ['mensaje' => 'OK','vista' => $v,'pacientes' => $pacientes_triage,'pacientes_graves' => $pacientes_graves];
                }else{
                    return ['mensaje' => 'ERROR'];
                }
            }else{
                return ['mensaje'=> 'ERROR'];
            }

        } catch (\Exception $e) {
            //throw $th;
            return ['mensaje' => $e->getMessage()];
        }

    }

    public function dame_pacientes_graves(){
        $pacientes = PacienteTriage::select('pacientes_triage.*','pacientes.nombres','pacientes.apellido_uno','pacientes.apellido_dos','pacientes.fecha_nac','pacientes.rut','asignacion_urgencia.descripcion','asignacion_urgencia.clase_html','asignacion_urgencia.codigo','pacientes.sexo')
                                    ->join('pacientes','pacientes.id','=','pacientes_triage.id_paciente')
                                    ->join('asignacion_urgencia','asignacion_urgencia.id','=','pacientes_triage.id_triage')
                                    ->where('pacientes_triage.id_triage', 1)
                                    ->orWhere('pacientes_triage.id_triage', 2)
                                    ->get();

        $pacientes_urgentes = [];

        foreach($pacientes as $paciente){
            // calcular edad del paciente por fecha de nacimiento
            list($ano,$mes,$dia) = explode("-",$paciente->fecha_nac);
            $ano_diferencia  = date("Y") - $ano;
            $mes_diferencia = date("m") - $mes;
            $dia_diferencia   = date("d") - $dia;
            if ($dia_diferencia < 0 || $mes_diferencia < 0)
            $ano_diferencia--;

            $edad = $ano_diferencia;
            $paciente->edad = $edad;
            // pacientes que no esten en ningun box
            $p = PacienteBox::where('id_paciente', $paciente->id_paciente)->first();
            if(!$p){
                $pacientes_urgentes[] = $paciente;
            }
        }

        // dar formato de colección a los pacientes
        $pacientes_urgentes = collect($pacientes_urgentes);

        // agregar a pacientes_triage los pacientes urgentes
        $pacientes = $pacientes_urgentes;
        return $pacientes;
    }

    public function dame_pacientes_en_espera(){
        $pacientes = PacienteTriage::select('pacientes_triage.*','pacientes.nombres','pacientes.apellido_uno','pacientes.apellido_dos','pacientes.fecha_nac','pacientes.rut','asignacion_urgencia.descripcion','asignacion_urgencia.clase_html','asignacion_urgencia.codigo')
                                    ->join('pacientes','pacientes.id','=','pacientes_triage.id_paciente')
                                    ->join('asignacion_urgencia','asignacion_urgencia.id','=','pacientes_triage.id_triage')
                                    ->where('pacientes_triage.estado',"EN ESPERA")
                                    ->orderBy('asignacion_urgencia.codigo','asc')
                                    ->get();

        foreach($pacientes as $paciente)
        {
            list($ano,$mes,$dia) = explode("-",$paciente->fecha_nac);
            $ano_diferencia  = date("Y") - $ano;
            $mes_diferencia = date("m") - $mes;
            $dia_diferencia   = date("d") - $dia;
            if ($dia_diferencia < 0 || $mes_diferencia < 0)
            $ano_diferencia--;

            $edad = $ano_diferencia;
            $paciente->edad = $edad;
        }

        $pacientes_graves = PacienteTriage::select('pacientes_triage.*','pacientes.nombres','pacientes.apellido_uno','pacientes.apellido_dos','pacientes.fecha_nac','pacientes.rut','asignacion_urgencia.descripcion','asignacion_urgencia.clase_html','asignacion_urgencia.codigo','pacientes.sexo')
                                    ->join('pacientes','pacientes.id','=','pacientes_triage.id_paciente')
                                    ->join('asignacion_urgencia','asignacion_urgencia.id','=','pacientes_triage.id_triage')
                                    ->where('pacientes_triage.id_triage', 1)
                                    ->orWhere('pacientes_triage.id_triage', 2)
                                    ->get();

        $pacientes_urgentes = [];

        foreach($pacientes_graves as $paciente){
            // calcular edad del paciente por fecha de nacimiento
            list($ano,$mes,$dia) = explode("-",$paciente->fecha_nac);
            $ano_diferencia  = date("Y") - $ano;
            $mes_diferencia = date("m") - $mes;
            $dia_diferencia   = date("d") - $dia;
            if ($dia_diferencia < 0 || $mes_diferencia < 0)
            $ano_diferencia--;

            $edad = $ano_diferencia;
            $paciente->edad = $edad;
            // pacientes que no esten en ningun box
            $p = PacienteBox::where('id_paciente', $paciente->id_paciente)->first();
            if(!$p){
                $pacientes_urgentes[] = $paciente;
            }
        }

        // dar formato de colección a los pacientes
        $pacientes_urgentes = collect($pacientes_urgentes);

        // agregar a pacientes_triage los pacientes urgentes
        $pacientes = $pacientes->merge($pacientes_urgentes);
        return $pacientes;
    }

    public function dame_pacientes_box($id_box, $id_paciente = null){
        try {
            $query = PacienteBox::select('paciente_box.*','pacientes.apellido_uno','pacientes.sexo','pacientes.fecha_nac','pacientes.rut','pacientes.nombres','asignacion_urgencia.descripcion','asignacion_urgencia.clase_html','asignacion_urgencia.codigo','pacientes_triage.id as id_paciente_triage')
                            ->join('pacientes','pacientes.id','=','paciente_box.id_paciente')
                            ->join('pacientes_triage','pacientes_triage.id_paciente','=','paciente_box.id_paciente')
                            ->join('asignacion_urgencia','asignacion_urgencia.id','=','pacientes_triage.id_triage')
                            ->where('pacientes_triage.estado',"INGRESADO")
                            ->where('paciente_box.id_box', $id_box);

            if ($id_paciente !== null) {
                $query->where('paciente_box.id_paciente', $id_paciente);
            }

            $pacientes = $query->get();
            return $pacientes;
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }

    public function dame_camillas_box($id_box){
        $box = BoxAtencionServicio::find($id_box);
        return $box;
    }

    public function sacar_paciente_box(Request $req){
        try {
            //code...
            $paciente_box = PacienteBox::where('id_paciente', $req->id_paciente)->where('id_box', $req->id_box)->first();

            if($paciente_box->delete()){
                // volver al estado del paciente a INGRESADO
                $paciente_triage = PacienteTriage::where('id_paciente',$req->id_paciente)->first();
                $paciente_triage->estado = "EN ESPERA";
                $paciente_triage->save();
                $bc = new BoxController();
                $boxes = $bc->dame_boxes_atencion();

                $pacientes_triage = PacienteTriage::select('pacientes_triage.*','pacientes.nombres','pacientes.apellido_uno','pacientes.apellido_dos','pacientes.fecha_nac','pacientes.rut','asignacion_urgencia.descripcion','asignacion_urgencia.clase_html','asignacion_urgencia.codigo')
                                        ->join('pacientes','pacientes.id','=','pacientes_triage.id_paciente')
                                        ->join('asignacion_urgencia','asignacion_urgencia.id','=','pacientes_triage.id_triage')
                                        ->orderBy('asignacion_urgencia.codigo','asc')
                                        ->get();

                    // dame los pacientes que esten en cada box
                    foreach($boxes as $box)
                    {
                        $box->pacientes = $this->dame_pacientes_box($box->id);
                        foreach($box->pacientes as $paciente)
                        {
                            list($ano,$mes,$dia) = explode("-",$paciente->fecha_nac);
                            $ano_diferencia  = date("Y") - $ano;
                            $mes_diferencia = date("m") - $mes;
                            $dia_diferencia   = date("d") - $dia;
                            if ($dia_diferencia < 0 || $mes_diferencia < 0)
                            $ano_diferencia--;

                            $edad = $ano_diferencia;
                            $paciente->edad = $edad;

                            $detalle_receta_controlador = new DetalleRecetaController();
                            $recetas = $detalle_receta_controlador->dameTodoDetalleRecetaPaciente($paciente->id_paciente);

                            // Inicializar la variable booleana como false
                            $tieneRecetaPendiente = false;
                            // Recorrer las recetas
                            foreach ($recetas as $receta) {
                                // Suponiendo que 'estado' es el campo que indica si la receta está pendiente
                                if ($receta->estado_tratamiento == 1) {
                                    // Si se encuentra una receta pendiente, cambiar la variable a true
                                    $tieneRecetaPendiente = true;
                                    // Salir del ciclo
                                    break;
                                }
                            }

                            $paciente->tieneRecetaPendiente = $tieneRecetaPendiente;
                        }
                    }

                $pacientes_triage = $this->dame_pacientes_en_espera();
                $pacientes_graves = $this->dame_pacientes_graves();

                $v = view('page.fragm.boxes', compact('pacientes_triage','boxes'))->render();

                $ec = new EscritorioAdministracionController();
                $boxes_alerta = $ec->boxAlerta();
                return ['mensaje' => 'OK','vista' => $v,'pacientes' => $pacientes_triage,'pacientes_graves' => $pacientes_graves,'boxes_alerta' => $boxes_alerta];
            }
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

    }

    public function clave1(Request $req){
        $box = BoxAtencionServicio::find($req->id_box);
        if($box->alerta == 1) {
            $box->alerta = 0;
            $mensaje = "ALERTA DESACTIVADA";
            $tipo_mensaje = "success";
        }else{
            $box->alerta = 1;
            $mensaje = "ALERTA ACTIVADA";
            $tipo_mensaje = "warning";
        }
        if($box->save()){
            $bc = new BoxController();
            $boxes = $bc->dame_boxes_atencion();

            foreach($boxes as $box)
            {
                $box->pacientes = $this->dame_pacientes_box($box->id);
                foreach($box->pacientes as $paciente)
                {
                    list($ano,$mes,$dia) = explode("-",$paciente->fecha_nac);
                    $ano_diferencia  = date("Y") - $ano;
                    $mes_diferencia = date("m") - $mes;
                    $dia_diferencia   = date("d") - $dia;
                    if ($dia_diferencia < 0 || $mes_diferencia < 0)
                    $ano_diferencia--;

                    $edad = $ano_diferencia;
                    $paciente->edad = $edad;

                    $detalle_receta_controlador = new DetalleRecetaController();
                    $recetas = $detalle_receta_controlador->dameTodoDetalleRecetaPaciente($paciente->id_paciente);

                    // Inicializar la variable booleana como false
                    $tieneRecetaPendiente = false;
                    // Recorrer las recetas
                    foreach ($recetas as $receta) {
                        // Suponiendo que 'estado' es el campo que indica si la receta está pendiente
                        if ($receta->estado_tratamiento == 1) {
                            // Si se encuentra una receta pendiente, cambiar la variable a true
                            $tieneRecetaPendiente = true;
                            // Salir del ciclo
                            break;
                        }
                    }

                    $paciente->tieneRecetaPendiente = $tieneRecetaPendiente;
                }
            }

            $pacientes_triage = $this->dame_pacientes_en_espera();
            $v = view('page.fragm.boxes', compact('pacientes_triage','boxes'))->render();
            $ec = new EscritorioAdministracionController();
                $boxes_alerta = $ec->boxAlerta();
            return ['mensaje' => 'OK','vista' => $v,'mensaje' => $mensaje,'tipo_mensaje' => $tipo_mensaje,'boxes_alerta' => $boxes_alerta];
        }
    }

    public function cambiar_estado_tratamiento(Request $req){
        try {
            $receta_interna = DetalleRecetaInterna::find($req->id_tratamiento);
            if($receta_interna->estado_tratamiento == 1){
                $receta_interna->estado_tratamiento = 0;
                $receta_interna->observaciones = $req->observaciones;

                // calcular la diferencia de dias entre la fecha de inicio y la fecha actual
                $fecha_inicio = new \DateTime($receta_interna->created_at);
                $fecha_actual = new \DateTime(date('Y-m-d H:i:s'));
                $diferencia = $fecha_inicio->diff($fecha_actual);
                $dias = $diferencia->days;
                $horas = $diferencia->h;
                $minutos = $diferencia->i;
                if($dias == 0){
                    if($horas == 0){
                        $diferencia_formateada = $diferencia->format('%i m');
                    }else{
                        if($horas == 1){
                            $diferencia_formateada = $diferencia->format('%h h %i m');
                        }else{
                            $diferencia_formateada = $diferencia->format('%h h %i m');
                        }
                    }
                }else{
                    $diferencia_formateada = $diferencia->format('%d d %h h %i m');
                }

                //return ['mensaje' => 'OK','dias' => $dias,'horas' => $horas,'minutos' => $minutos,'dif' => $diferencia->format('%d dias %h horas %i minutos')];
            }else{
                $receta_interna->estado_tratamiento = 1;
                $receta_interna->observaciones = '';
                $diferencia_formateada = '';
            }
            $receta_interna->otros_2 = $diferencia_formateada;
            if($receta_interna->save()){
                return ['mensaje' => 'OK','dif' => $diferencia_formateada,'estado' => $receta_interna->estado_tratamiento];
            }
        } catch (\Exception $e) {
            //throw $th;
            return ['mensaje' => $e->getMessage()];
        }
        // $receta_interna = DetalleRecetaInterna::find($req->id_tratamiento);
        // if($receta_interna->estado_tratamiento == 1){
        //     $receta_interna->estado_tratamiento = 0;
        //     $receta_interna->observaciones = $req->observaciones;

        //     // calcular la diferencia de dias entre la fecha de inicio y la fecha actual
        //     $fecha_inicio = new \DateTime($receta_interna->created_at);
        //     $fecha_actual = new \DateTime(date('Y-m-d H:i:s'));
        //     $diferencia = $fecha_inicio->diff($fecha_actual);
        //     $dias = $diferencia->days;
        //     $horas = $diferencia->h;
        //     $minutos = $diferencia->i;

        //     //return ['mensaje' => 'OK','dias' => $dias,'horas' => $horas,'minutos' => $minutos,'dif' => $diferencia->format('%d dias %h horas %i minutos')];
        // }else{
        //     $receta_interna->estado_tratamiento = 1;
        //     $receta_interna->observaciones = '';
        // }
        // $receta_interna->otros_2 = $diferencia->format('%d dias %h horas %i minutos');
        // if($receta_interna->save()){
        //     return ['mensaje' => 'OK','dif' => $diferencia->format('%d dias %h horas %i minutos'),'estado' => $receta_interna->estado_tratamiento];
        // }
    }

    public function cambiar_estado_curacion(Request $req){
        try {
            $curacion_servicio = CuracionesServicio::find($req->id_tratamiento);

            if($curacion_servicio->estado == 1){
                $curacion_servicio->estado = 0;

                // calcular la diferencia de dias entre la fecha de inicio y la fecha actual
                $fecha_inicio = new \DateTime($curacion_servicio->created_at);
                $fecha_actual = new \DateTime(date('Y-m-d H:i:s'));
                $diferencia = $fecha_inicio->diff($fecha_actual);
                $dias = $diferencia->days;
                $horas = $diferencia->h;
                $minutos = $diferencia->i;
                if($dias == 0){
                    if($horas == 0){
                        $diferencia_formateada = $diferencia->format('%i m');
                    }else{
                        if($horas == 1){
                            $diferencia_formateada = $diferencia->format('%h h %i m');
                        }else{
                            $diferencia_formateada = $diferencia->format('%h h %i m');
                        }
                    }
                }else{
                    $diferencia_formateada = $diferencia->format('%d d %h h %i m');
                }

                //return ['mensaje' => 'OK','dias' => $dias,'horas' => $horas,'minutos' => $minutos,'dif' => $diferencia->format('%d dias %h horas %i minutos')];
            }else{
                $curacion_servicio->estado = 1;
                $diferencia_formateada = '';
            }
            $curacion_servicio->otros_2 = $diferencia_formateada;
            if($curacion_servicio->save()){
                return ['mensaje' => 'OK','dif' => $diferencia_formateada,'estado' => $curacion_servicio->estado];
            }
        } catch (\Exception $e) {
            //throw $th;
            return ['mensaje' => $e->getMessage()];
        }
    }

    public function agregar_observaciones_tratamiento(Request $req){
        try {
            //code...
            $detalle_receta_interna = DetalleRecetaInterna::find($req->id_tratamiento);
            $detalle_receta_interna->observaciones = $req->observaciones;
            if($detalle_receta_interna->save()){
                return ['mensaje' => 'OK'];
            }
        } catch (\Exception $e) {
            //throw $th;
            return ['mensaje' => $e->getMessage()];
        }
    }

    public function guardarAntecedentesServicio(Request $req){
        return $req;
    }
}
