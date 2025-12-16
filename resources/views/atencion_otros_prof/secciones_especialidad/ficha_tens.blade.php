<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2">
        <div class="row mx-0">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="orl" role="tablist">
                    <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="atencion_enfermera-tab" data-toggle="tab" href="#atencion_enfermera" role="tab" aria-controls="atencion_enfermera" aria-selected="true">Atención especialidad DANI ACA </a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="ns-tab" data-toggle="tab" href="#ns" role="tab" aria-controls="ns" aria-selected="false">Control Niño Sano DANI ACA </a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="control_domicilio-tab" data-toggle="tab" href="#control_domicilio" role="tab" aria-controls="control_domicilio" aria-selected="false">Control Turno Domiciliario DANI ACA </a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                   <form action="{{ route('fichaAtencion.registrar_ficha_orl') }}" method="POST">
                    <input type="hidden" name="examenes" id="examenes" value="{!! old('examenes') !!}">
                    <input type="hidden" name="examenes_esp" id="examenes_esp" value="{!! old('examenes_esp') !!}">
                    <input type="hidden" name="medicamentos" id="medicamentos" value="{!! old('medicamentos') !!}">
                    <input type="hidden" name="hora_medica" id="hora_medica" value="{{ $hora_medica->id }}">
                    <input type="hidden" name="id_fc" value="{{ $id_ficha_atencion }}" id="id_fc">
                    <input type="hidden" name="id_paciente_fc" value="{{ $paciente->id }}" id="id_paciente_fc">
                    <input type="hidden" name="id_profesional_fc" value="{{ $profesional->id }}" id="id_profesional_fc">
                    <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="{{ $id_lugar_atencion }}">
                    <input type="hidden" name="cerrarsession" id="cerrarsession" value="0">
                    @csrf
                    <div class="tab-content" id="orl-contenido">
                         <!--ATENCIÓN ESPECIALIDAD GENERAL-->
                        <div class="tab-pane fade show active" id="atencion_enfermera" role="tabpanel" aria-labelledby="atencion_enfermera-tab">
                            <div class="row">
                                <!--FORMULARIO / MENOR DE EDAD-->
                                @include('general.secciones_ficha.seccion_menor')  
                                <!--MOTIVO CONSULTA-->
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="card-a">
                                        <div class="card-header-a" id="motivo">
                                            <button class="accor-closed btn card-act-open pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#motivo_c" aria-expanded="false" aria-controls="motivo_c">
                                                Motivo de la consulta
                                            </button>
                                        </div>
                                        <div id="motivo_c" class="collapse" aria-labelledby="motivo" data-parent="#motivo">
                                            <div class="card-body-aten-a">
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                        <label class="floating-label-activo-sm">Motivo</label>
                                                        <select class="form-control form-control-sm" id="motivo" name="motivo">
                                                            <option>Seleccione</option>
                                                            <option>Tratamiento inyectables</option>
                                                            <option>Vacunas</option>
                                                            <option>Curaciones herida</option>
                                                            <option>Curaciones escaras</option>
                                                            <option>Sueros</option>
                                                            <option>Otra</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                                        <label class="floating-label-activo-sm">Anamnesis</label>
                                                        <textarea class="caja-texto form-control form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="anamnesis" id="anamnesis"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--EXAMEN ESPECIALIDAD ENFERMERA - CURACIONES-->
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="card-a">
                                        <div class="card-header-a" id="exam_esp">
                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#exam_esp_c" aria-expanded="false" aria-controls="exam_esp_c">
                                                Curaciones y procedimientos
                                            </button>
                                        </div>
                                        <div id="exam_esp_c" class="collapse" aria-labelledby="exam_esp" data-parent="#exam_esp">
                                            <div class="card-body-aten-a">
                                                <div class="form-row" id="form-enf">
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="floating-label-activo-sm">Curaciones y procedimientos</label>
                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Auditívo" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_ex_oidos" id="obs_ex_oidos"></textarea>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="floating-label-activo-sm">Observaciones al procedimiento</label>
                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Especialidad" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="bs_ex_orl" id="obs_ex_orl"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--TRATAMIENTO INYECTABLE-->
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="card-a">
                                        <div class="card-header-a" id="exam_esp_gin">
                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#exam_esp_gin_c" aria-expanded="false" aria-controls="exam_esp_gin_c">
                                                Administración de Tratamiento Inyectable
                                            </button>
                                        </div>
                                        <div id="exam_esp_gin_c" class="collapse" aria-labelledby="exam_esp_gin" data-parent="#exam_esp_gin">
                                            <div class="card-body-aten-a">
                                                <div id="form-tens-adulto">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <ul class="nav nav-tabs-aten nav-fill mb-3" id="matron" role="tablist">
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset active" id="inyec-gen_tab" data-toggle="tab" href="#inyec-gen" role="tab" aria-controls="inyec-gen" aria-selected="true">Tratamiento Inyectable</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset" id="vac-tab" data-toggle="tab" href="#vac" role="tab" aria-controls="vac" aria-selected="false">Vacunas</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <div class="tab-content" id="tens">
                                                                <!--INYECTABLES-->
                                                                <div class="tab-pane fade show active" id="inyec-gen" role="tabpanel" aria-labelledby="inyec-gen_tab">
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                                <a class="nav-link-aten text-reset active " id="receta_gen_tab" data-toggle="tab" href="#receta_gen" role="tab" aria-controls="receta_gen" aria-selected="false">Receta Médica</a>
                                                                                <a class="nav-link-aten text-reset" id="enf_inyect-tab" data-toggle="tab" href="#enf_inyect" role="tab" aria-controls="enf_inyect" aria-selected="false">Inyectable IM/IV</a>
                                                                                <a class="nav-link-aten text-reset" id="enf_sueros-tab" data-toggle="tab" href="#enf_sueros" role="tab" aria-controls="enf_sueros" aria-selected="false">Control de Sueros</a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-10 col-lg-10 col-xl-10">
                                                                            <div class="tab-content" id="v-pills-tabContent">
                                                                                <div class="tab-pane fade show active" id="receta_gen" role="tabpanel" aria-labelledby="receta_gen_tab">
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                            <h6 class="t-aten">Receta médica</h6>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                            <p class="mb-1"><i>Arrastrar o presionar para adjuntar receta</i> </p>
                                                                                            <div class="dropzone dz-clickable" id="img_receta_enf" action="{{ route('profesional.imagen.carga') }}"></div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-2">
                                                                                            <div class="form-group mb-2">
                                                                                                <input type="hidden" name="busc_receta" id="busc_receta" value="">
                                                                                                <div class="switch switch-success d-inline m-r-10 ">
                                                                                                    <input type="checkbox" onchange="biopsia('dermat');" id="busc_receta_check_enf" name="busc_receta_check_enf" value="">
                                                                                                    <label for="busc_receta_check_enf" class="cr"></label>
                                                                                                </div>
                                                                                                <label>Buscar receta</label>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">ID Receta SDI</label>
                                                                                                <input  type="text" class="form-control form-control-sm" name="id_receta_sdi" id="id_receta_sdi">
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Observaciones</label>
                                                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_busqueda_receta" id="obs_busqueda_receta"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    {{--  <div class="row mb-1">
                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-6 mt-2">
                                                                                                    <div class="card-a">
                                                                                                        <div class="card-header-a" id="img">
                                                                                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#imagenes_elim_cicat_pre" aria-expanded="false" aria-controls="imagenes_elim_cicat_pre">
                                                                                                                Imagenes Pre
                                                                                                            </button>
                                                                                                        </div>
                                                                                                        <div id="img_receta_enf-c" class="collapse show" aria-labelledby="img_receta_enf" data-parent="#img_receta_enf">
                                                                                                            <div class="card-body-aten-a">
                                                                                                                <!-- [ Main Content ] start -->
                                                                                                                <div class="dropzone" id="mis-imagenes-cons-dermato-pre" action="{{ route('profesional.imagen.carga') }}"></div>
                                                                                                                <!-- [ file-upload ] end -->
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-6 mt-2">
                                                                                                    <div class="form-group fill">
                                                                                                        <input type="hidden" name="busc_receta" id="busc_receta" value="">
                                                                                                        <div class="switch switch-success d-inline m-r-10">
                                                                                                            <input type="checkbox" onchange="biopsia('dermat');" id="busc_receta_check_enf" name="busc_receta_check_enf" value="">
                                                                                                            <label for="busc_receta_check_enf" class="cr"></label>
                                                                                                        </div>
                                                                                                        <label>Buscar Receta</label>
                                                                                                        <hr>
                                                                                                        <div class="form-group fill">
                                                                                                            <label id="" name="" class="floating-label-activo-sm">ID Receta SDI</label>
                                                                                                            <input   type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                                                                        </div>
                                                                                                        <div class="form-group fill">
                                                                                                            <label id="" name="" class="floating-label-activo-sm">Observaciones</label>
                                                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_busqueda_receta" id="obs_busqueda_receta"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>  --}}
                                                                                </div>
                                                                                <div class="tab-pane fade show" id="enf_inyect" role="tabpanel" aria-labelledby="enf_inyect-tab">
                                                                                    <div class="col-sm-12 col-md-12">
                                                                                         <div class="form-row">
                                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                <h6 class="t-aten">Inyectable IM/IV</h6>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-row">
                                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                <label class="floating-label-activo-sm">Incidentes en procedimiento </label>
                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Auditívo" rows="3"  onfocus="this.rows=5" onblur="this.rows=3;" name="obs_inyect" id="obs_inyect"></textarea>
                                                                                            </div>
                                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                <label class="floating-label-activo-sm"> Otras observaciones al procedimiento</label>
                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Especialidad" rows="3"  onfocus="this.rows=5" onblur="this.rows=3;" name="obs_inyect_otras" id=""obs_inyect_otras></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="tab-pane fade show" id="enf_sueros" role="tabpanel" aria-labelledby="enf_sueros-tab">
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                        <!--SUEROS-->
                                                                                        <div class="form-row">
                                                                                            <h6 class="t-aten">SUEROS E INYECTABLES</h6>
                                                                                        </div>
                                                                                        <div class="form-row">
                                                                                            <div class="form-group col-md-6">
                                                                                                <label class="floating-label-activo-sm">Descripción del procedimiento</label>
                                                                                                <textarea class="form-control form-control-sm" placeholder ="Suero Tipo / hora de inicio / gotas / min" rows="1" onfocus="this.rows=4" onblur="this.rows=2;"></textarea>
                                                                                            </div>
                                                                                            <div class="form-group col-md-6">
                                                                                                <label class="floating-label-activo-sm">Otras tratamientos parenterales</label>
                                                                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=2;"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-row">
                                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm">Obs. Examen y control</label>
                                                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen mamas" data-seccion="Mamas" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_audicion" id="obs_ex_audicion"></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-row">
                                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm">Control de Signos Vitales en el procedimiento</label>
                                                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen mamas" data-seccion="Mamas" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_audicion" id="obs_ex_audicion"></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--EXAMEN  CONTROL NATALIDAD-->
                                                                @include('general.secciones_ficha.pediatria.vacunas')
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               <!--SIGNOS VITALES Y OTROS-->
                                @include('general.secciones_ficha.signos_vitales')
                                   
                                <!--DIAGNÓSTICO-->
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="card-a">
                                        <div class="card-header-a" id="indic">
                                            <button class="accor-closed card-act-open btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#indic_c" aria-expanded="false" aria-controls="indic_c">
                                                Indicaciones
                                            </button>
                                        </div>
                                        <div id="indic_c" class="collapse" aria-labelledby="indic" data-parent="#indic">
                                            <div class="card-body-aten-a">
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <label class="floating-label-activo-sm">Indicaciones</label>
                                                        <textarea class="form-control form-control-sm" data-titulo="Indicaciones tens" data-seccion="ind_tens" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="ind_tens" id="ind_tens"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--CONTROL NIÑO SANO-->
                        <div class="tab-pane fade show" id="ns" role="tabpanel" aria-labelledby="ns-tab">
                            @include('general.secciones_ficha.pediatria.controlninosano')
                        </div>

                        <!--CONTROL TURNO DOMICILIARIO-->
                        <div class="tab-pane fade show" id="control_domicilio" role="tabpanel" aria-labelledby="control_domicilio-tab">
                            <div id="form-tens-adulto">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <!--NAV GENERAL-->
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <ul class="nav nav-tabs-aten nav-fill mb-3" id="matron" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset active" id="eg_cc_tab" data-toggle="tab" href="#eg_cc" role="tab" aria-controls="eg_cc" aria-selected="false">Estado General y Control de Signos</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="aliment_tab" data-toggle="tab" href="#aliment" role="tab" aria-controls="aliment" aria-selected="false">Alimentación</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="tto_tab" data-toggle="tab" href="#tto" role="tab" aria-controls="tto" aria-selected="false">Tratamientos</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="cur_dom_tab" data-toggle="tab" href="#cur_dom" role="tab" aria-controls="cur_dom" aria-selected="false">Curaciones</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="eval_diarias_tab" data-toggle="tab" href="#eval_diarias" role="tab" aria-controls="eval_diarias" aria-selected="false">Resumen diario</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!--tab gral-->
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="tab-content" id="tens">
                                                            <!--EST GRAL Y CONTROL DE SIGNOS VITALES-->
                                                            <div class="tab-pane fade show active" id="eg_cc" role="tabpanel" aria-labelledby="eg_cc_tab">
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                        <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                            <a class="nav-link-aten text-reset active" id="estado_gen-tab" data-toggle="tab" href="#estado_gen" role="tab" aria-controls="estado_gen" aria-selected="false">Eval estado general</a>
                                                                            <a class="nav-link-aten text-reset" id="s_vitales-tab" data-toggle="tab" href="#s_vitales" role="tab" aria-controls="s_vitales" aria-selected="false">Signos Vitales</a>
                                                                            <a class="nav-link-aten text-reset" id="evacuac-tab" data-toggle="tab" href="#evacuac" role="tab" aria-controls="evacuac" aria-selected="false">Evacuaciones</a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-10 col-lg-10 col-xl-10">
                                                                        <div class="tab-content" id="v-pills-tabContent">
                                                                            <!--EVALUACION ESTADO GENERAL-->
                                                                            <div class="tab-pane fade show active" id="estado_gen" role="tabpanel" aria-labelledby="estado_gen-tab">
                                                                                <div class="form-row">
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                        <h6 class="t-aten">Evaluación Estado General</h6>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-row">
                                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm">Dolor</label>
                                                                                            <textarea class="form-control form-control-sm"  rows="2" onfocus="this.rows=3" onblur="this.rows=2;" name="dolor" id="dolor"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm">Descanso</label>
                                                                                            <textarea class="form-control form-control-sm"  rows="2" onfocus="this.rows=3" onblur="this.rows=2;" name="descanso" id="descanso"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!--CONTROL DE SIGNOS VITALES-->
                                                                            <div class="tab-pane fade show" id="s_vitales" role="tabpanel" aria-labelledby="s_vitales-tab">
                                                                                <div class="form-row">
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                        <h6 class="t-aten float-left pt-2">Control Signos Vitales</h6>
                                                                                         <button type="button" class="btn btn-info-light-c btn-xxs btn-agregar-grupo-controlvital float-right mb-3" ><i class="fas fa-plus"></i> Añadir control</button>
                                                                                    </div>
                                                                                </div>
                                                                                <div id="contenedor_grupo_controlvital">
                                                                                    <div id="grupo_controlvital">
                                                                                        <form>
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">N°</label>
                                                                                                        <input type="number" class="form-control form-control-sm" name="num" id="num">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Fecha</label>
                                                                                                        <input type="date" class="form-control form-control-sm" name="fecha" id="fecha" value="hoy">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Pulso</label>
                                                                                                        <input type="text" class="form-control form-control-sm" name="pulso" id="pulso">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Presión</label>
                                                                                                        <input type="text" class="form-control form-control-sm" name="presion" id="presion">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">T°</label>
                                                                                                        <input type="text" class="form-control form-control-sm" name="temperatura" id="temperatura">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Comunicación y Conciencia</label>
                                                                                                        <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tono_musc_grupo_es" id="obs_tono_musc_grupo_es"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!--EVACUACIONES-->
                                                                            <div class="tab-pane fade show" id="evacuac" role="tabpanel" aria-labelledby="evacuac-tab">
                                                                                <div class="row">
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                        <h6 class="t-aten float-left pt-2">EVACUACIONES</h6>
                                                                                        <button type="button" class="btn btn-info-light-c btn-xxs btn-agregar-grupo-evacuaciones float-right mb-3 float-right" ><i class="fas fa-plus"></i> Añadir control</button>
                                                                                    </div>
                                                                                </div>
                                                                                <div id="contenedor_grupo_evacuaciones">
                                                                                    <div id="grupo_evacuaciones">
                                                                                        <form>
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">N°</label>
                                                                                                        <input type="number" class="form-control form-control-sm" name="name" id="name">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Fecha</label>
                                                                                                        <input type="date" class="form-control form-control-sm" name="fecha" id="fecha" value="hoy">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-group col-md-3">
                                                                                                    <label class="floating-label-activo-sm">Vómitos</label>
                                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="vomitos" id="vomitos"></textarea>
                                                                                                </div>
                                                                                                <div class="form-group col-md-3">
                                                                                                    <label class="floating-label-activo-sm">Diuresis</label>
                                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="diruesis" id="diruesis"></textarea>
                                                                                                </div>
                                                                                                <div class="form-group col-md-3">
                                                                                                    <label class="floating-label-activo-sm">Deposiciones</label>
                                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="deposiciones" id="deposiciones"></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                                {{--  <div class="col-sm-12 col-md-12">
                                                                                    <div class="form-row">
                                                                                        <div class="form-group col-md-4">
                                                                                            <label class="floating-label">Vomitos</label>
                                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;"></textarea>
                                                                                        </div>
                                                                                        <div class="form-group col-md-4">
                                                                                            <label class="floating-label">Diurésis</label>
                                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;"></textarea>

                                                                                        </div>
                                                                                        <div class="form-group col-md-4">
                                                                                            <label class="floating-label">Deposiciones</label>
                                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>  --}}
                                                                            </div>
                                                                            <!--OBSERVACIONES GENERALES-->
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Observaciones Estado general</label>
                                                                                        <textarea class="form-control caja-texto form-control-sm" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_est_gral" id="obs_est_gral"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade show" id="aliment" role="tabpanel" aria-labelledby="aliment_tab">
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                        <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                            <a class="nav-link-aten text-reset active" id="ayuno-tab" data-toggle="tab" href="#ayuno" role="tab" aria-controls="ayuno" aria-selected="false">Ayuno<br>Alim.Parenteral</a>
                                                                            <a class="nav-link-aten text-reset" id="desayuno-tab" data-toggle="tab" href="#desayuno" role="tab" aria-controls="desayuno" aria-selected="false">Desayuno</a>
                                                                            <a class="nav-link-aten text-reset" id="alm-tab" data-toggle="tab" href="#alm" role="tab" aria-controls="alm" aria-selected="false">Almuerzo</a>
                                                                            <a class="nav-link-aten text-reset" id="onces-tab" data-toggle="tab" href="#onces" role="tab" aria-controls="onces" aria-selected="false">Onces</a>
                                                                            <a class="nav-link-aten text-reset" id="cena-tab" data-toggle="tab" href="#cena" role="tab" aria-controls="cena" aria-selected="false">Cena</a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-10 col-lg-10 col-xl-10">
                                                                        <div class="tab-content" id="v-pills-tabContent">
                                                                            <div class="tab-pane fade show active" id="ayuno" role="tabpanel" aria-labelledby="ayuno-tab">
                                                                                <div class="form-row">
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                        <h6 class="t-aten float-left pt-2">Paciente en Ayuno</h6>
                                                                                        <button type="button" class="btn btn-info-light-c btn-xxs btn-agregar-grupo-alimentacion float-right mb-3" ><i class="fas fa-plus"></i> Añadir alimentación</button>
                                                                                    </div>
                                                                                </div>
                                                                                <div id="contenedor_grupo_alimentacion">
                                                                                    <div id="grupo_alimentacion">
                                                                                        <form>
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">N°</label>
                                                                                                        <input type="number" class="form-control form-control-sm" name="tono_grupo_estudio" id="tono_grupo_estudio">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Fecha</label>
                                                                                                        <input type="date" class="form-control form-control-sm" name="tono_grupo_estudio" id="tono_grupo_estudio" value="hoy">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Nombre Medic</label>
                                                                                                        <input type="text" class="form-control form-control-sm" name="tono_grupo_estudio" id="tono_grupo_estudio">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Vía</label>
                                                                                                        <select name="est_tono" id="est_tono" class="form-control form-control-sm">
                                                                                                            <option selected  value="1">Endovenosa directa</option>
                                                                                                            <option value="2">Sonda Gástrica</option>
                                                                                                            <option value="3">Sonda Naso-Gástrica</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Gotas/min</label>
                                                                                                        <input type="number" class="form-control form-control-sm" name="tono_grupo_estudio" id="tono_grupo_estudio">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Tolerancia</label>
                                                                                                        <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tono_musc_grupo_es" id="obs_tono_musc_grupo_es"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="tab-pane fade show" id="desayuno" role="tabpanel" aria-labelledby="desayuno-tab">
                                                                                <div class="row">
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                        <h6 class="t-aten">Desayuno</h6>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-row">
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-2">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm">Observaciones Desayuno</label>
                                                                                            <input  type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="tab-pane fade show" id="alm" role="tabpanel" aria-labelledby="alm-tab">
                                                                                <div class="row">
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                        <h6 class="t-aten">Almuerzo</h6>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-row">
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-2">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm">Observaciones almuerzo</label>
                                                                                            <input  type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="tab-pane fade show" id="onces" role="tabpanel" aria-labelledby="onces-tab">
                                                                                <div class="row">
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                        <h6 class="t-aten">Onces</h6>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-row">
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm">Observaciones Onces</label>
                                                                                            <input  type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="tab-pane fade show" id="cena" role="tabpanel" aria-labelledby="cena-tab">
                                                                                <div class="row">
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-7">
                                                                                        <h6 class="t-aten">Cena</h6>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-row">
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-2">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm">Observaciones Cena</label>
                                                                                            <input  type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Observaciones Alimentación</label>
                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen mamas" data-seccion="Mamas" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_audicion" id="obs_ex_audicion"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade show" id="tto" role="tabpanel" aria-labelledby="tto_tab">
                                                                <div class="row">
                                                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                        <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                            <a class="nav-link-aten text-reset active " id="tratoral-tab" data-toggle="tab" href="#tratoral" role="tab" aria-controls="tratoral" aria-selected="false">Tratamiento Oral</a>
                                                                            <a class="nav-link-aten text-reset" id="ttoinyect-tab" data-toggle="tab" href="#ttoinyect" role="tab" aria-controls="ttoinyect" aria-selected="false">Inyectables</a>
                                                                            <a class="nav-link-aten text-reset" id="ttoovias-tab" data-toggle="tab" href="#ttoovias" role="tab" aria-controls="ttoovias" aria-selected="false">Otras Vías</a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-10 col-lg-10 col-xl-10">
                                                                        <div class="tab-content" id="v-pills-tabContent">
                                                                            <div class="tab-pane fade show active" id="tratoral" role="tabpanel" aria-labelledby="tratoral-tab">
                                                                                <div class="form-row">
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                        <h6 class="t-aten pt-2 float-left">Tratamientos Orales</h6>
                                                                                        <button type="button" class="btn btn-info-light-c btn-xxs btn-agregar-grupo-tratamiento float-right mb-3" ><i class="fas fa-plus"></i> Añadir medicación</button>
                                                                                    </div>
                                                                                </div>
                                                                                <div id="contenedor_grupo_tratamiento">
                                                                                    <div id="grupo_tratamiento">
                                                                                        <form>
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">N°</label>
                                                                                                        <input type="number" class="form-control form-control-sm" name="tono_grupo_estudio" id="tono_grupo_estudio">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Fecha</label>
                                                                                                        <input type="date" class="form-control form-control-sm" name="tono_grupo_estudio" id="tono_grupo_estudio" value="hoy">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Nombre</label>
                                                                                                        <input type="text" class="form-control form-control-sm" name="tono_grupo_estudio" id="tono_grupo_estudio">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Vía Administración</label>
                                                                                                        <select name="est_tono" id="est_tono" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle("est_tono","div_est_ton","obs_est_tono",6);">
                                                                                                            <option selected  value="1">Oral</option>
                                                                                                            <option value="2">Oral Sonda Orogástrica</option>
                                                                                                            <option value="3">Oral Sonda nasogástrica</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Tolerancia</label>
                                                                                                        <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tono_musc_grupo_es" id="obs_tono_musc_grupo_es"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="tab-pane fade show" id="ttoinyect" role="tabpanel" aria-labelledby="ttoinyect-tab">
                                                                                <div class="row">
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                        <h6 class="t-aten pt-2 float-left">Tratamientos Inyectables</h6>
                                                                                        <button type="button" class="btn btn-info-light-c btn-xxs btn-agregar-grupo-parenteral float-right mb-3" ><i class="fas fa-plus"></i> Añadir medicación inyectable</button>
                                                                                    </div>
                                                                                </div>
                                                                                <div id="contenedor_grupo_parenteral">
                                                                                    <div id="grupo_parenteral">
                                                                                        <form>
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">N°</label>
                                                                                                        <input type="number" class="form-control form-control-sm" name="tono_grupo_estudio" id="tono_grupo_estudio">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Fecha</label>
                                                                                                        <input type="date" class="form-control form-control-sm" name="tono_grupo_estudio" id="tono_grupo_estudio" value="hoy">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Nombre</label>
                                                                                                        <input type="text" class="form-control form-control-sm" name="tono_grupo_estudio" id="tono_grupo_estudio">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Vía</label>
                                                                                                        <select name="est_tono" id="est_tono" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle("est_tono","div_est_ton","obs_est_tono",6);">
                                                                                                            <option selected  value="1">Endovenosa directa</option>
                                                                                                            <option value="2">Intramuscular</option>
                                                                                                            <option value="3">Al Suero</option>
                                                                                                            <option value="4">Otra vía </option>
                                                                                                            <option value="5">Otro</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Gotas/min</label>
                                                                                                        <input type="number" class="form-control form-control-sm" name="tono_grupo_estudio" id="tono_grupo_estudio">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Tolerancia</label>
                                                                                                        <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tono_musc_grupo_es" id="obs_tono_musc_grupo_es"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="tab-pane fade show" id="ttoovias" role="tabpanel" aria-labelledby="ttoovias-tab">
                                                                                <div class="row">
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                        <h6 class="t-aten pt-2 float-left">Otras vías de Administración</h6>
                                                                                        <button type="button" class="btn btn-info-light-c btn-xxs btn-agregar-grupo-otvia float-right mb-3" ><i class="fas fa-plus"></i> Añadir medicación otras vías adm</button>
                                                                                    </div>
                                                                                </div>
                                                                                <div id="contenedor_grupo_otvia">
                                                                                    <div id="grupo_otvia">
                                                                                        <form>
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">N°</label>
                                                                                                        <input type="number" class="form-control form-control-sm" name="tono_grupo_estudio" id="tono_grupo_estudio">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Fecha</label>
                                                                                                        <input type="date" class="form-control form-control-sm" name="tono_grupo_estudio" id="tono_grupo_estudio" value="hoy">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Nombre</label>
                                                                                                        <input type="text" class="form-control form-control-sm" name="tono_grupo_estudio" id="tono_grupo_estudio">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Vía Administración</label>
                                                                                                        <select name="est_tono" id="est_tono" class="form-control form-control-sm">
                                                                                                            <option selected  value="1">Nasal</option>
                                                                                                            <option value="2">Rectal</option>
                                                                                                            <option value="3">Vaginal</option>
                                                                                                            <option value="3">Uretral (sonda)</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm">Tolerancia</label>
                                                                                                        <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tono_musc_grupo_es" id="obs_tono_musc_grupo_es"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Observaciones Tratamiento</label>
                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen mamas" data-seccion="Mamas" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_audicion" id="obs_ex_audicion"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade show" id="cur_dom" role="tabpanel" aria-labelledby="cur_dom_tab">
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <h6 class="t-aten pt-2 float-left">CURACIONES</h6>
                                                                        <button type="button" class="btn btn-info-light-c btn-xxs btn-agregar-grupo_curaciones float-right mb-3" ><i class="fas fa-plus"></i>Añadir curación</button>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <div id="contenedor_grupo_curaciones">
                                                                            <div id="grupo_curaciones">
                                                                                <form>
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">N°</label>
                                                                                                <input type="number" class="form-control form-control-sm" name="tono_grupo_estudio" id="tono_grupo_estudio">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Fecha</label>
                                                                                                <input type="date" class="form-control form-control-sm" name="tono_grupo_estudio" id="tono_grupo_estudio" value="hoy">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Zona</label>
                                                                                                <select name="est_tono" id="est_tono" class="form-control form-control-sm">
                                                                                                    <option selected  value="1">Escara</option>
                                                                                                    <option value="2">Herida Operatoria</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Procedimiento (materiales-otros)</label>
                                                                                                <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tono_musc_grupo_es" id="obs_tono_musc_grupo_es"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--RESUMEN DIARIO-->
                                                            <div class="tab-pane fade show" id="eval_diarias" role="tabpanel" aria-labelledby="eval_diarias_tab">
                                                               <form>
                                                                    <div class="form-row mt-2">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-2">
                                
                                                                            <h6 class="t-aten text-center">Estado General y control de Signos</h6>
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1 mt-2 ">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">N° de Controles</label>
                                                                                        <input type="number" class="form-control form-control-sm" name="tono_grupo_estudio" id="tono_grupo_estudio">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 mt-2">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Dolor</label>
                                                                                        <input  type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 mt-2">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Descanso</label>
                                                                                        <input  type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 mt-2">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Signos vitales</label>
                                                                                        <input  type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 mt-2">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Resumen</label>
                                                                                        <input  type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Observaciones Control Estado general</label>
                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen mamas" data-seccion="Mamas" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_audicion" id="obs_ex_audicion"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                     <div class="form-row mt-2">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-2">
                                                                            <h6 class="t-aten text-center">Alimentación</h6>
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1 mt-2 ">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">N° de Controles</label>
                                                                                        <input type="number" class="form-control form-control-sm" name="tono_grupo_estudio" id="tono_grupo_estudio">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 mt-2">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Dolor</label>
                                                                                        <input  type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 mt-2">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Descanso</label>
                                                                                        <input  type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 mt-2">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Signos vitales</label>
                                                                                        <input  type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 mt-2">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Resumen</label>
                                                                                        <input  type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Observaciones Control Alimentación</label>
                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen mamas" data-seccion="Mamas" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_audicion" id="obs_ex_audicion"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                     <div class="form-row  mt-2">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-2">
                                                                            <h6 class="t-aten text-center">Tratamientos</h6>
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1 mt-2 ">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">N° de Controles</label>
                                                                                        <input type="number" class="form-control form-control-sm" name="tono_grupo_estudio" id="tono_grupo_estudio">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 mt-2">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Dolor</label>
                                                                                        <input  type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 mt-2">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Descanso</label>
                                                                                        <input  type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 mt-2">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Signos vitales</label>
                                                                                        <input  type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 mt-2">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Resumen</label>
                                                                                        <input  type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Observaciones Control Tratamientos</label>
                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen mamas" data-seccion="Mamas" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_audicion" id="obs_ex_audicion"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                     <div class="form-row  mt-2">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-2">
                                                                            <h6 class="t-aten text-center">Curaciones</h6>
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1 mt-2 ">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">N° de Controles</label>
                                                                                        <input type="number" class="form-control form-control-sm" name="tono_grupo_estudio" id="tono_grupo_estudio">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 mt-2">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Dolor</label>
                                                                                        <input  type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 mt-2">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Descanso</label>
                                                                                        <input  type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 mt-2">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Signos vitales</label>
                                                                                        <input  type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 mt-2">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Resumen</label>
                                                                                        <input  type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm">Observaciones Curaciones</label>
                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen mamas" data-seccion="Mamas" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_audicion" id="obs_ex_audicion"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-2">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                                                        <button class="btn btn-success-light-c btn-sm"><i class="feather icon-save"></i> Guardar resumen de turno</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
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

                         <!--GUARDAR O IMPRIMIR FICHA-->
                        <div class="row mb-3">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                <input type="submit" class="btn btn-info btn-sm mt-1" onclick="$('#cerrarsession').val('1');agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar ficha y finalizar su consulta">
                                <input type="submit" class="btn btn-purple btn-sm mt-1" onclick="agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar ficha e ir a su agenda">
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

@section('page-script-ficha-atencion')
<script>
    /** cargar tratamiento oral */
    function agregarTratamiento(){
        var html = '';
            html += '<div id="contenedor_grupo_tratamiento">';
            html += '<div id="grupo_tratamiento">';
            html += '<form>';
            html += '   <div class="form-row">';
            html += '       <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">';
            html += '           <div class="form-group">';
            html += '               <label class="floating-label-activo-sm">N°</label>';
            html += '               <input type="number" class="form-control form-control-sm" name="tono_grupo_estudio" id="tono_grupo_estudio">';
            html += '           </div>';
            html += '       </div>';
            html += '      <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">';
            html += '        <div class="form-group">';
            html += '         <label class="floating-label-activo-sm">Fecha</label>';
            html += '         <input type="date" class="form-control form-control-sm" name="tono_grupo_estudio" id="tono_grupo_estudio" value="hoy">';
            html += '      </div>';
            html += '   </div>';
            html += '       <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
            html += '           <div class="form-group">';
            html += '               <label class="floating-label-activo-sm">Nombre</label>';
            html += '               <input type="number" class="form-control form-control-sm" name="tono_grupo_estudio" id="tono_grupo_estudio">';
            html += '           </div>';
            html += '       </div>';
            html += '       <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
            html += '           <div class="form-group">';
            html += '               <label class="floating-label-activo-sm">Vía Administración</label>';
            html += '               <select name="est_tono" id="est_tono" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle("est_tono","div_est_ton","obs_est_tono",6);">';
            html += '                   <option selected  value="1">Oral</option>';
            html += '                   <option value="2">Oral Sonda Orogástrica</option>';
            html += '                   <option value="3">Oral Sonda nasogástrica</option>';
            html += '               </select>';
            html += '           </div>';
            html += '       </div>';
            html += '       <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
            html += '           <div class="form-group">';
            html += '               <label class="floating-label-activo-sm">Tolerancia</label>';
            html += '               <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tono_musc_grupo_es" id="obs_tono_musc_grupo_es"></textarea>';
            html += '           </div>';
            html += '        </div>';
            html += '   </div>';
            html += '</form>';

            html += '</div>';
            html += '</div>';
        $('#contenedor_grupo_tratamiento').append(html);
    }
    $(document).ready(function(){
        $('.btn-agregar-grupo-tratamiento').click(function(){
            agregarTratamiento()();
        });
    });

    /** cargar tratamiento parenteral */
    function agregarParenteral(){
        var html = '';
            html += '<div id="contenedor_grupo_parenteral">';
            html += '<div id="grupo_parenteral">';
            html += '<form>';
            html += '   <div class="form-row">';
            html += '       <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">';
            html += '           <div class="form-group">';
            html += '               <label class="floating-label-activo-sm">N°</label>';
            html += '               <input type="number" class="form-control form-control-sm" name="tono_grupo_estudio" id="tono_grupo_estudio">';
            html += '           </div>';
            html += '       </div>';
            html += '      <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">';
            html += '        <div class="form-group">';
            html += '         <label class="floating-label-activo-sm">Fecha</label>';
            html += '         <input type="date" class="form-control form-control-sm" name="tono_grupo_estudio" id="tono_grupo_estudio" value="hoy">';
            html += '      </div>';
            html += '   </div>';
            html += '       <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">';
            html += '           <div class="form-group">';
            html += '               <label class="floating-label-activo-sm">Nombre</label>';
            html += '               <input type="number" class="form-control form-control-sm" name="tono_grupo_estudio" id="tono_grupo_estudio">';
            html += '           </div>';
            html += '       </div>';
            html += '       <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
            html += '           <div class="form-group">';
            html += '               <label class="floating-label-activo-sm">Vía</label>';
            html += '               <select name="est_tono" id="est_tono" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle("est_tono","div_est_ton","obs_est_tono",6);">';
            html += '                   <option selected  value="1">Endovenosa directa</option>';
            html += '                   <option value="2">Intramuscular</option>';
            html += '                   <option value="3">Al Suero</option>';
            html += '                   <option value="4">Otra vía </option>';
            html += '                   <option value="5">Otro</option>';
            html += '               </select>';
            html += '           </div>';
            html += '       </div>';
            html += '       <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">';
            html += '           <div class="form-group">';
            html += '               <label class="floating-label-activo-sm">Gotas/min</label>';
            html += '               <input type="number" class="form-control form-control-sm" name="tono_grupo_estudio" id="tono_grupo_estudio">';
            html += '           </div>';
            html += '       </div>';
            html += '       <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
            html += '           <div class="form-group">';
            html += '               <label class="floating-label-activo-sm">Tolerancia</label>';
            html += '               <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tono_musc_grupo_es" id="obs_tono_musc_grupo_es"></textarea>';
            html += '           </div>';
            html += '        </div>';
            html += '   </div>';
            html += '</form>';

            html += '</div>';
            html += '</div>';
        $('#contenedor_grupo_parenteral').append(html);
    }
    $(document).ready(function(){
        $('.btn-agregar-grupo-parenteral').click(function(){
            agregarParenteral()();
        });
    });
    /** cargar tratamiento otras vias */
    function agregarTrOvia(){
        var html = '';
            html += '<div id="contenedor_grupo_otvia">';
            html += '<div id="grupo_otvia">';
            html += '<form>';
            html += '   <div class="form-row">';
            html += '       <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">';
            html += '           <div class="form-group">';
            html += '               <label class="floating-label-activo-sm">N°</label>';
            html += '               <input type="number" class="form-control form-control-sm" name="tono_grupo_estudio" id="tono_grupo_estudio">';
            html += '           </div>';
            html += '       </div>';
            html += '      <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">';
            html += '        <div class="form-group">';
            html += '         <label class="floating-label-activo-sm">Fecha</label>';
            html += '         <input type="date" class="form-control form-control-sm" name="tono_grupo_estudio" id="tono_grupo_estudio" value="hoy">';
            html += '      </div>';
            html += '   </div>';
            html += '       <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
            html += '           <div class="form-group">';
            html += '               <label class="floating-label-activo-sm">Nombre</label>';
            html += '               <input type="number" class="form-control form-control-sm" name="tono_grupo_estudio" id="tono_grupo_estudio">';
            html += '           </div>';
            html += '       </div>';
            html += '       <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
            html += '           <div class="form-group">';
            html += '               <label class="floating-label-activo-sm">Vía Administración</label>';
            html += '               <select name="est_tono" id="est_tono" class="form-control form-control-sm" >';
            html += '                   <option selected  value="1">Nasal</option>';
            html += '                   <option value="2">Rectal</option>';
            html += '                   <option value="3">Vaginal</option>';
            html += '                   <option value="3">Uretral (sonda)</option>';
            html += '               </select>';
            html += '           </div>';
            html += '       </div>';
            html += '       <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
            html += '           <div class="form-group">';
            html += '               <label class="floating-label-activo-sm">Tolerancia</label>';
            html += '               <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tono_musc_grupo_es" id="obs_tono_musc_grupo_es"></textarea>';
            html += '           </div>';
            html += '        </div>';
            html += '   </div>';
            html += '</form>';
            html += '</div>';
            html += '</div>';
        $('#contenedor_grupo_otvia').append(html);
    }
    $(document).ready(function(){
        $('.btn-agregar-grupo-otvia').click(function(){
            agregarTrOvia()();
        });
    });

    /** cargar controlvital */
    function agregarControlvital(){
        var html = '';
            html += '<div id="contenedor_grupo_controlvital">';
            html += '<div id="grupo_controlvital">';
            html += '<form>';
            html += '   <div class="form-row">';
            html += '       <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">';
            html += '           <div class="form-group">';
            html += '               <label class="floating-label-activo-sm">N°</label>';
            html += '               <input type="number" class="form-control form-control-sm" name="tono_grupo_estudio" id="tono_grupo_estudio">';
            html += '           </div>';
            html += '       </div>';
            html += '      <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">';
            html += '        <div class="form-group">';
            html += '         <label class="floating-label-activo-sm">Fecha</label>';
            html += '         <input type="date" class="form-control form-control-sm" name="tono_grupo_estudio" id="tono_grupo_estudio" value="hoy">';
            html += '      </div>';
            html += '   </div>';
            html += '       <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">';
            html += '           <div class="form-group">';
            html += '               <label class="floating-label-activo-sm">Pulso</label>';
            html += '               <input type="number" class="form-control form-control-sm" name="tono_grupo_estudio" id="tono_grupo_estudio">';
            html += '           </div>';
            html += '       </div>';
            html += '       <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">';
            html += '           <div class="form-group">';
            html += '               <label class="floating-label-activo-sm">Presión</label>';
            html += '               <input type="text" class="form-control form-control-sm" name="tono_grupo_estudio" id="tono_grupo_estudio">';
            html += '           </div>';
            html += '       </div>';
            html += '       <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">';
            html += '       <div class="form-group">';
            html += '       <label class="floating-label-activo-sm">T°</label>';
            html += '       <input type="text" class="form-control form-control-sm" name="tono_grupo_estudio" id="tono_grupo_estudio">';
            html += '       </div>';
            html += '       </div>';
            html += '       <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">';
            html += '           <div class="form-group">';
            html += '               <label class="floating-label-activo-sm">Comunicación y Conciencia</label>';
            html += '               <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tono_musc_grupo_es" id="obs_tono_musc_grupo_es"></textarea>';
            html += '           </div>';
            html += '        </div>';
            html += '   </div>';
            html += '</form>';

            html += '</div>';
            html += '</div>';
        $('#contenedor_grupo_controlvital').append(html);
    }
    $(document).ready(function(){
        $('.btn-agregar-grupo-controlvital').click(function(){
            agregarControlvital()();
        });
    });

    /** cargar Aliment parenteral */
    function  agregarControlAlimentacion(){
        var html = '';
            html += '<div id="contenedor_grupo_alimentacion">';
            html += '<div id="grupo_alimentacion">';
            html += '<form>';
            html += '   <div class="form-row">';
            html += '       <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">';
            html += '           <div class="form-group">';
            html += '               <label class="floating-label-activo-sm">N°</label>';
            html += '               <input type="number" class="form-control form-control-sm" name="tono_grupo_estudio" id="tono_grupo_estudio">';
            html += '           </div>';
            html += '       </div>';
            html += '      <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">';
            html += '        <div class="form-group">';
            html += '         <label class="floating-label-activo-sm">Fecha</label>';
            html += '         <input type="date" class="form-control form-control-sm" name="tono_grupo_estudio" id="tono_grupo_estudio" value="hoy">';
            html += '      </div>';
            html += '   </div>';
            html += '       <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">';
            html += '           <div class="form-group">';
            html += '               <label class="floating-label-activo-sm">Nombre Medic</label>';
            html += '               <input type="number" class="form-control form-control-sm" name="tono_grupo_estudio" id="tono_grupo_estudio">';
            html += '           </div>';
            html += '       </div>';
            html += '       <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">';
            html += '           <div class="form-group">';
            html += '               <label class="floating-label-activo-sm">Vía</label>';
            html += '              <select name="est_tono" id="est_tono" class="form-control form-control-sm">';
            html += '                <option selected  value="1">Endovenosa directa</option>';
            html += '                <option value="2">Sonda Gástrica</option>';
            html += '                <option value="3">Sonda Naso-Gástrica</option>';
            html += '              </select>';
            html += '           </div>';
            html += '       </div>';
            html += '       <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">';
            html += '       <div class="form-group">';
            html += '       <label class="floating-label-activo-sm">Gotas/Min</label>';
            html += '       <input type="text" class="form-control form-control-sm" name="tono_grupo_estudio" id="tono_grupo_estudio">';
            html += '       </div>';
            html += '       </div>';
            html += '       <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">';
            html += '           <div class="form-group">';
            html += '               <label class="floating-label-activo-sm">Tolerancia</label>';
            html += '               <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tono_musc_grupo_es" id="obs_tono_musc_grupo_es"></textarea>';
            html += '           </div>';
            html += '        </div>';
            html += '   </div>';
            html += '</form>';

            html += '</div>';
            html += '</div>';
        $('#contenedor_grupo_alimentacion').append(html);
    }
    $(document).ready(function(){
        $('.btn-agregar-grupo-alimentacion').click(function(){
            agregarControlAlimentacion()();
        });
    });


    /** cargar controlevacuaciones */
    function agregarControlevacuaciones(){
        var html = '';
            html += '<div id="contenedor_grupo_evacuaciones">';
            html += '<div id="grupo_evacuaciones">';
            html += '<form>';
            html += '   <div class="form-row">';
            html += '       <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">';
            html += '           <div class="form-group">';
            html += '               <label class="floating-label-activo-sm">N°</label>';
            html += '               <input type="number" class="form-control form-control-sm" name="tono_grupo_estudio" id="tono_grupo_estudio">';
            html += '           </div>';
            html += '       </div>';
            html += '      <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">';
            html += '        <div class="form-group">';
            html += '         <label class="floating-label-activo-sm">Fecha</label>';
            html += '         <input type="date" class="form-control form-control-sm" name="tono_grupo_estudio" id="tono_grupo_estudio" value="hoy">';
            html += '      </div>';
            html += '   </div>';
            html += '        <div class="form-group col-md-3">';
            html += '           <div class="form-group">';
            html += '               <label class="floating-label-activo-sm">Vomitos</label>';
            html += '                <textarea class="form-control form-control-sm" rows="1"name="" id=""  onfocus="this.rows=4" onblur="this.rows=2;"></textarea>';
            html += '           </div>';
            html += '       </div>';
            html += '        <div class="form-group col-md-3">';
            html += '           <div class="form-group">';
            html += '               <label class="floating-label-activo-sm">Diurésis</label>';
            html += '               <textarea class="form-control form-control-sm" rows="1"name="" id=""  onfocus="this.rows=4" onblur="this.rows=2;"></textarea>';
            html += '           </div>';
            html += '       </div>';
            html += '        <div class="form-group col-md-3">';
            html += '       <div class="form-group">';
            html += '       <label class="floating-label-activo-sm">Deposiciones</label>';
            html += '       <textarea class="form-control form-control-sm" rows="1"name="" id=""  onfocus="this.rows=4" onblur="this.rows=2;"></textarea>';
            html += '       </div>';
            html += '       </div>';

            html += '   </div>';
            html += '</form>';

            html += '</div>';
            html += '</div>';
        $('#contenedor_grupo_evacuaciones').append(html);
    }
    $(document).ready(function(){
        $('.btn-agregar-grupo-evacuaciones').click(function(){
            agregarControlevacuaciones()();
        });
    });

    /** cargar controlevacuaciones */
    function agregarControlcuraciones(){
        var html = '';
            html += '<div id="contenedor_grupo_curaciones">';
            html += '<div id="grupo_curaciones">';
            html += '<form>';
            html += '   <div class="form-row">';
            html += '       <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">';
            html += '           <div class="form-group">';
            html += '               <label class="floating-label-activo-sm">N°</label>';
            html += '               <input type="number" class="form-control form-control-sm" name="tono_grupo_estudio" id="tono_grupo_estudio">';
            html += '           </div>';
            html += '       </div>';
            html += '      <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">';
            html += '        <div class="form-group">';
            html += '         <label class="floating-label-activo-sm">Fecha</label>';
            html += '         <input type="date" class="form-control form-control-sm" name="tono_grupo_estudio" id="tono_grupo_estudio" value="hoy">';
            html += '      </div>';
            html += '   </div>';
            html += '        <div class="form-group col-md-3">';
            html += '           <div class="form-group">';
            html += '                <label class="floating-label-activo-sm">Zona</label>';
            html += '                <select name="est_tono" id="est_tono" class="form-control form-control-sm">';
            html += '                  <option selected  value="1">Escara</option>';
            html += '                  <option value="2">Herida Operatória</option>';
            html += '                </select>';
            html += '           </div>';
            html += '       </div>';
            html += '        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">';
            html += '           <div class="form-group">';
            html += '                <label class="floating-label-activo-sm">Procedimiento(materiales-otros)</label>';
            html += '                <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tono_musc_grupo_es" id="obs_tono_musc_grupo_es"></textarea>';
            html += '           </div>';
            html += '       </div>';

            html += '   </div>';
            html += '</form>';

            html += '</div>';
            html += '</div>';
        $('#contenedor_grupo_curaciones').append(html);
    }
    $(document).ready(function(){
        $('.btn-agregar-grupo_curaciones').click(function(){
            agregarControlcuraciones()();
        });
    });
</script>
<script>
        $(document).ready(function() {

            $('#hip-diag_spec').keyup(function(){
                if($.trim(this.value) != ''){
                    $('.btn_agregar_medicamento').removeAttr("disabled");
                    $('.btn_medicamento_pdf').removeAttr("disabled");
                    $('.btn_agregar_examen').removeAttr("disabled");
                    $('.btn_examenes_pdf').removeAttr("disabled");
                }
                else
                {
                    $('.btn_agregar_medicamento').attr('disabled','disabled');
                    $('.btn_medicamento_pdf').attr('disabled','disabled');
                    $('.btn_agregar_examen').attr('disabled','disabled');
                    $('.btn_examenes_pdf').attr('disabled','disabled');
                }
            });

            $("#descripcion_cie_esp").autocomplete({
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
                    $('#descripcion_cie_esp').val(ui.item.label); // display the selected text
                    $('#id_descripcion_cie_esp').val(ui.item.value); // save selected id to input
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

        })

        function cargarIgual(input){
            let actual = $('#'+input);
            let equivalentes = $('#'+input).attr('data-input_igual').split(',');
            $.each(equivalentes, function( index, value ) {
                var equivalente = $('#'+value);
                equivalente.val(actual.val());
            });
            {{--
            let actual = $('#'+input);
            let equivalente = $('#'+$('#'+input).attr('data-input_igual'));

            equivalente.val(actual.val());
            --}}
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

 /** MANEJO DE IMAGENES */

 var DropzoneReceta_enf;
 Dropzone.options.misImagenesRecetaEnf  = {
     init:function()
     {
         DropzoneReceta_enf = this;
     },
     url: "{{ route('profesional.imagen.carga') }}",
     method: 'post',
     createImageThumbnails: true,
     addRemoveLinks: true,
     headers:{
         'X-CSRF-TOKEN' : CSRF_TOKEN,

     },

     acceptedFiles: "image/*",
     maxFilesize: 2,
     maxFiles: 1,

     dictDefaultMessage: "Arrastre una imagen al recuadro para subirlo.",


     dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",

     dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",


      dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",

     dictInvalidFileType: "No puedes subir archivos de este tipo.",


     dictCancelUpload: "Cancelar carga",


     dictUploadCanceled: "Subida cancelada.",


     dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",


     dictRemoveFile: "Eliminar archivo",


     dictMaxFilesExceeded: "No puede cargar más archivos.",


     success: function(file, response)
     {
    // console.log('-------------success-----------------------');
     cargar_lista_imagenes(DropzoneReceta_enf, 'img_receta_enf');

    if (file.previewElement) {
        return file.previewElement.classList.add("dz-success");
    }
     },
     error(file, message) {
         // console.log('-------------error-----------------------');
         if (file.previewElement) {
             file.previewElement.classList.add("dz-error");
             if (typeof message !== "string" && message.error)
             {
                 message = message.error;
             }
             else
             {
                 message = message.message;
             }
             for (let node of file.previewElement.querySelectorAll( "[data-dz-errormessage]" )) {
                 node.textContent = message;
             }
         }
     },
     removedfile(file) {
         // console.log('-------------removedfile-----------------------');
         cargar_lista_imagenes(DropzoneReceta_enf, 'img_receta_enf');
         if (file.previewElement != null && file.previewElement.parentNode != null) {
             file.previewElement.parentNode.removeChild(file.previewElement);
         }
         return this._updateMaxFilesReachedClass();
     },
     canceled: function canceled(file) {
         cargar_lista_imagenes(DropzoneReceta_enf, 'img_receta_enf');
         return this.emit("error", file, this.options.dictUploadCanceled);
     },
 };
 var lista_imagenes = [];
 var lista_imagenes = {};
 function cargar_lista_imagenes(obj_dropzone, alias_examen)
 {

     // console.log('--------------cargar_lista_imagenes----------------------');
     lista_imagenes[alias_examen] = [];
     let temp  = obj_dropzone.getAcceptedFiles();
     $.each(temp, function( index, value )
     {
        url: "{{ route('profesional.imagen.carga') }}",
         if(value.status == "success")
         {
             if(value.xhr !== undefined)
             {
                 var img_temp = JSON.parse(value.xhr.response);
                 lista_imagenes[alias_examen][index] = [
                     url=img_temp.img.url,
                     nombre_origian= img_temp.img.original_file_name,
                     nombre_img = img_temp.img.nombre_img,
                     file_extension = img_temp.img.file_extension,
                 ];
                 $('#input_lista_imagenes').val('');
                 $('#input_lista_imagenes').val(JSON.stringify(lista_imagenes));
             }
         }
     });
 }


</script>
@endsection


