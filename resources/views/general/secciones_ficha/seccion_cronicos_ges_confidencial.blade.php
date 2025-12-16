<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card-a" style=" border: 1px solid #6c9bd5;">
        <div class="card-header-a" id="cgc" >
        <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button"  data-toggle="collapse" data-target="#cgc-c" aria-expanded="false" aria-controls="cgc-c">
              Nuevo Antecedente / Crónicos / GES / Confidencial
            </button>
        </div>
        <div id="cgc-c" class="collapse show" aria-labelledby="cgc" data-parent="#cgc">
            <div class="card-body-aten-a">
                <div class="row">
                    <!--NUEVO ANTECEDENTE-->
                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" onchange="ag_antecendente();" id="check_antecedentes" name="check_antecedentes" value="{!! old('check_antecedentes') !!}">
                                        <label class="custom-control-label" for="check_antecedentes">Agregar antecedente</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" hidden>
                            <div class="col-sm-12">
                                <div class="alert alert-warning mx-auto" role="alert">
                                    <table class="table table-borderless mt-0 mb-0">
                                        <tbody>
                                            <tr id="tr_obesidad">
                                                <td class="align-middle pb-1 pt-1">Obesidad</td>
                                                <td class="align-middle pb-1 pt-1">
                                                    <button type="button" class="btn  btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="Quitar">
                                                        <i class="feather icon-x"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr id="tr_diabetes">
                                                <td class="align-middle pb-1 pt-1">Diabetes</td>
                                                <td class="align-middle pb-1 pt-1">
                                                    <button type="button" class="btn  btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="Quitar">
                                                        <i class="feather icon-x"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr id="tr_hipertesion">
                                                <td class="align-middle pb-1 pt-1">Hipertensión</td>
                                                <td class="align-middle pb-1 pt-1">
                                                    <button type="button" class="btn  btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="Quitar">
                                                        <i class="feather icon-x"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- CRONICO --}}
                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" onchange="es_cronico();" id="enf_cronico" name="enf_cronico" data-toggle="modal" data-target="#form_enfermo_cronico" value="{!! old('enf_cronico') !!}">
                                        <label class="custom-control-label" for="enf_cronico">Control crónico</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" hidden>
                            <div class="col-sm-12">
                                <div class="alert alert-warning mx-auto" role="alert">
                                    <table class="table table-borderless mt-0 mb-0">
                                        <tbody>
                                            <tr id="tr_obesidad">
                                                <td class="align-middle pb-1 pt-1">Obesidad</td>
                                                <td class="align-middle pb-1 pt-1">
                                                    <button type="button" class="btn  btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="Quitar">
                                                        <i class="feather icon-x"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr id="tr_diabetes">
                                                <td class="align-middle pb-1 pt-1">Diabetes</td>
                                                <td class="align-middle pb-1 pt-1">
                                                    <button type="button" class="btn  btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="Quitar">
                                                        <i class="feather icon-x"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr id="tr_hipertesion">
                                                <td class="align-middle pb-1 pt-1">Hipertensión</td>
                                                <td class="align-middle pb-1 pt-1">
                                                    <button type="button" class="btn  btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="Quitar">
                                                        <i class="feather icon-x"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- GES --}}
                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="modal_ges" name="modal_ges" value="{!! old('modal_ges') !!}">
                                        {{-- <label for="modal_ges" class="cr" data-toggle="modal"
                                                data-target="#form_ges"></label> --}}
                                        <label class="custom-control-label" for="modal_ges">GES</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" hidden>
                            <div class="alert alert-warning mx-auto my-0" role="alert">
                                <table class="table table-borderless mt-0 mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="align-middle pb-1 pt-1">Paciente GES<br>PS.02
                                            </td>
                                            <td class="align-middle pb-1 pt-1">
                                                <button type="button" class="btn  btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="Quitar">
                                                    <i class="feather icon-x"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="confidencial" name="confidencial" value="{!! old('confidencial') !!}" >
                                        <label class="custom-control-label" for="confidencial">Confidencial</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="confidencial_descripcion" style="display: none">
                            <div class="col-sm-12">
                                <div class="alert alert-warning mx-auto" role="alert">
                                    <p class="text-dark f-14 pb-1 pt-1 mt-0 mb-0">Este registro
                                        de atención médica es confidencial
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- MODAL CRONICO -->
<!--******* Modal: ¿Enfermo crónico? *******-->
<div id="form_enfermedad_cronica" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="form_enfermedad_cronica" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <div class="row w-100">
                    <div class="col-md-8">
                        <h5 class="modal-title text-white">Control de enfermedades crónicas</h5>
                    </div>
                    <div class="col-md-4">
                        <select class="form-control form-control-sm" onchange="cambiar_enfermedad_cronica();" id="cronicos" name="cronicos" >
                            <option value="n_C">Seleccione control</option>
                            <option value="cpeso">Obesidad</option>
                            <option value="chipertension">Hipertensión arterial</option>
                            <option value="cdiabet">Diabetes</option>
                            <option value="cinsufren">Insuficiencia renal</option>
                            <option value="cmtumorales">Marcadores tumorales</option>
                            <option value="creumato">Reumatología</option>
                            <option value="clitemia">Litemia</option>
                        </select>
                    </div>
                </div>
                <button type="button" class="close" data-bs-dismiss="modal" onclick="$('#form_enfermedad_cronica').modal('hide')" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--CONTROL DE OBESIDAD-->
                <div id="control_peso_div"  style="display:">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <h5 class="f-20 text-center text-c-blue">Control obesidad</h5>
                        </div>
                    </div>
                    <div class="card-informacion">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                                    <ul class="nav nav-tabs-aten nav-fill" id="orl_adulto" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link-aten text-reset active" id="obes-ctrl-tab" data-toggle="tab" href="#obes-ctrl" role="tab" aria-controls="obes-ctrl" aria-selected="true">Control</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link-aten text-reset" id="obes-hist-tab" data-toggle="tab" href="#obes-hist" role="tab" aria-controls="obes-hist" aria-selected="true">Historial de controles</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link-aten text-reset" id="obes-med-tab" data-toggle="tab" href="#obes-med" role="tab" aria-controls="obes-med" aria-selected="true">Medicamentos</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="tab-content" id="orl_adulto">
                                        <!--CONTROL-->
                                        <div class="tab-pane fade show active" id="obes-ctrl" role="tabpanel" aria-labelledby="obes-ctrl-tab">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <h5 class="t-aten">Control</h5>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-6 col-lg-3 col-xl-3">
                                                    <label class="floating-label-activo-sm" for="registro_peso">Peso</label>
                                                    <input type="text" class="form-control form-control-sm" name="registro_peso" id="registro_peso">
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6 col-lg-3 col-xl-3">
                                                    <label class="floating-label-activo-sm" for="registro_peso_variacion">Variación</label>
                                                    <input type="text" class="form-control form-control-sm" name="registro_peso_variacion" id="registro_peso_variacion">
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6 col-lg-3 col-xl-3">
                                                    <label class="floating-label-activo-sm" for="registro_peso_ideal">Peso Ideal</label>
                                                    <input type="text" class="form-control form-control-sm" name="registro_peso_ideal" id="registro_peso_ideal">
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6 col-lg-3 col-xl-3">
                                                    <button type="button" onclick="registrar_control_obesidad();"
                                                    class="btn btn-info btn-sm btn-block"><i class="feather icon-save"></i> Guardar control</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!--HISTORIAL DE CONTROLES-->
                                        <div class="tab-pane fade show" id="obes-hist" role="tabpanel" aria-labelledby="obes-hist-tab">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <h5 class="t-aten">Historial de controles</h5>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table id="control_obesidad" class="display table table-striped dt-responsive nowrap pb-4 table-xs" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Nº Control</th>
                                                                <th>Fecha</th>
                                                                <th>Peso</th>
                                                                <th>Variación</th>
                                                                <th>Peso Ideal</th>
                                                                <!-- <th class="text-center align-middle">Acción</th>-->
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            @if (isset($control_peso))
                                                                @foreach ($control_peso as $cp)
                                                                    <tr>
                                                                        <td>{{ $cp->id }}</td>
                                                                        <td>
                                                                            {{ \Carbon\Carbon::parse($cp->created_at)->format('d-m-Y') }}
                                                                        </td>
                                                                        <td>{{ $cp->peso }}</td>
                                                                        <td>{{ $cp->variacion }}
                                                                        </td>
                                                                        <td>{{ $cp->ideal }}</td>
                                                                        <!--<td class="text-center align-middle">
                                                                            <button href="#!" class="btn btn-danger btn-sm">
                                                                                <i class="feather icon-x"></i> Eliminar</button>
                                                                        </td>-->
                                                                    </tr>

                                                                @endforeach
                                                            @else
                                                                <span>NO EXISTEN REGISTROS</span>

                                                            @endif


                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!--MEDICAMENTOS-->
                                        <div class="tab-pane fade show" id="obes-med" role="tabpanel" aria-labelledby="obes-med-tab">
                                            <div id="obes_med_formulario">
                                                <div class="form-row ">
                                                    <div class="col-sm-6 mt-2">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Medicamento</label>
                                                            <input type="text" id="nombre_medicamento_cpeso" name="nombre_medicamento_cpeso" onblur="getDosis_cronico('cpeso');" class="form-control form-control-sm">
                                                            <input type="hidden" id="id_medicamento_cpeso" name="id_medicamento_cpeso" class="form-control " value="">
                                                            <input type="hidden" id="id_medicamento_tipo_control_cpeso" name="id_medicamento_tipo_control_cpeso" class="form-control" value="">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 mt-2">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Composición:</label>
                                                            <div id="nombre_composicion_farmaco_cpeso" name="nombre_composicion_farmaco_cpeso" class="p-t-5"></div>
                                                        </div>
                                                    </div>
                                                    {{--  CUANDO SE ENCUENTRA MEDICAMENTO EN BUSQUEDA  --}}
                                                    <div class="col-sm-6 mt-2 medicamento_activo">
                                                        <div class="form-group fill">
                                                            <label class="floating-label-activo-sm">Presentación</label>
                                                            <select class="form-control form-control-sm" id="dosis_medicamento_cpeso" name="dosis_medicamento_cpeso" onchange="getFrecuencia_cronico('cpeso');getCantComp_cronico('cpeso');">
                                                                <option>Seleccione una opción</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 mt-2 medicamento_activo">
                                                        <div class="form-group fill">
                                                            <label class="floating-label-activo-sm">Posología</label>
                                                            <select class="form-control form-control-sm" id="frecuencia_medicamento_cpeso"
                                                                name="frecuencia_medicamento_cpeso">
                                                                <option>Seleccione una opción</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    {{--  SI NO SE ENCUENTRA EL MEDICAMENTO EN LA BUSQUEDA  --}}
                                                    <div class="col-sm-6 mt-2 medicamento_inactivo" style="display:none;">
                                                        <div class="form-group fill">
                                                            <label class="floating-label-activo-sm">Presentación</label>
                                                            <input type="text" name="dosis_medicamento_cpeso_2" id="dosis_medicamento_cpeso_2" class="form-control form-control-sm ">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 mt-2 medicamento_inactivo" style="display:none;">
                                                        <div class="form-group fill">
                                                            <label class="floating-label-activo-sm">Posología</label>
                                                            <input type="text" name="frecuencia_medicamento_cpeso_2" id="frecuencia_medicamento_cpeso_2" class="form-control form-control-sm ">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 mt-2">
                                                        <div class="form-group fill">
                                                            <label class="floating-label-activo-sm">Vía de Administración</label>
                                                            <select class="form-control form-control-sm" id="via_administracion_cpeso" name="via_administracion_cpeso" onchange="validar_via_administracion_cronico('cpeso');">
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
                                                        <div class="form-group fill" id="div_observaciones_medicamento_cpeso" style="display: none;">
                                                            <label class="floating-label-activo-sm">Otra vía de Administración</label>
                                                            <input type="text" id="observaciones_medicamento_cpeso" name="observaciones_medicamento_cpeso" class="form-control form-control-sm " disabled >
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 mt-2">
                                                        <div class="form-group fill">
                                                            <label class="floating-label-activo-sm">Periodo</label>
                                                            <select class="form-control form-control-sm" id="periodo_cpeso" name="periodo_cpeso" onchange="validar_periodo_cronico('cpeso');">
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
                                                        <div class="form-group fill" id="div_observaciones_periodo_cpeso" style="display: none;">
                                                            <label class="floating-label">Otro Periodo</label>
                                                            <input type="text" id="observaciones_periodo_cpeso" name="observaciones_periodo_cpeso" class="form-control form-control-sm " disabled >
                                                        </div>
                                                    </div>
                                                    {{-- cantidad de medicamento a despachar o comprar    --}}
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Cantidad a comprar o despachar</label>
                                                            <select class="form-control form-control-sm" id="cantidad_comprar_cpeso" name="cantidad_comprar_cpeso" onchange="validar_cantidad_comprar_cronico('cpeso');">
                                                                <option value="0">Seleccione</option>
                                                                <option value="999">Otra cantidad</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group" id="div_otra_cantidad_a_comprar_cpeso" style="display: none;">
                                                            <label class="floating-label-activo-sm">Otra cantidad</label>
                                                            <input type="text" id="otra_cantidad_a_comprar_cpeso" name="otra_cantidad_a_comprar_cpeso" class="form-control form-control-sm " disabled >
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12 col-md-6  col-lg-6 col-xl-6 p-0">
                                                        <button class="btn btn-success btn-block btn-sm" type="button" onclick="agregar_medicamento_cronico_patologia('cpeso')" id="btn_registro_med_cpeso"><i class="fa fa-plus"></i> Registrar</button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="cpeso-med">

                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 mx-auto text-center">
                                                    @if (!empty(session('lic_token')) && session('lic_token') == 1)
                                                        <button type="button" class="btn btn-info btn_agregar_medicamento text-center" onclick="agregar_a_receta('cpeso')"><i class="feather icon-check"></i> Agregar Medicamento a Receta</button>
                                                    @else
                                                        <button type="button" class="btn btn-info btn_agregar_medicamento text-center" onclick="agregar_a_receta('cpeso')" disabled="disabled"><i class="feather icon-check"></i> Agregar Medicamento a Receta</button>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--CONTROL DE HIPERTENSIÓN-->
                <div id="hipertension_div" style="display: none">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <h5 class="f-20 text-center text-c-blue"Control hipertensión</h5>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                                    <ul class="nav nav-tabs-aten nav-fill" id="orl_adulto" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link-aten text-reset active" id="hiper-ctrl-tab" data-toggle="tab" href="#hiper-ctrl" role="tab" aria-controls="hiper-ctrl" aria-selected="true">Control</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link-aten text-reset" id="hiper-hist-tab" data-toggle="tab" href="#hiper-hist" role="tab" aria-controls="hiper-hist" aria-selected="true">Historial de controles</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link-aten text-reset" id="hiper-med-tab" data-toggle="tab" href="#hiper-med" role="tab" aria-controls="hiper-med" aria-selected="true">Medicamentos</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="tab-content" id="orl_adulto">
                                        <!--CONTROL-->
                                        <div class="tab-pane fade show active" id="hiper-ctrl" role="tabpanel" aria-labelledby="hiper-ctrl-tab">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <h5 class="t-aten">Control</h5>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-6 col-lg-3 col-xl-3">
                                                    <label class="floating-label-activo-sm">Presión Sistólica</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="presion_sistolica_hipertension" id="presion_sistolica_hipertension">
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6 col-lg-3 col-xl-3">
                                                    <label class="floating-label-activo-sm">Presión Diastólica</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="presion_diastolica_hipertension" id="presion_diastolica_hipertension">
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6 col-lg-3 col-xl-3">
                                                    <label class="floating-label-activo-sm">Presión Ideal</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="ideal_hipertension" id="ideal_hipertension">
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6 col-lg-3 col-xl-3">
                                                    <button type="button" onclick="registrar_hipertension();"
                                                    class="btn btn-info btn-sm btn-block"><i class="feather icon-save"></i> Guardar control</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!--HISTORIAL DE CONTROLES-->
                                        <div class="tab-pane fade show" id="hiper-hist" role="tabpanel" aria-labelledby="hiper-hist-tab">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <h5 class="t-aten">Historial de controles</h5>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <table id="control_hipertension"
                                                        class="display table table-striped dt-responsive nowrap pb-4 table-xs"
                                                        style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Nº Control</th>
                                                                <th>Fecha</th>
                                                                <th>Presión Sistólica</th>
                                                                <th>Presión Diastólica</th>
                                                                <th>Presión Ideal</th>
                                                                <!-- <th class="text-center align-middle">Acción</th>-->
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if (isset($hipertension))
                                                                @foreach ($hipertension as $h)
                                                                <tr>
                                                                    <td>{{ $h->id }}</td>
                                                                    <td>
                                                                        {{ \Carbon\Carbon::parse($h->created_at)->format('d-m-Y H:i') }}
                                                                    </td>
                                                                    <td>{{ $h->sistolica }}</td>
                                                                    <td>{{ $h->diastolica }}
                                                                    </td>
                                                                    <td>{{ $h->ideal }}</td>
                                                                    <!--<td class="text-center align-middle">
                                                                        <button href="#!" class="btn btn-danger btn-sm">
                                                                            <i class="feather icon-x"></i> Eliminar</button>
                                                                    </td>-->
                                                                </tr>
                                                                @endforeach
                                                            @else
                                                                <span>NO EXISTEN REGISTROS</span>
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!--MEDICAMENTOS-->
                                        <div class="tab-pane fade show" id="hiper-med" role="tabpanel" aria-labelledby="hiper-med-tab">
                                            <div id="hiper_med_formulario">
                                                <div class="form-row ">
                                                    <div class="col-sm-6 mt-2">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Medicamento</label>
                                                            <input type="text" id="nombre_medicamento_chipertension" name="nombre_medicamento_chipertension" onblur="getDosis_cronico('chipertension');" class="form-control form-control-sm">
                                                            <input type="hidden" id="id_medicamento_chipertension" name="id_medicamento_chipertension" class="form-control " value="">
                                                            <input type="hidden" id="id_medicamento_tipo_control_chipertension" name="id_medicamento_tipo_control_chipertension" class="form-control" value="">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 mt-2">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Composición:</label>
                                                            <div id="nombre_composicion_farmaco_chipertension" name="nombre_composicion_farmaco_chipertension" class="p-t-5"></div>
                                                        </div>
                                                    </div>
                                                    {{--  CUANDO SE ENCUENTRA MEDICAMENTO EN BUSQUEDA  --}}
                                                    <div class="col-sm-6 mt-2 medicamento_activo">
                                                        <div class="form-group fill">
                                                            <label class="floating-label-activo-sm">Presentación</label>
                                                            <select class="form-control form-control-sm" id="dosis_medicamento_chipertension" name="dosis_medicamento_chipertension" onchange="getFrecuencia_cronico('chipertension');getCantComp_cronico('chipertension');">
                                                                <option>Seleccione una opción</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 mt-2 medicamento_activo">
                                                        <div class="form-group fill">
                                                            <label class="floating-label-activo-sm">Posología</label>
                                                            <select class="form-control form-control-sm" id="frecuencia_medicamento_chipertension"
                                                                name="frecuencia_medicamento_chipertension">
                                                                <option>Seleccione una opción</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    {{--  SI NO SE ENCUENTRA EL MEDICAMENTO EN LA BUSQUEDA  --}}
                                                    <div class="col-sm-6 mt-2 medicamento_inactivo" style="display:none;">
                                                        <div class="form-group fill">
                                                            <label class="floating-label-activo-sm">Presentación</label>
                                                            <input type="text" name="dosis_medicamento_chipertension_2" id="dosis_medicamento_chipertension_2" class="form-control form-control-sm ">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 mt-2 medicamento_inactivo" style="display:none;">
                                                        <div class="form-group fill">
                                                            <label class="floating-label-activo-sm">Posología</label>
                                                            <input type="text" name="frecuencia_medicamento_chipertension_2" id="frecuencia_medicamento_chipertension_2" class="form-control form-control-sm ">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 mt-2">
                                                        <div class="form-group fill">
                                                            <label class="floating-label-activo-sm">Vía de Administración</label>
                                                            <select class="form-control form-control-sm" id="via_administracion_chipertension" name="via_administracion_chipertension" onchange="validar_via_administracion_cronico('chipertension');">
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
                                                        <div class="form-group fill" id="div_observaciones_medicamento_chipertension" style="display: none;">
                                                            <label class="floating-label-activo-sm">Otra vía de Administración</label>
                                                            <input type="text" id="observaciones_medicamento_chipertension" name="observaciones_medicamento_chipertension" class="form-control form-control-sm " disabled >
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 mt-2">
                                                        <div class="form-group fill">
                                                            <label class="floating-label-activo-sm">Periodo</label>
                                                            <select class="form-control form-control-sm" id="periodo_chipertension" name="periodo_chipertension" onchange="validar_periodo_cronico('chipertension');">
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
                                                        <div class="form-group fill" id="div_observaciones_periodo_chipertension" style="display: none;">
                                                            <label class="floating-label-activo-sm">Otro Periodo</label>
                                                            <input type="text" id="observaciones_periodo_chipertension" name="observaciones_periodo_chipertension" class="form-control form-control-sm " disabled >
                                                        </div>
                                                    </div>
                                                    {{-- cantidad de medicamento a despachar o comprar    --}}
                                                    <div class="col-sm-6">
                                                        <div class="form-group fill">
                                                            <label class="floating-label-activo-sm">Cantidad a Comprar o Despachar</label>
                                                            <select class="form-control form-control-sm" id="cantidad_comprar_chipertension" name="cantidad_comprar_chipertension" onchange="validar_cantidad_comprar_cronico('chipertension');">
                                                                <option value="0">Seleccione</option>
                                                                <option value="999">Otra cantidad</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group fill" id="div_otra_cantidad_a_comprar_chipertension" style="display: none;">
                                                            <label class="floating-label-activo-sm">Otra Cantidad</label>
                                                            <input type="text" id="otra_cantidad_a_comprar_chipertension" name="otra_cantidad_a_comprar_chipertension" class="form-control form-control-sm " disabled >
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12 col-md-6  col-lg-6 col-xl-6 p-0">
                                                        <button class="btn btn-success btn-block btn-sm" type="button" onclick="agregar_medicamento_cronico_patologia('chipertension')" id="btn_registro_med_chipertension"><i class="fa fa-plus"></i> Registrar</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="chipertension-med">
                                            </div>
                                            <div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 mx-auto text-center">
                                                @if (!empty(session('lic_token')) && session('lic_token') == 1)
                                                    <button type="button" class="btn btn-success-light-c btn_agregar_medicamento text-center" onclick="agregar_a_receta('chipertension')"><i class="feather icon-check"></i>Agregar Medicamento a Receta</button>
                                                @else
                                                    <button type="button" class="btn btn-success-light-c btn_agregar_medicamento text-center" onclick="agregar_a_receta('chipertension')" disabled="disabled"><i class="feather icon-check"></i>Agregar Medicamento a Receta</button>
                                                @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--CONTROL DE DIABETES-->
                <div id="diabetes_div"  style="display: none">
                     <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <h5 class="f-20 text-center text-c-blue">Control diabetes</h5>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                                    <ul class="nav nav-tabs-aten nav-fill" id="orl_adulto" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link-aten text-reset active" id="diabet-ctrl-tab" data-toggle="tab" href="#diabet-ctrl" role="tab" aria-controls="diabet-ctrl" aria-selected="true">Control</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link-aten text-reset" id="diabet-hist-tab" data-toggle="tab" href="#diabet-hist" role="tab" aria-controls="diabet-hist" aria-selected="true">Historial de controles</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link-aten text-reset" id="diabet-med-tab" data-toggle="tab" href="#diabet-med" role="tab" aria-controls="diabet-med" aria-selected="true">Medicamentos</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="tab-content" id="orl_adulto">
                                        <!--CONTROL-->
                                        <div class="tab-pane fade show active" id="diabet-ctrl" role="tabpanel" aria-labelledby="diabet-ctrl-tab">
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-3">
                                                    <label class="floating-label-activo-sm">Peso</label>
                                                    <input type="text" class="form-control form-control-sm" name="peso_diabetes"
                                                        id="peso_diabetes">
                                                </div>
                                                <div class="form-group col-sm-12 col-md-3">
                                                    <label class="floating-label-activo-sm">Piés</label>
                                                    <input type="text" class="form-control form-control-sm" name="pies_diabetes"
                                                        id="pies_diabetes">
                                                </div>
                                                <div class="form-group col-sm-12 col-md-3">
                                                    <label class="floating-label-activo-sm">Hg A1c</label>
                                                    <input type="text" class="form-control form-control-sm" name="hga1c_diabetes"
                                                        id="hga1c_diabetes">
                                                </div>
                                                <div class="form-group col-sm-12 col-md-3">
                                                    <label class="floating-label-activo-sm">Creatina</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="creatina_diabetes" id="creatina_diabetes">
                                                </div>
                                                <div class="form-group col-sm-12 col-md-3">
                                                    <label class="floating-label-activo-sm">Glucosuria</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="glucosuria_diabetes" id="glucosuria_diabetes">
                                                </div>
                                                <div class="form-group col-sm-12 col-md-3">
                                                    <label class="floating-label-activo-sm">Glicosilada postprandial</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="glicosilada_postprandial_diabetes"
                                                        id="glicosilada_postprandial_diabetes">
                                                </div>
                                                <div class="form-group col-sm-12 col-md-3">
                                                    <label class="floating-label-activo-sm">Glicosilada ayuno</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="glicosilada_ayuno_diabetes" id="glicosilada_ayuno_diabetes">
                                                </div>
                                                <div class="form-group col-sm-12 col-md-3">
                                                    <button type="button" onclick="registrar_diabetes();"
                                                        class="btn btn-info btn-sm btn-block"><i
                                                            class="feather icon-save"></i> Guardar control</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!--HISTORIAL DE CONTROLES-->
                                        <div class="tab-pane fade show" id="diabet-hist" role="tabpanel" aria-labelledby="diabet-hist-tab">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <h5 class="t-aten">Historial de controles</h5>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                     <div style="overflow-x:auto;">
                                                        <table id="control_diabetes"
                                                            class="display table table-striped dt-responsive nowrap table-xs"
                                                            style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>Nº Control</th>
                                                                    <th>Fecha</th>
                                                                    <th>Peso</th>
                                                                    <th>Piés</th>
                                                                    <th>Hg A1c</th>
                                                                    <th>Creatina</th>
                                                                    <th>Glucosuria</th>
                                                                    <th>Glicosilada ayuno</th>
                                                                    <th>Glicosilada postprandial</th>
                                                                    {{-- <th>Acción</th> --}}
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                @if (isset($diabetes))
                                                                    @foreach ($diabetes as $d)
                                                                        <tr>
                                                                            <td class="text-center align-middle">{{ $d->id }}</td>
                                                                            <td class="text-center align-middle">{{ \Carbon\Carbon::parse($d->created_at)->format('d-m-Y') }}</td>
                                                                            <td class="text-center align-middle">{{ $d->peso }}</td>
                                                                            <td class="text-center align-middle">{{ $d->pies }}</td>
                                                                            <td class="text-center align-middle">{{ $d->hgac1 }}</td>
                                                                            <td class="text-center align-middle">{{ $d->creatina }}</td>
                                                                            <td class="text-center align-middle">{{ $d->glucosuria }}</td>
                                                                            <td class="text-center align-middle">{{ $d->glicosilada_ayuno }}</td>
                                                                            <td class="text-center align-middle">{{ $d->glicosilada_postprandial }}</td>
                                                                            {{-- <td class="text-center align-middle">
                                                                                <button href="#!" class="btn btn-danger btn-sm">
                                                                                    <i class="feather icon-x"></i>
                                                                                    Eliminar
                                                                                </button>
                                                                            </td> --}}
                                                                        </tr>
                                                                    @endforeach
                                                                @else
                                                                    <span>NO EXISTEN REGISTROS</span>

                                                                @endif

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--MEDICAMENTOS-->
                                        <div class="tab-pane fade show" id="diabet-med" role="tabpanel" aria-labelledby="diabet-med-tab">
                                            <div id="diabet_med_formulario">
                                                <div class="form-row ">
                                                    <div class="col-sm-6 mt-2">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Medicamento</label>
                                                            <input type="text" id="nombre_medicamento_cdiabet" name="nombre_medicamento_cdiabet" onblur="getDosis_cronico('cdiabet');" class="form-control form-control-sm">
                                                            <input type="hidden" id="id_medicamento_cdiabet" name="id_medicamento_cdiabet" class="form-control " value="">
                                                            <input type="hidden" id="id_medicamento_tipo_control_cdiabet" name="id_medicamento_tipo_control_cdiabet" class="form-control" value="">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 mt-2">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Composición:</label>
                                                            <div id="nombre_composicion_farmaco_cdiabet" name="nombre_composicion_farmaco_cdiabet" class="p-t-5"></div>
                                                        </div>
                                                    </div>
                                                    {{--  CUANDO SE ENCUENTRA MEDICAMENTO EN BUSQUEDA  --}}
                                                    <div class="col-sm-6 mt-2 medicamento_activo">
                                                        <div class="form-group fill">
                                                            <label class="floating-label-activo-sm">Presentación</label>
                                                            <select class="form-control form-control-sm" id="dosis_medicamento_cdiabet" name="dosis_medicamento_cdiabet" onchange="getFrecuencia_cronico('cdiabet');getCantComp_cronico('cdiabet');">
                                                                <option>Seleccione una opción</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 mt-2 medicamento_activo">
                                                        <div class="form-group fill">
                                                            <label class="floating-label-activo-sm">Posología</label>
                                                            <select class="form-control form-control-sm" id="frecuencia_medicamento_cdiabet"
                                                                name="frecuencia_medicamento_cdiabet">
                                                                <option>Seleccione una opción</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    {{--  SI NO SE ENCUENTRA EL MEDICAMENTO EN LA BUSQUEDA  --}}
                                                    <div class="col-sm-6 mt-2 medicamento_inactivo" style="display:none;">
                                                        <div class="form-group fill">
                                                            <label class="floating-label-activo-sm">Presentación</label>
                                                            <input type="text" name="dosis_medicamento_cdiabet_2" id="dosis_medicamento_cdiabet_2" class="form-control form-control-sm ">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 mt-2 medicamento_inactivo" style="display:none;">
                                                        <div class="form-group fill">
                                                            <label class="floating-label-activo-sm">Posología</label>
                                                            <input type="text" name="frecuencia_medicamento_cdiabet_2" id="frecuencia_medicamento_cdiabet_2" class="form-control form-control-sm ">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 mt-2">
                                                        <div class="form-group fill">
                                                            <label class="floating-label-activo-sm">Vía de Administración</label>
                                                            <select class="form-control form-control-sm" id="via_administracion_cdiabet" name="via_administracion_cdiabet" onchange="validar_via_administracion_cronico('cdiabet');">
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
                                                        <div class="form-group fill" id="div_observaciones_medicamento_cdiabet" style="display: none;">
                                                            <label class="floating-label-activo-sm">Otra vía de Administración</label>
                                                            <input type="text" id="observaciones_medicamento_cdiabet" name="observaciones_medicamento_cdiabet" class="form-control form-control-sm " disabled >
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 mt-2">
                                                        <div class="form-group fill">
                                                            <label class="floating-label-activo-sm">Periodo</label>
                                                            <select class="form-control form-control-sm" id="periodo_cdiabet" name="periodo_cdiabet" onchange="validar_periodo_cronico('cdiabet');">
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
                                                        <div class="form-group fill" id="div_observaciones_periodo_cdiabet" style="display: none;">
                                                            <label class="floating-label-activo-sm">Otro Periodo</label>
                                                            <input type="text" id="observaciones_periodo_cdiabet" name="observaciones_periodo_cdiabet" class="form-control form-control-sm " disabled >
                                                        </div>
                                                    </div>
                                                    {{-- cantidad de medicamento a despachar o comprar    --}}
                                                    <div class="col-sm-6">
                                                        <div class="form-group fill">
                                                            <label class="floating-label-activo-sm">Cantidad a Comprar o Despachar</label>
                                                            <select class="form-control form-control-sm" id="cantidad_comprar_cdiabet" name="cantidad_comprar_cdiabet" onchange="validar_cantidad_comprar_cronico('cdiabet');">
                                                                <option value="0">Seleccione</option>
                                                                <option value="999">Otra Cantidad</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group fill" id="div_otra_cantidad_a_comprar_cdiabet" style="display: none;">
                                                            <label class="floating-label-activo-sm">Otra Cantidad</label>
                                                            <input type="text" id="otra_cantidad_a_comprar_cdiabet" name="otra_cantidad_a_comprar_cdiabet" class="form-control form-control-sm " disabled >
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12 col-md-6  col-lg-6 col-xl-6 p-0">
                                                        <button class="btn btn-success btn-block btn-sm" type="button" onclick="agregar_medicamento_cronico_patologia('cdiabet')" id="btn_registro_med_cdiabet"><i class="fa fa-plus"></i> Registrar</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="cdiabet-med">
                                            </div>
                                            <div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8 mx-auto text-center">
                                                @if (!empty(session('lic_token')) && session('lic_token') == 1)
                                                    <button type="button" class="btn btn-success-light-c btn_agregar_medicamento text-center" onclick="agregar_a_receta('cdiabet')"><i class="feather icon-check"></i>Agregar Medicamento a Receta</button>
                                                @else
                                                    <button type="button" class="btn btn-success-light-c btn_agregar_medicamento text-center" onclick="agregar_a_receta('cdiabet')" disabled="disabled"><i class="feather icon-check"></i>Agregar Medicamento a Receta</button>
                                                @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--INSUFICIENCIA RENAL-->
                <div id="cinsufren_div" style="display:none;">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <h5 class="f-20 text-center text-c-blue">Insuficiencia renal</h5>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                                    <ul class="nav nav-tabs-aten nav-fill" id="orl_adulto" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link-aten text-reset active" id="hiper-ctrl-tab" data-toggle="tab" href="#renal-ctrl" role="tab" aria-controls="renal-ctrl" aria-selected="true">Control</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link-aten text-reset" id="renal-hist-tab" data-toggle="tab" href="#renal-hist" role="tab" aria-controls="renal-hist" aria-selected="true">Historial de controles</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link-aten text-reset" id="renal-med-tab" data-toggle="tab" href="#renal-med" role="tab" aria-controls="renal-med" aria-selected="true">Medicamentos</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="tab-content" id="tab_cinsufren">
                                        <!--CONTROL-->
                                        <div class="tab-pane fade show active" id="renal-ctrl" role="tabpanel" aria-labelledby="renal-ctrl-tab">

                                            <!--<div class="form-row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <h5 class="t-aten">Control</h5>
                                                </div>
                                            </div>-->
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <h5 class="t-aten">Control</h5>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-sm-2 col-md-2">
                                                    <label class="floating-label-activo-sm">Peso</label>
                                                    <input type="text" class="form-control form-control-sm" name="registro_peso" id="registro_peso">
                                                </div>
                                                <div class="form-group col-sm-4 col-md-4">
                                                    <button type="button" onclick="registrar_control_insuficiencia_renal();"
                                                    class="btn btn-info btn-sm btn-block"><i class="feather icon-save"></i> Guardar control</button>
                                                </div>
                                            </div>

                                        </div>
                                        <!--HISTORIAL DE CONTROLES-->
                                        <div class="tab-pane fade show" id="renal-hist" role="tabpanel" aria-labelledby="renal-hist-tab">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <h5 class="t-aten">Historial de controles</h5>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                     <table id="control_obesidad"
                                                        class="display table table-striped dt-responsive nowrap pb-4 table-xs"
                                                        style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Nº Control</th>
                                                                <th>Fecha</th>
                                                                <!-- <th class="text-center align-middle">Acción</th>-->
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            @if (isset($contro))
                                                                @foreach ($contro as $cp)
                                                                    <tr>
                                                                        <td>{{ $cp->id }}</td>
                                                                        <!--<td class="text-center align-middle">
                                                                            <button href="#!" class="btn btn-danger btn-sm">
                                                                                <i class="feather icon-x"></i> Eliminar</button>
                                                                        </td>-->
                                                                    </tr>

                                                                @endforeach
                                                            @else
                                                                <span>No existen registros</span>

                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!--MEDICAMENTOS-->
                                        <div class="tab-pane fade show" id="renal-med" role="tabpanel" aria-labelledby="renal-med-tab">
                                            <div id="renal_med_formulario">
                                                <div class="form-row ">
                                                    <div class="form-group col-sm-12 col-md-12 col-lg-9 col-xl-9 ">
                                                        <label class="floating-label-activo-sm">Nombre medicamento</label>
                                                        <input type="text" class="form-control form-control-sm" name="nombre_medicamentocron_cinsufren" id="nombre_medicamentocron_cinsufren">
                                                        <input type="hidden" name="id_medicamentocron_cinsufren" id="id_medicamentocron_cinsufren" value=""/>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-3 ">
                                                        <label class="floating-label-activo-sm">Presentación</label>
                                                        <select class="form-control form-control-sm" id="dosis_medicamentocron_cinsufren" name="dosis_medicamentocron_cinsufren" onchange="getCantCompCronica('dosis_medicamentocron_cinsufren', 'med_cronicomes_cinsufren');">
                                                            <option>Seleccione</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6 ">
                                                        <label class="floating-label-activo-sm">Cantidad mensual</label>
                                                        <select class="form-control form-control-sm" id="med_cronicomes_cinsufren" name="med_cronicomes_cinsufren" >
                                                            <option value="0">Seleccione</option>
                                                            <option value="999">Otra Cantidad</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-12 col-md-6  col-lg-6 col-xl-6 p-0">
                                                        <button class="btn btn-success-light-c btn-block btn-sm" type="button" onclick="agregar_medicamento_cronico_patologia('cinsufren')" id="btn_registro_med_cinsufren"><i class="fa fa-plus"></i> Registrar</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="cinsufren-med">
                                            </div>
                                            <div>
                                                @if (!empty(session('lic_token')) && session('lic_token') == 1)
                                                    <button type="button" class="btn btn-success-light-c btn_agregar_medicamento  btn-block btn-sm" onclick="agregar_a_receta('cinsufren')">Agregar Medicamento a Receta</button>
                                                @else
                                                    <button type="button" class="btn btn-success-light-c btn_agregar_medicamento  btn-block btn-sm" onclick="agregar_a_receta('cinsufren')" disabled="disabled">Agregar Medicamento a Receta</button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- MARCADORES TUMORALES -->
                <div id="cmtumorales_div" style="display:none;">
                    {{--
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <h5 class="f-20 text-center text-c-blue">Marcadores Tumorales</h5>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                                    <ul class="nav nav-tabs-aten nav-fill" id="orl_adulto" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link-aten text-reset active" id="hiper-ctrl-tab" data-toggle="tab" href="#renal-ctrl" role="tab" aria-controls="renal-ctrl" aria-selected="true">Control</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link-aten text-reset" id="renal-hist-tab" data-toggle="tab" href="#renal-hist" role="tab" aria-controls="renal-hist" aria-selected="true">Historial de controles</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link-aten text-reset" id="renal-med-tab" data-toggle="tab" href="#renal-med" role="tab" aria-controls="renal-med" aria-selected="true">Medicamentos</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="tab-content" id="tab_cmtumorales">
                                        <!--CONTROL-->
                                        <div class="tab-pane fade show active" id="cmtumorales-ctrl" role="tabpanel" aria-labelledby="cmtumorales-ctrl-tab">
                                             <form>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <h5 class="t-aten">Control</h5>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-sm-2 col-md-2">
                                                        <label class="floating-label-activo-sm">Dato</label>
                                                        <input type="text" class="form-control form-control-sm" name="registro_cmtumorales" id="registro_cmtumorales">
                                                    </div>
                                                    <div class="form-group col-sm-4 col-md-4">
                                                        <button type="button" onclick=""
                                                        class="btn btn-info-light-c btn-sm btn-block"><i class="feather icon-save"></i> Guardar control</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!--HISTORIAL DE CONTROLES-->
                                        <div class="tab-pane fade show" id="renal-hist" role="tabpanel" aria-labelledby="renal-hist-tab">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <h5 class="t-aten">Historial de controles</h5>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                     <table id="control_cmtumorales"
                                                        class="display table table-striped dt-responsive nowrap pb-4 table-xs"
                                                        style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Nº Control</th>
                                                                <th>Fecha</th>
                                                                <!-- <th class="text-center align-middle">Acción</th>-->
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            @if (isset($contro))
                                                                @foreach ($contro as $cp)
                                                                    <tr>
                                                                        <td>{{ $cp->id }}</td>
                                                                        <!--<td class="text-center align-middle">
                                                                            <button href="#!" class="btn btn-danger btn-sm">
                                                                                <i class="feather icon-x"></i> Eliminar</button>
                                                                        </td>-->
                                                                    </tr>

                                                                @endforeach
                                                            @else
                                                                <span>No existen registros</span>

                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!--MEDICAMENTOS-->
                                        <div class="tab-pane fade show" id="cmtumorales-med" role="tabpanel" aria-labelledby="cmtumorales-med-tab">
                                            <div id="cmtumorales_med_formulario">
                                                <div class="form-row ">
                                                    <div class="form-group col-sm-12 col-md-12 col-lg-9 col-xl-9 ">
                                                        <label class="floating-label-activo-sm">Nombre medicamento</label>
                                                        <input type="text" class="form-control form-control-sm" name="nombre_medicamentocron_cmtumorales" id="nombre_medicamentocron_cmtumorales">
                                                        <input type="hidden" name="id_medicamentocron_cmtumorales" id="id_medicamentocron_cmtumorales" value=""/>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-3 ">
                                                        <label class="floating-label-activo-sm">Presentación</label>
                                                        <select class="form-control form-control-sm" id="dosis_medicamentocron_cmtumorales" name="dosis_medicamentocron_cmtumorales" onchange="getCantCompCronica('dosis_medicamentocron_cmtumorales', 'med_cronicomes_cmtumorales');">
                                                            <option>Seleccione</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6 ">
                                                        <label class="floating-label-activo-sm">Cantidad mensual</label>
                                                        <select class="form-control form-control-sm" id="med_cronicomes_cmtumorales" name="med_cronicomes_cmtumorales" >
                                                            <option value="0">Seleccione</option>
                                                            <option value="999">Otra Cantidad</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-12 col-md-6  col-lg-6 col-xl-6 p-0">
                                                        <button class="btn btn-success-light-c btn-block btn-sm" type="button" onclick="agregar_medicamento_cronico_patologia('cmtumorales')" id="btn_registro_med_cmtumorales"><i class="fa fa-plus"></i> Registrar</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="cmtumorales-med">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    --}}
                    <h3 class="azul">En construcción</h3>
                    <img src="{{ asset('images/pages/discount.svg') }}" alt="" class="img-fluid mb-4 wid-100">
                </div>

                <div id="creumato_div" style="display:none;">
                    <h4 class="azul">En construcción</h4>
                    <img src="{{ asset('images/pages/discount.svg') }}" alt="" class="img-fluid mb-4 wid-90">
                </div>

                <div id="clitemia_div" style="display:none;">
                    <h4 class="azul">En construcción</h4>
                    <img src="{{ asset('images/pages/discount.svg') }}" alt="" class="img-fluid mb-4 wid-90">
                </div>

            </div>
            <!--Cierre modal body
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>-->
        </div>
    </div>r
</div>

<!-- MODAL AÑADIR ANTECEDENTE-->
<div id="m_agregar_antecedente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="form_enfermedad_cronica" aria-hidden="true">
    <div class="modal-dialog modal-lg  modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
				<div class="row">
					<div class="col-md-7">
						<h5 class="modal-title text-white">Seleccione antecedente</h5>
					</div>
					<div class="col-md-5">
						<select class="form-control form-control-sm" onchange="cambiar_antecedente();" id="nuevo_antecedente" name="nuevo_antecedente" onchange="mostrar(this.value);">
                            <option value="n_C">Seleccione</option>
                            @if($tipo_antecedente)
                                @foreach ( $tipo_antecedente as $tipo)
                                    <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                                @endforeach
                            @endif
                        </select>
					</div>
				</div>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" onclick="$('#m_agregar_antecedente').modal('hide')">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="text-c-blue f-20 my-2 text-center" id="titulo_antecedente">Añadir</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card-informacion pt-3">
                            <div class="col-md-12" id="modal-body-input">
                            </div>
                            <div class="col-md-12">
                                <input type="hidden" value="" id="id-antecedente-m">
                                <input type="hidden" value="" id="tipo-antecedente-m">
                                <input type="hidden" value="{{ $profesional->rut }}" id="user-rut">
                                <input type="hidden" value="{{ $profesional->Especialidad()->first()->nombre }}" id="user-profesion">
                                <input type="hidden" value="{{ $profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos }}" id="user-profesional">
                                <input type="hidden" value="{{Auth::user()->id}}" id="user-id">
                                <button type="button" class="btn btn-sm btn-info text-center" id="agregar-antecedente" onclick="agregarAntecedente()"><i class="feather icon-save"></i> Agregar antecedentes</button>
                                <button type="button" class="btn btn-sm btn-info" id="modificar-antecedente" onclick="modificarAntecedente()"><i class="feather icon-edit"></i> Modificar antecedentes</button>
                                <button type="button" class="btn btn-sm btn-danger" id="modificar-antecedente-cancelar" onclick="cancelarModificar()"><i class="feather icon-x"></i> Cancelar Modificar</button>
                                {{-- <button type="button" class="btn btn-sm btn-danger-light-c" data-dismiss="modal" aria-label="Close"><i class="feather icon-x"></i> Cerrar</button> --}}
                                {{-- <button type="button" class="btn btn-sm btn-danger-light-c" onclick="verModalAgregar('hide')"><i class="feather icon-x"></i> Cerrar</button> --}}
                            </div>
                            <div class="col-md-12 mt-3">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-xs" id="tabla_antecedentes">
                                        <thead>
                                            <tr>
                                                <th>Procedimiento</th>
                                                <th>Incidentes</th>
                                                <th>Profesional</th>
                                                <th>Fecha</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="modal-confirmar" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Desactivar Antecedente</h5>
                <button type="button" class="close" onclick="verModalDesactivar('hide')" aria-label="Close"><span aria-hidden="true">×</span></button>

            </div>
            <div class="modal-body">
                <p class="mb-0">Desea desactivar el antecedente ingresado.</p>
            </div>
            <div class="modal-footer">
                <input type="hidden" value="" id="id-antecedente-m-desactivar">
                <input type="hidden" value="" id="tipo-antecedente-m-desactivar">
                <button type="button" class="btn  btn-danger mr-0" onclick="eliminarAntecedente()">Desactivar</button>
                <button type="button" class="btn  btn-primary" onclick="verModalDesactivar('hide')">Cerrar</button>
            </div>
        </div>
    </div>
</div>


<script>


    $(document).ready(function ()
    {
        /** MEDICAMENTOS DE CRONICOS */
        $('#nombre_medicamento_cpeso').autocomplete({
            source: function(request, response) {
                // Fetch data
                $.ajax({
                    url: "{{ route('dental.getArticulo') }}",
                    type: 'post',
                    dataType: "json",
                    data: {
                        _token: CSRF_TOKEN,
                        search: request.term
                    },
                    success: function(data) {
                        console.log(data.length);
                        response(data);
                    }
                });
            },
            select: function(event, ui) {
                $('#nombre_medicamento_cpeso').val(ui.item.label);
                $('#id_medicamento_cpeso').val(ui.item.value);
                $('#nombre_composicion_farmaco_cpeso').html(ui.item.droga); // save selected id to input
                $('#id_medicamento_tipo_control_cpeso').val(ui.item.control); // save selected id to input
                getDosis_cronico('cpeso');
                return false;
            }
        });

        $('#nombre_medicamento_chipertension').autocomplete({
            source: function(request, response) {
                // Fetch data
                $.ajax({
                    url: "{{ route('dental.getArticulo') }}",
                    type: 'post',
                    dataType: "json",
                    data: {
                        _token: CSRF_TOKEN,
                        search: request.term
                    },
                    success: function(data) {
                        console.log(data.length);
                        response(data);
                    }
                });
            },
            select: function(event, ui) {
                $('#nombre_medicamento_chipertension').val(ui.item.label);
                $('#id_medicamento_chipertension').val(ui.item.value);
                $('#nombre_composicion_farmaco_chipertension').html(ui.item.droga); // save selected id to input
                $('#id_medicamento_tipo_control_chipertension').val(ui.item.control); // save selected id to input
                getDosis_cronico('chipertension');
                return false;
            }
        });

        $('#nombre_medicamento_cdiabet').autocomplete({
            source: function(request, response) {
                // Fetch data
                $.ajax({
                    url: "{{ route('dental.getArticulo') }}",
                    type: 'post',
                    dataType: "json",
                    data: {
                        _token: CSRF_TOKEN,
                        search: request.term
                    },
                    success: function(data) {
                        console.log(data.length);
                        response(data);
                    }
                });
            },
            select: function(event, ui) {
                $('#nombre_medicamento_cdiabet').val(ui.item.label);
                $('#id_medicamento_cdiabet').val(ui.item.value);
                $('#nombre_composicion_farmaco_cdiabet').html(ui.item.droga); // save selected id to input
                $('#id_medicamento_tipo_control_cdiabet').val(ui.item.control); // save selected id to input
                getDosis_cronico('cdiabet');
                return false;
            }
        });

        $('#nombre_medicamento_cinsufren').autocomplete({
            source: function(request, response) {
                // Fetch data
                $.ajax({
                    url: "{{ route('dental.getArticulo') }}",
                    type: 'post',
                    dataType: "json",
                    data: {
                        _token: CSRF_TOKEN,
                        search: request.term
                    },
                    success: function(data) {
                        console.log(data.length);
                        response(data);
                    }
                });
            },
            select: function(event, ui) {
                $('#nombre_medicamento_cinsufren').val(ui.item.label);
                $('#id_medicamento_cinsufren').val(ui.item.value);
                $('#nombre_composicion_farmaco_cinsufren').html(ui.item.droga); // save selected id to input
                $('#id_medicamento_tipo_control_cinsufren').val(ui.item.control); // save selected id to input
                getDosis_cronico('cinsufren');
                return false;
            }
        });

        $('#nombre_medicamento_cmtumorales').autocomplete({
            source: function(request, response) {
                // Fetch data
                $.ajax({
                    url: "{{ route('dental.getArticulo') }}",
                    type: 'post',
                    dataType: "json",
                    data: {
                        _token: CSRF_TOKEN,
                        search: request.term
                    },
                    success: function(data) {
                        console.log(data.length);
                        response(data);
                    }
                });
            },
            select: function(event, ui) {
                $('#nombre_medicamento_cmtumorales').val(ui.item.label);
                $('#id_medicamento_cmtumorales').val(ui.item.value);
                $('#nombre_composicion_farmaco_cmtumorales').html(ui.item.droga); // save selected id to input
                $('#id_medicamento_tipo_control_cmtumorales').val(ui.item.control); // save selected id to input
                getDosis_cronico('cmtumorales');
                return false;
            }
        });

        $('#nombre_medicamento_creumato').autocomplete({
            source: function(request, response) {
                // Fetch data
                $.ajax({
                    url: "{{ route('dental.getArticulo') }}",
                    type: 'post',
                    dataType: "json",
                    data: {
                        _token: CSRF_TOKEN,
                        search: request.term
                    },
                    success: function(data) {
                        console.log(data.length);
                        response(data);
                    }
                });
            },
            select: function(event, ui) {
                $('#nombre_medicamento_creumato').val(ui.item.label);
                $('#id_medicamento_creumato').val(ui.item.value);
                $('#nombre_composicion_farmaco_creumato').html(ui.item.droga); // save selected id to input
                $('#id_medicamento_tipo_control_creumato').val(ui.item.control); // save selected id to input
                getDosis_cronico('creumato');
                return false;
            }
        });

        $('#nombre_medicamento_clitemia').autocomplete({
            source: function(request, response) {
                // Fetch data
                $.ajax({
                    url: "{{ route('dental.getArticulo') }}",
                    type: 'post',
                    dataType: "json",
                    data: {
                        _token: CSRF_TOKEN,
                        search: request.term
                    },
                    success: function(data) {
                        console.log(data.length);
                        response(data);
                    }
                });
            },
            select: function(event, ui) {
                $('#nombre_medicamento_clitemia').val(ui.item.label);
                $('#id_medicamento_clitemia').val(ui.item.value);
                $('#nombre_composicion_farmaco_clitemia').html(ui.item.droga); // save selected id to input
                $('#id_medicamento_tipo_control_clitemia').val(ui.item.control); // save selected id to input
                getDosis_cronico('clitemia');
                return false;
            }
        });

        /** accion check confidencial */
        $('#confidencial').change(function() {
            if ($('#confidencial').is(':checked')) {
                $('#confidencial_descripcion').show();
            } else {
                $('#confidencial_descripcion').hide();
            }
        });

        /** accion check ges */
        $('#modal_ges').change(function() {
            if ($('#modal_ges').is(':checked')) {
                $('#form_ges').modal('show');
            } else {
                $('#form_ges').modal('hide');
            }
        });

        /** busqueda de diagnostico GES */
        $("#nombre_ges").autocomplete({
            source: function(request, response) {
                // Fetch data
                $.ajax({
                    url: "{{ route('ges.ver') }}",
                    type: 'post',
                    dataType: "json",
                    data: {
                        _token: CSRF_TOKEN,
                        search: request.term
                    },
                    success: function(data) {
                        response(data);
                    }
                });
            },
            select: function(event, ui) {
                // Set selection
                $('#nombre_ges').val(ui.item.label); // display the selected text
                $('#id_ges').val(ui.item.value); // save selected id to input
                return false;
            }
        });
    });

    /** CRONICO */
    function es_cronico()
    {
        if ($('#enf_cronico').prop('checked')) {
            $('#form_enfermedad_cronica').modal('show');
            $('#hipertension_div').hide();
            $('#control_peso_div').hide();
            $('#diabetes_div').hide();

            $('#cronicos').val('cpeso');
            ver_medicamento_cronico();
            // $('.medicamento_cronico_div').show();
            // $('#senal_med_cronico').removeClass('fa-angle-down');
            // $('#senal_med_cronico').addClass('fa-angle-up');

            cambiar_enfermedad_cronica();

        }

    }

    function cambiar_enfermedad_cronica()
    {

        if($('#cronicos').val() != 'n_C')
        {
            // var nombre_enfermedad = $("#cronicos option:selected").text();
            // $('#titulo_med_patologia').html( ('Medicamentos '+nombre_enfermedad).toUpperCase());
            // $('.medicamento_patologia').show();
            // $('#btn_registro_med_patologia').attr('onclick','agregar_medicamento_cronico_patologia(\''+$('#cronicos').val()+'\')');
            // ver_medicamento_cronico_patologia();

            // $('.medicamento_cronico_div').hide();
            // $('#senal_med_cronico').addClass('fa-angle-down');
            // $('#senal_med_cronico').removeClass('fa-angle-up');

            ver_medicamento_cronico();

            switch ($('#cronicos').val()) {
                case 'cpeso':
                    $('#hipertension_div').hide();
                    $('#control_peso_div').show();
                    $('#diabetes_div').hide();
                    $('#cinsufren_div').hide();
                    $('#cmtumorales_div').hide();
                    $('#creumato_div').hide();
                    $('#clitemia_div').hide();
                break;
                case 'chipertension':
                    $('#hipertension_div').show();
                    $('#control_peso_div').hide();
                    $('#diabetes_div').hide();
                    $('#cinsufren_div').hide();
                    $('#cmtumorales_div').hide();
                    $('#creumato_div').hide();
                    $('#clitemia_div').hide();
                    ver_control_hipertension();

                break;
                case 'cdiabet':
                    $('#hipertension_div').hide();
                    $('#control_peso_div').hide();
                    $('#diabetes_div').show();
                    $('#cinsufren_div').hide();
                    $('#cmtumorales_div').hide();
                    $('#creumato_div').hide();
                    $('#clitemia_div').hide();
                    ver_control_diabetes();
                break;

                case 'cinsufren':
                    $('#hipertension_div').hide();
                    $('#control_peso_div').hide();
                    $('#diabetes_div').hide();
                    $('#cinsufren_div').show();
                    $('#cmtumorales_div').hide();
                    $('#creumato_div').hide();
                    $('#clitemia_div').hide();
                break;
                case 'cmtumorales':
                    $('#hipertension_div').hide();
                    $('#control_peso_div').hide();
                    $('#diabetes_div').hide();
                    $('#cinsufren_div').hide();
                    $('#cmtumorales_div').show();
                    $('#creumato_div').hide();
                    $('#clitemia_div').hide();
                break;
                case 'creumato':
                    $('#hipertension_div').hide();
                    $('#control_peso_div').hide();
                    $('#diabetes_div').hide();
                    $('#cinsufren_div').hide();
                    $('#cmtumorales_div').hide();
                    $('#creumato_div').show();
                    $('#clitemia_div').hide();
                break;
                case 'clitemia':
                    $('#hipertension_div').hide();
                    $('#control_peso_div').hide();
                    $('#diabetes_div').hide();
                    $('#cinsufren_div').hide();
                    $('#cmtumorales_div').hide();
                    $('#creumato_div').hide();
                    $('#clitemia_div').show();
                break;

                default:
                    break;
            }

        }
        else
        {
            $('#cronicos').val('cpeso');
            cambiar_enfermedad_cronica();

            // $('.medicamento_patologia').hide();

            $('#hipertension_div').hide();
            $('#control_peso_div').show();
            $('#diabetes_div').hide();
            $('#cinsufren_div').hide();
            $('#cmtumorales_div').hide();
            $('#creumato_div').hide();
            $('#clitemia_div').hide();

            // $('#titulo_med_patologia').html( 'Medicamentos' );
        }
    }

    function registrar_control_obesidad()
    {

        let peso = $('#registro_peso').val();
        let variacion = $('#registro_peso_variacion').val();
        let ideal = $('#registro_peso_ideal').val();
        let url = "{{ route('ficha_medica.registrar_control_obesidad') }}";
        let hora_medica = $('#hora_medica').val();
        var validar = 0;
        var mensaje ='';

        if( peso == '' )
        {
            $('#registro_peso').focus();
            mensaje += 'Debe ingresar el peso del control actual.\n';
            validar = 1;
        }
        if( variacion == '' )
        {
            $('#registro_peso_variacion').focus();
            mensaje += 'Debe ingresar la Variación.\n';
            validar = 1;
        }
        if( ideal == '' )
        {
            $('#registro_peso_ideal').focus();
            mensaje += 'Debe ingresar el Peso Ideal.\n';
            validar = 1;
        }

        if(validar == 1)
        {
            swal({
                title: "Debe ingresar todos los datos requeridos." ,
                text: mensaje,
                icon: "error",
                // buttons: "Aceptar",
                //SuccessMode: true,
            })
            return false;
        }
        else
        {
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    peso: peso,
                    variacion: variacion,
                    ideal: ideal,
                    hora_medica: hora_medica
                },
            })
            .done(function(response) {

                if (response != '') {
                    console.log(response);
                    //$('#form_control_obesidad').trigger("reset");
                    $('#mensaje').text('Se ha agregago control de obesidad correctamente');
                    $('#mensaje').show();
                    {{--  $('#form_enfermedad_cronica').modal('hide');  --}}
                    {{--  location.reload();  --}}
                    $('#registro_peso').val('');
                    $('#registro_peso_variacion').val('');
                    $('#registro_peso_ideal').val('');
                    ver_control_obesidad();
                }
            })
            .fail(function(e) {
                console.log("error");
                console.log(e);
            })
        }
    };

    function registrar_hipertension()
    {

        let sistolica = $('#presion_sistolica_hipertension').val();
        let diastolica = $('#presion_diastolica_hipertension').val();
        let ideal = $('#ideal_hipertension').val();
        let url = "{{ route('ficha_medica.registrar_hipertension') }}";
        let hora_medica = $('#hora_medica').val();
        let id_lugar_atencion = $('#id_lugar_atencion').val();

        var validar = 0;
        var mensaje ='';

        if( sistolica == '' )
        {
            $('#presion_sistolica_hipertension').focus();
            mensaje += 'Debe ingresar el Presión Sistólica.\n';
            validar = 1;
        }
        if( diastolica == '' )
        {
            $('#presion_diastolica_hipertension').focus();
            mensaje += 'Debe ingresar el Presión Diastólica.\n';
            validar = 1;
        }
        if( ideal == '' )
        {
            $('#ideal_hipertension').focus();
            mensaje += 'Debe ingresar el Presión Ideal.\n';
            validar = 1;
        }

        if(validar == 1)
        {
            swal({
                title: "Debe ingresar todos los datos requeridos." ,
                text: mensaje,
                icon: "error",
                // buttons: "Aceptar",
                //SuccessMode: true,
            })
            return false;
        }
        else
        {
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    sistolica: sistolica,
                    diastolica: diastolica,
                    ideal: ideal,
                    hora_medica: hora_medica,
                    id_lugar_atencion: id_lugar_atencion
                },
            })
            .done(function(response) {

                if (response != '') {
                    console.log(response);
                    //$('#form_control_obesidad').trigger("reset");
                    $('#mensaje').text('Se ha agregado control de Presión Arterial correctamente');
                    $('#mensaje').show();
                    {{--  $('#form_enfermedad_cronica').modal('hide');  --}}
                    $('#presion_sistolica_hipertension').val('');
                    $('#presion_diastolica_hipertension').val('');
                    $('#ideal_hipertension').val('');
                    ver_control_hipertension();

                }
            })
            .fail(function(e) {
                console.log("error");
                console.log(e);
            })
        }
    };

    function registrar_diabetes()
    {

        let peso = $('#peso_diabetes').val();
        let pies = $('#pies_diabetes').val();
        let hgac1 = $('#hga1c_diabetes').val();
        // let colesterol = $('#colesterol_diabetes').val();
        let glucosuria = $('#glucosuria_diabetes').val();
        let creatina = $('#creatina_diabetes').val();
        let glicosilada_postprandial = $('#glicosilada_postprandial_diabetes').val();
        let glicosinada_ayuno = $('#glicosilada_ayuno_diabetes').val();
        let url = "{{ route('ficha_medica.registrar_diabetes') }}";
        let hora_medica = $('#hora_medica').val();

        $.ajax({
                url: url,
                type: 'GET',
                data: {
                    peso: peso,
                    pies: pies,
                    hgac1: hgac1,
                    creatina: creatina,
                    glucosuria: glucosuria,
                    glicosilada_postprandial: glicosilada_postprandial,
                    glicosinada_ayuno: glicosinada_ayuno,
                    hora_medica: hora_medica
                },
            })
            .done(function(response) {

                if (response != '') {
                    console.log(response);
                    //$('#form_control_obesidad').trigger("reset");
                    $('#mensaje').text('Se ha agregago control de diabetes correctamente');
                    $('#mensaje').show();
                    $('#form_enfermedad_cronica').modal('hide');
                    // location.reload();
                    ver_control_diabetes();
                }
            })
            .fail(function(e) {
                console.log("error");
                console.log(e);
            })
    };

    function ver_medicamento_cronico()
    {
        $('#'+tipo_enfermedad+'-med').html('');

        let url = "{{ route('medicamento_cronico.getRegsitros') }}";

        var _token = CSRF_TOKEN;
        var id_ficha_atencion = $('#id_fc').val();
        var id_paciente = $('#id_paciente_fc').val();
        var tipo_enfermedad = 'cronico';
        if($('#cronicos').val() != 'n_C')
            tipo_enfermedad = $('#cronicos').val();

        $.ajax({

            url: url,
            type: "GET",
            data: {
                _token: _token,
                // id_ficha_atencion:id_ficha_atencion,
                id_paciente : id_paciente,
                tipo_enfermedad : tipo_enfermedad,
            },
        })
        .done(function(data)
        {

            if (data !== 'null')
            {
                //data = JSON.parse(data);
                console.log('-----------------------');
                console.log(data);
                console.log('-----------------------');
                var html = '';
                html += '<div class="table-responsive">';
                html += '<table class="display table table-striped dt-responsive nowrap pb-4 table-sm" style="width:100%">';
                html += '<thead>';
                html += '    <tr>';
                html += '        <th class="align-middle">Nombre Medicamento</th>';
                html += '        <th class="align-middle">Presentación</th>';
                html += '        <th class="align-middle">Posología</th>';
                html += '        <th class="align-middle">Cantidad Mensual</th>';
                html += '        <th class="align-middle">Acción</th>';
                html += '        <th class="align-middle">Check</th>';
                html += '    </tr>';
                html += '</thead>';
                html += '<tbody>';
                if(data.estado == 1)
                {
                    $.each(data.registros, function(index, value)
                    {
                        html += '<tr>';
                        html += '    <td class=" align-middle">'+value.nombre_medicamento+'</td>';
                        html += '    <td class=" align-middle">'+value.presentacion+'</td>';
                        html += '    <td class=" align-middle">'+value.posologia+'</td>';
                        html += '    <td class=" align-middle">'+value.cantidad+'</td>';
                        html += '    <td class=" align-middle">';
                        html += '        <button type="button" class="btn btn-danger btn-icon" onclick="eliminar_med_cronico_patologia(\''+value.id+'\');"><i class="feather icon-x"></i></button>';
                        html += '    </td>';
                        html += '    <td class="text-center align-middle">';

                        if( lic_token != '' && lic_estado == 1 && $('#descripcion_hipotesis').val() != '')
                        {
                            html += '        <input type="checkbox" data-id="'+value.id+'" class="btn_agregar_medicamento" name="medicamento_cronico_'+tipo_enfermedad+'[]" id="medicamento_cronico_'+tipo_enfermedad+'_'+value.id+'">';
                        }
                        else
                        {
                            html += '        <input type="checkbox" data-id="'+value.id+'" class="btn_agregar_medicamento" name="medicamento_cronico_'+tipo_enfermedad+'[]" id="medicamento_cronico_'+tipo_enfermedad+'_'+value.id+'" disabled>';
                        }
                        html += '    </td>';
                        html += '</tr>';
                    });
                }
                else
                {

                    html += '<tr>';
                    html += '    <td class="text-center align-middle" colspan="3">SIN REGISTROS</td>';
                    html += '</tr>';

                }
                html += '</tbody>';
                html += '</table>';
                html += '</div>';
                $('#'+tipo_enfermedad+'-med').html(html);
                $('#descripcion_hipotesis').trigger('keyup');
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

    }

    function eliminar_med_cronico(id)
    {
        let url = "{{ route('medicamento_cronico.deleteRegsitro') }}";


        var _token = CSRF_TOKEN;
        var id =id;

        $.ajax({

            url: url,
            type: "POST",
            data: {
                _token: _token,
                id:id
            },
        })
        .done(function(data)
        {

            if (data !== 'null')
            {
                //data = JSON.parse(data);
                console.log('-----------------------');
                console.log(data);
                console.log('-----------------------');
                if(data.estado == 1)
                {
                    swal({
                        title: "Medicamento Cronico.",
                        text: "Medicamento Eliminado.",
                        icon: "success",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                    ver_medicamento_cronico();
                }
                else{

                    swal({
                        title: "Problema al eliminar Registro de Medicamento Crónico.",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    })
                }
            }
            else{

                swal({
                    title: "Problema al eliminar Registro de Medicamento Crónico.",
                    icon: "warning",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                })
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    {{--  MEDICAMENTOS CRONICOS PATOLOGIA  --}}
    function agregar_medicamento_cronico_patologia(tipo)
    {

        let url = "{{ route('medicamento_cronico.registrar') }}";


        var _token = CSRF_TOKEN;
        var id_profesional = $('#id_profesional_fc').val();
        var id_ficha_atencion = $('#id_fc').val();
        var id_paciente = $('#id_paciente_fc').val();
        var id_lugar_atencion = $('#id_lugar_atencion').val();

        var nombre_medicamento = $('#nombre_medicamento_'+tipo).val();
        var id_medicamento = $('#id_medicamento_'+tipo).val();
        var id_medicamento_tipo_control = $('#id_medicamento_tipo_control_'+tipo).val();
        var nombre_composicion_farmaco = $('#nombre_composicion_farmaco_'+tipo).val();
        var id_dosis_medicamento = $('#dosis_medicamento_'+tipo).val();
        var dosis_medicamento = $('#dosis_medicamento_'+tipo).val();
        var id_frecuencia_medicamento = $('#frecuencia_medicamento_'+tipo).val();
        var frecuencia_medicamento = $('#frecuencia_medicamento_'+tipo).val();
        var dosis_medicamento_2 = $('#dosis_medicamento_'+tipo+'_2').val();
        var frecuencia_medicamento_2 = $('#frecuencia_medicamento_'+tipo+'_2').val();
        var id_via_administracion = $('#via_administracion_'+tipo).val();
        var via_administracion = $('#via_administracion_'+tipo).val();
        var observaciones_medicamento = $('#observaciones_medicamento_'+tipo).val();
        var id_periodo = $('#periodo_'+tipo).val();
        var periodo = $('#periodo_'+tipo).val();
        var observaciones_periodo = $('#observaciones_periodo_'+tipo).val();
        var id_cantidad_comprar = $('#cantidad_comprar_'+tipo).val();
        var cantidad_comprar = $('#cantidad_comprar_'+tipo).val();
        var otra_cantidad_a_comprar = $('#otra_cantidad_a_comprar_'+tipo).val();

        // var nombre_medicamento = $('#nombre_medicamentocron_'+tipo+'').val();
        // var cantidad = $('#med_cronicomes_'+tipo+' option:selected').text();
        var tipo_enfermedad = tipo;

        var valido = 0;
        var mensaje = '';

        if($.trim(nombre_medicamento) == '')
        {
            valido = 1;
            mensaje += 'Debe completar el campo Medicamento.\n';
        }

        if($('#id_medicamento_'+tipo).val() != '')
        {
            if($.trim(dosis_medicamento) == '' || dosis_medicamento == 0 || dosis_medicamento == 'Seleccione una opción' || dosis_medicamento == 'Seleccione' || dosis_medicamento == 'Seleccione')
            {
                valido = 1;
                mensaje += 'Debe completar el campo Presentación.\n';
            }
            else
            {
                dosis_medicamento = $('#dosis_medicamento_'+tipo+' option:selected ').text();
            }

            if($.trim(frecuencia_medicamento) == '' || frecuencia_medicamento == 0 || frecuencia_medicamento == 'Seleccione una opción' || frecuencia_medicamento == 'Seleccione' || frecuencia_medicamento == 'Seleccione')
            {
                valido = 1;
                mensaje += 'Debe completar el campo Posología.\n';
            }
            else
            {
                frecuencia_medicamento = $('#frecuencia_medicamento_'+tipo+' option:selected ').text();
            }
        }
        else
        {
            if( dosis_medicamento_2 == '')
            {
                valido = 1;mensaje += 'Debe completar el campo Dosis\n';
            }
            else
            {
                dosis_medicamento = dosis_medicamento_2;
            }


            if( frecuencia_medicamento_2 == '')
            {
                valido = 1;mensaje += 'Debe completar el campo Frecuencia\n';
            }
            else
            {
                frecuencia_medicamento = frecuencia_medicamento_2;
            }

        }


        if($.trim(via_administracion) == '' || via_administracion == 0 || $.trim(via_administracion) == 'Seleccione')
        {
            valido = 1;
            mensaje += 'Debe completar el campo Via de Administración.\n';
        }
        else if($('#via_administracion_'+tipo).val() == 11)
        {
            if( $.trim(observaciones_medicamento) == '')
            {
                valido = 1;
                mensaje += 'Debe ingresar Otra Vía Administración\n';
            }
            else
            {
                via_administracion = observaciones_medicamento;
            }
        }
        else
        {
            via_administracion = $('#via_administracion_'+tipo+' option:selected ').text();
        }

        if($.trim(periodo) == '' || periodo == 0 || $.trim(periodo) == 'Seleccione')
        {
            valido = 1;
            mensaje += 'Debe completar el campo Periodo.\n';
        }
        else if($('#periodo_'+tipo).val() == 11)
        {
            if( $.trim(observaciones_periodo) == '')
            {
                valido = 1;
                mensaje += 'Debe ingresar Otro Periodo\n';
            }
            else
            {
                periodo = observaciones_periodo;
            }
        }
        else
        {
            periodo = $('#periodo_'+tipo+' option:selected ').text();
        }

        if($.trim(cantidad_comprar) == '' || cantidad_comprar == 0 || $.trim(cantidad_comprar) == 'Seleccione')
        {
            valido = 1;
            mensaje += 'Debe completar el campo Cantidad a Comprar.\n';
        }
        else if($('#cantidad_comprar'+tipo).val() == '999')
        {
            if( $.trim(otra_cantidad_a_comprar) == '')
            {
                valido = 1;
                mensaje += 'Debe ingresar Cantidad a Comprar\n';
            }
            else
            {
                cantidad_comprar = otra_cantidad_a_comprar;
            }
        }
        else
        {
            cantidad_comprar = $('#cantidad_comprar_'+tipo+' option:selected ').text();
        }

        if(valido == 0)
        {
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    _token: _token,
                    id_profesional:id_profesional,
                    id_ficha_atencion:id_ficha_atencion,
                    id_paciente:id_paciente,
                    id_lugar_atencion:id_lugar_atencion,

                    nombre_medicamento : nombre_medicamento,
                    id_medicamento : id_medicamento,
                    id_medicamento_tipo_control : id_medicamento_tipo_control,
                    nombre_composicion_farmaco : nombre_composicion_farmaco,
                    id_dosis_medicamento : id_dosis_medicamento,
                    dosis_medicamento : dosis_medicamento,
                    id_frecuencia_medicamento : id_frecuencia_medicamento,
                    frecuencia_medicamento : frecuencia_medicamento,
                    id_via_administracion : id_via_administracion,
                    via_administracion : via_administracion,
                    observaciones_medicamento : observaciones_medicamento,
                    id_periodo : id_periodo,
                    periodo : periodo,
                    id_cantidad_comprar : id_cantidad_comprar,
                    cantidad_comprar : cantidad_comprar,

                    tipo_enfermedad:tipo_enfermedad,
                },
            })
            .done(function(data)
            {

                if (data !== 'null')
                {
                    //data = JSON.parse(data);
                    console.log('-----------------------');
                    console.log(data);
                    console.log('-----------------------');
                    if(data.estado == 1)
                    {
                        if(data.registro_receta.estado == 0)
                        {
                            swal({
                                title: "Medicamento Cronico.",
                                text: "Medicamento Registrado con exito.\nMedicamento no agregado a receta por no tener activo Autorización de papeleria.",
                                icon: "success",
                                // buttons: "Aceptar",
                                //SuccessMode: true,
                            });
                        }
                        else
                        {
                            swal({
                                title: "Medicamento Cronico.",
                                text: "Medicamento Registrado con exito.",
                                icon: "success",
                                // buttons: "Aceptar",
                                //SuccessMode: true,
                            });
                        }

                        $('#nombre_medicamentocron_'+tipo+'').val('');
                        $('#id_medicamentocron_'+tipo+'').val('');

                        $('#dosis_medicamentocron_'+tipo+'').html('<option value="0">Seleccione</option>');
                        $('#med_cronicomes_'+tipo+'').html('<option value="0">Seleccione</option>');

                        // ver_medicamento_cronico_patologia()
                        ver_medicamento_cronico();
                    }
                    else{

                        swal({
                            title: "Problema al Registrar Medicamento Cronico.",
                            icon: "warning",
                            // buttons: "Aceptar",
                            //SuccessMode: true,
                        })
                    }
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }
        else
        {
            swal({
                title: "Ingreso de medicamento(s).",
                text:mensaje,
                icon: "error",
                // buttons: "Aceptar",
                //SuccessMode: true,
            });
        }


    }

    function ver_medicamento_cronico_patologia()
    {

        let url = "{{ route('medicamento_cronico.getRegsitros') }}";


        var _token = CSRF_TOKEN;
        var id_ficha_atencion = $('#id_fc').val();
        var id_paciente = $('#id_paciente_fc').val();
        var tipo_enfermedad = $('#cronicos').val();
        $('#tabla_med_patologia').html('');

        $.ajax({

            url: url,
            type: "GET",
            data: {
                _token: _token,
                // id_ficha_atencion:id_ficha_atencion,
                id_paciente:id_paciente,
                tipo_enfermedad:tipo_enfermedad
            },
        })
        .done(function(data)
        {

            if (data !== 'null')
            {
                //data = JSON.parse(data);
                console.log('-----------------------');
                console.log(data);
                console.log('-----------------------');
                var html = '';
                html += '<thead>';
                html += '    <tr>';
                html += '        <th class="align-middle">Nombre Medicamento</th>';
                html += '        <th class="align-middle">Cantidad Mensual</th>';
                html += '        <th class="align-middle">Acción</th>';
                html += '        <th class="align-middle">Check</th>';
                html += '    </tr>';
                html += '</thead>';
                html += '<tbody>';
                if(data.estado == 1)
                {

                    $.each(data.registros, function(index, value)
                    {
                        html += '<tr>';
                        html += '    <td class="align-middle">'+value.nombre_medicamento+'</td>';
                        html += '    <td class="align-middle">'+value.cantidad+'</td>';
                        html += '    <td class="align-middle">';
                        html += '        <button type="button" class="btn btn-danger btn-icon" onclick="eliminar_med_cronico_patologia(\''+value.id+'\');"><i class="feather icon-x"></i></button>';
                        html += '    </td>';
                        html += '    <td class="align-middle">';
                        html += '        <input type="checkbox" name="medicamento_cronico_patologia" id="medicamento_cronico_patologia_'+value.id+'">';
                        html += '    </td>';
                        html += '</tr>';
                    });

                }
                else
                {

                    html += '<tr>';
                    html += '    <td class="text-center align-middle" colspan="4">SIN REGISTROS</td>';
                    html += '</tr>';

                }
                html += '</tbody>';
                $('#tabla_med_patologia').html(html);
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

    }

    function eliminar_med_cronico_patologia(id)
    {
        let url = "{{ route('medicamento_cronico.deleteRegsitro') }}";


        var _token = CSRF_TOKEN;
        var id =id;
        var tipo_enfermedad = $('#cronicos').val();

        $.ajax({

            url: url,
            type: "POST",
            data: {
                _token: _token,
                id:id
            },
        })
        .done(function(data)
        {

            if (data !== 'null')
            {
                //data = JSON.parse(data);
                console.log('-----------------------');
                console.log(data);
                console.log('-----------------------');
                if(data.estado == 1)
                {
                    swal({
                        title: "Medicamento Crónico.",
                        text: "Medicamento eliminado.",
                        icon: "success",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                    ver_medicamento_cronico(tipo_enfermedad);
                }
                else{

                    swal({
                        title: "Problema al eliminar Registro de Medicamento Crónico.",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    })
                }
            }
            else{

                swal({
                    title: "Problema al eliminar Registro de Medicamento Crónico.",
                    icon: "warning",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                })
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    {{--  mostrar div   --}}
    function mostrar_div(div)
    {
        if ($('.'+div).is(':visible')) {
            $('.'+div).hide();
            // $('#senal_med_cronico').addClass('fa-angle-down');
            // $('#senal_med_cronico').removeClass('fa-angle-up');
        } else {
            $('.'+div).show();
            // $('#senal_med_cronico').removeClass('fa-angle-down');
            // $('#senal_med_cronico').addClass('fa-angle-up');
        }
    }

    {{--  CRONICO VER CONTROL DE HIPERTENSION  --}}
    function ver_control_hipertension()
    {

        let url = "{{ route('hipertension.getHipertension') }}";


        var _token = CSRF_TOKEN;
        var id_paciente = $('#id_paciente_fc').val();
        $('#control_hipertension').html('');

        $.ajax({

            url: url,
            type: "GET",
            data: {
                _token: _token,
                id_paciente:id_paciente
            },
        })
        .done(function(data)
        {

            if (data !== 'null')
            {
                //data = JSON.parse(data);
                console.log('----------ver_control_hipertension-------------');
                console.log(data);
                console.log('-----------------------');
                var html = '';
                html += '<thead>';
                html += '    <tr>';
                html += '         <th class="align-middle">Nº Control</th>';
                html += '         <th class="align-middle">Fecha</th>';
                html += '         <th class="align-middle">Presión Sistólica</th>';
                html += '         <th class="align-middle">Presión Diastólica</th>';
                html += '         <th class="align-middle">Presión Ideal</th>';
                html += '    </tr>';
                html += '</thead>';
                html += '<tbody>';
                if(data.estado == 1)
                {

                    $.each(data.registros, function(index, value)
                    {
                        var f_temp = (value.created_at).replace('T',' ').replace('Z','').replace('.000000','');
                        var fecha = new Date(f_temp);
                        fecha = fecha.getDate()+'-'+(fecha.getMonth()+1)+'-'+fecha.getFullYear()+' '+fecha.getHours()+':'+fecha.getMinutes();

                        html += '<tr>';
                        html += '    <td class="align-middle">'+value.id+'</td>';
                        html += '    <td class="align-middle">'+fecha+'</td>';
                        html += '    <td class="align-middle">'+value.sistolica+'</td>';
                        html += '    <td class="align-middle">'+value.diastolica+'</td>';
                        html += '    <td class="align-middle">'+value.ideal+'</td>';
                        html += '</tr>';
                    });

                }
                else
                {

                    html += '<tr>';
                    html += '    <td class="align-middle" colspan="5">SIN REGISTROS</td>';
                    html += '</tr>';

                }
                html += '</tbody>';
                $('#control_hipertension').html(html);
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

    }

    {{--  CRONICO VER CONTROL DE OBESIDAD  --}}
    function ver_control_obesidad()
    {

        let url = "{{ route('control_obesidad.getControlObesidad') }}";


        var _token = CSRF_TOKEN;
        var id_paciente = $('#id_paciente_fc').val();
        $('#control_obesidad').html('');

        $.ajax({

            url: url,
            type: "GET",
            data: {
                _token: _token,
                id_paciente:id_paciente
            },
        })
        .done(function(data)
        {
            var html = '';
            if (data !== 'null')
            {
                //data = JSON.parse(data);
                console.log('----------ver_control_hipertension-------------');
                console.log(data);
                console.log('-----------------------');

                html += '<thead>';
                html += '    <tr>';
                html += '    <th class="align-middle">Nº Control</th>';
                html += '    <th class="align-middle">Fecha</th>';
                html += '    <th class="align-middle">Peso</th>';
                html += '    <th class="align-middle">Variación</th>';
                html += '    <th class="align-middle">Peso Ideal</th>';
                html += '    <!-- <th class="text-center align-middle">Acción</th>-->';
                html += '</tr>';
                html += '</thead>';
                html += '<tbody>';
                if(data.estado == 1)
                {

                    $.each(data.registros, function(index, value)
                    {
                        var f_temp = (value.created_at).replace('T',' ').replace('Z','').replace('.000000','');
                        var fecha = new Date(f_temp);
                        fecha = fecha.getDate()+'-'+(fecha.getMonth()+1)+'-'+fecha.getFullYear();


                        html += '<tr>';
                        html += '    <td class="align-middle">'+value.id+'</td>';
                        html += '    <td class="align-middle">'+fecha+'</td>';
                        html += '    <td class="align-middle">'+value.peso+'</td>';
                        html += '    <td class="align-middle">'+value.variacion+'</td>';
                        html += '    <td class="align-middle">'+value.ideal+'</td>';
                        html += '    <!--<td class="text-center align-middle"><button href="#!" class="btn btn-danger btn-sm"><i class="feather icon-x"></i> Eliminar</button></td>-->';
                        html += '</tr>';
                    });

                }
                else
                {

                    html += '<tr>';
                    html += '    <td class="align-middle" colspan="5">SIN REGISTROS</td>';
                    html += '</tr>';

                }
                html += '</tbody>';
                $('#control_obesidad').html(html);
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

    }

    {{--  CRONICO VER CONTROL DE DIABETES  --}}
    function ver_control_diabetes()
    {
        let url = "{{ route('ficha_medica.diabetes.getDiabete') }}";
        var id_paciente = $('#id_paciente_fc').val();
        $('#control_diabetes tbody').html('');

        $.ajax({

            url: url,
            type: "GET",
            data: {
                id_paciente:id_paciente
            },
        })
        .done(function(data)
        {

            if (data !== 'null')
            {
                //data = JSON.parse(data);
                console.log('----------ver_control_diabetes-------------');
                console.log('general.secciones_ficha.seccion_cronicos_ges_confidencial');
                console.log(data);
                console.log('-----------------------');
                var html = '';
                if(data.estado == 1)
                {

                    $.each(data.registros, function(index, value)
                    {
                        var f_temp = (value.created_at).replace('T',' ').replace('Z','').replace('.000000','');
                        var fecha = new Date(f_temp);
                        fecha = fecha.getDate()+'-'+(fecha.getMonth()+1)+'-'+fecha.getFullYear();

                        // <th>Nº Control</th>
                        // <th>Fecha</th>
                        // <th>Peso</th>
                        // <th>Piés</th>
                        // <th>Hg A1c</th>
                        // <th>Creatina</th>
                        // <th>Glucosuria</th>
                        // <th>Glicosilada ayuno</th>
                        // <th>Glicosilada postprandial</th>
                        html += '<tr>';
                        html += '   <td class="align-middle">'+(index+1)+'</td>';//Nº_Control
                        html += '   <td class="align-middle">'+fecha+'</td>'; //Peso
                        html += '   <td class="align-middle">'+((value.peso!=null)?value.peso:'')+'</td>'; //Peso
                        html += '   <td class="align-middle">'+((value.pies!=null)?value.pies:'')+'</td>'; //Piés
                        html += '   <td class="align-middle">'+((value.hga1c!=null)?value.hga1c:'')+'</td>'; //Hg A1c
                        html += '   <td class="align-middle">'+((value.creatina!=null)?value.creatina:'')+'</td>'; //Creatina
                        html += '   <td class="align-middle">'+((value.glucosuria!=null)?value.glucosuria:'')+'</td>'; //Glucosuria
                        html += '   <td class="align-middle">'+((value.glicosilada_ayuno!=null)?value.glicosilada_ayuno:'')+'</td>'; //Glicosilada ayuno
                        html += '   <td class="align-middle">'+((value.glicosilada_postprandial!=null)?value.glicosilada_postprandial:'')+'</td>'; //Glicosilada postprandial
                        html += '</tr>';
                    });

                }
                else
                {

                    html += '<tr>';
                    html += '    <td class="align-middle" colspan="8">SIN REGISTROS</td>';
                    html += '</tr>';

                }
                $('#control_diabetes tbody').html(html);
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

    }

    function getCantCompCronica(div_dosis, div_comp)
    {
        var cant_comp = $('#'+div_dosis+' option:selected').attr('data-cant_comp');
        console.log(cant_comp);

        let url = "{{ route('presentacion.getCantComp') }}";
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
                    let select_cant_comp = $('#'+div_comp);

                    select_cant_comp.find('option').remove();
                    select_cant_comp.append('<option value="0">Seleccione</option>');
                    $(data).each(function(i, v) { // indice, valor
                        select_cant_comp.append('<option value="' + v.id + '">' + v.cant +'</option>');
                    })
                    select_cant_comp.append('<option value="999">Otra cantidad</option>');

                } else {



                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

    };
    /** FIN CRONICO */

    /** MEDICAMENTOS */
    function getDosis_cronico(tipo)
    {

        let id_medicamento = $('#id_medicamento_'+tipo).val();
        console.log(id_medicamento);

        let url = "{{ route('dental.getDosis') }}";
        $.ajax({
            url: url,
            type: "get",
            data: {
                id_medicamento: id_medicamento,
            },
        })
        .done(function(data)
        {
            console.log(data)

            if (data != null)
            {
                data = JSON.parse(data);
                console.log(data)
                let dosis = $('#dosis_medicamento_'+tipo);

                dosis.find('option').remove();
                dosis.append('<option value="0">Seleccione</option>');
                $(data).each(function(i, v) { // indice, valor
                    dosis.append('<option value="' + v.dosis + '" data-id="'+v.id+'" data-cant_comp="'+v.cant_comp+'">' + v.present +'</option>');
                });
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    };

    function getFrecuencia_cronico(tipo)
    {
        let id_dosis = $('#dosis_medicamento_'+tipo).val();
        let url = "{{ route('dental.getFrecuencia') }}";

        $.ajax({
            url: url,
            type: "get",
            data: {
                id_dosis: id_dosis,
            },
        })
        .done(function(data) {
            console.log(data)

            if (data != null)
            {
                data = JSON.parse(data);
                let dosis = $('#frecuencia_medicamento_'+tipo);

                dosis.find('option').remove();
                dosis.append('<option value="0">Seleccione</option>');
                $(data).each(function(i, v) { // indice, valor
                    dosis.append('<option value="' + v.id + '">' + v.indic + '</option>');
                });
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    };

    function getCantComp_cronico(tipo)
    {

        var cant_comp = $('#dosis_medicamento_'+tipo+' option:selected').attr('data-cant_comp');
        console.log(cant_comp);

        let url = "{{ route('presentacion.getCantComp') }}";
        $.ajax({
            url: url,
            type: "get",
            data: {
                cant_comp: cant_comp,
            },
        })
        .done(function(data) {
            console.log(data)

            if (data != null)
            {
                data = JSON.parse(data);
                let select_cant_comp = $('#cantidad_comprar_'+tipo);

                select_cant_comp.find('option').remove();
                select_cant_comp.append('<option value="0">Seleccione</option>');
                $(data).each(function(i, v) { // indice, valor
                    select_cant_comp.append('<option value="' + v.cantidad + '">' + v.cant +'</option>');
                });
                select_cant_comp.append('<option value="999">Otra Cantidad</option>');
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    };

    function validar_via_administracion_cronico(tipo)
    {
        if($('#via_administracion_'+tipo).val() == 11)
        {
            $('#div_observaciones_medicamento_'+tipo).show();
            $('#observaciones_medicamento_'+tipo).removeAttr('disabled');
        }
        else
        {
            $('#div_observaciones_medicamento_'+tipo).hide();
            $('#observaciones_medicamento_'+tipo).attr('disabled','disabled');
            $('#observaciones_medicamento_'+tipo).val('');
        }
    }

    function validar_periodo_cronico(tipo)
    {
        if($('#periodo_'+tipo).val() == 11)
        {
            $('#div_observaciones_periodo_'+tipo).show();
            $('#observaciones_periodo_'+tipo).removeAttr('disabled');
        }
        else
        {
            $('#div_observaciones_periodo_'+tipo).hide();
            $('#observaciones_periodo_'+tipo).attr('disabled','disabled');
            $('#observaciones_periodo_'+tipo).val('');
        }
    }

    function validar_cantidad_comprar_cronico(tipo)
    {
        if($('#cantidad_comprar_'+tipo).val() == 999)
        {
            $('#div_otra_cantidad_a_comprar_'+tipo).show();
            $('#otra_cantidad_a_comprar_'+tipo).removeAttr('disabled');
        }
        else
        {
            $('#div_otra_cantidad_a_comprar_'+tipo).hide();
            $('#otra_cantidad_a_comprar_'+tipo).attr('disabled','disabled');
            $('#otra_cantidad_a_comprar_'+tipo).val('');
        }
    }

    function agregar_a_receta(tipo)
    {
        var lista_medicamentos_a_receta = [];
        $.each($("input[name='medicamento_cronico_"+tipo+"[]']:checked"), function() {
            lista_medicamentos_a_receta.push($(this).attr('data-id'));
        });

        console.log(lista_medicamentos_a_receta);
        if(lista_medicamentos_a_receta.length > 0)
        {
            var _token = CSRF_TOKEN;
            var id_profesional = $('#id_profesional_fc').val();
            var id_ficha_atencion = $('#id_fc').val();
            var id_paciente = $('#id_paciente_fc').val();
            var id_lugar_atencion = $('#id_lugar_atencion').val();

            let url = "{{ route('medicamento_cronico.pasar_a_receta') }}";

            $.ajax({
                url: url,
                type: "POST",
                data: {
                    _token: _token,
                    id_profesional:id_profesional,
                    id_ficha_atencion:id_ficha_atencion,
                    id_paciente:id_paciente,
                    id_lugar_atencion:id_lugar_atencion,
                    lista_medicamento:lista_medicamentos_a_receta,
                },
            })
            .done(function(resp) {
                console.log(resp)

                if(resp.estado == 1)
                {
                    swal({
                        title: "Registro de Medicamento cronico a Receta Medica" ,
                        text: mensaje,
                        icon: "success",
                    });

                    $.each($("input[name='medicamento_cronico_"+tipo+"[]']"), function() {
                        if(this.checked)
                            $(this).prop( "checked", false );
                    });
                }
                else
                {
                    var mensaje = '';
                    if(data.error)
                    {
                        $.each(data.error, function (indexInArray, valueOfElement)
                        {
                            mensaje += valueOfElement+'\n';
                        });
                    }
                    else
                    {
                        mensaje += 'Intente nuevamente.';
                    }

                    swal({
                        title: "Registro de Medicamento cronico a Receta Medica",
                        text: mensaje,
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    });
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }
        else
        {
            swal({
                title: "Debe seleccionar al menos un medicamento para ingresar a Receta Médica.",
                icon: "warning",
            });
        }
    }

    /** ANTECEDENTES */
    const msg = (title,text,icon) => {
        swal({
                title: title,
                text: text,
                icon: icon,
                // buttons: "Aceptar",
                //SuccessMode: true,
            })
    };

    /**AGREGAR ANTECEDENTE DEL PACIENTE**/
    function ag_antecendente ()
    {
        if($('#check_antecedentes').prop('checked'))
        {
            $('#nuevo_antecedente').val(1);
            $('#m_agregar_antecedente').modal('show');
            cambiar_antecedente();
        }
    }

    function cambiar_antecedente()
    {

        if($('#nuevo_antecedente').val() != 'n_C')
        {
            var nombre_enfermedad = $("#nuevo_antecedente option:selected").text();
            var tipo = $("#nuevo_antecedente").val();
       
            $('#agregar-antecedente').show();
            $('#modificar-antecedente').hide();
            $('#modificar-antecedente-cancelar').hide();

            $('#modal-body-input').html('');
            var html = '';
            console.log(tipo);
            switch(tipo)
            {
                case '2':
                    html+=`
                        <table class="display table  table-borderless dt-responsive nowrap pb-4 table-sm" style="width:100%">
                            <tr>
                                <td class="f-16 font-weight-bold">Procedimiento</td>
                                <td><input class="form-control" type="text" id="procedimiento"></td>
                            </tr>
                            <tr>
                                <td class="f-16 font-weight-bold">Incidente</td>
                                <td><textarea class="form-control" id="comentario"></textarea></td>
                            </tr>
                        </table>
                    `;
                break;
                case '1':
                    html+=`
                        <table class="display table table-borderless  dt-responsive nowrap pb-4 table-sm" style="width:100%">
                            <tr>
                                <td class="f-16 font-weight-bold">Nombre</td>
                                <td><input class="form-control" type="text" id="nombre"></td>
                            </tr>
                            <tr>
                                <td class="f-16 font-weight-bold">Comentarios</td>
                                <td><textarea class="form-control" id="comentario"></textarea></td>
                            </tr>
                        </table>
                    `;
                break;
                case '3':
                    html+=`
                        <table class="display table table-borderless dt-responsive nowrap pb-4 table-sm" style="width:100%">
                            <tr>
                                <td class="f-16 font-weight-bold">Fecha Cirugía</td>
                                <td><input class="form-control" type="date" id="fecha"></td>
                            </tr>
                            <tr>
                                <td class="f-16 font-weight-bold">Procedimiento</td>
                                <td><input class="form-control" type="text" id="procedimiento"></td>
                            </tr>
                            <tr>
                                <td class="f-16 font-weight-bold">Incidente</td>
                                <td><textarea class="form-control" id="comentario"></textarea></td>
                            </tr>
                        </table>
                    `;
                break;
                case '4':
                    html+=`
                        <table class="display table table-borderless dt-responsive nowrap pb-4 table-sm" style="width:100%">
                            <tr>
                                <td class="f-16 font-weight-bold">Procedimiento</td>
                                <td><input class="form-control" type="text" id="procedimiento"></td>
                            </tr>
                            <tr>
                                <td class="f-16 font-weight-bold">Detalle</td>
                                <td><textarea class="form-control" id="comentario"></textarea></td>
                            </tr>
                        </table>
                    `;
                break;
                case '5':
                    html+=`
                        <table class="display table table-borderless dt-responsive nowrap pb-4 table-sm" style="width:100%">
                            <tr>
                                <td class="f-16 font-weight-bold">Nombre antecedente</td>
                                <td><input class="form-control form-control-sm" type="text" id="procedimiento"></td>
                            </tr>
                            <tr>
                                <td class="f-16 font-weight-bold">Institución</td>
                                <td><textarea class="form-control form-control-sm" id="institucion"></textarea></td>
                            </tr>
                            <tr>
                                <td class="f-16 font-weight-bold">Fecha Evento</td>
                                <td><input class="form-control" type="date" id="fecha"></td>
                            </tr>
                        </table>
                    `;
                break;
                case '6':
                    html+=`
                        <table class="display table table-borderless dt-responsive nowrap pb-4 table-sm" style="width:100%">
                            <tr>
                                <td class="f-16 font-weight-bold">Nombre alergia</td>
                                <td><input class="form-control form-control-sm" type="text" id="nombre"></td>
                            </tr>
                            <tr>
                                <td class="f-16 font-weight-bold">Detalle</td>
                                <td><textarea class="form-control form-control-sm" id="comentario"></textarea></td>
                            </tr>
                        </table>
                    `;
                break;
                case '7':
                    html+=`
                        <table class="display table table-borderless dt-responsive nowrap pb-4 table-sm" style="width:100%">
                            <tr>
                                <td class="f-16 font-weight-bold">Nombre Medicamento</td>
                                <td>
                                    <div class="form-group">
                                        <input class="form-control form-control-sm" type="text" id="nombre_medicamento_cronico">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="f-16 font-weight-bold">Dosis</td>
                                <td><textarea class="form-control" id="dosis"></textarea></td>
                            </tr>

                        </table>
                    `;
                break;
                case '8':
                    html+=`
                        <table class="display table table-borderless  dt-responsive nowrap pb-4 table-sm" style="width:100%">
                            <tr>
                                <td class="f-16 font-weight-bold">Tipo de Discapacidad</td>
                                <td>
                                    <select class="form-control form-control-sm" name="nombre" id="nombre">
                                        <option value="Auditíva">Auditíva</option>
                                        <option value="Visual">Visual</option>
                                        <option value="Locomotora">Locomotora </option>
                                        <option value="Neurológica">Neurológica</option>
                                        <option value="Fonoarticulatoria">Fonoarticulatoria</option>
                                        <option value="Cognitiva">Cognitiva</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="f-16 font-weight-bold">Grado</td>
                                <td>
                                    <input class="form-control form-control-sm" type="text" id="discapacidad_grado">
                                </td>
                            </tr>
                            <tr>
                                <td class="f-16 font-weight-bold">Permanente</td>
                                <td>
                                    <select class="form-control form-control-sm" name="discapacidad_permanente" id="discapacidad_permanente">
                                        <option value="si">SI</option>
                                        <option value="no">NO</option>
                                    </select>
                                </td>
                            </tr>

                        </table>
                    `;
                break;
            }
            console.log(tipo);
            cargarRegistrosAntecedentes(tipo);
            // if(tipo == 1){
            //     cargarRegistrosAntecedentes(tipo);
            // }
            
            $('#titulo_antecedente').html('Añadir '+nombre_enfermedad);
            $('#modal-body-input').html(html);
            $('#tipo-antecedente-m').val(tipo);
            $('#id-antecedente-m').val('');

            if( tipo == 7)
            {
                activarMedicamentos('nombre_medicamento_cronico');
                // ver_medicamento_cronico();// ver tabla medicamentos cronicos generales
            }

        }
        else
        {
            $('#modal-body-input').html('');
            $('#nuevo_antecedente').val(1);
            cambiar_antecedente();
        }
    }

    {{--  MEDICAMENTOS AUTOCOMPLETE --}}
	const activarMedicamentos = (input) => {
		$("#"+input).autocomplete({
			source: function(request, response) {
				$.ajax({
					url: "{{ route('dental.getArticulo') }}",
					type: 'post',
					dataType: "json",
					data: {
						_token: CSRF_TOKEN,
						search: request.term
					},
					success: function(data) {
						console.log(data.length);
						response(data);
					}
				});
			},
			select: function(event, ui) {
				$('#'+input).val(ui.item.label);
				return false;
			}
		});
	}

    const agregarAntecedente = () => {

        $('#title-antecedente').html('Agregar Antecedente');

        var data = {};
        var url = '{{Request::root()}}/api/antecedente/registrar';
        var tipo = $('#tipo-antecedente-m').val();

        /* CAMPOS */
        data.nombre = $('#nombre').val();
        data.comentario = $('#comentario').val();
        data.procedimiento = $('#procedimiento').val();
        data.nombre_medicamento_cronico = $('#nombre_medicamento_cronico').val();
        data.fecha = $('#fecha').val();
        data.dosis = $('#dosis').val();
        data.institucion = $('#institucion').val();
        data.discapacidad_tipo = $('#discapacidad_tipo').val();
        data.discapacidad_grado = $('#discapacidad_grado').val();
        data.discapacidad_permanente = $('#discapacidad_permanente').val();

        data.id_paciente = $('#id_paciente_fc').val();
        data.id_tipo_antecedente = $('#tipo-antecedente-m').val();
        data.id_users = $('#user-id').val();
        data.rut_responsable =$('#user-rut').val();
        data.profesion = $('#user-profesion').val();
        data.profesional = $('#user-profesional').val();
        data.estado = 1;

        $.ajax({
            url: url,
            type: "POST",
            data: data,
            success: (resp)=>{
                console.log(resp);
                if(resp.estado==1)
                {
                    $('#nombre').val('');
                    $('#comentario').val('');
                    $('#procedimiento').val('');
                    $('#nombre_medicamento_cronico').val('');
                    $('#fecha').val('');
                    $('#dosis').val('');
                    $('#institucion').val('');
                    $('#discapacidad_tipo').val('');
                    $('#discapacidad_grado').val('');
                    $('#discapacidad_permanente').val('');

                    cargarRegistrosAntecedentes(tipo);
                    msg('Antecedente','Registro Ingresado.','success');


                }else{
                    msg('Antecedente','Campo Obligatorio: '+JSON.stringify(resp.error),'danger');
                }
            },
            error: (resp)=>{
                console.warn(resp);
            }
        });
    }

     const cargarRegistrosAntecedentes = (tipo) => {

        var data = {};
        var url = '{{Request::root()}}/api/antecedente/ver_registros';

        data.id_paciente = $('#id_paciente_fc').val();
        data.id_tipo_antecedente = tipo;
        data.estado = 1;

        $.ajax({
            url: url,
            type: "GET",
            data: data,
            success: (resp)=>{
                console.log(resp);
                if(resp.estado==1)
                {
                    var head_ = '';
                    var html_ = '';
                    var permiso_ = '';
                    var html_patologias = '';
                    var id_users = parseInt($('#user-id').val());
                    resp.registros.forEach(e => {

                        permiso_ = '';
                        if(e.id_users == id_users)
                            permiso_ = `
                                <buttom class="btn btn-icon btn-info feather icon-edit" onclick="verEditarAntecedente(${tipo},${e.id})"></buttom>
                                <buttom class="btn btn-icon btn-danger feather icon-x" onclick="verModalDesactivar('show',${tipo},${e.id})"></buttom>
                            `;
                        console.log(tipo);
                        switch(tipo)
                        {
                            case '1':
                                $('#listado_patologias_paciente').empty();
                                head_ =`
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Comentario</th>
                                        <th>Profesional</th>
                                        <th>Fecha</th>
                                        <th></th>
                                    </tr>
                                `;
                                html_ +=`
                                    <tr>
                                        <td>${e.antecedente_data.nombre}</td>
                                        <td>${e.antecedente_data.comentario}</td>
                                        <td>${e.antecedente_data.profesional} <br/>${e.antecedente_data.rut_responsable}</td>
                                        <td>${e.antecedente_data.fecha_regitro}</td>
                                        <td>${permiso_}</td>
                                    </tr>
                                `;
                                html_patologias += `<li>${e.antecedente_data.nombre}</li>`;
                            break;
                            case '2':
                                head_ =`
                                    <tr>
                                        <th>Procedimiento</th>
                                        <th>Incidentes</th>
                                        <th>Profesional</th>
                                        <th>Fecha</th>
                                        <th>Acción</th>
                                    </tr>
                                `;
                                html_ +=`
                                    <tr>
                                        <td>${e.antecedente_data.procedimiento}</td>
                                        <td>${e.antecedente_data.comentario}</td>
                                        <td>${e.antecedente_data.profesional}<br/>${e.antecedente_data.rut_responsable}</td>
                                        <td>${e.antecedente_data.fecha_regitro}</td>
                                        <td>${permiso_}</td>
                                    </tr>
                                `;

                            break;
                            
                            case '3':
                                head_ =`
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Procedimiento</th>
                                        <th>Incidente</th>
                                        <th>Profesional</th>
                                        <th>Fecha data</th>
                                        <th></th>
                                    </tr>
                                `;
                                html_ +=`
                                    <tr>
                                        <td>${e.antecedente_data.fecha}</td>
                                        <td>${e.antecedente_data.procedimiento}</td>
                                        <td>${e.antecedente_data.comentario}</td>
                                        <td>${e.antecedente_data.profesional} <br/>${e.antecedente_data.rut_responsable}</td>
                                        <td>${e.antecedente_data.fecha_regitro}</td>
                                        <td>${permiso_}</td>
                                    </tr>
                                `;
                            break;
                            case '4':
                                head_ =`
                                    <tr>
                                        <th>Procedimiento</th>
                                        <th>Comentario</th>
                                        <th>Rut Responsable</th>
                                        <th>Profesional</th>
                                        <th>Fecha data</th>
                                        <th></th>
                                    </tr>
                                `;
                                html_ +=`
                                    <tr>
                                        <td>${e.antecedente_data.procedimiento}</td>
                                        <td>${e.antecedente_data.comentario}</td>
                                        <td>${e.antecedente_data.rut_responsable}</td>
                                        <td>${e.antecedente_data.profesional}</td>
                                        <td>${e.antecedente_data.fecha_regitro}</td>
                                        <td>${permiso_}</td>
                                    </tr>
                                `;
                            break;
                            case '5':
                                head_ =`
                                    <tr>
                                        <th>Patología</th>
                                        <th>Clínica o servicio</th>
                                        <th>Fecha Aproximada</th>
                                        <th></th>
                                    </tr>
                                `;
                                html_ +=`
                                    <tr>
                                        <td>${e.antecedente_data.procedimiento}</td>
                                        <td>${e.antecedente_data.institucion}</td>
                                        <td>${e.antecedente_data.fecha}</td>
                                        <td>${permiso_}</td>
                                    </tr>
                                `;
                            break;
                            case '6':
                                head_ =`
                                    <tr>
                                        <th>Nombre Alergia</th>
                                        <th>Comentario</th>
                                        <th>Fecha</th>
                                        <th></th>
                                    </tr>
                                `;
                                html_ +=`
                                    <tr>
                                        <td>${e.antecedente_data.nombre}</td>
                                        <td>${e.antecedente_data.comentario}</td>
                                        <td>${e.antecedente_data.fecha_regitro}</td>
                                        <td>${permiso_}</td>
                                    </tr>
                                `;
                            break;
                            case '7':
                                head_ =`
                                    <tr>
                                        <th>Nombre Medicamento Crónico</th>
                                        <th>Dosis</th>
                                        <th>Fecha</th>
                                        <th></th>
                                    </tr>
                                `;
                                html_ +=`
                                    <tr>
                                        <td>${e.antecedente_data.nombre_medicamento_cronico}</td>
                                        <td>${e.antecedente_data.dosis}</td>
                                        <td>${e.antecedente_data.fecha_regitro}</td>
                                        <td>${permiso_}</td>
                                    </tr>
                                `;
                            break;
                            case '8':
                                head_ =`
                                    <tr>
                                        <th>Discapacidad</th>
                                        <th>Grado</th>
                                        <th>Reversibilidad</th>
                                        <th>Fecha</th>
                                        <th>Acción</th>
                                    </tr>
                                `;
                                html_ +=`
                                    <tr>
                                        <td>${e.antecedente_data.nombre}</td>
                                        <td>${e.antecedente_data.discapacidad_grado}</td>
                                        <td>${e.antecedente_data.discapacidad_permanente}</td>
                                        <td>${e.antecedente_data.fecha_regitro}</td>
                                        <td>${permiso_}</td>
                                    </tr>
                                `;
                            break;
                        }

                    });

                    $('#tabla_antecedentes thead').html(head_);
                    $('#tabla_antecedentes tbody').html(html_);
                    if(tipo == 1){
                        $('#listado_patologias_paciente').html(html_patologias);
                    }
                    
                }
            },
            error: (resp)=>{
                console.warn(resp);
            }
        });
    }

    const verEditarAntecedente = (tipo,id)=>{

        var nombre_enfermedad = $("#nuevo_antecedente option:selected").text();
        $('#titulo_antecedente').html('Modificar '+nombre_enfermedad);
        $('#agregar-antecedente').hide();
        $('#modificar-antecedente').show();
        $('#modificar-antecedente-cancelar').show();

        $('#tipo-antecedente-m').val(tipo);

        $('#id-antecedente-m').val(id);
        cargarDatosAntecedente(id);

    }

    const cargarDatosAntecedente = (id) => {

        var data = {};
        var url = '{{Request::root()}}/api/antecedente/ver_registro';

        data.id = id;

        $.ajax({
                url: url,
                type: "GET",
                data: data,
            success: (resp)=>{
                if(resp.estado==1)
                {
                    $('#procedimiento').val(resp.registros.antecedente_data.procedimiento);
                    $('#comentario').val(resp.registros.antecedente_data.comentario);
                    $('#nombre').val(resp.registros.antecedente_data.nombre);
                    $('#fecha').val(resp.registros.antecedente_data.fecha);
                    $('#nombre_medicamento_cronico').val(resp.registros.antecedente_data.nombre_medicamento_cronico);
                    $('#dosis').val(resp.registros.antecedente_data.dosis);
                    $('#institucion').val(resp.registros.antecedente_data.institucion);
                    $('#discapacidad_tipo').val(resp.registros.antecedente_data.discapacidad_tipo);
                    $('#discapacidad_grado').val(resp.registros.antecedente_data.discapacidad_grado);
                    $('#discapacidad_permanente').val(resp.registros.antecedente_data.discapacidad_permanente);
                }
            },
            error: (resp)=>{
                console.warn(resp);
            }
        });

    }

    const modificarAntecedente = () =>
    {

        var data = {};
        var url = '{{Request::root()}}/api/antecedente/modificar';
        var tipo = $('#tipo-antecedente-m').val();

        /* CAMPOS */
        data.id = $('#id-antecedente-m').val();
        data.nombre = $('#nombre').val();
        data.comentario = $('#comentario').val();
        data.procedimiento = $('#procedimiento').val();
        data.nombre_medicamento_cronico = $('#nombre_medicamento_cronico').val();
        data.fecha = $('#fecha').val();
        data.dosis = $('#dosis').val();
        data.institucion = $('#institucion').val();
        data.discapacidad_tipo = $('#discapacidad_tipo').val();
        data.discapacidad_grado = $('#discapacidad_grado').val();
        data.discapacidad_permanente = $('#discapacidad_permanente').val();


        data.id_paciente = $('#id_paciente_fc').val();
        data.id_tipo_antecedente = $('#tipo-antecedente-m').val();
        data.id_users = $('#user-id').val();
        data.rut_responsable =$('#user-rut').val();
        data.profesion = $('#user-profesion').val();
        data.profesional = $('#user-profesional').val();
        data.estado = 1;


        $.ajax({
            url: url,
            type: "POST",
            data: data,
            success: (resp)=>{
                if(resp.estado==1)
                {
                    var nombre_enfermedad = $("#nuevo_antecedente option:selected").text();
                    $('#titulo_antecedente').html('Registrar '+nombre_enfermedad);
                    $('#agregar-antecedente').show();
                    $('#modificar-antecedente').hide();
                    $('#modificar-antecedente-cancelar').hide();

                    $('#id-antecedente-m').val('');
                    $('#nombre').val('');
                    $('#comentario').val('');
                    $('#procedimiento').val('');
                    $('#nombre_medicamento_cronico').val('');
                    $('#fecha').val('');
                    $('#dosis').val('');
                    $('#institucion').val('');
                    $('#discapacidad_tipo').val('');
                    $('#discapacidad_grado').val('');
                    $('#discapacidad_permanente').val('');

                    cargarRegistrosAntecedentes(tipo);
                    msg('Antecedente','Registro Modificado.','success');

                }
                else
                {
                    msg('Antecedente','Campo Obligatorio: '+JSON.stringify(resp.error),'danger');
                }
            },
            error: (resp)=>{
                console.warn(resp);
            }
        });
    }

    const cancelarModificar = () =>
    {
        var nombre_enfermedad = $("#nuevo_antecedente option:selected").text();
        $('#titulo_antecedente').html('Registrar '+nombre_enfermedad);
        $('#agregar-antecedente').show();
        $('#modificar-antecedente').hide();
        $('#modificar-antecedente-cancelar').hide();

        $('#id-antecedente-m').val('');
        $('#nombre').val('');
        $('#comentario').val('');
        $('#procedimiento').val('');
        $('#nombre_medicamento_cronico').val('');
        $('#fecha').val('');
        $('#dosis').val('');
        $('#institucion').val('');
        $('#discapacidad_tipo').val('');
        $('#discapacidad_grado').val('');
        $('#discapacidad_permanente').val('');
    }

    const verModalDesactivar = (fun,tipo,id) => {
        $('#id-antecedente-m-desactivar').val(id);
        $('#tipo-antecedente-m-desactivar').val(tipo);
        $('#modal-confirmar').modal(fun);
    }

    const eliminarAntecedente = () => {

        var data = {};
        var url = '{{Request::root()}}/api/antecedente/estado';
        var tipo =   $('#tipo-antecedente-m-desactivar').val();

        /* CAMPOS */
        data.id = $('#id-antecedente-m-desactivar').val();
        data.estado = 0;


        $.ajax({
                url: url,
                type: "POST",
                data: data,
            success: (resp)=>{
                if(resp.estado==1)
                {
                    cargarRegistrosAntecedentes(tipo);
                    msg('Antecedente','Registro Desactivado.','success');
                    $('#modal-confirmar').modal('hide');

                }else{
                    msg('Antecedente','Campo Obligatorio: '+JSON.stringify(resp.error),'danger');
                }
            },
            error: (resp)=>{
                console.warn(resp);
            }
        });
    }
</script>
