<div class="row">
    <div class="col-sm-2">
        <div class="form-row">
            <div class="">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link-aten text-reset active" id="cont_impl_prop-tab" data-toggle="tab"
                        href="#cont_impl_prop" role="tab" aria-controls="cont_impl_prop"
                        aria-selected="true">Implantes Propios</a>
                    <a class="nav-link-aten text-reset" id="cont_impl_ot_i-tab" data-toggle="tab" href="#cont_impl_ot_i"
                        role="tab" aria-controls="cont_impl_ot_i" aria-selected="false">Otros Implantólogos</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <div class="row">
            <div class="col-12">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="cont_impl_prop" role="tabpanel"
                        aria-labelledby="cont_impl_prop-tab">
                        <div class="card-informacion" id="pieza_post_implantada">
                            <div class="card-body">
                                <div class="form-row">
                                    @php
                                        $piezasUnicas = [];
                                    @endphp

                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-4 col-xxl-2">
                                        <label class="floating-label-activo-sm">Pieza N°</label>
                                        <select name="numero_pieza_post_impl{{ $counter }}"
                                                id="numero_pieza_post_impl{{ $counter }}"
                                                class="form-control form-control-sm">
                                            <option value="0">Seleccione</option>
                                            @foreach ($odontograma as $o)
                                                @if ($o->presupuesto == 1 && !in_array($o->pieza, $piezasUnicas))
                                                    <option value="{{ $o->pieza }}">{{ $o->pieza }}</option>
                                                    @php
                                                        $piezasUnicas[] = $o->pieza;
                                                    @endphp
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-4 col-xxl-2">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Móvil</label>
                                            <select name="estab_post_implante{{ $counter }}"
                                                id="estab_post_implante{{ $counter }}"
                                                class="form-control form-control-sm"
                                                onchange="evaluar_para_carga_detalle('estab_post_implante{{ $counter }}','div_estab_post_implante{{ $counter }}','obs_estab_post_implante{{ $counter }}',2); evaluar_rehabilitacion({{ $counter }});">
                                                <option value="0">Seleccione</option>
                                                <option value="1" selected>No</option>
                                                <option value="2">Sí</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_estab_post_implante{{ $counter }}"
                                            style="display:none;">
                                            <label class="floating-label-activo-sm">Describa</label>
                                            <textarea class="form-control form-control-sm" data-titulo="" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                name="obs_estab_post_implante{{ $counter }}" id="obs_estab_post_implante{{ $counter }}"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-4 col-xxl-2">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Posición</label>
                                            <select name="posc_post_impl{{ $counter }}" data-titulo="Ex_cuello"
                                                data-seccion="Cuello" id="posc_post_impl{{ $counter }}"
                                                class="form-control form-control-sm"
                                                onchange="evaluar_para_carga_detalle('posc_post_impl{{ $counter }}','div_posc_post_impl{{ $counter }}','posc_post_vp{{ $counter }}',2); evaluar_rehabilitacion({{ $counter }});">
                                                <option selected value="1">Correcta</option>
                                                <option value="2">Incorrecta (Describir)</option>
                                            </select>
                                        </div>
                                        <div id="div_posc_post_impl{{ $counter }}" style="display:none;">
                                            <div class="form-group mt-1">
                                                <label class="floating-label-activo-sm">Vestíbulo-palatino</label>
                                                <input type="text"class="form-control form-control-sm"
                                                    id="posc_post_vp{{ $counter }}">
                                            </div>
                                            <div class="form-group mt-1">
                                                <label class="floating-label-activo-sm">Vestíbulo-lingual</label>
                                                <input type="text"class="form-control form-control-sm"
                                                    id="posc_post_vl{{ $counter }}">
                                            </div>
                                            <div class="form-group mt-1">
                                                <label class="floating-label-activo-sm">Mesio-distal</label>
                                                <input type="text"class="form-control form-control-sm"
                                                    id="posc_post_md{{ $counter }}">
                                            </div>
                                            <div class="form-group mt-1">
                                                <label class="floating-label-activo-sm">Cráneo-caudal</label>
                                                <input type="text"class="form-control form-control-sm"
                                                    id="posc_post_cc{{ $counter }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-4 col-xxl-2">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Exposición de espiras</label>
                                            <select name="exp_esp_post_impl{{ $counter }}"
                                                id="exp_esp_post_impl{{ $counter }}"
                                                class="form-control form-control-sm"
                                                onchange="evaluar_para_carga_detalle('exp_esp_post_impl{{ $counter }}','div_exp_esp_post_impl{{ $counter }}','obs_exp_esp_post_impl{{ $counter }}',2); evaluar_rehabilitacion({{ $counter }});">
                                                <option value="0">Seleccione</option>
                                                <option value="1" selected>No</option>
                                                <option value="2">Sí</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_exp_esp_post_impl{{ $counter }}"
                                            style="display:none;">
                                            <label class="floating-label-activo-sm">Describir</label>
                                            <textarea class="form-control form-control-sm" data-titulo="General_endodoncia" rows="1" onfocus="this.rows=3"
                                                onblur="this.rows=1;" name="obs_exp_esp_post_impl{{ $counter }}"
                                                id="obs_exp_esp_post_impl{{ $counter }}"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-4 col-xxl-2">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Supuración</label>
                                            <select name="sut_post_impl{{ $counter }}"
                                                id="sut_post_impl{{ $counter }}"
                                                class="form-control form-control-sm"
                                                onchange="evaluar_para_carga_detalle('sut_post_impl{{ $counter }}','div_sut_post_impl{{ $counter }}','obs_sut_post_impl{{ $counter }}',2); evaluar_rehabilitacion({{ $counter }});">
                                                <option value="0">Seleccione</option>
                                                <option value="1" selected>No</option>
                                                <option value="2">Sí</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_sut_post_impl{{ $counter }}"
                                            style="display:none;">
                                            <label class="floating-label-activo-sm">Describir</label>
                                            <textarea class="form-control form-control-sm" data-titulo="General_endodoncia" rows="1" onfocus="this.rows=3"
                                                onblur="this.rows=1;" name="obs_sut_post_impl{{ $counter }}" id="obs_sut_post_impl{{ $counter }}"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-4 col-xxl-2">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Estado de la encía</label>
                                            <select name="est_encia_post_impl{{ $counter }}"
                                                id="est_encia_post_impl{{ $counter }}"
                                                class="form-control form-control-sm"
                                                onchange="evaluar_para_carga_detalle('est_encia_post_impl{{ $counter }}','div_est_encia_post_impl{{ $counter }}','obs_est_encia_post_impl{{ $counter }}',2); evaluar_rehabilitacion({{ $counter }});">
                                                <option value="1">Normal</option>
                                                <option value="2">Anormal (Describir)</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_est_encia_post_impl{{ $counter }}"
                                            style="display:none;">
                                            <label class="floating-label-activo-sm">Anormal (Describir)</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                name="obs_est_encia_post_impl{{ $counter }}" id="obs_est_encia_post_impl{{ $counter }}"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Pérdida ósea marginal</label>
                                            <input type="text" class="form-control form-control-sm"
                                                id="perd_osea_marg_post_impl{{ $counter }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-9 col-lg-9 col-xl-9 col-xxl-9">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Obs. Al control del
                                                implante</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                name="obs_control_post_implante{{ $counter }}" id="obs_control_post_implante{{ $counter }}"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 d-none" id="mensaje_rehabilitacion{{ $counter }}" style="border: 1px solid black; background-color: #f8f9fa; padding: 10px; border-radius: 5px;">
                                        <div class="badge badge-warning">NECESITA REHABILITACIÓN</div>
                                        <div class="row">
                                            <div class="col-md-5 mt-3">  
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Tratamiento Rehabilitador</label>
                                                    <input type="text" class="form-control form-control-sm tratamiento-autocomplete" id="tratamiento_rehabilitador{{ $counter }}" name="tratamiento_rehabilitador{{ $counter }}" placeholder="Buscar tratamiento...">
                                                </div>
                                                
                                            </div>
                                            <div class="col-md-5 mt-3">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Valor</label>
                                                    <input type="text" class="form-control form-control-sm" id="valor_rehabilitacion{{ $counter }}" name="valor_rehabilitacion{{ $counter }}" placeholder="Valor del tratamiento">
                                                </div>
                                            </div>
                                            <div class="col-md-2 mt-3 d-flex justify-content-end">
                                                <button type="button" class="btn btn-icon btn-primary-light-c"
                                                    onclick="cargar_a_presupuesto_impl_rehab({{ $counter }})"><i
                                                        class="feather icon-shopping-cart"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">

                                <button type="button" class="btn btn-icon btn-primary-light-c"
                                    onclick="guardar_pieza_dental_post_impl({{ $counter }})"><i
                                        class="feather icon-save"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show" id="cont_impl_ot_i" role="tabpanel"
                        aria-labelledby="cont_impl_ot_i-tab">
                        <div class="card-informacion">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-4 col-xxl-2">
                                        <label class="floating-label-activo-sm" for="nombre_implantologo">Nombre Implantólogo</label>
                                        <input type="text" name="nombre_implantologo" id="nombre_implantologo" class="form-control form-control-sm" value="">
                                    </div>
                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-4 col-xxl-2">
                                        <label class="floating-label-activo-sm">Eliga Pieza</label>
                                        <select name="numero_pieza_post_impl_otro{{ $counter }}"
                                            id="numero_pieza_post_impl_otro{{ $counter }}"
                                            class="form-control form-control-sm">
                                            <option value="0">Seleccione</option>
                                            @foreach (['1.1', '1.2', '1.3', '1.4', '1.5', '1.6', '1.7', '1.8', '2.1', '2.2', '2.3', '2.4', '2.5', '2.6', '2.7', '2.8','3.1', '3.2', '3.3', '3.4', '3.5', '3.6', '3.7', '3.8', '4.1', '4.2', '4.3', '4.4', '4.5', '4.6', '4.7', '4.8'] as $pieza)
                                                <option value="{{ $pieza }}" @if(in_array($pieza, $piezasSeleccionadas ?? [])) selected @endif>{{ $pieza }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-4 col-xxl-2">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Móvil</label>
                                            <select name="estab_post_implante_otro{{ $counter }}"
                                                id="estab_post_implante_otro{{ $counter }}"
                                                class="form-control form-control-sm"
                                                onchange="evaluar_para_carga_detalle('estab_post_implante_otro{{ $counter }}','div_estab_post_implante_otro{{ $counter }}','obs_estab_post_implante_otro{{ $counter }}',2);">
                                                <option value="0">Seleccione</option>
                                                <option value="1" selected>No</option>
                                                <option value="2">Sí</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_estab_post_implante_otro{{ $counter }}"
                                            style="display:none;">
                                            <label class="floating-label-activo-sm">Describa</label>
                                            <textarea class="form-control form-control-sm" data-titulo="" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                name="obs_estab_post_implante_otro{{ $counter }}" id="obs_estab_post_implante_otro{{ $counter }}"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-4 col-xxl-2">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Posición</label>
                                            <select name="posc_post_impl_otro{{ $counter }}" data-titulo="Ex_cuello"
                                                data-seccion="Cuello" id="posc_post_impl_otro{{ $counter }}"
                                                class="form-control form-control-sm"
                                                onchange="evaluar_para_carga_detalle('posc_post_impl_otro{{ $counter }}','div_posc_post_impl_otro{{ $counter }}','posc_post_vp_otro{{ $counter }}',2);">
                                                <option selected value="1">Correcta</option>
                                                <option value="2">Incorrecta (Describir)</option>
                                            </select>
                                        </div>
                                        <div id="div_posc_post_impl_otro{{ $counter }}" style="display:none;">
                                            <div class="form-group mt-1">
                                                <label class="floating-label-activo-sm">Vestíbulo-palatino</label>
                                                <input type="text"class="form-control form-control-sm"
                                                    id="posc_post_vp_otro{{ $counter }}">
                                            </div>
                                            <div class="form-group mt-1">
                                                <label class="floating-label-activo-sm">Vestíbulo-lingual</label>
                                                <input type="text"class="form-control form-control-sm"
                                                    id="posc_post_vl_otro{{ $counter }}">
                                            </div>
                                            <div class="form-group mt-1">
                                                <label class="floating-label-activo-sm">Mesio-distal</label>
                                                <input type="text"class="form-control form-control-sm"
                                                    id="posc_post_md_otro{{ $counter }}">
                                            </div>
                                            <div class="form-group mt-1">
                                                <label class="floating-label-activo-sm">Cráneo-caudal</label>
                                                <input type="text"class="form-control form-control-sm"
                                                    id="posc_post_cc_otro{{ $counter }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-4 col-xxl-2">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Exposición de espiras</label>
                                            <select name="exp_esp_post_impl_otro{{ $counter }}"
                                                id="exp_esp_post_impl_otro{{ $counter }}"
                                                class="form-control form-control-sm"
                                                onchange="evaluar_para_carga_detalle('exp_esp_post_impl_otro{{ $counter }}','div_exp_esp_post_impl_otro{{ $counter }}','obs_exp_esp_post_impl_otro{{ $counter }}',2);">
                                                <option value="0">Seleccione</option>
                                                <option value="1" selected>No</option>
                                                <option value="2">Sí</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_exp_esp_post_impl{{ $counter }}"
                                            style="display:none;">
                                            <label class="floating-label-activo-sm">Describir</label>
                                            <textarea class="form-control form-control-sm" data-titulo="General_endodoncia" rows="1" onfocus="this.rows=3"
                                                onblur="this.rows=1;" name="obs_exp_esp_post_impl_otro{{ $counter }}"
                                                id="obs_exp_esp_post_impl_otro{{ $counter }}"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-4 col-xxl-2">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Supuración</label>
                                            <select name="sut_post_impl_otro{{ $counter }}"
                                                id="sut_post_impl_otro{{ $counter }}"
                                                class="form-control form-control-sm"
                                                onchange="evaluar_para_carga_detalle('sut_post_impl_otro{{ $counter }}','div_sut_post_impl_otro{{ $counter }}','obs_sut_post_impl_otro{{ $counter }}',2);">
                                                <option value="0">Seleccione</option>
                                                <option value="1" selected>No</option>
                                                <option value="2">Sí</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_sut_post_impl_otro{{ $counter }}"
                                            style="display:none;">
                                            <label class="floating-label-activo-sm">Describir</label>
                                            <textarea class="form-control form-control-sm" data-titulo="General_endodoncia" rows="1" onfocus="this.rows=3"
                                                onblur="this.rows=1;" name="obs_sut_post_impl_otro{{ $counter }}" id="obs_sut_post_impl_otro{{ $counter }}"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-4 col-xxl-2">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Estado de la encía</label>
                                            <select name="est_encia_post_impl_otro{{ $counter }}"
                                                id="est_encia_post_impl_otro{{ $counter }}"
                                                class="form-control form-control-sm"
                                                onchange="evaluar_para_carga_detalle('est_encia_post_impl_otro{{ $counter }}','div_est_encia_post_impl_otro{{ $counter }}','obs_est_encia_post_impl_otro{{ $counter }}',2);">
                                                <option value="1">Normal</option>
                                                <option value="2">Anormal (Describir)</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_est_encia_post_impl_otro{{ $counter }}"
                                            style="display:none;">
                                            <label class="floating-label-activo-sm">Anormal (Describir)</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                name="obs_est_encia_post_impl_otro{{ $counter }}" id="obs_est_encia_post_impl_otro{{ $counter }}"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Pérdida ósea marginal</label>
                                            <input type="text" class="form-control form-control-sm"
                                                id="perd_osea_marg_post_impl_otro{{ $counter }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Obs. Al control del
                                                implante</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                name="obs_control_post_implante_otro{{ $counter }}" id="obs_control_post_implante_otro{{ $counter }}"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Procedimiento Propuesto</label>
                                            <input type="text" name="procedimiento_post_impl_autocomplete{{ $counter }}" id="procedimiento_post_impl_autocomplete{{ $counter }}" class="form-control form-control-sm tratamiento-autocomplete">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">

                                <button type="button" class="btn btn-icon btn-primary-light-c"
                                    onclick="guardar_pieza_dental_post_impl_otro({{ $counter }})"><i
                                        class="feather icon-save"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>


<script>
    $(document).ready(function(){
    $('.tratamiento-autocomplete').each(function () {
        $(this).autocomplete({
            source: function (request, response) {
                // Fetch data
                $.ajax({
                    url: getDiagnosticoDentalUrl,
                    type: 'post',
                    dataType: "json",
                    data: {
                        _token: CSRF_TOKEN,
                        search: request.term
                    },
                    success: function (data) {
                        console.log(data);
                        if (data.length == 0) {
                            $('.diagnostico_activo').hide();
                            $('.diagnostico_inactivo').show();
                        } else {
                            $('.diagnostico_activo').show();
                            $('.diagnostico_inactivo').hide();
                        }
                        response(data);
                    }
                });
            },
            select: function (event, ui) {
                $(this).val(ui.item.label);
                $(this).next('input[type="hidden"]').val(ui.item.value); // Asigna el valor al input hidden correspondiente
                    // Busca el input de valor en el mismo contenedor
    $(this).closest('.row').find('input[name="valor_rehabilitacion{{ $counter }}"]').val(formatoMoneda(ui.item.valor));
                return false;
            }
        });
    });
    });

    function cargar_a_presupuesto_impl_rehab(counter) {
        let tratamiento = $('#tratamiento_rehabilitador' + counter).val();
        let pieza = $('#numero_pieza_post_impl' + counter).val();
        let mensaje = '';
        let valido = 1;
        if (tratamiento == '') {
            valido = 0;
            mensaje += '<li>Tratamiento Rehabilitador</li>';
        }

        if( pieza == '' || pieza == 0) {
            valido = 0;
            mensaje += '<li>Pieza Dental</li>';
        }

        if (valido == 0) {
            swal({
                title: "Campo requerido",
                content: {
                    element: "div",
                    attributes: {
                        innerHTML: mensaje,
                    },
                },
                icon: "warning",
                buttons: "Aceptar",
                DangerMode: true,
            });
            return false;
        }

        let data = {
            pieza: pieza,
            tto: tratamiento,
            id_ficha_atencion: $('#id_fc').val(),
            id_lugar_atencion: $('#id_lugar_atencion').val(),
            id_paciente: $('#id_paciente_fc').val(),
            _token: "{{ csrf_token() }}"
        };

         console.log(data);

        $.ajax({
            type: 'POST',
            url: "{{ route('dental.cargar_tratamiento_presupuesto_period') }}",
            data: data,
            success: function (resp) {
                console.log(resp);
                    if(resp.status == 1){
                        swal({
                            icon:'success',
                            title:'Info',
                            text: resp.mensaje
                        });
                        let odontograma = resp.odontograma_paciente;
                        let html = '';
                        odontograma.forEach(function(odonto){
                            html += '<tr>';
                            html += '<td>'+odonto.fecha+'</td>';
                            html += '<td>'+odonto.tratamiento+'</td>';
                            html += '<td>'+odonto.caras+'</td>';
                            html += '<td>'+odonto.pieza+'</td>';
                            html += '<td>'+odonto.diagnostico+'</td>';
                            html += '<td>'+formatoMoneda(odonto.valor)+'</td>';
                            // html += '<td>';
                            // html += '<button type="button" class="btn btn-danger btn-sm" onclick="eliminar_odontograma('+odonto.id+')"><i class="feather icon-x"></i>Eliminar</button>';
                            // if(odonto.presupuesto == 0){
                            //     html += '<button type="button" class="btn btn-primary btn-sm" onclick="cargar_a_presupuesto('+odonto.id+')"><i class="fas fa-save"></i>Cargar a presupuesto</button>';
                            // }else{
                            //     html += '<button type="button" class="btn btn-danger btn-sm" onclick="sacar_de_presupuesto('+odonto.id+')"><i class="feather icon-x"></i>Sacar de presupuesto</button>';
                            // }

                            // html += '</td>';
                            // Checkbox para seleccionar el odontograma
                            html += '<td>';
                            html += '<div class="form-check">';
                            html += '<input class="form-check-input" type="checkbox" value="' + odonto.id + '" '
                            html += odonto.presupuesto == 1 ? 'checked ' : '';
                            html += 'onchange="togglePresupuesto(' + odonto.id + ', this.checked)">';
                            html += '<label class="form-check-label"></label>';
                            html += '</div>';
                            html += '</td>';
                            html += '<td>';
                            html += '<div class="form-check">';
                            html += '<input class="form-check-input checkbox-seleccion" type="checkbox" value="' + odonto.id + '" ';
                            html += 'id="seleccionCheck' + odonto.id + '" ';
                            html += 'onchange="toggleSeleccion(' + odonto.id + ', this.checked)">';
                            html += '<label class="form-check-label" for="seleccionCheck' + odonto.id + '"></label>';
                            html += '</div>';
                            html += '</td>';
                            html += '</tr>';
                        });
                        $('#contenedor_examenes_grupos_dentales').empty();
                        $('#contenedor_examenes_grupos_dentales').append(resp.vista_presupuestos);
                        $('#table_odontograma tbody').html(html);
                        $('#contenedor_piezas_dentales_presupuesto').empty();
                        $('#table_trabajos_presupuesto tbody').empty();
                        odontograma.forEach(function(odonto){
                            if(odonto.presupuesto == 1){
                                $('#contenedor_piezas_dentales_presupuesto').append(`
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="card-informacion">
                                                <div class="card-body pb-0">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-2">
                                                            <label class="floating-label-activo-sm">Pieza</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${odonto.pieza}">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="floating-label-activo-sm">Prestación</label>
                                                            <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${odonto.descripcion}">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label class="floating-label-activo-sm">Sub-Total</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(formatoMoneda(odonto.valor))}" >
                                                        </div>
                                                        <div class="form-group col-md-1">
                                                            <label class="floating-label-activo-sm">Descuento</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label class="floating-label-activo-sm">Total prestación</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(formatoMoneda(odonto.valor))}" >
                                                        </div>
                                                        <div class="form-group col-md-2 d-flex justify-content-center">
                                                            <button type="button" class="btn btn-danger btn-icon" onclick="eliminar_odontograma(${odonto.id})"><i class="fas fa-trash"></i> </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                `);
                                $('#table_trabajos_presupuesto tbody').append(`
                                    <tr>
                                        <td>${odonto.fecha}</td>
                                        <td>${odonto.diagnostico} </td>
                                        <td>${odonto.caras} </td>
                                        <td>${odonto.pieza} </td>
                                        <td>${odonto.tratamiento} </td>
                                        <td>${formatoMoneda(odonto.valor)} </td>
                                        <td> </td>
                                        <td>
                                            <button type="button" class="btn btn-secondary btn-sm" onclick="atender_procedimiento(${odonto.id},'${odonto.tratamiento}',${odonto.pieza})"><i class="fas fa-check"></i>Atender</button>
                                        </td>
                                    </tr>
                                `);
                                }
                            });
                            let valores_boca_general = resp.valores[0];
                            let valores_odontograma = resp.valores[1];
                            let valores_insumos = resp.valores[2];
                            let valores_lab = resp.valores[3];
                            let total_general = valores_boca_general + valores_odontograma + valores_insumos + valores_lab;
                            $('#valores_examenes_presupuesto').html(formatoMoneda(valores_boca_general));
                            $('#valores_examenes_presupuesto_conf').html(formatoMoneda(valores_boca_general));
                            $('#valores_piezas_presupuesto').html(formatoMoneda(valores_odontograma));
                            $('#valores_piezas_presupuesto_conf').html(formatoMoneda(valores_odontograma));
                            $('#valores_total_final_presupuesto').html(formatoMoneda(total_general));
                            $('#valores_total_final_presupuesto_conf').html(formatoMoneda(total_general));
                            $('#subtotal_clinico').val(formatoMoneda(total_general));
                            $('#total_clinico').val(formatoMoneda(total_general));
                            // guardamos el total en un input hidden
                            $('#total_presupuesto_dental').val(total_general);

                            $('#monto_total').html(formatoMoneda(valores_insumos)+' + '+formatoMoneda(valores_odontograma + valores_boca_general)+' = '+formatoMoneda(total_general));

                            let table = $('#presup_estado_pago').DataTable();
                            table.clear().draw();

                            // Recorrer el odontograma y agregar nuevas filas
                            // Recorrer el odontograma y agregar nuevas filas
                            odontograma.forEach(function(odonto) {

                                if (odonto.presupuesto == 1) {
                                    if(odonto.estado_pago == 'ok'){
                                        var clase = 'bg-success';
                                    }else if(odonto.estado_pago == 'incompleto'){
                                        var clase = 'bg-warning';
                                    }else{
                                        var clase = 'bg-danger';
                                    }

                                    if(odonto.estado == 0){
                                        var estado = 'PENDIENTE';
                                    }else{
                                        var estado = 'TERMINADO';
                                    }
                                    // Agregar una nueva fila a la tabla
                                    let rowNode = table.row.add([
                                        odonto.descripcion,
                                        odonto.pieza,
                                        formatoMoneda(formatoMoneda(odonto.valor)),
                                        0,
                                        formatoMoneda(formatoMoneda(odonto.valor)),
                                        '<div class="circle '+clase+'"></div>',
                                        estado, // Columna vacía

                                    ]).draw(false).node(); // Obtener el nodo de la fila

                                    // Agregar clases a la fila
                                    $(rowNode).addClass('text-center align-middle status-circle');
                                }
                            });

                        $('#table_pagos_reasignar_odontograma tbody').empty();
                        odontograma.forEach(function(odonto) {
                            if (odonto.presupuesto == 1) {
                                let fila = `<tr>
                                    <td><input type="checkbox" class="valor-checkbox" data-valor="${odonto.valor}" data-id="${odonto.id}" data-info="odonto"></td>
                                    <td>${odonto.pieza}</td>
                                    <td>${formatoMoneda(odonto.valor)}</td>
                                    <td><button type="button" class="btn btn-danger" onclick="eliminar_odontograma(${odonto.id})"><i class="feather icon-x"> </i> </button></td>
                                </tr>`;
                                $('#table_pagos_reasignar_odontograma tbody').append(fila);
                            }
                        });
                        let count = $('#random_preimpl').val();
                        let count_post_impl = $('#random_postimpl').val();
                        $('#numero_pieza_tto_impl'+count).empty();
                        $('#numero_pieza_post_impl'+count).empty();
                        odontograma.forEach(o => {
                            if(o.presupuesto == 1){
                                $('#numero_pieza_tto_impl'+count).append(`
                                    <option value="${o.pieza}">${o.pieza} </option>
                                `);
                                $('#numero_pieza_post_impl'+count).append(`
                                    <option value="${o.pieza}">${o.pieza} </option>
                                `);
                            }

                        });
                        // se cargan las piezas seleccionadas en tabla con id table_piezas_presupuesto_odonto
                        let table_odon_gral = $('#table_piezas_presupuesto_odonto').DataTable();
                        table_odon_gral.clear().draw();

                        odontograma.forEach(function(pieza){
                            // Agregar una nueva fila a la tabla
                            let rowNode = table_odon_gral.row.add([
                                pieza.pieza,
                                pieza.descripcion,
                                formatoMoneda(formatoMoneda(pieza.valor)),
                                '<button type="button" class="btn btn-danger-light-c btn-icon" onclick="eliminar_odontograma('+pieza.id+')"><i class="feather icon-x"> </i> </button>'

                            ]).draw(false).node(); // Obtener el nodo de la fila
                        });
                        // se cargan las piezas seleccionadas en tabla con id table_piezas_presupuesto_odonto implantologia
                        let table_impl = $('#table_piezas_presupuesto_odonto_impl').DataTable();
                        table_impl.clear().draw();

                        odontograma.forEach(function(pieza){
                            // Agregar una nueva fila a la tabla
                            let rowNode = table_impl.row.add([
                                pieza.pieza,
                                pieza.descripcion,
                                formatoMoneda(formatoMoneda(pieza.valor)),
                                '<button type="button" class="btn btn-danger-light-c btn-icon" onclick="eliminar_odontograma('+pieza.id+')"><i class="feather icon-x"> </i> </button>'

                            ]).draw(false).node(); // Obtener el nodo de la fila
                        });
                    }else{
                        swal({
                            icon:'error',
                            title:'info',
                            text: resp.mensaje
                        });
                    }


                    $('#tratamiento_presupuesto tbody').empty();
                    let presupuesto = resp.presupuesto;
                    console.log(presupuesto);
                    $('#tratamiento_presupuesto tbody').append(`
                    <tr>
                        <td class="text-center align-middle">${presupuesto.fecha}</td>
                        <td class="text-center align-middle">${presupuesto.id}</td>
                        <td class="text-center align-middle">${presupuesto.aprobado}</td>
                        <td class="text-center align-middle">Sector I</td>
                        <td class="text-center align-middle">${presupuesto.boca}</td>

                        <td class="text-center align-middle">
                            <div class="form-group col-md-4">
                                <div class="switch switch-success d-inline m-r-2">
                                    <input type="checkbox" id="info_finalizado" checked="">
                                    <label for="info_finalizado" class="cr"></label>
                                </div>
                                <label>Realizado?</label>
                            </div>
                        </td>
                        <td class="text-center align-middle">
                            ${presupuesto.fecha}
                        </td>
                        <td class="text-center align-middle">
                            <button type="button" class="btn btn-info btn-sm" onclick="presupuesto()" ;="">
                                <i class="fa fa-plus"></i> Trabajar en pieza
                            </button>
                        </td>
                    </tr>
                    `);
            },
            error: function (xhr, status, error) {
                swal({
                    title: "Error",
                    text: "Ocurrió un error al cargar el tratamiento.",
                    icon: "error",
                    buttons: "Aceptar",
                });
            }
        });
    }

    function evaluar_rehabilitacion(counter) {
        let estab_post_implante = $('#estab_post_implante' + counter).val();
        let posc_post_impl = $('#posc_post_impl' + counter).val();
        let exp_esp_post_impl = $('#exp_esp_post_impl' + counter).val();
        let sut_post_impl = $('#sut_post_impl' + counter).val();
        let est_encia_post_impl = $('#est_encia_post_impl' + counter).val();

        if (estab_post_implante == 2 || posc_post_impl == 2 || exp_esp_post_impl == 2 || sut_post_impl == 2 || est_encia_post_impl == 2) {
            $('#mensaje_rehabilitacion' + counter).removeClass('d-none');
        }else{
            $('#mensaje_rehabilitacion' + counter).addClass('d-none');
        }
    }

    function ocultar_pieza_dental_post_impl() {
        $('#pieza_post_implantada').empty();
    }

    function guardar_pieza_dental_post_impl(counter) {

        let numero_pieza = $('#numero_pieza_post_impl' + counter).val();

        let estab_post_implante = $('#estab_post_implante' + counter).val();
        let estab_post_implante_text = $('#estab_post_implante' + counter + ' option:selected')
            .text(); // Obtiene el texto de la opción seleccionada

        if (estab_post_implante == 2) {
            estab_post_implante_text = $('#obs_estab_post_implante' + counter).val();
        }

        let posc_post_impl = $('#posc_post_impl' + counter).val();
        let posc_post_impl_text = $('#posc_post_impl' + counter + ' option:selected').text();
        if (posc_post_impl == 2) {
            posc_post_impl_text = $('#obs_estab_post_implante' + counter).val();
        }

        let exp_esp_post_impl = $('#exp_esp_post_impl' + counter).val();
        let exp_esp_post_impl_text = $('#exp_esp_post_impl' + counter + ' option:selected').text();
        if (exp_esp_post_impl == 2) {
            exp_esp_post_impl_text = $('#obs_exp_esp_post_impl' + counter).val();
        }
        let sut_post_impl = $('#sut_post_impl' + counter).val();
        let sut_post_impl_text = $('#sut_post_impl' + counter + ' option:selected')
            .text(); // Obtiene el texto de la opción seleccionada
        if (sut_post_impl == 2) {
            sut_post_impl_text = $('#obs_sut_post_impl' + counter).val();
        }

        let est_encia_post_impl = $('#est_encia_post_impl' + counter).val();
        let est_encia_post_impl_text = $('#est_encia_post_impl' + counter + ' option:selected')
            .text(); // Obtiene el texto de la opción seleccionada

        if (est_encia_post_impl == 2) {
            est_encia_post_impl_text = $('#obs_est_encia_post_impl' + counter).val();
        }

        let perd_osea_marg_post_impl = $('#perd_osea_marg_post_impl' + counter).val();

        let obs_control_post_implante = $('#obs_control_post_implante' + counter).val();


        let valido = 1;
        let mensaje = '';

        if (numero_pieza == '' || numero_pieza == 0) {
            valido = 0;
            mensaje += '<li>Campo requerido N° Pieza </li>';
        }

        if (perd_osea_marg_post_impl == '') {
            valido = 0;
            mensaje += '<li>Campo requerido Pérdida ósea marginal</li>';
        }

        if (obs_control_post_implante == '') {
            valido = 0;
            mensaje += '<li>Campo requerido Observaciones al control del implante</li>';
        }

        if (valido == 0) {
            swal({
                title: "Campos requeridos",
                content: {
                    element: "div",
                    attributes: {
                        innerHTML: mensaje,
                    },
                },
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });
            return false;
        }

        let data = {
            numero_pieza: numero_pieza,
            estab_post_implante: estab_post_implante,
            estab_post_implante_text: estab_post_implante_text,
            posc_post_impl: posc_post_impl,
            posc_post_impl_text: posc_post_impl_text,
            exp_esp_post_impl: exp_esp_post_impl,
            exp_esp_post_impl_text: exp_esp_post_impl_text,
            est_encia_post_impl: est_encia_post_impl,
            est_encia_post_impl_text: est_encia_post_impl_text,
            sut_post_impl: sut_post_impl,
            sut_post_impl_text: sut_post_impl_text,
            est_encia_post_impl: est_encia_post_impl,
            est_encia_post_impl_text: est_encia_post_impl_text,
            perd_osea_marg_post_impl: perd_osea_marg_post_impl,
            obs_control_post_implante: obs_control_post_implante,
            id_paciente: $('#id_paciente_fc').val(),
            id_lugar_atencion: $('#id_lugar_atencion').val(),
            id_ficha_atencion: $('#id_fc').val(),
            tipo:1,
            _token: CSRF_TOKEN
        }

        console.log(data);

        let url = "{{ ROUTE('profesional.adm_dental.guardar_pieza_dental_post_impl') }}";

        $.ajax({
            type: 'post',
            url: url,
            data: data,
            success: function(resp) {
                console.log(resp);
                if (resp.mensaje == 'OK') {
                    swal({
                        title: "Guardado",
                        text: "Registro guardado correctamente",
                        icon: "success",
                        button: "Aceptar",
                    });
                    $('#contenedor_pieza_post_implantada').empty();
                    $('#contenedor_pieza_post_implantada').append(resp.v);
                    $('#pieza_post_implantada').empty();
                    if (resp.examenes && resp.examenes.length > 0) {
                        let detalleHistoria = resp.examenes.map(implante => {
                            let detalle =
                                `La pieza ${implante.numero_pieza} presenta las siguientes observaciones:\n`;

                            // Móvil
                            if (implante.movil === "Sí") {
                                detalle +=
                                    `Se observa movilidad en la pieza${implante.obs_movil ? `, descrita como: ${implante.obs_movil}` : ''}. `;
                            } else {
                                detalle += `No se observa movilidad en la pieza. `;
                            }

                            // Posición
                            if (implante.posicion === "Correcta") {
                                detalle += `La posición del implante es adecuada. `;
                            } else {
                                detalle +=
                                    `La posición del implante es incorrecta, presentando las siguientes desviaciones: ` +
                                    `vestíbulo-palatino: ${implante.vp || 'N/A'}, ` +
                                    `vestíbulo-lingual: ${implante.vl || 'N/A'}, ` +
                                    `mesio-distal: ${implante.md || 'N/A'} y ` +
                                    `cráneo-caudal: ${implante.cc || 'N/A'}. `;
                            }

                            // Exposición de espiras
                            if (implante.exp_espiras === "Sí") {
                                detalle +=
                                    `Se evidencia exposición de espiras${implante.obs_exp_espiras ? `, descrita como: ${implante.obs_exp_espiras}` : ''}. `;
                            } else {
                                detalle += `No se observa exposición de espiras. `;
                            }

                            // Supuración
                            if (implante.supuracion === "Sí") {
                                detalle +=
                                    `Se detecta presencia de supuración${implante.obs_supuracion ? `, descrita como: ${implante.obs_supuracion}` : ''}. `;
                            } else {
                                detalle += `No se observa supuración. `;
                            }

                            // Estado de la encía
                            if (implante.estado_encia === "Anormal") {
                                detalle +=
                                    `El estado de la encía es anormal, descrito como: ${implante.obs_estado_encia || 'Sin observación'}. `;
                            } else {
                                detalle += `El estado de la encía es normal. `;
                            }

                            // Pérdida ósea marginal
                            if (implante.perdida_osea_marginal) {
                                detalle +=
                                    `Se reporta una pérdida ósea marginal de aproximadamente ${implante.perdida_osea_marginal}. `;
                            }

                            // Observaciones generales
                            if (implante.observaciones) {
                                detalle += `Observaciones adicionales: ${implante.observaciones}. `;
                            }

                            return detalle;
                        }).join("\n\n");

                        $('#det_cir_man').val(detalleHistoria);
                        mostrar_nueva_pieza_post_impl(1000);
                    } else {
                        $('#det_cir_man').val('No hay detalles del control de implantes disponibles.');
                    }


                } else {
                    swal({
                        title: "Error",
                        text: resp.mensaje,
                        icon: "error",
                        button: "Aceptar",
                    });
                }
            },
            error: function(error) {
                console.log(error);
            }
        })

    }

    function guardar_pieza_dental_post_impl_otro(counter) {
        let nombre_implantologo = $('#nombre_implantologo').val();
        let numero_pieza = $('#numero_pieza_post_impl_otro' + counter).val();

        let estab_post_implante = $('#estab_post_implante_otro' + counter).val();
        let estab_post_implante_text = $('#estab_post_implante_otro' + counter + ' option:selected')
            .text(); // Obtiene el texto de la opción seleccionada

        if (estab_post_implante == 2) {
            estab_post_implante_text = $('#obs_estab_post_implante_otro' + counter).val();
        }

        let posc_post_impl = $('#posc_post_impl_otro' + counter).val();
        let posc_post_impl_text = $('#posc_post_impl_otro' + counter + ' option:selected').text();
        if (posc_post_impl == 2) {
            posc_post_impl_text = $('#obs_estab_post_implante_otro' + counter).val();
        }

        let exp_esp_post_impl = $('#exp_esp_post_impl_otro' + counter).val();
        let exp_esp_post_impl_text = $('#exp_esp_post_impl_otro' + counter + ' option:selected').text();
        if (exp_esp_post_impl == 2) {
            exp_esp_post_impl_text = $('#obs_exp_esp_post_impl_otro' + counter).val();
        }
        let sut_post_impl = $('#sut_post_impl_otro' + counter).val();
        let sut_post_impl_text = $('#sut_post_impl_otro' + counter + ' option:selected')
            .text(); // Obtiene el texto de la opción seleccionada
        if (sut_post_impl == 2) {
            sut_post_impl_text = $('#obs_sut_post_impl_otro' + counter).val();
        }

        let est_encia_post_impl = $('#est_encia_post_impl_otro' + counter).val();
        let est_encia_post_impl_text = $('#est_encia_post_impl_otro' + counter + ' option:selected')
            .text(); // Obtiene el texto de la opción seleccionada

        if (est_encia_post_impl == 2) {
            est_encia_post_impl_text = $('#obs_est_encia_post_impl_otro' + counter).val();
        }

        let perd_osea_marg_post_impl = $('#perd_osea_marg_post_impl_otro' + counter).val();

        let obs_control_post_implante = $('#obs_control_post_implante_otro' + counter).val();


        let valido = 1;
        let mensaje = '';

        if (nombre_implantologo == '') {
            valido = 0;
            mensaje += '<li>Campo requerido Nombre Implantólogo</li>';
        }

        if (numero_pieza == '' || numero_pieza == 0) {
            valido = 0;
            mensaje += '<li>Campo requerido N° Pieza </li>';
        }

        if (perd_osea_marg_post_impl == '') {
            valido = 0;
            mensaje += '<li>Campo requerido Pérdida ósea marginal</li>';
        }

        if (obs_control_post_implante == '') {
            valido = 0;
            mensaje += '<li>Campo requerido Observaciones al control del implante</li>';
        }

        if (valido == 0) {
            swal({
                title: "Campos requeridos",
                content: {
                    element: "div",
                    attributes: {
                        innerHTML: mensaje,
                    },
                },
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });
            return false;
        }

        let data = {
            numero_pieza: numero_pieza,
            estab_post_implante: estab_post_implante,
            estab_post_implante_text: estab_post_implante_text,
            posc_post_impl: posc_post_impl,
            posc_post_impl_text: posc_post_impl_text,
            exp_esp_post_impl: exp_esp_post_impl,
            exp_esp_post_impl_text: exp_esp_post_impl_text,
            est_encia_post_impl: est_encia_post_impl,
            est_encia_post_impl_text: est_encia_post_impl_text,
            sut_post_impl: sut_post_impl,
            sut_post_impl_text: sut_post_impl_text,
            est_encia_post_impl: est_encia_post_impl,
            est_encia_post_impl_text: est_encia_post_impl_text,
            perd_osea_marg_post_impl: perd_osea_marg_post_impl,
            obs_control_post_implante: obs_control_post_implante,
            id_paciente: $('#id_paciente_fc').val(),
            id_lugar_atencion: $('#id_lugar_atencion').val(),
            id_ficha_atencion: $('#id_fc').val(),
            tipo:2,
            nombre_implantologo: nombre_implantologo,
            _token: CSRF_TOKEN
        }

        console.log(data);

        let url = "{{ ROUTE('profesional.adm_dental.guardar_pieza_dental_post_impl') }}";

        $.ajax({
            type: 'post',
            url: url,
            data: data,
            success: function(resp) {
                console.log(resp);
                if (resp.mensaje == 'OK') {
                    cargar_a_presupuesto_manten_impl(numero_pieza);
                    swal({
                        title: "Guardado",
                        text: "Registro guardado correctamente",
                        icon: "success",
                        button: "Aceptar",
                    });
                    $('#contenedor_pieza_post_implantada').empty();
                    $('#contenedor_pieza_post_implantada').append(resp.v);
                    $('#pieza_post_implantada').empty();
                    if (resp.examenes && resp.examenes.length > 0) {
                        let detalleHistoria = resp.examenes.map(implante => {
                            let detalle =
                                `La pieza ${implante.numero_pieza} presenta las siguientes observaciones:\n`;

                            // Móvil
                            if (implante.movil === "Sí") {
                                detalle +=
                                    `Se observa movilidad en la pieza${implante.obs_movil ? `, descrita como: ${implante.obs_movil}` : ''}. `;
                            } else {
                                detalle += `No se observa movilidad en la pieza. `;
                            }

                            // Posición
                            if (implante.posicion === "Correcta") {
                                detalle += `La posición del implante es adecuada. `;
                            } else {
                                detalle +=
                                    `La posición del implante es incorrecta, presentando las siguientes desviaciones: ` +
                                    `vestíbulo-palatino: ${implante.vp || 'N/A'}, ` +
                                    `vestíbulo-lingual: ${implante.vl || 'N/A'}, ` +
                                    `mesio-distal: ${implante.md || 'N/A'} y ` +
                                    `cráneo-caudal: ${implante.cc || 'N/A'}. `;
                            }

                            // Exposición de espiras
                            if (implante.exp_espiras === "Sí") {
                                detalle +=
                                    `Se evidencia exposición de espiras${implante.obs_exp_espiras ? `, descrita como: ${implante.obs_exp_espiras}` : ''}. `;
                            } else {
                                detalle += `No se observa exposición de espiras. `;
                            }

                            // Supuración
                            if (implante.supuracion === "Sí") {
                                detalle +=
                                    `Se detecta presencia de supuración${implante.obs_supuracion ? `, descrita como: ${implante.obs_supuracion}` : ''}. `;
                            } else {
                                detalle += `No se observa supuración. `;
                            }

                            // Estado de la encía
                            if (implante.estado_encia === "Anormal") {
                                detalle +=
                                    `El estado de la encía es anormal, descrito como: ${implante.obs_estado_encia || 'Sin observación'}. `;
                            } else {
                                detalle += `El estado de la encía es normal. `;
                            }

                            // Pérdida ósea marginal
                            if (implante.perdida_osea_marginal) {
                                detalle +=
                                    `Se reporta una pérdida ósea marginal de aproximadamente ${implante.perdida_osea_marginal}. `;
                            }

                            // Observaciones generales
                            if (implante.observaciones) {
                                detalle += `Observaciones adicionales: ${implante.observaciones}. `;
                            }

                            return detalle;
                        }).join("\n\n");

                        $('#det_cir_man').val(detalleHistoria);
                        mostrar_nueva_pieza_post_impl(1000);
                    } else {
                        $('#det_cir_man').val('No hay detalles del control de implantes disponibles.');
                    }


                } else {
                    swal({
                        title: "Error",
                        text: resp.mensaje,
                        icon: "error",
                        button: "Aceptar",
                    });
                }
            },
            error: function(error) {
                console.log(error);
            }
        })

    }

    function cargar_a_presupuesto_manten_impl(numero_pieza){
        var ttoPiezas = $('#procedimiento_post_impl_autocomplete1000').val(); // id de mantencion de implantes
        var piezasSeleccionadas = [];
        piezasSeleccionadas.push(numero_pieza);
        let valido = 1;
        let mensaje = '';

        if(piezasSeleccionadas.length == 0){
            valido = 0;
            mensaje += '<li>Piezas seleccionadas </li>'
        }
        if(ttoPiezas == ''){
            valido = 0;
            mensaje += '<li>Tratamiento </li>';
        }

        if(valido == 0){
            swal({
                    title: "Campos requeridos",
                    content:{
                        element: "ul",
                        attributes: {
                            innerHTML: mensaje
                        }
                    },
                    icon: "error",
                });
                return false;
        }

        let url = "{{ ROUTE('dental.cargar_tratamiento_presupuesto_period') }}";
        let data = {
            piezas: piezasSeleccionadas,
            tto: ttoPiezas, // id de mantencion de implantes
            id_ficha_atencion: $('#id_fc').val(),
            id_lugar_atencion: $('#id_lugar_atencion').val(),
            id_paciente: $('#id_paciente_fc').val(),
            _token: "{{ csrf_token() }}"
        }
        console.log(data);
        $.ajax({
            type:'post',
            url: url,
            data: data,
            success: function(resp){
                console.log(resp);
                if(resp.status == 1){
                    swal({
                        icon:'success',
                        title:'Info',
                        text: resp.mensaje
                    });
                    let odontograma = resp.odontograma_paciente;
                    odontograma_global = odontograma;
                    let html = '';
                    odontograma.forEach(function(odonto){
                        html += '<tr>';
                        html += '<td>'+odonto.fecha+'</td>';
                        html += '<td>'+odonto.tratamiento+'</td>';
                        html += '<td>'+odonto.caras+'</td>';
                        html += '<td>'+odonto.pieza+'</td>';
                        html += '<td>'+odonto.diagnostico+'</td>';
                        html += '<td>'+formatoMoneda(odonto.valor)+'</td>';
                        // html += '<td>';
                        // html += '<button type="button" class="btn btn-danger btn-sm" onclick="eliminar_odontograma('+odonto.id+')"><i class="feather icon-x"></i>Eliminar</button>';
                        // if(odonto.presupuesto == 0){
                        //     html += '<button type="button" class="btn btn-primary btn-sm" onclick="cargar_a_presupuesto('+odonto.id+')"><i class="fas fa-save"></i>Cargar a presupuesto</button>';
                        // }else{
                        //     html += '<button type="button" class="btn btn-danger btn-sm" onclick="sacar_de_presupuesto('+odonto.id+')"><i class="feather icon-x"></i>Sacar de presupuesto</button>';
                        // }

                        // html += '</td>';
                        // Checkbox para seleccionar el odontograma
                        html += '<td>';
                        html += '<div class="form-check">';
                        html += '<input class="form-check-input" type="checkbox" value="' + odonto.id + '" '
                        html += odonto.presupuesto == 1 ? 'checked ' : '';
                        html += 'onchange="togglePresupuesto(' + odonto.id + ', this.checked)">';
                        html += '<label class="form-check-label"></label>';
                        html += '</div>';
                        html += '</td>';
                        html += '<td>';
                        html += '<div class="form-check">';
                        html += '<input class="form-check-input checkbox-seleccion" type="checkbox" value="' + odonto.id + '" ';
                        html += 'id="seleccionCheck' + odonto.id + '" ';
                        html += 'onchange="toggleSeleccion(' + odonto.id + ', this.checked)">';
                        html += '<label class="form-check-label" for="seleccionCheck' + odonto.id + '"></label>';
                        html += '</div>';
                        html += '</td>';
                        html += '</tr>';
                    });
                    $('#contenedor_examenes_grupos_dentales').empty();
                    $('#contenedor_examenes_grupos_dentales').append(resp.vista_presupuestos);
                    $('#table_odontograma tbody').html(html);
                    $('#contenedor_piezas_dentales_presupuesto').empty();
                    $('#table_trabajos_presupuesto tbody').empty();
                    odontograma.forEach(function(odonto){
                            if(odonto.presupuesto == 1){
                                    $('#contenedor_piezas_dentales_presupuesto').append(`
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="card-informacion">
                                                <div class="card-body pb-0">
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-12 col-md-3 col-lg-1 col-xl-1 fill">
                                                            <label class="floating-label-activo-sm">Pieza</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${odonto.pieza}">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-9 col-lg-4 col-xl-4 fill">
                                                            <label class="floating-label-activo-sm">Prestación</label>
                                                            <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${odonto.descripcion}">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-4 col-lg-2 col-xl-2 fill">
                                                            <label class="floating-label-activo-sm">Sub-Total</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(formatoMoneda(odonto.valor))}" >
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-3 col-lg-2 col-xl-2">
                                                            <label class="floating-label-activo-sm">Descuento</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-4 col-lg-2 col-xl-2 fill">
                                                            <label class="floating-label-activo-sm">Total prestación</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(formatoMoneda(odonto.valor))}" >
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-1 col-lg-1 col-xl-1 d-flex">
                                                            <button type="button" class="btn btn-danger btn-icon" onclick="eliminar_odontograma(${odonto.id})"><i class="feather icon-x"></i> </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    `);
                                $('#table_trabajos_presupuesto tbody').append(`
                                    <tr>
                                        <td>${odonto.fecha}</td>
                                        <td>${odonto.diagnostico} </td>
                                        <td>${odonto.caras} </td>
                                        <td>${odonto.pieza} </td>
                                        <td>${odonto.tratamiento} </td>
                                        <td>${formatoMoneda(odonto.valor)} </td>
                                        <td> </td>
                                        <td>
                                            <button type="button" class="btn btn-secondary btn-sm" onclick="atender_procedimiento(${odonto.id},'${odonto.tratamiento}',${odonto.pieza})"><i class="fas fa-check"></i>Atender</button>
                                        </td>
                                    </tr>
                                `);
                            }
                    });
                    let valores_boca_general = resp.valores[0];
                    let valores_odontograma = resp.valores[1];
                    let valores_insumos = resp.valores[2];
                    let total_general = valores_boca_general + valores_odontograma + valores_insumos;
                    $('#valores_examenes_presupuesto').html(formatoMoneda(valores_boca_general));
                    $('#valores_examenes_presupuesto_conf').html(formatoMoneda(valores_boca_general));
                    $('#valores_piezas_presupuesto').html(formatoMoneda(valores_odontograma));
                    $('#valores_piezas_presupuesto_conf').html(formatoMoneda(valores_odontograma));
                    $('#valores_total_final_presupuesto').html(formatoMoneda(total_general));
                    $('#valores_total_final_presupuesto_conf').html(formatoMoneda(total_general));
                    $('#subtotal_clinico').val(formatoMoneda(valores_boca_general + valores_odontograma));
                    $('#total_clinico').val(formatoMoneda(valores_boca_general + valores_odontograma));
                    $('#total_presupuesto_dental').val(total_general);
                    $('#total_presupuesto').val(formatoMoneda(total_general));

                    $('#monto_total').html(formatoMoneda(valores_insumos)+' + '+formatoMoneda(valores_odontograma + valores_boca_general)+' = '+formatoMoneda(total_general));

                    let table_impl = $('#table_piezas_presupuesto_odonto_impl').DataTable();
                    table_impl.clear().draw();

                    odontograma.forEach(function(pieza) {
                        // Agregar una nueva fila a la tabla
                        let rowNode = table_impl.row.add([
                            pieza.pieza,
                            pieza.descripcion,
                            formatoMoneda(formatoMoneda(pieza.valor)),
                            '<button type="button" class="btn btn-danger btn-icon" onclick="eliminar_odontograma(' +
                            pieza.id + ')"><i class="feather icon-x"> </i> </button>'

                        ]).draw(false).node(); // Obtener el nodo de la fila
                    });
                    

                    let table = $('#presup_estado_pago').DataTable();
                    table.clear().draw();

                    // Recorrer el odontograma y agregar nuevas filas
                    odontograma.forEach(function(odonto) {

                            if (odonto.presupuesto == 1) {
                                if(odonto.estado_pago == 'ok'){
                                    var clase = 'bg-success';
                                }else if(odonto.estado_pago == 'incompleto'){
                                    var clase = 'bg-warning';
                                }else{
                                    var clase = 'bg-danger';
                                }

                                if(odonto.estado == 0){
                                    var estado = 'PENDIENTE';
                                }else{
                                    var estado = 'TERMINADO';
                                }
                                // Agregar una nueva fila a la tabla
                                let rowNode = table.row.add([
                                    odonto.descripcion,
                                    odonto.pieza,
                                    formatoMoneda(formatoMoneda(odonto.valor)),
                                    0,
                                    formatoMoneda(formatoMoneda(odonto.valor)),
                                    '<div class="circle '+clase+'"></div>',
                                    estado, // Columna vacía

                                ]).draw(false).node(); // Obtener el nodo de la fila

                                // Agregar clases a la fila
                                $(rowNode).addClass('text-center align-middle status-circle');
                            }
                    });
                    //limpiar_formulario_cargar_presupuesto_g();
                    $('#table_pagos_reasignar_odontograma tbody').empty();
                    odontograma.forEach(function(odonto) {
                        if (odonto.presupuesto == 1) {
                            let fila = `<tr>
                                <td><input type="checkbox" class="valor-checkbox" data-valor="${odonto.valor}" data-id="${odonto.id}" data-info="odonto"></td>
                                <td>${odonto.pieza}</td>
                                <td>${formatoMoneda(odonto.valor)}</td>
                                <td><button type="button" class="btn btn-danger" onclick="eliminar_odontograma(${odonto.id})"><i class="feather icon-x"> </i> </button></td>
                            </tr>`;
                            $('#table_pagos_reasignar_odontograma tbody').append(fila);
                        }
                    });
                }else{
                    swal({
                        icon:'error',
                        title:'info',
                        text: resp.mensaje
                    });
                }


                $('#tratamiento_presupuesto tbody').empty();
                let presupuesto = resp.presupuesto;
                console.log(presupuesto);
                $('#tratamiento_presupuesto tbody').append(`
                <tr>
                    <td class="text-center align-middle">${presupuesto.fecha}</td>
                    <td class="text-center align-middle">${presupuesto.id}</td>
                    <td class="text-center align-middle">${presupuesto.aprobado}</td>
                    <td class="text-center align-middle">Sector I</td>
                    <td class="text-center align-middle">${presupuesto.boca}</td>

                    <td class="text-center align-middle">
                        <div class="form-group col-md-4">
                            <div class="switch switch-success d-inline m-r-2">
                                <input type="checkbox" id="info_finalizado" checked="">
                                <label for="info_finalizado" class="cr"></label>
                            </div>
                            <label>Realizado?</label>
                        </div>
                    </td>
                    <td class="text-center align-middle">
                        ${presupuesto.fecha}
                    </td>
                    <td class="text-center align-middle">
                        <button type="button" class="btn btn-info btn-sm" onclick="presupuesto()" ;="">
                            <i class="fa fa-plus"></i> Trabajar en pieza
                        </button>
                    </td>
                </tr>
                `);

            },
            error: function(error){
                console.log(error.responseText);
            }
        });
    }
</script>
