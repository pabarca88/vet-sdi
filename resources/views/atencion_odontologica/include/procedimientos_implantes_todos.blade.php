@php $counter = 1 @endphp
@foreach ($examenes as $e)
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card-informacion">
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">
                            <label class="floating-label-activo-sm">Pieza N°</label>
                            <input type="text" class="form-control form-control-sm"
                                name="numero_pieza_tto_impl{{ $counter }}"
                                id="numero_pieza_tto_impl{{ $counter }}" value="{{ $e->numero_pieza }}">
                        </div>
                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Tipo de Procedimiento</label>
                                <select name="tpo_proc_imp{{ $counter }}" data-titulo="tpo_proc_imp"
                                    data-seccion="Implante" id="tpo_proc_imp{{ $counter }}"
                                    class="form-control form-control-sm"
                                    onchange="evaluar_para_carga_detalle('tpo_proc_imp{{ $counter }}','div_tpo_proc_imp{{ $counter }}','obs_tpo_proc_impo{{ $counter }}',10);">
                                    @foreach ($tratamientos_implantologia as $t)
                                        <option value="{{ $t->id }}"
                                            @if ($e->id_tipo_procedimiento == $t->id) selected @endif>{{ $t->descripcion }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group" id="div_tpo_proc_imp{{ $counter }}" style="display:none;">
                                <label class="floating-label-activo-sm">Otro tipo de Procedimiento</label>
                                <textarea class="form-control form-control-sm" data-titulo="Ex_cuello" rows="1" onfocus="this.rows=3"
                                    onblur="this.rows=1;" name="obs_tpo_proc_imp{{ $counter }}" id="obs_tpo_proc_imp{{ $counter }}">{{ $e->tipo_procedimiento }}</textarea>
                                <div class="form-group mt-3">
                                    <label class="floating-label-activo-sm">UCO?</label>
                                    <input type="text"class="form-control form-control-sm"
                                        id="uco_tto{{ $counter }}">
                                </div>
                                <div class="form-group mt-3">
                                    <label class="floating-label-activo-sm">Laboratorio</label>
                                    <input type="text"class="form-control form-control-sm"
                                        id="lab_tto{{ $counter }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Anestesia</label>
                                <select name="anestesia_impl{{ $counter }}" data-titulo="anestesia_impl"
                                    data-seccion="anestesia_impl{{ $counter }}"
                                    id="anestesia_impl{{ $counter }}" class="form-control form-control-sm"
                                    onchange="evaluar_para_carga_detalle('anestesia_impl{{ $counter }}','div_anestesia_impl{{ $counter }}','obs_anestesia_impl{{ $counter }}',4);">
                                    <option @if ($e->id_tipo_anestesia == 1) selected @endif value="1">Local
                                    </option>
                                    <option @if ($e->id_tipo_anestesia == 2) selected @endif value="2">Local mas
                                        sedación consciente</option>
                                    <option @if ($e->id_tipo_anestesia == 3) selected @endif value="3">Anestesia
                                        General</option>
                                    <option @if ($e->id_tipo_anestesia == 4) selected @endif value="4">Otro
                                        describir</option>
                                </select>
                            </div>
                            <div class="form-group" id="div_anestesia_impl{{ $counter }}"
                                @if ($e->id_tipo_anestesia !== 4) style="display:none;" @endif>
                                <label class="floating-label-activo-sm">Otra anestesia</label>
                                <textarea class="form-control form-control-sm" data-titulo="Ex_cuello" rows="1" onfocus="this.rows=3"
                                    onblur="this.rows=1;" name="obs_anestesia_impl{{ $counter }}" id="obs_anestesia_impl{{ $counter }}">{{ $e->anestesia }}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">
                            <div class="form-group">
                                <label for="" class="floating-label-activo-sm">N° de tubos</label>
                                <input type="text" class="form-control form-control-sm"
                                    name="numero_tubos_impl{{ $counter }}"
                                    id="numero_tubos_impl{{ $counter }}" value="{{ $e->numero_tubos }}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                            <div class="form-group">
                                <label for="" class="floating-label-activo-sm">Técnica de antestesia</label>
                                <select name="tec_anestesia_impl{{ $counter }}"
                                    data-titulo="tec_anestesia_impl{{ $counter }}"
                                    data-seccion="tec_anestesia_impl{{ $counter }}"
                                    id="tec_anestesia_impl{{ $counter }}" class="form-control form-control-sm"
                                    onchange="evaluar_para_carga_detalle('tec_anestesia_impl{{ $counter }}','div_tec_anestesia_impl{{ $counter }}','obs_tec_anestesia_impl{{ $counter }}',10);">
                                    <option @if ($e->id_tecnica_anestesia == 1) selected @endif value="1">
                                        Infiltrativa vestibular </option>
                                    <option @if ($e->id_tecnica_anestesia == 2) selected @endif value="2">
                                        Infiltrativa palatina/lingual</option>
                                    <option @if ($e->id_tecnica_anestesia == 3) selected @endif value="3">Spix
                                        indirecta</option>
                                    <option @if ($e->id_tecnica_anestesia == 4) selected @endif value="4">Spix
                                        directa</option>
                                    <option @if ($e->id_tecnica_anestesia == 5) selected @endif value="5">Técnica
                                        de tuberosidad</option>
                                    <option @if ($e->id_tecnica_anestesia == 6) selected @endif value="6">Técnica
                                        infraorbitaria</option>
                                    <option @if ($e->id_tecnica_anestesia == 7) selected @endif value="7">Técnica
                                        carrea</option>
                                    <option @if ($e->id_tecnica_anestesia == 8) selected @endif value="8">Técnica
                                        akinosi</option>
                                    <option @if ($e->id_tecnica_anestesia == 9) selected @endif value="9">Técnica
                                        gowgates</option>
                                    <option @if ($e->id_tecnica_anestesia == 10) selected @endif value="10">Otro
                                        describir</option>
                                </select>
                            </div>
                            <div class="form-group" id="div_tec_anestesia_impl{{ $counter }}"
                                @if ($e->id_tecnica_anestesia !== 10) style="display:none;" @endif>
                                <label class="floating-label-activo-sm">Otra anestesia</label>
                                <textarea class="form-control form-control-sm" data-titulo="Ex_cuello" rows="1" onfocus="this.rows=3"
                                    onblur="this.rows=1;" name="obs_tec_anestesia_impl{{ $counter }}"
                                    id="obs_tec_anestesia_impl{{ $counter }}">{{ $e->tecnica_anestesia }}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                            <div class="form-group">
                                <label for="" class="floating-label-activo-sm">Anestésico</label>
                                <select name="anestesico_impl{{ $counter }}"
                                    data-titulo="anestesico_impl{{ $counter }}" data-seccion="anestesico_impl"
                                    id="anestesico_impl{{ $counter }}" class="form-control form-control-sm"
                                    onchange="evaluar_para_carga_detalle('anestesico_impl{{ $counter }}','div_anestesico_impl{{ $counter }}','obs_anestesico_impl{{ $counter }}',6);">
                                    <option @if ($e->id_anestesico == 1) selected @endif value="1">
                                        Lidocaína 2% </option>
                                    <option @if ($e->id_anestesico == 2) selected @endif value="2">
                                        Mepivacaína 3%</option>
                                    <option @if ($e->id_anestesico == 3) selected @endif value="3">
                                        Articaína 4%</option>
                                    <option @if ($e->id_anestesico == 4) selected @endif value="4">
                                        Benzocaína 7.5%</option>
                                    <option @if ($e->id_anestesico == 5) selected @endif value="5">
                                        Bupivacaína 7.5%</option>
                                    <option @if ($e->id_anestesico == 6) selected @endif value="6">Otro
                                        describir</option>
                                </select>
                            </div>
                            <div class="form-group" id="div_anestesico_impl{{ $counter }}"
                                @if ($e->id_anestesico !== 6) style="display:none;" @endif>
                                <label class="floating-label-activo-sm">Otro anestesico</label>
                                <textarea class="form-control form-control-sm" data-titulo="anestisico_dental_title" rows="1"
                                    onfocus="this.rows=3" onblur="this.rows=1;" name="obs_anestesico_impl{{ $counter }}"
                                    id="obs_anestesico_impl{{ $counter }}">{{ $e->anestesico }}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Incidentes</label>
                                <select name="incid_col_impl{{ $counter }}" data-titulo="Ex_cuello"
                                    data-seccion="Cuello" id="incid_col_impl{{ $counter }}"
                                    class="form-control form-control-sm"
                                    onchange="evaluar_para_carga_detalle('incid_col_impl{{ $counter }}','div_incid_col_impl{{ $counter }}','obs_incid_col_impl{{ $counter }}',2);">
                                    <option @if ($e->id_incidentes == 1) selected @endif value="1">Sin
                                        incidentes</option>
                                    <option @if ($e->id_incidentes == 2) selected @endif value="2">Con
                                        Incidentes</option>

                                </select>
                            </div>
                            <div class="form-group" id="div_incid_col_impl{{ $counter }}"
                                @if ($e->id_incidentes !== 2) style="display:none;" @endif>
                                <label class="floating-label-activo-sm">Obs</label>
                                <textarea class="form-control form-control-sm" data-titulo="Ex_cuello" rows="1" onfocus="this.rows=3"
                                    onblur="this.rows=1;" name="obs_incid_col_impl{{ $counter }}" id="obs_incid_col_impl{{ $counter }}">{{ $e->incidentes }}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Material de injerto óseo</label>
                                <select name="mat_inj_oseo_impl{{ $counter }}" data-titulo="Ex_cuello"
                                    data-seccion="Cuello" id="mat_inj_oseo_impl{{ $counter }}"
                                    class="form-control form-control-sm"
                                    onchange="evaluar_para_carga_detalle('mat_inj_oseo{{ $counter }}','div_mat_inj_oseo{{ $counter }}','obs_mat_inj_oseo{{ $counter }}',6);">
                                    <option @if ($e->id_mat_injerto_oseo == 1) selected @endif value="1">Sin
                                        Injerto Óseo</option>
                                    <option @if ($e->id_mat_injerto_oseo == 2) selected @endif value="2">
                                        autoinjerto</option>
                                    <option @if ($e->id_mat_injerto_oseo == 3) selected @endif value="3">
                                        aloinjerto</option>
                                    <option @if ($e->id_mat_injerto_oseo == 4) selected @endif value="4">
                                        xenoinjerto</option>
                                    <option @if ($e->id_mat_injerto_oseo == 5) selected @endif value="5">
                                        aloplástico</option>
                                    <option @if ($e->id_mat_injerto_oseo == 6) selected @endif value="6">Otro
                                        (describir)</option>
                                </select>
                            </div>
                            <div class="form-group" id="div_mat_inj_oseo{{ $counter }}"
                                @if ($e->id_mat_injerto_oseo !== 6) style="display:none;" @endif>
                                <label class="floating-label-activo-sm">Otro tipo de injerto</label>
                                <textarea class="form-control form-control-sm" data-titulo="Ex_cuello" rows="1" onfocus="this.rows=3"
                                    onblur="this.rows=1;" name="obs_mat_inj_oseo{{ $counter }}" id="obs_mat_inj_oseo{{ $counter }}">{{ $e->material_injerto_oseo }}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Método de injerto óseo</label>
                                <input type="text" name="metodo_injerto_tto{{ $counter }}"
                                    id="metodo_injerto_tto{{ $counter }}" class="form-control form-control-sm"
                                    value="{{ $e->metodo_injerto_oseo }}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Suturas</label>
                                <select name="suturas_impl{{ $counter }}"
                                    data-titulo="suturas_impl{{ $counter }}" data-seccion="suturas"
                                    id="suturas_impl{{ $counter }}" class="form-control form-control-sm"
                                    onchange="evaluar_para_carga_detalle('suturas_impl{{ $counter }}','div_suturas{{ $counter }}','obs_suturas{{ $counter }}',5);">
                                    <option @if ($e->id_suturas == 1) selected @endif value="1">Catgut
                                    </option>
                                    <option @if ($e->id_suturas == 2) selected @endif value="2">Seda
                                    </option>
                                    <option @if ($e->id_suturas == 3) selected @endif value="3">Nylon
                                    </option>
                                    <option @if ($e->id_suturas == 4) selected @endif value="4">
                                        Polipropileno</option>
                                    <option @if ($e->id_suturas == 5) selected @endif value="5">Otro
                                        describir</option>
                                </select>
                            </div>
                            <div class="form-group" id="div_suturas{{ $counter }}"
                                @if ($e->id_suturas !== 5) style="display:none;" @endif>
                                <label class="floating-label-activo-sm">Describa</label>
                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                    name="obs_suturas{{ $counter }}" id="obs_suturas{{ $counter }}">{{ $e->suturas }}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Grosor</label>
                                <input type="text" name="grosor_nylon{{ $counter }}"
                                    id="grosor_nylon{{ $counter }}" class="form-control form-control-sm"
                                    value="{{ $e->grosor_nylon }}">
                            </div>
                            <div class="form-group" id="div_grosor_nylon{{ $counter }}" style="display:none;">
                                <label class="floating-label-activo-sm">Describa</label>
                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                    name="obs_grosor_nylon{{ $counter }}" id="obs_grosor_nylon{{ $counter }}">{{ $e->grosor_nylon }}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                            <div class="form-group">
                                <label for="tiempo_quir_impl{{ $counter }}"
                                    class="floating-label-activo-sm">Tiempo quirúrgico</label>
                                <input type="text" class="form-control form-control-sm"
                                    id="tiempo_quir_impl{{ $counter }}" value="{{ $e->tiempo_quirurgico }}">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-footer">
                    <div class="form-group">
                        <button type="button" class="btn btn-icon btn-danger-light-c"
                            onclick="eliminar_pieza_dental_tto_impl({{ $e->id }})">X</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @php $counter++; @endphp
@endforeach
