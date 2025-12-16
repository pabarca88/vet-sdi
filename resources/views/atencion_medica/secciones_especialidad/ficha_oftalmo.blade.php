<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2 ">
        <div class="row mx-0">
            <div class="col-sm-12 col-md-12">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="oft" role="tablist">
                    <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="atencion_oft-tab" data-toggle="tab" href="#atencion_oft" role="tab" aria-controls="atencion_oft" aria-selected="true">Atención especialidad</a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="alert-atencion alert alert-warning-b alert-dismissible fade show" role="alert" id="mensaje_ficha"></div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <form action="{{ route('fichaAtencion.registrar_ficha_oft') }}" method="POST">
                    <input type="hidden" name="examenes" id="examenes" value="{!! old('examenes') !!}">
                    <input type="hidden" name="examenes_esp" id="examenes_esp" value="{!! old('examenes_esp') !!}">
                    <input type="hidden" name="medicamentos" id="medicamentos" value="{!! old('medicamentos') !!}">
                    <input type="hidden" name="hora_medica" id="hora_medica" value="{{ $hora_medica->id }}">
                    <input type="hidden" name="id_fc" value="{{ $id_ficha_atencion }}" id="id_fc">
                    <input type="hidden" name="id_paciente_fc" value="{{ $paciente->id }}" id="id_paciente_fc">
                    <input type="hidden" name="rut_paciente_fc" value="{{ $paciente->rut }}" id="rut_paciente_fc">
                    <input type="hidden" name="prevision_paciente_fc" value="{{ $paciente->prevision->id }}" id="prevision_paciente_fc">
                    <input type="hidden" name="id_profesional_fc" value="{{ $profesional->id }}" id="id_profesional_fc">
                    <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="{{ $id_lugar_atencion }}">
                    <input type="hidden" name="cerrarsession" id="cerrarsession" value="0">
                    <input type="hidden" name="mostrarpdf" id="mostrarpdf" value="0">
                    <input type="hidden" name="tipopdf" id="tipopdf" value="0">
                    <input type="hidden" name="input_lista_imagenes" id="input_lista_imagenes" value="">

                    @csrf
                    <div class="tab-content" id="oftalmo-contenido">
                        <!--ATENCIÓN ESPECIALIDAD GENERAL-->
                        <div class="tab-pane fade show active" id="atencion_oft" role="tabpanel" aria-labelledby="atencion_oft-tab">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
                                    <!--FORMULARIOS-->
                                    <div class="row">

                                        <!--Formulario / Menor de edad-->
										@include('general.secciones_ficha.seccion_menor', ['tipo_ficha' => "1"])
										<!--Cierre: Formulario / Menor de edad-->

                                        <!--Motivo consulta-->
                                        @include('general.secciones_ficha.motivo')

                                        <!--EXAMEN ESPECIALIDAD - PARAMETROS DE CONTROL-->
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="card-a">
                                                <div class="card-header-a" id="exam_esp">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#exam_esp_c" aria-expanded="false" aria-controls="exam_esp_c">
                                                        Examen especialidad
                                                    </button>
                                                </div>
                                                <div id="exam_esp_c" class="collapse" aria-labelledby="exam_esp" data-parent="#exam_esp">
                                                    <div class="card-body-aten-a shadow-none">
                                                        <div id="form-oftalmologia-adulto">
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <ul class="nav nav-tabs-aten nav-fill mb-2" id="cg_adulto" role="tablist">
                                                                        <li class="nav-item">
                                                                            <a class="nav-link-aten text-reset active" id="oft_examen_gen_tab" data-toggle="tab" href="#oft_examen_gen" role="tab" aria-controls="oft_examen_gen" aria-selected="true">Examen general</a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link-aten text-reset" id="examen_biomicroscop-tab" data-toggle="tab" href="#examen_biomicroscop" role="tab" aria-controls="examen_biomicroscop" aria-selected="true">Biomicroscopía</a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link-aten text-reset" id="fondo_ojo-tab" data-toggle="tab" href="#fondo_ojo" role="tab" aria-controls="fondo_ojo" aria-selected="true">Fondo de ojo</a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link-aten text-reset" id="ex_plan_tto-tab" data-toggle="tab" href="#ex_plan_tto" role="tab" aria-controls="ex_plan_tto" aria-selected="false">Planificación de Tratamiento</a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link-aten text-reset" id="in-hosp-tab" data-toggle="tab" href="#in-hosp" role="tab" aria-control="in-hosp" aria-selected="false">Hospitalización</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <div class="tab-content" id="oftalmologia_adulto">
                                                                        <!--EXAMEN  GEN-->
                                                                        <div class="tab-pane fade show active" id="oft_examen_gen" role="tabpanel" aria-labelledby="oft_examen_gen_tab">
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-2">
                                                                                    <div class="nav flex-column nav-pills mb-2" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                                        <a class="nav-link-aten text-reset active" id="agudeza_vis-tab" data-toggle="tab" href="#agudeza_vis" role="tab" aria-controls="agudeza_vis" aria-selected="true">Agudeza Visual</a>
                                                                                        <a class="nav-link-aten text-reset" id="ex_mov_oculares-tab" data-toggle="tab" href="#ex_mov_oculares" role="tab" aria-controls="ex_mov_oculares" aria-selected="false">Ex. neurológico</a>
                                                                                        <a class="nav-link-aten text-reset" id="presion_ocular-tab" data-toggle="tab" href="#presion_ocular" role="tab" aria-controls="presion_ocular" aria-selected="false">Presión Ocular</a>
                                                                                        <a class="nav-link-aten text-reset" id="v_colores-tab" data-toggle="tab" href="#v_colores" role="tab" aria-controls="v_colores" aria-selected="false">Test Visión de Colores</a>
                                                                                        <a class="nav-link-aten text-reset" id="test-estrab-tab" data-toggle="tab" href="#test-estrab" role="tab" aria-controls="test-estrab" aria-selected="false">Est. Estrabismo-Test</a>
                                                                                        <a class="nav-link-aten text-reset" id="vergenc-tab" data-toggle="tab" href="#vergenc" role="tab" aria-controls="vergenc" aria-selected="false">Estudio Mov. oculares</a>
                                                                                        <a class="nav-link-aten text-reset" id="campo_visual-tab" data-toggle="tab" href="#campo_visual" role="tab" aria-controls="campo_visual" aria-selected="false">Campo Visual</a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-9 col-lg-9 col-xl-10">
                                                                                    <div class="tab-content" id="v-pills-tabContent">
                                                                                        <div class="tab-pane fade show active" id="agudeza_vis" role="tabpanel" aria-labelledby="agudeza_vis-tab">
                                                                                            <div class="form-row">
                                                                                                 <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                    <h6 class="t-aten">Agudeza visual</h6>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm t-red" for="av_subj_sc_od">Agudeza visual Subj.S/C OD</label>
                                                                                                        <select data-titulo="Agudeza visual Subj.S/C OD"  data-seccion="Agudeza Visual" name="av_subj_sc_od" id="av_subj_sc_od" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('av_subj_sc_od','div_av_subj_sc_od','obs_av_subj_sc_od',19);">
                                                                                                            <option value="0">Seleccione</option>
                                                                                                            <option value="1">1.5</option>
                                                                                                            <option value="2">1.2</option>
                                                                                                            <option value="3" selected>1</option>
                                                                                                            <option value="4">0.9</option>
                                                                                                            <option value="5">0.8</option>
                                                                                                            <option value="6">0.7</option>
                                                                                                            <option value="7">0.6</option>
                                                                                                            <option value="8">0.5</option>
                                                                                                            <option value="9">0.4</option>
                                                                                                            <option value="10">0.3</option>
                                                                                                            <option value="11">0.2</option>
                                                                                                            <option value="12">0.1</option>
                                                                                                            <option value="13">0.05</option>
                                                                                                            <option value="14">Cuenta Dedos</option>
                                                                                                            <option value="15">Mov manos</option>
                                                                                                            <option value="16">Luz buena proyección</option>
                                                                                                            <option value="17">Luz mala proyección</option>
                                                                                                            <option value="18">No percibe Luz</option>
                                                                                                            <option value="19">Otros (anotar)</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_av_subj_sc_od" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm t-red" for="obs_av_subj_sc_od">Obs. Agudeza visual Subj.S/C OD <i>(describir)</i></label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Agudeza visual Subj.S/C OD" data-seccion="Agudeza Visual" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_av_subj_sc_od" id="obs_av_subj_sc_od"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm t-blue" for="av_subj_sc_oi">Agudeza visual Subj.S/C OI</label>
                                                                                                        <select data-titulo="Agudeza visual Subj. OD"  data-seccion="Agudeza Visual" name="av_subj_sc_oi" id="av_subj_sc_oi" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('av_subj_sc_oi','div_av_subj_sc_oi','obs_av_subj_sc_oi',19);">
                                                                                                            <option value="0">Seleccione</option>
                                                                                                            <option value="1">1.5</option>
                                                                                                            <option value="2">1.2</option>
                                                                                                            <option value="3" selected>1</option>
                                                                                                            <option value="4">0.9</option>
                                                                                                            <option value="5">0.8</option>
                                                                                                            <option value="6">0.7</option>
                                                                                                            <option value="7">0.6</option>
                                                                                                            <option value="8">0.5</option>
                                                                                                            <option value="9">0.4</option>
                                                                                                            <option value="10">0.3</option>
                                                                                                            <option value="11">0.2</option>
                                                                                                            <option value="12">0.1</option>
                                                                                                            <option value="13">0.05</option>
                                                                                                            <option value="14">Cuenta Dedos</option>
                                                                                                            <option value="15">Mov manos</option>
                                                                                                            <option value="16">Luz buena proyección</option>
                                                                                                            <option value="17">Luz mala proyección</option>
                                                                                                            <option value="18">No percibe Luz</option>
                                                                                                            <option value="19">Otros (anotar)</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_av_subj_sc_oi" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm t-blue" for="obs_av_subj_sc_oi">Obs. Agudeza visual Subj.S/C OI <i>(describir)</i></label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Agudeza visual Subj. OI" data-seccion="Agudeza Visual" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_av_subj_sc_oi" id="obs_av_subj_sc_oi"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm t-red" for="av_cc_od">Agudeza visual C/C. OD</label>
                                                                                                        <select data-titulo="Agudeza visual Subj.CC/ OD"  data-seccion="Agudeza Visual" name="av_cc_od" id="av_cc_od" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('av_cc_od','div_av_cc_od','obs_av_cc_od',19);">
                                                                                                            <option value="0">Seleccione</option>
                                                                                                            <option value="1">1.5</option>
                                                                                                            <option value="2">1.2</option>
                                                                                                            <option value="3" selected>1</option>
                                                                                                            <option value="4">0.9</option>
                                                                                                            <option value="5">0.8</option>
                                                                                                            <option value="6">0.7</option>
                                                                                                            <option value="7">0.6</option>
                                                                                                            <option value="8">0.5</option>
                                                                                                            <option value="9">0.4</option>
                                                                                                            <option value="10">0.3</option>
                                                                                                            <option value="11">0.2</option>
                                                                                                            <option value="12">0.1</option>
                                                                                                            <option value="13">0.05</option>
                                                                                                            <option value="14">Cuenta Dedos</option>
                                                                                                            <option value="15">Mov manos</option>
                                                                                                            <option value="16">Luz buena proyección</option>
                                                                                                            <option value="17">Luz mala proyección</option>
                                                                                                            <option value="18">No percibe Luz</option>
                                                                                                            <option value="19">Otros (anotar)</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_av_cc_od" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm t-red" for="obs_av_cc_od">Obs. Agudeza visual C/C. OD <i>(Describir)</i></label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Agudeza visual Obj. OD" data-seccion="Agudeza Visual" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_av_cc_od" id="obs_av_cc_od"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                               <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm t-blue" for="av_cc_oi">Agudeza visual  C/C OI</label>
                                                                                                        <select data-titulo="Agudeza visual  C/C OI"  data-seccion="Agudeza Visual" name="av_cc_oi" id="av_cc_oi" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('av_cc_oi','div_av_cc_oi','obs_av_cc_oi',19);">
                                                                                                            <option value="0">Seleccione</option>
                                                                                                            <option value="1">1.5</option>
                                                                                                            <option value="2">1.2</option>
                                                                                                            <option value="3" selected>1</option>
                                                                                                            <option value="4">0.9</option>
                                                                                                            <option value="5">0.8</option>
                                                                                                            <option value="6">0.7</option>
                                                                                                            <option value="7">0.6</option>
                                                                                                            <option value="8">0.5</option>
                                                                                                            <option value="9">0.4</option>
                                                                                                            <option value="10">0.3</option>
                                                                                                            <option value="11">0.2</option>
                                                                                                            <option value="12">0.1</option>
                                                                                                            <option value="13">0.05</option>
                                                                                                            <option value="14">Cuenta Dedos</option>
                                                                                                            <option value="15">Mov manos</option>
                                                                                                            <option value="16">Luz buena proyección</option>
                                                                                                            <option value="17">Luz mala proyección</option>
                                                                                                            <option value="18">No percibe Luz</option>
                                                                                                            <option value="19">Otros (anotar)</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_av_cc_oi" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm t-blue" for="obs_av_cc_oi">Obs. Agudeza visual  C/C OI <i>(Describir)</i></label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Agudeza visual  C/C OI" data-seccion="Agudeza Visual" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_av_cc_oi" id="obs_av_cc_oi"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm t-red" for="av_autorefrac_od">Autorrefractometría OD</label>
                                                                                                        <select data-titulo="Autorrefractometría OD" data-seccion="Agudeza Visual" name="av_autorefrac_od" id="av_autorefrac_od" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('av_autorefrac_od','div_av_autorefrac_od','obs_av_autorefrac_od',2);">
                                                                                                            <option value="1" selected>Normal</option>
                                                                                                            <option value="2">Anormal</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_autorefrac_od" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm t-red" for="obs_av_autorefrac_od">Obs. Autorrefractometría OD <i>(Describir)</i></label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Autorrefractometría OD" data-seccion="Agudeza Visual"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_av_autorefrac_od" id="obs_av_autorefrac_od"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm t-blue" for="av_autorefrac_oi">Autorrefractometría OI</label>
                                                                                                        <select data-titulo="Autorrefractometría OI" data-seccion="Agudeza Visual" name="av_autorefrac_oi" id="av_autorefrac_oi" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('av_autorefrac_oi','div_av_autorefrac_oi','obs_av_autorefrac_oi',2);">
                                                                                                            <option value="1" selected>Normal</option>
                                                                                                            <option value="2">Anormal</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_av_autorefracto_oi" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm t-blue" for="obs_av_autorefrac_oi">Obs.Autorrefractometría OI <i>(Describir)</i></label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs.Autorrefractometría OI "data-seccion="Agudeza Visual"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_av_autorefrac_oi" id="obs_av_autorefrac_oi"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm t-red" for="av_ret_od_cc">Retinoscopía OD C/Ciclo</label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Retinoscopía OD C/Ciclo" data-seccion="Agudeza Visual"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="av_ret_od_cc" id="av_ret_od_cc"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm t-blue" for="av_ret_oi_cc">Retinoscopía OI C/Ciclo</label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Retinoscopía OI C/Ciclo" data-seccion="Agudeza Visual"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="av_ret_oi_cc" id="av_ret_oi_cc"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm t-red" for="av_ret_od_sc">Retinoscopía OD S/Ciclo</label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Retinoscopía OD S/Ciclo" data-seccion="Agudeza Visual"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="av_ret_od_sc" id="av_ret_od_sc"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm t-blue" for="av_ret_oi_sc">Retinoscopía OI S/Ciclo</label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Retinoscopía OI S/Ciclo" data-seccion="Agudeza Visual"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="av_ret_oi_sc" id="av_ret_oi_sc"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm " for="av_add">ADD</label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="ADD" data-seccion="Agudeza Visual"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="av_add" id="av_add"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm " for="av_dip">DIP</label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="DIP" data-seccion="Agudeza Visual"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="av_dip" id="av_dip"></textarea>
                                                                                                    </div>
                                                                                                </div><!--boton para abrir prisma  va a la receta de lentes retinoscopia i y d (solo las sin ciclo) el add el dip y el  prima si esta seleccionado para lentes de cerca y lejos intermedio va en blanco-->
                                                                                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm t-red" for="av_pris_od">Prisma OD</label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Prisma OD" data-seccion="Agudeza Visual"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="av_pris_od" id="av_pris_od"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm t-blue" for="av_pris_oi">Prisma OI</label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Prisma OI" data-seccion="Agudeza Visual"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="av_pris_oi" id="av_pris_oi"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="tab-pane fade " id="ex_mov_oculares" role="tabpanel" aria-labelledby="ex_mov_oculares-tab">
                                                                                            <div class="form-row">
                                                                                                 <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                    <h6 class="t-aten">Exámen neurológico</h6>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm" for="ne_mov_oculares">Movimientos Oculares</label>
                                                                                                        <select data-titulo="Movimientos Oculares" data-seccion="Examen Neurológico" name="ne_mov_oculares" id="ne_mov_oculares" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ne_mov_oculares','div_ne_mov_oculares','obs_ne_mov_oculares',2);">
                                                                                                            <option value="1" selected>Normal</option>
                                                                                                            <option value="2">Anormal</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_ne_mov_oculares" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm" for="obs_ne_mov_oculares">Movimientos Oculares <i>(Describir)</i></label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Movimientos Oculares" data-seccion="Examen Neurológico" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_ne_mov_oculares" id="obs_ne_mov_oculares"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm" for="ne_pupul">Pupilas</label>
                                                                                                        <select data-titulo="Movimientos Oculares" data-seccion="Examen Neurológico" name="ne_pupul" id="ne_pupul" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ne_pupul','div_ne_pupul','obs_ne_pupul',2);">
                                                                                                            <option value="1" selected>Isocoricas</option>
                                                                                                            <option value="2">Anisocoricas</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_ne_pupul" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm" for="obs_ne_pupul">Pupilas <i>(Describir)</i>)</label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Movimientos Oculares" data-seccion="Examen Neurológico" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_ne_pupul" id="obs_ne_pupul"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm" for="ne_rfm">Reflejo FM</label>
                                                                                                        <select name="ne_rfm" data-titulo="Movimientos Oculares" data-seccion="Examen Neurológico" id="ne_rfm" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ne_rfm','div_ne_rfm','obs_ne_rfm',2);">
                                                                                                            <option value="1" selected>Positivo</option>
                                                                                                            <option value="2">Anormal</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_ne_rfm" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm" for="obs_ne_rfm">Reflejo FM <i>(Describir)</i></label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Movimientos Oculares" data-seccion="Examen Neurológico" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_ne_rfm" id="obs_ne_rfm"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm" for="ne_dpar">DPAR</label>
                                                                                                        <select name="ne_dpar" data-titulo="Movimientos Oculares" data-seccion="Examen Neurológico" id="ne_dpar" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ne_dpar','div_ne_dpar','obs_ne_dpar',2);">
                                                                                                            <option value="1" selected>Negativo</option>
                                                                                                            <option value="2">Positivo</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_ne_dpar" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm" for="obs_ne_dpar">DPAR <i>(Describir)</i></label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Movimientos Oculares" data-seccion="Examen Neurológico" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_ne_dpar" id="obs_ne_dpar"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm" for="ne_diplo">Diplopia</label>
                                                                                                        <select name="ne_diplo" data-titulo="Movimientos Oculares" data-seccion="Examen Neurológico" id="ne_diplo" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ne_diplo','div_ne_diplo','obs_ne_diplo',2);">
                                                                                                            <option value="1" selected>Negativo</option>
                                                                                                            <option value="2">Positivo</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_ne_diplo" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm" for="obs_ne_diplo">Diplopia <i>(Describir)</i></label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Movimientos Oculares" data-seccion="Examen Neurológico" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_ne_diplo" id="obs_ne_diplo"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="tab-pane fade" id="presion_ocular" role="tabpanel" aria-labelledby="presion_ocular-tab">
                                                                                            <div class="form-row">
                                                                                                 <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                    <h6 class="t-aten">Presión ocular</h6>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm t-red" for="po_od">Presión Ocular OD</label>
                                                                                                        <select data-titulo="Presion Ocular OD" name="po_od" id="po_od" data-seccion="Presión Ocular"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('po_od','div_po_od','obs_po_od',2);">
                                                                                                            <option value="1" selected>Normal</option>
                                                                                                            <option value="2">Describir</option>
                                                                                                            <option value="3">No Examinada</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_po_od" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm t-red" for="obs_po_od">Presión Ocular OD <i>(Describir)</i></label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Presion Ocular OD" data-seccion="Presión Ocular" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_po_od" id="obs_po_od"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm t-red" for="po_val_od">P/O OD <i>(Valor)</i></label>
                                                                                                        <input type="text" class="form-control form-control-sm" data-titulo="Obs. Valor OD" data-seccion="Presión Ocular" name="po_val_od" id="po_val_od">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm t-blue" for="po_oi">Presión Ocular OI</label>
                                                                                                        <select name="po_oi" data-titulo="Presion_Ocular_OI" data-seccion="Presión Ocular" id="po_oi" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('po_oi','div_po_oi','obs_po_oi',2);">
                                                                                                            <option value="1" selected>Normal</option>
                                                                                                            <option value="2">Describir</option>
                                                                                                            <option value="3">No Examinada</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_po_oi" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm t-blue" for="obs_po_oi">Presión Ocular OI <i>(Describir)</i></label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Presion_Ocular_OI" data-seccion="Presión Ocular" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_po_oi" id="obs_po_oi"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm t-blue" for="po_val_oi">P/O OI <i>(Valor)</i></label>
                                                                                                        <input type="text" class="form-control form-control-sm" data-titulo="Obs. Valor OI" data-seccion="Presión Ocular" name="po_val_oi" id="po_val_oi">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="tab-pane fade" id="v_colores" role="tabpanel" aria-labelledby="v_colores-tab">
                                                                                            <div class="form-row">
                                                                                                 <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                    <h6 class="t-aten">Test visión de colores</h6>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm t-red" for="v_col_test">Visión de colores</label>
                                                                                                        <select name="v_col_test" data-titulo="Visión de colores" id="v_col_test" data-seccion="Visión de Colores"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('v_col_test','div_v_col_test','obs_v_col_test',2);">
                                                                                                            <option value="1" selected>Normal</option>
                                                                                                            <option value="2"> Anormal (Describir)</option>
                                                                                                            <option value="3">No Examinada</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_v_col_test" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm t-red" for="obs_v_col_test">Visión de colores<i>(Describir)</i></label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Visión de colores" data-seccion="Visión de Colores" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_v_col_test" id="obs_v_col_test"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm t-blue" for="tipo_v_col">Tipos</label>
                                                                                                        <select name="tipo_v_col" data-titulo="Tipos" data-seccion="Visión de Colores" id="tipo_v_col" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tipo_v_col','div_tipo_v_col','obs_tipo_v_col',2);">
                                                                                                            <option value="1" selected>ISHIHARA</option>
                                                                                                            <option value="2"> Otros</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_tipo_v_col" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm t-blue" for="obs_tipo_v_col">Otros tipos <i>(Describir)</i></label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Otros Tipos" data-seccion="Visión de Colores" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tipo_v_col" id="obs_tipo_v_col"></textarea>
                                                                                                    </div>
                                                                                                </div>

                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="tab-pane fade" id="test-estrab" role="tabpanel" aria-labelledby="test-estrab-tab">
                                                                                            <div class="form-row">
                                                                                                 <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                    <h6 class="t-aten">Est. Estrabismo-Test</h6>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm" for="est_ct_int">Cover-test Intermitente</label>
                                                                                                        <select name="est_ct_int" data-titulo="Cover-test Intermitente" data-seccion="Test Estrabismo" id="est_ct_int" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('est_ct_int','div_est_ct_int','obs_est_ct_int',2);">
                                                                                                            <option value="1" selected>Normal</option>
                                                                                                            <option value="2">Anormal</option>
                                                                                                            <option value="3">No Examinado</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_est_ct_int" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm" for="obs_est_ct_int">Obs. Cover-test Intermitente</label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Cover-test Intermitente" data-seccion="Test Estrabismo" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_est_ct_int" id="obs_est_ct_int"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm" for="est_ct_alt">Cover-test Alternante</label>
                                                                                                        <select name="est_ct_alt" data-titulo="Obs. Cover-test Alternante" data-seccion="Test Estrabismo" id="est_ct_alt" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('est_ct_alt','div_est_ct_alt','obs_est_ct_alt',2);">
                                                                                                            <option value="1" selected>Normal</option>
                                                                                                            <option value="2">Anormal</option>
                                                                                                            <option value="3">No Examinado</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_est_ct_alt" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm" for="obs_est_ct_alt">Obs.Cover-test Alternante</label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Cover-test Alternante" data-seccion="Test Estrabismo" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_est_ct_alt" id="obs_est_ct_alt"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm" for="est_ct_prisma">Cover-test Prisma</label>
                                                                                                        <select name="est_ct_prisma" data-titulo="Cover-test Prisma" data-seccion="Test Estrabismo" id="est_ct_prisma" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('est_ct_prisma','div_est_ct_prisma','obs_est_ct_prisma',2);">
                                                                                                            <option value="1" selected>Normal</option>
                                                                                                            <option value="2">Anormal</option>
                                                                                                            <option value="3">No Examinado</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_est_ct_prisma" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm" for="obs_est_ct_prisma">Obs.Cover-test Prisma</label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Cover-test Prisma" data-seccion="Test Estrabismo" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_est_ct_prisma" id="obs_est_ct_prisma"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm" for="est_test_hirsch">Test de Hirschberg</label>
                                                                                                        <select name="est_test_hirsch" data-titulo="Test de Hirschberg" data-seccion="Test Estrabismo" id="est_test_hirsch" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('est_test_hirsch','div_est_test_hirsch','obs_est_test_hirsch',2);">
                                                                                                            <option value="1" selected>Normal</option>
                                                                                                            <option value="2">Anormal</option>
                                                                                                            <option value="3">No Examinado</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_est_test_hirsch" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm" for="obs_est_test_hirsch">Obs.Test de Hirschberg</label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Test de Hirschberg" data-seccion="Test Estrabismo" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_est_test_hirsch" id="obs_est_test_hirsch"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm" for="est_Krim">Test de Krimsky</label>
                                                                                                        <select name="est_Krim" data-titulo="Test de Krimsky" data-seccion="Test Estrabismo" id="est_Krim"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('est_Krim','div_est_Krim','obs_est_Krim',2);">
                                                                                                            <option value="1" selected>Normal</option>
                                                                                                            <option value="2">Anormal</option>
                                                                                                            <option value="3">No Examinado</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_est_Krim" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm" for="obs_est_Krim">Obs.Test de Krimsky </label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Test de Krimsky" data-seccion="Test Estrabismo" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_est_Krim" id="obs_est_Krim"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                                                                                    <label class="floating-label-activo-sm" for="est_ot_est">Otros Estudios</label>
                                                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs. Otros Estudios" data-seccion="Test Estrabismo" id="est_ot_est" name="est_ot_est"  rows="1" onfocus="this.rows=4"  onblur="this.rows=1;"></textarea>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                    <div class="form-group fill">
                                                                                                        <label class="floating-label-activo-sm" for="obs_est_estr">Observaciones Estudio Estrabismo</label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Observaciones Estudio Estrabismo" data-seccion="Test Estrabismo" id="obs_est_estr" name="obs_est_estr"  rows="1" onfocus="this.rows=4"  onblur="this.rows=1;"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="tab-pane fade" id="vergenc" role="tabpanel" aria-labelledby="vergenc-tab">
                                                                                            <div class="form-row">
                                                                                                 <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                    <h6 class="t-aten">Estudio Movimientos oculares</h6>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm" for="ducciones">Ducciones</label>
                                                                                                        <select name="ducciones" data-titulo="Campo Visual OD" data-seccion="Mov. Oculares" id="ducciones" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ducciones','div_ducc','obs_ducc',2);">
                                                                                                            <option value="1" selected>Normal</option>
                                                                                                            <option value="2">Anormal</option>
                                                                                                            <option value="3">No Examinado</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_ducc" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm" for="obs_ducc">Observaciones</label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Campo Visual OD" data-seccion="Mov. Oculares" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_ducc" id="obs_ducc"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm" for="versiones">Versiones</label>
                                                                                                        <select name="versiones" data-titulo="Campo Visual OI" data-seccion="Mov. Oculares" id="versiones"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('versiones','div_versiones','obs_versiones',2);">
                                                                                                            <option value="1" selected>Normal</option>
                                                                                                            <option value="2">Anormal</option>
                                                                                                            <option value="3">No Examinado</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_versiones" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm" for="obs_versiones">Observaciones</label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Campo Visual OI" data-seccion="Mov. Oculares" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_versiones" id="obs_versiones"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm" for="vergencia">Vergencia</label>
                                                                                                        <select name="vergencia" data-titulo="Campo Visual OI" data-seccion="Mov. Oculares" id="vergencia"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('vergencia','div_vergencia','obs_vergencia',2);">
                                                                                                            <option value="1" selected>Normal</option>
                                                                                                            <option value="2">Anormal</option>
                                                                                                            <option value="3">No Examinado</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_vergencia" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm" for="obs_vergencia">Observaciones</label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Campo Visual OI" data-seccion="Mov. Oculares" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_vergencia" id="obs_vergencia"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm" for="estereop">Estereopsis</label>
                                                                                                        <select name="estereop" data-titulo="Campo Visual OI" data-seccion="Mov. Oculares" id="estereop"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('estereop','div_estereop','obs_estereop',2);">
                                                                                                            <option value="1" selected>Normal</option>
                                                                                                            <option value="2">Anormal</option>
                                                                                                            <option value="3">No Examinado</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_estereop" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm" for="obs_estereop">Observaciones</label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Campo Visual OI" data-seccion="Mov. Oculares" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_estereop" id="obs_estereop"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="tab-pane fade" id="campo_visual" role="tabpanel" aria-labelledby="campo_visual-tab">
                                                                                            <div class="form-row">
                                                                                                 <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                    <h6 class="t-aten">Campo visual</h6>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm t-red" for="campo_visual_od">Campo Visual OD</label>
                                                                                                        <select name="campo_visual_od" data-titulo="Campo Visual OD" data-seccion="Campo Visual" id="campo_visual_od" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('campo_visual_od','div_campo_visual_od','obs_campo_visual_od',2);">
                                                                                                            <option value="1" selected>Normal</option>
                                                                                                            <option value="2">Anormal</option>
                                                                                                            <option value="3">No Examinado</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_campo_visual_od" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm t-red" for="obs_campo_visual_od">Campo Visual OD</label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Campo Visual OD" data-seccion="Campo Visual" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_campo_visual_od" id="obs_campo_visual_od"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm t-blue" for="campo_visual_oi">Campo Visual OI</label>
                                                                                                        <select name="campo_visual_oi" data-titulo="Campo Visual OI" data-seccion="Campo Visual" id="campo_visual_oi"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('campo_visual_oi','div_campo_visual_oi','obs_campo_visual_oi',2);">
                                                                                                            <option value="1" selected>Normal</option>
                                                                                                            <option value="2">Anormal</option>
                                                                                                            <option value="3">No Examinado</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_campo_visual_oi" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm t-blue" for="obs_campo_visual_oi">Campo Visual OI</label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Campo Visual OI" data-seccion="Campo Visual" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_campo_visual_oi" id="obs_campo_visual_oi"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm" for="otros_ex_general">Otros antecedentes importantes</label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Otros Antecedentes Importantes" data-seccion="Campo Visual" id="otros_ex_general" name="otros_ex_general"  rows="1" onfocus="this.rows=4"  onblur="this.rows=1;"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-row">
                                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm" for="obs_ex_generales">Observaciones Generales</label>
                                                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs. Otros Antecedentes Importantes" data-seccion="Mov. Oculares" id="obs_ex_generales" name="obs_ex_generales"  rows="1" onfocus="this.rows=4"  onblur="this.rows=1;"></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-sm-4 col-md-12 col-lg-4 col-xl-4">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Carga ficha tipo</label>
                                                                                        <select class="form-control form-control-sm" id="select_ficha_tipo_especialidad" onchange="cargar_info_ficha_tipo_oft('select_ficha_tipo_especialidad','descripcion_ficha_tipo_especialidad');">
                                                                                            <option value="">Seleccione</option>
                                                                                            @if(!empty($fichaTipo['oft']))
                                                                                                @foreach ($fichaTipo['oft'] as $ft )
                                                                                                    <option value="{{ $ft->id }}" data-descripcion="{{ $ft->descripcion }}">{{ $ft->nombre }}</option>
                                                                                                @endforeach
                                                                                            @endif
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-4 col-md-12 col-lg-4 col-xl-4">
                                                                                    <span id="descripcion_ficha_tipo_especialidad"></span>
                                                                                </div>
                                                                                <div class="col-sm-4 col-md-12 col-lg-4 col-xl-4 mb-3">
                                                                                    <button type="button" class="btn btn-info-light-c btn-sm btn-block" onclick="abrir_modal_guardar_tipo('form-oft-g','registro_f_t_oft_detalle','oft_g');"><i class="feather icon-save"></i> Guardar nueva ficha tipo</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <!--EXAMEN  BIOMICROSCOPIA-->
                                                                        <div class="tab-pane fade show" id="examen_biomicroscop" role="tabpanel" aria-labelledby="examen_biomicroscop-tab">
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-2">
                                                                                    <div class="nav flex-column nav-pills mb-2" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                                        <a class="nav-link-aten-red text-reset active" id="bio_ojo_der-tab" data-toggle="tab" href="#bio_ojo_der" role="tab" aria-controls="bio_ojo_der" aria-selected="true">Ojo Derecho</a>
                                                                                        <a class="nav-link-aten text-reset" id="bio_ojo_izq-tab" data-toggle="tab" href="#bio_ojo_izq" role="tab" aria-controls="bio_ojo_izq" aria-selected="false">Ojo Izquierdo</a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-9 col-lg-9 col-xl-10">
                                                                                    <div class="tab-content" id="v-pills-tabContent">
                                                                                        <div class="tab-pane fade show active" id="bio_ojo_der" role="tabpanel" aria-labelledby="bio_ojo_der-tab">
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                    <h6 class="t-aten-danger">Biomicrocopía ojo derecho</h6>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm t-red" for="parpbiood">Párpados</label>
                                                                                                        <select name="parpbiood" data-titulo="Párpados OD" data-seccion="Biomicroscopía" id="parpbiood" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('parpbiood','div_parpbiood','obs_parpbiood',2);">
                                                                                                            <option value="1" selected>Normales</option>
                                                                                                            <option value="2">Anormales</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_parpbiood" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm t-red">Párpados <i>(Describir)</i></label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Bio Párpados OD" data-seccion="Biomicroscopía"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_parpbiood" id="obs_parpbiood"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm t-red" for="conjuntiva_bio_od">Conjuntivas</label>
                                                                                                        <select name="conjuntiva_bio_od" data-titulo="Conjuntivas OB" data-seccion="Biomicroscopía" id="conjuntiva_bio_od" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('conjuntiva_bio_od','div_conjuntiva_bio_od','obs_conjuntiva_bio_od',2);">
                                                                                                            <option value="1" selected>Normal</option>
                                                                                                            <option value="2">Anormal</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_conjuntiva_bio_od" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm t-red" for="obs_conjuntiva_bio_od">Conjuntivas <i>(Describir)</i></label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Bio Conjuntivas OD" data-seccion="Biomicroscopía"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_conjuntiva_bio_od" id="obs_conjuntiva_bio_od"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm t-red" for="biocornea_od">Córneas</label>
                                                                                                        <select name="biocornea_od" data-titulo="Córneas OD" id="biocornea_od" data-seccion="Biomicroscopía"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('biocornea_od','div_biocornea_od','obs_biocornea_od',2);">
                                                                                                            <option value="1" selected>Claras y completamente epitelizadas</option>
                                                                                                            <option value="2">Anormales</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_biocornea_od" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm t-red" for="obs_biocornea_od">Córneas <i>(Describir)</i></label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Córneas bio OD" data-seccion="Biomicroscopía"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_biocornea_od" id="obs_biocornea_od"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm t-red" for="camara_ant_od">Camara Anterior</label>
                                                                                                        <select name="camara_ant_od" data-titulo="Camara anterior OD" data-seccion="Biomicroscopía"   id="camara_ant_od" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('camara_ant_od','div_camara_ant_od','obs_camara_ant_od',2);">
                                                                                                            <option value="1" selected>Normal</option>
                                                                                                            <option value="2">Anormal</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_camara_ant_od" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm t-red" for="obs_camara_ant_od">Camara Anterior <i>(Describir)</i></label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Camara anterior OD" data-seccion="Biomicroscopía"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_camara_ant_od" id="obs_camara_ant_od"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm t-red" for="tyndall_od">Tyndall</label>
                                                                                                        <select name="tyndall_od" data-titulo="Tyndall OD" data-seccion="Biomicroscopía"  id="tyndall_od" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tyndall_od','div_tyndall_od','obs_tyndall_od',2);">
                                                                                                            <option value="1" selected>Negativo</option>
                                                                                                            <option value="2">Positivo</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_tyndall_od" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm t-red" for="obs_tyndall_od">Tyndall <i>(Describir)</i></label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Tyndall OD" data-seccion="Biomicroscopía"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tyndall_od" id="obs_tyndall_od"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm t-red" for="cristalino_bio_od">Cristalino</label>
                                                                                                        <select name="cristalino_bio_od" data-titulo="Cristalino OD" data-seccion="Biomicroscopía"  id="cristalino_bio_od" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cristalino_bio_od','div_cristalino_bio_od','obs_cristalino_bio_od',2);">
                                                                                                            <option value="1" selected>Claro</option>
                                                                                                            <option value="2">Anormal</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_cristalino_bio_od" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm t-red" for="obs_cristalino_bio_od">Cristalino <i>(Describir)</i></label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Cristalino OD"  data-seccion="Biomicroscopía"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cristalino_bio_od" id="obs_cristalino_bio_od"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="tab-pane fade " id="bio_ojo_izq" role="tabpanel" aria-labelledby="bio_ojo_izq-tab">
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                    <h6 class="t-aten">Biomicrocopía ojo izquierdo</h6>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm t-blue" for="parpbiooi">Párpados</label>
                                                                                                        <select name="parpbiooi" data-titulo="Párpados OI" data-titulo="Párpados OI" data-seccion="Biomicroscopía"  id="parpbiooi" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('parpbiooi','div_parpbiooi','obs_parpbiooi',2);">
                                                                                                            <option value="1" selected>Normales</option>
                                                                                                            <option value="2">Anormales</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_parpbiooi" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm t-blue" for="obs_parpbiooi">Párpados <i>(Describir)</i></label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Párpados OI" data-seccion="Biomicroscopía"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_parpbiooi" id="obs_parpbiooi"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm t-blue" for="conjuntiva_bio_oi">Conjuntivas</label>
                                                                                                        <select name="conjuntiva_bio_oi" data-titulo="Conjuntivas OI" data-seccion="Biomicroscopía"  id="conjuntiva_bio_oi" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('conjuntiva_bio_oi','div_conjuntiva_bio_oi','obs_conjuntiva_bio_oi',2);">
                                                                                                            <option value="1" selected>Normal</option>
                                                                                                            <option value="2">Anormal</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_conjuntiva_bio_oi" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm t-blue" for="obs_conjuntiva_bio_oi">Conjuntivas <i>(Describir)</i></label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Bio Conjuntivas OI" data-seccion="Biomicroscopía" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_conjuntiva_bio_oi" id="obs_conjuntiva_bio_oi"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm t-blue t-blue" for="biocornea_oi">Córneas</label>
                                                                                                        <select name="biocornea_oi" data-titulo="Córneas OI" data-titulo="Córneas OI" data-seccion="Biomicroscopía" id="biocornea_oi" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('biocornea_oi','div_biocornea_oi','obs_biocornea_oi',3);">
                                                                                                            <option value="1">Claras y completamente epitelizadas</option>
                                                                                                            <option value="2">Anormales</option>
                                                                                                            <option value="3">Otros</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_biocornea_oi" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm t-blue" for="obs_biocornea_oi">Córneas <i>(Describir)</i></label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Córneas OI" data-seccion="Biomicroscopía"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_biocornea_oi" id="obs_biocornea_oi"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm t-blue" for="camara_ant_oi">Camara Anterior</label>
                                                                                                        <select name="camara_ant_oi" data-titulo="Camara Anterior OI" data-seccion="Biomicroscopía" id="camara_ant_oi"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('camara_ant_oi','div_camara_ant_oi','obs_camara_ant_oi',2);">
                                                                                                            <option value="Normal" selected>Normal</option>
                                                                                                            <option value="Anormal">Anormal</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_camara_ant_oi" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm t-blue" for="obs_camara_ant_oi">Camara Anterior <i>(Describir)</i></label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Camara Anterior OI" data-seccion="Biomicroscopía" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_camara_ant_oi" id="obs_camara_ant_oi"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm t-blue" for="tyndall_oi">Tyndall</label>
                                                                                                        <select name="tyndall_oi"  data-titulo="Tyndall OI" data-seccion="Biomicroscopía" id="tyndall_oi" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tyndall_oi','div_tyndall_oi','obs_tyndall_oi',2);">
                                                                                                            <option value="Negativo" selected>Negativo</option>
                                                                                                            <option value="Positivo">Positivo</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_tyndall_oi" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm t-blue" for="obs_tyndall_oi">Tyndall <i>(Describir)</i></label>
                                                                                                        <textarea class="form-control form-control-sm"  data-titulo="Obs. Tyndall OI" data-seccion="Biomicroscopía" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tyndall_oi" id="obs_tyndall_oi"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm t-blue" for="cristalino_bio_oi">Cristalino</label>
                                                                                                        <select name="cristalino_bio_oi"  data-titulo="Cristalino OI" data-seccion="Biomicroscopía" id="cristalino_bio_oi" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cristalino_bio_oi','div_cristalino_bio_oi','obs_cristalino_bio_oi',2);">
                                                                                                            <option value="1" selected>Claro</option>
                                                                                                            <option value="2">Anormal</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_cristalino_bio_oi" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm t-blue" for="obs_cristalino_bio_oi">Cristalino <i>(Describir)</i></label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Cristalino OI" data-seccion="Biomicroscopía"rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cristalino_bio_oi" id="obs_cristalino_bio_oi"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-row">
                                                                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                            <label class="floating-label-activo-sm" for="otro">Observaciones Generales</label>
                                                                                            <textarea class="form-control form-control-sm"  data-titulo="Obs. General" data-seccion="Biomicroscopía" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="otro" id="otro"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Carga ficha tipo</label>
                                                                                        <select class="form-control form-control-sm" id="select_ficha_tipo_especialidad_bio" onchange="cargar_info_ficha_tipo_oft_bio('select_ficha_tipo_especialidad_bio','descripcion_ficha_tipo_especialidad_bio');">
                                                                                            <option value="">Seleccione</option>
                                                                                            @if(!empty($fichaTipo['bio']))
                                                                                                @foreach ($fichaTipo['bio'] as $ft )
                                                                                                    <option value="{{ $ft->id }}" data-descripcion="{{ $ft->descripcion }}">{{ $ft->nombre }}</option>
                                                                                                @endforeach
                                                                                            @endif
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                                                    <span id="descripcion_ficha_tipo_especialidad_bio"></span>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mb-3">
                                                                                    <button type="button" class="btn btn-info-light-c btn-sm btn-block" onclick="abrir_modal_guardar_tipo('form-bio','registro_f_t_oft_detalle','bio');"><i class="feather icon-save"></i> Guardar nueva biomicroscopía tipo</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <!--EXAMEN  FONDO DE OJO-->
                                                                        <div class="tab-pane fade show" id="fondo_ojo" role="tabpanel" aria-labelledby="fondo_ojo-tab">
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-2">
                                                                                    <div class="nav flex-column nav-pills mb-2" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                                        <a class="nav-link-aten-red text-reset active" id="fondo_ojo_der-tab" data-toggle="tab" href="#fondo_ojo_der" role="tab" aria-controls="fondo_ojo_der" aria-selected="true">Ojo Derecho</a>
                                                                                        <a class="nav-link-aten text-reset" id="fondo_ojo_izq-tab" data-toggle="tab" href="#fondo_ojo_izq" role="tab" aria-controls="fondo_ojo_izq" aria-selected="false">Ojo Izquierdo</a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-9 col-lg-9 col-xl-10">
                                                                                    <div class="tab-content" id="v-pills-tabContent">
                                                                                        <div class="tab-pane fade show active" id="fondo_ojo_der" role="tabpanel" aria-labelledby="fondo_ojo_der-tab">
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                    <h6 class="t-aten-danger">Fondo de ojo derecho</h6>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm t-red" for="papilas_fo_od">Papilas</label>
                                                                                                        <select name="papilas_fo_od" data-titulo="Papilas" data-seccion="Fondo de Ojo"  id="papilas_fo_od" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('papilas_fo_od','div_papilas_fo_od','obs_papilas_fo_od',2);">
                                                                                                            <option value="1" selected>Normales</option>
                                                                                                            <option value="2">Anormales</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_papilas_fo_od" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm t-red" for="obs_papilas_fo_od">Papilas <i>(Describir)</i></label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Papilas OD"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_papilas_fo_od" id="obs_papilas_fo_od"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm t-red" for="excavacion_fo_od">Excavación</label>
                                                                                                        <select name="excavacion_fo_od" data-titulo="Excavación OD" data-seccion="Fondo de Ojo"  id="excavacion_fo_od" style="color:rgb(241, 13, 74);font-weight: bold;" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('excavacion_fo_od','div_excavacion_fo_od','obs_excavacion_fo_od',12);">
                                                                                                            <option value="1">0</option>
                                                                                                            <option value="2">0.1</option>
                                                                                                            <option value="3">0.2</option>
                                                                                                            <option selected value="4">0.3</option>
                                                                                                            <option value="5">0.4</option>
                                                                                                            <option value="6">0.5</option>
                                                                                                            <option value="7">0.6</option>
                                                                                                            <option value="8">0.7</option>
                                                                                                            <option value="9">0.8</option>
                                                                                                            <option value="10">0.9</option>
                                                                                                            <option value="11">Total</option>
                                                                                                            <option value="12">Otros</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_excavacion_fo_od" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm t-red" for="obs_excavacion_fo_od">Excavación <i>(Describir)</i></label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Excavacion OD" data-seccion="Fondo de Ojo" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_excavacion_fo_od" id="obs_excavacion_fo_od"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm t-red" for="bordes_od">Bordes</label>
                                                                                                        <select name="bordes_od" data-titulo="Bordes_OD" data-seccion="Fondo de Ojo"  id="bordes_od" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('bordes_od','div_bordes_od','obs_bordes_od',2);">
                                                                                                            <option value="1">Bordes netos y Normales</option>
                                                                                                            <option value="2">Anormales</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_bordes_od" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm t-red" for="obs_bordes_od">Bordes <i>(Describir)</i></label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Bordes OD"  data-seccion="Fondo de Ojo" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_bordes_od" id="obs_bordes_od"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm t-red" for="maculas_fo_od">Máculas</label>
                                                                                                        <select name="maculas_fo_od" data-titulo="Maculas_OD" data-seccion="Fondo de Ojo"  id="maculas_fo_od" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('maculas_fo_od','div_maculas_fo_od','obs_maculas_fo_od',2);">
                                                                                                            <option value="1" selected>Normales</option>
                                                                                                            <option value="2">Anormal</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_maculas_fo_od" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm t-red" for="obs_maculas_fo_od">Máculas <i>(Describir)</i></label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Maculas OD"  data-seccion="Fondo de Ojo" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_maculas_fo_od" id="obs_maculas_fo_od"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm t-red" for="vasos_fo_od">Vasos</label>
                                                                                                        <select name="vasos_fo_od" data-titulo="Vasos_OD" data-seccion="Fondo de Ojo" id="vasos_fo_od"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('vasos_fo_od','div_vasos_fo_od','obs_vasos_fo_od',2);">
                                                                                                            <option value="1" selected>Normal</option>
                                                                                                            <option value="2">Anormal</option>vasos_fo_od
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_vasos_fo_od" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm t-red" for="obs_vasos_fo_od">Vaso <i>(Describir)</i>s</label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Vasos OD" data-seccion="Fondo de Ojo" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_vasos_fo_od" id="obs_vasos_fo_od"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm t-red" for="periferia_fo_od">Periféria</label>
                                                                                                        <select name="periferia_fo_od" data-titulo="Periferia_OD" data-seccion="Fondo de Ojo" id="periferia_fo_od" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('periferia_fo_od','div_periferia_fo_od','obs_periferia_fo_od',2);">
                                                                                                            <option value="1" selected>Sana</option>
                                                                                                            <option value="2">Anormal</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_periferia_fo_od" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm t-red" for="obs_periferia_fo_od">Periféria <i>(Describir)</i></label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Periferia OD" data-seccion="Fondo de Ojo" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_periferia_fo_od" id="obs_periferia_fo_od"></textarea>
                                                                                                    </div>
                                                                                                </div>

                                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm" for="campo_fo_otros_od">Otros Antecedentes Importantes</label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Otros Antec. Importantes OD" data-seccion="Fondo de Ojo" id="campo_fo_otros_od" name="campo_fo_otros_od"  rows="1" onfocus="this.rows=2"  onblur="this.rows=1;"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="tab-pane fade " id="fondo_ojo_izq" role="tabpanel" aria-labelledby="fondo_ojo_izq-tab">
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                    <h6 class="t-aten">Fondo de ojo izquierdo</h6>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm t-blue" for="papilas_fo_oi">Papilas</label>
                                                                                                        <select name="papilas_fo_oi" data-titulo="Papilas OI" id="papilas_fo_oi" data-seccion="Fondo de Ojo" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('papilas_fo_oi','div_papilas_fo_oi','obs_papilas_fo_oi',2);">
                                                                                                            <option value="1" selected>Normales</option>
                                                                                                            <option value="2">Anormales</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_papilas_fo_oi" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm t-blue" for="obs_papilas_fo_oi">Papilas <i>(Describir)</i></label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Papilas OI" data-seccion="Fondo de Ojo" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_papilas_fo_oi" id="obs_papilas_fo_oi"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm t-blue" for="excavacion_fo_oi">Excavación</label>
                                                                                                        <select name="excavacion_fo_oi" data-titulo="Excavacion OI" data-seccion="Fondo de Ojo" id="excavacion_fo_oi" style="color:rgb(41, 90, 189);font-weight: bold;" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('excavacion_fo_oi','div_excavacion_fo_oi','obs_excavacion_fo_oi',12);">
                                                                                                            <option value="1">0</option>
                                                                                                            <option value="2">0.1</option>
                                                                                                            <option value="3">0.2</option>
                                                                                                            <option selected value="4">0.3</option>
                                                                                                            <option value="5">0.4</option>
                                                                                                            <option value="6">0.5</option>
                                                                                                            <option value="7">0.6</option>
                                                                                                            <option value="8">0.7</option>
                                                                                                            <option value="9">0.8</option>
                                                                                                            <option value="10">0.9</option>
                                                                                                            <option value="11">Total</option>
                                                                                                            <option value="12">Otros</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_excavacion_fo_oi" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm t-blue" for="obs_excavacion_fo_oi">Excavación <i>(Describir)</i></label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Excavacion OI" data-seccion="Fondo de Ojo" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_excavacion_fo_oi" id="obs_excavacion_fo_oi"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm t-blue" for="bordes_oi">Bordes</label>
                                                                                                        <select name="bordes_oi" data-titulo="Bordes_OI" data-seccion="Fondo de Ojo" id="bordes_oi" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('bordes_oi','div_bordes_oi','obs_bordes_oi',2);">
                                                                                                            <option value="1">Bordes netos y Normales</option>
                                                                                                            <option value="2">Anormales</option>

                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_bordes_oi" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm t-blue" for="obs_bordes_oi">Bordes</label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Bordes OI" data-seccion="Fondo de Ojo" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_bordes_oi" id="obs_bordes_oi"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm t-blue" t-blue for="maculas_fo_oi" >Máculas</label>
                                                                                                        <select name="maculas_fo_oi" data-titulo="Maculas OI" id="maculas_fo_oi" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('maculas_fo_oi','div_maculas_fo_oi','obs_maculas_fo_oi',2);">
                                                                                                            <option value="1" selected>Normales</option>
                                                                                                            <option value="2">Anormal</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_maculas_fo_oi" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm t-blue" for="obs_maculas_fo_oi">Máculas <i>(Describir)</i></label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Maculas OI" data-seccion="Fondo de Ojo" data-seccion="Fondo de Ojo" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_maculas_fo_oi" id="obs_maculas_fo_oi"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm t-blue" for="vasos_fo_oi">Vasos</label>
                                                                                                        <select name="vasos_fo_oi" data-titulo="Vasos_OI" id="vasos_fo_oi" data-seccion="Fondo de Ojo" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('vasos_fo_oi','div_vasos_fo_oi','obs_vasos_fo_oi',2);">
                                                                                                            <option value="1" selected>Normal</option>
                                                                                                            <option value="2">Anormal</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_vasos_fo_oi" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm t-blue" for="obs_vasos_fo_oi">Vasos</label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Vasos OI" data-seccion="Fondo de Ojo"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_vasos_fo_oi" id="obs_vasos_fo_oi"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm t-blue" for="periferia_fo_oi">Periféria</label>
                                                                                                        <select name="periferia_fo_oi" data-titulo="Periferia OI" data-seccion="Fondo de Ojo" id="periferia_fo_oi" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('periferia_fo_oi','div_periferia_fo_oi','obs_periferia_fo_oi',2);">
                                                                                                            <option value="1" selected>Sana</option>
                                                                                                            <option value="2">Anormal</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group" id="div_periferia_fo_oi" style="display:none;">
                                                                                                        <label class="floating-label-activo-sm t-blue" for="obs_periferia_fo_oi">Periféria</label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Periferia OI" data-seccion="Fondo de Ojo" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_periferia_fo_oi" id="obs_periferia_fo_oi"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm" for="campo_fo_otros_oi">Otros Antecedentes Importantes</label>
                                                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Otros Antec. Importantes OI" data-seccion="Fondo de Ojo" id="campo_fo_otros_oi" name="campo_fo_otros_oi"  rows="1" onfocus="this.rows=2"  onblur="this.rows=1;"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-sm-4 col-md-12 col-lg-4 col-xl-4">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Carga ficha tipo</label>
                                                                                        <select class="form-control form-control-sm" id="select_ficha_tipo_especialidad_of" onchange="cargar_info_ficha_tipo_oft_fo('select_ficha_tipo_especialidad_of','descripcion_ficha_tipo_especialidad_of');">
                                                                                            <option value="">Seleccione</option>
                                                                                            @if(!empty($fichaTipo['fo']))
                                                                                                @foreach ($fichaTipo['fo'] as $ft )
                                                                                                    <option value="{{ $ft->id }}" data-descripcion="{{ $ft->descripcion }}">{{ $ft->nombre }}</option>
                                                                                                @endforeach
                                                                                            @endif
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-4 col-md-12 col-lg-4 col-xl-4">
                                                                                    <span id="descripcion_ficha_tipo_especialidad_of"></span>
                                                                                </div>

                                                                                <div class="col-sm-4 col-md-12 col-lg-4 col-xl-4 mb-3">
                                                                                    <button type="button" class="btn btn-info-light-c btn-sm btn-block" onclick="abrir_modal_guardar_tipo('form-fo','registro_f_t_oft_detalle','fo');"><i class="feather icon-save"></i> Guardar nuevo fondo de ojo tipo</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <!--PLAN DE TRATAMIENTO-->
                                                                        <div class="tab-pane fade show" id="ex_plan_tto" role="tabpanel" aria-labelledby="ex_plan_tto-tab">
                                                                            <div class="form-row mt-2">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-0">
                                                                                    <h6 class="t-aten">Plan de Tratamiento</h6>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row">
                                                                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3 mb-0 mt-0">
                                                                                    <label class="ml-0"><strong>Tratamiento médico</strong></label>
                                                                                    <div class="switch switch-success d-inline m-r-10">
                                                                                        <input type="checkbox" id="tto_ojo" name="tto_ojo" value="1" onchange="javascript:showContentojo()" />
                                                                                        <label for="tto_ojo" class="cr"></label>
                                                                                    </div>
                                                                                    <div id="contentTto_ojo" style="display: none;">
                                                                                        <div class="form-row">
                                                                                            <div class="form-group col-md-12 mt-1">
                                                                                                <label class="floating-label-activo-sm" for="rec_tto_ojo">Recomendaciones</label>
                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Recomendaciones" data-seccion="Tratamiento médico" data-tipo="Recom. Médicas Oftalmo"  rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="rec_tto_ojo" id="rec_tto_ojo"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3 mb-0 mt-0">
                                                                                    <label class="ml-0"><strong>Procedimiento</strong></label>
                                                                                    <div class="switch switch-success d-inline m-r-10">
                                                                                        <input type="checkbox" id="pr_ojo" name="pr_ojo" value="1" onchange="javascript:showContentProc_ojo()" />
                                                                                        <label for="pr_ojo" class="cr"></label>
                                                                                    </div>
                                                                                    <div id="contentProc_ojo" style="display: none;">
                                                                                        <div class="form-row">
                                                                                            <div class="form-group col-md-12">
                                                                                                <label class="floating-label-activo-sm" for="tipo_proc_ojo"> Tipo</label>
                                                                                                <input type="text" class="form-control form-control-sm" name="tipo_proc_ojo" id="tipo_proc_ojo">
                                                                                            </div>
                                                                                            <div class="form-group col-md-12">
                                                                                                <label class="floating-label-activo-sm" for="plan_proc_ojo"> Plan</label>
                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Procedimiento" data-seccion="Tipo Procedimiento" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="plan_proc_ojo" id="plan_proc_ojo"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3 mb-0 mt-0">
                                                                                    <label class="ml-0"><strong>Lentes</strong></label>
                                                                                    @if(!empty(session('lic_token')) && session('lic_estado') == 1)
                                                                                        <div class="switch switch-success d-inline m-r-10">
                                                                                            <input type="checkbox" id="r_lentes" name="r_lentes" value="1" onchange="javascript:showContentReceta()" />
                                                                                            <label for="r_lentes" class="cr"></label>
                                                                                        </div>
                                                                                    @else
                                                                                        <div class="switch switch-success d-inline m-r-10">
                                                                                            <input type="checkbox" id="r_lentes" name="r_lentes" value="1" onchange="javascript:showContentReceta()" disabled/>
                                                                                            <label for="r_lentes" class="cr"></label>
                                                                                        </div>
                                                                                    @endif
                                                                                </div>
                                                                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3 mb-0">
                                                                                    <div class="form-group">
                                                                                        <div class="switch switch-success d-inline m-r-10">
                                                                                            <label class="ml-0"><strong>Cirugía</strong></label>
                                                                                            <input type="checkbox" class="custom-control-input" id="ojo_cir" name="ojo_cir" value="{!! old('ojo_cir') !!}">
                                                                                            <label class="cr" for="ojo_cir"></label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <hr class="mt-1">
                                                                            <div class="form-row">
                                                                                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <label class="floating-label-activo-sm" for="obs_gen_plan_tto">Obs. Plan de tratamiento</label>
                                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Plan de tratamiento" data-seccion=" Plan de tratamiento" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_gen_plan_tto" id="obs_gen_plan_tto"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!--HOSPITALIZACION-->
                                                                        @include('general.hospitalizacion.hospitalizar')
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- control post qx -->
                                        @include('general.secciones_ficha.control_cirugia_gen')
                                        <!-- cierre control post qx -->

										<!--FORMULARIO / SIGNOS VITALES Y OTROS-->
                                        {{--  @include('general.secciones_ficha.signos_vitales')  --}}

                                        <!--ENFERMO CRÓNICO O GES-->
                                        @include('general.secciones_ficha.seccion_cronicos_ges_confidencial')

                                        <!--Diagnóstico-->
                                        @include('general.secciones_ficha.diagnostico')

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--CIERRE: ATENCIÓN ESPECIALIDAD GENERAL-->


                    {{--  div de botones  --}}
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <!--SECCION DE MEDICAMENTOS Y EXAMENES GENERALES -->
                                @include('general.secciones_ficha.seccion_receta_examen_comunes')
                                <!--SECCION DE MEDICAMENTOS Y EXAMENES GENERALES FIN  -->

                                <!--SECCION DE MEDICAMENTOS Y EXAMENES ESPECIALIDAD -->
                                @include('atencion_medica.secciones_especialidad.seccion_receta_examenes_esp_oftalmo')
                                <!--SECCION DE MEDICAMENTOS Y EXAMENES ESPECIALIDAD FIN  -->
                            </div>
                        </div>
                    </div>

                    <!--GUARDAR O IMPRIMIR FICHA-->
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="row mb-3">
                            <div class="col-md-12 text-center">
                                <input type="submit" class="btn btn-info-light-c mt-1" onclick="$('#cerrarsession').val('1');agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Ficha y Finalizar su Consulta">
                                <input type="submit" class="btn btn-success-light-c mt-1" onclick="agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Ficha e ir a su Agenda">
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


@include('atencion_medica.formularios.modal_atencion_general.modal_enfermedades_cronicas')
@include("general.modal.modal_no_disponible")
@include('atencion_medica.secciones_especialidad.ficha_oftalmo_tipo')
{{-- @include('general.hospitalizacion.modals.in_solic_pabellon') --}}

@section('page-script-ficha-atencion')
    <script>
        {{--  mensaje de exito al registrar ficha clinica  --}}
        @if(session('mensaje'))
            swal({
                title: "Registro de Ficha Clínica.",
                text:"{{ session('mensaje') }}",
                icon: "info",
                // buttons: "Aceptar",
                //SuccessMode: true,
            });
        @endif

        {{--  mensaje de exito al registrar ficha clinica  --}}
        @if(session('success'))
            swal({
                title: "Registro de Ficha Clínica.",
                text:"{{ session('success') }}",
                icon: "success",
                // buttons: "Aceptar",
                //SuccessMode: true,
            });
        @endif

        {{--  mensaje de erro al registrar ficha clinica  --}}
        @if(session('error'))
            swal({
                title: "Registro de Ficha Clínica.",
                text:"{{ session('error') }}",
                icon: "error",
                // buttons: "Aceptar",
                //SuccessMode: true,
            });
        @endif

        {{--  mensaje de warning al registrar ficha clinica  --}}
        @if(session('warning'))
            swal({
                title: "Registro de Ficha Clínica.",
                text:"{{ session('warning') }}",
                icon: "warning",
                // buttons: "Aceptar",
                //SuccessMode: true,
            });
        @endif

        function showContentReceta(){
            check = document.getElementById("r_lentes");
            if (check.checked) {
                i_lente();
            }
        }

        function showContentojo()
        {
            element = document.getElementById("contentTto_ojo");
            check = document.getElementById("tto_ojo");
            if (check.checked) {
                element.style.display='block';
            }
            else {
                element.style.display='none';
            }
        }

        function showContentProc_ojo() {
            element = document.getElementById("contentProc_ojo");
            check = document.getElementById("pr_ojo");
            if (check.checked) {
                element.style.display='block';
            }
            else {
                element.style.display='none';
            }
        }

        /** MENSAJE*/
        /** CARGAR mensaje */
            $('#mensaje_ficha').html(' Solo el campo dignóstico es obligatorio el resto es opcional.');
            $('#mensaje_ficha').show();
            setTimeout(function(){
                $('#mensaje_ficha').hide();
            }, 5000);

            @if($fichas->count()>0)
                $('#mensaje_historias').html(' El paciente posee historia medica previa. ');
            @else
                $('#mensaje_historias').html(' Primera consulta del paciente. ');
            @endif
                $('#mensaje_historias').show();
                setTimeout(function(){
                    $('#mensaje_historias').hide();
                }, 6000);


        $(document).ready(function()
        {
            $("#descripcion_cie").autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('dental.getCie10') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    // Set selection
                    $('#descripcion_cie').val(ui.item.label); // display the selected text
                    $('#id_descripcion_cie').val(ui.item.value); // save selected id to input
                    return false;
                }
            });

            $("#lic_descripcion_cie").autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('dental.getCie10') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    // Set selection
                    $('#lic_descripcion_cie').val(ui.item.label); // display the selected text
                    $('#id_lic_descripcion_cie').val(ui.item.value); // save selected id to input
                    return false;
                }
            });

            /** accion check sol Pabellon */
            $('#ojo_cir').change(function() {
                if ($('#ojo_cir').is(':checked')) {
                    $('#ingreso_sol_pab_modal').modal('show');
                } else {
                    $('#ingreso_sol_pab_modal').modal('hide');
                }
            });

            /** cronico */
            /** autocomplete de medicamentos generales */
            // $("#nombre_medicamentocron").autocomplete({
            //     source: function(request, response) {
            //         // Fetch data
            //         $.ajax({
            //             url: "{{ route('dental.getArticulo') }}",
            //             type: 'post',
            //             dataType: "json",
            //             data: {
            //                 _token: CSRF_TOKEN,
            //                 search: request.term
            //             },
            //             success: function(data) {
            //                 console.log(data.length);
            //                 response(data);
            //             }
            //         });
            //     },
            //     select: function(event, ui) {
            //         $('#nombre_medicamentocron').val(ui.item.label);
            //         $('#id_medicamento_cronico').val(ui.item.value);
            //         getDosis_cronico(ui.item.value, 'dosis_cronicomes');
            //         return false;
            //     }
            // });

            /** autocomplete de medicamentos patologia */
            // $("#nombre_medicamentocron_patologia").autocomplete({
            //     source: function(request, response) {
            //         // Fetch data
            //         $.ajax({
            //             url: "{{ route('dental.getArticulo') }}",
            //             type: 'post',
            //             dataType: "json",
            //             data: {
            //                 _token: CSRF_TOKEN,
            //                 search: request.term
            //             },
            //             success: function(data) {
            //                 console.log(data.length);
            //                 response(data);
            //             }
            //         });
            //     },
            //     select: function(event, ui) {
            //         $('#nombre_medicamentocron_patologia').val(ui.item.label);
            //         $('#id_medicamentocron_patologia').val(ui.item.value);
            //         getDosis_cronico(ui.item.value, 'dosis_medicamentocron_patologia');
            //         return false;
            //     }
            // });

            /** accion check confidencial */
            // $('#confidencial').change(function() {
            //     if ($('#confidencial').is(':checked')) {
            //         $('#confidencial_descripcion').show();
            //     } else {
            //         $('#confidencial_descripcion').hide();
            //     }
            // });

            /** accion check ges */
            // $('#modal_ges').change(function() {
            //     if ($('#modal_ges').is(':checked')) {
            //         $('#form_ges').modal('show');
            //     } else {
            //         $('#form_ges').modal('hide');
            //     }
            // });

            /** busqueda de diagnostico GES */
            // $("#nombre_ges").autocomplete({
            //     source: function(request, response) {
            //         // Fetch data
            //         $.ajax({
            //             url: "{{ route('ges.ver') }}",
            //             type: 'post',
            //             dataType: "json",
            //             data: {
            //                 _token: CSRF_TOKEN,
            //                 search: request.term
            //             },
            //             success: function(data) {
            //                 response(data);
            //             }
            //         });
            //     },
            //     select: function(event, ui) {
            //         // Set selection
            //         $('#nombre_ges').val(ui.item.label); // display the selected text
            //         $('#id_ges').val(ui.item.value); // save selected id to input
            //         return false;
            //     }
            // });

            // $('#tratamiento_check').change(function(){
            //     if($('#tratamiento_check').is(':checked')){
            //         $('#tratamiento').val(1);
            //     }
            //     else
            //     {
            //         $('#tratamiento').val(0);
            //     }
            // });

            // $('#lentes_check').change(function(){
            //     if($('#lentes_check').is(':checked')){
            //         $('#lentes').val(1);
            //     }
            //     else
            //     {
            //         $('#lentes').val(0);
            //     }
            // });

            // $('#procedimiento_check').change(function(){
            //     if($('#procedimiento_check').is(':checked')){
            //         $('#procedimiento').val(1);
            //         $('#modal_procedimiento').modal('show');
            //     }
            //     else
            //     {
            //         $('#procedimiento').val(0);
            //     }
            // });

            // $('#cirugia_check').change(function(){
            //     if($('#cirugia_check').is(':checked')){
            //         $('#cirugia').val(1);
            //     }
            //     else
            //     {
            //         $('#cirugia').val(0);
            //     }
            // });

        })

        /** REGISTO ANTECEDENTES */
        // function carga_campos_antecedente_nuevo()
        // {
        //     if($('#tipo_antecedente').val()!='')
        //     {
        //         $('#div_campos_antecedente_nuevo').html('');
        //         var html = '';
        //         if($('#tipo_antecedente').val() == 'alergia')
        //         {
        //             html +='';

        //             html += '<div class="form-row">';
        //             html += '    <div class="form-group col-sm-6 col-md-6">';
        //             html += '        <label class="floating-label-activo-sm">Seleccione</label>';
        //             html += '        <input type="text" id="alergia_paciente" name="alergia_paciente" class="form-control form-control-sm"  value="">';
        //             html += '        <input type="hidden" name="id_alergia_paciente" id="id_alergia_paciente" value=""/>';
        //             html += '    </div>';
        //             html += '    <div class="form-group col-sm-6 col-md-6">';
        //             html += '        <label class="floating-label-activo-sm">Detalle</label>';
        //             html += '        <input type="text" name="alergia_comentario_paciente" id="alergia_comentario_paciente"  class="form-control form-control-sm"  value="">';
        //             html += '    </div>';
        //             html += '    <div class="form-group col-sm-6 col-md-6">';
        //             html += '       <button type="button" class="btn btn-success btn-sm" onclick="agregar_alergia_paciente();">Guardar</button>';
        //             html += '    </div>';
        //             html += '</div>';

        //             $('#div_campos_antecedente_nuevo').show();
        //             $('#div_campos_antecedente_nuevo').html(html);

        //              /** autocompletado de alergias */
        //             $("#alergia_paciente").autocomplete({
        //                 source: function(request, response) {
        //                     // Fetch data
        //                     $.ajax({
        //                         url: "{{ route('alergias.ver_autocomplete') }}",
        //                         type: 'get',
        //                         dataType: "json",
        //                         data: {
        //                             search: request.term
        //                         },
        //                         success: function(data) {
        //                             console.log(data);
        //                             response(data);
        //                         }
        //                     });
        //                 },
        //                 select: function(event, ui) {
        //                     // Set selection
        //                     $('#alergia_paciente').val(ui.item.label); // display the selected text
        //                     $('#id_alergia_paciente').val(ui.item.value); // save selected id to input

        //                     return false;
        //                 }
        //             });

        //         }
        //         if($('#tipo_antecedente').val() == 'enfermedades_cronicas')
        //         {
        //             html +='';
        //         }
        //         if($('#tipo_antecedente').val() == 'anestesias')
        //         {
        //             html +='';
        //         }
        //         if($('#tipo_antecedente').val() == 'cirugia')
        //         {
        //             html +='';
        //         }
        //     }
        //     else
        //     {
        //         $('#div_campos_antecedente_nuevo').hide();
        //         $('#div_campos_antecedente_nuevo').html('');
        //     }
        // }

        // function agregar_alergia_paciente() {

        //     let alergia = $('#alergia_paciente').val();
        //     let id_alergia = $('#id_alergia_paciente').val();
        //     let comentario = $('#alergia_comentario_paciente').val();
        //     let paciente = $('#id_paciente_fc').val();
        //     let token = CSRF_TOKEN;
        //     var mensaje = '';
        //     var valido = 0;

        //     if(alergia=="")
        //     {
        //         mensaje +='Campo requerido alergia\n';
        //         valido = 1;
        //     }
        //     // if(id_alergia=="")
        //     // {
        //     //     mensaje +='Campo requerido id alergia\n';
        //     //     valido = 1;
        //     // }
        //     if(comentario=="")
        //     {
        //         mensaje +='Campo requerido Detalle\n';
        //         valido = 1;
        //     }
        //     if(paciente=="")
        //     {
        //         mensaje +='Campo requerido paciente\n';
        //         valido = 1;
        //     }

        //     if(valido == 0)
        //     {
        //         swal({
        //             title: "Alergia agregada correctamente. ***PENDIDENTE POR HACER***",
        //             icon: "success",
        //             buttons: "Aceptar",
        //             DangerMode: true,
        //         });
        //     }
        //     else
        //     {
        //         swal({
        //             title: "Campo Requerido en registro de Alergia. ***PENDIDENTE POR HACER***",
        //             text: mensaje,
        //             icon: "error",
        //             buttons: "Aceptar",
        //             DangerMode: true,
        //         });
        //     }


        //     // let url = "{{ route('profesional.agregar_alergia_paciente') }}";

        //     // $.ajax({
        //     //     url: url,
        //     //     type: 'POST',
        //     //     dataType: 'json',
        //     //     data: {
        //     //         _token: CSRF_TOKEN,
        //     //         alergia: alergia,
        //     //         id_alergia: id_alergia,
        //     //         comentario: comentario,
        //     //         paciente: paciente
        //     //     },
        //     // })
        //     // .done(function(response) {

        //     //     if (response.success) {
        //     //         swal({
        //     //             title: "Alergia agregada correctamente",
        //     //             icon: "success",
        //     //             buttons: "Aceptar",
        //     //             DangerMode: true,
        //     //         });

        //     //         $('#alergia_paciente').val('');
        //     //         $('#id_alergia_paciente').val('');

        //     //     }
        //     //     else
        //     //     {
        //     //         swal({
        //     //             title: "Error al agregar alergia",
        //     //             icon: "error",
        //     //             buttons: "Aceptar",
        //     //             DangerMode: true,
        //     //         })
        //     //     }

        //     //     return response;
        //     // })
        //     // .fail(function() {
        //     //     console.log("error");
        //     // });

        // }
        /** FIN REGISTRO ANTECEDENTES  */


        // function cargarIgual(input)
        // {

        //     let actual = $('#'+input);
        //     let equivalentes = $('#'+input).attr('data-input_igual').split(',');
        //     $.each(equivalentes, function( index, value ) {
        //         var equivalente = $('#'+value);
        //         equivalente.val(actual.val());
        //     });

        //     // let actual = $('#'+input);
        //     // let equivalente = $('#'+$('#'+input).attr('data-input_igual'));

        //     // equivalente.val(actual.val());

        // }

        function evaluar_para_carga_detalle(select, div, input, valor)
        {
            var valor_select = $('#'+select+'').val();
            if(valor_select == valor) $('#'+div+'').show();
            else {
                $('#'+div+'').hide();
                $('#'+input+'').val('');
            }
        }

        function abrir_modal_guardar_tipo(div_id_data, div_id_detalle,tipo)
        {
            console.log(div_id_data, div_id_detalle, tipo);
            $("#btn_modal_registrar_ficha_tipo_oft").unbind();

            if(tipo == 'oft_g')
            {
                $('#btn_modal_registrar_ficha_tipo_oft').click(function(){
                    guardar_tipo_ficha_oft_g();
                });
            }
            else if(tipo == 'bio')
            {
                $('#btn_modal_registrar_ficha_tipo_oft').click(function(){
                    guardar_tipo_ficha_bio();
                });
            }
            else if(tipo == 'fo')
            {
                $('#btn_modal_registrar_ficha_tipo_oft').click(function(){
                    guardar_tipo_ficha_fo();
                });
            }
            $('#modal_registrar_ficha_tipo_oft').modal('show');

            cargarSeccion(div_id_detalle,div_id_data);
        }

        function cargarSeccion(div_destino, div_data)
        {
            // var tipo = $('#'+select+'').val();
            $('#'+div_destino).html('');
            $('#'+div_data).find('select,textarea,input').each(function(key, elemento){
                html ='';
                html +='<div class="row" style="margin-top:10px;">';
                if($(elemento).prop('nodeName') == 'SELECT')
                {
                    if($(elemento).val() == 0)
                        $(elemento).val(1)

                    html +='<div class="col-md-4">'+$(elemento).data('titulo')+'</div>';
                    html +='<div class="col-md-4">';
                    html +='    '+$('#'+$(elemento).attr('id')+' option:selected').text()+'';
                    html +='    <input type="hidden" name="modal_agregar_tipo_'+$(elemento).attr('id')+'" id="modal_agregar_tipo_'+$(elemento).attr('id')+'" value="'+$(elemento).val()+'">';
                    html +='</div>';
                }
                else if($(elemento).prop('nodeName') == 'TEXTAREA' || $(elemento).prop('nodeName') == 'INPUT')
                {
                    html +='<div class="col-md-4">'+$(elemento).data('titulo')+'</div>';
                    html +='<div class="col-md-6">';
                    html +='    <textarea class="form-control caja-texto form-control-sm '+$(elemento).attr('id')+'_editar" style="display:none;" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="observaciones_'+$(elemento).attr('id')+'" id="observaciones_'+$(elemento).attr('id')+'">'+$(elemento).val()+'</textarea>';
                    html +='    <label class="'+$(elemento).attr('id')+'_mostrar" id="label_observacion_'+$(elemento).attr('id')+'">'+$(elemento).val()+'</label>';
                    html +='</div>';
                    html +='<div class="col-md-2">';
                    html +='    <button class="btn btn-sm btn-success '+$(elemento).attr('id')+'_mostrar"  onclick="cambiar_div(\''+$(elemento).attr('id')+'_editar'+'\',\''+$(elemento).attr('id')+'_mostrar'+'\',\'label_observacion_'+$(elemento).attr('id')+'\',\'observaciones_'+$(elemento).attr('id')+'\')">Editar</button>';
                    html +='    <button class="btn btn-sm btn-success '+$(elemento).attr('id')+'_editar" style="display:none;" onclick="cambiar_div(\''+$(elemento).attr('id')+'_mostrar'+'\',\''+$(elemento).attr('id')+'_editar'+'\',\'label_observacion_'+$(elemento).attr('id')+'\',\'observaciones_'+$(elemento).attr('id')+'\')">Guardar</button>';
                    html +='</div>';

                }
                html +='</div>';
                $('#'+div_destino).append(html);
            });
        }

        function cambiar_div(mostrar, ocultar, label, textarea)
        {
            $('.'+mostrar).show();
            $('.'+ocultar).hide();
            $('#'+label).html( $('#'+textarea).val() );
        }

        function guardar_tipo_ficha_oft_g()
        {
            var registro_f_t_oft_nombre = $('#registro_f_t_oft_nombre').val();
            var registro_f_t_oft_descripcion = $('#registro_f_t_oft_descripcion').val();
            var _token = CSRF_TOKEN;
            if(registro_f_t_oft_nombre == ''){
                swal({
                        title: "Problema al Registrar Tipo Ficha.\n Campo requedido Nombre",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                    return false;
            }
            if(registro_f_t_oft_descripcion == ''){
                swal({
                        title: "Problema al Registrar Tipo Ficha.\n Campo requedido Descripcion",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                    return false;
            }


            var data = [];
            data.registro_f_t_oft_nombre = registro_f_t_oft_nombre;
            data.registro_f_t_oft_descripcion = registro_f_t_oft_descripcion;

            $('#registro_f_t_oft_detalle').find('input,textarea').each(function(key, elemento){
                {{--  console.log($(elemento).attr('id'));  --}}
                {{--  console.log($(elemento).val());  --}}
                {{--  console.log($(elemento).prop('nodeName'));  --}}
                {{--  console.log('*******');  --}}

                data[$(elemento).attr('id')] = $(elemento).val();

            });

            {{--  console.log(data);  --}}
            url = "{{ route('profesional.ficha_tipo_oft') }}";
            $.ajax({

                url: url,
                type: "POST",
                data: {
                    _token: _token,
                    id_profesional : $('#id_profesional_fc').val(),
                    ind_esp_cirugia : '',
                    nombre : data.registro_f_t_oft_nombre,
                    descripcion : data.registro_f_t_oft_descripcion,
                    agudeza_visual_subj_od : data.modal_agregar_tipo_agudeza_visual_subj_od,
                    obs_agudeza_visual_subj_od : data.observaciones_obs_agudeza_visual_subj_od,
                    agudeza_visual_subj_oi : data.modal_agregar_tipo_agudeza_visual_subj_oi,
                    obs_agudeza_visual_subj_oi : data.observaciones_obs_agudeza_visual_subj_oi,
                    agudeza_visual_obj_od : data.modal_agregar_tipo_agudeza_visual_obj_od,
                    obs_agudeza_visual_obj_od : data.observaciones_obs_agudeza_visual_obj_od,
                    agudeza_visual_obj_oi : data.modal_agregar_tipo_agudeza_visual_obj_oi,
                    obs_agudeza_visual_obj_oi : data.observaciones_obs_agudeza_visual_obj_oi,
                    mov_oculares : data.modal_agregar_tipo_mov_oculares,
                    obs_mov_oculares : data.observaciones_obs_mov_oculares,
                    autorefracto_od : data.modal_agregar_tipo_autorefracto_od,
                    obs_autorefracto_od : data.observaciones_obs_autorefracto_od,
                    autorefracto_oi : data.modal_agregar_tipo_autorefracto_oi,
                    obs_autorefracto_oi : data.observaciones_obs_autorefracto_oi,
                    presion_ocular_od : data.modal_agregar_tipo_presion_ocular_od,
                    obs_presion_ocular_od : data.observaciones_obs_presion_ocular_od,
                    valor_presion_ocular_od : data.observaciones_valor_presion_ocular_od,
                    presion_ocular_oi : data.modal_agregar_tipo_presion_ocular_oi,
                    obs_presion_ocular_oi : data.observaciones_obs_presion_ocular_oi,
                    valor_presion_ocular_oi : data.observaciones_valor_presion_ocular_od,
                    campo_visual_od : data.modal_agregar_tipo_campo_visual_od,
                    obs_campo_visual_od : data.observaciones_obs_campo_visual_od,
                    campo_visual_oi : data.modal_agregar_tipo_campo_visual_oi,
                    obs_campo_visual_oi : data.observaciones_obs_campo_visual_oi,
                    campo_otros_ex_general : data.observaciones_campo_otros_ex_general

                },
            })
            .done(function(data)
            {
                {{--  console.log('-----------------------');  --}}
                {{--  console.log(data);  --}}
                {{--  console.log('-----------------------');  --}}
                if(data.estado == 1)
                {
                    $('#modal_registrar_ficha_tipo_oft').modal('hide');
                    swal({
                        title: "Tipo Ficha Registrado",
                        icon: "success",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    })
                }
                else{

                    swal({
                        title: "Problema al Registrar Tipo Ficha.",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    })
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        }

        function guardar_tipo_ficha_bio()
        {
            var registro_f_t_oft_nombre = $('#registro_f_t_oft_nombre').val();
            var registro_f_t_oft_descripcion = $('#registro_f_t_oft_descripcion').val();
            var _token = CSRF_TOKEN;
            if(registro_f_t_oft_nombre == ''){
                swal({
                        title: "Problema al Registrar Tipo Ficha.\n Campo requedido Nombre",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                    return false;
            }
            if(registro_f_t_oft_descripcion == ''){
                swal({
                        title: "Problema al Registrar Tipo Ficha.\n Campo requedido Descripcion",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                    return false;
            }


            var data = [];
            data.registro_f_t_oft_nombre = registro_f_t_oft_nombre;
            data.registro_f_t_oft_descripcion = registro_f_t_oft_descripcion;

            $('#registro_f_t_oft_detalle').find('input,textarea').each(function(key, elemento){
                {{--  console.log($(elemento).attr('id'));  --}}
                {{--  console.log($(elemento).val());  --}}
                {{--  console.log($(elemento).prop('nodeName'));  --}}
                {{--  console.log('*******');  --}}

                data[$(elemento).attr('id')] = $(elemento).val();

            });

            {{--  console.log(data);  --}}
            url = "{{ route('profesional.ficha_tipo_oft_bio') }}";
            $.ajax({

                url: url,
                type: "POST",
                data: {
                    _token: _token,
                    id_profesional : $('#id_profesional_fc').val(),
                    ind_esp_cirugia : '',
                    nombre : data.registro_f_t_oft_nombre,
                    descripcion : data.registro_f_t_oft_descripcion,
                    parpbiood : data.modal_agregar_tipo_parpbiood,
                    obs_parpbiood : data.observaciones_obs_parpbiood,
                    conjuntiva_bio_od : data.modal_agregar_tipo_conjuntiva_bio_od,
                    obs_conjuntiva_bio_od : data.observaciones_obs_conjuntiva_bio_od,
                    biocornea_od : data.modal_agregar_tipo_biocornea_od,
                    obs_biocornea_od : data.observaciones_obs_biocornea_od,
                    camara_ant_od : data.modal_agregar_tipo_camara_ant_od,
                    obs_camara_ant_od : data.observaciones_obs_camara_ant_od,
                    tyndall_od : data.modal_agregar_tipo_tyndall_od,
                    obs_tyndall_od : data.observaciones_obs_tyndall_od,
                    cristalino_bio_od : data.modal_agregar_tipo_cristalino_bio_od,
                    obs_cristalino_bio_od : data.observaciones_obs_cristalino_bio_od,
                    campo_otros_bio_od : data.observaciones_campo_otros_bio_od,
                    parpbiooi : data.modal_agregar_tipo_parpbiooi,
                    obs_parpbiooi : data.observaciones_obs_parpbiooi,
                    conjuntiva_bio_oi : data.modal_agregar_tipo_conjuntiva_bio_oi,
                    obs_conjuntiva_bio_oi : data.observaciones_obs_conjuntiva_bio_oi,
                    biocornea_oi : data.modal_agregar_tipo_biocornea_oi,
                    obs_biocornea_oi : data.observaciones_obs_biocornea_oi,
                    camara_ant_oi : data.modal_agregar_tipo_camara_ant_oi,
                    obs_camara_ant_oi : data.observaciones_obs_camara_ant_oi,
                    tyndall_oi : data.modal_agregar_tipo_tyndall_oi,
                    obs_tyndall_oi : data.observaciones_obs_tyndall_oi,
                    cristalino_bio_oi : data.modal_agregar_tipo_cristalino_bio_oi,
                    obs_cristalino_bio_oi : data.observaciones_obs_cristalino_bio_oi,
                    campo_otros_bio_oi : data.observaciones_campo_otros_bio_oi
                },
            })
            .done(function(data)
            {
                {{--  console.log('-----------------------');  --}}
                {{--  console.log(data);  --}}
                {{--  console.log('-----------------------');  --}}
                if(data.estado == 1)
                {
                    $('#modal_registrar_ficha_tipo_oft').modal('hide');
                    swal({
                        title: "Tipo Ficha Registrado",
                        icon: "success",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    })
                }
                else{

                    swal({
                        title: "Problema al Registrar Tipo Ficha.",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    })
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        }

        function guardar_tipo_ficha_fo()
        {
            var registro_f_t_oft_nombre = $('#registro_f_t_oft_nombre').val();
            var registro_f_t_oft_descripcion = $('#registro_f_t_oft_descripcion').val();
            var _token = CSRF_TOKEN;
            if(registro_f_t_oft_nombre == ''){
                swal({
                        title: "Problema al Registrar Tipo Ficha.\n Campo requedido Nombre",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                    return false;
            }
            if(registro_f_t_oft_descripcion == ''){
                swal({
                        title: "Problema al Registrar Tipo Ficha.\n Campo requedido Descripcion",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                    return false;
            }


            var data = [];
            data.registro_f_t_oft_nombre = registro_f_t_oft_nombre;
            data.registro_f_t_oft_descripcion = registro_f_t_oft_descripcion;

            $('#registro_f_t_oft_detalle').find('input,textarea').each(function(key, elemento){
                {{--  console.log($(elemento).attr('id'));  --}}
                {{--  console.log($(elemento).val());  --}}
                {{--  console.log($(elemento).prop('nodeName'));  --}}
                {{--  console.log('*******');  --}}

                data[$(elemento).attr('id')] = $(elemento).val();

            });

            {{--  console.log(data);  --}}
            url = "{{ route('profesional.ficha_tipo_oft_fondo_ojo') }}";
            $.ajax({

                url: url,
                type: "POST",
                data: {
                    _token: _token,
                    id_profesional : $('#id_profesional_fc').val(),
                    ind_esp_cirugia : '',
                    nombre : data.registro_f_t_oft_nombre,
                    descripcion : data.registro_f_t_oft_descripcion,
                    papilas_fo_od : data.modal_agregar_tipo_papilas_fo_od,
                    obs_papilas_fo_od : data.observaciones_obs_papilas_fo_od,
                    excavacion_fo_od : data.modal_agregar_tipo_excavacion_fo_od,
                    obs_excavacion_fo_od : data.observaciones_obs_excavacion_fo_od,
                    bordes_od : data.modal_agregar_tipo_bordes_od,
                    obs_bordes_od : data.observaciones_obs_bordes_od,
                    maculas_fo_od : data.modal_agregar_tipo_maculas_fo_od,
                    obs_maculas_fo_od : data.observaciones_obs_maculas_fo_od,
                    vasos_fo_od : data.modal_agregar_tipo_vasos_fo_od,
                    obs_vasos_fo_od : data.observaciones_obs_vasos_fo_od,
                    periferia_fo_od : data.modal_agregar_tipo_periferia_fo_od,
                    obs_periferia_fo_od : data.observaciones_obs_periferia_fo_od,
                    campo_fo_otros_od : data.observaciones_campo_fo_otros_od,
                    papilas_fo_oi : data.modal_agregar_tipo_papilas_fo_oi,
                    obs_papilas_fo_oi : data.observaciones_obs_papilas_fo_oi,
                    excavacion_fo_oi : data.modal_agregar_tipo_excavacion_fo_oi,
                    obs_excavacion_fo_oi : data.observaciones_obs_excavacion_fo_oi,
                    bordes_oi : data.modal_agregar_tipo_bordes_oi,
                    obs_bordes_oi : data.observaciones_obs_bordes_oi,
                    maculas_fo_oi : data.modal_agregar_tipo_maculas_fo_oi,
                    obs_maculas_fo_oi : data.observaciones_obs_maculas_fo_oi,
                    vasos_fo_oi : data.modal_agregar_tipo_vasos_fo_oi,
                    obs_vasos_fo_oi : data.observaciones_obs_vasos_fo_oi,
                    periferia_fo_oi : data.modal_agregar_tipo_periferia_fo_oi,
                    obs_periferia_fo_oi : data.observaciones_obs_periferia_fo_oi,
                    campo_fo_otros_oi : data.observaciones_campo_fo_otros_oi,
                },
            })
            .done(function(data)
            {
                {{--  console.log('-----------------------');  --}}
                {{--  console.log(data);  --}}
                {{--  console.log('-----------------------');  --}}
                if(data.estado == 1)
                {
                    $('#modal_registrar_ficha_tipo_oft').modal('hide');
                    swal({
                        title: "Tipo Ficha Registrado",
                        icon: "success",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    })
                }
                else{

                    swal({
                        title: "Problema al Registrar Tipo Ficha.",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    })
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        }

        function cargar_info_ficha_tipo_oft(select, div_descripcion)
        {
            let id_ft = $('#'+select).val();
            if(id_ft == '')
            {
                $('#'+div_descripcion).html('');
                $('#form-cdg').find('select,textarea').each(function(key, elemento){
                    if($(elemento).prop('nodeName') == 'SELECT')
                    {
                        $(elemento).val(0);
                    }
                    else if($(elemento).prop('nodeName') == 'INPUT')
                    {
                        $(elemento).val('');
                    }
                    else
                    {
                        $(elemento).val('');
                    }
                });

                evaluar_para_carga_detalle('agudeza_visual_subj_od','div_agudeza_visual_subj_od','obs_agudeza_visual_subj_od',2);
                evaluar_para_carga_detalle('agudeza_visual_subj_oi','div_agudeza_visual_subj_oi','obs_agudeza_visual_subj_oi',2);
                evaluar_para_carga_detalle('agudeza_visual_obj_od','div_agudeza_visual_obj_od','obs_agudeza_visual_obj_od',2);
                evaluar_para_carga_detalle('agudeza_visual_obj_oi','div_agudeza_visual_obj_oi','obs_agudeza_visual_obj_oi',2);
                evaluar_para_carga_detalle('mov_oculares','div_mov_oculares','obs_mov_oculares',2);
                evaluar_para_carga_detalle('autorefracto_od','div_autorefracto_od','obs_autorefracto_od',2);
                evaluar_para_carga_detalle('autorefracto_oi','div_autorefracto_oi','obs_autorefracto_oi',2);
                evaluar_para_carga_detalle('presion_ocular_od','div_presion_ocular_od','obs_presion_ocular_od',2);
                evaluar_para_carga_detalle('presion_ocular_oi','div_presion_ocular_oi','obs_presion_ocular_oi',2);
                evaluar_para_carga_detalle('campo_visual_od','div_campo_visual_od','obs_campo_visual_od',2);
                evaluar_para_carga_detalle('campo_visual_oi','div_campo_visual_oi','obs_campo_visual_oi',2);

                return false;
            }
            $('#'+div_descripcion).html($('#'+select+' option:selected').attr('data-descripcion'));

            url = "{{ route('profesional.buscar_ficha_tipo_oft') }}";
            $.ajax({

                url: url,
                type: "GET",
                data: {
                    id_profesional : $('#id_profesional_fc').val(),
                    id_ficha_tipo :  id_ft,
                },
            })
            .done(function(data)
            {
                {{--  console.log('-----------------------');  --}}
                {{--  console.log(data);  --}}
                {{--  console.log('-----------------------');  --}}
                if(data.estado == 1)
                {
                    $.each(data.registros, function(index, value)
                    {
                        {{--  console.log(index);  --}}
                        {{--  console.log(value);  --}}
                        {{--  console.log($('#'+index));  --}}

                        $('#'+index).val(value);
                    });
                    evaluar_para_carga_detalle('agudeza_visual_subj_od','div_agudeza_visual_subj_od','obs_agudeza_visual_subj_od',2);
                    evaluar_para_carga_detalle('agudeza_visual_subj_oi','div_agudeza_visual_subj_oi','obs_agudeza_visual_subj_oi',2);
                    evaluar_para_carga_detalle('agudeza_visual_obj_od','div_agudeza_visual_obj_od','obs_agudeza_visual_obj_od',2);
                    evaluar_para_carga_detalle('agudeza_visual_obj_oi','div_agudeza_visual_obj_oi','obs_agudeza_visual_obj_oi',2);
                    evaluar_para_carga_detalle('mov_oculares','div_mov_oculares','obs_mov_oculares',2);
                    evaluar_para_carga_detalle('autorefracto_od','div_autorefracto_od','obs_autorefracto_od',2);
                    evaluar_para_carga_detalle('autorefracto_oi','div_autorefracto_oi','obs_autorefracto_oi',2);
                    evaluar_para_carga_detalle('presion_ocular_od','div_presion_ocular_od','obs_presion_ocular_od',2);
                    evaluar_para_carga_detalle('presion_ocular_oi','div_presion_ocular_oi','obs_presion_ocular_oi',2);
                    evaluar_para_carga_detalle('campo_visual_od','div_campo_visual_od','obs_campo_visual_od',2);
                    evaluar_para_carga_detalle('campo_visual_oi','div_campo_visual_oi','obs_campo_visual_oi',2);

                }
                else{

                    swal({
                        title: "Problema al Cargar Tipo Ficha.",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    })
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }

        function cargar_info_ficha_tipo_oft_bio(select, div_descripcion)
        {
            let id_ft = $('#'+select).val();
            if(id_ft == '')
            {
                $('#'+div_descripcion).html('');
                $('#form-bio').find('select,textarea').each(function(key, elemento){
                    if($(elemento).prop('nodeName') == 'SELECT')
                    {
                        $(elemento).val(0);
                    }
                    else if($(elemento).prop('nodeName') == 'INPUT')
                    {
                        $(elemento).val('');
                    }
                    else
                    {
                        $(elemento).val('');
                    }
                });

                evaluar_para_carga_detalle('parpbiood','div_parpbiood','obs_parpbiood',2);
                evaluar_para_carga_detalle('conjuntiva_bio_od','div_conjuntiva_bio_od','obs_conjuntiva_bio_od',2);
                evaluar_para_carga_detalle('biocornea_od','div_biocornea_od','obs_biocornea_od',3);
                evaluar_para_carga_detalle('camara_ant_od','div_camara_ant_od','obs_camara_ant_od',2);
                evaluar_para_carga_detalle('tyndall_od','div_tyndall_od','obs_tyndall_od',2);
                evaluar_para_carga_detalle('cristalino_bio_od','div_cristalino_bio_od','obs_cristalino_bio_od',2);
                evaluar_para_carga_detalle('parpbiooi','div_parpbiooi','obs_parpbiooi',2);
                evaluar_para_carga_detalle('conjuntiva_bio_oi','div_conjuntiva_bio_oi','obs_conjuntiva_bio_oi',2);
                evaluar_para_carga_detalle('biocornea_oi','div_biocornea_oi','obs_biocornea_oi',3);
                evaluar_para_carga_detalle('camara_ant_oi','div_camara_ant_oi','obs_camara_ant_oi',2);
                evaluar_para_carga_detalle('tyndall_oi','div_tyndall_oi','obs_tyndall_oi',2);
                evaluar_para_carga_detalle('cristalino_bio_oi','div_cristalino_bio_oi','obs_cristalino_bio_oi',2);

                return false;
            }
            $('#'+div_descripcion).html($('#'+select+' option:selected').attr('data-descripcion'));

            url = "{{ route('profesional.buscar_ficha_tipo_oft_bio') }}";
            $.ajax({

                url: url,
                type: "GET",
                data: {
                    id_profesional : $('#id_profesional_fc').val(),
                    id_ficha_tipo :  id_ft,
                },
            })
            .done(function(data)
            {
                {{--  console.log('-----------------------');  --}}
                {{--  console.log(data);  --}}
                {{--  console.log('-----------------------');  --}}
                if(data.estado == 1)
                {
                    $.each(data.registros, function(index, value)
                    {
                        {{--  console.log(index);  --}}
                        {{--  console.log(value);  --}}
                        {{--  console.log($('#'+index));  --}}

                        $('#'+index).val(value);
                    });
                    evaluar_para_carga_detalle('parpbiood','div_parpbiood','obs_parpbiood',2);
                    evaluar_para_carga_detalle('conjuntiva_bio_od','div_conjuntiva_bio_od','obs_conjuntiva_bio_od',2);
                    evaluar_para_carga_detalle('biocornea_od','div_biocornea_od','obs_biocornea_od',3);
                    evaluar_para_carga_detalle('camara_ant_od','div_camara_ant_od','obs_camara_ant_od',2);
                    evaluar_para_carga_detalle('tyndall_od','div_tyndall_od','obs_tyndall_od',2);
                    evaluar_para_carga_detalle('cristalino_bio_od','div_cristalino_bio_od','obs_cristalino_bio_od',2);
                    evaluar_para_carga_detalle('parpbiooi','div_parpbiooi','obs_parpbiooi',2);
                    evaluar_para_carga_detalle('conjuntiva_bio_oi','div_conjuntiva_bio_oi','obs_conjuntiva_bio_oi',2);
                    evaluar_para_carga_detalle('biocornea_oi','div_biocornea_oi','obs_biocornea_oi',3);
                    evaluar_para_carga_detalle('camara_ant_oi','div_camara_ant_oi','obs_camara_ant_oi',2);
                    evaluar_para_carga_detalle('tyndall_oi','div_tyndall_oi','obs_tyndall_oi',2);
                    evaluar_para_carga_detalle('cristalino_bio_oi','div_cristalino_bio_oi','obs_cristalino_bio_oi',2);

                }
                else{

                    swal({
                        title: "Problema al Cargar Tipo Ficha.",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    })
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }

        function cargar_info_ficha_tipo_oft_fo(select, div_descripcion)
        {
            let id_ft = $('#'+select).val();
            if(id_ft == '')
            {
                $('#'+div_descripcion).html('');
                $('#form-fo').find('select,textarea').each(function(key, elemento){
                    if($(elemento).prop('nodeName') == 'SELECT')
                    {
                        $(elemento).val(0);
                    }
                    else if($(elemento).prop('nodeName') == 'INPUT')
                    {
                        $(elemento).val('');
                    }
                    else
                    {
                        $(elemento).val('');
                    }
                });

                evaluar_para_carga_detalle('papilas_fo_oi','div_papilas_fo_oi','obs_papilas_fo_oi',2);
                evaluar_para_carga_detalle('excavacion_fo_oi','div_excavacion_fo_oi','obs_excavacion_fo_oi',12);
                evaluar_para_carga_detalle('bordes_oi','div_bordes_oi','obs_bordes_oi',2);
                evaluar_para_carga_detalle('maculas_fo_oi','div_maculas_fo_oi','obs_maculas_fo_oi',2);
                evaluar_para_carga_detalle('vasos_fo_oi','div_vasos_fo_oi','obs_vasos_fo_oi',2);
                evaluar_para_carga_detalle('periferia_fo_oi','div_periferia_fo_oi','obs_periferia_fo_oi',2);

                return false;
            }
            $('#'+div_descripcion).html($('#'+select+' option:selected').attr('data-descripcion'));

            url = "{{ route('profesional.buscar_ficha_tipo_oft_fondo_ojo') }}";
            $.ajax({

                url: url,
                type: "GET",
                data: {
                    id_profesional : $('#id_profesional_fc').val(),
                    id_ficha_tipo :  id_ft,
                },
            })
            .done(function(data)
            {
                {{--  console.log('-----------------------');  --}}
                {{--  console.log(data);  --}}
                {{--  console.log('-----------------------');  --}}
                if(data.estado == 1)
                {
                    $.each(data.registros, function(index, value)
                    {
                        {{--  console.log(index);  --}}
                        {{--  console.log(value);  --}}
                        {{--  console.log($('#'+index));  --}}

                        $('#'+index).val(value);
                    });

                    evaluar_para_carga_detalle('papilas_fo_oi','div_papilas_fo_oi','obs_papilas_fo_oi',2);
                    evaluar_para_carga_detalle('excavacion_fo_oi','div_excavacion_fo_oi','obs_excavacion_fo_oi',12);
                    evaluar_para_carga_detalle('bordes_oi','div_bordes_oi','obs_bordes_oi',2);
                    evaluar_para_carga_detalle('maculas_fo_oi','div_maculas_fo_oi','obs_maculas_fo_oi',2);
                    evaluar_para_carga_detalle('vasos_fo_oi','div_vasos_fo_oi','obs_vasos_fo_oi',2);
                    evaluar_para_carga_detalle('periferia_fo_oi','div_periferia_fo_oi','obs_periferia_fo_oi',2);

                }
                else{

                    swal({
                        title: "Problema al Cargar Tipo Ficha.",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    })
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }

        function agregar_medicamentos_ficha() {


            var rows1 = [];
            $('#tabla_medicamento_cirugia tr').each(function(i, n) {
                if (i > 0) {
                    rol = {};
                    var data = $(this).find("td");
                    rol["id_producto"] = $.trim($(data[0]).text().split("\n").join(""));
                    rol["uso_cronico"] = $.trim($(data[1]).text().split("\n").join(""));
                    rol["medicamento"] = $.trim($(data[2]).text().split("\n").join(""));
                    rol["presentacion"] = $.trim($(data[3]).text().split("\n").join(""));
                    rol["posologia"] = $.trim($(data[4]).text().split("\n").join(""));
                    rol["via_administracion"] = $.trim($(data[5]).text().split("\n").join(""));
                    rol["periodo"] = $.trim($(data[6]).text().split("\n").join(""));
                    rol["compra"] = $.trim($(data[7]).text().split("\n").join(""));
                    rows1.push(rol);
                }
            });

            $('#medicamentos').val(JSON.stringify(rows1));


        }

        function agregar_examenes_ficha() {
            var rows = [];
            $('#tabla_examen_cirugia tr').each(function(i, n) {
                if (i > 0) {
                    console.log(i);
                    rol = {};
                    var data = $(this).find("td");
                    rol["nombre_examen"] = $.trim($(data[0]).text().split("\n").join(""));
                    rol["tipo"] = $.trim($(data[1]).text().split("\n").join(""));
                    // rol["subtipo"] = $.trim($(data[2]).text().split("\n").join(""));
                    rol["prioridad"] = $.trim($(data[2]).text().split("\n").join(""));
                    rol["con_contraste"] = $.trim($(data[3]).text().split("\n").join(""));
                    rows.push(rol);
                }
            });
            $('#examenes').val(JSON.stringify(rows));
        }

        // function cargar_profesional(rut, input_nombre, input_id, div_solicitar)
        // {
        //     rut = $(rut).val();

        //     // console.log('------------------------------------');
        //     // console.log(rut.length);
        //     // console.log(rut);
        //     // console.log('------------------------------------');

        //     if(rut.length>5)
        //     {
        //         url = "{{ route('profesional.buscar') }}";
        //         $.ajax({

        //             url: url,
        //             type: "GET",
        //             data: {
        //                 rut : rut,
        //             },
        //         })
        //         .done(function(data)
        //         {
        //             // console.log('-----------------------');
        //             // console.log(data);
        //             // console.log('-----------------------');
        //             if(data.estado == 1)
        //             {

        //                 if(data.registros.length>0)
        //                 {
        //                     var nombre = data.registros[0].nombre+' '+data.registros[0].apellido_uno;
        //                     var id = data.registros[0].id;
        //                     // $('#'+input_nombre).attr('readonly', true);
        //                     $('#'+input_nombre).val(nombre);
        //                     $('#'+input_id).val(id);
        //                     $('#'+div_solicitar).hide();
        //                     mensaje = '';
        //                     $('#div_mensaje').hide();
        //                     $('#mensaje_solicitado_por').html(mensaje);
        //                     $('#solicitado_por_nombre_rfl').val('');
        //                     $('#solicitado_por_apellido_rfl').val('');
        //                     $('#solicitado_por_telefono_rfl').val('');
        //                     $('#solicitado_por_email_rfl').val('');
        //                 }
        //                 else
        //                 {
        //                     mensaje = 'Profesional no encontrato, debe ingresar datos.';
        //                     $('#'+input_nombre).val('');
        //                     $('#'+input_id).val('');
        //                     $('#'+div_solicitar).show();
        //                     $('#div_mensaje').show();
        //                     $('#mensaje_solicitado_por').html(mensaje);
        //                     $('#solicitado_por_nombre_rfl').val('');
        //                     $('#solicitado_por_apellido_rfl').val('');
        //                     $('#solicitado_por_telefono_rfl').val('');
        //                     $('#solicitado_por_email_rfl').val('');
        //                     // $('#'+input_nombre).attr('readonly', true);
        //                 }
        //             }
        //             else
        //             {
        //                 mensaje = 'Se presento un problema en la busqueda intente nuevamente';
        //                 $('#div_mensaje').show();
        //                 $('#mensaje_solicitado_por').html(mensaje);
        //                 // $('#'+input_nombre).attr('readonly', false);
        //             }
        //         })
        //         .fail(function(jqXHR, ajaxOptions, thrownError) {
        //             console.log(jqXHR, ajaxOptions, thrownError)
        //         });
        //     }
        //     else if(rut.length==0)
        //     {
        //         $('#'+input_nombre).val('');
        //         // $('#'+input_nombre).attr('readonly', true);
        //         $('#'+input_id).val('');
        //         $('#'+div_solicitar).hide();
        //         $('#div_mensaje').hide();
        //         $('#mensaje_solicitado_por').html('');
        //     }
        // }

        // function actualizar_solicitado_por(input_solitado_por, input_nombre, input_apellido)
        // {
        //     var nombre = $('#'+input_nombre).val();
        //     var apellido = $('#'+input_apellido).val();
        //     if(nombre != '' || apellido != '')
        //     {
        //         // $('#'+input_solitado_por).attr('readonly', true);
        //         $('#'+input_solitado_por).val($('#'+input_nombre).val()+' '+$('#'+input_apellido).val());
        //     }
        //     else
        //     {
        //         // $('#'+input_solitado_por).attr('readonly', false);
        //         $('#'+input_solitado_por).val();
        //     }
        // }
        function cambiar_div(mostrar, ocultar, label, textarea)
        {
            $('.'+mostrar).show();
            $('.'+ocultar).hide();
            $('#'+label).html( $('#'+textarea).val() );
        }

        function guardar_tipo_ficha_oft_g()
        {
            var registro_f_t_oft_nombre = $('#registro_f_t_oft_nombre').val();
            var registro_f_t_oft_descripcion = $('#registro_f_t_oft_descripcion').val();
            var _token = CSRF_TOKEN;
            if(registro_f_t_oft_nombre == ''){
                swal({
                        title: "Problema al Registrar Tipo Ficha.\n Campo requedido Nombre",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                    return false;
            }
            if(registro_f_t_oft_descripcion == ''){
                swal({
                        title: "Problema al Registrar Tipo Ficha.\n Campo requedido Descripcion",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                    return false;
            }


            var data = [];
            data.registro_f_t_oft_nombre = registro_f_t_oft_nombre;
            data.registro_f_t_oft_descripcion = registro_f_t_oft_descripcion;

            $('#registro_f_t_oft_detalle').find('input,textarea').each(function(key, elemento){
                {{--  console.log($(elemento).attr('id'));  --}}
                {{--  console.log($(elemento).val());  --}}
                {{--  console.log($(elemento).prop('nodeName'));  --}}
                {{--  console.log('*******');  --}}

                data[$(elemento).attr('id')] = $(elemento).val();

            });

            {{--  console.log(data);  --}}
            url = "{{ route('profesional.ficha_tipo_oft') }}";
            $.ajax({

                url: url,
                type: "POST",
                data: {
                    _token: _token,
                    id_profesional : $('#id_profesional_fc').val(),
                    ind_esp_cirugia : '',
                    nombre : data.registro_f_t_oft_nombre,
                    descripcion : data.registro_f_t_oft_descripcion,
                    agudeza_visual_subj_od : data.modal_agregar_tipo_agudeza_visual_subj_od,
                    obs_agudeza_visual_subj_od : data.observaciones_obs_agudeza_visual_subj_od,
                    agudeza_visual_subj_oi : data.modal_agregar_tipo_agudeza_visual_subj_oi,
                    obs_agudeza_visual_subj_oi : data.observaciones_obs_agudeza_visual_subj_oi,
                    agudeza_visual_obj_od : data.modal_agregar_tipo_agudeza_visual_obj_od,
                    obs_agudeza_visual_obj_od : data.observaciones_obs_agudeza_visual_obj_od,
                    agudeza_visual_obj_oi : data.modal_agregar_tipo_agudeza_visual_obj_oi,
                    obs_agudeza_visual_obj_oi : data.observaciones_obs_agudeza_visual_obj_oi,
                    mov_oculares : data.modal_agregar_tipo_mov_oculares,
                    obs_mov_oculares : data.observaciones_obs_mov_oculares,
                    autorefracto_od : data.modal_agregar_tipo_autorefracto_od,
                    obs_autorefracto_od : data.observaciones_obs_autorefracto_od,
                    autorefracto_oi : data.modal_agregar_tipo_autorefracto_oi,
                    obs_autorefracto_oi : data.observaciones_obs_autorefracto_oi,
                    presion_ocular_od : data.modal_agregar_tipo_presion_ocular_od,
                    obs_presion_ocular_od : data.observaciones_obs_presion_ocular_od,
                    valor_presion_ocular_od : data.observaciones_valor_presion_ocular_od,
                    presion_ocular_oi : data.modal_agregar_tipo_presion_ocular_oi,
                    obs_presion_ocular_oi : data.observaciones_obs_presion_ocular_oi,
                    valor_presion_ocular_oi : data.observaciones_valor_presion_ocular_od,
                    campo_visual_od : data.modal_agregar_tipo_campo_visual_od,
                    obs_campo_visual_od : data.observaciones_obs_campo_visual_od,
                    campo_visual_oi : data.modal_agregar_tipo_campo_visual_oi,
                    obs_campo_visual_oi : data.observaciones_obs_campo_visual_oi,
                    campo_otros_ex_general : data.observaciones_campo_otros_ex_general

                },
            })
            .done(function(data)
            {
                {{--  console.log('-----------------------');  --}}
                {{--  console.log(data);  --}}
                {{--  console.log('-----------------------');  --}}
                if(data.estado == 1)
                {
                    $('#modal_registrar_ficha_tipo_oft').modal('hide');
                    swal({
                        title: "Tipo Ficha Registrado",
                        icon: "success",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    })
                }
                else{

                    swal({
                        title: "Problema al Registrar Tipo Ficha.",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    })
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        }

        function guardar_tipo_ficha_bio()
        {
            var registro_f_t_oft_nombre = $('#registro_f_t_oft_nombre').val();
            var registro_f_t_oft_descripcion = $('#registro_f_t_oft_descripcion').val();
            var _token = CSRF_TOKEN;
            if(registro_f_t_oft_nombre == ''){
                swal({
                        title: "Problema al Registrar Tipo Ficha.\n Campo requedido Nombre",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                    return false;
            }
            if(registro_f_t_oft_descripcion == ''){
                swal({
                        title: "Problema al Registrar Tipo Ficha.\n Campo requedido Descripcion",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                    return false;
            }


            var data = [];
            data.registro_f_t_oft_nombre = registro_f_t_oft_nombre;
            data.registro_f_t_oft_descripcion = registro_f_t_oft_descripcion;

            $('#registro_f_t_oft_detalle').find('input,textarea').each(function(key, elemento){
                {{--  console.log($(elemento).attr('id'));  --}}
                {{--  console.log($(elemento).val());  --}}
                {{--  console.log($(elemento).prop('nodeName'));  --}}
                {{--  console.log('*******');  --}}

                data[$(elemento).attr('id')] = $(elemento).val();

            });

            {{--  console.log(data);  --}}
            url = "{{ route('profesional.ficha_tipo_oft_bio') }}";
            $.ajax({

                url: url,
                type: "POST",
                data: {
                    _token: _token,
                    id_profesional : $('#id_profesional_fc').val(),
                    ind_esp_cirugia : '',
                    nombre : data.registro_f_t_oft_nombre,
                    descripcion : data.registro_f_t_oft_descripcion,
                    parpbiood : data.modal_agregar_tipo_parpbiood,
                    obs_parpbiood : data.observaciones_obs_parpbiood,
                    conjuntiva_bio_od : data.modal_agregar_tipo_conjuntiva_bio_od,
                    obs_conjuntiva_bio_od : data.observaciones_obs_conjuntiva_bio_od,
                    biocornea_od : data.modal_agregar_tipo_biocornea_od,
                    obs_biocornea_od : data.observaciones_obs_biocornea_od,
                    camara_ant_od : data.modal_agregar_tipo_camara_ant_od,
                    obs_camara_ant_od : data.observaciones_obs_camara_ant_od,
                    tyndall_od : data.modal_agregar_tipo_tyndall_od,
                    obs_tyndall_od : data.observaciones_obs_tyndall_od,
                    cristalino_bio_od : data.modal_agregar_tipo_cristalino_bio_od,
                    obs_cristalino_bio_od : data.observaciones_obs_cristalino_bio_od,
                    campo_otros_bio_od : data.observaciones_campo_otros_bio_od,
                    parpbiooi : data.modal_agregar_tipo_parpbiooi,
                    obs_parpbiooi : data.observaciones_obs_parpbiooi,
                    conjuntiva_bio_oi : data.modal_agregar_tipo_conjuntiva_bio_oi,
                    obs_conjuntiva_bio_oi : data.observaciones_obs_conjuntiva_bio_oi,
                    biocornea_oi : data.modal_agregar_tipo_biocornea_oi,
                    obs_biocornea_oi : data.observaciones_obs_biocornea_oi,
                    camara_ant_oi : data.modal_agregar_tipo_camara_ant_oi,
                    obs_camara_ant_oi : data.observaciones_obs_camara_ant_oi,
                    tyndall_oi : data.modal_agregar_tipo_tyndall_oi,
                    obs_tyndall_oi : data.observaciones_obs_tyndall_oi,
                    cristalino_bio_oi : data.modal_agregar_tipo_cristalino_bio_oi,
                    obs_cristalino_bio_oi : data.observaciones_obs_cristalino_bio_oi,
                    campo_otros_bio_oi : data.observaciones_campo_otros_bio_oi
                },
            })
            .done(function(data)
            {
                {{--  console.log('-----------------------');  --}}
                {{--  console.log(data);  --}}
                {{--  console.log('-----------------------');  --}}
                if(data.estado == 1)
                {
                    $('#modal_registrar_ficha_tipo_oft').modal('hide');
                    swal({
                        title: "Tipo Ficha Registrado",
                        icon: "success",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    })
                }
                else{

                    swal({
                        title: "Problema al Registrar Tipo Ficha.",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    })
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        }

        function guardar_tipo_ficha_fo()
        {
            var registro_f_t_oft_nombre = $('#registro_f_t_oft_nombre').val();
            var registro_f_t_oft_descripcion = $('#registro_f_t_oft_descripcion').val();
            var _token = CSRF_TOKEN;
            if(registro_f_t_oft_nombre == ''){
                swal({
                        title: "Problema al Registrar Tipo Ficha.\n Campo requedido Nombre",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                    return false;
            }
            if(registro_f_t_oft_descripcion == ''){
                swal({
                        title: "Problema al Registrar Tipo Ficha.\n Campo requedido Descripcion",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                    return false;
            }


            var data = [];
            data.registro_f_t_oft_nombre = registro_f_t_oft_nombre;
            data.registro_f_t_oft_descripcion = registro_f_t_oft_descripcion;

            $('#registro_f_t_oft_detalle').find('input,textarea').each(function(key, elemento){
                {{--  console.log($(elemento).attr('id'));  --}}
                {{--  console.log($(elemento).val());  --}}
                {{--  console.log($(elemento).prop('nodeName'));  --}}
                {{--  console.log('*******');  --}}

                data[$(elemento).attr('id')] = $(elemento).val();

            });

            {{--  console.log(data);  --}}
            url = "{{ route('profesional.ficha_tipo_oft_fondo_ojo') }}";
            $.ajax({

                url: url,
                type: "POST",
                data: {
                    _token: _token,
                    id_profesional : $('#id_profesional_fc').val(),
                    ind_esp_cirugia : '',
                    nombre : data.registro_f_t_oft_nombre,
                    descripcion : data.registro_f_t_oft_descripcion,
                    papilas_fo_od : data.modal_agregar_tipo_papilas_fo_od,
                    obs_papilas_fo_od : data.observaciones_obs_papilas_fo_od,
                    excavacion_fo_od : data.modal_agregar_tipo_excavacion_fo_od,
                    obs_excavacion_fo_od : data.observaciones_obs_excavacion_fo_od,
                    bordes_od : data.modal_agregar_tipo_bordes_od,
                    obs_bordes_od : data.observaciones_obs_bordes_od,
                    maculas_fo_od : data.modal_agregar_tipo_maculas_fo_od,
                    obs_maculas_fo_od : data.observaciones_obs_maculas_fo_od,
                    vasos_fo_od : data.modal_agregar_tipo_vasos_fo_od,
                    obs_vasos_fo_od : data.observaciones_obs_vasos_fo_od,
                    periferia_fo_od : data.modal_agregar_tipo_periferia_fo_od,
                    obs_periferia_fo_od : data.observaciones_obs_periferia_fo_od,
                    campo_fo_otros_od : data.observaciones_campo_fo_otros_od,
                    papilas_fo_oi : data.modal_agregar_tipo_papilas_fo_oi,
                    obs_papilas_fo_oi : data.observaciones_obs_papilas_fo_oi,
                    excavacion_fo_oi : data.modal_agregar_tipo_excavacion_fo_oi,
                    obs_excavacion_fo_oi : data.observaciones_obs_excavacion_fo_oi,
                    bordes_oi : data.modal_agregar_tipo_bordes_oi,
                    obs_bordes_oi : data.observaciones_obs_bordes_oi,
                    maculas_fo_oi : data.modal_agregar_tipo_maculas_fo_oi,
                    obs_maculas_fo_oi : data.observaciones_obs_maculas_fo_oi,
                    vasos_fo_oi : data.modal_agregar_tipo_vasos_fo_oi,
                    obs_vasos_fo_oi : data.observaciones_obs_vasos_fo_oi,
                    periferia_fo_oi : data.modal_agregar_tipo_periferia_fo_oi,
                    obs_periferia_fo_oi : data.observaciones_obs_periferia_fo_oi,
                    campo_fo_otros_oi : data.observaciones_campo_fo_otros_oi,
                },
            })
            .done(function(data)
            {
                {{--  console.log('-----------------------');  --}}
                {{--  console.log(data);  --}}
                {{--  console.log('-----------------------');  --}}
                if(data.estado == 1)
                {
                    $('#modal_registrar_ficha_tipo_oft').modal('hide');
                    swal({
                        title: "Tipo Ficha Registrado",
                        icon: "success",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    })
                }
                else{

                    swal({
                        title: "Problema al Registrar Tipo Ficha.",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    })
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        }

        function cargar_info_ficha_tipo_oft(select, div_descripcion)
        {
            let id_ft = $('#'+select).val();
            if(id_ft == '')
            {
                $('#'+div_descripcion).html('');
                $('#form-cdg').find('select,textarea').each(function(key, elemento){
                    if($(elemento).prop('nodeName') == 'SELECT')
                    {
                        $(elemento).val(0);
                    }
                    else if($(elemento).prop('nodeName') == 'INPUT')
                    {
                        $(elemento).val('');
                    }
                    else
                    {
                        $(elemento).val('');
                    }
                });

                evaluar_para_carga_detalle('agudeza_visual_subj_od','div_agudeza_visual_subj_od','obs_agudeza_visual_subj_od',2);
                evaluar_para_carga_detalle('agudeza_visual_subj_oi','div_agudeza_visual_subj_oi','obs_agudeza_visual_subj_oi',2);
                evaluar_para_carga_detalle('agudeza_visual_obj_od','div_agudeza_visual_obj_od','obs_agudeza_visual_obj_od',2);
                evaluar_para_carga_detalle('agudeza_visual_obj_oi','div_agudeza_visual_obj_oi','obs_agudeza_visual_obj_oi',2);
                evaluar_para_carga_detalle('mov_oculares','div_mov_oculares','obs_mov_oculares',2);
                evaluar_para_carga_detalle('autorefracto_od','div_autorefracto_od','obs_autorefracto_od',2);
                evaluar_para_carga_detalle('autorefracto_oi','div_autorefracto_oi','obs_autorefracto_oi',2);
                evaluar_para_carga_detalle('presion_ocular_od','div_presion_ocular_od','obs_presion_ocular_od',2);
                evaluar_para_carga_detalle('presion_ocular_oi','div_presion_ocular_oi','obs_presion_ocular_oi',2);
                evaluar_para_carga_detalle('campo_visual_od','div_campo_visual_od','obs_campo_visual_od',2);
                evaluar_para_carga_detalle('campo_visual_oi','div_campo_visual_oi','obs_campo_visual_oi',2);

                return false;
            }
            $('#'+div_descripcion).html($('#'+select+' option:selected').attr('data-descripcion'));

            url = "{{ route('profesional.buscar_ficha_tipo_oft') }}";
            $.ajax({

                url: url,
                type: "GET",
                data: {
                    id_profesional : $('#id_profesional_fc').val(),
                    id_ficha_tipo :  id_ft,
                },
            })
            .done(function(data)
            {
                {{--  console.log('-----------------------');  --}}
                {{--  console.log(data);  --}}
                {{--  console.log('-----------------------');  --}}
                if(data.estado == 1)
                {
                    $.each(data.registros, function(index, value)
                    {
                        {{--  console.log(index);  --}}
                        {{--  console.log(value);  --}}
                        {{--  console.log($('#'+index));  --}}

                        $('#'+index).val(value);
                    });
                    evaluar_para_carga_detalle('agudeza_visual_subj_od','div_agudeza_visual_subj_od','obs_agudeza_visual_subj_od',2);
                    evaluar_para_carga_detalle('agudeza_visual_subj_oi','div_agudeza_visual_subj_oi','obs_agudeza_visual_subj_oi',2);
                    evaluar_para_carga_detalle('agudeza_visual_obj_od','div_agudeza_visual_obj_od','obs_agudeza_visual_obj_od',2);
                    evaluar_para_carga_detalle('agudeza_visual_obj_oi','div_agudeza_visual_obj_oi','obs_agudeza_visual_obj_oi',2);
                    evaluar_para_carga_detalle('mov_oculares','div_mov_oculares','obs_mov_oculares',2);
                    evaluar_para_carga_detalle('autorefracto_od','div_autorefracto_od','obs_autorefracto_od',2);
                    evaluar_para_carga_detalle('autorefracto_oi','div_autorefracto_oi','obs_autorefracto_oi',2);
                    evaluar_para_carga_detalle('presion_ocular_od','div_presion_ocular_od','obs_presion_ocular_od',2);
                    evaluar_para_carga_detalle('presion_ocular_oi','div_presion_ocular_oi','obs_presion_ocular_oi',2);
                    evaluar_para_carga_detalle('campo_visual_od','div_campo_visual_od','obs_campo_visual_od',2);
                    evaluar_para_carga_detalle('campo_visual_oi','div_campo_visual_oi','obs_campo_visual_oi',2);

                }
                else{

                    swal({
                        title: "Problema al Cargar Tipo Ficha.",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    })
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }

        function cargar_info_ficha_tipo_oft_bio(select, div_descripcion)
        {
            let id_ft = $('#'+select).val();
            if(id_ft == '')
            {
                $('#'+div_descripcion).html('');
                $('#form-bio').find('select,textarea').each(function(key, elemento){
                    if($(elemento).prop('nodeName') == 'SELECT')
                    {
                        $(elemento).val(0);
                    }
                    else if($(elemento).prop('nodeName') == 'INPUT')
                    {
                        $(elemento).val('');
                    }
                    else
                    {
                        $(elemento).val('');
                    }
                });

                evaluar_para_carga_detalle('parpbiood','div_parpbiood','obs_parpbiood',2);
                evaluar_para_carga_detalle('conjuntiva_bio_od','div_conjuntiva_bio_od','obs_conjuntiva_bio_od',2);
                evaluar_para_carga_detalle('biocornea_od','div_biocornea_od','obs_biocornea_od',3);
                evaluar_para_carga_detalle('camara_ant_od','div_camara_ant_od','obs_camara_ant_od',2);
                evaluar_para_carga_detalle('tyndall_od','div_tyndall_od','obs_tyndall_od',2);
                evaluar_para_carga_detalle('cristalino_bio_od','div_cristalino_bio_od','obs_cristalino_bio_od',2);
                evaluar_para_carga_detalle('parpbiooi','div_parpbiooi','obs_parpbiooi',2);
                evaluar_para_carga_detalle('conjuntiva_bio_oi','div_conjuntiva_bio_oi','obs_conjuntiva_bio_oi',2);
                evaluar_para_carga_detalle('biocornea_oi','div_biocornea_oi','obs_biocornea_oi',3);
                evaluar_para_carga_detalle('camara_ant_oi','div_camara_ant_oi','obs_camara_ant_oi',2);
                evaluar_para_carga_detalle('tyndall_oi','div_tyndall_oi','obs_tyndall_oi',2);
                evaluar_para_carga_detalle('cristalino_bio_oi','div_cristalino_bio_oi','obs_cristalino_bio_oi',2);

                return false;
            }
            $('#'+div_descripcion).html($('#'+select+' option:selected').attr('data-descripcion'));

            url = "{{ route('profesional.buscar_ficha_tipo_oft_bio') }}";
            $.ajax({

                url: url,
                type: "GET",
                data: {
                    id_profesional : $('#id_profesional_fc').val(),
                    id_ficha_tipo :  id_ft,
                },
            })
            .done(function(data)
            {
                {{--  console.log('-----------------------');  --}}
                {{--  console.log(data);  --}}
                {{--  console.log('-----------------------');  --}}
                if(data.estado == 1)
                {
                    $.each(data.registros, function(index, value)
                    {
                        {{--  console.log(index);  --}}
                        {{--  console.log(value);  --}}
                        {{--  console.log($('#'+index));  --}}

                        $('#'+index).val(value);
                    });
                    evaluar_para_carga_detalle('parpbiood','div_parpbiood','obs_parpbiood',2);
                    evaluar_para_carga_detalle('conjuntiva_bio_od','div_conjuntiva_bio_od','obs_conjuntiva_bio_od',2);
                    evaluar_para_carga_detalle('biocornea_od','div_biocornea_od','obs_biocornea_od',3);
                    evaluar_para_carga_detalle('camara_ant_od','div_camara_ant_od','obs_camara_ant_od',2);
                    evaluar_para_carga_detalle('tyndall_od','div_tyndall_od','obs_tyndall_od',2);
                    evaluar_para_carga_detalle('cristalino_bio_od','div_cristalino_bio_od','obs_cristalino_bio_od',2);
                    evaluar_para_carga_detalle('parpbiooi','div_parpbiooi','obs_parpbiooi',2);
                    evaluar_para_carga_detalle('conjuntiva_bio_oi','div_conjuntiva_bio_oi','obs_conjuntiva_bio_oi',2);
                    evaluar_para_carga_detalle('biocornea_oi','div_biocornea_oi','obs_biocornea_oi',3);
                    evaluar_para_carga_detalle('camara_ant_oi','div_camara_ant_oi','obs_camara_ant_oi',2);
                    evaluar_para_carga_detalle('tyndall_oi','div_tyndall_oi','obs_tyndall_oi',2);
                    evaluar_para_carga_detalle('cristalino_bio_oi','div_cristalino_bio_oi','obs_cristalino_bio_oi',2);

                }
                else{

                    swal({
                        title: "Problema al Cargar Tipo Ficha.",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    })
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }

        function cargar_info_ficha_tipo_oft_fo(select, div_descripcion)
        {
            let id_ft = $('#'+select).val();
            if(id_ft == '')
            {
                $('#'+div_descripcion).html('');
                $('#form-fo').find('select,textarea').each(function(key, elemento){
                    if($(elemento).prop('nodeName') == 'SELECT')
                    {
                        $(elemento).val(0);
                    }
                    else if($(elemento).prop('nodeName') == 'INPUT')
                    {
                        $(elemento).val('');
                    }
                    else
                    {
                        $(elemento).val('');
                    }
                });

                evaluar_para_carga_detalle('papilas_fo_oi','div_papilas_fo_oi','obs_papilas_fo_oi',2);
                evaluar_para_carga_detalle('excavacion_fo_oi','div_excavacion_fo_oi','obs_excavacion_fo_oi',12);
                evaluar_para_carga_detalle('bordes_oi','div_bordes_oi','obs_bordes_oi',2);
                evaluar_para_carga_detalle('maculas_fo_oi','div_maculas_fo_oi','obs_maculas_fo_oi',2);
                evaluar_para_carga_detalle('vasos_fo_oi','div_vasos_fo_oi','obs_vasos_fo_oi',2);
                evaluar_para_carga_detalle('periferia_fo_oi','div_periferia_fo_oi','obs_periferia_fo_oi',2);

                return false;
            }
            $('#'+div_descripcion).html($('#'+select+' option:selected').attr('data-descripcion'));

            url = "{{ route('profesional.buscar_ficha_tipo_oft_fondo_ojo') }}";
            $.ajax({

                url: url,
                type: "GET",
                data: {
                    id_profesional : $('#id_profesional_fc').val(),
                    id_ficha_tipo :  id_ft,
                },
            })
            .done(function(data)
            {
                {{--  console.log('-----------------------');  --}}
                {{--  console.log(data);  --}}
                {{--  console.log('-----------------------');  --}}
                if(data.estado == 1)
                {
                    $.each(data.registros, function(index, value)
                    {
                        {{--  console.log(index);  --}}
                        {{--  console.log(value);  --}}
                        {{--  console.log($('#'+index));  --}}

                        $('#'+index).val(value);
                    });

                    evaluar_para_carga_detalle('papilas_fo_oi','div_papilas_fo_oi','obs_papilas_fo_oi',2);
                    evaluar_para_carga_detalle('excavacion_fo_oi','div_excavacion_fo_oi','obs_excavacion_fo_oi',12);
                    evaluar_para_carga_detalle('bordes_oi','div_bordes_oi','obs_bordes_oi',2);
                    evaluar_para_carga_detalle('maculas_fo_oi','div_maculas_fo_oi','obs_maculas_fo_oi',2);
                    evaluar_para_carga_detalle('vasos_fo_oi','div_vasos_fo_oi','obs_vasos_fo_oi',2);
                    evaluar_para_carga_detalle('periferia_fo_oi','div_periferia_fo_oi','obs_periferia_fo_oi',2);

                }
                else{

                    swal({
                        title: "Problema al Cargar Tipo Ficha.",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    })
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }
    </script>
@endsection
