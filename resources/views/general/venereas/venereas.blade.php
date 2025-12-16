 @if(isset($seccion_tipo) && $seccion_tipo != '')
    <div class="tab-pane fade show" id="in-ven{{ '-'.$seccion_tipo }}" role="tabpanel" aria-labelledby="in-ven{{ '-'.$seccion_tipo }}-tab">
@else
    <div class="tab-pane fade show" id="in-ven" role="tabpanel" aria-labelledby="in-ven-tab">
@endif
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card-a">
                <div class="card-header-a" id="venereas">
                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#motivo_c" aria-expanded="false" aria-controls="motivo_c">
                        Motivo de la consulta y Examen físico general
                    </button>
                </div>
                <div id="motivo_c" class="collapse show" aria-labelledby="motivo" data-parent="#motivo">
                    <div class="card-body-aten-a">
						<div class="form-row">
							<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
								<h6 class="t-aten">MOTIVO DE CONSULTA</h6>
							</div>
						</div>

						<div class="form-row">
							<div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
								<label class="floating-label-activo-sm" for="select_1_ven_sint">Seleccionar sintomatología actual</label>
								<select class="form-control form-control-sm" data-titulo="Seleccionar Sintomatología Actuál" data-seccion="Venereas" data-tipo="venereas" name="select_1_ven_sint" id="select_1_ven_sint" multiple="multiple">
									<option value="1">Descarga Uretral</option>
									<option value="2">Inflamación Escrotal</option>
									<option value="3">Descarga Vaginal</option>
									<option value="4">Dolor Abdominal Bajo</option>
									<option value="5">Lesiones Ulcerativas  Genitales</option>
									<option value="6">Lesiones Vegetantes Genitales</option>
									<option value="7">Lesiones Cutáneas</option>
								</select>
							</div>

							<div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
								<label class="floating-label-activo-sm" for="select_2_ven_ant_pat_ant">Antecedentes Patológicos anteriores</label>
								<select class="form-control form-control-sm" data-titulo="Antecedentes Patológicos anteriores" data-seccion="Venereas" data-tipo="venereas" name="select_2_ven_ant_pat_ant" id="select_2_ven_ant_pat_ant" multiple="multiple">
									<option value="1">Uretritis simple</option>
									<option value="2">Uretritis Recurrente</option>
									<option value="3">Epididimitis</option>
									<option value="4">Cervicitis</option>
									<option value="5">Vaginitis</option>
									<option value="6">Vulvovaginitis</option>
									<option value="7">Enfermedad Pelvica Inf. Aguda</option>
									<option value="8">Dispareunia</option>
									<option value="9">Herpes</option>
									<option value="10">Sífilis</option>
									<option value="11">Chancroide</option>
									<option value="12">Linfogranuloma Venéreo</option>
									<option value="13">Condiloma Acuminado</option>
									<option value="14">Condiloma Plano</option>
									<option value="15">Molusco Contagioso</option>
									<option value="16">VIH</option>
								</select>
							</div>

							 <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
								<label class="floating-label-activo-sm"for="ot_ant_ven_pat">Otros Antecedentes Patológicos </label>
								<textarea class="form-control form-control-sm" data-titulo="Otros Antecedentes Patológicos" data-seccion="Venereas" data-tipo="venereas" rows="2" onfocus="this.rows=4" onblur="this.rows=1;" name="ot_ant_ven_pat" id="ot_ant_ven_pat"></textarea>
							</div>
						</div>

						<div class="form-row">
							<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
								<h6 class="t-aten">GÉNERO Y HÁBITOS SEXUALES</h6>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
								<label class="floating-label-activo-sm" for="select_6_ven_gen">Seleccionar Género</label>
								<select class="form-control form-control-sm" data-titulo="Seleccionar Género" data-seccion="Venereas" data-tipo="venereas" name="select_6_ven_gen" id="select_6_ven_gen" multiple="multiple">
									<option value="1">heterosexual</option>
									<option value="2">Homosexual</option>
									<option value="3">Bisexual</option>
									<option value="4">Otro</option>
								</select>
							</div>
							<div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
								<label class="floating-label-activo-sm" for="select_7_ven_ant_cond">Conducta y hábitos sexuales</label>
								<select class="form-control form-control-sm" data-titulo="Conducta y hábitos sexuales" data-seccion="Venereas" data-tipo="venereas" name="select_7_ven_ant_cond" id="select_7_ven_ant_cond" multiple="multiple">
									<option value="1">Pareja única</option>
									<option value="2">mas de una pareja</option>
									<option value="3">Comercio Sexual</option>
								</select>
							</div>
							<div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
								<label class="floating-label-activo-sm" for="select_8_ven_prot">Protección</label>
								<select class="form-control form-control-sm" data-titulo="Protección" data-seccion="Venereas" data-tipo="venereas" name="select_8_ven_prot" id="select_8_ven_prot" multiple="multiple">
									<option value="1">Siempre</option>
									<option value="2">Nunca</option>
									<option value="3">Ocacionalmente</option>
								</select>
							</div>
							<div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
								<label class="floating-label-activo-sm" for="select_9_ven_cont_sos">Contacto Sospechoso</label>
								<select class="form-control form-control-sm" data-titulo="Contacto Sospechoso" data-seccion="Venereas" data-tipo="venereas" name="select_9_ven_cont_sos" id="select_9_ven_cont_sos" multiple="multiple">
									<option value="1">Si</option>
									<option value="2">No</option>
									<option value="3">No sabe</option>
								</select>
							</div>
						</div>
						<div class="form-row">
							<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
								<h6 class="t-aten">ANTECEDENTES FAMILIARES</h6>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
								<label class="floating-label-activo-sm" for="select_3_ven_ant_pat_pater">Seleccionar patologias paternas</label>
								<select class="form-control form-control-sm" data-titulo="Seleccionar patologias paternas" data-seccion="Venereas" data-tipo="venereas" name="select_3_ven_ant_pat_pater" id="select_3_ven_ant_pat_pater" multiple="multiple">
									<option value="0">Desconocídos</option>
									<option value="1">Cancer</option>
									<option value="2">Covid-19</option>
									<option value="3">Diabetes</option>
									<option value="4">Hipercolesterolemia</option>
									<option value="5">Hiperlipidemia</option>
									<option value="6">Hipertensión</option>
									<option value="7">Obesidad</option>
									<option value="8">TBC</option>
									<option value="9">VIH</option>
								</select>
							</div>
							<div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
								<label class="floating-label-activo-sm" for="select_4_ven_ant_pat_mater">Seleccionar patologias maternas</label>
								<select class="form-control form-control-sm" data-titulo="Seleccionar patologias maternas" data-seccion="Venereas" data-tipo="venereas" name="select_4_ven_ant_pat_mater" id="select_4_ven_ant_pat_mater" multiple="multiple">
									<option value="0">Desconocídos</option>
									<option value="1">Cancer</option>
									<option value="2">Covid-19</option>
									<option value="3">Diabetes</option>
									<option value="4">Hipercolesterolemia</option>
									<option value="5">Hiperlipidemia</option>
									<option value="6">Hipertensión</option>
									<option value="7">Obesidad</option>
									<option value="8">TBC</option>
									<option value="9">VIH</option>
								</select>
							</div>
							<div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
								<label class="floating-label-activo-sm" for="select_5_pat_ssfam">Seleccionar patologias Sicosociales familiares</label>
								<select class="form-control form-control-sm" data-titulo="Seleccionar patologias Sicosociales familiares" data-seccion="Venereas" data-tipo="venereas"name="select_5_pat_ssfam" id="select_5_pat_ssfam" multiple="multiple">
									<option value="1">Alcoholismo Paterno</option>
									<option value="2">Alcoholismo Materno</option>
									<option value="3">Drogas Paterno</option>
									<option value="4">Drogas Materno</option>
									<option value="5"> Violencia intrafamiliar</option>
									<option value="6">Padre o Madre Adolescentes</option>
									<option value="7">Problemas judiciales</option>
								</select>
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
                        Examen especialidad (Detalle)
                    </button>
                </div>
                <div id="exam_esp_c" class="collapse" aria-labelledby="exam_esp" data-parent="#exam_esp">
                    <div class="card-body-aten-a">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <ul class="nav nav-tabs-aten nav-fill mb-2" id="ven" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link-aten text-reset active" id="uro_ven_sint_tab" data-toggle="tab" href="#uro_ven_sint" role="tab" aria-controls="uro_ven_sint" aria-selected="true">Examen General</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link-aten text-reset" id="uro_ven_genit_tab" data-toggle="tab" href="#uro_ven_genit" role="tab" aria-controls="uro_ven_genit" aria-selected="true">Genitales</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link-aten text-reset" id="ven_fotos_tab" data-toggle="tab" href="#ven_fotos" role="tab" aria-controls="ven_fotos" aria-selected="true">Fotos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link-aten text-reset" id="ex_plan_tto_venereas-tab" data-toggle="tab" href="#ex_plan_tto_venereas" role="tab" aria-controls="ex_plan_tto_venereas" aria-selected="true"> Diagnóstico Tratamiento</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link-aten text-reset" id="in-hosp-venereas_tab" data-toggle="tab" href="#in-hosp-venereas" role="tab" aria-controls="in-hosp-venereas" aria-selected="true">Hospitalizar</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="tab-content" id="venereas">
                                    <!--SINTOMAS GENERALES-->
                                    <div class="tab-pane fade show active" id="uro_ven_sint" role="tabpanel" aria-labelledby="uro_ven_sint_tab">
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <h6 class="t-aten">Sintomas generales</h6>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <div class="form-group" id="div_detalle_transito_intest" >
                                                    <label class="floating-label-activo-sm" for="ven_ex_fg">Examen físico general</label>
                                                    <textarea class="form-control caja-texto form-control-sm" rows="2" data-titulo="Examen físico General" data-seccion="Venereas" data-tipo="venereas" onfocus="this.rows=3" onblur="this.rows=2;" name="ven_ex_fg" id="ven_ex_fg" placeholder="DOLOR, PRESENCIA DE MASAS PALPABLES,ETC. "></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <div class="form-group" id="div_detalle_transito_intest" >
                                                    <label class="floating-label-activo-sm" for="ven_ex_pm">Piél y mucosas</label>
                                                    <textarea class="form-control caja-texto form-control-sm" rows="2" data-titulo="Piél y mucosas" data-seccion="Venereas" data-tipo="venereas"  onfocus="this.rows=3" onblur="this.rows=2;" name="ven_ex_pm" id="ven_ex_pm" placeholder="DESCRIBIR LESIONES, TIPO LOCALIZACIÓN ZONAS COMPROMETIDAS"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm" for="ven_obs_egp">Observaciones Estado General Paciente</label>
                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Estado General Paciente" data-seccion="Venereas" data-tipo="venereas"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="ven_obs_egp" id="ven_obs_egp" placeholder="ANOTE APRECIACIÓN SOBRE ESTADO GENERAL DEL PACIENTE"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Carga Ficha Tipo</label>
                                                    <select class="form-control form-control-sm" id="select_ficha_tipo_ex_venereas" onchange="cargar_info_ficha_tipo_venereas('select_ficha_tipo_ex_venereas','descripcion_ficha_tipo_ex_venereas');">
                                                        <option value="">Seleccione</option>
                                                        @if(!empty($fichaTipo['venereas']))
                                                            @foreach ($fichaTipo['venereas'] as $ft )
                                                                <option value="{{ $ft->id }}" data-descripcion="{{ $ft->descripcion }}">{{ $ft->nombre }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 ol-md-4 col-lg-4 col-xl-4">
                                                <span id="descripcion_ficha_tipo_ex_venereas"></span>
                                            </div>
                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-3">
                                                <button type="button" class="btn btn-info-light-c btn-sm btn-block" onclick="abrir_modal_guardar_tipo('form-ven','registro_f_t_ven_detalle','ven');"><i class="feather icon-save"></i> Guardar nueva ficha tipo venéreas</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!--GENITALES-->
                                    <div class="tab-pane fade show" id="uro_ven_genit" role="tabpanel" aria-labelledby="uro_ven_genit_tab">
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <h6 class="t-aten">Genitales</h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-xl-12">
                                                <div class="form-row">
                                                    <div class="col-md-12">
                                                        <div class="form-group" id="div_detalle_transito_intest" >
                                                            <label class="floating-label-activo-sm" for="ven_gen_masc">Genitales Masculinos</label>
                                                            <textarea class="form-control caja-texto form-control-sm" rows="2" onfocus="this.rows=3" onblur="this.rows=2;" data-titulo="Genitales Masculinos" data-seccion="Venereas" data-tipo="venereas" name="ven_gen_masc" id="ven_gen_masc" placeholder="DOLOR, PRESENCIA DE MASAS PALPABLES, URETRA, LESIONES VISIBLES,ETC. "></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group" id="div_detalle_transito_intest">
                                                            <label class="floating-label-activo-sm" for="ven_gen_fem">Genitales Femeninos</label>
                                                            <textarea class="form-control caja-texto form-control-sm" rows="2" onfocus="this.rows=3" onblur="this.rows=2;" data-titulo="Genitales Femeninos" data-seccion="Venereas" data-tipo="venereas"  name="ven_gen_fem" id="ven_gen_fem" placeholder="DOLOR, PRESENCIA DE MASAS PALPABLES, URETRA, LESIONES VISIBLES,ETC."></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4 col-md-4">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Cargar ficha tipo Genitales</label>
                                                    <select class="form-control form-control-sm" id="select_ficha_tipo_especialidad_ven_genital" onchange="cargar_info_ficha_tipo_ven_genital('select_ficha_tipo_especialidad_ven_genital','descripcion_ficha_tipo_especialidad_ven_genital');">
                                                        <option value="">Seleccione</option>
                                                        @if(!empty($fichaTipo['ven_genital']))
                                                            @foreach ($fichaTipo['ven_genital'] as $ft )
                                                                <option value="{{ $ft->id }}" data-descripcion="{{ $ft->descripcion }}">{{ $ft->nombre }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 ">
                                                <span id="descripcion_ficha_tipo_especialidad_ven_genital"></span>
                                            </div>
                                            <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 mb-3">
                                                <button type="button" class="btn btn-info-light-c btn-sm btn-block" onclick="abrir_modal_guardar_tipo('form-fo','registro_f_t_oft_detalle','fo');"><i class="feather icon-save"></i> Guardar nueva ficha tipo ven-genitales</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!--PLAN DE TRATAMIENTO-->
                                    <div class="tab-pane fade show" id="ex_plan_tto_venereas" role="tabpanel" aria-labelledby="ex_plan_tto_venereas-tab">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <h6 class="t-aten">Diagnóstico / Tratamiento</h6>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                 <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="tto_ven" name="tto_ven" value="1" onchange="javascript:showContent()"/>
                                                    <label class="custom-control-label" for="tto_ven" class="cr">Tto. Médico</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="content" style="display: none;">
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    {{-- @include('general.secciones_ficha.receta_examen.seccion_recetario') --}}
                                                </div>
                                                <div class="form-group col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                                    <label class="floating-label-activo-sm" for="recom_tto_ven">Recomendaciones</label>
                                                    <textarea class="form-control caja-texto form-control-sm"  rows="1" onfocus="this.rows=3" onblur="this.rows=1;" data-titulo="Recomendaciones" data-seccion="Venereas" data-tipo="venereas" name="recom_tto_ven" id="recom_tto_ven"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="pr_ven" name="pr_ven" value="1" onchange="javascript:showContentP()"/>
                                                    <label class="custom-control-label" for="pr_ven" class="cr">Procedimiento</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="contentProc" style="display: none;">
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label-activo-sm" for="tipo_proc_ven">Tipo</label>
                                                    <input type="text" class="form-control form-control-sm" name="tipo_proc_ven" id="tipo_proc_ven">
                                                </div>
                                                <div class="form-group col-md-8">
                                                    <label class="floating-label-activo-sm" for="plan_ven_proc">Plan</label>
                                                    <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" data-titulo="Plan" data-seccion="Venereas" data-tipo="venereas" name="plan_ven_proc" id="plan_ven_proc"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="hosp_ven" name="hosp_ven" value="{!! old('hosp_ven') !!}">
                                                    <label class="custom-control-label" for="hosp_ven">Cirugía</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="content" style="display: none;">
                                        </div>

                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 pt-2">
                                                <button type="button" class="btn btn-primary-light-c btn-xs btn-block" onclick="sol_examen_cistoscopia()";><i class="feather icon-info"></i> Solicitar Cistoscopía</button>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 pt-2">
                                                <button type="button" class="btn btn-primary-light-c btn-xs btn-block" onclick="sol_examen_esp_est_ven()";><i class="feather icon-info"></i> Examenes Específicos Venéreas</button>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm" for="obs_plan_tratamiento">Obs. Plan de tratamiento</label>
                                                    <textarea class="form-control caja-texto form-control-sm" rows="2" onfocus="this.rows=3" onblur="this.rows=2;" data-titulo="Obs. Plan de tratamiento" data-seccion="Venereas" data-tipo="venereas" name="obs_plan_tratamiento" id="obs_plan_tratamiento"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--FOTOS LAB-->
                                    <div class="tab-pane fade" id="ven_fotos" role="tabpanel" aria-labelledby="ven_fotos_tab">
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <h6 class="t-aten">Fotos</h6>
                                                <input type="hidden" name="input_lista_ven_imagenes" id="input_lista_ven_imagenes" value="">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-2">
                                                <p class="f-12 mb-0 font-weight-bold text-center">Imagenes Pre</p>
                                                <input type="hidden" name="imagenes_ven_pre" id="imagenes_ven_pre" value="">
                                                <div class="dropzone" id="mi-imagen-ven-pre" action="{{ route('profesional.imagen.carga') }}"></div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-2">
                                                <p class="f-12 mb-0 font-weight-bold text-center">Imagenes Post</p>
                                                <input type="hidden" name="imagenes_ven_post" id="imagenes_ven_post" value="">
                                                <div class="dropzone" id="mi-imagen-ven-post" action="{{ route('profesional.imagen.carga') }}"></div>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3">
                                                <label class="floating-label-activo-sm" for="obs_fotos_ven">Comentarios fotos</label>
                                                <textarea class="form-control caja-texto form-control-sm" onfocus="this.rows=3" onblur="this.rows=2;" data-titulo="Comentarios Fotos" data-seccion="Venereas" data-tipo="venereas" name="obs_fotos_ven" id="obs_fotos_ven"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- HOSPITALIZACION VENEREAS -->
                                    @php
                                    $seccion_tipo = 'venereas';
                                    @endphp
                                    @include('general.hospitalizacion.hospitalizar')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- DIAGNOSTICO VENERIAS -->
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card-a">
                <div class="card-header-a" id="diag_vene">
                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#diag_vene_c" aria-expanded="false" aria-controls="diag_vene_c">
                        Diagnostico
                    </button>
                </div>
                <div id="diag_vene_c" class="collapse show" aria-labelledby="diag_vene" data-parent="#diag_vene">
                    <div class="card-body-aten-a">
                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <label class="floating-label-activo-sm" for="diagnostico_ven">Hipótesis Diagnóstica Venereas</label>
                                <input type="text" class="form-control form-control-sm"  data-input_igual="descripcion_hipotesis,lic_descripcion_hipotesis,hipotesis_certificado" name="diagnostico_ven" id="diagnostico_ven" onchange="cargarIgual('diagnostico_ven')">
                            </div>
                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <label class="floating-label-activo-sm" for="descripcion_cie_ven">Diagnóstico CIE-10 Venereas</label>
                                <input type="text" class="form-control form-control-sm" data-input_igual="lic_descripcion_cie,descripcion_cie" name="descripcion_cie_ven" id="descripcion_cie_ven" value="" onchange="cargarIgual('descripcion_cie_ven')">
                                <input type="hidden" class="form-control form-control-sm" data-input_igual="id_lic_descripcion_cie,id_descripcion_cie" name="id_descripcion_cie_ven" id="id_descripcion_cie_ven" value="" onchange="cargarIgual('id_descripcion_cie_ven')">
                            </div>
                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <label class="floating-label-activo-sm" for="indicaciones_ven">Indicaciones Venereas</label>
                                <input type="text" class="form-control form-control-sm" name="indicaciones_ven" id="indicaciones_ven">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-body">
                    <!--SECCION DE MEDICAMENTOS Y EXAMENES GENERALES -->
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <!--INDICACIONES-->
                        <div class="row">
                            <div class="col-sm-12 col-md-12 text-center">
                                <p class="my-0">Completar diagnóstico para activar botones</p>
                            </div>
                        </div>
                        <div class="row">
                            @if(!empty(session('lic_token')) && session('lic_estado') == 1)
                                @if (isset($fichaAtencion) && $fichaAtencion->hipotesis_diagnostico != null)
                                    <div class="col-sm-12 col-md-6 text-center">
                                        <div class="btn-group btn-group-xs w-100" data-toggle="buttons">
                                            <button type="button" id="btn_agregar_medicamento_ven" class=" btn_agregar_medicamento_ven btn btn-info-light btn-xs mt-1" onclick="i_medicamento();"><i class="feather icon-plus"></i> Indicar medicamento</button>
                                            <button type="button" onclick="ver_pdf_receta($('#id_fc').val());" class=" btn_medicamento_pdf_ven btn btn-primary-light  btn-xs mt-1" id="btn_medicamento_pdf_ven"><i class="feather icon-file"></i>PDF Receta</button>
                                            {{-- <button type="button" onclick="ver_pdf_receta_retenido($('#id_fc').val());" class="btn btn-warning-light btn-xs mt-1" id=""><i class="feather icon-file"></i> PDF Retenida</button> --}}
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="btn-group btn-group-xs w-100" data-toggle="buttons">
                                            <button type="button" id="btn_agregar_examen_ven" class="btn_agregar_examen_ven btn btn-info btn-sm mt-1" onclick="mostrar_modal_examen_cirguria();"><i class="feather icon-plus"></i> Indicar examen</button>
                                            <button type="button" onclick="ver_pdf_orden_examenes($('#id_fc').val());" class=" btn_examenes_pdf_ven btn btn-primary-light  btn-xs mt-1" id="btn_examenes_pdf_ven"><i class="feather icon-file"></i>Ver Receta</button>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-sm-12 col-md-6 text-center">
                                        <div class="btn-group btn-group-xs w-100" data-toggle="buttons">
                                            <button type="button" disabled="disabled" id="btn_agregar_medicamento_ven" class=" btn_agregar_medicamento_ven btn btn-info btn-xs mt-1" onclick="i_medicamento();"><i class="feather icon-plus"></i> Indicar medicamento</button>
                                            <button type="button" disabled="disabled" onclick="ver_pdf_receta($('#id_fc').val());" class=" btn_medicamento_pdf_ven btn btn-primary-light  btn-xs mt-1" id="btn_medicamento_pdf_ven"><i class="feather icon-file"></i> Ver Receta</button>
                                            {{-- <button type="button" disabled="disabled" onclick="ver_pdf_receta_retenido($('#id_fc').val());" class="btn_medicamento_pdf_ven btn btn-warning-light btn-xs mt-1" id="btn_medicamento_retenida_pdf"><i class="feather icon-file"></i> PDF Retenida</button> --}}
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="btn-group btn-group-xs w-100" data-toggle="buttons">
                                            <button type="button" disabled="disabled" id="btn_agregar_examen_ven" class=" btn_agregar_examen_ven btn btn-info btn-xs mt-1" onclick="mostrar_modal_examen_cirguria();"><i class="feather icon-plus"></i> Indicar examen</button>
                                            <button type="button" disabled="disabled" onclick="ver_pdf_orden_examenes($('#id_fc').val());" class=" btn_examenes_pdf_ven btn btn-primary-light  btn-xs mt-1" id="btn_examenes_pdf_ven"><i class="feather icon-file"></i> Ver PDF</button>
                                        </div>
                                    </div>
                                @endif
                            @else
                                <div class="col-sm-12 col-md-6 text-center">
                                    <div class="btn-group btn-group-xs w-100" data-toggle="buttons">
                                        <button type="button" disabled="disabled" id="btn_agregar_medicamento_ven" class=" btn_agregar_medicamento_ven btn btn-info btn-xs mt-1" onclick="i_medicamento();"><i class="feather icon-plus"></i> Indicar medicamento</button>
                                        <button type="button" disabled="disabled" onclick="ver_pdf_receta($('#id_fc').val());" class=" btn_medicamento_pdf_ven btn btn-primary-light  btn-xs mt-1" id="btn_medicamento_pdf_ven"><i class="feather icon-file"></i> Ver Receta</button>
                                        {{-- <button type="button" disabled="disabled" onclick="ver_pdf_receta_retenido($('#id_fc').val());" class="btn_medicamento_pdf_ven btn btn-warning-light btn-xs mt-1" id="btn_medicamento_retenida_pdf"><i class="feather icon-file"></i> PDF Retenida</button> --}}
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="btn-group btn-group-xs w-100" data-toggle="buttons">
                                        <button type="button" disabled="disabled" id="btn_agregar_examen_ven" class=" btn_agregar_examen_ven btn btn-info btn-xs mt-1" onclick="mostrar_modal_examen_cirguria();"><i class="feather icon-plus"></i> Indicar examen</button>
                                        <button type="button" disabled="disabled" onclick="ver_pdf_orden_examenes($('#id_fc').val());" class=" btn_examenes_pdf_ven btn btn-primary-light  btn-xs mt-1" id="btn_examenes_pdf_ven"><i class="feather icon-file"></i> Ver PDF</button>
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 text-center">
            <input type="submit" class="btn btn-info mt-1" onclick="$('#cerrarsession').val('1');agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar ficha y finalizar su consulta">
            <input type="submit" class="btn btn-purple mt-1" onclick="agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar ficha e ir a su agenda">
        </div>

    </div>
</div>
    <!--Diagnóstico-->

@include('general.venereas.modal.ind_examen_venereas')



<script type="text/javascript">

    function showContent() {
        element = document.getElementById("content");
        check = document.getElementById("tto_ven");
        if (check.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }


    function showContentP() {
        element = document.getElementById("contentProc");
        check = document.getElementById("pr_ven");
        if (check.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }

    $(document).ready(function()
    {
        $('#select_1_ven_sint').select2();
        $('#select_2_ven_ant_pat_ant').select2();
        $('#select_3_ven_ant_pat_pater').select2();
        $('#select_4_ven_ant_pat_mater').select2();
        $('#select_5_pat_ssfam').select2();
        $('#select_6_ven_gen').select2();
        $('#select_7_ven_ant_cond').select2();
        $('#select_8_ven_prot').select2();
        $('#select_9_ven_cont_sos').select2();

        $('#hosp_ven').change(function() {
            if ($('#hosp_ven').is(':checked')) {
                $('#ingreso_sol_pab_modal').modal('show');
            } else {
                $('#ingreso_sol_pab_modal').modal('hide');
            }
        });

        $("#descripcion_cie_ven").autocomplete({
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
                $('#descripcion_cie_ven').val(ui.item.label); // display the selected text
                $('#id_descripcion_cie_ven').val(ui.item.value); // save selected id to input
                return false;
            }
        });

        $('#diagnostico_ven').keyup(function(){
            if($.trim(this.value) != '')
            {
                if( lic_token != '' && lic_estado == 1)
                {
                    $('.btn_agregar_medicamento_ven').removeAttr("disabled");
                    $('.btn_medicamento_pdf_ven').removeAttr("disabled");
                    $('.btn_agregar_examen_ven').removeAttr("disabled");
                    $('.btn_examenes_pdf_ven').removeAttr("disabled");
                }
                else
                {
                    $('.btn_agregar_medicamento_ven').attr('disabled','disabled');
                    $('.btn_medicamento_pdf_ven').attr('disabled','disabled');
                    $('.btn_agregar_examen_ven').attr('disabled','disabled');
                    $('.btn_examenes_pdf_ven').attr('disabled','disabled');
                }

            }
            else
            {
                $('.btn_agregar_medicamento_ven').attr('disabled','disabled');
                $('.btn_medicamento_pdf_ven').attr('disabled','disabled');
                $('.btn_agregar_examen_ven').attr('disabled','disabled');
                $('.btn_examenes_pdf_ven').attr('disabled','disabled');
            }
        });

    });
</script>

@section('script-veneria')
    <script>
        /** MANEJO DE IMAGENES */
        // mi-imagen-ven-pre
        var myDropzone_ven_pre ;
        Dropzone.options.miImagenVenPre = {
            init:function()
            {
                myDropzone_ven_pre = this;
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
            maxFilesize: 1,
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
            //     cargar_lista_ven_imagenes();
            //     return done();
            // },
            success: function(file, response){
                // console.log('-------------success-----------------------');
                $('#imagenes_ven_pre').val(response.img.nombre_img);
                cargar_lista_ven_imagenes(myDropzone_ven_pre,'ven_pre');

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
                $('#imagenes_ven_pre').val('');
                cargar_lista_ven_imagenes(myDropzone_ven_pre,'ven_pre');
                if (file.previewElement != null && file.previewElement.parentNode != null) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }
                return this._updateMaxFilesReachedClass();
            },
            canceled: function canceled(file) {
                $('#imagenes_ven_pre').val('');
                cargar_lista_ven_imagenes(myDropzone_ven_pre,'ven_pre');
                return this.emit("error", file, this.options.dictUploadCanceled);
            },
        };

        // mi-imagen-uro-post
        var myDropzone_ven_post ;
        Dropzone.options.miImagenVenPost = {
            init:function()
            {
                myDropzone_ven_post = this;
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
            maxFilesize: 1,
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
            //     cargar_lista_ven_imagenes();
            //     return done();
            // },
            success: function(file, response){
                // console.log('-------------success-----------------------');
                $('#imagenes_ven_post').val(response.img.nombre_img);
                cargar_lista_ven_imagenes(myDropzone_ven_post,'ven_post');

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
                $('#imagenes_ven_post').val('');
                cargar_lista_ven_imagenes(myDropzone_ven_post,'ven_post');
                if (file.previewElement != null && file.previewElement.parentNode != null) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }
                return this._updateMaxFilesReachedClass();
            },
            canceled: function canceled(file) {
                $('#imagenes_ven_post').val('');
                cargar_lista_ven_imagenes(myDropzone_ven_post,'ven_post');
                return this.emit("error", file, this.options.dictUploadCanceled);
            },
        };

        var lista_ven_imagenes = {};
        function cargar_lista_ven_imagenes(obj_dropzone, alias_examen)
        {
            // console.log('--------------cargar_lista_ven_imagenes----------------------');
            lista_ven_imagenes[alias_examen] = [];
            let temp  = obj_dropzone.getAcceptedFiles();
            $.each(temp, function( index, value )
            {
                if(value.status == "success")
                {
                    if(value.xhr !== undefined)
                    {
                        var img_temp = JSON.parse(value.xhr.response);
                        lista_ven_imagenes[alias_examen][index] = [
                            url=img_temp.img.url,
                            nombre_origian= img_temp.img.original_file_name,
                            nombre_img = img_temp.img.nombre_img,
                            file_extension = img_temp.img.file_extension,
                        ];
                        $('#input_lista_ven_imagenes').val('');
                        $('#input_lista_ven_imagenes').val(JSON.stringify(lista_ven_imagenes));
                    }
                }
            });


        }
        /** CIERRE MANEJO DE IMAGENES */
    </script>
@endsection


