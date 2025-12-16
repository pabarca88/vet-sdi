<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2">
        <div class="row mx-0">
            <div class="col-sm-12 col-md-12">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="orl" role="tablist">
                    <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="atencion_gine_obst_gen-tab" data-toggle="tab" href="#atencion_gine_obst_gen" role="tab" aria-controls="atencion_gine_obst_gen" aria-selected="true">Atención Especialidad</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="examen_proced-tab" data-toggle="tab" href="#examen_proced" role="tab" aria-controls="examen_proced" aria-selected="false">Exámenes y Procedimientos</a>
                    </li>
				</ul>
            </div>
            <!--ALERTA-->
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-2">
                <div class="alert-atencion alert alert-warning-b alert-dismissible fade show" role="alert"><strong>Solo el campo Hipótesis diagnóstica es obligatorio el resto es opcional</strong>
                </div>
            </div>
            <div class="col-sm-12 col-md-12">
                <form action="{{ route('fichaAtencion.registrar_ficha_gine_obst') }}" method="POST">
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
                    <div class="tab-content" id="gine-obst-contenido">
                        <!--ATENCIÓN ESPECIALIDAD GENERAL-->
                        <div class="tab-pane fade show active" id="atencion_gine_obst_gen" role="tabpanel" aria-labelledby="atencion_gine_obst_gen-tab">
                            <!--<div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <h6 class="tit-gen mt-1">Atención Gineco-Obstétrica</h6>
                                </div>
                            </div>-->
                            <!--FORMULARIOS-->
                            <div class="row">
                                
                                <!--Formulario / Menor de edad-->
                                @include('general.secciones_ficha.seccion_menor', ['tipo_ficha' => "3"])
                                <!--Cierre: Formulario / Menor de edad-->

                                <!--Motivo consulta-->
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="card-a">
                                        <div class="card-header-a" id="motivo">
                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#motivo_c" aria-expanded="false" aria-controls="motivo_c">
                                                Motivo de la consulta
                                            </button>
                                        </div>
                                        <div id="motivo_c" class="collapse" aria-labelledby="motivo" data-parent="#motivo">
                                            <div class="card-body-aten-a">
                                                <div class="form-row">
                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm " for="m_cons">Motivo</label>
                                                            <select name="m_cons" data-titulo="Motivo" data-seccion="Motivo Consulta" id="m_cons" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('m_cons','div_m_cons','obs_m_cons',6);">
                                                                <option value="0">Seleccione</option>
                                                                <option value="1">Control Preventivo</option>
                                                                <option value="2">Control Fertilidad</option>
                                                                <option value="3">Examen de Diagnóstico Embarazo</option>
                                                                <option value="4">Control Embarazo Normal</option>
                                                                <option value="5">Control Embarazo Patológico</option>
                                                                <option value="6">Otro</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group" id="div_m_cons" style="display:none;">
                                                            <label class="floating-label-activo-sm " for="obs_m_cons">Otro<i>(Describir)</i></label>
                                                            <textarea class="form-control form-control-sm" data-titulo="Obs.Orientacion Alterada "data-seccion="Funciones Corticales"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_m_cons" id="obs_m_cons" placeholder="Descripción Otro Motivo"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm " for="menst">Menstruación</i></label>
                                                            <select name="menst" data-titulo="Menstruación" data-seccion="Motivo Consulta" id="menst" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('menst','div_menst','obs_menst',2);">
                                                                <option value="0">Seleccione</option>
                                                                <option value="1">Si</option>
                                                                <option value="2">No</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group" id="div_menst" style="display:none;">
                                                            <label class="floating-label-activo-sm " for="obs_menst">Motivo Amenorrea<i>(Describir)</i></label>
                                                            <textarea class="form-control form-control-sm" data-titulo="Obs.Orientacion Alterada "data-seccion="Funciones Corticales"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_menst" id="obs_menst" placeholder="Describa razón de no presentar menstruación(puber,postmenopausica , anticoncep. etc.)"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                        <label class="floating-label-activo-sm" for="fur">FUR</label>
                                                        <input type="date" max="{{ date('Y-m-d') }}" class="form-control form-control-sm" name="fur" id="fur">
                                                    </div>
                                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm " for="tipo_mens">Tipo Menstruación</label>
                                                            <select name="tipo_mens" data-titulo="Motivo" data-seccion="Motivo Consulta" id="tipo_mens" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tipo_mens','div_tipo_mens','obs_tipo_mens',5);">
                                                                <option value="0">Seleccione</option>
                                                                <option value="1">Regulares e indoloras</option>
                                                                <option value="2">Regulares y dolorasas</option>
                                                                <option value="3">Irregulares e indoloras</option>
                                                                <option value="4">Irregulares y dolorasas</option>
                                                                <option value="5">Otras</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group" id="div_tipo_mens" style="display:none;">
                                                            <label class="floating-label-activo-sm " for="obs_tipo_mens">Otras<i>(Describir)</i></label>
                                                            <textarea class="form-control form-control-sm" data-titulo="Obs.Orientacion Alterada "data-seccion="Funciones Corticales"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tipo_mens" id="obs_tipo_mens" placeholder="Descripción Otro Motivo"></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <label class="floating-label-activo-sm" for="anam">Anmnésis</label>
                                                        <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="anam" id="anam"></textarea>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <label class="floating-label-activo-sm" for="examen_fisico">Examen de la Especialidad</label>
                                                        <textarea class="form-control caja-texto form-control-sm mb-9"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="examen_fisico" id="examen_fisico" placeholder="EXAMEN FISICO DE LA ESPECIALIDAD"></textarea>
                                                    </div>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--EXAMEN ESPECIALIDAD GINECOLOGIA - PARAMETROS DE CONTROL-->
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="card-a">
                                        <div class="card-header-a" id="exam_esp_gin">
                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#exam_esp_gin_c" aria-expanded="false" aria-controls="exam_esp_gin_c">
                                                Examen Ginecológico
                                            </button>
                                        </div>
                                        <div id="exam_esp_gin_c" class="collapse" aria-labelledby="exam_esp_gin" data-parent="#exam_esp_gin">
                                            <div class="card-body-aten-a">
                                                <div id="form-orl-adulto">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                                            <ul class="nav nav-tabs-aten nav-fill" id="matron" role="tablist">
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset active" id="gine-gen_tab" data-toggle="tab" href="#gine-gen" role="tab" aria-controls="gine-gen" aria-selected="true">Examen Ginecológico General</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset" id="fertil-gen-tab" data-toggle="tab" href="#fertil-gen" role="tab" aria-controls="fertil-gen" aria-selected="false">Control de Natalidad</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <div class="tab-content" id="gineco_obs">
                                                                <!--GINECOLOGIA-->
                                                                <div class="tab-pane fade show active" id="gine-gen" role="tabpanel" aria-labelledby="gine-gen_tab">
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-3 col-lg-2 col-xl-2">
                                                                            <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
																				<a class="nav-link-aten text-reset " id="crec-des-tab" data-toggle="tab" href="#crec-des" role="tab" aria-controls="crec-des" aria-selected="false">Desarrollo</a>
                                                                                <a class="nav-link-aten text-reset active " id="ginecol_gen-tab" data-toggle="tab" href="#ginecol_gen" role="tab" aria-controls="ginecol_gen" aria-selected="false">Examen Ginecológico</a>
                                                                                <a class="nav-link-aten text-reset" id="mamas_gen-tab" data-toggle="tab" href="#mamas_gen" role="tab" aria-controls="mamas_gen" aria-selected="false">Examen de mamas</a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-9 col-lg-10 col-xl-10">
                                                                            <div class="tab-content" id="v-pills-tabContent">
																				<div class="tab-pane fade show" id="crec-des" role="tabpanel" aria-labelledby="crec-des-tab">
																					<div class="form-row">
																						<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
																							<h6 class="t-aten">Crecimiento y desarrollo</h6>
																						</div>
																					</div>
																					<div class="form-row mb-3">
																						<div class="form-group col-md-12 col-md-12 col-xl-12">
																							<label class="floating-label-activo-sm" for="crecdes">Descripción crecimiento y desarrollo</label>
																							<textarea class="form-control form-control-sm"  rows="2"  onfocus="this.rows=6" onblur="this.rows=2;" name="crecdes" id="crecdes"></textarea>
																						</div>

																					</div>
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                            <div class="form-group">
                                                                                                <button type="button" class="btn btn-primary-light-c btn-block btn-sm mb-2"  onclick="tunner();">G. de Tunner Femenino</button>
                                                                                                <input type="hidden" name="id_tunner" id="id_tunner" value="">
                                                                                            </div>

                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                            <div class="form-group ">
                                                                                                <button type="button" class="btn btn-primary-light-c btn-block btn-sm mb-2"  onclick="ex_ciclo();">Antecedentes ciclo Menstrual</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
																				</div>
                                                                                <div class="tab-pane fade show active" id="ginecol_gen" role="tabpanel" aria-labelledby="ginecol_gen-tab">
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                            <h6 class="t-aten">Exámen ginecológico</h6>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="examen_ext">Examen externo</label>
                                                                                                <textarea class="form-control caja-texto form-control-sm " rows="1"  onfocus="this.rows=8" onblur="this.rows=1;" name="examen_ext" id="examen_ext" placeholder="DESCRIPCIÓN EXAMEN EXTERNO"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="tacto">Tacto ginecológico</label>
                                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;" name="tacto" id="tacto" placeholder="TACTO GINECOLÓGICO"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                            <div class="form-group">
                                                                                            <button type="button" class="btn_agregar_examen btn btn-primary-light-c btn-block btn-sm mb-2" disabled="disabled" onclick="gine_sol_examenes_flujo();">Solicitar Examenes</button>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                            <div class="form-group ">
                                                                                                <button type="button" class="btn_agregar_examen btn btn-primary-light-c btn-block btn-sm mb-2" disabled="disabled" onclick="sol_pap();">Solicitar PAP</button>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                            <div class="form-group">
                                                                                            <button type="button" class="btn_agregar_examen btn btn-primary-light-c btn-block btn-sm mb-2" disabled="disabled" onclick="eco_gine();">Ecografía Ginecológica</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-row">
                                                                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                            <label class="floating-label-activo-sm" for="obs_ex_gine">Observaciones examen Ginecológico </label>
                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Examen Ginecológico "data-seccion="Ginecologia General" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="obs_ex_gine" id="obs_ex_gine"></textarea>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="res_exam">Resultado Examenes</label>
                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Resultado Examenes" data-seccion="Ginecologia General" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="res_exam" id="res_exam"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="tab-pane fade show" id="mamas_gen" role="tabpanel" aria-labelledby="mamas_gen-tab">
                                                                                    <div class="row">
                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                            <h6 class="t-aten">Exámen de mamas</h6>
                                                                                        </div>
                                                                                    </div>
                                                                                    <!--MAMAS-->
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="desc_ex_mamas">Descripción examen de Mamas</label>
                                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="desc_ex_mamas" id="desc_ex_mamas"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <button type="button" class="btn btn-primary-light-c btn-block btn-sm" onclick="mamas_antecedentes();"><i class="feather icon-info"></i> Ver Antecedente mamas</button>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <button type="button" class="btn btn-primary-light-c btn-block btn-sm" onclick="ex_mamas();"><i class="feather icon-file"></i> Solicitar Ex. mamas</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="obs_ex_mamas">Observaciones Examen de mamas</label>
                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen mamas" data-seccion="Mamas" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_mamas" id="obs_ex_mamas"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="res_ex_mamas">Resultado Examenes</label>
                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Resultado Examenes" data-seccion="Mamas" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="res_ex_mamas" id="res_ex_mamas"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--EXAMEN  CONTROL NATALIDAD-->
                                                                <div class="tab-pane fade show" id="fertil-gen" role="tabpanel" aria-labelledby="fertil-gen-tab">
                                                                    <div class="row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <h6 class="t-aten">Control de natalidad</h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            <div class="tab-content" id="v-pills-tabContent">
                                                                                <div class="tab-pane fade show active" id="gine_gen" role="tabpanel" aria-labelledby="gine_gen-tab">
                                                                                    <div class="form-row" id="form-Ficha Control fertilidad">
                                                                                        <div class="col-sm-12 col-md-3 col-lg-3">
                                                                                             <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="mac">Usa método</label>
                                                                                                <select name="mac" id="mac" data-titulo="Usa Método" data-seccion="Ficha Control fertilidad"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('mac','div_mac','obs_t_mac',2)">
                                                                                                    <option value="0">Seleccione</option>
                                                                                                    <option value="1">No</option>
                                                                                                    <option value="2">Si</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group" id="div_mac" style="display:none">
                                                                                                <label class="floating-label-activo-sm" for="obs_t_mac">¿cual? Tolerancia</label>
                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="obs. Tolerancia" data-seccion="Ficha Control fertilidad" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_t_mac" id="obs_t_mac"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-3 col-lg-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="mac_n">Método Natural</label>
                                                                                                <select name="mac_n" id="mac_n" data-titulo="metodo_usado" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('mac_n','div_detalle_mac_n','mac_n_nom',2)">
                                                                                                    <option value="0">Seleccione</option>
                                                                                                    <option selected value="1">No</option>
                                                                                                    <option value="2">Natural</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group" id="div_detalle_mac_n" style="display:none">
                                                                                                <label class="floating-label-activo-sm" for="mac_n_nom">¿cual? Tolerancia</label>
                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="metodo_usado" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="mac_n_nom" id="mac_n_nom"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-3 col-lg-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm"for="mac_mec" >Método Mecánico</label>
                                                                                                <select name="mac_mec" id="mac_mec" data-titulo="metodo_usado" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('mac_mec','div_detalle_metodo_mec','mac_mec_obs',3)">
                                                                                                    <option value="0">Seleccione</option>
                                                                                                    <option selected value="1">No</option>
                                                                                                    <option value="3">Mecánico</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group" id="div_detalle_metodo_mec" style="display:none">
                                                                                                <label class="floating-label-activo-sm" for="mac_mec_obs">¿cual? Tolerancia</label>
                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Otro" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="mac_mec_obs" id="mac_mec_obs"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-3 col-lg-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="mac_far">Método Farmacológico</label>
                                                                                                <select name="mac_far" id="mac_far" data-titulo="metodo_usado" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('mac_far','div_detalle_metodo_usado_far','obs_mac_far',2)">
                                                                                                    <option value="0">Seleccione</option>
                                                                                                    <option selected value="1">No</option>
                                                                                                    <option value="2">Farmacológico</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group" id="div_detalle_metodo_usado_far" style="display:none">
                                                                                                <label class="floating-label-activo-sm" for="obs_mac_far">¿cual? Tolerancia</label>
                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Otro_1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_mac_far" id="obs_mac_far"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm"for="g_mac_obs" >Observaciones Método</label>
                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Anticoncepción" data-seccion="Anticoncepción" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="g_mac_obs" id="g_mac_obs"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="res_ex_mac">Resultado Examenes Hormonales</label>
                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Resultado Examen Anticoncepción" data-seccion="Anticoncepción" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="res_ex_mac" id="res_ex_mac"></textarea>
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
                                <!--EXAMEN ESPECIALIDAD OBSTETRICO - PARAMETROS DE CONTROL-->
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="card-a">
                                        <div class="card-header-a" id="exam_esp_obst">
                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#exam_esp_obst_c" aria-expanded="false" aria-controls="exam_esp_obst_c">
                                                Examen Obstétrico
                                            </button>
                                        </div>
                                        <div id="exam_esp_obst_c" class="collapse" aria-labelledby="exam_esp_obst" data-parent="#exam_esp_obst">
                                            <div class="card-body-aten-a">
                                                <div id="form-orl-adulto">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <ul class="nav nav-tabs-aten nav-fill mb-2" id="go_adulto" role="tablist">
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset active" id="ant_obst_tab" data-toggle="tab" href="#ant_obst" role="tab" aria-controls="ant_obst" aria-selected="true">Antecedentes obstétricos</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset" id="emb_actual-tab" data-toggle="tab" href="#emb_actual" role="tab" aria-controls="emb_actual" aria-selected="true">Embarazo Actual</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset" id="plan_obst-tab" data-toggle="tab" href="#plan_obst" role="tab" aria-controls="plan_obst" aria-selected="true">Planificación</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <div class="tab-content" id="obt_adulto">
                                                                <div class="tab-pane fade show active" id="ant_obst" role="tabpanel" aria-labelledby="ant_obst_tab">
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-3 col-lg-2 col-xl-2">
                                                                            <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                                <a class="nav-link-aten text-reset active " id="abort_obst-tab" data-toggle="tab" href="#abort_obst" role="tab" aria-controls="abort_obst" aria-selected="true">Abortos</a>
                                                                                <a class="nav-link-aten text-reset" id="emb-term-norm-tab" data-toggle="tab" href="#emb-term-norm" role="tab" aria-controls="emb-term-norm" aria-selected="false">Embarazos término </a>
                                                                                <a class="nav-link-aten text-reset" id="emb-term-antec-tab" data-toggle="tab" href="#emb-term-antec" role="tab" aria-controls="emb-term-antec" aria-selected="false">Antec del Parto</a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-10 col-lg-10 col-xl-10">
                                                                            <div class="tab-content" id="v-pills-tabContent">
                                                                                <div class="tab-pane fade show active" id="abort_obst" role="tabpanel" aria-labelledby="abort_obst-tab">
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                            <h6 class="t-aten">Abortos</h6>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="abort" >Abortos</label>
                                                                                                <select name="abort" id="abort" data-titulo="Abortos" data-seccion="Abortos" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('abort','div_detalle_abort','abort_obs',2)">
                                                                                                    <option value="0">Seleccione</option>
                                                                                                    <option value="1">No</option>
                                                                                                    <option value="2">Si</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group"  id="div_detalle_abort" style="display:none">
                                                                                                <label class="floating-label-activo-sm" for="abort_obs">Observaciones Abortos</label>
                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs.Abortos" data-seccion="Abortos" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="abort_obs" id="abort_obs"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="ab_num">N° de Abortos</label>
                                                                                                <select name="ab_num" id="ab_num" data-titulo="N°Abortos" data-seccion="Abortos" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ab_num','div_detalle_ab_num','ab_n_obs',4)">
                                                                                                    <option value="0">Seleccione</option>
                                                                                                    <option value="1">1</option>
                                                                                                    <option value="2">2</option>
                                                                                                    <option value="3">3</option>
                                                                                                    <option value="4">+ de 3 anote</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group" id="div_detalle_ab_num" style="display:none">
                                                                                                <label class="floating-label-activo-sm" for="ab_n_obs">Detalle abortos múltiples</label>
                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs.Abortos Múltiples" data-seccion="Abortos" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ab_n_obs" id="ab_n_obs"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-6 col-lg-8 col-xl-8">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="abort_obs_gl">Observaciones</label>
                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Generales Abortos" data-seccion="Abortos" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="abort_obs_gl" id="abort_obs_gl"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                                                                                            <div class="form-group">
                                                                                                <button type="button" class="btn btn-primary-light-c btn-sm btn-block mb-2" onclick="Abortos_ant();"><i class="feather icon-info"></i> Antecedentes de aborto</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="tab-pane fade" id="emb-term-norm" role="tabpanel" aria-labelledby="emb-term-norm-tab">
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                            <h6 class="t-aten">Embarazos término</h6>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="emb_prev">N° Embarazos previos</label>
                                                                                                <select name="emb_prev" id="emb_prev" data-titulo="N° Embarazos previos" data-seccion="Embarazos previos" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('emb_prev','div_detalle_emb_prev','emb_prev_obs',4);">
                                                                                                    <option value="0">Seleccione</option>
                                                                                                    <option value="1">1</option>
                                                                                                    <option value="2">2</option>
                                                                                                    <option value="3">3</option>
                                                                                                    <option value="4"> + de 3</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group" id="div_detalle_emb_prev" style="display:none">
                                                                                                <label class="floating-label-activo-sm t-red"for="emb_prev_obs" >Embarazos previos <i>(describir)</i></label>
                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs.Embarazos previos" data-seccion="Embarazos previos" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="emb_prev_obs" id="emb_prev_obs"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="pat_emb_prev">Patologías del Embarazo</label>
                                                                                                <select name="pat_emb_prev" id="pat_emb_prev" data-titulo="Patologías  Embarazos previos" data-seccion="Embarazos previos" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('pat_emb_prev','div_detalle_pat_emb_prev','pat_emb_prev_obs',2);">
                                                                                                    <option value="0">Seleccione</option>
                                                                                                    <option value="1">NO</option>
                                                                                                    <option value="2">SI</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group" id="div_detalle_pat_emb_prev" style="display:none">
                                                                                                <label class="floating-label-activo-sm t-red" for="pat_emb_prev_obs">Patologías del Embarazo <i>(describir)</i></label>
                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Patologías del Embarazo " data-seccion="Embarazos previos" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="pat_emb_prev_obs" id="pat_emb_prev_obs"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-row mb-3">
                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                            <label class="floating-label-activo-sm" for="emb_prev_obs_grl">Observaciones Antecedentes Embarazo</label>
                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Antecedentes Embarazos previo" data-seccion="Embarazos previos" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="emb_prev_obs_grl" id="emb_prev_obs_grl"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="tab-pane fade" id="emb-term-antec" role="tabpanel" aria-labelledby="emb-term-antec-tab">
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                            <h6 class="t-aten">Antecedentes del parto</h6>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="emb_mult">Embarazos Múltiples</label>
                                                                                                <select name="emb_mult" id="emb_mult" data-titulo="Embarazos Múltiples" data-seccion="Embarazos previos" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('emb_mult','div_emb_mult','emb_mult_obs',2);">
                                                                                                    <option value="0">Seleccione</option>
                                                                                                    <option value="1">NO</option>
                                                                                                    <option value="2">SI</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group" id="div_emb_mult" style="display:none">
                                                                                                <label class="floating-label-activo-sm t-red" for="emb_mult_obs">Embarazos Múltiples<i> (Describir)</i></label>
                                                                                                <textarea class="form-control caja-texto form-control-sm"  data-titulo="Biomicroscopía OD" data-seccion="Embarazos previos" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="emb_mult_obs" id="emb_mult_obs"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="nac_vivos"> N° Nacidos Vivos</label>
                                                                                                <select name="nac_vivos" data-titulo="N° Nacidos Vivos" id="nac_vivos" data-seccion="Embarazos previos" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('nac_vivos','div_nac_vivos','nac_vivos_obs',4);">
                                                                                                    <option value="0">Seleccione</option>nac_vivos
                                                                                                    <option value="1">1</option>
                                                                                                    <option value="2">2</option>
                                                                                                    <option value="3">3</option>
                                                                                                    <option value="4">+ de 3 </option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group" id="div_nac_vivos" style="display:none">
                                                                                                <label class="floating-label-activo-sm t-red" for="nac_vivos_obs">N° nacidos vivos<i> (Describir)</i></label>
                                                                                                <textarea class="form-control caja-texto form-control-sm"  data-titulo="Obs. N° nacidos vivos" data-seccion="Embarazos previos" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="nac_vivos_obs" id="nac_vivos_obs"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="nac_vivos_sal"> Salud Nacidos Vivos</label>
                                                                                                <select name="nac_vivos_sal" data-titulo="Salud Nacidos Vivos" id="nac_vivos_sal" data-seccion="Embarazos previos" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('nac_vivos_sal','div_nac_vivos_sal','nac_vivos_sal_obs',2);">
                                                                                                    <option value="0">Seleccione</option>
                                                                                                    <option value="1">Si todos vivos y Bien</option>
                                                                                                    <option value="2">No Todos bién describir</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group" id="div_nac_vivos_sal" style="display:none">
                                                                                                <label class="floating-label-activo-sm t-red" for="nac_vivos_sal_obs">Salud Nacidos Vivos<i> (Describir)</i></label>
                                                                                                <textarea class="form-control caja-texto form-control-sm"  data-titulo="Observaciones Salud Nacidos Vivos" data-seccion="Embarazos previos" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="nac_vivos_sal_obs" id="nac_vivos_sal_obs"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-row">
                                                                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                            <label class="floating-label-activo-sm" for="nac_vivos__obs_gl">Observaciones Antecedentes de parto</label>
                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Antecedentes de parto" data-seccion="Embarazos previos" data-tipo="general" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="nac_vivos_obs_gls" id="nac_vivos_obs_gls"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-row mb-2">
                                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                            <button type="button" class="btn btn-primary-light-c btn-xxs btn-block mb-2" onclick="embarazos();"><i class="feather icon-info"></i> Embarazos Anteriores</button>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                            <button type="button" class="btn btn-primary-light-c btn-xxs btn-block mb-2" onclick="mamas_antecedentes();"><i class="feather icon-info"></i> Antecedentes Mamas</button>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                            <button type="button" class="btn btn-primary-light-c btn-xxs btn-block mb-2" onclick="hormonas();"><i class="feather icon-info"></i> Ex. Hormonales</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane fade show" id="emb_actual" role="tabpanel" aria-labelledby="emb_actual-tab">
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                                <a class="nav-link-aten text-reset active" id="emb_fpp-tab" data-toggle="tab" href="#emb_fpp" role="tab" aria-controls="emb_fpp" aria-selected="false"> Semanas y FPP</a>
                                                                                <a class="nav-link-aten text-reset" id="obst_fact-riesgo-tab" data-toggle="tab" href="#obst_fact-riesgo" role="tab" aria-controls="obst_fact-riesgo" aria-selected="true">Factores de Riesgo</a>
                                                                                <a class="nav-link-aten text-reset" id="emb_madre-tab" data-toggle="tab" href="#emb_madre" role="tab" aria-controls="emb_madre" aria-selected="true">Madre</a>
                                                                                <a class="nav-link-aten text-reset" id="emb_feto-tab" data-toggle="tab" href="#emb_feto" role="tab" aria-controls="emb_feto" aria-selected="false">Gestación</a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-10 col-lg-10 col-xl-10">
                                                                            <div class="tab-content" id="v-pills-tabContent">
                                                                                <div class="tab-pane fade show active" id="emb_fpp" role="tabpanel" aria-labelledby="emb_fpp-tab">
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                            <h6 class="t-aten">Embarazo actuál (Semanas y FPP)</h6>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-row">
                                                                                        <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                            <label class="floating-label-activo-sm"for="ed_gest" >Edad gestacional</label>
                                                                                            <input type="number" class="form-control form-control-sm" name="ed_gest" id="ed_gest" >
                                                                                        </div>
                                                                                        <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                            <label class="floating-label-activo-sm" for="fpp_fur">FPP por FUR</label>
                                                                                            <input type="date" max="{{ date('Y-m-d') }}" class="form-control form-control-sm"  name="fpp_fur" id="fpp_fur" >
                                                                                        </div>
                                                                                        <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                            <label class="floating-label-activo-sm" for="fpp_eco">FPP por Eco</label>
                                                                                            <input type="date" max="{{ date('Y-m-d') }}" class="form-control form-control-sm"  name="fpp_eco" id="fpp_eco" >
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="fpp_aut">FPP por Alt uterina</label>
                                                                                                <input type="date" max="{{ date('Y-m-d') }}" class="form-control form-control-sm" name="fpp_aut" id="fpp_aut">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="sosp_pat_emb">Patologia embarazo</label>
                                                                                                <select name="sosp_pat_emb" id="sosp_pat_emb" data-titulo="Sospecha Patologia"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('sosp_pat_emb','div_sosp_pat_emb','sosp_pat_emb_obs',2);">
                                                                                                    <option selected value="1">No</option>
                                                                                                    <option value="2">Posible patología del embarazo</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group" id="div_sosp_pat_emb" style="display:none">
                                                                                                <label class="floating-label-activo-sm" for="sosp_pat_emb_obs">Describa motivo sospecha</label>
                                                                                                <textarea class="form-control form-control-sm"  data-titulo="Sospecha Patologia" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="sosp_pat_emb_obs" id="sosp_pat_emb_obs"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="control_emb">Control</label>
                                                                                                <select name="control_emb" id="control_emb" data-titulo="Control Embarazo"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('control_emb','div_control_emb','control_emb_obs',2);">
                                                                                                    <option selected value="1">Control normal</option>
                                                                                                    <option value="2">Se solicitan examenes</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group" id="div_control_emb" style="display:none">
                                                                                                <label class="floating-label-activo-sm" for="control_emb_obs">Describa examenes e interconsultas</label>
                                                                                                <textarea class="form-control form-control-sm"  data-titulo="Control Embarazo" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="control_emb_obs" id="control_emb_obs"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="obs_grl_emb">Observaciones control embarazo</label>
                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Especialidad" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="obs_grl_emb" id="obs_grl_emb"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="tab-pane fade show" id="obst_fact-riesgo" role="tabpanel" aria-labelledby="obst_fact-riesgo_tab">
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-3 col-lg-2 col-xl-2">
                                                                                            <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                                                <a class="nav-link-aten text-reset active" id="ant-ant-tab" data-toggle="tab" href="#ant-ant" role="tab" aria-controls="ant-ant" aria-selected="true">Ant Anteriores</a>
                                                                                                <a class="nav-link-aten text-reset" id="fact-act-tab" data-toggle="tab" href="#fact-act" role="tab" aria-controls="fact-act" aria-selected="false">Factores Actuales</a>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-9 col-lg-10 col-xl-10">
                                                                                            <div class="tab-content" id="v-pills-tabContent">
                                                                                                <div class="tab-pane fade show active" id="ant-ant" role="tabpanel" aria-labelledby="ant-ant-tab">
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                            <h6 class="t-aten">Antecedentes anteriores</h6>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm" for="riesg_pat_grl">Patologías generales</label>
                                                                                                                <select name="riesg_pat_grl" id="riesg_pat_grl" data-titulo="Patologías generales" data-seccion="Riesgo" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('riesg_pat_grl','div_detalle_riesg_pat_grl','riesg_pat_grl_obs',2)">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">NO</option>
                                                                                                                    <option value="2">SI</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group" id="div_detalle_riesg_pat_grl" style="display:none">
                                                                                                                <label class="floating-label-activo-sm" for="riesg_pat_grl_obs">Detalle Patologías generales</label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Detalle Patologías generales" data-seccion="Riesgo"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="riesg_pat_grl_obs" id="riesg_pat_grl_obs"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm" for="pat_prev_emb"> Patologías del Embarazo</label>
                                                                                                                <select name="pat_prev_emb" id="pat_prev_emb" data-titulo="Patologías del Embarazo" data-seccion="Riesgo" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('pat_prev_emb','div_detalle_pat_prev_emb','pat_prev_emb_obs',2)">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">NO</option>
                                                                                                                    <option value="2">SI</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group"  id="div_detalle_pat_prev_emb" style="display:none">
                                                                                                                <label class="floating-label-activo-sm" for="pat_prev_emb_obs">Detalle  Patologías del Embarazo</label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Patologías del Embarazo" data-seccion="Riesgo" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="pat_prev_emb_obs" id="pat_prev_emb_obs"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="form-row mb-3">
                                                                                                        <div class="col-sm-12 col-md-6 col-lg-8 col-xl-8">
                                                                                                            <label class="floating-label-activo-sm" for="pat_prev_emb_obs_gl">Observaciones</label>
                                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Generales Patologías del Embarazo" data-seccion="Riesgo" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="pat_prev_emb_obs_gl" id="pat_prev_emb_obs_gl"></textarea>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                                                                                                            <button type="button" class="btn btn-primary-light-c btn-sm btn-block" onclick="riesgo_emb();"><i class="feather icon-info"></i> Factores de Riesgo</button>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="tab-pane fade" id="fact-act" role="tabpanel" aria-labelledby="fact-act-tab">
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                            <h6 class="t-aten">Factores actuales</h6>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="form-row">
                                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm" for="riesg_pat_act">Patologías generales</label>
                                                                                                                <select name="riesg_pat_act" id="riesg_pat_act" data-titulo="Patologías generales" data-seccion="Riesgo Actuál" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('riesg_pat_act','div_detalle_riesg_pat_act','riesg_pat_act_obs',2)">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">NO</option>
                                                                                                                    <option value="2">SI</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group" id="div_detalle_riesg_pat_act" style="display:none">
                                                                                                                <label class="floating-label-activo-sm" for="riesg_pat_act_obs">Detalle Patologías generales</label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Detalle Patologías generales" data-seccion="Riesgo Actuál"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="riesg_pat_act_obs" id="riesg_pat_act_obs"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                            <div class="form-group">
                                                                                                                <label class="floating-label-activo-sm" for="rieg_pat_emb">Sospecha Patologías del Embarazo</label>
                                                                                                                <select name="rieg_pat_emb" id="rieg_pat_emb" data-titulo="Detalle Patologías generales" data-seccion="Riesgo Actuál" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('rieg_pat_emb','div_detalle_rieg_pat_emb','rieg_pat_emb_obs',2)">
                                                                                                                    <option value="0">Seleccione</option>
                                                                                                                    <option value="1">NO</option>
                                                                                                                    <option value="2">SI</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group" id="div_detalle_rieg_pat_emb" style="display:none">
                                                                                                                <label class="floating-label-activo-sm" for="rieg_pat_emb_obs">Detalle Patologías del Embarazo</label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Patología_actúal" data-seccion="Riesgo Actuál" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="rieg_pat_emb_obs" id="rieg_pat_emb_obs"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="form-row mb-3">
                                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                            <label class="floating-label-activo-sm" for="rieg_pat_emb_obs_grl">Observaciones</label>
                                                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Patología_actúal" data-seccion="Riesgo Actuál" data-tipo="general" onfocus="this.rows=2" onblur="this.rows=1;" name="rieg_pat_emb_obs_grl" id="rieg_pat_emb_obs_grl_gl"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="tab-pane fade" id="emb_madre" role="tabpanel" aria-labelledby="emb_madre-tab">
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                            <h6 class="t-aten">Examen de la  Madre</h6>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="cont_emb_mamas">Ex. mamas</label>
                                                                                                <select name="cont_emb_mamas" id="cont_emb_mamas" class="form-control form-control-sm" data-titulo="Ex. mamas"  data-seccion="Madre mamas"  onchange="evaluar_para_carga_detalle('cont_emb_mamas','div_detalle_cont_emb_mamas','cont_emb_mamas_obs',2)">
                                                                                                    <option value="0">Seleccione</option>
                                                                                                    <option value="1">Normales</option>
                                                                                                    <option value="2">Alteradas</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group"  id="div_detalle_cont_emb_mamas" style="display:none">
                                                                                                <label class="floating-label-activo-sm" for="cont_emb_mamas_obs">Obs.Ex. mamas <i>Describa</i> </label>
                                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Obs.Ex. mamas"  data-seccion="Madre mamas"   onfocus="this.rows=3" onblur="this.rows=1;" name="cont_emb_mamas_obs" id="cont_emb_mamas_obs"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="cont_emb_gine">Examen Ginecológico</label>
                                                                                                <select name="cont_emb_gine" id="cont_emb_gine" data-titulo="Examen Ginecológico"  data-seccion="Madre mamas"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cont_emb_gine','div_detalle_cont_emb_gine','cont_emb_gine_obs',2);">
                                                                                                    <option value="0">Seleccione</option>
                                                                                                    <option value="1">Normal</option>
                                                                                                    <option value="2">Anormal</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group" id="div_detalle_cont_emb_gine" style="display:none">
                                                                                                <label class="floating-label-activo-sm" for="cont_emb_gine_obs">Obs.Examen Ginecológico <i>Describa</i></label>
                                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  data-titulo="Obs.Examen Ginecológico"  data-seccion="Madre mamas"  onfocus="this.rows=3" onblur="this.rows=1;" name="cont_emb_gine_obs" id="cont_emb_gine_obs"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="cont_emb_au_gine">Altura Uterina</label>
                                                                                                <input type="text" class="form-control form-control-sm" name="cont_emb_au_gine" id="cont_emb_au_gine">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="cont_emb_otros">Otros</label>
                                                                                                <select name="cont_emb_otros" id="cont_emb_otros" data-titulo="Otros"  data-seccion="Madre mamas"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('o_e_m_gin_otros','div_detalle_cont_emb_otros','cont_emb_otros_obs',2);">
                                                                                                    <option value="0">Seleccione</option>
                                                                                                    <option value="1">No</option>
                                                                                                    <option value="2">Si</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group" id="div_detalle_cont_emb_otros" style="display:none">
                                                                                                <label class="floating-label-activo-sm" for="cont_emb_otros_obs">Otros <i>Describa</i></label>
                                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  data-titulo="Otros"  data-seccion="Madre mamas"  onfocus="this.rows=3" onblur="this.rows=1;" name="cont_emb_otros_obs" id="cont_emb_otros_obs"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                                            <div class="form-group">
                                                                                                <button type="button" class="btn_agregar_examen btn btn-primary-light-c btn-block btn-sm" onclick="ind_eco_control();" disabled="true"><i class="feather icon-plus"></i> Ecografìa</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                            <label class="floating-label-activo-sm" for="cont_emb_mat_obs_grl">Observaciones Examen Materno</label>
                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Fetal" data-seccion="Feto" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="cont_emb_mat_obs_grl" id="cont_emb_mat_obs_grl"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="tab-pane fade " id="emb_feto" role="tabpanel" aria-labelledby="emb_feto-tab">
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                            <h6 class="t-aten">Examen de la Gestación</h6>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="feto_lcf">LCF</label>
                                                                                                <input type="text" class="form-control form-control-sm" name="feto_lcf" id="feto_lcf">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="feto_resp_cont"> Respuesta a Contracciones</label>
                                                                                                <input type="text" class="form-control form-control-sm" name="feto_resp_cont" id="feto_resp_cont">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="feto_tam">Tamaño</label>
                                                                                                <input type="text" class="form-control form-control-sm" name="feto_tam" id="feto_tam">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="feto_aut">Alt uterina</label>
                                                                                                <input type="text" class="form-control form-control-sm" name="feto_aut" id="feto_aut">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                            <label class="floating-label-activo-sm" for="feto_obs_grl" >Observaciones Examen Fetal</label>
                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Fetal" data-seccion="Feto" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="feto_obs_grl" id="feto_obs_grl"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane fade show" id="plan_obst" role="tabpanel" aria-labelledby="plan_obst-tab">
                                                                    <form>
                                                                        <div class="form-row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <h6 class="t-aten">Planificación</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                                                <div class="custom-control custom-switch">
                                                                                    <input type="checkbox" class="custom-control-input" id="cont_rutina" name="cont_rutina" value="" />
                                                                                    <label class="custom-control-label pt-1" for="cont_rutina">Solo Control rutinario</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                                                <div class="custom-control custom-switch">
                                                                                    <input type="checkbox" class="custom-control-input" id="der_emb_aro" name="der_emb_aro" value="" />
                                                                                    <label class="custom-control-label pt-1" for="der_emb_aro">Envia a embarazo alto riesgo</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                                                <div class="custom-control custom-switch">
                                                                                    <input type="checkbox" class="custom-control-input" id="sol_hosp" name="sol_hosp" value="" onclick="showContentCir_plan_ex_obst();" />
                                                                                    <label class="custom-control-label pt-1" for="sol_hosp">Solicitar Hospitalización</label>
                                                                                </div>

                                                                                <div id="contentCir_cg" style="display: none;">
                                                                                    <div class="form-row">
                                                                                        <div class="form-group col-md-12">
                                                                                            <button type="button" class="btn btn-primary-light btn-sm btn-block" onclick="ingresohosp();"><i class="feather icon-save"></i> Orden de Hospitalización </button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!--<div class="form-row">
                                                                            <div class="form-group col-md-4">
                                                                                <div class="row">
                                                                                    <div class="col-sm-12">
                                                                                        <div class="form-group">
                                                                                            <input type="hidden" name="cont_rutina" id="cont_rutina" value="">
                                                                                            <div class="switch switch-success d-inline m-r-10">
                                                                                                <input type="checkbox" id="cont_rutina" name="cont_rutina" value="" />
                                                                                                <label for="cont_rutina" class="cr" for="res_ex_mac"></label>
                                                                                            </div>
                                                                                            <label>Solo Control rutinario</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <div class="row">
                                                                                    <div class="col-sm-12">
                                                                                        <div class="form-group">
                                                                                            <input type="hidden" name="der_emb_aro" id="der_emb_aro" value="">
                                                                                            <div class="switch switch-success d-inline m-r-10">
                                                                                                <input type="checkbox" id="der_emb_aro" name="der_emb_aro" value="" />
                                                                                                <label for="der_emb_aro" class="cr" for="res_ex_mac"></label>
                                                                                            </div>
                                                                                            <label>Envia a embarazo alto riesgo</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group col-md-4">
                                                                                <div class="row">
                                                                                    <div class="col-sm-12">
                                                                                        <div class="form-group">
                                                                                            <input type="hidden" name="sol_hosp" id="sol_hosp" value="">
                                                                                            <div class="switch switch-success d-inline m-r-10">
                                                                                                <input type="checkbox" id="sol_hosp" name="sol_hosp" value="" />
                                                                                                <label for="sol_hosp" class="cr"></label>
                                                                                            </div>
                                                                                            <label>Solicitar Hospitalización</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>-->
                                                                        <div class="form-row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm" for="res_ex_mac">Obs. Plan de tratamiento</label>
                                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Plan de tratamiento" data-seccion=" Plan de tratamiento" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_plan_tto_ea" id="obs_plan_tto_ea"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                @php
                                                                                    if(session('lic_estado') == 1)
                                                                                    {
                                                                                        echo '<button type="button" class="btn btn-primary-light-c btn-block btn-xxs mt-1 accion_modal_interconsulta" ><i class="feather icon-plus"></i> Indicar Interconsulta</button>';
                                                                                    }
                                                                                    else
                                                                                    {
                                                                                        echo '<button type="button" class="btn btn-primary-light-c btn-block btn-xxs mt-1 accion_modal_interconsulta" disabled="true"><i class="feather icon-plus"></i> Indicar Interconsulta</button>';
                                                                                    }
                                                                                @endphp
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <button type="button" class="btn_agregar_examen btn btn-primary-light-c btn-block btn-xxs mt-1" disabled="true" onclick="mostrar_modal_examen_cirguria();"><i class="feather icon-file"></i> Solicitar Examen</button>
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
                                <!--EXAMEN OBSTÉTRICO ALTO RIESGO MATERNO-FETAL-->
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="card-a">
                                        <div class="card-header-a" id="exam_esp_obst_aro">
                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#exam_esp_obst_aro_c" aria-expanded="false" aria-controls="exam_esp_obst_aro_c">
                                                Examen Obstétrico Alto Riesgo Materno-fetal
                                            </button>
                                        </div>
                                        <div id="exam_esp_obst_aro_c" class="collapse" aria-labelledby="exam_esp_obst_aro" data-parent="#exam_esp_obst_aro">
                                            <div class="card-body-aten-a">
                                                <div id="form-orl-adulto">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <ul class="nav nav-tabs-aten nav-fill mb-2" id="orl_adulto" role="tablist">
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset active" id="preexist-aro_tab" data-toggle="tab" href="#preexist-aro" role="tab" aria-controls="preexist-aro" aria-selected="true">Antecedentes obstétricos ARO</a>
                                                                </li>

                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset" id="emb_actual_aro-tab" data-toggle="tab" href="#emb_actual_aro" role="tab" aria-controls="emb_actual_aro" aria-selected="true">Control Embarazo Actuál</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset" id="plan_obst-aro-tab" data-toggle="tab" href="#plan_obst-aro" role="tab" aria-controls="plan_obst-aro" aria-selected="true">Planificación</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <div class="tab-content" id="aro">
                                                                <div class="tab-pane fade show active" id="preexist-aro" role="tabpanel" aria-labelledby="preexist-aro_tab">
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                                <a class="nav-link-aten text-reset active " id="aro_ant_obst-tab" data-toggle="tab" href="#aro_ant_obst" role="tab" aria-controls="aro_ant_obst" aria-selected="true">Factores Maternos</a>
                                                                                <a class="nav-link-aten text-reset" id="aro_fetal-tab" data-toggle="tab" href="#aro_fetal" role="tab" aria-controls="aro_fetal" aria-selected="false">Factores Gestación</a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-10 col-lg-10 col-xl-10">
                                                                            <div class="tab-content" id="v-pills-tabContent">
                                                                                <div class="tab-pane fade show active" id="aro_ant_obst" role="tabpanel" aria-labelledby="aro_ant_obst-tab">
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                            <h6 class="t-aten">Antecedentes obstétricos ARO</h6>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-row">
                                                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="aro_fact_mat">Factores maternos riesgo previos</label>
                                                                                                <select class="form-control form-control-sm" id="aro_fact_mat" name="aro_fact_mat" data-titulo="Ex. mamas"  data-seccion="Madre mamas"  onchange="evaluar_para_carga_detalle('aro_fact_mat','div_detalle_aro_fact_mat','aro_fact_mat_obs',19)">
                                                                                                    <option value = "1">Alteraciones de la Coagulación</option>
                                                                                                    <option value = "2">Cesareas anteriores</option>
                                                                                                    <option value = "3">Placenta Previa Emb Anteriores</option>
                                                                                                    <option value = "4">Diabetes I</option>
                                                                                                    <option value = "5">Diabetes II</option>
                                                                                                    <option value = "6">Edad Materna</option>
                                                                                                    <option value = "7">ETS</option>
                                                                                                    <option value = "8">Exposición a Teratógenos</option>
                                                                                                    <option value = "9">Habitos y Fármacos Consumo Habitual</option>
                                                                                                    <option value = "10">Hipertensión Arterial</option>
                                                                                                    <option value = "11">Incompatibilidad Rh</option>
                                                                                                    <option value = "12">Insuficiencia Cardiáca</option>
                                                                                                    <option value = "13">Insuficiencia Hepática</option>
                                                                                                    <option value = "14">Insuficiencia Renal</option>
                                                                                                    <option value = "15">Insuficiencia Respiratoria</option>
                                                                                                    <option value = "16">ITU recurrente</option>
                                                                                                    <option value = "17">Peso Materno</option>
                                                                                                    <option value = "18">Talla Materna</option>
                                                                                                    <option value = "19">Otra</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group"  id="div_detalle_aro_fact_mat" style="display:none">
                                                                                                <label class="floating-label-activo-sm" for="aro_fact_mat_obs">Otras Complicaciones<i>Describa</i> </label>
                                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Obs.Ex. mamas"  data-seccion="Madre mamas"   onfocus="this.rows=3" onblur="this.rows=1;" name="aro_fact_mat_obs" id="aro_fact_mat_obs"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="aro_cp1">Patologías del Embarazo</label>
                                                                                                <select class="form-control form-control-sm" id="aro_cp1" name="aro_cp1" data-titulo="Ex. mamas"  data-seccion="Madre mamas"  onchange="evaluar_para_carga_detalle('aro_cp1','div_detalle_aro_cp1','aro_cp1_obs',4)">
                                                                                                    <option value = "0">Seleccione</option>
                                                                                                    <option value = "1">No</option>
                                                                                                    <option value = "2">Complicaciones Fetales Emb. Anteriores</option>
                                                                                                    <option value = "3">Complicaciones maternas Emb. Anteriores</option>
                                                                                                    <option value = "4">Otra <i>(describir)</i></option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group"  id="div_detalle_aro_cp1" style="display:none">
                                                                                                <label class="floating-label-activo-sm" for="aro_cp1_obs">Patologías del Embarazo<i>Describa</i> </label>
                                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Obs.Ex. mamas"  data-seccion="Madre mamas"   onfocus="this.rows=3" onblur="this.rows=1;" name="aro_cp1_obs" id="aro_cp1_obs"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-row">
                                                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="aro_cp">Partos Complicados</label>
                                                                                                <select class="form-control form-control-sm" id="aro_cp" name="aro_cp" data-titulo="Ex. mamas"  data-seccion="Madre mamas"  onchange="evaluar_para_carga_detalle('aro_cp','div_detalle_aro_cp','aro_cp_obs',2)">>
                                                                                                    <option value = "0">Seleccione</option>
                                                                                                    <option value = "1">No</option>
                                                                                                    <option value = "2">Si <i>(describir)</i></option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group"  id="div_detalle_aro_cp" style="display:none">
                                                                                                <label class="floating-label-activo-sm" for="aro_cp_obs">Complicaciones Puerperio<i>Describa</i> </label>
                                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Obs.Ex. mamas"  data-seccion="Madre mamas"   onfocus="this.rows=3" onblur="this.rows=1;" name="aro_cp_obs" id="aro_cp_obs"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="aro_m_puer">Complicaciones Puerperio</label>
                                                                                                <select name="aro_m_puer" id="aro_m_puer" class="form-control form-control-sm" data-titulo="Ex. mamas"  data-seccion="Madre mamas"  onchange="evaluar_para_carga_detalle('aro_m_puer','div_detalle_aro_m_pue','aro_m_puer_obs',2)">
                                                                                                    <option value="0">Seleccione</option>
                                                                                                    <option value="1">No</option>
                                                                                                    <option value = "2">Si <i>(describir)</i></option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group"  id="div_detalle_aro_m_pue" style="display:none">
                                                                                                <label class="floating-label-activo-sm" for="aro_m_puer_obs">Complicaciones Puerperio<i>Describa</i> </label>
                                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Obs.Ex. mamas"  data-seccion="Madre mamas"   onfocus="this.rows=3" onblur="this.rows=1;" name="aro_m_puer_obs" id="aro_m_puer_obs"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="tab-pane fade " id="aro_fetal" role="tabpanel" aria-labelledby="aro_fetal-tab">
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                            <h6 class="t-aten">Antecedentes Gestacionales ARO</h6>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-row">
                                                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="aro_fact_fet">Factores Gestación riesgo previos</label>
                                                                                                <select class="form-control form-control-sm" id="aro_fact_fet" name="aro_fact_fet" data-titulo="Ex. mamas"  data-seccion="Madre mamas"  onchange="evaluar_para_carga_detalle('aro_fact_fet','div_detalle_aro_fact_fet','aro_fact_fet_obs',4)">
                                                                                                    <option value = "1">Rn alto Peso</option>
                                                                                                    <option value = "2">Rn Malformaciones</option>
                                                                                                    <option value = "3">Patologías fetales intrauterinas</option>
                                                                                                    <option value = "4">Otras</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group"  id="div_detalle_aro_fact_fet" style="display:none">
                                                                                                <label class="floating-label-activo-sm" for="aro_fact_fet_obs">Otras Complicaciones<i>Describa</i> </label>
                                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Obs.Ex. mamas"  data-seccion="Madre mamas"   onfocus="this.rows=3" onblur="this.rows=1;" name="aro_fact_fet_obs" id="aro_fact_fet_obs"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="aro_otra_f">Otra</label>
                                                                                                <select class="form-control form-control-sm" id="aro_otra_f" name="aro_otra_f" data-titulo="Ex. mamas"  data-seccion="Madre mamas"  onchange="evaluar_para_carga_detalle('aro_otra_f','div_detalle_aro_otra_f','aro_otra_f_obs',4)">
                                                                                                    <option value = "0">Seleccione</option>
                                                                                                    <option value = "1">No</option>
                                                                                                    <option value = "2">Complicaciones Fetales Emb. Anteriores</option>
                                                                                                    <option value = "3">Complicaciones maternas Emb. Anteriores</option>
                                                                                                    <option value = "4">Otra <i>(describir)</i></option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group"  id="div_detalle_aro_otra_f" style="display:none">
                                                                                                <label class="floating-label-activo-sm" for="aro_otra_f_obs">Patologías del Embarazo<i>Describa</i> </label>
                                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Obs.Ex. mamas"  data-seccion="Madre mamas"   onfocus="this.rows=3" onblur="this.rows=1;" name="aro_otra_f_obs" id="aro_otra_f_obs"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--ALTO RIESGO OBSTETRICO-->
                                                                <div class="tab-pane fade show" id="emb_actual_aro" role="tabpanel" aria-labelledby="emb_actual_aro-tab">
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-3 col-lg-2 col-xl-2">
                                                                            <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                                <a class="nav-link-aten text-reset active" id="emb_fpp-aro-tab" data-toggle="tab" href="#emb_fpp-aro" role="tab" aria-controls="emb_fpp-aro" aria-selected="false"> Semanas y FPP</a>
                                                                                <a class="nav-link-aten text-reset" id="emb_madre-aro-tab" data-toggle="tab" href="#emb_madre-aro" role="tab" aria-controls="emb_madre-aro" aria-selected="true">Madre</a>
                                                                                <a class="nav-link-aten text-reset" id="emb_feto-aro-tab" data-toggle="tab" href="#emb_feto-aro" role="tab" aria-controls="emb_feto-aro" aria-selected="false">Gestación</a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-9 col-lg-10 col-xl-10">
                                                                            <div class="tab-content" id="v-pills-tabContent">
                                                                                <div class="tab-pane fade show active" id="emb_fpp-aro" role="tabpanel" aria-labelledby="emb_fpp-aro-tab">
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                            <h6 class="t-aten">Embarazo actual (Semanas y FPP)</h6>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-row">
                                                                                        <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                            <label class="floating-label-activo-sm" for="aro_feto_eg">Edad gestacional</label>
                                                                                            <input type="text" class="form-control form-control-sm"  name="aro_feto_eg" id="aro_feto_eg">
                                                                                        </div>
                                                                                        <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                            <label class="floating-label-activo-sm" for="aro_feto_fpp_fur">FPP por FUR</label>
                                                                                            <input type="date" max="{{ date('Y-m-d') }}" class="form-control form-control-sm"  name="aro_feto_fpp_fur" id="aro_feto_fpp_fur">
                                                                                        </div>
                                                                                        <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                            <label class="floating-label-activo-sm" for="aro_feto_fpp_eco">FPP por Eco</label>
                                                                                            <input type="date" max="{{ date('Y-m-d') }}" class="form-control form-control-sm"  name="aro_feto_fpp_eco" id="aro_feto_fpp_eco">
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="aro_feto_fpp_au">FPP por Alt uterina</label>
                                                                                                <input type="date" max="{{ date('Y-m-d') }}" class="form-control form-control-sm" name="aro_feto_fpp_au" id="aro_feto_fpp_au">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="aro_s_pat_ea">Patologia embarazo</label>
                                                                                                <select name="aro_s_pat_ea" id="aro_s_pat_ea" data-titulo="Sospecha Patologia"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('aro_s_pat_ea','div_aro_s_pat_ea','aro_s_pat_ea_obs',2);">
                                                                                                    <option selected value="1">No</option>
                                                                                                    <option value="2">Posible patología del embarazo</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group" id="div_aro_s_pat_ea" style="display:none">
                                                                                                <label class="floating-label-activo-sm" for="aro_s_pat_ea_obs">Describa posible Patología</label>
                                                                                                <textarea class="form-control form-control-sm"  data-titulo="Sospecha Patologia" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="aro_s_pat_ea_obs" id="aro_s_pat_ea_obs"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="aro_cont_ea">Control</label>
                                                                                                <select name="aro_cont_ea" id="aro_cont_ea" data-titulo="Control Embarazo"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('aro_cont_ea','div_aro_cont_ea','aro_cont_ea_obs',2);">
                                                                                                    <option selected value="1">Control normal</option>
                                                                                                    <option value="2">Se solicitan examenes</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group" id="div_aro_cont_ea" style="display:none">
                                                                                                <label class="floating-label-activo-sm" for="aro_cont_ea_obs">Describa examenes e interconsultas</label>
                                                                                                <textarea class="form-control form-control-sm"  data-titulo="Control Embarazo" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="aro_cont_ea_obs" id="aro_cont_ea_obs"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                            <label class="floating-label-activo-sm" for="aro_cont_ea_obs_gl">Observaciones control embarazo</label>
                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Especialidad" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="aro_cont_ea_obs_gl" id="aro_cont_ea_obs_gl"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="tab-pane fade" id="emb_madre-aro" role="tabpanel" aria-labelledby="emb_madre-aro-tab">
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                            <h6 class="t-aten">Examen de la Madre</h6>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="aro_ea_mam">Ex. mamas</label>
                                                                                                <select name="aro_ea_mam" id="aro_ea_mam" class="form-control form-control-sm" data-titulo="Ex. mamas"  data-seccion="Madre mamas"  onchange="evaluar_para_carga_detalle('aro_ea_mam','div_aro_ea_mam','aro_ea_mam_obs',2)">
                                                                                                    <option value="0">Seleccione</option>
                                                                                                    <option value="1">Normales</option>
                                                                                                    <option value="2">Alteradas</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group"  id="div_aro_ea_mam" style="display:none">
                                                                                                <label class="floating-label-activo-sm" for="aro_ea_mam_obs">Obs.Ex. mamas <i>(Describa)</i> </label>
                                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Obs.Ex. mamas"  data-seccion="Madre mamas"   onfocus="this.rows=3" onblur="this.rows=1;" name="aro_ea_mam_obs" id="aro_ea_mam_obs"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="aro_ea_gine">Examen Ginecológico</label>
                                                                                                <select name="aro_ea_gine" id="aro_ea_gine" data-titulo="Examen Ginecológico"  data-seccion="Madre mamas"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('aro_ea_gine','div_aro_ea_gine','aro_ea_gine_obs',2);">
                                                                                                    <option value="0">Seleccione</option>
                                                                                                    <option value="1">Normal</option>
                                                                                                    <option value="2">Anormal</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group" id="div_aro_ea_gine" style="display:none">
                                                                                                <label class="floating-label-activo-sm" for="aro_ea_gine_obs">Obs.Examen Ginecológico <i>(Describa)</i></label>
                                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  data-titulo="Obs.Examen Ginecológico"  data-seccion="Madre mamas"  onfocus="this.rows=3" onblur="this.rows=1;" name="aro_ea_gine_obs" id="aro_ea_gine_obs"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="aro_ea_m_au">Altura Uterina</label>
                                                                                                <input type="text" class="form-control form-control-sm" name="aro_ea_m_au" id="aro_ea_m_au">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="aro_ea_m_o" >Otros</label>
                                                                                                <select name="aro_ea_m_ot" id="aro_ea_m_ot" data-titulo="Otros"  data-seccion="Madre mamas"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('aro_ea_m_ot','div_detalle_aro_ea_m_ot','aro_ea_m_ot_obs',2);">
                                                                                                    <option value="0">Seleccione</option>
                                                                                                    <option value="1">No</option>
                                                                                                    <option value="2">Si</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group" id="div_detalle_aro_ea_m_ot" style="display:none">
                                                                                                <label class="floating-label-activo-sm" for="aro_ea_m_ot_obs">Otros <i>(Describa)</i></label>
                                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  data-titulo="Otros"  data-seccion="Madre mamas"  onfocus="this.rows=3" onblur="this.rows=1;" name="aro_ea_m_ot_obs" id="aro_ea_m_ot_obs"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="aro_ea_m_exgin">Resultado examenes de rutina</label>
                                                                                                <select name="aro_ea_m_exgin" id="aro_ea_m_exgin" data-titulo="Examen Ginecológico"  data-seccion="Madre mamas"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('aro_ea_m_exgin','div_detalle_aro_ea_m_exgin','aro_ea_m_exgin_obs',2);">
                                                                                                    <option value="0">Seleccione</option>
                                                                                                    <option value="1">Normal</option>
                                                                                                    <option value="2">Anormal</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group" id="div_detalle_aro_ea_m_exgin" style="display:none">
                                                                                                <label class="floating-label-activo-sm" for="aro_ea_m_exgin_obs">Obs.Exámenes <i>(Describa)</i></label>
                                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  data-titulo="Obs.Examen Ginecológico"  data-seccion="Madre mamas"  onfocus="this.rows=3" onblur="this.rows=1;" name="aro_ea_m_exgin_obs" id="aro_ea_m_exgin_obs"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-6 col-lg-2 col-x-2">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="aro_ea_m_pe">Peso</label>
                                                                                                <input type="number" class="form-control form-control-sm" name="aro_ea_m_pe" id="aro_ea_m_pe">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-6 col-lg-3 col-x-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="aro_ea_m_ede">Edemas</label>
                                                                                                <input type="text" class="form-control form-control-sm" name="aro_ea_m_ede" id="aro_ea_m_ede">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-6 col-lg-2 col-xl-2">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="aro_ea_m_pa">P/A</label>
                                                                                                <input type="text" class="form-control form-control-sm" name="aro_ea_m_pa" id="aro_ea_m_pa">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-6 col-lg-2 col-xl-2">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="aro_ea_m_p">Pulso</label>
                                                                                                <input type="text" class="form-control form-control-sm" name="aro_ea_m_p" id="aro_ea_m_p">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-9 col-lg-9 col-xl-9">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="aro_ea_m_obs">Obs. Generales Examen Materno</label>
                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Plan de tratamiento" data-seccion=" Plan de tratamiento" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="aro_ea_m_obs" id="aro_ea_m_obs"></textarea>

                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <button type="button" class="btn_agregar_examen btn btn-primary-light-c btn-block btn-sm" disabled="true" onclick="ind_eco_control();"><i class="feather icon-plus"></i> Ecografìa</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                            <div class="form-group">
                                                                                                <button type="button" class="btn btn-primary-light-c btn-block btn-sm"onclick="Aro_gen() ;"><i class="feather icon-plus"></i> Embarazos riesgo</button>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                            <div class="form-group">
                                                                                                <button type="button" class="btn btn-primary-light-c btn-block btn-sm"onclick="Aro_hipertension();"><i class="feather icon-plus"></i> Hipertensión</button>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                            <div class="form-group">
                                                                                                <button type="button" class="btn btn-primary-light-c btn-block btn-sm"onclick="Aro_glucosa();"><i class="feather icon-plus"></i> Diabetes</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="tab-pane fade " id="emb_feto-aro" role="tabpanel" aria-labelledby="emb_feto-aro-tab">
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                            <h6 class="t-aten">Examen de la Gestación</h6>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="aro_fur_fpp_act">LCF</label>
                                                                                                <input type="text" class="form-control form-control-sm" name="aro_fur_fpp_act" id="aro_fur_fpp_act">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="aro_resp_cont_act"> Respuesta a Contracciones</label>
                                                                                                <input type="text" class="form-control form-control-sm" name="aro_resp_cont_act" id="aro_resp_cont_act">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="aro_tam_fet_act">Tamaño</label>
                                                                                                <input type="text" class="form-control form-control-sm" name="aro_tam_fet_act" id="aro_tam_fet_act">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="aro_alt_uter_act">Alt uterina</label>
                                                                                                <input type="text" class="form-control form-control-sm" name="aro_alt_uter_act" id="aro_alt_uter_act">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-9 col-lg-9 col-xl-9">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="aro_ex_fetal_act_obs">Observaciones Examen Fetal</label>
                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Fetal" data-seccion="Feto" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="aro_ex_fetal_act_obs" id="aro_ex_fetal_act_obs"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <button type="button" class="btn_agregar_examen btn btn-primary-light-c btn-block btn-sm" disabled="true" onclick="ind_eco_control();"><i class="feather icon-plus"></i> Ecografìa</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-row mb-2">
                                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                            <label class="floating-label-activo-sm" for="aro_obs_eco_fetal_act">Ecografía</label>
                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Fetal" data-seccion="Feto" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="aro_obs_eco_fetal_act" id="aro_obs_eco_fetal_act"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--PLAN TRATAMIENTO OBSTETRICO -->
                                                                <div class="tab-pane fade show" id="plan_obst-aro" role="tabpanel" aria-labelledby="plan_obst-aro-tab">
                                                                    <form>
                                                                        <div class="form-row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <h6 class="t-aten">Planificación</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                                                <div class="custom-control custom-switch">
                                                                                    <input type="checkbox" class="custom-control-input" id="fp_normal" name="fp_normal" value=""/>
                                                                                    <label class="custom-control-label pt-1" for="fp_normal">Seguir control embarazo alto riesgo FP normal</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                                                <div class="custom-control custom-switch">
                                                                                    <input type="checkbox" class="custom-control-input" id="adel_fp" name="adel_fp" value=""/>
                                                                                    <label class="custom-control-label pt-1" for="adel_fp">Seguir control embarazo alto riesgo Adelantar FP</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                                                <div class="custom-control custom-switch">
                                                                                    <input type="checkbox" class="custom-control-input" id="hosp_aro" name="hosp_aro" value="" onclick="showContentCir_plan_ex_obst_alto_riesgo();"/>
                                                                                    <label class="custom-control-label pt-1" for="hosp_aro">Solicitar Hospitalización</label>
                                                                                </div>

                                                                                <div id="contentCir_cg_alto_riesgo" style="display: none;">
                                                                                    <div class="form-row">
                                                                                        <div class="form-group col-md-12">
                                                                                            <button type="button" class="btn btn-primary-light btn-sm btn-block" onclick="ingresohosp();"><i class="feather icon-save"></i> Orden de Hospitalización </button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm" for="obs_plan_tto_em_aro">Obs. Plan de tratamiento</label>
                                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Plan de tratamiento" data-seccion=" Plan de tratamiento" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_plan_tto_em_aro" id="obs_plan_tto_em_aro"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                @php
                                                                                    if(session('lic_estado') == 1)
                                                                                    {
                                                                                        echo '<button type="button" class="btn btn-primary-light-c btn-block btn-xxs mt-1 accion_modal_interconsulta" ><i class="feather icon-plus"></i> Indicar Interconsulta</button>';
                                                                                    }
                                                                                    else
                                                                                    {
                                                                                        echo '<button type="button" class="btn btn-primary-light-c btn-block btn-xxs mt-1 accion_modal_interconsulta" disabled="true"><i class="feather icon-plus"></i> Indicar Interconsulta</button>';
                                                                                    }
                                                                                @endphp
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <button type="button" class="btn_agregar_examen btn btn-primary-light-c btn-block btn-xxs" disabled="true" onclick="mostrar_modal_examen_cirguria();"><i class="feather icon-file"></i> Solicitar Examenes</button>
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
                                <!--EXAMEN ESPECIALIDAD PUERPERIO - PARAMETROS DE CONTROL-->
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="card-a">
                                        <div class="card-header-a" id="exam_esp">
                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#exam_esp_c" aria-expanded="false" aria-controls="exam_esp_c">
                                                Control cirugía Gineco-Obstétrica y Examen Puerpério
                                            </button>
                                        </div>
                                        <div id="exam_esp_c" class="collapse" aria-labelledby="exam_esp" data-parent="#exam_esp">
                                            <div class="card-body-aten-a">
                                                <!--FICHA DE ATENCIÓN OBSTÉTRICA-->
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <label class="floating-label-activo-sm" for="e_general">Estado general</label>
                                                        <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="e_general" id="e_general"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-row mb-3 mt-1">
                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" name="parto_cesarea" id="parto_cesarea">
                                                            <label class="custom-control-label text-primary pt-1" for="parto_cesarea">Parto Vía Cesárea</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" name="parto_normal" id="parto_normal">
                                                            <label class="custom-control-label text-primary pt-1" for="parto_normal">Parto Vaginal</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" name="cirugia_gine_obst" id="cirugia_gine_obst">
                                                            <label class="custom-control-label text-primary pt-1" for="cirugia_gine_obst">Cirugía Gineco-Obstétrica</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                        <label class="floating-label-activo-sm" for="hda_operatoria">Herida operatória</label>
                                                         <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;"  name="hda_operatoria" id="hda_operatoria"></textarea>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                        <label class="floating-label-activo-sm" for="retiro_ptos">Retiro de puntos curación</label>
                                                         <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;"  name="retiro_ptos" id="retiro_ptos"></textarea>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                        <label class="floating-label-activo-sm" for="insp_abd">Inspección abdominal</label>
                                                        <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;"  name="insp_abd" id="insp_abd"></textarea>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="floating-label-activo-sm" for="tacto">Tacto vaginal</label>
                                                        <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;" name="tacto" id="tacto"></textarea>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="floating-label-activo-sm" for="mamas">Mamas</label>
                                                        <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;" name="mamas" id="mamas"></textarea>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <button type="button" class="btn btn-primary-light-c btn-block btn-xxs" onclick="no_disponible();"><i class="feather icon-plus"></i> Ver protocolo operatorio</button>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <button type="button" class="btn btn-primary-light-c btn-block btn-xxs" onclick="no_disponible();"><i class="feather icon-plus"></i> Ver carne de alta</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--HOSPITALIZACION-->
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
                                <!--Formulario / Signos vitales y otros-->
                                {{--  @include('atencion_pediatrica.generales.signos_vitales')  --}}
                                <!--Cierre: Formulario / Signos vitales y otros-->
                                <!--CRONICOS / GES / CONFIDENCIAL -->
                                @include('general.secciones_ficha.seccion_cronicos_ges_confidencial')
                                <!--Diagnóstico-->
                                @include('general.secciones_ficha.diagnostico')

                            </div>
                        </div>
                        <div class="tab-pane fade show " id="examen_proced" role="tabpanel" aria-labelledby="examen_proced-tab">
                            @include('atencion_gine_obstetricia.secciones_especialidad.examenes_consulta')
                        </div>
                        <!--CIERRE: ATENCIÓN ESPECIALIDAD GENERAL-->
                        {{--  div de botones  --}}
                        <div class="bg-white shadow-none rounded mx-1 p-15">
                            <!--SECCION DE MEDICAMENTOS Y EXAMENES GENERALES -->
                            @include('general.secciones_ficha.seccion_receta_examen_comunes')
                            <!--SECCION DE MEDICAMENTOS Y EXAMENES GENERALES FIN  -->
                            <!--GUARDAR O IMPRIMIR FICHA-->
                            <div class="row mb-3 m-t-10">
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
            /* formatear rut */
            // $("#solicitado_rut_eco_gine").rut({
            //     formatOn: 'keyup',
            //     minimumLength: 2,
            //     validateOn: 'change',
            //     useThousandsSeparator : false
            // });

            // $("#solicitado_rut_eco_obst").rut({
            //     formatOn: 'keyup',
            //     minimumLength: 2,
            //     validateOn: 'change',
            //     useThousandsSeparator : false
            // });

            // $("#solicitado_rut_proced").rut({
            //     formatOn: 'keyup',
            //     minimumLength: 2,
            //     validateOn: 'change',
            //     useThousandsSeparator : false
            // });

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

            /** CARGAR mensaje */
            $('#mensaje_ficha').html(' Solo el campo dignóstico es Obligatorio el resto es  opcional');
            $('#mensaje_ficha').show();
            setTimeout(function(){
                $('#mensaje_ficha').hide();
            }, 5000);
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

            window.setTimeout(function() {
                $(".alert-atencion").fadeTo(500, 0).slideUp(600, function(){
                    $(this).remove();
                });
            }, 5000);

        });


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

        function showContentCir_plan_ex_obst() {
            element = document.getElementById("contentCir_cg");
            check = document.getElementById("sol_hosp");
            if (check.checked) {
                element.style.display='block';
            }
            else {
                element.style.display='none';
            }
        }

        function showContentCir_plan_ex_obst_alto_riesgo() {
            element = document.getElementById("contentCir_cg_alto_riesgo");
            check = document.getElementById("hosp_aro");
            if (check.checked) {
                element.style.display='block';
            }
            else {
                element.style.display='none';
            }
        }

        /** CARGA DE PROFESIONAL */
        function cargar_profesional(rut, input_nombre_completo, input_id, div_solicitar,
                                    input_nombre, input_apellido,
                                    input_tel, input_email,
                                    div_mensaje, text_mensaje)
        {
            // console.log(rut);
            // console.log($(rut).val());

            rut = $(rut).val();

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
                    if(data.estado == 1)
                    {

                        if(data.registros.length>0)
                        {
                            var nombre = data.registros[0].nombre+' '+data.registros[0].apellido_uno;
                            var id = data.registros[0].id;
                            // $('#'+input_nombre_completo).attr('readonly', true);
                            $('#'+input_nombre_completo).val(nombre);
                            $('#'+input_id).val(id);
                            $('#'+div_solicitar).hide();
                            mensaje = '';
                            $('#'+div_mensaje).hide();
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
                            $('#'+div_mensaje).show();
                            $('#'+text_mensaje).html(mensaje);
                            $('#'+input_nombre).val('');
                            $('#'+input_apellido).val('');
                            $('#'+input_tel).val('');
                            $('#'+input_email).val('');
                            // $('#'+input_nombre_completo).attr('readonly', true);
                        }
                    }
                    else
                    {
                        mensaje = 'Se presento un problema en la busqueda intente nuevamente';
                        $('#'+div_mensaje).show();
                        $('#'+text_mensaje).html(mensaje);
                        // $('#'+input_nombre_completo).attr('readonly', false);
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
            }
            else if(rut.length==0)
            {
                $('#'+input_nombre_completo).val('');
                // $('#'+input_nombre_completo).attr('readonly', true);
                $('#'+input_id).val('');
                $('#'+div_solicitar).hide();
                $('#'+div_mensaje).hide();
                $('#'+text_mensaje).html('');
            }
        }
        /** CIERRE RFL */

        /** MANEJO DE IMAGENES ECOGRAFIA GINECOLOGIA*/
        var myDropzone_eco_gine;
        Dropzone.options.misArchivosEcoGine = {
            init:function()
            {
                myDropzone_eco_gine = this;
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
                cargar_lista_imagenes(myDropzone_eco_gine,'eco_gine');

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
                cargar_lista_imagenes(myDropzone_eco_gine,'eco_gine');
                if (file.previewElement != null && file.previewElement.parentNode != null) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }
                return this._updateMaxFilesReachedClass();
            },
            canceled: function canceled(file) {
                cargar_lista_imagenes(myDropzone_eco_gine,'eco_gine');
                return this.emit("error", file, this.options.dictUploadCanceled);
            },
        };

        var myDropzone_eco_obst;
        Dropzone.options.misArchivosEcoObst = {
            init:function()
            {
                myDropzone_eco_obst = this;
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
                cargar_lista_imagenes(myDropzone_eco_obst,'eco_obst');

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
                cargar_lista_imagenes(myDropzone_eco_obst,'eco_obst');
                if (file.previewElement != null && file.previewElement.parentNode != null) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }
                return this._updateMaxFilesReachedClass();
            },
            canceled: function canceled(file) {
                cargar_lista_imagenes(myDropzone_eco_obst,'eco_obst');
                return this.emit("error", file, this.options.dictUploadCanceled);
            },
        };

        var lista_imagenes = {};
        function cargar_lista_imagenes(obj_dropzone, alias_examen)
        {
            console.log('--------------cargar_lista_imagenes----------------------');
            if(obj_dropzone == undefined)
            {
                if(alias_examen == 'eco_gine')
                    obj_dropzone = myDropzone_eco_gine;
                else
                    obj_dropzone = myDropzone_eda;
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
    </script>
@endsection


