<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2 shadow-none">
        <div class="row mx-0">
            <div class="col-sm-12 col-md-12">

            </div>
            <div class="col-sm-12 col-md-12">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="traumato_general" role="tablist">
                    <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="atencion_traumato-tab" data-toggle="tab" href="#atencion_traumato" role="tab" aria-controls="atencion_traumato_gen" aria-selected="false">Ficha Traumatología y Ortopedia</a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="alert-atencion alert alert-warning-b alert-dismissible fade show" role="alert" id="mensaje_ficha"></div>
            </div>

            <div class="col-sm-12 col-md-12">
                <form action="{{ route('fichaAtencion.registrar_ficha_trau_ort') }}" method="POST">
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
                    <input type="hidden" name="input_lista_imagenes" id="input_lista_imagenes" value="">

                    @csrf
                    <div class="tab-content" id="traumato-contenido">

                        <!--ATENCIÓN TRAUMATOLOGIA-->
                        <div class="tab-pane fade show active " id="atencion_traumato" role="tabpanel" aria-labelledby="atencion_traumato-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <!--FORMULARIOS-->
                                    <div class="row">
									
                                        <!--Formulario / Menor de edad-->
										@include('general.secciones_ficha.seccion_menor', ['tipo_ficha' => "1"])
										<!--Cierre: Formulario / Menor de edad-->

                                        <!--Motivo consulta-->
                                        @include('general.secciones_ficha.motivo')

                                        <!--EXAMEN ESPECIALIDAD - PARAMETROS DE CONTROL-->
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" id="traumato">
                                            <div class="card-a">
                                                <div class="card-header-a" id="exam_esp_traumatologia">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left has-ripple card-act-open collapsed" type="button" data-toggle="collapse" data-target="#exam_esp_traumatologia_c" aria-expanded="false" aria-controls="exam_esp_traumatologia_c">
                                                        Examen Paciente Traumatología
                                                    </button>
                                                </div>
                                                <div id="exam_esp_traumatologia_c" class="collapse" aria-labelledby="exam_esp_traumatologia" data-parent="#exam_esp_traumatologia">
                                                    <div class="card-body-aten-a">
                                                        <div id="form-traumato">
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <ul class="nav nav-tabs-aten nav-fill mb-2" id="ev-crec_des_trauma" role="tablist">
                                                                        {{-- <li class="nav-item">
                                                                            <a class="nav-link-aten text-reset active" id="exam-traumato-ft-tab" data-toggle="tab" href="#exam-traumato-ft" role="tab" aria-controls="exam-traumato-ft" aria-selected="true">Ficha tipo</a>
                                                                        </li> --}}
                                                                        <li class="nav-item">
                                                                            <a class="nav-link-aten text-reset active" id="examen-segment-traumato-tab" data-toggle="tab" href="#examen-segment-traumato" role="tab" aria-controls="examen-segment-traumato" aria-selected="false">Exámen segmentario</a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link-aten text-reset" id="examen-traumato-tab" data-toggle="tab" href="#examen-traumato" role="tab" aria-controls="examen-traumato" aria-selected="false">Tumores y otros </a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link-aten text-reset" id="ex_plan_tto-tab" data-toggle="tab" href="#ex_plan_tto" role="tab" aria-controls="ex_plan_tto" aria-selected="true">Plan de tratamiento</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <div class="tab-content" id="trauma">
                                                                        <!--FICHA TIPO-->
                                                                        {{-- <div class="tab-pane fade" id="exam-traumato-ft" role="tabpanel" aria-labelledby="exam-traumato-ft-tab">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <h6 class="f-16 text-c-blue mb-3">Ficha tipo</h6>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row">
                                                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                    <label class="floating-label-activo-sm">Carga ficha tipo</label>
                                                                                    <select class="form-control form-control-sm" id="select_ficha_tipo_especialidad" onchange="cargar_info_ficha_tipo_ped_gen('select_ficha_tipo_especialidad','descripcion_ficha_tipo_especialidad');">
                                                                                        <option value="">Seleccione</option>
                                                                                        @if(!empty($fichaTipo['ped_gen']))
                                                                                            @foreach ($fichaTipo['ped_gen'] as $ft )
                                                                                                <option value="{{ $ft->id }}" data-descripcion="{{ $ft->descripcion }}">{{ $ft->nombre }}</option>
                                                                                            @endforeach
                                                                                        @endif
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                    <span id="descripcion_ficha_tipo_especialidad"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div> --}}

                                                                        <!--EXAMEN FISICO-->
                                                                        <div class="tab-pane fade show active" id="examen-segment-traumato" role="tabpanel" aria-labelledby="examen-segment-traumato-tab">
                                                                            <div class="row">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <h6 class="t-aten">Examen segmentario</h6>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm" for="e_causa_traum">Causa</label>
                                                                                        <select name="e_causa_traum" id="e_causa_traum" data-titulo="Causa" data-seccion="Examen Segmentario" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('e_causa_traum','div_e_causa_traum','obs_e_causa_traum',4)">
                                                                                            <option selected value="1">Accidente deportivo</option>
                                                                                            <option selected value="2">Accidente casero</option>
                                                                                            <option selected value="3">Accidente Hogar</option>
                                                                                            <option value="4">Otro Describir</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group" id="div_e_causa_traum" style="display:none">
                                                                                        <label class="floating-label-activo-sm" for="mc_masas_tu">Describir examen de otra causa</label>
                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Causa" data-seccion="Examen Segmentario" data-tipo="Traumatología" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_e_causa_traum" id="obs_e_causa_traum"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm" for="mc_ex_fisico_cons">Motivo de consulta y Examen general </label>
                                                                                        <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" data-titulo="Motivo de consulta y Examen general" data-seccion="Examen segmentario" data-tipo="Traumatología"  name="mc_ex_fisico_cons" id="mc_ex_fisico_cons" placeholder="ZONA DOLOROSA, CUANDO DUELE, CEG, EXAMEN  OSTEO-ARTICULAR GENERAL EVALUACIÓN EVA "></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm" for="obs_egp_tr">Observaciones estado general del paciente</label>
                                                                                        <textarea class="form-control caja-texto form-control-sm"rows="2"  onfocus="this.rows=3" onblur="this.rows=2;" data-titulo="Observaciones estado general del paciente" data-seccion="Examen segmentario" data-tipo="Traumatología"  onfocus="this.rows=3" onblur="this.rows=2;" name="obs_egp_tr" id="obs_egp_tr" placeholder="OBSERVACIONES ACERCA DEL ESTADO GENERAL DEL PACIENTE"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!--masas y tu-->
                                                                        <div class="tab-pane fade show" id="examen-traumato" role="tabpanel" aria-labelledby="examen-traumato-tab">
                                                                            <div class="row">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <h6 class="t-aten">Masas y Tumores</h6>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm" for="mc_masas_tu">Consulta Masas y Tumores </label>
                                                                                        <textarea class="form-control caja-texto form-control-sm" rows="2"  onfocus="this.rows=3" onblur="this.rows=2;" data-titulo="Consulta Masas y Tumores " data-seccion="Masas y Tumores" data-tipo="Traumatología" name="mc_masas_tu" id="mc_masas_tu" placeholder="PRESENCIA DE MASAS Y TUMORES DESCRIBA LOCALIZACIÓN Y SINTOMATOLOGIA"></textarea>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-sm-12 col-md-12 col-md-12 col-lg-12">
                                                                                    <div class="form-group">
                                                                                        <label class="floating-label-activo-sm" for="egp_trauma_mt">Estado General del Paciente</label>
                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Estado General del Paciente" data-seccion="Masas y Tumores" data-tipo="Traumatología" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="egp_trauma_mt" id="egp_trauma_mt" placeholder="ANOTE APRECIACIÓN SOBRE ESTADO GENERAL DEL PACIENTE Y OBSERVACIONES"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <!--plan tto-->
                                                                        <div class="tab-pane fade show" id="ex_plan_tto" role="tabpanel" aria-labelledby="ex_plan_tto-tab">
                                                                            <script type="text/javascript">
                                                                                   $(document).ready(function() {
                                                                                    });
                                                                            </script>
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <h6 class="t-aten">Plan de Tratamiento</h6>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row mt-0">
                                                                                <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                    <label class="ml-0"><strong>Tratamiento médico</strong></label>
                                                                                    <div class="switch switch-success d-inline m-r-10">
                                                                                        <input type="checkbox" id="tto_trauma" name="tto_trauma" value="1" onchange="javascript:showContentTto_trauma()" />
                                                                                        <label for="tto_trauma" class="cr"></label>
                                                                                    </div>
                                                                                    <div id="contentTto_trauma" style="display: none;">
                                                                                        <div class="form-row">
                                                                                            <div class="form-group col-md-12 mt-1">
                                                                                                <label class="floating-label-activo-sm" for="rec_tto_trauma">Recomendaciones</label>
                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Recomendaciones" data-seccion="Plan" data-tipo="Traumatología"  rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="rec_tto_trauma" id="rec_tto_trauma"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                    <label class="ml-0"><strong>Procedimiento</strong></label>
                                                                                    <div class="switch switch-success d-inline m-r-10">
                                                                                        <input type="checkbox" id="pr_trauma" name="pr_trauma" value="1" onchange="javascript: showContentProc_trauma()" />
                                                                                        <label for="pr_trauma" class="cr"></label>
                                                                                    </div>

                                                                                    <div id="contentProc_trauma" style="display: none;">
                                                                                        <div class="form-row">
                                                                                            <div class="form-group col-md-4">
                                                                                                <label class="floating-label-activo-sm" for="tipo_proc_trauma"> Tipo</label>
                                                                                                <input type="text" class="form-control form-control-sm" name="tipo_proc_trauma" id="tipo_proc_trauma">
                                                                                            </div>
                                                                                            <div class="form-group col-md-8">
                                                                                                <label class="floating-label-activo-sm" for="plan_proc_trauma"> Plan</label>
                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Procedimiento" data-seccion="Tipo Procedimiento" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="plan_proc_trauma" id="plan_proc_trauma"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                    <label class="ml-0"><strong>Cirugía</strong></label>
                                                                                    <div class="switch switch-success d-inline m-r-10">
                                                                                        <input type="checkbox" class="custom-control-input" id="tr_gen_cir" name="tr_gen_cir" value="{!! old('tr_gen_cir') !!}">
                                                                                        <label class="cr" for="tr_gen_cir"></label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <div id="contentTto_trauma" style="display: none;">
                                                                                        <div class="form-row">
                                                                                            <div class="form-group col-md-12">
                                                                                                <h6 class="text-center">Tratamiento médico</h6>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row">
                                                                                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <label class="floating-label-activo-sm" for="obs_gen_plan_tto">Obs. Plan de tratamiento</label>
                                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Plan de tratamiento" data-seccion=" Plan de tratamiento" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_gen_plan_tto" id="obs_gen_plan_tto"></textarea>
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

                                        <!-- EXAMEN ESPECIALIDAD ORTOPEDIA -->
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" id="ortopedia">
                                            <div class="card-a">
                                                <div class="card-header-a" id="exam_esp_ortopedia">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left has-ripple card-act-open collapsed" type="button" data-toggle="collapse" data-target="#exam_esp_ortopedia_c" aria-expanded="false" aria-controls="exam_esp_ortopedia_c">
                                                        Examen Paciente Ortopedia
                                                    </button>
                                                </div>
                                                <div id="exam_esp_ortopedia_c" class="collapse" aria-labelledby="exam_esp_ortopedia" data-parent="#exam_esp_ortopedia">
                                                    <div class="card-body-aten-a">
                                                        <div id="form-ortop">
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <ul class="nav nav-tabs-aten nav-fill mb-2" id="ortopedia" role="tablist">
                                                                        <li class="nav-item">
                                                                            <a class="nav-link-aten text-reset " id="ortopedia_infanto_juv-tab" data-toggle="tab" href="#ortopedia_infanto_juv" role="tab" aria-controls="ortopedia_infanto_juv" aria-selected="true">Ortopedia del Infante</a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link-aten text-reset active" id="atenc_ortopedia_ad_tab" data-toggle="tab" href="#atenc_ortopedia_ad" role="tab" aria-controls="atenc_ortopedia_ad" aria-selected="true">Ortopedia Adulto</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <div class="tab-content" id="ortopedia">
                                                                        {{-- ortopedia infantil --}}
                                                                        <div class="tab-pane fade" id="ortopedia_infanto_juv" role="tabpanel" aria-labelledby="ortopedia_infanto_juv-tab">
                                                                            <div class="form-row mt-2">
                                                                                <div class="col-sm-12 col-md-3 col-lg-2 col-xl-2">
                                                                                    <div class="nav flex-column nav-pills mb-2" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                                        <a class="nav-link-aten text-reset active" id="orto_ped_gen-tab" data-toggle="tab" href="#orto_ped_gen" role="tab" aria-controls="orto_ped_gen" aria-selected="false">General</a>
                                                                                        <a class="nav-link-aten text-reset" id="orto_ped_ex_axial-tab" data-toggle="tab" href="#orto_ped_ex_axial" role="tab" aria-controls="orto_ped_ex_axial" aria-selected="false">Exploración Axial</a>
                                                                                        <a class="nav-link-aten text-reset" id="orto_ped_ms-tab" data-toggle="tab" href="#orto_ped_ms" role="tab" aria-controls="orto_ped_ms" aria-selected="false">Exploración Periférica Mb. Superior</a>
                                                                                        <a class="nav-link-aten text-reset" id="orto_ped_mi-tab" data-toggle="tab" href="#orto_ped_mi" role="tab" aria-controls="orto_ped_mi" aria-selected="false">Exploración Periférica Mb. Inferior</a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-9 col-lg-10 col-xl-10">
                                                                                    <div class="tab-content" id="v-pills-tabContent">
                                                                                        <div class="tab-pane fade show active" id="orto_ped_gen" role="tabpanel" aria-labelledby="orto_ped_gen-tab">
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                    <h6 class="t-aten">Exámen especialidad</h6>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12 col-md-6 col-lg-2 col-xl-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm" for="peso_ped"> Peso</label>
                                                                                                        <input type="text" class="form-control form-control-sm" name="peso_ped" id="peso_ped">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-6 col-lg-2 col-xl-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm" for="talla_ped"> Talla</label>
                                                                                                        <input type="text" class="form-control form-control-sm" name="talla_ped" id="talla_ped">
                                                                                                    </div>
                                                                                                </div>
                                                                                                 <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm" for="mov_espont">Movilidad Espontánea</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" data-titulo="Movilidad Espontánea" data-seccion="Exámen especialidad" data-tipo="traumatología" name="mov_espont" id="mov_espont" placeholder="ESTUDIO MOVILIDAD ESPONTÁNEA"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                    <div class="form-group" >
                                                                                                        <label class="floating-label-activo-sm" for="obs_gen_ex_esp">Obs. Generales</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" rows="2"  onfocus="this.rows=3" onblur="this.rows=2;" data-titulo="Obs. Generales" data-seccion="Exámen especialidad" data-tipo="traumatología" name="obs_gen_ex_esp" id="obs_gen_ex_esp" placeholder="OBSERVACIONES GENERALES DEL EXAMEN"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="tab-pane fade" id="orto_ped_ex_axial" role="tabpanel" aria-labelledby="orto_ped_ex_axial-tab">
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                    <h6 class="t-aten">Exploración Axial</h6>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm" for="exp_ax_mov_cerv">Movilidad Cervical</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Movilidad Cervical" data-seccion="Exploración Axial" data-tipo="traumatología" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="exp_ax_mov_cerv" id="exp_ax_mov_cerv"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm" for="exp_ax_mus_ecm">Musc Esternocleidomastoídeo</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Musc Esternocleidomastoídeo" data-seccion="Exploración Axial" data-tipo="traumatología" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="exp_ax_mus_ecm" id="exp_ax_mus_ecm"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm" for="exp_ax_t_adms"> Test de Adams</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Test de Adams" data-seccion="Exploración Axial" data-tipo="traumatología" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="exp_ax_t_adms" id="exp_ax_t_adms"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm" for="exp_ax_angiom">Angiomas vellosidades etc.</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Angiomas vellosidades etc" data-seccion="Exploración Axial" data-tipo="traumatología" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="exp_ax_angiom" id="exp_ax_angiom"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm" for="exp_ax_cif_lumb">Cifosis Lumbar</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Cifosis Lumbar" data-seccion="Exploración Axial" data-tipo="traumatología" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="exp_ax_cif_lumb" id="exp_ax_cif_lumb"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="tab-pane fade" id="orto_ped_ms" role="tabpanel" aria-labelledby="orto_ped_ms-tab">
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                    <h6 class="t-aten">Exploración Periférica Mb. Superior</h6>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm" for="fe_ext_msup"> Flexo-extensión de codo</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Flexo-extensión de codo" data-seccion="Exploración Periférica Mb. Superior"data-tipo="traumatología"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="fe_ext_msup" id="fe_ext_msup"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm" for="dedo_res_ext_msup"> Dedo en resorte</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo=" Dedo en resorte" data-seccion="Exploración Periférica Mb. Superior"data-tipo="traumatología"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="dedo_res_ext_msup" id="dedo_res_ext_msup"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm" for="rig_ext_msup">  Rigidez</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Rigidez" data-seccion="Exploración Periférica Mb. Superior" data-tipo="traumatología" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="rig_ext_msup" id="rig_ext_msup"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-row">
                                                                                                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                    <label class="floating-label-activo-sm" for="ex_msup_com">Comentarios</label>
                                                                                                    <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" data-titulo="Comentarios" data-seccion="Exploración Periférica Mb. Superior" data-tipo="traumatología" name="ex_msup_com" id="ex_msup_com"></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="tab-pane fade" id="orto_ped_mi" role="tabpanel" aria-labelledby="orto_ped_mi-tab">
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                    <h6 class="t-aten">Exploración Periférica Mb. Inferior</h6>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm" for="ex_minf_cad_orland">Cadera M. de Ortolani Barlow</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Cadera M. de Ortolani Barlow" data-seccion="Exploración Periférica Mb. Inferior" data-tipo="traumatología" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_minf_cad_orland" id="ex_minf_cad_orland"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm" for="ex_minf_abd">Abducción</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Abducción" data-seccion="Exploración Periférica Mb. Inferior" data-tipo="traumatología" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_minf_abd" id="ex_minf_abd"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm" for="ex_minf_pp">Pliegues Poplíteos</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Pliegues Poplíteos" data-seccion="Exploración Periférica Mb. Inferior" data-tipo="traumatología" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_minf_pp" id="ex_minf_pp"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm" for="ex_minf_rfr">Rodillas Flexo recurvatum</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Rodillas Flexo recurvatum" data-seccion="Exploración Periférica Mb. Inferior" data-tipo="traumatología" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_minf_rfr" id="ex_minf_rfr"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm" for="ex_minf_p_fd">Pié Flexión dorsal</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Pié Flexión dorsal" data-seccion="Exploración Periférica Mb. Inferior" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_minf_p_fd" id="ex_minf_p_fd"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm" for="ex_minf_p_vvrp">Pié Valgo / Varo de retropíe</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Pié Valgo/Varo de retropíe" data-seccion="Exploración Periférica Mb. Inferior" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_minf_p_vvrp" id="ex_minf_p_vvrp"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm" for="ex_minf_aspl">Aspecto Plantar</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Aspecto Plantar" data-seccion="Exploración Periférica Mb. Inferior" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_minf_aspl" id="ex_minf_aspl"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-row">
                                                                                            <div class="form-group col-md-12">
                                                                                                <label class="floating-label-activo-sm" for="obs_ex_oij">Observaciones Ortopedia del Infanto-juvenil</label>
                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Ortopedia del Infanto-juvenil" data-seccion="Examen Ortopedico"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_oij" id="obs_ex_oij"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        {{-- ortopedia adulto --}}
                                                                        <div class="tab-pane fade  show active" id="atenc_ortopedia_ad" role="tabpanel" aria-labelledby="atenc_ortopedia_ad_tab">
                                                                            <div class="form-row mt-2">
                                                                                <div class="col-sm-12 col-md-3 col-lg-2 col-xl-2">
                                                                                    <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                                        <a class="nav-link-aten text-reset active" id="orto_adult_gen-tab" data-toggle="tab" href="#orto_adult_gen" role="tab" aria-controls="orto_adult_gen" aria-selected="false">General</a>
                                                                                        <a class="nav-link-aten text-reset" id="orto_adult_ex_axial-tab" data-toggle="tab" href="#orto_adult_ex_axial" role="tab" aria-controls="orto_adult_ex_axial" aria-selected="false">Exploración Axial</a>
                                                                                        <a class="nav-link-aten text-reset" id="orto_adult_ms-tab" data-toggle="tab" href="#orto_adult_ms" role="tab" aria-controls="orto_padultms" aria-selected="false">Exploración Periférica</a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-9 col-lg-10 col-xl-10">
                                                                                    <div class="tab-content" id="v-pills-tabContent">
                                                                                        <div class="tab-pane fade show active" id="orto_adult_gen" role="tabpanel" aria-labelledby="orto_adult_gen-tab">
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                    <h6 class="t-aten">Exámen especialidad</h6>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12 col-md-6 col-lg-2 col-xl-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm" for="peso_ad">Peso</label>
                                                                                                        <input type="text" class="form-control form-control-sm" data-titulo="Peso" data-seccion="Exámen especialidad" data-tipo="ortopedia-Adultos" name="orto_peso_ad" id="orto_peso_ad">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-6 col-lg-2 col-xl-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm" for="talla_ad">Talla</label>
                                                                                                        <input type="text" class="form-control form-control-sm" data-titulo="Talla" data-seccion="Exámen especialidad" data-tipo="ortopedia-Adultos" name="orto_talla_ad" id="orto_talla_ad">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
                                                                                                    <div class="form-group" id="div_detalle_transito_intest">
                                                                                                        <label class="floating-label-activo-sm" for="orto_manip_ad">Manipulación</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" data-titulo="Manipulación" data-seccion="Exámen especialidad" data-tipo="ortopedia-Adultos" name="orto_manip_ad" id="orto_manip_ad" placeholder="RESULTADO DE LA MANIPULACIÓN"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                                                                    <div class="form-group" id="div_detalle_transito_intest">
                                                                                                        <label class="floating-label-activo-sm" for="orto_dolor_ad">Dolor</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" rows="2"  onfocus="this.rows=3" onblur="this.rows=2;" data-titulo="Dolor" data-seccion="Exámen especialidad" data-tipo="ortopedia-Adultos" name="orto_dolor_ad" id="orto_dolor_ad" placeholder="DOLOR, TIPO, CUANDO ETC."></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                                                                    <div class="form-group" id="div_detalle_transito_intest">
                                                                                                        <label class="floating-label-activo-sm" for="orto_marpos_ad">Marcha y Postura</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" rows="2"  onfocus="this.rows=3" onblur="this.rows=2;" data-titulo="Marcha y Postura" data-seccion="Exámen especialidad" data-tipo="ortopedia-Adultos" name="orto_marpos_ad" id="orto_marpos_ad" placeholder="ESTUDIO DE LA MARCHA Y ALTERACIONES POSTURALES"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="tab-pane fade" id="orto_adult_ex_axial" role="tabpanel" aria-labelledby="orto_adult_ex_axial-tab">
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                    <h6 class="t-aten">Exploración Axial</h6>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm" for="orto_ea_mv_ad">Movilidad Vertebral</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Movilidad Vertebral" data-seccion="Exploración Axial" data-tipo="ortopedia-Adultos" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="orto_ea_mv_ad" id="orto_ea_mv_ad"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm" for="orto_ea_rlp_ad">Ritmo Lumbo-Pélvico</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Ritmo Lumbo-Pélvico" data-seccion="Exploración Axial" data-tipo="ortopedia-Adultos" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="orto_ea_rlp_ad" id="orto_ea_rlp_ad"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm" for="orto_ea_icls_ad">indice Cif/Lord Sagital</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="indice Cif/Lord Sagital" data-seccion="Exploración Axial" data-tipo="ortopedia-Adultos"rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="orto_ea_icls_ad" id="orto_ea_icls_ad"></textarea>
                                                                                                    </div>
                                                                                                </div>

                                                                                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm" for="orto_ea_ir_ad">Irritación radicular</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Irritación radicular" data-seccion="Exploración Axial" data-tipo="ortopedia-Adultos" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="orto_ea_ir_ad" id="orto_ea_ir_ad"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm" for="orto_ea_nb_ad">Neurológico básico</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Neurológico básico" data-seccion="Exploración Axial" data-tipo="ortopedia-Adultos" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="orto_ea_nb_ad" id="orto_ea_nb_ad"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="tab-pane fade" id="orto_adult_ms" role="tabpanel" aria-labelledby="orto_adult_ms-tab">
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                    <h6 class="t-aten">Exploración Periférica</h6>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-row">
                                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm" for="orto_ep_bart_ad">Balance articular (inclinómetro)</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="balance articular (inclinómetro)" data-seccion="Exploración Periférica" data-tipo="ortopedia-Adultos" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="orto_ep_bart_ad" id="obs_e_ext_sup" placeholder="ESTUDIO DEL BALANCE ARTICULAR (INCLINÓMETRO)"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm" for="orto_ep_bmm_ad">Balance Muscular Manual</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Balance Muscular Manual" data-seccion="Exploración Periférica" data-tipo="ortopedia-Adultos" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="orto_ep_bmm_ad" id="orto_ep_bmm_ad" placeholder="ESTUDIO DEL BALANCE MUSCULAR MANUAL"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm" for="orto_ep_hlart_ad">Hiperlaxitud articular</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Hiperlaxitud articular" data-seccion="Exploración Periférica" data-tipo="ortopedia-Adultos" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="orto_ep_hlart_ad" id="orto_ep_hlart_ad" placeholder="PRESENCIA DE HIPERLAXITUD ARTICULAR"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm" for="orto_ep_dism_minf_ad">Dismetría de miembros inferiores</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Dismetría de miembros inferiores" data-seccion="Exploración Periférica" data-tipo="ortopedia-Adultos" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="orto_ep_dism_minf_ad" id="orto_ep_dism_minf_ad" placeholder="DISMETRIA MB. INFERIORES"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm" for="orto_ep_si_ad">Signos Inflamatorios</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Signos Inflamatorios" data-seccion="Exploración Periférica" data-tipo="ortopedia-Adultos" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="orto_ep_si_ad" id="orto_ep_si_ad" placeholder="PRESENCIA DE INFLAMACIÓN"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                                                                                    <div class="form-group">
                                                                                                        <label class="floating-label-activo-sm" for="orto_ep_tc_ad">Test Clínicos</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Test Clinicos" data-seccion="Exploración Periférica" data-tipo="ortopedia-Adultos" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="orto_ep_tc_ad" id="orto_ep_tc_ad" placeholder="ANOTAR TEST CLÍNICOS REALIZADOS"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-row">
                                                                                                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                    <label class="floating-label-activo-sm" for="orto_ep_com_ad">Comentarios</label>
                                                                                                    <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" data-titulo="Signos Inflamatorios" data-seccion="Exploración Periférica" data-tipo="ortopedia-Adultos" name="orto_ep_com_ad" id="orto_ep_com_ad" placeholder="COMENTARIOS EXAMEN PERIFÉRICA"></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-row">
                                                                                                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                    <label class="floating-label-activo-sm" for="orto_ep_obgen_ad">Obs. Ortopedia Adultos</label>
                                                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Ortopedia Adultos" data-seccion="general" data-tipo="ortopedia-Adultos"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="orto_ep_obgen_ad" id="orto_ep_obgen_ad" placeholder="OBSERVACIONES GENERALES Y OTROS DATOS" ></textarea>
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

                                <!-- HOSPITALIZAR -->
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="card-a">
                                        <div class="card-header-a" id="hospitalizar_paciente">
                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed card-act-open " type="button" data-toggle="collapse" data-target="#hospitalizar_paciente-c" aria-expanded="false" aria-controls="hospitalizar_paciente-c">
                                                Hospitalizar Paciente
                                            </button>
                                        </div>
                                        <div id="hospitalizar_paciente-c" class="collapse" aria-labelledby="hospitalizar_paciente" data-parent="#hospitalizar_paciente">
                                            <div class="card-body-aten-a shadow-none">
                                                @php
                                                $seccion_tipo = 'hosp_gen';
                                                @endphp
                                                @include('general.hospitalizacion.hospitalizar')
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--Formulario / Signos vitales y otros-->
                                {{-- @include('general.secciones_ficha.signos_vitales') --}}
                                <!--Cierre: Formulario / Signos vitales y otros-->

                                <!-- control post qx -->
                                @include('general.secciones_ficha.control_cirugia_gen')
                                <!-- cierre control post qx -->

                                <!-- ges -->
                                @include('general.secciones_ficha.seccion_cronicos_ges_confidencial')
                                <!-- cierre ges -->
                                <hr>

                                <!-- Diagnóstico -->
                                @include('general.secciones_ficha.diagnostico')
                                <!-- cierre Diagnóstico -->

                            </div>
                        </div>
                        <br>
                        <!--CIERRE: ATENCIÓN TRAUMATOLOGIA-->

                        {{--  div de botones  --}}
                        <div class="bg-white shadow-none rounded mx-1 p-15">

                            <!--SECCION DE MEDICAMENTOS Y EXAMENES GENERALES -->
                            @include('general.secciones_ficha.seccion_receta_examen_comunes')
                            <!--SECCION DE MEDICAMENTOS Y EXAMENES GENERALES FIN  -->
                            <hr>

                            <!--GUARDAR O IMPRIMIR FICHA-->
                            <div class="row mb-3">
                                <div class="col-md-12 text-center">
                                    <input type="submit" class="btn btn-info mt-1" onclick="$('#cerrarsession').val('1');agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Ficha y Finalizar su Consulta">
                                    <input type="submit" class="btn btn-success mt-1" onclick="agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Ficha e ir a su Agenda">
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@section('page-script-ficha-atencion')
<script>


        function showContentTto_trauma() {
            element = document.getElementById("contentTto_trauma");
            check = document.getElementById("tto_trauma");
            if (check.checked) {
                element.style.display='block';
            }
            else {
                element.style.display='none';
            }
        }

        function showContentProc_trauma() {
            element = document.getElementById("contentProc_trauma");
            check = document.getElementById("pr_trauma");
            if (check.checked) {
                element.style.display='block';
            }
            else {
                element.style.display='none';
            }
        }


        $(document).ready(function() {

            /** MENSAJE*/
            /** CARGAR mensaje */
            $('#mensaje_ficha').html(' Solo el campo DIAGNÓSTICO ES OBLIGATORIO, el resto es opcional');
            $('#mensaje_ficha').show();
            setTimeout(function(){
                $('#mensaje_ficha').hide();
            }, 5000);

            /** fin formulario pestaña 1 */
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

            /** accion check sol Pabellon */
            $('#tr_gen_cir').change(function() {
                if ($('#tr_gen_cir').is(':checked')) {
                    $('#ingreso_sol_pab_modal').modal('show');
                } else {
                    $('#ingreso_sol_pab_modal').modal('hide');
                }
            });


            /** cronico */
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
        //                     $('#solicitado_por_nombre_eda').val('');
        //                     $('#solicitado_por_apellido_eda').val('');
        //                     $('#solicitado_por_telefono_eda').val('');
        //                     $('#solicitado_por_email_eda').val('');
        //                 }
        //                 else
        //                 {
        //                     mensaje = 'Profesional no encontrato, debe ingresar datos.';
        //                     $('#'+input_nombre).val('');
        //                     $('#'+input_id).val('');
        //                     $('#'+div_solicitar).show();
        //                     $('#div_mensaje').show();
        //                     $('#mensaje_solicitado_por').html(mensaje);
        //                     $('#solicitado_por_nombre_eda').val('');
        //                     $('#solicitado_por_apellido_eda').val('');
        //                     $('#solicitado_por_telefono_eda').val('');
        //                     $('#solicitado_por_email_eda').val('');
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

        function cargarIgual(input){

            let actual = $('#'+input);
            let equivalentes = $('#'+input).attr('data-input_igual').split(',');
            $.each(equivalentes, function( index, value ) {
                var equivalente = $('#'+value);
                equivalente.val(actual.val());
            });
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

        // function abrir_modal_guardar_tipo(div_id_data, div_id_detalle,tipo)
        // {
        //     $("#modal_registrar_ficha_tipo_dg").unbind();
        //     if(tipo == 'cdg')
        //     {
        //         $('#btn_modal_registrar_ficha_tipo_dg').click(function(){
        //             guardar_tipo_ficha_cdg();
        //         });
        //     }
        //     else if(tipo == 'cg')
        //     {
        //         $('#btn_modal_registrar_ficha_tipo_dg').click(function(){
        //             guardar_tipo_ficha_cg();
        //         });
        //     }
        //     $('#modal_registrar_ficha_tipo_dg').modal('show');

        //     cargarSeccion(div_id_detalle,div_id_data);
        // }

        // function cargarSeccion(div_destino, div_data)
        // {
        //     // var tipo = $('#'+select+'').val();
        //     $('#'+div_destino).html('');
        //     $('#'+div_data).find('select,textarea').each(function(key, elemento){
        //         html ='';
        //         html +='<div class="row" style="margin-top:10px;">';
        //         if($(elemento).prop('nodeName') == 'SELECT')
        //         {
        //             if($(elemento).val() == 0)
        //                 $(elemento).val(1)

        //             html +='<div class="col-md-4">'+$(elemento).data('titulo')+'</div>';
        //             html +='<div class="col-md-4">';
        //             html +='    '+$('#'+$(elemento).attr('id')+' option:selected').text()+'';
        //             html +='    <input type="hidden" name="modal_agregar_tipo_'+$(elemento).attr('id')+'" id="modal_agregar_tipo_'+$(elemento).attr('id')+'" value="'+$(elemento).val()+'">';
        //             html +='</div>';
        //         }
        //         else if($(elemento).prop('nodeName') == 'TEXTAREA')
        //         {
        //             html +='<div class="col-md-4">'+$(elemento).data('titulo')+'</div>';
        //             html +='<div class="col-md-6">';
        //             html +='    <textarea class="form-control caja-texto form-control-sm '+$(elemento).attr('id')+'_editar" style="display:none;" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="observaciones_'+$(elemento).attr('id')+'" id="observaciones_'+$(elemento).attr('id')+'">'+$(elemento).val()+'</textarea>';
        //             html +='    <label class="'+$(elemento).attr('id')+'_mostrar" id="label_observacion_'+$(elemento).attr('id')+'">'+$(elemento).val()+'</label>';
        //             html +='</div>';
        //             html +='<div class="col-md-2">';
        //             html +='    <button class="btn btn-sm btn-success '+$(elemento).attr('id')+'_mostrar"  onclick="cambiar_div(\''+$(elemento).attr('id')+'_editar'+'\',\''+$(elemento).attr('id')+'_mostrar'+'\',\'label_observacion_'+$(elemento).attr('id')+'\',\'observaciones_'+$(elemento).attr('id')+'\')">Editar</button>';
        //             html +='    <button class="btn btn-sm btn-success '+$(elemento).attr('id')+'_editar" style="display:none;" onclick="cambiar_div(\''+$(elemento).attr('id')+'_mostrar'+'\',\''+$(elemento).attr('id')+'_editar'+'\',\'label_observacion_'+$(elemento).attr('id')+'\',\'observaciones_'+$(elemento).attr('id')+'\')">Guardar</button>';
        //             html +='</div>';

        //         }
        //         html +='</div>';
        //         $('#'+div_destino).append(html);
        //     });
        // }

        // function cambiar_div(mostrar, ocultar, label, textarea){
        //     $('.'+mostrar).show();
        //     $('.'+ocultar).hide();
        //     $('#'+label).html( $('#'+textarea).val() );
        // }

        // function guardar_tipo_ficha_cdg()
        // {
        //     var registro_f_t_cg_nombre = $('#registro_f_t_cg_nombre').val();
        //     var registro_f_t_cg_descripcion = $('#registro_f_t_cg_descripcion').val();
        //     var _token = CSRF_TOKEN;
        //     if(registro_f_t_cg_nombre == ''){
        //         swal({
        //                 title: "Problema al Registrar Tipo Ficha.\n Campo requedido Nombre",
        //                 icon: "warning",
        //                 // buttons: "Aceptar",
        //                 //SuccessMode: true,
        //             });
        //             return false;
        //     }
        //     if(registro_f_t_cg_descripcion == ''){
        //         swal({
        //                 title: "Problema al Registrar Tipo Ficha.\n Campo requedido Descripcion",
        //                 icon: "warning",
        //                 // buttons: "Aceptar",
        //                 //SuccessMode: true,
        //             });
        //             return false;
        //     }


        //     var data = [];
        //     data.registro_f_t_cg_nombre = registro_f_t_cg_nombre;
        //     data.registro_f_t_cg_descripcion = registro_f_t_cg_descripcion;

        //     $('#registro_f_t_cg_detalle').find('input,textarea').each(function(key, elemento){
        //         {{--  console.log($(elemento).attr('id'));  --}}
        //         {{--  console.log($(elemento).val());  --}}
        //         {{--  console.log($(elemento).prop('nodeName'));  --}}
        //         {{--  console.log('*******');  --}}

        //         data[$(elemento).attr('id')] = $(elemento).val();

        //     });

        //     {{--  console.log(data);  --}}
        //     url = "{{ route('profesional.ficha_tipo_cdg') }}";
        //     $.ajax({

        //         url: url,
        //         type: "POST",
        //         data: {
        //             _token: _token,
        //             id_profesional : $('#id_profesional_fc').val(),
        //             ind_esp_cirugia : '',
        //             nombre : data.registro_f_t_cg_nombre,
        //             descripcion : data.registro_f_t_cg_descripcion,
        //             dolor_cdg : data.modal_agregar_tipo_dolor_cdg,
        //             obs_dolor_cdg : data.observaciones_obs_dolor_cdg,
        //             dolor_cdg : data.modal_agregar_tipo_dolor_cdg,
        //             obs_dolor_cdg : data.observaciones_obs_dolor_cdg,
        //             otros_sintomas_cdg : data.modal_agregar_tipo_otros_sintomas_cdg,
        //             obs_otros_sintomas_cdg : data.observaciones_obs_otros_sintomas_cdg,
        //             ceg_cdg : data.modal_agregar_tipo_ceg_cdg,
        //             obs_ceg_cdg : data.observaciones_obs_ceg_cdg,
        //             masa_cdg : data.modal_agregar_tipo_masa_cdg,
        //             obs_masa_cdg : data.observaciones_obs_masa_cdg,
        //             urgencia_cdg : data.modal_agregar_tipo_urgencia_cdg,
        //             obs_urgencia_cdg : data.observaciones_obs_urgencia_cdg,
        //             so_cdg : data.modal_agregar_tipo_so_cdg,
        //             obs_so_cdg : data.observaciones_obs_so_cdg,
        //             obs_egp_cdg : data.observaciones_obs_egp_cdg,
        //             obs_gen_ex_esp_cdg : data.observaciones_obs_gen_ex_esp_cdg,
        //         },
        //     })
        //     .done(function(data)
        //     {
        //         {{--  console.log('-----------------------');  --}}
        //         {{--  console.log(data);  --}}
        //         {{--  console.log('-----------------------');  --}}
        //         if(data.estado == 1)
        //         {
        //             $('#modal_registrar_ficha_tipo_dg').modal('hide');
        //             swal({
        //                 title: "Tipo Ficha Registrado",
        //                 icon: "success",
        //                 // buttons: "Aceptar",
        //                 //SuccessMode: true,
        //             })
        //         }
        //         else{

        //             swal({
        //                 title: "Problema al Registrar Tipo Ficha.",
        //                 icon: "warning",
        //                 // buttons: "Aceptar",
        //                 //SuccessMode: true,
        //             })
        //         }

        //     })
        //     .fail(function(jqXHR, ajaxOptions, thrownError) {
        //         console.log(jqXHR, ajaxOptions, thrownError)
        //     });

        // }

        /* function guardar_tipo_ficha_cg()
        {
            var registro_f_t_cg_nombre = $('#registro_f_t_cg_nombre').val();
            var registro_f_t_cg_descripcion = $('#registro_f_t_cg_descripcion').val();
            var _token = CSRF_TOKEN;
            if(registro_f_t_cg_nombre == ''){
                swal({
                        title: "Problema al Registrar Tipo Ficha.\n Campo requedido Nombre",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                    return false;
            }
            if(registro_f_t_cg_descripcion == ''){
                swal({
                        title: "Problema al Registrar Tipo Ficha.\n Campo requedido Descripcion",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                    return false;
            }


            var data = [];
            data.registro_f_t_cg_nombre = registro_f_t_cg_nombre;
            data.registro_f_t_cg_descripcion = registro_f_t_cg_descripcion;

            $('#registro_f_t_cg_detalle').find('input,textarea').each(function(key, elemento){
                {{--  console.log($(elemento).attr('id'));  --}}
                {{--  console.log($(elemento).val());  --}}
                {{--  console.log($(elemento).prop('nodeName'));  --}}
                {{--  console.log('*******');  --}}

                data[$(elemento).attr('id')] = $(elemento).val();

            });

            {{--  console.log(data);  --}}
            url = "{{ route('profesional.ficha_tipo_cg') }}";
            $.ajax({

                url: url,
                type: "POST",
                data: {
                    _token: _token,
                    id_profesional : $('#id_profesional_fc').val(),
                    ind_esp_cirugia : '',
                    nombre : data.registro_f_t_cg_nombre,
                    descripcion : data.registro_f_t_cg_descripcion,
                    organo_cg : data.modal_agregar_tipo_organo_cg,
                    obs_organo_cg : data.observaciones_obs_organo_cg,
                    ceg_cg : data.modal_agregar_tipo_ceg_cg,
                    obs_ceg_cg : data.observaciones_obs_ceg_cg,
                    masa_cg : data.modal_agregar_tipo_masa_cg,
                    obs_masas_cg : data.observaciones_obs_masas_cg,
                    urgencia_cg : data.modal_agregar_tipo_urgencia_cg,
                    obs_urgencia_cg : data.observaciones_obs_urgencia_cg,
                    so_cg : data.modal_agregar_tipo_so_cg,
                    obs_so_cg : data.observaciones_obs_so_cg,
                    obs_egp_cg : data.observaciones_obs_egp_cg,
                    obs_gen_ex_esp_cg : data.observaciones_obs_gen_ex_esp_cg,
                },
            })
            .done(function(data)
            {
                {{--  console.log('-----------------------');  --}}
                {{--  console.log(data);  --}}
                {{--  console.log('-----------------------');  --}}
                if(data.estado == 1)
                {
                    $('#modal_registrar_ficha_tipo_dg').modal('hide');
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
        */

        // function cargar_info_ficha_tipo_cdg(select, div_descripcion)
        // {
        //     let id_ft = $('#'+select).val();
        //     if(id_ft == '')
        //     {
        //         $('#'+div_descripcion).html('');
        //         $('#form-cdg').find('select,textarea').each(function(key, elemento){
        //             if($(elemento).prop('nodeName') == 'SELECT')
        //             {
        //                 $(elemento).val(0);
        //             }
        //             else
        //             {
        //                 $(elemento).val('');
        //             }
        //         });

        //         evaluar_para_carga_detalle('dolor_cdg','div_detalle_dolor','obs_dolor_cdg',2);
        //         evaluar_para_carga_detalle('otros_sintomas_cdg','div_detalle_cd_otros_sintomas','obs_otros_sintomas_cdg',2);
        //         evaluar_para_carga_detalle('ceg_cdg','div_detalle_ceg_cdg','obs_ceg_cdg',2);
        //         evaluar_para_carga_detalle('masa_cdg','div_detalle_masa_cdg','obs_masa_cdg',2);
        //         evaluar_para_carga_detalle('urgencia_cdg','div_detalle_urgencia_cdg','obs_urgencia_cdg',2);
        //         evaluar_para_carga_detalle('so_cdg','div_detale_sospecha__organo_cdg','obs_so_cdg',2);

        //         return false;
        //     }
        //     $('#'+div_descripcion).html($('#'+select+' option:selected').attr('data-descripcion'));

        //     url = "{{ route('profesional.buscar_ficha_tipo_cdg') }}";
        //     $.ajax({

        //         url: url,
        //         type: "GET",
        //         data: {
        //             id_profesional : $('#id_profesional_fc').val(),
        //             id_ficha_tipo :  id_ft,
        //         },
        //     })
        //     .done(function(data)
        //     {
        //         {{--  console.log('-----------------------');  --}}
        //         {{--  console.log(data);  --}}
        //         {{--  console.log('-----------------------');  --}}
        //         if(data.estado == 1)
        //         {
        //             $.each(data.registros, function(index, value)
        //             {
        //                 {{--  console.log(index);  --}}
        //                 {{--  console.log(value);  --}}
        //                 {{--  console.log($('#'+index));  --}}

        //                 $('#'+index).val(value);
        //             });
        //             evaluar_para_carga_detalle('dolor_cdg','div_detalle_dolor','obs_dolor_cdg',2);
        //             evaluar_para_carga_detalle('otros_sintomas_cdg','div_detalle_cd_otros_sintomas','obs_otros_sintomas_cdg',2);
        //             evaluar_para_carga_detalle('ceg_cdg','div_detalle_ceg_cdg','obs_ceg_cdg',2);
        //             evaluar_para_carga_detalle('masa_cdg','div_detalle_masa_cdg','obs_masa_cdg',2);
        //             evaluar_para_carga_detalle('urgencia_cdg','div_detalle_urgencia_cdg','obs_urgencia_cdg',2);
        //             evaluar_para_carga_detalle('so_cdg','div_detale_sospecha__organo_cdg','obs_so_cdg',2);

        //         }
        //         else{

        //             swal({
        //                 title: "Problema al Cargar Tipo Ficha.",
        //                 icon: "warning",
        //                 // buttons: "Aceptar",
        //                 //SuccessMode: true,
        //             })
        //         }

        //     })
        //     .fail(function(jqXHR, ajaxOptions, thrownError) {
        //         console.log(jqXHR, ajaxOptions, thrownError)
        //     });
        // }

        // function cargar_info_ficha_tipo_cg(select, div_descripcion)
        // {
        //     let id_ft = $('#'+select).val();
        //     if(id_ft == '')
        //     {
        //         $('#'+div_descripcion).html('');
        //         $('#form-cg').find('select,textarea').each(function(key, elemento){
        //             if($(elemento).prop('nodeName') == 'SELECT')
        //             {
        //                 $(elemento).val(1);
        //             }
        //             else
        //             {
        //                 $(elemento).val('');
        //             }
        //         });

        //         evaluar_para_carga_detalle('organo_cg','div_detalle_organo','obs_organo_cg',2);
        //         evaluar_para_carga_detalle('ceg_cg','div_detalle_ceg_cg','obs_ceg_cg',2);
        //         evaluar_para_carga_detalle('masa_cg','div_detalle_masa_cg','obs_masas_cg',2);
        //         evaluar_para_carga_detalle('urgencia_cg','div_detalle_urgencia_cg','obs_urgencia_cg',2);
        //         evaluar_para_carga_detalle('so_cg','div_detalle_so_cg','obs_so_cg',2);

        //         return false;
        //     }
        //     $('#'+div_descripcion).html($('#'+select+' option:selected').attr('data-descripcion'));

        //     url = "{{ route('profesional.buscar_ficha_tipo_cg') }}";
        //     $.ajax({

        //         url: url,
        //         type: "GET",
        //         data: {
        //             id_profesional : $('#id_profesional_fc').val(),
        //             id_ficha_tipo :  id_ft,
        //         },
        //     })
        //     .done(function(data)
        //     {
        //         {{--  console.log('-----------------------');  --}}
        //         {{--  console.log(data);  --}}
        //         {{--  console.log('-----------------------');  --}}
        //         if(data.estado == 1)
        //         {
        //             $.each(data.registros, function(index, value)
        //             {
        //                 {{--  console.log(index);  --}}
        //                 {{--  console.log(value);  --}}
        //                 {{--  console.log($('#'+index));  --}}

        //                 $('#'+index).val(value);
        //             });
        //             evaluar_para_carga_detalle('organo_cg','div_detalle_organo','obs_organo_cg',2);
        //             evaluar_para_carga_detalle('ceg_cg','div_detalle_ceg_cg','obs_ceg_cg',2);
        //             evaluar_para_carga_detalle('masa_cg','div_detalle_masa_cg','obs_masas_cg',2);
        //             evaluar_para_carga_detalle('urgencia_cg','div_detalle_urgencia_cg','obs_urgencia_cg',2);
        //             evaluar_para_carga_detalle('so_cg','div_detalle_so_cg','obs_so_cg',2);

        //         }
        //         else{

        //             swal({
        //                 title: "Problema al Cargar Tipo Ficha.",
        //                 icon: "warning",
        //                 // buttons: "Aceptar",
        //                 //SuccessMode: true,
        //             })
        //         }

        //     })
        //     .fail(function(jqXHR, ajaxOptions, thrownError) {
        //         console.log(jqXHR, ajaxOptions, thrownError)
        //     });
        // }

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

		// function biopsia_endo_gas() {
        //     if($('#biopsia_end_gast').prop('checked'))
		// 	{
		// 		$('#m_biopsia_cir').modal('show');
		// 	}
        // }

        // function biopsia_endo_colon() {
        //     if($('#biopsia_colon').prop('checked'))
		// 	{
		// 		$('#m_biopsia_cir').modal('show');
		// 	}
        // }

		// function muestra_hp_abrir_div()
		// {
		// 	if($('#muestra_hp').prop('checked'))
		// 	{
		// 		$('#div_select_muestra_hp').show();
		// 	}
		// 	else
		// 	{
		// 		$('#div_select_muestra_hp').hide();
		// 		$('#muestra_hp_resultado').val('');
		// 	}

		// }

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
        //                     $('#solicitado_por_nombre_cda').val('');
        //                     $('#solicitado_por_apellido_cda').val('');
        //                     $('#solicitado_por_telefono_cda').val('');
        //                     $('#solicitado_por_email_cda').val('');
        //                 }
        //                 else
        //                 {
        //                     mensaje = 'Profesional no encontrato, debe ingresar datos.';
        //                     $('#'+input_nombre).val('');
        //                     $('#'+input_id).val('');
        //                     $('#'+div_solicitar).show();
        //                     $('#div_mensaje').show();
        //                     $('#mensaje_solicitado_por').html(mensaje);
        //                     $('#solicitado_por_nombre_cda').val('');
        //                     $('#solicitado_por_apellido_cda').val('');
        //                     $('#solicitado_por_telefono_cda').val('');
        //                     $('#solicitado_por_email_cda').val('');
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

    </script>
@endsection


