<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2 shadow-none">
        <div class="row mx-0">
            <div class="col-sm-12 col-md-12">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="kine-contenido" role="tablist">
                    <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="atencion-tab" data-toggle="tab" href="#atencion" role="tab" aria-controls="atencion" aria-selected="true">Ficha de atención</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="controles-tab" data-toggle="tab" href="#controles" role="tab" aria-controls="controles" aria-selected="false">Controles</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="historial-atencion-tab" data-toggle="tab" href="#historial-atencion" role="tab" aria-controls="historial-atencion" aria-selected="false">Historico de controles</a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="alert-atencion alert alert-warning-b alert-dismissible fade show" role="alert" id="mensaje_ficha"></div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="tab-content" id="kine-contenido">
                    <!--FICHA ATENCIÓN -->
                    <div class="tab-pane fade show active" id="atencion" role="tabpanel" aria-labelledby="atencion-tab">
                        <div class="row">
                            <!--Formulario / Menor de edad-->
                            @include('general.secciones_ficha.seccion_menor')
                            <!--Cierre: Formulario / Menor de edad-->
                            <!--INFORMACIÓN-->
                            @include('atencion_otros_prof.secciones_especialidad.includes.generales.motivo_cons')

                            <!--ANTECEDENTES FAMILIARES-->
                            @include('atencion_otros_prof.secciones_especialidad.includes.generales.antecedentes')
                            <!--EVALUACIÓN COMUNICACIÓN-->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card-a">
                                    <div class="card-header-a" id="eval_comunicacion">
                                        <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left  card-act-open collapsed"  type="button" data-toggle="collapse" data-target="#eval_comunicacion_c" aria-expanded="false" aria-controls="eval_comunicacion_c">
                                            Evaluación comunicación
                                        </button>
                                    </div>
                                    <div id="eval_comunicacion_c" class="collapse" aria-labelledby="eval_comunicacion" data-parent="#eval_comunicacion">
                                        <div class="card-body-aten-a">
                                           @include('atencion_otros_prof.secciones_especialidad.includes.generales.comunicacion')
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--EVALUACIÓN EXAMEN LOCOMOTOR-->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card-a">
                                    <div class="card-header-a" id="locomotor">
                                        <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left  card-act-open collapsed" type="button" type="button" data-toggle="collapse" data-target="#locomotor_c" aria-expanded="false" aria-controls="locomotor_c">
                                            Evaluación examen Locomotor
                                        </button>
                                    </div>
                                    <div id="locomotor_c" class="collapse" aria-labelledby="locomotor" data-parent="#locomotor">
                                        <div class="card-body-aten-a">
                                            <form>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <ul class="nav nav-tabs-aten nav-fill mb-3" id="ev-nutricional" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset active" id="ex_postural-tab" data-toggle="tab" href="#ex_postural" role="tab" aria-controls="ex_postural" aria-selected="true">Postura</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="columna-tab" data-toggle="tab" href="#columna" role="tab" aria-controls="columna" aria-selected="false">Columna</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="articul-tab" data-toggle="tab" href="#articul" role="tab" aria-controls="articul" aria-selected="false">Articulaciones</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="tend_periart-tab" data-toggle="tab" href="#tend_periart" role="tab" aria-control="tend_periart" aria-selected="false">Tendones Tejido periarticular</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="tab-content" id="ev-kine">
                                                            <!--POSTURA-->
                                                            <div class="tab-pane fade show active" id="ex_postural" role="tabpanel" aria-labelledby="ex_postural-tab">
                                                                <form>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                            <label class="floating-label-activo-sm">Examen postural</label>
                                                                            <select class="form-control form-control-sm" name="postura" id="postura">
                                                                                <option value="0">No realizada</option>
                                                                                <option value="1">Normal</option>
                                                                                <option value="2">Alterado</option>
                                                                                <option value="3">Muy alterado</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                            <label class="floating-label-activo-sm">Alineación</label>
                                                                            <select class="form-control form-control-sm" name="alineacion_post" id="alineacion_post">
                                                                                <option value="0">No Realizada</option>
                                                                                <option value="1">Normal</option>
                                                                                <option value="2">Alterada</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <label class="floating-label-activo-sm">Descripción</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="post_descripcion" id="post_descripcion"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <button type="button" class="btn btn-sm btn-info-light-c btn-block text-left" onclick="postura_m();"><i class="feather icon-plus"></i> Examen Motor Postura</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <!--COLUMNA-->
                                                            <div class="tab-pane fade show" id="columna" role="tabpanel" aria-labelledby="columna-tab">
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-2">
                                                                        <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                            <a class="nav-link-aten text-reset active " id="col_total-tab" data-toggle="tab" href="#col_total" role="tab" aria-controls="col_total" aria-selected="false">Total</a>
                                                                            <a class="nav-link-aten text-reset" id="col_cerv-tab" data-toggle="tab" href="#col_cerv" role="tab" aria-controls="col_cerv" aria-selected="true">Cervical</a>
                                                                            <a class="nav-link-aten text-reset" id="dor_lumbar-tab" data-toggle="tab" href="#dor_lumbar" role="tab" aria-controls="dor_lumbar" aria-selected="false">Dorso-Lumbar</a>
                                                                            <a class="nav-link-aten text-reset" id="sacr_coxis-tab" data-toggle="tab" href="#sacr_coxis" role="tab" aria-controls="sacr_coxis" aria-selected="false">Sacro-coxis</a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-9 col-lg-9 col-xl-10">
                                                                        <div class="tab-content" id="v-pills-tabContent">
                                                                            <div class="tab-pane fade show active" id="col_total" role="tabpanel" aria-labelledby="col_total-tab">
                                                                                <div class="form-row">
                                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm" for="exp_post" >Exploración Posterior</label>
                                                                                            <select name="exp_post" id="exp_post" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('exp_post','div_detalle_exp_post','obs_post',3)">
                                                                                                <option value="0">Seleccione</option>
                                                                                                <option value="1">No examinada</option>
                                                                                                <option value="2">Normal</option>
                                                                                                <option value="3">Alterada</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="form-group"  id="div_detalle_exp_post" style="display:none">
                                                                                            <label class="floating-label-activo-sm" for="obs_post">Obs. Exploración alterada</label>
                                                                                            <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_post" id="obs_post"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm" for="expl_lateral">Exploración Lateral</label>
                                                                                            <select name="expl_lateral" id="expl_lateral" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('expl_lateral','div_detalle_expl_lateral','aprec_expl_lateral',2)">
                                                                                                <option value="0">Seleccione</option>
                                                                                                <option value="1">Aceptable</option>
                                                                                                <option value="2">Deficiente</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="form-group" id="div_detalle_expl_lateral" style="display:none">
                                                                                            <label class="floating-label-activo-sm" for="aprec_expl_lateral">Obs. Exploración alterada</label>
                                                                                            <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="aprec_expl_lateral" id="aprec_expl_lateral"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-row">
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm" for="obs_exp_columna_total">Obs. Examen Columna Total</label>
                                                                                            <textarea class="form-control caja-texto form-control-sm"  data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_exp_columna_total" id="obs_exp_columna_total"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-row">
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm" for="resultado_examenes_ct">Resultado exámenes</label>
                                                                                            <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="resultado_examenes_ct" id="resultado_examenes_ct"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="tab-pane fade show" id="col_cerv" role="tabpanel" aria-labelledby="col_cerv-tab">
                                                                                <div class="form-row">
                                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm" for="cerv_insp">Inspección</label>
                                                                                            <select name="cerv_insp" id="cerv_insp" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cerv_insp','div_detalle_cerv_insp','ex_cerv_insp',2);">
                                                                                                <option value="0">Seleccione</option>
                                                                                                <option value="1">Normal</option>
                                                                                                <option value="2">Anormal</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="form-group" id="div_detalle_cerv_insp" style="display:none">
                                                                                            <label class="floating-label-activo-sm t-red" for="ex_cerv_insp">Inspección <i>(Describir)</i></label>
                                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_cerv_insp" id="ex_cerv_insp"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm" for="cerv_palp">Palpación</label>
                                                                                            <select name="cerv_palp" id="cerv_palp"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cerv_palp','div_detalle_cerv_palp','ex_cerv_palp',2);">
                                                                                                <option value="0">Seleccione</option>
                                                                                                <option value="1">Normal</option>
                                                                                                <option value="2">Anormal</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="form-group"  id="div_detalle_cerv_palp" style="display:none">
                                                                                            <label class="floating-label-activo-sm t-red" for="ex_cerv_palp">Palpación <i>(Describir)</i></label>
                                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_cerv_palp" id="ex_cerv_palp"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-row">
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm" for="obs_ex_col_cerv">Obs. Columna Cervical</label>
                                                                                            <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_col_cerv" id="obs_ex_col_cerv"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-row">
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm" for="resultado_examenes_cc">Resultado Exámenes</label>
                                                                                            <textarea class="form-control caja-texto form-control-sm"   rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="resultado_examenes_cc" id="resultado_examenes_cc"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="tab-pane fade" id="dor_lumbar" role="tabpanel" aria-labelledby="dor_lumbar-tab">
                                                                                <div class="form-row">
                                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm"  for="dorso_lum_insp">Inspección</label>
                                                                                            <select name="dorso_lum_insp" id="dorso_lum_insp" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('dorso_lum_insp','div_detalle_dorso_lum_insp','ex_dorso_lum_insp',2);">
                                                                                                <option value="0">Seleccione</option>
                                                                                                <option value="1">Normal</option>
                                                                                                <option value="2">Anormal</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="form-group" id="div_detalle_dorso_lum_insp" style="display:none">
                                                                                            <label class="floating-label-activo-sm t-red"  for="ex_dorso_lum_insp">Inspección <i>(Describir)</i></label>
                                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_dorso_lum_insp" id="ex_dorso_lum_insp"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm"  for="dors_lumb_palp">Palpación</label>
                                                                                            <select name="dors_lumb_palp" id="dors_lumb_palp"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('dors_lumb_palp','div_detalle_dors_lumb_palp','ex_dors_lumb_palp',2);">
                                                                                                <option value="0">Seleccione</option>
                                                                                                <option value="1">Normal</option>
                                                                                                <option value="2">Anormal</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="form-group"  id="div_detalle_dors_lumb_palp" style="display:none">
                                                                                            <label class="floating-label-activo-sm t-red"  for="ex_dors_lumb_palp">Palpación <i>(Describir)</i></label>
                                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_dors_lumb_palp" id="ex_dors_lumb_palp"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-row">
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm"  for="obs_ex_col_dors_lumb">Observaciones Columna dorso-lumbar</label>
                                                                                            <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_col_dors_lumb" id="obs_ex_col_dors_lumb"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-row">
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm"  for="resultado_examenes_dl">Resultado exámenes</label>
                                                                                            <textarea class="form-control caja-texto form-control-sm"   rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="resultado_examenes_dl" id="resultado_examenes_dl"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="tab-pane fade" id="sacr_coxis" role="tabpanel" aria-labelledby="sacr_coxis-tab">
                                                                                <div class="form-row">
                                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm" for="sacro_dol">Zonas dolorosas</label>
                                                                                            <select name="sacro_dol" id="sacro_dol"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('sacro_dol','div_detalle_sacro_dol','detalle_sacro_dol',3)">
                                                                                                <option value="0">Seleccione</option>
                                                                                                <option value="1">No</option>
                                                                                                <option value="2">Si</option>
                                                                                                <option value="3">Observaciones <i> (Describir)</i></option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="form-group" id="div_detalle_sacro_dol" style="display:none">
                                                                                            <label class="floating-label-activo-sm" for="detalle_sacro_dol">Descripción</label>
                                                                                            <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="detalle_sacro_dol" id="detalle_sacro_dol"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm" for="sacro_palp">Palpación</label>
                                                                                            <select name="sacro_palp" id="sacro_palp"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('sacro_palp','div_detalle_sacro_palp','detalle_sacro_palp',3)">
                                                                                                <option value="0">Seleccione</option>
                                                                                                <option value="1">No</option>
                                                                                                <option value="2">Si</option>
                                                                                                <option value="3">Observaciones<i> (Describir)</i></option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="form-group"  id="div_detalle_sacro_palp" style="display:none">
                                                                                            <label class="floating-label-activo-sm" for="obs_sacro_palp">Descripción</label>
                                                                                            <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_sacro_palp" id="obs_sacro_palp"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-row">
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm"  for="obs_ex_sacrocoxis">Obs. Examen Sacrocoxis</label>
                                                                                            <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_sacrocoxis" id="obs_ex_sacrocoxis"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-row">
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm" for="resultado_examenes_sc">Resultado exámenes</label>
                                                                                            <textarea class="form-control caja-texto form-control-sm"   rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="resultado_examenes_sc" id="resultado_examenes_sc"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>     
                                                            </div>
                                                            <!--ARTICULACIONES-->
                                                            <div class="tab-pane fade show" id="articul" role="tabpanel" aria-labelledby="articul-tab">
                                                                <div class="row">
                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-7">
                                                                        <h6 class="t-aten d-inline my-2">EXAMEN ARTICULAR</h6>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-7">
                                                                        <div class="form-group">
                                                                            <button type="button" class="btn btn-info-light-c btn-xxs btn-agregar-grupo-articulacion float-right"><i class="feather icon-plus"></i> Añadir Articulación</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div id="contenedor_grupo_articulacion">
                                                                    <div id="grupo_articulacion">
                                                                        <form>
                                                                            <div class="form-row">

                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm" for="art_nomb" >Articulación</label>
                                                                                        <input type="text" class="form-control form-control-sm" name="art_nomb" id="art_nomb">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm" for="art_dolor" >Dolor</label>
                                                                                        <select name="art_dolor" id="art_dolor" class="form-control form-control-sm">
                                                                                            <option selected  value="1">No</option>
                                                                                            <option value="2">Si</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm" for="func_art" >Funcionalidad</label>
                                                                                        <select name="func_art" id="func_art" class="form-control form-control-sm">
                                                                                            <option selected  value="1">Normal</option>
                                                                                            <option value="2">Alterada</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm" for="def_art" >Deformaciones</label>
                                                                                        <select name="def_art" id="def_art" class="form-control form-control-sm">
                                                                                            <option selected  value="1">No</option>
                                                                                            <option value="2">Si</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm" for="obs_artic">Observaciones</label>
                                                                                        <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_artic" id="obs_artic" placeholder="COMENTARIOS DE ARTICULACIÓN O GRUPO EXAMINADO"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <label class="floating-label-activo-sm" for="obs_gen_artic" >Observaciones generales</label>
                                                                        <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="obs_gen_artic" id="obs_gen_artic"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--TENDONES PERIART-->
                                                            <div class="tab-pane fade show" id="tend_periart" role="tabpanel" aria-labelledby="tend_periart-tab">
                                                                <div class="row">
                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-7">
                                                                        <h6 class="t-aten d-inline my-2">EXAMEN TENDONES Y TEJIDOS ARTICULARES</h6>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-7">
                                                                        <div class="form-group">
                                                                            <button type="button" class="btn btn-info-light-c btn-xxs btn-agregar-grupo-tendones float-right "><i class="feather icon-plus"></i> Añadir Otro Grupo</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div id="contenedor_grupo_tendones">
                                                                    <div id="grupo_tendones">
                                                                        <form>
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm" for="tend_nomb">Tendón</label>
                                                                                        <input type="text" class="form-control form-control-sm" name="tend_nomb" id="tend_nomb">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm" for="tend_dolor">Dolor</label>
                                                                                        <select name="tend_dolor" id="tend_dolor" class="form-control form-control-sm">
                                                                                            <option selected  value="1">No</option>
                                                                                            <option value="2">Si</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm" for="func_tend">Funcionalidad</label>
                                                                                        <select name="func_tend" id="func_tend" class="form-control form-control-sm">
                                                                                            <option selected  value="1">Normal</option>
                                                                                            <option value="2">Alterada</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm" for="def_tend">Deformaciones</label>
                                                                                        <select name="def_tend" id="def_tend" class="form-control form-control-sm">
                                                                                            <option selected  value="1">No</option>
                                                                                            <option value="2">Si</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm"for="obs_tend" >Observaciones</label>
                                                                                        <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tend" id="obs_tend"placeholder="COMENTARIOS DE TENDÓN O GRUPO EXAMINADO"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <label class="floating-label-activo-sm" for="obs_gen_tendon">Observaciones generales</label>
                                                                        <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="obs_gen_tendon" id="obs_gen_tendon"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--EVALUACIÓN EXAMEN NEUROLÓGICO-->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card-a">
                                    <div class="card-header-a" id="eval_neurol">
                                        <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left  card-act-open collapsed" type="button" data-toggle="collapse" data-target="#eval_neurol_c" aria-expanded="false" aria-controls="eval_neurol_c">
                                            Evaluación examen neurológico
                                        </button>
                                    </div>
                                    <div id="eval_neurol_c" class="collapse" aria-labelledby="eval_neurol" data-parent="#eval_neurol">
                                        <div class="card-body-aten-a">
                                            <form>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <ul class="nav nav-tabs-aten nav-fill mb-3" id="ev-kine_neuro" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset active" id="lenguaje-tab" data-toggle="tab" href="#lenguaje" role="tab" aria-controls="lenguaje" aria-selected="true">Audición-Lenguaje</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="memoria-tab" data-toggle="tab" href="#memoria" role="tab" aria-controls="memoria" aria-selected="false">Memoria</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="praxias-tab" data-toggle="tab" href="#praxias" role="tab" aria-controls="praxias" aria-selected="false">Praxias</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="fun-cog-tab" data-toggle="tab" href="#fun-cog" role="tab" aria-control="fun-cog" aria-selected="false">Funciones cognitivas superiores</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="cap-visual-tab" data-toggle="tab" href="#cap-visual" role="tab" aria-control="cap-visual" aria-selected="false">Apreciación capacidad visual</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="viso-esp-tab" data-toggle="tab" href="#viso-esp" role="tab" aria-control="viso-esp" aria-selected="false">Percepción viso-espacial</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="f_eval-tab" data-toggle="tab" href="#f_eval" role="tab" aria-control="f_eval" aria-selected="false">Formularios de Evaluación</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="tab-content" id="ev-kine_neuro">
                                                            <!--LENGUAJE-->
                                                            <div class="tab-pane fade show active" id="lenguaje" role="tabpanel" aria-labelledby="lenguaje-tab">
                                                                <form>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <h6 class="t-aten">AUDICIÓN LENGUAJE</h6>
                                                                        </div>
                                                                        <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                            <label class="floating-label-activo-sm" for="lenguaje">Lenguaje</label>
                                                                            <select class="form-control form-control-sm" name="lenguaje" id="lenguaje">
                                                                                <option value="1">No realizada</option>
                                                                                <option value="2">Normal</option>
                                                                                <option value="3">Alterado</option>
                                                                                <option value="4">Muy alterado</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                            <label class="floating-label-activo-sm" for="t_alt_leng">Tipo Alteración lenguaje</label>
                                                                            <select class="form-control form-control-sm" name="t_alt_leng" id="t_alt_leng">
                                                                                <option value="AL">No Realizada</option>
                                                                                <option value="1">Alt de la denominación</option>
                                                                                <option value="2">Alt de la Comprensión</option>
                                                                                <option value="3">Alt de la Lecto-escritura</option>
                                                                                <option value="4">Repeticiónes</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                            <label class="floating-label-activo-sm" for="leng_alt_mod">Alteración modo</label>
                                                                            <select class="form-control form-control-sm" name="leng_alt_mod" id="leng_alt_mod">
                                                                                <option value="1">No Realizada</option>
                                                                                <option value="2">Disartria</option>
                                                                                <option value="3">Disfonía</option>
                                                                                <option value="4">Afasia</option>
                                                                                <option value="5">Disfasia</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                            <label class="floating-label-activo-sm" for="audio">Audición</label>
                                                                            <select class="form-control form-control-sm" name="audio" id="audio">
                                                                                <option value="AL">Normal</option>
                                                                                <option value="1">Hipoacusia leve</option>
                                                                                <option value="2">Hipoacusia Severa/option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                            <label class="floating-label-activo-sm" for="audifono">Usa Protesis(audífono)</label>
                                                                            <select class="form-control form-control-sm" name="audifono" id="audifono">
                                                                                <option value="1">No</option>
                                                                                <option value="2">Si</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                            <label class="floating-label" for="ap_capac">Apreciación Cap. auditiva y Comp. de lenguaje</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="ap_capac" id="ap_capac"></textarea>
                                                                        </div>

                                                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <label class="floating-label-activo-sm"for="obs_leng" >Observaciones Examen</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_leng" id="obs_leng"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <!--MEMORIA-->
                                                            <div class="tab-pane fade show" id="memoria" role="tabpanel" aria-labelledby="memoria-tab">
                                                                <form>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <h6 class="t-aten">MEMORIA</h6>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm" for="obs_leng" >Memoria</label>
                                                                                <select class="form-control form-control-sm" name="mem_exam" id="mem_exam">
                                                                                    <option value="1">No Realizada</option>
                                                                                    <option value="2">Normal</option>
                                                                                    <option value="3">Alt. Memoria Inmediata</option>
                                                                                    <option value="4">Alt. Memoria Corto Plazo</option>
                                                                                    <option value="5">Alt. Memoria Largo Plazo</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-md-8">
                                                                            <label class="floating-label-activo-sm" for="descrip_mem" >Descripción</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="descrip_mem" id="descrip_mem"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <!--PRAXIAS-->
                                                            <div class="tab-pane fade show" id="praxias" role="tabpanel" aria-labelledby="praxias-tab">
                                                                <form>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <h6 class="t-aten">PRAXIAS</h6>
                                                                        </div>
                                                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <label class="floating-label-activo-sm" for="praxias" >Descripción</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="praxias" id="praxias"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <!--FUNCIONES COGNITIVAS SUPERIORES-->
                                                            <div class="tab-pane fade show" id="fun-cog" role="tabpanel" aria-labelledby="fun-cog-tab">
                                                                <form>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <h6 class="t-aten">FUNCIONES COGNITIVAS SUPERIORES</h6>
                                                                        </div>
                                                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <label class="floating-label-activo-sm" for="fcs_descripcion" >Descripción</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="fcs_descripcion" id="fcs_descripcion"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <!--APRECIACIÓN CAPACIDAD VISUAL-->
                                                            <div class="tab-pane fade show" id="cap-visual" role="tabpanel" aria-labelledby="cap-visual-tab">
                                                                <form>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <h6 class="t-aten">APRECIACIÓN CAPACIDAD VISUAL</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                            <label class="floating-label-activo-sm" for="capvis_tipo">Tipo</label>
                                                                            <select class="form-control form-control-sm" name="capvis_tipo" id="capvis_tipo">
                                                                                <option value="1">No Examinada</option>
                                                                                <option value="2">Normal</option>
                                                                                <option value="3">Presbicie</option>
                                                                                <option value="4">Miopía</option>
                                                                                <option value="5">Dudosa</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                                                            <label class="floating-label-activo-sm" for="capvis_descrip" >Observaciones Capacidad visual</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="capvis_descrip" id="capvis_descrip"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <!--PERCEPCIÓN VISO-ESPACIAL-->
                                                            <div class="tab-pane fade show" id="viso-esp" role="tabpanel" aria-labelledby="viso-esp-tab">
                                                                <form>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <h6 class="t-aten">PERCEPCIÓN VISO-ESPACIAL</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                            <label class="floating-label-activo-sm" for="percve_ex">Tipo</label>
                                                                            <select class="form-control form-control-sm" name="percve_ex" id="percve_ex">
                                                                                <option value="NE">No examinada</option>
                                                                                <option value="N">Normal</option>
                                                                                <option value="DE">Deficiente</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                                                            <label class="floating-label-activo-sm" for="percve_descrip">Descripción</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="percve_descrip" id="percve_descrip"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <!--PERCEPCIÓN VISO-ESPACIAL-->
                                                            <div class="tab-pane fade show" id="f_eval" role="tabpanel" aria-labelledby="f_eval-tab">
                                                                <form>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <h6 class="t-aten">FORMULARIOS DE EVALUACIÓN</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                            <button type="button" class="btn btn-primary-light-c btn-block btn-xxs mt-1" onclick="fuerza_inf();"><i class="feather icon-plus"></i> Examen Fuerza extremidad Inferior</button>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                            <button type="button" class="btn btn-primary-light-c btn-block btn-xxs mt-1" onclick="fuerza_sup();"><i class="feather icon-plus"></i>Examen Fuerza extremidad Superior</button>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                            <button type="button" class="btn btn-primary-light-c btn-block btn-xxs mt-1" onclick="postura_m();"><i class="feather icon-plus"></i> Examen motor Postura y Marcha</button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                            <button type="button" class="btn btn-primary-light-c btn-block btn-xxs mt-1" onclick="tono();"><i class="feather icon-plus"></i> Examen Nervios Motores</button>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                            <button type="button" class="btn btn-primary-light-c btn-block btn-xxs mt-1" onclick="sensibilidad();"><i class="feather icon-plus"></i> Examen Sensitivo</button>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                            <button type="button" class="btn btn-primary-light-c btn-block btn-xxs mt-1" onclick="func_global();"><i class="feather icon-plus"></i> Funcionalidad Global</button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                            <button type="button" class="btn btn-primary-light-c btn-block btn-xxs mt-1" onclick="metria();"><i class="feather icon-plus"></i> Metría</button>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                            <button type="button" class="btn btn-primary-light-c btn-block btn-xxs mt-1" onclick="pares();"><i class="feather icon-plus"></i> Pares Craneanos</button>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-10">
                                                                            <button type="button" class="btn btn-primary-light-c btn-block btn-xxs mt-1" onclick="reflejos();"><i class="feather icon-plus"></i> Reflejos Osteotendineos</button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-10 p-10">

                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-sm-12 col-md-10 col-lg-10col-xl-10 mt-10">
                                                                            <label class="floating-label-activo-sm" for="capvis_descrip" > Obs. Modal Fuerza extremidad Inferior</label>
                                                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_modal_f_ext_inf" id="obs_modal_f_ext_inf"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-sm-12 col-md-2 col-lg-2col-xl-2 ">
                                                                            <button type="button" class="btn btn-primary-light-c btn-block btn-sm mt-1" onclick="fuerza_inf();"><i class="feather icon-plus"></i> Ver Modal</button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-sm-12 col-md-10 col-lg-10 col-xl-10">
                                                                            <label class="floating-label-activo-sm" for="capvis_descrip" > Obs. Modal  Fuerza extremidad Superior</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_modal_f_ext_inf" id="obs_modal_f_ext_inf"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-sm-12 col-md-2 col-lg-2col-xl-2 ">
                                                                            <button type="button" class="btn btn-primary-light-c btn-block btn-sm mt-1" onclick="fuerza_sup();"><i class="feather icon-plus"></i> Ver Modal</button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-sm-12 col-md-10 col-lg-10 col-xl-10">
                                                                            <label class="floating-label-activo-sm" for="capvis_descrip" >Obs. Modal  Examen motor Postura y Marcha</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_modal_f_ext_inf" id="obs_modal_f_ext_inf"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-sm-12 col-md-2 col-lg-2col-xl-2 ">
                                                                            <button type="button" class="btn btn-primary-light-c btn-block btn-sm mt-1" onclick="postura_m();"><i class="feather icon-plus"></i> Ver Modal</button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-sm-12 col-md-10 col-lg-10 col-xl-10">
                                                                            <label class="floating-label-activo-sm" for="capvis_descrip" >Obs. Modal  Examen Nervios Motores</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_modal_f_ext_inf" id="obs_modal_f_ext_inf"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-sm-12 col-md-2 col-lg-2col-xl-2 ">
                                                                            <button type="button" class="btn btn-primary-light-c btn-block btn-sm mt-1" onclick="tono();"><i class="feather icon-plus"></i> Ver Modal</button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-sm-12 col-md-10 col-lg-10 col-xl-10">
                                                                            <label class="floating-label-activo-sm" for="capvis_descrip">Obs. Modal Examen Sensitivo</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_modal_f_ext_inf" id="obs_modal_f_ext_inf"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-sm-12 col-md-2 col-lg-2col-xl-2 ">
                                                                            <button type="button" class="btn btn-primary-light-c btn-block btn-sm mt-1" onclick="sensibilidad();"><i class="feather icon-plus"></i> Ver Modal</button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-sm-12 col-md-10 col-lg-10 col-xl-10">
                                                                            <label class="floating-label-activo-sm" for="capvis_descrip">Obs. Modal Funcionalidad Global</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_modal_f_ext_inf" id="obs_modal_f_ext_inf"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-sm-12 col-md-2 col-lg-2col-xl-2 ">
                                                                            <button type="button" class="btn btn-primary-light-c btn-block btn-sm mt-1" onclick="func_global();"><i class="feather icon-plus"></i> Ver Modal</button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-sm-12 col-md-10 col-lg-10 col-xl-10">
                                                                            <label class="floating-label-activo-sm" for="capvis_descrip">Obs. Modal Metría</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_modal_f_ext_inf" id="obs_modal_f_ext_inf"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-sm-12 col-md-2 col-lg-2col-xl-2 ">
                                                                            <button type="button" class="btn btn-primary-light-c btn-block btn-sm mt-1" onclick="metria();"><i class="feather icon-plus"></i> Ver Modal</button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-sm-12 col-md-10 col-lg-10 col-xl-10">
                                                                            <label class="floating-label-activo-sm" for="capvis_descrip">Obs. Modal Pares Craneanos</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_modal_f_ext_inf" id="obs_modal_f_ext_inf"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-sm-12 col-md-2 col-lg-2col-xl-2 ">
                                                                            <button type="button" class="btn btn-primary-light-c btn-block btn-sm mt-1" onclick="pares();"><i class="feather icon-plus"></i> Ver Modal</button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-sm-12 col-md-10 col-lg-10 col-xl-10">
                                                                            <label class="floating-label-activo-sm" for="capvis_descrip">Obs. Modal Reflejos Osteotendineos</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_modal_f_ext_inf" id="obs_modal_f_ext_inf"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-sm-12 col-md-2 col-lg-2col-xl-2 ">
                                                                            <button type="button" class="btn btn-primary-light-c btn-block btn-sm mt-1" onclick="reflejos();"><i class="feather icon-plus"></i> Ver Modal</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- EVALUACIÓN TÓRAX Y RESPIRACIÓN-->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card-a">
                                    <div class="card-header-a" id="eval_resp">
                                        <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left  card-act-open collapsed"  type="button" data-toggle="collapse" data-target="#eval_resp_c" aria-expanded="false" aria-controls="eval_resp_c">
                                            Evaluación tórax y respiración
                                        </button>
                                    </div>
                                    <div id="eval_resp_c" class="collapse" aria-labelledby="eval_resp" data-parent="#eval_resp">
                                        <div class="card-body-aten-a">
                                            <form>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <ul class="nav nav-tabs-aten nav-fill mb-3" id="ev-torax-resp" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset active" id="inspeccion-tab" data-toggle="tab" href="#inspeccion" role="tab" aria-controls="inspeccion" aria-selected="true">Inspección</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="palpacion-tab" data-toggle="tab" href="#palpacion" role="tab" aria-controls="palpacion" aria-selected="false">Palpación</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="percusion-tab" data-toggle="tab" href="#percusion" role="tab" aria-controls="percusion" aria-selected="false">Percusión</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="auscultacion-tab" data-toggle="tab" href="#auscultacion" role="tab" aria-control="auscultacion" aria-selected="false">Auscultación</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="evaluacion-tab" data-toggle="tab" href="#evaluacion" role="tab" aria-control="evaluacion" aria-selected="false">Resumen evaluación</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="tab-content" id="ev-torax-resp">
                                                            <!--INSPECCIÓN-->
                                                            <div class="tab-pane fade show active" id="inspeccion" role="tabpanel" aria-labelledby="inspeccion-tab">
                                                                <form>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <h6 class="t-aten">INSPECCIÓN</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-md-3">
                                                                            <label class="floating-label-activo-sm" for="resp_tipo">Tipo de respiración</label>
                                                                            <div class="form-group fill">
                                                                                <select class="form-control form-control-sm" name="resp_tipo" id="resp_tipo">
                                                                                    <option value="1">No Examinada</option>
                                                                                    <option value="2">• Normal</option>
                                                                                    <option value="3">Costal Superior</option>
                                                                                    <option value="4">Costo-Diafragmática</option>
                                                                                    <option value="5">Abdominal</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <label id="" name="" class="floating-label-activo-sm" for="ftorax">Forma Toráxica</label>
                                                                            <select class="form-control form-control-sm" name="ftorax" id="ftorax">
                                                                                <option value="AL">Seleccione</option>
                                                                                <optgroup label="TORAX NORMAL">
                                                                                    <option value="1">Normal</option>
                                                                                </optgroup>
                                                                                <optgroup label="DEFORMACION CONGÉNITA">
                                                                                    <option value="2">Tórax Acanalado</option>
                                                                                    <option value="3">Pectus excavatum</option>
                                                                                    <option value="4">Tórax Piramidal</option>
                                                                                    <option value="5">Tórax Piriforme</option>
                                                                                </optgroup>
                                                                                <optgroup label="DEFORMACIÓN ADQUIRIDA">
                                                                                    <option value="6">Tórax Raquítico</option>
                                                                                    <option value="7">Tórax Enfisematoso</option>
                                                                                </optgroup>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <label id="" name="" class="floating-label-activo-sm" for="storax">Simetría toráxica </label>
                                                                            <select class="form-control form-control-sm" name="storax" id="storax">
                                                                                <option value="1">Seleccione</option>
                                                                                <option value="2">Simétrico</option>
                                                                                <option value="3">Asimétrico</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-3 ">
                                                                            <label class="floating-label" for="resp_desc">Descripción</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="resp_desc" id="resp_desc"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label class="floating-label-activo-sm" for="resp_piel">Estado de la piél</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="resp_piel" id="resp_piel"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label class="floating-label-activo-sm" for="resp_cian">Cianosis</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="resp_cian" id="resp_cian"></textarea>
                                                                        </div>

                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label-activo-sm" for="resp_mov">Movilidad respiratoria</label>
                                                                            <select class="form-control form-control-sm" name="resp_mov" id="resp_mov">
                                                                                <option value="1">No realizada</option>
                                                                                <option value="2">Alterada</option>
                                                                                <option value="3">Muy alterada</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label-activo-sm" for="resp_tiraje">Tiraje</label>
                                                                            <select class="form-control form-control-sm" name="resp_tiraje" id="resp_tiraje">
                                                                                <option value="1">No realizada</option>
                                                                                <option value="2">Alterada</option>
                                                                                <option value="3">Muy alterada</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="floating-label-activo-sm" for="resp_descrip">Descripción</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="resp_descrip" id="resp_descrip"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <!--PALPACIÓN-->
                                                            <div class="tab-pane fade show" id="palpacion" role="tabpanel" aria-labelledby="palpacion-tab">
                                                                <form>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <h6 class="t-aten">PALPACIÓN</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-4 col-lg-4 col-xl-4">
                                                                            <label class="floating-label-activo-sm" for="palp_pd">Puntos Dolorosos</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="palp_pd" id="palp_pd"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4 col-lg-4 col-xl-4">
                                                                            <label class="floating-label-activo-sm" for="palp_vv">Vibración Vocal</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="palp_vv" id="palp_vv"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-4 col-lg-4 col-xl-4">
                                                                            <label class="floating-label-activo-sm" for="palp_exp">Expansibilidad</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="palp_exp" id="palp_exp"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                                                            <label class="floating-label-activo-sm" for="palp_elast">Elasticidad</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="palp_elast" id="palp_elast"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                                                            <label class="floating-label-activo-sm" for="palp_frem">Frémitos</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="palp_frem" id="palp_frem"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <label class="floating-label-activo-sm" for="palp_desc">Descripción Examen</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="palp_desc" id="palp_desc"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <!--PERCUSIÓN-->
                                                            <div class="tab-pane fade show" id="percusion" role="tabpanel" aria-labelledby="percusion-tab">
                                                                <form>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <h6 class="t-aten">PERCUSIÓN</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <label class="floating-label-activo-sm" for="perc_descrip">Descripción</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="perc_descrip" id="perc_descrip"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <!--AUSCULTACIÓN-->
                                                            <div class="tab-pane fade show" id="auscultacion" role="tabpanel" aria-labelledby="auscultacion-tab">
                                                                <form>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <h6 class="t-aten">AUSCULTACIÓN</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 my-2">
                                                                            <h6 class="t-aten">Pre Kine</h6>
                                                                        </div>
                                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <label class="floating-label-activo-sm" for="r_normal_pre">Ruidos respiratorios normales</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="r_normal_pr" id="r_normal_pre"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <label class="floating-label-activo-sm" for="r_adv_pre">Ruidos adventicios</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="r_adv_pre" id="r_adv_pre"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 my-2">
                                                                            <h6 class="t-aten">Post Kine</h6>
                                                                        </div>
                                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <label class="floating-label-activo-sm" for="r_normal_post">Ruidos respiratorios normales</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="r_normal_post" id="r_normal_post"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <label class="floating-label-activo-sm" for="r_adv_post">Ruidos adventicios</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="r_adv_post" id="r_adv_post"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <!--EVALUACIÓN-->
                                                            <div class="tab-pane fade show" id="evaluacion" role="tabpanel" aria-labelledby="evaluacion-tab">
                                                                <form>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <h6 class="t-aten">EVALUACIÓN</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <label class="floating-label-activo-sm" for="resp_comen">Evaluación (Comentarios)</label>
                                                                            <textarea type="text" class="form-control form-control-sm"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="resp_comen" id="resp_comen"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <label class="floating-label-activo-sm" for="ex_resp_descrip">Conclusión Ex. Tórax (Descripción)</label>
                                                                            <textarea type="text" class="form-control form-control-sm"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="ex_resp_descrip" id="ex_resp_descrip"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <label class="floating-label-activo-sm"for="resp_desc_obj">Objs. y tto. (Descripción)</label>
                                                                            <textarea type="text" class="form-control form-control-sm"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="resp_desc_obj" id="resp_desc_obj"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--DIAGNÓSTICO Y PLAN DE TRATAMIENTO-->
                            @include('atencion_otros_prof.secciones_especialidad.includes.generales.dg_plan')

                            <!--Interconsulta / examen /informe-->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card-a pt-3 pb-3">
                                    <div class="row px-2">
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <button type="button" class="btn btn-primary-light-c btn-block btn-sm mt-1" onclick="interkine();"><i class="feather icon-plus"></i> Indicar interconsulta</button>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <button type="button" class="btn btn-primary-light-c btn-block btn-sm mt-1" onclick="informekine();"><i class="feather icon-plus"></i> Enviar informe</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--GUARDAR-->
                        <div class="row mb-3">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                <button type="button" class="btn btn-info mt-1"><i class="feather icon-save"></i> Guardar ficha y finalizar consulta</button>
                                <button type="button" class="btn btn-purple mt-1"><i class="feather icon-calendar"></i> Guardar ficha e ir a la agenda</button>
                            </div>
                        </div>
                    </div>

                    <!--CONTROLES KINESIOLÓGICOS-->
                    <div class="tab-pane fade show" id="controles" role="tabpanel" aria-labelledby="controles-tab">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-inline">
                                <h6 class="f-18 text-c-blue d-inline">Controles kinesiológicos</h6>
                                <h6 class="float-right d-inline text-c-blue f-14"><label id="f_cont_kine">FECHA CONTROL</label>
                                    <script>
                                    date = new Date().toLocaleDateString();
                                    document.write(date);
                                    </script>
                                </h6>
                            </div>
                        </div>
                        <!--SESIÓN-->
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                                                <h6 class="text-c-blue">SESIÓN</h6>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                <label class="floating-label-activo-sm" for="cont_n_sesion">N° sesión</label>
                                                <input type="text" class="form-control form-control-sm" name="cont_n_sesion" id="cont_n_sesion">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                <label class="floating-label-activo-sm" for="cont_trabajo_en">Trabajo en</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="cont_trabajo_en" id="cont_trabajo_en"></textarea>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                <label class="floating-label-activo-sm" for="cont_colaboracion">Colaboración</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="cont_colaboracion" id="cont_colaboracion"></textarea>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                <label class="floating-label-activo-sm" for="cont_obj">¿Se logra objetivo?</label>
                                                <select class="form-control form-control-sm" name="cont_obj" id="cont_obj">
                                                    <option value="1">Si</option>
                                                    <option value="2">No</option>
                                                    <option value="3">Parcialmente</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--TRATAMIENTO-->
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2 mt-2">
                                                <h6 class="float-left d-inline text-c-blue">TRATAMIENTO </h6>
                                                <button type="button" class="btn btn-info-light-c float-right d-inline btn-sm btn-agregar-tratamiento" ><i class="feather icon-plus"></i> Añadir tratamiento</button>
                                            </div>
                                        </div>
                                        <div id="contenedor_tratamiento">
                                            <div id="tratamiento">
                                                <form>
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                            <label class="floating-label-activo-sm" for="tipo_trat">Tipo Tratamiento</label>
                                                            <select class="form-control form-control-sm" name="tipo_trat" id="tipo_trat">
                                                                <option value="1">Seleccione</option>
                                                                <option value="2">Crioterapia</option>
                                                                <option value="3">Galvanismo</option>
                                                                <option value="4">Hidroterapia</option>
                                                                <option value="5">Humidificación</option>
                                                                <option value="6">Infrarrojo</option>
                                                                <option value="7">Láser</option>
                                                                <option value="8">lontoferesis</option>
                                                                <option value="9">Magnetoterapia</option>
                                                                <option value="10">Nebulizadores comunes</option>
                                                                <option value="11">Nebulizadores ultrasónicos</option>
                                                                <option value="12">Onda corta</option>
                                                                <option value="13">Ultrasonoterapia</option>
                                                                <option value="14">Ultravioleta</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                                            <label class="floating-label-activo-sm" for="r_comentario">Respuesta y comentarios de tratamiento</label>
                                                            <textarea type="text" class="form-control form-control-sm"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="r_comentario" id="r_comentario"></textarea>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--EXÁMENES-->
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                        	<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                                            	<h6 class="text-c-blue">EXÁMENES </h6>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            	<div class="dropdown">
            									  <button class="btn btn-primary-light-c btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
            									    <i class="feather icon-plus"></i> Abrir fichas
            									  </button>
            									  <div class="dropdown-menu">
            									    <a class="dropdown-item" onclick="pares();">+ Pares craneanos</a>
            									    <a class="dropdown-item" onclick="postura_m();">+ Examen motor postura</a>
            									    <a class="dropdown-item" onclick="metria();">+ Metría</a>
            									    <a class="dropdown-item" onclick="fuerza_sup();">+ Examen fuerza extremidad superior</a>
            									    <a class="dropdown-item" onclick="fuerza_inf();">+ Examen fuerza extremidad inferior</a>
            									    <a class="dropdown-item" onclick="tono();">+ Examen Nervios Motores</a>
                                                    <a class="dropdown-item" onclick="reflejos();">+ Reflejos</a>
            									    <a class="dropdown-item" onclick="sensibilidad ();">+ Sensibilidad</a>
            									    <a class="dropdown-item" onclick="func_global();">+ Función global</a>
            									    <a class="dropdown-item" onclick="informekine();">+ Informe kinesiología</a>
            									  </div>
            									</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--GUARDAR-->
                        <div class="row mb-3">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                <button type="button" class="btn btn-purple"><i class="feather icon-save"></i> Guardar control</button>
                            </div>
                        </div>
                     </div>
                    <!--HISTORICO DE CONTROLES KINESIOLÓGICOS-->
                    <div class="tab-pane fade show" id="historial-atencion" role="tabpanel" aria-labelledby="historial-atencion-tab">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-inline">
                                <h6 class="f-18 text-c-blue mb-2">Histórico de controles</h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                             <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <div style="overflow-x:auto;">
                                                    <div class="table-responsive">
                                                        <table  class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th class="align-middle">Fecha</th>
                                                                    <th class="align-middle">Sesion N°</th>
                                                                    <th class="align-middle">Sesiones Faltantes</th>
                                                                    <th class="align-middle">Trabajo en</th>
                                                                    <th class="align-middle">Objetivo Logrado?</th>
                                                                    <th class="align-middle">Técnicas</th>
                                                                    <th class="align-middle">Controles</th>
                                                                    <th class="align-middle">Documentos</th>
                                                                    <th class="align-middle">Informes Finales</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="align-middle">23/03/2020</td>
                                                                    <td class="align-middle">1</td>
                                                                    <td class="align-middle">9</td>
                                                                    <td class="align-middle">Hombro Der</td>
                                                                    <td class="align-middle">Si</td>
                                                                    <td class="align-middle">Ultrasonido</td>
                                                                    <td class="align-middle">
                                                                        <button class="btn btn-info-light btn-xxs"><i class="feather icon-file-text"></i> Ver control</button>
                                                                    </td>
                                                                    <td class="text-center align-middle">
                                                                        <button class="btn btn-warning-light btn-xxs"><i class="feather icon-folder"></i> Ver archivo</button>
                                                                    </td>
                                                                    <td class="text-center align-middle">
                                                                        <button class="btn btn-purple-light btn-xxs"><i class="feather icon-file-plus"></i> Ver informe</button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center align-middle">30/03/2020</td>
                                                                    <td class="text-center align-middle">2</td>
                                                                    <td class="text-center align-middle">8</td>
                                                                    <td class="text-center align-middle">Hombro Der</td>
                                                                    <td class="text-center align-middle">Si</td>
                                                                    <td class="text-center align-middle">Ultrasonido</td>
                                                                    <td class="text-center align-middle">
                                                                        <button href="#!" class="btn btn-info-light btn-xxs"><i class="feather icon-file-text"></i> Ver control</button>
                                                                    </td>
                                                                    <td class="text-center align-middle">
                                                                        <button href="#!" class="btn btn-warning-light btn-xxs"><i class="feather icon-folder"></i> Ver archivo</button>
                                                                    </td>
                                                                    <td class="text-center align-middle">
                                                                        <button href="#!" class="btn btn-purple-light btn-xxs"><i class="feather icon-file-plus"></i> Ver informe</button>
                                                                    </td>
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
                </div>
            </div>
        </div>
    </div>
</div>
<script>
     /** cargar articulacion */
     function agregarArticulacion(){
        var html = '';
            html += '<div id="contenedor_grupo_articulacion">';
            html += '<div id="grupo_articulacion">';
            html += '<form>';
            html += '   <div class="form-row">';
            html += '       <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
            html += '           <div class="form-group">';
            html += '               <label class="floating-label-activo-sm">Articulación</label>';
            html += '               <input type="text" class="form-control form-control-sm" name="art_nomb" id="art_nomb">';
            html += '           </div>';
            html += '       </div>';
            html += '      <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
            html += '        <div class="form-group">';
            html += '         <label class="floating-label-activo-sm">Dolor</label>';
            html += '         <select name="art_dolor" id="art_dolor" class="form-control form-control-sm">';
            html += '           <option selected  value="1">No</option>';
            html += '           <option value="2">Si</option>';
            html += '         <select>';
            html += '        </div>';
            html += '       </div>';
            html += '       <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
            html += '           <div class="form-group">';
            html += '                <label class="floating-label-activo-sm">Funcionalidad</label>';
            html += '                <select name="func_art" id="func_art" class="form-control form-control-sm">';
            html += '                  <option selected  value="1">Normal</option>';
            html += '                  <option value="2">Alterada</option>';
            html += '                <select>';
            html += '           </div>';
            html += '       </div>';
            html += '       <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
            html += '           <div class="form-group">';
            html += '               <label class="floating-label-activo-sm">Deformaciones</label>';
            html += '               <select name="def_art" id="def_art" class="form-control form-control-sm">';
            html += '                   <option selected  value="1">No</option>';
            html += '                   <option value="2">Si</option>';
            html += '               </select>';
            html += '           </div>';
            html += '       </div>';
            html += '       </div>';
            html += '       <div class="form-row">';
            html += '          <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">';
            html += '              <div class="form-group">';
            html += '                  <label class="floating-label-activo-sm">Observaciones</label>';
            html += '                  <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_artic" id="obs_artic"  placeholder="COMENTARIOS DE ARTICULACIÓN O GRUPO EXAMINADO"></textarea>';
            html += '              </div>';
            html += '           </div>';
            html += '        </div>';
            html += '</form>';

            html += '</div>';
            html += '</div>';
        $('#contenedor_grupo_articulacion').append(html);
    }
    $(document).ready(function(){
        $('.btn-agregar-grupo-articulacion').click(function(){
            agregarArticulacion()();
        });
    });
      /** cargar articulacion */
      function agregarTendones(){
        var html = '';
            html += '<div id="contenedor_grupo_tendones">';
            html += '<div id="grupo_tendones">';
            html += '<form>';
            html += '   <div class="form-row">';
            html += '       <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
            html += '           <div class="form-group">';
            html += '               <label class="floating-label-activo-sm">Tendón</label>';
            html += '               <input type="text" class="form-control form-control-sm" name="tend_nomb" id="tend_nomb">';
            html += '           </div>';
            html += '       </div>';
            html += '      <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
            html += '        <div class="form-group">';
            html += '         <label class="floating-label-activo-sm">Dolor</label>';
            html += '         <select name="tend_dolor" id="tend_dolor" class="form-control form-control-sm">';
            html += '           <option selected  value="1">No</option>';
            html += '           <option value="2">Si</option>';
            html += '         <select>';
            html += '        </div>';
            html += '       </div>';
            html += '       <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
            html += '           <div class="form-group">';
            html += '                <label class="floating-label-activo-sm">Funcionalidad</label>';
            html += '                <select name="func_tend" id="func_tend" class="form-control form-control-sm">';
            html += '                  <option selected  value="1">Normal</option>';
            html += '                  <option value="2">Alterada</option>';
            html += '                <select>';
            html += '           </div>';
            html += '       </div>';
            html += '       <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
            html += '           <div class="form-group">';
            html += '               <label class="floating-label-activo-sm">Deformaciones</label>';
            html += '               <select name="def_tend" id="def_tend" class="form-control form-control-sm">';
            html += '                   <option selected  value="1">No</option>';
            html += '                   <option value="2">Si</option>';
            html += '               </select>';
            html += '           </div>';
            html += '       </div>';
            html += '       </div>';
            html += '       <div class="form-row">';
            html += '          <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">';
            html += '              <div class="form-group">';
            html += '                  <label class="floating-label-activo-sm">Observaciones</label>';
            html += '                  <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tend" id="obs_tend" placeholder="COMENTARIOS DE TENDÓN O GRUPO EXAMINADO"></textarea>';
            html += '              </div>';
            html += '           </div>';
            html += '        </div>';
            html += '</form>';

            html += '</div>';
            html += '</div>';
        $('#contenedor_grupo_tendones').append(html);
    }
    $(document).ready(function(){
        $('.btn-agregar-grupo-tendones').click(function(){
            agregarTendones()();
        });
    });
</script>
@section('page-script-ficha-atencion')
<script>
    function cargarIgual(input)
    {
        let actual = $('#'+input);
        let equivalentes = $('#'+input).attr('data-input_igual').split(',');
        $.each(equivalentes, function( index, value ) {
            var equivalente = $('#'+value);
            equivalente.val(actual.val());
        });
    }
    /** CARGAR mensaje */
    $('#mensaje_ficha').html(' Solo el campo dignóstico es Obligatorio el resto es  opcional');
    $('#mensaje_ficha').show();
    setTimeout(function(){
        $('#mensaje_ficha').hide();
    }, 5000);
</script>
<script>

    function agregarTratamientoKine(){
       var html = '';
        html += '<div id="contenedor_tratamiento">';
        html += '<div id="tratamiento">';
        html += '<form>';
        html += '<div class="form-row">';
        html += '<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">';
        html += '<div class="form-group">';
        html += '<label class="floating-label-activo-sm">Tipo Tratamiento</label>';
        html += '<select class="form-control form-control-sm" name="kine_tto_tratamiento" id="kine_tto_tratamiento">';
        html += '<option value="1">Seleccione</option>';
        html += '<option value="2">Crioterapia</option>';
        html += '<option value="3">Galvanismo</option>';
        html += '<option value="4">Hidroterapia</option>';
        html += '<option value="5">Humidificación</option>';
        html += '<option value="6">Infrarrojo</option>';
        html += '<option value="7">Láser</option>';
        html += '<option value="8">lontoferesis</option>';
        html += '<option value="9">Magnetoterapia</option>';
        html += '<option value="10">Nebulizadores comunes</option>';
        html += '<option value="11">Nebulizadores ultrasónicos</option>';
        html += '<option value="12">Onda corta</option>';
        html += '<option value="13">Ultrasonoterapia</option>';
        html += '<option value="14">Ultravioleta</option>';
        html += '</select>';
        html += '</div>';
        html += '</div>';
        html += '<div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">';
        html += '<div class="form-group">';
        html += '<label class="floating-label-activo-sm">Respuesta y comentarios de tratamiento</label>';
        html += '<textarea type="text" class="form-control form-control-sm"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="Kine_ttorespuesta_comentario" id="Kine_ttorespuesta_comentario"></textarea>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
       $('#contenedor_tratamiento').append(html);
   }
   $(document).ready(function(){
       $('.btn-agregar-tratamiento').click(function(){
        agregarTratamientoKine();
       });
   });
function examenes_kine() {
    $('#indicar_examen_kine').modal('show');
}
function evaluar_para_carga_detalle(select, div, input, valor)
{
    var valor_select = $('#'+select+'').val();
    if(valor_select == valor) $('#'+div+'').show();
    else {
        $('#'+div+'').hide();
        $('#'+input+'').val('');
    }
}
</script>
@endsection


