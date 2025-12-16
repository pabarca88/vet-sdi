@php $counter = 123; @endphp
@if (isset($examenes))
    @foreach ($examenes as $e)
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card-informacion">
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                <label class="floating-label-activo-sm">Pieza N°</label>
                                <input type="text" class="form-control form-control-sm"
                                    name="numero_pieza_tto_impl{{ $counter }}"
                                    id="numero_pieza_tto_impl{{ $counter }}" value="{{ $e->numero_pieza }}"
                                    onchange="dame_tratamientos_pieza({{ $e->numero_pieza }},'{{ $counter }}');">
                            </div>
                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Procedimiento</label>
                                    <select name="proc_imp_rehab_edit{{ $counter }}"
                                        data-titulo="proc_imp_rehab_edit" data-seccion="Implante"
                                        id="proc_imp_rehab_edit{{ $counter }}" class="form-control form-control-sm"
                                        onchange="evaluar_para_carga_detalle('proc_imp_rehab_edit{{ $counter }}','div_proc_imp_rehab_edit{{ $counter }}','obs_proc_impo{{ $counter }}',10);">
                                        <option value="{{ $e->id }}">{{ $e->tratamiento }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Tipo de Procedimiento</label>
                                    <select name="tpo_proc_imp_rehab_edit{{ $counter }}"
                                        data-titulo="tpo_proc_imp_rehab_edit" data-seccion="Implante"
                                        id="tpo_proc_imp_rehab_edit{{ $counter }}"
                                        class="form-control form-control-sm"
                                        onchange="evaluar_para_carga_detalle('tpo_proc_imp_rehab_edit{{ $counter }}','div_tpo_proc_imp_rehab_edit{{ $counter }}','obs_tpo_proc_impo{{ $counter }}',10);">
                                        @foreach ($tratamientos_implantologia as $t)
                                            <option value="{{ $t->id }}"
                                                @if ($e->id_tipo_procedimiento == $t->id) selected @endif>{{ $t->descripcion }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group" id="div_tpo_proc_imp_rehab_edit{{ $counter }}"
                                    style="display:none;">
                                    <label class="floating-label-activo-sm">Otro tipo de Procedimiento</label>
                                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello" rows="1" onfocus="this.rows=3"
                                        onblur="this.rows=1;" name="obs_tpo_proc_imp_rehab_edit{{ $counter }}"
                                        id="obs_tpo_proc_imp_rehab_edit{{ $counter }}">{{ $e->tipo_procedimiento }}</textarea>
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
                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Anestesia</label>
                                    <select name="anestesia_impl_rehab_edit{{ $counter }}"
                                        data-titulo="anestesia_impl_rehab_edit"
                                        data-seccion="anestesia_impl_rehab_edit{{ $counter }}"
                                        id="anestesia_impl_rehab_edit{{ $counter }}"
                                        class="form-control form-control-sm"
                                        onchange="evaluar_para_carga_detalle('anestesia_impl_rehab_edit{{ $counter }}','div_anestesia_impl_rehab_edit{{ $counter }}','obs_anestesia_impl_rehab_edit{{ $counter }}',4);">
                                        <option @if ($e->id_tipo_anestesia == 1) selected @endif value="1">Local
                                        </option>
                                        <option @if ($e->id_tipo_anestesia == 2) selected @endif value="2">Local
                                            mas sedación consciente</option>
                                        <option @if ($e->id_tipo_anestesia == 3) selected @endif value="3">
                                            Anestesia General</option>
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
                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                <div class="form-group">
                                    <label for="" class="floating-label-activo-sm">N° de tubos</label>
                                    <input type="text" class="form-control form-control-sm"
                                        name="numero_tubos_impl{{ $counter }}"
                                        id="numero_tubos_impl{{ $counter }}" value="{{ $e->numero_tubos }}">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
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
                                        <option @if ($e->id_tecnica_anestesia == 5) selected @endif value="5">
                                            Técnica de tuberosidad</option>
                                        <option @if ($e->id_tecnica_anestesia == 6) selected @endif value="6">
                                            Técnica infraorbitaria</option>
                                        <option @if ($e->id_tecnica_anestesia == 7) selected @endif value="7">
                                            Técnica carrea</option>
                                        <option @if ($e->id_tecnica_anestesia == 8) selected @endif value="8">
                                            Técnica akinosi</option>
                                        <option @if ($e->id_tecnica_anestesia == 9) selected @endif value="9">
                                            Técnica gowgates</option>
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
                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group">
                                    <label for="" class="floating-label-activo-sm">Anestésico</label>
                                    <select name="anestesico_impl{{ $counter }}"
                                        data-titulo="anestesico_impl{{ $counter }}"
                                        data-seccion="anestesico_impl" id="anestesico_impl{{ $counter }}"
                                        class="form-control form-control-sm"
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
                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Material de restauración</label>
                                    <select name="mat_restau_rehab_impl{{ $counter }}" data-titulo="Ex_cuello"
                                        data-seccion="Cuello" id="mat_restau_rehab_impl{{ $counter }}"
                                        class="form-control form-control-sm"
                                        onchange="evaluar_para_carga_detalle('mat_restau_rehab_impl{{ $counter }}','div_mat_restau_rehab_impl{{ $counter }}','obs_mat_restau_rehab_impl{{ $counter }}',6);">
                                        <option value="0" @if ($e->id_material_rest == 0) selected @endif>
                                            Seleccione</option>
                                        <option value="1" @if ($e->id_material_rest == 1) selected @endif>
                                            Silicato de litio</option>
                                        <option value="2" @if ($e->id_material_rest == 2) selected @endif>
                                            Zirconio</option>
                                        <option value="3" @if ($e->id_material_rest == 3) selected @endif>
                                            Resina</option>
                                        <option value="4" @if ($e->id_material_rest == 4) selected @endif>
                                            Compomero</option>
                                        <option value="5" @if ($e->id_material_rest == 5) selected @endif>
                                            Recubrimiento feldespático</option>
                                        <option value="6" @if ($e->id_material_rest == 6) selected @endif>Otro
                                            (Describir)</option>
                                    </select>
                                </div>

                                <div class="form-group" id="div_mat_restau_rehab_impl{{ $counter }}"
                                    @if ($e->id_material_rest != 6) style="display:none;" @endif>
                                    <label class="floating-label-activo-sm">Obs</label>
                                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello" rows="1" onfocus="this.rows=3"
                                        onblur="this.rows=1;" name="obs_mat_restau_rehab_impl{{ $counter }}"
                                        id="obs_mat_restau_rehab_impl{{ $counter }}">{{ $e->material_restauracion }}</textarea>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Tipo de anclaje</label>
                                    <select name="tipo_anclaje_rehab_impl{{ $counter }}"
                                        data-titulo="tipo_anclaje" data-seccion="Cuello"
                                        id="tipo_anclaje_rehab_impl{{ $counter }}"
                                        class="form-control form-control-sm"
                                        onchange="evaluar_para_carga_detalle('tipo_anclaje_rehab_impl{{ $counter }}','div_tipo_anclaje_rehab_impl{{ $counter }}','obs_tipo_anclaje_rehab_impl{{ $counter }}',3);">

                                        <option value="0" @if ($e->id_tipo_anclaje == 0) selected @endif>
                                            Seleccione</option>
                                        <option value="1" @if ($e->id_tipo_anclaje == 1) selected @endif>
                                            Atornillado</option>
                                        <option value="2" @if ($e->id_tipo_anclaje == 2) selected @endif>
                                            Cementado</option>
                                        <option value="3" @if ($e->id_tipo_anclaje == 3) selected @endif>Otro
                                            (Describir)</option>
                                    </select>
                                </div>

                                <div class="form-group" id="div_tipo_anclaje_rehab_impl{{ $counter }}"
                                    @if ($e->id_tipo_anclaje !== 3) style="display:none;" @endif>
                                    <label class="floating-label-activo-sm">Obs</label>
                                    <textarea class="form-control form-control-sm" data-titulo="tipo_anclaje" rows="1" onfocus="this.rows=3"
                                        onblur="this.rows=1;" name="obs_tipo_anclaje_rehab_impl{{ $counter }}"
                                        id="obs_tipo_anclaje_rehab_impl{{ $counter }}">{{ $e->tipo_anclaje }}</textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="form-group">
                            <button type="button" class="btn btn-icon btn-danger-light-c"
                                onclick="eliminar_pieza_dental_tto_impl({{ $e->id }},{{ $e->id_procedimiento }})">X</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @php $counter++; @endphp
    @endforeach
@endif
