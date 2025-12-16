
<!--EXAMEN MÉDICO URGENCIA - DETALLES-->
<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card-a">
        <div class="card-header-a" id="med_urgen">
            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#evol_med_urgencia" aria-expanded="false" aria-controls="evol_med_urgencia">
                Atención Médica Urgencia 
            </button>
        </div>
        <div id="evol_med_urgencia" class="collapse" aria-labelledby="med_urgen" data-parent="#med_urgen">
            <div class="card-body-aten-a">
                <div id="form-orl-adulto">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <ul class="nav nav-tabs-aten nav-fill mb-10" id="med_urgen" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset active" id="urg_ex_ingreso_tab" data-toggle="tab" href="#urg_ex_ingreso" role="tab" aria-controls="urg_ex_ingreso" aria-selected="true">Examen Ingreso</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="receta_urg-tab" data-toggle="tab" href="#receta_urg" role="tab" aria-controls="receta_urg" aria-selected="true">Receta e Indicaciones</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="sol_examenes_urg-tab" data-toggle="tab" href="#sol_examenes_urg" role="tab" aria-controls="sol_examenes_urg" aria-selected="true">Sol. Exámenes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="urg_dest_ind-tab" data-toggle="tab" href="#urg_dest_ind" role="tab" aria-controls="urg_dest_ind" aria-selected="true">Destino-indicaciones</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="tab-content" id="med_urgen">
                                <!--INGRESO-->
                                <div class="tab-pane fade show active" id="urg_ex_ingreso" role="tabpanel" aria-labelledby="urg_ex_ingreso_tab">
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-2">
                                            <h6 class="t-aten">Examen ingreso</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="floating-label-activo-sm" for="motivo">Motivo de consulta</label>
                                            <input type="text" class="form-control form-control-sm" name="motivo" id="motivo">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="floating-label-activo-sm" for="antecedentes">Aproximación Gravedad/Sospecha diagnóstica</label>
                                            <input type="text" class="form-control form-control-sm" name="antecedentes" id="antecedentes">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <label class="floating-label-activo-sm" for="examen_fisico">Examen Físico </label>
                                            <textarea class="form-control caja-texto form-control-sm mb-9"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="examen_fisico" id="examen_fisico" placeholder="EXAMEN FISICO Y PRUEBAS DIAGNÓSTICAS"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <label class="floating-label-activo-sm" for="examen_fisico">Otras Indicaciones</label>
                                            <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="examen_fisico" id="examen_fisico" placeholder="INDICACIONES GENERALES"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!--RECETARIO-->
                                <div class="tab-pane fade show" id="receta_urg" role="tabpanel" aria-labelledby="receta_urg_tab">
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
                                                    <a class="nav-link-wizard" id="otras_indic_tab" data-toggle="pill" href="#otras_indic" role="tab" aria-controls="otras_indic" aria-selected="true" toogle="true" tooltip="No encontró medicamento">Otras Indicaciones</a>
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
                                                        {{--  <div class="col-sm-6 mt-2">
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
                                                        </div>  --}}
                                                        {{-- cantidad de medicamento a despachar o comprar    --}}
                                                        {{--  <div class="col-sm-6 mt-2">
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
                                                        </div>  --}}
                                                        <div class="col-sm-12">
                                                            <div class="row">
                                                                {{--  <div class="col-sm-6">
                                                                    <div class="form-group mb-1">
                                                                        <label><strong>Uso Crónico</strong></label>
                                                                        <div class="switch switch-success d-inline m-r-10">
                                                                            <input type="checkbox" id="medicamento_uso_cronico">
                                                                            <label for="medicamento_uso_cronico" class="cr"></label>
                                                                        </div>
                                                                        <div class="alert-primary" id="mensaje_uso_cronico" style="display:none;">Acaba de seleccionar medicamento como USO CRÓNICO </div>
                                                                    </div>
                                                                </div>  --}}
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
                                                                    {{--  @if($receta_control)
                                                                        @foreach ($receta_control as $control)
                                                                            @if($control->cod_control !== 8)
                                                                                <option value="{{ $control->cod_control }}">{{ $control->descripcion }}</option>
                                                                            @endif
                                                                        @endforeach
                                                                    @endif  --}}
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

                                                        {{--  <div class="col-sm-3 mt-2">
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
                                                        </div>  --}}

                                                        {{--  <input type="hidden" id="manual_cantidad_comprar" name="manual_cantidad_comprar" value="">  --}}

                                                        {{--  <div class="col-sm-3  mt-2">
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
                                                        </div>  --}}

                                                        {{--  <div class="col-sm-3  mt-2">
                                                            <label class="floating-label-activo-sm">Presentación</label>
                                                            <select name="manual_cantidad_tipo_unidad" id="manual_cantidad_tipo_unidad" class="form-control form-control-sm" onchange="cargarCantidadComprar('manual_cantidad_numero', 'manual_cantidad_tipo_unidad', 'manual_cantidad_comprar')">
                                                                <option value="Ampolla(s)">Ampolla(s)</option>
                                                                <option value="Caja(s)">Caja(s)</option>
                                                                <option value="Franco(s)">Frasco(s)</option>
                                                                <option value="Unidad(es)">Unidad(es)</option>
                                                            </select>
                                                        </div>  --}}
                                                        {{--  <div class="col-sm-3  mt-2">
                                                            <label id="manual_cantidad_comprar_label"></label>
                                                        </div>  --}}

                                                        <div class="col-sm-12">
                                                            <div class="row">
                                                                {{--  <div class="col-sm-6">
                                                                    <div class="form-group mb-1">
                                                                        <label><strong>Uso Crónico</strong></label>
                                                                        <div class="switch switch-success d-inline m-r-10">
                                                                            <input type="checkbox" id="manual_medicamento_uso_cronico">
                                                                            <label for="manual_medicamento_uso_cronico" class="cr"></label>
                                                                        </div>
                                                                        <div class="alert-primary" id="manual_mensaje_uso_cronico" style="display:none;">Acaba de seleccionar medicamento como USO CRÓNICO </div>
                                                                    </div>
                                                                </div>  --}}
                                                                <div class="col-sm-6">
                                                                    <button type="button" onclick="indicar_medicamento_manual_sdi()"
                                                                        class="btn btn-success btn-sm float-right"><i class="fa fa-plus"></i> Agregar Medicamento Manual</button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade show" id="otras_indic" role="tabpanel" aria-labelledby="otras_indic_tab">
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 mt-2">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm" for="ind_med_urg" >Vías y Cateter</label>
                                                                <select name="ind_med_urg" id="ind_med_urg" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ind_med_urg','div_ind_med_urg','obs_ind_med_urg',5);">
                                                                    <option selected  value="1">Cateter o vía venosa periférica</option>
                                                                    <option value="2">Cateter venoso central</option>
                                                                    <option value="3">Catéter subcutáneo</option>
                                                                    <option value="4">otra </option>
                                                                    <option value="5">Otra Indicación</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group" id="div_ind_med_urg" style="display:none;">
                                                                <label class="floating-label-activo-sm" for="obs_b_com">Descripción <i>Otra Indicación</i></label>
                                                                <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_ind_med_urg" id="obs_ind_med_urg"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 mt-2">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm" for="ind_proc_urg" >Curaciones</label>
                                                                <select name="ind_proc_urg" id="ind_proc_urg" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ind_proc_urg','div_ind_proc_urg','obs_ind_proc_urg',9);">
                                                                    <option selected  value="1">Retiro de puntos</option>
                                                                    <option value="2">Curación simple</option>
                                                                    <option value="3">Curación Avanzada</option>
                                                                    <option value="4">Curación c/afrontamiento</option>
                                                                    <option value="5">Sutura</option>
                                                                    <option value="9">Otra Indicación</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group" id="div_ind_proc_urg" style="display:none;">
                                                                <label class="floating-label-activo-sm" for="obs_b_com">Descripción <i>Otra Indicación</i></label>
                                                                <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_ind_proc_urg" id="obs_ind_proc_urg"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 mt-2">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm" for="ind_proc_urg" >Sondas y procedimientos</label>
                                                                <select name="ind_proc_urg" id="ind_proc_urg" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ind_proc_urg','div_ind_proc_urg','obs_ind_proc_urg',9);">
                                                                    <option selected  value="1">Sonda folley con medición de diuresis</option>
                                                                    <option value="2">Sonda folley sin medición de diuresis</option>
                                                                    <option value="3">Sonda folley con irrigación vesical</option>
                                                                    <option value="4">Cateterismo vesical</option>
                                                                    <option value="5">Sonda Nasogástrica</option>
                                                                    <option value="5">Sonda Nasogástrica con lavado gástrico</option>
                                                                    <option value="5">Sonda Nasogástrica medición de contenido</option>
                                                                    <option value="6">otra</option>
                                                                    <option value="7">otra</option>
                                                                    <option value="8">otra</option>
                                                                    <option value="9">Otra </option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group" id="div_ind_proc_urg" style="display:none;">
                                                                <label class="floating-label-activo-sm" for="obs_b_com">Descripción <i>Otra Indicación</i></label>
                                                                <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_ind_proc_urg" id="obs_ind_proc_urg"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 mt-2">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm" for="ind_inmmed_urg" >Inmovilización</label>
                                                                <select name="ind_inmmed_urg" id="ind_inmmed_urg" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ind_inmmed_urg','div_ind_inmmed_urg','obs_ind_inmmed_urg',9);">
                                                                    <option selected  value="1">Vendaje en 8</option>
                                                                    <option value="2">Cabestrillo</option>
                                                                    <option value="3">Férula</option>
                                                                    <option value="4">Vendaje Compresivo</option>
                                                                    <option value="5">Valva de yeso braquiopalmar</option>
                                                                    <option value="6">Valva de yeso antebraquiopalmar</option>
                                                                    <option value="7">yeso bota larga</option>
                                                                    <option value="8">yeso bota corta</option>
                                                                    <option value="9">Otra Inmovilización</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group" id="div_ind_inmmed_urg" style="display:none;">
                                                                <label class="floating-label-activo-sm" for="obs_b_com">Descripción <i>Otra Indicación</i></label>
                                                                <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_ind_inmmed_urg" id="obs_ind_inmmed_urg"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 mt-2">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm" for="ind_inmmed_urg" >Control de ciclo</label>
                                                                <select name="ind_inmmed_urg" id="ind_inmmed_urg" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ind_inmmed_urg','div_ind_inmmed_urg','obs_ind_inmmed_urg',9);">
                                                                    <option selected  value="1">Vendaje en 8</option>
                                                                    <option value="2">Cabestrillo</option>
                                                                    <option value="3">Férula</option>
                                                                    <option value="4">Vendaje Compresivo</option>
                                                                    <option value="5">Valva de yeso braquiopalmar</option>
                                                                    <option value="6">Valva de yeso antebraquiopalmar</option>
                                                                    <option value="7">yeso bota larga</option>
                                                                    <option value="8">yeso bota corta</option>
                                                                    <option value="9">Otra Inmovilización</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group" id="div_ind_inmmed_urg" style="display:none;">
                                                                <label class="floating-label-activo-sm" for="obs_b_com">Descripción <i>Otra Indicación</i></label>
                                                                <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_ind_inmmed_urg" id="obs_ind_inmmed_urg"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 mt-2">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm" for="ind_inmmed_urg" >Preparar para</label>
                                                                <select name="ind_inmmed_urg" id="ind_inmmed_urg" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ind_inmmed_urg','div_ind_inmmed_urg','obs_ind_inmmed_urg',9);">
                                                                    <option selected  value="1">Cirugía</option>
                                                                    <option value="2">Traslado</option>
                                                                    <option value="3">etc</option>
                                                                    <option value="4">etc</option>
                                                                    <option value="5">Valva de yeso braquiopalmar</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group" id="div_ind_inmmed_urg" style="display:none;">
                                                                <label class="floating-label-activo-sm" for="obs_b_com">Descripción <i>Otra Indicación</i></label>
                                                                <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_ind_inmmed_urg" id="obs_ind_inmmed_urg"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 mt-2">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Vigilar Signos de Alerta</label>
                                                                <input type="text" id="manual_nombre_composicion_farmaco" name="manual_nombre_composicion_farmaco" class="form-control form-control-sm">
                                                            </div>
                                                        </div>
{{--
                                                        <div class="col-sm-6 mt-2">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Tipo Control</label>
                                                                <select name="manual_tipo_control" id="manual_tipo_control" class="form-control form-control-sm">
                                                                    <option value="">Seleccione</option>
                                                                    {{--  @if($receta_control)
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
                                                        </div>  --}}

                                                        {{--  <div class="col-sm-3 mt-2">
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
                                                        </div>  --}}

                                                        {{--  <input type="hidden" id="manual_cantidad_comprar" name="manual_cantidad_comprar" value="">  --}}

                                                        {{--  <div class="col-sm-3  mt-2">
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
                                                        </div>  --}}

                                                        {{--  <div class="col-sm-3  mt-2">
                                                            <label class="floating-label-activo-sm">Presentación</label>
                                                            <select name="manual_cantidad_tipo_unidad" id="manual_cantidad_tipo_unidad" class="form-control form-control-sm" onchange="cargarCantidadComprar('manual_cantidad_numero', 'manual_cantidad_tipo_unidad', 'manual_cantidad_comprar')">
                                                                <option value="Ampolla(s)">Ampolla(s)</option>
                                                                <option value="Caja(s)">Caja(s)</option>
                                                                <option value="Franco(s)">Frasco(s)</option>
                                                                <option value="Unidad(es)">Unidad(es)</option>
                                                            </select>
                                                        </div>  --}}
                                                        {{--  <div class="col-sm-3  mt-2">
                                                            <label id="manual_cantidad_comprar_label"></label>
                                                        </div>  --}}

                                                        <div class="col-sm-12">
                                                            <div class="row">
                                                                {{--  <div class="col-sm-6">
                                                                    <div class="form-group mb-1">
                                                                        <label><strong>Uso Crónico</strong></label>
                                                                        <div class="switch switch-success d-inline m-r-10">
                                                                            <input type="checkbox" id="manual_medicamento_uso_cronico">
                                                                            <label for="manual_medicamento_uso_cronico" class="cr"></label>
                                                                        </div>
                                                                        <div class="alert-primary" id="manual_mensaje_uso_cronico" style="display:none;">Acaba de seleccionar medicamento como USO CRÓNICO </div>
                                                                    </div>
                                                                </div>  --}}
                                                                <div class="col-sm-6">
                                                                    <button type="button" onclick="indicar_indicacion_sdi()"
                                                                        class="btn btn-success btn-sm float-right"><i class="fa fa-plus"></i> Agregar Indicación</button>
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
                                                                <table id="tabla_medicamento_cirugia_sdi" class="table table-bordered table-xs">
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
                                                                            {{--  <td class="text-center align-middle text-wrap hidden" hidden="hidden">id_periodo</td>
                                                                            <td class="text-center align-middle text-wrap">Periodo</td>
                                                                            <td class="text-center align-middle text-wrap hidden" hidden="hidden">uso_cronico</td>
                                                                            <td class="text-center align-middle text-wrap hidden" hidden="hidden">cantidad_compra</td>
                                                                            <td class="text-center align-middle text-wrap">Comprar</td>  --}}
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
                                                            <button type="button" onclick="registrar_medicamentos_ficha_sdi();" data-dismiss="modal" class="btn btn-info">Generar Indicaciones</button>
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
                                                                    <select class="form-control form-control-sm" id="" name="">
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
                                <!--SOL EXÁMENES-->
                                <div class="tab-pane fade show" id="sol_examenes_urg" role="tabpanel" aria-labelledby="sol_examenes_urg-tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="modal-body">

                                                    <div class="form-row">
                                                        <div class="col-sm-12 mt-2">
                                                            <div class="form-group fill">
                                                                <label class="floating-label">Tipo Examen</label>

                                                                <select class="form-control form-control-sm" name="tipo_examen" id="tipo_examen">
                                                                    <option value="0">Seleccione</option>
                                                                    @foreach ($examenMedico as $exa)
                                                                        <option value="{{ $exa->cod_examen }}">
                                                                            {{ $exa->nombre_examen }}</option>
                                                                    @endforeach

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 mt-2">
                                                            <div class="form-group fill">
                                                                <label class="floating-label-activo-sm">Sub-tipo de Examen</label>

                                                                <select class="form-control form-control-sm" name="sub_tipo_examen" id="sub_tipo_examen">
                                                                    <option value="">Seleccione</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 mt-2">
                                                            <div class="form-group fill">
                                                                <label class="floating-label-activo-sm">Examen</label>
                                                                <select class="form-control form-control-sm" name="examen" id="examen">
                                                                    <option value="">Seleccione</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 mt-2">
                                                            <div class="form-group fill">
                                                                <label class="floating-label">Lado</label>
                                                                <select class="form-control form-control-sm" id="lado" name="lado">
                                                                    <option value="0" selected>Seleccione</option>
                                                                    <option value="Derecho">Derecho</option>
                                                                    <option value="Izquierdo">Izquierdo</option>
                                                                    <option value="Bilateral">Bilateral</option>
                                                                    <option value="N/C">No corresponde</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6 mt-2">
                                                            <div class="form-group fill">
                                                                <label class="floating-label">Prioridad</label>
                                                                <select class="form-control form-control-sm" id="prioridad" name="prioridad">
                                                                    <option value="0">Seleccione</option>
                                                                    <option value="1">Baja</option>
                                                                    <option value="2" selected>Media</option>
                                                                    <option value="3">Alta</option>
                                                                    <option value="4">Urgente</option>
                                                                </select>
                                                            </div>
                                                        </div>


                                                        <div class="col-sm-12 mt-3">
                                                            <div class="form-group mb-1">
                                                                <label><strong>Con Contraste</strong></label>
                                                                <div class="switch switch-success d-inline m-r-10">
                                                                    <input type="checkbox" id="imagenologia_con_contraste" disabled='disabled' >
                                                                    <label for="imagenologia_con_contraste" class="cr"></label>
                                                                </div>
                                                                <div class="alert-primary" id="mensaje_imagenologia_con_contraste" style="display:none;">Acaba de seleccionar Imagen con Constraste, El examen de Creatinina fue adjuntado correctamente.</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <button type="button" onclick="indicar_examen_cirugia();" id="agregar_examen_tabla" class="btn btn-success btn-sm float-right">
                                                                <i lass="fa fa-plus"></i> Agregar Examen
                                                            </button>
                                                        </div>
                                                        <div class="col-sm-12 mt-3">
                                                            <!--**** Al agregar un examen, se debe cargar la tabla *****-->
                                                            <!--Tabla-->
                                                            <div class="table-responsive">
                                                                <table id="tabla_examen_cirugia" class="table table-bordered table-sm tabla_examenes_ficha">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="text-center align-middle" style="display:none">id</th>
                                                                            <th class="text-center align-middle" style="display:none">Nombre Examen</th>
                                                                            <th class="text-center align-middle">Nombre Examen</th>
                                                                            <th class="text-center align-middle">Lado</th>
                                                                            <th class="text-center align-middle">Tipo</th>
                                                                            {{--  <th class="text-center align-middle">Sub-Tipo</th>  --}}
                                                                            <th class="text-center align-middle">Prioridad</th>
                                                                            <th class="text-center align-middle">Con Contraste</th>
                                                                            <th class="text-center align-middle">Acción</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <!--Cierre Tabla-->
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    {{--  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>  --}}
                                                    {{--  <button type="button" data-dismiss="modal" class="btn btn-info">Guardar</button>  --}}
                                                    {{--  <button type="button" onclick="alerta_registro_examen();" data-dismiss="modal" class="btn btn-info">Generar Orden de Examen</button>  --}}
                                                    <button type="button" onclick="registro_examen_ficha();" data-dismiss="modal" class="btn btn-info">Generar Orden de Examen</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--INDICACIONES Y DESTINO-->
                                <div class="tab-pane fade show" id="urg_dest_ind" role="tabpanel" aria-labelledby="urg_dest_ind-tab">
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-2">
                                            <h6 class="t-aten">Indicaciones traslado alta urgencia</h6>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-xl-12">
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Traslado:</label>
                                                        <select name="dest" id="dest" data-titulo="Hospitalización" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('dest','div_detalle_dest','obs_dest',4);">
                                                            <option selected value="0">Seleccione</option>
                                                            <option value="1">Clínica</option>
                                                            <option value="2"> Mismo Hospital</option>
                                                            <option value="3"> Domicilio</option>
                                                            <option value="4">Otro Describir</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-12" id="div_detalle_dest" style="display:none">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Otro Lugar Describir</label>
                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Es Urgencia Qx.?" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_dest" id="obs_dest"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Medio de Traslado</label>
                                                        <select name="trasl_en" id="trasl_en" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('trasl_en','div_detalle_trasl_en','obs_trasl_en',3);">
                                                            <option selected value="0">Seleccione</option>
                                                            <option value="1">Por sus medios</option>
                                                            <option value="2">Ambulancia</option>
                                                            <option value="3">Otro</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-12" id="div_detalle_trasl_en" style="display:none">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Otro  (Describir)</label>
                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Es Urgencia Qx.?" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_trasl_en" id="obs_trasl_en"></textarea>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Condiciones al alta Urg</label>
                                                        <select name="cond_alt" id="cond_alt" data-titulo="Es Urgencia Qx.?" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cond_alt','div_detalle_cond_alt','obs_cond_alt',4);">
                                                            <option selected value="0">Seleccione</option>
                                                            <option value="1">Estable</option>
                                                            <option value="2">Grave</option>
                                                            <option value="3">Bién con ind de control consultorio</option>
                                                            <option value="4">Otro</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-12" id="div_detalle_cond_alt" style="display:none">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Otro  (Describir)</label>
                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Es Urgencia Qx.?" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cond_alt" id="obs_cond_alt"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Indicaciones Médicas</label>
                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Hospitalizar" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="obs_hospitalizar" id="obs_hospitalizar"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm" for="fl_resultado_ex">Resultado Examenes</label>
                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Resultado Examenes" data-seccion="Boca-Faringo-laringe" data-tipo="boca_far_laringe" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="fl_resultado_ex" id="fl_resultado_ex"></textarea>
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

        {{--  let id_periodo_ficha_dental = $('#periodo_ficha_dental').val();  --}}
        {{--  let periodo_ficha_dental = $('#periodo_ficha_dental option:selected').text();  --}}

        {{--  let observaciones_periodo_ficha_dental = $('#observaciones_periodo_ficha_dental').val();  --}}

        {{--  let id_cantidad_comprar = $('#cantidad_comprar').val();  --}}
        {{--  let cantidad_comprar = $('#cantidad_comprar option:selected').text();  --}}

        {{--  let otra_cantidad_a_comprar = $('#otra_cantidad_a_comprar').val();  --}}


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

            {{--  if($.trim(periodo_ficha_dental) == '' || periodo_ficha_dental == 0 || $.trim(periodo_ficha_dental) == 'Seleccione')
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
            }  --}}

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

                {{--  $('#periodo_ficha_dental').val(0);
                $('#observaciones_periodo_ficha_dental').val('');
                $('#observaciones_periodo_ficha_dental').attr('disabled','disabled');



                $('#cantidad_comprar').val(0);
                $('#otra_cantidad_a_comprar').val('');
                $('#otra_cantidad_a_comprar').attr('disabled','disabled');

                $('#mensaje_med_control').html('');  --}}


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
                {{--  html += '        <td class="text-center align-middle text-wrap hidden" hidden="hidden">id_periodo</td>';
                html += '        <td class="text-center align-middle text-wrap">Periodo</td>';
                html += '        <td class="text-center align-middle text-wrap hidden" hidden="hidden">uso_cronico</td>';
                html += '        <td class="text-center align-middle text-wrap hidden" hidden="hidden">cantidad_compra</td>';
                html += '        <td class="text-center align-middle text-wrap">Comprar</td>';  --}}
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

                                {{--  html +=     '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + value_2.id_periodo + '</td>';
                                html +=     '<td class="text-center align-middle text-wrap">' + value_2.periodo + '</td>';

                                html +=     '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + value_2.uso_cronico + '</td>';

                                html +=     '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + value_2.cantidad + '</td>';
                                html +=     '<td class="text-center align-middle text-wrap">' + value_2.cantidad_compra + '</td>';  --}}

                                html +=     '<td class="text-center align-middle text-wrap"><div name="remove" id="' + i +'" class="btn btn-danger btn_remove" onclick="eliminar_medicamento_sdi(\'row' + i + '\');">Quitar</div></td>';
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
        {{--  $('#periodo_ficha_dental').val('0');  --}}
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

                {{--  rol['id_periodo'] = $.trim($(data[10]).text().split("\n").join(""));//id_periodo_ficha_dental
                rol['periodo'] = $.trim($(data[11]).text().split("\n").join(""));//periodo_ficha_dental

                rol['uso_cronico'] = $.trim($(data[12]).text().split("\n").join(""));//medicamento_uso_cronico

                rol['cantidad'] = $.trim($(data[13]).text().split("\n").join(""));//id_cantidad_comprar
                rol['cantidad_comprar'] = $.trim($(data[14]).text().split("\n").join(""));//cantidad_comprar  --}}

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
    function indicar_indicacion_sdi()
    {

        let indicacion = $('#indicacion').val();
        let id_medicamento = $('#manual_id_medicamento_ficha_dental').val();
        let farmaco = $('#manual_nombre_composicion_farmaco').val();
        let tipo_control = $('#manual_tipo_control').val();

        let dosis_medicamento_ficha_dental = $('#manual_dosis_medicamento_ficha_dental').val();
        let frecuencia_medicamento_ficha_dental = $('#manual_frecuencia_medicamento_ficha_dental').val();

        {{--  let cantidad_comprar = $('#manual_cantidad_comprar').val();
        let cantidad_numero_comprar = $('#manual_cantidad_numero').val();  --}}

        let id_via_administracion_ficha_dental = $('#manual_via_administracion_ficha_dental').val();
        let via_administracion_ficha_dental = $('#manual_via_administracion_ficha_dental option:selected').text();

        let observaciones_medicamento_ficha_dental = $('#manual_observaciones_via_administracion_ficha_dental').val();

        {{--  let id_periodo_ficha_dental = $('#manual_periodo_ficha_dental').val();
        let periodo_ficha_dental = $('#manual_periodo_ficha_dental option:selected').text();  --}}

        {{--  let observaciones_periodo_ficha_dental = $('#manual_observaciones_periodo_ficha_dental').val();  --}}



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

            {{--  if($.trim(periodo_ficha_dental) == '' || periodo_ficha_dental == 0 || $.trim(periodo_ficha_dental) == 'Seleccione')
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
            }  --}}

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
                {{--  $('#manual_cantidad_comprar').val('');  --}}
                $('#manual_via_administracion_ficha_dental').val(0);
                $('#manual_observaciones_via_administracion_ficha_dental').val('');
                {{--  $('#manual_periodo_ficha_dental').val(0);  --}}
                {{--  $('#manual_observaciones_periodo_ficha_dental').val('');  --}}

                {{--  $( "#medicamento_uso_cronico" ).prop( "checked", false ).change();  --}}

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
    function indicar_medicamento_manual_sdi()
    {

        let nombre_medicamento_ficha_dental = $('#manual_nombre_medicamento_ficha_dental').val();
        let id_medicamento = $('#manual_id_medicamento_ficha_dental').val();
        let farmaco = $('#manual_nombre_composicion_farmaco').val();
        let tipo_control = $('#manual_tipo_control').val();

        let dosis_medicamento_ficha_dental = $('#manual_dosis_medicamento_ficha_dental').val();
        let frecuencia_medicamento_ficha_dental = $('#manual_frecuencia_medicamento_ficha_dental').val();

        {{--  let cantidad_comprar = $('#manual_cantidad_comprar').val();
        let cantidad_numero_comprar = $('#manual_cantidad_numero').val();  --}}

        let id_via_administracion_ficha_dental = $('#manual_via_administracion_ficha_dental').val();
        let via_administracion_ficha_dental = $('#manual_via_administracion_ficha_dental option:selected').text();

        let observaciones_medicamento_ficha_dental = $('#manual_observaciones_via_administracion_ficha_dental').val();

        {{--  let id_periodo_ficha_dental = $('#manual_periodo_ficha_dental').val();
        let periodo_ficha_dental = $('#manual_periodo_ficha_dental option:selected').text();  --}}

        {{--  let observaciones_periodo_ficha_dental = $('#manual_observaciones_periodo_ficha_dental').val();  --}}



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

            {{--  if($.trim(periodo_ficha_dental) == '' || periodo_ficha_dental == 0 || $.trim(periodo_ficha_dental) == 'Seleccione')
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
            }  --}}

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
                {{--  $('#manual_cantidad_comprar').val('');  --}}
                $('#manual_via_administracion_ficha_dental').val(0);
                $('#manual_observaciones_via_administracion_ficha_dental').val('');
                {{--  $('#manual_periodo_ficha_dental').val(0);  --}}
                {{--  $('#manual_observaciones_periodo_ficha_dental').val('');  --}}

                {{--  $( "#medicamento_uso_cronico" ).prop( "checked", false ).change();  --}}

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

    {{--  function indicar_medicamento_magistral_sdi()
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
    }  --}}

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
