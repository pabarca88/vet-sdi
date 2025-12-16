<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2 ">
        <div class="row mx-0">

            <div class="col-sm-12 col-md-12">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="oft" role="tablist">
                    <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="atencion_dent_impl_tab" data-toggle="tab" href="#atencion_dent_impl" role="tab" aria-controls="atencion_dent_impl" aria-selected="true">Atención especialidad</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="rehabdental-tab" data-toggle="tab" href="#rehabdental" role="tab" aria-controls="rehabdental" aria-selected="false">Rehabilitación</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="odonto_adulto_tab" data-toggle="tab" href="#odonto_adulto" role="tab" aria-controls="odonto_adulto" aria-selected="false">Odontograma</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="periodontograma_tab" data-toggle="tab" href="#periodontograma" role="tab" aria-controls="periodontograma" aria-selected="false">Periodontograma</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="evaluacion_adulto_tab" data-toggle="tab" href="#evaluacion_adulto" role="tab" aria-controls="evaluacion_adulto" aria-selected="false">Evaluación adulto</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="tratamiento_tab" data-toggle="tab" href="#tratamiento" role="tab" aria-controls="tratamiento" aria-selected="false">Tratamiento/Presupuesto</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="presupuesto_tab" data-toggle="tab" href="#presupuesto" role="tab" aria-controls="presupuesto" aria-selected="false">Presupuesto</a>
                    </li>

                </ul>
            </div>
            <div class="col-sm-12 col-md-12">
                <form action="{{ route('dental.registrar_ficha_atencion_dental') }}" method="POST">
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
                        <div class="tab-pane fade show active" id="atencion_dent_impl" role="tabpanel" aria-labelledby="atencion_dent_impl_tab">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3 mb-0">
                                            <h6 class="f-18 text-c-blue mb-3">Ficha de atención general</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--FORMULARIOS-->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3 mb-0">
                                <!--Formulario / Menor de edad-->
                                @include('general.secciones_ficha.seccion_menor')
                                <!--Cierre: Formulario / Menor de edad-->
                            </div>
                            <!--Motivo consulta-->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card-a">
                                    <div class="card-header-a" id="motivo">
                                        <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#motivo_c" aria-expanded="false" aria-controls="motivo_c">
                                            Motivo de la consulta
                                        </button>
                                    </div>
                                    <div id="motivo_c" class="collapse show" aria-labelledby="motivo" data-parent="#motivo">
                                        <div class="card-body-aten-a shadow-none">
                                            <div class="form-row">
                                                <div class="form-group col-md-5">
                                                    <label class="floating-label-activo-sm">Motivo de consulta</label>
                                                    <input type="text" class="form-control form-control-sm" name="descripcion_consulta_orl" id="descripcion_consulta_orl">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label-activo-sm">Antecedentes Especialidad</label>
                                                    <input type="text" class="form-control form-control-sm" name="antec_especialidado" id="antec_especialidad">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <label class="floating-label-activo-sm">Agregar Antecedentes Nuevo</label>
                                                            <select class="form-control form-control-sm" name="tipo_antecedente" id="tipo_antecedente" onchange="carga_campos_antecedente_nuevo();">
                                                                <option value="">Selecciones</option>
                                                                <option value="alergia">Alergia Medicamento</option>
                                                                <option value="enfermedades_cronicas">Enfermedad Crónica</option>
                                                                <option value="anestesias">Incidente Anestesia</option>
                                                                <option value="cirugia">Incidente Cirugia</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-12 m-t-10" style="display:none" id="div_campos_antecedente_nuevo">
                                                            <!-- campos antecedentes nuevos -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

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
                                            <div id="form-orl-adulto">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <ul class="nav nav-tabs-aten nav-fill mb-10" id="orl_adulto" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset active" id="orl_oido_tab" data-toggle="tab" href="#orl_oido" role="tab" aria-controls="orl_oido" aria-selected="true">Oídos</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="ex_nariz-tab" data-toggle="tab" href="#orl_ex_nariz" role="tab" aria-controls="orl_ex_nariz" aria-selected="true">Naríz</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="orl_flaringe-tab" data-toggle="tab" href="#orl_flaringe" role="tab" aria-controls="orl_flaringe" aria-selected="true">Faringo-laringe</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="cuello-tab" data-toggle="tab" href="#cuello" role="tab" aria-controls="cuello" aria-selected="true">Cuello-Gl.anexas-otros</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link-aten text-reset" id="in-hosp-orl-tab" data-toggle="tab" href="#in-hosp-orl" role="tab" aria-control="in-hosp-orl" aria-selected="false">Hospitalización</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="tab-content" id="orl_adulto">
                                                            <!--OIDO-->
                                                            <div class="tab-pane fade show active" id="orl_oido" role="tabpanel" aria-labelledby="orl_oido_tab">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    <div class="col-sm-2">
                                                                                        <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                                            <a class="nav-link-aten text-reset active " id="audicion_gen-tab" data-toggle="tab" href="#audicion_gen" role="tab" aria-controls="audicion_gen" aria-selected="false">Audición</a>
                                                                                            <a class="nav-link-aten text-reset" id="oidos_ex-tab" data-toggle="tab" href="#oidos_ex" role="tab" aria-controls="oidos_ex" aria-selected="true">Examen-Oidos </a>
                                                                                            <a class="nav-link-aten text-reset" id="biomicrosc-tab" data-toggle="tab" href="#biomicrosc" role="tab" aria-controls="biomicrosc" aria-selected="false">Biomicroscopía</a>
                                                                                            <a class="nav-link-aten text-reset" id="ex_vestibular-tab" data-toggle="tab" href="#ex_vestibular" role="tab" aria-controls="ex_vestibular" aria-selected="false">Examen Vestibular</a>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-10">
                                                                                        <div class="tab-content" id="v-pills-tabContent">
                                                                                            <div class="tab-pane fade show active" id="audicion_gen" role="tabpanel" aria-labelledby="audicion_gen-tab">
                                                                                                <div class="col-sm-12 col-md-12">
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Usa Audífono</label>
                                                                                                                <select name="usa_audifono" id="usa_audifono" data-titulo="Usa Audífono" data-seccion="Oídos Audición" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('usa_audifono','div_detalle_usa_audifono','audifono',5)">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">No</option>
                                                                                                                    <option value="2">Si OD</option>
                                                                                                                    <option value="3">Si OI</option>
                                                                                                                    <option value="4">Si Ambos</option>
                                                                                                                    <option value="5">Anotar Observaciones</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"  id="div_detalle_usa_audifono" style="display:none">
                                                                                                                <label class="floating-label-activo-sm">Usa Audífono</label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Usa Audífono" data-seccion="Oídos Audición" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="audifono" id="audifono"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Apreciación Auditiva</label>
                                                                                                                <select name="apreciacion_auditiva" id="apreciacion_auditiva" data-titulo="Apreciación Auditiva" data-seccion="Oídos Audición" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('apreciacion_auditiva','div_detalle_apreciacion_auditiva','aprec_auditiva_def',2)">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">Aceptable</option>
                                                                                                                    <option value="2">Deficiente</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group" id="div_detalle_apreciacion_auditiva" style="display:none">
                                                                                                                <label class="floating-label-activo-sm">Apreciación Auditiva</label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Auditiva" data-seccion="Oídos Audición" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="aprec_auditiva_def" id="aprec_auditiva_def"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                            <label class="floating-label-activo-sm">Observaciones Examen Auditívo</label>
                                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Auditívo" data-seccion="Oídos Audición" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_audicion" id="obs_ex_audicion"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="tab-pane fade show" id="oidos_ex" role="tabpanel" aria-labelledby="oidos_ex-tab">
                                                                                                <div class="col-sm-12 col-md-12">
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm" style="color:#CE0909;">Examen OD</label>
                                                                                                                <select name="examen_od" id="examen_od" data-titulo="Examen OD" data-seccion="Oídos Audición" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('examen_od','div_detalle_examen_od','ex_od_anormal',2);">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">Normal</option>
                                                                                                                    <option value="2">Anormal</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group" id="div_detalle_examen_od" style="display:none">
                                                                                                                <label class="floating-label-activo-sm t-red">Examen OD <i>(describir)</i></label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Examen OD" data-seccion="Oídos Audición" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_od_anormal" id="ex_od_anormal"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm"  style="color:rgb(41, 90, 189);font-weight: bold;">Examen OI</label>
                                                                                                                <select name="examen_oi" id="examen_oi" data-titulo="Examen OI" data-seccion="Oídos Audición" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('examen_oi','div_detalle_examen_oi','ex_oi_anormal',2);">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">Normal</option>
                                                                                                                    <option value="2">Anormal</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"  id="div_detalle_examen_oi" style="display:none">
                                                                                                                <label class="floating-label-activo-sm t-red">Examen OI <i>(describir)</i></label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Examen OI" data-seccion="Oídos Audición" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_oi_anormal" id="ex_oi_anormal"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                            <label class="floating-label-activo-sm">Observaciones Examen Oidos</label>
                                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones oidos" data-seccion="Oídos Audición" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_oidos" id="obs_ex_oidos"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="tab-pane fade" id="biomicrosc" role="tabpanel" aria-labelledby="biomicrosc-tab">
                                                                                                <div class="col-sm-12 col-md-12">
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm" style="color:#CE0909;">Biomicroscopía OD</label>
                                                                                                                <select name="examen_bio_od" id="examen_bio_od" data-titulo="Biomicroscopía OD" data-seccion="Oídos Audición" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('examen_bio_od','div_obs_examen_bio_od','obs_examen_bio_od',2);">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">Normal</option>
                                                                                                                    <option value="2">Anormal</option>
                                                                                                                    <option value="3">No Realizada</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group" id="div_obs_examen_bio_od" style="display:none">
                                                                                                                <label class="floating-label-activo-sm t-red">Biomicroscopía OD<i>(describir)</i></label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm"  data-titulo="Biomicroscopía OD" data-seccion="Oídos Audición" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_examen_bio_od" id="obs_examen_bio_od"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm"  style="color:rgb(41, 90, 189);font-weight: bold;">Examen OI</label>
                                                                                                                <select name="examen_bio_oi" data-titulo="Biomicroscopía OI" id="examen_bio_oi" data-seccion="Oídos Audición" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('examen_bio_oi','div_obs_examen_bio_oi','obs_examen_bio_oi',2);">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">Normal</option>
                                                                                                                    <option value="2">Anormal</option>
                                                                                                                    <option value="3">No Realizada</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"  id="div_obs_examen_bio_oi" style="display:none">
                                                                                                                <label class="floating-label-activo-sm t-red">Biomicroscopía OI<i>(describir)</i></label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm"  data-titulo="Biomicroscopía OD" data-seccion="Oídos Audición" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_examen_bio_od" id="obs_examen_bio_od"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                            <label class="floating-label-activo-sm">Observaciones Examen Biomicroscópico</label>
                                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Biomicroscópico" data-seccion="Oídos Audición" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_biom" id="obs_ex_biom"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="tab-pane fade" id="ex_vestibular" role="tabpanel" aria-labelledby="ex_vestibular-tab">
                                                                                                <div class="col-sm-12 col-md-12">
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Tipo Vertigo</label>
                                                                                                                <select name="tipo_vertigo" id="tipo_vertigo" data-titulo="Tipo Vertigo" data-seccion="Sistema Vestibular" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tipo_vertigo','div_detalle_tipo_vertigo','detalle_tipo_vertigo',3)">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">Objetivo</option>
                                                                                                                    <option value="2">Subjetivo</option>
                                                                                                                    <option value="3">Otro Describir</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group" id="div_detalle_tipo_vertigo" style="display:none">
                                                                                                                <label class="floating-label-activo-sm">Tipo Vertigo</label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Tipo Vertigo" data-seccion="Sistema Vestibular" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="detalle_tipo_vertigo" id="detalle_tipo_vertigo"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Sintomas Acompañantes</label>
                                                                                                                <select name="sint_acomp" id="sint_acomp" data-titulo="Sintomas Acompañantes" data-seccion="Sistema Vestibular" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('sint_acomp','div_detalle_sintomas_acompanantes','detalle_sint_acompanantes',3)">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">No</option>
                                                                                                                    <option value="2">Si</option>
                                                                                                                    <option value="3">Otro Describir</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"  id="div_detalle_sintomas_acompanantes" style="display:none">
                                                                                                                <label class="floating-label-activo-sm">Sintomas Acompañantes</label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Sintomas Acompañantes" data-seccion="Sistema Vestibular" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="detalle_sint_acompanantes" id="detalle_sint_acompanantes"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                            <div class="form-group">
                                                                                                                 <label class="floating-label-activo-sm">Nistagmus</label>
                                                                                                                <select name="ng" id="ng" data-titulo="Nistagmus" data-seccion="Sistema Vestibular" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ng','div_detalle_ng','detalle_ng',2);">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">No</option>
                                                                                                                    <option value="2">Si Describir</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"  id="div_detalle_ng" style="display:none">
                                                                                                                <label class="floating-label-activo-sm">Nistagmus</label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Nistagmus" data-seccion="Sistema Vestibular" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="detalle_ng" id="detalle_ng"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Episodios</label>
                                                                                                                <select name="episodios" id="episodios" data-titulo="Episodios" data-seccion="Sistema Vestibular" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('episodios','div_detalle_episodios','detalle_episodios',3);">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">No</option>
                                                                                                                    <option value="2">Primero</option>
                                                                                                                    <option value="3">Más de uno</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group" id="div_detalle_episodios" style="display:none">
                                                                                                                <label class="floating-label-activo-sm">Episodios</label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Episodios" data-seccion="Sistema Vestibular" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="detalle_episodios" id="detalle_episodios"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Equilibrio</label>
                                                                                                                <select name="equilibrio" id="equilibrio" data-titulo="Equilibrio" data-seccion="Sistema Vestibular" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('equilibrio','div_detalle_equilibrio','detalle_equilibrio',2);">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">Normal</option>
                                                                                                                    <option value="2">Anormal</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"  id="div_detalle_equilibrio" style="display:none">
                                                                                                                <label class="floating-label-activo-sm">Equilibrio</label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Equilibrio" data-seccion="Sistema Vestibular" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="detalle_equilibrio" id="detalle_equilibrio"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                            <div class="form-group">
                                                                                                                 <label class="floating-label-activo-sm">Otros Antecedentes</label>
                                                                                                                <select name="ot_antec" id="ot_antec" data-titulo="Otros Antecedentes" data-seccion="Sistema Vestibular" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ot_antec','div_detalle_ot_antec','detalle_ot_antec',2);">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">No</option>
                                                                                                                    <option value="2">Si Describir</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"  id="div_detalle_ot_antec" style="display:none">
                                                                                                                <label class="floating-label-activo-sm">Otros Antecedentes</label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Nistagmus" data-seccion="Sistema Vestibular" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="detalle_ot_antec" id="detalle_ot_antec"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                            <label class="floating-label-activo-sm">Observaciones Examen Vestibular</label>
                                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Biomicroscópico" data-seccion="Oídos Audición" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_biom" id="obs_ex_biom"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <br>
                                                                                <div class="row">
                                                                                    <div class="col-sm-4 col-md-4">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm">Cargar ficha tipo Oído</label>
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
                                                                                    <div class="col-sm-4 col-md-4">
                                                                                        <span id="descripcion_ficha_tipo_especialidad"></span>
                                                                                    </div>

                                                                                    <div class="col-sm-4 col-md-4 mb-3">
                                                                                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="abrir_modal_guardar_tipo('form-oft-g','registro_f_t_oft_detalle','oft_g');"><i class="fas fa-save"></i> Guardar nueva ficha tipo Oído</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!--EXAMEN  NARIZ-->
                                                            <div class="tab-pane fade show" id="orl_ex_nariz" role="tabpanel" aria-labelledby="orl_ex_nariz_tab">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    <div class="col-sm-2">
                                                                                        <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                                            <a class="nav-link-aten text-reset active" id="exnasal_grl-tab" data-toggle="tab" href="#exnasal_grl" role="tab" aria-controls="exnasal_grl" aria-selected="true">Aspecto General</a>
                                                                                            <a class="nav-link-aten text-reset" id="nariz_ex_fisico-tab" data-toggle="tab" href="#nariz_ex_fisico" role="tab" aria-controls="nariz_ex_fisico" aria-selected="false">Examen Nasal</a>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-10 col-xl-10">
                                                                                        <div class="tab-content" id="v-pills-tabContent">
                                                                                            <div class="tab-pane fade show active" id="exnasal_grl" role="tabpanel" aria-labelledby="exnasal_grl-tab">
                                                                                                <div class="col-sm-12 col-md-12">
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Aspecto General</label>
                                                                                                                <select name="nariz_general" id="nariz_general" data-titulo="Apreciación Respiratoria" data-seccion="Naríz" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('nariz_general','div_detalle_nariz_gen','det_nariz_general',2)">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">Aceptable</option>
                                                                                                                    <option value="2">Deficiente</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"   id="div_detalle_nariz_gen" style="display:none">
                                                                                                                <label class="floating-label-activo-sm">Detalle Aspecto General</label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_nariz_general" id="det_nariz_general"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Apreciación Respiratoria</label>
                                                                                                                <select name="apreciacion_resp" id="apreciacion_resp" data-titulo="Apreciación Respiratoria" data-seccion="Naríz" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('apreciacion_resp','div_detalle_nariz_resp','aprec_resp_def',2)">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">Aceptable</option>
                                                                                                                    <option value="2">Deficiente</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"  id="div_detalle_nariz_resp" style="display:none">
                                                                                                                <label class="floating-label-activo-sm">Apreciación Respiratoria</label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="aprec_resp_def" id="aprec_resp_def"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                            <label class="floating-label-activo-sm">Observaciones Examen General</label>
                                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_general_nariz" id="obs_ex_general_nariz"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="tab-pane fade" id="nariz_ex_fisico" role="tabpanel" aria-labelledby="nariz_ex_fisico-tab">
                                                                                                <div class="col-sm-12 col-md-12">
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm" style="color:#CE0909;">Examen Fosa Nasal Der.</label>
                                                                                                                <select name="examen_fnd" id="examen_fnd" data-titulo="Examen Fosa Nasal Der." data-seccion="Naríz" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('examen_fnd','div_detalle_examen_fnd','ex_fnd_anormal',2);">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">Normal</option>
                                                                                                                    <option value="2">Anormal</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group" id="div_detalle_examen_fnd" style="display:none">
                                                                                                                <label class="floating-label-activo-sm t-red">Examen Fosa Nasal Derecha<i>(describir)</i></label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Examen Fosa Nasal Der." data-seccion="Naríz" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_fnd_anormal" id="ex_fnd_anormal"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm"  style="color:rgb(41, 90, 189);">Examen Fosa Nasal Izq.</label>
                                                                                                                <select name="examen_fni" id="examen_fni" data-titulo="Examen Fosa Nasal Izq." data-seccion="Naríz" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('examen_fni','div_detalle_examen_fni','ex_fni_anormal',2);">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">Normal</option>
                                                                                                                    <option value="2">Anormal</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"  id="div_detalle_examen_fni" style="display:none">
                                                                                                                <label class="floating-label-activo-sm t-red">Examen Fosa Nasal Izquierda<i>(describir)</i></label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Examen Fosa Nasal Izq." data-seccion="Naríz" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_fni_anormal" id="ex_fni_anormal"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                            <label class="floating-label-activo-sm">Observaciones Examen Nasal</label>
                                                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Observaciones Examen Nasal" data-seccion="Naríz" data-tipo="general" onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_nasal" id="obs_ex_nasal"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div><br>
                                                                                <div class="row">
                                                                                    <div class="col-sm-4 col-md-4">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm">Cargar ficha tipo Nariz</label>
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
                                                                                    <div class="col-sm-4 col-md-4">
                                                                                        <span id="descripcion_ficha_tipo_especialidad_of"></span>
                                                                                    </div>

                                                                                    <div class="col-sm-4 col-md-4 mb-3">
                                                                                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="abrir_modal_guardar_tipo('form-fo','registro_f_t_oft_detalle','fo');"><i class="fas fa-save"></i> Guardar nueva ficha tipo Nariz</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--EXAMEN  FARIGO-LARIGE-->
                                                            <div class="tab-pane fade show" id="orl_flaringe" role="tabpanel" aria-labelledby="orl_flaringe-tab">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    <div class="col-sm-2">
                                                                                        <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                                            <a class="nav-link-aten text-reset active" id="faringe-tab" data-toggle="tab" href="#faringe" role="tab" aria-controls="faringe" aria-selected="true">Faringe</a>
                                                                                            <a class="nav-link-aten text-reset" id="laringe-tab" data-toggle="tab" href="#laringe" role="tab" aria-controls="laringe" aria-selected="false">Laringe</a>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-10 col-xl-10">
                                                                                        <div class="tab-content" id="v-pills-tabContent">
                                                                                            <div class="tab-pane fade show active" id="faringe" role="tabpanel" aria-labelledby="faringe-tab"><br>
                                                                                                <div class="col-sm-12 col-md-12">
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Examen Boca</label>
                                                                                                                <select name="ex_boca" id="ex_boca" class="form-control form-control-sm" data-titulo="Examen Boca"  data-seccion="Faringo-Laringe"  onchange="evaluar_para_carga_detalle('ex_boca','div_detalle_ex_boca','detalle_ex_boca',2)">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">Normal</option>
                                                                                                                    <option value="2">Alterado</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"  id="div_detalle_ex_boca" style="display:none">
                                                                                                                <label class="floating-label-activo-sm">Examen Boca</label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Examen Boca"  data-seccion="Faringo-Laringe"   onfocus="this.rows=3" onblur="this.rows=1;" name="detalle_ex_boca" id="detalle_ex_boca"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Examen Faríngeo</label>
                                                                                                                <select name="examen_faringe" id="examen_faringe" data-titulo="Examen Faríngeo"  data-seccion="Faringo-Laringe"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('examen_faringe','div_detalle_examen_faringe','ex_farige_anormal',2);">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">Normal</option>
                                                                                                                    <option value="2">Anormal</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group" id="div_detalle_examen_faringe" style="display:none">
                                                                                                                <label class="floating-label-activo-sm">Examen Faríngeo</label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  data-titulo="Examen Faríngeo"  data-seccion="Faringo-Laringe"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_farige_anormal" id="ex_farige_anormal"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="tab-pane fade " id="laringe" role="tabpanel" aria-labelledby="laringe-tab">
                                                                                                <div class="col-sm-12 col-md-12">
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Disfonía</label>
                                                                                                                <select name="disfonia" id="disfonia" class="form-control form-control-sm" data-titulo="Disfonía" data-seccion="Faringo-Laringe" onchange="evaluar_para_carga_detalle('disfonia','div_disfonia','det_disfonia',2)">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">No</option>
                                                                                                                    <option value="2">Sí</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"  id="div_disfonia" style="display:none">
                                                                                                                <label class="floating-label-activo-sm">Detalle Disfonía</label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Disfonía" data-seccion="Faringo-Laringe" onfocus="this.rows=3" onblur="this.rows=1;" name="det_disfonia" id="det_disfonia"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Examen Laríngeo</label>
                                                                                                                <select name="examen_laringe" id="examen_laringe" data-titulo="Examen Laríngeo"  data-seccion="Faringo-Laringe"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('examen_laringe','div_detalle_examen_laringe','ex_larige_anormal',2);">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">Normal</option>
                                                                                                                    <option value="2">Anormal</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group" id="div_detalle_examen_laringe" style="display:none">
                                                                                                                <label class="floating-label-activo-sm">Examen Laríngeo</label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Examen Laríngeo"  data-seccion="Faringo-Laringe"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_larige_anormal" id="ex_larige_anormal"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                            <label class="floating-label-activo-sm">Observaciones Examen Laríngeo</label>
                                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Laríngeo" data-seccion="Faringo-Laringe" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_laringeo" id="obs_ex_laringeo"></textarea>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div><br>
                                                                                <div class="row">
                                                                                    <div class="col-sm-4 col-md-4">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm">Cargar ficha tipo Faringo-Laringe</label>
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
                                                                                    <div class="col-sm-4 col-md-4">
                                                                                        <span id="descripcion_ficha_tipo_especialidad_of"></span>
                                                                                    </div>

                                                                                    <div class="col-sm-4 col-md-4 mb-3">
                                                                                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="abrir_modal_guardar_tipo('form-fo','registro_f_t_oft_detalle','fo');"><i class="fas fa-save"></i> Guardar nueva ficha tipo Faringo-Laringe</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--EXAMEN CUELLO-->
                                                            <div class="tab-pane fade show" id="cuello" role="tabpanel" aria-labelledby="cuello-tab">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    <div class="col-sm-12 col-md-12 col-xl-12">
                                                                                        <div class="tab-content" id="v-pills-tabContent">
                                                                                            <div class="tab-pane fade show active" id="faringe" role="tabpanel" aria-labelledby="faringe-tab"><br>
                                                                                                <div class="col-sm-12 col-md-12">
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Piel y Tegumentos</label>
                                                                                                                <select name="piel_tegumnto" data-titulo="Ex_cuello" data-seccion="Cuello"  id="piel_tegumnto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('piel_tegumnto','div_piel_tegumnto','obs_piel_tegumnto',2);">
                                                                                                                    <option selected  value="1">Normales</option>
                                                                                                                    <option value="2">Anormales</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group" id="div_piel_tegumnto" style="display:none;">
                                                                                                                <label class="floating-label-activo-sm">Piel y Tegumentos</label>
                                                                                                                <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_piel_tegumnto" id="obs_piel_tegumnto"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Adenopatías</label>
                                                                                                                <select name="adenopatias" data-titulo="Ex_cuello" data-seccion="Cuello"  id="adenopatias" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('adenopatias','div_adenopatias','obs_adenopatias',2);">
                                                                                                                    <option selected  value="1">Normales</option>
                                                                                                                    <option value="2">Anormales</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group" id="div_adenopatias" style="display:none;">
                                                                                                                <label class="floating-label-activo-sm">Adenopatías</label>
                                                                                                                <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_adenopatias" id="obs_adenopatias"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Tumores y Masas</label>
                                                                                                                <select name="tumores_masas" data-titulo="Ex_cuello" data-seccion="Cuello"  id="tumores_masas" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tumores_masas','div_tumores_masas','obs_tumores_masas',2);">
                                                                                                                    <option selected  value="1">Normales</option>
                                                                                                                    <option value="2">Anormales</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group" id="div_tumores_masas" style="display:none;">
                                                                                                                <label class="floating-label-activo-sm">Tumores y Masas</label>
                                                                                                                <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tumores_masas" id="obs_tumores_masas"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm">Glándulas Anexas</label>
                                                                                                                <select name="gland_anexas" data-titulo="Ex_cuello" data-seccion="Cuello"  id="gland_anexas" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('gland_anexas','div_gland_anexas','obs_gland_anexas',2);">
                                                                                                                    <option selected  value="1">Normales</option>
                                                                                                                    <option value="2">Anormales</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group" id="div_gland_anexas" style="display:none;">
                                                                                                                <label class="floating-label-activo-sm">Glándulas Anexas</label>
                                                                                                                <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_gland_anexas" id="obs_gland_anexas"></textarea>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                    </div>

                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                </div><br>
                                                                                <div class="row">
                                                                                    <div class="col-sm-4 col-md-4">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm">Carga ficha tipo Cuello y otros</label>
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
                                                                                    <div class="col-sm-4 col-md-4">
                                                                                        <span id="descripcion_ficha_tipo_especialidad_of"></span>
                                                                                    </div>

                                                                                    <div class="col-sm-4 col-md-4 mb-3">
                                                                                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="abrir_modal_guardar_tipo('form-fo','registro_f_t_oft_detalle','fo');"><i class="fas fa-save"></i> Guardar nueva ficha tipo Cuello y otros</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--HOSPITALIZACION-->
                                                            <div class="tab-pane fade show" id="in-hosp-orl" role="tabpanel" aria-labelledby="in-hosp-orl-tab">
                                                                @include('general.hospitalizacion.hospitalizar')
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--FORMULARIO / SIGNOS VITALES Y OTROS-->
                            @include('general.secciones_ficha.signos_vitales')


                            <!--CRONICOS / GES / CONFIDENCIAL -->
                            @include('general.secciones_ficha.seccion_cronicos_ges_confidencial')

                            <!--Diagnóstico-->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card-a">
                                    <div class="card-header-a " id="diagnostico">
                                        <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#diagnostico_c" aria-expanded="false" aria-controls="diagnostico_c">
                                            Diagnóstico
                                        </button>
                                    </div>
                                    <div id="diagnostico_c" class="collapse show" aria-labelledby="diagnostico" data-parent="#diagnostico">
                                        <div class="card-body-aten-a  shadow-none">
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label-activo-sm">Hipótesis diagnóstica</label>
                                                        <input type="text" class="form-control form-control-sm"  data-input_igual="lic_descripcion_hipotesis,hipotesis_certificado" name="descripcion_hipotesis" id="descripcion_hipotesis" onchange="cargarIgual('descripcion_hipotesis')" >
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
                        </div>
                        <!--INFORME REHABILITACION-->
                        <div class="tab-pane fade" id="rehabdental" role="tabpanel" aria-labelledby="rehabdental-tab">
                            <div class="row bg-white shadow-none rounded mx-1">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12 mt-3 mb-0">
                                            <h6 class="f-16 text-c-blue">Rehabilitación</h6>
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="div_form_examen_rfl">
                                        {!! $examen !!}
                                    </div>
                                </div>
                                <hr>
                                <!--GUARDAR EXAMEN-->
                                <div class="col-md-12 text-center mb-3">
                                    <input type="submit" class="btn btn-success mt-1" onclick="agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Examen e ir a su Agenda">
                                    <bottom type="bottom" class="btn btn-success mt-1" onclick="visualizar_pdf_examen('rfl');">Ver Examen PDF</bottom>
                                </div>
                            </div>
                        </div>
                        <!--CIERRE: INFORME REHAB-->
                        <div class="tab-pane fade" id="odonto_adulto" role="tabpanel" aria-labelledby="odonto_adulto-tab">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h5 class="text-c-blue mt-1 mb-1 f-16">Odontograma</h5>
                                    <hr>
                                </div>
                                <hr>
                                <div class="col-md-12">
                                    <div class="dt-responsive table-responsive table-borderless">
                                        <table id="odontograma_adulto" class="display table dt-responsive nowrap"
                                            style="width:100%">
                                            <!-- ADULTO SUPERIOR -->
                                            <tbody>
                                                <tr>
                                                    <td class="text-center px-0 py-0">
                                                        <div class="diente_adulto" id="t18">
                                                            <img src="{{ asset('images/dental/dientes/d18.png') }}"
                                                                class="wid-40 img-fluid" role="button"
                                                                onclick="info_odontograma(1-8);">
                                                        </div>
                                                        <label data-ndiente="18" class="nav-label-dent">1.8</label>
                                                    </td>
                                                    <td class="text-center px-0 py-0">
                                                        <div class="diente_adulto px-0 py-0" id="t17">
                                                            <img src="{{ asset('images/dental/dientes/d17.png') }}"
                                                                class="wid-40 img-fluid" role="button"
                                                                onclick="info_odontograma(1-7);">
                                                        </div>
                                                        <label data-ndiente="17" class="nav-label-dent">1.7</label>
                                                    </td>
                                                    <td class="text-center px-0 py-0">
                                                        <div class="diente_adulto" id="t16">
                                                            <img src="{{ asset('images/dental/dientes/d16.png') }}"
                                                                class="wid-40 img-fluid" role="button"
                                                                onclick="info_odontograma(1-5);">
                                                        </div>
                                                        <label data-ndiente="16" class="nav-label-dent">1.6</label>
                                                    </td>
                                                    <td class="text-center px-0 py-0">
                                                        <div class="relative diente_adulto" id="t15">
                                                            <img src="{{ asset('images/dental/dientes/d15.png') }}"
                                                                class="wid-40 img-fluid" role="button"
                                                                onclick="info_odontograma();">
                                                        </div>
                                                        <label data-ndiente="15" class="nav-label-dent">1.5</label>
                                                    </td>
                                                    <td class="text-center px-0 py-0">
                                                        <div class="relative diente_adulto" id="t14">
                                                            <img src="{{ asset('images/dental/dientes/d14.png') }}"
                                                                class="wid-40 img-fluid" role="button"
                                                                onclick="info_odontograma();">
                                                        </div>
                                                        <label data-ndiente="14" class="nav-label-dent">1.4</label>
                                                    </td>
                                                    <td class="text-center px-0 py-0">
                                                        <div class="relative diente_adulto" id="t13">
                                                            <img src="{{ asset('images/dental/dientes/d13.png') }}"
                                                                class="wid-40 img-fluid" role="button"
                                                                onclick="info_odontograma();">
                                                        </div>
                                                        <label data-ndiente="13" class="nav-label-dent">1.3</label>
                                                    </td>
                                                    <td class="text-center px-0 py-0">
                                                        <div class="diente_adulto" id="t12">
                                                            <img src="{{ asset('images/dental/dientes/d12.png') }}"
                                                                class="wid-40 img-fluid" role="button"
                                                                onclick="info_odontograma();">
                                                        </div>
                                                        <label data-ndiente="12" class="nav-label-dent">1.2</label>
                                                    </td>
                                                    <td class="text-center px-0 py-0">
                                                        <div class="diente_adulto" id="t11">
                                                            <img src="{{ asset('images/dental/dientes/d11.png') }}"
                                                                class="wid-40" role="button" onclick="info_odontograma();">
                                                        </div>
                                                        <label data-ndiente="11" class="nav-label-dent">1.1</label>
                                                    </td>
                                                    <!--nnnn-->
                                                    <td class="text-center px-0 py-0">
                                                        <div class="diente_adulto" id="t21">
                                                            <img src="{{ asset('images/dental/dientes/d21.png') }}"
                                                                class="wid-40" role="button" onclick="info_odontograma();">
                                                        </div>
                                                        <label data-ndiente="21" class="nav-label-dent">2.1</label>
                                                    </td>
                                                    <td class="text-center px-0 py-0">
                                                        <div class="diente_adulto px-1 py-1" id="t22">
                                                            <img src="{{ asset('images/dental/dientes/d22.png') }}"
                                                                class="wid-40" role="button" onclick="info_odontograma();">
                                                        </div>
                                                        <label data-ndiente="22" class="nav-label-dent">2.2</label>
                                                    </td>
                                                    <td class="text-center px-0 py-0">
                                                        <div class="diente_adulto" id="t23">
                                                            <img src="{{ asset('images/dental/dientes/d23.png') }}"
                                                                class="wid-40" role="button" onclick="info_odontograma();">
                                                        </div>
                                                        <label data-ndiente="23" class="nav-label-dent">2.3</label>
                                                    </td>
                                                    <td class="text-center px-0 py-0">
                                                        <div class="diente_adulto" id="t24">
                                                            <img src="{{ asset('images/dental/dientes/d24.png') }}"
                                                                class="wid-40" role="button" onclick="info_odontograma();">
                                                        </div>
                                                        <label data-ndiente="24" class="nav-label-dent">2.4</label>
                                                    </td>
                                                    <td class="text-center px-0 py-0">
                                                        <div class="relative diente_adulto" id="t25">
                                                            <img src="{{ asset('images/dental/dientes/d25.png') }}"
                                                                class="wid-40" role="button" onclick="info_odontograma();">
                                                        </div>
                                                        <label data-ndiente="25" class="nav-label-dent">2.5</label>
                                                    </td>
                                                    <td class="text-center px-0 py-0">
                                                        <div class="relative diente_adulto" id="t26">
                                                            <img src="{{ asset('images/dental/dientes/d26.png') }}"
                                                                class="wid-40" role="button" onclick="info_odontograma();">
                                                        </div>
                                                        <label data-ndiente="26" class="nav-label-dent">2.6</label>
                                                    </td>
                                                    <td class="text-center px-0 py-0">
                                                        <div class="relative diente_adulto" id="t27">
                                                            <img src="{{ asset('images/dental/dientes/d27.png') }}"
                                                                class="wid-40" role="button" onclick="info_odontograma();">
                                                        </div>
                                                        <label data-ndiente="27" class="nav-label-dent">2.7</label>
                                                    </td>
                                                    <td class="text-center px-0 py-0">
                                                        <div class="relative diente_adulto" id="t28">
                                                            <img src="{{ asset('images/dental/dientes/d28.png') }}"
                                                                class="wid-40" role="button" onclick="info_odontograma();">
                                                        </div>
                                                        <label data-ndiente="28" class="nav-label-dent">2.8</label>
                                                    </td>
                                                </tr>
                                                <!-- ADULTO INFERIOR -->
                                                <tr>
                                                    <td class="text-center px-0 py-0">
                                                        <div class="#" id="t48">
                                                            <img src="{{ asset('images/dental/dientes/d48.png') }}"
                                                                class="wid-40" role="button" onclick="info_odontograma();">
                                                        </div>
                                                        <label data-ndente="48" class="nav-label-dent">4.8</label>
                                                    </td>
                                                    <td class="text-center px-0 py-0">
                                                        <div class="#" id="t47">
                                                            <img src="{{ asset('images/dental/dientes/d47.png') }}"
                                                                class="wid-40" role="button" onclick="info_odontograma();">
                                                        </div>
                                                        <label data-ndiente="47" class="nav-label-dent">4.7</label>
                                                    </td>
                                                    <td class="text-center px-0 py-0">
                                                        <div class="diente_adulto" id="t46">
                                                            <img src="{{ asset('images/dental/dientes/d46.png') }}"
                                                                class="wid-40" role="button" onclick="info_odontograma();">
                                                        </div>
                                                        <label data-ndiente="46" class="nav-label-dent">4.6</label>
                                                    </td>
                                                    <td class="text-center px-0 py-0">
                                                        <div class="diente_adulto" id="t45">
                                                            <img src="{{ asset('images/dental/dientes/d45.png') }}"
                                                                class="wid-40" role="button" onclick="info_odontograma();">
                                                        </div>
                                                        <label data-ndiente="45" class="nav-label-dent">4.5</label>
                                                    </td>
                                                    <td class="text-center px-0 py-0">
                                                        <div class="relative diente_adulto" id="t44">
                                                            <img src="{{ asset('images/dental/dientes/d44.png') }}"
                                                                class="wid-40" role="button" onclick="info_odontograma();">
                                                        </div>
                                                        <label data-ndiente="44" class="nav-label-dent">4.4</label>
                                                    </td>
                                                    <td class="text-center px-0 py-0">
                                                        <div class="diente_adulto" id="t43">
                                                            <img src="{{ asset('images/dental/dientes/d43.png') }}"
                                                                class="wid-40" role="button" onclick="info_odontograma();">
                                                        </div>
                                                        <label data-ndiente="43" class="nav-label-dent">4.3</label>
                                                    </td>
                                                    <td class="text-center px-0 py-0">
                                                        <div class="diente_adulto" id="t42">
                                                            <img src="{{ asset('images/dental/dientes/d42.png') }}"
                                                                class="wid-40" role="button" onclick="info_odontograma();">
                                                        </div>
                                                        <label data-ndiente="42" class="nav-label-dent">4.2</label>
                                                    </td>
                                                    <td class="text-center px-0 py-0">
                                                        <div class="diente_adulto" id="t41">
                                                            <img src="{{ asset('images/dental/dientes/d41.png') }}"
                                                                class="wid-40" role="button" onclick="info_odontograma();">
                                                        </div>
                                                        <label data-ndiente="41" class="nav-label-dent">4.1</label>
                                                    </td>
                                                    <!--nnnn-->
                                                    <td class="text-center px-0 py-0">
                                                        <div class="diente_adulto" id="t31">
                                                            <img src="{{ asset('images/dental/dientes/d31.png') }}"
                                                                class="wid-40" role="button" onclick="info_odontograma();">
                                                        </div>
                                                        <label data-ndiente="31" class="nav-label-dent">3.1</label>
                                                    </td>
                                                    <td class="text-center px-0 py-0">
                                                        <div class="diente_adulto" id="t32">
                                                            <img src="{{ asset('images/dental/dientes/d32.png') }}"
                                                                class="wid-40" role="button" onclick="info_odontograma();">
                                                        </div>
                                                        <label data-ndiente="32" class="nav-label-dent">3.2</label>
                                                    </td>
                                                    <td class="text-center px-0 py-0">
                                                        <div class="diente_adulto" id="t33">
                                                            <img src="{{ asset('images/dental/dientes/d33.png') }}"
                                                                class="wid-40" role="button" onclick="info_odontograma();">
                                                        </div>
                                                        <label data-ndiente="33" class="nav-label-dent">3.3</label>
                                                    </td>
                                                    <td class="text-center px-0 py-0">
                                                        <div class="diente_adulto" id="t34">
                                                            <img src="{{ asset('images/dental/dientes/d34.png') }}"
                                                                class="wid-40" role="button" onclick="info_odontograma();">
                                                        </div>
                                                        <label data-ndiente="34" class="nav-label-dent">3.4</label>
                                                    </td>
                                                    <td class="text-center px-0 py-0">
                                                        <div class="relative diente_adulto" id="t35">
                                                            <img src="{{ asset('images/dental/dientes/d35.png') }}"
                                                                class="wid-40" role="button" onclick="info_odontograma();">
                                                        </div>
                                                        <label data-ndiente="35" class="nav-label-dent">3.5</label>
                                                    </td>
                                                    <td class="text-center px-0 py-0">
                                                        <div class="relative diente_adulto" id="t36">
                                                            <img src="{{ asset('images/dental/dientes/d36.png') }}"
                                                                class="wid-40" role="button" onclick="info_odontograma();">
                                                        </div>
                                                        <label data-ndiente="36" class="nav-label-dent">3.6</label>
                                                    </td>
                                                    <td class="text-center px-0 py-0">
                                                        <div class="relative diente_adulto" id="t37">
                                                            <img src="{{ asset('images/dental/dientes/d37.png') }}"
                                                                class="wid-40" role="button" onclick="info_odontograma();">
                                                        </div>
                                                        <label data-ndiente="37" class="nav-label-dent">3.7</label>
                                                    </td>
                                                    <td class="text-center px-0 py-0">
                                                        <div class="relative diente_adulto" id="t38">
                                                            <img src="{{ asset('images/dental/dientes/d38.png') }}"
                                                                class="wid-40" role="button" onclick="info_odontograma();">
                                                        </div>
                                                        <label data-ndiente="38" class="nav-label-dent">3.8</label>
                                                    </td>
                                                </tr>
                                            <tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="periodontograma" role="tabpanel" aria-labelledby="periodontograma-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12 mt-3 mb-0">
                                            <h6 class="f-16 text-c-blue">PSR</h6>
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6 text-center">
                                                        <label
                                                            class="d-inline col-md-3 mb-1 font-weight-bolder form-inline mr-0 f-16 pr-0">GRUPO
                                                            I=</label>
                                                        <input
                                                            class="form-control form-control-sm d-inline col-md-2 mb-1 form-inline ml-0"
                                                            type="text" name="" id="">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered table-xs">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center align-middle px-1 py-1">1.8</th>
                                                                        <th class="text-center align-middle px-1 py-1">1.7</th>
                                                                        <th class="text-center align-middle px-1 py-1">1.6</th>
                                                                        <th class="text-center align-middle px-1 py-1">1.5</th>
                                                                        <th class="text-center align-middle px-1 py-1">1.4</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="text-center align-middle px-1 py-1">
                                                                            <select class="form-control form-control-sm" id=""
                                                                                name="">
                                                                                <option>0</option>
                                                                                <option>1</option>
                                                                                <option>2</option>
                                                                                <option>3</option>
                                                                                <option>4</option>
                                                                                <option>1*</option>
                                                                                <option>2*</option>
                                                                                <option>3*</option>
                                                                                <option>4*</option>
                                                                            </select>
                                                                        </td>
                                                                        <td class="text-center align-middle px-1 py-1">
                                                                            <select class="form-control form-control-sm" id=""
                                                                                name="">
                                                                                <option>0</option>
                                                                                <option>1</option>
                                                                                <option>2</option>
                                                                                <option>3</option>
                                                                                <option>4</option>
                                                                                <option>1*</option>
                                                                                <option>2*</option>
                                                                                <option>3*</option>
                                                                                <option>4*</option>
                                                                            </select>
                                                                        </td>
                                                                        <td class="text-center align-middle px-1 py-1">
                                                                            <select class="form-control form-control-sm" id=""
                                                                                name="">
                                                                                <option>0</option>
                                                                                <option>1</option>
                                                                                <option>2</option>
                                                                                <option>3</option>
                                                                                <option>4</option>
                                                                                <option>1*</option>
                                                                                <option>2*</option>
                                                                                <option>3*</option>
                                                                                <option>4*</option>
                                                                            </select>
                                                                        </td>
                                                                        <td class="text-center align-middle px-1 py-1">
                                                                            <select class="form-control form-control-sm" id=""
                                                                                name="">
                                                                                <option>0</option>
                                                                                <option>1</option>
                                                                                <option>2</option>
                                                                                <option>3</option>
                                                                                <option>4</option>
                                                                                <option>1*</option>
                                                                                <option>2*</option>
                                                                                <option>3*</option>
                                                                                <option>4*</option>
                                                                            </select>
                                                                        </td>
                                                                        <td class="text-center align-middle px-1 py-1">
                                                                            <select class="form-control form-control-sm" id=""
                                                                                name="">
                                                                                <option>0</option>
                                                                                <option>1</option>
                                                                                <option>2</option>
                                                                                <option>3</option>
                                                                                <option>4</option>
                                                                                <option>1*</option>
                                                                                <option>2*</option>
                                                                                <option>3*</option>
                                                                                <option>4*</option>
                                                                            </select>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6 text-center">
                                                        <label
                                                            class="d-inline col-md-3 mb-1 font-weight-bolder form-inline mr-0 f-16 pr-0">GRUPO
                                                            II=</label>
                                                        <input
                                                            class="form-control form-control-sm d-inline col-md-2 mb-1 form-inline ml-0"
                                                            type="text" name="" id="">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered table-xs">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center align-middle px-1 py-1">1.3</th>
                                                                        <th class="text-center align-middle px-1 py-1">1.2</th>
                                                                        <th class="text-center align-middle px-1 py-1">1.1</th>
                                                                        <th class="text-center align-middle px-1 py-1">2.1</th>
                                                                        <th class="text-center align-middle px-1 py-1">2.2</th>
                                                                        <th class="text-center align-middle px-1 py-1">2.3</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="text-center align-middle px-1 py-1">
                                                                            <select class="form-control form-control-sm" id=""
                                                                                name="">
                                                                                <option>0</option>
                                                                                <option>1</option>
                                                                                <option>2</option>
                                                                                <option>3</option>
                                                                                <option>4</option>
                                                                                <option>1*</option>
                                                                                <option>2*</option>
                                                                                <option>3*</option>
                                                                                <option>4*</option>
                                                                            </select>
                                                                        </td>
                                                                        <td class="text-center align-middle px-1 py-1">
                                                                            <select class="form-control form-control-sm" id=""
                                                                                name="">
                                                                                <option>0</option>
                                                                                <option>1</option>
                                                                                <option>2</option>
                                                                                <option>3</option>
                                                                                <option>4</option>
                                                                                <option>1*</option>
                                                                                <option>2*</option>
                                                                                <option>3*</option>
                                                                                <option>4*</option>
                                                                            </select>
                                                                        </td>
                                                                        <td class="text-center align-middle px-1 py-1">
                                                                            <select class="form-control form-control-sm" id=""
                                                                                name="">
                                                                                <option>0</option>
                                                                                <option>1</option>
                                                                                <option>2</option>
                                                                                <option>3</option>
                                                                                <option>4</option>
                                                                                <option>1*</option>
                                                                                <option>2*</option>
                                                                                <option>3*</option>
                                                                                <option>4*</option>
                                                                            </select>
                                                                        </td>
                                                                        <td class="text-center align-middle px-1 py-1">
                                                                            <select class="form-control form-control-sm" id=""
                                                                                name="">
                                                                                <option>0</option>
                                                                                <option>1</option>
                                                                                <option>2</option>
                                                                                <option>3</option>
                                                                                <option>4</option>
                                                                                <option>1*</option>
                                                                                <option>2*</option>
                                                                                <option>3*</option>
                                                                                <option>4*</option>
                                                                            </select>
                                                                        </td>
                                                                        <td class="text-center align-middle px-1 py-1">
                                                                            <select class="form-control form-control-sm" id=""
                                                                                name="">
                                                                                <option>0</option>
                                                                                <option>1</option>
                                                                                <option>2</option>
                                                                                <option>3</option>
                                                                                <option>4</option>
                                                                                <option>1*</option>
                                                                                <option>2*</option>
                                                                                <option>3*</option>
                                                                                <option>4*</option>
                                                                            </select>
                                                                        </td>
                                                                        <td class="text-center align-middle px-1 py-1">
                                                                            <select class="form-control form-control-sm" id=""
                                                                                name="">
                                                                                <option>0</option>
                                                                                <option>1</option>
                                                                                <option>2</option>
                                                                                <option>3</option>
                                                                                <option>4</option>
                                                                                <option>1*</option>
                                                                                <option>2*</option>
                                                                                <option>3*</option>
                                                                                <option>4*</option>
                                                                            </select>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6 text-center">
                                                        <label
                                                            class="d-inline col-md-3 mb-1 font-weight-bolder form-inline mr-0 f-16 pr-0">GRUPO
                                                            IV=</label>
                                                        <input
                                                            class="form-control form-control-sm d-inline col-md-2 mb-1 form-inline ml-0"
                                                            type="text" name="" id="">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered table-xs">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center align-middle px-1 py-1">4.8</th>
                                                                        <th class="text-center align-middle px-1 py-1">4.7</th>
                                                                        <th class="text-center align-middle px-1 py-1">4.6</th>
                                                                        <th class="text-center align-middle px-1 py-1">4.5</th>
                                                                        <th class="text-center align-middle px-1 py-1">4.4</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="text-center align-middle px-1 py-1">
                                                                            <select class="form-control form-control-sm" id=""
                                                                                name="">
                                                                                <option>0</option>
                                                                                <option>1</option>
                                                                                <option>2</option>
                                                                                <option>3</option>
                                                                                <option>4</option>
                                                                                <option>1*</option>
                                                                                <option>2*</option>
                                                                                <option>3*</option>
                                                                                <option>4*</option>
                                                                            </select>
                                                                        </td>
                                                                        <td class="text-center align-middle px-1 py-1">
                                                                            <select class="form-control form-control-sm" id=""
                                                                                name="">
                                                                                <option>0</option>
                                                                                <option>1</option>
                                                                                <option>2</option>
                                                                                <option>3</option>
                                                                                <option>4</option>
                                                                                <option>1*</option>
                                                                                <option>2*</option>
                                                                                <option>3*</option>
                                                                                <option>4*</option>
                                                                            </select>
                                                                        </td>
                                                                        <td class="text-center align-middle px-1 py-1">
                                                                            <select class="form-control form-control-sm" id=""
                                                                                name="">
                                                                                <option>0</option>
                                                                                <option>1</option>
                                                                                <option>2</option>
                                                                                <option>3</option>
                                                                                <option>4</option>
                                                                                <option>1*</option>
                                                                                <option>2*</option>
                                                                                <option>3*</option>
                                                                                <option>4*</option>
                                                                            </select>
                                                                        </td>
                                                                        <td class="text-center align-middle px-1 py-1">
                                                                            <select class="form-control form-control-sm" id=""
                                                                                name="">
                                                                                <option>0</option>
                                                                                <option>1</option>
                                                                                <option>2</option>
                                                                                <option>3</option>
                                                                                <option>4</option>
                                                                                <option>1*</option>
                                                                                <option>2*</option>
                                                                                <option>3*</option>
                                                                                <option>4*</option>
                                                                            </select>
                                                                        </td>
                                                                        <td class="text-center align-middle px-1 py-1">
                                                                            <select class="form-control form-control-sm" id=""
                                                                                name="">
                                                                                <option>0</option>
                                                                                <option>1</option>
                                                                                <option>2</option>
                                                                                <option>3</option>
                                                                                <option>4</option>
                                                                                <option>1*</option>
                                                                                <option>2*</option>
                                                                                <option>3*</option>
                                                                                <option>4*</option>
                                                                            </select>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6 text-center">
                                                        <label
                                                            class="d-inline col-md-3 mb-1 font-weight-bolder form-inline mr-0 f-16 pr-0">GRUPO
                                                            III=</label>
                                                        <input
                                                            class="form-control form-control-sm d-inline col-md-2 mb-1 form-inline ml-0"
                                                            type="text" name="" id="">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered table-xs">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center align-middle px-1 py-1">2.4</th>
                                                                        <th class="text-center align-middle px-1 py-1">2.5</th>
                                                                        <th class="text-center align-middle px-1 py-1">2.6</th>
                                                                        <th class="text-center align-middle px-1 py-1">2.7</th>
                                                                        <th class="text-center align-middle px-1 py-1">2.8</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="text-center align-middle px-1 py-1">
                                                                            <select class="form-control form-control-sm" id=""
                                                                                name="">
                                                                                <option>0</option>
                                                                                <option>1</option>
                                                                                <option>2</option>
                                                                                <option>3</option>
                                                                                <option>4</option>
                                                                                <option>1*</option>
                                                                                <option>2*</option>
                                                                                <option>3*</option>
                                                                                <option>4*</option>
                                                                            </select>
                                                                        </td>
                                                                        <td class="text-center align-middle px-1 py-1">
                                                                            <select class="form-control form-control-sm" id=""
                                                                                name="">
                                                                                <option>0</option>
                                                                                <option>1</option>
                                                                                <option>2</option>
                                                                                <option>3</option>
                                                                                <option>4</option>
                                                                                <option>1*</option>
                                                                                <option>2*</option>
                                                                                <option>3*</option>
                                                                                <option>4*</option>
                                                                            </select>
                                                                        </td>
                                                                        <td class="text-center align-middle px-1 py-1">
                                                                            <select class="form-control form-control-sm" id=""
                                                                                name="">
                                                                                <option>0</option>
                                                                                <option>1</option>
                                                                                <option>2</option>
                                                                                <option>3</option>
                                                                                <option>4</option>
                                                                                <option>1*</option>
                                                                                <option>2*</option>
                                                                                <option>3*</option>
                                                                                <option>4*</option>
                                                                            </select>
                                                                        </td>
                                                                        <td class="text-center align-middle px-1 py-1">
                                                                            <select class="form-control form-control-sm" id=""
                                                                                name="">
                                                                                <option>0</option>
                                                                                <option>1</option>
                                                                                <option>2</option>
                                                                                <option>3</option>
                                                                                <option>4</option>
                                                                                <option>1*</option>
                                                                                <option>2*</option>
                                                                                <option>3*</option>
                                                                                <option>4*</option>
                                                                            </select>
                                                                        </td>
                                                                        <td class="text-center align-middle px-1 py-1">
                                                                            <select class="form-control form-control-sm" id=""
                                                                                name="">
                                                                                <option>0</option>
                                                                                <option>1</option>
                                                                                <option>2</option>
                                                                                <option>3</option>
                                                                                <option>4</option>
                                                                                <option>1*</option>
                                                                                <option>2*</option>
                                                                                <option>3*</option>
                                                                                <option>4*</option>
                                                                            </select>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6 text-center">
                                                        <label
                                                            class="d-inline col-md-3 mb-1 font-weight-bolder form-inline mr-0 f-16 pr-0">GRUPO
                                                            V=</label>
                                                        <input
                                                            class="form-control form-control-sm d-inline col-md-2 mb-1 form-inline ml-0"
                                                            type="text" name="" id="">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered table-xs">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center align-middle px-1 py-1">4.3</th>
                                                                        <th class="text-center align-middle px-1 py-1">4.2</th>
                                                                        <th class="text-center align-middle px-1 py-1">4.1</th>
                                                                        <th class="text-center align-middle px-1 py-1">3.1</th>
                                                                        <th class="text-center align-middle px-1 py-1">3.2</th>
                                                                        <th class="text-center align-middle px-1 py-1">3.3</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="text-center align-middle px-1 py-1">
                                                                            <select class="form-control form-control-sm" id=""
                                                                                name="">
                                                                                <option>0</option>
                                                                                <option>1</option>
                                                                                <option>2</option>
                                                                                <option>3</option>
                                                                                <option>4</option>
                                                                                <option>1*</option>
                                                                                <option>2*</option>
                                                                                <option>3*</option>
                                                                                <option>4*</option>
                                                                            </select>
                                                                        </td>
                                                                        <td class="text-center align-middle px-1 py-1">
                                                                            <select class="form-control form-control-sm" id=""
                                                                                name="">
                                                                                <option>0</option>
                                                                                <option>1</option>
                                                                                <option>2</option>
                                                                                <option>3</option>
                                                                                <option>4</option>
                                                                                <option>1*</option>
                                                                                <option>2*</option>
                                                                                <option>3*</option>
                                                                                <option>4*</option>
                                                                            </select>
                                                                        </td>
                                                                        <td class="text-center align-middle px-1 py-1">
                                                                            <select class="form-control form-control-sm" id=""
                                                                                name="">
                                                                                <option>0</option>
                                                                                <option>1</option>
                                                                                <option>2</option>
                                                                                <option>3</option>
                                                                                <option>4</option>
                                                                                <option>1*</option>
                                                                                <option>2*</option>
                                                                                <option>3*</option>
                                                                                <option>4*</option>
                                                                            </select>
                                                                        </td>
                                                                        <td class="text-center align-middle px-1 py-1">
                                                                            <select class="form-control form-control-sm" id=""
                                                                                name="">
                                                                                <option>0</option>
                                                                                <option>1</option>
                                                                                <option>2</option>
                                                                                <option>3</option>
                                                                                <option>4</option>
                                                                                <option>1*</option>
                                                                                <option>2*</option>
                                                                                <option>3*</option>
                                                                                <option>4*</option>
                                                                            </select>
                                                                        </td>
                                                                        <td class="text-center align-middle px-1 py-1">
                                                                            <select class="form-control form-control-sm" id=""
                                                                                name="">
                                                                                <option>0</option>
                                                                                <option>1</option>
                                                                                <option>2</option>
                                                                                <option>3</option>
                                                                                <option>4</option>
                                                                                <option>1*</option>
                                                                                <option>2*</option>
                                                                                <option>3*</option>
                                                                                <option>4*</option>
                                                                            </select>
                                                                        </td>
                                                                        <td class="text-center align-middle px-1 py-1">
                                                                            <select class="form-control form-control-sm" id=""
                                                                                name="">
                                                                                <option>0</option>
                                                                                <option>1</option>
                                                                                <option>2</option>
                                                                                <option>3</option>
                                                                                <option>4</option>
                                                                                <option>1*</option>
                                                                                <option>2*</option>
                                                                                <option>3*</option>
                                                                                <option>4*</option>
                                                                            </select>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6 text-center">
                                                        <label
                                                            class="d-inline col-md-3 mb-1 font-weight-bolder form-inline mr-0 f-16 pr-0">GRUPO
                                                            VI=</label>
                                                        <input
                                                            class="form-control form-control-sm d-inline col-md-2 mb-1 form-inline ml-0"
                                                            type="text" name="" id="">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered table-xs">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center align-middle px-1 py-1">3.4</th>
                                                                        <th class="text-center align-middle px-1 py-1">3.5</th>
                                                                        <th class="text-center align-middle px-1 py-1">3.6</th>
                                                                        <th class="text-center align-middle px-1 py-1">3.7</th>
                                                                        <th class="text-center align-middle px-1 py-1">3.8</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="text-center align-middle px-1 py-1">
                                                                            <select class="form-control form-control-sm" id=""
                                                                                name="">
                                                                                <option>0</option>
                                                                                <option>1</option>
                                                                                <option>2</option>
                                                                                <option>3</option>
                                                                                <option>4</option>
                                                                                <option>1*</option>
                                                                                <option>2*</option>
                                                                                <option>3*</option>
                                                                                <option>4*</option>
                                                                            </select>
                                                                        </td>
                                                                        <td class="text-center align-middle px-1 py-1">
                                                                            <select class="form-control form-control-sm" id=""
                                                                                name="">
                                                                                <option>0</option>
                                                                                <option>1</option>
                                                                                <option>2</option>
                                                                                <option>3</option>
                                                                                <option>4</option>
                                                                                <option>1*</option>
                                                                                <option>2*</option>
                                                                                <option>3*</option>
                                                                                <option>4*</option>
                                                                            </select>
                                                                        </td>
                                                                        <td class="text-center align-middle px-1 py-1">
                                                                            <select class="form-control form-control-sm" id=""
                                                                                name="">
                                                                                <option>0</option>
                                                                                <option>1</option>
                                                                                <option>2</option>
                                                                                <option>3</option>
                                                                                <option>4</option>
                                                                                <option>1*</option>
                                                                                <option>2*</option>
                                                                                <option>3*</option>
                                                                                <option>4*</option>
                                                                            </select>
                                                                        </td>
                                                                        <td class="text-center align-middle px-1 py-1">
                                                                            <select class="form-control form-control-sm" id=""
                                                                                name="">
                                                                                <option>0</option>
                                                                                <option>1</option>
                                                                                <option>2</option>
                                                                                <option>3</option>
                                                                                <option>4</option>
                                                                                <option>1*</option>
                                                                                <option>2*</option>
                                                                                <option>3*</option>
                                                                                <option>4*</option>
                                                                            </select>
                                                                        </td>
                                                                        <td class="text-center align-middle px-1 py-1">
                                                                            <select class="form-control form-control-sm" id=""
                                                                                name="">
                                                                                <option>0</option>
                                                                                <option>1</option>
                                                                                <option>2</option>
                                                                                <option>3</option>
                                                                                <option>4</option>
                                                                                <option>1*</option>
                                                                                <option>2*</option>
                                                                                <option>3*</option>
                                                                                <option>4*</option>
                                                                            </select>
                                                                        </td>
                                                                    </tr>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label">PSR</label>
                                                        <input type="text" class="form-control form-control-sm" name="pct_t"
                                                            id="pcr_t">
                                                    </div>
                                                    <div class="form-group col-md-4" style="text-align:center" id="form_0">
                                                        {{--  <a href="periodontograma/perio.php" target="_blank"><button type="button"  --}}
                                                        <a href="{{ route('periodontograma.ver') }}" target="_blank"><button type="button"
                                                                class="btn btn-primary btn-sm btn-block"> Abrir
                                                                periodontograma</button></a>
                                                    </div>
                                                    <div class="form-group col-md-4" style="text-align:center" id="form_derperi">
                                                        <button type="button" class="btn btn-success btn-sm btn-block"
                                                            onclick="d_periodoncista1();"><i class="feather icon-file-plus"></i>
                                                            Derivar a Periodoncista</button>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="form-row">
                                                    <div class="form-group col-md-12 text-center mx-auto">
                                                        <button type="reset" class="btn btn-danger">Limpiar formulario</button>
                                                        <button type="submit" class="btn btn-info">Guardar</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="evaluacion_adulto" role="tabpanel" aria-labelledby="evaluacion_adulto_tab">
                            <div class="row bg-white shadow-sm rounded mx-1">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12 mt-3 mb-0">
                                            <h6 class="f-16 text-c-blue">Evaluación Adulto</h6>
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-3 px-1 py-1">
                                            <button type="button" class="btn btn-info btn-sm btn-block"
                                                onclick="maxilar_superior()";><i class="feather icon-file-plus"></i> Maxilar
                                                superior</button>
                                        </div>
                                        <div class="col-md-3 px-1 py-1">
                                            <button type="button" class="btn btn-info btn-sm btn-block"
                                                onclick="maxilar_inferior()";><i class="feather icon-file-plus"></i> Maxilar
                                                inferior</button>
                                        </div>
                                        <div class="col-md-3 px-1 py-1">
                                            <button type="button" class="btn btn-info btn-sm btn-block"
                                                onclick="boca_completa()";><i class="feather icon-file-plus"></i> Boca
                                                Completa</button>
                                        </div>
                                        <div class="col-md-3 px-1 py-1">
                                            <button type="button" class="btn btn-primary btn-sm btn-block"
                                                onclick="prest_lab();"><i class="feather icon-file-plus"></i>Solicitud en
                                                laboratorio</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6 class="text-center text-c-blue mb-2">GRUPO 1</h6>
                                            <div class="table-responsive">
                                                <form id="form_6_5" action="{{ route('dental.registrar_odontograma') }}"
                                                    method="POST">

                                                    @csrf
                                                    <input type="hidden" name="ficha_id_atencion_dental_odon1"
                                                        id="ficha_id_atencion_dental_odon1"{{--
                                                        value=" @if ($ficha != null) {{ $ficha->id }} @endif">--}}
                                                    <input type="hidden" name="paciente_atencion_dental_odon1"
                                                        id="paciente_atencion_dental_odon1" value="{{ $paciente->id }}">


                                                    <table class="table table-bordered table-xs" style="width:100%;">
                                                        <tr class="bg-encabezado">
                                                            <th class="text-center align-middle">PIEZA</th>
                                                            <th class="text-center align-middle">CARA</th>
                                                            <th class="text-center align-middle">CUADRANTE</th>
                                                        </tr>
                                                        <tr>
                                                            <td class="px-1 py-1 text-center align-middle">
                                                                <select id="pieza_odontograma_1" name="pieza_odontograma_1"
                                                                    class="form-control form-control-sm">
                                                                    <option value="1-8"> 1-8 </option>
                                                                    <option value="1-7"> 1-7 </option>
                                                                    <option value="1-6"> 1-6 </option>
                                                                    <option value="1-5"> 1-5 </option>
                                                                    <option value="1-4"> 1-4</option>
                                                                </select>
                                                                <div id="t53">
                                                                    <img src="{{ asset('images/dental/i/dientes/d18.png') }}"
                                                                        class="wid-40 py-1">
                                                                </div>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <table class="table-borderless" style="align-content:center">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="padding-caras"></td>
                                                                            <td class="padding-caras">
                                                                                <div class="circulo-v" id="caraV1"
                                                                                    onclick="cambiar_color(1)">
                                                                                    V
                                                                                </div>

                                                                            </td>
                                                                            <td class="padding-caras"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="padding-caras">
                                                                                <div class="circulo-d" id="caraD1"
                                                                                    onclick="cambiar_colorD(1)">D</div>
                                                                            </td>
                                                                            <td class="padding-caras">
                                                                                <div class="circulo-o" id="caraO1"
                                                                                    onclick="cambiar_colorO(1)">O</div>

                                                                            </td>
                                                                            <td class="padding-caras">
                                                                                <div class="circulo-m" id="caraM1"
                                                                                    onclick="cambiar_colorM(1)">M</div>

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="padding-caras"></td>
                                                                            <td class="padding-caras">
                                                                                <div class="circulo-p" id="caraP1"
                                                                                    onclick="cambiar_colorP(1)">P</div>

                                                                            </td>
                                                                            <td class="padding-caras"></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                            <td class="text-center align-middle">
                                                                <div id="t53" style="width:100%;">
                                                                    <img src="{{ asset('images/dientes/cuadrante.png') }}"
                                                                        class="wid-100">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="px-1 py-1"><button type="button"
                                                                    class="btn btn-block btn-sm btn-outline-primary"
                                                                    data-toggle="popover" title="Historia"
                                                                    data-content="cargar historia del diente">Ver
                                                                    historia</button></td>
                                                            <td class="px-1 py-1">
                                                                <select class="form-control form-control-sm" id="diagnostico_1"
                                                                    name="diagnostico_1">
                                                                    <option value="0">Diagnóstico</option>
                                                                    <option value="1">Caries</option>
                                                                    <option value="2">Fractura</option>
                                                                    <option value="3">periodontopatia</option>
                                                                    <option value="4">profilaxis</option>
                                                                    <option value="5">Restos radiculares</option>
                                                                </select>
                                                            </td>
                                                            <td class="px-2 py-2">
                                                                <select class="form-control form-control-sm" id="tratamiento_1"
                                                                    name="tratamiento_1">
                                                                    <option>Tratamiento</option>
                                                                    <optgroup label="Tratamiento Pediátrico">
                                                                        <option value="dp_1">Examen inicial, plan de tratamiento y
                                                                            presupuesto
                                                                        </option>
                                                                        <option value="dp_2">Instrucción y control de higiene y
                                                                            profilaxis
                                                                        </option>
                                                                        <option value="dp_3">Aplicación flúor gel</option>
                                                                        <option value="dp_4">Aplicación flúor barniz</option>
                                                                        <option value="dp_5">Destartraje (por grupo, máximo dos)
                                                                        </option>
                                                                        <option value="dp_6">Endodoncia pieza permanente</option>
                                                                        <option value="dp_7">Exodoncia simple diente temporal
                                                                        </option>
                                                                        <option value="dp_8">Mantenedor de espacio fijo o removible
                                                                            /valor no
                                                                            incluye laboratorio</option>
                                                                        <option value="dp_9">Obturación v. ionómero pieza temporal
                                                                            anterior y
                                                                            posterior simple</option>
                                                                        <option value="dp_10">Obturación v. ionómero pieza temporal
                                                                            anterior y
                                                                            posterior compuesto</option>
                                                                        <option value="dp_11">Obturación resina fotocurado composite
                                                                            pieza
                                                                            permanente anterior y posterior simple</option>
                                                                        <option value="dp_12">Obturación resina fotocurado composite
                                                                            pieza
                                                                            permanente anterior y posterior compuesto</option>
                                                                        <option value="dp_13">Obturación resina fotocurado,
                                                                            reconstitución
                                                                        </option>
                                                                        <option value="dp_14">Obturación resina fotocurado carillas
                                                                            anteriores
                                                                        </option>
                                                                        <option value="dp_15">Pulpotomía</option>
                                                                        <option value="dp_16">Pulpectomía anterior</option>
                                                                        <option value="dp_17">Pulpectomía posterior</option>
                                                                        <option value="dp_18">Recubrimiento pulpar directo</option>
                                                                        <option value="dp_19">Recubrimiento pulpar indirecto
                                                                        </option>
                                                                        <option value="dp_20">Sellantes pieza temporal y permanente
                                                                        </option>
                                                                        <option value="dp_21">Sesión de adaptación</option>
                                                                        <option value="dp_22">Trat. de conducto en pieza temporal
                                                                            anterior
                                                                        </option>
                                                                        <option value="dp_23">Tratamiento de conducto en pieza
                                                                            temporal
                                                                            posterior</option>
                                                                        <option value="dp_24">Tratamiento diente gangrenado</option>
                                                                        <option value="dp_25">Urgencia odontopediátrica</option>
                                                                    </optgroup>
                                                                </select>
                                                                <input type="hidden" name="odontograma1" id="odontograma1"
                                                                    value="1">
                                                                <input type="hidden" name="caraM_check_1" id="caraM_check_1"
                                                                    value="0">
                                                                <input type="hidden" name="caraO_check_1" id="caraO_check_1"
                                                                    value="0">
                                                                <input type="hidden" name="caraD_check_1" id="caraD_check_1"
                                                                    value="0">
                                                                <input type="hidden" name="carav_check_1" id="carav_check_1"
                                                                    value="0">
                                                                <input type="hidden" name="caraP_check_1" id="caraP_check_1"
                                                                    value="0">
                                                                <button type="submit" class="btn btn-info btn-sm">
                                                                    Registrar
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </form>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <h6 class="text-center text-c-blue mb-2">GRUPO 2</h6>
                                            <div class="table-responsive">
                                                <form id="form_5_5" action="{{ route('dental.registrar_odontograma') }}"
                                                    method="POST">

                                                    @csrf
                                                    <input type="hidden" name="ficha_id_atencion_dental_odon2"
                                                        id="ficha_id_atencion_dental_odon2"
                                                       {{--   value=" @if ($ficha != null) {{ $ficha->id }} @endif">--}}
                                                    <input type="hidden" name="paciente_atencion_dental_odon2"
                                                        id="paciente_atencion_dental_odon2" value="{{ $paciente->id }}">
                                                    <table class="table table-bordered table-xs" style="width:100%;">
                                                        <tr class="bg-encabezado">
                                                            <th class="text-center align-middle">PIEZA</th>
                                                            <th class="text-center align-middle">CARA</th>
                                                            <th class="text-center align-middle">CUADRANTE</th>
                                                        </tr>
                                                        <tr>
                                                            <td class="px-1 py-1 text-center align-middle">
                                                                <select id="pieza_odontograma_2" name="pieza_odontograma_2"
                                                                    class="form-control form-control-sm">
                                                                    <option value="1-3"> 1-3</option>
                                                                    <option value="1-2"> 1-2</option>
                                                                    <option value="1-1"> 1-1</option>
                                                                    <option value="2-1"> 2-1</option>
                                                                    <option value="2-2"> 2-2</option>
                                                                    <option value="2-3"> 2-3</option>
                                                                </select>
                                                                <div id="t53">
                                                                    <img src="{{ asset('images/dental/i/dientes/d21.png') }}"
                                                                        class="wid-40 py-1">
                                                                </div>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <table class="table-borderless" style="align-content:center">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="padding-caras"></td>
                                                                            <td class="padding-caras">
                                                                                <div class="circulo-v" id="caraV2"
                                                                                    onclick="cambiar_color(2)">V</div>
                                                                            </td>
                                                                            <td class="padding-caras"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="padding-caras">
                                                                                <div class="circulo-d" id="caraD2"
                                                                                    onclick="cambiar_colorD(2)">D</div>
                                                                            </td>
                                                                            <td class="padding-caras">
                                                                                <div class="circulo-o" id="caraO2"
                                                                                    onclick="cambiar_colorO(2)">O</div>
                                                                            </td>
                                                                            <td class="padding-caras">
                                                                                <div class="circulo-m" id="caraM2"
                                                                                    onclick="cambiar_colorM(2)">M</div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="padding-caras"></td>
                                                                            <td class="padding-caras">
                                                                                <div class="circulo-p" id="caraP2"
                                                                                    onclick="cambiar_colorP(2)">P</div>
                                                                            </td>
                                                                            <td class="padding-caras"></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                            <td class="text-center align-middle">
                                                                <div id="t53" style="width:100%;">
                                                                    <img src="{{ asset('images/dientes/cuadrante.png') }}"
                                                                        class="wid-100">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="px-1 py-1"><button type="button"
                                                                    class="btn btn-block btn-sm btn-outline-primary"
                                                                    data-toggle="popover" title="Historia"
                                                                    data-content="cargar historia del diente">Ver
                                                                    historia</button></td>
                                                            <td class="px-1 py-1">
                                                                <select class="form-control form-control-sm" id="diagnostico_2"
                                                                    name="diagnostico_2">
                                                                    <option value="0">Diagnóstico</option>
                                                                    <option value="1">Caries</option>
                                                                    <option value="2">Fractura</option>
                                                                    <option value="3">periodontopatia</option>
                                                                    <option value="4">profilaxis</option>
                                                                    <option value="5">Restos radiculares</option>
                                                                </select>
                                                            </td>
                                                            <td class="px-1 py-1">
                                                                <select class="form-control form-control-sm" id="tratamiento_2"
                                                                    name="tratamiento_2">
                                                                    <option>Tratamiento</option>
                                                                    <optgroup label="Tratamiento Pediátrico">
                                                                        <option value="dp_1">Examen inicial, plan de tratamiento y
                                                                            presupuesto
                                                                        </option>
                                                                        <option value="dp_2">Instrucción y control de higiene y
                                                                            profilaxis
                                                                        </option>
                                                                        <option value="dp_3">Aplicación flúor gel</option>
                                                                        <option value="dp_4">Aplicación flúor barniz</option>
                                                                        <option value="dp_5">Destartraje (por grupo, máximo dos)
                                                                        </option>
                                                                        <option value="dp_6">Endodoncia pieza permanente</option>
                                                                        <option value="dp_7">Exodoncia simple diente temporal
                                                                        </option>
                                                                        <option value="dp_8">Mantenedor de espacio fijo o removible
                                                                            /valor no
                                                                            incluye laboratorio</option>
                                                                        <option value="dp_9">Obturación v. ionómero pieza temporal
                                                                            anterior y
                                                                            posterior simple</option>
                                                                        <option value="dp_10">Obturación v. ionómero pieza temporal
                                                                            anterior y
                                                                            posterior compuesto</option>
                                                                        <option value="dp_11">Obturación resina fotocurado composite
                                                                            pieza
                                                                            permanente anterior y posterior simple</option>
                                                                        <option value="dp_12">Obturación resina fotocurado composite
                                                                            pieza
                                                                            permanente anterior y posterior compuesto</option>
                                                                        <option value="dp_13">Obturación resina fotocurado,
                                                                            reconstitución
                                                                        </option>
                                                                        <option value="dp_14">Obturación resina fotocurado carillas
                                                                            anteriores
                                                                        </option>
                                                                        <option value="dp_15">Pulpotomía</option>
                                                                        <option value="dp_16">Pulpectomía anterior</option>
                                                                        <option value="dp_17">Pulpectomía posterior</option>
                                                                        <option value="dp_18">Recubrimiento pulpar directo</option>
                                                                        <option value="dp_19">Recubrimiento pulpar indirecto
                                                                        </option>
                                                                        <option value="dp_20">Sellantes pieza temporal y permanente
                                                                        </option>
                                                                        <option value="dp_21">Sesión de adaptación</option>
                                                                        <option value="dp_22">Trat. de conducto en pieza temporal
                                                                            anterior
                                                                        </option>
                                                                        <option value="dp_23">Tratamiento de conducto en pieza
                                                                            temporal
                                                                            posterior</option>
                                                                        <option value="dp_24">Tratamiento diente gangrenado</option>
                                                                        <option value="dp_25">Urgencia odontopediátrica</option>
                                                                    </optgroup>
                                                                </select>
                                                                <input type="hidden" name="odontograma2" id="odontograma2"
                                                                    value="1">
                                                                <input type="hidden" name="caraM_check_2" id="caraM_check_2"
                                                                    value="0">
                                                                <input type="hidden" name="caraO_check_2" id="caraO_check_2"
                                                                    value="0">
                                                                <input type="hidden" name="caraD_check_2" id="caraD_check_2"
                                                                    value="0">
                                                                <input type="hidden" name="carav_check_2" id="carav_check_2"
                                                                    value="0">
                                                                <input type="hidden" name="caraP_check_2" id="caraP_check_2"
                                                                    value="0">
                                                                <button type="submit" class="btn btn-info btn-sm">
                                                                    Registrar
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6 class="text-center text-c-blue mb-2">GRUPO 3</h6>
                                            <div class="table-responsive">
                                                <form id="form_7_5" action="{{ route('dental.registrar_odontograma') }}"
                                                    method="POST">

                                                    @csrf
                                                    <input type="hidden" name="ficha_id_atencion_dental_odon3"
                                                        id="ficha_id_atencion_dental_odon3"
                                                        {{--   value=" @if ($ficha != null) {{ $ficha->id }} @endif">--}}

                                                    <input type="hidden" name="paciente_atencion_dental_odon3"
                                                        id="paciente_atencion_dental_odon3" value="{{ $paciente->id }}">
                                                    <table class="table table-bordered table-xs" style="width:100%;">
                                                        <tr class="bg-encabezado">
                                                            <th class="text-center align-middle">PIEZA</th>
                                                            <th class="text-center align-middle">CARA</th>
                                                            <th class="text-center align-middle">CUADRANTE</th>
                                                        </tr>
                                                        <tr>
                                                            <td class="px-1 py-1 text-center align-middle">
                                                                <select id="pieza_odontograma_3" name="pieza_odontograma_3"
                                                                    class="form-control form-control-sm">
                                                                    <option value="2-4"> 2-4 </option>
                                                                    <option value="2-5"> 2-5 </option>
                                                                    <option value="2-6"> 2-6 </option>
                                                                    <option value="2-7"> 2-7 </option>
                                                                    <option value="2-8"> 2-8 </option>
                                                                </select>
                                                                <div id="t53">
                                                                    <img src="{{ asset('images/dental/i/dientes/d26.png') }}"
                                                                        class="wid-40 py-1">
                                                                </div>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <table class="table-borderless" style="align-content:center">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="padding-caras"></td>
                                                                            <td class="padding-caras">
                                                                                <div class="circulo-v" id="caraV3"
                                                                                    onclick="cambiar_color(3)">V</div>
                                                                            </td>
                                                                            <td class="padding-caras"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="padding-caras">
                                                                                <div class="circulo-d" id="caraD3"
                                                                                    onclick="cambiar_colorD(3)">D</div>
                                                                            </td>
                                                                            <td class="padding-caras">
                                                                                <div class="circulo-o" id="caraO3"
                                                                                    onclick="cambiar_colorO(3)">O</div>
                                                                            </td>
                                                                            <td class="padding-caras">
                                                                                <div class="circulo-m" id="caraM3"
                                                                                    onclick="cambiar_colorM(3)">M</div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="padding-caras"></td>
                                                                            <td class="padding-caras">
                                                                                <div class="circulo-p" id="caraP3"
                                                                                    onclick="cambiar_colorP(3)">P</div>
                                                                            </td>
                                                                            <td class="padding-caras"></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                            <td class="text-center align-middle">
                                                                <div id="t53" style="width:100%;">
                                                                    <img src="{{ asset('images/dientes/cuadrante.png') }}"
                                                                        class="wid-100">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="px-1 py-1"><button type="button"
                                                                    class="btn btn-block btn-sm btn-outline-primary"
                                                                    data-toggle="popover" title="Historia"
                                                                    data-content="cargar historia del diente">Ver
                                                                    historia</button></td>
                                                            <td class="px-1 py-1">
                                                                <select class="form-control form-control-sm" id="diagnostico_3"
                                                                    name="diagnostico_3">
                                                                    <option value="0">Diagnóstico</option>
                                                                    <option value="01">Caries</option>
                                                                    <option value="02">Fractura</option>
                                                                    <option value="03">Periodontopatia</option>
                                                                    <option value="04">Profilaxis</option>
                                                                    <option value="05">Restos radiculares</option>
                                                                </select>
                                                            </td>
                                                            <td class="px-1 py-1">
                                                                <select class="form-control form-control-sm" id="tratamiento_3"
                                                                    name="tratamiento_3">
                                                                    <option>Tratamiento</option>
                                                                    <optgroup label="Tratamiento Pediátrico">
                                                                        <option value="dp_1">Examen inicial, plan de tratamiento y
                                                                            presupuesto
                                                                        </option>
                                                                        <option value="dp_2">Instrucción y control de higiene y
                                                                            profilaxis
                                                                        </option>
                                                                        <option value="dp_3">Aplicación flúor gel</option>
                                                                        <option value="dp_4">Aplicación flúor barniz</option>
                                                                        <option value="dp_5">Destartraje (por grupo, máximo dos)
                                                                        </option>
                                                                        <option value="dp_6">Endodoncia pieza permanente</option>
                                                                        <option value="dp_7">Exodoncia simple diente temporal
                                                                        </option>
                                                                        <option value="dp_8">Mantenedor de espacio fijo o removible
                                                                            /valor no
                                                                            incluye laboratorio</option>
                                                                        <option value="dp_9">Obturación v. ionómero pieza temporal
                                                                            anterior y
                                                                            posterior simple</option>
                                                                        <option value="dp_10">Obturación v. ionómero pieza temporal
                                                                            anterior y
                                                                            posterior compuesto</option>
                                                                        <option value="dp_11">Obturación resina fotocurado composite
                                                                            pieza
                                                                            permanente anterior y posterior simple</option>
                                                                        <option value="dp_12">Obturación resina fotocurado composite
                                                                            pieza
                                                                            permanente anterior y posterior compuesto</option>
                                                                        <option value="dp_13">Obturación resina fotocurado,
                                                                            reconstitución
                                                                        </option>
                                                                        <option value="dp_14">Obturación resina fotocurado carillas
                                                                            anteriores
                                                                        </option>
                                                                        <option value="dp_15">Pulpotomía</option>
                                                                        <option value="dp_16">Pulpectomía anterior</option>
                                                                        <option value="dp_17">Pulpectomía posterior</option>
                                                                        <option value="dp_18">Recubrimiento pulpar directo</option>
                                                                        <option value="dp_19">Recubrimiento pulpar indirecto
                                                                        </option>
                                                                        <option value="dp_20">Sellantes pieza temporal y permanente
                                                                        </option>
                                                                        <option value="dp_21">Sesión de adaptación</option>
                                                                        <option value="dp_22">Trat. de conducto en pieza temporal
                                                                            anterior
                                                                        </option>
                                                                        <option value="dp_23">Tratamiento de conducto en pieza
                                                                            temporal
                                                                            posterior</option>
                                                                        <option value="dp_24">Tratamiento diente gangrenado</option>
                                                                        <option value="dp_25">Urgencia odontopediátrica</option>
                                                                    </optgroup>
                                                                </select>
                                                                <input type="hidden" name="odontograma3" id="odontograma3"
                                                                    value="1">
                                                                <input type="hidden" name="caraM_check_3" id="caraM_check_3"
                                                                    value="0">
                                                                <input type="hidden" name="caraO_check_3" id="caraO_check_3"
                                                                    value="0">
                                                                <input type="hidden" name="caraD_check_3" id="caraD_check_3"
                                                                    value="0">
                                                                <input type="hidden" name="carav_check_3" id="carav_check_3"
                                                                    value="0">
                                                                <input type="hidden" name="caraP_check_3" id="caraP_check_3"
                                                                    value="0">
                                                                <button type="submit" class="btn btn-info btn-sm">
                                                                    Registrar
                                                                </button>

                                                            </td>
                                                        </tr>
                                                    </table>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h6 class="text-center text-c-blue mb-2">GRUPO 4</h6>
                                            <div class="table-responsive">
                                                <form id="form_6_5" action="{{ route('dental.registrar_odontograma') }}"
                                                    method="POST">

                                                    @csrf
                                                    <input type="hidden" name="ficha_id_atencion_dental_odon4"
                                                        id="ficha_id_atencion_dental_odon4"
                                                        {{--   value=" @if ($ficha != null) {{ $ficha->id }} @endif">--}}

                                                    <input type="hidden" name="paciente_atencion_dental_odon4"
                                                        id="paciente_atencion_dental_odon4" value="{{ $paciente->id }}">
                                                    <table class="table table-bordered table-xs" style="width:100%;">
                                                        <tr class="bg-encabezado">
                                                            <th class="text-center align-middle">PIEZA</th>
                                                            <th class="text-center align-middle">CARA</th>
                                                            <th class="text-center align-middle">CUADRANTE</th>
                                                        </tr>
                                                        <tr>
                                                            <td class="px-1 py-1 text-center align-middle">
                                                                <select id="pieza_odontograma_4" name="pieza_odontograma_4"
                                                                    class="form-control form-control-sm">
                                                                    <option value="4-8"> 4-8 </option>
                                                                    <option value="4-7"> 4-7 </option>
                                                                    <option value="4-7"> 4-7 </option>
                                                                    <option value="4-5"> 4-5 </option>
                                                                    <option value="4-4"> 4-4</option>
                                                                </select>
                                                                <div id="t53">
                                                                    <img src="{{ asset('images/dental/i/dientes/d47.png') }}"
                                                                        class="wid-40 py-1">
                                                                </div>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <table class="table-borderless" style="align-content:center">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="padding-caras"></td>
                                                                            <td class="padding-caras">
                                                                                <div class="circulo-v" id="caraV4"
                                                                                    onclick="cambiar_color(4)">V</div>
                                                                            </td>
                                                                            <td class="padding-caras"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="padding-caras">
                                                                                <div class="circulo-d" id="caraD4"
                                                                                    onclick="cambiar_colorD(4)">D</div>
                                                                            </td>
                                                                            <td class="padding-caras">
                                                                                <div class="circulo-o" id="caraO4"
                                                                                    onclick="cambiar_colorO(4)">O</div>
                                                                            </td>
                                                                            <td class="padding-caras">
                                                                                <div class="circulo-m" id="caraM4"
                                                                                    onclick="cambiar_colorM(4)">M</div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="padding-caras"></td>
                                                                            <td class="padding-caras">
                                                                                <div class="circulo-p" id="caraP4"
                                                                                    onclick="cambiar_colorP(4)">P</div>
                                                                            </td>
                                                                            <td class="padding-caras"></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                            <td class="text-center align-middle">
                                                                <div id="t53" style="width:100%;">
                                                                    <img src="{{ asset('images/dientes/cuadrante.png') }}"
                                                                        class="wid-100">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="px-1 py-1"><button type="button"
                                                                    class="btn btn-block btn-sm btn-outline-primary"
                                                                    data-toggle="popover" title="Historia"
                                                                    data-content="cargar historia del diente">Ver
                                                                    historia</button></td>
                                                            <td class="px-1 py-1">
                                                                <select class="form-control form-control-sm" id="diagnostico_4"
                                                                    name="diagnostico_4">
                                                                    <option value="0">Diagnóstico</option>
                                                                    <option value="01">Caries</option>
                                                                    <option value="02">Fractura</option>
                                                                    <option value="03">periodontopatia</option>
                                                                    <option value="04">profilaxis</option>
                                                                    <option value="05">Restos radiculares</option>
                                                                </select>
                                                            </td>
                                                            <td class="px-1 py-1">
                                                                <select class="form-control form-control-sm" id="tratamiento_4"
                                                                    name="tratamiento_4">
                                                                    <option>Tratamiento</option>
                                                                    <optgroup label="Tratamiento Pediátrico">
                                                                        <option value="dp_1">Examen inicial, plan de tratamiento y
                                                                            presupuesto
                                                                        </option>
                                                                        <option value="dp_2">Instrucción y control de higiene y
                                                                            profilaxis
                                                                        </option>
                                                                        <option value="dp_3">Aplicación flúor gel</option>
                                                                        <option value="dp_4">Aplicación flúor barniz</option>
                                                                        <option value="dp_5">Destartraje (por grupo, máximo dos)
                                                                        </option>
                                                                        <option value="dp_6">Endodoncia pieza permanente</option>
                                                                        <option value="dp_7">Exodoncia simple diente temporal
                                                                        </option>
                                                                        <option value="dp_8">Mantenedor de espacio fijo o removible
                                                                            /valor no
                                                                            incluye laboratorio</option>
                                                                        <option value="dp_9">Obturación v. ionómero pieza temporal
                                                                            anterior y
                                                                            posterior simple</option>
                                                                        <option value="dp_10">Obturación v. ionómero pieza temporal
                                                                            anterior y
                                                                            posterior compuesto</option>
                                                                        <option value="dp_11">Obturación resina fotocurado composite
                                                                            pieza
                                                                            permanente anterior y posterior simple</option>
                                                                        <option value="dp_12">Obturación resina fotocurado composite
                                                                            pieza
                                                                            permanente anterior y posterior compuesto</option>
                                                                        <option value="dp_13">Obturación resina fotocurado,
                                                                            reconstitución
                                                                        </option>
                                                                        <option value="dp_14">Obturación resina fotocurado carillas
                                                                            anteriores
                                                                        </option>
                                                                        <option value="dp_15">Pulpotomía</option>
                                                                        <option value="dp_16">Pulpectomía anterior</option>
                                                                        <option value="dp_17">Pulpectomía posterior</option>
                                                                        <option value="dp_18">Recubrimiento pulpar directo</option>
                                                                        <option value="dp_19">Recubrimiento pulpar indirecto
                                                                        </option>
                                                                        <option value="dp_20">Sellantes pieza temporal y permanente
                                                                        </option>
                                                                        <option value="dp_21">Sesión de adaptación</option>
                                                                        <option value="dp_22">Trat. de conducto en pieza temporal
                                                                            anterior
                                                                        </option>
                                                                        <option value="dp_23">Tratamiento de conducto en pieza
                                                                            temporal
                                                                            posterior</option>
                                                                        <option value="dp_24">Tratamiento diente gangrenado</option>
                                                                        <option value="dp_25">Urgencia odontopediátrica</option>
                                                                    </optgroup>
                                                                </select>
                                                                <input type="hidden" name="odontograma4" id="odontograma4"
                                                                    value="1">
                                                                <input type="hidden" name="caraM_check_4" id="caraM_check_4"
                                                                    value="0">
                                                                <input type="hidden" name="caraO_check_4" id="caraO_check_4"
                                                                    value="0">
                                                                <input type="hidden" name="caraD_check_4" id="caraD_check_4"
                                                                    value="0">
                                                                <input type="hidden" name="carav_check_4" id="carav_check_4"
                                                                    value="0">
                                                                <input type="hidden" name="caraP_check_4" id="caraP_check_4"
                                                                    value="0">
                                                                <button type="submit" class="btn btn-info btn-sm">
                                                                    Registrar
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h6 class="text-center text-c-blue mb-2">GRUPO 5</h6>
                                            <div class="table-responsive">
                                                <form id="form_6_5" action="{{ route('dental.registrar_odontograma') }}"
                                                    method="POST">

                                                    @csrf
                                                    <input type="hidden" name="ficha_id_atencion_dental_odon4"
                                                        id="ficha_id_atencion_dental_odon4"
                                                        {{--   value=" @if ($ficha != null) {{ $ficha->id }} @endif">--}}

                                                    <input type="hidden" name="paciente_atencion_dental_odon4"
                                                        id="paciente_atencion_dental_odon4" value="{{ $paciente->id }}">
                                                    <table class="table table-bordered table-xs" style="width:100%;">
                                                        <tr class="bg-encabezado">
                                                            <th class="text-center align-middle">PIEZA</th>
                                                            <th class="text-center align-middle">CARA</th>
                                                            <th class="text-center align-middle">CUADRANTE</th>
                                                        </tr>
                                                        <tr>
                                                            <td class="px-1 py-1 text-center align-middle">
                                                                <select id="pieza_odontograma_4" name="pieza_odontograma_4"
                                                                    class="form-control form-control-sm">
                                                                    <option value="8-5"> 8-5 </option>
                                                                    <option value="8-4"> 8-4 </option>
                                                                    <option value="8-3"> 8-3 </option>
                                                                    <option value="8-2"> 8-2 </option>
                                                                    <option value="8-1"> 8-1</option>
                                                                </select>
                                                                <div id="t53">
                                                                    <img src="{{ asset('images/dental/i/dientes/d31.png') }}"
                                                                        class="wid-40 py-1">
                                                                </div>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <table class="table-borderless" style="align-content:center">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="padding-caras"></td>
                                                                            <td class="padding-caras">
                                                                                <div class="circulo-v" id="caraV4"
                                                                                    onclick="cambiar_color(4)">V</div>
                                                                            </td>
                                                                            <td class="padding-caras"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="padding-caras">
                                                                                <div class="circulo-d" id="caraD4"
                                                                                    onclick="cambiar_colorD(4)">D</div>
                                                                            </td>
                                                                            <td class="padding-caras">
                                                                                <div class="circulo-o" id="caraO4"
                                                                                    onclick="cambiar_colorO(4)">O</div>
                                                                            </td>
                                                                            <td class="padding-caras">
                                                                                <div class="circulo-m" id="caraM4"
                                                                                    onclick="cambiar_colorM(4)">M</div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="padding-caras"></td>
                                                                            <td class="padding-caras">
                                                                                <div class="circulo-p" id="caraP4"
                                                                                    onclick="cambiar_colorP(4)">P</div>
                                                                            </td>
                                                                            <td class="padding-caras"></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                            <td class="text-center align-middle">
                                                                <div id="t53" style="width:100%;">
                                                                    <img src="{{ asset('images/dientes/cuadrante.png') }}"
                                                                        class="wid-100">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="px-1 py-1"><button type="button"
                                                                    class="btn btn-block btn-sm btn-outline-primary"
                                                                    data-toggle="popover" title="Historia"
                                                                    data-content="cargar historia del diente">Ver
                                                                    historia</button></td>
                                                            <td class="px-1 py-1">
                                                                <select class="form-control form-control-sm" id="diagnostico_4"
                                                                    name="diagnostico_4">
                                                                    <option value="0">Diagnóstico</option>
                                                                    <option value="01">Caries</option>
                                                                    <option value="02">Fractura</option>
                                                                    <option value="03">periodontopatia</option>
                                                                    <option value="04">profilaxis</option>
                                                                    <option value="05">Restos radiculares</option>
                                                                </select>
                                                            </td>
                                                            <td class="px-1 py-1">
                                                                <select class="form-control form-control-sm" id="tratamiento_4"
                                                                    name="tratamiento_4">
                                                                    <option>Tratamiento</option>
                                                                    <optgroup label="Tratamiento Pediátrico">
                                                                        <option value="dp_1">Examen inicial, plan de tratamiento y
                                                                            presupuesto
                                                                        </option>
                                                                        <option value="dp_2">Instrucción y control de higiene y
                                                                            profilaxis
                                                                        </option>
                                                                        <option value="dp_3">Aplicación flúor gel</option>
                                                                        <option value="dp_4">Aplicación flúor barniz</option>
                                                                        <option value="dp_5">Destartraje (por grupo, máximo dos)
                                                                        </option>
                                                                        <option value="dp_6">Endodoncia pieza permanente</option>
                                                                        <option value="dp_7">Exodoncia simple diente temporal
                                                                        </option>
                                                                        <option value="dp_8">Mantenedor de espacio fijo o removible
                                                                            /valor no
                                                                            incluye laboratorio</option>
                                                                        <option value="dp_9">Obturación v. ionómero pieza temporal
                                                                            anterior y
                                                                            posterior simple</option>
                                                                        <option value="dp_10">Obturación v. ionómero pieza temporal
                                                                            anterior y
                                                                            posterior compuesto</option>
                                                                        <option value="dp_11">Obturación resina fotocurado composite
                                                                            pieza
                                                                            permanente anterior y posterior simple</option>
                                                                        <option value="dp_12">Obturación resina fotocurado composite
                                                                            pieza
                                                                            permanente anterior y posterior compuesto</option>
                                                                        <option value="dp_13">Obturación resina fotocurado,
                                                                            reconstitución
                                                                        </option>
                                                                        <option value="dp_14">Obturación resina fotocurado carillas
                                                                            anteriores
                                                                        </option>
                                                                        <option value="dp_15">Pulpotomía</option>
                                                                        <option value="dp_16">Pulpectomía anterior</option>
                                                                        <option value="dp_17">Pulpectomía posterior</option>
                                                                        <option value="dp_18">Recubrimiento pulpar directo</option>
                                                                        <option value="dp_19">Recubrimiento pulpar indirecto
                                                                        </option>
                                                                        <option value="dp_20">Sellantes pieza temporal y permanente
                                                                        </option>
                                                                        <option value="dp_21">Sesión de adaptación</option>
                                                                        <option value="dp_22">Trat. de conducto en pieza temporal
                                                                            anterior
                                                                        </option>
                                                                        <option value="dp_23">Tratamiento de conducto en pieza
                                                                            temporal
                                                                            posterior</option>
                                                                        <option value="dp_24">Tratamiento diente gangrenado</option>
                                                                        <option value="dp_25">Urgencia odontopediátrica</option>
                                                                    </optgroup>
                                                                </select>
                                                                <input type="hidden" name="odontograma4" id="odontograma4"
                                                                    value="1">
                                                                <input type="hidden" name="caraM_check_4" id="caraM_check_4"
                                                                    value="0">
                                                                <input type="hidden" name="caraO_check_4" id="caraO_check_4"
                                                                    value="0">
                                                                <input type="hidden" name="caraD_check_4" id="caraD_check_4"
                                                                    value="0">
                                                                <input type="hidden" name="carav_check_4" id="carav_check_4"
                                                                    value="0">
                                                                <input type="hidden" name="caraP_check_4" id="caraP_check_4"
                                                                    value="0">
                                                                <button type="submit" class="btn btn-info btn-sm">
                                                                    Registrar
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h6 class="text-center text-c-blue mb-2">GRUPO 6</h6>
                                            <div class="table-responsive">
                                                <form id="form_6_5" action="{{ route('dental.registrar_odontograma') }}"
                                                    method="POST">

                                                    @csrf
                                                    <input type="hidden" name="ficha_id_atencion_dental_odon4"
                                                        id="ficha_id_atencion_dental_odon4"
                                                        {{--   value=" @if ($ficha != null) {{ $ficha->id }} @endif">--}}

                                                    <input type="hidden" name="paciente_atencion_dental_odon4"
                                                        id="paciente_atencion_dental_odon4" value="{{ $paciente->id }}">
                                                    <table class="table table-bordered table-xs" style="width:100%;">
                                                        <tr class="bg-encabezado">
                                                            <th class="text-center align-middle">PIEZA</th>
                                                            <th class="text-center align-middle">CARA</th>
                                                            <th class="text-center align-middle">CUADRANTE</th>
                                                        </tr>
                                                        <tr>
                                                            <td class="px-1 py-1 text-center align-middle">
                                                                <select id="pieza_odontograma_4" name="pieza_odontograma_4"
                                                                    class="form-control form-control-sm">
                                                                    <option value="8-5"> 8-5 </option>
                                                                    <option value="8-4"> 8-4 </option>
                                                                    <option value="8-3"> 8-3 </option>
                                                                    <option value="8-2"> 8-2 </option>
                                                                    <option value="8-1"> 8-1</option>
                                                                </select>
                                                                <div id="t53">
                                                                    <img src="{{ asset('images/dental/i/dientes/d38.png') }}"
                                                                        class="wid-40 py-1">
                                                                </div>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <table class="table-borderless" style="align-content:center">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="padding-caras"></td>
                                                                            <td class="padding-caras">
                                                                                <div class="circulo-v" id="caraV4"
                                                                                    onclick="cambiar_color(4)">V</div>
                                                                            </td>
                                                                            <td class="padding-caras"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="padding-caras">
                                                                                <div class="circulo-d" id="caraD4"
                                                                                    onclick="cambiar_colorD(4)">D</div>
                                                                            </td>
                                                                            <td class="padding-caras">
                                                                                <div class="circulo-o" id="caraO4"
                                                                                    onclick="cambiar_colorO(4)">O</div>
                                                                            </td>
                                                                            <td class="padding-caras">
                                                                                <div class="circulo-m" id="caraM4"
                                                                                    onclick="cambiar_colorM(4)">M</div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="padding-caras"></td>
                                                                            <td class="padding-caras">
                                                                                <div class="circulo-p" id="caraP4"
                                                                                    onclick="cambiar_colorP(4)">P</div>
                                                                            </td>
                                                                            <td class="padding-caras"></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                            <td class="text-center align-middle">
                                                                <div id="t53" style="width:100%;">
                                                                    <img src="{{ asset('images/dientes/cuadrante.png') }}"
                                                                        class="wid-100">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="px-1 py-1"><button type="button"
                                                                    class="btn btn-block btn-sm btn-outline-primary"
                                                                    data-toggle="popover" title="Historia"
                                                                    data-content="cargar historia del diente">Ver
                                                                    historia</button></td>
                                                            <td class="px-1 py-1">
                                                                <select class="form-control form-control-sm" id="diagnostico_4"
                                                                    name="diagnostico_4">
                                                                    <option value="0">Diagnóstico</option>
                                                                    <option value="01">Caries</option>
                                                                    <option value="02">Fractura</option>
                                                                    <option value="03">periodontopatia</option>
                                                                    <option value="04">profilaxis</option>
                                                                    <option value="05">Restos radiculares</option>
                                                                </select>
                                                            </td>
                                                            <td class="px-1 py-1">
                                                                <select class="form-control form-control-sm" id="tratamiento_4"
                                                                    name="tratamiento_4">
                                                                    <option>Tratamiento</option>
                                                                    <optgroup label="Tratamiento Pediátrico">
                                                                        <option value="dp_1">Examen inicial, plan de tratamiento y
                                                                            presupuesto
                                                                        </option>
                                                                        <option value="dp_2">Instrucción y control de higiene y
                                                                            profilaxis
                                                                        </option>
                                                                        <option value="dp_3">Aplicación flúor gel</option>
                                                                        <option value="dp_4">Aplicación flúor barniz</option>
                                                                        <option value="dp_5">Destartraje (por grupo, máximo dos)
                                                                        </option>
                                                                        <option value="dp_6">Endodoncia pieza permanente</option>
                                                                        <option value="dp_7">Exodoncia simple diente temporal
                                                                        </option>
                                                                        <option value="dp_8">Mantenedor de espacio fijo o removible
                                                                            /valor no
                                                                            incluye laboratorio</option>
                                                                        <option value="dp_9">Obturación v. ionómero pieza temporal
                                                                            anterior y
                                                                            posterior simple</option>
                                                                        <option value="dp_10">Obturación v. ionómero pieza temporal
                                                                            anterior y
                                                                            posterior compuesto</option>
                                                                        <option value="dp_11">Obturación resina fotocurado composite
                                                                            pieza
                                                                            permanente anterior y posterior simple</option>
                                                                        <option value="dp_12">Obturación resina fotocurado composite
                                                                            pieza
                                                                            permanente anterior y posterior compuesto</option>
                                                                        <option value="dp_13">Obturación resina fotocurado,
                                                                            reconstitución
                                                                        </option>
                                                                        <option value="dp_14">Obturación resina fotocurado carillas
                                                                            anteriores
                                                                        </option>
                                                                        <option value="dp_15">Pulpotomía</option>
                                                                        <option value="dp_16">Pulpectomía anterior</option>
                                                                        <option value="dp_17">Pulpectomía posterior</option>
                                                                        <option value="dp_18">Recubrimiento pulpar directo</option>
                                                                        <option value="dp_19">Recubrimiento pulpar indirecto
                                                                        </option>
                                                                        <option value="dp_20">Sellantes pieza temporal y permanente
                                                                        </option>
                                                                        <option value="dp_21">Sesión de adaptación</option>
                                                                        <option value="dp_22">Trat. de conducto en pieza temporal
                                                                            anterior
                                                                        </option>
                                                                        <option value="dp_23">Tratamiento de conducto en pieza
                                                                            temporal
                                                                            posterior</option>
                                                                        <option value="dp_24">Tratamiento diente gangrenado</option>
                                                                        <option value="dp_25">Urgencia odontopediátrica</option>
                                                                    </optgroup>
                                                                </select>
                                                                <input type="hidden" name="odontograma4" id="odontograma4"
                                                                    value="1">
                                                                <input type="hidden" name="caraM_check_4" id="caraM_check_4"
                                                                    value="0">
                                                                <input type="hidden" name="caraO_check_4" id="caraO_check_4"
                                                                    value="0">
                                                                <input type="hidden" name="caraD_check_4" id="caraD_check_4"
                                                                    value="0">
                                                                <input type="hidden" name="carav_check_4" id="carav_check_4"
                                                                    value="0">
                                                                <input type="hidden" name="caraP_check_4" id="caraP_check_4"
                                                                    value="0">
                                                                <button type="submit" class="btn btn-info btn-sm">
                                                                    Registrar
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mt-3 mb-0">
                                            <h6 class="f-16 text-c-blue">Plan de tratamiento</h6>
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <div class="table-responsive">
                                                    <table class="table table-xs">
                                                        <thead>
                                                            <tr>
                                                                <th>Fecha</th>
                                                                <th>Prestación</th>
                                                                <th>Caras</th>
                                                                <th>Pieza</th>
                                                                <th>Diagnóstico</th>
                                                                <th>Acción</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>00/00/000</td>
                                                                <td>Sellado</td>
                                                                <td>12</td>
                                                                <td>Vestibular, Distal</td>
                                                                <td>Caries</td>
                                                                <td>
                                                                    <button type="button" class="btn btn-danger btn-sm"><i
                                                                            class="feather icon-x"></i>Eliminar</button>
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
                        <div class="tab-pane fade" id="tratamiento" role="tabpanel" aria-labelledby="tratamiento_tab">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h5 class="text-c-blue mt-1 mb-1 f-16">Tratamiento según presupuesto</h5>
                                    <hr>
                                </div>
                                <div class="col-sm-12">
                                    <div class="dt-responsive table-responsive pb-4">
                                        <table id="tratamiento_presupuesto"
                                            class="display table table-striped table-hover dt-responsive nowrap table-sm"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center align-middle">Fecha</th>
                                                    <th class="text-center align-middle">Nº Presupuesto</th>
                                                    <th class="text-center align-middle">Aprobado</th>
                                                    <th class="text-center align-middle">Pieza</th>
                                                    <th class="text-center align-middle">Boca</th>
                                                    <th class="text-center align-middle">Presupuesto</th>
                                                    <th class="text-center align-middle">Estado</th>
                                                    <th class="text-center align-middle">Control</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center align-middle">23/05/2021</td>
                                                    <td class="text-center align-middle">782638</td>
                                                    <td class="text-center align-middle">Si</td>
                                                    <td class="text-center align-middle">Sector I</td>
                                                    <td class="text-center align-middle">no</td>
                                                    <td class="text-center align-middle">
                                                        <button type="button" class="btn btn-info btn-sm" onclick="presupuesto();">
                                                            <i class="fa fa-plus"></i> Cargar Presupuesto
                                                        </button>
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <div class="form-group col-md-4">
                                                            <div class="switch switch-success d-inline m-r-2">
                                                                <input type="checkbox" id="info_finalizado" checked="">
                                                                <label for="info_finalizado" class="cr"></label>
                                                            </div>
                                                            <label>Realizado?</label>
                                                        </div>
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        20/05/2022
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="presupuesto" role="tabpanel" aria-labelledby="presupuesto_tab">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h5 class="text-c-blue mt-4 mb-1 f-16">Detalle de presupuesto Nº</h5>
                                    <hr>
                                </div>
                                <hr>
                            </div>
                            <div class="row">
                                <!--Formulario / Menor de edad-->
                                <div class="col-sm-12 mt-3">
                                    <div class="card">
                                        <div class="card-header bg-info">
                                            <h6>Paciente menor de edad</h6>
                                        </div>
                                        <div class="card-body">
                                            <form>
                                                <div class="form-row mb-1">
                                                    <div class="col-md-12">
                                                        <h6>Información del acompañente</h6>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label">Rut</label>
                                                        <input type="text" class="form-control form-control-sm" name="nombre_acompañante"
                                                            id="nombre_acompañante">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label">Nombre y Apellidos</label>
                                                        <input type="text" class="form-control form-control-sm" name="nombre_acompañante"
                                                            id="nombre_acompañante">
                                                    </div>
                                                    <div class="form-group col-md-4" id="form_0">
                                                        <label class="floating-label">Relación</label>
                                                        <input type="text" class="form-control form-control-sm" name="relacion_acompañante"
                                                            id="relacion_acompañante">
                                                    </div>
                                                </div>
                                                <div class="form-row mb-1">
                                                    <div class="col-md-12">
                                                        <h6>Información del responsable del pago</h6>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-3" id="form_0">
                                                        <label class="floating-label">Rut</label>
                                                        <input type="text" class="form-control form-control-sm" name="responsable_pago"
                                                            id="responsable_pago">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label">Nombre y Apellidos</label>
                                                        <input type="text" class="form-control form-control-sm" name="nombre_acompañante"
                                                            id="nombre_acompañante">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label">Email</label>
                                                        <input type="text" class="form-control form-control-sm" name="nombre_acompañante"
                                                            id="nombre_acompañante">
                                                    </div>
                                                    <div class="form-group col-md-3" id="form_0">
                                                        <button type="button" class="btn btn-success btn-block btn-sm"
                                                            onclick="respon_pago_dent();"><i class="fa fa-plus"></i> Aceptar Pago</button>
                                                        <!--genera codigo de aceptación al telefono del responsable del pago-->
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--Formulario / Clinico-->
                                <div class="col-sm-12 mt-3">
                                    <div class="card">
                                        <div class="card-header bg-info">
                                            <h6>Clínico</h6>
                                        </div>
                                        <div class="card-body">
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Pieza</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label">Prestación</label>
                                                        <input type="text" class="form-control form-control-sm" name="prestación" id="prestación">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Sub-Total</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Descuento</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Total prestación</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Boca</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label">Prestación</label>
                                                        <input type="text" class="form-control form-control-sm" name="prestación" id="prestación">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Sub-Total</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Descuento</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Total Prestación</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Arcada</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label">Prestación</label>
                                                        <input type="text" class="form-control form-control-sm" name="prestación" id="prestación">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Sub-Total</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Descuento</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Total Prestación</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--Formulario / Laboratorio-->
                                <div class="col-sm-12 mt-3">
                                    <div class="card">
                                        <div class="card-header bg-info">
                                            <h6>Laboratorio</h6>
                                        </div>
                                        <div class="card-body">
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <h6>Orden de Trabajo N°...</h6>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label">Prestación</label>
                                                        <input type="text" class="form-control form-control-sm" name="prestación" id="prestación">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label">Sub-Total</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label">Descuento</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label">Total Prestación</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--Formulario / Valor total-->
                                <div class="col-sm-12 mt-3">
                                    <div class="card">
                                        <div class="card-header bg-info">
                                            <h6>Valor Total</h6>
                                        </div>
                                        <div class="card-body">
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Laboratorio</label>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Sub-Total</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Descuento</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Total Laboratorio</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Clínico</label>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Sub-Total</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Descuento</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="   pieza">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Total Clínico</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Valor final</label>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Total presupuesto</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </form>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <!--SECCION DE MEDICAMENTOS Y EXAMENES GENERALES -->
                            @include('general.secciones_ficha.seccion_receta_examen_comunes')
                            <!--SECCION DE MEDICAMENTOS Y EXAMENES GENERALES FIN  -->

                            <!--SECCION DE MEDICAMENTOS Y EXAMENES ESPECIALIDAD -->
                            @include('atencion_medica.secciones_especialidad.seccion_receta_examen_esp_orl')
                            <!--SECCION DE MEDICAMENTOS Y EXAMENES ESPECIALIDAD FIN  -->
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
@include('atencion_odontologica.modals.odontograma.tratamiento_boca_completa')
@include('atencion_odontologica.modals.odontograma.tratamiento_maxilar_inferior')
@include('atencion_odontologica.modals.odontograma.tratamiento_maxilar_superior')
@include('atencion_odontologica.modals.odontograma.tratamiento_laboratorio')
@include('atencion_odontologica.modals.odontograma.modal_odontograma')


<script>
$(document).ready(function() {
    $('#tabla_odontologico_tratamiento').DataTable({
       responsive: true,
   });
 });

 $(document).ready(function() {
    $('#tabla_odontologicos_pieza').DataTable({
       responsive: true,
   });
 });

 $(document).ready(function () {
     $('#tabla_aranceles').DataTable({
         responsive: true,
     });
 });
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


        })

        /** MANEJO DE IMAGENES */
        var myDropzone ;
        Dropzone.options.misImagenes = {
            init:function()
            {
                myDropzone = this;
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
                cargar_lista_imagenes();

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
                cargar_lista_imagenes();
                if (file.previewElement != null && file.previewElement.parentNode != null) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }
                return this._updateMaxFilesReachedClass();
            },
            canceled: function canceled(file) {
                cargar_lista_imagenes();
                return this.emit("error", file, this.options.dictUploadCanceled);
            },
        };



        var lista_imagenes = [];
        function cargar_lista_imagenes()
        {
            // console.log('--------------cargar_lista_imagenes----------------------');
            lista_imagenes = [];
            let temp  = myDropzone.getAcceptedFiles();
            $.each(temp, function( index, value )
            {
                if(value.status == "success")
                {
                    if(value.xhr !== undefined)
                    {
                        var img_temp = JSON.parse(value.xhr.response);
                        lista_imagenes[index] = [
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

        /** MANEJO DE IMAGENES */

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

        function abrir_modal_guardar_tipo()
        {
            $('#modal_registrar_ficha_tipo_orl').modal('show');
            cargarSeccion('registro_f_t_orl_detalle');
        }

        function cargarSeccion(div_destino)
        {
            // var tipo = $('#'+select+'').val();
            $('#'+div_destino).html('');
            var seccion_actual = '';
            var seccion_previa = '';
            $('#form-otorrino').find('select,textarea').each(function(key, elemento){


                html ='';

                // if(seccion_previa == '' && seccion_actual == '')
                if(key == 0)
                {
                    seccion_actual = $(elemento).data('seccion').trim();
                    seccion_previa = $(elemento).data('seccion').trim();

                    html +='<hr>';
                    html +='<div class="row"><div class="col-md-12 text-center"><h6 style="color: #3e55c3;">'+seccion_actual+'</h6></div></div>';
                    html +='<hr>';
                }
                else
                {
                    if($(elemento).data('seccion'))
                    seccion_actual = $(elemento).data('seccion').trim();
                }

                if(seccion_actual == seccion_previa)
                {
                    html +='<hr>';
                    html +='<div class="row"><div class="col-md-12 text-center"><h6 style="color: #3e55c3;">'+seccion_actual+'</h6></div></div>';
                    html +='<hr>';
                }

                html +='<div class="row" style="margin-top:10px;">';
                if($(elemento).prop('nodeName') == 'SELECT')
                {
                    if($(elemento).val() == 0)
                        $(elemento).val(1)

                    html +='<div class="col-md-5">'+$(elemento).data('titulo')+'</div>';
                    html +='<div class="col-md-5">';
                    html +='    '+$('#'+$(elemento).attr('id')+' option:selected').text()+'';
                    html +='    <input type="hidden" name="modal_agregar_tipo_'+$(elemento).attr('id')+'" id="modal_agregar_tipo_'+$(elemento).attr('id')+'" value="'+$(elemento).val()+'">';
                    html +='</div>';
                    html +='<div class="col-md-2"></div>';
                }
                else if($(elemento).prop('nodeName') == 'TEXTAREA')
                {
                    if($(elemento).data('tipo'))
                        html +='<div class="col-md-5">'+$(elemento).data('titulo')+'</div>';
                    else
                        html +='<div class="col-md-5">Detalle</div>';
                    html +='<div class="col-md-5">';
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
                seccion_previa = $(elemento).data('seccion');
            });
        }

        function cambiar_div(mostrar, ocultar, label, textarea)
        {
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
                //console.log($(elemento).attr('id'));
                //console.log($(elemento).val());
                //console.log($(elemento).prop('nodeName'));
                //console.log('*******');

                data[$(elemento).attr('id')] = $(elemento).val();

            });

            console.log(data);

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
                    observaciones_obs_examen_laringe :  data.observaciones_obs_examen_laringe,
                    registro_f_t_orl_descripcion :  data.registro_f_t_orl_descripcion,
                    registro_f_t_orl_nombre :  data.registro_f_t_orl_nombre,

                    modal_agregar_tipo_episodios: data.modal_agregar_tipo_episodios,
                    observaciones_detalle_episodios: data.observaciones_detalle_episodios,
                    modal_agregar_tipo_equilibrio: data.modal_agregar_tipo_equilibrio,
                    observaciones_detalle_equilibrio: data.observaciones_detalle_equilibrio,
                    modal_agregar_tipo_ng: data.modal_agregar_tipo_ng,
                    observaciones_detalle_ng: data.observaciones_detalle_ng,
                    modal_agregar_tipo_sint_acomp: data.modal_agregar_tipo_sint_acomp,
                    observaciones_detalle_sint_acompanantes: data.observaciones_detalle_sint_acompanantes,
                    modal_agregar_tipo_vertigo: data.modal_agregar_tipo_tipo_vertigo,
                    observaciones_detalle_tipo_vertigo: data.observaciones_detalle_tipo_vertigo,
                    observaciones_vestibular: data.observaciones_obs_vestibular,
                },
            })
            .done(function(data)
            {
                // console.log('-----------------------');
                // console.log(data);
                // console.log('-----------------------');
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
                evaluar_para_carga_detalle('tipo_vertigo','div_detalle_tipo_vertigo','detalle_tipo_vertigo',3);
                evaluar_para_carga_detalle('sint_acomp','div_detalle_sintomas_acompanantes','detalle_sint_acompanantes',3);
                evaluar_para_carga_detalle('ng','div_detalle_ng','detalle_ng',2);
                evaluar_para_carga_detalle('episodios','div_detalle_episodios','detalle_episodios',3);
                evaluar_para_carga_detalle('equilibrio','div_detalle_equilibrio','detalle_equilibrio',2);
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
                // console.log('-----------------------');
                // console.log(data);
                // console.log('-----------------------');
                if(data.estado == 1)
                {
                    $.each(data.registros, function(index, value)
                    {
                        // console.log(index);
                        // console.log(value);
                        // console.log($('#'+index));

                        if(index == 'id_usa_audifono')
                            index = 'usa_audifono';

                        if(index == 'id_tipo_episodios')
                            index = 'episodios';

                        if(index == 'id_tipo_equilibrio')
                            index = 'equilibrio';

                        if(index == 'id_tipo_ng')
                            index = 'ng';

                        if(index == 'id_tipo_sint_acomp')
                            index = 'sint_acomp';

                        if(index == 'id_tipo_vertigo')
                            index = 'tipo_vertigo';

                        if(index == 'obs_tipo_vertigo')
                            index = 'detalle_tipo_vertigo';

                        if(index == 'obs_sint_acomp')
                            index = 'detalle_sint_acompanantes';

                        if(index == 'obs_ng')
                            index = 'detalle_ng';

                        if(index == 'obs_episodios')
                            index = 'detalle_episodios';

                        if(index == 'obs_equilibrio')
                            index = 'detalle_equilibrio';



                        $('#'+index).val(value);
                    });

                    evaluar_para_carga_detalle('usa_audifono','div_detalle_usa_audifono','audifono',5);
                    evaluar_para_carga_detalle('apreciacion_auditiva','div_detalle_apreciacion_auditiva','aprec_auditiva_def',2);
                    evaluar_para_carga_detalle('examen_oi','div_detalle_examen_oi','ex_oi_anormal',2);
                    evaluar_para_carga_detalle('examen_od','div_detalle_examen_od','ex_od_anormal',2);
                    evaluar_para_carga_detalle('examen_bio_oi','div_obs_examen_bio_oi','obs_examen_bio_oi',2);
                    evaluar_para_carga_detalle('examen_bio_od','div_obs_examen_bio_od','obs_examen_bio_od',2);
                    evaluar_para_carga_detalle('tipo_vertigo','div_detalle_tipo_vertigo','detalle_tipo_vertigo',3);
                    evaluar_para_carga_detalle('sint_acomp','div_detalle_sintomas_acompanantes','detalle_sint_acompanantes',3);
                    evaluar_para_carga_detalle('ng','div_detalle_ng','detalle_ng',2);
                    evaluar_para_carga_detalle('episodios','div_detalle_episodios','detalle_episodios',3);
                    evaluar_para_carga_detalle('equilibrio','div_detalle_equilibrio','detalle_equilibrio',2);
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

        /** PERVISUALIZACION DE EXAMEN */
        function visualizar_pdf_examen(tipo_examen)
        {
            if(tipo_examen!='')
            {
                var array_datos = {};
                $('.div_form_examen_'+tipo_examen).find('input,textarea,select').each(function (key, element){
                    array_datos[element.id] = element.value;
                });

                var imagenes = $('#input_lista_imagenes').val();
                if(imagenes != '')
                {
                    imagenes = JSON.stringify(imagenes);
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
