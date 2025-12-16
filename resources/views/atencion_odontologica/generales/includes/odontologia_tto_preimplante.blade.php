<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card-a">
        <div class="card-header-a" id="exam_esp_imp_col">
            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button"
                data-toggle="collapse" onclick="mostrar_nueva_pieza_dental_tto_impl(1000);"
                data-target="#exam_esp_imp_col_c" aria-expanded="false" aria-controls="exam_esp_imp_col_c">
                Tratamiento implantológico
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
                                    <a class="nav-link-aten text-reset active" id="col_implantes_tab" data-toggle="tab"
                                        href="#col_implantes" role="tab" aria-controls="col_implantes"
                                        aria-selected="true">Procedimiento</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="protocolo_implantes_tab" data-toggle="tab"
                                        href="#protocolo_implantes" role="tab" aria-controls="protocolo_implantes"
                                        aria-selected="true" onclick="dame_insumos_tratamiento()">Protocolo e
                                        Indicaciones</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="tab-content" id="col_implante">
                                <!--PROCEDIMIENTO-->
                                <div class="tab-pane fade show active" id="col_implantes" role="tabpanel"
                                    aria-labelledby="col_implantes_tab">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-4">
                                            <h6 class="tit-gen"> Procedimiento</h6>
                                            {{-- <button type="button" class="btn btn-info btn-sm  d-inline float-md-right mt-n2 mb-2" onclick="mostrar_nueva_pieza_dental_tto_impl(1000)"><i class="fas fa-plus"></i> Añadir pieza</button> --}}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="contenedor_tto_implantologia">
                                                @php $counter = 1 @endphp
                                                @foreach ($examenes_tto_implantes as $e)
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <div class="card-informacion">
                                                                <div class="card-body">
                                                                    <div class="form-row">
                                                                        <div
                                                                            class="col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
                                                                            <label
                                                                                class="floating-label-activo-sm">Pieza
                                                                                N°</label>
                                                                            <input type="text"
                                                                                class="form-control form-control-sm"
                                                                                name="numero_pieza_tto_impl{{ $counter }}"
                                                                                id="numero_pieza_tto_impl{{ $counter }}"
                                                                                value="{{ $e->numero_pieza }}"
                                                                                onchange="dame_tratamientos_pieza({{ $e->numero_pieza }},'{{ $counter }}');">
                                                                        </div>
                                                                        <div
                                                                            class="col-sm-12 col-md-9 col-lg-9 col-xl-9 col-xxl-9">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    class="floating-label-activo-sm">Procedimiento</label>
                                                                                <select
                                                                                    name="proc_imp{{ $counter }}"
                                                                                    data-titulo="proc_imp"
                                                                                    data-seccion="Implante"
                                                                                    id="proc_imp{{ $counter }}"
                                                                                    class="form-control form-control-sm"
                                                                                    onchange="evaluar_para_carga_detalle('proc_imp{{ $counter }}','div_proc_imp{{ $counter }}','obs_proc_impo{{ $counter }}',10);">
                                                                                    <option
                                                                                        value="{{ $e->id }}">
                                                                                        {{ $e->tratamiento }}</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        @php
                                                                            $opcionesMembranas = [
                                                                                1 => 'MEMBRANA DE COLÁGENO BIOMEND 15 X 20 MM',
                                                                                2 => 'MEMBRANA DE COLÁGENO BIOMEND 20 X 30 MM',
                                                                                3 => 'MEMBRANA DE COLÁGENO BIOMEND 30 X 40 MM',
                                                                                4 => 'MEMBRANA DE COLÁGENO BIOMEND EXTEND 15 X 20 MM',
                                                                                5 => 'MEMBRANA DE COLÁGENO BIOMEND EXTEND 20 X 30 MM',
                                                                                6 => 'MEMBRANA DE COLÁGENO BIOMEND EXTEND 30 X 40 MM',
                                                                                7 => 'COLLPROTECT MEMBRANE 15 X 20 MM',
                                                                                8 => 'COLLPROTECT MEMBRANE 20 X 30 MM',
                                                                                9 => 'COLLPROTECT MEMBRANE 30 X 40 MM',
                                                                                10 => 'JASON MEMBRANE 15 X 20 MM',
                                                                                11 => 'JASON MEMBRANE 20 X 30 MM',
                                                                                12 => 'JASON MEMBRANE 30 X 40 MM',
                                                                                13 => 'MEMBRANA OSSEOGUARD ® PTFE TEXTURED 12 X 24 MM',
                                                                                14 => 'MEMBRANA OSSEOGUARD ® PTFE TEXTURED 25 X 30 MM',
                                                                                15 => 'MEMBRANA OSSEOGUARD ® PTFE TR250 12 X 24 ANTERIOR',
                                                                                16 => 'MEMBRANA OSSEOGUARD ® PTFE TR250 20 X 25 POSTERIOR',
                                                                                17 => 'MEMBRANA PTFE PERMANEM 15 X 20 MM',
                                                                                18 => 'MEMBRANA PTFE PERMANEM 20 X 30 MM',
                                                                                19 => 'MEMBRANA PTFE PERMANEM 30 X 40 MM',
                                                                            ];
                                                                        @endphp

                                                                        <div
                                                                            class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    class="floating-label-activo-sm">Membrana</label>
                                                                                <select
                                                                                    name="membr_impl{{ $counter }}"
                                                                                    data-titulo="membr_impl{{ $counter }}"
                                                                                    data-seccion="membr_impl{{ $counter }}"
                                                                                    id="membr_impl{{ $counter }}"
                                                                                    class="form-control form-control-sm"
                                                                                    onchange="evaluar_para_carga_detalle('membr_impl{{ $counter }}','div_membr_impl{{ $counter }}','obs_membr_impl{{ $counter }}',4);">
                                                                                    <option value="0">Seleccione
                                                                                    </option>
                                                                                    @foreach ($opcionesMembranas as $valor => $texto)
                                                                                        <option
                                                                                            value="{{ $valor }}"
                                                                                            @if ($e->id_tipo_membrana == $valor) selected @endif>
                                                                                            {{ $texto }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group"
                                                                                id="div_membr_impl{{ $counter }}"
                                                                                @if ($e->id_tipo_membrana !== 4) style="display:none;" @endif>
                                                                                <label
                                                                                    class="floating-label-activo-sm">Otra
                                                                                    membrana</label>
                                                                                <textarea class="form-control form-control-sm" data-titulo="Ex_cuello" rows="1" onfocus="this.rows=3"
                                                                                    onblur="this.rows=1;" name="obs_membr_impl{{ $counter }}" id="obs_membr_impl{{ $counter }}">{{ $e->anestesia }}</textarea>
                                                                            </div>
                                                                        </div>

                                                                        @php
                                                                            $materialesMembranas = [
                                                                                'Reabsorbibles' => [
                                                                                    1 => 'Membrana de colágeno',
                                                                                    2 => 'Polímeros sintéticos',
                                                                                    3 => 'Membrana de fibrina',
                                                                                    4 => 'PRF',
                                                                                    5 => 'Pericardio',
                                                                                ],
                                                                                'No reabsorbibles' => [
                                                                                    6 => 'Membranas de PTFE',
                                                                                    7 => 'Membranas de PTFE reforzadas con titanio',
                                                                                    8 => 'Malla de titanio',
                                                                                ],
                                                                            ];
                                                                        @endphp

                                                                        <div
                                                                            class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    class="floating-label-activo-sm">Material
                                                                                    Membrana</label>
                                                                                <select
                                                                                    name="mat_membr_impl{{ $counter }}"
                                                                                    data-titulo="mat_membr_impl{{ $counter }}"
                                                                                    data-seccion="mat_membr_impl{{ $counter }}"
                                                                                    id="mat_membr_impl{{ $counter }}"
                                                                                    class="form-control form-control-sm"
                                                                                    onchange="evaluar_para_carga_detalle('mat_membr_impl{{ $counter }}','div_mat_membr_impl{{ $counter }}','obs_mat_membr_impl{{ $counter }}',4);">
                                                                                    <option value="0">Seleccione
                                                                                    </option>
                                                                                    @foreach ($materialesMembranas as $grupo => $opciones)
                                                                                        <optgroup
                                                                                            label="{{ $grupo }}">
                                                                                            @foreach ($opciones as $valor => $texto)
                                                                                                <option
                                                                                                    value="{{ $valor }}"
                                                                                                    @if ($e->id_material_membrana == $valor) selected @endif>
                                                                                                    {{ $texto }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        </optgroup>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group"
                                                                                id="div_mat_membr_impl{{ $counter }}"
                                                                                @if ($e->id_tipo_material_membrana !== 4) style="display:none;" @endif>
                                                                                <label
                                                                                    class="floating-label-activo-sm">Otro
                                                                                    Material Membrana</label>
                                                                                <textarea class="form-control form-control-sm" data-titulo="Ex_cuello" rows="1" onfocus="this.rows=3"
                                                                                    onblur="this.rows=1;" name="obs_mat_membr_impl{{ $counter }}" id="obs_mat_membr_impl{{ $counter }}">{{ $e->anestesia }}</textarea>
                                                                            </div>
                                                                        </div>
                                                                                                                                                <div
                                                                            class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    class="floating-label-activo-sm">Material
                                                                                    de injerto óseo</label>
                                                                                <select
                                                                                    name="mat_inj_oseo_impl{{ $counter }}"
                                                                                    data-titulo="Ex_cuello"
                                                                                    data-seccion="Cuello"
                                                                                    id="mat_inj_oseo_impl{{ $counter }}"
                                                                                    class="form-control form-control-sm"
                                                                                    onchange="evaluar_para_carga_detalle('mat_inj_oseo{{ $counter }}','div_mat_inj_oseo{{ $counter }}','obs_mat_inj_oseo{{ $counter }}',6);">
                                                                                    <option
                                                                                        @if ($e->id_mat_injerto_oseo == 1) selected @endif
                                                                                        value="1">Sin Injerto Óseo
                                                                                    </option>
                                                                                    <option
                                                                                        @if ($e->id_mat_injerto_oseo == 2) selected @endif
                                                                                        value="2">autoinjerto
                                                                                    </option>
                                                                                    <option
                                                                                        @if ($e->id_mat_injerto_oseo == 3) selected @endif
                                                                                        value="3">aloinjerto
                                                                                    </option>
                                                                                    <option
                                                                                        @if ($e->id_mat_injerto_oseo == 4) selected @endif
                                                                                        value="4">xenoinjerto
                                                                                    </option>
                                                                                    <option
                                                                                        @if ($e->id_mat_injerto_oseo == 5) selected @endif
                                                                                        value="5">aloplástico
                                                                                    </option>
                                                                                    <option
                                                                                        @if ($e->id_mat_injerto_oseo == 6) selected @endif
                                                                                        value="6">Otro (describir)
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group"
                                                                                id="div_mat_inj_oseo{{ $counter }}"
                                                                                @if ($e->id_mat_injerto_oseo !== 6) style="display:none;" @endif>
                                                                                <label
                                                                                    class="floating-label-activo-sm">Otro
                                                                                    tipo de injerto</label>
                                                                                <textarea class="form-control form-control-sm" data-titulo="Ex_cuello" rows="1" onfocus="this.rows=3"
                                                                                    onblur="this.rows=1;" name="obs_mat_inj_oseo{{ $counter }}" id="obs_mat_inj_oseo{{ $counter }}">{{ $e->material_injerto_oseo }}</textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    class="floating-label-activo-sm">Método
                                                                                    de injerto óseo</label>
                                                                                <input type="text"
                                                                                    name="metodo_injerto_tto{{ $counter }}"
                                                                                    id="metodo_injerto_tto{{ $counter }}"
                                                                                    class="form-control form-control-sm"
                                                                                    value="{{ $e->metodo_injerto_oseo }}">
                                                                            </div>
                                                                        </div>

                                                                        <div
                                                                            class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-2">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    class="floating-label-activo-sm">Anestesia</label>
                                                                                <select
                                                                                    name="anestesia_impl{{ $counter }}"
                                                                                    data-titulo="anestesia_impl"
                                                                                    data-seccion="anestesia_impl{{ $counter }}"
                                                                                    id="anestesia_impl{{ $counter }}"
                                                                                    class="form-control form-control-sm"
                                                                                    onchange="evaluar_para_carga_detalle('anestesia_impl{{ $counter }}','div_anestesia_impl{{ $counter }}','obs_anestesia_impl{{ $counter }}',4);">
                                                                                    <option
                                                                                        @if ($e->id_tipo_anestesia == 1) selected @endif
                                                                                        value="1">Local</option>
                                                                                    <option
                                                                                        @if ($e->id_tipo_anestesia == 2) selected @endif
                                                                                        value="2">Local mas
                                                                                        sedación consciente</option>
                                                                                    <option
                                                                                        @if ($e->id_tipo_anestesia == 3) selected @endif
                                                                                        value="3">Anestesia
                                                                                        General</option>
                                                                                    <option
                                                                                        @if ($e->id_tipo_anestesia == 4) selected @endif
                                                                                        value="4">Otro describir
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group"
                                                                                id="div_anestesia_impl{{ $counter }}"
                                                                                @if ($e->id_tipo_anestesia !== 4) style="display:none;" @endif>
                                                                                <label
                                                                                    class="floating-label-activo-sm">Otra
                                                                                    anestesia</label>
                                                                                <textarea class="form-control form-control-sm" data-titulo="Ex_cuello" rows="1" onfocus="this.rows=3"
                                                                                    onblur="this.rows=1;" name="obs_anestesia_impl{{ $counter }}" id="obs_anestesia_impl{{ $counter }}">{{ $e->anestesia }}</textarea>
                                                                            </div>
                                                                        </div>
                                                         
                                                                        <div
                                                                            class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-3">
                                                                            <div class="form-group">
                                                                                <label for=""
                                                                                    class="floating-label-activo-sm">Técnica
                                                                                    de antestesia</label>
                                                                                <select
                                                                                    name="tec_anestesia_impl{{ $counter }}"
                                                                                    data-titulo="tec_anestesia_impl{{ $counter }}"
                                                                                    data-seccion="tec_anestesia_impl{{ $counter }}"
                                                                                    id="tec_anestesia_impl{{ $counter }}"
                                                                                    class="form-control form-control-sm"
                                                                                    onchange="evaluar_para_carga_detalle('tec_anestesia_impl{{ $counter }}','div_tec_anestesia_impl{{ $counter }}','obs_tec_anestesia_impl{{ $counter }}',10);">
                                                                                    <option
                                                                                        @if ($e->id_tecnica_anestesia == 1) selected @endif
                                                                                        value="1">Infiltrativa
                                                                                        vestibular </option>
                                                                                    <option
                                                                                        @if ($e->id_tecnica_anestesia == 2) selected @endif
                                                                                        value="2">Infiltrativa
                                                                                        palatina/lingual</option>
                                                                                    <option
                                                                                        @if ($e->id_tecnica_anestesia == 3) selected @endif
                                                                                        value="3">Spix indirecta
                                                                                    </option>
                                                                                    <option
                                                                                        @if ($e->id_tecnica_anestesia == 4) selected @endif
                                                                                        value="4">Spix directa
                                                                                    </option>
                                                                                    <option
                                                                                        @if ($e->id_tecnica_anestesia == 5) selected @endif
                                                                                        value="5">Técnica de
                                                                                        tuberosidad</option>
                                                                                    <option
                                                                                        @if ($e->id_tecnica_anestesia == 6) selected @endif
                                                                                        value="6">Técnica
                                                                                        infraorbitaria</option>
                                                                                    <option
                                                                                        @if ($e->id_tecnica_anestesia == 7) selected @endif
                                                                                        value="7">Técnica carrea
                                                                                    </option>
                                                                                    <option
                                                                                        @if ($e->id_tecnica_anestesia == 8) selected @endif
                                                                                        value="8">Técnica akinosi
                                                                                    </option>
                                                                                    <option
                                                                                        @if ($e->id_tecnica_anestesia == 9) selected @endif
                                                                                        value="9">Técnica gowgates
                                                                                    </option>
                                                                                    <option
                                                                                        @if ($e->id_tecnica_anestesia == 10) selected @endif
                                                                                        value="10">Otro describir
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group"
                                                                                id="div_tec_anestesia_impl{{ $counter }}"
                                                                                @if ($e->id_tecnica_anestesia !== 10) style="display:none;" @endif>
                                                                                <label
                                                                                    class="floating-label-activo-sm">Otra
                                                                                    anestesia</label>
                                                                                <textarea class="form-control form-control-sm" data-titulo="Ex_cuello" rows="1" onfocus="this.rows=3"
                                                                                    onblur="this.rows=1;" name="obs_tec_anestesia_impl{{ $counter }}"
                                                                                    id="obs_tec_anestesia_impl{{ $counter }}">{{ $e->tecnica_anestesia }}</textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-3">
                                                                            <div class="form-group">
                                                                                <label for=""
                                                                                    class="floating-label-activo-sm">Anestésico</label>
                                                                                <select
                                                                                    name="anestesico_impl{{ $counter }}"
                                                                                    data-titulo="anestesico_impl{{ $counter }}"
                                                                                    data-seccion="anestesico_impl"
                                                                                    id="anestesico_impl{{ $counter }}"
                                                                                    class="form-control form-control-sm"
                                                                                    onchange="evaluar_para_carga_detalle('anestesico_impl{{ $counter }}','div_anestesico_impl{{ $counter }}','obs_anestesico_impl{{ $counter }}',6);">
                                                                                    <option
                                                                                        @if ($e->id_anestesico == 1) selected @endif
                                                                                        value="1">Lidocaína 2%
                                                                                    </option>
                                                                                    <option
                                                                                        @if ($e->id_anestesico == 2) selected @endif
                                                                                        value="2">Mepivacaína 3%
                                                                                    </option>
                                                                                    <option
                                                                                        @if ($e->id_anestesico == 3) selected @endif
                                                                                        value="3">Articaína 4%
                                                                                    </option>
                                                                                    <option
                                                                                        @if ($e->id_anestesico == 4) selected @endif
                                                                                        value="4">Benzocaína 7.5%
                                                                                    </option>
                                                                                    <option
                                                                                        @if ($e->id_anestesico == 5) selected @endif
                                                                                        value="5">Bupivacaína 7.5%
                                                                                    </option>
                                                                                    <option
                                                                                        @if ($e->id_anestesico == 6) selected @endif
                                                                                        value="6">Otro describir
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group"
                                                                                id="div_anestesico_impl{{ $counter }}"
                                                                                @if ($e->id_anestesico !== 6) style="display:none;" @endif>
                                                                                <label
                                                                                    class="floating-label-activo-sm">Otro
                                                                                    anestesico</label>
                                                                                <textarea class="form-control form-control-sm" data-titulo="anestisico_dental_title" rows="1"
                                                                                    onfocus="this.rows=3" onblur="this.rows=1;" name="obs_anestesico_impl{{ $counter }}"
                                                                                    id="obs_anestesico_impl{{ $counter }}">{{ $e->anestesico }}</textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="col-sm-12 col-md-3 col-lg-3 col-xl-2 col-xxl-1">
                                                                            <div class="form-group">
                                                                                <label for=""
                                                                                    class="floating-label-activo-sm">N°
                                                                                    de tubos</label>
                                                                                <input type="text"
                                                                                    class="form-control form-control-sm"
                                                                                    name="numero_tubos_impl{{ $counter }}"
                                                                                    id="numero_tubos_impl{{ $counter }}"
                                                                                    value="{{ $e->numero_tubos }}">
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="col-sm-12 col-md-3 col-lg-3 col-xl-4 col-xxl-3">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    class="floating-label-activo-sm">Incidentes</label>
                                                                                <select
                                                                                    name="incid_col_impl{{ $counter }}"
                                                                                    data-titulo="Ex_cuello"
                                                                                    data-seccion="Cuello"
                                                                                    id="incid_col_impl{{ $counter }}"
                                                                                    class="form-control form-control-sm"
                                                                                    onchange="evaluar_para_carga_detalle('incid_col_impl{{ $counter }}','div_incid_col_impl{{ $counter }}','obs_incid_col_impl{{ $counter }}',2);">
                                                                                    <option
                                                                                        @if ($e->id_incidentes == 1) selected @endif
                                                                                        value="1">Sin incidentes
                                                                                    </option>
                                                                                    <option
                                                                                        @if ($e->id_incidentes == 2) selected @endif
                                                                                        value="2">Con Incidentes
                                                                                    </option>

                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group"
                                                                                id="div_incid_col_impl{{ $counter }}"
                                                                                @if ($e->id_incidentes !== 2) style="display:none;" @endif>
                                                                                <label
                                                                                    class="floating-label-activo-sm">Obs</label>
                                                                                <textarea class="form-control form-control-sm" data-titulo="Ex_cuello" rows="1" onfocus="this.rows=3"
                                                                                    onblur="this.rows=1;" name="obs_incid_col_impl{{ $counter }}" id="obs_incid_col_impl{{ $counter }}">{{ $e->incidentes }}</textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="col-sm-12 col-md-3 col-lg-3 col-xl-4 col-xxl-2">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    class="floating-label-activo-sm">Suturas</label>
                                                                                <select
                                                                                    name="suturas_impl{{ $counter }}"
                                                                                    data-titulo="suturas_impl{{ $counter }}"
                                                                                    data-seccion="suturas"
                                                                                    id="suturas_impl{{ $counter }}"
                                                                                    class="form-control form-control-sm"
                                                                                    onchange="evaluar_para_carga_detalle('suturas_impl{{ $counter }}','div_suturas{{ $counter }}','obs_suturas{{ $counter }}',5);">
                                                                                    <option
                                                                                        @if ($e->id_suturas == 1) selected @endif
                                                                                        value="1">Catgut</option>
                                                                                    <option
                                                                                        @if ($e->id_suturas == 2) selected @endif
                                                                                        value="2">Seda</option>
                                                                                    <option
                                                                                        @if ($e->id_suturas == 3) selected @endif
                                                                                        value="3">Nylon</option>
                                                                                    <option
                                                                                        @if ($e->id_suturas == 4) selected @endif
                                                                                        value="4">Polipropileno
                                                                                    </option>
                                                                                    <option
                                                                                        @if ($e->id_suturas == 5) selected @endif
                                                                                        value="5">Otro describir
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group"
                                                                                id="div_suturas{{ $counter }}"
                                                                                @if ($e->id_suturas !== 5) style="display:none;" @endif>
                                                                                <label
                                                                                    class="floating-label-activo-sm">Describa</label>
                                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                    name="obs_suturas{{ $counter }}" id="obs_suturas{{ $counter }}">{{ $e->suturas }}</textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="col-sm-12 col-md-3 col-lg-3 col-xl-2 col-xxl-2">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    class="floating-label-activo-sm">Grosor</label>
                                                                                <input type="text"
                                                                                    name="grosor_nylon{{ $counter }}"
                                                                                    id="grosor_nylon{{ $counter }}"
                                                                                    class="form-control form-control-sm"
                                                                                    value="{{ $e->grosor_nylon }}">
                                                                            </div>
                                                                            <div class="form-group"
                                                                                id="div_grosor_nylon{{ $counter }}"
                                                                                style="display:none;">
                                                                                <label
                                                                                    class="floating-label-activo-sm">Describa</label>
                                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                                    name="obs_grosor_nylon{{ $counter }}" id="obs_grosor_nylon{{ $counter }}">{{ $e->grosor_nylon }}</textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="col-sm-12 col-md-3 col-lg-3 col-xl-4 col-xxl-2">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    for="tiempo_quir_impl{{ $counter }}"
                                                                                    class="floating-label-activo-sm">Tiempo
                                                                                    quirúrgico</label>
                                                                                <input type="text"
                                                                                    class="form-control form-control-sm"
                                                                                    id="tiempo_quir_impl{{ $counter }}"
                                                                                    value="{{ $e->tiempo_quirurgico }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-9 col-lg-9 col-xl-8 col-xxl-6">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Observaciones</label>
                                                                                <textarea class="form-control form-control-sm" data-titulo="Ex_cuello" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_impl1000" id="obs_impl1000"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card-footer d-flex justify-content-between align-items-center">
                                                                    <div class="form-group">
                                                                        <button type="button"
                                                                            class="btn btn-icon btn-danger-light-c"
                                                                            onclick="eliminar_pieza_dental_tto_impl({{ $e->id }},{{ $e->id_procedimiento }})">X</button>

                                                                    </div>
                                                                    <div class="badge badge-danger">Prestación terminada.</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @php $counter++; @endphp
                                                @endforeach
                                            </div>
                                            <div id="pieza_dental_tto_impl">
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
                                                    aria-controls="cit_control_impl" aria-selected="false">Control</a>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-10 col-xl-10">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <!--PROTOCOLO-->
                                                <div class="tab-pane fade show active" id="prot_impl" role="tabpanel"
                                                    aria-labelledby="prot_impl_tab">
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
                                                                        <button type="button" class="btn btn-danger"
                                                                            onclick="ocultar_cirujano_impl()"><i
                                                                                class="feather icon-x"></i></button>
                                                                        <button type="button" class="btn btn-info"><i
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
                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Forma y
                                                                    material del Implante</label>
                                                                <select name="prot_forma_mat" id="prot_forma_mat"
                                                                    class="form-control form-control-sm"
                                                                    onchange="evaluar_para_carga_detalle('prot_forma_mat','div_prot_forma_mat','det_prot_forma_mat',13)">
                                                                    <option value="0">Seleccione</option>
                                                                    <option value="1">Cilíndricos Titanio</option>
                                                                    <option value="2">Cilíndricos Porcelana
                                                                    </option>
                                                                    <option value="3">Cilíndricos Zirconio
                                                                    </option>
                                                                    <option value="4">Laminados Titanio</option>
                                                                    <option value="5">Laminados Porcelana</option>
                                                                    <option value="6">Laminados Zirconio</option>
                                                                    <option value="7">Tornillo Titanio</option>
                                                                    <option value="8">Tornillo Porcelana</option>
                                                                    <option value="9">Tornillo Zirconio</option>
                                                                    <option value="10">Cónicos Titanio</option>
                                                                    <option value="11">Cónicos Porcelana</option>
                                                                    <option value="12">Cónicos Zirconio</option>
                                                                    <option value="13">Otro</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group" id="div_prot_forma_mat"
                                                                style="display:none">
                                                                <label class="floating-label-activo-sm">Otros
                                                                    (Describir)</label>
                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz"
                                                                    rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="det_prot_forma_mat" id="det_prot_forma_mat"></textarea>
                                                            </div>
                                                        </div>

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
                                                                <label
                                                                    class="floating-label-activo-sm">Implante</label>
                                                                <select name="prot_implante" id="prot_implante"
                                                                    class="form-control form-control-sm"
                                                                    onchange="evaluar_para_carga_detalle('prot_marc_implante','div_prot_marc_implante','obs_prot_marc_implante',3);"
                                                                    multiple="multiple">
                                                                    @foreach ($insumos_tratamientos as $i)
                                                                        <option value="{{ $i->id }}">
                                                                            {{ $i->insumos }}
                                                                            {{ $i->nombre_marca }}</option>
                                                                    @endforeach
                                                                    <option value="otro">Otro</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group" id="div_prot_marc_implante"
                                                                style="display:none;">
                                                                <label class="floating-label-activo-sm">Otra
                                                                    Marca</label>
                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                                                    name="obs_prot_marc_implante" id="obs_prot_marc_implante"></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                            <div class="form-group">
                                                                <label
                                                                    class="floating-label-activo-sm">Implantes</label>
                                                                <select name="prot_proc" id="prot_proc"
                                                                    class="form-control form-control-sm"
                                                                    onchange="evaluar_para_carga_detalle('prot_proc','div_prot_proc','det_prot_proc',3)">
                                                                    <option value="0">Seleccione</option>
                                                                    <option value="1">Implante único</option>
                                                                    <option value="2">Implante Múltiple</option>
                                                                    <option value="3">Otro</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group" id="div_prot_proc"
                                                                style="display:none">
                                                                <label class="floating-label-activo-sm">Otros
                                                                    (Describir)</label>
                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz"
                                                                    rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="det_prot_proc" id="det_prot_proc"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Corona / Prot.
                                                                    Provisoria</label>
                                                                <select name="prot_prot_corona" id="prot_prot_corona"
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
                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz"
                                                                    rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="det_prot_prot_corona"
                                                                    id="det_prot_prot_corona"></textarea>
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
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;"
                                                                    name="det_cir" id="det_cir">{{ $detallesCirugiaTexto }}</textarea>
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
                                                                Post Implante </button>
                                                        </div>
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6 col-xl-6">
                                                            <button type="button"
                                                                class="btn btn-outline-primary btn-block btn-sm my-2"
                                                                onclick="recomendaciones_esp_implante();"><i
                                                                    class="fas fa-plus"></i> Indicaciones Especiales
                                                                para el paciente post Implante </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--CONTROL-->
                                                <div class="tab-pane fade show" id="cit_control_impl" role="tabpanel"
                                                    aria-labelledby="cit_control_impl_tab">
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
