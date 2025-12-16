<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2 shadow-none">
        <div class="row mx-0">
            <div class="col-sm-12 col-md-12">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="orl" role="tablist">
                    <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="atencion_orl-tab" data-toggle="tab" href="#atencion_orl" role="tab" aria-controls="atencion_orl" aria-selected="true">Atención Especialidad</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="fcc-tab" data-toggle="tab" href="#fcc" role="tab" aria-controls="fcc" aria-selected="false">Ficha Tradicional</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="rinofibro-tab" data-toggle="tab" href="#rinofibro" role="tab" aria-controls="rinofibro" aria-selected="false">Rinofibrolaringoscopía</a>
                    </li>
                    {{--  <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="bio-tab" data-toggle="tab" href="#bio" role="tab" aria-controls="bio" aria-selected="false">Biomicroscopía</a>
                    </li>  --}}
                </ul>
            </div>
            <div class="col-sm-12 col-md-12">
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
                        <div class="tab-pane fade show active" id="atencion_orl" role="tabpanel" aria-labelledby="atencion_orl-tab">
                            <div class="row bg-white shadow-none rounded mx-1">
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
                                        @include('atencion_medica.generales.seccion_menor')
                                        <!--Cierre: Formulario / Menor de edad-->

                                        <!--Motivo consulta-->
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header" id="motivo">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#motivo_c" aria-expanded="false" aria-controls="motivo_c">
                                                        Motivo de la consulta
                                                    </button>
                                                </div>
                                                <div id="motivo_c" class="collapse show" aria-labelledby="motivo" data-parent="#motivo">
                                                    <div class="card-body-aten shadow-none">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label class="floating-label-activo-sm">Motivo de Consulta</label>
                                                                <input type="text" class="form-control form-control-sm" data-input_igual="descripcion_consulta" name="descripcion_consulta_orl" id="descripcion_consulta_orl" onchange="cargarIgual('descripcion_consulta_orl');">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label class="floating-label-activo-sm">Antecedentes Especialidad</label>
                                                                <input type="text" class="form-control form-control-sm" name="antec_especialidad_orl" id="antec_especialidad_orl">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--EXAMEN ESPECIALIDAD - PARAMETROS DE CONTROL-->
                                        <div class="col-sm-12 col-md-12">
                                            <div class="card">
                                                <div class="card-header" id="exam_esp">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left has-ripple card-act-open collapsed" type="button" data-toggle="collapse" data-target="#exam_esp_c" aria-expanded="false" aria-controls="exam_esp_c">
                                                        Examen especialidad
                                                    </button>
                                                </div>
                                                <div id="exam_esp_c" class="collapse" aria-labelledby="exam_esp" data-parent="#exam_esp">
                                                    <div class="card-body-aten shadow-none">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group col-md-12">
                                                                    <label class="floating-label-activo-sm">Carga Ficha Tipo</label>
                                                                    <select class="form-control form-control-sm" id="select_ficha_tipo_especialidad" onchange="cargar_info_ficha_tipo_orl('select_ficha_tipo_especialidad','descripcion_ficha_tipo_especialidad');">
                                                                        <option value="">Seleccione</option>
                                                                        @if(!empty($fichaTipo))
                                                                            @foreach ($fichaTipo as $ft )
                                                                                <option value="{{ $ft->id }}" data-descripcion="{{ $ft->descripcion }}">{{ $ft->nombre }}</option>
                                                                            @endforeach
                                                                        @endif
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <span id="descripcion_ficha_tipo_especialidad"></span>
                                                            </div>
                                                        </div>
                                                        <div id="form-otorrino">
                                                            <div class="form-row mb-2">
                                                                <div class="col-md-12">
                                                                    <h6>Oídos Audición</h6>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="form-row">
                                                                <div class="col-md-3">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label-activo-sm">Usa Audífono</label>
                                                                            <select name="usa_audifono" id="usa_audifono" data-titulo="Usa Audífono" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('usa_audifono','div_detalle_usa_audifono','audifono',5)">
                                                                                <option value="0">Seleccione</option>
                                                                                <option value="1">No</option>
                                                                                <option value="2">Si OD</option>
                                                                                <option value="3">Si OI</option>
                                                                                <option value="4">Si Ambos</option>
                                                                                <option value="5">Anotar Observaciones</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12" id="div_detalle_usa_audifono" style="display:none">
                                                                            <label class="floating-label-activo-sm">Usa Audífono</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Usa Audífono" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="audifono" id="audifono"></textarea>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label-activo-sm">Apreciación Auditiva</label>
                                                                            <select name="apreciacion_auditiva" id="apreciacion_auditiva" data-titulo="Apreciación Auditiva" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('apreciacion_auditiva','div_detalle_apreciacion_auditiva','aprec_auditiva_def',2)">
                                                                                <option value="0">Seleccione</option>
                                                                                <option value="1">Aceptable</option>
                                                                                <option value="2">Deficiente</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12" id="div_detalle_apreciacion_auditiva" style="display:none">
                                                                            <label class="floating-label-activo-sm">Apreciación Auditiva</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Auditiva" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="aprec_auditiva_def" id="aprec_auditiva_def"></textarea>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label-activo-sm">Examen OI</label>
                                                                            <select name="examen_oi" id="examen_oi" data-titulo="Examen OI" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('examen_oi','div_detalle_examen_oi','ex_oi_anormal',2);">
                                                                                <option value="0">Seleccione</option>
                                                                                <option value="1">Normal</option>
                                                                                <option value="2">Anormal</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12" id="div_detalle_examen_oi" style="display:none">
                                                                            <label class="floating-label-activo-sm">Examen OI</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Examen OI" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_oi_anormal" id="ex_oi_anormal"></textarea>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label-activo-sm">Examen OD</label>
                                                                            <select name="examen_od" id="examen_od" data-titulo="Examen OD" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('examen_od','div_detalle_examen_od','ex_od_anormal',2);">
                                                                                <option value="0">Seleccione</option>
                                                                                <option value="1">Normal</option>
                                                                                <option value="2">Anormal</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12" id="div_detalle_examen_od" style="display:none">
                                                                            <label class="floating-label-activo-sm">Examen OD</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Examen OD" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_od_anormal" id="ex_od_anormal"></textarea>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div class="form-row">
                                                                <div class="form-group col-md-12">
                                                                    <label class="floating-label-activo-sm">Observaciones Examen Auditívo</label>
                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Auditívo" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_oidos" id="obs_ex_oidos"></textarea>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="form-row mb-2">
                                                                <div class="col-md-12">
                                                                    <h6>Biomicroscopía</h6>
                                                                </div>
                                                            </div>

                                                            <hr>
                                                            <div class="form-row">

                                                                <div class="form-group col-md-6">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label-activo-sm">Biomicroscopía OI</label>
                                                                            <select name="examen_bio_oi" data-titulo="Biomicroscopía OI" id="examen_bio_oi" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('examen_bio_oi','div_obs_examen_bio_oi','obs_examen_bio_oi',2);">
                                                                                <option value="0">Seleccione</option>
                                                                                <option value="1">Normal</option>
                                                                                <option value="2">Anormal</option>
                                                                                <option value="3">No Realizada</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12" id="div_obs_examen_bio_oi" style="display:none;">
                                                                            <label class="floating-label-activo-sm">Biomicroscopía OI</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Biomicroscopía OI" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_examen_bio_oi" id="obs_examen_bio_oi"></textarea>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label-activo-sm">Biomicroscopía OD</label>
                                                                            <select name="examen_bio_od" id="examen_bio_od" data-titulo="Biomicroscopía OD"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('examen_bio_od','div_obs_examen_bio_od','obs_examen_bio_od',2);">
                                                                                <option value="0">Seleccione</option>
                                                                                <option value="1">Normal</option>
                                                                                <option value="2">Anormal</option>
                                                                                <option value="3">No Realizada</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12" id="div_obs_examen_bio_od" style="display:none;">
                                                                            <label class="floating-label-activo-sm">Biomicroscopía OD</label>
                                                                            <textarea class="form-control caja-texto form-control-sm"  data-titulo="Biomicroscopía OD" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_examen_bio_od" id="obs_examen_bio_od"></textarea>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-12">
                                                                    <label class="floating-label-activo-sm">Observaciones Examen Biomicroscópico</label>
                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Biomicroscópico" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_biom" id="obs_ex_biom"></textarea>
                                                                </div>
                                                            </div>
                                                            <hr>
															<!--Vestibular-->

                                                            <div class="form-row mb-2">
                                                                <div class="col-md-12">
                                                                    <h6>Sistema Vestibular</h6>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="form-row">
                                                                <div class="col-md-3">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label-activo-sm">Tipo Vertigo</label>
                                                                            <select name="tipo_vertigo" id="tipo_vertigo" data-titulo="Tipo_vertigo" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tipo_vertigo','div_detalle_tipo_vertigo','vertigo',3)">
                                                                                <option value="0">Seleccione</option>
                                                                                <option value="1">Objetivo</option>
                                                                                <option value="2">Subjetivo</option>
                                                                                <option value="3">Otro Describir</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12" id="div_detalle_tipo_vertigo" style="display:none">
                                                                            <label class="floating-label-activo-sm">Tipo Vertigo</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Tipo_vertigo" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="vertigo" id="vertigo"></textarea>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label-activo-sm">Sintomas Acompañantes</label>
                                                                            <select name="sint_acomp" id="sint_acomp" data-titulo="Sint_acomp" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('sint_acomp','div_detalle_sintomas_acompanantes','detalle_sint_acompanantes',3)">
                                                                                <option value="0">Seleccione</option>
                                                                                <option value="1">No</option>
                                                                                <option value="2">Si</option>
                                                                                <option value="3">Otro Describir</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12" id="div_detalle_sintomas_acompanantes" style="display:none">
                                                                            <label class="floating-label-activo-sm">Sintomas Acompañantes</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Sint_acomp" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="detalle_sint_acompanantes" id="detalle_sint_acompanantes"></textarea>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label-activo-sm">Nistagmus</label>
                                                                            <select name="ng" id="ng" data-titulo="Ng" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ng','div_detalle_ng','ng_anormal',2);">
                                                                                <option value="0">Seleccione</option>
                                                                                <option value="1">No</option>
                                                                                <option value="2">Si Describir</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12" id="div_detalle_ng" style="display:none">
                                                                            <label class="floating-label-activo-sm">Nistagmus</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Ng" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ng_anormal" id="ng_anormal"></textarea>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label-activo-sm">Equilibrio</label>
                                                                            <select name="equilib" id="equilib" data-titulo="Equilibrio" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('equilibrio','div_detalle_equilibrio','equil_anormal',2);">
                                                                                <option value="0">Seleccione</option>
                                                                                <option value="1">Normal</option>
                                                                                <option value="2">Anormal</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12" id="div_detalle_equilibrio" style="display:none">
                                                                            <label class="floating-label-activo-sm">Romberg</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Equilibrio" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="equil_anormal" id="equil_anormal"></textarea>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div class="form-row">
                                                                <div class="form-group col-md-12">
                                                                    <label class="floating-label-activo-sm">Observaciones Examen Vestibular</label>
                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen equilibrio" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_equilibrio" id="obs_equilibrio"></textarea>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="form-row mb-2">
                                                                <div class="col-md-12">
                                                                    <h6>Naríz</h6>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="form-row">
                                                                <div class="col-md-3">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label-activo-sm">Aspecto General</label>
                                                                            <select name="nariz_general" id="nariz_general"  data-titulo="Aspecto General" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('nariz_general','div_detalle_nariz_gen','det_nariz_general',2)">
                                                                                <option value="0">Seleccione</option>
                                                                                <option value="1">Normal</option>
                                                                                <option value="2">Anormal</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12" id="div_detalle_nariz_gen" style="display:none">
                                                                            <label class="floating-label-activo-sm">Detalle Aspecto General</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Aspecto General"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_nariz_general" id="det_nariz_general"></textarea>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label-activo-sm">Apreciación Respiratoria</label>
                                                                            <select name="apreciacion_resp" id="apreciacion_resp" data-titulo="Apreciación Respiratoria" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('apreciacion_resp','div_detalle_nariz_resp','aprec_resp_def',2)">
                                                                                <option value="0">Seleccione</option>
                                                                                <option value="1">Aceptable</option>
                                                                                <option value="2">Deficiente</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12" id="div_detalle_nariz_resp" style="display:none">
                                                                            <label class="floating-label-activo-sm">Apreciación Respiratoria</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="aprec_resp_def" id="aprec_resp_def"></textarea>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label-activo-sm">Examen Fosa Nasal Izq.</label>
                                                                            <select name="examen_fni" id="examen_fni" data-titulo="Examen Fosa Nasal Izq." class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('examen_fni','div_detalle_examen_fni','ex_fni_anormal',2);">
                                                                                <option value="0">Seleccione</option>
                                                                                <option value="1">Normal</option>
                                                                                <option value="2">Anormal</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12" id="div_detalle_examen_fni" style="display:none">
                                                                            <label class="floating-label-activo-sm">Examen Fosa Nasal Izquierda</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Examen Fosa Nasal Izq." rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_fni_anormal" id="ex_fni_anormal"></textarea>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label-activo-sm">Examen Fosa Nasal Der.</label>
                                                                            <select name="examen_fnd" id="examen_fnd" data-titulo="Examen Fosa Nasal Der." class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('examen_fnd','div_detalle_examen_fnd','ex_fnd_anormal',2);">
                                                                                <option value="0">Seleccione</option>
                                                                                <option value="1">Normal</option>
                                                                                <option value="2">Anormal</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12" id="div_detalle_examen_fnd" style="display:none">
                                                                            <label class="floating-label-activo-sm">Examen Fosa Nasal Derecha</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Examen Fosa Nasal Der." rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_fnd_anormal" id="ex_fnd_anormal"></textarea>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div class="form-row">
                                                                <div class="form-group col-md-12">
                                                                    <label class="floating-label-activo-sm">Observaciones Examen Nasal</label>
                                                                    <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Observaciones Examen Nasal" onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_nasal" id="obs_ex_nasal"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-row mb-2">
                                                                <div class="col-md-12">
                                                                    <h6>Faringo-Laringe</h6>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="form-row">
                                                                <div class="col-md-3">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label-activo-sm">Disfonía</label>
                                                                            <select name="disfonia" id="disfonia" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('disfonia','div_disfonia','det_disfonia',2)">
                                                                                <option value="0">Seleccione</option>
                                                                                <option value="1">No</option>
                                                                                <option value="2">Sí</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12" id="div_disfonia" style="display:none">
                                                                            <label class="floating-label-activo-sm">Detalle Disfonía</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_disfonia" id="det_disfonia"></textarea>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label-activo-sm">Examen Boca</label>
                                                                            <select name="ex_boca" id="ex_boca" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ex_boca','div_detalle_ex_boca','detalle_ex_boca',2)">
                                                                                <option value="0">Seleccione</option>
                                                                                <option value="1">Normal</option>
                                                                                <option value="2">Alterado</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12" id="div_detalle_ex_boca" style="display:none">
                                                                            <label class="floating-label-activo-sm">Examen Boca</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="detalle_ex_boca" id="detalle_ex_boca"></textarea>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label-activo-sm">Examen Faríngeo</label>
                                                                            <select name="examen_faringe" id="examen_faringe" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('examen_faringe','div_detalle_examen_faringe','ex_farige_anormal',2);">
                                                                                <option value="0">Seleccione</option>
                                                                                <option value="1">Normal</option>
                                                                                <option value="2">Anormal</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12" id="div_detalle_examen_faringe" style="display:none">
                                                                            <label class="floating-label-activo-sm">Examen Faríngeo</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_farige_anormal" id="ex_farige_anormal"></textarea>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="floating-label-activo-sm">Examen Laríngeo</label>
                                                                            <select name="examen_laringe" id="examen_laringe" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('examen_laringe','div_detalle_examen_laringe','ex_larige_anormal',2);">
                                                                                <option value="0">Seleccione</option>
                                                                                <option value="1">Normal</option>
                                                                                <option value="2">Anormal</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12" id="div_detalle_examen_laringe" style="display:none">
                                                                            <label class="floating-label-activo-sm">Examen Laríngeo</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_larige_anormal" id="ex_larige_anormal"></textarea>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-9" style="margin-bottom: 0;">
                                                                    <label class="floating-label-activo-sm">Observaciones Examen Especialidad</label>
                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Especialidad" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="bs_ex_orl" id="obs_ex_orl"></textarea>
                                                                </div>
                                                                <div class="form-group col-md-3 align-middle" style="margin:auto">
                                                                    <button type="button" class="btn btn-outline-primary has-ripple" onclick="abrir_modal_guardar_tipo();"><i class="me-2" data-feather="thumbs-up"></i>Guardar Nueva Ficha Tipo<span class="ripple ripple-animate" style="height: 99.2656px; width: 99.2656px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255); opacity: 0.4; top: -32.5625px; left: 8.375px;"></span></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--Diagnóstico-->
                                        <div class="col-sm-12">
                                            <div class="card">
                                                <div class="card-header" id="diagnostico">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#diagnostico_c" aria-expanded="false" aria-controls="diagnostico_c">
                                                        Diagnóstico
                                                    </button>
                                                </div>
                                                <div id="diagnostico_c" class="collapse show" aria-labelledby="diagnostico" data-parent="#diagnostico">
                                                    <div class="card-body-aten shadow-none">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-4">
                                                                <label class="floating-label-activo-sm">Hipótesis diagnóstica</label>
                                                                <input type="text" class="form-control form-control-sm"  data-input_igual="descripcion_hipotesis,lic_descripcion_hipotesis" name="hip-diag_spec" id="hip-diag_spec" onchange="cargarIgual('hip-diag_spec')" >
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label class="floating-label-activo-sm">Indicaciones</label>
                                                                <input type="text" class="form-control form-control-sm" name="ind_orl" id="ind_orl">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label class="floating-label-activo-sm">Diagnóstico CIE-10</label>
                                                                <input type="text" class="form-control form-control-sm" data-input_igual="descripcion_cie,lic_descripcion_cie" name="descripcion_cie_esp" id="descripcion_cie_esp" value="{{ $fichaAtencion->diagnostico_ce10 }}" onchange="cargarIgual('descripcion_cie_esp')">
                                                                <input type="hidden" class="form-control form-control-sm" data-input_igual="id_descripcion_cie,lic_descripcion_cie" name="id_descripcion_cie_esp" id="id_descripcion_cie_esp" value="{{ $fichaAtencion->diagnostico_ce10 }}" onchange="cargarIgual('id_descripcion_cie_esp')">
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
                        <!--CIERRE: ATENCIÓN ESPECIALIDAD GENERAL-->


                        @include('atencion_medica.secciones_especialidad.seccion_ficha_general')

                        <!--INFORME RINOFIBROLARINGOSCOPÍA-->
                        <div class="tab-pane fade" id="rinofibro" role="tabpanel" aria-labelledby="rinofibro-tab">
                            <div class="row bg-white shadow-none rounded mx-1">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12 mt-3 mb-0">
                                            <h6 class="f-16 text-c-blue">Informe rinofibrolaringoscopía</h6>
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!--NARIZ Y FOSAS NASALES-->
                                        <div class="col-sm-12 col-md-12">
                                            <div class="card">
                                                <div class="card-header" id="nariz-fosasnas">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#nariz-fosasnas-c" aria-expanded="false" aria-controls="nariz-fosasnas-c">
                                                        Nariz y fosas nasales
                                                    </button>
                                                </div>
                                                <div id="nariz-fosasnas-c" class="collapse show" aria-labelledby="nariz-fosasnas" data-parent="#nariz-fosasnas">
                                                    <div class="card-body-aten shadow-none">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6 mx-auto">
                                                                <label class="floating-label-activo-sm">Mucosa</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="muc_nasal_permeab" id="muc_nasal_permeab"></textarea>
                                                            </div>
                                                            <div class="form-group col-md-6 mx-auto">
                                                                <label class="floating-label-activo-sm">Cornetes</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="cornetes" id="cornetes"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6 mx-auto">
                                                                <label class="floating-label-activo-sm">Tabique</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="tabique" id="tabique"></textarea>
                                                            </div>
                                                            <div class="form-group col-md-6 mx-auto">
                                                                <label class="floating-label-activo-sm">Tumoraciones</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="tumor" id="tumor"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--RINOFARINGE-->
                                        <div class="col-sm-12 col-md-12">
                                            <div class="card">
                                                <div class="card-header" id="rinofar">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#rinofar-c" aria-expanded="false" aria-controls="rinofar-c">
                                                    Rinofaringe
                                                    </button>
                                                </div>
                                                <div id="rinofar-c" class="collapse show" aria-labelledby="rinofar" data-parent="#rinofar">
                                                    <div class="card-body-aten shadow-none">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12 mx-auto">
                                                                <label class="floating-label-activo-sm">Descripción</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="rinofaringe" id="rinofaringe"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--OROFARINGE-->
                                        <div class="col-sm-12 col-md-12">
                                            <div class="card">
                                                <div class="card-header" id="orofar">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#orofar-c" aria-expanded="false" aria-controls="orofar-c">
                                                        Orofaringe
                                                    </button>
                                                </div>
                                                <div id="orofar-c" class="collapse show" aria-labelledby="orofar" data-parent="#orofar">
                                                    <div class="card-body-aten shadow-none">
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-12">
                                                                <label class="floating-label-activo-sm">Descripción</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="orofaringe" id="orofaringe"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--LARINGE-->
                                        <div class="col-sm-12 col-md-12">
                                            <div class="card">
                                                <div class="card-header" id="laring">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#laring-c" aria-expanded="false" aria-controls="laring-c">
                                                        Laringe
                                                    </button>
                                                </div>
                                                <div id="laring-c" class="collapse show" aria-labelledby="laring" data-parent="#laring">
                                                    <div class="card-body-aten shadow-none">
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-12">
                                                                <label class="floating-label-activo-sm">Descripción</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="laringe" id="laringe"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--NARIZ Y FOSAS NASALES-->
                                        <div class="col-sm-12 col-md-12">
                                            <div class="card">
                                                <div class="card-header" id="menor-edad">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#menor-edad-c" aria-expanded="false" aria-controls="menor-edad-c">
                                                        Info.
                                                    </button>
                                                </div>
                                                <div id="menor-edad-c" class="collapse show" aria-labelledby="menor-edad" data-parent="#menor-edad">
                                                    <div class="card-body-aten shadow-none">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-4">
                                                                <label class="floating-label-activo-sm">Cuerdas</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" placeholder="Aspecto general comisuras" name="cuerdas" id="cuerdas"></textarea>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label class="floating-label-activo-sm">Movilidad, hiatos, otros</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="movilidad" id="movilidad"></textarea>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label class="floating-label-activo-sm">Cierre glótico</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="cierre_glotico" id="cierre_glotico"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--DIAGNÓSTICO-->
                                        <div class="col-sm-12 col-md-12">
                                            <div class="card">
                                                <div class="card-header" id="diag-rinofibro">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#diag-rinofibro-c" aria-expanded="false" aria-controls="diag-rinofibro-c">
                                                        Diagnóstico
                                                    </button>
                                                </div>
                                                <div id="diag-rinofibro-c" class="collapse show" aria-labelledby="diag-rinofibro" data-parent="#diag-rinofibro">
                                                    <div class="card-body-aten shadow-none">
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-6">
                                                                <label class="floating-label-activo-sm">Diagnóstico endoscópico</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="diag_endos" id="diag_endos"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6">
                                                                <label class="floating-label-activo-sm">Observaciones</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="observaciones" id="observaciones"></textarea>
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
                        <!--CIERRE: INFORME RINOFIBROLARINGOSCOPÍA-->

                        {{--  div de botones  --}}
                        <div class="bg-white shadow-none rounded mx-1 p-15">
                            <!--SECCION DE MEDICAMENTOS Y EXAMENES GENERALES -->
                            @include('atencion_medica.generales.seccion_receta_examen_comunes')
                            <!--SECCION DE MEDICAMENTOS Y EXAMENES GENERALES FIN  -->

                            <!--SECCION DE MEDICAMENTOS Y EXAMENES ESPECIALIDAD -->
                            @include('atencion_medica.secciones_especialidad.seccion_receta_examen_esp_orl')
                            <!--SECCION DE MEDICAMENTOS Y EXAMENES ESPECIALIDAD FIN  -->

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

        function abrir_modal_guardar_tipo()
        {
            $('#modal_registrar_ficha_tipo_orl').modal('show');
            cargarSeccion('registro_f_t_orl_detalle');
        }

        function cargarSeccion(div_destino)
        {
            {{--  var tipo = $('#'+select+'').val();  --}}
            $('#'+div_destino).html('');
            $('#form-otorrino').find('select,textarea').each(function(key, elemento){
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
                    html +='<div class="col-md-4">Detalle</div>';
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

        function guardar_tipo_ficha_otorrino()
        {
            var registro_f_t_orl_nombre = $('#registro_f_t_orl_nombre').val();
            var registro_f_t_orl_descripcion = $('#registro_f_t_orl_descripcion').val();
            var _token = CSRF_TOKEN;
            if(registro_f_t_orl_nombre == ''){
                swal({
                        title: "Problema al Registrar Tipo Ficha.\n Campo requedido Nombre",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                    return false;
            }
            if(registro_f_t_orl_descripcion == ''){
                swal({
                        title: "Problema al Registrar Tipo Ficha.\n Campo requedido Descripcion",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                    return false;
            }


            var data = [];
            data.registro_f_t_orl_nombre = registro_f_t_orl_nombre;
            data.registro_f_t_orl_descripcion = registro_f_t_orl_descripcion;

            $('#registro_f_t_orl_detalle').find('input,textarea').each(function(key, elemento){
                {{--  console.log($(elemento).attr('id'));  --}}
                {{--  console.log($(elemento).val());  --}}
                {{--  console.log($(elemento).prop('nodeName'));  --}}
                {{--  console.log('*******');  --}}

                data[$(elemento).attr('id')] = $(elemento).val();

            });

            {{--  console.log(data);  --}}
            url = "{{ route('profesional.ficha_tipo_otorrino') }}";
            $.ajax({

                url: url,
                type: "POST",
                data: {
                    _token: _token,
                    id_profesional : $('#id_profesional').val(),
                    modal_agregar_tipo_apreciacion_auditiva :  data.modal_agregar_tipo_apreciacion_auditiva,
                    modal_agregar_tipo_apreciacion_resp :  data.modal_agregar_tipo_apreciacion_resp,
                    modal_agregar_tipo_disfonia :  data.modal_agregar_tipo_disfonia,
                    modal_agregar_tipo_ex_boca :  data.modal_agregar_tipo_ex_boca,
                    modal_agregar_tipo_examen_bio_od :  data.modal_agregar_tipo_examen_bio_od,
                    modal_agregar_tipo_examen_bio_oi :  data.modal_agregar_tipo_examen_bio_oi,
                    modal_agregar_tipo_examen_faringe :  data.modal_agregar_tipo_examen_faringe,
                    modal_agregar_tipo_examen_fnd :  data.modal_agregar_tipo_examen_fnd,
                    modal_agregar_tipo_examen_fni :  data.modal_agregar_tipo_examen_fni,
                    modal_agregar_tipo_examen_laringe :  data.modal_agregar_tipo_examen_laringe,
                    modal_agregar_tipo_examen_od :  data.modal_agregar_tipo_examen_od,
                    modal_agregar_tipo_examen_oi :  data.modal_agregar_tipo_examen_oi,
                    modal_agregar_tipo_nariz_general :  data.modal_agregar_tipo_nariz_general,
                    modal_agregar_tipo_usa_audifono :  data.modal_agregar_tipo_usa_audifono,
                    observaciones_aprec_auditiva_def :  data.observaciones_aprec_auditiva_def,
                    observaciones_aprec_resp_def :  data.observaciones_aprec_resp_def,
                    observaciones_audifono :  data.observaciones_audifono,
                    observaciones_det_disfonia :  data.observaciones_det_disfonia,
                    observaciones_det_nariz_general :  data.observaciones_det_nariz_general,
                    observaciones_detalle_ex_boca :  data.observaciones_detalle_ex_boca,
                    observaciones_ex_farige_anormal :  data.observaciones_ex_farige_anormal,
                    observaciones_ex_fnd_anormal :  data.observaciones_ex_fnd_anormal,
                    observaciones_ex_fni_anormal :  data.observaciones_ex_fni_anormal,
                    observaciones_ex_larige_anormal :  data.observaciones_ex_larige_anormal,
                    observaciones_ex_od_anormal :  data.observaciones_ex_od_anormal,
                    observaciones_ex_oi_anormal :  data.observaciones_ex_oi_anormal,
                    observaciones_obs_ex_biom :  data.observaciones_obs_ex_biom,
                    observaciones_obs_ex_nasal :  data.observaciones_obs_ex_nasal,
                    observaciones_obs_ex_oidos :  data.observaciones_obs_ex_oidos,
                    observaciones_obs_ex_orl :  data.observaciones_obs_ex_orl,
                    observaciones_obs_examen_bio_od :  data.observaciones_obs_examen_bio_od,
                    observaciones_obs_examen_bio_oi :  data.observaciones_obs_examen_bio_oi,
                    registro_f_t_orl_descripcion :  data.registro_f_t_orl_descripcion,
                    registro_f_t_orl_nombre :  data.registro_f_t_orl_nombre,
                },
            })
            .done(function(data)
            {
                {{--  console.log('-----------------------');  --}}
                {{--  console.log(data);  --}}
                {{--  console.log('-----------------------');  --}}
                if(data.estado == 1)
                {
                    $('#modal_registrar_ficha_tipo_orl').modal('hide');
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

        function cargar_info_ficha_tipo_orl(select, div_descripcion)
        {
            let id_ft = $('#'+select).val();
            if(id_ft == '')
            {
                $('#'+div_descripcion).html('');
                $('#form-otorrino').find('select,textarea').each(function(key, elemento){
                    if($(elemento).prop('nodeName') == 'SELECT')
                    {
                        $(elemento).val(0);
                    }
                    else
                    {
                        $(elemento).val('');
                    }
                });

                evaluar_para_carga_detalle('usa_audifono','div_detalle_usa_audifono','audifono',5);
                evaluar_para_carga_detalle('apreciacion_auditiva','div_detalle_apreciacion_auditiva','aprec_auditiva_def',2);
                evaluar_para_carga_detalle('examen_oi','div_detalle_examen_oi','ex_oi_anormal',2);
                evaluar_para_carga_detalle('examen_od','div_detalle_examen_od','ex_od_anormal',2);
                evaluar_para_carga_detalle('examen_bio_oi','div_obs_examen_bio_oi','obs_examen_bio_oi',2);
                evaluar_para_carga_detalle('examen_bio_od','div_obs_examen_bio_od','obs_examen_bio_od',2);
                evaluar_para_carga_detalle('nariz_general','div_detalle_nariz_gen','det_nariz_general',2);
                evaluar_para_carga_detalle('apreciacion_resp','div_detalle_nariz_resp','aprec_resp_def',2);
                evaluar_para_carga_detalle('examen_fni','div_detalle_examen_fni','ex_fni_anormal',2);
                evaluar_para_carga_detalle('examen_fnd','div_detalle_examen_fnd','ex_fnd_anormal',2);
                evaluar_para_carga_detalle('disfonia','div_disfonia','det_disfonia',2);
                evaluar_para_carga_detalle('ex_boca','div_detalle_ex_boca','detalle_ex_boca',2);
                evaluar_para_carga_detalle('examen_faringe','div_detalle_examen_faringe','ex_farige_anormal',2);
                evaluar_para_carga_detalle('examen_laringe','div_detalle_examen_laringe','ex_larige_anormal',2);
                return false;
            }
            $('#'+div_descripcion).html($('#'+select+' option:selected').attr('data-descripcion'));

            url = "{{ route('profesional.buscar_ficha_tipo_otorrino') }}";
            $.ajax({

                url: url,
                type: "GET",
                data: {
                    id_profesional : $('#id_profesional').val(),
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
                        if(index == 'id_usa_audifono')
                            index = 'usa_audifono';

                        $('#'+index).val(value);
                    });
                    evaluar_para_carga_detalle('usa_audifono','div_detalle_usa_audifono','audifono',5);
                    evaluar_para_carga_detalle('apreciacion_auditiva','div_detalle_apreciacion_auditiva','aprec_auditiva_def',2);
                    evaluar_para_carga_detalle('examen_oi','div_detalle_examen_oi','ex_oi_anormal',2);
                    evaluar_para_carga_detalle('examen_od','div_detalle_examen_od','ex_od_anormal',2);
                    evaluar_para_carga_detalle('examen_bio_oi','div_obs_examen_bio_oi','obs_examen_bio_oi',2);
                    evaluar_para_carga_detalle('examen_bio_od','div_obs_examen_bio_od','obs_examen_bio_od',2);
                    evaluar_para_carga_detalle('nariz_general','div_detalle_nariz_gen','det_nariz_general',2);
                    evaluar_para_carga_detalle('apreciacion_resp','div_detalle_nariz_resp','aprec_resp_def',2);
                    evaluar_para_carga_detalle('examen_fni','div_detalle_examen_fni','ex_fni_anormal',2);
                    evaluar_para_carga_detalle('examen_fnd','div_detalle_examen_fnd','ex_fnd_anormal',2);
                    evaluar_para_carga_detalle('disfonia','div_disfonia','det_disfonia',2);
                    evaluar_para_carga_detalle('ex_boca','div_detalle_ex_boca','detalle_ex_boca',2);
                    evaluar_para_carga_detalle('examen_faringe','div_detalle_examen_faringe','ex_farige_anormal',2);
                    evaluar_para_carga_detalle('examen_laringe','div_detalle_examen_laringe','ex_larige_anormal',2);

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

    </script>
@endsection


