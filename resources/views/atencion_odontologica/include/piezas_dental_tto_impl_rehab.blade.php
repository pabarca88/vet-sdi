<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <ul class="nav nav-tabs-aten nav-fill mb-10" id="coloc_impl" role="tablist">
            <li class="nav-item">
                <a class="nav-link-aten text-reset active" id="pieza_dental_impl_rehab_tab" data-toggle="tab" href="#pieza_dental_impl_rehab" role="tab" aria-controls="pieza_dental_impl_rehab" aria-selected="true">Pieza dental</a>
            </li>
            <li class="nav-item">
                <a class="nav-link-aten text-reset" id="grupo_dental_impl_rehab_tab" data-toggle="tab" href="#grupo_dental_impl_rehab" role="tab" aria-controls="grupo_dental_impl_rehab" aria-selected="true">Grupo dental</a>
            </li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="tab-content">
        <div class="tab-pane fade show active" id="pieza_dental_impl_rehab" role="tabpanel" aria-labelledby="pieza_dental_impl_rehab_tab">
            <div class="form-row container-fluid">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-row">
                                @php
                                    $piezasUnicas = [];
                                @endphp

                                <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2 col-xxl-2">
                                    <label class="floating-label-activo-sm">Pieza Nº</label>
                                    <select name="numero_pieza_tto_impl{{ $counter }}" id="numero_pieza_tto_impl{{ $counter }}" class="form-control form-control-sm" onchange="dame_tratamientos_pieza_impl(this.value, {{ $counter }}, 'pieza')">
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
                                <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2 col-xxl-2">
                                    <label class="floating-label-activo-sm">Procedimiento</label>
                                    <select name="tto_impl{{ $counter }}" id="tto_impl{{ $counter }}" class="form-control form-control-sm">
                                        <option value="0">Seleccione</option>

                                    </select>
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-6">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Tipo de Procedimiento</label>
                                        <select name="tpo_proc_imp{{ $counter }}" data-titulo="tpo_proc_imp" data-seccion="Implante"  id="tpo_proc_imp{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tpo_proc_imp{{ $counter }}','div_tpo_proc_imp{{ $counter }}','obs_tpo_proc_impo{{ $counter }}',10);">
                                            @foreach ($tratamientos_implantologia as $t)
                                                <option value="{{ $t->id }}">{{ $t->descripcion }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group" id="div_tpo_proc_imp{{ $counter }}" style="display:none;">
                                        <label class="floating-label-activo-sm">Otro tipo de Procedimiento</label>
                                        <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tpo_proc_imp{{ $counter }}" id="obs_tpo_proc_imp{{ $counter }}"></textarea>
                                        <div class="form-group mt-3">
                                            <label class="floating-label-activo-sm">¿UCO?</label>
                                            <input type="text"class="form-control form-control-sm" id="uco_tto{{ $counter }}">
                                        </div>
                                        <div class="form-group mt-3">
                                            <label class="floating-label-activo-sm">Laboratorio</label>
                                            <input type="text"class="form-control form-control-sm" id="lab_tto{{ $counter }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-5 col-lg-3 col-xl-3 col-xxl-4">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Anestesia</label>
                                        <select name="anestesia_impl{{ $counter }}" data-titulo="anestesia_impl" data-seccion="anestesia_impl{{ $counter }}"  id="anestesia_impl{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('anestesia_impl{{ $counter }}','div_anestesia_impl{{ $counter }}','obs_anestesia_impl{{ $counter }}',4);">
                                            <option selected  value="1">Local</option>
                                            <option value="2">Local mas sedación consciente</option>
                                            <option value="3">Anestesia General</option>
                                            <option value="4">Otro (Describir)</option>
                                        </select>
                                    </div>
                                    <div class="form-group" id="div_anestesia_impl{{ $counter }}" style="display:none;">
                                        <label class="floating-label-activo-sm">Otra anestesia</label>
                                        <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_anestesia_impl{{ $counter }}" id="obs_anestesia_impl{{ $counter }}"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 col-xxl-2">
                                    <div class="form-group">
                                        <label for="" class="floating-label-activo-sm">N° de tubos</label>
                                        <input type="text" class="form-control form-control-sm" name="numero_tubos_impl{{ $counter }}" id="numero_tubos_impl{{ $counter }}">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-5 col-lg-4 col-xl-4 col-xxl-4">
                                    <div class="form-group">
                                        <label for="" class="floating-label-activo-sm">Técnica de anestesia</label>
                                        <select name="tec_anestesia_impl{{ $counter }}" data-titulo="tec_anestesia_impl{{ $counter }}" data-seccion="tec_anestesia_impl{{ $counter }}"  id="tec_anestesia_impl{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tec_anestesia_impl{{ $counter }}','div_tec_anestesia_impl{{ $counter }}','obs_tec_anestesia_impl{{ $counter }}',10);">
                                            <option selected  value="1">Infiltrativa vestibular </option>
                                            <option value="2">Infiltrativa palatina/lingual</option>
                                            <option value="3">Spix indirecta</option>
                                            <option value="4">Spix directa</option>
                                            <option value="5">Técnica de tuberosidad</option>
                                            <option value="6">Técnica infraorbitaria</option>
                                            <option value="7">Técnica carrea</option>
                                            <option value="8">Técnica akinosi</option>
                                            <option value="9">Técnica gowgates</option>
                                            <option value="10">Otro (Describir)</option>
                                        </select>
                                    </div>
                                    <div class="form-group" id="div_tec_anestesia_impl{{ $counter }}" style="display:none;">
                                        <label class="floating-label-activo-sm">Otra anestesia</label>
                                        <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tec_anestesia_impl{{ $counter }}" id="obs_tec_anestesia_impl{{ $counter }}"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-4">
                                    <div class="form-group">
                                        <label for="" class="floating-label-activo-sm">Anestésico</label>
                                        <select name="anestesico_impl{{ $counter }}" data-titulo="anestesico_impl{{ $counter }}" data-seccion="anestesico_impl"  id="anestesico_impl{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('anestesico_impl{{ $counter }}','div_anestesico_impl{{ $counter }}','obs_anestesico_impl{{ $counter }}',6);">
                                            <option selected  value="1">Lidocaína 2% </option>
                                            <option value="2">Mepivacaína 3%</option>
                                            <option value="3">Articaína 4%</option>
                                            <option value="4">Benzocaína 7.5%</option>
                                            <option value="5">Bupivacaína 7.5%</option>
                                            <option value="6">Otro (Describir)</option>
                                        </select>
                                    </div>
                                    <div class="form-group" id="div_anestesico_impl{{ $counter }}" style="display:none;">
                                        <label class="floating-label-activo-sm">Otro anestésico</label>
                                        <textarea class="form-control form-control-sm" data-titulo="anestisico_dental_title"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_anestesico_impl{{ $counter }}" id="obs_anestesico_impl{{ $counter }}"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-2 col-xl-2 col-xxl-4">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Incidentes</label>
                                        <select name="incid_col_impl{{ $counter }}" data-titulo="Ex_cuello" data-seccion="Cuello"  id="incid_col_impl{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('incid_col_impl{{ $counter }}','div_incid_col_impl{{ $counter }}','obs_incid_col_impl{{ $counter }}',2);">
                                            <option selected  value="1">Sin incidentes</option>
                                            <option value="2">Con Incidentes</option>

                                        </select>
                                    </div>
                                    <div class="form-group" id="div_incid_col_impl{{ $counter }}" style="display:none;">
                                        <label class="floating-label-activo-sm">Observaciones</label>
                                        <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_incid_col_impl{{ $counter }}" id="obs_incid_col_impl{{ $counter }}"></textarea>
                                    </div>

                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-2 col-xl-2 col-xxl-4">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Material de restauración</label>
                                        <select name="mat_restau{{ $counter }}" data-titulo="Ex_cuello" data-seccion="Cuello"  id="mat_restau{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('mat_restau{{ $counter }}','div_mat_restau{{ $counter }}','obs_mat_restau{{ $counter }}',6);">
                                            <option selected  value="1">Silicato de litio</option>
                                            <option value="2">Zirconio</option>
                                            <option value="3">Resina</option>
                                            <option value="4">Compomero</option>
                                            <option value="5">Recubrimiento feldespático</option>
                                            <option value="6">Otro (Describir)</option>
                                        </select>
                                    </div>
                                    <div class="form-group" id="div_mat_restau{{ $counter }}" style="display:none;">
                                        <label class="floating-label-activo-sm">Observaciones</label>
                                        <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_mat_restau{{ $counter }}" id="obs_mat_restau{{ $counter }}"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-2 col-xl-2 col-xxl-4">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Tipo de anclaje</label>
                                        <select name="tipo_anclaje{{ $counter }}" data-titulo="tipo_anclaje" data-seccion="Cuello"  id="tipo_anclaje{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tipo_anclaje{{ $counter }}','div_tipo_anclaje{{ $counter }}','obs_tipo_anclaje{{ $counter }}',3);">
                                            <option selected  value="1">Atornillado</option>
                                            <option value="2">Cementado</option>
                                            <option value="3">Otro (Describir)</option>
                                        </select>
                                    </div>
                                    <div class="form-group" id="div_tipo_anclaje{{ $counter }}" style="display:none;">
                                        <label class="floating-label-activo-sm">Observaciones</label>
                                        <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tipo_anclaje{{ $counter }}" id="obs_tipo_anclaje{{ $counter }}"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="float-right">
                                {{-- <button type="button" class="btn btn-icon btn-danger-light-c" onclick="ocultar_pieza_dental_tto_impl()"><i class="feather icon-x"></i> </button> --}}
                                <button type="button" class="btn btn-sm btn-success-light-c" onclick="guardar_pieza_dental_tto_impl_rehab({{ $counter }})"><i class="feather icon-check"></i> Prestación Terminada</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="grupo_dental_impl_rehab" role="tabpanel" aria-labelledby="grupo_dental_impl_rehab_tab">
            <div class="form-row container-fluid">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-row">
                                @php
                                    $piezasUnicas = [];
                                @endphp

                                <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2 col-xxl-2">
                                    <label class="floating-label-activo-sm">Piezas Nº</label>
                                    <select name="numero_pieza_tto_impl_grupo{{ $counter }}" id="numero_pieza_tto_impl_grupo{{ $counter }}" class="form-control form-control-sm" onchange="dame_tratamientos_pieza_impl(this.value, {{ $counter }},'grupo')" multiple>
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
                                <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2 col-xxl-2">
                                    <label class="floating-label-activo-sm">Procedimiento</label>
                                    <select name="tto_impl_grupo{{ $counter }}" id="tto_impl_grupo{{ $counter }}" class="form-control form-control-sm">
                                        <option value="0">Seleccione</option>

                                    </select>
                                </div>
                                <div class="col-sm-12 col-md-7 col-lg-3 col-xl-3 col-xxl-3">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Tipo de Procedimiento</label>
                                        <select name="tpo_proc_imp_grupo{{ $counter }}" data-titulo="tpo_proc_imp_grupo" data-seccion="Implante"  id="tpo_proc_imp_grupo{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tpo_proc_imp_grupo{{ $counter }}','div_tpo_proc_imp_grupo{{ $counter }}','obs_tpo_proc_impo_grupo{{ $counter }}',10);">
                                            @foreach ($tratamientos_implantologia as $t)
                                                <option value="{{ $t->id }}">{{ $t->descripcion }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group" id="div_tpo_proc_imp_grupo{{ $counter }}" style="display:none;">
                                        <label class="floating-label-activo-sm">Otro tipo de Procedimiento</label>
                                        <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tpo_proc_imp_grupo{{ $counter }}" id="obs_tpo_proc_imp_grupo{{ $counter }}"></textarea>
                                        <div class="form-group mt-3">
                                            <label class="floating-label-activo-sm">¿UCO?</label>
                                            <input type="text"class="form-control form-control-sm" id="uco_tto_grupo{{ $counter }}">
                                        </div>
                                        <div class="form-group mt-3">
                                            <label class="floating-label-activo-sm">Laboratorio</label>
                                            <input type="text"class="form-control form-control-sm" id="lab_tto_grupo{{ $counter }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-5 col-lg-3 col-xl-3 col-xxl-4">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Anestesia</label>
                                        <select name="anestesia_impl{{ $counter }}" data-titulo="anestesia_impl_grupo{{ $counter }}" data-seccion="anestesia_impl_grupo{{ $counter }}"  id="anestesia_impl_grupo{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('anestesia_impl_grupo{{ $counter }}','div_anestesia_impl_grupo{{ $counter }}','obs_anestesia_impl_grupo{{ $counter }}',4);">
                                            <option selected  value="1">Local</option>
                                            <option value="2">Local mas sedación consciente</option>
                                            <option value="3">Anestesia General</option>
                                            <option value="4">Otro (Describir)</option>
                                        </select>
                                    </div>
                                    <div class="form-group" id="div_anestesia_impl_grupo{{ $counter }}" style="display:none;">
                                        <label class="floating-label-activo-sm">Otra anestesia</label>
                                        <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_anestesia_impl_grupo{{ $counter }}" id="obs_anestesia_impl_grupo{{ $counter }}"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 col-xxl-2">
                                    <div class="form-group">
                                        <label for="" class="floating-label-activo-sm">N° de tubos</label>
                                        <input type="text" class="form-control form-control-sm" name="numero_tubos_impl_grupo{{ $counter }}" id="numero_tubos_impl_grupo{{ $counter }}">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-5 col-lg-4 col-xl-4 col-xxl-4">
                                    <div class="form-group">
                                        <label for="" class="floating-label-activo-sm">Técnica de anestesia</label>
                                        <select name="tec_anestesia_impl_grupo{{ $counter }}" data-titulo="tec_anestesia_impl_grupo{{ $counter }}" data-seccion="tec_anestesia_impl_grupo{{ $counter }}"  id="tec_anestesia_impl_grupo{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tec_anestesia_impl_grupo{{ $counter }}','div_tec_anestesia_impl_grupo{{ $counter }}','obs_tec_anestesia_impl_grupo{{ $counter }}',10);">
                                            <option selected  value="1">Infiltrativa vestibular </option>
                                            <option value="2">Infiltrativa palatina/lingual</option>
                                            <option value="3">Spix indirecta</option>
                                            <option value="4">Spix directa</option>
                                            <option value="5">Técnica de tuberosidad</option>
                                            <option value="6">Técnica infraorbitaria</option>
                                            <option value="7">Técnica carrea</option>
                                            <option value="8">Técnica akinosi</option>
                                            <option value="9">Técnica gowgates</option>
                                            <option value="10">Otro (Describir)</option>
                                        </select>
                                    </div>
                                    <div class="form-group" id="div_tec_anestesia_impl_grupo{{ $counter }}" style="display:none;">
                                        <label class="floating-label-activo-sm">Otra anestesia</label>
                                        <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tec_anestesia_impl_grupo{{ $counter }}" id="obs_tec_anestesia_impl_grupo{{ $counter }}"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-4">
                                    <div class="form-group">
                                        <label for="" class="floating-label-activo-sm">Anestésico</label>
                                        <select name="anestesico_impl_grupo{{ $counter }}" data-titulo="anestesico_impl_grupo{{ $counter }}" data-seccion="anestesico_impl_grupo{{ $counter }}"  id="anestesico_impl_grupo{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('anestesico_impl_grupo{{ $counter }}','div_anestesico_impl_grupo{{ $counter }}','obs_anestesico_impl_grupo{{ $counter }}',6);">
                                            <option selected  value="1">Lidocaína 2% </option>
                                            <option value="2">Mepivacaína 3%</option>
                                            <option value="3">Articaína 4%</option>
                                            <option value="4">Benzocaína 7.5%</option>
                                            <option value="5">Bupivacaína 7.5%</option>
                                            <option value="6">Otro (Describir)</option>
                                        </select>
                                    </div>
                                    <div class="form-group" id="div_anestesico_impl_grupo{{ $counter }}" style="display:none;">
                                        <label class="floating-label-activo-sm">Otro anestésico</label>
                                        <textarea class="form-control form-control-sm" data-titulo="anestisico_dental_title"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_anestesico_impl_grupo{{ $counter }}" id="obs_anestesico_impl_grupo{{ $counter }}"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-2 col-xl-2 col-xxl-4">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Incidentes</label>
                                        <select name="incid_col_impl_grupo{{ $counter }}" data-titulo="Ex_cuello" data-seccion="Cuello"  id="incid_col_impl_grupo{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('incid_col_impl_grupo{{ $counter }}','div_incid_col_impl_grupo{{ $counter }}','obs_incid_col_impl_grupo{{ $counter }}',2);">
                                            <option selected  value="1">Sin incidentes</option>
                                            <option value="2">Con Incidentes</option>

                                        </select>
                                    </div>
                                    <div class="form-group" id="div_incid_col_impl_grupo{{ $counter }}" style="display:none;">
                                        <label class="floating-label-activo-sm">Observaciones</label>
                                        <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_incid_col_impl_grupo{{ $counter }}" id="obs_incid_col_impl_grupo{{ $counter }}"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-2 col-xl-2 col-xxl-4">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Material de restauración</label>
                                        <select name="mat_restau_grupo{{ $counter }}" data-titulo="Ex_cuello" data-seccion="Cuello"  id="mat_restau_grupo{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('mat_restau_grupo{{ $counter }}','div_mat_restau_grupo{{ $counter }}','obs_mat_restau_grupo{{ $counter }}',6);">
                                            <option selected  value="1">Silicato de litio</option>
                                            <option value="2">Zirconio</option>
                                            <option value="3">Resina</option>
                                            <option value="4">Compomero</option>
                                            <option value="5">Recubrimiento feldespático</option>
                                            <option value="6">Otro (Describir)</option>
                                        </select>
                                    </div>
                                    <div class="form-group" id="div_mat_restau_grupo{{ $counter }}" style="display:none;">
                                        <label class="floating-label-activo-sm">Observaciones</label>
                                        <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_mat_restau_grupo{{ $counter }}" id="obs_mat_restau_grupo{{ $counter }}"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-2 col-xl-2 col-xxl-4">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Tipo de anclaje</label>
                                        <select name="tipo_anclaje_grupo{{ $counter }}" data-titulo="tipo_anclaje_grupo" data-seccion="Cuello"  id="tipo_anclaje_grupo{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tipo_anclaje_grupo{{ $counter }}','div_tipo_anclaje_grupo{{ $counter }}','obs_tipo_anclaje_grupo{{ $counter }}',3);">
                                            <option selected  value="1">Atornillado</option>
                                            <option value="2">Cementado</option>
                                            <option value="3">Otro (Describir)</option>
                                        </select>
                                    </div>
                                    <div class="form-group" id="div_tipo_anclaje_grupo{{ $counter }}" style="display:none;">
                                        <label class="floating-label-activo-sm">Observaciones</label>
                                        <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tipo_anclaje_grupo{{ $counter }}" id="obs_tipo_anclaje_grupo{{ $counter }}"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="float-right">
                                {{-- <button type="button" class="btn btn-icon btn-danger-light-c" onclick="ocultar_pieza_dental_tto_impl()"><i class="feather icon-x"></i> </button> --}}
                                <button type="button" class="btn btn-sm btn-success-light-c" onclick="guardar_pieza_dental_tto_impl_rehab_grupo({{ $counter }})"><i class="feather icon-check"></i> Prestación Terminada</button>
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
        $('#numero_pieza_tto_impl1000').select2();
        $('#numero_pieza_tto_impl_grupo1000').select2();
    });

    function dame_tratamientos_pieza_impl(pieza, counter, tipo) {
        let id_paciente = $('#id_paciente_fc').val();
        if(id_paciente == '' || id_paciente == null){
            id_paciente = $('#id_paciente').val();
        }
        $.ajax({
            url: '{{ route("dental.dame_tratamientos_pieza_impl") }}',
            type: 'POST',
            data: {
                pieza: pieza,
                id_paciente: id_paciente,
                id_ficha_atencion: $('#id_fc').val(),
                _token: '{{ csrf_token() }}'
            },
            success: function(resp) {
                console.log(resp);
                if(resp.error){
                    swal({
                        title: "Error",
                        text: resp.error,
                        icon: "error",
                        button: "Aceptar",
                    });
                    return false;
                }
                if(tipo == 'grupo'){
                    $('#tto_impl_grupo' + counter).val(0);
                    $('#tto_impl_grupo' + counter).empty();
                    $('#tto_impl_grupo' + counter).append('<option value="0">Seleccione</option>');
                    $.each(resp.tratamientos, function(index, value) {
                        $('#tto_impl_grupo' + counter).append('<option value="' + value.id + '">' + value.tratamiento + '</option>');
                    });
                } else {
                    $('#tto_impl' + counter).val(0);
                    $('#tto_impl' + counter).empty();
                    $('#tto_impl' + counter).append('<option value="0">Seleccione</option>');
                    $.each(resp.tratamientos, function(index, value) {
                        $('#tto_impl' + counter).append('<option value="' + value.id + '">' + value.tratamiento + '</option>');
                    });
                }
            }
        });
    }

    function ocultar_pieza_dental_tto_impl(){
        $('#pieza_dental_tto_impl').empty();
    }

    function guardar_pieza_dental_tto_impl_rehab(counter){

        let numero_pieza = $('#numero_pieza_tto_impl'+counter).val();
        let tto = $('#tto_impl'+counter).val();

        let tipo_tto = $('#tpo_proc_imp'+counter).val();
        let tipo_tto_text = $('#tpo_proc_imp' + counter + ' option:selected').text(); // Obtiene el texto de la opción seleccionada


        if(tipo_tto == 10){
            tipo_tto_text = $('#obs_tpo_proc_imp'+counter).val();
        }
        let anestesia_tto = $('#anestesia_impl'+counter).val();
        let anestesia_tto_text = $('#anestesia_impl' + counter + ' option:selected').text(); // Obtiene el texto de la opción seleccionada
        if(anestesia_tto == 4){
            anestesia_tto_text = $('#obs_anestesia_impl'+counter).val();
        }

        let numero_tubos = $('#numero_tubos_impl'+counter).val();
        let tecnica_anestesia = $('#tec_anestesia_impl'+counter).val();
        let tecnica_anestesia_text = $('#tec_anestesia_impl'+counter +' option:selected').text();
        if(tecnica_anestesia == 10){
            tecnica_anestesia_text = $('#obs_tec_anestesia_impl'+counter).val();
        }

        let anestesico_tto = $('#anestesico_impl'+counter).val();
        let anestesico_tto_text = $('#anestesico_impl'+counter+' option:selected').text();
        if(anestesico_tto == 6){
            anestesico_tto_text = $('#obs_anestesico_impl'+counter).val();
        }

        let incidente_tto = $('#incid_col_impl'+counter).val();
        let incidente_tto_text = $('#incid_col_impl'+counter+' option:selected').text();
        if(incidente_tto == 2){
            incidente_tto_text = $('#obs_incid_col_impl'+counter).val();
        }

        let material_rest = $('#mat_restau'+counter).val();
        let material_rest_text = $('#mat_restau'+counter+' option:selected').text();
        if(material_rest == 6){
            material_rest_text = $('#obs_mat_restau'+counter).val();
        }

        let tipo_anclaje = $('#tipo_anclaje'+counter).val();
        let tipo_anclaje_text = $('#tipo_anclaje'+counter+' option:selected').text();
        if(tipo_anclaje == 3){
            tipo_anclaje_text = $('#obs_tipo_anclaje'+counter).val();
        }

        let valido = 1;
        let mensaje = '';

        if(numero_pieza == '' || numero_pieza == 0){
            valido = 0;
            mensaje += '<li>Campo requerido N° Pieza </li>';
        }

        if(tto == 0){
            valido = 0;
            mensaje += '<li>Campo requerido Procedimiento </li>';
        }


        if(numero_tubos == ''){
            valido = 0;
            mensaje += '<li>Campo requerido N° Tubos </li>';
        }

        if(material_rest == '' || material_rest == 0){
            valido = 0;
            mensaje += '<li>Campo requerido Material de Restauración </li>';
        }
        if(tipo_anclaje == '' || tipo_anclaje == 0){
            valido = 0;
            mensaje += '<li>Campo requerido Tipo de Anclaje </li>';
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

        let data = {
            numero_pieza: numero_pieza,
            tto: tto,
            tipo_tto: tipo_tto,
            tipo_tto_text: tipo_tto_text,
            anestesia_tto: anestesia_tto,
            anestesia_tto_text: anestesia_tto_text,
            numero_tubos: numero_tubos,
            tecnica_anestesia: tecnica_anestesia,
            tecnica_anestesia_text: tecnica_anestesia_text,
            anestesico_tto: anestesico_tto,
            anestesico_tto_text: anestesico_tto_text,
            incidente_tto: incidente_tto,
            incidente_tto_text: incidente_tto_text,
            material_rest: material_rest,
            material_rest_text: material_rest_text,
            tipo_anclaje: tipo_anclaje,
            tipo_anclaje_text: tipo_anclaje_text,
            id_paciente: $('#id_paciente_fc').val(),
            id_lugar_atencion: $('#id_lugar_atencion').val(),
            id_ficha_atencion: $('#id_fc').val(),
            _token: CSRF_TOKEN
        }

        console.log(data);

        let url = "{{ ROUTE('profesional.adm_dental.guardar_pieza_dental_tto_impl_rehab') }}";

        $.ajax({
            type:'post',
            url: url,
            data: data,
            success: function(resp){
                console.log(resp);
                if(resp.mensaje == 'OK'){
                    swal({
                        title: "Pieza guardada",
                        text: "Pieza guardada correctamente",
                        icon: "success",
                        button: "Aceptar",
                    });
                    $('#contenedor_tto_rehab_implantologia').empty();
                    $('#contenedor_tto_rehab_implantologia').append(resp.v);
                    $('#pieza_dental_tto_rehab_impl').empty();
                    // Verificar si existen exámenes en la respuesta
                    if (resp.examenes && resp.examenes.length > 0) {
                        let detalleCirugia = resp.examenes.map(examen =>
                            `La pieza ${examen.numero_pieza} se ha realizado ${examen.tipo_procedimiento} ` +
                            `usando ${examen.anestesia} con ${examen.numero_tubos} tubos, ` +
                            `con la técnica ${examen.tecnica_anestesia}`
                        ).join("\n");

                        $('#det_cir').val(detalleCirugia);
                        // Poblar el select2 con las piezas únicas
                        let piezasUnicas = [...new Set(resp.examenes.map(examen => examen.numero_pieza))];

                        let selectPieza = $('#prot_pieza_imp');
                        selectPieza.empty(); // Limpiamos el select antes de agregar nuevas opciones

                        piezasUnicas.forEach(pieza => {
                            let option = new Option(pieza, pieza, false, false); // Solo el número
                            selectPieza.append(option);
                        });

                        selectPieza.trigger('change'); // Refrescar select2
                        let odontograma = resp.odontograma;
                        let table = $('#presup_estado_pago').DataTable();

                            // Limpiar la tabla antes de agregar nuevas filas
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
                    } else {
                        $('#det_cir').val('No hay detalles de cirugía disponibles.');
                    }

                    let odontograma = resp.odontograma;
                    $('#table_pagos_reasignar_odontograma tbody').empty();
                    odontograma.forEach(function(odonto) {
                        if (odonto.presupuesto == 1) {
                            let fila = `<tr>
                                <td><input type="checkbox" class="valor-checkbox" data-valor="${odonto.valor}" data-id="${odonto.id}" data-info="odonto"></td>
                                <td>${odonto.pieza}</td>
                                <td>${formatoMoneda(odonto.valor)}</td>
                                <td><button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminar_odontograma(${odonto.id})"><i class="fas fa-trash"> </i> </button></td>
                            </tr>`;
                            $('#table_pagos_reasignar_odontograma tbody').append(fila);
                        }
                    });
                    mostrar_nueva_pieza_dental_tto_impl(1000);
                    $('#odon_adults').empty();
                    $('#odon_adults').append(resp.odontograma_paciente_vista);
                    $('#odonto_adulto').empty();
                    $('#odonto_adulto').append(resp.odontograma_paciente_vista);
                }
            },
            error: function(error){
                console.log(error);
            }
        })

    }

    function guardar_pieza_dental_tto_impl_rehab_grupo(counter){

        let piezas = $('#numero_pieza_tto_impl_grupo'+counter).val();
        let tto = $('#tto_impl_grupo'+counter).val();

        let tipo_tto = $('#tpo_proc_imp_grupo'+counter).val();
        let tipo_tto_text = $('#tpo_proc_imp_grupo' + counter + ' option:selected').text(); // Obtiene el texto de la opción seleccionada

        if(tipo_tto == 10){
            tipo_tto_text = $('#obs_tpo_proc_imp_grupo'+counter).val();
        }
        let anestesia_tto = $('#anestesia_impl_grupo'+counter).val();
        let anestesia_tto_text = $('#anestesia_impl_grupo' + counter + ' option:selected').text(); // Obtiene el texto de la opción seleccionada
        if(anestesia_tto == 4){
            anestesia_tto_text = $('#obs_anestesia_impl_grupo'+counter).val();
        }

        let numero_tubos = $('#numero_tubos_impl_grupo'+counter).val();
        let tecnica_anestesia = $('#tec_anestesia_impl_grupo'+counter).val();
        let tecnica_anestesia_text = $('#tec_anestesia_impl_grupo'+counter +' option:selected').text();
        if(tecnica_anestesia == 10){
            tecnica_anestesia_text = $('#obs_tec_anestesia_impl_grupo'+counter).val();
        }

        let anestesico_tto = $('#anestesico_impl_grupo'+counter).val();
        let anestesico_tto_text = $('#anestesico_impl_grupo'+counter+' option:selected').text();
        if(anestesico_tto == 6){
            anestesico_tto_text = $('#obs_anestesico_impl_grupo'+counter).val();
        }

        let incidente_tto = $('#incid_col_impl_grupo'+counter).val();
        let incidente_tto_text = $('#incid_col_impl_grupo'+counter+' option:selected').text();
        if(incidente_tto == 2){
            incidente_tto_text = $('#obs_incid_col_impl_grupo'+counter).val();
        }

        let valido = 1;
        let mensaje = '';

        if(piezas == '' || piezas == 0 || piezas.length == 0){
            valido = 0;
            mensaje += '<li>Campo requerido N° Pieza </li>';
        }

        if(tto == 0){
            valido = 0;
            mensaje += '<li>Campo requerido Procedimiento </li>';
        }


        if(numero_tubos == ''){
            valido = 0;
            mensaje += '<li>Campo requerido N° Tubos </li>';
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

        let data = {
            piezas: piezas,
            tto: tto,
            tipo_tto: tipo_tto,
            tipo_tto_text: tipo_tto_text,
            anestesia_tto: anestesia_tto,
            anestesia_tto_text: anestesia_tto_text,
            numero_tubos: numero_tubos,
            tecnica_anestesia: tecnica_anestesia,
            tecnica_anestesia_text: tecnica_anestesia_text,
            anestesico_tto: anestesico_tto,
            anestesico_tto_text: anestesico_tto_text,
            incidente_tto: incidente_tto,
            incidente_tto_text: incidente_tto_text,
            id_paciente: $('#id_paciente_fc').val(),
            id_lugar_atencion: $('#id_lugar_atencion').val(),
            id_ficha_atencion: $('#id_fc').val(),
            _token: CSRF_TOKEN
        }

        return console.log(data);

        let url = "{{ ROUTE('profesional.adm_dental.guardar_pieza_dental_tto_impl_rehab') }}";

        $.ajax({
            type:'post',
            url: url,
            data: data,
            success: function(resp){
                console.log(resp);
                if(resp.mensaje == 'OK'){
                    swal({
                        title: "Pieza guardada",
                        text: "Pieza guardada correctamente",
                        icon: "success",
                        button: "Aceptar",
                    });
                    $('#contenedor_tto_implantologia').empty();
                    $('#contenedor_tto_implantologia').append(resp.v);
                    $('#pieza_dental_tto_impl').empty();
                    // Verificar si existen exámenes en la respuesta
                    if (resp.examenes && resp.examenes.length > 0) {
                        let detalleCirugia = resp.examenes.map(examen =>
                            `La pieza ${examen.numero_pieza} se ha realizado ${examen.tipo_procedimiento} ` +
                            `usando ${examen.anestesia} con ${examen.numero_tubos} tubos, ` +
                            `con la técnica ${examen.tecnica_anestesia}`
                        ).join("\n");

                        $('#det_cir').val(detalleCirugia);
                        // Poblar el select2 con las piezas únicas
                        let piezasUnicas = [...new Set(resp.examenes.map(examen => examen.numero_pieza))];

                        let selectPieza = $('#prot_pieza_imp');
                        selectPieza.empty(); // Limpiamos el select antes de agregar nuevas opciones

                        piezasUnicas.forEach(pieza => {
                            let option = new Option(pieza, pieza, false, false); // Solo el número
                            selectPieza.append(option);
                        });

                        selectPieza.trigger('change'); // Refrescar select2
                        let odontograma = resp.odontograma;
                        let table = $('#presup_estado_pago').DataTable();

                            // Limpiar la tabla antes de agregar nuevas filas
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
                    } else {
                        $('#det_cir').val('No hay detalles de cirugía disponibles.');
                    }

                    let odontograma = resp.odontograma;
                    $('#table_pagos_reasignar_odontograma tbody').empty();
                    odontograma.forEach(function(odonto) {
                        if (odonto.presupuesto == 1) {
                            let fila = `<tr>
                                <td><input type="checkbox" class="valor-checkbox" data-valor="${odonto.valor}" data-id="${odonto.id}" data-info="odonto"></td>
                                <td>${odonto.pieza}</td>
                                <td>${formatoMoneda(odonto.valor)}</td>
                                <td><button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminar_odontograma(${odonto.id})"><i class="fas fa-trash"> </i> </button></td>
                            </tr>`;
                            $('#table_pagos_reasignar_odontograma tbody').append(fila);
                        }
                    });
                    mostrar_nueva_pieza_dental_tto_impl(1000);
                    $('#odon_adults').empty();
                    $('#odon_adults').append(resp.odontograma_paciente_vista);
                    $('#odonto_adulto').empty();
                    $('#odonto_adulto').append(resp.odontograma_paciente_vista);
                }
            },
            error: function(error){
                console.log(error);
            }
        })

    }

    function evaluar_para_carga_nylon(id_select, id_div, value){
        let valor = $('#'+id_select).val();
        if(valor == value){
            $('#'+id_div).show();
        }else{
            $('#'+id_div).hide();
        }
    }
</script>
