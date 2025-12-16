<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-none">
    <div class="form-row">
        <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">
            <label class="floating-label-activo-sm">Pieza N°</label>
            <select name="" id="" class="form-control form-control-sm">
                <option value="0">Seleccione</option>
                @foreach($odontograma as $o)
                    @if($o->presupuesto == 1)
                        <option value="{{ $o->pieza }}">{{ $o->pieza }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
            <div class="form-group">
                <label class="floating-label-activo-sm">Tipo de Procedimiento</label>
                <select name="tpo_proc_period" data-titulo="tpo_proc_period" data-seccion="Implante"  id="tpo_proc_period" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tpo_proc_period','div_tpo_proc_period','obs_tpo_proc_period',6);">
                    <option selected  value="1">Cirugía con colgajos</option>
                    <option value="2">Injertos de tejido blando</option>
                    <option value="3">Injerto óseo</option>
                    <option value="4">Regeneración tisular guiada</option>
                    <option value="5">Proteínas estimulantes de tejidos</option>
                    <option value="6">Otro Tipo</option>
                </select>
            </div>
            <div class="form-group" id="div_tpo_proc_period" style="display:none;">
                <label class="floating-label-activo-sm">Otro tipo de Procedimiento</label>
                <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tpo_proc_period" id="obs_tpo_proc_period"></textarea>
                <div class="form-group mt-3">
                    <label class="floating-label-activo-sm">UCO?</label>
                    <input type="text"class="form-control form-control-sm">
                </div>
                <div class="form-group mt-3">
                    <label class="floating-label-activo-sm">Laboratorio</label>
                    <input type="text"class="form-control form-control-sm">
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
            <div class="form-group">
                <label class="floating-label-activo-sm">Anestesia</label>
                <select name="anestesia_impl" data-titulo="anestesia_impl" data-seccion="anestesia_impl"  id="anestesia_impl" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('anestesia_impl','div_anestesia_impl','obs_anestesia_impl',4);">
                    <option selected  value="1">Local</option>
                    <option value="2">Local mas sedación consciente</option>
                    <option value="3">Anestesia General</option>
                    <option value="4">Otro describir</option>
                </select>
            </div>
            <div class="form-group" id="div_anestesia_impl" style="display:none;">
                <label class="floating-label-activo-sm">Otra anestesia</label>
                <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_anestesia_impl" id="obs_anestesia_impl"></textarea>
            </div>
        </div>
        <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">
            <div class="form-group">
                <label class="floating-label-activo-sm">Incidentes</label>
                <select name="incid_col_impl" data-titulo="Ex_cuello" data-seccion="Cuello"  id="incid_col_impl" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('incid_col_impl','div_incid_col_impl','obs_incid_col_impl',2);">
                    <option selected  value="1">Sin incidentes</option>
                    <option value="2">Con Incidentes</option>

                </select>
            </div>
            <div class="form-group" id="div_incid_col_impl" style="display:none;">
                <label class="floating-label-activo-sm">Describa Incidente</label>
                <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_incid_col_impl" id="obs_incid_col_impl"></textarea>
            </div>
        </div>
        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
            <div class="form-group">
                <label class="floating-label-activo-sm">Material de injerto óseo</label>
                <select name="mat_inj_oseo" data-titulo="Ex_cuello" data-seccion="Cuello"  id="mat_inj_oseo" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('mat_inj_oseo','div_mat_inj_oseo','obs_mat_inj_oseo',6);">
                    <option selected  value="1">Sin Injerto Óseo</option>
                    <option value="2">autoinjerto</option>
                    <option value="3">aloinjerto</option>
                    <option value="4">xenoinjerto</option>
                    <option value="5">aloplástico</option>
                    <option value="6">Otro (describir)</option>
                </select>
            </div>
            <div class="form-group" id="div_mat_inj_oseo" style="display:none;">
                <label class="floating-label-activo-sm">Otro tipo de injerto</label>
                <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_mat_inj_oseor" id="obs_mat_inj_oseo"></textarea>
            </div>
        </div>
        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
            <div class="form-group">
                <label class="floating-label-activo-sm">Método de injerto óseo</label>
                <select name="tipo_inj_oseo" data-titulo="implantes"  id="tipo_inj_oseo" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tipo_inj_oseo','div_tipo_inj_oseo','obs_tipo_inj_oseo',6);">
                    <option selected  value="1">Sin Injerto Óseo</option>
                    <option value="2">Osteoplastia</option>
                    <option value="3">implantes subperiosticos</option>
                    <option value="4">técnicas de ensanchamiento</option>
                    <option value="5">Elevación de piso seno</option>
                    <option value="6">Otro (describir)</option>

                </select>
            </div>
            <div class="form-group" id="div_tipo_inj_oseo" style="display:none;">
                <label class="floating-label-activo-sm">Otro tipo de injerto</label>
                <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tipo_inj_oseo" id="obs_tipo_inj_oseo"></textarea>
            </div>
        </div>
        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
            <div class="form-group">
                <label class="floating-label-activo-sm">Suturas</label>
                <select name="suturas" data-titulo="suturas" data-seccion="suturas"  id="suturas" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('suturas','div_suturas','obs_suturas',5);">
                    <option selected  value="1">Catgut</option>
                    <option value="2">Seda</option>
                    <option value="3">Nylon</option>
                    <option value="4">Polipropileno</option>
                    <option value="5">Otro describir</option>
                </select>
            </div>
            <div class="form-group" id="div_suturas" style="display:none;">
                <label class="floating-label-activo-sm">Describa</label>
                <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_suturas" id="obs_suturas"></textarea>
            </div>
        </div>
    </div>
</div>
<div class="form-row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card-informacion">
                            <div class="card-body">
                                <div class="form-row">
                                    @php
                                        $piezasUnicas = [];
                                    @endphp
                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
                                        <div class="form-group">
                                                <label for="n_pieza_tto_period{{ $counter }}" class="floating-label-activo-sm">Pieza Nº</label>
                                                <select name="n_pieza_tto_period{{ $counter }}" id="n_pieza_tto_period{{ $counter }}" class="form-control form-control-sm" onchange="dame_tratamientos_pieza_period(this.value, {{ $counter }}, 'pieza')">
                                                    <option value="0">Seleccione</option>
                                                    @foreach ($odontograma as $o)
                                                        @if ($o->presupuesto == 1 && $o->urgencia == 0 && !in_array($o->pieza, $piezasUnicas))
                                                        <option value="{{ $o->pieza }}">{{ $o->pieza }}</option>
                                                        @php
                                                            $piezasUnicas[] = $o->pieza;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-9 col-lg-9 col-xl-9 col-xxl-9">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Procedimiento</label>
                                            <select name="tto_period{{ $counter }}" id="tto_period{{ $counter }}" class="form-control form-control-sm">
                                                <option value="0">Seleccione</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Membrana</label>
                                            <select name="membrana_period{{ $counter }}"
                                                    data-titulo="membrana_period"
                                                    data-seccion="membrana_period{{ $counter }}"
                                                    id="membrana_period{{ $counter }}"
                                                    class="form-control form-control-sm"
                                                    onchange="evaluar_para_carga_detalle('membrana_period{{ $counter }}','div_membrana_period{{ $counter }}','obs_membrana_period{{ $counter }}',20);">
                                                <option value="0">Seleccione</option>
                                                <option value="1">MEMBRANA DE COLÁGENO BIOMEND 15 X 20 MM</option>
                                                <option value="2">MEMBRANA DE COLÁGENO BIOMEND 20 X 30 MM</option>
                                                <option value="3">MEMBRANA DE COLÁGENO BIOMEND 30 X 40 MM</option>
                                                <option value="4">MEMBRANA DE COLÁGENO BIOMEND EXTEND 15 X 20 MM</option>
                                                <option value="5">MEMBRANA DE COLÁGENO BIOMEND EXTEND 20 X 30 MM</option>
                                                <option value="6">MEMBRANA DE COLÁGENO BIOMEND EXTEND 30 X 40 MM</option>
                                                <option value="7">COLLPROTECT MEMBRANE 15 X 20 MM</option>
                                                <option value="8">COLLPROTECT MEMBRANE 20 X 30 MM</option>
                                                <option value="9">COLLPROTECT MEMBRANE 30 X 40 MM</option>
                                                <option value="10">JASON MEMBRANE 15 X 20 MM</option>
                                                <option value="11">JASON MEMBRANE 20 X 30 MM</option>
                                                <option value="12">JASON MEMBRANE 30 X 40 MM</option>
                                                <option value="13">MEMBRANA OSSEOGUARD ® PTFE TEXTURED 12 X 24 MM</option>
                                                <option value="14">MEMBRANA OSSEOGUARD ® PTFE TEXTURED 25 X 30 MM</option>
                                                <option value="15">MEMBRANA OSSEOGUARD ® PTFE TR250 12 X 24 ANTERIOR</option>
                                                <option value="16">MEMBRANA OSSEOGUARD ® PTFE TR250 20 X 25 POSTERIOR</option>
                                                <option value="17">MEMBRANA PTFE PERMANEM 15 X 20 MM</option>
                                                <option value="18">MEMBRANA PTFE PERMANEM 20 X 30 MM</option>
                                                <option value="19">MEMBRANA PTFE PERMANEM 30 X 40 MM</option>
                                            </select>
                                        </div>

                                        <div class="form-group" id="div_membrana_period{{ $counter }}" style="display:none;">
                                            <label class="floating-label-activo-sm">Otra membrana</label>
                                            <textarea class="form-control form-control-sm"
                                                    data-titulo="Ex_cuello"
                                                    rows="1"
                                                    onfocus="this.rows=3"
                                                    onblur="this.rows=1;"
                                                    name="obs_membrana_period{{ $counter }}"
                                                    id="obs_membrana_period{{ $counter }}"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Material Membrana</label>
                                            <select name="mat_membrana_period{{ $counter }}"
                                                    data-titulo="mat_membrana_period"
                                                    data-seccion="mat_membrana_period{{ $counter }}"
                                                    id="mat_membrana_period{{ $counter }}"
                                                    class="form-control form-control-sm"
                                                    onchange="evaluar_para_carga_detalle('mat_membrana_period{{ $counter }}','div_mat_membrana_period{{ $counter }}','obs_mat_membrana_period{{ $counter }}',4);">
                                                <option value="0">Seleccione</option>

                                                <optgroup label="Reabsorbibles">
                                                    <option value="1">Membrana de colágeno</option>
                                                    <option value="2">Polímeros sintéticos</option>
                                                    <option value="3">Membrana de fibrina</option>
                                                    <option value="4">PRF</option>
                                                    <option value="5">Pericardio</option>
                                                </optgroup>

                                                <optgroup label="No reabsorbibles">
                                                    <option value="6">Membranas de PTFE</option>
                                                    <option value="7">Membranas de PTFE reforzadas con titanio</option>
                                                    <option value="8">Malla de titanio</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_mat_membrana_period{{ $counter }}" style="display:none;">
                                            <label class="floating-label-activo-sm">Otra membrana</label>
                                            <textarea class="form-control form-control-sm"
                                                    data-titulo="Ex_cuello"
                                                    rows="1"
                                                    onfocus="this.rows=3"
                                                    onblur="this.rows=1;"
                                                    name="obs_mat_membrana_period{{ $counter }}"
                                                    id="obs_mat_membrana_period{{ $counter }}"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Material de injerto óseo</label>
                                            <select name="mat_inj_oseo_period{{ $counter }}" data-titulo="Ex_cuello" data-seccion="Cuello"  id="mat_inj_oseo_period{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('mat_inj_oseo{{ $counter }}','div_mat_inj_oseo{{ $counter }}','obs_mat_inj_oseo{{ $counter }}',6);">
                                                <option value="0" class="text-uppercase">SIN INJERTO ÓSEO</option>
                                                @foreach ($materiales_implantologia as $m)
                                                    <option value="{{ $m->id }}" class="text-uppercase">{{ $m->descripcion }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_mat_inj_oseo{{ $counter }}" style="display:none;">
                                            <label class="floating-label-activo-sm">Otro tipo de injerto</label>
                                            <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_mat_inj_oseo{{ $counter }}" id="obs_mat_inj_oseo{{ $counter }}"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Método de injerto óseo</label>
                                            <input type="text" name="metodo_injerto_tto{{ $counter }}" id="metodo_injerto_tto{{ $counter }}" class="form-control form-control-sm">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Cantidad superficie teñida</label>
                                            <input type="text" name="cant_superficie_teñida{{ $counter }}" id="cant_superficie_teñida{{ $counter }}" class="form-control form-control-sm">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Cantidad superficie total</label>
                                            <input type="text" name="cant_superficie_total{{ $counter }}" id="cant_superficie_total{{ $counter }}" class="form-control form-control-sm">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Indice o'leary</label>
                                            <input type="text" name="indice_oleary{{ $counter }}" id="indice_oleary{{ $counter }}" class="form-control form-control-sm">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-2">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Anestesia</label>
                                            <select name="anestesia_period{{ $counter }}" data-titulo="anestesia_period" data-seccion="anestesia_period{{ $counter }}"  id="anestesia_period{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('anestesia_period{{ $counter }}','div_anestesia_period{{ $counter }}','obs_anestesia_period{{ $counter }}',4);">
                                                <option selected  value="1">Local</option>
                                                <option value="2">Local mas sedación consciente</option>
                                                <option value="3">Anestesia General</option>
                                                <option value="4">Otro (Describir)</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_anestesia_period{{ $counter }}" style="display:none;">
                                            <label class="floating-label-activo-sm">Otra anestesia</label>
                                            <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_anestesia_period{{ $counter }}" id="obs_anestesia_period{{ $counter }}"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-3">
                                        <div class="form-group">
                                            <label for="" class="floating-label-activo-sm">Técnica de anestesia</label>
                                            <select name="tec_anestesia_period{{ $counter }}" data-titulo="tec_anestesia_period{{ $counter }}" data-seccion="tec_anestesia_period{{ $counter }}"  id="tec_anestesia_period{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tec_anestesia_period{{ $counter }}','div_tec_anestesia_period{{ $counter }}','obs_tec_anestesia_period{{ $counter }}',10);">
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
                                        <div class="form-group" id="div_tec_anestesia_period{{ $counter }}" style="display:none;">
                                            <label class="floating-label-activo-sm">Otra anestesia</label>
                                            <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tec_anestesia_period{{ $counter }}" id="obs_tec_anestesia_period{{ $counter }}"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-3">
                                        <div class="form-group">
                                            <label for="" class="floating-label-activo-sm">Anestésico</label>
                                            <select name="anestesico_period{{ $counter }}" data-titulo="anestesico_period{{ $counter }}" data-seccion="anestesico_period"  id="anestesico_period{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('anestesico_period{{ $counter }}','div_anestesico_period{{ $counter }}','obs_anestesico_period{{ $counter }}',6);">
                                                <option selected  value="1">Lidocaína 2% </option>
                                                <option value="2">Mepivacaína 3%</option>
                                                <option value="3">Articaína 4%</option>
                                                <option value="4">Benzocaína 7.5%</option>
                                                <option value="5">Bupivacaína 7.5%</option>
                                                <option value="6">Otro (Describir)</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_anestesico_period{{ $counter }}" style="display:none;">
                                            <label class="floating-label-activo-sm">Otro anestésico</label>
                                            <textarea class="form-control form-control-sm" data-titulo="anestisico_dental_title"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_anestesico_period{{ $counter }}" id="obs_anestesico_period{{ $counter }}"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-2 col-xxl-1">
                                        <div class="form-group">
                                            <label for="" class="floating-label-activo-sm">N° de tubos</label>
                                            <input type="text" class="form-control form-control-sm" name="numero_tubos_period{{ $counter }}" id="numero_tubos_period{{ $counter }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-4 col-xxl-3">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Incidentes</label>
                                            <select name="incid_col_period{{ $counter }}" data-titulo="Ex_cuello" data-seccion="Cuello"  id="incid_col_period{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('incid_col_period{{ $counter }}','div_incid_col_period{{ $counter }}','obs_incid_col_period{{ $counter }}',2);">
                                                <option selected  value="1">Sin incidentes</option>
                                                <option value="2">Con Incidentes</option>

                                            </select>
                                        </div>
                                        <div class="form-group" id="div_incid_col_period{{ $counter }}" style="display:none;">
                                            <label class="floating-label-activo-sm">Observaciones</label>
                                            <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_incid_col_period{{ $counter }}" id="obs_incid_col_period{{ $counter }}"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-4 col-xxl-2">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Suturas</label>
                                            <select name="suturas_period{{ $counter }}" data-titulo="suturas_period{{ $counter }}" data-seccion="suturas"  id="suturas_period{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('suturas_period{{ $counter }}','div_suturas{{ $counter }}','obs_suturas{{ $counter }}',5);">
                                                <option selected  value="1">Catgut</option>
                                                <option value="2">Seda</option>
                                                <option value="3">Nylon</option>
                                                <option value="4">Polipropileno</option>
                                                <option value="5">Otro (Describir)</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_suturas{{ $counter }}" style="display:none;">
                                            <label class="floating-label-activo-sm">Otro (Describir)</label>
                                            <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_suturas{{ $counter }}" id="obs_suturas{{ $counter }}"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-2 col-xxl-2" id="grosor_nylon{{ $counter }}" >
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Grosor</label>
                                            <input type="text" name="grosor_nylon_input{{ $counter }}" id="grosor_nylon_input{{ $counter }}" class="form-control form-control-sm">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-4 col-xxl-2">
                                        <div class="form-group">
                                            <label for="tiempo_quir_period{{ $counter }}" class="floating-label-activo-sm">Tpo. quirúrgico</label>
                                            <input type="time" class="form-control form-control-sm" id="tiempo_quir_period{{ $counter }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-9 col-lg-9 col-xl-8 col-xxl-6">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Observaciones</label>
                                            <textarea class="form-control form-control-sm" data-titulo="Ex_cuello" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_period{{ $counter }}" id="obs_period{{ $counter }}"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="float-right">
                                    {{-- <button type="button" class="btn btn-icon btn-danger-light-c" onclick="ocultar_pieza_dental_tto_period()"><i class="feather icon-x"></i> </button> --}}
                                    <button type="button" class="btn btn-xxs btn-warning-light-c" onclick="guardar_pieza_dental_tto_period({{ $counter }})"> <i class="fas fa-check"></i> Presione para finalizar prestación en curso</button></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


<script>

    $(document).ready(function(){
        console.log('ready!');
        const cantidad_superficie_teñida = $('#cant_superficie_teñida1000');
        const cantidad_superficie_total = $('#cant_superficie_total1000');
        const indice_oleary = $('#indice_oleary1000');

        // calcular el porcentaje
        const result = parseFloat((cantidad_superficie_teñida.val() / cantidad_superficie_total.val()) * 100).toFixed(2);
        console.log(result);
        if(!isNaN(result)){
            indice_oleary.val(result + '%');
        } else {
            indice_oleary.val('');
        }
    });

    function dame_tratamientos_pieza_period(pieza, counter, tipo) {
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
                    $('#tto_period_grupo' + counter).val(0);
                    $('#tto_period_grupo' + counter).empty();
                    $('#tto_period_grupo' + counter).append('<option value="0">Seleccione</option>');
                    $.each(resp.tratamientos, function(index, value) {
                        $('#tto_period_grupo' + counter).append('<option value="' + value.id + '">' + value.tratamiento + '</option>');
                    });
                } else {
                    $('#tto_period' + counter).val(0);
                    $('#tto_period' + counter).empty();
                    $('#tto_period' + counter).append('<option value="0">Seleccione</option>');
                    $.each(resp.tratamientos, function(index, value) {
                        $('#tto_period' + counter).append('<option value="' + value.id + '">' + value.tratamiento + '</option>');
                    });
                }
            }
        });
    }

    function ocultar_pieza_dental_tto_impl(){
        $('#pieza_dental_tto_impl').empty();
    }

    function guardar_pieza_dental_tto_period(counter){
        console.log(counter);
        let numero_pieza = $('#n_pieza_tto_period'+counter).val();
        let tto = $('#tto_period'+counter).val();

        let tipo_tto = $('#tpo_proc_imp'+counter).val();
        let tipo_tto_text = $('#tpo_proc_imp' + counter + ' option:selected').text(); // Obtiene el texto de la opción seleccionada

        let membrana_tto = $('#membrana_period'+counter).val();
        let membrana_tto_text = $('#membrana_period' + counter + ' option:selected').text(); // Obtiene el texto de la opción seleccionada
        if(membrana_tto == 4){
            membrana_tto_text = $('#obs_membrana_period'+counter).val();
        }

        let material_membrana_tto = $('#mat_membrana_period'+counter).val();
        let material_membrana_tto_text = $('#mat_membrana_period' + counter + ' option:selected').text(); // Obtiene el texto de la opción seleccionada
        if(material_membrana_tto == 4){
            material_membrana_tto_text = $('#obs_mat_membrana_period'+counter).val();
        }

        if(tipo_tto == 10){
            tipo_tto_text = $('#obs_tpo_proc_imp'+counter).val();
        }
        let anestesia_tto = $('#anestesia_period'+counter).val();
        let anestesia_tto_text = $('#anestesia_period' + counter + ' option:selected').text(); // Obtiene el texto de la opción seleccionada
        if(anestesia_tto == 4){
            anestesia_tto_text = $('#obs_anestesia_period'+counter).val();
        }

        let numero_tubos = $('#numero_tubos_period'+counter).val();
        let tecnica_anestesia = $('#tec_anestesia_period'+counter).val();
        let tecnica_anestesia_text = $('#tec_anestesia_period'+counter +' option:selected').text();
        if(tecnica_anestesia == 10){
            tecnica_anestesia_text = $('#obs_tec_anestesia_period'+counter).val();
        }

        let anestesico_tto = $('#anestesico_period'+counter).val();
        let anestesico_tto_text = $('#anestesico_period'+counter+' option:selected').text();
        if(anestesico_tto == 6){
            anestesico_tto_text = $('#obs_anestesico_period'+counter).val();
        }

        let incidente_tto = $('#incid_col_period'+counter).val();
        let incidente_tto_text = $('#incid_col_period'+counter+' option:selected').text();
        if(incidente_tto == 2){
            incidente_tto_text = $('#obs_incid_col_period'+counter).val();
        }

        let material_injerto_tto = $('#mat_inj_oseo_period'+counter).val();
        let material_injerto_tto_text = $('#mat_inj_oseo_period'+counter+' option:selected').text();
        if(material_injerto_tto == 6){
            material_injerto_tto_text = $('#obs_mat_inj_oseo'+counter).val();
        }

        let tipo_injerto_tto = $('#metodo_injerto_tto'+counter).val();

        let suturas_tto = $('#suturas_period'+counter).val();
        let suturas_tto_text = $('#suturas_period'+counter+' option:selected').text();
        let grosor_nylon = $('#grosor_nylon_input'+counter).val();
        if(suturas_tto == 5){
            suturas_tto_text = $('#obs_suturas'+counter).val();
        }

        let tiempo_quirurgico_tto = $('#tiempo_quir_period'+counter).val();

        let observaciones = $('#obs_period'+counter).val();
        if(observaciones == null){
            observaciones = '';
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

        if(membrana_tto == 0){
            valido = 0;
            mensaje += '<li>Campo requerido Membrana </li>';
        }

        if(material_membrana_tto == 0){
            valido = 0;
            mensaje += '<li>Campo requerido Material Membrana </li>';
        }

        if(numero_tubos == ''){
            valido = 0;
            mensaje += '<li>Campo requerido N° Tubos </li>';
        }

        if(grosor_nylon == ''){
            valido = 0;
            mensaje += '<li>Campo requerido Grosor </li>';
        }

        if(tipo_injerto_tto == ''){
            valido = 0;
            mensaje += '<li>Campo requerido Método de injerto </li>';
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
            membrana_tto: membrana_tto,
            membrana_tto_text: membrana_tto_text,
            material_membrana_tto: material_membrana_tto,
            material_membrana_tto_text: material_membrana_tto_text,
            anestesia_tto: anestesia_tto,
            anestesia_tto_text: anestesia_tto_text,
            numero_tubos: numero_tubos,
            tecnica_anestesia: tecnica_anestesia,
            tecnica_anestesia_text: tecnica_anestesia_text,
            anestesico_tto: anestesico_tto,
            anestesico_tto_text: anestesico_tto_text,
            incidente_tto: incidente_tto,
            incidente_tto_text: incidente_tto_text,
            material_injerto_tto: material_injerto_tto,
            material_injerto_tto_text: material_injerto_tto_text,
            tipo_injerto_tto: tipo_injerto_tto,
            suturas_tto: suturas_tto,
            suturas_tto_text: suturas_tto_text,
            grosor_nylon: grosor_nylon ? grosor_nylon : '',
            tiempo_quirurgico_tto: tiempo_quirurgico_tto,
            observaciones: observaciones,
            id_paciente: $('#id_paciente_fc').val(),
            id_lugar_atencion: $('#id_lugar_atencion').val(),
            id_ficha_atencion: $('#id_fc').val(),
            _token: CSRF_TOKEN
        }

        console.log(data);

        let url = "{{ ROUTE('profesional.adm_dental.guardar_pieza_dental_tto_period') }}";

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
                    $('#contenedor_tto_periodoncia').empty();
                    $('#contenedor_tto_periodoncia').append(resp.v);
                    $('#pieza_dental_tto_period').empty();
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
                    // mostrar_nueva_pieza_dental_tto_impl(1000);
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

    function guardar_pieza_dental_tto_impl_grupo(counter){

        let piezas = $('#numero_pieza_tto_impl_grupo'+counter).val();
        let tto = $('#tto_impl_grupo'+counter).val();

        let tipo_tto = $('#tpo_proc_imp_grupo'+counter).val();
        let tipo_tto_text = $('#tpo_proc_imp_grupo' + counter + ' option:selected').text(); // Obtiene el texto de la opción seleccionada

        let membrana_tto = $('#membrana_impl_grupo'+counter).val();
        let membrana_tto_text = $('#membrana_impl_grupo' + counter + ' option:selected').text(); // Obtiene el texto de la opción seleccionada
        if(membrana_tto == 4){
            membrana_tto_text = $('#obs_membrana_impl_grupo'+counter).val();
        }

        let material_membrana_tto = $('#mat_membrana_impl_grupo'+counter).val();
        let material_membrana_tto_text = $('#mat_membrana_impl_grupo' + counter + ' option:selected').text(); // Obtiene el texto de la opción seleccionada
        if(material_membrana_tto == 4){
            material_membrana_tto_text = $('#obs_mat_membrana_impl_grupo'+counter).val();
        }

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

        let material_injerto_tto = $('#mat_inj_oseo_impl_grupo'+counter).val();
        let material_injerto_tto_text = $('#mat_inj_oseo_impl_grupo'+counter+' option:selected').text();
        if(material_injerto_tto == 6){
            material_injerto_tto_text = $('#obs_mat_inj_oseo_impl_grupo'+counter).val();
        }

        let tipo_injerto_tto = $('#metodo_injerto_tto_grupo'+counter).val();

        let suturas_tto = $('#suturas_impl_grupo'+counter).val();
        let suturas_tto_text = $('#suturas_impl_grupo'+counter+' option:selected').text();
        let grosor_nylon = $('#grosor_nylon_input_grupo'+counter).val();
        if(suturas_tto == 5){
            suturas_tto_text = $('#obs_suturas_impl_grupo'+counter).val();
        }

        let tiempo_quirurgico_tto = $('#tiempo_quir_impl_grupo'+counter).val();

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

        if(membrana_tto == 0){
            valido = 0;
            mensaje += '<li>Campo requerido Membrana </li>';
        }

        if(numero_tubos == ''){
            valido = 0;
            mensaje += '<li>Campo requerido N° Tubos </li>';
        }

        if(grosor_nylon == ''){
            valido = 0;
            mensaje += '<li>Campo requerido Grosor </li>';
        }

        if(tipo_injerto_tto == ''){
            valido = 0;
            mensaje += '<li>Campo requerido Método de injerto </li>';
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
            membrana_tto: membrana_tto,
            membrana_tto_text: membrana_tto_text,
            material_membrana_tto: material_membrana_tto,
            material_membrana_tto_text: material_membrana_tto_text,
            anestesia_tto: anestesia_tto,
            anestesia_tto_text: anestesia_tto_text,
            numero_tubos: numero_tubos,
            tecnica_anestesia: tecnica_anestesia,
            tecnica_anestesia_text: tecnica_anestesia_text,
            anestesico_tto: anestesico_tto,
            anestesico_tto_text: anestesico_tto_text,
            incidente_tto: incidente_tto,
            incidente_tto_text: incidente_tto_text,
            material_injerto_tto: material_injerto_tto,
            material_injerto_tto_text: material_injerto_tto_text,
            tipo_injerto_tto: tipo_injerto_tto,
            suturas_tto: suturas_tto,
            suturas_tto_text: suturas_tto_text,
            grosor_nylon: grosor_nylon ? grosor_nylon : '',
            tiempo_quirurgico_tto: tiempo_quirurgico_tto,
            id_paciente: $('#id_paciente_fc').val(),
            id_lugar_atencion: $('#id_lugar_atencion').val(),
            id_ficha_atencion: $('#id_fc').val(),
            _token: CSRF_TOKEN
        }

        console.log(data);

        let url = "{{ ROUTE('profesional.adm_dental.guardar_pieza_dental_tto_impl') }}";

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

