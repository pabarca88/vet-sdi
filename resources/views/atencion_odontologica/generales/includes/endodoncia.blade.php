<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card-a">
        <div class="card-header-a" id="exam_esp_end">
            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button"
                data-toggle="collapse" data-target="#exam_esp_end-c" aria-expanded="false" aria-controls="exam_esp_end-c">
                Examen Especialidad Endodóncia
            </button>
        </div>
        <div id="exam_esp_end-c" class="collapse" aria-labelledby="exam_esp_end" data-parent="#exam_esp_end">
            <div class="card-body-aten-a shadow-none">
                <div id="form-endo-adulto">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <ul class="nav nav-tabs-aten nav-fill mb-10" id="orl_adulto" role="tablist">

                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset active" id="ex_oral_end-tab" data-toggle="tab"
                                        href="#ex_oral_end" role="tab" aria-controls="ex_oral_end"
                                        aria-selected="true">Examen Oral</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="endo_pieza_end-tab"
                                        onclick="mostrar_pieza_dental_examen_end(1000)" data-toggle="tab"
                                        href="#endo_pieza_end" role="tab" aria-controls="endo_pieza_end"
                                        aria-selected="true">Examen Por Pieza</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="plan_endo_end-tab" data-toggle="tab"
                                        href="#plan_endo_end" role="tab" aria-controls="plan_endo_end"
                                        aria-selected="true">Planificación de tratamiento</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="hosp_endodoncia-tab" data-toggle="tab"
                                        href="#hosp_endodoncia" role="tab" aria-controls="hosp_endodoncia"
                                        aria-selected="true">Hospitalización</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="control_endo-tab" data-toggle="tab"
                                        href="#control_endo" role="tab" aria-controls="control_endo"
                                        aria-selected="true" onclick="proxima_atencion_paciente()">Control e
                                        indicaciones</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="tab-content" id="endo_adulto">


                                <!--EXAMEN  ORAL-->
                                <div class="tab-pane fade show active" id="ex_oral_end" role="tabpanel"
                                    aria-labelledby="ex_oral_end-tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-2">
                                                            <div class="nav flex-column nav-pills mb-3" id="v-pills-tab"
                                                                role="tablist" aria-orientation="vertical">
                                                                <a class="nav-link-aten text-reset active"
                                                                    id="intraoral_tab" data-toggle="tab"
                                                                    href="#intraoral_end" role="tab"
                                                                    aria-controls="intraoral_end"
                                                                    aria-selected="true">Intra-Oral</a>
                                                                <a class="nav-link-aten text-reset"
                                                                    id="endo_ex_boca_general_tab" data-toggle="tab"
                                                                    href="#endo_ex_boca_general" role="tab"
                                                                    aria-controls="endo_ex_boca_general"
                                                                    aria-selected="true">Examen Boca General</a>
                                                                <a class="nav-link-aten text-reset" id="extra_oral_tab"
                                                                    data-toggle="tab" href="#extra_oral_end"
                                                                    role="tab" aria-controls="extra_oral_end"
                                                                    aria-selected="true">Extra Oral</a>
                                                                <a class="nav-link-aten text-reset"
                                                                    id="radiologia_endo_tab" data-toggle="tab"
                                                                    href="#radiologia_endo_end"
                                                                    onclick="mostrar_nueva_pieza_ex_radio_end(1000)"
                                                                    role="tab" aria-controls="radiologia_endo_end"
                                                                    aria-selected="false">Ex. Radiológico</a>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-10 col-xl-10">
                                                            <div class="tab-content" id="v-pills-tabContent">
                                                                <div class="tab-pane fade show active"
                                                                    id="intraoral_end" role="tabpanel"
                                                                    aria-labelledby="intraoral_end_tab">

                                                                    <div class="form-row">
                                                                        <div
                                                                            class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    class="floating-label-activo-sm">Aspecto
                                                                                    General</label>
                                                                                <select name="end_intra_general"
                                                                                    id="end_intra_general"
                                                                                    data-titulo="Apreciación Respiratoria"
                                                                                    data-seccion="Naríz"
                                                                                    class="form-control form-control-sm"
                                                                                    onchange="evaluar_para_carga_detalle('end_intra_general','end_div_detalle_intra_general','end_det_intra_general',2)">
                                                                                    <option value="0">Seleccione
                                                                                    </option>
                                                                                    <option value="1">Aceptable
                                                                                    </option>
                                                                                    <option value="2">Deficiente
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group"
                                                                                id="end_div_detalle_intra_general"
                                                                                style="display:none">
                                                                                <label
                                                                                    class="floating-label-activo-sm">Detalle
                                                                                    Aspecto
                                                                                    General<i>(describir)</i></label>
                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz"
                                                                                    rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="end_det_intra_general"
                                                                                    id="end_det_intra_general"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    class="floating-label-activo-sm">Periodonto</label>
                                                                                <select name="end_periodonto"
                                                                                    id="end_periodonto"
                                                                                    data-titulo="Apreciación Respiratoria"
                                                                                    data-seccion="Naríz"
                                                                                    class="form-control form-control-sm"
                                                                                    onchange="evaluar_para_carga_detalle('end_periodonto','end_div_detalle_periodonto','end_aprec_periodonto',2)">
                                                                                    <option value="0">Seleccione
                                                                                    </option>
                                                                                    <option value="1">Aceptable
                                                                                    </option>
                                                                                    <option value="2">Deficiente
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group"
                                                                                id="end_div_detalle_periodonto"
                                                                                style="display:none">
                                                                                <label
                                                                                    class="floating-label-activo-sm">Periodonto<i>(describir)</i></label>
                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz"
                                                                                    rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="end_aprec_periodonto"
                                                                                    id="end_aprec_periodonto"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <!--EXAMEN  BOCA GENERAL-->
                                                                <div class="tab-pane fade show"
                                                                    id="endo_ex_boca_general" role="tabpanel"
                                                                    aria-labelledby="endo_ex_boca_general-tab">


                                                                    <div class="row mb-3">
                                                                        <div
                                                                            class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                                            <button type="button"
                                                                                class="btn btn-outline-primary btn-sm btn-block"
                                                                                onclick="maxilar_superior()";><i
                                                                                    class="feather icon-edit-1"></i>
                                                                                Maxilar superior</button>

                                                                        </div>
                                                                        <div
                                                                            class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                                            <button type="button"
                                                                                class="btn btn-outline-primary btn-sm btn-block"
                                                                                onclick="maxilar_inferior()";><i
                                                                                    class="feather icon-edit-1"></i>
                                                                                Maxilar inferior</button>

                                                                        </div>
                                                                        <div
                                                                            class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                                            <button type="button"
                                                                                class="btn btn-outline-primary btn-sm btn-block"
                                                                                onclick="boca_completa()";><i
                                                                                    class="feather icon-edit-1"></i>
                                                                                Boca Completa</button>

                                                                        </div>
                                                                        {{-- <div class="col-md-3 px-1 py-1">
                                                                            <button type="button" class="btn btn-outline-primary btn-sm btn-block"
                                                                                onclick="prest_lab();"><i class="feather icon-edit-1"></i>Solicitud de laboratorio</button>

                                                                        </div> --}}
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="table-responsive">
                                                                                <table
                                                                                    class="table table-bordered table-xs"
                                                                                    id="table_tto_boca_gral">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>Fecha</th>
                                                                                            <th>Lugar</th>
                                                                                            <th>Diagnóstico</th>
                                                                                            <th>Tratamiento</th>
                                                                                            <th>Comentarios</th>
                                                                                            <th>Valor</th>
                                                                                            <th>Acciones</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        @foreach ($todos as $diagnostico)
                                                                                            <tr>
                                                                                                <td>{{ $diagnostico->fecha }}
                                                                                                </td>
                                                                                                <td>{{ $diagnostico->localizacion }}
                                                                                                </td>
                                                                                                <td>{{ $diagnostico->descripcion }}
                                                                                                </td>
                                                                                                <td>{{ $diagnostico->diagnostico_tratamiento }}
                                                                                                </td>
                                                                                                <td>{{ $diagnostico->comentario }}
                                                                                                </td>
                                                                                                <td>${{ number_format($diagnostico->valor, 0, ',', '.') }}
                                                                                                </td>
                                                                                                <td>
                                                                                                    <button
                                                                                                        type="button"
                                                                                                        class="btn btn-danger btn-sm btn-icon"
                                                                                                        onclick="eliminar_diagnostico({{ $diagnostico->id }},'gral')">
                                                                                                        <i
                                                                                                            class="feather icon-x"></i>
                                                                                                    </button>
                                                                                                    @if ($diagnostico->presupuesto == 0)
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="btn btn-primary btn-sm btn-icon"
                                                                                                            onclick="cargar_a_presupuesto({{ $diagnostico->id }},'gral', this)">
                                                                                                            <i
                                                                                                                class="feather icon-shopping-cart"></i>
                                                                                                        </button>
                                                                                                    @else
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="btn btn-danger btn-sm btn-icon"
                                                                                                            onclick="sacar_de_presupuesto({{ $diagnostico->id }},'gral', this)">
                                                                                                            <i
                                                                                                                class="feather icon-log-out"></i>
                                                                                                        </button>
                                                                                                    @endif
                                                                                                </td>
                                                                                            </tr>
                                                                                        @endforeach
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane fade show" id="extra_oral_end"
                                                                    role="tabpanel"
                                                                    aria-labelledby="extra_oral_end_tab">
                                                                    <div class="col-sm-12 col-md-12">
                                                                        <div class="form-row">
                                                                            <div
                                                                                class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="floating-label-activo-sm"
                                                                                        style="color:#CE0909;">Aumento
                                                                                        de Volumen</label>
                                                                                    <select name="end_aum_vol"
                                                                                        id="end_aum_vol"
                                                                                        data-titulo="Examen Fosa Nasal Der."
                                                                                        data-seccion="Naríz"
                                                                                        class="form-control form-control-sm"
                                                                                        onchange="evaluar_para_carga_detalle('end_aum_vol','end_div_detalle_aum_vol','end_ex_aum_vol',2);">
                                                                                        <option value="0">
                                                                                            Seleccione</option>
                                                                                        <option value="1">No
                                                                                        </option>
                                                                                        <option value="2">
                                                                                            Si<i>(describir)</i>
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group"
                                                                                    id="end_div_detalle_aum_vol"
                                                                                    style="display:none">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red">Aumento
                                                                                        de
                                                                                        Volumen<i>(describir)</i></label>
                                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Examen Fosa Nasal Der." data-seccion="Naríz"
                                                                                        rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="end_ex_aum_vol" id="end_ex_aum_vol"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="floating-label-activo-sm"
                                                                                        style="color:rgb(41, 90, 189);">Fístula</label>
                                                                                    <select name="end_fistula_endo"
                                                                                        id="end_fistula_endo"
                                                                                        data-titulo="Examen Fosa Nasal Izq."
                                                                                        data-seccion="Naríz"
                                                                                        class="form-control form-control-sm"
                                                                                        onchange="evaluar_para_carga_detalle('end_fistula_endo','end_div_detalle_fistula_endo','end_ex_fistula_endo',2);">
                                                                                        <option value="0">
                                                                                            Seleccione</option>
                                                                                        <option value="1">Normal
                                                                                        </option>
                                                                                        <option value="2">Anormal
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group"
                                                                                    id="end_div_detalle_fistula_endo"
                                                                                    style="display:none">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red">Fístula<i>(describir)</i></label>
                                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Examen Fosa Nasal Izq." data-seccion="Naríz"
                                                                                        rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="end_ex_fistula_endo" id="end_ex_fistula_endo"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="floating-label-activo-sm"
                                                                                        style="color:rgb(41, 90, 189);">Adenopatías</label>
                                                                                    <select name="end_adenopatias"
                                                                                        id="end_adenopatias"
                                                                                        data-titulo="Examen Fosa Nasal Izq."
                                                                                        data-seccion="Naríz"
                                                                                        class="form-control form-control-sm"
                                                                                        onchange="evaluar_para_carga_detalle('end_adenopatias','end_div_detalle_adenopatias','end_ex_adenopatias',2);">
                                                                                        <option value="0">
                                                                                            Seleccione</option>
                                                                                        <option value="1">Normal
                                                                                        </option>
                                                                                        <option value="2">Anormal
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group"
                                                                                    id="end_div_detalle_adenopatias"
                                                                                    style="display:none">
                                                                                    <label
                                                                                        class="floating-label-activo-sm t-red">Adenopatías<i>(describir)</i></label>
                                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Examen Fosa Nasal Izq." data-seccion="Naríz"
                                                                                        rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="end_ex_adenopatias" id="end_ex_adenopatias"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane fade show"
                                                                    id="radiologia_endo_end" role="tabpanel"
                                                                    aria-labelledby="radiologia_endo_end_tab">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                                    <div
                                                                                        id="contenedor_pieza_dental_endorx_endo">

                                                                                        @php $counter = 1; @endphp
                                                                                        @foreach ($examenes_rx_oral_end as $e)
                                                                                            <div class="card">
                                                                                                <div class="card-body">
                                                                                                    <div id="pieza_dentalrx{{ $counter }}"
                                                                                                        class="row">
                                                                                                        <div
                                                                                                            class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                            <div
                                                                                                                class="row">
                                                                                                                <div
                                                                                                                    class="col-md-6">
                                                                                                                    <div class="form-row"
                                                                                                                        id="contenedor_piezas_ex_oral_end">
                                                                                                                        <div
                                                                                                                            class="col-sm-12 col-md-12">
                                                                                                                            {{-- <div class="card">
                                                                                                                    <div class="form-row">
                                                                                                                        <div class="col-sm-12 col-md-12">
                                                                                                                            <h6 style="text-align: center;color:blue;bold">Subir imagen radiológica</h6>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="card-body-aten-a">
                                                                                                                        <div class="dropzone" id="mis-imagenes-imagenes-rx-dental_end_{{ $counter }}" action="{{ route('profesional.imagen.carga') }}"></div>
                                                                                                                    </div>
                                                                                                                </div> --}}

                                                                                                                            <!-- Vista previa de imágenes existentes -->
                                                                                                                            <div
                                                                                                                                class="form-row mt-2">
                                                                                                                                @if (!empty($e->decoded_imagenes))
                                                                                                                                    @foreach ($e->decoded_imagenes as $imagen)
                                                                                                                                        @foreach ($imagen['paths_imagenes'] ?? [] as $path)
                                                                                                                                            <div>
                                                                                                                                                <a href="javascript:void(0)"
                                                                                                                                                    onclick="amplificar_imagen('{{ $path }}')">
                                                                                                                                                    <img src="{{ asset('storage/' . str_replace('\\', '', $path)) }}"
                                                                                                                                                        alt="Imagen del examen"
                                                                                                                                                        class="img-fluid mx-2 imagen_rx">
                                                                                                                                                </a>
                                                                                                                                                <button
                                                                                                                                                    type="button"
                                                                                                                                                    class="btn btn-danger btn-sm my-2"
                                                                                                                                                    onclick="eliminar_rx_end({{ $imagen['id'] }})"><i
                                                                                                                                                        class="feather icon-x"></i></button>
                                                                                                                                            </div>
                                                                                                                                        @endforeach
                                                                                                                                    @endforeach
                                                                                                                                @else
                                                                                                                                    <p>No
                                                                                                                                        hay
                                                                                                                                        imágenes
                                                                                                                                        disponibles
                                                                                                                                        para
                                                                                                                                        este
                                                                                                                                        examen.
                                                                                                                                    </p>
                                                                                                                                @endif
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                                <div
                                                                                                                    class="col-md-6">
                                                                                                                    <div
                                                                                                                        class="form-row">
                                                                                                                        <div
                                                                                                                            class="col-12">
                                                                                                                            <div
                                                                                                                                class="form-group">
                                                                                                                                <label
                                                                                                                                    class="floating-label-activo-sm">Piezas
                                                                                                                                    N°</label>
                                                                                                                                <select
                                                                                                                                    class="form-control form-control-sm select2_rx_end"
                                                                                                                                    name="end_numero_pieza_{{ $counter }}[]"
                                                                                                                                    id="end_numero_pieza_{{ $counter }}"
                                                                                                                                    multiple>
                                                                                                                                    @foreach ([11, 12, 13, 14, 15, 16, 17, 18, 21, 22, 23, 24, 25, 26, 27, 28] as $pieza)
                                                                                                                                        <option
                                                                                                                                            value="{{ $pieza }}"
                                                                                                                                            {{ isset($e->numero_piezas) && in_array($pieza, (array) $e->numero_piezas) ? 'selected' : '' }}>
                                                                                                                                            {{ $pieza }}
                                                                                                                                        </option>
                                                                                                                                    @endforeach
                                                                                                                                </select>
                                                                                                                            </div>
                                                                                                                        </div>

                                                                                                                        <div
                                                                                                                            class="col-12">
                                                                                                                            <div
                                                                                                                                class="form-group">
                                                                                                                                <label
                                                                                                                                    class="floating-label-activo-sm">Espacio
                                                                                                                                    Periodontal
                                                                                                                                    Apical</label>
                                                                                                                                <select
                                                                                                                                    name="end_rx_esp_peri_apical{{ $counter }}"
                                                                                                                                    id="end_rx_esp_peri_apical{{ $counter }}"
                                                                                                                                    class="form-control form-control-sm"
                                                                                                                                    onchange="evaluar_para_carga_detalle('end_rx_esp_peri_apical','end_div_detalle_rx_esp_peri_apical_{{ $counter }}','end_det_rx_esp_peri_apical_{{ $counter }}',4)">
                                                                                                                                    <option
                                                                                                                                        value="0"
                                                                                                                                        @if ($e->espacio_periodontal == 0) selected @endif>
                                                                                                                                        Seleccione
                                                                                                                                    </option>
                                                                                                                                    <option
                                                                                                                                        value="1"
                                                                                                                                        @if ($e->espacio_periodontal == 1) selected @endif>
                                                                                                                                        Normal
                                                                                                                                    </option>
                                                                                                                                    <option
                                                                                                                                        value="2"
                                                                                                                                        @if ($e->espacio_periodontal == 2) selected @endif>
                                                                                                                                        Engrosado
                                                                                                                                    </option>
                                                                                                                                    <option
                                                                                                                                        value="3"
                                                                                                                                        @if ($e->espacio_periodontal == 3) selected @endif>
                                                                                                                                        Ausente
                                                                                                                                    </option>
                                                                                                                                    <option
                                                                                                                                        value="4"
                                                                                                                                        @if ($e->espacio_periodontal == 4) selected @endif>
                                                                                                                                        Otro
                                                                                                                                    </option>
                                                                                                                                </select>
                                                                                                                            </div>
                                                                                                                            <div class="form-group"
                                                                                                                                id="end_div_detalle_rx_esp_peri_apical_{{ $counter }}"
                                                                                                                                style="display:none">
                                                                                                                                <label
                                                                                                                                    class="floating-label-activo-sm">Espacio
                                                                                                                                    Periodontal
                                                                                                                                    Apical
                                                                                                                                    <i>(describir)</i></label>
                                                                                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                                                                    name="end_det_rx_esp_peri_apical_{{ $counter }}" id="end_det_rx_esp_peri_apical_{{ $counter }}">{{ $e->detalle_espacio ?? '' }}</textarea>
                                                                                                                            </div>
                                                                                                                        </div>

                                                                                                                        <div
                                                                                                                            class="col-12">
                                                                                                                            <div
                                                                                                                                class="form-group">
                                                                                                                                <label
                                                                                                                                    class="floating-label-activo-sm">Hueso
                                                                                                                                    Alveolar
                                                                                                                                    Apical</label>
                                                                                                                                <select
                                                                                                                                    name="end_h_apical{{ $counter }}"
                                                                                                                                    id="end_h_apical{{ $counter }}"
                                                                                                                                    class="form-control form-control-sm"
                                                                                                                                    onchange="evaluar_para_carga_detalle('end_h_apical','end_div_detalle_h_apical_{{ $counter }}','aprec_h_apical_{{ $counter }}',5)">
                                                                                                                                    <option
                                                                                                                                        value="0"
                                                                                                                                        @if ($e->hueso_alveolal == 0) selected @endif>
                                                                                                                                        Seleccione
                                                                                                                                    </option>
                                                                                                                                    <option
                                                                                                                                        value="1"
                                                                                                                                        @if ($e->hueso_alveolal == 1) selected @endif>
                                                                                                                                        Normal
                                                                                                                                    </option>
                                                                                                                                    <option
                                                                                                                                        value="2"
                                                                                                                                        @if ($e->hueso_alveolal == 2) selected @endif>
                                                                                                                                        Zona
                                                                                                                                        apical
                                                                                                                                        Difusa
                                                                                                                                    </option>
                                                                                                                                    <option
                                                                                                                                        value="3"
                                                                                                                                        @if ($e->hueso_alveolal == 3) selected @endif>
                                                                                                                                        Zona
                                                                                                                                        apical
                                                                                                                                        Corticalizada
                                                                                                                                    </option>
                                                                                                                                    <option
                                                                                                                                        value="4"
                                                                                                                                        @if ($e->hueso_alveolal == 4) selected @endif>
                                                                                                                                        Osteítis
                                                                                                                                        Condensante
                                                                                                                                    </option>
                                                                                                                                    <option
                                                                                                                                        value="5"
                                                                                                                                        @if ($e->hueso_alveolal == 5) selected @endif>
                                                                                                                                        Otro
                                                                                                                                    </option>
                                                                                                                                </select>
                                                                                                                            </div>
                                                                                                                            <div class="form-group"
                                                                                                                                id="end_div_detalle_h_apical_{{ $counter }}"
                                                                                                                                style="display:none">
                                                                                                                                <label
                                                                                                                                    class="floating-label-activo-sm">Hueso
                                                                                                                                    Alveolar
                                                                                                                                    Apical
                                                                                                                                    <i>(describir)</i></label>
                                                                                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                                                                    name="aprec_h_apical_{{ $counter }}" id="aprec_h_apical_{{ $counter }}">{{ $e->detalle_hueso ?? '' }}</textarea>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <div
                                                                                                                class="form-row mt-2">
                                                                                                                <div
                                                                                                                    class="col-md-6">
                                                                                                                    <div
                                                                                                                        class="form-group">
                                                                                                                        <label
                                                                                                                            class="floating-label-activo-sm">Informe
                                                                                                                            del
                                                                                                                            radiólogo</label>
                                                                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;"
                                                                                                                            name="inf_rad{{ $counter }}" id="inf_rad{{ $counter }}">{{ $e->informe_radiologo ?? '' }}</textarea>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div
                                                                                                                    class="col-md-6">
                                                                                                                    <div
                                                                                                                        class="form-group">
                                                                                                                        <label
                                                                                                                            class="floating-label-activo-sm">Observaciones
                                                                                                                            Examen
                                                                                                                            Pieza</label>
                                                                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;"
                                                                                                                            name="end_obs_ex_oral{{ $counter }}" id="end_obs_ex_oral{{ $counter }}">{{ $e->observaciones ?? '' }}</textarea>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="btn btn-icon btn-danger-light-c"
                                                                                                            onclick="eliminar_pieza_dental_rx_end({{ $e->id }})"><i
                                                                                                                class="feather icon-x"></i></button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                            @php $counter++; @endphp
                                                                                        @endforeach


                                                                                    </div>
                                                                                    <div id="nueva_pieza_end"></div>


                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div
                                                                        class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <label
                                                                            class="floating-label-activo-sm">Observaciones
                                                                            Examen Oral</label>
                                                                        <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Observaciones Examen Nasal"
                                                                            data-seccion="Naríz" data-tipo="general" onfocus="this.rows=2" onblur="this.rows=1;" name="end_obs_ex_oral"
                                                                            id="end_obs_ex_oral"></textarea>
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
                                <!--EXAMEN  POR PIEZA-->
                                <div class="tab-pane fade show" id="endo_pieza_end" role="tabpanel"
                                    aria-labelledby="endo_pieza_end-tab">

                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div id="nueva_pieza_dental_endo"></div>
                                                    <div id="contenedor_pieza_dental_endo">
                                                        @php $count = 1; @endphp
                                                        @foreach ($examenes_pieza_end as $examen)
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div class="mb-3">
                                                                        <div class="form-row">
                                                                            <div
                                                                                class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="floating-label-activo-sm">Pieza
                                                                                        N°</label>
                                                                                    <input type="text"
                                                                                        class="form-control form-control-sm"
                                                                                        name="n_pieza_ex_pp_end{{ $count }}"
                                                                                        id="n_pieza_ex_pp_end{{ $count }}"
                                                                                        value="{{ $examen->numero_pieza }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-5">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="floating-label-activo-sm">Zona
                                                                                        de Dolor</label>
                                                                                    <input type="text"
                                                                                        class="form-control form-control-sm"
                                                                                        name="ex_grl_zdolor_end{{ $count }}"
                                                                                        id="ex_grl_zdolor_end{{ $count }}"
                                                                                        value="{{ $examen->zona_dolor }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-5">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="floating-label-activo-sm">Historial
                                                                                        de la pieza</label>
                                                                                    <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                        name="ex_grl_hp_end{{ $count }}" id="ex_grl_hp_end{{ $count }}">{{ $examen->historia_anterior }}</textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row my-2">
                                                                            <div
                                                                                class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="floating-label-activo-sm">Intensidad</label>
                                                                                    <select
                                                                                        name="intensidad_end{{ $count }}"
                                                                                        id="intensidad_end{{ $count }}"
                                                                                        class="form-control form-control-sm"
                                                                                        onchange="evaluar_para_carga_detalle('intensidad_end{{ $count }}','div_intensidad_end{{ $count }}','obs_intensidad_end{{ $count }}',4);">
                                                                                        <option selected=""
                                                                                            value="1">Leve
                                                                                        </option>
                                                                                        <option value="2">Moderada
                                                                                        </option>
                                                                                        <option value="3">Severa
                                                                                        </option>
                                                                                        <option value="4">Intensa
                                                                                        </option>
                                                                                        <option value="5">Otro
                                                                                            (Describir)</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group"
                                                                                    id="div_intensidad_end{{ $count }}"
                                                                                    style="display:none;">
                                                                                    <label
                                                                                        class="floating-label-activo-sm">Intensidad</label>
                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                        name="obs_intensidad_end{{ $count }}" id="obs_intensidad_end{{ $count }}"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="floating-label-activo-sm">Modo
                                                                                        dolor</label>
                                                                                    <select
                                                                                        name="modo_dolor_end{{ $count }}"
                                                                                        id="modo_dolor_end{{ $count }}"
                                                                                        class="form-control form-control-sm"
                                                                                        onchange="evaluar_para_carga_detalle('modo_dolor_end{{ $count }}','div_modo_dolor_end{{ $count }}','obs_modo_dolor_end{{ $count }}',3);">
                                                                                        <option selected=""
                                                                                            value="1">Pulsátil
                                                                                        </option>
                                                                                        <option value="2">
                                                                                            Permanente</option>
                                                                                        <option value="3">Otro
                                                                                            (Describir)</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group"
                                                                                    id="div_modo_dolor_end{{ $count }}"
                                                                                    style="display:none;">
                                                                                    <label
                                                                                        class="floating-label-activo-sm">Modo
                                                                                        dolor</label>
                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                        name="obs_modo_dolor_end{{ $count }}" id="obs_modo_dolor_end{{ $count }}"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="floating-label-activo-sm">Localización</label>
                                                                                    <select
                                                                                        name="loc_dolor_end{{ $count }}"
                                                                                        id="loc_dolor_end{{ $count }}"
                                                                                        class="form-control form-control-sm"
                                                                                        onchange="evaluar_para_carga_detalle('loc_dolor_end{{ $count }}','div_loc_dolor_end{{ $count }}','obs_loc_dolor_end{{ $count }}',3);">
                                                                                        <option selected=""
                                                                                            value="1">Localizado
                                                                                        </option>
                                                                                        <option value="2">Referido
                                                                                        </option>
                                                                                        <option value="3">Otro
                                                                                            (Describir)</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group"
                                                                                    id="div_loc_dolor_end{{ $count }}"
                                                                                    style="display:none;">
                                                                                    <label
                                                                                        class="floating-label-activo-sm">Localización</label>
                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                        name="obs_loc_dolor_end{{ $count }}" id="obs_loc_dolor_end{{ $count }}"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="floating-label-activo-sm">Provocación
                                                                                        del Dolor</label>
                                                                                    <select
                                                                                        name="provocacion_dolor_end{{ $count }}"
                                                                                        data-titulo="Odontopediatria"
                                                                                        data-seccion="Odontopediatria"
                                                                                        id="provocacion_dolor_end{{ $count }}"
                                                                                        class="form-control form-control-sm"
                                                                                        onchange="evaluar_para_carga_detalle('provocacion_dolor_end{{ $count }}','div_provocacion_dolor_end{{ $count }}','obs_provocacion_dolor_end{{ $count }}',5);">
                                                                                        <option selected=""
                                                                                            value="1">Frío
                                                                                        </option>
                                                                                        <option value="2">Calor
                                                                                        </option>
                                                                                        <option value="3">
                                                                                            Actividad</option>
                                                                                        <option value="4">
                                                                                            Masticación</option>
                                                                                        <option value="5">Otro
                                                                                            (Describir)</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group"
                                                                                    id="div_provocacion_dolor_end{{ $count }}"
                                                                                    style="display:none;">
                                                                                    <label
                                                                                        class="floating-label-activo-sm">Provocación
                                                                                        del Dolor</label>
                                                                                    <textarea class="form-control form-control-sm" data-titulo="Odontopediatria" rows="1" onfocus="this.rows=3"
                                                                                        onblur="this.rows=1;" name="obs_provocacion_dolor_end{{ $count }}"
                                                                                        id="obs_provocacion_dolor_end{{ $count }}"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="floating-label-activo-sm">Observaciones</label>
                                                                                    <textarea class="form-control form-control-sm" data-titulo="Odontopediatria" rows="1" onfocus="this.rows=3"
                                                                                        onblur="this.rows=1;" name="obs_observaciones_end{{ $count }}"
                                                                                        id="obs_observaciones_end{{ $count }}"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div
                                                                                class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="floating-label-activo-sm">Resp.Calor</label>
                                                                                    <select
                                                                                        id="sel_endo_resp_calor{{ $count }}"
                                                                                        name="sel_endo_resp_calor{{ $count }}"
                                                                                        class="form-control form-control-sm"
                                                                                        style=" font-size: 14px; color: #232020">
                                                                                        <option
                                                                                            @if ($examen->resp_calor == 'N/R No realizada') selected @endif>
                                                                                            <span>N/R </span> No
                                                                                            realizada</option>
                                                                                        <option
                                                                                            @if ($examen->resp_calor == '↑ Aumentado') selected @endif>
                                                                                            <span>↑ </span> Aumentado
                                                                                        </option>
                                                                                        <option
                                                                                            @if ($examen->resp_calor == '↓ Disminuido') selected @endif>
                                                                                            <span>↓ </span> Disminuido
                                                                                        </option>
                                                                                        <option
                                                                                            @if ($examen->resp_calor == 'N Normal') selected @endif>
                                                                                            <span>N </span> Normal</a>
                                                                                        </option>
                                                                                        <option
                                                                                            @if ($examen->resp_calor == '(-) No responde') selected @endif>
                                                                                            <span>(-) </span> No
                                                                                            responde</a></option>
                                                                                    </select>
                                                                                </div>

                                                                            </div>
                                                                            <div
                                                                                class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="floating-label-activo-sm">Resp.Frio</label>
                                                                                    <select
                                                                                        id="sel_endo_resp_frio{{ $count }}"
                                                                                        name="sel_endo_resp_frio{{ $count }}"
                                                                                        class="form-control form-control-sm"
                                                                                        style=" font-size: 14px; color: #232020">
                                                                                        <option
                                                                                            @if ($examen->resp_frio == 'N/R No realizada') selected @endif>
                                                                                            <span>N/R </span> No
                                                                                            realizada</option>
                                                                                        <option
                                                                                            @if ($examen->resp_frio == '↑ Aumentado') selected @endif>
                                                                                            <span>↑ </span> Aumentado
                                                                                        </option>
                                                                                        <option
                                                                                            @if ($examen->resp_frio == '↓ Disminuido') selected @endif>
                                                                                            <span>↓ </span> Disminuido
                                                                                        </option>
                                                                                        <option
                                                                                            @if ($examen->resp_frio == 'N Normal') selected @endif>
                                                                                            <span>N </span> Normal</a>
                                                                                        </option>
                                                                                        <option
                                                                                            @if ($examen->resp_frio == '(-) No responde') selected @endif>
                                                                                            <span>(-) </span> No
                                                                                            responde</a></option>
                                                                                    </select>
                                                                                </div>

                                                                            </div>
                                                                            <div
                                                                                class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="floating-label-activo-sm">Eléctrico</label>
                                                                                    <select
                                                                                        id="sel_endo_resp_elect{{ $count }}"
                                                                                        name="sel_endo_resp_elect{{ $count }}"
                                                                                        class="form-control form-control-sm"
                                                                                        style=" font-size: 14px; color: #232020">
                                                                                        <option
                                                                                            @if ($examen->electrico == 'N/R No realizada') selected @endif>
                                                                                            <span>N/R </span> No
                                                                                            realizada</option>
                                                                                        <option
                                                                                            @if ($examen->electrico == '↑ Aumentado') selected @endif>
                                                                                            <span>↑ </span> Aumentado
                                                                                        </option>
                                                                                        <option
                                                                                            @if ($examen->electrico == '↓ Disminuido') selected @endif>
                                                                                            <span>↓ </span> Disminuido
                                                                                        </option>
                                                                                        <option
                                                                                            @if ($examen->electrico == 'N Normal') selected @endif>
                                                                                            <span>N </span> Normal</a>
                                                                                        </option>
                                                                                        <option
                                                                                            @if ($examen->electrico == '(-) No responde') selected @endif>
                                                                                            <span>(-) </span> No
                                                                                            responde</a></option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="floating-label-activo-sm">Percusión</label>
                                                                                    <select
                                                                                        id="sel_endo_resp_perc{{ $count }}"
                                                                                        name="sel_endo_resp_perc{{ $count }}"
                                                                                        class="form-control form-control-sm"
                                                                                        style=" font-size: 14px; color: #232020">
                                                                                        <option
                                                                                            @if ($examen->percusion == 'N/R No realizada') selected @endif>
                                                                                            <span>N/R </span> No
                                                                                            realizada</option>
                                                                                        <option
                                                                                            @if ($examen->percusion == '↑ Aumentado') selected @endif>
                                                                                            <span>↑ </span> Aumentado
                                                                                        </option>
                                                                                        <option
                                                                                            @if ($examen->percusion == '↓ Disminuido') selected @endif>
                                                                                            <span>↓ </span> Disminuido
                                                                                        </option>
                                                                                        <option
                                                                                            @if ($examen->percusion == 'N Normal') selected @endif>
                                                                                            <span>N </span> Normal</a>
                                                                                        </option>
                                                                                        <option
                                                                                            @if ($examen->percusion == '(-) No responde') selected @endif>
                                                                                            <span>(-) </span> No
                                                                                            responde</a></option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="floating-label-activo-sm">Exploración</label>
                                                                                    <select
                                                                                        id="sel_endo_resp_expl{{ $count }}"
                                                                                        name="sel_endo_resp_expl{{ $count }}"
                                                                                        class="form-control form-control-sm"
                                                                                        style=" font-size: 14px; color: #232020">
                                                                                        <option
                                                                                            @if ($examen->exploracion == 'N/R No realizada') selected @endif>
                                                                                            <span>N/R </span> No
                                                                                            realizada</option>
                                                                                        <option
                                                                                            @if ($examen->exploracion == '↑ Aumentado') selected @endif>
                                                                                            <span>↑ </span> Aumentado
                                                                                        </option>
                                                                                        <option
                                                                                            @if ($examen->exploracion == '↓ Disminuido') selected @endif>
                                                                                            <span>↓ </span> Disminuido
                                                                                        </option>
                                                                                        <option
                                                                                            @if ($examen->exploracion == 'N Normal') selected @endif>
                                                                                            <span>N </span> Normal</a>
                                                                                        </option>
                                                                                        <option
                                                                                            @if ($examen->exploracion == '(-) No responde') selected @endif>
                                                                                            <span>(-) </span> No
                                                                                            responde</a></option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="floating-label-activo-sm">Cavitaria</label>
                                                                                    <select
                                                                                        id="sel_endo_cavitaria{{ $count }}"
                                                                                        name="sel_endo_cavitaria{{ $count }}"
                                                                                        class="form-control form-control-sm"
                                                                                        style=" font-size: 14px; color: #232020">
                                                                                        <option
                                                                                            @if ($examen->cavitaria == 'N/R No realizada') selected @endif>
                                                                                            <span>N/R </span> No
                                                                                            realizada</option>
                                                                                        <option
                                                                                            @if ($examen->cavitaria == '↑ Aumentado') selected @endif>
                                                                                            <span>↑ </span> Aumentado
                                                                                        </option>
                                                                                        <option
                                                                                            @if ($examen->cavitaria == '↓ Disminuido') selected @endif>
                                                                                            <span>↓ </span> Disminuido
                                                                                        </option>
                                                                                        <option
                                                                                            @if ($examen->cavitaria == 'N Normal') selected @endif>
                                                                                            <span>N </span> Normal</a>
                                                                                        </option>
                                                                                        <option
                                                                                            @if ($examen->cavitaria == '(-) No responde') selected @endif>
                                                                                            <span>(-) </span> No
                                                                                            responde</a></option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <button type="button"
                                                                                class="btn btn-icon btn-danger-light-c"
                                                                                onclick="eliminar_pieza_dental_pieza({{ $examen->id }},'endo')">X</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            @php $count++; @endphp
                                                        @endforeach
                                                    </div>

                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>



                                <!--PLANIFICACION TRATAMIENTO-->
                                {{-- <div class="tab-pane fade show" id="plan_endo_end" role="tabpanel" aria-labelledby="plan_endo_end-tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div id="contenedor_pieza_plan_endo">
                                                        <div id="pieza_dental" class="row">
                                                            <div class="col-sm-12 col-md-12 col-xl-12">
                                                                <div class="tab-content" id="v-pills-tabContent">
                                                                    <div class="tab-pane fade show active" id="faringe" role="tabpanel" aria-labelledby="faringe-tab"><br>
                                                                        <div class="col-sm-12 col-md-12" >
                                                                            <div id="planificacion_examenes_endo">
                                                                                @foreach ($examenes_pieza_end as $e)
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Pieza N°</label>
                                                                                                <input type="text" class="form-control form-control-sm" value="{{ $e->numero_pieza }}">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                                                                                <select name="piel_tegumnto" data-titulo="Ex_cuello" data-seccion="Cuello"  id="piel_tegumnto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('piel_tegumnto','div_piel_tegumnto','obs_piel_tegumnto',2);">
                                                                                                    <option selected  value="1">Uniradicular</option>
                                                                                                    <option value="2">Biradicular</option>
                                                                                                    <option value="2">Triradicular</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group" id="div_piel_tegumnto" style="display:none;">
                                                                                                <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                                                                                <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_piel_tegumnto" id="obs_piel_tegumnto"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Convenio</label>
                                                                                                <select name="adenopatias" data-titulo="Ex_cuello" data-seccion="Cuello"  id="adenopatias" class="form-control form-control-sm">
                                                                                                    <option selected  value="1">Convenio</option>
                                                                                                    <option value="2">Sin Convenio</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                            <div id="planificacion_max_sup_tratamientos_endo">
                                                                                @foreach ($maxilar_superior_gral_tratamientos_endo as $e)
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">{{ $e->localizacion }}</label>
                                                                                                <input type="text" class="form-control form-control-sm" value="{{ $e->especialidad_examen }} {{ $e->diagnostico_tratamiento }}">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                                                                                <select name="piel_tegumnto" data-titulo="Ex_cuello" data-seccion="Cuello"  id="piel_tegumnto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('piel_tegumnto','div_piel_tegumnto','obs_piel_tegumnto',2);">
                                                                                                    <option selected  value="1">Uniradicular</option>
                                                                                                    <option value="2">Biradicular</option>
                                                                                                    <option value="2">Triradicular</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group" id="div_piel_tegumnto" style="display:none;">
                                                                                                <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                                                                                <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_piel_tegumnto" id="obs_piel_tegumnto"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Convenio</label>
                                                                                                <select name="adenopatias" data-titulo="Ex_cuello" data-seccion="Cuello"  id="adenopatias" class="form-control form-control-sm">
                                                                                                    <option selected  value="1">Convenio</option>
                                                                                                    <option value="2">Sin Convenio</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                            <div id="planificacion_max_sup_diagnosticos_endo">
                                                                                @foreach ($maxilar_superior_gral_diagnosticos_endo as $e)
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">{{ $e->localizacion }}</label>
                                                                                                <input type="text" class="form-control form-control-sm" value="{{ $e->especialidad_examen }} {{ $e->diagnostico_tratamiento }}">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                                                                                <select name="piel_tegumnto" data-titulo="Ex_cuello" data-seccion="Cuello"  id="piel_tegumnto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('piel_tegumnto','div_piel_tegumnto','obs_piel_tegumnto',2);">
                                                                                                    <option selected  value="1">Uniradicular</option>
                                                                                                    <option value="2">Biradicular</option>
                                                                                                    <option value="2">Triradicular</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group" id="div_piel_tegumnto" style="display:none;">
                                                                                                <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                                                                                <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_piel_tegumnto" id="obs_piel_tegumnto"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Convenio</label>
                                                                                                <select name="adenopatias" data-titulo="Ex_cuello" data-seccion="Cuello"  id="adenopatias" class="form-control form-control-sm">
                                                                                                    <option selected  value="1">Convenio</option>
                                                                                                    <option value="2">Sin Convenio</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                            <div id="planificacion_max_inf_tratamientos_endo">
                                                                                @foreach ($maxilar_inferior_gral_tratamientos_endo as $e)
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">{{ $e->localizacion }}</label>
                                                                                                <input type="text" class="form-control form-control-sm" value="{{ $e->especialidad_examen }} {{ $e->diagnostico_tratamiento }}">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                                                                                <select name="piel_tegumnto" data-titulo="Ex_cuello" data-seccion="Cuello"  id="piel_tegumnto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('piel_tegumnto','div_piel_tegumnto','obs_piel_tegumnto',2);">
                                                                                                    <option selected  value="1">Uniradicular</option>
                                                                                                    <option value="2">Biradicular</option>
                                                                                                    <option value="2">Triradicular</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group" id="div_piel_tegumnto" style="display:none;">
                                                                                                <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                                                                                <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_piel_tegumnto" id="obs_piel_tegumnto"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Convenio</label>
                                                                                                <select name="adenopatias" data-titulo="Ex_cuello" data-seccion="Cuello"  id="adenopatias" class="form-control form-control-sm">
                                                                                                    <option selected  value="1">Convenio</option>
                                                                                                    <option value="2">Sin Convenio</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                            <div id="planificacion_max_inf_diagnosticos_endo">
                                                                                @foreach ($maxilar_inferior_gral_diagnosticos_endo as $e)
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">{{ $e->localizacion }}</label>
                                                                                                <input type="text" class="form-control form-control-sm" value="{{ $e->especialidad_examen }} {{ $e->diagnostico_tratamiento }}">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                                                                                <select name="piel_tegumnto" data-titulo="Ex_cuello" data-seccion="Cuello"  id="piel_tegumnto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('piel_tegumnto','div_piel_tegumnto','obs_piel_tegumnto',2);">
                                                                                                    <option selected  value="1">Uniradicular</option>
                                                                                                    <option value="2">Biradicular</option>
                                                                                                    <option value="2">Triradicular</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group" id="div_piel_tegumnto" style="display:none;">
                                                                                                <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                                                                                <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_piel_tegumnto" id="obs_piel_tegumnto"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Convenio</label>
                                                                                                <select name="adenopatias" data-titulo="Ex_cuello" data-seccion="Cuello"  id="adenopatias" class="form-control form-control-sm">
                                                                                                    <option selected  value="1">Convenio</option>
                                                                                                    <option value="2">Sin Convenio</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                            <div id="planificacion_boca_completa_tratamientos_endo">
                                                                                @foreach ($boca_completa_gral_tratamiento_endo as $e)
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">{{ $e->localizacion }}</label>
                                                                                                <input type="text" class="form-control form-control-sm" value="{{ $e->especialidad_examen }} {{ $e->diagnostico_tratamiento }}">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                                                                                <select name="piel_tegumnto" data-titulo="Ex_cuello" data-seccion="Cuello"  id="piel_tegumnto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('piel_tegumnto','div_piel_tegumnto','obs_piel_tegumnto',2);">
                                                                                                    <option selected  value="1">Uniradicular</option>
                                                                                                    <option value="2">Biradicular</option>
                                                                                                    <option value="2">Triradicular</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group" id="div_piel_tegumnto" style="display:none;">
                                                                                                <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                                                                                <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_piel_tegumnto" id="obs_piel_tegumnto"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Convenio</label>
                                                                                                <select name="adenopatias" data-titulo="Ex_cuello" data-seccion="Cuello"  id="adenopatias" class="form-control form-control-sm">
                                                                                                    <option selected  value="1">Convenio</option>
                                                                                                    <option value="2">Sin Convenio</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                            <div id="planificacion_boca_completa_diagnosticos_endo">
                                                                                @foreach ($boca_completa_gral_diagnostico_endo as $e)
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">{{ $e->localizacion }}</label>
                                                                                                <input type="text" class="form-control form-control-sm" value="{{ $e->especialidad_examen }} {{ $e->diagnostico_tratamiento }}">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                                                                                <select name="piel_tegumnto" data-titulo="Ex_cuello" data-seccion="Cuello"  id="piel_tegumnto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('piel_tegumnto','div_piel_tegumnto','obs_piel_tegumnto',2);">
                                                                                                    <option selected  value="1">Uniradicular</option>
                                                                                                    <option value="2">Biradicular</option>
                                                                                                    <option value="2">Triradicular</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group" id="div_piel_tegumnto" style="display:none;">
                                                                                                <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                                                                                <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_piel_tegumnto" id="obs_piel_tegumnto"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Convenio</label>
                                                                                                <select name="adenopatias" data-titulo="Ex_cuello" data-seccion="Cuello"  id="adenopatias" class="form-control form-control-sm">
                                                                                                    <option selected  value="1">Convenio</option>
                                                                                                    <option value="2">Sin Convenio</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-12">
                                                                            <button type="button" class="btn btn-primary btn-sm" onclick="cargar_a_presupuesto('endo')">Cargar a presupuesto</button>
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
                                </div> --}}
                                <div class="tab-pane fade show" id="plan_endo_end" role="tabpanel"
                                    aria-labelledby="plan_endo_end_tab">
                                    <div class="form-row mt-2">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="tit-gen">Planificación del tratamiento</h6>
                                        </div>
                                    </div>


                                    <div class="form-row">
                                        <!--TABLA SELECCION DE PIEZAS O GRUPOS DE PIEZAS-->
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                            <div class="card-informacion">
                                                <div class="card-top">
                                                    <h6 class="text-uppercase text-c-blue">Tratamientos en piezas o
                                                        grupos</h6>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <div class="table-responsive">
                                                                <table id="table_piezas_presupuesto_endo"
                                                                    class="display table table-striped dt-responsive nowrap table-sm dataTable no-footer dtr-inline w-100 mt-2">
                                                                    <thead>
                                                                        <tr>
                                                                            <td>Pieza o Grupo</td>
                                                                            <td>Diagnóstico</td>
                                                                            <td>Tratamiento</td>
                                                                            <td>Valor</td>
                                                                            <td>Accion</td>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($odontograma as $o)
                                                                            @if ($o->urgencia == 0)
                                                                                <tr>
                                                                                    <td>{{ $o->pieza }}</td>
                                                                                    <td>{{ $o->diagnostico }}</td>
                                                                                    <td>{{ $o->descripcion }}</td>
                                                                                    <td>${{ number_format($o->valor, 0, ',', '.') }}
                                                                                    </td>
                                                                                    <td><button type="button"
                                                                                            class="btn btn-danger btn-icon"
                                                                                            onclick="eliminar_odontograma({{ $o->id }})"><i
                                                                                                class="feather icon-x"></i></button>
                                                                                    </td>
                                                                                </tr>
                                                                            @endif
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--SELECCION DE PIEZAS O GRUPOS DE PIEZAS-->
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                            <div class="card-informacion">
                                                <div class="card-top">
                                                    <h6 class="text-uppercase text-c-blue">Seleccione por pieza o grupo
                                                        de piezas</h6>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row my-2">
                                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="max_sup_impl"
                                                                    onclick="seleccionar_maxilar_superior_impl()">
                                                                <label class="custom-control-label"
                                                                    for="max_sup_impl">Seleccione maxilar
                                                                    superior</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="max_inf_impl"
                                                                    onclick="seleccionar_maxilar_inferior_impl()">
                                                                <label class="custom-control-label"
                                                                    for="max_inf_impl">Seleccione maxilar
                                                                    inferior</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="piezas_presup_impl"
                                                                    onclick="seleccionar_piezas_presup()" checked>
                                                                <label class="custom-control-label"
                                                                    for="piezas_presup_impl">Piezas presupuesto</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6 col-xxl-6">
                                                            @include('atencion_odontologica.generales.odontograma_adulto_grupos_endodoncia')
                                                        </div>
                                                        <div
                                                            class="col-sm-12 col-md-12 col-lg-12 col-xl-6 col-xxl-6 mt-2">
                                                            <div class="form-row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <div class="form-group">
                                                                        <label for=""
                                                                            class="floating-label-activo-sm">Grupos</label>
                                                                        <select class="js-example-basic-multiple"
                                                                            name="paciente_piezas_dentales_end_ex_"
                                                                            id="paciente_piezas_dentales_end_ex_"
                                                                            multiple="multiple">
                                                                            <option value="1.1">1.1</option>
                                                                            <option value="1.2">1.2</option>
                                                                            <option value="1.3">1.3</option>
                                                                            <option value="1.4">1.4</option>
                                                                            <option value="1.5">1.5</option>
                                                                            <option value="1.6">1.6</option>
                                                                            <option value="1.7">1.7</option>
                                                                            <option value="1.8">1.8</option>
                                                                            <option value="2.1">2.1</option>
                                                                            <option value="2.2">2.2</option>
                                                                            <option value="2.3">2.3</option>
                                                                            <option value="2.4">2.4</option>
                                                                            <option value="2.5">2.5</option>
                                                                            <option value="2.6">2.6</option>
                                                                            <option value="2.7">2.7</option>
                                                                            <option value="2.8">2.8</option>
                                                                            <option value="3.1">3.1</option>
                                                                            <option value="3.2">3.2</option>
                                                                            <option value="3.3">3.3</option>
                                                                            <option value="3.4">3.4</option>
                                                                            <option value="3.5">3.5</option>
                                                                            <option value="3.6">3.6</option>
                                                                            <option value="3.7">3.7</option>
                                                                            <option value="3.8">3.8</option>
                                                                            <option value="4.1">4.1</option>
                                                                            <option value="4.2">4.2</option>
                                                                            <option value="4.3">4.3</option>
                                                                            <option value="4.4">4.4</option>
                                                                            <option value="4.5">4.5</option>
                                                                            <option value="4.6">4.6</option>
                                                                            <option value="4.7">4.7</option>
                                                                            <option value="4.8">4.8</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <div class="form-group">
                                                                        <label
                                                                            class="floating-label-activo-sm">Diagnostico</label>
                                                                        <select class="form-control form-control-sm"
                                                                            id="diagnostico_combo_g">
                                                                            <option value="0">Seleccione</option>
                                                                            @foreach ($diagnosticos as $d)
                                                                                <option value="{{ $d->id }}">
                                                                                    {{ $d->descripcion }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <div class="form-group">
                                                                        <label
                                                                            class="floating-label-activo-sm">Tratamiento</label>
                                                                        <input type="text"
                                                                            name="diag_presupuesto_pieza_g_endo"
                                                                            id="diag_presupuesto_pieza_g_endo"
                                                                            placeholder="DESCRIBA EL TRATAMIENTO POR PIEZA O GRUPO DE PIEZAS"
                                                                            class="form-control form-control-sm tratamiento-autocomplete ui-autocomplete-input"
                                                                            autocomplete="off">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <button type="button"
                                                                        class="btn btn-primary btn-sm btn-block"
                                                                        onclick="cargar_a_presupuesto_end_g()"><i
                                                                            class="feather icon-save"></i> Guardar
                                                                        piezas</button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <!--TABLA INSUMOS-->
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                            <div class="card-informacion">
                                                <div class="card-top">
                                                    <h6 class="text-uppercase text-c-blue d-inline">Insumos</h6>
                                                    <button type="button"
                                                        class="btn btn-info btn-xxs float-md-right d-inline d-inline"
                                                        onclick="abrir_modal_insumos()"><i class="fas fa-plus"></i>
                                                        Agregar Insumos</button>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <div class="table-responsive">
                                                                <table id="table_insumos_endodoncia"
                                                                    class="display table table-striped dt-responsive nowrap table-sm dataTable no-footer dtr-inline w-100 mt-2">
                                                                    <thead>
                                                                        <tr>
                                                                            <td>Insumo</td>
                                                                            <td>Observaciones</td>
                                                                            <td>Cantidad</td>
                                                                            <td>Valor</td>
                                                                            <td>Total</td>
                                                                            <td>Acciones</td>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($insumos_tratamientos as $t)
                                                                            @if ($t->urgencia == 0)
                                                                                @php $total = $t->cantidad * $t->valor @endphp
                                                                                <tr>
                                                                                    <td>{{ $t->insumos }}
                                                                                        {{ $t->nombre_marca }}</td>
                                                                                    <td>{{ $t->observaciones }}</td>
                                                                                    <td>{{ $t->cantidad }}</td>
                                                                                    <td>{{ number_format($t->valor) }}
                                                                                    </td>
                                                                                    <td>{{ number_format($total) }}
                                                                                    </td>
                                                                                    <td>
                                                                                        @if ($t->presupuesto == 0 || $t->presupuesto == null)
                                                                                            <button type="button"
                                                                                                class="btn btn-icon btn-primary"
                                                                                                onclick="cargar_a_presupuesto_insumo({{ $t->id }})"><i
                                                                                                    class="feather icon-save"></i></button>
                                                                                        @else
                                                                                            <button type="button"
                                                                                                class="btn btn-icon btn-danger"
                                                                                                onclick="sacar_de_presupuesto_insumo({{ $t->id }})"><i
                                                                                                    class="fas fa-minus"></i></button>
                                                                                        @endif
                                                                                        <button type="button"
                                                                                            class="btn btn-icon btn-warning"
                                                                                            onclick="dame_insumo({{ $t->id }})"><i
                                                                                                class="feather icon-edit"></i></button>
                                                                                        <button type="button"
                                                                                            class="btn btn-icon btn-danger"
                                                                                            onclick="eliminar_insumo({{ $t->id }})"><i
                                                                                                class="feather icon-x"></i></button>
                                                                                    </td>
                                                                                </tr>
                                                                            @endif
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row mt-2">
                                                        <div class="col-12 d-flex justify-content-end">
                                                            <button type="button" class="btn btn-success btn-xxs"
                                                                onclick="abrirModalCorreo()"><i
                                                                    class="fas fa-email"></i> Enviar por
                                                                correo</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--HOSPITALIZACION-->
                                <div class="tab-pane fade show" id="hosp_endodoncia" role="tabpanel"
                                    aria-labelledby="hosp_endodoncia-tab">
                                    <div class="mt-3">
                                        @include('general.hospitalizacion.hospitalizar')
                                    </div>

                                </div>
                                <!-- CONTROL E INDICACIONES -->
                                <div class="tab-pane" id="control_endo" role="tabpanel"
                                    aria-labelledby="control_endo-tab">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-row mt-3">
                                            <div class="col-sm-10 col-md-6 col-lg-6 col-xl-6 ">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm"
                                                        for="est_ct_prisma">Medidas especiales</label>
                                                    <select class="form-control form-control-sm" id="me_urg_odped"
                                                        name="me_urg_odped"
                                                        onchange="evaluar_para_carga_detalle('me_urg_odped','div_me_urg_odped','obs_me_urg_odped',6);">>
                                                        <option value="0">Seleccione</option>
                                                        <option value="1">Hospitalizar</option>
                                                        <option value="2">Profilaxis Infección derivado a su casa
                                                        </option>
                                                        <option value="3">Antibiótico + analgesicos derivado a su
                                                            casa</option>
                                                        <option value="4">Examenes de sangre</option>
                                                        <option value="5">Examenes Radiológicos</option>
                                                        <option value="6">Derivado a otro especialista</option>
                                                        <option value="7">Otras medidas(describir)</option>
                                                    </select>
                                                </div>
                                                <div class="form-group" id="div_me_urg_odped" style="display:none;">
                                                    <label class="floating-label-activo-sm"
                                                        for="obs_me_urg_odped">Otras medidas<i>(describir)
                                                            Tipo</i></label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                        name="obs_me_urg_odped" id="obs_me_urg_odped"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-10 col-md-6 col-lg-6 col-xl-6 ">
                                                <div id="ind_urg" class="form-row">
                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                                        <div class="form-group">
                                                            <button type="button"
                                                                class="btn btn-outline-primary btn-block"
                                                                onclick="hora_medica_pedir({{ $profesional->id }}, {{ $id_lugar_atencion }})"><i
                                                                    class="feather icon-calendar"></i>
                                                                Agendar
                                                                hora</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mx-auto">
                                                        <div class="card-informacion"
                                                            style="border: 1px solid #6c9bd5;">
                                                            <div class="card-top text-center">
                                                                <h5 class="text-c-blue">
                                                                    PRÓXIMO
                                                                    CONTROL
                                                                </h5>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="form-row">
                                                                    <div
                                                                        class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
                                                                        <h5 class="text-c-blue">
                                                                            <i class="fas fa-calendar"></i>
                                                                            Fecha:
                                                                        </h5>
                                                                        <h5 class="font-weight-bold">
                                                                            <span id="proxima_fecha_atencion_endo">
                                                                                {{ isset($proxima_fecha_atencion) ? $proxima_fecha_atencion : '' }}
                                                                            </span>
                                                                        </h5>
                                                                    </div>
                                                                    <div
                                                                        class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
                                                                        <h5 class="text-c-blue">
                                                                            <i class="fas fa-clock"></i>
                                                                            Horario:
                                                                        </h5>
                                                                        <p id="proxima_hora_atencion_endo">
                                                                            <strong>{{ isset($hora_inicio_atencion) ? $hora_inicio_atencion : '--:--' }}</strong>
                                                                            a
                                                                            <strong>{{ isset($hora_fin_atencion) ? $hora_fin_atencion : '--:--' }}</strong>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-612 col-lg-12 col-xl-12 mb-4 ">
                                                <label class="floating-label-activo-sm"
                                                    for="obs_me_urg_odped">Observaciones</i></label>
                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                    name="obs_ind_urgencia" id="obs_ind_urgencia"></textarea>
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
<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card-a">
        <div class="card-header-a" id="exam_esp_imp_col">
            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button"
                data-toggle="collapse" onclick="mostrar_nueva_pieza_dental_tto_endo(1000);"
                data-target="#exam_esp_imp_col_c" aria-expanded="false" aria-controls="exam_esp_imp_col_c">
                Control y Tratamiento Endodóncico
            </button>
        </div>
        <div id="exam_esp_imp_col_c" class="collapse" aria-labelledby="exam_esp_imp_col"
            data-parent="#exam_esp_imp_col">
            <div class="card-body-aten-a shadow-none">
                <div id="form-col_implantes">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <ul class="nav nav-tabs-aten nav-fill mb-10" id="coloc_impl" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset active" id="cont_endo_tto_tab"
                                        data-toggle="tab" href="#cont_endo_tto" role="tab"
                                        aria-controls="cont_endo_tto" aria-selected="true">Control y Tratamiento</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="protocolo_implantes_tab"
                                        data-toggle="tab" href="#protocolo_implantes" role="tab"
                                        aria-controls="protocolo_implantes" aria-selected="true">Protocolo e
                                        Indicaciones</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="tab-content" id="col_implante">
                                <!--PROCEDIMIENTO-->
                                <div class="tab-pane fade show active" id="cont_endo_tto" role="tabpanel"
                                    aria-labelledby="cont_endo_tto_tab">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-4">
                                            <h6 class="t-aten d-inline"> Control y Tratamiento</h6>
                                            {{-- <button type="button" class="btn btn-info btn-sm  d-inline float-md-right mt-n2 mb-2" onclick="mostrar_nueva_pieza_dental_tto_impl(1000)"><i class="fas fa-plus"></i> Añadir pieza</button> --}}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2 col-xxl-1 mb-3">
                                            <ul class="nav flex-column nav-pills mb-3" id="coloc_impl"
                                                role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link-aten text-reset active"
                                                        id="tto_endo_tab" data-toggle="tab"
                                                        href="#tto_endo" role="tab"
                                                        aria-controls="tto_endo" aria-selected="true">Tratamiento</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link-aten text-reset" id="evol_endo_tab"
                                                        data-toggle="tab" href="#evol_endo" role="tab"
                                                        aria-controls="evol_endo" aria-selected="true">Control y Evolución</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-10 col-xl-10 col-xxl-11 mb-3">
                                            <div class="tab-content">
                                                <!--PIEZA DENTAL-->
                                                <div class="tab-pane fade show active" id="tto_endo"
                                                    role="tabpanel" aria-labelledby="tto_endo_tab">
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <div class="card-informacion">
                                                                <div class="card-body">
                                                                    <div class="form-row">
                                                                        <div
                                                                            class="col-sm-12 col-md-2 col-lg-2 col-xl-2 col-xxl-2">
                                                                            <label
                                                                                class="floating-label-activo-sm">Pieza
                                                                                N°</label>
                                                                            <select class="form-control form-control-sm"
                                                                                name="numero_pieza_tto_end"
                                                                                id="numero_pieza_tto_end">
                                                                                <option value="0">Seleccione</option>
                                                                                @foreach ($examenes_pieza_end as $examen)
                                                                                    <option value="{{ $examen->numero_pieza }}">{{ $examen->numero_pieza }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div
                                                                            class="col-sm-12 col-md-5 col-lg-5 col-xl-5 col-xxl-5">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    class="floating-label-activo-sm">Procedimiento</label>
                                                                                <input type="text" class="form-control form-control-sm tratamiento-autocomplete"
                                                                                    name="proc_end"
                                                                                    id="proc_end"
                                                                                    value="">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Observaciones</label>
                                                                                <textarea class="form-control form-control-sm" data-titulo="Ex_cuello" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tto_end" id="obs_tto_end"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-1">
                                                                            <button type="button" class="btn btn-icon btn-primary" onclick="cargar_a_presupuesto_tto()"><i class="feather icon-shopping-cart"></i></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card-footer">
                                                                    <div class="float-right">

                                                                        <button type="button"
                                                                            class="btn btn-xxs btn-warning-light-c"
                                                                            onclick="guardar_pieza_dental_tto_impl(1000)">
                                                                            <i class="fas fa-check"></i> Presione para
                                                                            finalizar prestación en curso</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--GRUPO DENTAL-->
                                                <div class="tab-pane fade" id="evol_endo" role="tabpanel"
                                                    aria-labelledby="evol_endo_tab">
                                                         @include('atencion_odontologica.generales.control_odontologico')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--PROTOCOLO-->
                                <div class="tab-pane fade show" id="protocolo_implantes" role="tabpanel"
                                    aria-labelledby="protocolo_implantes_tab">
                                    <div class="form-row mt-2">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="t-aten">Protocolos e indicaciones</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                            <div class="nav flex-column nav-pills mb-3" id="v-pills-tab"
                                                role="tablist" aria-orientation="vertical">
                                                <a class="nav-link-aten text-reset active" id="prot_impl_tab"
                                                    data-toggle="tab" href="#prot_impl" role="tab"
                                                    aria-controls="prot_impl" aria-selected="true">Protocolo</a>
                                                <a class="nav-link-aten text-reset" id="ind_impl_tab"
                                                    data-toggle="tab" href="#ind_impl" role="tab"
                                                    aria-controls="ind_impl" aria-selected="false">Indicaciones</a>
                                                <a class="nav-link-aten text-reset" id="cit_control_impl_tab"
                                                    data-toggle="tab" href="#cit_control_impl" role="tab"
                                                    aria-controls="cit_control_impl" aria-selected="false">Citar a
                                                    Control</a>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-10 col-xl-10">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <!--PROTOCOLO-->
                                                <div class="tab-pane fade show active" id="prot_impl"
                                                    role="tabpanel" aria-labelledby="prot_impl_tab">
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <h6 class="sub-aten">Protocolo<h6>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Equipo
                                                                    Cirujanos</label>
                                                                <div class="d-flex">
                                                                    <input class="form-control form-control-sm"
                                                                        type="text" name="prot_cirujanos_imp"
                                                                        id="prot_cirujanos_imp">
                                                                    <button type="button"
                                                                        class="btn btn-outline-primary btn-sm"
                                                                        onclick="agregar_cirujano_impl()"><i
                                                                            class="fas fa-plus"></i></button>
                                                                </div>
                                                            </div>
                                                            <div class="d-none" id="div_nuevo_cirujano_impl">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Nuevo
                                                                        Cirujano</label>
                                                                    <div class="d-flex mb-3">
                                                                        <input type="text"
                                                                            class="form-control form-control-sm">
                                                                        <button type="button"
                                                                            class="btn btn-danger"
                                                                            onclick="ocultar_cirujano_impl()"><i
                                                                                class="feather icon-x"></i></button>
                                                                        <button type="button"
                                                                            class="btn btn-info"><i
                                                                                class="feather icon-shopping-cart"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                            <div class="form-group">
                                                                <label
                                                                    class="floating-label-activo-sm">Anestesista</label>
                                                                <input class="form-control form-control-sm"
                                                                    type="text"
                                                                    name="prot_anestesista_imp"id="prot_anestesista_imp">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Tons</label>
                                                                <input class="form-control form-control-sm"
                                                                    type="text"
                                                                    name="prot_tons_imp"id="prot_tons_imp">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                            <div class="form-group">
                                                                <label
                                                                    class="floating-label-activo-sm">Arsenalera</label>
                                                                <input class="form-control form-control-sm"
                                                                    type="text"
                                                                    name="prot_ars_imp"id="prot_ars_imp">
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="form-row">


                                                        {{-- <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Marca Implante</label>
                                                                <select name="prot_marc_implante"  id="prot_marc_implante" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('prot_marc_implante','div_prot_marc_implante','obs_prot_marc_implante',3);">
                                                                    @foreach ($marcas_implantes as $marca)
                                                                        <option value="{{ $marca->id }}">{{ $marca->descripcion }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group" id="div_prot_marc_implante" style="display:none;">
                                                                <label class="floating-label-activo-sm">Otra Marca</label>
                                                                <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_prot_marc_implante" id="obs_prot_marc_implante"></textarea>
                                                            </div>
                                                        </div> --}}


                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Material de
                                                                    relleno</label>
                                                                <select name="mat_relleno_end" id="mat_relleno_end"
                                                                    class="form-control form-control-sm"
                                                                    onchange="evaluar_para_carga_detalle('prot_proc','div_prot_proc','det_prot_proc',3)">
                                                                    <option value="0">Seleccione</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group" id="div_prot_proc"
                                                                style="display:none">
                                                                <label class="floating-label-activo-sm">Otros
                                                                    (Describir)</label>
                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria"
                                                                    data-seccion="Naríz" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="det_prot_proc"
                                                                    id="det_prot_proc"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Corona / Prot.
                                                                    Provisoria</label>
                                                                <select name="prot_prot_corona"
                                                                    id="prot_prot_corona"
                                                                    class="form-control form-control-sm"
                                                                    onchange="evaluar_para_carga_detalle('prot_prot_corona','div_prot_prot_corona','det_prot_prot_corona',3)">
                                                                    <option value="0">Seleccione</option>
                                                                    <option value="1">Si</option>
                                                                    <option value="2">No</option>
                                                                    <option value="3">Otro (Describir)</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group" id="div_prot_prot_corona"
                                                                style="display:none">
                                                                <label class="floating-label-activo-sm">Otros
                                                                    (Describir)</label>
                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria"
                                                                    data-seccion="Naríz" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                    name="det_prot_prot_corona" id="det_prot_prot_corona"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Piezas
                                                                    N°</label>
                                                                <select class="js-example-basic-multiple"
                                                                    type="text"
                                                                    name="prot_pieza_imp"id="prot_pieza_imp"
                                                                    multiple="multiple">
                                                                    @foreach ($odontograma as $o)
                                                                        @if ($o->presupuesto == 1)
                                                                            <option value="{{ $o->id }}">
                                                                                {{ $o->pieza }}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Detalle
                                                                    Cirugía</label>
                                                                @php
                                                                    $detalleCirugia = [];
                                                                    foreach ($examenes_tto_implantes as $examen) {
                                                                        $detalleCirugia[] = "La pieza {$examen->numero_pieza} se ha realizado {$examen->tipo_procedimiento} usando {$examen->anestesia} con {$examen->numero_tubos} tubos, con la técnica {$examen->tecnica_anestesia}";
                                                                    }
                                                                    $detallesCirugiaTexto = implode(
                                                                        "\n",
                                                                        $detalleCirugia,
                                                                    );
                                                                @endphp
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=6"
                                                                    onblur="this.rows=1;" name="det_cir" id="det_cir">{{ $detallesCirugiaTexto }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 text-center">
                                                            <button type="button"
                                                                class="btn btn-sm btn-primary mt-2 mb-4"
                                                                onclick="generar_pdf_protocolo_dental()">Ver documento
                                                                en
                                                                PDF</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--INDICACIONES-->
                                                <div class="tab-pane fade show" id="ind_impl" role="tabpanel"
                                                    aria-labelledby="ind_impl_tab">
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <h6 class="sub-aten">Indicaciones<h6>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6 col-xl-6">
                                                            <button type="button"
                                                                class="btn btn-outline-primary btn-block btn-sm my-2"
                                                                onclick="recomendaciones_implante();"><i
                                                                    class="fas fa-plus"></i> Indicaciones Generales
                                                                Post Endodóncia </button>
                                                        </div>
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6 col-xl-6">
                                                            <button type="button"
                                                                class="btn btn-outline-primary btn-block btn-sm my-2"
                                                                onclick="recomendaciones_esp_implante();"><i
                                                                    class="fas fa-plus"></i> Indicaciones Especiales
                                                                para el paciente post Endodóncia </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--CONTROL-->
                                                <div class="tab-pane fade show" id="cit_control_impl"
                                                    role="tabpanel" aria-labelledby="cit_control_impl_tab">
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <h6 class="sub-aten">Control<h6>
                                                        </div>
                                                    </div>

                                                    <div id="contenedor_pieza_dental_endorx">
                                                        <div id="pieza_dentalrx" class="form-row">
                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                                                <div class="form-group">
                                                                    <button type="button"
                                                                        class="btn btn-outline-primary btn-block"
                                                                        onclick="hora_medica_pedir({{ $profesional->id }}, {{ $id_lugar_atencion }})"><i
                                                                            class="feather icon-calendar"></i> Agendar
                                                                        hora</button>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-8 mx-auto">
                                                                <div class="card-informacion"
                                                                    style="border: 1px solid #6c9bd5;">
                                                                    <div class="card-top text-center">
                                                                        <h5 class="text-c-blue">PRÓXIMO CONTROL</h5>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <div class="form-row">
                                                                            <div
                                                                                class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
                                                                                <h5 class="text-c-blue"><i
                                                                                        class="fas fa-calendar"></i>
                                                                                    Fecha:</h5>
                                                                                <h5 class="font-weight-bold">
                                                                                    {{ isset($proxima_fecha_atencion) ? $proxima_fecha_atencion : '' }}
                                                                                </h5>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
                                                                                <h5 class="text-c-blue"><i
                                                                                        class="fas fa-clock"></i>
                                                                                    Horario:</h5>
                                                                                <p> <strong>{{ isset($hora_inicio_atencion) ? $hora_inicio_atencion : '--:--' }}</strong>
                                                                                    a
                                                                                    <strong>{{ isset($hora_fin_atencion) ? $hora_fin_atencion : '--:--' }}</strong>
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
<!-- Modal Enviar Presupuesto -->
<div class="modal fade" id="modalEnviarPresupuesto" tabindex="-1" role="dialog"
    aria-labelledby="modalEnviarPresupuestoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="formEnviarPresupuesto">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEnviarPresupuestoLabel">Enviar presupuesto de insumos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="floating-label-activo-sm" for="selectDestinatarios">Selecciona
                            destinatarios:</label>
                        <select id="selectDestinatarios" class="form-control form-control-sm" multiple="multiple"
                            style="width:100%">

                            <option value="{{ $paciente->email }}">{{ $paciente->nombres }}
                                {{ $paciente->apellido_uno }} (Paciente)</option>
                            <option value="{{ $profesional->email }}">{{ $profesional->nombre }}
                                {{ $profesional->apellido_uno }} (Profesional)</option>
                            <option value="bodega@gmail.com">Bodega</option>
                            <option value="ejemplo@gmail.com">Dirección de presupuestos</option>
                        </select>
                    </div>


                    <small class="text-muted">Puedes seleccionar varios o escribir correos manualmente.</small>
                    <hr>
                    <div class="form-group">
                        <label class="floating-label-activo-sm">Correo adicional (opcional):</label>
                        <input type="email" class="form-control form-control-sm" id="correoLibre"
                            placeholder="ejemplo@correo.com">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" onclick="enviar_email_presupuesto_insumos()"
                        class="btn btn-primary">Enviar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    // Declarar la variable global arriba del DOMContentLoaded
    var odontograma_global = @json($odontograma);
    document.addEventListener("DOMContentLoaded", function() {

        $('.tratamiento-autocomplete').each(function() {
            $(this).autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('dental.getTratamientoImplantologia') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function(data) {
                            console.console.log();

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
                select: function(event, ui) {

                    $(this).val(ui.item.label);
                    $(this).next('input[type="hidden"]').val(ui.item
                    .value); // Asigna el valor al input hidden correspondiente
                    return false;
                }
            });
        });

        // Supongamos que ya tienes este JSON cargado
        const odontograma = odontograma_global;


        // Obtener piezas únicas donde urgencia == 0
        const piezasUnicas = [...new Set(odontograma.filter(item => item.urgencia == 0).map(item => item
            .pieza))];

        // Seleccionar el <select> y actualizar sus valores
        const piezasSelect = $('#paciente_piezas_dentales_end_ex_');
        piezasSelect.val(piezasUnicas).trigger('change');

        // Marcar visualmente las piezas en el odontograma
        piezasUnicas.forEach(pieza => {
            $(`.pieza_endodoncia[data-pieza_end="${pieza}"]`).addClass('seleccionada');
        });
        // Escuchar cambios en el Select2 para actualizar el odontograma visual
        piezasSelect.on('change', function() {
            const piezasSeleccionadas = $(this).val() || [];

            // Recorre todas las piezas visuales
            $('.pieza_endodoncia').each(function() {
                const piezaNumero = $(this).data('pieza_end').toString();

                if (piezasSeleccionadas.includes(piezaNumero)) {
                    $(this).addClass('seleccionada');
                } else {
                    $(this).removeClass('seleccionada');
                }
            });
        });

        $('#selectDestinatarios').select2({
            tags: true,
            width: '100%',
            placeholder: 'Selecciona o ingresa correos',
            dropdownParent: $('#modalEnviarPresupuesto')
        });


    });

    function mostrar_nueva_pieza_dental_tto_endo(id) {
        console.log(id);
    }

    function seleccionar_maxilar_superior_impl() {
        const superiorActivo = document.getElementById("max_sup_impl").checked;
        document.getElementById('piezas_presup_impl').checked = false;
        const piezas = document.querySelectorAll('.pieza_endodoncia');
        const select = $('#paciente_piezas_dentales_ex_impl');

        piezas.forEach(pieza => {
            const codigo = pieza.getAttribute('data-pieza_end');

            if (codigo.startsWith('1.') || codigo.startsWith('2.')) {
                if (superiorActivo) {
                    pieza.classList.add('seleccionada');

                    // Selecciona en el Select2 si existe la opción
                    if (select.find("option[value='" + codigo + "']").length > 0) {
                        select.find("option[value='" + codigo + "']").prop("selected", true);
                    }
                } else {
                    pieza.classList.remove('seleccionada');

                    // Deselecciona en el Select2
                    if (select.find("option[value='" + codigo + "']").length > 0) {
                        select.find("option[value='" + codigo + "']").prop("selected", false);
                    }
                }
            }
        });

        // Refresca el select2 para que se vea reflejado el cambio
        select.trigger('change');
    }

    function seleccionar_maxilar_inferior_impl() {
        const inferiorActivo = document.getElementById("max_inf_impl").checked;
        document.getElementById('piezas_presup_impl').checked = false;
        const piezas = document.querySelectorAll('.pieza_endodoncia');
        const select = $('#paciente_piezas_dentales_ex_impl');

        piezas.forEach(pieza => {
            const codigo = pieza.getAttribute('data-pieza_end');

            if (codigo.startsWith('3.') || codigo.startsWith('4.')) {
                if (inferiorActivo) {
                    pieza.classList.add('seleccionada');

                    // Selecciona en el Select2 si existe la opción
                    if (select.find("option[value='" + codigo + "']").length > 0) {
                        select.find("option[value='" + codigo + "']").prop("selected", true);
                    }
                } else {
                    pieza.classList.remove('seleccionada');

                    // Deselecciona en el Select2
                    if (select.find("option[value='" + codigo + "']").length > 0) {
                        select.find("option[value='" + codigo + "']").prop("selected", false);
                    }
                }
            }
        });

        // Refresca el select2 para que se vea reflejado el cambio
        select.trigger('change');
    }

    function seleccionar_piezas_presup() {
        const checkbox = document.getElementById('piezas_presup_impl');
        // Seleccionar el <select> y actualizar sus valores
        const piezasSelect = $('#paciente_piezas_dentales_ex_impl');
        // Si está desmarcado
        if (!checkbox.checked) {
            // 1. Limpiar select2
            piezasSelect.val(null).trigger('change');

            // 2. Quitar clase seleccionada a todas las piezas
            $('.pieza_endodoncia').removeClass('seleccionada');

            return; // Salimos de la función
        }
        // Desmarcar los switches de maxilares
        document.getElementById('max_sup_impl').checked = false;
        document.getElementById('max_inf_impl').checked = false;



        // Aquí puedes agregar lógica para seleccionar solo piezas de presupuesto si lo necesitas
        // Supongamos que ya tienes este JSON cargado
        const odontograma = odontograma_global;

        // Obtener piezas únicas
        const piezasUnicas = [...new Set(odontograma.map(item => item.pieza))];


        piezasSelect.val(piezasUnicas).trigger('change');

        // Marcar visualmente las piezas en el odontograma
        piezasUnicas.forEach(pieza => {
            $(`.pieza_endodoncia[data-pieza_end="${pieza}"]`).addClass('seleccionada');
        });
        // Escuchar cambios en el Select2 para actualizar el odontograma visual
        piezasSelect.on('change', function() {
            const piezasSeleccionadas = $(this).val() || [];

            // Recorre todas las piezas visuales
            $('.pieza_endodoncia').each(function() {
                const piezaNumero = $(this).data('pieza_impl').toString();

                if (piezasSeleccionadas.includes(piezaNumero)) {
                    $(this).addClass('seleccionada');
                } else {
                    $(this).removeClass('seleccionada');
                }
            });
        });
    }

    function enviar_email_presupuesto_insumos() {
        let destinatarios = $('#selectDestinatarios').val();
        let correoLibre = $('#correoLibre').val();
        let idPaciente = $('#id_paciente_fc').val();
        let idFichaAtencion = $('#id_fc').val();

        if (destinatarios.length == 0 && correoLibre == '') {
            swal({
                title: "Debe seleccionar al menos un destinatario",
                icon: "warning",
                buttons: "Aceptar",
                DangerMode: true,
            });
            return;
        }

        let data = {
            destinatarios: destinatarios,
            correoLibre: correoLibre,
            idPaciente: idPaciente,
            idFichaAtencion: idFichaAtencion,
            _token: CSRF_TOKEN
        };

        $.ajax({
            url: '{{ ROUTE('enviar.presupuesto.insumos.email') }}',
            type: 'POST',
            data: data,
            success: function(response) {
                console.log(response);
                if (response.mensaje == 'ok') {
                    swal({
                        title: "Presupuesto enviado correctamente",
                        icon: "success",
                        buttons: "Aceptar"
                    });
                    $('#modalEnviarPresupuesto').modal('hide');
                } else {
                    swal({
                        title: "Error al enviar el presupuesto",
                        text: response.detalle,
                        icon: "error",
                        buttons: "Aceptar"
                    });
                }
            },
            error: function(error) {
                console.error("Error al enviar el presupuesto:", error);
                swal({
                    title: "Error al enviar el presupuesto",
                    text: "Por favor, intente nuevamente.",
                    icon: "error",
                    buttons: "Aceptar"
                });
            }
        });
    }

    function abrirModalCorreo() {
        $('#modalEnviarPresupuesto').modal('show');
    }

    function cargar_a_presupuesto_tto(){
        let pieza = $('#numero_pieza_tto_end').val();
        let procedimiento = $('#proc_end').val();
        let observaciones = $('#obs_tto_end').val();

        let valido = 1;
        let mensaje = "";

        if(pieza == 0){
            valido = 0;
            mensaje += "Seleccione una pieza.<br>";
        }

        if(procedimiento.trim() == ''){
            valido = 0;
            mensaje += "Seleccione un procedimiento.<br>";
        }

        if(observaciones.trim() == ""){
            //valido = 0;
            mensaje += "Ingrese observaciones.<br>";
        }

        if(valido == 0){
            swal({
                title: 'Error',
                content:{
                    element: 'div',
                    attributes: {
                        innerHTML: mensaje
                    }
                },
                icon: 'error',
                button: 'Aceptar'
            });
            return false;
        } else {
            console.log(pieza, procedimiento);
            let url = "{{ ROUTE('dental.cargar_tratamiento_presupuesto_period') }}";
            let data = {
                pieza: pieza,
                tto: procedimiento,
                observaciones: observaciones,
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
                        
                        $('#contenedor_examenes_grupos_dentales').empty();
                        $('#contenedor_examenes_grupos_dentales').append(resp.vista_presupuestos);

                        $('#contenedor_piezas_dentales_presupuesto').empty();
                        $('#table_trabajos_presupuesto tbody').empty();
                        odontograma.forEach(function(odonto){
                            if(odonto.presupuesto == 1 && odonto.urgencia == 0){
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

                                if (odonto.presupuesto == 1 && odonto.urgencia == 0) {
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
                                    $(rowNode).addClass('text-left align-left status-circle');
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
                                pieza.diagnostico,
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
                error: function(error){
                    console.log(error.responseText);
                }
            });
        }
    }
</script>
