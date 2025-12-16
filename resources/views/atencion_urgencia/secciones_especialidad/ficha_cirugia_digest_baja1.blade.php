<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2">
        <div class="row mx-0">
            <div class="col-sm-12 col-md-12">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="cir_dig" role="tablist">
                    <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="atencion_cirugia_gen-tab" data-toggle="tab" href="#atencion_cirugia_gen" role="tab" aria-controls="atencion_orl" aria-selected="true">Atención Especialidad</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="colonoscopia-tab" data-toggle="tab" href="#colonoscopia" role="tab" aria-controls="colonoscopia" aria-selected="false">Endoscopía Digestiva Baja</a>
                    </li>
				</ul>
            </div>
			 <!--ALERTA-->
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
                    @csrf
                    <div class="tab-content" id="orl-contenido">
                        <!--ATENCIÓN ESPECIALIDAD GENERAL-->
                        <div class="tab-pane fade show active" id="atencion_cirugia_gen" role="tabpanel" aria-labelledby="atencion_cirugia_gen-tab">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <!--FORMULARIOS-->
                                    <div class="row">
                                        <!--Formulario / Menor de edad-->
                                        @include('general.secciones_ficha.seccion_menor')
                                        <!--Cierre: Formulario / Menor de edad-->
                                        <!--Motivo consulta-->
                                        @include('general.secciones_ficha.motivo')

                                        <!--EXAMEN ESPECIALIDAD - PARAMETROS DE CONTROL-->
                                        <div class="col-sm-12 col-md-12">
                                            <div class="card-a">
                                                <div class="card-header-a" id="exam_esp_cdb">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left has-ripple card-act-open collapsed" type="button" data-toggle="collapse" data-target="#exam_esp_cdb_c" aria-expanded="false" aria-controls="exam_esp_cdb_c">
                                                        Examen especialidad
                                                    </button>
                                                </div>
                                                <div id="exam_esp_cdb_c" class="collapse" aria-labelledby="exam_esp_cdb" data-parent="#exam_esp_cdb">
                                                    <div class="card-body-aten-a">
                                                        <div class="row">
                                                            <div class="col-md-6">
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
                                                            <div class="col-md-6">
                                                                <span id="descripcion_ficha_tipo_ex_especialidad_cdb"></span>
                                                            </div>
                                                        </div>
                                                        <div id="form-cdb">
                                                            <div class="form-row mb-2">
                                                                <div class="col-md-12">
                                                                    <h5 style="text-align:center;">Cirugía Digestiva Baja</h5>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm">Transito</label>
                                                                        <select name="transito_intest" id="transito_intest" data-titulo="Transito"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('transito_intest','div_detalle_transito_intest','obs_transito_intest',2)">
                                                                            <option value="1" selected>No</option>
                                                                            <option value="2">Si</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-12" id="div_detalle_transito_intest" style="display:none">
                                                                        <label class="floating-label-activo-sm">Obs Transito</label>
                                                                        <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Obs. Transito" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_transito_intest" id="obs_transito_intest"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm">Dolor Defecación</label>
                                                                        <select name="dolor_def" id="dolor_def" data-titulo="Dolor Defecación" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('dolor_def','div_detalle_dolor_def','obs_dolor_def',2)">
                                                                            <option value="1" selected>No</option>
                                                                            <option value="2">Si</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-12" id="div_detalle_dolor_def" style="display:none">
                                                                        <label class="floating-label-activo-sm">Dolor Defecación</label>
                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="obs. Dolor Defecación" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_dolor_def" id="obs_dolor_def"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm">Presencia de Sangre y Otros</label>
                                                                        <select name="sangre_otros" id="sangre_otros" data-titulo="Presencia de Sangre y Otros" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('sangre_otros','div_detalle_sangre_otros','obs_sangre_otros',2)">
                                                                            <option value="1" selected>No</option>
                                                                            <option value="2">Si</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-12" id="div_detalle_sangre_otros" style="display:none">
                                                                        <label class="floating-label-activo-sm">Presencia de Sangre y Otros</label>
                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="obs. Presencia de Sangre y Otros" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_sangre_otrosg" id="obs_sangre_otros"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm">Dolor</label>
                                                                        <select name="dolor_cdg" id="dolor_cdg"  data-titulo="Dolor"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('dolor_cdg','div_detalle_dolor','obs_dolor_cdg',2)">
                                                                            <option value="1" selected>No</option>
                                                                            <option value="2">Si</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-12" id="div_detalle_dolor" style="display:none">
                                                                        <label class="floating-label-activo-sm">Dolor</label>
                                                                        <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Obs. Dolor" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_dolor_cdg" id="obs_dolor_cdg"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm">Otros Síntomas</label>
                                                                        <select name="otros_sintomas_cdg" id="otros_sintomas_cdg" data-titulo="Otros Síntomas" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('otros_sintomas_cdg','div_detalle_cd_otros_sintomas','obs_otros_sintomas_cdg',2)">
                                                                            <option value="1" selected>No</option>
                                                                            <option value="2">Si</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-12" id="div_detalle_cd_otros_sintomas" style="display:none">
                                                                        <label class="floating-label-activo-sm">Otros Síntomas</label>
                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="obs. Otros Síntomas" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_otros_sintomas_cdg" id="obs_otros_sintomas_cdg"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm">Compromiso estado General</label>
                                                                        <select name="ceg_cdg" id="ceg_cdg" data-titulo="Compromiso estado General" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ceg_cdg','div_detalle_ceg_cdg','obs_ceg_cdg',2)">
                                                                            <option value="1" selected>No</option>
                                                                            <option value="2">Si</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-12" id="div_detalle_ceg_cdg" style="display:none">
                                                                        <label class="floating-label-activo-sm">Compromiso estado General</label>
                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="obs. Compromiso estado General" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_ceg_cdg" id="obs_ceg_cdg"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm">Masas Palpables</label>
                                                                        <select name="masa_cdg" id="masa_cdg" data-titulo="Masas Palpables" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('masa_cdg','div_detalle_masa_cdg','obs_masa_cdg',2);">
                                                                            <option value="1" selected>No</option>
                                                                            <option value="2">Si</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-12" id="div_detalle_masa_cdg" style="display:none">
                                                                        <label class="floating-label-activo-sm">Masas Palpables</label>
                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Masas Palpables" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_masa_cdg" id="obs_masa_cdg"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm">Es Urgencia Qx.?</label>
                                                                        <select name="urgencia_cdg" id="urgencia_cdg" data-titulo="Es Urgencia Qx" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('urgencia_cdg','div_detalle_urgencia_cdg','obs_urgencia_cdg',2);">
                                                                            <option value="1" selected>No</option>
                                                                            <option value="2">Si</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-12" id="div_detalle_urgencia_cdg" style="display:none">
                                                                        <label class="floating-label-activo-sm">Es Urgencia Qx</label>
                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Es Urgencia Qx" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_urgencia_cdg" id="obs_urgencia_cdg"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm">Sospecha de Organo</label>
                                                                        <select name="so_cdg" id="so_cdg" data-titulo="Sospecha de Organo" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('so_cdg','div_detale_sospecha__organo_cdg','obs_so_cdg',2);">
                                                                            <option value="1" selected>No</option>
                                                                            <option value="2">Si</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-12" id="div_detale_sospecha__organo_cdg" style="display:none">
                                                                        <label class="floating-label-activo-sm">Sospecha de Organo</label>
                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Sospecha de Organo" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_so_cdg" id="obs_so_cdg"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class=" col-md-12">
                                                                <div class="row">
                                                                    <label class="floating-label-activo-sm">Observaciones Estado General Paciente</label>
                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Estado General Paciente" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_egp_cdg" id="obs_egp_cdg"></textarea>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-md-9">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm">Observaciones Examen Especialidad</label>
                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Especialidad" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="obs_gen_ex_esp_cdg" id="obs_gen_ex_esp_cdg"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 align-middle" style="margin:auto">
                                                                    <button type="button" class="btn btn-outline-primary has-ripple" onclick="abrir_modal_guardar_tipo('form-cdb','registro_f_t_cg_detalle','cdg');"><i class="me-2" data-feather="thumbs-up"></i>Guardar Nueva Ficha Tipo<span class="ripple ripple-animate" style="height: 99.2656px; width: 99.2656px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255); opacity: 0.4; top: -32.5625px; left: 8.375px;"></span></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--EXAMEN ESPECIALIDAD - PARAMETROS DE CONTROL-->
                                        <div class="col-sm-12 col-md-12">
                                            <div class="card-a">
                                                <div class="card-header-a" id="exam_esp_b_cdb">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left has-ripple card-act-open collapsed" type="button" data-toggle="collapse" data-target="#exam_esp_b_cdb_c" aria-expanded="false" aria-controls="exam_esp_b_cdb_c">
                                                        Detalle Examen Especialidad
                                                    </button>
                                                </div>
                                                <div id="exam_esp_b_cdb_c" class="collapse" aria-labelledby="exam_esp_b_cdb" data-parent="#exam_esp_b_cdb">
                                                    <div class="card-body-aten-a">
                                                        <div class="row">
                                                            <div class="col-md-6">
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
                                                            <div class="col-md-6">
                                                                <span id="descripcion_ficha_tipo_ex_especialidad_cdb"></span>
                                                            </div>
                                                        </div>
                                                        <div id="form-cdb">
                                                            <div class="form-row mb-2">
                                                                <div class="col-md-12">
                                                                    <h5 style="text-align:center;">Cirugía Digestiva Baja</h5>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="form-row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group" id="div_detalle_transito_intest" >
                                                                        <label class="floating-label-activo-sm" for="cdb_ex_fisico_ab">Examen físico Abdominal</label>
                                                                        <textarea class="form-control caja-texto form-control-sm" rows="2" data-titulo="Estado General del Paciente" data-seccion="Cirugia digest baja" data-tipo="cirugia digest baja" onfocus="this.rows=3" onblur="this.rows=2;" name="cdb_ex_fisico_ab" id="cdb_ex_fisico_ab" placeholder="DOLOR, PRESENCIA DE MASAS PALPABLES,SOSPECHA ORGANO COMPROMETIDO "></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group" id="div_detalle_transito_intest" >
                                                                        <label class="floating-label-activo-sm" for="cdb_ex_tr">Examen Tránsito</label>
                                                                        <textarea class="form-control caja-texto form-control-sm" rows="2" data-titulo="Estado General del Paciente" data-seccion="Cirugia digest baja" data-tipo="cirugia digest baja" onfocus="this.rows=3" onblur="this.rows=2;" name="cdb_ex_tr" id="cdb_ex_tr" placeholder="DOLOR, PRESENCIA DE SANGRE,COMPROMISO ESTADO GENERAL OTROS"></textarea>
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
                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Estado General del Paciente" data-seccion="Cirugia digest baja" data-tipo="cirugia digest baja" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_egp_cdg" id="obs_egp_cdg"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
										<!--CIRUGIA GENERAL-->
                                        {{--  @include('general.secciones_ficha.cirugia_general.cirugia_adulto_est')  --}}
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
                                        {{--  @include('general.secciones_ficha.seccion_cronicos_ges_confidencial')  --}}
                                        <hr>
                                        <!--Diagnóstico-->
                                        @include('general.secciones_ficha.diagnostico')
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--CIERRE: ATENCIÓN ESPECIALIDAD GENERAL-->
                        <!--INFORME ENDOSCOPÍA DIGESTIVA BAJA-->
                       <div class="tab-pane fade" id="colonoscopia" role="tabpanel" aria-labelledby="colonoscopia-tab">
                           <div class="row bg-white shadow-none rounded mx-1">
                               <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                   <div class="row">
                                       <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                           <h6 class="tit-gen">Informe Colonoscopía</h6>
                                           <hr>
                                       </div>
                                   </div>
                                   <div class="row">
                                        {!! $examen['edb'] !!}
                                   </div>
                               </div>
                           </div>
                       </div>
                       <!--CIERRE:INFORME ENDOSCOPÍA DIGESTIVA BAJA-->
                    </div>
                </form>
            </div>
              {{--  div de botones  --}}
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <!--SECCION DE MEDICAMENTOS Y EXAMENES GENERALES -->
                            @include('general.secciones_ficha.seccion_receta_examen_comunes')
                            <!--SECCION DE MEDICAMENTOS Y EXAMENES GENERALES FIN  -->
                        </div>
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
            <!--CIERRE: ATENCIÓN ESPECIALIDAD GENERAL-->
        </div>
    </div>
</div>

@section('page-script-ficha-atencion')
    <script>
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
				/** MENSAJE*/
			    /** CARGAR mensaje */
				$('#mensaje_ficha').html('<strong>Solo el campo Hipótesis diagnóstica es obligatorio el resto es opcional</strong>');
				$('#mensaje_ficha').show();
				setTimeout(function(){
					$('#mensaje_ficha').hide();
				}, 5000);

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
                        //SuccessMode: true,
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
                evaluar_para_carga_detalle('transito_intest','div_detalle_transito_intest','obs_transito_intest',2);
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
                    evaluar_para_carga_detalle('transito_intest','div_detalle_transito_intest','obs_transito_intest',2)
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
                cargar_lista_imagenes(myDropzone_eda,'eda');
                if (file.previewElement != null && file.previewElement.parentNode != null) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }
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
                cargar_lista_imagenes(myDropzone_edb, 'edb');
                if (file.previewElement != null && file.previewElement.parentNode != null) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }
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
            // console.log('--------------cargar_lista_imagenes----------------------');
            lista_imagenes[alias_examen] = [];
            let temp  = obj_dropzone.getAcceptedFiles();
            $.each(temp, function( index, value )
            {
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


    </script>
@endsection


