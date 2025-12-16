<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2 shadow-none">
        <div class="row mx-0">
            <div class="col-sm-12 col-md-12">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="orl" role="tablist">
                    <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="atencion_oft-tab" data-toggle="tab" href="#atencion_oft" role="tab" aria-controls="atencion_oft" aria-selected="true">Atención Especialidad</a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-12 col-md-12">
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

                    @csrf
                    <div class="tab-content" id="orl-contenido">
                        <!--ATENCIÓN ESPECIALIDAD GENERAL-->
                        <div class="tab-pane fade show active" id="atencion_oft" role="tabpanel" aria-labelledby="atencion_oft-tab">
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
                                                                <label class="floating-label-activo-sm">Motivo de consulta</label>
                                                                <input type="text" class="form-control form-control-sm" data-input_igual="descripcion_consulta" name="descripcion_consulta_oftalmo" id="descripcion_consulta_oftalmo" onchange="cargarIgual('descripcion_consulta_oftalmo');">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label class="floating-label-activo-sm">Antecedentes oftalmológicos</label>
                                                                <input type="text" class="form-control form-control-sm" name="antec_especialidad_oftalmo" id="antec_especialidad_oftalmo">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--EXAMEN ESPECIALIDAD - PARAMETROS DE CONTROL-->
                                        <div class="col-sm-12 col-md-12">
                                            <div class="card">
                                                <div class="card-header" id="examen_oft_general">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed card-act-open"  type="button" data-toggle="collapse" data-target="#examen_oft_generalc" aria-expanded="false" aria-controls="examen_oft_generalc">
                                                        Examen general de la especialidad
                                                    </button>
                                                </div>
                                                <div id="examen_oft_generalc" class="collapse" aria-labelledby="" data-parent="#examen_oft_general" style="examen_oft_general">
                                                    <div class="card-body-aten shadow-none">
                                                        <div class="row">
                                                            <div class="col-md-6">
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
                                                            <div class="col-md-6">
                                                                <span id="descripcion_ficha_tipo_especialidad"></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-row" id="form-oft-g">
                                                            <div class="col-md-12">
                                                                <h6>Parámetros generales</h6>
                                                            </div>
                                                            <hr>
                                                            <div class="col-sm-12 col-md-3">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" style="color:#CE0909;">Agudeza visual Subj. OD</label>
                                                                    <select name="agudeza_visual_subj_od" data-titulo="Agudeza visual Subj. OD"  data-seccion="Parámetros Generales" id="agudeza_visual_subj_od" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('agudeza_visual_subj_od','div_agudeza_visual_subj_od','obs_agudeza_visual_subj_od',2);">
                                                                        <option selected  value="1">Normal</option>
                                                                        <option value="2">Anormal</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_agudeza_visual_subj_od" style="display:none;">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;" >Agudeza visual Subj. OD(describir)</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs. Agudeza visual Subj. OD" data-seccion="Parámetros Generales" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_agudeza_visual_subj_od" id="obs_agudeza_visual_subj_od"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-3">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(41, 90, 189);font-weight: bold;">Agudeza visual Subj. OI</label>
                                                                    <select name="agudeza_visual_subj_oi" data-titulo="Agudeza visual Subj. OI" data-seccion="Parámetros Generales"  id="agudeza_visual_subj_oi"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('agudeza_visual_subj_oi','div_agudeza_visual_subj_oi','obs_agudeza_visual_subj_oi',2);">
                                                                        <option selected  value="1">Normal</option>
                                                                        <option value="2">Anormal</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_agudeza_visual_subj_oi" style="display:none;">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(41, 90, 189);font-weight: bold;">Agudeza visual Subj. OI(describir)</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs. Agudeza visual Subj. OI" data-seccion="Parámetros Generales" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_agudeza_visual_subj_oi" id="obs_agudeza_visual_subj_oi"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-3">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;" >Agudeza visual Obj. OD</label>
                                                                    <select name="agudeza_visual_obj_od" data-titulo="Agudeza visual Obj. OD" data-seccion="Parámetros Generales" id="agudeza_visual_obj_od" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('agudeza_visual_obj_od','div_agudeza_visual_obj_od','obs_agudeza_visual_obj_od',2);">
                                                                        <option selected  value="1">Normal</option>
                                                                        <option value="2">Anormal</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_agudeza_visual_obj_od" style="display:none;">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;" >Agudeza visual Obj. OD(describir)</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs. Agudeza visual Obj. OD" data-seccion="Parámetros Generales" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_agudeza_visual_obj_od" id="obs_agudeza_visual_obj_od"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-3">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm"  style="color:rgb(41, 90, 189);font-weight: bold;">Agudeza visual Obj. OI</label>
                                                                    <select name="agudeza_visual_obj_oi" data-titulo="Agudeza visual Obj. OI" data-seccion="Parámetros Generales" id="agudeza_visual_obj_oi" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('agudeza_visual_obj_oi','div_agudeza_visual_obj_oi','obs_agudeza_visual_obj_oi',2);">
                                                                        <option selected  value="1">Normal</option>
                                                                        <option value="2">Anormal</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_agudeza_visual_obj_oi" style="display:none;">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(41, 90, 189);font-weight: bold;" >Agudeza visual Obj. OI(describir)</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs. Agudeza visual Obj. OI" data-seccion="Parámetros Generales" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_agudeza_visual_obj_oi" id="obs_agudeza_visual_obj_oi"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-4">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Movimientos Oculares</label>
                                                                    <select name="mov_oculares" data-titulo="Movimientos Oculares" data-seccion="Parámetros Generales" id="mov_oculares" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('mov_oculares','div_mov_oculares','obs_mov_oculares',2);">
                                                                        <option selected  value="1">Normal</option>
                                                                        <option value="2">Anormal</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_mov_oculares" style="display:none;">
                                                                    <label class="floating-label-activo-sm">Movimientos Oculares</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs. Movimientos Oculares" data-seccion="Parámetros Generales" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_mov_oculares" id="obs_mov_oculares"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-4">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;" >Autorrefractometría OD</label>
                                                                    <select name="autorefracto_od" data-titulo="Autorrefractometría OD" data-seccion="Parámetros Generales" id="autorefracto_od" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('autorefracto_od','div_autorefracto_od','obs_autorefracto_od',2);">
                                                                        <option selected  value="1">Normal</option>
                                                                        <option value="2">Anormal</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_autorefracto_od" style="display:none;">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;" >Autorrefractometría OD</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs. Autorrefractometría OD" data-seccion="Parámetros Generales"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_autorefracto_od" id="obs_autorefracto_od"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-4">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(41, 90, 189);font-weight: bold;" >Autorrefractometría OI</label>
                                                                    <select name="autorefracto_oi" data-titulo="Autorrefractometría OI" data-seccion="Parámetros Generales" id="autorefracto_oi" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('autorefracto_oi','div_autorefracto_oi','obs_autorefracto_oi',2);">
                                                                        <option selected  value="1">Normal</option>
                                                                        <option value="2">Anormal</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_autorefracto_oi" style="display:none;">
                                                                    <label class="floating-label-activo-sm"  style="color:rgb(41, 90, 189);font-weight: bold;">Autorrefractometría OI</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs. Autorrefractometría OI"data-seccion="Parámetros Generales"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_autorefracto_oi" id="obs_autorefracto_oi"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-3">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;" >Presión Ocular OD</label>
                                                                    <select name="presion_ocular_od" data-titulo="Presion Ocular OD" id="presion_ocular_od" data-seccion="Parámetros Generales"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('presion_ocular_od','div_presion_ocular_od','obs_presion_ocular_od',2);">
                                                                        <option selected  value="1">Normal</option>
                                                                        <option value="2">Anormal</option>
                                                                        <option value="3">No Examinada</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_presion_ocular_od" style="display:none;">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;" >Presión Ocular(describir)</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs. Presion Ocular OD" data-seccion="Parámetros Generales" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_presion_ocular_od" id="obs_presion_ocular_od"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-3">
                                                                <div class="form-group">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;" >P/O (Valor)</label>
                                                                        <input type="text" class="form-control form-control-sm" data-titulo="Obs. Valor OD" data-seccion="Parámetros Generales" name="valor_presion_ocular_od" id="valor_presion_ocular_od">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-3">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" style="color:#144799;">Presión Ocular OI</label>
                                                                    <select name="presion_ocular_oi" data-titulo="Presion_Ocular_OI" data-seccion="Parámetros Generales" id="presion_ocular_oi" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('presion_ocular_oi','div_presion_ocular_oi','obs_presion_ocular_oi',2);">
                                                                        <option selected  value="1">Normal</option>
                                                                        <option value="2">Anormal</option>
                                                                        <option value="3">No Examinada</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_presion_ocular_oi" style="display:none;">
                                                                    <label class="floating-label-activo-sm"  style="color:#295aa8;" >Presión Ocular <i>(describir)</i></label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs. Presion_Ocular_OI" data-seccion="Parámetros Generales" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_presion_ocular_oi" id="obs_presion_ocular_oi"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-3">
                                                                <div class="form-group">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm" style="color:rgb(41, 90, 189);font-weight: bold;"  >P/I (Valor)</label>
                                                                        <input type="text" class="form-control form-control-sm" data-titulo="Obs. Valor OI" data-seccion="Parámetros Generales" name="valor_presion_ocular_oi" id="valor_presion_ocular_oi">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-3">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;" >Campo Visual OD</label>
                                                                    <select name="campo_visual_od" data-titulo="Campo Visual OD" data-seccion="Parámetros Generales" id="campo_visual_od" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('campo_visual_od','div_campo_visual_od','obs_campo_visual_od',2);">
                                                                        <option selected  value="1">Normal</option>
                                                                        <option value="2">Anormal</option>
                                                                        <option value="3">No Examinado</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_campo_visual_od" style="display:none;">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;">Campo Visual OD</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs. Campo Visual OD" data-seccion="Parámetros Generales" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_campo_visual_od" id="obs_campo_visual_od"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-3">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(41, 90, 189);font-weight: bold;" >Campo Visual OI</label>
                                                                    <select name="campo_visual_oi" data-titulo="Campo Visual OI" data-seccion="Parámetros Generales" id="campo_visual_oi"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('campo_visual_oi','div_campo_visual_oi','obs_campo_visual_oi',2);">
                                                                        <option selected  value="1">Normal</option>
                                                                        <option value="2">Anormal</option>
                                                                        <option value="3">No Examinado</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group" id="div_campo_visual_oi" style="display:none;">
                                                                    <label class="floating-label-activo-sm" style="color:rgb(41, 90, 189);font-weight: bold;" >Campo Visual OI</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs. Campo Visual OI" data-seccion="Parámetros Generales" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_campo_visual_oi" id="obs_campo_visual_oi"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group fill">
                                                                    <label class="floating-label-activo-sm">Otros antecedentes importantes</label>
                                                                    <textarea class="form-control form-control-sm" data-titulo="Obs. Otros Antecedentes Importantes" data-seccion="Parámetros Generales" id="campo_otros_ex_general" name="campo_otros_ex_general"  rows="1" onfocus="this.rows=4"  onblur="this.rows=1;"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="text-center col-md-12 mb-3">
                                                                <button type="button" class="btn btn-outline-primary btn-sm" onclick="abrir_modal_guardar_tipo('form-oft-g','registro_f_t_oft_detalle','oft_g');"><i class="fas fa-save"></i> Guardar nueva ficha tipo</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--Biomicroscopía-->
                                        <div class="col-sm-12 col-md-12">
                                            <div class="card">
                                                <div class="card-header" id="bio_esp_oftalmo">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#bio_oftalmo" aria-expanded="false" aria-controls="bio_oftalmo">
                                                       Biomicroscopía
                                                    </button>
                                                </div>
                                                <div id="bio_oftalmo" class="collapse show" aria-labelledby="bio_oftalmo" data-parent="#bio_oftalmo">
                                                    <div class="card-body-aten shadow-none">
                                                        <div class="row">
                                                            <div class="col-md-6">
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
                                                            <div class="col-md-6">
                                                                <span id="descripcion_ficha_tipo_especialidad_bio"></span>
                                                            </div>
                                                        </div>
                                                        <div id="form-bio">
                                                            <div class="form-row">
                                                                <div class="col-md-12">
                                                                    <h6 style="color:rgb(241, 13, 74);font-weight: bold;">OJO DERECHO</h6>
                                                                </div>
                                                                <hr>
                                                                <div class="col-sm-12 col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;" >Párpados</label>
                                                                        <select name="parpbiood" data-titulo="Párpados OD" data-seccion="Biomicroscopía" id="parpbiood" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('parpbiood','div_parpbiood','obs_parpbiood',2);">
                                                                            <option selected  value="1">Normales</option>
                                                                            <option value="2">Anormales</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_parpbiood" style="display:none;">
                                                                        <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;" >Párpados (describir)</label>
                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Bio Párpados OD" data-seccion="Biomicroscopía"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_parpbiood" id="obs_parpbiood"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;">Conjuntivas</label>
                                                                        <select name="conjuntiva_bio_od" data-titulo="Conjuntivas OB" data-seccion="Biomicroscopía" id="conjuntiva_bio_od" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('conjuntiva_bio_od','div_conjuntiva_bio_od','obs_conjuntiva_bio_od',2);">
                                                                            <option selected  value="1">Normal</option>
                                                                            <option value="2">Anormal</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_conjuntiva_bio_od" style="display:none;">
                                                                        <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;">Conjuntivas (describir)</label>
                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Bio Conjuntivas OD" data-seccion="Biomicroscopía"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_conjuntiva_bio_od" id="obs_conjuntiva_bio_od"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;" >Córneas</label>
                                                                        <select name="biocornea_od" data-titulo="Córneas OD" id="biocornea_od" data-seccion="Biomicroscopía"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('biocornea_od','div_biocornea_od','obs_biocornea_od',3);">
                                                                            <option value="1">Claras y completamente epitelizadas</option>
                                                                            <option value="2">Anormales</option>
                                                                            <option value="3">Otros</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_biocornea_od" style="display:none;">
                                                                        <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;" >Córneas</label>
                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Córneas bio OD" data-seccion="Biomicroscopía"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_biocornea_od" id="obs_biocornea_od"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm"  style="color:rgb(241, 13, 74);font-weight: bold;" >Camara Anterior</label>
                                                                        <select name="camara_ant_od" data-titulo="Camara anterior OD" data-seccion="Biomicroscopía"   id="camara_ant_od" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('camara_ant_od','div_camara_ant_od','obs_camara_ant_od',2);">
                                                                            <option selected  value="1">Normal</option>
                                                                            <option value="2">Anormal</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_camara_ant_od" style="display:none;">
                                                                        <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;"  >Camara Anterior (describir)</label>
                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Camara anterior OD" data-seccion="Biomicroscopía"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_camara_ant_od" id="obs_camara_ant_od"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;">Tyndall</label>
                                                                        <select name="tyndall_od" data-titulo="Tyndall OD" data-seccion="Biomicroscopía"   id="tyndall_od" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tyndall_od','div_tyndall_od','obs_tyndall_od',2);">
                                                                            <option selected  value="1">Normal</option>
                                                                            <option value="2">Anormal</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_tyndall_od" style="display:none;">
                                                                        <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;">Tyndall</label>
                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Tyndall OD" data-seccion="Biomicroscopía"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tyndall_od" id="obs_tyndall_od"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;" >Cristalino</label>
                                                                        <select name="cristalino_bio_od" data-titulo="Cristalino OD" data-seccion="Biomicroscopía"   id="cristalino_bio_od" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cristalino_bio_od','div_cristalino_bio_od','obs_cristalino_bio_od',2);">
                                                                            <option selected  value="1">Normal</option>
                                                                            <option value="2">Anormal</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_cristalino_bio_od" style="display:none;">
                                                                        <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;" >Cristalino</label>
                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Cristalino OD"  data-seccion="Biomicroscopía"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cristalino_bio_od" id="obs_cristalino_bio_od"></textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-12">
                                                                    <div class="form-group fill">
                                                                        <label class="floating-label-activo-sm">Otros antecedentes importantes</label>
                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Otros Antecedentes Importantes OD" data-seccion="Biomicroscopía" id="campo_otros_bio_od" name="campo_otros_bio_od"  rows="1" onfocus="this.rows=2"  onblur="this.rows=1;"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="col-md-12">
                                                                    <h6 style="color:rgb(12, 122, 241);font-weight: bold;">OJO IZQUIERDO</h6>
                                                                </div>
                                                                <hr>
                                                                <div class="col-sm-12 col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm" style="color:rgb(12, 122, 241);font-weight: bold;" >Párpados</label>
                                                                        <select name="parpbiooi" data-titulo="Párpados OI" data-titulo="Párpados OI" data-seccion="Biomicroscopía"  id="parpbiooi" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('parpbiooi','div_parpbiooi','obs_parpbiooi',2);">
                                                                            <option selected  value="1">Normales</option>
                                                                            <option value="2">Anormales</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_parpbiooi" style="display:none;">
                                                                        <label class="floating-label-activo-sm" style="color:rgb(12, 122, 241);font-weight: bold;" >Párpados (describir)</label>
                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Párpados OI" data-seccion="Biomicroscopía"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_parpbiooi" id="obs_parpbiooi"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm" style="color:rgb(12, 122, 241);font-weight: bold;">Conjuntivas</label>
                                                                        <select name="conjuntiva_bio_oi" data-titulo="Conjuntivas OI" data-seccion="Biomicroscopía"  id="conjuntiva_bio_oi" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('conjuntiva_bio_oi','div_conjuntiva_bio_oi','obs_conjuntiva_bio_oi',2);">
                                                                            <option selected  value="1">Normal</option>
                                                                            <option value="2">Anormal</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_conjuntiva_bio_oi" style="display:none;">
                                                                        <label class="floating-label-activo-sm" style="color:rgb(12, 122, 241);font-weight: bold;">Conjuntivas (describir)</label>
                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Bio Conjuntivas OI" data-seccion="Biomicroscopía" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_conjuntiva_bio_oi" id="obs_conjuntiva_bio_oi"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm" style="color:rgb(12, 122, 241);font-weight: bold;" >Córneas</label>
                                                                        <select name="biocornea_oi" data-titulo="Córneas OI" data-titulo="Córneas OI" data-seccion="Biomicroscopía" id="biocornea_oi" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('biocornea_oi','div_biocornea_oi','obs_biocornea_oi',3);">
                                                                            <option value="1">Claras y completamente epitelizadas</option>
                                                                            <option value="2">Anormales</option>
                                                                            <option value="3">Otros</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_biocornea_oi" style="display:none;">
                                                                        <label class="floating-label-activo-sm" style="color:rgb(12, 122, 241);font-weight: bold;">Córneas</label>
                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Córneas OI" data-seccion="Biomicroscopía"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_biocornea_oi" id="obs_biocornea_oi"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm"  style="color:rgb(12, 122, 241);font-weight: bold;" >Camara Anterior</label>
                                                                        <select name="camara_ant_oi" data-titulo="Camara Anterior OI" data-seccion="Biomicroscopía" id="camara_ant_oi"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('camara_ant_oi','div_camara_ant_oi','obs_camara_ant_oi',2);">
                                                                            <option selected  value="1">Normal</option>
                                                                            <option value="2">Anormal</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_camara_ant_oi" style="display:none;">
                                                                        <label class="floating-label-activo-sm" style="color:rgb(12, 122, 241);font-weight: bold;" >Camara Anterior (describir)</label>
                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Camara Anterior OI" data-seccion="Biomicroscopía" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_camara_ant_oi" id="obs_camara_ant_oi"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm" style="color:rgb(12, 122, 241);font-weight: bold;">Tyndall</label>
                                                                        <select name="tyndall_oi"  data-titulo="Tyndall OI" data-seccion="Biomicroscopía" id="tyndall_oi" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tyndall_oi','div_tyndall_oi','obs_tyndall_oi',2);">
                                                                            <option selected  value="1">Normal</option>
                                                                            <option value="2">Anormal</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_tyndall_oi" style="display:none;">
                                                                        <label class="floating-label-activo-sm" style="color:rgb(12, 122, 241);font-weight: bold;">Tyndall</label>
                                                                        <textarea class="form-control form-control-sm"  data-titulo="Obs. Tyndall OI" data-seccion="Biomicroscopía" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tyndall_oi" id="obs_tyndall_oi"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm" style="color:rgb(12, 122, 241);font-weight: bold;" >Cristalino</label>
                                                                        <select name="cristalino_bio_oi"  data-titulo="Cristalino OI" data-seccion="Biomicroscopía" id="cristalino_bio_oi" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cristalino_bio_oi','div_cristalino_bio_oi','obs_cristalino_bio_oi',2);">
                                                                            <option selected  value="1">Normal</option>
                                                                            <option value="2">Anormal</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_cristalino_bio_oi" style="display:none;">
                                                                        <label class="floating-label-activo-sm" style="color:rgb(12, 122, 241);font-weight: bold;" >Cristalino</label>
                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Cristalino OI" data-seccion="Biomicroscopía"rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cristalino_bio_oi" id="obs_cristalino_bio_oi"></textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-12">
                                                                    <div class="form-group fill">
                                                                        <label class="floating-label-activo-sm">Otros antecedentes importantes</label>
                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Otros Antecedentes Importantes OI" data-seccion="Biomicroscopía" id="campo_otros_bio_oi" name="campo_otros_bio_oi"  rows="1" onfocus="this.rows=2"  onblur="this.rows=1;"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 text-center mb-3">
                                                                    <button type="button" class="btn btn-outline-primary btn-sm" onclick="abrir_modal_guardar_tipo('form-bio','registro_f_t_oft_detalle','bio');"><i class="fas fa-save"></i> Guardar nueva biomicroscopía tipo</button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--fondo de ojo-->
                                        <div class="col-sm-12 col-md-12">
                                            <div class="card">
                                                <div class="card-header" id="fo-esp_oftalmo">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#fo-oftalmo" aria-expanded="false" aria-controls="fo-oftalmo">
                                                       Fondo de ojo
                                                    </button>
                                                </div>
                                                <div id="fo-oftalmo" class="collapse show" aria-labelledby="fo-oftalmo" data-parent="#fo-oftalmo">
                                                    <div class="card-body-aten shadow-none">
                                                        <div class="row">
                                                            <div class="col-md-6">
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
                                                            <div class="col-md-6">
                                                                <span id="descripcion_ficha_tipo_especialidad_of"></span>
                                                            </div>
                                                        </div>
                                                        <div id="form-fo">
                                                            <div class="form-row">
                                                                <div class="col-md-12">
                                                                    <h6 style="color:rgb(241, 13, 74);font-weight: bold;">OJO DERECHO</h6>
                                                                </div>
                                                                <hr>
                                                                <div class="col-sm-12 col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;" >Papilas</label>
                                                                        <select name="papilas_fo_od" data-titulo="Papilas" data-seccion="Fondo de Ojo"  id="papilas_fo_od" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('papilas_fo_od','div_papilas_fo_od','obs_papilas_fo_od',2);">
                                                                            <option selected  value="1">Normales</option>
                                                                            <option value="2">Anormales</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_papilas_fo_od" style="display:none;">
                                                                        <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;" >Papilas (describir)</label>
                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Papilas OD"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_papilas_fo_od" id="obs_papilas_fo_od"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;">Excavación</label>
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
                                                                        <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;">Excavación (describir)</label>
                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Excavacion OD" data-seccion="Fondo de Ojo" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_excavacion_fo_od" id="obs_excavacion_fo_od"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;" >Bordes</label>
                                                                        <select name="bordes_od" data-titulo="Bordes_OD" data-seccion="Fondo de Ojo"  id="bordes_od" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('bordes_od','div_bordes_od','obs_bordes_od',2);">
                                                                            <option value="1">Bordes netos y Normales</option>
                                                                            <option value="2">Anormales</option>

                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_bordes_od" style="display:none;">
                                                                        <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;" >Bordes</label>
                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Bordes OD"  data-seccion="Fondo de Ojo" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_bordes_od" id="obs_bordes_od"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm"  style="color:rgb(241, 13, 74);font-weight: bold;" >Máculas</label>
                                                                        <select name="maculas_fo_od" data-titulo="Maculas_OD" data-seccion="Fondo de Ojo"  id="maculas_fo_od" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('maculas_fo_od','div_maculas_fo_od','obs_maculas_fo_od',2);">
                                                                            <option selected  value="1">Normales</option>
                                                                            <option value="2">Anormal</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_maculas_fo_od" style="display:none;">
                                                                        <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;"  >Máculas (describir)</label>
                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Maculas OD"  data-seccion="Fondo de Ojo" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_maculas_fo_od" id="obs_maculas_fo_od"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;">Vasos</label>
                                                                        <select name="vasos_fo_od" data-titulo="Vasos_OD" data-seccion="Fondo de Ojo"id="vasos_fo_od"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('vasos_fo_od','div_vasos_fo_od','obs_vasos_fo_od',2);">
                                                                            <option selected  value="1">Normal</option>
                                                                            <option value="2">Anormal</option>vasos_fo_od
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_vasos_fo_od" style="display:none;">
                                                                        <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;">Vasos</label>
                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Vasos OD" data-seccion="Fondo de Ojo" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_vasos_fo_od" id="obs_vasos_fo_od"></textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-12 col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;" >Periféria</label>
                                                                        <select name="periferia_fo_od" data-titulo="Periferia_OD" data-seccion="Fondo de Ojo" id="periferia_fo_od" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('periferia_fo_od','div_periferia_fo_od','obs_periferia_fo_od',2);">
                                                                            <option selected  value="1">Sana</option>
                                                                            <option value="2">Anormal</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_periferia_fo_od" style="display:none;">
                                                                        <label class="floating-label-activo-sm" style="color:rgb(241, 13, 74);font-weight: bold;" >Periféria</label>
                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Periferia OD" data-seccion="Fondo de Ojo" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_periferia_fo_od" id="obs_periferia_fo_od"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm">Otros Antecedentes Importantes</label>
                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Otros Antec. Importantes OD" data-seccion="Fondo de Ojo" id="campo_fo_otros_od" name="campo_fo_otros_od"  rows="1" onfocus="this.rows=2"  onblur="this.rows=1;"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="col-md-12">
                                                                    <h6 style="color:rgb(41, 90, 189);font-weight: bold;">OJO IZQUIERDO</h6>
                                                                </div>
                                                                <hr>
                                                                <div class="col-sm-12 col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm" style="color:rgb(41, 90, 189);font-weight: bold;">Papilas</label>
                                                                        <select name="papilas_fo_oi" data-titulo="Papilas OI" id="papilas_fo_oi" data-seccion="Fondo de Ojo" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('papilas_fo_oi','div_papilas_fo_oi','obs_papilas_fo_oi',2);">
                                                                            <option selected  value="1">Normales</option>
                                                                            <option value="2">Anormales</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_papilas_fo_oi" style="display:none;">
                                                                        <label class="floating-label-activo-sm" style="color:rgb(41, 90, 189);font-weight: bold;">Papilas (describir)</label>
                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Papilas OI" data-seccion="Fondo de Ojo" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_papilas_fo_oi" id="obs_papilas_fo_oi"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm" style="color:rgb(41, 90, 189);font-weight: bold;">Excavación</label>
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
                                                                        <label class="floating-label-activo-sm" style="color:rgb(41, 90, 189);font-weight: bold;">Excavación (describir)</label>
                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Excavacion OI" data-seccion="Fondo de Ojo" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_excavacion_fo_oi" id="obs_excavacion_fo_oi"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm" style="color:rgb(41, 90, 189);font-weight: bold;">Bordes</label>
                                                                        <select name="bordes_oi" data-titulo="Bordes_OI" data-seccion="Fondo de Ojo" id="bordes_oi" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('bordes_oi','div_bordes_oi','obs_bordes_oi',2);">
                                                                            <option value="1">Bordes netos y Normales</option>
                                                                            <option value="2">Anormales</option>

                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_bordes_oi" style="display:none;">
                                                                        <label class="floating-label-activo-sm" style="color:rgb(41, 90, 189);font-weight: bold;" >Bordes</label>
                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Bordes OI" data-seccion="Fondo de Ojo" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_bordes_oi" id="obs_bordes_oi"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm"  style="color:rgb(41, 90, 189);font-weight: bold;" >Máculas</label>
                                                                        <select name="maculas_fo_oi" data-titulo="Maculas OI" id="maculas_fo_oi" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('maculas_fo_oi','div_maculas_fo_oi','obs_maculas_fo_oi',2);">
                                                                            <option selected  value="1">Normales</option>
                                                                            <option value="2">Anormal</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_maculas_fo_oi" style="display:none;">
                                                                        <label class="floating-label-activo-sm" style="color:rgb(41, 90, 189);font-weight: bold;" >Máculas (describir)</label>
                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Maculas OI" data-seccion="Fondo de Ojo" data-seccion="Fondo de Ojo" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_maculas_fo_oi" id="obs_maculas_fo_oi"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm" style="color:rgb(41, 90, 189);font-weight: bold;">Vasos</label>
                                                                        <select name="vasos_fo_oi" data-titulo="Vasos_OI" id="vasos_fo_oi" data-seccion="Fondo de Ojo" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('vasos_fo_oi','div_vasos_fo_oi','obs_vasos_fo_oi',2);">
                                                                            <option selected  value="1">Normal</option>
                                                                            <option value="2">Anormal</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_vasos_fo_oi" style="display:none;">
                                                                        <label class="floating-label-activo-sm" style="color:rgb(41, 90, 189);font-weight: bold;">Vasos</label>
                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Vasos OI" data-seccion="Fondo de Ojo"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_vasos_fo_oi" id="obs_vasos_fo_oi"></textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-12 col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm" style="color:rgb(41, 90, 189);font-weight: bold;" >Periféria</label>
                                                                        <select name="periferia_fo_oi" data-titulo="Periferia OI" data-seccion="Fondo de Ojo" id="periferia_fo_oi" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('periferia_fo_oi','div_periferia_fo_oi','obs_periferia_fo_oi',2);">
                                                                            <option selected  value="1">Sana</option>
                                                                            <option value="2">Anormal</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_periferia_fo_oi" style="display:none;">
                                                                        <label class="floating-label-activo-sm" style="color:rgb(41, 90, 189);font-weight: bold;">Periféria</label>
                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Periferia OI" data-seccion="Fondo de Ojo" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_periferia_fo_oi" id="obs_periferia_fo_oi"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm">Otros Antecedentes Importantes</label>
                                                                        <textarea class="form-control form-control-sm" data-titulo="Obs. Otros Antec. Importantes OI" data-seccion="Fondo de Ojo" id="campo_fo_otros_oi" name="campo_fo_otros_oi"  rows="1" onfocus="this.rows=2"  onblur="this.rows=1;"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 text-center mb-3">
                                                                    <button type="button" class="btn btn-outline-primary btn-sm" onclick="abrir_modal_guardar_tipo('form-fo','registro_f_t_oft_detalle','fo');"><i class="fas fa-save"></i> Guardar nuevo fondo de ojo tipo</button>
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
                                                                <input type="text" class="form-control form-control-sm"  data-input_igual="lic_descripcion_hipotesis" name="descripcion_hipotesis" id="descripcion_hipotesis" onchange="cargarIgual('descripcion_hipotesis')" >
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label class="floating-label-activo-sm">Indicaciones</label>
                                                                <input type="text" class="form-control form-control-sm" name="ind_oft" id="ind_oft">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label class="floating-label-activo-sm">Diagnóstico CIE-10</label>
                                                                <input type="text" class="form-control form-control-sm" data-input_igual="lic_descripcion_cie" name="descripcion_cie" id="descripcion_cie" value="" onchange="cargarIgual('descripcion_cie')">
                                                                <input type="hidden" class="form-control form-control-sm" data-input_igual="lic_descripcion_cie" name="id_descripcion_cie" id="id_descripcion_cie" value="" onchange="cargarIgual('id_descripcion_cie')">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--ENFERMO CRÓNICO O GES-->
                                        @include('atencion_medica.generales.seccion_cronicos_ges_confidencial')

                                        <!--Plan de tratamiento-->
                                        <div class="col-sm-12 col-md-12">
                                            <div class="card">
                                                <div class="card-header" id="plan_oftalmo">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#plan_oft" aria-expanded="false" aria-controls="plan_oft">
                                                    Planificación de tratamiento
                                                    </button>
                                                </div>
                                                <div id="plan_oft" class="collapse show" aria-labelledby="plan_oft" data-parent="#plan_oft">
                                                    <div class="card-body-aten shadow-none">

                                                        <div class="form-row">
                                                            <div class="form-group col-md-3">
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <input type="hidden" name="tratamiento" id="tratamiento" value="">
                                                                            <div class="switch switch-success d-inline m-r-10">
                                                                                <input type="checkbox" id="tratamiento_check" name="tratamiento_check" value="" />
                                                                                <label for="tratamiento_check" class="cr"></label>
                                                                            </div>
                                                                            <label>Solo Tratamiento<br>Médico</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <input type="hidden" name="lentes" id="lentes" value="">
                                                                            <div class="switch switch-success d-inline m-r-10">
                                                                                <input type="checkbox" id="lentes_check" name="lentes_check" value="" />
                                                                                <label for="lentes_check" class="cr"></label>
                                                                            </div>
                                                                            <label>Lentes</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <input type="hidden" name="procedimiento" id="procedimiento" value="">
                                                                            <div class="switch switch-success d-inline m-r-10">
                                                                                <input type="checkbox" id="procedimiento_check" name="procedimiento_check" value="" />
                                                                                <label for="procedimiento_check" class="cr"></label>
                                                                            </div>
                                                                            <label>Procedimiento</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <input type="hidden" name="cirugia" id="cirugia" value="">
                                                                            <div class="switch switch-success d-inline m-r-10">
                                                                                <input type="checkbox" id="cirugia_check" name="cirugia_check" value="" />
                                                                                <label for="cirugia_check" class="cr"></label>
                                                                            </div>
                                                                            <label>Cirugía</label>
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
                        <!--CIERRE: ATENCIÓN ESPECIALIDAD GENERAL-->

                        {{--  div de botones  --}}
                        <div class="bg-white shadow-none rounded mx-1 p-15">
                            <!--SECCION DE MEDICAMENTOS Y EXAMENES GENERALES -->
                            @include('atencion_medica.generales.seccion_receta_examen_comunes')
                            <!--SECCION DE MEDICAMENTOS Y EXAMENES GENERALES FIN  -->

                            <!--SECCION DE MEDICAMENTOS Y EXAMENES ESPECIALIDAD -->
                            @include('atencion_medica.secciones_especialidad.seccion_receta_examenes_esp_oftalmo')

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

<!--MODALES modal_enfermedades_cronicas-->
@include('atencion_medica.formularios.modal_atencion_general.modal_enfermedades_cronicas')

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
@endsection
