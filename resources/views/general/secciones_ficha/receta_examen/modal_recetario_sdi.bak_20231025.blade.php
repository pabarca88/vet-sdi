<div id="indicar_recetario" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="indicar_recetario"aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1">Recetario SDI</h5>
                <input type="hidden" id="id_profesional" value="{{ @Auth::user()->id }}">
                <button type="button" class="close" aria-label="Close" onclick="cerrarModalMedicamentosFicha_sdi();">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav nav-pills mb-3" id="tablas_examenes" role="tablist">

                            <li class="nav-item">
                                <a class="nav-link-wizard active " id="rec_auto_tab" data-toggle="pill" href="#rec_auto" role="tab" aria-controls="rec_auto" aria-selected="true">Receta auto</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-wizard" id="rec_manual_tab" data-toggle="pill" href="#rec_manual" role="tab" aria-controls="rec_manual" aria-selected="true" toogle="true" tooltip="No encontró medicamento">Receta Manual</a>
                            </li>
							<li class="nav-item">
                                <a class="nav-link-wizard" id="rec_magistral_tab" data-toggle="pill" href="#rec_magistral" role="tab" aria-controls="rec_magistral" aria-selected="true" toogle="true" tooltip="No encontró medicamento">Recetario Magistral</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="tab-content" id="pills-tablas_examenes">
                            <!--TAB 1-->
                            <div class="tab-pane fade show active" id="rec_auto" role="tabpanel" aria-labelledby="rec_auto_tab">
                                <div class="form-row">
                                    <div class="col-sm-6 mt-2">
                                        <div class="form-group">
                                            <label class="floating-label">Medicamento</label>
                                            <input type="text" id="nombre_medicamento_ficha_dental" name="nombre_medicamento_ficha_dental" onblur="getDosis_sdi();" class="form-control form-control-sm">
                                            <input type="hidden" id="id_medicamento_ficha_dental" name="id_medicamento_ficha_dental" class="form-control " value="">
                                            <input type="hidden" id="id_medicamento_cant_comp" name="id_medicamento_cant_comp" class="form-control " value="">
                                            <input type="hidden" id="id_medicamento_tipo_control" name="id_medicamento_tipo_control" class="form-control" value="">
                                        </div>
                                    </div>

                                    <div class="col-sm-6 mt-2">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Composición:</label>
                                            <div id="nombre_composicion_farmaco" name="nombre_composicion_farmaco" class="p-t-5"></div>
                                            <div id="mensaje_med_control" name="mensaje_med_control" class="alert-warning"></div>

                                        </div>
                                    </div>
                                    {{--  CUANDO SE ENCUENTRA MEDICAMENTO EN BUSQUEDA  --}}
                                    <div class="col-sm-6 mt-2 medicamento_activo">
                                        <div class="form-group fill">
                                            <label class="floating-label">Presentación</label>
                                            <select class="form-control form-control-sm" id="dosis_medicamento_ficha_dental" name="dosis_medicamento_ficha_dental" onchange="getFrecuencia_sdi();getCantComp_sdi();">
                                                <option>Seleccione una opción</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mt-2 medicamento_activo">
                                        <div class="form-group fill">
                                            <label class="floating-label">Posología</label>
                                            <select class="form-control form-control-sm" id="frecuencia_medicamento_ficha_dental"
                                                name="frecuencia_medicamento_ficha_dental">
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
                                            <select class="form-control form-control-sm" id="via_administracion_ficha_dental" name="via_administracion_ficha_dental" onchange="validar_via_administracion_sdi();">
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
                                            <select class="form-control form-control-sm" id="periodo_ficha_dental" name="periodo_ficha_dental" onchange="validar_periodo_sdi();">
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
                                            <select class="form-control form-control-sm" id="cantidad_comprar" name="cantidad_comprar" onchange="validar_cantidad_comprar_sdi();">
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
                                                <button type="button" onclick="indicar_medicamento_sdi()"
                                                    class="btn btn-success btn-sm float-right"><i class="fa fa-plus"></i> Agregar Medicamento</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--TAB 2-->
                            <div class="tab-pane fade show" id="rec_manual" role="tabpanel" aria-labelledby="rec_manual_tab">
                                <div class="form-row">

                                    <div class="col-sm-6 mt-2">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Ingrese Nombre Medicamento</label>
                                            <input type="text" id="manual_nombre_medicamento_ficha_dental" name="manual_nombre_medicamento_ficha_dental" class="form-control form-control-sm">
                                            <input type="hidden" id="manual_id_medicamento_ficha_dental" name="manual_id_medicamento_ficha_dental" value="0">
                                            <input type="hidden" id="med_faltante" value="">
                                        </div>
                                    </div>

                                    <div class="col-sm-6 mt-2">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Farmaco</label>
                                            <input type="text" id="manual_nombre_composicion_farmaco" name="manual_nombre_composicion_farmaco" class="form-control form-control-sm">
                                        </div>
                                    </div>

                                    <div class="col-sm-6 mt-2">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Tipo Control</label>
                                            <select name="manual_tipo_control" id="manual_tipo_control" class="form-control form-control-sm">
                                                <option value="">Seleccione</option>
                                                @if($receta_control)
                                                    @foreach ($receta_control as $control)
                                                        @if($control->cod_control !== 8)
                                                            <option value="{{ $control->cod_control }}">{{ $control->descripcion }}</option>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 mt-2">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Ingrese Presentación</label>
                                            <input type="text" id="manual_dosis_medicamento_ficha_dental" name="manual_dosis_medicamento_ficha_dental" class="form-control form-control-sm">

                                        </div>
                                    </div>

                                    <div class="col-sm-6 mt-2">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Ingrese Posología</label>
                                            <input type="text" id="manual_frecuencia_medicamento_ficha_dental" name="manual_frecuencia_medicamento_ficha_dental" class="form-control form-control-sm">
                                        </div>
                                    </div>

                                    <div class="col-sm-6 mt-2">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Vía de Administración</label>
                                            <select class="form-control form-control-sm" id="manual_via_administracion_ficha_dental" name="manual_via_administracion_ficha_dental" onchange="validar_via_administracion_manual_sdi();">
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
                                        <div class="form-group fill" id="div_manual_observaciones_via_administracion_ficha_dental" style="display: none;">
                                            <label class="floating-label-activo-sm">Otra vía de Administración</label>
                                            <input type="text" id="manual_observaciones_via_administracion_ficha_dental" name="manual_observaciones_via_administracion_ficha_dental" class="form-control form-control-sm " disabled >
                                        </div>
                                    </div>

                                    <div class="col-sm-3 mt-2">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Periodo</label>
                                            <select class="form-control form-control-sm" id="manual_periodo_ficha_dental" name="manual_periodo_ficha_dental" onchange="validar_periodo_manual_sdi();">
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
                                        <div class="form-group fill" id="div_manual_observaciones_periodo_ficha_dental" style="display: none;">
                                            <label class="floating-label-activo-sm">Otro Periodo</label>
                                            <input type="text" id="manual_observaciones_periodo_ficha_dental" name="manual_observaciones_periodo_ficha_dental" class="form-control form-control-sm " disabled >
                                        </div>
                                    </div>

                                    <input type="hidden" id="manual_cantidad_comprar" name="manual_cantidad_comprar" value="">

                                    <div class="col-sm-3  mt-2">
                                        <label class="floating-label-activo-sm">Cantidad a Comprar</label>
                                        <select name="manual_cantidad_numero" id="manual_cantidad_numero" class="form-control form-control-sm" onchange="cargarCantidadComprar('manual_cantidad_numero', 'manual_cantidad_tipo_unidad', 'manual_cantidad_comprar')">
                                            <option value="1">(1) Uno</option>
                                            <option value="2">(2) Dos</option>
                                            <option value="3">(3) Tres</option>
                                            <option value="4">(4) Cuatro</option>
                                            <option value="5">(5) Cinco</option>
                                            <option value="6">(6) Seis</option>
                                            <option value="7">(7) Siete</option>
                                            <option value="8">(8) Ocho</option>
                                            <option value="9">(9) Nueve</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3  mt-2">
                                        <label class="floating-label-activo-sm">Presentación</label>
                                        <select name="manual_cantidad_tipo_unidad" id="manual_cantidad_tipo_unidad" class="form-control form-control-sm" onchange="cargarCantidadComprar('manual_cantidad_numero', 'manual_cantidad_tipo_unidad', 'manual_cantidad_comprar')">
                                            <option value="Ampolla(s)">Ampolla(s)</option>
                                            <option value="Caja(s)">Caja(s)</option>
                                            <option value="Franco(s)">Franco(s)</option>
                                            <option value="Unidad(es)">Unidad(es)</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3  mt-2">
                                        <label id="manual_cantidad_comprar_label"></label>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group mb-1">
                                                    <label><strong>Uso Crónico</strong></label>
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <input type="checkbox" id="manual_medicamento_uso_cronico">
                                                        <label for="manual_medicamento_uso_cronico" class="cr"></label>
                                                    </div>
                                                    <div class="alert-primary" id="manual_mensaje_uso_cronico" style="display:none;">Acaba de seleccionar medicamento como USO CRÓNICO </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <button type="button" onclick="indicar_medicamento_manual_sdi()"
                                                    class="btn btn-success btn-sm float-right"><i class="fa fa-plus"></i> Agregar Medicamento Manual</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

							<!--TAB 3-->
							<div class="tab-pane fade show" id="rec_magistral" role="tabpanel" aria-labelledby="rec_magistral_tab">
                                <div class="row mb-3">
                                    <div class="col-sm-12">
                                        <button type="button" onclick="agregar_componente();" class="btn btn-success btn-sm float-right"><i class="fa fa-plus"></i> Agregar Componente a Receta Magistral</button>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6 mt-2">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Tipo Control</label>
                                            <select name="magistral_tipo_control" id="magistral_tipo_control" class="form-control form-control-sm">
                                                <option value="">Seleccione</option>
                                                @if($receta_control)
                                                    @foreach ($receta_control as $control)
                                                        @if($control->cod_control == 8)
                                                            <option value="{{ $control->cod_control }}" selected>{{ $control->descripcion }}</option>
                                                        @else
                                                            @if(intval($control->cod_control) != 6 && intval($control->cod_control) != 7)
                                                                <option value="{{ $control->cod_control }}">{{ $control->descripcion }}</option>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mt-2">
                                        <label class="label">Si Receta Magistra Posee Elementos con Control Debe seleccionar el Tipo de Control Adecuado</label>
                                    </div>
                                </div>

                                <div class="div_componentes">
                                    <div class="form-row componente">
                                        <div class="col-sm-8 mt-6">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Ingrese los Compuestos</label>
                                                <input class="form-control form-control-sm" type="text" name="magistral_nombre_medicamento_ficha_dental" id="magistral_nombre_medicamento_ficha_dental" value="">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 mt-6">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Ingrese la cantidad</label>
                                                <input class="form-control form-control-sm" type="text" name="magistral_cantidad_medicamento_ficha_dental" id="magistral_cantidad_medicamento_ficha_dental" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row ">
                                    <div class="col-sm-4 mt-2">
                                        <label class="floating-label-activo-sm">Presentación</label>
                                        <select name="magistral_dosis_medicamento_ficha_dental" id="magistral_dosis_medicamento_ficha_dental" class="form-control form-control-sm">
                                            <option value="Cápsulas de gelatina duras">Cápsulas de gelatina duras</option>
                                            <option value="Colirios">Colirios</option>
                                            <option value="Comprimidos">Comprimidos</option>
                                            <option value="Cremas">Cremas</option>
                                            <option value="Enemas">Enemas</option>
                                            <option value="Granulados">Granulados</option>
                                            <option value="Jeringas precargadas">Jeringas precargadas</option>
                                            <option value="Papelillos">Papelillos</option>
                                            <option value="Polvos">Polvos</option>
                                            <option value="Pomadas">Pomadas</option>
                                            <option value="Soluciones">Soluciones</option>
                                            <option value="Supositorios">Supositorios</option>
                                            <option value="Suspensiones">Suspensiones</option>
                                            <option value="Viales">Viales</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4 mt-2">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">CSP</label>
                                            <input type="text" id="magistral_cantidad_comprar" name="magistral_cantidad_comprar" class="form-control form-control-sm" value="">
                                        </div>
                                    </div>

                                    <div class="col-sm-4 mt-2">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Ingrese Posología</label>
                                            <input type="text" id="magistral_frecuencia_medicamento_ficha_dental" name="magistral_frecuencia_medicamento_ficha_dental" class="form-control form-control-sm">
                                        </div>
                                    </div>

                                    <div class="col-sm-6 mt-2">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Vía de Administración</label>
                                            <select class="form-control form-control-sm" id="magistral_via_administracion_ficha_dental" name="magistral_via_administracion_ficha_dental" onchange="validar_via_administracion_manual_sdi();">
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
                                        <div class="form-group fill" id="div_magistral_observaciones_via_administracion_ficha_dental" style="display: none;">
                                            <label class="floating-label-activo-sm">Otra vía de Administración</label>
                                            <input type="text" id="magistral_observaciones_via_administracion_ficha_dental" name="magistral_observaciones_via_administracion_ficha_dental" class="form-control form-control-sm " disabled >
                                        </div>
                                    </div>

                                    <div class="col-sm-6 mt-2">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Periodo</label>
                                            <select class="form-control form-control-sm" id="magistral_periodo_ficha_dental" name="magistral_periodo_ficha_dental" onchange="validar_periodo_manual_sdi();">
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
                                        <div class="form-group fill" id="div_magistral_observaciones_periodo_ficha_dental" style="display: none;">
                                            <label class="floating-label-activo-sm">Otro Periodo</label>
                                            <input type="text" id="magistral_observaciones_periodo_ficha_dental" name="magistral_observaciones_periodo_ficha_dental" class="form-control form-control-sm " disabled >
                                        </div>
                                    </div>

                                    {{-- <div class="col-sm-12 mt-2">
                                        <div class="form-group fill">
                                            <input type="hidden" id="magistral_cantidad_comprar" name="magistral_cantidad_comprar" value="">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <label class="floating-label-activo-sm">Cantidad a Despachar</label>
                                                    <select name="magistral_cantidad_numero" id="magistral_cantidad_numero" class="form-control form-control-sm" onchange="cargarCantidadComprar('magistral_cantidad_numero', 'magistral_cantidad_tipo_unidad', 'magistral_cantidad_comprar')">
                                                        <option value="1">(1) Una Unidad</option>
                                                        <option value="2">(2) Dos Unidad</option>
                                                        <option value="3">(3) Tres Unidad</option>
                                                        <option value="4">(4) Cuatro Unidad</option>
                                                        <option value="5">(5) Cinco Unidad</option>
                                                        <option value="6">(6) Seis Unidad</option>
                                                        <option value="7">(7) Siete Unidad</option>
                                                        <option value="8">(8) Ocho Unidad</option>
                                                        <option value="9">(9) Nueve Unidad</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label class="floating-label-activo-sm">Presentación</label>
                                                    <select name="magistral_cantidad_tipo_unidad" id="magistral_cantidad_tipo_unidad" class="form-control form-control-sm" onchange="cargarCantidadComprar('magistral_cantidad_numero', 'magistral_cantidad_tipo_unidad', 'magistral_cantidad_comprar')">
                                                        <option value="Cápsulas de gelatina duras">Cápsulas de gelatina duras</option>
                                                        <option value="Colirios">Colirios</option>
                                                        <option value="Comprimidos">Comprimidos</option>
                                                        <option value="Cremas">Cremas</option>
                                                        <option value="Enemas">Enemas</option>
                                                        <option value="Granulados">Granulados</option>
                                                        <option value="Jeringas precargadas">Jeringas precargadas</option>
                                                        <option value="Papelillos">Papelillos</option>
                                                        <option value="Polvos">Polvos</option>
                                                        <option value="Pomadas">Pomadas</option>
                                                        <option value="Soluciones">Soluciones</option>
                                                        <option value="Supositorios">Supositorios</option>
                                                        <option value="Suspensiones">Suspensiones</option>
                                                        <option value="Viales">Viales</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label id="magistral_cantidad_comprar_label"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="col-sm-6 mt-2">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Cantidad a Despachar</label>
                                            <input type="text" id="magistral_cantidad_comprar" name="magistral_cantidad_comprar" class="form-control form-control-sm">
                                        </div>
                                    </div> --}}

                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group mb-1">
                                                    <label><strong>Uso Crónico</strong></label>
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <input type="checkbox" id="magistral_medicamento_uso_cronico">
                                                        <label for="magistral_medicamento_uso_cronico" class="cr"></label>
                                                    </div>
                                                    <div class="alert-primary" id="magistral_mensaje_uso_cronico" style="display:none;">Acaba de seleccionar medicamento como USO CRÓNICO </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <button type="button" onclick="indicar_medicamento_magistral_sdi()" class="btn btn-success btn-sm float-right"><i class="fa fa-plus"></i> Agregar Medicamento Magistral</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!--DIV DE TABLA -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="col-sm-12 mt-3">
                                        <!--**** Al agregar un medicamento, se debe cargar la tabla *****-->
                                        <!--Tabla-->
                                        <div class="table-responsive">
                                            <table id="tabla_medicamento_cirugia_sdi" class="table table-bordered table-sm">
                                                <thead>
                                                    <tr>
                                                        <td class="text-center align-middle text-wrap hidden" hidden="hidden">id_tipo_control</td>
                                                        <td class="text-center align-middle text-wrap hidden" hidden="hidden">id_producto</td>
                                                        <td class="text-center align-middle text-wrap">Medicamentos</td>
                                                        <td class="text-center align-middle text-wrap hidden" hidden="hidden">farmaco</td>
                                                        <td class="text-center align-middle text-wrap hidden" hidden="hidden">id_presentacion</td>
                                                        <td class="text-center align-middle text-wrap">Presentación</td>
                                                        <td class="text-center align-middle text-wrap" hidden="hidden">id_receta_dosis</td>
                                                        <td class="text-center align-middle text-wrap hidden">Posología</td>
                                                        <td class="text-center align-middle text-wrap hidden" hidden="hidden">id_via_administracion</td>
                                                        <td class="text-center align-middle text-wrap">Vía Adm.</td>
                                                        <td class="text-center align-middle text-wrap hidden" hidden="hidden">id_periodo</td>
                                                        <td class="text-center align-middle text-wrap">Periodo</td>
                                                        <td class="text-center align-middle text-wrap hidden" hidden="hidden">uso_cronico</td>
                                                        <td class="text-center align-middle text-wrap hidden" hidden="hidden">cantidad_compra</td>
                                                        <td class="text-center align-middle text-wrap">Comprar</td>
                                                        <th class="text-center align-middle">Eliminar</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
                                        <!--Cierre: Tabla-->
                                    </div>
                                    <div class="modal-footer">
                                        {{--  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>  --}}
                                        {{--  <button type="button" onclick="alerta_registro_medicamento_sdi();" data-dismiss="modal" class="btn btn-info">Generar Receta</button>  --}}
                                        <button type="button" onclick="registrar_medicamentos_ficha_sdi();" data-dismiss="modal" class="btn btn-info">Generar Receta</button>
                                    </div>
                                </div>
                            </div>

                            <!-- DIV MEDICAMENTO FALTANTE-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-sm-12 mt-3 mb-2">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="ranking_recetas_switch">
                                            <label class="custom-control-label text-primary" for="ranking_recetas_switch"><strong><u>Ranking  de recetas controladas del paciente</u></strong></label>
                                        </div>
                                    </div>
                                    <div class="row" id="ranking_recetas" style="display:none">
                                        <div class="col-sm-12 col-md-12">
                                            <h6 class="text-c-blue mb-3">Recetas propias</h6>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group fill">
                                                <label class="floating-label">Tipo de control</label>
                                                <select class="form-control form-control-sm" id="" name="">
                                                    <option>Seleccione una opción</option>
                                                    <option value="S" data-select2-id="0">Seleccione una opción</option>
                                                    <option value="1"> Control Psicotrópicos</option>
                                                    <option value="2"> Control Estupefacientes</option>
                                                    <option value="3"> Receta cheque </option>
                                                    <option value="4"> Receta Retenida Simple</option>
                                                    <option value="5"> Receta Retenida C/Codeína</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <input class="form-control form-control-sm" type="text" placeholder="Nº de recetas">
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                            <h6 class="text-c-blue mb-3">Recetas totales</h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group fill">
                                                <label class="floating-label">Tipo de control</label>
                                                <select class="form-control form-control-sm">
                                                    <option value="S" data-select2-id="0">Seleccione una opción</option>
                                                    <option value="1"> Control Psicotrópicos</option>
                                                    <option value="2"> Control Estupefacientes</option>
                                                    <option value="3"> Receta cheque </option>
                                                    <option value="4"> Receta Retenida Simple</option>
                                                    <option value="5"> Receta Retenida C/Codeína</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <input class="form-control form-control-sm" type="text" placeholder="Nº de recetas">
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
</div>
<script>

    var creatinina = 0;
    $(document).ready(function() {
        {{--  MEDICAMENTOS  --}}
        $("#nombre_medicamento_ficha_dental").autocomplete({
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
                        if( data.length == 0 )
                        {
                            $('.medicamento_activo').hide();
                            $('.medicamento_inactivo').show();
                            $('#dosis_medicamento_ficha_dental_2').val('');
                            $('#frecuencia_medicamento_ficha_dental_2').val('');
                            $('#id_medicamento_ficha_dental').val('');
                            $('#id_medicamento_tipo_control').val('');
                            $('#mensaje_med_control').val('');
                        }
                        else
                        {
                            $('.medicamento_activo').show();
                            $('.medicamento_inactivo').hide();
                            $('#dosis_medicamento_ficha_dental_2').val('');
                            $('#frecuencia_medicamento_ficha_dental_2').val('');
                            $('#id_medicamento_ficha_dental').val('');
                            $('#id_medicamento_tipo_control').val('');
                            $('#mensaje_med_control').val('');
                        }
                        response(data);
                    }
                });
            },
            select: function(event, ui) {
                // Set selection
                $('#nombre_medicamento_ficha_dental').val(ui.item.label); // display the selected text
                $('#id_medicamento_ficha_dental').val(ui.item.value); // save selected id to input
                $('#nombre_composicion_farmaco').html(ui.item.droga); // save selected id to input
                $('#id_medicamento_tipo_control').val(ui.item.control); // save selected id to input
                if(ui.item.control == 1 || ui.item.control == 1 || ui.item.control == 2 || ui.item.control == 3 || ui.item.control == 4 || ui.item.control == 5 )
                    $('#mensaje_med_control').html('Este Paciente ha tenido 3 Recetas retenidas este año<br>Consulte en "Ranking de recetas controladas del paciente"');
                else
                    $('#mensaje_med_control').html('');

                return false;
            }
        });

        {{--  mostrar ocultar mensaje de medicamento de uso cronico en receta de ficha  --}}
        $('#medicamento_uso_cronico').change(function(){
            if($('#medicamento_uso_cronico').is(':checked') )
            {
                $('#mensaje_uso_cronico').show();
            }
            else
            {
                $('#mensaje_uso_cronico').hide();
            }
        });

        {{--  mostrar ocultar mensaje de medicamento de uso cronico en receta de ficha  --}}
        $('#manual_medicamento_uso_cronico').change(function(){
            if($('#manual_medicamento_uso_cronico').is(':checked') )
            {
                $('#manual_mensaje_uso_cronico').show();
            }
            else
            {
                $('#manual_mensaje_uso_cronico').hide();
            }

        });
    });

    {{--  METODOS DE RECETA  --}}
    /** Indicar medicamento **/
    function i_medicamento()
    {
        ver_medicamento_ficha_medica_sdi();
        $('#indicar_recetario').modal({backdrop: 'static', keyboard: false});
    }

    function cerrarModalMedicamentosFicha_sdi()
    {
        swal({
            title: "Ingreso de medicamento(s).",
            text: 'Al "Aceptar" cierra la ventana sin aplicar cambios.\n Debe "Generar Receta" para guardar cambios.',
            icon: "warning",
            buttons: ["Aceptar", 'Cancelar'],
        }).then((result) => {
            if (result == true)
            {
                console.log('regresar');
            } else {

                $('#indicar_recetario').modal('hide');
            }
        })
    };

    function getDosis_sdi()
    {

        let id_medicamento = $('#id_medicamento_ficha_dental').val();
        console.log(id_medicamento);

        let url = "{{ route('dental.getDosis') }}";
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
                    let dosis = $('#dosis_medicamento_ficha_dental');

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

    function getFrecuencia_sdi()
    {

        let id_dosis = $('#dosis_medicamento_ficha_dental').val();
        //console.log(dosis);

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

                if (data != null) {

                    data = JSON.parse(data);
                    console.log(data)
                    let dosis = $('#frecuencia_medicamento_ficha_dental');

                    dosis.find('option').remove();
                    dosis.append('<option value="0">Seleccione</option>');
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

    function getCantComp_sdi()
    {

        var cant_comp = $('#dosis_medicamento_ficha_dental option:selected').attr('data-cant_comp');
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
                    let select_cant_comp = $('#cantidad_comprar');
                    let select_cant_comp2 = $('#med_cronicomes');

                    select_cant_comp.find('option').remove();
                    select_cant_comp.append('<option value="0">Seleccione</option>');
                    $(data).each(function(i, v) { // indice, valor
                        select_cant_comp.append('<option value="' + v.cantidad + '">' + v.cant +'</option>');
                    })
                    select_cant_comp.append('<option value="999">Otra Cantidad</option>');
                } else {



                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

    };

    function validar_via_administracion_sdi()
    {
        if($('#via_administracion_ficha_dental').val() == 11)
        {
            $('#div_observaciones_medicamento_ficha_dental').show();
            $('#observaciones_medicamento_ficha_dental').removeAttr('disabled');
        }
        else
        {
            $('#div_observaciones_medicamento_ficha_dental').hide();
            $('#observaciones_medicamento_ficha_dental').attr('disabled','disabled');
            $('#observaciones_medicamento_ficha_dental').val('');
        }
    }

    function validar_periodo_sdi()
    {
        if($('#periodo_ficha_dental').val() == 11)
        {
            $('#div_observaciones_periodo_ficha_dental').show();
            $('#observaciones_periodo_ficha_dental').removeAttr('disabled');
        }
        else
        {
            $('#div_observaciones_periodo_ficha_dental').hide();
            $('#observaciones_periodo_ficha_dental').attr('disabled','disabled');
            $('#observaciones_periodo_ficha_dental').val('');
        }
    }

    function validar_cantidad_comprar_sdi()
    {
        if($('#cantidad_comprar').val() == 999)
        {
            $('#div_otra_cantidad_a_comprar').show();
            $('#otra_cantidad_a_comprar').removeAttr('disabled');
        }
        else
        {
            $('#div_otra_cantidad_a_comprar').hide();
            $('#otra_cantidad_a_comprar').attr('disabled','disabled');
            $('#otra_cantidad_a_comprar').val('');
        }
    }

    function indicar_medicamento_sdi()
    {

        let nombre_medicamento_ficha_dental = $('#nombre_medicamento_ficha_dental').val();
        let farmaco = $('#nombre_composicion_farmaco').html();
        let id_medicamento = $('#id_medicamento_ficha_dental').val();
        let id_tipo_control = $('#id_medicamento_tipo_control').val();

        let id_dosis_medicamento_ficha_dental = $('#dosis_medicamento_ficha_dental').val();
        let dosis_medicamento_ficha_dental = $('#dosis_medicamento_ficha_dental option:selected').text();

        let id_frecuencia_medicamento_ficha_dental = $('#frecuencia_medicamento_ficha_dental').val();
        let frecuencia_medicamento_ficha_dental = $('#frecuencia_medicamento_ficha_dental option:selected').text();

        let dosis_medicamento_ficha_dental_2 = $('#dosis_medicamento_ficha_dental_2').val();
        let frecuencia_medicamento_ficha_dental_2 = $('#frecuencia_medicamento_ficha_dental_2').val();

        let id_via_administracion_ficha_dental = $('#via_administracion_ficha_dental').val();
        let via_administracion_ficha_dental = $('#via_administracion_ficha_dental option:selected').text();

        let observaciones_medicamento_ficha_dental = $('#observaciones_medicamento_ficha_dental').val();

        let id_periodo_ficha_dental = $('#periodo_ficha_dental').val();
        let periodo_ficha_dental = $('#periodo_ficha_dental option:selected').text();

        let observaciones_periodo_ficha_dental = $('#observaciones_periodo_ficha_dental').val();

        let id_cantidad_comprar = $('#cantidad_comprar').val();
        let cantidad_comprar = $('#cantidad_comprar option:selected').text();

        let otra_cantidad_a_comprar = $('#otra_cantidad_a_comprar').val();


        var lista_med = [];
        $('#tabla_medicamento_cirugia_sdi tr').each(function(i, n) {
            if (i > 0) {
                rol = {};
                var data = $(this).find("td");
                lista_med.push($.trim($(data[0]).text().split("\n").join("")));
            }
        });

        // console.log('indicar_medicamento');
        // console.log('lista_med');
        // console.log(lista_med);

        if($.inArray(id_medicamento,lista_med) == -1)
        {

            var medicamento_uso_cronico = 0;
            if($('#medicamento_uso_cronico').is(':checked'))
                medicamento_uso_cronico = 1;

            var valido = 0;
            var mensaje = '';

            if($.trim(nombre_medicamento_ficha_dental) == '')
            {
                valido = 1;
                mensaje += 'Debe completar el campo Medicamento.\n';
            }

            if($('#id_medicamento_ficha_dental').val() != '')
            {
                if($.trim(dosis_medicamento_ficha_dental) == '' || dosis_medicamento_ficha_dental == 0 || dosis_medicamento_ficha_dental == 'Seleccione una opción' || dosis_medicamento_ficha_dental == 'Seleccione' || dosis_medicamento_ficha_dental == 'Seleccione')
                {
                    valido = 1;
                    mensaje += 'Debe completar el campo Presentación.\n';
                }
                if($.trim(frecuencia_medicamento_ficha_dental) == '' || frecuencia_medicamento_ficha_dental == 0 || frecuencia_medicamento_ficha_dental == 'Seleccione una opción' || frecuencia_medicamento_ficha_dental == 'Seleccione' || frecuencia_medicamento_ficha_dental == 'Seleccione')
                {
                    valido = 1;
                    mensaje += 'Debe completar el campo Posología.\n';
                }
            }
            else
            {
                if( dosis_medicamento_ficha_dental_2 == '')
                {
                    valido = 1;mensaje += 'Debe completar el campo Dosis\n';
                }
                else
                {
                    dosis_medicamento_ficha_dental = dosis_medicamento_ficha_dental_2;
                }
                if( frecuencia_medicamento_ficha_dental_2 == '')
                {
                    valido = 1;mensaje += 'Debe completar el campo Frecuencia\n';
                }
                else
                {
                    frecuencia_medicamento_ficha_dental = frecuencia_medicamento_ficha_dental_2;
                }
            }

            if($.trim(via_administracion_ficha_dental) == '' || via_administracion_ficha_dental == 0 || $.trim(via_administracion_ficha_dental) == 'Seleccione')
            {
                valido = 1;
                mensaje += 'Debe completar el campo Via de Administración.\n';
            }
            else if($('#via_administracion_ficha_dental').val() == 11)
            {
                if( $.trim(observaciones_medicamento_ficha_dental) == '')
                {
                    valido = 1;
                    mensaje += 'Debe ingresar Otra Vía Administración\n';
                }
                else
                {
                    via_administracion_ficha_dental = observaciones_medicamento_ficha_dental;
                }
            }

            if($.trim(periodo_ficha_dental) == '' || periodo_ficha_dental == 0 || $.trim(periodo_ficha_dental) == 'Seleccione')
            {
                valido = 1;
                mensaje += 'Debe completar el campo Periodo.\n';
            }
            else if($('#periodo_ficha_dental').val() == 11)
            {
                if( $.trim(observaciones_periodo_ficha_dental) == '')
                {
                    valido = 1;
                    mensaje += 'Debe ingresar Otro Periodo\n';
                }
                else
                {
                    periodo_ficha_dental = observaciones_periodo_ficha_dental;
                }
            }

            if($.trim(cantidad_comprar) == '' || cantidad_comprar == 0 || $.trim(cantidad_comprar) == 'Seleccione')
            {
                valido = 1;
                mensaje += 'Debe completar el campo Cantidad a Comprar.\n';
            }
            else if($('#cantidad_comprar').val() == '999')
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

            if(valido == 0)
            {
                $('.medicamentos_sin_registros').remove()

                var i = $('#tabla_medicamento_cirugia_sdi tr').length; //contador para asignar id al boton que borrara la fila

                var fila = '<tr class="tabla_medicamento_cirugia_sdi" id="row' + i + '">' +
                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + id_tipo_control + '</td>' +

                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + id_medicamento + '</td>' +
                                '<td class="text-center align-middle text-wrap">' + nombre_medicamento_ficha_dental + '</td>' +
                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + farmaco + '</td>' +

                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + id_dosis_medicamento_ficha_dental + '</td>' +
                                '<td class="text-center align-middle text-wrap">' + dosis_medicamento_ficha_dental + '</td>' +

                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + id_frecuencia_medicamento_ficha_dental + '</td>' +
                                '<td class="text-center align-middle text-wrap">' + frecuencia_medicamento_ficha_dental + '</td>' +

                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + id_via_administracion_ficha_dental + '</td>' +
                                '<td class="text-center align-middle text-wrap">' + via_administracion_ficha_dental + '</td>' +

                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + id_periodo_ficha_dental + '</td>' +
                                '<td class="text-center align-middle text-wrap">' + periodo_ficha_dental + '</td>' +

                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + medicamento_uso_cronico + '</td>' +

                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + id_cantidad_comprar + '</td>' +
                                '<td class="text-center align-middle text-wrap">' + cantidad_comprar + '</td>' +

                                '<td class="text-center align-middle text-wrap"><div name="remove" id="' + i +'" class="btn btn-danger btn_remove" onclick="eliminar_medicamento_sdi(\'row' + i + '\');">Quitar</div></td>'+
                            '</tr>';

                i++;

                $('#tabla_medicamento_cirugia_sdi tr:first').after(fila);

                /** enviando a table de medicamento faltante */
                if($('#id_medicamento_ficha_dental').val() == '')
                {
                    $('#med_faltante').val(nombre_medicamento_ficha_dental);
                    enviar_medicamento_faltante_sdi();
                }

                //$("#adicionados").text(""); //esta instruccion limpia el div adicionados para que no se vayan acumulando
                {{--  var nFilas = $("#tabla_medicamento_cirugia_sdi tr").length;  --}}
                $('#nombre_medicamento_ficha_dental').val('');
                $('id_medicamento_ficha_dental').val('');

                $('#nombre_composicion_farmaco').html('');

                {{--  $('#dosis_medicamento_ficha_dental').html('<option value="0">Seleccione</option>');  --}}
                $('#dosis_medicamento_ficha_dental').val(0);

                {{--  $('#frecuencia_medicamento_ficha_dental').html('<option value="0">Seleccione</option>');  --}}
                $('#frecuencia_medicamento_ficha_dental').val(0);

                $('#dosis_medicamento_ficha_dental_2').val('');
                $('#frecuencia_medicamento_ficha_dental_2').val('');

                $('#via_administracion_ficha_dental').val(0);
                $('#observaciones_medicamento_ficha_dental').val('');
                $('#observaciones_medicamento_ficha_dental').attr('disabled','disabled');

                $('#periodo_ficha_dental').val(0);
                $('#observaciones_periodo_ficha_dental').val('');
                $('#observaciones_periodo_ficha_dental').attr('disabled','disabled');



                $('#cantidad_comprar').val(0);
                $('#otra_cantidad_a_comprar').val('');
                $('#otra_cantidad_a_comprar').attr('disabled','disabled');

                $('#mensaje_med_control').html('');


                $( "#medicamento_uso_cronico" ).prop( "checked", false ).change();
                //$("#adicionados").append(nFilas - 1);
                //$("#sub_tipo_examen").empty();
                //$("#nro_orden").disabled();

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
        else
        {
            swal({
                title: "Ingreso de medicamento(s).",
                text:'El medicamento está Recetado',
                icon: "warning",
                // buttons: "Aceptar",
                //SuccessMode: true,
            });
        }
    }

    function eliminar_medicamento_sdi(id_row)
    {
        $('#tabla_medicamento_cirugia_sdi [id='+id_row+']').remove();
    }

    function enviar_medicamento_faltante_sdi()
    {
        var med_faltante = $.trim($('#med_faltante').val());
        var med_droga = $.trim($('#manual_nombre_composicion_farmaco').val());

        if(med_faltante != '')
        {
            /** registro */
            let url = "{{ route('medicamentoFaltante.registro')}}";


            var _token = CSRF_TOKEN;
            var id_profesional = $('#id_profesional').val();

            $.ajax({

                url: url,
                type: "POST",
                data: {
                    _token: _token,
                    id_profesional: id_profesional,
                    nombre: med_faltante,
                    droga: med_droga,
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
                            title: "Medicamento/Dispositivo Faltante enviado.\n Proximamente se agregará el Medicamento/Dispositivo Faltante en los registros",
                            icon: "success",
                            // buttons: "Aceptar",
                            //SuccessMode: true,
                        });
                        $('#med_faltante').val('');
                        $('#no_existe_switch').prop( "checked", false );
                        $('#no_existe').hide();

                    }
                    else{

                        swal({
                            title: "Problema al Enviar solicitud.",
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
                title: "Debe Indicar el nombre del Medicamento/Dispositivo Faltante.",
                icon: "error",
                // buttons: "Aceptar",
                //SuccessMode: true,
            })
        }

    }

    // function ver_pdf_receta(id_ficha_atencion)
    // {
    //     let url = "{{ route('pdf.receta_medicamentos') }}";
    //     Fancybox.show(
    //         [
    //             {
    //             src: "{{ route('pdf.receta_medicamentos') }}?id_ficha_atencion="+id_ficha_atencion,
    //             type: "iframe",
    //             preload: false,
    //             },
    //         ]
    //     );
    // }
    {{--  METODOS DE RECETA  FIN --}}


    {{--  CARGAR MEDICAMENTOS DE FICHA MEDICA  --}}
    function ver_medicamento_ficha_medica_sdi()
    {

        let url = "{{ route('profesional.receta.ver') }}";

        var _token = CSRF_TOKEN;
        var id_ficha = $('#id_fc').val();
        $('#tabla_medicamento_cirugia_sdi').html('');

        $.ajax({

            url: url,
            type: "GET",
            data: {
                _token: _token,
                id_ficha:id_ficha
            },
        })
        .done(function(data)
        {

            if (data !== 'null')
            {
                //data = JSON.parse(data);
                console.log('----------ver_medicamento_ficha_medica_sdi-------------');
                console.log(data);
                console.log('-----------------------');
                var html = '';
                html += '<thead>';
                html += '    <tr>';
                html += '        <td class="text-center align-middle text-wrap hidden" hidden="hidden">id_tipo_control</td>';
                html += '        <td class="text-center align-middle text-wrap hidden" hidden="hidden">id_producto</td>';
                html += '        <td class="text-center align-middle text-wrap">Medicamentos</td>';
                html += '        <td class="text-center align-middle text-wrap hidden" hidden="hidden">Farmaco</td>';
                html += '        <td class="text-center align-middle text-wrap hidden" hidden="hidden">id_presentacion</td>';
                html += '        <td class="text-center align-middle text-wrap">Presentación</td>';
                html += '        <td class="text-center align-middle text-wrap" hidden="hidden">id_receta_dosis</td>';
                html += '        <td class="text-center align-middle text-wrap hidden">Posología</td>';
                html += '        <td class="text-center align-middle text-wrap hidden" hidden="hidden">id_via_administracion</td>';
                html += '        <td class="text-center align-middle text-wrap">Vía Adm.</td>';
                html += '        <td class="text-center align-middle text-wrap hidden" hidden="hidden">id_periodo</td>';
                html += '        <td class="text-center align-middle text-wrap">Periodo</td>';
                html += '        <td class="text-center align-middle text-wrap hidden" hidden="hidden">uso_cronico</td>';
                html += '        <td class="text-center align-middle text-wrap hidden" hidden="hidden">cantidad_compra</td>';
                html += '        <td class="text-center align-middle text-wrap">Comprar</td>';
                html += '        <th class="text-center align-middle">Eliminar</th>';
                html += '    </tr>';
                html += '</thead>';
                html += '<tbody>';

                if(data.estado == 1)
                {
                    var i = 1;
                    $.each(data.registros, function(index, value)
                    {
                        console.log(value);
                        if(value.detalle.length > 0)
                        {
                            $.each(value.detalle, function(index_2, value_2)
                            {

                                html += '<tr class="tabla_medicamento_cirugia_sdi" id="row' + i + '">';
                                html +=     '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + value_2.id_tipo_control + '</td>';

                                if(value_2.id_tipo_control == 8)
                                {
                                    html +=     '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + value_2.producto + '</td>';

                                    var data= value_2.producto;
                                    arr = $.parseJSON(data);
                                    var text_producto = '';
                                    $.each(arr,function(key,value)
                                    {
                                        text_producto += ''+value.nombre+': '+value.cantidad+'<br/>';
                                    });

                                    html +=     '<td class="text-center align-middle text-wrap">' + text_producto + '</td>';
                                }
                                else
                                {
                                    html +=     '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + value_2.id_producto + '</td>';
                                    html +=     '<td class="text-center align-middle text-wrap">' + value_2.producto + '</td>';
                                }

                                html +=     '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + value_2.farmaco + '</td>';

                                html +=     '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + value_2.id_presentacion + '</td>';
                                html +=     '<td class="text-center align-middle text-wrap">' + value_2.presentacion + '</td>';

                                html +=     '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + value_2.id_receta_dosis + '</td>';
                                html +=     '<td class="text-center align-middle text-wrap">' + value_2.posologia + '</td>';

                                html +=     '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + value_2.id_via_administracion + '</td>';
                                html +=     '<td class="text-center align-middle text-wrap">' + value_2.via_administracion + '</td>';

                                html +=     '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + value_2.id_periodo + '</td>';
                                html +=     '<td class="text-center align-middle text-wrap">' + value_2.periodo + '</td>';

                                html +=     '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + value_2.uso_cronico + '</td>';

                                html +=     '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + value_2.cantidad + '</td>';
                                html +=     '<td class="text-center align-middle text-wrap">' + value_2.cantidad_compra + '</td>';

                                html +=     '<td class="text-center align-middle text-wrap"><div name="remove" id="' + i +'" class="btn btn-danger-light-c btn-xs btn_remove" onclick="eliminar_medicamento_sdi(\'row' + i + '\');">Quitar</div></td>';
                                html += '</tr>';
                                i++;
                            });
                        }
                    });
                }
                else
                {
                    html += '<tr class="medicamentos_sin_registros">';
                    html += '    <td class="text-center align-middle " colspan="15">'+data.msj+'</td>';
                    html += '</tr>';
                }

                html += '</tbody>';

                $('#tabla_medicamento_cirugia_sdi').html(html);
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

    }

    function alerta_registro_medicamento_sdi()
    {

        swal({
            title: "Ingreso de medicamento(s) exitoso.",
            text: "Recuerde 'Guardar Ficha Clínica' para finalizar el proceso.",
            icon: "success",
            // buttons: "Aceptar",
            //SuccessMode: true,
        });
        //alert("ingreso de medicamento(s) exitoso, favor terminar el registro.");
        $('#nombre_medicamento_ficha_dental').val('');
        $('#dosis_medicamento_ficha_dental').val('');
        $('#frecuencia_medicamento_ficha_dental').val('');
        $('#via_administracion_ficha_dental').val('0');
        $('#periodo_ficha_dental').val('0');
    }

    function registrar_medicamentos_ficha_sdi()
    {
        var rows1 = [];
        $('#tabla_medicamento_cirugia_sdi tr').each(function(i, n) {
            if (i > 0) {
                rol = {};
                var data = $(this).find("td");

                rol['id_tipo_control'] = $.trim($(data[0]).text().split("\n").join(""));//id_tipo_control

                rol['id_producto'] = $.trim($(data[1]).text().split("\n").join(""));//id_medicamento
                rol['producto'] = $.trim($(data[2]).text().split("\n").join(""));//nombre_medicamento_ficha_dental
                rol['componente'] = $.trim($(data[3]).text().split("\n").join(""));//nombre_medicamento_ficha_dental

                rol['id_dosis'] = $.trim($(data[4]).text().split("\n").join(""));//id_dosis_medicamento_ficha_dental
                rol['dosis'] = $.trim($(data[5]).text().split("\n").join(""));//dosis_medicamento_ficha_dental

                rol['id_posologia'] = $.trim($(data[6]).text().split("\n").join(""));//id_frecuencia_medicamento_ficha_dental
                rol['posologia'] = $.trim($(data[7]).text().split("\n").join(""));//frecuencia_medicamento_ficha_dental

                rol['id_via_administracion'] = $.trim($(data[8]).text().split("\n").join(""));//id_via_administracion_ficha_dental
                rol['via_administracion'] = $.trim($(data[9]).text().split("\n").join(""));//via_administracion_ficha_dental

                rol['id_periodo'] = $.trim($(data[10]).text().split("\n").join(""));//id_periodo_ficha_dental
                rol['periodo'] = $.trim($(data[11]).text().split("\n").join(""));//periodo_ficha_dental

                rol['uso_cronico'] = $.trim($(data[12]).text().split("\n").join(""));//medicamento_uso_cronico

                rol['cantidad'] = $.trim($(data[13]).text().split("\n").join(""));//id_cantidad_comprar
                rol['cantidad_comprar'] = $.trim($(data[14]).text().split("\n").join(""));//cantidad_comprar

                rows1.push(rol);
            }
        });

        console.log(rows1);

        $('#medicamentos').val(JSON.stringify(rows1));

        let id_profesional = $('#id_profesional_fc').val();
        let id_lugar_atencion = $('#id_lugar_atencion').val();
        let id_paciente = $('#id_paciente_fc').val();
        let id_ficha_atencion = $('#id_fc').val();
        var _token = CSRF_TOKEN;


        // let url = "{{ route('detalle_receta.registro_medicamentos') }}";
        let url = "{{ route('profesional.receta.registro') }}";
        $.ajax({
            url: url,
            type: "post",
            data: {
                _token: _token,
                medicamentos: JSON.stringify(rows1),
                id_ficha: id_ficha_atencion,
                id_ingreso_paciente: '0',
                id_recuperacion: '0',
                id_sala: '0',
                id_profesional: id_profesional,
                id_paciente: id_paciente,
                id_lugar_atencion: id_lugar_atencion,
            },
        })
        .done(function(data) {
            console.log(data)

            if (data != null) {

                {{--  data = JSON.parse(data);  --}}
                console.log(data)

                if(data.falla == '0'){
                    swal({
                        title: "Ingreso de medicamento(s).",
                        text: 'Medicamentos registrados con Exito.',
                        icon: "success",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                }
                else
                {
                    swal({
                        title: "Ingreso de medicamento(s).",
                        text: 'Falla en el registro, Intente nuevamente.',
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                }
            }
            else
            {
                swal({
                    title: "Ingreso de medicamento(s).",
                    text: 'Sin Retorno de Registro, Intente nuevamente.',
                    icon: "error",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                });
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    {{-- MEDICAMENTO MANUAL --}}
    function validar_via_administracion_manual_sdi()
    {
        if($('#manual_via_administracion_ficha_dental').val() == 11)
        {
            $('#div_manual_observaciones_via_administracion_ficha_dental').show();
            $('#manual_observaciones_via_administracion_ficha_dental').removeAttr('disabled');
        }
        else
        {
            $('#div_manual_observaciones_via_administracion_ficha_dental').hide();
            $('#manual_observaciones_via_administracion_ficha_dental').attr('disabled','disabled');
            $('#manual_observaciones_via_administracion_ficha_dental').val('');
        }
    }

    function validar_periodo_manual_sdi()
    {
        if($('#manual_periodo_ficha_dental').val() == 11)
        {
            $('#div_manual_observaciones_periodo_ficha_dental').show();
            $('#manual_observaciones_periodo_ficha_dental').removeAttr('disabled');
        }
        else
        {
            $('#div_manual_observaciones_periodo_ficha_dental').hide();
            $('#manual_observaciones_periodo_ficha_dental').attr('disabled','disabled');
            $('#manual_observaciones_periodo_ficha_dental').val('');
        }
    }

    function indicar_medicamento_manual_sdi()
    {

        let nombre_medicamento_ficha_dental = $('#manual_nombre_medicamento_ficha_dental').val();
        let id_medicamento = $('#manual_id_medicamento_ficha_dental').val();
        let farmaco = $('#manual_nombre_composicion_farmaco').val();
        let tipo_control = $('#manual_tipo_control').val();

        let dosis_medicamento_ficha_dental = $('#manual_dosis_medicamento_ficha_dental').val();
        let frecuencia_medicamento_ficha_dental = $('#manual_frecuencia_medicamento_ficha_dental').val();

        let cantidad_comprar = $('#manual_cantidad_comprar').val();
        let cantidad_numero_comprar = $('#manual_cantidad_numero').val();

        let id_via_administracion_ficha_dental = $('#manual_via_administracion_ficha_dental').val();
        let via_administracion_ficha_dental = $('#manual_via_administracion_ficha_dental option:selected').text();

        let observaciones_medicamento_ficha_dental = $('#manual_observaciones_via_administracion_ficha_dental').val();

        let id_periodo_ficha_dental = $('#manual_periodo_ficha_dental').val();
        let periodo_ficha_dental = $('#manual_periodo_ficha_dental option:selected').text();

        let observaciones_periodo_ficha_dental = $('#manual_observaciones_periodo_ficha_dental').val();



        var lista_med = [];
        $('#tabla_medicamento_cirugia_sdi tr').each(function(i, n) {
            if (i > 0) {
                rol = {};
                var data = $(this).find("td");
                lista_med.push($.trim($(data[2]).text().split("\n").join("")));
            }
        });

        if($.inArray(nombre_medicamento_ficha_dental,lista_med) == -1)
        {

            var medicamento_uso_cronico = 0;
            if($('#manual_medicamento_uso_cronico').is(':checked'))
                medicamento_uso_cronico = 1;

            var valido = 0;
            var mensaje = '';

            if($.trim(nombre_medicamento_ficha_dental) == '')
            {
                valido = 1;
                mensaje += 'Debe completar el campo Medicamento.\n';
            }

            if($.trim(tipo_control) == '0')
            {
                valido = 1;
                mensaje += 'Debe completar el campo Tipo Control.\n';
            }

            if($.trim(farmaco) == '')
            {
                valido = 1;
                mensaje += 'Debe completar el campo Farmaco.\n';
            }

            if($.trim(dosis_medicamento_ficha_dental) == '')
            {
                valido = 1;
                mensaje += 'Debe completar el campo Presentación.\n';
            }

            if($.trim(frecuencia_medicamento_ficha_dental) == '')
            {
                valido = 1;
                mensaje += 'Debe completar el campo Posología.\n';
            }


            if($.trim(via_administracion_ficha_dental) == '' || via_administracion_ficha_dental == 0 || $.trim(via_administracion_ficha_dental) == 'Seleccione')
            {
                valido = 1;
                mensaje += 'Debe completar el campo Via de Administración.\n';
            }
            else if($('#via_administracion_ficha_dental').val() == 11)
            {
                if( $.trim(observaciones_medicamento_ficha_dental) == '')
                {
                    valido = 1;
                    mensaje += 'Debe ingresar Otra Vía Administración\n';
                }
                else
                {
                    via_administracion_ficha_dental = observaciones_medicamento_ficha_dental;
                }
            }

            if($.trim(periodo_ficha_dental) == '' || periodo_ficha_dental == 0 || $.trim(periodo_ficha_dental) == 'Seleccione')
            {
                valido = 1;
                mensaje += 'Debe completar el campo Periodo.\n';
            }
            else if($('#periodo_ficha_dental').val() == 11)
            {
                if( $.trim(observaciones_periodo_ficha_dental) == '')
                {
                    valido = 1;
                    mensaje += 'Debe ingresar Otro Periodo\n';
                }
                else
                {
                    periodo_ficha_dental = observaciones_periodo_ficha_dental;
                }
            }

            if($.trim(cantidad_comprar) == '')
            {
                valido = 1;
                mensaje += 'Debe completar el campo Cantidad a Comprar.\n';
            }
            else
            {
                const regex = /\(\d+\) \w+ \w+/g;
                if (!regex.test(cantidad_comprar))
                {
                    console.log('no cuadra');
                    valido = 1;
                    mensaje += 'El campo de Cantidad a Comprar no tiene el formato adecuado\n Ejemplo: (1) Una Caja.\n';
                }
                else
                {
                    console.log('correcto');
                }
            }

            if(valido == 0)
            {
                $('.medicamentos_sin_registros').remove()

                var i = $('#tabla_medicamento_cirugia_sdi tr').length; //contador para asignar id al boton que borrara la fila


                // var text = cantidad_comprar;
                // var inicio = text.indexOf('(')+1;
                // var fin = text.indexOf(')');
                // var cantidad_num = text.substring(inicio, fin);


                var fila = '<tr class="tabla_medicamento_cirugia_sdi" id="row' + i + '">' +
                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + tipo_control + '</td>' +

                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + id_medicamento + '</td>' +
                                '<td class="text-center align-middle text-wrap">' + nombre_medicamento_ficha_dental + '</td>' +
                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + farmaco + '</td>' +

                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">0</td>' +
                                '<td class="text-center align-middle text-wrap">' + dosis_medicamento_ficha_dental + '</td>' +

                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">0</td>' +
                                '<td class="text-center align-middle text-wrap">' + frecuencia_medicamento_ficha_dental + '</td>' +

                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + id_via_administracion_ficha_dental + '</td>' +
                                '<td class="text-center align-middle text-wrap">' + via_administracion_ficha_dental + '</td>' +

                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + id_periodo_ficha_dental + '</td>' +
                                '<td class="text-center align-middle text-wrap">' + periodo_ficha_dental + '</td>' +

                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + medicamento_uso_cronico + '</td>' +

                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + cantidad_numero_comprar + '</td>' +
                                '<td class="text-center align-middle text-wrap">' + cantidad_comprar + '</td>' +

                                '<td class="text-center align-middle text-wrap"><div name="remove" id="' + i +'" class="btn btn-danger btn_remove" onclick="eliminar_medicamento_sdi(\'row' + i + '\');">Quitar</div></td>'+
                            '</tr>';

                i++;

                $('#tabla_medicamento_cirugia_sdi tr:first').after(fila);

                /** enviando a table de medicamento faltante */
                if($('#id_medicamento_ficha_dental').val() == '')
                {
                    $('#med_faltante').val(nombre_medicamento_ficha_dental);
                    enviar_medicamento_faltante_sdi();
                }


                $('#manual_nombre_medicamento_ficha_dental').val('');
                $('#manual_id_medicamento_ficha_dental').val('');
                $('#manual_nombre_composicion_farmaco').val('');
                $('#manual_dosis_medicamento_ficha_dental').val('');
                $('#manual_frecuencia_medicamento_ficha_dental').val('');
                $('#manual_cantidad_comprar').val('');
                $('#manual_via_administracion_ficha_dental').val(0);
                $('#manual_observaciones_via_administracion_ficha_dental').val('');
                $('#manual_periodo_ficha_dental').val(0);
                $('#manual_observaciones_periodo_ficha_dental').val('');

                $( "#medicamento_uso_cronico" ).prop( "checked", false ).change();

            }
            else
            {
                swal({
                    title: "Ingreso de medicamento(s).",
                    text: mensaje,
                    icon: "error",
                });
            }
        }
        else
        {
            swal({
                title: "Ingreso de medicamento(s).",
                text:'El medicamento está Recetado',
                icon: "warning",
                // buttons: "Aceptar",
                //SuccessMode: true,
            });
        }
    }

    function indicar_medicamento_magistral_sdi()
    {

        let id_medicamento = 0;
        let farmaco = '';

        let tipo_control = $('#magistral_tipo_control').val();

        let dosis_medicamento_ficha_dental = $('#magistral_dosis_medicamento_ficha_dental').val();
        let frecuencia_medicamento_ficha_dental = $('#magistral_frecuencia_medicamento_ficha_dental').val();

        let id_via_administracion_ficha_dental = $('#magistral_via_administracion_ficha_dental').val();
        let via_administracion_ficha_dental = $('#magistral_via_administracion_ficha_dental option:selected').text();

        let observaciones_medicamento_ficha_dental = $('#magistral_observaciones_via_administracion_ficha_dental').val();

        let id_periodo_ficha_dental = $('#magistral_periodo_ficha_dental').val();
        let periodo_ficha_dental = $('#magistral_periodo_ficha_dental option:selected').text();
        let observaciones_periodo_ficha_dental = $('#magistral_observaciones_periodo_ficha_dental').val();

        let cantidad_comprar = $('#magistral_cantidad_comprar').val();
        // $('#magistral_medicamento_uso_cronico').val();

        var lista_med = [];
        $('#tabla_medicamento_cirugia_sdi tr').each(function(i, n) {
            if (i > 0) {
                rol = {};
                var data = $(this).find("td");
                lista_med.push($.trim($(data[2]).text().split("\n").join("")));
            }
        });

        var array_med = [];
        var text_med = '';
        $('.componente').each(function(key, elemento)
        {
            var nombre = $(elemento).find( '#magistral_nombre_medicamento_ficha_dental' ).val();
            var cantidad = $(elemento).find( '#magistral_cantidad_medicamento_ficha_dental' ).val();

            if(nombre == '' || cantidad == '')
            {
                valido = 1;
                mensaje += 'Debe completar de forma correcto los Compuestos o Cantidades.\n';
            }

            array_med.push( {'nombre':nombre, 'cantidad':cantidad } );
            text_med += ''+nombre+':'+cantidad+'<br>';
        });


        if($.inArray(text_med,lista_med) == -1)
        {

            var medicamento_uso_cronico = 0;
            if($('#magistral_medicamento_uso_cronico').is(':checked'))
                medicamento_uso_cronico = 1;

            var valido = 0;
            var mensaje = '';

            if($.trim(tipo_control) == '')
            {
                valido = 1;
                mensaje += 'Debe seleccionar el Tipo de Control.\n';
            }

            if($.trim(dosis_medicamento_ficha_dental) == '')
            {
                valido = 1;
                mensaje += 'Debe completar el campo Presentación.\n';
            }

            if($.trim(frecuencia_medicamento_ficha_dental) == '')
            {
                valido = 1;
                mensaje += 'Debe completar el campo Posología.\n';
            }

            if($.trim(via_administracion_ficha_dental) == '' || via_administracion_ficha_dental == 0 || $.trim(via_administracion_ficha_dental) == 'Seleccione')
            {
                valido = 1;
                mensaje += 'Debe completar el campo Via de Administración.\n';
            }
            else if($('#via_administracion_ficha_dental').val() == 11)
            {
                if( $.trim(observaciones_medicamento_ficha_dental) == '')
                {
                    valido = 1;
                    mensaje += 'Debe ingresar Otra Vía Administración\n';
                }
                else
                {
                    via_administracion_ficha_dental = observaciones_medicamento_ficha_dental;
                }
            }

            if($.trim(periodo_ficha_dental) == '' || periodo_ficha_dental == 0 || $.trim(periodo_ficha_dental) == 'Seleccione')
            {
                valido = 1;
                mensaje += 'Debe completar el campo Periodo.\n';
            }
            else if($('#magistral_periodo_ficha_dental').val() == 11)
            {
                if( $.trim(observaciones_periodo_ficha_dental) == '')
                {
                    valido = 1;
                    mensaje += 'Debe ingresar Otro Periodo\n';
                }
                else
                {
                    periodo_ficha_dental = observaciones_periodo_ficha_dental;
                }
            }

            if($.trim(cantidad_comprar) == '')
            {
                valido = 1;
                mensaje += 'Debe completar el campo Cantidad a Comprar.\n';
            }
            else
            {
                // const regex = /\(\d+\) \w+ \w+/g;
                // if (!regex.test(cantidad_comprar))
                // {
                //     console.log('no cuadra');
                //     valido = 1;
                //     mensaje += 'El campo de Cantidad a Comprar no tiene el formato adecuado\n Ejemplo: (1) Una Caja.\n';
                // }
                // else
                // {
                //     console.log('correcto');
                // }
            }

            if(valido == 0)
            {
                $('.medicamentos_sin_registros').remove()

                var i = $('#tabla_medicamento_cirugia_sdi tr').length; //contador para asignar id al boton que borrara la fila

                // var text = cantidad_comprar;
                // var inicio = text.indexOf('(')+1;
                // var fin = text.indexOf(')');
                // var cantidad_num = text.substring(inicio, fin);

                var fila = '<tr class="tabla_medicamento_cirugia_sdi" id="row' + i + '">' +
                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + tipo_control + '</td>' +

                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + JSON.stringify(array_med) + '</td>' +
                                '<td class="text-center align-middle text-wrap">' + text_med + '</td>' +
                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden"></td>' +

                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">0</td>' +
                                '<td class="text-center align-middle text-wrap">' + dosis_medicamento_ficha_dental + '</td>' +

                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">0</td>' +
                                '<td class="text-center align-middle text-wrap">' + frecuencia_medicamento_ficha_dental + '</td>' +

                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + id_via_administracion_ficha_dental + '</td>' +
                                '<td class="text-center align-middle text-wrap">' + via_administracion_ficha_dental + '</td>' +

                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + id_periodo_ficha_dental + '</td>' +
                                '<td class="text-center align-middle text-wrap">' + periodo_ficha_dental + '</td>' +

                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + medicamento_uso_cronico + '</td>' +

                                '<td class="text-center align-middle text-wrap hidden" hidden="hidden">1</td>' +
                                '<td class="text-center align-middle text-wrap">' + cantidad_comprar + '</td>' +

                                '<td class="text-center align-middle text-wrap"><div name="remove" id="' + i +'" class="btn btn-danger btn_remove" onclick="eliminar_medicamento_sdi(\'row' + i + '\');">Quitar</div></td>'+
                            '</tr>';

                i++;

                console.log(fila);

                $('#tabla_medicamento_cirugia_sdi tr:first').after(fila);

                var html_comp = '';
                html_comp += '<div class="form-row componente">';
                html_comp += '    <div class="col-sm-8 mt-6">';
                html_comp += '        <div class="form-group">';
                html_comp += '            <label class="floating-label-activo-sm">Ingrese los Compuestos</label>';
                html_comp += '            <input class="form-control form-control-sm" type="text" name="magistral_nombre_medicamento_ficha_dental" id="magistral_nombre_medicamento_ficha_dental" value="">';
                html_comp += '        </div>';
                html_comp += '    </div>';
                html_comp += '    <div class="col-sm-4 mt-6">';
                html_comp += '        <div class="form-group">';
                html_comp += '            <label class="floating-label-activo-sm">Ingrese la cantidad</label>';
                html_comp += '            <input class="form-control form-control-sm" type="text" name="magistral_cantidad_medicamento_ficha_dental" id="magistral_cantidad_medicamento_ficha_dental" value="">';
                html_comp += '        </div>';
                html_comp += '    </div>';
                html_comp += '</div>';

                $('.div_componentes').html('');
                $('.div_componentes').html(html_comp);

                $('#magistral_tipo_control').val('8');
                $('#magistral_dosis_medicamento_ficha_dental').val('');
                $('#magistral_frecuencia_medicamento_ficha_dental').val('');
                $('#magistral_via_administracion_ficha_dental').val('');
                $('#magistral_observaciones_via_administracion_ficha_dental').val('');
                $('#magistral_periodo_ficha_dental').val('');
                $('#magistral_observaciones_periodo_ficha_dental').val('');
                $('#magistral_cantidad_comprar').val('');

                $( "#magistral_medicamento_uso_cronico" ).prop( "checked", false ).change();

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
        else
        {
            swal({
                title: "Ingreso de medicamento(s).",
                text:'El medicamento está Recetado',
                icon: "warning",
                // buttons: "Aceptar",
                //SuccessMode: true,
            });
        }
    }

    function agregar_componente()
    {
        var cant = $('.componente').length+1;
        var html = '';
        html += '<div class="form-row componente">';
        html += '    <div class="col-sm-8 mt-6">';
        html += '        <div class="form-group">';
        html += '            <label class="floating-label-activo-sm">Ingrese los Compuestos</label>';
        html += '            <input class="form-control form-control-sm" type="text" name="magistral_nombre_medicamento_ficha_dental" id="magistral_nombre_medicamento_ficha_dental" value="">';
        html += '        </div>';
        html += '    </div>';
        html += '    <div class="col-sm-4 mt-6">';
        html += '        <div class="form-group">';
        html += '            <label class="floating-label-activo-sm">Ingrese la cantidad</label>';
        html += '            <input class="form-control form-control-sm" type="text" name="magistral_cantidad_medicamento_ficha_dental" id="magistral_cantidad_medicamento_ficha_dental" value="">';
        html += '        </div>';
        html += '    </div>';
        html += '</div>';

        $('.div_componentes').append(html);
    }

    function cargarCantidadComprar(cantidad, unidad, input)
    {
        var valor = $('#'+cantidad).val();
        var valor_text = $('#'+cantidad+' option:selected').text();
        var unid = $('#'+unidad).val();
        $('#'+input).val(valor_text+' '+unid);
        $('#'+input+'_label').html(valor_text+' '+unid);
    }

</script>

