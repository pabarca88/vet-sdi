<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2">
        <div class="row mx-0">
            <div class="col-sm-12 col-md-12">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="orl" role="tablist">
                    <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="atencion_cirugia_gen-tab" data-toggle="tab" href="#atencion_cirugia_gen" role="tab" aria-controls="atencion_orl" aria-selected="true">Atención Especialidad</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="endosc_gastrica-tab" data-toggle="tab" href="#endosc_gastrica" role="tab" aria-controls="endosc_gastrica" aria-selected="false">Endoscopía Digestiva Alta</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="colonoscopia-tab" data-toggle="tab" href="#colonoscopia" role="tab" aria-controls="colonoscopia" aria-selected="false">Endoscopía Digestiva Baja</a>
                    </li>
				</ul>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="alert-atencion alert alert-warning-b alert-dismissible fade show" role="alert" id="mensaje_ficha"></div>
            </div>
            <div class="col-sm-12 col-md-12">
                <form action="{{ route('fichaAtencion.registrar_ficha_cdg') }}" method="POST">
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
                    <input type="hidden" name="tipo_examen_especial" id="tipo_examen_especial" value="{{ $lista_examen_especial }}">

                    @php
                        /** carga de id examen de espcialidad tipo  */
                        $temp = $lista_examen_especial;

                        $array_temp = explode('|',$temp);
                        //var_dump($array_temp);
                        $array_temp2 = array();
                        foreach($array_temp as $key=>$value)
                        {
                            $array_temp2[] = explode(',',$value);
                        }
                        $array_examen_especialidad_tipo = array();
                        foreach($array_temp2 as $key=>$value)
                        {
                            $array_examen_especialidad_tipo[$value[0]] = $value[1];
                        }
                        // var_dump($array_examen_especialidad_tipo);
                    @endphp

                    @csrf
                    <div class="tab-content" id="orl-contenido">
                        <!--ATENCIÓN ESPECIALIDAD GENERAL-->
                        <div class="tab-pane fade show active" id="atencion_cirugia_gen" role="tabpanel" aria-labelledby="atencion_cirugia_gen-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12 mt-3 mb-0">
                                            <h6 class="f-16 text-c-blue">Ficha de atención general</h6>
                                            <hr>
                                        </div>
                                    </div>
                                    <!--FORMULARIOS-->
                                    <div class="row">
                                        <!--Formulario / Menor de edad-->
                                        @include('general.secciones_ficha.seccion_menor')
                                        <!--Cierre: Formulario / Menor de edad-->

                                        <!--Motivo consulta-->
                                        @include('general.secciones_ficha.motivo')

                                        <div class="col-sm-12 col-md-12">
                                            <div class="card-a">
                                                <div class="card-header-a" id="exam_esp_cdg">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left has-ripple card-act-open collapsed" type="button" data-toggle="collapse" data-target="#exam_esp_cdg_c" aria-expanded="false" aria-controls="exam_esp_cdg_c">
                                                        Examen especialidad C.Digestiva
                                                    </button>
                                                </div>
                                                <div id="exam_esp_cdg_c" class="collapse" aria-labelledby="exam_esp_cdg" data-parent="#exam_esp_cdg">
                                                    <div class="card-body-aten-a">
                                                        <div class="row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <ul class="nav nav-tabs-aten nav-fill mb-10" id="cir_dig" role="tablist">
                                                                    <li class="nav-item">
                                                                        <a class="nav-link-aten text-reset active" id="cir_dig_sint_tab" data-toggle="tab" href="#cir_dig_sint" role="tab" aria-controls="cir_dig_sint" aria-selected="true">Motivo de consulta Sintomas Generales</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link-aten text-reset" id="ex_plan_tto-tab" data-toggle="tab" href="#ex_plan_tto" role="tab" aria-controls="ex_plan_tto" aria-selected="true">Plan de Tratamiento</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <div class="tab-content" id="cir_digest_adulto">
                                                                    <!--SINTOMAS GENERALES-->
                                                                    <div class="tab-pane fade show active" id="cir_dig_sint" role="tabpanel" aria-labelledby="cir_dig_sint_tab">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="card">
                                                                                    <div class="card-body">
                                                                                        <div class="row">
                                                                                            <div class="col-sm-12">
                                                                                                <div class="tab-content" id="v-pills-tabContent">
                                                                                                    <div class="tab-pane fade show active" id="sint_dol" role="tabpanel" aria-labelledby="sint_dol-tab">
                                                                                                        <div class="col-sm-12 col-md-12">
                                                                                                            <div class="form-row">
                                                                                                                <div class="col-md-12">
                                                                                                                    <div class="form-group" id="div_detalle_transito_intest" >
                                                                                                                        <label class="floating-label-activo-sm" for="cdg_mc">Motivo de consulta</label>
                                                                                                                        <textarea class="form-control caja-texto form-control-sm" rows="2" data-titulo="Estado General del Paciente" data-seccion="Cirugia digest alta" data-tipo="cirugia digest alta" onfocus="this.rows=3" onblur="this.rows=2;" name="cda_mc" id="cda_mc" placeholder=" RGE , HEMORRAGIAS, DOLOR, ZONA,SINTOMAS ACOMPAÑANTES OTROS "></textarea>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="col-md-12">
                                                                                                                    <div class="form-group" id="div_detalle_transito_intest" >
                                                                                                                        <label class="floating-label-activo-sm" for="cdg_ex_fis">Examen Físico</label>
                                                                                                                        <textarea class="form-control caja-texto form-control-sm" rows="2" data-titulo="Estado General del Paciente" data-seccion="Cirugia digest alta" data-tipo="cirugia digest alta" onfocus="this.rows=3" onblur="this.rows=2;" name="cdb_ex_fis" id="cdb_ex_fis" placeholder="CEG, PRESENCIA DE SANGRE, SOSP. DE ORGANO MASAS OTROS"></textarea>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="col-md-4">
                                                                                                                    <div class="form-group">
                                                                                                                        <label class="floating-label-activo-sm" for="urgencia_cdg">Es Urgencia Qx.?</label>
                                                                                                                        <select name="urgencia_cdg" id="urgencia_cdg" data-titulo="Estado General del Paciente" data-seccion="Cirugia digest alta" data-tipo="cirugia digest alta" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('urgencia_cdg','div_detalle_urgencia_cdg','obs_urgencia_cdg',2);">
                                                                                                                            <option value="1" selected>No</option>
                                                                                                                            <option value="2">Si</option>
                                                                                                                        </select>
                                                                                                                    </div>
                                                                                                                    <div class="form-group col-md-12" id="div_detalle_urgencia_cdg" style="display:none">
                                                                                                                        <button type="button" class="btn btn-primary-light btn-sm btn-block" onclick="ingresohosp()";<i class="feather icon-save"></i> Orden de Hospitalización </button>
                                                                                                                        <button type="button" class="btn btn-primary-light btn-sm btn-block" onclick="sol_pabellon()";<i class="feather icon-save"></i> Solicitar Pabellón</button>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class=" col-md-8">
                                                                                                                    <div class="form-group">
                                                                                                                        <label class="floating-label-activo-sm" for="obs_egp_cdg">Observaciones Estado General Paciente</label>
                                                                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Estado General del Paciente" data-seccion="Cirugia digest alta" data-tipo="cirugia digest alta" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_egp_cda" id="obs_egp_cda" placeholder="ANOTE APRECIACIÓN SOBRE ESTADO GENERAL DEL PACIENTE"></textarea>
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
                                                                        <div class="row">
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm">Carga Ficha Tipo</label>
                                                                                    <select class="form-control form-control-sm" id="select_ficha_tipo_ex_especialidad_cdg" onchange="cargar_info_ficha_tipo_cdg('select_ficha_tipo_ex_especialidad_cdg','descripcion_ficha_tipo_ex_especialidad_cdg');">
                                                                                        <option value="">Seleccione</option>
                                                                                        @if(!empty($fichaTipo['cdg']))
                                                                                            @foreach ($fichaTipo['cdg'] as $ft )
                                                                                                <option value="{{ $ft->id }}" data-descripcion="{{ $ft->descripcion }}">{{ $ft->nombre }}</option>
                                                                                            @endforeach
                                                                                        @endif
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <span id="descripcion_ficha_tipo_ex_especialidad_cdg"></span>
                                                                            </div>
                                                                            <div class="col-sm-4 col-md-4 mb-3">
                                                                                <button type="button" class="btn btn-outline-primary btn-sm" onclick="abrir_modal_guardar_tipo('form-oft-g','registro_f_t_oft_detalle','oft_g');"><i class="fas fa-save"></i> Guardar nueva ficha tipo</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--PLAN DE TRATAMIENTO-->
                                                                    <div class="tab-pane fade show" id="ex_plan_tto" role="tabpanel" aria-labelledby="ex_plan_tto-tab">
                                                                        <script type="text/javascript">
                                                                               $(document).ready(function() {
                                                                                });
                                                                        </script>
                                                                        <div class="form-row mt-2">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-0">
                                                                                <h6 class="t-aten">Plan de Tratamiento</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-0 mt-0">
                                                                                <label class="ml-0" for="tto_med_cdg"><strong>Tratamiento médico</strong></label>
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" id="tto_med_cdg" name="tto_med_cdg" value="1" onchange="javascript:showContentTmcdg()" />
                                                                                    <label for="tto_med_cdg" class="cr"></label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <div id="contentTto_cdg" style="display: none;">
                                                                                    <div class="form-row">
                                                                                        <div class="form-group col-md-12 mt-1">
                                                                                            <label class="floating-label-activo-sm" for="rec_tto_cdg">Recomendaciones</label>
                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Recomendaciones" data-seccion="Plan de Tratamiento" data-tipo="recomendaciones médicas"  rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="rec_tto_cdg" id="rec_tto_cdg"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-0 mt-0">
                                                                                <label class="ml-0"><strong>Procedimiento</strong></label>
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" id="pr_cdg" name="pr_cdg" value="1" onchange="javascript: showContentProc_cdg()" />
                                                                                    <label for="pr_cdg" class="cr"></label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <div id="contentProc_cdg" style="display: none;">
                                                                                    <div class="form-row">
                                                                                        <div class="form-group col-md-4">
                                                                                            <label class="floating-label-activo-sm" for="tipo_proc_cdg"> Tipo</label>
                                                                                            <input type="text" class="form-control form-control-sm" data-titulo="Tipo Procedimiento" data-seccion="Plan de Tratamiento" data-tipo="Tipo de procedimiento"  name="tipo_proc_cdg" id="tipo_proc_cdg">
                                                                                        </div>
                                                                                        <div class="form-group col-md-8">
                                                                                            <label class="floating-label-activo-sm" for="plan_proc_cdg"> Plan</label>
                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Plan Tratamiento" data-seccion="Plan de Tratamiento" data-tipo="Plan de procedimiento"  rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="plan_proc_cdg" id="plan_proc_cdg"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-0">
                                                                                <div class="form-group">
                                                                                    <div class="switch switch-success d-inline m-r-10">

                                                                                        <label class="ml-0"><strong>Cirugía</strong></label>
                                                                                        <input type="checkbox" class="custom-control-input" id="cirug_cgd" name="cirug_cgd" value="{!! old('cirug_cgd') !!}">
                                                                                        <label class="cr" for="cirug_cgd"></label>
                                                                                    </div>
                                                                                </div>
                                                                                @include('general.hospitalizacion.modals.in_solic_pabellon')
                                                                                <div class="form-row">
                                                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                        <div class="form-group">
                                                                                            <button type="button" class="btn btn-primary-light btn-sm btn-block" onclick="sol_examen_endosc_eda()";><i class="feather icon-info"></i> Solicitar Endoscopía Alta</button>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                        <div class="form-group">
                                                                                            <button type="button" class="btn btn-primary-light btn-sm btn-block" onclick="sol_examen_endosc_edb()";><i class="feather icon-info"></i> Solicitar Endoscopía Baja</button>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                        <div class="form-group">
                                                                                            <button type="button" class="btn btn-primary-light btn-sm btn-block" onclick="mostrar_modal_examen_examenes_tipo()";><i class="feather icon-info"></i> Examenes Tipo</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-row">
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm"for="obs_plan_trat_cdg">Obs. Plan de tratamiento</label>
                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Plan de tratamiento" data-seccion=" Plan de tratamiento" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_plan_trat_cdg" id="obs_plan_trat_cdg"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    @include('atencion_medica.formularios.modal_atencion_especialidad.cirugia.modal_sol_eda')
                                                                                    @include('atencion_medica.formularios.modal_atencion_especialidad.cirugia.modal_sol_edb')
                                                                                    @include('app.cirugia.modals.modals_cesarea.modal_indicar_examenes')
                                                                                    @include('general.hospitalizacion.modals.in_solic_pabellon')
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        {{--  <div class="form-row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <div id="contentTto_cdg" style="display: none;">
                                                                                    <div class="form-row">
                                                                                        <div class="form-group col-md-12">
                                                                                            <h6 class="text-center">Tratamiento médico</h6>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>  --}}
                                                                        <hr>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <label class="floating-label-activo-sm" for="obs_plan_trat_cdg">Obs. Plan de tratamiento</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Plan de tratamiento" data-seccion=" Plan de tratamiento" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_plan_trat_cdg" id="obs_plan_trat_cdg"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @php
                                                                    $seccion_tipo = 'cirugia_digestiva_general';
                                                                    @endphp
                                                                    @include('general.hospitalizacion.hospitalizar')
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--CIRUGIA GENERAL-->
                                        @include('general.secciones_ficha.cirugia_general.cirugia_adulto')
										<!--cierre CIRUGIA GENERAL-->
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="card-a">
                                                <div class="card-header-a" id="hospitalizar_paciente">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed card-act-open " type="button" data-toggle="collapse" data-target="#hospitalizar_paciente-c" aria-expanded="false" aria-controls="hospitalizar_paciente-c">
                                                        Hospitalizar Paciente
                                                    </button>
                                                </div>
                                                <div id="hospitalizar_paciente-c" class="collapse" aria-labelledby="hospitalizar_paciente" data-parent="#hospitalizar_paciente">
                                                    <div class="card-body-aten-a shadow-none">
                                                        @include('general.hospitalizacion.hospitalizar')
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- control post qx -->
                                          @include('general.secciones_ficha.control_cirugia_gen')
                                        <!-- cierre control post qx -->
                                        <!--Formulario / Signos vitales y otros-->
                                        @include('general.secciones_ficha.signos_vitales')
                                        <!--Cierre: Formulario / Signos vitales y otros-->
                                        @include('atencion_medica.generales.seccion_cronicos_ges_confidencial')
                                        <hr>
                                        <!--Diagnóstico-->
                                        @include('general.secciones_ficha.diagnostico')
                                    </div>
                                </div>
                                <!--GUARDAR O IMPRIMIR FICHA-->
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="row mb-3">
                                        <div class="col-md-12 text-center">
                                            <input type="submit" class="btn btn-info mt-1" onclick="$('#cerrarsession').val('1');agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Ficha y Finalizar su Consulta">
                                            <input type="submit" class="btn btn-success mt-1" onclick="agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Ficha e ir a su Agenda">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--CIERRE: ATENCIÓN ESPECIALIDAD GENERAL-->
                        <!--INFORME ENDOSCOPÍA DIGESTIVA ALTA-->
                        <div class="tab-pane fade" id="endosc_gastrica" role="tabpanel" aria-labelledby="endosc_gastrica-tab">
                            <div class="row bg-white shadow-none rounded mx-1">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12 mt-3 mb-0">
                                            <h6 class="f-16 text-c-blue">Informe Endoscopía Digestiva</h6>
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="row div_form_examen_eda">
                                        <input type="hidden" class="form-control" name="id_examen_especialidad_tipo_eda" id="id_examen_especialidad_tipo_eda" value="{{ $array_examen_especialidad_tipo['eda'] }}">
                                        {!! $examen['eda'] !!}
                                    </div>
                                    <!--GUARDAR EXAMEN-->
                                    <div class="row">
                                        <div class="col-md-12 text-center mb-3">
                                            <input type="submit" class="btn btn-success mt-1" onclick="agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Examen e ir a su Agenda">
                                            <bottom type="bottom" class="btn btn-success mt-1" onclick="visualizar_pdf_examen('eda');">Ver Examen PDF</bottom>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--CIERRE: INFORME ENDOSCOPIA ALTA-->
                        <!--INFORME ENDOSCOPÍA DIGESTIVA BAJA-->
                        <div class="tab-pane fade" id="colonoscopia" role="tabpanel" aria-labelledby="colonoscopia-tab">
                           <div class="row bg-white shadow-none rounded mx-1">
                               <div class="col-md-12">
                                   <div class="row">
                                       <div class="col-md-12 mt-3 mb-0">
                                           <h6 class="f-16 text-c-blue">Informe Colonoscopía</h6>
                                           <hr>
                                       </div>
                                   </div>
                                </div>
                                <div class="row div_form_examen_edb">
                                    <input type="hidden" class="form-control" name="id_examen_especialidad_tipo_edb" id="id_examen_especialidad_tipo_edb" value="{{ $array_examen_especialidad_tipo['edb'] }}">
                                    {!! $examen['edb'] !!}
                                </div>
                                <!--GUARDAR EXAMEN-->
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12 text-center mb-3">
                                            <input type="submit" class="btn btn-success mt-1" onclick="agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Examen e ir a su Agenda">
                                            <bottom type="bottom" class="btn btn-success mt-1" onclick="visualizar_pdf_examen('edb');">Ver Examen PDF</bottom>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--CIERRE:INFORME ENDOSCOPÍA DIGESTIVA BAJA-->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@section('page-script-ficha-atencion')
    <script>
        function showContentTmcdg() {
            element = document.getElementById("contentTto_cdg");
            check = document.getElementById("tto_med_cdg");
            if (check.checked) {
                element.style.display='block';
            }
            else {
                element.style.display='none';
            }
        }


        function showContentProc_cdg() {
            element = document.getElementById("contentProc_cdg");
            check = document.getElementById("pr_cdg");
            if (check.checked) {
                element.style.display='block';
            }
            else {
                element.style.display='none';
            }
        }
         /** MENSAJE*/
			    /** CARGAR mensaje */
				$('#mensaje_ficha').html('<strong>Solo el campo Hipótesis diagnóstica es obligatorio el resto es opcional</strong>');
				$('#mensaje_ficha').show();
				setTimeout(function(){
					$('#mensaje_ficha').hide();
				}, 5000);
        $(document).ready(function() {
            /* formatear rut */
            $("#solicitado_por_rut_eda").rut({
                formatOn: 'keyup',
                minimumLength: 2,
                validateOn: 'change',
                useThousandsSeparator : false
            });

             /* formatear rut */
            $("#solicitado_por_rut_edb").rut({
                formatOn: 'keyup',
                minimumLength: 2,
                validateOn: 'change',
                useThousandsSeparator : false
            });
            /** fin formulario pestaña 1 */

            $('#hip_diag_spec').keyup(function(){
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

            /** accion check sol Pabellon */
            $('#cirug_cgd').change(function() {
                if ($('#cirug_cgd').is(':checked')) {
                    $('#ingreso_sol_pab_modal').modal('show');
                } else {
                    $('#ingreso_sol_pab_modal').modal('hide');
                }
            });

        function cargarIgual(input){

            let actual = $('#'+input);
            let equivalentes = $('#'+input).attr('data-input_igual').split(',');
            $.each(equivalentes, function( index, value ) {
                var equivalente = $('#'+value);
                equivalente.val(actual.val());
            });
        }


        function cargarCompletar(input)
        {
            let actual = $('#'+input);
            let equivalentes = $('#'+input).attr('data-input_igual').split(',');
            let seccion = $('#'+input).attr('data-input_seccion');
            $.each(equivalentes, function( index, value ) {
                var equivalente = $('#'+value);
                var valor_prev = equivalente.val();
                equivalente.val(valor_prev + ' - ' + seccion + ': ' + actual.val());
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

        function abrir_modal_guardar_tipo(div_id_data, div_id_detalle,tipo)
        {
            $("#btn_modal_registrar_ficha_tipo_dg").unbind();
            if(tipo == 'cdg')
            {
                $('#btn_modal_registrar_ficha_tipo_dg').click(function(){
                    guardar_tipo_ficha_cdg();
                });
            }
            else if(tipo == 'cg')
            {
                $('#btn_modal_registrar_ficha_tipo_dg').click(function(){
                    guardar_tipo_ficha_cg();
                });
            }
            $('#modal_registrar_ficha_tipo_dg').modal('show');

            cargarSeccion(div_id_detalle,div_id_data);
        }

        function cargarSeccion(div_destino, div_data)
        {
            // var tipo = $('#'+select+'').val();
            $('#'+div_destino).html('');
            $('#'+div_data).find('select,textarea').each(function(key, elemento){
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
                else if($(elemento).prop('nodeName') == 'TEXTAREA')
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

        function cambiar_div(mostrar, ocultar, label, textarea){
            $('.'+mostrar).show();
            $('.'+ocultar).hide();
            $('#'+label).html( $('#'+textarea).val() );
        }

        function guardar_tipo_ficha_cdg()
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
            url = "{{ route('profesional.ficha_tipo_cdg') }}";
            $.ajax({

                url: url,
                type: "POST",
                data: {
                    _token: _token,
                    id_profesional : $('#id_profesional_fc').val(),
                    ind_esp_cirugia : '',
                    nombre : data.registro_f_t_cg_nombre,
                    descripcion : data.registro_f_t_cg_descripcion,
                    dolor_cdg : data.modal_agregar_tipo_dolor_cdg,
                    obs_dolor_cdg : data.observaciones_obs_dolor_cdg,

                    transito_intest : data.modal_agregar_tipo_transito_intest,
                    obs_transito_intest : data.observaciones_obs_transito_intest,
                    dolor_def : data.modal_agregar_tipo_dolor_def,
                    obs_dolor_def : data.observaciones_obs_dolor_def,
                    sangre_otros : data.modal_agregar_tipo_sangre_otros,
                    obs_sangre_otros : data.observaciones_obs_sangre_otros,

                    otros_sintomas_cdg : data.modal_agregar_tipo_otros_sintomas_cdg,
                    obs_otros_sintomas_cdg : data.observaciones_obs_otros_sintomas_cdg,
                    ceg_cdg : data.modal_agregar_tipo_ceg_cdg,
                    obs_ceg_cdg : data.observaciones_obs_ceg_cdg,
                    masa_cdg : data.modal_agregar_tipo_masa_cdg,
                    obs_masa_cdg : data.observaciones_obs_masa_cdg,
                    urgencia_cdg : data.modal_agregar_tipo_urgencia_cdg,
                    obs_urgencia_cdg : data.observaciones_obs_urgencia_cdg,
                    so_cdg : data.modal_agregar_tipo_so_cdg,
                    obs_so_cdg : data.observaciones_obs_so_cdg,
                    obs_egp_cdg : data.observaciones_obs_egp_cdg,
                    obs_gen_ex_esp_cdg : data.observaciones_obs_gen_ex_esp_cdg,
                },
            })
            .done(function(data)
            {
                {{--  console.log('-----------------------');  --}}
                {{--  console.log(data);  --}}
                {{--  console.log('-----------------------');  --}}
                if(data.estado == 1)
                {
                    cargar_lista_tipo_ficha_cdg();
                    $('#modal_registrar_ficha_tipo_dg').modal('hide');
                    swal({
                        title: "Tipo Ficha Registrado",
                        icon: "success",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    })
                }
                else
                {
                    cargar_lista_tipo_ficha_cdg();
                    swal({
                        title: "Problema al Registrar Tipo Ficha.",
                        icon: "warning",
                        // buttons: "Aceptar",
                        // SuccessMode: true,
                    })
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        }

        function cargar_lista_tipo_ficha_cdg()
        {
            $('#select_ficha_tipo_ex_especialidad_cdg').html('<option value="">Seleccione</option>');

            url = "{{ route('profesional.cargar_fichas_tipo_cdg') }}";
            $.ajax({

                url: url,
                type: "GET",
                data: {},
            })
            .done(function(data)
            {
                if(data.estado == 1)
                {
                    $.each(data.registros, function(index, value)
                    {
                        $('#select_ficha_tipo_ex_especialidad_cdg').append('<option value="'+value.id+'" data-descripcion="'+value.descripcion+'">'+value.nombre+'</option>');
                    });
                    cargar_info_ficha_tipo_cdg('select_ficha_tipo_ex_especialidad_cdg','descripcion_ficha_tipo_ex_especialidad_cdg');
                }
                else
                {
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



        function cargar_info_ficha_tipo_cdg(select, div_descripcion)
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
                    else
                    {
                        $(elemento).val('');
                    }
                });

                evaluar_para_carga_detalle('dolor_cdg','div_detalle_dolor','obs_dolor_cdg',2);
                evaluar_para_carga_detalle('transito_intest','div_detalle_transito','obs_transito_intest',2);
                evaluar_para_carga_detalle('dolor_def','div_detalle_dolor_def','obs_dolor_def',2);
                evaluar_para_carga_detalle('sangre_otros','div_detalle_sangre_otros','obs_sangre_otros',2);
                evaluar_para_carga_detalle('otros_sintomas_cdg','div_detalle_cd_otros_sintomas','obs_otros_sintomas_cdg',2);
                evaluar_para_carga_detalle('ceg_cdg','div_detalle_ceg_cdg','obs_ceg_cdg',2);
                evaluar_para_carga_detalle('masa_cdg','div_detalle_masa_cdg','obs_masa_cdg',2);
                evaluar_para_carga_detalle('urgencia_cdg','div_detalle_urgencia_cdg','obs_urgencia_cdg',2);
                evaluar_para_carga_detalle('so_cdg','div_detale_sospecha__organo_cdg','obs_so_cdg',2);

                return false;
            }
            $('#'+div_descripcion).html($('#'+select+' option:selected').attr('data-descripcion'));

            url = "{{ route('profesional.buscar_ficha_tipo_cdg') }}";
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
                    evaluar_para_carga_detalle('dolor_cdg','div_detalle_dolor','obs_dolor_cdg',2);
                    evaluar_para_carga_detalle('transito_intest','div_detalle_transito','obs_transito_intest',2);
                    evaluar_para_carga_detalle('dolor_def','div_detalle_dolor_def','obs_dolor_def',2);
                    evaluar_para_carga_detalle('sangre_otros','div_detalle_sangre_otros','obs_sangre_otros',2);
                    evaluar_para_carga_detalle('otros_sintomas_cdg','div_detalle_cd_otros_sintomas','obs_otros_sintomas_cdg',2);
                    evaluar_para_carga_detalle('ceg_cdg','div_detalle_ceg_cdg','obs_ceg_cdg',2);
                    evaluar_para_carga_detalle('masa_cdg','div_detalle_masa_cdg','obs_masa_cdg',2);
                    evaluar_para_carga_detalle('urgencia_cdg','div_detalle_urgencia_cdg','obs_urgencia_cdg',2);
                    evaluar_para_carga_detalle('so_cdg','div_detale_sospecha__organo_cdg','obs_so_cdg',2);

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

        function cargar_info_ficha_tipo_cg(select, div_descripcion)
        {
            let id_ft = $('#'+select).val();
            if(id_ft == '')
            {
                $('#'+div_descripcion).html('');
                $('#form-cg').find('select,textarea').each(function(key, elemento){
                    if($(elemento).prop('nodeName') == 'SELECT')
                    {
                        $(elemento).val(1);
                    }
                    else
                    {
                        $(elemento).val('');
                    }
                });

                evaluar_para_carga_detalle('organo_cg','div_detalle_organo','obs_organo_cg',2);
                evaluar_para_carga_detalle('ceg_cg','div_detalle_ceg_cg','obs_ceg_cg',2);
                evaluar_para_carga_detalle('masa_cg','div_detalle_masa_cg','obs_masas_cg',2);
                evaluar_para_carga_detalle('urgencia_cg','div_detalle_urgencia_cg','obs_urgencia_cg',2);
                evaluar_para_carga_detalle('so_cg','div_detalle_so_cg','obs_so_cg',2);

                return false;
            }
            $('#'+div_descripcion).html($('#'+select+' option:selected').attr('data-descripcion'));

            url = "{{ route('profesional.buscar_ficha_tipo_cg') }}";
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
                    evaluar_para_carga_detalle('organo_cg','div_detalle_organo','obs_organo_cg',2);
                    evaluar_para_carga_detalle('ceg_cg','div_detalle_ceg_cg','obs_ceg_cg',2);
                    evaluar_para_carga_detalle('masa_cg','div_detalle_masa_cg','obs_masas_cg',2);
                    evaluar_para_carga_detalle('urgencia_cg','div_detalle_urgencia_cg','obs_urgencia_cg',2);
                    evaluar_para_carga_detalle('so_cg','div_detalle_so_cg','obs_so_cg',2);

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


        function biopsia(alias_examen)
        {
            if($('#biopsia_check_'+alias_examen).prop('checked'))
			{
				$('#m_biopsia_cir').modal('show');
                $('#biopsia_'+alias_examen).val(1);
			}
            else
            {
                $('#biopsia_'+alias_examen).val(0);
                $('#m_biopsia_cir').modal('hide');
            }
        }

		// function biopsia_endo_gas() {
        //     if($('#biopsia_end_gast').prop('checked'))
		// 	{
		// 		$('#m_biopsia_cir').modal('show');
        //         $('#biopsia_end_gast_eda').val(1);
		// 	}
        // }

        // function biopsia_endo_colon() {
        //     if($('#biopsia_colon').prop('checked'))
		// 	{
		// 		$('#m_biopsia_cir').modal('show');
		// 	}
        // }

		function muestra_hp_abrir_div(alias_examen)
		{
            var mensaje = ['Test de ureasa No tomado', 'Test de ureasa Negativo', 'Test de ureasa Positivo'];

            var texto_diag_2 = '';

			if($('#muestra_hp_check_'+alias_examen).prop('checked'))
			{
				$('#div_select_muestra_hp_'+alias_examen).show();
                $('#muestra_hp_'+alias_examen).val(1);

                var input_diagnostico = $('#muestra_hp_check_'+alias_examen).attr('data-diagnostico');
                var texto_diag = $('#'+input_diagnostico).val();


                var input_select = $('#muestra_hp_check_'+alias_examen).attr('data-select');
                var value_selct = $('#'+input_select).val();


                if(value_selct == 0)
                    texto_diag_2 = texto_diag.replace(mensaje[0], mensaje[1]);
                else
                    texto_diag_2 = texto_diag.replace(mensaje[0], mensaje[2]);

                $('#'+input_diagnostico).val(texto_diag_2);
			}
			else
			{
				$('#div_select_muestra_hp_'+alias_examen).hide();
                $('#muestra_hp_'+alias_examen).val(0);
				$('#muestra_hp_resultado_'+alias_examen).val('');

                var input_diagnostico = $('#muestra_hp_check_'+alias_examen).attr('data-diagnostico');
                var texto_diag = $('#'+input_diagnostico).val();

                texto_diag_2 = texto_diag.replace('Test de ureasa Negativo', 'Test de ureasa No tomado');
                texto_diag_2 = texto_diag_2.replace('Test de ureasa Positivo', 'Test de ureasa No tomado');

                var input_diagnostico = $('#muestra_hp_check_'+alias_examen).attr('data-diagnostico');
                $('#'+input_diagnostico).val(texto_diag_2);
			}
		}

        function cambio_muestra_hp_resultado(select, input)
        {
            var mensaje = ['Test de ureasa No tomado', 'Test de ureasa Negativo', 'Test de ureasa Positivo'];

            var value_selct = $('#'+select).val();
            var texto_diag = $('#'+input).val();
            var texto_diag_2 = '';

            if(value_selct == 0)
            {
                texto_diag_2 = texto_diag.replace('Test de ureasa No tomado', 'Test de ureasa Negativo');
                texto_diag_2 = texto_diag_2.replace('Test de ureasa Positivo', 'Test de ureasa Negativo');
            }
            else
            {
                texto_diag_2 = texto_diag.replace('Test de ureasa No tomado', 'Test de ureasa Positivo');
                texto_diag_2 = texto_diag_2.replace('Test de ureasa Negativo', 'Test de ureasa Positivo');
            }

            $('#'+input).val(texto_diag_2);
        }

        /** MANEJO DE IMAGENES */
        var myDropzone_eda ;
        Dropzone.options.misImagenesEda = {
            init:function()
            {
                myDropzone_eda = this;
            },
            url: "{{ route('profesional.imagen.carga') }}",
            method: 'post',
            createImageThumbnails: true,
            addRemoveLinks: true,
            headers:{
                'X-CSRF-TOKEN' : CSRF_TOKEN,
                // 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
            },
            previewTemplate: '<div class="dz-preview dz-processing dz-image-preview dz-success dz-complete"> <div class="dz-image"><img data-dz-thumbnail="" alt="" src=""></div><div class="dz-details"> <div class="dz-size"><span data-dz-size=""></span></div><div class="dz-filename"><span data-dz-name=""></span></div></div><div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress="" style=""></span></div><div class="dz-error-message"><span data-dz-errormessage=""></span></div><div class="dz-success-mark"><svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><title>Check</title><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><path d="M23.5,31.8431458 L17.5852419,25.9283877 C16.0248253,24.3679711 13.4910294,24.366835 11.9289322,25.9289322 C10.3700136,27.4878508 10.3665912,30.0234455 11.9283877,31.5852419 L20.4147581,40.0716123 C20.5133999,40.1702541 20.6159315,40.2626649 20.7218615,40.3488435 C22.2835669,41.8725651 24.794234,41.8626202 26.3461564,40.3106978 L43.3106978,23.3461564 C44.8771021,21.7797521 44.8758057,19.2483887 43.3137085,17.6862915 C41.7547899,16.1273729 39.2176035,16.1255422 37.6538436,17.6893022 L23.5,31.8431458 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" stroke-opacity="0.198794158" stroke="#747474" fill-opacity="0.816519475" fill="#FFFFFF"></path> </g> </svg></div><div class="dz-error-mark"><svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><title>Error</title><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g stroke="#747474" stroke-opacity="0.198794158" fill="#FFFFFF" fill-opacity="0.816519475"><path d="M32.6568542,29 L38.3106978,23.3461564 C39.8771021,21.7797521 39.8758057,19.2483887 38.3137085,17.6862915 C36.7547899,16.1273729 34.2176035,16.1255422 32.6538436,17.6893022 L27,23.3431458 L21.3461564,17.6893022 C19.7823965,16.1255422 17.2452101,16.1273729 15.6862915,17.6862915 C14.1241943,19.2483887 14.1228979,21.7797521 15.6893022,23.3461564 L21.3431458,29 L15.6893022,34.6538436 C14.1228979,36.2202479 14.1241943,38.7516113 15.6862915,40.3137085 C17.2452101,41.8726271 19.7823965,41.8744578 21.3461564,40.3106978 L27,34.6568542 L32.6538436,40.3106978 C34.2176035,41.8744578 36.7547899,41.8726271 38.3137085,40.3137085 C39.8758057,38.7516113 39.8771021,36.2202479 38.3106978,34.6538436 L32.6568542,29 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z"></path></g></g></svg></div> <input type="text" placeholder="Descripción" id="description_img" name="description_img" value="" class="form-control form-control-sm " onchange="cargar_lista_imagenes('+myDropzone_eda+', \'eda\');"></div>',

            acceptedFiles: "image/*",
            maxFilesize: 4,
            maxFiles: 12,
            /** El texto utilizado antes de que se eliminen los archivos. */
            dictDefaultMessage: "Arrastre una imagen al recuadro para subirlo.",

            /** El texto que reemplaza el texto del mensaje predeterminado si el navegador no es compatible. */
            dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",

            /**
             * El texto que se agregará antes del formulario alternativo.
             * Si usted mismo proporciona un elemento alternativo, o si esta opción es `nula`, esto
             * ser ignorado.
             */
            dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",

            /**
             * Si el tamaño del archivo es demasiado grande.
             * `{ {filesize} }` y `{ {maxFilesize} }` serán reemplazados con los respectivos valores de configuración.
             */
            dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",

            /** Si el archivo no coincide con el tipo de archivo. */
            dictInvalidFileType: "No puedes subir archivos de este tipo.",

            /** Si `addRemoveLinks` es verdadero, el texto que se usará para cancelar el enlace de carga. */
            dictCancelUpload: "Cancelar carga",

            /** El texto que se muestra si una carga se canceló manualmente */
            dictUploadCanceled: "Subida cancelada.",

            /** Si `addRemoveLinks` es verdadero, el texto que se utilizará para la confirmación al cancelar la carga. */
            dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",

            /** Si `addRemoveLinks` es verdadero, el texto que se usará para eliminar un archivo. */
            dictRemoveFile: "Eliminar archivo",

            /**
             * Se muestra si `maxFiles` es st y se excede.
             */
            dictMaxFilesExceeded: "No puede cargar más archivos.",

            // accept(file, done) {
            //     console.log('-------------accept-----------------------');
            //     cargar_lista_imagenes();
            //     return done();
            // },
            success: function(file, response){
                // console.log('-------------success-----------------------');
                cargar_lista_imagenes(myDropzone_eda,'eda');

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
                if (file.previewElement != null && file.previewElement.parentNode != null) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }
                cargar_lista_imagenes(myDropzone_eda,'eda');
                return this._updateMaxFilesReachedClass();
            },
            canceled: function canceled(file) {
                cargar_lista_imagenes(myDropzone_eda,'eda');
                return this.emit("error", file, this.options.dictUploadCanceled);
            },
        };

        var myDropzone_edb ;
        Dropzone.options.misImagenesEdb = {
            init:function()
            {
                myDropzone_edb = this;
            },
            url: "{{ route('profesional.imagen.carga') }}",
            method: 'post',
            createImageThumbnails: true,
            addRemoveLinks: true,
            headers:{
                'X-CSRF-TOKEN' : CSRF_TOKEN,
                // 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
            },

            previewTemplate: '<div class="dz-preview dz-processing dz-image-preview dz-success dz-complete"> <div class="dz-image"><img data-dz-thumbnail="" alt="" src=""></div><div class="dz-details"> <div class="dz-size"><span data-dz-size=""></span></div><div class="dz-filename"><span data-dz-name=""></span></div></div><div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress="" style=""></span></div><div class="dz-error-message"><span data-dz-errormessage=""></span></div><div class="dz-success-mark"><svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><title>Check</title><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><path d="M23.5,31.8431458 L17.5852419,25.9283877 C16.0248253,24.3679711 13.4910294,24.366835 11.9289322,25.9289322 C10.3700136,27.4878508 10.3665912,30.0234455 11.9283877,31.5852419 L20.4147581,40.0716123 C20.5133999,40.1702541 20.6159315,40.2626649 20.7218615,40.3488435 C22.2835669,41.8725651 24.794234,41.8626202 26.3461564,40.3106978 L43.3106978,23.3461564 C44.8771021,21.7797521 44.8758057,19.2483887 43.3137085,17.6862915 C41.7547899,16.1273729 39.2176035,16.1255422 37.6538436,17.6893022 L23.5,31.8431458 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" stroke-opacity="0.198794158" stroke="#747474" fill-opacity="0.816519475" fill="#FFFFFF"></path> </g> </svg></div><div class="dz-error-mark"><svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><title>Error</title><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g stroke="#747474" stroke-opacity="0.198794158" fill="#FFFFFF" fill-opacity="0.816519475"><path d="M32.6568542,29 L38.3106978,23.3461564 C39.8771021,21.7797521 39.8758057,19.2483887 38.3137085,17.6862915 C36.7547899,16.1273729 34.2176035,16.1255422 32.6538436,17.6893022 L27,23.3431458 L21.3461564,17.6893022 C19.7823965,16.1255422 17.2452101,16.1273729 15.6862915,17.6862915 C14.1241943,19.2483887 14.1228979,21.7797521 15.6893022,23.3461564 L21.3431458,29 L15.6893022,34.6538436 C14.1228979,36.2202479 14.1241943,38.7516113 15.6862915,40.3137085 C17.2452101,41.8726271 19.7823965,41.8744578 21.3461564,40.3106978 L27,34.6568542 L32.6538436,40.3106978 C34.2176035,41.8744578 36.7547899,41.8726271 38.3137085,40.3137085 C39.8758057,38.7516113 39.8771021,36.2202479 38.3106978,34.6538436 L32.6568542,29 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z"></path></g></g></svg></div> <input type="text" placeholder="Descripción" id="description_img" name="description_img" value="" class="form-control form-control-sm " onchange="cargar_lista_imagenes('+myDropzone_edb+', \'edb\');"></div>',

            acceptedFiles: "image/*",
            maxFilesize: 4,
            maxFiles: 12,
            /** El texto utilizado antes de que se eliminen los archivos. */
            dictDefaultMessage: "Arrastre una imagen al recuadro para subirlo.",

            /** El texto que reemplaza el texto del mensaje predeterminado si el navegador no es compatible. */
            dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",

            /**
             * El texto que se agregará antes del formulario alternativo.
             * Si usted mismo proporciona un elemento alternativo, o si esta opción es `nula`, esto
             * ser ignorado.
             */
            dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",

            /**
             * Si el tamaño del archivo es demasiado grande.
             * `{ {filesize} }` y `{ {maxFilesize} }` serán reemplazados con los respectivos valores de configuración.
             */
             dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",

            /** Si el archivo no coincide con el tipo de archivo. */
            dictInvalidFileType: "No puedes subir archivos de este tipo.",

            /** Si `addRemoveLinks` es verdadero, el texto que se usará para cancelar el enlace de carga. */
            dictCancelUpload: "Cancelar carga",

            /** El texto que se muestra si una carga se canceló manualmente */
            dictUploadCanceled: "Subida cancelada.",

            /** Si `addRemoveLinks` es verdadero, el texto que se utilizará para la confirmación al cancelar la carga. */
            dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",

            /** Si `addRemoveLinks` es verdadero, el texto que se usará para eliminar un archivo. */
            dictRemoveFile: "Eliminar archivo",

            /**
             * Se muestra si `maxFiles` es st y se excede.
             */
            dictMaxFilesExceeded: "No puede cargar más archivos.",

            // accept(file, done) {
            //     console.log('-------------accept-----------------------');
            //     cargar_lista_imagenes();
            //     return done();
            // },
            success: function(file, response){
                // console.log('-------------success-----------------------');
                cargar_lista_imagenes(myDropzone_edb, 'edb');

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
                if (file.previewElement != null && file.previewElement.parentNode != null) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }
                cargar_lista_imagenes(myDropzone_edb, 'edb');
                return this._updateMaxFilesReachedClass();
            },
            canceled: function canceled(file) {
                cargar_lista_imagenes(myDropzone_edb, 'edb');
                return this.emit("error", file, this.options.dictUploadCanceled);
            },
        };


        var lista_imagenes = {};
        function cargar_lista_imagenes(obj_dropzone, alias_examen)
        {
            console.log('--------------cargar_lista_imagenes----------------------');
            if(obj_dropzone == undefined)
            {
                if(alias_examen == 'eda')
                    obj_dropzone = myDropzone_eda;
                else
                    obj_dropzone = myDropzone_edb;

            }
            lista_imagenes[alias_examen] = [];
            let temp  = obj_dropzone.getAcceptedFiles();
            console.log('----------------temp--------------------');
            console.log(temp);
            if(temp.length == 0)
            {
                $('#input_lista_imagenes').val('');
                $('#input_lista_imagenes').val(JSON.stringify(lista_imagenes));
            }
            else
            {
                $.each(temp, function( index, value )
                {
                    console.log('------------------------------------');
                    console.log(index);
                    console.log(value);
                    // var str = value.previewElement.querySelector("#description_img").value;
                    // console.log(str);
                    console.log('------------------------------------');
                    if(value.status == "success")
                    {
                        if(value.xhr !== undefined)
                        {

                            var str = '';
                            if(value.previewElement.querySelector("#description_img"))
                                str = value.previewElement.querySelector("#description_img").value;
                            var img_temp = JSON.parse(value.xhr.response);
                            lista_imagenes[alias_examen][index] = [
                                url=img_temp.img.url,
                                nombre_origian= img_temp.img.original_file_name,
                                nombre_img = img_temp.img.nombre_img,
                                file_extension = img_temp.img.file_extension,
                                descripcion = str,
                            ];
                            $('#input_lista_imagenes').val('');
                            $('#input_lista_imagenes').val(JSON.stringify(lista_imagenes));
                        }
                    }
                });
            }


        }
        /** CIERRE MANEJO DE IMAGENES */

        function cargar_profesional(rut, input_nombre_completo, input_id, div_solicitar, input_nombre, input_apellido, input_tel, input_email, div_mensaje, text_mensaje)
        {
            rut = $(rut).val();

            // console.log('------------------------------------');
            // console.log(rut.length);
            // console.log(rut);
            // console.log('------------------------------------');

            if(rut.length>5)
            {
                url = "{{ route('profesional.buscar') }}";
                $.ajax({

                    url: url,
                    type: "GET",
                    data: {
                        rut : rut,
                    },
                })
                .done(function(data)
                {
                    // console.log('-----------------------');
                    // console.log(data);
                    // console.log('-----------------------');
                    if(data.estado == 1)
                    {

                        if(data.registros.length>0)
                        {
                            var nombre = data.registros[0].nombre+' '+data.registros[0].apellido_uno;
                            var id = data.registros[0].id;
                            // $('#'+input_nombre).attr('readonly', true);
                            $('#'+input_nombre_completo).val(nombre);
                            $('#'+input_id).val(id);
                            $('#'+div_solicitar).hide();
                            mensaje = '';
                            $('#'.div_mensaje).hide();
                            $('#'+text_mensaje).html(mensaje);
                            $('#'+input_nombre).val('');
                            $('#'+input_apellido).val('');
                            $('#'+input_tel).val('');
                            $('#'+input_email).val('');
                        }
                        else
                        {
                            mensaje = 'Profesional no encontrato, debe ingresar datos.';
                            $('#'+input_nombre_completo).val('');
                            $('#'+input_id).val('');
                            $('#'+div_solicitar).show();
                            $('#'.div_mensaje).show();
                            $('#'+text_mensaje).html(mensaje);
                            $('#'.input_nombre).val('');
                            $('#'.input_apellido).val('');
                            $('#'.input_tel).val('');
                            $('#'.input_email).val('');
                            // $('#'+input_nombre).attr('readonly', true);
                        }
                    }
                    else
                    {
                        mensaje = 'Se presento un problema en la busqueda intente nuevamente';
                        $('#'.div_mensaje).show();
                        $('#'+text_mensaje).html(mensaje);
                        // $('#'+input_nombre).attr('readonly', false);
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
            }
            else if(rut.length==0)
            {
                $('#'+input_nombre).val('');
                // $('#'+input_nombre).attr('readonly', true);
                $('#'+input_id).val('');
                $('#'+div_solicitar).hide();
                $('#div_mensaje').hide();
                $('#mensaje_solicitado_por').html('');
            }
        }

        function actualizar_solicitado_por(input_solitado_por, input_nombre, input_apellido)
        {
            var nombre = $('#'+input_nombre).val();
            var apellido = $('#'+input_apellido).val();
            if(nombre != '' || apellido != '')
            {
                // $('#'+input_solitado_por).attr('readonly', true);
                $('#'+input_solitado_por).val($('#'+input_nombre).val()+' '+$('#'+input_apellido).val());
            }
            else
            {
                // $('#'+input_solitado_por).attr('readonly', false);
                $('#'+input_solitado_por).val();
            }
        }

        /** PERVISUALIZACION DE EXAMEN */
        function visualizar_pdf_examen(tipo_examen)
        {
            if(tipo_examen!='')
            {
                var array_datos = {};
                $('.div_form_examen_'+tipo_examen).find('input,textarea,select').each(function (key, element){
                    var key_temp = element.id.replace('_'+tipo_examen,'');

                    if(key_temp == 'biopsia' || key_temp == 'muestra_hp')
                    {
                        if(element.value == 1)
                        {
                            array_datos[key_temp] = 'SI';
                        }
                        else
                        {
                            array_datos[key_temp] = 'NO';
                        }
                    }
                    else if(key_temp == 'muestra_hp_resultado')
                    {
                        if(element.value == 1)
                        {
                            array_datos[key_temp] = 'Positivo';
                        }
                        else
                        {
                            array_datos[key_temp] = 'Negativa';
                        }
                    }
                    else
                    {
                        array_datos[key_temp] = element.value;
                    }
                });

                var imagenes = $('#input_lista_imagenes').val();
                if(imagenes != '')
                {
                    imagenes = JSON.parse(imagenes);
                    imagenes = JSON.stringify(JSON.stringify(imagenes[tipo_examen]));
                    console.log(imagenes );
                }


                var data ='id_ficha='+$('#id_fc').val()+'&contenido='+JSON.stringify(array_datos)+'&imagenes='+imagenes;
                Fancybox.show(
                    [
                        {
                        src: '{{ route("pdf.visualizar.examen") }}?'+data,
                        type: "iframe",
                        preload: false,
                        },
                    ]
                );
            }
            else
            {
                console.log('tipo examen no especificado');
            }
        }


    </script>
@endsection


