<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-1">
        <div class="row mx-0">
            <div class="col-sm-12 col-md-12">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="uro" role="tablist">
                    <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="atencion_uro-tab" data-toggle="tab" href="#atencion_uro" role="tab" aria-controls="atencion_uro" aria-selected="true">Atención Especialidad</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="cisto-tab" data-toggle="tab" href="#cisto" role="tab" aria-controls="cisto" aria-selected="false">Cistoscopía</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="uroflujo-tab" data-toggle="tab" href="#uroflujo" role="tab" aria-controls="uroflujo" aria-selected="false">Uroflujometría</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="in-ven-urologia-tab" data-toggle="tab" href="#in-ven-urologia" role="tab" aria-controls="in-ven-urologia" aria-selected="false">Venéreas</a>
                    </li>
                </ul>
            </div>
            <!--ALERTA-->
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="alert-atencion alert alert-warning-b alert-dismissible fade show" role="alert"><strong>Solo el campo diagnóstico es obligatorio el resto es opcional</strong>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <form action="{{ route('fichaAtencion.registrar_ficha_uro') }}" method="POST">
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
                    @endphp

                    @csrf
                    <div class="tab-content" id="uro-contenido">
                        <!--ATENCIÓN ESPECIALIDAD GENERAL-->
                        <div class="tab-pane fade show active" id="atencion_uro" role="tabpanel" aria-labelledby="atencion_uro-tab">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <!--FORMULARIOS-->
                                    <div class="row">
                                        <!--Formulario / Menor de edad-->
                                        @include('atencion_medica.generales.seccion_menor')
                                        <!--Cierre: Formulario / Menor de edad-->
                                        <!--Motivo consulta-->
                                        @include('general.secciones_ficha.motivo')
                                        <!--EXAMEN ESPECIALIDAD - PARAMETROS DE CONTROL-->
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="card-a">
                                                <div class="card-header-a" id="exam_esp_urol">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left has-ripple card-act-open collapsed" type="button" data-toggle="collapse" data-target="#exam_esp_urol_c" aria-expanded="false" aria-controls="exam_esp_urol_c">
                                                        Examen especialidad Urología
                                                    </button>
                                                </div>
                                                <div id="exam_esp_urol_c" class="collapse" aria-labelledby="exam_esp_urol" data-parent="#exam_esp_urol">
                                                    <div class="card-body-aten-a">
                                                        <div class="row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <ul class="nav nav-tabs-aten nav-fill" id="cir_dig" role="tablist">
                                                                    <li class="nav-item">
                                                                        <a class="nav-link-aten text-reset active" id="uro_sint_tab" data-toggle="tab" href="#uro_sint" role="tab" aria-controls="uro_sint" aria-selected="true">Examen general</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link-aten text-reset" id="uro_dg_tab" data-toggle="tab" href="#uro_dg" role="tab" aria-controls="uro_dg" aria-selected="true">Lab. y fotos Especialidad</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link-aten text-reset" id="ex_plan_tto-tab" data-toggle="tab" href="#ex_plan_tto" role="tab" aria-controls="ex_plan_tto" aria-selected="true">Plan de tratamiento</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <div class="tab-content" id="urologia">
                                                                    <!--SINTOMAS GENERALES-->
                                                                    <div class="tab-pane fade show active" id="uro_sint" role="tabpanel" aria-labelledby="uro_sint_tab">
                                                                        <div class="row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <div class="tab-content" id="v-pills-tabContent">
                                                                                    <div class="tab-pane fade show active" id="sint_dol" role="tabpanel" aria-labelledby="sint_dol-tab">
                                                                                        <div class="card-body-aten-a">
                                                                                            <div id="form-cdb">
                                                                                                <div class="form-row mb-2">
                                                                                                    <div class="col-md-12">
                                                                                                        <h6 class="t-aten-dos">Examen general</h6>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <hr>
                                                                                                <div class="form-row">
                                                                                                    <div class="col-md-12">
                                                                                                        <div class="form-group" id="div_detalle_transito_intest" >
                                                                                                            <label class="floating-label-activo-sm" for="cdb_ex_fisico_ab">Motivo de consulta y Examen general </label>
                                                                                                            <textarea class="form-control caja-texto form-control-sm" rows="2" data-titulo="Estado General del Paciente" data-seccion="Cirugia digest baja" data-tipo="cirugia digest baja" onfocus="this.rows=3" onblur="this.rows=2;" name="cdb_ex_fisico_ab" id="cdb_ex_fisico_ab" placeholder="ZONA DOLOROSA, CUANDO DUELE, CEG,EXAMEN DEABDOMEN INGLE Y ZONA COSTO-VERTEBRAL "></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-md-12">
                                                                                                        <div class="form-group" id="div_detalle_transito_intest" >
                                                                                                            <label class="floating-label-activo-sm" for="cdb_ex_tr">Examen físico Genitales Externos</label>
                                                                                                            <textarea class="form-control caja-texto form-control-sm" rows="2" data-titulo="Estado General del Paciente" data-seccion="Cirugia digest baja" data-tipo="cirugia digest baja" onfocus="this.rows=3" onblur="this.rows=2;" name="cdb_ex_tr" id="cdb_ex_tr" placeholder="URETRA, PRESENCIA DE SANGRE,GENITALES INTERNOS"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-md-12">
                                                                                                        <div class="form-group" id="div_detalle_transito_intest" >
                                                                                                            <label class="floating-label-activo-sm" for="cdb_ex_tr">Examen físico Genitales Internos</label>
                                                                                                            <textarea class="form-control caja-texto form-control-sm" rows="2" data-titulo="Estado General del Paciente" data-seccion="Cirugia digest baja" data-tipo="cirugia digest baja" onfocus="this.rows=3" onblur="this.rows=2;" name="cdb_ex_tr" id="cdb_ex_tr" placeholder="TACTO RECTAL, ESPECULOSCOPÍA OTROS HALLAZGOS"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-md-4">
                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm" for="urgencia_cdg">Es Urgencia Qx.?</label>
                                                                                                            <select name="urgencia_cdg" id="urgencia_cdg" data-titulo="Estado General del Paciente" data-seccion="Cirugia digest baja" data-tipo="cirugia digest baja" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('urgencia_cdg','div_detalle_urgencia_cdg','obs_urgencia_cdg',2);">
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
                                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Estado General del Paciente" data-seccion="Cirugia digest baja" data-tipo="cirugia digest baja" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_egp_cdg" id="obs_egp_cdg" placeholder="ANOTE APRECIACIÓN SOBRE ESTADO GENERAL DEL PACIENTE"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-sm-4 col-md-4 mb-3">
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
                                                                                                    <div class="col-sm-4 col-md-4 mb-3">
                                                                                                        <span id="descripcion_ficha_tipo_ex_especialidad_cdb"></span>
                                                                                                    </div>
                                                                                                    <div class="col-sm-4 col-md-4 mb-3">
                                                                                                        <button type="button" class="btn btn-outline-primary has-ripple" onclick="abrir_modal_guardar_tipo('form-cdb','registro_f_t_cg_detalle','cdg');"><i class="me-2" data-feather="thumbs-up"></i>Guardar Nueva Ficha Tipo <span class="ripple ripple-animate" style="height: 99.2656px; width: 99.2656px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255); opacity: 0.4; top: -30.5938px; left: 13.625px;"></span></button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--LAB. ESPECIALIDAD-->
                                                                    <div class="tab-pane fade" id="uro_dg" role="tabpanel" aria-labelledby="uro_dg_tab">
                                                                         <div class="row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <h6 class="t-aten-dos">Lab. Especialidad</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                                    <a class="nav-link-aten text-reset" id="est_mic_uro-tab" data-toggle="tab" href="#est_mic_uro" role="tab" aria-controls="est_mic_uro" aria-selected="false">Exam. Especialidad</a>
                                                                                    <a class="nav-link-aten text-reset" id="fotos_uro-tab" data-toggle="tab" href="#fotos_uro" role="tab" aria-controls="fotos_uro" aria-selected="false">Fotos</a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-10 col-lg-10 col-xl-10">
                                                                                <div class="tab-content" id="v-pills-tabContent">
                                                                                    <div class="tab-pane fade show active" id="est_mic_uro" role="tabpanel" aria-labelledby="est_mic_uro-tab">
                                                                                        <div class="form-row">
                                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                <h6 class="t-aten">Exámen especialidad</h6>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-row">
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group" id="div_detalle_transito_intest" >
                                                                                                    <label class="floating-label-activo-sm" for="cdb_ex_tr">Estudios de Lab. resultado exámenes</label>
                                                                                                    <textarea class="form-control caja-texto form-control-sm" rows="2" data-titulo="Estado General del Paciente" data-seccion="Cirugia digest baja" data-tipo="cirugia digest baja" onfocus="this.rows=3" onblur="this.rows=2;" name="cdb_ex_tr" id="cdb_ex_tr" placeholder="ESTUDIO HORMONAL ANTIGENO PROSTÁTICO OTROS EXÁMENES"></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-row">
                                                                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                <div class="form-group">
                                                                                                    <button type="button" class="btn btn-primary-light-c btn-xs btn-block" onclick="sol_examen_cistoscopia()";><i class="feather icon-info"></i> Solicitar Cistoscopía</button>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                <div class="form-group">
                                                                                                    <button type="button" class="btn btn-primary-light-c btn-xs btn-block" onclick="sol_examen_urodin()";><i class="feather icon-info"></i> Solicitar Est. Urodinámico</button>
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                <div class="form-group">
                                                                                                     <button type="button" class="btn btn-primary-light-c btn-xs btn-block" onclick="sol_examen_esp_uro()";><i class="feather icon-info"></i> Solicitar Est.Hormonal</button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-12">
                                                                                            <div class="form-row">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="tab-pane fade" id="fotos_uro" role="tabpanel" aria-labelledby="fotos_uro-tab">
                                                                                        <div class="form-row">
                                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                <h6 class="t-aten">Fotos</h6>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-row">
                                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-3">
                                                                                                <p class="f-12 mb-0 font-weight-bold" style="text-align:center">Imagenes pre</p>
                                                                                                <div class="dropzone" id="mis-imagenes-imagenes-uro-pre" action="{{ route('profesional.imagen.carga') }}"></div>
                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-3">
                                                                                                <p class="f-12 mb-0 font-weight-bold"style="text-align:center"> Imagenes post</p>
                                                                                                <div class="dropzone" id="mis-imagenes-imagenes-uro-post" action="{{ route('profesional.imagen.carga') }}"></div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-row">
                                                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                <label class="floating-label-activo-sm">Comentarios</label>
                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Fotos" data-seccion=" Fotos" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_fotos_ven" id="obs_fotos_ven"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--PLAN DE TRATAMIENTO-->
                                                                    <div class="tab-pane fade show" id="ex_plan_tto" role="tabpanel" aria-labelledby="ex_plan_tto-tab">
                                                                        <script type="text/javascript">
                                                                               $(document).ready(function() {
                                                                                });
                                                                        </script>
                                                                        <div class="form-row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-0">
                                                                                <h6 class="t-aten-dos">Plan de Tratamiento</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-0 mt-0">

                                                                                <label class="ml-0"><strong>Tratamiento médico</strong></label>
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" id="tto_uro" name="tto_uro" value="1" onchange="javascript:showContenturo()" />
                                                                                    <label for="tto_uro" class="cr"></label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <div id="contentTto_uro" style="display: none;">
                                                                                    <div class="form-row">
                                                                                        {{-- <div class="form-group col-md-6">
																						@include('general.secciones_ficha.receta_examen.seccion_recetario')
                                                                                        </div>
																						 --}}
                                                                                        <div class="form-group col-md-12 mt-1">
                                                                                            <label class="floating-label-activo-sm">Recomendaciones</label>
                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Recomendaciones" data-seccion="Tratamiento Uro" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="recomendaciones_tto_uro" id="recomendaciones_tto_uro"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-0 mt-0">
                                                                                <label class="ml-0"><strong>Procedimiento</strong></label>
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" id="pr_uro" name="pr_uro" value="1" onchange="javascript: showContentProc_uro()" />
                                                                                    <label for="pr_uro" class="cr"></label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <div id="contentProc_uro" style="display: none;">
                                                                                    <div class="form-row">
                                                                                        <div class="form-group col-md-4">
                                                                                            <label class="floating-label-activo-sm">Tipo</label>
                                                                                            <input type="text" class="form-control form-control-sm" name="tipo_proc_uro" id="tipo_proc_uro">
                                                                                        </div>
                                                                                        <div class="form-group col-md-8">
                                                                                            <label class="floating-label-activo-sm">Plan</label>
                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Procedimiento" data-seccion="Tipo Procedimiento" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="plan_proc_uro" id="plan_proc_uro"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-0">
                                                                                <label class="ml-0"><strong>Cirugía</strong></label>
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" class="custom-control-input" id="urogen" name="urogen" value="{!! old('urogen') !!}">
                                                                                    <label class="cr" for="urogen"></label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <div id="contentTto_uro" style="display: none;">
                                                                                    <div class="form-row">
                                                                                        <div class="form-group col-md-12">
                                                                                            <h6 class="text-center">Tratamiento médico</h6>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-row pt-3">
                                                                                        {{-- <div class="form-group col-md-4">
																							@include('general.secciones_ficha.receta_examen.seccion_recetario')
                                                                                        </div>
																						--}}
                                                                                        <div class="form-group col-md-12">
                                                                                            <label class="floating-label-activo-sm">Recomendaciones</label>
                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Recomendaciones" data-seccion="Tratamiento Uro" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="recomendaciones_tto_uro" id="recomendaciones_tto_uro"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <hr>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <label class="floating-label-activo-sm">Obs. Plan de tratamiento</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Plan de tratamiento" data-seccion=" Plan de tratamiento" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_plan_tratamiento" id="obs_plan_tratamiento"></textarea>
                                                                            </div>
                                                                            {{-- @include('general.hospitalizacion.modals.in_solic_pabellon') --}}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- hospitalizar -->
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
                                        <!-- control post qx -->
                                        @include('general.secciones_ficha.control_cirugia_gen')
										<!-- cierre control post qx -->
                                        <!--Formulario / Signos vitales y otros-->
                                         @include('general.secciones_ficha.signos_vitales')
                                        <!--Cierre: Formulario / Signos vitales y otros-->

                                        <!--ENFERMO CRÓNICO O GES-->
                                        @include('general.secciones_ficha.seccion_cronicos_ges_confidencial')

                                        <!--Diagnóstico-->
                                        @include('general.secciones_ficha.diagnostico')

                                        {{--  div de botones  --}}
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="card">
                                                <div class="card-body">
                                                <!--SECCION DE MEDICAMENTOS Y EXAMENES GENERALES -->
                                                @include('general.secciones_ficha.seccion_receta_examen_comunes')
                                                <!--SECCION DE MEDICAMENTOS Y EXAMENES GENERALES FIN  -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-center">
                                            <input type="submit" class="btn btn-info mt-1" onclick="$('#cerrarsession').val('1');agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar ficha y finalizar su consulta">
                                            <input type="submit" class="btn btn-purple mt-1" onclick="agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar ficha e ir a su agenda">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--GUARDAR O IMPRIMIR FICHA-->
                        </div>
                        <!--CIERRE: ATENCIÓN ESPECIALIDAD GENERAL-->
                        <!-- CISTOSCOPÍA-->
                        <div class="tab-pane fade" id="cisto" role="tabpanel" aria-labelledby="cisto-tab">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6 class="tit-gen">Citoscopía</h6>
                                    </div>
                                </div>
                                <div class="row div_form_examen_cisto">
                                    <input type="hidden" class="form-control" name="id_examen_especialidad_tipo_cisto" id="id_examen_especialidad_tipo_cisto" value="6">
                                    <!-- SOLICITADO POR -->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-a">
                                            <div class="card-header-a" id="solicitado_por">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#solicitado_por_c" aria-expanded="false" aria-controls="solicitado_por_c">
                                                    Solicitado por
                                                </button>
                                            </div>
                                            <div id="solicitado_por_c" class="collapse show" aria-labelledby="solicitado_por" data-parent="#solicitado_por">
                                                <div class="card-body-aten-a">
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                            <input type="hidden" name="id_profesional_solicitado_por_cisto" id="id_profesional_solicitado_por_cisto" value="">
                                                            <label class="floating-label-activo-sm">RUT</label>
                                                            <input type="text" class="form-control form-control-sm" name="solicitado_por_rut_cisto" id="solicitado_por_rut_cisto"
                                                            onblur="cargar_profesional(this,'solicitado_por_cisto', 'id_profesional_solicitado_por_cisto', 'div_profesional_no_inscrito_cisto', 'solicitado_por_nombre_cisto', 'solicitado_por_apellido_cisto', 'solicitado_por_telefono_cisto', 'solicitado_por_email_cisto', 'div_mensaje_cisto', 'mensaje_solicitado_por_cisto');"
                                                            onchange="cargar_profesional(this,'solicitado_por_cisto', 'id_profesional_solicitado_por_cisto', 'div_profesional_no_inscrito_cisto', 'solicitado_por_nombre_cisto', 'solicitado_por_apellido_cisto', 'solicitado_por_telefono_cisto', 'solicitado_por_email_cisto', 'div_mensaje_cisto', 'mensaje_solicitado_por_cisto');"
                                                            onkeyup="cargar_profesional(this,'solicitado_por_cisto', 'id_profesional_solicitado_por_cisto', 'div_profesional_no_inscrito_cisto', 'solicitado_por_nombre_cisto', 'solicitado_por_apellido_cisto', 'solicitado_por_telefono_cisto', 'solicitado_por_email_cisto', 'div_mensaje_cisto', 'mensaje_solicitado_por_cisto');">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                            <label class="floating-label-activo-sm">Solicitado por</label>
                                                            <input type="text" class="form-control form-control-sm" name="solicitado_por_cisto" id="solicitado_por_cisto">
                                                        </div>

                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                            <label class="floating-label-activo-sm">Hipótesis Diagnóstica</label>
                                                            <input type="text" class="form-control form-control-sm" data-input_igual="descripcion_hipotesis" name="sospecha_diagnostica_cisto" id="sospecha_diagnostica_cisto" onchange="cargarIgual('sospecha_diagnostica_cisto')">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                            <label class="floating-label-activo-sm">Premedicación</label>
                                                            <input type="text" class="form-control form-control-sm" name="premed_cisto" id="premed_cisto">
                                                        </div>
                                                        <div class="form-group col-md-12" id="div_mensaje_cisto"  style="display: none;">
                                                            <span style="font-size: 10px;color: #ff0808;" id="mensaje_solicitado_por_cisto"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-row" id="div_profesional_no_inscrito_cisto" style="display: none;">
                                                        <div class="form-group col-md-3">
                                                            <label class="floating-label-activo-sm">Nombre</label>
                                                            <input type="text" class="form-control form-control-sm"  name="solicitado_por_nombre_cisto" id="solicitado_por_nombre_cisto" onchange="actualizar_solicitado_por('solicitado_por_cisto', 'solicitado_por_nombre_cisto', 'solicitado_por_apellido_cisto');">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="floating-label-activo-sm">Apellido</label>
                                                            <input type="text" class="form-control form-control-sm"  name="solicitado_por_apellido_cisto" id="solicitado_por_apellido_cisto" onchange="actualizar_solicitado_por('solicitado_por_cisto', 'solicitado_por_nombre_cisto', 'solicitado_por_apellido_cisto');">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="floating-label-activo-sm">Telefono</label>
                                                            <input type="text" class="form-control form-control-sm"  name="solicitado_por_telefono_cisto" id="solicitado_por_telefono_cisto" >
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="floating-label-activo-sm">Email</label>
                                                            <input type="text" class="form-control form-control-sm"  name="solicitado_por_email_cisto" id="solicitado_por_email_cisto" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- FIN SOLICITADO POR -->
                                    <!--INFORME CITOSCOPIA-->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-a">
                                            <div class="card-header-a" id="infor-citoscopia">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#infor-citoscopia-c" aria-expanded="false" aria-controls="infor-citoscopia-c">
                                                Informe
                                                </button>
                                            </div>
                                            <div id="infor-citoscopia-c" class="collapse show" aria-labelledby="infor-citoscopia" data-parent="#infor-citoscopia">
                                                <div class="card-body-aten-a">
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                            <label class="floating-label-activo-sm">Meato y Uretra</label>
                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="uretra_cisto" id="uretra_cisto"></textarea>
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                            <label class="floating-label-activo-sm">Vejiga</label>
                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="vejiga_cisto" id="vejiga_cisto"></textarea>
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                            <label class="floating-label-activo-sm">Biópsias</label>
                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="biopsias_cisto" id="biopsias_cisto"></textarea>
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                            <label class="floating-label-activo-sm">Tratamientos</label>
                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="tratamientos_cisto" id="tratamiento_cistos"></textarea>
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-9 col-lg-9 col-xl-9">
                                                            <label class="floating-label-activo-sm">Comentarios</label>
                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="comentrarios_cisto" id="comentrarios_cisto"></textarea>
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                            <label>Biópsia</label>
                                                            <input type="hidden" id="biopsia_cisto" name="biopsia_cisto" value="0">
                                                            <div class="switch switch-success d-inline m-r-10">
                                                                <input type="checkbox" onchange="biopsia('cisto');" id="biopsia_check_cisto" name="biopsia_check_cisto" value="">
                                                                <label for="biopsia_check_cisto" class="cr"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--IMAGENES-->
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                                                            <p class="f-12 mb-0 font-weight-bold">IMAGENES</p>
                                                            <div class="dropzone" id="mis-imagenes-cisto" action="{{ route('profesional.imagen.carga') }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--DIAGNÓSTICO-->
                                    <div class="col-sm-12 col-md-12">
                                        <div class="card-a">
                                            <div class="card-header-a" id="diagn-citoscopia">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#diagn-citoscopia-c" aria-expanded="false" aria-controls="diagn-citoscopia-c">
                                                Diagnóstico
                                                </button>
                                            </div>
                                            <div id="diagn-citoscopia-c" class="collapse show" aria-labelledby="diagn-citoscopia" data-parent="#diagn-citoscopia">
                                                <div class="card-body-aten-a">
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                            <label class="floating-label-activo-sm">Diagnóstico endoscópico</label>
                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" data-input_seccion="Diagnóstico endoscópico" data-input_igual="descripcion_hipotesis" name="hip_diag_cisto" id="hip_diag_cisto"  onchange="cargarCompletar('hip_diag_cisto')"></textarea>
                                                        </div>
                                                        <div class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                            <label class="floating-label-activo-sm">Observaciones</label>
                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_cisto" id="obs_cisto"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--GUARDAR EXAMEN-->
                                <div class="row">
                                    <div class="col-md-12 text-center mb-3">
                                        <input type="submit" class="btn btn-info mt-1" onclick="agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar e ir a su Agenda">
                                        <bottom type="bottom" class="btn btn-purple mt-1" onclick="visualizar_pdf_examen('cisto');">Ver Examen PDF</bottom>
                                    </div>
                                </div>
                            </div>
                          <!--CIERRE: CISTOSCOPÍA-->



                        <!-- CISTOSCOPÍA-->
						<div class="tab-pane fade" id="cisto" role="tabpanel" aria-labelledby="cisto-tab">
								<div class="row">
									<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
										<h6 class="tit-gen">Citoscopía</h6>
									</div>
								</div>
								<div class="row div_form_examen_cisto">
                                    <input type="hidden" class="form-control" name="id_examen_especialidad_tipo_cisto" id="id_examen_especialidad_tipo_cisto" value="{{ $array_examen_especialidad_tipo['cisto'] }}">
									{!! $examen['cisto'] !!}
								</div>
                                <!--GUARDAR EXAMEN-->
                                <div class="row">
                                    <div class="col-md-12 text-center mb-3">
                                        <input type="submit" class="btn btn-success mt-1" onclick="agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar e ir a su Agenda">
                                        <bottom type="bottom" class="btn btn-success mt-1" onclick="visualizar_pdf_examen('cisto');">Ver Examen PDF</bottom>
                                    </div>
                                </div>
							</div>
						  <!--CIERRE: CISTOSCOPÍA-->


                          <!--UROFLUJO-->
                        <div class="tab-pane fade" id="uroflujo" role="tabpanel" aria-labelledby="uroflujo-tab">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                    <h6 class="f-20 text-c-blue">Uroflujometría</h6>
                                </div>
                            </div>
                            <div class="row div_form_examen_uro_flujo">
                                <input type="hidden" class="form-control" name="id_examen_especialidad_tipo_uro_flujo" id="id_examen_especialidad_tipo_uro_flujo" value="7">
                                <!-- SOLICITADO POR -->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-a">
                                            <div class="card-header-a" id="solicitado_por">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#solicitado_por_c" aria-expanded="false" aria-controls="solicitado_por_c">
                                                    Solicitado por
                                                </button>
                                            </div>
                                            <div id="solicitado_por_c" class="collapse show" aria-labelledby="solicitado_por" data-parent="#solicitado_por">
                                                <div class="card-body-aten-a">
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                            <input type="hidden" name="id_profesional_solicitado_por_uro_flujo" id="id_profesional_solicitado_por_uro_flujo" value="">
                                                            <label class="floating-label-activo-sm">RUT</label>
                                                            <input type="text" class="form-control form-control-sm" name="solicitado_por_rut_uro_flujo" id="solicitado_por_rut_uro_flujo"
                                                                onblur="cargar_profesional(this,'solicitado_por_uro_flujo', 'id_profesional_solicitado_por_uro_flujo', 'div_profesional_no_inscrito_uro_flujo', 'solicitado_por_nombre_uro_flujo', 'solicitado_por_apellido_uro_flujo', 'solicitado_por_telefono_uro_flujo', 'solicitado_por_email_uro_flujo', 'div_mensaje_uro_flujo', 'mensaje_solicitado_por_uro_flujo');"
                                                                onchange="cargar_profesional(this,'solicitado_por_uro_flujo', 'id_profesional_solicitado_por_uro_flujo', 'div_profesional_no_inscrito_uro_flujo', 'solicitado_por_nombre_uro_flujo', 'solicitado_por_apellido_uro_flujo', 'solicitado_por_telefono_uro_flujo', 'solicitado_por_email_uro_flujo', 'div_mensaje_uro_flujo', 'mensaje_solicitado_por_uro_flujo');"
                                                                onkeyup="cargar_profesional(this,'solicitado_por_uro_flujo', 'id_profesional_solicitado_por_uro_flujo', 'div_profesional_no_inscrito_uro_flujo', 'solicitado_por_nombre_uro_flujo', 'solicitado_por_apellido_uro_flujo', 'solicitado_por_telefono_uro_flujo', 'solicitado_por_email_uro_flujo', 'div_mensaje_uro_flujo', 'mensaje_solicitado_por_uro_flujo');">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                            <label class="floating-label-activo-sm">Solicitado por</label>
                                                            <input type="text" class="form-control form-control-sm" name="solicitado_por_uro_flujo" id="solicitado_por_uro_flujo">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                            <label class="floating-label-activo-sm">Hipótesis Diagnóstica</label>
                                                            <input type="text" class="form-control form-control-sm" data-input_igual="descripcion_hipotesis" name="sospecha_diagnostica_uro_flujo" id="sospecha_diagnostica_uro_flujo" onchange="cargarIgual('sospecha_diagnostica_uro_flujo')">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                            <label class="floating-label-activo-sm">Premedicación</label>
                                                            <input type="text" class="form-control form-control-sm" name="premed_uro_flujo" id="premed_uro_flujo">
                                                        </div>
                                                        <div class="form-group col-md-12" id="div_mensaje_cisto"  style="display: none;">
                                                            <span style="font-size: 10px;color: #ff0808;" id="mensaje_solicitado_por_uro_flujo"></span>
                                                        </div>
                                                    </div>
                                                    <div class="row" id="div_profesional_no_inscrito_uro_flujo" style="display: none;">
                                                        <div class="form-group col-md-3">
                                                            <label class="floating-label-activo-sm">Nombre</label>
                                                            <input type="text" class="form-control form-control-sm"  name="solicitado_por_nombre_uro_flujo" id="solicitado_por_nombre_uro_flujo" onchange="actualizar_solicitado_por('solicitado_por_uro_flujo', 'solicitado_por_nombre_uro_flujo', 'solicitado_por_apellido_uro_flujo');">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="floating-label-activo-sm">Apellido</label>
                                                            <input type="text" class="form-control form-control-sm"  name="solicitado_por_apellido_uro_flujo" id="solicitado_por_apellido_uro_flujo" onchange="actualizar_solicitado_puro_flujo', 'solicitado_por_nombre_uro_flujo', 'solicitado_por_apellido_uro_flujo');">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="floating-label-activo-sm">Telefono</label>
                                                            <input type="text" class="form-control form-control-sm"  name="solicitado_por_telefono_uro_flujo" id="solicitado_por_telefono_uro_flujo" >
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="floating-label-activo-sm">Email</label>
                                                            <input type="text" class="form-control form-control-sm"  name="solicitado_por_email_uro_flujo" id="solicitado_por_email_uro_flujo" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--INFORME URO_FLUJOMETRIA-->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-a">
                                            <div class="card-header-a" id="info-uro_flujo">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#info-uro_flujo-c" aria-expanded="false" aria-controls="info-uro_flujo-c">
                                                Informe
                                                </button>
                                            </div>
                                            <div id="info-uro_flujo-c" class="collapse show" aria-labelledby="info-uro_flujo" data-parent="#info-uro_flujo">
                                                <div class="card-body-aten-a">
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                            <label class="floating-label-activo-sm">Volumen de vaciado</label>
                                                            <input type="text" class="form-control form-control-sm" name="vol_vac_uro_flujo" id="vol_vac_uro_flujo">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                            <label class="floating-label-activo-sm">Qmax -Flujo</label>
                                                            <input type="text" class="form-control form-control-sm" name="q_flujo_uro_flujo" id="q_flujo_uro_flujo">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                            <label class="floating-label-activo-sm">Morfología de la Curva</label>
                                                            <input type="text" class="form-control form-control-sm" name="m_curva_uro_flujo" id="m_curva_uro_flujo">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                            <label class="floating-label-activo-sm">Residuo Post-Miccional</label>
                                                            <input type="text" class="form-control form-control-sm" name="residuo_uro_flujo" id="residuo_uro_flujo">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <label class="floating-label-activo-sm">Comentarios</label>
                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="comentrarios_uro_flujo" id="comentrarios_uro_flujo"></textarea>
                                                        </div>
                                                    </div>
                                                    <!--IMAGENES-->
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                                                            <p class="f-12 mb-0 font-weight-bold">IMAGENES</p>
                                                            <div class="dropzone" id="mis-imagenes-uro_flujo" action="{{ route('profesional.imagen.carga') }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!--GUARDAR EXAMEN-->
                            <div class="row">
                                <div class="col-md-12 text-center mb-3">
                                    <input type="submit" class="btn btn-info mt-1" onclick="agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar e ir a su Agenda">
                                    <bottom type="bottom" class="btn btn-purple mt-1" onclick="visualizar_pdf_examen('uro_flujo');">Ver examen PDF</bottom>
                                </div>
                            </div>
                        </div>
                        <!--CIERRE:UROFLUJO-->

						<!--UROFLUJO-->
						<div class="tab-pane fade" id="uroflujo" role="tabpanel" aria-labelledby="uroflujo-tab">
							<div class="row">
								<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <h6 class="tit-gen">Uroflujometría</h6>
                                </div>
                            </div>
                            <div class="row div_form_examen_uro_flujo">
                                <input type="hidden" class="form-control" name="id_examen_especialidad_tipo_uro_flujo" id="id_examen_especialidad_tipo_uro_flujo" value="{{ $array_examen_especialidad_tipo['uro_flujo'] }}">
                                {!! $examen['uro_flujo'] !!}
                            </div>
                            <!--GUARDAR EXAMEN-->
                            <div class="row">
                                <div class="col-md-12 text-center mb-3">
                                    <input type="submit" class="btn btn-success mt-1" onclick="agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Examen e ir a su Agenda">
                                    <bottom type="bottom" class="btn btn-success mt-1" onclick="visualizar_pdf_examen('uro_flujo');">Ver Examen PDF</bottom>
                                </div>
                            </div>
						</div>
                        <div class="tab-pane fade" id="in-ven-urologia" role="tabpanel" aria-labelledby="in-ven-urologia-tab">
                            <div class="row bg-white shadow-none rounded mx-1">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12 mt-3 mb-0">
                                            @include('general.venereas.venereas')
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
@include("general.modal.modal_no_disponible")
<!--MODALES modal_enfermedades_cronicas-->
@include('atencion_medica.formularios.modal_atencion_general.modal_enfermedades_cronicas')

<!-- MODAL DE BIOPSIA -->
@include("atencion_medica.formularios.modal_atencion_especialidad.cirugia.modal_biopsia_cirugia")
@include('atencion_medica.formularios.modal_atencion_especialidad.urologia.modal_sol_cisto')
@include('atencion_medica.formularios.modal_atencion_especialidad.urologia.indicar_estudio_urod')
@include('atencion_medica.formularios.modal_atencion_especialidad.urologia.indicar_estudio_horm')

<script type="text/javascript">
    function showContenturo() {
        element = document.getElementById("contentTto_uro");
        check = document.getElementById("tto_uro");
        if (check.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }


    function showContentProc_uro() {
        element = document.getElementById("contentProc_uro");
        check = document.getElementById("pr_uro");
        if (check.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }
	/** MENSAJE*/
		/** CARGAR mensaje */
		$('#mensaje_ficha').html(' Solo el campo dignóstico es Obligatorio el resto es  opcional');
		$('#mensaje_ficha').show();
		setTimeout(function(){
			$('#mensaje_ficha').hide();
		}, 5000);
</script>
@section('page-script-ficha-atencion')
    <script>
        $(document).ready(function() {

            /* formatear rut */
            $("#solicitado_por_rut_rfl").rut({
                formatOn: 'keyup',
                minimumLength: 2,
                validateOn: 'change',
                useThousandsSeparator : false
            });

            $('#descripcion_hipotesis').keyup(function(){
                if($.trim(this.value) != '')
                {
                   if( lic_token != '' && lic_estado == 1)
                    {
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

                }
                else
                {
                    $('.btn_agregar_medicamento').attr('disabled','disabled');
                    $('.btn_medicamento_pdf').attr('disabled','disabled');
                    $('.btn_agregar_examen').attr('disabled','disabled');
                    $('.btn_examenes_pdf').attr('disabled','disabled');
                }
            });

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

            /** cronico */
            /** autocomplete de medicamentos generales */
            $("#nombre_medicamentocron").autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('dental.getArticulo') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function(data) {
                            console.log(data.length);
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    $('#nombre_medicamentocron').val(ui.item.label);
                    $('#id_medicamento_cronico').val(ui.item.value);
                    getDosis_cronico(ui.item.value, 'dosis_cronicomes');
                    return false;
                }
            });

            /** autocomplete de medicamentos patologia */
            $("#nombre_medicamentocron_patologia").autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('dental.getArticulo') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function(data) {
                            console.log(data.length);
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    $('#nombre_medicamentocron_patologia').val(ui.item.label);
                    $('#id_medicamentocron_patologia').val(ui.item.value);
                    getDosis_cronico(ui.item.value, 'dosis_medicamentocron_patologia');
                    return false;
                }
            });

            /** accion check confidencial */
            $('#confidencial').change(function() {
                if ($('#confidencial').is(':checked')) {
                    $('#confidencial_descripcion').show();
                } else {
                    $('#confidencial_descripcion').hide();
                }
            });

            /** accion check ges */
            $('#modal_ges').change(function() {
                if ($('#modal_ges').is(':checked')) {
                    $('#form_ges').modal('show');
                } else {
                    $('#form_ges').modal('hide');
                }
            });

            /** busqueda de diagnostico GES */
            $("#nombre_ges").autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('ges.ver') }}",
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
                    $('#nombre_ges').val(ui.item.label); // display the selected text
                    $('#id_ges').val(ui.item.value); // save selected id to input
                    return false;
                }
            });

            $('#tratamiento_check').change(function(){
                if($('#tratamiento_check').is(':checked')){
                    $('#tratamiento').val(1);
                }
                else
                {
                    $('#tratamiento').val(0);
                }
            });
            $('#lentes_check').change(function(){
                if($('#lentes_check').is(':checked')){
                    $('#lentes').val(1);
                }
                else
                {
                    $('#lentes').val(0);
                }
            });
            $('#procedimiento_check').change(function(){
                if($('#procedimiento_check').is(':checked')){
                    $('#procedimiento').val(1);
                    $('#modal_procedimiento').modal('show');
                }
                else
                {
                    $('#procedimiento').val(0);
                }
            });
            $('#cirugia_check').change(function(){
                if($('#cirugia_check').is(':checked')){
                    $('#cirugia').val(1);
                }
                else
                {
                    $('#cirugia').val(0);
                }
            });

        })

        /** REGISTO ANTECEDENTES */
        function carga_campos_antecedente_nuevo()
        {
            if($('#tipo_antecedente').val()!='')
            {
                $('#div_campos_antecedente_nuevo').html('');
                var html = '';
                if($('#tipo_antecedente').val() == 'alergia')
                {
                    html +='';

                    html += '<div class="form-row">';
                    html += '    <div class="form-group col-sm-6 col-md-6">';
                    html += '        <label class="floating-label-activo-sm">Seleccione</label>';
                    html += '        <input type="text" id="alergia_paciente" name="alergia_paciente" class="form-control form-control-sm"  value="">';
                    html += '        <input type="hidden" name="id_alergia_paciente" id="id_alergia_paciente" value=""/>';
                    html += '    </div>';
                    html += '    <div class="form-group col-sm-6 col-md-6">';
                    html += '        <label class="floating-label-activo-sm">Detalle</label>';
                    html += '        <input type="text" name="alergia_comentario_paciente" id="alergia_comentario_paciente"  class="form-control form-control-sm"  value="">';
                    html += '    </div>';
                    html += '    <div class="form-group col-sm-6 col-md-6">';
                    html += '       <button type="button" class="btn btn-success btn-sm" onclick="agregar_alergia_paciente();">Guardar</button>';
                    html += '    </div>';
                    html += '</div>';

                    $('#div_campos_antecedente_nuevo').show();
                    $('#div_campos_antecedente_nuevo').html(html);

                     /** autocompletado de alergias */
                    $("#alergia_paciente").autocomplete({
                        source: function(request, response) {
                            // Fetch data
                            $.ajax({
                                url: "{{ route('alergias.ver_autocomplete') }}",
                                type: 'get',
                                dataType: "json",
                                data: {
                                    search: request.term
                                },
                                success: function(data) {
                                    console.log(data);
                                    response(data);
                                }
                            });
                        },
                        select: function(event, ui) {
                            // Set selection
                            $('#alergia_paciente').val(ui.item.label); // display the selected text
                            $('#id_alergia_paciente').val(ui.item.value); // save selected id to input

                            return false;
                        }
                    });

                }
                if($('#tipo_antecedente').val() == 'enfermedades_cronicas')
                {
                    html +='';
                }
                if($('#tipo_antecedente').val() == 'anestesias')
                {
                    html +='';
                }
                if($('#tipo_antecedente').val() == 'cirugia')
                {
                    html +='';
                }
            }
            else
            {
                $('#div_campos_antecedente_nuevo').hide();
                $('#div_campos_antecedente_nuevo').html('');
            }
        }

        function agregar_alergia_paciente() {

            let alergia = $('#alergia_paciente').val();
            let id_alergia = $('#id_alergia_paciente').val();
            let comentario = $('#alergia_comentario_paciente').val();
            let paciente = $('#id_paciente_fc').val();
            let token = CSRF_TOKEN;
            var mensaje = '';
            var valido = 0;

            if(alergia=="")
            {
                mensaje +='Campo requerido alergia\n';
                valido = 1;
            }
            // if(id_alergia=="")
            // {
            //     mensaje +='Campo requerido id alergia\n';
            //     valido = 1;
            // }
            if(comentario=="")
            {
                mensaje +='Campo requerido Detalle\n';
                valido = 1;
            }
            if(paciente=="")
            {
                mensaje +='Campo requerido paciente\n';
                valido = 1;
            }

            if(valido == 0)
            {
                swal({
                    title: "Alergia agregada correctamente. ***PENDIDENTE POR HACER***",
                    icon: "success",
                    buttons: "Aceptar",
                    DangerMode: true,
                });
            }
            else
            {
                swal({
                    title: "Campo Requerido en registro de Alergia. ***PENDIDENTE POR HACER***",
                    text: mensaje,
                    icon: "error",
                    buttons: "Aceptar",
                    DangerMode: true,
                });
            }


            // let url = "{{ route('profesional.agregar_alergia_paciente') }}";

            // $.ajax({
            //     url: url,
            //     type: 'POST',
            //     dataType: 'json',
            //     data: {
            //         _token: CSRF_TOKEN,
            //         alergia: alergia,
            //         id_alergia: id_alergia,
            //         comentario: comentario,
            //         paciente: paciente
            //     },
            // })
            // .done(function(response) {

            //     if (response.success) {
            //         swal({
            //             title: "Alergia agregada correctamente",
            //             icon: "success",
            //             buttons: "Aceptar",
            //             DangerMode: true,
            //         });

            //         $('#alergia_paciente').val('');
            //         $('#id_alergia_paciente').val('');

            //     }
            //     else
            //     {
            //         swal({
            //             title: "Error al agregar alergia",
            //             icon: "error",
            //             buttons: "Aceptar",
            //             DangerMode: true,
            //         })
            //     }

            //     return response;
            // })
            // .fail(function() {
            //     console.log("error");
            // });

        }
        /** FIN REGISTRO ANTECEDENTES  */


        function cargarIgual(input)
        {

            let actual = $('#'+input);
            let equivalentes = $('#'+input).attr('data-input_igual').split(',');
            $.each(equivalentes, function( index, value ) {
                var equivalente = $('#'+value);
                equivalente.val(actual.val());
            });

            // let actual = $('#'+input);
            // let equivalente = $('#'+$('#'+input).attr('data-input_igual'));

            // equivalente.val(actual.val());

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

        function cargar_profesional(rut, input_nombre, input_id, div_solicitar)
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
                            $('#'+input_nombre).val(nombre);
                            $('#'+input_id).val(id);
                            $('#'+div_solicitar).hide();
                            mensaje = '';
                            $('#div_mensaje').hide();
                            $('#mensaje_solicitado_por').html(mensaje);
                            $('#solicitado_por_nombre_rfl').val('');
                            $('#solicitado_por_apellido_rfl').val('');
                            $('#solicitado_por_telefono_rfl').val('');
                            $('#solicitado_por_email_rfl').val('');
                        }
                        else
                        {
                            mensaje = 'Profesional no encontrato, debe ingresar datos.';
                            $('#'+input_nombre).val('');
                            $('#'+input_id).val('');
                            $('#'+div_solicitar).show();
                            $('#div_mensaje').show();
                            $('#mensaje_solicitado_por').html(mensaje);
                            $('#solicitado_por_nombre_rfl').val('');
                            $('#solicitado_por_apellido_rfl').val('');
                            $('#solicitado_por_telefono_rfl').val('');
                            $('#solicitado_por_email_rfl').val('');
                            // $('#'+input_nombre).attr('readonly', true);
                        }
                    }
                    else
                    {
                        mensaje = 'Se presento un problema en la busqueda intente nuevamente';
                        $('#div_mensaje').show();
                        $('#mensaje_solicitado_por').html(mensaje);
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

        /** CRONICO */
        function getDosis_cronico(id_medicamento, div_dosis) {

            console.log(id_medicamento);

            let url = "{{ route('dental.getDosis') }}";
            $.ajax({

                    url: url,
                    type: "get",
                    data: {

                        id_medicamento: id_medicamento,

                    },
                })
                .done(function(data) {
                    console.log(data)

                    if (data != null) {

                        data = JSON.parse(data);
                        console.log(data)
                        let dosis = $('#'+div_dosis);

                        dosis.find('option').remove();
                        dosis.append('<option value="0">Seleccione</option>');
                        $(data).each(function(i, v) { // indice, valor
                            dosis.append('<option value="' + v.dosis + '" data-id="'+v.id+'" data-cant_comp="'+v.cant_comp+'">' + v.present +
                                '</option>');
                        })

                    } else {



                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

        };

        function getCantCompCronica(div_dosis, div_comp) {

            var cant_comp = $('#'+div_dosis+' option:selected').attr('data-cant_comp');
            console.log(cant_comp);

            let url = "{{ route('presentacion.getCantComp') }}";
            $.ajax({

                    url: url,
                    type: "get",
                    data: {

                        cant_comp: cant_comp,

                    },
                })
                .done(function(data) {
                    console.log(data)

                    if (data != null) {

                        data = JSON.parse(data);
                        console.log(data)
                        let select_cant_comp = $('#'+div_comp);

                        select_cant_comp.find('option').remove();
                        select_cant_comp.append('<option value="0">Seleccione</option>');
                        $(data).each(function(i, v) { // indice, valor
                            select_cant_comp.append('<option value="' + v.id + '">' + v.cant +'</option>');
                        })
                        select_cant_comp.append('<option value="999">Otra Cantidad</option>');

                    } else {



                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

        };

        function es_cronico() {
            if ($('#enf_cronico').prop('checked')) {
                $('#form_enfermedad_cronica').modal('show');
                $('#hipertension_div').hide();
                $('#control_peso_div').hide();
                $('#diabetes_div').hide();

                $('#cronicos').val('n_C');
                ver_medicamento_cronico();
                $('.medicamento_cronico_div').show();
                $('#senal_med_cronico').removeClass('fa-angle-down');
                $('#senal_med_cronico').addClass('fa-angle-up');

                cambiar_enfermedad_cronica();

            }

        }

        function cambiar_enfermedad_cronica() {

            if($('#cronicos').val() != 'n_C')
            {
                var nombre_enfermedad = $("#cronicos option:selected").text();
                $('#titulo_med_patologia').html( ('Medicamentos '+nombre_enfermedad).toUpperCase());
                $('.medicamento_patologia').show();
                $('#btn_registro_med_patologia').attr('onclick','agregar_medicamento_cronico_patologia(\''+$('#cronicos').val()+'\')');
                ver_medicamento_cronico_patologia();

                $('.medicamento_cronico_div').hide();
                $('#senal_med_cronico').addClass('fa-angle-down');
                $('#senal_med_cronico').removeClass('fa-angle-up');

                switch ($('#cronicos').val()) {
                    case 'cpeso':
                        $('#hipertension_div').hide();
                        $('#control_peso_div').show();
                        $('#diabetes_div').hide();
                        $('#cinsufren').hide();
                        $('#cmtumorales').hide();
                        $('#creumato').hide();
                        $('#clitemia').hide();
                    break;
                    case 'chipertension':
                        $('#hipertension_div').show();
                        $('#control_peso_div').hide();
                        $('#diabetes_div').hide();
                        $('#cinsufren').hide();
                        $('#cmtumorales').hide();
                        $('#creumato').hide();
                        $('#clitemia').hide();
                        ver_control_hipertension();

                    break;
                    case 'cdiabet':
                        $('#hipertension_div').hide();
                        $('#control_peso_div').hide();
                        $('#diabetes_div').show();
                        $('#cinsufren').hide();
                        $('#cmtumorales').hide();
                        $('#creumato').hide();
                        $('#clitemia').hide();
                    break;

                    case 'cinsufren':
                        $('#hipertension_div').hide();
                        $('#control_peso_div').hide();
                        $('#diabetes_div').hide();
                        $('#cinsufren').show();
                        $('#cmtumorales').hide();
                        $('#creumato').hide();
                        $('#clitemia').hide();
                    break;
                    case 'cmtumorales':
                        $('#hipertension_div').hide();
                        $('#control_peso_div').hide();
                        $('#diabetes_div').hide();
                        $('#cinsufren').hide();
                        $('#cmtumorales').show();
                        $('#creumato').hide();
                        $('#clitemia').hide();
                    break;
                    case 'creumato':
                        $('#hipertension_div').hide();
                        $('#control_peso_div').hide();
                        $('#diabetes_div').hide();
                        $('#cinsufren').hide();
                        $('#cmtumorales').hide();
                        $('#creumato').show();
                        $('#clitemia').hide();
                    break;
                    case 'clitemia':
                        $('#hipertension_div').hide();
                        $('#control_peso_div').hide();
                        $('#diabetes_div').hide();
                        $('#cinsufren').hide();
                        $('#cmtumorales').hide();
                        $('#creumato').hide();
                        $('#clitemia').show();
                    break;

                    default:
                        break;
                }
            }
            else
            {
                $('.medicamento_patologia').hide();
                $('#hipertension_div').hide();
                $('#control_peso_div').hide();
                $('#diabetes_div').hide();

                $('#titulo_med_patologia').html( 'Medicamentos' );
            }
        }

        function registrar_control_obesidad() {

            let peso = $('#registro_peso').val();
            let variacion = $('#registro_peso_variacion').val();
            let ideal = $('#registro_peso_ideal').val();
            let url = "{{ route('ficha_medica.registrar_control_obesidad') }}";
            let hora_medica = $('#hora_medica').val();
            var validar = 0;
            var mensaje ='';

            if( peso == '' )
            {
                $('#registro_peso').focus();
                mensaje += 'Debe ingresar el Peso del Control Actual.\n';
                validar = 1;
            }
            if( variacion == '' )
            {
                $('#registro_peso_variacion').focus();
                mensaje += 'Debe ingresar la Variación.\n';
                validar = 1;
            }
            if( ideal == '' )
            {
                $('#registro_peso_ideal').focus();
                mensaje += 'Debe ingresar el Peso Ideal.\n';
                validar = 1;
            }

            if(validar == 1)
            {
                swal({
                    title: "Debe ingresar todos los datos requeridos." ,
                    text: mensaje,
                    icon: "error",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                })
                return false;
            }
            else
            {
                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        peso: peso,
                        variacion: variacion,
                        ideal: ideal,
                        hora_medica: hora_medica
                    },
                })
                .done(function(response) {

                    if (response != '') {
                        console.log(response);
                        //$('#form_control_obesidad').trigger("reset");
                        $('#mensaje').text('Se ha agregago control de obesidad correctamente');
                        $('#mensaje').show();
                        {{--  $('#form_enfermedad_cronica').modal('hide');  --}}
                        {{--  location.reload();  --}}
                        $('#registro_peso').val('');
                        $('#registro_peso_variacion').val('');
                        $('#registro_peso_ideal').val('');
                        ver_control_obesidad();
                    }
                })
                .fail(function(e) {
                    console.log("error");
                    console.log(e);
                })
            }
        };

        function registrar_hipertension() {

            let sistolica = $('#presion_sistolica_hipertension').val();
            let diastolica = $('#presion_diastolica_hipertension').val();
            let ideal = $('#ideal_hipertension').val();
            let url = "{{ route('ficha_medica.registrar_hipertension') }}";
            let hora_medica = $('#hora_medica').val();
            let id_lugar_atencion = $('#id_lugar_atencion').val();

            var validar = 0;
            var mensaje ='';

            if( sistolica == '' )
            {
                $('#presion_sistolica_hipertension').focus();
                mensaje += 'Debe ingresar el Presión Sistólica.\n';
                validar = 1;
            }
            if( diastolica == '' )
            {
                $('#presion_diastolica_hipertension').focus();
                mensaje += 'Debe ingresar el Presión Diastólica.\n';
                validar = 1;
            }
            if( ideal == '' )
            {
                $('#ideal_hipertension').focus();
                mensaje += 'Debe ingresar el Presión Ideal.\n';
                validar = 1;
            }

            if(validar == 1)
            {
                swal({
                    title: "Debe ingresar todos los datos requeridos." ,
                    text: mensaje,
                    icon: "error",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                })
                return false;
            }
            else
            {
                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        sistolica: sistolica,
                        diastolica: diastolica,
                        ideal: ideal,
                        hora_medica: hora_medica,
                        id_lugar_atencion: id_lugar_atencion
                    },
                })
                .done(function(response) {

                    if (response != '') {
                        console.log(response);
                        //$('#form_control_obesidad').trigger("reset");
                        $('#mensaje').text('Se ha agregado control de Presión Arterial correctamente');
                        $('#mensaje').show();
                        {{--  $('#form_enfermedad_cronica').modal('hide');  --}}
                        $('#presion_sistolica_hipertension').val('');
                        $('#presion_diastolica_hipertension').val('');
                        $('#ideal_hipertension').val('');
                        ver_control_hipertension();

                    }
                })
                .fail(function(e) {
                    console.log("error");
                    console.log(e);
                })
            }
        };

        function registrar_diabetes() {

            let peso = $('#peso_diabetes').val();
            let pies = $('#pies_diabetes').val();
            let hgac1 = $('#hga1c_diabetes').val();
            let colesterol = $('#colesterol_diabetes').val();
            let creatina = $('#creatina_diabetes').val();
            let glicosilada_postprandial = $('#glicosilada_postprandial_diabetes').val();
            let glicosinada_ayuno = $('#glicosilada_ayuno_diabetes').val();
            let url = "{{ route('ficha_medica.registrar_diabetes') }}";
            let hora_medica = $('#hora_medica').val();

            $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        peso: peso,
                        pies: pies,
                        hgac1: hgac1,
                        colesterol: colesterol,
                        creatina: creatina,
                        glicosilada_postprandial: glicosilada_postprandial,
                        glicosinada_ayuno: glicosinada_ayuno,
                        hora_medica: hora_medica
                    },
                })
                .done(function(response) {

                    if (response != '') {
                        console.log(response);
                        //$('#form_control_obesidad').trigger("reset");
                        $('#mensaje').text('Se ha agregago control de diabetes correctamente');
                        $('#mensaje').show();
                        $('#form_enfermedad_cronica').modal('hide');
                        location.reload();
                    }
                })
                .fail(function(e) {
                    console.log("error");
                    console.log(e);
                })
        };

        function agregar_medicamento_cronico()
        {

            let url = "{{ route('medicamento_cronico.registrar') }}";


            var _token = CSRF_TOKEN;
            var id_profesional = $('#id_profesional_fc').val();
            var id_ficha_atencion = $('#id_fc').val();
            var id_paciente = $('#id_paciente_fc').val();
            var nombre_medicamento = $('#nombre_medicamentocron').val();
            var id_medicamento = $('#id_medicamentocron').val();
            var cantidad = $('#med_cronicomes option:selected').text()
            var tipo_enfermedad = 'cronico';

            $.ajax({

                url: url,
                type: "POST",
                data: {
                    _token: _token,
                    id_profesional:id_profesional,
                    id_ficha_atencion:id_ficha_atencion,
                    id_paciente:id_paciente,
                    nombre_medicamento:nombre_medicamento,
                    id_medicamento:id_medicamento,
                    cantidad:cantidad,
                    tipo_enfermedad:tipo_enfermedad,
                },
            })
            .done(function(data)
            {

                if (data !== 'null')
                {
                    //data = JSON.parse(data);
                    console.log('-----------------------');
                    console.log(data);
                    console.log('-----------------------');
                    if(data.estado == 1)
                    {
                        swal({
                            title: "Medicamento Cronico.",
                            text: "Medicamento Registrado con exito.",
                            icon: "success",
                            // buttons: "Aceptar",
                            //SuccessMode: true,
                        });
                        $('#nombre_medicamentocron').val('');

                        $('#dosis_cronicomes').html('<option value="0">Seleccione</option>');
                        $('#med_cronicomes').html('<option value="0">Seleccione</option>');

                        ver_medicamento_cronico();


                    }
                    else{

                        swal({
                            title: "Problema al Registrar Medicamento Cronico.",
                            icon: "warning",
                            // buttons: "Aceptar",
                            //SuccessMode: true,
                        })
                    }
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }

        function ver_medicamento_cronico()
        {

            let url = "{{ route('medicamento_cronico.getRegsitros') }}";


            var _token = CSRF_TOKEN;
            var id_ficha_atencion = $('#id_fc').val();
            var id_paciente = $('#id_paciente_fc').val();

            $.ajax({

                url: url,
                type: "GET",
                data: {
                    _token: _token,
                    // id_ficha_atencion:id_ficha_atencion,
                    id_paciente:id_paciente,
                    tipo_enfermedad:'cronico'
                },
            })
            .done(function(data)
            {

                if (data !== 'null')
                {
                    //data = JSON.parse(data);
                    console.log('-----------------------');
                    console.log(data);
                    console.log('-----------------------');
                    var html = '';
                    html += '<thead>';
                    html += '    <tr>';
                    html += '        <th class="text-center align-middle">Nombre Medicamento</th>';
                    html += '        <th class="text-center align-middle">Cantidad Mensual</th>';
                    html += '        <th class="text-center align-middle">Acción</th>';
                    html += '        <th class="text-center align-middle">Check</th>';
                    html += '    </tr>';
                    html += '</thead>';
                    html += '<tbody>';
                    if(data.estado == 1)
                    {

                        $.each(data.registros, function(index, value)
                        {
                            html += '<tr>';
                            html += '    <td class="align-left align-middle">'+value.nombre_medicamento+'</td>';
                            html += '    <td class="text-center align-middle">'+value.cantidad+'</td>';
                            html += '    <td class="text-center align-middle">';
                            html += '        <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_med_cronico(\''+value.id+'\');"><i class="feather icon-x"></i></button>';
                            html += '    </td>';
                            html += '    <td class="text-center align-middle">';
                            html += '        <input type="checkbox" name="medicamento_cronico_general" id="medicamento_cronico_general_'+value.id+'">';
                            html += '    </td>';
                            html += '</tr>';
                        });

                    }
                    else
                    {

                        html += '<tr>';
                        html += '    <td class="text-center align-middle" colspan="3">SIN REGISTROS</td>';
                        html += '</tr>';

                    }
                    html += '</tbody>';
                    $('#tabla_medicamento_cronico').html(html);
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        }

        function eliminar_med_cronico(id)
        {
            let url = "{{ route('medicamento_cronico.deleteRegsitro') }}";


            var _token = CSRF_TOKEN;
            var id =id;

            $.ajax({

                url: url,
                type: "POST",
                data: {
                    _token: _token,
                    id:id
                },
            })
            .done(function(data)
            {

                if (data !== 'null')
                {
                    //data = JSON.parse(data);
                    console.log('-----------------------');
                    console.log(data);
                    console.log('-----------------------');
                    if(data.estado == 1)
                    {
                        swal({
                            title: "Medicamento Cronico.",
                            text: "Medicamento Eliminado.",
                            icon: "success",
                            // buttons: "Aceptar",
                            //SuccessMode: true,
                        });
                        ver_medicamento_cronico();
                    }
                    else{

                        swal({
                            title: "Problema al Eliminar Registro de Medicamento Cronico.",
                            icon: "warning",
                            // buttons: "Aceptar",
                            //SuccessMode: true,
                        })
                    }
                }
                else{

                    swal({
                        title: "Problema al Eliminar Registro de Medicamento Cronico.",
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

        {{--  MEDICAMENTOS CRONICOS PATOLOGIA  --}}
        function agregar_medicamento_cronico_patologia(tipo)
        {

            let url = "{{ route('medicamento_cronico.registrar') }}";


            var _token = CSRF_TOKEN;
            var id_profesional = $('#id_profesional_fc').val();
            var id_ficha_atencion = $('#id_fc').val();
            var id_paciente = $('#id_paciente_fc').val();
            var nombre_medicamento = $('#nombre_medicamentocron_patologia').val();
            var cantidad = $('#med_cronicomes_patologia option:selected').text();
            var tipo_enfermedad = tipo;

            $.ajax({

                url: url,
                type: "POST",
                data: {
                    _token: _token,
                    id_profesional:id_profesional,
                    id_ficha_atencion:id_ficha_atencion,
                    id_paciente:id_paciente,
                    nombre_medicamento:nombre_medicamento,
                    cantidad:cantidad,
                    tipo_enfermedad:tipo_enfermedad,
                },
            })
            .done(function(data)
            {

                if (data !== 'null')
                {
                    //data = JSON.parse(data);
                    console.log('-----------------------');
                    console.log(data);
                    console.log('-----------------------');
                    if(data.estado == 1)
                    {
                        swal({
                            title: "Medicamento Cronico.",
                            text: "Medicamento Registrado con exito.",
                            icon: "success",
                            // buttons: "Aceptar",
                            //SuccessMode: true,
                        });
                        $('#nombre_medicamentocron_patologia').val('');
                        $('#id_medicamentocron_patologia').val('');

                        $('#dosis_medicamentocron_patologia').html('<option value="0">Seleccione</option>');
                        $('#med_cronicomes_patologia').html('<option value="0">Seleccione</option>');

                        ver_medicamento_cronico_patologia()
                    }
                    else{

                        swal({
                            title: "Problema al Registrar Medicamento Cronico.",
                            icon: "warning",
                            // buttons: "Aceptar",
                            //SuccessMode: true,
                        })
                    }
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }

        function ver_medicamento_cronico_patologia()
        {

            let url = "{{ route('medicamento_cronico.getRegsitros') }}";


            var _token = CSRF_TOKEN;
            var id_ficha_atencion = $('#id_fc').val();
            var id_paciente = $('#id_paciente_fc').val();
            var tipo_enfermedad = $('#cronicos').val();
            $('#tabla_med_patologia').html('');

            $.ajax({

                url: url,
                type: "GET",
                data: {
                    _token: _token,
                    // id_ficha_atencion:id_ficha_atencion,
                    id_paciente:id_paciente,
                    tipo_enfermedad:tipo_enfermedad
                },
            })
            .done(function(data)
            {

                if (data !== 'null')
                {
                    //data = JSON.parse(data);
                    console.log('-----------------------');
                    console.log(data);
                    console.log('-----------------------');
                    var html = '';
                    html += '<thead>';
                    html += '    <tr>';
                    html += '        <th class="text-center align-middle">Nombre Medicamento</th>';
                    html += '        <th class="text-center align-middle">Cantidad Mensual</th>';
                    html += '        <th class="text-center align-middle">Acción</th>';
                    html += '        <th class="text-center align-middle">Check</th>';
                    html += '    </tr>';
                    html += '</thead>';
                    html += '<tbody>';
                    if(data.estado == 1)
                    {

                        $.each(data.registros, function(index, value)
                        {
                            html += '<tr>';
                            html += '    <td class="align-left align-middle">'+value.nombre_medicamento+'</td>';
                            html += '    <td class="text-center align-middle">'+value.cantidad+'</td>';
                            html += '    <td class="text-center align-middle">';
                            html += '        <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_med_cronico_patologia(\''+value.id+'\');"><i class="feather icon-x"></i></button>';
                            html += '    </td>';
                            html += '    <td class="text-center align-middle">';
                            html += '        <input type="checkbox" name="medicamento_cronico_patologia" id="medicamento_cronico_patologia_'+value.id+'">';
                            html += '    </td>';
                            html += '</tr>';
                        });

                    }
                    else
                    {

                        html += '<tr>';
                        html += '    <td class="text-center align-middle" colspan="4">SIN REGISTROS</td>';
                        html += '</tr>';

                    }
                    html += '</tbody>';
                    $('#tabla_med_patologia').html(html);
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        }

        function eliminar_med_cronico_patologia(id)
        {
            let url = "{{ route('medicamento_cronico.deleteRegsitro') }}";


            var _token = CSRF_TOKEN;
            var id =id;
            var tipo_enfermedad = $('#cronicos').val();

            $.ajax({

                url: url,
                type: "POST",
                data: {
                    _token: _token,
                    id:id
                },
            })
            .done(function(data)
            {

                if (data !== 'null')
                {
                    //data = JSON.parse(data);
                    console.log('-----------------------');
                    console.log(data);
                    console.log('-----------------------');
                    if(data.estado == 1)
                    {
                        swal({
                            title: "Medicamento Cronico.",
                            text: "Medicamento Eliminado.",
                            icon: "success",
                            // buttons: "Aceptar",
                            //SuccessMode: true,
                        });
                        ver_medicamento_cronico_patologia(tipo_enfermedad);
                    }
                    else{

                        swal({
                            title: "Problema al Eliminar Registro de Medicamento Cronico.",
                            icon: "warning",
                            // buttons: "Aceptar",
                            //SuccessMode: true,
                        })
                    }
                }
                else{

                    swal({
                        title: "Problema al Eliminar Registro de Medicamento Cronico.",
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


        {{--  mostrar div   --}}
        function mostrar_div(div)
        {
            if ($('.'+div).is(':visible')) {
                $('.'+div).hide();
                $('#senal_med_cronico').addClass('fa-angle-down');
                $('#senal_med_cronico').removeClass('fa-angle-up');
            } else {
                $('.'+div).show();
                $('#senal_med_cronico').removeClass('fa-angle-down');
                $('#senal_med_cronico').addClass('fa-angle-up');
            }
        }


        {{--  CRONICO VER CONTROL DE HIPERTENSION  --}}
        function ver_control_hipertension()
        {

            let url = "{{ route('hipertension.getHipertension') }}";


            var _token = CSRF_TOKEN;
            var id_paciente = $('#id_paciente_fc').val();
            $('#control_hipertension').html('');

            $.ajax({

                url: url,
                type: "GET",
                data: {
                    _token: _token,
                    id_paciente:id_paciente
                },
            })
            .done(function(data)
            {

                if (data !== 'null')
                {
                    //data = JSON.parse(data);
                    console.log('----------ver_control_hipertension-------------');
                    console.log(data);
                    console.log('-----------------------');
                    var html = '';
                    html += '<thead>';
                    html += '    <tr>';
                    html += '         <th class="text-center align-middle">Nº Control</th>';
                    html += '         <th class="text-center align-middle">Fecha</th>';
                    html += '         <th class="text-center align-middle">Presión Sistólica</th>';
                    html += '         <th class="text-center align-middle">Presión Diastólica</th>';
                    html += '         <th class="text-center align-middle">Presión Ideal</th>';
                    html += '    </tr>';
                    html += '</thead>';
                    html += '<tbody>';
                    if(data.estado == 1)
                    {

                        $.each(data.registros, function(index, value)
                        {
                            var f_temp = (value.created_at).replace('T',' ').replace('Z','').replace('.000000','');
                            var fecha = new Date(f_temp);
                            fecha = fecha.getDate()+'-'+(fecha.getMonth()+1)+'-'+fecha.getFullYear()+' '+fecha.getHours()+':'+fecha.getMinutes();

                            html += '<tr>';
                            html += '    <td class="text-center align-middle">'+value.id+'</td>';
                            html += '    <td class="text-center align-middle">'+fecha+'</td>';
                            html += '    <td class="text-center align-middle">'+value.sistolica+'</td>';
                            html += '    <td class="text-center align-middle">'+value.diastolica+'</td>';
                            html += '    <td class="text-center align-middle">'+value.ideal+'</td>';
                            html += '</tr>';
                        });

                    }
                    else
                    {

                        html += '<tr>';
                        html += '    <td class="text-center align-middle" colspan="5">SIN REGISTROS</td>';
                        html += '</tr>';

                    }
                    html += '</tbody>';
                    $('#control_hipertension').html(html);
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        }

        {{--  CRONICO VER CONTROL DE OBESIDAD  --}}
        function ver_control_obesidad()
        {

            let url = "{{ route('control_obesidad.getControlObesidad') }}";


            var _token = CSRF_TOKEN;
            var id_paciente = $('#id_paciente_fc').val();
            $('#control_obesidad').html('');

            $.ajax({

                url: url,
                type: "GET",
                data: {
                    _token: _token,
                    id_paciente:id_paciente
                },
            })
            .done(function(data)
            {

                if (data !== 'null')
                {
                    //data = JSON.parse(data);
                    console.log('----------ver_control_hipertension-------------');
                    console.log(data);
                    console.log('-----------------------');
                    var html = '';
                    html += '<thead>';
                    html += '    <tr>';
                    html += '    <th class="text-center align-middle">Nº Control</th>';
                    html += '    <th class="text-center align-middle">Fecha</th>';
                    html += '    <th class="text-center align-middle">Peso</th>';
                    html += '    <th class="text-center align-middle">Variación</th>';
                    html += '    <th class="text-center align-middle">Peso Ideal</th>';
                    html += '    <!-- <th class="text-center align-middle">Acción</th>-->';
                    html += '</tr>';
                    html += '</thead>';
                    html += '<tbody>';
                    if(data.estado == 1)
                    {

                        $.each(data.registros, function(index, value)
                        {
                            var f_temp = (value.created_at).replace('T',' ').replace('Z','').replace('.000000','');
                            var fecha = new Date(f_temp);
                            fecha = fecha.getDate()+'-'+(fecha.getMonth()+1)+'-'+fecha.getFullYear();


                            html += '<tr>';
                            html += '    <td class="text-center align-middle">'+value.id+'</td>';
                            html += '    <td class="text-center align-middle">'+fecha+'</td>';
                            html += '    <td class="text-center align-middle">'+value.peso+'</td>';
                            html += '    <td class="text-center align-middle">'+value.variacion+'</td>';
                            html += '    <td class="text-center align-middle">'+value.ideal+'</td>';
                            html += '    <!--<td class="text-center align-middle"><button href="#!" class="btn btn-danger btn-sm"><i class="feather icon-x"></i> Eliminar</button></td>-->';
                            html += '</tr>';
                        });

                    }
                    else
                    {

                        html += '<tr>';
                        html += '    <td class="text-center align-middle" colspan="5">SIN REGISTROS</td>';
                        html += '</tr>';

                    }
                    html += '</tbody>';
                    $('#control_obesidad').html(html);
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        }
        /** FIN CRONICO */

    </script>
    <!--ALERTA DE ATENCION-->
    <script>
    window.setTimeout(function() {
        $(".alert-atencion").fadeTo(500, 0).slideUp(600, function(){
            $(this).remove();
        });
    }, 5000);


</script>
@endsection



