<div id="m_asignar_profesional" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_asignar_profesional" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white" id="modal_pago_consulta_title">Asignación</h5>
                <button type="button" class="close close_modal_recepcion_bonos_api" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body pb-0">
                <div class="row">
                    <div class="col-12">
                        <div id="contenedor_paciente_atencion"></div>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-6">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Motivo de hospitalización</label>
                            <select name="motivo_hospitalizacion" id="motivo_hospitalizacion" class="form-control form-control-sm">
                                <option value="0">Seleccione</option>
                                <option value="1">Para estudio</option>
                                <option value="2">Para cirugía</option>
                                <option value="3">Para tratamiento</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-6">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Asignación de gravedad</label>
                            <select name="nivel_gravedad" id="nivel_gravedad" class="form-control form-control-sm">
                                <option value="0">Seleccione</option>
                                <option value="1">Leve</option>
                                <option value="2">Mediana gravedad</option>
                                <option value="3">Grave</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Profesional</label>
                            <select name="profesional_asignado" id="profesional_asignado" class="form-control form-control-sm">
                                <option value="0">Seleccione</option>
                                @foreach ($servicio->profesionales as $profesional)
                                    <option value="{{ $profesional->id }}">{{ $profesional->nombre }} {{ $profesional->apellido_uno }} {{ $profesional->apellido_dos }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Salas</label>
                            <select name="salas_servicio" id="salas_servicio" class="form-control form-control-sm" onchange="dame_camas_sala(this)">
                                <option value="0">Seleccione</option>
                                @foreach ($servicio->salas as $sala)
                                    <option value="{{ $sala->id }}">{{ $sala->nombre_sala }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Cama</label>

                            <select name="cama_atencion" id="cama_atencion" class="form-control form-control-sm">
                                <option value="0">Seleccione</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-12">
                        <div class="form-group">
                            <label class="floating-label-activo-sm" for="observaciones_asignacion_sala">Observaciones</label>
                            <input type="text" name="observaciones_asignacion_sala" id="observaciones_asignacion_sala" class="form-control form-control-sm">
                        </div>
                    </div>
                </div>
                <ul class="nav nav-tabs-aten nav-fill mb-3" id="opciones_hospitalizacion" role="tablist">

                    <li class="nav-item">
                        <a class="nav-link-aten text-reset" id="medicamentos-tab" data-toggle="tab" href="#medicamentos" role="tab" aria-controls="medicamentos" aria-selected="true">Medicamentos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-aten text-reset active" id="evoluciones_hosp-tab" data-toggle="tab" href="#evoluciones_hosp" role="tab" aria-controls="evoluciones_hosp" aria-selected="true">Control de ciclo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-aten text-reset" id="solicitudes_examenes-tab" data-toggle="tab" href="#solicitudes_examenes" role="tab" aria-controls="solicitudes_examenes" aria-selected="true">Solicitudes de examenes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-aten text-reset" id="procedimientos-tab" data-toggle="tab" href="#procedimientos" role="tab" aria-controls="procedimientos" aria-selected="true">Procedimientos</a>
                    </li>
                </ul>
                <div class="tab-content" id="opciones_hospitalizacion_">
                    <div class="tab-pane fade show active" id="evoluciones_hosp" role="tabpanel" aria-labelledby="evoluciones_hosp-tab">

                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <p class="pt-3 d-inline">
                                    FECHA Y HORA
                                </p>
                            </div>
                            <div class="form-group col-md-10">
                                <label class="floating-label">Evolución</label>
                                <textarea class="form-control form-control-sm" name="evolucion" id="evolucion" rows="2" onfocus="this.rows=4" onblur="this.rows=3;"></textarea>
                            </div>
                            <hr>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <h6 class="text-c-blue">
                                    Resumen de
                                    evoluciones e
                                    interconsultas</h6>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <textarea class="form-control form-control-sm" name="resumen_evolucion" id="resumen_evolucion" rows="3" onfocus="this.rows=5" onblur="this.rows=4;"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show" id="medicamentos" role="tabpanel" aria-labelledby="medicamentos-tab">
                        <form id="form_indicar_medicamento">
                            <div class="form-row">
                                <div class="col-sm-6 mt-2">
                                    <div class="form-group fill">
                                        <label class="floating-label">Medicamento</label>
                                        <input type="text" id="nombre_medicamento_ficha_dental_hosp" name="nombre_medicamento_ficha_dental_hosp" onblur="getDosis_sdi();" class="form-control form-control-sm ui-autocomplete-input" autocomplete="off">
                                        <input type="hidden" id="id_medicamento_ficha_dental" name="id_medicamento_ficha_dental" class="form-control " value="">
                                        <input type="hidden" id="id_medicamento_cant_comp" name="id_medicamento_cant_comp" class="form-control " value="">
                                        <input type="hidden" id="id_medicamento_tipo_control" name="id_medicamento_tipo_control" class="form-control" value="">
                                    </div>
                                </div>

                                <div class="col-sm-6 mt-2">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Composición:</label>
                                        <div id="nombre_composicion_farmaco_hosp" name="nombre_composicion_farmaco_hosp" class="p-t-5"></div>
                                    </div>
                                </div>
                                {{--  CUANDO SE ENCUENTRA MEDICAMENTO EN BUSQUEDA  --}}
                                <div class="col-sm-6 mt-2 medicamento_activo">
                                    <div class="form-group fill">
                                        <label class="floating-label">Presentación</label>
                                        <select class="form-control form-control-sm" id="dosis_medicamento_ficha_dental_hosp" name="dosis_medicamento_ficha_dental_hosp" onchange="getFrecuencia();getCantComp();">
                                            <option>Seleccione una opción</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 mt-2 medicamento_activo">
                                    <div class="form-group fill">
                                        <label class="floating-label">Posología</label>
                                        <select class="form-control form-control-sm" id="frecuencia_medicamento_ficha_dental_hosp"
                                            name="frecuencia_medicamento_ficha_dental_hosp">
                                            <option>Seleccione una opción</option>
                                        </select>
                                    </div>
                                </div>
                                {{--  SI NO SE ENCUENTRA EL MEDICAMENTO EN LA BUSQUEDA  --}}
                                <div class="col-sm-6 mt-2 medicamento_inactivo" style="display:none;">
                                    <div class="form-group fill">
                                        <label class="floating-label">Presentación</label>
                                        <input type="text" name="dosis_medicamento_ficha_dental_2" id="dosis_medicamento_ficha_dental_2" class="form-control form-control-sm ">
                                    </div>
                                </div>
                                <div class="col-sm-6 mt-2 medicamento_inactivo" style="display:none;">
                                    <div class="form-group fill">
                                        <label class="floating-label">Posología</label>
                                        <input type="text" name="frecuencia_medicamento_ficha_dental_2" id="frecuencia_medicamento_ficha_dental_2" class="form-control form-control-sm ">
                                    </div>
                                </div>
                                <div class="col-sm-6 mt-2">
                                    <div class="form-group fill">
                                        <label class="floating-label">Vía de Administración</label>
                                        <select class="form-control form-control-sm" id="via_administracion_ficha_dental_hosp" name="via_administracion_ficha_dental_hosp" onchange="validar_via_administracion();">
                                            <option value="0">Seleccione</option>
                                            <option value="1">V&iacute;a Oral</option>
                                            <option value="2">V&iacute;a Sublingual</option>
                                            <option value="3">V&iacute;a T&oacute;pica</option>
                                            <option value="4">V&iacute;a Oftalmol&oacute;gica</option>
                                            <option value="5">V&iacute;a &Oacute;tica</option>
                                            <option value="6">V&iacute;a Inhalatoria</option>
                                            <option value="7">V&iacute;a Nasal</option>
                                            <option value="8">V&iacute;a Rectal</option>
                                            <option value="9">V&iacute;a Vaginal</option>
                                            <option value="10">V&iacute;a parental</option>
                                            <option value="11">Otra Vía</option>
                                        </select>
                                    </div>
                                    <div class="form-group fill" id="div_observaciones_medicamento_ficha_dental" style="display: none;">
                                        <label class="floating-label">Otra vía de Administración</label>
                                        <input type="text" id="observaciones_medicamento_ficha_dental" name="observaciones_medicamento_ficha_dental" class="form-control form-control-sm " disabled >
                                    </div>
                                </div>
                                <div class="col-sm-6 mt-2">
                                    <div class="form-group fill">
                                        <label class="floating-label">Periodo</label>
                                        <select class="form-control form-control-sm" id="periodo_ficha_dental" name="periodo_ficha_dental" onchange="validar_periodo();">
                                            <option value="0">Seleccione</option>
                                            <option value="1">SOS</option>
                                            <option value="2">Dosis unica</option>
                                            <option value="3">3 d&iacute;as</option>
                                            <option value="4">5 d&iacute;as</option>
                                            <option value="5">7 d&iacute;as</option>
                                            <option value="6">10 d&iacute;as</option>
                                            <option value="7">15 d&iacute;as</option>
                                            <option value="8">30 d&iacute;as</option>
                                            <option value="9">Permanente</option>
                                            <option value="10">V&iacute;a parental</option>
                                            <option value="11">Otro Periodo</option>
                                        </select>
                                    </div>
                                    <div class="form-group fill" id="div_observaciones_periodo_ficha_dental" style="display: none;">
                                        <label class="floating-label">Otro Periodo</label>
                                        <input type="text" id="observaciones_periodo_ficha_dental" name="observaciones_periodo_ficha_dental" class="form-control form-control-sm " disabled >
                                    </div>
                                </div>
                                {{-- cantidad de medicamento a despachar o comprar    --}}
                                <div class="col-sm-6 mt-2">
                                    <div class="form-group fill">
                                        <label class="floating-label">Cantidad Comprar/Despachar</label>
                                        <select class="form-control form-control-sm" id="cantidad_comprar" name="cantidad_comprar" onchange="validar_cantidad_comprar();">
                                            <option value="0">Seleccione</option>
                                            <option value="999">Otra Cantidad</option>
                                        </select>
                                    </div>
                                    <div class="form-group fill" id="div_otra_cantidad_a_comprar" style="display: none;">
                                        <label class="floating-label">Otra Cantidad</label>
                                        <input type="text" id="otra_cantidad_a_comprar" name="otra_cantidad_a_comprar" class="form-control form-control-sm " disabled >
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group mb-1">
                                                <label><strong>Uso Crónico</strong></label>
                                                <div class="switch switch-success d-inline m-r-10">
                                                    <input type="checkbox" id="medicamento_uso_cronico">
                                                    <label for="medicamento_uso_cronico" class="cr"></label>
                                                </div>
                                                <div class="alert-primary" id="mensaje_uso_cronico" style="display:none;">Acaba de seleccionar medicamento como USO CRÓNICO </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <button type="button" onclick="indicar_medicamento_cirugia()"
                                                class="btn btn-success btn-sm float-right"><i class="fa fa-plus"></i> AgregarMedicamento</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade show" id="control_ciclo" role="tabpanel" aria-labelledby="control_ciclo-tab">

                        <div id="contenedor_evoluciones_paciente">
                                @if(!$enfermera)
                                    <div class=" border  px-2 pt-3 pb-1 rounded shadow mb-3">
                                        <div class="form-row">
                                            <div class="col-sm-1 col-md col-lg col-xl">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Tº</label>
                                                    <input type="text" class="form-control form-control-sm" name="temperatura"
                                                        id="temperatura" value="" >
                                                </div>
                                            </div>
                                            <div class="col-sm-1 col-md col-lg col-xl">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Pulso</label>
                                                    <input type="text" class="form-control form-control-sm" name="pulso" id="pulso"
                                                        value="{!! old('pulso') !!}" >
                                                </div>
                                            </div>
                                            <div class="col-sm-1 col-md-col-lg-col-xl">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">PAS</label>
                                                    <input type="text" class="form-control form-control-sm" name="pas" id="pas"
                                                        value="{!! old('presion_pas') !!}" oninput="calcularPAM()">
                                                </div>
                                            </div>
                                            <div class="col-sm-1 col-md col-lg col-xl">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">PAD</label>
                                                    <input type="text" class="form-control form-control-sm" name="presion_bi" id="pad"
                                                        value="{!! old('presion_pad') !!}" oninput="calcularPAM()">
                                                </div>
                                            </div>
                                            <!--el PAM esla presion arterial media hay una formula-->
                                            <div class="col-sm-1 col-md col-lg col-xl">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">PAM</label>
                                                    <input type="text" class="form-control form-control-sm" name="presion_bi" id="pam"
                                                        value="{!! old('presion_pam') !!}" readonly>
                                                </div>
                                            </div>

                                            <div class="col-sm-2 col-md col-lg col-xl">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Peso</label>
                                                    <input type="text" class="form-control form-control-sm" name="peso" id="peso"
                                                        value="{!! old('peso') !!}" oninput="calcularIMC()">

                                                </div>
                                            </div>
                                            <div class="col-sm-1 col-md col-lg col-xl">
                                                <div class="form-group">

                                                    <label class="floating-label-activo-sm">Talla</label>
                                                    <input type="text" class="form-control form-control-sm" name="talla" id="talla"
                                                        value="{!! old('talla') !!}" oninput="calcularIMC()">

                                                </div>
                                            </div>
                                            <div class="col-sm-1 col-md col-lg col-xl">
                                                <div class="form-group">
                                                    <!--el IMC es el indice de masa corporal hay una formula-->
                                                    <label class="floating-label-activo-sm">IMC</label>
                                                    <input type="text" class="form-control form-control-sm" name="imc" id="imc"
                                                        value="{!! old('imc') !!}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Tipo de Respiracion</label>
                                                    <select name="tipo_respiracion_servicio" id="tipo_respiracion_servicio" class="form-control form-control-sm" onchange="mostrarDatosRespiracion(event)">
                                                        <option value="0">Seleccione</option>
                                                        <option value="Normal">Normal</option>
                                                        <option value="Agitada">Agitada</option>
                                                        <option value="Dificultosa">Dificultosa</option>
                                                        <option value="Signos de hipoxia">Signos de hipoxia</option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-sm-9 d-none" id="select_info_respiracion_servicio">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                        <div class="form-group">
                                                            <label for="" class="floating-label-activo-sm">F/R</label>
                                                            <input type="text" class="form-control form-control-sm" name="fr" id="fr"
                                                                value="{!! old('fr') !!}" >
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                        <div class="form-group">
                                                            <label for="" class="floating-label-activo-sm">Sat (%)</label>
                                                            <input type="text" class="form-control form-control-sm" name="saturacion_fio2" id="saturacion_fio2"
                                                                value="{!! old('saturacion') !!}" >
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                        <div class="form-group">
                                                            <label for="" class="floating-label-activo-sm">FI 02 (%)</label>
                                                            <input type="text" class="form-control form-control-sm" name="saturacion_oxigeno" id="saturacion_oxigeno"
                                                                value="{!! old('saturacion_oxigeno') !!}" >
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                        <div class="form-group">
                                                            <label for="dispositivo_servicio" class="floating-label-activo-sm">Dispositivo</label>
                                                            <select name="dispositivo_servicio" id="dispositivo_servicio" class="form-control form-control-sm">
                                                                <option value="0">Seleccione</option>
                                                                <option value="Naricera">Naricera</option>
                                                                <option value="Mascarilla simple">Mascarilla simple</option>
                                                                <option value="Mascarilla C/reservorio">Mascarilla C/reservorio</option>
                                                                <option value="Tubo nasotraqueal">Tubo nasotraqueal</option>
                                                                <option value="Tubo orotraqueal">Tubo orotraqueal</option>
                                                                <option value="Traqueostoma">Traqueostoma</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                        <button type="button" class="btn btn-outline-info btn-sm w-100" data-target="#modalInfoRespiracionServicio" data-toggle="modal">Info</button>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-1">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">HGT</label>
                                                    <input type="text" class="form-control form-control-sm" name="hemoglucotest"
                                                        id="hemoglucotest" value="{!! old('hemoglucotest') !!}" >
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-1">
                                                <div class="form-group">

                                                    <label class="floating-label-activo-sm">Glasgow</label>
                                                    <input type="text" class="form-control form-control-sm" name="glasgow" id="glasgow"
                                                        value="{!! old('glasgow') !!}" >

                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-1">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">EVA</label>
                                                    <input type="text" class="form-control form-control-sm" name="c_eva" id="c_eva"
                                                        value="{!! old('c_eva') !!}" >
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-5 col-lg-5 col-xl-4">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Otras Pruebas</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                        name="otras_pruebas" id="otras_pruebas"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-5 col-lg-5 col-xl-3">
                                                <label class="floating-label-activo-sm">Gravedad/Estado de consciencia</label>
                                                <input type="text" class="form-control form-control-sm" name="gravedad_e_conc"
                                                    id="gravedad_e_conc" value="{!! old('gravedad_e_conc') !!}" >
                                            </div>
                                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                <button type="button" class="btn btn-icon btn-danger-light-c"><i class="feather icon-x"></i>
                                                </button>
                                                <button type="button" class="btn btn-icon btn-success-light-c"
                                                    onclick="agregarEvolucionPaciente()"><i class="feather icon-save"></i> </button>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                        </div>
                    </div>
                    <div class="tab-pane fade show" id="solicitudes_examenes" role="tabpanel" aria-labelledby="solicitudes_examenes-tab">
                        <p>Solicitudes examenes</p>
                    </div>

                    <div class="tab-pane fade show" id="procedimientos" role="tabpanel" aria-labelledby="procedimientos-tab">
                        <p>Procedimientos</p>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-sm w-100 my-2" onclick="registrar_nueva_atencion()"><i class="fas fa-save"></i> Asignar</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        $("#nombre_medicamento_ficha_dental_hosp").autocomplete({
            source: function(request, response) {
                // Fetch data
                $.ajax({
                    url: "{{ route('medicamentos.get') }}",
                    type: 'post',
                    dataType: "json",
                    data: {
                        _token: CSRF_TOKEN,
                        search: request.term
                    },
                    success: function(data) {
                        console.log(data);
                        if (data.length == 0) {
                            $('.medicamento_activo').hide();
                            $('.medicamento_inactivo').show();
                            $('#dosis_medicamento_ficha_dental_2').val('');
                            $('#frecuencia_medicamento_ficha_dental_2').val('');
                            $('#id_medicamento_ficha_dental').val('');
                            $('#id_medicamento_tipo_control').val('');
                            $('#mensaje_med_control').val('');
                        } else {
                            $('.medicamento_activo').show();
                            $('.medicamento_inactivo').hide();
                            $('#dosis_medicamento_ficha_dental_2').val('');
                            $('#frecuencia_medicamento_ficha_dental_2').val('');
                            // $('#id_medicamento_ficha_dental').val('');
                            $('#id_medicamento_tipo_control').val('');
                            $('#mensaje_med_control').val('');
                        }
                        response(data);
                    }
                });
            },
            select: function(event, ui) {
                console.log(ui.item);
                // Set selection
                $('#nombre_medicamento_ficha_dental_hosp').val(ui.item
                .label); // display the selected text
                $('#id_medicamento_ficha_dental').val(ui.item.value); // save selected id to input
                $('#nombre_composicion_farmaco_hosp').html(ui.item.droga); // save selected id to input
                $('#id_medicamento_tipo_control').val(ui.item.control); // save selected id to input
                if (ui.item.control == 1 || ui.item.control == 1 || ui.item.control == 2 || ui.item
                    .control == 3 || ui.item.control == 4 || ui.item.control == 5)
                    $('#mensaje_med_control').html(
                        'Este Paciente ha tenido 3 Recetas retenidas este año<br>Consulte en "Ranking de recetas controladas del paciente"'
                        );
                else
                    $('#mensaje_med_control').html('');

                return false;
            }
        });

        $('#medicamento_uso_cronico').change(function() {
            if ($('#medicamento_uso_cronico').is(':checked')) {
                $('#mensaje_uso_cronico').show();
            } else {
                $('#mensaje_uso_cronico').hide();
            }
        });

        $('#manual_medicamento_uso_cronico').change(function() {
            if ($('#manual_medicamento_uso_cronico').is(':checked')) {
                $('#manual_mensaje_uso_cronico').show();
            } else {
                $('#manual_mensaje_uso_cronico').hide();
            }

        });

        var creatinina = 0;


        $('#tipo_examen').change(function(e) {
            console.log('tipo examen examen comun');
            e.preventDefault();
            tipo_examen = $('#tipo_examen').val();

            $("#sub_tipo_examen").empty();
            $("#examen").empty();
            $.ajax({
                    url: 'https://med-sdi.cl/api/Ficha_atencion_sub_tipo',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        tipo_examen: tipo_examen
                    },
                })
                .done(function(response) {

                    $('#sub_tipo_examen').append(
                        `<option value="0">Seleccione... </option>`);
                    for (var i = 0; i < response.length; i++) {
                        $('#sub_tipo_examen').append(`<option value="${response[i].cod_examen}">
                                        ${response[i].nombre_examen}
                                    </option>`);
                    }

                    /** ACTIVAR CHECHBOK DE CON  CONTRASTE */
                    if ($('#tipo_examen').val() == 354) $('#imagenologia_con_contraste').removeAttr(
                        'disabled');
                    else $('#imagenologia_con_contraste').attr('disabled', 'disabled');
                })
                .fail(function() {
                    console.log("error");
                })

        });


        $('#sub_tipo_examen').change(function(e) {

            e.preventDefault();
            sub_tipo_examen = $('#sub_tipo_examen').val();

            $("#examen").empty();
            $.ajax({
                    url: "{{ route('examen.medico.get') }}",
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        sub_tipo_examen: sub_tipo_examen
                    },
                })
                .done(function(response) {

                    $('#examen').append(`<option value="0">Seleccione... </option>`);
                    for (var i = 0; i < response.length; i++) {
                        $('#examen').append(`<option value="${response[i].cod_examen}">
                                        ${response[i].nombre_examen}
                                    </option>`);
                    }
                })
                .fail(function() {
                    console.log("error");
                })

        });


        $('#imagenologia_con_contraste').change(function() {
            if ($('#imagenologia_con_contraste').is(':checked')) {
                $('#mensaje_imagenologia_con_contraste').show();
            } else {
                $('#mensaje_imagenologia_con_contraste').hide();
            }

        });


    });
    function registrar_nueva_atencion(){
        let nivel_gravedad = $('#nivel_gravedad').val();
        let id_profesional = $('#profesional_asignado').val();
        let sala = $('#salas_servicio').val();
        let cama = $('#cama_atencion').val();
        let id_paciente = $('#reserva_hora_id_paciente').val();
        let id_servicio_interno = $('#id_servicio_interno').val();
        let observaciones = $('#observaciones_asignacion_sala').val();
        let motivo_hospitalizacion = $('#motivo_hospitalizacion').val();

        let valido = 1;
        let mensaje = '';

        if(nivel_gravedad == 0){
            valido = 0;
            mensaje += '<li>Campo requerido Nivel Gravedad </li>';
        }
        if(id_profesional == 0){
            valido = 0;
            mensaje += '<li>Campo requerido Profesional </li>';
        }
        if(sala == 0){
            valido = 0;
            mensaje += '<li>Campo requerido Sala </li>';
        }
        if(cama == 0){
            valido = 0;
            mensaje += '<li>Campo requerido Cama </li>';
        }
        // if(observaciones == ''){
        //     valido = 0;
        //     mensaje += '<li>Campo requerido Observaciones </li>';
        // }

        if(motivo_hospitalizacion == 0){
            valido = 0;
            mensaje += '<li>Campo requerido Motivo Hospitalización </li>';
        }

        if(valido == 0){
            swal({
                title: "Campos requeridos",
                content:{
                    element: "div",
                    attributes:{
                        innerHTML: mensaje,
                    },
                },
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });
            return false;
        }

        let url = "{{ ROUTE('adm_hospital.asignar_profesional_atencion') }}";

        let data = {
            nivel_gravedad: nivel_gravedad,
            id_profesional: id_profesional,
            sala: sala,
            cama: cama,
            id_paciente: id_paciente,
            id_servicio_interno: id_servicio_interno,
            observaciones: observaciones,
            motivo_hospitalizacion: motivo_hospitalizacion,
            _token: CSRF_TOKEN
        }

        $.ajax({
            type:'post',
            url: url,
            data: data,
            success: function(resp){
                console.log(resp);
                // cerrar modal
                $('#m_asignar_profesional').modal('hide');
                if(resp.estado == 'OK'){
                    swal({
                        icon:'success',
                        title:'Exito',
                        text:'Paciente asignado correctamente'
                    });
                }else{
                    swal({
                        icon:'info',
                        title:'INFO',
                        text:resp.mensaje
                    });
                }
            },
            error: function(error){
                console.log(error.responseText);
            }
        })
    }

    function agregarMedicamentoReceta(parametros, receta_am) {
        let url = "{{ route('detalle_receta.registro_receta') }}";
        let id_paciente = dame_id_paciente();
        let selectedOption = $('#dosis_medicamento_ficha_dental option:selected');
        let dataId = selectedOption.data('id');
        var _token = CSRF_TOKEN;
        $.ajax({

            url: url,
            type: "POST",
            data: {
                _token: _token,
                id_ficha: $('#id_fc').val(),
                id_tipo_control: parametros.id_tipo_control,
                id_medicamento: parametros.id_medicamento,
                nombre_medicamento_ficha_dental: parametros.nombre_medicamento_ficha_dental,
                id_dosis_medicamento_ficha_dental: dataId,
                nombre_dosis_ficha_dental: parametros.dosis_medicamento_ficha_dental,
                nombre_frecuencia_ficha_dental: parametros.frecuencia_medicamento_ficha_dental,
                id_frecuencia_medicamento_ficha_dental: parametros.id_frecuencia_medicamento_ficha_dental,
                via_administracion: parametros.via_administracion_ficha_dental,
                id_via_administracion: parametros.id_via_administracion_ficha_dental,
                farmaco: parametros.farmaco,
                observaciones: parametros.observaciones_medicamento_ficha_dental,
                uso_cronico: parametros.medicamento_uso_cronico,
                id_paciente: id_paciente,
                receta_am: receta_am,
            },
            success: function(resp) {
                console.log(resp);
                let mensaje = resp.status;
                if (mensaje == 'success') {
                    let medicamentos = resp.data;
                    $('#tbody_tabla_medicamento_cirugia_sdi').empty();
                    $('#tbody_tabla_medicamento_manual').empty();
                    $('#tabla_tratamientos_servicio tbody').empty();
                    medicamentos.forEach(medicamento => {
                        console.log(medicamento);
                        if (medicamento.id_dosis == null) {
                            medicamento.dosis = medicamento.nombre_dosis;
                        }

                        if (medicamento.id_frecuencia == null || medicamento.id_frecuencia == 0 ||
                            medicamento.id_frecuencia == 1000) {
                            medicamento.indicaciones = medicamento.nombre_frecuencia;
                        }
                        let fila = `<tr id="row${medicamento.id}">
                                        <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_tipo_control}</td>
                                        <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_medicamento}</td>
                                        <td class="text-center align-middle text-wrap">${medicamento.nombre_medicamento}</td>
                                        <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.farmaco}</td>
                                        <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_dosis_medicamento_ficha_dental}</td>
                                        <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_frecuencia_medicamento_ficha_dental}</td>
                                        <td class="text-center align-middle text-wrap">${medicamento.indicaciones}</td>
                                        <td class="text-center align-middle text-wrap hidden" hidden="hidden">${medicamento.id_via_administracion}</td>
                                        <td class="text-center align-middle text-wrap">${medicamento.via_administracion}</td>
                                        <td class="text-center align-middle text-wrap"><div name="remove" id="${medicamento.id}" class="btn btn-danger btn_remove btn-sm" onclick="eliminar_medicamento_sdi(${medicamento.id});"><i class="fas fa-trash"></i></div></td>
                                    </tr>`;

                        let fila_ = `<tr id="row${medicamento.id}">
                                        <td class="text-center align-middle text-wrap">${medicamento.fecha} ${medicamento.hora} <br> ${medicamento.responsable}</td>
                                        <td class="text-center align-middle text-wrap">${medicamento.nombre_medicamento}</td>
                                        <td class="text-center align-middle text-wrap">${medicamento.via_administracion}</td>
                                        <td><input type="text" disabled></td>
                                        <td class="p-0">
                                            <div class="switch switch-success d-inline">
                                                <input type="checkbox" id="tratamiento_listo${medicamento.id}" disabled>
                                                <label for="tratamiento_listo${medicamento.id}" class="cr"></label>
                                            </div><br>
                                            <label>Pendiente</label>
                                        </td>
                                        <td></td>
                                        <td>
                                            <button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#modalAgregarInsumos">Insumos</button>
                                        </td>
                                        <td> <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modalAgregarObservaciones" onclick="dame_tratamiento(${medicamento.id})"><i class="fas fa-edit"> </i></button></td>
                                    </tr>`;
                        $('#tbody_tabla_medicamento_cirugia_sdi').append(fila);
                        $('#tbody_tabla_medicamento_manual').append(fila);
                        $('#tabla_tratamientos_servicio tbody').append(fila_);
                    });
                    swal({
                        title: "Medicamento Agregado",
                        icon: "success",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                }
            },
            error: function(error) {
                console.log(error.responseText);
            }
        })
    }

    function getFrecuencia_sdi() {

        let id_dosis = $('#dosis_medicamento_ficha_dental_hosp').val();
        console.log(id_dosis);
        //console.log(dosis);

        let url = "{{ route('frecuencia.get') }}";
        $.ajax({

            url: url,
            type: "get",
            data: {

                id_dosis: id_dosis,

            },
        })
        .done(function(data) {
            console.log(data)

            if (data != null) {

                data = JSON.parse(data);
                console.log(data);
                let dosis = $('#frecuencia_medicamento_ficha_dental');

                dosis.find('option').remove();
                dosis.append('<option value="1000">Por una vez</option>');
                $(data).each(function(i, v) { // indice, valor
                    dosis.append('<option value="' + v.id + '">' + v.indic +
                        '</option>');
                })

            } else {



            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    };

function getCantComp_sdi() {

var cant_comp = $('#dosis_medicamento_ficha_dental_hosp option:selected').attr('data-cant_comp');
console.log(cant_comp);

let url = "{{ route('presentacion.get') }}";
$.ajax({

        url: url,
        type: "get",
        data: {

            cant_comp: cant_comp,

        },
    })
    .done(function(data) {
        console.log(data)

        if (data != null) {

            data = JSON.parse(data);
            console.log(data)
            let select_cant_comp = $('#cantidad_comprar');
            let select_cant_comp2 = $('#med_cronicomes');

            select_cant_comp.find('option').remove();
            select_cant_comp.append('<option value="0">Seleccione</option>');
            $(data).each(function(i, v) { // indice, valor
                select_cant_comp.append('<option value="' + v.cantidad + '">' + v.cant +
                    '</option>');
            })
            select_cant_comp.append('<option value="999">Otra Cantidad</option>');
        } else {



        }

    })
    .fail(function(jqXHR, ajaxOptions, thrownError) {
        console.log(jqXHR, ajaxOptions, thrownError)
    });

};

function getDosis() {

        let id_medicamento = $('#id_medicamento_ficha_dental').val();
        console.log(id_medicamento);

        let url = "{{ route('dosis.get') }}";
        $.ajax({

            url: url,
            type: "get",
            data: {

                id_medicamento: id_medicamento,

            },
        })
        .done(function(data) {
            console.log(data)

            if (data != null) {

                data = JSON.parse(data);
                console.log(data)
                let dosis = $('#dosis_medicamento_ficha_dental_hosp');

                dosis.find('option').remove();
                dosis.append('<option value="0">Seleccione</option>');
                $(data).each(function(i, v) { // indice, valor
                    dosis.append('<option value="' + v.dosis + '" data-id="'+v.id+'" data-cant_comp="'+v.cant_comp+'">' + v.present +
                        '</option>');
                })

            } else {



            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
};
</script>
